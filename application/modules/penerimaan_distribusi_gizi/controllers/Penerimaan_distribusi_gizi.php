<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penerimaan_distribusi_gizi extends SYAM_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('App_model', 'm_default');
        $this->load->model('Masterdata_model', 'm_masterdata');
        $this->load->model('inventori_gizi/Inventori_gizi_model', 'inventori');
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

    function page_penerimaan_distribusi_gizi()
    {
        $this->load->view('penerimaan_distribusi_gizi/index');
	}
}