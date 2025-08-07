<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Logs extends SYAM_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Logs_model', 'logs');
        $this->load->model('App_model', 'default');
        $this->load->model('Masterdata_model', 'masterdata');
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

    function page_logs()
    {
        $this->load->view('logs/logs/index');
    }

    function page_admin_logs()
    {
        $data["jenis_layanan"] = $this->masterdata->getJenisPelayanan(true);
        $data["keterangan"] = $this->logs->opsiAdminLogs(true);
        $data["jenis_igd"] = $this->masterdata->getJenisIGD();
        $this->load->view('logs/admin_logs/index', $data);
    }

    function page_masterdata_logs()
    {
        $data['action'] = [
            ''       => "Semua", 
            'Insert' => 'Insert',
            'Update' => 'Update',
            'Delete' => 'Delete',
        ];

        $data['masterdata'] = $this->logs->getMasterdataLogsCategory();
        $this->load->view('logs/masterdata_logs/index', $data);
    }
}
