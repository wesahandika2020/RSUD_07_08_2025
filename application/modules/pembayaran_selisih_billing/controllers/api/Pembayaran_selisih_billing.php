<?php
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

/**
 * @package         CodeIgniter
 * @subpackage      Rest Server
 * @category        Controller
 * @author          Faiz Muhammad Syam
 * @license         Syams Corporation
 */
class Pembayaran_selisih_billing extends REST_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->limit = 10;
		$this->datetime = date('Y-m-d H:i:s');
		$this->load->model('Pembayaran_selisih_billing_model', 'm_selisih_billing');

		$id_translucent = $this->session->userdata('id_translucent');
		if (empty($id_translucent)) :
			$this->response(array('error' => 'Anda belum login'), REST_Controller::HTTP_UNAUTHORIZED);
			exit();
		endif;
	}

	function simpan_pembayaran_selisih_billing_post()
	{
		$unit_kasir = $this->session->userdata('unit_kasir');
		if ($unit_kasir !== '') :
			if (safe_post('nama') === '' | safe_post('tarif') === '') :
				$this->response(['status' => false, 'message' => 'Parameter kurang lengkap', 'id' => NULL], REST_Controller::HTTP_OK);
			endif;
			$serah = safe_post('serah') !== '' ? currencyToNumber(safe_post('serah')) : 0;
			$bayar = safe_post('bayar') !== '' ? currencyToNumber(safe_post('bayar')) : 0;
			// $isManual = safe_post('is_manual');
			// $id_tarif_pelayanan = safe_post('tarif');
			// $tarif_manual = safe_post('tarif_manual');

			if ($bayar !== '') :
				$data = array(
					'waktu' 							=> safe_post('waktu'),
					'nama' 								=> safe_post('nama'),
					// 'tarif_manual' 				=> $tarif_manual,
					// 'id_tarif_pelayanan' 	=> $id_tarif_pelayanan,
					'jenis_transaksi' 		=> safe_post('transaksi'),
					// 'jumlah' 							=> safe_post('jumlah') !== '' ? safe_post('jumlah') : 1,
					// 'satuan' 							=> safe_post('satuan') !== '' ? safe_post('satuan') : NULL,
					'total' 							=> $bayar,
					'serah' 							=> $serah,
					'id_users' 						=> $this->session->userdata('id_translucent'),
					'pembulatan' 					=> safe_post('bayar') !== '' ? currencyToNumber(safe_post('pembulatan')) : 0,
					'keterangan' 					=> safe_post('keterangan'),
					'unit_kasir' 					=> $unit_kasir,
					'no_kwitansi' 				=> $this->m_selisih_billing->generateNoKwitansiPembayaran($unit_kasir),
					'id_pendaftaran' 			=> safe_post('id_pendaftaran'),
					'id_layanan_pendaftaran' => safe_post('id_layanan_pendaftaran'),
					'id_metode_pembayaran' => safe_post('metode_pembayaran'),
				);

				$response = $this->m_selisih_billing->simpanPembayaranSelisihBilling($data);
			endif;
		else :
			$status = false;
			$message = "Gagal melakukan pembayaran, silahkan setting loket terlebih dahulu!";
			$response = array('status' => $status, 'message' => $message);
		endif;
		$this->response($response, REST_Controller::HTTP_OK);
	}

	function get_list_pembayaran_selisih_billing_get()
	{
		if (!$this->get('page')) :
			$this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
		endif;

		$start          = ($this->get('page') - 1) * $this->limit;
		$search         = [
			'tanggal_awal'  => safe_get('tanggal_awal'),
			'tanggal_akhir' => safe_get('tanggal_akhir'),
			'no_kwitansi'   => safe_get('no_kwitansi'),
			'nama'         	=> safe_get('nama'),
			// 'tarif'        	=> safe_get('tarif'),
		];

		$data            = $this->m_selisih_billing->getListDataPembayaranSelisihBilling($this->limit, $start, $search);
		$data['page']    = (int) $this->get('page');
		$data['limit']   = $this->limit;

		if ($data) :
			$this->response($data, REST_Controller::HTTP_OK); // (200)
		else :
			$this->response(array('error' => 'Data is Not Found'), REST_Controller::HTTP_NOT_FOUND);
		endif;
	}

	function batal_pembayaran_selisih_billing_post()
	{
		$id = safe_post('id');
		if ($id === '') :
			$this->response(['status' => false, 'message' => 'Parameter tidak lengkap'], REST_Controller::HTTP_OK);
		endif;
		$data = $this->m_selisih_billing->batalPembayaranSelisihBilling($id);
		$this->response($data, REST_Controller::HTTP_OK);
	}
}
