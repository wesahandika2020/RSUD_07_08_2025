<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Dashboard_bulan extends SYAM_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('App_model', 'default');
        $this->load->model('Masterdata_model', 'masterdata');
        $this->load->model('Dashboard_bulan_model', 'dashboard');
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

    function page_dashboard_bulan()
    {
        $data['jenis_waktu'] = $this->dashboard->getJenisWaktuDashboard();
        $data['bulan_dash'] = $this->dashboard->getBulan();
        $this->load->view('index', $data);
    }
    
}
