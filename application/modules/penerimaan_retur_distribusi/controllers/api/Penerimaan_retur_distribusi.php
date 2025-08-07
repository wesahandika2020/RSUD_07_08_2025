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
class Penerimaan_retur_distribusi extends REST_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->limit = 10;
		$this->datetime = date('Y-m-d H:i:s');
		$this->load->model('Penerimaan_retur_distribusi_model', 'm_penerimaan_retur_distribusi');

		$id_translucent = $this->session->userdata('id_translucent');
		if (empty($id_translucent)) :
			$this->response(array('error' => 'Anda belum login'), REST_Controller::HTTP_UNAUTHORIZED);
			exit();
		endif;
	}

    function get_list_penerimaan_retur_distribusi_get()
    {
        if (!$this->get('page')) :
			$this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
		endif;;
		$start          = ($this->get('page') - 1) * $this->limit;
		$search         = [
			'tanggal_awal'  => safe_get('tanggal_awal'),
			'tanggal_akhir' => safe_get('tanggal_akhir'),
			'unit' => safe_get('unit'), 
			'no_retur' => safe_get('no_retur'), 
		];

		$data            = $this->m_penerimaan_retur_distribusi->getListDataPenerimaanReturDistribusi($this->limit, $start, $search);
		$data['page']    = (int) $this->get('page');
		$data['limit']   = $this->limit;

		if ($data) :
			$this->response($data, REST_Controller::HTTP_OK); // (200)
		else :
			$this->response(array('error' => 'Data is Not Found'), REST_Controller::HTTP_NOT_FOUND);
		endif;
	}

	function get_penerimaan_retur_distribusi_get()
	{
		$data = $this->m_penerimaan_retur_distribusi->getDataPenerimanReturDistribusi($this->get('id', true));
        $this->response($data, REST_Controller::HTTP_OK);
	}

	function simpan_penerimaan_retur_distribusi_post()
	{	
		$data = $this->m_penerimaan_retur_distribusi->simpanDataPenerimaanReturDistribusi();
		$this->response($data, REST_Controller::HTTP_OK);
	}

	function delete_penerimaan_retur_distribusi_delete()
	{
		$id = $this->get('id', true);
		$data = $this->m_penerimaan_retur_distribusi->deleteDataPenerimaanReturDistribusi($id);
		$this->response($data, REST_Controller::HTTP_OK);
	}
}