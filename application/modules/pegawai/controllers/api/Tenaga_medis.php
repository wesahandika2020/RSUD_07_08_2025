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
class Tenaga_medis extends REST_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->limit = 10;
        $this->load->model('Tenaga_medis_model', 'nadis');

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

    function get_list_tenaga_medis_get()
    {
        if (!$this->get('page')) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
        endif;

        $start          = ($this->get('page') - 1) * $this->limit;
        $search         = [
            'keyword' => $this->get('keyword')
        ];

        $data           = $this->nadis->getListDataTenagaMedis($start, $this->limit, $search);
        $data['page']   = (int) $this->get('page');
        $data['limit']  = $this->limit;

        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK); // (200)
        endif;
    }

    private function _validasi()
    {
        $this->load->library('form_validation');
        $this->config->set_item('language', 'indonesia');

        $this->form_validation->set_rules('pegawai', 'nama pegawai', 'trim|required');
        $this->form_validation->set_rules('profesi', 'profesi', 'trim|required');
        $this->form_validation->set_rules('tgl_mulai_praktek', 'tanggal mulai praktek', 'trim|required');

        if ($this->form_validation->run()) return TRUE;

        $data                = $error                = array();
        $data['error_class'] = $data['error_string'] = array();
        $data['status']      = TRUE;

        if (form_error('pegawai')) $error[] = 'pegawai';
        if (form_error('profesi')) $error[] = 'profesi';
        if (form_error('tgl_mulai_praktek')) $error[] = 'tgl_mulai_praktek';

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

    function simpan_tenaga_medis_post()
    {
        $this->_validasi();

        $data = [
            'id_pegawai'        => safe_post('pegawai'),
            'no_str'            => safe_post('no_str'),
            'ed_no_str'         => (safe_post('ed_no_str') !== '') ? date2mysql(safe_post('ed_no_str')) : NULL,
            'no_sip'            => safe_post('no_sip'),
            'ed_no_sip'         => (safe_post('ed_no_sip') !== '') ? date2mysql(safe_post('ed_no_sip')) : NULL,
            'no_sik'            => safe_post('no_sik'),
            'ed_no_sik'         => (safe_post('ed_no_sik') !== '') ? date2mysql(safe_post('ed_no_sik')) : NULL,
            'id_spesialisasi'   => (safe_post('spesialisasi') !== '') ? safe_post('spesialisasi') : NULL,
            'tgl_mulai_praktek' => (safe_post('tgl_mulai_praktek') !== '') ? date2mysql(safe_post('tgl_mulai_praktek')) : NULL,
            'id_profesi'        => safe_post('profesi'),
            'kode_bpjs'         => safe_post('kode_bpjs')
        ];

        // echo json_encode($data); die;

        if (!$this->get('id')) :
            $this->nadis->simpanDataTenagaMedis($data);
            $message = [
                'status' => TRUE,
                'token'  => $this->security->get_csrf_hash()
            ];
            $this->set_response($message, REST_Controller::HTTP_CREATED);
        else :
            $id = $this->nadis->updateDataTenagaMedis($data, $this->get('id'));
            $message = [
                'id'     => $id,
                'status' => true,
                'token'  => $this->security->get_csrf_hash()
            ];
            $this->set_response($message, REST_Controller::HTTP_CREATED);
        endif;
    }

    function get_tenaga_medis_get()
    {
        if (!$this->get('id')) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
        endif;

        $data['data'] = $this->nadis->getTenagaMedisById($this->get('id'));
        $data['page'] = 1;
        $data['limit'] = $this->limit;
        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK); // 200 being the HTTP response code
        endif;
    }

    function delete_tenaga_medis_delete()
    {
        $id = $this->get('id', true);
        if ($id <= 0) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
        endif;

        $this->nadis->deleteDataTenagaMedis($id);
        $message = [
            'message' => 'Data telah berhasil terhapus'
        ];
        $this->set_response($message, REST_Controller::HTTP_NO_CONTENT); // (204)
    }
}
