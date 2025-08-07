<?php

defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

/**
 * @package         CodeIgniter
 * @subpackage      Rest Server
 * @category        Controller
 * @author          Muhamad Wahyudin
 * @license         Syams Corporation
 */
class Lap_kasir extends REST_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->limit    = 50;
		$this->datetime = date('Y-m-d H:i:s');
		$this->load->model('Lap_kasir_model', 'm_lap_kasir');
		$this->load->model('rekap_billing/Rekap_billing_model', 'm_rekap_billing');


		$id_translucent = $this->session->userdata('id_translucent');
		if (empty($id_translucent)) :
			$this->response(array('error' => 'Anda belum login'), REST_Controller::HTTP_UNAUTHORIZED);
			exit();
		endif;
	}

	private function start($page)
	{
		return (($page - 1) * $this->limit);
	}

	function dokter_auto_get()
	{
		$q = safe_get('q');
		$page = safe_get('page');
		$start = $this->start($page);
		// $key = 'dokter_auto_' . $q . '_' . $page;
		// if (!$this->redis->get($key)) :
		$data = $this->m_lap_kasir->getAccountKasir($q, $start, $this->limit);
		if ((safe_get('page') == 1) & ($q == '')) :
			$pilih[] = array(
				'id' => '',
				'nama' => 'Semua Dokter / Pegawai',
				'jabatan' => ''
			);
			$data['data'] = array_merge($pilih, $data['data']);
			$data['total'] += 1;
		endif;
		// $this->redis->setex($key, 86400, json_encode($data));
		$this->response($data, REST_Controller::HTTP_OK);
		// else :
		// exit($this->redis->get($key));
		// endif;
	}

	function get_list_lap_01_get()
	{
		if (!$this->get('page')) :
			$this->response(null, REST_Controller::HTTP_BAD_REQUEST); // (400)
		endif;

		$start  = ($this->get('page') - 1) * $this->limit;
		$search = [
			'periode_laporan'   => safe_get('periode_laporan'),
			'tanggal_harian'    => safe_get('tanggal_harian'),
			'bulan'             => safe_get('bulan'),
			'tahun'             => safe_get('tahun'),
			'tanggal_awal'      => safe_get('tanggal_awal'),
			'tanggal_akhir'     => safe_get('tanggal_akhir'),
			'id_dokter'         => safe_get('id_dokter'),
			'nama_pasien'       => safe_get('nama_pasien'),
			'jenis_pasien'	  	=> safe_get('jenis_pasien'),
			'cara_bayar'		=> safe_get('cara_bayar'),
			'penjamin'			=> safe_get('penjamin'),
			'jenis_tunai'		=> safe_get('jenis_tunai'),
			'ruangan_rajal'		=> safe_get('ruangan_rajal'),
			'ruangan_ranap'		=> safe_get('ruangan_ranap'),
			'shift_poli'		=> safe_get('shift_poli'),
		];

		// var_dump( safe_get('id_dokter'));die;

		$data          = $this->m_lap_kasir->getLap01($this->limit, $start, $search);
		$data['page']  = (int) $this->get('page');
		$data['limit'] = $this->limit;

		if ($data) :
			$this->response($data, REST_Controller::HTTP_OK); // (200)
		else :
			$this->response(array('error' => 'Data is Not Found'), REST_Controller::HTTP_NOT_FOUND);
		endif;
	}

	function get_list_lap_02_get()
	{
		if (!$this->get('page')) :
			$this->response(null, REST_Controller::HTTP_BAD_REQUEST); // (400)
		endif;

		$start  = ($this->get('page') - 1) * $this->limit;
		$search = [
			'periode_laporan'   => safe_get('periode_laporan'),
			'tanggal_harian'    => safe_get('tanggal_harian'),
			'bulan'             => safe_get('bulan'),
			'tahun'             => safe_get('tahun'),
			'tanggal_awal'      => safe_get('tanggal_awal'),
			'tanggal_akhir'     => safe_get('tanggal_akhir'),
			'nama_pasien'       => safe_get('nama_pasien'),
			'bangsal_search'	=> safe_get('bangsal_search'),
			'kelas_rawat'		=> safe_get('kelas_rawat'),
			'diagnosa_awal'		=> safe_get('diagnosa_awal'),
			'diagnosa_akhir'	=> safe_get('diagnosa_akhir'),
		];

		// var_dump( safe_get('id_dokter'));die;

		$data          = $this->m_lap_kasir->getLap02($this->limit, $start, $search);
		$data['page']  = (int) $this->get('page');
		$data['limit'] = $this->limit;

		if ($data) :
			$this->response($data, REST_Controller::HTTP_OK); // (200)
		else :
			$this->response(array('error' => 'Data is Not Found'), REST_Controller::HTTP_NOT_FOUND);
		endif;
	}

	function get_list_lap_03_get()
	{
		if (!$this->get('page')) :
			$this->response(null, REST_Controller::HTTP_BAD_REQUEST); // (400)
		endif;

		$start  = ($this->get('page') - 1) * $this->limit;
		$search = [
			'periode_laporan'   => safe_get('periode_laporan'),
			'tanggal_harian'    => safe_get('tanggal_harian'),
			'bulan'             => safe_get('bulan'),
			'tahun'             => safe_get('tahun'),
			'tanggal_awal'      => safe_get('tanggal_awal'),
			'tanggal_akhir'     => safe_get('tanggal_akhir'),
			'id_dokter'         => safe_get('id_dokter'),
			'nama_pasien'       => safe_get('nama_pasien'),
			'jenis_pasien'	  	=> safe_get('jenis_pasien'),
			'cara_bayar'				=> safe_get('cara_bayar'),
			'penjamin'					=> safe_get('penjamin'),
			'jenis_tunai'				=> safe_get('jenis_tunai'),
			'ruangan_rajal'			=> safe_get('ruangan_rajal'),
			'ruangan_ranap'			=> safe_get('ruangan_ranap'),
		];

		// var_dump( safe_get('id_dokter'));die;

		$data          = $this->m_lap_kasir->getLap03($this->limit, $start, $search);
		$data['page']  = (int) $this->get('page');
		$data['limit'] = $this->limit;

		if ($data) :
			$this->response($data, REST_Controller::HTTP_OK); // (200)
		else :
			$this->response(array('error' => 'Data is Not Found'), REST_Controller::HTTP_NOT_FOUND);
		endif;
	}

	function get_list_lap_kasir_detail_get()
	{
		// var_dump($this->get('id'));die;
		if (!$this->get('id', true)) :
			$this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
		endif;
		$data = $this->m_lap_kasir->getPendaftaranDetail($this->get('id'));
		$data['diagnosa'] = $this->m_lap_kasir->getDiagnosa($this->get('id'));
		// var_dump($data);die;
		if (count((array)$data['pasien']) < 1) :
			$this->response(NULL, REST_Controller::HTTP_OK);
		endif;
		foreach ($data['layanan'] as $i => $val) :
			$val->pendaftaran = $this->m_rekap_billing->getListTarifTindakan($val->id, 'Ya');
			$val->tindakan = $this->m_rekap_billing->getListTarifTindakan($val->id, 'Tidak');
			$val->laboratorium = $this->m_rekap_billing->getListTarifLaboratorium($val->id);
			$val->radiologi = $this->m_rekap_billing->getListTarifRadiologi($val->id);
			$val->fisioterapi = $this->m_rekap_billing->getListTarifFisioterapi($val->id);
			$val->barang = $this->m_rekap_billing->getListTarifBarang($val->id);
			$val->barang_operasi = $this->m_rekap_billing->getListTarifBarangOperasi($val->id);
			$val->rawat_inap = $this->m_rekap_billing->getListTarifKamar($val->id);
			$val->intensive_care = $this->m_rekap_billing->getListTarifKamarIcare($val->id);
			$val->operasi = $this->m_rekap_billing->getListTarifOperasi($val->id, 'OK'); // Operatie Kamer
			$val->vk = $this->m_rekap_billing->getListTarifOperasi($val->id, 'VK'); // Verlos Kamer
			$val->bank_darah = $this->m_rekap_billing->getListTarifBankDarah($val->id);
			$val->barang_bank_darah = $this->m_rekap_billing->getListTarifBarangBankDarah($val->id);
			$val->retur_barang = $this->m_rekap_billing->getListReturBarang($val->id);
			$val->hemodialisa = $this->m_rekap_billing->getListTarifHemodialisa($val->id);
		endforeach;
		if ($data) :
			$this->response($data, REST_Controller::HTTP_OK);
		else :
			$this->response(array('error' => 'Data is Not Found'), REST_Controller::HTTP_NOT_FOUND);
		endif;
	}
}
