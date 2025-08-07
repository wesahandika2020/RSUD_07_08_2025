<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Order_radiologi extends SYAM_Controller 
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('App_model', 'default');
        $this->load->model('Masterdata_model', 'm_masterdata');
        $this->load->model('Order_radiologi_model', 'm_order_radiologi');
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

    function page_order_radiologi()
    {
		$data['jenis_radiologi'] = array('' => '-- Semua --', 'Radiologi' => 'Radiologi', 'Cath Lab' => 'Cath Lab', 'Endoskopi' => 'Endoskopi');
        $this->load->view('index',$data);
    }

    function cetak_label_radiologi($id = NULL, $format = 'print')
    {
        if ($id != NULL) :
            $data['title'] = 'Label Radiologi Pasien';
            $data['order_radiologi'] = $this->m_order_radiologi->getDataDetailOrderRadiologi($id);
            $data['antrian']         = $this->m_order_radiologi->getAntrianTerakhir($id);
			// var_dump($data['order_radiologi']); die();
            if (0 < count((array)$data['order_radiologi'])) :
                switch ($format) {
                    case 'print':
                        $this->load->view('printing/label_radiologi', $data);
                        break;
                    case 'json':
                        exit(json_encode($data));
                    default:
                        $this->load->view('printing/label_radiologi', $data);
                        break;
                }
            endif;
       endif;
    }
}