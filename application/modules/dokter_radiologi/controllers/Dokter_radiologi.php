<?php

defined('BASEPATH') or exit('No direct script access allowed');


class Dokter_radiologi extends SYAM_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('App_model', 'default');
        $this->load->model('Masterdata_model', 'auto');
        $this->load->model('Dokter_radiologi_model', 'radio');    
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

    function page_dokter_radiologi()
    {   
        $this->load->view('index');
    }

    
}
