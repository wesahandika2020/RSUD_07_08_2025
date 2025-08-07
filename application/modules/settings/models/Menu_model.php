<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu_model extends CI_Model {

    private function sqlMenu($search)
    {
        $this->db->select('m.nama as nama_module, mn.*');
        $this->db->from('sm_menu as mn');
        $this->db->join('sm_module as m', 'mn.id_module = m.id');
        $this->db->where('mn.id IS NOT NULL');
        

        if ($search['keyword'] !== '') :
            $this->db->like('LOWER(mn.nama)', strtolower($search['keyword']));
            $this->db->or_like('LOWER(m.nama)', strtolower($search['keyword']));
        endif;

        return $this->db->order_by('mn.nama', 'asc');
    }

    private function _listMenu($limit = 0, $start = 0, $search)
    {
        $this->sqlMenu($search);
        if ($limit !== 0) :
            $this->db->limit($limit, $start);
        endif;

        return $this->db->get()->result();
        // $this->db->get(); echo $this->db->last_query(); exit();
    }

    function getListDataMenu($start = 0, $limit = 0, $search)
    {
        $result['data'] = $this->_listMenu($limit, $start, $search);
        $result['jumlah'] = $this->sqlMenu($search)->get()->num_rows();
        return $result;

        $this->db->close();
    }

    function getDataMenuById($id)
    {
        $this->db->select('mn.*, m.nama as nama_module');
        $this->db->from('sm_menu as mn');
        $this->db->join('sm_module as m', 'mn.id_module = m.id');
        $this->db->where('mn.id', $id, true);
        return $this->db->get()->row();
    }

    function deleteMenu($id)
    {
        $this->db->where('id', $id, true);
        return $this->db->delete('sm_menu');
    }

    function simpanData($data)
    {

        $this->db->insert('sm_menu', $data);
        $id = $this->db->insert_id();

        return $id;
    }

    function updateData($data)
    {

        $id = $data['id'];
        $this->db->where('id', $id, true)->update('sm_menu', $data);

        return $id;
    }
}
