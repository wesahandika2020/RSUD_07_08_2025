<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan_pelayanan extends SYAM_Controller 
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('App_model', 'default');
		$this->load->model('Masterdata_model', 'm_masterdata');
		$this->load->model('pelayanan/Pelayanan_model', 'm_pelayanan');
	}

	function index()
	{
		$data['active'] = 'Laporan Pelayanan';
		$data['modules'] = $this->default->getDataModules($this->session->userdata('id_account_group'));
		$is_login = $this->session->userdata('is_login');

		if ($is_login === true) :
			$data['hospital'] = $this->default->getDataHospital();
			$this->load->view('layouts/index', $data);
		else :
			redirect('/');
		endif;
	}

	function page_list_rekap_status_bed()
	{
		$data['kelas'] = $this->m_masterdata->getDataKelas();
		$data['bangsal'] = $this->m_masterdata->getDataBangsalReady();
		unset($data['bangsal']['']);
		$this->load->view('list_status_bed/index', $data);
	}

	function page_morbiditas()
	{
		$data['jenis_pelayanan'] = array('' => 'Pilih...', 'Poliklinik' => 'Poliklinik', 'IGD' => 'IGD', 'Rawat Inap' => 'Rawat Inap');
		$this->load->view('list_morbiditas/index', $data);
	}

	function get_data_morbiditas($tanggal_awal = NULL, $tanggal_akhir = NULL)
	{
		$subtitle = '<br/>';
		if ($tanggal_awal != NULL) {
			$subtitle .= indo_tgl($tanggal_awal);
		}
		if ($tanggal_akhir != NULL) {
			$subtitle .= ' s.d ' . indo_tgl($tanggal_akhir);
		}
		$param = array('tanggal_awal' => $tanggal_awal, 'tanggal_akhir' => $tanggal_akhir, 'pelayanan' => safe_get('jenis_pelayanan'));
		$data = $this->m_pelayanan->getLaporanMorbiditas($param);
		$result['nama'] = array();
		$result['jumlah'] = array();
		$result['title'] = 'Laporan Morbiditas 10 Penyakit <br/> Layanan ' . $param['pelayanan'] . $subtitle;
		foreach ($data as $key => $value) {
			$result['nama'][] = $value->nama;
			$result['jumlah'][] = (int) $value->jumlah;
		}
		echo json_encode($result);
	}

	function page_daftar_pasien_rawat_inap()
	{
		$data['kelas'] = $this->m_masterdata->getDataKelas();
		$data['status'] = ['Masih Dirawat' => 'Masih Dirawat', 'Sudah Pulang' => 'Sudah Pulang'];
		$data['cara_bayar'] = $this->m_masterdata->getCaraBayar(true);
		$this->load->view('list_daftar_pasien_ranap/index', $data);
	}

	function export_daftar_pasien_rawat_inap()
	{
		
	}
}