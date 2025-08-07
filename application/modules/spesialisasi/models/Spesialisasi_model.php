<?php
defined('BASEPATH') or exit('No direct script access allowed');

use \LZCompressor\LZString;

class Spesialisasi_model extends CI_Model
{


    function __construct()
    {
        parent::__construct();
        $this->table = 'sm_spesialisasi as sp';
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('App_model', 'm_default');
        $this->bpjs_config = $this->default->getConfigAntrianBPJS();
        $this->timestamp = strval(time());
    }

    private function sqlSpesialisasi($search)
    {
        $this->db->select("sp.*, 
                        COALESCE(smf.nama, '') as smf, 
                        COALESCE(un.nama, '') as unit, 
                        COALESCE(concat_ws(', ', l.nama, tp.jenis, k.nama, un.nama, tp.keterangan), '') as tarif, 
                        COALESCE(r.kode, '') as kode_rekening");
        $this->db->from($this->table);
        $this->db->join('sm_tarif_pelayanan as tp', 'tp.id = sp.id_tarif', 'left');
        $this->db->join('sm_layanan as l', 'l.id = tp.id_layanan', 'left');
        $this->db->join('sm_staff_medis_fungsional as smf', 'smf.id = sp.id_smf', 'left');
        $this->db->join('sm_unit as un', 'un.id = sp.id_unit', 'left');
        $this->db->join('sm_kelas as k', 'k.id = tp.id_kelas', 'left');
        $this->db->join('sm_rekening as r', 'r.kode = sp.kode_rekening', 'left');
        $this->db->where('sp.id IS NOT NULL');

        if ($search['keyword'] !== '') :
            $this->db->like('LOWER(sp.nama)', strtolower($search['keyword']));
        endif;
        return $this->db->order_by('sp.nama', 'asc');
    }

    private function _listSpesialisasi($start, $limit, $search)
    {
        $this->sqlSpesialisasi($search);
        if ($limit !== 0) :
            $this->db->limit($limit, $start);
        endif;
        return $this->db->get()->result();
    }

    function getSignatureBPJS($config)
    {
        $cid = $config->cons_id;
        $skey = $config->secret_key;

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

    function createHeader($bpjs_config)
    {
        $sign = $this->getSignatureBPJS($bpjs_config);
        return array(
            'X-Cons-ID:' . $bpjs_config->cons_id,
            'X-Timestamp:' . $sign->timestamp,
            'X-Signature:' . $sign->signature,
            'User_Key:' . $bpjs_config->user_key,
            'Content-type: application/json'
        );
    }

    function decryptResponse($string)
    {
        $key = $this->bpjs_config->cons_id . $this->bpjs_config->secret_key . $this->timestamp;
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

    function getListDataSpesialisasi($start, $limit, $search)
    {
        $result['data'] = $this->_listSpesialisasi($start, $limit, $search);
        $result['jumlah'] = $this->sqlSpesialisasi($search)->get()->num_rows();
        $this->db->close();
        return $result;
    }

    function simpanDataSpesialisasi($data)
    {
        return $this->db->insert($this->table, $data);
    }

    function updateDataSpesialisasi($data, $id)
    {
        $this->db->where('id', $id, true)->update($this->table, $data);
        return convert_hash($id);
    }

    function getDataSpesialisasiById($id)
    {
        $this->db->select("sp.*, 
                        COALESCE(smf.nama, '') as smf, 
                        COALESCE(un.nama, '') as unit, 
                        COALESCE(concat_ws(', ', l.nama, tp.jenis, k.nama, un.nama, tp.keterangan), '') as tarif, 
                        COALESCE(r.kode, '') as kode_rekening");
        $this->db->from($this->table);
        $this->db->join('sm_tarif_pelayanan as tp', 'tp.id = sp.id_tarif', 'left');
        $this->db->join('sm_layanan as l', 'l.id = tp.id_layanan', 'left');
        $this->db->join('sm_staff_medis_fungsional as smf', 'smf.id = sp.id_smf', 'left');
        $this->db->join('sm_unit as un', 'un.id = sp.id_unit', 'left');
        $this->db->join('sm_kelas as k', 'k.id = tp.id_kelas', 'left');
        $this->db->join('sm_rekening as r', 'r.kode = sp.kode_rekening', 'left');
        $this->db->where('sp.id', $id, true);
        return $this->db->get()->row();
    }

    public function getTarifPelayananById($id)
    {
        return $this->db->select("
			tp.*,
            COALESCE(concat_ws(', ', l.nama, tp.jenis, k.nama, tp.keterangan), '') as tarif, 
		")->from('sm_tarif_pelayanan as tp')
            ->join('sm_layanan as l', 'l.id = tp.id_layanan', 'left')
            ->join('sm_kelas as k', 'k.id = tp.id_kelas', 'left')
            ->where('tp.id', $id, true)
            ->get()->row();
    }

    function getDataSpesialisasi($id)
    {
        $this->db->select("sp.kode_bpjs, sp.status");
        $this->db->from($this->table);
        $this->db->where('sp.id', $id, true);
        return $this->db->get()->row();
    }

    function deleteDataSpesialisasi($id)
    {
        $this->db->where('id', $id, true);
        return $this->db->delete($this->table);
    }
}

/* End of file Spesialisasi_model.php */
