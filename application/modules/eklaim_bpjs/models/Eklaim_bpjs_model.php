<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Eklaim_bpjs_model extends CI_Model
{

	function __construct()
	{
		parent::__construct();
		$this->eklaim_config = $this->default->getConfigEklaim();
		$this->load->model('keuangan/Keuangan_ver2_model', 'm_keuangan_ver2');
	}

	// encryption function
	function inacbg_encrypt($data)
	{
		// make binary representation of $key
		$encryption_key = $this->eklaim_config->encryption_key;
		$key = hex2bin($encryption_key);
		// check key length, must be 256 bit or 32 bytes
		if (mb_strlen($key, "8bit") !== 32) {
			throw new Exception("Needs a 256-bit key!");
		}
		// create initialization vector
		$iv_size = openssl_cipher_iv_length("aes-256-cbc");
		$iv = openssl_random_pseudo_bytes($iv_size);
		// process encrypt
		$encrypted =  openssl_encrypt($data, "aes-256-cbc", $key, OPENSSL_RAW_DATA, $iv);
		// create signature, against padding oracle attacks
		$signature = mb_substr(hash_hmac("sha256", $encrypted, $key, true), 0, 10, "8bit");
		// combine all, encode, and format
		$encoded = chunk_split(base64_encode($signature . $iv . $encrypted));
		return $encoded;
	}

	// decryption function
	function inacbg_decrypt($data)
	{
		// make binary representation of $key
		$encryption_key = $this->eklaim_config->encryption_key;
		$key = hex2bin($encryption_key);
		// check key length, must be 256 bit or 32 bytes
		if (mb_strlen($key, "8bit") !== 32) {
			throw new Exception("Needs a 256-bit key!");
		}
		// calculate iv size
		$iv_size = openssl_cipher_iv_length("aes-256-cbc");
		// breakdown parts
		$decoded = base64_decode($data);
		$signature = mb_substr($decoded, 0, 10, "8bit");
		$iv = mb_substr($decoded, 10, $iv_size, "8bit");
		$encrypted = mb_substr($decoded, $iv_size + 10, NULL, "8bit");
		// create signature, against padding oracle attacks
		$calc_signature = mb_substr(hash_hmac("sha256", $encrypted, $key, true), 0, 10, "8bit");
		if (!$this->inacbg_compare($signature, $calc_signature)) {
			$message = "Signature Not Match!";
			return $message;
		}
		$decrypted = openssl_decrypt($encrypted, "aes-256-cbc", $key, OPENSSL_RAW_DATA, $iv);
		return $decrypted;
	}

	// compare function
	function inacbg_compare($a, $b)
	{
		// compare individually to prevent timing attacks
		// compare length
		if (strlen($a) !== strlen($b)) return false;
		// compare individual 
		$result = 0;
		for ($i = 0; $i < strlen($a); $i++) {
			$result |= ord($a[$i]) ^ ord($b[$i]);
		}
		return $result == 0;
	}

	// setup curl
	function setUpCURL($payload)
	{
		$url = $this->eklaim_config->server;
		$header = array("Content-Type: application/x-www-form-urlencoded");

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);

		// request dengan curl
		$response = curl_exec($ch);

		// terlebih dahulu hilangkan "----BEGIN ENCRYPTED DATA----\r\n"
		// dan hilangkan "----END ENCRYPTED DATA----\r\n" dari response
		$first = strpos($response, "\n") + 1;
		$last = strrpos($response, "\n") - 1;
		$response = substr(
			$response,
			$first,
			strlen($response) - $first - $last
		);

		// decrypt dengan fungsi inacbg_decrypt
		$response = $this->inacbg_decrypt($response);

		return $response;
	}

	function getLaporanEklaim($limit, $start, $search)
	{
		$param = "";

		if ($search["tanggal_awal"] !== "" & $search["tanggal_akhir"] !== "") :
			if ($search["periode"] == "tgl_pulang") {
				$param .= " and ek.tgl_pulang BETWEEN '" . date2mysql($search['tanggal_awal']) . " 00:00:00' AND '" . date2mysql($search['tanggal_akhir']) . " 23:59:59'";
			} else if ($search["periode"] == "tgl_masuk") {
				$param .= " and ek.tgl_masuk BETWEEN '" . date2mysql($search['tanggal_awal']) . " 00:00:00' AND '" . date2mysql($search['tanggal_akhir']) . " 23:59:59'";
			}
		endif;

		if ($search["tanggal_awal_grouper"] !== "" & $search["tanggal_akhir_grouper"] !== "") {
			$param .= " and ge.created_at BETWEEN '" . date2mysql($search['tanggal_awal']) . " 00:00:00' AND '" . date2mysql($search['tanggal_akhir']) . " 23:59:59'";
		}

		if ($search["jenis_rawat"] !== "") :
			$param .= " and ek.jenis_rawat = '" . $search['jenis_rawat'] . "' ";
		endif;
		if ($search["metode_bayar"] !== "") :
			$param .= " and ek.payor_id = '" . $search['metode_bayar'] . "' ";
		endif;
		if ($search["kelas_rawat"] !== "") :
			$param .= " and ek.kelas_rawat = '" . $search['kelas_rawat'] . "' ";
		endif;
		if ($search["cara_pulang"] !== "") :
			$param .= " and ek.discharge_status = '" . $search['cara_pulang'] . "' ";
		endif;
		if ($search["jenis_tarif"] !== "") :
			$param .= " and ek.kode_tarif = '" . $search['jenis_tarif'] . "' ";
		endif;
		if ($search["cob"] !== "") :
			$param .= " and ek.cob = '" . $search['cob'] . "' ";
		endif;
		if ($search["petugas_klaim"] !== "") :
			$param .= " and ek.coder_nik = '" . $search['petugas_klaim'] . "' ";
		endif;

		if ($search["order_by"] !== "") :
			if ($search["order_by"] == "default") {
				$order_by = " ORDER BY to_char(ek.tgl_pulang, 'YYYY-MM-DD') ASC, ge.created_at ASC ";
			} else if ($search["order_by"] == "grouping") {
				$order_by = " ORDER BY ge.created_at ASC ";
			} else if ($search["order_by"] == "waktu-pulang") {
				$order_by = " ORDER BY to_char(ek.tgl_pulang, 'YYYY-MM-DD') ASC ";
			} else if ($search["order_by"] == "waktu-masuk") {
				$order_by = " ORDER BY to_char(ek.tgl_masuk, 'YYYY-MM-DD') ASC ";
			} else if ($search["order_by"] == "no_sep") {
				$order_by = " ORDER BY ek.nomor_sep ASC ";
			}
		endif;

		$limitation = "";
		if ($limit !== 0) :
			$limitation = " limit " . $limit . " offset " . $start;
		endif;

		$select = " SELECT DISTINCT (pd.id), ek.id id_eklaim, pd.no_register, to_char(ek.tgl_masuk, 'YYYY-MM-DD') tgl_masuk, 
							to_char(ek.tgl_pulang, 'YYYY-MM-DD') tgl_pulang, CASE WHEN pj.nama = 'BPJS' THEN 'JKN' ELSE pj.nama END jaminan, 
							ek.nomor_sep, ek.nomor_rm, ek.nama_pasien, p.kelamin, p.tanggal_lahir, 
							CASE WHEN ek.jenis_rawat = '1' THEN 'RI' ELSE 'RJ' END rawat, ge.cbg_code AS cbg, ge.cbg_tarif AS tarif_eklaim, 
							(prosedur_non_bedah + prosedur_bedah + konsultasi + tenaga_ahli + keperawatan + penunjang + radiologi + laboratorium + 
							pelayanan_darah + rehabilitasi + kamar + rawat_intensif + obat + obat_kronis + obat_kemoterapi + alkes + bmhp + 
							sewa_alat) as billing_rs, ek.status_bridging status_klaim, 
							CASE WHEN lower(pg.nama) LIKE 'dr.%' THEN 'dr. ' || INITCAP(TRIM(SUBSTRING(pg.nama FROM 5))) 
							ELSE INITCAP(pg.nama) END coder, 
							CASE WHEN lower(ge.coder_name ) LIKE 'dr.%' THEN 'dr. ' || INITCAP(TRIM(SUBSTRING(ge.coder_name  FROM 5))) 
							ELSE INITCAP(ge.coder_name ) END AS nama_petugas, ge.created_at AS tgl_kirim ";
		$count = "select count(*) ";

		$sql = "FROM sm_eklaim ek
						JOIN sm_pendaftaran pd on ek.id_pendaftaran = pd.id
						JOIN sm_penjamin pj on pd.id_penjamin = pj.id
						JOIN sm_pasien p on pd.id_pasien = p.id
						LEFT JOIN sm_pegawai pg on ek.coder_nik = pg.nik
						LEFT JOIN sm_grouper_eklaim ge on ek.id = ge.id_eklaim

						WHERE pd.no_sep is not null
						-- AND ek.status_bridging = 'terkirim' 
						" . $param;

		// $order = " ORDER BY pd.id DESC ";

		$query = $this->db->query($select . $sql . $order_by . $limitation)->result();

		$result["data"] = $query;
		$result["jumlah"] = $this->db->query($count . $sql)->row()->count;
		return $result;
	}

	function getDataEklaim($limit, $start, $search)
	{
		$param = "";
		$typeData = "";

		if (!empty($search["keyword"])) {
			$keyword = trim($search["keyword"]); // Hapus spasi di awal & akhir

			if (ctype_digit($keyword)) { // Cek apakah keyword hanya berisi angka
				if (strlen($keyword) <= 8) {
					$param .= " and p.id ilike '%" . $keyword . "%' ";
				} else {
					$param .= " and pd.no_sep ilike '%" . $keyword . "%' ) ";
				}
			} else {
				$param .= " and p.nama ilike '%" . $keyword . "%' ";
			}

			$typeData = "by-name";
		} else {
			if ($search["tanggal_awal"] !== "" & $search["tanggal_akhir"] !== "") :
				if ($search["periode"] == "tgl_pulang") {
					$param .= " and pd.tanggal_keluar BETWEEN '" . date2mysql($search['tanggal_awal']) . " 00:00:00' AND '" . date2mysql($search['tanggal_akhir']) . " 23:59:59'";
				} else if ($search["periode"] == "tgl_masuk") {
					$param .= " and pd.tanggal_daftar BETWEEN '" . date2mysql($search['tanggal_awal']) . " 00:00:00' AND '" . date2mysql($search['tanggal_akhir']) . " 23:59:59'";
				} else if ($search["periode"] == "tgl_grouping") {
					$param .= " and ek.created_at BETWEEN '" . date2mysql($search['tanggal_awal']) . " 00:00:00' AND '" . date2mysql($search['tanggal_akhir']) . " 23:59:59'";
				}
			endif;

			if ($search["jenis_rawat"] !== "") :
				$param .= " and pd.jenis_rawat = '" . $search['jenis_rawat'] . "' ";
			endif;
			if ($search["metode_bayar"] !== "") :
				$param .= " and ek.payor_id = '" . $search['metode_bayar'] . "' ";
			endif;
			if ($search["kelas_rawat"] !== "") :
				$param .= " and ek.kelas_rawat = '" . $search['kelas_rawat'] . "' ";
			endif;
			if ($search["status_klaim"] !== "") :
				$param .= " and ek.status_bridging = '" . $search['status_klaim'] . "' ";
			endif;
			$typeData = "by-date";
		}

		$limitation = " limit " . $limit . " offset " . $start;
		$select = " SELECT DISTINCT (pd.id), ek.id id_eklaim, pd.no_register, to_char(pd.tanggal_daftar, 'YYYY-MM-DD') tgl_masuk, 
							to_char(pd.tanggal_keluar, 'YYYY-MM-DD') tgl_pulang, CASE WHEN pj.nama = 'BPJS' THEN 'JKN' ELSE pj.nama END jaminan, 
							pd.no_sep, p.id no_rm, p.nama nama_pasien, p.kelamin, p.tanggal_lahir, 
							CASE WHEN pd.jenis_rawat = 'Jalan' THEN 'RJ' ELSE 'RI' END rawat, ge.cbg_code AS cbg, ge.cbg_tarif AS tarif_eklaim, 
							(prosedur_non_bedah + prosedur_bedah + konsultasi + tenaga_ahli + keperawatan + penunjang + radiologi + laboratorium + 
							pelayanan_darah + rehabilitasi + kamar + rawat_intensif + obat + obat_kronis + obat_kemoterapi + alkes + bmhp + 
							sewa_alat) as billing_rs, ek.status_bridging status_klaim, pg.nama coder, ge.coder_name AS nama_petugas, 
							ge.created_at AS tgl_kirim  ";
		$count = "select count(*) ";

		$sql = "FROM sm_eklaim ek
						JOIN sm_pendaftaran pd on ek.id_pendaftaran = pd.id
						JOIN sm_penjamin pj on pd.id_penjamin = pj.id
						JOIN sm_pasien p on pd.id_pasien = p.id
						LEFT JOIN sm_pegawai pg on ek.coder_nik = pg.nik
						LEFT JOIN sm_grouper_eklaim ge on ek.id = ge.id_eklaim

						WHERE pd.no_sep is not null
						AND pj.id in ('1','16') " . $param;

		$order = " ORDER BY pd.id DESC ";
		// $order = " order by ek.tgl_masuk asc ";

		$query = $this->db->query($select . $sql . $order . $limitation)->result();
		// foreach ($query as $i => $value) :
		// 	$tagihan = $this->m_keuangan_ver2->hitungTagihan($value->id);
		// 	$value->billing_rs = $tagihan;
		// endforeach;

		$result["data"] = $query;
		$result['tipe'] = $typeData;
		$result["jumlah"] = $this->db->query($count . $sql)->row()->count;
		return $result;
	}

	// Function dalam bridging eKlaim v.5.8.x
	function newClaim($data)
	{
		$ws_query = [
			"metadata" => [
				"method" => 'new_claim'
			],
			"data" => [
				"nomor_kartu"	=> $data['nomor_kartu'],
				"nomor_sep"		=> $data['nomor_sep'],
				"nomor_rm" 		=> $data['nomor_rm'],
				"nama_pasien" => $data['nama_pasien'],
				"tgl_lahir" 	=> $data['tgl_lahir'], // Format tgl lahir YYYY-MM-DD hh:mm:ss
				"gender" 			=> $data['gender'], // Gender 1=laki-laki, 2=perempuan
			]
		];

		$json_request = json_encode($ws_query);

		// data yang akan dikirimkan dengan method POST adalah encrypted:
		$payload = $this->inacbg_encrypt($json_request);
		$response = $this->setUpCURL($payload);

		// hasil decrypt adalah format json, ditranslate kedalam array
		$msg = json_decode($response, true);

		return $msg;
	}

	function updatePatient($data)
	{
		$ws_query = [
			"metadata" => [
				"method" => 'update_patient'
			],
			"data" => [
				"nomor_kartu"	=> $data['nomor_kartu'],
				"nomor_sep"		=> $data['nomor_sep'],
				"nomor_rm" 		=> $data['nomor_rm'],
				"nama_pasien" => $data['nama_pasien'],
				"tgl_lahir" 	=> $data['tgl_lahir'], // Format tgl lahir YYYY-MM-DD hh:mm:ss
				"gender" 			=> $data['gender'], // Gender 1=laki-laki, 2=perempuan
			]
		];

		$json_request = json_encode($ws_query);

		// data yang akan dikirimkan dengan method POST adalah encrypted:
		$payload = $this->inacbg_encrypt($json_request);
		$response = $this->setUpCURL($payload);

		// hasil decrypt adalah format json, ditranslate kedalam array
		$msg = json_decode($response, true);

		return $msg;
	}

	function deletePatient($data)
	{
		$ws_query = [
			"metadata" => [
				"method" => 'delete_patient'
			],
			"data" => [
				"nomor_rm" 		=> $data['nomor_rm'],
				"coder_nik" 	=> $data['coder_nik'], //NIK Petugas Koder
			]
		];

		$json_request = json_encode($ws_query);

		// data yang akan dikirimkan dengan method POST adalah encrypted:
		$payload = $this->inacbg_encrypt($json_request);
		$response = $this->setUpCURL($payload);

		// hasil decrypt adalah format json, ditranslate kedalam array
		$msg = json_decode($response, true);

		return $msg;
	}

	function deleteClaim($data)
	{
		$ws_query = [
			"metadata" => [
				"method" => 'delete_claim'
			],
			"data" => [
				"nomor_sep" 		=> $data['nomor_sep'],
				"coder_nik" 	=> $data['coder_nik'], //NIK Petugas Koder
			]
		];

		$json_request = json_encode($ws_query);

		// data yang akan dikirimkan dengan method POST adalah encrypted:
		$payload = $this->inacbg_encrypt($json_request);
		$response = $this->setUpCURL($payload);

		// hasil decrypt adalah format json, ditranslate kedalam array
		$msg = json_decode($response, true);

		return $msg;
	}

	function getPersalinanData($data)
	{
		return [
			"persalinan"	=> [
				"usia_kehamilan" 				=> $data['usia_kehamilan'] ?? '0',
				"gravida" 							=> $data['gravida'] ?? '0',
				"partus" 								=> $data['partus'] ?? '0',
				"abortus" 							=> $data['abortus'] ?? '0',
				"onset_kontraksi" 			=> $data['onset_kontraksi'] ?? NULL,
				"delivery"        			=> $data['deliveryData'] ?? []
			]
		];
	}

	function setClaimData($data)
	{
		$icu_indikator = $data['icu_indikator'] ?? NULL;
		$use_ind = $data['use_ind'] ?? NULL;
		$upgrade_class_ind = $data['upgrade_class_ind'] ?? NULL;
		$is_persalinan = $data['is_persalinan'] ?? NULL;
		$is_apgar = $data['is_apgar'] ?? NULL;

		$ws_query = [
			"metadata" => [
				"method" => 'set_claim_data',
				"nomor_sep" 		=> $data['nomor_sep']
			],
			"data" => array_merge(
				[
					"nomor_sep" 						=> $data['nomor_sep'] ?? NULL,
					"nomor_kartu" 					=> $data['nomor_kartu'] ?? NULL,
					"tgl_masuk" 						=> $data['tgl_masuk'] ?? NULL, // Format tgl YYYY-MM-DD hh:mm:ss
					"tgl_pulang" 						=> $data['tgl_pulang'] ?? NULL, // Format tgl YYYY-MM-DD hh:mm:ss
					"cara_masuk" 						=> $data['cara_masuk'] ?? NULL, // Sesuai data dari function getCaraMasukEklaim
					"jenis_rawat" 					=> $data['jenis_rawat'] ?? NULL, // 1=rawat inap, 2=rawat jalan, 3=rawat igd 
					"kelas_rawat" 					=> $data['kelas_rawat'] ?? NULL, // 3 = Kelas 3, 2 = Kelas 2, 1 = Kelas 1
					"adl_sub_acute" 				=> $data['adl_sub_acute'] ?? NULL,
					"adl_chronic" 					=> $data['adl_chronic'] ?? NULL,
					"icu_indikator" 				=> $data['icu_indikator'] ?? NULL,
					"icu_los" 							=> $data['icu_los'] ?? NULL, // Jumlah hari rawat di ICU
					"ventilator_hour"				=> $data['ventilator_hour'] ?? NULL
				],

				$icu_indikator === '1' && $use_ind === '1' ? [
					"ventilator" => [
						"use_ind" => $data['use_ind'] ?? NULL,
						"start_dttm" => $data['start_dttm'] ?? NULL,
						"stop_dttm" => $data['stop_dttm'] ?? NULL,
					]
				] : [
					"ventilator" => [
						"use_ind" => 0,
						"start_dttm" => 0,
						"stop_dttm" => 0,
					]
				],

				$upgrade_class_ind === '1' ? [
					"upgrade_class_ind" 		=> $data['upgrade_class_ind'] ?? NULL,
					"upgrade_class_class" 	=> $data['upgrade_class_class'] ?? NULL,
					"upgrade_class_los" 		=> $data['upgrade_class_los'] ?? NULL,
					"upgrade_class_payor" 	=> $data['upgrade_class_payor'] ?? NULL,
					"add_payment_pct" 			=> $data['add_payment_pct'] ?? NULL,
				] : [],

				[
					"birth_weight" 					=> $data['birth_weight'] ?? NULL,
					"sistole" 							=> $data['sistole'] ?? NULL,
					"diastole" 							=> $data['diastole'] ?? NULL,
					"discharge_status" 			=> $data['discharge_status'] ?? NULL,
					"diagnosa" 							=> $data['diagnosa'] ?? NULL,
					"procedure" 						=> $data['procedure'] ?? NULL,
					"diagnosa_inagrouper" 	=> $data['diagnosa_inagrouper'] ?? NULL,
					"procedure_inagrouper" 	=> $data['procedure_inagrouper'] ?? NULL,
					"tarif_rs" => [
						"prosedur_non_bedah"	=> $data['prosedur_non_bedah'] ?? NULL,
						"prosedur_bedah" 			=> $data['prosedur_bedah'] ?? NULL,
						"konsultasi" 					=> $data['konsultasi'] ?? NULL,
						"tenaga_ahli" 				=> $data['tenaga_ahli'] ?? NULL,
						"keperawatan" 				=> $data['keperawatan'] ?? NULL,
						"penunjang" 					=> $data['penunjang'] ?? NULL,
						"radiologi" 					=> $data['radiologi'] ?? NULL,
						"laboratorium" 				=> $data['laboratorium'] ?? NULL,
						"pelayanan_darah" 		=> $data['pelayanan_darah'] ?? NULL,
						"rehabilitasi" 				=> $data['rehabilitasi'] ?? NULL,
						"kamar" 							=> $data['kamar'] ?? NULL,
						"rawat_intensif" 		=> $data['rawat_intensif'] ?? NULL,
						"obat" 								=> $data['obat'] ?? NULL,
						"obat_kronis" 				=> $data['obat_kronis'] ?? NULL,
						"obat_kemotrapi" 			=> $data['obat_kemotrapi'] ?? NULL,
						"alkes" 							=> $data['alkes'] ?? NULL,
						"bmhp" 								=> $data['bmhp'] ?? NULL,
						"sewa_alat" 					=> $data['sewa_alat'] ?? NULL
					],
					"pemulasaraan_jenazah" 				=> $data['pemulasaraan_jenazah'] ?? NULL,
					"kantong_jenazah" 						=> $data['kantong_jenazah'] ?? NULL,
					"peti_jenazah" 								=> $data['peti_jenazah'] ?? NULL,
					"plastik_erat" 								=> $data['plastik_erat'] ?? NULL,
					"desinfektan_jenazah" 				=> $data['desinfektan_jenazah'] ?? NULL,
					"mobil_jenazah" 							=> $data['mobil_jenazah'] ?? NULL,
					"desinfektan_mobil_jenazah" 	=> $data['desinfektan_mobil_jenazah'] ?? NULL,
					"covid19_status_cd" 					=> $data['covid19_status_cd'] ?? NULL,
					"nomor_kartu_t" 							=> $data['nomor_kartu_t'] ?? NULL,
					"episodes" 										=> $data['episodes'] ?? NULL,
					"covid19_cc_ind" 							=> $data['covid19_cc_ind'] ?? NULL,
					"covid19_rs_darurat_ind" 			=> $data['covid19_rs_darurat_ind'] ?? NULL,
					"covid19_co_insidense_ind" 		=> $data['covid19_co_insidense_ind'] ?? NULL,
					// "covid19_penunjang_pengurang"	=> [
					// 	"lab_asam_laktat" 			=> $data['lab_asam_laktat'] ?? NULL,
					// 	"lab_procalcitonin" 		=> $data['lab_procalcitonin'] ?? NULL,
					// 	"lab_crp" 							=> $data['lab_crp'] ?? NULL,
					// 	"lab_kultur" 						=> $data['lab_kultur'] ?? NULL,
					// 	"lab_d_dimer" 					=> $data['lab_d_dimer'] ?? NULL,
					// 	"lab_pt" 								=> $data['lab_pt'] ?? NULL,
					// 	"lab_aptt" 							=> $data['lab_aptt'] ?? NULL,
					// 	"lab_waktu_pendarahan"	=> $data['lab_waktu_pendarahan'] ?? NULL,
					// 	"lab_anti_hiv" 					=> $data['lab_anti_hiv'] ?? NULL,
					// 	"lab_analisa_gas" 			=> $data['lab_analisa_gas'] ?? NULL,
					// 	"lab_albumin" 					=> $data['lab_albumin'] ?? NULL,
					// 	"rad_thorax_ap_pa" 			=> $data['rad_thorax_ap_pa'] ?? NULL
					// ],
					"terapi_konvalesen" 					=> $data['terapi_konvalesen'] ?? NULL,
					"akses_naat" 									=> $data['akses_naat'] ?? NULL,
					"isoman_ind" 									=> $data['isoman_ind'] ?? NULL,
					"dializer_single_use" 				=> $data['dializer_single_use'] ?? NULL,
					"kantong_darah" 							=> $data['kantong_darah'] ?? NULL,
					"bayi_lahir_status_cd" 				=> $data['bayi_lahir_status_cd'] ?? NULL,
					"alteplase_ind" 							=> $data['alteplase_ind'] ?? NULL,
				],

				$is_apgar === '1' ? [
					"apgar"	=> [
						"menit_1"	=> [
							"appearance" 					=> $data['appearance_1'] ?? NULL,
							"pulse" 							=> $data['pulse_1'] ?? NULL,
							"grimace" 						=> $data['grimace_1'] ?? NULL,
							"activity" 						=> $data['activity_1'] ?? NULL,
							"respiration" 				=> $data['respiration_1'] ?? NULL
						],
						"menit_5"	=> [
							"appearance" 					=> $data['appearance_5'] ?? NULL,
							"pulse" 							=> $data['pulse_5'] ?? NULL,
							"grimace" 						=> $data['grimace_5'] ?? NULL,
							"activity" 						=> $data['activity_5'] ?? NULL,
							"respiration" 				=> $data['respiration_5'] ?? NULL
						]
					],
				] : [],

				$is_persalinan === '1' ? $this->getPersalinanData($data) : [],

				[
					"tarif_poli_eks"	=> $data["tarif_poli_eks"] ?? NULL,
					"nama_dokter"			=> $data["nama_dokter"] ?? NULL,
					"kode_tarif"			=> $data["kode_tarif"] ?? NULL,
					"payor_id"				=> $data["payor_id"] ?? NULL,
					"payor_cd"				=> $data["payor_cd"] ?? NULL,
					"cob_cd"					=> $data["cob_cd"] ?? NULL,
					"coder_nik"				=> $data["coder_nik"] ?? NULL // Mandatory
				]
			)
		];

		$json_request = json_encode($ws_query);

		// data yang akan dikirimkan dengan method POST adalah encrypted:
		$payload = $this->inacbg_encrypt($json_request);
		$response = $this->setUpCURL($payload);

		// hasil decrypt adalah format json, ditranslate kedalam array
		$msg = json_decode($response, true);

		return $msg;
	}

	function groupingStage1($nomor_sep)
	{
		$ws_query = [
			"metadata" => [
				"method" => 'grouper',
				"stage" => '1'
			],
			"data" => [
				"nomor_sep" 		=> $nomor_sep
			]
		];

		$json_request = json_encode($ws_query);

		// data yang akan dikirimkan dengan method POST adalah encrypted:
		$payload = $this->inacbg_encrypt($json_request);
		$response = $this->setUpCURL($payload);

		// hasil decrypt adalah format json, ditranslate kedalam array
		$msg = json_decode($response, true);

		return $msg;
	}

	function groupingStage2($nomor_sep, $special_cmg)
	{
		$ws_query = [
			"metadata" => [
				"method" => 'grouper',
				"stage" => '2'
			],
			"data" => [
				"nomor_sep" 		=> $nomor_sep,
				"special_cmg" 		=> $special_cmg
			]
		];

		$json_request = json_encode($ws_query);

		// data yang akan dikirimkan dengan method POST adalah encrypted:
		$payload = $this->inacbg_encrypt($json_request);
		$response = $this->setUpCURL($payload);

		// hasil decrypt adalah format json, ditranslate kedalam array
		$msg = json_decode($response, true);

		return $msg;
	}

	function claimFinal($nomor_sep, $coder_nik)
	{
		$ws_query = [
			"metadata" => [
				"method" => 'claim_final'
			],
			"data" => [
				"nomor_sep" 		=> $nomor_sep,
				"coder_nik" 		=> $coder_nik
			]
		];

		$json_request = json_encode($ws_query);

		// data yang akan dikirimkan dengan method POST adalah encrypted:
		$payload = $this->inacbg_encrypt($json_request);
		$response = $this->setUpCURL($payload);

		// hasil decrypt adalah format json, ditranslate kedalam array
		$msg = json_decode($response, true);

		return $msg;
	}

	function cetakKlaim($nomor_sep)
	{
		$ws_query = [
			"metadata" => [
				"method" => 'claim_print'
			],
			"data" => [
				"nomor_sep" 		=> $nomor_sep
			]
		];

		$json_request = json_encode($ws_query);

		// data yang akan dikirimkan dengan method POST adalah encrypted:
		$payload = $this->inacbg_encrypt($json_request);
		$response = $this->setUpCURL($payload);

		// hasil decrypt adalah format json, ditranslate kedalam array
		$msg = json_decode($response, true);

		return $msg;
	}

	function reeditClaim($nomor_sep)
	{
		$ws_query = [
			"metadata" => [
				"method" => 'reedit_claim'
			],
			"data" => [
				"nomor_sep" 		=> $nomor_sep
			]
		];

		$json_request = json_encode($ws_query);

		// data yang akan dikirimkan dengan method POST adalah encrypted:
		$payload = $this->inacbg_encrypt($json_request);
		$response = $this->setUpCURL($payload);

		// hasil decrypt adalah format json, ditranslate kedalam array
		$msg = json_decode($response, true);

		return $msg;
	}

	function sendClaimIndividual($nomor_sep)
	{
		$ws_query = [
			"metadata" => [
				"method" => 'send_claim_individual'
			],
			"data" => [
				"nomor_sep" 		=> $nomor_sep
			]
		];

		$json_request = json_encode($ws_query);

		// data yang akan dikirimkan dengan method POST adalah encrypted:
		$payload = $this->inacbg_encrypt($json_request);
		$response = $this->setUpCURL($payload);

		// hasil decrypt adalah format json, ditranslate kedalam array
		$msg = json_decode($response, true);

		return $msg;
	}

	function sitbValidate($nomor_sep, $no_register)
	{
		$ws_query = [
			"metadata" => [
				"method" => 'sitb_validate'
			],
			"data" => [
				"nomor_sep" 		=> $nomor_sep,
				"nomor_register_sitb" 		=> $no_register
			]
		];

		$json_request = json_encode($ws_query);

		// data yang akan dikirimkan dengan method POST adalah encrypted:
		$payload = $this->inacbg_encrypt($json_request);
		$response = $this->setUpCURL($payload);

		// hasil decrypt adalah format json, ditranslate kedalam array
		$msg = json_decode($response, true);

		return $msg;
	}

	function sitbInvalidate($nomor_sep, $no_register)
	{
		$ws_query = [
			"metadata" => [
				"method" => 'sitb_invalidate'
			],
			"data" => [
				"nomor_sep" 		=> $nomor_sep,
				"nomor_register_sitb" 		=> $no_register
			]
		];

		$json_request = json_encode($ws_query);

		// data yang akan dikirimkan dengan method POST adalah encrypted:
		$payload = $this->inacbg_encrypt($json_request);
		$response = $this->setUpCURL($payload);

		// hasil decrypt adalah format json, ditranslate kedalam array
		$msg = json_decode($response, true);

		return $msg;
	}

	function sendClaim($data)
	{
		$ws_query = [
			"metadata" => [
				"method" => 'send_claim'
			],
			"data" => [
				"start_dt" 		=> $data['start_dt'],
				"stop_dt" 		=> $data['stop_dt'],
				"jenis_rawat" => $data['jenis_rawat'],
				"date_type" 	=> $data['date_type']
			]
		];

		$json_request = json_encode($ws_query);

		// data yang akan dikirimkan dengan method POST adalah encrypted:
		$payload = $this->inacbg_encrypt($json_request);
		$response = $this->setUpCURL($payload);

		// hasil decrypt adalah format json, ditranslate kedalam array
		$msg = json_decode($response, true);

		return $msg;
	}



	function getClaimStatus($data)
	{
		$ws_query = [
			"metadata" => [
				"method" => 'get_claim_status'
			],
			"data" => [
				"nomor_sep" 		=> $data['nomor_sep']
			]
		];

		$json_request = json_encode($ws_query);

		// data yang akan dikirimkan dengan method POST adalah encrypted:
		$payload = $this->inacbg_encrypt($json_request);
		$response = $this->setUpCURL($payload);

		// hasil decrypt adalah format json, ditranslate kedalam array
		$msg = json_decode($response, true);

		return $msg;
	}

	function pullClaim($data)
	{
		$ws_query = [
			"metadata" => [
				"method" => 'pull_claim'
			],
			"data" => [
				"start_dt" 		=> $data['start_dt'] ?? NULL,
				"stop_dt" 		=> $data['stop_dt'],
				"jenis_rawat" => $data['jenis_rawat']
			]
		];

		$json_request = json_encode($ws_query);

		// data yang akan dikirimkan dengan method POST adalah encrypted:
		$payload = $this->inacbg_encrypt($json_request);
		$response = $this->setUpCURL($payload);

		// hasil decrypt adalah format json, ditranslate kedalam array
		$msg = json_decode($response, true);

		return $msg;
	}
}
