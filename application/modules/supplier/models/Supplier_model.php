<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Supplier_model extends CI_Model
{


    function __construct()
    {
        parent::__construct();
        $this->table = 'sm_supplier as s';
    }

    private function sqlSupplier($search)
    {
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->where('id IS NOT NULL');
        $this->db->order_by('nama', 'asc');

        if ($search['keyword'] !== '') :
            $this->db->like('LOWER(nama)', strtolower($search['keyword']));
		endif;

        return  $this->db->order_by('nama', 'asc');;
    }

    private function _listSupplier($start, $limit, $search)
    {
        $this->sqlSupplier($search);
        if ($limit !== 0) :
            $this->db->limit($limit, $start);
        endif;

        return $this->db->get()->result();
        // $this->db->get(); echo $this->db->last_query(); exit();
    }

    function getListDataSupplier($start, $limit, $search)
    {
        $result['data'] = $this->_listSupplier($start, $limit, $search);
        $result['jumlah'] = $this->sqlSupplier($search)->get()->num_rows();
        return $result;

        $this->db->close();
    }
    
    function simpanDataSupplier($data)
    {
        return $this->db->insert($this->table, $data);
    }

    function updateDataSupplier($data, $id)
    {
        $this->db->where('id', $id, true)->update($this->table, $data);

        return $id;
    }

    function getDataSupplierById($id)
    {
        return $this->db->get_where($this->table, ['id' => $id])->row();
    }

    function deleteDataSupplier($id)
    {
        $this->db->where('id', $id, true);
        return $this->db->delete($this->table);
    }
}