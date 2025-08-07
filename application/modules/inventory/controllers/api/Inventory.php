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
class Inventory extends REST_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->limit = 10;
		$this->datetime = date('Y-m-d H:i:s');
		$this->load->model('Inventory_model', 'm_inventory');

		$id_translucent = $this->session->userdata('id_translucent');
		if (empty($id_translucent)) :
			$this->response(array('error' => 'Anda belum login'), REST_Controller::HTTP_UNAUTHORIZED);
			exit();
		endif;
	}

	// penerimaan barang
    function get_list_penerimaan_get()
    {
        if (!$this->get('page')) :
			$this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
		endif;

		$start          = ($this->get('page') - 1) * $this->limit;
		$search         = [
			'tanggal_awal'  => safe_get('tanggal_awal'),
			'tanggal_akhir' => safe_get('tanggal_akhir'),
			"kategori_barang" => safe_get("kategori_barang"), 
            "no_penerimaan" => safe_get("no_penerimaan"), 
            "no_faktur" => safe_get("no_faktur"), 
            "supplier" => safe_get("supplier"), 
            "terencana" => safe_get("terencana"), 
            "barang" => safe_get("barang"), 
            "list" => safe_get("tampilkan"), 
            "jenis_barang" => safe_get("jenis_barang")
		];

		$data            = $this->m_inventory->getListDataPenerimaan($this->limit, $start, $search);
		$data['page']    = (int) $this->get('page');
		$data['limit']   = $this->limit;

		if ($data) :
			$this->response($data, REST_Controller::HTTP_OK); // (200)
		else :
			$this->response(array('error' => 'Data is Not Found'), REST_Controller::HTTP_NOT_FOUND);
		endif;
	}

    function get_list_penerimaan_bank_darah_get()
    {
        if (!$this->get('page')) :
			$this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
		endif;

		$start          = ($this->get('page') - 1) * $this->limit;
		$search         = [
			'tanggal_awal'  => safe_get('tanggal_awal'),
			'tanggal_akhir' => safe_get('tanggal_akhir'),
			"kategori_barang" => safe_get("kategori_barang"), 
            "no_penerimaan" => safe_get("no_penerimaan"), 
            "no_faktur" => safe_get("no_faktur"), 
            "supplier" => safe_get("supplier"), 
            "terencana" => safe_get("terencana"), 
            "barang" => safe_get("barang"), 
            "list" => safe_get("tampilkan"), 
            "jenis_barang" => safe_get("jenis_barang")
		];

		$data            = $this->m_inventory->getListDataPenerimaanBankDarah($this->limit, $start, $search);
		$data['page']    = (int) $this->get('page');
		$data['limit']   = $this->limit;

		if ($data) :
			$this->response($data, REST_Controller::HTTP_OK); // (200)
		else :
			$this->response(array('error' => 'Data is Not Found'), REST_Controller::HTTP_NOT_FOUND);
		endif;
	}

	function get_detail_penerimaan_get()
	{
		$id = $this->get('id', true);
		$data = $this->m_inventory->getDetailDataPenerimaan($id);
		$this->response($data, REST_Controller::HTTP_OK);
	}

	function get_detail_penerimaan_bank_darah_get()
	{
		$id = $this->get('id', true);
		$data = $this->m_inventory->getDetailDataPenerimaanBankDarah($id);
		$this->response($data, REST_Controller::HTTP_OK);
	}
	
	function simpan_penerimaan_post() 
	{
		$data = $this->m_inventory->simpanDataPenerimaan();
		$this->response($data, REST_Controller::HTTP_OK);
	}

	function simpan_penerimaan_bank_darah_post() 
	{
		$data = $this->m_inventory->simpanDataPenerimaanBankDarah();
		$this->response($data, REST_Controller::HTTP_OK);
	}

	function delete_penerimaan_delete()
	{
		$id = $this->get('id');
		$data = $this->m_inventory->deleteDataPenerimaan($id);
		$this->response($data, REST_Controller::HTTP_OK);
	}

	function delete_detail_penerimaan_delete() 
	{
		$id = $this->get('id');
		$data = $this->m_inventory->deleteDetailDataPenerimaan($id);
		$this->response($data, REST_Controller::HTTP_OK);
	}

	function delete_penerimaan_bank_darah_delete()
	{
		$id = $this->get('id');
		$data = $this->m_inventory->deleteDataPenerimaanBankDarah($id);
		$this->response($data, REST_Controller::HTTP_OK);
	}

	function delete_detail_penerimaan_bank_darah_delete() 
	{
		$id = $this->get('id');
		$data = $this->m_inventory->deleteDetailDataPenerimaanBankDarah($id);
		$this->response($data, REST_Controller::HTTP_OK);
	}
	// penerimaan barang

	function get_detail_harga_barang_pemesanan_get()
    {
        $data = $this->m_inventory->getDetailHargaBarangPemesanan()->row();
        exit(json_encode($data));
    }

	// koreksi stok
	function sisa_barang_koreksi_stok_get() 
	{
		$param['id_barang'] = safe_get('id_barang');
		$param['ed'] = safe_get('ed');
		if ($param['id_barang'] !== '') :
			$data = $this->m_inventory->getSisaBarangKoreksiStok($param)->row();
		else : 
			$data = NULL;
		endif;
		exit(json_encode($data));
	}
	// end koreksi stok
}
