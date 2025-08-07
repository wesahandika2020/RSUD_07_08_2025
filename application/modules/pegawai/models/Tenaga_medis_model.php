<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Tenaga_medis_model extends CI_Model {

    
    function __construct()
    {
        parent::__construct();
        $this->table = 'sm_tenaga_medis as tm';
    }

    function getListDataTenagaMedis($start, $limit, $search)
    {
        $this->db->select("tm.*, pg.nama, pg.alamat, pg.telp, pg.kelamin, coalesce(pn.nama,' - ') as profesi, coalesce(sp.nama, '-') as spesialisasi");
        $this->db->from($this->table);
        $this->db->join('sm_pegawai as pg', 'pg.id = tm.id_pegawai', true);
        $this->db->join('sm_profesi_nadis as pn', 'pn.id = tm.id_profesi', 'left', true);
        $this->db->join('sm_spesialisasi as sp', 'sp.id = tm.id_spesialisasi', 'left', true);
        $this->db->where('tm.id IS NOT NULL');
        $this->db->order_by('pg.nama', 'asc');
        $this->db->limit($limit, $start);

        if ($search['keyword'] !== '') :
            $this->db->like('LOWER(pg.nama)', strtolower($search['keyword']));
            $this->db->or_like('LOWER(pn.nama)', strtolower($search['keyword']));
            $this->db->or_like('LOWER(tm.kode_bpjs)', strtolower($search['keyword']));
        endif;

        $result['data'] = $this->db->get()->result();
        $result['jumlah'] = $this->db->count_all_results($this->table);
        return $result;
    }
    
    function simpanDataTenagaMedis($data)
    {
        return $this->db->insert($this->table, $data);
    }

    function updateDataTenagaMedis($data, $id)
    {
        return $this->db->where('id', $id)->update($this->table, $data);
    }

    function getTenagaMedisById($id)
    {
        $this->db->select("tm.*, pg.nama, pg.alamat, pg.telp, pg.kelamin, coalesce(pn.nama,' - ') as profesi, coalesce(sp.nama, '-') as spesialisasi");
        $this->db->from($this->table);
        $this->db->join('sm_pegawai as pg', 'pg.id = tm.id_pegawai', true);
        $this->db->join('sm_profesi_nadis as pn', 'pn.id = tm.id_profesi', 'left', true);
        $this->db->join('sm_spesialisasi as sp', 'sp.id = tm.id_spesialisasi', 'left', true);
        $this->db->where('tm.id', $id);
        return $this->db->get()->row();
    }

    function deleteDataTenagaMedis($id)
    {
        return $this->db->where('id', $id)->delete($this->table);
    }
}

/* End of file Tenaga_medis_model.php */
