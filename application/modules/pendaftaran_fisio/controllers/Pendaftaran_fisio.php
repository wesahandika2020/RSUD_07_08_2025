<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pendaftaran_fisio extends SYAM_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('App_model', 'default');
        $this->load->model('Masterdata_model', 'auto');
        $this->load->model('opendata/Opendata_model', 'opendata');
        $this->load->model('pendaftaran/Pendaftaran_model', 'klinik');
    }

    function index()
    {
        $data['active'] = 'Pendaftaran';
        $data['modules'] = $this->default->getDataModules($this->session->userdata('id_account_group'));
        $is_login = $this->session->userdata('is_login');

        if ($is_login === true) :
            $data['hospital'] = $this->default->getDataHospital();
            $this->load->view('layouts/index', $data);
        else :
            redirect('/');
        endif;
    }

    function page_pendaftaran_fisio()
    {
        $this->load->model('pelayanan/Pelayanan_model', 'pelayanan');
		$data['jenis_pelayanan']     = '2';
		$data['kelas_tindakan']      = '1';
        $data['jenis_tindakan']      = 'Rawat Jalan';
        $data['jenis_tindak_lanjut'] = '';
        $data['agama']               = $this->auto->getAgama();
        $data['etnis']               = $this->auto->getEtnis();
        $data['kelamin']             = $this->auto->getKelamin();
        $data['domisili']            = $this->auto->getDomisili();
        $data['cara_bayar']          = $this->auto->getCaraBayar();
        $data['asal_masuk']          = $this->auto->getAsalMasuk();
        $data['kunjungan']           = $this->auto->getKunjungan();
        $data['pekerjaan']           = $this->auto->getPekerjaan();
        $data['pendidikan']          = $this->auto->getPendidikan();
        $data['statuspasien']        = $this->auto->getStatusPasien();
        $data['goldarah']            = $this->auto->getGolonganDarah();
        $data['pernikahan']          = $this->auto->getStatusPernikahan();
        $data['hamkom']              = $this->auto->getHambatanKomunikasi();
        $data['layanan']             = $this->auto->getLayananRegistration(null);
        $data['kondisi_keluar']      = $this->auto->getKondisiKeluar();
        $data['tindak_lanjut']       = $this->pelayanan->getTindakLanjut();
        $data['jenis_igd']           = $this->auto->getJenisIGD();
        $this->load->model('panggil_pasien/Panggil_pasien_model', 'call');
        $data['filter_advance']  = $this->call->getFilterLoket();
        $this->load->view('index', $data);
	}
}