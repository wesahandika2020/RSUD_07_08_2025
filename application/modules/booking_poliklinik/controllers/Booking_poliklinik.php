<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Booking_poliklinik extends SYAM_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('App_model', 'default');
		$this->load->model('Masterdata_model', 'm_masterdata');
		$this->load->model('Booking_poliklinik_model', 'm_booking');
	}

	function index()
	{
		$data['active']  = 'Antrian';
		$data['modules'] = $this->default->getDataModules($this->session->userdata('id_account_group'));
		$is_login        = $this->session->userdata('is_login');

		if ($is_login === true) :
			$data['hospital'] = $this->default->getDataHospital();
			$this->load->view('layouts/index', $data);

		else :
			redirect('/');

		endif;
	}

	public function page_booking_poliklinik()
	{
		$data = ['asdasd' => 'asdasd'];
		$this->load->view('index', $data);
	}

	public function cetak_bukti_boooking($id)
	{
		if ($id !== null) {
			$data['title']    = 'Cetak Bukti Booking';
			$data['admisi']   = $this->m_booking->getDataBooking($id);
			$data['estimasi']   = $this->m_booking->getWaktuEstimasi($id, $data['admisi']->nama_poli, $data['admisi']->tanggal_kunjungan);
			$data['hospital'] = $this->default->getDataHospital();
			$this->load->view('booking_poliklinik/printing/bukti_kode_booking_antrian', $data);
		}
	}

	public function antrian_loket()
	{
		$data = ['asdasd' => 'asdasd'];
		$this->load->view('booking_poliklinik/antrian_loket', $data);
	}

	public function cetak_antrian_loket_booking($id)
	{
		$data['admisi']   = $this->m_booking->getDataBooking($id);
		$data['hospital'] = $this->default->getDataHospital();
		$this->load->view('booking_poliklinik/printing/antrian_loket_booking', $data);
	}
}
