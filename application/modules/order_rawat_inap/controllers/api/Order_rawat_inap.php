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
class Order_rawat_inap extends REST_Controller
{

    function __construct()
    {
        parent::__construct();
		$this->limit = 10;
		$this->datetime = date('Y-m-d H:i:s');
        $this->load->model('Order_rawat_inap_model', 'm_order_rawat_inap');

        $id_translucent = $this->session->userdata('id_translucent');
        if (empty($id_translucent)) :
            $this->response(array('error' => 'Anda belum login'), REST_Controller::HTTP_UNAUTHORIZED);
            exit();
        endif;
    }

    function get_list_order_rawat_inap_get()
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
        
        $data            = $this->m_order_rawat_inap->getListDataOrderRawatInap($this->limit, $start, $search);
        $data['page']    = (int) $this->get('page');
        $data['limit']   = $this->limit;

        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK); // (200)
        endif;
	}
	
	function simpan_batal_order_rawat_inap_post()
	{
		if (safe_post('id_order') === '') :
			$this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
		endif;

		$status = $this->m_order_rawat_inap->updatePembatalanOrderRawatInap(safe_post('id_order'), safe_post('keterangan'));
		$this->response($status, REST_Controller::HTTP_OK); // (200)
	}

	function check_booking_status_get() 
	{
		if (!$this->get('no_rm', true)) :
			$result = array('status' => false, 'message' => 'Parameter tidak lengkap');
			$this->response($result, REST_Controller::HTTP_OK);
		endif;

		$dataBooking = $this->m_order_rawat_inap->checkBookingStatus($this->get('no_rm', true));
		if ($dataBooking) :
			$statusBooking = 'booking';
			$message = 'Pasien telah melakukan pemesanan tempat tidur';
			$dataBooking = $this->m_order_rawat_inap->getDataBedBooking($dataBooking->id);
		else :
			$statusBooking = 'no booking';
			$message = "Pasien tidak melakukan pemesanan tempat tidur";
			$dataBooking = NULL;
		endif;

		$result = array('status' => true, 'status_booking' => $statusBooking, 'data' => $dataBooking, 'message' => $message);
		$this->response($result, REST_Controller::HTTP_OK);
	}

	function get_detail_order_rawat_inap_get()
	{
		if (!$this->get('id', true)) :
			$this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
		endif;

		$data = $this->m_order_rawat_inap->getDataDetailOrderRawatInap($this->get('id', true));
		if ($data) :
			$this->response($data, REST_Controller::HTTP_OK);
		endif;
	}

	function get_available_bed_get() 
	{
		$id_bangsal = $this->get('id_bangsal', true);
		$keterangan = $this->get('keterangan', true);
		$data = $this->m_order_rawat_inap->getDataAvailableBed($id_bangsal, $keterangan);
		$this->response($data, REST_Controller::HTTP_OK);
	}

	function send_to_rawat_inap_post() {
		// Validasi Parameter 
		if (safe_post('id_pendaftaran') === '' | safe_post('id_bed') === '' | safe_post('id_order') === '') :
			$response = array('id' => NULL, 'status' => false, 'message' => 'Parameter tidak lengkap, silahkan hubungi bagian IT.');
			$this->response($response, REST_Controller::HTTP_OK);
		endif;

		$dataOrder = $this->db->where('id', safe_post('id_order'))->get('sm_order_rawat_inap')->row();
		//  Validasi Data Order Rawat Inap yang sudah terkonfirmasi
		if ($dataOrder && $dataOrder->id_rawat_inap !== NULL) :
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

		$this->load->model('satu_sehat/Satu_sehat_model', 'sehat');
		$cekValiditasServRequest = $this->sehat->cekDataLayananPendaftaran((int)$dataOrder->id_layanan_pendaftaran);

		if($cekValiditasServRequest->jenis_layanan === 'Poliklinik'){

			$this->load->model('pelayanan/Pelayanan_model', 'pelayanan');
			$this->pelayanan->serviceRequestStatus((int)$dataOrder->id_layanan_pendaftaran, 'Rawat Inap', 'layanan', null, $id_layanan_pendaftaran);

		}

		$id_bed = safe_post('id_bed');
		// get data bed dengan id bed
		$this->load->model('bed/Bed_model', 'm_bed');
		$dataBed = $this->m_bed->getDataBedById($id_bed);

		// get tarif kamar rawat inap
		$getTarifKamarRanap = $this->db->query("select nominal from sm_tarif_kamar_ranap where id_bangsal = '".$dataBed->id_bangsal."' and id_kelas = '".$dataBed->id_kelas."'")->row();
		$dataRawatInap = array(
			'id_layanan_pendaftaran' => $id_layanan_pendaftaran,
			'id_bangsal' => $dataBed->id_bangsal,
			'id_kelas' => $dataBed->id_kelas,
			'id_bed' => $id_bed,
			'no_ruang' => $dataBed->no_ruang,
			'no_bed' => $dataBed->no_bed,
			'waktu_masuk' => $this->datetime,
			'waktu_keluar' => NULL,
			'total_hari' => 1,
			'nominal' => (isset($getTarifKamarRanap->nominal) ? $getTarifKamarRanap->nominal : ''),
			'id_penjamin' => $penjamin,
			'no_polish' => $no_polish,
			'diskon' => $diskon,
			'konfirmasi_ranap' => 'Tidak'
		);

		// simpan ke rawat table inap
		$id_rawat_inap = $this->m_order_rawat_inap->simpanDataRawatInap($dataRawatInap);
		$this->m_order_rawat_inap->setStatusBed($id_bed, safe_post('kelamin'), 'Siap Dipakai');
		$this->m_order_rawat_inap->setOrderRawatInap(safe_post('id_order'), $id_rawat_inap);

		// post kedalam pembayaran kasir
		$this->load->model('pelayanan/Pelayanan_model', 'm_pelayanan');
		$this->m_pelayanan->updatePembayaran($id_pendaftaran, $id_layanan_pendaftaran, $id_layanan_pendaftaran, 'Rawat Inap', 0, 0);
		if ($this->db->trans_status() === false) :
			$this->db->trans_rollback();
			$status = false;
			$message = 'Gagal masuk rawat inap. Silahkan hubungi bagian IT.';
		else :
			$this->db->trans_commit();
			$status = true;
			$message = 'Berhasil masuk rawat inap dan menunggu dikonfirmasi.';
		endif;
		
		$response =array('id' => $id_rawat_inap, 'status' => $status, 'message' => $message);
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
		// ambil data rawat inap sebelumnya
		$dataRanapBefore = $this->db->where('id_layanan_pendaftaran', $id_layanan_pendaftaran, true)->get('sm_rawat_inap')->row();
		// get data bed dengan id bed
		$this->load->model('bed/Bed_model', 'm_bed');
		$dataBed = $this->m_bed->getDataBedById($id_bed);
		$dataBedBefore = $this->m_bed->getDataBedById($dataRanapBefore->id_bed);
		
		$catatanBed = "Bed Sebelumnya : ".$dataBedBefore->nama." kelas ".$dataBedBefore->kelas." ruang ".$dataRanapBefore->no_ruang." bed ".$dataRanapBefore->no_bed;
		$catatanBed .= "<br>Bed Tujuan : ".$dataBed->nama." kelas ".$dataBed->kelas." ruang ".$dataBed->no_ruang." bed ".$dataBed->no_bed;

		$sqlCheckBed = "select count(*) as jumlah from sm_rawat_inap where id_bed = '".$dataRanapBefore->id_bed."' and checkout = '0'";
		$dataCheckCount = $this->db->query($sqlCheckBed)->row()->jumlah;
		if ($dataCheckCount <= 1) :
			// update data bednya
			$dataUpdateBed = array('keterangan' => 'Tersedia', 'penghuni' => NULL);
			$this->db->where('id', $dataRanapBefore->id_bed)->update('sm_bed', $dataUpdateBed);
		endif;
		// get tarif kamar rawat inap
		$getTarifKamarRanap = $this->db->query("select nominal from sm_tarif_kamar_ranap where id_bangsal = '".$dataBed->id_bangsal."' and id_kelas = '".$dataBed->id_kelas."'")->row();
		$dataRawatInap = array(
			'id_bangsal' => $dataBed->id_bangsal,
			'id_kelas' => $dataBed->id_kelas,
			'id_bed' => $id_bed,
			'no_ruang' => $dataBed->no_ruang,
			'no_bed' => $dataBed->no_bed,
			'nominal' => (isset($getTarifKamarRanap->nominal) ? $getTarifKamarRanap->nominal : ''),
		);

		// update ke table rawat inap
		$this->db->where('id_layanan_pendaftaran', $id_layanan_pendaftaran, true)->update('sm_rawat_inap', $dataRawatInap);
		$this->m_order_rawat_inap->setStatusBed($id_bed, safe_post('kelamin'));

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
