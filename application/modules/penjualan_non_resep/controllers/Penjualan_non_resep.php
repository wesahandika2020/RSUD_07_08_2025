<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penjualan_non_resep extends SYAM_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('App_model', 'm_default');
        $this->load->model('Masterdata_model', 'm_masterdata');
        $this->load->model('pelayanan/Pelayanan_model', 'm_pelayanan');
    }

    function index()
    {
        $data['active'] = 'Pelayanan';
        $data['modules'] = $this->m_default->getDataModules($this->session->userdata('id_account_group'));
        $is_login = $this->session->userdata('is_login');

        if ($is_login === true) :
            $data['hospital'] = $this->m_default->getDataHospital();
            $this->load->view('layouts/index', $data);

        else :
            redirect('/');

        endif;
    }

    function page_penjualan_non_resep()
    {
        $this->load->view('penjualan_non_resep/index');
    }
    
    function printing_penjualan_non_resep()
    {
        $id = safe_get('id');
        $data['title'] = 'BUKTI PENJUALAN NON RESEP / BEBAS';
        $data['hospital'] = $this->m_default->getDataHospital();
        $data['list_data'] = $this->m_pelayanan->getPenjualan($id)->result();
        $this->load->view('printing/cetak_bukti_penjualan_non_resep', $data);
    }
}