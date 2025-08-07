<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Permintaan_logistik extends SYAM_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('App_model', 'm_default');
        $this->load->model('Masterdata_model', 'm_masterdata');
        $this->load->model('inventori_rt/Inventori_rt_model', 'inventori');
        $this->load->model('Permintaan_logistik_model', 'logistik');
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

    function page_permintaan_logistik()
    {
		$data['unit'] = $this->logistik->getKodeUnit();
		$data['kategori_barang'] = $this->inventori->ambilDataKategoriBarang('')->result();
        $this->load->view('permintaan_logistik/index', $data);
    }
    
    function printing_bukti_permintaan_logistik()
    {
        $id = safe_get('id');
        $data['title'] = 'Bukti Permintaan Barang';
        $data['hospital'] = $this->m_default->getDataHospital();
        $data['list_data'] = $this->logistik->getDataPermintaanLogistik($id);
        $this->load->view('printing/cetak_bukti_permintaan_logistik', $data);
    }
}