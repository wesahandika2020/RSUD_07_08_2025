<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pembayaran_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->datetime = date('Y-m-d H:i:s');
		$this->load->model('Keuangan_ver2_model', 'm_keuangan_ver2');
	}

	function getRincianTagihan($id_pendaftaran, $transaksi, $jenis_layanan = NULL, $layanan_pendaftaran = NULL)
	{
		$lp = explode(",", $layanan_pendaftaran);
		$data = array();
		$param = "";
		$sql = "select lp.id, lp.jenis_layanan, 
				COALESCE(sp.nama, '') as klinik, 
				COALESCE(bg.nama, '') as bangsal, 
				ic.id_bangsal as bangsal_icare, 
				ri.waktu_keluar, 
				ic.waktu_keluar as waktu_keluar_icare, lp.cara_bayar, (null) as items 
				from sm_layanan_pendaftaran as lp 
				left join sm_spesialisasi as sp on (sp.id = lp.id_unit_layanan) 
				left join sm_penjamin as pj on (pj.id = lp.id_penjamin) 
				left join sm_rawat_inap as ri on (ri.id_layanan_pendaftaran = lp.id)
				left join sm_intensive_care as ic on (ic.id_layanan_pendaftaran = lp.id) 
				left join sm_bangsal as bg on (bg.id = ri.id_bangsal) 
				where lp.id_pendaftaran = '" . $id_pendaftaran . "' ";
		if ($jenis_layanan === "Poliklinik") :
			$param .= " and lp.jenis_layanan = 'Poliklinik' ";
		else :
			if ($jenis_layanan === "IGD") :
				$param .= " and lp.jenis_layanan = 'IGD' ";
			else :
				if ($jenis_layanan === 'Rawat Inap') :
					$param .= " and (lp.jenis_layanan = 'IGD' or lp.jenis_layanan = 'Rawat Inap' or lp.jenis_layanan = 'Intensive Care') ";
				else :
					if ($jenis_layanan === 'Intensive Care') :
						$param .= " and (lp.jenis_layanan = 'IGD' or lp.jenis_layanan = 'Rawat Inap' or lp.jenis_layanan = 'Intensive Care') ";
					else :
						if ($jenis_layanan === 'Hemodialisa') :
							$param .= " and lp.jenis_layanan = 'Hemodialisa' ";
						else :
							if ($jenis_layanan === 'Pemulasaran Jenazah') :
								$param .= " and lp.jenis_layanan = 'Pemulasaran Jenazah' ";
							else :
								if ($jenis_layanan === 'Medical Check Up') :
									$param .= " and lp.jenis_layanan = 'Medical Check Up' ";
								endif;
							endif;
						endif;
					endif;
				endif;
			endif;
		endif;

		$query = $this->db->query($sql . $param)->result();
		if ($transaksi === "all") :
			foreach ($query as $i => $value) :
				if ($layanan_pendaftaran !== "" && !in_array($value->id, $lp)) :
					continue;
				endif;

				$data[$i] = $value;
				$items = array();
				$items[0] = $this->m_keuangan_ver2->hitungTotalTindakan($value->id, "Ya");
				$items[0]["item"] = "Pendaftaran";
				$items[1] = $this->m_keuangan_ver2->hitungTotalTindakan($value->id, "Tidak");
				$items[1]["item"] = "Tindakan";
				$items[2] = $this->m_keuangan_ver2->hitungTotalKamar($value->id);
				$items[2]["item"] = "Rawat Inap";
				// $items[3] = $this->m_keuangan_ver2->hitungTotalAdministrasiRanap($value->id);
				// $items[3]["item"] = "Administrasi Rawat Inap";
				$items[4] = $this->m_keuangan_ver2->hitungTotalPenunjang($value->id, "sm_laboratorium", "sm_detail_laboratorium");
				$items[4]["item"] = "Laboratorium";
				$items[5] = $this->m_keuangan_ver2->hitungTotalPenunjang($value->id, "sm_radiologi", "sm_detail_radiologi");
				$items[5]["item"] = "Radiologi";
				$items[6] = $this->m_keuangan_ver2->hitungTotalPenunjang($value->id, "sm_fisioterapi", "sm_detail_fisioterapi");
				$items[6]["item"] = "Fisioterapi";
				$items[7] = $this->m_keuangan_ver2->hitungTotalBarang($value->id, "Resep");
				$items[7]["item"] = "Resep";
				$items[8] = $this->m_keuangan_ver2->hitungTotalBarang($value->id, "BHP");
				$items[8]["item"] = "BHP";
				$items[9] = $this->m_keuangan_ver2->hitungTotalOperasi($value->id);
				$items[9]['item'] = "Operasi";
				$items[10] = $this->m_keuangan_ver2->hitungTotalBarangOperasi($value->id);
				$items[10]['item'] = "BHP Operasi";
				$items[11] = $this->m_keuangan_ver2->hitungTotalHemodialisa($value->id);
				$items[11]['item'] = "Hemodialisa";
				// $items[12] = $this->m_keuangan_ver2->hitungTotalAdministrasiIcare($value->id);
				// $items[12]['item'] = "Administrasi Intensive Care";
				$items[13] = $this->m_keuangan_ver2->hitungTotalKamarIcare($value->id);
				$items[13]["item"] = "Intensive Care";
				$items[14] = $this->m_keuangan_ver2->hitungTotalBankDarah($value->id);
				$items[14]['item'] = "Bank Darah";
				$items[15] = $this->m_keuangan_ver2->hitungTotalPKRT($value->id);
				$items[15]["item"] = "PKRT";
				// $items[15] = $this->m_keuangan_ver2->hitungTotalBarangBankDarah($value->id);
				// $items[15]["item"] = "Barang Bank Darah";
				$data[$i]->items = $items;
			endforeach;
		else :
			foreach ($query as $i => $value) :
				$data[$i] = $value;
				$data[$i]->items = array();

				if ($transaksi === "Pendaftaran") :
					$data[$i]->items = $this->tagihanTindakan($value->id, NULL, "Pendaftaran");
				else :
					if ($transaksi === "Tindakan") :
						$tindakan = $this->tagihanTindakan($value->id, NULL, NULL);
						$bhp = $this->tagihanBarang($value->id, "BHP");
						$data[$i]->items = array_merge($tindakan, $bhp);
					else :
						if ($transaksi === "Laboratorium") :
							$data[$i]->items = $this->tagihanPemeriksaanLaboratorium($value->id);
						else :
							if ($transaksi === "Radiologi") :
								$data[$i]->items = $this->tagihanPemeriksaanRadiologi($value->id);
							else :
								if ($transaksi === "Fisioterapi") :
									$data[$i]->items = $this->tagihanPemeriksaanFisioterapi($value->id);
								else :
									if ($transaksi === "Obgyn") :
										$data[$i]->items = $this->tagihanTindakan($value->id, NULL, NULL);
									else :
										if ($transaksi === "Hemodialisa") :
											$tindakan = $this->tagihanHemodialisa($value->id);
											$bhp = $this->tagihanBarang($value->id, "BHP");
											$data[$i]->items = array_merge($tindakan, $bhp);
										else :
											if ($transaksi === "Barang") :
												$data[$i]->items = $this->tagihanBarang($value->id, "Resep");
											else :
												if ($transaksi === "BHP") :
													$data[$i]->items = $this->tagihanBarang($value->id, "BHP");
												else :
													if ($transaksi === "PKRT") :
														$data[$i]->items = $this->tagihanPKRT($value->id);
													else :
														if ($transaksi === "Operasi") :
															$data[$i]->items = $this->tagihanOperasi($value->id);
														else :
															if ($transaksi === "Pemulasaran Jenazah") :
																$tindakan = $this->tagihanTindakan($value->id, NULL, NULL);
																$bhp = $this->tagihanBarang($value->id, "BHP");
																$data[$i]->items = array_merge($tindakan, $bhp);
															else :
																if ($transaksi === "Bank Darah") :
																	$tindakan = $this->tagihanBankDarah($value->id);
																	// $barang = $this->tagihanBarangBankDarah($value->id);
																	$data[$i]->items = array_merge($tindakan); // $barang);
																endif;
															endif;
														endif;
													endif;
												endif;
											endif;
										endif;
									endif;
								endif;
							endif;
						endif;
					endif;
				endif;
			endforeach;
		endif;

		return $data;
	}

	function tagihanPasienPiutang($id_pendaftaran, $tanggal = NULL, $is_pendaftaran = NULL, $id_history_pembayaran = NULL)
	{
		$data = array();
		$query = "";

		if ($tanggal !== NULL) :
			$query .= " AND date(ttp.tanggal) = '" . $tanggal . "' ";
		endif;

		if ($is_pendaftaran === NULL) :
			$query .= " AND ttp.is_pendaftaran = 'Tidak' ";
		else :
			$query .= " AND ttp.is_pendaftaran = 'Ya' ";
		endif;

		if ($id_history_pembayaran !== NULL) :
			$query .= " AND ttp.id_history_pembayaran = '" . $id_history_pembayaran . "' ";
		else :
			$query .= " AND ttp.id_history_pembayaran IS NULL";
		endif;

		$sql = "SELECT ttp.*, 
				concat_ws(', kelas ', l.nama, k.nama) as layanan_inap, 
				l.nama as item, 
				tp.keterangan, 
				ttp.total as harga_item, 
				sum(ttp.total) as total, 
				sum(ttp.reimburse) as reimburse, 
				(sum(ttp.total) - sum(ttp.reimburse)) as tagihan, 
				count(*) as frekuensi, 
				CASE WHEN prn.nama = 'Dokter' 
					THEN pg.nama 
					ELSE concat_ws(' ', prn.nama, lp.jenis_layanan) 
				END as nakes
				FROM sm_pendaftaran as pd 
				JOIN sm_layanan_pendaftaran as lp ON (lp.id_pendaftaran = pd.id) 
				JOIN sm_tarif_tindakan_pasien as ttp ON (ttp.id_layanan_pendaftaran = lp.id) 
				JOIN sm_tarif_pelayanan as tp ON (tp.id = ttp.id_tarif_pelayanan) 
				JOIN sm_layanan as l ON (l.id = tp.id_layanan) 
				LEFT JOIN sm_tenaga_medis as tm ON (tm.id = ttp.id_operator) 
				LEFT JOIN sm_pegawai as pg ON (pg.id = tm.id_pegawai) 
				LEFT JOIN sm_profesi_nadis as prn ON (prn.id = tm.id_profesi)
				LEFT JOIN sm_kelas as k ON (k.id = tp.id_kelas) 
				WHERE pd.id = '" . $id_pendaftaran . "' " . $query . " and l.nama != 'Administrasi Pasien Rawat Inap'" . $query . "
				GROUP BY ttp.id, l.nama, k.nama, tp.keterangan, prn.nama, pg.nama, lp.jenis_layanan ";
		$data = $this->db->query($sql)->result();
		return $data;
	}

	function tagihanTindakan($id_layanan_pendaftaran, $tanggal = NULL, $is_pendaftaran = NULL, $id_history_pembayaran = NULL)
	{
		$data = array();
		$query = "";

		if ($tanggal !== NULL) :
			$query .= " AND date(ttp.tanggal) = '" . $tanggal . "' ";
		endif;

		if ($is_pendaftaran === NULL) :
			$query .= " AND ttp.is_pendaftaran = 'Tidak' ";
		else :
			$query .= " AND ttp.is_pendaftaran = 'Ya' ";
		endif;

		if ($id_history_pembayaran !== NULL) :
			$query .= " AND ttp.id_history_pembayaran = '" . $id_history_pembayaran . "' ";
		else :
			$query .= " AND ttp.id_history_pembayaran IS NULL";
		endif;

		$sql = "SELECT ttp.*, 
				concat_ws(', kelas ', l.nama, k.nama) as layanan_inap, 
				l.nama as item, 
				tp.keterangan, 
				ttp.total as harga_item, 
				sum(ttp.total) as total, 
				sum(ttp.reimburse) as reimburse, 
				(sum(ttp.total) - sum(ttp.reimburse)) as tagihan, 
				count(*) as frekuensi, 
				CASE WHEN prn.nama = 'Dokter' 
					THEN pg.nama 
					ELSE concat_ws(' ', prn.nama, lp.jenis_layanan) 
				END as nakes
				FROM sm_pendaftaran as pd 
				JOIN sm_layanan_pendaftaran as lp ON (lp.id_pendaftaran = pd.id) 
				JOIN sm_tarif_tindakan_pasien as ttp ON (ttp.id_layanan_pendaftaran = lp.id) 
				JOIN sm_tarif_pelayanan as tp ON (tp.id = ttp.id_tarif_pelayanan) 
				JOIN sm_layanan as l ON (l.id = tp.id_layanan) 
				LEFT JOIN sm_tenaga_medis as tm ON (tm.id = ttp.id_operator) 
				LEFT JOIN sm_pegawai as pg ON (pg.id = tm.id_pegawai) 
				LEFT JOIN sm_profesi_nadis as prn ON (prn.id = tm.id_profesi)
				LEFT JOIN sm_kelas as k ON (k.id = tp.id_kelas) 
				WHERE lp.id = '" . $id_layanan_pendaftaran . "' " . $query . " and l.nama != 'Administrasi Pasien Rawat Inap'" . $query . "
				GROUP BY ttp.id, l.nama, k.nama, tp.keterangan, prn.nama, pg.nama, lp.jenis_layanan ";
		$data = $this->db->query($sql)->result();
		return $data;
	}

	function tagihanBankDarah($id_layanan_pendaftaran, $id_history_pembayaran = NULL)
	{
		$data = array();
		$query = "";

		if ($id_history_pembayaran !== NULL) :
			$query .= " AND obd.id_history_pembayaran = '" . $id_history_pembayaran . "' ";
		else :
			$query .= " AND obd.id_history_pembayaran IS NULL";
		endif;

		$sql = "SELECT tbd.*, 
				concat_ws(', kelas ', l.nama, k.nama) as layanan_inap, 
				l.nama as item, 
				tp.keterangan, 
				tbd.total as harga_item, 
				sum(tbd.total) as total, 
				sum(tbd.reimburse) as reimburse, 
				(sum(tbd.total) - sum(tbd.reimburse)) as tagihan, 
				count(*) as frekuensi, 
				CASE WHEN prn.nama = 'Dokter' 
					THEN pg.nama 
					ELSE concat_ws(' ', prn.nama, lp.jenis_layanan) 
				END as nakes
				FROM sm_pendaftaran as pd 
				JOIN sm_layanan_pendaftaran as lp ON (lp.id_pendaftaran = pd.id) 
				JOIN sm_order_bank_darah as obd ON (obd.id_layanan_pendaftaran = lp.id)
				JOIN sm_tarif_bank_darah as tbd ON (tbd.id_order_bank_darah = obd.id) 
				JOIN sm_tarif_pelayanan as tp ON (tp.id = tbd.id_tarif) 
				JOIN sm_layanan as l ON (l.id = tp.id_layanan) 
				LEFT JOIN sm_tenaga_medis as tm ON (tm.id = tbd.id_nadis) 
				LEFT JOIN sm_pegawai as pg ON (pg.id = tm.id_pegawai) 
				LEFT JOIN sm_profesi_nadis as prn ON (prn.id = tm.id_profesi)
				LEFT JOIN sm_kelas as k ON (k.id = tp.id_kelas) 
				WHERE lp.id = '" . $id_layanan_pendaftaran . "' " . $query . " GROUP BY tbd.id, l.nama, k.nama, tp.keterangan, prn.nama, pg.nama, lp.jenis_layanan ";
		$data = $this->db->query($sql)->result();
		return $data;
	}

	// function tagihanBarangBankDarah($id_layanan_pendaftaran, $id_history_pembayaran = NULL)
	// {
	// 	$data = array();
	// 	$query = "";
	// 	if ($id_history_pembayaran !== NULL) :
	// 		$query .= " AND penj.id_history_pembayaran = '" . $id_history_pembayaran . "' ";
	// 	else :
	// 		$query .= " AND penj.id_history_pembayaran IS NULL ";
	// 	endif;

	// 	$sql = "SELECT concat_ws(' ', b.nama, b.kekuatan, stn.nama) as item, penjd.harga_jual as harga_item, 
	// 			(penjd.harga_jual * penjd.qty) as total, penjd.qty, penj.waktu as waktu_order, 
	// 			coalesce(pj.nama, '') as penjamin, coalesce(pj.diskon, 0) as diskon,
	// 			(null) as nakes, 
	// 			CASE WHEN pj.diskon IS NOT NULL 
	// 				THEN ((penjd.harga_jual * penjd.qty) * pj.diskon / 100) 
	// 				ELSE 0 
	// 			END as reimburse, 
	// 			(penjd.qty - coalesce((SELECT sum(qty) FROM sm_detur_penjualan WHERE id_kemasan_barang = kb.id AND id_retur_penjualan = rp.id), 0)) as frekuensi 
	// 			FROM sm_detail_penjualan as penjd 
	// 			JOIN sm_penjualan as penj ON (penj.id = penjd.id_penjualan) 
	// 			LEFT JOIN sm_retur_penjualan as rp ON (rp.id_penjualan = penj.id) 
	// 			JOIN sm_kemasan_barang as kb ON (kb.id = penjd.id_kemasan) 
	// 			JOIN sm_barang as b ON (b.id = kb.id_barang) 
	// 			LEFT JOIN sm_satuan as stn ON (stn.id = b.satuan_kekuatan) 
	// 			LEFT JOIN sm_penjamin as pj ON (pj.id = penjd.id_asuransi) 
	// 			WHERE penj.id_layanan_pendaftaran = '" . $id_layanan_pendaftaran . "' 
	// 			AND penj.jenis = 'Bank Darah' AND penj.status_bank_darah = '1' " . $query;
	// 	$data = $this->db->query($sql)->result();
	// 	return $data;
	// }

	function tagihanBarang($id_layanan_pendaftaran, $jenis, $id_history_pembayaran = NULL)
	{
		$data = array();
		$query = "";
		if ($id_history_pembayaran !== NULL) :
			$query .= " AND penj.id_history_pembayaran = '" . $id_history_pembayaran . "' ";
		else :
			$query .= " AND penj.id_history_pembayaran IS NULL ";
		endif;

		if ($jenis === "BHP") :
			$query .= " AND penj.id_resep IS NULL ";
		else :
			$query .= " AND penj.id_resep IS NOT NULL ";
		endif;

		$sql = "SELECT concat_ws(' ', b.nama, b.kekuatan, stn.nama) as item, ceil(penjd.harga_jual) as harga_item, 
				(ceil(penjd.harga_jual) * penjd.qty) as total, penjd.qty, penj.waktu as waktu_order, 
				coalesce(pj.nama, '') as penjamin, coalesce(pj.diskon, 0) as diskon,
				(null) as nakes, 
				CASE WHEN pj.diskon IS NOT NULL 
					THEN ((penjd.harga_jual * penjd.qty) * pj.diskon / 100) 
					ELSE 0 
				END as reimburse, 
				(penjd.qty - coalesce((SELECT sum(qty) FROM sm_detur_penjualan WHERE id_kemasan_barang = kb.id AND id_retur_penjualan = rp.id), 0)) as frekuensi 
				FROM sm_detail_penjualan as penjd 
				JOIN sm_penjualan as penj ON (penj.id = penjd.id_penjualan) 
				LEFT JOIN sm_retur_penjualan as rp ON (rp.id_penjualan = penj.id) 
				JOIN sm_kemasan_barang as kb ON (kb.id = penjd.id_kemasan) 
				JOIN sm_barang as b ON (b.id = kb.id_barang) 
				LEFT JOIN sm_satuan as stn ON (stn.id = b.satuan_kekuatan) 
				LEFT JOIN sm_penjamin as pj ON (pj.id = penjd.id_asuransi) 
				WHERE penj.id_layanan_pendaftaran = '" . $id_layanan_pendaftaran . "' 
				AND penj.jenis != 'Bank Darah' " . $query;
		$data = $this->db->query($sql)->result();
		return $data;
	}

	function tagihanPKRT($id_layanan_pendaftaran, $id_history_pembayaran = NULL)
	{
		$data = array();
		$query = "";
		if (!empty($id_history_pembayaran)) :
			$query .= " AND hp.id_history_pembayaran = '" . $id_history_pembayaran . "' ";
		endif;

		$sql = "select pk.nama as item, tpk.nominal as harga_item, p.tarif as total, p.qty, '' as waktu_order, coalesce(pj.nama, '') as penjamin, coalesce(pj.diskon, 0) as diskon, (null) as nakes, 
						CASE WHEN pj.diskon IS NOT NULL THEN ((tpk.nominal::int * p.qty::int) * pj.diskon / 100) ELSE 0 END as reimburse, p.qty as frekuensi
                from sm_pembayaran_perbekalan_kesehatan p
                join sm_tarif_perbekalan_kesehatan tpk on (p.id_tarif_perbekalan = tpk.id)
								join sm_perbekalan_kesehatan pk on (tpk.id_perbekalan_kesehatan = pk.id)
                join sm_layanan_pendaftaran lp on (p.id_layanan_pendaftaran = lp.id)
                left join sm_penjamin pj on (lp.id_penjamin = pj.id)
                where p.id_layanan_pendaftaran = '" . $id_layanan_pendaftaran . "' " . $query;
		$data = $this->db->query($sql)->result();
		return $data;
	}

	function tagihanPemeriksaanLaboratorium($id_layanan_pendaftaran, $id_history_pembayaran = NULL)
	{
		$data = array();
		$query = "";
		if ($id_history_pembayaran !== NULL) :
			$query .= " AND lab.id_history_pembayaran = '" . $id_history_pembayaran . "'";
		else :
			$query .= " AND lab.id_history_pembayaran IS NULL";
		endif;

		$sql = "SELECT dlab.*,
				concat_ws(' ', l.nama, dlab.cito) as item, dlab.total as harga_item, 
				coalesce(pg.nama, '') as nakes, (1) as frekuensi 
				FROM sm_detail_laboratorium as dlab 
				JOIN sm_tarif_pelayanan as tp ON (tp.id = dlab.id_tarif) 
				JOIN sm_layanan as l ON (l.id = tp.id_layanan) 
				JOIN sm_laboratorium as lab ON (lab.id = dlab.id_laboratorium) 
				LEFT JOIN sm_tenaga_medis as tm ON (tm.id = lab.id_dokter_pjwb) 
				LEFT JOIN sm_pegawai as pg ON (pg.id = tm.id_pegawai) 
				WHERE lab.id_layanan_pendaftaran = '" . $id_layanan_pendaftaran . "' " . $query . " 
				ORDER BY dlab.id";
		$data = $this->db->query($sql)->result();
		return $data;
	}

	function tagihanPemeriksaanRadiologi($id_layanan_pendaftaran, $id_history_pembayaran = NULL)
	{
		$data = array();
		$query = "";
		if ($id_history_pembayaran !== NULL) :
			$query .= " AND rad.id_history_pembayaran = '" . $id_history_pembayaran . "'";
		else :
			$query .= " AND rad.id_history_pembayaran IS NULL";
		endif;

		$sql = "SELECT drad.*, 
				concat_ws(' ', l.nama, drad.cito) as item, drad.total as harga_item, 
				coalesce(pgd.nama, '') as dokter, coalesce(pgr.nama, '') as radiografer, 
				coalesce(pg.nama, '') as nakes, (1) as frekuensi 
				FROM sm_detail_radiologi as drad 
				JOIN sm_tarif_pelayanan as tp ON (tp.id = drad.id_tarif) 
				JOIN sm_layanan as l ON (l.id = tp.id_layanan) 
				JOIN sm_radiologi as rad ON (rad.id = drad.id_radiologi) 
				LEFT JOIN sm_tenaga_medis as tm ON (tm.id = rad.id_dokter_pjwb) 
				LEFT JOIN sm_pegawai as pg ON (pg.id = tm.id_pegawai) 
				LEFT JOIN sm_tenaga_medis as tmd ON (tmd.id = drad.id_dokter) 
				LEFT JOIN sm_pegawai as pgd ON (pgd.id = tmd.id_pegawai) 
				LEFT JOIN sm_tenaga_medis as tmr ON (tmr.id = drad.id_radiografer) 
				LEFT JOIN sm_pegawai as pgr ON (pgr.id = tmr.id_pegawai) 
				WHERE rad.id_layanan_pendaftaran = '" . $id_layanan_pendaftaran . "' " . $query . " 
				ORDER BY drad.id";
		$data = $this->db->query($sql)->result();
		return $data;
	}

	function tagihanPemeriksaanFisioterapi($id_layanan_pendaftaran, $id_history_pembayaran = NULL)
	{
		$data = array();
		$query = "";
		if ($id_history_pembayaran !== NULL) :
			$query .= " AND fisio.id_history_pembayaran = '" . $id_history_pembayaran . "'";
		else :
			$query .= " AND fisio.id_history_pembayaran IS NULL";
		endif;

		$sql = "SELECT dfisio.*, 
				concat_ws(' ', l.nama, dfisio.cito) as item, dfisio.total as harga_item, 
				coalesce(pg.nama, '') as nakes, (1) as frekuensi 
				FROM sm_detail_fisioterapi as dfisio 
				JOIN sm_tarif_pelayanan as tp ON (tp.id = dfisio.id_tarif) 
				JOIN sm_layanan as l ON (l.id = tp.id_layanan) 
				JOIN sm_fisioterapi as fisio ON (fisio.id = dfisio.id_fisioterapi) 
				LEFT JOIN sm_tenaga_medis as tm ON (tm.id = fisio.id_dokter_pjwb) 
				LEFT JOIN sm_pegawai as pg ON (pg.id = tm.id_pegawai) 
				WHERE fisio.id_layanan_pendaftaran = '" . $id_layanan_pendaftaran . "' " . $query . " 
				ORDER BY dfisio.id";
		$data = $this->db->query($sql)->result();
		return $data;
	}

	function tagihanHemodialisa($id_layanan_pendaftaran)
	{
	}

	function tagihanOperasi($id_layanan_pendaftaran, $id_history_pembayaran = NULL)
	{
		$data = array();
		$query = "";
		if ($id_history_pembayaran !== NULL) :
			$query .= " AND ko.id_history_pembayaran = '" . $id_history_pembayaran . "'";
		else :
			$query .= " AND ko.id_history_pembayaran IS NULL";
		endif;
		$sql = "SELECT top.*, CONCAT_WS(', kelas ', CONCAT_WS(', ', l.nama, tp.jenis, tp.bobot), k.nama) as layanan_inap, 
				CONCAT_WS(', ', l.nama, tp.jenis, tp.bobot) as item, tp.keterangan, 
				top.total as harga_item, 
				SUM(top.total) as total, 
				SUM(top.reimburse) as reimburse, 
				(SUM(top.total) - SUM(top.reimburse)) as tagihan, 
				COUNT(*) as frekuensi,
				(
					SELECT COALESCE(pg.nama, '') as operator
					FROM sm_tim_operasi tim
					JOIN sm_jadwal_kamar_operasi jko ON (jko.id = tim.id_jadwal_operasi) 
					JOIN sm_tenaga_medis as tm ON (tm.id = tim.id_nadis)
					JOIN sm_pegawai as pg ON (pg.id = tm.id_pegawai)
					WHERE tim.id_jadwal_operasi = jko.id 
					AND tim.status = 'Dokter Operator' LIMIT 1
				) as tenaga_medis 
				FROM sm_pendaftaran pd 
				JOIN sm_layanan_pendaftaran lp ON (lp.id_pendaftaran = pd.id) 
				JOIN sm_jadwal_kamar_operasi ko ON (ko.id_layanan_pendaftaran = lp.id) 
				JOIN sm_tarif_operasi top ON (top.id_operasi = ko.id) 
				JOIN sm_tarif_pelayanan tp ON (tp.id = top.id_tarif) 
				JOIN sm_layanan l ON (l.id = tp.id_layanan) 
				JOIN sm_kelas k ON (k.id = tp.id_kelas)
				WHERE lp.id = '" . $id_layanan_pendaftaran . "' " . $query . " 
				AND ko.status = 'Confirmed'
				GROUP BY top.id, top.id_tarif, l.nama, tp.jenis, tp.bobot, k.nama, tp.keterangan";
		$data = $this->db->query($sql)->result();
		return $data;
	}

	function generateNoKwitansiPembayaran($id_unit_kasir)
	{
		$sql = "SELECT no_kwitansi FROM sm_history_pembayaran 
				WHERE id_unit_kasir = $id_unit_kasir 
				AND date_part('year', waktu) = " . date('Y') . "  
				AND date_part('month', waktu) = " . date('m') . " 
				AND no_kwitansi IS NOT NULL 
				ORDER BY id DESC 
				LIMIT 1 OFFSET 0";
		$data = $this->db->query($sql)->row();
		$unit_kasir = $this->db->get_where('sm_unit_kasir', ['id' => $id_unit_kasir])->row();
		$last_no = "UNIT-DATE-00000";
		if (0 < count((array)$data)) :
			$last_no = $data->no_kwitansi;
		endif;

		$ex = explode('-', $last_no);
		$no_urut = (int) $ex[2];
		$format = $unit_kasir->kode . '-' . date('d') . date('m') . date('y') . '-';
		return $format . str_pad($no_urut + 1, 5, '0', STR_PAD_LEFT);
	}

	function simpanPembayaranKasir($data)
	{
		// $this->db->trans_begin();
		$id_history_pembayaran = NULL;
		$id_pendaftaran = $data['id_pendaftaran'];
		$tagihan = 0;
		$id_penjamin = NULL;
		$cara_bayar = "Tunai";
		$layanan_pendaftaran = $this->db->select(array("id_penjamin", "cara_bayar"))->where("id_pendaftaran", $id_pendaftaran, true)->get("sm_layanan_pendaftaran")->result();

		foreach ($layanan_pendaftaran as $i => $value) :
			if ($value->id_penjamin !== NULL) :
				$id_penjamin = $value->id_penjamin;
				$cara_bayar = $value->cara_bayar;
				break;
			endif;
		endforeach;

		$data['id_penjamin'] = $id_penjamin;
		$data['cara_bayar'] = $cara_bayar;

		// simpan data
		$this->db->insert("sm_history_pembayaran", $data);
		$id_history_pembayaran = $this->db->insert_id();

		if ($id_penjamin === NULL) :
			$field = 'terbayar';
		else :
			$field = 'reimburse';
		endif;

		$sql = "UPDATE sm_pembayaran SET status = 'Terbayar', " . $field . " = total WHERE id_pendaftaran = '" . $id_pendaftaran . "'";
		$this->db->query($sql);
		$this->setHistoryPembayaran($id_pendaftaran, $id_history_pembayaran, $data['jenis_transaksi']);

		$pembayaran = $this->m_keuangan_ver2->getTotalPembayaran($id_pendaftaran);
		if ($pembayaran['total'] + $pembayaran['reimburse'] <= 0) :
			$this->db->where('id', $id_pendaftaran, true)->update('sm_pendaftaran', ['lunas' => 'Sudah']);
		endif;

		if ($this->db->trans_status() === false) :
			$this->db->trans_rollback();
			$status = false;
		else :
			$this->db->trans_commit();
			$status = true;
		endif;

		return array('status' => $status, 'id_pendaftaran' => $id_pendaftaran, 'id_history_pembayaran' => $id_history_pembayaran, 'transaksi' => $data['jenis_transaksi']);
	}

	function simpanPembayaranKasirPiutang($data, $data_piutang)
	{
		// $this->db->trans_begin();
		$id_history_pembayaran = NULL;
		$id_pendaftaran = $data['id_pendaftaran'];
		$tagihan = 0;
		$id_penjamin = NULL;
		$cara_bayar = "Tunai";
		$layanan_pendaftaran = $this->db->select(array("id_penjamin", "cara_bayar"))->where("id_pendaftaran", $id_pendaftaran, true)->get("sm_layanan_pendaftaran")->result();

		foreach ($layanan_pendaftaran as $i => $value) :
			if ($value->id_penjamin !== NULL) :
				$id_penjamin = $value->id_penjamin;
				$cara_bayar = $value->cara_bayar;
				break;
			endif;
		endforeach;

		$data['id_penjamin'] = $id_penjamin;
		$data['cara_bayar'] = $cara_bayar;

		// simpan data
		$this->db->insert("sm_history_pembayaran", $data);
		$id_history_pembayaran = $this->db->insert_id();

		$data_piutang['id_history_pembayaran'] = $id_history_pembayaran;
		$data_piutang['status'] = "Konfirm";
		$this->db->insert("sm_piutang_pasien", $data_piutang);
		$this->db->where('id', safe_post('id_pendaftaran'), true)->update('sm_pendaftaran', ['is_piutang' => 'TRUE']);

		// Jika sudah Lunas 
		if ($data_piutang['pembayaran_ke'] == "Pelunasan") {
			if ($id_penjamin === NULL) :
				$field = 'terbayar';
			else :
				$field = 'reimburse';
			endif;

			$sql = "UPDATE sm_pembayaran SET status = 'Terbayar', " . $field . " = total WHERE id_pendaftaran = '" . $id_pendaftaran . "'";
			$this->db->query($sql);
			$this->setHistoryPembayaran($id_pendaftaran, $id_history_pembayaran, "all");

			$pembayaran = $this->m_keuangan_ver2->getTotalPembayaran($id_pendaftaran);
			if ($pembayaran['total'] + $pembayaran['reimburse'] <= 0) :
				$this->db->where('id', $id_pendaftaran, true)->update('sm_pendaftaran', ['lunas' => 'Sudah']);
			endif;
		}
		// End

		if ($this->db->trans_status() === false) :
			$this->db->trans_rollback();
			$status = false;
		else :
			$this->db->trans_commit();
			$status = true;
		endif;

		return array('status' => $status, 'id_pendaftaran' => $id_pendaftaran, 'id_history_pembayaran' => $id_history_pembayaran, 'transaksi' => $data['jenis_transaksi']);
	}

	function cekPembayaranPiutang($id_pendaftaran)
	{
		$subquery = "(SELECT pembayaran_ke FROM sm_piutang_pasien AS pp WHERE pp.id_pendaftaran = '" . $id_pendaftaran . "' AND status != 'Batal' ORDER BY pp.id DESC LIMIT 1 OFFSET 0) as pembayaran_ke";

		$this->db->select('COALESCE(SUM(total_bayar), 0) as total');
		$this->db->select($subquery);
		$this->db->from('sm_piutang_pasien');
		$this->db->where('id_pendaftaran', $id_pendaftaran);
		$this->db->where('status !=', 'Batal');

		$query = $this->db->get();

		return $query->row();
	}

	function setHistoryPembayaran($id_pendaftaran, $id_history_pembayaran, $transaksi, $layanan_pendaftaran = "")
	{
		$this->db->select("*")->from("sm_layanan_pendaftaran")->where("id_pendaftaran", $id_pendaftaran, true);
		if ($transaksi === "Poliklinik") :
			$this->db->where("jenis_layanan", "Poliklinik", true);
		else :
			if ($transaksi === "IGD") :
				$this->db->where("jenis_layanan", "IGD", true);
			else :
				if ($transaksi === "Hemodialisa") :
					$this->db->where("jenis_layanan", "Hemodialisa", true);
				else :
					if ($transaksi === "Rawat Inap") :
						$this->db->where("(jenis_layanan = 'IGD' or jenis_layanan = 'Rawat Inap' or jenis_layanan = 'Intensive Care' )");
					else :
						if ($transaksi === "Intensive Care") :
							$this->db->where("(jenis_layanan = 'Intensive Care')");
						else :
							if ($transaksi === "Pemulasaran Jenazah") :
								$this->db->where("(jenis_layanan = 'Pemulasaran Jenazah')");
							endif;
						endif;
					endif;
				endif;
			endif;
		endif;
		$lp =  $this->db->get()->result();
		$id_layanan_pendaftaran = NULL;
		foreach ($lp as $i => $value) :
			$history_pembayaran = ['id_history_pembayaran' => $id_history_pembayaran];
			$id_layanan_pendaftaran = $value->id;

			if ($transaksi === "all" | $transaksi === "Poliklinik" | $transaksi === "IGD" | $transaksi === "Rawat Inap" | $transaksi === "Intensive Care" | $transaksi === "Medical Check Up" | $transaksi === "Hemodialisa" | $transaksi === "Pemulasaran Jenazah") :
				$this->db->where(['id_layanan_pendaftaran' => $value->id, 'id_history_pembayaran' => NULL])->update("sm_tarif_tindakan_pasien", $history_pembayaran);
				$this->db->where(['id_layanan_pendaftaran' => $value->id, 'id_history_pembayaran' => NULL])->update("sm_laboratorium", $history_pembayaran);
				$this->db->where(['id_layanan_pendaftaran' => $value->id, 'id_history_pembayaran' => NULL])->update("sm_radiologi", $history_pembayaran);
				$this->db->where(['id_layanan_pendaftaran' => $value->id, 'id_history_pembayaran' => NULL])->update("sm_fisioterapi", $history_pembayaran);
				$this->db->where(['id_layanan_pendaftaran' => $value->id, 'id_history_pembayaran' => NULL])->update("sm_penjualan", $history_pembayaran);
				$this->db->where(['id_layanan_pendaftaran' => $value->id, 'id_history_pembayaran' => NULL])->update("sm_jadwal_kamar_operasi", $history_pembayaran);
				$this->db->where(['id_layanan_pendaftaran' => $value->id, 'id_history_pembayaran' => NULL])->update("sm_order_bank_darah", $history_pembayaran);
				$this->db->where(['id_layanan_pendaftaran' => $value->id, 'id_history_pembayaran' => NULL, "id_resep" => NULL])->update("sm_penjualan", $history_pembayaran);
				$this->db->where("id_layanan_pendaftaran = '" . $value->id . "' and id_history_pembayaran is null and waktu_keluar is not null")->update("sm_rawat_inap", $history_pembayaran);
				$this->db->where("id_layanan_pendaftaran = '" . $value->id . "' and id_history_pembayaran is null and waktu_keluar is not null")->update("sm_intensive_care", $history_pembayaran);
				$this->db->where("id_layanan_pendaftaran = '" . $value->id . "' and id_history_pembayaran is null and id_resep is not null")->update("sm_penjualan", $history_pembayaran);
				$this->db->where("id_layanan_pendaftaran = '" . $value->id . "' and id_history_pembayaran is null and jenis = 'Bank Darah'")->update("sm_penjualan_bank_darah", $history_pembayaran);

				$operasi = $this->db->select("id")->where("id_history_pembayaran", $id_history_pembayaran)->get("sm_jadwal_kamar_operasi")->row();
				if (0 < count((array)$operasi)) :
					$this->db->where(["id_operasi" => $operasi->id, "id_history_pembayaran" => NULL, "id_resep" => NULL])->update("sm_penjualan", $history_pembayaran);
				endif;

				$this->db->where(['id_layanan_pendaftaran' => $value->id, 'id_history_pembayaran' => NULL])->update("sm_hemodialisa", $history_pembayaran);
				$this->db->where("id_layanan_pendaftaran = '" . $value->id . "' and id_history_pembayaran is null ")->update("sm_pembayaran_perbekalan_kesehatan", ['id_history_pembayaran' => $id_history_pembayaran, 'status' => 'Terbayar']);
			else :
				if ($transaksi === "Pendaftaran") :
					$this->db->where(['id_layanan_pendaftaran' => $value->id, 'id_history_pembayaran' => NULL, 'is_pendaftaran' => 'Ya'])->update("sm_tarif_tindakan_pasien", $history_pembayaran);
				else :
					if ($transaksi === "Tindakan") :
						$this->db->where(['id_layanan_pendaftaran' => $value->id, 'id_history_pembayaran' => NULL, 'is_pendaftaran' => 'Tidak'])->update("sm_tarif_tindakan_pasien", $history_pembayaran);
						$this->db->where(['id_layanan_pendaftaran' => $value->id, 'id_history_pembayaran' => NULL, 'id_resep' => NULL])->update("sm_penjualan", $history_pembayaran);
					else :
						if ($transaksi === "Laboratorium") :
							$this->db->where(['id_layanan_pendaftaran' => $value->id, 'id_history_pembayaran' => NULL])->update("sm_laboratorium", $history_pembayaran);
						else :
							if ($transaksi === "Radiologi") :
								$this->db->where(['id_layanan_pendaftaran' => $value->id, 'id_history_pembayaran' => NULL])->update("sm_radiologi", $history_pembayaran);
							else :
								if ($transaksi === "Fisioterapi") :
									$this->db->where(['id_layanan_pendaftaran' => $value->id, 'id_history_pembayaran' => NULL])->update("sm_fisioterapi", $history_pembayaran);
								else :
									if ($transaksi === "Barang") :
										$this->db->where("id_layanan_pendaftaran = '" . $value->id . "' and id_history_pembayaran is null and id_resep is not null")->update("sm_penjualan", $history_pembayaran);
									else :
										if ($transaksi === "BHP") :
											$this->db->where(['id_layanan_pendaftaran' => $value->id, 'id_history_pembayaran' => NULL, 'id_resep' => NULL])->update("sm_penjualan", $history_pembayaran);
										else :
											if ($transaksi === "PKRT") :
												$this->db->where("id_layanan_pendaftaran = '" . $value->id . "' and id_history_pembayaran is null")->update("sm_pembayaran_perbekalan_kesehatan", ['id_history_pembayaran' => $id_history_pembayaran, 'status' => 'Terbayar']);
											else :
												if ($transaksi === "Operasi") :
													$this->db->where(['id_layanan_pendaftaran' => $value->id, 'id_history_pembayaran' => NULL])->update("sm_jadwal_kamar_operasi", $history_pembayaran);
												else :
													if ($transaksi === "Bank Darah") :
														$this->db->where(['id_layanan_pendaftaran' => $value->id, 'id_history_pembayaran' => NULL])->update("sm_order_bank_darah", $history_pembayaran);
														$this->db->where(['id_layanan_pendaftaran' => $value->id, 'id_history_pembayaran' => NULL, 'jenis' => 'Bank Darah'])->update("sm_penjualan_bank_darah", $history_pembayaran);
													else :
														if ($transaksi === "Hemodialisa") :
															$this->db->where(['id_layanan_pendaftaran' => $value->id, 'id_history_pembayaran' => NULL])->update("sm_hemodialisa", $history_pembayaran);
														else :
															if ($transaksi === "Pemulasaran Jenazah") :
																$this->db->where(['id_layanan_pendaftaran' => $value->id, 'id_history_pembayaran' => NULL])->update("sm_tarif_tindakan_pasien", $history_pembayaran);
																$this->db->where(['id_layanan_pendaftaran' => $value->id, 'id_history_pembayaran' => NULL, 'id_resep' => NULL])->update("sm_penjualan", $history_pembayaran);
															endif;
														endif;
													endif;
												endif;
											endif;
										endif;
									endif;
								endif;
							endif;
						endif;
					endif;
				endif;
			endif;
		endforeach;

		$this->db->where('id', $id_history_pembayaran, true)->update("sm_history_pembayaran", ['id_layanan_pendaftaran' => $id_layanan_pendaftaran]);
	}

	function batalPembayaran($id)
	{
		$this->db->trans_begin();
		$message = '';
		$data_history_pembayaran = $this->db->where('id', $id)->get('sm_history_pembayaran')->row();
		$data_pendaftaran = $this->db->select("id_pendaftaran")->where('id', $id, true)->get('sm_history_pembayaran')->row();

		$data_update = ['id_history_pembayaran' => NULL];

		if ($data_history_pembayaran->jenis_transaksi == "Piutang Pasien" || $data_history_pembayaran->jenis_transaksi == "Layanan Pasien") {
			// Tambahan Wahyu sm_piutang_pasien Ketika Dibatalkan
			$tables = [
				'sm_tarif_tindakan_pasien',
				'sm_penjualan',
				'sm_laboratorium',
				'sm_radiologi',
				'sm_fisioterapi',
				'sm_order_bank_darah',
				'sm_jadwal_kamar_operasi',
				'sm_rawat_inap',
				'sm_intensive_care',
				'sm_hemodialisa'
			];

			$subquery = $this->db->select('id')
				->from('sm_history_pembayaran')
				->where('id_pendaftaran', $data_pendaftaran->id_pendaftaran)
				->get_compiled_select();

			foreach ($tables as $table) {
				$this->db->where("id_history_pembayaran IN ($subquery)", NULL, FALSE)
					->update($table, $data_update);
			}

			$data_update_piutang_pasien = [
				'status' => 'Batal',
				'total_bayar' => 0,
			];
			$this->db->where('id_history_pembayaran', $id, true)->update('sm_piutang_pasien', $data_update_piutang_pasien);

			$piutang_records = $this->db->select('id, id_pendaftaran, tanggal_bayar')
				->where('id_pendaftaran', $data_pendaftaran->id_pendaftaran)
				->where('status !=', 'Batal')
				->order_by('tanggal_bayar', 'ASC')
				->get('sm_piutang_pasien')
				->result_array();

			// Update the 'pembayaran_ke' for these records
			$pembayaran_ke = 1;
			foreach ($piutang_records as $record) {
				$this->db->where('id', $record['id'])
					->update('sm_piutang_pasien', ['pembayaran_ke' => $pembayaran_ke]);
				$pembayaran_ke++;
			}
			// End
		} else {
			$this->db->where('id_history_pembayaran', $id, true)->update('sm_tarif_tindakan_pasien', $data_update);
			$this->db->where('id_history_pembayaran', $id, true)->update('sm_penjualan', $data_update);
			$this->db->where('id_history_pembayaran', $id, true)->update('sm_laboratorium', $data_update);
			$this->db->where('id_history_pembayaran', $id, true)->update('sm_radiologi', $data_update);
			$this->db->where('id_history_pembayaran', $id, true)->update('sm_fisioterapi', $data_update);
			$this->db->where('id_history_pembayaran', $id, true)->update('sm_order_bank_darah', $data_update);
			$this->db->where('id_history_pembayaran', $id, true)->update('sm_jadwal_kamar_operasi', $data_update);
			$this->db->where('id_history_pembayaran', $id, true)->update('sm_rawat_inap', $data_update);
			$this->db->where('id_history_pembayaran', $id, true)->update('sm_intensive_care', $data_update);
			$this->db->where('id_history_pembayaran', $id, true)->update('sm_hemodialisa', $data_update);
			$this->db->where('id_history_pembayaran', $id, true)->update('sm_pembayaran_perbekalan_kesehatan', ['id_history_pembayaran' => NULL, 'status' => 'Tagihan']);
		}

		$data_update_history_pembayaran = [
			'status' => 'Batal',
			'tunai' => 0,
			'non_tunai' => 0,
			'serah' => 0,
			'pembulatan' => 0,
			'nominal' => 0,
			'jumlah_bayar' => 0
		];
		$this->db->where('id', $id, true)->update('sm_history_pembayaran', $data_update_history_pembayaran);

		if (0 < count((array)$data_pendaftaran)) :
			$this->db->where('id', $data_pendaftaran->id_pendaftaran, true)->update('sm_pendaftaran', array('lunas' => 'Belum'));
		endif;

		$data_pembayaran_lain = $this->db->select(['id'])->where('id_history_pembayaran', $id, true)->get('sm_pembayaran_lain')->row();
		if (0 < count((array)$data_pembayaran_lain)) :
			$data_update_pembayaran_lain = ['jasa_klinik' => 0, 'jasa_nadis' => 0, 'bhp' => 0, 'total' => 0];
			$this->db->where('id', $data_pembayaran_lain->id)->update('sm_pembayaran_lain', $data_update_pembayaran_lain);
		endif;

		if ($this->db->trans_status() === false) :
			$this->db->trans_rollback();
			$status = false;
			$message = 'Gagal melakukan transaksi pembatalan pembayaran';
		else :
			$this->db->trans_commit();
			$status = true;
			$message = 'Berhasil melakukan transaksi pembatalan pembayaran';

			// lakukan pencatatan log
			$data_layanan_pendaftaran = $this->db->select('id')->from('sm_layanan_pendaftaran')->where('id_pendaftaran', $data_pendaftaran->id_pendaftaran, true)->order_by('id')->limit(1, 0)->get()->row();
			if (0 < count((array)$data_layanan_pendaftaran)) :
				$catatan =  "No. Kwitansi " . $data_history_pembayaran->no_kwitansi . ", transaksi " . $data_history_pembayaran->jenis_transaksi . ", nominal Rp " . currency($data_history_pembayaran->tunai + $data_history_pembayaran->non_tunai);

				$this->load->model('logs/Logs_model', 'logs');
				$this->logs->recordAdminLogs($data_layanan_pendaftaran->id, 'Pembatalan Pembayaran', $catatan);
			endif;
		endif;

		return array('status' => $status, 'message' => $message);
	}

	function getTotalPembayaran($id_pembayaran, $id_history_pembayaran)
	{
		$data = $this->db->select('coalesce(sum(nominal), 0) as total_bayar')->from('sm_history_pembayaran')->where('id_pembayaran', $id_pembayaran, true)->where('id < ' . $id_history_pembayaran)->get()->row();
		return $data->total_bayar;
	}

	function simpanPembayaranNonResep()
	{
		$unit_kasir = $this->session->userdata('unit_kasir');
		if ($unit_kasir !== '') :
			$this->db->trans_begin();
			$result['message'] = 'Gagal melakukan pembayaran non resep';

			$data = [
				'id' => safe_post('id_penjualan'),
				'bayar' => currencyToNumber(safe_post('bayar')),
				'tunai' => currencyToNumber(safe_post('serah')),
			];
			$this->db->where('id', $data['id'])->update('sm_penjualan', $data);
			if ($this->db->trans_status() === false) :
				$this->db->trans_rollback();
				$result['status'] = false;
			endif;

			$data_bayar = [
				'id_penjualan' => safe_post('id_penjualan'),
				'waktu' => $this->datetime,
				'nominal' => currencyToNumber(safe_post('bayar')),
				'id_unit' => $this->session->userdata('id_unit'),
				'id_users' => $this->session->userdata('id_translucent'),
				'shift' => $this->session->userdata('shift'),
			];
			$this->db->insert('sm_pembayaran_penjualan_non_resep', $data_bayar);
			if ($this->db->trans_status() === false) :
				$this->db->trans_rollback();
				$result['status'] = false;
			endif;

			$no_kwitansi = $this->generateNoKwitansiPembayaran($unit_kasir);
			$data_history = array(
				'id_unit_kasir' => $unit_kasir,
				'no_kwitansi' => $no_kwitansi,
				'jenis_transaksi' => 'Penjualan Bebas',
				'waktu' => $this->datetime,
				'id_users' => $this->session->userdata('id_translucent'),
				'shift' => getShiftNow(),
				'nominal' => safe_post('nominal'),
				'tunai' => safe_post('nominal'),
				'non_tunai' => 0,
				'serah' => $data['tunai'],
				'pembulatan' => $data['bayar'] - safe_post('nominal'),
				'pembayaran' => 1,
				'status' => 'Konfirm',
				'terima_dari' => safe_post('diterima_dari'),
				'jumlah_bayar' => safe_post('nominal'),
			);
			$this->db->insert('sm_history_pembayaran', $data_history);
			$id_history_pembayaran = $this->db->insert_id();
			if ($this->db->trans_status() === false) :
				$this->db->trans_rollback();
				$result['status'] = false;
			endif;
			$this->db->where('id', $data['id'], true)->update('sm_penjualan', ['id_history_pembayaran' => $id_history_pembayaran]);
			if ($this->db->trans_status() === false) :
				$this->db->trans_rollback();
				$result['status'] = false;
			else :
				$this->db->trans_commit();
				$result['status'] = true;
				$result['id'] = safe_post('id_penjualan');
				$result['message'] = 'Berhasil melakukan pembayaran non resep';
			endif;
		else :
			$result = ['status' => false, 'id' => NULL, 'message' => 'Gagal melakukan pembayaran penjualan bebas, Loket belum dipilih'];
		endif;
		return $result;
	}

	function batalPembayaranNonResep($id)
	{
		$this->db->trans_begin();
		$result['message'] = 'Gagal melakukan pembatalan pembayaran non resep';
		$this->db->delete('sm_pembayaran_penjualan_non_resep', ['id_penjualan' => $id]);
		if ($this->db->trans_status() === false) :
			$this->db->trans_rollback();
			$result['status'] = false;
		endif;
		$id_history_pembayaran = $this->db->get_where('sm_penjualan', array('id' => $id))->row()->id_history_pembayaran;
		$data_history_pembayaran = array(
			'tunai' => 0,
			'non_tunai' => 0,
			'serah' => 0,
			'pembulatan' => 0,
			'status' => 'Batal',
			'jumlah_bayar' => 0,
		);
		$this->db->where('id', $id_history_pembayaran)->update('sm_history_pembayaran', $data_history_pembayaran);
		if ($this->db->trans_status() === false) :
			$this->db->trans_rollback();
			$result['status'] = false;
		endif;
		$this->db->where('id', $id)->update('sm_penjualan', array('bayar' => '0', 'tunai' => '0', 'id_history_pembayaran' => NULL));
		if ($this->db->trans_status() === false) :
			$this->db->trans_rollback();
			$result['status'] = false;
		else :
			$this->db->trans_commit();
			$result['status'] = true;
			$result['message'] = 'Berhasil melakukan pembatalan pembayaran non resep';
		endif;
		return $result;
	}
}
