<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_layanan_per_pasien extends SYAM_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('App_model', 'm_default');
		$this->load->model('Masterdata_model', 'm_masterdata');
		$this->load->model('Laporan_layanan_per_pasien_model', 'm_laporan');
	}

	public function index()
	{
		$data['active']  = 'Laporan Layanan Per Pasien';
		$data['modules'] = $this->m_default->getDataModules($this->session->userdata('id_account_group'));
		$is_login        = $this->session->userdata('is_login');

		if ($is_login === true) :
			$data['hospital'] = $this->m_default->getDataHospital();
			$this->load->view('layouts/index', $data);

		else :
			redirect('/');

		endif;
	}

	public function page_laporan_layanan_per_pasien()
	{
		$data['jenis_rawat']      = $this->m_masterdata->getJenisLayananLaporan();
		$data['bulan']            = $this->m_masterdata->getBulan();
		$data['tempat_layanan_1'] = $this->m_masterdata->getTempatLayananRajal();
		$data['tempat_layanan_2'] = $this->m_masterdata->getTempatLayananInap();
		$data['tempat_layanan_2']['OK'] = 'Kamar Operasi';
		$data['tempat_layanan_3'] = [
			''                 => 'Semua',
			'Patologi Anatomi' => 'Patologi Anatomi',
			'Patologi Klinik'  => 'Patologi Klinik',
			'Mikrobiologi'     => 'Mikrobiologi',
			'Hemodialisa'      => 'Hemodialisa',
			'Radiologi'        => 'Radiologi'
		];
		$this->load->view('index', $data);
	}

	public function export_laporan_layanan_per_pasien()
	{
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

		$data['get_date_format']    = $this->m_masterdata->get_date_format();
		$data                       = $this->m_laporan->getListLaporanLayananPerPasien(0, 0, $search);
		$data['parameter']          = $search;

		$this->load->view('export.php', $data);
	}
}
