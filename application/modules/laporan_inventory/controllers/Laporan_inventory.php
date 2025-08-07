<?php

defined('BASEPATH') or exit('No direct script access allowed');

// require('./application/third_party/phpoffice/vendor/autoload.php');

class Laporan_inventory extends SYAM_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('App_model', 'm_default');
        $this->load->model('Masterdata_model', 'm_masterdata');
        $this->load->model('Laporan_inventory_model', 'm_laporan');
    }

    public function index()
    {
        $data['active']  = 'Laporan Inventory';
        $data['modules'] = $this->m_default->getDataModules($this->session->userdata('id_account_group'));
        $is_login        = $this->session->userdata('is_login');

        if ($is_login === true) :
            $data['hospital'] = $this->m_default->getDataHospital();
            $this->load->view('layouts/index', $data);

        else :
            redirect('/');

        endif;
    }

    public function page_laporan_inventory()
    {
        $data['jenis_laporan']      = $this->m_laporan->list_laporan();
        $data['periode_laporan']    = $this->m_laporan->getPeriodeLaporan();
        $data['golongan']           = $this->m_laporan->getGolongan();
        $data['jenis']              = $this->m_laporan->getJenis();
        $data['kategori']           = $this->m_laporan->getKategori();
        $data['fornas']             = $this->m_laporan->getFornas();
        $data['generik']            = $this->m_laporan->getGenerik();
        $data['unit']               = $this->m_laporan->getUnitDepo();
        $data['unit_all']           = $this->m_laporan->getUnitDepoAll();
        $data['jenis_pasien']       = $this->m_laporan->getJenisPasien();
        $data['jaminan']            = $this->m_laporan->getJaminan();
        $data['bulan']              = $this->m_masterdata->getBulan();

        $this->load->view('index', $data);
    }

    public function export_laporan_01()
    {
        $this->load->model('Laporan_inventory_model', 'm_laporan_inventory');
        $search = [
            'periode_laporan'   => safe_get('periode_laporan'),
            'tanggal_harian'    => safe_get('tanggal_harian'),
            'bulan'             => safe_get('bulan'),
            'tahun'             => safe_get('tahun'),
            'tanggal_awal'      => safe_get('tanggal_awal'),
            'tanggal_akhir'     => safe_get('tanggal_akhir'),
            'unit'              => safe_get('unit'),
            'golongan'          => safe_get('golongan'),
            'jenis'             => safe_get('jenis'),
            'kategori'          => safe_get('kategori'),
            'fornas'            => safe_get('fornas'),
            'generik'           => safe_get('generik')
        ];

        if ($search['unit'] !== '') {
            $unit = $this->db->where('id', $search['unit'], true)->select('nama')->get('sm_unit')->row()->nama;
        } else {
            $unit = "";
        }
        if ($search['golongan'] !== '') {
            $golongan = $this->db->where('id', $search['golongan'], true)->select('nama')->get('sm_golongan')->row()->nama;
        } else {
            $golongan = "";
        }
        if ($search['kategori'] !== '') {
            $kategori = $this->db->where('id', $search['kategori'], true)->select('nama')->get('sm_kategori_barang')->row()->nama;
        } else {
            $kategori = "";
        }
        $search['fornas'] !== '' ? $fornas = $search['fornas'] : $fornas = '';
        $search['generik'] !== '' ? $generik = $search['generik'] : $generik = '';

        $data['get_date_format']    = $this->m_masterdata->get_date_format();
        $data                       = $this->m_laporan_inventory->getListDataLaporanMutasiObat(0, 0, $search);
        $data['parameter']          = $search;
        $data['unit']               = $unit;
        $data['golongan']           = $golongan;
        $data['kategori']           = $kategori;
        $data['fornas']             = $fornas;
        $data['generik']            = $generik;

        $this->load->view('lap_mutasi_obat/export.php', $data);
    }

    public function export_laporan_02()
    {
        $this->load->model('Laporan_inventory_model', 'm_laporan_inventory');
        $search = [
            'periode_laporan'   => safe_get('periode_laporan'),
            'tanggal_harian'    => safe_get('tanggal_harian'),
            'bulan'             => safe_get('bulan'),
            'tahun'             => safe_get('tahun'),
            'tanggal_awal'      => safe_get('tanggal_awal'),
            'tanggal_akhir'     => safe_get('tanggal_akhir'),
            'unit_depo'         => safe_get('unit_depo'),
            'kategori'          => safe_get('kategori'),
            'jenis_pasien'      => safe_get('jenis_pasien'),
            'pasien_search'     => safe_get('pasien_search'),
            'barang_search'     => safe_get('barang_search'),
            'ruangan_rajal'     => safe_get('ruangan_rajal'),
            'ruangan_ranap'     => safe_get('ruangan_ranap'),
            'dokter_search'     => safe_get('dokter_search'),
            'fornas'            => safe_get('fornas'),
            'generik'           => safe_get('generik')
        ];

        $search['unit_depo'] !== '' ?
            $unit = $this->db->where('id', $search['unit_depo'], true)->select('nama')->get('sm_unit')->row()->nama : $unit = "";

        $search['kategori'] !== '' ?
            $kategori = $this->db->where('id', $search['kategori'], true)->select('nama')->get('sm_kategori_barang')->row()->nama : $kategori = "";

        $ruangan = '';
        $search['ruangan_rajal'] !== '' ?
            $ruangan = $this->db->where('id', $search['ruangan_rajal'], true)->select('nama')->get('sm_spesialisasi')->row()->nama : "";

        $search['ruangan_ranap'] !== '' ?
            $ruangan = $this->db->where('id', $search['ruangan_ranap'], true)->select('nama')->get('sm_bangsal')->row()->nama : "";

        $search['barang_search'] !== '' ?
            $barang = $this->db->where('id', $search['barang_search'], true)->select('nama')->get('sm_barang')->row()->nama : $barang = "";

        $search['pasien_search'] !== '' ?
            $pasien = $this->db->where('id', $search['pasien_search'], true)->select('nama')->get('sm_pasien')->row()->nama : $pasien = "";

        $search['dokter_search'] !== '' ?
            $dokter = $this->db->select('pg.nama')->from('sm_pegawai pg')->join('sm_tenaga_medis tm', 'pg.id = tm.id_pegawai')->where('tm.id', $search['dokter_search'])->get()->row()->nama : $dokter = "";
        $search['fornas'] !== '' ? $fornas = $search['fornas'] : $fornas = '';
        $search['generik'] !== '' ? $generik = $search['generik'] : $generik = '';

        $data['get_date_format'] = $this->m_masterdata->get_date_format();
        $data                    = $this->m_laporan_inventory->getListLaporanBukuPenjualan(0, 0, $search);
        $data['parameter']       = $search;
        $data['unit']            = $unit;
        $data['kategori']        = $kategori;
        $data['ruangan']         = $ruangan;
        $data['barang']          = $barang;
        $data['pasien']          = $pasien;
        $data['dokter']          = $dokter;
        $data['fornas']          = $fornas;
        $data['generik']         = $generik;

        $this->load->view('lap_buku_penjualan/export.php', $data);
    }

    public function export_laporan_03()
    {
        $this->load->model('Laporan_inventory_model', 'm_laporan_inventory');
        $search = [
            'periode_laporan'     => safe_get('periode_laporan'),
            'tanggal_harian'      => safe_get('tanggal_harian'),
            'bulan'               => safe_get('bulan'),
            'tahun'               => safe_get('tahun'),
            'tanggal_awal'        => safe_get('tanggal_awal'),
            'tanggal_akhir'       => safe_get('tanggal_akhir'),
            'unit_depo'            => safe_get('unit_depo'),
            'kategori'            => safe_get('kategori'),
            'jenis_pasien'        => safe_get('jenis_pasien'),
            'jaminan'            => safe_get('jaminan'),
        ];

        if ($search['unit_depo'] !== '') {
            $unit = $this->db->where('id', $search['unit_depo'], true)->select('nama')->get('sm_unit')->row()->nama;
        } else {
            $unit = "";
        }

        if ($search['kategori'] !== '') {
            $kategori = $this->db->where('id', $search['kategori'], true)->select('nama')->get('sm_kategori_barang')->row()->nama;
        } else {
            $kategori = "";
        }

        $data['get_date_format'] = $this->m_masterdata->get_date_format();
        $data                    = $this->m_laporan_inventory->getExportLaporanPenjualanObat($search);
        $data['parameter']       = $search;
        $data['unit']                = $unit;
        $data['kategori']        = $kategori;

        $this->load->view('lap_penjualan_obat/export.php', $data);
    }

    public function export_laporan_04()
    {
        $this->load->model('Laporan_inventory_model', 'm_laporan_inventory');
        $search = [
            'periode_laporan'   => safe_get('periode_laporan'),
            'tanggal_harian'    => safe_get('tanggal_harian'),
            'bulan'             => safe_get('bulan'),
            'tahun'             => safe_get('tahun'),
            'tanggal_awal'      => safe_get('tanggal_awal'),
            'tanggal_akhir'     => safe_get('tanggal_akhir'),
            'unit_depo'         => safe_get('unit_depo'),
            'barang_search'     => safe_get('barang_search_04'),
            'kategori'          => safe_get('kategori'),
            'golongan'          => safe_get('golongan'),
            'jenis'             => safe_get('jenis'),
            'fornas'            => safe_get('fornas'),
            'generik'           => safe_get('generik')
        ];

        if ($search['unit_depo'] !== '') {
            $unit = $this->db->where('id', $search['unit_depo'], true)->select('nama')->get('sm_unit')->row()->nama;
        } else {
            $unit = "";
        }

        if ($search['kategori'] !== '') {
            $kategori = $this->db->where('id', $search['kategori'], true)->select('nama')->get('sm_kategori_barang')->row()->nama;
        } else {
            $kategori = "";
        }
        $search['golongan'] !== "" ? $golongan = $this->db->where('id', $search['golongan'], true)->select('nama')->get('sm_golongan')->row()->nama : $golongan = "";
        $search['fornas'] !== '' ? $fornas = $search['fornas'] : $fornas = '';
        $search['generik'] !== '' ? $generik = $search['generik'] : $generik = '';


        $data['get_date_format'] = $this->m_masterdata->get_date_format();
        $data                    = $this->m_laporan_inventory->getListLaporanPemakaianObat(0, 0, $search);
        $data['parameter']       = $search;
        $data['unit']            = $unit;
        $data['kategori']        = $kategori;
        $data['golongan']        = $golongan;
        $data['fornas']          = $fornas;
        $data['generik']         = $generik;

        $this->load->view('lap_pemakaian_obat/export.php', $data);
    }

    public function export_laporan_05()
    {
        $this->load->model('Laporan_inventory_model', 'm_laporan_inventory');
        $search = [
            'periode_laporan'   => safe_get('periode_laporan'),
            'tanggal_harian'    => safe_get('tanggal_harian'),
            'bulan'             => safe_get('bulan'),
            'tahun'             => safe_get('tahun'),
            'tanggal_awal'      => safe_get('tanggal_awal'),
            'tanggal_akhir'     => safe_get('tanggal_akhir'),
            'unit_depo'         => safe_get('unit_depo'),
            'barang_search'     => safe_get('barang_search_04'),
            'kategori'          => safe_get('kategori'),
            'golongan'          => safe_get('golongan'),
            'jenis'             => safe_get('jenis'),
            'fornas'            => safe_get('fornas'),
            'generik'           => safe_get('generik')
        ];

        if ($search['kategori'] !== '') {
            $kategori = $this->db->where('id', $search['kategori'], true)->select('nama')->get('sm_kategori_barang')->row()->nama;
        } else {
            $kategori = "";
        }
        $search['golongan'] !== "" ? $golongan = $this->db->where('id', $search['golongan'], true)->select('nama')->get('sm_golongan')->row()->nama : $golongan = "";
        $search['fornas'] !== '' ? $fornas = $search['fornas'] : $fornas = '';
        $search['generik'] !== '' ? $generik = $search['generik'] : $generik = '';


        $data['get_date_format'] = $this->m_masterdata->get_date_format();
        $data                    = $this->m_laporan_inventory->getListLaporanPemakaianObatAllUnit(0, 0, $search);
        $data['parameter']       = $search;
        $data['kategori']        = $kategori;
        $data['golongan']        = $golongan;
        $data['fornas']          = $fornas;
        $data['generik']         = $generik;

        $this->load->view('lap_pemakaian_obat_all_unit/export.php', $data);
    }

    public function export_laporan_06()
    {
        $this->load->model('Laporan_inventory_model', 'm_laporan_inventory');
        $search = [
            'periode_laporan'   => safe_get('periode_laporan'),
            'tanggal_harian'    => safe_get('tanggal_harian'),
            'bulan'             => safe_get('bulan'),
            'tahun'             => safe_get('tahun'),
            'tanggal_awal'      => safe_get('tanggal_awal'),
            'tanggal_akhir'     => safe_get('tanggal_akhir'),
            'unit_depo'         => safe_get('unit_depo_06'),
            'barang_search'     => safe_get('barang_search_06')
        ];

        if ($search['unit_depo'] !== '') {
            $unit = $this->db->where('id', $search['unit_depo'], true)->select('nama')->get('sm_unit')->row()->nama;
        } else {
            $unit = "";
        }

        $data['get_date_format'] = $this->m_masterdata->get_date_format();
        $data                    = $this->m_laporan_inventory->getListLaporanPengeluaranObat(0, 0, $search);
        $data['parameter']       = $search;
        $data['unit']            = $unit;

        $this->load->view('lap_pengeluaran_obat/export.php', $data);
    }

    public function export_laporan_07()
    {
        $this->load->model('Laporan_inventory_model', 'm_laporan_inventory');
        $search = [
            'periode_laporan'   => safe_get('periode_laporan'),
            'tanggal_harian'    => safe_get('tanggal_harian'),
            'bulan'             => safe_get('bulan'),
            'tahun'             => safe_get('tahun'),
            'tanggal_awal'      => safe_get('tanggal_awal'),
            'tanggal_akhir'     => safe_get('tanggal_akhir'),
            'unit_depo'         => safe_get('unit_depo_07'),
            'barang_search'     => safe_get('barang_search_07')
        ];

        if ($search['unit_depo'] !== '') {
            $unit = $this->db->where('id', $search['unit_depo'], true)->select('nama')->get('sm_unit')->row()->nama;
        } else {
            $unit = "";
        }

        $data['get_date_format'] = $this->m_masterdata->get_date_format();
        $data                    = $this->m_laporan_inventory->getListLaporanPermintaanObat(0, 0, $search);
        $data['parameter']       = $search;
        $data['unit']            = $unit;

        $this->load->view('lap_permintaan_obat/export.php', $data);
    }

    public function export_laporan_08()
    {
        $this->load->model('Laporan_inventory_model', 'm_laporan_inventory');
        $search = [
            'periode_laporan'   => safe_get('periode_laporan'),
            'tanggal_harian'    => safe_get('tanggal_harian'),
            'bulan'             => safe_get('bulan'),
            'tahun'             => safe_get('tahun'),
            'tanggal_awal'      => safe_get('tanggal_awal'),
            'tanggal_akhir'     => safe_get('tanggal_akhir'),
            'unit_depo'         => safe_get('unit_depo_08'),
            'barang_search'     => safe_get('barang_search_08')
        ];

        if ($search['unit_depo'] !== '') {
            $unit = $this->db->where('id', $search['unit_depo'], true)->select('nama')->get('sm_unit')->row()->nama;
        } else {
            $unit = "";
        }

        $data['get_date_format'] = $this->m_masterdata->get_date_format();
        $data                    = $this->m_laporan_inventory->getListLaporanPermintaanUnitkeGudang(0, 0, $search);
        $data['parameter']       = $search;
        $data['unit']            = $unit;

        $this->load->view('lap_permintaan_kegudang/export.php', $data);
    }

    public function export_laporan_09()
    {
        $this->load->model('Laporan_inventory_model', 'm_laporan_inventory');
        $search = [
            'periode_laporan'   => safe_get('periode_laporan'),
            'tanggal_harian'    => safe_get('tanggal_harian'),
            'bulan'             => safe_get('bulan'),
            'tahun'             => safe_get('tahun'),
            'tanggal_awal'      => safe_get('tanggal_awal'),
            'tanggal_akhir'     => safe_get('tanggal_akhir'),
            'unit_tujuan'       => safe_get('unit_tujuan'),
            'dari_unit'         => safe_get('dari_unit'),
            'barang_search'     => safe_get('barang_search_09')
        ];

        $data['get_date_format'] = $this->m_masterdata->get_date_format();
        $data                    = $this->m_laporan_inventory->getListLaporanPermintaanTakTerlayani(0, 0, $search);
        $data['parameter']       = $search;

        $this->load->view('lap_permintaan_takterlayani/export.php', $data);
    }

    public function export_laporan_10()
    {
        $this->load->model('Laporan_inventory_model', 'm_laporan_inventory');
        $search = [
            'periode_laporan'   => safe_get('periode_laporan'),
            'tanggal_harian'    => safe_get('tanggal_harian'),
            'bulan'             => safe_get('bulan'),
            'tahun'             => safe_get('tahun'),
            'tanggal_awal'      => safe_get('tanggal_awal'),
            'tanggal_akhir'     => safe_get('tanggal_akhir'),
            'unit_depo'         => safe_get('unit_depo_10'),
            'barang_search'     => safe_get('barang_search_10')
        ];

        $data['get_date_format'] = $this->m_masterdata->get_date_format();
        $data                    = $this->m_laporan_inventory->getListLaporanStokOpname(0, 0, $search);
        $data['parameter']       = $search;

        $this->load->view('lap_stok_opname/export.php', $data);
    }
}
