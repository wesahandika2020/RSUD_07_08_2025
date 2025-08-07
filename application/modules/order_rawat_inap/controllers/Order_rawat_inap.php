<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Order_rawat_inap extends SYAM_Controller 
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('App_model', 'default');
        $this->load->model('Masterdata_model', 'm_masterdata');
    }

    function index()
    {
        $data['active'] = 'Pelayanan';
        $data['modules'] = $this->default->getDataModules($this->session->userdata('id_account_group'));
        $is_login = $this->session->userdata('is_login');

        if ($is_login === true) :
            $data['hospital'] = $this->default->getDataHospital();
            $this->load->view('layouts/index', $data);

        else :
            redirect('/');

        endif;
    }

    function page_order_rawat_inap()
    {
        $data['kelas'] = $this->m_masterdata->getDataKelas(); 
        $data['cara_bayar'] = $this->m_masterdata->getCaraBayar(); 
        $data['bangsal'] = $this->m_masterdata->getDataBangsalReady(); 
        $data['status'] = array('request' => 'Request', 'dirawat' => 'Dirawat', 'batal' => 'Batal');
		unset($data['bangsal']['']);
        $this->load->view('index',$data);
    }

    function get_list_bangsal()
    {
        $id_bangsal = $this->input->get('id_bangsal');
        $data = $this->m_masterdata->getDataBangsalReadyJSON($id_bangsal);
        echo json_encode($data);
    }
}