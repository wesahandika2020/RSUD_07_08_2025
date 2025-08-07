<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Panggil_pasien extends SYAM_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('App_model', 'default');
        $this->load->model('Masterdata_model', 'masterdata');
        $this->load->model('Panggil_pasien_model', 'call');
    }

    function index()
    {
        $data['active'] = 'Masterdata';
        $data['modules'] = $this->default->getDataModules($this->session->userdata('id_account_group'));
        $is_login = $this->session->userdata('is_login');

        if ($is_login === true) :
            $data['hospital'] = $this->default->getDataHospital();
            $this->load->view('layouts/index', $data);
        else :
            redirect('/');
        endif;
    }

    function page_panggil_pasien()
    {
        $data['loket_antrean'] = $this->call->getLoketAntrean();
        $data['filter_loket'] = $this->call->getFilterLoket(); 
        $this->load->view('index', $data);
    }
    
}
