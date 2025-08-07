<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_laboratorium extends SYAM_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('App_model', 'm_default');
        $this->load->model('Masterdata_model', 'm_masterdata');
        $this->load->model('Laporan_laboratorium_model', 'laboratorium');
    }

    public function index()
    {
        $data['active']  = 'Laporan Laboratorium';
        $data['modules'] = $this->m_default->getDataModules($this->session->userdata('id_account_group'));
        $is_login        = $this->session->userdata('is_login');

        if ($is_login === true) :

            $data['hospital'] = $this->m_default->getDataHospital();
            $this->load->view('layouts/index', $data);

        else :

            redirect('/');

        endif;
    }

    public function page_lap_laboratorium()
    {
        $data['bulan']              = $this->laboratorium->getBulan();
        $data['jenis_laporan']      = $this->laboratorium->list_laporan();
        $data['periode_laporan']    = $this->laboratorium->getPeriodeLaporan();
        $data['jenis_pasien']       = $this->laboratorium->getJenisPasien();
        $data['tempat_layanan']     = $this->laboratorium->getTempatLayanan();
        $this->load->view('index', $data);
    }

    public function fetchRelatedServices() {
        $tempat_layanan = $this->input->post('tempat_layanan');
        $data = array();

        if ($tempat_layanan == 'poli') {
            $data = $this->laboratorium->getPoliklinik();
        } elseif ($tempat_layanan == 'ranap') {
            $data = $this->laboratorium->getBangsalRanap();
        } elseif ($tempat_layanan == 'icu') {
            $data = $this->laboratorium->getBangsalICare();
        }

        echo json_encode($data);
    }


    public function export_laporan_rekap_data()
    {
        $search = [
            'periode_laporan'   => safe_get('periode_laporan'),
            'tanggal_harian'    => safe_get('tanggal_harian'),
            'bulan'             => safe_get('bulan'),
            'tahun'             => safe_get('tahun'),
            'tanggal_awal'      => safe_get('tanggal_awal'),
            'tanggal_akhir'     => safe_get('tanggal_akhir'),
            'penjamin'          => safe_get('penjamin'),
            'tempat_layanan'    => safe_get('tempat_layanan'),
            'jenis_rawat'       => safe_get('jenis_rawat'),
        ];

        $data['get_date_format']    = $this->m_masterdata->get_date_format();
        $data                       = $this->laboratorium->getExportRekapDataHarga($search);
        $data['parameter']          = $search;
        $data['tempat_dilayani']    = $search["tempat_layanan"] !== "" ? $search["tempat_layanan"] : "";
        
        $this->load->view('lap_rekap_data/export.php', $data);
    }


}
