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
class Laporan_operasi extends REST_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->limit    = 50;
		$this->datetime = date('Y-m-d H:i:s');
		$this->load->model('Laporan_operasi_model', 'm_laporan_operasi');

		$id_translucent = $this->session->userdata('id_translucent');
		if (empty($id_translucent)) :
			$this->response(array('error' => 'Anda belum login'), REST_Controller::HTTP_UNAUTHORIZED);
			exit();
		endif;
	}

	function get_list_laporan_operasi_01_get()
	{ //laporan mutasi obat
		if (!$this->get('page')) :
			$this->response(null, REST_Controller::HTTP_BAD_REQUEST); // (400)
		endif;

		$start  = ($this->get('page') - 1) * 0;
		$search = [
			'periode_laporan' => safe_get('periode_laporan'),
			'tanggal_harian'  => safe_get('tanggal_harian'),
			'bulan'           => safe_get('bulan'),
			'tahun'           => safe_get('tahun'),
			'tanggal_awal'	  => safe_get('tanggal_awal'),
			'tanggal_akhir'   => safe_get('tanggal_akhir'),
			'unit'			  		=> safe_get('unit'),
			'golongan'		  	=> safe_get('golongan'),
			'jenis'			  		=> safe_get('jenis'),
			'kategori'		  	=> safe_get('kategori'),
			'fornas'		  		=> safe_get('fornas'),
			'generik'		  		=> safe_get('generik')
		];

		// $data          = $this->m_laporan_operasi->getListDataLaporanMutasiObat( 0, 0, $search );
		$data          = $this->m_laporan_operasi->getListDataLaporanBSI(0, $start, $search);
		$data['page']  = (int) $this->get('page');
		$data['limit'] = 0;

		if ($data) :
			$this->response($data, REST_Controller::HTTP_OK); // (200)
		else :
			$this->response(array('error' => 'Data is Not Found'), REST_Controller::HTTP_NOT_FOUND);
		endif;
	}

	function get_list_laporan_operasi_02_get()
	{ //laporan mutasi obat
		if (!$this->get('page')) :
			$this->response(null, REST_Controller::HTTP_BAD_REQUEST); // (400)
		endif;

		$start  = ($this->get('page') - 1) * $this->limit;
		$search = [
			'periode_laporan' => safe_get('periode_laporan'),
			'tanggal_harian'  => safe_get('tanggal_harian'),
			'bulan'           => safe_get('bulan'),
			'tahun'           => safe_get('tahun'),
			'tanggal_awal'	  => safe_get('tanggal_awal'),
			'tanggal_awal'	  => safe_get('tanggal_awal'),
			'spesialisasi'   	=> safe_get('unit')
		];

		// $data          = $this->m_laporan_operasi->getListDataLaporanMutasiObat( 0, 0, $search );
		$data          = $this->m_laporan_operasi->getLaporanKegiatanPembedahan($this->limit, $start, $search);
		$data['page']  = (int) $this->get('page');
		$data['limit'] = $this->limit;

		if ($data) :
			$this->response($data, REST_Controller::HTTP_OK); // (200)
		else :
			$this->response(array('error' => 'Data is Not Found'), REST_Controller::HTTP_NOT_FOUND);
		endif;
	}

	function get_list_laporan_operasi_03_get()
	{ //laporan mutasi obat
		if (!$this->get('page')) :
			$this->response(null, REST_Controller::HTTP_BAD_REQUEST); // (400)
		endif;

		$start  = ($this->get('page') - 1) * $this->limit;
		$search = [
			'periode_laporan' => safe_get('periode_laporan'),
			'tanggal_harian'  => safe_get('tanggal_harian'),
			'bulan'           => safe_get('bulan'),
			'tahun'           => safe_get('tahun'),
			'tanggal_awal'	  => safe_get('tanggal_awal'),
			'tanggal_awal'	  => safe_get('tanggal_awal'),
			'id_dokter'   		=> safe_get('id_dokter')
		];

		// $data          = $this->m_laporan_operasi->getListDataLaporanMutasiObat( 0, 0, $search );
		$data          = $this->m_laporan_operasi->getLaporanAnastesiOK($this->limit, $start, $search);
		$data['page']  = (int) $this->get('page');
		$data['limit'] = $this->limit;

		if ($data) :
			$this->response($data, REST_Controller::HTTP_OK); // (200)
		else :
			$this->response(array('error' => 'Data is Not Found'), REST_Controller::HTTP_NOT_FOUND);
		endif;
	}

	function get_list_laporan_operasi_04_get()
	{ //laporan mutasi obat
		if (!$this->get('page')) :
			$this->response(null, REST_Controller::HTTP_BAD_REQUEST); // (400)
		endif;

		$start  = ($this->get('page') - 1) * $this->limit;
		$search = [
			'periode_laporan' => safe_get('periode_laporan'),
			'tanggal_harian'  => safe_get('tanggal_harian'),
			'bulan'           => safe_get('bulan'),
			'tahun'           => safe_get('tahun'),
			'tanggal_awal'	  => safe_get('tanggal_awal'),
			'tanggal_awal'	  => safe_get('tanggal_awal'),
			'id_dokter'   		=> safe_get('id_dokter'),
			'spesialisasi'   	=> safe_get('spesialisasi')
		];

		// $data          = $this->m_laporan_operasi->getListDataLaporanMutasiObat( 0, 0, $search );
		$data          = $this->m_laporan_operasi->getLaporanRekapOperasi($this->limit, $start, $search);
		$data['page']  = (int) $this->get('page');
		$data['limit'] = $this->limit;

		if ($data) :
			$this->response($data, REST_Controller::HTTP_OK); // (200)
		else :
			$this->response(array('error' => 'Data is Not Found'), REST_Controller::HTTP_NOT_FOUND);
		endif;
	}

}
