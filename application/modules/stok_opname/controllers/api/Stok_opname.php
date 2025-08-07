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
class Stok_opname extends REST_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->limit = 10;
		$this->datetime = date('Y-m-d H:i:s');
		$this->load->model('Stok_opname_model', 'm_stok_opname');

		$id_translucent = $this->session->userdata('id_translucent');
		if (empty($id_translucent)) :
			$this->response(array('error' => 'Anda belum login'), REST_Controller::HTTP_UNAUTHORIZED);
			exit();
		endif;
	}

	function get_list_stok_opname_get()
	{
		if (!$this->get('page')) :
			$this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
		endif;
		$start          = ($this->get('page') - 1) * $this->limit;
		$search         = [
			'tanggal_awal'  => safe_get('tanggal_awal'),
			'tanggal_akhir' => safe_get('tanggal_akhir'),
			'id_barang' => safe_get('barang'),  
			'id_kategori' => safe_get('kategori_barang'),  
		];

		$data            = $this->m_stok_opname->getListDataStokOpname($this->limit, $start, $search);
		$data['page']    = (int) $this->get('page');
		$data['limit']   = $this->limit;

		if ($data) :
			$this->response($data, REST_Controller::HTTP_OK); // (200)
		else :
			$this->response(array('error' => 'Data is Not Found'), REST_Controller::HTTP_NOT_FOUND);
		endif;
	}

	function simpan_stok_opname_post()
	{
		$data = $this->m_stok_opname->simpanDataStokOpname();
		$this->response($data, REST_Controller::HTTP_OK);
	}

	function get_stok_opname_get()
	{
		$data = $this->db->get_where('sm_stok', ['id' => $this->get('id', true)])->row();
		$this->response($data, REST_Controller::HTTP_OK);
	}

	function update_stok_opname_put()
	{
		$param = array(
			'masuk' => $this->put('jumlah', true),
			'no_batch' => $this->put('no_batch', true),
			'ed' => date2mysql($this->put('ed', true)),
		);
		$data = $this->m_stok_opname->updateDataStokOpname($this->put('id'), $param);
		$this->response($data, REST_Controller::HTTP_OK);
	}

	function delete_stok_opname_delete()
	{
		$id = $this->get('id', true);
		$data = $this->m_stok_opname->deleteDataStokOpname($id);
		$this->response($data, REST_Controller::HTTP_OK);
	}
}