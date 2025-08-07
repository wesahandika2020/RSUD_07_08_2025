<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Upload_csv extends SYAM_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->waktu_cetak = date('d/m/Y H:i');
        $this->load->model('App_model', 'm_default');
        $this->load->model('Masterdata_model', 'm_masterdata');
        $this->load->model('Upload_csv_model', 'm_upload');
    }

    function index()
    {
        $data['active'] = 'Upload CSV';
        $data['modules'] = $this->m_default->getDataModules($this->session->userdata('id_account_group'));
        $is_login = $this->session->userdata('is_login');

        if ($is_login === true) :
            $data['hospital'] = $this->m_default->getDataHospital();
            $this->load->view('layouts/index', $data);

        else :
            redirect('/');

        endif;
    }

    function getJenisCSV()
    {
        return array(
            "01"                => "Data Tarif eKlaim BPJS",
            "02"                => "Data Pending eKlaim BPJS",
        );
    }

    function page_upload_csv()
    {
        $data['jenis_data'] = $this->getJenisCSV();

        $this->load->view('index', $data);
    }
}
