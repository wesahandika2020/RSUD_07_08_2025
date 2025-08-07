<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pabrik_model extends CI_Model
{


    function __construct()
    {
        parent::__construct();
        $this->table = 'sm_pabrik as s';
    }

    function getListDataPabrik($start, $limit, $search)
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

    function simpanDataPabrik($data)
    {
        return $this->db->insert($this->table, $data);
    }

    function updateDataPabrik($data, $id)
    {
        $this->db->where('id', $id, true)->update($this->table, $data);

        return $id;
    }

    function getDataPabrikById($id)
    {
        return $this->db->get_where($this->table, ['id' => $id])->row();
    }

    function deleteDataPabrik($id)
    {
        $this->db->where('id', $id, true);
        return $this->db->delete($this->table);
    }
}

/* End of file Signa.php */
