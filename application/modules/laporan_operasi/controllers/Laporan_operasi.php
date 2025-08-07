<?php

defined('BASEPATH') or exit('No direct script access allowed');

// require('./application/third_party/phpoffice/vendor/autoload.php');

class Laporan_operasi extends SYAM_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('App_model', 'm_default');
        $this->load->model('Masterdata_model', 'm_masterdata');
        $this->load->model('Laporan_operasi_model', 'm_laporan');
    }

    public function index()
    {
        $data['active']  = 'Laporan Bedah Central';
        $data['modules'] = $this->m_default->getDataModules($this->session->userdata('id_account_group'));
        $is_login        = $this->session->userdata('is_login');

        if ($is_login === true) :
            $data['hospital'] = $this->m_default->getDataHospital();
            $this->load->view('layouts/index', $data);

        else :
            redirect('/');

        endif;
    }

    public function page_laporan_operasi()
    {
        $data['jenis_laporan']      = $this->m_laporan->list_laporan();
        $data['periode_laporan']    = $this->m_laporan->getPeriodeLaporan();
        // $data['golongan']           = $this->m_laporan->getGolongan();
        // $data['jenis']              = $this->m_laporan->getJenis();
        // $data['kategori']           = $this->m_laporan->getKategori();
        // $data['fornas']             = $this->m_laporan->getFornas();
        // $data['generik']            = $this->m_laporan->getGenerik();
        // $data['unit']               = $this->m_laporan->getUnitDepo();
        // $data['unit_all']           = $this->m_laporan->getUnitDepoAll();
        // $data['jenis_pasien']       = $this->m_laporan->getJenisPasien();
        // $data['jaminan']            = $this->m_laporan->getJaminan();
        $data['bulan']              = $this->m_masterdata->getBulan();

        $this->load->view('index', $data);
    }

    public function export_laporan_01()
    {
        $this->load->library('pdf');

        $search = [
            'periode_laporan' => safe_get('periode_laporan'),
            'tanggal_harian'  => safe_get('tanggal_harian'),
            'bulan'           => safe_get('bulan'),
            'tahun'           => safe_get('tahun'),
            'tanggal_awal'      => safe_get('tanggal_awal'),
            'tanggal_awal'      => safe_get('tanggal_awal'),
            'spesialisasi'       => safe_get('unit')
        ];

        $data['get_date_format']    = $this->m_masterdata->get_date_format();
        $data                       = $this->m_laporan->getListDataLaporanBSI(0, 0, $search);
        $data['parameter']          = $search;

        $this->load->view('lap_bulanan_ibs/export.php', $data);
    }

    public function export_laporan_02()
    {
        $this->load->library('pdf');

        $search = [
            'periode_laporan' => safe_get('periode_laporan'),
            'tanggal_harian'  => safe_get('tanggal_harian'),
            'bulan'           => safe_get('bulan'),
            'tahun'           => safe_get('tahun'),
            'tanggal_awal'      => safe_get('tanggal_awal'),
            'tanggal_awal'      => safe_get('tanggal_awal'),
            'spesialisasi'       => safe_get('unit')
        ];

        $data['get_date_format']    = $this->m_masterdata->get_date_format();
        $data                       = $this->m_laporan->getLaporanKegiatanPembedahan(0, 0, $search);

        ob_start();
        $this->load->view('lap_kegiatan_pembedahan/export.php', $data);
        
        $html = ob_get_clean();
        ob_clean();

        // Set opsi PDF
        $font = base_url() . 'vendor/dompdf/dompdf/fonts/verdana.ttf';  // Ganti dengan path font yang Anda ingin gunakan
        $this->pdf->set_option('isHtml5ParserEnabled', true);
        $this->pdf->set_option('isRemoteEnabled', true);
        $this->pdf->set_option('defaultMediaType', 'all');
        $this->pdf->set_option('isFontSubsettingEnabled', true);
        $this->pdf->set_option('isPhpEnabled', true); // Aktifkan PHP di dalam HTML
        $this->pdf->set_option('fontPath', $font);
        $this->pdf->set_option('fontFamily', 'Verdana');
        $this->pdf->set_option('debugPng', true);
        $this->pdf->set_option('debugKeepTemp', true);

        // Muat konten HTML
        $this->pdf->loadHTML($html);

        // Render PDF
        $this->pdf->render();

        // Nama file PDF
        $file_name = 'Laporan Kegiatan Pembedahan - ' . $data['periode'] . '.pdf';

        // Stream PDF ke browser
        $this->pdf->stream($file_name, ["Attachment" => false]);
    }

    public function export_laporan_03()
    {
        $this->load->library('pdf');

        $search = [
            'periode_laporan'   => safe_get('periode_laporan'),
            'tanggal_harian'    => safe_get('tanggal_harian'),
            'bulan'             => safe_get('bulan'),
            'tahun'             => safe_get('tahun'),
            'tanggal_awal'      => safe_get('tanggal_awal'),
            'tanggal_awal'      => safe_get('tanggal_awal'),
            'id_dokter'         => safe_get('id_dokter')
        ];

        $data['get_date_format']    = $this->m_masterdata->get_date_format();
        $data                       = $this->m_laporan->getLaporanAnastesiOK(0, 0, $search);

        ob_start();
        $this->load->view('lap_anastesi_ok/export.php', $data);
        
        $html = ob_get_clean();
        ob_clean();

        // Set opsi PDF
        $font = base_url() . 'vendor/dompdf/dompdf/fonts/verdana.ttf';  // Ganti dengan path font yang Anda ingin gunakan
        $this->pdf->set_option('isHtml5ParserEnabled', true);
        $this->pdf->set_option('isRemoteEnabled', true);
        $this->pdf->set_option('defaultMediaType', 'all');
        $this->pdf->set_option('isFontSubsettingEnabled', true);
        $this->pdf->set_option('isPhpEnabled', true); // Aktifkan PHP di dalam HTML
        $this->pdf->set_option('fontPath', $font);
        $this->pdf->set_option('fontFamily', 'Verdana');
        $this->pdf->set_option('debugPng', true);
        $this->pdf->set_option('debugKeepTemp', true);

        // Muat konten HTML
        $this->pdf->loadHTML($html);

        // Render PDF
        $this->pdf->render();

        // Nama file PDF
        $file_name = 'Laporan Anastesi Dikamar Operasi - ' . $data['periode'] . '.pdf';

        // Stream PDF ke browser
        $this->pdf->stream($file_name, ["Attachment" => false]);
    }

    public function export_laporan_04()
    {
        $this->load->library('pdf');

        $search = [
            'periode_laporan'   => safe_get('periode_laporan'),
            'tanggal_harian'    => safe_get('tanggal_harian'),
            'bulan'             => safe_get('bulan'),
            'tahun'             => safe_get('tahun'),
            'tanggal_awal'      => safe_get('tanggal_awal'),
            'tanggal_awal'      => safe_get('tanggal_awal'),
            'id_dokter'         => safe_get('id_dokter'),
            'spesialisasi'      => safe_get('spesialisasi')
        ];

        $data['get_date_format']    = $this->m_masterdata->get_date_format();
        $data                       = $this->m_laporan->getLaporanRekapOperasi(0, 0, $search);

        ob_start();
        $this->load->view('lap_rekap_operasi/export.php', $data);
        
        $html = ob_get_clean();
        ob_clean();

        // Set opsi PDF
        $font = base_url() . 'vendor/dompdf/dompdf/fonts/verdana.ttf';  // Ganti dengan path font yang Anda ingin gunakan
        $this->pdf->set_option('isHtml5ParserEnabled', true);
        $this->pdf->set_option('isRemoteEnabled', true);
        $this->pdf->set_option('defaultMediaType', 'all');
        $this->pdf->set_option('isFontSubsettingEnabled', true);
        $this->pdf->set_option('isPhpEnabled', true); // Aktifkan PHP di dalam HTML
        $this->pdf->set_option('fontPath', $font);
        $this->pdf->set_option('fontFamily', 'Verdana');
        $this->pdf->set_option('debugPng', true);
        $this->pdf->set_option('debugKeepTemp', true);

        // Muat konten HTML
        $this->pdf->loadHTML($html);

        // Render PDF
        $this->pdf->render();

        // Nama file PDF
        $file_name = 'REKAPITULASI OPERASI PASIEN DOKTER SPESIALIS - ' . $data['periode'] . '.pdf';

        // Stream PDF ke browser
        $this->pdf->stream($file_name, ["Attachment" => false]);
    }

}
