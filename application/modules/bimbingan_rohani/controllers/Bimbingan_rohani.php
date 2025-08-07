<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bimbingan_rohani extends SYAM_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('App_model', 'm_default');
        $this->load->model('Masterdata_model', 'm_masterdata');
        $this->load->model('Bimbingan_rohani_model', 'm_bimbingan_rohani');
        $this->load->model('pendaftaran/Pendaftaran_model', 'klinik');
        $this->load->model('Masterdata_model', 'auto');
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

    function page_bimbingan_rohani()
    {
        $this->load->view('bimbingan_rohani/index');
        
	}

    function page_permintaan_bimroh()
    {          
        $data['layanan']             = $this->auto->getJenisBimroh();
        $this->load->view('bimbingan_rohani/permintaan_bimroh/index', $data);
    }
    
    function page_data_bimroh()
    {           
        $data['layanan']            = $this->auto->getJenisBimroh();
        $data['kelas_tindakan']     = '1';
        $data['jenis_tindakan']     = '';
        $this->load->view('bimbingan_rohani/bimroh/index', $data);
	}

    function cetak_form_bimroh_pasien_baru($id)
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

        $bimbinganRohaniBaru = $this->m_bimbingan_rohani->getFormBimrohPasienBaru($id);
        $data['bimbingan_rohani_baru'] = $bimbinganRohaniBaru;
                

        $this->load->view('bimbingan_rohani/printing/cetak_form_bimroh_pasien_baru', $data);
    }

    function cetak_form_bimroh_pasien_khusus($id)
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

        $bimbinganRohaniKhusus = $this->m_bimbingan_rohani->getFormBimrohPasienKhusus($id);
        $data['bimbingan_rohani_khusus'] = $bimbinganRohaniKhusus;
                

        $this->load->view('bimbingan_rohani/printing/cetak_form_bimroh_pasien_khusus', $data);
    }

    
}