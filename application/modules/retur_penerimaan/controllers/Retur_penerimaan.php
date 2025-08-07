<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Retur_penerimaan extends SYAM_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('App_model', 'm_default');
        $this->load->model('Masterdata_model', 'm_masterdata');
        $this->load->model('inventory/Inventory_model', 'm_inventory');
        $this->load->model('Retur_penerimaan_model', 'm_retur_penerimaan');
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

    function page_retur_penerimaan()
    {
        $this->load->view('retur_penerimaan/index');
    }

    function printing_bukti_retur_penerimaan()
    {
        $id = safe_get('id');
        $data['title'] = 'Bukti Retur Penerimaan Barang';
        $data['hospital'] = $this->m_default->getDataHospital();
		$data['list_data'] = $this->m_retur_penerimaan->getDataReturPenerimaanCetak($id);
        $this->load->view('printing/cetak_bukti_retur_penerimaan', $data);
    }
}