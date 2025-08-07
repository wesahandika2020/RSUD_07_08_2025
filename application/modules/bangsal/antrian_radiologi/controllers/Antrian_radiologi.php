<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Antrian_radiologi extends SYAM_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('App_model', 'default');
        $this->load->model('Masterdata_model', 'auto');
        $this->load->model('Antrian_radiologi_model', 'antrian_rad_model');
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

    function page_antrian_radiologi()
    {
        $data['ruangRadiologi']      = $this->auto->getRuangRadiologi(null);
        $this->load->view('index', $data);
    }

    function cetak_antrian_rad($id)
    {
        if ($id !== null) {
            $data['title'] = 'Cetak Nomor Antrian Radiologi';
            $data['admisi'] = $this->antrian_rad_model->antrianRadiologiById($id);
            $data['hospital'] = $this->default->getDataHospital();
            $this->load->view('antrian_radiologi/printing/tiket_antrian', $data);
        }
    }

    public function page_monitor_antrian()
	{
		$this->load->view('monitor_antrian.php');
	}


    function page_antrian_radiologi_call()
    {
        $data['ruangRadiologi']      = $this->auto->getRuangRadiologi(null);
        $this->load->view('monitor_antrian_call', $data);
    }
}
