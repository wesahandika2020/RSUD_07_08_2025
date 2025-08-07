<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tarif extends SYAM_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('App_model', 'default');
        $this->load->model('Masterdata_model', 'auto');
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

    function page_tarif()
    {
        $this->load->view('index');
    }

    function page_tarif_pelayanan()
    {
        $data['title'] = 'List Master Data Tarif Pelayanan';
        $data['kelas'] = $this->auto->getDataKelas();
        $data['bobot'] = $this->auto->getBobot();
        $data['jenis'] = $this->auto->getJenisPendaftaran();
        $this->load->view('tarif_pelayanan/index', $data);
    }

    function page_tarif_kamar_ranap()
    {
        $data['kelas'] = $this->auto->getDataKelas();
        $this->load->view('tarif_kamar_ranap/index', $data);
    }

    function page_tarif_kamar_operasi()
    {
        $data['kelas'] = $this->auto->getDataKelas();
        $data['kamaroperasi'] = $this->auto->getDataKamarOperasi();
        $this->load->view('tarif_kamar_operasi/index', $data);
    }

    function page_tarif_perbekalan_kesehatan()
    {
        $data['kelas'] = $this->auto->getDataKelas();
        $data['list_pkrt'] = $this->auto->getDataPKRT();
        $this->load->view('tarif_perbekalan_kesehatan/index', $data);
    }

    
}
