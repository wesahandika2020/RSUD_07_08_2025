<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Stok_opname extends SYAM_Controller 
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('App_model', 'm_default');
		$this->load->model('Masterdata_model', 'm_masterdata');
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

	function page_stok_opname()
	{
		$data['kategori_barang'] = $this->m_masterdata->kategoriBarangLoadData2();
		$this->load->view('index', $data);
	}
}