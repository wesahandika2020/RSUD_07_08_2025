<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pendidikan_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->table = 'sm_pendidikan';
    }

    function getListDataPendidikan($start, $limit, $search)
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

    function simpanDataPendidikan($data)
    {
        return $this->db->insert($this->table, $data);
    }

    function updateDataPendidikan($data)
    {
        $id = $data['id'];
        $this->db->where('id', $id, true)->update($this->table, $data);

        return $id;
    }

    function getDataPendidikanById($id)
    {
        return $this->db->get_where($this->table, ['id' => $id])->row();
    }

    function deletePendidikan($id)
    {
        $this->db->where('id', $id, true);
        return $this->db->delete($this->table);
    }


    function getAutoPendidikan($q, $start, $limit)
    {
        $limit = " limit " . $limit . " offset " . $start;
        $sql   = "select * from " . $this->table . "
                  where nama ilike ('%$q%')  order by nama ";
        $data['data'] = $this->db->query($sql . $limit)->result();
        $data['total'] = $this->db->query($sql)->num_rows();
        return $data;
    }
}
