<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pembayaran_selisih_billing extends SYAM_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('App_model', 'm_default');
        $this->load->model('Masterdata_model', 'm_masterdata');
        $this->load->model('Pembayaran_selisih_billing_model', 'm_selisih_billing');
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

    function page_pembayaran_selisih_billing()
    {
        $data['satuan'] = $this->m_masterdata->getOpsiSatuan('Keuangan', true);
        $data['unit_kasir'] = $this->m_masterdata->getUnitKasir();
        $data["metode_pembayaran"] = $this->m_keuangan->getMetodePembayaran();

        $this->load->view('index', $data);
    }

    function printing_nota_selisih_billing($id)
    {
        if ($id !== NULL | $id !== '') :
            $data['title'] = 'BUKTI PEMBAYARAN SELISIH BILLING';
            $data['hospital'] = $this->m_default->getDataHospital();
            $data['list_data'] = $this->m_selisih_billing->getDataPembayaranSelisihBilling($id);

            $this->db->select("hp.no_kwitansi")->from('sm_history_pembayaran as hp');
            $this->db->where('hp.id', $id);
            $query = $this->db->get()->row();
            $no_kwitansi = '';
            if (count((array)$query)) :
                $no_kwitansi = $query->no_kwitansi;
            endif;
            $data['no_kwitansi'] = $no_kwitansi;

            $this->load->view('printing/cetak_nota_selisih_billing', $data);
        endif;
    }
}
