<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Resep_icare_model extends CI_Model {

    
    function __construct()
    {
        parent::__construct();
        $this->date     = date('Y-m-d');
        $this->datetime = date('Y-m-d H: i: s');
        $this->unit     = $this->session->userdata('id_unit');
        $this->user     = $this->session->userdata('id_translucent');
    }

    private function sqlResepIcare($search)
    {
        $this->db->select("DISTINCT ON (lp.id) lp.*, 
                            date(pd.tanggal_daftar) as tanggal_daftar, 
                            pd.tanggal_keluar ,pd.id_pasien, pjl.id_resep, pjl.id_resep_tebus, pd.no_register,
                            CONCAT_WS(' ', p.nama, COALESCE(p.status_pasien, '')) as nama, 
                            p.tanggal_lahir, p.alamat, 
                            COALESCE(pj.nama,'') as penjamin, p.telp,
                            COALESCE(sp.nama, '') as layanan,
                            COALESCE(pg.nama, '') as dokter,
                            COALESCE(lp.no_antrian, 0) as no_antrian, 
                            CONCAT_WS(' ', b.nama, 'Bed', ri.no_bed) as bed,
                            pjl.id as id_penjualan,
                            pd.jenis_igd");

        $this->db->from('sm_layanan_pendaftaran as lp')
            ->join('sm_pendaftaran as pd', 'pd.id = lp.id_pendaftaran')
            ->join('sm_pasien as p', 'p.id = pd.id_pasien')
            ->join('sm_penjualan as pjl', 'pjl.id_layanan_pendaftaran = lp.id', 'left')
            ->join('sm_spesialisasi as sp', 'sp.id = lp.id_unit_layanan', 'left')
            ->join('sm_tenaga_medis as d', 'd.id = lp.id_dokter', 'left')
            ->join('sm_pegawai as pg', 'pg.id = d.id_pegawai', 'left')
            ->join('sm_intensive_care as ri', 'ri.id_layanan_pendaftaran = lp.id', 'left')
            ->join('sm_bangsal as b', 'b.id = ri.id_bangsal', 'left')
            ->join('sm_kelas as k', 'k.id = ri.id_kelas', 'left')
            ->join('sm_penjamin as pj', 'lp.id_penjamin = pj.id', 'left');
      
        if ($search['keyword'] !== '') :
            $this->db->where("p.id ilike '%" . $search["keyword"] . "%' or p.nama ilike '%" . $search["keyword"] . "%'");
        endif;

        if (($search['tanggal_awal'] !== '') & ($search['tanggal_akhir'] !== '')) :
            $this->db->where("lp.tanggal_layanan BETWEEN '" . date2mysql($search['tanggal_awal']) . " 00:00:00' AND '" . date2mysql($search['tanggal_akhir']) . " 23:59:59'");
        endif;

        if ($search['id'] !== '' && $search['id'] !== 'undefined') :
            $this->db->where('lp.id', $search['id'], true);
        endif;

        if ($search['jenis'] === 'Intensive Care') :
            $this->db->where("(lp.jenis_layanan = 'Intensive Care' and pd.tanggal_keluar is NULL)");
            if ($search['bangsal'] !== '') :
                $this->db->where('b.id', $search['bangsal'], true);
            endif;
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

        // if ($search['layanan'] !== '') :
        //     $this->db->where('lp.id_unit_layanan', $search['layanan']);
        // endif;

        return $this->db->order_by('lp.id, lp.tanggal_layanan', 'desc');
   }

    private function _listResepIcare($limit, $start, $search)
    {
        $this->sqlResepIcare($search);
        if ($limit !== 0) :
            $this->db->limit($limit, $start);
        endif;

        return $this->db->get()->result();
        // $this->db->get(); echo $this->db->last_query(); die;
    }

    function getListDataResepIcare($limit, $start, $search)
    {
        $data = $this->_listResepIcare($limit, $start, $search);
        foreach ($data as $i => $val) :
            $this->db->select('p.*, r.tanggal_resep, r.id as id_resep, lp.tindak_lanjut')
                    ->from('sm_penjualan as p')
                    ->join('sm_layanan_pendaftaran as lp', 'lp.id = p.id_layanan_pendaftaran')
                    ->join('sm_resep_tebus as rt', 'rt.id = p.id_resep_tebus')
                    ->join('sm_resep as r', 'r.id = rt.id_resep')
                    ->where('p.id_layanan_pendaftaran', $val->id)
                    ->where('p.id_resep_tebus is not NULL')
                    ->order_by('p.id');
            $data[$i]->list_resep = $this->db->get()->result();
        endforeach;
        
        $result['data']   = $data;
        $result['jumlah'] = $this->sqlResepIcare($search)->get()->num_rows();
        return $result;

        $this->db->close();
    }
}
