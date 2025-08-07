<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Koreksi_stok_darah extends SYAM_Controller 
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('App_model', 'm_default');
		$this->load->model('Masterdata_model', 'm_masterdata');
		$this->load->model('Koreksi_stok_darah_model', 'm_koreksi_stok_darah');
	}

	function index()
	{
		$data['active'] = 'Koreksi Stok Darah';
		$data['modules'] = $this->m_default->getDataModules($this->session->userdata('id_account_group'));
		$is_login = $this->session->userdata('is_login');

		if ($is_login === true) :
			$data['hospital'] = $this->m_default->getDataHospital();
			$this->load->view('layouts/index', $data);
		else :
			redirect('/');
		endif;
	}

	function page_koreksi_stok_darah()
	{
		$data['kategori_barang'] = $this->m_masterdata->kategoriBarangLoadData('')->result();
		$this->load->view('index', $data);
	}

	function printing_koreksi_stok_darah($id = NULL)
	{
		$data = $this->m_koreksi_stok->getKoreksiStokDarah($id);
		$data['kagetori'] = $id;
		$this->load->view('printing/cetak_koreksi_stok_darah', $data);
	}

	function export_koreksi_stok_darah()
	{
		$search         = [
			'tanggal_awal' 		=> safe_get('tanggal_awal'),
			'tanggal_akhir' 	=> safe_get('tanggal_akhir'),
			'id_barang' 			=> safe_get('barang'),  
		];
		$data = $this->m_koreksi_stok_darah->getListDataKoreksiStokDarah(0, 0, $search);
		$this->load->view('export/export_data_koreksi_stok_darah', $data);
	}
}