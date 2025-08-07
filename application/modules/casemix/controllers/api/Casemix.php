<?php

defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

/**
 * @package         CodeIgniter
 * @subpackage      Rest Server
 * @category        Controller
 * @author          Muhamad Wahyudin
 * @license         Syams Corporation
 */
class Casemix extends REST_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->limit = 10;
		$this->datetime = date('Y-m-d H:i:s');
		$this->load->model('Casemix_model', 'm_casemix');
		$this->load->model('rekap_billing/Rekap_billing_model', 'm_rekap_billing');
		$this->load->model('keuangan/Keuangan_ver2_model', 'm_keuangan_ver2');
		$this->load->model('pemeriksaan_hemo/Pemeriksaan_hemo_model', 'm_pemeriksaan_hemo');

		$id_translucent = $this->session->userdata('id_translucent');
		if (empty($id_translucent)) :
			$this->response(array('error' => 'Anda belum login'), REST_Controller::HTTP_UNAUTHORIZED);
			exit();
		endif;
	}

	function get_list_casemix_get()
	{
		if (!$this->get('page')) :
			$this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
		endif;

		$start          = ($this->get('page') - 1) * $this->limit;
		$search         = [
			'tanggal_awal'  => safe_get('tanggal_awal'),
			'tanggal_akhir' => safe_get('tanggal_akhir'),
			'no_register'   => safe_get('no_register'),
			'no_rm'         => safe_get('no_rm'),
			'nama'          => safe_get('nama'),
			'nik'           => safe_get('nik'),
			'dokter'        => safe_get('dokter'),
			'status_bayar'  => safe_get('status_bayar'),
			'jenis'					=> '',
			'cara_bayar'		=> safe_get('cara_bayar'),
			'penjamin'			=> safe_get('penjamin'),
			'tempat_layanan' => safe_get('tempat_layanan'),
			"keyword"				=> safe_get("keyword")
		];

		if ($this->get('jenis', true)) :
			$search['jenis'] = $this->get('jenis', true);
		endif;

		$data            = $this->m_casemix->getListDataCasemix($this->limit, $start, $search);
		foreach ($data['data'] as $item) {
			$item->jml_id_pendaftaran     = $this->m_pemeriksaan_hemo->getCountIdPendaftran($item->id);
		}
		$data['page']    = (int) $this->get('page');
		$data['limit']   = $this->limit;

		if ($data) :
			$this->response($data, REST_Controller::HTTP_OK); // (200)
		else :
			$this->response(array('error' => 'Data is Not Found'), REST_Controller::HTTP_NOT_FOUND);
		endif;
	}

	function get_list_layanan_pasien_get()
	{
		if (!$this->get('page')) :
			$this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
		endif;

		$start  = ($this->get('page') - 1) * $this->limit;
		$search = [
			'id_pendaftaran'  	=> $this->get('id_pendaftaran')
		];

		$data  = $this->m_pengkodean_icd_x->getListDataLayananPasien($this->limit, $start, $search);
		$data['page']    = (int) $this->get('page');
		$data['limit']   = $this->limit;

		if ($data) :
			$this->response($data, REST_Controller::HTTP_OK); // (200)
		endif;
	}
}
