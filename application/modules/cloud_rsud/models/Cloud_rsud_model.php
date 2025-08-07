<?php

use LZCompressor\LZString;

defined('BASEPATH') or exit('No direct script access allowed');

class Cloud_rsud_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
        $this->datetime = date('Y-m-d H:i:s');
        $this->timestamp = strval(time());
    }

    function getSignatureBPJS($config)
    {
        $cid = $config->cons_id;
        $skey = $config->secret_key;

        // get timestamp
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

    function createHeader($bpjs_config)
    {
        // $sign = $this->getSignatureBPJS($bpjs_config);
        return array(
            // 'X-Cons-ID:' . $bpjs_config->cons_id,
            // 'X-Timestamp:' . $sign->timestamp,
            // 'X-Signature:' . $sign->signature,
            // 'User_Key:' . $bpjs_config->user_key,
            'Access-Control-Allow-Origin',
            'Content-type: image/jpeg'
        );
    }

    public function decryptResponse($string, $config)
    {
        $key           = $config->cons_id . $config->secret_key . $this->timestamp;
        $encryptMethod = 'AES-256-CBC';
        // hash
        $keyHash = hex2bin(hash('sha256', $key));
        // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
        $iv     = substr(hex2bin(hash('sha256', $key)), 0, 16);
        $output = openssl_decrypt(base64_decode($string), $encryptMethod, $keyHash, OPENSSL_RAW_DATA, $iv);
        $output = LZString::decompressFromEncodedURIComponent($output);
        $output = json_decode($output);

        return $output;
    }

    public function getDataFileRM($id_pendaftaran)
    {
        $this->db->select('fu.*, pg.nama as nama_petugas');
        $this->db->from('sm_file_upload_rm as fu');
        $this->db->join('sm_pegawai as pg', 'fu.id_user = pg.id');
        // $this->db->where('fu.id_pasien', $id_pasien);
        // Perubahan lagi sesuai permintaan dok Puja/Peri tgl 24 Maret 2025
        $this->db->where('fu.id_pendaftaran', $id_pendaftaran);

        return $this->db->get()->row();
    }

    public function cekDataFileUpload($id_pasien)
    {
        $this->db->select('*');
        $this->db->from('sm_file_upload_rm');
        $this->db->where('id_pasien', $id_pasien);

        return $this->db->get()->row();
    }

    public function cekDataFileDelete($id)
    {
        $this->db->select('*');
        $this->db->from('sm_file_upload_rm');
        $this->db->where('id_cloud', $id);

        return $this->db->get()->row();
    }

    function getFileLainnya($q, $list, $start, $limit)
    {
        $limit = " limit " . $limit . " offset " . $start;
        $in_list = "";
        if (!empty($list)) {
            $kategoriArray = explode(',', $list);
            $kategoriArrayQuoted = array_map(function ($kategori) {
                return "'$kategori'";
            }, $kategoriArray);
            $outputList = implode(',', $kategoriArrayQuoted);

            $in_list = "";
            // $in_list = " and n.kode not in (" . $outputList . ")";
        }

        $select = "select n.* ";
        $count = "select count(n.id) as count ";
        $sql = "from sm_master_upload_file n
                where n.nama ilike ('%$q%') " . $in_list;

        // echo $select . $sql; die;
        $data['data'] = $this->db->query($select . $sql . $limit)->result();
        $data['total'] = $this->db->query($count . $sql)->row()->count;
        return $data;
    }

    public function getDataFileRMLain($id_pendaftaran, $id_pasien, $for_case)
    {
        $this->db->select('fu.*, pd.tanggal_daftar, pd.jenis_rawat, pg.nama as nama_petugas, muf.nama as nama_kategori, muf.kode as kode_kategori');
        $this->db->from('sm_file_upload_lainnya as fu');
        $this->db->join('sm_master_upload_file as muf', 'fu.id_master_upload_file = muf.id');
        $this->db->join('sm_pegawai as pg', 'fu.id_user = pg.id');
        $this->db->join('sm_pendaftaran as pd', 'fu.id_pendaftaran = pd.id');

        // Permintaan Perubahan Dok Erny tgl 18 Juli 2024
        // $this->db->where('fu.id_pasien', $id_pasien);

        // if ($for_case === 'CASEMIX') {
        //     $this->db->where('fu.id_pasien', $id_pasien);
        // } else {
        // Perubahan lagi sesuai permintaan dok Puja/Peri tgl 24 Maret 2025
        $this->db->where('fu.id_pendaftaran', $id_pendaftaran);
        // }

        return $this->db->get()->result();
    }

    public function cekDataFileUploadLain($id)
    {
        $this->db->select('ful.*, muf.nama as nama_kategori, muf.kode as kode_kategori');
        $this->db->from('sm_file_upload_lainnya as ful');
        $this->db->join('sm_master_upload_file as muf', 'ful.id_master_upload_file = muf.id');
        $this->db->where('ful.id', $id);

        return $this->db->get()->row();
    }
}
