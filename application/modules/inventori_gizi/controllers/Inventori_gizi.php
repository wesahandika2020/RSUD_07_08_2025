<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Inventori_gizi extends SYAM_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('App_model', 'm_default');
        $this->load->model('Masterdata_model', 'm_masterdata');
		$this->load->model('Inventori_gizi_model', 'inventori');
    }

    function index()
    {
        $data['active'] = 'Inventory';
        $data['modules'] = $this->m_default->getDataModules($this->session->userdata('id_account_group'));
        $data['pembayaran'] = $this->inventori->getJenisPembayaran();
        $is_login = $this->session->userdata('is_login');

        if ($is_login === true) :
            $data['hospital'] = $this->m_default->getDataHospital();
            $this->load->view('layouts/index', $data);

        else :
            redirect('/');

        endif;
    }

	function printing_penerimaan($id_penerimaan)
	{
        $data['title'] = 'Cetak Penerimaan';
		$data['hospital'] = $this->m_default->getDataHospital();
		$data['location'] = $this->m_default->getDataUserInstalasi($this->session->userdata('id_unit'))->row();
		$data['list_data'] = $this->inventori->getListDataFakturPenerimaan($id_penerimaan)->result();
		$this->load->view('printing/penerimaan/cetak_penerimaan', $data);
	}

	function printing_penerimaan_bank_darah($id_penerimaan)
	{
        $data['title'] = 'Cetak Penerimaan';
		$data['hospital'] = $this->m_default->getDataHospital();
		$data['location'] = $this->m_default->getDataUserInstalasi($this->session->userdata('id_unit'))->row();
		$data['list_data'] = $this->inventori->getListDataFakturPenerimaanBankDarah($id_penerimaan)->result();
		$this->load->view('printing/penerimaan/cetak_penerimaan', $data);
	}

    function printing_penerimaan_gizi($id_penerimaan)
	{
        $data['title'] = 'Cetak Penerimaan';
		$data['hospital'] = $this->m_default->getDataHospital();
		$data['location'] = $this->m_default->getDataUserInstalasi($this->session->userdata('id_unit'))->row();
		$data['list_data'] = $this->inventori->getListDataFakturPenerimaan($id_penerimaan)->result();
		$this->load->view('printing/penerimaan/cetak_penerimaan_gizi', $data);
	}
}