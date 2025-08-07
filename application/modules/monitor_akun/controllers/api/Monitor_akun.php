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
class Monitor_akun extends REST_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->batas = 10;
        date_default_timezone_set('Asia/Jakarta');
        $this->datetime = date('Y-m-d H:i:s');
        $this->load->model('App_model', 'm_default');
        $this->load->model('Monitor_akun_model', 'monitor');

        
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

    function data_monitor_akun_get()
    {
        
        if (!$this->get('page')) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
        endif;

        $start = $this->mulai($this->get('page'));

        $data = $this->monitor->dataMonitorAkun($this->batas, $start);

        $data['page'] = (int) $this->get('page');
        $data['limit'] = $this->batas;

        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK);
        endif;
    }

    private function awal($page)
    {
        return (($page - 1) * $this->batas);
    }

    function data_monitor_akun_lantai_dua_get()
    {
        
        if (!$this->get('page')) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
        endif;

        $start = $this->awal($this->get('page'));

        $data = $this->monitor->dataMonitorAkunLantaiDua($this->batas, $start);

        $data['page'] = (int) $this->get('page');
        $data['limit'] = $this->batas;

        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK);
        endif;
    }

}
