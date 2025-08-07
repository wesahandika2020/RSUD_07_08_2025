<?php

defined('BASEPATH') or exit('No direct script access allowed');


class Gizi extends SYAM_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('App_model', 'default');
        $this->load->model('Masterdata_model', 'auto');
        $this->load->model('Gizi_model', 'gizi');
        $this->load->model('pendaftaran/Pendaftaran_model', 'klinik');
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

    function page_permintaan_makanan_pasien()
    {
        $data['group'] = $this->session->userdata('account_group');
        $data['bangsal'] = $this->auto->getDataDropdownBangsal();
        $data['profesi'] = $this->gizi->getProfesiGizi();
        $data['dpmp_diet'] = $this->gizi->getTipeDiet();
        $data['kode_diet'] = $this->gizi->getKodeDiet();
        $data['mkn_pasien'] = $this->gizi->getMakanPasien();
        $data['pilih_diet'] = $this->gizi->getPilihDiet();
        $data['btk_mkn'] = $this->gizi->getBentukMakanan();
        $data['jns_diet'] = $this->gizi->getJenisDiet();
        $data['diet'] = $this->gizi->getDiet();
        $data['ruangan_diet'] = $this->gizi->getRuanganDiet();
        $data['status_pasien'] = array('Semua' => 'Semua', 'Sudah' => 'Sudah', 'Belum' => 'Belum');
        $this->load->view('index', $data);
    }

    function cetak_etiket($JSON = NULL)
    {
        $tanggal_awal = $this->input->get('tanggal_awal', true);
        $tanggal_akhir = $this->input->get('tanggal_akhir', true);
        $no_rm = $this->input->get('no_rm', true);
        $nama = $this->input->get('nama', true);
        $diet = $this->input->get('diet', true);
        $jam = $this->input->get('jam', true);
        $ruangan_diet = $this->input->get('ruangan_diet', true);

        $ubah_tanggal_awal = '';
        $ubah_tanggal_akhir = '';

        if ($tanggal_awal !== '') {
            $ubah_tanggal_awal = $tanggal_awal;
        }

        if ($tanggal_akhir !== '') {
            $ubah_tanggal_akhir = $tanggal_akhir;
        }

        if ($diet !== null) {
            $data['diet'] = $diet;
        }

        if ($jam !== null) {
            $data['jam'] = $jam;
        }

        if ($ruangan_diet !== null) {
            $data['ruangan_diet'] = $ruangan_diet;
        }

        $data['title'] = 'INSTALASI GIZI';
        $data['etiket'] = $this->gizi->cetak_etiket($ubah_tanggal_awal, $ubah_tanggal_akhir, $no_rm, $nama, $ruangan_diet, $diet);
        $data['hospital'] = $this->default->getDataHospital();
        // var_dump($data['etiket']);die;

        $this->load->view('gizi/cetak/cetak_etiket', $data);
    }

    function cetak_konsultasi_gizi($id_kg, $id_pendaftaran, $id_layanan, $type =null)
    {
        if (!$id_kg) {
            exit();
        }

        $pendaftaran = $this->klinik->getPendaftaranDetail($id_pendaftaran, $id_layanan);
        if (count((array) $pendaftaran['pasien']) < 1) {
            die();
        }
        $data['layanan'] = $pendaftaran['layanan'];
        $data['pasien'] = $pendaftaran['pasien'];
        $data['pasien']->kelamin == 'P' ? $data['pasien']->kelamin = 'Perempuan' : $data['pasien']->kelamin = 'Laki-laki';
        $data['konsultasi_gizi'] = $this->gizi->getKonsulGiziByID($id_kg);
        // var_dump($data['konsultasi_gizi']);die;

        if ($type !== 'data') {
            $this->load->view('gizi/printing/konsultasi_gizi', $data);
        } else {
            return $data;
        }
    }

    function data_konsultasi_gizi($id_pendaftaran)
    {
        $query = $this->db->get_where('sm_konsultasi_gizi', ['id_pendaftaran' => $id_pendaftaran])->result();

        return $query;
    }

    function cetak_etiket_2($JSON = NULL)
    {
        $data['diet'] = $this->gizi->getDiet();
        $data['ruangan_diet'] = $this->gizi->getRuanganDiet();

        $tanggal_awal_2 = $this->input->get('tanggal_awal_2', true);
        $tanggal_akhir_2 = $this->input->get('tanggal_akhir_2', true);
        $no_rm_2 = $this->input->get('no_rm_2', true);
        $nama_2 = $this->input->get('nama_2', true);
        $diet_cetak_2 = $this->input->get('diet_cetak_2', true);
        $jam_cetak_2 = $this->input->get('jam_cetak_2', true);
        $ruangan_diet_2 = $this->input->get('ruangan_diet_2', true);

        $ubah_tanggal_awal_2 = '';
        $ubah_tanggal_akhir = '';

        if ($tanggal_awal_2 !== '') {
            $ubah_tanggal_awal_2 = $tanggal_awal_2;
        }

        if ($tanggal_akhir_2 !== '') {
            $ubah_tanggal_akhir_2 = $tanggal_akhir_2;
        }

        if ($diet_cetak_2 !== null) {
            $data['diet'] = $diet_cetak_2;
        }

        if ($diet_cetak_2 !== 'Diet Cair') {
            if ($jam_cetak_2 !== null) {
                $data['jam'] = $jam_cetak_2;
            }
        } else {
            $jam_cetak_2 = null;
        }

        if ($jam_cetak_2 !== null) {
            $data['jam_cetak_2'] = $jam_cetak_2;
        }

        if ($ruangan_diet_2 !== null) {
            $data['ruangan_diet'] = $ruangan_diet_2;
        }


        $data['title'] = 'INSTALASI GIZI';
        $data['etiket'] = $this->gizi->cetak_etiket_2($ubah_tanggal_awal_2, $ubah_tanggal_akhir_2, $no_rm_2, $nama_2, $diet_cetak_2, $jam_cetak_2, $ruangan_diet_2);
        $data['hospital'] = $this->default->getDataHospital();

        $this->load->view('gizi/cetak/cetak_etiket_2', $data);
    }

    function cetak_dietetik($id, $id_pendaftaran, $id_layanan_pendaftaran, $type = null)
    {

        if (!$id) {
            exit();
        }

        $pendaftaran = $this->klinik->getPendaftaranDetail($id_pendaftaran, $id_layanan_pendaftaran);
        if (count((array) $pendaftaran['pasien']) < 1) {
            die();
        }
        $data['layanan'] = $pendaftaran['layanan'];
        $data['pasien'] = $pendaftaran['pasien'];
        $data['pasien']->kelamin == 'P' ? $data['pasien']->kelamin = 'Perempuan' : $data['pasien']->kelamin = 'Laki-laki';
        $data['gd'] = $this->gizi->getGdByID($id);
        // var_dump($data['gd']);die;

        if ($type !== 'data') {
            $this->load->view('form_rekam_medis/printing/cetak_dietetik', $data);
        } else {
            return $data;
        }
    }

    function data_cetak_dietetik($id_pendaftaran)
    {
        $query = $this->db->get_where('sm_gizi_dietetik', ['id_pendaftaran' => $id_pendaftaran])->result();

        return $query;
    }

    function cetak_diet_anak($id, $id_pendaftaran, $id_layanan_pendaftaran, $bed, $type = null)
    {
        if (!$id) {
            exit();
        }

        $pendaftaran = $this->klinik->getPendaftaranDetail($id_pendaftaran, $id_layanan_pendaftaran);
        if (count((array) $pendaftaran['pasien']) < 1) {
            die();
        }
        $data['layanan'] = $pendaftaran['layanan'];
        $data['pasien'] = $pendaftaran['pasien'];
        $data['pasien']->kelamin == 'P' ? $data['pasien']->kelamin = 'Perempuan' : $data['pasien']->kelamin = 'Laki-laki';
        $data['ga'] = $this->gizi->getGaByID($id);
        $data['bed'] = $bed;
        // var_dump($data['ga']);die;

        if ($type !== 'data') {
            $this->load->view('form_rekam_medis/printing/cetak_diet_anak', $data);
        } else {
            return $data;
        }
    }

    function data_diet_anak($id_pendaftaran)
    {
        $query = $this->db->get_where('sm_gizi_anak', ['id_pendaftaran' => $id_pendaftaran])->result();

        return $query;
    }
}
