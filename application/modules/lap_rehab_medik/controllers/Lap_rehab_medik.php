<?php

defined('BASEPATH') or exit('No direct script access allowed');

// require('./application/third_party/phpoffice/vendor/autoload.php');

class Lap_rehab_medik extends SYAM_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('App_model', 'm_default');
        $this->load->model('Masterdata_model', 'm_masterdata');
        $this->load->model('Lap_rehab_medik_model', 'm_laporan');
    }

    public function index()
    {
        $data['active']  = 'Laporan Rehap Medik';
        $data['modules'] = $this->m_default->getDataModules($this->session->userdata('id_account_group'));
        $is_login        = $this->session->userdata('is_login');

        if ($is_login === true) :
            $data['hospital'] = $this->m_default->getDataHospital();
            $this->load->view('layouts/index', $data);

        else :
            redirect('/');

        endif;
    }

    public function page_lap_rehab_medik()
    {
        $data['bulan']              = $this->m_masterdata->getBulan();
        $data['periode_laporan']    = $this->m_laporan->getPeriodeLaporan();

        $this->load->view('index', $data);
    }

    public function export_lap_rehab_medik()
    {
        $search = [
            'periode_laporan'   => safe_get('periode_laporan'),
			'tanggal_harian'    => safe_get('tanggal_harian'),
			'bulan'             => safe_get('bulan'),
			'tahun'             => safe_get('tahun'),
			'tanggal_awal'      => safe_get('tanggal_awal'),
			'tanggal_akhir'     => safe_get('tanggal_akhir'),
			'id_dokter'         => safe_get('id_dokter'),
			'nama_pasien'       => safe_get('nama_pasien')
        ];

        $data['get_date_format']    = $this->m_masterdata->get_date_format();
        $data                       = $this->m_laporan->getListLaporanRehabMedik(0, 0, $search);
        $data['parameter']          = $search;

        $this->load->view('lap_rehab_medik/export.php', $data);
    }
}
