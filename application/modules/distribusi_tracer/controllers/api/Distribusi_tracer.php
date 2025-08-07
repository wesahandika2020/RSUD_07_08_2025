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
class Distribusi_tracer extends REST_Controller
	{

	function __construct()
	{
		parent::__construct();
		$this->limit = 10;
		$this->datetime = date('Y-m-d H:i:s');
		$this->load->model('Distribusi_tracer_model', 'm_distribusi_tracer');

		$id_translucent = $this->session->userdata('id_translucent');
		if (empty($id_translucent)) :
			$this->response(array('error' => 'Anda belum login'), REST_Controller::HTTP_UNAUTHORIZED);
			exit();
		endif;
	}

	function get_list_distribusi_tracer_get()
	{
		if (!$this->get('page')) :
			$this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
		endif;
		$start          = ($this->get('page') - 1) * $this->limit;
		$search         = [
			'tanggal_awal'  => safe_get('tanggal_awal'),
			'tanggal_akhir' => safe_get('tanggal_akhir'),
			'no_register' => safe_get('no_register'), 
			'no_rm' => safe_get('no_rm'), 
			'pasien' => safe_get('pasien'), 
			'tujuan' => safe_get('tujuan'), 
			'ranap' => safe_get('ranap'), 
			'status' => safe_get('status'),
			'unit' => safe_get('unit')
		];
		$data            = $this->m_distribusi_tracer->getListDataDistribusiTracer($this->limit, $start, $search);
		$data['page']    = (int) $this->get('page');
		$data['limit']   = $this->limit;

		if ($data) :
			$this->response($data, REST_Controller::HTTP_OK); // (200)
		else :
			$this->response(array('error' => 'Data is Not Found'), REST_Controller::HTTP_NOT_FOUND);
		endif;
	}

 	function get_data_summary_tracer_get()
	{
		$data = $this->m_distribusi_tracer->getDataSummaryTracer();
		$response = array('status' => true, 'data' => $data);
		$this->response($response, REST_Controller::HTTP_OK);
	}

 	function change_status_document_tracer_post()
	{
		if (!isset($_POST['no_rm']) | safe_post('no_rm') === '') :
			$response = array('status' => false, 'message' => 'Gagal mengubah status tracer');
			$this->response($response, REST_Controller::HTTP_OK);
		endif;

		$no_rm = trim(safe_post('no_rm'));
		$data = $this->m_distribusi_tracer->updateStatusDocumentTracer($no_rm);
		$this->response($data, REST_Controller::HTTP_OK);
	}

	function update_status_tracer_post()
	{
		if (!isset($_POST['id']) | safe_post('id') === '') {
			$response = array('status' => false, 'message' => 'Id tidak ada');
			$this->response($response, REST_Controller::HTTP_OK);
		}
		if (!isset($_POST['status']) | safe_post('status') === '') {
			$response = array('status' => false, 'message' => 'Status tidak ada');
			$this->response($response, REST_Controller::HTTP_OK);
		}
		$id = safe_post('id');
		$status = safe_post('status');
		$response = $this->m_distribusi_tracer->updateStatusTracer($id, $status);
		$this->response($response, REST_Controller::HTTP_OK);
	}
}
