<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penerimaan_logistik extends SYAM_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('App_model', 'm_default');
        $this->load->model('Masterdata_model', 'm_masterdata');
        $this->load->model('inventori_rt/Inventori_rt_model', 'inventori');
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

    function page_penerimaan_logistik()
    {
        $data['no_penerimaan'] = $this->inventori->generateNoUrutPenerimaan();
        $data['jenis_penerimaan'] = $this->inventori->getJenisPenerimaan();
        $data['pembayaran'] = $this->inventori->getJenisPembayaran();
        $data['kategori_barang'] = $this->m_masterdata->kategoriBarangLoadData('Rumah Tangga')->result();
        $data['jenis'] = 'Bank Darah';
        $this->load->view('penerimaan_logistik/index', $data);
	}
}