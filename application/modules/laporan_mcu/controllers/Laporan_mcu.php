<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_mcu extends SYAM_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('App_model', 'm_default');
        $this->load->model('Masterdata_model', 'm_masterdata');
        $this->load->model('Laporan_mcu_model', 'm_mcu');
    }

    public function index()
    {
        $data['active']  = 'Laporan Medical Check Up';
        $data['modules'] = $this->m_default->getDataModules($this->session->userdata('id_account_group'));
        $is_login        = $this->session->userdata('is_login');

        if ($is_login === true) :

            $data['hospital'] = $this->m_default->getDataHospital();
            $this->load->view('layouts/index', $data);

        else :

            redirect('/');

        endif;
    }

    public function page_lap_mcu()
    {
        $data['jenis_laporan']    = $this->m_mcu->getJenisLaporan();
        $data['jenis_jaminan']    = $this->m_mcu->getJaminan();
        $data['poliklinik']       = $this->m_mcu->getPoliklinik();
        $data['periode_laporan']  = $this->m_masterdata->getPeriodeLaporan();
        $data['bulan']            = $this->m_masterdata->getBulan();
        $data['jenis_rawat']      = $this->m_masterdata->getJenisLayananLaporan();
        $this->load->view('index', $data);
    }
    
    function export_laporan_01()
    {
		$search = [
			'jenis_laporan'   => safe_get('jenis_laporan'),
			'periode_laporan' => safe_get('periode_laporan'),
			'tanggal_harian'  => safe_get('tanggal_harian'),
			'bulan'           => safe_get('bulan'),
			'tahun'           => safe_get('tahun'),
			'tanggal_awal'    => safe_get('tanggal_awal'),
			'tanggal_akhir'   => safe_get('tanggal_akhir'),
			'jenis_jaminan'   => safe_get('jenis_jaminan'),
			'dokter_mcu'  	  => safe_get('dokter_mcu'),
			'poliklinik'  	  => safe_get('poliklinik'),
		];			
		$data['data']  = $this->m_mcu->getListLaporanMcu01(0,0,$search);

		$this->load->view( 'export/export_laporan_01.php', $data );
	}

    function export_laporan_02()
    {
		$search = [
			'jenis_laporan'   => safe_get('jenis_laporan'),
			'periode_laporan' => safe_get('periode_laporan'),
			'tanggal_harian'  => safe_get('tanggal_harian'),
			'bulan'           => safe_get('bulan'),
			'tahun'           => safe_get('tahun'),
			'tanggal_awal'    => safe_get('tanggal_awal'),
			'tanggal_akhir'   => safe_get('tanggal_akhir'),
			'jenis_jaminan'   => safe_get('jenis_jaminan'),
			'dokter_mcu'  	  => safe_get('dokter_mcu'),
		];			
		$data['data']  = $this->m_mcu->getListLaporanMcu02(0,0,$search);

		$this->load->view( 'export/export_laporan_02.php', $data );
	}

    function export_laporan_03()
    {
		$search = [
			'jenis_laporan'   => safe_get('jenis_laporan'),
			'periode_laporan' => safe_get('periode_laporan'),
			'tanggal_harian'  => safe_get('tanggal_harian'),
			'bulan'           => safe_get('bulan'),
			'tahun'           => safe_get('tahun'),
			'tanggal_awal'    => safe_get('tanggal_awal'),
			'tanggal_akhir'   => safe_get('tanggal_akhir'),
			'jenis_jaminan'   => safe_get('jenis_jaminan'),
			'dokter_mcu'  	  => safe_get('dokter_mcu'),
		];			
		$data['data']  = $this->m_mcu->getListLaporanMcu03(0,0,$search);

		$this->load->view( 'export/export_laporan_03.php', $data );
	}

    function export_laporan_04()
    {
		$search = [
			'jenis_laporan'   => safe_get('jenis_laporan'),
			'periode_laporan' => safe_get('periode_laporan'),
			'tanggal_harian'  => safe_get('tanggal_harian'),
			'bulan'           => safe_get('bulan'),
			'tahun'           => safe_get('tahun'),
			'tanggal_awal'    => safe_get('tanggal_awal'),
			'tanggal_akhir'   => safe_get('tanggal_akhir'),
			'jenis_jaminan'   => safe_get('jenis_jaminan'),
			'dokter_mcu'  	  => safe_get('dokter_mcu'),
		];			
		$data['data']  = $this->m_mcu->getListLaporanMcu04(0,0,$search);

		$this->load->view( 'export/export_laporan_04.php', $data );
	}

}
