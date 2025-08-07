<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barang_farmasi extends SYAM_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('App_model', 'default');
        $this->load->model('Masterdata_model', 'masterdata');
        $this->load->model('Barang_farmasi_model', 'barang_farmasi');
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

    function page_barang_farmasi()
    {
        $data["satuan_kekuatan"] = $this->masterdata->satuanKekuatanLoadData()->result();
        $data["kemasan"]         = $this->masterdata->satuanKekuatanLoadData()->result();
        $data["sediaan"]         = $this->masterdata->sediaanLoadData()->result();
        $data["roa"]             = $this->masterdata->roaLoadData();
        $data["golongan"]        = $this->masterdata->golonganLoadData()->result();
        $data["kategori"]        = $this->masterdata->kategoriBarangLoadData("Farmasi")->result();
        $this->load->view('index', $data);
    }

    function export_data_barang()
    {
        $search = array(
            'id'              => NULL,
            'kategori_barang' => safe_get('kategori_barang'),
            'nama'            => safe_get('nama'),
            'sediaan'         => safe_get('sediaan'),
            'roa'             => safe_get('roa'),
            'generik'         => safe_get('generik'),
            'golongan'        => safe_get('golongan'),
            'obatkronis'      => safe_get('obatkronis'),
            'formularium'     => safe_get('formularium'),
            'fornas'          => safe_get('fornas'),
            'jenis_kategori'  => 'Farmasi',
            'ven'             => safe_get('ven'),
            'katastropik'     => safe_get('katastropik'),
            'asalperolehan'   => safe_get('asalperolehan'),
            'statusaktif'     => safe_get('statusaktif'),
            'pencarian'       => safe_get('keyword', true)
        );

        $data = $this->barang_farmasi->getListDataBarangFarmasi(NULL, NULL, $search);
        $this->load->view("export/excel_data_barang", $data);
    }
}
