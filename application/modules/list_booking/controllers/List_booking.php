<?php
defined('BASEPATH') or exit('No direct script access allowed');

class List_booking extends SYAM_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('App_model', 'default');
		$this->load->model('List_booking_model', 'm_list_booking');
	}

	function index()
	{
		$data['active']  = 'Masterdata';
		$data['modules'] = $this->default->getDataModules($this->session->userdata('id_account_group'));
		$is_login        = $this->session->userdata('is_login');

		if ($is_login === true) :
			$data['hospital'] = $this->default->getDataHospital();
			$this->load->view('layouts/index', $data);

		else :
			redirect('/');

		endif;
	}

	function page_list_booking()
	{
		$this->load->view('index');
	}
	
	function export() {
		$search = [
			'tanggal_awal'   => safe_get('tanggal_awal'),
			'tanggal_akhir'  => safe_get('tanggal_akhir'),
			'kode_booking'   => safe_get('kode_booking'),
			'nik'            => safe_get('nik'),
			'no_rm'          => safe_get('no_rm'),
			'nm_poli'        => safe_get('nm_poli'),
			'nm_dokter'      => safe_get('nm_dokter'),
			'status_antrean' => safe_get('status_antrean'),
			'lokasi'		 => safe_get('lokasi'),
			'shift'		 	 => safe_get('shift'),
		];
	
		$data['periode'] 	= safe_get('tanggal_awal') .' s/d '. safe_get('tanggal_akhir');	
		$data['shift_poli'] = safe_get('shift');	
		$data['data'] 		= $this->m_list_booking->sqlListBookingExport($search);	
		$this->load->view( 'export/export_data_booking.php', $data );
	}
}
