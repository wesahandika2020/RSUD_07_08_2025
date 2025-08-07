<?php

defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class Keuangan_for_kepeg extends REST_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->limit = 10;
		$this->datetime = date('Y-m-d H:i:s');

		$this->secret_key = 'mQKl67jlrua+gxnrpf+I9vhQ1szgc8VSGMK3qZ6d75U=';
	}

	function get_data_tagihan_get()
	{
		$auth = $this->head('Authorization');
		if (str_replace('Bearer ', '', $auth) !== $this->secret_key) {
			$this->response(array('error' => 'Anda tidak memiliki akses'), REST_Controller::HTTP_UNAUTHORIZED);
			exit();
		}

		if (!$this->get('id', true)) :
			$this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
		endif;

		$this->load->model('Keuangan_ver2_model', 'm_keuangan_ver2');
		$this->load->model('Pembayaran_model', 'm_pembayaran');

		$id_pendaftaran = $this->get('id', true);
		$layanan_pendaftaran = safe_get('layanan_pendaftaran') !== 'null' ? safe_get('layanan_pendaftaran') : '';
		if (safe_get('transaksi') === 'Poliklinik' | safe_get('transaksi') === 'IGD' | safe_get('transaksi') === 'Rawat Inap' | safe_get('transaksi') === '') :
			$transaksi = 'all';
		else :
			$transaksi = safe_get('transaksi');
		endif;
		$data['total'] = 0;
		$data['reimburse'] = 0;
		$data['piutang_dibayar'] = 0;

		$billing = $this->m_keuangan_ver2->getTotalPembayaran($id_pendaftaran, $transaksi, safe_get('transaksi'), $layanan_pendaftaran);
		$data["total"] = round($billing["total"] - $billing["reimburse"]);
		$data["reimburse"] = round($billing["reimburse"]);
		$data["piutang_dibayar"] = $this->m_keuangan_ver2->hitungPiutangDibayarkan($id_pendaftaran);
		$data["detail"] = $this->m_pembayaran->getRincianTagihan($id_pendaftaran, $transaksi, safe_get('transaksi'), $layanan_pendaftaran);
		$data["layanan"] = $layanan_pendaftaran;
		$this->response($data, REST_Controller::HTTP_OK);
	}
}
