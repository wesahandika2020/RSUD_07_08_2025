<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Modality_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
        $this->table = 'sm_alat_modality as am';
    }

    function ambilDataModality($start, $limit, $search)
    {
        $this->db->select('am.*, ae.aetitle');
        $this->db->from($this->table);
        $this->db->join('sm_ae_title as ae', 'ae.id = am.id_aetitle', 'left');
        $this->db->order_by('am.name_modality', 'asc');
        $this->db->limit($limit, $start);

        if ($search['keyword'] !== '') {
            $this->db->like('LOWER(am.name_modality)', strtolower($search['keyword']));
            $this->db->or_like('LOWER(am.code_modality)', strtolower($search['keyword']));
        }                    

        $result['data'] = $this->db->get()->result();
        $result['jumlah'] = $this->db->count_all_results($this->table);
        return $result;
    }

    function simpanModality($params)
    {
        $this->db->insert($this->table, $params);
        $id = $this->db->insert_id();

        return $id;

    }

    function cekDataModality($id)
    {
        return $this->db->select('am.*, ae.aetitle')
                    ->from($this->table)
                    ->join('sm_ae_title as ae', 'ae.id = am.id_aetitle', 'left')
                    ->where('am.id', $id)
                    ->get()
                    ->row();
        $this->db->close();
    }

    function deleteModality($id)
    {
        $this->db->where('id', $id, true);
        return $this->db->delete($this->table);
    }

    function idAetitle($q, $start, $limit)
    {
        $limit = " limit " . $limit . " offset " . $start;
        $w = " (aetitle ilike ('%$q%')) ";
        $sql = "select *
                from sm_ae_title
                where $w order by aetitle ";

        $data['data'] = $this->db->query($sql . $limit)->result();
        $data['total'] = $this->db->query($sql)->num_rows();
        return $data;
    }
    
}

/* End of file Diet_model.php */
