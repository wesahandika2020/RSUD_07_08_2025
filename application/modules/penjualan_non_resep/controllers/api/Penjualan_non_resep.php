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
class Penjualan_non_resep extends REST_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->limit = 10;
		$this->datetime = date('Y-m-d H:i:s');
		$this->load->model('Penjualan_non_resep_model', 'm_penjualan_non_resep');

		$id_translucent = $this->session->userdata('id_translucent');
		if (empty($id_translucent)) :
			$this->response(array('error' => 'Anda belum login'), REST_Controller::HTTP_UNAUTHORIZED);
			exit();
		endif;
	}

    function get_list_penjualan_get()
    {
        if (!$this->get('page')) :
			$this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
		endif;
		$limit = 10;
		$start          = ($this->get('page') - 1) * $limit;
		$search         = [
			'id' => safe_get('id'),
			'tanggal_awal' => safe_get('tanggal_awal'),
			'tanggal_akhir' => safe_get('tanggal_akhir'),
			'no_rm' => safe_get('no_rm'),
			'pembeli' => safe_get('pembeli'), 
            'barang' => safe_get('barang'),
            'status' => safe_get('status'),
		];

		$data            = $this->m_penjualan_non_resep->getListDataPenjualan($limit, $start, $search);
		$data['page']    = (int) $this->get('page');
		$data['limit']   = $limit;

		if ($data) :
			$this->response($data, REST_Controller::HTTP_OK); // (200)
		else :
			$this->response(array('error' => 'Data is Not Found'), REST_Controller::HTTP_NOT_FOUND);
		endif;
	}

	function simpan_penjualan_post()
	{
		$data = $this->m_penjualan_non_resep->simpanDataPenjualan();
		$this->response($data, REST_Controller::HTTP_OK);
	}

	function delete_penjualan_delete()
	{
		$id = $this->get('id', true);
		$data = $this->m_penjualan_non_resep->deleteDataPenjualan($id);
		$this->response($data, REST_Controller::HTTP_OK);
	}
}
