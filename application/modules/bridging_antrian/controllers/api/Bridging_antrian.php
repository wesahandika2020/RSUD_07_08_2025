<?php

defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH.'/libraries/REST_Controller.php';
// require_once 'vendor/autoload.php';

use Restserver\Libraries\REST_Controller;
use \LZCompressor\LZString as LZString;

/**
 * @package         CodeIgniter
 * @subpackage      Rest Server
 * @category        Controller
 * @author          Faiz Muhammad Syam
 * @license         Syams Corporation
 */
class Bridging_antrian extends REST_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->limit = 20;
        $this->batas = 10;
        date_default_timezone_set('Asia/Jakarta');
        $this->datetime = date('Y-m-d H:i:s');
        $this->load->model('App_model', 'm_default');
        $this->load->model('Bridging_antrian_model', 'bridging');
        
        //dev
        $this->bpjs_config = $this->bridging->getConfigBPJSV2();


        $id_translucent = $this->session->userdata('id_translucent');
        if (empty($id_translucent)) :
            $this->response(array('error' => 'Anda belum login'), REST_Controller::HTTP_UNAUTHORIZED);
            exit();
        endif;
    }

    private function mulai($page)
    {
        return (((int)$page - 1) * (int)$this->batas);
    }

    function booking_ulang_get()
    {
        
        $id_booking = $this->get('id');

        $data_booking = $this->bridging->getDataBooking($id_booking);

        if($data_booking === NULL){

            $response = ["metaData" => ["code" => 201,"respon" => 'Data Kosong, Silakan booking Antrean kembali']];
        
        } else {

            $response = ["metaData" => ["code" => 200,"respon" => $data_booking]];

        }

        $this->response($response, REST_Controller::HTTP_OK);
    }

    function data_bridging_antrian_get()
    {
        
        if (!$this->get('page')) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
        endif;

        $search = [
            'tanggal_awal'      => safe_get('tanggal_awal'),
            'tanggal_akhir'     => safe_get('tanggal_akhir'),
            'no_kode_booking'   => safe_get('no_kode_booking'),
            'no_antrean'        => safe_get('no_antrean'),
            'nm_poli'           => safe_get('nm_poli'),
            'nm_dokter'         => safe_get('nm_dokter'),
            'status_antrean'    => safe_get('status_antrean'),
        ];

        $start = $this->mulai((int)$this->get('page'));

        $data = $this->bridging->dataBridgingAntrian((int)$this->batas, (int)$start, $search);

        $data['page'] = (int) $this->get('page');
        $data['limit'] = (int)$this->batas;

        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK);
        endif;
    }

    function data_kirim_antrian_get()
    {
        
        if ($this->get('page') === null){

            $page = 1;

        } else {

            $page = (int)$this->get('page');
        
        }

        $search = [
            'tanggal_a_kunjungan'   => safe_get('tanggal_a_kunjungan'),
            'tanggal_kh_kunjungan'  => safe_get('tanggal_kh_kunjungan'),
            'kode_booking'          => safe_get('kode_booking'),
            'noantrean'             => safe_get('noantrean'),
            'nmpoli'                => safe_get('nmpoli'),
            'nmdokter'              => safe_get('nmdokter'),
            'status_antrean'        => safe_get('status_antrean'),
        ];

        $start = $this->mulai((int)$page);

        $data = $this->bridging->dataKirimAntrian((int)$this->batas, (int)$start, $search);

        $data['page'] = (int)$page;
        $data['limit'] = (int)$this->batas;

        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK);
        endif;
    }

    function validasi_kirim_post()
    {
        
        if (!safe_post('tanggal_integrasi')) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
            exit();
        endif;

        $this->db->trans_begin();
        if(safe_post('tanggal_integrasi') !== ''){
            $tanggalIntegrasi = date2mysql(safe_post('tanggal_integrasi'));
            $statusAntrean = safe_post('status_bridging');
            $data = $this->bridging->dataIntegrasiAntrian($tanggalIntegrasi, $statusAntrean);



            foreach ($data as $key => $value) {
                
                $id_booking = $value->id;

                if($value->huruf_antrean !== 'D' && $value->huruf_antrean !== 'C'){

                    if($value->nik !== null){
                        $estimate = new DateTime($value->waktu_estimasi);
                        $nw_est = $estimate->getTimestamp();
                        $nw_est_one = $nw_est*1000;

                        if($value->no_kartu === null){

                            $noKa = '';

                        } else {

                            $noKa = $value->no_kartu;

                        }

                        if($value->no_referensi === null){

                            $noReferensi = '';

                        } else {

                            $noReferensi = $value->no_referensi;

                        }

                        if($value->jenis_kunjungan === null){

                            $jenisKunjungan = 1;

                        } else {

                            $jenisKunjungan = $value->jenis_kunjungan;

                        }
                        
                        $url = $this->bpjs_config->server."antrean/add";

                        $header = $this->bridging->createHeader($this->bpjs_config);

                        $params=array(
                                "kodebooking" => $value->kode_booking,
                                "jenispasien" => $value->status_jkn,
                                "nomorkartu" => $noKa,
                                "nik" => $value->nik,
                                "nohp" => $value->no_hp,
                                "kodepoli" => $value->kode_bpjs_poli,
                                "namapoli" => $value->poli,
                                "pasienbaru" => (int)$value->pasien_baru,
                                "norm" => $value->no_rm,
                                "tanggalperiksa" => $value->tanggal_kunjungan,
                                "kodedokter" => (int)$value->kode_bpjs_dokter,
                                "namadokter" => $value->nama_dokter,
                                "jampraktek" => "07:30-14:00",
                                "jeniskunjungan" => $jenisKunjungan,
                                "nomorreferensi" => $noReferensi,
                                "nomorantrean" => $value->nomor_antrean,
                                "angkaantrean" => (int)$value->urutan,
                                "estimasidilayani" => $nw_est_one, //waktu estimasi dilayani dalam miliseconds
                                "sisakuotajkn" => (int)$value->sisa_kuota,
                                "kuotajkn" => (int)$value->total_kuota,
                                "sisakuotanonjkn" => 0,
                                "kuotanonjkn" => 0,
                                "keterangan" => "Peserta harap 30 menit lebih awal guna pencatatan administrasi."
                            );

                        $data_api = json_encode($params);

                        $output = postCurl($url, $data_api, $header);
                        $decode = json_decode($output);

                        if($decode !== NULL){

                            if(isset($decode->metadata->code)){

                                $pesan = $decode->metadata->code;

                                if($pesan === 200){

                                    $array_response = ["kirim_bpjs" => 'Sudah',"respon_bpjs" => $pesan,"ket_bridging" => $decode->metadata->message];
                                    $this->db->where('id', $id_booking)->update('sm_antrian_bpjs', $array_response);

                                } else if($pesan === 208){

                                    $array_response = ["kirim_bpjs" => 'Sudah',"respon_bpjs" => 200,"ket_bridging" => $decode->metadata->message];
                                    $this->db->where('id', $id_booking)->update('sm_antrian_bpjs', $array_response);

                                } else if($pesan !== 200 && $pesan !== 208){

                                    if(isset($decode->metadata->message)){

                                        if($decode->metadata->message !== null && $decode->metadata->message !== ''){

                                            $mesDecode = $decode->metadata->message;

                                        } else {

                                            $mesDecode = null;

                                        }

                                    } else {

                                        $mesDecode = null;

                                    }

                                    $array_response = ["kirim_bpjs" => 'Sudah',"respon_bpjs" => $pesan,"ket_bridging" => $mesDecode];
                                    $this->db->where('id', $id_booking)->update('sm_antrian_bpjs', $array_response);

                                }

                            } else {

                                $pesan = $decode->metadata->code;

                                $array_response = ["kirim_bpjs" => 'Sudah',"respon_bpjs" => $pesan,"ket_bridging" => $decode->metadata->message];
                                $this->db->where('id', $id_booking)->update('sm_antrian_bpjs', $array_response);

                            }

                        }

                    } else {

                        $array_response = ["kirim_bpjs" => 'Sudah',"respon_bpjs" => 201,"ket_bridging" => 'Tidak Ada NIK'];
                        $this->db->where('id', $id_booking)->update('sm_antrian_bpjs', $array_response);

                    }

                } else {

                    $array_response = ["kirim_bpjs" => 'Sudah',"respon_bpjs" => 200,"ket_bridging" => 'Finger Print'];
                    $this->db->where('id', $id_booking)->update('sm_antrian_bpjs', $array_response);

                }
            }
        }

        if ($this->db->trans_status() === FALSE) :
            $this->db->trans_rollback();
            $response['status'] = FALSE;
            $response = ["metaData" => ["code" => 201,"message" => 'Integrasi atau sebagian integrasi data Gagal']];

        
        else :
            $this->db->trans_commit();
            $response['status'] = TRUE;
            $response = ["metaData" => ["code" => 200,"message" => 'Integrasi Berhasil']];
        endif;

        $this->response($response, REST_Controller::HTTP_OK);
    }

    function booking_kembali_post()
    {

        $this->db->trans_begin();

        $id_booking = $this->get('id');

        $data_booking = $this->bridging->getDataBooking($id_booking);

        $estimate = new DateTime($data_booking->waktu_estimasi);
        $nw_est = $estimate->getTimestamp();
        $nw_est_one = $nw_est*1000;

        if($data_booking->no_kartu === null){

            $noKa = '';

        } else {

            $noKa = $data_booking->no_kartu;

        }

        if($data_booking->no_referensi === null){

            $noReferensi = '';

        } else {

            $noReferensi = $data_booking->no_referensi;

        }

        if($data_booking->jenis_kunjungan === null){

            $jenisKunjungan = 1;

        } else {

            $jenisKunjungan = $data_booking->jenis_kunjungan;

        }

        if($data_booking->huruf_antrean !== 'D' && $data_booking->huruf_antrean !== 'C'){
        
            $url = $this->bpjs_config->server."antrean/add";

            $header = $this->bridging->createHeader($this->bpjs_config);

            $params=array(
                            "kodebooking" => $data_booking->kode_booking,
                            "jenispasien" => $data_booking->status_jkn,
                            "nomorkartu" => $noKa,
                            "nik" => $data_booking->nik,
                            "nohp" => $data_booking->no_hp,
                            "kodepoli" => $data_booking->kode_bpjs_poli,
                            "namapoli" => $data_booking->poli,
                            "pasienbaru" => (int)$data_booking->pasien_baru,
                            "norm" => $data_booking->no_rm,
                            "tanggalperiksa" => $data_booking->tanggal_kunjungan,
                            "kodedokter" => (int)$data_booking->kode_bpjs_dokter,
                            "namadokter" => $data_booking->nama_dokter,
                            "jampraktek" => "07:30-14:00",
                            "jeniskunjungan" => $jenisKunjungan,
                            "nomorreferensi" => $noReferensi,
                            "nomorantrean" => $data_booking->nomor_antrean,
                            "angkaantrean" => (int)$data_booking->urutan,
                            "estimasidilayani" => $nw_est_one, //waktu estimasi dilayani dalam miliseconds
                            "sisakuotajkn" => (int)$data_booking->sisa_kuota,
                            "kuotajkn" => (int)$data_booking->total_kuota,
                            "sisakuotanonjkn" => 0,
                            "kuotanonjkn" => 0,
                            "keterangan" => "Peserta harap 30 menit lebih awal guna pencatatan administrasi."
                        );

            $data_api = json_encode($params);

            $output = postCurl($url, $data_api, $header);
            $decode = json_decode($output);


            if($decode !== NULL){

                if(isset($decode->metadata->code)){

                    $pesan = $decode->metadata->code;

                    if($pesan === 200){

                        $array_response = ["kirim_bpjs" => 'Sudah',"respon_bpjs" => $pesan,"ket_bridging" => $decode->metadata->message];
                        $this->db->where('id', $id_booking)->update('sm_antrian_bpjs', $array_response);

                        if(isset($decode->metadata->message)){

                            $response = ["metaData" => ["code" => $pesan,"message" => $decode->metadata->message]];
                        }

                    } else if($pesan === 208){

                        $array_response = ["kirim_bpjs" => 'Sudah',"respon_bpjs" => 200,"ket_bridging" => $decode->metadata->message];
                        $this->db->where('id', $id_booking)->update('sm_antrian_bpjs', $array_response);

                        $response = ["metaData" => ["code" => 200,"message" => 'Ok.']];

                    } else {

                        if(isset($decode->metadata->message)){
                            $array_response = ["kirim_bpjs" => 'Sudah',"respon_bpjs" => $pesan,"ket_bridging" => $decode->metadata->message];
                            $this->db->where('id', $id_booking)->update('sm_antrian_bpjs', $array_response);
                            $response = ["metaData" => ["code" => $pesan,"message" => $decode->metadata->message]];
                        }

                    }
                    
                } else {

                    $array_response = ["kirim_bpjs" => 'Sudah',"respon_bpjs" => $pesan,"ket_bridging" => $decode->metadata->message];
                    $this->db->where('id', $id_booking)->update('sm_antrian_bpjs', $array_response);
                    $response = ["metaData" => ["code" => $pesan,"message" => $decode->metadata->message]];

                }

            } else {

                $array_response = ["kirim_bpjs" => 'Sudah',"respon_bpjs" => $this->code,"ket_bridging" => $this->message];
                $this->db->where('id', $id_booking)->update('sm_antrian_bpjs', $array_response);
                $response = ["metaData" => ["code" => $this->code,"message" => $this->message]];
                
            }

        } else {

            $array_response = ["kirim_bpjs" => 'Sudah',"respon_bpjs" => 200,"ket_bridging" => 'Finger Print'];
            $this->db->where('id', $id_booking)->update('sm_antrian_bpjs', $array_response);
            $response = ["metaData" => ["code" => $this->code,"message" => $this->message]];

        }

        if ($this->db->trans_status() === FALSE) :
            $this->db->trans_rollback();
            $status = FALSE;
        else :
            $this->db->trans_commit();
            $status = TRUE;
        endif;

        $this->response($response, REST_Controller::HTTP_OK);
    }

    private function start($page)
    {
        return (((int)$page - 1) * (int)$this->limit);
    }

    
    


}
