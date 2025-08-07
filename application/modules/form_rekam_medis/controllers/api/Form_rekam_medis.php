<?php

defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;
use function GuzzleHttp\json_decode;

/**
 * @package         CodeIgniter
 * @subpackage      Rest Server
 * @category        Controller
 * @author          Faiz Muhammad Syam
 * @license         Syams Corporation
 */
class Form_rekam_medis extends REST_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->limit = 10;
        // $this->redis = new CI_Redis();
        $this->load->model('Masterdata_model', 'masterdata');
        $this->load->model('Form_rekam_medis_model', 'form_rekam_medis');
        $this->load->model('Pelayanan/Pelayanan_model', 'm_pelayanan');

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

    function list_data_kunjungan_pasien_get()
    {

        if (!$this->get('page')) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
        endif;

        $search = [
            'keyword'       => safe_get('keyword'),
            'tgl_search'    => safe_get('tgl_search'),
            'jenis_rawat'   => safe_get('jenis')
        ];

        $limit = $this->limit;
        $start = (($this->get('page') - 1) * $limit);
        $data = $this->form_rekam_medis->getDataKunjunganPasien($limit, $start, $search);

        $data['page'] = (int)$this->get('page');
        $data['limit'] = $limit;

        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK);
        endif;
    }

    function load_view_get()
    {
        $kode_formulir = $this->get('kode_formulir');

        $folder_path = APPPATH . 'modules/form_rekam_medis/views/formulir/' . $kode_formulir . '/';
        $files = glob($folder_path . '*.php'); // Mengambil daftar file PHP dalam folder

        foreach ($files as $file) {
            $this->load->view('formulir/' . $kode_formulir . '/' . basename($file, '.php'));
        }

        // if ($kode_formulir == 'FORM_KEP_15_03') {
        //     // Form Pengkajian Awal Pasien Rawat Inap 
        //     $this->load->view('FORM_KEP_15_03/js');
        //     $this->load->view('FORM_KEP_15_03/modal_pengkajian_awal');
        //     $this->load->view('FORM_KEP_15_03/modal_pengkajian_medis_igd');
        // }
    }

    function data_list_pasien_get()
    {
        $id_pendaftaran = $this->get('id_pendaftaran');
        $id_layanan     = $this->get('id_layanan');
        $no_rm          = $this->get('no_rm');

        if (!$id_pendaftaran && !$id_layanan && !$no_rm) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
        endif;

        $this->load->model('pendaftaran/Pendaftaran_model', 'm_pendaftaran');
        $data = $this->m_pendaftaran->getPendaftaranDetail($id_pendaftaran, $id_layanan);

        // $list_forms = $this->form_rekam_medis->getListFormRM($id_pendaftaran, $id_layanan, $no_rm);
        // $data['list_forms'] = $list_forms;

        // foreach ($list_forms as $list) {
        //     if($list->id_form == null) {
        //         $data['list_tambah_forms'][] = $list;
        //     }
        // }

        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK);
        endif;
    }

    function data_list_form_get()
    {
        $id_pendaftaran = $this->get('id_pendaftaran');
        $id_layanan     = $this->get('id_layanan');
        $no_rm          = $this->get('no_rm');
        $modules        = $this->get('module');

        if (!$id_pendaftaran && !$id_layanan && !$no_rm) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
        endif;

        $this->load->model('pendaftaran/Pendaftaran_model', 'm_pendaftaran');
        $data = $this->m_pendaftaran->getPendaftaranDetail($id_pendaftaran, $id_layanan);

        $list_forms = $this->form_rekam_medis->getListFormRM($id_pendaftaran, $id_layanan, $no_rm);

        // if ($modules == 'Order Operasi') {
        // if ($modules === 'Casemix') {

        //     $data['list_forms'] = [];
        //     $data['list_tambah_forms'] = [];
        //     foreach ($list_forms as $list) {
        //         if ($list->page_module == "casemix" && $list->id_form != null && $list->is_active == 1) {
        //             $data['list_forms'][] = $list;
        //         }

        //         if ($list->page_module == "casemix" && $list->id_form == null && $list->is_active == 1) {
        //             $data['list_tambah_forms'][] = $list;
        //         }
        //     }
        //     // $data['list_forms'] = [];
        //     // $data['list_tambah_forms'] = [];
        //     // foreach ($list_forms as $list) {
        //     //     if ($list->page_module == "order_operasi" && $list->id_form != null) {
        //     //         $data['list_forms'][] = $list;
        //     //     }

        //     //     if ($list->page_module == "order_operasi" && $list->id_form == null) {
        //     //         $data['list_tambah_forms'][] = $list;
        //     //     }
        //     // }
        // } else {

        //     $data['list_forms'] = $list_forms;

        //     foreach ($list_forms as $list) {
        //         if ($list->id_form == null && $list->is_active == 1) {
        //             // if ($list->id_form == null) {
        //             $data['list_tambah_forms'][] = $list;
        //         }
        //     }
        // }

        $data['list_forms'] = $list_forms;

        foreach ($list_forms as $list) {
            if ($list->id_form == null && $list->is_active == 1) {
                // if ($list->id_form == null) {
                $data['list_tambah_forms'][] = $list;
            }
        }

        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK);
        endif;
    }

    function data_list_tambah_form_get()
    {
        $id_pendaftaran = $this->get('id_pendaftaran');
        $id_layanan     = $this->get('id_layanan');
        $no_rm          = $this->get('no_rm');

        if (!$id_pendaftaran && !$id_layanan && !$no_rm) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
        endif;

        $search = [
            'keyword'           => safe_get('keyword'),
            'tgl_search'        => safe_get('tgl_search'),
            'jenis_pendaftaran' => safe_get('jenis')
        ];

        $limit = $this->limit;
        $start = (($this->get('page') - 1) * $limit);
        $data['data'] = $this->form_rekam_medis->getListTambahFormRM($limit, $start, $search, $id_pendaftaran, $id_layanan, $no_rm);
        $data['jumlah'] = count($data['data']);

        $data['page'] = (int)$this->get('page');
        $data['limit'] = $limit;

        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK);
        endif;
    }

    function pasien_auto_get()
    {
        $q = safe_get('q');
        $page = safe_get('page');
        $start = $this->start($page);
        $key = 'pasien_auto_' . $q . '_' . $page;
        // if (!$this->redis->get($key)) :
        $data = $this->form_rekam_medis->getAutoPasien($q, $start, $this->limit);
        // $this->redis->setex($key, 3600, json_encode($data));
        $this->response($data, REST_Controller::HTTP_OK);
        // else :
        //     exit($this->redis->get($key));
        // endif;
    }

    function saksi_auto_get()
    {
        $q = safe_get('q');
        $page = safe_get('page');
        $start = $this->start($page);
        $key = 'saksi_auto_' . $q . '_' . $page;
        // if (!$this->redis->get($key)) :
        $data = $this->form_rekam_medis->getAutoSaksi($q, $start, $this->limit);
        if ((safe_get('page') == 1) & ($q == '')) :
            $pilih[] = array(
                'id' => '',
                'nama' => '',
            );
            $data['data'] = array_merge($pilih, $data['data']);
            $data['total'] += 1;
        endif;
        // $this->redis->setex($key, 86400, json_encode($data));
        $this->response($data, REST_Controller::HTTP_OK);
        // else :
        // exit($this->redis->get($key));
        // endif;
    }
}
