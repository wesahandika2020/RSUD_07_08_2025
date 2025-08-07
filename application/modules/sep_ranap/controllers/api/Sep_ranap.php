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
class Sep_ranap extends REST_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->limit = 10;
        $this->load->model('Sep_ranap_model', 'sep_ranap');

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

    function get_pasien_get()
    {
        if (!$this->get('id', true)) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
        endif;

        $data['data'] = $this->pasien->getDataPasienById($this->get('id', true));
        $data['page'] = 1;
        $data['limit'] = $this->limit;

        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK); // (200)
        endif;
    }

    function get_list_sep_ranap_get()
    {
        if (!$this->get('page')) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
        endif;

        $start          = ($this->get('page') - 1) * $this->limit;
        $search = [
            'tanggal_awal'      => safe_get('tanggal_awal'),
            'tanggal_akhir'     => safe_get('tanggal_akhir'),
            'no_register'       => safe_get('no_register'),
            'no_rm'             => safe_get('no_rm'),
            'nama'              => safe_get('nama'),
            'no_sep'            => safe_get('no_sep'),
            'bangsal'           => safe_get('bangsal'),
        ];

        $data           = $this->sep_ranap->getListDataSepRanap($this->limit, $start, $search);
        $data['page']   = (int) $this->get('page');
        $data['limit']  = $this->limit;

        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK); // (200)
        endif;
    }
	
	function sep_asal_post()
    {
        $id_pendaftaran         = $this->get('id_pendaftaran');
        $id_layanan_pendaftaran = $this->get('id_layanan_pendaftaran');

		$data = array(
			'id_pendaftaran' => $this->get('id_pendaftaran'),
			'nosep_igd' 	 => $this->get('igd'),
			'nosep_rajal' 	 => $this->get('rajal'),
			'nosep_ranap'    => $this->get('ranap'),
			// 'is_rajal' 		 => $this->get('rajal'),
			// 'is_ranap'		 => $this->get('ranap'),
			'id_user'        => $this->session->userdata('id_translucent'),
			'created_date'   => $this->datetime,
		);
		
        if(($this->get('ranap') != '-') && ($this->get('ranap') != '')){
            $this->sep_ranap->ubahNoSepRanap($id_pendaftaran,$id_layanan_pendaftaran, $this->get('ranap'));
        }

        $checkData = $this->sep_ranap->getDataSepAsal($this->get('id_pendaftaran'));


		$this->db->trans_begin();

		if ($checkData == null) {
			$this->db->insert('sm_asal_sep', $data);
		} else {
			$this->sep_ranap->ubahDataSep($this->get('id_pendaftaran'), $this->session->userdata('id_translucent'));

			$this->db->where('id_pendaftaran', $this->get('id_pendaftaran'));
			$this->db->update('sm_asal_sep', $data);
		}

		if ($this->db->trans_status() === FALSE) :
			$this->db->trans_rollback();
			$status  = FALSE;
			$message = 'Gagal simpan form persetujuan rawat inap';
		else :
			$this->db->trans_commit();
			$status  = TRUE;
			$message = 'Berhasil simpan form persetujuan rawat inap';
		endif;

		$this->response(array('status' => $status, 'message' => $message), REST_Controller::HTTP_OK);
    }
}
