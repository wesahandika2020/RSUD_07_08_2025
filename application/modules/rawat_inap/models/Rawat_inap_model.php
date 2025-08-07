<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rawat_inap_model extends CI_Model
{


	function __construct()
	{
		parent::__construct();
		$this->datetime = date('Y-m-d H:i:s');
		$this->load->model('pelayanan/Pelayanan_model', 'm_pelayanan');
	}

	function getListDataRawatInap($limit, $start, $search)
	{
		$query = "";
		$limitation = "";
		if ($limit !== 0) :
			$limitation = " limit " . $limit . " offset " . $start;
		endif;

		$select = "select lp.*, ri.id as id_rawat_inap, ri.waktu_masuk, 
					ri.waktu_keluar, pd.id_pasien, pd.no_register, 
					CONCAT_WS(' ', COALESCE(p.status_pasien), p.nama, '') as nama, 
					p.tanggal_lahir, pd.tanggal_daftar, pd.tanggal_keluar, p.telp,
					COALESCE(sp.nama, '') as layanan,
					COALESCE(pg.nama, '') as dokter, 
					(select bg.id from sm_bangsal as bg where bg.id = ri.id_bangsal) as id_bangsal,
					(select bg.nama from sm_bangsal as bg where bg.id = ri.id_bangsal) as bangsal,
					k.nama as kelas, ri.no_ruang, ri.no_bed, ri.checkout, ri.konfirmasi_ranap, 
					ri.waktu_konfirmasi_ranap, pj.nama as penjamin,
					odri.id_dokter_dpjp, pgdpjp.nama as dokter_dpjp,
					COALESCE(tr.account, '') as user_sep, 
					COALESCE((select DISTINCT case when va.visited_at is not null then '1' else '0' end from sm_visit_anestesi va where va.id_layanan_pendaftaran = lp.id and va.id_pegawai = '" . $this->session->userdata("id_translucent") . "' ), '0') as visit_anestesi,
					sep.nosep_igd, sep.nosep_rajal, sep.nosep_ranap, sep.created_date tgl_sepasal";
		$count = "select count(*) as count ";
		$sql = " from sm_layanan_pendaftaran as lp 
				join sm_rawat_inap as ri on (ri.id_layanan_pendaftaran = lp.id) 
				join sm_kelas as k on (k.id = ri.id_kelas)
				left join sm_asal_sep sep on lp.id_pendaftaran = sep.id_pendaftaran ";
		$sqlCount = $sql;
		$sequence[0] = "join sm_pendaftaran as pd on (pd.id = lp.id_pendaftaran) ";
		$sequence[1] = "join sm_pasien as p on (p.id = pd.id_pasien) ";
		$sequence[2] = "left join sm_penjamin as pj on (pj.id = lp.id_penjamin) ";
		$sequence[3] = "left join sm_spesialisasi as sp on (sp.id = lp.id_unit_layanan) ";
		$sequence[4] = "left join sm_tenaga_medis as tm on (tm.id = lp.id_dokter) ";
		$sequence[5] = "left join sm_pegawai as pg on (pg.id = tm.id_pegawai) ";
		$sequence[6] = "left join sm_translucent as tr on (tr.id = lp.id_users_sep) ";
		$sequence[7] = "left join sm_order_rawat_inap as odri on (odri.id_rawat_inap = ri.id) ";
		$sequence[8] = "left join sm_tenaga_medis as tmdpjp on (tmdpjp.id = odri.id_dokter_dpjp) ";
		$sequence[9] = "left join sm_pegawai as pgdpjp on (pgdpjp.id = tmdpjp.id_pegawai) ";
		$where = " where lp.jenis_layanan = 'Rawat Inap' ";
		$order = " order by ri.id desc ";
		$arraySequence = array();

		// $select = "select lp.*, COALESCE(ri.id, ic.id) as id_rawat_inap, COALESCE(ri.waktu_masuk, ic.waktu_masuk) as waktu_masuk, 
		// 			COALESCE(ri.waktu_keluar, ic.waktu_keluar) as waktu_keluar, pd.id_pasien, pd.no_register, 
		// 			CONCAT_WS(' ', COALESCE(p.status_pasien), p.nama, '') as nama, 
		// 			p.tanggal_lahir, pd.tanggal_daftar, pd.tanggal_keluar, p.telp,
		// 			COALESCE(sp.nama, '') as layanan,
		// 			COALESCE(pg.nama, '') as dokter, 
		// 			COALESCE(
		// 				(select bg.id from sm_bangsal as bg where bg.id = ri.id_bangsal),
		// 				(select bg.id from sm_bangsal as bg where bg.id = ic.id_bangsal)
		// 			 ) as id_bangsal,
		// 			 COALESCE(
		// 				(select bg.nama from sm_bangsal as bg where bg.id = ri.id_bangsal),
		// 				(select bg.nama from sm_bangsal as bg where bg.id = ic.id_bangsal)
		// 			 ) as bangsal,
		// 			COALESCE(kri.nama, kic.nama) as kelas, COALESCE(ri.no_ruang, ic.no_ruang) as no_ruang, COALESCE(ri.no_bed, ic.no_bed) as no_bed, COALESCE(ri.checkout, ic.checkout) as checkout, COALESCE(ri.konfirmasi_ranap, ic.konfirmasi_icare) as konfirmasi_ranap, 
		// 			COALESCE(ri.waktu_konfirmasi_ranap, ic.waktu_konfirmasi_icare) as waktu_konfirmasi_ranap, pj.nama as penjamin,
		// 			COALESCE(odri.id_dokter_dpjp, odic.id_dokter_dpjp) as id_dokter_dpjp, COALESCE(pgdpjpic.nama, pgdpjpri.nama) as dokter_dpjp,
		// 			COALESCE(tr.account, '') as user_sep, 
		// 			COALESCE((select DISTINCT case when va.visited_at is not null then '1' else '0' end from sm_visit_anestesi va where va.id_layanan_pendaftaran = lp.id and va.id_pegawai = '" . $this->session->userdata("id_translucent") . "' ), '0') as visit_anestesi,
		// 			sep.nosep_igd, sep.nosep_rajal, sep.nosep_ranap, sep.created_date tgl_sepasal";
		// $count = "select count(*) as count ";
		// $sql = " from sm_layanan_pendaftaran as lp 
		// 		left join sm_rawat_inap as ri on (ri.id_layanan_pendaftaran = lp.id) 
		// 		left join sm_intensive_care as ic on (ic.id_layanan_pendaftaran = lp.id)
		// 		left join sm_kelas as kri on (kri.id = ri.id_kelas)
		//  		left join sm_kelas as kic on (kic.id = ic.id_kelas)
		// 		left join sm_asal_sep sep on lp.id_pendaftaran = sep.id_pendaftaran ";
		// $sqlCount = $sql;
		// $sequence[0] = "join sm_pendaftaran as pd on (pd.id = lp.id_pendaftaran) ";
		// $sequence[1] = "join sm_pasien as p on (p.id = pd.id_pasien) ";
		// $sequence[2] = "left join sm_penjamin as pj on (pj.id = lp.id_penjamin) ";
		// $sequence[3] = "left join sm_spesialisasi as sp on (sp.id = lp.id_unit_layanan) ";
		// $sequence[4] = "left join sm_tenaga_medis as tm on (tm.id = lp.id_dokter) ";
		// $sequence[5] = "left join sm_pegawai as pg on (pg.id = tm.id_pegawai) ";
		// $sequence[6] = "left join sm_translucent as tr on (tr.id = lp.id_users_sep) ";
		// $sequence[7] = "left join sm_order_rawat_inap as odri on (odri.id_rawat_inap = ri.id) ";
		// $sequence[8] = "left join sm_order_intensive_care as odic on (odic.id_intensive_care = ic.id) ";
		// $sequence[9] = "left join sm_tenaga_medis as tmdpjpri on (tmdpjpri.id = odri.id_dokter_dpjp) ";
		// $sequence[10] = "left join sm_tenaga_medis as tmdpjpic on (tmdpjpic.id = odic.id_dokter_dpjp) ";
		// $sequence[11] = "left join sm_pegawai as pgdpjpri on (pgdpjpri.id = tmdpjpri.id_pegawai) ";
		// $sequence[12] = "left join sm_pegawai as pgdpjpic on (pgdpjpic.id = tmdpjpic.id_pegawai) ";
		// $where = " where lp.jenis_layanan in ('Rawat Inap', 'Intensive Care') ";
		// $order = " order by ri.id, ic.id desc ";
		// $arraySequence = array();

		if ($search["tanggal_awal"] !== "" & $search["tanggal_akhir"] !== "") :
			$query .= " and lp.tanggal_layanan BETWEEN '" . date2mysql($search['tanggal_awal']) . " 00:00:00' AND '" . date2mysql($search['tanggal_akhir']) . " 23:59:59'";
		endif;

		if ($search["key"] !== "") :
			$query .= " and (p.nama ilike '" . $search["key"] . "%' or p.id ilike '%" . $search["key"] . "')";
			if (!in_array(0, $arraySequence)) :
				$sqlCount .= $sequence[0];
				array_push($arraySequence, 0);
			endif;
			if (!in_array(1, $arraySequence)) :
				$sqlCount .= $sequence[1];
				array_push($arraySequence, 1);
			endif;
		endif;

		if ($search["bangsal"] !== "") :
			if (!preg_match("/^[A-Za-z]+$/", $search["bangsal"])) :
				$query .= " and ri.id_bangsal = '" . $search["bangsal"] . "' ";
			endif;
		// if ($search['bangsal'] == '16' || $search['bangsal'] == '17') :
		// 	$query .= " and ri.id_bangsal IN ('16', '17') ";
		// elseif (!preg_match("/^[A-Za-z]+$/", $search["bangsal"])) :
		// 	$query .= " and ri.id_bangsal = '" . $search["bangsal"] . "' ";
		// endif;
		endif;

		// if ($search["kelas"] !== "") :
		// 	$query .= " and ri.id_kelas = '" . $search["kelas"] . "' ";
		// endif;

		if ($search["dokter"] !== "") :
			$query .= " and odri.id_dokter_dpjp = '" . $search["dokter"] . "' ";
		endif;

		if ($search["no_register"] !== "") :
			$query .= " and pd.no_register = '" . $search["no_register"] . "' ";
			if (!in_array(0, $arraySequence)) :
				$sqlCount .= $sequence[0];
				array_push($arraySequence, 0);
			endif;
		endif;

		if ($search["no_sep"] !== "") :
			$query .= " and pd.no_sep = '" . $search["no_sep"] . "' ";
			if (!in_array(0, $arraySequence)) :
				$sqlCount .= $sequence[0];
				array_push($arraySequence, 0);
			endif;
			if (!in_array(1, $arraySequence)) :
				$sqlCount .= $sequence[1];
				array_push($arraySequence, 1);
			endif;
		endif;

		if ($search["no_rm"] !== "") :
			$query .= " and p.id ilike '%" . $search["no_rm"] . "' ";
			if (!in_array(0, $arraySequence)) :
				$sqlCount .= $sequence[0];
				array_push($arraySequence, 0);
			endif;
			if (!in_array(1, $arraySequence)) :
				$sqlCount .= $sequence[1];
				array_push($arraySequence, 1);
			endif;
		endif;

		if ($search["nama"] !== "") :
			$query .= " and p.nama ilike '%" . $search["nama"] . "' ";
			if (!in_array(0, $arraySequence)) :
				$sqlCount .= $sequence[0];
				array_push($arraySequence, 0);
			endif;
			if (!in_array(1, $arraySequence)) :
				$sqlCount .= $sequence[1];
				array_push($arraySequence, 1);
			endif;
		endif;

		if ($search["status_ranap"] !== NULL) :
			if ($search["status_ranap"] === "Masih Dirawat") :
				$query .= " and ri.checkout = '0' ";
			else :
				if ($search["status_ranap"] === "Pulang") :
					$query .= " and ri.checkout = '1' ";
				endif;
			endif;
		endif;

		if ($search['status_pasien_ranap'] === 'Sudah') :
			$query .= " AND lp.tindak_lanjut <> '' ";
		elseif ($search['status_pasien_ranap'] === 'Belum') :
			$query .= " AND lp.tindak_lanjut is null";
		endif;


		//if ($search["list_admin"] === "Ya" && $this->session->userdata("account_group") !== "Admin") :
		//	$query .= " and ri.checkout = '0' and lp.status_terlayani != 'Batal' ";
		//endif;

		//if ($search["status_keluar"] !== "") :
		//	$query .= " and lp.tindak_lanjut = '" . $search["status_keluar"] . "' ";
		//endif;

		if (isset($search["status_keluar_not"])) :
			$query .= " and lp.status_terlayani != '" . $search["status_keluar_not"] . "' ";
		endif;

		if ($search["jenis_sep"] === 'inap') :
			$query .= " and lp.id_penjamin = 1";
		endif;

		$result = $this->db->query($select . $sql . implode("", $sequence) . $where . $query . $order . $limitation)->result();
		foreach ($result as $i => $value) :
			$sqlChild = "select count(*) as jml_resep from sm_resep where id_layanan_pendaftaran = '" . $value->id . "'";
			$result[$i]->jml_resep = $this->db->query($sqlChild)->row()->jml_resep;
			$result[$i]->before = $this->m_pelayanan->getLayananSpesialisasiBefore($value->id);
		endforeach;

		$data["data"] = $result;
		$data["jumlah"] = $this->db->query($count . $sqlCount . $sequence[7] . $where . $query)->row()->count;
		$this->db->close();
		return $data;
	}

	function getListSepDataRawatInap($limit, $start, $search)
	{
		$query = "";
		$limitation = "";
		if ($limit !== 0) :
			$limitation = " limit " . $limit . " offset " . $start;
		endif;

		$select = "select lp.*, COALESCE(ri.id, ic.id) as id_rawat_inap, COALESCE(ri.waktu_masuk, ic.waktu_masuk) as waktu_masuk, 
					COALESCE(ri.waktu_keluar, ic.waktu_keluar) as waktu_keluar, pd.id_pasien, pd.no_register, 
					CONCAT_WS(' ', COALESCE(p.status_pasien), p.nama, '') as nama, 
					p.tanggal_lahir, pd.tanggal_daftar, pd.tanggal_keluar, p.telp,
					COALESCE(sp.nama, '') as layanan,
					COALESCE(pg.nama, '') as dokter, 
					COALESCE(
						(select bg.id from sm_bangsal as bg where bg.id = ri.id_bangsal),
						(select bg.id from sm_bangsal as bg where bg.id = ic.id_bangsal)
					 ) as id_bangsal,
					 COALESCE(
						(select bg.nama from sm_bangsal as bg where bg.id = ri.id_bangsal),
						(select bg.nama from sm_bangsal as bg where bg.id = ic.id_bangsal)
					 ) as bangsal,
					COALESCE(kri.nama, kic.nama) as kelas, COALESCE(ri.no_ruang, ic.no_ruang) as no_ruang, COALESCE(ri.no_bed, ic.no_bed) as no_bed, COALESCE(ri.checkout, ic.checkout) as checkout, COALESCE(ri.konfirmasi_ranap, ic.konfirmasi_icare) as konfirmasi_ranap, 
					COALESCE(ri.waktu_konfirmasi_ranap, ic.waktu_konfirmasi_icare) as waktu_konfirmasi_ranap, pj.nama as penjamin,
					COALESCE(odri.id_dokter_dpjp, odic.id_dokter_dpjp) as id_dokter_dpjp, COALESCE(pgdpjpic.nama, pgdpjpri.nama) as dokter_dpjp,
					COALESCE(tr.account, '') as user_sep, 
					COALESCE((select DISTINCT case when va.visited_at is not null then '1' else '0' end from sm_visit_anestesi va where va.id_layanan_pendaftaran = lp.id and va.id_pegawai = '" . $this->session->userdata("id_translucent") . "' ), '0') as visit_anestesi,
					sep.nosep_igd, sep.nosep_rajal, sep.nosep_ranap, sep.created_date tgl_sepasal";
		$count = "select count(*) as count ";
		$sql = " from sm_layanan_pendaftaran as lp 
				left join sm_rawat_inap as ri on (ri.id_layanan_pendaftaran = lp.id) 
				left join sm_intensive_care as ic on (ic.id_layanan_pendaftaran = lp.id)
				left join sm_kelas as kri on (kri.id = ri.id_kelas)
         		left join sm_kelas as kic on (kic.id = ic.id_kelas)
				left join sm_asal_sep sep on lp.id_pendaftaran = sep.id_pendaftaran ";
		$sqlCount = $sql;
		$sequence[0] = "join sm_pendaftaran as pd on (pd.id = lp.id_pendaftaran) ";
		$sequence[1] = "join sm_pasien as p on (p.id = pd.id_pasien) ";
		$sequence[2] = "left join sm_penjamin as pj on (pj.id = lp.id_penjamin) ";
		$sequence[3] = "left join sm_spesialisasi as sp on (sp.id = lp.id_unit_layanan) ";
		$sequence[4] = "left join sm_tenaga_medis as tm on (tm.id = lp.id_dokter) ";
		$sequence[5] = "left join sm_pegawai as pg on (pg.id = tm.id_pegawai) ";
		$sequence[6] = "left join sm_translucent as tr on (tr.id = lp.id_users_sep) ";
		$sequence[7] = "left join sm_order_rawat_inap as odri on (odri.id_rawat_inap = ri.id) ";
		$sequence[8] = "left join sm_order_intensive_care as odic on (odic.id_intensive_care = ic.id) ";
		$sequence[9] = "left join sm_tenaga_medis as tmdpjpri on (tmdpjpri.id = odri.id_dokter_dpjp) ";
		$sequence[10] = "left join sm_tenaga_medis as tmdpjpic on (tmdpjpic.id = odic.id_dokter_dpjp) ";
		$sequence[11] = "left join sm_pegawai as pgdpjpri on (pgdpjpri.id = tmdpjpri.id_pegawai) ";
		$sequence[12] = "left join sm_pegawai as pgdpjpic on (pgdpjpic.id = tmdpjpic.id_pegawai) ";
		$asal = $search['asal'];
		$where = " where lp.jenis_layanan in ('Rawat Inap', 'Intensive Care', '$asal') ";
		$order = " order by lp.id desc ";
		$arraySequence = array();

		if ($search["tanggal_awal"] !== "" & $search["tanggal_akhir"] !== "") :
			$query .= " and lp.tanggal_layanan BETWEEN '" . date2mysql($search['tanggal_awal']) . " 00:00:00' AND '" . date2mysql($search['tanggal_akhir']) . " 23:59:59'";
		endif;

		if ($search["key"] !== "") :
			$query .= " and (p.nama ilike '" . $search["key"] . "%' or p.id ilike '%" . $search["key"] . "')";
			if (!in_array(0, $arraySequence)) :
				$sqlCount .= $sequence[0];
				array_push($arraySequence, 0);
			endif;
			if (!in_array(1, $arraySequence)) :
				$sqlCount .= $sequence[1];
				array_push($arraySequence, 1);
			endif;
		endif;

		if ($search["bangsal"] !== "") :
			if (!preg_match("/^[A-Za-z]+$/", $search["bangsal"])) :
				$query .= " and ri.id_bangsal = '" . $search["bangsal"] . "' ";
			endif;
		endif;

		// if ($search["kelas"] !== "") :
		// 	$query .= " and ri.id_kelas = '" . $search["kelas"] . "' ";
		// endif;

		if ($search["dokter"] !== "") :
			$query .= " and odri.id_dokter_dpjp = '" . $search["dokter"] . "' ";
		endif;

		if ($search["no_register"] !== "") :
			$query .= " and pd.no_register = '" . $search["no_register"] . "' ";
			if (!in_array(0, $arraySequence)) :
				$sqlCount .= $sequence[0];
				array_push($arraySequence, 0);
			endif;
		endif;

		if ($search["no_sep"] !== "") :
			$query .= " and pd.no_sep = '" . $search["no_sep"] . "' ";
			if (!in_array(0, $arraySequence)) :
				$sqlCount .= $sequence[0];
				array_push($arraySequence, 0);
			endif;
			if (!in_array(1, $arraySequence)) :
				$sqlCount .= $sequence[1];
				array_push($arraySequence, 1);
			endif;
		endif;

		if ($search["no_rm"] !== "") :
			$query .= " and p.id ilike '%" . $search["no_rm"] . "' ";
			if (!in_array(0, $arraySequence)) :
				$sqlCount .= $sequence[0];
				array_push($arraySequence, 0);
			endif;
			if (!in_array(1, $arraySequence)) :
				$sqlCount .= $sequence[1];
				array_push($arraySequence, 1);
			endif;
		endif;

		if ($search["nama"] !== "") :
			$query .= " and p.nama ilike '%" . $search["nama"] . "' ";
			if (!in_array(0, $arraySequence)) :
				$sqlCount .= $sequence[0];
				array_push($arraySequence, 0);
			endif;
			if (!in_array(1, $arraySequence)) :
				$sqlCount .= $sequence[1];
				array_push($arraySequence, 1);
			endif;
		endif;

		if ($search["status_ranap"] !== NULL) :
			if ($search["status_ranap"] === "Masih Dirawat") :
				$query .= " and ri.checkout = '0' ";
			else :
				if ($search["status_ranap"] === "Pulang") :
					$query .= " and ri.checkout = '1' ";
				endif;
			endif;
		endif;

		if ($search['status_pasien_ranap'] === 'Sudah') :
			$query .= " AND lp.tindak_lanjut <> '' ";
		elseif ($search['status_pasien_ranap'] === 'Belum') :
			$query .= " AND lp.tindak_lanjut is null";
		endif;

		if ($search['sep_asal'] !== "") {
			if ($search['sep_asal'] === 'poli') {
				$query .= " AND sep.nosep_rajal is not null AND sep.nosep_rajal != '-'";
			}
			if ($search['sep_asal'] === 'igd') {
				$query .= " AND sep.nosep_igd is not null AND sep.nosep_igd != '-'";
			}
		}


		//if ($search["list_admin"] === "Ya" && $this->session->userdata("account_group") !== "Admin") :
		//	$query .= " and ri.checkout = '0' and lp.status_terlayani != 'Batal' ";
		//endif;

		//if ($search["status_keluar"] !== "") :
		//	$query .= " and lp.tindak_lanjut = '" . $search["status_keluar"] . "' ";
		//endif;

		if (isset($search["status_keluar_not"])) :
			$query .= " and lp.status_terlayani != '" . $search["status_keluar_not"] . "' ";
		endif;

		if ($search["jenis_sep"] === 'inap') :
			$query .= " and lp.id_penjamin = 1";
		endif;

		$result = $this->db->query($select . $sql . implode("", $sequence) . $where . $query . $order . $limitation)->result();
		foreach ($result as $i => $value) :
			$sqlChild = "select count(*) as jml_resep from sm_resep where id_layanan_pendaftaran = '" . $value->id . "'";
			$result[$i]->jml_resep = $this->db->query($sqlChild)->row()->jml_resep;
			$result[$i]->before = $this->m_pelayanan->getLayananSpesialisasiBefore($value->id);
		endforeach;

		$data["data"] = $result;
		$data["jumlah"] = $this->db->query($count . $sqlCount . $sequence[7] . $where . $query)->row()->count;
		$this->db->close();
		return $data;
	}

	function pembatalanRawatInap($id_layanan_pendaftaran)
	{
		$this->db->trans_begin();
		$this->m_pelayanan->updateLastLayanan($id_layanan_pendaftaran);
		$dataRawatInap = $this->db->select("id_bed")->where("id_layanan_pendaftaran", $id_layanan_pendaftaran, true)->get("sm_rawat_inap")->row();
		if ($dataRawatInap) :
			$id_bed = $dataRawatInap->id_bed;
			// ubah status bed nya
			$dataUpdateBed = array('keterangan' => 'Tersedia');
			$this->db->where("id", $id_bed, true)->update("sm_bed", $dataUpdateBed);
		else :
			// catat log transaksi error
			$this->load->model('logs/Logs_model', 'm_logs');
			$this->m_logs->recordAdminLogs($id_layanan_pendaftaran, 'Error Status Bed', $id_layanan_pendaftaran);
		endif;

		// ubah juga status terlayani dan tindak lanjut nya jadi batal
		$dataUpdateLayananPendaftaran = array(
			'status_terlayani' => 'Batal',
			'tindak_lanjut' => 'Batal'
		);
		$this->db->where("id", $id_layanan_pendaftaran, true)->update('sm_layanan_pendaftaran', $dataUpdateLayananPendaftaran);

		// ubah data rawat inapnya juga
		$dataUpdateRawatInap = array(
			'waktu_keluar' => $this->datetime,
			'total_hari' => 0,
			'nominal' => 0,
			'checkout' => '1'
		);
		$this->db->where('id_layanan_pendaftaran', $id_layanan_pendaftaran)->update('sm_rawat_inap', $dataUpdateRawatInap);

		if ($this->db->trans_status() === false) :
			$this->db->trans_rollback();
			$status = false;
		else :
			$this->db->trans_commit();
			$status = true;
		endif;

		return $status;
	}

	function updateWaktuRawatInap($id_layanan_pendaftaran, $data)
	{
		$this->db->trans_begin();
		$this->load->model('pelayanan/Pelayanan_model', 'm_pelayanan');
		// update tanggal layanan ditable layanan pendaftaran
		// $this->db->where('id', $id_layanan_pendaftaran, true)->update('sm_layanan_pendaftaran', array('tanggal_layanan' => $data['waktu_masuk']));

		if ($data['waktu_keluar'] !== NULL) :
			// jika waktu keluar ada
			// $this->db->where('id_layanan_pendaftaran', $id_layanan_pendaftaran, true)->update('sm_rawat_inap', array('waktu_masuk' => $data['waktu_masuk']));
			$this->db->where('id_layanan_pendaftaran', $id_layanan_pendaftaran, true)->update('sm_rawat_inap', array('waktu_konfirmasi_ranap' => $data['waktu_konfirmasi_ranap']));
			$statusPulang = $this->db->select('tindak_lanjut')->where('id', $id_layanan_pendaftaran, true)->get('sm_layanan_pendaftaran')->row()->tindak_lanjut;
			$dataLayananPendaftaran = $this->db->where('id', $id_layanan_pendaftaran, true)->get('sm_layanan_pendaftaran')->row();
			$this->m_pelayanan->pembatalanStatusKeluar($dataLayananPendaftaran->id_pendaftaran, $id_layanan_pendaftaran);
			$this->m_pelayanan->dischargeToRawatInap($id_layanan_pendaftaran, $data['waktu_keluar']);
			$this->m_pelayanan->insertAdministrasiRawatInap($dataLayananPendaftaran->id_pendaftaran, $id_layanan_pendaftaran);
			$dataTindakLanjut = array('tindak_lanjut' => $statusPulang, 'kondisi' => 'Hidup');
			$this->m_pelayanan->updateTindakLanjut($dataLayananPendaftaran->id, $dataTindakLanjut);
			$dataPendaftaran = array('kondisi_keluar' => 'Hidup', 'tanggal_keluar' => $data['waktu_keluar']);
			$this->db->where('id', $dataLayananPendaftaran->id_pendaftaran)->update('sm_pendaftaran', $dataPendaftaran);
		else :
			// jika waktu keluar kosong, update table rawat inap
			$this->db->where('id_layanan_pendaftaran', $id_layanan_pendaftaran, true)->update('sm_rawat_inap', $data);
		endif;

		if ($this->db->trans_status() === false) :
			$this->db->trans_rollback();
			$status = false;
		else :
			$this->db->trans_commit();
			$status = true;
		endif;

		return $status;
	}

	function resetStatusBed($id_rawat_inap)
	{
		$this->db->trans_begin();
		$data_ranap = $this->db->where('id', $id_rawat_inap, true)->get('sm_rawat_inap')->row();
		$checkout = array('checkout' => 1);
		$this->db->where('id', $id_rawat_inap, true)->update('sm_rawat_inap', $checkout);
		if ($data_ranap !== NULL) :
			$update = array('keterangan' => 'Tersedia', 'penghuni' => NULL);
			$this->db->where('id', $data_ranap->id_bed)->update('sm_bed', $update);
		endif;

		if ($this->db->trans_status() === false) :
			$this->db->trans_rollback();
			$status = false;
		else :
			$this->db->trans_commit();
			$status = true;
		endif;

		return $status;
	}








	// PARI
	function getKajianKeperawatan($id_pendaftaran)
	{
		return $this->db->select('kkr.*, pgp.nama as perawat, pgd.nama as verifikator_dpjp')
			->from('sm_kajian_keperawatan_ranap as kkr')
			->join('sm_layanan_pendaftaran as lp', 'lp.id = kkr.id_layanan_pendaftaran')
			->join('sm_tenaga_medis as tmp', 'tmp.id = kkr.id_perawat', 'left')
			->join('sm_pegawai as pgp', 'pgp.id = tmp.id_pegawai', 'left')
			->join('sm_tenaga_medis as tmd', 'tmd.id = kkr.id_verifikasi_dokter_dpjp', 'left')
			->join('sm_pegawai as pgd', 'pgd.id = tmd.id_pegawai', 'left')
			->where('lp.id_pendaftaran', $id_pendaftaran, true)
			->get()
			->row();
	}

	// PARI
	function getKajianMedisLogs($id_pendaftaran)
	{
		return $this->db->select('kmr.*, pgd.nama as dokter_dpjp, pgdp.nama as dokter_pengkajian, pgu.nama as user')
			->from('sm_kajian_medis_ranap_logs as kmr')
			->join('sm_layanan_pendaftaran as lp', 'lp.id = kmr.id_layanan_pendaftaran')
			->join('sm_tenaga_medis as tmd', 'tmd.id = kmr.id_dokter_dpjp', 'left')
			->join('sm_pegawai as pgd', 'pgd.id = tmd.id_pegawai', 'left')
			->join('sm_tenaga_medis as tmdp', 'tmdp.id = kmr.id_dokter_pengkajian', 'left')
			->join('sm_pegawai as pgdp', 'pgdp.id = tmdp.id_pegawai', 'left')
			->join('sm_translucent as tr', 'tr.id = kmr.id_users', 'left')
			->join('sm_pegawai as pgu', 'pgu.id = tr.id', 'left')
			->where('lp.id_pendaftaran', $id_pendaftaran, true)
			->get()
			->result();
	}

	// PARI
	function getKajianMedis($id_pendaftaran)
	{
		return $this->db->select('kmr.*, pgd.nama as dokter_dpjp, pgdp.nama as dokter_pengkajian')
			->from('sm_kajian_medis_ranap as kmr')
			->join('sm_layanan_pendaftaran as lp', 'lp.id = kmr.id_layanan_pendaftaran')
			->join('sm_tenaga_medis as tmd', 'tmd.id = kmr.id_dokter_dpjp', 'left')
			->join('sm_pegawai as pgd', 'pgd.id = tmd.id_pegawai', 'left')
			->join('sm_tenaga_medis as tmdp', 'tmdp.id = kmr.id_dokter_pengkajian', 'left')
			->join('sm_pegawai as pgdp', 'pgdp.id = tmdp.id_pegawai', 'left')
			->where('lp.id_pendaftaran', $id_pendaftaran, true)
			->get()
			->row();
	}

	// PARI
	function getKajianKeperawatanLogs($id_pendaftaran)
	{
		return $this->db->select('kkr.*, pgp.nama as perawat, pgd.nama as verifikator_dpjp, pgu.nama as user')
			->from('sm_kajian_keperawatan_ranap_logs as kkr')
			->join('sm_layanan_pendaftaran as lp', 'lp.id = kkr.id_layanan_pendaftaran')
			->join('sm_tenaga_medis as tmp', 'tmp.id = kkr.id_perawat', 'left')
			->join('sm_pegawai as pgp', 'pgp.id = tmp.id_pegawai', 'left')
			->join('sm_tenaga_medis as tmd', 'tmd.id = kkr.id_verifikasi_dokter_dpjp', 'left')
			->join('sm_pegawai as pgd', 'pgd.id = tmd.id_pegawai', 'left')
			->join('sm_translucent as tr', 'tr.id = kkr.id_users', 'left')
			->join('sm_pegawai as pgu', 'pgu.id = tr.id', 'left')
			->where('lp.id_pendaftaran', $id_pendaftaran, true)
			->get()
			->result();
	}

	// PARI
	function updatePengkajianAwalRanap($data_kajian_keperawatan, $data_kajian_medis, $id_kajian_keperawatan, $id_kajian_medis)
	{
		$this->db->trans_begin();
		if ($id_kajian_keperawatan === '' || $id_kajian_medis === '') :
			$data_kajian_keperawatan['created_date'] = $this->datetime;
			$this->db->insert('sm_kajian_keperawatan_ranap', $data_kajian_keperawatan);
			$data_kajian_medis['created_date'] = $this->datetime;
			$this->db->insert('sm_kajian_medis_ranap', $data_kajian_medis);

			if ($this->db->trans_status() === false) :
				$this->db->trans_rollback();
				$status = false;
				$message = 'Gagal menambahkan pengkajian awal pasien rawat inap';
			else :
				$this->db->trans_commit();
				$status = true;
				$message = 'Berhasil menambahkan pengkajian awal pasien rawat inap';
			endif;
		else :
			// ambil data kajian keperawatan sebelumnya
			$data_before_keperawatan = $this->db->select("*, '' as id_users, '' as tanggal_ubah")->from('sm_kajian_keperawatan_ranap')->where('id', $id_kajian_keperawatan)->get()->row();
			unset($data_before_keperawatan->id);
			$data_before_keperawatan->id_users = $this->session->userdata('id_translucent');
			$data_before_keperawatan->tanggal_ubah = $this->datetime;

			// store ke sm_kajian_keperawatan_ranap_logs sebelum ada perubahan
			$this->db->insert('sm_kajian_keperawatan_ranap_logs', $data_before_keperawatan);

			// ambil data kajian medis sebelumnya
			$data_before_medis = $this->db->select("*, '' as id_users, '' as tanggal_ubah")->from('sm_kajian_medis_ranap')->where('id', $id_kajian_medis)->get()->row();
			unset($data_before_medis->id);
			$data_before_medis->id_users = $this->session->userdata('id_translucent');
			$data_before_medis->tanggal_ubah = $this->datetime;

			// store ke sm_kajian_medis_ranap_logs sebelum ada perubahan
			$this->db->insert('sm_kajian_medis_ranap_logs', $data_before_medis);

			unset($data_kajian_keperawatan['waktu_pengkajian']);
			$data_kajian_keperawatan['updated_date'] = $this->datetime;
			$this->db->where('id', $id_kajian_keperawatan, true)->update('sm_kajian_keperawatan_ranap', $data_kajian_keperawatan);
			$data_kajian_medis['updated_date'] = $this->datetime;
			$this->db->where('id', $id_kajian_medis, true)->update('sm_kajian_medis_ranap', $data_kajian_medis);

			// record logs
			$this->load->model('logs/Logs_model', 'm_logs');
			$this->m_logs->recordAdminLogs($data_kajian_keperawatan['id_layanan_pendaftaran'], 'Ubah Pengkajian Awal Rawat Inap');

			if ($this->db->trans_status() === false) :
				$this->db->trans_rollback();
				$status = false;
				$message = 'Gagal mengubah pengkajian awal pasien rawat inap';
			else :
				$this->db->trans_commit();
				$status = true;
				$message = 'Berhasil mengubah pengkajian awal pasien rawat inap';
			endif;
		endif;

		return array('status' => $status, 'message' => $message);
	}

















	//Pengkajian Awal Anak
	function updatePengkajianAwalAnak($data_kajian_keperawatan_anak, $data_kajian_medis_anak, $id_kajian_keperawatan_anak, $id_kajian_medis_anak)
	{
		$this->db->trans_begin();
		if ($id_kajian_keperawatan_anak === '' || $id_kajian_medis_anak === '') :
			$data_kajian_keperawatan_anak['created_date'] = $this->datetime;
			$this->db->insert('sm_kajian_keperawatan_anak', $data_kajian_keperawatan_anak);
			$data_kajian_medis_anak['created_date'] = $this->datetime;
			$this->db->insert('sm_kajian_medis_anak', $data_kajian_medis_anak);

			if ($this->db->trans_status() === false) :
				$this->db->trans_rollback();
				$status = false;
				$message = 'Gagal menambahkan pengkajian awal pasien rawat inap';
			else :
				$this->db->trans_commit();
				$status = true;
				$message = 'Berhasil menambahkan pengkajian awal pasien rawat inap';
			endif;
		else :
			// ambil data kajian keperawatan sebelumnya
			$data_before_keperawatan = $this->db->select("*, '' as id_users, '' as tanggal_ubah_anak")->from('sm_kajian_keperawatan_anak')->where('id', $id_kajian_keperawatan_anak)->get()->row();
			unset($data_before_keperawatan->id);
			$data_before_keperawatan->id_users = $this->session->userdata('id_translucent');
			$data_before_keperawatan->tanggal_ubah_anak = $this->datetime;

			// store ke sm_kajian_keperawatan_anak_logs sebelum ada perubahan
			$this->db->insert('sm_kajian_keperawatan_anak_logs', $data_before_keperawatan);

			// ambil data kajian medis sebelumnya
			$data_before_medis = $this->db->select("*, '' as id_users, '' as tanggal_ubah_anak")->from('sm_kajian_medis_anak')->where('id', $id_kajian_medis_anak)->get()->row();
			unset($data_before_medis->id);
			$data_before_medis->id_users = $this->session->userdata('id_translucent');
			$data_before_medis->tanggal_ubah_anak = $this->datetime;

			// store ke sm_kajian_medis_anak_logs sebelum ada perubahan
			$this->db->insert('sm_kajian_medis_anak_logs', $data_before_medis);

			unset($data_kajian_keperawatan_anak['waktu_pengkajian']);
			$data_kajian_keperawatan_anak['updated_date'] = $this->datetime;
			$this->db->where('id', $id_kajian_keperawatan_anak, true)->update('sm_kajian_keperawatan_anak', $data_kajian_keperawatan_anak);
			$data_kajian_medis_anak['updated_date'] = $this->datetime;
			$this->db->where('id', $id_kajian_medis_anak, true)->update('sm_kajian_medis_anak', $data_kajian_medis_anak);

			// record logs
			$this->load->model('logs/Logs_model', 'm_logs');
			$this->m_logs->recordAdminLogs($data_kajian_keperawatan_anak['id_layanan_pendaftaran'], 'Ubah Pengkajian Awal Anak');

			if ($this->db->trans_status() === false) :
				$this->db->trans_rollback();
				$status = false;
				$message = 'Gagal mengubah pengkajian awal pasien anak';
			else :
				$this->db->trans_commit();
				$status = true;
				$message = 'Berhasil mengubah pengkajian awal pasien anak';
			endif;
		endif;

		return array('status' => $status, 'message' => $message);
	}

	//Pengkajian awal anak
	function getKajianKeperawatanAnak($id_pendaftaran)
	{
		return $this->db->select('kkr.*, pgp.nama as perawat, pgd.nama as verifikator_dpjp')
			->from('sm_kajian_keperawatan_anak as kkr')
			->join('sm_layanan_pendaftaran as lp', 'lp.id = kkr.id_layanan_pendaftaran')
			->join('sm_tenaga_medis as tmp', 'tmp.id = kkr.id_perawat', 'left')
			->join('sm_pegawai as pgp', 'pgp.id = tmp.id_pegawai', 'left')
			->join('sm_tenaga_medis as tmd', 'tmd.id = kkr.id_verifikasi_dokter_dpjp', 'left')
			->join('sm_pegawai as pgd', 'pgd.id = tmd.id_pegawai', 'left')
			->where('lp.id_pendaftaran', $id_pendaftaran, true)
			->get()
			->row();
	}

	function getKajianMedisAnak($id_pendaftaran)
	{
		return $this->db->select('kmr.*, pgd.nama as dokter_dpjp, pgdp.nama as dokter_pengkajian')
			->from('sm_kajian_medis_anak as kmr')
			->join('sm_layanan_pendaftaran as lp', 'lp.id = kmr.id_layanan_pendaftaran')
			->join('sm_tenaga_medis as tmd', 'tmd.id = kmr.id_dokter_dpjp', 'left')
			->join('sm_pegawai as pgd', 'pgd.id = tmd.id_pegawai', 'left')
			->join('sm_tenaga_medis as tmdp', 'tmdp.id = kmr.id_dokter_pengkajian', 'left')
			->join('sm_pegawai as pgdp', 'pgdp.id = tmdp.id_pegawai', 'left')
			->where('lp.id_pendaftaran', $id_pendaftaran, true)
			->get()
			->row();
	}

	function getKajianKeperawatanAnakLogs($id_pendaftaran)
	{
		return $this->db->select('kkr.*, pgp.nama as perawat, pgd.nama as verifikator_dpjp, pgu.nama as user')
			->from('sm_kajian_keperawatan_anak_logs as kkr')
			->join('sm_layanan_pendaftaran as lp', 'lp.id = kkr.id_layanan_pendaftaran')
			->join('sm_tenaga_medis as tmp', 'tmp.id = kkr.id_perawat', 'left')
			->join('sm_pegawai as pgp', 'pgp.id = tmp.id_pegawai', 'left')
			->join('sm_tenaga_medis as tmd', 'tmd.id = kkr.id_verifikasi_dokter_dpjp', 'left')
			->join('sm_pegawai as pgd', 'pgd.id = tmd.id_pegawai', 'left')
			->join('sm_translucent as tr', 'tr.id = kkr.id_users', 'left')
			->join('sm_pegawai as pgu', 'pgu.id = tr.id', 'left')
			->where('lp.id_pendaftaran', $id_pendaftaran, true)
			->get()
			->result();
	}

	function getKajianMedisAnakLogs($id_pendaftaran)
	{
		return $this->db->select('kmr.*, pgd.nama as dokter_dpjp, pgdp.nama as dokter_pengkajian, pgu.nama as user')
			->from('sm_kajian_medis_anak_logs as kmr')
			->join('sm_layanan_pendaftaran as lp', 'lp.id = kmr.id_layanan_pendaftaran')
			->join('sm_tenaga_medis as tmd', 'tmd.id = kmr.id_dokter_dpjp', 'left')
			->join('sm_pegawai as pgd', 'pgd.id = tmd.id_pegawai', 'left')
			->join('sm_tenaga_medis as tmdp', 'tmdp.id = kmr.id_dokter_pengkajian', 'left')
			->join('sm_pegawai as pgdp', 'pgdp.id = tmdp.id_pegawai', 'left')
			->join('sm_translucent as tr', 'tr.id = kmr.id_users', 'left')
			->join('sm_pegawai as pgu', 'pgu.id = tr.id', 'left')
			->where('lp.id_pendaftaran', $id_pendaftaran, true)
			->get()
			->result();
	}


	// surat kontrol
	function updateSuratKontrol($data)
	{
		$this->db->trans_begin();
		$id = safe_post('id_surat_kontrol');
		if (!$id) :
			$data['created_date'] = $this->datetime;
			$this->db->insert('sm_surat_kontrol', $data);
			$id = $this->db->insert_id();

			if ($this->db->trans_status() === false) :
				$this->db->trans_rollback();
				$response = array('status' => false, 'message' => 'Gagal menyimpan data.');
			else :
				$this->db->trans_commit();
				$response = array('id' => $id, 'status' => true, 'message' => 'Berhasil menyimpan data.');
			endif;

			return $response;
		else :
			$data['updated_date'] = $this->datetime;
			$this->db->where('id', $id, true)->update('sm_surat_kontrol', $data);

			if ($this->db->trans_status() === false) :
				$this->db->trans_rollback();
				$response = array('status' => false, 'message' => 'Gagal mengubah data.');
			else :
				$this->db->trans_commit();
				$response = array('id' => $id, 'status' => true, 'message' => 'Berhasil mengubah data.');
			endif;

			return $response;
		endif;
	}

	function getDataSuratKontrol($id_pendaftaran, $id_layanan_pendaftaran)
	{
		$data['surat'] = $this->db->select("sk.*, sp.nama as poli, pg.nama as dokter, pg.tanda_tangan, jd.shift_poli")
			->from('sm_surat_kontrol as sk')
			->join('sm_spesialisasi as sp', 'sp.id = sk.id_spesialisasi', 'left')
			->join('sm_tenaga_medis as tm', 'tm.id = sk.id_dokter_tujuan', 'left')
			->join('sm_pegawai as pg', 'pg.id = tm.id_pegawai', 'left')
			->join('sm_jadwal_dokter as jd', 'jd.id = sk.id_jadwal_dokter', 'left')
			->where('sk.id_pendaftaran', $id_pendaftaran, true)
			->where('sk.id_layanan_pendaftaran', $id_layanan_pendaftaran, true)
			->get()
			->row();
		$data['pasien'] = $this->db->select("p.nama, p.tanggal_lahir, p.alamat, p.kelamin, pp.tinggi_badan, pp.berat_badan")
			->from('sm_pasien as p')
			->join('sm_pendaftaran as pd', 'pd.id_pasien = p.id')
			->join('sm_profil_pasien as pp', 'pp.id_pasien = p.id')
			->where('pd.id', $id_pendaftaran, true)
			->get()
			->row();
		$data['default'] = $this->db->select('lp.id_dokter, peg.nama as dokter, s.id as id_spesialisasi, s.nama as nama_poli')
			->from('sm_layanan_pendaftaran lp')
			->join('sm_tenaga_medis tm', 'tm.id = lp.id_dokter')
			->join('sm_pegawai peg', 'peg.id = tm.id_pegawai')
			->join('sm_spesialisasi s', 's.id = tm.id_spesialisasi', 'left')
			->where('lp.id', $id_layanan_pendaftaran)
			->get()->row();
		$this->load->model('pelayanan/Pelayanan_model', 'm_pelayanan');
		$this->load->model('rekam_medis/Rekam_medis_model', 'm_rekam_medis');
		$data['diagnosa'] = $this->m_pelayanan->getDiagnosaPemeriksaan($id_layanan_pendaftaran);

		$penjualan = $this->m_rekam_medis->getObat($id_layanan_pendaftaran);
		//$data['tes'] = $this->m_rekam_medis->getObat($id_layanan_pendaftaran);

		if (count((array)$penjualan) > 0) :

			foreach ($penjualan as $val) {
				$data['obat'][] = $this->m_rekam_medis->getDetailObat($val->id, 0);
			}
		// $data['obat'] = $this->m_rekam_medis->getDetailObat($penjualan->id);
		//$data['obat'] = $this->m_rekam_medis->getDetailObat('512');			




		endif;
		return $data;
	}
	// end surat kontrol


	// PSPMP
	function getPengkajianSpiritualPasienPulang($id_pendaftaran)
	{
		$sql = "select psps.*, pa.nama as nama_pasien, pd.no_register, pa.telp
				from sm_pengkajian_spiritual_pasien_pulang psps				
				join sm_pendaftaran pd ON psps.id_pendaftaran = pd.id
				join sm_pasien pa ON pd.id_pasien = pa.id
				where psps.id_pendaftaran = '" . $id_pendaftaran . "' ";
		return $this->db->query($sql)->result();
	}

	// function getIndikasiPasienMasukICU($id_pendaftaran, $id_layanan)
	// {
	// 	$sql = "select ipi.*, pa.nama as nama_pasien, pd.no_register, pa.telp, pa.tanggal_lahir, p.nama as nama_dokter
	// 			from sm_indikasi_pasien_icu ipi				
	// 			join sm_pendaftaran pd ON ipi.id_pendaftaran = pd.id
	// 			join sm_pasien pa ON pd.id_pasien = pa.id
	// 			LEFT JOIN sm_diagnosa AS d ON d.id_layanan_pendaftaran = '" . $id_layanan . "' 
	// 			LEFT JOIN sm_tenaga_medis tm ON tm.id = d.id_dokter
	// 			LEFT JOIN sm_pegawai p ON p.id = tm.id_pegawai
	// 			where ipi.id_pendaftaran = '" . $id_pendaftaran . "' ";
	// 	return $this->db->query($sql)->result();
	// }

	// IPI
	function getIndikasiPasienMasukICU($id_pendaftaran, $id_layanan)
	{
		$sql = "select ipi.*, pa.nama as nama_pasien, pd.no_register, pa.telp, pa.tanggal_lahir, p.nama as nama_dokter
				from sm_indikasi_pasien_icu ipi				
				join sm_pendaftaran pd ON ipi.id_pendaftaran = pd.id
				join sm_pasien pa ON pd.id_pasien = pa.id
				LEFT JOIN sm_diagnosa AS d ON d.id_layanan_pendaftaran = '" . $id_layanan . "' 
				LEFT JOIN sm_tenaga_medis tm ON tm.id = d.id_dokter
				LEFT JOIN sm_pegawai p ON p.id = tm.id_pegawai
				where ipi.id_pendaftaran = '" . $id_pendaftaran . "' ";
		return $this->db->query($sql)->result();
	}

	// IPI
	function getIndikasiPasienMasukICUTambahan($id_pendaftaran, $id_layanan)
	{
		$sql = "select ipit.*, pg.nama as petugas
				from sm_indikasi_pasien_icu_tambahan ipit				
				join sm_pendaftaran pd ON ipit.id_pendaftaran = pd.id
				LEFT JOIN sm_pegawai pg ON pg.id = ipit.id_user
				where ipit.id_pendaftaran = '" . $id_pendaftaran . "'
				ORDER BY ipit.tanggal_ipi ASC";
		return $this->db->query($sql)->result();
	}


	// LEFT JOIN sm_diagnosa AS d ON d.id_layanan_pendaftaran = lp.id    // kalau eror balikin ke sini 

	// PAKAI INI AJAH // IPI
	function getPrintIcu($id, $id_pendaftaran, $id_layanan)
	{
		$sql = "select ipit.*, 
				ps.id as id_pasien, 
				pgd.tanda_tangan as ttd_dokter_dpjp, 
				pg.nama as petugas, 
				pgd.nama as nama_dokter 
				from sm_indikasi_pasien_icu_tambahan ipit				
				join sm_layanan_pendaftaran lp on lp.id = ipit.id_layanan_pendaftaran
				join sm_pendaftaran pd ON lp.id_pendaftaran = pd.id
				left join sm_pasien ps on ps.id = pd.id_pasien
				LEFT JOIN sm_diagnosa d ON d.id_layanan_pendaftaran = lp.id AND d.prioritas = 'Utama'
				LEFT JOIN sm_pegawai pg ON pg.id = ipit.id_user
				LEFT JOIN sm_tenaga_medis tm ON tm.id = d.id_dokter			
				LEFT JOIN sm_pegawai pgd ON pgd.id = tm.id_pegawai
				where ipit.id = '" . $id . "' ";
		return $this->db->query($sql)->row();
	}

	// IPI 
	function insertIndikasiPasienMasukICUTambahan($data)
	{
		$ipi_tgl = date2mysql($data['tanggal_ipi']);
		$data = array(
			'id_layanan_pendaftaran'   	=> $data['id_layanan_pendaftaran'],
			'id_pendaftaran'      		=> $data['id_pendaftaran'],
			'id_user'           		=> $data['id_user'],
			'tanggal_ipi'  				=> $ipi_tgl,
			'nama_pasien'           	=> $data['nama_pasien'],
			'diagnosa'           		=> $data['diagnosa'],
			'ruang'           			=> $data['ruang'],
		);
		// var_dump($data);die;
		$this->db->insert('sm_indikasi_pasien_icu_tambahan', $data);
	}

	// IPI
	function deleteIndikasiPasienIcu($id)
	{
		return $this->db->where("id", $id)->delete("sm_indikasi_pasien_icu_tambahan");
	}


	function getPemberianInformasiPasien($id_pendaftaran)
	{
		$sql = "select pis.*, pa.nama as nama_pasien, pd.no_register, pa.telp, p.nama as nama_dokter, ga.nama as nama_user
				from sm_pemberian_informasi_pasien pis				
				left join sm_tenaga_medis tm ON pis.id_dokter = tm.id 
				left join sm_pegawai p ON tm.id_pegawai = p.id
				left join sm_translucent as st ON st.id = pis.id_users
				left join sm_pegawai as ga ON ga.id = st.id	
				join sm_layanan_pendaftaran lp ON pis.id_layanan_pendaftaran = lp.id
				join sm_pendaftaran pd ON lp.id_pendaftaran = pd.id
				join sm_pasien pa ON pd.id_pasien = pa.id	
				where lp.id_pendaftaran = '" . $id_pendaftaran . "'";
		return $this->db->query($sql)->row();
	}

	function getResumeMedis($id)
	{
		$sql = "select pd.id_pasien,
			pd.status as kunjungan,
			p.nama as nama_pasien,
			p.alamat,
			p.nama_kec,
			concat (EXTRACT(year FROM AGE(p.tanggal_lahir)), ' thn ', EXTRACT(month FROM AGE(p.tanggal_lahir)), ' bln ', EXTRACT(day FROM AGE(p.tanggal_lahir)), ' hari') as umur,
			p.kelamin,
			pj.nama as penjamin,
			kl.nama as kelas,
			b.nama as ruangan,
			ra.no_ruang,
			ra.no_bed,
			ra.waktu_masuk as tgl_masuk,
			ra.waktu_keluar as tgl_keluar,
			rmr.id as id_rmr,
			concat(concat(case when gs2.kode_icdx_rinci is null then '' else ' [' end, gs2.kode_icdx_rinci, gs3.kode_icdx_rinci, case when gs2.kode_icdx_rinci is null then '' else '] ' end), case when d.id_golongan_sebab_sakit is not null then gs.nama else d.golongan_sebab_sakit_lain end) AS icdx_diagnosa,
			pg.nama as nama_dokter,
			an.keluhan_utama, an.riwayat_penyakit_sekarang, an.riwayat_penyakit_dahulu, an.riwayat_penyakit_keluarga, an.anamnesa_sosial, an.pemeriksaan_penunjang, an.keadaan_umum, an.kesadaran, an.gcs, an.rr, an.suhu, an.tensi_sistolik as sistolik, an.tensi_diastolik as diastolik, an.nadi, an.nps, pp.tinggi_badan as tinggi_badan_ranap, pp.berat_badan as berat_badan_ranap, an.tinggi_badan, an.berat_badan, an.kepala, an.leher, an.thorax, an.pulmo, an.cor, an.abdomen, an.genitalia, an.ekstrimitas, an.usul_tindak_lanjut,
			so.subject, so.objective, so.assessment, so.plan, so.keterangan as ket_soap, rmr.*, rmkr.*

			from sm_pasien p
			join sm_profil_pasien as pp on (p.id = pp.id_pasien)
			left join sm_pendaftaran as pd on (pd.id_pasien = p.id)
			left join sm_penjamin as pj on (pj.id = pd.id_penjamin)
			left join sm_layanan_pendaftaran as lp on (lp.id_pendaftaran = pd.id)
			left join sm_order_rawat_inap as ori on (ori.id_pendaftaran = pd.id)
			left join sm_tenaga_medis as tm on (tm.id = ori.id_dokter_dpjp)
			left join sm_pegawai as pg on (pg.id = tm.id_pegawai)
			left join sm_unit as un on (un.id = lp.id_unit_layanan)
			left join sm_rawat_inap as ra on (ra.id_layanan_pendaftaran = lp.id)
			left join sm_kelas as kl on (kl.id = ra.id_kelas)
			left join sm_bangsal as b on (b.id = ra.id_bangsal)
			left join sm_spesialisasi as sp on (sp.id = lp.id_unit_layanan)
			left join sm_diagnosa as d on (d.id_layanan_pendaftaran = lp.id)
			left join sm_golongan_sebab_sakit as gs on (gs.id = d.id_golongan_sebab_sakit) 
			left join sm_golongan_sebab_sakit as gs2 on (gs2.id = d.id_pengkodean) 
			left join sm_golongan_sebab_sakit as gs3 on (gs3.id = d.id_pengkodean_asterik)
			left join sm_anamnesa as an on (an.id_layanan_pendaftaran = lp.id)
			left join sm_soap as so on (so.id_layanan_pendaftaran = lp.id )
			Left join sm_resume_medis_ranap as rmr on (rmr.id_pendaftaran = pd.id)
			left join sm_resume_medis_kontrol_ranap rmkr on (rmkr.id_layanan_pendaftaran = lp.id)			
	
			where pd.id = '" . $id . "' ";
		return $this->db->query($sql)->result();
	}

	function getResumeMedisJadwalKontrol($id)
	{
		return $this->db->select("sjkk.*, COALESCE(pg.nama, '') as dokter, COALESCE(ga.nama, '') as akun_user, CASE
        WHEN to_char(sjkk.tanggal, 'd')='2' THEN 'Senin'
        WHEN to_char(sjkk.tanggal, 'd')='3' THEN 'Selasa'
        WHEN to_char(sjkk.tanggal, 'd')='4' THEN 'Rabu'
        WHEN to_char(sjkk.tanggal, 'd')='5' THEN 'Kamis'
        WHEN to_char(sjkk.tanggal, 'd')='6' THEN 'Jumat'
        WHEN to_char(sjkk.tanggal, 'd')='7' THEN 'Sabtu'
        WHEN to_char(sjkk.tanggal, 'd')='1' THEN 'Minggu'
        END as hari")
			->from('sm_jadwal_kontrol_keperawatan as sjkk')
			->join('sm_layanan_pendaftaran as lp', 'lp.id = sjkk.id_layanan_pendaftaran')
			->join('sm_pendaftaran as pd', 'pd.id = lp.id_pendaftaran')
			->join('sm_tenaga_medis as tm', 'tm.id = sjkk.id_ek_nama_dokter')
			->join('sm_pegawai as pg', 'pg.id = tm.id_pegawai')
			->join('sm_translucent as st', 'st.id = sjkk.user', 'left')
			->join('sm_pegawai as ga', 'ga.id = st.id', 'left')
			->where('pd.id', $id, true)
			->group_by('sjkk.id, pg.nama, ga.nama')
			->get()
			->result();
		$this->db->close();
	}

	function getResumeMedisKontrol($id)
	{
		$sql = "select rmtr.*,  COALESCE(pg.nama, '') as dokter, COALESCE(pgst.nama, '') as akun_user
				from sm_resume_medis_kontrol_ranap rmtr				
				join sm_tenaga_medis as tm on tm.id = rmtr.id_ek_nama_dokter 
				join sm_pegawai as pg on pg.id = tm.id_pegawai
				left join sm_translucent as st on st.id = rmtr.id_users
				left join sm_pegawai as pgst on pgst.id = st.id
				where rmtr.id_layanan_pendaftaran = '" . $id . "' ";
		return $this->db->query($sql)->result();
	}

	function getKeperawatanKontrol($id)
	{
		$sql = "select rmtr.*,  COALESCE(pg.nama, '') as dokter, COALESCE(pgst.nama, '') as akun_user
				from sm_jadwal_kontrol_keperawatan rmtr				
				join sm_tenaga_medis as tm on tm.id = rmtr.id_ek_nama_dokter 
				join sm_pegawai as pg on pg.id = tm.id_pegawai
				left join sm_translucent as st on st.id = rmtr.user
				left join sm_pegawai as pgst on pgst.id = st.id
				where rmtr.id_layanan_pendaftaran = '" . $id . "' ";
		return $this->db->query($sql)->result();
	}

	function cekDaftar($id)
	{
		return $this->db->select("lp.*")
			->from('sm_layanan_pendaftaran as lp')
			->join('sm_pendaftaran as pd', 'pd.id = lp.id_pendaftaran')
			->where('pd.id', $id, true)
			->where('lp.jenis_layanan', 'IGD')
			->order_by('lp.id', 'asc')
			->get()
			->result();
		$this->db->close();
	}

	function cekLaboratorium($id)
	{

		return $this->db->select("lb.*")
			->from('sm_laboratorium as lb')
			->join('sm_layanan_pendaftaran as lp', 'lp.id = lb.id_layanan_pendaftaran')
			->join('sm_pendaftaran as pd', 'pd.id = lp.id_pendaftaran')
			->where('pd.id', $id, true)
			->group_by('lb.id', 'asc')
			->get()
			->result();
		$this->db->close();
	}

	function cekRadiologi($id)
	{
		return $this->db->select("sr.kode, sdr.hasil, sdr.html, icd.code, sl.nama as layanan")
			->from('sm_detail_radiologi as sdr')
			->join('sm_tarif_pelayanan as stp', 'stp.id = sdr.id_tarif', 'left')
			->join('sm_layanan as sl', 'sl.id = stp.id_layanan', 'left')
			->join('sm_radiologi as sr', 'sr.id = sdr.id_radiologi', 'left')
			->join('sm_icd_ix as icd', 'sdr.id_pengkodean = icd.id', 'left')
			->join('sm_layanan_pendaftaran as lp', 'lp.id = sr.id_layanan_pendaftaran')
			->join('sm_pendaftaran as pd', 'pd.id = lp.id_pendaftaran')
			->where('pd.id', $id, true)
			->group_by('sdr.id, sr.kode, icd.code, sl.nama')
			->get()
			->result();
		$this->db->close();
	}

	// Punya Mas Reza
	// function getResumeTerapiPulang($id)
	// {
	// 	return $this->db->select("stp.*, COALESCE(sb.nama_lengkap, '') as barang_auto, COALESCE(pg.nama, '') as akun_user")
	//                 ->from('sm_terapi_pulang as stp')
	//                 ->join('sm_layanan_pendaftaran as lp', 'lp.id = stp.id_layanan_pendaftaran')
	//                 ->join('sm_pendaftaran as pd', 'pd.id = lp.id_pendaftaran')
	//                 ->join('sm_barang as sb', 'sb.id = stp.obat', 'left')
	//                 ->join('sm_translucent as st', 'st.id = stp.id_users', 'left')
	//                 ->join('sm_pegawai as pg', 'pg.id = st.id', 'left')
	//                 ->where('pd.id', $id, true)
	//                 ->group_by('stp.id, sb.nama_lengkap, pg.nama')
	//                 ->get()
	//                 ->result();
	//     $this->db->close();
	// }

	// concat_ws ('. ', ( SELECT gss.kode_icdx_rinci FROM sm_golongan_sebab_sakit AS gss WHERE gss.ID = d.id_pengkodean ), ( SELECT gss.kode_icdx_rinci FROM sm_golongan_sebab_sakit AS gss WHERE gss.ID = d.id_pengkodean_asterik ), gss.nama ) AS nama

	function getResumeTerapiPulang($id)
	{
		$sql = "select tpr.*,  COALESCE(sb.nama_lengkap, '') as obat_rm, COALESCE(pg.nama, '') as akun_user
				from sm_resume_medis_terapi_pulang tpr				
				left join sm_barang as sb on sb.id = tpr.obat
				left join sm_translucent as st on st.id = tpr.id_users
				left join sm_pegawai as pg on pg.id = st.id
				where tpr.id_layanan_pendaftaran = '" . $id . "' ";
		return $this->db->query($sql)->result();
	}

	function getObatTerapiPulang($id)
	{
		$sql = "select r.*,  COALESCE(sb.nama_lengkap, '') as nama_obat, COALESCE(pg.nama, '') as akun_user,
       			rr.resep_r_jumlah as jumlah_obat, concat_ws(' ', rrd.dosis_racik, sat.nama) as dosis,
       			case when rr.aturan_pakai_manual = '1' then rr.ket_aturan_pakai_manual else rr.aturan_pakai end as frekuensi,
       			sb.roa as cara_pemberian, rr.keterangan_resep as petunjuk_khusus,
       			rr.jam_pemberian_1 as ek_jam_pemberian, rr.jam_pemberian_2 as ek_jam_pemberian_satu, rr.jam_pemberian_3 as ek_jam_pemberian_dua,
       			rr.jam_pemberian_4 as ek_jam_pemberian_tiga, rr.jam_pemberian_5 as ek_jam_pemberian_empat, rr.jam_pemberian_6 as ek_jam_pemberian_lima
				from sm_resep as r
				join sm_resep_r as rr on rr.id_resep = r.id
				join sm_resep_r_detail as rrd on rrd.id_resep_r = rr.id
				left join sm_barang as sb on sb.id = rrd.id_barang
				left join sm_satuan as sat on sat.id = sb.satuan_kekuatan
				left join sm_translucent as st on st.id = r.id_users
				left join sm_pegawai as pg on pg.id = st.id
				where r.id_layanan_pendaftaran = '" . $id . "' 
				and r.is_terapi_pulang = 1";
		return $this->db->query($sql)->result();
	}

	function getKeperawatanPulang($id)
	{
		$sql = "select tpr.*,  COALESCE(sb.nama_lengkap, '') as obat_rm, COALESCE(pg.nama, '') as akun_user
				from sm_terapi_pulang tpr				
				left join sm_barang as sb on sb.id = tpr.obat
				left join sm_translucent as st on st.id = tpr.id_users
				left join sm_pegawai as pg on pg.id = st.id
				where tpr.id_layanan_pendaftaran = '" . $id . "' ";
		return $this->db->query($sql)->result();
	}


	// LOGS RESUMEDIS 
	public function logsResumeMedisRanap($data, $aksi = 'insert', $user_id = null) {
		if (!$data) return false;
		unset($data['id']); // Biar gak tabrakan dengan primary key logs
		$log_data = $data;
		$log_data['log_action'] = $aksi;
		$log_data['log_by']     = $user_id;
		$log_data['log_date']   = date('Y-m-d H:i:s');
		return $this->db->insert('sm_resume_medis_ranap_logs', $log_data);
	}

	// LOGS RESUMEDIS KONTROL
	public function logsTglKontrolKembali($data, $deleted_by = null) {
		if (!$data) return false;
		unset($data['id']); // Hapus ID untuk mencegah konflik dengan primary key
		$data['log_action']   = 'delete';
		$data['deleted_by']   = $deleted_by;
		$data['deleted_date'] = date('Y-m-d H:i:s');
		return $this->db->insert('sm_resume_medis_kontrol_ranap_logs', $data);
	}

	// LOGS RESUMEDIS TERAPI
	public function logsResumMedisTerapiPulang($data, $deleted_by = null) {
		if (!$data) return false;
		unset($data['id']); // Hapus ID untuk mencegah konflik dengan primary key
		$data['log_action']   = 'delete';
		$data['deleted_by']   = $deleted_by;
		$data['deleted_date'] = date('Y-m-d H:i:s');
		return $this->db->insert('sm_resume_medis_terapi_pulang_logs', $data);
	}




	function updateTerapiPulangRM($data)
	{
		if (is_array($data['obat'])) :
			foreach ($data['obat'] as $i => $value) :
				$jam_pemberian       = null;
				$jam_pemberian_satu  = null;
				$jam_pemberian_dua   = null;
				$jam_pemberian_tiga  = null;
				$jam_pemberian_empat = null;
				$jam_pemberian_lima  = null;
				if (!empty($data['ek_jam_pemberian'][$i])) {
					$date1         = new DateTime($data['ek_jam_pemberian'][$i]);
					$jam_pemberian = $date1->format('H:i:s');
				}
				if (!empty($data['ek_jam_pemberian_satu'][$i])) {
					$date2              = new DateTime($data['ek_jam_pemberian_satu'][$i]);
					$jam_pemberian_satu = $date2->format('H:i:s');
				}
				if (!empty($data['ek_jam_pemberian_dua'][$i])) {
					$date3             = new DateTime($data['ek_jam_pemberian_dua'][$i]);
					$jam_pemberian_dua = $date3->format('H:i:s');
				}
				if (!empty($data['ek_jam_pemberian_tiga'][$i])) {
					$date4              = new DateTime($data['ek_jam_pemberian_tiga'][$i]);
					$jam_pemberian_tiga = $date4->format('H:i:s');
				}
				if (!empty($data['ek_jam_pemberian_empat'][$i])) {
					$date5               = new DateTime($data['ek_jam_pemberian_empat'][$i]);
					$jam_pemberian_empat = $date5->format('H:i:s');
				}
				if (!empty($data['ek_jam_pemberian_lima'][$i])) {
					$date6              = new DateTime($data['ek_jam_pemberian_lima'][$i]);
					$jam_pemberian_lima = $date6->format('H:i:s');
				}
				$data_terapi_rm = array(
					'id_layanan_pendaftaran' => $data['id_layanan_pendaftaran'],
					'obat'                   => $value,
					'jumlah_obat'            => $data['jumlah_obat'][$i],
					'dosis'                  => $data['dosis'][$i],
					'frekuensi'              => $data['frekuensi'][$i],
					'cara_pemberian'         => $data['cara_pemberian'][$i],
					'ek_jam_pemberian'       => $jam_pemberian,
					'ek_jam_pemberian_satu'  => $jam_pemberian_satu,
					'ek_jam_pemberian_dua'   => $jam_pemberian_dua,
					'ek_jam_pemberian_tiga'  => $jam_pemberian_tiga,
					'ek_jam_pemberian_empat' => $jam_pemberian_empat,
					'ek_jam_pemberian_lima'  => $jam_pemberian_lima,
					'petunjuk_khusus'        => $data['petunjuk_khusus'][$i],
					'id_users'               => $data['id_users'][$i],
					'created_date'           => $data['created_date'][$i],
				);

				$this->db->insert('sm_resume_medis_terapi_pulang', $data_terapi_rm);
			endforeach;
		endif;
	}

	function insertTerapiPulangKeperawatan($data)
	{
		if (is_array($data['obat'])) :
			foreach ($data['obat'] as $i => $value) :
				$jam_pemberian       = null;
				$jam_pemberian_satu  = null;
				$jam_pemberian_dua   = null;
				$jam_pemberian_tiga  = null;
				$jam_pemberian_empat = null;
				$jam_pemberian_lima  = null;
				if (!empty($data['ek_jam_pemberian'][$i])) {
					$date1         = new DateTime($data['ek_jam_pemberian'][$i]);
					$jam_pemberian = $date1->format('H:i:s');
				}
				if (!empty($data['ek_jam_pemberian_satu'][$i])) {
					$date2              = new DateTime($data['ek_jam_pemberian_satu'][$i]);
					$jam_pemberian_satu = $date2->format('H:i:s');
				}
				if (!empty($data['ek_jam_pemberian_dua'][$i])) {
					$date3             = new DateTime($data['ek_jam_pemberian_dua'][$i]);
					$jam_pemberian_dua = $date3->format('H:i:s');
				}
				if (!empty($data['ek_jam_pemberian_tiga'][$i])) {
					$date4              = new DateTime($data['ek_jam_pemberian_tiga'][$i]);
					$jam_pemberian_tiga = $date4->format('H:i:s');
				}
				if (!empty($data['ek_jam_pemberian_empat'][$i])) {
					$date5               = new DateTime($data['ek_jam_pemberian_empat'][$i]);
					$jam_pemberian_empat = $date5->format('H:i:s');
				}
				if (!empty($data['ek_jam_pemberian_lima'][$i])) {
					$date6              = new DateTime($data['ek_jam_pemberian_lima'][$i]);
					$jam_pemberian_lima = $date6->format('H:i:s');
				}
				$data_terapi_rm = array(
					'id_layanan_pendaftaran' => $data['id_layanan_pendaftaran'],
					'obat'                   => $value,
					'jumlah_obat'            => $data['jumlah_obat'][$i],
					'dosis'                  => $data['dosis'][$i],
					'frekuensi'              => $data['frekuensi'][$i],
					'cara_pemberian'         => $data['cara_pemberian'][$i],
					'ek_jam_pemberian'       => $jam_pemberian,
					'ek_jam_pemberian_satu'  => $jam_pemberian_satu,
					'ek_jam_pemberian_dua'   => $jam_pemberian_dua,
					'ek_jam_pemberian_tiga'  => $jam_pemberian_tiga,
					'ek_jam_pemberian_empat' => $jam_pemberian_empat,
					'ek_jam_pemberian_lima'  => $jam_pemberian_lima,
					'petunjuk_khusus'        => $data['petunjuk_khusus'][$i],
					'id_users'               => $data['id_users'][$i],
					'created_date'           => $data['created_date'][$i],
				);

				$this->db->insert('sm_terapi_pulang', $data_terapi_rm);
			endforeach;
		endif;
	}

	function getPengobatan($id_daftar)
	{
		return $this->db->distinct("concat ( br.nama, ' (', rs.aturan_pakai, ')', CASE WHEN rs.keterangan_resep IS NULL THEN '' ELSE concat(' Keterangan Resep: ', rs.keterangan_resep) END ) AS nama")
			->from('sm_resep_r_detail as rsd')
			->join('sm_resep_r as rs', 'rs.id = rsd.id_resep_r', 'left')
			->join('sm_resep as rp', 'rp.id = rs.id_resep', 'left')
			->join('sm_barang as br', 'br.id = rsd.id_barang', 'left')
			->join('sm_layanan_pendaftaran as lp', 'lp.id = rp.id_layanan_pendaftaran', 'left')
			->join('sm_pendaftaran as pd', 'pd.id = lp.id_pendaftaran', 'left')
			->where('lp.id_pendaftaran', $id_daftar, true)
			->where('br.id_kategori', '1')
			->get()
			->result();
		$this->db->close();
	}

	function getPengobatanNew($id_daftar)
	{
		return $this->db->select("concat ( br.nama_lengkap, ' (', case when rs.aturan_pakai_manual is not null and rs.aturan_pakai_manual != '0' then rs.ket_aturan_pakai_manual else rs.aturan_pakai end, ')' ) AS nama")
			->from('sm_resep_r_detail as rsd')
			->join('sm_resep_r as rs', 'rs.id = rsd.id_resep_r', 'left')
			->join('sm_resep as rp', 'rp.id = rs.id_resep', 'left')
			->join('sm_barang as br', 'br.id = rsd.id_barang', 'left')
			->join('sm_layanan_pendaftaran as lp', 'lp.id = rp.id_layanan_pendaftaran', 'left')
			->join('sm_pendaftaran as pd', 'pd.id = lp.id_pendaftaran', 'left')
			->where('lp.id_pendaftaran', $id_daftar, true)
			->where('br.id_kategori', '1')
			->get()
			->result();
		$this->db->close();
	}

	function getDiagnosaUtama($id_layanan_pendaftaran)
	{
		$sql = " select concat_ws('. ', (SELECT gsa.kode_icdx_rinci
                                             FROM sm_golongan_sebab_sakit AS gsa
                                             WHERE gsa.ID = d.id_pengkodean),
                 (SELECT gss1.nama FROM sm_golongan_sebab_sakit AS gss1 WHERE gss1.ID = d.id_golongan_sebab_sakit),
                 d.golongan_sebab_sakit_lain) AS nama 
			from sm_diagnosa d
			left join sm_golongan_sebab_sakit gss ON gss.id = d.id_golongan_sebab_sakit
			where d.id_layanan_pendaftaran = '" . $id_layanan_pendaftaran . "' 
			and d.prioritas = 'Utama'
			and d.diagnosa_manual != '1'";
		return $this->db->query($sql)->result();
	}

	function getDiagnosaManualAwal($id_layanan_pendaftaran)
	{
		$sql = " select concat_ws('. ', (SELECT gsa.kode_icdx_rinci
                                             FROM sm_golongan_sebab_sakit AS gsa
                                             WHERE gsa.ID = d.id_pengkodean),
                 (SELECT gss1.nama FROM sm_golongan_sebab_sakit AS gss1 WHERE gss1.ID = d.id_golongan_sebab_sakit),
                 d.golongan_sebab_sakit_lain) AS nama_manual 
			from sm_diagnosa d
			left join sm_golongan_sebab_sakit gss ON gss.id = d.id_golongan_sebab_sakit
			where d.id_layanan_pendaftaran = '" . $id_layanan_pendaftaran . "' 
			and d.prioritas = 'Utama'
			and d.diagnosa_manual = '1'";
		return $this->db->query($sql)->result();
	}

	function getDiagnosa($id_daftar)
	{
		$sql = " select d.*, concat_ws ('. ', ( SELECT gss.kode_icdx_rinci FROM sm_golongan_sebab_sakit AS gss WHERE gss.id = d.id_pengkodean ), ( SELECT gss.kode_icdx_rinci FROM sm_golongan_sebab_sakit AS gss WHERE gss.id = d.id_pengkodean_asterik ), gss.nama ) AS nama , lp.id as id_layanan_pendaftaran
			from sm_diagnosa d
			left join sm_golongan_sebab_sakit gss ON gss.id = d.id_golongan_sebab_sakit 
			join sm_layanan_pendaftaran lp ON lp.id = d.id_layanan_pendaftaran 
			join sm_pendaftaran pd ON pd.id = lp.id_pendaftaran 
			where lp.id_pendaftaran = '" . $id_daftar . "' 
			and lp.jenis_layanan not in('Poliklinik', 'IGD')
			and d.prioritas = 'Utama'
			and d.diagnosa_manual <> '1'
			order by lp.id desc limit 1";
		return $this->db->query($sql)->result();
	}

	function getDiagnosaManualUtama($id_daftar)
	{
		$sql = " select concat_ws ('. ', ( SELECT gss.kode_icdx_rinci FROM sm_golongan_sebab_sakit AS gss WHERE gss.id = d.id_pengkodean ), ( SELECT gss.kode_icdx_rinci FROM sm_golongan_sebab_sakit AS gss WHERE gss.id = d.id_pengkodean_asterik ), d.golongan_sebab_sakit_lain ) AS nama , lp.id as id_layanan_pendaftaran
			from sm_diagnosa d
			join sm_layanan_pendaftaran lp ON lp.id = d.id_layanan_pendaftaran 
			join sm_pendaftaran pd ON pd.id = lp.id_pendaftaran 
			where lp.id_pendaftaran = '" . $id_daftar . "'
			and lp.jenis_layanan not in('Poliklinik', 'IGD')
			and d.prioritas = 'Utama'
			and d.diagnosa_manual = '1'
			order by lp.id desc limit 1";
		return $this->db->query($sql)->result();
	}

	public function getDiagnosaUtamaUnitLainnya($id_daftar, $dsu, $dsmu)
	{
		$sql = " select concat_ws ('. ', ( SELECT gss.kode_icdx_rinci FROM sm_golongan_sebab_sakit AS gss WHERE gss.id = d.id_pengkodean ), ( SELECT gss.kode_icdx_rinci FROM sm_golongan_sebab_sakit AS gss WHERE gss.id = d.id_pengkodean_asterik ), d.golongan_sebab_sakit_lain ) AS nama  , lp.id as id_layanan_pendaftaran
			from sm_diagnosa d
			join sm_layanan_pendaftaran lp ON lp.id = d.id_layanan_pendaftaran 
			join sm_pendaftaran pd ON pd.id = lp.id_pendaftaran 
			where lp.id_pendaftaran = '" . $id_daftar . "'
			and lp.jenis_layanan not in('Poliklinik', 'IGD')
			and d.prioritas = 'Utama'";

		$layananDeleted = $dsu[0]->id_layanan_pendaftaran ?? $dsmu[0]->id_layanan_pendaftaran ?? null;

		$data = $this->db->query($sql)->result();
		return array_values(array_filter($data, function ($value) use ($layananDeleted) {
			return $value->id_layanan_pendaftaran != $layananDeleted;
		}));
	}

	function getDiagnosaSekunder($id_daftar)
	{
		$sql = " select distinct concat_ws ('. ', ( SELECT gss.kode_icdx_rinci FROM sm_golongan_sebab_sakit AS gss WHERE gss.ID = d.id_pengkodean ), ( SELECT gss.kode_icdx_rinci FROM sm_golongan_sebab_sakit AS gss WHERE gss.ID = d.id_pengkodean_asterik ), gss.nama ) AS nama 
			from sm_diagnosa d
			left join sm_golongan_sebab_sakit gss ON gss.id = d.id_golongan_sebab_sakit 
			left join sm_layanan_pendaftaran lp ON lp.id = d.id_layanan_pendaftaran 
			left join sm_pendaftaran pd ON pd.id = lp.id_pendaftaran 
			where lp.id_pendaftaran = '" . $id_daftar . "'
			and lp.jenis_layanan not in('Poliklinik', 'IGD')
			and d.prioritas = 'Sekunder'
			and d.diagnosa_manual <> '1'";
		return $this->db->query($sql)->result();
	}

	function getDiagnosaManualSekunder($id_daftar)
	{
		$sql = " select distinct concat_ws ('. ', ( SELECT gss.kode_icdx_rinci FROM sm_golongan_sebab_sakit AS gss WHERE gss.ID = d.id_pengkodean ), ( SELECT gss.kode_icdx_rinci FROM sm_golongan_sebab_sakit AS gss WHERE gss.ID = d.id_pengkodean_asterik ), d.golongan_sebab_sakit_lain ) AS nama 
			from sm_diagnosa d
			left join sm_layanan_pendaftaran lp ON lp.id = d.id_layanan_pendaftaran 
			left join sm_pendaftaran pd ON pd.id = lp.id_pendaftaran 
			where lp.id_pendaftaran = '" . $id_daftar . "'
			 
			and d.prioritas = 'Sekunder'
			and d.diagnosa_manual = '1'";
		return $this->db->query($sql)->result();
	}

	function getTindakanLaboratorium($id_layanan_pendaftaran)
	{
		$sql = " SELECT concat( case when dlab.id_pengkodean is null then '' else '[' end, ( SELECT tp.code FROM sm_icd_ix AS tp WHERE tp.ID = dlab.id_pengkodean ), case when dlab.id_pengkodean is null then '' else '] ' end, pl.nama) as nama 
					
			from sm_detail_laboratorium as dlab
			join sm_laboratorium as lab ON ( lab.id = dlab.id_laboratorium )
			join sm_order_laboratorium as olab ON ( olab.id = lab.id_order_laboratorium )
			join sm_tarif_pelayanan as tpl ON (tpl.id = dlab.id_tarif)
			join sm_layanan as pl ON (pl.id = tpl.id_layanan)
			where lab.id_layanan_pendaftaran = '" . $id_layanan_pendaftaran . "'";
		return $this->db->query($sql)->result();
	}

	function getTindakanRadiologi($id_layanan_pendaftaran)
	{
		$sql = " SELECT concat( case when drad.id_pengkodean is null then '' else '[' end, ( SELECT tp.code FROM sm_icd_ix AS tp WHERE tp.ID = drad.id_pengkodean ), case when drad.id_pengkodean is null then '' else '] ' end, pl.nama) as nama 
					
			from sm_detail_radiologi as drad
			join sm_radiologi as rad ON ( rad.id = drad.id_radiologi )
			join sm_order_radiologi as orad ON ( orad.id = rad.id_order_radiologi )
			join sm_tarif_pelayanan as tpl ON (tpl.id = drad.id_tarif)
			join sm_layanan as pl ON (pl.id = tpl.id_layanan)
			where rad.id_layanan_pendaftaran = '" . $id_layanan_pendaftaran . "'";
		return $this->db->query($sql)->result();
	}

	function getTindakanOperasi($id_daftar)
	{
		$sql = " SELECT concat( case when too.id_pengkodean is null then '' else '[' end, ( SELECT tp.code FROM sm_icd_ix AS tp WHERE tp.ID = too.id_pengkodean ), case when too.id_pengkodean is null then '' else '] ' end, pl.nama) as nama 
					
			from sm_tarif_operasi as too
			left join sm_jadwal_kamar_operasi as jko ON ( jko.id = too.id_operasi )
			left join sm_tarif_pelayanan as tpl ON (tpl.id = too.id_tarif)

			left join sm_tenaga_medis as tm ON (too.id_nadis = tm.id)
			left join sm_profesi_nadis as pn ON (tm.id_profesi = pn.id)

			left join sm_layanan as pl ON (pl.id = tpl.id_layanan)
			left join sm_layanan_pendaftaran lp ON lp.id = jko.id_layanan_pendaftaran 
			left join sm_pendaftaran pd ON pd.id = lp.id_pendaftaran 
			where (tm.id_profesi IN ('8', '10') or tm.id_profesi is null) and lp.id_pendaftaran = '" . $id_daftar . "'";
		return $this->db->query($sql)->result();
	}

	function getTindakan($id_daftar)
	{
		$sql = " SELECT DISTINCT concat( case when ttp.id_pengkodean is null then '' else '[' end, ( SELECT tp.code FROM sm_icd_ix AS tp WHERE tp.ID = ttp.id_pengkodean ), case when ttp.id_pengkodean is null then '' else '] ' end, pl.nama) as nama 
					
			from sm_tarif_tindakan_pasien as ttp
			left join sm_tarif_pelayanan as tpl ON (tpl.id = ttp.id_tarif_pelayanan)
						
			left join sm_tenaga_medis as tm ON (ttp.id_operator = tm.id)
			left join sm_profesi_nadis as pn ON (tm.id_profesi = pn.id)
						
			left join sm_layanan as pl ON (pl.id = tpl.id_layanan)
			left join sm_layanan_pendaftaran lp ON lp.id = ttp.id_layanan_pendaftaran 
			left join sm_pendaftaran pd ON pd.id = lp.id_pendaftaran 
			where (tm.id_profesi IN ('8', '10') or tm.id_profesi is null) and lp.id_pendaftaran = '" . $id_daftar . "'";
		return $this->db->query($sql)->result();
	}

	function getDataPengkajianMedisIGDById($id, $id_pendaftaran)
	{
		$this->db->select("p.*, lpd.id id_layanan_igd,
                            coalesce(pd.nama, '') as pendidikan,
                            coalesce(pk.nama, '') as pekerjaan,
							(select nama from sm_penjamin where id=pnd.id_penjamin) penjamin")
			->from('sm_pasien as p')
			->join('sm_pendidikan as pd', 'pd.id = p.id_pendidikan')
			->join('sm_pekerjaan as pk', 'pk.id = p.id_pekerjaan', 'left')
			->join('sm_pendaftaran pnd', 'p.id = pnd.id_pasien', 'left')
			->join('sm_layanan_pendaftaran lpd', "pnd.id=lpd.id_pendaftaran and jenis_layanan='IGD' and status_terlayani='Sudah'", 'left')
			->where('p.id', $id, true)
			->where('pnd.id', $id_pendaftaran, true);

		// $this->db->get(); echo $this->db->last_query(); exit();
		$result = $this->db->get()->row();
		$this->db->close();
		return $result;
	}

	function deleteTerapiPulangRM($id)
	{
		return $this->db->where("id", $id)->delete("sm_resume_medis_terapi_pulang");
	}
	function deleteTerapiPulangKeperawatan($id)
	{
		return $this->db->where("id", $id)->delete("sm_terapi_pulang");
	}

	function updateJadwalKontrolResumeMedis($data)
	{
		if (is_array($data['tanggal_kontrol'])) :
			foreach ($data['tanggal_kontrol'] as $i => $value) :
				$data_kontrol = array(
					'id_layanan_pendaftaran' => $data['id_layanan_pendaftaran'],
					'id_pendaftaran'         => $data['id_pendaftaran'],
					'tanggal_kontrol'        => $value,
					'id_ek_nama_dokter'      => $data['id_ek_nama_dokter'][$i],
					'id_users'               => $data['id_users'][$i],
					'tempat_kontrol'         => $data['tempat_kontrol'][$i],
					'created_date'           => $this->datetime,
				);

				$this->db->insert('sm_resume_medis_kontrol_ranap', $data_kontrol);
			endforeach;
		endif;
	}

	function insertJadwalKontrolKeperawatan($data)
	{
		foreach ($data['tanggal_kontrol'] as $i => $value) {
			$data_kontrol = [
				'id_layanan_pendaftaran' => $data['id_layanan_pendaftaran'],
				'tanggal'                => $value,
				'id_ek_nama_dokter'      => $data['id_ek_nama_dokter'][$i],
				'user'                   => $data['id_users'][$i],
				'tempat_kontrol'         => $data['tempat_kontrol'][$i],
				'created_date'           => $this->datetime,
			];
			$this->db->insert('sm_jadwal_kontrol_keperawatan', $data_kontrol);
		}
	}

	function deleteKontrolKembaliRM($id)
	{
		return $this->db->where("id", $id)->delete("sm_resume_medis_kontrol_ranap");
	}

	function deleteKontrolKembaliKeperawatan($id)
	{
		return $this->db->where("id", $id)->delete("sm_jadwal_kontrol_keperawatan");
	}


	// PAKDK
	function getKajianKebidanan($id_pendaftaran)
	{
		return $this->db->select('pakdk.*, pgp.nama as bidan, pgd.nama as dokter')
			->from('sm_pengkajian_awal_kebidanan_dan_kandungan as pakdk')
			->join('sm_layanan_pendaftaran as lp', 'lp.id = pakdk.id_layanan_pendaftaran')
			->join('sm_tenaga_medis as tmp', 'tmp.id = pakdk.id_bidan', 'left')
			->join('sm_pegawai as pgp', 'pgp.id = tmp.id_pegawai', 'left')
			->join('sm_tenaga_medis as tmd', 'tmd.id = pakdk.id_dokter', 'left')
			->join('sm_pegawai as pgd', 'pgd.id = tmd.id_pegawai', 'left')
			->where('lp.id_pendaftaran', $id_pendaftaran, true)
			->get()
			->row();
	}

	// PAKDK LOGS
	function getKajianKebidananLogs($id_pendaftaran)
	{
		return $this->db->select('pakdk.*, pgp.nama as bidan, pgd.nama as dokter, pgu.nama as user')
			->from('sm_pengkajian_awal_kebidanan_dan_kandungan_logs as pakdk')
			->join('sm_layanan_pendaftaran as lp', 'lp.id = pakdk.id_layanan_pendaftaran')
			->join('sm_tenaga_medis as tmp', 'tmp.id = pakdk.id_bidan', 'left')
			->join('sm_pegawai as pgp', 'pgp.id = tmp.id_pegawai', 'left')
			->join('sm_tenaga_medis as tmd', 'tmd.id = pakdk.id_dokter', 'left')
			->join('sm_pegawai as pgd', 'pgd.id = tmd.id_pegawai', 'left')
			->join('sm_translucent as tr', 'tr.id = pakdk.id_users', 'left')
			->join('sm_pegawai as pgu', 'pgu.id = tr.id', 'left')
			->where('lp.id_pendaftaran', $id_pendaftaran, true)
			->get()
			->result();
	}



	// PAKDKM
	function getKajianMedisKebidanan($id_pendaftaran)
	{
		return $this->db->select('pakdk.*, pgd.nama as dpjp, pgdp.nama as dokter')
			->from('sm_pengkajian_medis_awal_kebidanan_dan_kandungan as pakdk')
			->join('sm_layanan_pendaftaran as lp', 'lp.id = pakdk.id_layanan_pendaftaran')
			->join('sm_tenaga_medis as tmd', 'tmd.id = pakdk.ttd_medis_dpjp', 'left')
			->join('sm_pegawai as pgd', 'pgd.id = tmd.id_pegawai', 'left')
			->join('sm_tenaga_medis as tmdp', 'tmdp.id = pakdk.ttd_medis_dokter', 'left')
			->join('sm_pegawai as pgdp', 'pgdp.id = tmdp.id_pegawai', 'left')
			->where('lp.id_pendaftaran', $id_pendaftaran, true)
			->get()
			->row();
	}




	// PAKDKM LOGS
	function getKajianMedisKebidananLogs($id_pendaftaran)
	{
		return $this->db->select('pmakdk.*, pgd.nama as dpjp, pgdp.nama as dokter, pgu.nama as user')
			->from('sm_pengkajian_medis_awal_kebidanan_dan_kandungan_logs as pmakdk')
			->join('sm_layanan_pendaftaran as lp', 'lp.id = pmakdk.id_layanan_pendaftaran')
			->join('sm_tenaga_medis as tmd', 'tmd.id = pmakdk.ttd_medis_dpjp', 'left')
			->join('sm_pegawai as pgd', 'pgd.id = tmd.id_pegawai', 'left')
			->join('sm_tenaga_medis as tmdp', 'tmdp.id = pmakdk.ttd_medis_dokter', 'left')
			->join('sm_pegawai as pgdp', 'pgdp.id = tmdp.id_pegawai', 'left')
			->join('sm_translucent as tr', 'tr.id = pmakdk.id_users', 'left')
			->join('sm_pegawai as pgu', 'pgu.id = tr.id', 'left')
			->where('lp.id_pendaftaran', $id_pendaftaran, true)
			->get()
			->result();
	}


	// UPDATE // PAKDK  //PAKDKM
	function updatePengkajianAwalKebidanan($data_kajian_kebidanan, $data_kajian_medis_kebidanan, $id_kajian_kebidanan, $id_kajian_medis_kebidanan)
	{
		$datetime = date('Y-m-d H:i:s');
		if ($id_kajian_kebidanan === '' || $id_kajian_medis_kebidanan === '') {
			$data_kajian_kebidanan['created_date'] = $datetime;
			$data_kajian_medis_kebidanan['created_date'] = $datetime;

			$this->db->insert('sm_pengkajian_awal_kebidanan_dan_kandungan', $data_kajian_kebidanan);
			$this->db->insert('sm_pengkajian_medis_awal_kebidanan_dan_kandungan', $data_kajian_medis_kebidanan);
			return ['status' => true, 'message' => 'Berhasil Menambahkan Data Kebidanan'];
		} else {
			$data_before_kebidanan = $this->db->select("*, '' as id_users, '' as tanggal_ubah_kebidanan")->from('sm_pengkajian_awal_kebidanan_dan_kandungan')->where('id', $id_kajian_kebidanan)->get()->row();
			$data_before_kebidanan_medis = $this->db->select("*, '' as id_users, '' as tanggal_ubah_kebidanan")->from('sm_pengkajian_medis_awal_kebidanan_dan_kandungan')->where('id', $id_kajian_medis_kebidanan)->get()->row();

			unset($data_before_kebidanan->id);
			$data_before_kebidanan->id_users = $this->session->userdata('id_translucent');
			$data_before_kebidanan->tanggal_ubah_kebidanan = $datetime;

			unset($data_before_kebidanan_medis->id);
			$data_before_kebidanan_medis->id_users = $this->session->userdata('id_translucent');
			$data_before_kebidanan_medis->tanggal_ubah_kebidanan = $datetime;

			$data_kajian_kebidanan['updated_date'] = $datetime;
			$data_kajian_medis_kebidanan['updated_date'] = $datetime;

			$this->db->set($data_kajian_kebidanan)->where('id', $id_kajian_kebidanan)->update('sm_pengkajian_awal_kebidanan_dan_kandungan');
			$this->db->set($data_kajian_medis_kebidanan)->where('id', $id_kajian_medis_kebidanan)->update('sm_pengkajian_medis_awal_kebidanan_dan_kandungan');

			$this->db->insert('sm_pengkajian_awal_kebidanan_dan_kandungan_logs', $data_before_kebidanan);
			$this->db->insert('sm_pengkajian_medis_awal_kebidanan_dan_kandungan_logs', $data_before_kebidanan_medis);

			return ['status' => true, 'message' => 'Berhasil Mengubah Data Kebidanan'];
		}
	}














	// PAN
	function getKajianNeonatus($id_pendaftaran)
	{
		return $this->db->select('pan.*, pgp.nama as perawat, pgd.nama as verifikator_dpjp')
			->from('sm_pengkajian_awal_neonatus as pan')
			->join('sm_layanan_pendaftaran as lp', 'lp.id = pan.id_layanan_pendaftaran')
			->join('sm_tenaga_medis as tmp', 'tmp.id = pan.id_perawat', 'left')
			->join('sm_pegawai as pgp', 'pgp.id = tmp.id_pegawai', 'left')
			->join('sm_tenaga_medis as tmd', 'tmd.id = pan.id_dokter', 'left')
			->join('sm_pegawai as pgd', 'pgd.id = tmd.id_pegawai', 'left')
			->where('lp.id_pendaftaran', $id_pendaftaran, true)
			->get()
			->row();
	}

	// PAN LOGS
	function getKajianNeonatusLogs($id_pendaftaran)
	{
		return $this->db->select('pan.*, pman.*, pgp.nama as perawat, pgd.nama as verifikator_dpjp, pgu.nama as user')
			->from('sm_pengkajian_awal_neonatus_logs as pan')
			->join('sm_layanan_pendaftaran as lp', 'lp.id = pan.id_layanan_pendaftaran')
			->join('sm_pengkajian_medis_awal_neonatus as pman', 'pman.id_layanan_pendaftaran = pan.id_layanan_pendaftaran', 'left')
			->join('sm_tenaga_medis as tmp', 'tmp.id = pan.id_perawat', 'left')
			->join('sm_pegawai as pgp', 'pgp.id = tmp.id_pegawai', 'left')
			->join('sm_tenaga_medis as tmd', 'tmd.id = pan.id_dokter', 'left')
			->join('sm_pegawai as pgd', 'pgd.id = tmd.id_pegawai', 'left')
			->join('sm_translucent as tr', 'tr.id = pan.id_users', 'left')
			->join('sm_pegawai as pgu', 'pgu.id = tr.id', 'left')
			->where('lp.id_pendaftaran', $id_pendaftaran, true)
			->get()
			->result();
	}

	// PANM
	function getKajianMedisNeonatus($id_pendaftaran)
	{
		return $this->db->select('pman.*, pgd.nama as dokter_dpjp, pgdp.nama as dokter_pengkajian')
			->from('sm_pengkajian_medis_awal_neonatus as pman')
			->join('sm_layanan_pendaftaran as lp', 'lp.id = pman.id_layanan_pendaftaran')
			->join('sm_tenaga_medis as tmd', 'tmd.id = pman.id_dokter_dpjp', 'left')
			->join('sm_pegawai as pgd', 'pgd.id = tmd.id_pegawai', 'left')
			->join('sm_tenaga_medis as tmdp', 'tmdp.id = pman.id_dokter_pengkajian', 'left')
			->join('sm_pegawai as pgdp', 'pgdp.id = tmdp.id_pegawai', 'left')
			->where('lp.id_pendaftaran', $id_pendaftaran, true)
			->get()
			->row();
	}

	// PANM LOGS 
	function getKajianMedisNeonatusLogs($id_pendaftaran)
	{
		return $this->db->select('pman.*, pgd.nama as dokter_dpjp, pgdp.nama as dokter_pengkajian, pgu.nama as user')
			->from('sm_pengkajian_medis_awal_neonatus_logs as pman')
			->join('sm_layanan_pendaftaran as lp', 'lp.id = pman.id_layanan_pendaftaran')
			->join('sm_tenaga_medis as tmd', 'tmd.id = pman.id_dokter_dpjp', 'left')
			->join('sm_pegawai as pgd', 'pgd.id = tmd.id_pegawai', 'left')
			->join('sm_tenaga_medis as tmdp', 'tmdp.id = pman.id_dokter_pengkajian', 'left')
			->join('sm_pegawai as pgdp', 'pgdp.id = tmdp.id_pegawai', 'left')
			->join('sm_translucent as tr', 'tr.id = pman.id_users', 'left')
			->join('sm_pegawai as pgu', 'pgu.id = tr.id', 'left')
			->where('lp.id_pendaftaran', $id_pendaftaran, true)
			->get()
			->result();
	}

	// PANM
	// function updatePengkajianAwalNeonatus($data_kajian_neonatus, $data_kajian_medis_neonatus, $id_kajian_neonatus, $id_kajian_medis_neonatus){
	// 	$datetime = date('Y-m-d H:i:s'); // Mendapatkan waktu saat ini untuk digunakan sebagai timestamp.

	// 	// Jika salah satu ID kosong, anggap sebagai operasi insert
	// 	if (empty($id_kajian_neonatus) || empty($id_kajian_medis_neonatus)) {
	// 		$data_kajian_neonatus['created_date'] = $datetime; // Tambahkan waktu pembuatan data.
	// 		$data_kajian_medis_neonatus['created_date'] = $datetime; // Tambahkan waktu pembuatan data medis.

	// 		$this->db->insert('sm_pengkajian_awal_neonatus', $data_kajian_neonatus); // Masukkan data ke tabel pengkajian awal neonatus.
	// 		$this->db->insert('sm_pengkajian_medis_awal_neonatus', $data_kajian_medis_neonatus); // Masukkan data ke tabel pengkajian medis awal neonatus.
	// 		return ['status' => true, 'message' => 'Berhasil Menambahkan Data Pengkajian']; // Berikan pesan sukses.
	// 	}

	// 	// Pastikan kedua ID memiliki nilai valid
	// 	if (!is_numeric($id_kajian_neonatus) || !is_numeric($id_kajian_medis_neonatus)) {
	// 		return ['status' => false, 'message' => 'ID tidak valid']; // Jika ID tidak valid, berikan pesan error.
	// 	}

	// 	// Ambil data sebelumnya untuk log
	// 	$data_before_neonatus = $this->db->select("*, '' as id_users, '' as tanggal_ubah_neonatus")
	// 		->from('sm_pengkajian_awal_neonatus')
	// 		->where('id', $id_kajian_neonatus)
	// 		->get()
	// 		->row(); // Ambil data pengkajian awal neonatus berdasarkan ID.

	// 	$data_before_neonatus_medis = $this->db->select("*, '' as id_users, '' as tanggal_ubah_neonatus")
	// 		->from('sm_pengkajian_medis_awal_neonatus')
	// 		->where('id', $id_kajian_medis_neonatus)
	// 		->get()
	// 		->row(); // Ambil data pengkajian medis awal neonatus berdasarkan ID.

	// 	// Pastikan data sebelumnya ditemukan
	// 	if (!$data_before_neonatus || !$data_before_neonatus_medis) {
	// 		return ['status' => false, 'message' => 'Data tidak ditemukan']; // Jika data tidak ditemukan, berikan pesan error.
	// 	}

	// 	unset($data_before_neonatus->id); // Hapus ID dari data sebelumnya untuk log.
	// 	$data_before_neonatus->id_users = $this->session->userdata('id_translucent'); // Tambahkan ID pengguna yang mengubah data.
	// 	$data_before_neonatus->tanggal_ubah_neonatus = $datetime; // Tambahkan waktu perubahan.

	// 	unset($data_before_neonatus_medis->id); // Hapus ID dari data medis sebelumnya untuk log.
	// 	$data_before_neonatus_medis->id_users = $this->session->userdata('id_translucent'); // Tambahkan ID pengguna yang mengubah data medis.
	// 	$data_before_neonatus_medis->tanggal_ubah_neonatus = $datetime; // Tambahkan waktu perubahan data medis.

	// 	$data_kajian_neonatus['updated_date'] = $datetime; // Tambahkan waktu update ke data baru.
	// 	$data_kajian_medis_neonatus['updated_date'] = $datetime; // Tambahkan waktu update ke data medis baru.

	// 	$this->db->set($data_kajian_neonatus)->where('id', $id_kajian_neonatus)->update('sm_pengkajian_awal_neonatus'); // Update data pengkajian awal neonatus.
	// 	$this->db->set($data_kajian_medis_neonatus)->where('id', $id_kajian_medis_neonatus)->update('sm_pengkajian_medis_awal_neonatus'); // Update data pengkajian medis awal neonatus.

	// 	$this->db->insert('sm_pengkajian_awal_neonatus_logs', $data_before_neonatus); // Simpan data sebelumnya ke tabel log.
	// 	$this->db->insert('sm_pengkajian_medis_awal_neonatus_logs', $data_before_neonatus_medis); // Simpan data medis sebelumnya ke tabel log.

	// 	return ['status' => true, 'message' => 'Berhasil Mengubah Data Pengkajian']; // Berikan pesan sukses.
	// }

	function updatePengkajianAwalNeonatus($data_kajian_neonatus, $data_kajian_medis_neonatus, $id_kajian_neonatus, $id_kajian_medis_neonatus)
	{
		$datetime = date('Y-m-d H:i:s'); // Ambil waktu sekarang untuk digunakan sebagai timestamp

		// Cek apakah ini operasi insert (jika salah satu ID kosong)
		if (empty($id_kajian_neonatus) || empty($id_kajian_medis_neonatus)) {
			$data_kajian_neonatus['created_date'] = $datetime; // Tambahkan timestamp saat data dibuat
			$data_kajian_medis_neonatus['created_date'] = $datetime; // Tambahkan timestamp saat data dibuat

			// Masukkan data baru ke tabel utama
			$this->db->insert('sm_pengkajian_awal_neonatus', $data_kajian_neonatus);
			$this->db->insert('sm_pengkajian_medis_awal_neonatus', $data_kajian_medis_neonatus);

			return ['status' => true, 'message' => 'Berhasil Menambahkan Data Neonatus'];
		}

		// Validasi ID harus berupa angka (numeric)
		if (!is_numeric($id_kajian_neonatus) || !is_numeric($id_kajian_medis_neonatus)) {
			return ['status' => false, 'message' => 'ID tidak valid']; // Jika ID bukan angka, hentikan proses
		}

		// Ambil data lama sebelum di-update untuk disimpan ke log
		$data_before_neonatus = $this->db->select("*")
			->from('sm_pengkajian_awal_neonatus')
			->where('id', $id_kajian_neonatus)
			->get()
			->row_array(); // Mengambil data pengkajian awal neonatus sebelum diubah

		$data_before_neonatus_medis = $this->db->select("*")
			->from('sm_pengkajian_medis_awal_neonatus')
			->where('id', $id_kajian_medis_neonatus)
			->get()
			->row_array(); // Mengambil data pengkajian medis awal neonatus sebelum diubah

		// Jika data tidak ditemukan, kembalikan pesan error
		if (!$data_before_neonatus || !$data_before_neonatus_medis) {
			return ['status' => false, 'message' => 'Data tidak ditemukan'];
		}

		// Hapus ID sebelum insert ke log, agar tidak bentrok dengan primary key
		unset($data_before_neonatus['id']);
		unset($data_before_neonatus_medis['id']);

		// Tambahkan informasi pengguna dan waktu perubahan ke data lama sebelum dimasukkan ke log
		$data_before_neonatus['id_users'] = $this->session->userdata('id_translucent'); // ID pengguna yang mengubah data
		$data_before_neonatus['tanggal_ubah_neonatus'] = $datetime; // Timestamp perubahan

		$data_before_neonatus_medis['id_users'] = $this->session->userdata('id_translucent'); // ID pengguna yang mengubah data medis
		$data_before_neonatus_medis['tanggal_ubah_neonatus'] = $datetime; // Timestamp perubahan

		// Simpan data lama ke tabel log sebelum melakukan update
		$this->db->insert('sm_pengkajian_awal_neonatus_logs', $data_before_neonatus);
		$this->db->insert('sm_pengkajian_medis_awal_neonatus_logs', $data_before_neonatus_medis);

		// Tambahkan timestamp update ke data baru
		$data_kajian_neonatus['updated_date'] = $datetime;
		$data_kajian_medis_neonatus['updated_date'] = $datetime;

		// Update data baru ke tabel utama berdasarkan ID
		$this->db->where('id', $id_kajian_neonatus)->update('sm_pengkajian_awal_neonatus', $data_kajian_neonatus);
		$this->db->where('id', $id_kajian_medis_neonatus)->update('sm_pengkajian_medis_awal_neonatus', $data_kajian_medis_neonatus);

		return ['status' => true, 'message' => 'Berhasil Mengubah Data Neonatus'];
	}


	// SURAT KENAL LAHIR
	function getSuratKenalLahir($id_pendaftaran)
	{
		// var_dump($id_pendaftaran);
		$sql = "select skl.*, pa.nama as nama_pasien, pd.no_register, pa.telp, sp1.nama as nama_dokter, sp2.nama as nama_bidan, sp3.nama as nama_skl_2
				from sm_surat_kenal_lahir skl		
				join sm_pendaftaran pd ON skl.id_pendaftaran = pd.id
				join sm_pasien pa ON pd.id_pasien = pa.id
				left join sm_tenaga_medis stm1 ON skl.id_dokter = stm1.id
				left join sm_pegawai sp1 ON stm1.id_pegawai = sp1.id
				left join sm_tenaga_medis stm2 ON skl.id_bidan = stm2.id
				left join sm_pegawai sp2 ON stm2.id_pegawai = sp2.id
				left join sm_tenaga_medis stm3 ON skl.id_ttd_skl = stm3.id
				left join sm_pegawai sp3 ON stm3.id_pegawai = sp3.id
				where skl.id_pendaftaran = '" . $id_pendaftaran . "' ";
		return $this->db->query($sql)->row();
	}

	// CPPRI WH
	function getChecklistPenerimaanPasienRawatInapById($id)
	{
		$sql = "select fcpri.*, pa.nama as nama_pasien, pa.kelamin as kelamin_pasien, pd.id_pasien, pa.tanggal_lahir as tanggal_lahir_pasien, pa.telp, (SELECT CONCAT(bg.nama, ' kelas ', k.nama, ' ruang ', ri.no_ruang, ' No. Bed ', ri.no_bed) FROM sm_rawat_inap as ri JOIN sm_layanan_pendaftaran as lpd ON lpd.id = ri.id_layanan_pendaftaran JOIN sm_bangsal as bg ON bg.id = ri.id_bangsal JOIN sm_kelas as k ON k.id= ri.id_kelas WHERE ri.id_layanan_pendaftaran = '" . $id . "') AS asal_ruangan
				from sm_form_checklist_penerimaan_pasien_rawat_inap fcpri 							
				join sm_layanan_pendaftaran lp ON fcpri.id_layanan_pendaftaran = lp.id
				join sm_pendaftaran pd ON lp.id_pendaftaran = pd.id
				join sm_pasien pa ON pd.id_pasien = pa.id
				where fcpri.id_layanan_pendaftaran = '" . $id . "' ";

		return $this->db->query($sql)->result();
	}




	// SPPRAPS WH 
	//  join sm_bangsal bs ON sppraps.kelas_sppraps = bs.id
	// join sm_rawat_inap ri ON ri.id_layanan_pendaftaran = lp.id
	// join sm_bangsal bs ON ri.id_bangsal = bs.id
	// join sm_bangsal bs ON sppraps.kelas_sppraps = bs.id
	function getSuratPeryataanPulangAtasPermintaanSendiriById($id)
	{
		$sql = "select sppraps.*, pa.nama as nama_pasien, pa.kelamin as kelamin_pasien, pd.id_pasien, 
								pa.tanggal_lahir as tanggal_lahir_pasien, date_part('year',age(pa.tanggal_lahir)) as umur_pasien, 
								pa.alamat as alamat_pasien, pa.no_rt, pa.no_rw, pa.nama_kel, pa.nama_kec, pa.nama_kab, pa.id as no_rm, 
								pa.no_identitas, pa.telp,  bs.nama as nama_bangsal, sp1.nama as dokter_1, sp2.nama as dokter_2
				from sm_surat_peryataan_pulang_rawat_atas_permintaan_sendiri sppraps 							
				join sm_layanan_pendaftaran lp ON sppraps.id_layanan_pendaftaran = lp.id
				join sm_pendaftaran pd ON lp.id_pendaftaran = pd.id
				join sm_pasien pa ON pd.id_pasien = pa.id
				join sm_bangsal bs ON sppraps.kelas_sppraps = bs.id
				join sm_tenaga_medis stm1 ON sppraps.dokter_sppraps = stm1.id
				join sm_pegawai sp1 ON stm1.id_pegawai = sp1.id
				join sm_tenaga_medis stm2 ON sppraps.ttd_dokter_sppraps = stm2.id
				join sm_pegawai sp2 ON stm2.id_pegawai = sp2.id
				where lp.id_pendaftaran = '" . $id . "' ";
		return $this->db->query($sql)->row();
	}


	// SPPRAPS WH 
	function getAutoKamar($q, $start, $limit)
	{
		$limit = " limit " . $limit . " offset " . $start;
		$select = "select id, nama ";
		// $count = "select count(ru.id) as count ";
		$sql = "from sm_bangsal
                where nama ilike ('%" . $q . "%') 
                order by nama";
		$data["data"] = $this->db->query($select . $sql . $limit)->result();
		$data["total"] = $this->db->query($select . $sql)->num_rows();
		$this->db->close();
		return $data;
	}

	public function getDPJP($id_layanan_pendaftaran)
	{
		return $this->db->select('pg.nama as dokter, pg.tanda_tangan')
			->from('sm_layanan_pendaftaran as lp')
			->join('sm_tenaga_medis as tm', 'tm.id = lp.id_dokter', 'left')
			->join('sm_pegawai as pg', 'pg.id = tm.id_pegawai', 'left')
			->where('lp.id', $id_layanan_pendaftaran, true)
			->get()
			->row();
	}

	public function cekCPPT($id_pendaftaran)
	{
		$this->db->select('cpt.id');
		$this->db->from('sm_cppt AS cpt');
		$this->db->join('sm_layanan_pendaftaran AS lp', 'cpt.id_layanan_pendaftaran = lp.id', 'left');
		$this->db->where('lp.id_pendaftaran', $id_pendaftaran);
		$this->db->limit(1);

		$query = $this->db->get();

		if ($query->num_rows() > 0) {
			return $query->row()->id;
		} else {
			return NULL;
		}
	}

	public function cekHasilRadiologi($id_pendaftaran)
	{
		$this->db->select('rd.id');
		$this->db->from('sm_radiologi AS rd');
		$this->db->join('sm_layanan_pendaftaran AS lp', 'rd.id_layanan_pendaftaran = lp.id', 'left');
		$this->db->where('lp.id_pendaftaran', $id_pendaftaran);
		$this->db->limit(1);

		$query = $this->db->get();

		if ($query->num_rows() > 0) {
			return $query->row()->id;
		} else {
			return NULL;
		}
	}

	public function cekHasilLaboratorium($id_pendaftaran)
	{
		$sql = "
        SELECT DISTINCT itdl.ono, lb.*
        FROM sm_laboratorium AS lb
        JOIN sm_layanan_pendaftaran AS lp ON lb.id_layanan_pendaftaran = lp.id
        LEFT JOIN sm_item_detail_laboratorium AS itdl ON itdl.id_lab = lb.id
        WHERE lp.id_pendaftaran = ?
        LIMIT 1
     ";

		$query = $this->db->query($sql, array($id_pendaftaran));

		if ($query->num_rows() > 0) {
			return $query->row()->id;
		} else {
			return NULL;
		}
	}

	// PPPK
	function getPengkajianPasienPopulasiKhusus($id_pendaftaran)
	{
		return $this->db->select('pppk.*, pgp.nama as perawat')
			->from('sm_pengkajian_pasien_populasi_khusus as pppk')
			->join('sm_layanan_pendaftaran as lp', 'lp.id = pppk.id_layanan_pendaftaran')
			->join('sm_tenaga_medis as tmp', 'tmp.id = pppk.perawatpkkk', 'left')
			->join('sm_pegawai as pgp', 'pgp.id = tmp.id_pegawai', 'left')
			->where('lp.id_pendaftaran', $id_pendaftaran, true)
			->get()
			->row();
	}

	// PPPK LOGS
	function getPengkajianPasienPopulasiKhususLogs($id_pendaftaran)
	{
		return $this->db->select('pppk.*, pgp.nama as perawat, pgu.nama as user')
			->from('sm_pengkajian_pasien_populasi_khusus_logs as pppk')
			->join('sm_layanan_pendaftaran as lp', 'lp.id = pppk.id_layanan_pendaftaran')
			->join('sm_tenaga_medis as tmp', 'tmp.id = pppk.perawatpkkk', 'left')
			->join('sm_pegawai as pgp', 'pgp.id = tmp.id_pegawai', 'left')
			->join('sm_translucent as tr', 'tr.id = pppk.id_users', 'left')
			->join('sm_pegawai as pgu', 'pgu.id = tr.id', 'left')
			->where('lp.id_pendaftaran', $id_pendaftaran, true)
			->get()
			->result();
	}

	// PPPK
	function updatePengkajianPasienPopulasiKhusus($data_populasi, $id_pppk)
	{
		$datetime = date('Y-m-d H:i:s');
		if ($id_pppk === '') {
			$data_populasi['created_date'] = $datetime;
			$this->db->insert('sm_pengkajian_pasien_populasi_khusus', $data_populasi);
			return ['status' => true, 'message' => 'Berhasil Menambahkan Data'];
		} else {
			$data_before_pppk = $this->db->select("*, '' as id_users, '' as tanggal_ubah_pkkk")->from('sm_pengkajian_pasien_populasi_khusus')->where('id', $id_pppk)->get()->row();
			unset($data_before_pppk->id);
			$data_before_pppk->id_users = $this->session->userdata('id_translucent');
			$data_before_pppk->tanggal_ubah_pkkk = $datetime;
			$data_populasi['updated_date'] = $datetime;
			$this->db->set($data_populasi)->where('id', $id_pppk)->update('sm_pengkajian_pasien_populasi_khusus');
			$this->db->insert('sm_pengkajian_pasien_populasi_khusus_logs', $data_before_pppk);
			return ['status' => true, 'message' => 'Berhasil Mengubah Data'];
		}
	}
}
