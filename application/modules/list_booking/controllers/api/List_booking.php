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
class List_booking extends REST_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->limit = 10;
		$this->batas = 10;
		$this->load->model('List_booking_model', 'm_list_booking');
		$this->load->model('antrian_farmasi/Antrian_farmasi_model', 'm_antrian_farmasi');
		date_default_timezone_set('Asia/Jakarta');
		$this->datetime = date('Y-m-d H:i:s');

		$id_translucent = $this->session->userdata('id_translucent');
		if (empty($id_translucent)) :
			$this->response(array('error' => 'Anda belum login'), REST_Controller::HTTP_UNAUTHORIZED);
			exit();
		endif;

		$this->load->model('booking_poliklinik/Booking_poliklinik_model', 'm_booking');
		$this->load->model('vclaim_bpjs/Booking_poliklinik_model', 'm_booking');
		$this->load->model('antrian_bpjs/Antrian_bpjs_model', 'antrian');
		$this->load->model('pelayanan/Pelayanan_model', 'pelayanan');

		//		$this->bpjs_config = $this->default->getConfigBPJSV2();
		$this->bpjs_config = (object) [
			'server'     => 'https://apijkn.bpjs-kesehatan.go.id/vclaim-rest',
			'cons_id'    => 22178,
			'secret_key' => '5xJF9FD078',
			'no_ppk'     => '0223R038',
			'user_key'   => '80d402801bf7653318ee305235880de8'
		];

		//		$this->antrean_config = $this->default->getConfigAntrianBPJS();
		$this->antrean_config = (object) [
			'server'     => 'https://apijkn.bpjs-kesehatan.go.id/antreanrs/',
			'cons_id'    => 22178,
			'secret_key' => '5xJF9FD078',
			'no_ppk'     => '0223R038',
			'user_key'   => 'c8f239eb9e8518495f470eaeeaf79362'
		];
	}

	public function list_booking_get()
	{
		if (!$this->get('page')) {
			$this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);

			return;
		}

		$search = [
			'tanggal_awal'   => safe_get('tanggal_awal'),
			'tanggal_akhir'  => safe_get('tanggal_akhir'),
			'kode_booking'   => safe_get('kode_booking'),
			'nik'            => safe_get('nik'),
			'no_rm'          => safe_get('no_rm'),
			'nm_poli'        => safe_get('nm_poli'),
			'nm_dokter'      => safe_get('nm_dokter'),
			'status_antrean' => safe_get('status_antrean'),
			'lokasi'		 => safe_get('lokasi'),
			'shift'		 	 => safe_get('shift'),
		];

		$start = (($this->get('page') - 1) * $this->batas);;

		$data = $this->m_list_booking->listBooking($this->batas, $start, $search);

		$data['page']  = (int) $this->get('page');
		$data['limit'] = $this->batas;

		if ($data) {
			$this->response($data, REST_Controller::HTTP_OK);
		}
	}

	public function get_spesialisasi_get()
	{
		$id_spesialisasi = $this->get('id_spesialisasi');

		$data = $this->m_antrian_farmasi->getAutoSpesialisasi($id_spesialisasi);
		$this->response($data, REST_Controller::HTTP_OK);
	}

	public function jadwal_dokter_get()
	{
		$tgl_kunjung   = $this->get('tgl_kunjung');
		$poli          = $this->get('poli');
		$jadwal_dokter = $this->db->select('tanggal')
			->where('date(tanggal) >=', date('Y-m-d'))
			->where('id_poli', $poli)
			->get('sm_jadwal_dokter')->result();

		$data_jadwal = [];
		foreach ($jadwal_dokter as $jadwal) {
			$data_jadwal[] = $jadwal->tanggal;
		}

		$list_dokter = $this->m_booking->getAutoDokterSpesialisasi($poli, $tgl_kunjung);

		$this->response(['status' => TRUE, 'jadwal_dokter' => $data_jadwal, 'list_dokter' => $list_dokter], self::HTTP_OK);
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

	public function update_booking_post()
	{
		$id_dokter_awal        = safe_post('id_dokter_awal');
		$tanggal_awal_kontrol  = safe_post('tanggal_awal_kontrol');
		$id_poli               = safe_post('id_poli_awal');
		$jadwal_dokter_rujukan = safe_post('dokter_rujukan');
		$id_antrian_bpjs       = safe_post('id_antrian_bpjs');
		$id_surat_kontrol      = safe_post('id_surat_kontrol') !== '' ? safe_post('id_surat_kontrol') : NULL;
		$id_penjamin           = safe_post('id_penjamin');
		$tanggal_kunjungan     = date2mysql(safe_post('tanggal_kunjungan'));
		$usia                  = safe_post('usia_pasien');
		$id_skb = null;

		$this->db->trans_begin();

		$jadwal_dokter = $this->db->query("select * from sm_jadwal_dokter where id = {$jadwal_dokter_rujukan} and kuota - jml_kunjung > 0")->row();
		if ($jadwal_dokter === NULL) {
			$this->response([
				'status'  => FALSE,
				'message' => 'Kuota dokter yang anda pilih sudah penuh!'
			], self::HTTP_BAD_REQUEST);

			return;
		}

		// get id dokter dari sm_jadwal_dokter
		$id_dokter = $this->db->get_where('sm_jadwal_dokter', ['id' => $jadwal_dokter_rujukan])->row();

		if ($usia == 'Tunai') {
			$hutuf_antrian = 'C';
		} elseif ($usia == 'Prioritas') {
			$hutuf_antrian = 'A';
		} else {
			$hutuf_antrian = 'B';
		}

		$cek_antrian = $this->antrian->cekAntrianBPJS($usia, $tanggal_kunjungan);

		$antrian_bpjs = $this->db->select('*')
			->from('sm_antrian_bpjs')
			->where('id', $id_antrian_bpjs)
			->get()->row();

		if(!empty($id_penjamin) && $id_penjamin === '1' && $tanggal_awal_kontrol !== $tanggal_kunjungan){
			$pasien_bpjs = $this->db->where('no_rm', $antrian_bpjs->no_rm)
							->where('tanggal_kunjungan', $tanggal_kunjungan)
							->where('status !=', 'Batal')
							->where('jenis_penjamin !=', '9')
							->get('sm_antrian_bpjs')->row();

			if (!empty($pasien_bpjs)) {
				$this->response([
					'status'  => FALSE,
					'message' => 'Anda telah melakukan booking pada tanggal yang sama. Menggunakan Booking dari ' . strtoupper($pasien_bpjs->lokasi_data) . '.'
				], self::HTTP_BAD_REQUEST);

				return;
			}
		}

		$tambah_nol    = sprintf("%03d", $cek_antrian);
		$ubah_tanggal  = str_replace('-', '', $tanggal_kunjungan);
		$nomor_antrian = $hutuf_antrian . $tambah_nol;
		if ($antrian_bpjs->tanggal_kunjungan === $tanggal_kunjungan) {

			$ubahJadwal = $this->pelayanan->ubahJadwalDokter($tanggal_awal_kontrol, $id_poli, $id_dokter_awal, $id_poli, $id_dokter->id_dokter);

			if (!$ubahJadwal) {
				$this->response(['status' => FALSE, 'message' => 'Gagal mengubah jadwal dokter'], self::HTTP_BAD_REQUEST);

				return;
			}
			$kode_booking = $antrian_bpjs->kode_booking;
			$data_edit    = [
				'id_dokter'        => $id_dokter->id_dokter,
				'nama_dokter'      => $id_dokter->nama_dokter,
				'kode_bpjs_dokter' => $id_dokter->kode_bpjs_dokter,
				'id_jadwal_dokter' => $jadwal_dokter_rujukan,
			];
			$this->db->where('id', $id_antrian_bpjs)->update('sm_antrian_bpjs', $data_edit);
		} else {
			$kode_booking             = $ubah_tanggal . $nomor_antrian;

			$kode = $this->get_list_antrean($tanggal_kunjungan);
			$found = false;
			foreach ($kode->response as $value) {
				if ($value->kodebooking == $kode_booking) {
					$found = true;
					break;
				}
			}

			$data_edit                = [
				'id_dokter'         => $id_dokter->id_dokter,
				'nama_dokter'       => $id_dokter->nama_dokter,
				'kode_bpjs_dokter'  => $id_dokter->kode_bpjs_dokter,
				'tanggal_kunjungan' => $tanggal_kunjungan,
				'kode_booking'      => $kode_booking,
				'urutan'            => $cek_antrian,
				'nomor_antrean'     => $nomor_antrian,
				'id_jadwal_dokter' => $jadwal_dokter_rujukan,
				'kadaluarsa_rujukan' => $antrian_bpjs->kadaluarsa_rujukan,
				'kode_bpjs_poli_rujukan' => $antrian_bpjs->kode_bpjs_poli_rujukan,
			];

			if (!$found) {
				$antrian_bpjs = (array) $antrian_bpjs;
				$antrian_bpjs['keterangan'] = 'Ganti tanggal booking';
				$antrian_bpjs['id_penjamin'] = $id_penjamin;

				$id_antrian = $this->daftar_baru_pasien_edit_booking($antrian_bpjs, $data_edit);

				if (is_array($id_antrian)) {
					$this->response(['status' => FALSE, 'message' => $id_antrian['message']], self::HTTP_BAD_REQUEST);

					return;
				}

				if ($id_antrian === NULL) {
					$this->response(['status' => FALSE, 'message' => 'Gagal mengubah antrian'], self::HTTP_BAD_REQUEST);

					return;
				}
			} else {
				$this->db->where('id', $id_antrian_bpjs)->update('sm_antrian_bpjs', $data_edit);
			}
		}


		if ($id_surat_kontrol !== NULL) {
			$skk = $this->db->get_where('sm_surat_kontrol', ['id' => $id_surat_kontrol])->row();
			$this->db->where('id', $id_surat_kontrol)->update('sm_surat_kontrol', [
				'id_dokter_tujuan' => $id_dokter->id_dokter,
				'tanggal'          => $tanggal_kunjungan,
				'updated_date'     => date('Y-m-d')
			]);

			$id_skb = $skk->id_skb;

			if ($skk->id_skb !== NULL) {
				$skb = $this->db->get_where('sm_surat_kontrol_bpjs', ['id' => $skk->id_skb])->row();
				$ab  = $this->db->get_where('sm_antrian_bpjs', ['id' => $id_antrian_bpjs])->row();

				if ($skb !== null) {
					$request = array(
						"request" => array(
							"noSuratKontrol"    => $skb->no_surat,
							"noSEP"             => $ab->no_sep_asal,
							"kodeDokter"        => $id_dokter->kode_bpjs_dokter,
							"poliKontrol"       => $id_dokter->kode_bpjs_poli,
							"tglRencanaKontrol" => $tanggal_kunjungan,
							"user"              => $this->session->userdata("account"),
						)
					);

					$url       = $this->bpjs_config->server . "/RencanaKontrol/Update";
					$header    = $this->m_booking->createHeader($this->bpjs_config);
					$header[4] = "Content-type: application/x-www-form-urlencoded";
					$output    = customCurl("PUT", $url, json_encode($request), $header);
					$decode    = json_decode($output);

					if ($decode->metaData->code === '203') {
						$this->response(['status' => FALSE, 'message' => $decode->metaData->message], self::HTTP_BAD_REQUEST);

						return;
					}

					if (!empty($decode)) {
						$decode->response = $this->m_booking->decryptResponse($decode->response, $this->bpjs_config);

						$this->db->where('id', $skk->id_skb)->update('sm_surat_kontrol_bpjs', [
							'dokter'              => $decode->response->namaDokter,
							'tgl_rencana_kontrol' => $decode->response->tglRencanaKontrol,
							'updated_date'        => date('Y-m-d')
						]);
					}
				}
			}
		}


		$data = [
			'id_antrian_bpjs' => $id_antrian_bpjs,
			'action' => 'Edit',
			'id_user' => $this->session->userdata('id_translucent'),
			'tanggal_rencana_kontrol_lama' => $tanggal_awal_kontrol,
			'tanggal_rencana_kontrol_baru' => $tanggal_kunjungan,
			'id_skb' => $id_skb,
			'id_skk' => $id_surat_kontrol,
		];

		// $this->m_list_booking->save_log($data);

		if ($this->db->trans_status() === FALSE) {
			$this->db->trans_rollback();
			$status  = FALSE;
			$message = 'Gagal mengupdate Booking';
			$kode    = self::HTTP_BAD_REQUEST;
		} else {
			$this->db->trans_commit();
			$status  = TRUE;
			$message = 'Berhasil mengupdate Booking';
			$kode    = self::HTTP_OK;
		}

		$this->response(['status' => $status, 'message' => $message, 'kode_booking_baru' => $kode_booking], $kode);
	}

	private function daftar_baru_pasien_edit_booking($data_antrian, $data_edit)
	{
		$jadwal_dokter_lama = $this->db->select('*')
				->from('sm_jadwal_dokter')
				->where('id', $data_antrian['id_jadwal_dokter'])
				->get()
				->row();

		$jadwal_dokter_baru = $this->db->select('*')
			->from('sm_jadwal_dokter')
			->where('id', $data_edit['id_jadwal_dokter'])
			->get()
			->row();

		if ($data_antrian['status'] !== 'Batal') {
			$batal_antrean_bpjs = $this->batal_antrean_bpjs(["kodebooking" => $data_antrian['kode_booking'], "keterangan" => $data_antrian['keterangan']]);

			$this->pelayanan->ubahJadwalDokterKuota('kurang', $data_antrian['tanggal_kunjungan'], $data_antrian['nama_poli'], $data_antrian['id_dokter'], $jadwal_dokter_lama->shift_poli);

			// if ($batal_antrean_bpjs->metadata->code !== 200) {
			// 	return ['status' => FALSE, 'message' => $batal_antrean_bpjs->metadata->message];
			// }

			date_default_timezone_set('Asia/Jakarta');
			$waktu_batal  = (round(microtime(TRUE) * 1000));
			$new_estimasi = date('Y-m-d H:i:s', $waktu_batal / 1000);

			$update = ["status" => 'Batal', "keterangan_batal" => 'Edit Tanggal Booking', "task_batal" => $new_estimasi];

			$this->db->where('id', $data_antrian['id'])->update('sm_antrian_bpjs', $update);

			$data_response = array(
				"nomor_task"        => 99,
				"waktu_task"        => $waktu_batal,
				"kode_booking"      => $data_antrian['kode_booking'],
				"id_antrian"        => $data_antrian['id'],
				"konversi_waktu"    => $new_estimasi,
				// Tambahan wahyu
				"response"          => 200,
				"keterangan_respon" => "Ok.",
				"kirim_bpjs"        => "Sudah",
				"respon_bpjs"       => $batal_antrean_bpjs->metadata->code ?? '200',
				"ket_bridging"      => $batal_antrean_bpjs->metadata->message ?? 'OK.',
				// End
				"keterangan"        => 'Edit Tanggal Booking'
			);

			$this->db->insert('sm_update_task_bpjs', $data_response);
		}

		$jenis_kunjungan = 1;

		if ($data_antrian['id_penjamin'] == '1') {
			if ($data_antrian['is_kontrol_pasca_ranap'] !== '1') {
				$response = $this->get_rujukan_by_rs($data_antrian['no_referensi']);

				if ($response->response !== NULL) {
					$jenis_kunjungan = 4;
				}
			}
		}

		if ($data_antrian['rujukanawal'] === '0' && $jenis_kunjungan !== 4 || $data_antrian['is_kontrol_pasca_ranap'] === '1') {
			$jenis_kunjungan = 3;
		}

		$data_antrian['kode_booking']  = $data_edit['kode_booking'];
		$data_antrian['urutan']        = $data_edit['urutan'];
		$data_antrian['nomor_antrean'] = $data_edit['nomor_antrean'];
		$data_antrian['id_dokter']         = $data_edit['id_dokter'];
		$data_antrian['nama_dokter']       = $data_edit['nama_dokter'];
		$data_antrian['kode_bpjs_dokter']  = $data_edit['kode_bpjs_dokter'];
		$data_antrian['tanggal_kunjungan'] = $data_edit['tanggal_kunjungan'];
		$data_antrian['id_jadwal_dokter'] = $data_edit['id_jadwal_dokter'];
		// $this->pelayanan->ubahJadwalDokterKuota('tambah', $data_antrian['tanggal_kunjungan'], $data_antrian['nama_poli'], $data_antrian['id_dokter']);

		// $jadwal_dokter = $this->db->get_where('sm_jadwal_dokter', ['id_dokter' => $data_antrian['id_dokter'], 'tanggal' => $data_antrian['tanggal_kunjungan'], 'id_poli' => $data_antrian['nama_poli']])->row();
		$data_antrian['sisa_kuota'] = $jadwal_dokter_baru->kuota - $jadwal_dokter_baru->jml_kunjung;
		$data_antrian['total_kuota'] = $jadwal_dokter_baru->kuota;

		$response = $this->add_antrean_bpjs($data_antrian, $jenis_kunjungan);

		if ($response->metadata->code === 200) {
			$data_antrian['kirim_bpjs']   = 'Sudah';
		} else {
			$data_antrian['kirim_bpjs']   = 'Belum';
		}
		$data_antrian['respon_bpjs']  = $response->metadata->code;
		$data_antrian['ket_bridging'] = $response->metadata->message;

		$data_antrian['kirim_bpjs']   = 'Sudah';
		$data_antrian['respon_bpjs']  = 200;
		$data_antrian['ket_bridging'] = 'Ok.';

		unset($data_antrian['keterangan'], $data_antrian['id']);

		$this->pelayanan->ubahJadwalDokterKuota('tambah', $data_antrian['tanggal_kunjungan'], $data_antrian['nama_poli'], $data_antrian['id_dokter'], $jadwal_dokter_baru->shift_poli);

		return $this->antrian->simpanDataAntrian($data_antrian);
	}

	//fungsi untuk mengganti status di sm_antrian_bpjs menjadi Batal

	public function batal_antrean_bpjs($req)
	{
		$url    = $this->antrean_config->server . "antrean/batal";
		$header = $this->m_booking->createHeader($this->antrean_config);
		$output = postCurl($url, json_encode($req), $header);
		$decode = json_decode($output);

		return $decode;
	}

	private function get_rujukan_by_rs($noReferensi)
	{
		$url    = $this->bpjs_config->server . "/Rujukan/RS/{$noReferensi}";
		$header = $this->m_booking->createHeader($this->bpjs_config);
		$output = getCurl($url, $header);
		$decode = json_decode($output);
		if ($decode == NULL) {
			return FALSE;
		}
		$decode->response = $this->m_booking->decryptResponse($decode->response, $this->bpjs_config);

		return $decode;
	}

	public function add_antrean_bpjs($data, $jenis_kunjungan)
	{
		$nama_poli = $this->db->select('nama')->from('sm_spesialisasi')->where('id', $data['nama_poli'])->get()->row();

		if ($data['rujukanawal'] != '1') {
			$no_ref               = $this->db->select('skb.no_surat')
				->from('sm_surat_kontrol sk')
				->join('sm_surat_kontrol_bpjs skb', 'sk.id_skb = skb.id')
				->where('sk.id', $data['id_skd'])
				->get()->row();
			$data['no_referensi'] = $no_ref->no_surat ?? $data['no_referensi'];
		}

		$req = [
			"kodebooking"      => $data['kode_booking'],
			"jenispasien"      => 'JKN',
			"nomorkartu"       => $data['no_kartu'],
			"nik"              => $data['nik'],
			"nohp"             => $data['no_hp'],
			"kodepoli"         => $data['kode_bpjs_poli'],
			"namapoli"         => $nama_poli->nama,
			"pasienbaru"       => 0,
			"norm"             => $data['no_rm'],
			"tanggalperiksa"   => $data['tanggal_kunjungan'],
			"kodedokter"       => $data['kode_bpjs_dokter'],
			"namadokter"       => $data['nama_dokter'],
			"jampraktek"       => "07:30-14:00",
			"jeniskunjungan"   => $jenis_kunjungan,
			"nomorreferensi"   => $data['no_referensi'],
			"nomorantrean"     => $data['nomor_antrean'],
			"angkaantrean"     => (int) $data['urutan'],
			"estimasidilayani" => strtotime($data['waktu_estimasi']) * 1000,
			"sisakuotajkn"     => $data['sisa_kuota'],
			"kuotajkn"         => $data['total_kuota'],
			"sisakuotanonjkn"  => $data['sisa_kuota'],
			"kuotanonjkn"      => $data['total_kuota'],
			"keterangan"       => "Peserta harap 30 menit lebih awal guna pencatatan administrasi."
		];

		$url    = $this->antrean_config->server . "antrean/add";
		$header = $this->m_booking->createHeader($this->antrean_config);
		$output = postCurl($url, json_encode($req), $header);
		$decode = json_decode($output);

		return $decode;
	}

	public function batal_booking_post()
	{
		$id_antrian_bpjs  = safe_post('id');
		$keterangan_batal = safe_post('keterangan_batal');

		$ab = $this->db->select('*')
			->from('sm_antrian_bpjs')
			->where('id', $id_antrian_bpjs)
			->get()->row();

		if($ab->id_jadwal_dokter){
			$jadwal_dokter = $this->db->select('shift_poli')
				->from('sm_jadwal_dokter')
				->where('id', $ab->id_jadwal_dokter)
				->get()->row();
				
			$this->pelayanan->ubahJadwalDokterKuota('kurang', $ab->tanggal_kunjungan, $ab->nama_poli, $ab->id_dokter, $jadwal_dokter->shift_poli);
		}else{
			$this->pelayanan->ubahJadwalDokterKuota('kurang', $ab->tanggal_kunjungan, $ab->nama_poli, $ab->id_dokter);
		}

		$this->batal_antrean_bpjs(["kodebooking" => $ab->kode_booking, "keterangan" => $keterangan_batal]);

		date_default_timezone_set('Asia/Jakarta');
		$waktu_batal  = (round(microtime(TRUE) * 1000));
		$new_estimasi = date('Y-m-d H:i:s', $waktu_batal / 1000);

		$update = ["status" => 'Batal', "keterangan_batal" => $keterangan_batal, "user_batal" => $this->session->userdata('id_translucent'), "waktu_batal" => $this->datetime, "task_batal" => $new_estimasi];

		$this->db->where('id', $ab->id)->update('sm_antrian_bpjs', $update);

		$data_response = array(
			"nomor_task"        => 99,
			"waktu_task"        => $waktu_batal,
			"kode_booking"      => $ab->kode_booking,
			"id_antrian"        => $ab->id,
			"konversi_waktu"    => $new_estimasi,
			// Tambahan wahyu
			"response"          => 200,
			"keterangan_respon" => "Ok.",
			"kirim_bpjs"        => "Sudah",
			"respon_bpjs"       => $batal_antrean_bpjs->metadata->code ?? 'Sudah',
			"ket_bridging"      => $batal_antrean_bpjs->metadata->message ?? 'Ok.',
			// End
			"keterangan"        => 'Edit Tanggal Booking'
		);

		$this->db->insert('sm_update_task_bpjs', $data_response);

		$antrian = $this->db->select('*')
			->from('sm_antrian_bpjs ab')
			->join('sm_surat_kontrol sk', 'sk.id = ab.id_skd', 'left')
			->join('sm_surat_kontrol_bpjs skb', 'skb.id = sk.id_skb', 'left')
			->where('ab.id', $id_antrian_bpjs)
			->get()->row();
		if ($antrian && $antrian->id_skb) {
			$this->batal_rencana_kontrol($antrian);
		}

		$sep = NULL;
		if ($ab->status === 'Check In' && !empty($ab->id_pendaftaran)) {
			$sep = $this->db->get_where('sm_pendaftaran', ['id' => $ab->id_pendaftaran])->row();
		}

		$data = [
			'id_antrian_bpjs' => $id_antrian_bpjs,
			'action' => 'Batal',
			'id_user' => $this->session->userdata('id_translucent'),
			'tanggal_rencana_kontrol_lama' => null,
			'tanggal_rencana_kontrol_baru' => null,
			'id_skb' => $antrian->id_skb,
			'id_skk' => $antrian->id_skd,
		];

		$this->m_list_booking->save_log($data);
		if($antrian->is_kontrol_pasca_ranap === '1'){
			$this->db->where('id', $antrian->id_skd)->delete('sm_surat_kontrol');
		}

		$this->response([
			'status'  => TRUE,
			'message' => 'Berhasil membatalkan booking',
			'data'    => [
				'no_sep'         => $sep,
				'id_pendaftaran' => $ab->id,
			]
		], self::HTTP_OK);
	}

	private function batal_rencana_kontrol($skk)
	{
		$request = array(
			"request" => array(
				"t_suratkontrol" => array(
					"noSuratKontrol" => $skk->no_surat,
					"user" => $this->session->userdata("account"),
				)
			)
		);
		$url       = $this->bpjs_config->server . "/RencanaKontrol/Delete";
		$header    = $this->m_booking->createHeader($this->bpjs_config);
		$header[4] = "Content-type: application/x-www-form-urlencoded";
		customCurl("DELETE", $url, json_encode($request), $header);
	}

	private function update_surat_kontrol_bpjs(
		$id_surat_kontrol,
		$id_dokter,
		$tanggal_kunjungan,
		$id_antrian_bpjs
	) {
		$skk = $this->db->get_where('sm_surat_kontrol', ['id' => $id_surat_kontrol])->row();
		$this->db->where('id', $id_surat_kontrol)->update('sm_surat_kontrol', [
			'id_dokter_tujuan' => $id_dokter->id_dokter,
			'tanggal'          => $tanggal_kunjungan,
			'updated_date'     => date('Y-m-d')
		]);

		if ($skk->id_skb !== NULL) {
			$skb = $this->db->get_where('sm_surat_kontrol_bpjs', ['id' => $skk->id_skb])->row();
			$ab  = $this->db->get_where('sm_antrian_bpjs', ['id' => $id_antrian_bpjs])->row();

			$request = array(
				"request" => array(
					"noSuratKontrol"    => $skb->no_surat,
					"noSEP"             => $ab->no_sep_asal,
					"kodeDokter"        => $id_dokter->kode_bpjs_dokter,
					"poliKontrol"       => $id_dokter->kode_bpjs_poli,
					"tglRencanaKontrol" => $tanggal_kunjungan,
					"user"              => $this->session->userdata("account"),
				)
			);

			$url       = $this->bpjs_config->server . "/RencanaKontrol/Update";
			$header    = $this->m_booking->createHeader($this->bpjs_config);
			$header[4] = "Content-type: application/x-www-form-urlencoded";
			$output    = customCurl("PUT", $url, json_encode($request), $header);
			$decode    = json_decode($output);

			if ($decode->metaData->code === '203') {
				$this->response(['status' => FALSE, 'message' => $decode->metaData->message], self::HTTP_BAD_REQUEST);

				return;
			}

			if (!empty($decode)) {
				$decode->response = $this->m_booking->decryptResponse($decode->response, $this->bpjs_config);

				$this->db->where('id', $skk->id_skb)->update('sm_surat_kontrol_bpjs', [
					'dokter'              => $decode->response->namaDokter,
					'tgl_rencana_kontrol' => $decode->response->tglRencanaKontrol,
					'updated_date'        => date('Y-m-d')
				]);
			}
		}
	}

	public function get_estimasi_pasien_get($id){
		$data['admisi']   = $this->m_booking->getDataBooking($id);
		$estimasi   = $this->m_booking->getWaktuEstimasi($id, $data['admisi']->nama_poli, $data['admisi']->tanggal_kunjungan);

		$this->response(['data' => $estimasi], self::HTTP_OK);
	}
}
