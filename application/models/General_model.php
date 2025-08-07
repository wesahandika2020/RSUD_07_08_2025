<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class General_model extends CI_Model {

    function __construct()
    {
        parent::__construct();

    }

    function getData($params = '')
    {
        $hasil = NULL;
        $table = !empty($params["table"]) ? $params["table"] : '';

        $this->db->from($table);
        if (isset($params["select"])) :
            $this->db->select($params["select"]);
        endif;

        if (isset($params["where"])) :
            $this->db->where($params["where"]);
        endif;

        if (isset($params["where"])) :
            $this->db->where($params["where"]);
        endif;
        
        if (isset($params["or_where"])) :
            $this->db->or_where($params["or_where"]);
        endif;
        
        if (isset($params["where_in"])) :
            $this->db->where_in($params["where_in"]);
        endif;
        
        if (isset($params["or_where_in"])) :
            $this->db->or_where_in($params["or_where_in"]);
        endif;
        
        if (isset($params["where_not_in"])) :
            $this->db->where_not_in($params["where_not_in"]);
        endif;
        
        if (isset($params["or_where_not_in"])) :
            $this->db->or_where_not_in($params["or_where_not_in"]);
        endif;

        if (isset($params['like'])) :
            $this->db->like($params['like']);
        endif;
        
        if (isset($params['or_like'])) :
            $this->db->like($params['or_like']);
        endif;

        if (isset($params['order_by'])) :
            if (is_array($params['order_by'])) :
                foreach ($params['order_by'] as $key => $val) :
                    $this->db->order_by($key, $val);
                endforeach;
            else :
                $this->db->order_by($params['order_by']);
            endif;
        endif;

        if (isset($params['limit'])) :
           $index = isset($params['index']) ? $params['table'] : 0;
           $this->db->limit($params['limit'], $index);
        endif;

        $hasil = $this->db->get();
        return $hasil;
    }

    function insetData($params = '')
    {
        $table     = !empty($params["table"]) ? $params["table"] : "";
        $data      = !empty($params["data"]) ? $params["data"] : "";
        $output_id = isset($params["output_id"]) ? $params["output_id"] : false;
        if ($this->db->insert($table, $data)) :
            if ($output_id == true) :
                return $this->db->insert_id();
            endif;
            return true;
        endif;

        return false;
    }

    function updateData($params = '')
    {
        $table = isset($params["table"]) ? $params["table"] : "";
        $data  = isset($params["data"]) ? $params["data"] : array();
        $where = isset($params["where"]) ? $params["where"] : array();
        if ($this->db->update($table, $data, $where)) :
            return true;
        endif;

        return false;
    }

    function deleteData($params = '')
    {
        $table = !empty($params["table"]) ? $params["table"] : "";
        $where = !empty($params["where"]) ? $params["where"] : "";
        $this->db->delete($table, $where);
        if (0 < $this->db->affected_rows()) :
            return true;
        endif;
        
        return false;
    }
}

/* End of file General_model.php */
