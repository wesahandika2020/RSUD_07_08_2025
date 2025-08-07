<?php

defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class Laporan_perencanaan extends REST_Controller
{
	function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->datetime = date('Y-m-d H:i:s');
		$this->limit    = 10;
		$this->load->model('Laporan_perencanaan_model', 'm_prc');

		$id_translucent = $this->session->userdata('id_translucent');
		if (empty($id_translucent)) :
			$this->response(array('error' => 'Anda belum login'), REST_Controller::HTTP_UNAUTHORIZED);
			exit();
		endif;
	}

	function get_list_laporan_perencanaan_01_get()
	{
		if ( ! $this->get('page')) :
			$this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
		endif;

		$start  = ($this->get('page') - 1) * $this->limit;
		$search = [
			'jenis_laporan'   => safe_get('jenis_laporan'),
			'periode_laporan' => safe_get('periode_laporan'),
			'tanggal_harian'  => safe_get('tanggal_harian'),
			'bulan'           => safe_get('bulan'),
			'tahun'           => safe_get('tahun'),
			'tanggal_awal'    => safe_get('tanggal_awal'),
			'tanggal_akhir'   => safe_get('tanggal_akhir'),
			'jenis_jaminan'   => safe_get('jenis_jaminan'),
			'jenis_layanan'   => safe_get('jenis_layanan'),
			'poliklinik'   	  => safe_get('poliklinik'),		
			'id_dokter'  	  => safe_get('id_dokter'),			
		];		
		
		$data          = $this->m_prc->getListLaporanPrc01($this->limit, $start,$search);		
		$data['page']  = (int) $this->get('page');
		$data['limit'] = $this->limit;

		if ($data) :
			$this->response($data, REST_Controller::HTTP_OK); // (200)
		else :
			$this->response(array('error' => 'Data is Not Found'), REST_Controller::HTTP_NOT_FOUND);
		endif;
	}

	function get_list_laporan_perencanaan_02_get()
	{
		if ( ! $this->get('page')) :
			$this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
		endif;

		$start  = ($this->get('page') - 1) * $this->limit;
		$search = [
			'jenis_laporan'   => safe_get('jenis_laporan'),
			'periode_laporan' => safe_get('periode_laporan'),
			'tanggal_harian'  => safe_get('tanggal_harian'),
			'bulan'           => safe_get('bulan'),
			'tahun'           => safe_get('tahun'),
			'tanggal_awal'    => safe_get('tanggal_awal'),
			'tanggal_akhir'   => safe_get('tanggal_akhir'),
			'jenis_jaminan'   => safe_get('jenis_jaminan'),
			'jenis_layanan'   => safe_get('jenis_layanan'),
			'poliklinik'   	  => safe_get('poliklinik'),
			'bangsal_ranap'   => safe_get('bangsal_ranap'),
			'bangsal_icare'   => safe_get('bangsal_icare'),			
			'operasi'   	  => safe_get('operasi'),			
			'timing'   	 	  => safe_get('timing'),			
			'status_operasi'  => safe_get('status_operasi'),			
			'id_dokter'  	  => safe_get('id_dokter'),			
			'dokter_operasi'  => safe_get('dokter_operasi'),
		];		
		
		$data          = $this->m_prc->getListLaporanPrc02($this->limit, $start,$search);		
		$data['page']  = (int) $this->get('page');
		$data['limit'] = $this->limit;

		if ($data) :
			$this->response($data, REST_Controller::HTTP_OK); // (200)
		else :
			$this->response(array('error' => 'Data is Not Found'), REST_Controller::HTTP_NOT_FOUND);
		endif;
	}

	function get_list_laporan_perencanaan_03_get()
	{
		if ( ! $this->get('page')) :
			$this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
		endif;

		$start  = ($this->get('page') - 1) * $this->limit;
		$search = [
			'jenis_laporan'   => safe_get('jenis_laporan'),
			'periode_laporan' => safe_get('periode_laporan'),
			'tanggal_harian'  => safe_get('tanggal_harian'),
			'bulan'           => safe_get('bulan'),
			'tahun'           => safe_get('tahun'),
			'tanggal_awal'    => safe_get('tanggal_awal'),
			'tanggal_akhir'   => safe_get('tanggal_akhir'),
			'jenis_jaminan'   => safe_get('jenis_jaminan'),
			'bangsal_ranap'   => safe_get('bangsal_ranap'),				
			'id_dokter'  	  => safe_get('id_dokter'),			
		];		
		
		$data          = $this->m_prc->getListLaporanPrc03($this->limit, $start,$search);		
		$data['page']  = (int) $this->get('page');
		$data['limit'] = $this->limit;

		if ($data) :
			$this->response($data, REST_Controller::HTTP_OK); // (200)
		else :
			$this->response(array('error' => 'Data is Not Found'), REST_Controller::HTTP_NOT_FOUND);
		endif;
	}

	function get_list_laporan_perencanaan_04_get()
	{
		if ( ! $this->get('page')) :
			$this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
		endif;

		$start  = ($this->get('page') - 1) * $this->limit;
		$search = [
			'jenis_laporan'   => safe_get('jenis_laporan'),
			'periode_laporan' => safe_get('periode_laporan'),
			'tanggal_harian'  => safe_get('tanggal_harian'),
			'bulan'           => safe_get('bulan'),
			'tahun'           => safe_get('tahun'),
			'tanggal_awal'    => safe_get('tanggal_awal'),
			'tanggal_akhir'   => safe_get('tanggal_akhir'),
			'jenis_jaminan'   => safe_get('jenis_jaminan'),
			'jenis_layanan'   => safe_get('jenis_layanan'),
			'bangsal_ranap'   => safe_get('bangsal_ranap'),
			'kategori_dokter' => safe_get('kategori_dokter'),
			'id_dokter'  	  => safe_get('id_dokter'),
		];		
		
		$data          = $this->m_prc->getListLaporanPrc04($this->limit, $start,$search);		
		$data['page']  = (int) $this->get('page');
		$data['limit'] = $this->limit;

		if ($data) :
			$this->response($data, REST_Controller::HTTP_OK); // (200)
		else :
			$this->response(array('error' => 'Data is Not Found'), REST_Controller::HTTP_NOT_FOUND);
		endif;
	}

	function get_list_laporan_perencanaan_05_get()
	{
		if ( ! $this->get('page')) :
			$this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
		endif;

		$start  = ($this->get('page') - 1) * $this->limit;
		$search = [
			'jenis_laporan'   => safe_get('jenis_laporan'),
			'periode_laporan' => safe_get('periode_laporan'),
			'tanggal_harian'  => safe_get('tanggal_harian'),
			'bulan'           => safe_get('bulan'),
			'tahun'           => safe_get('tahun'),
			'tanggal_awal'    => safe_get('tanggal_awal'),
			'tanggal_akhir'   => safe_get('tanggal_akhir'),
			'jenis_jaminan'   => safe_get('jenis_jaminan'),
			'jenis_layanan'   => safe_get('jenis_layanan'),
			'poliklinik'   	  => safe_get('poliklinik'),		
			'id_dokter'  	  => safe_get('id_dokter'),			
		];		
		
		$data          = $this->m_prc->getListLaporanPrc05($this->limit, $start,$search);		
		$data['page']  = (int) $this->get('page');
		$data['limit'] = $this->limit;

		if ($data) :
			$this->response($data, REST_Controller::HTTP_OK); // (200)
		else :
			$this->response(array('error' => 'Data is Not Found'), REST_Controller::HTTP_NOT_FOUND);
		endif;
	}

	function get_list_laporan_perencanaan_06_get()
	{
		if ( ! $this->get('page')) :
			$this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
		endif;

		$start  = ($this->get('page') - 1) * $this->limit;
		$search = [
			'jenis_laporan'   => safe_get('jenis_laporan'),
			'periode_laporan' => safe_get('periode_laporan'),
			'tanggal_harian'  => safe_get('tanggal_harian'),
			'bulan'           => safe_get('bulan'),
			'tahun'           => safe_get('tahun'),
			'tanggal_awal'    => safe_get('tanggal_awal'),
			'tanggal_akhir'   => safe_get('tanggal_akhir'),
			'jenis_jaminan'   => safe_get('jenis_jaminan'),
			'poliklinik'   	  => safe_get('poliklinik'),	
			'boocin'   	      => safe_get('jenis_boocin'),	
		];		
		
		$data          = $this->m_prc->getListLaporanPrc06($this->limit, $start,$search);		
		$data['page']  = (int) $this->get('page');
		$data['limit'] = $this->limit;

		if ($data) :
			$this->response($data, REST_Controller::HTTP_OK); // (200)
		else :
			$this->response(array('error' => 'Data is Not Found'), REST_Controller::HTTP_NOT_FOUND);
		endif;
	}
}
