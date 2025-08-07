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
class Poli_hfis extends REST_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->limit = 20;
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('App_model', 'm_default');
        $this->load->model('Antrian_model', 'antrian');
        
        $this->code = 400;
        $this->message = "Tidak terhubung dengan Server BPJS, Server BPJS sedang bermasalah. Silahkan Hubungi Pihak IT BPJS";

        //dev
        $this->bpjs_config = $this->antrian->getConfigBPJSV2();


        $id_translucent = $this->session->userdata('id_translucent');
        if (empty($id_translucent)) :
            $this->response(array('error' => 'Anda belum login'), REST_Controller::HTTP_UNAUTHORIZED);
            exit();
        endif;
    }

    function get_list_poli_hfis_get()
    {
        
        $url = $this->bpjs_config->server."ref/poli";
        $header = $this->antrian->createHeader($this->bpjs_config);
        $output = getCurl($url, $header);
        $decode = json_decode($output);

        if ($decode === NULL) :
            $decode = ["metaData" => ["code" => $this->code,"message" => $this->message]];
            die(json_encode($decode));
        endif;
        
        
        $decode->response = $this->antrian->decryptResponse($decode->response);
        // $decode->response = $this->antrian->test_decompress($decode->response);
        // var_dump($decode);

        // if (isset($decode->response) && $decode->metaData->code === "200") :
        //     $decode = $decode->response->nmpoli;
            
        // endif;
        // $decode->response = json_decode($decode);
        
        $this->response($decode, REST_Controller::HTTP_OK);
    }

    


}
