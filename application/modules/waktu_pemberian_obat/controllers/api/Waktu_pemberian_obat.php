<?php

defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class Waktu_pemberian_obat extends REST_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->limit = 10;
		$this->load->model('Waktu_pemberian_obat_model', 'm_waktu_pemberian_obat');

		$id_translucent = $this->session->userdata('id_translucent');
		if (empty($id_translucent)) :
			$this->response(array('error' => 'Anda belum login'), REST_Controller::HTTP_UNAUTHORIZED);
			exit();
		endif;
	}

	private function start($page)
	{
		return (($page - 1) * $this->limit);
	}

	function get_waktu_pemberian_obat_get()
	{
		if (!$this->get('id', true)) :
			$this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
		endif;

		$data['data'] = $this->m_waktu_pemberian_obat->getDataWaktuPemberianObatById($this->get('id', true));
		$data['page'] = 1;
		$data['limit'] = $this->limit;

		if ($data) :
			$this->response($data, REST_Controller::HTTP_OK); // (200)
		endif;
	}

	function get_list_waktu_pemberian_obat_get()
	{
		if (!$this->get('page')) :
			$this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
		endif;

		$start          = ($this->get('page') - 1) * $this->limit;
		$search         = [
			'keyword' => $this->get('keyword')
		];

		$data           = $this->m_waktu_pemberian_obat->getListDataWaktuPemberianObat($start, $this->limit, $search);
		$data['page']   = (int) $this->get('page');
		$data['limit']  = $this->limit;

		if ($data) :
			$this->response($data, REST_Controller::HTTP_OK); // (200)
		endif;
	}

	function delete_waktu_pemberian_obat_delete()
	{
		$id = $this->get('id', true);
		if ($id <= 0) :
			$this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
		endif;

		$this->m_waktu_pemberian_obat->deleteDataWaktuPemberianObat($id);
		$message = [
			'message' => 'Data telah berhasil terhapus'
		];
		$this->set_response($message, REST_Controller::HTTP_NO_CONTENT); // (204)
	}

	function simpan_waktu_pemberian_obat_post()
	{
		$data = [
			'kode'         => safe_post('kode'),
			'timing'         => safe_post('waktu_pemberian'),
			'keterangan'    => safe_post('keterangan'),
			'is_waktu_pemberian' => safe_post('is_waktu_pemberian')
		];

		if (!$this->get('id')) :
			$this->m_waktu_pemberian_obat->simpanDataWaktuPemberianObat($data);
			$message = [
				'status' => TRUE,
				'token'  => $this->security->get_csrf_hash()
			];
			$this->set_response($message, REST_Controller::HTTP_CREATED);
		else :
			$id = $this->m_waktu_pemberian_obat->updateDataWaktuPemberianObat($data, $this->get('id'));
			$message = [
				'id'     =>convert_hash($id),
				'status' => true,
				'token'  => $this->security->get_csrf_hash()
			];
			$this->set_response($message, REST_Controller::HTTP_CREATED);
		endif;
	}
}
