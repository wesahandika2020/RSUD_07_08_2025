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
class Stok_opname_gizi extends REST_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->limit = 10;
		date_default_timezone_set('Asia/Jakarta');
		$this->datetime = date('Y-m-d H:i:s');
		$this->load->model('Stok_opname_gizi_model', 'gizi');

		$id_translucent = $this->session->userdata('id_translucent');
		if (empty($id_translucent)) :
			$this->response(array('error' => 'Anda belum login'), REST_Controller::HTTP_UNAUTHORIZED);
			exit();
		endif;
	}

	function get_list_stok_gizi_get()
	{
		if (!$this->get('page')) :
			$this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
		endif;
		$start          = ((int)$this->get('page') - 1) * (int)$this->limit;
		$search         = [
			'tanggal_awal'  => safe_get('tanggal_awal'),
			'tanggal_akhir' => safe_get('tanggal_akhir'),
			'id_barang' => safe_get('barang'),  
			'id_kategori' => safe_get('kategori_barang'),  
		];

		$data            = $this->gizi->getListDataStokGizi((int)$this->limit, (int)$start, $search);
		$data['page']    = (int) $this->get('page');
		$data['limit']   = (int)$this->limit;

		if ($data) :
			$this->response($data, REST_Controller::HTTP_OK); // (200)
		else :
			$this->response(array('error' => 'Data is Not Found'), REST_Controller::HTTP_NOT_FOUND);
		endif;
	}

	function simpan_stok_gizi_post()
	{
		$data = $this->gizi->simpanDataStokGizi();
		$this->response($data, REST_Controller::HTTP_OK);
	}

	function get_stok_gizi_get()
	{
		$data = $this->db->get_where('sm_invrt_stok', ['id' => $this->get('id', true)])->row();
		$this->response($data, REST_Controller::HTTP_OK);
	}

	function update_stok_gizi_put()
	{
		$param = array(
			'masuk' => $this->put('jumlah', true),
			'no_batch' => $this->put('no_batch', true),
		);
		$data = $this->gizi->updateDataStokGizi($this->put('id'), $param);
		$this->response($data, REST_Controller::HTTP_OK);
	}

	function delete_stok_gizi_delete()
	{
		$id = $this->get('id', true);
		$data = $this->gizi->deleteDataStokGizi($id);
		$this->response($data, REST_Controller::HTTP_OK);
	}
}