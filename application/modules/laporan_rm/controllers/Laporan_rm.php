<?php
defined('BASEPATH') or exit('No direct script access allowed');

// require('./application/third_party/phpoffice/vendor/autoload.php');

class Laporan_rm extends SYAM_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('App_model', 'm_default');
		$this->load->model('Masterdata_model', 'm_masterdata');
		$this->load->model('Laporan_rm_model', 'm_laporan');
	}

	function index()
	{
		$data['active']  = 'Laporan RM';
		$data['modules'] = $this->m_default->getDataModules($this->session->userdata('id_account_group'));
		$is_login        = $this->session->userdata('is_login');

		if ($is_login === true) :
			$data['hospital'] = $this->m_default->getDataHospital();
			$this->load->view('layouts/index', $data);

		else :
			redirect('/');

		endif;
	}

	function page_laporan_rm()
	{
		$data['jenis_laporan'] = [
			''   => '-- Pilih Laporan Rekam Medis --',
			'1'  => 'Daftar Verifikasi Diagnosis PP',
			'2'  => 'Laporan Masuk Rawat Inap',
			'3'  => 'Laporan Keluar Rawat Inap',
			'4'  => 'Laporan Pasien Masih di Rawat Inap',
			'5'  => 'Laporan W2',
			'6'  => 'Kunjungan Pasien Perjaminan',
			'7'  => 'Kunjungan Pasien Baru dan Lama',
			'8'  => 'Laporan Penunjang',
			'9'  => 'Laporan 10 besar penyakit',
			'10' => 'Kunjungan Pasien Perjaminan (Penunjang)',
			'11' => 'Laporan Status Keluar Pasien',
			'12' => 'Laporan Kunjungan Pasien Rawat Jalan dan IGD',
			'13' => 'SKDR (Sistem Kewaspadaan Dini dan Respon)',
			'14' => 'Laporan Jenis Peserta BPJS',
			'15' => 'Formulir RL 3.5 Rekapitulasi Kunjungan',
			'16' => 'Formulir RL 3.19 Rekapitulasi Cara Bayar',
			'17' => 'Formulir RL 4.1 Kompilasi Penyakit/Morbiditas Pasien Rawat Inap',
			'18' => 'Formulir RL 5.1 Kompilasi Penyakit/Morbiditas Pasien Rawat Jalan',
		];
		asort($data['jenis_laporan']); // Mengurutkan array jenis_laporan berdasarkan nilai
		// No terakhir di 16

		$data['periode_laporan']  = $this->m_masterdata->getPeriodeLaporan();
		$data['bulan']            = $this->m_masterdata->getBulan();
		$data['jenis_rawat']      = $this->m_masterdata->getJenisLayananLaporan();
		$data['tempat_layanan_1'] = $this->m_masterdata->getTempatLayananRajal();
		$data['tempat_layanan_2'] = $this->m_masterdata->getTempatLayananInap();
		$data['tempat_layanan_3'] = [
			''                 => 'Semua',
			'Patologi Anatomi' => 'Patologi Anatomi',
			'Patologi Klinik'  => 'Patologi Klinik',
			'Mikrobiologi'     => 'Mikrobiologi',
			'Hemodialisa'      => 'Hemodialisa',
			'Radiologi'        => 'Radiologi'
		];
		$data['asal_kunjungan'] = [
			'' => 'Semua',
			'1' => 'Poliklinik',
			'2' => 'IGD',
		];
		$data['asal_kunjungan_11'] = [
			'' 			=> 'Semua',
			'jalan' => 'Poliklinik',
			'igd' 	=> 'IGD',
			'ranap' => 'Rawat Inap',
			'icare' => 'Intensive Care',
		];
		$data['asal_poli'] = $this->m_laporan->getPoliklinik();

		$data['status_keluar']    = $this->m_laporan->getStatusKeluar();
		$data['penjamin']         = $this->m_masterdata->getPenjaminLaporan();
		$data['kunjungan']        = $this->m_masterdata->getStatusKunjungan();
		$data['unit_kasir']       = $this->m_masterdata->getUnitKasir();
		$data['kelas_rawat']       = $this->m_masterdata->getKelasRawat();

		$this->load->view('index', $data);
	}

	function export_laporan_01()
	{
		$this->load->model('Laporan_rm_model', 'm_laporan_rm');
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

		$data['get_date_format'] = $this->m_masterdata->get_date_format();
		$data                    = $this->m_laporan_rm->getListDataLaporanRM01(0, 0, $search);
		$data['parameter']       = $search;

		$this->load->view('export/export_laporan_01.php', $data);
	}

	function export_laporan_02()
	{
		$this->load->model('Laporan_rm_model', 'm_laporan_rm');
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
			'asal_kunjungan'   => safe_get('asal_kunjungan'),
			'kelas_rawat'   => safe_get('kelas_rawat'),
		];

		$data['get_date_format'] = $this->m_masterdata->get_date_format();
		$data                    = $this->m_laporan_rm->getListDataLaporanRM02(0, 0, $search);
		$data['parameter']       = $search;

		$this->load->view('export/export_laporan_02.php', $data);
	}

	function export_laporan_03()
	{
		$this->load->model('Laporan_rm_model', 'm_laporan_rm');
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

		$data['get_date_format'] = $this->m_masterdata->get_date_format();
		$data                    = $this->m_laporan_rm->getListDataLaporanRM03(0, 0, $search);
		$data['parameter']       = $search;

		$this->load->view('export/export_laporan_03.php', $data);
	}

	function export_laporan_04()
	{
		$this->load->model('Laporan_rm_model', 'm_laporan_rm');
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

		$data['get_date_format'] = $this->m_masterdata->get_date_format();
		$data                    = $this->m_laporan_rm->getListDataLaporanRM04(0, 0, $search);
		$data['parameter']       = $search;

		$this->load->view('export/export_laporan_04.php', $data);
	}

	function export_laporan_05()
	{
		$this->load->model('Laporan_rm_model', 'm_laporan_rm');
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
			'tab_active'       => safe_get('tab_active')
		];

		$data['get_date_format'] = $this->m_masterdata->get_date_format();
		if ($search['tab_active'] === 'laporan-wabah') {
			$data = $this->m_laporan_rm->getListWabah($search);
		} else {
			$data = $this->m_laporan_rm->getListDataLaporanRM05(0, 0, $search);
		}
		$data['parameter'] = $search;

		$this->load->view('export/export_laporan_05.php', $data);
	}

	function export_laporan_06()
	{
		$this->load->model('Laporan_rm_model', 'm_laporan_rm');
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
			'tempat_layanan_3' => safe_get('tempat_layanan_3'),
			'penjamin'         => safe_get('penjamin'),
			'kunjungan'        => safe_get('kunjungan'),
			'tab_active'       => safe_get('tab_active')
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

		$data['get_date_format'] = $this->m_masterdata->get_date_format();
		if ($search['tab_active'] === 'unit-pelayanan') {
			$data['per_unit_pelayanan'] = $this->m_laporan_rm->getListDataLaporanPerUnitPelayananRM06($search);
		} elseif ($search['tab_active'] === 'per-wilayah') {
			$data['per_wilayah'] = $this->m_laporan_rm->getListDataLaporanPerWilayahRM06(0, 0, $search);
		} else {
			$data['per_dokter'] = $this->m_laporan_rm->getListDataDokterLaporan06(0, 0, $search);
		}
		$data['parameter'] = $search;
		$data['periode']   = $periode;

		$this->load->view('export/export_laporan_06.php', $data);
	}

	function export_laporan_07()
	{
		$this->load->model('Laporan_rm_model', 'm_laporan_rm');
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
			'tab_active'       => safe_get('tab_active')
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

		$data['get_date_format'] = $this->m_masterdata->get_date_format();
		if ($search['tab_active'] === 'spesialistik') {
			$data['spesialisasi'] = $this->m_laporan_rm->getListDataLaporanPerSpesialisasiRM07(0, 0, $search);
		} else {
			$data['dokter'] = $this->m_laporan_rm->getListDataLaporanPerDokterRM07(0, 0, $search);
		}
		$data['parameter'] = $search;
		$data['periode']   = $periode;

		$this->load->view('export/export_laporan_07.php', $data);
	}

	function export_laporan_08()
	{
		$this->load->model('Laporan_rm_model', 'm_laporan_rm');
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
				$data['radiologi'] = $this->m_laporan_rm->getListDataLaporanRadiologi(0, 0, $search);
				break;
			case '2':
				$data['farmasi'] = $this->m_laporan_rm->getListDataLaporanFarmasi(0, 0, $search);
				break;
			case '3':
				$data['laboratorium'] = $this->m_laporan_rm->getListDataLaporanLaboratorium(0, 0, $search);
				break;
			case '4':
				$data['rehab'] = $this->m_laporan_rm->getListDataLaporanRehabMedik(0, 0, $search);
				break;
		}

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
		$data['parameter'] = $search;
		$data['periode']   = $periode;

		$this->load->view('export/export_laporan_08.php', $data);
	}

	function export_laporan_10()
	{
		$this->load->model('Laporan_rm_model', 'm_laporan_rm');
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

		$data['get_date_format'] = $this->m_masterdata->get_date_format();
		$data = $this->m_laporan_rm->getListDataLaporanRM10(0, 0, $search);

		$data['parameter'] = $search;
		$data['periode']   = $periode;

		$this->load->view('export/export_laporan_10.php', $data);
	}

	function export_laporan_11()
	{
		$this->load->model('Laporan_rm_model', 'm_laporan_rm');
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

		$data['get_date_format'] 	= $this->m_masterdata->get_date_format();
		$data          				= $this->m_laporan_rm->getListDataLaporanRM11(0, 0, $search);
		$data['parameter']       	= $search;

		// var_dump($data['parameter']); die;

		$this->load->view('export/export_laporan_11.php', $data);
	}

	function export_laporan_12()
	{
		$this->load->model('Laporan_rm_model', 'm_laporan_rm');
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

		$data['get_date_format'] 	= $this->m_masterdata->get_date_format();
		$data          						= $this->m_laporan_rm->getListDataLaporanRM12(0, 0, $search);
		$data['parameter']       	= $search;

		// var_dump($data['parameter']); die;

		$this->load->view('export/export_laporan_12.php', $data);
	}

	function export_laporan_13()
	{
		$this->load->model('Laporan_rm_model', 'm_laporan_rm');
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

		$data['get_date_format'] 	= $this->m_masterdata->get_date_format();
		$data          				= $this->m_laporan_rm->getListDataLaporanRM13(0, 0, $search);
		$data['parameter']       	= $search;

		$this->load->view('export/export_laporan_13.php', $data);
	}

	function export_laporan_14()
	{
		$this->load->model('Laporan_rm_model', 'm_laporan_rm');
		$search = [
			'tahun_periode'            => safe_get('tahun_periode'),
		];

		$data          				= $this->m_laporan_rm->getListDataLaporanRM14($search);
		$data['periode']    	= $search['tahun_periode'];

		$this->load->view('export/export_laporan_14.php', $data);
	}

	function export_laporan_15()
	{
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

		$data['get_date_format'] = $this->m_masterdata->get_date_format();
		$data         			 = $this->m_laporan->getListDataLaporanRM15($search);
		$data['parameter']       = $search;

		$this->load->view('export/export_laporan_15.php', $data);
	}

	function export_laporan_16()
	{
		$search = [
			'jenis_laporan'    => safe_get('jenis_laporan'),
			'periode_laporan'  => safe_get('periode_laporan'),
			'tanggal_harian'   => safe_get('tanggal_harian'),
			'bulan'            => safe_get('bulan'),
			'tahun'            => safe_get('tahun'),
			'tanggal_awal'     => safe_get('tanggal_awal'),
			'tanggal_akhir'    => safe_get('tanggal_akhir'),
		];

		$data['get_date_format'] = $this->m_masterdata->get_date_format();
		$data         			 = $this->m_laporan->getListDataLaporanRM16($search);
		$data['parameter']       = $search;

		$this->load->view('export/export_laporan_16.php', $data);
	}

	function export_laporan_17()
	{
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

		$data = $this->m_laporan->getListDataLaporanRM17(0, 0, $search);
		$data['parameter']       = $search;

		$this->load->view('export/export_laporan_17.php', $data);
	}

	function export_laporan_18()
	{
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

		$data = $this->m_laporan->getListDataLaporanRM18(0, 0, $search);
		$data['parameter']       = $search;

		$this->load->view('export/export_laporan_18.php', $data);
	}
}
