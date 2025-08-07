<?php
defined('BASEPATH') or exit('No direct script access allowed');
use \LZCompressor\LZString;

class Jadwal_dokter_rsud_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('App_model', 'm_default');
    }

    private function sqlJadwalDokterRSUD($search)
    {
        $this->db->select("jd.*", false);

        $this->db->from('sm_jadwal_dokter as jd')
            ->where('jd.id is not null');
            
        
        if (($search['tanggal_jadwal'] !== '')) :
            $this->db->where('jd.tanggal', date2mysql($search['tanggal_jadwal']));
        endif;

        if ($search['layanan'] !== '') :
            $this->db->where('jd.id_poli', $search['layanan'], true);
        endif;

        return $this->db->order_by('jd.id', 'desc');
        
    }

    private function _listJadwalDokterRSUD($limit = 0, $start = 0, $search)
    {
        $this->sqlJadwalDokterRSUD($search);
        if ($limit !== 0) :
            $this->db->limit($limit, $start);
        endif;

        return $this->db->get()->result();
    }

    function jadwalDokterRSUD($limit = 0, $start = 0, $search)
    {
        $result['data'] = $this->_listJadwalDokterRSUD($limit, $start, $search);
        $result['jumlah'] = $this->sqlJadwalDokterRSUD($search)->get()->num_rows();
        return $result;

        $this->db->close();
    }
    
    function getKodeBPJS($q, $start, $limit)
    {
        $limit = " limit " . $limit . " offset " . $start;
        $w = " (nama ilike ('%$q%') or kode ilike ('%$q%')) ";
        $sql = "select *, coalesce(kode, '') as kode 
                from sm_spesialisasi 
                where $w and kode_bpjs != '' order by nama";


        $data['data'] = $this->db->query($sql . $limit)->result();
        $data['total'] = $this->db->query($sql)->num_rows();
        return $data;
    }

}

