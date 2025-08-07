<?php
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

/**
 * @package         CodeIgniter
 * @subpackage      Rest Server
 * @category        Controller
 * @author          Faiz Muhammad Syam
 * @license         Syams Corporation
 */
class Distribusi_logistik extends REST_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->limit = 10;
		date_default_timezone_set('Asia/Jakarta');
		$this->datetime = date('Y-m-d H:i:s');
		$this->load->model('Distribusi_logistik_model', 'distribusi');

		$id_translucent = $this->session->userdata('id_translucent');
		if (empty($id_translucent)) :
			$this->response(array('error' => 'Anda belum login'), REST_Controller::HTTP_UNAUTHORIZED);
			exit();
		endif;
	}

    function get_list_distribusi_logistik_get()
    {
        if (!$this->get('page')) :
			$this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
		endif;
		$limit = 50;
		$start          = ($this->get('page') - 1) * $limit;
		$search         = [
			'id' => $this->get('id', true),
			'tanggal_awal_minta'  => safe_get('tanggal_awal_minta'),
			'tanggal_akhir_minta' => safe_get('tanggal_akhir_minta'),
			'tanggal_awal_kirim'  => safe_get('tanggal_awal_kirim'),
			'tanggal_akhir_kirim' => safe_get('tanggal_akhir_kirim'),
			'kategori_barang' => safe_get('kategori_barang'), 
			'unit' => safe_get('unit'), 
            'status' => safe_get('status'), 
            'no_distribusi' => safe_get('no_distribusi'), 
		];

		$data            = $this->distribusi->getListDataDistribusi((int)$limit, (int)$start, $search);
		$data['page']    = (int) $this->get('page');
		$data['limit']   = $limit;

		if ($data) :
			$this->response($data, REST_Controller::HTTP_OK); // (200)
		else :
			$this->response(array('error' => 'Data is Not Found'), REST_Controller::HTTP_NOT_FOUND);
		endif;
	}

	function simpan_distribusi_logistik_post()
	{	
		$data = $this->distribusi->simpanDataDistribusi();
		$this->response($data, REST_Controller::HTTP_OK);
	}

	function get_data_distribusi_logistik_get()
	{
		$data = $this->distribusi->getDataDistribusi($this->get('id', true));
		$this->response($data, REST_Controller::HTTP_OK);
	}
}
