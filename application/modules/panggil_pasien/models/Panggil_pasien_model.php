<?php
defined('BASEPATH') or exit('No direct script access allowed');
use \LZCompressor\LZString;

class Panggil_pasien_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('App_model', 'm_default');
        $this->bpjs_config = $this->default->getConfigAntrianBPJS();
    }

    private function sqlDataPanggilPasien($search)
    {   
        $this->db->select("ab.*, sp.nama as poli, pg.nama as nama_dokter", false);

        $this->db->from('sm_antrian_bpjs as ab')
            ->join('sm_spesialisasi as sp', 'sp.id = ab.nama_poli', 'left')
            ->join('sm_translucent as cr', 'cr.id = ab.user_create', 'left')
            ->join('sm_translucent as ur', 'ur.id = ab.user_update', 'left')
            ->join('sm_tenaga_medis as tm', 'tm.id = ab.id_dokter', 'left')
            ->join('sm_pegawai as pg', 'pg.id = tm.id_pegawai', 'left')
            ->where('ab.status', 'Check In')
            ->where('ab.pasien_hadir', null);
            
        
        if (($search['tanggal_awal'] !== '') & ($search['tanggal_akhir'] !== '')) :
            $this->db->where("ab.tanggal_kunjungan BETWEEN '" . date2mysql($search['tanggal_awal']) . " 00:00:00' AND '" . date2mysql($search['tanggal_akhir']) . " 23:59:59'");
        endif;

        if ($search['no_kode_booking'] !== '') :
            $this->db->like('ab.kode_booking', $search['no_kode_booking'], true);
        endif;

        if ($search['no_antrean'] !== '') :
            $this->db->like('ab.nomor_antrean', $search['no_antrean'], true);
        endif;

        if(isset($search['loket'])){
            if ($search['loket'] !== '' && $search['loket'] !== 'undefined') :
                $this->db->where('ab.huruf_antrean', $search['loket'], true);
            endif;
        }

        if ($search['nm_poli'] !== '') :
            $this->db->where('ab.nama_poli', $search['nm_poli'], true);
        endif;

        if ($search['nm_dokter'] !== '') :
            $this->db->where('ab.id_dokter', $search['nm_dokter'], true);
        endif;

        return $this->db->order_by('ab.id', 'asc');
        
    }

    private function _listDataPanggilPasien($limit = 0, $start = 0, $search)
    {
        $this->sqlDataPanggilPasien($search);
        if ($limit !== 0) :
            $this->db->limit($limit, $start);
        endif;

        return $this->db->get()->result();
    }

    function dataPanggilPasien($limit = 0, $start = 0, $search)
    {
        $result['data'] = $this->_listDataPanggilPasien($limit, $start, $search);
        $result['jumlah'] = $this->sqlDataPanggilPasien($search)->get()->num_rows();
        return $result;

        $this->db->close();
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

    function getLoketAntrean()
    {
        return array(
            '1' => '1',
            '2' => '2',
            '3' => '3',
            '4' => '4',
            '5' => '5',
            '6' => '6',
            '7' => '7',
	        '8' => '8',
            '9' => '9',
            '10' => '10'
        );
    }

    function getFilterLoket()
    {
        return array(
            ''  => '- Pilih Loket -',
            'A' => 'A',
            'B' => 'B',
            'C' => 'C',
            'D' => 'D',
            'E' => 'E',
            'F' => 'F',
            'G' => 'G',
            'H' => 'H',
            'I' => 'I',
        );
    }

    function simpanPanggilPasien($params)
    {
        $this->db->insert('sm_panggil_pasien', $params);
        $id = $this->db->insert_id();

        return $id;

    }

    function deleteAntrean($id)
    {
        return $this->db->where("id", $id)->delete("sm_panggilan_antrian");

    }

    function deleteAntreanLantaiDua($id)
    {
        return $this->db->where("id", $id)->delete("sm_antrian_lantai_dua");

    }

    function simpanPanggilAntrean($params)
    {
        $this->db->insert('sm_panggilan_antrian', $params);
        $id = $this->db->insert_id();

        return $id;

    }

    function simpanPanggilLantaiDua($params)
    {
        $this->db->insert('sm_antrian_lantai_dua', $params);
        $id = $this->db->insert_id();

        return $id;

    }

    function cekUser($id)
    {
        $this->db->select("count(p.id) as total")
                    ->from('sm_panggilan_antrian as p')
                    ->where('p.user_create', $id)
                    ->group_by('p.id');
                    
        $data = $this->db->get()->num_rows();

        return $data;
        $this->db->close();

    }

    function panggilAntrian()
    {
        $this->db->select("p.*")
                    ->from('sm_panggilan_antrian as p')
                    ->order_by('p.id', 'asc')
                    ->limit(1);
                    
        $data = $this->db->get()->row();

        return $data;
        $this->db->close();

    }

    function panggilAntrianLantaiDua()
    {
        $this->db->select("p.*")
                    ->from('sm_antrian_lantai_dua as p')
                    ->order_by('p.id', 'asc')
                    ->limit(1);
                    
        $data = $this->db->get()->row();

        return $data;
        $this->db->close();

    }


    function panggilAudio($id)
    {
        $this->db->select("ab.huruf_antrean, ab.urutan, ab.loket_antrean")
                    ->from('sm_antrian_bpjs as ab')
                    ->where('ab.id', $id, true);
                    
        $data = $this->db->get()->row();

        return $data;
        $this->db->close();

    }

    function dataDetailPanggilan($id)
    {

        $this->db->select("ab.*, sp.nama as poli, pg.nama as nama_dokter")
                    ->from('sm_antrian_bpjs as ab')
                    ->join('sm_spesialisasi as sp', 'sp.id = ab.nama_poli', 'left')
                    ->join('sm_tenaga_medis as tm', 'tm.id = ab.id_dokter', 'left')
                    ->join('sm_pegawai as pg', 'pg.id = tm.id_pegawai', 'left')
                    ->where('ab.id', $id, true);
                    
        $data['antrian'] = $this->db->get()->row();

        $this->db->select("pp.*")
                    ->from('sm_panggil_pasien as pp')
                    ->where('pp.id_antrian', $id, true)
                    ->order_by('pp.id', 'asc');

        
        $detail = $this->db->get()->result();

        $data['layanan'] = $detail;
        return $data;
        $this->db->close();
    
    }

    function cekStatusTanggal($id)
    {
        return $this->db->select("ab.*, sp.nama as poli, pg.nama as nama_dokter")
                    ->from('sm_antrian_bpjs as ab')
                    ->join('sm_spesialisasi as sp', 'sp.id = ab.nama_poli', 'left')
                    ->join('sm_tenaga_medis as tm', 'tm.id = ab.id_dokter', 'left')
                    ->join('sm_pegawai as pg', 'pg.id = tm.id_pegawai', 'left')
                    ->where('ab.id', $id)
                    ->get()
                    ->row();
        $this->db->close();
    }

    function cekHitungPanggilan($id)
    {
        return $this->db->select("ab.hitung_panggil")
                    ->from('sm_antrian_bpjs as ab')
                    ->where('ab.id', $id)
                    ->get()
                    ->row();
        $this->db->close();
    }
    
    function dataCekAllx()
    {

        return $this->db->select("ab.id, ab.waktu_panggil, ab.huruf_antrean, ab.urutan, ab.tanggal_kunjungan")
                    ->from('sm_antrian_bpjs as ab')
                    ->where('ab.status_panggil', 'x')
                    ->where('ab.waktu_panggil !=', null)
                    ->order_by('ab.id', 'asc')
                    ->limit(1)
                    ->get()->row();
                    
        $this->db->close();
    
    }

    function dataCekPanggilan($huruf, $urutan, $tanggal)
    {

        return $this->db->select("p.id")
                    ->from('sm_panggilan_antrian as p')
                    ->where('p.huruf_antrean', $huruf)
                    ->where('p.urutan', $urutan)
                    ->where("CAST(p.create_date AS DATE) =", $tanggal)
                    ->order_by('p.id', 'desc')
                    ->limit(1)
                    ->get()->row();
                    
    }

}

