<?php
defined('BASEPATH') or exit('No direct script access allowed');
use \LZCompressor\LZString;

class Jadwal_dokter_hfis_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('App_model', 'm_default');
        $this->bpjs_config = $this->default->getConfigAntrianBPJS();
    }

    function getHari()
    {
        return array(
            '1'      => 'Senin',
            '2'      => 'Selasa',
            '3'      => 'Rabu',
            '4'      => 'Kamis',
            '5'      => 'Jumat',
            '6'      => 'Sabtu',
            '7'      => 'Minggu',
        );
    }
    
    function getSignatureBPJS($config)
    {
        $cid = $config->cons_id;
        $skey = $config->secret_key;

        // get timestamp
        // date_default_timezone_set("Asia/Jakarta");
        // $timestamp = strtotime(date("Y/m/d H:i:s"));

        date_default_timezone_set("UTC");
        $timestamp = strval(time() - strtotime("1970-01-01 00:00:00"));

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
            'User_Key:' . $bpjs_config->user_key,
            'Content-type: application/json'
        );
    }

    function decryptResponse($string)
    {
        $key = $this->bpjs_config->cons_id.$this->bpjs_config->secret_key.strtotime(date("Y/m/d H:i:s"));
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

    function getConfigBPJSV2()
    {
        return $this->db->where('id', '1')->get('sm_konfigurasi_bpjs_antrean')->row();
    }

    function getKodeBPJS($q, $start, $limit)
    {
        $limit = " limit " . $limit . " offset " . $start;
        $w = " (nama ilike ('%$q%') or kode ilike ('%$q%')) ";
        $sql = "select *, coalesce(kode, '') as kode 
                from sm_spesialisasi 
                where $w and kode_bpjs != '' order by nama";


        $data['data'] = $this->db->query($sql . $limit)->result();
        $data['total'] = $this->db->query($sql)->num_rows();
        return $data;
    }

    function insResponse($params)
    {
        $this->db->insert('sm_respon_jadwal_dokter_hfis', $params);
        $id = $this->db->insert_id();

        return $id;

    }

    function dataDetailPengajuan($id)
    {

        $this->db->select("rj.*")
                    ->from('sm_respon_jadwal_dokter_hfis as rj')
                    ->where('rj.bpjs_dokter', $id, true);
                    
        $data = $this->db->get()->result();

        return $data;
        $this->db->close();
    
    }

    function dataDetailJadwal($id)
    {

        $this->db->select("dj.*")
                    ->from('sm_detail_jadwal_dokter_hfis as dj')
                    ->where('dj.id_ubah', $id, true);
                    
        $data = $this->db->get()->result();

        return $data;
        $this->db->close();
    
    }

}

