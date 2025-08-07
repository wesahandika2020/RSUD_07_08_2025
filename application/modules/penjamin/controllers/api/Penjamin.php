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
class Penjamin extends REST_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->limit = 10;
        $this->load->model('Penjamin_model', 'penjamin');
        $this->load->model('Masterdata_model', 'masterdata');

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

    function get_list_penjamin_get()
    {
        if (!$this->get('page')) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
        endif;

        $search = array(
            'search' => safe_get('search'),
            'nama' => safe_get('nama')
        );

        $start = $this->start($this->get('page'));
        $data = $this->penjamin->getListDataPenjamin($this->limit, $start, $search);
        $data['page'] = (int) $this->get('page');
        $data['limit'] = $this->limit;

        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK);
        endif;
    }

    private function _validasi()
    {
        $this->load->library('form_validation');
        $this->config->set_item('language', 'indonesia');

        $this->form_validation->set_rules('nama', 'nama penjamin', 'trim');
        $this->form_validation->set_rules('reimbuse', 'reimbuse', 'trim|required|less_than_equal_to[100]');
        $this->form_validation->set_rules('reimbuse_barang', 'reimbuse barang', 'trim|required|less_than_equal_to[100]');

        if ($this->form_validation->run()) return TRUE;

        $data                = $error                = array();
        $data['error_class'] = $data['error_string'] = array();
        $data['status']      = TRUE;

        if (form_error('nama')) $error[] = 'nama';
        if (form_error('reimbuse')) $error[] = 'reimbuse';
        if (form_error('reimbuse_barang')) $error[] = 'reimbuse_barang';

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

    function simpan_penjamin_post()
    {
        $this->_validasi();

        $data = [
            'kode'              => safe_post('kode'),
            'nama'              => safe_post('nama'),
            'diskon'            => safe_post('reimbuse'),
            'diskon_barang'     => safe_post('reimbuse_barang'),
            'id_jenis_penjamin' => safe_post('jenis_penjamin'),
            'kode_rekening'     => safe_post('kode_rekening'),
            'is_active'         => 1,
        ];

        // var_dump($data); die;

        if (!$this->get('id')) :
            $this->penjamin->simpanDataPenjamin($data);
            $message = [
                'status' => TRUE,
                'token'  => $this->security->get_csrf_hash()
            ];
            $this->set_response($message, REST_Controller::HTTP_CREATED);
        else :
            $id = $this->penjamin->updateDataPenjamin($data, $this->get('id'));
            $message = [
                'id'     => $id,
                'status' => true,
                'token'  => $this->security->get_csrf_hash()
            ];
            $this->set_response($message, REST_Controller::HTTP_CREATED);
        endif;
    }

    function get_penjamin_get()
    {
        if (!$this->get('id')) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
        endif;

        $data['data']  = $this->penjamin->getDataPenjaminById($this->get('id'));
        $data['page']  = 1;
        $data['limit'] = $this->limit;
        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK);
        endif;
    }

    function delete_penjamin_delete()
    {
        $data = $this->penjamin->deleteDataPenjamin($this->get('id'));
        $this->set_response($data, REST_Controller::HTTP_NO_CONTENT);
    }

    function update_status_post()
    {
        if (!safe_post('id')) {
            die(json_encode(['status' => false, 'message' => 'Parameter tidak lengkap.']));
        }
        $param = [
            'id' => safe_post('id'),
            'status' => safe_post('status')
        ];
        $data = $this->penjamin->updateStatus($param);
        if ($data) {
            $this->response(['status' => true, 'message' => 'Berhasil mengubah status.'], REST_Controller::HTTP_OK);
        } else {
            $this->response(['status' => false, 'message' => 'Gagal mengubah status.'], REST_Controller::HTTP_OK);
        }
    }
}
