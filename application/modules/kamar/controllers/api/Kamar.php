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
class Kamar extends REST_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->limit = 10;
        $this->load->model('Kamar_model', 'kamar');

        $id_translucent = $this->session->userdata('id_translucent');
        if (empty($id_translucent)) :
            $this->response(array('error' => 'Anda belum login'), REST_Controller::HTTP_UNAUTHORIZED);
            exit();
        endif;
    }

    function get_kamar_get()
    {
        if (!$this->get('id', true)) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
        endif;

        $data['data'] = $this->kamar->getDataKamarById($this->get('id', true));
        $data['page'] = 1;
        $data['limit'] = $this->limit;

        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK); // (200)
        endif;
    }

    function get_list_kamar_get()
    {
        if (!$this->get('page')) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
        endif;

        $start          = ($this->get('page') - 1) * $this->limit;
        $search         = [
            'keyword' => $this->get('keyword')
        ];

        $data           = $this->kamar->getListDataKamar($start, $this->limit, $search);
        $data['page']   = (int) $this->get('page');
        $data['limit']  = $this->limit;

        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK); // (200)
        endif;
    }

    function delete_kamar_delete()
    {
        $id = $this->get('id', true);
        if ($id <= 0) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
        endif;

        $this->kamar->deleteDataKamar($id);
        $message = [
            'message' => 'Data telah berhasil terhapus'
        ];
        $this->set_response($message, REST_Controller::HTTP_NO_CONTENT); // (204)
    }

    private function _validasi()
    {
        $this->load->library('form_validation');
        $this->config->set_item('language', 'indonesia');

        $this->form_validation->set_rules('bangsal', 'bangsal', 'trim|required');
        if ($this->post('id') == NULL) :
            $this->form_validation->set_rules('jumlah_kamar', 'jumlah kamar', 'trim|required');
        endif;

        if ($this->form_validation->run()) return TRUE;

        $data                = $error                = array();
        $data['error_class'] = $data['error_string'] = array();
        $data['status']      = TRUE;

        if (form_error('bangsal')) $error[] = 'bangsal';
        if (form_error('jumlah_kamar')) $error[] = 'jumlah_kamar';

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

    function simpan_kamar_post()
    {
        $this->_validasi();

        $add = array(
            "id_bangsal" => safe_post("bangsal"), 
            "id_kelas" => safe_post("kelas") !== "" ? safe_post("kelas") : NULL, 
            "id_kode_kelas" => safe_post("kode_kelas_bed") !== "" ? safe_post("kode_kelas_bed") : NULL, 
            "no_ruang" => safe_post("no_kamar"), 
            "keterangan" => safe_post("keterangan")
        );
        $jumlah_ruang = safe_post("jumlah_kamar");
        $id = $this->kamar->updateDataKamar($add, $jumlah_ruang);
        $message = array("id" => $id, "status" => true, "token" => $this->security->get_csrf_hash());
        $this->response($message, REST_Controller::HTTP_CREATED);
    }

    function get_no_kamar_get($bangsal = NULL, $kelas = NULL)
    {
        if ($bangsal !== NULL & $kelas !== NULL) :
            $data["no_kamar"] = $this->kamar->getNoKamar($bangsal, $kelas);
            $this->response($data, REST_Controller::HTTP_OK);
        else :
            $this->response(NULL, REST_Controller::HTTP_OK);
        endif;
    }
}
