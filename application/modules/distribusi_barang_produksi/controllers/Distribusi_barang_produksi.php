<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Distribusi_barang_produksi extends SYAM_Controller{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('App_model', 'default');
		$this->load->model('Masterdata_model', 'm_masterdata');
		$this->load->model('inventory/Inventory_model', 'm_inventory');
		$this->load->model('Distribusi_barang_produksi_model', 'm_distribusi');
	}

	public function index()
	{
		$data['active']  = 'Masterdata';
		$data['modules'] = $this->default->getDataModules($this->session->userdata('id_account_group'));
		$is_login        = $this->session->userdata('is_login');

		if ($is_login === true) :
			$data['hospital'] = $this->default->getDataHospital();
			$this->load->view('layouts/index', $data);
		else :
			redirect('/');
		endif;
	}

	public function page_distribusi_barang_produksi()
	{
		$this->load->view('index');
	}

	function printing_bukti_distribusi()
	{
		$id = safe_get('id');
		$data['title'] = 'Bukti Distribusi Barang';
		$data['hospital'] = $this->default->getDataHospital();
		$data['list_data'] = $this->m_distribusi->getDataDistribusiCetak($id);
		$this->load->view('printing/cetak_bukti_distribusi', $data);
	}
}
