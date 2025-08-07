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
class Pemakaian_barang_gizi extends REST_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->limit = 10;
		date_default_timezone_set('Asia/Jakarta');
		$this->datetime = date('Y-m-d H:i:s');
		$this->load->model('Pemakaian_barang_gizi_model', 'gizi');

		$id_translucent = $this->session->userdata('id_translucent');
		if (empty($id_translucent)) :
			$this->response(array('error' => 'Anda belum login'), REST_Controller::HTTP_UNAUTHORIZED);
			exit();
		endif;
	}

	private function start($page)
    {
        return (((int)$page - 1) * (int)$this->limit);
    }

	function get_list_pemakaian_barang_gizi_get()
    {
        if (!$this->get('page')) :
			$this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
		endif;
		$start          = ((int)$this->get('page') - 1) * (int)$this->limit;
		$search         = [
			'tanggal_awal'  => safe_get('tanggal_awal'),
			'tanggal_akhir' => safe_get('tanggal_akhir'),
            'barang' => safe_get('barang'),  
		];

		$data            = $this->gizi->getListDataPemakaianBarangGizi((int)$this->limit, (int)$start, $search);
		$data['page']    = (int) $this->get('page');
		$data['limit']   = (int)$this->limit;

		if ($data) :
			$this->response($data, REST_Controller::HTTP_OK); // (200)
		else :
			$this->response(array('error' => 'Data is Not Found'), REST_Controller::HTTP_NOT_FOUND);
		endif;
	}

	function barang_with_stok_gizi_get()
    {
        $param = array(
            "search" => safe_get("q"),
            "penjamin" => safe_get("id_penjamin") !== "" ? safe_get("id_penjamin") : "",
            "cekstok" => safe_get("cekstok") !== "" ? safe_get("cekstok") : "",
            "is_farmasi" => safe_get("is_farmasi") !== "" ? safe_get("is_farmasi") : "",
            "id_kategori" => safe_get("id_kategori") !== "" ? safe_get("id_kategori") : "",
        );
        $start = $this->start((int)safe_get("page"));
        $data = $this->gizi->getAutoBarangStokGizi($param, $start, $this->limit);
        if ((int)safe_get("page") == 1 & $param["search"] == "") :
            $pilih[] = array(
                "id" => "",
                "nama" => "-",
                "kekuatan" => "",
                "satuan_kekuatan" => "",
                "sisa" => "",
                "harga_jual" => "",
            );
            $data["data"] = array_merge($pilih, $data["data"]);
            $data["total"] += 1;
        endif;
        $this->response($data, REST_Controller::HTTP_OK);
    }

	

	function simpan_pemakaian_barang_gizi_post()
	{
		$data = $this->gizi->simpanDataPemakaianBarangGizi();
		$this->response($data, REST_Controller::HTTP_OK);
	}

	function delete_pemakaian_barang_gizi_delete()
	{
		$data = $this->gizi->deleteDataPemakaianBarangGizi($this->get('id', true));
		$this->response($data, REST_Controller::HTTP_OK);
	}
}
