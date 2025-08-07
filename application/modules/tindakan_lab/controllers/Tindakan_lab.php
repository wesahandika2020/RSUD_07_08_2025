<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Tindakan_lab extends SYAM_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('App_model', 'default');
        $this->load->model('Masterdata_model', 'auto');
    }

    function index()
    {
        $data['active'] = 'Configs';
        $data['modules'] = $this->default->getDataModules($this->session->userdata('id_account_group'));
        $is_login = $this->session->userdata('is_login');

        if ($is_login === true) :
            $data['hospital'] = $this->default->getDataHospital();
            $this->load->view('layouts/index', $data);

        else :
            redirect('/');

        endif;
    }

    function page_pk()
    {
        $data['id_spesialisasi']   = $this->auto->getLayananPerInstalasi("Laboratorium","and nama<>'Patologi Anatomi'");
        $data['id_layanan']        = $this->auto->getTindakanLab();
        $data['kategori']          = $this->auto->getKategoriLab();
        $data['simbol']            = $this->auto->getSimbolLab();
        $data['satuan']            = $this->auto->getSatuanPerJenis("Pemeriksaan");
        $this->load->view('tindakan_lab/pk/index', $data);
    }

    function page_mb()
    {
        $this->load->view('tindakan_lab/mb/index');
    }

    public function page_tindakan_lab()
    {
        $this->load->view('index');  
    }

}

/* End of file Tindakan_lab.php */
