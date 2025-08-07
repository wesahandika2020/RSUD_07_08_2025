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
class Bridging_task extends REST_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->limit = 20;
        $this->batas = 10;
        date_default_timezone_set('Asia/Jakarta');
        $this->datetime = date('Y-m-d H:i:s');
        $this->load->model('App_model', 'm_default');
        $this->load->model('Bridging_task_model', 'bridging');
        
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
        return (($page - 1) * $this->batas);
    }

    function booking_task_get()
    {
        
        $id_booking = $this->get('id');

        $data_booking = $this->bridging->getDataTask($id_booking);

        $url = $this->bpjs_config->server."antrean/updatewaktu";

        $header = $this->bridging->createHeader($this->bpjs_config);

        $cekTask = (int)$data_booking->nomor_task;

        $acuan = 5;

        if((int)$cekTask === (int)$acuan){

            $noTaskSb = (int)$cekTask - 1;
            $noTaskSbb = (int)$cekTask - 2;

            $cekKodeBooking = $data_booking->kode_booking;

            $cekResponBpjs = $this->bridging->getResponseBPJS($cekKodeBooking, (int)$noTaskSb);

            if($cekResponBpjs === null){

                $cekResponBpjsTiga = $this->bridging->getResponseBPJS($cekKodeBooking, (int)$noTaskSbb);
                $cekResponBpjsLima = $this->bridging->getResponseBPJS($cekKodeBooking, (int)$cekTask);

                if(isset($cekResponBpjsTiga) && isset($cekResponBpjsLima)){

                    $cekWaktuTiga = $cekResponBpjsTiga->waktu_task;
                    $cekWaktuLima = $cekResponBpjsLima->waktu_task;

                    $totalCek = (int)$cekWaktuTiga + (int)$cekWaktuLima;
                    $totalBagiDua = (int)$totalCek / 2;

                    date_default_timezone_set('Asia/Jakarta');

                    $newEstimasi = date('Y-m-d H:i:s', (int)$totalBagiDua / 1000);

                    $cekAntrian = $this->bridging->cekBookingAntrian($cekKodeBooking);

                    if((int)$noTaskSb === 4){

                        $updateTaskEmpat = ["task_empat" => $newEstimasi];

                    }

                    $idAntrian = (int)$cekAntrian->id;

                    $data = $this->db->where('id', (int)$idAntrian)->update('sm_antrian_bpjs', $updateTaskEmpat);

                    $dataResponse = array(
                        "nomor_task"        => 4,
                        "waktu_task"        => $totalBagiDua,
                        "kode_booking"      => $cekKodeBooking,
                        "id_antrian"        => (int)$idAntrian,
                        "konversi_waktu"    => $newEstimasi,
                        "id_users"          => $this->session->userdata('id_translucent'),    
                    );

                    $this->db->insert('sm_update_task_bpjs', $dataResponse);

                    $response = ["metaData" => ["code" => 201,"message" => "Task 4 Sudah dibuat, Silakan Kirim Task 4 Terlebih Dahulu"]];

                    die(json_encode($response));

                }

            }

        }

        $params=array(
                        "kodebooking" => $data_booking->kode_booking,
                        "taskid" => (int)$data_booking->nomor_task,
                        "waktu" => (int)$data_booking->waktu_task
                    );
        
        $data_api = json_encode($params);

        $output = postCurl($url, $data_api, $header);

        $decode = json_decode($output);

        if($decode !== NULL){

            if(isset($decode->metadata->code)){

                $pesan = $decode->metadata->code;

                if($pesan === 200){

                    $update = ["kirim_bpjs" => 'Sudah',"respon_bpjs" => $pesan,"ket_bridging" => $decode->metadata->message];
        
                    $data = $this->db->where('id', $id_booking)->update('sm_update_task_bpjs', $update);

                    $response = ["metaData" => ["code" => 200,"message" => "Kirim Task Berhasil"]];

                } else if($pesan === 208){

                    $array_response = ["kirim_bpjs" => 'Sudah',"respon_bpjs" => 200,"ket_bridging" => $decode->metadata->message];
                    $this->db->where('id', $id_booking)->update('sm_update_task_bpjs', $array_response);

                    $response = ["metaData" => ["code" => 200,"message" => 'Ok.']];

                } else {

                    $update = ["kirim_bpjs" => 'Sudah',"respon_bpjs" => $pesan,"ket_bridging" => $decode->metadata->message];
        
                    $data = $this->db->where('id', $id_booking)->update('sm_update_task_bpjs', $update);

                    $response = ["metaData" => ["code" => 201,"message" => "Kirim Task Gagal"]];

                }

            } else {

                $update = ["kirim_bpjs" => 'Sudah',"respon_bpjs" => 201,"ket_bridging" => 'Response BPJS Null'];
        
                $data = $this->db->where('id', $id_booking)->update('sm_update_task_bpjs', $update);

                $response = ["metaData" => ["code" => 201,"message" => "Kirim Task Gagal"]];

            }

        } else {

            $update = ["kirim_bpjs" => 'Sudah',"respon_bpjs" => 201,"ket_bridging" => 'Response BPJS Null'];
        
                $data = $this->db->where('id', $id_booking)->update('sm_update_task_bpjs', $update);

                $response = ["metaData" => ["code" => 201,"message" => "Kirim Task Gagal"]];

        }

        $this->response($response, REST_Controller::HTTP_OK);
    }

    function batal_antrean_post()
    {
        
        $id_booking = $this->get('id');

        $data_booking = $this->bridging->getDataTask($id_booking);

        $url = $this->bpjs_config->server."antrean/batal";

        $header = $this->bridging->createHeader($this->bpjs_config);

        $params=array(
                            "kodebooking" => $data_booking->kode_booking,
                            "keterangan" => $data_booking->keterangan_batal
                        );
        
        $data_api = json_encode($params);

        $output = postCurl($url, $data_api, $header);

        $decode = json_decode($output);

        if($decode !== NULL){

            if(isset($decode->metadata->code)){

                $pesan = $decode->metadata->code;

                if($pesan === 200){

                    $update = ["kirim_bpjs" => 'Sudah',"respon_bpjs" => $pesan,"ket_bridging" => $decode->metadata->message];
        
                    $data = $this->db->where('id', $id_booking)->update('sm_update_task_bpjs', $update);

                    $response = ["metaData" => ["code" => 200,"message" => "Kirim Task Berhasil"]];

                } else if($pesan === 208){

                    $array_response = ["kirim_bpjs" => 'Sudah',"respon_bpjs" => 200,"ket_bridging" => $decode->metadata->message];
                    $this->db->where('id', $id_booking)->update('sm_update_task_bpjs', $array_response);

                    $response = ["metaData" => ["code" => 200,"message" => 'Ok.']];

                } else {

                    $update = ["kirim_bpjs" => 'Sudah',"respon_bpjs" => $pesan,"ket_bridging" => $decode->metadata->message];
        
                    $data = $this->db->where('id', $id_booking)->update('sm_update_task_bpjs', $update);

                    $response = ["metaData" => ["code" => 201,"message" => "Kirim Task Gagal"]];

                }

            } else {

                $update = ["kirim_bpjs" => 'Sudah',"respon_bpjs" => 201,"ket_bridging" => 'Response BPJS Null'];
        
                $data = $this->db->where('id', $id_booking)->update('sm_update_task_bpjs', $update);

                $response = ["metaData" => ["code" => 201,"message" => "Kirim Task Gagal"]];

            }

        } else {

            $update = ["kirim_bpjs" => 'Sudah',"respon_bpjs" => 201,"ket_bridging" => 'Response BPJS Null'];
        
                $data = $this->db->where('id', $id_booking)->update('sm_update_task_bpjs', $update);

                $response = ["metaData" => ["code" => 201,"message" => "Kirim Task Gagal"]];

        }

        $this->response($response, REST_Controller::HTTP_OK);
    }

    function data_bridging_task_get()
    {
        
        if (!$this->get('page')) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
        endif;

        $search = [
            'tanggal_awal'      => safe_get('tanggal_awal'),
            'tanggal_akhir'     => safe_get('tanggal_akhir'),
            'no_kode_booking'   => safe_get('no_kode_booking'),
            'task'              => safe_get('task'),
        ];

        $start = $this->mulai($this->get('page'));

        $data = $this->bridging->taskBridgingAntrian($this->batas, $start, $search);

        $data['page'] = (int) $this->get('page');
        $data['limit'] = $this->batas;

        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK);
        endif;
    }

    function data_kirim_task_get()
    {
        
        if (!$this->get('page')) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
        endif;

        $search = [
            'tanggal_a_kunjungan'   => safe_get('tanggal_a_kunjungan'),
            'tanggal_kh_kunjungan'  => safe_get('tanggal_kh_kunjungan'),
            'kode_booking'          => safe_get('kode_booking'),
            'task'                  => safe_get('task'),
        ];

        $start = $this->mulai($this->get('page'));

        $data = $this->bridging->dataKirimTask($this->batas, $start, $search);

        $data['page'] = (int) $this->get('page');
        $data['limit'] = $this->batas;

        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK);
        endif;
    }

    function validasi_task_post()
    {
        
        if (!safe_post('tanggal_integrasi') && !safe_post('task')) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
            exit();
        endif;

        $this->db->trans_begin();

        $tanggalBridging = date2mysql(safe_post('tanggal_integrasi'));
        $task = (int)safe_post('task');
        $statusTask = safe_post('status_task');

        $data = $this->bridging->dataIntegrasiTask($tanggalBridging, $task, $statusTask);

        foreach ($data as $key => $value) {

            $url = $this->bpjs_config->server."antrean/updatewaktu";

            $header = $this->bridging->createHeader($this->bpjs_config);

            $cekTask = (int)$value->nomor_task;

            $acuan = 5;

            if((int)$cekTask === (int)$acuan){

                $noTaskSb = (int)$cekTask - 1;
                $noTaskSbb = (int)$cekTask - 2;

                $cekKodeBooking = $value->kode_booking;

                $cekResponBpjs = $this->bridging->getResponseBPJS($cekKodeBooking, (int)$noTaskSb);

                if($cekResponBpjs === null){

                    $cekResponBpjsTiga = $this->bridging->getResponseBPJS($cekKodeBooking, (int)$noTaskSbb);
                    $cekResponBpjsLima = $this->bridging->getResponseBPJS($cekKodeBooking, (int)$cekTask);

                    if(isset($cekResponBpjsTiga) && isset($cekResponBpjsLima)){

                        $cekWaktuTiga = $cekResponBpjsTiga->waktu_task;
                        $cekWaktuLima = $cekResponBpjsLima->waktu_task;

                        $totalCek = (int)$cekWaktuTiga + (int)$cekWaktuLima;
                        $totalBagiDua = (int)$totalCek / 2;

                        date_default_timezone_set('Asia/Jakarta');

                        $newEstimasi = date('Y-m-d H:i:s', (int)$totalBagiDua / 1000);

                        $cekAntrian = $this->bridging->cekBookingAntrian($cekKodeBooking);

                        if((int)$noTaskSb === 4){

                            $updateTaskEmpat = ["task_empat" => $newEstimasi];

                        }

                        $idAntrian = (int)$cekAntrian->id;

                        $data = $this->db->where('id', (int)$idAntrian)->update('sm_antrian_bpjs', $updateTaskEmpat);

                        $dataResponse = array(
                            "nomor_task"        => 4,
                            "waktu_task"        => $totalBagiDua,
                            "kode_booking"      => $cekKodeBooking,
                            "id_antrian"        => (int)$idAntrian,
                            "konversi_waktu"    => $newEstimasi,
                            "id_users"          => $this->session->userdata('id_translucent'),
                        );

                        $this->db->insert('sm_update_task_bpjs', $dataResponse);

                    }

                }

            }

            $params=array(
                            "kodebooking" => $value->kode_booking,
                            "taskid" => (int)$value->nomor_task,
                            "waktu" => (int)$value->waktu_task
                        );
            
            $data_api = json_encode($params);

            $output = postCurl($url, $data_api, $header);

            $decode = json_decode($output);

            $id_booking = (int)$value->id;

            if($decode !== NULL){

                if(isset($decode->metadata->code)){

                    $pesan = $decode->metadata->code;

                    if($pesan === 200){

                        $update = ["kirim_bpjs" => 'Sudah',"respon_bpjs" => $pesan,"ket_bridging" => $decode->metadata->message];
            
                        $data = $this->db->where('id', $id_booking)->update('sm_update_task_bpjs', $update);

                    } else if($pesan === 208){

                        $array_response = ["kirim_bpjs" => 'Sudah',"respon_bpjs" => 200,"ket_bridging" => $decode->metadata->message];
                        $this->db->where('id', $id_booking)->update('sm_update_task_bpjs', $array_response);

                        $response = ["metaData" => ["code" => 200,"message" => 'Ok.']];

                    } else {

                        $update = ["kirim_bpjs" => 'Sudah',"respon_bpjs" => $pesan,"ket_bridging" => $decode->metadata->message];
            
                        $data = $this->db->where('id', $id_booking)->update('sm_update_task_bpjs', $update);

                    }

                } else {

                    $update = ["kirim_bpjs" => 'Sudah',"respon_bpjs" => 201,"ket_bridging" => 'Response BPJS Null'];
            
                    $data = $this->db->where('id', $id_booking)->update('sm_update_task_bpjs', $update);

                }

            } else {

                $update = ["kirim_bpjs" => 'Sudah',"respon_bpjs" => 201,"ket_bridging" => 'Response BPJS Null'];
            
                $data = $this->db->where('id', $id_booking)->update('sm_update_task_bpjs', $update);

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

    private function start($page)
    {
        return (($page - 1) * $this->limit);
    }

    
    


}
