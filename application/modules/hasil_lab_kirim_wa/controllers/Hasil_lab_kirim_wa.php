<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Hasil_lab_kirim_wa extends SYAM_Controller 
{
    function __construct()
    {
        parent::__construct();
        $this->waktu_cetak = date('d/m/Y H:i');
        $this->load->model('App_model', 'default');
        $this->load->model('Masterdata_model', 'm_masterdata');
        // $this->load->model('Hasil_laboratorium_pa_model', 'lab_pa');
        // $this->load->model('Hasil_laboratorium_model', 'lab_model');

        $this->load->model('pelayanan/Pelayanan_model', 'm_pelayanan');
        $data_lis = $this->m_pelayanan->getLIS();

        $this->url = $data_lis->url;
        $this->user = $data_lis->user;
        $this->pass = $data_lis->pass;

    }

    function index()
    {
        $data['active'] = 'Pelayanan';
        $data['modules'] = $this->default->getDataModules($this->session->userdata('id_account_group'));
        $is_login = $this->session->userdata('is_login');

        if ($is_login === true) :
            $data['hospital'] = $this->default->getDataHospital();
            $this->load->view('layouts/index', $data);

        else :
            redirect('/');

        endif;
    }

    function page_hasil_lab_kirim_wa()
    {
        $data['jenis_tanggal']    = array('daftar' => 'Tanggal Daftar', 'keluar' => 'Tanggal Keluar');
        $this->load->view('index', $data);
    }

	

    
}
