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
class Dashboard_tanggal extends REST_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->limit = 20;
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('App_model', 'm_default');
        $this->load->model('Dashboard_tanggal_model', 'tanggal');
        
        $this->code = 400;
        $this->message = "Tidak terhubung dengan Server BPJS, Server BPJS sedang bermasalah. Silahkan Hubungi Pihak IT BPJS";

        //dev
        $this->bpjs_config = $this->tanggal->getConfigBPJSV2();


        $id_translucent = $this->session->userdata('id_translucent');
        if (empty($id_translucent)) :
            $this->response(array('error' => 'Anda belum login'), REST_Controller::HTTP_UNAUTHORIZED);
            exit();
        endif;
    }

    function dashboard_tanggal_get()
    {
        $tanggal_tunggu = $this->get('tanggal_tunggu');
        $waktu = $this->get('waktu');
        $bulan = $this->get('bulan');
        $tahun = $this->get('tahun');
        // $waktu = time();
        // $url = $this->bpjs_config->server."antrean/getlisttask";


        $url = $this->bpjs_config->server."dashboard/waktutunggu/tanggal/".$tanggal_tunggu."/waktu/".$waktu;
        // var_dump($url);
        // $url = $this->bpjs_config->server."dashboard/waktutunggu/bulan/".$bulan."/tahun/".$tahun."/waktu/".$waktu;
        $header = $this->tanggal->createHeader($this->bpjs_config);
        // $header = array('');
        $output = getCurl($url, $header);
        // var_dump($url);
        if($output === "<html><head><title>Error</title></head><body>Not Found</body></html>"){

            $decode = ["metaData" => ["code" => 404, "message" => "Not Found"]];
            die(json_encode($decode));

        } else {

            $decode = json_decode($output);

        }

         

        // var_dump($output);

        // $decode->response = $this->jadwal->decryptResponse($decode->response);

        // if ($decode === NULL) :
        //     $decode = ["metaData" => ["code" => $this->code,"message" => $this->message]];
        //     die(json_encode($decode));
        // endif;
        
        $this->response($decode, REST_Controller::HTTP_OK);
    }

    // function dashboard_tanggal_post()
    // {
    //     $tanggal_tunggu = $this->get('tanggal_tunggu');
    //     $waktu = date('H:i:s');
    //     // $waktu = time();
    //     $url = $this->bpjs_config->server."antrean/getlisttask";

    //     // var_dump($url);
    //     // $url = $this->bpjs_config->server."dashboard/waktutunggu/tanggal/2022-06-29/waktu/".$waktu;
    //     $header = $this->tanggal->createHeader($this->bpjs_config);
    //     // $header = array('');
    //     $params=array(
    //                     "kodebooking"=> "29062022JKN01"
                        
    //                 );

    //     $data_api = json_encode($params);
    //     $output = postCurl($url, $data_api, $header);

    //     var_dump($output);
    //     $decode = json_decode($output);

    //     // var_dump($output);

    //     // $decode->response = $this->jadwal->decryptResponse($decode->response);

    //     // if ($decode === NULL) :
    //     //     $decode = ["metaData" => ["code" => $this->code,"message" => $this->message]];
    //     //     die(json_encode($decode));
    //     // endif;
        
    //     // $this->response($decode, REST_Controller::HTTP_OK);
    // }

    

    


}
