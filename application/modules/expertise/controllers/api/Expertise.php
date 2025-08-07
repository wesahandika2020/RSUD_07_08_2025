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
class Expertise extends REST_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->limit = 10;
        $this->load->model('Expertise_model', 'm_expertise');

        $id_translucent = $this->session->userdata('id_translucent');
        if (empty($id_translucent)) :
            $this->response(array('error' => 'Anda belum login'), REST_Controller::HTTP_UNAUTHORIZED);
            exit();
        endif;
	}
	
	function get_expertise_by_id_get()
    {
        if (!$this->get('id', true)) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
        endif;

        $data['data'] = $this->m_expertise->getDataExpertiseById($this->get('id', true));
        $data['page'] = 1;
        $data['limit'] = $this->limit;

        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK); // (200)
        endif;
    }

    function get_list_data_expertise_get()
    {
        if (!$this->get('page')) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
        endif;

        $start          = ($this->get('page') - 1) * $this->limit;
        $search         = [
            'pencarian' => $this->get('pencarian', true)
        ];

        $data           = $this->m_expertise->getListDataExpertise($start, $this->limit, $search);
        $data['page']   = (int) $this->get('page');
        $data['limit']  = $this->limit;

        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK); // (200)
        endif;
	}
	
	function simpan_data_expertise_post()
	{
		$data = array(
			'expertise' => str_replace('nbsp;', ' ', $this->post('expertise')),
			'id_layanan' => safe_post('layanan'),
			'id_dokter' => safe_post('dokter') ? safe_post('dokter') : NULL,
			'keterangan' => safe_post('keterangan') ? safe_post('keterangan') : NULL,
		);

		if (!$this->get('id')) :
            $id = $this->m_expertise->simpanDataExpertise($data);
            $message = [
				'id' => convert_hash($id),
                'status' => TRUE,
                'token'  => $this->security->get_csrf_hash()
            ];
            $this->set_response($message, REST_Controller::HTTP_CREATED);
        else :
            $id = $this->m_expertise->updateDataExpertise($data, $this->get('id'));
            $message = [
                'id'     => convert_hash($id),
                'status' => true,
                'token'  => $this->security->get_csrf_hash()
            ];
            $this->set_response($message, REST_Controller::HTTP_CREATED);
        endif;
	}

	function delete_data_expertise_delete()
    {
        $id = $this->get('id', true);
        if ($id <= 0) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
        endif;

        $this->m_expertise->deleteDataExpertise($id);
        $message = [
            'message' => 'Data telah berhasil terhapus'
        ];
        $this->set_response($message, REST_Controller::HTTP_NO_CONTENT); // (204)
    }

    function get_template_expertise_get()
    {
        $id_layanan = safe_get('id_layanan');
        $id_dokter = safe_get('id_dokter');
        $data = $this->m_expertise->getTempalateExpertise($id_layanan, $id_dokter);
        $this->response($data, REST_Controller::HTTP_OK);
    }
}
