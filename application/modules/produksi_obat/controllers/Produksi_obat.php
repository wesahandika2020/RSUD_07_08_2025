<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Produksi_obat extends SYAM_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('App_model', 'default');
		$this->load->model('Masterdata_model', 'm_masterdata');
		$this->load->model('Produksi_obat_model', 'm_produksi');
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

	public function page_produksi_obat()
	{
		$data['periode_laporan'] = $this->m_produksi->getPeriodeLaporan();
		$data['bulan'] = $this->m_masterdata->getBulan();
		$this->load->view('index', $data);
	}
}
