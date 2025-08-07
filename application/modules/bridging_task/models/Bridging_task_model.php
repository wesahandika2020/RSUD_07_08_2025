<?php
defined('BASEPATH') or exit('No direct script access allowed');
use \LZCompressor\LZString;

class Bridging_task_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('App_model', 'm_default');
        $this->date = date('Y-m-d');
        $this->bpjs_config = $this->default->getConfigAntrianBPJS();
    }


    private function sqlTaskBridgingBPJS($search)
    {
        $this->db->select("ut.*", false);

        $this->db->from('sm_update_task_bpjs as ut')
            ->where('ut.respon_bpjs', '200');
            
        
        if (($search['tanggal_awal'] !== '') & ($search['tanggal_akhir'] !== '')) :
            $this->db->where("ut.konversi_waktu BETWEEN '" . date2mysql($search['tanggal_awal']) . " 00:00:00' AND '" . date2mysql($search['tanggal_akhir']) . " 23:59:59'");
        endif;

        if ($search['no_kode_booking'] !== '') :
            $this->db->where('ut.kode_booking', $search['no_kode_booking'], true);
        endif;

        if ($search['task'] !== '') :
            $this->db->where('ut.nomor_task', $search['task'], true);
        endif;

        return $this->db->order_by('ut.id', 'desc');
        
    }

    private function _listTaskBridgingBPJS($limit = 0, $start = 0, $search)
    {
        $this->sqlTaskBridgingBPJS($search);
        if ($limit !== 0) :
            $this->db->limit($limit, $start);
        endif;

        return $this->db->get()->result();
    }

    function taskBridgingAntrian($limit = 0, $start = 0, $search)
    {
        $result['data'] = $this->_listTaskBridgingBPJS($limit, $start, $search);
        $result['jumlah'] = $this->sqlTaskBridgingBPJS($search)->get()->num_rows();
        return $result;

        $this->db->close();
    }

    private function sqlDataKirimTask($search)
    {
        $this->db->select("ut.*, ab.keterangan_batal", false);

        $this->db->from('sm_update_task_bpjs as ut');
        $this->db->join('sm_antrian_bpjs as ab', 'ut.kode_booking = ab.kode_booking', 'LEFT');
            
        
        if (($search['tanggal_a_kunjungan'] !== '') & ($search['tanggal_kh_kunjungan'] !== '')) :
            $this->db->where("ut.konversi_waktu BETWEEN '" . date2mysql($search['tanggal_a_kunjungan']) . " 00:00:00' AND '" . date2mysql($search['tanggal_kh_kunjungan']) . " 23:59:59'");
        endif;

        if ($search['kode_booking'] !== '') :
            $this->db->where('ut.kode_booking', $search['kode_booking'], true);
        endif;

        if ($search['task'] !== '') :
            $this->db->where('ut.nomor_task', $search['task']);
        endif;

        $this->db->where("(ut.respon_bpjs !='200' OR ut.respon_bpjs IS NULL)");
        
        return $this->db->order_by('ut.id', 'desc');
        
    }

    private function _listDataKirimTask($limit = 0, $start = 0, $search)
    {
        $this->sqlDataKirimTask($search);
        if ($limit !== 0) :
            $this->db->limit($limit, $start);
        endif;

        return $this->db->get()->result();
    }

    function dataKirimTask($limit = 0, $start = 0, $search)
    {
        $result['data'] = $this->_listDataKirimTask($limit, $start, $search);
        $result['jumlah'] = $this->sqlDataKirimTask($search)->get()->num_rows();
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

    function getResponseBPJS($kode, $task)
    {
        return $this->db->select("ut.*")
            ->from('sm_update_task_bpjs as ut')
            ->where('ut.kode_booking', $kode, true)
            ->where('ut.nomor_task', $task, true)
            ->get()
            ->row();
        $this->db->close();
    }

    function getStatusBridging()
    {
        return array(
            '' => 'Silakan Pilih',
            'Booking' => 'Booking',
            'Check In' => 'Check In',
            'Batal' => 'Batal',
            'Gagal' => 'Gagal'
        );
    }

    function getBridgingTask()
    {
        return array(
            '' => 'Silakan Pilih',
            'Belum' => 'Belum',
            'Sudah' => 'Sudah'
        );
    }

    function dataIntegrasiTask($tanggal, $task, $status)
    {
        $this->db->select("ut.*")
            ->from('sm_update_task_bpjs as ut')
            ->where('ut.nomor_task', $task)
            ->where("ut.konversi_waktu BETWEEN '" . $tanggal . " 00:00:00' AND '" . $tanggal . " 23:59:59'");

            if($status !== ''){

                if($status === 'Belum'){

                    $this->db->where('ut.respon_bpjs', null);

                }

                if($status === 'Sudah'){

                    $this->db->where("(ut.respon_bpjs !='200')");

                }

            } else {

                $this->db->where("(ut.respon_bpjs !='200' OR ut.respon_bpjs IS NULL)");
            
            }
            
            $this->db->limit(200, 0);
            $this->db->order_by('ut.id', 'asc');
            
            return $this->db->get()->result();

        $this->db->close();
    }

    function getDataTask($id)
    {
        return $this->db->select("ut.*, ab.keterangan_batal")
            ->from('sm_update_task_bpjs as ut')
            ->join('sm_antrian_bpjs as ab', 'ab.id = ut.id_antrian', 'left')
            ->where('ut.id', $id, true)
            ->get()
            ->row();
        $this->db->close();
    }

    function cekKuota($tanggal, $id)
    {
        return $this->db->select("sum(jd.kuota)")
                    ->from('sm_jadwal_dokter as jd')
                    ->where('jd.id_poli', $id, true)
                    ->where('jd.tanggal', $tanggal, true)
                    ->group_by('jd.id_poli')
                    ->get()
                    ->result();
        $this->db->close();
    }

    function pakaiKuota($tanggal, $id)
    {
        return $this->db->select("sum(jd.jml_kunjung)")
                    ->from('sm_jadwal_dokter as jd')
                    ->where('jd.id_poli', $id, true)
                    ->where('jd.tanggal', $tanggal, true)
                    ->group_by('jd.id_poli')
                    ->get()
                    ->result();
        $this->db->close();
    }

    function getTask()
    {
        return array(
            '99' => '99',
            '1' => '1',
            '2' => '2',
            '3' => '3',
            '4' => '4',
            '5' => '5',
            '6' => '6',
            '7' => '7'
        );
    }

    function cekBookingAntrian($kode)
    {
        $this->db->select("ab.*");
        $this->db->from('sm_antrian_bpjs as ab');
        $this->db->where('ab.kode_booking', $kode, true);
        $this->db->order_by('ab.id', 'asc');
        return $this->db->get()->row();
    }

}

