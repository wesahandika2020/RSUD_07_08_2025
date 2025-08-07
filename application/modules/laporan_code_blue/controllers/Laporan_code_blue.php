<?php

defined('BASEPATH') or exit('No direct script access allowed');

// require('./application/third_party/phpoffice/vendor/autoload.php');

class Laporan_code_blue extends SYAM_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('App_model', 'm_default');
        $this->load->model('Masterdata_model', 'm_masterdata');
        $this->load->model('Laporan_code_blue_model', 'm_laporan');
        // $this->load->model('Keuangan_model', 'm_keuangan');
    }

    public function index()
    {
        $data['active']  = 'Laporan Code Blue';
        $data['modules'] = $this->m_default->getDataModules($this->session->userdata('id_account_group'));
        $is_login        = $this->session->userdata('is_login');

        if ($is_login === true) :
            $data['hospital'] = $this->m_default->getDataHospital();
            $this->load->view('layouts/index', $data);

        else :
            redirect('/');

        endif;
    }

    public function page_laporan_code_blue()
    {
        $data['bulan']              = $this->m_masterdata->getBulan();
        $data['periode_laporan']    = $this->m_laporan->getPeriodeLaporan();
        $data['jenis_pasien']       = $this->m_laporan->getJenisPasien();
        $this->load->view('index', $data);
    }

    public function export_laporan_code_blue()
    {
        $search = [
            'periode_laporan'   => safe_get('periode_laporan'),
            'tanggal_harian'    => safe_get('tanggal_harian'),
            'bulan'             => safe_get('bulan'),
            'tahun'             => safe_get('tahun'),
            'tanggal_awal'      => safe_get('tanggal_awal'),
            'tanggal_akhir'     => safe_get('tanggal_akhir'),
            'nama_pasien'       => safe_get('nama_pasien'),
            'ruangan_ranap'     => safe_get('ruangan_ranap'),
            // 'jenis_pasien'	  	=> safe_get('jenis_pasien'),
            // 'id_dokter'         => safe_get('id_dokter'),
            // 'cara_bayar'				=> safe_get('cara_bayar'),
            // 'penjamin'					=> safe_get('penjamin'),
            // 'ruangan_rajal'			=> safe_get('ruangan_rajal'),
        ];

        $data['get_date_format']    = $this->m_masterdata->get_date_format();
        $data                       = $this->m_laporan->getListLaporanCodeBlue(0, 0, $search);
        $data['parameter']          = $search;

        // var_dump($data);die;

        $this->load->view('laporan_code_blue/export.php', $data);
    }
}
