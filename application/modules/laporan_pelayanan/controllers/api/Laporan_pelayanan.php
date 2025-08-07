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
class Laporan_pelayanan extends REST_Controller
	{

	function __construct()
	{
		parent::__construct();
		$this->limit = 10;
		$this->datetime = date('Y-m-d H:i:s');
		$this->load->model('Laporan_pelayanan_model', 'm_laporan_pelayanan');

		$id_translucent = $this->session->userdata('id_translucent');
		if (empty($id_translucent)) :
			$this->response(array('error' => 'Anda belum login'), REST_Controller::HTTP_UNAUTHORIZED);
			exit();
		endif;
	}

	function get_list_daftar_pasien_rawat_inap_get()
	{
		if (!$this->get('page')) :
			$this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
		endif;
		$start          = ($this->get('page') - 1) * $this->limit;
		$search         = [
			'bangsal' => safe_get('bangsal'),
			'kelas' => safe_get('kelas'),
			'no_rm' => safe_get('no_rm'),
			'no_ruang' => safe_get('no_ruang'),
			'no_bed' => safe_get('no_bed'),
			'nama' => safe_get('nama'),
			'alamat' => safe_get('alamat'),
			'nama_ayah' => safe_get('nama_ayah'),
			'nama_ibu' => safe_get('nama_ibu'),
			'status' => safe_get('status'),
			'cara_bayar' => safe_get('cara_bayar'),
			'penjamin' => safe_get('penjamin'),
			'lama_rawat' => safe_get('lama_rawat'),
		];
		$data            = $this->m_laporan_pelayanan->getListDataDaftarPasienRawatInap($this->limit, $start, $search);
		$data['page']    = (int) $this->get('page');
		$data['limit']   = $this->limit;

		if ($data) :
			$this->response($data, REST_Controller::HTTP_OK); // (200)
		else :
			$this->response(array('error' => 'Data is Not Found'), REST_Controller::HTTP_NOT_FOUND);
		endif;
	}
}