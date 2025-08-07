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
class Logs extends REST_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->limit = 10;
        $this->load->model('Logs_model', 'logs');

        $id_translucent = $this->session->userdata('id_translucent');
        if (empty($id_translucent)) :
            $this->response(array('error' => 'Anda belum login'), REST_Controller::HTTP_UNAUTHORIZED);
            exit();
        endif;
    }

    function record_logs_post()
    {
        $cek_status = $this->db->get_where('sm_konfigurasi_logs', ['id' => 1])->row();
        if (0 < count((array) $cek_status) && $cek_status->status === 'On') :
            $data = array(
                "waktu"    => date("Y-m-d H:i:s"),
                "menu"     => $this->input->post("menu"),
                "status"   => $this->input->post("status"),
                "url"      => $this->input->post("url"),
                "response" => $this->input->post("response")
            );

            $this->db->insert("sm_logs", $data);
        else :
            return false;
        endif;
    }

    function hapus_logs_delete()
    {
        $data = $this->db->where('id', $this->get('id'))->delete('sm_logs');
        $this->response($this->get('id'), REST_Controller::HTTP_NO_CONTENT);
    }

    function hapus_all_logs_delete()
    {
        $data = $this->db->truncate('sm_logs');
        $this->response($data, REST_Controller::HTTP_NO_CONTENT);
    }

    function get_logs_by_id_get()
    {
        if (!$this->get('id')) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
        endif;

        $data['data'] = $this->db->where('id', $this->get('id'))->get('sm_logs')->row();
        $data['page'] = 1;
        $data['limit'] = $this->limit;

        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK);
        else :
            $this->response(array('error' => 'Data tidak ditemukan'), REST_Controller::HTTP_NOT_FOUND);
        endif;
    }

    function get_list_logs_get()
    {
        if (!$this->get('page')) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
        endif;

        $search = [
            'tanggal_awal'  => safe_get('tanggal_awal'),
            'tanggal_akhir' => safe_get('tanggal_akhir'),
            'menu'          => safe_get('menu'),
            'status'        => safe_get('status'),
        ];

        $start = ($this->get("page") - 1) * $this->limit;
        $data = $this->logs->getListDataLogs($this->limit, $start, $search);
        $data['page'] = (int) $this->get('page');
        $data['limit'] = $this->limit;

        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK);
        else :
            $this->response(array('error' => 'Data tidak ditemukan'), REST_Controller::HTTP_NOT_FOUND);
        endif;
    }

    function get_admin_logs_by_id_get()
    {
        if (!$this->get('id')) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
        endif;

        $data['data'] = $this->db->where('id', $this->get('id'))->get('sm_logs_transaction')->row();
        $data['page'] = 1;
        $data['limit'] = $this->limit;

        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK);
        else :
            $this->response(array('error' => 'Data tidak ditemukan'), REST_Controller::HTTP_NOT_FOUND);
        endif;
    }

    function get_list_admin_logs_get()
    {
        if (!$this->get('page')) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
        endif;

        $search = array(
            "tanggal_awal"  => safe_get("tanggal_awal"), 
            "tanggal_akhir" => safe_get("tanggal_akhir"), 
            "no_register"   => safe_get("no_register"), 
            "no_rm"         => safe_get("no_rm"), 
            "nama"          => safe_get("nama"), 
            "jenis_layanan" => safe_get("jenis_layanan"), 
            "keterangan"    => safe_get("keterangan"), 
            "klinik"        => safe_get("klinik"), 
            "bangsal"       => safe_get("bangsal"), 
            "jenis_igd"     => safe_get("jenis_igd"));

        $start = ($this->get("page") - 1) * $this->limit;
        $data = $this->logs->getListDataAdminLogs($this->limit, $start, $search);
        $data['page'] = (int) $this->get('page');
        $data['limit'] = $this->limit;

        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK);
        else :
            $this->response(array('error' => 'Data tidak ditemukan'), REST_Controller::HTTP_NOT_FOUND);
        endif;
    }

    function get_masterdata_logs_by_id_get()
    {
        if (!$this->get('id')) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
        endif;

        $data['data'] = $this->logs->getMastdataLogsById($this->get('id', true));
        $data['page'] = 1;
        $data['limit'] = $this->limit;

        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK);
        else :
            $this->response(array('error' => 'Data tidak ditemukan'), REST_Controller::HTTP_NOT_FOUND);
        endif;
    }

    function get_list_masterdata_logs_get()
    {
        if (!$this->get('page')) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
        endif;

        $search = array(
            "tanggal_awal"  => safe_get("tanggal_awal"),
            "tanggal_akhir" => safe_get("tanggal_akhir"),
            "masterdata"    => safe_get("masterdata"),
            "action"        => safe_get("action")
        );

        $start = ($this->get("page") - 1) * $this->limit;
        $data = $this->logs->getListDataMasterDataLogs($this->limit, $start, $search);
        $data['page'] = (int) $this->get('page');
        $data['limit'] = $this->limit;

        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK);
        else :
            $this->response(array('error' => 'Data tidak ditemukan'), REST_Controller::HTTP_NOT_FOUND);
        endif;
    }
}
