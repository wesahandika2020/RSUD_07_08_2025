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
class Pendaftaran_wa extends REST_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->limit = 10;
        $this->load->model('Pendaftaran_wa_model', 'pendaftaranWa');

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

    function get_list_pendaftaran_wa_get()
    {
        if (!$this->get('page')) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
        endif;

        $start          = ($this->get('page') - 1) * $this->limit;
        $search         = [
            'keyword'    => $this->get('keyword'),
            'layanan'    => safe_get('layanan'),
            'tanggal'    => safe_get('tanggal'),
        ];

        $data           = $this->pendaftaranWa->getListDataPendaftaranWa($start, $this->limit, $search);
        $data['page']   = (int) $this->get('page');
        $data['limit']  = $this->limit;

        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK); // (200)
        endif;
    }

    function edit_staus_pasien_post($id = NULL)
    {
        // echo('dddddd'); exit(1);
        if ($id === NULL) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
        endif;

       
        if(safe_post("jenis_kasus")==='Baru'){
            $getIDPasien = NULL;
        } else {
            $getIDPasien = safe_post("id_pasien");
        }
        $data = array(
            "id"           => $id,
            "status"       => safe_post("jenis_kasus"),
            "id_pasien"    => $getIDPasien
        );

        $data["status"] = $this->pendaftaranWa->updateStatusPasien($id, $data);
        $data['token']  = $this->security->get_csrf_hash();
        if ($data["status"] == false) {
            $data['token'] = $data['token'];
        }
        $this->response($data, 200);
    }

}
