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
class Dashboard_bulan extends REST_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->limit = 20;
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('App_model', 'm_default');
        $this->load->model('Dashboard_bulan_model', 'bulan');
        
        $this->code = 400;
        $this->message = "Tidak terhubung dengan Server BPJS, Server BPJS sedang bermasalah. Silahkan Hubungi Pihak IT BPJS";

        //dev
        $this->bpjs_config = $this->bulan->getConfigBPJSV2();


        $id_translucent = $this->session->userdata('id_translucent');
        if (empty($id_translucent)) :
            $this->response(array('error' => 'Anda belum login'), REST_Controller::HTTP_UNAUTHORIZED);
            exit();
        endif;
    }

    function dashboard_bulan_get()
    {
        
        $waktu = $this->get('waktu');
        $bulan = $this->get('bulan');
        $tahun = $this->get('tahun');
        
        $url = $this->bpjs_config->server."dashboard/waktutunggu/bulan/".$bulan."/tahun/".$tahun."/waktu/".$waktu;
        $header = $this->bulan->createHeader($this->bpjs_config);
        $output = getCurl($url, $header);

        if($output === "<html><head><title>Error</title></head><body>Not Found</body></html>"){

            $decode = ["metaData" => ["code" => 404, "message" => "Not Found"]];
            die(json_encode($decode));

        } else {

            $decode = json_decode($output);

        }

        $this->response($decode, REST_Controller::HTTP_OK);
    }

    

    

    


}
