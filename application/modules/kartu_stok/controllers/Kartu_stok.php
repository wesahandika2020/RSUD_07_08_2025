<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Kartu_stok extends SYAM_Controller 
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('App_model', 'm_default');
        $this->load->model('Masterdata_model', 'm_masterdata');
    }

    function index()
    {
        $data['active'] = 'Inventory';
        $data['modules'] = $this->m_default->getDataModules($this->session->userdata('id_account_group'));
        $is_login = $this->session->userdata('is_login');

        if ($is_login === true) :
            $data['hospital'] = $this->m_default->getDataHospital();
            $this->load->view('layouts/index', $data);
        else :
            redirect('/');
        endif;
    }

    function page_kartu_stok()
    {
		$data['transaksi'] = $this->m_masterdata->getTransaksiInventory();
		$data['kategori_barang'] = $this->m_masterdata->kategoriBarangLoadData('')->result();
        $data['unit'] = $this->db->or_where(array('is_farmasi' => '1', 'is_gudang' => '1'))->get('sm_unit')->result();
        $data['golongan'] = $this->db->get('sm_golongan')->result();
        $this->load->view('index', $data);
    }
}