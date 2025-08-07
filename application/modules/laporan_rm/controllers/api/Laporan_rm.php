<?php

defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';
require_once APPPATH . 'modules/vclaim_bpjs/controllers/Vclaim_bpjs_v2.php';

use Restserver\Libraries\REST_Controller;

/**
 * @package         CodeIgniter
 * @subpackage      Rest Server
 * @category        Controller
 * @author          Muhamad Wahyudin
 * @license         Syams Corporation
 */
class Laporan_rm extends REST_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->limit    = 10;
		$this->datetime = date('Y-m-d H:i:s');
		$this->load->model('Laporan_rm_model', 'm_laporan_rm');
		$this->load->model('App_model', 'm_default');


		$this->load->model('vclaim_bpjs/Sep_v2_model', 'm_sep_v2');
		$this->load->model('pasien/Pasien_model', 'pasien');

		$id_translucent = $this->session->userdata('id_translucent');
		if (empty($id_translucent)) :
			$this->response(array('error' => 'Anda belum login'), REST_Controller::HTTP_UNAUTHORIZED);
			exit();
		endif;
	}

	function get_list_laporan_rm_01_get()
	{
		if (!$this->get('page')) :
			$this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
		endif;

		$start  = ($this->get('page') - 1) * $this->limit;
		$search = [
			'periode_laporan'  => safe_get('periode_laporan'),
			'tanggal_harian'   => safe_get('tanggal_harian'),
			'bulan'            => safe_get('bulan'),
			'tahun'            => safe_get('tahun'),
			'tanggal_awal'     => safe_get('tanggal_awal'),
			'tanggal_akhir'    => safe_get('tanggal_akhir'),
			'jenis_rawat'      => safe_get('jenis_rawat'),
			'tempat_layanan_1' => safe_get('tempat_layanan_1'),
			'tempat_layanan_2' => safe_get('tempat_layanan_2'),
			'penjamin'         => safe_get('penjamin'),
			'kunjungan'        => safe_get('kunjungan'),
		];

		$data          = $this->m_laporan_rm->getListDataLaporanRM01($this->limit, $start, $search);
		$data['page']  = (int) $this->get('page');
		$data['limit'] = $this->limit;

		if ($data) :
			$this->response($data, REST_Controller::HTTP_OK); // (200)
		else :
			$this->response(array('error' => 'Data is Not Found'), REST_Controller::HTTP_NOT_FOUND);
		endif;
	}

	function get_list_laporan_rm_02_get()
	{
		if (!$this->get('page')) :
			$this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
		endif;

		$start  = ($this->get('page') - 1) * $this->limit;
		$search = [
			'jenis_laporan'    => safe_get('jenis_laporan'),
			'periode_laporan'  => safe_get('periode_laporan'),
			'tanggal_harian'   => safe_get('tanggal_harian'),
			'bulan'            => safe_get('bulan'),
			'tahun'            => safe_get('tahun'),
			'tanggal_awal'     => safe_get('tanggal_awal'),
			'tanggal_akhir'    => safe_get('tanggal_akhir'),
			'jenis_rawat'      => safe_get('jenis_rawat'),
			'tempat_layanan_1' => safe_get('tempat_layanan_1'),
			'tempat_layanan_2' => safe_get('tempat_layanan_2'),
			'penjamin'         => safe_get('penjamin'),
			'kunjungan'        => safe_get('kunjungan'),
			'asal_kunjungan'   => safe_get('asal_kunjungan'),
			'kelas_rawat'   => safe_get('kelas_rawat'),
		];

		$data          = $this->m_laporan_rm->getListDataLaporanRM02($this->limit, $start, $search);
		$data['page']  = (int) $this->get('page');
		$data['limit'] = $this->limit;

		if ($data) :
			$this->response($data, REST_Controller::HTTP_OK); // (200)
		else :
			$this->response(array('error' => 'Data is Not Found'), REST_Controller::HTTP_NOT_FOUND);
		endif;
	}

	function get_list_laporan_rm_03_get()
	{
		if (!$this->get('page')) :
			$this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
		endif;

		$start  = ($this->get('page') - 1) * $this->limit;
		$search = [
			'jenis_laporan'    => safe_get('jenis_laporan'),
			'periode_laporan'  => safe_get('periode_laporan'),
			'tanggal_harian'   => safe_get('tanggal_harian'),
			'bulan'            => safe_get('bulan'),
			'tahun'            => safe_get('tahun'),
			'tanggal_awal'     => safe_get('tanggal_awal'),
			'tanggal_akhir'    => safe_get('tanggal_akhir'),
			'jenis_rawat'      => safe_get('jenis_rawat'),
			'tempat_layanan_1' => safe_get('tempat_layanan_1'),
			'tempat_layanan_2' => safe_get('tempat_layanan_2'),
			'penjamin'         => safe_get('penjamin'),
			'kunjungan'        => safe_get('kunjungan'),
		];

		$data          = $this->m_laporan_rm->getListDataLaporanRM03($this->limit, $start, $search);
		$data['page']  = (int) $this->get('page');
		$data['limit'] = $this->limit;

		if ($data) :
			$this->response($data, REST_Controller::HTTP_OK); // (200)
		else :
			$this->response(array('error' => 'Data is Not Found'), REST_Controller::HTTP_NOT_FOUND);
		endif;
	}

	function get_list_laporan_rm_04_get()
	{
		if (!$this->get('page')) :
			$this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
		endif;

		$start  = ($this->get('page') - 1) * $this->limit;
		$search = [
			'jenis_laporan'    => safe_get('jenis_laporan'),
			'periode_laporan'  => safe_get('periode_laporan'),
			'tanggal_harian'   => safe_get('tanggal_harian'),
			'bulan'            => safe_get('bulan'),
			'tahun'            => safe_get('tahun'),
			'tanggal_awal'     => safe_get('tanggal_awal'),
			'tanggal_akhir'    => safe_get('tanggal_akhir'),
			'jenis_rawat'      => safe_get('jenis_rawat'),
			'tempat_layanan_1' => safe_get('tempat_layanan_1'),
			'tempat_layanan_2' => safe_get('tempat_layanan_2'),
			'penjamin'         => safe_get('penjamin'),
			'kunjungan'        => safe_get('kunjungan'),
		];

		$data          = $this->m_laporan_rm->getListDataLaporanRM04($this->limit, $start, $search);
		$data['page']  = (int) $this->get('page');
		$data['limit'] = $this->limit;

		if ($data) :
			$this->response($data, REST_Controller::HTTP_OK); // (200)
		else :
			$this->response(array('error' => 'Data is Not Found'), REST_Controller::HTTP_NOT_FOUND);
		endif;
	}

	function get_list_laporan_rm_05_get()
	{
		if (!$this->get('page')) :
			$this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
		endif;

		$start  = ($this->get('page') - 1) * $this->limit;
		$search = [
			'jenis_laporan'    => safe_get('jenis_laporan'),
			'periode_laporan'  => safe_get('periode_laporan'),
			'tanggal_harian'   => safe_get('tanggal_harian'),
			'bulan'            => safe_get('bulan'),
			'tahun'            => safe_get('tahun'),
			'tanggal_awal'     => safe_get('tanggal_awal'),
			'tanggal_akhir'    => safe_get('tanggal_akhir'),
			'jenis_rawat'      => safe_get('jenis_rawat'),
			'tempat_layanan_1' => safe_get('tempat_layanan_1'),
			'tempat_layanan_2' => safe_get('tempat_layanan_2'),
			'penjamin'         => safe_get('penjamin'),
			'kunjungan'        => safe_get('kunjungan'),
		];

		$data                  = $this->m_laporan_rm->getListDataLaporanRM05($this->limit, $start, $search);
		$data['laporan_wabah'] = $this->m_laporan_rm->getListWabah($search)['laporan_wabah'];
		$data['page']          = (int) $this->get('page');
		$data['limit']         = $this->limit;

		if ($data) :
			$this->response($data, REST_Controller::HTTP_OK); // (200)
		else :
			$this->response(array('error' => 'Data is Not Found'), REST_Controller::HTTP_NOT_FOUND);
		endif;
	}

	function get_list_laporan_rm_06_get()
	{
		if (!$this->get('page')) :
			$this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
		endif;

		$start  = ($this->get('page') - 1) * $this->limit;
		$search = [
			'jenis_laporan'    => safe_get('jenis_laporan'),
			'periode_laporan'  => safe_get('periode_laporan'),
			'tanggal_harian'   => safe_get('tanggal_harian'),
			'bulan'            => safe_get('bulan'),
			'tahun'            => safe_get('tahun'),
			'tanggal_awal'     => safe_get('tanggal_awal'),
			'tanggal_akhir'    => safe_get('tanggal_akhir'),
			'jenis_rawat'      => safe_get('jenis_rawat'),
			'tempat_layanan_1' => safe_get('tempat_layanan_1'),
			'tempat_layanan_2' => safe_get('tempat_layanan_2'),
			'tempat_layanan_3' => safe_get('tempat_layanan_3'),
			'penjamin'         => safe_get('penjamin'),
			'kunjungan'        => safe_get('kunjungan'),
			'dokter_search'    => safe_get('dokter_search'),
		];

		$periode = "";
		if ($search["periode_laporan"] === "Bulanan") {
			if ($search["bulan"] == '01') {
				$periode = "Januari " . $search["tahun"];
			} elseif ($search["bulan"] == '02') {
				$periode = "Februari " . $search["tahun"];
			} elseif ($search["bulan"] == '03') {
				$periode = "Maret " . $search["tahun"];
			} elseif ($search["bulan"] == '04') {
				$periode = "April " . $search["tahun"];
			} elseif ($search["bulan"] == '05') {
				$periode = "Mei " . $search["tahun"];
			} elseif ($search["bulan"] == '06') {
				$periode = "Juni " . $search["tahun"];
			} elseif ($search["bulan"] == '07') {
				$periode = "Juli " . $search["tahun"];
			} elseif ($search["bulan"] == '08') {
				$periode = "Agustus " . $search["tahun"];
			} elseif ($search["bulan"] == '09') {
				$periode = "September " . $search["tahun"];
			} elseif ($search["bulan"] == '10') {
				$periode = "Oktober " . $search["tahun"];
			} elseif ($search["bulan"] == '11') {
				$periode = "November " . $search["tahun"];
			} elseif ($search["bulan"] == '12') {
				$periode = "Desember " . $search["tahun"];
			}
		} elseif ($search["periode_laporan"] === "Harian") {
			$periode = get_date_format(date2mysql($search['tanggal_harian']));
		} elseif ($search["periode_laporan"] === "Rentang Waktu") {
			$periode = get_date_format(date2mysql($search['tanggal_awal'])) . " s.d " . get_date_format(date2mysql($search['tanggal_akhir']));
		}

		$data['per_unit_pelayanan'] = $this->m_laporan_rm->getListDataLaporanPerUnitPelayananRM06($search);
		$data['per_dokter']         = $this->m_laporan_rm->getListDataDokterLaporan06($this->limit, $start, $search);
		$data['per_dokter_total']   = $this->m_laporan_rm->getListDataTotalDokterLaporan06($this->limit, $start, $search);
		$data['per_wilayah']        = $this->m_laporan_rm->getListDataLaporanPerWilayahRM06(0, 0, $search);
		$data['periode']            = $periode;
		$data['page']               = (int) $this->get('page');
		$data['limit']              = $this->limit;
		$data['parameter']          = $search;

		if ($data) :
			$this->response($data, REST_Controller::HTTP_OK); // (200)
		else :
			$this->response(array('error' => 'Data is Not Found'), REST_Controller::HTTP_NOT_FOUND);
		endif;
	}

	function get_list_laporan_rm_07_get()
	{
		if (!$this->get('page')) :
			$this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
		endif;

		$start  = ($this->get('page') - 1) * $this->limit;
		$search = [
			'jenis_laporan'    => safe_get('jenis_laporan'),
			'periode_laporan'  => safe_get('periode_laporan'),
			'tanggal_harian'   => safe_get('tanggal_harian'),
			'bulan'            => safe_get('bulan'),
			'tahun'            => safe_get('tahun'),
			'tanggal_awal'     => safe_get('tanggal_awal'),
			'tanggal_akhir'    => safe_get('tanggal_akhir'),
			'jenis_rawat'      => safe_get('jenis_rawat'),
			'tempat_layanan_1' => safe_get('tempat_layanan_1'),
			'tempat_layanan_2' => safe_get('tempat_layanan_2'),
			'penjamin'         => safe_get('penjamin'),
			'kunjungan'        => safe_get('kunjungan'),
			'dokter_search'    => safe_get('dokter_search'),
		];

		$periode = "";
		if ($search["periode_laporan"] === "Bulanan") {
			if ($search["bulan"] == '01') {
				$periode = "Januari " . $search["tahun"];
			} elseif ($search["bulan"] == '02') {
				$periode = "Februari " . $search["tahun"];
			} elseif ($search["bulan"] == '03') {
				$periode = "Maret " . $search["tahun"];
			} elseif ($search["bulan"] == '04') {
				$periode = "April " . $search["tahun"];
			} elseif ($search["bulan"] == '05') {
				$periode = "Mei " . $search["tahun"];
			} elseif ($search["bulan"] == '06') {
				$periode = "Juni " . $search["tahun"];
			} elseif ($search["bulan"] == '07') {
				$periode = "Juli " . $search["tahun"];
			} elseif ($search["bulan"] == '08') {
				$periode = "Agustus " . $search["tahun"];
			} elseif ($search["bulan"] == '09') {
				$periode = "September " . $search["tahun"];
			} elseif ($search["bulan"] == '10') {
				$periode = "Oktober " . $search["tahun"];
			} elseif ($search["bulan"] == '11') {
				$periode = "November " . $search["tahun"];
			} elseif ($search["bulan"] == '12') {
				$periode = "Desember " . $search["tahun"];
			}
		} elseif ($search["periode_laporan"] === "Harian") {
			$periode = get_date_format(date2mysql($search['tanggal_harian']));
		} elseif ($search["periode_laporan"] === "Rentang Waktu") {
			$periode = get_date_format(date2mysql($search['tanggal_awal'])) . " s.d " . get_date_format(date2mysql($search['tanggal_akhir']));
		}

		$data['spesialisasi'] = $this->m_laporan_rm->getListDataLaporanPerSpesialisasiRM07(0, 0, $search);
		$data['dokter']       = $this->m_laporan_rm->getListDataLaporanPerDokterRM07($this->limit, $start, $search);
		$data['periode']      = $periode;
		$data['page']         = (int) $this->get('page');
		$data['limit']        = $this->limit;

		if ($data) :
			$this->response($data, REST_Controller::HTTP_OK); // (200)
		else :
			$this->response(array('error' => 'Data is Not Found'), REST_Controller::HTTP_NOT_FOUND);
		endif;
	}

	function get_list_laporan_rm_08_get()
	{
		if (!$this->get('page')) :
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
			'jenis_rawat'     => safe_get('jenis_rawat'),
			'penunjang'       => safe_get('jenis_penunjang'),
		];

		switch ($search['penunjang']) {
			case '1':
				$data['radiologi'] = $this->m_laporan_rm->getListDataLaporanRadiologi($this->limit, $start, $search);
				break;
			case '2':
				$data['farmasi'] = $this->m_laporan_rm->getListDataLaporanFarmasi($this->limit, $start, $search);
				break;
			case '3':
				$data['laboratorium'] = $this->m_laporan_rm->getListDataLaporanLaboratorium($this->limit, $start, $search);
				break;
			case '4':
				$data['rehab'] = $this->m_laporan_rm->getListDataLaporanRehabMedik($this->limit, $start, $search);
				break;
		}

		$data['page']  = (int) $this->get('page');
		$data['limit'] = $this->limit;

		if ($data) :
			$this->response($data, REST_Controller::HTTP_OK); // (200)
		else :
			$this->response(array('error' => 'Data is Not Found'), REST_Controller::HTTP_NOT_FOUND);
		endif;
	}

	function get_list_laporan_rm_09_get()
	{
		if (!$this->get('page')) :
			$this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
		endif;

		$start  = ($this->get('page') - 1) * $this->limit;
		$search = [
			'jenis_laporan'    => safe_get('jenis_laporan'),
			'periode_laporan'  => safe_get('periode_laporan'),
			'tanggal_harian'   => safe_get('tanggal_harian'),
			'bulan'            => safe_get('bulan'),
			'tahun'            => safe_get('tahun'),
			'tanggal_awal'     => safe_get('tanggal_awal'),
			'tanggal_akhir'    => safe_get('tanggal_akhir'),
			'jenis_rawat'      => safe_get('jenis_rawat'),
			'jenis_kasus'      => safe_get('jenis_kasus'),
			'status_keluar'    => safe_get('status_keluar')
		];

		$periode = "";
		if ($search["periode_laporan"] === "Bulanan") {
			if ($search["bulan"] == '01') {
				$periode = "Januari " . $search["tahun"];
			} elseif ($search["bulan"] == '02') {
				$periode = "Februari " . $search["tahun"];
			} elseif ($search["bulan"] == '03') {
				$periode = "Maret " . $search["tahun"];
			} elseif ($search["bulan"] == '04') {
				$periode = "April " . $search["tahun"];
			} elseif ($search["bulan"] == '05') {
				$periode = "Mei " . $search["tahun"];
			} elseif ($search["bulan"] == '06') {
				$periode = "Juni " . $search["tahun"];
			} elseif ($search["bulan"] == '07') {
				$periode = "Juli " . $search["tahun"];
			} elseif ($search["bulan"] == '08') {
				$periode = "Agustus " . $search["tahun"];
			} elseif ($search["bulan"] == '09') {
				$periode = "September " . $search["tahun"];
			} elseif ($search["bulan"] == '10') {
				$periode = "Oktober " . $search["tahun"];
			} elseif ($search["bulan"] == '11') {
				$periode = "November " . $search["tahun"];
			} elseif ($search["bulan"] == '12') {
				$periode = "Desember " . $search["tahun"];
			}
		} elseif ($search["periode_laporan"] === "Harian") {
			$periode = get_date_format(date2mysql($search['tanggal_harian']));
		} elseif ($search["periode_laporan"] === "Rentang Waktu") {
			$periode = get_date_format(date2mysql($search['tanggal_awal'])) . " s.d " . get_date_format(date2mysql($search['tanggal_akhir']));
		}

		$data = $this->m_laporan_rm->getListDataLaporanRM09(0, 0, $search);

		if ($data) :
			$this->response($data, REST_Controller::HTTP_OK); // (200)
		else :
			$this->response(array('error' => 'Data is Not Found'), REST_Controller::HTTP_NOT_FOUND);
		endif;
	}

	function get_list_laporan_rm_10_get()
	{
		if (!$this->get('page')) :
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
			'tempat_layanan_3' => safe_get('tempat_layanan_3'),
		];

		$periode = "";
		if ($search["periode_laporan"] === "Bulanan") {
			if ($search["bulan"] == '01') {
				$periode = "Januari " . $search["tahun"];
			} elseif ($search["bulan"] == '02') {
				$periode = "Februari " . $search["tahun"];
			} elseif ($search["bulan"] == '03') {
				$periode = "Maret " . $search["tahun"];
			} elseif ($search["bulan"] == '04') {
				$periode = "April " . $search["tahun"];
			} elseif ($search["bulan"] == '05') {
				$periode = "Mei " . $search["tahun"];
			} elseif ($search["bulan"] == '06') {
				$periode = "Juni " . $search["tahun"];
			} elseif ($search["bulan"] == '07') {
				$periode = "Juli " . $search["tahun"];
			} elseif ($search["bulan"] == '08') {
				$periode = "Agustus " . $search["tahun"];
			} elseif ($search["bulan"] == '09') {
				$periode = "September " . $search["tahun"];
			} elseif ($search["bulan"] == '10') {
				$periode = "Oktober " . $search["tahun"];
			} elseif ($search["bulan"] == '11') {
				$periode = "November " . $search["tahun"];
			} elseif ($search["bulan"] == '12') {
				$periode = "Desember " . $search["tahun"];
			}
		} elseif ($search["periode_laporan"] === "Harian") {
			$periode = get_date_format(date2mysql($search['tanggal_harian']));
		} elseif ($search["periode_laporan"] === "Rentang Waktu") {
			$periode = get_date_format(date2mysql($search['tanggal_awal'])) . " s.d " . get_date_format(date2mysql($search['tanggal_akhir']));
		}

		$data = $this->m_laporan_rm->getListDataLaporanRM10(0, 0, $search);
		$data = [
			'data'      => $data['data'],
			'periode'   => $periode,
			'penunjang' => empty($search['tempat_layanan_3']) ? 'Semua' : $search['tempat_layanan_3'],
		];

		if ($data) :
			$this->response($data, REST_Controller::HTTP_OK); // (200)
		else :
			$this->response(array('error' => 'Data is Not Found'), REST_Controller::HTTP_NOT_FOUND);
		endif;
	}

	function get_list_laporan_rm_11_get()
	{
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
			'asal_kunjungan_11'	=> safe_get('asal_kunjungan_11'),
			'asal_poli'			=> safe_get('asal_poli'),
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

	function get_list_laporan_rm_12_get()
	{
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
			'asal_kunjungan'	=> safe_get('asal_kunjungan'),
			'asal_poli'			=> safe_get('asal_poli'),
			'status_keluar'		=> safe_get('status_keluar'),
		];

		$data          = $this->m_laporan_rm->getListDataLaporanRM12($limit, $start, $search);
		$data['page']  = (int) $this->get('page');
		$data['limit'] = $limit;

		if ($data) :
			$this->response($data, REST_Controller::HTTP_OK); // (200)
		else :
			$this->response(array('error' => 'Data is Not Found'), REST_Controller::HTTP_NOT_FOUND);
		endif;
	}

	function get_list_laporan_rm_13_get()
	{
		if (!$this->get('page')) :
			$this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
		endif;

		$start  = ($this->get('page') - 1) * $this->limit;
		$search = [
			'jenis_laporan'    => safe_get('jenis_laporan'),
			'periode_laporan'  => safe_get('periode_laporan'),
			'tanggal_harian'   => safe_get('tanggal_harian'),
			'bulan'            => safe_get('bulan'),
			'tahun'            => safe_get('tahun'),
			'tanggal_awal'     => safe_get('tanggal_awal'),
			'tanggal_akhir'    => safe_get('tanggal_akhir'),
			'jenis_rawat'      => safe_get('jenis_rawat'),
			'jenis_kasus'      => safe_get('jenis_kasus'),
		];

		$limit = 20;
		$start  = ($this->get('page') - 1) * $limit;

		$data = $this->m_laporan_rm->getListDataLaporanRM13($limit, $start, $search);
		$data['page']  = (int) $this->get('page');
		$data['limit'] = $limit;

		if ($data) :
			$this->response($data, REST_Controller::HTTP_OK); // (200)
		else :
			$this->response(array('error' => 'Data is Not Found'), REST_Controller::HTTP_NOT_FOUND);
		endif;
	}

	function get_list_laporan_rm_14_get()
	{
		$search = [
			'tahun_periode'            => safe_get('tahun_periode'),
		];

		$data = $this->m_laporan_rm->getListDataLaporanRM14($search);

		if ($data) :
			$this->response($data, REST_Controller::HTTP_OK); // (200)
		else :
			$this->response(array('error' => 'Data is Not Found'), REST_Controller::HTTP_NOT_FOUND);
		endif;
	}

	function get_list_laporan_rm_15_get()
	{
		if (!$this->get('page')) :
			$this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
		endif;

		$search = [
			'jenis_laporan'    => safe_get('jenis_laporan'),
			'periode_laporan'  => safe_get('periode_laporan'),
			'tanggal_harian'   => safe_get('tanggal_harian'),
			'bulan'            => safe_get('bulan'),
			'tahun'            => safe_get('tahun'),
			'tanggal_awal'     => safe_get('tanggal_awal'),
			'tanggal_akhir'    => safe_get('tanggal_akhir'),
			'asal_kunjungan'   => safe_get('asal_kunjungan'),
		];

		$data          = $this->m_laporan_rm->getListDataLaporanRM15($search);
		$data['page']  = (int) $this->get('page');

		if ($data) :
			$this->response($data, REST_Controller::HTTP_OK); // (200)
		else :
			$this->response(array('error' => 'Data is Not Found'), REST_Controller::HTTP_NOT_FOUND);
		endif;
	}

	function get_list_laporan_rm_16_get()
	{
		if (!$this->get('page')) :
			$this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
		endif;

		$search = [
			'jenis_laporan'    => safe_get('jenis_laporan'),
			'periode_laporan'  => safe_get('periode_laporan'),
			'tanggal_harian'   => safe_get('tanggal_harian'),
			'bulan'            => safe_get('bulan'),
			'tahun'            => safe_get('tahun'),
			'tanggal_awal'     => safe_get('tanggal_awal'),
			'tanggal_akhir'    => safe_get('tanggal_akhir'),
		];

		$data          = $this->m_laporan_rm->getListDataLaporanRM16($search);
		$data['page']  = (int) $this->get('page');

		if ($data) :
			$this->response($data, REST_Controller::HTTP_OK); // (200)
		else :
			$this->response(array('error' => 'Data is Not Found'), REST_Controller::HTTP_NOT_FOUND);
		endif;
	}

	function get_list_laporan_rm_17_get()
	{
		if (!$this->get('page')) :
			$this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
		endif;

		$start  = ($this->get('page') - 1) * $this->limit;
		$search = [
			'jenis_laporan'    => safe_get('jenis_laporan'),
			'periode_laporan'  => safe_get('periode_laporan'),
			'tanggal_harian'   => safe_get('tanggal_harian'),
			'bulan'            => safe_get('bulan'),
			'tahun'            => safe_get('tahun'),
			'tanggal_awal'     => safe_get('tanggal_awal'),
			'tanggal_akhir'    => safe_get('tanggal_akhir'),
			'jenis_rawat'      => safe_get('jenis_rawat'),
			'jenis_kasus'      => safe_get('jenis_kasus'),
			'status_keluar'    => safe_get('status_keluar')
		];

		$data = $this->m_laporan_rm->getListDataLaporanRM17(0, 0, $search);

		if ($data) :
			$this->response($data, REST_Controller::HTTP_OK); // (200)
		else :
			$this->response(array('error' => 'Data is Not Found'), REST_Controller::HTTP_NOT_FOUND);
		endif;
	}

	function get_list_laporan_rm_18_get()
	{
		if (!$this->get('page')) :
			$this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
		endif;

		$start  = ($this->get('page') - 1) * $this->limit;
		$search = [
			'jenis_laporan'    => safe_get('jenis_laporan'),
			'periode_laporan'  => safe_get('periode_laporan'),
			'tanggal_harian'   => safe_get('tanggal_harian'),
			'bulan'            => safe_get('bulan'),
			'tahun'            => safe_get('tahun'),
			'tanggal_awal'     => safe_get('tanggal_awal'),
			'tanggal_akhir'    => safe_get('tanggal_akhir'),
			'jenis_rawat'      => safe_get('jenis_rawat'),
			'jenis_kasus'      => safe_get('jenis_kasus'),
			'status_keluar'    => safe_get('status_keluar')
		];

		$data = $this->m_laporan_rm->getListDataLaporanRM18(0, 0, $search);

		if ($data) :
			$this->response($data, REST_Controller::HTTP_OK); // (200)
		else :
			$this->response(array('error' => 'Data is Not Found'), REST_Controller::HTTP_NOT_FOUND);
		endif;
	}
}
