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
class Koreksi_stok_darah extends REST_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->limit = 10;
		$this->datetime = date('Y-m-d H:i:s');
		$this->load->model('Koreksi_stok_darah_model', 'm_koreksi_stok_darah');

		$id_translucent = $this->session->userdata('id_translucent');
		if (empty($id_translucent)) :
			$this->response(array('error' => 'Anda belum login'), REST_Controller::HTTP_UNAUTHORIZED);
			exit();
		endif;
	}

	function get_ed_barang_get()
	{
		$id_barang = safe_get('id_barang');
		if ($id_barang !== '') {
			$data = $this->m_koreksi_stok_darah->getEdBarang($id_barang)->result();
		} else {
			$data = NULL;
		}
		echo json_encode($data);
	}

	// koreksi stok
	function sisa_barang_koreksi_stok_get() 
	{
		$param['id_barang'] = safe_get('id_barang');
		$param['ed'] = safe_get('ed');
		if ($param['id_barang'] !== '') :
			$data = $this->m_koreksi_stok_darah->getSisaBarangKoreksiStok($param)->row();
		else : 
			$data = NULL;
		endif;
		exit(json_encode($data));
	}
	// end koreksi stok

	function get_list_koreksi_stok_darah_get()
	{
		if (!$this->get('page')) :
			$this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
		endif;
		$start          = ($this->get('page') - 1) * $this->limit;
		$search         = [
			'tanggal_awal'  => safe_get('tanggal_awal'),
			'tanggal_akhir' => safe_get('tanggal_akhir'),
			'id_barang' 		=> safe_get('barang'),
		];

		$data            = $this->m_koreksi_stok_darah->getListDataKoreksiStokDarah($this->limit, $start, $search);
		$data['page']    = (int) $this->get('page');
		$data['limit']   = $this->limit;

		if ($data) :
			$this->response($data, REST_Controller::HTTP_OK); // (200)
		else :
			$this->response(array('error' => 'Data is Not Found'), REST_Controller::HTTP_NOT_FOUND);
		endif;
	}

	function simpan_koreksi_stok_darah_post()
	{
		$data = $this->m_koreksi_stok_darah->simpanDataKoreksiStokDarah();
		$this->response($data, REST_Controller::HTTP_OK);
	}
}
