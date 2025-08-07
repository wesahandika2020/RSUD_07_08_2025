<?php

defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

/**
 * @package         CodeIgniter
 * @subpackage      Rest Server
 * @category        Controller
 * @author          Faiz Muhammad Syam
 * @license         Syams Corporation
 */
class Miscellaneous extends REST_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Miscellaneous_model', 'mix');

        $id_translucent = $this->session->userdata('id_translucent');
        if (empty($id_translucent)) :
            $this->response(array('error' => 'Anda belum login'), REST_Controller::HTTP_UNAUTHORIZED);
            exit();
        endif;
    }

    private function start($page)
    {
        return (($page - 1) * $this->limit);
    }

    function cek_last_no_rujukan_get()
    {
        $response = $this->mix->cekLastNoRujukan($this->get('id'));
        $this->response($response, REST_Controller::HTTP_OK);
    }

    function generate_skdp_post()
    {
        $raw     = file_get_contents('php://input');
        $json    = (object) json_decode($raw, true);
        $do      = true;
        $status  = true;
        $message = '';

        if (!isset($json->id_pasien)) :
            $do = false;
            $status = false;
            $message .= "Atribut id_pasien harus ada, ";
        endif;

        if (!isset($json->jenis)) :
            $do = false;
            $status = false;
            $message .= "Atribut jenis harus ada, ";
        endif;

        if (!isset($json->id_layanan_pendaftaran)) :
            $do = false;
            $status = false;
            $message .= "Atribut id_layanan_pendaftaran harus ada";
        endif;

        if ($do) :
            $result  = $this->mix->generateSKDP($json->id_pasien, $json->jenis, $json->id_layanan_pendaftaran);
            $status  = $result['status'];
            $message = $result['message'];
        endif;

        $response = array(
            'status'  => $status,
            'message' => $message,
        );

        $this->response($response, REST_Controller::HTTP_OK);
    }
}
