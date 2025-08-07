<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_perencanaan extends SYAM_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('App_model', 'm_default');
        $this->load->model('Masterdata_model', 'm_masterdata');
        $this->load->model('Laporan_perencanaan_model', 'm_prc');
    }

    public function index()
    {
        $data['active']  = 'Laporan Hemodialisa';
        $data['modules'] = $this->m_default->getDataModules($this->session->userdata('id_account_group'));
        $is_login        = $this->session->userdata('is_login');

        if ($is_login === true) :

            $data['hospital'] = $this->m_default->getDataHospital();
            $this->load->view('layouts/index', $data);

        else :

            redirect('/');

        endif;
    }

    public function page_lap_perencanaan()
    {
        $data['jenis_laporan']    = $this->m_prc->getJenisLaporan();
        $data['jenis_jaminan']    = $this->m_prc->getJaminan();
        $data['poliklinik']       = $this->m_prc->getPoliklinik();
        $data['bangsal_ranap']    = $this->m_prc->getBangsalRanap();
        $data['bangsal_icare']    = $this->m_prc->getBangsalICare();
        $data['periode_laporan']  = $this->m_masterdata->getPeriodeLaporan();
        $data['bulan']            = $this->m_masterdata->getBulan();
        $this->load->view('index', $data);
    }

    function export_laporan_01() {

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
	
        $data          = $this->m_prc->getListLaporanPrc01(0,0,$search);
		$this->load->view( 'export/export_laporan_01.php', $data );
	}

    function export_laporan_02() {

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
	
        $data          = $this->m_prc->getListLaporanPrc02(0,0,$search);
		$this->load->view( 'export/export_laporan_02.php', $data );
	}

    function export_laporan_03() {

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
	
        $data          = $this->m_prc->getListLaporanPrc03(0,0,$search);
		$this->load->view( 'export/export_laporan_03.php', $data );
	}

	function export_laporan_04() {

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
	
        $data          = $this->m_prc->getListLaporanPrc04(0,0,$search);
		$this->load->view( 'export/export_laporan_04.php', $data );
	}

	function export_laporan_05() {

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
	
        $data          = $this->m_prc->getListLaporanPrc05(0,0,$search);
		$this->load->view( 'export/export_laporan_05.php', $data );
	}

	function export_laporan_06() {

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
	
        $data          = $this->m_prc->getListLaporanPrc06(0,0,$search);
		$this->load->view( 'export/export_laporan_06.php', $data );
	}

}
