<?php

defined('BASEPATH') or exit('No direct script access allowed');
require_once APPPATH . 'modules/casemix/controllers/Casemix.php';
require_once APPPATH . 'modules/hasil_radiologi/controllers/Hasil_radiologi.php';
require_once APPPATH . 'modules/cloud_rsud/controllers/Cloud_rsud.php';

// require_once 'vendor/dompdf/dompdf/src/dompdf.php';


class Medical_check_up extends SYAM_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('App_model', 'default');
        $this->load->model('Masterdata_model', 'auto');
        $this->load->model('pendaftaran/Pendaftaran_model', 'klinik');
        $this->load->model('form_rekam_medis/Form_rekam_medis_model', 'm_rm');
        $this->load->model('Medical_check_up_model', 'm_mcu');
        $this->load->model('pendaftaran/Pendaftaran_model', 'm_pendaftaran');

        $this->load->model('casemix/Casemix_model', 'm_casemix');
        $this->load->model('hasil_laboratorium/Hasil_laboratorium_model', 'lab_model');
        $this->load->model('hasil_laboratorium/Hasil_laboratorium_pa_model', 'lab_pa');
        $this->load->model('hasil_radiologi/Hasil_radiologi_model', 'm_hasil_radiologi');
        $this->load->model('cloud_rsud/Cloud_rsud_model', 'cloud_rsud');
    }

    function index()
    {
        $data['active'] = 'Configs';
        $data['modules'] = $this->default->getDataModules($this->session->userdata('id_account_group'));
        $is_login = $this->session->userdata('is_login');

        if ($is_login === true) :
            $data['hospital'] = $this->default->getDataHospital();
            $this->load->view('layouts/index', $data);

        else :
            redirect('/');

        endif;
    }

    function page_medical_check_up()
    {
        $this->load->model('pelayanan/Pelayanan_model', 'pelayanan');
        $data['kelas_tindakan']      = '1';
        $data['jenis_tindakan']      = 'Medical Check Up';
        $data['jenis_tindak_lanjut'] = '';
        $data['poli']                = (int) $this->session->userdata('poli');
        $data['group']               = $this->session->userdata('account_group');
        $data['kelas']               = $this->auto->getDataKelas();
        $data['profesi']             = $this->auto->getProfesi();
        $data['kondisi_keluar']      = $this->auto->getKondisiKeluar();
        $data['tindak_lanjut']       = $this->pelayanan->getTindakLanjut();
        $data['layanan']             = $this->auto->getLayananRegistration(null);

        $data['klinik']              = '';
        $klinik = $this->auto->getSpesialisasi($this->session->userdata('id_spesialis'));
        if (0 < count((array)$klinik)) :
            $data['klinik'] = $klinik->nama;
        endif;

        $data['jenis']              = 'Medical Check Up';
        $data['jenis_igd']          = $this->auto->getJenisIGD();
        $data['hospital']           = $this->default->getDataHospital();
        $data['jenis_kasus']        = $this->auto->getJenisKasusDiagnosa();
        $data['status_pemeriksaan'] = $this->auto->getStatusPemeriksaan(true);
        $data['kelas_rawat']        = $this->auto->getOpsiKelasInacbg(false);
        $data['status_gizi']        = $this->auto->getStatusGizi();
        $data['bangsal']            = $this->auto->getDataBangsalReady();
        unset($data['bangsal']['']);

        $this->load->view('index', $data);
    }

    function cetak_form_skpk($idPendaftaran)
    {
        if ($idPendaftaran !== null) :
            $pendaftaran = $this->klinik->getPendaftaranDetail($idPendaftaran);

            if (count((array) $pendaftaran['pasien']) < 1) :
                die();
            endif;

            $data['pasien'] = $pendaftaran['pasien'];
            $data['pasien']->kelamin == 'P' ? $data['pasien']->kelamin = 'Perempuan' : $data['pasien']->kelamin = 'Laki-laki';

            $this->load->model('medical_check_up/Medical_check_up_model', 'm_mcu');
            $formskpk = $this->m_mcu->getFormSKPK($idPendaftaran);
            $data['form_skpk'] = $formskpk;

            $this->load->view('medical_check_up/printing/cetak_form_skpk', $data);
        endif;
    }

    function cetak_sk_dinkes($idPendaftaran)
    {
        if ($idPendaftaran !== null) :
            $pendaftaran = $this->klinik->getPendaftaranDetail($idPendaftaran);

            if (count((array) $pendaftaran['pasien']) < 1) :
                die();
            endif;

            $data['pasien'] = $pendaftaran['pasien'];
            $data['pasien']->kelamin == 'P' ? $data['pasien']->kelamin = 'Perempuan' : $data['pasien']->kelamin = 'Laki-laki';

            $this->load->model('medical_check_up/Medical_check_up_model', 'm_mcu');
            $sk_dinkes = $this->m_mcu->getSKDinkes($idPendaftaran);
            $data['sk_dinkes'] = $sk_dinkes;

            $this->load->view('medical_check_up/printing/cetak_sk_dinkes', $data);
        endif;
    }

    function cetak_form_sks($id)
    {
        if ($id !== null) :
            $data['detailPendaftaran'] = $this->db->select("lp.*, pd.id_pasien, (p.nama) as nama_pasien, p.kelamin, p.alamat, p.no_rt as rt, p.no_rw as rw, p.no_rumah as norumah, p.nama_kec as kec, p.nama_kel as kel, p.nama_kab as kab, p.nama_prop as prop", true)
                ->from('sm_layanan_pendaftaran as lp')
                ->join('sm_pendaftaran as pd', 'pd.id = lp.id_pendaftaran')
                ->join('sm_pasien as p', 'p.id = pd.id_pasien')
                ->where('lp.id', $id, true)
                ->get()
                ->row();

            // $pendaftaran = $this->klinik->getPendaftaranDetail($id);

            // if (count((array) $pendaftaran['pasien']) < 1) :
            //     die();
            // endif;

            // $data['pasien'] = $pendaftaran['pasien'];
            $data['detailPendaftaran']->kelamin == 'P' ? $data['detailPendaftaran']->kelamin = 'PEREMPUAN' : $data['detailPendaftaran']->kelamin = 'LAKI-LAKI';

            $this->load->model('medical_check_up/Medical_check_up_model', 'm_mcu');
            $sk_sehat = $this->m_mcu->getSKSehat($id);
            $data['sk_sehat'] = $sk_sehat;

            $this->load->view('medical_check_up/printing/cetak_sk_sehat', $data);
        endif;
    }

    function cetak_surat_narkoba($id)
    {
        if ($id !== null) :
            // $data['detailPendaftaran'] = $this->db->select("lp.*, pd.id_pasien, upper(p.nama) as nama_pasien, p.kelamin, p.alamat, p.no_rt as rt, p.no_rw as rw, p.no_rumah as norumah, p.nama_kec as kec, p.nama_kel as kel, p.nama_kab as kab, p.nama_prop as prop", true)
            $data['detailPendaftaran'] = $this->db->select("lp.*, pd.id_pasien, p.nama as nama_pasien, p.kelamin, p.alamat, p.no_rt as rt, p.no_rw as rw, p.no_rumah as norumah, p.nama_kec as kec, p.nama_kel as kel, p.nama_kab as kab, p.nama_prop as prop", true)

                ->from('sm_layanan_pendaftaran as lp')
                ->join('sm_pendaftaran as pd', 'pd.id = lp.id_pendaftaran')
                ->join('sm_pasien as p', 'p.id = pd.id_pasien')
                ->where('lp.id', $id, true)
                ->get()
                ->row();


            $data['detailPendaftaran']->kelamin == 'P' ? $data['detailPendaftaran']->kelamin = 'PEREMPUAN' : $data['detailPendaftaran']->kelamin = 'LAKI-LAKI';

            $this->load->model('medical_check_up/Medical_check_up_model', 'm_mcu');
            $surat_narkoba = $this->m_mcu->getSBN($id);
            $data['surat_narkoba'] = $surat_narkoba;

            $this->load->view('medical_check_up/printing/cetak_surat_narkoba', $data);
        endif;
    }






    


    // MRM
    function cetak_surat_hrm($id){
        if ($id !== null) :
            $data['detailPendaftaran'] = $this->db->select("lp.*, pd.id_pasien, p.nama as nama_pasien, p.kelamin, p.alamat", true)
                ->from('sm_layanan_pendaftaran as lp')
                ->join('sm_pendaftaran as pd', 'pd.id = lp.id_pendaftaran')
                ->join('sm_pasien as p', 'p.id = pd.id_pasien')
                ->where('lp.id', $id, true)
                ->get()
                ->row();
            $data['detailPendaftaran']->kelamin == 'P' ? $data['detailPendaftaran']->kelamin = 'Perempuan' : $data['detailPendaftaran']->kelamin = 'Laki-laki';
            $this->load->model('medical_check_up/Medical_check_up_model', 'm_mcu');
            $surat_mcu = $this->m_mcu->getMCU($id);
            $data['resume_medis'] = $surat_mcu;
            // var_dump($data['resume_medis']);
            // die;
            $this->load->view('medical_check_up/printing/cetak_surat_hrm', $data);
        endif;
    }


    // MRM
    function cetak_surat_hrm_dompdf($id, $id_layanan, $id_pasien, $action = null){
        $this->load->library('pdf');
        $this->load->model('Hasil_pemeriksaan_mcu_model', 'm_hasil_mcu');

        $data_laboratorium  = [];
        $data_radiologi     = [];
        $data_okupasi       = '';
        $data_ekg           = '';

        // Ambil detail pendaftaran
        $data = $this->m_pendaftaran->getPendaftaranDetail($id, $id_layanan);

        // $data['faktor_klinis'] = [];
        $data['faktor_klinis'] = $this->m_hasil_mcu->getFaktorKlinis($id);
        $data['hpmcu'] = $this->m_hasil_mcu->getHasilPemeriksaan($id);

        // Hasil Laboratorium
        $sql = "SELECT lab.* FROM sm_laboratorium AS lab
                JOIN sm_layanan_pendaftaran AS lp ON lab.id_layanan_pendaftaran = lp.id
                WHERE lp.id_pendaftaran = '" . $id . "'";

        $data_list_laboratorium = $this->db->query($sql)->result();

        if (!empty($data_list_laboratorium)) {
            $casemix        = new Casemix;
            // $laboratorium   = new Hasil_laboratorium;
            $data_laboratorium = $casemix->printing_hasil_laboratorium($id, 'data');
        }

        // Hasil Radiologi
        $sql = "SELECT rd.* FROM sm_radiologi AS rd
                JOIN sm_layanan_pendaftaran AS lp ON rd.id_layanan_pendaftaran = lp.id
                WHERE lp.id_pendaftaran = '" . $id . "'";

        $data_list_radiologi = $this->db->query($sql)->result();

        if (!empty($data_list_radiologi)) {
            $radiologi = new Hasil_radiologi;

            foreach ($data_list_radiologi as $val) {
                $data_radiologi[] = $radiologi->printing_hasil_radiologi($val->id, 'data');
            }
        }

        // Hasil EKG
        $data_ekg = $this->m_hasil_mcu->getDataFileRMLain($id);

        if (!empty($data_ekg)) {
            $ekg = new Cloud_rsud;

            $data_ekg = $ekg->print_file_lain(base64_encode($data_ekg->id_cloud), 'data');
        }

        // Hasil Okupasi
        $hasil_okupasi = $this->db->get_where('sm_hasil_pemeriksaan_dokter_okupasih', array('id_layanan_pendaftaran' => $id_layanan))->row();

        if (!empty($hasil_okupasi)) {
            $data_okupasi = $this->m_mcu->getHasilPemeriksaanDokterOkupasi($id_layanan);
        }

        $data_mcu = $this->m_hasil_mcu->getDataQuisionerMCU($id_layanan);
        if ($action == 'khusus') {
            $data_mcu = null;
        }


        // $data['mcu']                = [];
        $data['mcu']                = $data_mcu;
        $data['resume_medis']       = $this->db->get_where('sm_anamnesa', array('id_layanan_pendaftaran' => $id_layanan))->row();
        $data['data_laboratorium']  = $data_laboratorium;
        $data['data_radiologi']     = $data_radiologi;
        $data['hasil_okupasi']      = $data_okupasi;
        $data['hasil_ekg']          = $data_ekg['data'];

        // Tangkap output HTML dari view
        ob_start();
        $this->load->view('medical_check_up/printing/cetak_surat_hrm_dompdf', $data);
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
        $file_name = 'MCU-' . $data['pasien']->id_pasien . '_' . $data['pasien']->nama . '.pdf';

        // Stream PDF ke browser
        $this->pdf->stream($file_name, ["Attachment" => false]);
    }






















    // SKKJ1
    function cetak_form_skkj_1($id)
    {
        if ($id !== null) {
            $data['detailPendaftaran'] = $this->db->select("lp.*, pd.id_pasien, upper(p.nama) as nama_pasien, p.kelamin, p.alamat, p.no_rt as rt, p.no_rw as rw, p.no_rumah as norumah, p.nama_kec as kec, p.nama_kel as kel, p.nama_kab as kab, p.nama_prop as prop", true)
                ->from('sm_layanan_pendaftaran as lp')
                ->join('sm_pendaftaran as pd', 'pd.id = lp.id_pendaftaran')
                ->join('sm_pasien as p', 'p.id = pd.id_pasien')
                ->where('lp.id', $id, true)
                ->get()
                ->row();
            $data['detailPendaftaran']->kelamin == 'P' ? $data['detailPendaftaran']->kelamin = 'Perempuan' : $data['detailPendaftaran']->kelamin = 'Laki-laki';
            $this->load->model('medical_check_up/Medical_check_up_model', 'm_mcu');
            $surat_skkj_1 = $this->m_mcu->getSKKJsatu($id);
            $data['skkj_1'] = $surat_skkj_1;
            $data['skkj_1_1'] = $surat_skkj_1;
            // var_dump($data['skkj_1'] );die;               
            $this->load->view('medical_check_up/printing/cetak_form_skkj_1', $data);
        }
    }

    // SKKJ2
    function cetak_form_skkj_2($id)
    {
        if ($id !== null) {
            $data['detailPendaftaran'] = $this->db->select("lp.*, pd.id_pasien, upper(p.nama) as nama_pasien, p.kelamin, p.alamat, p.no_rt as rt, p.no_rw as rw, p.no_rumah as norumah, p.nama_kec as kec, p.nama_kel as kel, p.nama_kab as kab, p.nama_prop as prop", true)
                ->from('sm_layanan_pendaftaran as lp')
                ->join('sm_pendaftaran as pd', 'pd.id = lp.id_pendaftaran')
                ->join('sm_pasien as p', 'p.id = pd.id_pasien')
                ->where('lp.id', $id, true)
                ->get()
                ->row();
            $data['detailPendaftaran']->kelamin == 'P' ? $data['detailPendaftaran']->kelamin = 'Perempuan' : $data['detailPendaftaran']->kelamin = 'Laki-laki';
            $this->load->model('medical_check_up/Medical_check_up_model', 'm_mcu');
            $surat_skkj_2 = $this->m_mcu->getSKKJdua($id);
            $data['skkj_2'] = $surat_skkj_2;
            $data['skkj_2_2'] = $surat_skkj_2;
            // var_dump($data['skkj_2'] );die;               
            $this->load->view('medical_check_up/printing/cetak_form_skkj_2', $data);
        }
    }

    // SKKJ3
    function cetak_form_skkj_3($id)
    {
        if ($id !== null) {
            $data['detailPendaftaran'] = $this->db->select("lp.*, pd.id_pasien, upper(p.nama) as nama_pasien, p.kelamin, p.alamat, p.no_rt as rt, p.no_rw as rw, p.no_rumah as norumah, p.nama_kec as kec, p.nama_kel as kel, p.nama_kab as kab, p.nama_prop as prop", true)
                ->from('sm_layanan_pendaftaran as lp')
                ->join('sm_pendaftaran as pd', 'pd.id = lp.id_pendaftaran')
                ->join('sm_pasien as p', 'p.id = pd.id_pasien')
                ->where('lp.id', $id, true)
                ->get()
                ->row();
            $data['detailPendaftaran']->kelamin == 'P' ? $data['detailPendaftaran']->kelamin = 'Perempuan' : $data['detailPendaftaran']->kelamin = 'Laki-laki';
            $this->load->model('medical_check_up/Medical_check_up_model', 'm_mcu');
            $surat_skkj_3 = $this->m_mcu->getSKKJtiga($id);
            $data['skkj_3'] = $surat_skkj_3;
            $data['skkj_3_3'] = $surat_skkj_3;
            // var_dump($data['skkj_3'] );die;               
            $this->load->view('medical_check_up/printing/cetak_form_skkj_3', $data);
        }
    }

     // SKB
    function cetak_kelaikan_bekerja($id_layanan_pendaftaran){
        if ($id_layanan_pendaftaran !== null) {
            $data['detailPendaftaran'] = $this->db->select("lp.*, pd.id_pasien, upper(p.nama) as nama_pasien, p.kelamin, p.alamat, p.no_rt as rt, p.no_rw as rw, p.no_rumah as norumah, p.nama_kec as kec, p.nama_kel as kel, p.nama_kab as kab, p.nama_prop as prop", true)
                ->from('sm_layanan_pendaftaran as lp')
                ->join('sm_pendaftaran as pd', 'pd.id = lp.id_pendaftaran')
                ->join('sm_pasien as p', 'p.id = pd.id_pasien')
                ->where('lp.id', $id_layanan_pendaftaran, true)
                ->get()
                ->row();
            $data['detailPendaftaran']->kelamin == 'P' ? $data['detailPendaftaran']->kelamin = 'Perempuan' : $data['detailPendaftaran']->kelamin = 'Laki-laki';   
            $this->load->model('medical_check_up/Medical_check_up_model', 'm_mcu');                      
            $kb = $this->m_mcu->getKelaikanBekerja($id_layanan_pendaftaran);
            $data ['kb'] = $kb;   
            // var_dump($data ['kb']);die;
            $this->load->view('medical_check_up/printing/cetak_kelaikan_bekerja', $data);
        }
    }

    // skb
    // function cetak_kelaikan_bekerja($id, $id_pendaftaran, $id_layanan_pendaftaran)
    // {
    //     // var_dump($id, $id_pendaftaran, $id_layanan_pendaftaran);die;
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

    //     $data['kb'] = $this->m_rm->getKbByID($id);
    //     // var_dump($data['kb']);die;

    //     $this->load->view('form_rekam_medis/printing/cetak_kelaikan_bekerja', $data);
    // }

    // lpk
    function cetak_laporan_pemeriksaan_kesehatan($id, $id_pendaftaran, $id_layanan_pendaftaran)
    {
        // var_dump($id);die;
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

        $data['lpk'] = $this->m_mcu->getLpkByID($id);
        // var_dump($data['lpk']);die;

        $this->load->view('medical_check_up/printing/cetak_lpk', $data);
    }

    // SKM
    function cetak_form_skm($id_layanan_pendaftaran)
    {
        if ($id_layanan_pendaftaran !== null) {
            $data['detailPendaftaran'] = $this->db->select("lp.*, pd.id_pasien, upper(p.nama) as nama_pasien, p.kelamin, p.alamat, p.no_rt as rt, p.no_rw as rw, p.no_rumah as norumah, p.nama_kec as kec, p.nama_kel as kel, p.nama_kab as kab, p.nama_prop as prop", true)
                ->from('sm_layanan_pendaftaran as lp')
                ->join('sm_pendaftaran as pd', 'pd.id = lp.id_pendaftaran')
                ->join('sm_pasien as p', 'p.id = pd.id_pasien')
                ->where('lp.id', $id_layanan_pendaftaran, true)
                ->get()
                ->row();
            $data['detailPendaftaran']->kelamin == 'P' ? $data['detailPendaftaran']->kelamin = 'Perempuan' : $data['detailPendaftaran']->kelamin = 'Laki-laki';
            $this->load->model('medical_check_up/Medical_check_up_model', 'm_mcu');
            $skm = $this->m_mcu->getSKM($id_layanan_pendaftaran);
            $data['skm'] = $skm;
            $data['anamnesa'] = $this->m_pelayanan->getAnamnesa($id_layanan_pendaftaran);
            $data['diagnosa'] = $this->m_pelayanan->getDiagnosaPemeriksaan($id_layanan_pendaftaran);
            // var_dump($data['skm']);die;     
            // var_dump($data);die;  
            // var_dump($data['diagnosa']);die;     
            $this->load->view('medical_check_up/printing/cetak_form_skm', $data);
        }
    }

    // SKD
    function cetak_surat_keterangan_disabilitas($id_layanan_pendaftaran)
    {
        if ($id_layanan_pendaftaran !== null) {
            $data['detailPendaftaran'] = $this->db->select("lp.*, pd.id_pasien, upper(p.nama) as nama_pasien, p.kelamin, p.alamat, p.no_rt as rt, p.no_rw as rw, p.no_rumah as norumah, p.nama_kec as kec, p.nama_kel as kel, p.nama_kab as kab, p.nama_prop as prop", true)
                ->from('sm_layanan_pendaftaran as lp')
                ->join('sm_pendaftaran as pd', 'pd.id = lp.id_pendaftaran')
                ->join('sm_pasien as p', 'p.id = pd.id_pasien')
                ->where('lp.id', $id_layanan_pendaftaran, true)
                ->get()
                ->row();
            $data['detailPendaftaran']->kelamin == 'P' ? $data['detailPendaftaran']->kelamin = 'Perempuan' : $data['detailPendaftaran']->kelamin = 'Laki-laki';
            $this->load->model('medical_check_up/Medical_check_up_model', 'm_mcu');
            $skd = $this->m_mcu->getSuratKeteranganDisabilitas($id_layanan_pendaftaran);
            $data['skd'] = $skd;
            $this->load->view('medical_check_up/printing/cetak_surat_keterangan_disabilitas', $data);
        }
    }

    // SKTD
    function cetak_surat_keterangan_tidak_disabilitas($id_layanan_pendaftaran)
    {
        if ($id_layanan_pendaftaran !== null) {
            $data['detailPendaftaran'] = $this->db->select("lp.*, pd.id_pasien, upper(p.nama) as nama_pasien, p.kelamin, p.alamat, p.no_rt as rt, p.no_rw as rw, p.no_rumah as norumah, p.nama_kec as kec, p.nama_kel as kel, p.nama_kab as kab, p.nama_prop as prop", true)
                ->from('sm_layanan_pendaftaran as lp')
                ->join('sm_pendaftaran as pd', 'pd.id = lp.id_pendaftaran')
                ->join('sm_pasien as p', 'p.id = pd.id_pasien')
                ->where('lp.id', $id_layanan_pendaftaran, true)
                ->get()
                ->row();
            $data['detailPendaftaran']->kelamin == 'P' ? $data['detailPendaftaran']->kelamin = 'Perempuan' : $data['detailPendaftaran']->kelamin = 'Laki-laki';
            $this->load->model('medical_check_up/Medical_check_up_model', 'm_mcu');
            $sktd = $this->m_mcu->getSuratKeteranganTidakDisabilitas($id_layanan_pendaftaran);
            $data['sktd'] = $sktd;
            $this->load->view('medical_check_up/printing/cetak_surat_keterangan_tidak_disabilitas', $data);
        }
    }

    // HPDO BARU
    // function cetak_hasil_pemeriksaan_dokter_okupasi($id_pendaftaran, $id_layanan_pendaftaran){
    //     if ($id_layanan_pendaftaran !== null) {
    //         $data= $this->klinik->getPendaftaranDetail($id_pendaftaran, $id_layanan_pendaftaran);
    //         $this->load->model('medical_check_up/Medical_check_up_model', 'm_mcu');                      
    //         $hpdo = $this->m_mcu->getHasilPemeriksaanDokterOkupasi($id_layanan_pendaftaran);
    //         $data ['hasil_okupasi'] = $hpdo; 
    //         $this->load->view('medical_check_up/printing/cetak_hasil_pemeriksaan_dokter_okupasi', $data);
    //     }
    // }

    // HPDO BARU w
    function cetak_hasil_pemeriksaan_dokter_okupasi($id_pendaftaran, $id_layanan_pendaftaran)
    {
        $this->load->library('pdf');
        $this->load->model('Hasil_pemeriksaan_mcu_model', 'm_hasil_mcu');

        $data_laboratorium  = [];
        $data_radiologi     = [];
        $data_okupasi       = '';
        $data_ekg           = '';

        // Ambil detail pendaftaran
        $data = $this->klinik->getPendaftaranDetail($id_pendaftaran, $id_layanan_pendaftaran);

        // Hasil Okupasi
        $hasil_okupasi = $this->db->get_where('sm_hasil_pemeriksaan_dokter_okupasih', array('id_layanan_pendaftaran' => $id_layanan_pendaftaran))->row();

        if (!empty($hasil_okupasi)) {
            $data_okupasi = $this->m_mcu->getHasilPemeriksaanDokterOkupasi($id_layanan_pendaftaran);
        }

        $data['hasil_okupasi']      = $data_okupasi;

        // Tangkap output HTML dari view
        ob_start();
        $this->load->view('medical_check_up/printing/cetak_hpdo_dompdf', $data);
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
        $file_name = 'Hasil_Pemeriksaan_Okupasi-' . $data['pasien']->id_pasien . '_' . $data['pasien']->nama . '.pdf';

        // Stream PDF ke browser
        $this->pdf->stream($file_name, ["Attachment" => false]);
    }
}
