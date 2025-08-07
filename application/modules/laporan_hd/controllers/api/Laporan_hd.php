<?php

defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class Laporan_hd extends REST_Controller
{
	function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->datetime = date('Y-m-d H:i:s');
		$this->limit    = 50;
		$this->load->model('Laporan_hd_model', 'm_hd');

		$id_translucent = $this->session->userdata('id_translucent');
		if (empty($id_translucent)) :
			$this->response(array('error' => 'Anda belum login'), REST_Controller::HTTP_UNAUTHORIZED);
			exit();
		endif;
	}

	//laporan hd
	function rekap_data_harga_pemeriksaan_get()
	{ 
		if ($this->get('page') === null){

            $page = 1;

        } else {

            $page = (int)$this->get('page');

        }

        $start  = ((int)$page - 1) * (int)$this->limit;
		$search = [
			'periode_laporan' 	=> safe_get('periode_laporan'),
			'tanggal_harian'  	=> safe_get('tanggal_harian'),
			'bulan'           	=> safe_get('bulan'),
			'tahun'           	=> safe_get('tahun'),
			'tanggal_awal'	  	=> safe_get('tanggal_awal'),
			'tanggal_akhir'   	=> safe_get('tanggal_akhir'),
			'penjamin'			=> safe_get('penjamin'),
			'tempat_layanan'	=> safe_get('tempat_layanan'),
			'jenis_rawat'		=> safe_get('jenis_rawat'),
			
		];

		$data          = $this->m_hd->getJmlJenisPemeriksaanAll((int)$this->limit, (int)$start, $search);
		$data['page']  = (int)$page;
		$data['limit'] = (int)$this->limit;

		if ($data) :
			$this->response($data, REST_Controller::HTTP_OK); // (200)
		else :
			$this->response(array('error' => 'Data is Not Found'), REST_Controller::HTTP_NOT_FOUND);
		endif;
	}

	function get_list_laporan_hd_01_get()
	{
		if ( ! $this->get('page')) :
			$this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
		endif;

		$search = [
			'jenis_laporan'   => safe_get('jenis_laporan'),
			'periode_laporan' => safe_get('periode_laporan'),
			'tanggal_harian'  => safe_get('tanggal_harian'),
			'bulan'           => safe_get('bulan'),
			'tahun'           => safe_get('tahun'),
			'tanggal_awal'    => safe_get('tanggal_awal'),
			'tanggal_akhir'   => safe_get('tanggal_akhir'),
			'jenis_jaminan'   => safe_get('jenis_jaminan'),
			'jenis_tindakan'  => safe_get('jenis_tindakan'),
		];		
		
		$data['data']  = $this->m_hd->getListLaporanHd01($search);		
		$data['page']  = (int) $this->get('page');
		$data['limit'] = $this->limit;

		if ($data) :
			$this->response($data, REST_Controller::HTTP_OK); // (200)
		else :
			$this->response(array('error' => 'Data is Not Found'), REST_Controller::HTTP_NOT_FOUND);
		endif;
	}

}
