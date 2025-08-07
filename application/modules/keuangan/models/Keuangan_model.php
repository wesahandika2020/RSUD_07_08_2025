<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Keuangan_model extends CI_Model
{

	function __construct()
	{
		parent::__construct();
		$this->datetime = date('Y-m-d H:i:s');
		$this->load->model('keuangan/Keuangan_ver2_model', 'm_keuangan_ver2');
	}

	function statusPembayaran()
	{
		return array("" => "Pilih", "Belum" => "Belum Lunas", "Sudah" => "Lunas");
	}

	function getMetodePembayaran()
	{
		$query = $this->db->order_by('sort', 'asc')->order_by('nama', 'asc')->get('sm_metode_pembayaran')->result();
		$data =  array();
		foreach ($query as $key => $value) :
			$data[$value->id] = $value->nama;
		endforeach;
		return $data;
	}

	function getTransaksi()
	{
		return array(
			"" => "Pilih Transaksi",
			"Poliklinik" => "Poliklinik",
			"IGD" => "IGD",
			"Rawat Inap" => "Rawat Inap",
			"Intensive Care" => "Intensive Care",
			"Pendaftaran" => "Pendaftaran",
			"Tindakan" => "Tindakan",
			"Laboratorium" => "Laboratorium",
			"Radiologi" => "Radiologi",
			"Fisioterapi" => "Fisioterapi",
			"Hemodialisa" => "Hemodialisa",
			// "Obsgyn" => "Obsgyn", 
			"Operasi" => "Operasi",
			"Barang" => "Barang",
			"BHP" => "BHP",
			"Bank Darah" => "Bank Darah",
			"Medical Check Up" => "Medical Check Up",
			"Pemulasaran Jenazah" => "Pemulasaran Jenazah",
			"PKRT" => "PKRT",
			// "Forensik" => "Forensik", 
			// "Intensif" => "Intensif", 
			"Lain - Lain" => "Lain - Lain"
		);
	}

	function getListDataRekapBilling($limit, $start, $search)
	{
		$param = "";
		$lunas  = "";
		if ($search["tanggal_awal"] !== "" & $search["tanggal_akhir"] !== "") :
			$param .= " and pd.tanggal_daftar BETWEEN '" . date2mysql($search['tanggal_awal']) . " 00:00:00' AND '" . date2mysql($search['tanggal_akhir']) . " 23:59:59'";
		endif;
		if ($search["keyword"] !== "") :
			$param .= " and (p.nama ilike '%" . $search["keyword"] . "%' or p.id ilike '%" . $search["keyword"] . "%') ";
		endif;
		if ($search["nama"] !== "") :
			$param .= " and p.nama ilike '%" . $search["nama"] . "%' ";
		endif;
		if ($search["no_register"] !== "") :
			$param .= " and pd.no_register = '" . $search["no_register"] . "' ";
		endif;
		if ($search["no_rm"] !== "") :
			$param .= " and p.id ilike '%" . $search["no_rm"] . "' ";
		endif;
		if ($search["jenis"] === "rawat_jalan") :
			$param .= " and (lp.jenis_layanan = 'Poliklinik' or lp.jenis_layanan = 'IGD' or lp.jenis_layanan = 'Forensik' or lp.jenis_layanan = 'Pemulasaran Jenazah' or lp.jenis_layanan = 'Hemodialisa'  or lp.jenis_layanan = 'Medical Check Up') ";
		else :
			if ($search["jenis"] === "rawat_inap") :
				$param .= " and (lp.jenis_layanan = 'Rawat Inap' or lp.jenis_layanan = 'Intensive Care') ";
			else :
				if ($search["jenis"] === "langsung") :
					$param .= " and (lp.jenis_layanan = 'Laboratorium' or lp.jenis_layanan = 'Radiologi' or lp.jenis_layanan = 'Fisioterapi') ";
				endif;
			endif;
		endif;
		if ($search["status_bayar"] === "Belum") :
			$param .= " and (select count(id) from sm_pembayaran where id_pendaftaran = pd.id and status = 'Tagihan') > 0 ";
		else :
			if ($search["status_bayar"] === 'Sudah') :
				$param .= " and (select count(id) from sm_pembayaran where id_pendaftaran = pd.id and status = 'Tagihan') < 1 ";
			endif;
		endif;
		if ($search["cara_bayar"] !== "") :
			$param .= " and lp.cara_bayar = '" . $search["cara_bayar"] . "' ";
		endif;
		if ($search["penjamin"] !== "") :
			$param .= " and lp.id_penjamin = '" . $search["penjamin"] . "' ";
		endif;
		if ($search["dokter"] !== "") :
			$param .= " and lp.id_dokter = '" . $search["dokter"] . "' ";
		endif;

		$limitation = " limit " . $limit . " offset " . $start;
		$select = "select DISTINCT ON (pd.id) pd.*, CONCAT_WS(' ', p.nama, COALESCE(p.status_pasien, '')) as nama, p.id as id_pasien, p.kelamin, p.alamat, 
					lp.jenis_layanan, lp.cara_bayar, 
					COALESCE(pj.diskon, 0) as diskon_asuransi, 
					COALESCE(pj.nama, '') as penjamin,
					COALESCE(sp.nama, '') as spesialisasi, 
					0 as tagihan,
					SUM(pmb.total) as total, lp.status_terlayani,
					pmb.status as status_billing, 
					( select count(id) from sm_pembayaran where id_pendaftaran = pd.id and status = 'Tagihan' ) as status_tagihan,
					CASE WHEN pd.tanggal_keluar IS NULL THEN 'Aktif' ELSE 'Pulang' END as status_kunjungan, 
					COALESCE(pd.keterangan, pd.jenis_pendaftaran) as keterangan, 
					pd.waktu_cetak_billing, pd.user_cetak_billing, pd.jumlah_cetak_billing,lp.is_have_cco_it ";
		$count = "select count(*) as count from (select DISTINCT ON (pd.id) pd.* ";
		$sql = "from sm_pendaftaran as pd 
				join sm_pasien as p on (p.id = pd.id_pasien) 
				left join sm_pembayaran as pmb on (pmb.id_pendaftaran = pd.id) 
				left join sm_layanan_pendaftaran as lp on (lp.id_pendaftaran = pd.id) 
				left join sm_spesialisasi as sp on (sp.id = lp.id_unit_layanan) 
				left join sm_penjamin as pj on (pj.id = lp.id_penjamin) where pd.id is not null " . $param . " 
				group by pmb.id_pendaftaran, pd.id, p.nama, p.status_pasien, p.id, p.kelamin, p.alamat, lp.jenis_layanan, lp.cara_bayar, pj.diskon, pj.nama, sp.nama, pmb.total, pmb.status, lp.status_terlayani,lp.is_have_cco_it ";
		$order = " order by pd.id desc, pmb.status asc, pd.tanggal_daftar desc ";
		// echo $select . $sql . $order . $limitation; die;
		$query = $this->db->query($select . $sql . $order . $limitation)->result();
		
		$piutang_dibayar = 0;
		foreach ($query as $i => $value) :
			$tagihan = $this->m_keuangan_ver2->hitungTagihan($value->id);
			$value->tagihan = $tagihan;

			// Piutang 
			$piutang_dibayar = $this->m_keuangan_ver2->hitungPiutangDibayarkan($value->id);
			$value->piutang_dibayar = $piutang_dibayar;
			
			$cek_cco = $this->getTindakLanjut($value->id);
			$value->cek_cco = $cek_cco != NULL ? 'cco sementara' : '-';
			$value->tanggal_batal_keluar = $cek_cco != NULL ? $cek_cco : '-';
		endforeach;

		$result["data"] = $query;
		$result["jumlah"] = $this->db->query($count . $sql . ") as jml")->row()->count;
		return $result;
	}

	function getTindakLanjut($id_pendaftaran)
	{
		$sqlLayanan = "select lp.tanggal_batal_keluar from sm_layanan_pendaftaran lp where lp.tindak_lanjut_sementara <> '' and lp.tindak_lanjut <> 'cco sementara'
					   and lp.id_pendaftaran='" . $id_pendaftaran . "' limit 1";
		$data = $this->db->query($sqlLayanan)->row()->tanggal_batal_keluar ?? NULL;
		return $data;
	}
	
	function getPendaftaranDetail($id_pendaftaran, $id_layanan_pendaftaran = NULL, $justpoli = NULL)
	{
		$param = "";
		$sql = "select pd.*, CONCAT_WS(' ', p.nama, COALESCE(p.status_pasien, '')) as nama, p.kelamin, p.alamat, 
				p.telp, p.agama, p.tanggal_lahir, 
				coalesce(p.nama_prop, '') as provinsi,
				coalesce(p.nama_kab, '') as kabupaten,
				coalesce(p.nama_kec, '') as kecamatan,
				coalesce(p.nama_kel, '') as kelurahan,
				coalesce(pk.nama, '') as pekerjaan, 
				coalesce(pj.nama, '') as penjamin, 
				coalesce(pj.diskon, 0) as diskon, 
				ins.nama as instansi_perujuk, 
				(null) as tagihan_pendaftaran 
				from sm_pendaftaran as pd 
				join sm_pasien as p on (p.id = pd.id_pasien) 
				left join sm_instansi as ins on (ins.id = pd.id_instansi_perujuk) 
				left join sm_pekerjaan as pk on (pk.id = pd.id_penjamin) 
				left join sm_penjamin as pj on (pj.id = pd.id_penjamin) 
				where pd.id = '" . $id_pendaftaran . "'";
		$data["pasien"] = $this->db->query($sql)->row();
		$sqlLayanan = "select lp.*, 
					coalesce(sp.nama, '') as layanan, 
					coalesce(pj.nama, '') as penjamin, 
					coalesce(pj.diskon, 0) as diskon, 
					(null) as id_pembayaran, 
					(null) as billing,
					(null) as tindakan, 
					(null) as laboratorium, 
					(null) as radiologi, 
					(null) as fisioterapi, 
					(null) as rawat_inap, 
					(null) as intensive_care,
					(null) as barang, 
					(null) as barang_operasi, 
					(null) as operasi, 
					(0) as total_bayar, 
					(0) as total_tagihan, 
					(0) as item_billing, 
					CASE WHEN 
						ri.id is null
					THEN 
						'Tidak Rawat Inap' 
					ELSE 
						CASE WHEN 
							ri.waktu_keluar is null
						THEN 
							'Masih Dirawat' 
						ELSE 
							'Sudah Keluar'
						END
					END as status_rawat, 
					CASE WHEN 
						ic.id is null
					THEN 
						'Tidak Intensive Care' 
					ELSE 
						CASE WHEN 
							ic.waktu_keluar is null
						THEN 
							'Masih Dirawat' 
						ELSE 
							'Sudah Keluar'
						END
					END as status_rawat_icare,
					coalesce(pg.nama, '') as dokter 
					from sm_layanan_pendaftaran as lp 
					left join sm_spesialisasi as sp on (sp.id = lp.id_unit_layanan) 
					left join sm_penjamin as pj on (pj.id = lp.id_penjamin) 
					left join sm_rawat_inap as ri on (ri.id_layanan_pendaftaran = lp.id) 
					left join sm_intensive_care as ic on (ic.id_layanan_pendaftaran = lp.id)
					left join sm_tenaga_medis as tm on (tm.id = lp.id_dokter) 
					left join sm_pegawai as pg on (pg.id = tm.id_pegawai) 
					where lp.id_pendaftaran = '" . $id_pendaftaran . "' ";
		if ($justpoli === 'poli') :
			$sqlLayanan .= "and (lp.jenis_layanan != 'Rawat Inap' and lp.jenis_layanan != 'IGD' and lp.jenis_layanan != 'Intensive Care') ";
		else :
			if ($justpoli === 'inap') :
				$sqlLayanan .= "and (lp.jenis_layanan = 'Rawat Inap' or lp.jenis_Layanan = 'IGD' or lp.jenis_Layanan = 'Intensive Care') ";
			endif;
		endif;

		if ($id_layanan_pendaftaran !== NULL) :
			$param = "and lp.id = '" . $id_layanan_pendaftaran . "'";
			$dataLayanan = $this->db->query($sqlLayanan . $param)->result();
		else :
			$dataLayanan = $this->db->query($sqlLayanan)->result();
		endif;

		$data["layanan"] = $dataLayanan;
		return $data;
	}

	function getLayananNonKlinik($id_pendaftaran)
	{
		$sqlLayanan = "select lp.*, 
					coalesce(sp.nama, '') as layanan, 
					coalesce(pj.nama, '') as penjamin, 
					coalesce(pj.diskon, 0) as diskon,
					(null) as id_pembayaran, 
					(null) as billing, 
					CASE WHEN 
						ri.id is null
					THEN 
						'Tidak Rawat Inap' 
					ELSE 
						CASE WHEN 
							ri.waktu_keluar is null
						THEN 
							'Masih Dirawat' 
						ELSE 
							'Sudah Keluar'
						END
					END as status_rawat, 
					CASE WHEN 
					ic.id is null
				THEN 
					'Tidak Intensive Care' 
				ELSE 
					CASE WHEN 
						ic.waktu_keluar is null
					THEN 
						'Masih Dirawat' 
					ELSE 
						'Sudah Keluar'
					END
				END as status_rawat_icare
					from sm_layanan_pendaftaran as lp 
					left join sm_spesialisasi as sp on (sp.id = lp.id_unit_layanan) 
					left join sm_penjamin as pj on (pj.id = lp.id_penjamin) 
					left join sm_rawat_inap as ri on (ri.id_layanan_pendaftaran = lp.id) 
					left join sm_intensive_care as ic on (ic.id_layanan_pendaftaran = lp.id)
					where lp.id_pendaftaran = '" . $id_pendaftaran . "' 
					and (lp.jenis_layanan = 'IGD' or lp.jenis_layanan = 'Rawat Inap' or lp.jenis_layanan = 'Intensive Care') 
					order by lp.id desc limit 1 offset 0";
		$data = $this->db->query($sqlLayanan)->row();
		return $data;
	}

	function getPembayaranBilling($id_pendaftaran, $id_layanan_pendaftaran, $jenis_layanan)
	{
		if ($jenis_layanan === 'IGD' | $jenis_layanan === 'Rawat Inap' | $jenis_layanan === 'Intensive Care') :
			$sql = "select id, id_pendaftaran, jenis_transaksi, status, 
					sum(total) as total, sum(reimburse) as reimburse, 
					sum(ditanggung) as ditanggung, sum(terbayar) as terbayar, 
					sum(ceil(total) - ceil(reimburse) - terbayar) as sisa_tagihan 
					from sm_pembayaran 
					where id_pendaftaran = '" . $id_pendaftaran . "' 
					and jenis_transaksi = '" . $jenis_layanan . "' 
					group by id ";
			$data = $this->db->query($sql)->result();
			foreach ($data as $i => $value) :
				if ($jenis_layanan === 'Rawat Inap' | $jenis_layanan === 'Intensive Care') :
					$value->jenis_transaksi = $jenis_layanan;
				endif;
				$pembayaran = $this->getTotalPenagihan($id_pendaftaran);
				$totalize = $pembayaran['total_billing'];
				if (!$pembayaran['ditanggung']) :
					$totalize -= $pembayaran['reimburse'];
				endif;
				$value->total = round($pembayaran['total_billing']);
				$value->reimburse = round($pembayaran['reimburse']);
				$value->sisa_tagihan = round($totalize - $value->ditanggung);
			endforeach;
		else :
			$sql = "select *, round(total) as total, round(reimburse) as reimburse, round(total - reimburse - terbayar) as sisa_tagihan 
					from sm_pembayaran where id_layanan_pendaftaran = '" . $id_layanan_pendaftaran . "' ";
			$data = $this->db->query($sql)->result();
		endif;

		return $data;
	}

	function getTotalPenagihan($id_pendaftaran)
	{
		$sql = "select pb.*, 
				COALESCE(pj.diskon, 0) as diskon 
				from sm_pembayaran as pb 
				join sm_layanan_pendaftaran as lp on (pb.id_layanan_pendaftaran = lp.id) 
				left join sm_penjamin as pj on (pj.id = lp.id_penjamin) 
				where pb.id_pendaftaran = '" . $id_pendaftaran . "' 
				and (jenis_transaksi = 'IGD' or jenis_transaksi = 'Rawat Inap' or jenis_transaksi = 'Intensive Care') ";
		$query = $this->db->query($sql)->result();
		$total = 0;
		$totalBilling = 0;
		$reimburse = 0;
		$ditanggung = 0;
		foreach ($query as $i => $value) :
			if (0 < $value->ditanggung) :
				$ditanggung = true;
				break;
			endif;
		endforeach;
		foreach ($query as $i => $value) :
			$total = 0;
			$total += $this->hitungTotalTindakanPasien($value->id_layanan_pendaftaran);
			$total += $this->hitungTotalLaboratorium($value->id_layanan_pendaftaran);
			$total += $this->hitungTotalRadiologi($value->id_layanan_pendaftaran);
			$total += $this->hitungTotalFisioterapi($value->id_layanan_pendaftaran);
			$total += $this->hitungTotalBarang($value->id_layanan_pendaftaran);
			$total += $this->hitungTotalBarangOperasi($value->id_layanan_pendaftaran);
			$total += $this->hitungTotalOperasi($value->id_layanan_pendaftaran);
			$total += $this->hitungTotalKamarRanap($value->id_layanan_pendaftaran);
			$total += $this->hitungTotalKamarIcare($value->id_layanan_pendaftaran);
			$total += $this->hitungTotalBankDarah($value->id_layanan_pendaftaran);
			// $total += $this->hitungTotalBarangBankDarah($value->id_layanan_pendaftaran);
			$reimburse += $value->diskon / 100 * $total;
			$totalBilling += $total;
		endforeach;

		return array("ditanggung" => $ditanggung, "total_billing" => $totalBilling, "reimburse" => $reimburse);
	}

	function getTotalPenagihanTanpaDiskon($id_pendaftaran)
	{
		$sql = "select pb.* 
				from sm_pembayaran as pb 
				join sm_layanan_pendaftaran as lp on (pb.id_layanan_pendaftaran = lp.id) 
				where pb.id_pendaftaran = '" . $id_pendaftaran . "' 
				and (jenis_transaksi = 'IGD' or jenis_transaksi = 'Rawat Inap' or jenis_transaksi = 'Intensive Care') ";
		$query = $this->db->query($sql)->result();
		$total = 0;
		$totalBilling = 0;
		foreach ($query as $i => $value) :
			$total = 0;
			$total += $this->hitungTotalTindakanPasien($value->id_layanan_pendaftaran);
			$total += $this->hitungTotalLaboratorium($value->id_layanan_pendaftaran);
			$total += $this->hitungTotalRadiologi($value->id_layanan_pendaftaran);
			$total += $this->hitungTotalFisioterapi($value->id_layanan_pendaftaran);
			$total += $this->hitungTotalBarang($value->id_layanan_pendaftaran);
			$total += $this->hitungTotalBarangOperasi($value->id_layanan_pendaftaran);
			$total += $this->hitungTotalOperasi($value->id_layanan_pendaftaran);
			$total += $this->hitungTotalKamarRanap($value->id_layanan_pendaftaran);
			$total += $this->hitungTotalKamarIcare($value->id_layanan_pendaftaran);
			$total += $this->hitungTotalBankDarah($value->id_layanan_pendaftaran);
			// $total += $this->hitungTotalBarangBankDarah($value->id_layanan_pendaftaran);
			$totalBilling += $total;
		endforeach;

		// total penagihan
		return $totalBilling;
	}


	function hitungTotalTindakanPasien($id_layanan_pendaftaran)
	{
		$data = $this->db->select("sum(ttp.total) as total")->from("sm_tarif_tindakan_pasien as ttp")->where("ttp.id_layanan_pendaftaran", $id_layanan_pendaftaran, true)->get()->row();
		$total = $data->total;
		if ($total === NULL) :
			$total;
		endif;
		return $total;
	}

	function hitungTotalLaboratorium($id_layanan_pendaftaran)
	{
		$data = $this->db->where("id_layanan_pendaftaran", $id_layanan_pendaftaran, true)->get("sm_laboratorium")->result();
		$total = 0;
		foreach ($data as $i => $value) :
			$detail = $this->db->select("sum(total) as total")->from("sm_detail_laboratorium")->where("id_laboratorium", $value->id, true)->get()->row();
			$total += $detail->total;
		endforeach;
		return $total;
	}

	function hitungTotalRadiologi($id_layanan_pendaftaran)
	{
		$data = $this->db->where("id_layanan_pendaftaran", $id_layanan_pendaftaran, true)->get("sm_radiologi")->result();
		$total = 0;
		foreach ($data as $i => $value) :
			$detail = $this->db->select("sum(total) as total")->from("sm_detail_radiologi")->where("id_radiologi", $value->id, true)->get()->row();
			$total += $detail->total;
		endforeach;
		return $total;
	}

	function hitungTotalFisioterapi($id_layanan_pendaftaran)
	{
		$data = $this->db->where("id_layanan_pendaftaran", $id_layanan_pendaftaran, true)->get("sm_fisioterapi")->result();
		$total = 0;
		foreach ($data as $i => $value) :
			$detail = $this->db->select("sum(total) as total")->from("sm_detail_fisioterapi")->where("id_fisioterapi", $value->id, true)->get()->row();
			$total += $detail->total;
		endforeach;
		return $total;
	}

	function hitungTotalBarang($id_layanan_pendaftaran)
	{
		$obat = $this->db->select("*, (null) as detail, waktu as waktu_konfirm, (total) as tagihan")->from("sm_penjualan")->where("id_layanan_pendaftaran", $id_layanan_pendaftaran, true)->get()->result();
		$total = 0;
		$detail = NULL;
		foreach ($obat as $i => $value) :
			$detail = $this->db->select("pjd.qty as qty, (pjd.harga_jual * pjd.qty) as total")
				->from("sm_detail_penjualan as pjd")
				->join("sm_penjualan as pj", "pj.id = pjd.id_penjualan")->join("sm_kemasan_barang as kb", "kb.id = pjd.id_kemasan")
				->where("pjd.id_penjualan", $value->id)
				->group_by('pjd.qty, pjd.harga_jual')
				->having("qty > 0")->get()->result();
			foreach ($detail as $row) :
				$total += $row->total;
			endforeach;
		endforeach;
		$totalRetur = 0;
		$dataReturPenjualan = $this->db->select("rpj.*, (null) as detail, pj.waktu as waktu_konfirm, (null) as tagihan")->from("sm_retur_penjualan as rpj")->join("sm_penjualan as pj", "pj.id = rpj.id_penjualan")->where("pj.id_layanan_pendaftaran", $id_layanan_pendaftaran, true)->get()->result();
		foreach ($dataReturPenjualan as $retur) :
			$detail = $this->db->select("sum(dpj.harga_jual * dpj.qty) as total")->from("sm_detur_penjualan as dpj")
				->join("sm_kemasan_barang as kb", "kb.id = dpj.id_kemasan_barang")
				->join("sm_barang as bar", "bar.id = kb.id_barang")
				->join("sm_pabrik pab", "pab.id = bar.id_pabrik", "left")
				->join("sm_sediaan as sd", "sd.id = bar.id_sediaan", "left")
				->join("sm_satuan as st", "st.id = bar.satuan_kekuatan")
				->where("dpj.id_retur_penjualan", $value->id, true)
				->get()->result();
			foreach ($detail as $row) :
				$totalRetur += $row->total;
			endforeach;
		endforeach;
		return $total - $totalRetur;
	}

	function hitungTotalBarangOperasi($id_layanan_pendaftaran)
	{
		$obat = $this->db->select("pj.*, (null) as detail, pj.waktu as waktu_konfirm, (pj.total) as tagihan")->from("sm_penjualan as pj")->join("sm_jadwal_kamar_operasi as jko", "jko.id = pj.id_operasi")->where("jko.id_layanan_pendaftaran", $id_layanan_pendaftaran, true)->get()->result();
		$total = 0;
		foreach ($obat as $i => $value) :
			$detail = $this->db->select("sum((dpj.harga_jual - dpj.disc_rp) * dpj.qty) as total")->from("sm_detail_penjualan as dpj")->where("dpj.id_penjualan", $value->id, true)->get()->row();
			$total += $detail->total;
		endforeach;
		return $total;
	}

	function hitungTotalOperasi($id_layanan_pendaftaran)
	{
		$data = $this->db->select("sum(top.total) as total")->from("sm_tarif_operasi as top")->join("sm_jadwal_kamar_operasi as jko", "jko.id = top.id_operasi")->where("jko.id_layanan_pendaftaran", $id_layanan_pendaftaran, true)->get()->row();
		$total = $data->total;
		if ($total === NULL) :
			$total = 0;
		endif;
		return $total;
	}

	function hitungAdministrasiRanap($id_layanan_pendaftaran)
	{
		$data = $this->db->select("total")->from("sm_tarif_tindakan_pasien")->where(array("id_layanan_pendaftaran" => $id_layanan_pendaftaran, "id_tarif_pelayanan", "139"))->get()->row();
		if (0 < count((array)$data)) :
			$total = $data->total;
		else :
			$total = 0;
		endif;
		return $total;
	}

	function hitungAdministrasiIcare($id_layanan_pendaftaran)
	{
		$data = $this->db->select("total")->from("sm_tarif_tindakan_pasien")->where(array("id_layanan_pendaftaran" => $id_layanan_pendaftaran, "id_tarif_pelayanan", "1511"))->get()->row();
		if (0 < count((array)$data)) :
			$total = $data->total;
		else :
			$total = 0;
		endif;
		return $total;
	}

	function hitungTotalKamarRanap($id_layanan_pendaftaran)
	{
		$ranap = $this->db->where("id_layanan_pendaftaran", $id_layanan_pendaftaran, true)->get("sm_rawat_inap")->row();
		$total = 0;
		if (0 < count((array)$ranap) && $ranap->waktu_keluar !== NULL) :
			$data = $this->db->select("sum(total_hari * nominal) as total")->from("sm_rawat_inap")->where("id_layanan_pendaftaran", $id_layanan_pendaftaran, true)->get()->row();
			$total = $data->total;
		endif;

		return (int) $total;
	}

	function hitungTotalKamarIcare($id_layanan_pendaftaran)
	{
		$icare = $this->db->where("id_layanan_pendaftaran", $id_layanan_pendaftaran, true)->get("sm_intensive_care")->row();
		$total = 0;
		if (0 < count((array)$icare) && $icare->waktu_keluar !== NULL) :
			$data = $this->db->select("sum(total_hari * nominal) as total")->from("sm_intensive_care")->where("id_layanan_pendaftaran", $id_layanan_pendaftaran, true)->get()->row();
			$total = $data->total;
		endif;

		return (int) $total;
	}

	function hitungTotalBankDarah($id_layanan_pendaftaran)
	{
		$data = $this->db->select("sum(tbd.total) as total")->from("sm_tarif_bank_darah as tbd")->join("sm_order_bank_darah as odb", "odb.id = tbd.id_order_bank_darah")->where("odb.id_layanan_pendaftaran", $id_layanan_pendaftaran, true)->get()->row();
		$total = $data->total;
		if ($total === NULL) :
			$total = 0;
		endif;
		return $total;
	}

	// function hitungTotalBarangBankDarah($id_layanan_pendaftaran)
	// {
	// 	$obat = $this->db->select("*, (null) as detail, waktu as waktu_konfirm, (total) as tagihan")->from("sm_penjualan")->where("id_layanan_pendaftaran", $id_layanan_pendaftaran, true)->get()->result();
	// 	$total = 0;
	// 	$detail = NULL;
	// 	foreach ($obat as $i => $value) :
	// 		$detail = $this->db->select("pjd.qty as qty, (pjd.harga_jual * pjd.qty) as total")
	// 						->from("sm_detail_penjualan as pjd")
	// 						->join("sm_penjualan as pj", "pj.id = pjd.id_penjualan")->join("sm_kemasan_barang as kb", "kb.id = pjd.id_kemasan")
	// 						->where("pjd.id_penjualan", $value->id)
	// 						->group_by('pjd.qty, pjd.harga_jual')
	// 						->having("qty > 0")->get()->result();
	// 		foreach ($detail as $row) :
	// 			$total += $row->total;
	// 		endforeach;
	// 	endforeach;
	// 	$totalRetur = 0;
	// 	$dataReturPenjualan = $this->db->select("rpj.*, (null) as detail, pj.waktu as waktu_konfirm, (null) as tagihan")->from("sm_retur_penjualan as rpj")->join("sm_penjualan as pj", "pj.id = rpj.id_penjualan")->where("pj.id_layanan_pendaftaran", $id_layanan_pendaftaran, true)->get()->result();
	// 	foreach ($dataReturPenjualan as $retur) :
	// 		$detail = $this->db->select("sum(dpj.harga_jual * dpj.qty) as total")->from("sm_detur_penjualan as dpj")
	// 						->join("sm_kemasan_barang as kb", "kb.id = dpj.id_kemasan_barang")
	// 						->join("sm_barang as bar", "bar.id = kb.id_barang")
	// 						->join("sm_pabrik pab", "pab.id = bar.id_pabrik", "left")
	// 						->join("sm_sediaan as sd", "sd.id = bar.id_sediaan", "left")
	// 						->join("sm_satuan as st", "st.id = bar.satuan_kekuatan")
	// 						->where("dpj.id_retur_penjualan", $value->id, true)
	// 						->get()->result();
	// 		foreach ($detail as $row) :
	// 			$totalRetur += $row->total;
	// 		endforeach;
	// 	endforeach;
	// 	return $total - $totalRetur;
	// }

	function getDepositPendaftaran($id_pendaftaran)
	{
		$query = $this->db->select("p.id, coalesce((sum(dp.masuk) - sum(dp.keluar)), 0) as sisa_deposit")->from("sm_pasien as p")->join("sm_deposit as dp", "dp.id_pasien = p.id", "left")->join("sm_pendaftaran as pd", "pd.id_pasien = p.id")->where("pd.id", $id_pendaftaran, true)->group_by("p.id")->get()->row();
		$data["id_pasien"] = $query->id;
		$data["sisa_deposit"] = $query->sisa_deposit;
		return $data;
	}

	function getHistoryPembayaranPendaftaran($id_pendaftaran)
	{
		$this->db->select("hp.*, coalesce(pg.nama, '') as kasir, shift, mp.nama as metode_pembayaran")->from('sm_history_pembayaran as hp')
			->join('sm_translucent as tr', 'tr.id = hp.id_users', 'left')
			->join('sm_pegawai as pg', 'pg.id = tr.id', 'left')
			->join('sm_metode_pembayaran as mp', 'mp.id = hp.id_metode_pembayaran', 'left')
			->where('hp.id_pendaftaran', $id_pendaftaran, true);
		return $this->db->get()->result();
	}

	function getHistoryPembayaran($id_history_pembayaran)
	{
		$this->db->select("hp.*, coalesce(pg.nama, '') as kasir, shift, pb.id_laboratorium, pb.id_radiologi, pb.id_fisioterapi, pb.id_penjualan, pb.id_operasi, mp.nama as metode_pembayaran")
			->from('sm_history_pembayaran as hp')
			->join('sm_pembayaran as pb', 'pb.id = hp.id_pembayaran', 'left')
			->join('sm_translucent as tr', 'tr.id = hp.id_users', 'left')
			->join('sm_pegawai as pg', 'pg.id = tr.id', 'left')
			->join('sm_metode_pembayaran as mp', 'mp.id = hp.id_metode_pembayaran', 'left')
			->where('hp.id', $id_history_pembayaran, true);
		return $this->db->get()->row();
	}

	function getHistoryPembayaranAll($id_history_pembayaran)
	{
		$this->db->select("hp.*, lp.id as id_layanan_pendaftaran, coalesce(pg.nama, '') as petugas_kasir, shift, mp.nama as metode_pembayaran")
			->from('sm_history_pembayaran as hp')
			->join('sm_pendaftaran as pd', 'pd.id = hp.id_pendaftaran')
			->join('sm_layanan_pendaftaran as lp', 'lp.id_pendaftaran = pd.id', 'left')
			->join('sm_translucent as tr', 'tr.id = hp.id_users', 'left')
			->join('sm_pegawai as pg', 'pg.id = tr.id', 'left')
			->join('sm_metode_pembayaran as mp', 'mp.id = hp.id_metode_pembayaran', 'left')
			->where('hp.id', $id_history_pembayaran, true)
			->order_by('lp.id', 'desc')
			->limit(1, 0);
		return $this->db->get()->row();
	}

	function increaseJumlahCetak($id_history_pembayaran = 0)
	{
		$print_number = 0;
		$data = $this->db->where('id', $id_history_pembayaran, true)->select('cetakan')->get('sm_history_pembayaran')->row();
		if (0 < count((array)$data)) :
			$status = true;
			$print_number = $data->cetakan + 1;
			$data_update = array('cetakan' => $print_number);
			$this->db->where('id', $id_history_pembayaran, true)->update('sm_history_pembayaran', $data_update);
		else :
			$status = false;
		endif;

		return array('status' => $status, 'cetakan' => $print_number);
	}

	function getPenggunaanBarangPasien($id_pendaftaran)
	{
		$this->db->select("
			penj.*, date(penj.waktu) as tanggal, 
			sum(dpenj.qty) as qty,
			b.roa, b.id as id_barang,
			concat_ws(' ', b.nama, b.kekuatan, stn.nama, coalesce(sed.nama, ''), '<small><i>', coalesce(pb.nama, ''), '</i></small>') as nama_barang,
			concat_ws(' ', b.nama, b.kekuatan, stn.nama) as nama_barang_sort,
			stn.nama as kemasan, (dpenj.harga_jual * kb.isi * kb.isi_satuan) as harga_jual, 
			dpenj.hna, un.nama as unit
		");
		$this->db->from('sm_penjualan as penj');
		$this->db->join('sm_detail_penjualan as dpenj', 'dpenj.id_penjualan = penj.id');
		$this->db->join('sm_kemasan_barang as kb', 'kb.id = dpenj.id_kemasan');
		$this->db->join('sm_barang as b', 'b.id = kb.id_barang');
		$this->db->join('sm_layanan_pendaftaran as lp', 'lp.id = penj.id_layanan_pendaftaran');
		$this->db->join('sm_pendaftaran as pd', 'pd.id = lp.id_pendaftaran');
		$this->db->join('sm_sediaan as sed', 'sed.id = b.id_sediaan', 'left');
		$this->db->join('sm_satuan as stn', 'stn.id = b.satuan_kekuatan', 'left');
		$this->db->join('sm_pabrik as pb', 'pb.id = b.id_pabrik', 'left');
		$this->db->join('sm_satuan as st', 'st.id = kb.id_kemasan');
		$this->db->join('sm_unit as un', 'st.id = penj.id_unit');
		$this->db->where('pd.id', $id_pendaftaran, true);
		$this->db->group_by('penj.id, b.roa, b.id, stn.nama, sed.nama, pb.nama, kb.isi, kb.isi_satuan, dpenj.hna, un.nama, dpenj.id_kemasan, dpenj.harga_jual');
		$this->db->order_by('penj.waktu', 'asc');

		$data = $this->db->get()->result();
		foreach ($data as $i => $val) :
			$this->db->select("date(rt.waktu) as tanggal");
			$this->db->from('sm_resep as r');
			$this->db->join('sm_resep_tebus as rt', 'rt.id_resep = r.id');
			$this->db->join('sm_layanan_pendaftaran as lp', 'lp.id = r.id_layanan_pendaftaran');
			$this->db->join('sm_resep_tebus_r as rtr', 'rtr.id_resep_tebus = rt.id');
			$this->db->join('sm_resep_tebus_r_detail as rtrd', 'rtrd.id_resep_tebus_r = rtr.id');
			$this->db->where('r.id_layanan_pendaftaran', $val->id_layanan_pendaftaran, true);
			$this->db->where('rtrd.id_barang', $val->id_barang, true);
			$data[$i]->tanggal = $this->db->get()->result();
		endforeach;
		return $data;
	}

	// ubah cara bayar area
	function ubahCaraBayar($data)
	{
		$status = true;
		$message = "";
		if ($data['cara_bayar'] === '') :
			$status = false;
			$message = "Cara bayar tidak boleh kosong!";
		else :
			$data_pendaftaran = $this->db->select(['id_penjamin', 'tanggal_keluar'])->where('id', $data['id_pendaftaran'])->get('sm_pendaftaran')->row();
			$penjamin_before = $this->db->select(['pj.nama', 'jp.nama as jenis_penjamin'])->from('sm_penjamin as pj')->join('sm_jenis_penjamin as jp', 'jp.id = pj.id_jenis_penjamin')->where('pj.id', $data_pendaftaran->id_penjamin, true)->get()->row();
			$nama_penjamin_before = "";
			$cara_bayar_before = "Tunai";
			if (0 < count((array)$penjamin_before)) :
				$nama_penjamin_before = $penjamin_before->nama;
				$cara_bayar_before = $penjamin_before->jenis_penjamin;
			endif;
			if ($cara_bayar_before === 'Tunai') :
				$this->db->select("count(id) as jumlah")->from('sm_history_pembayaran')->where('id_pendaftaran', $data['id_pendaftaran'], true)->where("status != 'Batal'");
				$data_kwitansi = $this->db->get()->row()->jumlah;
				if (0 < $data_kwitansi) :
					$status = false;
					$message = "Tidak dapat melakukan perubahan cara bayar, dikarenakan sudah ada kwitansi yang keluar. <br>Batalkan terlebih dahulu kwitansi sebelumnya!";
				endif;
			endif;
			if ($status) :
				$this->db->trans_begin();
				$catatan = "Sebelum edit : " . $cara_bayar_before . " " . $nama_penjamin_before;
				$data_update = array(
					'id_penjamin' => $data['penjamin'] !== '' ? $data['penjamin'] : NULL,
					'no_polish' => $data['no_polish'] !== '' ? $data['no_polish'] : NULL,
				);
				// update table pendaftaran
				$this->db->where('id', $data['id_pendaftaran'], true)->update('sm_pendaftaran', $data_update);
				$data_layanan_pendaftaran = $this->db->where('id_pendaftaran', $data['id_pendaftaran'], true)->get('sm_layanan_pendaftaran')->result();
				$persen_reimburse = 0;
				if ($data['penjamin'] !== '') :
					$data_penjamin = $this->db->where('id', $data['penjamin'], true)->get('sm_penjamin')->row();
					$persen_reimburse = $data_penjamin->diskon;
				endif;
				$data_penjamin_update = array(
					'no_polish' => $data['no_polish'] !== '' ? $data['no_polish'] : NULL,
					'id_penjamin' => $data['penjamin'] !== '' ? $data['penjamin'] : NULL,
					'persen_reimburse' => $persen_reimburse,
				);
				$data_cara_bayar_update = array(
					'cara_bayar' => $data['cara_bayar'],
					'id_penjamin' => $data['penjamin'] !== '' ? $data['penjamin'] : NULL,
					'no_polish' => $data['no_polish'] !== '' ? $data['no_polish'] : NULL,
				);
				$id_layanan_pendaftaran = NULL;
				foreach ($data_layanan_pendaftaran as $i => $val) :
					$id_layanan_pendaftaran = $val->id;
					$this->db->where('id', $val->id, true)->update('sm_layanan_pendaftaran', $data_cara_bayar_update);
					$this->editReimbursePembayaran($val->id, $data_penjamin_update);
					$this->ubahCaraBayarTindakan($val->id, $data_penjamin_update);
					$this->ubahCaraBayarPenunjang($val->id, 'sm_laboratorium', 'sm_detail_laboratorium', $data_penjamin_update);
					$this->ubahCaraBayarPenunjang($val->id, 'sm_radiologi', 'sm_detail_radiologi', $data_penjamin_update);
					$this->ubahCaraBayarPenunjang($val->id, 'sm_fisioterapi', 'sm_detail_fisioterapi', $data_penjamin_update);
					$this->ubahCaraBayarBarang($val->id, $data_penjamin_update);
					$this->ubahCaraBayarBarangOperasi($val->id, $data_penjamin_update);
					$this->ubahCaraBayarOperasi($val->id, $data_penjamin_update);
					$this->ubahCaraBayarRawatInap($val->id, $data_penjamin_update);
					$this->ubahCaraBayarIntensiveCare($val->id, $data_penjamin_update);
					$this->ubahCaraBayarBankDarah($val->id, $data_penjamin_update);
				endforeach;
				$penjamin_after = $this->db->select('nama')->where('id', $data_update['id_penjamin'])->get('sm_penjamin')->row();
				$nama_penjamin_after = "";
				if (0 < count((array)$penjamin_after)) :
					$nama_penjamin_after = $penjamin_after->nama;
				endif;
				$catatan .= "<br>Setelah edit : " . $data['cara_bayar'] . " " . $nama_penjamin_after;
				if ($this->db->trans_status() === false) :
					$this->db->trans_rollback();
					$status = false;
					$message = "Gagal mengubah cara bayar";
				else :
					$this->db->trans_commit();
					$status = true;
					$message = "Berhasil melakukan proses ubah cara bayar";
					// record logs
					$this->load->model('logs/Logs_model', 'logs');
					$this->logs->recordAdminLogs($id_layanan_pendaftaran, 'Ubah Cara Bayar', $catatan);
				endif;
			endif;
		endif;
		return  array('status' => $status, 'message' => $message);
	}

	function editReimbursePembayaran($id_layanan_pendaftaran, $data)
	{
		$data_pembayaran = $this->db->where('id_layanan_pendaftaran', $id_layanan_pendaftaran, true)->get('sm_pembayaran')->result();
		foreach ($data_pembayaran as $i => $val) :
			$reimburse = $data['persen_reimburse'] / 100 * $val->total;
			$data_update = array('reimburse' => $reimburse);
			$this->db->where('id', $val->id, true)->update('sm_pembayaran', $data_update);
		endforeach;
	}

	function ubahCaraBayarTindakan($id_layanan_pendaftaran, $data)
	{
		$data_tindakan = $this->db->where('id_layanan_pendaftaran', $id_layanan_pendaftaran, true)->get('sm_tarif_tindakan_pasien')->result();
		foreach ($data_tindakan as $i => $val) :
			$reimburse = $data['persen_reimburse'] / 100 * $val->total;
			$data_update = array('id_penjamin' => $data['id_penjamin'], 'no_polish' => $data['no_polish'], 'reimburse' => $reimburse);
			$this->db->where('id', $val->id, true)->update('sm_tarif_tindakan_pasien', $data_update);
		endforeach;
	}

	function ubahCaraBayarPenunjang($id_layanan_pendaftaran, $table, $table_detail, $data)
	{
		$data_penunjang = $this->db->where('id_layanan_pendaftaran', $id_layanan_pendaftaran, true)->get($table)->result();
		$id_ = "id_laboratorium";
		if ($table === 'sm_laboratorium') :
			$id_ = "id_laboratorium";
		else :
			if ($table === 'sm_radiologi') :
				$id_ = "id_radiologi";
			else :
				if ($table === 'sm_fisioterapi') :
					$id_ = "id_fisioterapi";
				endif;
			endif;
		endif;

		foreach ($data_penunjang as $i => $val) :
			$data_detail_penunjang = $this->db->where($id_, $val->id, true)->get($table_detail)->result();
			foreach ($data_detail_penunjang as $j => $val2) :
				$reimburse = $data['persen_reimburse'] / 100 * $val2->total;
				$data_update = array('id_penjamin' => $data['id_penjamin'], 'reimburse' => $reimburse);
				$this->db->where('id', $val2->id, true)->update($table_detail, $data_update);
			endforeach;
		endforeach;
	}

	function ubahCaraBayarBarang($id_layanan_pendaftaran, $data)
	{
		$data_penjualan = $this->db->where('id_layanan_pendaftaran', $id_layanan_pendaftaran, true)->get('sm_penjualan')->result();
		foreach ($data_penjualan as $i => $val) :
			$data_detail_penjualan = $this->db->where('id_penjualan', $val->id, true)->get('sm_detail_penjualan')->result();
			foreach ($data_detail_penjualan as $j => $val2) :
				$reimburse = $data['persen_reimburse'] / 100 * $val2->harga_jual * $val2->qty;
				$data_update = array('id_asuransi' => $data['id_penjamin'], 'reimburse' => $reimburse);
				$this->db->where('id', $val2->id, true)->update('sm_detail_penjualan', $data_update);
			endforeach;
		endforeach;
	}

	function ubahCaraBayarBarangOperasi($id_layanan_pendaftaran, $data)
	{
		$data_operasi = $this->db->where('id_layanan_pendaftaran', $id_layanan_pendaftaran, true)->get('sm_jadwal_kamar_operasi')->result();
		foreach ($data_operasi as $i => $val) :
			$data_penjualan = $this->db->where('id_operasi', $val->id, true)->get('sm_penjualan')->result();
			foreach ($data_penjualan as $j => $val2) :
				$data_detail_penjualan = $this->db->where('id_penjualan', $val2->id, true)->get('sm_detail_penjualan')->result();
				foreach ($data_detail_penjualan as $k => $val3) :
					$reimburse = $data['persen_reimburse'] / 100 * $val3->harga_jual * $val3->qty;
					$data_update = array('id_asuransi' => $data['id_penjamin'], 'reimburse' => $reimburse);
					$this->db->where('id', $val3->id, true)->update('sm_detail_penjualan', $data_update);
				endforeach;
			endforeach;
		endforeach;
	}

	function ubahCaraBayarOperasi($id_layanan_pendaftaran, $data)
	{
		$data_operasi = $this->db->where('id_layanan_pendaftaran', $id_layanan_pendaftaran, true)->get('sm_jadwal_kamar_operasi')->result();
		foreach ($data_operasi as $i => $val) :
			$data_tindakan = $this->db->where('id_operasi', $val->id, true)->get('sm_tarif_operasi')->result();
			foreach ($data_tindakan as $j => $val2) :
				$reimburse = $data['persen_reimburse'] / 100 * $val2->total;
				$data_update = array('id_penjamin' => $data['id_penjamin'], 'no_polish' => $data['no_polish'], 'reimburse' => $reimburse);
				$this->db->where('id', $val2->id, true)->update('sm_tarif_operasi', $data_update);
			endforeach;
		endforeach;
	}

	function ubahCaraBayarRawatInap($id_layanan_pendaftaran, $data)
	{
		$data_update = array('id_penjamin' => $data['id_penjamin'], 'no_polish' => $data['no_polish'], 'diskon' => $data['persen_reimburse']);
		$this->db->where('id', $id_layanan_pendaftaran, true)->update('sm_rawat_inap', $data_update);
	}

	function ubahCaraBayarIntensiveCare($id_layanan_pendaftaran, $data)
	{
		$data_update = array('id_penjamin' => $data['id_penjamin'], 'no_polish' => $data['no_polish'], 'diskon' => $data['persen_reimburse']);
		$this->db->where('id', $id_layanan_pendaftaran, true)->update('sm_intensive_care', $data_update);
	}
	function ubahCaraBayarBankDarah($id_layanan_pendaftaran, $data)
	{
		$data_update = array('id_penjamin' => $data['id_penjamin'], 'no_polish' => $data['no_polish'], 'reimburse' => $data['persen_reimburse']);
		$this->db->where('id', $id_layanan_pendaftaran, true)->update('sm_tarif_bank_darah', $data_update);
	}
	// end ubah cara bayar area

	function getDiagnosa($id_pendaftaran)
	{
		$this->db->select(" concat (d.golongan_sebab_sakit_lain, gss.nama ) AS nama ")
			->from('sm_diagnosa as d')
			->join('sm_layanan_pendaftaran as lp', 'lp.id = d.id_layanan_pendaftaran', 'left')
			->join('sm_golongan_sebab_sakit as gss', 'gss.id = d.id_golongan_sebab_sakit', 'left')
			->where('lp.id_pendaftaran', $id_pendaftaran, true)
			->order_by('d.prioritas', 'desc');

		return $this->db->get()->result();
	}

	public function getStatusOrder($idPendaftaran)
	{
		$order_lab = $this->db->select('sol.status')
			->from('sm_pendaftaran as p')
			->join('sm_layanan_pendaftaran as lp', 'lp.id_pendaftaran = p.id')
			->join('sm_order_laboratorium as sol', 'sol.id_layanan_pendaftaran = lp.id', 'left')
			->where('p.id', $idPendaftaran, TRUE)
			->get()->result();

		$oredr_rad = $this->db->select('sor.status')
			->from('sm_pendaftaran as p')
			->join('sm_layanan_pendaftaran as lp', 'lp.id_pendaftaran = p.id')
			->join('sm_order_radiologi as sor', 'sor.id_layanan_pendaftaran = lp.id', 'left')
			->where('p.id', $idPendaftaran, TRUE)
			->get()->result();

		$rad = FALSE;
		$lab = FALSE;
		if (count($order_lab) <= 0 && count($oredr_rad) <= 0) {
			$rad = TRUE;
			$lab = TRUE;
		}

		foreach ($order_lab as $val) {
			if ($val->status === 'request') {
				$lab = FALSE;
			} else {
				$lab = TRUE;
			}
		}

		foreach ($oredr_rad as $val) {
			if ($val->status === 'request') {
				$rad = FALSE;
			} else {
				$rad = TRUE;
			}
		}
		return [
			'rad' => $rad,
			'lab' => $lab
		];
	}
}
