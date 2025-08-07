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
class Barang_farmasi extends REST_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->limit = 10;
        $this->load->model('Barang_farmasi_model', 'barang_farmasi');

        $id_translucent = $this->session->userdata('id_translucent');
        if (empty($id_translucent)) :
            $this->response(array('error' => 'Anda belum login'), REST_Controller::HTTP_UNAUTHORIZED);
            exit();
        endif;
    }

    function get_list_barang_farmasi_get()
    {
        if (!$this->get('page')) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
        endif;

        $start          = ($this->get('page') - 1) * $this->limit;
        $search         = [
            'id'              => $this->get('id', true),
            'kategori_barang' => safe_get('kategori_barang'),
            'nama'            => safe_get('nama'),
            'sediaan'         => safe_get('sediaan'),
            'roa'             => safe_get('roa'),
            'generik'         => safe_get('generik'),
            'golongan'        => safe_get('golongan'),
            'obatkronis'      => safe_get('obatkronis'),
            'formularium'     => safe_get('formularium'),
            'fornas'          => safe_get('fornas'),
            'jenis_kategori'  => 'Farmasi',
            'ven'             => safe_get('ven'),
            'katastropik'     => safe_get('katastropik'),
            'asalperolehan'   => safe_get('asalperolehan'),
            'statusaktif'     => safe_get('statusaktif'),
            'pencarian'       => $this->get('pencarian', true)
        ];

        $data           = $this->barang_farmasi->getListDataBarangFarmasi($start, $this->limit, $search);
        $data['page']   = (int) $this->get('page');
        $data['limit']  = $this->limit;

        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK); // (200)
        else :
            $this->response('Data tidak ditemukan.', REST_Controller::HTTP_NOT_FOUND); // (200)
        endif;
    }

    function kemasan_barang_delete()
    {
        $data = $this->barang_farmasi->deleteDataKemasanBarang($this->get("id"));
        $this->set_response($data, REST_Controller::HTTP_OK);
    }
}
