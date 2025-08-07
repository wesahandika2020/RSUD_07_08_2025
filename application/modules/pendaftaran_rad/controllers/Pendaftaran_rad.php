<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pendaftaran_rad extends SYAM_Controller
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

    function page_pendaftaran_rad()
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

    function cetak_bukti_kunjungan_rad($id_pendaftaran)
    {
        if ($id_pendaftaran !== null) :
            $data['title'] = 'BUKTI KUNJUNGAN';
            $data['hospital'] = $this->default->getDataHospital();

            $pendaftaran = $this->klinik->getPendaftaranDetail($id_pendaftaran);
            if (count((array) $pendaftaran['pasien']) < 1) :
                die();
            endif;
            // echo json_encode($pendaftaran); die;
            $data['pasien'] = $pendaftaran['pasien'];
            $data['pelayanan'] = $pendaftaran['layanan'][0];
            // echo json_encode($data); die;
            $this->load->view('pendaftaran_rad/printing/bukti_kunjungan_rad', $data);
        endif;
    }

    function generate_qrcode($isi_code)
    {
        $this->load->library('ciqrcode');
        QRcode::png($isi_code, $outfile = false, $level = QR_ECLEVEL_H, $size = 4);
        // $this->ciqrcode->generate($isi_code);
    }

    function cetak_label_berkas($id, $id_pasien = NULL, $id_layanan_pendaftaran, $size = '1', $format = 'print')
    {

        $data['title'] = 'Label Berkas Pasien';
        $data['size'] = $size;
        if ($id_pasien != NULL) :
        $data['layanan'] = $this->klinik->getPendaftaranDetail($id, $id_layanan_pendaftaran);
           if (0 < count((array)$data['layanan'])) :
               switch ($format) {
                   case 'print':
                        $this->load->view('printing/label_rekam_medik', $data);
                        break;
                    case 'json':
                        exit(json_encode($data));
                    default:
                        $this->load->view('printing/label_rekam_medik', $data);
                        break;
               }
           endif;
       endif;
    }

    function cetak_kartu_pasien_rad($id_pendaftaran)
    {
        if ($id_pendaftaran !== null) :
            $data['title'] = 'KARTU PASIEN';
            $data['hospital'] = $this->default->getDataHospital();
            $pendaftaran = $this->klinik->getPendaftaranDetail($id_pendaftaran);
            if (count((array) $pendaftaran['pasien']) < 1) :
                die();
            endif;
            // echo json_encode($pendaftaran); die;
            $data['pasien'] = $pendaftaran['pasien'];

            // echo json_encode($data); die;
            $this->load->view('pendaftaran_rad/printing/kartu_pasien_rad', $data);
        endif;
    }    
}