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
class Pemakaian_barang_unit extends REST_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->limit = 10;
		$this->datetime = date('Y-m-d H:i:s');
		$this->load->model('Pemakaian_barang_unit_model', 'm_pemakaian_barang_unit');

		$id_translucent = $this->session->userdata('id_translucent');
		if (empty($id_translucent)) :
			$this->response(array('error' => 'Anda belum login'), REST_Controller::HTTP_UNAUTHORIZED);
			exit();
		endif;
	}

    function get_list_pemakaian_barang_unit_get()
    {
        if (!$this->get('page')) :
			$this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
		endif;
		$start          = ($this->get('page') - 1) * $this->limit;
		$search         = [
			'tanggal_awal'  => safe_get('tanggal_awal'),
			'tanggal_akhir' => safe_get('tanggal_akhir'),
            'barang' => safe_get('barang'),  
		];

		$data            = $this->m_pemakaian_barang_unit->getListDataPemakaianBarangUnit($this->limit, $start, $search);
		$data['page']    = (int) $this->get('page');
		$data['limit']   = $this->limit;

		if ($data) :
			$this->response($data, REST_Controller::HTTP_OK); // (200)
		else :
			$this->response(array('error' => 'Data is Not Found'), REST_Controller::HTTP_NOT_FOUND);
		endif;
	}

	function simpan_pemakaian_barang_unit_post()
	{
		$data = $this->m_pemakaian_barang_unit->simpanDataPemakaianBarangUnit();
		$this->response($data, REST_Controller::HTTP_OK);
	}

	function delete_pemakaian_barang_unit_delete()
	{
		$data = $this->m_pemakaian_barang_unit->deleteDataPemakaianBarangUnit($this->get('id', true));
		$this->response($data, REST_Controller::HTTP_OK);
	}
}
