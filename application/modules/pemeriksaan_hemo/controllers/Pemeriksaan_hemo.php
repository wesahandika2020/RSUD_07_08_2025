<?php

defined('BASEPATH') or exit('No direct script access allowed');


class Pemeriksaan_hemo extends SYAM_Controller
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

    function page_pemeriksaan_hemo()
    {
        $this->load->model('pelayanan/Pelayanan_model', 'pelayanan');
        $data['kelas_tindakan']      = '1';
        $data['jenis_tindakan']      = 'Rawat Jalan';
        $data['jenis_tindak_lanjut'] = '';
        $data['kelas']               = $this->auto->getDataKelas();
        $data['profesi']             = $this->auto->getProfesi();
        $data['kondisi_keluar']      = $this->auto->getKondisiKeluar();
        $data['tindak_lanjut']       = $this->pelayanan->getTindakLanjut();
        unset($data["tindak_lanjut"]["Klinik Lain"]);
        $data['layanan']             = $this->auto->getJenisIGD();
        $data['jenis']              = 'Hemodialisa';
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

    function printing_asuhan_keperawatan()
    {
        $id_asuhan_keperawatan = $this->input->get('id_asuhan_keperawatan', true);
        $id_pendaftaran = $this->input->get('id_pendaftaran', true);
        $id_layanan_pendaftaran = $this->input->get('id_layanan_pendaftaran', true);

        if (!$id_asuhan_keperawatan | !$id_pendaftaran | !$id_layanan_pendaftaran) :
            exit();
        endif;

        $this->load->model('pendaftaran/Pendaftaran_model', 'm_pendaftaran');
        $this->load->model('Pemeriksaan_hemo_model', 'm_pemeriksaan_hemo');
        $data = $this->m_pendaftaran->getPendaftaranDetail($id_pendaftaran, $id_layanan_pendaftaran);
        $data['hospital'] = $this->default->getDataHospital();
        $data['asuhan_keperawatan'] = $this->m_pemeriksaan_hemo->getAsuhanKeperawatanById($id_asuhan_keperawatan);
        
        // echo json_encode($data); die;
        $this->load->view('pemeriksaan_hemo/printing/cetak_asuhan_keperawatan_hd', $data);
    }

    function data_printing_asuhan_keperawatan($id_asuhan_keperawatan, $id_pendaftaran, $id_layanan_pendaftaran)
    {
        if (!$id_asuhan_keperawatan | !$id_pendaftaran | !$id_layanan_pendaftaran) :
            exit();
        endif;

        $this->load->model('pendaftaran/Pendaftaran_model', 'm_pendaftaran');
        $this->load->model('Pemeriksaan_hemo_model', 'm_pemeriksaan_hemo');
        $data = $this->m_pendaftaran->getPendaftaranDetail($id_pendaftaran, $id_layanan_pendaftaran);
        $data['hospital'] = $this->default->getDataHospital();
        $data['asuhan_keperawatan'] = $this->m_pemeriksaan_hemo->getAsuhanKeperawatanById($id_asuhan_keperawatan);

        return $data;
    }

    function getDataAsuhanHD($id_pendaftaran)
    {
        $this->db->select('akhd.*');
        $this->db->from('sm_asuhan_keperawatan_hd as akhd');
        $this->db->join('sm_layanan_pendaftaran as lp', 'akhd.id_layanan_pendaftaran = lp.id');
        $this->db->where('lp.id_pendaftaran', $id_pendaftaran);
        $query = $this->db->get();

        return $query->result();
    }

    function printing_laporan_hemodialisa()
    {
        $id_laporan_hd = $this->input->get('id_laporan_hd', true);
        $id_pendaftaran = $this->input->get('id_pendaftaran', true);
        $id_layanan_pendaftaran = $this->input->get('id_layanan_pendaftaran', true);

        if (!$id_laporan_hd | !$id_pendaftaran | !$id_layanan_pendaftaran) :
            exit();
        endif;

        $this->load->model('pendaftaran/Pendaftaran_model', 'm_pendaftaran');
        $this->load->model('Pemeriksaan_hemo_model', 'm_pemeriksaan_hemo');
        $data = $this->m_pendaftaran->getPendaftaranDetail($id_pendaftaran, $id_layanan_pendaftaran);
        $data['hospital'] = $this->default->getDataHospital();
        $data['laporan_hd'] = $this->m_pemeriksaan_hemo->getLaporanHDById($id_laporan_hd);
        
        // echo json_encode($data); die;
        $this->load->view('pemeriksaan_hemo/printing/cetak_laporan_hemodialisa', $data);
    }

    function data_printing_laporan_hemodialisa($id_laporan_hd, $id_pendaftaran, $id_layanan_pendaftaran)
    {
        if (!$id_laporan_hd | !$id_pendaftaran | !$id_layanan_pendaftaran) :
            exit();
        endif;

        $this->load->model('pendaftaran/Pendaftaran_model', 'm_pendaftaran');
        $this->load->model('Pemeriksaan_hemo_model', 'm_pemeriksaan_hemo');
        $data = $this->m_pendaftaran->getPendaftaranDetail($id_pendaftaran, $id_layanan_pendaftaran);
        $data['hospital'] = $this->default->getDataHospital();
        $data['laporan_hd'] = $this->m_pemeriksaan_hemo->getLaporanHDById($id_laporan_hd);

        // echo json_encode($data); die;
        return $data;
    }
}
