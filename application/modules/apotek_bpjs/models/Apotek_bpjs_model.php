<?php
defined('BASEPATH') or exit('No direct script access allowed');

use \LZCompressor\LZString as LZString;

class Apotek_bpjs_model extends CI_Model
{

    private $timestamp;

    function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('App_model', 'm_default');
        $this->bpjs_config = $this->default->getConfigApotekBPJS();
        $this->timestamp = strval(time());
    }

    function getSignatureBPJS($config)
    {
        $cid = $config->cons_id;
        $skey = $config->secret_key;

        // get timestamp
        // date_default_timezone_set("Asia/Jakarta");
        // $timestamp = strtotime(date("Y/m/d H:i:s"));

        date_default_timezone_set("UTC");
        $timestamp = $this->timestamp;

        // set data value
        $data = $cid . "&" . $timestamp;

        // generate signature
        $signature = hash_hmac('sha256', $data, $skey, true);
        $encodedSignature = base64_encode($signature);

        // urlencode...
        // $encodedSignature = urlencode($encodedSignature);
        $data = array(
            'timestamp' => $timestamp,
            'signature' => $encodedSignature
        );

        return (object)$data;
        //return strtotime(date("Y-m-d H:i:s")) * 1000;
    }

    function createHeader($bpjs_config, $contentType = 'application/json; charset=utf-8')
    {
        $sign = $this->getSignatureBPJS($bpjs_config);
        return array(
            'X-cons-id:' . $bpjs_config->cons_id,
            'X-Timestamp:' . $sign->timestamp,
            'X-Signature:' . $sign->signature,
            'user_key:' . $bpjs_config->user_key,
            'Content-type: ' . $contentType,

        );
    }

    function decryptResponse($string)
    {
        $key = $this->bpjs_config->cons_id . $this->bpjs_config->secret_key . $this->timestamp;;
        $encryptMethod = 'AES-256-CBC';
        // hash
        $keyHash = hex2bin(hash('sha256', $key));
        // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
        $iv = substr(hex2bin(hash('sha256', $key)), 0, 16);
        $output = openssl_decrypt(base64_decode($string), $encryptMethod, $keyHash, OPENSSL_RAW_DATA, $iv);
        $output = LZString::decompressFromEncodedURIComponent($output);
        $output = json_decode($output);
        return $output;
    }

    // function updateKepesertaanBPJS($no_kartu, $jenis_peserta)
    // {
    //     $pj = $this->db->select('id_pasien')->where('no_polish', $no_kartu)->get('sm_penjamin_pasien')->row();
    //     if ($pj) :
    //         $count = $this->db->where('id', $pj->id_pasien)->get('sm_peserta_bpjs')->row();
    //         if (count((array)$count) < 1) :
    //             $jenis = 'NON PBI';
    //             if ($jenis_peserta === 'PBI (APBN)') :
    //                 $jenis = 'PBI';
    //             endif;

    //             $data = array(
    //                 'id' => $pj->id_pasien,
    //                 'jenis_peserta' => $jenis,
    //             );

    //             $this->db->insert('sm_peserta_bpjs', $data);
    //         endif;
    //     endif;
    // }

    function getReferensiObat($KodeJenisObat, $TglResep, $FilterPencarian = null)
    {
        $url = $this->bpjs_config->server . "/referensi/obat/" . $KodeJenisObat . "/" . $TglResep;
        if ($FilterPencarian !== null) :
            $url .= "/" . $FilterPencarian;
        endif;

        $header = $this->createHeader($this->bpjs_config);
        $output = getCurl($url, $header);
        $decode = json_decode($output);
        $decode->response = $this->decryptResponse($decode->response);
        
        return $decode;
    }

    function getReferensiPPK($jenisFaskes, $namaFaskes)
    {
        $url = $this->bpjs_config->server . "/referensi/ppk/" . $jenisFaskes . "/" . $namaFaskes;

        $header = $this->createHeader($this->bpjs_config);
        $output = getCurl($url, $header);
        $decode = json_decode($output);
        $decode->response = $this->decryptResponse($decode->response);
        
        return $decode;
    }

    // Obat
    function simpanObatNonRacikan($data)
    {
        $url = $this->bpjs_config->server . "/obatnonracikan/v3/insert";

        $header = $this->createHeader($this->bpjs_config, 'Application/x-www-form-urlencoded');
        $output = postCurl($url, json_encode($data), $header);
        $decode = json_decode($output);
        $decode->response = $this->decryptResponse($decode->response);
        
        return $decode;
    }

    function simpanObatRacikan($data)
    {
        $url = $this->bpjs_config->server . "/obatracikan/v3/insert";

        $header = $this->createHeader($this->bpjs_config, 'Application/x-www-form-urlencoded');
        $output = postCurl($url, json_encode($data), $header);
        $decode = json_decode($output);
        $decode->response = $this->decryptResponse($decode->response);

        return $decode;
    }

    // Pelayanan Obat
    function hapusPelayananObat($data)
    {
        $url = $this->bpjs_config->server . "/pelayanan/obat/hapus";

        $header = $this->createHeader($this->bpjs_config, 'Application/x-www-form-urlencoded');
        $output = deleteCurl($url, json_encode($data), $header);
        $decode = json_decode($output);
        $decode->response = $this->decryptResponse($decode->response);
        
        return $decode;
    }

    function daftarPelayananObat($sep)
    {
        $url = $this->bpjs_config->server . "/pelayanan/obat/daftar/" . $sep;

        $header = $this->createHeader($this->bpjs_config);
        $output = getCurl($url, $header);
        $decode = json_decode($output);
        $decode->response = $this->decryptResponse($decode->response);
        
        return $decode;
    }

    function riwayatrPelayananObat($tglAwal, $tglAkhir, $noKartu)
    {
        $url = $this->bpjs_config->server . "/riwayatobat/" . $tglAwal . "/" . $tglAkhir . "/" . $noKartu;

        $header = $this->createHeader($this->bpjs_config);
        $output = getCurl($url, $header);
        $decode = json_decode($output);
        $decode->response = $this->decryptResponse($decode->response);
        
        return $decode;
    }

    // Resep
    function simpanResep($data)
    {
        $url = $this->bpjs_config->server . "/sjpresep/v3/insert";

        $header = $this->createHeader($this->bpjs_config, 'Application/x-www-form-urlencoded');
        $output = postCurl($url, json_encode($data), $header);
        $decode = json_decode($output);
        $decode->response = $this->decryptResponse($decode->response);
        
        return $decode;
    }

    function hapusResep($data)
    {
        $url = $this->bpjs_config->server . "/hapusresep";

        $header = $this->createHeader($this->bpjs_config, 'Application/x-www-form-urlencoded');
        $output = deleteCurl($url, json_encode($data), $header);
        $decode = json_decode($output);
        $decode->response = $this->decryptResponse($decode->response);
        
        return $decode;
    }

    function daftarResep($data)
    {
        $url = $this->bpjs_config->server . "/daftarresep";

        $header = $this->createHeader($this->bpjs_config, 'Application/x-www-form-urlencoded');
        $output = postCurl($url, json_encode($data), $header);
        $decode = json_decode($output);
        $decode->response = $this->decryptResponse($decode->response);

        return $decode;
    }

    // SEP
    function getKunjunganSEP($sep)
    {
        $url = $this->bpjs_config->server . "/sep/" . $sep;

        $header = $this->createHeader($this->bpjs_config);
        $output = getCurl($url, $header);
        $decode = json_decode($output);
        $decode->response = $this->decryptResponse($decode->response);
        
        return $decode;
    }

    // MONITORING
    function getMonitoring($bulan, $tahun, $jenis_obat, $status)
    {
        $url = $this->bpjs_config->server . "/monitoring/klaim/" . $bulan . "/" . $tahun . "/" . $jenis_obat . "/" . $status;

        $header = $this->createHeader($this->bpjs_config);
        $output = getCurl($url, $header);
        $decode = json_decode($output);
        $decode->response = $this->decryptResponse($decode->response);
        
        return $decode;
    }
}
