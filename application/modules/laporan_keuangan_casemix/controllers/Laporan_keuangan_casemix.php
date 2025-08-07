<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_keuangan_casemix extends SYAM_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('App_model', 'm_default');
        $this->load->model('Masterdata_model', 'm_masterdata');
        $this->load->model('Laporan_keuangan_casemix_model', 'm_kc');
    }

    public function index()
    {
        $data['active']  = 'Laporan Keuangan Casemix';
        $data['modules'] = $this->m_default->getDataModules($this->session->userdata('id_account_group'));
        $is_login        = $this->session->userdata('is_login');

        if ($is_login === true) :

            $data['hospital'] = $this->m_default->getDataHospital();
            $this->load->view('layouts/index', $data);

        else :

            redirect('/');

        endif;
    }

    public function page_lap_keuangan_casemix()
    {
        $data['jenis_tanggal']    = array('daftar' => 'Tanggal Daftar', 'keluar' => 'Tanggal Keluar');
        $data['jenis_laporan']    = $this->m_kc->getJenisLaporan();	
        $data['periode_laporan']  = $this->m_masterdata->getPeriodeLaporan();
        $data['bulan']            = $this->m_masterdata->getBulan();
        $this->load->view('index', $data);
    }

	function periode($search){
		$periode = '';
        if($search["periode_laporan"] == 'Harian'){
			$periode = 'Harian ('.$search["tanggal_harian"].')' ;
		} else if($search["periode_laporan"] == 'Bulanan'){
			if ($search["bulan"] == '01') {
                $periode = "Bulanan (Januari " . $search["tahun"] . ')';
            } elseif ($search["bulan"] == '02') {
                $periode = "Bulanan (Februari " . $search["tahun"] . ')';
            } elseif ($search["bulan"] == '03') {
                $periode = "Bulanan (Maret " . $search["tahun"] . ')';
            } elseif ($search["bulan"] == '04') {
                $periode = "Bulanan (April " . $search["tahun"] . ')';
            } elseif ($search["bulan"] == '05') {
                $periode = "Bulanan (Mei " . $search["tahun"] . ')';
            } elseif ($search["bulan"] == '06') {
                $periode = "Bulanan (Juni " . $search["tahun"] . ')';
            } elseif ($search["bulan"] == '07') {
                $periode = "Bulanan (Juli " . $search["tahun"] . ')';
            } elseif ($search["bulan"] == '08') {
                $periode = "Bulanan (Agustus " . $search["tahun"] . ')';
            } elseif ($search["bulan"] == '09') {
                $periode = "Bulanan (September " . $search["tahun"] . ')';
            } elseif ($search["bulan"] == '10') {
                $periode = "Bulanan (Oktober " . $search["tahun"] . ')';
            } elseif ($search["bulan"] == '11') {
                $periode = "Bulanan (November " . $search["tahun"] . ')';
            } elseif ($search["bulan"] == '12') {
                $periode = "Bulanan (Desember " . $search["tahun"] . ')';
            }
		} else if($search["periode_laporan"] == 'Rentang Waktu'){
			$periode = 'Rentang Waktu ('.$search["tanggal_awal"].' sd '.$search["tanggal_akhir"].')' ;
		}
		return $periode;
	}

    
	
}
