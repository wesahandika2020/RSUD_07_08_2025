<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Kfa_satu_sehat extends SYAM_Controller 
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('App_model', 'm_default');
		$this->load->model('Masterdata_model', 'm_masterdata');
		$this->load->model('Kfa_satu_sehat_model', 'm_kfa_satu_sehat');
	}

	function index()
	{
		$data['active'] = 'KFA Satu Sehat';
		$data['modules'] = $this->m_default->getDataModules($this->session->userdata('id_account_group'));
		$is_login = $this->session->userdata('is_login');

		if ($is_login === true) :
			$data['hospital'] = $this->m_default->getDataHospital();
			$this->load->view('layouts/index', $data);
		else :
			redirect('/');
		endif;
	}

	function page_kfa_satu_sehat()
	{
		$data['kategori_barang'] = $this->m_masterdata->kategoriBarangLoadData('')->result();
		$this->load->view('index', $data);
	}
}