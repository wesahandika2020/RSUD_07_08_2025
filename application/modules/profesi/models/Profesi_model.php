<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profesi_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->table = 'sm_profesi_nadis';
    }

    private function sqlProfesiTenagaMedis($search)
    {
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->where('id IS NOT NULL');

        if ($search['keyword'] !== '') :
            $this->db->like('LOWER(nama)', strtolower($search['keyword']));
        endif;

        return $this->db->order_by('nama', 'asc');
    }

    private function _listProfesiTenagaMedis($start, $limit, $search)
    {
        $this->sqlProfesiTenagaMedis($search);
        if ($limit !== 0) :
            $this->db->limit($limit, $start);
        endif;
        return $this->db->get()->result();
    }

    function getListDataProfesiTenagaMedis($start, $limit, $search)
    {
        $result['data'] = $this->_listProfesiTenagaMedis($start, $limit, $search);
        $result['jumlah'] = $this->sqlProfesiTenagaMedis($search)->get()->num_rows();
        $this->db->close();
        return $result;

    }

    function simpanDataProfesiTenagaMedis($data)
    {
        return $this->db->insert($this->table, $data);
    }

    function updateDataProfesiTenagaMedis($data)
    {
        $id = $data['id'];
        $this->db->where('id', $id, true)->update($this->table, $data);

        return $id;
    }

    function getDataProfesiTenagaMedisById($id)
    {
        return $this->db->get_where($this->table, ['id' => $id])->row();
    }

    function deleteProfesiTenagaMedis($id)
    {
        $this->db->where('id', $id, true);
        return $this->db->delete($this->table);
    }


    function getAutoProfesiTenagaMedis($q, $start, $limit)
    {
        $limit = " limit " . $limit . " offset " . $start;
        $sql   = "select * from " . $this->table . "
                  where nama ilike ('%$q%')  order by nama ";
        $data['data'] = $this->db->query($sql . $limit)->result();
        $data['total'] = $this->db->query($sql)->num_rows();
        return $data;
    }
}
