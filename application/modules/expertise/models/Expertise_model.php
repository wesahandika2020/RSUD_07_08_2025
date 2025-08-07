<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Expertise_model extends CI_Model {

	function __construct()
	{
		parent::__construct();

	}
	
	function getListDataExpertise($start, $limit, $search)
	{
		$param = "";
		if ($search["pencarian"] !== "") :
			$param .= " and l.nama ilike '%".$search["pencarian"]."%' 
						or pg.nama ilike '%".$search["pencarian"]."%' ";
		endif;

		$limitation = " limit " . $limit . " offset " . $start;
		$sql = "select ex.id, ex.id_layanan, ex.id_dokter, ex.expertise,
				COALESCE(ex.keterangan, '') as keterangan, 
				COALESCE(pg.nama, '') as dokter, 
				CONCAT_WS(' ', l.nama, ll.nama) as layanan 
				from sm_expertise as ex 
				join sm_layanan as l on (l.id = ex.id_layanan) 
				left join sm_layanan as ll on (ll.id = l.id_parent) 
				left join sm_tenaga_medis as tm on (tm.id = ex.id_dokter) 
				left join sm_pegawai as pg on (pg.id = tm.id_pegawai)";
		$order = " order by l.nama ";
		$query = $this->db->query($sql . $param . $order . $limitation);
		$result["data"] = $query->result();
		$result["jumlah"] = $this->db->query($sql . $param)->num_rows();
		return $result;
	}

	function simpanDataExpertise($data)
    {
		$this->db->insert('sm_expertise', $data);
		return $this->db->insert_id();
    }

    function updateDataExpertise($data, $id)
    {
        $this->db->where('id', $id, true)->update('sm_expertise', $data);
        return $id;
	}
	
	function getDataExpertiseById($id)
	{
		$sql = "select ex.id, ex.id_layanan, ex.id_dokter, ex.expertise,
				COALESCE(ex.keterangan, '') as keterangan, 
				COALESCE(pg.nama, '') as dokter, 
				CONCAT_WS(' ', l.nama, ll.nama) as layanan 
				from sm_expertise as ex 
				join sm_layanan as l on (l.id = ex.id_layanan) 
				left join sm_layanan as ll on (ll.id = l.id_parent) 
				left join sm_tenaga_medis as tm on (tm.id = ex.id_dokter) 
				left join sm_pegawai as pg on (pg.id = tm.id_pegawai)
				where ex.id = '".$id."'";
		$data = $this->db->query($sql)->row();
		return $data;
	}

	function deleteDataExpertise($id)
    {
        $this->db->where('id', $id, true);
        return $this->db->delete('sm_expertise');
    }

	function getTempalateExpertise($id_layanan, $id_dokter)
	{
		$whereLayanan = "";
		$whereDokter = "";
		if ($id_layanan !== "") :
			$whereLayanan = " and ex.id_layanan = '". $id_layanan."' ";
		endif;

		if ($id_dokter !== "") :
			$whereDokter = " and ex.id_dokter = '". $id_dokter."' ";
		endif;

		$sql = "select ex.id, ex.id_layanan, ex.id_dokter, ex.expertise,
				COALESCE(ex.keterangan, '') as keterangan, 
				COALESCE(pg.nama, '') as dokter, 
				COALESCE(l.nama, '') as layanan 
				from sm_expertise as ex 
				join sm_layanan as l on (l.id = ex.id_layanan) 
				left join sm_tenaga_medis as tm on (tm.id = ex.id_dokter) 
				left join sm_pegawai as pg on (pg.id = tm.id_pegawai) 
				where ex.id is not null ";

		$data = $this->db->query($sql . $whereLayanan . $whereDokter)->result();
		if (!$data) :
			$whereDokter = " and ex.id_dokter is null ";
			$data = $this->db->query($sql . $whereLayanan . $whereDokter)->result();
		endif;
		
		return $data;
	}
}