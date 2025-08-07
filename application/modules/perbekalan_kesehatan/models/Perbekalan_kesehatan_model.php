<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Perbekalan_kesehatan_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
        $this->table = 'sm_perbekalan_kesehatan as pk';
    }

    function getListPKRT($start, $limit, $search)
    {
        $this->db->select('pk.*');
        $this->db->from($this->table);
        $this->db->order_by('pk.nama', 'asc');
        $this->db->limit($limit, $start);

        if ($search['keyword'] !== '') {
            $this->db->like('LOWER(pk.nama)', strtolower($search['keyword']));
        }

        $result['data'] = $this->db->get()->result();
        $result['jumlah'] = $this->db->count_all_results($this->table);
        return $result;
    }

    function getPKRTById($idPKRT)
    {
        return $this->db->select('pk.*')
            ->from($this->table)
            ->where('pk.id', $idPKRT, true)
            ->get()
            ->row();
    }

    function getToCheckDelete($idPKRT)
    {
        return $this->db->select('pk.*')
            ->from($this->table)
            ->where('pk.id', $idPKRT, true)
            ->get()
            ->result();
    }
}

/* End of file Diet_model.php */
