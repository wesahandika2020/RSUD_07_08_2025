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
class Menu extends REST_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->limit = 10;
        $this->load->model('Menu_model', 'menu');

        $id_translucent = $this->session->userdata('id_translucent');
        if (empty($id_translucent)) :
            $this->response(array('error' => 'Anda belum login'), REST_Controller::HTTP_UNAUTHORIZED);
            exit();
        endif;
    }

    function get_menu_get()
    {
        if (!$this->get('id', true)) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
        endif;

        $data['data'] = $this->menu->getDataMenuById($this->get('id', true));
        $data['page'] = 1;
        $data['limit'] = $this->limit;

        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK); // (200) 
        endif;
    }

    function get_list_menu_get()
    {
        if (!$this->get('page')) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
        endif;

        $start          = ($this->get('page') - 1) * $this->limit;
        $search         = [
            'keyword' => $this->get('keyword')
        ];

        $data           = $this->menu->getListDataMenu($start, $this->limit, $search);
        $data['page']   = (int) $this->get('page');
        $data['limit']  = $this->limit;

        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK); // (200) 
        endif;
    }

    function delete_menu_delete()
    {
        $id = $this->get('id', true);
        if ($id <= 0) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
        endif;

        $this->menu->deleteMenu($id);
        $message = [
            'message' => 'Data telah berhasil terhapus'
        ];
        $this->set_response($message, REST_Controller::HTTP_NO_CONTENT); // (204)
    }

    function simpan_menu_post()
    {
        if ($this->get('id')) :
            $data = [
                'id'        => $this->get('id'),
                'id_module' => safe_post('id_module'),
                'nama'      => safe_post('nama'),
                'url'       => safe_post('url'),
                'sort'      => safe_post('sort'),
                'active'    => safe_post('active')
            ];
            $id = $this->menu->updateData($data);
        else :
            $this->form_validation->set_rules('nama', 'Nama', 'required');
            $this->form_validation->set_rules('url', 'Url', 'required');
            $this->form_validation->set_rules('sort', 'sort', 'required');

            if ($this->form_validation->run() == true) :
                $data = [
                    'id_module' => safe_post('id_module'),
                    'nama'      => safe_post('nama'),
                    'url'       => safe_post('url'),
                    'sort'      => safe_post('sort'),
                    'active'    => safe_post('active')
                ];
                $id = $this->menu->simpanData($data);
            endif;
        endif;
        $message = [
            'id'     => $id,
            'status' => true,
            'token'  => $this->security->get_csrf_hash()
        ];
        $this->set_response($message, REST_Controller::HTTP_CREATED);
    }
}
