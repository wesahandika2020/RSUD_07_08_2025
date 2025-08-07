<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Notifikasi_dpjp extends SYAM_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('App_model', 'default');
		$this->load->model('Masterdata_model', 'm_masterdata');
		$this->load->model('Notifikasi_dpjp_model', 'm_notifikasi_dpjp');
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

	function page_notifikasi_dpjp()
	{
		$data['periode_laporan']    = $this->m_notifikasi_dpjp->getPeriodeLaporan();
		$data['bulan']              = $this->m_masterdata->getBulan();
		$this->load->view('index', $data);
	}
	
	// function export() {
	// 	$search = [
	// 		'tanggal_awal'   => safe_get('tanggal_awal'),
	// 		'tanggal_akhir'  => safe_get('tanggal_akhir'),
	// 		'kode_booking'   => safe_get('kode_booking'),
	// 		'nik'            => safe_get('nik'),
	// 		'no_rm'          => safe_get('no_rm'),
	// 		'nm_poli'        => safe_get('nm_poli'),
	// 		'nm_dokter'      => safe_get('nm_dokter'),
	// 		'status_antrean' => safe_get('status_antrean'),
	// 	];
	
	// 	$data['periode'] = safe_get('tanggal_awal') .' s/d '. safe_get('tanggal_akhir');	
	// 	$data['data'] = $this->m_notifikasi_dpjp->sqlListBookingExport($search);	
	// 	$this->load->view( 'export/export_data_booking.php', $data );
	// }
}
