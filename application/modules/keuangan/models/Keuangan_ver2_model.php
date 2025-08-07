<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Keuangan_ver2_model extends CI_Model
{

	function __construct()
	{
		parent::__construct();
		$this->datetime = date("Y-m-d H:i:s");
	}

	function getTotalPembayaran($id_pendaftaran, $transaksi = "all", $jenis_layanan = NULL, $layanan_pendaftaran = "")
	{
		$lp = explode(",", $layanan_pendaftaran);
		$param = "";
		$sql = "select lp.*, COALESCE(pj.diskon, 0) as diskon
				from sm_layanan_pendaftaran as lp 
				left join sm_penjamin as pj on (pj.id = lp.id_penjamin) 
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
							endif;
						endif;
					endif;
				endif;
			endif;
		endif;

		$query = $this->db->query($sql . $param)->result();
		$bill = 0;
		$total = 0;
		$grand_total = 0;
		$reimburse = 0;
		foreach ($query as $i => $value) :
			if ($layanan_pendaftaran !== "" && !in_array($value->id, $lp)) {
				continue;
			}
			if ($transaksi === "all") :
				$bill = $this->hitungTotalTindakan($value->id);
				$total += $bill["total"];
				$bill = $this->hitungTotalPenunjang($value->id, "sm_laboratorium", "sm_detail_laboratorium");
				$total += $bill["total"];
				$bill = $this->hitungTotalPenunjang($value->id, "sm_radiologi", "sm_detail_radiologi");
				$total += $bill["total"];
				$bill = $this->hitungTotalPenunjang($value->id, "sm_fisioterapi", "sm_detail_fisioterapi");
				$total += $bill["total"];
				$bill = $this->hitungTotalBarang($value->id, "Resep");
				$total += $bill["total"];
				$bill = $this->hitungTotalBarang($value->id, "BHP");
				$total += $bill["total"];
				$bill = $this->hitungTotalPKRT($value->id);
				$total += $bill["total"];
				$bill = $this->hitungTotalBarangOperasi($value->id);
				$total += $bill["total"];
				$bill = $this->hitungTotalOperasi($value->id);
				$total += $bill["total"];
				$bill = $this->hitungTotalKamar($value->id);
				$total += $bill["total"];
				$bill = $this->hitungTotalKamarIcare($value->id);
				$total += $bill["total"];
				// $bill = $this->hitungTotalAdministrasiRanap($value->id);
				// $total += $bill["total"];
				// $bill = $this->hitungTotalAdministrasiIcare($value->id);
				// $total += $bill["total"];
				$bill = $this->hitungTotalBankDarah($value->id);
				$total += $bill["total"];
				// $bill = $this->hitungTotalBarangBankDarah($value->id);
				// $total += $bill["total"];
				$bill = $this->hitungTotalHemodialisa($value->id);
				$total += $bill["total"];
			else :
				if ($transaksi === "Pendaftaran") :
					$bill = $this->hitungTotalTindakan($value->id, "Ya");
					$total += $bill["total"];
				else :
					if ($transaksi === "Tindakan") :
						$bill = $this->hitungTotalTindakan($value->id, "Tidak");
						$total += $bill["total"];
						$bill = $this->hitungTotalBarang($value->id, "BHP");
						$total += $bill["total"];
					else :
						if ($transaksi === "Laboratorium") :
							$bill = $this->hitungTotalPenunjang($value->id, "sm_laboratorium", "sm_detail_laboratorium");
							$total += $bill["total"];
						else :
							if ($transaksi === "Radiologi") :
								$bill = $this->hitungTotalPenunjang($value->id, "sm_radiologi", "sm_detail_radiologi");
								$total += $bill["total"];
							else :
								if ($transaksi === "Fisioterapi") :
									$bill = $this->hitungTotalPenunjang($value->id, "sm_fisioterapi", "sm_detail_fisioterapi");
									$total += $bill["total"];
								else :
									if ($transaksi === "Obgyn") :
										$bill = $this->hitungTotalTindakan($value->id, "Tidak");
										$total += $bill["total"];
									else :
										if ($transaksi === "Hemodialisa") :
											$bill = $this->hitungTotalHemodialisa($value->id);
											$total += $bill["total"];
											$bill = $this->hitungTotalBarang($value->id, "BHP");
											$total += $bill["total"];
										else :
											if ($transaksi === "PKRT") :
												$bill = $this->hitungTotalPKRT($value->id);
												$total += $bill["total"];
											else :
												if ($transaksi === "Barang") :
													$bill = $this->hitungTotalBarang($value->id, "Resep");
													$total += $bill["total"];
												else :
													if ($transaksi === "BHP") :
														$bill = $this->hitungTotalBarang($value->id, "BHP");
														$total += $bill["total"];
													else :
														if ($transaksi === "Operasi") :
															$bill = $this->hitungTotalOperasi($value->id);
															$total += $bill["total"];
														else :
															if ($transaksi === "Pemulasaran Jenazah") :
																$bill = $this->hitungTotalTindakan($value->id, "Tidak");
																$total += $bill["total"];
																$bill = $this->hitungTotalBarang($value->id, "BHP");
																$total += $bill["total"];
															else :
																if ($transaksi === 'Bank Darah') :
																	$bill = $this->hitungTotalBankDarah($value->id);
																	$total += $bill["total"];
																// $bill = $this->hitungTotalBarangBankDarah($value->id);
																// $total += $bill["total"];
																else :
																	if ($transaksi === "MCU") :
																		$bill = $this->hitungTotalTindakan($value->id);
																		$total += $bill["total"];
																		$bill = $this->hitungTotalPenunjang($value->id, "sm_laboratorium", "sm_detail_laboratorium");
																		$total += $bill["total"];
																		$bill = $this->hitungTotalPenunjang($value->id, "sm_radiologi", "sm_detail_radiologi");
																		$total += $bill["total"];
																		$bill = $this->hitungTotalPenunjang($value->id, "sm_fisioterapi", "sm_detail_fisioterapi");
																		$total += $bill["total"];
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
				endif;
			endif;

			// if ($this->session->userdata('account') === 'faizmsyam') :
			// 	var_dump($value);
			// endif;
			if ($value->id_penjamin !== NULL && $value->id_penjamin !== '9') :
				$reimburse += $total;
			endif;

			$grand_total += $total;
			$total = 0;
		endforeach;

		return array("total" => (float) $grand_total, 'reimburse' => (float) $reimburse);
	}

	function hitungTagihan($id_pendaftaran)
	{
		$param = "";
		$sql = "select lp.*, COALESCE(pj.diskon, 0) as diskon 
				from sm_layanan_pendaftaran as lp 
				left join sm_penjamin as pj on (pj.id = lp.id_penjamin) 
				where lp.id_pendaftaran = '" . $id_pendaftaran . "' ";
		$query = $this->db->query($sql . $param)->result();
		$bill = 0;
		$total = 0;
		$grandTotal = 0;
		foreach ($query as $i => $value) :
			$bill = $this->hitungTotalTindakan($value->id);
			$total += $bill["total"];
			$bill = $this->hitungTotalPenunjang($value->id, "sm_laboratorium", "sm_detail_laboratorium");
			$total += $bill["total"];
			$bill = $this->hitungTotalPenunjang($value->id, "sm_radiologi", "sm_detail_radiologi");
			$total += $bill["total"];
			$bill = $this->hitungTotalPenunjang($value->id, "sm_fisioterapi", "sm_detail_fisioterapi");
			$total += $bill["total"];
			$bill = $this->hitungTotalBarang($value->id, "Resep");
			$total += $bill["total"];
			$bill = $this->hitungTotalBarang($value->id, "BHP");
			$total += $bill["total"];
			$bill = $this->hitungTotalPKRT($value->id);
			$total += $bill["total"];
			$bill = $this->hitungTotalBarangOperasi($value->id);
			$total += $bill["total"];
			$bill = $this->hitungTotalOperasi($value->id);
			$total += $bill["total"];
			$bill = $this->hitungTotalKamar($value->id);
			$total += $bill["total"];
			$bill = $this->hitungTotalKamarIcare($value->id);
			$total += $bill["total"];
			// $bill = $this->hitungTotalAdministrasiRanap($value->id);
			// $total += $bill["total"];
			// $bill = $this->hitungTotalAdministrasiIcare($value->id);
			// $total += $bill["total"];
			$bill = $this->hitungTotalBankDarah($value->id);
			$total += $bill["total"];
			// $bill = $this->hitungTotalBarangBankDarah($value->id);
			// $total += $bill["total"];
			$bill = $this->hitungTotalHemodialisa($value->id);
			$total += $bill["total"];

			$grandTotal += $total;
			$total = 0;
		endforeach;

		return round($grandTotal);
	}

	function hitungTotalTindakan($id_layanan_pendaftaran, $is_pendaftaran = NULL, $id_history_pembayaran = NULL)
	{
		$param = "";
		if ($is_pendaftaran !== NULL) :
			$param = "and ttp.is_pendaftaran = '" . $is_pendaftaran . "' ";
		endif;
		if ($id_history_pembayaran !== "") :
			if ($id_history_pembayaran === NULL) :
				$param .= " and ttp.id_history_pembayaran is null";
			else :
				$param .= " and ttp.id_history_pembayaran = '" . $id_history_pembayaran . "' ";
			endif;
		endif;
		$sql = "select sum(ttp.total) as total, sum(ttp.reimburse) as reimburse 
				from sm_tarif_tindakan_pasien as ttp 
				where ttp.id_layanan_pendaftaran = '" . $id_layanan_pendaftaran . "' " . $param . " 
				and (ttp.id_tarif_pelayanan != '139' and ttp.id_tarif_pelayanan != '1511') ";
		$query = $this->db->query($sql)->row();
		$total = $query->total;
		if ($total === NULL) :
			$total = 0;
		endif;
		$reimburse = $query->reimburse;
		if ($reimburse === NULL) :
			$reimburse = 0;
		endif;
		$status = true;
		if ($total <= 0 & $reimburse <= 0) :
			$status = false;
		endif;

		return array("total" => (float) $total, "reimburse" => (float) $reimburse, "status" => $status);
	}

	function hitungTotalPenunjang($id_layanan_pendaftaran, $table, $table_detail, $id_history_pembayaran = NULL)
	{
		$sql = "select a.* from " . $table . " as a where a.id_layanan_pendaftaran = '" . $id_layanan_pendaftaran . "' ";
		if ($id_history_pembayaran !== '') :
			if ($id_history_pembayaran === NULL) :
				$sql .= " and a.id_history_pembayaran is null";
			else :
				$sql .= " and a.id_history_pembayaran = '" . $id_history_pembayaran . "' ";
			endif;
		endif;
		$data = $this->db->query($sql)->result();
		$id_ = "da.id_laboratorium";
		if ($table === "sm_radiologi") :
			$id_ = "da.id_radiologi";
		else :
			if ($table === "sm_fisioterapi") :
				$id_ = "da.id_fisioterapi";
			endif;
		endif;
		$total = 0;
		$reimburse = 0;
		foreach ($data as $i => $value) :
			$sql = "select sum(da.total) as total, sum(da.reimburse) as reimburse 
					from " . $table_detail . " as da 
					where " . $id_ . " = '" . $value->id . "' ";
			$query = $this->db->query($sql)->row();
			$total += $query->total;
			$reimburse += $query->reimburse;
		endforeach;

		$status = true;
		if ($total <= 0 & $reimburse <= 0) :
			$status = false;
		endif;

		return array("total" => (float) $total, "reimburse" => (float) $reimburse, "status" => $status);
	}

	function hitungTotalBarang($id_layanan_pendaftaran, $jenis, $id_history_pembayaran = NULL)
	{
		$sql = "select pjn.*, (null) as detail, pjn.waktu as waktu_konfirm, (pjn.total) as tagihan 
				from sm_penjualan as pjn 
				left join sm_retur_penjualan as rpjn on (rpjn.id_penjualan = pjn.id) 
				where pjn.id_layanan_pendaftaran = '" . $id_layanan_pendaftaran . "' 
				and pjn.jenis != 'Bank Darah'";
		if ($jenis === "BHP") :
			$sql .= "and pjn.id_resep is null";
		else :
			$sql .= "and pjn.id_resep is not null";
		endif;

		if ($id_history_pembayaran !== "") :
			if ($id_history_pembayaran === NULL) :
				$sql .= " and pjn.id_history_pembayaran is null";
			else :
				$sql .= " and pjn.id_history_pembayaran = '" . $id_history_pembayaran . "'";
			endif;
		endif;

		$obat = $this->db->query($sql)->result();
		$total = 0;
		$reimburse = 0;
		$dataDetail = NULL;
		foreach ($obat as $i => $value) :
			$sql = "select (pjnd.qty - COALESCE((select sum(qty) from sm_detur_penjualan where id_kemasan_barang = kb.id and id_retur_penjualan = rp.id), 0)) as qty,
					((pjnd.qty - COALESCE((select sum(qty) from sm_detur_penjualan where id_kemasan_barang = kb.id and id_retur_penjualan = rp.id), 0)) * pjnd.reimburse) as reimbuse, 
					(ceil(pjnd.harga_jual) * (pjnd.qty - COALESCE((select sum(qty) from sm_detur_penjualan where id_kemasan_barang = kb.id and id_retur_penjualan = rp.id), 0))) as total 
					from sm_detail_penjualan as pjnd 
					join sm_penjualan as pjn on (pjn.id = pjnd.id_penjualan) 
					left join sm_retur_penjualan as rp on (rp.id_penjualan = pjn.id) 
					join sm_kemasan_barang as kb on (kb.id = pjnd.id_kemasan) 
					where pjnd.id_penjualan = '" . $value->id . "' 
					group by pjnd.id, pjnd.qty, kb.id, rp.id, pjnd.reimburse, pjnd.harga_jual 
					having qty > 0";
			$dataDetail = $this->db->query($sql)->result();
			foreach ($dataDetail as $key => $data) :
				$total += intval($data->total);
			endforeach;
		endforeach;

		$status = true;
		if ($total <= 0 & $reimburse <= 0) :
			$status = false;
		endif;

		return array("total" => (float) $total, "reimburse" => (float) $reimburse, "status" => $status);
	}

	function hitungTotalPKRT($id_layanan_pendaftaran, $id_history_pembayaran = NULL)
	{
		$param = "";
		if ($id_history_pembayaran !== "") :
			if ($id_history_pembayaran === NULL) :
				$param .= " and pkrt.id_history_pembayaran is null";
			else :
				$param .= " and pkrt.id_history_pembayaran = '" . $id_history_pembayaran . "' ";
			endif;
		endif;
		$sql = "select sum(pkrt.tarif::int) as total, sum(pkrt.tarif::int) as reimburse 
				from sm_pembayaran_perbekalan_kesehatan as pkrt  
				where pkrt.id_layanan_pendaftaran = '" . $id_layanan_pendaftaran . "' " . $param;
		$query = $this->db->query($sql)->row();
		$total = $query->total;
		if ($total === NULL) :
			$total = 0;
		endif;
		$reimburse = $query->reimburse;
		if ($reimburse === NULL) :
			$reimburse = 0;
		endif;
		$status = true;
		if ($total <= 0 & $reimburse <= 0) :
			$status = false;
		endif;

		return array("total" => (float) $total, "reimburse" => (float) $reimburse, "status" => $status);
	}

	function hitungTotalBarangOperasi($id_layanan_pendaftaran, $id_history_pembayaran = NULL)
	{
		$sql = "select pjn.*, (null) as detail, pjn.waktu as waktu_konfirm, (pjn.total) as tagihan 
				from sm_penjualan as pjn 
				join sm_jadwal_kamar_operasi as jko on (jko.id = pjn.id_operasi) 
				where jko.id_layanan_pendaftaran = '" . $id_layanan_pendaftaran . "' ";
		if ($id_history_pembayaran !== "") :
			if ($id_history_pembayaran === NULL) :
				$sql .= " and pjn.id_history_pembayaran is null";
			else :
				$sql .= " and pjn.id_history_pembayaran = '" . $id_history_pembayaran . "' ";
			endif;
		endif;
		$obat = $this->db->query($sql)->result();
		$total = 0;
		$reimburse = 0;
		foreach ($obat as $key => $value) :
			$sql = "select sum(pjnd.harga_jual * pjnd.qty) as total, 
					(sum(pjnd.reimburse * pjnd.qty)) as reimburse 
					from sm_detail_penjualan as pjnd 
					where pjnd.id_penjualan = '" . $value->id . "'";
			$query = $this->db->query($sql)->row();
			$total += $query->total;
			$reimburse += $query->reimburse;
		endforeach;

		$status = true;
		if ($total <= 0 & $reimburse <= 0) :
			$status = false;
		endif;

		return array("total" => (float) $total, "reimburse" => (float) $reimburse, "status" => $status);
	}

	function hitungTotalOperasi($id_layanan_pendaftaran, $id_history_pembayaran = NULL)
	{
		$sql = "select sum(top.total) as total, sum(top.reimburse) as reimburse 
				from sm_tarif_operasi as top 
				join sm_jadwal_kamar_operasi as jko on (top.id_operasi = jko.id) 
				where jko.id_layanan_pendaftaran = '" . $id_layanan_pendaftaran . "' 
				and jko.status = 'Confirmed' ";
		if ($id_history_pembayaran !== "") :
			if ($id_history_pembayaran === NULL) :
				$sql .= " and jko.id_history_pembayaran is null";
			else :
				$sql .= " and jko.id_history_pembayaran = '" . $id_history_pembayaran . "' ";
			endif;
		endif;

		$query = $this->db->query($sql)->row();
		$total = $query->total;
		if ($total === NULL) :
			$total = 0;
		endif;
		$reimburse = $query->reimburse;
		if ($reimburse === NULL) :
			$reimburse = 0;
		endif;
		$status = true;
		if ($total <= 0 & $reimburse <= 0) :
			$status = false;
		endif;

		return array("total" => (float) $total, "reimburse" => (float) $reimburse, "status" => $status);
	}

	function hitungTotalKamar($id_layanan_pendaftaran, $id_history_pembayaran = NULL)
	{
		$where = array();
		if ($id_history_pembayaran !== "") :
			if ($id_history_pembayaran === NULL) :
				$where["id_layanan_pendaftaran"] = $id_layanan_pendaftaran;
				$where["id_history_pembayaran"] = NULL;
			else :
				$where["id_layanan_pendaftaran"] = $id_layanan_pendaftaran;
				$where["id_history_pembayaran"] = $id_history_pembayaran;
			endif;
		endif;
		$dataRanap = $this->db->where($where)->get("sm_rawat_inap")->row();
		$total = 0;
		$reimburse = 0;
		if (0 < sizeof((array) $dataRanap) && $dataRanap->waktu_keluar !== NULL) :
			$sql = "select sum(ri.total_hari * ri.nominal) as total, ri.diskon 
					from sm_rawat_inap as ri 
					where ri.id_layanan_pendaftaran = '" . $id_layanan_pendaftaran . "' group by ri.diskon";
			$query = $this->db->query($sql)->row();
			$total = $query->total;
			if ($query->diskon !== NULL) :
				$reimburse = $total * $query->diskon / 100;
			endif;
		endif;

		if (0 < sizeof((array) $dataRanap) && $dataRanap->waktu_keluar === NULL) :
			$sql = "select concat_ws(' kelas ', bg.nama, k.nama) as bangsal, 
					COALESCE(ri.diskon, 0) as diskon, 
					ri.nominal, lp.tindak_lanjut, 
					CASE WHEN ri.waktu_keluar is null
						THEN CASE WHEN DATE_PART('day', MAX(NOW()) - MIN(waktu_masuk)) = 0 THEN 1 ELSE DATE_PART('day', MAX(NOW()) - MIN(waktu_masuk)) END 
						ELSE total_hari
					END as durasi, 
					(CASE WHEN ri.waktu_keluar is null
						THEN CASE WHEN DATE_PART('day', MAX(NOW()) - MIN(waktu_masuk)) = 0 THEN 1 ELSE DATE_PART('day', MAX(NOW()) - MIN(waktu_masuk)) END 
						ELSE total_hari
					END * ri.nominal) as total, 
					((CASE WHEN ri.waktu_keluar is null
						THEN CASE WHEN DATE_PART('day', MAX(NOW()) - MIN(waktu_masuk)) = 0 THEN 1 ELSE DATE_PART('day', MAX(NOW()) - MIN(waktu_masuk)) END 
						ELSE total_hari
					END * ri.nominal) * COALESCE(ri.diskon, 0) / 100) as reimburse, 
					CASE WHEN ri.waktu_keluar is null THEN 'Masih Dirawat' ELSE 'Sudah Keluar' END as status_rawat, ri.waktu_masuk as tanggal_masuk, ri.waktu_keluar as tanggal_keluar
					from sm_pendaftaran as pd 
					join sm_layanan_pendaftaran as lp on (lp.id_pendaftaran = pd.id) 
					join sm_rawat_inap as ri on (ri.id_layanan_pendaftaran = lp.id) 
					left join sm_kelas as k on (k.id = ri.id_kelas)
					join sm_bangsal as bg on (bg.id = ri.id_bangsal) 
					where lp.id = '" . $id_layanan_pendaftaran . "' 
					group by bg.nama, k.nama, ri.diskon, ri.nominal, lp.tindak_lanjut, ri.waktu_keluar, ri.total_hari, ri.waktu_masuk, ri.waktu_keluar";
			$query = $this->db->query($sql)->row();
			$total = $query->total;
			if ($query->diskon !== NULL) :
				$reimburse = $total * $query->diskon / 100;
			endif;
		endif;
		$status = true;
		if ($total <= 0 & $reimburse <= 0) :
			$status = false;
		endif;

		return array("total" => (float) $total, "reimburse" => (float) $reimburse, "status" => $status);
	}

	function hitungTotalKamarIcare($id_layanan_pendaftaran, $id_history_pembayaran = NULL)
	{
		$where = array();
		if ($id_history_pembayaran !== "") :
			if ($id_history_pembayaran === NULL) :
				$where["id_layanan_pendaftaran"] = $id_layanan_pendaftaran;
				$where["id_history_pembayaran"] = NULL;
			else :
				$where["id_layanan_pendaftaran"] = $id_layanan_pendaftaran;
				$where["id_history_pembayaran"] = $id_history_pembayaran;
			endif;
		endif;
		$dataIcare = $this->db->where($where)->get("sm_intensive_care")->row();
		$total = 0;
		$reimburse = 0;
		if (0 < sizeof((array) $dataIcare) && $dataIcare->waktu_keluar !== NULL) :
			$sql = "select sum(ri.total_hari * ri.nominal) as total, ri.diskon 
					from sm_intensive_care as ri 
					where ri.id_layanan_pendaftaran = '" . $id_layanan_pendaftaran . "' group by ri.diskon";
			$query = $this->db->query($sql)->row();
			$total = $query->total;
			if ($query->diskon !== NULL) :
				$reimburse = $total * $query->diskon / 100;
			endif;
		endif;

		if (0 < sizeof((array) $dataIcare) && $dataIcare->waktu_keluar === NULL) :
			$sql = "select concat_ws(' kelas ', bg.nama, k.nama) as bangsal, 
					COALESCE(ri.diskon, 0) as diskon, 
					ri.nominal, lp.tindak_lanjut, 
					CASE WHEN ri.waktu_keluar is null
						THEN CASE WHEN DATE_PART('day', MAX(NOW()) - MIN(waktu_masuk)) = 0 THEN 1 ELSE DATE_PART('day', MAX(NOW()) - MIN(waktu_masuk)) END 
						ELSE total_hari
					END as durasi, 
					(CASE WHEN ri.waktu_keluar is null
						THEN CASE WHEN DATE_PART('day', MAX(NOW()) - MIN(waktu_masuk)) = 0 THEN 1 ELSE DATE_PART('day', MAX(NOW()) - MIN(waktu_masuk)) END 
						ELSE total_hari
					END * ri.nominal) as total, 
					((CASE WHEN ri.waktu_keluar is null
						THEN CASE WHEN DATE_PART('day', MAX(NOW()) - MIN(waktu_masuk)) = 0 THEN 1 ELSE DATE_PART('day', MAX(NOW()) - MIN(waktu_masuk)) END 
						ELSE total_hari
					END * ri.nominal) * COALESCE(ri.diskon, 0) / 100) as reimburse, 
					CASE WHEN ri.waktu_keluar is null THEN 'Masih Dirawat' ELSE 'Sudah Keluar' END as status_rawat, ri.waktu_masuk as tanggal_masuk, ri.waktu_keluar as tanggal_keluar
					from sm_pendaftaran as pd 
					join sm_layanan_pendaftaran as lp on (lp.id_pendaftaran = pd.id) 
					join sm_intensive_care as ri on (ri.id_layanan_pendaftaran = lp.id) 
					left join sm_kelas as k on (k.id = ri.id_kelas)
					join sm_bangsal as bg on (bg.id = ri.id_bangsal) 
					where lp.id = '" . $id_layanan_pendaftaran . "' 
					group by bg.nama, k.nama, ri.diskon, ri.nominal, lp.tindak_lanjut, ri.waktu_keluar, ri.total_hari, ri.waktu_masuk, ri.waktu_keluar";
			$query = $this->db->query($sql)->row();
			$total = $query->total;
			if ($query->diskon !== NULL) :
				$reimburse = $total * $query->diskon / 100;
			endif;
		endif;
		$status = true;
		if ($total <= 0 & $reimburse <= 0) :
			$status = false;
		endif;

		return array("total" => (float) $total, "reimburse" => (float) $reimburse, "status" => $status);
	}

	// function hitungTotalAdministrasiRanap($id_layanan_pendaftaran, $id_history_pembayaran = NULL)
	// {
	// 	$sql = "select sum(ttp.total) as total, sum(ttp.reimburse) as reimburse 
	// 			from sm_tarif_tindakan_pasien as ttp 
	// 			where ttp.id_layanan_pendaftaran = '" . $id_layanan_pendaftaran . "' 
	// 			and ttp.id_tarif_pelayanan = '139' ";
	// 	if ($id_history_pembayaran !== "") :
	// 		if ($id_history_pembayaran === NULL) :
	// 			$sql .= " and ttp.id_history_pembayaran is null";
	// 		else :
	// 			$sql .= " and ttp.id_history_pembayaran = '" . $id_history_pembayaran . "' ";
	// 		endif;
	// 	endif;

	// 	$query = $this->db->query($sql)->row();
	// 	$total = $query->total;
	// 	if ($total === NULL) :
	// 		$total = 0;
	// 	endif;
	// 	$reimburse = $query->reimburse;
	// 	if ($reimburse === NULL) :
	// 		$reimburse = 0;
	// 	endif;
	// 	$status = true;
	// 	if ($total <= 0 & $reimburse <= 0) :
	// 		$status = false;
	// 	endif;

	// 	return array("total" => (float) $total, "reimburse" => (float) $reimburse, "status" => $status);
	// }

	function hitungTotalAdministrasiIcare($id_layanan_pendaftaran, $id_history_pembayaran = NULL)
	{
		$sql = "select sum(ttp.total) as total, sum(ttp.reimburse) as reimburse 
				from sm_tarif_tindakan_pasien as ttp 
				where ttp.id_layanan_pendaftaran = '" . $id_layanan_pendaftaran . "' 
				and ttp.id_tarif_pelayanan = '1511' ";
		if ($id_history_pembayaran !== "") :
			if ($id_history_pembayaran === NULL) :
				$sql .= " and ttp.id_history_pembayaran is null";
			else :
				$sql .= " and ttp.id_history_pembayaran = '" . $id_history_pembayaran . "' ";
			endif;
		endif;

		$query = $this->db->query($sql)->row();
		$total = $query->total;
		if ($total === NULL) :
			$total = 0;
		endif;
		$reimburse = $query->reimburse;
		if ($reimburse === NULL) :
			$reimburse = 0;
		endif;
		$status = true;
		if ($total <= 0 & $reimburse <= 0) :
			$status = false;
		endif;

		return array("total" => (float) $total, "reimburse" => (float) $reimburse, "status" => $status);
	}

	function hitungTotalHemodialisa($id_layanan_pendaftaran, $id_history_pembayaran = NULL)
	{
		$param = "";
		if ($id_history_pembayaran !== "") :
			if ($id_history_pembayaran === NULL) :
				$param .= " and h.id_history_pembayaran is null";
			else :
				$param .= " and h.id_history_pembayaran = '" . $id_history_pembayaran . "' ";
			endif;
		endif;
		$sql = "select sum(total) as total, sum(reimburse) as reimburse 
				from sm_tarif_hemodialisa as th 
				join sm_hemodialisa as h on (h.id = th.id_hemodialisa) 
				where h.id_layanan_pendaftaran = '" . $id_layanan_pendaftaran . "' " . $param;

		$query = $this->db->query($sql)->row();
		$total = $query->total;
		if ($total === NULL) :
			$total = 0;
		endif;
		$reimburse = $query->reimburse;
		if ($reimburse === NULL) :
			$reimburse = 0;
		endif;
		$status = true;
		if ($total <= 0 & $reimburse <= 0) :
			$status = false;
		endif;

		return array("total" => (float) $total, "reimburse" => (float) $reimburse, "status" => $status);
	}

	function hitungTotalBankDarah($id_layanan_pendaftaran, $id_history_pembayaran = NULL)
	{
		$sql = "select sum(tbd.total) as total, sum(tbd.reimburse) as reimburse 
				from sm_tarif_bank_darah as tbd 
				join sm_order_bank_darah as obd on (tbd.id_order_bank_darah = obd.id) 
				where obd.id_layanan_pendaftaran = '" . $id_layanan_pendaftaran . "' ";
		if ($id_history_pembayaran !== "") :
			if ($id_history_pembayaran === NULL) :
				$sql .= " and obd.id_history_pembayaran is null";
			else :
				$sql .= " and obd.id_history_pembayaran = '" . $id_history_pembayaran . "' ";
			endif;
		endif;

		$query = $this->db->query($sql)->row();
		$total = $query->total;
		if ($total === NULL) :
			$total = 0;
		endif;
		$reimburse = $query->reimburse;
		if ($reimburse === NULL) :
			$reimburse = 0;
		endif;
		$status = true;
		if ($total <= 0 & $reimburse <= 0) :
			$status = false;
		endif;

		return array("total" => (float) $total, "reimburse" => (float) $reimburse, "status" => $status);
	}

	// function hitungTotalBarangBankDarah($id_layanan_pendaftaran, $id_history_pembayaran = NULL)
	// {
	// 	$sql = "select pjn.*, (null) as detail, pjn.waktu as waktu_konfirm, (pjn.total) as tagihan 
	// 			from sm_penjualan_bank_darah as pjn 
	// 			where pjn.id_layanan_pendaftaran = '" . $id_layanan_pendaftaran . "' 
	// 			and pjn.jenis = 'Bank Darah'
	// 			and pjn.status_bank_darah = 1";
	// 	if ($id_history_pembayaran !== "") :
	// 		if ($id_history_pembayaran === NULL) :
	// 			$sql .= " and pjn.id_history_pembayaran is null";
	// 		else :
	// 			$sql .= " and pjn.id_history_pembayaran = '" . $id_history_pembayaran . "' ";
	// 		endif;
	// 	endif;
	// 	$obat = $this->db->query($sql)->result();
	// 	$total = 0;
	// 	$reimburse = 0;
	// 	foreach ($obat as $key => $value) :
	// 		$sql = "select sum(pjnd.harga_jual * pjnd.qty) as total, 
	// 				(sum(pjnd.reimburse * pjnd.qty)) as reimburse 
	// 				from sm_detail_penjualan_bank_darah as pjnd 
	// 				where pjnd.id_penjualan = '" . $value->id . "'
	// 				and status_order_darah = 'Confirmed'";
	// 		$query = $this->db->query($sql)->row();
	// 		$total += $query->total;
	// 		$reimburse += $query->reimburse;
	// 	endforeach;

	// 	$status = true;
	// 	if ($total <= 0 & $reimburse <= 0) :
	// 		$status = false;
	// 	endif;

	// 	return array("total" => (float) $total, "reimburse" => (float) $reimburse, "status" => $status);
	// }

	function tagihanBarang($id, $jenis, $tanggal = NULL)
	{
		$data = array();
		$query = "";
		$param = "pn.id";
		if ($jenis === "penjualan") {
			$param = "pn.id_history_pembayaran";
		} else {
			$param = "pn.id_layanan_pendaftaran";
		}
		if ($tanggal !== NULL) {
			$query .= " and date(pn.waktu) = '" . $tanggal . "' ";
		}
		$sql = "select CONCAT_WS(' ',b.nama, b.kekuatan, stn.nama) as item, 
				CONCAT_WS(' ',b.nama, b.kekuatan, stn.nama) as item, 
				pjd.harga_jual as harga_item, (pjd.harga_jual * pjd.qty) as total, 
				pjd.qty, pn.waktu as waktu_order, COALESCE(pj.nama, '') as penjamin, 
				COALESCE(pj.diskon, 0) as diskon, null as nakes,  
				CASE WHEN pj.diskon is not null then ((pjd.harga_jual * pjd.qty) * pj.diskon / 100) else 0 end as reimburse,  
				(pjd.qty - COALESCE((select sum(qty) from sm_detur_penjualan where id_kemasan_barang = kb.id and id_retur_penjualan = rp.id),0)) as frekuensi 
				from sm_detail_penjualan pjd 
				join sm_penjualan pn on(pn.id = pjd.id_penjualan) 
				left join sm_retur_penjualan rp on (rp.id_penjualan = pn.id) 
				join sm_kemasan_barang kb on (kb.id = pjd.id_kemasan) 
				join sm_barang b on (b.id = kb.id_barang) 
				left join sm_satuan stn on (b.satuan_kekuatan = stn.id) 
				left join sm_penjamin pj on (pj.id = pjd.id_asuransi) where " . $param . " = '" . $id . "' 
				and pn.jenis != 'Bank Darah'" . $query;
		$data = $this->db->query($sql)->result();
		return $data;
	}

	function tagihanPKRT($id, $tanggal = NULL)
	{
		$data = array();
		$query = "";
		if ($tanggal !== NULL) {
			$query .= " and date(pn.waktu) = '" . $tanggal . "' ";
		}
		$sql = "select pk.nama as item, tpk.nominal as harga_item, p.tarif as total, p.qty, '' as waktu_order, coalesce(pj.nama, '') as penjamin, coalesce(pj.diskon, 0) as diskon, (null) as nakes, 
						CASE WHEN pj.diskon IS NOT NULL THEN ((tpk.nominal::int * p.qty::int) * pj.diskon / 100) ELSE 0 END as reimburse, p.qty as frekuensi
                from sm_pembayaran_perbekalan_kesehatan p
                join sm_tarif_perbekalan_kesehatan tpk on (p.id_tarif_perbekalan = tpk.id)
								join sm_perbekalan_kesehatan pk on (tpk.id_perbekalan_kesehatan = pk.id)
                join sm_layanan_pendaftaran lp on (p.id_layanan_pendaftaran = lp.id)
                left join sm_penjamin pj on (lp.id_penjamin = pj.id)
                where p.id_history_pembayaran = '" . $id . "' " . $query;
		$data = $this->db->query($sql)->result();
		return $data;
	}

	function tagihanBankDarah($id, $tanggal = NULL)
	{
		$data = array();
		$query = "";
		if ($tanggal !== NULL) :
			$query .= " and date(ko.waktu) = '" . $tanggal . "' ";
		endif;
		$sql = "select top.*, concat_ws(', kelas ', concat_ws(', ', l.nama, tp.jenis, tp.bobot), k.nama) as item,
				concat_ws(', ', l.nama, tp.jenis, tp.bobot) as layanan,
				tp.keterangan, 
				top.total as harga_item, 
				sum(top.total) as total, 
				sum(top.reimburse) as reimburse, 
				(sum(top.total) - sum(top.reimburse)) as tagihan, 
				count(*) as frekuensi
				from sm_pendaftaran pd 
				join sm_layanan_pendaftaran lp on (lp.id_pendaftaran = pd.id) 
				join sm_order_bank_darah odb on (odb.id_layanan_pendaftaran = lp.id) 
				join sm_tarif_bank_darah top on (top.id_order_bank_darah = odb.id) 
				join sm_tarif_pelayanan tp on (tp.id = top.id_tarif) 
				join sm_layanan l on (l.id = tp.id_layanan) 
				join sm_kelas k on (k.id = tp.id_kelas)
				where lp.id = '" . $id . " '" . $query . " 
				group by top.id, top.id_tarif, l.nama, tp.jenis, tp.bobot, k.nama, tp.keterangan";
		$data = $this->db->query($sql)->result();
		return $data;
	}

	// function tagihanBarangBankDarah($id, $jenis, $tanggal = NULL)
	// {
	//     $data = array();
	//     $query = "";
	//     $param = "pn.id";
	//     if ($jenis === "penjualan") {
	//         $param = "pn.id_history_pembayaran";
	//     } else {
	//         $param = "pn.id_layanan_pendaftaran";
	//     }
	//     if ($tanggal !== NULL) {
	//         $query .= " and date(pn.waktu) = '" . $tanggal . "' ";
	//     }
	// 	$sql = "select CONCAT_WS(' ',b.nama, b.kekuatan, stn.nama) as item, 
	// 			CONCAT_WS(' ',b.nama, b.kekuatan, stn.nama) as item, 
	// 			pjd.harga_jual as harga_item, (pjd.harga_jual * pjd.qty) as total, 
	// 			pjd.qty, pn.waktu as waktu_order, COALESCE(pj.nama, '') as penjamin, 
	// 			COALESCE(pj.diskon, 0) as diskon, null as nakes,  
	// 			CASE WHEN pj.diskon is not null then ((pjd.harga_jual * pjd.qty) * pj.diskon / 100) else 0 end as reimburse,  
	// 			(pjd.qty - COALESCE((select sum(qty) from sm_detur_penjualan where id_kemasan_barang = kb.id and id_retur_penjualan = rp.id),0)) as frekuensi 
	// 			from sm_detail_penjualan pjd 
	// 			join sm_penjualan pn on(pn.id = pjd.id_penjualan) 
	// 			left join sm_retur_penjualan rp on (rp.id_penjualan = pn.id) 
	// 			join sm_kemasan_barang kb on (kb.id = pjd.id_kemasan) 
	// 			join sm_barang b on (b.id = kb.id_barang) 
	// 			left join sm_satuan stn on (b.satuan_kekuatan = stn.id) 
	// 			left join sm_penjamin pj on (pj.id = pjd.id_asuransi) where " . $param . " = '" . $id . "' 
	// 			and pn.jenis = 'Bank Darah'" . $query;
	//     $data = $this->db->query($sql)->result();
	// 	return $data;
	// }

	function tagihanPemeriksaanLaboratorium($id_history_pembayaran)
	{
		$data = array();
		$sql = "select dl.* , concat_ws(' ', l.nama, dl.cito) as item, 
				dl.total as harga_item, 
				COALESCE(pg.nama, '') as nakes, 
				(1) as frekuensi 
				from sm_detail_laboratorium dl 
				join sm_tarif_pelayanan kt on (kt.id = dl.id_tarif) 
				join sm_layanan l on (l.id = kt.id_layanan) 
				join sm_laboratorium lb on (lb.id = dl.id_laboratorium) 
				left join sm_tenaga_medis nk on (nk.id = lb.id_dokter_pjwb) 
				left join sm_pegawai pg on (pg.id = nk.id_pegawai) 
				where lb.id_history_pembayaran = '" . $id_history_pembayaran . "' order by dl.id";
		$data = $this->db->query($sql)->result();
		return $data;
	}

	function tagihanPemeriksaanRadiologi($id_history_pembayaran)
	{
		$data = array();
		$sql = "select dr.* , concat_ws(' ', l.nama, dr.cito) as item, 
				dr.total as harga_item, 
				COALESCE(pgd.nama, '') as dokter, 
				COALESCE(pgr.nama, '') as radiografer,   
				COALESCE(pg.nama, '') as nakes, 
				(1) as frekuensi  
				from sm_detail_radiologi dr 
				join sm_tarif_pelayanan kt on (kt.id = dr.id_tarif) 
				join sm_layanan l on (l.id = kt.id_layanan) 
				join sm_radiologi rd on (rd.id = dr.id_radiologi) 
				left join sm_tenaga_medis nk on (nk.id = rd.id_dokter_pjwb) 
				left join sm_pegawai pg on (pg.id = nk.id_pegawai) 
				left join sm_tenaga_medis nkd on (dr.id_dokter = nkd.id) 
				left join sm_pegawai pgd on (nkd.id_pegawai = pgd.id) 
				left join sm_tenaga_medis nkr on (dr.id_radiografer = nkr.id) 
				left join sm_pegawai pgr on (nkr.id_pegawai = pgr.id) 
				where rd.id_history_pembayaran = '" . $id_history_pembayaran . "' order by dr.id";
		$data = $this->db->query($sql)->result();
		return $data;
	}

	function tagihanPemeriksaanFisioterapi($id_history_pembayaran)
	{
		$data = array();
		$sql = "select df.* , concat_ws(' ', l.nama, df.cito) as item, 
				df.total as harga_item, 
				COALESCE(pg.nama, '') as nakes,
				(1) as frekuensi  
				from sm_detail_fisioterapi df 
				join sm_tarif_pelayanan kt on (kt.id = df.id_tarif) 
				join sm_layanan l on (l.id = kt.id_layanan) 
				join sm_fisioterapi fi on (fi.id = df.id_fisioterapi) 
				left join sm_tenaga_medis nk on (nk.id = fi.id_dokter_pjwb) 
				left join sm_pegawai pg on (pg.id = nk.id_pegawai) 
				where fi.id_history_pembayaran = '" . $id_history_pembayaran . "' order by df.id";
		$data = $this->db->query($sql)->result();
		return $data;
	}

	function tagihanOperasi($id, $tanggal = NULL)
	{
		$data = array();
		$query = "";
		if ($tanggal !== NULL) :
			$query .= " and date(ko.waktu) = '" . $tanggal . "' ";
		endif;
		$sql = "select top.*, concat_ws(', kelas ', concat_ws(', ', l.nama, tp.jenis, tp.bobot), k.nama) as item,
				concat_ws(', ', l.nama, tp.jenis, tp.bobot) as layanan,
				tp.keterangan, 
				top.total as harga_item, 
				sum(top.total) as total, 
				sum(top.reimburse) as reimburse, 
				(sum(top.total) - sum(top.reimburse)) as tagihan, 
				count(*) as frekuensi, 
				(
					select coalesce(pg.nama, '') as operator
					from sm_tim_operasi tim
					join sm_jadwal_kamar_operasi jko on (jko.id = tim.id_jadwal_operasi)
					join sm_tenaga_medis tm on (tm.id = tim.id_nadis)
					join sm_pegawai pg on (pg.id = tm.id_pegawai)
					where tim.id_jadwal_operasi = jko.id
					and tim.status = 'Dokter Operator' 
					limit 1
				) as nakes
				from sm_pendaftaran pd 
				join sm_layanan_pendaftaran lp on (lp.id_pendaftaran = pd.id) 
				join sm_jadwal_kamar_operasi ko on (ko.id_layanan_pendaftaran = lp.id) 
				join sm_tarif_operasi top on (top.id_operasi = ko.id) 
				join sm_tarif_pelayanan tp on (tp.id = top.id_tarif) 
				join sm_layanan l on (l.id = tp.id_layanan) 
				join sm_kelas k on (k.id = tp.id_kelas)
				where lp.id = '" . $id . " '" . $query . " 
				ko.status = 'Confirmed'
				group by top.id, top.id_tarif, l.nama, tp.jenis, tp.bobot, k.nama, tp.keterangan";
		$data = $this->db->query($sql)->result();
		return $data;
	}

	function tagihanBarangOperasi($id, $jenis, $tanggal = NULL)
	{
		$data = array();
		$query = "";
		$param = "pn.id";
		if ($jenis === "penjualan") {
			$param = "pn.id_history_pembayaran";
		} else {
			$param = "pn.id_layanan_pendaftaran";
		}
		if ($tanggal !== NULL) {
			$query .= " and date(pn.waktu) = '" . $tanggal . "' ";
		}
		$sql = "select CONCAT_WS(' ',b.nama, b.kekuatan, stn.nama) as item, 
				CONCAT_WS(' ',b.nama, b.kekuatan, stn.nama) as item, 
				pjd.harga_jual as harga_item, 
				(pjd.harga_jual * pjd.qty) as total, 
				pjd.qty, pn.waktu as waktu_order, 
				COALESCE(pj.nama, '') as penjamin, 
				COALESCE(pj.diskon, 0) as diskon, 
				null as nakes,  
				CASE WHEN pj.diskon is not null then ((pjd.harga_jual * pjd.qty) * pj.diskon / 100) else 0 end as reimburse,  
				(pjd.qty - COALESCE((select sum(qty) from sm_detur_penjualan where id_kemasan_barang = kb.id and id_retur_penjualan = rp.id),0)) as frekuensi 
				from sm_detail_penjualan pjd 
				join sm_penjualan pn on(pn.id = pjd.id_penjualan) 
				left join sm_retur_penjualan rp on (rp.id_penjualan = pn.id) 
				join sm_jadwal_kamar_operasi ko on (ko.id = pn.id_operasi)
				join sm_kemasan_barang kb on (kb.id = pjd.id_kemasan) 
				join sm_barang b on (b.id = kb.id_barang) 
				left join sm_satuan stn on (b.satuan_kekuatan = stn.id) 
				left join sm_penjamin pj on (pj.id = pjd.id_asuransi) 
				where " . $param . " = '" . $id . "' " . $query;
		$data = $this->db->query($sql)->result();
		return $data;
	}

	function hitungPiutangDibayarkan($id_pendaftaran)
	{
		$grandTotal = "";

		$this->db->select('SUM(total_bayar) as total');
		$this->db->from('sm_piutang_pasien');
		$this->db->where('id_pendaftaran', $id_pendaftaran);
		$this->db->where('status !=', 'Batal');
		$query = $this->db->get();

		if ($query->num_rows() > 0) {
			$result = $query->row();
			$grandTotal = $result->total;
		} else {
			$grandTotal = 0;
		}

		return round($grandTotal);
	}
}
