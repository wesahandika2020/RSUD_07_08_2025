<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Instansi_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->table = 'sm_instansi as i';
    }

    private function sqlInstansi($search)
    {
        $this->db->select('i.*');
        $this->db->from($this->table);
        $this->db->where('i.id IS NOT NULL');
        if ($search['keyword'] !== '') :
            $this->db->like('LOWER(i.nama)', strtolower($search['keyword']));
            $this->db->or_like('LOWER(i.telp)', strtolower($search['keyword']));
            $this->db->or_like('LOWER(i.alamat)', strtolower($search['keyword']));
        endif;
        return $this->db->order_by('i.nama', 'asc');
    }

    private function _listInstansi($start, $limit, $search)
    {
        $this->sqlInstansi($search);
        if ($limit !== 0) :
            $this->db->limit($limit, $start);
        endif;
        return $this->db->get()->result();
    }

    function getListDataInstansi($start, $limit, $search)
    {
        $result['data'] = $this->_listInstansi($start, $limit, $search);
        $result['jumlah'] = $this->sqlInstansi($search)->get()->num_rows();
        $this->db->close();
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

    function getDataInstansiById($id)
    {
        $this->db->select('i.*');
        $this->db->from($this->table);
        $this->db->where(['i.id' => $id]);
        return $this->db->get()->row();
    }

    function deleteInstansi($id)
    {
        $this->db->where('id', $id, true);
        return $this->db->delete($this->table);
    }


    
}
