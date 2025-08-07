<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan_pelayanan_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
		$this->datetime = date('Y-m-d H:i:s');
	}
	
	function getListDataDaftarPasienRawatInap($limit, $start, $param)
	{
		$q = "";
		if ($param["bangsal"] != "") {
			$q .= " and ri.id_bangsal = '" . $param["bangsal"] . "' ";
		}
		if ($param["kelas"] != "") {
			$q .= " and k.id = '" . $param["kelas"] . "' ";
		}
		if ($param["no_rm"] != "") {
			$q .= " and p.id = '" . $param["no_rm"] . "' ";
		}
		if ($param["nama"] != "") {
			$q .= " and p.nama ilike '%" . $param["nama"] . "%' ";
		}
		if ($param["alamat"] != "") {
			$q .= " and p.alamat ilike '%" . $param["alamat"] . "%' ";
		}
		if ($param["nama_ayah"] != "") {
			$q .= " and p.nama_ayah = '" . $param["nama_ayah"] . "' ";
		}
		if ($param["nama_ibu"] != "") {
			$q .= " and p.nama_ibu = '" . $param["nama_ibu"] . "' ";
		}
		if ($param["cara_bayar"] !== "") {
			$q .= " and lp.cara_bayar = '" . $param["cara_bayar"] . "' ";
		}
		if ($param["penjamin"] !== "") {
			$q .= " and lp.id_penjamin = '" . $param["penjamin"] . "' ";
		}
		if ($param["no_ruang"] !== "") {
			$q .= " and ri.no_ruang = '" . $param["no_ruang"] . "' ";
		}
		if ($param["no_bed"] !== "") {
			$q .= " and ri.no_bed = '" . $param["no_bed"] . "' ";
		}
		if ($param["lama_rawat"] !== "") {
			$q .= " and datediff(case when ri.waktu_keluar is null then '".$this->datetime."' else ri.waktu_keluar end, ri.waktu_masuk) =  '" . $param["lama_rawat"] . "' ";
		}
		if ($param["status"] === "Sudah Pulang") {
			$q .= " and ri.waktu_keluar is not null";
		} else {
			if ($param["status"] === "Masih Dirawat") {
				$q .= " and ri.waktu_keluar is null ";
			}
		}
		$limitation = " limit " . $limit . " offset " . $start;
		$sql = "select ri.waktu_masuk, ri.waktu_keluar, bg.nama as bangsal,  
				k.nama as kelas, ri.no_bed, ri.no_ruang, 
				p.id as no_rm, p.nama as pasien, 
				p.alamat, pg.nama as dokter_dpjp, lp.cara_bayar, COALESCE(pj.nama, '') as penjamin, pd.no_register  
				from  
				sm_rawat_inap ri 
				join sm_bangsal bg on (bg.id = ri.id_bangsal)  
				join sm_kelas k on (k.id = ri.id_kelas)  
				join sm_layanan_pendaftaran lp on (lp.id = ri.id_layanan_pendaftaran) 
				join sm_pendaftaran pd on (pd.id = lp.id_pendaftaran)  
				join sm_pasien p on (p.id = pd.id_pasien)  
				left join sm_tenaga_medis n on (n.id = lp.id_dokter)  
				left join sm_pegawai pg on (pg.id = n.id_pegawai)  
				left join sm_penjamin pj on (pj.id = lp.id_penjamin)  
				where ri.id is not null ";
		$result["data"] = $this->db->query($sql . $q . $limitation)->result();
		$result["jumlah"] = $this->db->query($sql . $q)->num_rows();
		return $result;
	}
}