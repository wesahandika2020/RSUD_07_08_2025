<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembayaran_lain extends SYAM_Controller 
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('App_model', 'm_default');
        $this->load->model('Masterdata_model', 'm_masterdata');
        $this->load->model('Pembayaran_lain_model', 'm_pembayaran_lain');
		$this->load->model('keuangan/Keuangan_model', 'm_keuangan');
    }

    function index()
    {
        $data['active'] = 'Keuangan';
        $data['modules'] = $this->m_default->getDataModules($this->session->userdata('id_account_group'));
        $is_login = $this->session->userdata('is_login');

        if ($is_login === true) :
            $data['hospital'] = $this->m_default->getDataHospital();
            $this->load->view('layouts/index', $data);

        else :
            redirect('/');

        endif;
    }

    function page_pembayaran_lain()
    {
		$data['satuan'] = $this->m_masterdata->getOpsiSatuan('Keuangan', true);
		$data['unit_kasir'] = $this->m_masterdata->getUnitKasir();
        $data["metode_pembayaran"] = $this->m_keuangan->getMetodePembayaran();
        
        $this->load->view('index', $data);
    }

    function printing_kwitansi_pembayaran_lain($id, $noRegistrasi, $noRM)
    {
        if ($id !== NULL | $id !== '') :
            $data['title'] = 'Kwitansi Pembayaran Lain';
            $data['hospital'] = $this->m_default->getDataHospital();
            $data_pembayaran_lain = $this->m_pembayaran_lain->getDataPembayaranLain($id);
            $data['data'] = $data_pembayaran_lain;
            $data['data']->no_registrasi = $noRegistrasi;
            $data['data']->no_rm = $noRM;
            $data['jenis_kwitansi'] = 'Pembayaran Lain - Lain';
            $data['petugas_kasir'] = $this->session->userdata('nama');
            if (isset($_GET['tanggal']) && $this->input->get('tanggal', true) !== '') :
                $data['waktu'] = indo_time($this->input->get('tanggal', true) . ' ' . date('H:i:s'));
            else :
                $data['waktu'] = indo_time($data_pembayaran_lain->waktu, true);
            endif;
            $data['action'] = 'Pemeriksaan';
            $this->load->view('printing/cetak_kwitansi_pembayaran_lain', $data);
        endif;
    }
}