<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Permintaan_gizi extends SYAM_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('App_model', 'm_default');
        $this->load->model('Masterdata_model', 'm_masterdata');
        $this->load->model('inventori_gizi/Inventori_gizi_model', 'inventori');
        $this->load->model('Permintaan_gizi_model', 'gizi');
    }

    function index()
    {
        $data['active'] = 'Inventory';
        $data['modules'] = $this->m_default->getDataModules($this->session->userdata('id_account_group'));
        $is_login = $this->session->userdata('is_login');

        if ($is_login === true) :
            $data['hospital'] = $this->m_default->getDataHospital();
            $this->load->view('layouts/index', $data);
        else :
            redirect('/');
        endif;
    }

    function page_permintaan_gizi()
    {
		$data['unit'] = $this->gizi->getKodeUnit();
        $data['kategori_barang'] = $this->m_masterdata->kategoriBarangLoadData('Gizi')->result();
        $this->load->view('permintaan_gizi/index', $data);
    }
    
    function printing_bukti_permintaan_gizi()
    {
        $id = safe_get('id');
        $data['title'] = 'Bukti Permintaan Barang';
        $data['hospital'] = $this->m_default->getDataHospital();
        $data['list_data'] = $this->gizi->getDataPermintaanGizi($id);
        $this->load->view('printing/cetak_bukti_permintaan_gizi', $data);
    }
}