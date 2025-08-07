<?php

defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class Mapping_dpho extends REST_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->limit = 50;
        $this->load->model('Mapping_dpho_model', 'dpho_model');

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

    function get_mapping_dpho_get()
    {
        if (!$this->get('page')) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
        endif;

        $start          = ($this->get('page') - 1) * $this->limit;
        $search         = [
            'pencarian_dpho' => $this->get('pencarian_dpho'),
            // 'keyword_obat'  => $this->get('keyword_obat')
        ];

        $data           = $this->dpho_model->getListDataObatKronis($start, $this->limit, $search);
        $data['page']   = (int) $this->get('page');
        $data['limit']  = $this->limit;

        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK); // (200)
        endif;
    }

    function get_mapping_dpho_bpjs_get()
    {
        if (!$this->get('page_dpho')) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
        endif;

        $start          = ($this->get('page_dpho') - 1) * $this->limit;
        $search         = [
            // 'pencarian_dpho' => $this->get('pencarian_dpho'),
            'keyword_obat'  => $this->get('keyword_obat'),
        ];

        $data           = $this->dpho_model->getListReferensiDPHO($start, $this->limit, $search);
        $data['page_dpho']   = (int) $this->get('page_dpho');
        $data['limit']  = $this->limit;

        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK); // (200)
        endif;
    }

    function update_mapping_barang_get()
    {
        if (!$this->get('id_dpho')) {
            die(json_encode(['status' => false, 'message' => 'Parameter tidak lengkap.']));
        }

        $param = [
            'id_barang' => $this->get('id_barang'),
            'id_dpho' => $this->get('id_dpho'),
            'kode_apotek' => $this->get('kode_apotek')
        ];

        $data = $this->dpho_model->updateMappingBarang($param);

        if ($data) {
            $this->response(['status' => true, 'message' => 'Berhasil mengubah Kode Apotek.'], REST_Controller::HTTP_OK);
        } else {
            $this->response(['status' => false, 'message' => 'Gagal mengubah Kode Apotek.'], REST_Controller::HTTP_OK);
        }
    }

    function delete_mapping_barang_get()
    {
        if (!$this->get('id_dpho')) {
            die(json_encode(['status' => false, 'message' => 'Parameter tidak lengkap.']));
        }

        $param = [
            'id_barang' => $this->get('id_barang'),
            'id_dpho' => $this->get('id_dpho'),
            'kode_apotek' => $this->get('kode_apotek')
        ];

        $data = $this->dpho_model->deleteMappingBarang($param);

        if ($data) {
            $this->response(['status' => true, 'message' => 'Berhasil menghapus mapping Kode Apotek.'], REST_Controller::HTTP_OK);
        } else {
            $this->response(['status' => false, 'message' => 'Gagal menghapus mapping Kode Apotek.'], REST_Controller::HTTP_OK);
        }
    }
}
