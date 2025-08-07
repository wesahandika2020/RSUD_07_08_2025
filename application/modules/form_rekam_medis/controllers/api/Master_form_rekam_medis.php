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
class Master_form_rekam_medis extends REST_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->limit = 10;
        $this->load->model('Masterdata_model', 'masterdata');
        $this->load->model('Master_form_rekam_medis_model', 'form_rekam_medis');


        $id_translucent = $this->session->userdata('id_translucent');
        if (empty($id_translucent)) :
            $this->response(array('error' => 'Anda belum login'), REST_Controller::HTTP_UNAUTHORIZED);
            exit();
        endif;
    }

    function get_list_form_rekam_medis_get()
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
            'jenis_formulir' => safe_get('id_jenis_formulir')
        ];

        if ($tipedata === 'list') :
            $limit = 5;
            $start = (($this->get('page') - 1) * $limit);
            $data = $this->form_rekam_medis->getListDataFormRekamMedis($limit, $start);
        else :
            $limit = $this->limit;
            $start = (($this->get('page') - 1) * $limit);
            $data = $this->form_rekam_medis->getListDataFormRekamMedisSearch($limit, $start, $search);
        endif;

        $data['page'] = (int)$this->get('page');
        $data['limit'] = $limit;

        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK);
        endif;
    }

    function show_data_formulir_get()
    {

        if (!$this->get('id')) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
        endif;

        $id = $this->get('id');
        $id_jenis_formulir = $this->get('id_jenis_formulir');

        $data['formulir'] = $this->form_rekam_medis->getDataFormRekamMedisByID($id, $id_jenis_formulir);
        // $data['formulir'] = $this->db->get_where('sm_form_rekam_medis_pasien', ['id' => $id])->result() ?? null;

        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK);
        endif;
    }

    function simpan_formulir_post()
    {
        $id_parent = safe_post('id_parent');

        if ($id_parent !== '') :
            // generate child
            $kode_formulir = $this->masterdata->getNextCodeFormulir('sm_form_rekam_medis_pasien', $id_parent, 4);
        else :
            // generate parent
            $kode_formulir = $this->masterdata->generateParentCodeFormulir('sm_form_rekam_medis_pasien');
            $id_parent = NULL;
        endif;

        if ($this->get('id')) :
            $data = [
                'id'                    => $this->get('id'),
                'nama'                  => safe_post('nama_formulir'),
                'kategori_formulir'     => safe_post('kategori_formulir'),
                'no_formulir'           => safe_post('no_formulir'),
                'table_name'   => safe_post('table_name_formulir'),
            ];
            $id = $this->form_rekam_medis->updateDataFormulir($data);
            $message = [
                'id'     => $id,
                'status' => true,
                'token'  => $this->security->get_csrf_hash()
            ];
            $this->set_response($message, REST_Controller::HTTP_CREATED);
        else :
            $data = [
                'nama'                  => safe_post('nama_formulir'),
                'id_parent'             => $id_parent,
                'kode_formulir'         => $kode_formulir,
                'kategori_formulir'     => safe_post('kategori_formulir'),
                'no_formulir'           => safe_post('no_formulir'),
                'id_jenis_formulir'     => (safe_post('id_jenis_formulir') !== '') ? safe_post('id_jenis_formulir') : NULL,
                'table_name'   => safe_post('table_name_formulir'),
            ];
            $this->form_rekam_medis->simpanDataFormulir($data);
            $message = [
                'status' => true,
                'token'  => $this->security->get_csrf_hash()
            ];
            $this->set_response($message, REST_Controller::HTTP_CREATED);
        endif;
    }

    function delete_formulir_delete()
    {
        $data = $this->form_rekam_medis->deleteDataFormulir($this->get('id'));
        $this->response($data, REST_Controller::HTTP_NO_CONTENT);
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
        $data = $this->form_rekam_medis->updateStatus($param);
        if ($data) {
            $this->response(['status' => true, 'message' => 'Berhasil mengubah status.'], REST_Controller::HTTP_OK);
        } else {
            $this->response(['status' => false, 'message' => 'Gagal mengubah status.'], REST_Controller::HTTP_OK);
        }
    }

    function tgl_kunjungan_get()
    {
        $idpasien = safe_get('idpasien');

        if ($idpasien !== '') {
            $data = $this->form_rekam_medis->getTglKunjungan($idpasien)->result();
        } else {
            $data = NULL;
        }
        echo json_encode($data);
    }

    function list_layanan_pendaftran_get()
    {
        if (!$this->get('page')) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
        endif;

        $start  = ($this->get('page') - 1) * $this->limit;
        $search = [
            'id_pendaftaran'      => $this->get('id_pendaftaran')
        ];

        $data  = $this->form_rekam_medis->getListDataLayananPendaftaran($this->limit, $start, $search);
        $data['page']    = (int) $this->get('page');
        $data['limit']   = $this->limit;

        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK); // (200)
        endif;
    }
}
