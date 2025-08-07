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
class Antrian_bridging extends REST_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->limit    = 10;
		$this->datetime = date('Y-m-d H:i:s');
		$this->load->model('Antrian_bridging_model', 'm_antrian_bridging');
		$this->load->model('vclaim_bpjs/Sep_v2_model', 'm_sep_v2');
		$this->load->model('App_model', 'm_default');
		$this->load->model('antrian_bpjs/Antrian_bpjs_model', 'antrian');

		$this->code    = 400;
		$this->message = "Tidak terhubung dengan Server BPJS, Server BPJS sedang bermasalah. Silahkan Hubungi Pihak IT BPJS";

		$id_translucent = $this->session->userdata('id_translucent');
		if (empty($id_translucent)) :
			$this->response(array('error' => 'Anda belum login'), REST_Controller::HTTP_UNAUTHORIZED);
			exit();
		endif;

		$this->antrean_config = $this->default->getConfigAntrianBPJS();
		$this->bpjs_config = $this->default->getConfigBPJSV2();

		$user = $this->session->userdata('nama');
		$userToIPPrinterMap = array(
			'APM Pendaftaran' => '10.1.10.249',
			'APM Pendaftaran 2' => '10.4.40.246',
			'APM Pendaftaran 3' => '10.1.10.239',
			'APM Pendaftaran 4' => '10.1.10.243',
			'APM NS' => '10.1.10.241',
			'APM Pendaftaran 5' => '10.4.40.249',
			'APM Pendaftaran 6' => '10.4.40.246',
			// 'Muhamad Wahyudin' => '10.3.31.201'
		);

		$this->ip_printer = isset($userToIPPrinterMap[$user]) ? $userToIPPrinterMap[$user] : '';
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
			foreach ($response1->response->rujukan as $val) {
				$val->is_rujukan_rs = 0;
			}
			foreach ($response2->response->rujukan as $val) {
				$val->is_rujukan_rs = 1;
			}

			$merged_response = array_merge($response1->response->rujukan, $response2->response->rujukan);
		} elseif ($response1->response !== NULL) {
			foreach ($response1->response->rujukan as $val) {
				$val->is_rujukan_rs = 0;
			}

			$merged_response = $response1->response->rujukan;
		} elseif ($response2->response !== NULL) {
			foreach ($response2->response->rujukan as $val) {
				$val->is_rujukan_rs = 1;
			}

			$merged_response = $response2->response->rujukan;
		}

		$list_rujukan = [];
		foreach ($merged_response as $rujukan) {
			$masa_berlaku_rujukan = date('Y-m-d', strtotime($rujukan->tglKunjungan . " +89 days"));
			if ($masa_berlaku_rujukan <= date('Y-m-d')) {
				continue;
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
		$header = $this->m_antrian_bridging->createHeader($this->bpjs_config);
		$output = getCurl($url, $header);
		$decode = json_decode($output);
		if ($decode == NULL) {
			return FALSE;
		}
		$decode->response = $this->m_antrian_bridging->decryptResponse($decode->response, $this->bpjs_config);

		return $decode;
	}

	private function get_list_rujukan_by_rs($no_polish)
	{
		$url    = $this->bpjs_config->server . "/Rujukan/RS/List/Peserta/{$no_polish}";
		$header = $this->m_antrian_bridging->createHeader($this->bpjs_config);
		$output = getCurl($url, $header);
		$decode = json_decode($output);
		if ($decode == NULL) {
			return FALSE;
		}
		$decode->response = $this->m_antrian_bridging->decryptResponse($decode->response, $this->bpjs_config);

		return $decode;
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

		if (empty($id_poli)) {
			$this->response(['status' => FALSE, 'message' => "Poli tidak ditemukan. KODE POLI: {$kode_poli}"], self::HTTP_NOT_FOUND);

			return FALSE;
		}

		$this->response(
			[
				'rujukan'       => $rujukan,
				'message'       => 'Sukses memilih rujukan.',
				'rujukan_awal'  => count($rujukan) > 0 ? 0 : 1
			],
			self::HTTP_OK
		);
	}

	private function check_rujukan($no_bpjs)
	{
		$tglAwal  = date('Y-m-d', strtotime(date('Y-m-d') . "-89 days"));
		$tglAkhir = date('Y-m-d');
		$url      = $this->bpjs_config->server . "/monitoring/HistoriPelayanan/NoKartu/" . $no_bpjs . "/tglAwal/" . $tglAwal . "/tglAkhir/" . $tglAkhir;
		$header   = $this->m_antrian_bridging->createHeader($this->bpjs_config);
		$output   = getCurl($url, $header);
		$decode   = json_decode($output);
		if ($decode == NULL) :
			$decode = ["metaData" => ["code" => $this->code, "message" => $this->message]];
			die(json_encode($decode));
		endif;
		$decode->response = $this->m_antrian_bridging->decryptResponse($decode->response, $this->bpjs_config);

		return $decode;
	}

	public function cek_data_post()
	{
		$jenis_identitas = safe_post('jenis_identitas');
		$no_identitas    = safe_post('no_identitas');
		$penjamin        = safe_post('jenis_pasien');

		$responseIdentitas = [];
		if ($jenis_identitas === 'no_rm') {
			$responseIdentitas = ['status' => FALSE, 'message' => 'No RM Tidak Ditemukan'];
		} elseif ($jenis_identitas === 'nik') {
			$responseIdentitas = ['status' => FALSE, 'message' => 'NIK Tidak Ditemukan'];
		} elseif ($jenis_identitas === 'no_bpjs') {
			$responseIdentitas = ['status' => FALSE, 'message' => 'No. Peserta BPJS Tidak Ditemukan'];
		}

		$data_pasien = $this->m_antrian_bridging->getDataPasien($no_identitas, $jenis_identitas, $penjamin);
		if ($data_pasien == NULL) {
			$this->response($responseIdentitas, self::HTTP_NOT_FOUND);

			return;
		}

		$this->response(
			[
				'status'  => TRUE,
				'message' => 'Sukses melakukan pengecekan data',
				'data'    => $data_pasien,
			],
			self::HTTP_OK
		);
	}

	public function cek_data_bpjs_pasien_baru_post()
	{
		$no_identitas   = safe_post('no_identitas');
		$data_rujukan 	= $this->get_filtered_list_rujukan($no_identitas);

		if (!$data_rujukan) {
			return;
		}

		$data_peserta_bpjs 	= $data_rujukan[0]->peserta;
		$data_pasien 				= $this->m_antrian_bridging->checkPasienBaru($data_peserta_bpjs->nik, 'nik', 'pasien_baru');

		if ($data_pasien !== NULL) {
			$message_response = 'No. BPJS sudah terdaftar dengan pasien a.n <b>' . $data_pasien->nama . '.</b><br>No. RM <b>' . $data_pasien->id . '</b>';
			$this->response(['status' => FALSE, 'message' => $message_response], self::HTTP_BAD_REQUEST);

			return;
		}

		$id_pasien = false;

		$data_insert = [
			'id'             	=> $id_pasien,
			'tanggal_daftar' 	=> $this->datetime,
			'no_identitas'   	=> $data_peserta_bpjs->nik,
			'nama'           	=> strtoupper(trim($data_peserta_bpjs->nama)),
			'kelamin'        	=> $data_peserta_bpjs->sex,
			'tanggal_lahir'  	=> $data_peserta_bpjs->tglLahir,
			'telp'           	=> $data_peserta_bpjs->mr->noTelepon,
			'agama'						=> safe_post('agama_antrian'),
			'id_pendidikan'		=> safe_post('pendidikan_antrian'),
			'status'         	=> 'Hidup'
		];

		$this->load->model('pasien/Pasien_model', 'pasien');
		$no_rm = $this->pasien->updateDataPasien($data_insert, true);

		if (empty($no_rm)) {
			$this->response(['status' => FALSE, 'message' => 'Gagal menambahkan data! Silahkan Coba lagi'], self::HTTP_BAD_REQUEST);
		}

		$data_rujukan[0]->peserta->no_rm_baru = $no_rm;

		$this->response(
			[
				'status'  => TRUE,
				'message' => 'Sukses melakukan pengecekan data BPJS',
				'data'    => $data_rujukan,
			],
			self::HTTP_OK
		);
	}

	public function cek_data_rujukan_get()
	{
		$no_polish = $this->get('no_polish');
		$id_penjamin_pasien = $this->get('id_penjamin');

		$list_rujukan = NULL;

		if (!empty($no_polish)) {
			$list_rujukan = $this->get_filtered_list_rujukan($no_polish);
			if (!$list_rujukan) {
				return;
			}
		}

		if (!empty($no_polish)) {
			$this->db->where('id', $id_penjamin_pasien)->update('sm_penjamin_pasien', ['no_polish' => str_replace(' ', '', $no_polish)]);

			$list_rujukan = $this->get_filtered_list_rujukan($no_polish);
			if (!$list_rujukan) {
				return;
			}

			$no_polish = $no_polish;
		}

		foreach ($list_rujukan as $key => $value) {
			if ($value->poliRujukan->kode == 'HIV') {
				$kode_poli = 'INT';
			} else {
				$kode_poli = $value->poliRujukan->kode;
			}

			$id_poli_rujukan = $this->db->select('*')->where('kode', $kode_poli)->get('sm_spesialisasi')->row();

			$list_rujukan[$key]->id_poli_rujukan = $id_poli_rujukan->id;
			$list_rujukan[$key]->kode_poli = $id_poli_rujukan->kode_bpjs;
			$list_rujukan[$key]->nama_poli = $id_poli_rujukan->nama;

			$no_bpjs                = $value->peserta->noKartu;
			$no_rujukuan            = $value->noKunjungan;
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
			$list_rujukan[$key]->rujukan = $rujukan;
			$list_rujukan[$key]->is_rujukan_awal = count($rujukan) > 0 ? 0 : 1;
		}

		$this->response(
			[
				'status'        => TRUE,
				'message'       => 'Sukses melakukan pengecekan data rujukan',
				'list_rujukan'  => $list_rujukan,
			],
			self::HTTP_OK
		);
	}

	public function update_data_pasien_post()
	{
		$no_bpjs				= safe_post('no_bpjs_antrian');
		$nama_pasien    = safe_post('nama_pasien_antrian');
		$no_rm          = safe_post('no_rm_antrian');
		$no_ktp         = safe_post('no_ktp_antrian');
		$no_hp 					= safe_post('no_hp_antrian');

		$no_bpjs 	= str_replace(' ', '', $no_bpjs);
		$no_rm 		= str_replace(' ', '', $no_rm);
		$no_ktp 	= str_replace(' ', '', $no_ktp);
		$no_hp 		= str_replace(' ', '', $no_hp);

		$list_rujukan = $this->get_filtered_list_rujukan($no_bpjs);

		$data_update = [
			'no_identitas'	=> str_replace(' ', '', $no_ktp),
			'telp' 					=> str_replace(' ', '', $no_hp),
		];
		$this->db->where('id', $no_rm)->update('sm_pasien', $data_update);

		if (!$list_rujukan) {
			return;
		}

		$no_ktp_bpjs = $list_rujukan[0]->peserta->nik;
		$nama_peserta_bpjs = $list_rujukan[0]->peserta->nama;

		$jenis_identitas = 'nik';
		$penjamin        = safe_post('jenis_pasien');

		$data_pasien = $this->m_antrian_bridging->getDataPasien($no_ktp, $jenis_identitas, $penjamin);

		if ($data_pasien->no_identitas != $no_ktp_bpjs) {
			$this->response(['status' => FALSE, 'message' => 'Nomor BPJS a.n <b>' . $nama_peserta_bpjs . '</b> Tidak sesuai dengan data Pasien! <br>Pastikan NIK atau No. BPJS sesuai dengan data Pasien.'], self::HTTP_NOT_FOUND);
			return;
		}

		if (empty($data_pasien->no_polish)) {
			$this->db->where('id', $data_pasien->id_penjamin_pasien)->update('sm_penjamin_pasien', ['no_polish' => $no_bpjs]);
		}

		$data_pasien = $this->m_antrian_bridging->getDataPasien($no_ktp, $jenis_identitas, $penjamin);

		$this->response(
			[
				'message'       => 'Berhasil menyimpan data.',
				'data'          => $data_pasien
			],
			self::HTTP_OK
		);
	}


	public function direct_print_bukti_booking_get($id_antrian_bpjs)
	{
		$ip_printer = $this->ip_printer;

		$admisi   = $this->antrian->getDataBooking($id_antrian_bpjs);
		// $estimasi = $this->m_booking->getWaktuEstimasi($id_antrian_bpjs, $admisi->nama_poli, $admisi->tanggal_kunjungan);
		$hospital = $this->default->getDataHospital();
		// var_dump($admisi); die;

		try {

			$connector = new NetworkConnector(); // Ini connector untuk printer dari IP
			$connector->connect($ip_printer);

			$escpostPrint = new EscposPrint($connector);
			$printer = $escpostPrint->getPrinter();

			$this->print_bukti_booking($printer, $admisi, $hospital);

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

	private function print_bukti_booking($printer, $admisi, $hospital)
	{
		$nama_poli = strtoupper($admisi->poli);
		// Header
		$printer->setJustification(Printer::JUSTIFY_CENTER);
		$printer->text("{$hospital->nama}\n");
		$printer->text(date('d/m/Y H:i:s') . "\n\n");

		// Body
		$printer->setLineSpacing(80);
		$printer->selectPrintMode(Printer::MODE_FONT_B);
		$printer->setTextSize(5, 5);
		$printer->setLineSpacing(80);
		$printer->text("{$admisi->nomor_antrean}\n\n");
		$printer->setLineSpacing();
		$printer->setLineSpacing(80);
		$printer->selectPrintMode(Printer::MODE_FONT_B | Printer::MODE_DOUBLE_HEIGHT | Printer::MODE_DOUBLE_WIDTH);
		$printer->text("{$nama_poli}\n");
		$printer->selectPrintMode();
		$printer->text("MOHON MENUNJUKAN NOMOR ANTRIAN\n");
		$printer->text("ANDA KEPADA PETUGAS LOKET PENDAFTARAN\n");

		// Footer
		// $printer->selectPrintMode(Printer::MODE_FONT_B);
		// $printer->text("Bukti booking jangan sampai hilang\n");
		// // if (!empty($estimasi)) {
		// // 	$printer->text("Waktu Check-in {$estimasi->estimated_time_start} WIB - {$estimasi->estimated_time_end} WIB\n");
		// // }
		// $printer->text("Jika terjadi kendala silahkan hubungi bag. humas\n");
		// $printer->text("di nomor: 0812-8070-3360 / 0811-9232-421\n");


		// Cut and close the printer
		$printer->cut();
		$printer->close();
	}


	// Untuk testingg server bpjs
	public function batal_antrean_bpjs_get()
	{

		$url = $this->antrean_config->server . "antrean/batal";
		$header = $this->m_antrian_bridging->createHeader($this->antrean_config);

		$data = array(
			"kodebooking"		=> "20230515B005",
			"keterangan" 		=> "Testing"
		);

		$output = postCurl($url, json_encode($data), $header);

		$outputJson = json_decode($output);
		exit($output);

		// return $outputJson;
	}

	public function list_antrean_bpjs_get()
	{
		var_dump($this->get('tanggal', true));
		die;
		$tanggal = $this->get('tanggal', true);
		$url = $this->antrean_config->server . "antrean/pendaftaran/tanggal/{$tanggal}";
		$header = $this->m_antrian_bridging->createHeader($this->antrean_config);
		$output = getCurl($url, $header);
		$decode = json_decode($output);
		if ($decode == NULL) {
			return FALSE;
		}
		$decode->response = $this->m_antrian_bridging->decryptResponse($decode->response, $this->antrean_config);

		// var_dump($decode);
		// die();
		// exit($output);
		$this->response($decode, self::HTTP_OK);
	}

	public function kodebooking_antrean_bpjs_get()
	{
		$kode_booking = $this->get('kodebooking', true);
		$url = $this->antrean_config->server . "antrean/pendaftaran/kodebooking/{$kode_booking}";
		$header = $this->m_antrian_bridging->createHeader($this->antrean_config);
		$output = getCurl($url, $header);
		$decode = json_decode($output);
		if ($decode == NULL) {
			return FALSE;
		}
		$decode->response = $this->m_antrian_bridging->decryptResponse($decode->response, $this->antrean_config);

		// var_dump($decode);
		// exit($output);

		$this->response($decode, self::HTTP_OK);
	}
	// End testing
}
