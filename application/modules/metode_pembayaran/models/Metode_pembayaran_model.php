<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Metode_pembayaran_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->table = 'sm_metode_pembayaran as mp';
    }

    private function sqlData($search)
    {
        $this->db->select('mp.*');
        $this->db->from($this->table);

        if ($search['keyword'] !== '') :
            $this->db->like('LOWER(mp.nama)', strtolower($search['keyword']));
        endif;

        return $this->db->order_by('mp.nama', 'asc');
    }

    private function _listData($start, $limit, $search)
    {
        $this->sqlData($search);
        if ($limit !== 0) :
            $this->db->limit($limit, $start);
        endif;

        return $this->db->get()->result();
    }

    function getListData($start, $limit, $search)
    {
        $result['data'] = $this->_listData($start, $limit, $search);
        $result['jumlah'] = $this->sqlData($search)->get()->num_rows();
        $this->db->close();
        return $result;
    }

    function simpanData($data)
    {
        return $this->db->insert($this->table, $data);
    }

    function updateData($data, $id)
    {
        $this->db->where('id', $id, true)->update($this->table, $data);
        return $id;
    }

    function getDataById($id)
    {
        $this->db->select('mp.*');
        $this->db->from($this->table);
        $this->db->where('mp.id', $id, true);
        return $this->db->get()->row();
    }

    function deleteData($id)
    {
        $this->db->where('id', $id, true);
        return $this->db->delete($this->table);
    }
}

