<?php

defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class Kfa_satu_sehat extends REST_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->limit = 50;
        $this->load->model('Kfa_satu_sehat_model', 'kfa_model');

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

    function get_list_kfa_get()
    {
        if (!$this->get('page')) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
        endif;

        $start          = ($this->get('page') - 1) * $this->limit;
        $search         = [
            'pencarian_kfa' => $this->get('pencarian_kfa'),
            // 'keyword_obat'  => $this->get('keyword_obat')
        ];

        $data           = $this->kfa_model->getListDataKFA($start, $this->limit, $search);
        $data['page']   = (int) $this->get('page');
        $data['limit']  = $this->limit;

        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK); // (200)
        endif;
    }

    function get_list_kfa_satu_sehat_get()
    {
        if (!$this->get('page_kfa')) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
        endif;

        $start          = ($this->get('page_kfa') - 1) * $this->limit;
        $search         = [
            // 'pencarian_kfa' => $this->get('pencarian_kfa'),
            'keyword_obat'  => $this->get('keyword_obat'),
        ];

        $data           = $this->kfa_model->getListDataSatuSehat($start, $this->limit, $search);
        $data['page_kfa']   = (int) $this->get('page_kfa');
        $data['limit']  = $this->limit;

        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK); // (200)
        endif;
    }

    function update_code_barang_get()
    {
        if (!$this->get('id_barang')) {
            die(json_encode(['status' => false, 'message' => 'Parameter tidak lengkap.']));
        }

        $param = [
            'id_barang' => $this->get('id_barang'),
            'code_kfa' => $this->get('code_kfa')
        ];

        $data = $this->kfa_model->updateCodeBarang($param);

        if ($data) {
            $this->response(['status' => true, 'message' => 'Berhasil mengubah Kode Barang.'], REST_Controller::HTTP_OK);
        } else {
            $this->response(['status' => false, 'message' => 'Gagal mengubah Kode Barang.'], REST_Controller::HTTP_OK);
        }
    }
}
