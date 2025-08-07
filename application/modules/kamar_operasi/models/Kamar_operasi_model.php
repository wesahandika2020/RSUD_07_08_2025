<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kamar_operasi_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->table = 'sm_ruang_operasi as r';
    }

    private function sqlKamarOperasi($search)
    {
        $this->db->select("r.*");
        $this->db->from($this->table);
        
        if ($search['keyword'] !== '') :
            $this->db->like('LOWER(nama)', strtolower($search['keyword']));
        endif;
        
        return $this->db->order_by('r.nama', 'asc');
    }

    private function _listKamarOperasi($limit, $start, $search)
    {
        $this->sqlKamarOperasi($search);
        if ($limit !== 0) :
            $this->db->limit($limit, $start);
        endif;

        return $this->db->get()->result();
    }

    function getListDataKamarOperasi($limit = 0, $start = 0, $search)
    {
        $result['data'] = $this->_listKamarOperasi($limit, $start, $search);
        $result['jumlah'] = $this->sqlKamarOperasi($search)->get()->num_rows();
        return $result;

        $this->db->close();
    }

    function updateDataKamarOperasi($data)
    {
        if (!$this->input->post('id')) :
            $this->db->insert("sm_ruang_operasi", $data);
            $id = NULL;
        else :
            $id = $this->input->post('id');
            $data['id'] = $id;
            $this->db->where("id", $data["id"])->update("sm_ruang_operasi", $data);
        endif;
        return $id;
    }

    function getDataKamarOperasiById($id)
    {
        $this->db->select("r.*");
        $this->db->from($this->table);
        $this->db->where('r.id', $id, true);
        return $this->db->get()->row();
    }

    function deleteDataKamarOperasi($id)
    {
        $this->db->where('id', $id, true);
        return $this->db->delete($this->table);
    }
}

