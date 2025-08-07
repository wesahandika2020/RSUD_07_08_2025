<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Surat_ket_kontrol extends SYAM_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('App_model', 'default');
        $this->load->model('Masterdata_model', 'auto');
        $this->load->model('Surat_ket_kontrol_model', 'skd');
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

    function page_surat_ket_kontrol()
    {
        $data['layanan']             = $this->auto->getLayananRegistration(null);
        $data['jenis_tindak_lanjut'] = '';
        $this->load->view('index', $data);
    }

    function printing_surat_ket_kontrol()
    {

        $id = $this->input->get('id', true);
        $id_pendaftaran = $this->input->get('id_pendaftaran', true);
        $id_layanan_pendaftaran = $this->input->get('id_layanan_pendaftaran', true);
        $jenis = $this->input->get('jenis', true);

        if ($id === NULL | $id_pendaftaran === NULL | $id_layanan_pendaftaran === NULL) :
            exit;
        endif;

        if($jenis=='Surat Kontrol'){
            $data = $this->skd->getDataKetKontrol($id,$id_pendaftaran, $id_layanan_pendaftaran);
            $data['title']      = $jenis;
            $data['hospital']   = $this->default->getDataHospital();
            $this->load->view('printing/cetak_surat_kontrol', $data);
        } else {
            $data = $this->skd->getDataKetKontrolInternal($id,$id_pendaftaran, $id_layanan_pendaftaran);
            $data['title']      = $jenis;
            $data['hospital']   = $this->default->getDataHospital();
            $this->load->view('printing/cetak_surat_kontrol_internal', $data);
        }
        
    }
}
