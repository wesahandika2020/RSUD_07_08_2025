<?php
defined('BASEPATH') or exit('No direct script access allowed');
use \LZCompressor\LZString;

class Bridging_antrian_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('App_model', 'm_default');
        $this->date = date('Y-m-d');
        $this->bpjs_config = $this->default->getConfigAntrianBPJS();
    }


    private function sqlDataBridgingBPJS($search)
    {
        $this->db->select("ab.*, sp.nama as poli, pg.nama as nama_dokter", false);

        $this->db->from('sm_antrian_bpjs as ab')
            ->join('sm_spesialisasi as sp', 'sp.id = ab.nama_poli', 'left')
            ->join('sm_translucent as cr', 'cr.id = ab.user_create', 'left')
            ->join('sm_translucent as ur', 'ur.id = ab.user_update', 'left')
            ->join('sm_tenaga_medis as tm', 'tm.id = ab.id_dokter', 'left')
            ->join('sm_pegawai as pg', 'pg.id = tm.id_pegawai', 'left')
            ->where('ab.respon_bpjs', '200');
            
        
        if (($search['tanggal_awal'] !== '') & ($search['tanggal_akhir'] !== '')) :
            $this->db->where("ab.tanggal_kunjungan BETWEEN '" . date2mysql($search['tanggal_awal']) . " 00:00:00' AND '" . date2mysql($search['tanggal_akhir']) . " 23:59:59'");
        endif;

        if ($search['no_kode_booking'] !== '') :
            $this->db->where('ab.kode_booking', $search['no_kode_booking'], true);
        endif;

        if ($search['no_antrean'] !== '') :
            $this->db->like('ab.nomor_antrean', $search['no_antrean'], true);
        endif;

        if ($search['nm_poli'] !== '') :
            $this->db->where('ab.nama_poli', $search['nm_poli'], true);
        endif;

        if ($search['nm_dokter'] !== '') :
            $this->db->like('ab.id_dokter', $search['nm_dokter'], true);
        endif;

        if ($search['status_antrean'] !== '') :
            $this->db->where('ab.status', $search['status_antrean']);
        endif;

        return $this->db->order_by('ab.id', 'desc');
        
    }

    private function _listDataBridgingBPJS($limit, $start, $search)
    {
        $this->sqlDataBridgingBPJS($search);
        if ((int)$limit !== 0) :
            $this->db->limit((int)$limit, (int)$start);
        endif;

        return $this->db->get()->result();
    }

    function dataBridgingAntrian($limit, $start, $search)
    {
        $result['data'] = $this->_listDataBridgingBPJS((int)$limit, (int)$start, $search);
        $result['jumlah'] = $this->sqlDataBridgingBPJS($search)->get()->num_rows();
        $this->db->close();

        return $result;
    }

    private function sqlDataKirimAntrian($search)
    {
        $this->db->select("ab.*, sp.nama as poli, pg.nama as nama_dokter", false);

        $this->db->from('sm_antrian_bpjs as ab')
            ->join('sm_spesialisasi as sp', 'sp.id = ab.nama_poli', 'left')
            ->join('sm_translucent as cr', 'cr.id = ab.user_create', 'left')
            ->join('sm_translucent as ur', 'ur.id = ab.user_update', 'left')
            ->join('sm_tenaga_medis as tm', 'tm.id = ab.id_dokter', 'left')
            ->join('sm_pegawai as pg', 'pg.id = tm.id_pegawai', 'left')
            ->where('ab.id is not null');
            
        if (($search['tanggal_a_kunjungan'] !== '') & ($search['tanggal_kh_kunjungan'] !== '')) :
            $this->db->where("ab.tanggal_kunjungan BETWEEN '" . date2mysql($search['tanggal_a_kunjungan']) . " 00:00:00' AND '" . date2mysql($search['tanggal_kh_kunjungan']) . " 23:59:59'");
        endif;

        if ($search['kode_booking'] !== '') :
            $this->db->where('ab.kode_booking', $search['kode_booking'], true);
        endif;

        if ($search['noantrean'] !== '') :
            $this->db->like('ab.nomor_antrean', $search['noantrean'], true);
        endif;

        if ($search['nmpoli'] !== '') :
            $this->db->where('ab.nama_poli', $search['nmpoli'], true);
        endif;

        if ($search['nmdokter'] !== '') :
            $this->db->where('ab.id_dokter', $search['nmdokter'], true);
        endif;

        if ($search['status_antrean'] !== '') :
            $this->db->where('ab.status', $search['status_antrean']);
        endif;

        $this->db->where("(ab.respon_bpjs !='200' OR ab.respon_bpjs IS NULL)");
        $this->db->where("ab.huruf_antrean !='D'");
        
        return $this->db->order_by('ab.id', 'asc');
        
    }

    private function _listDataKirimAntrian($limit, $start, $search)
    {
        $this->sqlDataKirimAntrian($search);
        if ((int)$limit !== 0) :
            $this->db->limit((int)$limit, (int)$start);
        endif;

        return $this->db->get()->result();
    }

    function dataKirimAntrian($limit, $start, $search)
    {
        $result['data'] = $this->_listDataKirimAntrian((int)$limit, (int)$start, $search);
        $result['jumlah'] = $this->sqlDataKirimAntrian($search)->get()->num_rows();
        $this->db->close();

        return $result;
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

    function getBridgingAntrian()
    {
        return array(
            '' => 'Silakan Pilih',
            'Belum' => 'Belum',
            'Sudah' => 'Sudah'
        );
    }

    function dataIntegrasiAntrian($tanggal, $status)
    {
        
        $this->db->select("ab.*, sp.nama as poli, pg.nama as nama_dokter")
        ->from('sm_antrian_bpjs as ab')
        ->join('sm_spesialisasi as sp', 'sp.id = ab.nama_poli', 'left')
        ->join('sm_translucent as cr', 'cr.id = ab.user_create', 'left')
        ->join('sm_translucent as ur', 'ur.id = ab.user_update', 'left')
        ->join('sm_tenaga_medis as tm', 'tm.id = ab.id_dokter', 'left')
        ->join('sm_pegawai as pg', 'pg.id = tm.id_pegawai', 'left')
        ->where('ab.tanggal_kunjungan', $tanggal, true);

        if($status !== ''){

            if($status === 'Belum'){

                $this->db->where('ab.respon_bpjs', null);

            }

            if($status === 'Sudah'){

                $this->db->where("(ab.respon_bpjs !='200')");

            }

        } else {

            $this->db->where("(ab.respon_bpjs !='200' OR ab.respon_bpjs IS NULL)");

        }

        $this->db->limit(200, 0);

        $this->db->order_by('ab.id', 'desc');
        return $this->db->get()->result();
            
    }

    function getDataBooking($id)
    {
        return $this->db->select("ab.*, sp.nama as poli, pg.nama as nama_dokter")
            ->from('sm_antrian_bpjs as ab')
            ->join('sm_spesialisasi as sp', 'sp.id = ab.nama_poli', 'left')
            ->join('sm_translucent as cr', 'cr.id = ab.user_create', 'left')
            ->join('sm_translucent as ur', 'ur.id = ab.user_update', 'left')
            ->join('sm_tenaga_medis as tm', 'tm.id = ab.id_dokter', 'left')
            ->join('sm_pegawai as pg', 'pg.id = tm.id_pegawai', 'left')
            ->where('ab.id', $id, true)
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

}

