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
class Salinan_resep extends REST_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->limit = 10;
		$this->datetime = date('Y-m-d H:i:s');
		$this->load->model('Salinan_resep_model', 'm_salinan_resep');

		$id_translucent = $this->session->userdata('id_translucent');
		if (empty($id_translucent)) :
			$this->response(array('error' => 'Anda belum login'), REST_Controller::HTTP_UNAUTHORIZED);
			exit();
		endif;
	}

    function get_list_salinan_resep_get()
    {
        if (!$this->get('page')) :
			$this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
		endif;
		$limit = 10;
		$start          = ($this->get('page') - 1) * $limit;
		$search         = [
			'id' 				=> $this->get('id', true),
			'tanggal_awal'  	=> safe_get('tanggal_awal'),
			'tanggal_akhir' 	=> safe_get('tanggal_akhir'),
			'no_resep' 			=> safe_get('no_resep'), 
            'dokter' 			=> safe_get('dokter'),  
            'pasien' 			=> safe_get('pasien'), 
            'jenis_pelayanan' 	=> safe_get('jenis_pelayanan'), 
            'keyword' 			=> safe_get('keyword'), 
            'status_penyerahan' => safe_get('status_penyerahan'), 
		];

		$data            = $this->m_salinan_resep->getListDataSalinanResep($limit, $start, $search);
		$data['page']    = (int) $this->get('page');
		$data['limit']   = $limit;

		if ($data) :
			$this->response($data, REST_Controller::HTTP_OK); // (200)
		else :
			$this->response(array('error' => 'Data is Not Found'), REST_Controller::HTTP_NOT_FOUND);
		endif;
	}

	function valiadsi_penyerahan_resep_get()
	{
		$data = $this->m_salinan_resep->validasiPenyerahanResep($this->get('id', true));
		$this->response($data, REST_Controller::HTTP_OK);
	}
}
