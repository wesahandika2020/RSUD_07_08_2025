<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Order_kebidanan extends SYAM_Controller 
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('App_model', 'default');
        $this->load->model('Masterdata_model', 'm_masterdata');
		$this->load->model('order_kebidanan_model', 'm_order_kebidanan');
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

    function page_order_kebidanan()
    {
        $data['kelas'] = $this->m_masterdata->getDataKelas(); 
        $data['cara_bayar'] = $this->m_masterdata->getCaraBayar(); 
		$data['bangsal'] = $this->m_masterdata->getDataBangsalReady();
        $data['bangsal_kebidanan'] = $this->m_order_kebidanan->getDataBangsal(); 
        $data['status'] = array('request' => 'Request', 'dirawat' => 'Dirawat', 'batal' => 'Batal');
		unset($data['bangsal']['']);
        $this->load->view('index',$data);
    }
}
