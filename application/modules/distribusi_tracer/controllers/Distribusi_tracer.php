<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Distribusi_tracer extends SYAM_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('App_model', 'm_default');
		$this->load->model('Masterdata_model', 'm_masterdata');
		$this->load->model('Distribusi_tracer_model', 'm_distribusi_tracer');
		$this->load->model('pasien/Pasien_model', 'pasien');
	}

	function index()
	{
		$data['active'] = 'Tracer';
		$data['modules'] = $this->m_default->getDataModules($this->session->userdata('id_account_group'));
		$is_login = $this->session->userdata('is_login');

		if ($is_login === true) :
			$data['hospital'] = $this->m_default->getDataHospital();
			$this->load->view('layouts/index', $data);
		else :
			redirect('/');
		endif;
	}

	function page_distribusi_tracer()
	{
		$data['status'] = array('' => 'Semua', 'pending' => 'Pending', 'order' => 'Order', 'ready' => 'Ready', 'distributed' => 'Distributed', 'returned' => 'Returned');
		$showeditbutton = false;
		if ($this->session->userdata('account_group') === 'Admin' || $this->session->userdata('account_group') === 'Rekam Medis') {
			$showeditbutton = true;
		}
		$data['showeditbutton'] = $showeditbutton;
		$this->load->view('distribusi_tracer/index', $data);
	}

	function cetak_tracer()
    {
        $id = $this->input->get('id', true);
       
        if (!$id) :
            exit();
        endif;

        $data['hospital'] = $this->default->getDataHospital();
        $data['tracer'] = $this->m_distribusi_tracer->getFormNoRegTracer($id);
        
        $this->load->view('distribusi_tracer/printing/cetak_kartu_tracer', $data);
    }
	
	function generate_barcode($code)
    {
        //load library
        $this->load->library('Zend');
        //load in folder Zend
        $this->zend->load('Zend/Barcode');
        //generate barcode
        Zend_Barcode::render('code128', 'image', array('text' => $code), array('imageType' => 'gif'));
    }
}
