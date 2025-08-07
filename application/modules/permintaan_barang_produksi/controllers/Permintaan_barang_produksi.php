<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Permintaan_barang_produksi extends SYAM_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('App_model', 'default');
		$this->load->model('Masterdata_model', 'm_masterdata');
		$this->load->model('inventory/Inventory_model', 'm_inventory');
		$this->load->model('Permintaan_barang_produksi_model', 'm_permintaan_barang');
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

	public function page_permintaan_barang_produksi()
	{
		$data['unit']            = $this->m_inventory->getUnit();
		$data['kategori_barang'] = $this->m_masterdata->kategoriBarangLoadData('')->result();
		$this->load->view('index', $data);
	}

	function printing_bukti_permintaan_barang()
	{
		$id = safe_get('id');
		$data['title'] = 'Bukti Permintaan Barang';
		$data['hospital'] = $this->default->getDataHospital();
		$data['list_data'] = $this->m_permintaan_barang->getDataPermintaanBarang($id);
		$this->load->view('printing/cetak_bukti_permintaan_barang', $data);
	}
}
