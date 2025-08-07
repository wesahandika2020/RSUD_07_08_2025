<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Bridging_antrian extends SYAM_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('App_model', 'default');
        $this->load->model('Masterdata_model', 'masterdata');
        $this->load->model('Bridging_antrian_model', 'bridging');
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

    function page_bridging_antrian()
    {
        $data['status_antrean'] = $this->bridging->getStatusBridging();
        $data['status_bridging'] = $this->bridging->getBridgingAntrian();
        $this->load->view('index', $data);
    }

}
