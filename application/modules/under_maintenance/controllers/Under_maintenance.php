<?php

defined('BASEPATH') or exit('No direct script access allowed');

// require('./application/third_party/phpoffice/vendor/autoload.php');

class Under_maintenance extends SYAM_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('App_model', 'm_default');
        $this->load->model('Masterdata_model', 'm_masterdata');
    }

    public function index()
    {
        $data['active']  = 'Under Maintenance';
        $data['modules'] = $this->m_default->getDataModules($this->session->userdata('id_account_group'));
        $is_login        = $this->session->userdata('is_login');

        if ($is_login === true) :
            $data['hospital'] = $this->m_default->getDataHospital();
            $this->load->view('layouts/index', $data);

        else :
            redirect('/');

        endif;
    }

    public function page_under_maintenance()
    {
        $this->load->view('index');
    }
}
