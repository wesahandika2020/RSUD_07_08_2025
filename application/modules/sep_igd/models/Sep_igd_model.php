<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Sep_igd_model extends CI_Model {

    
    function __construct()
    {
        parent::__construct();

    }

    private function sqlSepIGD($search)
    {
        $this->db->select("lp.*, pd.tanggal_daftar, pd.id_pasien, pd.no_register, CONCAT_WS(' ', p.nama, COALESCE(p.status_pasien, '')) as nama, sp.nama as klinik, sp.kode_bpjs, coalesce(pj.nama, '') as penjamin, tr.account as username,", false);

        $this->db->from('sm_layanan_pendaftaran as lp')
            ->join('sm_pendaftaran as pd', 'pd.id = lp.id_pendaftaran')
            ->join('sm_pasien as p', 'p.id = pd.id_pasien')
            ->join('sm_spesialisasi as sp', 'sp.id = lp.id_unit_layanan', 'left')
            ->join('sm_translucent as tr', 'tr.id = lp.id_users_sep', 'left')
            ->join('sm_penjamin as pj', 'pj.id = lp.id_penjamin', 'left')
            ->where('lp.id is not null')
            ->where('lp.id_penjamin', 1)
            ->where('lp.jenis_layanan', 'IGD');

        // var_dump($search['tanggal_awal']); die;
        if (($search['tanggal_awal'] !== '') & ($search['tanggal_akhir'] !== '')) :
            $this->db->where("pd.tanggal_daftar BETWEEN '" . date2mysql($search['tanggal_awal']) . " 00:00:00' AND '" . date2mysql($search['tanggal_akhir']) . " 23:59:59'");
        endif;

        if ($search['no_register'] !== '') :
            $this->db->where('pd.no_register', $search['no_register'], true);
        endif;

        if ($search['no_rm'] !== '') :
            $this->db->like('p.id', $search['no_rm'], 'before', true);
        endif;

        if ($search['nama'] !== '') :
            $this->db->where("p.nama ilike '%" . strtolower($search['nama']) . "%'");
        endif;

        if ($search['no_sep'] !== '') :
            $this->db->where('lp.no_sep', $search['no_sep'], true);
        endif;

        if ($search['jenis_igd'] !== '') :
            $this->db->where('pd.jenis_igd', $search['jenis_igd']);
        endif;

        return $this->db->order_by('lp.id', 'desc');

    }

    private function _listSepIGD($limit, $start, $search)
    {
        $this->sqlSepIGD($search);
        if ($limit !== 0) :
            $this->db->limit($limit, $start);
        endif;

        return $this->db->get()->result();
    }

    function getListDataSepIGD($limit, $start, $search)
    {
        $result['data'] = $this->_listSepIGD($limit, $start, $search);
        $result['jumlah'] = $this->sqlSepIGD($search)->get()->num_rows();
        return $result;

        $this->db->close();
    }
    

}

/* End of file Sep_poli_model.php */
