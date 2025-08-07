<?php

defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';
require APPPATH . '/libraries/Redis.php';

use Restserver\Libraries\REST_Controller;

/**
 * @package         CodeIgniter
 * @subpackage      Rest Server
 * @category        Controller
 * @author          Faiz Muhammad Syam
 * @license         Syams Corporation
 */
class Registrations_auto extends REST_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->limit = 10;
        $this->redis = new CI_Redis();
        $this->load->model('Registrations_model', 'regis');

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

    function cek_nik_get()
    {
        if (!$this->get('nik', true)) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
        endif;

        $data['data'] = $this->regis->getDataPasienByNik($this->get('nik', true));
        $data['count_simrs'] = $this->regis->getAutoPasienByNik($this->get('nik', true));
        $data['page'] = 1;
        $data['limit'] = $this->limit;

        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK); // (200)
        endif;
    }

    function get_nopolish_pasien_get()
    {
        if (!safe_get('id') | !safe_get('penjamin')) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
        endif;

        $no_rm = safe_get('id');
        $pj = safe_get('penjamin');

        $no_polish = $this->regis->getNoPolishPasien($no_rm, $pj);
        $this->response(array('no_polish' => $no_polish), REST_Controller::HTTP_OK);
    }

    function pasien_auto_get()
    {
        $q = safe_get('q');
        $page = safe_get('page');
        $start = $this->start($page);
        $key = 'pasien_auto_'.$q.'_'.$page;
        // if (!$this->redis->get($key)) :
            $data = $this->regis->getAutoPasien($q, $start, $this->limit);
            $this->redis->setex($key, 3600, json_encode($data));
            $this->response($data, REST_Controller::HTTP_OK);
        // else :
        //     exit($this->redis->get($key));
        // endif;
    }

    function pasien_lama_auto_get()
    {
        $q = safe_get('q');
        $page = safe_get('page');
        $start = $this->start($page);
        $key = 'pasien_lama_auto_'.$q.'_'.$page;
        if (!$this->redis->get($key)) :
            $data = $this->regis->getAutoPasienLama($q, $start, $this->limit);
            $this->redis->setex($key, 3600, json_encode($data));
            $this->response($data, REST_Controller::HTTP_OK);
        else :
            exit($this->redis->get($key));
        endif;
    }
    
}
