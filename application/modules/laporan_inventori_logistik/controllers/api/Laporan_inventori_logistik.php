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
class Laporan_inventori_logistik extends REST_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->limit    = 20;
		date_default_timezone_set('Asia/Jakarta');
		$this->datetime = date('Y-m-d H:i:s');
		$this->load->model('Laporan_inventori_logistik_model', 'laporan');

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

	function barang_pembelian_get()
	{
		$param['search'] = safe_get('q');
		$param["jenis_barang"] = safe_get("jenis_barang");
		$param["jenissppb"] = safe_get("jenissppb");
		$param["aktif"] = safe_get("aktif");
		$page = (int)safe_get('page');
		$start = (int)$this->start($page);
		$param['jenis'] = safe_get('jenis');
		$data = $this->laporan->getAutoBarangPembelian($param, (int)$start, (int)$this->limit);
		// var_dump(safe_get("jenissppb"));
		if ((safe_get("jenissppb") !== '') && (safe_get('page') == 1) && (safe_get('q') == '')) :

			$pilih[] = array(
				'id' => '',
				'nama' => 'Semua Barang',
				'kekuatan' => ' ',
				'satuan_kekuatan' => ' ',
			);

			$data['data'] = array_merge($pilih, $data['data']);
			$data['total'] += 1;
		endif;
		$this->response($data, REST_Controller::HTTP_OK);
	}

	function barang_non_kategori_get()
	{
		$param['search'] = safe_get('q');
		$param["jenis_barang"] = safe_get("jenis_barang");
		$param["aktif"] = safe_get("aktif");
		$page = (int)safe_get('page');
		$start = (int)$this->start($page);
		$param['jenis'] = safe_get('jenis');
		$data = $this->laporan->getAutoBarangNonKategori($param, (int)$start, (int)$this->limit);
		if ((safe_get('page') == 1) && (safe_get('q') == '')) :

			$pilih[] = array(
				'id' => '',
				'nama' => 'Semua Barang',
				'kekuatan' => ' ',
				'satuan_kekuatan' => ' ',
			);

			$data['data'] = array_merge($pilih, $data['data']);
			$data['total'] += 1;
		endif;
		$this->response($data, REST_Controller::HTTP_OK);
	}

	function get_list_laporan_mutasi_get()
	{ //laporan mutasi logistik
		if (!$this->get('page')) :
			$this->response(null, REST_Controller::HTTP_BAD_REQUEST); // (400)
		endif;

		$start  = ((int)$this->get('page') - 1) * (int)$this->limit;
		$search = [
			'periode_laporan' => safe_get('periode_laporan'),
			'tanggal_harian'  => safe_get('tanggal_harian'),
			'bulan'           => safe_get('bulan'),
			'tahun'           => safe_get('tahun'),
			'tanggal_awal'	  => safe_get('tanggal_awal'),
			'tanggal_akhir'   => safe_get('tanggal_akhir'),
			'unit'			  		=> safe_get('unit'),
			'kategori'		  	=> safe_get('kategori'),
			'pembayaran'		  => safe_get('pembayaran'),
		];

		$data          = $this->laporan->getListDataMutasiLogistik((int)$this->limit, (int)$start, $search);
		$data['page']  = (int) $this->get('page');
		$data['limit'] = (int)$this->limit;

		if ($data) :
			$this->response($data, REST_Controller::HTTP_OK); // (200)
		else :
			$this->response(array('error' => 'Data is Not Found'), REST_Controller::HTTP_NOT_FOUND);
		endif;
	}

	function get_list_laporan_pengeluaran_get()
	{
		//laporan pengeluaran logistik
		if (!$this->get('page')) :
			$this->response(null, REST_Controller::HTTP_BAD_REQUEST); // (400)
		endif;

		$start  = ((int)$this->get('page') - 1) * (int)$this->limit;
		$search = [
			'periode_laporan' 	=> safe_get('periode_laporan'),
			'tanggal_harian'  	=> safe_get('tanggal_harian'),
			'bulan'           	=> safe_get('bulan'),
			'tahun'           	=> safe_get('tahun'),
			'tanggal_awal'			=> safe_get('tanggal_awal'),
			'tanggal_akhir'   	=> safe_get('tanggal_akhir'),
			'unit_depo'					=> safe_get('unit_pengeluaran'),
			'barang_search'	  	=> safe_get('barang_search_pengeluaran'),
			'pembayaran'		  	=> safe_get('pembayaran_pengeluaran')
		];
		$data          = $this->laporan->getListLaporanPengeluaran((int)$this->limit, (int)$start, $search);
		$data['page']  = (int) $this->get('page');
		$data['limit'] = (int)$this->limit;

		if ($data) :
			$this->response($data, REST_Controller::HTTP_OK); // (200)
		else :
			$this->response(array('error' => 'Data is Not Found'), REST_Controller::HTTP_NOT_FOUND);
		endif;
	}

	function get_list_laporan_pembelian_get()
	{ //laporan pembelian logistik
		if (!$this->get('page')) :
			$this->response(null, REST_Controller::HTTP_BAD_REQUEST); // (400)
		endif;

		$start  = ((int)$this->get('page') - 1) * (int)$this->limit;
		$search = [
			'periode_laporan' 	=> safe_get('periode_laporan'),
			'tanggal_harian'  	=> safe_get('tanggal_harian'),
			'bulan'           	=> safe_get('bulan'),
			'tahun'           	=> safe_get('tahun'),
			'tanggal_awal'		=> safe_get('tanggal_awal'),
			'tanggal_akhir'   	=> safe_get('tanggal_akhir'),
			'kategori'			=> safe_get('kategori'),
			'unit'				=> safe_get('unit'),
			'barang'	  		=> safe_get('barang_search_pembelian'),
		];

		$data          = $this->laporan->getListLaporanPembelianLogistik((int)$this->limit, (int)$start, $search);
		$data['page']  = (int) $this->get('page');
		$data['limit'] = (int)$this->limit;

		if ($data) :
			$this->response($data, REST_Controller::HTTP_OK); // (200)
		else :
			$this->response(array('error' => 'Data is Not Found'), REST_Controller::HTTP_NOT_FOUND);
		endif;
	}

	function get_list_laporan_permintaan_get()
	{ //laporan permintaan logistik
		if (!$this->get('page')) :
			$this->response(null, REST_Controller::HTTP_BAD_REQUEST); // (400)
		endif;

		$start  = ((int)$this->get('page') - 1) * (int)$this->limit;
		$search = [
			'periode_laporan' 	=> safe_get('periode_laporan'),
			'tanggal_harian'  	=> safe_get('tanggal_harian'),
			'bulan'           	=> safe_get('bulan'),
			'tahun'           	=> safe_get('tahun'),
			'tanggal_awal'		=> safe_get('tanggal_awal'),
			'tanggal_akhir'   	=> safe_get('tanggal_akhir'),
			'kategori'			=> safe_get('kategori'),
			'unit'				=> safe_get('unit'),
			'barang'	  		=> safe_get('barang'),
			'pembayaran'		=> safe_get('pembayaran_permintaan')
		];

		$data          = $this->laporan->getListLaporanPermintaanLogistik((int)$this->limit, (int)$start, $search);
		$data['page']  = (int) $this->get('page');
		$data['limit'] = (int)$this->limit;

		if ($data) :
			$this->response($data, REST_Controller::HTTP_OK); // (200)
		else :
			$this->response(array('error' => 'Data is Not Found'), REST_Controller::HTTP_NOT_FOUND);
		endif;
	}

	function get_list_laporan_pemakaian_get()
	{ //laporan pemakaian logistik
		if (!$this->get('page')) :
			$this->response(null, REST_Controller::HTTP_BAD_REQUEST); // (400)
		endif;

		$start  = ((int)$this->get('page') - 1) * (int)$this->limit;
		$search = [
			'periode_laporan'	=> safe_get('periode_laporan'),
			'tanggal_harian'  => safe_get('tanggal_harian'),
			'bulan'           => safe_get('bulan'),
			'tahun'           => safe_get('tahun'),
			'tanggal_awal'		=> safe_get('tanggal_awal'),
			'tanggal_akhir'   => safe_get('tanggal_akhir'),
			'kategori'				=> safe_get('kategori'),
			'unit'						=> safe_get('unit'),
			'barang'	  			=> safe_get('barang'),
			'pembayaran'		  => safe_get('pembayaran_pemakaian'),
		];

		$data          = $this->laporan->getListLaporanPemakaianLogistik((int)$this->limit, (int)$start, $search);
		$data['page']  = (int) $this->get('page');
		$data['limit'] = (int)$this->limit;

		if ($data) :
			$this->response($data, REST_Controller::HTTP_OK); // (200)
		else :
			$this->response(array('error' => 'Data is Not Found'), REST_Controller::HTTP_NOT_FOUND);
		endif;
	}
}
