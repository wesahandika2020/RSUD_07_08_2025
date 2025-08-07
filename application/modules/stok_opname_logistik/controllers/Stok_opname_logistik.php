<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Stok_opname_logistik extends SYAM_Controller 
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('App_model', 'm_default');
		$this->load->model('Masterdata_model', 'm_masterdata');
		$this->load->model('Stok_opname_logistik_model', 'logistik');
		$this->load->model('Inventori_rt/Inventori_rt_model', 'inventori');
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

	function page_stok_logistik()
	{
		$data['kategori_barang'] = $this->logistik->ambilDataKategoriBarang();
		$data['pembayaran'] = $this->inventori->getJenisPembayaran();
		$this->load->view('index', $data);
	}
}