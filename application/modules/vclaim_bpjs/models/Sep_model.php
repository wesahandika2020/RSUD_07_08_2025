<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Sep_model extends CI_Model {

    
    function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
    }
    
    function getSignatureBPJS($config)
    {
        $cid = $config->cons_id;
        $skey = $config->secret_key;

        // get timestamp
        date_default_timezone_set("Asia/Jakarta");
        $timestamp = strtotime(date("Y/m/d H:i:s"));

        // set data value
        $data = $cid."&".$timestamp;

        // generate signature
        $signature = hash_hmac('sha256', $data, $skey, true);
        $encodedSignature = base64_encode($signature);

        // urlencode...
        // $encodedSignature = urlencode($encodedSignature);
        $data = array(
            'timestamp' => $timestamp,
            'signature' => $encodedSignature
        );

        return (Object)$data;
         //return strtotime(date("Y-m-d H:i:s")) * 1000;
    }

    function createHeader($bpjs_config)
    {
        $sign = $this->getSignatureBPJS($bpjs_config);
        return array (
            'X-Cons-ID:' . $bpjs_config->cons_id,
            'X-Timestamp:' . $sign->timestamp,
            'X-Signature:' . $sign->signature,
            'Content-type: application/json'
        );
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

/* End of file Sep_model.php */
