<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rekonsiliasi_obat extends SYAM_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('App_model', 'default');
        $this->load->model('Rekonsiliasi_obat_model', 'rekonsiliasi');
        $this->load->model('pendaftaran/Pendaftaran_model', 'pendaftaran');
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

    function page_rekonsiliasi_obat()
    {   

        $data['kriteria_alergi'] = $this->rekonsiliasi->getKriteriaAlergi();
        $this->load->view('index', $data);
    }

    function cetak_rekonsiliasi() {

        $idPendaftaran = $this->input->get('id', true);
        $idLayananPendaftaran = $this->input->get('id_layanan', true);
        
        $pendaftaran = $this->pendaftaran->getPendaftaranDetail((int)$idPendaftaran, (int)$idLayananPendaftaran);

        if (count((array) $pendaftaran['pasien']) < 1) :
            die();
        endif;

        $search = [
            'tgl_awal'       => safe_get('tgl_rekon_awal'),
            'tgl_akhir'    => safe_get('tgl_rekon_akhir'),
        ];

        $data['pasien'] = $pendaftaran['pasien'];
        $data['layanan'] = $pendaftaran['layanan'];
        $data['pasien']->kelamin == 'P' ? $data['pasien']->kelamin = 'Perempuan' : $data['pasien']->kelamin = 'Laki-laki';
        $data['pernah_alergi'] = $this->rekonsiliasi->ambilDataPernahAlergi((int)$idPendaftaran);
        $data['riwayat_alergi'] = $this->rekonsiliasi->getRiwayatAlergi((int)$idPendaftaran);
        $data['resep'] = $this->rekonsiliasi->ambilDataResep((int)$idLayananPendaftaran, $search);
        $data['apoteker'] = $this->rekonsiliasi->ambilUserApoteker((int)$idLayananPendaftaran);

        
        // $data['pasien'] = $this->m_pendaftaran->getPendaftaranDetail($id_pendaftaran, $id_layanan_pendaftaran);
        $data['hospital'] = $this->default->getDataHospital();
        
        $this->load->view('printing/cetak_rekonsiliasi', $data);
    }
	
	function cetak_rekonsiliasi_view_all() {
        $idPendaftaran = $this->input->get('id', true);
        $data_layanan = $this->db->query("SELECT id FROM sm_layanan_pendaftaran WHERE id_pendaftaran=$idPendaftaran")->result();
    
        $data_all = [];    
        foreach ($data_layanan as $i => $val) {
            $idLayananPendaftaran = $val->id;
    
            $pendaftaran = $this->pendaftaran->getPendaftaranDetail((int)$idPendaftaran, (int)$idLayananPendaftaran);
    
            if (count((array)$pendaftaran['pasien']) < 1) {
                continue;
            }
    
            $search = [
                'tgl_awal'     => safe_get('tgl_rekon_awal'),
                'tgl_akhir'    => safe_get('tgl_rekon_akhir'),
            ];
    
            $data = [];
            $data['pasien']          = $pendaftaran['pasien'];
            $data['layanan']         = $pendaftaran['layanan'];
            $data['pasien']->kelamin = $data['pasien']->kelamin == 'P' ? 'Perempuan' : 'Laki-laki';
            $data['pernah_alergi']   = $this->rekonsiliasi->ambilDataPernahAlergi((int)$idPendaftaran);
            $data['riwayat_alergi']  = $this->rekonsiliasi->getRiwayatAlergi((int)$idPendaftaran);
            $data['resep']           = $this->rekonsiliasi->ambilDataResep((int)$idLayananPendaftaran, $search);
            $data['apoteker']        = $this->rekonsiliasi->ambilUserApoteker((int)$idLayananPendaftaran);
            $data['hospital']        = $this->default->getDataHospital();    
            $data_all[] = $data;
        }    
        $this->load->view('printing/cetak_rekonsiliasi_view_all',  ['data_all' => $data_all]);
    }

}
