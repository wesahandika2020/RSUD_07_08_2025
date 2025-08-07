<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Permintaan_barang extends SYAM_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('App_model', 'm_default');
        $this->load->model('Masterdata_model', 'm_masterdata');
        $this->load->model('inventory/Inventory_model', 'm_inventory');
        $this->load->model('Permintaan_barang_model', 'm_permintaan_barang');
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

    function page_permintaan_barang()
    {
		$data['unit'] = $this->m_inventory->getUnit();
		$data['kategori_barang'] = $this->m_masterdata->kategoriBarangLoadData('')->result();
        $this->load->view('permintaan_barang/index', $data);
    }
    
    function printing_bukti_permintaan_barang()
    {
        $id = safe_get('id');
        $data['title'] = 'Bukti Permintaan Barang';
        $data['hospital'] = $this->m_default->getDataHospital();
        $data['list_data'] = $this->m_permintaan_barang->getDataPermintaanBarang($id);
        $this->load->view('printing/cetak_bukti_permintaan_barang', $data);
    }
}