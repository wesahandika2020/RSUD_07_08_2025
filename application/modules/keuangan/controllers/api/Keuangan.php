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
class Keuangan extends REST_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->limit = 10;
		$this->datetime = date('Y-m-d H:i:s');
		$this->load->model('Keuangan_model', 'm_keuangan');
		$this->load->model('rekap_billing/Rekap_billing_model', 'm_rekap_billing');

		$id_translucent = $this->session->userdata('id_translucent');
		if (empty($id_translucent)) :
			$this->response(array('error' => 'Anda belum login'), REST_Controller::HTTP_UNAUTHORIZED);
			exit();
		endif;
	}

	function get_list_rekap_billing_get()
	{
		if (!$this->get('page')) :
			$this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
		endif;

		$start          = ($this->get('page') - 1) * $this->limit;
		$search         = [
			'tanggal_awal'  => safe_get('tanggal_awal'),
			'tanggal_akhir' => safe_get('tanggal_akhir'),
			'no_register'   => safe_get('no_register'),
			'no_rm'         => safe_get('no_rm'),
			'nama'          => safe_get('nama'),
			'nik'           => safe_get('nik'),
			'dokter'        => safe_get('dokter'),
			'status_bayar'  => safe_get('status_bayar'),
			'jenis'			=> '',
			'cara_bayar'	=> safe_get('cara_bayar'),
			'penjamin'		=> safe_get('penjamin'),
			"keyword"		=> safe_get("keyword")
		];

		if ($this->get('jenis', true)) :
			$search['jenis'] = $this->get('jenis', true);
		endif;

		$data            = $this->m_keuangan->getListDataRekapBilling($this->limit, $start, $search);
		$data['page']    = (int) $this->get('page');
		$data['limit']   = $this->limit;

		if ($data) :
			$this->response($data, REST_Controller::HTTP_OK); // (200)
		else :
			$this->response(array('error' => 'Data is Not Found'), REST_Controller::HTTP_NOT_FOUND);
		endif;
	}

	function get_rekap_billing_detail_get()
	{
		if (!$this->get('id', true)) :
			$this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
		endif;
		$data = $this->m_keuangan->getPendaftaranDetail($this->get('id'));
		$data['diagnosa'] = $this->m_keuangan->getDiagnosa($this->get('id'));
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
			$val->pkrt = $this->m_rekap_billing->getListTarifPKRT($val->id);
		endforeach;
		if ($data) :
			$this->response($data, REST_Controller::HTTP_OK);
		else :
			$this->response(array('error' => 'Data is Not Found'), REST_Controller::HTTP_NOT_FOUND);
		endif;
	}

	function set_unit_kasir_post()
	{
		$unitKasir = safe_post('unit_kasir');
		$status = false;
		if ($unitKasir !== '') :
			$status = true;
			$this->session->set_userdata("unit_kasir", $unitKasir);
		endif;

		$response = array("status" => $status);
		$this->response($response, REST_Controller::HTTP_OK);
	}

	function get_pembayaran_billing_get()
	{
		if (!$this->get('id', true)) :
			$this->response(NULL, REST_Controller::HTTP_OK);
		endif;

		$id_pendaftaran = $this->get('id', true);
		$dataPendaftaranDetail = $this->m_keuangan->getPendaftaranDetail($id_pendaftaran, NULL, 'poli');
		$billingRanap = $this->m_keuangan->getLayananNonKlinik($id_pendaftaran);
		if (0 < sizeof((array)$billingRanap)) :
			$data["layanan"][] = $billingRanap;
		endif;

		foreach ($data["layanan"] as $i => $value) :
			$value->billing = $this->m_keuangan->getPembayaranBilling($id_pendaftaran, $value->id, $value->jenis_layanan);
		endforeach;

		if ($dataPendaftaranDetail) :
			$this->response($dataPendaftaranDetail, REST_Controller::HTTP_OK);
		else :
			$this->response(array("error" => "Data Not Found"), REST_Controller::HTTP_OK);
		endif;
	}

	function get_detail_pasien_get()
	{
		if (!$this->get('id', true)) :
			$this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
		endif;

		$id_pendaftaran = $this->get("id", true);
		$data = $this->m_keuangan->getPendaftaranDetail($id_pendaftaran);
		$deposit = $this->m_keuangan->getDepositPendaftaran($id_pendaftaran);
		$data["sisa_deposit"] = (int) $deposit["sisa_deposit"];
		$data["status"] = $data["pasien"]->lunas;
		$data["status_penyerahan"] = $this->get_status_penyerahan($id_pendaftaran);
		$data["status_order"] = $this->m_keuangan->getStatusOrder($id_pendaftaran);

		if ($data) :
			$this->response($data, REST_Controller::HTTP_OK);
		else :
			$this->response(array("error" => "Data Not Found"), REST_Controller::HTTP_OK);
		endif;
	}

	function get_data_tagihan_get()
	{
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

	function get_data_history_pembayaran_get()
	{
		if (!$this->get('id', true)) :
			$this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
		endif;

		$id_pendaftaran = $this->get('id', true);
		$data = $this->m_keuangan->getHistoryPembayaranPendaftaran($id_pendaftaran);
		$this->response($data, REST_Controller::HTTP_OK);
	}

	function increase_jumlah_cetak_post()
	{
		if (safe_post('id_history_pembayaran') === '') :
			$this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
		endif;

		$id_history_pembayaran = safe_post('id_history_pembayaran');
		$data = $this->m_keuangan->increaseJumlahCetak($id_history_pembayaran);
		$this->response($data, REST_Controller::HTTP_OK);
	}

	function simpan_ubah_cara_bayar_post()
	{
		if (!$this->get('id_pendaftaran', true)) :
			$this->response(['status' => false, 'message' => 'Parameter kurang lengkap'], REST_Controller::HTTP_OK);
		endif;

		$penjamin = safe_post('penjamin');
		if(safe_post('cara_bayar') == 'Tunai'){
			$penjamin = '9';
		}

		$data = array(
			'id_pendaftaran' => $this->get('id_pendaftaran', true),
			'cara_bayar' => safe_post('cara_bayar'),
			'penjamin' => $penjamin,
			'no_polish' => safe_post('no_polish_penjamin')
		);
		
		$response = $this->m_keuangan->ubahCaraBayar($data);
		$this->response($response, REST_Controller::HTTP_OK);
	}

	private function get_status_penyerahan($id_pendaftaran)
	{
		$response = $this->db->select('sp.waktu_diserahkan')
			->from('sm_layanan_pendaftaran slp')
			->join('sm_penjualan sp ', ' slp.id = sp.id_layanan_pendaftaran')
			->where('slp.id_pendaftaran', $id_pendaftaran)
			->where('sp.waktu_diserahkan is null')
			->where('sp.jenis !=', 'BHP')
			->where("slp.jenis_layanan != 'Poliklinik'")
			->get()
			->num_rows();

		$belum_diserahkan = false;

		if ($response > 0) {
			$belum_diserahkan = true;
		}

		return $belum_diserahkan;
	}
	
	public function konfirmasi_kasir_post()
	{
		$id_pendaftaran = safe_post('id_pendaftaran');
		$this->db->where('id', $id_pendaftaran)->update('sm_pendaftaran', ['konfirmasi_kasir' => 1]);

		$this->response(['status' => true]);
	}
}
