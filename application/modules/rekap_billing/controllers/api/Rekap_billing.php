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
class Rekap_billing extends REST_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->limit = 10;
        $this->datetime = date('Y-m-d H:i:s');
        $this->load->model('Rekap_billing_model', 'm_rekap_billing');

        $id_translucent = $this->session->userdata('id_translucent');
        if (empty($id_translucent)) :
            $this->response(array('error' => 'Anda belum login'), REST_Controller::HTTP_UNAUTHORIZED);
            exit();
        endif;
	}
	
	function simpan_waktu_cetak_post()
    {
        if (safe_post('id_pendaftaran') === '') :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
        endif;

        $this->db->trans_begin();

        $id_pendaftaran = (int)safe_post('id_pendaftaran');
        $keterangan     = (int)safe_post('keterangan');
        $data = $this->m_rekap_billing->simpanWaktuCetak($id_pendaftaran,$keterangan);

        if ($this->db->trans_status() === FALSE) :
            $this->db->trans_rollback();
            $status = FALSE;
        else :
            $this->db->trans_commit();
            $status = TRUE;
        endif;

        $this->response($data, REST_Controller::HTTP_OK);
    }

    function get_status_cco_get()
	{
        if (!$this->get('page')) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
        endif;

        $limit          = $this->limit;
        $start          = ($this->get('page') - 1) * $limit;
		$data           = $this->m_rekap_billing->getStatusCco($start, $limit);
        $data['page']   = (int) $this->get('page');
        $data['limit']  = $limit;

		if ($data) :
			$this->response($data, REST_Controller::HTTP_OK); // (200)
		else :
			$this->response(array('error' => 'Data is Not Found'), REST_Controller::HTTP_NOT_FOUND);
		endif;
	}
}