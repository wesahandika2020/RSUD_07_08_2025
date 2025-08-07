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
class Spesialisasi extends REST_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->limit = 10;
        $this->load->model('Spesialisasi_model', 'spesialisasi');
        $this->load->model('App_model', 'm_default');
        $this->antrean_config = $this->default->getConfigAntrianBPJS();
        $this->datetime = date('Y-m-d H:i:s');
        $this->code = 400;
        $this->message = "Tidak terhubung dengan Server BPJS, Server BPJS sedang bermasalah. Silahkan Hubungi Pihak IT BPJS";

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

    function get_spesialisasi_get()
    {
        if (!$this->get('id', true)) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
        endif;

        $data['data'] = $this->spesialisasi->getDataSpesialisasiById($this->get('id', true));
        $data['page'] = 1;
        $data['limit'] = $this->limit;

        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK); // (200)
        endif;
    }


    function list_bridging_get()
    {
        if (!$this->get('id', true)) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
        endif;

        $url = $this->antrean_config->server."ref/poli/fp";

        $header = $this->spesialisasi->createHeader($this->antrean_config);
        $output = getCurl($url, $header);
        $decode = json_decode($output);

        if ($decode === NULL) :
            $decode = ["metaData" => ["code" => $this->code,"message" => $this->message]];
            die(json_encode($decode));
        endif;
        
        $decode->response = $this->spesialisasi->decryptResponse($decode->response);

        $spesialis = $this->spesialisasi->getDataSpesialisasi($this->get('id'));

        if($spesialis->kode_bpjs !== null && $spesialis->kode_bpjs !== ''){

            if($spesialis->status !== '1'){

                $statusRespon = false;

                if($decode->response !== null  && $decode->response !== false){

                    foreach ($decode->response as $key => $value) {

                        if ($value !== null) {

                            if(isset($value->kodepoli)){

                                $filterDataKontrol = $value->kodepoli;

                                if($filterDataKontrol === $spesialis->kode_bpjs){

                                    $idSpesialisasi = (int)$this->get('id');
                                    $updateDataBridging = ["status" => 1, "tgl_bridging" => $this->datetime];
                                    $xIdSurat = $this->db->where('id', $idSpesialisasi)->update('sm_spesialisasi', $updateDataBridging);

                                    if($xIdSurat !== false){

                                        $statusRespon = true;

                                        $message = 'Data Berhasil diupdate';

                                        $decode = ["metaData" => ["code" => 200, "message" => $message]];

                                        die(json_encode($decode));
                                    
                                        break;

                                    } else {

                                        $message = 'Gagal Update Data Poli, Silakan Refresh Kembali';

                                        $statusRespon = false;

                                        $decode = ["metaData" => ["code" => 201, "message" => $message]];

                                        die(json_encode($decode));
                                    
                                        break;
                                    }

                                }

                            }
                        }
                    
                    }

                    if($statusRespon === false){

                        $message = 'Data Poli belum terdaftar secara HFIS';

                        $decode = ["metaData" => ["code" => 201, "message" => $message]];

                    }

                } else {

                   $decode = ["metaData" => ["code" => $this->code, "message" => $this->message]]; 

                }

            } else {

                $decode = ["metaData" => ["code" => 200, "message" => 'Data Berhasil diupdate']];

            }

        } else {

            $decode = ["metaData" => ["code" => 201, "message" => 'Data Poli Spesialisasi belum memiliki Kode BPJS']];

        }
        
        $this->response($decode, REST_Controller::HTTP_OK);

    }

    function get_list_spesialisasi_get()
    {
        if (!$this->get('page')) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
        endif;

        $start          = ($this->get('page') - 1) * $this->limit;
        $search         = [
            'keyword' => $this->get('keyword')
        ];

        $data           = $this->spesialisasi->getListDataSpesialisasi($start, $this->limit, $search);
        $data['page']   = (int) $this->get('page');
        $data['limit']  = $this->limit;

        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK); // (200)
        endif;
    }

    function delete_spesialisasi_delete()
    {
        $id = $this->get('id', true);
        if ($id <= 0) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
        endif;

        $this->spesialisasi->deleteDataSpesialisasi($id);
        $message = [
            'message' => 'Data telah berhasil terhapus'
        ];
        $this->set_response($message, REST_Controller::HTTP_NO_CONTENT); // (204)
    }

    private function _validasi()
    {
        $this->load->library('form_validation');
        $this->config->set_item('language', 'indonesia');

        $this->form_validation->set_rules('nama', 'nama spesialisasi', 'trim|required');

        if ($this->form_validation->run()) return TRUE;

        $data                = $error                = array();
        $data['error_class'] = $data['error_string'] = array();
        $data['status']      = TRUE;

        if (form_error('nama')) $error[] = 'nama';

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

    function simpan_spesialisasi_post()
    {
        $this->_validasi();

        $data = [
            'kode'              => safe_post('kode'),
            'kode_bpjs'         => safe_post('kode_bpjs'),
            'nama'              => safe_post('nama'),
            'id_unit'           => (safe_post('unit') !== '') ? safe_post('unit') : NULL,
            'id_tarif'          => (safe_post('tarif') !== '') ? safe_post('tarif') : NULL,
            'id_smf'            => (safe_post('smf') !== '') ? safe_post('smf') : NULL,
            'kode_rekening'     => (safe_post('kode_rekening') !== '') ? safe_post('kode_rekening') : NULL,
            'is_klinik'         => safe_post('is_klinik')
        ];

        if (!$this->get('id')) :
            $this->spesialisasi->simpanDataSpesialisasi($data);
            $message = [
                'status' => TRUE,
                'token'  => $this->security->get_csrf_hash()
            ];
            $this->set_response($message, REST_Controller::HTTP_CREATED);
        else :
            $id = $this->spesialisasi->updateDataSpesialisasi($data, $this->get('id'));
            $message = [
                'id'     => $id,
                'status' => true,
                'token'  => $this->security->get_csrf_hash()
            ];
            $this->set_response($message, REST_Controller::HTTP_CREATED);
        endif;
    }
}
