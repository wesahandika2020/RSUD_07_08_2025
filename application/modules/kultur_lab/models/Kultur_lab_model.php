<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kultur_lab_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->table = 'sm_kultur_laboratorium as k';
    }

    function getListDataKultur($start, $limit, $search)
    {
        $this->db->select('k.*');
        $this->db->from($this->table);
        $this->db->where('k.id IS NOT NULL');
        $this->db->order_by('k.nama', 'asc');
        $this->db->limit($limit, $start);

        if ($search['keyword'] !== '') :
            $this->db->like('LOWER(k.nama)', strtolower($search['keyword']));
            $this->db->or_like('LOWER(k.kode)', strtolower($search['keyword']));
            $this->db->or_like('LOWER(k.grup)', strtolower($search['keyword']));
            $this->db->or_like('LOWER(k.kode_lis)', strtolower($search['keyword']));
        endif;

        $result['data'] = $this->db->get()->result();
        $result['jumlah'] = $this->db->count_all_results($this->table);
        return $result;
    }

    function simpanData($data)
    {
        return $this->db->insert($this->table, $data);
    }

    function updateData($data)
    {
        $id = $data['id'];
        $this->db->where('id', $id, true)->update($this->table, $data);

        return $id;
    }

    function deleteKultur($id)
    {
        $this->db->where('id', $id, true);
        return $this->db->delete($this->table);
    }

    function getDataKulturById($id)
    {
        $this->db->select('k.*');
        $this->db->from($this->table);
        $this->db->where(['k.id' => $id]);
        return $this->db->get()->row();
    }
    
}
