<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Booking_bed extends SYAM_Controller 
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

    function page_booking_bed()
    {
        $data['bangsal'] = $this->m_masterdata->getDataBangsalReady();
        unset($data['bangsal']['']); 
        $data['status'] = array('request' => 'Request', 'konfirm' => 'Konfirm', 'batal' => 'Batal');
        $this->load->view('index',$data);
    }
}