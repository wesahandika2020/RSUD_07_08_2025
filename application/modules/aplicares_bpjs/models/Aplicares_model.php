<?php
defined('BASEPATH') or exit('No direct script access allowed');

use \LZCompressor\LZString as LZString;

class Aplicares_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('App_model', 'm_default');
        $this->bpjs_config = $this->default->getConfigAplicares();
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

    function createHeader($bpjs_config)
    {
        $sign = $this->getSignatureBPJS($bpjs_config);
        return array(
            'X-Cons-ID:' . $bpjs_config->cons_id,
            'X-Timestamp:' . $sign->timestamp,
            'X-Signature:' . $sign->signature,
            'Content-type: application/json'
        );
    }

    function decryptResponse($string)
    {
        $key = $this->bpjs_config->cons_id . strtotime(date("Y/m/d H:i:s"));
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

    function DataSummaryBed()
    {
        $this->db->select("kbed.id, bg.id as koderuang, bg.nama as namaruang, kls.nama kelas, kkb.nama as namakelas, kkb.kode as kodekelas,
            SUM(CASE WHEN bed.is_active = '1' THEN 1 ELSE 0 END) AS kapasitas,
            SUM(CASE WHEN bed.keterangan = 'Tersedia' AND bed.is_active = '1' THEN 1 ELSE 0 END) AS tersedia,
            SUM(CASE WHEN bed.penghuni = 'L' AND bed.keterangan = 'Tersedia' AND bed.is_active = '1' THEN 1 ELSE 0 END) AS tersediapria,
            SUM(CASE WHEN bed.penghuni = 'P' AND bed.keterangan = 'Tersedia' AND bed.is_active = '1' THEN 1 ELSE 0 END) AS tersediawanita,
            SUM(CASE WHEN bed.penghuni IS NULL AND bed.keterangan = 'Tersedia' AND bed.is_active = '1' THEN 1 ELSE 0 END) AS tersediapriawanita,
            CASE WHEN kbed.id IS NULL THEN 'create' ELSE 'update' END AS status");
        $this->db->from('sm_ruang ru');
        $this->db->join('sm_bangsal bg', 'ru.id_bangsal = bg.id');
        $this->db->join('sm_kelas kls', 'ru.id_kelas = kls.id');
        $this->db->join('sm_bed bed', 'ru.id = bed.id_ruang');
        $this->db->join('sm_kode_kelas_bed kkb', 'ru.id_kode_kelas = kkb.id');
        $this->db->join('sm_ketersediaan_bed kbed', 'bg.id = kbed.koderuang AND kkb.kode = kbed.kodekelas', 'left');
        $this->db->group_by('bg.id, bg.nama, kls.nama, kkb.nama, kkb.kode, kbed.id');
        $this->db->order_by('bg.nama, kls.nama');

        return $this->db->get()->result();
    }

    function DataSummaryBedById($kodekelas, $koderuang)
    {
        $this->db->select("kbed.id, bg.id as koderuang, bg.nama as namaruang, kls.nama kelas, kkb.nama as namakelas, kkb.kode as kodekelas,
            SUM(CASE WHEN bed.is_active = '1' THEN 1 ELSE 0 END) AS kapasitas,
            SUM(CASE WHEN bed.keterangan = 'Tersedia' AND bed.is_active = '1' THEN 1 ELSE 0 END) AS tersedia,
            SUM(CASE WHEN bed.penghuni = 'L' AND bed.keterangan = 'Tersedia' AND bed.is_active = '1' THEN 1 ELSE 0 END) AS tersediapria,
            SUM(CASE WHEN bed.penghuni = 'P' AND bed.keterangan = 'Tersedia' AND bed.is_active = '1' THEN 1 ELSE 0 END) AS tersediawanita,
            SUM(CASE WHEN bed.penghuni IS NULL AND bed.keterangan = 'Tersedia' AND bed.is_active = '1' THEN 1 ELSE 0 END) AS tersediapriawanita,
            CASE WHEN kbed.id IS NULL THEN 'create' ELSE 'update' END AS status");
        $this->db->from('sm_ruang ru');
        $this->db->join('sm_bangsal bg', 'ru.id_bangsal = bg.id');
        $this->db->join('sm_kelas kls', 'ru.id_kelas = kls.id');
        $this->db->join('sm_bed bed', 'ru.id = bed.id_ruang');
        $this->db->join('sm_kode_kelas_bed kkb', 'ru.id_kode_kelas = kkb.id');
        $this->db->join('sm_ketersediaan_bed kbed', 'bg.id = kbed.koderuang AND kkb.kode = kbed.kodekelas', 'left');
        $this->db->where('bg.id', $koderuang);
        if ($kodekelas !== null) {
            $this->db->where('kkb.kode', $kodekelas);
        }
        $this->db->group_by('bg.id, bg.nama, kls.nama, kkb.nama, kkb.kode, kbed.id');

        return $this->db->get()->result();
    }
}
