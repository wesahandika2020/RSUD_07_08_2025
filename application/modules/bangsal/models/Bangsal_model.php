<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bangsal_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->table = 'sm_bangsal as b';
    }

    function getListDataBangsal($start, $limit, $search)
    {
        $this->db->select('b.*, kb.kode as kode_kelas, kb.nama as nama_kelas, un.nama as unit');
        $this->db->from($this->table);
        $this->db->join('sm_unit as un', 'un.id = b.id_unit');
        $this->db->join('sm_kode_kelas_bed as kb', 'b.id_kode_kelas = kb.id');
        $this->db->order_by('b.nama', 'asc');
        $this->db->limit($limit, $start);

        if ($search['keyword'] !== '') :
            $this->db->like('LOWER(b.nama)', strtolower($search['keyword']));
        endif;

        $result['data'] = $this->db->get()->result();
        $result['jumlah'] = $this->db->count_all_results($this->table);
        return $result;
    }

    function simpanDataBangsal($data)
    {
        return $this->db->insert($this->table, $data);
    }

    function updateDataBangsal($data, $id)
    {
        $this->db->where('id', $id, true)->update($this->table, $data);
        return $id;
    }

    function getDataBangsalById($id)
    {
        $this->db->select('b.*, un.nama as unit');
        $this->db->from($this->table);
        $this->db->join('sm_unit as un', 'un.id = b.id_unit');
        $this->db->join('sm_kode_kelas_bed as kb', 'b.id_kode_kelas = kb.id');
        $this->db->where('b.id', $id, true);
        return $this->db->get()->row();
    }

    function deleteDataBangsal($id)
    {
        $this->db->where('id', $id, true);
        return $this->db->delete($this->table);
    }
}

