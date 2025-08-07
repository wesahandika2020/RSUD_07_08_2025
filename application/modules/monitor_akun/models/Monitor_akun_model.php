<?php
defined('BASEPATH') or exit('No direct script access allowed');
use \LZCompressor\LZString;

class Monitor_akun_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('App_model', 'm_default');
    }

    private function sqlDataMonitorAkun()
    {
        $this->db->select("pa.*, ab.kode_booking, ur.account as nama_account", false);

        $this->db->from('sm_panggilan_antrian as pa')
            ->join('sm_antrian_bpjs as ab', 'ab.id = pa.id_antrian', 'left')
            ->join('sm_translucent as ur', 'ur.id = pa.user_create', 'left');
            
        return $this->db->order_by('pa.id', 'asc');
        
    }

    private function _listDataMonitorAkun($limit = 0, $start = 0)
    {
        $this->sqlDataMonitorAkun();
        if ($limit !== 0) :
            $this->db->limit($limit, $start);
        endif;

        return $this->db->get()->result();
    }

    function dataMonitorAkun($limit = 0, $start = 0)
    {
        $result['data'] = $this->_listDataMonitorAkun($limit, $start);
        $result['jumlah'] = $this->sqlDataMonitorAkun()->get()->num_rows();
        return $result;

        $this->db->close();
    }

    private function sqlDataMonitorAkunLantaiDua()
    {
        $this->db->select("pa.*, ab.kode_booking, ur.account as nama_account", false);

        $this->db->from('sm_antrian_lantai_dua as pa')
            ->join('sm_antrian_bpjs as ab', 'ab.id = pa.id_antrian', 'left')
            ->join('sm_translucent as ur', 'ur.id = pa.user_create', 'left');
            
        return $this->db->order_by('pa.id', 'asc');
        
    }

    private function _listDataMonitorAkunLantaiDua($limit = 0, $start = 0)
    {
        $this->sqlDataMonitorAkunLantaiDua();
        if ($limit !== 0) :
            $this->db->limit($limit, $start);
        endif;

        return $this->db->get()->result();
    }

    function dataMonitorAkunLantaiDua($limit = 0, $start = 0)
    {
        $result['data'] = $this->_listDataMonitorAkunLantaiDua($limit, $start);
        $result['jumlah'] = $this->sqlDataMonitorAkunLantaiDua()->get()->num_rows();
        return $result;

        $this->db->close();
    }
    
}

