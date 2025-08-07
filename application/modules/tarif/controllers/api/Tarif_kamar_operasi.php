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
class Tarif_kamar_operasi extends REST_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->limit = 10;
        $this->load->model('Tarif_kamar_operasi_model', 'tarif_kamar_operasi');

        $id_translucent = $this->session->userdata('id_translucent');
        if (empty($id_translucent)) :
            $this->response(array('error' => 'Anda belum login'), REST_Controller::HTTP_UNAUTHORIZED);
            exit();
        endif;
    }

    function get_list_tarif_kamar_operasi_get()
    {
        if (!$this->get('page')) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
        endif;

        $start          = ($this->get('page') - 1) * $this->limit;
        $search         = [
            'pencarian'	=> safe_get('pencarian'),
        ];

        $data           = $this->tarif_kamar_operasi->getListDataTarifKamarOperasi($start, $this->limit, $search);
        $data['page']   = (int) $this->get('page');
        $data['limit']  = $this->limit;

        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK); // (200)
        endif;
    }

    private function _validasi()
    {
        $this->load->library('form_validation');
        $this->config->set_item('language', 'indonesia');

        $this->form_validation->set_rules('ruang', 'ruang', 'trim|required');
        $this->form_validation->set_rules('nominal', 'nominal', 'required|trim');

        if ($this->form_validation->run()) return TRUE;

        $data                = $error                = array();
        $data['error_class'] = $data['error_string'] = array();
        $data['status']      = TRUE;

        if (form_error('ruang')) $error[] = 'ruang';
        if (form_error('nominal')) $error[] = 'nominal';

        if ($error) :
            foreach ($error as $row) :
                $data['error_string'][$row] = form_error($row);
            endforeach;

            $data['status'] = FALSE;
            $data['token'] = $this->security->get_csrf_hash();
            echo json_encode($data);
            exit();
        endif;
    }

    function simpan_tarif_kamar_operasi_post()
    {
		$this->_validasi();

        $datenow = date('Y-m-d H:i:s');
        $data = [
            'id_ruang_operasi' => safe_post('ruang'),
            'id_kelas' => (safe_post('kelas') !== '' ? safe_post('kelas') : NULL),
            'nominal' => currencyToNumber(safe_post('nominal')),
            'keterangan' => safe_post('keterangan'),
		];

        if (!$this->get('id')) :
            $this->tarif_kamar_operasi->simpanDataTarifKamarOperasi($data);
            $message = [
                'status' => TRUE,
                'token'  => $this->security->get_csrf_hash()
            ];
            $this->set_response($message, REST_Controller::HTTP_CREATED);
        else :
            $id = $this->tarif_kamar_operasi->updateDataTarifKamarOperasi($data, $this->get('id'));
            $message = [
                'id'     => convert_hash($id),
                'status' => true,
                'token'  => $this->security->get_csrf_hash()
            ];
            $this->set_response($message, REST_Controller::HTTP_CREATED);
        endif;
    }

    function get_tarif_kamar_operasi_get()
    {
        if (!$this->get('id', true)) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
        endif;

        $data['data'] = $this->tarif_kamar_operasi->getDataTarifKamarOperasiById($this->get('id', true));
        $data['page'] = 1;
        $data['limit'] = $this->limit;

        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK); // (200)
        endif;
    }

    function delete_tarif_kamar_operasi_delete()
    {
        $id = $this->get('id', true);
        if ($id <= 0) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
        endif;

        $this->tarif_kamar_operasi->deleteDataTarifKamarOperasi($id);
        $message = [
            'message' => 'Data telah berhasil terhapus'
        ];
        $this->set_response($message, REST_Controller::HTTP_NO_CONTENT); // (204)
    }
}
