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
class Resep_penunjang extends REST_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->limit = 10;
        $this->load->model('Resep_penunjang_model', 'resep_penunjang');

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

    function get_list_resep_penunjang_get()
    {
        if (!$this->get('page')) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
        endif;

        $search         = [
            'id'            => $this->get('id', true),
            'tanggal_awal'  => $this->get('tanggal_awal', true),
            'tanggal_akhir' => $this->get('tanggal_akhir', true),
            'jenis'         => $this->get('jenis', true),
            'no_register'   => $this->get('no_register', true),
            'no_rm'         => $this->get('no_rm', true),
            'nama'          => $this->get('nama', true),
            'layanan'       => $this->get('layanan', true),
            'jenis_igd'     => $this->get('jenis_igd', true),
            'keyword'       => $this->get('keyword', true)
        ];

        $data           = $this->resep_penunjang->getListDataResepPenunjang($this->limit, $this->start($this->get('page')), $search);
        $data['page']   = (int) $this->get('page');
        $data['limit']  = $this->limit;

        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK); // (200)
        endif;
    }
}
