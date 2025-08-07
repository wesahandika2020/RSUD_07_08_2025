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
class Koreksi_stok_logistik extends REST_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->limit = 10;
		date_default_timezone_set('Asia/Jakarta');
		$this->datetime = date('Y-m-d H:i:s');
		$this->load->model('Koreksi_stok_logistik_model', 'koreksi');

		$id_translucent = $this->session->userdata('id_translucent');
		if (empty($id_translucent)) :
			$this->response(array('error' => 'Anda belum login'), REST_Controller::HTTP_UNAUTHORIZED);
			exit();
		endif;
	}

	function get_list_stok_logistik_get()
	{
		if (!$this->get('page')) :
			$this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
		endif;
		$start          = ((int)$this->get('page') - 1) * (int)$this->limit;
		$search         = [
			'tanggal_awal'  => safe_get('tanggal_awal'),
			'tanggal_akhir' => safe_get('tanggal_akhir'),
			'id_barang' => safe_get('barang'),  
		];

		$data            = $this->koreksi->getListKoreksiStokLogistik((int)$this->limit, (int)$start, $search);
		$data['page']    = (int) $this->get('page');
		$data['limit']   = (int)$this->limit;

		if ($data) :
			$this->response($data, REST_Controller::HTTP_OK); // (200)
		else :
			$this->response(array('error' => 'Data is Not Found'), REST_Controller::HTTP_NOT_FOUND);
		endif;
	}

	function simpan_koreksi_stok_logistik_post()
	{	
		
		$data = $this->koreksi->simpanKoreksiStokLogistik();
		
		$this->response($data, REST_Controller::HTTP_OK);
	}

	function cek_stok_logistik_get()
	{	
		
		$id = $this->get('id_barang', true);
		$waktu = $this->get('ed', true);

		$data = $this->koreksi->cekStok($id, $waktu);
		
		$this->response($data, REST_Controller::HTTP_OK);

	}

	function cek_expired_get()
	{	
		
		$id = $this->get('id', true);
		
		$data = $this->koreksi->cekExpired($id);
		
		$this->response($data, REST_Controller::HTTP_OK);

	}
}