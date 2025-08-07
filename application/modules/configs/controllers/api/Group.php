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
class Group extends REST_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->limit = 10;
        $this->load->model('Group_model', 'group');

        $id_translucent = $this->session->userdata('id_translucent');
        if (empty($id_translucent)) :
            $this->response(array('error' => 'Anda belum login'), REST_Controller::HTTP_UNAUTHORIZED);
            exit();
        endif;
    }

    function get_group_get()
    {
        if (!$this->get('id', true)) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
        endif;

        $data['data'] = $this->group->getDataAccountGroupById($this->get('id', true));
        $data['page'] = 1;
        $data['limit'] = $this->limit;

        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK); // (200) 
        endif;
    }

    function get_list_group_get()
    {
        if (!$this->get('page')) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
        endif;

        $start          = ($this->get('page') - 1) * $this->limit;
        $search         = [
            'keyword' => $this->get('keyword')
        ];

        $data           = $this->group->getListDataAccountGroup($start, $this->limit, $search);
        $data['page']   = (int) $this->get('page');
        $data['limit']  = $this->limit;

        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK); // (200) 
        endif;
    }

    function simpan_group_post()
    {
        if ($this->get('id')) :
            $data = [
                'id'         => $this->get('id'),
                'name'       => safe_post('nama')
            ];
            $id = $this->group->updateData($data);
        else :
            $this->form_validation->set_rules('nama', 'Nama', 'required');

            if ($this->form_validation->run() == true) :
                $data = [
                    'name'       => safe_post('nama'),
                ];
                $id = $this->group->simpanData($data);
            endif;
        endif;
        $message = [
            'id'     => $id,
            'status' => true,
            'token'  => $this->security->get_csrf_hash()
        ];
        $this->set_response($message, REST_Controller::HTTP_CREATED);
    }

    function delete_group_delete()
    {
        $id = $this->get('id', true);
        if ($id <= 0) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
        endif;

        $this->group->deleteAccountGroup($id);
        $message = [
            'message' => 'Data telah berhasil terhapus'
        ];
        $this->set_response($message, REST_Controller::HTTP_NO_CONTENT); // (204)
    }

    function setting_privileges_get()
    {
        if (!$this->get('id')) {
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // BAD_REQUEST (400)
        }
        $id = $this->get('id');
        $data = $this->group->getDataPrivileges($id);
        if ($data) {
            $this->response($data, REST_Controller::HTTP_OK); // OK (200) 
        } else {
            $this->response([
                'status' => FALSE,
                'message' => 'No data were found'
            ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) 
        }
    }

    function simpan_privileges_post()
    {
        $data = [
            'id_account_group' => $this->get('id'),
            'group'            => $this->post('data')
        ];

        $data = $this->group->updateDataPrivileges($data);
        $this->set_response($data, REST_Controller::HTTP_CREATED); // CREATED (201)
    }

}
