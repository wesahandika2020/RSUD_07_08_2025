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
class Barang extends REST_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->limit = 10;
        $this->load->model('Barang_model', 'barang');

        $id_translucent = $this->session->userdata('id_translucent');
        if (empty($id_translucent)) :
            $this->response(array('error' => 'Anda belum login'), REST_Controller::HTTP_UNAUTHORIZED);
            exit();
        endif;
    }

    private function start($page)
    {
        return ($page - 1) * $this->limit;
    }

    function simpan_barang_post() {
        $data = $this->barang->simpanDataBarang();
        $this->response($data, REST_Controller::HTTP_OK);
    }

    function hapus_barang_delete()
    {
        $data = $this->barang->deleteDataBarang($this->get("id"));
        $this->response($data, REST_Controller::HTTP_NO_CONTENT);
    }

    function get_barang_with_id_get()
    {
        if (!$this->get("id")) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
        endif;

        $data["data"] = $this->barang->getDataBarangById($this->get("id"));
        $data["page"] = 1;
        $data["limit"] = $this->limit;
        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK);
        else :
            $this->response(array("error" => "Data tidak ditemukan."), REST_Controller::HTTP_NOT_FOUND);
        endif;
    }

    function aktivasi_barang_get()
    {
        $param = array("id" => $this->get("id"), "value" => $this->get("status"));
        $data = $this->barang->aktivatingBarang($param);
        $this->response($data, REST_Controller::HTTP_OK);
    }

    function get_alokasi_barang_unit_get()
    {
        $data = $this->barang->getDataAlokasiBarangUnit($this->get("id_barang"));
        $this->response($data, REST_Controller::HTTP_OK);
    }

    function simpan_alokasi_barang_unit_post()
    {
        $data = $this->barang->simpanDataAlokasiBarangUnit();
        $this->response($data, REST_Controller::HTTP_OK);
    }

    function get_list_barang_unit_get()
    {
        if (!$this->get("page")) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
        endif;
        $search = array("keywords" => safe_get("keyword"), "id_unit" => safe_get("id_unit"));
        $start = $this->start($this->get("page"));
        $data = $this->barang->getListDataBarangUnit($this->limit, $start, $search);
        $data["page"] = (int) $this->get("page");
        $data["limit"] = $this->limit;
        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK);
        else :
            $this->response(array("error" => "Data tidak ditemukan"), REST_Controller::HTTP_NOT_FOUND);
        endif;
    }

    function simpan_barang_unit_post()
    {
        $data = $this->barang->simpanBarangUnit();
        $this->response($data, REST_Controller::HTTP_OK);
    }

    function hapus_barang_unit_delete()
    {
        $data = $this->db->delete("sm_barang_unit", array("id" => $this->get("id")));
        $this->response($data, REST_Controller::HTTP_NO_CONTENT);
    }

    function get_kemasan_barang_get()
    {
        $data["id"] = safe_get("id");
        $data["kemasan"] = safe_get("kemasan");
        if ($data['id'] !== '') {
            $data = $this->barang->kemasanLoadData($data)->result();
        } else {
            $data = NULL;
        }
        exit(json_encode($data));
    }

    function get_ed_barang_get()
    {
        $id_barang = safe_get('id_barang');
        if ($id_barang !== '') {
            $data = $this->barang->getEdBarang($id_barang)->result();
        } else {
            $data = NULL;
        }
        echo json_encode($data);
    }
}