<?php

defined('BASEPATH') or exit('No direct script access allowed');

// require('./application/third_party/phpoffice/vendor/autoload.php');

class Laporan_inventori_logistik extends SYAM_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('App_model', 'm_default');
        $this->load->model('Masterdata_model', 'm_masterdata');
        $this->load->model('Laporan_inventori_logistik_model', 'laporan');
    }

    public function index()
    {
        $data['active']  = 'Laporan Inventori Logistik';
        $data['modules'] = $this->m_default->getDataModules($this->session->userdata('id_account_group'));
        $is_login        = $this->session->userdata('is_login');

        if ($is_login === true) :
            $data['hospital'] = $this->m_default->getDataHospital();
            $this->load->view('layouts/index', $data);

        else :
            redirect('/');

        endif;
    }

    public function page_laporan_inventori_logistik()
    {
        $data['jenis_laporan']      = $this->laporan->list_laporan();
        $data['periode_laporan']    = $this->laporan->getPeriodeLaporan();
        $data['kategori']           = $this->laporan->getKategori();
        $data['unit']               = $this->laporan->getUnitDepo();
        $data['unit_all']           = $this->laporan->getUnitDepoAll();
        $data['bulan']              = $this->m_masterdata->getBulan();
        $data['pembayaran']         = $this->laporan->getPembayaranBarang();

        $this->load->view('index', $data);
    }

    public function export_mutasi()
    {
        $search = [
            'periode_laporan'   => safe_get('periode_laporan'),
            'tanggal_harian'    => safe_get('tanggal_harian'),
            'bulan'             => safe_get('bulan'),
            'tahun'             => safe_get('tahun'),
            'tanggal_awal'      => safe_get('tanggal_awal'),
            'tanggal_akhir'     => safe_get('tanggal_akhir'),
            'unit'              => safe_get('unit'),
            'kategori'          => safe_get('kategori'),
			'pembayaran'		=> safe_get('pembayaran'),
        ];

        if ($search['unit'] !== '') {
            $unit = $this->db->where('id', $search['unit'], true)->select('nama')->get('sm_unit')->row()->nama;
        } else {
            $unit = "";
        }
        if ($search['kategori'] !== '') {
            $kategori = $this->db->where('id', $search['kategori'], true)->select('nama')->get('sm_kategori_barang')->row()->nama;
        } else {
            $kategori = "";
        }
        
        $data['get_date_format']    = $this->m_masterdata->get_date_format();
        $data                       = $this->laporan->getListDataMutasiLogistik(0, 0, $search);
        $data['parameter']          = $search;
        $data['unit']               = $unit;
        $data['kategori']           = $kategori;
        
        $this->load->view('lap_mutasi_logistik/export.php', $data);
    }

    public function export_pengeluaran()
    {
        $search = [
            'periode_laporan'   => safe_get('periode_laporan'),
            'tanggal_harian'    => safe_get('tanggal_harian'),
            'bulan'             => safe_get('bulan'),
            'tahun'             => safe_get('tahun'),
            'tanggal_awal'      => safe_get('tanggal_awal'),
            'tanggal_akhir'     => safe_get('tanggal_akhir'),
            'unit_depo'         => safe_get('unit_pengeluaran'),
            'barang_search'     => safe_get('barang_search_pengeluaran'),
			'pembayaran'		=> safe_get('pembayaran_pengeluaran')
        ];

        if ($search['unit_depo'] !== '') {
            $unit = $this->db->where('id', $search['unit_depo'], true)->select('nama')->get('sm_unit')->row()->nama;
        } else {
            $unit = "";
        }

        $data['get_date_format'] = $this->m_masterdata->get_date_format();
        $data                    = $this->laporan->getListLaporanPengeluaran(0, 0, $search);
        $data['parameter']       = $search;
        $data['unit']            = $unit;

        $this->load->view('lap_pengeluaran_logistik/export.php', $data);
    }

    public function export_pembelian()
    {
        $search = [
            'periode_laporan'   => safe_get('periode_laporan'),
            'tanggal_harian'    => safe_get('tanggal_harian'),
            'bulan'             => safe_get('bulan'),
            'tahun'             => safe_get('tahun'),
            'tanggal_awal'      => safe_get('tanggal_awal'),
            'tanggal_akhir'     => safe_get('tanggal_akhir'),
            'kategori'          => safe_get('kategori'),
            'unit'              => safe_get('unit'),
            'barang'            => safe_get('barang_search_pembelian'),
        ];

        if ($search['unit'] !== '') {
            $unit = $this->db->where('id', $search['unit'], true)->select('nama')->get('sm_unit')->row()->nama;
        } else {
            $unit = "";
        }

        $data['get_date_format'] = $this->m_masterdata->get_date_format();
        $data                    = $this->laporan->getListLaporanPembelian(0, 0, $search);
        $data['parameter']       = $search;
        $data['unit']            = $unit;

        $this->load->view('lap_pembelian_logistik/export.php', $data);

    }

    public function export_permintaan()
    {
        $search = [
            'periode_laporan'   => safe_get('periode_laporan'),
            'tanggal_harian'    => safe_get('tanggal_harian'),
            'bulan'             => safe_get('bulan'),
            'tahun'             => safe_get('tahun'),
            'tanggal_awal'      => safe_get('tanggal_awal'),
            'tanggal_akhir'     => safe_get('tanggal_akhir'),
            'unit'              => safe_get('unit'),
            'barang'            => safe_get('barang'),
			'pembayaran'		=> safe_get('pembayaran_permintaan')
        ];

        if ($search['unit'] !== '') {
            $unit = $this->db->where('id', $search['unit'], true)->select('nama')->get('sm_unit')->row()->nama;
        } else {
            $unit = "";
        }

        $data['get_date_format'] = $this->m_masterdata->get_date_format();
        $data                    = $this->laporan->getListLaporanPermintaanLogistik(0, 0, $search);
        $data['parameter']       = $search;
        $data['unit']            = $unit;

        $this->load->view('lap_permintaan_logistik/export.php', $data);
    }

    public function export_pemakaian()
    {
        $search = [
            'periode_laporan'   => safe_get('periode_laporan'),
            'tanggal_harian'    => safe_get('tanggal_harian'),
            'bulan'             => safe_get('bulan'),
            'tahun'             => safe_get('tahun'),
            'tanggal_awal'      => safe_get('tanggal_awal'),
            'tanggal_akhir'     => safe_get('tanggal_akhir'),
            'unit'              => safe_get('unit'),
            'barang'            => safe_get('barang'),
            'pembayaran'        => safe_get('pembayaran_pemakaian')
        ];

        if ($search['unit'] !== '') {
            $unit = $this->db->where('id', $search['unit'], true)->select('nama')->get('sm_unit')->row()->nama;
        } else {
            $unit = "";
        }

        $data['get_date_format'] = $this->m_masterdata->get_date_format();
        $data                    = $this->laporan->getListLaporanPemakaianLogistik(0, 0, $search);
        $data['parameter']       = $search;
        $data['unit']            = $unit;

        $this->load->view('lap_pemakaian_logistik/export.php', $data);
    }

}
