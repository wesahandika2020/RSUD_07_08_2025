<?php

defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class Laporan_layanan_per_pasien extends REST_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->limit    = 20;
		date_default_timezone_set('Asia/Jakarta');
		$this->datetime = date('Y-m-d H:i:s');
		$this->load->model('Laporan_layanan_per_pasien_model', 'laporan');

		$id_translucent = $this->session->userdata('id_translucent');
		if (empty($id_translucent)) :
			$this->response(array('error' => 'Anda belum login'), REST_Controller::HTTP_UNAUTHORIZED);
			exit();
		endif;
	}

	private function start($page)
	{
		return (((int)$page - 1) * (int)$this->limit);
	}

	function get_list_laporan_per_pasien_get()
	{
		if (!$this->get('page')) :
			$this->response(null, REST_Controller::HTTP_BAD_REQUEST); // (400)
		endif;

		$start  = ($this->get('page') - 1) * $this->limit;
		$search = [
			'periode_laporan'   => !empty(safe_get('periode_laporan')) ? safe_get('periode_laporan') : 'Bulanan',
			'tanggal_harian'    => safe_get('tanggal_harian'),
			'bulan'             => !empty(safe_get('bulan')) ? safe_get('bulan') : date('m'),
			'tahun'             => !empty(safe_get('tahun')) ? safe_get('tahun') : date('Y'),
			'tanggal_awal'      => safe_get('tanggal_awal'),
			'tanggal_akhir'     => safe_get('tanggal_akhir'),
			'tenaga_medis'		=> safe_get('tenaga_medis'),
			'jenis_rawat'		=> safe_get('jenis_rawat'),
			'tempat_layanan_1'	=> safe_get('tempat_layanan_1'),
			'tempat_layanan_2'	=> safe_get('tempat_layanan_2'),
			'tempat_layanan_3'	=> safe_get('tempat_layanan_3'),
			'no_rm'	=> safe_get('no_rm'),
		];

		$data          = $this->laporan->getListLaporanLayananPerPasien($this->limit, $start, $search);
		$data['page']  = (int) $this->get('page');
		$data['limit'] = $this->limit;

		if ($data) :
			$this->response($data, REST_Controller::HTTP_OK); // (200)
		else :
			$this->response(array('error' => 'Data is Not Found'), REST_Controller::HTTP_NOT_FOUND);
		endif;
	}
}
