<?php

defined('BASEPATH') or exit('No direct script access allowed');

// require('./application/third_party/phpoffice/vendor/autoload.php');

class Lap_kasir extends SYAM_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('App_model', 'm_default');
        $this->load->model('Masterdata_model', 'm_masterdata');
        $this->load->model('Lap_kasir_model', 'm_laporan');
        // $this->load->model('Keuangan_model', 'm_keuangan');
    }

    public function index()
    {
        $data['active']  = 'Laporan Kasir';
        $data['modules'] = $this->m_default->getDataModules($this->session->userdata('id_account_group'));
        $is_login        = $this->session->userdata('is_login');

        if ($is_login === true) :
            $data['hospital'] = $this->m_default->getDataHospital();
            $this->load->view('layouts/index', $data);

        else :
            redirect('/');

        endif;
    }

    public function page_lap_kasir()
    {
        $data['bulan']              = $this->m_masterdata->getBulan();
        $data['periode_laporan']    = $this->m_laporan->getPeriodeLaporan();
        $data['jenis_pasien']       = $this->m_laporan->getJenisPasien();
        $data['cara_bayar']         = $this->m_masterdata->getCaraBayar(true);
        $data['jenis_tunai']        = [
            ''      => 'Pilih metode pembayaran',
            '4'     => 'CASH',
            '9'     => 'QRIS',
            '10'    => 'TRANSFER BANK'
        ];
        $data['jenis_laporan']      = [
            ''  => '-- Pilih Laporan Kasir --',
            '1' => 'Laporan Kasir',
            '3' => 'Laporan Kasir (REKAPITULASI)',
            '2' => 'Laporan Tarif Berdasarkan Diagnosa',
        ];
        $data['bangsal_filter'] = ['' => 'Semua Ruangan'] + array_column($this->db->select('id,nama')->from('sm_bangsal')->get()->result(), 'nama', 'id');
        $data['kelas'] = $this->m_masterdata->getKelasRawat();
        // $data['unit']               = $this->m_laporan->getUnitDepo();
        // $data['unit_all']           = $this->m_laporan->getUnitDepoAll();
        $this->load->view('index', $data);
    }

    public function export_lap_01()
    {
        $search = [
            'periode_laporan'   => safe_get('periode_laporan'),
            'tanggal_harian'    => safe_get('tanggal_harian'),
            'bulan'             => safe_get('bulan'),
            'tahun'             => safe_get('tahun'),
            'tanggal_awal'      => safe_get('tanggal_awal'),
            'tanggal_akhir'     => safe_get('tanggal_akhir'),
            'id_dokter'         => safe_get('id_dokter'),
            'nama_pasien'       => safe_get('nama_pasien'),
            'jenis_pasien'      => safe_get('jenis_pasien'),
            // 'unit_depo'		=> safe_get('unit_depo'),
            'cara_bayar'        => safe_get('cara_bayar'),
            'penjamin'          => safe_get('penjamin'),
			'jenis_tunai'		=> safe_get('jenis_tunai'),
            'ruangan_rajal'     => safe_get('ruangan_rajal'),
            'ruangan_ranap'     => safe_get('ruangan_ranap'),
			'shift_poli'		=> safe_get('shift_poli'),
        ];

        $data['get_date_format']    = $this->m_masterdata->get_date_format();
        $data                       = $this->m_laporan->getLap01(0, 0, $search);
        $data['parameter']          = $search;

        // var_dump($data);die;

        $this->load->view('lap_kasir/export/export-lap-01.php', $data);
    }

    public function export_lap_02()
    {
        $search = [
            'periode_laporan'   => safe_get('periode_laporan'),
            'tanggal_harian'    => safe_get('tanggal_harian'),
            'bulan'             => safe_get('bulan'),
            'tahun'             => safe_get('tahun'),
            'tanggal_awal'      => safe_get('tanggal_awal'),
            'tanggal_akhir'     => safe_get('tanggal_akhir'),
            'id_dokter'         => safe_get('id_dokter'),
            'nama_pasien'       => safe_get('nama_pasien'),
            'jenis_pasien'      => safe_get('jenis_pasien'),
			'bangsal_search'	=> safe_get('bangsal_search'),
			'kelas_rawat'		=> safe_get('kelas_rawat'),
			'diagnosa_awal'		=> safe_get('diagnosa_awal'),
			'diagnosa_akhir'	=> safe_get('diagnosa_akhir'),
        ];

        $data['get_date_format']    = $this->m_masterdata->get_date_format();
        $data                       = $this->m_laporan->getLap02(0, 0, $search);
        $data['parameter']          = $search;

        // var_dump($data);die;

        $this->load->view('lap_kasir/export/export-lap-02.php', $data);
    }

    public function export_lap_03()
    {
        set_time_limit(600);
        ini_set('memory_limit', '1024M');
        $search = [
            'periode_laporan'   => safe_get('periode_laporan'),
            'tanggal_harian'    => safe_get('tanggal_harian'),
            'bulan'             => safe_get('bulan'),
            'tahun'             => safe_get('tahun'),
            'tanggal_awal'      => safe_get('tanggal_awal'),
            'tanggal_akhir'     => safe_get('tanggal_akhir'),
            'id_dokter'         => safe_get('id_dokter'),
            'nama_pasien'       => safe_get('nama_pasien'),
            'jenis_pasien'          => safe_get('jenis_pasien'),
            // 'unit_depo'		  	=> safe_get('unit_depo'),
            'cara_bayar'        => safe_get('cara_bayar'),
            'penjamin'            => safe_get('penjamin'),
            'jenis_tunai'                => safe_get('jenis_tunai'),
            'ruangan_rajal'            => safe_get('ruangan_rajal'),
            'ruangan_ranap'            => safe_get('ruangan_ranap'),
        ];

        $data['get_date_format']    = $this->m_masterdata->get_date_format();
        $data                       = $this->m_laporan->getLap03(0, 0, $search);
        $data['parameter']          = $search;

        // var_dump($data);die;

        $this->load->view('lap_kasir/export/export-lap-03.php', $data);
    }
}
