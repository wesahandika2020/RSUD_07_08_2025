<?php

defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

/**
 * @package         CodeIgniter
 * @subpackage      Rest Server
 * @category        Controller
 * @author          Muhamad Wahyudin
 * @license         Syams Corporation
 */
class Laporan_ppi extends REST_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->limit    = 50;
		$this->datetime = date('Y-m-d H:i:s');
		$this->load->model('Laporan_ppi_model', 'model_ppi');

		$id_translucent = $this->session->userdata('id_translucent');
		if (empty($id_translucent)) :
			$this->response(array('error' => 'Anda belum login'), REST_Controller::HTTP_UNAUTHORIZED);
			exit();
		endif;
	}

	function get_list_laporan_bulanan_get()
	{ 
		if (!$this->get('page')) :
			$this->response(null, REST_Controller::HTTP_BAD_REQUEST); // (400)
		endif;

		$start  = ($this->get('page') - 1) * $this->limit;
		$search = [
			'bulan'    				=> safe_get('bulan'),
			'tahun'    				=> safe_get('tahun'),
			'bangsal_search'  => safe_get('bangsal_search'),
			'status_pasien'   => safe_get('status_pasien'),
			'keyword'       	=> safe_get('keyword'),
			'kultur'       		=> safe_get('kultur'),
			'antiobika'       => safe_get('antiobika'),
		];

		// $data          = $this->model_ppi->getListDataLaporanMutasiObat( 0, 0, $search );
		$data          = $this->model_ppi->getListDataLaporanBulanPPI($this->limit, $start, $search);
		$data['page']  = (int) $this->get('page');
		$data['limit'] = $this->limit;

		if ($data) :
			$this->response($data, REST_Controller::HTTP_OK); // (200)
		else :
			$this->response(array('error' => 'Data is Not Found'), REST_Controller::HTTP_NOT_FOUND);
		endif;
	}

	function get_list_laporan_kultur_get()
	{ 
		if (!$this->get('page')) :
			$this->response(null, REST_Controller::HTTP_BAD_REQUEST); // (400)
		endif;

		$start  = ($this->get('page') - 1) * $this->limit;
		$search = [
			'bulan'    				=> safe_get('bulan'),
			'tahun'    				=> safe_get('tahun'),
			'bangsal_search'  => safe_get('bangsal_search'),
			'status_pasien'   => safe_get('status_pasien'),
			'keyword'       	=> safe_get('keyword'),
			'kultur'       		=> safe_get('kultur'),
			'antiobika'       => safe_get('antiobika'),
		];

		// $data          = $this->model_ppi->getListDataLaporanMutasiObat( 0, 0, $search );
		$data          = $this->model_ppi->getListDataLaporanKultur($this->limit, $start, $search);
		$data['page']  = (int) $this->get('page');
		$data['limit'] = $this->limit;

		if ($data) :
			$this->response($data, REST_Controller::HTTP_OK); // (200)
		else :
			$this->response(array('error' => 'Data is Not Found'), REST_Controller::HTTP_NOT_FOUND);
		endif;
	}

	function get_list_laporan_antiobika_get()
	{ 
		if (!$this->get('page')) :
			$this->response(null, REST_Controller::HTTP_BAD_REQUEST); // (400)
		endif;

		$start  = ($this->get('page') - 1) * $this->limit;
		$search = [
			'bulan'    				=> safe_get('bulan'),
			'tahun'    				=> safe_get('tahun'),
			'bangsal_search'  => safe_get('bangsal_search'),
			'status_pasien'   => safe_get('status_pasien'),
			'keyword'       	=> safe_get('keyword'),
			'kultur'       		=> safe_get('kultur'),
			'antiobika'       => safe_get('antiobika'),
		];

		// $data          = $this->model_ppi->getListDataLaporanMutasiObat( 0, 0, $search );
		$data          = $this->model_ppi->getListDataLaporanAntiobika($this->limit, $start, $search);
		$data['page']  = (int) $this->get('page');
		$data['limit'] = $this->limit;

		if ($data) :
			$this->response($data, REST_Controller::HTTP_OK); // (200)
		else :
			$this->response(array('error' => 'Data is Not Found'), REST_Controller::HTTP_NOT_FOUND);
		endif;
	}
}
