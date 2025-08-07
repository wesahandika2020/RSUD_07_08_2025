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
class Account extends REST_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->limit = 10;
        $this->load->model('Account_model', 'account');

        $id_translucent = $this->session->userdata('id_translucent');
        if (empty($id_translucent)) :
            $this->response(array('error' => 'Anda belum login'), REST_Controller::HTTP_UNAUTHORIZED);
            exit();
        endif;
    }

    function account_similarity_check_get()
    {
        $account = safe_get('account');

        if ($account !== '') {
            $similar =  $this->account->accountSimilarityCheck($account);
        } else {
            $similar = false;
        }

        $response = array(
            'similar' => $similar
        );
        $this->response($response, 200);
    }

    private function _validasi()
    {
        $this->load->library('form_validation');
        $this->config->set_item('language', 'indonesia');

        $this->form_validation->set_rules('pegawai', 'nama pegawai', 'trim|required');
        $this->form_validation->set_rules('account', 'username', 'trim|required');
        $this->form_validation->set_rules('account_group', 'account group', 'trim|required');

        if ($this->form_validation->run()) return TRUE;

        $data                = $error                = array();
        $data['error_class'] = $data['error_string'] = array();
        $data['status']      = TRUE;

        if (form_error('pegawai')) $error[] = 'pegawai';
        if (form_error('account')) $error[] = 'account';
        if (form_error('account_group')) $error[] = 'account_group';

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

    function simpan_account_post()
    {
        $this->_validasi();

        $message = '';
        if (!$this->get('id')) :
            $id = safe_post('pegawai');
            $tipe = 'insert';
            $message = 'Berhasil menambahkan account';
        else :
            $id = $this->get('id');
            $tipe = 'update';
            $message = 'Berhasil mengubah account';
        endif;

        $data = [
            'id'               => $id,
            'id_account_group' => safe_post('account_group'),
            'account'          => safe_post('account'),
            'key'              => convert_hash(safe_post('key')),
            'id_unit'          => (safe_post('unit') !== '') ? safe_post('unit') : NULL
        ];

        if (!$this->get('id')) :
            $similar = $this->account->accountSimilarityCheck($data['account']);
            if (!$similar) :
                $id = $this->account->updateDataAccount($data, $tipe);
            else :
                $id = null;
                $message = 'Gagal menambahkan data, username sudah dipakai';
                $token = $this->security->get_csrf_hash();
            endif;
        else :
            $id = $this->account->updateDataAccount($data, $tipe);
        endif;

        $message = array(
            'id'      => sha1($id),
            'message' => $message,
            'status'  => true,
            'token'   => $this->security->get_csrf_hash()
        );

        $this->response($message, REST_Controller::HTTP_OK);
    }

    function get_list_account_get()
    {
        if (!$this->get('page')) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
        endif;

        $start          = ($this->get('page') - 1) * $this->limit;
        $search         = [
            'keyword' => $this->get('keyword')
        ];

        $data           = $this->account->getListDataAccount($start, $this->limit, $search);
        $data['page']   = (int) $this->get('page');
        $data['limit']  = $this->limit;

        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK); // (200) 
        endif;
    }

    function get_account_get()
    {
        if (!$this->get('id')) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
        endif;

        $data['data'] = $this->account->getDataAccountById($this->get('id', true));
        $data['page'] = 1;
        $data['limit'] = $this->limit;

        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK); // (200) 
        endif;
    }

    function delete_account_delete()
    {
        $id = $this->get('id', true);
        if ($id <= 0) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
        endif;

        $this->account->deleteAccount($id);
        $message = [
            'message' => 'Data telah berhasil terhapus'
        ];
        $this->set_response($message, REST_Controller::HTTP_NO_CONTENT); // (204)
    }
    
    function reset_key_get()
    {
        $id = $this->get('id', true);
        if ($id <= 0) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
        endif;

        $this->account->resetKeyAccount($id);
        $message = [
            'message' => 'Data telah berhasil direset'
        ];
        $this->set_response($message, REST_Controller::HTTP_NO_CONTENT); // (204)
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
		$data = $this->account->updateStatus($param);
		if ($data) {
            $this->response(['status' => true, 'message' => 'Berhasil mengubah status.'], REST_Controller::HTTP_OK);
		} else {
            $this->response(['status' => false, 'message' => 'Gagal mengubah status.'], REST_Controller::HTTP_OK);
		}
    }
}
