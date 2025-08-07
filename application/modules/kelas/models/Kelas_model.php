<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kelas_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->table = 'sm_kelas as k';
    }

    private function sqlKelas($search)
    {
        $this->db->select('k.*');
        $this->db->from($this->table);

        if ($search['keyword'] !== '') :
            $this->db->like('LOWER(k.nama)', strtolower($search['keyword']));
        endif;

        return $this->db->order_by('k.nama', 'asc');
    }

    private function _listKelas($start, $limit, $search)
    {
        $this->sqlKelas($search);
        if ($limit !== 0) :
            $this->db->limit($limit, $start);
        endif;

        return $this->db->get()->result();
    }

    function getListDataKelas($start = 0, $limit = 0, $search)
    {
        $result['data'] = $this->_listKelas($start, $limit, $search);
        $result['jumlah'] = $this->sqlKelas($search)->get()->num_rows();
        $this->db->close();
        return $result;
    }

    function simpanDataKelas($data)
    {
        return $this->db->insert($this->table, $data);
    }

    function updateDataKelas($data, $id)
    {
        $this->db->where('id', $id, true)->update($this->table, $data);
        return $id;
    }

    function getDataKelasById($id)
    {
        $this->db->select('k.*');
        $this->db->from($this->table);
        $this->db->where('k.id', $id, true);
        return $this->db->get()->row();
    }

    function deleteDataKelas($id)
    {
        $this->db->where('id', $id, true);
        return $this->db->delete($this->table);
    }
}

