<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pemusnahan_logistik extends SYAM_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('App_model', 'm_default');
        $this->load->model('pemusnahan_logistik/Pemusnahan_logistik_model', 'pemusnahan');
    }

    function index()
    {
        $data['active'] = 'Inventori';
        $data['modules'] = $this->m_default->getDataModules($this->session->userdata('id_account_group'));
        $is_login = $this->session->userdata('is_login');

        if ($is_login === true) :
            $data['hospital'] = $this->m_default->getDataHospital();
            $this->load->view('layouts/index', $data);
        else :
            redirect('/');
        endif;
    }

    function page_pemusnahan_logistik()
    {
        $this->load->view('pemusnahan_logistik/index');
    }

    function printing_bukti_pemusnahan()
    {
        $idPemusnahan = safe_get('id');
        $data['title'] = 'BUKTI PEMUSNAHAN LOGISTIK';
        $data['hospital'] = $this->m_default->getDataHospital();
        $data['data'] = $this->pemusnahan->getDataPemusnahanLogistik($idPemusnahan)->result();
        $this->load->view('printing/cetak_bukti_pemusnahan_logistik', $data);
    }
}