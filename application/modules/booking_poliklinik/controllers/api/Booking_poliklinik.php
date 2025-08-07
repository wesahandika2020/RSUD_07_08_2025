<?php

defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';
require_once APPPATH . 'libraries/EscposPrinter/EscposPrint.php';
require_once APPPATH . 'libraries/EscposPrinter/NetworkConnector.php';

use Restserver\Libraries\REST_Controller;
use Mike42\Escpos\Printer;

/**
 * @package         CodeIgniter
 * @subpackage      Rest Server
 * @category        Controller
 * @author          Faiz Muhammad Syam
 * @license         Syams Corporation
 */
class Booking_poliklinik extends REST_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->limit    = 10;
		$this->datetime = date('Y-m-d H:i:s');
		$this->load->model('Booking_poliklinik_model', 'm_booking');
		$this->load->model('vclaim_bpjs/Sep_v2_model', 'm_sep_v2');
		$this->load->model('App_model', 'm_default');
		$this->load->model('antrian_bpjs/Antrian_bpjs_model', 'antrian');
		$this->load->model('pelayanan/Pelayanan_model', 'pelayanan');
		$this->load->model('pendaftaran/Pendaftaran_model', 'klinik');

		$this->code    = 400;
		$this->message = "Tidak terhubung dengan Server BPJS, Server BPJS sedang bermasalah. Silahkan Hubungi Pihak IT BPJS";

		$id_translucent = $this->session->userdata('id_translucent');
		if (empty($id_translucent)) :
			$this->response(array('error' => 'Anda belum login'), REST_Controller::HTTP_UNAUTHORIZED);
			exit();
		endif;

				$this->bpjs_config = $this->default->getConfigBPJSV2();
		// $this->bpjs_config = (object) [
		// 	'server'     => 'https://apijkn.bpjs-kesehatan.go.id/vclaim-rest',
		// 	'cons_id'    => 22178,
		// 	'secret_key' => '5xJF9FD078',
		// 	'no_ppk'     => '0223R038',
		// 	'user_key'   => '80d402801bf7653318ee305235880de8'
		// ];

		// $this->antrean_config = $this->default->getConfigAntrianBPJS();
		$this->antrean_config = (object) [
			'server'     => 'https://apijkn.bpjs-kesehatan.go.id/antreanrs/',
			'cons_id'    => 22178,
			'secret_key' => '5xJF9FD078',
			'no_ppk'     => '0223R038',
			'user_key'   => 'c8f239eb9e8518495f470eaeeaf79362'
		];

		$user = $this->session->userdata('nama');
		$this->ip_printer = '10.3.31.201';

		if ($user === 'APM Pendaftaran') {
			$this->ip_printer = '10.1.10.249';
		}else if($user === 'APM Pendaftaran 2'){
			$this->ip_printer = '10.4.40.246';
		}else if($user === 'APM Pendaftaran 3'){
			$this->ip_printer = '10.1.10.239';
		}else if($user === 'APM Pendaftaran 4'){
			$this->ip_printer = '10.1.10.243';
		}else if($user === 'APM NS'){
			$this->ip_printer = '10.1.10.223';
		}else if($user === 'APM Pendaftaran 5'){
			$this->ip_printer = '10.4.40.249';
		}else if($user === 'APM Pendaftaran 6'){
			$this->ip_printer = '10.4.40.246';
		}
	}

	function get_dokter_spesialisasi_get()
	{
		$id_spesialisasi = $this->get('id_spesialisasi');
		$tanggal         = $this->get('tanggal_booking');

		$data = $this->m_booking->getAutoDokterSpesialisasi($id_spesialisasi, $tanggal);
		$this->response($data, REST_Controller::HTTP_OK);
	}

	public function indentitas_post()
	{
		$jenis_identitas  = safe_post('jenis_identitas');
		$no_identitas     = safe_post('no_identitas');
		$penjamin         = safe_post('penjamin');
		$penjamin_lainnya = safe_post('penjamin_lainnya');

		$responseIdentitas = [];
		if ($jenis_identitas === 'no_rm') {
			$responseIdentitas = ['status' => FALSE, 'message' => 'No RM Tidak Ditemukan'];
		} elseif ($jenis_identitas === 'nik') {
			$responseIdentitas = ['status' => FALSE, 'message' => 'NIK Tidak Ditemukan'];
		}

		$data_pasien = $this->m_booking->getDataPasien($no_identitas, $jenis_identitas, $penjamin, $penjamin_lainnya);
		if (!$data_pasien) {
			$this->response($responseIdentitas, self::HTTP_NOT_FOUND);

			return;
		}

		$data_pasien = $this->m_booking->checkIdentitasPasien($no_identitas, $jenis_identitas, $penjamin, $penjamin_lainnya);
		if ($data_pasien === NULL) {
			$this->response(['status' => FALSE, 'message' => 'Data pasien tidak lengkap. Silahkan hubungi bagian pendaftaran'], self::HTTP_BAD_REQUEST);

			return;
		}

		$list_etnis = null;

		// jika id_etnis kosong maka lakukan query ke sm_etnis untuk mendapatkan list etnis agar pasien bisa memilih etnis yang sesuai
		if (empty($data_pasien->id_etnis)) {
			$list_etnis = $this->db->get('sm_etnis')->result();
		}

		$this->response(
			[
				'status'  => TRUE,
				'message' => 'Sukses melakukan pengecekan data',
				'data'    => $data_pasien,
				'list_etnis' => $list_etnis,
			],
			self::HTTP_OK
		);
	}

	public function check_identitas_post()
	{
		$penjamin              = safe_post('penjamin');
		$jenis_identitas       = safe_post('jenis_identitas');
		$no_identitas          = safe_post('no_identitas');
		$penjamin_lainnya      = safe_post('penjamin_lainnya');
		$disablilitas          = safe_post('disabilitas');
		$no_polish             = safe_post('no_bpjs');
		$telp             	   = safe_post('telp');
		$etnis             	   = safe_post('etnis') === '' ? null : safe_post('etnis');
		$etnis_lainnya         = safe_post('etnis_lainnya') === '' ? null : safe_post('etnis_lainnya');
		$is_kontrol_rawat_inap = safe_post('is_kontrol_rawat_inap') !== '' ? 1 : 0;

		$responseIdentitas = [];
		if ($jenis_identitas === 'no_rm') {
			$responseIdentitas = ['status' => FALSE, 'message' => 'No RM Tidak Ditemukan'];
		} elseif ($jenis_identitas === 'nik') {
			$responseIdentitas = ['status' => FALSE, 'message' => 'NIK Tidak Ditemukan'];
		}

		$data_pasien = $this->m_booking->getDataPasien($no_identitas, $jenis_identitas, $penjamin, $penjamin_lainnya);
		if (!$data_pasien) {
			$this->response($responseIdentitas, self::HTTP_NOT_FOUND);

			return;
		}

		// save unsaved data
		$this->m_booking->saveUnsavedData($no_identitas, $jenis_identitas, $penjamin, $no_polish, $telp, $etnis, $etnis_lainnya);

		$data_pasien = $this->m_booking->checkIdentitasPasien($no_identitas, $jenis_identitas, $penjamin, $penjamin_lainnya);
		if ($data_pasien === NULL) {
			$this->response(['status' => FALSE, 'message' => 'Data pasien tidak lengkap. Silahkan hubungi bagian pendaftaran'], self::HTTP_BAD_REQUEST);

			return;
		}

		if ($is_kontrol_rawat_inap === 1) {
			$this->response(
				[
					'status'                => TRUE,
					'message'               => 'Sukses melakukan pengecekan data',
					'data'                  => $data_pasien,
					'is_kontrol_rawat_inap' => TRUE
				],
				self::HTTP_OK
			);

			return;
		}

		$jadwal_dokter = $this->db->select('tanggal')->where('date(tanggal) > ', date('Y-m-d'))->get('sm_jadwal_dokter')->result();
		$data_jadwal   = [];
		foreach ($jadwal_dokter as $jadwal) {
			$data_jadwal[] = $jadwal->tanggal;
		}

		$this->db->where('id', $data_pasien->id)->update('sm_pasien', [
			'disabilitas'    => $disablilitas === '' ? 0 : 1,
			'hamkom'         => safe_post('hamkom') === '' ? NULL : safe_post('hamkom'),
			'hamkom_lainnya' => safe_post('hamkom_lainnya') === '' ? NULL : safe_post('hamkom_lainnya'),
		]);

		$list_rujukan = NULL;

		if (!empty($data_pasien->no_polish) && empty($penjamin_lainnya)) {
			$list_rujukan = $this->get_filtered_list_rujukan($data_pasien->no_polish);
			if (!$list_rujukan) {
				return;
			}
		}

		if (!empty($no_polish) && empty($penjamin_lainnya)) {
			$this->db->where('id', $data_pasien->id_penjamin_pasien)->update('sm_penjamin_pasien', ['no_polish' => str_replace(' ', '', $no_polish)]);

			$list_rujukan = $this->get_filtered_list_rujukan($no_polish);
			if (!$list_rujukan) {
				return;
			}

			$data_pasien->no_polish = $no_polish;
		}

		$this->response(
			[
				'status'                => TRUE,
				'message'               => 'Sukses melakukan pengecekan data',
				'data'                  => $data_pasien,
				'jadwal_dokter'         => $data_jadwal,
				'list_rujukan'          => $list_rujukan,
				'is_kontrol_rawat_inap' => FALSE
			],
			self::HTTP_OK
		);
	}

	private function get_filtered_list_rujukan($no_polish)
	{
		$no_polish = str_replace(' ', '', $no_polish);
		$response1 = $this->get_list_rujukan_by_pcare($no_polish);
		$response2 = $this->get_list_rujukan_by_rs($no_polish);

		if (!$response1 && !$response2) {
			$this->response(['status' => FALSE, 'message' => $this->message], self::HTTP_INTERNAL_SERVER_ERROR);

			return FALSE;
		}

		if ($response1->response === NULL && $response2->response === NULL) {
			$this->response(['status' => FALSE, 'message' => 'Data rujukan BPJS tidak ditemukan. Silahkan coba beberapa saat lagi'], self::HTTP_NOT_FOUND);

			return FALSE;
		}

		// merge response if both response is not null
		$merged_response = [];
		if ($response1->response !== NULL && $response2->response !== NULL) {
			foreach ($response1->response->rujukan as $rujukan_pcare) {
				$rujukan_pcare->is_rs = 0;
			}
			foreach ($response2->response->rujukan as $rujukan_rs) {
				$rujukan_rs->is_rs = 1;
			}
			$merged_response = array_merge($response1->response->rujukan, $response2->response->rujukan);
		} elseif ($response1->response !== NULL) {
			foreach ($response1->response->rujukan as $rujukan_pcare) {
				$rujukan_pcare->is_rs = 0;
			}
			$merged_response = $response1->response->rujukan;
		} elseif ($response2->response !== NULL) {
			foreach ($response2->response->rujukan as $rujukan_rs) {
				$rujukan_rs->is_rs = 1;
			}
			$merged_response = $response2->response->rujukan;
		}

		$list_rujukan = [];
		foreach ($merged_response as $rujukan) {
			$masa_berlaku_rujukan = date('Y-m-d', strtotime($rujukan->tglKunjungan . " +90 days"));
			
			if(empty($rujukan->noKunjungan)){
				continue;
			}
			
			if($rujukan->poliRujukan->kode === 'HDL'){
				$content1 = file_get_contents(base_url() . "/vclaim_bpjs/api/vclaim_bpjs_v2/get_rujukan?norujukan=$rujukan->noKunjungan");
				$content1 = json_decode($content1);

				$content2 = file_get_contents(base_url() . "/vclaim_bpjs/api/vclaim_bpjs_v2/get_rujukan_rs?norujukan=$rujukan->noKunjungan");
				$content2 = json_decode($content2);

				if($content1->metaData->code != 200 && $content2->metaData->code != 200){
					continue;
				}

			}else{
				if ($masa_berlaku_rujukan <= date('Y-m-d')) {
					continue;
				}
			}

			$rujukan->tanggalKadaluarsaRujukan = $masa_berlaku_rujukan;

			$list_rujukan[] = $rujukan;
		}

		if (count($list_rujukan) <= 0) {
			$this->response(['status' => FALSE, 'message' => 'Rujukan tidak ada'], self::HTTP_NOT_FOUND);

			return FALSE;
		}

		return $list_rujukan;
	}

	private function get_list_rujukan_by_pcare($no_polish)
	{
		$url    = $this->bpjs_config->server . "/Rujukan/List/Peserta/{$no_polish}";
		$header = $this->m_booking->createHeader($this->bpjs_config);
		$output = getCurl($url, $header);
		$decode = json_decode($output);
		if ($decode == NULL) {
			return FALSE;
		}
		$decode->response = $this->m_booking->decryptResponse($decode->response, $this->bpjs_config);

		return $decode;
	}

	private function get_list_rujukan_by_rs($no_polish)
	{
		$url    = $this->bpjs_config->server . "/Rujukan/RS/List/Peserta/{$no_polish}";
		$header = $this->m_booking->createHeader($this->bpjs_config);
		$output = getCurl($url, $header);
		$decode = json_decode($output);
		if ($decode == NULL) {
			return FALSE;
		}
		$decode->response = $this->m_booking->decryptResponse($decode->response, $this->bpjs_config);

		return $decode;
	}

	public function check_spri_get()
	{
		$no_rm = $this->get('no_rm', TRUE);
		$no_polish = $this->get('no_polish', TRUE);
		$no_rm = str_replace(' ', '', $no_rm);

		$skk = $this->m_booking->cekKontrolRawatInap($no_rm);
		if (empty($skk)) {
			$this->response(
				[
					'status'  => FALSE,
					'message' => 'Pasien tidak memiliki Surat Kontrol Rawat Inap'
				],
				self::HTTP_BAD_REQUEST
			);

			return;
		}

		$checkIsPasienJkn = $this->m_booking->checkPasienJKNDaftar($skk->tanggal, $no_rm);

		if ($checkIsPasienJkn->jml > 0) {
			$this->response(
				[
					'status'  => FALSE,
					'message' => 'Pasien sudah melakukan pendaftaran di JKN pada hari yang sama'
				],
				self::HTTP_BAD_REQUEST
			);

			return;
		}

		if($skk->id_jadwal_dokter){
			$skk->jadwal_dokter = $this->db->get_where('sm_jadwal_dokter', [
				'id'   => $skk->id_jadwal_dokter,
			])->row();
		}else{
			$skk->jadwal_dokter = $this->db->get_where('sm_jadwal_dokter', [
				'id_dokter' => $skk->id_dokter_tujuan,
				'id_poli'   => $skk->id_spesialisasi,
				'tanggal'   => $skk->tanggal,
			])->row();
		}
		$skk->list_dokter   = $this->m_booking->getAutoDokterSpesialisasi($skk->id_spesialisasi, $skk->tanggal);

		if (empty($skk->jadwal_dokter) && empty($skk->list_dokter)) {
			$this->response(
				[
					'status'  => FALSE,
					'message' => 'Tidak ada dokter pada tanggal jadwal kontrol yang dipilih!'
				],
				self::HTTP_BAD_REQUEST
			);

			return;
		}

		if (empty($skk->jadwal_dokter) && count($skk->list_dokter) < 2) {
			$skk->jadwal_dokter = $skk->list_dokter[0];
		}

		$skk->kode_bpjs_poli = $this->db->get_where('sm_spesialisasi', [
			'id' => $skk->id_spesialisasi,
		])->row()->kode;

		$listSep = $this->check_rujukan($no_polish);
		if ($listSep->metaData->code != 200) {
			$this->response(
				[
					'status'  => FALSE,
					'message' => 'SEP tidak ditemukan'
				],
				self::HTTP_BAD_REQUEST
			);

			return;
		}

		$sep = array_values(array_filter((array)$listSep->response->histori, function ($v) {
			return empty($v->poliTujSep);
		}));

		if (count($sep) <= 0) {
			$this->response(['status' => false, 'message' => 'Tidak ada SEP yang dapat digunakan'], REST_Controller::HTTP_BAD_REQUEST);

			return;
		}

		$this->response(
			[
				'status'  => TRUE,
				'message' => 'Sukses melakukan pengecekan SPRI',
				'skk'     => $skk,
				'no_ref'  => $sep[0]->noSep,
			],
			self::HTTP_OK
		);
	}

	public function pilih_rujukan_post()
	{
		$no_bpjs                = safe_post('no_bpjs');
		$no_rujukuan            = safe_post('no_rujukuan');
		$no_rm                  = safe_post('no_rm');
		$kode_poli              = safe_post('kode_poli');
		$tgl_kadaluarsa_rujukan = safe_post('tgl_kadaluarsa_rujukan');

		$no_bpjs = str_replace(' ', '', $no_bpjs);
		$history_pelayanan = $this->check_rujukan($no_bpjs);

		$rujukan = [];

		if ($history_pelayanan->response !== NULL) {
			// cek apakah no rujukan pasien pernah dipakai atau tidak
			foreach ($history_pelayanan->response->histori as $history) {
				if ($history->noRujukan !== $no_rujukuan) {
					continue;
				}

				$rujukan[] = $history;
			}
		}

		// jika pernah dipakai dan pasien sudah kontrol lebih dari 1 kali, Maka ambil yang terbaru
		if (count($rujukan) > 1) {
			$tanggal_terbaru = 0;
			$rujukan_terbaru = [];
			foreach ($rujukan as $item) {
				$tanggal = strtotime($item->tglSep);
				if ($tanggal > $tanggal_terbaru) {
					$tanggal_terbaru = $tanggal;
					$rujukan_terbaru = $item;
				}
			}

			$rujukan = [$rujukan_terbaru];
		}

		$id_poli       = $this->db->select('id')->where('kode', "'{$kode_poli}'", false)->get('sm_spesialisasi')->row();

		if (empty($id_poli) && $kode_poli !== 'HIV') {
			$this->response(['status' => FALSE, 'message' => "Poli tidak ditemukan. KODE POLI: {$kode_poli}"], self::HTTP_NOT_FOUND);

			return FALSE;
		} elseif ($kode_poli === 'HIV') {
			$id_poli = (object)['id' => 30];
		}

		$id_poli = $id_poli->id;
		$jadwal_dokter = $this->db->select('tanggal')->where('date(tanggal) >= ', date('Y-m-d'))->where('id_poli', $id_poli)->get('sm_jadwal_dokter')->result();

		$data_jadwal = [];
		foreach ($jadwal_dokter as $jadwal) {
			$data_jadwal[] = $jadwal->tanggal;
		}
		sort($data_jadwal);
		$list_dokter = [];
		if (count($data_jadwal) > 0) {
			$list_dokter = $this->m_booking->getAutoDokterSpesialisasi($id_poli, $data_jadwal[0]);
		}

		$skd = NULL;

		// jika no rujukan ditemukan di histori pelayanan maka langkah selanjutnya cek SKD
		if (count($rujukan) > 0) {
			$skd = $this->m_booking->checkSkd($no_rm, $tgl_kadaluarsa_rujukan, $kode_poli);

			foreach ($skd as $item) {
				if (!empty($item->status_pendaftaran) && $item->status_pendaftaran !== 'Batal' && $item->is_booking == 1) {
					continue;
				}

				$item->list_dokter   = $this->m_booking->getAutoDokterSpesialisasi($item->id_spesialisasi, $item->tanggal);
				// $item->dokter_tujuan = $this->m_booking->getJadwalDokterBySKDDOkterTujuan($item->id_dokter_tujuan, $item->tanggal, $item->id_spesialisasi);
				$item->dokter_tujuan = $this->m_booking->getJadwalDokterBySKDDOkterTujuan($item->id_jadwal_dokter);

				$jadwal_dokter = $this->db->select('tanggal')->where('date(tanggal) > ', date('Y-m-d'))->get('sm_jadwal_dokter')->result();
				$data_jadwal   = [];
				foreach ($jadwal_dokter as $jadwal) {
					$data_jadwal[] = $jadwal->tanggal;
				}

				$item->jadwal_dokter = $data_jadwal;
			}

			if (count($skd) <= 0) {
				$this->response(['status' => FALSE, 'message' => 'Pasien tidak memiliki Surat Keterangan Kontrol'], self::HTTP_BAD_REQUEST);

				return;
			}
		}

		$this->response(
			[
				'rujukan'       => $rujukan,
				'message'       => 'Sukses memilih rujukan.',
				'rujukan_awal'  => count($rujukan) > 0 ? 0 : 1,
				'jadwal_dokter' => $data_jadwal,
				'skd'           => $skd,
				'list_dokter'   => $list_dokter
			],
			self::HTTP_OK
		);
	}

	private function check_rujukan($no_bpjs)
	{
		$tglAwal  = date('Y-m-d', strtotime(date('Y-m-d') . "-89 days"));
		$tglAkhir = date('Y-m-d');
		$url      = $this->bpjs_config->server . "/monitoring/HistoriPelayanan/NoKartu/" . $no_bpjs . "/tglAwal/" . $tglAwal . "/tglAkhir/" . $tglAkhir;
		$header   = $this->m_booking->createHeader($this->bpjs_config);
		$output   = getCurl($url, $header);
		$decode   = json_decode($output);
		if ($decode == NULL) :
			$decode = ["metaData" => ["code" => $this->code, "message" => $this->message]];
			die(json_encode($decode));
		endif;
		$decode->response = $this->m_booking->decryptResponse($decode->response, $this->bpjs_config);

		return $decode;
	}

	private function get_list_antrean($tanggal)
	{
		$url    = $this->antrean_config->server . "antrean/pendaftaran/tanggal/{$tanggal}";
		$header = $this->m_booking->createHeader($this->bpjs_config);
		$output = getCurl($url, $header);
		$decode = json_decode($output);
		if ($decode == NULL) {
			return FALSE;
		}
		$decode->response = $this->m_booking->decryptResponse($decode->response, $this->bpjs_config);

		return $decode;
	}

	// private function create_estimasi($id_poli, $tanggal_kunjungan, $id_dokter_bpjs)
	// {
	// 	// menentukan apakah hari ini hari jumat atau bukan
	// 	$is_friday = date('w') == 5;

	// 	/**
	// 	 * Periode waktu pendaftaran buka dalam menit
	// 	 * Senin-kamis & sabtu dari jam 07.00 - 11.30 = 270 menit
	// 	 * Jumat dari jam 07.00 - 11.00 = 240 menit
	// 	 */
	// 	$periode = $is_friday ? 240 : 270;
	// 	$max_waktu = $is_friday ? '11:00:00' : '11:30:00';

	// 	// get kuota dan jumlah kuota terpakai dari poli tujuan
	// 	$kuota = $this->db->select('kuota, jml_kunjung as kuota_terpakai')
	// 	->from('sm_jadwal_dokter')
	// 	->where('id_poli', $id_poli)
	// 	->where('tanggal', $tanggal_kunjungan)
	// 	->where('id_dokter', $id_dokter_bpjs)
	// 	->get()->row();

	// 	if($kuota === null){
	// 		return null;
	// 	}

	// 	// get urutan pasien dari pendaftaran
	// 	$urutan = $this->db->query("
	// 	with cth as (select ROW_NUMBER() OVER () AS no, ab.*
	// 		from sm_antrian_bpjs as ab
	// 		where ab.status != 'Batal'
	// 		and tanggal_kunjungan = '{$tanggal_kunjungan}'
	// 		and ab.nama_poli = {$id_poli})
	// 	select no + 1 as no from cth where no = (SELECT MAX(no) FROM cth)
	// 	")->row();
	// 	$urutan = ($urutan === null) ? 1 : $urutan->no;

	// 	// waktu awal
	// 	$base_date = "$tanggal_kunjungan 07:00:00";

	// 	// menentukan menit untuk ditambahkan ke estimasi
	// 	$menit = ($periode / $kuota->kuota) * $urutan;

	// 	// tambah detik ke waktu awal
	// 	$base_date_dimodifikasi = strtotime($base_date) + round($menit * 60);

	// 	// didapatkan waktu estimasi
	// 	$tanggal = date('Y-m-d', $base_date_dimodifikasi);
	// 	$waktu = date(' H:i:s', $base_date_dimodifikasi);

	// 	$waktu = ($waktu > $max_waktu) ? $max_waktu : $waktu;

	// 	// estimasi
	// 	return "$tanggal $waktu";
	// }
	private function create_estimasi($id_poli, $tanggal_kunjungan, $id_jadwal_dokter)
	{
		// menentukan apakah hari ini hari jumat atau bukan
		$is_friday = date('w') == 5;

		// get kuota dan jumlah kuota terpakai dari poli tujuan
		$kuota = $this->db->select('kuota, jml_kunjung as kuota_terpakai, shift_poli')
		->from('sm_jadwal_dokter')
		->where('id_poli', $id_poli)
		->where('tanggal', $tanggal_kunjungan)
		->where('id', $id_jadwal_dokter)
		->get()->row();

		if($kuota === null){
			return null;
		}

		// Cek apakah poli pagi atau sore
		$is_poli_sore = isset($kuota->shift_poli) && $kuota->shift_poli === 'Sore';

		/**
		 * Periode waktu pendaftaran buka dalam menit
		 * Poli Pagi:
		 * - Senin-kamis & sabtu dari jam 07.00 - 11.30 = 270 menit
		 * - Jumat dari jam 07.00 - 11.00 = 240 menit
		 * Poli Sore:
		 * - Senin-Jumat dari jam 15.00 - 20.00 = 300 menit
		 */
		if ($is_poli_sore) {
			$periode = 300; // 5 jam = 300 menit untuk poli sore
			$max_waktu = '20:00:00';
			$base_time = '15:00:00'; // waktu mulai poli sore
		} else {
			$periode = $is_friday ? 240 : 270;
			$max_waktu = $is_friday ? '11:00:00' : '11:30:00';
			$base_time = '07:00:00'; // waktu mulai poli pagi
		}

		// get urutan pasien dari pendaftaran
		$urutan = $this->db->query("
		with cth as (select ROW_NUMBER() OVER () AS no, ab.*
			from sm_antrian_bpjs as ab
			where ab.status != 'Batal'
			and tanggal_kunjungan = '{$tanggal_kunjungan}'
			and ab.nama_poli = {$id_poli})
		select no + 1 as no from cth where no = (SELECT MAX(no) FROM cth)
		")->row();
		$urutan = ($urutan === null) ? 1 : $urutan->no;

		// waktu awal
		$base_date = "$tanggal_kunjungan $base_time";

		// menentukan menit untuk ditambahkan ke estimasi
		$menit = ($periode / $kuota->kuota) * $urutan;

		// tambah detik ke waktu awal
		$base_date_dimodifikasi = strtotime($base_date) + round($menit * 60);

		// didapatkan waktu estimasi
		$tanggal = date('Y-m-d', $base_date_dimodifikasi);
		$waktu = date(' H:i:s', $base_date_dimodifikasi);

		$waktu = ($waktu > $max_waktu) ? $max_waktu : $waktu;

		// estimasi
		return "$tanggal $waktu";
	}

	public function tambah_antrian_post()
	{
		$this->db->trans_begin();

		$number                 = (int) safe_post('kode_bpjs_dokter');
		$nik                    = safe_post('nik');
		$estimasi               = (int) safe_post('estimasi_antrian');
		$kode_booking           = safe_post('kode_booking');
		$pasien_baru            = 0;
		$status_rm              = 0;
		$angka_antrean          = safe_post('angka_antrean');
		$nomor_antrean          = safe_post('nomor_antrean');
		$huruf_antrean          = safe_post('huruf_antrean');
		$id_dokter_bpjs         = safe_post('id_dokter') !== '' ? (int) safe_post('id_dokter') : null;
		$id_poli                = safe_post('id_poli') !== '' ? (int) safe_post('id_poli') : null;
		$kode_bpjs_poli         = safe_post('kode_bpjs_poli');
		$kode_poli_rujukan      = safe_post('kode_poli_rujukan');
		$usia                   = safe_post('usia');
		$id_user                = $this->session->userdata('id_translucent');
		$kebutuhan_khusus       = safe_post('disabilitas') !== '' ? safe_post('disabilitas') : NULL;
		$tanggal_periksa        = safe_post('tanggal_periksa') !== '' ? safe_post('tanggal_periksa') : NULL;
		$no_rm                  = safe_post('no_rm');
		$no_hp                  = safe_post('no_hp') !== '' ? safe_post('no_hp') : NULL;
		$tanggal_lahir          = safe_post('tanggal_lahir') !== '' ? safe_post('tanggal_lahir') : NULL;
		$nama_dokter            = safe_post('nama_dokter');
		$is_bpjs                = safe_post('is_bpjs') === "true";
		$id_penjamin            = $is_bpjs ? 1 : 9;
		$jenis_bayar            = $is_bpjs ? 'Asuransi' : 'Tunai';
		$id_jadwal_dokter       = safe_post('id_jadwal_dokter') !== '' ? safe_post('id_jadwal_dokter') : null;;
		$is_kontrol_pasca_ranap = safe_post('is_kontrol_pasca_ranap') !== '' ? safe_post('is_kontrol_pasca_ranap') : null;
		$penjamin_lainnya       = safe_post('penjamin_lainnya') !== '' ? safe_post('penjamin_lainnya') : NULL;

		$is_antrian_loket = safe_post('is_antrian_loket') !== '' ? safe_post('is_antrian_loket') : null;

		if ($penjamin_lainnya) {
			$id_penjamin = $penjamin_lainnya;
		}

		date_default_timezone_set('Asia/Jakarta');
		$new_estimasi = date('Y-m-d H:i:s', $estimasi / 1000);

		if ($is_bpjs && $is_antrian_loket === null) {
			$pasien_bpjs = $this->db->where('no_rm', $no_rm)
				->where('tanggal_kunjungan', $tanggal_periksa)
				->where('status !=', 'Batal')
				->where('id_penjamin', 1)
				->get('sm_antrian_bpjs')->row();

			if (!empty($pasien_bpjs)) {
				if (safe_post('rujukan_awal') == 1) {
					$this->response([
						'status'     => TRUE,
						'is_print'   => TRUE,
						'id_antrian' => $pasien_bpjs->id,
					], self::HTTP_OK);

					return;
				}
				$this->response([
					'status'  => FALSE,
					'message' => 'Anda telah melakukan booking pada tanggal yang sama. Menggunakan Booking dari ' . strtoupper($pasien_bpjs->lokasi_data) . '.'
				], self::HTTP_BAD_REQUEST);

				return;
			}
		} else {
			$pasien_poli = $this->db->where('no_rm', $no_rm)
				->where('tanggal_kunjungan', $tanggal_periksa)
				->where('status !=', 'Batal')
				->where('nama_poli', $id_poli)
				->get('sm_antrian_bpjs')->row();

			if (!empty($pasien_poli) && $huruf_antrean !== 'I' && $huruf_antrean !== 'D' && $is_antrian_loket === null) {
				$this->response([
					'status'     => TRUE,
					'is_print'   => TRUE,
					'id_antrian' => $pasien_poli->id,
				], self::HTTP_OK);

				return;
			}
		}

		$antrian = [
			"kode_booking"           => $kode_booking,
			"urutan"                 => $angka_antrean,
			"nomor_antrean"          => $nomor_antrean,
			"huruf_antrean"          => $huruf_antrean,
			"tanggal_kunjungan"      => $tanggal_periksa,
			"kebutuhan"              => $kebutuhan_khusus,
			"create_date"            => $this->datetime,
			"status"                 => 'Booking',
			"lokasi_data"            => 'APM',
			"usia_pasien"            => $usia,
			"pasien_baru"            => $pasien_baru,
			// "waktu_estimasi"         => $new_estimasi,
			// "waktu_estimasi"         => $newest_estimasi,
			"status_rm"              => $status_rm,
			"user_create"            => $id_user,
			"no_rm"                  => $no_rm,
			"id_dokter"              => $id_dokter_bpjs,
			"kode_bpjs_dokter"       => $number,
			"nama_poli"              => $id_poli,
			"kode_bpjs_poli"         => $kode_bpjs_poli,
			"no_hp"                  => $no_hp,
			"nik"                    => $nik,
			'tanggal_lahir'          => $tanggal_lahir,
			"nama_dokter"            => $nama_dokter,
			'id_penjamin'            => $id_penjamin,
			'jenis_bayar'            => $jenis_bayar,
			// 'sisa_kuota'             => $jadwal_dokter->kuota - $updatedJumlahKunjung,
			// 'total_kuota'            => $jadwal_dokter->kuota,
			'status_respon'          => '200',
			'pesan_response'         => 'Ok.',
			'is_kontrol_pasca_ranap' => $is_kontrol_pasca_ranap,
			'id_jadwal_dokter'       => $id_jadwal_dokter,
		];

		if($huruf_antrean !== 'I' && $huruf_antrean !== 'D'){

			$newest_estimasi = $this->create_estimasi($id_poli, $tanggal_periksa, $id_jadwal_dokter);

			if($newest_estimasi === null){
				$this->response([
					'status'  => FALSE,
					'message' => 'Jadwal dokter tidak ditemukan'
				], self::HTTP_BAD_REQUEST);

				return;
			}

			$jadwal_dokter = $this->db->query("select * from sm_jadwal_dokter where id = $id_jadwal_dokter and kuota - jml_kunjung > 0")->row();
			if ($jadwal_dokter === NULL) {
				$this->response([
					'status'  => FALSE,
					'message' => 'Kuota dokter yang anda pilih sudah penuh. Silahkan pilih dokter lain, atau ganti tanggal kunjungan.'
				], self::HTTP_BAD_REQUEST);

				return;
			}

			$this->pelayanan->ubahJadwalDokterKuota('tambah', $tanggal_periksa, $id_poli, $id_dokter_bpjs, $jadwal_dokter->shift_poli);

			$this->m_booking->logKuota($jadwal_dokter, 'get', 'booking_poliklinik', 'tambah_antrian_post', $this->input->ip_address());

			$updatedJumlahKunjung = $jadwal_dokter->jml_kunjung + 1;

			$antrian = $antrian + [
				'waktu_estimasi'         => $newest_estimasi,
				'sisa_kuota'             => $jadwal_dokter->kuota - $updatedJumlahKunjung,
				'total_kuota'            => $jadwal_dokter->kuota,
			];
		}

		if ($is_bpjs) {
			$no_rujukan_skk = safe_post('no_rujukan_skk') !== '' ? safe_post('no_rujukan_skk') : null;

			$antrian['no_kartu']          = safe_post('no_kartu');
			$antrian['status_jkn']        = 'JKN';
			$antrian['id_skd']            = safe_post('id_skd') !== '' ? safe_post('id_skd') : null;
			$antrian['rujukanawal']       = $is_kontrol_pasca_ranap == '1' ? 0 : safe_post('rujukan_awal');
			$antrian['id_poli_asal']      = safe_post('id_poli_asal') !== '' ? safe_post('id_poli_asal') : null;
			$antrian['no_referensi']      = safe_post('no_ref') !== '' ? safe_post('no_ref') : null;
			$antrian['asal_faskes']     	= safe_post('asal_faskes') !== '' ? safe_post('asal_faskes') : NULL;
			$antrian['kadaluarsa_rujukan']  = safe_post('kadaluarsa_rujukan') !== '' ? safe_post('kadaluarsa_rujukan') : NULL;
			$antrian['kode_bpjs_poli_rujukan']     	= safe_post('kode_bpjs_poli_rujukan') !== '' ? safe_post('kode_bpjs_poli_rujukan') : NULL;

			if($no_rujukan_skk !== null && $antrian['no_referensi'] !== $no_rujukan_skk){
				$antrian['no_referensi'] = $no_rujukan_skk;
			}

			$antrian['jenis_kunjungan']   = safe_post('jenis_kunjungan') !== '' ? safe_post('jenis_kunjungan') : null;
			$id_poli_rujukan              = $this->db->select('id')->where('kode', $kode_poli_rujukan)->get('sm_spesialisasi')->row();
			$antrian['is_pasien_katarak'] = safe_post('is_pasien_katarak') !== '' ? safe_post('is_pasien_katarak') : null;

			if ($is_kontrol_pasca_ranap == '1') {
				$antrian['no_sep_asal'] = safe_post('no_ref') !== '' ? safe_post('no_ref') : null;
			} else {
				$antrian['no_sep_asal'] = safe_post('no_sep_asal') !== '' ? safe_post('no_sep_asal') : null;
			}

			if (empty($id_poli_rujukan) && $kode_poli_rujukan !== 'HIV') {
				$this->response([
					'status'  => FALSE,
					'message' => "Kode Poli Rujukan tidak ditemukan. KODE POLI {$kode_poli_rujukan}"
				], self::HTTP_BAD_REQUEST);
				return;
			} elseif ($kode_poli_rujukan === 'HIV') {
				$id_poli_rujukan = (object)['id' => 30];
			}
			$antrian['id_poli_rujukan'] = $id_poli_rujukan->id;

			$kode = $this->get_list_antrean($antrian['tanggal_kunjungan']);
			if ($kode->metadata->code !== 200 && $kode->metadata->code !== 204) {
				$this->response([
					'status'  => FALSE,
					'message' => 'Gagal menambah antrian. ' . $kode->metadata->message
				], self::HTTP_BAD_REQUEST);

				return;
			}
			$found = false;
			foreach ($kode->response as $value) {
				if ($value->kodebooking == $antrian['kode_booking']) {
					$found = true;
					break;
				}
			}

			if (!$found) {
				$response = $this->add_antrean_bpjs($antrian, safe_post('jenis_kunjungan'));

				if ($response->metadata->code === 200) {
					$antrian['kirim_bpjs']   = 'Sudah';
				} else {
					$antrian['kirim_bpjs']   = 'Belum';
				}
				$antrian['respon_bpjs']  = $response->metadata->code;
				$antrian['ket_bridging'] = $response->metadata->message;
			}

			$this->m_booking->updateHakKelasPasien($antrian);
		}

		$id_antrian = $this->antrian->simpanDataAntrian($antrian);

		if ($id_antrian !== NULL) {

			$message = 'Selamat! Booking anda berhasil';
		} else {

			$message = 'Gagal Booking Antrian. Silahkan coba beberapa saat lagi';
		}


		if ($this->db->trans_status() === FALSE) {

			$this->db->trans_rollback();
			$status = FALSE;
			$kode   = self::HTTP_INTERNAL_SERVER_ERROR;
		} else {

			$this->db->trans_commit();
			$status = TRUE;
			$kode   = self::HTTP_CREATED;
		}

		$this->response([
			'success'    => $status,
			'message'    => $message,
			'id_antrian' => $id_antrian,
			'kode_booking' => $kode_booking,
		], $kode);
	}

	public function update_skd_put()
	{
		$id               = $this->put('id', TRUE);
		$tanggal_kontrol  = $this->put('tanggal_kontrol', TRUE);
		$poli_tujuan      = $this->put('poli_tujuan', TRUE);
		$id_dokter_tujuan = $this->put('id_dokter_tujuan', TRUE);

		$this->db->trans_begin();

		// get skd first
		$current_skd = $this->db->get_where('sm_surat_kontrol', ['id' => $id])->row();
		unset($current_skd->id);
		$current_skd->id_skd_lama = $id;

		// save current skd to logs
		$this->db->insert('sm_surat_kontrol_logs', $current_skd);

		// update current skd
		$this->db->where('id', $id)->update('sm_surat_kontrol', [
			'tanggal'          => $tanggal_kontrol,
			'id_spesialisasi'  => $poli_tujuan,
			'id_dokter_tujuan' => $id_dokter_tujuan,
			'id_user'          => $this->session->userdata('id_translucent'),
			'updated_date'     => date('Y-m-d H:i:s')
		]);

		if ($this->db->trans_status() === FALSE) {
			$this->db->trans_rollback();
			$status = FALSE;
			$kode   = self::HTTP_INTERNAL_SERVER_ERROR;
		} else {
			$this->db->trans_commit();
			$status = TRUE;
			$kode   = self::HTTP_CREATED;
		}

		$this->response([
			'status' => $status,
		], $kode);
	}

	public function check_jumlah_pasien_booking_get()
	{
		$tanggal   = $this->get('tanggal', TRUE);
		$id_poli   = $this->get('id_poli', TRUE);
		$id_dokter = $this->get('id_dokter', TRUE);

		$antrian_bpjs = 0;
		$skd          = 0;
		$skd_dan_bpjs = 0;

		if ($id_dokter !== '') {
			$antrian_bpjs = $this->db->select('*')
							->from('sm_antrian_bpjs')
							->where('tanggal_kunjungan', $tanggal)
							->where('nama_poli', $id_poli)
							->where('id_dokter', $id_dokter)
							->where('status !=', 'Batal')
							->get()->num_rows();

			$skd_dan_bpjs = $this->db->select('*')
							->from('sm_antrian_bpjs ab')
							->join('sm_surat_kontrol skd', 'ab.id_skd=skd.id')
							->where('tanggal_kunjungan', $tanggal)
							->where('nama_poli', $id_poli)
							->where('id_dokter', $id_dokter)
							->where('status !=', 'Batal')
							->get()->num_rows();
			$skd = $this->db->get_where('sm_surat_kontrol', [
				'tanggal'          => $tanggal,
				'id_spesialisasi'  => $id_poli,
				'id_dokter_tujuan' => $id_dokter
			])->num_rows();
		}

		$this->response([
			'status'                 => TRUE,
			'pasien_booking'         => $antrian_bpjs,
			'pasien_booking_pending' => abs($skd - $skd_dan_bpjs)
		], self::HTTP_OK);
	}

	public function update_tanggal_get()
	{
		$tanggal = $this->get('tanggal', TRUE);

		$antrian_bpjs = $this->db->select('id_poli_rujukan, no_polish, sab.id, sab.no_referensi, ss.kode')
			->from('sm_antrian_bpjs sab')
			->join('sm_penjamin_pasien spp', 'sab.no_rm = spp.id_pasien')
			->join('sm_spesialisasi ss', 'sab.id_poli_rujukan = ss.id', 'left')
			->where('tanggal_kunjungan', $tanggal)
			->where('status', 'Booking')
			->where('lokasi_data', 'APM')
			->where('rujukanawal !=', '1')
			->where('spp.id_penjamin', 1)
			->get()->result();

		$header = $this->m_sep_v2->createHeader($this->bpjs_config);
		$header[4] = "Content-type: application/x-www-form-urlencoded";

		foreach ($antrian_bpjs as $ab) {
			$url = base_url('vclaim_bpjs/api/vclaim_bpjs_v2/get_rujukan?norujukan=' . $ab->no_referensi);
			$reponse = getCurl($url, $header);
			$reponse = json_decode($reponse);

			if ($reponse->metaData->code != '200') {
				continue;
			}

			$rujukan = $reponse->response->rujukan;
			$kode_poli = $rujukan->poliRujukan->kode;
			$poli = $this->db->get_where('sm_spesialisasi', ['kode' => $kode_poli])->row();

			if (empty($poli)) {
				continue;
			}

			if ($poli->id == $ab->id_poli_rujukan) {
				continue;
			}

			$this->db->where('id', $ab->id)->update('sm_antrian_bpjs', [
				'id_poli_rujukan' => $poli->id,
			]);
		}

		echo 'success mengupdate id poli rujukan!';
	}

	public function add_antrean_bpjs($data, $jenis_kunjungan)
	{
		$nama_poli = $this->db->select('nama')->from('sm_spesialisasi')->where('id', $data['nama_poli'])->get()->row();

		if ($data['rujukanawal'] != '1' && !empty($data['id_skd'])) {
			$no_ref               = $this->db->select('skb.no_surat')
				->from('sm_surat_kontrol sk')
				->join('sm_surat_kontrol_bpjs skb', 'sk.id_skb = skb.id')
				->where('sk.id', $data['id_skd'])
				->get()->row();
			if ($no_ref !== null) {
				$data['no_referensi'] = $no_ref->no_surat ?? $data['no_referensi'];
			}
		}

		$req = [
			"kodebooking"        => $data['kode_booking'],
			"jenispasien"        => 'JKN',
			"nomorkartu"         => $data['no_kartu'],
			"nik"                => $data['nik'],
			"nohp"               => $data['no_hp'],
			"kodepoli"           => $data['kode_bpjs_poli'],
			"namapoli"           => $nama_poli->nama,
			"pasienbaru"         => 0,
			"norm"               => $data['no_rm'],
			"tanggalperiksa"     => $data['tanggal_kunjungan'],
			"kodedokter"         => $data['kode_bpjs_dokter'],
			"namadokter"         => $data['nama_dokter'],
			"jampraktek"         => "07:30-14:00",
			"jeniskunjungan"     => $jenis_kunjungan,
			"nomorreferensi"     => $data['no_referensi'],
			"nomorantrean"       => $data['nomor_antrean'],
			"angkaantrean"       => (int)$data['urutan'],
			"estimasidilayani"   => strtotime($data['waktu_estimasi']) * 1000,
			"sisakuotajkn"       => $data['sisa_kuota'],
			"kuotajkn"           => $data['total_kuota'],
			"sisakuotanonjkn"    => $data['sisa_kuota'],
			"kuotanonjkn"        => $data['total_kuota'],
			"keterangan"         => "Peserta harap 30 menit lebih awal guna pencatatan administrasi."
		];

		$url = $this->antrean_config->server . "antrean/add";
		$header = $this->m_booking->createHeader($this->antrean_config);
		$output = postCurl($url, json_encode($req), $header);
		$decode = json_decode($output);

		return $decode;
	}

	public function direct_print_bukti_booking_get($id_antrian_bpjs)
	{
		$ip_printer = $this->ip_printer;

		$admisi   = $this->m_booking->getDataBooking($id_antrian_bpjs);
		$estimasi = $this->m_booking->getWaktuEstimasi($id_antrian_bpjs, $admisi->nama_poli, $admisi->tanggal_kunjungan);
		$hospital = $this->default->getDataHospital();

		try {
			$connector = new NetworkConnector(); // Ini connector untuk printer dari IP
			$connector->connect($ip_printer);

			$escpostPrint = new EscposPrint($connector);
			$printer = $escpostPrint->getPrinter();

			$this->print_bukti_booking($printer, $admisi, $estimasi, $hospital);

			$this->response([
				'status'  => TRUE,
				'message' => 'success',
                'ip_printer' => $this->ip_printer
			], REST_Controller::HTTP_OK);
		} catch (Exception $e) {
			$this->response([
				'status'  => TRUE,
				'message' => $e->getMessage(),
                'ip_printer' => $this->ip_printer
			], REST_Controller::HTTP_BAD_REQUEST);
		}
	}

	private function print_bukti_booking($printer, $admisi, $estimasi, $hospital)
	{
		// Header
		$printer->setJustification(Printer::JUSTIFY_CENTER);
		$printer->text("{$hospital->nama}\n");
		$printer->text(date('d/m/Y H:i:s') . "\n\n");

		// Body
		$printer->setLineSpacing(80);
		// $printer->setEmphasis(true);
		// $printer->setTextSize(1, 2);
		// $printer->text("{$admisi->nama_pasien} (No. RM: {$admisi->no_rm})\n");
		$printer->setTextSize(1, 1);
		$printer->setEmphasis(false);
		$printer->selectPrintMode(Printer::MODE_FONT_B | Printer::MODE_DOUBLE_HEIGHT | Printer::MODE_DOUBLE_WIDTH);
		$printer->text("{$admisi->nama_pasien} (No. RM: {$admisi->no_rm})\n");
		$printer->text("No Kartu: {$admisi->no_kartu}\n");
		$printer->text("Kode Booking: {$admisi->kode_booking}\n");
		$printer->text("\n");
		$printer->qrCode($admisi->kode_booking, Printer::QR_ECLEVEL_L, 8, Printer::QR_MODEL_2);
		$printer->text("\n");
		$printer->text("{$admisi->poli} - {$admisi->shift_poli}\n");
		$printer->text("{$admisi->nama_dokter}\n");
		$printer->setEmphasis(true);
		$printer->setTextSize(1, 2);
		$printer->text(convertDateIndo($admisi->tanggal_kunjungan) . " - {$admisi->nama_penjamin}\n\n");
		$printer->setTextSize(1, 1);
		$printer->setEmphasis(false);
		$printer->setLineSpacing();
		$printer->selectPrintMode();

		// Footer
		$printer->selectPrintMode(Printer::MODE_FONT_B);
		$printer->text("Jika terjadi kendala silahkan hubungi bag. humas\n");
		$printer->text("di nomor: 0812-8070-3360 / 0811-9232-421\n");
		$printer->text("Bukti booking jangan sampai hilang\n");
		if (!empty($estimasi)) {
			$printer->text("Waktu Check-in {$estimasi->estimated_time_start} WIB - {$estimasi->estimated_time_end} WIB\n");
		}


		// Cut and close the printer
		$printer->cut();
		$printer->close();
	}

	public function direct_print_bukti_kunjungan_poli_get($id_pendaftaran)
	{
		$ip_printer = $this->ip_printer;

		$hospital    = $this->default->getDataHospital();
		$pendaftaran = $this->klinik->getPendaftaranDetail($id_pendaftaran);
		$pasien      = $pendaftaran['pasien'];
		$pelayanan   = $pendaftaran['layanan'][0];

		try {
			$connector = new NetworkConnector(); // Ini connector untuk printer dari IP
			$connector->connect($ip_printer);

			$escpostPrint = new EscposPrint($connector);
			$printer      = $escpostPrint->getPrinter();

			$this->print_bukti_kunjungan_poli($printer, $hospital, $pasien, $pelayanan);

			$this->response([
				'status'  => TRUE,
				'message' => 'success',
                'ip_printer' => $this->ip_printer
			], REST_Controller::HTTP_OK);
		} catch (Exception $e) {
			$this->response([
				'status'  => false,
				'message' => $e->getMessage(),
                'ip_printer' => $this->ip_printer
			], REST_Controller::HTTP_BAD_REQUEST);
		}
	}

	/**
	 * @throws Exception
	 */
	public function print_bukti_kunjungan_poli($printer, $hospital, $pasien, $pelayanan)
	{
		date_default_timezone_set('Asia/Jakarta');
		$printer->setJustification(Printer::JUSTIFY_CENTER);
		$usia = hitungUmur2($pasien->tanggal_lahir);
		$tgl_kunjung = date('d/m/Y', strtotime($pasien->tanggal_daftar));
		$jam_kunjung = date('H:i:s', strtotime($pasien->tanggal_daftar));

		// Header
		$printer->setEmphasis(true);
		$printer->text("{$hospital->nama}\n");
		$printer->setEmphasis(false);
		$printer->text("Jl. Pulau Putri Raya, RT.004/RW.004,\n");
		$printer->text("Klp. Indah, Kec. Tangerang, Kota Tangerang\n");
		$printer->text("Banten\n");
		$printer->text("==========================================\n");

		// Body
		$printer->setEmphasis(true);
		$printer->text("BUKTI KUNJUNGAN\n\n");
		$printer->setEmphasis(false);
		$printer->text("No. Antrian: ");
		$printer->setEmphasis(true);
		$printer->text("{$pelayanan->no_antrian}\n");
		$printer->setEmphasis(false);
		$printer->text("No. RM: ");
		$printer->setEmphasis(true);
		$printer->text("{$pasien->no_rm}\n");
		$printer->setEmphasis(false);
		$printer->text("Jenis Pasien: {$pasien->status}\n");
		$printer->text("Nama Pasien: {$pasien->nama} ({$pasien->kelamin})\n");
		$printer->text("Tgl Lahir: {$pasien->tanggal_lahir} ($usia)\n");
		$printer->text("Poli: {$pelayanan->layanan}\n");
		$printer->text("Status Pasien: {$pelayanan->status_pasien}\n");
		$printer->text("Dokter: {$pelayanan->dokter}\n");
		$printer->text("Tgl. Kunjungan: " . dateconvertfjs($tgl_kunjung) . "\n");
		$printer->text("Jam Check-In: {$jam_kunjung}\n");
		$printer->text("Petugas: {$pelayanan->petugas}\n");

		// QR
		$printer->qrCode($pasien->no_rm, Printer::QR_ECLEVEL_H, 10, Printer::QR_MODEL_2);
		$printer->feed();

		// Footer
		$printer->setEmphasis(true);
		$printer->text("Perhatian!\n Jika 3x pemanggilan di poliklinik pasien tidak ada, maka akan dilakukan pemanggilan pada pasien berikutnya\n");
		$printer->setEmphasis(false);

		$printer->cut();
		$printer->close();
	}

	public function get_data_printing_get($id_antrian)
	{
		$antrian = $this->db->get_where('sm_antrian_bpjs', ['id' => $id_antrian])->row();

		$this->response(['id_pendaftaran' => $antrian->id_pendaftaran, 'nosep' => $antrian->nosep]);
	}

	public function list_poliklinik_get()
	{
		$tanggal = date('Y-m-d');
		$waktu = date('H:i:s');
		$sql = "
			select pg.nama, s.nama as spesialisasi, jd.shift_poli, jd.kuota, jd.jml_kunjung, jd.kuota - jd.jml_kunjung as sisa_kuota, 
			jd.id as id_jadwal_dokter, s.id as id_spesialisasi, stm.id as id_dokter, s.kode_bpjs as kode_bpjs_poli, jd.shift_poli, stm.kode_bpjs
			from sm_jadwal_dokter as jd
					join sm_tenaga_medis as stm on jd.id_dokter = stm.id
					join sm_pegawai as pg on stm.id_pegawai = pg.id
					join sm_spesialisasi as s on jd.id_poli = s.id
			where jd.tanggal = '{$tanggal}'
			and jd.shift_poli = case
									when '{$waktu}' between '07:00:00' and '12:00:00' then 'Pagi'
									when '{$waktu}' between '16:00:00' and '20:00:00' then 'Sore'
									else 'Pagi'
				end
			and s.id in (14,12,45,20,21,22,48,23,27,28,29,30,32,37,11,26,44)
			order by s.nama
		";
		$jadwal_dokter = $this->db->query($sql)->result();
		
		$grouped = [];
		foreach ($jadwal_dokter as $doctor) {
			$grouped[$doctor->spesialisasi][] = $doctor;
		}

		$list_poliklinik_available = [];
		$list_poliklinik_unavailable = [];
		foreach ($grouped as $spesialisasi => $doctors) {
			$is_kuota_available = false;
			$doctor_details_list = [];
			$id_spesialisasi = null;
		
			foreach ($doctors as $doctor) {
				if ($doctor->sisa_kuota > 0) {
					$is_kuota_available = true;
				}

				$id_spesialisasi = $doctor->id_spesialisasi;
		
				$doctor_details_list[] = [
					'id_jadwal_dokter' => $doctor->id_jadwal_dokter,
					'kuota' => (int)$doctor->kuota,
					'jml_kunjung' => (int)$doctor->jml_kunjung,
					'sisa_kuota' => (int)$doctor->sisa_kuota,
					'nama_dokter' => $doctor->nama,
					'shift_poli' => $doctor->shift_poli,
					'kode_bpjs_poli' => $doctor->kode_bpjs_poli,
					'id_dokter' => $doctor->id_dokter,
					'kode_bpjs_dokter' => $doctor->kode_bpjs,
				];
			}
			
			if($is_kuota_available){
				$list_poliklinik_available[] = [
					'spesialisasi' => $spesialisasi,
					'id_spesialisasi' => $id_spesialisasi,
					'is_kuota_available' => $is_kuota_available,
					'is_more_then_one_doctor' => count($doctors) > 1,
					'doctors' => $doctor_details_list,
				];
			}else{
				$list_poliklinik_unavailable[] = [
					'spesialisasi' => $spesialisasi,
					'id_spesialisasi' => $id_spesialisasi,
					'is_kuota_available' => $is_kuota_available,
					'is_more_then_one_doctor' => count($doctors) > 1,
					'doctors' => $doctor_details_list,
				];
			}
		}


		$this->response(array_merge($list_poliklinik_available, $list_poliklinik_unavailable));
	}

	public function get_kode_booking_get(){
		$id = safe_get('id');

		$kode_booking = $this->db->select('kode_booking')->from('sm_antrian_bpjs')->where('id', $id)->get()->row();

		$this->response([
			'status'  => TRUE,
			'kode_booking' => $kode_booking->kode_booking,
		], self::HTTP_OK);
	}
}
