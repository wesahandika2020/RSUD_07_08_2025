<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Inventory extends SYAM_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('App_model', 'm_default');
        $this->load->model('Masterdata_model', 'm_masterdata');
		$this->load->model('Inventory_model', 'm_inventory');
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

	function printing_penerimaan($id_penerimaan)
	{
        $data['title'] = 'Cetak Penerimaan';
		$data['hospital'] = $this->m_default->getDataHospital();
		$data['location'] = $this->m_default->getDataUserInstalasi($this->session->userdata('id_unit'))->row();
		$data['list_data'] = $this->m_inventory->getListDataFakturPenerimaan($id_penerimaan)->result();
		$this->load->view('printing/penerimaan/cetak_penerimaan', $data);
	}

	function printing_penerimaan_bank_darah($id_penerimaan)
	{
        $data['title'] = 'Cetak Penerimaan';
		$data['hospital'] = $this->m_default->getDataHospital();
		$data['location'] = $this->m_default->getDataUserInstalasi($this->session->userdata('id_unit'))->row();
		$data['list_data'] = $this->m_inventory->getListDataFakturPenerimaanBankDarah($id_penerimaan)->result();
		$this->load->view('printing/penerimaan/cetak_penerimaan', $data);
	}
}