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
class Module extends REST_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->limit = 10;
        $this->load->model('Module_model', 'module');

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

    function get_module_get()
    {
        if (!$this->get('id', true)) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
        endif;

        $data['data'] = $this->module->getDataModuleById($this->get('id', true));
        $data['page'] = 1;
        $data['limit'] = $this->limit;
        
        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK); // (200) 
        endif;
    }

    function get_list_module_get()
    {
        if (!$this->get('page')) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
        endif;

        $start          = ($this->get('page') - 1) * $this->limit;
        $search         = [
            'keyword' => $this->get('keyword')
        ];
        
        $data           = $this->module->getListDataModule($start, $this->limit, $search);
        $data['page']   = (int)$this->get('page');
        $data['limit']  = $this->limit;

        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK); // (200) 
        endif;
    }

    function delete_module_delete()
    {
        $id = $this->get('id', true);
        if($id <= 0) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
        endif;

        $this->module->deleteModule($id);
        $message = [
            'message' => 'Data telah berhasil terhapus'
        ];
        $this->set_response($message, REST_Controller::HTTP_NO_CONTENT); // (204)
    }

    function simpan_module_post()
    {
        if ($this->get('id')) :
            $data = [
                'id'         => $this->get('id'),
                'nama'       => safe_post('nama'),
                'keterangan' => safe_post('keterangan'),
                'icon'       => safe_post('icon'),
                'sort'       => safe_post('sort')
            ];
            $id = $this->module->updateData($data);
        else :
            $this->form_validation->set_rules('nama', 'Nama', 'required');
            $this->form_validation->set_rules('icon', 'Icon', 'required');
            $this->form_validation->set_rules('sort', 'sort', 'required');

            if ($this->form_validation->run() == true) :
                $data = [
                    'nama'       => safe_post('nama'),
                    'keterangan' => safe_post('keterangan'),
                    'icon'       => safe_post('icon'),
                    'sort'       => safe_post('sort')
                ];
                $id = $this->module->simpanData($data);
            endif;
        endif;
        $message = [
            'id'     => $id,
            'status' => true,
            'token'  => $this->security->get_csrf_hash()
        ];
        $this->set_response($message, REST_Controller::HTTP_CREATED);             
    }

    function module_auto_get()
    {
        
        $q = $this->get('q');
        $start = $this->start($this->get('page'));
        $data = $this->module->getAutoModule($q, $start, $this->limit);
        if (($this->get('page') == 1) & ($q == '')) {
            $choice[] = array('id' => '', 'nama' => ' ');
            $data['data'] = array_merge($choice, $data['data']);
            $data['total'] += 1;
        }
        if ($data) {
            $this->response($data, REST_Controller::HTTP_OK); // OK (200) 
        } else {
            $this->response([
                'status' => FALSE,
                'message' => 'Data tidak ditemukan'
            ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) 
        }
    }
}
