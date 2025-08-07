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
class List_waktu extends REST_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->limit = 20;
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('App_model', 'm_default');
        $this->load->model('List_waktu_model', 'list');
        
        $this->code = 400;
        $this->message = "Tidak terhubung dengan Server BPJS, Server BPJS sedang bermasalah. Silahkan Hubungi Pihak IT BPJS";

        //dev
        $this->bpjs_config = $this->list->getConfigBPJSV2();


        $id_translucent = $this->session->userdata('id_translucent');
        if (empty($id_translucent)) :
            $this->response(array('error' => 'Anda belum login'), REST_Controller::HTTP_UNAUTHORIZED);
            exit();
        endif;
    }

    function list_waktu_task_post()
    {
        $tanggal_tunggu = $this->get('tanggal_tunggu');
        $waktu = time();
        $kodeBooking = $this->get('kode_booking');

        $url = $this->bpjs_config->server."antrean/getlisttask";

        $header = $this->list->createHeader($this->bpjs_config);
        $params=array(
                        "kodebooking" => $kodeBooking
                        
                    );

        $data_api = json_encode($params);
        $output = postCurl($url, $data_api, $header);

        $decode = json_decode($output);

        if(isset($decode->metadata->code)){

            $pesan = $decode->metadata->code;

            if($pesan === 204){

                $decode = ["metaData" => ["code" => $pesan,"message" => $decode->metadata->message]];
            
            } else {
        
                $decode->response = $this->list->decryptResponse($decode->response);

                if ($decode === NULL) :
                    $decode = ["metaData" => ["code" => $this->code,"message" => $this->message]];
                endif;

            }

        }


        
        $this->response($decode, REST_Controller::HTTP_OK);
    }

    function update_waktu_task_post()
    {
        $tanggal_tunggu = $this->get('tanggal_tunggu');
        $url = $this->bpjs_config->server."antrean/updatewaktu";

        $header = $this->list->createHeader($this->bpjs_config);
        $params=array(
                        "kodebooking" => "20220720A001",
                        "taskid" => 1,
                        "waktu" => $tanggal_tunggu
                    );

        $data_api = json_encode($params);
        $output = postCurl($url, $data_api, $header);

        $decode = json_decode($output);

        if(isset($decode->metadata->code)){

            $pesan = $decode->metadata->code;

            if($pesan === 204){

                $decode = ["metaData" => ["code" => $pesan,"message" => $decode->metadata->message]];
            }
        }
        
        $this->response($decode, REST_Controller::HTTP_OK);
    }

    

    


}
