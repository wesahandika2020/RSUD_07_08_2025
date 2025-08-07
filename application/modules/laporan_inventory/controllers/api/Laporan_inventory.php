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
class Laporan_inventory extends REST_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->limit    = 50;
		$this->datetime = date('Y-m-d H:i:s');
		$this->load->model('Laporan_inventory_model', 'm_laporan_inventory');

		$id_translucent = $this->session->userdata('id_translucent');
		if (empty($id_translucent)) :
			$this->response(array('error' => 'Anda belum login'), REST_Controller::HTTP_UNAUTHORIZED);
			exit();
		endif;
	}

	function get_list_laporan_inventory_01_get()
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
			'tanggal_akhir'   => safe_get('tanggal_akhir'),
			'unit'			  		=> safe_get('unit'),
			'golongan'		  	=> safe_get('golongan'),
			'jenis'			  		=> safe_get('jenis'),
			'kategori'		  	=> safe_get('kategori'),
			'fornas'		  		=> safe_get('fornas'),
			'generik'		  		=> safe_get('generik')
		];

		// $data          = $this->m_laporan_inventory->getListDataLaporanMutasiObat( 0, 0, $search );
		$data          = $this->m_laporan_inventory->getListDataLaporanMutasiObat($this->limit, $start, $search);
		$data['page']  = (int) $this->get('page');
		$data['limit'] = $this->limit;

		if ($data) :
			$this->response($data, REST_Controller::HTTP_OK); // (200)
		else :
			$this->response(array('error' => 'Data is Not Found'), REST_Controller::HTTP_NOT_FOUND);
		endif;
	}

	function get_list_laporan_inventory_02_get()
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
			'tanggal_awal'    => safe_get('tanggal_awal'),
			'tanggal_akhir'   => safe_get('tanggal_akhir'),
			'unit_depo'		  => safe_get('unit_depo'),
			'kategori'		  => safe_get('kategori'),
			'jenis_pasien'	  => safe_get('jenis_pasien'),
			'pasien_search'	  => safe_get('pasien_search'),
			'barang_search'	  => safe_get('barang_search'),
			'ruangan_rajal'	  => safe_get('ruangan_rajal'),
			'ruangan_ranap'	  => safe_get('ruangan_ranap'),
			'dokter_search'	  => safe_get('dokter_search'),
			'fornas'		  => safe_get('fornas'),
			'generik'		  => safe_get('generik')
		];

		// var_dump($search);die;
		// $data          = $this->m_laporan_inventory->getListDataLaporanMutasiObat( 0, 0, $search );
		$data          = $this->m_laporan_inventory->getListLaporanBukuPenjualan($this->limit, $start, $search);
		$data['page']  = (int) $this->get('page');
		$data['limit'] = $this->limit;


		if ($data) :
			$this->response($data, REST_Controller::HTTP_OK); // (200)
		else :
			$this->response(array('error' => 'Data is Not Found'), REST_Controller::HTTP_NOT_FOUND);
		endif;
	}

	function get_list_laporan_inventory_03_get()
	{ //laporan penjualan obat
		if (!$this->get('page')) :
			$this->response(null, REST_Controller::HTTP_BAD_REQUEST); // (400)
		endif;

		$start  = ($this->get('page') - 1) * $this->limit;
		$search = [
			'periode_laporan' 	=> safe_get('periode_laporan'),
			'tanggal_harian'  	=> safe_get('tanggal_harian'),
			'bulan'           	=> safe_get('bulan'),
			'tahun'           	=> safe_get('tahun'),
			'tanggal_awal'		=> safe_get('tanggal_awal'),
			'tanggal_akhir'   	=> safe_get('tanggal_akhir'),
			'unit_depo'			=> safe_get('unit_depo'),
			'kategori'			=> safe_get('kategori'),
			'jenis_pasien'		=> safe_get('jenis_pasien'),
			'jaminan'			=> safe_get('jaminan'),
		];

		// $data          = $this->m_laporan_inventory->getListDataLaporanMutasiObat( 0, 0, $search );
		$data          = $this->m_laporan_inventory->getListLaporanPenjualanObat($this->limit, $start, $search);
		$data['page']  = (int) $this->get('page');
		$data['limit'] = $this->limit;

		if ($data) :
			$this->response($data, REST_Controller::HTTP_OK); // (200)
		else :
			$this->response(array('error' => 'Data is Not Found'), REST_Controller::HTTP_NOT_FOUND);
		endif;
	}

	function get_list_laporan_inventory_04_get()
	{ //laporan penjualan obat
		if (!$this->get('page')) :
			$this->response(null, REST_Controller::HTTP_BAD_REQUEST); // (400)
		endif;

		$start  = ($this->get('page') - 1) * $this->limit;
		$search = [
			'periode_laporan' 	=> safe_get('periode_laporan'),
			'tanggal_harian'  	=> safe_get('tanggal_harian'),
			'bulan'           	=> safe_get('bulan'),
			'tahun'           	=> safe_get('tahun'),
			'tanggal_awal'			=> safe_get('tanggal_awal'),
			'tanggal_akhir'   	=> safe_get('tanggal_akhir'),
			'unit_depo'					=> safe_get('unit_depo'),
			'barang_search'	  	=> safe_get('barang_search_04'),
			'kategori'					=> safe_get('kategori'),
			'golongan'					=> safe_get('golongan'),
			'jenis'							=> safe_get('jenis'),
			'fornas'						=> safe_get('fornas'),
			'generik'						=> safe_get('generik')
		];

		// $data          = $this->m_laporan_inventory->getListDataLaporanMutasiObat( 0, 0, $search );
		$data          = $this->m_laporan_inventory->getListLaporanPemakaianObat($this->limit, $start, $search);
		$data['page']  = (int) $this->get('page');
		$data['limit'] = $this->limit;

		if ($data) :
			$this->response($data, REST_Controller::HTTP_OK); // (200)
		else :
			$this->response(array('error' => 'Data is Not Found'), REST_Controller::HTTP_NOT_FOUND);
		endif;
	}

	function get_list_laporan_inventory_05_get()
	{ //laporan penjualan obat
		if (!$this->get('page')) :
			$this->response(null, REST_Controller::HTTP_BAD_REQUEST); // (400)
		endif;

		$start  = ($this->get('page') - 1) * $this->limit;
		$search = [
			'periode_laporan' 	=> safe_get('periode_laporan'),
			'tanggal_harian'  	=> safe_get('tanggal_harian'),
			'bulan'           	=> safe_get('bulan'),
			'tahun'           	=> safe_get('tahun'),
			'tanggal_awal'			=> safe_get('tanggal_awal'),
			'tanggal_akhir'   	=> safe_get('tanggal_akhir'),
			'unit_depo'					=> safe_get('unit_depo'),
			'barang_search'	  	=> safe_get('barang_search_05'),
			'kategori'					=> safe_get('kategori'),
			'golongan'					=> safe_get('golongan'),
			'jenis'							=> safe_get('jenis'),
			'fornas'						=> safe_get('fornas'),
			'generik'						=> safe_get('generik')
		];

		// $data          = $this->m_laporan_inventory->getListDataLaporanMutasiObat( 0, 0, $search );
		$data          = $this->m_laporan_inventory->getListLaporanPemakaianObatAllUnit($this->limit, $start, $search);
		$data['page']  = (int) $this->get('page');
		$data['limit'] = $this->limit;

		if ($data) :
			$this->response($data, REST_Controller::HTTP_OK); // (200)
		else :
			$this->response(array('error' => 'Data is Not Found'), REST_Controller::HTTP_NOT_FOUND);
		endif;
	}

	function get_list_laporan_inventory_06_get()
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
			'tanggal_awal'		=> safe_get('tanggal_awal'),
			'tanggal_akhir'   	=> safe_get('tanggal_akhir'),
			'unit_depo'			=> safe_get('unit_depo_06'),
			'barang_search'	  	=> safe_get('barang_search_06')
		];
		$data          = $this->m_laporan_inventory->getListLaporanPengeluaranObat($this->limit, $start, $search);
		$data['page']  = (int) $this->get('page');
		$data['limit'] = $this->limit;

		if ($data) :
			$this->response($data, REST_Controller::HTTP_OK); // (200)
		else :
			$this->response(array('error' => 'Data is Not Found'), REST_Controller::HTTP_NOT_FOUND);
		endif;
	}

	function get_list_laporan_inventory_07_get()
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
			'tanggal_awal'			=> safe_get('tanggal_awal'),
			'tanggal_akhir'   	=> safe_get('tanggal_akhir'),
			'unit_depo'					=> safe_get('unit_depo_07'),
			'barang_search'	  	=> safe_get('barang_search_07')
		];

		$data          = $this->m_laporan_inventory->getListLaporanPermintaanObat($this->limit, $start, $search);
		$data['page']  = (int) $this->get('page');
		$data['limit'] = $this->limit;

		if ($data) :
			$this->response($data, REST_Controller::HTTP_OK); // (200)
		else :
			$this->response(array('error' => 'Data is Not Found'), REST_Controller::HTTP_NOT_FOUND);
		endif;
	}

	function get_list_laporan_inventory_08_get()
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
			'tanggal_awal'			=> safe_get('tanggal_awal'),
			'tanggal_akhir'   	=> safe_get('tanggal_akhir'),
			'unit_depo'					=> safe_get('unit_depo_08'),
			'barang_search'	  	=> safe_get('barang_search_08')
		];

		$data          = $this->m_laporan_inventory->getListLaporanPermintaanUnitkeGudang($this->limit, $start, $search);
		$data['page']  = (int) $this->get('page');
		$data['limit'] = $this->limit;

		if ($data) :
			$this->response($data, REST_Controller::HTTP_OK); // (200)
		else :
			$this->response(array('error' => 'Data is Not Found'), REST_Controller::HTTP_NOT_FOUND);
		endif;
	}

	function get_list_laporan_inventory_09_get()
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
			'tanggal_awal'			=> safe_get('tanggal_awal'),
			'tanggal_akhir'   	=> safe_get('tanggal_akhir'),
			'unit_tujuan'       => safe_get('unit_tujuan'),
			'dari_unit'         => safe_get('dari_unit'),
			'barang_search'     => safe_get('barang_search_09')
		];

		$data          = $this->m_laporan_inventory->getListLaporanPermintaanTakTerlayani($this->limit, $start, $search);
		$data['page']  = (int) $this->get('page');
		$data['limit'] = $this->limit;

		if ($data) :
			$this->response($data, REST_Controller::HTTP_OK); // (200)
		else :
			$this->response(array('error' => 'Data is Not Found'), REST_Controller::HTTP_NOT_FOUND);
		endif;
	}

	function get_list_laporan_inventory_10_get()
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
			'tanggal_awal'			=> safe_get('tanggal_awal'),
			'tanggal_akhir'   	=> safe_get('tanggal_akhir'),
			'unit_depo'       	=> safe_get('unit_depo_10'),
			'barang_search'     => safe_get('barang_search_10')

		];

		$data          = $this->m_laporan_inventory->getListLaporanStokOpname($this->limit, $start, $search);
		$data['page']  = (int) $this->get('page');
		$data['limit'] = $this->limit;

		if ($data) :
			$this->response($data, REST_Controller::HTTP_OK); // (200)
		else :
			$this->response(array('error' => 'Data is Not Found'), REST_Controller::HTTP_NOT_FOUND);
		endif;
	}
}
