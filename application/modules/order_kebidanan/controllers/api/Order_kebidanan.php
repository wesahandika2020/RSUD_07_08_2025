<?php

defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

/**
 * @package         CodeIgniter
 * @subpackage      Rest Server
 * @category        Controller
 * @author          Pandu Agung Wijaya
 * @license         Syams Corporation
 */
class Order_kebidanan extends REST_Controller
{

    function __construct()
    {
        parent::__construct();
		$this->limit = 10;
		$this->datetime = date('Y-m-d H:i:s');
        $this->load->model('order_kebidanan_model', 'm_order_kebidanan');

        $id_translucent = $this->session->userdata('id_translucent');
        if (empty($id_translucent)) :
            $this->response(array('error' => 'Anda belum login'), REST_Controller::HTTP_UNAUTHORIZED);
            exit();
        endif;
    }

    function get_list_order_kebidanan_get()
    {
        if (!$this->get('page')) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
        endif;
        
        $start          = ($this->get('page') - 1) * $this->limit;
        $search         = [
            'tanggal_awal'      => safe_get('tanggal_awal'),
            'tanggal_akhir'     => safe_get('tanggal_akhir'),
            'no_register'       => safe_get('no_register'),
            'no_rm'             => safe_get('no_rm'),
            'nama'              => safe_get('nama'),
            'dokter'            => safe_get('dokter'),
            'unit'              => $this->session->userdata('id_unit'),
            'status'            => safe_get('status'),
        ];
        
        $data            = $this->m_order_kebidanan->getListDataOrderKebidanan($this->limit, $start, $search);
        $data['page']    = (int) $this->get('page');
        $data['limit']   = $this->limit;

        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK); // (200)
        endif;
	}

	function check_booking_status_get() 
	{
		if (!$this->get('no_rm', true)) :
			$result = array('status' => false, 'message' => 'Parameter tidak lengkap');
			$this->response($result, REST_Controller::HTTP_OK);
		endif;

		$dataBooking = $this->m_order_kebidanan->checkBookingStatus($this->get('no_rm', true));
		if ($dataBooking) :
			$statusBooking = 'booking';
			$message = 'Pasien telah melakukan pemesanan tempat tidur';
			$dataBooking = $this->m_order_kebidanan->getDataBedBooking($dataBooking->id);
		else :
			$statusBooking = 'no booking';
			$message = "Pasien tidak melakukan pemesanan tempat tidur";
			$dataBooking = NULL;
		endif;

		$result = array('status' => true, 'status_booking' => $statusBooking, 'data' => $dataBooking, 'message' => $message);
		$this->response($result, REST_Controller::HTTP_OK);
	}

	function get_detail_order_kebidanan_get()
	{
		if (!$this->get('id', true)) :
			$this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
		endif;

		$data = $this->m_order_kebidanan->getDataDetailOrderKebidanan($this->get('id', true));
		if ($data) :
			$this->response($data, REST_Controller::HTTP_OK);
		endif;
	}

    function get_available_bed_get() 
	{
		$id_bangsal = $this->get('id_bangsal', true);
		$keterangan = $this->get('keterangan', true);
		$data = $this->m_order_kebidanan->getDataAvailableBed($id_bangsal, $keterangan);
		$this->response($data, REST_Controller::HTTP_OK);
	}

	function send_to_kebidanan_post() {
		// Validasi Parameter 
		if (safe_post('id_pendaftaran') === '' | safe_post('id_bed') === '' | safe_post('id_order') === '') :
			$response = array('id' => NULL, 'status' => false, 'message' => 'Parameter tidak lengkap, silahkan hubungi bagian IT.');
			$this->response($response, REST_Controller::HTTP_OK);
		endif;

		$dataOrder = $this->db->where('id', safe_post('id_order'))->get('sm_order_kebidanan')->row();
		//  Validasi Data Order Rawat Inap yang sudah terkonfirmasi
		if ($dataOrder && $dataOrder->id_kebidanan !== NULL) :
			$response = array('id' => NULL, 'status' => false, 'message' => 'Order rawat inap sudah dikonfirmasi.');
			$this->response($response, REST_Controller::HTTP_OK);
		endif;
		
		$id_pendaftaran = safe_post('id_pendaftaran');
		$this->db->trans_begin();
		// Jika ada status booking 
		if (safe_post('id_booking') !== '') :
			$this->load->model('booking_bed/Booking_bed_model', 'm_booking_bed');
			$this->m_booking_bed->setBookingStatus(safe_post('id_booking'), 'konfirm');
		endif;

		if (safe_post('penjamin') !== '') :
			$penjamin = safe_post('penjamin');
		else :
			$penjamin = NULL;
		endif;
		
		$no_polish = safe_post('no_polish_penjamin');
		// Tampung data layanan pendaftaran
		$dataLayananPendaftaran = array(
			'id_pendaftaran' => $id_pendaftaran,
			'tanggal_layanan' => $this->datetime,
			'id_unit_layanan' => (safe_post('id_layanan') !== '' ? safe_post('id_layanan') : NULL), 
			'id_dokter' => NULL,
			'no_antrian' => NULL,
			'jenis_layanan' => "Rawat Inap",
			'kondisi' => 'Hidup',
			'resusitasi' => 0,
			'cara_bayar' => safe_post('cara_bayar'),
			'id_penjamin' => $penjamin,
			'no_polish' => $no_polish,
			'terklaim' => (safe_post('cara_bayar')  === 'Tunai' ? '1' : '0'),
			'id_users' => $this->session->userdata('id_translucent')
		);
		
		// simpan ke table layanan pendaftaran
		$this->load->model('pendaftaran/Pendaftaran_model', 'm_pendaftaran');
		$id_layanan_pendaftaran = $this->m_pendaftaran->simpanDataLayananPendaftaran($dataLayananPendaftaran);
		$diskon = NULL;
		// get nilai diskon jika dia penjamin
		if ($penjamin !== NULL) :
			$diskon = $this->db->where('id', $penjamin)->get('sm_penjamin')->row()->diskon;
		endif;
		
		$id_bed = safe_post('id_bed');
		// get data bed dengan id bed
		$this->load->model('bed/Bed_model', 'm_bed');
		$dataBed = $this->m_bed->getDataBedById($id_bed);

		// get tarif kamar rawat inap
		$getTarifKamarKebidanan = $this->db->query("select nominal from sm_tarif_kamar_ranap where id_bangsal = '".$dataBed->id_bangsal."' and id_kelas = '".$dataBed->id_kelas."'")->row();
		$dataKebidanan = array(
			'id_layanan_pendaftaran' => $id_layanan_pendaftaran,
			'id_bangsal' => $dataBed->id_bangsal,
			'id_kelas' => $dataBed->id_kelas,
			'id_bed' => $id_bed,
			'no_ruang' => $dataBed->no_ruang,
			'no_bed' => $dataBed->no_bed,
			'waktu_masuk' => $this->datetime,
			'waktu_keluar' => NULL,
			'total_hari' => 1,
			'nominal' => (isset($getTarifKamarKebidanan->nominal) ? $getTarifKamarKebidanan->nominal : ''),
			'id_penjamin' => $penjamin,
			'no_polish' => $no_polish,
			'diskon' => $diskon,
			'konfirmasi_kebidanan' => 'Tidak'
		);
		
		// save to kebidanan table
		$id_kebidanan = $this->m_order_kebidanan->simpandataKebidanan($dataKebidanan);
		$this->m_order_kebidanan->setStatusBed($id_bed, safe_post('kelamin'), 'Siap Dipakai');
		$this->m_order_kebidanan->setOrderKebidanan(safe_post('id_order'), $id_kebidanan);
		
		// post kedalam pembayaran kasir
		$this->load->model('pelayanan/Pelayanan_model', 'm_pelayanan');
		$this->m_pelayanan->updatePembayaran($id_pendaftaran, $id_layanan_pendaftaran, $id_layanan_pendaftaran, 'Rawat Inap', 0, 0);
		if ($this->db->trans_status() === false) :
			$this->db->trans_rollback();
			$status = false;
			$message = 'Gagal masuk kebidanan. Silahkan hubungi bagian IT.';
		else :
			$this->db->trans_commit();
			$status = true;
			$message = 'Berhasil masuk kebidanan dan menunggu dikonfirmasi.';
		endif;
		
		$response =array('id' => $id_kebidanan, 'status' => $status, 'message' => $message);
		$this->response($response, REST_Controller::HTTP_OK);
	}

	function simpan_batal_order_kebidanan_post()
	{
		if (safe_post('id_order') === '') :
			$this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
		endif;

		$status = $this->m_order_kebidanan->updatePembatalanOrderKebidanan(safe_post('id_order'), safe_post('keterangan'));
		$this->response($status, REST_Controller::HTTP_OK); // (200)
	}
}
