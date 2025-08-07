<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Stok extends SYAM_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('App_model', 'm_default');
        $this->load->model('Masterdata_model', 'm_masterdata');
        $this->load->model('inventory/Inventory_model', 'm_inventory');
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

    function page_stok()
    {
		$data['transaksi'] = $this->m_masterdata->getTransaksiInventory();
		$data['kategori_barang'] = $this->m_masterdata->kategoriBarangLoadData('')->result();
        $this->load->view('stok/index', $data);
	}
}