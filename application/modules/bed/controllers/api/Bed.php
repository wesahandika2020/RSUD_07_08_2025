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
class Bed extends REST_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->limit = 10;
        $this->load->model('Bed_model', 'bed');

        $id_translucent = $this->session->userdata('id_translucent');
        if (empty($id_translucent)) :
            $this->response(array('error' => 'Anda belum login'), REST_Controller::HTTP_UNAUTHORIZED);
            exit();
        endif;
    }

    function get_bed_get()
    {
        if (!$this->get('id', true)) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
        endif;

        $data['data'] = $this->bed->getDataBedById($this->get('id', true));
        $data['page'] = 1;
        $data['limit'] = $this->limit;

        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK); // (200)
        endif;
    }

    function get_list_bed_get()
    {
        if (!$this->get('page')) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
        endif;

        $start          = ($this->get('page') - 1) * $this->limit;
        $search         = [
            'keyword' => $this->get('keyword')
        ];

        $data           = $this->bed->getListDataBed($start, $this->limit, $search);
        $data['page']   = (int) $this->get('page');
        $data['limit']  = $this->limit;

        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK); // (200)
        endif;
    }

    function get_summary_bed_get()
    {
        if (!$this->get('page_sum')) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
        endif;

        $start          = ($this->get('page_sum') - 1) * $this->limit;
        // $search         = [
        //     'keyword' => $this->get('keyword')
        // ];

        $data           = $this->bed->getDataSummaryBed($this->limit, $start);
        $data['page_sum']   = (int) $this->get('page_sum');
        $data['limit']  = $this->limit;

        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK); // (200)
        endif;
    }

    function delete_bed_delete()
    {
        $id = $this->get('id', true);
        if ($id <= 0) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
        endif;

        $this->bed->deleteDataBed($id);
        $message = [
            'message' => 'Data telah berhasil terhapus'
        ];
        $this->set_response($message, REST_Controller::HTTP_NO_CONTENT); // (204)
    }

    private function _validasi()
    {
        $this->load->library('form_validation');
        $this->config->set_item('language', 'indonesia');

        $this->form_validation->set_rules('kamar', 'kamar', 'trim|required');
        if (!$this->post('id')) :
            $this->form_validation->set_rules('jumlah_bed', 'jumlah bed', 'trim|required');
        endif;

        if ($this->form_validation->run()) return TRUE;

        $data                = $error                = array();
        $data['error_class'] = $data['error_string'] = array();
        $data['status']      = TRUE;

        if (form_error('kamar')) $error[] = 'kamar';
        if (form_error('jumlah_bed')) $error[] = 'jumlah_bed';

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

    function simpan_bed_post()
    {
        $this->_validasi();

        $add = array(
            "id_ruang" => safe_post("kamar"),
            "no_bed" => safe_post("no_bed"),
            "keterangan" => safe_post("status_bed"),
            "penghuni" => safe_post("penghuni") !== "" ? safe_post("penghuni") : NULL,
            "out_of_service" => safe_post("out_of_service"),
            "out_of_capacity" => safe_post("out_of_capacity"),
            "icu_bedah" => safe_post("icu_bedah") === "Ya" ? "1" : "0"
        );
        if ($add["keterangan"] === "Tersedia") :
            $add["penghuni"] = NULL;
        endif;
        $jumlah_bed = safe_post("jumlah_bed");
        $id = $this->bed->updateDataBed($add, $jumlah_bed);
        $message = array("id" => $id, "status" => true, "token" => $this->security->get_csrf_hash());
        $this->response($message, REST_Controller::HTTP_OK);
    }

    function get_no_bed_get($id_ruang = NULL)
    {
        if ($id_ruang !== NULL) :
            $data["no_bed"] = $this->bed->getNoBed($id_ruang);
            $this->response($data, REST_Controller::HTTP_OK);
        else :
            $this->response(NULL, REST_Controller::HTTP_OK);
        endif;
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
        $data = $this->bed->updateStatus($param);
        if ($data) {
            $this->response(['status' => true, 'message' => 'Berhasil mengubah status.'], REST_Controller::HTTP_OK);
        } else {
            $this->response(['status' => false, 'message' => 'Gagal mengubah status.'], REST_Controller::HTTP_OK);
        }
    }
}
