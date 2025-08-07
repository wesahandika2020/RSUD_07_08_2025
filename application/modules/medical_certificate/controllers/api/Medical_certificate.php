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
class Medical_certificate extends REST_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->limit = 10;
        $this->load->model('Medical_certificate_model', 'm_medical_certificate');

        $id_translucent = $this->session->userdata('id_translucent');
        if (empty($id_translucent)) :
            $this->response(array('error' => 'Anda belum login'), REST_Controller::HTTP_UNAUTHORIZED);
            exit();
        endif;
    }

    function get_medical_certificate_get()
    {
        if (!$this->get('id', true)) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
        endif;

        $data['data'] = $this->m_medical_certificate->getDataMedicalCertificateById($this->get('id', true));
        $data['page'] = 1;
        $data['limit'] = $this->limit;

        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK); // (200)
        endif;
    }

    function get_list_medical_certificate_get()
    {
        if (!$this->get('page')) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
        endif;

        $start          = ($this->get('page') - 1) * $this->limit;
        $search         = [
            'search' => $this->get('search')
        ];

        $data           = $this->m_medical_certificate->getListDataMedicalCertificate($start, $this->limit, $search);
        $data['page']   = (int) $this->get('page');
        $data['limit']  = $this->limit;

        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK); // (200)
        endif;
	}

	function simpan_medical_certificate_post()
	{
		$data = array(
			'id_pasien' => safe_post('pasien'),
			'tanggal_visite' => date2mysql(safe_post('tanggal_visite')),
			'keterangan' => safe_post('keterangan'),
			// 'tanggal_start' => date2mysql(safe_post('tanggal_start')),
			// 'tanggal_end' => date2mysql(safe_post('tanggal_end')),
			'tanggal_start_istirahat' => !empty(safe_post('tanggal_start_istirahat')) ? date2mysql(safe_post('tanggal_start_istirahat')) : null,
			'tanggal_end_istirahat' => !empty(safe_post('tanggal_end_istirahat')) ? date2mysql(safe_post('tanggal_end_istirahat')) : null,
			'tanggal_start_dirawat' => !empty(safe_post('tanggal_start_dirawat')) ? date2mysql(safe_post('tanggal_start_dirawat')) : null,
			'tanggal_end_dirawat' => !empty(safe_post('tanggal_end_dirawat')) ? date2mysql(safe_post('tanggal_end_dirawat')) : null,
			'tanggal_start_persalinan' => !empty(safe_post('tanggal_start_persalinan')) ? date2mysql(safe_post('tanggal_start_persalinan')) : null,
			'tanggal_end_persalinan' => !empty(safe_post('tanggal_end_persalinan')) ? date2mysql(safe_post('tanggal_end_persalinan')) : null,
			'nota_bene' => safe_post('nota_bene'),
			'notes' => safe_post('notes'),
			'id_user' => $this->session->userdata('id_translucent'),
		);

		$data = $this->m_medical_certificate->simpanDataMedicalCertificate($data);
		$this->response($data, REST_Controller::HTTP_OK);
	}
}
