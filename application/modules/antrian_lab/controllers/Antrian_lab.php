<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Antrian_lab extends SYAM_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('App_model', 'default');
        $this->load->model('Masterdata_model', 'auto');
		$this->load->model('Antrian_lab_model', 'm_antrian_lab');
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

    function cetak_antrian_lab($id)
    {
        if ($id !== null) {
            $data['title'] = 'Cetak Nomor Antrian Laboratorium';
            $data['admisi'] = $this->m_antrian_lab->antrianLabById($id);
            $data['hospital'] = $this->default->getDataHospital();
            $this->load->view('antrian_lab/printing/tiket_antrian', $data);
        }
    }

    public function page_tambah_antrian_lab_pasien()
	{
		$data = ['asdasd' => 'asdasd'];
		// $this->load->view('modal_tambah_atrian', $data);
		$this->load->view('modal_tambah_antrian_new', $data);
	}

    public function page_list_antrian_lab_pasien()
	{
		$data = ['asdasd' => 'asdasd'];
		$this->load->view('index', $data);
	}

    public function page_monitor_antrian()
	{
		$this->load->view('monitor_antrian.php');
	}

    public function page_call_sampling()
    {
        // $data['ruangRadiologi']      = $this->antrian_rad_model->getRuangRadiologi(null);
        $data['ruangRadiologi']      = '';
        $this->load->view('modal_call_sampling', $data);
    }

    
}
