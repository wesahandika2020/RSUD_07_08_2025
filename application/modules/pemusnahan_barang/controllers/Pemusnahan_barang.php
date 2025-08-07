<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pemusnahan_barang extends SYAM_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('App_model', 'm_default');
        $this->load->model('pemusnahan_barang/Pemusnahan_barang_model', 'm_pemusnahan_barang');
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

    function page_pemusnahan_barang()
    {
        $this->load->view('pemusnahan_barang/index');
    }

    function printing_bukti_pemusnahan()
    {
        $id_pemusnahan = safe_get('id');
        $data['title'] = 'BUKTI PEMUSNAHAN BARANG';
        $data['hospital'] = $this->m_default->getDataHospital();
        $data['data'] = $this->m_pemusnahan_barang->getDataPemusnahanBarang($id_pemusnahan)->result();
        $this->load->view('printing/cetak_bukti_pemusnahan_barang', $data);
    }
}