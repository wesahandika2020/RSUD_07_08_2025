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
class Layanan extends REST_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->limit = 10;
        $this->load->model('Layanan_model', 'layanan');
        $this->load->model('Masterdata_model', 'masterdata');

        $id_translucent = $this->session->userdata('id_translucent');
        if (empty($id_translucent)) :
            $this->response(array('error' => 'Anda belum login'), REST_Controller::HTTP_UNAUTHORIZED);
            exit();
        endif;
    }

    function get_list_layanan_get()
    {
        if (!$this->get('page')) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
        endif;

        $tipedata = 'list';
        $limit = 5;

        if (isset($_GET['tipedata'])) :
            $tipedata = safe_get('tipedata');
        endif;

        $search = [
            'nama' => safe_get('nama'),
            'jenis_pemeriksaan' => safe_get('id_jenis_pemeriksaan')
        ];

        if ($tipedata === 'list') :
            $limit = 5;
            $start = (($this->get('page') - 1) * $limit);
            $data = $this->layanan->getListDataLayanan($limit, $start);
        else :
            $limit = $this->limit;
            $start = (($this->get('page') - 1) * $limit);
            $data = $this->layanan->getListDataLayananSearch($limit, $start, $search);
        endif;

        $data['page'] = (int)$this->get('page');
        $data['limit'] = $limit;

        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK);
        endif;
    }

    function simpan_layanan_post()
    {
        $id_parent = safe_post('id_parent');

        if ($id_parent !== '') :
            // generate child
            $kode = $this->masterdata->getNextCode('sm_layanan', $id_parent, 4);
        else :
            // generate parent
            $kode = $this->masterdata->generateParentCode('sm_layanan');
            $id_parent = NULL;
        endif;

        if ($this->get('id')) :
            $data = [
                'id'     => $this->get('id'),
                'nama'   => safe_post('nama_layanan'),
                'test_group' => safe_post('test_group'),
                'test_code' => safe_post('test_code'),
                'icd_ix' => safe_post('icd_ix'),
            ];
            $id = $this->layanan->updateDataLayanan($data);
            $message = [
                'id'     => $id,
                'status' => true,
                'token'  => $this->security->get_csrf_hash()
            ];
            $this->set_response($message, REST_Controller::HTTP_CREATED);
        else :
            $data = [
                'nama' => safe_post('nama_layanan'),
                'id_parent' => $id_parent,
                'kode' => $kode,
                'test_group' => safe_post('test_group'),
                'test_code' => safe_post('test_code'),
                'icd_ix' => safe_post('icd_ix'),
                'id_jenis_pemeriksaan' => (safe_post('id_jenis_pemeriksaan') !== '') ? safe_post('id_jenis_pemeriksaan') : NULL,
            ];
            $this->layanan->simpanDataLayanan($data);
            $message = [
                'status' => true,
                'token'  => $this->security->get_csrf_hash()
            ];
            $this->set_response($message, REST_Controller::HTTP_CREATED);
        endif;
    }

    function get_layanan_get()
    {
        if (!$this->get('id')) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
        endif;

        $data['data'] = $this->layanan->getDataLayananById($this->get('id'));
        $data['page'] = 1;
        $data['limit'] = $this->limit;

        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK);
        endif;
    }

    function delete_layanan_delete()
    {
        $data = $this->layanan->deleteDataLayanan($this->get('id'));
        $this->response($data, REST_Controller::HTTP_NO_CONTENT);
    }
}
