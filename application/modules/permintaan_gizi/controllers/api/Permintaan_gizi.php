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
class Permintaan_gizi extends REST_Controller
{

	function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->limit = 10;
		$this->datetime = date('Y-m-d H:i:s');
		$this->load->model('Permintaan_gizi_model', 'gizi');

		$id_translucent = $this->session->userdata('id_translucent');
		if (empty($id_translucent)) :
			$this->response(array('error' => 'Anda belum login'), REST_Controller::HTTP_UNAUTHORIZED);
			exit();
		endif;
	}

    function get_list_gizi_unit_sisa_stok_get()
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

		$data            = $this->gizi->getListDataGiziUnitSisaStok($limit, $start, $search);
		$data['page']    = (int) $this->get('page');
		$data['limit']   = $limit;

		if ($data) :
			$this->response($data, REST_Controller::HTTP_OK); // (200)
		else :
			$this->response(array('error' => 'Data is Not Found'), REST_Controller::HTTP_NOT_FOUND);
		endif;
	}

	function simpan_permintaan_gizi_post()
	{
		$data = $this->gizi->simpanDataPermintaanGizi();
		$this->response($data, REST_Controller::HTTP_OK);
	}

	function get_list_permintaan_gizi_get()
    {
        if (!$this->get('page')) :
			$this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
		endif;
		$start          = ((int)$this->get('page') - 1) * (int)$this->limit;
		$search         = [
			'id' => $this->get('id'),
			'tanggal_awal'  => safe_get('tanggal_awal'),
			'tanggal_akhir' => safe_get('tanggal_akhir'),
            'id_barang' => safe_get('barang'),
		];

		$data            = $this->gizi->getListDataPermintaanGizi((int)$this->limit, (int)$start, $search);
		$data['page']    = (int) $this->get('page');
		$data['limit']   = (int)$this->limit;

		if ($data) :
			$this->response($data, REST_Controller::HTTP_OK); // (200)
		else :
			$this->response(array('error' => 'Data is Not Found'), REST_Controller::HTTP_NOT_FOUND);
		endif;
	}

	function get_permintaan_gizi_get()
	{
		if (!$this->get('id')) :
			$this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
		endif;
		$data = $this->gizi->getDataPermintaanGizi((int)$this->get('id', true));
		if ($data) :
			$this->response($data, REST_Controller::HTTP_OK); // (200)
		else :
			$this->response(array('error' => 'Data is Not Found'), REST_Controller::HTTP_NOT_FOUND);
		endif;
	}

	function kode_unit_get()
	{
		if (!$this->get('id')) :
			$this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
		endif;
		$data = $this->gizi->getKodeUnit();
		if ($data) :
			$this->response($data, REST_Controller::HTTP_OK); // (200)
		else :
			$this->response(array('error' => 'Data is Not Found'), REST_Controller::HTTP_NOT_FOUND);
		endif;
	}

	function delete_permintaan_gizi_delete()
	{
		$id = $this->get('id', true);
		$data = $this->gizi->deleteDataPenerimaanGizi((int)$id);
		$this->response($data, REST_Controller::HTTP_OK);
	}
}
