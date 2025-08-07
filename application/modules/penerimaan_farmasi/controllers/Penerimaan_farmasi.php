<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penerimaan_farmasi extends SYAM_Controller
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

    function page_penerimaan_farmasi()
    {
        $data['no_penerimaan'] = $this->m_inventory->generateNoUrutPenerimaan('Farmasi');
        $data['jenis_penerimaan'] = $this->m_inventory->getJenisPenerimaan();
        $data['kategori_barang'] = $this->m_masterdata->kategoriBarangLoadData('Farmasi')->result();
        $data['jenis'] = 'Farmasi';
        $this->load->view('penerimaan_farmasi/index', $data);
	}
}