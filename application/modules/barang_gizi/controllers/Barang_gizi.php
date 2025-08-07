<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barang_gizi extends SYAM_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('App_model', 'default');
        $this->load->model('Masterdata_model', 'masterdata');
        $this->load->model('Barang_gizi_model', 'barang_gizi');
        $this->load->model('Inventori_rt/Inventori_rt_model', 'inventori');
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

    function page_barang_gizi()
    {
        $data["kemasan"]  = $this->masterdata->satuanKekuatanLoadData()->result();
        $data["bidang"]   = $this->masterdata->bidangLoadData()->result();
        $data["kategori"] = $this->masterdata->kategoriBarangLoadData("Gizi")->result();
        $data['pembayaran'] = $this->inventori->getJenisPembayaran();
        $this->load->view('index', $data);
    }

    function export_data_barang()
    {
        $search = array(
            'id'              => NULL,
            'kategori_barang' => safe_get('kategori_barang'),
            'nama'            => safe_get('nama'),
            'sediaan'         => safe_get('sediaan'),
            'jenis_kategori'  => 'Gizi',
            'pencarian'       => safe_get('keyword', true)
        );

        $data = $this->barang_gizi->getListData(NULL, NULL, $search);
        $this->load->view("export/excel_data_barang", $data);
    }
}