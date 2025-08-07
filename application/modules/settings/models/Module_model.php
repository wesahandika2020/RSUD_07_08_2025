<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Module_model extends CI_Model {

    function getListDataModule($start, $limit, $search)
    {
        $this->db->select('*');
        $this->db->from('sm_module');
        $this->db->where('id IS NOT NULL');
        $this->db->order_by('nama', 'asc');
        $this->db->limit($limit, $start);
        
        if ($search['keyword'] !== '') :
            $this->db->like('LOWER(nama)', strtolower($search['keyword']));
        endif;

        $result['data'] = $this->db->get()->result();
        $result['jumlah'] = $this->db->count_all_results('sm_module');
        return $result;
    }

    function getDataModuleById($id)
    {
        return $this->db->get_where('sm_module', ['id' => $id])->row();
    }
    
    function simpanData($data)
    {
    
        $this->db->insert('sm_module', $data);
        $id = $this->db->insert_id();
        
        return $id;
    }
        
    function updateData($data)
    {
            
        $id = $data['id'];
        $this->db->where('id', $id, true)->update('sm_module', $data);
        
        return $id;
    }

    function deleteModule($id)
    {
        $this->db->where('id', $id, true);
        return $this->db->delete('sm_module');
    }

    function getAutoModule($q, $start, $limit)
    {
        $limit = " limit " . $limit . " offset " . $start;
        $query = "select * from sm_module  
                  where nama ilike ('%" . $q . "%') 
                  order by nama";
        $data["data"] = $this->db->query($query . $limit)->result();
        $data["total"] = $this->db->query($query)->num_rows();
        return $data;
    }

}
