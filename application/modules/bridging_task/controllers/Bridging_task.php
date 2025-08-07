<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Bridging_task extends SYAM_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('App_model', 'default');
        $this->load->model('Masterdata_model', 'masterdata');
        $this->load->model('Bridging_task_model', 'bridging');
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

    function page_bridging_task()
    {
        $data['status_antrean'] = $this->bridging->getStatusBridging();
        $data['task'] = $this->bridging->getTask();
        $data['status_task'] = $this->bridging->getBridgingTask();
        $this->load->view('index', $data);
    }

}
