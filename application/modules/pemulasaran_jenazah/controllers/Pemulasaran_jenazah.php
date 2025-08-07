<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pemulasaran_jenazah extends SYAM_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('App_model', 'default');
        $this->load->model('Masterdata_model', 'auto');
        $this->load->model('pelayanan/Pelayanan_model', 'pelayanan');
        $this->load->model('Pemulasaran_jenazah_model', 'm_pemulasaran_jenazah');
        $this->load->model('pendaftaran/Pendaftaran_model', 'klinik');
        $this->load->model('pendaftaran/Pendaftaran_model', 'm_pendaftaran');


    }

    function index()
    {
        $data['active'] = 'Pelayanan';
        $data['modules'] = $this->default->getDataModules($this->session->userdata('id_account_group'));
        $is_login = $this->session->userdata('is_login');

        if ($is_login === true) :
            $data['hospital'] = $this->default->getDataHospital();
            $this->load->view('layouts/index', $data);
        else :
            redirect('/');
        endif;
    }

    function page_pemulasaran_jenazah()
    {
        $this->load->model('pelayanan/Pelayanan_model', 'pelayanan');
        $data['kelas_tindakan']         = '1';
        $data['jenis_tindakan']         = '';
        $data['jenis_tindak_lanjut']    = 'Pemulasaran Jenazah';
        $data['fullname']               = $this->session->userdata('nama');        
        $data['group']                  = $this->session->userdata('account_group');
        $data['kelas']                  = $this->auto->getDataKelas();
        $data['profesi']                = $this->auto->getProfesi();
        $data['kondisi_keluar']         = $this->auto->getKondisiKeluar();
        $data['tindak_lanjut']          = $this->pelayanan->getTindakLanjut();
        $data['jenis_igd']              = $this->auto->getJenisIGD();
        $data['jenis']                  = 'Pemulasaraan Jenazah';
        $data['hospital']               = $this->default->getDataHospital();
        $data['status_pemeriksaan']     = $this->auto->getStatusPemeriksaan(true);

        $this->load->view('index', $data);
    }  

    function printing_laporan_ipj()
    {        
        $id_pemulasaran_jenazah = $this->input->get('id_pemulasaran_jenazah', true);
       
        
        if (!$id_pemulasaran_jenazah) :
            exit();
        endif;

        $this->load->model('pelayan/Pelayanan_model', 'm_pelayanan');

        
        $data['hospital']               = $this->default->getDataHospital();
        $data['pemulasaran_jenazah']    = $this->m_pemulasaran_jenazah->getFormIPJById($id_pemulasaran_jenazah);
        $data['asal_ruangan']           = $this->m_pelayanan->getAsalRuangan($data['pemulasaran_jenazah']->id_pendaftaran);
        $data['diagnosa']               = $this->m_pelayanan->getDiagnosaPemeriksaanUntukPemulasaran($data['pemulasaran_jenazah']->id_pendaftaran);        

        // var_dump($data['diagnosa']);exit(1);
        $this->load->view('pemulasaran_jenazah/printing/cetak_laporan_ipj', $data);
    }

    function printing_transportasi_pribadi()
    {
        
        $id_layanan_pendaftaran = $this->input->get('id_layanan_pendaftaran', true);
       

        if (!$id_layanan_pendaftaran) :
            exit();
        endif;

        $data['hospital'] = $this->default->getDataHospital();
        $data['pemulasaran_jenazah'] = $this->m_pemulasaran_jenazah->getFormIPJByIdLayananPendaftaran($id_layanan_pendaftaran);
        
        $this->load->view('pemulasaran_jenazah/printing/cetak_transportasi_pribadi', $data);
    }


}
