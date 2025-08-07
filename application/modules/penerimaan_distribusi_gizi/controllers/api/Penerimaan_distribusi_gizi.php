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
class Penerimaan_distribusi_gizi extends REST_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->limit = 10;
		date_default_timezone_set('Asia/Jakarta');
		$this->datetime = date('Y-m-d H:i:s');
		$this->load->model('Penerimaan_distribusi_gizi_model', 'penerimaan');

		$id_translucent = $this->session->userdata('id_translucent');
		if (empty($id_translucent)) :
			$this->response(array('error' => 'Anda belum login'), REST_Controller::HTTP_UNAUTHORIZED);
			exit();
		endif;
	}

    function get_list_penerimaan_distribusi_get()
    {
        if (!$this->get('page')) :
			$this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
		endif;
		$limit = 50;
		$start          = ($this->get('page') - 1) * $limit;
		$search         = [
			'tanggal_awal'  => safe_get('tanggal_awal'),
			'tanggal_akhir' => safe_get('tanggal_akhir'),
			'no_distribusi' => safe_get('no_distribusi'), 
			'barang' => safe_get('barang'), 
		];

		$data            = $this->penerimaan->getListDataPenerimaanDistribusi($limit, $start, $search);
		$data['page']    = (int) $this->get('page');
		$data['limit']   = $limit;

		if ($data) :
			$this->response($data, REST_Controller::HTTP_OK); // (200)
		else :
			$this->response(array('error' => 'Data is Not Found'), REST_Controller::HTTP_NOT_FOUND);
		endif;
	}

	function simpan_penerimaan_distribusi_post()
	{	
		$check = $this->db->get_where('sm_penerimaan_distribusi_gizi', ['id_distribusi' => safe_post('no_distribusi')])->row();
		if (isset($check->id)) :
			$data = ['status' => false, 'message' => 'Data penerimaan distribusi sudah diinputkan!']; 
		endif;
		$data = $this->penerimaan->simpanDataPenerimaanDistribusi();
		$this->response($data, REST_Controller::HTTP_OK);
	}

	function delete_penerimaan_distribusi_delete()
	{
		$id = $this->get('id', true);
		$data = $this->penerimaan->deleteDataPenerimaanDistribusi($id);
		$this->response($data, REST_Controller::HTTP_OK);
	}
}
