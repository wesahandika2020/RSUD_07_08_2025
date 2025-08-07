<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Dashboard_tanggal extends SYAM_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('App_model', 'default');
        $this->load->model('Masterdata_model', 'masterdata');
        $this->load->model('Dashboard_tanggal_model', 'dashboard');
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

    function page_dashboard_tanggal()
    {
        $data['jenis_waktu'] = $this->dashboard->getJenisWaktuDashboard();
        $this->load->view('index', $data);
    }
    
}
