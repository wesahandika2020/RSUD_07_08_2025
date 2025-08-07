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
class KotaKabupaten extends REST_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->limit = 10;
        $this->load->model('Kota_kabupaten_model', 'kotakabupaten');

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

    function get_kota_kabupaten_get()
    {
        if (!$this->get('id', true)) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
        endif;

        $data['data'] = $this->kotakabupaten->getDataKotaKabupatenById($this->get('id', true));
        $data['page'] = 1;
        $data['limit'] = $this->limit;

        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK); // (200)
        endif;
    }

    function get_list_kota_kabupaten_get()
    {
        if (!$this->get('page')) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
        endif;

        $start          = ($this->get('page') - 1) * $this->limit;
        $search         = [
            'keyword' => $this->get('keyword')
        ];

        $data           = $this->kotakabupaten->getListDataKotaKabupaten($start, $this->limit, $search);
        $data['page']   = (int) $this->get('page');
        $data['limit']  = $this->limit;

        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK); // (200)
        endif;
    }

    function delete_kota_kabupaten_delete()
    {
        $id = $this->get('id', true);
        if ($id <= 0) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
        endif;

        $this->kotakabupaten->deleteKotaKabupaten($id);
        $message = [
            'message' => 'Data telah berhasil terhapus'
        ];
        $this->set_response($message, REST_Controller::HTTP_NO_CONTENT); // (204)
    }

    function simpan_kota_kabupaten_post()
    {
        if ($this->get('id')) :
            $data = [
                'id'          => $this->get('id'),
                'id_provinsi' => safe_post('id_provinsi'),
                'nama'        => safe_post('nama_kota_kabupaten'),
            ];
            $id = $this->kotakabupaten->updateData($data);
            $message = [
                'id'     => $id,
                'status' => true,
                'token'  => $this->security->get_csrf_hash()
            ];
            $this->set_response($message, REST_Controller::HTTP_CREATED);
        else :
            $this->form_validation->set_rules('id_provinsi', 'Provinsi', 'required');
            $this->form_validation->set_rules('nama_kota_kabupaten', 'Nama', 'required');

            if ($this->form_validation->run() == true) :
                $data = [
                    'id_provinsi' => safe_post('id_provinsi'),
                    'nama'        => safe_post('nama_kota_kabupaten')
                ];
                $this->kotakabupaten->simpanData($data);
            endif;
            $message = [
                'status' => true,
                'token'  => $this->security->get_csrf_hash()
            ];
            $this->set_response($message, REST_Controller::HTTP_CREATED);
        endif;
    }
}
