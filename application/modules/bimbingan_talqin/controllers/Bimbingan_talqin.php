<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bimbingan_talqin extends SYAM_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('App_model', 'm_default');
        $this->load->model('Masterdata_model', 'm_masterdata');
        $this->load->model('Bimbingan_talqin_model', 'm_bimbingan_talqin');
        $this->load->model('pendaftaran/Pendaftaran_model', 'klinik');
    }

    function index()
    {
        $data['active'] = 'Pelayanan';
        $data['modules'] = $this->m_default->getDataModules($this->session->userdata('id_account_group'));
        $is_login = $this->session->userdata('is_login');

        if ($is_login === true) :
            $data['hospital'] = $this->m_default->getDataHospital();
            $this->load->view('layouts/index', $data);

        else :
            redirect('/');

        endif;
    }

    function page_bimbingan_talqin()
    {
        $this->load->view('bimbingan_talqin/index');
    }

    function page_permintaan_talqin()
    {
        $this->load->view('bimbingan_talqin/permintaan_talqin/index');
    }
    
    function page_data_talqin()
    {
        $data['kelas_tindakan'] = '1';
        $data['jenis_tindakan'] = '';
        $this->load->view('bimbingan_talqin/talqin/index', $data);
	}

    function cetak_form_talqin($id)
    {
        
        if (!$id) :
            exit();
        endif; 
        
        $layananPendaftaran = $this->db->where('id', $id)->get('sm_layanan_pendaftaran')->row();
        
        $pendaftaran = $this->klinik->getPendaftaranDetail($layananPendaftaran->id_pendaftaran, $id);
        
        if (count((array) $pendaftaran['pasien']) < 1) :
            die();
        endif;

        $data['layanan'] = $pendaftaran['layanan'];
        
        $data['pasien'] = $pendaftaran['pasien'];
        
        $data['pasien']->kelamin == 'P' ? $data['pasien']->kelamin = 'Perempuan' : $data['pasien']->kelamin = 'Laki-laki';

        $bimbinganTalqin = $this->m_bimbingan_talqin->getFormTalqin($id);
        $data['bimbingan_talqin'] = $bimbinganTalqin;
                

        $this->load->view('bimbingan_talqin/printing/cetak_form_talqin', $data);
    }

   
}
        