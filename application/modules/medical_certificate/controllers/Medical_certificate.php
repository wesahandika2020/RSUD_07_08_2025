<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Medical_certificate extends SYAM_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('App_model', 'm_default');
        $this->load->model('Medical_certificate_model', 'm_medical_certificate');
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

    function page_medical_certificate()
    {
        $this->load->view('index');
    }

    function printing_medical_certificate($id)
    {
        if (!$id) :
            exit;
        endif;

        $data['title'] = 'SURAT KETERANGAN DOKTER (MEDICAL CERTIFICATE)';
        $data['hospital'] = $this->m_default->getDataHospital();
        $data['data'] = $this->m_medical_certificate->getDataMedicalCertificateById($id);

        $this->load->view('printing/cetak_surat_keterangan_dokter', $data);
    }
}
