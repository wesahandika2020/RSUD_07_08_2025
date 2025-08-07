<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_layanan_per_pasien_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function getListLaporanLayananPerPasien($limit, $start, $search)
	{
		$param1 = "";
		$param = "";
		$limitation = "";
		$join = "";

		switch ($search["periode_laporan"]) {
			case "Harian":
				if (!empty($search["tanggal_harian"])) {
					$param1 .= " and to_char( sp.tanggal_daftar, 'yyyy-mm-dd' ) ilike '%" . date2mysql($search['tanggal_harian']) . "' ";
				}
				break;
			case "Bulanan":
				if (!empty($search["bulan"]) && !empty($search["tahun"])) {
					$param1 .= " and to_char(sp.tanggal_daftar, 'MM-YYYY') = '" . $search["bulan"] . "-" . $search["tahun"] . "' ";
				}
				break;
			case "Rentang Waktu":
				if (!empty($search["tanggal_awal"]) && !empty($search["tanggal_akhir"])) {
					$param1 .= " and sp.tanggal_daftar BETWEEN '" . date2mysql($search['tanggal_awal']) . " 00:00:00' AND '" . date2mysql($search['tanggal_akhir']) . " 23:59:59'";
				}
				break;
		}

		if($search['no_rm'] !== ""){
			$param1 .= " and p.id = '" . $search['no_rm'] . "' ";
		}

		if ($search['tenaga_medis'] !== "") {
			$param .= " and tm.id = '" . $search['tenaga_medis'] . "' ";
		}

		if ($search["tempat_layanan_1"] !== "") {
			$param .= " and sp.nama = '" . $search["tempat_layanan_1"] . "' ";
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

		if ($limit !== 0) {
			$limitation = " LIMIT " . $limit . " OFFSET " . $start;
		}

		$count = "select count(*) ";
		$select = "select sp.id, p.id as no_rm, p.nama, sp.tanggal_daftar::date ";
		$sql_pendaftaran = "from sm_pendaftaran sp
        join sm_pasien p on sp.id_pasien = p.id 
         $param1";
		$order = " order by p.id desc ";

		$query = $this->db->query($select . $sql_pendaftaran . $order . $limitation)->result();
		$id_pendaftaran = array_column($query, 'id');

		$select_layanan_pendaftaran = "select peg.id, peg.nama,spes.nama as unit_pelayanan, slp.tanggal_layanan::date, slp.id_pendaftaran, slp.id as id_layanan_pendaftaran, pj.nama as penjamin ";

		if($search["jenis_rawat"] === "2"){
			$select_layanan_pendaftaran = "select distinct on (slp.id) slp.id as id_layanan_pendaftaran, peg.id, spes.nama as unit_pelayanan, peg.nama, slp.tanggal_layanan::date, slp.id_pendaftaran, pj.nama as penjamin ";

			$join .= "
				left join sm_tarif_tindakan_pasien as ttp on ttp.id_layanan_pendaftaran = slp.id
			";

			$param .= " and ttp.id_dokter = stm.id ";
		}else{
			$param .= " and slp.id_dokter = stm.id ";
		}


		$sql_layanan_pendaftaran = " from sm_layanan_pendaftaran slp
		  join sm_tenaga_medis stm on slp.id_dokter = stm.id
		  join sm_pegawai peg on stm.id_pegawai = peg.id 
		  left join sm_spesialisasi as spes on spes.id = slp.id_unit_layanan
		  left join sm_penjamin as pj on slp.id_penjamin = pj.id
		  $join
		  where slp.id_pendaftaran in (" . implode(',', $id_pendaftaran) . ")
		  $param";

		$query1 = $this->db->query($select_layanan_pendaftaran . $sql_layanan_pendaftaran)->result();
		$id_layanan_pendaftaran = array_column($query1, 'id_layanan_pendaftaran');

		foreach ($query as $value) {
			$value->tenaga_medis = [];
			foreach ($query1 as $value1) {
				if ($value->id == $value1->id_pendaftaran) {
					$value->tenaga_medis[] = $value1;
				}
			}
		}

		$select_layanan = "select count(*)       as total_tindakan,
						 sum(stp.total) as tarif_layanan,
						 su.nama        as unit,
						 sl.nama        as nama_tindakan,
						 sttp.id_layanan_pendaftaran ";

		$sum_layanan = "select sum(stp.total) as tarif_layanan ";

		$sql_layanan = "from sm_tarif_tindakan_pasien sttp
						   join sm_tarif_pelayanan as stp on stp.id = sttp.id_tarif_pelayanan
						   join sm_layanan as sl on sl.id = stp.id_layanan
						   left join sm_unit as su on su.id = stp.id_unit";
		$kondisi_layanan = " where sttp.id_layanan_pendaftaran in (" . implode(',', $id_layanan_pendaftaran) . ") ";
		$group_by_layanan = " group by su.nama, sl.nama, sttp.id_layanan_pendaftaran ";

		$sql_layanan1 = "from sm_jadwal_kamar_operasi as sttp
						   left join sm_tarif_operasi as tp on tp.id_operasi = sttp.id
						   join sm_tarif_pelayanan as stp on stp.id = tp.id_tarif
						   join sm_layanan as sl on sl.id = stp.id_layanan
						   left join sm_unit as su on su.id = stp.id_unit";


		if(!empty($id_layanan_pendaftaran)){

			$query2 = $this->db->query($select_layanan . $sql_layanan . $kondisi_layanan . $group_by_layanan . ' union ' . $select_layanan . $sql_layanan1 . $kondisi_layanan . $group_by_layanan)->result();

			foreach ($query as $value) {
				foreach ($value->tenaga_medis as $tenaga_medis) {
					$tenaga_medis->total_tarif_layanan = 0;
					$tenaga_medis->layanan = [];
					foreach ($query2 as $value2) {
						if ($tenaga_medis->id_layanan_pendaftaran == $value2->id_layanan_pendaftaran) {
							$tenaga_medis->layanan[] = $value2;
							$tenaga_medis->total_tarif_layanan += (int)$value2->tarif_layanan;
						}
					}
				}
			}
		}

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
		$data["data"]    = $query;
		$data["jumlah"]  = $this->db->query($count . $sql_pendaftaran)->row()->count;

		$sql_total_tarif_layanan = "select sum(stp.total) as tarif_layanan
		from sm_pendaftaran sp
		join sm_pasien p on sp.id_pasien = p.id 
		join sm_layanan_pendaftaran slp on sp.id = slp.id_pendaftaran
		join sm_tarif_tindakan_pasien sttp on slp.id = sttp.id_layanan_pendaftaran
		join sm_tarif_pelayanan stp on sttp.id_tarif_pelayanan = stp.id
		$param1
		union
		select sum(stp.total) as tarif_layanan
		from sm_pendaftaran sp
		join sm_pasien p on sp.id_pasien = p.id 
		join sm_layanan_pendaftaran slp on sp.id = slp.id_pendaftaran
		join sm_jadwal_kamar_operasi sttp on slp.id = sttp.id_layanan_pendaftaran
		left join sm_tarif_operasi tp on sttp.id = tp.id_operasi
		left join sm_tarif_pelayanan stp on tp.id_tarif = stp.id
		$param1";
		$data['total_tarif_layanan'] = $this->db->query("select sum(layanan.tarif_layanan) from ($sql_total_tarif_layanan) layanan")->row()->sum;

		return $data;
	}
}
