<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Provinsi_model extends CI_Model
{

    function getListDataProvinsi($start, $limit, $search)
    {
        $this->db->select('*');
        $this->db->from('sm_provinsi');
        $this->db->where('id IS NOT NULL');
        $this->db->order_by('nama', 'asc');
        $this->db->limit($limit, $start);

        if ($search['keyword'] !== '') :
            $this->db->like('LOWER(nama)', strtolower($search['keyword']));
        endif;

        $result['data'] = $this->db->get()->result();
        $result['jumlah'] = $this->db->count_all_results('sm_provinsi');

        return $result;
    }

    function simpanData($data)
    {
        return $this->db->insert('sm_provinsi', $data);

    }

    function updateData($data)
    {
        $id = $data['id'];
        $this->db->where('id', $id, true)->update('sm_provinsi', $data);

        return $id;
    }

    function getDataProvinsiById($id)
    {
        return $this->db->get_where('sm_provinsi', ['id' => $id])->row();
    }

    function deleteProvinsi($id)
    {
        $this->db->where('id', $id, true);
        return $this->db->delete('sm_provinsi');
    }
}
