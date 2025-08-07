<?php

use Restserver\Libraries\REST_Controller;

class Antrian_Farmasi extends REST_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->limit = 20;
		$this->batas = 10;
		date_default_timezone_set('Asia/Jakarta');
		$this->datetime = date('Y-m-d H:i:s');
		$this->load->model('App_model', 'm_default');
		$this->load->model('Antrian_farmasi_model', 'antrian');

		$id_translucent = $this->session->userdata('id_translucent');
		if (empty($id_translucent)) :
			$this->response(array('error' => 'Anda belum login'), REST_Controller::HTTP_UNAUTHORIZED);
			exit();
		endif;
	}

	public function data_antrian_farmasi_get()
	{
		if (!$this->get('page')) {
			$this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);

			return;
		}

		$search = [
			'tanggal_awal'    => safe_get('tanggal_awal'),
			'tanggal_akhir'   => safe_get('tanggal_akhir'),
			'no_kode_booking' => safe_get('no_kode_booking'),
			'no_antrean'      => safe_get('no_antrean'),
			'no_rm'           => safe_get('no_rm'),
			'nm_poli'         => safe_get('nm_poli'),
			'nm_dokter'       => safe_get('nm_dokter'),
			'status_antrean'  => safe_get('status_antrean'),
			'status_resep'    => $this->get('status-resep'),
		];

		$start = (($this->get('page') - 1) * $this->batas);;

		$data = $this->antrian->dataAntrianFarmasi($this->batas, $start, $search);

		$data['page']  = (int) $this->get('page');
		$data['limit'] = $this->batas;

		if ($data) :
			$this->response($data, REST_Controller::HTTP_OK);
		endif;
	}

	public function cek_poli_farmasi_get()
	{
		$no_rm = $this->get('no_rm');
		if (!$no_rm) {
			$this->response(['message' => 'No rekam medis belum diisi'], self::HTTP_BAD_REQUEST);

			return;
		}

		// check is no rm exist
		$is_no_rm_exist = $this->antrian->cekNoRm($no_rm);
		if (!$is_no_rm_exist) {
			$this->response(['message' => 'No rekam medis tidak ditemukan'], REST_Controller::HTTP_NOT_FOUND);

			return;
		}

		$data = $this->antrian->getPoli($no_rm);
		if (!$data) {
			$this->response(['message' => 'Mohon Maaf Anda Belum Menerima Resep Dari Dokter. Silahkan Melakukan Pengecekan Kembali Resep Anda Kepada Dokter'], REST_Controller::HTTP_NOT_FOUND);

			return;
		}
		$this->response(['data' => $data], REST_Controller::HTTP_OK);
	}

	public function get_no_antrian_farmasi_get()
	{
		$id_layanan      = $this->get('id_layanan');
		$is_racik        = $this->antrian->checkIsResepRacikan($id_layanan);
		$is_prioritas     = $this->antrian->checkResepPrioritas($id_layanan);
		$is_pasien_cemara = $this->antrian->checkPasienCemara($id_layanan);
		$tanggal_periksa = date('Y-m-d');
		$ubah_tanggal    = str_replace('-', '', $tanggal_periksa);
		$cek_antrian     = $this->antrian->cekAntrianFarmasi($tanggal_periksa, $is_racik, $is_prioritas, $is_pasien_cemara);
		$tambah_nol      = sprintf("%03d", $cek_antrian);

		$huruf_antrean = 'A'; // Default value

		if ($is_racik && !$is_prioritas && !$is_pasien_cemara) {
			$huruf_antrean = 'B';
		} elseif(!$is_racik && !$is_prioritas && !$is_pasien_cemara) {
			$huruf_antrean = 'A';
		}elseif($is_prioritas || $is_pasien_cemara){
			$huruf_antrean = 'C';
		}

		$nomor_antrean = $huruf_antrean . $tambah_nol;

		$response = [
			"metaData" => [
				"code"     => 200,
				"response" => [
					"huruf_antrean"   => $huruf_antrean,
					"nomor_antrean"   => $nomor_antrean,
					"angka_antrean"   => $tambah_nol,
					"urutan"          => $cek_antrian,
					"tanggal_periksa" => $tanggal_periksa,
					"racik"           => $is_racik
				]
			]
		];

		$this->response($response, REST_Controller::HTTP_OK);
	}

	public function tambah_antrian_farmasi_post()
	{
		$this->db->trans_begin();

		$no_rm   = safe_post('no_rm');
		$id_poli = safe_post('id_poli');
		//		$id_resep          = safe_post('id_resep');
		$id_layanan        = safe_post('id_layanan');
		$angka_antrean     = safe_post('angka_antrean');
		$nomor_antrean     = safe_post('nomor_antrean');
		$huruf_antrean     = safe_post('huruf_antrean');
		$racik             = safe_post('racik');
		$id_user           = $this->session->userdata('id_translucent');
		$tanggal_kunjungan = date('Y-m-d');

		$cek_terdaftar = $this->antrian->cekTerdaftar($no_rm, $id_poli, $tanggal_kunjungan);
		if ($cek_terdaftar !== NULL) {
			$this->response(['message' => "Pasien sudah terdaftar untuk No RM: $no_rm"], REST_Controller::HTTP_BAD_REQUEST);

			return;
		}

		$dataAntrian = [
			'urutan'                 => $angka_antrean,
			'nomor_antrean'          => $nomor_antrean,
			'huruf_antrean'          => $huruf_antrean,
			'id_user'                => $id_user,
			'no_rm'                  => $no_rm,
			'id_poli'                => $id_poli,
			//			'id_resep'               => $id_resep,
			'id_layanan_pendaftaran' => $id_layanan,
			'created_at'             => date('Y-m-d H:i:s'),
			'waktu_hadir'            => date('Y-m-d H:i:s'),
			'tanggal_kunjungan'      => $tanggal_kunjungan,
			'racik'                  => (int) $racik,
			'pasien_hadir'           => 'Hadir',
			'status_antrean'         => 'Process'
		];

		$id_pendaftaran = $this->db->select('lp.id_pendaftaran')
			->from('sm_layanan_pendaftaran lp')
			->where("lp.id", $id_layanan)
			->get()->row()->id_pendaftaran;

		$this->load->model('pelayanan/Pelayanan_model', 'm_pelayanan');
		$cekBooking = $this->m_pelayanan->cekBookingTaskEnam($id_pendaftaran);

		if ($cekBooking === NULL) {
			$this->response(['message' => 'Gagal menambah antrian'], self::HTTP_BAD_REQUEST);
		} else {

			$taskEnam = $cekBooking->task_enam;

			if ($taskEnam === NULL) {

				$kode_booking_bpjs = $cekBooking->kode_booking;

				date_default_timezone_set('Asia/Jakarta');
				$tanggalTunggu = (round(microtime(TRUE) * 1000));
				$new_estimasi  = date('Y-m-d H:i:s', $tanggalTunggu / 1000);

				$update = ["task_enam" => $new_estimasi];

				$get_id_antrian = $this->m_pelayanan->getIdAntrean($kode_booking_bpjs);
				$id_antrian     = (int) $get_id_antrian->id;

				$data = $this->db->where('id', $id_antrian)->update('sm_antrian_bpjs', $update);

				$data_response = array(
					"nomor_task"     => 6,
					"waktu_task"     => $tanggalTunggu,
					"kode_booking"   => $kode_booking_bpjs,
					"id_antrian"     => $id_antrian,
					"konversi_waktu" => $new_estimasi,
				);

				$cek_respon_bpjs = $this->m_pelayanan->getResponseBPJS($kode_booking_bpjs, 6);

				if (!isset($cek_respon_bpjs->id)) {

					$this->db->insert('sm_update_task_bpjs', $data_response);
				}
			} else {

				$this->response(['message' => 'Gagal menambah antrian'], self::HTTP_BAD_REQUEST);
			}
		}

		$this->db->insert('sm_antrian_farmasi', $dataAntrian);

		if ($this->db->trans_status() === FALSE) {
			$this->db->trans_rollback();
			$this->response(['message' => 'Gagal menambah antrian'], REST_Controller::HTTP_BAD_REQUEST);
		} else {
			$this->db->trans_commit();
			$insert_id = $this->db->insert_id();

			$this->response(['message' => 'Sukses menambahkan antrian', 'id_antrian' => $insert_id], REST_Controller::HTTP_CREATED);
		}
	}

	public function kode_bpjs_get()
	{
		$q     = safe_get('q');
		$page  = safe_get('page');
		$start = $this->start($page);
		$data  = $this->antrian->getKodeBPJS($q, $start, $this->limit);
		if ((safe_get('page') == 1) & ($q == '')) {
			$pilih[]       = array(
				'id'        => '',
				'nama'      => '',
				'kode'      => '',
				'kode_bpjs' => ''
			);
			$data['data']  = array_merge($pilih, $data['data']);
			$data['total'] += 1;
		}
		$this->response($data, REST_Controller::HTTP_OK);
	}

	private function start($page)
	{
		return (($page - 1) * $this->limit);
	}

	public function get_spesialisasi_get()
	{
		$id_spesialisasi = $this->get('id_spesialisasi');

		$data = $this->antrian->getAutoSpesialisasi($id_spesialisasi);
		$this->response($data, REST_Controller::HTTP_OK);
	}

	public function batal_antrian_post()
	{
		$waktu_batal             = date('Y-m-d H:i:s');
		$tanggal_kunjungan_batal = safe_post('tanggal_kunjungan_batal');
		$keterangan              = safe_post('keterangan_batal');
		$id_batal                = safe_post('id_batal');

		$update = ["status_antrean" => 'Batal', "keterangan_batal" => $keterangan];

		$this->db->where('id', $id_batal)->update('sm_antrian_farmasi', $update);

		$this->response(['message' => 'Sukses membatalkan antrian'], REST_Controller::HTTP_OK);
	}

	public function data_panggil_pasien_get()
	{
		if (!$this->get('p')) {
			$this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
		}

		$search = [
			'tanggal_awal'    => safe_get('tanggal_awal'),
			'tanggal_akhir'   => safe_get('tanggal_akhir'),
			'no_kode_booking' => safe_get('no_kode_booking'),
			'no_antrean'      => safe_get('no_antrean'),
			'no_rm'           => safe_get('no_rm'),
			'nm_poli'         => safe_get('nm_poli'),
			'nm_dokter'       => safe_get('nm_dokter'),
			'status_antrean'  => safe_get('status_antrean'),
			'jenis_antrian'   => safe_get('jenis_antrian'),
		];

		$start = (($this->get('p') - 1) * $this->batas);

		$data = $this->antrian->dataPanggilPasien($this->batas, $start, $search);

		$data['page']  = (int) $this->get('p');
		$data['limit'] = $this->batas;

		if ($data) {
			$this->response($data, REST_Controller::HTTP_OK);
		}
	}

	public function delay_panggilan_get()
	{

		$data = $this->antrian->dataDelayPanggilan();

		if ($data) {
			$this->response($data, REST_Controller::HTTP_OK);
		}
	}

	public function cek_waktu_delay_post()
	{
		$this->db->trans_begin();

		$user = $this->session->userdata('id_translucent');
		$ip   = $_SERVER['REMOTE_ADDR'];

		$dataDelay = $this->antrian->dataDelayPanggilan();
		$waktuDb   = $dataDelay->waktu;

		$timeDb       = strtotime($waktuDb);
		$waktuPanggil = time();
		$tambahDelay  = $timeDb + 10;

		$waktuTunggu = $tambahDelay - $waktuPanggil;

		if ($waktuPanggil > $tambahDelay) {

			$cekUser = $dataDelay->user;
			$cekIp   = $dataDelay->ip;

			if ($cekUser === NULL && $cekIp === NULL) {

				$delay = array(

					"status" => 0,
					"user"   => $user,
					"ip"     => $ip
				);

				$this->db->where('id', 1)->update('sm_tunda_panggilan_farmasi', $delay);

				$decode = ["metaData" => ["code" => 200, "message" => "Silakan Lakukan Panggilan"]];
			} else {

				if ($cekUser === $user) {

					$delay = array(

						"status" => 0,
						"user"   => $user,
						"ip"     => $ip
					);

					$this->db->where('id', 1)->update('sm_tunda_panggilan_farmasi', $delay);

					$decode = ["metaData" => ["code" => 200, "message" => "Silakan Lakukan Panggilan"]];
				} else {
					if ($waktuTunggu < 2) {

						$delay = array(

							"status" => 0,
							"user"   => $user,
							"ip"     => $ip
						);

						$this->db->where('id', 1)->update('sm_tunda_panggilan_farmasi', $delay);

						$decode = ["metaData" => ["code" => 200, "message" => "Silakan Lakukan Panggilan"]];
					} else {

						$decode = ["metaData" => ["code" => 201, "message" => "Silakan Tunggu " . $waktuTunggu . " detik lagi "]];
					}
				}
			}
		} else {

			$decode = ["metaData" => ["code" => 201, "message" => "Silakan Tunggu " . $waktuTunggu . " detik lagi "]];
		}


		if ($this->db->trans_status() === FALSE) :
			$this->db->trans_rollback();
			$decode['status'] = FALSE;
		else :
			$this->db->trans_commit();
			$decode['status'] = TRUE;
		endif;

		$this->response($decode, REST_Controller::HTTP_OK);
	}

	public function simpan_call_antrean_post()
	{
		$this->db->trans_begin();

		if (safe_post('id_antrean') === '') {
			$response = array('status' => FALSE, 'message' => 'Parameter tidak lengkap, silahkan hubungi bagian IT.');
			$this->response($response, REST_Controller::HTTP_OK);

			return;
		}

		$waktu_panggil        = time();
		$id_antrean           = safe_post('id_antrean');
		$loket_antrean        = safe_post('loket_antrean');
		$call_antrean         = safe_post('call_antrean');
		$kode_pangggil_dokter = safe_post('kode_pangggil_dokter');
		$kode_pangggil_poli   = safe_post('kode_pangggil_poli');

		$konversi_waktu_panggil     = date('Y-m-d H:i:s', $waktu_panggil);
		$konversi_tanggal_kunjungan = date('Y-m-d', $waktu_panggil);

		$user = $this->session->userdata('id_translucent');

		$ip = $_SERVER['REMOTE_ADDR'];

		if ($call_antrean === 'Belum Dipanggil') {

			$panggil_pasien = 'Call';
		} else {

			$panggil_pasien = 'Recall';
		}

		$dataDelay = $this->antrian->dataDelayPanggilan();

		$cekUser = $dataDelay->user;
		$cekIp   = $dataDelay->ip;

		if ($cekUser === $user && $cekIp === $ip) {

			$delay = array(
				"waktu"  => $konversi_waktu_panggil,
				"user"   => $user,
				"ip"     => $ip,
				"status" => 1
			);

			$this->db->where('id', 1)->update('sm_tunda_panggilan_farmasi', $delay);

			$antrean = array(
				"panggilan_pasien" => $panggil_pasien,
				"loket"            => $loket_antrean
			);

			$data = $this->db->where('id', $id_antrean)->update('sm_antrian_farmasi', $antrean);

			$call_detail = array(
				"jenis_panggilan" => $panggil_pasien,
				"waktu"           => $konversi_waktu_panggil,
				"loket"           => $loket_antrean,
				"id_antrian"      => $id_antrean,
				"tanggal_kunjung" => $konversi_tanggal_kunjungan,
				"user_create"     => $this->session->userdata('id_translucent'),
			);

			$id_panggil = $this->antrian->simpanPanggilPasien($call_detail);

			$call_audio = $this->antrian->panggilAudio($id_antrean);

			$a_loket = (int) $loket_antrean;

			$b_loket = $this->audio_huruf($a_loket);

			$no_urut = '<source src="' . resource_url() . 'audio/nourut.wav" type="audio/wav">';

			$c = '<source src="' . resource_url() . 'audio/' . $b_loket . '.wav" type="audio/wav">';

			$s_loket = '<source src="' . resource_url() . 'audio/loket.wav" type="audio/wav">';


			$huruf_audio = $call_audio->huruf_antrean;

			$b = '<source src="' . resource_url() . 'audio/' . $huruf_audio . '.wav" type="audio/wav">';

			$angka_audio = (int) $call_audio->urutan;
			// $angka_audio = 999;

			$urutan_audio = $this->audio_huruf($angka_audio);

			$split_audio = explode(' ', $urutan_audio);

			$a = array();

			foreach ($split_audio as $key) {

				$e[] = $key;
			}

			if ($id_panggil !== NULL) {

				$decode = [
					"metaData" => [
						"code"         => "200",
						"message"      => "Pemanggilan Pasien Berhasil",
						"c"            => $b_loket,
						"huruf_audio"  => $huruf_audio,
						"angka_audio"  => $angka_audio,
						"urutan_audio" => $e
					]
				];
			} else {

				$decode = ["metaData" => ["code" => "201", "message" => "Pemanggilan Pasien Gagal"]];
			}
		} elseif ($cekUser === NULL && $cekIp === NULL) {

			$delay = array(
				"waktu"  => $konversi_waktu_panggil,
				"user"   => $user,
				"ip"     => $ip,
				"status" => 1
			);

			$this->db->where('id', 1)->update('sm_tunda_panggilan_farmasi', $delay);

			$antrean = array(
				"panggilan_pasien" => $panggil_pasien,
				"loket"            => $loket_antrean
			);

			$data = $this->db->where('id', $id_antrean)->update('sm_antrian_farmasi', $antrean);

			$call_detail = array(
				"jenis_panggilan" => $panggil_pasien,
				"loket"           => $loket_antrean,
				"id_antrian"      => $id_antrean,
				"tanggal_kunjung" => $konversi_tanggal_kunjungan,
				"user_create"     => $this->session->userdata('id_translucent'),
			);

			$id_panggil = $this->antrian->simpanPanggilPasien($call_detail);

			$call_audio = $this->antrian->panggilAudio($id_antrean);

			$a_loket = (int) $loket_antrean;

			$b_loket = $this->audio_huruf($a_loket);

			$no_urut = '<source src="' . resource_url() . 'audio/nourut.wav" type="audio/wav">';

			$c = '<source src="' . resource_url() . 'audio/' . $b_loket . '.wav" type="audio/wav">';

			$s_loket = '<source src="' . resource_url() . 'audio/loket.wav" type="audio/wav">';


			$huruf_audio = $call_audio->huruf_antrean;

			$b = '<source src="' . resource_url() . 'audio/' . $huruf_audio . '.wav" type="audio/wav">';

			$angka_audio = (int) $call_audio->urutan;
			// $angka_audio = 999;

			$urutan_audio = $this->audio_huruf($angka_audio);

			$split_audio = explode(' ', $urutan_audio);

			$a = array();

			foreach ($split_audio as $key) {

				$e[] = $key;
			}

			if ($id_panggil !== NULL) {

				$decode = [
					"metaData" => [
						"code"         => "200",
						"message"      => "Pemanggilan Pasien Berhasil",
						"c"            => $b_loket,
						"huruf_audio"  => $huruf_audio,
						"angka_audio"  => $angka_audio,
						"urutan_audio" => $e
					]
				];
			} else {

				$decode = ["metaData" => ["code" => "201", "message" => "Pemanggilan Pasien Gagal"]];
			}
		} else {

			$waktuDb = $dataDelay->waktu;

			$timeDb       = strtotime($waktuDb);
			$waktuPanggil = time();
			$tambahDelay  = $timeDb + 100;

			$waktuTunggu = $tambahDelay - $waktuPanggil;

			if ($waktuTunggu > 2) {

				$delay = array(
					"waktu"  => $konversi_waktu_panggil,
					"user"   => $user,
					"ip"     => $ip,
					"status" => 1
				);

				$this->db->where('id', 1)->update('sm_tunda_panggilan_farmasi', $delay);

				$antrean = array(
					"panggilan_pasien" => $panggil_pasien,
					"loket"            => $loket_antrean
				);

				$data = $this->db->where('id', $id_antrean)->update('sm_antrian_farmasi', $antrean);

				$call_detail = array(
					"jenis_panggilan" => $panggil_pasien,
					"waktu"           => $konversi_waktu_panggil,
					"loket"           => $loket_antrean,
					"id_antrian"      => $id_antrean,
					"tanggal_kunjung" => $konversi_tanggal_kunjungan,
					"user_create"     => $this->session->userdata('id_translucent'),
				);

				$id_panggil = $this->antrian->simpanPanggilPasien($call_detail);

				$call_audio = $this->antrian->panggilAudio($id_antrean);

				$a_loket = (int) $loket_antrean;

				$b_loket = $this->audio_huruf($a_loket);

				$no_urut = '<source src="' . resource_url() . 'audio/nourut.wav" type="audio/wav">';

				$c = '<source src="' . resource_url() . 'audio/' . $b_loket . '.wav" type="audio/wav">';

				$s_loket = '<source src="' . resource_url() . 'audio/loket.wav" type="audio/wav">';


				$huruf_audio = $call_audio->huruf_antrean;

				$b = '<source src="' . resource_url() . 'audio/' . $huruf_audio . '.wav" type="audio/wav">';

				$angka_audio = (int) $call_audio->urutan;
				// $angka_audio = 999;

				$urutan_audio = $this->audio_huruf($angka_audio);

				$split_audio = explode(' ', $urutan_audio);

				$a = array();

				foreach ($split_audio as $key) {

					$e[] = $key;
				}

				if ($id_panggil !== NULL) {

					$decode = [
						"metaData" => [
							"code"         => "200",
							"message"      => "Pemanggilan Pasien Berhasil",
							"c"            => $b_loket,
							"huruf_audio"  => $huruf_audio,
							"angka_audio"  => $angka_audio,
							"urutan_audio" => $e
						]
					];
				} else {

					$decode = ["metaData" => ["code" => "201", "message" => "Pemanggilan Pasien Gagal"]];
				}
			} else {

				$decode = ["metaData" => ["code" => 201, "message" => "Silakan Tunggu " . $waktuTunggu . " detik lagi "]];
			}
		}

		if ($this->db->trans_status() === FALSE) :
			$this->db->trans_rollback();
			$decode['status'] = FALSE;
		else :
			$this->db->trans_commit();
			$decode['status'] = TRUE;
		endif;

		$this->response($decode, REST_Controller::HTTP_OK);
	}

	public function audio_huruf($bilangan)
	{

		$angka   = array(
			'0',
			'0',
			'0',
			'0',
			'0',
			'0',
			'0',
			'0',
			'0',
			'0',
			'0',
			'0',
			'0',
			'0',
			'0',
			'0'
		);
		$kata    = array(
			'',
			'satu',
			'dua',
			'tiga',
			'empat',
			'lima',
			'enam',
			'tujuh',
			'delapan',
			'sembilan'
		);
		$tingkat = array('', 'ribu', 'juta', 'milyar', 'triliun');

		$panjang_bilangan = strlen($bilangan);

		/* pengujian panjang bilangan */
		if ($panjang_bilangan > 15) {
			$kalimat = "Diluar Batas";

			return $kalimat;
		}

		/* mengambil angka-angka yang ada dalam bilangan,
		   dimasukkan ke dalam array */
		for ($i = 1; $i <= $panjang_bilangan; $i++) {
			$angka[$i] = substr($bilangan, - ($i), 1);
		}

		$i       = 1;
		$j       = 0;
		$kalimat = "";


		/* mulai proses iterasi terhadap array angka */
		while ($i <= $panjang_bilangan) {

			$subkalimat = "";
			$kata1      = "";
			$kata2      = "";
			$kata3      = "";

			/* untuk ratusan */
			if ($angka[$i + 2] != "0") {
				if ($angka[$i + 2] == "1") {
					$kata1 = "seratus";
				} else {
					$kata1 = $kata[$angka[$i + 2]] . " ratus";
				}
			}

			/* untuk puluhan atau belasan */
			if ($angka[$i + 1] != "0") {
				if ($angka[$i + 1] == "1") {
					if ($angka[$i] == "0") {
						$kata2 = "sepuluh";
					} elseif ($angka[$i] == "1") {
						$kata2 = "sebelas";
					} else {
						$kata2 = $kata[$angka[$i]] . " belas";
					}
				} else {
					$kata2 = $kata[$angka[$i + 1]] . " puluh";
				}
			}

			/* untuk satuan */
			if ($angka[$i] != "0") {
				if ($angka[$i + 1] != "1") {
					$kata3 = $kata[$angka[$i]];
				}
			}

			/* pengujian angka apakah tidak nol semua,
			   lalu ditambahkan tingkat */
			if (($angka[$i] != "0") or ($angka[$i + 1] != "0") or
				($angka[$i + 2] != "0")
			) {
				$subkalimat = "$kata1 $kata2 $kata3 " . $tingkat[$j] . " ";
			}

			/* gabungkan variabe sub kalimat (untuk satu blok 3 angka)
			   ke variabel kalimat */
			$kalimat = $subkalimat . $kalimat;
			$i       = $i + 3;
			$j       = $j + 1;
		}

		/* mengganti satu ribu jadi seribu jika diperlukan */
		if (($angka[5] == "0") and ($angka[6] == "0")) {
			$kalimat = str_replace("satu ribu", "seribu", $kalimat);
		}

		return trim($kalimat);
	}

	public function simpan_kehadiran_pasien_post()
	{

		if (safe_post('id_hadir') === '') {
			$response = array('status' => FALSE, 'message' => 'Parameter tidak lengkap, silahkan hubungi bagian IT.');
			$this->response($response, REST_Controller::HTTP_OK);

			return;
		}

		$waktu_hadir = time();
		$id_hadir    = safe_post('id_hadir');

		$konversi_waktu_hadir = date('Y-m-d H:i:s', $waktu_hadir);

		$kehadiran = [
			"waktu_panggil"  => $konversi_waktu_hadir,
			"status_antrean" => 'Dilayani'
		];

		$this->db->where('id', $id_hadir)->update('sm_antrian_farmasi', $kehadiran);

		$this->response(['metaData' => ['code' => 200, 'message' => 'Pasien Hadir']], REST_Controller::HTTP_OK);
	}

	public function selesai_dilayani_post()
	{
		// id antrian farmasi
		$id = safe_post('id');

		if (!$id) {
			$this->response(['message' => 'Parameter tidak lengkap. Silahkan hubungi pihak IT'], self::HTTP_BAD_REQUEST);

			return;
		}

		$this->db->trans_begin();

		$id_penjualan = $this->antrian->getIdPenjualanByIdResep($id);

		$this->db->where('id', $id_penjualan->id)->update('sm_penjualan', ['waktu_diserahkan' => $this->datetime]);

		$this->db->where('id', $id)->update('sm_antrian_farmasi', ['status_antrean' => 'Selesai']);

		$id_pendaftaran = $this->db->select('lp.id_pendaftaran')
			->from('sm_resep r')
			->join('sm_layanan_pendaftaran lp', 'lp.id = r.id_layanan_pendaftaran')
			->where('r.id', $id)->get()->row()->id_pendaftaran;

		$this->load->model('pelayanan/Pelayanan_model', 'm_pelayanan');
		$cekBooking = $this->m_pelayanan->cekBookingPendaftaran($id_pendaftaran);

		$jenisLayanan = $this->db->select('lp.jenis_layanan')
			->from('sm_resep r')
			->join('sm_layanan_pendaftaran lp', 'lp.id = r.id_layanan_pendaftaran')
			->where('r.id', $id)->get()->row();

		if(isset($jenisLayanan->jenis_layanan)){

			if($jenisLayanan->jenis_layanan === 'Poliklinik'){

				$this->load->model('satu_sehat/Satu_sehat_model', 'sehat');

                $cekOnOff = $this->sehat->cekSatuSehatOnOff();

                if($cekOnOff->onoff === '1'){

					$this->load->model('salinan_resep/Salinan_resep_model', 'resep');

					$this->resep->integrasiMedicationDispense($id_penjualan->id);

				}
			}

		}

		if (isset($cekBooking->kode_booking)) {

			$kodeBookingBPJS = $cekBooking->kode_booking;

			if (!empty($kodeBookingBPJS)) {

				$cek_booking_pendaftaran = $this->m_pelayanan->cekBookingPendaftaran($id_pendaftaran);

				if (isset($cek_booking_pendaftaran->kode_booking)) {

					$kode_booking_bpjs = $cek_booking_pendaftaran->kode_booking;

					if (!empty($kode_booking_bpjs)) {

						date_default_timezone_set('Asia/Jakarta');
						$tanggalTunggu = (round(microtime(TRUE) * 1000));
						$new_estimasi  = date('Y-m-d H:i:s', $tanggalTunggu / 1000);

						$update = ["task_tujuh" => $new_estimasi];

						$get_id_antrian = $this->m_pelayanan->getIdAntrean($kode_booking_bpjs);
						$id_antrian     = (int) $get_id_antrian->id;

						$get_task_tujuh = $this->db->select('task_tujuh')->from('sm_antrian_bpjs')->where('id', $id_antrian)->get()->row();

						if ($get_task_tujuh->task_tujuh === NULL) {

							$data_antrian = $this->db->where('id', $id_antrian)->update('sm_antrian_bpjs', $update);

							if ($data_antrian !== FALSE) {

								$data_response = array(
									"nomor_task"     => 7,
									"waktu_task"     => $tanggalTunggu,
									"kode_booking"   => $kode_booking_bpjs,
									"id_antrian"     => $id_antrian,
									"konversi_waktu" => $new_estimasi,
								);

								$cek_respon_bpjs = $this->m_pelayanan->getResponseBPJS($kode_booking_bpjs, 7);

								if (!isset($cek_respon_bpjs->id)) {

									$this->db->insert('sm_update_task_bpjs', $data_response);
								}
							}
						}
					}
				}
			}
		}

		if ($this->db->trans_status() === FALSE) {
			$this->db->trans_rollback();
			$this->response(['message' => 'Gagal menyerahkan resep'], self::HTTP_BAD_REQUEST);
		} else {
			$this->db->trans_commit();
			$this->response(['message' => 'Berhasil menyerahkan resep'], self::HTTP_OK);
		}
	}

	public function get_list_resep_get()
	{
		$id_layanan_pendaftaran = $this->get('id_layanan_pendaftaran');

		$list_resep = $this->db->select("r.*, rt.id as id_resep_tebus, af.id as id_antrian_farmasi, case when rt.cetakan_ke != '0' then 1 else 0 end as is_cetak, p.waktu_diserahkan")
			->from('sm_resep r')
			->join('sm_resep_tebus rt', 'r.id = rt.id_resep')
			->join('sm_antrian_farmasi af', 'af.id_layanan_pendaftaran = r.id_layanan_pendaftaran')
			->join('sm_penjualan p', 'r.id = p.id_resep', 'left')
			->where('r.id_layanan_pendaftaran', $id_layanan_pendaftaran)
			->get()->result();

		$this->response(['status' => TRUE, 'data' => $list_resep], self::HTTP_OK);
	}

	public function data_monitor_antrian_get()
	{
		$data['panggil']    = $this->antrian->dataPanggilAntrian();
		$data['loket_satu'] = $this->antrian->dataPanggilSatu();
		$data['loket_dua']  = $this->antrian->dataPanggilDua();
		$data['loket_tiga'] = $this->antrian->dataPanggilTiga();
		$data['loket_empat'] = $this->antrian->dataPanggilEmpat();

		if ($data) {
			$this->response($data, REST_Controller::HTTP_OK);

			return;
		}

		$this->response(['message' => 'Terjadi kesalahan pada server'], REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
	}

	public function check_status_keluar_get()
	{
		$id_layanan_pendaftaran = $this->get('id_layanan');

		$cek_status = $this->db->select('s.nama as nama_poli, lp.tindak_lanjut')
			->from('sm_layanan_pendaftaran lp')
			->join('sm_pendaftaran p', 'p.id = lp.id_pendaftaran')
			->join('sm_spesialisasi s', 's.id = lp.id_unit_layanan')
			->where('lp.id', $id_layanan_pendaftaran)
			->get()->row();

		if (empty($cek_status->tindak_lanjut)) {
			$this->response(['status' => 'status_pasien', 'message' => "Pasien belum checkout pada POLI: {$cek_status->nama_poli}"], self::HTTP_BAD_REQUEST);
		} else {
			$this->response(['status' => TRUE, 'data' => $cek_status], self::HTTP_OK);
		}
	}

	public function check_sudah_bayar_get()
	{
		$id_layanan_pendaftaran = $this->get('id_layanan');

		$check_sudah_bayar = $this->db->select('pd.lunas,pd.id_penjamin,pd.konfirmasi_kasir')
			->from('sm_layanan_pendaftaran lp')
			->join('sm_pendaftaran pd', 'pd.id = lp.id_pendaftaran')
			->where('lp.id', $id_layanan_pendaftaran)
			->where('pd.id_penjamin !=', 1)
			->get()->row();

		if (!empty($check_sudah_bayar)) {
			if ($check_sudah_bayar->lunas == 'Belum' && $check_sudah_bayar->id_penjamin === '9') {
				$this->response(['status' => 'status_pasien', 'message' => "Pasien belum melakukan pembayaran"], self::HTTP_BAD_REQUEST);
			} elseif ($check_sudah_bayar->lunas == 'Belum' && $check_sudah_bayar->id_penjamin !== '1' && $check_sudah_bayar->konfirmasi_kasir !== '1'){
				$this->response(['status' => 'status_pasien', 'message' => "Silahkan menuju ke kasir untuk konfirmasi"], self::HTTP_BAD_REQUEST);
			} else {
				$this->response(['status' => TRUE, 'data' => $check_sudah_bayar], self::HTTP_OK);
			}
		} else {
			$this->response(['status' => TRUE, 'data' => $check_sudah_bayar], self::HTTP_OK);
		}
	}

	private function mulai($page)
	{
		return (($page - 1) * $this->batas);
	}

	public function get_list_history_cetak_copy_resep_get()
	{
		$id_resep = $this->get('id_resep');

		$data = $this->db->select('hcr.*, peg.nama')
	                        ->from('sm_history_cetak_copy_resep hcr')
							->join('sm_translucent t', 't.id = hcr.user_id')
							->join('sm_pegawai peg', 'peg.id = t.id')
	                        ->where('resep_id', $id_resep)
	                        ->get()->result();

		$this->response(['data' => $data], self::HTTP_OK);
	}
}
