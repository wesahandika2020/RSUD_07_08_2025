<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembayaran_penunjang extends SYAM_Controller 
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('App_model', 'default');
        $this->load->model('Masterdata_model', 'm_masterdata');
        $this->load->model('keuangan/Keuangan_model', 'm_keuangan');
    }

    function index()
    {
        $data['active'] = 'Keuangan';
        $data['modules'] = $this->default->getDataModules($this->session->userdata('id_account_group'));
        $is_login = $this->session->userdata('is_login');

        if ($is_login === true) :
            $data['hospital'] = $this->default->getDataHospital();
            $this->load->view('layouts/index', $data);

        else :
            redirect('/');

        endif;
    }

    function page_pembayaran_penunjang()
    {
        $data["transaksi"] = $this->m_keuangan->getTransaksi();
        $data["metode_pembayaran"] = $this->m_keuangan->getMetodePembayaran();
        $data["transaksi"]["Barang"] = "Resep";
        $data['unit_kasir'] = $this->m_masterdata->getUnitKasir();
        $data['layanan'] = 'Penunjang';
        $this->load->view('index',$data);
    }
}