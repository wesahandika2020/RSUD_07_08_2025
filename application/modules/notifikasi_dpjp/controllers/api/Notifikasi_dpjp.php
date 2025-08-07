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
class Notifikasi_dpjp extends REST_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->limit = 10;
		$this->batas = 10;
		$this->load->model('Notifikasi_dpjp_model', 'm_notifikasi_dpjp');
		$this->load->model('pelayanan/Pelayanan_model', 'pelayanan');
		date_default_timezone_set('Asia/Jakarta');
		$this->datetime = date('Y-m-d H:i:s');
		$id_translucent = $this->session->userdata('id_translucent');
		if (empty($id_translucent)) :
			$this->response(array('error' => 'Anda belum login'), REST_Controller::HTTP_UNAUTHORIZED);
			exit();
		endif;
	}

	public function get_list_notifikasi_dpjp_get()
	{
	
		if (!$this->get('page')) {
			$this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);

			return;
		}

		$search = [
			'periode_laporan' 	=> safe_get('periode_laporan'),
			'tanggal_harian'  	=> safe_get('tanggal_harian'),
			'bulan'           	=> safe_get('bulan'),
			'tahun'           	=> safe_get('tahun'),
			'tanggal_awal'	  	=> safe_get('tanggal_awal'),
			'tanggal_akhir'   	=> safe_get('tanggal_akhir'),
			'tanggal_awal'   	=> safe_get('tanggal_awal'),
			'tanggal_akhir'  	=> safe_get('tanggal_akhir'),
			'id_dokter'      	=> safe_get('id_dokter'),
		];

		$start = (($this->get('page') - 1) * $this->batas);
		$data = $this->m_notifikasi_dpjp->listDpjp($this->batas, $start, $search);
		$data['page']  = (int) $this->get('page');
		$data['limit'] = $this->batas;

		if ($data) {
			$this->response($data, REST_Controller::HTTP_OK);
		}
	}

	public function get_pasien_notif_dpjp_get()
	{
		$id_dokter = $this->get('id_dokter');
		$tanggal = $this->get('tanggal');

		$data = $this->m_notifikasi_dpjp->getPasienNotifDpjp($id_dokter, $tanggal);
		$this->response($data, REST_Controller::HTTP_OK);
	}

	public function simpan_status_pengiriman_post()
	{    
		// Ambil data dari request
		$id_dokter = $this->post('id_dokter');
		$tanggal = $this->post('tanggal');
		$status = $this->post('status');

		// Mulai transaksi
		$this->db->trans_begin();

		// Data untuk disimpan
		$data = array(
			'id_dokter'  => $id_dokter,
			'tanggal'    => $tanggal,
			'status'     => $status,
			'updated_date' => $this->datetime, // Jangan lupa koma setelah 'status' => $status
		);

		// Cek apakah sudah ada data dengan id_dokter dan tanggal yang sama
		$this->db->where('id_dokter', $id_dokter);
		$this->db->where('tanggal', $tanggal); // Pastikan juga mengecek tanggal
		$existing = $this->db->get('sm_notif_dpjp')->row();

		if ($existing) {
			// Jika data dengan id_dokter dan tanggal sama ada, lakukan update
			$this->db->where('id_dokter', $id_dokter);
			$this->db->where('tanggal', $tanggal); // Menambahkan filter berdasarkan tanggal
			$this->db->update('sm_notif_dpjp', $data);

			// Cek jika transaksi sukses
			if ($this->db->trans_status() === FALSE) {
				$this->db->trans_rollback();
				$this->response([
					'status' => 'error',
					'message' => 'Gagal memperbarui status pengiriman.'
				], REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
				return;
			}

			$response_data = [
				'status'  => 'success',
				'message' => 'Status pengiriman berhasil diperbarui.',
				'data'    => $data
			];
		} else {
			// Jika data dengan id_dokter dan tanggal yang sama tidak ada, lakukan insert
			$this->db->insert('sm_notif_dpjp', $data);

			// Cek jika transaksi sukses
			if ($this->db->trans_status() === FALSE) {
				$this->db->trans_rollback();
				$this->response([
					'status' => 'error',
					'message' => 'Gagal menyimpan status pengiriman.'
				], REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
				return;
			}

			$response_data = [
				'status'  => 'success',
				'message' => 'Status pengiriman berhasil disimpan.',
				'data'    => $data
			];
		}

		// Jika berhasil, commit transaksi
		$this->db->trans_commit();

		// Kembalikan response
		$this->response($response_data, REST_Controller::HTTP_OK);
	}

}
