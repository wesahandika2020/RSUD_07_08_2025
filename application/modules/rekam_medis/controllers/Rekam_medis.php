<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Rekam_medis extends SYAM_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('App_model', 'default');
        $this->load->model('Masterdata_model', 'masterdata');
        // $this->load->model('Antrian_bpjs_model', 'antrian');
        // $this->load->model('Radiologi_log_model', 'log');


        // PWHI
        $this->load->model('pelayanan/Pelayanan_model', 'm_pelayanan');
        $this->load->model('pendaftaran/Pendaftaran_model', 'klinik');
    }

    function index()
    {
        $data['active'] = 'Masterdata';
        $data['modules'] = $this->default->getDataModules($this->session->userdata('id_account_group'));
        $is_login = $this->session->userdata('is_login');

        if ($is_login === true) :
            $data['hospital'] = $this->default->getDataHospital();
            $this->load->view('layouts/index', $data);
        else :
            redirect('/');
        endif;
    }

    function page_rekam_medis()
    {
        $this->load->view('index');
    }

    // PWHI
    function cetak_pemberian_informasi($id, $id_pendaftaran, $id_layanan_pendaftaran, $type = null){
        if (!$id) :
            exit();
        endif; 
        $pendaftaran = $this->klinik->getPendaftaranDetail($id_pendaftaran, $id_layanan_pendaftaran);    
        if (count((array) $pendaftaran['pasien']) < 1) :
            die();
        endif;  

        $data['layanan'] = $pendaftaran['layanan'];        
        $data['pasien'] = $pendaftaran['pasien'];
        $data['pasien']->kelamin == 'P' ? $data['pasien']->kelamin = 'Perempuan' : $data['pasien']->kelamin = 'Laki-laki';   
        $this->load->model('rekam_medis/Rekam_medis_model', 'rekam_medis');
        $pemberian_informasi = $this->rekam_medis->getPemberianInformasiById($id); 
        // var_dump($pemberian_informasi);die;  
        $data['pemberian_informasi'] = $pemberian_informasi;
        $data['is_pasien'] = $pemberian_informasi->is_pasien;
        if ($pemberian_informasi->is_pasien == '1') {
            $data['ttd_pasien_name'] = $data['pemberian_informasi']->nama_pasien;
            $data['ttd_pemberi_informasi'] = $pemberian_informasi->pemberi_informasi;
            $data['ttd_penerima_informasi'] = $pemberian_informasi->penerima_informasi;
        } else {
            $data['ttd_pasien_name'] = $pemberian_informasi->nama_keluarga;
            $data['ttd_pemberi_informasi'] = $pemberian_informasi->pemberi_informasi;
            $data['ttd_penerima_informasi'] = $pemberian_informasi->penerima_informasi;
        }

        if ($type !== 'data') {
            $this->load->view('rekam_medis/printing/cetak_pemberian_informasi', $data);
        } else {
            return $data;
        }
    }

    // SPPPMK PERBAIKAN
    function cetak_surat_pernyataan_persetujuan_pmk($id, $id_pendaftaran, $id_layanan_pendaftaran, $type = null) {
        // Mengecek apakah $id tersedia, jika tidak ada maka fungsi berhenti
        if (!$id) exit();
    
        // Mendapatkan detail pendaftaran pasien berdasarkan ID pendaftaran dan layanan
        $pendaftaran = $this->klinik->getPendaftaranDetail($id_pendaftaran, $id_layanan_pendaftaran);    
    
        // Jika data pasien tidak ditemukan, hentikan proses
        if (count((array) $pendaftaran['pasien']) < 1) die();
    
        // Load model rekam medis untuk mendapatkan data rekam medis
        $this->load->model('rekam_medis/Rekam_medis_model', 'rekam_medis');
    
        // Mengambil detail tindakan pendaftaran pasien
        $data = $this->rekam_medis->getPendaftaranDetailTindakan($id_pendaftaran); 
    
        // Mengambil data Surat Kuasa Pemberian Informasi Medis berdasarkan ID
        $spppmk = $this->rekam_medis->getSuratPernyataanPersetujuanPenolakanMedisKhususById($id);  
        $data['spppmk'] = $spppmk;  // Menyimpan data SPPPMK ke dalam array $data  
        // Jika parameter $type tidak sama dengan 'data', tampilkan tampilan view cetak
        if ($type !== 'data') {
            $this->load->view('rekam_medis/printing/cetak_surat_pernyataan_persetujuan_pmk', $data);
        } else {
            // Jika $type adalah 'data', kembalikan data tanpa menampilkan tampilan
            return $data;
        }
    }

    // KPEGD LOGS PERBAIKAN
    function cetak_keterangan_pasien_emergency($id, $id_pendaftaran, $id_layanan_pendaftaran, $type = null) {
        if (!$id) exit();
        $pendaftaran = $this->klinik->getPendaftaranDetail($id_pendaftaran, $id_layanan_pendaftaran);    
        if (count((array) $pendaftaran['pasien']) < 1) die(); 
        $this->load->model('rekam_medis/Rekam_medis_model', 'rekam_medis');   
        $data = $this->rekam_medis->getPendaftaranDetailTindakan($id_pendaftaran); 
        $kpegd = $this->rekam_medis->getSuratKeteranganPasienEmergencyById($id);  
        $data['kpegd'] = $kpegd;  

        $data['ds_manual_utama'] = [];
        $ds_manual_utamas = $this->m_pelayanan->getDiagnosaManualUtamaKPEGD($id_pendaftaran);
        if (!empty($ds_manual_utamas)) {
            $data['ds_manual_utama'] = $ds_manual_utamas;
        }

        $data['ds_manual_sekunder'] = [];
        $ds_manual_sekunders = $this->m_pelayanan->getDiagnosaManualSekunderKPEGD($id_pendaftaran);
        if (!empty($ds_manual_sekunders)) {
            $data['ds_manual_sekunder'] = $ds_manual_sekunders;
        }

        $data['diagnosa_utama'] = [];
        $diagnosa_utamas = $this->m_pelayanan->getDiagnosa($id_pendaftaran);
        if (!empty($diagnosa_utamas)) {
            $data['diagnosa_utama'] = $diagnosa_utamas;
        }

        $data['diagnosa_sekunder'] = [];
        $diagnosa_sekunders = $this->m_pelayanan->getDiagnosaSekunder($id_pendaftaran);
        if (!empty($diagnosa_sekunders)) {
            $data['diagnosa_sekunder'] = $diagnosa_sekunders;
        }

        if ($type !== 'data') {
            $this->load->view('rekam_medis/printing/cetak_keterangan_pasien_emergency', $data);
        } else {
            // Jika $type adalah 'data', kembalikan data tanpa menampilkan tampilan
            return $data;
        }
    }





   
   



}