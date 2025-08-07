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
class Tarif_pelayanan extends REST_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->limit = 10;
        $this->load->model('Tarif_pelayanan_model', 'tapel');

        $id_translucent = $this->session->userdata('id_translucent');
        if (empty($id_translucent)) :
            $this->response(array('error' => 'Anda belum login'), REST_Controller::HTTP_UNAUTHORIZED);
            exit();
        endif;
    }

    function get_list_tarif_pelayanan_get()
    {
        if (!$this->get('page')) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
        endif;

        $start          = ($this->get('page') - 1) * $this->limit;
        $search         = [
            'nama'                 => safe_get('nama'),
            'id_layanan'           => safe_get('layanan'),
            'id_jenis_pemeriksaan' => safe_get('jenis_pemeriksaan'),
            'id_unit'              => safe_get('instalasi'),
            'kelas'                => safe_get('kelas'),
            'jenis'                => safe_get('jenis'),
        ];

        $data           = $this->tapel->getListDataTarifPelayanan($this->limit, $start, $search);
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

        $this->form_validation->set_rules('layanan', 'layanan', 'trim|required');
        $this->form_validation->set_rules('jasa_nadis_persen', 'jasa nadis persen', 'numeric');
        $this->form_validation->set_rules('jasa_nadis', 'jasa nadis', 'numeric');
        $this->form_validation->set_rules('jasa_klinik_persen', 'jasa klinik persen', 'numeric');
        $this->form_validation->set_rules('jasa_klinik', 'jasa klinik', 'numeric');
        $this->form_validation->set_rules('bhp_persen', 'bhp persen', 'numeric');
        $this->form_validation->set_rules('bhp', 'bhp', 'numeric');

        if ($this->form_validation->run()) return TRUE;

        $data                = $error                = array();
        $data['error_class'] = $data['error_string'] = array();
        $data['status']      = TRUE;

        if (form_error('layanan')) $error[] = 'layanan';
        if (form_error('jasa_nadis_persen')) $error[] = 'jasa_nadis_persen';
        if (form_error('jasa_nadis')) $error[] = 'jasa_nadis';
        if (form_error('jasa_klinik_persen')) $error[] = 'jasa_klinik_persen';
        if (form_error('jasa_klinik')) $error[] = 'jasa_klinik';
        if (form_error('bhp_persen')) $error[] = 'bhp_persen';
        if (form_error('bhp')) $error[] = 'bhp';

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

    function simpan_tarif_pelayanan_post()
    {
        $this->_validasi();
        $datenow = date('Y-m-d H:i:s');
        $data = [
            'id_layanan'            => safe_post('layanan'),
            'jenis'                 => (safe_post('jenis') !== '') ? safe_post('jenis') : NULL,
            'bobot'                 => safe_post('bobot'),
            'id_kelas'              => (safe_post('kelas') !== '') ? safe_post('kelas') : NULL,
            'id_unit'               => (safe_post('instalasi') !== '') ? safe_post('instalasi') : NULL,
            'jasa_nadis'            => (safe_post('jasa_nadis') !== '') ? safe_post('jasa_nadis') : 0,
            'jasa_klinik'           => (safe_post('jasa_klinik') !== '') ? safe_post('jasa_klinik') : 0,
            'bhp'                   => (safe_post('bhp') !== '') ? safe_post('bhp') : 0,
            'bahan_alat'            => (safe_post('bahan_alat') !== '') ? safe_post('bahan_alat') : 0,
            'jasa_dokter_anasthesi' => (safe_post('dokter_anasthesi') !== '') ? safe_post('dokter_anasthesi') : 0,
            'jasa_penata_anasthesi' => (safe_post('penata_anasthesi') !== '') ? safe_post('penata_anasthesi') : 0,
            'jasa_instrument'       => (safe_post('instrument') !== '') ? safe_post('instrument') : 0,
            'jasa_para_no_medis'    => (safe_post('medisnonmedis') !== '') ? safe_post('medisnonmedis') : 0,
            'total'                 => (safe_post('total') !== '') ? safe_post('total') : 0,
            'keterangan'            => safe_post('keterangan'),
            'waktu'                 => $datenow,
            'is_active'             => 1,
        ];

        if (!$this->get('id')) :
            $this->tapel->simpanDataTarifPelayanan($data);
            $message = [
                'status' => TRUE,
                'token'  => $this->security->get_csrf_hash()
            ];
            $this->set_response($message, REST_Controller::HTTP_CREATED);
        else :
            $id = $this->tapel->updateDataTarifPelayanan($data, $this->get('id'));
            $message = [
                'id'     => convert_hash($id),
                'status' => true,
                'token'  => $this->security->get_csrf_hash()
            ];
            $this->set_response($message, REST_Controller::HTTP_CREATED);
        endif;
    }

    function get_tarif_pelayanan_get()
    {
        if (!$this->get('id', true)) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
        endif;

        $data['data'] = $this->tapel->getDataTarifPelayananById($this->get('id', true));
        $data['page'] = 1;
        $data['limit'] = $this->limit;

        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK); // (200)
        endif;
    }

    function delete_tarif_pelayanan_delete()
    {
        $id = $this->get('id', true);
        if ($id <= 0) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
        endif;

        $this->tapel->deleteDataTarifPelayanan($id);
        $message = [
            'message' => 'Data telah berhasil terhapus'
        ];
        $this->set_response($message, REST_Controller::HTTP_NO_CONTENT); // (204)
    }
}
