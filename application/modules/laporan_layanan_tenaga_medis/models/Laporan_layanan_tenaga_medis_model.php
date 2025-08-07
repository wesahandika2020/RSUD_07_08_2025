<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_layanan_tenaga_medis_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

//	public function getListLaporanLayananTenagaMedis($limit, $start, $search)
//	{
//		$param = "";
//		$param1 = "";
//		$limitation = "";
//		$join = "";
//
//		switch ($search["periode_laporan"]) {
//			case "Harian":
//				if (!empty($search["tanggal_harian"])) {
//					$param .= " and to_char( sp.tanggal_daftar, 'yyyy-mm-dd' ) ilike '%" . date2mysql($search['tanggal_harian']) . "' ";
//				}
//				break;
//			case "Bulanan":
//				if (!empty($search["bulan"]) && !empty($search["tahun"])) {
//					$param .= " and to_char(sp.tanggal_daftar, 'MM-YYYY') = '" . $search["bulan"] . "-" . $search["tahun"] . "' ";
//				}
//				break;
//			case "Rentang Waktu":
//				if (!empty($search["tanggal_awal"]) && !empty($search["tanggal_akhir"])) {
//					$param .= " and sp.tanggal_daftar BETWEEN '" . date2mysql($search['tanggal_awal']) . " 00:00:00' AND '" . date2mysql($search['tanggal_akhir']) . " 23:59:59'";
//				}
//				break;
//		}
//
//		if ($search['tenaga_medis'] !== "") {
//			$param1 .= " and stm.id = '" . $search['tenaga_medis'] . "' ";
//		}
//
//		if ($search["tempat_layanan_1"] !== "") {
//			$param .= " and spes.nama = '" . $search["tempat_layanan_1"] . "' ";
//		}
//
//		if ($search["tempat_layanan_2"] !== "" && !($search["tempat_layanan_2"] === 'VK' || $search["tempat_layanan_2"] === 'OK')) {
//			$join = "
//			LEFT JOIN sm_rawat_inap ra ON ra.id_layanan_pendaftaran = lp.id
//	     	LEFT JOIN sm_intensive_care ic ON lp.id = ic.id_layanan_pendaftaran
//	     	LEFT JOIN sm_bangsal b ON b.id = ra.id_bangsal
//	     	LEFT JOIN sm_bangsal b2 ON b2.id = ic.id_bangsal
//			";
//			$param .= " and b.nama = '" . $search["tempat_layanan_2"] . "' ";
//			$param .= " or b2.nama = '" . $search["tempat_layanan_2"] . "' ";
//		}
//
//		if ($search["tempat_layanan_2"] !== "" && ($search["tempat_layanan_2"] === 'VK' || $search["tempat_layanan_2"] === 'OK')) {
//			$join = " left join sm_jadwal_kamar_operasi jko on jko.id_layanan_pendaftaran = lp.id ";
//
//			$param .= " and jko.layanan = '" . $search["tempat_layanan_2"] . "' ";
//			$param .= " and jko.status != 'Canceled'";
//		}
//
//		if ($search["tempat_layanan_3"] !== "") {
//			if ($search["tempat_layanan_3"] === 'Patologi Anatomi' || $search["tempat_layanan_3"] === 'Patologi Klinik' || $search["tempat_layanan_3"] === 'Patologi Mikrobiologi') {
//				$param .= " and lab.jenis = '" . $search["tempat_layanan_3"] . "' ";
//			}
//			if ($search["tempat_layanan_3"] === 'Hemodialisa') {
//				$param .= " and slp.jenis_layanan = 'Hemodialisa' ";
//			}
//			if ($search["tempat_layanan_3"] === 'Radiologi') {
//				$param .= " and rad.jenis = '" . $search["tempat_layanan_3"] . "' ";
//			}
//		}
//
//		if ($search["jenis_rawat"] === "1") {
//			$param .= " and slp.jenis_layanan IN ('Poliklinik', 'Forensik', 'Pemulasaran Jenazah', 'Hemodialisa', 'Medical Check Up') ";
//		} elseif ($search["jenis_rawat"] === "2") {
//			$param .= " and slp.jenis_layanan IN ('Rawat Inap', 'Intensive Care') ";
//		} elseif ($search["jenis_rawat"] === "3") {
//			$param .= " and slp.jenis_layanan = 'IGD' ";
//		} elseif ($search["jenis_rawat"] === "4") {
//			$param .= " and slp.jenis_layanan IN ('Laboratorium', 'Radiologi', 'Hemodialisa') ";
//		}
//
//		if ($limit !== 0) {
//			$limitation = " LIMIT " . $limit . " OFFSET " . $start;
//		}
//
//		$select_layanan_pendaftaran = "select p.id,p.nama,sp.tanggal_daftar::date,slp.tanggal_layanan::date,slp.id as id_layanan_pendaftaran,
//					   slp.id_dokter,spes.nama as unit_pelayanan,sum(tarif_layanan) as total_tarif,json_agg(l) as layanan, pen.nama as penjamin ";
//
//		if($search["jenis_rawat"] === "2"){
//			$select_layanan_pendaftaran = "select distinct on (slp.id) slp.id as id_layanan_pendaftaran, p.id,p.nama,sp.tanggal_daftar::date,slp.tanggal_layanan::date,
//					   slp.id_dokter,spes.nama as unit_pelayanan,sum(tarif_layanan) as total_tarif,json_agg(l) as layanan ";
//
//			$join .= "
//				left join sm_tarif_tindakan_pasien as ttp on ttp.id_layanan_pendaftaran = lp.id
//			";
//
//			$param .= " and ttp.id_dokter = stm.id ";
//		}else{
//			$param .= " and slp.id_dokter = stm.id ";
//		}
//
//		if($search['penjamin'] !== ""){
//			$param .= " and sp.id_penjamin = '".$search['penjamin']."' ";
//		}
//
//		$sql_layanan_pendaftaran = " from sm_pendaftaran sp
//					 join sm_layanan_pendaftaran slp on sp.id = slp.id_pendaftaran
//					 join sm_pasien p on p.id = sp.id_pasien
//					 left join sm_spesialisasi as spes on spes.id = slp.id_unit_layanan
//					 left join sm_penjamin as pen on pen.id = sp.id_penjamin
//					 $join
//					 left join lateral (select count(*)       as total_tindakan,
//							   sum(stp.total) as tarif_layanan,
//							   su.nama        as unit,
//							   sl.nama        as nama_tindakan,
//							   sttp.id_layanan_pendaftaran
//						from sm_tarif_tindakan_pasien as sttp
//								 join sm_tarif_pelayanan as stp on stp.id = sttp.id_tarif_pelayanan
//								 join sm_layanan as sl on sl.id = stp.id_layanan
//								 left join sm_unit as su on su.id = stp.id_unit
//						where sttp.id_layanan_pendaftaran = slp.id
//						group by sttp.id_layanan_pendaftaran, sl.nama, su.nama
//						union
//						select count(*)       as total_tindakan,
//							   sum(stp.total) as tarif_layanan,
//							   su.nama        as unit,
//							   sl.nama        as nama_tindakan,
//							   sttp.id_layanan_pendaftaran
//						from sm_jadwal_kamar_operasi as sttp
//								 left join sm_tarif_operasi as tp on tp.id_operasi = sttp.id
//								 join sm_tarif_pelayanan as stp on stp.id = tp.id_tarif
//								 join sm_layanan as sl on sl.id = stp.id_layanan
//								 left join sm_unit as su on su.id = stp.id_unit
//						where sttp.id_layanan_pendaftaran = slp.id
//						group by sttp.id_layanan_pendaftaran, sl.nama, su.nama) as l
//					   on true
//				  where sp.id is not null
//				  $param
//				group by p.id,p.nama,sp.tanggal_daftar,slp.tanggal_layanan,slp.id,slp.id_dokter,spes.nama, pen.nama
//				order by slp.tanggal_layanan";
//
//		$count = "select count(*) from (select sp.id, sp.nama ";
//		$sum = "select sum(jml.total_tarif_layanan) as total from (select sp.id, sp.nama, sum(lp.total_tarif) as total_tarif_layanan ";
//		$select_primary = "select sp.id, sp.nama, json_agg(lp) as layanan_pendaftaran, sum(lp.total_tarif) as total_tarif_layanan ";
//
//		$sql_primary = " from sm_tenaga_medis stm
//			 join sm_pegawai sp on stm.id_pegawai = sp.id
//			 left join lateral ($select_layanan_pendaftaran $sql_layanan_pendaftaran) as lp on true
//		where stm.id is not null $param1";
//		$group = "
//		group by sp.id, sp.nama
//		order by sp.nama";
//
//		$periode = "";
//		if ($search["periode_laporan"] === "Bulanan") {
//			$months = [
//				'01' => 'Januari',
//				'02' => 'Februari',
//				'03' => 'Maret',
//				'04' => 'April',
//				'05' => 'Mei',
//				'06' => 'Juni',
//				'07' => 'Juli',
//				'08' => 'Agustus',
//				'09' => 'September',
//				'10' => 'Oktober',
//				'11' => 'November',
//				'12' => 'Desember'
//			];
//
//			if (isset($months[$search["bulan"]])) {
//				$periode = $months[$search["bulan"]] . " " . $search["tahun"];
//			}
//		}
//
//		$data["periode"] = $periode;
//		$data['data'] = $this->db->query($select_primary . $sql_primary . $group . $limitation)->result();
//		$data['jumlah'] = $this->db->query($count . $sql_primary . $group . ") count")->row()->count;
//		$data['total_tarif_layanan'] = $this->db->query($sum . $sql_primary . $group . ") jml")->row()->total;
//
//		return $data;
//	}
	public function getListLaporanLayananTenagaMedis($limit, $start, $search)
	{
		$param = "";
		$param1 = "";
		$limitation = "";
		$join = "";

		switch ($search["periode_laporan"]) {
			case "Harian":
				if (!empty($search["tanggal_harian"])) {
					$param .= " and to_char( sp.tanggal_daftar, 'yyyy-mm-dd' ) ilike '%" . date2mysql($search['tanggal_harian']) . "' ";
				}
				break;
			case "Bulanan":
				if (!empty($search["bulan"]) && !empty($search["tahun"])) {
					$param .= " and to_char(sp.tanggal_daftar, 'MM-YYYY') = '" . $search["bulan"] . "-" . $search["tahun"] . "' ";
				}
				break;
			case "Rentang Waktu":
				if (!empty($search["tanggal_awal"]) && !empty($search["tanggal_akhir"])) {
					$param .= " and sp.tanggal_daftar BETWEEN '" . date2mysql($search['tanggal_awal']) . " 00:00:00' AND '" . date2mysql($search['tanggal_akhir']) . " 23:59:59'";
				}
				break;
		}

		if ($search['tenaga_medis'] !== "") {
			$param1 .= " and stm.id = '" . $search['tenaga_medis'] . "' ";
		}

		if ($search["tempat_layanan_1"] !== "") {
			$param .= " and spes.nama = '" . $search["tempat_layanan_1"] . "' ";
		}

		if ($search["tempat_layanan_2"] !== "" && !($search["tempat_layanan_2"] === 'VK' || $search["tempat_layanan_2"] === 'OK')) {
			$join = "
			LEFT JOIN sm_rawat_inap ra ON ra.id_layanan_pendaftaran = slp.id
	     	LEFT JOIN sm_intensive_care ic ON slp.id = ic.id_layanan_pendaftaran
	     	LEFT JOIN sm_bangsal b ON b.id = ra.id_bangsal
	     	LEFT JOIN sm_bangsal b2 ON b2.id = ic.id_bangsal
			";
			$param .= " and b.nama = '" . $search["tempat_layanan_2"] . "' ";
			$param .= " or b2.nama = '" . $search["tempat_layanan_2"] . "' ";
		}

		if ($search["tempat_layanan_2"] !== "" && ($search["tempat_layanan_2"] === 'VK' || $search["tempat_layanan_2"] === 'OK')) {
			$join = " left join sm_jadwal_kamar_operasi jko on jko.id_layanan_pendaftaran = slp.id ";

			$param .= " and jko.layanan = '" . $search["tempat_layanan_2"] . "' ";
			$param .= " and jko.status != 'Canceled'";
		}

		if ($search["tempat_layanan_3"] !== "") {
			if ($search["tempat_layanan_3"] === 'Patologi Anatomi' || $search["tempat_layanan_3"] === 'Patologi Klinik' || $search["tempat_layanan_3"] === 'Patologi Mikrobiologi') {
				$param .= " and lab.jenis = '" . $search["tempat_layanan_3"] . "' ";
			}
			if ($search["tempat_layanan_3"] === 'Hemodialisa') {
				$param .= " and slp.jenis_layanan = 'Hemodialisa' ";
			}
			if ($search["tempat_layanan_3"] === 'Radiologi') {
				$param .= " and rad.jenis = '" . $search["tempat_layanan_3"] . "' ";
			}
		}

		if ($search["jenis_rawat"] === "1") {
			$param .= " and slp.jenis_layanan IN ('Poliklinik', 'Forensik', 'Pemulasaran Jenazah', 'Hemodialisa', 'Medical Check Up') ";
		} elseif ($search["jenis_rawat"] === "2") {
			$param .= " and slp.jenis_layanan IN ('Rawat Inap', 'Intensive Care') ";
		} elseif ($search["jenis_rawat"] === "3") {
			$param .= " and slp.jenis_layanan = 'IGD' ";
		} elseif ($search["jenis_rawat"] === "4") {
			$param .= " and slp.jenis_layanan IN ('Laboratorium', 'Radiologi', 'Hemodialisa') ";
		}

		if($search['penjamin'] !== ""){
			$param .= " and sp.id_penjamin = '".$search['penjamin']."' ";
		}

		if ($limit !== 0) {
			$limitation = " LIMIT " . $limit . " OFFSET " . $start;
		}

		$count = "select count(*) from (select sp.id, sp.nama ";
		$select_primary = "select sp.id, sp.nama, stm.id as id_tenaga_medis ";

		$sql_primary = " from sm_tenaga_medis stm
			 join sm_pegawai sp on stm.id_pegawai = sp.id
		where stm.id is not null $param1";
		$group = " order by sp.nama";

		$periode = "";
		if ($search["periode_laporan"] === "Bulanan") {
			$months = [
				'01' => 'Januari',
				'02' => 'Februari',
				'03' => 'Maret',
				'04' => 'April',
				'05' => 'Mei',
				'06' => 'Juni',
				'07' => 'Juli',
				'08' => 'Agustus',
				'09' => 'September',
				'10' => 'Oktober',
				'11' => 'November',
				'12' => 'Desember'
			];

			if (isset($months[$search["bulan"]])) {
				$periode = $months[$search["bulan"]] . " " . $search["tahun"];
			}
		}

		$data["periode"] = $periode;
		$data['data'] = $this->db->query($select_primary . $sql_primary . $group . $limitation)->result();
		$data['jumlah'] = $this->db->query($count . $sql_primary . $group . ") count")->row()->count;

		foreach ($data['data'] as $tenaga_medis){
			$select_layanan_pendaftaran = "select p.id,p.nama,sp.tanggal_daftar::date,slp.tanggal_layanan::date,slp.id as id_layanan_pendaftaran,
			   slp.id_dokter,spes.nama as unit_pelayanan,pen.nama as penjamin ";

			if(in_array($search["jenis_rawat"], ["1","2"])){
				$select_layanan_pendaftaran = "select distinct on (slp.id) slp.id as id_layanan_pendaftaran, p.id,p.nama,sp.tanggal_daftar::date,slp.tanggal_layanan::date,
					   slp.id_dokter,spes.nama as unit_pelayanan,pen.nama as penjamin ";

				$join .= "
					left join sm_tarif_tindakan_pasien as ttp on ttp.id_layanan_pendaftaran = slp.id
				";

					$param .= " and (slp.id_dokter = {$tenaga_medis->id_tenaga_medis} or ttp.id_operator = {$tenaga_medis->id_tenaga_medis}) ";
			}else{
				$param .= " and slp.id_dokter = {$tenaga_medis->id_tenaga_medis} ";
			}

			$sql_layanan_pendaftaran = " from sm_pendaftaran sp
					 join sm_layanan_pendaftaran slp on sp.id = slp.id_pendaftaran
					 join sm_pasien p on p.id = sp.id_pasien
					 left join sm_spesialisasi as spes on spes.id = slp.id_unit_layanan
					 left join sm_penjamin as pen on pen.id = sp.id_penjamin
					 $join
				  where sp.id is not null
				  $param
				group by p.id,p.nama,sp.tanggal_daftar,slp.tanggal_layanan,slp.id,slp.id_dokter,spes.nama, pen.nama
				order by slp.id, slp.tanggal_layanan";

			$layanan_pendaftaran = $this->db->query($select_layanan_pendaftaran . $sql_layanan_pendaftaran)->result();

			foreach ($layanan_pendaftaran as $lp){
				$select_layanan = "select count(*)       as total_tindakan,
						   sum(stp.total) as tarif_layanan,
						   su.nama        as unit,
						   sl.nama        as nama_tindakan,
						   sttp.id_layanan_pendaftaran ";

				$sql_layanan1 = " from sm_tarif_tindakan_pasien as sttp
							 join sm_layanan_pendaftaran as slp on slp.id = sttp.id_layanan_pendaftaran
							 join sm_tarif_pelayanan as stp on stp.id = sttp.id_tarif_pelayanan
							 join sm_layanan as sl on sl.id = stp.id_layanan
							 left join sm_unit as su on su.id = stp.id_unit
					where sttp.id_layanan_pendaftaran = $lp->id_layanan_pendaftaran
					and (case when slp.id_dokter = {$tenaga_medis->id_tenaga_medis} then slp.id_dokter = {$tenaga_medis->id_tenaga_medis} else sttp.id_operator = {$tenaga_medis->id_tenaga_medis} end)
					group by sttp.id_layanan_pendaftaran, sl.nama, su.nama";

				$sql_layanan2 = " from sm_jadwal_kamar_operasi as sttp
							 join sm_layanan_pendaftaran as slp on slp.id = sttp.id_layanan_pendaftaran
							 left join sm_tarif_operasi as tp on tp.id_operasi = sttp.id
							 join sm_tarif_pelayanan as stp on stp.id = tp.id_tarif
							 join sm_layanan as sl on sl.id = stp.id_layanan
							 left join sm_unit as su on su.id = stp.id_unit
					where sttp.id_layanan_pendaftaran = $lp->id_layanan_pendaftaran
					and (case when slp.id_dokter = {$tenaga_medis->id_tenaga_medis} then slp.id_dokter = {$tenaga_medis->id_tenaga_medis} else tp.id_nadis = {$tenaga_medis->id_tenaga_medis} end)
					group by sttp.id_layanan_pendaftaran, sl.nama, su.nama";

				$layanan = $this->db->query($select_layanan . $sql_layanan1 . ' union ' . $select_layanan . $sql_layanan2)->result();
				$lp->layanan = $layanan;
				$lp->total_tarif = array_sum(array_column($layanan, 'tarif_layanan'));
			}

			$tenaga_medis->layanan_pendaftaran = $layanan_pendaftaran;
			$tenaga_medis->total_tarif = array_sum(array_column($layanan_pendaftaran, 'total_tarif'));
		}

		$data['total_tarif_layanan'] = array_sum(array_column($data['data'], 'total_tarif'));

		return $data;
	}
}
