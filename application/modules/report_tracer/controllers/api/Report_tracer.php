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
class Report_tracer extends REST_Controller
	{

	function __construct()
	{
		parent::__construct();
		$this->limit = 10;
		$this->date = date('Y-m-d');
		$this->datetime = date('Y-m-d H:i:s');
		$this->load->model('Report_tracer_model', 'm_report_tracer');

		$id_translucent = $this->session->userdata('id_translucent');
		if (empty($id_translucent)) :
			$this->response(array('error' => 'Anda belum login'), REST_Controller::HTTP_UNAUTHORIZED);
			exit();
		endif;
	}

 	function get_data_average_ready_brm_get()
	{
		$explode = explode('-', $this->date);
		$date = mktime(0, 0, 0, $explode[1], $explode[2] - 6, $explode[0]);
		$start = date('Y-m-d', $date);
		$tgl = createRange($start, $this->date);
		$title = 'Data Tanggal ';
		$title .= indo_tgl($start) . ' - ' . indo_tgl($this->date);
		foreach ($tgl as $key => $hariini) {
			$data['tanggal'][] = get_day($hariini) . ' ' . indo_tgl($hariini);
			$data['avg'][] = $this->m_report_tracer->countAverageReadyBRM($hariini);
		}
		$response = array('status' => true, 'title' => $title, 'data' => $data);
		$this->response($response, REST_Controller::HTTP_OK);
	}

	function get_list_average_ready_brm_get()
	{
		if (!$this->get('page')) :
			$this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
		endif;
		$search = [
			'tanggal_awal'  => safe_get('tanggal_awal'),
			'tanggal_akhir' => safe_get('tanggal_akhir'),
		];
		if ($search['tanggal_awal'] === '') :
			$now = date('Y-m-d');
			$explode = explode('-', $now);
			$date = mktime(0, 0, 0, $explode[1], $explode[2] - 6, $explode[0]);
			$start = date('Y-m-d', $date);
			$search['tanggal_awal'] = $start;
			$search['tanggal_akhir'] = $now;
		else :
			if ($search['tanggal_akhir'] === '') :
				$search['tanggal_akhir'] = date('Y-m-d');
			endif;
		endif;
		$start = ($this->get('page') - 1) * $this->limit;
		$data = $this->m_report_tracer->getListDataAverageReadyBRM($this->limit, $start, $search);
		$data['page'] = (int) $this->get('page');
		$data['limit'] = $this->limit;
		$data['parameter'] = $search;

		if ($data) :
			$this->response($data, REST_Controller::HTTP_OK); // (200)
		else :
			$this->response(array('error' => 'Data is Not Found'), REST_Controller::HTTP_NOT_FOUND);
		endif;
	}

	function get_list_inout_brm_get()
	{
		if (!$this->get('page')) :
			$this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
		endif;
		$search = [
			'tanggal_awal'  => safe_get('tanggal_awal'),
			'tanggal_akhir' => safe_get('tanggal_akhir'),
		];
		if ($search['tanggal_awal'] === '') :
			$now = date('Y-m-d');
			$explode = explode('-', $now);
			$date = mktime(0, 0, 0, $explode[1], $explode[2] - 6, $explode[0]);
			$start = date('Y-m-d', $date);
			$search['tanggal_awal'] = $start;
			$search['tanggal_akhir'] = $now;
		else :
			if ($search['tanggal_akhir'] === '') :
				$search['tanggal_akhir'] = date('Y-m-d');
			endif;
		endif;
		$start = ($this->get('page') - 1) * $this->limit;
		$data = $this->m_report_tracer->getListDataInOutBRM($this->limit, $start, $search);
		$data['page'] = (int) $this->get('page');
		$data['limit'] = $this->limit;
		$data['parameter'] = $search;

		if ($data) :
			$this->response($data, REST_Controller::HTTP_OK); // (200)
		else :
			$this->response(array('error' => 'Data is Not Found'), REST_Controller::HTTP_NOT_FOUND);
		endif;
	}

	function get_list_inout_poli_brm_get()
	{
		if (!$this->get('page')) :
			$this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
		endif;
		$search = ['tanggal'  => safe_get('tanggal')];
		if ($search['tanggal'] === '') :
			$search['tanggal'] = date('Y-m-d');
		endif;
		$start = ($this->get('page') - 1) * $this->limit;
		$data = $this->m_report_tracer->getListDataInOutPoliBRM($this->limit, $start, $search);
		$data['page'] = (int) $this->get('page');
		$data['limit'] = $this->limit;
		$data['parameter'] = array('tanggal' => get_day($search['tanggal']) . ', ' . indo_tgl($search['tanggal']));

		if ($data) :
			$this->response($data, REST_Controller::HTTP_OK); // (200)
		else :
			$this->response(array('error' => 'Data is Not Found'), REST_Controller::HTTP_NOT_FOUND);
		endif;
	}
 	
}