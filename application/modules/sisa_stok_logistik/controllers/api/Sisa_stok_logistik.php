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
class Sisa_stok_logistik extends REST_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->limit = 10;
		date_default_timezone_set('Asia/Jakarta');
		$this->datetime = date('Y-m-d H:i:s');
		$this->load->model('Sisa_stok_logistik_model', 'logistik');

		$id_translucent = $this->session->userdata('id_translucent');
		if (empty($id_translucent)) :
			$this->response(array('error' => 'Anda belum login'), REST_Controller::HTTP_UNAUTHORIZED);
			exit();
		endif;
	}

	function get_list_sisa_stok_get() {
		if ( ! $this->get( 'page' ) ) :
			$this->response( NULL, REST_Controller::HTTP_BAD_REQUEST ); // (400)
		endif;
		$limit  = 50;
		$start  = ( (int)$this->get( 'page' ) - 1 ) * $limit;
		$search = [
			'periode_laporan' => safe_get( 'periode_laporan' ),
			'tanggal_harian'  => safe_get( 'tanggal_harian' ),
			'bulan'           => safe_get( 'bulan' ),
			'tahun'           => safe_get( 'tahun' ),
			'tanggal_awal'    => safe_get( 'tanggal_awal' ),
			'tanggal_akhir'   => safe_get( 'tanggal_akhir' ),
			'kategori_barang' => safe_get( 'kategori_barang' ),
			'id_barang'       => safe_get( 'barang' ),
			'unit'            => safe_get( 'unit' ),
		];

		$data          = $this->logistik->getListDataSisaStok( (int)$limit, (int)$start, $search );

		$data['page']  = (int) $this->get( 'page' );
		$data['limit'] = (int)$limit;

		if ( $data ) :
			$this->response( $data, REST_Controller::HTTP_OK ); // (200)
		else :
			$this->response( array( 'error' => 'Data is Not Found' ), REST_Controller::HTTP_NOT_FOUND );
		endif;
	}

	function get_data_sisa_stok_get()
	{
		$data = $this->logistik->getDataSisaStok($this->get('id_unit'), $this->get('id_barang'));
		$this->response($data, REST_Controller::HTTP_OK);
	}
}
