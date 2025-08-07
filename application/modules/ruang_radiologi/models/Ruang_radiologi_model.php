<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ruang_radiologi_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
        $this->table = 'sm_ruang_radiologi as rr';
    }

    function ambilDataRuang($start, $limit, $search)
    {
        $this->db->select('rr.*, l.nama as nama_layanan, am.name_modality, ae.aetitle');
        $this->db->from($this->table);
        $this->db->join('sm_alat_modality as am', 'am.id = rr.id_alat', 'left');
        $this->db->join('sm_ae_title ae', 'ae.id = am.id_aetitle', 'left');
        $this->db->join('sm_layanan as l', 'l.id = rr.id_layanan', 'left');
        $this->db->order_by('rr.nama_ruangan', 'asc');
        $this->db->limit($limit, $start);

        if ($search['keyword'] !== '') {
            $this->db->like('LOWER(rr.nama_ruangan)', strtolower($search['keyword']));
            $this->db->or_like('LOWER(am.name_modality)', strtolower($search['keyword']));
        }                    

        $result['data'] = $this->db->get()->result();
        $result['jumlah'] = $this->db->count_all_results($this->table);
        return $result;
    }

    function simpanRuangRadiologi($params)
    {
        $this->db->insert($this->table, $params);
        $id = $this->db->insert_id();

        return $id;

    }

    function cekDataRuang($id)
    {
        return $this->db->select('rr.*, am.name_modality, sl.nama as nama_layanan, ae.aetitle')
                    ->from($this->table)
                    ->join('sm_alat_modality as am', 'am.id = rr.id_alat', 'left')
                    ->join('sm_layanan as sl', 'sl.id = rr.id_layanan', 'left')
                    ->join('sm_ae_title as ae', 'ae.id = am.id_aetitle', 'left')
                    ->where('rr.id', $id)
                    ->get()
                    ->row();
        $this->db->close();
    }

    function deleteRuang($id)
    {
        $this->db->where('id', $id, true);
        return $this->db->delete($this->table);
    }

    function alatModality($q, $start, $limit)
    {
        $limit = " limit " . $limit . " offset " . $start;
        $w = " (name_modality ilike ('%$q%')) ";
        $sql = "select am.*, ae.aetitle
                from sm_alat_modality am
                left join sm_ae_title ae on ae.id = am.id_aetitle
                where $w order by name_modality ";

        $data['data'] = $this->db->query($sql . $limit)->result();
        $data['total'] = $this->db->query($sql)->num_rows();
        return $data;
    }

    function namaLayanan($q, $start, $limit)
    {
        $limit = " limit " . $limit . " offset " . $start;
        $w = " (nama ilike ('%$q%')) ";
        $sql = "select sl.id, sl.nama
                from sm_layanan sl
                where (id = 101 or id = 99 or id = 100 or id = 4945 or id = 4947) and $w order by nama ";

        $data['data'] = $this->db->query($sql . $limit)->result();
        $data['total'] = $this->db->query($sql)->num_rows();
        return $data;
    }
    
}

/* End of file Diet_model.php */
