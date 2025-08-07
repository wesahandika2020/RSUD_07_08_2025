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
class Rekening extends REST_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->limit = 10;
        $this->load->model('Rekening_model', 'rekening');

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

    function get_list_rekening_get()
    {
        if (!$this->get('page')) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
        endif;

        $search = array(
            'pencarian' => safe_get('pencarian'),
            'nama' => safe_get('nama')
        );

        $start         = $this->start($this->get('page'));
        $data          = $this->rekening->getListDataRekening($this->limit, $start, $search);
        $data['page']  = (int)$this->get('page');
        $data['limit'] = $this->limit;

        if ($data):
            $this->response($data, REST_Controller::HTTP_OK);
        endif;
    }

    function get_all_list_rekening_get()
    {
        if (!$this->get('page')) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
        endif;

        $search = array(
            'kode' => safe_get('kode'),
            'nama' => safe_get('rekening')
        );

        $start         = $this->start($this->get('page'));
        $data          = $this->rekening->getAllListDataRekening($this->limit, $start, $search);
        $data['page']  = (int) $this->get('page');
        $data['limit'] = $this->limit;

        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK);
        endif;
    }

    private function _validasi()
    {
        $this->load->library('form_validation');
        $this->config->set_item('language', 'indonesia');

        $this->form_validation->set_rules('kode', 'kode', 'trim|required');
        $this->form_validation->set_rules('rekening', 'nama rekening', 'trim|required');

        if ($this->form_validation->run()) return TRUE;

        $data                = $error                = array();
        $data['error_class'] = $data['error_string'] = array();
        $data['status']      = TRUE;

        if (form_error('kode')) $error[]     = 'kode';
        if (form_error('rekening')) $error[] = 'rekening';

        if ($error) :
            foreach ($error as $row) :
                // $data['error_class'][$row] = 'is-invalid';
                // $data['error_class_feedback'][$row] = 'invalid-feedback';
                $data['error_string'][$row] = form_error($row);
            endforeach;

            $data['status'] = FALSE;
            $data['token'] = $this->security->get_csrf_hash();
            echo json_encode($data);
            exit();
        endif;
    }

    function simpan_rekening_post()
    {
        $this->_validasi();
        $id_parent = safe_post('id_parent');

        if ($id_parent !== '') :
            $kode = safe_post('kode');
        else :
            $kode = safe_post('kode');
            $id_parent = NULL;
        endif;

        if ($this->get('id')) :
            $data = [
                'id_parent' => $id_parent,
                'kode'      => $kode,
                'nama'      => safe_post('rekening'),
            ];
            $id = $this->rekening->updateData($data, $this->get('id'));
            $message = [
                'id'     => $id,
                'status' => true,
                'token'  => $this->security->get_csrf_hash()
            ];
            $this->set_response($message, REST_Controller::HTTP_CREATED);
        else :
            $data = [
                'id_parent' => $id_parent,
                'kode'      => $kode,
                'nama'      => safe_post('rekening'),
                'is_cash'   => 0,
                'is_active' => 1,
            ];
            $this->rekening->simpanData($data);
            $message = [
                'status' => true,
                'token'  => $this->security->get_csrf_hash()
            ];
            $this->set_response($message, REST_Controller::HTTP_CREATED);
        endif;
    }

    function delete_rekening_delete()
    {
        $data = $this->rekening->deleteDataRekening($this->get('id'));
        $this->set_response($data, REST_Controller::HTTP_NO_CONTENT);
    }

    function get_rekening_get()
    {
        if (!$this->get('id')) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
        endif;

        $data['data'] = $this->rekening->getDataRekeningById($this->get('id'));
        $data['page'] = 1;
        $data['limit'] = $this->limit;

        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK);
        endif;
    }

    function aktifasi_rekening_get()
    {
        $params = array(
            'id' => $this->get('id'),
            'is_active' => $this->get('status'),
        );

        $this->rekening->aktifasiDataRekening($params);
        $this->response(['status' => TRUE], REST_Controller::HTTP_OK);
    }
}
