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
class Order_intensive_care extends REST_Controller
{

    function __construct()
    {
        parent::__construct();
		$this->limit = 10;
		$this->datetime = date('Y-m-d H:i:s');
        $this->load->model('Order_intensive_care_model', 'm_order_intensive_care');

        $id_translucent = $this->session->userdata('id_translucent');
        if (empty($id_translucent)) :
            $this->response(array('error' => 'Anda belum login'), REST_Controller::HTTP_UNAUTHORIZED);
            exit();
        endif;
    }

    function get_list_order_intensive_care_get()
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
        
        $data            = $this->m_order_intensive_care->getListDataOrderIntensiveCare($this->limit, $start, $search);
        $data['page']    = (int) $this->get('page');
        $data['limit']   = $this->limit;

        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK); // (200)
        endif;
	}
	
	function simpan_batal_order_intensive_care_post()
	{
		if (safe_post('id_order') === '') :
			$this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
		endif;

		$status = $this->m_order_intensive_care->updatePembatalanOrderIntensiveCare(safe_post('id_order'), safe_post('keterangan'));
		$this->response($status, REST_Controller::HTTP_OK); // (200)
	}

	function check_booking_status_get() 
	{
		if (!$this->get('no_rm', true)) :
			$result = array('status' => false, 'message' => 'Parameter tidak lengkap');
			$this->response($result, REST_Controller::HTTP_OK);
		endif;

		$dataBooking = $this->m_order_intensive_care->checkBookingStatus($this->get('no_rm', true));
		if ($dataBooking) :
			$statusBooking = 'booking';
			$message = 'Pasien telah melakukan pemesanan tempat tidur';
			$dataBooking = $this->m_order_intensive_care->getDataBedBooking($dataBooking->id);
		else :
			$statusBooking = 'no booking';
			$message = "Pasien tidak melakukan pemesanan tempat tidur";
			$dataBooking = NULL;
		endif;

		$result = array('status' => true, 'status_booking' => $statusBooking, 'data' => $dataBooking, 'message' => $message);
		$this->response($result, REST_Controller::HTTP_OK);
	}

	function get_detail_order_intensive_care_get()
	{
		if (!$this->get('id', true)) :
			$this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
		endif;

		$data = $this->m_order_intensive_care->getDataDetailOrderIntensiveCare($this->get('id', true));
		if ($data) :
			$this->response($data, REST_Controller::HTTP_OK);
		endif;
	}

	function get_available_bed_get() 
	{
		$id_bangsal = $this->get('id_bangsal', true);
		$keterangan = $this->get('keterangan', true);
		$data = $this->m_order_intensive_care->getDataAvailableBed($id_bangsal, $keterangan);
		$this->response($data, REST_Controller::HTTP_OK);
	}

	function send_to_intensive_care_post() {
		// Validasi Parameter 
		if (safe_post('id_pendaftaran') === '' | safe_post('id_bed') === '' | safe_post('id_order') === '') :
			$response = array('id' => NULL, 'status' => false, 'message' => 'Parameter tidak lengkap, silahkan hubungi bagian IT.');
			$this->response($response, REST_Controller::HTTP_OK);
		endif;

		$dataOrder = $this->db->where('id', safe_post('id_order'))->get('sm_order_intensive_care')->row();
		//  Validasi Data Order Intensive Care yang sudah terkonfirmasi
		if ($dataOrder && $dataOrder->id_intensive_care !== NULL) :
			$response = array('id' => NULL, 'status' => false, 'message' => 'Order intensive care sudah dikonfirmasi.');
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
			'jenis_layanan' => "Intensive Care",
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

		// get tarif kamar intensive care
		$getTarifKamarIcare = $this->db->query("select nominal from sm_tarif_kamar_ranap where id_bangsal = '".$dataBed->id_bangsal."' and id_kelas = '".$dataBed->id_kelas."'")->row();
		$dataIntensiveCare = array(
			'id_layanan_pendaftaran' => $id_layanan_pendaftaran,
			'id_bangsal' => $dataBed->id_bangsal,
			'id_kelas' => $dataBed->id_kelas,
			'id_bed' => $id_bed,
			'no_ruang' => $dataBed->no_ruang,
			'no_bed' => $dataBed->no_bed,
			'waktu_masuk' => $this->datetime,
			'waktu_keluar' => NULL,
			'total_hari' => 1,
			'nominal' => (isset($getTarifKamarIcare->nominal) ? $getTarifKamarIcare->nominal : ''),
			'id_penjamin' => $penjamin,
			'no_polish' => $no_polish,
			'diskon' => $diskon,
			'konfirmasi_icare' => 'Tidak'
		);

		// simpan ke rawat table intensive care
		$id_intensive_care = $this->m_order_intensive_care->simpanDataIntensiveCare($dataIntensiveCare);
		$this->m_order_intensive_care->setStatusBed($id_bed, safe_post('kelamin'), 'Siap Dipakai');
		$this->m_order_intensive_care->setOrderIntensiveCare(safe_post('id_order'), $id_intensive_care);

		// post kedalam pembayaran kasir
		$this->load->model('pelayanan/Pelayanan_model', 'm_pelayanan');
		$this->m_pelayanan->updatePembayaran($id_pendaftaran, $id_layanan_pendaftaran, $id_layanan_pendaftaran, 'Intensive Care', 0, 0);
		if ($this->db->trans_status() === false) :
			$this->db->trans_rollback();
			$status = false;
			$message = 'Gagal masuk intensive care. Silahkan hubungi bagian IT.';
		else :
			$this->db->trans_commit();
			$status = true;
			$message = 'Berhasil masuk intensive care dan menunggu dikonfirmasi.';
		endif;
		
		$response =array('id' => $id_intensive_care, 'status' => $status, 'message' => $message);
		$this->response($response, REST_Controller::HTTP_OK);
	}

	function update_bed_pasien_post() 
	{
		// validasi Parameter 
		if (safe_post('id_layanan_pendaftaran') === '' | safe_post('id_bed') === '') :
			$response = array('status' => false, 'message' => 'Parameter tidak lengkap, silahkan hubungi bagian IT.');
			$this->response($response, REST_Controller::HTTP_OK);
		endif;

		$id_bed = safe_post('id_bed');
		$id_layanan_pendaftaran = safe_post('id_layanan_pendaftaran');
		// ambil data intensive care sebelumnya
		$dataIcareBefore = $this->db->where('id_layanan_pendaftaran', $id_layanan_pendaftaran, true)->get('sm_intensive_care')->row();
		// get data bed dengan id bed
		$this->load->model('bed/Bed_model', 'm_bed');
		$dataBed = $this->m_bed->getDataBedById($id_bed);
		$dataBedBefore = $this->m_bed->getDataBedById($dataIcareBefore->id_bed);
		
		$catatanBed = "Bed Sebelumnya : ".$dataBedBefore->nama." kelas ".$dataBedBefore->kelas." ruang ".$dataIcareBefore->no_ruang." bed ".$dataIcareBefore->no_bed;
		$catatanBed .= "<br>Bed Tujuan : ".$dataBed->nama." kelas ".$dataBed->kelas." ruang ".$dataBed->no_ruang." bed ".$dataBed->no_bed;

		$sqlCheckBed = "select count(*) as jumlah from sm_intensive_care where id_bed = '".$dataIcareBefore->id_bed."' and checkout = '0'";
		$dataCheckCount = $this->db->query($sqlCheckBed)->row()->jumlah;
		if ($dataCheckCount <= 1) :
			// update data bednya
			$dataUpdateBed = array('keterangan' => 'Tersedia', 'penghuni' => NULL);
			$this->db->where('id', $dataIcareBefore->id_bed)->update('sm_bed', $dataUpdateBed);
		endif;
		// get tarif kamar intensive care
		$getTarifKamarIcare = $this->db->query("select nominal from sm_tarif_kamar_ranap where id_bangsal = '".$dataBed->id_bangsal."' and id_kelas = '".$dataBed->id_kelas."'")->row();
		$dataIntensiveCare = array(
			'id_bangsal' => $dataBed->id_bangsal,
			'id_kelas' => $dataBed->id_kelas,
			'id_bed' => $id_bed,
			'no_ruang' => $dataBed->no_ruang,
			'no_bed' => $dataBed->no_bed,
			'nominal' => (isset($getTarifKamarIcare->nominal) ? $getTarifKamarIcare->nominal : ''),
		);

		// update ke table intensive care
		$this->db->where('id_layanan_pendaftaran', $id_layanan_pendaftaran, true)->update('sm_intensive_care', $dataIntensiveCare);
		$this->m_order_intensive_care->setStatusBed($id_bed, safe_post('kelamin'));

		if ($this->db->trans_status() === false) :
			$this->db->trans_rollback();
			$status = false;
			$message = "Gagal memindahkan pasien ke ruangan lain";
		else :
			$this->db->trans_commit();
			$status = true;
			$message = "Berhasil memindahkan pasien ke ruangan lain";
		endif;

		// catat log transaksi
		$this->load->model('logs/Logs_model', 'm_logs');
		$this->m_logs->recordAdminLogs($id_layanan_pendaftaran, 'Edit Bed', $catatanBed);
		
		$response = array('status' => $status, 'message' => $message);
		$this->response($response, REST_Controller::HTTP_OK);
	}
}
