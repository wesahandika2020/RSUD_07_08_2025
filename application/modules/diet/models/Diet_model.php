<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Diet_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
        $this->table = 'sm_diet as d';
    }

    function getListDiet($start, $limit, $search)
    {
        $this->db->select('d.*');
        $this->db->from($this->table);
        $this->db->order_by('d.nama', 'asc');
        $this->db->limit($limit, $start);

        if ($search['keyword'] !== '') {
            $this->db->like('LOWER(d.nama)', strtolower($search['keyword']));
        }                    

        $result['data'] = $this->db->get()->result();
        $result['jumlah'] = $this->db->count_all_results($this->table);
        return $result;
    }

    function getDetailItemDietById($id)
    {
        return $this->db->select('id.*, id.id as id_item, d.nama as nama_diet, d.kode as kode_diet, id.nama as nama_item')
            ->from('sm_diet as d')
            ->join('sm_item_diet as id', 'id.id_diet = d.id', 'left')
            ->where('d.id', $id, true)
            ->order_by('id.nama', 'asc')
            ->get()
            ->result();
    }
    
    function getDietByIdDietIdItemDiet($idDiet, $idItemDiet)
    {
        return $this->db->select('id.*')
            ->from('sm_item_diet as id')           
            ->where('id.id_diet', $idDiet, true)
            ->where('id.nama', $idItemDiet, true)
            ->get()
            ->row();
    }

    function getToCheckDelete($idDiet)
    {
        return $this->db->select('id.*')
            ->from('sm_item_diet as id')           
            ->where('id.id_diet', $idDiet, true)
            ->get()
            ->result();
    }
    
}

/* End of file Diet_model.php */
