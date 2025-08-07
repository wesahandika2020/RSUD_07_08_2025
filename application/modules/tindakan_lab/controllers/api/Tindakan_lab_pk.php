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
class Tindakan_lab_pk extends REST_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->limit = 10;
        $this->load->model('Tindakan_lab_pk_model', 'tindlabpk');
        $this->load->model('Masterdata_model', 'masterdata');

        $id_translucent = $this->session->userdata('id_translucent');
        if (empty($id_translucent)) :
            $this->response(array('error' => 'Anda belum login'), REST_Controller::HTTP_UNAUTHORIZED);
            exit();
        endif;
    }

    function get_list_tindlabpk_get()
    {
        if (!$this->get('page')) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
        endif;

        $tipedata = 'list';
        $limit = 5;

        if (isset($_GET['tipedata'])) :
            $tipedata = safe_get('tipedata');
        endif;

        $search = [
            'nama' => safe_get('nama'),
            'jenis_pemeriksaan' => safe_get('id_jenis_pemeriksaan')
        ];

        if ($tipedata === 'list') :
            $limit = 5;
            $start = (($this->get('page') - 1) * $limit);
            $data = $this->tindlabpk->getListDataTindLabPK($limit, $start);
        else :
            $limit = $this->limit;
            $start = (($this->get('page') - 1) * $limit);
            $data = $this->tindlabpk->getListDataTindLabPKSearch($limit, $start, $search);
        endif;

        $data['page'] = (int)$this->get('page');
        $data['limit'] = $limit;

        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK);
        endif;
    }

    function simpan_tindlabpk_post()
    {
        $data = [
            'id_spesialisasi' => safe_post('id_spesialisasi'),
            'id_layanan'      => safe_post('id_layanan'),
        ];

        if (!$this->get('id')) :
            $this->tindlabpk->simpanDataTindLabPK($data);
            $message = [
                'status' => TRUE,
                'token'  => $this->security->get_csrf_hash()
            ];
            $this->set_response($message, REST_Controller::HTTP_CREATED);
        else :
            $id = $this->tindlabpk->updateDataTindLabPK($data, $this->get('id'));
            $message = [
                'id'     =>convert_hash($id),
                'status' => true,
                'token'  => $this->security->get_csrf_hash()
            ];
            $this->set_response($message, REST_Controller::HTTP_CREATED);
        endif;
    }

    function get_tindlabpk_get()
    {
        if (!$this->get('id')) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
        endif;

        $data['data'] = $this->tindlabpk->getDataTindLabPKById($this->get('id'));
        $data['page'] = 1;
        $data['limit'] = $this->limit;

        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK);
        endif;
    }

    // START NILAI LAB PK
    function get_list_nilailabpk_get()
    {
        if (!$this->get('page')) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
        endif;

        $tipedata = 'list';
        $limit = 5;

        if (isset($_GET['tipedata'])) :
            $tipedata = safe_get('tipedata');
        endif;

        $search = [
            //'id_layanan'      => safe_post(''),
        ];

        // if ($tipedata === 'list') :
            $limit = 5;
            $start = (($this->get('page') - 1) * $limit);
            $data = $this->tindlabpk->getListNilaiLabPK($limit, $start);
        // else :
        //     $limit = $this->limit;
        //     $start = (($this->get('page') - 1) * $limit);
        //     $data = $this->tindlabpk->getListDataTindLabPKSearch($limit, $start, $search);
        // endif;

        $data['page'] = (int)$this->get('page');
        $data['limit'] = $limit;

        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK);
        endif;
    }

    function get_nilailab_get()
    {
        if (!$this->get('id')) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
        endif;

        $data['data'] = $this->tindlabpk->getDataNilaiLabPKById($this->get('id'));
        $data['page'] = 1;
        $data['limit'] = $this->limit;

        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK);
        endif;
    }

    function simpan_nilailabpk_post()
    {
        $data = [
            'id_layanan'  => safe_post('id_lay')      !== '' ? safe_post('id_lay') : NULL,
            'id_satuan'   => safe_post('satuan')      !== '' ? safe_post('satuan') : NULL,
            'metode'      => safe_post('metode')      !== '' ? safe_post('metode') : NULL,
            'kategori'    => safe_post('kategori')    !== '' ? safe_post('kategori') : NULL,
            'nilai_awal'  => safe_post('nilai_awal')  !== '' ? safe_post('nilai_awal') : NULL,
            'simbol'      => safe_post('simbol')      !== '' ? safe_post('simbol') : NULL,
            'nilai_akhir' => safe_post('nilai_akhir') !== '' ? safe_post('nilai_akhir') : NULL,
        ];
        
        if (!$this->get('id')) :
            $this->tindlabpk->simpanNilaiLabPK($data);
            $message = [
                'status' => TRUE,
                'token'  => $this->security->get_csrf_hash()
            ];
            $this->set_response($message, REST_Controller::HTTP_CREATED);
        else :
            $id = $this->tindlabpk->updateNilaiLabPK($data, $this->get('id'));
            $message = [
                'id'     =>convert_hash($id),
                'status' => true,
                'token'  => $this->security->get_csrf_hash()
            ];
            $this->set_response($message, REST_Controller::HTTP_CREATED);
        endif;
    }

    // NILAI PK DETAIL
    function get_list_nilailabpk_detail_get()
    {
        if (!$this->get('page')) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
        endif;
        
        $start          = ($this->get('page') - 1) * $this->limit;
        $search         = [
            'id_lay' => safe_get('id_lay'), //'102', //
           // 'kategori'  => 'P', //safe_get('kategori'),
        ];
        
        $data           = $this->tindlabpk->getListNilaiLabPKDetail($this->limit, $start, $search);

        $data['page']   = (int) $this->get('page');
        $data['limit']  = $this->limit;

        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK); // (200)
        endif;
    }
}
