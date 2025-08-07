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
class Retur_penerimaan extends REST_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->limit = 10;
		$this->datetime = date('Y-m-d H:i:s');
		$this->load->model('Retur_penerimaan_model', 'm_retur_penerimaan');

		$id_translucent = $this->session->userdata('id_translucent');
		if (empty($id_translucent)) :
			$this->response(array('error' => 'Anda belum login'), REST_Controller::HTTP_UNAUTHORIZED);
			exit();
		endif;
	}

    function get_list_retur_penerimaan_get()
    {
        if (!$this->get('page')) :
			$this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
		endif;
		$start          = ($this->get('page') - 1) * $this->limit;
		$search         = [
			'tanggal_awal'  => safe_get('tanggal_awal'),
			'tanggal_akhir' => safe_get('tanggal_akhir'),
			'jenis' => safe_get('list') !== '' ? safe_get('list') : NULL, 
			'no_faktur' => safe_get('no_faktur'), 
            'id_barang' => safe_get('barang'),  
            'supplier' => safe_get('supplier'), 
		];

		$data            = $this->m_retur_penerimaan->getListDataReturPenerimaan($this->limit, $start, $search);
		$data['page']    = (int) $this->get('page');
		$data['limit']   = $this->limit;

		if ($data) :
			$this->response($data, REST_Controller::HTTP_OK); // (200)
		else :
			$this->response(array('error' => 'Data is Not Found'), REST_Controller::HTTP_NOT_FOUND);
		endif;
	}

	function simpan_retur_penerimaan_post()
	{
		$data = $this->m_retur_penerimaan->simpanDataReturPenerimaan();
		$this->response($data, REST_Controller::HTTP_OK);
	}

	function delete_retur_penerimaan_delete()
	{
		$data = $this->m_retur_penerimaan->deleteDataReturPenerimaan($this->get('id', true));
		$this->response($data, REST_Controller::HTTP_OK);
	}
}
