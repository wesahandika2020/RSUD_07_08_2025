<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Radiologi_log extends SYAM_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('App_model', 'default');
        $this->load->model('Masterdata_model', 'masterdata');
        // $this->load->model('Antrian_bpjs_model', 'antrian');
        // $this->load->model('Radiologi_log_model', 'log');

         // PPDRAD
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

    function page_radiologi_log()
    {
        $this->load->view('index');
    }

    // // JANGAN DI HAPUS INI UNTUK MEMUNCULKAN CETAK
    // // PPDRAD
    // function pemeriksaan_diagnostik($id, $id_pendaftaran, $id_layanan_pendaftaran, $type = null){
    //     if (!$id) :
    //         exit();
    //     endif; 
    //     $pendaftaran = $this->klinik->getPendaftaranDetail($id_pendaftaran, $id_layanan_pendaftaran);    
    //     if (count((array) $pendaftaran['pasien']) < 1) :
    //         die();
    //     endif;
    //     $data['layanan'] = $pendaftaran['layanan'];        
    //     $data['pasien'] = $pendaftaran['pasien'];
    //     $data['pasien']->kelamin == 'P' ? $data['pasien']->kelamin = 'Perempuan' : $data['pasien']->kelamin = 'Laki-laki';     
    //     $this->load->model('radiologi_log/Radiologi_log_model', 'radiologi');
    //     $data['pemeriksaan_diagnostik'] = $this->radiologi->getPermintaanPemeriksaanDiagnostikByID($id);
    //     // var_dump($data['pemeriksaan_diagnostik']);die;
    //     if ($type !== 'data') {
    //         $this->load->view('radiologi_log/printing/cetak_permintaan_pemeriksaan_diagnostik', $data);
    //     } else {
    //         return $data;
    //     }
    // }




    // PPPDJ
    function cetak_ppp_diagnostik_jantung($id, $id_pendaftaran, $id_layanan_pendaftaran, $type = null) {
        // Mengecek apakah $id tersedia, jika tidak ada maka fungsi berhenti
        if (!$id) exit();
    
        // Mendapatkan detail pendaftaran pasien berdasarkan ID pendaftaran dan layanan
        $pendaftaran = $this->klinik->getPendaftaranDetail($id_pendaftaran, $id_layanan_pendaftaran);    
    
        // Jika data pasien tidak ditemukan, hentikan proses
        if (count((array) $pendaftaran['pasien']) < 1) die();
    
        // Load model rekam medis untuk mendapatkan data rekam medis
        $this->load->model('radiologi_log/Radiologi_log_model', 'radiologi');
    
        // Mengambil detail tindakan pendaftaran pasien
        $data = $this->radiologi->getPendaftaranDetailTindakanRadiologi($id_pendaftaran); 
    
        // Mengambil data Formulir Kesediaan Pemulasaran Organ Amputasi berdasarkan ID
        $pppdj = $this->radiologi->getPppDiagnostikJanTungById($id);  
        $data['pppdj'] = $pppdj;  // Menyimpan data PPPDJ ke dalam array $data
        // var_dump($data['pppdj']);die;
        if ($type !== 'data') {
            $this->load->view('radiologi_log/printing/cetak_ppp_diagnostik_jantung', $data);
        } else {
            // Jika $type adalah 'data', kembalikan data tanpa menampilkan tampilan
            return $data;
        }
    }



    // CPTD
    function cetak_checklist_post_tindakan_diagnostik($id, $id_pendaftaran, $id_layanan_pendaftaran, $type = null) {
        // Mengecek apakah $id tersedia, jika tidak ada maka fungsi berhenti
        if (!$id) exit();
    
        // Mendapatkan detail pendaftaran pasien berdasarkan ID pendaftaran dan layanan
        $pendaftaran = $this->klinik->getPendaftaranDetail($id_pendaftaran, $id_layanan_pendaftaran);    
    
        // Jika data pasien tidak ditemukan, hentikan proses
        if (count((array) $pendaftaran['pasien']) < 1) die();
    
        // Load model rekam medis untuk mendapatkan data rekam medis
        $this->load->model('radiologi_log/Radiologi_log_model', 'radiologi');
    
        // Mengambil detail tindakan pendaftaran pasien
        $data = $this->radiologi->getPendaftaranDetailTindakanRadiologi($id_pendaftaran); 
    
        // Mengambil data Formulir Kesediaan Pemulasaran Organ Amputasi berdasarkan ID
        $cptd = $this->radiologi->getCheklistPostTindakanDiagnostikById($id);  
        $data['cptd'] = $cptd;  // Menyimpan data PPPDJ ke dalam array $data
        // var_dump($data['cptd']);die;
        if ($type !== 'data') {
            $this->load->view('radiologi_log/printing/cetak_checklist_post_tindakan_diagnostik', $data);
        } else {
            // Jika $type adalah 'data', kembalikan data tanpa menampilkan tampilan
            return $data;
        }
    }


     
    // QCPTD
    function cetak_checklist_persiapan_tindakan_diagnostik($id, $id_pendaftaran, $id_layanan_pendaftaran, $type = null) {
        // Mengecek apakah $id tersedia, jika tidak ada maka fungsi berhenti
        if (!$id) exit();
    
        // Mendapatkan detail pendaftaran pasien berdasarkan ID pendaftaran dan layanan
        $pendaftaran = $this->klinik->getPendaftaranDetail($id_pendaftaran, $id_layanan_pendaftaran);    
    
        // Jika data pasien tidak ditemukan, hentikan proses
        if (count((array) $pendaftaran['pasien']) < 1) die();
    
        // Load model rekam medis untuk mendapatkan data rekam medis
        $this->load->model('radiologi_log/Radiologi_log_model', 'radiologi');
    
        // Mengambil detail tindakan pendaftaran pasien
        $data = $this->radiologi->getPendaftaranDetailTindakanRadiologi($id_pendaftaran); 
    
        // Mengambil data Formulir Kesediaan Pemulasaran Organ Amputasi berdasarkan ID
        $cptdq = $this->radiologi->getCheklistPersiapanTindakanDiagnostikById($id);  
        $data['cptdq'] = $cptdq;  // Menyimpan data PPPDJ ke dalam array $data
        // var_dump($data['cptdq']);die;
        if ($type !== 'data') {
            $this->load->view('radiologi_log/printing/cetak_checklist_persiapan_tindakan_diagnostik', $data);
        } else {
            // Jika $type adalah 'data', kembalikan data tanpa menampilkan tampilan
            return $data;
        }
    }




    // // AAKC INI DI TUTUP DULU KARNA BLM ADA PERINTAH UNTUK BIKIN PRINTYA
    // function cetak_asesmen_awal_keperawatan_cathlab($id, $id_pendaftaran, $id_layanan_pendaftaran, $type = null) {
    //     // Mengecek apakah $id tersedia, jika tidak ada maka fungsi berhenti
    //     if (!$id) exit();
    
    //     // Mendapatkan detail pendaftaran pasien berdasarkan ID pendaftaran dan layanan
    //     $pendaftaran = $this->klinik->getPendaftaranDetail($id_pendaftaran, $id_layanan_pendaftaran);    
    
    //     // Jika data pasien tidak ditemukan, hentikan proses
    //     if (count((array) $pendaftaran['pasien']) < 1) die();
    
    //     // Load model rekam medis untuk mendapatkan data rekam medis
    //     $this->load->model('radiologi_log/Radiologi_log_model', 'radiologi');
    
    //     // Mengambil detail tindakan pendaftaran pasien
    //     $data = $this->radiologi->getPendaftaranDetailTindakanRadiologi($id_pendaftaran); 
    
    //     // Mengambil data Formulir Kesediaan Pemulasaran Organ Amputasi berdasarkan ID
    //     $aakc = $this->radiologi->getAsesmenAwalKeperawatanCathlabById($id);  
    //     $data['aakc'] = $aakc;  // Menyimpan data PPPDJ ke dalam array $data
    //     // var_dump($data['aakc']);die;
    //     if ($type !== 'data') {
    //         $this->load->view('radiologi_log/printing/cetak_asesmen_awal_keperawatan_cathlab', $data);
    //     } else {
    //         // Jika $type adalah 'data', kembalikan data tanpa menampilkan tampilan
    //         return $data;
    //     }
    // }



    
}
