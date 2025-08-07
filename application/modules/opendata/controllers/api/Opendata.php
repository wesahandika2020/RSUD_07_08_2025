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
class Opendata extends REST_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Opendata_model', 'opendata');

        $id_translucent = $this->session->userdata('id_translucent');
        if (empty($id_translucent)) :
            $this->response(array('error' => 'Anda belum login'), REST_Controller::HTTP_UNAUTHORIZED);
            exit();
        endif;
    }


    function get_provinsi_get()
    {
        if (!$this->get('no_prop', true)) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
        endif;

        $no_prop = $this->get('no_prop');
        $data['data'] = $this->opendata->getProvinsi();

        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK); // (200)
        endif;
    }

    function get_list_kabupaten_get()
    {
        if (!$this->get('no_prop', true)) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
        endif;

        $no_prop = $this->get('no_prop');

        $data['data'] = $this->opendata->getKabupatenByNoProp($no_prop);

        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK); // (200)
        endif;
    }

    // function get_kabupaten_by_no_kab_get()
    // {
    //     if (!$this->get('no_prop', true) && !$this->get('no_kab', true)) :
    //         $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
    //     endif;

    //     $no_prop = $this->get('no_prop');
    //     $no_kab = $this->get('no_kab');

    //     $data['data'] = $this->opendata->getKabupatenByNoKab($no_prop, $no_kab);

    //     if ($data) :
    //         $this->response($data, REST_Controller::HTTP_OK); // (200)
    //     endif;
    // }

    function get_list_kecamatan_get()
    {
        if (!$this->get('no_prop', true) && !$this->get('no_kab', true)) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
        endif;

        $no_prop = $this->get('no_prop');
        $no_kab = $this->get('no_kab');

        $data['data'] = $this->opendata->getKecamatanByNoPropAndNoKab($no_prop, $no_kab);

        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK); // (200)
        endif;
    }

    function get_list_kelurahan_get()
    {
        if (!$this->get('no_prop', true) && !$this->get('no_kab', true)) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
        endif;

        $no_prop = $this->get('no_prop');
        $no_kab = $this->get('no_kab');
        $no_kec = $this->get('no_kec');

        $data['data'] = $this->opendata->getKelurahanByNoPropAndNoKabAndNoKec($no_prop, $no_kab, $no_kec);

        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK); // (200)
        endif;
    }
}
