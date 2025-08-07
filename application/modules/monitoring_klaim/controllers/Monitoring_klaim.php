<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Monitoring_klaim extends SYAM_Controller
{

    function __construct()
    {
        parent::__construct();
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

    function page_monitoring_klaim()
    {
        $this->load->view('index');
    }

    function page_data_kunjungan()
    {
        $this->load->view('under_construction');
    }

    function page_data_klaim()
    {
        $data['jenis_pelayanan'] = ['' => 'Pilih...', '1' => 'Rawat Inap', '2' => 'Rawat Jalan'];
        $data['status_klaim'] = ['' => 'Pilih...', '1' => 'Proses Verifikasi', '2' => 'Pending Verifikasi', '3' => 'Klaim'];
        $this->load->view('data_klaim_modal', $data);
    }

    function page_history_pelayanan()
    {
        $this->load->view('under_construction');
    }

    function page_klaim_jasaraharja()
    {
        $this->load->view('under_construction');
    }
    
}
