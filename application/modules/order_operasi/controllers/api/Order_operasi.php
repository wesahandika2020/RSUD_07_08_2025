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
class Order_operasi extends REST_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->limit = 10;
		$this->datetime = date('Y-m-d H:i:s');
		$this->load->model('Order_operasi_model', 'm_order_operasi');
		$this->load->model('pendaftaran/Pendaftaran_model', 'm_pendaftaran');

		$id_translucent = $this->session->userdata('id_translucent');
		if (empty($id_translucent)) :
			$this->response(array('error' => 'Anda belum login'), REST_Controller::HTTP_UNAUTHORIZED);
			exit();
		endif;
	}

	function get_list_jadwal_operasi_get()
	{
		if (!$this->get('page')) :
			$this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
		endif;

		$start = ($this->get('page') - 1) * $this->limit;
		$search = [
			'tanggal_awal' => safe_get('tanggal_awal'),
			'tanggal_akhir' => safe_get('tanggal_akhir'),
			'pasien' => safe_get('pasien'),
			'bobot' => safe_get('bobot'),
			'timing' => safe_get('timing'),
			'operasi' => safe_get('tindakan'),
			'kamar' => safe_get('kama_operasi'),
			'nadis' => safe_get('operator'),
			'status' => safe_get('status')
		];

		$data = $this->m_order_operasi->getListDataJadwalOperasi($this->limit, $start, $search);
		$data['page'] = (int) $this->get('page');
		$data['limit'] = $this->limit;

		if ($data) :
			$this->response($data, REST_Controller::HTTP_OK); // (200)
		else :
			$this->response(array('error' => 'Data is Not Found'), REST_Controller::HTTP_NOT_FOUND);
		endif;
	}

	function pembatalan_order_operasi_post()
	{
		$data = $this->m_order_operasi->pembatalanJadwalOperasi($this->post('id', true));
		$this->response($data, REST_Controller::HTTP_OK);
	}

	function simpan_konfirmasi_jadwal_operasi_post()
	{
		$data = $this->m_order_operasi->simpanKonfirmasiJadwalOperasi();
		$this->response($data, REST_Controller::HTTP_OK);
	}

	function get_list_data_operasi_get()
	{
		if (!$this->get('page')) :
			$this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
		endif;

		$start = ($this->get('page') - 1) * $this->limit;
		$search = [
			'tanggal_awal' => safe_get('tanggal_awal'),
			'tanggal_akhir' => safe_get('tanggal_akhir'),
			'pasien' => safe_get('pasien'),
			'bobot' => safe_get('bobot'),
			'timing' => safe_get('timing'),
			'operasi' => safe_get('tindakan'),
			'kamar' => safe_get('kama_operasi'),
			'status' => 'Confirmed',
			'urut' => 'Status',
		];

		$data = $this->m_order_operasi->getListDataJadwalOperasi($this->limit, $start, $search);
		$data['page'] = (int) $this->get('page');
		$data['limit'] = $this->limit;

		if ($data) :
			$this->response($data, REST_Controller::HTTP_OK); // (200)
		else :
			$this->response(array('error' => 'Data is Not Found'), REST_Controller::HTTP_NOT_FOUND);
		endif;
	}

	function simpan_pelayanan_operasi_post()
	{
		$id_jadwal_operasi = safe_post('id_jadwal_operasi');
		$check_bayar = $this->db->select('count(*) as count')->from('sm_jadwal_kamar_operasi')->where('id_history_pembayaran is not null')->where('id', $id_jadwal_operasi, true)->get()->row()->count;
		if (0 < $check_bayar) :
			$data['status'] = false;
			$data['message'] = "Gagal melakukan perubahan karena sudah dilakukan pembayaran!";
		else :
			$catatan = "<strong>Sebelum Edit : </strong><br>";
			$dokter_bedah_before = isset($_POST['dokter_bedah_before']) ? safe_post('dokter_bedah_before') : NULL;
			$dokter_anesthesi_before = isset($_POST['dokter_anesthesi_before']) ? safe_post('dokter_anesthesi_before') : NULL;
			$asisten_operator_before = isset($_POST['asisten_operator_before']) ? safe_post('asisten_operator_before') : NULL;
			$dokter_pendamping_before = isset($_POST['dokter_pendamping_before']) ? safe_post('dokter_pendamping_before') : NULL;
			$perawat_before = isset($_POST['perawat_before']) ? safe_post('perawat_before') : NULL;
			$instrumental_before = isset($_POST['instrumental_before']) ? safe_post('instrumental_before') : NULL;
			$sirkuler_before = isset($_POST['sirkuler_before']) ? safe_post('sirkuler_before') : NULL;
			$dokter_resusitasi_before = isset($_POST['dokter_resusitasi_before']) ? safe_post('dokter_resusitasi_before') : NULL;
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
			$resusitasi = "Dokter Resusitasi : ";
			if ($dokter_resusitasi_before !== NULL) :
				$resusitasi .= "<br>";
				foreach ($dokter_resusitasi_before as $data_dokter_resusitasi) :
					$resusitasi .= "&nbsp;* " . $data_dokter_resusitasi . "<br>";
				endforeach;
			else :
				$resusitasi .= "- <br>";
			endif;
			$catatan_nakes = $catatan . $operator . $anesthesi . $resusitasi . $perawat;
			// $catatan_nakes = $catatan . $operator . $anesthesi . $resusitasi . $pendamping . $perawat;
			$id_layanan_pendaftaran = $this->db->select("id_layanan_pendaftaran")->from('sm_jadwal_kamar_operasi')->where('id', $id_jadwal_operasi, true)->get()->row()->id_layanan_pendaftaran;
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
			$data = $this->m_order_operasi->simpanPelayananOperasi();
			if ($data['status']) :
				// record logs
				$this->load->model('logs/Logs_model', 'logs');
				$this->logs->recordAdminLogs($id_layanan_pendaftaran, 'Edit Operator Operasi', $catatan_nakes);
				$this->logs->recordAdminLogs($id_layanan_pendaftaran, 'Edit Tindakan Operasi', $catatan_tindakan);
			endif;
		endif;
		$this->response($data, REST_Controller::HTTP_OK);
	}

	function get_tindakan_tambahan_operasi_get()
	{
		$id_jadwal_operasi = $this->get('id', true);
		$data = $this->m_order_operasi->getDataTindakanTambahanOperasi($id_jadwal_operasi)->result();
		exit(json_encode($data));
	}

	function get_diagnosis_operasi_get()
	{
		$id_jadwal_operasi = $this->get('id', true);
		$data = $this->m_order_operasi->getDataDiagnosisOperasi($id_jadwal_operasi)->result();
		exit(json_encode($data));
	}

	function get_tim_operasi_get()
	{
		$id_jadwal_operasi = $this->get('id', true);
		$data = $this->m_order_operasi->getDataTimOperasi($id_jadwal_operasi)->result();
		exit(json_encode($data));
	}

	function get_bhp_tambahan_operasi_get()
	{
		$id_jadwal_operasi = $this->get('id', true);
		$data['list'] = $this->m_order_operasi->getdataBHPTambahanOperasi($id_jadwal_operasi)->result();
		$data['total'] = $this->m_order_operasi->getdataBHPTambahanOperasi($id_jadwal_operasi)->row();
		exit(json_encode($data));
	}

	function hapus_detail_bhp_operasi_delete()
	{
		$id_detail = $this->delete('id_detail', true);
		$id_operasi = $this->delete('id_operasi', true);
		$id_layanan = $this->db->select('id_layanan_pendaftaran')->from('sm_jadwal_kamar_operasi')->where('id', $id_operasi, true)->get()->row()->id_layanan_pendaftaran;
		$nama_barang = $this->db->select('b.nama')->from('sm_detail_penjualan as dp')->join('sm_kemasan_barang as kb', 'kb.id = dp.id_kemasan')->join('sm_barang as b', 'b.id = kb.id_barang')->where('dp.id', $id_detail)->get()->row()->nama;
		$data = $this->m_order_operasi->deleteDetailBHPOperasi($id_detail, $id_operasi);
		if ($data['status']) :
			// record logs
			$this->load->model('logs/Logs_model', 'm_logs');
			$this->m_logs->recordAdminLogs($id_layanan, 'Hapus BHP Operasi', 'BHP Dihapus : ' . $nama_barang);
		endif;
		$this->response($data, REST_Controller::HTTP_OK);
	}





	// function laporan_operasi_get()
	// {

	// 	$data['pendaftaran_detail'] = "";
	// 	$data['list_laporan_operasi'] = [];

	// 	$data = $this->m_order_operasi->getPendaftaranDetailTindakan($this->get('id_pendaftaran', true), $this->get('id_layanan', true));

	// 	$data['pendaftaran_detail'] = $this->m_order_operasi->getPendaftaranDetailOperasi($this->get('id_layanan_pendaftaran'));
	// 	$data['list_laporan_operasi'] = $this->m_order_operasi->getLaporanOperasi($this->get('id_pendaftaran'));

	// 	// zulvi
	// 	// Laporan Tindakan
	// 	$data['profil'] = $this->m_order_operasi->getProfilPasien($data['pasien_tindakan']->id_pasien);
    //     $data['lt'] = [];
    //     $data['lt'] = $this->m_order_operasi->getLT($this->get('id_pendaftaran'));

	// 	if ($data != null) {
	// 		$this->response($data, REST_Controller::HTTP_OK);
	// 	} else {
	// 		$this->response($data, REST_Controller::HTTP_OK);
	// 	}
	// }

	// function edit_laporan_operasi_get()
	// {

	// 	$data['pendaftaran_detail'] = "";
	// 	$data['laporan_operasi'] = "";


	// 	$data['pendaftaran_detail'] = $this->m_order_operasi->getPendaftaranDetailOperasi($this->get('id_layanan_pendaftaran'));
	// 	$data['laporan_operasi'] = $this->m_order_operasi->getLaporanOperasiByID($this->get('id'));

	// 	if ($data != null) {
	// 		$this->response($data, REST_Controller::HTTP_OK);
	// 	} else {
	// 		$this->response($data, REST_Controller::HTTP_OK);
	// 	}
	// }

	// function hapus_laporan_operasi_post()
	// {
	// 	if (!safe_post('id', true)) :
	// 		$this->response(null, REST_Controller::HTTP_BAD_REQUEST);
	// 	endif;

	// 	$this->db->trans_begin();

	// 	$this->db->where('id', safe_post('id'))->delete('sm_laporan_operasi');

	// 	if ($this->db->trans_status() === false) :
	// 		$this->db->trans_rollback();
	// 		$status = false;
	// 		$message = 'Gagal Hapus Laporan Operasi';
	// 	else :
	// 		$this->db->trans_commit();
	// 		$status = true;
	// 		$message = 'Berhasil Hapus Laporan Operasi';
	// 	endif;

	// 	$this->response(array('status' => $status, 'message' => $message), REST_Controller::HTTP_OK);
	// }

	// function simpan_laporan_operasi_post()
	// {
	// 	$checkDataLaporanOperasi = '';
	// 	if (safe_post('id_lap_operasi') !== '') {
	// 		$checkDataLaporanOperasi =  $this->m_order_operasi->getLaporanOperasiByID(safe_post('id_lap_operasi'));
	// 	}

	// 	$this->db->trans_begin();
	// 	if (empty($checkDataLaporanOperasi)) {

	// 		$data = array(
	// 			'id_layanan_pendaftaran' 	  => safe_post('id_layanan_pendaftaran'),
	// 			'diagnosa_pra_bedah'				=> safe_post('diagnosa_pra_bedah'),
	// 			'diagnosa_pasca_bedah'			=> safe_post('diagnosa_pasca_bedah'),
	// 			'prosedur_operasi'					=> safe_post('prosedur_operasi'),
	// 			'pemeriksaan_specimen' 			=> safe_post('pemeriksaan_specimen_operasi'),
	// 			'pemeriksaan_specimen_lain'	=> safe_post('pemeriksaan_specimen_operasi_lainnya') == '' ? null : safe_post('pemeriksaan_specimen_operasi_lainnya'),
	// 			'golongan_operasi'			 		=> safe_post('golongan_operasi'),
	// 			'kategori_operasi'			 		=> safe_post('kategpri_operasi'),
	// 			'komplikasi'				    		=> safe_post('komplikasi_operasi'),
	// 			'jumlah_darah_hilang' 			=> safe_post('jumlah_darah_hilang_operasi'),
	// 			'transfusi'									=> safe_post('tranfusi_operasi'),
	// 			'pemasangan_implan'					=> safe_post('pemasangan_implan_operasi'),
	// 			'jenis_jumlah'							=> safe_post('jenis_jumlah_operasi'),
	// 			'jenis_anestesi'						=> safe_post('jenis_anestesi_operasi'),
	// 			'jenis_operasi'				 			=> safe_post('laporan_jenis_oeprasi'),
	// 			'jaringan_eksisi'			 			=> safe_post('jaringan_eksisi_oprasi'),
	// 			'tanggal_operasi' 					=> safe_post('laporan_tanggal_operasi') == '' ? null : date2mysql(safe_post('laporan_tanggal_operasi')),
	// 			'mulai_waktu_operasi'				=> safe_post('laporan_jam_mulai_operasi'),
	// 			'selesai_waktu_operasi'		 	=> safe_post('laporan_jam_selesai_operasi'),
	// 			'waktu_operasi'				 			=> safe_post('laporan_durasi_operasi'),
	// 			'id_dokter_bedah'			 			=> safe_post('laporan_dokter_bedah_operasi'),
	// 			'id_asisten'				 				=> safe_post('asisten_operasi') == '' ? null : safe_post('asisten_operasi'),
	// 			'id_instrumentator'			 		=> safe_post('insumentator_operasi') == '' ? null : safe_post('insumentator_operasi'),
	// 			'id_sirkuler'				 				=> safe_post('sirkuler_operasi') == '' ? null : safe_post('sirkuler_operasi'),
	// 			'catatan'					 					=> safe_post('laporan_catatan_operasi'),
	// 			'id_users'					 				=> $this->session->userdata('id_translucent'),
	// 			'created_date'				 			=> $this->datetime

	// 		);

	// 		$this->db->insert('sm_laporan_operasi', $data);
	// 	} else {

	// 		$data = array(
	// 			'diagnosa_pra_bedah'				=> safe_post('diagnosa_pra_bedah'),
	// 			'diagnosa_pasca_bedah'			=> safe_post('diagnosa_pasca_bedah'),
	// 			'prosedur_operasi'					=> safe_post('prosedur_operasi'),
	// 			'pemeriksaan_specimen' 			=> safe_post('pemeriksaan_specimen_operasi'),
	// 			'pemeriksaan_specimen_lain'	=> safe_post('pemeriksaan_specimen_operasi_lainnya') == '' ? null : safe_post('pemeriksaan_specimen_operasi_lainnya'),
	// 			'golongan_operasi'			 		=> safe_post('golongan_operasi'),
	// 			'kategori_operasi'			 		=> safe_post('kategpri_operasi'),
	// 			'komplikasi'				    		=> safe_post('komplikasi_operasi'),
	// 			'jumlah_darah_hilang' 			=> safe_post('jumlah_darah_hilang_operasi'),
	// 			'transfusi'									=> safe_post('tranfusi_operasi'),
	// 			'pemasangan_implan'					=> safe_post('pemasangan_implan_operasi'),
	// 			'jenis_jumlah'							=> safe_post('jenis_jumlah_operasi'),
	// 			'jenis_anestesi'						=> safe_post('jenis_anestesi_operasi'),
	// 			'jenis_operasi'				 			=> safe_post('laporan_jenis_oeprasi'),
	// 			'jaringan_eksisi'			 			=> safe_post('jaringan_eksisi_oprasi'),
	// 			'tanggal_operasi' 					=> safe_post('laporan_tanggal_operasi') == '' ? null : date2mysql(safe_post('laporan_tanggal_operasi')),
	// 			'mulai_waktu_operasi'				=> safe_post('laporan_jam_mulai_operasi'),
	// 			'selesai_waktu_operasi'		 	=> safe_post('laporan_jam_selesai_operasi'),
	// 			'waktu_operasi'				 			=> safe_post('laporan_durasi_operasi'),
	// 			'id_dokter_bedah'			 			=> safe_post('laporan_dokter_bedah_operasi'),
	// 			'id_asisten'				 				=> safe_post('asisten_operasi') == '' ? null : safe_post('asisten_operasi'),
	// 			'id_instrumentator'			 		=> safe_post('insumentator_operasi') == '' ? null : safe_post('insumentator_operasi'),
	// 			'id_sirkuler'				 				=> safe_post('sirkuler_operasi') == '' ? null : safe_post('sirkuler_operasi'),
	// 			'catatan'					 					=> safe_post('laporan_catatan_operasi'),
	// 			'id_users'					 				=> $this->session->userdata('id_translucent'),
	// 			'created_date'				 			=> $this->datetime

	// 		);

	// 		$this->db->where('id', safe_post('id_lap_operasi'));
	// 		$this->db->update('sm_laporan_operasi', $data);
	// 	}

	// 	if ($this->db->trans_status() === false) :
	// 		$this->db->trans_rollback();
	// 		$status = false;
	// 		$message = 'Gagal simpan Surat Keterangan Sehat';
	// 	else :
	// 		$this->db->trans_commit();
	// 		$status = true;
	// 		$message = 'Berhasil simpan Surat Keterangan Sehat';
	// 	endif;

	// 	$this->response(array('status' => $status, 'message' => $message), REST_Controller::HTTP_OK);
	// }


	// function hapus_laporan_tindakan_post()
	// {
	// 	if (!safe_post('id', true)) :
	// 		$this->response(null, REST_Controller::HTTP_BAD_REQUEST);
	// 	endif;

	// 	$this->db->trans_begin();

	// 	$this->db->where('id', safe_post('id'))->delete('sm_laporan_tindakan');

	// 	if ($this->db->trans_status() === false) :
	// 		$this->db->trans_rollback();
	// 		$status = false;
	// 		$message = 'Gagal Hapus Laporan Operasi';
	// 	else :
	// 		$this->db->trans_commit();
	// 		$status = true;
	// 		$message = 'Berhasil Hapus Laporan Operasi';
	// 	endif;

	// 	$this->response(array('status' => $status, 'message' => $message), REST_Controller::HTTP_OK);
	// }

	// function edit_laporan_tindakan_get()
	// {

	// 	// zulvi
	// 	$data = $this->m_order_operasi->getPendaftaranDetailTindakan($this->get('id_pendaftaran', true), $this->get('id_layanan', true));
	// 	$data['profil'] = $this->m_order_operasi->getProfilPasien($data['pasien_tindakan']->id_pasien);

	// 	// Laporan Tindakan
    //     $data['lt'] = [];
    //     $data['lt'] = $this->m_order_operasi->getLTByID($this->get('id_tindakan'));

	// 	if ($data != null) {
	// 		$this->response($data, REST_Controller::HTTP_OK);
	// 	} else {
	// 		$this->response($data, REST_Controller::HTTP_OK);
	// 	}
	// }




	
	// LAPORAN OPERASI LOG
	function laporan_operasi_get(){
		$data['pendaftaran_detail'] = "";
		$data['list_laporan_operasi'] = [];
		$data = $this->m_order_operasi->getPendaftaranDetailTindakan($this->get('id_pendaftaran', true), $this->get('id_layanan', true));
		$data['pendaftaran_detail'] = $this->m_order_operasi->getPendaftaranDetailOperasi($this->get('id_layanan_pendaftaran'));
		$data['list_laporan_operasi'] = $this->m_order_operasi->getLaporanOperasi($this->get('id_pendaftaran'));
		$data['list_laporan_operasi_logs'] = $this->m_order_operasi->getLaporanOperasiLogs($this->get('id_pendaftaran'));	

		// zulvi
		// Laporan Tindakan
		// $data['profil'] = $this->m_order_operasi->getProfilPasien($data['pasien_tindakan']->id_pasien);
        // $data['lt'] = [];
        // $data['lt'] = $this->m_order_operasi->getLT($this->get('id_pendaftaran'));


		if ($data != null) {
			$this->response($data, REST_Controller::HTTP_OK);
		} else {
			$this->response($data, REST_Controller::HTTP_OK);
		}
	}

	// LAPORAN OPERASI LOG
	function simpan_laporan_operasi_post(){
		$checkDataLaporanOperasi = '';
		if (safe_post('id_lap_operasi') !== '') {
			$checkDataLaporanOperasi = $this->m_order_operasi->getLaporanOperasiByID(safe_post('id_lap_operasi'));
		}
		$this->db->trans_begin();
	
		if (empty($checkDataLaporanOperasi)) {
			// INSERT DATA
			$data = array(
				'id_pendaftaran'			=> safe_post('id_pendaftaran'),
				'id_layanan_pendaftaran'    => safe_post('id_layanan_pendaftaran'),
				'diagnosa_pra_bedah'		=> safe_post('diagnosa_pra_bedah'),
				'diagnosa_pasca_bedah'		=> safe_post('diagnosa_pasca_bedah'),
				'prosedur_operasi'			=> safe_post('prosedur_operasi'),
				'pemeriksaan_specimen' 		=> safe_post('pemeriksaan_specimen_operasi'),
				'pemeriksaan_specimen_lain'	=> safe_post('pemeriksaan_specimen_operasi_lainnya') == '' ? null : safe_post('pemeriksaan_specimen_operasi_lainnya'),
				'golongan_operasi'			=> safe_post('golongan_operasi'),
				'kategori_operasi'			=> safe_post('kategpri_operasi'),
				'komplikasi'				=> safe_post('komplikasi_operasi'),
				'jumlah_darah_hilang' 		=> safe_post('jumlah_darah_hilang_operasi'),
				'transfusi'					=> safe_post('tranfusi_operasi'),
				'pemasangan_implan'			=> safe_post('pemasangan_implan_operasi'),
				'jenis_jumlah'				=> safe_post('jenis_jumlah_operasi'),
				'jenis_anestesi'			=> safe_post('jenis_anestesi_operasi'),
				'jenis_operasi'				=> safe_post('laporan_jenis_oeprasi'),
				'jaringan_eksisi'			=> safe_post('jaringan_eksisi_oprasi'),
				'tanggal_operasi' 			=> safe_post('laporan_tanggal_operasi') == '' ? null : date2mysql(safe_post('laporan_tanggal_operasi')),
				'mulai_waktu_operasi'		=> safe_post('laporan_jam_mulai_operasi'),
				'selesai_waktu_operasi'		=> safe_post('laporan_jam_selesai_operasi'),
				'waktu_operasi'				=> safe_post('laporan_durasi_operasi'),
				'id_dokter_bedah'			=> safe_post('laporan_dokter_bedah_operasi'),
				'id_asisten'				=> safe_post('asisten_operasi') == '' ? null : safe_post('asisten_operasi'),
				'id_instrumentator'			=> safe_post('insumentator_operasi') == '' ? null : safe_post('insumentator_operasi'),
				'id_sirkuler'				=> safe_post('sirkuler_operasi') == '' ? null : safe_post('sirkuler_operasi'),
				'catatan'					=> safe_post('laporan_catatan_operasi'),
				'id_users'					=> $this->session->userdata('id_translucent'),
				'created_date'				=> $this->datetime,
				'updated_on'             	=> $this->datetime	
			);
			$this->db->insert('sm_laporan_operasi', $data);
	
		} else {
			// UPDATE DATA
			$data = array(
				'diagnosa_pra_bedah'		=> safe_post('diagnosa_pra_bedah'),
				'diagnosa_pasca_bedah'		=> safe_post('diagnosa_pasca_bedah'),
				'prosedur_operasi'			=> safe_post('prosedur_operasi'),
				'pemeriksaan_specimen' 		=> safe_post('pemeriksaan_specimen_operasi'),
				'pemeriksaan_specimen_lain'	=> safe_post('pemeriksaan_specimen_operasi_lainnya') == '' ? null : safe_post('pemeriksaan_specimen_operasi_lainnya'),
				'golongan_operasi'			=> safe_post('golongan_operasi'),
				'kategori_operasi'			=> safe_post('kategpri_operasi'),
				'komplikasi'				=> safe_post('komplikasi_operasi'),
				'jumlah_darah_hilang' 		=> safe_post('jumlah_darah_hilang_operasi'),
				'transfusi'					=> safe_post('tranfusi_operasi'),
				'pemasangan_implan'			=> safe_post('pemasangan_implan_operasi'),
				'jenis_jumlah'				=> safe_post('jenis_jumlah_operasi'),
				'jenis_anestesi'			=> safe_post('jenis_anestesi_operasi'),
				'jenis_operasi'				=> safe_post('laporan_jenis_oeprasi'),
				'jaringan_eksisi'			=> safe_post('jaringan_eksisi_oprasi'),
				'tanggal_operasi' 			=> safe_post('laporan_tanggal_operasi') == '' ? null : date2mysql(safe_post('laporan_tanggal_operasi')),
				'mulai_waktu_operasi'		=> safe_post('laporan_jam_mulai_operasi'),
				'selesai_waktu_operasi'		=> safe_post('laporan_jam_selesai_operasi'),
				'waktu_operasi'				=> safe_post('laporan_durasi_operasi'),
				'id_dokter_bedah'			=> safe_post('laporan_dokter_bedah_operasi'),
				'id_asisten'				=> safe_post('asisten_operasi') == '' ? null : safe_post('asisten_operasi'),
				'id_instrumentator'			=> safe_post('insumentator_operasi') == '' ? null : safe_post('insumentator_operasi'),
				'id_sirkuler'				=> safe_post('sirkuler_operasi') == '' ? null : safe_post('sirkuler_operasi'),
				'catatan'					=> safe_post('laporan_catatan_operasi'),
				'updated_on'              	=> $this->datetime
			);
	
			$logData = array(
				'id_lap_operasi'			=> $checkDataLaporanOperasi->id, // 🆕 ID utama
				'id_pendaftaran'       		=> $checkDataLaporanOperasi->id_pendaftaran,
				'id_layanan_pendaftaran' 	=> $checkDataLaporanOperasi->id_layanan_pendaftaran,
				'diagnosa_pra_bedah'        => $checkDataLaporanOperasi->diagnosa_pra_bedah,
				'diagnosa_pasca_bedah'      => $checkDataLaporanOperasi->diagnosa_pasca_bedah,
				'prosedur_operasi'          => $checkDataLaporanOperasi->prosedur_operasi,
				'pemeriksaan_specimen'      => $checkDataLaporanOperasi->pemeriksaan_specimen,
				'pemeriksaan_specimen_lain' => $checkDataLaporanOperasi->pemeriksaan_specimen_lain,
				'golongan_operasi'          => $checkDataLaporanOperasi->golongan_operasi,
				'kategori_operasi'          => $checkDataLaporanOperasi->kategori_operasi,
				'komplikasi'             	=> $checkDataLaporanOperasi->komplikasi,
				'jumlah_darah_hilang'       => $checkDataLaporanOperasi->jumlah_darah_hilang,
				'transfusi'             	=> $checkDataLaporanOperasi->transfusi,
				'pemasangan_implan'         => $checkDataLaporanOperasi->pemasangan_implan,
				'jenis_jumlah'             	=> $checkDataLaporanOperasi->jenis_jumlah,
				'jenis_anestesi'            => $checkDataLaporanOperasi->jenis_anestesi,
				'jenis_operasi'             => $checkDataLaporanOperasi->jenis_operasi,
				'jaringan_eksisi'           => $checkDataLaporanOperasi->jaringan_eksisi,
				'tanggal_operasi'           => $checkDataLaporanOperasi->tanggal_operasi,
				'mulai_waktu_operasi'       => $checkDataLaporanOperasi->mulai_waktu_operasi,
				'selesai_waktu_operasi'     => $checkDataLaporanOperasi->selesai_waktu_operasi,
				'waktu_operasi'            	=> $checkDataLaporanOperasi->waktu_operasi,
				'id_dokter_bedah'           => $checkDataLaporanOperasi->id_dokter_bedah,
				'id_asisten'             	=> $checkDataLaporanOperasi->id_asisten,
				'id_instrumentator'         => $checkDataLaporanOperasi->id_instrumentator,
				'id_sirkuler'             	=> $checkDataLaporanOperasi->id_sirkuler,
				'catatan'             		=> $checkDataLaporanOperasi->catatan,
				'id_users'             		=> $checkDataLaporanOperasi->id_users, // ✅ user input pertama
				'updated_by'           		=> $this->session->userdata('id_translucent'), // ✅ user yang edit
				'created_date'         		=> $checkDataLaporanOperasi->created_date,
				'updated_on'           		=> $this->datetime,
				'log_action'           		=> 'update'
			);

			$this->db->insert('sm_laporan_operasi_logs', $logData);
	
			$this->db->where('id', safe_post('id_lap_operasi'));
			$this->db->update('sm_laporan_operasi', $data);
		}
	
		if ($this->db->trans_status() === false) {
			$this->db->trans_rollback();
			$status = false;
			$message = 'Gagal simpan Data';
		} else {
			$this->db->trans_commit();
			$status = true;
			$message = 'Berhasil simpan Data';
		}
	
		$this->response(array('status' => $status, 'message' => $message), REST_Controller::HTTP_OK);
	}

	// LAPORAN OPERASI LOG
	function edit_laporan_operasi_get(){
		$data['pendaftaran_detail'] = "";
		$data['laporan_operasi'] = "";
		$data['pendaftaran_detail'] = $this->m_order_operasi->getPendaftaranDetailOperasi($this->get('id_layanan_pendaftaran'));
		$data['laporan_operasi'] = $this->m_order_operasi->getLaporanOperasiByID($this->get('id'));

		if ($data != null) {
			$this->response($data, REST_Controller::HTTP_OK);
		} else {
			$this->response($data, REST_Controller::HTTP_OK);
		}
	}

	// LAPORAN OPERASI LOG
	function hapus_laporan_operasi_post(){
		if (!safe_post('id', true)) :
			$this->response(null, REST_Controller::HTTP_BAD_REQUEST);
		endif;
		// Ambil data sebelum dihapus
		$LPjHapus = $this->db->where('id', safe_post('id'))->get('sm_laporan_operasi')->row();
		$this->db->trans_begin();
		if ($LPjHapus) {
			// Simpan ke log
			$logDataLP = array(
				'id_lap_operasi'			=> $LPjHapus->id, // 🆕 ID utama
				'id_pendaftaran'       		=> $LPjHapus->id_pendaftaran,
				'id_layanan_pendaftaran' 	=> $LPjHapus->id_layanan_pendaftaran,
				'diagnosa_pra_bedah'        => $LPjHapus->diagnosa_pra_bedah,
				'diagnosa_pasca_bedah'      => $LPjHapus->diagnosa_pasca_bedah,
				'prosedur_operasi'          => $LPjHapus->prosedur_operasi,
				'pemeriksaan_specimen'      => $LPjHapus->pemeriksaan_specimen,
				'pemeriksaan_specimen_lain' => $LPjHapus->pemeriksaan_specimen_lain,
				'golongan_operasi'          => $LPjHapus->golongan_operasi,
				'kategori_operasi'          => $LPjHapus->kategori_operasi,
				'komplikasi'             	=> $LPjHapus->komplikasi,
				'jumlah_darah_hilang'       => $LPjHapus->jumlah_darah_hilang,
				'transfusi'             	=> $LPjHapus->transfusi,
				'pemasangan_implan'         => $LPjHapus->pemasangan_implan,
				'jenis_jumlah'             	=> $LPjHapus->jenis_jumlah,
				'jenis_anestesi'            => $LPjHapus->jenis_anestesi,
				'jenis_operasi'             => $LPjHapus->jenis_operasi,
				'jaringan_eksisi'           => $LPjHapus->jaringan_eksisi,
				'tanggal_operasi'           => $LPjHapus->tanggal_operasi,
				'mulai_waktu_operasi'       => $LPjHapus->mulai_waktu_operasi,
				'selesai_waktu_operasi'     => $LPjHapus->selesai_waktu_operasi,
				'waktu_operasi'            	=> $LPjHapus->waktu_operasi,
				'id_dokter_bedah'           => $LPjHapus->id_dokter_bedah,
				'id_asisten'             	=> $LPjHapus->id_asisten,
				'id_instrumentator'         => $LPjHapus->id_instrumentator,
				'id_sirkuler'             	=> $LPjHapus->id_sirkuler,
				'catatan'             		=> $LPjHapus->catatan,
				'id_users'             		=> $LPjHapus->id_users, // ✅ user input pertama
				'deleted_by'           		=> $this->session->userdata('id_translucent'), // ✅ user yang hapus
				'created_date'         		=> $LPjHapus->created_date,
				'updated_on'           		=> $this->datetime,
				'log_action'           		=> 'delete'

			);
			$this->db->insert('sm_laporan_operasi_logs', $logDataLP);
		}
		// Hapus data utama
		$this->db->where('id', safe_post('id'))->delete('sm_laporan_operasi');
	
		if ($this->db->trans_status() === false) :
			$this->db->trans_rollback();
			$status = false;
			$message = 'Gagal Hapus Data';
		else :
			$this->db->trans_commit();
			$status = true;
			$message = 'Berhasil Hapus Data';
		endif;
	
		$this->response(array('status' => $status, 'message' => $message), REST_Controller::HTTP_OK);
	}

	// LAPORAN TINDAKAN LOG
	function get_data_laporan_tindakan_get(){
		$data['pendaftaran_detail'] = "";
		$data['lt'] = [];
		$data = $this->m_order_operasi->getPendaftaranDetailTindakan($this->get('id_pendaftaran', true), $this->get('id_layanan', true));
		$data['pendaftaran_detail'] = $this->m_order_operasi->getPendaftaranDetailOperasi($this->get('id_layanan_pendaftaran'));
		$data['profil'] = $this->m_order_operasi->getProfilPasien($data['pasien_tindakan']->id_pasien);
        $data['lt'] = $this->m_order_operasi->getLT($this->get('id_pendaftaran'));
        $data['lt_logs'] = $this->m_order_operasi->getLTLogs($this->get('id_pendaftaran'));
		if ($data != null) {
			$this->response($data, REST_Controller::HTTP_OK);
		} else {
			$this->response($data, REST_Controller::HTTP_OK);
		}
	}

	// LAPORAN TINDAKAN LOG
	function simpan_LT_post(){
		$checkDataLaporanTindakan = '';
		if (safe_post('lt_id') !== '') {
			$checkDataLaporanTindakan = $this->m_order_operasi->getLTByID(safe_post('lt_id'));
		}
		$this->db->trans_begin();
	
		if (empty($checkDataLaporanTindakan)) {
			// INSERT DATA
			$data = array(
				'id_pendaftaran'			=> safe_post('id_pendaftaran'),
				'id_layanan_pendaftaran'    => safe_post('id_layanan_pendaftaran'),

				'lt_nama_tindakan'        	=> safe_post('lt_nama_tindakan') !== '' ? safe_post('lt_nama_tindakan') : NULL,
				'lt_diagnosa_sebelum'     	=> safe_post('lt_diagnosa_sebelum') !== '' ? safe_post('lt_diagnosa_sebelum') : NULL,
				'lt_diagnosa_sesudah'     	=> safe_post('lt_diagnosa_sesudah') !== '' ? safe_post('lt_diagnosa_sesudah') : NULL,
				'lt_pa'                   	=> safe_post('lt_pa') !== '' ? safe_post('lt_pa') : NULL,
				'lt_komplikasi'           	=> safe_post('lt_komplikasi') !== '' ? safe_post('lt_komplikasi') : NULL,
				'lt_pendarahan'           	=> safe_post('lt_pendarahan') !== '' ? safe_post('lt_pendarahan') : NULL,
				'lt_tanggal'              	=> safe_post('lt_tanggal') !== '' ? date2mysql(safe_post('lt_tanggal')) : NULL,
				'lt_waktu_mulai'          	=> safe_post('lt_waktu_mulai') !== '' ? safe_post('lt_waktu_mulai') : NULL,
				'lt_waktu_selesai'        	=> safe_post('lt_waktu_selesai') !== '' ? safe_post('lt_waktu_selesai') : NULL,
				'lt_lama_waktu'           	=> safe_post('lt_lama_waktu') !== '' ? safe_post('lt_lama_waktu') : NULL,
				'lt_laporan_tindakan'     	=> safe_post('lt_laporan_tindakan') !== '' ? safe_post('lt_laporan_tindakan') : NULL,
				'lt_paraf_dokter'         	=> safe_post('lt_paraf_dokter') !== '' ? safe_post('lt_paraf_dokter') : NULL,
				'lt_paraf_bidan'          	=> safe_post('lt_paraf_bidan') !== '' ? safe_post('lt_paraf_bidan') : NULL,
				'lt_paraf_perawat'        	=> safe_post('lt_paraf_perawat') !== '' ? safe_post('lt_paraf_perawat') : NULL,
				'lt_dokter'               	=> safe_post('lt_dokter') !== '' ? safe_post('lt_dokter') : NULL,
				'lt_bidan'                	=> safe_post('lt_bidan') !== '' ? safe_post('lt_bidan') : NULL,
				'lt_perawat'              	=> safe_post('lt_perawat') !== '' ? safe_post('lt_perawat') : NULL,
				'id_users'					=> $this->session->userdata('id_translucent'),
				'created_date'				=> $this->datetime,
				'updated_on'             	=> $this->datetime	
			);
			$this->db->insert('sm_laporan_tindakan', $data);
	
		} else {
			// UPDATE DATA
			$data = array(
				'lt_nama_tindakan'        	=> safe_post('lt_nama_tindakan') !== '' ? safe_post('lt_nama_tindakan') : NULL,
				'lt_diagnosa_sebelum'     	=> safe_post('lt_diagnosa_sebelum') !== '' ? safe_post('lt_diagnosa_sebelum') : NULL,
				'lt_diagnosa_sesudah'     	=> safe_post('lt_diagnosa_sesudah') !== '' ? safe_post('lt_diagnosa_sesudah') : NULL,
				'lt_pa'                   	=> safe_post('lt_pa') !== '' ? safe_post('lt_pa') : NULL,
				'lt_komplikasi'           	=> safe_post('lt_komplikasi') !== '' ? safe_post('lt_komplikasi') : NULL,
				'lt_pendarahan'           	=> safe_post('lt_pendarahan') !== '' ? safe_post('lt_pendarahan') : NULL,
				'lt_tanggal'              	=> safe_post('lt_tanggal') !== '' ? date2mysql(safe_post('lt_tanggal')) : NULL,
				'lt_waktu_mulai'          	=> safe_post('lt_waktu_mulai') !== '' ? safe_post('lt_waktu_mulai') : NULL,
				'lt_waktu_selesai'        	=> safe_post('lt_waktu_selesai') !== '' ? safe_post('lt_waktu_selesai') : NULL,
				'lt_lama_waktu'           	=> safe_post('lt_lama_waktu') !== '' ? safe_post('lt_lama_waktu') : NULL,
				'lt_laporan_tindakan'     	=> safe_post('lt_laporan_tindakan') !== '' ? safe_post('lt_laporan_tindakan') : NULL,
				'lt_paraf_dokter'         	=> safe_post('lt_paraf_dokter') !== '' ? safe_post('lt_paraf_dokter') : NULL,
				'lt_paraf_bidan'          	=> safe_post('lt_paraf_bidan') !== '' ? safe_post('lt_paraf_bidan') : NULL,
				'lt_paraf_perawat'        	=> safe_post('lt_paraf_perawat') !== '' ? safe_post('lt_paraf_perawat') : NULL,
				'lt_dokter'               	=> safe_post('lt_dokter') !== '' ? safe_post('lt_dokter') : NULL,
				'lt_bidan'                	=> safe_post('lt_bidan') !== '' ? safe_post('lt_bidan') : NULL,
				'lt_perawat'              	=> safe_post('lt_perawat') !== '' ? safe_post('lt_perawat') : NULL,
				'updated_on'              	=> $this->datetime
			);
	
			$logData = array(
				'lt_id'					=> $checkDataLaporanTindakan->id, // 🆕 ID utama
				'id_pendaftaran'       	=> $checkDataLaporanTindakan->id_pendaftaran,
				'id_layanan_pendaftaran'=> $checkDataLaporanTindakan->id_layanan_pendaftaran,
				'lt_nama_tindakan'      => $checkDataLaporanTindakan->lt_nama_tindakan,
				'lt_diagnosa_sebelum'   => $checkDataLaporanTindakan->lt_diagnosa_sebelum,
				'lt_diagnosa_sesudah'   => $checkDataLaporanTindakan->lt_diagnosa_sesudah,
				'lt_pa'        			=> $checkDataLaporanTindakan->lt_pa,
				'lt_komplikasi'        	=> $checkDataLaporanTindakan->lt_komplikasi,
				'lt_pendarahan'        	=> $checkDataLaporanTindakan->lt_pendarahan,
				'lt_tanggal'        	=> $checkDataLaporanTindakan->lt_tanggal,
				'lt_waktu_mulai'        => $checkDataLaporanTindakan->lt_waktu_mulai,
				'lt_waktu_selesai'      => $checkDataLaporanTindakan->lt_waktu_selesai,
				'lt_lama_waktu'        	=> $checkDataLaporanTindakan->lt_lama_waktu,
				'lt_laporan_tindakan'   => $checkDataLaporanTindakan->lt_laporan_tindakan,
				'lt_paraf_dokter'       => $checkDataLaporanTindakan->lt_paraf_dokter,
				'lt_paraf_bidan'        => $checkDataLaporanTindakan->lt_paraf_bidan,
				'lt_paraf_perawat'      => $checkDataLaporanTindakan->lt_paraf_perawat,
				'lt_dokter'        		=> $checkDataLaporanTindakan->lt_dokter,
				'lt_bidan'        		=> $checkDataLaporanTindakan->lt_bidan,
				'lt_perawat'        	=> $checkDataLaporanTindakan->lt_perawat,
				'id_users'             	=> $checkDataLaporanTindakan->id_users, // ✅ user input pertama
				'updated_by'           	=> $this->session->userdata('id_translucent'), // ✅ user yang edit
				'created_date'         	=> $checkDataLaporanTindakan->created_date,
				'updated_on'           	=> $this->datetime,
				'log_action'           	=> 'update'
			);

			$this->db->insert('sm_laporan_tindakan_logs', $logData);
	
			$this->db->where('id', safe_post('lt_id'));
			$this->db->update('sm_laporan_tindakan', $data);
		}
	
		if ($this->db->trans_status() === false) {
			$this->db->trans_rollback();
			$status = false;
			$message = 'Gagal simpan Data';
		} else {
			$this->db->trans_commit();
			$status = true;
			$message = 'Berhasil simpan Data';
		}
	
		$this->response(array('status' => $status, 'message' => $message), REST_Controller::HTTP_OK);
	}

	// LAPORAN TINDAKAN LOG
	function hapus_laporan_tindakan_post(){
		if (!safe_post('id', true)) :
			$this->response(null, REST_Controller::HTTP_BAD_REQUEST);
		endif;
		// Ambil data sebelum dihapus
		$LTjHapus = $this->db->where('id', safe_post('id'))->get('sm_laporan_tindakan')->row();
		$this->db->trans_begin();
		if ($LTjHapus) {
			// Simpan ke log
			$logDataLT = array(
				'lt_id'					=> $LTjHapus->id, // 🆕 ID utama
				'id_pendaftaran'       	=> $LTjHapus->id_pendaftaran,
				'id_layanan_pendaftaran'=> $LTjHapus->id_layanan_pendaftaran,
				'lt_nama_tindakan'      => $LTjHapus->lt_nama_tindakan,
				'lt_diagnosa_sebelum'   => $LTjHapus->lt_diagnosa_sebelum,
				'lt_diagnosa_sesudah'   => $LTjHapus->lt_diagnosa_sesudah,
				'lt_pa'        			=> $LTjHapus->lt_pa,
				'lt_komplikasi'        	=> $LTjHapus->lt_komplikasi,
				'lt_pendarahan'        	=> $LTjHapus->lt_pendarahan,
				'lt_tanggal'        	=> $LTjHapus->lt_tanggal,
				'lt_waktu_mulai'        => $LTjHapus->lt_waktu_mulai,
				'lt_waktu_selesai'      => $LTjHapus->lt_waktu_selesai,
				'lt_lama_waktu'        	=> $LTjHapus->lt_lama_waktu,
				'lt_laporan_tindakan'   => $LTjHapus->lt_laporan_tindakan,
				'lt_paraf_dokter'       => $LTjHapus->lt_paraf_dokter,
				'lt_paraf_bidan'        => $LTjHapus->lt_paraf_bidan,
				'lt_paraf_perawat'      => $LTjHapus->lt_paraf_perawat,
				'lt_dokter'        		=> $LTjHapus->lt_dokter,
				'lt_bidan'        		=> $LTjHapus->lt_bidan,
				'lt_perawat'        	=> $LTjHapus->lt_perawat,
				'id_users'             	=> $LTjHapus->id_users, // ✅ user input pertama
				'deleted_by'           	=> $this->session->userdata('id_translucent'), // ✅ user yang hapus
				'created_date'         	=> $LTjHapus->created_date,
				'updated_on'           	=> $this->datetime,
				'log_action'           	=> 'delete'
			);
			$this->db->insert('sm_laporan_tindakan_logs', $logDataLT);
		}
		// Hapus data utama
		$this->db->where('id', safe_post('id'))->delete('sm_laporan_tindakan');
	
		if ($this->db->trans_status() === false) :
			$this->db->trans_rollback();
			$status = false;
			$message = 'Gagal Hapus Data';
		else :
			$this->db->trans_commit();
			$status = true;
			$message = 'Berhasil Hapus Data';
		endif;
	
		$this->response(array('status' => $status, 'message' => $message), REST_Controller::HTTP_OK);
	}

	// LAPORAN TINDAKAN 
	function edit_laporan_tindakan_get(){
		$data['pendaftaran_detail'] = "";
		$data = $this->m_order_operasi->getPendaftaranDetailTindakan($this->get('id_pendaftaran', true), $this->get('id_layanan', true));
		$data['pendaftaran_detail'] = $this->m_order_operasi->getPendaftaranDetailOperasi($this->get('id_layanan_pendaftaran'));
		$data['profil'] = $this->m_order_operasi->getProfilPasien($data['pasien_tindakan']->id_pasien);
        $data['lt'] = [];
        $data['lt'] = $this->m_order_operasi->getLTByID($this->get('id_tindakan'));

		if ($data != null) {
			$this->response($data, REST_Controller::HTTP_OK);
		} else {
			$this->response($data, REST_Controller::HTTP_OK);
		}
	}













	// // LAPORAN OPERASI LOG
	// function laporan_operasi_get(){
	// 	$data['pendaftaran_detail'] = "";
	// 	$data['list_laporan_operasi'] = [];
	// 	$data = $this->m_order_operasi->getPendaftaranDetailTindakan($this->get('id_pendaftaran', true), $this->get('id_layanan', true));
	// 	$data['pendaftaran_detail'] = $this->m_order_operasi->getPendaftaranDetailOperasi($this->get('id_layanan_pendaftaran'));
	// 	$data['list_laporan_operasi'] = $this->m_order_operasi->getLaporanOperasi($this->get('id_pendaftaran'));
	// 	$data['list_laporan_operasi_logs'] = $this->m_order_operasi->getLaporanOperasiLogs($this->get('id_pendaftaran'));	
	// 	if ($data != null) {
	// 		$this->response($data, REST_Controller::HTTP_OK);
	// 	} else {
	// 		$this->response($data, REST_Controller::HTTP_OK);
	// 	}
	// }

	// // LAPORAN OPERASI LOG
	// function simpan_laporan_operasi_post(){
	// 	$checkDataLaporanOperasi = '';
	// 	if (safe_post('id_lap_operasi') !== '') {
	// 		$checkDataLaporanOperasi = $this->m_order_operasi->getLaporanOperasiByID(safe_post('id_lap_operasi'));
	// 	}
	// 	$this->db->trans_begin();
	
	// 	if (empty($checkDataLaporanOperasi)) {
	// 		// INSERT DATA
	// 		$data = array(
	// 			'id_pendaftaran'			=> safe_post('id_pendaftaran'),
	// 			'id_layanan_pendaftaran'    => safe_post('id_layanan_pendaftaran'),
	// 			'diagnosa_pra_bedah'		=> safe_post('diagnosa_pra_bedah'),
	// 			'diagnosa_pasca_bedah'		=> safe_post('diagnosa_pasca_bedah'),
	// 			'prosedur_operasi'			=> safe_post('prosedur_operasi'),
	// 			'pemeriksaan_specimen' 		=> safe_post('pemeriksaan_specimen_operasi'),
	// 			'pemeriksaan_specimen_lain'	=> safe_post('pemeriksaan_specimen_operasi_lainnya') == '' ? null : safe_post('pemeriksaan_specimen_operasi_lainnya'),
	// 			'golongan_operasi'			=> safe_post('golongan_operasi'),
	// 			'kategori_operasi'			=> safe_post('kategpri_operasi'),
	// 			'komplikasi'				=> safe_post('komplikasi_operasi'),
	// 			'jumlah_darah_hilang' 		=> safe_post('jumlah_darah_hilang_operasi'),
	// 			'transfusi'					=> safe_post('tranfusi_operasi'),
	// 			'pemasangan_implan'			=> safe_post('pemasangan_implan_operasi'),
	// 			'jenis_jumlah'				=> safe_post('jenis_jumlah_operasi'),
	// 			'jenis_anestesi'			=> safe_post('jenis_anestesi_operasi'),
	// 			'jenis_operasi'				=> safe_post('laporan_jenis_oeprasi'),
	// 			'jaringan_eksisi'			=> safe_post('jaringan_eksisi_oprasi'),
	// 			'tanggal_operasi' 			=> safe_post('laporan_tanggal_operasi') == '' ? null : date2mysql(safe_post('laporan_tanggal_operasi')),
	// 			'mulai_waktu_operasi'		=> safe_post('laporan_jam_mulai_operasi'),
	// 			'selesai_waktu_operasi'		=> safe_post('laporan_jam_selesai_operasi'),
	// 			'waktu_operasi'				=> safe_post('laporan_durasi_operasi'),
	// 			'id_dokter_bedah'			=> safe_post('laporan_dokter_bedah_operasi'),
	// 			'id_asisten'				=> safe_post('asisten_operasi') == '' ? null : safe_post('asisten_operasi'),
	// 			'id_instrumentator'			=> safe_post('insumentator_operasi') == '' ? null : safe_post('insumentator_operasi'),
	// 			'id_sirkuler'				=> safe_post('sirkuler_operasi') == '' ? null : safe_post('sirkuler_operasi'),
	// 			'catatan'					=> safe_post('laporan_catatan_operasi'),
	// 			'id_users'					=> $this->session->userdata('id_translucent'),
	// 			'created_date'				=> $this->datetime,
	// 			'updated_on'             	=> $this->datetime	
	// 		);
	// 		$this->db->insert('sm_laporan_operasi', $data);
	
	// 	} else {
	// 		// UPDATE DATA
	// 		$data = array(
	// 			'diagnosa_pra_bedah'		=> safe_post('diagnosa_pra_bedah'),
	// 			'diagnosa_pasca_bedah'		=> safe_post('diagnosa_pasca_bedah'),
	// 			'prosedur_operasi'			=> safe_post('prosedur_operasi'),
	// 			'pemeriksaan_specimen' 		=> safe_post('pemeriksaan_specimen_operasi'),
	// 			'pemeriksaan_specimen_lain'	=> safe_post('pemeriksaan_specimen_operasi_lainnya') == '' ? null : safe_post('pemeriksaan_specimen_operasi_lainnya'),
	// 			'golongan_operasi'			=> safe_post('golongan_operasi'),
	// 			'kategori_operasi'			=> safe_post('kategpri_operasi'),
	// 			'komplikasi'				=> safe_post('komplikasi_operasi'),
	// 			'jumlah_darah_hilang' 		=> safe_post('jumlah_darah_hilang_operasi'),
	// 			'transfusi'					=> safe_post('tranfusi_operasi'),
	// 			'pemasangan_implan'			=> safe_post('pemasangan_implan_operasi'),
	// 			'jenis_jumlah'				=> safe_post('jenis_jumlah_operasi'),
	// 			'jenis_anestesi'			=> safe_post('jenis_anestesi_operasi'),
	// 			'jenis_operasi'				=> safe_post('laporan_jenis_oeprasi'),
	// 			'jaringan_eksisi'			=> safe_post('jaringan_eksisi_oprasi'),
	// 			'tanggal_operasi' 			=> safe_post('laporan_tanggal_operasi') == '' ? null : date2mysql(safe_post('laporan_tanggal_operasi')),
	// 			'mulai_waktu_operasi'		=> safe_post('laporan_jam_mulai_operasi'),
	// 			'selesai_waktu_operasi'		=> safe_post('laporan_jam_selesai_operasi'),
	// 			'waktu_operasi'				=> safe_post('laporan_durasi_operasi'),
	// 			'id_dokter_bedah'			=> safe_post('laporan_dokter_bedah_operasi'),
	// 			'id_asisten'				=> safe_post('asisten_operasi') == '' ? null : safe_post('asisten_operasi'),
	// 			'id_instrumentator'			=> safe_post('insumentator_operasi') == '' ? null : safe_post('insumentator_operasi'),
	// 			'id_sirkuler'				=> safe_post('sirkuler_operasi') == '' ? null : safe_post('sirkuler_operasi'),
	// 			'catatan'					=> safe_post('laporan_catatan_operasi'),
	// 			'updated_on'              	=> $this->datetime
	// 		);
	
	// 		$logData = array(
	// 			'id_lap_operasi'			=> $checkDataLaporanOperasi->id, // 🆕 ID utama
	// 			'id_pendaftaran'       		=> $checkDataLaporanOperasi->id_pendaftaran,
	// 			'id_layanan_pendaftaran' 	=> $checkDataLaporanOperasi->id_layanan_pendaftaran,
	// 			'diagnosa_pra_bedah'        => $checkDataLaporanOperasi->diagnosa_pra_bedah,
	// 			'diagnosa_pasca_bedah'      => $checkDataLaporanOperasi->diagnosa_pasca_bedah,
	// 			'prosedur_operasi'          => $checkDataLaporanOperasi->prosedur_operasi,
	// 			'pemeriksaan_specimen'      => $checkDataLaporanOperasi->pemeriksaan_specimen,
	// 			'pemeriksaan_specimen_lain' => $checkDataLaporanOperasi->pemeriksaan_specimen_lain,
	// 			'golongan_operasi'          => $checkDataLaporanOperasi->golongan_operasi,
	// 			'kategori_operasi'          => $checkDataLaporanOperasi->kategori_operasi,
	// 			'komplikasi'             	=> $checkDataLaporanOperasi->komplikasi,
	// 			'jumlah_darah_hilang'       => $checkDataLaporanOperasi->jumlah_darah_hilang,
	// 			'transfusi'             	=> $checkDataLaporanOperasi->transfusi,
	// 			'pemasangan_implan'         => $checkDataLaporanOperasi->pemasangan_implan,
	// 			'jenis_jumlah'             	=> $checkDataLaporanOperasi->jenis_jumlah,
	// 			'jenis_anestesi'            => $checkDataLaporanOperasi->jenis_anestesi,
	// 			'jenis_operasi'             => $checkDataLaporanOperasi->jenis_operasi,
	// 			'jaringan_eksisi'           => $checkDataLaporanOperasi->jaringan_eksisi,
	// 			'tanggal_operasi'           => $checkDataLaporanOperasi->tanggal_operasi,
	// 			'mulai_waktu_operasi'       => $checkDataLaporanOperasi->mulai_waktu_operasi,
	// 			'selesai_waktu_operasi'     => $checkDataLaporanOperasi->selesai_waktu_operasi,
	// 			'waktu_operasi'            	=> $checkDataLaporanOperasi->waktu_operasi,
	// 			'id_dokter_bedah'           => $checkDataLaporanOperasi->id_dokter_bedah,
	// 			'id_asisten'             	=> $checkDataLaporanOperasi->id_asisten,
	// 			'id_instrumentator'         => $checkDataLaporanOperasi->id_instrumentator,
	// 			'id_sirkuler'             	=> $checkDataLaporanOperasi->id_sirkuler,
	// 			'catatan'             		=> $checkDataLaporanOperasi->catatan,
	// 			'id_users'             		=> $checkDataLaporanOperasi->id_users, // ✅ user input pertama
	// 			'updated_by'           		=> $this->session->userdata('id_translucent'), // ✅ user yang edit
	// 			'created_date'         		=> $checkDataLaporanOperasi->created_date,
	// 			'updated_on'           		=> $this->datetime,
	// 			'log_action'           		=> 'update'
	// 		);

	// 		$this->db->insert('sm_laporan_operasi_logs', $logData);
	
	// 		$this->db->where('id', safe_post('id_lap_operasi'));
	// 		$this->db->update('sm_laporan_operasi', $data);
	// 	}
	
	// 	if ($this->db->trans_status() === false) {
	// 		$this->db->trans_rollback();
	// 		$status = false;
	// 		$message = 'Gagal simpan Data';
	// 	} else {
	// 		$this->db->trans_commit();
	// 		$status = true;
	// 		$message = 'Berhasil simpan Data';
	// 	}
	
	// 	$this->response(array('status' => $status, 'message' => $message), REST_Controller::HTTP_OK);
	// }

	// // LAPORAN OPERASI LOG
	// function edit_laporan_operasi_get(){
	// 	$data['pendaftaran_detail'] = "";
	// 	$data['laporan_operasi'] = "";
	// 	$data['pendaftaran_detail'] = $this->m_order_operasi->getPendaftaranDetailOperasi($this->get('id_layanan_pendaftaran'));
	// 	$data['laporan_operasi'] = $this->m_order_operasi->getLaporanOperasiByID($this->get('id'));

	// 	if ($data != null) {
	// 		$this->response($data, REST_Controller::HTTP_OK);
	// 	} else {
	// 		$this->response($data, REST_Controller::HTTP_OK);
	// 	}
	// }

	// // LAPORAN OPERASI LOG
	// function hapus_laporan_operasi_post(){
	// 	if (!safe_post('id', true)) :
	// 		$this->response(null, REST_Controller::HTTP_BAD_REQUEST);
	// 	endif;
	// 	// Ambil data sebelum dihapus
	// 	$LPjHapus = $this->db->where('id', safe_post('id'))->get('sm_laporan_operasi')->row();
	// 	$this->db->trans_begin();
	// 	if ($LPjHapus) {
	// 		// Simpan ke log
	// 		$logDataLP = array(
	// 			'id_lap_operasi'			=> $LPjHapus->id, // 🆕 ID utama
	// 			'id_pendaftaran'       		=> $LPjHapus->id_pendaftaran,
	// 			'id_layanan_pendaftaran' 	=> $LPjHapus->id_layanan_pendaftaran,
	// 			'diagnosa_pra_bedah'        => $LPjHapus->diagnosa_pra_bedah,
	// 			'diagnosa_pasca_bedah'      => $LPjHapus->diagnosa_pasca_bedah,
	// 			'prosedur_operasi'          => $LPjHapus->prosedur_operasi,
	// 			'pemeriksaan_specimen'      => $LPjHapus->pemeriksaan_specimen,
	// 			'pemeriksaan_specimen_lain' => $LPjHapus->pemeriksaan_specimen_lain,
	// 			'golongan_operasi'          => $LPjHapus->golongan_operasi,
	// 			'kategori_operasi'          => $LPjHapus->kategori_operasi,
	// 			'komplikasi'             	=> $LPjHapus->komplikasi,
	// 			'jumlah_darah_hilang'       => $LPjHapus->jumlah_darah_hilang,
	// 			'transfusi'             	=> $LPjHapus->transfusi,
	// 			'pemasangan_implan'         => $LPjHapus->pemasangan_implan,
	// 			'jenis_jumlah'             	=> $LPjHapus->jenis_jumlah,
	// 			'jenis_anestesi'            => $LPjHapus->jenis_anestesi,
	// 			'jenis_operasi'             => $LPjHapus->jenis_operasi,
	// 			'jaringan_eksisi'           => $LPjHapus->jaringan_eksisi,
	// 			'tanggal_operasi'           => $LPjHapus->tanggal_operasi,
	// 			'mulai_waktu_operasi'       => $LPjHapus->mulai_waktu_operasi,
	// 			'selesai_waktu_operasi'     => $LPjHapus->selesai_waktu_operasi,
	// 			'waktu_operasi'            	=> $LPjHapus->waktu_operasi,
	// 			'id_dokter_bedah'           => $LPjHapus->id_dokter_bedah,
	// 			'id_asisten'             	=> $LPjHapus->id_asisten,
	// 			'id_instrumentator'         => $LPjHapus->id_instrumentator,
	// 			'id_sirkuler'             	=> $LPjHapus->id_sirkuler,
	// 			'catatan'             		=> $LPjHapus->catatan,
	// 			'id_users'             		=> $LPjHapus->id_users, // ✅ user input pertama
	// 			'deleted_by'           		=> $this->session->userdata('id_translucent'), // ✅ user yang hapus
	// 			'created_date'         		=> $LPjHapus->created_date,
	// 			'updated_on'           		=> $this->datetime,
	// 			'log_action'           		=> 'delete'

	// 		);
	// 		$this->db->insert('sm_laporan_operasi_logs', $logDataLP);
	// 	}
	// 	// Hapus data utama
	// 	$this->db->where('id', safe_post('id'))->delete('sm_laporan_operasi');
	
	// 	if ($this->db->trans_status() === false) :
	// 		$this->db->trans_rollback();
	// 		$status = false;
	// 		$message = 'Gagal Hapus Data';
	// 	else :
	// 		$this->db->trans_commit();
	// 		$status = true;
	// 		$message = 'Berhasil Hapus Data';
	// 	endif;
	
	// 	$this->response(array('status' => $status, 'message' => $message), REST_Controller::HTTP_OK);
	// }

	// // LAPORAN TINDAKAN LOG
	// function get_data_laporan_tindakan_get(){
	// 	$data['pendaftaran_detail'] = "";
	// 	$data['lt'] = [];
	// 	$data = $this->m_order_operasi->getPendaftaranDetailTindakan($this->get('id_pendaftaran', true), $this->get('id_layanan', true));
	// 	$data['pendaftaran_detail'] = $this->m_order_operasi->getPendaftaranDetailOperasi($this->get('id_layanan_pendaftaran'));
	// 	$data['profil'] = $this->m_order_operasi->getProfilPasien($data['pasien_tindakan']->id_pasien);
    //     $data['lt'] = $this->m_order_operasi->getLT($this->get('id_pendaftaran'));
    //     $data['lt_logs'] = $this->m_order_operasi->getLTLogs($this->get('id_pendaftaran'));
	// 	if ($data != null) {
	// 		$this->response($data, REST_Controller::HTTP_OK);
	// 	} else {
	// 		$this->response($data, REST_Controller::HTTP_OK);
	// 	}
	// }

	// // LAPORAN TINDAKAN LOG
	// function simpan_LT_post(){
	// 	$checkDataLaporanTindakan = '';
	// 	if (safe_post('lt_id') !== '') {
	// 		$checkDataLaporanTindakan = $this->m_order_operasi->getLTByID(safe_post('lt_id'));
	// 	}
	// 	$this->db->trans_begin();
	
	// 	if (empty($checkDataLaporanTindakan)) {
	// 		// INSERT DATA
	// 		$data = array(
	// 			'id_pendaftaran'			=> safe_post('id_pendaftaran'),
	// 			'id_layanan_pendaftaran'    => safe_post('id_layanan_pendaftaran'),

	// 			'lt_nama_tindakan'        	=> safe_post('lt_nama_tindakan') !== '' ? safe_post('lt_nama_tindakan') : NULL,
	// 			'lt_diagnosa_sebelum'     	=> safe_post('lt_diagnosa_sebelum') !== '' ? safe_post('lt_diagnosa_sebelum') : NULL,
	// 			'lt_diagnosa_sesudah'     	=> safe_post('lt_diagnosa_sesudah') !== '' ? safe_post('lt_diagnosa_sesudah') : NULL,
	// 			'lt_pa'                   	=> safe_post('lt_pa') !== '' ? safe_post('lt_pa') : NULL,
	// 			'lt_komplikasi'           	=> safe_post('lt_komplikasi') !== '' ? safe_post('lt_komplikasi') : NULL,
	// 			'lt_pendarahan'           	=> safe_post('lt_pendarahan') !== '' ? safe_post('lt_pendarahan') : NULL,
	// 			'lt_tanggal'              	=> safe_post('lt_tanggal') !== '' ? date2mysql(safe_post('lt_tanggal')) : NULL,
	// 			'lt_waktu_mulai'          	=> safe_post('lt_waktu_mulai') !== '' ? safe_post('lt_waktu_mulai') : NULL,
	// 			'lt_waktu_selesai'        	=> safe_post('lt_waktu_selesai') !== '' ? safe_post('lt_waktu_selesai') : NULL,
	// 			'lt_lama_waktu'           	=> safe_post('lt_lama_waktu') !== '' ? safe_post('lt_lama_waktu') : NULL,
	// 			'lt_laporan_tindakan'     	=> safe_post('lt_laporan_tindakan') !== '' ? safe_post('lt_laporan_tindakan') : NULL,
	// 			'lt_paraf_dokter'         	=> safe_post('lt_paraf_dokter') !== '' ? safe_post('lt_paraf_dokter') : NULL,
	// 			'lt_paraf_bidan'          	=> safe_post('lt_paraf_bidan') !== '' ? safe_post('lt_paraf_bidan') : NULL,
	// 			'lt_paraf_perawat'        	=> safe_post('lt_paraf_perawat') !== '' ? safe_post('lt_paraf_perawat') : NULL,
	// 			'lt_dokter'               	=> safe_post('lt_dokter') !== '' ? safe_post('lt_dokter') : NULL,
	// 			'lt_bidan'                	=> safe_post('lt_bidan') !== '' ? safe_post('lt_bidan') : NULL,
	// 			'lt_perawat'              	=> safe_post('lt_perawat') !== '' ? safe_post('lt_perawat') : NULL,
	// 			'id_users'					=> $this->session->userdata('id_translucent'),
	// 			'created_date'				=> $this->datetime,
	// 			'updated_on'             	=> $this->datetime	
	// 		);
	// 		$this->db->insert('sm_laporan_tindakan', $data);
	
	// 	} else {
	// 		// UPDATE DATA
	// 		$data = array(
	// 			'lt_nama_tindakan'        	=> safe_post('lt_nama_tindakan') !== '' ? safe_post('lt_nama_tindakan') : NULL,
	// 			'lt_diagnosa_sebelum'     	=> safe_post('lt_diagnosa_sebelum') !== '' ? safe_post('lt_diagnosa_sebelum') : NULL,
	// 			'lt_diagnosa_sesudah'     	=> safe_post('lt_diagnosa_sesudah') !== '' ? safe_post('lt_diagnosa_sesudah') : NULL,
	// 			'lt_pa'                   	=> safe_post('lt_pa') !== '' ? safe_post('lt_pa') : NULL,
	// 			'lt_komplikasi'           	=> safe_post('lt_komplikasi') !== '' ? safe_post('lt_komplikasi') : NULL,
	// 			'lt_pendarahan'           	=> safe_post('lt_pendarahan') !== '' ? safe_post('lt_pendarahan') : NULL,
	// 			'lt_tanggal'              	=> safe_post('lt_tanggal') !== '' ? date2mysql(safe_post('lt_tanggal')) : NULL,
	// 			'lt_waktu_mulai'          	=> safe_post('lt_waktu_mulai') !== '' ? safe_post('lt_waktu_mulai') : NULL,
	// 			'lt_waktu_selesai'        	=> safe_post('lt_waktu_selesai') !== '' ? safe_post('lt_waktu_selesai') : NULL,
	// 			'lt_lama_waktu'           	=> safe_post('lt_lama_waktu') !== '' ? safe_post('lt_lama_waktu') : NULL,
	// 			'lt_laporan_tindakan'     	=> safe_post('lt_laporan_tindakan') !== '' ? safe_post('lt_laporan_tindakan') : NULL,
	// 			'lt_paraf_dokter'         	=> safe_post('lt_paraf_dokter') !== '' ? safe_post('lt_paraf_dokter') : NULL,
	// 			'lt_paraf_bidan'          	=> safe_post('lt_paraf_bidan') !== '' ? safe_post('lt_paraf_bidan') : NULL,
	// 			'lt_paraf_perawat'        	=> safe_post('lt_paraf_perawat') !== '' ? safe_post('lt_paraf_perawat') : NULL,
	// 			'lt_dokter'               	=> safe_post('lt_dokter') !== '' ? safe_post('lt_dokter') : NULL,
	// 			'lt_bidan'                	=> safe_post('lt_bidan') !== '' ? safe_post('lt_bidan') : NULL,
	// 			'lt_perawat'              	=> safe_post('lt_perawat') !== '' ? safe_post('lt_perawat') : NULL,
	// 			'updated_on'              	=> $this->datetime
	// 		);
	
	// 		$logData = array(
	// 			'lt_id'					=> $checkDataLaporanTindakan->id, // 🆕 ID utama
	// 			'id_pendaftaran'       	=> $checkDataLaporanTindakan->id_pendaftaran,
	// 			'id_layanan_pendaftaran'=> $checkDataLaporanTindakan->id_layanan_pendaftaran,
	// 			'lt_nama_tindakan'      => $checkDataLaporanTindakan->lt_nama_tindakan,
	// 			'lt_diagnosa_sebelum'   => $checkDataLaporanTindakan->lt_diagnosa_sebelum,
	// 			'lt_diagnosa_sesudah'   => $checkDataLaporanTindakan->lt_diagnosa_sesudah,
	// 			'lt_pa'        			=> $checkDataLaporanTindakan->lt_pa,
	// 			'lt_komplikasi'        	=> $checkDataLaporanTindakan->lt_komplikasi,
	// 			'lt_pendarahan'        	=> $checkDataLaporanTindakan->lt_pendarahan,
	// 			'lt_tanggal'        	=> $checkDataLaporanTindakan->lt_tanggal,
	// 			'lt_waktu_mulai'        => $checkDataLaporanTindakan->lt_waktu_mulai,
	// 			'lt_waktu_selesai'      => $checkDataLaporanTindakan->lt_waktu_selesai,
	// 			'lt_lama_waktu'        	=> $checkDataLaporanTindakan->lt_lama_waktu,
	// 			'lt_laporan_tindakan'   => $checkDataLaporanTindakan->lt_laporan_tindakan,
	// 			'lt_paraf_dokter'       => $checkDataLaporanTindakan->lt_paraf_dokter,
	// 			'lt_paraf_bidan'        => $checkDataLaporanTindakan->lt_paraf_bidan,
	// 			'lt_paraf_perawat'      => $checkDataLaporanTindakan->lt_paraf_perawat,
	// 			'lt_dokter'        		=> $checkDataLaporanTindakan->lt_dokter,
	// 			'lt_bidan'        		=> $checkDataLaporanTindakan->lt_bidan,
	// 			'lt_perawat'        	=> $checkDataLaporanTindakan->lt_perawat,
	// 			'id_users'             	=> $checkDataLaporanTindakan->id_users, // ✅ user input pertama
	// 			'updated_by'           	=> $this->session->userdata('id_translucent'), // ✅ user yang edit
	// 			'created_date'         	=> $checkDataLaporanTindakan->created_date,
	// 			'updated_on'           	=> $this->datetime,
	// 			'log_action'           	=> 'update'
	// 		);

	// 		$this->db->insert('sm_laporan_tindakan_logs', $logData);
	
	// 		$this->db->where('id', safe_post('lt_id'));
	// 		$this->db->update('sm_laporan_tindakan', $data);
	// 	}
	
	// 	if ($this->db->trans_status() === false) {
	// 		$this->db->trans_rollback();
	// 		$status = false;
	// 		$message = 'Gagal simpan Data';
	// 	} else {
	// 		$this->db->trans_commit();
	// 		$status = true;
	// 		$message = 'Berhasil simpan Data';
	// 	}
	
	// 	$this->response(array('status' => $status, 'message' => $message), REST_Controller::HTTP_OK);
	// }

	// // LAPORAN OPERASI LOG
	// function hapus_laporan_tindakan_post(){
	// 	if (!safe_post('id', true)) :
	// 		$this->response(null, REST_Controller::HTTP_BAD_REQUEST);
	// 	endif;
	// 	// Ambil data sebelum dihapus
	// 	$LTjHapus = $this->db->where('id', safe_post('id'))->get('sm_laporan_tindakan')->row();
	// 	$this->db->trans_begin();
	// 	if ($LTjHapus) {
	// 		// Simpan ke log
	// 		$logDataLT = array(
	// 			'lt_id'					=> $LTjHapus->id, // 🆕 ID utama
	// 			'id_pendaftaran'       	=> $LTjHapus->id_pendaftaran,
	// 			'id_layanan_pendaftaran'=> $LTjHapus->id_layanan_pendaftaran,
	// 			'lt_nama_tindakan'      => $LTjHapus->lt_nama_tindakan,
	// 			'lt_diagnosa_sebelum'   => $LTjHapus->lt_diagnosa_sebelum,
	// 			'lt_diagnosa_sesudah'   => $LTjHapus->lt_diagnosa_sesudah,
	// 			'lt_pa'        			=> $LTjHapus->lt_pa,
	// 			'lt_komplikasi'        	=> $LTjHapus->lt_komplikasi,
	// 			'lt_pendarahan'        	=> $LTjHapus->lt_pendarahan,
	// 			'lt_tanggal'        	=> $LTjHapus->lt_tanggal,
	// 			'lt_waktu_mulai'        => $LTjHapus->lt_waktu_mulai,
	// 			'lt_waktu_selesai'      => $LTjHapus->lt_waktu_selesai,
	// 			'lt_lama_waktu'        	=> $LTjHapus->lt_lama_waktu,
	// 			'lt_laporan_tindakan'   => $LTjHapus->lt_laporan_tindakan,
	// 			'lt_paraf_dokter'       => $LTjHapus->lt_paraf_dokter,
	// 			'lt_paraf_bidan'        => $LTjHapus->lt_paraf_bidan,
	// 			'lt_paraf_perawat'      => $LTjHapus->lt_paraf_perawat,
	// 			'lt_dokter'        		=> $LTjHapus->lt_dokter,
	// 			'lt_bidan'        		=> $LTjHapus->lt_bidan,
	// 			'lt_perawat'        	=> $LTjHapus->lt_perawat,
	// 			'id_users'             	=> $LTjHapus->id_users, // ✅ user input pertama
	// 			'deleted_by'           	=> $this->session->userdata('id_translucent'), // ✅ user yang hapus
	// 			'created_date'         	=> $LTjHapus->created_date,
	// 			'updated_on'           	=> $this->datetime,
	// 			'log_action'           	=> 'delete'
	// 		);
	// 		$this->db->insert('sm_laporan_tindakan_logs', $logDataLT);
	// 	}
	// 	// Hapus data utama
	// 	$this->db->where('id', safe_post('id'))->delete('sm_laporan_tindakan');
	
	// 	if ($this->db->trans_status() === false) :
	// 		$this->db->trans_rollback();
	// 		$status = false;
	// 		$message = 'Gagal Hapus Data';
	// 	else :
	// 		$this->db->trans_commit();
	// 		$status = true;
	// 		$message = 'Berhasil Hapus Data';
	// 	endif;
	
	// 	$this->response(array('status' => $status, 'message' => $message), REST_Controller::HTTP_OK);
	// }

	// // LAPORAN TINDAKAN 
	// function edit_laporan_tindakan_get(){
	// 	$data['pendaftaran_detail'] = "";
	// 	$data = $this->m_order_operasi->getPendaftaranDetailTindakan($this->get('id_pendaftaran', true), $this->get('id_layanan', true));
	// 	$data['pendaftaran_detail'] = $this->m_order_operasi->getPendaftaranDetailOperasi($this->get('id_layanan_pendaftaran'));
	// 	$data['profil'] = $this->m_order_operasi->getProfilPasien($data['pasien_tindakan']->id_pasien);
    //     $data['lt'] = [];
    //     $data['lt'] = $this->m_order_operasi->getLTByID($this->get('id_tindakan'));

	// 	if ($data != null) {
	// 		$this->response($data, REST_Controller::HTTP_OK);
	// 	} else {
	// 		$this->response($data, REST_Controller::HTTP_OK);
	// 	}
	// }





	function simpan_entri_operasi_post()
	{

		$layanan = array('id' => safe_post('id_layanan_pendaftaran'));

		$this->db->trans_begin();


		// RPPPPP SIMPAN 
		$rencanaPelayananPasienPascaPembedahan = array(

			'id_layanan_pendaftaran' => $layanan['id'],
			'id_pendaftaran'       	 => safe_post('id_pendaftaran'),
			'id_users'       	 	 => $this->session->userdata('id_translucent'),
			'id_rpppp' 				 => safe_post('id_rpppp'),


			'tanggal_rpppp'					=> (safe_post('tanggal_rpppp') !== '' ? datetime2mysql(safe_post('tanggal_rpppp')) : NULL),
			'hari_rpppp' 					=> safe_post('hari_rpppp') !== '' ? safe_post('hari_rpppp') : NULL,
			'diagnosis_kerja' 				=> safe_post('diagnosis_kerja') !== '' ? safe_post('diagnosis_kerja') : NULL,
			'masalah_kebutuhan_prioritas' 	=> safe_post('masalah_kebutuhan_prioritas') !== '' ? safe_post('masalah_kebutuhan_prioritas') : NULL,

			'kewaspadaan' => json_encode([
				'kewaspadaan_1' => safe_post('kewaspadaan_1') !== '' ? safe_post('kewaspadaan_1') : null,
				'kewaspadaan_2' => safe_post('kewaspadaan_2') !== '' ? safe_post('kewaspadaan_2') : null,
				'kewaspadaan_3' => safe_post('kewaspadaan_3') !== '' ? safe_post('kewaspadaan_3') : null,
				'kewaspadaan_4' => safe_post('kewaspadaan_4') !== '' ? safe_post('kewaspadaan_4') : null,
			]),

			'tim_dokter' => safe_post('tim_dokter') !== '' ? safe_post('tim_dokter') : NULL,
			'id_dokter_1' => safe_post('tim_dpjp') !== '' ? safe_post('tim_dpjp') : NULL,

			'tim_perawat' => safe_post('tim_perawat') !== '' ? safe_post('tim_perawat') : NULL,
			'id_perawat_1' => safe_post('tim_perawat_1') !== '' ? safe_post('tim_perawat_1') : NULL,
			'id_perawat_2' => safe_post('tim_perawat_2') !== '' ? safe_post('tim_perawat_2') : NULL,
			'id_perawat_3' => safe_post('tim_perawat_3') !== '' ? safe_post('tim_perawat_3') : NULL,

			'pemeriksaan' => json_encode([
				'pemeriksaan_1' => safe_post('pemeriksaan_1') !== '' ? safe_post('pemeriksaan_1') : null,
				'pemeriksaan_2' => safe_post('pemeriksaan_2') !== '' ? safe_post('pemeriksaan_2') : null,
				'pemeriksaan_3' => safe_post('pemeriksaan_3') !== '' ? safe_post('pemeriksaan_3') : null,
			]),

			'prosedur_tindakan' => safe_post('prosedur_tindakan') !== '' ? safe_post('prosedur_tindakan') : NULL,

			'nutrisi_rpppp' => json_encode([
				'nutrisi_1' => safe_post('nutrisi_1') !== '' ? safe_post('nutrisi_1') : null,
				'nutrisi_2' => safe_post('nutrisi_2') !== '' ? safe_post('nutrisi_2') : null,
				'nutrisi_3' => safe_post('nutrisi_3') !== '' ? safe_post('nutrisi_3') : null,
				'nutrisi_3' => safe_post('nutrisi_3') !== '' ? safe_post('nutrisi_3') : null,
				'nutrisi_5' => safe_post('nutrisi_5') !== '' ? safe_post('nutrisi_5') : null,
			]),

			'aktivitas_rpppp' => json_encode([
				'aktivitas_1' => safe_post('aktivitas_1') !== '' ? safe_post('aktivitas_1') : null,
				'aktivitas_2' => safe_post('aktivitas_2') !== '' ? safe_post('aktivitas_2') : null,
				'aktivitas_3' => safe_post('aktivitas_3') !== '' ? safe_post('aktivitas_3') : null,
			]),

			'pengobatann' => json_encode([
				'pengobatann_1' => safe_post('pengobatann_1') !== '' ? safe_post('pengobatann_1') : null,
				'pengobatann_2' => safe_post('pengobatann_2') !== '' ? safe_post('pengobatann_2') : null,
				'pengobatann_3' => safe_post('pengobatann_3') !== '' ? safe_post('pengobatann_3') : null,
			]),

			'keperawwatan' => json_encode([
				'keperawwatan_1' => safe_post('keperawwatan_1') !== '' ? safe_post('keperawwatan_1') : null,
				'keperawwatan_2' => safe_post('keperawwatan_2') !== '' ? safe_post('keperawwatan_2') : null,
				'keperawwatan_3' => safe_post('keperawwatan_3') !== '' ? safe_post('keperawwatan_3') : null,
				'keperawwatan_4' => safe_post('keperawwatan_4') !== '' ? safe_post('keperawwatan_4') : null,
			]),

			'tindakan_rehabilitan_medik'	=> safe_post('tindakan_rehabilitan_medik') !== '' ? safe_post('tindakan_rehabilitan_medik') : NULL,
			'konsultasi_rpppp' 				=> safe_post('konsultasi_rpppp') !== '' ? safe_post('konsultasi_rpppp') : NULL,
			'sasaran_rpppp' 				=> safe_post('sasaran_rpppp') !== '' ? safe_post('sasaran_rpppp') : NULL,
			'planing_rpppp' 				=> safe_post('planing_rpppp') !== '' ? safe_post('planing_rpppp') : NULL,

			'nama_jelas_rpppp' 				=> safe_post('nama_jelas_rpppp') !== '' ? safe_post('nama_jelas_rpppp') : NULL,
			'id_dokter_2' 					=> safe_post('paraf_dokter_rpppp') !== '' ? safe_post('paraf_dokter_rpppp') : NULL,
		);
		// var_dump($rencanaPelayananPasienPascaPembedahan);die;

		$sign = $this->db->select('rpppp.tanggal_rpppp, tim_dokter, tim_perawat,  nama_jelas_rpppp')
			->from('sm_rencana_pelayanan_pasien_pasca_pembedahan as rpppp')
			->where('rpppp.id_pendaftaran', $layanan['id'])
			->get()
			->row();

		if (isset($sign)) :
			if ($sign->tanggal_rpppp !== NULL) :
				$rencanaPelayananPasienPascaPembedahan['tanggal_rpppp'] = $sign->tanggal_rpppp;
			else :
				$rencanaPelayananPasienPascaPembedahan['tanggal_rpppp'] = (safe_post('tanggal_rpppp') !== '' ? datetime2mysql(safe_post('tanggal_rpppp')) : NULL);
			endif;
			if ($sign->tim_dokter !== NULL) :
				$rencanaPelayananPasienPascaPembedahan['tim_dokter'] = $sign->tim_dokter;
			else :
				$rencanaPelayananPasienPascaPembedahan['tim_dokter'] = (safe_post('tim_dokter') !== '' ? safe_post('tim_dokter') : NULL);
			endif;
			if ($sign->tim_perawat !== NULL) :
				$rencanaPelayananPasienPascaPembedahan['tim_perawat'] = $sign->tim_perawat;
			else :
				$rencanaPelayananPasienPascaPembedahan['tim_perawat'] = (safe_post('tim_perawat') !== '' ? safe_post('tim_perawat') : NULL);
			endif;
			if ($sign->nama_jelas_rpppp !== NULL) :
				$rencanaPelayananPasienPascaPembedahan['nama_jelas_rpppp'] = $sign->nama_jelas_rpppp;
			else :
				$rencanaPelayananPasienPascaPembedahan['nama_jelas_rpppp'] = (safe_post('nama_jelas_rpppp') !== '' ? safe_post('nama_jelas_rpppp') : NULL);
			endif;

		endif;
		$this->m_order_operasi->updateRencanaPelayananPasienPascaPembedahan($rencanaPelayananPasienPascaPembedahan);



		// APB SIMPAN 
		$assesmentPraBedahh = array(

			'id_layanan_pendaftaran' => $layanan['id'],
			'id_pendaftaran'       	 => safe_post('id_pendaftaran'),
			'id_users'       	 	 => $this->session->userdata('id_translucent'),
			'id_apb' 				 => safe_post('id_apb'),


			'apbwh_tanggal'	=> (safe_post('apbwh_tanggal') !== '' ? datetime2mysql(safe_post('apbwh_tanggal')) : NULL),

			'apbwh_riwayat_alergi' => json_encode([
				'apbwh_riwayat_alergi' => safe_post('apbwh_riwayat_alergi') !== '' ? safe_post('apbwh_riwayat_alergi') : null,
				'apbwh_riwayat_alergi' => safe_post('apbwh_riwayat_alergi') !== '' ? safe_post('apbwh_riwayat_alergi') : null,
				'apbwh_riwayat_alergi_3' => safe_post('apbwh_riwayat_alergi_3') !== '' ? safe_post('apbwh_riwayat_alergi_3') : null,
			]),

			'apbwh_suhu' => json_encode([
				'apbwh_suhu_1' => safe_post('apbwh_suhu_1') !== '' ? safe_post('apbwh_suhu_1') : null,
				'apbwh_suhu_2' => safe_post('apbwh_suhu_2') !== '' ? safe_post('apbwh_suhu_2') : null,
				'apbwh_suhu_3' => safe_post('apbwh_suhu_3') !== '' ? safe_post('apbwh_suhu_3') : null,
				'apbwh_suhu_4' => safe_post('apbwh_suhu_4') !== '' ? safe_post('apbwh_suhu_4') : null,
				'apbwh_suhu_5' => safe_post('apbwh_suhu_5') !== '' ? safe_post('apbwh_suhu_5') : null,
				'apbwh_suhu_6' => safe_post('apbwh_suhu_6') !== '' ? safe_post('apbwh_suhu_6') : null,
			]),

			'apbwh_status_nutrisi' => json_encode([
				'apbwh_status_nutrisi' => safe_post('apbwh_status_nutrisi') !== '' ? safe_post('apbwh_status_nutrisi') : null,
				'apbwh_status_nutrisi' => safe_post('apbwh_status_nutrisi') !== '' ? safe_post('apbwh_status_nutrisi') : null,
				'apbwh_status_nutrisi' => safe_post('apbwh_status_nutrisi') !== '' ? safe_post('apbwh_status_nutrisi') : null,
			]),

			'apbwh_keluhan_utama' 		=> safe_post('apbwh_keluhan_utama') !== '' ? safe_post('apbwh_keluhan_utama') : NULL,
			'apbwh_rps' 				=> safe_post('apbwh_rps') !== '' ? safe_post('apbwh_rps') : NULL,
			'apbwh_rpd' 				=> safe_post('apbwh_rpd') !== '' ? safe_post('apbwh_rpd') : NULL,
			'apbwh_pemeriksaan_fisik' 	=> safe_post('apbwh_pemeriksaan_fisik') !== '' ? safe_post('apbwh_pemeriksaan_fisik') : NULL,
			'apbwh_pemeriksaan_banding' => safe_post('apbwh_pemeriksaan_banding') !== '' ? safe_post('apbwh_pemeriksaan_banding') : NULL,
			'apbwh_laboratorium' 		=> safe_post('apbwh_laboratorium') !== '' ? safe_post('apbwh_laboratorium') : NULL,
			'apbwh_diagnosis' 			=> safe_post('apbwh_diagnosis') !== '' ? safe_post('apbwh_diagnosis') : NULL,
			'apbwh_diagnosis_banding' 	=> safe_post('apbwh_diagnosis_banding') !== '' ? safe_post('apbwh_diagnosis_banding') : NULL,
			'apbwh_permasalahan' 		=> safe_post('apbwh_permasalahan') !== '' ? safe_post('apbwh_permasalahan') : NULL,
			'apbwh_rto' 				=> safe_post('apbwh_rto') !== '' ? safe_post('apbwh_rto') : NULL,

			'apbwh_rawat_inap' => json_encode([
				'apbwh_rawat_inap' => safe_post('apbwh_rawat_inap') !== '' ? safe_post('apbwh_rawat_inap') : null,
				'apbwh_rawat_inap' => safe_post('apbwh_rawat_inap') !== '' ? safe_post('apbwh_rawat_inap') : null,
				'apbwh_rawat_inap_3' => safe_post('apbwh_rawat_inap_3') !== '' ? safe_post('apbwh_rawat_inap_3') : null,
			]),

			'apbwh_pasien' => json_encode([
				'apbwh_pasien_1' => safe_post('apbwh_pasien_1') !== '' ? safe_post('apbwh_pasien_1') : null,
				'apbwh_pasien_2' => safe_post('apbwh_pasien_2') !== '' ? safe_post('apbwh_pasien_2') : null,
				'apbwh_pasien_3' => safe_post('apbwh_pasien_3') !== '' ? safe_post('apbwh_pasien_3') : null,
				'apbwh_pasien_4' => safe_post('apbwh_pasien_4') !== '' ? safe_post('apbwh_pasien_4') : null,
				'apbwh_pasien_5' => safe_post('apbwh_pasien_5') !== '' ? safe_post('apbwh_pasien_5') : null,
				'apbwh_pasien_6' => safe_post('apbwh_pasien_6') !== '' ? safe_post('apbwh_pasien_6') : null,
			]),

			'apbwh_tanggal_d'	=> (safe_post('apbwh_tanggal_d') !== '' ? datetime2mysql(safe_post('apbwh_tanggal_d')) : NULL),
			'apbwh_tanggal_p'	=> (safe_post('apbwh_tanggal_p') !== '' ? datetime2mysql(safe_post('apbwh_tanggal_p')) : NULL),

			'apbwh_dokter' 		=> safe_post('apbwh_dokter') !== '' ? safe_post('apbwh_dokter') : NULL,
			'apbwh_pasient' 	=> safe_post('apbwh_pasient') !== '' ? safe_post('apbwh_pasient') : NULL,

			'apbwh_ttd_dokter' 	=> safe_post('apbwh_ttd_dokter') !== '' ? safe_post('apbwh_ttd_dokter') : NULL,
			'apbwh_ttd_pasien' 	=> safe_post('apbwh_ttd_pasien') !== '' ? safe_post('apbwh_ttd_pasien') : NULL,

		);

		$sign = $this->db->select('apb.apbwh_tanggal, apbwh_tanggal_d, apbwh_tanggal_p, apbwh_ttd_dokter, apbwh_ttd_pasien')
			->from('sm_asessment_pra_bedahh as apb')
			->where('apb.id_pendaftaran', $layanan['id'])
			->get()
			->row();

		if (isset($sign)) :
			if ($sign->apbwh_tanggal !== NULL) :
				$assesmentPraBedahh['apbwh_tanggal'] = $sign->apbwh_tanggal;
			else :
				$assesmentPraBedahh['apbwh_tanggal'] = (safe_post('apbwh_tanggal') !== '' ? datetime2mysql(safe_post('apbwh_tanggal')) : NULL);
			endif;
			if ($sign->apbwh_tanggal_d !== NULL) :
				$assesmentPraBedahh['apbwh_tanggal_d'] = $sign->apbwh_tanggal_d;
			else :
				$assesmentPraBedahh['apbwh_tanggal_d'] = (safe_post('apbwh_tanggal_d') !== '' ? datetime2mysql(safe_post('apbwh_tanggal_d')) : NULL);
			endif;
			if ($sign->apbwh_tanggal_p !== NULL) :
				$assesmentPraBedahh['apbwh_tanggal_p'] = $sign->apbwh_tanggal_p;
			else :
				$assesmentPraBedahh['apbwh_tanggal_p'] = (safe_post('apbwh_tanggal_p') !== '' ? datetime2mysql(safe_post('apbwh_tanggal_p')) : NULL);
			endif;

			if ($sign->apbwh_ttd_dokter !== NULL) :
				$assesmentPraBedahh['apbwh_ttd_dokter'] = $sign->apbwh_ttd_dokter;
			else :
				$assesmentPraBedahh['apbwh_ttd_dokter'] = (safe_post('apbwh_ttd_dokter') !== '' ? safe_post('apbwh_ttd_dokter') : NULL);
			endif;
			if ($sign->apbwh_ttd_pasien !== NULL) :
				$assesmentPraBedahh['apbwh_ttd_pasien'] = $sign->apbwh_ttd_pasien;
			else :
				$assesmentPraBedahh['apbwh_ttd_pasien'] = (safe_post('apbwh_ttd_pasien') !== '' ? safe_post('apbwh_ttd_pasien') : NULL);
			endif;

		// if ($sign->apbwh_ttd_dokter !== NULL) :
		// 	$assesmentPraBedahh['apbwh_ttd_dokter'] = $sign->apbwh_ttd_dokter;
		// else :
		// 	$assesmentPraBedahh['apbwh_ttd_dokter'] = (safe_post('apbwh_ttd_dokter') !== '' ? datetime2mysql(safe_post('apbwh_ttd_dokter')) : NULL);
		// endif;
		// if ($sign->apbwh_ttd_pasien !== NULL) :
		// 	$assesmentPraBedahh['apbwh_ttd_pasien'] = $sign->apbwh_ttd_pasien;
		// else :
		// 	$assesmentPraBedahh['apbwh_ttd_pasien'] = (safe_post('apbwh_ttd_pasien') !== '' ? datetime2mysql(safe_post('apbwh_ttd_pasien')) : NULL);
		// endif;				
		endif;
		$this->m_order_operasi->updateAssesmentPraBedahh($assesmentPraBedahh);

		

		// simpan PLO
		// var_dump(safe_post('id'));die;
		$checkData = safe_post('id');
		$plo_tanggal = safe_post('plo_tanggal');
		if ($plo_tanggal !== '') {
			$plo_tanggal = str_replace('/', '-', $plo_tanggal);
			$plo_tanggal = date('Y-m-d', strtotime($plo_tanggal));
		}
		$plo_tanggal_pasien = safe_post('plo_tanggal_pasien');
		if ($plo_tanggal_pasien !== '') {
			$plo_tanggal_pasien = str_replace('/', '-', $plo_tanggal_pasien);
			$plo_tanggal_pasien = date('Y-m-d H:i', strtotime($plo_tanggal_pasien));
		}
		$plo_tanggal_dokter = safe_post('plo_tanggal_dokter');
		if ($plo_tanggal_dokter !== '') {
			$plo_tanggal_dokter = str_replace('/', '-', $plo_tanggal_dokter);
			$plo_tanggal_dokter = date('Y-m-d H:i', strtotime($plo_tanggal_dokter));
		}

		// Mendapatkan data gambar dari input post
		$imageData = $_POST['imageData'];
		// var_dump($imageData);die;
		$filename = safe_post('gambar_lama');
		// var_dump($filename);die;
		if ($imageData !== '0') {
			// Hilangkan informasi tipe file dan karakter whitespace yang tidak dibutuhkan
			$imageData = str_replace('data:image/png;base64,', '', $imageData);
			$imageData = str_replace(' ', '+', $imageData);

			// Decode data gambar dari format base64 ke binary
			$imageDataBinary = base64_decode($imageData);

			// Simpan gambar ke dalam folder public dengan format file PNG
			$filename = 'canvas_' . date('YmdHis') . '.png';
			$filepath = FCPATH . 'resources/images/lokasi_operasi/' . $filename;

			// Jika file gambar lama sudah ada, hapus file tersebut
			$fileLama = FCPATH . 'resources/images/lokasi_operasi/' . safe_post('gambar_lama');
			if (is_file($fileLama)) {
				// Hapus file gambar lama
				unlink($fileLama);
			}

			// Simpan gambar ke folder public
			file_put_contents($filepath, $imageDataBinary);
		}

		if ($checkData != '') {
			$data_plo = array(
				'id'						=> safe_post('id'),
				'id_layanan_pendaftaran'	=> $layanan['id'],
				'id_pendaftaran'			=> safe_post('id_pendaftaran'),
				'id_users'       	 	 	=> $this->session->userdata('id_translucent'),

				'plo_prosedur'				=> safe_post('plo_prosedur') !== '' ? safe_post('plo_prosedur') : NULL,
				'plo_tanggal'				=> $plo_tanggal ? $plo_tanggal : Null,
				'plo_gambar'				=> $filename ? $filename : Null,
				'plo_tanggal_pasien'		=> $plo_tanggal_pasien ? $plo_tanggal_pasien : Null,
				'plo_tanggal_dokter'		=> $plo_tanggal_dokter ? $plo_tanggal_dokter : Null,
				'plo_dokter'               	=> safe_post('plo_dokter') !== '' ? safe_post('plo_dokter') : NULL,

				'updated_at'               	=> $this->datetime,

			);

			// var_dump($data_plo);die;
			$this->db->where('id', safe_post('id'));
			$this->db->update('sm_lokasi_operasi', $data_plo);
		} else {
			$data_plo = array(
				'id_layanan_pendaftaran'	=> $layanan['id'],
				'id_pendaftaran'			=> safe_post('id_pendaftaran'),
				'id_users'       	 	 	=> $this->session->userdata('id_translucent'),

				'plo_prosedur'				=> safe_post('plo_prosedur') !== '' ? safe_post('plo_prosedur') : NULL,
				'plo_tanggal'				=> $plo_tanggal ? $plo_tanggal : Null,
				'plo_gambar'				=> $filename ? $filename : Null,
				'plo_tanggal_pasien'		=> $plo_tanggal_pasien ? $plo_tanggal_pasien : Null,
				'plo_tanggal_dokter'		=> $plo_tanggal_dokter ? $plo_tanggal_dokter : Null,
				'plo_dokter'               	=> safe_post('plo_dokter') !== '' ? safe_post('plo_dokter') : NULL,

				'created_at'               	=> $this->datetime,

			);
			// var_dump($data_plo);die;
			$this->db->insert('sm_lokasi_operasi', $data_plo);
		}


		if (!empty($respon)) {

			$response = $respon;
		} else {

			$response = null;
		}

		if ($this->db->trans_status() === false) :
			$this->db->trans_rollback();
			$status = false;
		else :
			$this->db->trans_commit();
			$status = true;
		endif;

		$message = array(
			'status' => $status,
			'token'  => $this->security->get_csrf_hash(),
			'id'     => $layanan['id'],
			'respon' => $response,
		);

		$this->response($message, REST_Controller::HTTP_OK);
	}

	// RPPPP / CKP / // SSCKO
	function get_data_entri_operasi_get()
	{
		if (!$this->get('id')) :
			$this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
		endif;

		$data = $this->m_pendaftaran->getPendaftaranDetail($this->get('id', true), $this->get('id_layanan', true));
		// $data['surgical_safety_ceklis_kamar_operasi']  = $this->m_order_operasi->getSurgicalSafetyCeklisKamarOperasi($data['layanan']->id_pendaftaran);
		$data['rencana_pelayanan_pasien_pasca_pembedahan']  = $this->m_order_operasi->getRencanaPelayananPasienPascaPembedahan($data['layanan']->id_pendaftaran);
		// $data['catatan_keperawatan_perioperatif']  = $this->m_order_operasi->getCatatanKeperawatanPerioperatif($data['layanan']->id_pendaftaran);
		// AAAS
		// $data['assesmen_awal_anestesi_sedassi']  = $this->m_order_operasi->getAssesmenAwalAnestesiSedassi($data['layanan']->id_pendaftaran);
		$data['asesment_pra_bedahh']  = $this->m_order_operasi->getAssesmentPraBedahh($data['layanan']->id_pendaftaran);
		$data['catatan_perhitungan_kasa_jarum_instrumen']  = $this->m_order_operasi->getCatatanPerhitunganKasaJarumInstrumen($data['layanan']->id_pendaftaran);
		$data['lokasi_operasi']  = $this->m_order_operasi->getLokasiOperasi($data['layanan']->id_pendaftaran);

		if ($data) :
			$this->response($data, REST_Controller::HTTP_OK); // (200)
		endif;
	}

	
	// TOTAL ADA 6

	// RPPPP
	function get_rencana_pelayanan_pasien_pasca_pembedahan_get()
	{
		if (!$this->get('id', true)) :
			$this->response(null, REST_Controller::HTTP_BAD_REQUEST);
		endif;


		$data = $this->m_order_operasi->getRencanaPelayananPasienPascaPembedahan($this->get('id', true));
		$this->response($data, REST_Controller::HTTP_OK);
	}


	// APB
	function get_asesment_pra_bedahh_get()
	{
		if (!$this->get('id', true)) :
			$this->response(null, REST_Controller::HTTP_BAD_REQUEST);
		endif;


		$data = $this->m_order_operasi->getAssesmentPraBedahh($this->get('id', true));
		$this->response($data, REST_Controller::HTTP_OK);
	}

	function get_lokasi_operasi_get()
	{
		if (!$this->get('id', true)) :
			$this->response(null, REST_Controller::HTTP_BAD_REQUEST);
		endif;


		$data = $this->m_order_operasi->getLokasiOperasiByID($this->get('id', true));
		$this->response($data, REST_Controller::HTTP_OK);
	}

	// BKS 1
	function get_data_bukti_kondisi_sterilisasi_get(){
		if (!$this->get('id')) :
			$this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
		endif;
		$data  = $this->m_pendaftaran->getPendaftaranDetail($this->get('id', true), $this->get('id_layanan', true));
		$data['bukti_kondisi_sterilisasi']  = $this->m_order_operasi->getBuktiKondisiSterilisasi($data['layanan']->id_pendaftaran);
		if ($data) :
			$this->response($data, REST_Controller::HTTP_OK); // (200)
		endif;
	}

	// BKS 2
	function simpan_data_bukti_kondisi_sterilisasi_post(){
		$id_users = safe_post('id_user');
		$layanan = array('id' => safe_post('id_layanan_pendaftaran'));		
		$pengkajian_date_bukti_kondisi = safe_post('pengkajian_date_bukti_kondisi');
		$id_pendaftaran           	= safe_post('id_pendaftaran');   			
		$bks_tanggal_steril 		= safe_post('bks_tanggal_steril');

		$tgl_steril_bks_0 = safe_post('tgl_steril_bks_0');
		$tgl_steril_bks_1 = safe_post('tgl_steril_bks_1');
		$tgl_steril_bks_2 = safe_post('tgl_steril_bks_2');
		$tgl_steril_bks_3 = safe_post('tgl_steril_bks_3');
		$tgl_steril_bks_4 = safe_post('tgl_steril_bks_4');
		$tgl_steril_bks_5 = safe_post('tgl_steril_bks_5');
		$tgl_steril_bks_6 = safe_post('tgl_steril_bks_6');
		$tgl_steril_bks_7 = safe_post('tgl_steril_bks_7');
		$tgl_steril_bks_8 = safe_post('tgl_steril_bks_8');
		$tgl_steril_bks_9 = safe_post('tgl_steril_bks_9');
		$tgl_steril_bks_10 = safe_post('tgl_steril_bks_10');
		$tgl_steril_bks_11 = safe_post('tgl_steril_bks_11');
		$tgl_steril_bks_12 = safe_post('tgl_steril_bks_12');
		$tgl_steril_bks_13 = safe_post('tgl_steril_bks_13');
		$tgl_steril_bks_14 = safe_post('tgl_steril_bks_14');					
		if (!empty($pengkajian_date_bukti_kondisi)) {        
			$pengkajian_bks = array(
				'id_pendaftaran'         		=> $id_pendaftaran,
				'id_layanan_pendaftaran' 		=> $layanan['id'],
				'id_user'                   	=> safe_post('user_pengkajian') !== '' ? safe_post('user_pengkajian') : null,		
				'tgl_operasi_bks'               => safe_post('tgl_operasi_bks') !== '' ? safe_post('tgl_operasi_bks') : null,
				'tanggal_steril_bks'            => safe_post('tanggal_steril_bks') !== '' ? safe_post('tanggal_steril_bks') : null,
				'tgl_steril_bks_0'              => safe_post('tgl_steril_bks_0') !== '' ? safe_post('tgl_steril_bks_0') : null,
				'tgl_steril_bks_1'              => safe_post('tgl_steril_bks_1') !== '' ? safe_post('tgl_steril_bks_1') : null,
				'tgl_steril_bks_2'              => safe_post('tgl_steril_bks_2') !== '' ? safe_post('tgl_steril_bks_2') : null,
				'tgl_steril_bks_3'              => safe_post('tgl_steril_bks_3') !== '' ? safe_post('tgl_steril_bks_3') : null,
				'tgl_steril_bks_4'              => safe_post('tgl_steril_bks_4') !== '' ? safe_post('tgl_steril_bks_4') : null,
				'tgl_steril_bks_5'              => safe_post('tgl_steril_bks_5') !== '' ? safe_post('tgl_steril_bks_5') : null,
				'tgl_steril_bks_6'              => safe_post('tgl_steril_bks_6') !== '' ? safe_post('tgl_steril_bks_6') : null,
				'tgl_steril_bks_7'              => safe_post('tgl_steril_bks_7') !== '' ? safe_post('tgl_steril_bks_7') : null,
				'tgl_steril_bks_8'              => safe_post('tgl_steril_bks_8') !== '' ? safe_post('tgl_steril_bks_8') : null,
				'tgl_steril_bks_9'              => safe_post('tgl_steril_bks_9') !== '' ? safe_post('tgl_steril_bks_9') : null,
				'tgl_steril_bks_10'             => safe_post('tgl_steril_bks_10') !== '' ? safe_post('tgl_steril_bks_10') : null,
				'tgl_steril_bks_11'             => safe_post('tgl_steril_bks_11') !== '' ? safe_post('tgl_steril_bks_11') : null,
				'tgl_steril_bks_12'             => safe_post('tgl_steril_bks_12') !== '' ? safe_post('tgl_steril_bks_12') : null,
				'tgl_steril_bks_13'             => safe_post('tgl_steril_bks_13') !== '' ? safe_post('tgl_steril_bks_13') : null,
				'tgl_steril_bks_14'             => safe_post('tgl_steril_bks_14') !== '' ? safe_post('tgl_steril_bks_14') : null,

				'alat_item_bks_0'      	 	=> safe_post('alat_item_bks_0')        !== '' ? safe_post('alat_item_bks_0') : NULL,
				'alat_item_bks_1'      	 	=> safe_post('alat_item_bks_1')        !== '' ? safe_post('alat_item_bks_1') : NULL,
				'alat_item_bks_2'      	 	=> safe_post('alat_item_bks_2')        !== '' ? safe_post('alat_item_bks_2') : NULL,						
				'alat_item_bks_3'      	 	=> safe_post('alat_item_bks_3')        !== '' ? safe_post('alat_item_bks_3') : NULL,						
				'alat_item_bks_4'      	 	=> safe_post('alat_item_bks_4')        !== '' ? safe_post('alat_item_bks_4') : NULL,						
				'alat_item_bks_5'      	 	=> safe_post('alat_item_bks_5')        !== '' ? safe_post('alat_item_bks_5') : NULL,						
				'alat_item_bks_6'      	 	=> safe_post('alat_item_bks_6')        !== '' ? safe_post('alat_item_bks_6') : NULL,						
				'alat_item_bks_7'      	 	=> safe_post('alat_item_bks_7')        !== '' ? safe_post('alat_item_bks_7') : NULL,						
				'alat_item_bks_8'      	 	=> safe_post('alat_item_bks_8')        !== '' ? safe_post('alat_item_bks_8') : NULL,						
				'alat_item_bks_9'      	 	=> safe_post('alat_item_bks_9')        !== '' ? safe_post('alat_item_bks_9') : NULL,						
				'alat_item_bks_10'     		=> safe_post('alat_item_bks_10')        !== '' ? safe_post('alat_item_bks_10') : NULL,						
				'alat_item_bks_11'      	=> safe_post('alat_item_bks_11')        !== '' ? safe_post('alat_item_bks_11') : NULL,						
				'alat_item_bks_12'      	=> safe_post('alat_item_bks_12')        !== '' ? safe_post('alat_item_bks_12') : NULL,						
				'alat_item_bks_13'      	=> safe_post('alat_item_bks_13')        !== '' ? safe_post('alat_item_bks_13') : NULL,						
				'alat_item_bks_14'      	=> safe_post('alat_item_bks_14')        !== '' ? safe_post('alat_item_bks_14') : NULL,						
				
				'dokter_bks_1'              => safe_post('dokter_bks_1') !== '' ? safe_post('dokter_bks_1') : null,
				'dokter_bks_2'              => safe_post('dokter_bks_2') !== '' ? safe_post('dokter_bks_2') : null,		
				'jenis_nama_operasi_bks'    => safe_post('jenis_nama_operasi_bks') !== '' ? safe_post('jenis_nama_operasi_bks') : null,		
				'perawat_bks_1'             => safe_post('perawat_bks_1') !== '' ? safe_post('perawat_bks_1') : null,		
				'perawat_bks_2'             => safe_post('perawat_bks_2') !== '' ? safe_post('perawat_bks_2') : null,		
				'perawat_bks_3'             => safe_post('perawat_bks_3') !== '' ? safe_post('perawat_bks_3') : null,		
				'perawat_bks_4'             => safe_post('perawat_bks_4') !== '' ? safe_post('perawat_bks_4') : null,		
				'perawat_bks_5'             => safe_post('perawat_bks_5') !== '' ? safe_post('perawat_bks_5') : null,							
				'jenis_anastesi_bks'        => safe_post('jenis_anastesi_bks')  		!== '' ? safe_post('jenis_anastesi_bks') : NULL,
				'jam_mulai_op_bks'      	=> safe_post('jam_mulai_op_bks')    	!== '' ? safe_post('jam_mulai_op_bks') : NULL,				
				'jam_selesai_op_bks'     	=> safe_post('jam_selesai_op_bks')        !== '' ? safe_post('jam_selesai_op_bks') : NULL,	
				'lama_operasi_bks'      	=> safe_post('lama_operasi_bks')        !== '' ? safe_post('lama_operasi_bks') : NULL,				
				'indikator_sterilisasi_bks' => safe_post('indikator_sterilisasi_bks')        !== '' ? safe_post('indikator_sterilisasi_bks') : NULL,
				'alat_item_bks'      	 	=> safe_post('alat_item_bks')        !== '' ? safe_post('alat_item_bks') : NULL,					
				'date_created'      		=> safe_post('pengkajian_date_bukti_kondisi') !== '' ? safe_post('pengkajian_date_bukti_kondisi') : null,
			);       
			$this->m_order_operasi->insertBuktiKondisiSterilisasi($pengkajian_bks);            
		}
		if (!empty($respon)) {
			$response = $respon;
		} else {
			$response = null;
		}
		if ($this->db->trans_status() === false) :
			$this->db->trans_rollback();
			$status = false;
		else :
			$this->db->trans_commit();
			$status = true;
		endif;

		$message = array(
			'status' => $status,
			'token'  => $this->security->get_csrf_hash(),
			'id_pendaftaran' => ('id_pendaftaran'),
			'id_layanan_pendaftaran' => ('id_layanan_pendaftaran'),
			'respon' => $response,
		);
		$this->response($message, REST_Controller::HTTP_OK);
	}

	// BKS 3
	function get_bukti_kondisi_sterilisasi_get(){
		if (!$this->get('id', true)) :
			$this->response(null, REST_Controller::HTTP_BAD_REQUEST);
		endif;
		$data = $this->m_order_operasi->getBuktiKondisiSterilisasiByID($this->get('id', true));
		$this->response($data, REST_Controller::HTTP_OK);
	}

	// BKS 4
	function update_bukti_kondisi_sterilisasi_put() {
		$id = $this->put('id', true);
		if (!$id) {
			$this->response(['status' => false], REST_Controller::HTTP_OK);
			return;
		}

		$id_user = $this->put('id_user');
		$id_pendaftaran = $this->put('id_pendaftaran', true);
		$id_layanan_pendaftaran = $this->put('id_layanan_pendaftaran', true);

		// Ambil data lama sebagai fallback
		$existing = $this->db->get_where('sm_bukti_kondisi_sterilisasi', ['id' => $id])->row_array();
		if (!$id_pendaftaran && isset($existing['id_pendaftaran'])) {
			$id_pendaftaran = $existing['id_pendaftaran'];
		}
		if (!$id_layanan_pendaftaran && isset($existing['id_layanan_pendaftaran'])) {
			$id_layanan_pendaftaran = $existing['id_layanan_pendaftaran'];
		}

		function convertTanggal($val) {
			return (!empty($val)) ? date('Y-m-d', strtotime(str_replace('/', '-', $val))) : null;
		}

		$tgl_operasi_bks = convertTanggal($this->put('tgl_operasi_bks', true));
		$tanggal_steril_bks = convertTanggal($this->put('tanggal_steril_bks', true));

		$tgl_steril = [];
		for ($i = 0; $i <= 14; $i++) {
			$tgl_steril["tgl_steril_bks_$i"] = convertTanggal($this->put("tgl_steril_bks_$i", true));
		}

		$alat_item = [];
		for ($i = 0; $i <= 14; $i++) {
			$val = $this->put("alat_item_bks_$i", true);
			$alat_item["alat_item_bks_$i"] = ($val !== '') ? $val : null;
		}

		$data = [
			'id' => $id,
			'id_pendaftaran' => $id_pendaftaran,
			'id_layanan_pendaftaran' => $id_layanan_pendaftaran,
			'tgl_operasi_bks' => $tgl_operasi_bks,
			'tanggal_steril_bks' => $tanggal_steril_bks,
			'jenis_nama_operasi_bks' => $this->put('jenis_nama_operasi_bks', true) ?: null,
			'dokter_bks_1' => $this->put('dokter_bks_1', true) ?: null,
			'dokter_bks_2' => $this->put('dokter_bks_2', true) ?: null,
			'jenis_anastesi_bks' => $this->put('jenis_anastesi_bks', true) ?: null,
			'jam_mulai_op_bks' => $this->put('jam_mulai_op_bks', true) ?: null,
			'jam_selesai_op_bks' => $this->put('jam_selesai_op_bks', true) ?: null,
			'lama_operasi_bks' => $this->put('lama_operasi_bks', true) ?: null,
			'indikator_sterilisasi_bks' => $this->put('indikator_sterilisasi_bks', true) ?: null,
			'alat_item_bks' => $this->put('alat_item_bks', true) ?: null,
			'updated_at' => date('Y-m-d H:i:s')
		];

		for ($i = 1; $i <= 5; $i++) {
			$key = "perawat_bks_$i";
			$data[$key] = $this->put($key, true) ?: null;
		}

		$data = array_merge($data, $tgl_steril, $alat_item);

		$status = $this->m_order_operasi->editBuktiKondisiSterilisasi($data);

		$log = $data;
		unset($log['id']);
		$log['id_logs'] = $id;
		$log['id_user'] = $id_user;
		$log['created_at'] = date('Y-m-d H:i:s');
		$log['updated_at'] = date('Y-m-d H:i:s');
		$log['deleted_at'] = date('Y-m-d H:i:s');
		$log['keterangan'] = 'Update';

		$this->m_order_operasi->insertLogBuktiKondisiSterilisasi($log);
		$this->response(['status' => $status], REST_Controller::HTTP_OK);
	}

	// BKS 5
	function hapus_bukti_kondisi_sterilisasi_delete($id) {
		$id_user = $this->delete('id_user');

		// Ambil data lama dulu untuk log
		$existing = $this->db->get_where('sm_bukti_kondisi_sterilisasi', ['id' => $id])->row_array();

		// Simpan ke log dulu sebelum data dihapus
		if ($existing) {
			unset($existing['deleted_at']);
			unset($existing['id']); // Hindari PK bentrok di logs

			$existing['id_logs'] = $id; // Referensi ke data utama
			$existing['id_user'] = $id_user;
			$existing['created_at'] = date('Y-m-d H:i:s');
			$existing['updated_at'] = date('Y-m-d H:i:s');
			$existing['deleted_at'] = date('Y-m-d H:i:s');
			$existing['keterangan'] = 'Delete';

			$this->m_order_operasi->insertLogBuktiKondisiSterilisasi($existing);
		}

		// Lakukan penghapusan (hard delete)
		$status = $this->db->where('id', $id)->delete('sm_bukti_kondisi_sterilisasi');

		$this->response([
			'status' => $status,
			'message' => $status ? 'Data berhasil dihapus.' : 'Gagal menghapus data.'
		], REST_Controller::HTTP_OK);
	}


	// PAL 1
	function get_data_pemantauan_anestesi_lokal_get(){
		if (!$this->get('id')) :
			$this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
		endif;
		$data                               = $this->m_pendaftaran->getPendaftaranDetail($this->get('id', true), $this->get('id_layanan', true));
		$data['pemantauan_anestesi_lokal']            = $this->m_order_operasi->getPemantauanAnestesiLokal($data['layanan']->id_pendaftaran);		
		if ($data) :
			$this->response($data, REST_Controller::HTTP_OK); // (200)
		endif;
	}

	// PAL 2
	function simpan_data_pemantauan_anestesi_lokal_post(){
		$id_users = safe_post('id_user');
		$layanan = array('id' => safe_post('id_layanan_pendaftaran')); 		
		$pengkajian_date_anestesi_lokal = safe_post('pengkajian_date_anestesi_lokal');		
		$pal_tanggal_pemantauan = safe_post('pal_tanggal_pemantauan');				
		$id_pendaftaran           = safe_post('id_pendaftaran');   	
		if (!empty($pengkajian_date_anestesi_lokal)) {        
			$pengkajian_pal = array(
				'id_pendaftaran'         => $id_pendaftaran,
				'id_layanan_pendaftaran' => $layanan['id'],
				'id_user'                   => safe_post('user_pengkajian') !== '' ? safe_post('user_pengkajian') : null,		
				'tanggal_pemantauan_pal'               => safe_post('tanggal_pemantauan_pal') !== '' ? safe_post('tanggal_pemantauan_pal') : null,							
				'jam_mulai_pal'        => safe_post('jam_mulai_pal')  		!== '' ? safe_post('jam_mulai_pal') : NULL,
				'jam_selesai_pal'      => safe_post('jam_selesai_pal')    	!== '' ? safe_post('jam_selesai_pal') : NULL,			
				'perawat_pal'               => safe_post('perawat_pal') !== '' ? safe_post('perawat_pal') : null, 
				'dokter_pal'               => safe_post('dokter_pal') !== '' ? safe_post('dokter_pal') : null,
				'obat_pal_1'               => safe_post('obat_pal_1') !== '' ? safe_post('obat_pal_1') : null,
				'obat_pal_2'               => safe_post('obat_pal_2') !== '' ? safe_post('obat_pal_2') : null,
				'obat_pal_3'               => safe_post('obat_pal_3') !== '' ? safe_post('obat_pal_3') : null,
				'obat_pal_4'               => safe_post('obat_pal_4') !== '' ? safe_post('obat_pal_4') : null,
				'obat_pal_5'               => safe_post('obat_pal_5') !== '' ? safe_post('obat_pal_5') : null,
				'obat_pal_6'               => safe_post('obat_pal_6') !== '' ? safe_post('obat_pal_6') : null,
				'obat_pal_7'               => safe_post('obat_pal_7') !== '' ? safe_post('obat_pal_7') : null,
				'obat_pal_8'               => safe_post('obat_pal_8') !== '' ? safe_post('obat_pal_8') : null,
				'obat_pal_9'               => safe_post('obat_pal_9') !== '' ? safe_post('obat_pal_9') : null,
				'obat_pal_10'               => safe_post('obat_pal_10') !== '' ? safe_post('obat_pal_10') : null,

				'jam_pal_1'               => safe_post('jam_pal_1') !== '' ? safe_post('jam_pal_1') : null,
				'jam_pal_2'               => safe_post('jam_pal_2') !== '' ? safe_post('jam_pal_2') : null,
				'jam_pal_3'               => safe_post('jam_pal_3') !== '' ? safe_post('jam_pal_3') : null,
				'jam_pal_4'               => safe_post('jam_pal_4') !== '' ? safe_post('jam_pal_4') : null,
				'jam_pal_5'               => safe_post('jam_pal_5') !== '' ? safe_post('jam_pal_5') : null,
				'jam_pal_6'               => safe_post('jam_pal_6') !== '' ? safe_post('jam_pal_6') : null,
				'jam_pal_7'               => safe_post('jam_pal_7') !== '' ? safe_post('jam_pal_7') : null,
				'jam_pal_8'               => safe_post('jam_pal_8') !== '' ? safe_post('jam_pal_8') : null,
				'jam_pal_9'               => safe_post('jam_pal_9') !== '' ? safe_post('jam_pal_9') : null,
				'jam_pal_10'               => safe_post('jam_pal_10') !== '' ? safe_post('jam_pal_10') : null,
				'jam_pal_11'               => safe_post('jam_pal_11') !== '' ? safe_post('jam_pal_11') : null,
				'jam_pal_12'               => safe_post('jam_pal_12') !== '' ? safe_post('jam_pal_12') : null,

				'dosis_pal_1'               => safe_post('dosis_pal_1') !== '' ? safe_post('dosis_pal_1') : null,
				'dosis_pal_2'               => safe_post('dosis_pal_2') !== '' ? safe_post('dosis_pal_2') : null,
				'dosis_pal_3'               => safe_post('dosis_pal_3') !== '' ? safe_post('dosis_pal_3') : null,
				'dosis_pal_4'               => safe_post('dosis_pal_4') !== '' ? safe_post('dosis_pal_4') : null,
				'dosis_pal_5'               => safe_post('dosis_pal_5') !== '' ? safe_post('dosis_pal_5') : null,
				'dosis_pal_6'               => safe_post('dosis_pal_6') !== '' ? safe_post('dosis_pal_6') : null,
				'dosis_pal_7'               => safe_post('dosis_pal_7') !== '' ? safe_post('dosis_pal_7') : null,
				'dosis_pal_8'               => safe_post('dosis_pal_8') !== '' ? safe_post('dosis_pal_8') : null,
				'dosis_pal_9'               => safe_post('dosis_pal_9') !== '' ? safe_post('dosis_pal_9') : null,
				'dosis_pal_10'               => safe_post('dosis_pal_10') !== '' ? safe_post('dosis_pal_10') : null,
				'dosis_pal_11'               => safe_post('dosis_pal_11') !== '' ? safe_post('dosis_pal_11') : null,
				'dosis_pal_12'               => safe_post('dosis_pal_12') !== '' ? safe_post('dosis_pal_12') : null,
				'dosis_pal_13'               => safe_post('dosis_pal_13') !== '' ? safe_post('dosis_pal_13') : null,
				'dosis_pal_14'               => safe_post('dosis_pal_14') !== '' ? safe_post('dosis_pal_14') : null,
				'dosis_pal_15'               => safe_post('dosis_pal_15') !== '' ? safe_post('dosis_pal_15') : null,
				'dosis_pal_16'               => safe_post('dosis_pal_16') !== '' ? safe_post('dosis_pal_16') : null,
				'dosis_pal_17'               => safe_post('dosis_pal_17') !== '' ? safe_post('dosis_pal_17') : null,
				'dosis_pal_18'               => safe_post('dosis_pal_18') !== '' ? safe_post('dosis_pal_18') : null,
				'dosis_pal_19'               => safe_post('dosis_pal_19') !== '' ? safe_post('dosis_pal_19') : null,
				'dosis_pal_20'               => safe_post('dosis_pal_20') !== '' ? safe_post('dosis_pal_20') : null,
				'dosis_pal_21'               => safe_post('dosis_pal_21') !== '' ? safe_post('dosis_pal_21') : null,
				'dosis_pal_22'               => safe_post('dosis_pal_22') !== '' ? safe_post('dosis_pal_22') : null,
				'dosis_pal_23'               => safe_post('dosis_pal_23') !== '' ? safe_post('dosis_pal_23') : null,
				'dosis_pal_24'               => safe_post('dosis_pal_24') !== '' ? safe_post('dosis_pal_24') : null,
				'dosis_pal_25'               => safe_post('dosis_pal_25') !== '' ? safe_post('dosis_pal_25') : null,
				'dosis_pal_26'               => safe_post('dosis_pal_26') !== '' ? safe_post('dosis_pal_26') : null,
				'dosis_pal_27'               => safe_post('dosis_pal_27') !== '' ? safe_post('dosis_pal_27') : null,
				'dosis_pal_28'               => safe_post('dosis_pal_28') !== '' ? safe_post('dosis_pal_28') : null,
				'dosis_pal_29'               => safe_post('dosis_pal_29') !== '' ? safe_post('dosis_pal_29') : null,
				'dosis_pal_30'               => safe_post('dosis_pal_30') !== '' ? safe_post('dosis_pal_30') : null,
				
				// Bedanya angka null & NULL = null kecil membuat on/ NULL besar tidak = untuk cekbox
				// 'rr_pal_1'               => safe_post('rr_pal_1') !== '' ? safe_post('rr_pal_1') : NULL,
				// 'hr_pal_2'               => safe_post('hr_pal_2') !== '' ? safe_post('hr_pal_2') : NULL,
				// 'rr_pal_3'               => safe_post('rr_pal_3') !== '' ? safe_post('rr_pal_3') : NULL,
				// 'hr_pal_4'               => safe_post('hr_pal_4') !== '' ? safe_post('hr_pal_4') : NULL,
				// 'rr_pal_5'               => safe_post('rr_pal_5') !== '' ? safe_post('rr_pal_5') : NULL,
				// 'hr_pal_6'               => safe_post('hr_pal_6') !== '' ? safe_post('hr_pal_6') : NULL,
				// 'rr_pal_7'               => safe_post('rr_pal_7') !== '' ? safe_post('rr_pal_7') : NULL,
				// 'hr_pal_8'               => safe_post('hr_pal_8') !== '' ? safe_post('hr_pal_8') : NULL,
				// 'rr_pal_9'               => safe_post('rr_pal_9') !== '' ? safe_post('rr_pal_9') : NULL,
				// 'hr_pal_10'               => safe_post('hr_pal_10') !== '' ? safe_post('hr_pal_10') : NULL,
				// 'rr_pal_11'               => safe_post('rr_pal_11') !== '' ? safe_post('rr_pal_11') : NULL,
				// 'hr_pal_12'               => safe_post('hr_pal_12') !== '' ? safe_post('hr_pal_12') : NULL,
				// 'rr_pal_13'               => safe_post('rr_pal_13') !== '' ? safe_post('rr_pal_13') : NULL,
				// 'hr_pal_14'               => safe_post('hr_pal_14') !== '' ? safe_post('hr_pal_14') : NULL,
				// 'rr_pal_15'               => safe_post('rr_pal_15') !== '' ? safe_post('rr_pal_15') : NULL,
				// 'hr_pal_16'               => safe_post('hr_pal_16') !== '' ? safe_post('hr_pal_16') : NULL,
				// 'rr_pal_17'               => safe_post('rr_pal_17') !== '' ? safe_post('rr_pal_17') : NULL,
				// 'hr_pal_18'               => safe_post('hr_pal_18') !== '' ? safe_post('hr_pal_18') : NULL,
				// 'rr_pal_19'               => safe_post('rr_pal_19') !== '' ? safe_post('rr_pal_19') : NULL,
				// 'hr_pal_20'               => safe_post('hr_pal_20') !== '' ? safe_post('hr_pal_20') : NULL,	

				'stjp_pal_1'               => safe_post('stjp_pal_1') !== '' ? safe_post('stjp_pal_1') : null,
				'stjp_pal_2'               => safe_post('stjp_pal_2') !== '' ? safe_post('stjp_pal_2') : null,
				'stjp_pal_3'               => safe_post('stjp_pal_3') !== '' ? safe_post('stjp_pal_3') : null,
				'stjp_pal_4'               => safe_post('stjp_pal_4') !== '' ? safe_post('stjp_pal_4') : null,
				'stjp_pal_5'               => safe_post('stjp_pal_5') !== '' ? safe_post('stjp_pal_5') : null,
				'stjp_pal_6'               => safe_post('stjp_pal_6') !== '' ? safe_post('stjp_pal_6') : null,
				'stjp_pal_7'               => safe_post('stjp_pal_7') !== '' ? safe_post('stjp_pal_7') : null,
				'stjp_pal_8'               => safe_post('stjp_pal_8') !== '' ? safe_post('stjp_pal_8') : null,
				'stjp_pal_9'               => safe_post('stjp_pal_9') !== '' ? safe_post('stjp_pal_9') : null,
				'stjp_pal_10'               => safe_post('stjp_pal_10') !== '' ? safe_post('stjp_pal_10') : null,
				'stjp_pal_11'               => safe_post('stjp_pal_11') !== '' ? safe_post('stjp_pal_11') : null,
				'stjp_pal_12'               => safe_post('stjp_pal_12') !== '' ? safe_post('stjp_pal_12') : null,
				'stjp_pal_13'               => safe_post('stjp_pal_13') !== '' ? safe_post('stjp_pal_13') : null,
				'stjp_pal_14'               => safe_post('stjp_pal_14') !== '' ? safe_post('stjp_pal_14') : null,
				'stjp_pal_15'               => safe_post('stjp_pal_15') !== '' ? safe_post('stjp_pal_15') : null,
				'stjp_pal_16'               => safe_post('stjp_pal_16') !== '' ? safe_post('stjp_pal_16') : null,
				'stjp_pal_17'               => safe_post('stjp_pal_17') !== '' ? safe_post('stjp_pal_17') : null,
				'stjp_pal_18'               => safe_post('stjp_pal_18') !== '' ? safe_post('stjp_pal_18') : null,
				'stjp_pal_19'               => safe_post('stjp_pal_19') !== '' ? safe_post('stjp_pal_19') : null,
				'stjp_pal_20'               => safe_post('stjp_pal_20') !== '' ? safe_post('stjp_pal_20') : null,
				'stjp_pal_21'               => safe_post('stjp_pal_21') !== '' ? safe_post('stjp_pal_21') : null,
				'stjp_pal_22'               => safe_post('stjp_pal_22') !== '' ? safe_post('stjp_pal_22') : null,
				'stjp_pal_23'               => safe_post('stjp_pal_23') !== '' ? safe_post('stjp_pal_23') : null,
				'stjp_pal_24'               => safe_post('stjp_pal_24') !== '' ? safe_post('stjp_pal_24') : null,
				'stjp_pal_25'               => safe_post('stjp_pal_25') !== '' ? safe_post('stjp_pal_25') : null,
				'stjp_pal_26'               => safe_post('stjp_pal_26') !== '' ? safe_post('stjp_pal_26') : null,
				'stjp_pal_27'               => safe_post('stjp_pal_27') !== '' ? safe_post('stjp_pal_27') : null,
				'stjp_pal_28'               => safe_post('stjp_pal_28') !== '' ? safe_post('stjp_pal_28') : null,
				'stjp_pal_29'               => safe_post('stjp_pal_29') !== '' ? safe_post('stjp_pal_29') : null,
				'stjp_pal_30'               => safe_post('stjp_pal_30') !== '' ? safe_post('stjp_pal_30') : null,

				'stjp_pal_31'               => safe_post('stjp_pal_31') !== '' ? safe_post('stjp_pal_31') : null,
				'stjp_pal_32'               => safe_post('stjp_pal_32') !== '' ? safe_post('stjp_pal_32') : null,
				'stjp_pal_33'               => safe_post('stjp_pal_33') !== '' ? safe_post('stjp_pal_33') : null,
				'stjp_pal_34'               => safe_post('stjp_pal_34') !== '' ? safe_post('stjp_pal_34') : null,
				'stjp_pal_35'               => safe_post('stjp_pal_35') !== '' ? safe_post('stjp_pal_35') : null,
				'stjp_pal_36'               => safe_post('stjp_pal_36') !== '' ? safe_post('stjp_pal_36') : null,
				'stjp_pal_37'               => safe_post('stjp_pal_37') !== '' ? safe_post('stjp_pal_37') : null,
				'stjp_pal_38'               => safe_post('stjp_pal_38') !== '' ? safe_post('stjp_pal_38') : null,
				'stjp_pal_39'               => safe_post('stjp_pal_39') !== '' ? safe_post('stjp_pal_39') : null,
				'stjp_pal_40'               => safe_post('stjp_pal_40') !== '' ? safe_post('stjp_pal_40') : null,
				'stjp_pal_41'               => safe_post('stjp_pal_41') !== '' ? safe_post('stjp_pal_41') : null,
				'stjp_pal_42'               => safe_post('stjp_pal_42') !== '' ? safe_post('stjp_pal_42') : null,
				'stjp_pal_43'               => safe_post('stjp_pal_43') !== '' ? safe_post('stjp_pal_43') : null,
				'stjp_pal_44'               => safe_post('stjp_pal_44') !== '' ? safe_post('stjp_pal_44') : null,
				'stjp_pal_45'               => safe_post('stjp_pal_45') !== '' ? safe_post('stjp_pal_45') : null,
				'stjp_pal_46'               => safe_post('stjp_pal_46') !== '' ? safe_post('stjp_pal_46') : null,
				'stjp_pal_47'               => safe_post('stjp_pal_47') !== '' ? safe_post('stjp_pal_47') : null,
				'stjp_pal_48'               => safe_post('stjp_pal_48') !== '' ? safe_post('stjp_pal_48') : null,
				'stjp_pal_49'               => safe_post('stjp_pal_49') !== '' ? safe_post('stjp_pal_49') : null,
				'stjp_pal_50'               => safe_post('stjp_pal_50') !== '' ? safe_post('stjp_pal_50') : null,

				'stjp_pal_51'               => safe_post('stjp_pal_51') !== '' ? safe_post('stjp_pal_51') : null,
				'stjp_pal_52'               => safe_post('stjp_pal_52') !== '' ? safe_post('stjp_pal_52') : null,
				'stjp_pal_53'               => safe_post('stjp_pal_53') !== '' ? safe_post('stjp_pal_53') : null,
				'stjp_pal_54'               => safe_post('stjp_pal_54') !== '' ? safe_post('stjp_pal_54') : null,
				'stjp_pal_55'               => safe_post('stjp_pal_55') !== '' ? safe_post('stjp_pal_55') : null,
				'stjp_pal_56'               => safe_post('stjp_pal_56') !== '' ? safe_post('stjp_pal_56') : null,
				'stjp_pal_57'               => safe_post('stjp_pal_57') !== '' ? safe_post('stjp_pal_57') : null,
				'stjp_pal_58'               => safe_post('stjp_pal_58') !== '' ? safe_post('stjp_pal_58') : null,
				'stjp_pal_59'               => safe_post('stjp_pal_59') !== '' ? safe_post('stjp_pal_59') : null,
				'stjp_pal_60'               => safe_post('stjp_pal_60') !== '' ? safe_post('stjp_pal_60') : null,
				'stjp_pal_61'               => safe_post('stjp_pal_61') !== '' ? safe_post('stjp_pal_61') : null,
				'stjp_pal_62'               => safe_post('stjp_pal_62') !== '' ? safe_post('stjp_pal_62') : null,
				'stjp_pal_63'               => safe_post('stjp_pal_63') !== '' ? safe_post('stjp_pal_63') : null,
				'stjp_pal_64'               => safe_post('stjp_pal_64') !== '' ? safe_post('stjp_pal_64') : null,
				'stjp_pal_65'               => safe_post('stjp_pal_65') !== '' ? safe_post('stjp_pal_65') : null,
				'stjp_pal_66'               => safe_post('stjp_pal_66') !== '' ? safe_post('stjp_pal_66') : null,
				'stjp_pal_67'               => safe_post('stjp_pal_67') !== '' ? safe_post('stjp_pal_67') : null,
				'stjp_pal_68'               => safe_post('stjp_pal_68') !== '' ? safe_post('stjp_pal_68') : null,
				'stjp_pal_69'               => safe_post('stjp_pal_69') !== '' ? safe_post('stjp_pal_69') : null,
				'stjp_pal_70'               => safe_post('stjp_pal_70') !== '' ? safe_post('stjp_pal_70') : null,

				'stjp_pal_71'               => safe_post('stjp_pal_71') !== '' ? safe_post('stjp_pal_71') : null,
				'stjp_pal_72'               => safe_post('stjp_pal_72') !== '' ? safe_post('stjp_pal_72') : null,
				'stjp_pal_73'               => safe_post('stjp_pal_73') !== '' ? safe_post('stjp_pal_73') : null,
				'stjp_pal_74'               => safe_post('stjp_pal_74') !== '' ? safe_post('stjp_pal_74') : null,
				'stjp_pal_75'               => safe_post('stjp_pal_75') !== '' ? safe_post('stjp_pal_75') : null,
				'stjp_pal_76'               => safe_post('stjp_pal_76') !== '' ? safe_post('stjp_pal_76') : null,
				'stjp_pal_77'               => safe_post('stjp_pal_77') !== '' ? safe_post('stjp_pal_77') : null,
				'stjp_pal_78'               => safe_post('stjp_pal_78') !== '' ? safe_post('stjp_pal_78') : null,
				'stjp_pal_79'               => safe_post('stjp_pal_79') !== '' ? safe_post('stjp_pal_79') : null,
				'stjp_pal_80'               => safe_post('stjp_pal_80') !== '' ? safe_post('stjp_pal_80') : null,
				'stjp_pal_81'               => safe_post('stjp_pal_81') !== '' ? safe_post('stjp_pal_81') : null,
				'stjp_pal_82'               => safe_post('stjp_pal_82') !== '' ? safe_post('stjp_pal_82') : null,
				'stjp_pal_83'               => safe_post('stjp_pal_83') !== '' ? safe_post('stjp_pal_83') : null,
				'stjp_pal_84'               => safe_post('stjp_pal_84') !== '' ? safe_post('stjp_pal_84') : null,
				'stjp_pal_85'               => safe_post('stjp_pal_85') !== '' ? safe_post('stjp_pal_85') : null,
				'stjp_pal_86'               => safe_post('stjp_pal_86') !== '' ? safe_post('stjp_pal_86') : null,
				'stjp_pal_87'               => safe_post('stjp_pal_87') !== '' ? safe_post('stjp_pal_87') : null,
				'stjp_pal_88'               => safe_post('stjp_pal_88') !== '' ? safe_post('stjp_pal_88') : null,
				'stjp_pal_89'               => safe_post('stjp_pal_89') !== '' ? safe_post('stjp_pal_89') : null,
				'stjp_pal_90'               => safe_post('stjp_pal_90') !== '' ? safe_post('stjp_pal_90') : null,

				'stjp_pal_91'               => safe_post('stjp_pal_91') !== '' ? safe_post('stjp_pal_91') : null,
				'stjp_pal_92'               => safe_post('stjp_pal_92') !== '' ? safe_post('stjp_pal_92') : null,
				'stjp_pal_93'               => safe_post('stjp_pal_93') !== '' ? safe_post('stjp_pal_93') : null,
				'stjp_pal_94'               => safe_post('stjp_pal_94') !== '' ? safe_post('stjp_pal_94') : null,
				'stjp_pal_95'               => safe_post('stjp_pal_95') !== '' ? safe_post('stjp_pal_95') : null,
				'stjp_pal_96'               => safe_post('stjp_pal_96') !== '' ? safe_post('stjp_pal_96') : null,
				'stjp_pal_97'               => safe_post('stjp_pal_97') !== '' ? safe_post('stjp_pal_97') : null,
				'stjp_pal_98'               => safe_post('stjp_pal_98') !== '' ? safe_post('stjp_pal_98') : null,
				'stjp_pal_99'               => safe_post('stjp_pal_99') !== '' ? safe_post('stjp_pal_99') : null,
				'stjp_pal_100'               => safe_post('stjp_pal_100') !== '' ? safe_post('stjp_pal_100') : null,

				'stjp_pal_101'               => safe_post('stjp_pal_101') !== '' ? safe_post('stjp_pal_101') : null,
				'stjp_pal_102'               => safe_post('stjp_pal_102') !== '' ? safe_post('stjp_pal_102') : null,
				'stjp_pal_103'               => safe_post('stjp_pal_103') !== '' ? safe_post('stjp_pal_103') : null,
				'stjp_pal_104'               => safe_post('stjp_pal_104') !== '' ? safe_post('stjp_pal_104') : null,
				'stjp_pal_105'               => safe_post('stjp_pal_105') !== '' ? safe_post('stjp_pal_105') : null,
				'stjp_pal_106'               => safe_post('stjp_pal_106') !== '' ? safe_post('stjp_pal_106') : null,
				'stjp_pal_107'               => safe_post('stjp_pal_107') !== '' ? safe_post('stjp_pal_107') : null,
				'stjp_pal_108'               => safe_post('stjp_pal_108') !== '' ? safe_post('stjp_pal_108') : null,
				'stjp_pal_109'               => safe_post('stjp_pal_109') !== '' ? safe_post('stjp_pal_109') : null,
				'stjp_pal_110'               => safe_post('stjp_pal_110') !== '' ? safe_post('stjp_pal_110') : null,
				'stjp_pal_111'               => safe_post('stjp_pal_111') !== '' ? safe_post('stjp_pal_111') : null,
				'stjp_pal_112'               => safe_post('stjp_pal_112') !== '' ? safe_post('stjp_pal_112') : null,
				'stjp_pal_113'               => safe_post('stjp_pal_113') !== '' ? safe_post('stjp_pal_113') : null,
				'stjp_pal_114'               => safe_post('stjp_pal_114') !== '' ? safe_post('stjp_pal_114') : null,
				'stjp_pal_115'               => safe_post('stjp_pal_115') !== '' ? safe_post('stjp_pal_115') : null,
				'stjp_pal_116'               => safe_post('stjp_pal_116') !== '' ? safe_post('stjp_pal_116') : null,
				'stjp_pal_117'               => safe_post('stjp_pal_117') !== '' ? safe_post('stjp_pal_117') : null,
				'stjp_pal_118'               => safe_post('stjp_pal_118') !== '' ? safe_post('stjp_pal_118') : null,
				'stjp_pal_119'               => safe_post('stjp_pal_119') !== '' ? safe_post('stjp_pal_119') : null,
				'stjp_pal_120'               => safe_post('stjp_pal_120') !== '' ? safe_post('stjp_pal_120') : null,

				'td_pal_1'               => safe_post('td_pal_1') !== '' ? safe_post('td_pal_1') : null,
				'td_pal_2'               => safe_post('td_pal_2') !== '' ? safe_post('td_pal_2') : null,
				'td_pal_3'               => safe_post('td_pal_3') !== '' ? safe_post('td_pal_3') : null,
				'td_pal_4'               => safe_post('td_pal_4') !== '' ? safe_post('td_pal_4') : null,
				'td_pal_5'               => safe_post('td_pal_5') !== '' ? safe_post('td_pal_5') : null,
				'td_pal_6'               => safe_post('td_pal_6') !== '' ? safe_post('td_pal_6') : null,
				'td_pal_7'               => safe_post('td_pal_7') !== '' ? safe_post('td_pal_7') : null,
				'td_pal_8'               => safe_post('td_pal_8') !== '' ? safe_post('td_pal_8') : null,
				'td_pal_9'               => safe_post('td_pal_9') !== '' ? safe_post('td_pal_9') : null,
				'td_pal_10'               => safe_post('td_pal_10') !== '' ? safe_post('td_pal_10') : null,
				'td_pal_11'               => safe_post('td_pal_11') !== '' ? safe_post('td_pal_11') : null,
				'td_pal_12'               => safe_post('td_pal_12') !== '' ? safe_post('td_pal_12') : null,
				'td_pal_13'               => safe_post('td_pal_13') !== '' ? safe_post('td_pal_13') : null,
				'td_pal_14'               => safe_post('td_pal_14') !== '' ? safe_post('td_pal_14') : null,
				'td_pal_15'               => safe_post('td_pal_15') !== '' ? safe_post('td_pal_15') : null,
				'td_pal_16'               => safe_post('td_pal_16') !== '' ? safe_post('td_pal_16') : null,
				'td_pal_17'               => safe_post('td_pal_17') !== '' ? safe_post('td_pal_17') : null,

				'so2_pal_1'               => safe_post('so2_pal_1') !== '' ? safe_post('so2_pal_1') : null,
				'so2_pal_2'               => safe_post('so2_pal_2') !== '' ? safe_post('so2_pal_2') : null,
				'so2_pal_3'               => safe_post('so2_pal_3') !== '' ? safe_post('so2_pal_3') : null,
				'so2_pal_4'               => safe_post('so2_pal_4') !== '' ? safe_post('so2_pal_4') : null,
				'so2_pal_5'               => safe_post('so2_pal_5') !== '' ? safe_post('so2_pal_5') : null,
				'so2_pal_6'               => safe_post('so2_pal_6') !== '' ? safe_post('so2_pal_6') : null,
				'so2_pal_7'               => safe_post('so2_pal_7') !== '' ? safe_post('so2_pal_7') : null,
				'so2_pal_8'               => safe_post('so2_pal_8') !== '' ? safe_post('so2_pal_8') : null,
				'so2_pal_9'               => safe_post('so2_pal_9') !== '' ? safe_post('so2_pal_9') : null,
				'so2_pal_10'               => safe_post('so2_pal_10') !== '' ? safe_post('so2_pal_10') : null,
				'so2_pal_11'               => safe_post('so2_pal_11') !== '' ? safe_post('so2_pal_11') : null,
				'so2_pal_12'               => safe_post('so2_pal_12') !== '' ? safe_post('so2_pal_12') : null,
				'so2_pal_13'               => safe_post('so2_pal_13') !== '' ? safe_post('so2_pal_13') : null,
				'so2_pal_14'               => safe_post('so2_pal_14') !== '' ? safe_post('so2_pal_14') : null,
				'so2_pal_15'               => safe_post('so2_pal_15') !== '' ? safe_post('so2_pal_15') : null,
				'so2_pal_16'               => safe_post('so2_pal_16') !== '' ? safe_post('so2_pal_16') : null,
				'so2_pal_17'               => safe_post('so2_pal_17') !== '' ? safe_post('so2_pal_17') : null,

				'kd_pal_1'               => safe_post('kd_pal_1') !== '' ? safe_post('kd_pal_1') : null,
				'kd_pal_2'               => safe_post('kd_pal_2') !== '' ? safe_post('kd_pal_2') : null,
				'kd_pal_3'               => safe_post('kd_pal_3') !== '' ? safe_post('kd_pal_3') : null,
				'kd_pal_4'               => safe_post('kd_pal_4') !== '' ? safe_post('kd_pal_4') : null,
				'kd_pal_5'               => safe_post('kd_pal_5') !== '' ? safe_post('kd_pal_5') : null,
				'kd_pal_6'               => safe_post('kd_pal_6') !== '' ? safe_post('kd_pal_6') : null,
				'kd_pal_7'               => safe_post('kd_pal_7') !== '' ? safe_post('kd_pal_7') : null,
				'kd_pal_8'               => safe_post('kd_pal_8') !== '' ? safe_post('kd_pal_8') : null,
				'kd_pal_9'               => safe_post('kd_pal_9') !== '' ? safe_post('kd_pal_9') : null,
				'kd_pal_10'               => safe_post('kd_pal_10') !== '' ? safe_post('kd_pal_10') : null,
				'kd_pal_11'               => safe_post('kd_pal_11') !== '' ? safe_post('kd_pal_11') : null,
				'kd_pal_12'               => safe_post('kd_pal_12') !== '' ? safe_post('kd_pal_12') : null,
				'kd_pal_13'               => safe_post('kd_pal_13') !== '' ? safe_post('kd_pal_13') : null,
				'kd_pal_14'               => safe_post('kd_pal_14') !== '' ? safe_post('kd_pal_14') : null,
				'kd_pal_15'               => safe_post('kd_pal_15') !== '' ? safe_post('kd_pal_15') : null,
				'kd_pal_16'               => safe_post('kd_pal_16') !== '' ? safe_post('kd_pal_16') : null,
				'kd_pal_17'               => safe_post('kd_pal_17') !== '' ? safe_post('kd_pal_17') : null,						
				'date_created'      => safe_post('pengkajian_date_anestesi_lokal') !== '' ? safe_post('pengkajian_date_anestesi_lokal') : null,
			);       
			//  var_dump($pengkajian_pal);die;    
			$this->m_order_operasi->insertPemantauanAnestesiLokal($pengkajian_pal);            
		}
		if (!empty($respon)) {
			$response = $respon;
		} else {
			$response = null;
		}
		if ($this->db->trans_status() === false) :
			$this->db->trans_rollback();
			$status = false;
		else :
			$this->db->trans_commit();
			$status = true;
		endif;

		$message = array(
			'status' => $status,
			'token'  => $this->security->get_csrf_hash(),
			'id_pendaftaran' => ('id_pendaftaran'),
			'id_layanan_pendaftaran' => ('id_layanan_pendaftaran'),
			'respon' => $response,
		);
		$this->response($message, REST_Controller::HTTP_OK);
	}

	// PAL 3
	function hapus_pemantauan_anestesi_lokal_delete($id){
		$status = $this->m_order_operasi->deletePemantauanAnestesiLokal($id);
		if ($status) :
			$response = array('status' => $status, 'message' => 'Berhasil menghapus Pemantauan Anestesi Lokal!');
		else :
			$response = array('status' => $status, 'message' => 'Gagal menghapus Pemantauan Anestesi Lokal!');
		endif;
		$this->response($response, REST_Controller::HTTP_OK);
	}

	//  PAL 4
	function get_pemantauan_anestesi_lokal_get(){
		if (!$this->get('id', true)) :
			$this->response(null, REST_Controller::HTTP_BAD_REQUEST);
		endif;
		$data = $this->m_order_operasi->getPemantauanAnestesiLokalByID($this->get('id', true));
		$this->response($data, REST_Controller::HTTP_OK);
	}

	//  PAL 5
	function update_pemantauan_anestesi_lokal_put(){
		if (!$this->put('id', true)) :
			$this->response(array('status' => false), REST_Controller::HTTP_OK);
		endif;
		$tanggal_pemantauan_pal = $this->put('tanggal_pemantauan_pal', true);
		$tanggal_pemantauan_pal = str_replace('/', '-', $tanggal_pemantauan_pal);
		$tanggal_pemantauan_pal = date('Y-m-d', strtotime($tanggal_pemantauan_pal));
		$jam_mulai_pal       	= $this->put('jam_mulai_pal', true);
		$jam_selesai_pal       	= $this->put('jam_selesai_pal', true);
		$perawat_pal            = $this->put('perawat_pal', true);
		$dokter_pal             = $this->put('dokter_pal', true);
		$obat_pal_1             = $this->put('obat_pal_1', true);
		$obat_pal_2             = $this->put('obat_pal_2', true);
		$obat_pal_3             = $this->put('obat_pal_3', true);
		$obat_pal_4             = $this->put('obat_pal_4', true);
		$obat_pal_5             = $this->put('obat_pal_5', true);
		$obat_pal_6             = $this->put('obat_pal_6', true);
		$obat_pal_7             = $this->put('obat_pal_7', true);
		$obat_pal_8             = $this->put('obat_pal_8', true);
		$obat_pal_9             = $this->put('obat_pal_9', true);
		$obat_pal_10            = $this->put('obat_pal_10', true);
		
		$jam_pal_1              = $this->put('jam_pal_1', true);
		$jam_pal_2              = $this->put('jam_pal_2', true);
		$jam_pal_3              = $this->put('jam_pal_3', true);
		$jam_pal_4              = $this->put('jam_pal_4', true);
		$jam_pal_5              = $this->put('jam_pal_5', true);
		$jam_pal_6              = $this->put('jam_pal_6', true);
		$jam_pal_7              = $this->put('jam_pal_7', true);
		$jam_pal_8              = $this->put('jam_pal_8', true);
		$jam_pal_9              = $this->put('jam_pal_9', true);
		$jam_pal_10             = $this->put('jam_pal_10', true);
		$jam_pal_11             = $this->put('jam_pal_11', true);
		$jam_pal_12             = $this->put('jam_pal_12', true);

		$dosis_pal_1          	= $this->put('dosis_pal_1', true);
		$dosis_pal_2            = $this->put('dosis_pal_2', true);
		$dosis_pal_3            = $this->put('dosis_pal_3', true);
		$dosis_pal_4            = $this->put('dosis_pal_4', true);
		$dosis_pal_5            = $this->put('dosis_pal_5', true);
		$dosis_pal_6            = $this->put('dosis_pal_6', true);
		$dosis_pal_7            = $this->put('dosis_pal_7', true);
		$dosis_pal_8            = $this->put('dosis_pal_8', true);
		$dosis_pal_9            = $this->put('dosis_pal_9', true);
		$dosis_pal_10           = $this->put('dosis_pal_10', true);
		$dosis_pal_11           = $this->put('dosis_pal_11', true);
		$dosis_pal_12           = $this->put('dosis_pal_12', true);
		$dosis_pal_13           = $this->put('dosis_pal_13', true);
		$dosis_pal_14           = $this->put('dosis_pal_14', true);
		$dosis_pal_15           = $this->put('dosis_pal_15', true);
		$dosis_pal_16           = $this->put('dosis_pal_16', true);
		$dosis_pal_17           = $this->put('dosis_pal_17', true);
		$dosis_pal_18          	= $this->put('dosis_pal_18', true);
		$dosis_pal_19           = $this->put('dosis_pal_19', true);
		$dosis_pal_20           = $this->put('dosis_pal_20', true);				
		$dosis_pal_21           = $this->put('dosis_pal_21', true);
		$dosis_pal_22           = $this->put('dosis_pal_22', true);
		$dosis_pal_23           = $this->put('dosis_pal_23', true);
		$dosis_pal_24           = $this->put('dosis_pal_24', true);
		$dosis_pal_25           = $this->put('dosis_pal_25', true);
		$dosis_pal_26           = $this->put('dosis_pal_26', true);
		$dosis_pal_27           = $this->put('dosis_pal_27', true);
		$dosis_pal_28           = $this->put('dosis_pal_28', true);
		$dosis_pal_29           = $this->put('dosis_pal_29', true);
		$dosis_pal_30          	= $this->put('dosis_pal_30', true);

		// $rr_pal_1              	= $this->put('rr_pal_1', true);
		// $hr_pal_2               = $this->put('hr_pal_2', true);
		// $rr_pal_3               = $this->put('rr_pal_3', true);
		// $hr_pal_4               = $this->put('hr_pal_4', true);
		// $rr_pal_5               = $this->put('rr_pal_5', true);
		// $hr_pal_6               = $this->put('hr_pal_6', true);
		// $rr_pal_7               = $this->put('rr_pal_7', true);
		// $hr_pal_8               = $this->put('hr_pal_8', true);
		// $rr_pal_9               = $this->put('rr_pal_9', true);
		// $hr_pal_10              = $this->put('hr_pal_10', true);
		// $rr_pal_11              = $this->put('rr_pal_11', true);
		// $hr_pal_12             	= $this->put('hr_pal_12', true);
		// $rr_pal_13              = $this->put('rr_pal_13', true);
		// $hr_pal_14              = $this->put('hr_pal_14', true);
		// $rr_pal_15              = $this->put('rr_pal_15', true);
		// $hr_pal_16              = $this->put('hr_pal_16', true);
		// $rr_pal_17              = $this->put('rr_pal_17', true);
		// $hr_pal_18              = $this->put('hr_pal_18', true);
		// $rr_pal_19              = $this->put('rr_pal_19', true);
		// $hr_pal_20              = $this->put('hr_pal_20', true);

		$stjp_pal_1          	= $this->put('stjp_pal_1', true);
		$stjp_pal_2            = $this->put('stjp_pal_2', true);
		$stjp_pal_3            = $this->put('stjp_pal_3', true);
		$stjp_pal_4            = $this->put('stjp_pal_4', true);
		$stjp_pal_5            = $this->put('stjp_pal_5', true);
		$stjp_pal_6            = $this->put('stjp_pal_6', true);
		$stjp_pal_7            = $this->put('stjp_pal_7', true);
		$stjp_pal_8            = $this->put('stjp_pal_8', true);
		$stjp_pal_9            = $this->put('stjp_pal_9', true);
		$stjp_pal_10           = $this->put('stjp_pal_10', true);
		$stjp_pal_11           = $this->put('stjp_pal_11', true);
		$stjp_pal_12           = $this->put('stjp_pal_12', true);
		$stjp_pal_13           = $this->put('stjp_pal_13', true);
		$stjp_pal_14           = $this->put('stjp_pal_14', true);
		$stjp_pal_15           = $this->put('stjp_pal_15', true);
		$stjp_pal_16           = $this->put('stjp_pal_16', true);
		$stjp_pal_17           = $this->put('stjp_pal_17', true);
		$stjp_pal_18          	= $this->put('stjp_pal_18', true);
		$stjp_pal_19           = $this->put('stjp_pal_19', true);
		$stjp_pal_20           = $this->put('stjp_pal_20', true);				
		$stjp_pal_21           = $this->put('stjp_pal_21', true);
		$stjp_pal_22           = $this->put('stjp_pal_22', true);
		$stjp_pal_23           = $this->put('stjp_pal_23', true);
		$stjp_pal_24           = $this->put('stjp_pal_24', true);
		$stjp_pal_25           = $this->put('stjp_pal_25', true);
		$stjp_pal_26           = $this->put('stjp_pal_26', true);
		$stjp_pal_27           = $this->put('stjp_pal_27', true);
		$stjp_pal_28           = $this->put('stjp_pal_28', true);
		$stjp_pal_29           = $this->put('stjp_pal_29', true);
		$stjp_pal_30          	= $this->put('stjp_pal_30', true);

		$stjp_pal_31           = $this->put('stjp_pal_31', true);
		$stjp_pal_32           = $this->put('stjp_pal_32', true);
		$stjp_pal_33           = $this->put('stjp_pal_33', true);
		$stjp_pal_34           = $this->put('stjp_pal_34', true);
		$stjp_pal_35           = $this->put('stjp_pal_35', true);
		$stjp_pal_36           = $this->put('stjp_pal_36', true);
		$stjp_pal_37           = $this->put('stjp_pal_37', true);
		$stjp_pal_38          	= $this->put('stjp_pal_38', true);
		$stjp_pal_39           = $this->put('stjp_pal_39', true);
		$stjp_pal_40           = $this->put('stjp_pal_40', true);				
		$stjp_pal_41           = $this->put('stjp_pal_41', true);
		$stjp_pal_42           = $this->put('stjp_pal_42', true);
		$stjp_pal_43           = $this->put('stjp_pal_43', true);
		$stjp_pal_44           = $this->put('stjp_pal_44', true);
		$stjp_pal_45           = $this->put('stjp_pal_45', true);
		$stjp_pal_46           = $this->put('stjp_pal_46', true);
		$stjp_pal_47           = $this->put('stjp_pal_47', true);
		$stjp_pal_48           = $this->put('stjp_pal_48', true);
		$stjp_pal_49           = $this->put('stjp_pal_49', true);
		$stjp_pal_50          	= $this->put('stjp_pal_50', true);

		$stjp_pal_51           = $this->put('stjp_pal_51', true);
		$stjp_pal_52           = $this->put('stjp_pal_52', true);
		$stjp_pal_53           = $this->put('stjp_pal_53', true);
		$stjp_pal_54           = $this->put('stjp_pal_54', true);
		$stjp_pal_55           = $this->put('stjp_pal_55', true);
		$stjp_pal_56           = $this->put('stjp_pal_56', true);
		$stjp_pal_57           = $this->put('stjp_pal_57', true);
		$stjp_pal_58          	= $this->put('stjp_pal_58', true);
		$stjp_pal_59           = $this->put('stjp_pal_59', true);
		$stjp_pal_60           = $this->put('stjp_pal_60', true);				
		$stjp_pal_61           = $this->put('stjp_pal_61', true);
		$stjp_pal_62           = $this->put('stjp_pal_62', true);
		$stjp_pal_63           = $this->put('stjp_pal_63', true);
		$stjp_pal_64           = $this->put('stjp_pal_64', true);
		$stjp_pal_65           = $this->put('stjp_pal_65', true);
		$stjp_pal_66           = $this->put('stjp_pal_66', true);
		$stjp_pal_67           = $this->put('stjp_pal_67', true);
		$stjp_pal_68           = $this->put('stjp_pal_68', true);
		$stjp_pal_69           = $this->put('stjp_pal_69', true);
		$stjp_pal_70          	= $this->put('stjp_pal_70', true);

		$stjp_pal_71           = $this->put('stjp_pal_71', true);
		$stjp_pal_72           = $this->put('stjp_pal_72', true);
		$stjp_pal_73           = $this->put('stjp_pal_73', true);
		$stjp_pal_74           = $this->put('stjp_pal_74', true);
		$stjp_pal_75           = $this->put('stjp_pal_75', true);
		$stjp_pal_76           = $this->put('stjp_pal_76', true);
		$stjp_pal_77           = $this->put('stjp_pal_77', true);
		$stjp_pal_78          	= $this->put('stjp_pal_78', true);
		$stjp_pal_79           = $this->put('stjp_pal_79', true);
		$stjp_pal_80           = $this->put('stjp_pal_80', true);				
		$stjp_pal_81           = $this->put('stjp_pal_81', true);
		$stjp_pal_82           = $this->put('stjp_pal_82', true);
		$stjp_pal_83           = $this->put('stjp_pal_83', true);
		$stjp_pal_84           = $this->put('stjp_pal_84', true);
		$stjp_pal_85           = $this->put('stjp_pal_85', true);
		$stjp_pal_86           = $this->put('stjp_pal_86', true);
		$stjp_pal_87           = $this->put('stjp_pal_87', true);
		$stjp_pal_88           = $this->put('stjp_pal_88', true);
		$stjp_pal_89           = $this->put('stjp_pal_89', true);
		$stjp_pal_90          	= $this->put('stjp_pal_90', true);

		$stjp_pal_91           = $this->put('stjp_pal_91', true);
		$stjp_pal_92           = $this->put('stjp_pal_92', true);
		$stjp_pal_93           = $this->put('stjp_pal_93', true);
		$stjp_pal_94           = $this->put('stjp_pal_94', true);
		$stjp_pal_95           = $this->put('stjp_pal_95', true);
		$stjp_pal_96           = $this->put('stjp_pal_96', true);
		$stjp_pal_97           = $this->put('stjp_pal_97', true);
		$stjp_pal_98          	= $this->put('stjp_pal_98', true);
		$stjp_pal_99           = $this->put('stjp_pal_99', true);
		$stjp_pal_100           = $this->put('stjp_pal_100', true);

		$stjp_pal_101           = $this->put('stjp_pal_101', true);	
		$stjp_pal_102           = $this->put('stjp_pal_102', true);	
		$stjp_pal_103           = $this->put('stjp_pal_103', true);	
		$stjp_pal_104           = $this->put('stjp_pal_104', true);	
		$stjp_pal_105           = $this->put('stjp_pal_105', true);	
		$stjp_pal_106           = $this->put('stjp_pal_106', true);	
		$stjp_pal_107           = $this->put('stjp_pal_107', true);	
		$stjp_pal_108           = $this->put('stjp_pal_108', true);	
		$stjp_pal_109           = $this->put('stjp_pal_109', true);	
		$stjp_pal_110           = $this->put('stjp_pal_110', true);	
		$stjp_pal_111           = $this->put('stjp_pal_111', true);	
		$stjp_pal_112           = $this->put('stjp_pal_112', true);	
		$stjp_pal_113           = $this->put('stjp_pal_113', true);	
		$stjp_pal_114           = $this->put('stjp_pal_114', true);	
		$stjp_pal_115           = $this->put('stjp_pal_115', true);	
		$stjp_pal_116           = $this->put('stjp_pal_116', true);	
		$stjp_pal_117           = $this->put('stjp_pal_117', true);	
		$stjp_pal_118           = $this->put('stjp_pal_118', true);	
		$stjp_pal_119           = $this->put('stjp_pal_119', true);	
		$stjp_pal_120           = $this->put('stjp_pal_120', true);
		
		$td_pal_1          	= $this->put('td_pal_1', true);
		$td_pal_2            = $this->put('td_pal_2', true);
		$td_pal_3            = $this->put('td_pal_3', true);
		$td_pal_4            = $this->put('td_pal_4', true);
		$td_pal_5            = $this->put('td_pal_5', true);
		$td_pal_6            = $this->put('td_pal_6', true);
		$td_pal_7            = $this->put('td_pal_7', true);
		$td_pal_8            = $this->put('td_pal_8', true);
		$td_pal_9            = $this->put('td_pal_9', true);
		$td_pal_10           = $this->put('td_pal_10', true);
		$td_pal_11           = $this->put('td_pal_11', true);
		$td_pal_12           = $this->put('td_pal_12', true);
		$td_pal_13           = $this->put('td_pal_13', true);
		$td_pal_14           = $this->put('td_pal_14', true);
		$td_pal_15           = $this->put('td_pal_15', true);
		$td_pal_16           = $this->put('td_pal_16', true);
		$td_pal_17           = $this->put('td_pal_17', true);

		$so2_pal_1          	= $this->put('so2_pal_1', true);
		$so2_pal_2            = $this->put('so2_pal_2', true);
		$so2_pal_3            = $this->put('so2_pal_3', true);
		$so2_pal_4            = $this->put('so2_pal_4', true);
		$so2_pal_5            = $this->put('so2_pal_5', true);
		$so2_pal_6            = $this->put('so2_pal_6', true);
		$so2_pal_7            = $this->put('so2_pal_7', true);
		$so2_pal_8            = $this->put('so2_pal_8', true);
		$so2_pal_9            = $this->put('so2_pal_9', true);
		$so2_pal_10           = $this->put('so2_pal_10', true);
		$so2_pal_11           = $this->put('so2_pal_11', true);
		$so2_pal_12           = $this->put('so2_pal_12', true);
		$so2_pal_13           = $this->put('so2_pal_13', true);
		$so2_pal_14           = $this->put('so2_pal_14', true);
		$so2_pal_15           = $this->put('so2_pal_15', true);
		$so2_pal_16           = $this->put('so2_pal_16', true);
		$so2_pal_17           = $this->put('so2_pal_17', true);

		$kd_pal_1          	= $this->put('kd_pal_1', true);
		$kd_pal_2            = $this->put('kd_pal_2', true);
		$kd_pal_3            = $this->put('kd_pal_3', true);
		$kd_pal_4            = $this->put('kd_pal_4', true);
		$kd_pal_5            = $this->put('kd_pal_5', true);
		$kd_pal_6            = $this->put('kd_pal_6', true);
		$kd_pal_7            = $this->put('kd_pal_7', true);
		$kd_pal_8            = $this->put('kd_pal_8', true);
		$kd_pal_9            = $this->put('kd_pal_9', true);
		$kd_pal_10           = $this->put('kd_pal_10', true);
		$kd_pal_11           = $this->put('kd_pal_11', true);
		$kd_pal_12           = $this->put('kd_pal_12', true);
		$kd_pal_13           = $this->put('kd_pal_13', true);
		$kd_pal_14           = $this->put('kd_pal_14', true);
		$kd_pal_15           = $this->put('kd_pal_15', true);
		$kd_pal_16           = $this->put('kd_pal_16', true);
		$kd_pal_17           = $this->put('kd_pal_17', true);					
		$data = array(
			'id'                    	=> $this->put('id', true),
			'tanggal_pemantauan_pal'    => $tanggal_pemantauan_pal,
			'jam_mulai_pal'       		=> $jam_mulai_pal !== '' ? $jam_mulai_pal : null,					
			'jam_selesai_pal'          	=> $jam_selesai_pal !== '' ? $jam_selesai_pal : null,						
			'perawat_pal'               => $perawat_pal !== '' ? $perawat_pal : null,
			'dokter_pal'                => $dokter_pal !== '' ? $dokter_pal : null,
			'obat_pal_1'                => $obat_pal_1 !== '' ? $obat_pal_1 : null,
			'obat_pal_2'                => $obat_pal_2 !== '' ? $obat_pal_2 : null,
			'obat_pal_3'                => $obat_pal_3 !== '' ? $obat_pal_3 : null,
			'obat_pal_4'                => $obat_pal_4 !== '' ? $obat_pal_4 : null,
			'obat_pal_5'                => $obat_pal_5 !== '' ? $obat_pal_5 : null,
			'obat_pal_6'                => $obat_pal_6 !== '' ? $obat_pal_6 : null,
			'obat_pal_7'                => $obat_pal_7 !== '' ? $obat_pal_7 : null,
			'obat_pal_8'                => $obat_pal_8 !== '' ? $obat_pal_8 : null,
			'obat_pal_9'                => $obat_pal_9 !== '' ? $obat_pal_9 : null,
			'obat_pal_10'               => $obat_pal_10 !== '' ? $obat_pal_10 : null,

			'jam_pal_1'                 => $jam_pal_1 !== '' ? $jam_pal_1 : null,
			'jam_pal_2'                 => $jam_pal_2 !== '' ? $jam_pal_2 : null,
			'jam_pal_3'                 => $jam_pal_3 !== '' ? $jam_pal_3 : null,
			'jam_pal_4'                 => $jam_pal_4 !== '' ? $jam_pal_4 : null,
			'jam_pal_5'                 => $jam_pal_5 !== '' ? $jam_pal_5 : null,
			'jam_pal_6'                 => $jam_pal_6 !== '' ? $jam_pal_6 : null,
			'jam_pal_7'                 => $jam_pal_7 !== '' ? $jam_pal_7 : null,
			'jam_pal_8'                 => $jam_pal_8 !== '' ? $jam_pal_8 : null,
			'jam_pal_9'                 => $jam_pal_9 !== '' ? $jam_pal_9 : null,
			'jam_pal_10'                => $jam_pal_10 !== '' ? $jam_pal_10 : null,
			'jam_pal_11'                => $jam_pal_11 !== '' ? $jam_pal_11 : null,
			'jam_pal_12'                => $jam_pal_12 !== '' ? $jam_pal_12 : null,

			'dosis_pal_1'               => $dosis_pal_1 !== '' ? $dosis_pal_1 : null,
			'dosis_pal_2'               => $dosis_pal_2 !== '' ? $dosis_pal_2 : null,
			'dosis_pal_3'               => $dosis_pal_3 !== '' ? $dosis_pal_3 : null,
			'dosis_pal_4'               => $dosis_pal_4 !== '' ? $dosis_pal_4 : null,
			'dosis_pal_5'               => $dosis_pal_5 !== '' ? $dosis_pal_5 : null,
			'dosis_pal_6'               => $dosis_pal_6 !== '' ? $dosis_pal_6 : null,
			'dosis_pal_7'               => $dosis_pal_7 !== '' ? $dosis_pal_7 : null,
			'dosis_pal_8'               => $dosis_pal_8 !== '' ? $dosis_pal_8 : null,
			'dosis_pal_9'               => $dosis_pal_9 !== '' ? $dosis_pal_9 : null,
			'dosis_pal_10'              => $dosis_pal_10 !== '' ? $dosis_pal_10 : null,
			'dosis_pal_11'              => $dosis_pal_11 !== '' ? $dosis_pal_11 : null,
			'dosis_pal_12'              => $dosis_pal_12 !== '' ? $dosis_pal_12 : null,
			'dosis_pal_13'              => $dosis_pal_13 !== '' ? $dosis_pal_13 : null,
			'dosis_pal_14'             	=> $dosis_pal_14 !== '' ? $dosis_pal_14 : null,
			'dosis_pal_15'              => $dosis_pal_15 !== '' ? $dosis_pal_15 : null,
			'dosis_pal_16'              => $dosis_pal_16 !== '' ? $dosis_pal_16 : null,
			'dosis_pal_17'              => $dosis_pal_17 !== '' ? $dosis_pal_17 : null,
			'dosis_pal_18'           	=> $dosis_pal_18 !== '' ? $dosis_pal_18 : null,
			'dosis_pal_19'              => $dosis_pal_19 !== '' ? $dosis_pal_19 : null,
			'dosis_pal_20'              => $dosis_pal_20 !== '' ? $dosis_pal_20 : null,
			'dosis_pal_21'              => $dosis_pal_21 !== '' ? $dosis_pal_21 : null,
			'dosis_pal_22'              => $dosis_pal_22 !== '' ? $dosis_pal_22 : null,
			'dosis_pal_23'             	=> $dosis_pal_23 !== '' ? $dosis_pal_23 : null,
			'dosis_pal_24'              => $dosis_pal_24 !== '' ? $dosis_pal_24 : null,
			'dosis_pal_25'              => $dosis_pal_25 !== '' ? $dosis_pal_25 : null,
			'dosis_pal_26'              => $dosis_pal_26 !== '' ? $dosis_pal_26 : null,
			'dosis_pal_27'              => $dosis_pal_27 !== '' ? $dosis_pal_27 : null,
			'dosis_pal_28'              => $dosis_pal_28 !== '' ? $dosis_pal_28 : null,
			'dosis_pal_29'              => $dosis_pal_29 !== '' ? $dosis_pal_29 : null,
			'dosis_pal_30'              => $dosis_pal_30 !== '' ? $dosis_pal_30 : null,

			// 'rr_pal_1'                  => $rr_pal_1 !== '' ? $rr_pal_1 : null,
			// 'hr_pal_2'                  => $hr_pal_2 !== '' ? $hr_pal_2 : null,
			// 'rr_pal_3'                  => $rr_pal_3 !== '' ? $rr_pal_3 : null,
			// 'hr_pal_4'                  => $hr_pal_4 !== '' ? $hr_pal_4 : null,
			// 'rr_pal_5'                  => $rr_pal_5 !== '' ? $rr_pal_5 : null,
			// 'hr_pal_6'                 	=> $hr_pal_6 !== '' ? $hr_pal_6 : null,
			// 'rr_pal_7'                  => $rr_pal_7 !== '' ? $rr_pal_7 : null,
			// 'hr_pal_8'                  => $hr_pal_8 !== '' ? $hr_pal_8 : null,
			// 'rr_pal_9'                	=> $rr_pal_9 !== '' ? $rr_pal_9 : null,
			// 'hr_pal_10'                 => $hr_pal_10 !== '' ? $hr_pal_10 : null,
			// 'rr_pal_11'                 => $rr_pal_11 !== '' ? $rr_pal_11 : null,
			// 'hr_pal_12'                	=> $hr_pal_12 !== '' ? $hr_pal_12 : null,
			// 'rr_pal_13'                 => $rr_pal_13 !== '' ? $rr_pal_13 : null,
			// 'hr_pal_14'                 => $hr_pal_14 !== '' ? $hr_pal_14 : null,
			// 'rr_pal_15'                 => $rr_pal_15 !== '' ? $rr_pal_15 : null,
			// 'hr_pal_16'                 => $hr_pal_16 !== '' ? $hr_pal_16 : null,
			// 'rr_pal_17'                 => $rr_pal_17 !== '' ? $rr_pal_17 : null,
			// 'hr_pal_18'               	=> $hr_pal_18 !== '' ? $hr_pal_18 : null,
			// 'rr_pal_19'                 => $rr_pal_19 !== '' ? $rr_pal_19 : null,
			// 'hr_pal_20'                 => $hr_pal_20 !== '' ? $hr_pal_20 : null,

			'stjp_pal_1'               => $stjp_pal_1 !== '' ? $stjp_pal_1 : null,
			'stjp_pal_2'               => $stjp_pal_2 !== '' ? $stjp_pal_2 : null,
			'stjp_pal_3'               => $stjp_pal_3 !== '' ? $stjp_pal_3 : null,
			'stjp_pal_4'               => $stjp_pal_4 !== '' ? $stjp_pal_4 : null,
			'stjp_pal_5'               => $stjp_pal_5 !== '' ? $stjp_pal_5 : null,
			'stjp_pal_6'               => $stjp_pal_6 !== '' ? $stjp_pal_6 : null,
			'stjp_pal_7'               => $stjp_pal_7 !== '' ? $stjp_pal_7 : null,
			'stjp_pal_8'               => $stjp_pal_8 !== '' ? $stjp_pal_8 : null,
			'stjp_pal_9'               => $stjp_pal_9 !== '' ? $stjp_pal_9 : null,
			'stjp_pal_10'              => $stjp_pal_10 !== '' ? $stjp_pal_10 : null,
			'stjp_pal_11'              => $stjp_pal_11 !== '' ? $stjp_pal_11 : null,
			'stjp_pal_12'              => $stjp_pal_12 !== '' ? $stjp_pal_12 : null,
			'stjp_pal_13'              => $stjp_pal_13 !== '' ? $stjp_pal_13 : null,
			'stjp_pal_14'             	=> $stjp_pal_14 !== '' ? $stjp_pal_14 : null,
			'stjp_pal_15'              => $stjp_pal_15 !== '' ? $stjp_pal_15 : null,
			'stjp_pal_16'              => $stjp_pal_16 !== '' ? $stjp_pal_16 : null,
			'stjp_pal_17'              => $stjp_pal_17 !== '' ? $stjp_pal_17 : null,
			'stjp_pal_18'           	=> $stjp_pal_18 !== '' ? $stjp_pal_18 : null,
			'stjp_pal_19'              => $stjp_pal_19 !== '' ? $stjp_pal_19 : null,
			'stjp_pal_20'              => $stjp_pal_20 !== '' ? $stjp_pal_20 : null,
			'stjp_pal_21'              => $stjp_pal_21 !== '' ? $stjp_pal_21 : null,
			'stjp_pal_22'              => $stjp_pal_22 !== '' ? $stjp_pal_22 : null,
			'stjp_pal_23'             	=> $stjp_pal_23 !== '' ? $stjp_pal_23 : null,
			'stjp_pal_24'              => $stjp_pal_24 !== '' ? $stjp_pal_24 : null,
			'stjp_pal_25'              => $stjp_pal_25 !== '' ? $stjp_pal_25 : null,
			'stjp_pal_26'              => $stjp_pal_26 !== '' ? $stjp_pal_26 : null,
			'stjp_pal_27'              => $stjp_pal_27 !== '' ? $stjp_pal_27 : null,
			'stjp_pal_28'              => $stjp_pal_28 !== '' ? $stjp_pal_28 : null,
			'stjp_pal_29'              => $stjp_pal_29 !== '' ? $stjp_pal_29 : null,
			'stjp_pal_30'              => $stjp_pal_30 !== '' ? $stjp_pal_30 : null,

			'stjp_pal_31'              => $stjp_pal_31 !== '' ? $stjp_pal_31 : null,
			'stjp_pal_32'              => $stjp_pal_32 !== '' ? $stjp_pal_32 : null,
			'stjp_pal_33'              => $stjp_pal_33 !== '' ? $stjp_pal_33 : null,
			'stjp_pal_34'             	=> $stjp_pal_34 !== '' ? $stjp_pal_34 : null,
			'stjp_pal_35'              => $stjp_pal_35 !== '' ? $stjp_pal_35 : null,
			'stjp_pal_36'              => $stjp_pal_36 !== '' ? $stjp_pal_36 : null,
			'stjp_pal_37'              => $stjp_pal_37 !== '' ? $stjp_pal_37 : null,
			'stjp_pal_38'           	=> $stjp_pal_38 !== '' ? $stjp_pal_38 : null,
			'stjp_pal_39'              => $stjp_pal_39 !== '' ? $stjp_pal_39 : null,
			'stjp_pal_40'              => $stjp_pal_40 !== '' ? $stjp_pal_40 : null,
			'stjp_pal_41'              => $stjp_pal_41 !== '' ? $stjp_pal_41 : null,
			'stjp_pal_42'              => $stjp_pal_42 !== '' ? $stjp_pal_42 : null,
			'stjp_pal_43'             	=> $stjp_pal_43 !== '' ? $stjp_pal_43 : null,
			'stjp_pal_44'              => $stjp_pal_44 !== '' ? $stjp_pal_44 : null,
			'stjp_pal_45'              => $stjp_pal_45 !== '' ? $stjp_pal_45 : null,
			'stjp_pal_46'              => $stjp_pal_46 !== '' ? $stjp_pal_46 : null,
			'stjp_pal_47'              => $stjp_pal_47 !== '' ? $stjp_pal_47 : null,
			'stjp_pal_48'              => $stjp_pal_48 !== '' ? $stjp_pal_48 : null,
			'stjp_pal_49'              => $stjp_pal_49 !== '' ? $stjp_pal_49 : null,
			'stjp_pal_50'              => $stjp_pal_50 !== '' ? $stjp_pal_50 : null,

			'stjp_pal_51'              => $stjp_pal_51 !== '' ? $stjp_pal_51 : null,
			'stjp_pal_52'              => $stjp_pal_52 !== '' ? $stjp_pal_52 : null,
			'stjp_pal_53'              => $stjp_pal_53 !== '' ? $stjp_pal_53 : null,
			'stjp_pal_54'             	=> $stjp_pal_54 !== '' ? $stjp_pal_54 : null,
			'stjp_pal_55'              => $stjp_pal_55 !== '' ? $stjp_pal_55 : null,
			'stjp_pal_56'              => $stjp_pal_56 !== '' ? $stjp_pal_56 : null,
			'stjp_pal_57'              => $stjp_pal_57 !== '' ? $stjp_pal_57 : null,
			'stjp_pal_58'           	=> $stjp_pal_58 !== '' ? $stjp_pal_58 : null,
			'stjp_pal_59'              => $stjp_pal_59 !== '' ? $stjp_pal_59 : null,
			'stjp_pal_60'              => $stjp_pal_60 !== '' ? $stjp_pal_60 : null,
			'stjp_pal_61'              => $stjp_pal_61 !== '' ? $stjp_pal_61 : null,
			'stjp_pal_62'              => $stjp_pal_62 !== '' ? $stjp_pal_62 : null,
			'stjp_pal_63'             	=> $stjp_pal_63 !== '' ? $stjp_pal_63 : null,
			'stjp_pal_64'              => $stjp_pal_64 !== '' ? $stjp_pal_64 : null,
			'stjp_pal_65'              => $stjp_pal_65 !== '' ? $stjp_pal_65 : null,
			'stjp_pal_66'              => $stjp_pal_66 !== '' ? $stjp_pal_66 : null,
			'stjp_pal_67'              => $stjp_pal_67 !== '' ? $stjp_pal_67 : null,
			'stjp_pal_68'              => $stjp_pal_68 !== '' ? $stjp_pal_68 : null,
			'stjp_pal_69'              => $stjp_pal_69 !== '' ? $stjp_pal_69 : null,
			'stjp_pal_70'              => $stjp_pal_70 !== '' ? $stjp_pal_70 : null,

			'stjp_pal_71'              => $stjp_pal_71 !== '' ? $stjp_pal_71 : null,
			'stjp_pal_72'              => $stjp_pal_72 !== '' ? $stjp_pal_72 : null,
			'stjp_pal_73'              => $stjp_pal_73 !== '' ? $stjp_pal_73 : null,
			'stjp_pal_74'             	=> $stjp_pal_74 !== '' ? $stjp_pal_74 : null,
			'stjp_pal_75'              => $stjp_pal_75 !== '' ? $stjp_pal_75 : null,
			'stjp_pal_76'              => $stjp_pal_76 !== '' ? $stjp_pal_76 : null,
			'stjp_pal_77'              => $stjp_pal_77 !== '' ? $stjp_pal_77 : null,
			'stjp_pal_78'           	=> $stjp_pal_78 !== '' ? $stjp_pal_78 : null,
			'stjp_pal_79'              => $stjp_pal_79 !== '' ? $stjp_pal_79 : null,
			'stjp_pal_80'              => $stjp_pal_80 !== '' ? $stjp_pal_80 : null,
			'stjp_pal_81'              => $stjp_pal_81 !== '' ? $stjp_pal_81 : null,
			'stjp_pal_82'              => $stjp_pal_82 !== '' ? $stjp_pal_82 : null,
			'stjp_pal_83'             	=> $stjp_pal_83 !== '' ? $stjp_pal_83 : null,
			'stjp_pal_84'              => $stjp_pal_84 !== '' ? $stjp_pal_84 : null,
			'stjp_pal_85'              => $stjp_pal_85 !== '' ? $stjp_pal_85 : null,
			'stjp_pal_86'              => $stjp_pal_86 !== '' ? $stjp_pal_86 : null,
			'stjp_pal_87'              => $stjp_pal_87 !== '' ? $stjp_pal_87 : null,
			'stjp_pal_88'              => $stjp_pal_88 !== '' ? $stjp_pal_88 : null,
			'stjp_pal_89'              => $stjp_pal_89 !== '' ? $stjp_pal_89 : null,
			'stjp_pal_90'              => $stjp_pal_90 !== '' ? $stjp_pal_90 : null,

			'stjp_pal_91'              => $stjp_pal_91 !== '' ? $stjp_pal_91 : null,
			'stjp_pal_92'              => $stjp_pal_92 !== '' ? $stjp_pal_92 : null,
			'stjp_pal_93'             	=> $stjp_pal_93 !== '' ? $stjp_pal_93 : null,
			'stjp_pal_94'              => $stjp_pal_94 !== '' ? $stjp_pal_94 : null,
			'stjp_pal_95'              => $stjp_pal_95 !== '' ? $stjp_pal_95 : null,
			'stjp_pal_96'              => $stjp_pal_96 !== '' ? $stjp_pal_96 : null,
			'stjp_pal_97'              => $stjp_pal_97 !== '' ? $stjp_pal_97 : null,
			'stjp_pal_98'              => $stjp_pal_98 !== '' ? $stjp_pal_98 : null,
			'stjp_pal_99'              => $stjp_pal_99 !== '' ? $stjp_pal_99 : null,
			'stjp_pal_100'              => $stjp_pal_100 !== '' ? $stjp_pal_100 : null,

			'stjp_pal_101'              => $stjp_pal_101 !== '' ? $stjp_pal_101 : null,
			'stjp_pal_102'              => $stjp_pal_102 !== '' ? $stjp_pal_102 : null,
			'stjp_pal_103'              => $stjp_pal_103 !== '' ? $stjp_pal_103 : null,
			'stjp_pal_104'              => $stjp_pal_104 !== '' ? $stjp_pal_104 : null,
			'stjp_pal_105'              => $stjp_pal_105 !== '' ? $stjp_pal_105 : null,
			'stjp_pal_106'              => $stjp_pal_106 !== '' ? $stjp_pal_106 : null,
			'stjp_pal_107'              => $stjp_pal_107 !== '' ? $stjp_pal_107 : null,
			'stjp_pal_108'              => $stjp_pal_108 !== '' ? $stjp_pal_108 : null,
			'stjp_pal_109'              => $stjp_pal_109 !== '' ? $stjp_pal_109 : null,
			'stjp_pal_110'              => $stjp_pal_110 !== '' ? $stjp_pal_110 : null,
			'stjp_pal_111'              => $stjp_pal_111 !== '' ? $stjp_pal_111 : null,
			'stjp_pal_112'              => $stjp_pal_112 !== '' ? $stjp_pal_112 : null,
			'stjp_pal_113'              => $stjp_pal_113 !== '' ? $stjp_pal_113 : null,
			'stjp_pal_114'              => $stjp_pal_114 !== '' ? $stjp_pal_114 : null,
			'stjp_pal_115'              => $stjp_pal_115 !== '' ? $stjp_pal_115 : null,
			'stjp_pal_116'              => $stjp_pal_116 !== '' ? $stjp_pal_116 : null,
			'stjp_pal_117'              => $stjp_pal_117 !== '' ? $stjp_pal_117 : null,
			'stjp_pal_118'              => $stjp_pal_118 !== '' ? $stjp_pal_118 : null,
			'stjp_pal_119'              => $stjp_pal_119 !== '' ? $stjp_pal_119 : null,
			'stjp_pal_120'              => $stjp_pal_120 !== '' ? $stjp_pal_120 : null,

			'td_pal_1'               => $td_pal_1 !== '' ? $td_pal_1 : null,
			'td_pal_2'               => $td_pal_2 !== '' ? $td_pal_2 : null,
			'td_pal_3'               => $td_pal_3 !== '' ? $td_pal_3 : null,
			'td_pal_4'               => $td_pal_4 !== '' ? $td_pal_4 : null,
			'td_pal_5'               => $td_pal_5 !== '' ? $td_pal_5 : null,
			'td_pal_6'               => $td_pal_6 !== '' ? $td_pal_6 : null,
			'td_pal_7'               => $td_pal_7 !== '' ? $td_pal_7 : null,
			'td_pal_8'               => $td_pal_8 !== '' ? $td_pal_8 : null,
			'td_pal_9'               => $td_pal_9 !== '' ? $td_pal_9 : null,
			'td_pal_10'              => $td_pal_10 !== '' ? $td_pal_10 : null,
			'td_pal_11'              => $td_pal_11 !== '' ? $td_pal_11 : null,
			'td_pal_12'              => $td_pal_12 !== '' ? $td_pal_12 : null,
			'td_pal_13'              => $td_pal_13 !== '' ? $td_pal_13 : null,
			'td_pal_14'              => $td_pal_14 !== '' ? $td_pal_14 : null,
			'td_pal_15'              => $td_pal_15 !== '' ? $td_pal_15 : null,
			'td_pal_16'              => $td_pal_16 !== '' ? $td_pal_16 : null,
			'td_pal_17'              => $td_pal_17 !== '' ? $td_pal_17 : null,

			'so2_pal_1'               => $so2_pal_1 !== '' ? $so2_pal_1 : null,
			'so2_pal_2'               => $so2_pal_2 !== '' ? $so2_pal_2 : null,
			'so2_pal_3'               => $so2_pal_3 !== '' ? $so2_pal_3 : null,
			'so2_pal_4'               => $so2_pal_4 !== '' ? $so2_pal_4 : null,
			'so2_pal_5'               => $so2_pal_5 !== '' ? $so2_pal_5 : null,
			'so2_pal_6'               => $so2_pal_6 !== '' ? $so2_pal_6 : null,
			'so2_pal_7'               => $so2_pal_7 !== '' ? $so2_pal_7 : null,
			'so2_pal_8'               => $so2_pal_8 !== '' ? $so2_pal_8 : null,
			'so2_pal_9'               => $so2_pal_9 !== '' ? $so2_pal_9 : null,
			'so2_pal_10'              => $so2_pal_10 !== '' ? $so2_pal_10 : null,
			'so2_pal_11'              => $so2_pal_11 !== '' ? $so2_pal_11 : null,
			'so2_pal_12'              => $so2_pal_12 !== '' ? $so2_pal_12 : null,
			'so2_pal_13'              => $so2_pal_13 !== '' ? $so2_pal_13 : null,
			'so2_pal_14'			  => $so2_pal_14 !== '' ? $so2_pal_14 : null,
			'so2_pal_15'              => $so2_pal_15 !== '' ? $so2_pal_15 : null,
			'so2_pal_16'              => $so2_pal_16 !== '' ? $so2_pal_16 : null,
			'so2_pal_17'              => $so2_pal_17 !== '' ? $so2_pal_17 : null,

			'kd_pal_1'               => $kd_pal_1 !== '' ? $kd_pal_1 : null,
			'kd_pal_2'               => $kd_pal_2 !== '' ? $kd_pal_2 : null,
			'kd_pal_3'               => $kd_pal_3 !== '' ? $kd_pal_3 : null,
			'kd_pal_4'               => $kd_pal_4 !== '' ? $kd_pal_4 : null,
			'kd_pal_5'               => $kd_pal_5 !== '' ? $kd_pal_5 : null,
			'kd_pal_6'               => $kd_pal_6 !== '' ? $kd_pal_6 : null,
			'kd_pal_7'               => $kd_pal_7 !== '' ? $kd_pal_7 : null,
			'kd_pal_8'               => $kd_pal_8 !== '' ? $kd_pal_8 : null,
			'kd_pal_9'               => $kd_pal_9 !== '' ? $kd_pal_9 : null,
			'kd_pal_10'              => $kd_pal_10 !== '' ? $kd_pal_10 : null,
			'kd_pal_11'              => $kd_pal_11 !== '' ? $kd_pal_11 : null,
			'kd_pal_12'              => $kd_pal_12 !== '' ? $kd_pal_12 : null,
			'kd_pal_13'              => $kd_pal_13 !== '' ? $kd_pal_13 : null,
			'kd_pal_14'              => $kd_pal_14 !== '' ? $kd_pal_14 : null,
			'kd_pal_15'              => $kd_pal_15 !== '' ? $kd_pal_15 : null,
			'kd_pal_16'              => $kd_pal_16 !== '' ? $kd_pal_16 : null,
			'kd_pal_17'              => $kd_pal_17 !== '' ? $kd_pal_17 : null,	
			'updated_at'                => date('Y-m-d H:i:s', time()),			
		);
		// var_dump($data);die;
		$status = $this->m_order_operasi->editPemantauanAnestesiLokal($data);
		$this->response(array('status' => $status), REST_Controller::HTTP_OK);
	}
	


	// CKP BARU
	function get_data_entri_ckp_get(){
		if (!$this->get('id')) :
			$this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
		endif;
        // var_dump($this->get('id'));die;
		$data = $this->m_pendaftaran->getPendaftaranDetail($this->get('id', true), $this->get('id_layanan', true));
		$data['catatan_keperawatan_perioperatif']  = $this->m_order_operasi->getCatatanKeperawatanPerioperatif($data['layanan']->id_pendaftaran);
		if ($data) :
			$this->response($data, REST_Controller::HTTP_OK); // (200)
		endif;
	}

	// CKP BARU
	function get_list_data_catatan_perioperatif_get(){
		if (!$this->get('id_pendaftaran', true)) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
        endif;
        // var_dump($this->get('id_pendaftaran', true));die;    
        $data ['data']        	= $this->m_order_operasi->getListDataCatatanPerioperatifR($this->get('id_pendaftaran', true));
        $data['page']    		= (int) $this->get('page');
        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK); // (200)
        endif;
    }

	// CKP BARU
	function get_edit_data_catatan_perioperatif_get(){
		if (!$this->get('id_pendaftaran', true)) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
        endif;
        // var_dump($this->get('id_pendaftaran'));die;
		$data   ['catatan_keperawatan_perioperatif']  = $this->m_order_operasi->getEditDataCatatanPerioperatif($this->get('id_pendaftaran', true));
		if ($data) :
			$this->response($data, REST_Controller::HTTP_OK); // (200)
		endif;
    }

	// CKP BARU
	function hapus_catatan_perioperatif_delete($id){
        $status = $this->m_order_operasi->deleteCatatanPerioperatif($id);
        if ($status) :
            $response = array('status' => $status, 'message' => 'Berhasil Menghapus Data!');
        else :
            $response = array('status' => $status, 'message' => 'Gagal Menghapus Data!');
        endif;
        $this->response($response, REST_Controller::HTTP_OK);
    }  

	// CKP BARU
	function simpan_entri_ckp_post(){   
		$layanan = array('id' => safe_post('id_layanan_pendaftaran'));
		$this->db->trans_begin();
		$id_data_catatan_perioperatift = $this->post('id_data_catatan_perioperatift');
		// var_dump($id_data_catatan_perioperatift);die;
		$id_layanan_pendaftaran = safe_post('id_layanan_pendaftaran');
		$id_pendaftaran = safe_post('id_pendaftaran');
		$data_catatan = array(
			'id_layanan_pendaftaran'    => $id_layanan_pendaftaran,
			'id_pendaftaran'            => $id_pendaftaran,
			'created_at'                => date('Y-m-d H:i:s', time()),
			'updated_at'                => date('Y-m-d H:i:s', time()),
		);
		$insert_id = $this->m_order_operasi->updateDataCatatanPerioperatif($data_catatan, $id_pendaftaran, $id_data_catatan_perioperatift);
		// var_dump($insert_id);die; 

		$id_ckp = safe_post('id_ckp');
		$id_users = safe_post('id_user');
		// var_dump($id_ckp);die;
		$catatanKeperawatanPerioperatif = array(
			'id_layanan_pendaftaran' => $layanan['id'],
			'id_pendaftaran'       	 => safe_post('id_pendaftaran'),
			'id_users'       	 	 => $this->session->userdata('id_translucent'),
            'id_data_catatan_perioperatift'  => $insert_id, 

			'suhu_ckp' => json_encode([
				'suhu_ckp_1' => safe_post('suhu_ckp_1') !== '' ? safe_post('suhu_ckp_1') : null,
				'suhu_ckp_2' => safe_post('suhu_ckp_2') !== '' ? safe_post('suhu_ckp_2') : null,
				'suhu_ckp_3' => safe_post('suhu_ckp_3') !== '' ? safe_post('suhu_ckp_3') : null,
				'suhu_ckp_4' => safe_post('suhu_ckp_4') !== '' ? safe_post('suhu_ckp_4') : null,
				'suhu_ckp_5' => safe_post('suhu_ckp_5') !== '' ? safe_post('suhu_ckp_5') : null,
				'suhu_ckp_6' => safe_post('suhu_ckp_6') !== '' ? safe_post('suhu_ckp_6') : null,
				'suhu_ckp_7' => safe_post('suhu_ckp_7') !== '' ? safe_post('suhu_ckp_7') : null,
			]),

			'status_mental_ckp' => json_encode([
				'status_mental_ckp_1' => safe_post('status_mental_ckp_1') !== '' ? safe_post('status_mental_ckp_1') : null,
				'status_mental_ckp_2' => safe_post('status_mental_ckp_2') !== '' ? safe_post('status_mental_ckp_2') : null,
				'status_mental_ckp_3' => safe_post('status_mental_ckp_3') !== '' ? safe_post('status_mental_ckp_3') : null,
				'status_mental_ckp_4' => safe_post('status_mental_ckp_4') !== '' ? safe_post('status_mental_ckp_4') : null,
				'status_mental_ckp_5' => safe_post('status_mental_ckp_5') !== '' ? safe_post('status_mental_ckp_5') : null,
			]),

			'riwayat_penyakit_ckp' => json_encode([
				'riwayat_penyakit_ckp_1' => safe_post('riwayat_penyakit_ckp_1') !== '' ? safe_post('riwayat_penyakit_ckp_1') : null,
				'riwayat_penyakit_ckp_1' => safe_post('riwayat_penyakit_ckp_1') !== '' ? safe_post('riwayat_penyakit_ckp_1') : null,
				'riwayat_penyakit_ckp_3' => safe_post('riwayat_penyakit_ckp_3') !== '' ? safe_post('riwayat_penyakit_ckp_3') : null,
				'riwayat_penyakit_ckp_4' => safe_post('riwayat_penyakit_ckp_4') !== '' ? safe_post('riwayat_penyakit_ckp_4') : null,
				'riwayat_penyakit_ckp_5' => safe_post('riwayat_penyakit_ckp_5') !== '' ? safe_post('riwayat_penyakit_ckp_5') : null,
				'riwayat_penyakit_ckp_6' => safe_post('riwayat_penyakit_ckp_6') !== '' ? safe_post('riwayat_penyakit_ckp_6') : null,
				'riwayat_penyakit_ckp_7' => safe_post('riwayat_penyakit_ckp_7') !== '' ? safe_post('riwayat_penyakit_ckp_7') : null,
				'riwayat_penyakit_ckp_8' => safe_post('riwayat_penyakit_ckp_8') !== '' ? safe_post('riwayat_penyakit_ckp_8') : null,
				'riwayat_penyakit_ckp_9' => safe_post('riwayat_penyakit_ckp_9') !== '' ? safe_post('riwayat_penyakit_ckp_9') : null,
			]),

			'pengobatan_saat_ini_ckp' => safe_post('pengobatan_saat_ini_ckp') !== '' ? safe_post('pengobatan_saat_ini_ckp') : NULL,
			'operasi_sebelumnya_ckp' => safe_post('operasi_sebelumnya_ckp') !== '' ? safe_post('operasi_sebelumnya_ckp') : NULL,

			'alergi_ckp' => json_encode([
				'alergi_ckp' 	=> safe_post('alergi_ckp') !== '' ? safe_post('alergi_ckp') : null,
				'alergi_ckp' 	=> safe_post('alergi_ckp') !== '' ? safe_post('alergi_ckp') : null,
				'alergi_ckp_3'	=> safe_post('alergi_ckp_3') !== '' ? safe_post('alergi_ckp_3') : null,
				'alergi_ckp_4' 	=> safe_post('alergi_ckp_4') !== '' ? safe_post('alergi_ckp_4') : null,
			]),

			'gol_darah_ckp' => json_encode([
				'gol_darah_ckp_1' => safe_post('gol_darah_ckp_1') !== '' ? safe_post('gol_darah_ckp_1') : null,
				'gol_darah_ckp_2' => safe_post('gol_darah_ckp_2') !== '' ? safe_post('gol_darah_ckp_2') : null,
			]),

			'standar_kewaspadaan_ckp' => json_encode([
				'standar_kewaspadaan_ckp_1' => safe_post('standar_kewaspadaan_ckp_1') !== '' ? safe_post('standar_kewaspadaan_ckp_1') : null,
				'standar_kewaspadaan_ckp_2' => safe_post('standar_kewaspadaan_ckp_2') !== '' ? safe_post('standar_kewaspadaan_ckp_2') : null,
			]),

			'rencana_tindakan_operasi_ckp' 			=> safe_post('rencana_tindakan_operasi_ckp') !== '' ? safe_post('rencana_tindakan_operasi_ckp') : NULL,
			'dokter_operator_ckp' 					=> safe_post('dokter_operator_ckp') !== '' ? safe_post('dokter_operator_ckp') : NULL,
			'rencana_perawatan_pasca_operasi_ckp' 	=> safe_post('rencana_perawatan_pasca_operasi_ckp') !== '' ? safe_post('rencana_perawatan_pasca_operasi_ckp') : NULL,

			'verifikasi_pasien_ckp' => json_encode([
				'verifikasi_pasien_1' => safe_post('verifikasi_pasien_1') !== '' ? safe_post('verifikasi_pasien_1') : null,
				'verifikasi_pasien_2' => safe_post('verifikasi_pasien_2') !== '' ? safe_post('verifikasi_pasien_2') : null,
				'verifikasi_pasien_3' => safe_post('verifikasi_pasien_3') !== '' ? safe_post('verifikasi_pasien_3') : null,
				'verifikasi_pasien_4' => safe_post('verifikasi_pasien_4') !== '' ? safe_post('verifikasi_pasien_4') : null,
				'verifikasi_pasien_5' => safe_post('verifikasi_pasien_5') !== '' ? safe_post('verifikasi_pasien_5') : null,
				'verifikasi_pasien_6' => safe_post('verifikasi_pasien_6') !== '' ? safe_post('verifikasi_pasien_6') : null,
				'verifikasi_pasien_7' => safe_post('verifikasi_pasien_7') !== '' ? safe_post('verifikasi_pasien_7') : null,
				'verifikasi_pasien_8' => safe_post('verifikasi_pasien_8') !== '' ? safe_post('verifikasi_pasien_8') : null,
				'verifikasi_pasien_9' => safe_post('verifikasi_pasien_9') !== '' ? safe_post('verifikasi_pasien_9') : null,
				'verifikasi_pasien_10' => safe_post('verifikasi_pasien_10') !== '' ? safe_post('verifikasi_pasien_10') : null,
				'verifikasi_pasien_11' => safe_post('verifikasi_pasien_11') !== '' ? safe_post('verifikasi_pasien_11') : null,
				'verifikasi_pasien_12' => safe_post('verifikasi_pasien_12') !== '' ? safe_post('verifikasi_pasien_12') : null,
				'verifikasi_pasien_13' => safe_post('verifikasi_pasien_13') !== '' ? safe_post('verifikasi_pasien_13') : null,
				'verifikasi_pasien_14' => safe_post('verifikasi_pasien_14') !== '' ? safe_post('verifikasi_pasien_14') : null,
				'verifikasi_pasien_15' => safe_post('verifikasi_pasien_15') !== '' ? safe_post('verifikasi_pasien_15') : null,
				'verifikasi_pasien_16' => safe_post('verifikasi_pasien_16') !== '' ? safe_post('verifikasi_pasien_16') : null,
				'verifikasi_pasien_17' => safe_post('verifikasi_pasien_17') !== '' ? safe_post('verifikasi_pasien_17') : null,
				'verifikasi_pasien_18' => safe_post('verifikasi_pasien_18') !== '' ? safe_post('verifikasi_pasien_18') : null,
				'verifikasi_pasien_19' => safe_post('verifikasi_pasien_19') !== '' ? safe_post('verifikasi_pasien_19') : null,
				'verifikasi_pasien_20' => safe_post('verifikasi_pasien_20') !== '' ? safe_post('verifikasi_pasien_20') : null,
				'verifikasi_pasien_21' => safe_post('verifikasi_pasien_21') !== '' ? safe_post('verifikasi_pasien_21') : null,
				'verifikasi_pasien_22' => safe_post('verifikasi_pasien_22') !== '' ? safe_post('verifikasi_pasien_22') : null,
				'verifikasi_pasien_23' => safe_post('verifikasi_pasien_23') !== '' ? safe_post('verifikasi_pasien_23') : null,
				'verifikasi_pasien_24' => safe_post('verifikasi_pasien_24') !== '' ? safe_post('verifikasi_pasien_24') : null,
				'verifikasi_pasien_25' => safe_post('verifikasi_pasien_25') !== '' ? safe_post('verifikasi_pasien_25') : null,
				'verifikasi_pasien_26' => safe_post('verifikasi_pasien_26') !== '' ? safe_post('verifikasi_pasien_26') : null,
				'verifikasi_pasien_27' => safe_post('verifikasi_pasien_27') !== '' ? safe_post('verifikasi_pasien_27') : null,
				'verifikasi_pasien_28' => safe_post('verifikasi_pasien_28') !== '' ? safe_post('verifikasi_pasien_28') : null,
				'verifikasi_pasien_29' => safe_post('verifikasi_pasien_29') !== '' ? safe_post('verifikasi_pasien_29') : null,
				'verifikasi_pasien_30' => safe_post('verifikasi_pasien_30') !== '' ? safe_post('verifikasi_pasien_30') : null,
				'verifikasi_pasien_31' => safe_post('verifikasi_pasien_31') !== '' ? safe_post('verifikasi_pasien_31') : null,
				'verifikasi_pasien_32' => safe_post('verifikasi_pasien_32') !== '' ? safe_post('verifikasi_pasien_32') : null,
				'verifikasi_pasien_33' => safe_post('verifikasi_pasien_33') !== '' ? safe_post('verifikasi_pasien_33') : null,
				'verifikasi_pasien_34' => safe_post('verifikasi_pasien_34') !== '' ? safe_post('verifikasi_pasien_34') : null,
				'verifikasi_pasien_35' => safe_post('verifikasi_pasien_35') !== '' ? safe_post('verifikasi_pasien_35') : null,
				'verifikasi_pasien_36' => safe_post('verifikasi_pasien_36') !== '' ? safe_post('verifikasi_pasien_36') : null,
			]),

			'persiapan_fisik_pasien_ckp' => json_encode([
				'persiapan_fisik_pasien_1' => safe_post('persiapan_fisik_pasien_1') !== '' ? safe_post('persiapan_fisik_pasien_1') : null,
				'persiapan_fisik_pasien_2' => safe_post('persiapan_fisik_pasien_2') !== '' ? safe_post('persiapan_fisik_pasien_2') : null,
				'persiapan_fisik_pasien_3' => safe_post('persiapan_fisik_pasien_3') !== '' ? safe_post('persiapan_fisik_pasien_3') : null,
				'persiapan_fisik_pasien_4' => safe_post('persiapan_fisik_pasien_4') !== '' ? safe_post('persiapan_fisik_pasien_4') : null,
				'persiapan_fisik_pasien_5' => safe_post('persiapan_fisik_pasien_5') !== '' ? safe_post('persiapan_fisik_pasien_5') : null,
				'persiapan_fisik_pasien_6' => safe_post('persiapan_fisik_pasien_6') !== '' ? safe_post('persiapan_fisik_pasien_6') : null,
				'persiapan_fisik_pasien_7' => safe_post('persiapan_fisik_pasien_7') !== '' ? safe_post('persiapan_fisik_pasien_7') : null,
				'persiapan_fisik_pasien_8' => safe_post('persiapan_fisik_pasien_8') !== '' ? safe_post('persiapan_fisik_pasien_8') : null,
				'persiapan_fisik_pasien_9' => safe_post('persiapan_fisik_pasien_9') !== '' ? safe_post('persiapan_fisik_pasien_9') : null,
				'persiapan_fisik_pasien_10' => safe_post('persiapan_fisik_pasien_10') !== '' ? safe_post('persiapan_fisik_pasien_10') : null,
				'persiapan_fisik_pasien_11' => safe_post('persiapan_fisik_pasien_11') !== '' ? safe_post('persiapan_fisik_pasien_11') : null,
				'persiapan_fisik_pasien_12' => safe_post('persiapan_fisik_pasien_12') !== '' ? safe_post('persiapan_fisik_pasien_12') : null,
				'persiapan_fisik_pasien_13' => safe_post('persiapan_fisik_pasien_13') !== '' ? safe_post('persiapan_fisik_pasien_13') : null,
				'persiapan_fisik_pasien_14' => safe_post('persiapan_fisik_pasien_14') !== '' ? safe_post('persiapan_fisik_pasien_14') : null,
				'persiapan_fisik_pasien_15' => safe_post('persiapan_fisik_pasien_15') !== '' ? safe_post('persiapan_fisik_pasien_15') : null,
				'persiapan_fisik_pasien_16' => safe_post('persiapan_fisik_pasien_16') !== '' ? safe_post('persiapan_fisik_pasien_16') : null,
				'persiapan_fisik_pasien_17' => safe_post('persiapan_fisik_pasien_17') !== '' ? safe_post('persiapan_fisik_pasien_17') : null,
				'persiapan_fisik_pasien_18' => safe_post('persiapan_fisik_pasien_18') !== '' ? safe_post('persiapan_fisik_pasien_18') : null,
				'persiapan_fisik_pasien_19' => safe_post('persiapan_fisik_pasien_19') !== '' ? safe_post('persiapan_fisik_pasien_19') : null,
				'persiapan_fisik_pasien_20' => safe_post('persiapan_fisik_pasien_20') !== '' ? safe_post('persiapan_fisik_pasien_20') : null,
				'persiapan_fisik_pasien_21' => safe_post('persiapan_fisik_pasien_21') !== '' ? safe_post('persiapan_fisik_pasien_21') : null,
				'persiapan_fisik_pasien_22' => safe_post('persiapan_fisik_pasien_22') !== '' ? safe_post('persiapan_fisik_pasien_22') : null,
				'persiapan_fisik_pasien_23' => safe_post('persiapan_fisik_pasien_23') !== '' ? safe_post('persiapan_fisik_pasien_23') : null,
				'persiapan_fisik_pasien_24' => safe_post('persiapan_fisik_pasien_24') !== '' ? safe_post('persiapan_fisik_pasien_24') : null,
				'persiapan_fisik_pasien_25' => safe_post('persiapan_fisik_pasien_25') !== '' ? safe_post('persiapan_fisik_pasien_25') : null,
				'persiapan_fisik_pasien_26' => safe_post('persiapan_fisik_pasien_26') !== '' ? safe_post('persiapan_fisik_pasien_26') : null,
				'persiapan_fisik_pasien_27' => safe_post('persiapan_fisik_pasien_27') !== '' ? safe_post('persiapan_fisik_pasien_27') : null,
				'persiapan_fisik_pasien_28' => safe_post('persiapan_fisik_pasien_28') !== '' ? safe_post('persiapan_fisik_pasien_28') : null,
				'persiapan_fisik_pasien_29' => safe_post('persiapan_fisik_pasien_29') !== '' ? safe_post('persiapan_fisik_pasien_29') : null,
				'persiapan_fisik_pasien_30' => safe_post('persiapan_fisik_pasien_30') !== '' ? safe_post('persiapan_fisik_pasien_30') : null,
				'persiapan_fisik_pasien_31' => safe_post('persiapan_fisik_pasien_31') !== '' ? safe_post('persiapan_fisik_pasien_31') : null,
				'persiapan_fisik_pasien_32' => safe_post('persiapan_fisik_pasien_32') !== '' ? safe_post('persiapan_fisik_pasien_32') : null,
				'persiapan_fisik_pasien_33' => safe_post('persiapan_fisik_pasien_33') !== '' ? safe_post('persiapan_fisik_pasien_33') : null,
				'persiapan_fisik_pasien_34' => safe_post('persiapan_fisik_pasien_34') !== '' ? safe_post('persiapan_fisik_pasien_34') : null,
				'persiapan_fisik_pasien_35' => safe_post('persiapan_fisik_pasien_35') !== '' ? safe_post('persiapan_fisik_pasien_35') : null,
				'persiapan_fisik_pasien_36' => safe_post('persiapan_fisik_pasien_36') !== '' ? safe_post('persiapan_fisik_pasien_36') : null,
				'persiapan_fisik_pasien_37' => safe_post('persiapan_fisik_pasien_37') !== '' ? safe_post('persiapan_fisik_pasien_37') : null,
				'persiapan_fisik_pasien_38' => safe_post('persiapan_fisik_pasien_38') !== '' ? safe_post('persiapan_fisik_pasien_38') : null,
				'persiapan_fisik_pasien_39' => safe_post('persiapan_fisik_pasien_39') !== '' ? safe_post('persiapan_fisik_pasien_39') : null,
				'persiapan_fisik_pasien_40' => safe_post('persiapan_fisik_pasien_40') !== '' ? safe_post('persiapan_fisik_pasien_40') : null,
				'persiapan_fisik_pasien_41' => safe_post('persiapan_fisik_pasien_41') !== '' ? safe_post('persiapan_fisik_pasien_41') : null,
				'persiapan_fisik_pasien_42' => safe_post('persiapan_fisik_pasien_42') !== '' ? safe_post('persiapan_fisik_pasien_42') : null,
				'persiapan_fisik_pasien_43' => safe_post('persiapan_fisik_pasien_43') !== '' ? safe_post('persiapan_fisik_pasien_43') : null,
				'persiapan_fisik_pasien_44' => safe_post('persiapan_fisik_pasien_44') !== '' ? safe_post('persiapan_fisik_pasien_44') : null,
				'persiapan_fisik_pasien_45' => safe_post('persiapan_fisik_pasien_45') !== '' ? safe_post('persiapan_fisik_pasien_45') : null,
				'persiapan_fisik_pasien_46' => safe_post('persiapan_fisik_pasien_46') !== '' ? safe_post('persiapan_fisik_pasien_46') : null,
				'persiapan_fisik_pasien_47' => safe_post('persiapan_fisik_pasien_47') !== '' ? safe_post('persiapan_fisik_pasien_47') : null,
				'persiapan_fisik_pasien_48' => safe_post('persiapan_fisik_pasien_48') !== '' ? safe_post('persiapan_fisik_pasien_48') : null,
				'persiapan_fisik_pasien_49' => safe_post('persiapan_fisik_pasien_49') !== '' ? safe_post('persiapan_fisik_pasien_49') : null,
			]),

			'perawat_ruangan_pfp' 		=> safe_post('perawat_ruangan_pfp') !== '' ? safe_post('perawat_ruangan_pfp') : NULL,
			'jam_pfp' 					=> safe_post('jam_pfp') !== '' ? safe_post('jam_pfp') : NULL,
			'perawat_penerima_ot_ppo' 	=> safe_post('perawat_penerima_ot_ppo') !== '' ? safe_post('perawat_penerima_ot_ppo') : NULL,
			'jam_ppo' 					=> safe_post('jam_ppo') !== '' ? safe_post('jam_ppo') : NULL,


			'site_marketing' => json_encode([
				'site_marketing' => safe_post('site_marketing') !== '' ? safe_post('site_marketing') : null,
				'site_marketing' => safe_post('site_marketing') !== '' ? safe_post('site_marketing') : null,
			]),

			'perawat_ot_po' 	=> safe_post('perawat_ot_po') !== '' ? safe_post('perawat_ot_po') : NULL,
			'jam_tanggal_po'	=> (safe_post('jam_tanggal_po') !== '' ? datetime2mysql(safe_post('jam_tanggal_po')) : NULL),

			'asuhan_keperawatan_ak_1' => json_encode([
				'asuhan_keperawatan_ak_1' => safe_post('asuhan_keperawatan_ak_1') !== '' ? safe_post('asuhan_keperawatan_ak_1') : null,
				'asuhan_keperawatan_ak_2' => safe_post('asuhan_keperawatan_ak_2') !== '' ? safe_post('asuhan_keperawatan_ak_2') : null,
				'asuhan_keperawatan_ak_3' => safe_post('asuhan_keperawatan_ak_3') !== '' ? safe_post('asuhan_keperawatan_ak_3') : null,
				'asuhan_keperawatan_ak_4' => safe_post('asuhan_keperawatan_ak_4') !== '' ? safe_post('asuhan_keperawatan_ak_4') : null,
				'asuhan_keperawatan_ak_5' => safe_post('asuhan_keperawatan_ak_5') !== '' ? safe_post('asuhan_keperawatan_ak_5') : null,
				'asuhan_keperawatan_ak_6' => safe_post('asuhan_keperawatan_ak_6') !== '' ? safe_post('asuhan_keperawatan_ak_6') : null,
				'asuhan_keperawatan_ak_7' => safe_post('asuhan_keperawatan_ak_7') !== '' ? safe_post('asuhan_keperawatan_ak_7') : null,
				'asuhan_keperawatan_ak_8' => safe_post('asuhan_keperawatan_ak_8') !== '' ? safe_post('asuhan_keperawatan_ak_8') : null,
				'asuhan_keperawatan_ak_9' => safe_post('asuhan_keperawatan_ak_9') !== '' ? safe_post('asuhan_keperawatan_ak_9') : null,
				'asuhan_keperawatan_ak_10' => safe_post('asuhan_keperawatan_ak_10') !== '' ? safe_post('asuhan_keperawatan_ak_10') : null,
				'asuhan_keperawatan_ak_11' => safe_post('asuhan_keperawatan_ak_11') !== '' ? safe_post('asuhan_keperawatan_ak_11') : null,
				'asuhan_keperawatan_ak_12' => safe_post('asuhan_keperawatan_ak_12') !== '' ? safe_post('asuhan_keperawatan_ak_12') : null,
				'asuhan_keperawatan_ak_13' => safe_post('asuhan_keperawatan_ak_13') !== '' ? safe_post('asuhan_keperawatan_ak_13') : null,
				'asuhan_keperawatan_ak_14' => safe_post('asuhan_keperawatan_ak_14') !== '' ? safe_post('asuhan_keperawatan_ak_14') : null,
				'asuhan_keperawatan_ak_15' => safe_post('asuhan_keperawatan_ak_15') !== '' ? safe_post('asuhan_keperawatan_ak_15') : null,
				'asuhan_keperawatan_ak_16' => safe_post('asuhan_keperawatan_ak_16') !== '' ? safe_post('asuhan_keperawatan_ak_16') : null,
				'asuhan_keperawatan_ak_17' => safe_post('asuhan_keperawatan_ak_17') !== '' ? safe_post('asuhan_keperawatan_ak_17') : null,
				'asuhan_keperawatan_ak_18' => safe_post('asuhan_keperawatan_ak_18') !== '' ? safe_post('asuhan_keperawatan_ak_18') : null,
				'asuhan_keperawatan_ak_19' => safe_post('asuhan_keperawatan_ak_19') !== '' ? safe_post('asuhan_keperawatan_ak_19') : null,
				'asuhan_keperawatan_ak_20' => safe_post('asuhan_keperawatan_ak_20') !== '' ? safe_post('asuhan_keperawatan_ak_20') : null,
				'asuhan_keperawatan_ak_21' => safe_post('asuhan_keperawatan_ak_21') !== '' ? safe_post('asuhan_keperawatan_ak_21') : null,
				'asuhan_keperawatan_ak_22' => safe_post('asuhan_keperawatan_ak_22') !== '' ? safe_post('asuhan_keperawatan_ak_22') : null,
				'asuhan_keperawatan_ak_23' => safe_post('asuhan_keperawatan_ak_23') !== '' ? safe_post('asuhan_keperawatan_ak_23') : null,
				'asuhan_keperawatan_ak_24' => safe_post('asuhan_keperawatan_ak_24') !== '' ? safe_post('asuhan_keperawatan_ak_24') : null,
				'asuhan_keperawatan_ak_25' => safe_post('asuhan_keperawatan_ak_25') !== '' ? safe_post('asuhan_keperawatan_ak_25') : null,
				'asuhan_keperawatan_ak_26' => safe_post('asuhan_keperawatan_ak_26') !== '' ? safe_post('asuhan_keperawatan_ak_26') : null,
				'asuhan_keperawatan_ak_27' => safe_post('asuhan_keperawatan_ak_27') !== '' ? safe_post('asuhan_keperawatan_ak_27') : null,
				'asuhan_keperawatan_ak_28' => safe_post('asuhan_keperawatan_ak_28') !== '' ? safe_post('asuhan_keperawatan_ak_28') : null,
				'asuhan_keperawatan_ak_29' => safe_post('asuhan_keperawatan_ak_29') !== '' ? safe_post('asuhan_keperawatan_ak_29') : null,
				'asuhan_keperawatan_ak_30' => safe_post('asuhan_keperawatan_ak_30') !== '' ? safe_post('asuhan_keperawatan_ak_30') : null,
				'asuhan_keperawatan_ak_31' => safe_post('asuhan_keperawatan_ak_31') !== '' ? safe_post('asuhan_keperawatan_ak_31') : null,
				'asuhan_keperawatan_ak_32' => safe_post('asuhan_keperawatan_ak_32') !== '' ? safe_post('asuhan_keperawatan_ak_32') : null,
				'asuhan_keperawatan_ak_33' => safe_post('asuhan_keperawatan_ak_33') !== '' ? safe_post('asuhan_keperawatan_ak_33') : null,
				'asuhan_keperawatan_ak_58' => safe_post('asuhan_keperawatan_ak_58') !== '' ? safe_post('asuhan_keperawatan_ak_58') : null,
				'asuhan_keperawatan_ak_34' => safe_post('asuhan_keperawatan_ak_34') !== '' ? safe_post('asuhan_keperawatan_ak_34') : null,
				'asuhan_keperawatan_ak_35' => safe_post('asuhan_keperawatan_ak_35') !== '' ? safe_post('asuhan_keperawatan_ak_35') : null,
				'asuhan_keperawatan_ak_36' => safe_post('asuhan_keperawatan_ak_36') !== '' ? safe_post('asuhan_keperawatan_ak_36') : null,
				'asuhan_keperawatan_ak_37' => safe_post('asuhan_keperawatan_ak_37') !== '' ? safe_post('asuhan_keperawatan_ak_37') : null,
				'asuhan_keperawatan_ak_38' => safe_post('asuhan_keperawatan_ak_38') !== '' ? safe_post('asuhan_keperawatan_ak_38') : null,
				'asuhan_keperawatan_ak_39' => safe_post('asuhan_keperawatan_ak_39') !== '' ? safe_post('asuhan_keperawatan_ak_39') : null,
				'asuhan_keperawatan_ak_40' => safe_post('asuhan_keperawatan_ak_40') !== '' ? safe_post('asuhan_keperawatan_ak_40') : null,
				'asuhan_keperawatan_ak_41' => safe_post('asuhan_keperawatan_ak_41') !== '' ? safe_post('asuhan_keperawatan_ak_41') : null,
				'asuhan_keperawatan_ak_42' => safe_post('asuhan_keperawatan_ak_42') !== '' ? safe_post('asuhan_keperawatan_ak_42') : null,
				'asuhan_keperawatan_ak_43' => safe_post('asuhan_keperawatan_ak_43') !== '' ? safe_post('asuhan_keperawatan_ak_43') : null,
				'asuhan_keperawatan_ak_44' => safe_post('asuhan_keperawatan_ak_44') !== '' ? safe_post('asuhan_keperawatan_ak_44') : null,
				'asuhan_keperawatan_ak_45' => safe_post('asuhan_keperawatan_ak_45') !== '' ? safe_post('asuhan_keperawatan_ak_45') : null,
				'asuhan_keperawatan_ak_46' => safe_post('asuhan_keperawatan_ak_46') !== '' ? safe_post('asuhan_keperawatan_ak_46') : null,
				'asuhan_keperawatan_ak_47' => safe_post('asuhan_keperawatan_ak_47') !== '' ? safe_post('asuhan_keperawatan_ak_47') : null,
				'asuhan_keperawatan_ak_48' => safe_post('asuhan_keperawatan_ak_48') !== '' ? safe_post('asuhan_keperawatan_ak_48') : null,
				'asuhan_keperawatan_ak_49' => safe_post('asuhan_keperawatan_ak_49') !== '' ? safe_post('asuhan_keperawatan_ak_49') : null,
				'asuhan_keperawatan_ak_50' => safe_post('asuhan_keperawatan_ak_50') !== '' ? safe_post('asuhan_keperawatan_ak_50') : null,
				'asuhan_keperawatan_ak_51' => safe_post('asuhan_keperawatan_ak_51') !== '' ? safe_post('asuhan_keperawatan_ak_51') : null,
				'asuhan_keperawatan_ak_52' => safe_post('asuhan_keperawatan_ak_52') !== '' ? safe_post('asuhan_keperawatan_ak_52') : null,
				'asuhan_keperawatan_ak_53' => safe_post('asuhan_keperawatan_ak_53') !== '' ? safe_post('asuhan_keperawatan_ak_53') : null,
				'asuhan_keperawatan_ak_54' => safe_post('asuhan_keperawatan_ak_54') !== '' ? safe_post('asuhan_keperawatan_ak_54') : null,
				'asuhan_keperawatan_ak_55' => safe_post('asuhan_keperawatan_ak_55') !== '' ? safe_post('asuhan_keperawatan_ak_55') : null,
				'asuhan_keperawatan_ak_56' => safe_post('asuhan_keperawatan_ak_56') !== '' ? safe_post('asuhan_keperawatan_ak_56') : null,
				'asuhan_keperawatan_ak_57' => safe_post('asuhan_keperawatan_ak_57') !== '' ? safe_post('asuhan_keperawatan_ak_57') : null,
			]),

			'perawwat_ruangan_pr' 		=> safe_post('perawwat_ruangan_pr') !== '' ? safe_post('perawwat_ruangan_pr') : NULL,
			'perawwat_anastesi_pa' 		=> safe_post('perawwat_anastesi_pa') !== '' ? safe_post('perawwat_anastesi_pa') : NULL,
			'perawwat_kamar_bedah' 		=> safe_post('perawwat_kamar_bedah') !== '' ? safe_post('perawwat_kamar_bedah') : NULL,

			'time_out_ckio' => json_encode([
				'time_out_ckio_1' => safe_post('time_out_ckio_1') !== '' ? safe_post('time_out_ckio_1') : null,
				'time_out_ckio_2' => safe_post('time_out_ckio_2') !== '' ? safe_post('time_out_ckio_2') : null,
				'time_out_ckio_1' => safe_post('time_out_ckio_1') !== '' ? safe_post('time_out_ckio_1') : null,
				'time_out_ckio_4' => safe_post('time_out_ckio_4') !== '' ? safe_post('time_out_ckio_4') : null,
				'time_out_ckio_5' => safe_post('time_out_ckio_5') !== '' ? safe_post('time_out_ckio_5') : null,
				'time_out_ckio_4' => safe_post('time_out_ckio_4') !== '' ? safe_post('time_out_ckio_4') : null,
				'time_out_ckio_7' => safe_post('time_out_ckio_7') !== '' ? safe_post('time_out_ckio_7') : null,
				'time_out_ckio_8' => safe_post('time_out_ckio_8') !== '' ? safe_post('time_out_ckio_8') : null,
				'time_out_ckio_7' => safe_post('time_out_ckio_7') !== '' ? safe_post('time_out_ckio_7') : null,
				'time_out_ckio_10' => safe_post('time_out_ckio_10') !== '' ? safe_post('time_out_ckio_10') : null,
				'time_out_ckio_11' => safe_post('time_out_ckio_11') !== '' ? safe_post('time_out_ckio_11') : null,
			]),

			'catatan_keperawatan_intra_operasi' => json_encode([
				'catatan_keperawatan_intra_operasi_1' => safe_post('catatan_keperawatan_intra_operasi_1') !== '' ? safe_post('catatan_keperawatan_intra_operasi_1') : null,
				'catatan_keperawatan_intra_operasi_2' => safe_post('catatan_keperawatan_intra_operasi_2') !== '' ? safe_post('catatan_keperawatan_intra_operasi_2') : null,
				'catatan_keperawatan_intra_operasi_3' => safe_post('catatan_keperawatan_intra_operasi_3') !== '' ? safe_post('catatan_keperawatan_intra_operasi_3') : null,
				'catatan_keperawatan_intra_operasi_4' => safe_post('catatan_keperawatan_intra_operasi_4') !== '' ? safe_post('catatan_keperawatan_intra_operasi_4') : null,
				'catatan_keperawatan_intra_operasi_5' => safe_post('catatan_keperawatan_intra_operasi_5') !== '' ? safe_post('catatan_keperawatan_intra_operasi_5') : null,
				'catatan_keperawatan_intra_operasi_6' => safe_post('catatan_keperawatan_intra_operasi_6') !== '' ? safe_post('catatan_keperawatan_intra_operasi_6') : null,
				'catatan_keperawatan_intra_operasi_7' => safe_post('catatan_keperawatan_intra_operasi_7') !== '' ? safe_post('catatan_keperawatan_intra_operasi_7') : null,
				'catatan_keperawatan_intra_operasi_8' => safe_post('catatan_keperawatan_intra_operasi_8') !== '' ? safe_post('catatan_keperawatan_intra_operasi_8') : null,
				'catatan_keperawatan_intra_operasi_9' => safe_post('catatan_keperawatan_intra_operasi_9') !== '' ? safe_post('catatan_keperawatan_intra_operasi_9') : null,
				'catatan_keperawatan_intra_operasi_10' => safe_post('catatan_keperawatan_intra_operasi_10') !== '' ? safe_post('catatan_keperawatan_intra_operasi_10') : null,
				'catatan_keperawatan_intra_operasi_11' => safe_post('catatan_keperawatan_intra_operasi_11') !== '' ? safe_post('catatan_keperawatan_intra_operasi_11') : null,
				'catatan_keperawatan_intra_operasi_12' => safe_post('catatan_keperawatan_intra_operasi_12') !== '' ? safe_post('catatan_keperawatan_intra_operasi_12') : null,
				'catatan_keperawatan_intra_operasi_13' => safe_post('catatan_keperawatan_intra_operasi_13') !== '' ? safe_post('catatan_keperawatan_intra_operasi_13') : null,
				'catatan_keperawatan_intra_operasi_14' => safe_post('catatan_keperawatan_intra_operasi_14') !== '' ? safe_post('catatan_keperawatan_intra_operasi_14') : null,
				'catatan_keperawatan_intra_operasi_15' => safe_post('catatan_keperawatan_intra_operasi_15') !== '' ? safe_post('catatan_keperawatan_intra_operasi_15') : null,
				// 'catatan_keperawatan_intra_operasi_16' => safe_post('catatan_keperawatan_intra_operasi_16') !== '' ? safe_post('catatan_keperawatan_intra_operasi_16') : null,
				// 'catatan_keperawatan_intra_operasi_16' => safe_post('catatan_keperawatan_intra_operasi_16') !== '' ? safe_post('catatan_keperawatan_intra_operasi_16') : null,
				'catatan_keperawatan_intra_operasi_18' => safe_post('catatan_keperawatan_intra_operasi_18') !== '' ? safe_post('catatan_keperawatan_intra_operasi_18') : null,
				// 'catatan_keperawatan_intra_operasi_19' => safe_post('catatan_keperawatan_intra_operasi_19') !== '' ? safe_post('catatan_keperawatan_intra_operasi_19') : null,
				// 'catatan_keperawatan_intra_operasi_19' => safe_post('catatan_keperawatan_intra_operasi_19') !== '' ? safe_post('catatan_keperawatan_intra_operasi_19') : null,
				'catatan_keperawatan_intra_operasi_21' => safe_post('catatan_keperawatan_intra_operasi_21') !== '' ? safe_post('catatan_keperawatan_intra_operasi_21') : null,
				'catatan_keperawatan_intra_operasi_22' => safe_post('catatan_keperawatan_intra_operasi_22') !== '' ? safe_post('catatan_keperawatan_intra_operasi_22') : null,
				'catatan_keperawatan_intra_operasi_23' => safe_post('catatan_keperawatan_intra_operasi_23') !== '' ? safe_post('catatan_keperawatan_intra_operasi_23') : null,
				'catatan_keperawatan_intra_operasi_24' => safe_post('catatan_keperawatan_intra_operasi_24') !== '' ? safe_post('catatan_keperawatan_intra_operasi_24') : null,
				'catatan_keperawatan_intra_operasi_25' => safe_post('catatan_keperawatan_intra_operasi_25') !== '' ? safe_post('catatan_keperawatan_intra_operasi_25') : null,
				'catatan_keperawatan_intra_operasi_26' => safe_post('catatan_keperawatan_intra_operasi_26') !== '' ? safe_post('catatan_keperawatan_intra_operasi_26') : null,
				'catatan_keperawatan_intra_operasi_27' => safe_post('catatan_keperawatan_intra_operasi_27') !== '' ? safe_post('catatan_keperawatan_intra_operasi_27') : null,
				'catatan_keperawatan_intra_operasi_28' => safe_post('catatan_keperawatan_intra_operasi_28') !== '' ? safe_post('catatan_keperawatan_intra_operasi_28') : null,
				'catatan_keperawatan_intra_operasi_29' => safe_post('catatan_keperawatan_intra_operasi_29') !== '' ? safe_post('catatan_keperawatan_intra_operasi_29') : null,
				// 'catatan_keperawatan_intra_operasi_30' => safe_post('catatan_keperawatan_intra_operasi_30') !== '' ? safe_post('catatan_keperawatan_intra_operasi_30') : null,
				// 'catatan_keperawatan_intra_operasi_30' => safe_post('catatan_keperawatan_intra_operasi_30') !== '' ? safe_post('catatan_keperawatan_intra_operasi_30') : null,
				'catatan_keperawatan_intra_operasi_32' => safe_post('catatan_keperawatan_intra_operasi_32') !== '' ? safe_post('catatan_keperawatan_intra_operasi_32') : null,
				'catatan_keperawatan_intra_operasi_33' => safe_post('catatan_keperawatan_intra_operasi_33') !== '' ? safe_post('catatan_keperawatan_intra_operasi_33') : null,
				'catatan_keperawatan_intra_operasi_34' => safe_post('catatan_keperawatan_intra_operasi_34') !== '' ? safe_post('catatan_keperawatan_intra_operasi_34') : null,
				// 'catatan_keperawatan_intra_operasi_35' => safe_post('catatan_keperawatan_intra_operasi_35') !== '' ? safe_post('catatan_keperawatan_intra_operasi_35') : null,
				// 'catatan_keperawatan_intra_operasi_35' => safe_post('catatan_keperawatan_intra_operasi_35') !== '' ? safe_post('catatan_keperawatan_intra_operasi_35') : null,
				'catatan_keperawatan_intra_operasi_37' => safe_post('catatan_keperawatan_intra_operasi_37') !== '' ? safe_post('catatan_keperawatan_intra_operasi_37') : null,
				// 'catatan_keperawatan_intra_operasi_38' => safe_post('catatan_keperawatan_intra_operasi_38') !== '' ? safe_post('catatan_keperawatan_intra_operasi_38') : null,
				// 'catatan_keperawatan_intra_operasi_38' => safe_post('catatan_keperawatan_intra_operasi_38') !== '' ? safe_post('catatan_keperawatan_intra_operasi_38') : null,
				'catatan_keperawatan_intra_operasi_40' => safe_post('catatan_keperawatan_intra_operasi_40') !== '' ? safe_post('catatan_keperawatan_intra_operasi_40') : null,
				'catatan_keperawatan_intra_operasi_41' => safe_post('catatan_keperawatan_intra_operasi_41') !== '' ? safe_post('catatan_keperawatan_intra_operasi_41') : null,
				'catatan_keperawatan_intra_operasi_42' => safe_post('catatan_keperawatan_intra_operasi_42') !== '' ? safe_post('catatan_keperawatan_intra_operasi_42') : null,
				'catatan_keperawatan_intra_operasi_43' => safe_post('catatan_keperawatan_intra_operasi_43') !== '' ? safe_post('catatan_keperawatan_intra_operasi_43') : null,
				'catatan_keperawatan_intra_operasi_44' => safe_post('catatan_keperawatan_intra_operasi_44') !== '' ? safe_post('catatan_keperawatan_intra_operasi_44') : null,
				'catatan_keperawatan_intra_operasi_45' => safe_post('catatan_keperawatan_intra_operasi_45') !== '' ? safe_post('catatan_keperawatan_intra_operasi_45') : null,
				'catatan_keperawatan_intra_operasi_46' => safe_post('catatan_keperawatan_intra_operasi_46') !== '' ? safe_post('catatan_keperawatan_intra_operasi_46') : null,
				'catatan_keperawatan_intra_operasi_47' => safe_post('catatan_keperawatan_intra_operasi_47') !== '' ? safe_post('catatan_keperawatan_intra_operasi_47') : null,
				'catatan_keperawatan_intra_operasi_48' => safe_post('catatan_keperawatan_intra_operasi_48') !== '' ? safe_post('catatan_keperawatan_intra_operasi_48') : null,
				'catatan_keperawatan_intra_operasi_49' => safe_post('catatan_keperawatan_intra_operasi_49') !== '' ? safe_post('catatan_keperawatan_intra_operasi_49') : null,
				'catatan_keperawatan_intra_operasi_50' => safe_post('catatan_keperawatan_intra_operasi_50') !== '' ? safe_post('catatan_keperawatan_intra_operasi_50') : null,
				'catatan_keperawatan_intra_operasi_51' => safe_post('catatan_keperawatan_intra_operasi_51') !== '' ? safe_post('catatan_keperawatan_intra_operasi_51') : null,
				'catatan_keperawatan_intra_operasi_52' => safe_post('catatan_keperawatan_intra_operasi_52') !== '' ? safe_post('catatan_keperawatan_intra_operasi_52') : null,
				'catatan_keperawatan_intra_operasi_53' => safe_post('catatan_keperawatan_intra_operasi_53') !== '' ? safe_post('catatan_keperawatan_intra_operasi_53') : null,
				'catatan_keperawatan_intra_operasi_54' => safe_post('catatan_keperawatan_intra_operasi_54') !== '' ? safe_post('catatan_keperawatan_intra_operasi_54') : null,
				'catatan_keperawatan_intra_operasi_55' => safe_post('catatan_keperawatan_intra_operasi_55') !== '' ? safe_post('catatan_keperawatan_intra_operasi_55') : null,
				'catatan_keperawatan_intra_operasi_56' => safe_post('catatan_keperawatan_intra_operasi_56') !== '' ? safe_post('catatan_keperawatan_intra_operasi_56') : null,
				'catatan_keperawatan_intra_operasi_57' => safe_post('catatan_keperawatan_intra_operasi_57') !== '' ? safe_post('catatan_keperawatan_intra_operasi_57') : null,
				'catatan_keperawatan_intra_operasi_58' => safe_post('catatan_keperawatan_intra_operasi_58') !== '' ? safe_post('catatan_keperawatan_intra_operasi_58') : null,
				'catatan_keperawatan_intra_operasi_59' => safe_post('catatan_keperawatan_intra_operasi_59') !== '' ? safe_post('catatan_keperawatan_intra_operasi_59') : null,
				'catatan_keperawatan_intra_operasi_60' => safe_post('catatan_keperawatan_intra_operasi_60') !== '' ? safe_post('catatan_keperawatan_intra_operasi_60') : null,
				// 'catatan_keperawatan_intra_operasi_61' => safe_post('catatan_keperawatan_intra_operasi_61') !== '' ? safe_post('catatan_keperawatan_intra_operasi_61') : null,
				// 'catatan_keperawatan_intra_operasi_61' => safe_post('catatan_keperawatan_intra_operasi_61') !== '' ? safe_post('catatan_keperawatan_intra_operasi_61') : null,
				'catatan_keperawatan_intra_operasi_63' => safe_post('catatan_keperawatan_intra_operasi_63') !== '' ? safe_post('catatan_keperawatan_intra_operasi_63') : null,
				// 'catatan_keperawatan_intra_operasi_64' => safe_post('catatan_keperawatan_intra_operasi_64') !== '' ? safe_post('catatan_keperawatan_intra_operasi_64') : null,
				// 'catatan_keperawatan_intra_operasi_64' => safe_post('catatan_keperawatan_intra_operasi_64') !== '' ? safe_post('catatan_keperawatan_intra_operasi_64') : null,
				'catatan_keperawatan_intra_operasi_66' => safe_post('catatan_keperawatan_intra_operasi_66') !== '' ? safe_post('catatan_keperawatan_intra_operasi_66') : null,
				'catatan_keperawatan_intra_operasi_67' => safe_post('catatan_keperawatan_intra_operasi_67') !== '' ? safe_post('catatan_keperawatan_intra_operasi_67') : null,
				'catatan_keperawatan_intra_operasi_68' => safe_post('catatan_keperawatan_intra_operasi_68') !== '' ? safe_post('catatan_keperawatan_intra_operasi_68') : null,
				'catatan_keperawatan_intra_operasi_69' => safe_post('catatan_keperawatan_intra_operasi_69') !== '' ? safe_post('catatan_keperawatan_intra_operasi_69') : null,
				'catatan_keperawatan_intra_operasi_70' => safe_post('catatan_keperawatan_intra_operasi_70') !== '' ? safe_post('catatan_keperawatan_intra_operasi_70') : null,
				'catatan_keperawatan_intra_operasi_71' => safe_post('catatan_keperawatan_intra_operasi_71') !== '' ? safe_post('catatan_keperawatan_intra_operasi_71') : null,
				'catatan_keperawatan_intra_operasi_72' => safe_post('catatan_keperawatan_intra_operasi_72') !== '' ? safe_post('catatan_keperawatan_intra_operasi_72') : null,
				'catatan_keperawatan_intra_operasi_73' => safe_post('catatan_keperawatan_intra_operasi_73') !== '' ? safe_post('catatan_keperawatan_intra_operasi_73') : null,
				'catatan_keperawatan_intra_operasi_74' => safe_post('catatan_keperawatan_intra_operasi_74') !== '' ? safe_post('catatan_keperawatan_intra_operasi_74') : null,
				'catatan_keperawatan_intra_operasi_75' => safe_post('catatan_keperawatan_intra_operasi_75') !== '' ? safe_post('catatan_keperawatan_intra_operasi_75') : null,
				'catatan_keperawatan_intra_operasi_76' => safe_post('catatan_keperawatan_intra_operasi_76') !== '' ? safe_post('catatan_keperawatan_intra_operasi_76') : null,
				'catatan_keperawatan_intra_operasi_77' => safe_post('catatan_keperawatan_intra_operasi_77') !== '' ? safe_post('catatan_keperawatan_intra_operasi_77') : null,
				'catatan_keperawatan_intra_operasi_78' => safe_post('catatan_keperawatan_intra_operasi_78') !== '' ? safe_post('catatan_keperawatan_intra_operasi_78') : null,
				'catatan_keperawatan_intra_operasi_78' => safe_post('catatan_keperawatan_intra_operasi_78') !== '' ? safe_post('catatan_keperawatan_intra_operasi_78') : null,

				'catatan_keperawatan_intra_operasi_92' => safe_post('catatan_keperawatan_intra_operasi_92') !== '' ? safe_post('catatan_keperawatan_intra_operasi_92') : null,
				'catatan_keperawatan_intra_operasi_93' => safe_post('catatan_keperawatan_intra_operasi_93') !== '' ? safe_post('catatan_keperawatan_intra_operasi_93') : null,


				'catatan_keperawatan_intra_operasi_80' => safe_post('catatan_keperawatan_intra_operasi_80') !== '' ? safe_post('catatan_keperawatan_intra_operasi_80') : null,
				'catatan_keperawatan_intra_operasi_81' => safe_post('catatan_keperawatan_intra_operasi_81') !== '' ? safe_post('catatan_keperawatan_intra_operasi_81') : null,
				'catatan_keperawatan_intra_operasi_82' => safe_post('catatan_keperawatan_intra_operasi_82') !== '' ? safe_post('catatan_keperawatan_intra_operasi_82') : null,
				'catatan_keperawatan_intra_operasi_83' => safe_post('catatan_keperawatan_intra_operasi_83') !== '' ? safe_post('catatan_keperawatan_intra_operasi_83') : null,
				'catatan_keperawatan_intra_operasi_84' => safe_post('catatan_keperawatan_intra_operasi_84') !== '' ? safe_post('catatan_keperawatan_intra_operasi_84') : null,
				'catatan_keperawatan_intra_operasi_85' => safe_post('catatan_keperawatan_intra_operasi_85') !== '' ? safe_post('catatan_keperawatan_intra_operasi_85') : null,
				'catatan_keperawatan_intra_operasi_86' => safe_post('catatan_keperawatan_intra_operasi_86') !== '' ? safe_post('catatan_keperawatan_intra_operasi_86') : null,
				'catatan_keperawatan_intra_operasi_87' => safe_post('catatan_keperawatan_intra_operasi_87') !== '' ? safe_post('catatan_keperawatan_intra_operasi_87') : null,
				'catatan_keperawatan_intra_operasi_88' => safe_post('catatan_keperawatan_intra_operasi_88') !== '' ? safe_post('catatan_keperawatan_intra_operasi_88') : null,
				'catatan_keperawatan_intra_operasi_89' => safe_post('catatan_keperawatan_intra_operasi_89') !== '' ? safe_post('catatan_keperawatan_intra_operasi_89') : null,
				'catatan_keperawatan_intra_operasi_90' => safe_post('catatan_keperawatan_intra_operasi_90') !== '' ? safe_post('catatan_keperawatan_intra_operasi_90') : null,
				'catatan_keperawatan_intra_operasi_91' => safe_post('catatan_keperawatan_intra_operasi_91') !== '' ? safe_post('catatan_keperawatan_intra_operasi_91') : null,
			]),

			'catatan_keperawatan_intra_op' => json_encode([
				'catatan_keperawatan_intra_op_1' => safe_post('catatan_keperawatan_intra_op_1') !== '' ? safe_post('catatan_keperawatan_intra_op_1') : null,
				'catatan_keperawatan_intra_op_2' => safe_post('catatan_keperawatan_intra_op_2') !== '' ? safe_post('catatan_keperawatan_intra_op_2') : null,
				'catatan_keperawatan_intra_op_3' => safe_post('catatan_keperawatan_intra_op_3') !== '' ? safe_post('catatan_keperawatan_intra_op_3') : null,
				'catatan_keperawatan_intra_op_4' => safe_post('catatan_keperawatan_intra_op_4') !== '' ? safe_post('catatan_keperawatan_intra_op_4') : null,
				'catatan_keperawatan_intra_op_5' => safe_post('catatan_keperawatan_intra_op_5') !== '' ? safe_post('catatan_keperawatan_intra_op_5') : null,
				'catatan_keperawatan_intra_op_6' => safe_post('catatan_keperawatan_intra_op_6') !== '' ? safe_post('catatan_keperawatan_intra_op_6') : null,
				'catatan_keperawatan_intra_op_7' => safe_post('catatan_keperawatan_intra_op_7') !== '' ? safe_post('catatan_keperawatan_intra_op_7') : null,
				'catatan_keperawatan_intra_op_8' => safe_post('catatan_keperawatan_intra_op_8') !== '' ? safe_post('catatan_keperawatan_intra_op_8') : null,
				'catatan_keperawatan_intra_op_9' => safe_post('catatan_keperawatan_intra_op_9') !== '' ? safe_post('catatan_keperawatan_intra_op_9') : null,
				'catatan_keperawatan_intra_op_10' => safe_post('catatan_keperawatan_intra_op_10') !== '' ? safe_post('catatan_keperawatan_intra_op_10') : null,
				'catatan_keperawatan_intra_op_11' => safe_post('catatan_keperawatan_intra_op_11') !== '' ? safe_post('catatan_keperawatan_intra_op_11') : null,
				'catatan_keperawatan_intra_op_12' => safe_post('catatan_keperawatan_intra_op_12') !== '' ? safe_post('catatan_keperawatan_intra_op_12') : null,
				'catatan_keperawatan_intra_op_13' => safe_post('catatan_keperawatan_intra_op_13') !== '' ? safe_post('catatan_keperawatan_intra_op_13') : null,
				'catatan_keperawatan_intra_op_14' => safe_post('catatan_keperawatan_intra_op_14') !== '' ? safe_post('catatan_keperawatan_intra_op_14') : null,
				'catatan_keperawatan_intra_op_15' => safe_post('catatan_keperawatan_intra_op_15') !== '' ? safe_post('catatan_keperawatan_intra_op_15') : null,
				'catatan_keperawatan_intra_op_16' => safe_post('catatan_keperawatan_intra_op_16') !== '' ? safe_post('catatan_keperawatan_intra_op_16') : null,
				'catatan_keperawatan_intra_op_17' => safe_post('catatan_keperawatan_intra_op_17') !== '' ? safe_post('catatan_keperawatan_intra_op_17') : null,
				'catatan_keperawatan_intra_op_18' => safe_post('catatan_keperawatan_intra_op_18') !== '' ? safe_post('catatan_keperawatan_intra_op_18') : null,
				'catatan_keperawatan_intra_op_19' => safe_post('catatan_keperawatan_intra_op_19') !== '' ? safe_post('catatan_keperawatan_intra_op_19') : null,
				'catatan_keperawatan_intra_op_20' => safe_post('catatan_keperawatan_intra_op_20') !== '' ? safe_post('catatan_keperawatan_intra_op_20') : null,
				'catatan_keperawatan_intra_op_21' => safe_post('catatan_keperawatan_intra_op_21') !== '' ? safe_post('catatan_keperawatan_intra_op_21') : null,
				'catatan_keperawatan_intra_op_22' => safe_post('catatan_keperawatan_intra_op_22') !== '' ? safe_post('catatan_keperawatan_intra_op_22') : null,
				'catatan_keperawatan_intra_op_23' => safe_post('catatan_keperawatan_intra_op_23') !== '' ? safe_post('catatan_keperawatan_intra_op_23') : null,
				'catatan_keperawatan_intra_op_24' => safe_post('catatan_keperawatan_intra_op_24') !== '' ? safe_post('catatan_keperawatan_intra_op_24') : null,
				'catatan_keperawatan_intra_op_25' => safe_post('catatan_keperawatan_intra_op_25') !== '' ? safe_post('catatan_keperawatan_intra_op_25') : null,
				'catatan_keperawatan_intra_op_26' => safe_post('catatan_keperawatan_intra_op_26') !== '' ? safe_post('catatan_keperawatan_intra_op_26') : null,
				'catatan_keperawatan_intra_op_27' => safe_post('catatan_keperawatan_intra_op_27') !== '' ? safe_post('catatan_keperawatan_intra_op_27') : null,
				'catatan_keperawatan_intra_op_28' => safe_post('catatan_keperawatan_intra_op_28') !== '' ? safe_post('catatan_keperawatan_intra_op_28') : null,
				'catatan_keperawatan_intra_op_29' => safe_post('catatan_keperawatan_intra_op_29') !== '' ? safe_post('catatan_keperawatan_intra_op_29') : null,
				'catatan_keperawatan_intra_op_30' => safe_post('catatan_keperawatan_intra_op_30') !== '' ? safe_post('catatan_keperawatan_intra_op_30') : null,
				'catatan_keperawatan_intra_op_31' => safe_post('catatan_keperawatan_intra_op_31') !== '' ? safe_post('catatan_keperawatan_intra_op_31') : null,
				'catatan_keperawatan_intra_op_32' => safe_post('catatan_keperawatan_intra_op_32') !== '' ? safe_post('catatan_keperawatan_intra_op_32') : null,
				'catatan_keperawatan_intra_op_33' => safe_post('catatan_keperawatan_intra_op_33') !== '' ? safe_post('catatan_keperawatan_intra_op_33') : null,
				'catatan_keperawatan_intra_op_34' => safe_post('catatan_keperawatan_intra_op_34') !== '' ? safe_post('catatan_keperawatan_intra_op_34') : null,
				'catatan_keperawatan_intra_op_35' => safe_post('catatan_keperawatan_intra_op_35') !== '' ? safe_post('catatan_keperawatan_intra_op_35') : null,
				'catatan_keperawatan_intra_op_36' => safe_post('catatan_keperawatan_intra_op_36') !== '' ? safe_post('catatan_keperawatan_intra_op_36') : null,
				'catatan_keperawatan_intra_op_37' => safe_post('catatan_keperawatan_intra_op_37') !== '' ? safe_post('catatan_keperawatan_intra_op_37') : null,
				'catatan_keperawatan_intra_op_38' => safe_post('catatan_keperawatan_intra_op_38') !== '' ? safe_post('catatan_keperawatan_intra_op_38') : null,
				'catatan_keperawatan_intra_op_39' => safe_post('catatan_keperawatan_intra_op_39') !== '' ? safe_post('catatan_keperawatan_intra_op_39') : null,
				'catatan_keperawatan_intra_op_40' => safe_post('catatan_keperawatan_intra_op_40') !== '' ? safe_post('catatan_keperawatan_intra_op_40') : null,
				'catatan_keperawatan_intra_op_41' => safe_post('catatan_keperawatan_intra_op_41') !== '' ? safe_post('catatan_keperawatan_intra_op_41') : null,
				'catatan_keperawatan_intra_op_42' => safe_post('catatan_keperawatan_intra_op_42') !== '' ? safe_post('catatan_keperawatan_intra_op_42') : null,
				'catatan_keperawatan_intra_op_43' => safe_post('catatan_keperawatan_intra_op_43') !== '' ? safe_post('catatan_keperawatan_intra_op_43') : null,
				'catatan_keperawatan_intra_op_44' => safe_post('catatan_keperawatan_intra_op_44') !== '' ? safe_post('catatan_keperawatan_intra_op_44') : null,
				'catatan_keperawatan_intra_op_45' => safe_post('catatan_keperawatan_intra_op_45') !== '' ? safe_post('catatan_keperawatan_intra_op_45') : null,
				'catatan_keperawatan_intra_op_46' => safe_post('catatan_keperawatan_intra_op_46') !== '' ? safe_post('catatan_keperawatan_intra_op_46') : null,
				'catatan_keperawatan_intra_op_47' => safe_post('catatan_keperawatan_intra_op_47') !== '' ? safe_post('catatan_keperawatan_intra_op_47') : null,
				'catatan_keperawatan_intra_op_48' => safe_post('catatan_keperawatan_intra_op_48') !== '' ? safe_post('catatan_keperawatan_intra_op_48') : null,
				'catatan_keperawatan_intra_op_49' => safe_post('catatan_keperawatan_intra_op_49') !== '' ? safe_post('catatan_keperawatan_intra_op_49') : null,
				'catatan_keperawatan_intra_op_50' => safe_post('catatan_keperawatan_intra_op_50') !== '' ? safe_post('catatan_keperawatan_intra_op_50') : null,
			]),

			'tanggal_jam_ckio'			=> (safe_post('tanggal_jam_ckio') !== '' ? datetime2mysql(safe_post('tanggal_jam_ckio')) : NULL),
			'perawat_instrument_1' 		=> safe_post('perawat_instrument_1') !== '' ? safe_post('perawat_instrument_1') : NULL,
			'perawat_instrument_2' 		=> safe_post('perawat_instrument_2') !== '' ? safe_post('perawat_instrument_2') : NULL,

			'asuhan_keperawatan_ak_2' => json_encode([
				'asuhan_keperawatannnnn_ak_1' => safe_post('asuhan_keperawatannnnn_ak_1') !== '' ? safe_post('asuhan_keperawatannnnn_ak_1') : null,
				'asuhan_keperawatannnnn_ak_2' => safe_post('asuhan_keperawatannnnn_ak_2') !== '' ? safe_post('asuhan_keperawatannnnn_ak_2') : null,
				'asuhan_keperawatannnnn_ak_3' => safe_post('asuhan_keperawatannnnn_ak_3') !== '' ? safe_post('asuhan_keperawatannnnn_ak_3') : null,
				'asuhan_keperawatannnnn_ak_4' => safe_post('asuhan_keperawatannnnn_ak_4') !== '' ? safe_post('asuhan_keperawatannnnn_ak_4') : null,
				'asuhan_keperawatannnnn_ak_5' => safe_post('asuhan_keperawatannnnn_ak_5') !== '' ? safe_post('asuhan_keperawatannnnn_ak_5') : null,
				'asuhan_keperawatannnnn_ak_6' => safe_post('asuhan_keperawatannnnn_ak_6') !== '' ? safe_post('asuhan_keperawatannnnn_ak_6') : null,
				'asuhan_keperawatannnnn_ak_7' => safe_post('asuhan_keperawatannnnn_ak_7') !== '' ? safe_post('asuhan_keperawatannnnn_ak_7') : null,
				'asuhan_keperawatannnnn_ak_8' => safe_post('asuhan_keperawatannnnn_ak_8') !== '' ? safe_post('asuhan_keperawatannnnn_ak_8') : null,
				'asuhan_keperawatannnnn_ak_9' => safe_post('asuhan_keperawatannnnn_ak_9') !== '' ? safe_post('asuhan_keperawatannnnn_ak_9') : null,
				'asuhan_keperawatannnnn_ak_10' => safe_post('asuhan_keperawatannnnn_ak_10') !== '' ? safe_post('asuhan_keperawatannnnn_ak_10') : null,
				'asuhan_keperawatannnnn_ak_11' => safe_post('asuhan_keperawatannnnn_ak_11') !== '' ? safe_post('asuhan_keperawatannnnn_ak_11') : null,
				'asuhan_keperawatannnnn_ak_12' => safe_post('asuhan_keperawatannnnn_ak_12') !== '' ? safe_post('asuhan_keperawatannnnn_ak_12') : null,
				'asuhan_keperawatannnnn_ak_13' => safe_post('asuhan_keperawatannnnn_ak_13') !== '' ? safe_post('asuhan_keperawatannnnn_ak_13') : null,
				'asuhan_keperawatannnnn_ak_14' => safe_post('asuhan_keperawatannnnn_ak_14') !== '' ? safe_post('asuhan_keperawatannnnn_ak_14') : null,
				'asuhan_keperawatannnnn_ak_15' => safe_post('asuhan_keperawatannnnn_ak_15') !== '' ? safe_post('asuhan_keperawatannnnn_ak_15') : null,
				'asuhan_keperawatannnnn_ak_16' => safe_post('asuhan_keperawatannnnn_ak_16') !== '' ? safe_post('asuhan_keperawatannnnn_ak_16') : null,
				'asuhan_keperawatannnnn_ak_17' => safe_post('asuhan_keperawatannnnn_ak_17') !== '' ? safe_post('asuhan_keperawatannnnn_ak_17') : null,
				'asuhan_keperawatannnnn_ak_18' => safe_post('asuhan_keperawatannnnn_ak_18') !== '' ? safe_post('asuhan_keperawatannnnn_ak_18') : null,
				'asuhan_keperawatannnnn_ak_19' => safe_post('asuhan_keperawatannnnn_ak_19') !== '' ? safe_post('asuhan_keperawatannnnn_ak_19') : null,
				'asuhan_keperawatannnnn_ak_20' => safe_post('asuhan_keperawatannnnn_ak_20') !== '' ? safe_post('asuhan_keperawatannnnn_ak_20') : null,
				'asuhan_keperawatannnnn_ak_21' => safe_post('asuhan_keperawatannnnn_ak_21') !== '' ? safe_post('asuhan_keperawatannnnn_ak_21') : null,
				'asuhan_keperawatannnnn_ak_22' => safe_post('asuhan_keperawatannnnn_ak_22') !== '' ? safe_post('asuhan_keperawatannnnn_ak_22') : null,
				'asuhan_keperawatannnnn_ak_23' => safe_post('asuhan_keperawatannnnn_ak_23') !== '' ? safe_post('asuhan_keperawatannnnn_ak_23') : null,
				'asuhan_keperawatannnnn_ak_24' => safe_post('asuhan_keperawatannnnn_ak_24') !== '' ? safe_post('asuhan_keperawatannnnn_ak_24') : null,
				'asuhan_keperawatannnnn_ak_25' => safe_post('asuhan_keperawatannnnn_ak_25') !== '' ? safe_post('asuhan_keperawatannnnn_ak_25') : null,
				'asuhan_keperawatannnnn_ak_26' => safe_post('asuhan_keperawatannnnn_ak_26') !== '' ? safe_post('asuhan_keperawatannnnn_ak_26') : null,
				'asuhan_keperawatannnnn_ak_27' => safe_post('asuhan_keperawatannnnn_ak_27') !== '' ? safe_post('asuhan_keperawatannnnn_ak_27') : null,
				'asuhan_keperawatannnnn_ak_28' => safe_post('asuhan_keperawatannnnn_ak_28') !== '' ? safe_post('asuhan_keperawatannnnn_ak_28') : null,
				'asuhan_keperawatannnnn_ak_29' => safe_post('asuhan_keperawatannnnn_ak_29') !== '' ? safe_post('asuhan_keperawatannnnn_ak_29') : null,
				'asuhan_keperawatannnnn_ak_30' => safe_post('asuhan_keperawatannnnn_ak_30') !== '' ? safe_post('asuhan_keperawatannnnn_ak_30') : null,
				'asuhan_keperawatannnnn_ak_31' => safe_post('asuhan_keperawatannnnn_ak_31') !== '' ? safe_post('asuhan_keperawatannnnn_ak_31') : null,
				'asuhan_keperawatannnnn_ak_32' => safe_post('asuhan_keperawatannnnn_ak_32') !== '' ? safe_post('asuhan_keperawatannnnn_ak_32') : null,
				'asuhan_keperawatannnnn_ak_33' => safe_post('asuhan_keperawatannnnn_ak_33') !== '' ? safe_post('asuhan_keperawatannnnn_ak_33') : null,
				'asuhan_keperawatannnnn_ak_34' => safe_post('asuhan_keperawatannnnn_ak_34') !== '' ? safe_post('asuhan_keperawatannnnn_ak_34') : null,
				'asuhan_keperawatannnnn_ak_35' => safe_post('asuhan_keperawatannnnn_ak_35') !== '' ? safe_post('asuhan_keperawatannnnn_ak_35') : null,
				'asuhan_keperawatannnnn_ak_36' => safe_post('asuhan_keperawatannnnn_ak_36') !== '' ? safe_post('asuhan_keperawatannnnn_ak_36') : null,
				'asuhan_keperawatannnnn_ak_37' => safe_post('asuhan_keperawatannnnn_ak_37') !== '' ? safe_post('asuhan_keperawatannnnn_ak_37') : null,
				'asuhan_keperawatannnnn_ak_38' => safe_post('asuhan_keperawatannnnn_ak_38') !== '' ? safe_post('asuhan_keperawatannnnn_ak_38') : null,
				'asuhan_keperawatannnnn_ak_39' => safe_post('asuhan_keperawatannnnn_ak_39') !== '' ? safe_post('asuhan_keperawatannnnn_ak_39') : null,
				'asuhan_keperawatannnnn_ak_40' => safe_post('asuhan_keperawatannnnn_ak_40') !== '' ? safe_post('asuhan_keperawatannnnn_ak_40') : null,
				'asuhan_keperawatannnnn_ak_41' => safe_post('asuhan_keperawatannnnn_ak_41') !== '' ? safe_post('asuhan_keperawatannnnn_ak_41') : null,
				'asuhan_keperawatannnnn_ak_42' => safe_post('asuhan_keperawatannnnn_ak_42') !== '' ? safe_post('asuhan_keperawatannnnn_ak_42') : null,
				'asuhan_keperawatannnnn_ak_43' => safe_post('asuhan_keperawatannnnn_ak_43') !== '' ? safe_post('asuhan_keperawatannnnn_ak_43') : null,
				'asuhan_keperawatannnnn_ak_44' => safe_post('asuhan_keperawatannnnn_ak_44') !== '' ? safe_post('asuhan_keperawatannnnn_ak_44') : null,
				'asuhan_keperawatannnnn_ak_45' => safe_post('asuhan_keperawatannnnn_ak_45') !== '' ? safe_post('asuhan_keperawatannnnn_ak_45') : null,
				'asuhan_keperawatannnnn_ak_46' => safe_post('asuhan_keperawatannnnn_ak_46') !== '' ? safe_post('asuhan_keperawatannnnn_ak_46') : null,
				'asuhan_keperawatannnnn_ak_47' => safe_post('asuhan_keperawatannnnn_ak_47') !== '' ? safe_post('asuhan_keperawatannnnn_ak_47') : null,
				'asuhan_keperawatannnnn_ak_48' => safe_post('asuhan_keperawatannnnn_ak_48') !== '' ? safe_post('asuhan_keperawatannnnn_ak_48') : null,
				'asuhan_keperawatannnnn_ak_49' => safe_post('asuhan_keperawatannnnn_ak_49') !== '' ? safe_post('asuhan_keperawatannnnn_ak_49') : null,
				'asuhan_keperawatannnnn_ak_50' => safe_post('asuhan_keperawatannnnn_ak_50') !== '' ? safe_post('asuhan_keperawatannnnn_ak_50') : null,
				'asuhan_keperawatannnnn_ak_51' => safe_post('asuhan_keperawatannnnn_ak_51') !== '' ? safe_post('asuhan_keperawatannnnn_ak_51') : null,
				'asuhan_keperawatannnnn_ak_52' => safe_post('asuhan_keperawatannnnn_ak_52') !== '' ? safe_post('asuhan_keperawatannnnn_ak_52') : null,
				'asuhan_keperawatannnnn_ak_53' => safe_post('asuhan_keperawatannnnn_ak_53') !== '' ? safe_post('asuhan_keperawatannnnn_ak_53') : null,
				'asuhan_keperawatannnnn_ak_54' => safe_post('asuhan_keperawatannnnn_ak_54') !== '' ? safe_post('asuhan_keperawatannnnn_ak_54') : null,
				'asuhan_keperawatannnnn_ak_55' => safe_post('asuhan_keperawatannnnn_ak_55') !== '' ? safe_post('asuhan_keperawatannnnn_ak_55') : null,
				'asuhan_keperawatannnnn_ak_56' => safe_post('asuhan_keperawatannnnn_ak_56') !== '' ? safe_post('asuhan_keperawatannnnn_ak_56') : null,
				'asuhan_keperawatannnnn_ak_57' => safe_post('asuhan_keperawatannnnn_ak_57') !== '' ? safe_post('asuhan_keperawatannnnn_ak_57') : null,
				'asuhan_keperawatannnnn_ak_58' => safe_post('asuhan_keperawatannnnn_ak_58') !== '' ? safe_post('asuhan_keperawatannnnn_ak_58') : null,
				'asuhan_keperawatannnnn_ak_59' => safe_post('asuhan_keperawatannnnn_ak_59') !== '' ? safe_post('asuhan_keperawatannnnn_ak_59') : null,
				'asuhan_keperawatannnnn_ak_60' => safe_post('asuhan_keperawatannnnn_ak_60') !== '' ? safe_post('asuhan_keperawatannnnn_ak_60') : null,
				'asuhan_keperawatannnnn_ak_61' => safe_post('asuhan_keperawatannnnn_ak_61') !== '' ? safe_post('asuhan_keperawatannnnn_ak_61') : null,
				'asuhan_keperawatannnnn_ak_62' => safe_post('asuhan_keperawatannnnn_ak_62') !== '' ? safe_post('asuhan_keperawatannnnn_ak_62') : null,
				'asuhan_keperawatannnnn_ak_63' => safe_post('asuhan_keperawatannnnn_ak_63') !== '' ? safe_post('asuhan_keperawatannnnn_ak_63') : null,
				'asuhan_keperawatannnnn_ak_64' => safe_post('asuhan_keperawatannnnn_ak_64') !== '' ? safe_post('asuhan_keperawatannnnn_ak_64') : null,
				'asuhan_keperawatannnnn_ak_65' => safe_post('asuhan_keperawatannnnn_ak_65') !== '' ? safe_post('asuhan_keperawatannnnn_ak_65') : null,
				'asuhan_keperawatannnnn_ak_66' => safe_post('asuhan_keperawatannnnn_ak_66') !== '' ? safe_post('asuhan_keperawatannnnn_ak_66') : null,
				'asuhan_keperawatannnnn_ak_67' => safe_post('asuhan_keperawatannnnn_ak_67') !== '' ? safe_post('asuhan_keperawatannnnn_ak_67') : null,
				'asuhan_keperawatannnnn_ak_68' => safe_post('asuhan_keperawatannnnn_ak_68') !== '' ? safe_post('asuhan_keperawatannnnn_ak_68') : null,
				'asuhan_keperawatannnnn_ak_69' => safe_post('asuhan_keperawatannnnn_ak_69') !== '' ? safe_post('asuhan_keperawatannnnn_ak_69') : null,
				'asuhan_keperawatannnnn_ak_70' => safe_post('asuhan_keperawatannnnn_ak_70') !== '' ? safe_post('asuhan_keperawatannnnn_ak_70') : null,
				'asuhan_keperawatannnnn_ak_71' => safe_post('asuhan_keperawatannnnn_ak_71') !== '' ? safe_post('asuhan_keperawatannnnn_ak_71') : null,
				'asuhan_keperawatannnnn_ak_72' => safe_post('asuhan_keperawatannnnn_ak_72') !== '' ? safe_post('asuhan_keperawatannnnn_ak_72') : null,
				'asuhan_keperawatannnnn_ak_73' => safe_post('asuhan_keperawatannnnn_ak_73') !== '' ? safe_post('asuhan_keperawatannnnn_ak_73') : null,
				'asuhan_keperawatannnnn_ak_74' => safe_post('asuhan_keperawatannnnn_ak_74') !== '' ? safe_post('asuhan_keperawatannnnn_ak_74') : null,
				'asuhan_keperawatannnnn_ak_75' => safe_post('asuhan_keperawatannnnn_ak_75') !== '' ? safe_post('asuhan_keperawatannnnn_ak_75') : null,
				'asuhan_keperawatannnnn_ak_76' => safe_post('asuhan_keperawatannnnn_ak_76') !== '' ? safe_post('asuhan_keperawatannnnn_ak_76') : null,
				'asuhan_keperawatannnnn_ak_77' => safe_post('asuhan_keperawatannnnn_ak_77') !== '' ? safe_post('asuhan_keperawatannnnn_ak_77') : null,
				'asuhan_keperawatannnnn_ak_78' => safe_post('asuhan_keperawatannnnn_ak_78') !== '' ? safe_post('asuhan_keperawatannnnn_ak_78') : null,
				'asuhan_keperawatannnnn_ak_79' => safe_post('asuhan_keperawatannnnn_ak_79') !== '' ? safe_post('asuhan_keperawatannnnn_ak_79') : null,
				'asuhan_keperawatannnnn_ak_80' => safe_post('asuhan_keperawatannnnn_ak_80') !== '' ? safe_post('asuhan_keperawatannnnn_ak_80') : null,
				'asuhan_keperawatannnnn_ak_81' => safe_post('asuhan_keperawatannnnn_ak_81') !== '' ? safe_post('asuhan_keperawatannnnn_ak_81') : null,
				'asuhan_keperawatannnnn_ak_82' => safe_post('asuhan_keperawatannnnn_ak_82') !== '' ? safe_post('asuhan_keperawatannnnn_ak_82') : null,
				'asuhan_keperawatannnnn_ak_83' => safe_post('asuhan_keperawatannnnn_ak_83') !== '' ? safe_post('asuhan_keperawatannnnn_ak_83') : null,
				'asuhan_keperawatannnnn_ak_84' => safe_post('asuhan_keperawatannnnn_ak_84') !== '' ? safe_post('asuhan_keperawatannnnn_ak_84') : null,
				'asuhan_keperawatannnnn_ak_85' => safe_post('asuhan_keperawatannnnn_ak_85') !== '' ? safe_post('asuhan_keperawatannnnn_ak_85') : null,
				'asuhan_keperawatannnnn_ak_86' => safe_post('asuhan_keperawatannnnn_ak_86') !== '' ? safe_post('asuhan_keperawatannnnn_ak_86') : null,
				'asuhan_keperawatannnnn_ak_87' => safe_post('asuhan_keperawatannnnn_ak_87') !== '' ? safe_post('asuhan_keperawatannnnn_ak_87') : null,
				'asuhan_keperawatannnnn_ak_88' => safe_post('asuhan_keperawatannnnn_ak_88') !== '' ? safe_post('asuhan_keperawatannnnn_ak_88') : null,
				'asuhan_keperawatannnnn_ak_89' => safe_post('asuhan_keperawatannnnn_ak_89') !== '' ? safe_post('asuhan_keperawatannnnn_ak_89') : null,
				'asuhan_keperawatannnnn_ak_90' => safe_post('asuhan_keperawatannnnn_ak_90') !== '' ? safe_post('asuhan_keperawatannnnn_ak_90') : null,
				'asuhan_keperawatannnnn_ak_91' => safe_post('asuhan_keperawatannnnn_ak_91') !== '' ? safe_post('asuhan_keperawatannnnn_ak_91') : null,
				'asuhan_keperawatannnnn_ak_92' => safe_post('asuhan_keperawatannnnn_ak_92') !== '' ? safe_post('asuhan_keperawatannnnn_ak_92') : null,
				'asuhan_keperawatannnnn_ak_93' => safe_post('asuhan_keperawatannnnn_ak_93') !== '' ? safe_post('asuhan_keperawatannnnn_ak_93') : null,
				'asuhan_keperawatannnnn_ak_94' => safe_post('asuhan_keperawatannnnn_ak_94') !== '' ? safe_post('asuhan_keperawatannnnn_ak_94') : null,
				'asuhan_keperawatannnnn_ak_95' => safe_post('asuhan_keperawatannnnn_ak_95') !== '' ? safe_post('asuhan_keperawatannnnn_ak_95') : null,
				'asuhan_keperawatannnnn_ak_96' => safe_post('asuhan_keperawatannnnn_ak_96') !== '' ? safe_post('asuhan_keperawatannnnn_ak_96') : null,
				'asuhan_keperawatannnnn_ak_97' => safe_post('asuhan_keperawatannnnn_ak_97') !== '' ? safe_post('asuhan_keperawatannnnn_ak_97') : null,
				'asuhan_keperawatannnnn_ak_98' => safe_post('asuhan_keperawatannnnn_ak_98') !== '' ? safe_post('asuhan_keperawatannnnn_ak_98') : null,
				'asuhan_keperawatannnnn_ak_99' => safe_post('asuhan_keperawatannnnn_ak_99') !== '' ? safe_post('asuhan_keperawatannnnn_ak_99') : null,
				'asuhan_keperawatannnnn_ak_100' => safe_post('asuhan_keperawatannnnn_ak_100') !== '' ? safe_post('asuhan_keperawatannnnn_ak_100') : null,
				'asuhan_keperawatannnnn_ak_101' => safe_post('asuhan_keperawatannnnn_ak_101') !== '' ? safe_post('asuhan_keperawatannnnn_ak_101') : null,
				'asuhan_keperawatannnnn_ak_102' => safe_post('asuhan_keperawatannnnn_ak_102') !== '' ? safe_post('asuhan_keperawatannnnn_ak_102') : null,
				'asuhan_keperawatannnnn_ak_103' => safe_post('asuhan_keperawatannnnn_ak_103') !== '' ? safe_post('asuhan_keperawatannnnn_ak_103') : null,
				'asuhan_keperawatannnnn_ak_104' => safe_post('asuhan_keperawatannnnn_ak_104') !== '' ? safe_post('asuhan_keperawatannnnn_ak_104') : null,
				'asuhan_keperawatannnnn_ak_105' => safe_post('asuhan_keperawatannnnn_ak_105') !== '' ? safe_post('asuhan_keperawatannnnn_ak_105') : null,
				'asuhan_keperawatannnnn_ak_106' => safe_post('asuhan_keperawatannnnn_ak_106') !== '' ? safe_post('asuhan_keperawatannnnn_ak_106') : null,
			]),

			'perawwat_ruangan_prr' 		=> safe_post('perawwat_ruangan_prr') !== '' ? safe_post('perawwat_ruangan_prr') : NULL,
			'perawwat_anastesi_paa' 	=> safe_post('perawwat_anastesi_paa') !== '' ? safe_post('perawwat_anastesi_paa') : NULL,
			'perawwat_kamar_bedahh' 	=> safe_post('perawwat_kamar_bedahh') !== '' ? safe_post('perawwat_kamar_bedahh') : NULL,

			'catatan_keperawatan_sesudah_operasi' => json_encode([
				'catatan_keperawatan_sesudah_operasi_1' => safe_post('catatan_keperawatan_sesudah_operasi_1') !== '' ? safe_post('catatan_keperawatan_sesudah_operasi_1') : null,
				'catatan_keperawatan_sesudah_operasi_2' => safe_post('catatan_keperawatan_sesudah_operasi_2') !== '' ? safe_post('catatan_keperawatan_sesudah_operasi_2') : null,
				'catatan_keperawatan_sesudah_operasi_3' => safe_post('catatan_keperawatan_sesudah_operasi_3') !== '' ? safe_post('catatan_keperawatan_sesudah_operasi_3') : null,
				'catatan_keperawatan_sesudah_operasi_4' => safe_post('catatan_keperawatan_sesudah_operasi_4') !== '' ? safe_post('catatan_keperawatan_sesudah_operasi_4') : null,
				'catatan_keperawatan_sesudah_operasi_5' => safe_post('catatan_keperawatan_sesudah_operasi_5') !== '' ? safe_post('catatan_keperawatan_sesudah_operasi_5') : null,
			]),

			'catatan_keperawatan_sesudah_op' => json_encode([
				'catatan_keperawatan_sesudah_op_1' => safe_post('catatan_keperawatan_sesudah_op_1') !== '' ? safe_post('catatan_keperawatan_sesudah_op_1') : null,
				'catatan_keperawatan_sesudah_op_2' => safe_post('catatan_keperawatan_sesudah_op_2') !== '' ? safe_post('catatan_keperawatan_sesudah_op_2') : null,
				'catatan_keperawatan_sesudah_op_3' => safe_post('catatan_keperawatan_sesudah_op_3') !== '' ? safe_post('catatan_keperawatan_sesudah_op_3') : null,
				'catatan_keperawatan_sesudah_op_4' => safe_post('catatan_keperawatan_sesudah_op_4') !== '' ? safe_post('catatan_keperawatan_sesudah_op_4') : null,
				'catatan_keperawatan_sesudah_op_5' => safe_post('catatan_keperawatan_sesudah_op_5') !== '' ? safe_post('catatan_keperawatan_sesudah_op_5') : null,
				'catatan_keperawatan_sesudah_op_6' => safe_post('catatan_keperawatan_sesudah_op_6') !== '' ? safe_post('catatan_keperawatan_sesudah_op_6') : null,
				'catatan_keperawatan_sesudah_op_7' => safe_post('catatan_keperawatan_sesudah_op_7') !== '' ? safe_post('catatan_keperawatan_sesudah_op_7') : null,
				'catatan_keperawatan_sesudah_op_8' => safe_post('catatan_keperawatan_sesudah_op_8') !== '' ? safe_post('catatan_keperawatan_sesudah_op_8') : null,
				'catatan_keperawatan_sesudah_op_9' => safe_post('catatan_keperawatan_sesudah_op_9') !== '' ? safe_post('catatan_keperawatan_sesudah_op_9') : null,
				'catatan_keperawatan_sesudah_op_10' => safe_post('catatan_keperawatan_sesudah_op_10') !== '' ? safe_post('catatan_keperawatan_sesudah_op_10') : null,
				'catatan_keperawatan_sesudah_op_11' => safe_post('catatan_keperawatan_sesudah_op_11') !== '' ? safe_post('catatan_keperawatan_sesudah_op_11') : null,
				'catatan_keperawatan_sesudah_op_12' => safe_post('catatan_keperawatan_sesudah_op_12') !== '' ? safe_post('catatan_keperawatan_sesudah_op_12') : null,
				'catatan_keperawatan_sesudah_op_13' => safe_post('catatan_keperawatan_sesudah_op_13') !== '' ? safe_post('catatan_keperawatan_sesudah_op_13') : null,
				'catatan_keperawatan_sesudah_op_14' => safe_post('catatan_keperawatan_sesudah_op_14') !== '' ? safe_post('catatan_keperawatan_sesudah_op_14') : null,
				'catatan_keperawatan_sesudah_op_15' => safe_post('catatan_keperawatan_sesudah_op_15') !== '' ? safe_post('catatan_keperawatan_sesudah_op_15') : null,
				'catatan_keperawatan_sesudah_op_16' => safe_post('catatan_keperawatan_sesudah_op_16') !== '' ? safe_post('catatan_keperawatan_sesudah_op_16') : null,
				'catatan_keperawatan_sesudah_op_17' => safe_post('catatan_keperawatan_sesudah_op_17') !== '' ? safe_post('catatan_keperawatan_sesudah_op_17') : null,
				'catatan_keperawatan_sesudah_op_18' => safe_post('catatan_keperawatan_sesudah_op_18') !== '' ? safe_post('catatan_keperawatan_sesudah_op_18') : null,
				'catatan_keperawatan_sesudah_op_19' => safe_post('catatan_keperawatan_sesudah_op_19') !== '' ? safe_post('catatan_keperawatan_sesudah_op_19') : null,
				'catatan_keperawatan_sesudah_op_20' => safe_post('catatan_keperawatan_sesudah_op_20') !== '' ? safe_post('catatan_keperawatan_sesudah_op_20') : null,
				'catatan_keperawatan_sesudah_op_21' => safe_post('catatan_keperawatan_sesudah_op_21') !== '' ? safe_post('catatan_keperawatan_sesudah_op_21') : null,
				'catatan_keperawatan_sesudah_op_22' => safe_post('catatan_keperawatan_sesudah_op_22') !== '' ? safe_post('catatan_keperawatan_sesudah_op_22') : null,
				'catatan_keperawatan_sesudah_op_23' => safe_post('catatan_keperawatan_sesudah_op_23') !== '' ? safe_post('catatan_keperawatan_sesudah_op_23') : null,
				'catatan_keperawatan_sesudah_op_24' => safe_post('catatan_keperawatan_sesudah_op_24') !== '' ? safe_post('catatan_keperawatan_sesudah_op_24') : null,
				'catatan_keperawatan_sesudah_op_25' => safe_post('catatan_keperawatan_sesudah_op_25') !== '' ? safe_post('catatan_keperawatan_sesudah_op_25') : null,
				'catatan_keperawatan_sesudah_op_26' => safe_post('catatan_keperawatan_sesudah_op_26') !== '' ? safe_post('catatan_keperawatan_sesudah_op_26') : null,
				'catatan_keperawatan_sesudah_op_27' => safe_post('catatan_keperawatan_sesudah_op_27') !== '' ? safe_post('catatan_keperawatan_sesudah_op_27') : null,
				'catatan_keperawatan_sesudah_op_28' => safe_post('catatan_keperawatan_sesudah_op_28') !== '' ? safe_post('catatan_keperawatan_sesudah_op_28') : null,
				'catatan_keperawatan_sesudah_op_29' => safe_post('catatan_keperawatan_sesudah_op_29') !== '' ? safe_post('catatan_keperawatan_sesudah_op_29') : null,
				'catatan_keperawatan_sesudah_op_30' => safe_post('catatan_keperawatan_sesudah_op_30') !== '' ? safe_post('catatan_keperawatan_sesudah_op_30') : null,
				'catatan_keperawatan_sesudah_op_31' => safe_post('catatan_keperawatan_sesudah_op_31') !== '' ? safe_post('catatan_keperawatan_sesudah_op_31') : null,
				'catatan_keperawatan_sesudah_op_32' => safe_post('catatan_keperawatan_sesudah_op_32') !== '' ? safe_post('catatan_keperawatan_sesudah_op_32') : null,
				'catatan_keperawatan_sesudah_op_33' => safe_post('catatan_keperawatan_sesudah_op_33') !== '' ? safe_post('catatan_keperawatan_sesudah_op_33') : null,
				'catatan_keperawatan_sesudah_op_34' => safe_post('catatan_keperawatan_sesudah_op_34') !== '' ? safe_post('catatan_keperawatan_sesudah_op_34') : null,
				'catatan_keperawatan_sesudah_op_35' => safe_post('catatan_keperawatan_sesudah_op_35') !== '' ? safe_post('catatan_keperawatan_sesudah_op_35') : null,
				'catatan_keperawatan_sesudah_op_36' => safe_post('catatan_keperawatan_sesudah_op_36') !== '' ? safe_post('catatan_keperawatan_sesudah_op_36') : null,
				'catatan_keperawatan_sesudah_op_37' => safe_post('catatan_keperawatan_sesudah_op_37') !== '' ? safe_post('catatan_keperawatan_sesudah_op_37') : null,
				'catatan_keperawatan_sesudah_op_38' => safe_post('catatan_keperawatan_sesudah_op_38') !== '' ? safe_post('catatan_keperawatan_sesudah_op_38') : null,
				'catatan_keperawatan_sesudah_op_39' => safe_post('catatan_keperawatan_sesudah_op_39') !== '' ? safe_post('catatan_keperawatan_sesudah_op_39') : null,
				'catatan_keperawatan_sesudah_op_40' => safe_post('catatan_keperawatan_sesudah_op_40') !== '' ? safe_post('catatan_keperawatan_sesudah_op_40') : null,
				'catatan_keperawatan_sesudah_op_40' => safe_post('catatan_keperawatan_sesudah_op_40') !== '' ? safe_post('catatan_keperawatan_sesudah_op_40') : null,
				'catatan_keperawatan_sesudah_op_42' => safe_post('catatan_keperawatan_sesudah_op_42') !== '' ? safe_post('catatan_keperawatan_sesudah_op_42') : null,
				'catatan_keperawatan_sesudah_op_43' => safe_post('catatan_keperawatan_sesudah_op_43') !== '' ? safe_post('catatan_keperawatan_sesudah_op_43') : null,
				'catatan_keperawatan_sesudah_op_44' => safe_post('catatan_keperawatan_sesudah_op_44') !== '' ? safe_post('catatan_keperawatan_sesudah_op_44') : null,
			]),

			'ceklis_persiapan_operasi' => json_encode([
				'ceklis_persiapan_operasi_1' => safe_post('ceklis_persiapan_operasi_1') !== '' ? safe_post('ceklis_persiapan_operasi_1') : null,
				'ceklis_persiapan_operasi_2' => safe_post('ceklis_persiapan_operasi_2') !== '' ? safe_post('ceklis_persiapan_operasi_2') : null,
				'ceklis_persiapan_operasi_3' => safe_post('ceklis_persiapan_operasi_3') !== '' ? safe_post('ceklis_persiapan_operasi_3') : null,
				'ceklis_persiapan_operasi_4' => safe_post('ceklis_persiapan_operasi_4') !== '' ? safe_post('ceklis_persiapan_operasi_4') : null,
				'ceklis_persiapan_operasi_5' => safe_post('ceklis_persiapan_operasi_5') !== '' ? safe_post('ceklis_persiapan_operasi_5') : null,
				'ceklis_persiapan_operasi_6' => safe_post('ceklis_persiapan_operasi_6') !== '' ? safe_post('ceklis_persiapan_operasi_6') : null,
				'ceklis_persiapan_operasi_7' => safe_post('ceklis_persiapan_operasi_7') !== '' ? safe_post('ceklis_persiapan_operasi_7') : null,
				'ceklis_persiapan_operasi_8' => safe_post('ceklis_persiapan_operasi_8') !== '' ? safe_post('ceklis_persiapan_operasi_8') : null,
				'ceklis_persiapan_operasi_9' => safe_post('ceklis_persiapan_operasi_9') !== '' ? safe_post('ceklis_persiapan_operasi_9') : null,
				'ceklis_persiapan_operasi_10' => safe_post('ceklis_persiapan_operasi_10') !== '' ? safe_post('ceklis_persiapan_operasi_10') : null,
				'ceklis_persiapan_operasi_11' => safe_post('ceklis_persiapan_operasi_11') !== '' ? safe_post('ceklis_persiapan_operasi_11') : null,
				'ceklis_persiapan_operasi_12' => safe_post('ceklis_persiapan_operasi_12') !== '' ? safe_post('ceklis_persiapan_operasi_12') : null,
				'ceklis_persiapan_operasi_13' => safe_post('ceklis_persiapan_operasi_13') !== '' ? safe_post('ceklis_persiapan_operasi_13') : null,
				'ceklis_persiapan_operasi_14' => safe_post('ceklis_persiapan_operasi_14') !== '' ? safe_post('ceklis_persiapan_operasi_14') : null,
				'ceklis_persiapan_operasi_15' => safe_post('ceklis_persiapan_operasi_15') !== '' ? safe_post('ceklis_persiapan_operasi_15') : null,
				'ceklis_persiapan_operasi_16' => safe_post('ceklis_persiapan_operasi_16') !== '' ? safe_post('ceklis_persiapan_operasi_16') : null,
			]),

			'ceklis_persiapan_operasii' => json_encode([
				'ceklis_persiapan_operasii_1' => safe_post('ceklis_persiapan_operasii_1') !== '' ? safe_post('ceklis_persiapan_operasii_1') : null,
				'ceklis_persiapan_operasii_2' => safe_post('ceklis_persiapan_operasii_2') !== '' ? safe_post('ceklis_persiapan_operasii_2') : null,
				'ceklis_persiapan_operasii_3' => safe_post('ceklis_persiapan_operasii_3') !== '' ? safe_post('ceklis_persiapan_operasii_3') : null,
				'ceklis_persiapan_operasii_4' => safe_post('ceklis_persiapan_operasii_4') !== '' ? safe_post('ceklis_persiapan_operasii_4') : null,
				'ceklis_persiapan_operasii_5' => safe_post('ceklis_persiapan_operasii_5') !== '' ? safe_post('ceklis_persiapan_operasii_5') : null,
				'ceklis_persiapan_operasii_6' => safe_post('ceklis_persiapan_operasii_6') !== '' ? safe_post('ceklis_persiapan_operasii_6') : null,
				'ceklis_persiapan_operasii_7' => safe_post('ceklis_persiapan_operasii_7') !== '' ? safe_post('ceklis_persiapan_operasii_7') : null,
				'ceklis_persiapan_operasii_8' => safe_post('ceklis_persiapan_operasii_8') !== '' ? safe_post('ceklis_persiapan_operasii_8') : null,
				'ceklis_persiapan_operasii_9' => safe_post('ceklis_persiapan_operasii_9') !== '' ? safe_post('ceklis_persiapan_operasii_9') : null,
				'ceklis_persiapan_operasii_10' => safe_post('ceklis_persiapan_operasii_10') !== '' ? safe_post('ceklis_persiapan_operasii_10') : null,
				'ceklis_persiapan_operasii_11' => safe_post('ceklis_persiapan_operasii_11') !== '' ? safe_post('ceklis_persiapan_operasii_11') : null,
				'ceklis_persiapan_operasii_12' => safe_post('ceklis_persiapan_operasii_12') !== '' ? safe_post('ceklis_persiapan_operasii_12') : null,
				'ceklis_persiapan_operasii_13' => safe_post('ceklis_persiapan_operasii_13') !== '' ? safe_post('ceklis_persiapan_operasii_13') : null,
				'ceklis_persiapan_operasii_14' => safe_post('ceklis_persiapan_operasii_14') !== '' ? safe_post('ceklis_persiapan_operasii_14') : null,
				'ceklis_persiapan_operasii_15' => safe_post('ceklis_persiapan_operasii_15') !== '' ? safe_post('ceklis_persiapan_operasii_15') : null,
				'ceklis_persiapan_operasii_16' => safe_post('ceklis_persiapan_operasii_16') !== '' ? safe_post('ceklis_persiapan_operasii_16') : null,
			]),

			'ceklis_persiapan_operasiii' => json_encode([
				'ceklis_persiapan_operasiii_1' => safe_post('ceklis_persiapan_operasiii_1') !== '' ? safe_post('ceklis_persiapan_operasiii_1') : null,
				'ceklis_persiapan_operasiii_2' => safe_post('ceklis_persiapan_operasiii_2') !== '' ? safe_post('ceklis_persiapan_operasiii_2') : null,
				'ceklis_persiapan_operasiii_3' => safe_post('ceklis_persiapan_operasiii_3') !== '' ? safe_post('ceklis_persiapan_operasiii_3') : null,
				'ceklis_persiapan_operasiii_4' => safe_post('ceklis_persiapan_operasiii_4') !== '' ? safe_post('ceklis_persiapan_operasiii_4') : null,
				'ceklis_persiapan_operasiii_5' => safe_post('ceklis_persiapan_operasiii_5') !== '' ? safe_post('ceklis_persiapan_operasiii_5') : null,
				'ceklis_persiapan_operasiii_6' => safe_post('ceklis_persiapan_operasiii_6') !== '' ? safe_post('ceklis_persiapan_operasiii_6') : null,
				'ceklis_persiapan_operasiii_7' => safe_post('ceklis_persiapan_operasiii_7') !== '' ? safe_post('ceklis_persiapan_operasiii_7') : null,
				'ceklis_persiapan_operasiii_8' => safe_post('ceklis_persiapan_operasiii_8') !== '' ? safe_post('ceklis_persiapan_operasiii_8') : null,
				'ceklis_persiapan_operasiii_9' => safe_post('ceklis_persiapan_operasiii_9') !== '' ? safe_post('ceklis_persiapan_operasiii_9') : null,
			]),

			'grafik_ckp' => safe_post('grafik_ckp') !== '' ? json_encode(json_decode(safe_post('grafik_ckp'))) : null,

			'keterangan_cpo' 		=> safe_post('keterangan_cpo') !== '' ? safe_post('keterangan_cpo') : NULL,
			'jam_cpo' => json_encode([
				'jam_cpo_1' => safe_post('jam_cpo_1') !== '' ? safe_post('jam_cpo_1') : null,
				'jam_cpo_2' => safe_post('jam_cpo_2') !== '' ? safe_post('jam_cpo_2') : null,
			]),
			'perawat_cpo' 		=> safe_post('perawat_cpo') !== '' ? safe_post('perawat_cpo') : NULL,
			'barang_cpo' 		=> safe_post('barang_cpo') !== '' ? safe_post('barang_cpo') : NULL,
			'perawatt_cpo' 		=> safe_post('perawatt_cpo') !== '' ? safe_post('perawatt_cpo') : NULL,
			'jam_tanggal_cpo'	=> (safe_post('jam_tanggal_cpo') !== '' ? datetime2mysql(safe_post('jam_tanggal_cpo')) : NULL),

			'asssuhan_keperawatan_ak_3' => json_encode([
				'asssuhan_keperawatannnnn_ak_1' => safe_post('asssuhan_keperawatannnnn_ak_1') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_1') : null,
				'asssuhan_keperawatannnnn_ak_2' => safe_post('asssuhan_keperawatannnnn_ak_2') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_2') : null,
				'asssuhan_keperawatannnnn_ak_3' => safe_post('asssuhan_keperawatannnnn_ak_3') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_3') : null,
				'asssuhan_keperawatannnnn_ak_4' => safe_post('asssuhan_keperawatannnnn_ak_4') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_4') : null,
				'asssuhan_keperawatannnnn_ak_5' => safe_post('asssuhan_keperawatannnnn_ak_5') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_5') : null,
				'asssuhan_keperawatannnnn_ak_6' => safe_post('asssuhan_keperawatannnnn_ak_6') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_6') : null,
				'asssuhan_keperawatannnnn_ak_7' => safe_post('asssuhan_keperawatannnnn_ak_7') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_7') : null,
				'asssuhan_keperawatannnnn_ak_8' => safe_post('asssuhan_keperawatannnnn_ak_8') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_8') : null,
				'asssuhan_keperawatannnnn_ak_9' => safe_post('asssuhan_keperawatannnnn_ak_9') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_9') : null,
				'asssuhan_keperawatannnnn_ak_10' => safe_post('asssuhan_keperawatannnnn_ak_10') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_10') : null,
				'asssuhan_keperawatannnnn_ak_11' => safe_post('asssuhan_keperawatannnnn_ak_11') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_11') : null,
				'asssuhan_keperawatannnnn_ak_12' => safe_post('asssuhan_keperawatannnnn_ak_12') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_12') : null,
				'asssuhan_keperawatannnnn_ak_13' => safe_post('asssuhan_keperawatannnnn_ak_13') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_13') : null,
				'asssuhan_keperawatannnnn_ak_14' => safe_post('asssuhan_keperawatannnnn_ak_14') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_14') : null,
				'asssuhan_keperawatannnnn_ak_15' => safe_post('asssuhan_keperawatannnnn_ak_15') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_15') : null,
				'asssuhan_keperawatannnnn_ak_16' => safe_post('asssuhan_keperawatannnnn_ak_16') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_16') : null,
				'asssuhan_keperawatannnnn_ak_17' => safe_post('asssuhan_keperawatannnnn_ak_17') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_17') : null,
				'asssuhan_keperawatannnnn_ak_18' => safe_post('asssuhan_keperawatannnnn_ak_18') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_18') : null,
				'asssuhan_keperawatannnnn_ak_19' => safe_post('asssuhan_keperawatannnnn_ak_19') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_19') : null,
				'asssuhan_keperawatannnnn_ak_20' => safe_post('asssuhan_keperawatannnnn_ak_20') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_20') : null,
				'asssuhan_keperawatannnnn_ak_21' => safe_post('asssuhan_keperawatannnnn_ak_21') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_21') : null,
				'asssuhan_keperawatannnnn_ak_22' => safe_post('asssuhan_keperawatannnnn_ak_22') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_22') : null,
				'asssuhan_keperawatannnnn_ak_23' => safe_post('asssuhan_keperawatannnnn_ak_23') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_23') : null,
				'asssuhan_keperawatannnnn_ak_24' => safe_post('asssuhan_keperawatannnnn_ak_24') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_24') : null,
				'asssuhan_keperawatannnnn_ak_25' => safe_post('asssuhan_keperawatannnnn_ak_25') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_25') : null,
				'asssuhan_keperawatannnnn_ak_26' => safe_post('asssuhan_keperawatannnnn_ak_26') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_26') : null,
				'asssuhan_keperawatannnnn_ak_27' => safe_post('asssuhan_keperawatannnnn_ak_27') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_27') : null,
				'asssuhan_keperawatannnnn_ak_28' => safe_post('asssuhan_keperawatannnnn_ak_28') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_28') : null,
				'asssuhan_keperawatannnnn_ak_29' => safe_post('asssuhan_keperawatannnnn_ak_29') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_29') : null,
				'asssuhan_keperawatannnnn_ak_30' => safe_post('asssuhan_keperawatannnnn_ak_30') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_30') : null,
				'asssuhan_keperawatannnnn_ak_31' => safe_post('asssuhan_keperawatannnnn_ak_31') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_31') : null,
				'asssuhan_keperawatannnnn_ak_32' => safe_post('asssuhan_keperawatannnnn_ak_32') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_32') : null,
				'asssuhan_keperawatannnnn_ak_33' => safe_post('asssuhan_keperawatannnnn_ak_33') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_33') : null,
				'asssuhan_keperawatannnnn_ak_34' => safe_post('asssuhan_keperawatannnnn_ak_34') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_34') : null,
				'asssuhan_keperawatannnnn_ak_35' => safe_post('asssuhan_keperawatannnnn_ak_35') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_35') : null,
				'asssuhan_keperawatannnnn_ak_36' => safe_post('asssuhan_keperawatannnnn_ak_36') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_36') : null,
				'asssuhan_keperawatannnnn_ak_37' => safe_post('asssuhan_keperawatannnnn_ak_37') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_37') : null,
				'asssuhan_keperawatannnnn_ak_38' => safe_post('asssuhan_keperawatannnnn_ak_38') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_38') : null,
				'asssuhan_keperawatannnnn_ak_39' => safe_post('asssuhan_keperawatannnnn_ak_39') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_39') : null,
				'asssuhan_keperawatannnnn_ak_40' => safe_post('asssuhan_keperawatannnnn_ak_40') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_40') : null,
				'asssuhan_keperawatannnnn_ak_41' => safe_post('asssuhan_keperawatannnnn_ak_41') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_41') : null,
				'asssuhan_keperawatannnnn_ak_42' => safe_post('asssuhan_keperawatannnnn_ak_42') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_42') : null,
				'asssuhan_keperawatannnnn_ak_43' => safe_post('asssuhan_keperawatannnnn_ak_43') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_43') : null,
				'asssuhan_keperawatannnnn_ak_44' => safe_post('asssuhan_keperawatannnnn_ak_44') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_44') : null,
				'asssuhan_keperawatannnnn_ak_45' => safe_post('asssuhan_keperawatannnnn_ak_45') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_45') : null,
				'asssuhan_keperawatannnnn_ak_46' => safe_post('asssuhan_keperawatannnnn_ak_46') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_46') : null,
				'asssuhan_keperawatannnnn_ak_47' => safe_post('asssuhan_keperawatannnnn_ak_47') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_47') : null,
				'asssuhan_keperawatannnnn_ak_48' => safe_post('asssuhan_keperawatannnnn_ak_48') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_48') : null,
				'asssuhan_keperawatannnnn_ak_49' => safe_post('asssuhan_keperawatannnnn_ak_49') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_49') : null,
				'asssuhan_keperawatannnnn_ak_50' => safe_post('asssuhan_keperawatannnnn_ak_50') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_50') : null,
				'asssuhan_keperawatannnnn_ak_51' => safe_post('asssuhan_keperawatannnnn_ak_51') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_51') : null,
				'asssuhan_keperawatannnnn_ak_52' => safe_post('asssuhan_keperawatannnnn_ak_52') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_52') : null,
				'asssuhan_keperawatannnnn_ak_53' => safe_post('asssuhan_keperawatannnnn_ak_53') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_53') : null,
				'asssuhan_keperawatannnnn_ak_54' => safe_post('asssuhan_keperawatannnnn_ak_54') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_54') : null,
				'asssuhan_keperawatannnnn_ak_55' => safe_post('asssuhan_keperawatannnnn_ak_55') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_55') : null,
				'asssuhan_keperawatannnnn_ak_56' => safe_post('asssuhan_keperawatannnnn_ak_56') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_56') : null,
				'asssuhan_keperawatannnnn_ak_57' => safe_post('asssuhan_keperawatannnnn_ak_57') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_57') : null,
				'asssuhan_keperawatannnnn_ak_58' => safe_post('asssuhan_keperawatannnnn_ak_58') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_58') : null,
				'asssuhan_keperawatannnnn_ak_59' => safe_post('asssuhan_keperawatannnnn_ak_59') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_59') : null,
				'asssuhan_keperawatannnnn_ak_60' => safe_post('asssuhan_keperawatannnnn_ak_60') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_60') : null,
				'asssuhan_keperawatannnnn_ak_61' => safe_post('asssuhan_keperawatannnnn_ak_61') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_61') : null,
				'asssuhan_keperawatannnnn_ak_62' => safe_post('asssuhan_keperawatannnnn_ak_62') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_62') : null,
				'asssuhan_keperawatannnnn_ak_63' => safe_post('asssuhan_keperawatannnnn_ak_63') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_63') : null,
				'asssuhan_keperawatannnnn_ak_64' => safe_post('asssuhan_keperawatannnnn_ak_64') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_64') : null,
				'asssuhan_keperawatannnnn_ak_65' => safe_post('asssuhan_keperawatannnnn_ak_65') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_65') : null,
				'asssuhan_keperawatannnnn_ak_66' => safe_post('asssuhan_keperawatannnnn_ak_66') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_66') : null,
				'asssuhan_keperawatannnnn_ak_67' => safe_post('asssuhan_keperawatannnnn_ak_67') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_67') : null,
				'asssuhan_keperawatannnnn_ak_68' => safe_post('asssuhan_keperawatannnnn_ak_68') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_68') : null,
				'asssuhan_keperawatannnnn_ak_69' => safe_post('asssuhan_keperawatannnnn_ak_69') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_69') : null,
				'asssuhan_keperawatannnnn_ak_70' => safe_post('asssuhan_keperawatannnnn_ak_70') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_70') : null,
				'asssuhan_keperawatannnnn_ak_71' => safe_post('asssuhan_keperawatannnnn_ak_71') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_71') : null,
				'asssuhan_keperawatannnnn_ak_72' => safe_post('asssuhan_keperawatannnnn_ak_72') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_72') : null,
				'asssuhan_keperawatannnnn_ak_73' => safe_post('asssuhan_keperawatannnnn_ak_73') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_73') : null,
				'asssuhan_keperawatannnnn_ak_74' => safe_post('asssuhan_keperawatannnnn_ak_74') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_74') : null,
				'asssuhan_keperawatannnnn_ak_75' => safe_post('asssuhan_keperawatannnnn_ak_75') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_75') : null,
				'asssuhan_keperawatannnnn_ak_76' => safe_post('asssuhan_keperawatannnnn_ak_76') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_76') : null,
				'asssuhan_keperawatannnnn_ak_77' => safe_post('asssuhan_keperawatannnnn_ak_77') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_77') : null,
				'asssuhan_keperawatannnnn_ak_78' => safe_post('asssuhan_keperawatannnnn_ak_78') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_78') : null,
				'asssuhan_keperawatannnnn_ak_79' => safe_post('asssuhan_keperawatannnnn_ak_79') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_79') : null,
				'asssuhan_keperawatannnnn_ak_80' => safe_post('asssuhan_keperawatannnnn_ak_80') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_80') : null,
				'asssuhan_keperawatannnnn_ak_81' => safe_post('asssuhan_keperawatannnnn_ak_81') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_81') : null,
				'asssuhan_keperawatannnnn_ak_82' => safe_post('asssuhan_keperawatannnnn_ak_82') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_82') : null,
				'asssuhan_keperawatannnnn_ak_83' => safe_post('asssuhan_keperawatannnnn_ak_83') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_83') : null,
				'asssuhan_keperawatannnnn_ak_84' => safe_post('asssuhan_keperawatannnnn_ak_84') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_84') : null,
				'asssuhan_keperawatannnnn_ak_85' => safe_post('asssuhan_keperawatannnnn_ak_85') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_85') : null,
				'asssuhan_keperawatannnnn_ak_86' => safe_post('asssuhan_keperawatannnnn_ak_86') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_86') : null,
				'asssuhan_keperawatannnnn_ak_87' => safe_post('asssuhan_keperawatannnnn_ak_87') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_87') : null,
				'asssuhan_keperawatannnnn_ak_88' => safe_post('asssuhan_keperawatannnnn_ak_88') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_88') : null,
				'asssuhan_keperawatannnnn_ak_89' => safe_post('asssuhan_keperawatannnnn_ak_89') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_89') : null,
				'asssuhan_keperawatannnnn_ak_90' => safe_post('asssuhan_keperawatannnnn_ak_90') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_90') : null,
				'asssuhan_keperawatannnnn_ak_91' => safe_post('asssuhan_keperawatannnnn_ak_91') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_91') : null,
				'asssuhan_keperawatannnnn_ak_92' => safe_post('asssuhan_keperawatannnnn_ak_92') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_92') : null,
				'asssuhan_keperawatannnnn_ak_93' => safe_post('asssuhan_keperawatannnnn_ak_93') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_93') : null,
				'asssuhan_keperawatannnnn_ak_94' => safe_post('asssuhan_keperawatannnnn_ak_94') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_94') : null,
				'asssuhan_keperawatannnnn_ak_95' => safe_post('asssuhan_keperawatannnnn_ak_95') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_95') : null,
				'asssuhan_keperawatannnnn_ak_96' => safe_post('asssuhan_keperawatannnnn_ak_96') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_96') : null,
				'asssuhan_keperawatannnnn_ak_97' => safe_post('asssuhan_keperawatannnnn_ak_97') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_97') : null,
				'asssuhan_keperawatannnnn_ak_98' => safe_post('asssuhan_keperawatannnnn_ak_98') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_98') : null,
				'asssuhan_keperawatannnnn_ak_99' => safe_post('asssuhan_keperawatannnnn_ak_99') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_99') : null,
				'asssuhan_keperawatannnnn_ak_100' => safe_post('asssuhan_keperawatannnnn_ak_100') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_100') : null,
				'asssuhan_keperawatannnnn_ak_101' => safe_post('asssuhan_keperawatannnnn_ak_101') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_101') : null,
				'asssuhan_keperawatannnnn_ak_102' => safe_post('asssuhan_keperawatannnnn_ak_102') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_102') : null,
				'asssuhan_keperawatannnnn_ak_103' => safe_post('asssuhan_keperawatannnnn_ak_103') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_103') : null,
				'asssuhan_keperawatannnnn_ak_104' => safe_post('asssuhan_keperawatannnnn_ak_104') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_104') : null,
				'asssuhan_keperawatannnnn_ak_105' => safe_post('asssuhan_keperawatannnnn_ak_105') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_105') : null,
				'asssuhan_keperawatannnnn_ak_106' => safe_post('asssuhan_keperawatannnnn_ak_106') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_106') : null,
				'asssuhan_keperawatannnnn_ak_107' => safe_post('asssuhan_keperawatannnnn_ak_107') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_107') : null,
				'asssuhan_keperawatannnnn_ak_108' => safe_post('asssuhan_keperawatannnnn_ak_108') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_108') : null,
				'asssuhan_keperawatannnnn_ak_109' => safe_post('asssuhan_keperawatannnnn_ak_109') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_109') : null,
				'asssuhan_keperawatannnnn_ak_110' => safe_post('asssuhan_keperawatannnnn_ak_110') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_110') : null,
				'asssuhan_keperawatannnnn_ak_111' => safe_post('asssuhan_keperawatannnnn_ak_111') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_111') : null,
				'asssuhan_keperawatannnnn_ak_112' => safe_post('asssuhan_keperawatannnnn_ak_112') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_112') : null,
			]),

			'perawwat_ruangan_sirkuler' 		=> safe_post('perawwat_ruangan_sirkuler') !== '' ? safe_post('perawwat_ruangan_sirkuler') : NULL,
			'perawwat_ruangan_prrr' 		=> safe_post('perawwat_ruangan_prrr') !== '' ? safe_post('perawwat_ruangan_prrr') : NULL,
			'perawwat_anastesi_paaa' 		=> safe_post('perawwat_anastesi_paaa') !== '' ? safe_post('perawwat_anastesi_paaa') : NULL,
			'perawwat_kamar_bedahhh' 		=> safe_post('perawwat_kamar_bedahhh') !== '' ? safe_post('perawwat_kamar_bedahhh') : NULL,

			// 'updated_date'                => date('Y-m-d H:i:s', time()),

			'updated_at'                => date('Y-m-d H:i:s', time()),
		);

    	// var_dump($catatanKeperawatanPerioperatif);die;
		$this->m_order_operasi->updateCatatanKeperawatanPerioperatif($catatanKeperawatanPerioperatif, $id_pendaftaran, $id_data_catatan_perioperatift);
		if (!empty($respon)) {
			$response = $respon;
		} else {
			$response = null;
		}
		if ($this->db->trans_status() === false) :
			$this->db->trans_rollback();
			$status = false;
		else :
			$this->db->trans_commit();
			$status = true;
		endif;
		$message = array(
			'status' => $status,
			'token'  => $this->security->get_csrf_hash(),
			'id_pendaftaran' => ('id_pendaftaran'),
			'id_layanan_pendaftaran' => ('id_layanan_pendaftaran'),
			'respon' => $response,
		);
		$this->response($message, REST_Controller::HTTP_OK);
	}


	// FODTI 1
	function get_data_formulir_observasi_IGD_get(){
		if (!$this->get('id')) :
			$this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
		endif;
		$data                            = $this->m_pendaftaran->getPendaftaranDetail($this->get('id', true), $this->get('id_layanan', true));
		$data['formulir_observasi_IGD']  = $this->m_order_operasi->getFormulirObservasiIGD($data['layanan']->id_pendaftaran);		
		if ($data) :
			$this->response($data, REST_Controller::HTTP_OK); // (200)
		endif;
	}

	// FODTI 2
	function simpan_data_formulir_observasi_IGD_post(){

		$id_users 						= safe_post('id_user');
		$layanan 						= array('id' => safe_post('id_layanan_pendaftaran')); 
		$formulir_date 					= safe_post('formulir_date');		
		// $fodti_tanggal_1 				= safe_post('fodti_tanggal_1');				
		// $fodti_tanggal_2 				= safe_post('fodti_tanggal_2');	
		$id_pendaftaran           		= safe_post('id_pendaftaran');   

		if (!empty($formulir_date)) {        
			$chek_detail_formulir_obvs_IGD = array(
				'id_pendaftaran'         	=> $id_pendaftaran,
				'id_layanan_pendaftaran' 	=> $layanan['id'],
				'id_user'                	=> safe_post('user_formulir') !== '' ? safe_post('user_formulir') : null,
				'tanggal_1_fodti'        	=> safe_post('tanggal_1_fodti') !== '' ? safe_post('tanggal_1_fodti') : null,
				'tanggal_2_fodti'  			=> safe_post('tanggal_2_fodti')  !== '' ? safe_post('tanggal_2_fodti') : NULL,
				'jam_1_fodti'  				=> safe_post('jam_1_fodti')  !== '' ? safe_post('jam_1_fodti') : NULL,
				'bismilah_fodti'  			=> safe_post('bismilah_fodti')  !== '' ? safe_post('bismilah_fodti') : NULL,
				'td_s_fodti'  				=> safe_post('td_s_fodti')  !== '' ? safe_post('td_s_fodti') : NULL,
				'td_d_fodti'  				=> safe_post('td_d_fodti')  !== '' ? safe_post('td_d_fodti') : NULL,
				'nadi_fodti'  				=> safe_post('nadi_fodti')  !== '' ? safe_post('nadi_fodti') : NULL,
				'rr_fodti'  				=> safe_post('rr_fodti')  !== '' ? safe_post('rr_fodti') : NULL,
				'suhu_fodti'  				=> safe_post('suhu_fodti')  !== '' ? safe_post('suhu_fodti') : NULL,
				'sat_o2_fodti'  			=> safe_post('sat_o2_fodti')  !== '' ? safe_post('sat_o2_fodti') : NULL,
				'kategori_fodti'  			=> safe_post('kategori_fodti')  !== '' ? safe_post('kategori_fodti') : NULL,
				'skala_fodti'  				=> safe_post('skala_fodti')  !== '' ? safe_post('skala_fodti') : NULL,
				'resiko_fodti'  			=> safe_post('resiko_fodti')  !== '' ? safe_post('resiko_fodti') : NULL,
				'kesadaran_fodti'  			=> safe_post('kesadaran_fodti')  !== '' ? safe_post('kesadaran_fodti') : NULL,
				'gcs_e_fodti'  				=> safe_post('gcs_e_fodti')  !== '' ? safe_post('gcs_e_fodti') : NULL,
				'gcs_m_fodti'  				=> safe_post('gcs_m_fodti')  !== '' ? safe_post('gcs_m_fodti') : NULL,
				'gcs_v_fodti'  				=> safe_post('gcs_v_fodti')  !== '' ? safe_post('gcs_v_fodti') : NULL,
				'total_gcs_fodti'  			=> safe_post('total_gcs_fodti')  !== '' ? safe_post('total_gcs_fodti') : NULL,
				'pupil_kanan_fodti'  		=> safe_post('pupil_kanan_fodti')  !== '' ? safe_post('pupil_kanan_fodti') : NULL,
				'pupil_kiri_fodti'  		=> safe_post('pupil_kiri_fodti')  !== '' ? safe_post('pupil_kiri_fodti') : NULL,
				'pemeriksaan_fodti'  		=> safe_post('pemeriksaan_fodti')  !== '' ? safe_post('pemeriksaan_fodti') : NULL,
				'jam_2_fodti'  				=> safe_post('jam_2_fodti')  !== '' ? safe_post('jam_2_fodti') : NULL,
				'implementasi_fodti'  		=> safe_post('implementasi_fodti')  !== '' ? safe_post('implementasi_fodti') : NULL,
				'alhamdulilah_fodti'  		=> safe_post('alhamdulilah_fodti')  !== '' ? safe_post('alhamdulilah_fodti') : NULL,
				'ttd_fodti'  				=> safe_post('ttd_fodti')  !== '' ? safe_post('ttd_fodti') : NULL,
				'perawat_fodti'  			=> safe_post('perawat_fodti')  !== '' ? safe_post('perawat_fodti') : NULL,					
				'date_created'      		=> safe_post('formulir_date') !== '' ? safe_post('formulir_date') : null,
			);       
			//  var_dump($chek_detail_formulir_obvs_IGD);die;    
			$this->m_order_operasi->insertFormulirObservasiIGD($chek_detail_formulir_obvs_IGD);            
		}
		if (!empty($respon)) {
			$response = $respon;
		} else {
			$response = null;
		}
		if ($this->db->trans_status() === false) :
			$this->db->trans_rollback();
			$status = false;
		else :
			$this->db->trans_commit();
			$status = true;
		endif;

		$message = array(
			'status' => $status,
			'token'  => $this->security->get_csrf_hash(),
			'id_pendaftaran' => ('id_pendaftaran'),
			'id_layanan_pendaftaran' => ('id_layanan_pendaftaran'),
			'respon' => $response,
		);
		$this->response($message, REST_Controller::HTTP_OK);
	}

	// FODTI 3
	function hapus_formulir_observasi_IGD_delete($id){
		$status = $this->m_order_operasi->deleteFormulirObservasiIGD($id);
		if ($status) :
			$response = array('status' => $status, 'message' => 'Berhasil menghapus Formulir Observasi IGD!');
		else :
			$response = array('status' => $status, 'message' => 'Gagal menghapus Formulir Observasi IGD!');
		endif;
		$this->response($response, REST_Controller::HTTP_OK);
	}

	// FODTI 4
	function get_formulir_observasi_igd_get(){
		if (!$this->get('id', true)) :
			$this->response(null, REST_Controller::HTTP_BAD_REQUEST);
		endif;
		$data = $this->m_order_operasi->getFormulirObservasiIGDByID($this->get('id', true));
		$this->response($data, REST_Controller::HTTP_OK);
	}

	// FODTI 5
	function update_formulir_observasi_igd_put(){
		if (!$this->put('id', true)) :
			$this->response(array('status' => false), REST_Controller::HTTP_OK);
		endif;

		$tanggal_1_fodti = $this->put('tanggal_1_fodti', true);
		$tanggal_1_fodti = str_replace('/', '-', $tanggal_1_fodti);
		$tanggal_1_fodti = date('Y-m-d', strtotime($tanggal_1_fodti));

		$tanggal_2_fodti = $this->put('tanggal_2_fodti', true);
		$tanggal_2_fodti = str_replace('/', '-', $tanggal_2_fodti);
		$tanggal_2_fodti = date('Y-m-d', strtotime($tanggal_2_fodti));

		$jam_1_fodti       		= $this->put('jam_1_fodti', true);
		$bismilah_fodti       	= $this->put('bismilah_fodti', true);
		$td_s_fodti       		= $this->put('td_s_fodti', true);
		$td_d_fodti       		= $this->put('td_d_fodti', true);
		$nadi_fodti       		= $this->put('nadi_fodti', true);
		$rr_fodti       		= $this->put('rr_fodti', true);
		$suhu_fodti       		= $this->put('suhu_fodti', true);
		$sat_o2_fodti       	= $this->put('sat_o2_fodti', true);
		$kategori_fodti       	= $this->put('kategori_fodti', true);
		$skala_fodti       		= $this->put('skala_fodti', true);
		$resiko_fodti       	= $this->put('resiko_fodti', true);
		$kesadaran_fodti       	= $this->put('kesadaran_fodti', true);
		$gcs_e_fodti       		= $this->put('gcs_e_fodti', true);
		$gcs_m_fodti       		= $this->put('gcs_m_fodti', true);
		$gcs_v_fodti       		= $this->put('gcs_v_fodti', true);
		$total_gcs_fodti       	= $this->put('total_gcs_fodti', true);
		$pupil_kanan_fodti      = $this->put('pupil_kanan_fodti', true);
		$pupil_kiri_fodti       = $this->put('pupil_kiri_fodti', true);
		$pemeriksaan_fodti      = $this->put('pemeriksaan_fodti', true);
		$jam_2_fodti       		= $this->put('jam_2_fodti', true);
		$implementasi_fodti     = $this->put('implementasi_fodti', true);
		$alhamdulilah_fodti     = $this->put('alhamdulilah_fodti', true);
		$ttd_fodti       		= $this->put('ttd_fodti', true);
		$perawat_fodti       	= $this->put('perawat_fodti', true);
		$data = array(
			'id'                 	=> $this->put('id', true),
			'tanggal_1_fodti'    	=> $tanggal_1_fodti,
			'tanggal_2_fodti'    	=> $tanggal_2_fodti,
			'jam_1_fodti'       	=> $jam_1_fodti !== '' ? $jam_1_fodti : null,					
			'bismilah_fodti'       	=> $bismilah_fodti !== '' ? $bismilah_fodti : null,					
			'td_s_fodti'       		=> $td_s_fodti !== '' ? $td_s_fodti : null,					
			'td_d_fodti'       		=> $td_d_fodti !== '' ? $td_d_fodti : null,					
			'nadi_fodti'       		=> $nadi_fodti !== '' ? $nadi_fodti : null,					
			'rr_fodti'       		=> $rr_fodti !== '' ? $rr_fodti : null,					
			'suhu_fodti'       		=> $suhu_fodti !== '' ? $suhu_fodti : null,					
			'sat_o2_fodti'       	=> $sat_o2_fodti !== '' ? $sat_o2_fodti : null,					
			'kategori_fodti'       	=> $kategori_fodti !== '' ? $kategori_fodti : null,					
			'skala_fodti'       	=> $skala_fodti !== '' ? $skala_fodti : null,					
			'resiko_fodti'       	=> $resiko_fodti !== '' ? $resiko_fodti : null,					
			'kesadaran_fodti'       => $kesadaran_fodti !== '' ? $kesadaran_fodti : null,					
			'gcs_e_fodti'       	=> $gcs_e_fodti !== '' ? $gcs_e_fodti : null,					
			'gcs_m_fodti'       	=> $gcs_m_fodti !== '' ? $gcs_m_fodti : null,					
			'gcs_v_fodti'       	=> $gcs_v_fodti !== '' ? $gcs_v_fodti : null,					
			'total_gcs_fodti'       => $total_gcs_fodti !== '' ? $total_gcs_fodti : null,					
			'pupil_kanan_fodti'     => $pupil_kanan_fodti !== '' ? $pupil_kanan_fodti : null,					
			'pupil_kiri_fodti'      => $pupil_kiri_fodti !== '' ? $pupil_kiri_fodti : null,					
			'pemeriksaan_fodti'     => $pemeriksaan_fodti !== '' ? $pemeriksaan_fodti : null,					
			'jam_2_fodti'       	=> $jam_2_fodti !== '' ? $jam_2_fodti : null,					
			'implementasi_fodti'    => $implementasi_fodti !== '' ? $implementasi_fodti : null,					
			'alhamdulilah_fodti'    => $alhamdulilah_fodti !== '' ? $alhamdulilah_fodti : null,					
			'ttd_fodti'    			=> $ttd_fodti !== '' ? $ttd_fodti : null,					
			'perawat_fodti'       	=> $perawat_fodti !== '' ? $perawat_fodti : null,					
			'updated_at'            => date('Y-m-d H:i:s', time()),			
		);
		// var_dump($data);die;
		$status = $this->m_order_operasi->editFormulirObservasiIGD($data);
		$this->response(array('status' => $status), REST_Controller::HTTP_OK);
	}

	// AAAS_BARU 
	function get_data_asesment_anestesi_sedasi_get(){
		if (!$this->get('id')) :
			$this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
		endif;	
		$data = $this->m_pendaftaran->getPendaftaranDetail($this->get('id', true), $this->get('id_layanan', true));
		$data['assesmen_awal_anestesi_sedasi']  = $this->m_order_operasi->getAssesmenAwalAnestesiSedasi($data['layanan']->id_pendaftaran);	
		if ($data) :
			$this->response($data, REST_Controller::HTTP_OK); // (200)
		endif;
	}

	// AAAS_BARU
	function get_aaasB_get(){
		if (!$this->get('id', true)) :
			$this->response(null, REST_Controller::HTTP_BAD_REQUEST);
		endif;
		$data = $this->m_order_operasi->getAssesmenAwalAnestesiSedasi($this->get('id', true));
		$this->response($data, REST_Controller::HTTP_OK);
	}

	// AAAS_BARU
	function simpan_asesment_anestesi_sedasi_post(){
		$layanan = array('id' => safe_post('id_layanan_pendaftaran'));

		// var_dump($layanan);die;

		$this->db->trans_begin();

		$data_aaas = array(
			'id_layanan_pendaftaran' => $layanan['id'],
			'id_pendaftaran'       	 => safe_post('id_pendaftaran'),
			'id_users'       	 	 => $this->session->userdata('id_translucent'),
			'id_aaasB' 				 => safe_post('id_aaasB'),

			'aaas_diagnosis' 		=> safe_post('aaas_diagnosis') !== '' ? safe_post('aaas_diagnosis') : NULL,
			'aaas_rot' 				=> safe_post('aaas_rot') !== '' ? safe_post('aaas_rot') : NULL,
			'aaas_perawat' 			=> safe_post('aaas_perawat') !== '' ? safe_post('aaas_perawat') : NULL,


			'aaas_anamnesa' => json_encode([
				'aaas_anamnesa' => safe_post('aaas_anamnesa') !== '' ? safe_post('aaas_anamnesa') : null,
				'aaas_anamnesa' => safe_post('aaas_anamnesa') !== '' ? safe_post('aaas_anamnesa') : null,
				'aaas_anamnesa' => safe_post('aaas_anamnesa') !== '' ? safe_post('aaas_anamnesa') : null,
				'aaas_anamnesa_4' => safe_post('aaas_anamnesa_4') !== '' ? safe_post('aaas_anamnesa_4') : null,
			]),

			'aaas_riwayat_anestesi' => json_encode([
				'aaas_riwayat_anestesi' => safe_post('aaas_riwayat_anestesi') !== '' ? safe_post('aaas_riwayat_anestesi') : null,
				'aaas_riwayat_anestesi' => safe_post('aaas_riwayat_anestesi') !== '' ? safe_post('aaas_riwayat_anestesi') : null,
				'aaas_riwayat_anestesi' => safe_post('aaas_riwayat_anestesi') !== '' ? safe_post('aaas_riwayat_anestesi') : null,
				'aaas_riwayat_anestesi_4' => safe_post('aaas_riwayat_anestesi_4') !== '' ? safe_post('aaas_riwayat_anestesi_4') : null,
			]),

			'aaas_komplikasi' => json_encode([
				'aaas_komplikasi' => safe_post('aaas_komplikasi') !== '' ? safe_post('aaas_komplikasi') : null,
				'aaas_komplikasi' => safe_post('aaas_komplikasi') !== '' ? safe_post('aaas_komplikasi') : null,
				'aaas_komplikasi' => safe_post('aaas_komplikasi') !== '' ? safe_post('aaas_komplikasi') : null,
				'aaas_komplikasi_4' => safe_post('aaas_komplikasi_4') !== '' ? safe_post('aaas_komplikasi_4') : null,
			]),

			'aaas_konsumsi_obat' 					=> safe_post('aaas_konsumsi_obat') !== '' ? safe_post('aaas_konsumsi_obat') : NULL,

			'aaas_riwayat_alergi' => json_encode([
				'aaas_riwayat_alergi' => safe_post('aaas_riwayat_alergi') !== '' ? safe_post('aaas_riwayat_alergi') : null,
				'aaas_riwayat_alergi' => safe_post('aaas_riwayat_alergi') !== '' ? safe_post('aaas_riwayat_alergi') : null,
				'aaas_riwayat_alergi' => safe_post('aaas_riwayat_alergi') !== '' ? safe_post('aaas_riwayat_alergi') : null,
				'aaas_riwayat_alergi_4' => safe_post('aaas_riwayat_alergi_4') !== '' ? safe_post('aaas_riwayat_alergi_4') : null,
			]),

			'aaas_tanda' 	=> safe_post('aaas_tanda') !== '' ? safe_post('aaas_tanda') : NULL,

			'aaas_berat' => json_encode([
				'aaas_berat_1' => safe_post('aaas_berat_1') !== '' ? safe_post('aaas_berat_1') : null,
				'aaas_berat_2' => safe_post('aaas_berat_2') !== '' ? safe_post('aaas_berat_2') : null,
				'aaas_berat_3' => safe_post('aaas_berat_3') !== '' ? safe_post('aaas_berat_3') : null,
				'aaas_berat_4' => safe_post('aaas_berat_4') !== '' ? safe_post('aaas_berat_4') : null,
				'aaas_berat_5' => safe_post('aaas_berat_5') !== '' ? safe_post('aaas_berat_5') : null,
				'aaas_berat_6' => safe_post('aaas_berat_6') !== '' ? safe_post('aaas_berat_6') : null,
			]),

			'aaas_skor_nyeri' => json_encode([
				'aaas_skor_nyeri' => safe_post('aaas_skor_nyeri') !== '' ? safe_post('aaas_skor_nyeri') : null,
				'aaas_skor_nyeri' => safe_post('aaas_skor_nyeri') !== '' ? safe_post('aaas_skor_nyeri') : null,
				'aaas_skor_nyeri' => safe_post('aaas_skor_nyeri') !== '' ? safe_post('aaas_skor_nyeri') : null,
				'aaas_skor_nyeri' => safe_post('aaas_skor_nyeri') !== '' ? safe_post('aaas_skor_nyeri') : null,
				'aaas_skor_nyeri' => safe_post('aaas_skor_nyeri') !== '' ? safe_post('aaas_skor_nyeri') : null,
				'aaas_skor_nyeri' => safe_post('aaas_skor_nyeri') !== '' ? safe_post('aaas_skor_nyeri') : null,
				'aaas_skor_nyeri' => safe_post('aaas_skor_nyeri') !== '' ? safe_post('aaas_skor_nyeri') : null,
				'aaas_skor_nyeri' => safe_post('aaas_skor_nyeri') !== '' ? safe_post('aaas_skor_nyeri') : null,
				'aaas_skor_nyeri' => safe_post('aaas_skor_nyeri') !== '' ? safe_post('aaas_skor_nyeri') : null,
				'aaas_skor_nyeri' => safe_post('aaas_skor_nyeri') !== '' ? safe_post('aaas_skor_nyeri') : null,

			]),

			'aaas_evaluasi' => json_encode([
				'aaas_evaluasi_1' => safe_post('aaas_evaluasi_1') !== '' ? safe_post('aaas_evaluasi_1') : null,
				'aaas_evaluasi_1' => safe_post('aaas_evaluasi_1') !== '' ? safe_post('aaas_evaluasi_1') : null,
				'aaas_evaluasi_3' => safe_post('aaas_evaluasi_3') !== '' ? safe_post('aaas_evaluasi_3') : null,
				'aaas_evaluasi_3' => safe_post('aaas_evaluasi_3') !== '' ? safe_post('aaas_evaluasi_3') : null,
				'aaas_evaluasi_5' => safe_post('aaas_evaluasi_5') !== '' ? safe_post('aaas_evaluasi_5') : null,
				'aaas_evaluasi_5' => safe_post('aaas_evaluasi_5') !== '' ? safe_post('aaas_evaluasi_5') : null,
				'aaas_evaluasi_7' => safe_post('aaas_evaluasi_7') !== '' ? safe_post('aaas_evaluasi_7') : null,
				'aaas_evaluasi_8' => safe_post('aaas_evaluasi_8') !== '' ? safe_post('aaas_evaluasi_8') : null,
				'aaas_evaluasi_8' => safe_post('aaas_evaluasi_8') !== '' ? safe_post('aaas_evaluasi_8') : null,
				'aaas_evaluasi_10' => safe_post('aaas_evaluasi_10') !== '' ? safe_post('aaas_evaluasi_10') : null,
				'aaas_evaluasi_11' => safe_post('aaas_evaluasi_11') !== '' ? safe_post('aaas_evaluasi_11') : null,
				'aaas_evaluasi_11' => safe_post('aaas_evaluasi_11') !== '' ? safe_post('aaas_evaluasi_11') : null,
				'aaas_evaluasi_13' => safe_post('aaas_evaluasi_13') !== '' ? safe_post('aaas_evaluasi_13') : null,
				'aaas_evaluasi_14' => safe_post('aaas_evaluasi_14') !== '' ? safe_post('aaas_evaluasi_14') : null,
				'aaas_evaluasi_14' => safe_post('aaas_evaluasi_14') !== '' ? safe_post('aaas_evaluasi_14') : null,
				'aaas_evaluasi_16' => safe_post('aaas_evaluasi_16') !== '' ? safe_post('aaas_evaluasi_16') : null,
				'aaas_evaluasi_16' => safe_post('aaas_evaluasi_16') !== '' ? safe_post('aaas_evaluasi_16') : null,
				'aaas_evaluasi_18' => safe_post('aaas_evaluasi_18') !== '' ? safe_post('aaas_evaluasi_18') : null,
				'aaas_evaluasi_18' => safe_post('aaas_evaluasi_18') !== '' ? safe_post('aaas_evaluasi_18') : null,
				'aaas_evaluasi_18' => safe_post('aaas_evaluasi_18') !== '' ? safe_post('aaas_evaluasi_18') : null,
				'aaas_evaluasi_18' => safe_post('aaas_evaluasi_18') !== '' ? safe_post('aaas_evaluasi_18') : null,
				'aaas_evaluasi_22' => safe_post('aaas_evaluasi_22') !== '' ? safe_post('aaas_evaluasi_22') : null,
				'aaas_evaluasi_22' => safe_post('aaas_evaluasi_22') !== '' ? safe_post('aaas_evaluasi_22') : null,
				'aaas_evaluasi_24' => safe_post('aaas_evaluasi_24') !== '' ? safe_post('aaas_evaluasi_24') : null,
				'aaas_evaluasi_24' => safe_post('aaas_evaluasi_24') !== '' ? safe_post('aaas_evaluasi_24') : null,
				'aaas_evaluasi_26' => safe_post('aaas_evaluasi_26') !== '' ? safe_post('aaas_evaluasi_26') : null,
				'aaas_evaluasi_26' => safe_post('aaas_evaluasi_26') !== '' ? safe_post('aaas_evaluasi_26') : null,
				'aaas_evaluasi_28' => safe_post('aaas_evaluasi_28') !== '' ? safe_post('aaas_evaluasi_28') : null,
				'aaas_evaluasi_28' => safe_post('aaas_evaluasi_28') !== '' ? safe_post('aaas_evaluasi_28') : null,
			]),

			'aaas_pernafasan' => json_encode([
				'aaas_pernafasan_1' => safe_post('aaas_pernafasan_1') !== '' ? safe_post('aaas_pernafasan_1') : null,
				'aaas_pernafasan_2' => safe_post('aaas_pernafasan_2') !== '' ? safe_post('aaas_pernafasan_2') : null,
				'aaas_pernafasan_3' => safe_post('aaas_pernafasan_3') !== '' ? safe_post('aaas_pernafasan_3') : null,
				'aaas_pernafasan_4' => safe_post('aaas_pernafasan_4') !== '' ? safe_post('aaas_pernafasan_4') : null,
				'aaas_pernafasan_5' => safe_post('aaas_pernafasan_5') !== '' ? safe_post('aaas_pernafasan_5') : null,
				'aaas_pernafasan_6' => safe_post('aaas_pernafasan_6') !== '' ? safe_post('aaas_pernafasan_6') : null,
				'aaas_pernafasan_7' => safe_post('aaas_pernafasan_7') !== '' ? safe_post('aaas_pernafasan_7') : null,
				'aaas_pernafasan_8' => safe_post('aaas_pernafasan_8') !== '' ? safe_post('aaas_pernafasan_8') : null,
				'aaas_pernafasan_9' => safe_post('aaas_pernafasan_9') !== '' ? safe_post('aaas_pernafasan_9') : null,
				'aaas_pernafasan_10' => safe_post('aaas_pernafasan_10') !== '' ? safe_post('aaas_pernafasan_10') : null,
				'aaas_pernafasan_11' => safe_post('aaas_pernafasan_11') !== '' ? safe_post('aaas_pernafasan_11') : null,
				'aaas_pernafasan_12' => safe_post('aaas_pernafasan_12') !== '' ? safe_post('aaas_pernafasan_12') : null,
			]),

			'aaas_kardiovaskular' => json_encode([
				'aaas_kardiovaskular_1' => safe_post('aaas_kardiovaskular_1') !== '' ? safe_post('aaas_kardiovaskular_1') : null,
				'aaas_kardiovaskular_2' => safe_post('aaas_kardiovaskular_2') !== '' ? safe_post('aaas_kardiovaskular_2') : null,
				'aaas_kardiovaskular_3' => safe_post('aaas_kardiovaskular_3') !== '' ? safe_post('aaas_kardiovaskular_3') : null,
				'aaas_kardiovaskular_4' => safe_post('aaas_kardiovaskular_4') !== '' ? safe_post('aaas_kardiovaskular_4') : null,
				'aaas_kardiovaskular_5' => safe_post('aaas_kardiovaskular_5') !== '' ? safe_post('aaas_kardiovaskular_5') : null,
				'aaas_kardiovaskular_6' => safe_post('aaas_kardiovaskular_6') !== '' ? safe_post('aaas_kardiovaskular_6') : null,
				'aaas_kardiovaskular_7' => safe_post('aaas_kardiovaskular_7') !== '' ? safe_post('aaas_kardiovaskular_7') : null,
				'aaas_kardiovaskular_8' => safe_post('aaas_kardiovaskular_8') !== '' ? safe_post('aaas_kardiovaskular_8') : null,
				'aaas_kardiovaskular_9' => safe_post('aaas_kardiovaskular_9') !== '' ? safe_post('aaas_kardiovaskular_9') : null,
				'aaas_kardiovaskular_10' => safe_post('aaas_kardiovaskular_10') !== '' ? safe_post('aaas_kardiovaskular_10') : null,
				'aaas_kardiovaskular_11' => safe_post('aaas_kardiovaskular_11') !== '' ? safe_post('aaas_kardiovaskular_11') : null,
				'aaas_kardiovaskular_12' => safe_post('aaas_kardiovaskular_12') !== '' ? safe_post('aaas_kardiovaskular_12') : null,
			]),

			'aaas_neuro' => json_encode([
				'aaas_neuro_1' => safe_post('aaas_neuro_1') !== '' ? safe_post('aaas_neuro_1') : null,
				'aaas_neuro_2' => safe_post('aaas_neuro_2') !== '' ? safe_post('aaas_neuro_2') : null,
				'aaas_neuro_3' => safe_post('aaas_neuro_3') !== '' ? safe_post('aaas_neuro_3') : null,
				'aaas_neuro_4' => safe_post('aaas_neuro_4') !== '' ? safe_post('aaas_neuro_4') : null,
				'aaas_neuro_5' => safe_post('aaas_neuro_5') !== '' ? safe_post('aaas_neuro_5') : null,
				'aaas_neuro_6' => safe_post('aaas_neuro_6') !== '' ? safe_post('aaas_neuro_6') : null,
				'aaas_neuro_7' => safe_post('aaas_neuro_7') !== '' ? safe_post('aaas_neuro_7') : null,
				'aaas_neuro_8' => safe_post('aaas_neuro_8') !== '' ? safe_post('aaas_neuro_8') : null,
				'aaas_neuro_9' => safe_post('aaas_neuro_9') !== '' ? safe_post('aaas_neuro_9') : null,
				'aaas_neuro_10' => safe_post('aaas_neuro_10') !== '' ? safe_post('aaas_neuro_10') : null,
			]),

			'aaas_renal' => json_encode([
				'aaas_renal_1' => safe_post('aaas_renal_1') !== '' ? safe_post('aaas_renal_1') : null,
				'aaas_renal_2' => safe_post('aaas_renal_2') !== '' ? safe_post('aaas_renal_2') : null,
				'aaas_renal_3' => safe_post('aaas_renal_3') !== '' ? safe_post('aaas_renal_3') : null,
				'aaas_renal_4' => safe_post('aaas_renal_4') !== '' ? safe_post('aaas_renal_4') : null,
				'aaas_renal_5' => safe_post('aaas_renal_5') !== '' ? safe_post('aaas_renal_5') : null,
				'aaas_renal_6' => safe_post('aaas_renal_6') !== '' ? safe_post('aaas_renal_6') : null,
			]),

			'aaas_hepato' => json_encode([
				'aaas_hepato_1' => safe_post('aaas_hepato_1') !== '' ? safe_post('aaas_hepato_1') : null,
				'aaas_hepato_2' => safe_post('aaas_hepato_2') !== '' ? safe_post('aaas_hepato_2') : null,
				'aaas_hepato_3' => safe_post('aaas_hepato_3') !== '' ? safe_post('aaas_hepato_3') : null,
				'aaas_hepato_4' => safe_post('aaas_hepato_4') !== '' ? safe_post('aaas_hepato_4') : null,
				'aaas_hepato_5' => safe_post('aaas_hepato_5') !== '' ? safe_post('aaas_hepato_5') : null,
				'aaas_hepato_6' => safe_post('aaas_hepato_6') !== '' ? safe_post('aaas_hepato_6') : null,
				'aaas_hepato_7' => safe_post('aaas_hepato_7') !== '' ? safe_post('aaas_hepato_7') : null,
				'aaas_hepato_8' => safe_post('aaas_hepato_8') !== '' ? safe_post('aaas_hepato_8') : null,
			]),

			'aaas_lain' => json_encode([
				'aaas_lain_1' => safe_post('aaas_lain_1') !== '' ? safe_post('aaas_lain_1') : null,
				'aaas_lain_2' => safe_post('aaas_lain_2') !== '' ? safe_post('aaas_lain_2') : null,
				'aaas_lain_3' => safe_post('aaas_lain_3') !== '' ? safe_post('aaas_lain_3') : null,
				'aaas_lain_4' => safe_post('aaas_lain_4') !== '' ? safe_post('aaas_lain_4') : null,
				'aaas_lain_5' => safe_post('aaas_lain_5') !== '' ? safe_post('aaas_lain_5') : null,
				'aaas_lain_6' => safe_post('aaas_lain_6') !== '' ? safe_post('aaas_lain_6') : null,
				'aaas_lain_7' => safe_post('aaas_lain_7') !== '' ? safe_post('aaas_lain_7') : null,
				'aaas_lain_8' => safe_post('aaas_lain_8') !== '' ? safe_post('aaas_lain_8') : null,
				'aaas_lain_9' => safe_post('aaas_lain_9') !== '' ? safe_post('aaas_lain_9') : null,
				'aaas_lain_10' => safe_post('aaas_lain_10') !== '' ? safe_post('aaas_lain_10') : null,
				'aaas_lain_11' => safe_post('aaas_lain_11') !== '' ? safe_post('aaas_lain_11') : null,
				'aaas_lain_12' => safe_post('aaas_lain_12') !== '' ? safe_post('aaas_lain_12') : null,
				'aaas_lain_13' => safe_post('aaas_lain_13') !== '' ? safe_post('aaas_lain_13') : null,
			]),

			'aaas_hematologi' => json_encode([
				'aaas_hematologi_1' => safe_post('aaas_hematologi_1') !== '' ? safe_post('aaas_hematologi_1') : null,
				'aaas_hematologi_2' => safe_post('aaas_hematologi_2') !== '' ? safe_post('aaas_hematologi_2') : null,
				'aaas_hematologi_3' => safe_post('aaas_hematologi_3') !== '' ? safe_post('aaas_hematologi_3') : null,
				'aaas_hematologi_4' => safe_post('aaas_hematologi_4') !== '' ? safe_post('aaas_hematologi_4') : null,
				'aaas_hematologi_5' => safe_post('aaas_hematologi_5') !== '' ? safe_post('aaas_hematologi_5') : null,
				'aaas_hematologi_6' => safe_post('aaas_hematologi_6') !== '' ? safe_post('aaas_hematologi_6') : null,
			]),

			'aaas_serum' => json_encode([
				'aaas_serum_1' => safe_post('aaas_serum_1') !== '' ? safe_post('aaas_serum_1') : null,
				'aaas_serum_2' => safe_post('aaas_serum_2') !== '' ? safe_post('aaas_serum_2') : null,
				'aaas_serum_3' => safe_post('aaas_serum_3') !== '' ? safe_post('aaas_serum_3') : null,
				'aaas_serum_4' => safe_post('aaas_serum_4') !== '' ? safe_post('aaas_serum_4') : null,
			]),

			'aaas_fungsi' => json_encode([
				'aaas_fungsi_1' => safe_post('aaas_fungsi_1') !== '' ? safe_post('aaas_fungsi_1') : null,
				'aaas_fungsi_2' => safe_post('aaas_fungsi_2') !== '' ? safe_post('aaas_fungsi_2') : null,
				'aaas_fungsi_3' => safe_post('aaas_fungsi_3') !== '' ? safe_post('aaas_fungsi_3') : null,
				'aaas_fungsi_4' => safe_post('aaas_fungsi_4') !== '' ? safe_post('aaas_fungsi_4') : null,
				'aaas_fungsi_5' => safe_post('aaas_fungsi_5') !== '' ? safe_post('aaas_fungsi_5') : null,
				'aaas_fungsi_6' => safe_post('aaas_fungsi_6') !== '' ? safe_post('aaas_fungsi_6') : null,
				'aaas_fungsi_7' => safe_post('aaas_fungsi_7') !== '' ? safe_post('aaas_fungsi_7') : null,
				'aaas_fungsi_8' => safe_post('aaas_fungsi_8') !== '' ? safe_post('aaas_fungsi_8') : null,
			]),

			'aaas_ginjal' => json_encode([
				'aaas_ginjal_1' => safe_post('aaas_ginjal_1') !== '' ? safe_post('aaas_ginjal_1') : null,
				'aaas_ginjal_2' => safe_post('aaas_ginjal_2') !== '' ? safe_post('aaas_ginjal_2') : null,
			]),

			'aaas_edokorin' => json_encode([
				'aaas_edokorin_1' => safe_post('aaas_edokorin_1') !== '' ? safe_post('aaas_edokorin_1') : null,
				'aaas_edokorin_2' => safe_post('aaas_edokorin_2') !== '' ? safe_post('aaas_edokorin_2') : null,
				'aaas_edokorin_3' => safe_post('aaas_edokorin_3') !== '' ? safe_post('aaas_edokorin_3') : null,
				'aaas_edokorin_4' => safe_post('aaas_edokorin_4') !== '' ? safe_post('aaas_edokorin_4') : null,
				'aaas_edokorin_5' => safe_post('aaas_edokorin_5') !== '' ? safe_post('aaas_edokorin_5') : null,
				'aaas_edokorin_6' => safe_post('aaas_edokorin_6') !== '' ? safe_post('aaas_edokorin_6') : null,
			]),

			'aaas_agd' => json_encode([
				'aaas_agd_1' => safe_post('aaas_agd_1') !== '' ? safe_post('aaas_agd_1') : null,
				'aaas_agd_2' => safe_post('aaas_agd_2') !== '' ? safe_post('aaas_agd_2') : null,
				'aaas_agd_3' => safe_post('aaas_agd_3') !== '' ? safe_post('aaas_agd_3') : null,
				'aaas_agd_4' => safe_post('aaas_agd_4') !== '' ? safe_post('aaas_agd_4') : null,
				'aaas_agd_5' => safe_post('aaas_agd_5') !== '' ? safe_post('aaas_agd_5') : null,
			]),

			'aaas_pemeriksaan' => json_encode([
				'aaas_pemeriksaan_1' => safe_post('aaas_pemeriksaan_1') !== '' ? safe_post('aaas_pemeriksaan_1') : null,
				'aaas_pemeriksaan_2' => safe_post('aaas_pemeriksaan_2') !== '' ? safe_post('aaas_pemeriksaan_2') : null,
				'aaas_pemeriksaan_3' => safe_post('aaas_pemeriksaan_3') !== '' ? safe_post('aaas_pemeriksaan_3') : null,
				'aaas_pemeriksaan_4' => safe_post('aaas_pemeriksaan_4') !== '' ? safe_post('aaas_pemeriksaan_4') : null,
				'aaas_pemeriksaan_5' => safe_post('aaas_pemeriksaan_5') !== '' ? safe_post('aaas_pemeriksaan_5') : null,
				'aaas_pemeriksaan_6' => safe_post('aaas_pemeriksaan_6') !== '' ? safe_post('aaas_pemeriksaan_6') : null,
			]),


			'baru' => json_encode([
				'baru_1' => safe_post('baru_1') !== '' ? safe_post('baru_1') : null,
				'baru_2' => safe_post('baru_2') !== '' ? safe_post('baru_2') : null,
				'baru_3' => safe_post('baru_3') !== '' ? safe_post('baru_3') : null,
				'baru_4' => safe_post('baru_4') !== '' ? safe_post('baru_4') : null,
			]),


			'aaas_sedasi' 		=> safe_post('aaas_sedasi') !== '' ? safe_post('aaas_sedasi') : NULL,
			'aaas_ga' 			=> safe_post('aaas_ga') !== '' ? safe_post('aaas_ga') : NULL,


			'aaas_regional' => json_encode([
				'aaas_regional_1' => safe_post('aaas_regional_1') !== '' ? safe_post('aaas_regional_1') : null,
				'aaas_regional_2' => safe_post('aaas_regional_2') !== '' ? safe_post('aaas_regional_2') : null,
				'aaas_regional_3' => safe_post('aaas_regional_3') !== '' ? safe_post('aaas_regional_3') : null,
				'aaas_regional_4' => safe_post('aaas_regional_4') !== '' ? safe_post('aaas_regional_4') : null,
			]),

			'aaas_teknik' => json_encode([
				'aaas_teknik_1' => safe_post('aaas_teknik_1') !== '' ? safe_post('aaas_teknik_1') : null,
				'aaas_teknik_2' => safe_post('aaas_teknik_2') !== '' ? safe_post('aaas_teknik_2') : null,
				'aaas_teknik_3' => safe_post('aaas_teknik_3') !== '' ? safe_post('aaas_teknik_3') : null,
				'aaas_teknik_4' => safe_post('aaas_teknik_4') !== '' ? safe_post('aaas_teknik_4') : null,
				'aaas_teknik_5' => safe_post('aaas_teknik_5') !== '' ? safe_post('aaas_teknik_5') : null,
			]),

			'aaas_monitoring' => json_encode([
				'aaas_monitoring_1' => safe_post('aaas_monitoring_1') !== '' ? safe_post('aaas_monitoring_1') : null,
				'aaas_monitoring_2' => safe_post('aaas_monitoring_2') !== '' ? safe_post('aaas_monitoring_2') : null,
				'aaas_monitoring_3' => safe_post('aaas_monitoring_3') !== '' ? safe_post('aaas_monitoring_3') : null,
				'aaas_monitoring_4' => safe_post('aaas_monitoring_4') !== '' ? safe_post('aaas_monitoring_4') : null,
				'aaas_monitoring_5' => safe_post('aaas_monitoring_5') !== '' ? safe_post('aaas_monitoring_5') : null,
				'aaas_monitoring_6' => safe_post('aaas_monitoring_6') !== '' ? safe_post('aaas_monitoring_6') : null,
				'aaas_monitoring_7' => safe_post('aaas_monitoring_7') !== '' ? safe_post('aaas_monitoring_7') : null,
				'aaas_monitoring_8' => safe_post('aaas_monitoring_8') !== '' ? safe_post('aaas_monitoring_8') : null,
				'aaas_monitoring_9' => safe_post('aaas_monitoring_9') !== '' ? safe_post('aaas_monitoring_9') : null,
				'aaas_monitoring_10' => safe_post('aaas_monitoring_10') !== '' ? safe_post('aaas_monitoring_10') : null,
			]),

			'aaas_alat' => json_encode([
				'aaas_alat_1' => safe_post('aaas_alat_1') !== '' ? safe_post('aaas_alat_1') : null,
				'aaas_alat_2' => safe_post('aaas_alat_2') !== '' ? safe_post('aaas_alat_2') : null,
				'aaas_alat_3' => safe_post('aaas_alat_3') !== '' ? safe_post('aaas_alat_3') : null,
				'aaas_alat_4' => safe_post('aaas_alat_4') !== '' ? safe_post('aaas_alat_4') : null,
				'aaas_alat_5' => safe_post('aaas_alat_5') !== '' ? safe_post('aaas_alat_5') : null,
			]),



			'aaas_pasca' => json_encode([
				'aaas_pasca_1' => safe_post('aaas_pasca_1') !== '' ? safe_post('aaas_pasca_1') : null,
				'aaas_pasca_1' => safe_post('aaas_pasca_1') !== '' ? safe_post('aaas_pasca_1') : null,
				'aaas_pasca_1' => safe_post('aaas_pasca_1') !== '' ? safe_post('aaas_pasca_1') : null,
				'aaas_pasca_1' => safe_post('aaas_pasca_1') !== '' ? safe_post('aaas_pasca_1') : null,
				'aaas_pasca_1' => safe_post('aaas_pasca_1') !== '' ? safe_post('aaas_pasca_1') : null,
				'aaas_pasca_1' => safe_post('aaas_pasca_1') !== '' ? safe_post('aaas_pasca_1') : null,
				'aaas_pasca_1' => safe_post('aaas_pasca_1') !== '' ? safe_post('aaas_pasca_1') : null,
				'aaas_pasca_8' => safe_post('aaas_pasca_8') !== '' ? safe_post('aaas_pasca_8') : null,
			]),

			'aaas_ps' => json_encode([
				'aaas_ps_1' => safe_post('aaas_ps_1') !== '' ? safe_post('aaas_ps_1') : null,
				'aaas_ps_1' => safe_post('aaas_ps_1') !== '' ? safe_post('aaas_ps_1') : null,
				'aaas_ps_1' => safe_post('aaas_ps_1') !== '' ? safe_post('aaas_ps_1') : null,
				'aaas_ps_1' => safe_post('aaas_ps_1') !== '' ? safe_post('aaas_ps_1') : null,
				'aaas_ps_1' => safe_post('aaas_ps_1') !== '' ? safe_post('aaas_ps_1') : null,
				'aaas_ps_1' => safe_post('aaas_ps_1') !== '' ? safe_post('aaas_ps_1') : null,
			]),

			'aaas_penyulit' 			=> safe_post('aaas_penyulit') !== '' ? safe_post('aaas_penyulit') : NULL,
			'aaas_puasa' 				=> safe_post('aaas_puasa') !== '' ? safe_post('aaas_puasa') : NULL,
			'aaas_premedikal' 			=> safe_post('aaas_premedikal') !== '' ? safe_post('aaas_premedikal') : NULL,
			'aaas_catatan' 				=> safe_post('aaas_catatan') !== '' ? safe_post('aaas_catatan') : NULL,
			'aaas_pemeriksa_asesmen_anestesi' 	=> safe_post('aaas_pemeriksa_asesmen_anestesi') !== '' ? safe_post('aaas_pemeriksa_asesmen_anestesi') : NULL,
			'aaas_tanggal_pemeriksaan_pasien'	=> (safe_post('aaas_tanggal_pemeriksaan_pasien') !== '' ? datetime2mysql(safe_post('aaas_tanggal_pemeriksaan_pasien')) : NULL),
			'aaas_pemeriksa' 					=> safe_post('aaas_pemeriksa') !== '' ? safe_post('aaas_pemeriksa') : NULL,

		);
		$this->m_order_operasi->updateAssesmenAwalAnestesiSedasi($data_aaas);

		if (!empty($respon)) {

			$response = $respon;
		} else {

			$response = null;
		}

		if ($this->db->trans_status() === false) :
			$this->db->trans_rollback();
			$status = false;
		else :
			$this->db->trans_commit();
			$status = true;
		endif;

		$message = array(
			'status' => $status,
			'token'  => $this->security->get_csrf_hash(),
			'id'     => $layanan['id'],
			'respon' => $response,
		);
		$this->response($message, REST_Controller::HTTP_OK);
	}

	// PADOKB 
	function get_data_pemakaian_alkes_dan_obat_kamar_bedah_get(){
		if (!$this->get('id')) :
			$this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
		endif;
		$data = $this->m_pendaftaran->getPendaftaranDetail($this->get('id', true), $this->get('id_layanan', true));
		$data['pemakaian_alkes_dan_obat_kamar_bedah']  = $this->m_order_operasi->getPemakaianAlkesDanObatKamarBedah($data['layanan']->id_pendaftaran);
		$data['tindakan_operasi']  = $this->m_order_operasi->getTindakanOP($this->get('id_layanan', true));
		if ($data) :
			$this->response($data, REST_Controller::HTTP_OK); // (200)
		endif;
	}

	// PADOKB
	function simpan_pemakaian_alkes_dan_obat_kamar_bedah_post(){
		$layanan = array('id' => safe_post('id_layanan_pendaftaran'));
		$this->db->trans_begin();

		$data_padokb = array(
			'id_layanan_pendaftaran' => $layanan['id'],
			'id_pendaftaran'       	 => safe_post('id_pendaftaran'),
			'id_users'       	 	 => $this->session->userdata('id_translucent'),
			'id_padokb' 			 => safe_post('id_padokb'),

			'tanggal_padokb' 			=> safe_post('tanggal_padokb') !== '' ? safe_post('tanggal_padokb') : NULL,
			'tindakan_padokb' 			=> safe_post('tindakan_padokb') !== '' ? safe_post('tindakan_padokb') : NULL,
			'dokter_op_padokb' 			=> safe_post('dokter_op_padokb') !== '' ? safe_post('dokter_op_padokb') : NULL,
			'dokter_an_padokb' 			=> safe_post('dokter_an_padokb') !== '' ? safe_post('dokter_an_padokb') : NULL,

			'gamemex_1' 			=> safe_post('gamemex_1') !== '' ? safe_post('gamemex_1') : NULL,
			'gamemex_2' 			=> safe_post('gamemex_2') !== '' ? safe_post('gamemex_2') : NULL,
			'gamemex_3' 			=> safe_post('gamemex_3') !== '' ? safe_post('gamemex_3') : NULL,
			'gamemex_4' 			=> safe_post('gamemex_4') !== '' ? safe_post('gamemex_4') : NULL,
			'gamemex_5' 			=> safe_post('gamemex_5') !== '' ? safe_post('gamemex_5') : NULL,
			'gamemex_6' 			=> safe_post('gamemex_6') !== '' ? safe_post('gamemex_6') : NULL,

			'jumlah_1' 				=> safe_post('jumlah_1') !== '' ? safe_post('jumlah_1') : NULL,
			'jumlah_2' 				=> safe_post('jumlah_2') !== '' ? safe_post('jumlah_2') : NULL,
			'jumlah_3' 				=> safe_post('jumlah_3') !== '' ? safe_post('jumlah_3') : NULL,
			'jumlah_4' 				=> safe_post('jumlah_4') !== '' ? safe_post('jumlah_4') : NULL,
			'jumlah_5' 				=> safe_post('jumlah_5') !== '' ? safe_post('jumlah_5') : NULL,
			'jumlah_6' 				=> safe_post('jumlah_6') !== '' ? safe_post('jumlah_6') : NULL,
			'jumlah_7' 				=> safe_post('jumlah_7') !== '' ? safe_post('jumlah_7') : NULL,
			'jumlah_8' 				=> safe_post('jumlah_8') !== '' ? safe_post('jumlah_8') : NULL,
			'jumlah_9' 				=> safe_post('jumlah_9') !== '' ? safe_post('jumlah_9') : NULL,
			'jumlah_10' 			=> safe_post('jumlah_10') !== '' ? safe_post('jumlah_10') : NULL,

			'jumlah_11' 			=> safe_post('jumlah_11') !== '' ? safe_post('jumlah_11') : NULL,
			'jumlah_12' 			=> safe_post('jumlah_12') !== '' ? safe_post('jumlah_12') : NULL,
			'jumlah_13' 			=> safe_post('jumlah_13') !== '' ? safe_post('jumlah_13') : NULL,
			'jumlah_14' 			=> safe_post('jumlah_14') !== '' ? safe_post('jumlah_14') : NULL,
			'jumlah_15' 			=> safe_post('jumlah_15') !== '' ? safe_post('jumlah_15') : NULL,
			'jumlah_16' 			=> safe_post('jumlah_16') !== '' ? safe_post('jumlah_16') : NULL,
			'jumlah_17' 			=> safe_post('jumlah_17') !== '' ? safe_post('jumlah_17') : NULL,
			'jumlah_18' 			=> safe_post('jumlah_18') !== '' ? safe_post('jumlah_18') : NULL,
			'jumlah_19' 			=> safe_post('jumlah_19') !== '' ? safe_post('jumlah_19') : NULL,
			'jumlah_20' 			=> safe_post('jumlah_20') !== '' ? safe_post('jumlah_20') : NULL,

			'jumlah_21' 			=> safe_post('jumlah_21') !== '' ? safe_post('jumlah_21') : NULL,
			'jumlah_22' 			=> safe_post('jumlah_22') !== '' ? safe_post('jumlah_22') : NULL,
			'jumlah_23' 			=> safe_post('jumlah_23') !== '' ? safe_post('jumlah_23') : NULL,
			'jumlah_24' 			=> safe_post('jumlah_24') !== '' ? safe_post('jumlah_24') : NULL,
			'jumlah_25' 			=> safe_post('jumlah_25') !== '' ? safe_post('jumlah_25') : NULL,
			'jumlah_26' 			=> safe_post('jumlah_26') !== '' ? safe_post('jumlah_26') : NULL,
			'jumlah_27' 			=> safe_post('jumlah_27') !== '' ? safe_post('jumlah_27') : NULL,
			'jumlah_28' 			=> safe_post('jumlah_28') !== '' ? safe_post('jumlah_28') : NULL,
			'jumlah_29' 			=> safe_post('jumlah_29') !== '' ? safe_post('jumlah_29') : NULL,
			'jumlah_30' 			=> safe_post('jumlah_30') !== '' ? safe_post('jumlah_30') : NULL,

			'jumlah_31' 			=> safe_post('jumlah_31') !== '' ? safe_post('jumlah_31') : NULL,
			'jumlah_32' 			=> safe_post('jumlah_32') !== '' ? safe_post('jumlah_32') : NULL,
			'jumlah_33' 			=> safe_post('jumlah_33') !== '' ? safe_post('jumlah_33') : NULL,
			'jumlah_34' 			=> safe_post('jumlah_34') !== '' ? safe_post('jumlah_34') : NULL,
			'jumlah_35' 			=> safe_post('jumlah_35') !== '' ? safe_post('jumlah_35') : NULL,
			'jumlah_36' 			=> safe_post('jumlah_36') !== '' ? safe_post('jumlah_36') : NULL,
			'jumlah_37' 			=> safe_post('jumlah_37') !== '' ? safe_post('jumlah_37') : NULL,
			'jumlah_38' 			=> safe_post('jumlah_38') !== '' ? safe_post('jumlah_38') : NULL,
			'jumlah_39' 			=> safe_post('jumlah_39') !== '' ? safe_post('jumlah_39') : NULL,
			'jumlah_40' 			=> safe_post('jumlah_40') !== '' ? safe_post('jumlah_40') : NULL,

			'jumlah_41' 			=> safe_post('jumlah_41') !== '' ? safe_post('jumlah_41') : NULL,
			'jumlah_42' 			=> safe_post('jumlah_42') !== '' ? safe_post('jumlah_42') : NULL,
			'jumlah_43' 			=> safe_post('jumlah_43') !== '' ? safe_post('jumlah_43') : NULL,
			'jumlah_44' 			=> safe_post('jumlah_44') !== '' ? safe_post('jumlah_44') : NULL,
			'jumlah_45' 			=> safe_post('jumlah_45') !== '' ? safe_post('jumlah_45') : NULL,
			'jumlah_46' 			=> safe_post('jumlah_46') !== '' ? safe_post('jumlah_46') : NULL,
			'jumlah_47' 			=> safe_post('jumlah_47') !== '' ? safe_post('jumlah_47') : NULL,
			'jumlah_48' 			=> safe_post('jumlah_48') !== '' ? safe_post('jumlah_48') : NULL,
			'jumlah_49' 			=> safe_post('jumlah_49') !== '' ? safe_post('jumlah_49') : NULL,
			'jumlah_50' 			=> safe_post('jumlah_50') !== '' ? safe_post('jumlah_50') : NULL,

			'jumlah_51' 			=> safe_post('jumlah_51') !== '' ? safe_post('jumlah_51') : NULL,
			'jumlah_52' 			=> safe_post('jumlah_52') !== '' ? safe_post('jumlah_52') : NULL,
			'jumlah_53' 			=> safe_post('jumlah_53') !== '' ? safe_post('jumlah_53') : NULL,
			'jumlah_54' 			=> safe_post('jumlah_54') !== '' ? safe_post('jumlah_54') : NULL,
			'jumlah_55' 			=> safe_post('jumlah_55') !== '' ? safe_post('jumlah_55') : NULL,
			'jumlah_56' 			=> safe_post('jumlah_56') !== '' ? safe_post('jumlah_56') : NULL,
			'jumlah_57' 			=> safe_post('jumlah_57') !== '' ? safe_post('jumlah_57') : NULL,
			'jumlah_58' 			=> safe_post('jumlah_58') !== '' ? safe_post('jumlah_58') : NULL,
			'jumlah_59' 			=> safe_post('jumlah_59') !== '' ? safe_post('jumlah_59') : NULL,
			'jumlah_60' 			=> safe_post('jumlah_60') !== '' ? safe_post('jumlah_60') : NULL,

			'jumlah_61' 			=> safe_post('jumlah_61') !== '' ? safe_post('jumlah_61') : NULL,
			'jumlah_62' 			=> safe_post('jumlah_62') !== '' ? safe_post('jumlah_62') : NULL,
			'jumlah_63' 			=> safe_post('jumlah_63') !== '' ? safe_post('jumlah_63') : NULL,
			'jumlah_64' 			=> safe_post('jumlah_64') !== '' ? safe_post('jumlah_64') : NULL,
			'jumlah_65' 			=> safe_post('jumlah_65') !== '' ? safe_post('jumlah_65') : NULL,
			'jumlah_66' 			=> safe_post('jumlah_66') !== '' ? safe_post('jumlah_66') : NULL,
			'jumlah_67' 			=> safe_post('jumlah_67') !== '' ? safe_post('jumlah_67') : NULL,
			'jumlah_68' 			=> safe_post('jumlah_68') !== '' ? safe_post('jumlah_68') : NULL,
			'jumlah_69' 			=> safe_post('jumlah_69') !== '' ? safe_post('jumlah_69') : NULL,
			'jumlah_70' 			=> safe_post('jumlah_70') !== '' ? safe_post('jumlah_70') : NULL,

			'jumlah_71' 			=> safe_post('jumlah_71') !== '' ? safe_post('jumlah_71') : NULL,
			'jumlah_72' 			=> safe_post('jumlah_72') !== '' ? safe_post('jumlah_72') : NULL,
			'jumlah_73' 			=> safe_post('jumlah_73') !== '' ? safe_post('jumlah_73') : NULL,
			'jumlah_74' 			=> safe_post('jumlah_74') !== '' ? safe_post('jumlah_74') : NULL,
			'jumlah_75' 			=> safe_post('jumlah_75') !== '' ? safe_post('jumlah_75') : NULL,
			'jumlah_76' 			=> safe_post('jumlah_76') !== '' ? safe_post('jumlah_76') : NULL,
			'jumlah_77' 			=> safe_post('jumlah_77') !== '' ? safe_post('jumlah_77') : NULL,


			'pembalut_wanita' 			=> safe_post('pembalut_wanita') !== '' ? safe_post('pembalut_wanita') : NULL,
			'pembalut' 					=> safe_post('pembalut') !== '' ? safe_post('pembalut') : NULL,
			'hogi_gowm' 				=> safe_post('hogi_gowm') !== '' ? safe_post('hogi_gowm') : NULL,
			'profeel_1' 				=> safe_post('profeel_1') !== '' ? safe_post('profeel_1') : NULL,
			'profeel_2' 				=> safe_post('profeel_2') !== '' ? safe_post('profeel_2') : NULL,
			'profeel_3' 				=> safe_post('profeel_3') !== '' ? safe_post('profeel_3') : NULL,
			'profeel_4' 				=> safe_post('profeel_4') !== '' ? safe_post('profeel_4') : NULL,
			'profeel_5' 				=> safe_post('profeel_5') !== '' ? safe_post('profeel_5') : NULL,
			'profeel_6' 				=> safe_post('profeel_6') !== '' ? safe_post('profeel_6') : NULL,
			'masker_goggle' 			=> safe_post('masker_goggle') !== '' ? safe_post('masker_goggle') : NULL,
			'masker' 					=> safe_post('masker') !== '' ? safe_post('masker') : NULL,
			'scrub' 					=> safe_post('scrub') !== '' ? safe_post('scrub') : NULL,
			'profeel_lp_1' 				=> safe_post('profeel_lp_1') !== '' ? safe_post('profeel_lp_1') : NULL,
			'profeel_lp_2' 				=> safe_post('profeel_lp_2') !== '' ? safe_post('profeel_lp_2') : NULL,
			'profeel_lp_3' 				=> safe_post('profeel_lp_3') !== '' ? safe_post('profeel_lp_3') : NULL,
			'tegaderm' 					=> safe_post('tegaderm') !== '' ? safe_post('tegaderm') : NULL,
			'tegadermP' 				=> safe_post('tegadermP') !== '' ? safe_post('tegadermP') : NULL,
			'face_mask' 				=> safe_post('face_mask') !== '' ? safe_post('face_mask') : NULL,
			'transofik' 				=> safe_post('transofik') !== '' ? safe_post('transofik') : NULL,
			'paper_green' 				=> safe_post('paper_green') !== '' ? safe_post('paper_green') : NULL,
			'masker_kaca' 				=> safe_post('masker_kaca') !== '' ? safe_post('masker_kaca') : NULL,
			'bethadine' 				=> safe_post('bethadine') !== '' ? safe_post('bethadine') : NULL,
			'bethadine_cc' 				=> safe_post('bethadine_cc') !== '' ? safe_post('bethadine_cc') : NULL,
			'formalin' 					=> safe_post('formalin') !== '' ? safe_post('formalin') : NULL,
			'surgical_hat' 				=> safe_post('surgical_hat') !== '' ? safe_post('surgical_hat') : NULL,
			'alkohol' 					=> safe_post('alkohol') !== '' ? safe_post('alkohol') : NULL,
			'alkohol_cc' 				=> safe_post('alkohol_cc') !== '' ? safe_post('alkohol_cc') : NULL,
			'aquabidest_1000' 			=> safe_post('aquabidest_1000') !== '' ? safe_post('aquabidest_1000') : NULL,
			'sensi_glove' 				=> safe_post('sensi_glove') !== '' ? safe_post('sensi_glove') : NULL,
			'needle' 					=> safe_post('needle') !== '' ? safe_post('needle') : NULL,
			'needle_no' 				=> safe_post('needle_no') !== '' ? safe_post('needle_no') : NULL,
			'alkazym' 					=> safe_post('alkazym') !== '' ? safe_post('alkazym') : NULL,
			'xylocine_gel' 				=> safe_post('xylocine_gel') !== '' ? safe_post('xylocine_gel') : NULL,
			'instillagel' 				=> safe_post('instillagel') !== '' ? safe_post('instillagel') : NULL,
			'netral_plate' 				=> safe_post('netral_plate') !== '' ? safe_post('netral_plate') : NULL,
			'hyprafix' 					=> safe_post('hyprafix') !== '' ? safe_post('hyprafix') : NULL,
			'urograd' 					=> safe_post('urograd') !== '' ? safe_post('urograd') : NULL,
			'bactigras' 				=> safe_post('bactigras') !== '' ? safe_post('bactigras') : NULL,
			'supratule' 				=> safe_post('supratule') !== '' ? safe_post('supratule') : NULL,
			'daryantule' 				=> safe_post('daryantule') !== '' ? safe_post('daryantule') : NULL,
			'baraovac' 					=> safe_post('baraovac') !== '' ? safe_post('baraovac') : NULL,
			'ps' 						=> safe_post('ps') !== '' ? safe_post('ps') : NULL,
			'pp' 						=> safe_post('pp') !== '' ? safe_post('pp') : NULL,
			'pp' 						=> safe_post('pp') !== '' ? safe_post('pp') : NULL,
			'disk' 						=> safe_post('disk') !== '' ? safe_post('disk') : NULL,
			'mersilk' 					=> safe_post('mersilk') !== '' ? safe_post('mersilk') : NULL,
			'urine_bag' 				=> safe_post('urine_bag') !== '' ? safe_post('urine_bag') : NULL,
			'h202' 						=> safe_post('h202') !== '' ? safe_post('h202') : NULL,
			'polisorb' 					=> safe_post('polisorb') !== '' ? safe_post('polisorb') : NULL,
			'polisorbQ' 				=> safe_post('polisorbQ') !== '' ? safe_post('polisorbQ') : NULL,
			'foley' 					=> safe_post('foley') !== '' ? safe_post('foley') : NULL,
			'bocal_pa' 					=> safe_post('bocal_pa') !== '' ? safe_post('bocal_pa') : NULL,
			'ultrasorb' 				=> safe_post('ultrasorb') !== '' ? safe_post('ultrasorb') : NULL,
			'ngt' 						=> safe_post('ngt') !== '' ? safe_post('ngt') : NULL,
			'rl' 						=> safe_post('rl') !== '' ? safe_post('rl') : NULL,
			'suprasob' 					=> safe_post('suprasob') !== '' ? safe_post('suprasob') : NULL,
			'syringe' 					=> safe_post('syringe') !== '' ? safe_post('syringe') : NULL,
			'syringeT' 					=> safe_post('syringeT') !== '' ? safe_post('syringeT') : NULL,
			'surgiwear' 				=> safe_post('surgiwear') !== '' ? safe_post('surgiwear') : NULL,
			'suprasobV' 				=> safe_post('suprasobV') !== '' ? safe_post('suprasobV') : NULL,
			'suprasobE' 				=> safe_post('suprasobE') !== '' ? safe_post('suprasobE') : NULL,
			'catheter_tip' 				=> safe_post('catheter_tip') !== '' ? safe_post('catheter_tip') : NULL,
			'bone_wax' 					=> safe_post('bone_wax') !== '' ? safe_post('bone_wax') : NULL,
			'chromic' 					=> safe_post('chromic') !== '' ? safe_post('chromic') : NULL,
			'guardix_sol' 				=> safe_post('guardix_sol') !== '' ? safe_post('guardix_sol') : NULL,
			'microscop_drape' 			=> safe_post('microscop_drape') !== '' ? safe_post('microscop_drape') : NULL,
			'monosyn' 					=> safe_post('monosyn') !== '' ? safe_post('monosyn') : NULL,
			'gelita_spon' 				=> safe_post('gelita_spon') !== '' ? safe_post('gelita_spon') : NULL,
			'surgicel' 					=> safe_post('surgicel') !== '' ? safe_post('surgicel') : NULL,
			'vicryl' 					=> safe_post('vicryl') !== '' ? safe_post('vicryl') : NULL,
			'vicrylU' 					=> safe_post('vicrylU') !== '' ? safe_post('vicrylU') : NULL,
			'wi' 						=> safe_post('wi') !== '' ? safe_post('wi') : NULL,
			'lina_pen' 					=> safe_post('lina_pen') !== '' ? safe_post('lina_pen') : NULL,
			'palin_cutget' 				=> safe_post('palin_cutget') !== '' ? safe_post('palin_cutget') : NULL,
			'nacl' 						=> safe_post('nacl') !== '' ? safe_post('nacl') : NULL,
			'external_drain' 			=> safe_post('external_drain') !== '' ? safe_post('external_drain') : NULL,
			'silkam' 					=> safe_post('silkam') !== '' ? safe_post('silkam') : NULL,
			'polygyp' 					=> safe_post('polygyp') !== '' ? safe_post('polygyp') : NULL,
			'suction_conecting_tube' 	=> safe_post('suction_conecting_tube') !== '' ? safe_post('suction_conecting_tube') : NULL,
			'premilen' 					=> safe_post('premilen') !== '' ? safe_post('premilen') : NULL,
			'prolaine' 					=> safe_post('prolaine') !== '' ? safe_post('prolaine') : NULL,
			'surgipro' 					=> safe_post('surgipro') !== '' ? safe_post('surgipro') : NULL,
			'polyban' 					=> safe_post('polyban') !== '' ? safe_post('polyban') : NULL,
			'bag_suction_disposible' 	=> safe_post('bag_suction_disposible') !== '' ? safe_post('bag_suction_disposible') : NULL,
			'monocryl' 					=> safe_post('monocryl') !== '' ? safe_post('monocryl') : NULL,
			'monocrylR' 				=> safe_post('monocrylR') !== '' ? safe_post('monocrylR') : NULL,
			'tensocrepe' 				=> safe_post('tensocrepe') !== '' ? safe_post('tensocrepe') : NULL,
			'medicrepe' 				=> safe_post('medicrepe') !== '' ? safe_post('medicrepe') : NULL,
			'white_apron' 				=> safe_post('white_apron') !== '' ? safe_post('white_apron') : NULL,
			'pds' 						=> safe_post('pds') !== '' ? safe_post('pds') : NULL,
			'pds2' 						=> safe_post('pds2') !== '' ? safe_post('pds2') : NULL,
			'conforming' 				=> safe_post('conforming') !== '' ? safe_post('conforming') : NULL,
			'secureg' 					=> safe_post('secureg') !== '' ? safe_post('secureg') : NULL,
			'securegS' 					=> safe_post('securegS') !== '' ? safe_post('securegS') : NULL,
			'microshield' 				=> safe_post('microshield') !== '' ? safe_post('microshield') : NULL,
			'kasssax' 					=> safe_post('kasssax') !== '' ? safe_post('kasssax') : NULL,
			'betadine' 					=> safe_post('betadine') !== '' ? safe_post('betadine') : NULL,
			'kasa_ray' 					=> safe_post('kasa_ray') !== '' ? safe_post('kasa_ray') : NULL,
			'fromaline' 				=> safe_post('fromaline') !== '' ? safe_post('fromaline') : NULL,
			'kkasa' 					=> safe_post('kkasa') !== '' ? safe_post('kkasa') : NULL,
			'cidex' 					=> safe_post('cidex') !== '' ? safe_post('cidex') : NULL,
			'kasa_laparatomy' 			=> safe_post('kasa_laparatomy') !== '' ? safe_post('kasa_laparatomy') : NULL,
			'prasept' 					=> safe_post('prasept') !== '' ? safe_post('prasept') : NULL,
			'under_pad' 				=> safe_post('under_pad') !== '' ? safe_post('under_pad') : NULL,
			'suction_catheter' 			=> safe_post('suction_catheter') !== '' ? safe_post('suction_catheter') : NULL,

		);
		$this->m_order_operasi->updatePemakaianAlkesDanObatKamarBedah($data_padokb);

		if (!empty($respon)) {

			$response = $respon;
		} else {

			$response = null;
		}

		if ($this->db->trans_status() === false) :
			$this->db->trans_rollback();
			$status = false;
		else :
			$this->db->trans_commit();
			$status = true;
		endif;

		$message = array(
			'status' => $status,
			'token'  => $this->security->get_csrf_hash(),
			'id'     => $layanan['id'],
			'respon' => $response,
		);
		$this->response($message, REST_Controller::HTTP_OK);
	}

	// PADOA 
	function get_data_pemakaian_alkes_dan_obat_anestesi_get(){
		if (!$this->get('id')) :
			$this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
		endif;
		$data = $this->m_pendaftaran->getPendaftaranDetail($this->get('id', true), $this->get('id_layanan', true));
		$data['pemakaian_alkes_dan_obat_anestesi']  = $this->m_order_operasi->getPemakaianAlkesDanObatAnestesi($data['layanan']->id_pendaftaran);
		$data['tindakan_operasi']  = $this->m_order_operasi->getTindakanOPT($this->get('id_layanan', true));
		if ($data) :
			$this->response($data, REST_Controller::HTTP_OK); // (200)
		endif;
	}

	// PADOA
	function simpan_pemakaian_alkes_dan_obat_anestesi_post(){
		$layanan = array('id' => safe_post('id_layanan_pendaftaran'));
		$this->db->trans_begin();

		$data_padoa = array(
			'id_layanan_pendaftaran' => $layanan['id'],
			'id_pendaftaran'       	 => safe_post('id_pendaftaran'),
			'id_users'       	 	 => $this->session->userdata('id_translucent'),
			'id_padoa' 			 => safe_post('id_padoa'),

			'tanggal_padoa' 			=> safe_post('tanggal_padoa') !== '' ? safe_post('tanggal_padoa') : NULL,
			'tindakan_padoa' 			=> safe_post('tindakan_padoa') !== '' ? safe_post('tindakan_padoa') : NULL,
			'dokter_op_padoa' 			=> safe_post('dokter_op_padoa') !== '' ? safe_post('dokter_op_padoa') : NULL,
			'dokter_an_padoa' 			=> safe_post('dokter_an_padoa') !== '' ? safe_post('dokter_an_padoa') : NULL,

			'jumlahQ_1' 				=> safe_post('jumlahQ_1') !== '' ? safe_post('jumlahQ_1') : NULL,
			'jumlahQ_2' 				=> safe_post('jumlahQ_2') !== '' ? safe_post('jumlahQ_2') : NULL,
			'jumlahQ_3' 				=> safe_post('jumlahQ_3') !== '' ? safe_post('jumlahQ_3') : NULL,
			'jumlahQ_4' 				=> safe_post('jumlahQ_4') !== '' ? safe_post('jumlahQ_4') : NULL,
			'jumlahQ_5' 				=> safe_post('jumlahQ_5') !== '' ? safe_post('jumlahQ_5') : NULL,
			'jumlahQ_6' 				=> safe_post('jumlahQ_6') !== '' ? safe_post('jumlahQ_6') : NULL,
			'jumlahQ_7' 				=> safe_post('jumlahQ_7') !== '' ? safe_post('jumlahQ_7') : NULL,
			'jumlahQ_8' 				=> safe_post('jumlahQ_8') !== '' ? safe_post('jumlahQ_8') : NULL,
			'jumlahQ_9' 				=> safe_post('jumlahQ_9') !== '' ? safe_post('jumlahQ_9') : NULL,
			'jumlahQ_10' 			=> safe_post('jumlahQ_10') !== '' ? safe_post('jumlahQ_10') : NULL,

			'jumlahQ_11' 			=> safe_post('jumlahQ_11') !== '' ? safe_post('jumlahQ_11') : NULL,
			'jumlahQ_12' 			=> safe_post('jumlahQ_12') !== '' ? safe_post('jumlahQ_12') : NULL,
			'jumlahQ_13' 			=> safe_post('jumlahQ_13') !== '' ? safe_post('jumlahQ_13') : NULL,
			'jumlahQ_14' 			=> safe_post('jumlahQ_14') !== '' ? safe_post('jumlahQ_14') : NULL,
			'jumlahQ_15' 			=> safe_post('jumlahQ_15') !== '' ? safe_post('jumlahQ_15') : NULL,
			'jumlahQ_16' 			=> safe_post('jumlahQ_16') !== '' ? safe_post('jumlahQ_16') : NULL,
			'jumlahQ_17' 			=> safe_post('jumlahQ_17') !== '' ? safe_post('jumlahQ_17') : NULL,
			'jumlahQ_18' 			=> safe_post('jumlahQ_18') !== '' ? safe_post('jumlahQ_18') : NULL,
			'jumlahQ_19' 			=> safe_post('jumlahQ_19') !== '' ? safe_post('jumlahQ_19') : NULL,
			'jumlahQ_20' 			=> safe_post('jumlahQ_20') !== '' ? safe_post('jumlahQ_20') : NULL,

			'jumlahQ_21' 			=> safe_post('jumlahQ_21') !== '' ? safe_post('jumlahQ_21') : NULL,
			'jumlahQ_22' 			=> safe_post('jumlahQ_22') !== '' ? safe_post('jumlahQ_22') : NULL,
			'jumlahQ_23' 			=> safe_post('jumlahQ_23') !== '' ? safe_post('jumlahQ_23') : NULL,
			'jumlahQ_24' 			=> safe_post('jumlahQ_24') !== '' ? safe_post('jumlahQ_24') : NULL,
			'jumlahQ_25' 			=> safe_post('jumlahQ_25') !== '' ? safe_post('jumlahQ_25') : NULL,
			'jumlahQ_26' 			=> safe_post('jumlahQ_26') !== '' ? safe_post('jumlahQ_26') : NULL,
			'jumlahQ_27' 			=> safe_post('jumlahQ_27') !== '' ? safe_post('jumlahQ_27') : NULL,
			'jumlahQ_28' 			=> safe_post('jumlahQ_28') !== '' ? safe_post('jumlahQ_28') : NULL,
			'jumlahQ_29' 			=> safe_post('jumlahQ_29') !== '' ? safe_post('jumlahQ_29') : NULL,
			'jumlahQ_30' 			=> safe_post('jumlahQ_30') !== '' ? safe_post('jumlahQ_30') : NULL,

			'jumlahQ_31' 			=> safe_post('jumlahQ_31') !== '' ? safe_post('jumlahQ_31') : NULL,
			'jumlahQ_32' 			=> safe_post('jumlahQ_32') !== '' ? safe_post('jumlahQ_32') : NULL,
			'jumlahQ_33' 			=> safe_post('jumlahQ_33') !== '' ? safe_post('jumlahQ_33') : NULL,
			'jumlahQ_34' 			=> safe_post('jumlahQ_34') !== '' ? safe_post('jumlahQ_34') : NULL,
			'jumlahQ_35' 			=> safe_post('jumlahQ_35') !== '' ? safe_post('jumlahQ_35') : NULL,
			'jumlahQ_36' 			=> safe_post('jumlahQ_36') !== '' ? safe_post('jumlahQ_36') : NULL,
			'jumlahQ_37' 			=> safe_post('jumlahQ_37') !== '' ? safe_post('jumlahQ_37') : NULL,
			'jumlahQ_38' 			=> safe_post('jumlahQ_38') !== '' ? safe_post('jumlahQ_38') : NULL,
			'jumlahQ_39' 			=> safe_post('jumlahQ_39') !== '' ? safe_post('jumlahQ_39') : NULL,
			'jumlahQ_40' 			=> safe_post('jumlahQ_40') !== '' ? safe_post('jumlahQ_40') : NULL,

			'jumlahQ_41' 			=> safe_post('jumlahQ_41') !== '' ? safe_post('jumlahQ_41') : NULL,
			'jumlahQ_42' 			=> safe_post('jumlahQ_42') !== '' ? safe_post('jumlahQ_42') : NULL,
			'jumlahQ_43' 			=> safe_post('jumlahQ_43') !== '' ? safe_post('jumlahQ_43') : NULL,
			'jumlahQ_44' 			=> safe_post('jumlahQ_44') !== '' ? safe_post('jumlahQ_44') : NULL,
			'jumlahQ_45' 			=> safe_post('jumlahQ_45') !== '' ? safe_post('jumlahQ_45') : NULL,
			'jumlahQ_46' 			=> safe_post('jumlahQ_46') !== '' ? safe_post('jumlahQ_46') : NULL,
			'jumlahQ_47' 			=> safe_post('jumlahQ_47') !== '' ? safe_post('jumlahQ_47') : NULL,
			'jumlahQ_48' 			=> safe_post('jumlahQ_48') !== '' ? safe_post('jumlahQ_48') : NULL,
			'jumlahQ_49' 			=> safe_post('jumlahQ_49') !== '' ? safe_post('jumlahQ_49') : NULL,
			'jumlahQ_50' 			=> safe_post('jumlahQ_50') !== '' ? safe_post('jumlahQ_50') : NULL,

			'jumlahQ_51' 			=> safe_post('jumlahQ_51') !== '' ? safe_post('jumlahQ_51') : NULL,
			'jumlahQ_52' 			=> safe_post('jumlahQ_52') !== '' ? safe_post('jumlahQ_52') : NULL,
			'jumlahQ_53' 			=> safe_post('jumlahQ_53') !== '' ? safe_post('jumlahQ_53') : NULL,
			'jumlahQ_54' 			=> safe_post('jumlahQ_54') !== '' ? safe_post('jumlahQ_54') : NULL,
			'jumlahQ_55' 			=> safe_post('jumlahQ_55') !== '' ? safe_post('jumlahQ_55') : NULL,
			'jumlahQ_56' 			=> safe_post('jumlahQ_56') !== '' ? safe_post('jumlahQ_56') : NULL,
			'jumlahQ_57' 			=> safe_post('jumlahQ_57') !== '' ? safe_post('jumlahQ_57') : NULL,
			'jumlahQ_58' 			=> safe_post('jumlahQ_58') !== '' ? safe_post('jumlahQ_58') : NULL,
			'jumlahQ_59' 			=> safe_post('jumlahQ_59') !== '' ? safe_post('jumlahQ_59') : NULL,
			'jumlahQ_60' 			=> safe_post('jumlahQ_60') !== '' ? safe_post('jumlahQ_60') : NULL,

			'jumlahQ_61' 			=> safe_post('jumlahQ_61') !== '' ? safe_post('jumlahQ_61') : NULL,
			'jumlahQ_62' 			=> safe_post('jumlahQ_62') !== '' ? safe_post('jumlahQ_62') : NULL,
			'jumlahQ_63' 			=> safe_post('jumlahQ_63') !== '' ? safe_post('jumlahQ_63') : NULL,
			'jumlahQ_64' 			=> safe_post('jumlahQ_64') !== '' ? safe_post('jumlahQ_64') : NULL,
			'jumlahQ_65' 			=> safe_post('jumlahQ_65') !== '' ? safe_post('jumlahQ_65') : NULL,

			'fentanyl' 				=> safe_post('fentanyl') !== '' ? safe_post('fentanyl') : NULL,
			'mo' 					=> safe_post('mo') !== '' ? safe_post('mo') : NULL,
			'pethidine' 			=> safe_post('pethidine') !== '' ? safe_post('pethidine') : NULL,
			'b02' 					=> safe_post('b02') !== '' ? safe_post('b02') : NULL,
			'n20' 					=> safe_post('n20') !== '' ? safe_post('n20') : NULL,
			'air' 					=> safe_post('air') !== '' ? safe_post('air') : NULL,
			'ett_no' 				=> safe_post('ett_no') !== '' ? safe_post('ett_no') : NULL,
			'ett_noT' 				=> safe_post('ett_noT') !== '' ? safe_post('ett_noT') : NULL,
			'ephedrine' 			=> safe_post('ephedrine') !== '' ? safe_post('ephedrine') : NULL,
			'iv_line' 				=> safe_post('iv_line') !== '' ? safe_post('iv_line') : NULL,
			'ett_nkk_no' 			=> safe_post('ett_nkk_no') !== '' ? safe_post('ett_nkk_no') : NULL,
			'ett_nkk_noT' 			=> safe_post('ett_nkk_noT') !== '' ? safe_post('ett_nkk_noT') : NULL,
			'ephineprine' 			=> safe_post('ephineprine') !== '' ? safe_post('ephineprine') : NULL,
			'tegaderm_no' 			=> safe_post('tegaderm_no') !== '' ? safe_post('tegaderm_no') : NULL,
			'tegaderm_noA' 			=> safe_post('tegaderm_noA') !== '' ? safe_post('tegaderm_noA') : NULL,
			'lma_no' 				=> safe_post('lma_no') !== '' ? safe_post('lma_no') : NULL,
			'lma_noY' 				=> safe_post('lma_noY') !== '' ? safe_post('lma_noY') : NULL,
			'adona' 				=> safe_post('adona') !== '' ? safe_post('adona') : NULL,
			'kalnex' 				=> safe_post('kalnex') !== '' ? safe_post('kalnex') : NULL,
			'vitk' 					=> safe_post('vitk') !== '' ? safe_post('vitk') : NULL,
			'dicinon' 				=> safe_post('dicinon') !== '' ? safe_post('dicinon') : NULL,
			'trheeway' 				=> safe_post('trheeway') !== '' ? safe_post('trheeway') : NULL,
			'trheewayA' 			=> safe_post('trheewayA') !== '' ? safe_post('trheewayA') : NULL,
			'guedel' 				=> safe_post('guedel') !== '' ? safe_post('guedel') : NULL,
			'npa_no' 				=> safe_post('npa_no') !== '' ? safe_post('npa_no') : NULL,
			'guedelG' 				=> safe_post('guedelG') !== '' ? safe_post('guedelG') : NULL,
			'invomit' 				=> safe_post('invomit') !== '' ? safe_post('invomit') : NULL,
			'granon' 				=> safe_post('granon') !== '' ? safe_post('granon') : NULL,
			'alkhohol_swab' 		=> safe_post('alkhohol_swab') !== '' ? safe_post('alkhohol_swab') : NULL,
			'bacteri_filter' 		=> safe_post('bacteri_filter') !== '' ? safe_post('bacteri_filter') : NULL,
			'gastridine' 			=> safe_post('gastridine') !== '' ? safe_post('gastridine') : NULL,
			'infus_set' 			=> safe_post('infus_set') !== '' ? safe_post('infus_set') : NULL,
			'blood_set' 			=> safe_post('blood_set') !== '' ? safe_post('blood_set') : NULL,
			'brething_circuit' 		=> safe_post('brething_circuit') !== '' ? safe_post('brething_circuit') : NULL,
			'sa' 					=> safe_post('sa') !== '' ? safe_post('sa') : NULL,
			'prostigmine' 			=> safe_post('prostigmine') !== '' ? safe_post('prostigmine') : NULL,
			'nasal_02' 				=> safe_post('nasal_02') !== '' ? safe_post('nasal_02') : NULL,
			'broadced' 				=> safe_post('broadced') !== '' ? safe_post('broadced') : NULL,
			'ceftriaxone' 			=> safe_post('ceftriaxone') !== '' ? safe_post('ceftriaxone') : NULL,
			'darmicum' 				=> safe_post('darmicum') !== '' ? safe_post('darmicum') : NULL,
			'sedacum' 				=> safe_post('sedacum') !== '' ? safe_post('sedacum') : NULL,
			'simple_mask' 			=> safe_post('simple_mask') !== '' ? safe_post('simple_mask') : NULL,
			'flagyl_drip' 			=> safe_post('flagyl_drip') !== '' ? safe_post('flagyl_drip') : NULL,
			'marcain_heavy' 		=> safe_post('marcain_heavy') !== '' ? safe_post('marcain_heavy') : NULL,
			'buvanes' 				=> safe_post('buvanes') !== '' ? safe_post('buvanes') : NULL,
			'decain' 				=> safe_post('decain') !== '' ? safe_post('decain') : NULL,
			'nrm' 					=> safe_post('nrm') !== '' ? safe_post('nrm') : NULL,
			'rm' 					=> safe_post('rm') !== '' ? safe_post('rm') : NULL,
			'texegram' 				=> safe_post('texegram') !== '' ? safe_post('texegram') : NULL,
			'propofol' 				=> safe_post('propofol') !== '' ? safe_post('propofol') : NULL,
			'recofol' 				=> safe_post('recofol') !== '' ? safe_post('recofol') : NULL,
			'proanes' 				=> safe_post('proanes') !== '' ? safe_post('proanes') : NULL,
			'elektroda_adult' 		=> safe_post('elektroda_adult') !== '' ? safe_post('elektroda_adult') : NULL,
			'ped' 					=> safe_post('ped') !== '' ? safe_post('ped') : NULL,
			'catapres' 				=> safe_post('catapres') !== '' ? safe_post('catapres') : NULL,
			'hansaplast' 			=> safe_post('hansaplast') !== '' ? safe_post('hansaplast') : NULL,
			'ketrobat_30mg' 		=> safe_post('ketrobat_30mg') !== '' ? safe_post('ketrobat_30mg') : NULL,
			'spinocant' 			=> safe_post('spinocant') !== '' ? safe_post('spinocant') : NULL,
			'no_24' 				=> safe_post('no_24') !== '' ? safe_post('no_24') : NULL,
			'no_27' 				=> safe_post('no_27') !== '' ? safe_post('no_27') : NULL,
			'orasic_100mg' 			=> safe_post('orasic_100mg') !== '' ? safe_post('orasic_100mg') : NULL,
			'pencan_no_27' 			=> safe_post('pencan_no_27') !== '' ? safe_post('pencan_no_27') : NULL,
			'farmodal' 				=> safe_post('farmodal') !== '' ? safe_post('farmodal') : NULL,
			'glofusal' 				=> safe_post('glofusal') !== '' ? safe_post('glofusal') : NULL,
			'glofusin' 				=> safe_post('glofusin') !== '' ? safe_post('glofusin') : NULL,
			'dynastat' 				=> safe_post('dynastat') !== '' ? safe_post('dynastat') : NULL,
			'ring_as' 				=> safe_post('ring_as') !== '' ? safe_post('ring_as') : NULL,
			'rlH' 					=> safe_post('rlH') !== '' ? safe_post('rlH') : NULL,
			'd5' 					=> safe_post('d5') !== '' ? safe_post('d5') : NULL,
			'rd' 					=> safe_post('rd') !== '' ? safe_post('rd') : NULL,
			'profenid' 				=> safe_post('profenid') !== '' ? safe_post('profenid') : NULL,
			'tramal_supp' 			=> safe_post('tramal_supp') !== '' ? safe_post('tramal_supp') : NULL,
			'nacl_25' 				=> safe_post('nacl_25') !== '' ? safe_post('nacl_25') : NULL,
			't100' 					=> safe_post('t100') !== '' ? safe_post('t100') : NULL,
			't500' 					=> safe_post('t500') !== '' ? safe_post('t500') : NULL,
			'paracetamol_supp_125mg' => safe_post('paracetamol_supp_125mg') !== '' ? safe_post('paracetamol_supp_125mg') : NULL,
			'futrolit' 				=> safe_post('futrolit') !== '' ? safe_post('futrolit') : NULL,
			'manitol' 				=> safe_post('manitol') !== '' ? safe_post('manitol') : NULL,
			'stesolid' 				=> safe_post('stesolid') !== '' ? safe_post('stesolid') : NULL,
			'S5c' 					=> safe_post('S5c') !== '' ? safe_post('S5c') : NULL,
			'S10c' 					=> safe_post('S10c') !== '' ? safe_post('S10c') : NULL,
			'heas' 					=> safe_post('heas') !== '' ? safe_post('heas') : NULL,
			'W130c' 				=> safe_post('W130c') !== '' ? safe_post('W130c') : NULL,
			'W200c' 				=> safe_post('W200c') !== '' ? safe_post('W200c') : NULL,
			'lasik' 				=> safe_post('lasik') !== '' ? safe_post('lasik') : NULL,
			'tridex' 				=> safe_post('tridex') !== '' ? safe_post('tridex') : NULL,
			't27a' 					=> safe_post('t27a') !== '' ? safe_post('t27a') : NULL,
			't27b' 					=> safe_post('t27b') !== '' ? safe_post('t27b') : NULL,
			'plain' 				=> safe_post('plain') !== '' ? safe_post('plain') : NULL,
			'reculax' 				=> safe_post('reculax') !== '' ? safe_post('reculax') : NULL,
			'traoum' 				=> safe_post('traoum') !== '' ? safe_post('traoum') : NULL,
			'ecron' 				=> safe_post('ecron') !== '' ? safe_post('ecron') : NULL,
			'emla_salep' 			=> safe_post('emla_salep') !== '' ? safe_post('emla_salep') : NULL,
			'kalmethason' 			=> safe_post('kalmethason') !== '' ? safe_post('kalmethason') : NULL,
			'y4mg' 					=> safe_post('y4mg') !== '' ? safe_post('y4mg') : NULL,
			'y5mg' 					=> safe_post('y5mg') !== '' ? safe_post('y5mg') : NULL,
			'chatheter_tip_50cc' 	=> safe_post('chatheter_tip_50cc') !== '' ? safe_post('chatheter_tip_50cc') : NULL,
			'syntonicon' 			=> safe_post('syntonicon') !== '' ? safe_post('syntonicon') : NULL,
			'methergine' 			=> safe_post('methergine') !== '' ? safe_post('methergine') : NULL,
			'extensiontube' 		=> safe_post('extensiontube') !== '' ? safe_post('extensiontube') : NULL,
			'citotex' 				=> safe_post('citotex') !== '' ? safe_post('citotex') : NULL,
			'gastrul' 				=> safe_post('gastrul') !== '' ? safe_post('gastrul') : NULL,
			'xylocainjlly' 			=> safe_post('xylocainjlly') !== '' ? safe_post('xylocainjlly') : NULL,
			'alinaminf' 			=> safe_post('alinaminf') !== '' ? safe_post('alinaminf') : NULL,
			'ngt_no' 				=> safe_post('ngt_no') !== '' ? safe_post('ngt_no') : NULL,
			'ngt_noX' 				=> safe_post('ngt_noX') !== '' ? safe_post('ngt_noX') : NULL,
			'dopamin' 				=> safe_post('dopamin') !== '' ? safe_post('dopamin') : NULL,
			'vascon' 				=> safe_post('vascon') !== '' ? safe_post('vascon') : NULL,
			'cathurine' 			=> safe_post('cathurine') !== '' ? safe_post('cathurine') : NULL,
			'cathurineNO' 			=> safe_post('cathurineNO') !== '' ? safe_post('cathurineNO') : NULL,
			'nakoba' 				=> safe_post('nakoba') !== '' ? safe_post('nakoba') : NULL,
			'urinebag' 				=> safe_post('urinebag') !== '' ? safe_post('urinebag') : NULL,
			'aminophillin' 			=> safe_post('aminophillin') !== '' ? safe_post('aminophillin') : NULL,
			'selangsuccen' 			=> safe_post('selangsuccen') !== '' ? safe_post('selangsuccen') : NULL,
			'sevo' 					=> safe_post('sevo') !== '' ? safe_post('sevo') : NULL,
			'isoflurane' 			=> safe_post('isoflurane') !== '' ? safe_post('isoflurane') : NULL,
			'cathetersuction' 		=> safe_post('cathetersuction') !== '' ? safe_post('cathetersuction') : NULL,
			'cathetersuctionA' 		=> safe_post('cathetersuctionA') !== '' ? safe_post('cathetersuctionA') : NULL,
		);
		$this->m_order_operasi->updatePemakaianAlkesDanObatAnestesi($data_padoa);

		if (!empty($respon)) {

			$response = $respon;
		} else {

			$response = null;
		}

		if ($this->db->trans_status() === false) :
			$this->db->trans_rollback();
			$status = false;
		else :
			$this->db->trans_commit();
			$status = true;
		endif;

		$message = array(
			'status' => $status,
			'token'  => $this->security->get_csrf_hash(),
			'id'     => $layanan['id'],
			'respon' => $response,
		);
		$this->response($message, REST_Controller::HTTP_OK);
	}



	// RH LOG
	function get_rehabilitas_medik_get(){
		$data['pendaftaran_detail'] = "";
		$data['list_rehabilitas_medik'] = [];
		$data = $this->m_order_operasi->getPendaftaranDetailTindakan($this->get('id_pendaftaran', true), $this->get('id_layanan', true));
		$data['pendaftaran_detail'] = $this->m_order_operasi->getPendaftaranDetailOperasi($this->get('id_layanan_pendaftaran'));
		$data['list_rehabilitas_medik'] = $this->m_order_operasi->getRehabilitasMedik($this->get('id_pendaftaran'));	
		$data['list_rehabilitas_medik_logs'] = $this->m_order_operasi->getRehabilitasMedikLogs($this->get('id_pendaftaran'));	
		$data['diagnosa'] = $this->m_order_operasi->getDataRehabilitasDiagnosa($this->get('id_pendaftaran'));
		$data['anamnesa'] = $this->m_order_operasi->getDataRehabilitasAnamnesa($this->get('id_pendaftaran'));
		$data['tindakan'] = $this->m_order_operasi->getDataRehabilitasTindakan($this->get('id_pendaftaran'));
		if ($data != null) {
			$this->response($data, REST_Controller::HTTP_OK);
		} else {
			$this->response($data, REST_Controller::HTTP_OK);
		}
	}

	// RH LOG
	function simpan_rehabilitas_medik_post(){
		$checkDataRehabilitas = '';
		if (safe_post('id_rehabilitas') !== '') {
			$checkDataRehabilitas = $this->m_order_operasi->getRehabilitasMedikByID(safe_post('id_rehabilitas'));
		}
		$this->db->trans_begin();
	
		if (empty($checkDataRehabilitas)) {
			// INSERT DATA
			$data = array(
				'id_pendaftaran'            		=> safe_post('id_pendaftaran'),
				'id_layanan_pendaftaran'    		=> safe_post('id_layanan_pendaftaran'),
				'tgl_pelayanan_rehabilitas'         => safe_post('tgl_pelayanan_rehabilitas') == '' ? null : date2mysql(safe_post('tgl_pelayanan_rehabilitas')),
				'anamnesa_rehabilitas'              => safe_post('anamnesa_rehabilitas') == '' ? null : safe_post('anamnesa_rehabilitas'),
				'pemeriksaan_rehabilitas'           => safe_post('pemeriksaan_rehabilitas') == '' ? null : safe_post('pemeriksaan_rehabilitas'),
				'diagnosis_medis_rehabilitas'       => safe_post('diagnosis_medis_rehabilitas') == '' ? null : safe_post('diagnosis_medis_rehabilitas'),
				'diagnosis_fungsi_rehabilitas'      => safe_post('diagnosis_fungsi_rehabilitas') == '' ? null : safe_post('diagnosis_fungsi_rehabilitas'),
				'pmeriksaan_penunjang_rehabilitas'  => safe_post('pmeriksaan_penunjang_rehabilitas') == '' ? null : safe_post('pmeriksaan_penunjang_rehabilitas'),
				'tata_laksana_rehabilitas'          => safe_post('tata_laksana_rehabilitas') == '' ? null : safe_post('tata_laksana_rehabilitas'),
				'rekomendasi_rehabilitas'           => safe_post('rekomendasi_rehabilitas') == '' ? null : safe_post('rekomendasi_rehabilitas'),
				'evaluasi_disabilitas'              => safe_post('evaluasi_disabilitas') == '' ? null : safe_post('evaluasi_disabilitas'),
				'suspek_rehabilitas'               	=> safe_post('suspek_rehabilitas') == '' ? null : safe_post('suspek_rehabilitas'),
				'tanggal_rehabilitas'             	=> safe_post('tanggal_rehabilitas') == '' ? null : date2mysql(safe_post('tanggal_rehabilitas')),
				'dokter_rehabilitas'               	=> safe_post('dokter_rehabilitas') == '' ? null : safe_post('dokter_rehabilitas'),
				'id_users'                  		=> $this->session->userdata('id_translucent'),
				'created_date'              		=> $this->datetime,
				'updated_at'                		=> $this->datetime
			);
			$this->db->insert('sm_rehabilitas_medik', $data);
	
		} else {
			// UPDATE DATA
			$data = array(
				'tgl_pelayanan_rehabilitas'         => safe_post('tgl_pelayanan_rehabilitas') == '' ? null : date2mysql(safe_post('tgl_pelayanan_rehabilitas')),
				'anamnesa_rehabilitas'              => safe_post('anamnesa_rehabilitas') == '' ? null : safe_post('anamnesa_rehabilitas'),
				'pemeriksaan_rehabilitas'           => safe_post('pemeriksaan_rehabilitas') == '' ? null : safe_post('pemeriksaan_rehabilitas'),
				'diagnosis_medis_rehabilitas'       => safe_post('diagnosis_medis_rehabilitas') == '' ? null : safe_post('diagnosis_medis_rehabilitas'),
				'diagnosis_fungsi_rehabilitas'      => safe_post('diagnosis_fungsi_rehabilitas') == '' ? null : safe_post('diagnosis_fungsi_rehabilitas'),
				'pmeriksaan_penunjang_rehabilitas'  => safe_post('pmeriksaan_penunjang_rehabilitas') == '' ? null : safe_post('pmeriksaan_penunjang_rehabilitas'),
				'tata_laksana_rehabilitas'          => safe_post('tata_laksana_rehabilitas') == '' ? null : safe_post('tata_laksana_rehabilitas'),
				'rekomendasi_rehabilitas'           => safe_post('rekomendasi_rehabilitas') == '' ? null : safe_post('rekomendasi_rehabilitas'),
				'evaluasi_disabilitas'              => safe_post('evaluasi_disabilitas') == '' ? null : safe_post('evaluasi_disabilitas'),
				'suspek_rehabilitas'               	=> safe_post('suspek_rehabilitas') == '' ? null : safe_post('suspek_rehabilitas'),
				'tanggal_rehabilitas'             	=> safe_post('tanggal_rehabilitas') == '' ? null : date2mysql(safe_post('tanggal_rehabilitas')),
				'dokter_rehabilitas'               	=> safe_post('dokter_rehabilitas') == '' ? null : safe_post('dokter_rehabilitas'),
				'id_users'                  		=> $this->session->userdata('id_translucent'),
				'updated_at'                		=> $this->datetime
			);
	
			// HANYA SIMPAN FIELD VALID KE DALAM LOG
			$logData = array(
				// 'id'                      => $checkDataRehabilitas->id,
				'id_pendaftaran'          			=> $checkDataRehabilitas->id_pendaftaran,
				'id_layanan_pendaftaran'  			=> $checkDataRehabilitas->id_layanan_pendaftaran,
				'tgl_pelayanan_rehabilitas'         => $checkDataRehabilitas->tgl_pelayanan_rehabilitas,
				'anamnesa_rehabilitas'             	=> $checkDataRehabilitas->anamnesa_rehabilitas,
				'pemeriksaan_rehabilitas'           => $checkDataRehabilitas->pemeriksaan_rehabilitas,
				'diagnosis_medis_rehabilitas'       => $checkDataRehabilitas->diagnosis_medis_rehabilitas,
				'diagnosis_fungsi_rehabilitas'      => $checkDataRehabilitas->diagnosis_fungsi_rehabilitas,
				'pmeriksaan_penunjang_rehabilitas'  => $checkDataRehabilitas->pmeriksaan_penunjang_rehabilitas,
				'tata_laksana_rehabilitas'          => $checkDataRehabilitas->tata_laksana_rehabilitas,
				'rekomendasi_rehabilitas'           => $checkDataRehabilitas->rekomendasi_rehabilitas,
				'evaluasi_disabilitas'             	=> $checkDataRehabilitas->evaluasi_disabilitas,
				'suspek_rehabilitas'             	=> $checkDataRehabilitas->suspek_rehabilitas,
				'tanggal_rehabilitas'             	=> $checkDataRehabilitas->tanggal_rehabilitas,
				'dokter_rehabilitas'             	=> $checkDataRehabilitas->dokter_rehabilitas,
				'id_users'                			=> $checkDataRehabilitas->id_users,
				'created_date'            			=> $checkDataRehabilitas->created_date,
				'updated_at'            			=> $this->datetime,
				'log_action'              			=> 'update'
			);
			$this->db->insert('sm_rehabilitas_medik_logs', $logData);
	
			$this->db->where('id', safe_post('id_rehabilitas'));
			$this->db->update('sm_rehabilitas_medik', $data);
		}
	
		if ($this->db->trans_status() === false) {
			$this->db->trans_rollback();
			$status = false;
			$message = 'Gagal simpan Data';
		} else {
			$this->db->trans_commit();
			$status = true;
			$message = 'Berhasil simpan Data';
		}
	
		$this->response(array('status' => $status, 'message' => $message), REST_Controller::HTTP_OK);
	}

	// RH LOG
	function hapus_rehabilitas_medik_post(){
		if (!safe_post('id', true)) :
			$this->response(null, REST_Controller::HTTP_BAD_REQUEST);
		endif;
	
		// Ambil data sebelum dihapus
		$rehabilitas = $this->db->where('id', safe_post('id'))->get('sm_rehabilitas_medik')->row();
	
		$this->db->trans_begin();
	
		if ($rehabilitas) {
			// Simpan ke log
			$logData = array(
				'id_pendaftaran'          			=> $rehabilitas->id_pendaftaran,
				'id_layanan_pendaftaran'  			=> $rehabilitas->id_layanan_pendaftaran,
				'tgl_pelayanan_rehabilitas'         => $rehabilitas->tgl_pelayanan_rehabilitas,
				'anamnesa_rehabilitas'             	=> $rehabilitas->anamnesa_rehabilitas,
				'pemeriksaan_rehabilitas'           => $rehabilitas->pemeriksaan_rehabilitas,
				'diagnosis_medis_rehabilitas'       => $rehabilitas->diagnosis_medis_rehabilitas,
				'diagnosis_fungsi_rehabilitas'      => $rehabilitas->diagnosis_fungsi_rehabilitas,
				'pmeriksaan_penunjang_rehabilitas'  => $rehabilitas->pmeriksaan_penunjang_rehabilitas,
				'tata_laksana_rehabilitas'          => $rehabilitas->tata_laksana_rehabilitas,
				'rekomendasi_rehabilitas'           => $rehabilitas->rekomendasi_rehabilitas,
				'evaluasi_disabilitas'             	=> $rehabilitas->evaluasi_disabilitas,
				'suspek_rehabilitas'             	=> $rehabilitas->suspek_rehabilitas,
				'tanggal_rehabilitas'             	=> $rehabilitas->tanggal_rehabilitas,
				'dokter_rehabilitas'             	=> $rehabilitas->dokter_rehabilitas,
				'id_users'                			=> $rehabilitas->id_users,
				'created_date'            			=> $rehabilitas->created_date,
				'updated_at'            			=> $this->datetime,
				'log_action'              			=> 'delete'
			);
			$this->db->insert('sm_rehabilitas_medik_logs', $logData);
		}
	
		// Hapus data utama
		$this->db->where('id', safe_post('id'))->delete('sm_rehabilitas_medik');
	
		if ($this->db->trans_status() === false) :
			$this->db->trans_rollback();
			$status = false;
			$message = 'Gagal Hapus Data';
		else :
			$this->db->trans_commit();
			$status = true;
			$message = 'Berhasil Hapus Data';
		endif;
	
		$this->response(array('status' => $status, 'message' => $message), REST_Controller::HTTP_OK);
	}
	
	// RH
	function edit_rehabilitas_medik_get(){
		$data['pendaftaran_detail'] = "";
		$data['rehabilitas_medik'] = "";
		$data['pendaftaran_detail'] = $this->m_order_operasi->getPendaftaranDetailOperasi($this->get('id_layanan_pendaftaran'));
		$data['rehabilitas_medik'] = $this->m_order_operasi->getRehabilitasMedikByID($this->get('id'));
		if ($data != null) {
			$this->response($data, REST_Controller::HTTP_OK);
		} else {
			$this->response($data, REST_Controller::HTTP_OK);
		}
	}


	// CPKJI
	function get_data_entri_catatan_perhitungan_kasa_get(){
		if (!$this->get('id')) :
			$this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
		endif;
		$data = $this->m_pendaftaran->getPendaftaranDetail($this->get('id', true), $this->get('id_layanan', true));
		$data['catatan_perhitungan_kasa_jarum_instrumen']  = $this->m_order_operasi->getCatatanPerhitunganKasaJarumInstrumen($data['layanan']->id_pendaftaran);
		if ($data) :
			$this->response($data, REST_Controller::HTTP_OK); // (200)
		endif;
	}

	// CPKJI
	function get_data_entri_catatan_perhitungan_kasa_logs_get(){
		if (!$this->get('id', true)) :
			$this->response(null, REST_Controller::HTTP_BAD_REQUEST);
		endif;
		$data = $this->m_order_operasi->getCatatanPerhitunganKasaJarumInstrumen($this->get('id', true));
		$this->response($data, REST_Controller::HTTP_OK);
	}

	// CPKJI
	function simpan_entri_catatan_perhitungan_kasa_post(){
		$layanan = array('id' => safe_post('id_layanan_pendaftaran'));
		$this->db->trans_begin();
		$catatanPerhitunganKasaJarumInstrumen = array(
			'id_layanan_pendaftaran' => $layanan['id'],
			'id_pendaftaran'          => safe_post('id_pendaftaran'),
			'id_users'             => $this->session->userdata('id_translucent'),
			'id_cpkji'          => safe_post('id_cpkji'),
	
			'raytec' => json_encode([
			'raytec_1' => safe_post('raytec_1') !== '' ? safe_post('raytec_1') : null,
			'raytec_2' => safe_post('raytec_2') !== '' ? safe_post('raytec_2') : null,
			'raytec_3' => safe_post('raytec_3') !== '' ? safe_post('raytec_3') : null,
			'raytec_4' => safe_post('raytec_4') !== '' ? safe_post('raytec_4') : null,
			'raytec_5' => safe_post('raytec_5') !== '' ? safe_post('raytec_5') : null,
			'raytec_6' => safe_post('raytec_6') !== '' ? safe_post('raytec_6') : null,
			'raytec_7' => safe_post('raytec_7') !== '' ? safe_post('raytec_7') : null,
			'raytec_8' => safe_post('raytec_8') !== '' ? safe_post('raytec_8') : null,
			'raytec_9' => safe_post('raytec_9') !== '' ? safe_post('raytec_9') : null,
			'raytec_10' => safe_post('raytec_10') !== '' ? safe_post('raytec_10') : null,
			]),
	
			'laps' => json_encode([
			'laps_1' => safe_post('laps_1') !== '' ? safe_post('laps_1') : null,
			'laps_2' => safe_post('laps_2') !== '' ? safe_post('laps_2') : null,
			'laps_3' => safe_post('laps_3') !== '' ? safe_post('laps_3') : null,
			'laps_4' => safe_post('laps_4') !== '' ? safe_post('laps_4') : null,
			'laps_5' => safe_post('laps_5') !== '' ? safe_post('laps_5') : null,
			'laps_6' => safe_post('laps_6') !== '' ? safe_post('laps_6') : null,
			'laps_7' => safe_post('laps_7') !== '' ? safe_post('laps_7') : null,
			'laps_8' => safe_post('laps_8') !== '' ? safe_post('laps_8') : null,
			'laps_9' => safe_post('laps_9') !== '' ? safe_post('laps_9') : null,
			'laps_10' => safe_post('laps_10') !== '' ? safe_post('laps_10') : null,
			]),
	
			'depper' => json_encode([
			'depper_1' => safe_post('depper_1') !== '' ? safe_post('depper_1') : null,
			'depper_2' => safe_post('depper_2') !== '' ? safe_post('depper_2') : null,
			'depper_3' => safe_post('depper_3') !== '' ? safe_post('depper_3') : null,
			'depper_4' => safe_post('depper_4') !== '' ? safe_post('depper_4') : null,
			'depper_5' => safe_post('depper_5') !== '' ? safe_post('depper_5') : null,
			'depper_6' => safe_post('depper_6') !== '' ? safe_post('depper_6') : null,
			'depper_7' => safe_post('depper_7') !== '' ? safe_post('depper_7') : null,
			'depper_8' => safe_post('depper_8') !== '' ? safe_post('depper_8') : null,
			'depper_9' => safe_post('depper_9') !== '' ? safe_post('depper_9') : null,
			'depper_10' => safe_post('depper_10') !== '' ? safe_post('depper_10') : null,
			]),
	
			'blade' => json_encode([
			'blade_1' => safe_post('blade_1') !== '' ? safe_post('blade_1') : null,
			'blade_2' => safe_post('blade_2') !== '' ? safe_post('blade_2') : null,
			'blade_3' => safe_post('blade_3') !== '' ? safe_post('blade_3') : null,
			'blade_4' => safe_post('blade_4') !== '' ? safe_post('blade_4') : null,
			'blade_5' => safe_post('blade_5') !== '' ? safe_post('blade_5') : null,
			'blade_6' => safe_post('blade_6') !== '' ? safe_post('blade_6') : null,
			'blade_7' => safe_post('blade_7') !== '' ? safe_post('blade_7') : null,
			'blade_8' => safe_post('blade_8') !== '' ? safe_post('blade_8') : null,
			'blade_9' => safe_post('blade_9') !== '' ? safe_post('blade_9') : null,
			'blade_10' => safe_post('blade_10') !== '' ? safe_post('blade_10') : null,
			]),
	
			'tape' => json_encode([
			'tape_1' => safe_post('tape_1') !== '' ? safe_post('tape_1') : null,
			'tape_2' => safe_post('tape_2') !== '' ? safe_post('tape_2') : null,
			'tape_3' => safe_post('tape_3') !== '' ? safe_post('tape_3') : null,
			'tape_4' => safe_post('tape_4') !== '' ? safe_post('tape_4') : null,
			'tape_5' => safe_post('tape_5') !== '' ? safe_post('tape_5') : null,
			'tape_6' => safe_post('tape_6') !== '' ? safe_post('tape_6') : null,
			'tape_7' => safe_post('tape_7') !== '' ? safe_post('tape_7') : null,
			'tape_8' => safe_post('tape_8') !== '' ? safe_post('tape_8') : null,
			'tape_9' => safe_post('tape_9') !== '' ? safe_post('tape_9') : null,
			'tape_10' => safe_post('tape_10') !== '' ? safe_post('tape_10') : null,
			]),
	
			'jjarum' => json_encode([
			'jjarum_1' => safe_post('jjarum_1') !== '' ? safe_post('jjarum_1') : null,
			'jjarum_2' => safe_post('jjarum_2') !== '' ? safe_post('jjarum_2') : null,
			'jjarum_3' => safe_post('jjarum_3') !== '' ? safe_post('jjarum_3') : null,
			'jjarum_4' => safe_post('jjarum_4') !== '' ? safe_post('jjarum_4') : null,
			'jjarum_5' => safe_post('jjarum_5') !== '' ? safe_post('jjarum_5') : null,
			'jjarum_6' => safe_post('jjarum_6') !== '' ? safe_post('jjarum_6') : null,
			'jjarum_7' => safe_post('jjarum_7') !== '' ? safe_post('jjarum_7') : null,
			'jjarum_8' => safe_post('jjarum_8') !== '' ? safe_post('jjarum_8') : null,
			'jjarum_9' => safe_post('jjarum_9') !== '' ? safe_post('jjarum_9') : null,
			'jjarum_10' => safe_post('jjarum_10') !== '' ? safe_post('jjarum_10') : null,
			]),
	
			'pledget' => json_encode([
			'pledget_1' => safe_post('pledget_1') !== '' ? safe_post('pledget_1') : null,
			'pledget_2' => safe_post('pledget_2') !== '' ? safe_post('pledget_2') : null,
			'pledget_3' => safe_post('pledget_3') !== '' ? safe_post('pledget_3') : null,
			'pledget_4' => safe_post('pledget_4') !== '' ? safe_post('pledget_4') : null,
			'pledget_5' => safe_post('pledget_5') !== '' ? safe_post('pledget_5') : null,
			'pledget_6' => safe_post('pledget_6') !== '' ? safe_post('pledget_6') : null,
			'pledget_7' => safe_post('pledget_7') !== '' ? safe_post('pledget_7') : null,
			'pledget_8' => safe_post('pledget_8') !== '' ? safe_post('pledget_8') : null,
			'pledget_9' => safe_post('pledget_9') !== '' ? safe_post('pledget_9') : null,
			'pledget_10' => safe_post('pledget_10') !== '' ? safe_post('pledget_10') : null,
			]),
	
			'drain' => json_encode([
			'drain_1' => safe_post('drain_1') !== '' ? safe_post('drain_1') : null,
			'drain_2' => safe_post('drain_2') !== '' ? safe_post('drain_2') : null,
			'drain_3' => safe_post('drain_3') !== '' ? safe_post('drain_3') : null,
			'drain_4' => safe_post('drain_4') !== '' ? safe_post('drain_4') : null,
			'drain_5' => safe_post('drain_5') !== '' ? safe_post('drain_5') : null,
			'drain_6' => safe_post('drain_6') !== '' ? safe_post('drain_6') : null,
			'drain_7' => safe_post('drain_7') !== '' ? safe_post('drain_7') : null,
			'drain_8' => safe_post('drain_8') !== '' ? safe_post('drain_8') : null,
			'drain_9' => safe_post('drain_9') !== '' ? safe_post('drain_9') : null,
			'drain_10' => safe_post('drain_10') !== '' ? safe_post('drain_10') : null,
			]),
	
			'innstrumen' => json_encode([
			'innstrumen_1' => safe_post('innstrumen_1') !== '' ? safe_post('innstrumen_1') : null,
			'innstrumen_2' => safe_post('innstrumen_2') !== '' ? safe_post('innstrumen_2') : null,
			'innstrumen_3' => safe_post('innstrumen_3') !== '' ? safe_post('innstrumen_3') : null,
			'innstrumen_4' => safe_post('innstrumen_4') !== '' ? safe_post('innstrumen_4') : null,
			'innstrumen_5' => safe_post('innstrumen_5') !== '' ? safe_post('innstrumen_5') : null,
			'innstrumen_6' => safe_post('innstrumen_6') !== '' ? safe_post('innstrumen_6') : null,
			'innstrumen_7' => safe_post('innstrumen_7') !== '' ? safe_post('innstrumen_7') : null,
			'innstrumen_8' => safe_post('innstrumen_8') !== '' ? safe_post('innstrumen_8') : null,
			'innstrumen_9' => safe_post('innstrumen_9') !== '' ? safe_post('innstrumen_9') : null,
			'innstrumen_10' => safe_post('innstrumen_10') !== '' ? safe_post('innstrumen_10') : null,
			]),
	
			'laint' => json_encode([
			'laint_1' => safe_post('laint_1') !== '' ? safe_post('laint_1') : null,
			'laint_2' => safe_post('laint_2') !== '' ? safe_post('laint_2') : null,
			'laint_3' => safe_post('laint_3') !== '' ? safe_post('laint_3') : null,
			'laint_4' => safe_post('laint_4') !== '' ? safe_post('laint_4') : null,
			'laint_5' => safe_post('laint_5') !== '' ? safe_post('laint_5') : null,
			'laint_6' => safe_post('laint_6') !== '' ? safe_post('laint_6') : null,
			'laint_7' => safe_post('laint_7') !== '' ? safe_post('laint_7') : null,
			'laint_8' => safe_post('laint_8') !== '' ? safe_post('laint_8') : null,
			'laint_9' => safe_post('laint_9') !== '' ? safe_post('laint_9') : null,
			'laint_10' => safe_post('laint_10') !== '' ? safe_post('laint_10') : null,
			]),
	
			'ro' => json_encode([
			'ro_1' => safe_post('ro_1') !== '' ? safe_post('ro_1') : null,
			'ro_2' => safe_post('ro_2') !== '' ? safe_post('ro_2') : null,
			'ro_3' => safe_post('ro_3') !== '' ? safe_post('ro_3') : null,
			'ro_4' => safe_post('ro_4') !== '' ? safe_post('ro_4') : null,
			'ro_5' => safe_post('ro_5') !== '' ? safe_post('ro_5') : null,
			'ro_6' => safe_post('ro_6') !== '' ? safe_post('ro_6') : null,
			'ro_7' => safe_post('ro_7') !== '' ? safe_post('ro_7') : null,
			'ro_8' => safe_post('ro_8') !== '' ? safe_post('ro_8') : null,
			'ro_9' => safe_post('ro_9') !== '' ? safe_post('ro_9') : null,
			'ro_10' => safe_post('ro_10') !== '' ? safe_post('ro_10') : null,
			'ro_11' => safe_post('ro_11') !== '' ? safe_post('ro_11') : null,
			]),
	
			'or' => json_encode([
			'or_1' => safe_post('or_1') !== '' ? safe_post('or_1') : null,
			'or_2' => safe_post('or_2') !== '' ? safe_post('or_2') : null,
			'or_3' => safe_post('or_3') !== '' ? safe_post('or_3') : null,
			'or_4' => safe_post('or_4') !== '' ? safe_post('or_4') : null,
			'or_5' => safe_post('or_5') !== '' ? safe_post('or_5') : null,
			'or_6' => safe_post('or_6') !== '' ? safe_post('or_6') : null,
			'or_7' => safe_post('or_7') !== '' ? safe_post('or_7') : null,
			'or_8' => safe_post('or_8') !== '' ? safe_post('or_8') : null,
			'or_9' => safe_post('or_9') !== '' ? safe_post('or_9') : null,
			'or_10' => safe_post('or_10') !== '' ? safe_post('or_10') : null,
			'or_11' => safe_post('or_11') !== '' ? safe_post('or_11') : null,
			]),
	
			'peerawat_1'     => safe_post('peerawat_1') !== '' ? safe_post('peerawat_1') : NULL,
			'tanggal_c' 	=> safe_post('tanggal_c') == '' ? null : date2mysql(safe_post('tanggal_c')),
			'jenis_operasi'   => safe_post('jenis_operasi') !== '' ? safe_post('jenis_operasi') : NULL,
			'jam_mulai_c'     => safe_post('jam_mulai_c') !== '' ? safe_post('jam_mulai_c') : NULL,
			'jam_selesai_c'   => safe_post('jam_selesai_c') !== '' ? safe_post('jam_selesai_c') : NULL,
			'lain_c'       => safe_post('lain_c') !== '' ? safe_post('lain_c') : NULL,
	
			'jummlah_c' => json_encode([
			'jummlah_c_1' => safe_post('jummlah_c_1') !== '' ? safe_post('jummlah_c_1') : null,
			'jummlah_c_1' => safe_post('jummlah_c_1') !== '' ? safe_post('jummlah_c_1') : null,
			'jummlah_c_3' => safe_post('jummlah_c_3') !== '' ? safe_post('jummlah_c_3') : null,
			'jummlah_c_3' => safe_post('jummlah_c_3') !== '' ? safe_post('jummlah_c_3') : null,
			'jummlah_c_5' => safe_post('jummlah_c_5') !== '' ? safe_post('jummlah_c_5') : null,
			'jummlah_c_5' => safe_post('jummlah_c_5') !== '' ? safe_post('jummlah_c_5') : null,
			'jummlah_c_7' => safe_post('jummlah_c_7') !== '' ? safe_post('jummlah_c_7') : null,
			'jummlah_c_7' => safe_post('jummlah_c_7') !== '' ? safe_post('jummlah_c_7') : null,
			'jummlah_c_9' => safe_post('jummlah_c_9') !== '' ? safe_post('jummlah_c_9') : null,
			'jummlah_c_9' => safe_post('jummlah_c_9') !== '' ? safe_post('jummlah_c_9') : null,
			]),
	
			'dokterr_1'   => safe_post('dokterr_1') !== '' ? safe_post('dokterr_1') : NULL,
			'peerawat_2'   => safe_post('peerawat_2') !== '' ? safe_post('peerawat_2') : NULL,
			'peerawat_3'   => safe_post('peerawat_3') !== '' ? safe_post('peerawat_3') : NULL,
	
			'ttd_1'   => safe_post('ttd_1') !== '' ? safe_post('ttd_1') : NULL,
			'ttd_2'   => safe_post('ttd_2') !== '' ? safe_post('ttd_2') : NULL,
			'ttd_3'   => safe_post('ttd_3') !== '' ? safe_post('ttd_3') : NULL,	
		);
		$this->m_order_operasi->updateCatatanPerhitunganKasaJarumInstrumen($catatanPerhitunganKasaJarumInstrumen);

		if (!empty($respon)) {
	
			$response = $respon;
		} else {
	
			$response = null;
		}
	
		if ($this->db->trans_status() === false) :
			$this->db->trans_rollback();
			$status = false;
		else :
			$this->db->trans_commit();
			$status = true;
		endif;
	
		$message = array(
			'status' => $status,
			'token'  => $this->security->get_csrf_hash(),
			'id'     => $layanan['id'],
			'respon' => $response,
		);
  
	  	$this->response($message, REST_Controller::HTTP_OK);
	}


	
}
