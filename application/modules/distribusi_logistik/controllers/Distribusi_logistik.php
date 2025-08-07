<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Distribusi_logistik extends SYAM_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('App_model', 'm_default');
        $this->load->model('Masterdata_model', 'm_masterdata');
        $this->load->model('inventori_rt/Inventori_rt_model', 'inventori');
        $this->load->model('Distribusi_logistik_model', 'distribusi');
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

    function page_distribusi()
    {
		$data['unit'] = $this->inventori->getUnit();
		$data['kategori_barang'] = $this->inventori->ambilDataKategoriBarang( '' )->result();
        $this->load->view('distribusi_logistik/index', $data);
	}
	
	function printing_bukti_distribusi()
    {
        $id = safe_get('id');
        $data['title'] = 'Bukti Distribusi Logistik';
        $data['hospital'] = $this->m_default->getDataHospital();
		$data['list_data'] = $this->distribusi->getDataDistribusiCetak($id);
        $this->load->view('printing/cetak_bukti_distribusi', $data);
    }
}