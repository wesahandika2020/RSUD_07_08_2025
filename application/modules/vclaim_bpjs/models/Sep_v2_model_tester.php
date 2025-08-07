<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
use \LZCompressor\LZString as LZString;

class Sep_v2_model_tester extends CI_Model {

    function __construct()
    {
        parent::__construct();
		$this->load->model('App_model', 'm_default');
		$this->bpjs_config = $this->default->getConfigBPJSV2();
    }
    
    function getSignatureBPJS($config)
    {
        $cid = $config->cons_id;
        $skey = $config->secret_key;

        // get timestamp
        date_default_timezone_set("UTC");
        // $timestamp = strtotime(date("Y/m/d H:i:s"));
        $timestamp = strval(time() - strtotime("1970-01-01 00:00:00"));

        // set data value
        $data = $cid."&".$timestamp;

        // generate signature
        $signature = hash_hmac('sha256', $data, $skey, true);
        $encodedSignature = base64_encode($signature);

        $data = array(
            'timestamp' => $timestamp,
            'signature' => $encodedSignature
        );

        return (Object)$data;
    }

    function createHeader($bpjs_config)
    {
        $sign = $this->getSignatureBPJS($bpjs_config);
        return array (
            'X-Cons-ID:' . $bpjs_config->cons_id,
            'X-Timestamp:' . $sign->timestamp,
            'X-Signature:' . $sign->signature,
			'User_Key:' . $bpjs_config->user_key,
            'Content-type: application/json'
        );
    }

	function decryptResponse($string)
	{
        $sign = $this->getSignatureBPJS($this->bpjs_config);
		$key = $this->bpjs_config->cons_id.$this->bpjs_config->secret_key.$sign->timestamp;
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
	
    function updateKepesertaanBPJS($no_kartu, $jenis_peserta)
    {
        $pj = $this->db->select('id_pasien')->where('no_polish', $no_kartu)->get('sm_penjamin_pasien')->row();
        if ($pj) :
            $count = $this->db->where('id', $pj->id_pasien)->get('sm_peserta_bpjs')->row();
            if (count((array)$count) < 1) :
                $jenis = 'NON PBI';
                if ($jenis_peserta === 'PBI (APBN)') :
                    $jenis = 'PBI';
                endif;

                $data = array(
                    'id' => $pj->id_pasien,
                    'jenis_peserta' => $jenis,
                );

                $this->db->insert('sm_peserta_bpjs', $data);
            endif;
        endif;
    }
}