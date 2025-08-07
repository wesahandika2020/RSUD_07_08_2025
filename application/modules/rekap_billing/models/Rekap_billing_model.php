<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Rekap_billing_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
		$this->datetime = date('Y-m-d H:i:s');
		$this->load->model('keuangan/Keuangan_ver2_model', 'm_keuangan_ver2');
	}
	
	function getListTarifTindakan($id_layanan_pendaftaran, $is_pendaftaran = NULL)
	{
		$this->db->select("
			ttp.*, l.nama as item, l.id as id_layanan,
			COALESCE(pj.nama, '') as penjamin,
			COALESCE(pj.diskon, '0') as diskon,
			COALESCE(pg.nama, '') as operator,
			ttp.total as harga_item, 
			SUM(ttp.total) as total,
			SUM(ttp.reimburse) as reimburse,
			(SUM(ttp.total) - SUM(ttp.reimburse)) as tagihan,
			COUNT(*) as frekuensi,
			COALESCE(prn.nama, '') as profesi,
			tm.id_profesi, lp.jenis_layanan, sp.id_unit
		");
		$this->db->from('sm_pendaftaran as pd');
		$this->db->join('sm_layanan_pendaftaran as lp', 'lp.id_pendaftaran = pd.id');
		$this->db->join('sm_tarif_tindakan_pasien as ttp', 'ttp.id_layanan_pendaftaran = lp.id');
		$this->db->join('sm_tarif_pelayanan as tp', 'tp.id = ttp.id_tarif_pelayanan');
		$this->db->join('sm_layanan as l', 'l.id = tp.id_layanan');
		$this->db->join('sm_tenaga_medis as tm', 'tm.id = ttp.id_operator', 'left');
		$this->db->join('sm_pegawai as pg', 'pg.id = tm.id_pegawai', 'left');
		$this->db->join('sm_penjamin as pj', 'pj.id = ttp.id_penjamin', 'left');
		$this->db->join('sm_profesi_nadis as prn', 'prn.id = tm.id_profesi', 'left');
		$this->db->join('sm_spesialisasi as sp', 'sp.id = lp.id_unit_layanan', 'left');
		$this->db->where('lp.id', $id_layanan_pendaftaran);
		// $this->db->where('l.nama !=', 'Administrasi Pasien Rawat Inap');
		$this->db->where_not_in('l.nama', ['Administrasi Pasien Rawat Inap', 'Administrasi Pasien Intensive Care']);
		if ($is_pendaftaran !== NULL) :
			if ($is_pendaftaran === 'Ya') :
				$this->db->where('ttp.is_pendaftaran', 'Ya', true);
			endif;
			if ($is_pendaftaran === 'Tidak') :
				$this->db->where('ttp.is_pendaftaran', 'Tidak', true);
			endif;
		endif;
		$this->db->group_by('
				tp.id, tp.id, ttp.id_operator, ttp.id, l.nama, l.id, 
				pj.nama, pj.diskon, pg.nama, prn.nama, tm.id_profesi, lp.jenis_layanan, sp.id_unit
		');
		$this->db->order_by('ttp.tanggal, prn.nama');
		return $this->db->get()->result();
	}

	function getListTarifLaboratorium($id_layanan_pendaftaran)
	{
		$this->db->select("
			lb.*, (null) as detail, (0) as total, (0) as tagihan,
			COALESCE(pgdok.nama, '') as dokter,
			COALESCE(pgdok.nama, '') as operator,
			COALESCE(pgpel.nama, '') as pelaksana
		");
		$this->db->from('sm_laboratorium as lb');
		$this->db->join('sm_tenaga_medis as tmdok', 'tmdok.id = lb.id_dokter_pjwb', 'left');
		$this->db->join('sm_pegawai as pgdok', 'pgdok.id = tmdok.id_pegawai', 'left');
		$this->db->join('sm_tenaga_medis as tmpel', 'tmpel.id = lb.id_analis', 'left');
		$this->db->join('sm_pegawai as pgpel', 'pgpel.id = tmpel.id_pegawai', 'left');
		$this->db->where('lb.id_layanan_pendaftaran', $id_layanan_pendaftaran, true);
		$data = $this->db->get()->result();
		foreach ($data as $i => $val) :
			$this->db->select("
				dlb.*, CONCAT_WS(' ', l.nama, dlb.cito) as item,
				COALESCE(pj.nama, '') as penjamin,
				COALESCE(pj.diskon, '0') as diskon,
				tp.id_layanan
			");
			$this->db->from('sm_detail_laboratorium as dlb');
			$this->db->join('sm_tarif_pelayanan as tp', 'tp.id = dlb.id_tarif');
			$this->db->join('sm_layanan as l', 'l.id = tp.id_layanan');
			$this->db->join('sm_penjamin as pj', 'pj.id = dlb.id_penjamin', 'left');
			$this->db->where('dlb.id_laboratorium', $val->id, true);
			$val->detail = $this->db->get()->result();
			foreach ($val->detail as $j => $val2) :
				$val->total += (int) $val2->total;
			endforeach;
			if (isset($val2->diskon)) :
				if ($val2->diskon !== '') :
					$val->tagihan = $val->total - $val2->reimburse;
				else :
					$val->tagihan = $val->total;
				endif;
			endif;
		endforeach;
		return $data;
	}

	function getListTarifLaboratoriumGroup($id_layanan_pendaftaran)
	{
		$this->db->select("
			dl.total as harga_item, concat_ws(' ', l.nama, dl.cito) as item , 
			COALESCE(pgdk.nama, '') as dokter, 
			COALESCE(pgdk.nama, '') as operator, 
			COALESCE(pj.nama, '') as penjamin,
			COALESCE(pj.diskon, 0) as diskon,
			count(*) as frekuensi,
			(count(*) * dl.total) as total,
			lb.waktu_konfirm
		");
		$this->db->from('sm_detail_laboratorium as dl');
		$this->db->join('sm_laboratorium as lb', 'lb.id = dl.id_laboratorium');
		$this->db->join('sm_tarif_pelayanan as tp', 'tp.id = dl.id_tarif');
		$this->db->join('sm_layanan as l', 'l.id = tp.id_layanan');
		$this->db->join('sm_tenaga_medis as dk', 'dk.id = lb.id_dokter_pjwb', 'left');
		$this->db->join('sm_pegawai as pgdk', 'pgdk.id = dk.id_pegawai', 'left');
		$this->db->join('sm_penjamin as pj', 'pj.id = dl.id_penjamin', 'left');
		$this->db->where('lb.id_layanan_pendaftaran', $id_layanan_pendaftaran, true);
		$this->db->group_by('dl.total, pgdk.nama, pj.nama, pj.diskon, tp.id, l.nama, dl.cito, lb.waktu_konfirm');
		return $this->db->get()->result();
	}
	
	function getListTarifRadiologi($id_layanan_pendaftaran)
	{
		$this->db->select("
			rd.*, (null) as detail, (0) as total, (0) as tagihan,
			COALESCE(pgdok.nama, '') as dokter,
			COALESCE(pgdok.nama, '') as operator,
			COALESCE(pgpel.nama, '') as pelaksana
		");
		$this->db->from('sm_radiologi as rd');
		$this->db->join('sm_tenaga_medis as tmdok', 'tmdok.id = rd.id_dokter_pjwb', 'left');
		$this->db->join('sm_pegawai as pgdok', 'pgdok.id = tmdok.id_pegawai', 'left');
		$this->db->join('sm_tenaga_medis as tmpel', 'tmpel.id = rd.id_radiografer', 'left');
		$this->db->join('sm_pegawai as pgpel', 'pgpel.id = tmpel.id_pegawai', 'left');
		$this->db->where('rd.id_layanan_pendaftaran', $id_layanan_pendaftaran, true);
		$data = $this->db->get()->result();
		foreach ($data as $i => $val) :
			$this->db->select("
				drd.*, CONCAT_WS(' ', l.nama, drd.cito) as item,
				COALESCE(pj.nama, '') as penjamin,
				COALESCE(pj.diskon, '0') as diskon,
				COALESCE(pgd.nama, '') as dokter,
				COALESCE(pgr.nama, '') as radiografer
			");
			$this->db->from('sm_detail_radiologi as drd');
			$this->db->join('sm_tarif_pelayanan as tp', 'tp.id = drd.id_tarif');
			$this->db->join('sm_layanan as l', 'l.id = tp.id_layanan');
			$this->db->join('sm_penjamin as pj', 'pj.id = drd.id_penjamin', 'left');
			$this->db->join('sm_tenaga_medis as tmd', 'tmd.id = drd.id_dokter', 'left');
			$this->db->join('sm_pegawai as pgd', 'pgd.id = tmd.id_pegawai', 'left');
			$this->db->join('sm_tenaga_medis as tmr', 'tmr.id = drd.id_radiografer', 'left');
			$this->db->join('sm_pegawai as pgr', 'pgr.id = tmr.id_pegawai', 'left');
			$this->db->where('drd.id_radiologi', $val->id, true);
			$val->detail = $this->db->get()->result();
			foreach ($val->detail as $j => $val2) :
				$val->total += (int) $val2->total;
			endforeach;
			if (isset($val2->diskon)) :
				if ($val2->diskon !== '') :
					$val->tagihan = $val->total - $val2->reimburse;
				else :
					$val->tagihan = $val->total;
				endif;
			endif;
		endforeach;
		return $data;
	}

	function getListTarifRadiologiGroup($id_layanan_pendaftaran)
	{
		$this->db->select("
			dl.total as harga_item, concat_ws(' ', l.nama, dl.cito) as item , 
			COALESCE(pgdk.nama, '') as dokter, 
			COALESCE(pgdk.nama, '') as operator, 
			COALESCE(pj.nama, '') as penjamin,
			COALESCE(pj.diskon, 0) as diskon,
			count(*) as frekuensi,
			(count(*) * dl.total) as total,
			lb.waktu_konfirm
		");
		$this->db->from('sm_detail_radiologi as dl');
		$this->db->join('sm_radiologi as lb', 'lb.id = dl.id_radiologi');
		$this->db->join('sm_tarif_pelayanan as tp', 'tp.id = dl.id_tarif');
		$this->db->join('sm_layanan as l', 'l.id = tp.id_layanan');
		$this->db->join('sm_tenaga_medis as dk', 'dk.id = dl.id_dokter', 'left');
		$this->db->join('sm_pegawai as pgdk', 'pgdk.id = dk.id_pegawai', 'left');
		$this->db->join('sm_penjamin as pj', 'pj.id = dl.id_penjamin', 'left');
		$this->db->where('lb.id_layanan_pendaftaran', $id_layanan_pendaftaran, true);
		$this->db->group_by('dl.total, pgdk.nama, pj.nama, pj.diskon, tp.id, l.nama, dl.cito, lb.waktu_konfirm');
		return $this->db->get()->result();
	}

	function getListTarifFisioterapi($id_layanan_pendaftaran)
	{
		$this->db->select("
			fis.*, (null) as detail, (0) as total, (0) as tagihan,
			COALESCE(pgdok.nama, '') as dokter,
			COALESCE(pgdok.nama, '') as operator
		");
		$this->db->from('sm_fisioterapi as fis');
		$this->db->join('sm_tenaga_medis as tmdok', 'tmdok.id = fis.id_dokter_pjwb', 'left');
		$this->db->join('sm_pegawai as pgdok', 'pgdok.id = tmdok.id_pegawai', 'left');
		$this->db->where('fis.id_layanan_pendaftaran', $id_layanan_pendaftaran, true);
		$data = $this->db->get()->result();
		foreach ($data as $i => $val) :
			$this->db->select("
				dfis.*, CONCAT_WS(' ', l.nama, dfis.cito) as item,
				COALESCE(pj.nama, '') as penjamin,
				COALESCE(pj.diskon, '0') as diskon,
			");
			$this->db->from('sm_detail_fisioterapi as dfis');
			$this->db->join('sm_tarif_pelayanan as tp', 'tp.id = dfis.id_tarif');
			$this->db->join('sm_layanan as l', 'l.id = tp.id_layanan');
			$this->db->join('sm_penjamin as pj', 'pj.id = dfis.id_penjamin', 'left');
			$this->db->where('dfis.id_fisioterapi', $val->id, true);
			$val->detail = $this->db->get()->result();
			foreach ($val->detail as $j => $val2) :
				$val->total += (int) $val2->total;
			endforeach;
			if (isset($val2->diskon)) :
				if ($val2->diskon !== '') :
					$val->tagihan = $val->total - $val2->reimburse;
				else :
					$val->tagihan = $val->total;
				endif;
			endif;
		endforeach;
		return $data;
	}
	
	function getListTarifFisioterapiGroup($id_layanan_pendaftaran)
	{
		$this->db->select("
			dl.total as harga_item, concat_ws(' ', l.nama, dl.cito) as item , 
			COALESCE(pgdk.nama, '') as dokter, 
			COALESCE(pgdk.nama, '') as operator, 
			COALESCE(pj.nama, '') as penjamin,
			COALESCE(pj.diskon, 0) as diskon,
			count(*) as frekuensi,
			(count(*) * dl.total) as total
		");
		$this->db->from('sm_detail_fisioterapi as dl');
		$this->db->join('sm_fisioterapi as lb', 'lb.id = dl.id_fisioterapi');
		$this->db->join('sm_tarif_pelayanan as tp', 'tp.id = dl.id_tarif');
		$this->db->join('sm_layanan as l', 'l.id = tp.id_layanan');
		$this->db->join('sm_tenaga_medis as dk', 'dk.id = lb.id_dokter_pjwb', 'left');
		$this->db->join('sm_pegawai as pgdk', 'pgdk.id = dk.id_pegawai', 'left');
		$this->db->join('sm_penjamin as pj', 'pj.id = dl.id_penjamin', 'left');
		$this->db->where('lb.id_layanan_pendaftaran', $id_layanan_pendaftaran, true);
		$this->db->group_by('dl.total, pgdk.nama, pj.nama, pj.diskon, tp.id, l.nama, dl.cito');
		return $this->db->get()->result();
	}

	function getListTarifBarang($id_layanan_pendaftaran)
	{
		$this->db->select("
			penj.*, (null) as detail, penj.waktu as waktu_konfirm,
			(penj.total) as tagihan
		");
		$this->db->from('sm_penjualan as penj');
		$this->db->where('penj.id_layanan_pendaftaran', $id_layanan_pendaftaran, true);
		$this->db->where('penj.jenis !=', 'Bank Darah');
		$this->db->order_by('penj.id', 'asc');
		$data = $this->db->get()->result();
		foreach ($data as $i => $val) :
			$this->db->select("
				CONCAT_WS(' ', b.nama, b.kekuatan, stn.nama, sed.nama, '<small><i>', COALESCE(pb.nama, ''), '</i></small>') as item,
				COALESCE(pj.nama, '') as penjamin,
				COALESCE(pj.diskon, '0') as diskon,
				CEIL(penjd.harga_jual) harga_jual,
				penjd.qty,
				ROUND(
					CAST (
					   (CEIL(penjd.harga_jual) * penjd.qty)
					   as numeric
					), 2) as total,
				penjd.reimburse
			");
			$this->db->from('sm_detail_penjualan as penjd');
			$this->db->join('sm_penjualan as p', 'p.id = penjd.id_penjualan');
			$this->db->join('sm_kemasan_barang as kb', 'kb.id = penjd.id_kemasan');
			$this->db->join('sm_barang as b', 'b.id = kb.id_barang');
			$this->db->join('sm_pabrik as pb', 'pb.id = b.id_pabrik', 'left');
			$this->db->join('sm_sediaan as sed', 'sed.id = b.id_sediaan', 'left');
			$this->db->join('sm_satuan as stn', 'stn.id = b.satuan_kekuatan', 'left');
			$this->db->join('sm_penjamin as pj', 'pj.id = penjd.id_asuransi', 'left');
			$this->db->where('penjd.id_penjualan', $val->id, true);
			$this->db->where('qty > 0');
			$val->detail = $this->db->get()->result();
		endforeach;
		return $data;
	}

	function getListTarifPKRT($id_layanan_pendaftaran)
	{
		$this->db->select("p.*, pk.nama as item, tpk.nominal as harga_item, p.tarif as total, '' as waktu_order, COALESCE(pj.nama, '') as penjamin, COALESCE(pj.diskon, 0) as diskon, NULL as nakes, 
    CASE 
        WHEN pj.diskon IS NOT NULL 
        THEN ((tpk.nominal::FLOAT * p.qty::FLOAT) * pj.diskon / 100) 
        ELSE 0 
    END as reimburse, p.qty as frekuensi", false);
		$this->db->from('sm_pembayaran_perbekalan_kesehatan p');
		$this->db->join('sm_tarif_perbekalan_kesehatan tpk', 'p.id_tarif_perbekalan = tpk.id');
		$this->db->join('sm_perbekalan_kesehatan pk', 'tpk.id_perbekalan_kesehatan = pk.id');
		$this->db->join('sm_layanan_pendaftaran lp', 'p.id_layanan_pendaftaran = lp.id');
		$this->db->join('sm_penjamin pj', 'lp.id_penjamin = pj.id', 'left');
		$this->db->where('p.id_layanan_pendaftaran', $id_layanan_pendaftaran, true);
		// $this->db->where('p.qty > 0');
		return $this->db->get()->result();
	}

	function getListTarifBarangBankDarah($id_layanan_pendaftaran)
	{
		$this->db->select("
			penj.*, (null) as detail, penj.waktu as waktu_konfirm,
			(penj.total) as tagihan
		");
		$this->db->from('sm_penjualan_bank_darah as penj');
		$this->db->where('penj.id_layanan_pendaftaran', $id_layanan_pendaftaran, true);
		$this->db->where('penj.jenis', 'Bank Darah', true);
		$this->db->where('penj.status_bank_darah !=', 0);
		$data = $this->db->get()->result();
		foreach ($data as $i => $val) :
			$this->db->select("
				CONCAT_WS(' ', b.nama, b.kekuatan, stn.nama, sed.nama, '<small><i>', COALESCE(pb.nama, ''), '</i></small>') as item,
				COALESCE(pj.nama, '') as penjamin,
				COALESCE(pj.diskon, '0') as diskon,
				penjd.harga_jual,
				penjd.qty,
				ROUND(
					CAST (
					   (penjd.harga_jual * penjd.qty)
					   as numeric
					), 2) as total,
				penjd.reimburse
			");
			$this->db->from('sm_detail_penjualan_bank_darah as penjd');
			$this->db->join('sm_penjualan_bank_darah as p', 'p.id = penjd.id_penjualan');
			$this->db->join('sm_kemasan_barang as kb', 'kb.id = penjd.id_kemasan');
			$this->db->join('sm_barang as b', 'b.id = kb.id_barang');
			$this->db->join('sm_pabrik as pb', 'pb.id = b.id_pabrik', 'left');
			$this->db->join('sm_sediaan as sed', 'sed.id = b.id_sediaan', 'left');
			$this->db->join('sm_satuan as stn', 'stn.id = b.satuan_kekuatan', 'left');
			$this->db->join('sm_penjamin as pj', 'pj.id = penjd.id_asuransi', 'left');
			$this->db->where('penjd.id_penjualan', $val->id, true);
			$this->db->where('qty > 0');
			$this->db->where('penjd.status_order_darah', 'Confirmed', true);
			$val->detail = $this->db->get()->result();
		endforeach;
		return $data;
	}

	function getListTarifBarangOperasi($id_layanan_pendaftaran)
	{
		$this->db->select("
			penj.*, (null) as detail, penj.waktu as waktu_konfirm,
			(penj.total) as tagihan
		");
		$this->db->from('sm_penjualan as penj');
		$this->db->join('sm_jadwal_kamar_operasi as jko', 'jko.id = penj.id_operasi');
		$this->db->where('jko.id_layanan_pendaftaran', $id_layanan_pendaftaran, true);
		$data = $this->db->get()->result();
		foreach ($data as $i => $val) :
			$this->db->select("
				CONCAT_WS(' ', b.nama, b.kekuatan, stn.nama) as item,
				COALESCE(pj.nama, '') as penjamin,
				COALESCE(pj.diskon, '0') as diskon,
				penjd.harga_jual,
				penjd.qty,
				((penjd.harga_jual - penjd.disc_rp) * penjd.qty) as total,
				penjd.reimburse
			");
			$this->db->from('sm_detail_penjualan as penjd');
			$this->db->join('sm_kemasan_barang as kb', 'kb.id = penjd.id_kemasan');
			$this->db->join('sm_barang as b', 'b.id = kb.id_barang');
			$this->db->join('sm_satuan as stn', 'stn.id = b.satuan_kekuatan', 'left');
			$this->db->join('sm_penjamin as pj', 'pj.id = penjd.id_asuransi', 'left');
			$this->db->where('penjd.id_penjualan', $val->id, true);
			$val->detail = $this->db->get()->result();
		endforeach;
		return $data;
	}

	function getListTarifKamar($id_layanan_pendaftaran)
	{
		$sql = "select concat_ws(' kelas ', bg.nama, k.nama) as bangsal, 
				COALESCE(ri.diskon, '0') as diskon, 
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
				and lp.status_terlayani != 'Batal'
				group by bg.nama, k.nama, ri.diskon, ri.nominal, lp.tindak_lanjut, ri.waktu_keluar, ri.total_hari, ri.waktu_masuk, ri.waktu_keluar";
		return $this->db->query($sql)->result();
	}

	function getListTarifKamarIcare($id_layanan_pendaftaran)
	{
		$sql = "select concat_ws(' kelas ', bg.nama, k.nama) as bangsal, 
				COALESCE(ri.diskon, '0') as diskon, 
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
				and lp.status_terlayani != 'Batal'
				group by bg.nama, k.nama, ri.diskon, ri.nominal, lp.tindak_lanjut, ri.waktu_keluar, ri.total_hari, ri.waktu_masuk, ri.waktu_keluar";
		return $this->db->query($sql)->result();
	}

	function getListTarifOperasi($id_layanan_pendaftaran, $layanan)
	{
		$this->db->select("
			top.*, l.nama as item, jko.id,
			COALESCE(pj.nama, '') as penjamin,
			COALESCE(pj.diskon, '0') as diskon,
			top.total as harga_item,
			(top.total) as total,
			(top.reimburse) as reimburse,
			((top.total) - (top.reimburse)) as tagihan,
			(1) as frekuensi, 
			(null) as operator_list, 
			(null) as anesthesi_list,
			pg.nama as operator,
		");
		$this->db->from('sm_pendaftaran as pd');
		$this->db->join('sm_layanan_pendaftaran as lp', 'lp.id_pendaftaran = pd.id');
		$this->db->join('sm_jadwal_kamar_operasi as jko', 'jko.id_layanan_pendaftaran = lp.id');
		$this->db->join('sm_tarif_operasi as top', 'top.id_operasi = jko.id');
		$this->db->join('sm_tarif_pelayanan as tp', 'tp.id = top.id_tarif');
		$this->db->join('sm_layanan as l', 'l.id = tp.id_layanan');
		$this->db->join('sm_tenaga_medis as tm', 'tm.id = top.id_nadis', 'left');
		$this->db->join('sm_pegawai as pg', 'pg.id = tm.id_pegawai', 'left');
		$this->db->join('sm_penjamin as pj', 'pj.id = top.id_penjamin', 'left');
		$this->db->where('lp.id', $id_layanan_pendaftaran, true);
		$this->db->where('jko.layanan', $layanan, true);
		$this->db->where('jko.status', 'Confirmed');
		$data = $this->db->get()->result();
		foreach ($data as $i => $val) :
			if ($val->is_operasi === 'Ya') :
				// dokter operator
				$this->db->select("COALESCE(pg.nama, '') as operator");
				$this->db->from('sm_tim_operasi as tim');
				$this->db->join('sm_tenaga_medis as tm', 'tm.id = tim.id_nadis', 'left');
				$this->db->join('sm_pegawai as pg', 'pg.id = tm.id_pegawai', 'left');
				$this->db->where('tim.id_jadwal_operasi', $val->id, true);
				$this->db->where('tim.status', 'Dokter Operator');
				$data[$i]->operator_list = $this->db->get()->result();
				// dokter anesthesi
				$this->db->select("COALESCE(pg.nama, '') as operator");
				$this->db->from('sm_tim_operasi as tim');
				$this->db->join('sm_tenaga_medis as tm', 'tm.id = tim.id_nadis', 'left');
				$this->db->join('sm_pegawai as pg', 'pg.id = tm.id_pegawai', 'left');
				$this->db->where('tim.id_jadwal_operasi', $val->id, true);
				$this->db->where('tim.status', 'Dokter Anesthesi');
				$data[$i]->anesthesi_list = $this->db->get()->result();
			else :
				$data[$i]->operator_list = [];
				$data[$i]->anesthesi_list = [];
			endif;
		endforeach;
		return $data;
	}

	function getListTarifBankDarah($id_layanan_pendaftaran)
	{
		$this->db->select("
			tbd.*, l.nama as item, obd.id,
			COALESCE(pj.nama, '') as penjamin,
			COALESCE(pj.diskon, '0') as diskon,
			tbd.total as harga_item,
			(tbd.total) as total,
			(tbd.reimburse) as reimburse,
			((tbd.total) - (tbd.reimburse)) as tagihan,
			(1) as frekuensi, 
			pg.nama as operator,
		");
		$this->db->from('sm_pendaftaran as pd');
		$this->db->join('sm_layanan_pendaftaran as lp', 'lp.id_pendaftaran = pd.id');
		$this->db->join('sm_order_bank_darah as obd', 'obd.id_layanan_pendaftaran = lp.id');
		$this->db->join('sm_tarif_bank_darah as tbd', 'tbd.id_order_bank_darah = obd.id');
		$this->db->join('sm_tarif_pelayanan as tp', 'tp.id = tbd.id_tarif');
		$this->db->join('sm_layanan as l', 'l.id = tp.id_layanan');
		$this->db->join('sm_tenaga_medis as tm', 'tm.id = tbd.id_nadis', 'left');
		$this->db->join('sm_pegawai as pg', 'pg.id = tm.id_pegawai', 'left');
		$this->db->join('sm_penjamin as pj', 'pj.id = tbd.id_penjamin', 'left');
		$this->db->where('lp.id', $id_layanan_pendaftaran, true);
		$this->db->where('obd.layanan', 'Bank Darah', true);
		$data = $this->db->get()->result();
		return $data;
	}

	function getListReturBarang($id_layanan_pendaftaran)
	{
		$this->db->select("
			rp.*, (null) as detail, penj.waktu as waktu_konfirm,
			(null) as tagihan
		");
		$this->db->from('sm_retur_penjualan as rp');
		$this->db->join('sm_penjualan as penj', 'penj.id = rp.id_penjualan');
		$this->db->where('penj.id_layanan_pendaftaran', $id_layanan_pendaftaran, true);
		$data = $this->db->get()->result();
		foreach ($data as $i => $val) :
			$this->db->select("
				CONCAT_WS(' ', b.nama, b.kekuatan, stn.nama, sed.nama, '<small><i>, COALESCE(pb.nama, ''), </i></small>') as item,
				(null) as penjamin,
				(null) as diskon,
				penjd.harga_jual,
				penjd.qty,
				(penjd.harga_jual * penjd.qty) as total,
				(null) as reimburse
			");
			$this->db->from('sm_detur_penjualan as penjd');
			$this->db->join('sm_kemasan_barang as kb', 'kb.id = penjd.id_kemasan_barang');
			$this->db->join('sm_barang as b', 'b.id = kb.id_barang');
			$this->db->join('sm_pabrik as pb', 'pb.id = b.id_pabrik', 'left');
			$this->db->join('sm_sediaan as sed', 'sed.id = b.id_sediaan', 'left');
			$this->db->join('sm_satuan as stn', 'stn.id = b.satuan_kekuatan', 'left');
			$this->db->where('penjd.id_retur_penjualan', $val->id, true);
			$val->detail = $this->db->get()->result();
		endforeach;
		return $data;
	}

	function getListTarifHemodialisa($id_layanan_pendaftaran, $id_history_pembayaran = NULL)
	{
		$where = NULL;
		if ($id_history_pembayaran !== NULL) :
			$where .= " and km.id_history_pembayaran = '".$id_history_pembayaran."'";
		endif;

		$sql = "select tk.*, l.nama as item, l.id as id_layanan, 
				coalesce(pj.nama, '') as penjamin, 
				coalesce(pj.diskon, 0) as diskon, 
				case when tk.is_hemodialisa = 'Ya' 
					then 'Tim HD' 
					else coalesce(pg.nama, '') 
				end as operator, 
				tk.total as harga_item, 
				sum(tk.total) as total, 
				sum(tk.reimburse) as reimburse, 
				(sum(tk.total) - sum(tk.reimburse)) as tagihan, 
				count(*) as frekuensi, 
				coalesce(prn.nama, '') as profesi, 
				case when tk.is_hemodialisa = 'Ya'
					then (tk.total - tk.jasa_rs) 
					else tk.jasa_operator
				end as jasa_medis,
				tk.jasa_rs as jasa_klinik, 
				tk.jasa_tindakan_reuse as lain_lain, 
				km.id as id_hd, 
				tk.is_hemodialisa 
				from sm_pendaftaran pd 
                join sm_layanan_pendaftaran lp on (lp.id_pendaftaran = pd.id)
                join sm_hemodialisa km on (km.id_layanan_pendaftaran = lp.id)
                join sm_tarif_hemodialisa tk on (tk.id_hemodialisa = km.id)
                join sm_tarif_pelayanan kt on (kt.id = tk.id_tarif)
                join sm_layanan l on (kt.id_layanan = l.id) 
                left join sm_tenaga_medis nk on (tk.id_operator = nk.id) 
                left join sm_pegawai pg on (pg.id = nk.id_pegawai)
                left join sm_penjamin pj on (pj.id = lp.id_penjamin) 
                left join sm_profesi_nadis prn on (prn.id = nk.id_profesi)
                where lp.id = '" . $id_layanan_pendaftaran . "' " . $where . " 
				group by 
					kt.id,
					tk.id_operator, tk.id,
					l.nama, l.id,
					pj.nama, pj.diskon,
					pg.nama,
					prn.nama,
					km.id
                order by prn.nama, l.id";
		$result = $this->db->query($sql)->result();
		foreach ($result as $key => $value) :
			
		endforeach;
	}
	
	function simpanWaktuCetak($id_pendaftaran = 0, $keterangan) 
    {
		$this->db->trans_begin();
		$keterangan==1 ? $keterangan_cetak_billing='Cetak' : $keterangan_cetak_billing='Tidak ada perubahan billing';
		$jml_cetak = $this->db->where('id', $id_pendaftaran, true)->select('jumlah_cetak_billing')->get('sm_pendaftaran')->row()->jumlah_cetak_billing ?? 0;   
        $data_update = array('user_cetak_billing'  => $this->session->userdata('id_translucent'), 
							 'waktu_cetak_billing' => $this->datetime,
							 'jumlah_cetak_billing'=> intval($jml_cetak)+1,
							 'keterangan_cetak_billing'=> $keterangan_cetak_billing);
        $this->db->where('id', $id_pendaftaran, true)->update('sm_pendaftaran', $data_update);

        if ($this->db->trans_status() === false) :
			$this->db->trans_rollback();
			$status = false;
			$message = 'Gagal simpan waktu cetak';
		else :
			$this->db->trans_commit();
			$status = true;
			$message = 'Berhasil simpan waktu cetak';
		endif;

		return array('status' => $status, 'message' => $message);
    }

	function getStatusCco($start, $limit)
    {
        $result['data'] = $this->_getStatusCco($start, $limit);
        $result['jumlah'] = $this->sqlGetStatusCco()->get()->num_rows();
        $this->db->close();
        return $result;
    }

	private function _getStatusCco($start, $limit)
    {
        $this->sqlGetStatusCco();
        if ($limit !== 0) :
            $this->db->limit($limit, $start);
        endif;
        return $this->db->get()->result();
    }

	private function sqlGetStatusCco()
    {	
		$this->db->select("pd.id, pd.no_register, pd.id_pasien, ps.nama, COALESCE(pj.nama, '') as penjamin, pd.tanggal_daftar, pd.waktu_cetak_billing, lp.tanggal_batal_keluar,0 as tagihan",false);
        $this->db->from('sm_layanan_pendaftaran lp ');
        $this->db->join('sm_pendaftaran pd', 'lp.id_pendaftaran=pd.id');
        $this->db->join('sm_pasien ps', 'ps.id=pd.id_pasien');
        $this->db->join('sm_penjamin as pj', 'pj.id = pd.id_penjamin', 'left');
		
        $this->db->where("lp.tindak_lanjut<>'cco sementra it' ");
		$this->db->where("lp.is_have_cco_it=1");
        $this->db->where("lp.tindak_lanjut_sementara <>''");
        $this->db->where("pd.waktu_cetak_billing is not null");
        $this->db->where("pd.waktu_cetak_billing < lp.tanggal_batal_keluar");
        $this->db->group_by('pd.id, pd.id_pasien, ps.nama, ps.tanggal_daftar,  pd.waktu_cetak_billing, lp.tanggal_batal_keluar,pj.nama');
        return $this->db->order_by('pd.tanggal_daftar', 'DESC');
    }
}
