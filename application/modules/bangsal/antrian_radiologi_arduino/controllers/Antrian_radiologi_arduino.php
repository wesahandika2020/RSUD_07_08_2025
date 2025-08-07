<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Antrian_radiologi_arduino extends SYAM_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('App_model', 'default');
        $this->load->model('Masterdata_model', 'auto');
        $this->load->model('Antrian_radiologi_arduino_model', 'rad_arduino');
    }

    function index()
    {
        $data['active'] = 'Masterdata';
        $data['modules'] = $this->default->getDataModules($this->session->userdata('id_account_group'));
        $is_login = $this->session->userdata('is_login');

        // if ($is_login === true) :
        //     $data['hospital'] = $this->default->getDataHospital();
        //     $this->load->view('layouts/index', $data);

        // else :
        //     redirect('/');

        // endif;
    }

    // function page_antrian_radiologi_arduino()
    // {
    //     $data['ruangRadiologi']      = $this->auto->getRuangRadiologi(null);
    //     $this->load->view('index', $data);
    // }

}
