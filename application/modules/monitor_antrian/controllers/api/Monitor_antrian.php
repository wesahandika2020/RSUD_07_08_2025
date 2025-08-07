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
class Monitor_antrian extends REST_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->limit = 20;
        $this->batas = 10;
        date_default_timezone_set('Asia/Jakarta');
        $this->datetime = date('Y-m-d H:i:s');
        $this->load->model('App_model', 'm_default');
        $this->load->model('Monitor_antrian_model', 'monitor');
        
        $this->code = 400;
        $this->message = "Tidak terhubung dengan Server BPJS, Server BPJS sedang bermasalah. Silahkan Hubungi Pihak IT BPJS";

        $id_translucent = $this->session->userdata('id_translucent');
        if (empty($id_translucent)) :
            $this->response(array('error' => 'Anda belum login'), REST_Controller::HTTP_UNAUTHORIZED);
            exit();
        endif;
    }

    function data_monitor_antrian_get()
    {
        
        $data['loket_satu'] = $this->monitor->dataPanggilSatu();
        $data['loket_dua'] = $this->monitor->dataPanggilDua();
        $data['loket_tiga'] = $this->monitor->dataPanggilTiga();
        $data['loket_empat'] = $this->monitor->dataPanggilEmpat();
        $data['loket_lima'] = $this->monitor->dataPanggilLima();
        $data['loket_enam'] = $this->monitor->dataPanggilEnam();
        $data['loket_tujuh'] = $this->monitor->dataPanggilTujuh();
        $data['loket_delapan'] = $this->monitor->dataPanggilanDelapan();
        $data['loket_sembilan'] = $this->monitor->dataPanggilanSembilan();
        $data['loket_sepuluh'] = $this->monitor->dataPanggilanSepuluh();

        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK);
        endif;
    }

}
