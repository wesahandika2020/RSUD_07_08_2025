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
class Barang_rumah_tangga extends REST_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->limit = 10;
        $this->load->model('Barang_rumah_tangga_model', 'barang_rumah_tangga');

        $id_translucent = $this->session->userdata('id_translucent');
        if (empty($id_translucent)) :
            $this->response(array('error' => 'Anda belum login'), REST_Controller::HTTP_UNAUTHORIZED);
            exit();
        endif;
    }

    function get_list_barang_get()
    {
        if (!$this->get('page')) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
        endif;

        $start  = ($this->get('page') - 1) * $this->limit;
        $search = [
            'id'              => $this->get('id', true),
            'kategori_barang' => safe_get('kategori_barang'),
            'nama'            => safe_get('nama'),
            'sediaan'         => safe_get('sediaan'),
            'jenis_kategori'  => 'Rumah Tangga',
            'pencarian'       => $this->get('pencarian', true)
        ];

        $data          = $this->barang_rumah_tangga->getListData($start, $this->limit, $search);
        $data['page']  = (int) $this->get('page');
        $data['limit'] = $this->limit;

        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK); // (200)
        else :
            $this->response('Data tidak ditemukan.', REST_Controller::HTTP_NOT_FOUND); // (200)
        endif;
    }

    function kemasan_barang_delete()
    {
        $data = $this->barang_rumah_tangga->deleteDataKemasanBarang($this->get("id"));
        $this->set_response($data, REST_Controller::HTTP_OK);
    }

    function simpan_barang_post() {
        $data = $this->barang_rumah_tangga->simpanDataBarang();
        $this->response($data, REST_Controller::HTTP_OK);
    }
}
