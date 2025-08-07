<?php

defined('BASEPATH') or exit('No direct script access allowed');


class Pemeriksaan_igd extends SYAM_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('App_model', 'default');
        $this->load->model('Masterdata_model', 'auto');
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

    function page_pemeriksaan_igd()
    {
        $this->load->model('pelayanan/Pelayanan_model', 'pelayanan');
        $data['kelas_tindakan']      = '1';
        $data['jenis_tindakan']      = 'Rawat Jalan';
        $data['jenis_tindak_lanjut'] = '';
        $data['kelas']               = $this->auto->getDataKelas();
        $data['profesi']             = $this->auto->getProfesi();
        $data['kondisi_keluar']      = $this->auto->getKondisiKeluar();
        $data['tindak_lanjut']       = $this->pelayanan->getTindakLanjut();
        $data['layanan']             = $this->auto->getJenisIGD();

        $accountGroup = $this->session->userdata('account_group');
        if ($accountGroup == 'Maternal dan Neotanal') {
            $data['layanan'] = [
                "Kamar Bersalin" => "Kamar Bersalin",
                "Kamar Bersalin (Rawat Gabung bayi)" => "Kamar Bersalin (Rawat Gabung bayi)",
                "Ponek" => "Ponek",
            ];
        }
        
        $data['klinik']              = '';
        $klinik = $this->auto->getSpesialisasi($this->session->userdata('id_spesialis'));
        if (0 < count((array)$klinik)) :
            $data['klinik'] = $klinik->nama;
        endif;

        $data['jenis']              = 'IGD';
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
}
