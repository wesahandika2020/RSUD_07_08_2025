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
class Laporan_rajal extends REST_Controller
{
	function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->datetime = date('Y-m-d H:i:s');
		$this->limit    = 50;
		$this->load->model('Laporan_rajal_model', 'm_laporan_rajal');

		$id_translucent = $this->session->userdata('id_translucent');
		if (empty($id_translucent)) :
			$this->response(array('error' => 'Anda belum login'), REST_Controller::HTTP_UNAUTHORIZED);
			exit();
		endif;
	}

	//laporan waktu tunggu
	function get_list_laporan_rajal_01_get()
	{ 
		if (!$this->get('page')) :
			$this->response(null, REST_Controller::HTTP_BAD_REQUEST); // (400)
		endif;

		$start  = ($this->get('page') - 1) * $this->limit;
		$search = [
			'periode_laporan' 	=> safe_get('periode_laporan'),
			'tanggal_harian'  	=> safe_get('tanggal_harian'),
			'bulan'           	=> safe_get('bulan'),
			'tahun'           	=> safe_get('tahun'),
			'tanggal_awal'	  	=> safe_get('tanggal_awal'),
			'tanggal_akhir'   	=> safe_get('tanggal_akhir'),
			'id_dokter'       	=> safe_get('id_dokter'),
			'jenis_pasien'	 	=> safe_get('jenis_pasien'),
			'penjamin'			=> safe_get('penjamin'),
			'tempat_layanan'	=> safe_get('tempat_layanan'),
			
		];

		$data          = $this->m_laporan_rajal->getListDataLaporanWaktuTunggu($this->limit, $start, $search);
		$data['page']  = (int) $this->get('page');
		$data['limit'] = $this->limit;

		if ($data) :
			$this->response($data, REST_Controller::HTTP_OK); // (200)
		else :
			$this->response(array('error' => 'Data is Not Found'), REST_Controller::HTTP_NOT_FOUND);
		endif;
	}

	// Laporan Pemeriksaan
	function get_list_laporan_rajal_02_get()
	{ 
		if (!$this->get('page')) :
			$this->response(null, REST_Controller::HTTP_BAD_REQUEST); // (400)
		endif;

		$start  = ($this->get('page') - 1) * $this->limit;
		$search = [
			'periode_laporan' 	=> safe_get('periode_laporan'),
			'tanggal_harian'  	=> safe_get('tanggal_harian'),
			'bulan'           	=> safe_get('bulan'),
			'tahun'           	=> safe_get('tahun'),
			'tanggal_awal'	  	=> safe_get('tanggal_awal'),
			'tanggal_akhir'   	=> safe_get('tanggal_akhir'),
			'id_dokter'       	=> safe_get('id_dokter'),
			'jenis_pasien'	 	=> safe_get('jenis_pasien'),
			'penjamin'			=> safe_get('penjamin'),
			'tempat_layanan'	=> safe_get('tempat_layanan'),
			
		];

		$data          = $this->m_laporan_rajal->getListDataLaporanPemeriksaan($this->limit, $start, $search);
		$data['page']  = (int) $this->get('page');
		$data['limit'] = $this->limit;

		if ($data) :
			$this->response($data, REST_Controller::HTTP_OK); // (200)
		else :
			$this->response(array('error' => 'Data is Not Found'), REST_Controller::HTTP_NOT_FOUND);
		endif;
	}

	// Laporan kunjungan
	function get_list_laporan_rajal_03_get()
	{ 
		if (!$this->get('page')) :
			$this->response(null, REST_Controller::HTTP_BAD_REQUEST); // (400)
		endif;

		$start  = ($this->get('page') - 1) * $this->limit;
		$search = [
			'periode_laporan' 	=> safe_get('periode_laporan'),
			'tanggal_harian'  	=> safe_get('tanggal_harian'),
			'bulan'           	=> safe_get('bulan'),
			'tahun'           	=> safe_get('tahun'),
			'tanggal_awal'	  	=> safe_get('tanggal_awal'),
			'tanggal_akhir'   	=> safe_get('tanggal_akhir'),
			'id_dokter'       	=> safe_get('id_dokter'),
			'jenis_pasien'	 	=> safe_get('jenis_pasien'),
			'penjamin'			=> safe_get('penjamin'),
			'tempat_layanan'	=> safe_get('tempat_layanan'),
			'status_kunjungan'	=> safe_get('status_kunjungan'),
			'status_terlayani'	=> safe_get('status_terlayani'),				
		];

		$data          = $this->m_laporan_rajal->getListDataLaporanKunjungan($this->limit, $start, $search);
		$data['page']  = (int) $this->get('page');
		$data['limit'] = $this->limit;

		if ($data) :
			$this->response($data, REST_Controller::HTTP_OK); // (200)
		else :
			$this->response(array('error' => 'Data is Not Found'), REST_Controller::HTTP_NOT_FOUND);
		endif;
	}

	//laporan mrs
	function get_list_laporan_mrs_get()
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
			
		];

		$data          = $this->m_laporan_rajal->getListDataLaporanMrs((int)$this->limit, (int)$start, $search);
		$data['page']  = (int)$page;
		$data['limit'] = (int)$this->limit;

		if ($data) :
			$this->response($data, REST_Controller::HTTP_OK); // (200)
		else :
			$this->response(array('error' => 'Data is Not Found'), REST_Controller::HTTP_NOT_FOUND);
		endif;
	}

	function get_list_laporan_diagnosa_get()
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
			'tempat_layanan'	=> safe_get('tempat_layanan'),
		];

		$data          = $this->m_laporan_rajal->getListDataLaporanDiagnosa((int)$this->limit, (int)$start, $search);
		$data['page']  = (int)$page;
		$data['limit'] = (int)$this->limit;

		if ($data) :
			$this->response($data, REST_Controller::HTTP_OK); // (200)
		else :
			$this->response(array('error' => 'Data is Not Found'), REST_Controller::HTTP_NOT_FOUND);
		endif;
	}

	function get_list_laporan_diagnosa_pp_get()
	{ 
		if ($this->get('page') === null){

            $page = 1;

        } else {

            $page = (int)$this->get('page');

        }

		$limit = 10;

        $start  = ((int)$page - 1) * $limit;
		$search = [
			'periode_laporan' 	=> safe_get('periode_laporan'),
			'tanggal_harian'  	=> safe_get('tanggal_harian'),
			'bulan'           	=> safe_get('bulan'),
			'tahun'           	=> safe_get('tahun'),
			'tanggal_awal'	  	=> safe_get('tanggal_awal'),
			'tanggal_akhir'   	=> safe_get('tanggal_akhir'),
			'tempat_layanan'	=> safe_get('tempat_layanan'),
		];

		$data          = $this->m_laporan_rajal->getListDataLaporanDiagnosaPp($limit, (int)$start, $search);
		$data['page']  = (int)$page;
		$data['limit'] = $limit;

		if ($data) :
			$this->response($data, REST_Controller::HTTP_OK); // (200)
		else :
			$this->response(array('error' => 'Data is Not Found'), REST_Controller::HTTP_NOT_FOUND);
		endif;
	}

	function get_list_laporan_rm_11_get()
	{
		$this->load->model('laporan_rm/Laporan_rm_model', 'm_laporan_rm');
		if (!$this->get('page')) :
			$this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
		endif;

		$limit = 20;
		$start  = ($this->get('page') - 1) * $limit;
		$search = [
			'jenis_laporan'   	=> safe_get('jenis_laporan'),
			'periode_laporan' 	=> safe_get('periode_laporan'),
			'tanggal_harian'  	=> safe_get('tanggal_harian'),
			'bulan'           	=> safe_get('bulan'),
			'tahun'           	=> safe_get('tahun'),
			'tanggal_awal'    	=> safe_get('tanggal_awal'),
			'tanggal_akhir'   	=> safe_get('tanggal_akhir'),
			'asal_kunjungan_11'	=> safe_get('asal_kunjungan_status_keluar'),
			'asal_poli'	        => safe_get('asal_poli'),
			'status_keluar'		=> safe_get('status_keluar'),
			'shift_poli'		=> safe_get('shift_poli'),
		];

		$data          = $this->m_laporan_rm->getListDataLaporanRM11($limit, $start, $search);
		$data['page']  = (int) $this->get('page');
		$data['limit'] = $limit;

		if ($data) :
			$this->response($data, REST_Controller::HTTP_OK); // (200)
		else :
			$this->response(array('error' => 'Data is Not Found'), REST_Controller::HTTP_NOT_FOUND);
		endif;
	}

	function get_list_laporan_terima_resep_get()
	{ 
		if ($this->get('page') === null){
            $page = 1;
        } else {
            $page = (int)$this->get('page');
        }
		$limit = 10;
        $start  = ((int)$page - 1) * $limit;
		$search = [
			'periode_laporan' 	=> safe_get('periode_laporan'),
			'tanggal_harian'  	=> safe_get('tanggal_harian'),
			'bulan'           	=> safe_get('bulan'),
			'tahun'           	=> safe_get('tahun'),
			'tanggal_awal'	  	=> safe_get('tanggal_awal'),
			'tanggal_akhir'   	=> safe_get('tanggal_akhir'),
			'tempat_layanan'	=> safe_get('tempat_layanan'),
			'id_dokter'			=> safe_get('id_dokter'),
		];

		$data          = $this->m_laporan_rajal->getListDataLaporanDiagnosaTr($limit, (int)$start, $search);
		$data['page']  = (int)$page;
		$data['limit'] = $limit;

		if ($data) :
			$this->response($data, REST_Controller::HTTP_OK); // (200)
		else :
			$this->response(array('error' => 'Data is Not Found'), REST_Controller::HTTP_NOT_FOUND);
		endif;
	}
}
