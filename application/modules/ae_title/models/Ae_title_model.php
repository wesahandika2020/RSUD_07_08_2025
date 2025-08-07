<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ae_title_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
        $this->table = 'sm_ae_title as ae';
    }

    function ambilDataAetitle($start, $limit, $search)
    {
        $this->db->select('ae.*');
        $this->db->from($this->table);
        $this->db->order_by('ae.aetitle', 'asc');
        $this->db->limit($limit, $start);

        if ($search['keyword'] !== '') {
            $this->db->like('LOWER(ae.aetitle)', strtolower($search['keyword']));
            $this->db->or_like('LOWER(ae.ip)', strtolower($search['keyword']));
        }                    

        $result['data'] = $this->db->get()->result();
        $result['jumlah'] = $this->db->count_all_results($this->table);
        return $result;
    }

    function simpanAeTitle($params)
    {
        $this->db->insert('sm_ae_title', $params);
        $id = $this->db->insert_id();

        return $id;

    }

    function cekDataAeTitle($id)
    {
        return $this->db->select('ae.*')
                    ->from($this->table)
                    ->where('ae.id', $id)
                    ->get()
                    ->row();
        $this->db->close();
    }

    function deleteAeTitle($id)
    {
        $this->db->where('id', $id, true);
        return $this->db->delete($this->table);
    }

    // function userDokter($q, $start, $limit)
    // {
    //     $limit = " limit " . $limit . " offset " . $start;
    //     $w = " (nama ilike ('%$q%')) ";
    //     $sql = "select tm.id, sp.nama
    //             from sm_tenaga_medis tm
    //             left join sm_pegawai sp on tm.id_pegawai = sp.id
    //             where (tm.id_spesialisasi = 33 or tm.id_spesialisasi = 53)
    //             and $w order by nama";

    //     $data['data'] = $this->db->query($sql . $limit)->result();
    //     $data['total'] = $this->db->query($sql)->num_rows();
    //     return $data;
    // }
    
}

/* End of file Diet_model.php */
