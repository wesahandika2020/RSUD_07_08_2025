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
class Order_vk extends REST_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->limit = 10;
		$this->datetime = date('Y-m-d H:i:s');
		$this->load->model('Order_vk_model', 'm_order_vk');

		$id_translucent = $this->session->userdata('id_translucent');
		if (empty($id_translucent)) :
			$this->response(array('error' => 'Anda belum login'), REST_Controller::HTTP_UNAUTHORIZED);
			exit();
		endif;
	}

	function get_list_data_vk_get()
	{
		if (!$this->get('page')) :
			$this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
		endif;

		$start = ($this->get('page') - 1) * $this->limit;
		$search = [
			'tanggal_awal' => safe_get('tanggal_awal'),
			'tanggal_akhir' => safe_get('tanggal_akhir'),
			'pasien' => safe_get('pasien'),
		];

		$data = $this->m_order_vk->getListDataOrderVK($this->limit, $start, $search);
		$data['page'] = (int) $this->get('page');
		$data['limit'] = $this->limit;

		if ($data) :
			$this->response($data, REST_Controller::HTTP_OK); // (200)
		else :
			$this->response(array('error' => 'Data is Not Found'), REST_Controller::HTTP_NOT_FOUND);
		endif;
	}

	function simpan_pelayanan_vk_post()
	{
		$id_jadwal_vk = safe_post('id_jadwal_vk');
		$check_bayar = $this->db->select('count(*) as count')->from('sm_jadwal_kamar_operasi')->where('id_history_pembayaran is not null')->where('id', $id_jadwal_vk, true)->get()->row()->count;
		if (0 < $check_bayar) :
			$data['status'] = false;
			$data['message'] = "Gagal melakukan perubahan karena sudah dilakukan pembayaran!";
		else :
			// $catatan = "<strong>Sebelum Edit : </strong><br>";
			$dokter_bedah_before = isset($_POST['dokter_bedah_before']) ? safe_post('dokter_bedah_before') : NULL;
			$dokter_anesthesi_before = isset($_POST['dokter_anesthesi_before']) ? safe_post('dokter_anesthesi_before') : NULL;
			$asisten_operator_before = isset($_POST['asisten_operator_before']) ? safe_post('asisten_operator_before') : NULL;
			$dokter_pendamping_before = isset($_POST['dokter_pendamping_before']) ? safe_post('dokter_pendamping_before') : NULL;
			$perawat_before = isset($_POST['perawat_before']) ? safe_post('perawat_before') : NULL;
			$instrumental_before = isset($_POST['instrumental_before']) ? safe_post('instrumental_before') : NULL;
			$sirkuler_before = isset($_POST['sirkuler_before']) ? safe_post('sirkuler_before') : NULL;
			$operator = "Dokter Operator : ";
			if ($dokter_bedah_before !== NULL) :
				$operator .= "<br>";
				foreach ($dokter_bedah_before as $data_dokter_bedah) :
					$operator .= "&nbsp;* " . $data_dokter_bedah . "<br>";
				endforeach;
			else :
				$operator .= "- <br>";
			endif;
			$anesthesi = "Dokter Anesthesi : ";
			if ($dokter_anesthesi_before !== NULL) :
				$anesthesi .= "<br>";
				foreach ($dokter_anesthesi_before as $data_dokter_anesthesi) :
					$anesthesi .= "&nbsp;* " . $data_dokter_anesthesi . "<br>";
				endforeach;
			else :
				$anesthesi .= "- <br>";
			endif;
			// $pendamping = "Tenaga Medis & Non Medis : ";
			// if ($dokter_pendamping_before !== NULL) :
			// 	$pendamping .= "<br>";
			// 	foreach ($dokter_pendamping_before as $data_dokter_pendamping) :
			// 		$pendamping .= "&nbsp;* " . $data_dokter_pendamping . "<br>";
			// 	endforeach;
			// else :
			// 	$pendamping .= "- <br>";
			// endif;
			$asisten_operator = "Asisten Operator : ";
			if ($asisten_operator_before !== NULL) :
				$asisten_operator .= "<br>";
				foreach ($asisten_operator_before as $data_asisten_operator) :
					$asisten_operator .= "&nbsp;* " . $data_asisten_operator . "<br>";
				endforeach;
			else :
				$asisten_operator .= "- <br>";
			endif;
			$perawat = "Perawat Anesthesi : ";
			if ($perawat_before !== NULL) :
				$perawat .= "<br>";
				foreach ($perawat_before as $data_perawat) :
					$perawat .= "&nbsp;* " . $data_perawat . "<br>";
				endforeach;
			else :
				$perawat .= "- <br>";
			endif;
			$instrumental = "Instrumental : ";
			if ($instrumental_before !== NULL) :
				$instrumental .= "<br>";
				foreach ($instrumental_before as $data_perawat) :
					$instrumental .= "&nbsp;* " . $data_perawat . "<br>";
				endforeach;
			else :
				$instrumental .= "- <br>";
			endif;
			$sirkuler = "Sirkuler : ";
			if ($sirkuler_before !== NULL) :
				$sirkuler .= "<br>";
				foreach ($sirkuler_before as $data_perawat) :
					$sirkuler .= "&nbsp;* " . $data_perawat . "<br>";
				endforeach;
			else :
				$sirkuler .= "- <br>";
			endif;
			// $catatan_nakes = $catatan . $operator . $anesthesi . $pendamping . $perawat;
			$id_layanan_pendaftaran = $this->db->select("id_layanan_pendaftaran")->from('sm_jadwal_kamar_operasi')->where('id', $id_jadwal_vk, true)->get()->row()->id_layanan_pendaftaran;
			$catatan_tindakan = "<strong>Sebelum Edit : </strong><br>";
			$operator_before = isset($_POST['id_operator_before']) ? safe_post('id_operator_before') : NULL;
			$tindakan_before = isset($_POST['id_tindakan_before']) ? safe_post('id_tindakan_before') : NULL;
			if ($tindakan_before !== NULL) :
				foreach ($tindakan_before as $i => $value) :
					$catatan_tindakan .= "&nbsp;* " . $operator_before[$i] . " - " . $value . "<br>";
				endforeach;
			else :
				$catatan_tindakan .= "- <br>";
			endif;
			$data = $this->m_order_vk->simpanPelayananVK();
			if ($data['status']) :
				// record logs
				$this->load->model('logs/Logs_model', 'logs');
				// $this->logs->recordAdminLogs($id_layanan_pendaftaran, 'Edit Operator VK', $catatan_nakes);
				$this->logs->recordAdminLogs($id_layanan_pendaftaran, 'Edit Tindakan VK', $catatan_tindakan);
			endif;
		endif;
		$this->response($data, REST_Controller::HTTP_OK);
	}

	function get_tindakan_tambahan_vk_get()
	{
		$id_jadwal_vk = $this->get('id', true);
		$data = $this->m_order_vk->getDataTindakanTambahanVK($id_jadwal_vk)->result();
		exit(json_encode($data));
	}

	function get_diagnosis_vk_get()
	{
		$id_jadwal_vk = $this->get('id', true);
		$data = $this->m_order_vk->getDataDiagnosisVK($id_jadwal_vk)->result();
		exit(json_encode($data));
	}

	function get_tim_vk_get()
	{
		$id_jadwal_vk = $this->get('id', true);
		$data = $this->m_order_vk->getDataTimVK($id_jadwal_vk)->result();
		exit(json_encode($data));
	}

	function get_bhp_tambahan_vk_get()
	{
		$id_jadwal_vk = $this->get('id', true);
		$data['list'] = $this->m_order_vk->getdataBHPTambahanVK($id_jadwal_vk)->result();
		$data['total'] = $this->m_order_vk->getdataBHPTambahanVK($id_jadwal_vk)->row();
		exit(json_encode($data));
	}

	function hapus_detail_bhp_vk_delete()
	{
		$id_detail = $this->delete('id_detail', true);
		$id_vk = $this->delete('id_vk', true);
		$id_layanan = $this->db->select('id_layanan_pendaftaran')->from('sm_jadwal_kamar_operasi')->where('id', $id_vk, true)->get()->row()->id_layanan_pendaftaran;
		$nama_barang = $this->db->select('b.nama')->from('sm_detail_penjualan as dp')->join('sm_kemasan_barang as kb', 'kb.id = dp.id_kemasan')->join('sm_barang as b', 'b.id = kb.id_barang')->where('dp.id', $id_detail)->get()->row()->nama;
		$data = $this->m_order_vk->deleteDetailBHPVK($id_detail, $id_vk);
		if ($data['status']) :
			// record logs
			$this->load->model('logs/Logs_model', 'm_logs');
			$this->m_logs->recordAdminLogs($id_layanan, 'Hapus BHP VK', 'BHP Dihapus : ' . $nama_barang);
		endif;
		$this->response($data, REST_Controller::HTTP_OK);
	}

	function hapus_detail_tindakan_vk_delete($id_vk)
	{
		$status = $this->m_order_vk->deleteTindakanVk($id_vk);
		if ($status) :
			$response = array('status' => $status, 'message' => 'Berhasil menghapus Pemantauan Pasien Resiko Jatuh Pasien Anak!');
		else :
			$response = array('status' => $status, 'message' => 'Gagal menghapus Pemantauan Pasien Resiko Jatuh Pasien Anak!');
		endif;
		$this->response($response, REST_Controller::HTTP_OK);
	}
}
