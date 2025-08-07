<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Unit_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->table = 'sm_unit as un';
    }

    private function sqlUnit($search)
    {
        $this->db->select('un.*');
        $this->db->select('ins.nama as instalasi');
        $this->db->from($this->table);
        $this->db->join('sm_instalasi as ins', 'un.id_instalasi = ins.id', 'left');
        $this->db->where('un.id IS NOT NULL');
        // $this->db->where(array('un.status' => '1'));
        if ($search['keyword'] !== '') :
            $this->db->like('LOWER(un.nama)', strtolower($search['keyword']));
            $this->db->or_like('LOWER(ins.nama)', strtolower($search['keyword']));
        endif;
        return  $this->db->order_by('un.nama', 'asc');
    }

    private function _listUnit($start, $limit, $search)
    {
        $this->sqlUnit($search);
        if ($limit !== 0) :
            $this->db->limit($limit, $start);
        endif;
        return $this->db->get()->result();
    }

    function getListDataUnit($start, $limit, $search)
    {
        $result['data'] = $this->_listUnit($start, $limit, $search);
        $result['jumlah'] = $this->sqlUnit($search)->get()->num_rows();
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

    function getDataUnitById($id)
    {
        $this->db->select('un.*');
        $this->db->select('ins.nama as instalasi');
        $this->db->from($this->table);
        $this->db->join('sm_instalasi as ins', 'un.id_instalasi = ins.id', 'left');
        $this->db->where('un.id', $id, true);
        return $this->db->get()->row();
    }

    function deleteUnit($id)
    {
        $this->db->where('id', $id, true);
        return $this->db->delete($this->table);
    }


    function getAutoUnit($q, $start, $limit)
    {
        $limit = " limit " . $limit . " offset " . $start;
        $sql   = "select * from " . $this->table . "
                  where nama ilike ('%$q%')  order by nama ";
        $data['data'] = $this->db->query($sql . $limit)->result();
        $data['total'] = $this->db->query($sql)->num_rows();
        return $data;
    }
}
