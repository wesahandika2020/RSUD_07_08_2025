<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penjamin_model extends CI_Model
{


    function __construct()
    {
        parent::__construct();
        $this->table_one = 'sm_penjamin as p';
        $this->table_two = 'sm_jenis_penjamin as jp';
    }

    function getListDataPenjamin($limit = null, $start = null, $search = null)
    {
        $where = '';
        if ($limit != null) :
            $limit = " limit " . $limit . " offset " . $start;
        else :
            $limit = '';
        endif;

        $sql_jenis_penjamin = "select *,  
                                (null) as child, 
                                '' as diskon,
                                '' as diskon_barang
                                from " . $this->table_two . " 
                                where id is not null order by kode";
        $root = $this->db->query($sql_jenis_penjamin . $limit)->result();

        foreach ($root as $key => $val) :
            $this->db->select("*, 
                            (null) as child, 
                            COALESCE(NULLIF(kode_rekening, ''), '') as kode_rekening, 
                            replace(kode, '.', '' ) as coding");
            $this->db->from($this->table_one);
            $this->db->where('id_jenis_penjamin', $val->id);
            $this->db->where('id_parent is null');
            $child = $this->db->get()->result();

            if (count($child) > 0) :
                $root[$key]->child = $child;
            endif;
        endforeach;

        // echo json_encode($root); die;

        $result['data'] = $root;
        $result['jumlah'] = $this->db->query($sql_jenis_penjamin)->num_rows();
        return $result;
    }


    function simpanDataPenjamin($data)
    {
        return $this->db->insert($this->table_one, $data);
    }

    function updateDataPenjamin($data, $id)
    {
        return $this->db->where('id', $id)->update($this->table_one, $data);
    }

    function getDataPenjaminById($id)
    {
        $this->db->select('p.*, r.nama as korek');
        $this->db->from($this->table_one);
        $this->db->join('sm_rekening as r', 'r.kode = p.kode_rekening', 'left');
        $this->db->where('p.id', $id);
        return $this->db->get()->row();
    }

    function deleteDataPenjamin($id)
    {
        return $this->db->where('id', $id)->delete($this->table_one);
    }

    function updateStatus($data)
    {
        if ($data['status'] == 1) {
            $this->db->where('id', $data['id'], true);
            $this->db->update('sm_penjamin', ['is_active' => 0]);
        } else if ($data['status'] == 0) {
            $this->db->where('id', $data['id'], true);
            $this->db->update('sm_penjamin', ['is_active' => 1]);
        }
        return $this->db->affected_rows();
    }
}

/* End of file Penjamin.php */
