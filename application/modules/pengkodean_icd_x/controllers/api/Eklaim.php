<?php

defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class Eklaim extends REST_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('Pengkodean_icd_x_model', 'm_pengkodean_icd_x');
    $this->datetime = date('Y-m-d H:i:s');
  }

  function get_detail_layanan_eclaim_get()
  {

    $this->load->model('pendaftaran/Pendaftaran_model', 'm_pendaftaran');
    $this->load->model('keuangan/Keuangan_model', 'm_keuangan');
    $this->load->model('rekap_billing/Rekap_billing_model', 'm_rekap_billing');
    $this->load->model('eklaim_bpjs/Eklaim_bpjs_detail_model', 'm_detail_eklaim');

    $data['eclaim'] = [];
    $data['pendaftaran'] = [];
    $data['keuangan'] = [];
    $data['tarif_pendaftaran'] = [];
    $data['tarif_tindakan'] = [];
    $data['tarif_lab'] = [];
    $data['layanan'] = [];
    $data['pendaftaran'] = $this->m_pengkodean_icd_x->getPendaftaranByIdPendaftaran($this->get('id'));
    $data['status_eklaim'] = $this->m_pengkodean_icd_x->getEklaim($this->get('id'));
    // $data['eclaim'] = $this->m_pengkodean_icd_x->getLayananPendaftaranByIdLayananPendaftaranEclaim($this->get('id'), $this->get('jenis_rawat'));
    $data['eclaim'] = $this->m_detail_eklaim->getDetailEkalim($this->get('id'));
    // $data['diagnosa_full'] = $this->m_pengkodean_icd_x->getDiagnosa($this->get('id_layanan_pendaftaran'));
    // $data['kode_diagnosa'] = $this->m_pengkodean_icd_x->getKodeDiagnosa($this->get('id'));
    $data['diagnosa_utama'] = $this->m_pengkodean_icd_x->getDiagnosaUtama($this->get('id'));
    $data['diagnosa_sekunder'] = $this->m_pengkodean_icd_x->getDiagnosaSekunder($this->get('id'));
    // $data['kode_prosedur_tindakan'] = $this->m_pengkodean_icd_x->getKodeProsedurTindakan($this->get('id'));
    $data['prosedur_tindakan'] = $this->m_pengkodean_icd_x->getProsedurTindakan($this->get('id'));
    $data['tindakan_ok'] = $this->m_pengkodean_icd_x->getProsedureTindakanOK($this->get('id'));
    $data['tindakan_lab'] = $this->m_pengkodean_icd_x->getProsedureTindakanLab($this->get('id'));
    $data['tindakan_rad'] = $this->m_pengkodean_icd_x->getProsedureTindakanRad($this->get('id'));

    if ($data) :
      $this->response($data, REST_Controller::HTTP_OK); // (200)
    endif;
  }

  /// Compare Function
  function inacbg_compare($a, $b)
  {

    /// compare individually to prevent timing attacks
    /// compare length
    if (strlen($a) !== strlen($b)) return false;

    /// compare individual
    $result = 0;
    for ($i = 0; $i < strlen($a); $i++) {
      $result |= ord($a[$i]) ^ ord($b[$i]);
    }
    return $result == 0;
  }

  // Encryption Function
  function inacbg_encrypt($data, $key)
  {
    /// make binary representasion of $key
    $key = hex2bin($key);
    /// check key length, must be 256 bit or 32 bytes
    if (mb_strlen($key, "8bit") !== 32) {
      throw new Exception("Needs a 256-bit key!");
    }
    /// create initialization vector
    $iv_size = openssl_cipher_iv_length("aes-256-cbc");
    $iv = openssl_random_pseudo_bytes($iv_size); // dengan catatan dibawah
    /// encrypt
    $encrypted = openssl_encrypt(
      $data,
      "aes-256-cbc",
      $key,
      OPENSSL_RAW_DATA,
      $iv
    );
    /// create signature, against padding oracle attacks
    $signature = mb_substr(
      hash_hmac("sha256", $encrypted, $key, true),
      0,
      10,
      "8bit"
    );
    /// combine all, encode, and format
    $encoded = chunk_split(base64_encode($signature . $iv . $encrypted));
    return $encoded;
  }

  // Decryption Function
  function inacbg_decrypt($str, $strkey)
  {
    /// make binary representation of $key
    $key = hex2bin($strkey);

    /// check key length, must be 256 bit or 32 bytes
    if (mb_strlen($key, "8bit") !== 32) {
      throw new Exception("Needs a 256-bit key!");
    }

    /// calculate iv size
    $iv_size = openssl_cipher_iv_length("aes-256-cbc");

    /// breakdown parts
    $decoded = base64_decode($str);
    $signature = mb_substr($decoded, 0, 10, "8bit");
    $iv = mb_substr($decoded, 10, $iv_size, "8bit");
    $encrypted = mb_substr($decoded, $iv_size + 10, NULL, "8bit");

    /// check signature, against padding oracle attack
    $calc_signature = mb_substr(
      hash_hmac("sha256", $encrypted, $key, true),
      0,
      10,
      "8bit"
    );

    if (!$this->inacbg_compare($signature, $calc_signature)) {
      return "SIGNATURE_NOT_MATCH";
    }

    $decrypted = openssl_decrypt(
      $encrypted,
      "aes-256-cbc",
      $key,
      OPENSSL_RAW_DATA,
      $iv
    );

    return $decrypted;
  }

  private function postCURL($json_request)
  {
    $key = "1de2db3faf59adc8d48d4bac6051121e2600a14ab4466d12cf80a6f5746136ff";

    // data yang akan dikirimkan dengan method POST adalah encrypted:
    $payload = $this->inacbg_encrypt($json_request, $key);
    // tentukan Content-Type pada http header
    $header = array("Content-Type: application/x-www-form-urlencoded");
    // url server aplikasi E-Klaim,
    // silakan disesuaikan instalasi masing-masing
    $url = "http://192.168.77.12/E-Klaim/ws.php";

    // setup curl
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
    $response = $this->inacbg_decrypt($response, $key);

    // hasil decrypt adalah format json, ditranslate kedalam array
    $msg = json_decode($response, true);
    return $msg;
  }

  function claim_print($nomor_sep)
  {

    $ws_query["metadata"]["method"] = 'claim_print';
    $ws_query["data"]["nomor_sep"] = $nomor_sep;

    $json_request = json_encode($ws_query);

    $response = $this->postCURL($json_request);

    return $response;
  }

  function prin_hasil_eklaim_post()
  {
    $sep = $this->post('no_sep');
    $claim_print = $this->claim_print($sep);

    $data = $claim_print;
    // $data['hasil_decode'] = json_decode($claim_print['data']);

    if ($data) :
      $this->response($data, REST_Controller::HTTP_OK); // (200)
    endif;
  }

  function addNewClaim($data)
  {
    $key = "1de2db3faf59adc8d48d4bac6051121e2600a14ab4466d12cf80a6f5746136ff";

    $ws_query["metadata"]["method"] = 'new_claim';

    $ws_query["data"]["nomor_kartu"] = $data['nomor_kartu'];
    $ws_query["data"]["nomor_sep"] = $data['nomor_sep'];
    $ws_query["data"]["nomor_rm"] = $data['nomor_rm'];
    $ws_query["data"]["nama_pasien"] = $data['nama_pasien'];
    $ws_query["data"]["tgl_lahir"] = $data['tgl_lahir'];
    $ws_query["data"]["gender"] = $data['gender'];

    $json_request = json_encode($ws_query);


    // data yang akan dikirimkan dengan method POST adalah encrypted:
    $payload = $this->inacbg_encrypt($json_request, $key);
    // tentukan Content-Type pada http header
    $header = array("Content-Type: application/x-www-form-urlencoded");
    // url server aplikasi E-Klaim,
    // silakan disesuaikan instalasi masing-masing
    $url = "http://192.168.77.12/E-Klaim/ws.php";

    // setup curl
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
    $response = $this->inacbg_decrypt($response, $key);

    // hasil decrypt adalah format json, ditranslate kedalam array
    $msg = json_decode($response, true);
    return $msg;

    var_dump($msg);
    exit;
    true;
  }

  function updateDataPasien($data)
  {
    $key = "1de2db3faf59adc8d48d4bac6051121e2600a14ab4466d12cf80a6f5746136ff";

    $ws_query["metadata"]["method"] = 'update_patient';
    $ws_query["data"]["nomor_kartu"] = $data['nomor_kartu'];
    $ws_query["data"]["nomor_sep"] = $data['nomor_sep'];
    $ws_query["data"]["nomor_rm"] = $data['nomor_rm'];
    $ws_query["data"]["nama_pasien"] = $data['nama_pasien'];
    $ws_query["data"]["tgl_lahir"] = $data['tgl_lahir'];
    $ws_query["data"]["gender"] = $data['gender'];
    $json_request = json_encode($ws_query);

    // data yang akan dikirimkan dengan method POST adalah encrypted:
    $payload = $this->inacbg_encrypt($json_request, $key);
    // tentukan Content-Type pada http header
    $header = array("Content-Type: application/x-www-form-urlencoded");
    // url server aplikasi E-Klaim,
    // silakan disesuaikan instalasi masing-masing
    $url = "http://192.168.77.12/E-Klaim/ws.php";

    // setup curl
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
    $response = $this->inacbg_decrypt($response, $key);

    // hasil decrypt adalah format json, ditranslate kedalam array
    $msg = json_decode($response, true);
    return $msg;
  }

  function setDataClaim($data)
  {

    $key = "1de2db3faf59adc8d48d4bac6051121e2600a14ab4466d12cf80a6f5746136ff";

    $ws_query["metadata"]["method"] = 'set_claim_data';
    $ws_query["metadata"]["nomor_sep"] = $data['nomor_sep'];

    $ws_query["data"]["nomor_sep"] = $data['nomor_sep'];
    $ws_query["data"]["nomor_kartu"] = $data['nomor_kartu'];
    $ws_query["data"]["tgl_masuk"] = $data['tgl_masuk'];
    $ws_query["data"]["tgl_pulang"] = $data['tgl_pulang'];
    $ws_query["data"]["jenis_rawat"] = $data['jenis_rawat'];
    $ws_query["data"]["kelas_rawat"] = $data['kelas_rawat'];
    $ws_query["data"]["adl_sub_acute"] = $data['adl_sub_acute'];
    $ws_query["data"]["adl_chronic"] = $data['adl_chronic'];
    $ws_query["data"]["icu_indikator"] = $data['icu_indikator'];
    $ws_query["data"]["icu_los"] = $data['icu_los'];
    $ws_query["data"]["ventilator_hour"] = $data['ventilator_hour'];
    $ws_query["data"]["upgrade_class_ind"] = $data['upgrade_class_ind'];
    $ws_query["data"]["upgrade_class_class"] = $data['upgrade_class_class'];
    $ws_query["data"]["upgrade_class_los"] = $data['upgrade_class_los'];
    $ws_query["data"]["add_payment_pct"] = $data['add_payment_pct'];
    $ws_query["data"]["birth_weight"] = $data['birth_weight'];
    $ws_query["data"]["discharge_status"] = $data['discharge_status'];
    $ws_query["data"]["diagnosa"] = $data['diagnosa'];
    $ws_query["data"]["procedure"] = $data['procedure'];
    $ws_query["data"]["diagnosa_inagrouper"] = $data['diagnosa'];
    $ws_query["data"]["procedure_inagrouper"] = $data['procedure'];
    $ws_query["data"]["tarif_rs"]["prosedur_non_bedah"] = $data['prosedur_non_bedah'];
    $ws_query["data"]["tarif_rs"]["prosedur_bedah"] = $data['prosedur_bedah'];
    $ws_query["data"]["tarif_rs"]["konsultasi"] = $data['konsultasi'];
    $ws_query["data"]["tarif_rs"]["tenaga_ahli"] = $data['tenaga_ahli'];
    $ws_query["data"]["tarif_rs"]["keperawatan"] = $data['keperawatan'];
    $ws_query["data"]["tarif_rs"]["penunjang"] = $data['penunjang'];
    $ws_query["data"]["tarif_rs"]["radiologi"] = $data['radiologi'];
    $ws_query["data"]["tarif_rs"]["laboratorium"] = $data['laboratorium'];
    $ws_query["data"]["tarif_rs"]["pelayanan_darah"] = $data['pelayanan_darah'];
    $ws_query["data"]["tarif_rs"]["rehabilitasi"] = $data['rehabilitasi'];
    $ws_query["data"]["tarif_rs"]["kamar"] = $data['kamar'];
    $ws_query["data"]["tarif_rs"]["rawat_intensif"] = $data['rawat_intensif'];
    $ws_query["data"]["tarif_rs"]["obat"] = $data['obat'];
    $ws_query["data"]["tarif_rs"]["obat_kronis"] = $data['obat_kronis'];
    $ws_query["data"]["tarif_rs"]["obat_kemoterapi"] = $data['obat_kemoterapi'];
    $ws_query["data"]["tarif_rs"]["alkes"] = $data['alkes'];
    $ws_query["data"]["tarif_rs"]["bmhp"] = $data['bmhp'];
    $ws_query["data"]["tarif_rs"]["sewa_alat"] = $data['sewa_alat'];
    $ws_query["data"]["pemulasaraan_jenazah"] = '0';
    $ws_query["data"]["kantong_jenazah"] = '0';
    $ws_query["data"]["peti_jenazah"] = '0';
    $ws_query["data"]["plastik_erat"] = '0';
    $ws_query["data"]["desinfektan_jenazah"] = '0';
    $ws_query["data"]["mobil_jenazah"] = '0';
    $ws_query["data"]["desinfektan_mobil_jenazah"] = '0';
    $ws_query["data"]["covid19_status_cd"] = '';
    $ws_query["data"]["nomor_kartu_t"] = '';
    $ws_query["data"]["episodes"] = '';
    $ws_query["data"]["covid19_cc_ind"] = '0';
    $ws_query["data"]["covid19_rs_darurat_ind"] = '0';
    $ws_query["data"]["covid19_co_insidense_ind"] = '0';
    $ws_query["data"]["covid19_penunjang_pengurang"]["lab_asam_laktat"] = '1';
    $ws_query["data"]["covid19_penunjang_pengurang"]["lab_procalcitonin"] = '1';
    $ws_query["data"]["covid19_penunjang_pengurang"]["lab_crp"] = '1';
    $ws_query["data"]["covid19_penunjang_pengurang"]["lab_kultur"] = '1';
    $ws_query["data"]["covid19_penunjang_pengurang"]["lab_d_dimer"] = '1';
    $ws_query["data"]["covid19_penunjang_pengurang"]["lab_pt"] = '1';
    $ws_query["data"]["covid19_penunjang_pengurang"]["lab_aptt"] = '1';
    $ws_query["data"]["covid19_penunjang_pengurang"]["lab_waktu_pendarahan"] = '1';
    $ws_query["data"]["covid19_penunjang_pengurang"]["lab_anti_hiv"] = '1';
    $ws_query["data"]["covid19_penunjang_pengurang"]["lab_analisa_gas"] = '1';
    $ws_query["data"]["covid19_penunjang_pengurang"]["lab_albumin"] = '1';
    $ws_query["data"]["covid19_penunjang_pengurang"]["rad_thorax_ap_pa"] = '1';
    $ws_query["data"]["terapi_konvalesen"] = '0';
    $ws_query["data"]["akses_naat"] = '';
    $ws_query["data"]["isoman_ind"] = '0';
    $ws_query["data"]["bayi_lahir_status_cd"] = '';
    $ws_query["data"]["tarif_poli_eks"] = '0';
    $ws_query["data"]["nama_dokter"] = $data['nama_dokter'];
    $ws_query["data"]["kode_tarif"] = $data['kode_tarif'];
    $ws_query["data"]["payor_id"] = '3'; //perlu revisi
    $ws_query["data"]["payor_cd"] = $data['payor_cd'];
    $ws_query["data"]["cob_cd"] = '';
    $ws_query["data"]["coder_nik"] = $data['coder_nik']; //perlu revisi

    $json_request = json_encode($ws_query);

    // data yang akan dikirimkan dengan method POST adalah encrypted:
    $payload = $this->inacbg_encrypt($json_request, $key);
    // tentukan Content-Type pada http header
    $header = array("Content-Type: application/x-www-form-urlencoded");
    // url server aplikasi E-Klaim,
    // silakan disesuaikan instalasi masing-masing
    $url = "http://192.168.77.12/E-Klaim/ws.php";

    // setup curl
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
    $response = $this->inacbg_decrypt($response, $key);

    // hasil decrypt adalah format json, ditranslate kedalam array
    $msg = json_decode($response, true);
    return $msg;

    var_dump($msg);
    exit;
    true;
  }

  private function _validasi()
  {
    $this->load->library('form_validation');
    $this->config->set_item('language', 'indonesia');

    $this->form_validation->set_rules('nomor_sep', 'Nomor SEP', 'required');

    if ($this->form_validation->run()) return TRUE;

    $data                = $error                = array();
    $data['error_class'] = $data['error_string'] = array();
    $data['status']      = TRUE;

    if (form_error('nomor_sep')) $error[] = 'nomor_sep';

    if ($error) :
      foreach ($error as $row) :
        // $data['error_class'][$row] = 'is-invalid';
        // $data['error_class_feedback'][$row] = 'invalid-feedback';
        $data['error_string'][$row] = form_error($row);
      endforeach;

      $data['status'] = FALSE;
      $data['token'] = $this->security->get_csrf_hash();
      echo json_encode($data);
      exit();
    endif;
  }

  function simpan_data_eklaim_post()
  {
    $checkDataEklaim = '';
    $checkDataEklaim =  $this->m_pengkodean_icd_x->getEklaim(safe_post('id_pendaftaran'));

    if (safe_post('discharge_status') == 'Atas Izin Dokter') {
      $discharge_status = 1;
    } else if (safe_post('discharge_status') == 'RS Lain') {
      $discharge_status = 2;
    } else if (safe_post('discharge_status') == 'Pulang APS') {
      $discharge_status = 3;
    } else if (safe_post('discharge_status') == 'Pemulasaran Jenazah') {
      $discharge_status = 4;
    } else {
      $discharge_status = 5;
    }

    if (safe_post('gender') == 'Perempuan') {
      $gender = 2;
    } else {
      $gender = 1;
    }

    if (safe_post('jenis_rawat') == 'Rawat Inap') {
      $jenis_rawat = 1;
    } else if (safe_post('jenis_rawat') == 'Rawat Jalan') {
      $jenis_rawat = 2;
    } else {
      $jenis_rawat = 3;
    }

    if (safe_post('hak_kelas') == 'Kelas 1') {
      $hak_kelas = 1;
    } else if (safe_post('hak_kelas') == 'Kelas 2') {
      $hak_kelas = 2;
    } else if (safe_post('hak_kelas') == 'Kelas 3') {
      $hak_kelas = 3;
    } else {
      $hak_kelas = 3;
    }

    $this->_validasi();
    $data = array(
      'id_pendaftaran'                => safe_post('id_pendaftaran'),
      'id_layanan_pendaftaran'        => safe_post('id_layanan_pendaftaran'),
      'nomor_kartu'                   => safe_post('nomor_kartu'),
      'nomor_sep'                     => safe_post('nomor_sep'),
      'nomor_rm'                      => safe_post('nomor_rm'),
      'nama_pasien'                   => safe_post('nama_pasien'),
      'tgl_lahir'                     => safe_post('tgl_lahir'),
      'gender'                        => $gender,
      'tgl_masuk'                     => safe_post('tgl_masuk'),
      'tgl_pulang'                    => safe_post('tgl_pulang'),
      'jenis_rawat'                   => $jenis_rawat,
      'kelas_rawat'                   => $hak_kelas,
      'adl_sub_acute'                 => safe_post('adl_sub_acute'),
      'adl_chronic'                   => safe_post('adl_chronic'),
      'icu_indikator'                 => '0',
      'icu_los'                       => safe_post('icu_los'),
      'ventilator_hour'               => '0',
      'upgrade_class_ind'             => '0',
      'upgrade_class_class'           => '0',
      'upgrade_class_los'             => '0',
      'add_payment_pct'               => '0',
      'birth_weight'                  => safe_post('birth_weight'),
      'discharge_status'              => $discharge_status,
      'diagnosa'                      => safe_post('diagnosa'),
      'procedure'                     => safe_post('procedure'),
      'prosedur_non_bedah'            => str_replace('.', '', safe_post('prosedur_non_bedah')),
      'prosedur_bedah'                => str_replace('.', '', safe_post('prosedur_bedah')),
      'konsultasi'                    => str_replace('.', '', safe_post('konsultasi')),
      'tenaga_ahli'                   => str_replace('.', '', safe_post('tenaga_ahli')),
      'keperawatan'                   => str_replace('.', '', safe_post('keperawatan')),
      'penunjang'                     => str_replace('.', '', safe_post('penunjang')),
      'radiologi'                     => str_replace('.', '', safe_post('radiologi')),
      'laboratorium'                  => str_replace('.', '', safe_post('laboratorium')),
      'pelayanan_darah'               => str_replace('.', '', safe_post('pelayanan_darah')),
      'rehabilitasi'                  => str_replace('.', '', safe_post('rehabilitasi')),
      'kamar'                         => str_replace('.', '', safe_post('kamar')),
      'rawat_intensif'                => str_replace('.', '', safe_post('rawat_intensif')),
      'obat'                          => str_replace('.', '', safe_post('obat')),
      'obat_kronis'                   => str_replace('.', '', safe_post('obat_kronis')),
      'obat_kemoterapi'               => str_replace('.', '', safe_post('obat_kemoterapi')),
      'alkes'                         => str_replace('.', '', safe_post('alkes')),
      'bmhp'                          => str_replace('.', '', safe_post('bmhp')),
      'sewa_alat'                     => str_replace('.', '', safe_post('sewa_alat')),
      'nama_dokter'                   => safe_post('nama_dokter'),
      'kode_tarif'                    => 'CP',
      'payor_id'                      => '0',
      'payor_cd'                      => '0',
      'coder_nik'                     => $this->session->userdata('nik'),
      'created_at'                    => $this->datetime,

    );

    $add_new_claim = $this->addNewClaim($data);
    $insert_eklaim = $this->setDataClaim($data);

    // if (safe_post('nomor_sep') === null) {
    //   $this->db->trans_begin();
    //   $update = array(
    //     'no_sep'     => safe_post('nomor_sep'),
    //   );


    //   $this->db->where("id", safe_post('id_layanan_pendaftaran'))->update("sm_layanan_pendaftaran", $update);
    //   $id = $this->db->select("id_pendaftaran")->where("id", safe_post('id_layanan_pendaftaran'))->get("sm_layanan_pendaftaran")->row()->id_pendaftaran;
    //   $this->db->where("id", $id)->update("sm_pendaftaran", array("no_sep" => (safe_post('nomor_sep') !== "" ? safe_post('nomor_sep') : NULL)));
    // }

    if ($checkDataEklaim == null) :
      $this->m_pengkodean_icd_x->simpanDataeklaim($data);
      $message = [
        'status' => TRUE,
        'token'  => $this->security->get_csrf_hash()
      ];
      $this->set_response($message, REST_Controller::HTTP_CREATED);
    else :
      $id = $this->m_pengkodean_icd_x->updateDataeklaim($data, safe_post('id_pendaftaran'));
      $message = [
        'id_pendaftaran'    => convert_hash($id),
        'status'            => true,
        'token'             => $this->security->get_csrf_hash()
      ];
      $this->set_response($message, REST_Controller::HTTP_CREATED);
    endif;

    if ($add_new_claim === true && $insert_eklaim === true) :
      $this->db->trans_rollback();
      $status = false;
      $message = 'Gagal simpan Data Ekalim..';

    else :
      $this->db->trans_commit();
      $status = true;
      $message = 'Berhasil Data Ekalim..';

    endif;

    // var_dump($this->addNewClaim($data));
    // exit(1);

    $this->response(array('status' => $status, 'message' => $message), REST_Controller::HTTP_OK);
  }
}
