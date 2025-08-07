<?php

defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

/**
 * @package         CodeIgniter
 * @subpackage      Rest Server
 * @category        Controller
 * @author          Muhamad Wahyudin
 * @license         Syams Corporation
 */
class Pemakaian_peralatan_medis extends REST_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->limit    = 10;
		$this->datetime = date('Y-m-d H:i:s');
		$this->load->model('Pemakaian_peralatan_medis_model', 'model_ppi');

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

	function kultur_auto_get()
	{
		$q = safe_get('q');
		$page = safe_get('page');
		$start = $this->start($page);
		// $key = 'dokter_auto_' . $q . '_' . $page;
		// if (!$this->redis->get($key)) :
		$data = $this->model_ppi->getKultur($q, $start, $this->limit);
		if ((safe_get('page') == 1) & ($q == '')) :
			$pilih[] = array(
				'id' => '',
				'nama' => '-- Pilih Kultur --',
				// 'jabatan' => ''
			);
			$data['data'] = array_merge($pilih, $data['data']);
			$data['data'] = $data['data'];
			$data['total'] += 1;
		endif;
		// $this->redis->setex($key, 86400, json_encode($data));
		$this->response($data, REST_Controller::HTTP_OK);
		// else :
		// exit($this->redis->get($key));
		// endif;
	}

	function antiobika_auto_get()
	{
		$q = safe_get('q');
		$page = safe_get('page');
		$start = $this->start($page);
		// $key = 'dokter_auto_' . $q . '_' . $page;
		// if (!$this->redis->get($key)) :
		$data = $this->model_ppi->getAntiobika($q, $start, $this->limit);
		if ((safe_get('page') == 1) & ($q == '')) :
			$pilih[] = array(
				'id' => '',
				'nama' => '-- Pilih Antiobika --',
				// 'jabatan' => ''
			);
			$data['data'] = array_merge($pilih, $data['data']);
			$data['data'] = $data['data'];
			$data['total'] += 1;
		endif;
		// $this->redis->setex($key, 86400, json_encode($data));
		$this->response($data, REST_Controller::HTTP_OK);
		// else :
		// exit($this->redis->get($key));
		// endif;
	}

	function get_list_form_ppi_get()
	{
		if (!$this->get('page')) :
			$this->response(null, REST_Controller::HTTP_BAD_REQUEST); // (400)
		endif;

		$start  = ($this->get('page') - 1) * $this->limit;
		$search = [
			'keyword'       		=> safe_get('keyword'),
			'tanggal_masuk'    	=> safe_get('tanggal_masuk'),
			'bangsal_search'    => safe_get('bangsal_search'),
			'pasien_keluar'    	=> safe_get('pasien_keluar')
		];

		// var_dump($search);
		// die();

		$data          = $this->model_ppi->getListPemakaianPeralatanMedis($this->limit, $start, $search);
		$data['page']  = (int) $this->get('page');
		$data['limit'] = $this->limit;

		if ($data) :
			$this->response($data, REST_Controller::HTTP_OK); // (200)
		else :
			$this->response(array('error' => 'Data is Not Found'), REST_Controller::HTTP_NOT_FOUND);
		endif;
	}

	function get_data_ppi_by_id_get($id_layanan, $tanggal_input, $id_ppi = null)
	{

		if (!$this->get('page')) :
			$this->response(null, REST_Controller::HTTP_BAD_REQUEST); // (400)
		endif;

		$data          = $this->model_ppi->getDataPPIbyID($id_layanan, $tanggal_input, $id_ppi);

		if ($data) :
			$this->response($data, REST_Controller::HTTP_OK); // (200)
		else :
			$this->response(array('error' => 'Data is Not Found'), REST_Controller::HTTP_NOT_FOUND);
		endif;
	}

	function get_list_kulturantiobika_get($id_ppi)
	{
		$data = $this->model_ppi->getListKulturAntiobika($id_ppi);

		if ($data) :
			$this->response($data, REST_Controller::HTTP_OK); // (200)
		else :
			$this->response(array('error' => 'Data is Not Found'), REST_Controller::HTTP_NOT_FOUND);
		endif;
	}

	function simpan_form_ppi_post()
	{
		$id_ppi = $this->get('id_ppi');

		$data = [
			'id_layanan_pendaftaran' 	=> $this->get('id_layanan_pendaftaran'),
			'created_at' 							=> $this->datetime,
			'update_at' 							=> $this->datetime,
			'tanggal_input' 					=> $this->get('tanggal_search'),
			'id_user' 								=> $this->session->userdata("id_translucent"),
			'id_bangsal' 							=> safe_post('id_bangsal'),
			'ett' 										=> !empty(safe_post('ett')) ? safe_post('ett') : 0,
			'cvl' 										=> !empty(safe_post('cvl')) ? safe_post('cvl') : 0,
			'ivl' 										=> !empty(safe_post('ivl')) ? safe_post('ivl') : 0,
			'uc' 											=> !empty(safe_post('uc')) ? safe_post('uc') : 0,
			'vap' 										=> !empty(safe_post('vap')) ? safe_post('vap') : 0,
			'iadp'										=> !empty(safe_post('iadp')) ? safe_post('iadp') : 0,
			'isk' 										=> !empty(safe_post('isk')) ? safe_post('isk') : 0,
			'dekubitus' 							=> !empty(safe_post('dekubitus')) ? safe_post('dekubitus') : 0,
			'plebitis' 								=> !empty(safe_post('plebitis')) ? safe_post('plebitis') : 0,
			'tirah_baring' 						=> !empty(safe_post('tirah_baring')) ? safe_post('tirah_baring') : 0,
			'operasi' 								=> !empty(safe_post('operasi')) ? safe_post('operasi') : 0,
			'ido' 										=> !empty(safe_post('ido')) ? safe_post('ido') : 0,
			// 'id_kultur' 							=> safe_post('kultur') !== "" ? safe_post('kultur') : NULL,
			// 'id_antiobika' 						=> safe_post('antiobika') !== "" ? safe_post('antiobika') : NULL,
			'keterangan' 							=> safe_post('keterangan'),
		];
		// var_dump( $data);
		// die();

		if ($this->get('id_ppi') == "null") :
			unset($data['update_at']);
			$this->model_ppi->simpanDataPPI($data);
			$message = [
				'status' => true,
				'token'  => $this->security->get_csrf_hash()
			];
			$this->set_response($message, REST_Controller::HTTP_CREATED);
		else :
			unset($data['created_at']);
			$id = $this->model_ppi->updateDataPPI($data, $this->get('id_ppi'));
			$message = [
				'id'     => convert_hash($id),
				'status' => true,
				'token'  => $this->security->get_csrf_hash()
			];
			$this->set_response($message, REST_Controller::HTTP_CREATED);
		endif;
	}

	function simpan_kultur_antiobika_post()
	{
		$data = [
			'id_ppi' 				=> safe_post('id_ppi'),
			'created_at'		=> $this->datetime,
			'id_kultur' 		=> safe_post('kultur') !== "" ? safe_post('kultur') : NULL,
			'id_antiobika' 	=> safe_post('antiobika') !== "" ? safe_post('antiobika') : NULL,
			'id_user'				=> $this->session->userdata("id_translucent"),
		];
		// var_dump( $data);
		// die();

		$this->db->insert('sm_detail_form_ppi', $data);
		$message = [
			'status' => true,
			'token'  => $this->security->get_csrf_hash()
		];

		$this->set_response($message, REST_Controller::HTTP_CREATED);
	}

	function simpan_masterdata_ppi_post()
	{
		$jenis = $this->get('jenis');
		$nama_data = safe_post('nama_masterdata');

		$data = [
			'nama' 					=> $nama_data,
			'created_at'		=> $this->datetime,
			'id_user'				=> $this->session->userdata("id_translucent"),
		];
		// var_dump( $data);
		// die();

		if ($this->model_ppi->cek_nama_masterdataPPI($jenis, $nama_data)) :
			$message = [
				'status' => false,
				'token'  => $this->security->get_csrf_hash()
			];
			$this->set_response($message, REST_Controller::HTTP_CREATED);
		else :
			if ($jenis == "kultur") :
				$this->db->insert('sm_kultur_ppi', $data);
			else :
				$this->db->insert('sm_antiobika_ppi', $data);
			endif;

			$message = [
				'status' => true,
				'token'  => $this->security->get_csrf_hash()
			];
			$this->set_response($message, REST_Controller::HTTP_CREATED);
		endif;
	}

	function hapus_form_ppi_delete()
	{
		$data = $this->model_ppi->deleteDataPPI($this->get("id_ppi"));
		$this->set_response($data, REST_Controller::HTTP_OK);
	}

	function hapus_kultur_antiobika_delete()
	{
		$id			= $this->get("id") != 0 ? $this->get("id") : NULL;
		$id_ppi = $this->get("id_ppi");

		// var_dump($id, $id_ppi);
		// die();
		$data = $this->model_ppi->deleteKulturAntiobika($id, $id_ppi);
		$this->set_response($data, REST_Controller::HTTP_OK);
	}
}
