<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Wilayah extends SYAM_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('App_model', 'default');
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

    function page_wilayah()
    {
        $this->load->view('index');
    }

    function page_provinsi()
    {
        $this->load->view('provinsi/index');
    }

    function page_kota_kabupaten()
    {
        $this->load->view('kota_kabupaten/index');
    }

    function page_kecamatan()
    {
        $this->load->view('kecamatan/index');
    }

    function page_kelurahan()
    {
        $this->load->view('kelurahan/index');
    }

    
}
