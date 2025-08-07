<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Group_model extends CI_Model
{

    private function sqlAccountGroup($search)
    {
        $this->db->select('*');
        $this->db->from('sm_account_group');
        $this->db->where('id IS NOT NULL');
        if ($search['keyword'] !== '') :
            $this->db->like('LOWER(name)', strtolower($search['keyword']));
        endif;
        return  $this->db->order_by('name', 'asc');
    }

    private function _listAccountGroup($start, $limit, $search)
    {
        $this->sqlAccountGroup($search);
        if ($limit !== 0) :
            $this->db->limit($limit, $start);
        endif;
        return $this->db->get()->result();
    }

    function getListDataAccountGroup($start, $limit, $search)
    {
        $result['data'] = $this->_listAccountGroup($start, $limit, $search);
        $result['jumlah'] = $this->sqlAccountGroup($search)->get()->num_rows();
        $this->db->close();
        return $result;
    }

    function simpanData($data)
    {

        $this->db->insert('sm_account_group', $data);
        $id = $this->db->insert_id();

        return $id;
    }

    function updateData($data)
    {

        $id = $data['id'];
        $this->db->where('id', $id, true)->update('sm_account_group', $data);

        return $id;
    }

    function getDataAccountGroupById($id)
    {
        return $this->db->get_where('sm_account_group', ['id' => $id])->row();
    }

    function deleteAccountGroup($id)
    {
        $this->db->where('id', $id, true);
        return $this->db->delete('sm_account_group');
    }

    function getDataPrivileges($id_account_group)
    {
        $this->db->select('m.nama as module, mn.*, ga.id_account_group');
        $this->db->from('sm_menu as mn');
        $this->db->join('sm_module as m', 'mn.id_module = m.id');
        $this->db->join('sm_grant_access as ga', 'mn.id = ga.id_menu and ga.id_account_group = ' . $id_account_group, 'left');
        $this->db->order_by('m.nama', 'asc');
        $this->db->order_by('mn.nama', 'asc');
        return $this->db->get()->result();        
    }

    function updateDataPrivileges($data)
    {
        $this->db->trans_begin();
        $this->db->where('id_account_group', $data['id_account_group']);
        $this->db->delete('sm_grant_access');
        if (is_array($data['group'])) {
            foreach ($data['group'] as $group) {
                $data = [
                    'id_account_group' => $data['id_account_group'],
                    'id_menu' => $group
                ];
                $this->db->insert('sm_grant_access', $data);
            }
        }
        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return 'failed';
        }

        $this->db->trans_commit();
        return 'success';
    }
}
