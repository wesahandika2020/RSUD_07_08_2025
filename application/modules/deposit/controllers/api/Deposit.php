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
class Deposit extends REST_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->limit = 10;
		$this->datetime = date('Y-m-d H:i:s');
		$this->load->model('Deposit_model', 'm_deposit');

		$id_translucent = $this->session->userdata('id_translucent');
		if (empty($id_translucent)) :
			$this->response(array('error' => 'Anda belum login'), REST_Controller::HTTP_UNAUTHORIZED);
			exit();
		endif;
	}

	function get_list_deposit_get()
	{
		if (!$this->get('page')) :
			$this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
		endif;

		$start          = ($this->get('page') - 1) * $this->limit;
		$search         = [
			'tanggal_awal'  => safe_get('tanggal_awal'),
			'tanggal_akhir' => safe_get('tanggal_akhir'),
			'no_rm'         => safe_get('no_rm'),
			'nama'          => safe_get('nama'),
			"keyword"		=> safe_get('keyword')
		];

		$data            = $this->m_deposit->getListDataDeposit($this->limit, $start, $search);
		$data['page']    = (int) $this->get('page');
		$data['limit']   = $this->limit;

		if ($data) :
			$this->response($data, REST_Controller::HTTP_OK); // (200)
		else :
			$this->response(array('error' => 'Data is Not Found'), REST_Controller::HTTP_NOT_FOUND);
		endif;
	}

	function get_history_deposit_pasien_get()
	{
		if (!$this->get('id', true)) :
			$this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
		endif;

		$id_pasien = $this->get('id', true);
		$data = $this->m_deposit->getDataHistoryDepositPasien($id_pasien);
		if ($data) :
			$this->response($data, REST_Controller::HTTP_OK);
		else :
			$this->response(['error' => 'Data tidak ditemukan!'], REST_Controller::HTTP_NOT_FOUND);
		endif;
	}

	function simpan_deposit_post() 
	{
		if ($this->post('no_rm') === '') :
			$this->response(['status' => false], REST_Controller::HTTP_OK);
		endif;

		$data = ['id_pasien' => safe_post('no_rm'), 'waktu' => $this->datetime, 'id_users' => $this->user, 'keterangan' => safe_post('keterangan'),];
		$jenis_transaksi = safe_post('jenis_transaksi');
		if ($jenis_transaksi === 'setor') :
			$data['masuk'] = safe_post('total') !== '' ? currencyToNumber(safe_post('total')) : 0;
			$data['keluar'] = 0;
		else :
			if ($jenis_transaksi === 'ambil') :
				$data['masuk'] = 0;
				$data['keluar'] = safe_post('total') !== '' ? currencyToNumber(safe_post('total')) : 0;
			else :
				$status = false;
				$this->response(['status' => $status, 'message' => 'Opsi tidak diketahui'], REST_Controller::HTTP_OK);
			endif;
		endif;
		
		$result = $this->m_deposit->simpanDataDeposit($data, $jenis_transaksi);
		$this->response($result, REST_Controller::HTTP_OK);
	}

	function get_summary_deposit_get()
	{
		$data = $this->m_deposit->getDataSummaryDeposit();
		$this->response($data, REST_Controller::HTTP_OK);
	}

}
