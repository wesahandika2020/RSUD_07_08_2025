<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Status_keluar_pasien extends SYAM_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('App_model', 'default');
        $this->load->model('Masterdata_model', 'm_masterdata');
        $this->load->model('pelayanan/Pelayanan_model', 'pelayanan');
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

    function page_status_keluar_pasien()
    {
        $data['cara_bayar']         = $this->m_masterdata->getCaraBayar(true);
        $data['jenis_layanan']      = $this->getJenisLayanan();
        $data['filter']             = $this->getFilter();
        $data['jenis_tindak_lanjut']= '';
        $data['tindak_lanjut']      = $this->getTindakLanjutAid();
        $data['jenis']              = '';
        $data['jenis_igd']          = $this->m_masterdata->getJenisIGD();
        $data['kondisi_keluar']     = $this->m_masterdata->getKondisiKeluar();
        $this->load->view('index', $data);
    }

    function getFilter()
    {
        return array(
            "belum" => "Belum Keluar",
            "sudah" => "Sudah Keluar",
            "cco"   => "Cancel Check Out"
        );
    }

    function getJenisLayanan()
    {
        return array(
            "rawat_jalan" => "Rawat Jalan",
            "rawat_inap"  => "Rawat Inap",
            "penunjang"   => "Penunjang",
            "ipj"         => "Pemulasaran Jenazah"
        );
    }

    function getTindakLanjutAid()
    {
        return array(
            "Atas Izin Dokter"    => "Atas Izin Dokter"
        );
    }
}
