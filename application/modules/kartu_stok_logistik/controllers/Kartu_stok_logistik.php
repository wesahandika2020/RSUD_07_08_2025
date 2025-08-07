<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Kartu_stok_logistik extends SYAM_Controller 
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('App_model', 'm_default');
        $this->load->model('Masterdata_model', 'm_masterdata');
        $this->load->model('laporan_inventori_logistik/Laporan_inventori_logistik_model', 'laporan');
    }

    function index()
    {
        $data['active'] = 'Inventori';
        $data['modules'] = $this->m_default->getDataModules($this->session->userdata('id_account_group'));
        $is_login = $this->session->userdata('is_login');

        if ($is_login === true) :
            $data['hospital'] = $this->m_default->getDataHospital();
            $this->load->view('layouts/index', $data);
        else :
            redirect('/');
        endif;
    }

    function page_kartu_stok_logistik()
    {
		$data['transaksi'] = $this->m_masterdata->getTransaksiInventory();
		$data['kategori_barang'] = $this->laporan->getKategoriWithValue();
        $data['unit'] = $this->db->or_where(array('acc' => 'UMUM'))->get('sm_unit')->result();
        $data['golongan'] = $this->db->get('sm_golongan')->result();
        $this->load->view('index', $data);
    }
}