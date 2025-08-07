<?php

use Restserver\Libraries\REST_Controller;

defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH.'/libraries/REST_Controller.php';

class Permintaan_barang_produksi extends REST_Controller
{
	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->limit = 10;
		$this->datetime = date('Y-m-d H:i:s');
		$this->load->model('Permintaan_barang_produksi_model', 'm_permintaan_barang');

		$id_translucent = $this->session->userdata('id_translucent');
		if (empty($id_translucent)) :
			$this->response(array('error' => 'Anda belum login'), REST_Controller::HTTP_UNAUTHORIZED);
			exit();
		endif;
	}

	public function get_list_barang_unit_sisa_stok_get()
	{
		if (!$this->get('page')) :
			$this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
		endif;
		$limit = 15;
		$start          = ($this->get('page') - 1) * $limit;
		$search         = [
			'jenis' => safe_get('jenis'),
			'kategori' => safe_get('kategori'),
			'id_barang' => safe_get('barang'),
			'unit' => $this->session->userdata('id_unit'),
			'abaikaned' => safe_get('abaikaned'),
			'nama' => safe_get('keyword'),
		];

		$data            = $this->m_permintaan_barang->getListDataBarangUnitSisaStok($limit, $start, $search);
		$data['page']    = (int) $this->get('page');
		$data['limit']   = $limit;

		if ($data) :
			$this->response($data, REST_Controller::HTTP_OK); // (200)
		else :
			$this->response(array('error' => 'Data is Not Found'), REST_Controller::HTTP_NOT_FOUND);
		endif;
	}

	function simpan_permintaan_barang_produksi_post()
	{
		$data = $this->m_permintaan_barang->simpanDataPermintaanBarang();
		$this->response($data, REST_Controller::HTTP_OK);
	}

	function get_list_permintaan_barang_produksi_get()
	{
		if (!$this->get('page')) :
			$this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
		endif;
		$start          = ($this->get('page') - 1) * $this->limit;
		$search         = [
			'id' => $this->get('id'),
			'tanggal_awal'  => safe_get('tanggal_awal'),
			'tanggal_akhir' => safe_get('tanggal_akhir'),
			'id_barang' => safe_get('barang'),
			'unit' => $this->session->userdata('id_unit'),
		];

		$data            = $this->m_permintaan_barang->getListDataPermintaanBarang($this->limit, $start, $search);
		$data['page']    = (int) $this->get('page');
		$data['limit']   = $this->limit;

		if ($data) :
			$this->response($data, REST_Controller::HTTP_OK); // (200)
		else :
			$this->response(array('error' => 'Data is Not Found'), REST_Controller::HTTP_NOT_FOUND);
		endif;
	}

	function get_permintaan_barang_get()
	{
		if (!$this->get('id')) :
			$this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
		endif;
		$data = $this->m_permintaan_barang->getDataPermintaanBarang($this->get('id', true));
		if ($data) :
			$this->response($data, REST_Controller::HTTP_OK); // (200)
		else :
			$this->response(array('error' => 'Data is Not Found'), REST_Controller::HTTP_NOT_FOUND);
		endif;
	}

	function delete_permintaan_barang_delete()
	{
		$id = $this->get('id', true);
		$data = $this->m_permintaan_barang->deleteDataPenerimaanBarang($id);
		$this->response($data, REST_Controller::HTTP_OK);
	}
}
