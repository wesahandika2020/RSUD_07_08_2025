<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Satuan_model extends CI_Model
{


    function __construct()
    {
        parent::__construct();
        $this->table = 'sm_satuan as s';
    }

    function getListDataSatuan($start, $limit, $search)
    {
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->where('id IS NOT NULL');
        $this->db->order_by('nama', 'asc');
        $this->db->limit($limit, $start);

        if ($search['keyword'] !== '') :
            $this->db->like('LOWER(nama)', strtolower($search['keyword']));
        endif;

        $result['data'] = $this->db->get()->result();
        $result['jumlah'] = $this->db->count_all_results($this->table);
        return $result;
    }

    function simpanDataSatuan($data)
    {
        return $this->db->insert($this->table, $data);
    }

    function updateDataSatuan($data, $id)
    {
        $this->db->where('id', $id, true)->update($this->table, $data);

        return $id;
    }

    function getDataSatuanById($id)
    {
        return $this->db->get_where($this->table, ['id' => $id])->row();
    }

    function deleteDataSatuan($id)
    {
        $this->db->where('id', $id, true);
        return $this->db->delete($this->table);
    }
}

/* End of file Signa.php */
