<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Tarif_kamar_operasi_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
		$this->table = 'sm_tarif_kamar_operasi as tko';
	}
	
	function simpanDataTarifKamarOperasi($data)
    {
        $this->db->insert($this->table, $data);
        $id = $this->db->insert_id();
        return $id;
    }

    function updateDataTarifKamarOperasi($data, $id)
    {
        $this->db->where('id', $id, true)->update($this->table, $data);
        return $id;
	}
	
	function getListDataTarifKamarOperasi($start, $limit, $search)
    {
        $this->db->select("tko.id, tko.id_ruang_operasi, tko.id_kelas, tko.nominal, tko.keterangan, COALESCE(k.nama, 'Semua') as kelas, ro.nama")
                ->from($this->table)
                ->join('sm_ruang_operasi as ro', 'ro.id = tko.id_ruang_operasi')
                ->join('sm_kelas as k', 'k.id = tko.id_kelas', 'left') 
                ->order_by('ro.nama asc');
        
        if ($limit !== null) :
            $this->db->limit($limit, $start);
        endif;

        if ($search['pencarian'] !== '') :
            $this->db->like('LOWER(ro.nama)', strtolower($search['pencarian']));
            $this->db->or_like('LOWER(k.nama)', strtolower($search['pencarian']));
        endif;

        $query = $this->db->get();
        $result['data'] = $query->result();
        $result['jumlah'] = $query->num_rows();
        return $result;
    }

    function getDataTarifKamarOperasiById($id)
    {
        $this->db->select("tko.id, tko.id_ruang_operasi, tko.id_kelas, tko.nominal, tko.keterangan, COALESCE(k.nama, 'Semua') as kelas, ro.nama")
                ->from($this->table)
                ->join('sm_ruang_operasi as ro', 'ro.id = tko.id_ruang_operasi')
                ->join('sm_kelas as k', 'k.id = tko.id_kelas', 'left') 
                ->where('tko.id', $id);
        return $this->db->get()->row();
        // echo $this->db->last_query(); die;
	}
	
	function deleteDataTarifKamarOperasi($id)
    {
        $this->db->where('id', $id)->delete($this->table);
    }
}
