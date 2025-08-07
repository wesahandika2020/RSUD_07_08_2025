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
class Lap_rehab_medik extends REST_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->limit    = 50;
		$this->datetime = date('Y-m-d H:i:s');
		$this->load->model('Lap_rehab_medik_model', 'm_lap_rehab_medik');

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

	function dokter_auto_get()
	{
		$q = safe_get('q');
		$page = safe_get('page');
		$start = $this->start($page);
		// $key = 'dokter_auto_' . $q . '_' . $page;
		// if (!$this->redis->get($key)) :
			$data = $this->m_lap_rehab_medik->getAccountRehabMedik($q, $start, $this->limit);
			if ((safe_get('page') == 1) & ($q == '')) :
				$pilih[] = array(
					'id' => '',
					'nama' => 'Semua Dokter / Pegawai',
					'jabatan' => ''
				);
				$data['data'] = array_merge($pilih, $data['data']);
				$data['total'] += 1;
			endif;
			// $this->redis->setex($key, 86400, json_encode($data));
			$this->response($data, REST_Controller::HTTP_OK);
		// else :
			// exit($this->redis->get($key));
		// endif;
	}

	function get_list_lap_rehab_medik_get()
	{ //laporan mutasi obat
		if (!$this->get('page')) :
			$this->response(null, REST_Controller::HTTP_BAD_REQUEST); // (400)
		endif;

		$start  = ($this->get('page') - 1) * $this->limit;
		$search = [
			'periode_laporan'   => safe_get('periode_laporan'),
			'tanggal_harian'    => safe_get('tanggal_harian'),
			'bulan'             => safe_get('bulan'),
			'tahun'             => safe_get('tahun'),
			'tanggal_awal'      => safe_get('tanggal_awal'),
			'tanggal_akhir'     => safe_get('tanggal_akhir'),
			'id_dokter'         => safe_get('id_dokter'),
			'nama_pasien'       => safe_get('nama_pasien')
		];

		// $data          = $this->m_lap_rehab_medik->getListDataLaporanMutasiObat( 0, 0, $search );
		$data          = $this->m_lap_rehab_medik->getListLaporanRehabMedik($this->limit, $start, $search);
		$data['page']  = (int) $this->get('page');
		$data['limit'] = $this->limit;

		if ($data) :
			$this->response($data, REST_Controller::HTTP_OK); // (200)
		else :
			$this->response(array('error' => 'Data is Not Found'), REST_Controller::HTTP_NOT_FOUND);
		endif;
	}
}
