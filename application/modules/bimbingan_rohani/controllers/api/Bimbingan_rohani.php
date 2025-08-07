<?php

defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class Bimbingan_rohani extends REST_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->limit = 10;
		$this->load->model('Bimbingan_rohani_model', 'm_bimbingan_rohani');
		$this->load->model('pelayanan/Pelayanan_model', 'm_pelayanan');
		$this->load->model('pendaftaran/Pendaftaran_model', 'm_pendaftaran');


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

	function get_list_permintaan_bimbingan_rohani_get()
	{
		if (!$this->get('page')) :
			$this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
		endif;

		$start          = ($this->get('page') - 1) * $this->limit;
		$search         = [
			'tanggal_awal'      => safe_get('tanggal_awal'),
			'tanggal_akhir'     => safe_get('tanggal_akhir'),
			'layanan'     		=> $this->get('layanan'),
			'no_register'       => safe_get('no_register'),
			'no_rm'             => safe_get('no_rm'),
			'nik'               => safe_get('nik'),
			'nama'              => safe_get('nama'),
		];

		// var_dump($search);exit(1);
		$data            = $this->m_bimbingan_rohani->getListDataPermintaanBimroh($this->limit, $start, $search);
		$data['page']    = (int) $this->get('page');
		$data['limit']   = $this->limit;

		if ($data) :
			$this->response($data, REST_Controller::HTTP_OK); // (200)
		endif;
	}

	
	function simpan_konfirmasi_bimroh_post()
	{		
		$data = $this->m_bimbingan_rohani->simpanKonfirmasiBimroh();
		$this->response($data, REST_Controller::HTTP_OK);
	}

	function get_list_data_bimroh_get()
    {
        if (!$this->get('page')) :
			$this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
		endif;

		$start = ($this->get('page') - 1) * $this->limit;
		$search = [
			'tanggal_awal'      => safe_get('tanggal_awal'),
			'tanggal_akhir'     => safe_get('tanggal_akhir'),
			'layanan'     		=> $this->get('layanan'),
			'no_register'       => safe_get('no_register'),
			'no_rm'             => safe_get('no_rm'),
			'nik'               => safe_get('nik'),
			'nama'              => safe_get('nama'),
			'status' 			=> 'Confirmed',
			'urut' 				=> 'Status',
		];
		
		$data = $this->m_bimbingan_rohani->getListDataBimroh($this->limit, $start, $search);
		$data['page'] = (int) $this->get('page');
		$data['limit'] = $this->limit;

		if ($data) :
			$this->response($data, REST_Controller::HTTP_OK); // (200)
		else :
			$this->response(array('error' => 'Data is Not Found'), REST_Controller::HTTP_NOT_FOUND);
		endif;
	}	

	function simpan_bimroh_pasien_baru_post() {
        $checkDataBimrohPasienBaru 	= '';
        $checkDataBimrohPasienBaru	=  $this->m_bimbingan_rohani->getFormBimrohPasienBaru(safe_post('id_layanan_pendaftaran'));
        
        $this->db->trans_begin();
        if ($checkDataBimrohPasienBaru == NULL) {

            $data = array (
		    	'id_layanan_pendaftaran' 	        => safe_post('id_layanan_pendaftaran'),			
				'kondisi_pasien' 	                => safe_post('kondisi_pasien_baru') == '' ? null : safe_post('kondisi_pasien_baru'),			
				'diagnosa_spiritual'               	=> safe_post('diagnosa_pasien_baru') == '' ? null : safe_post('diagnosa_pasien_baru'),
                'terapi_tindak_lanjut'              => safe_post('terapi_pasien_baru') == '' ? null : safe_post('terapi_pasien_baru'),
				
			);
			
            $this->db->insert('sm_order_bimroh', $data);
		}else {
			$data = array(												
				'kondisi_pasien' 	                => safe_post('kondisi_pasien_baru') == '' ? null : safe_post('kondisi_pasien_baru'),			
				'diagnosa_spiritual'               	=> safe_post('diagnosa_pasien_baru') == '' ? null : safe_post('diagnosa_pasien_baru'),
                'terapi_tindak_lanjut'              => safe_post('terapi_pasien_baru') == '' ? null : safe_post('terapi_pasien_baru'),
			);
			
            $this->db->where('id_layanan_pendaftaran', safe_post('id_layanan_pendaftaran'));
            $this->db->update('sm_order_bimroh', $data);      

        }

        if ($this->db->trans_status() === false) :
            $this->db->trans_rollback();
            $status = false;
            $message = 'Gagal simpan formulir pendampingan spiritual pasien baru';
        else :
            $this->db->trans_commit();
            $status = true;
            $message = 'Berhasil formulir pendampingan spiritual pasien baru';
        endif;
    
        $this->response(array('status' => $status, 'message' => $message), REST_Controller::HTTP_OK);
    }

	function simpan_bimroh_pasien_khusus_post() {
        $checkDataBimrohPasienKhusus 	= '';
        $checkDataBimrohPasienKhusus	=  $this->m_bimbingan_rohani->getFormBimrohPasienKhusus(safe_post('id_layanan_pendaftaran'));
        
        $this->db->trans_begin();
        if ($checkDataBimrohPasienKhusus == NULL) {

            $data = array (
		    	'id_layanan_pendaftaran' 	        => safe_post('id_layanan_pendaftaran'),			
				'kondisi_pasien' 	                => safe_post('kondisi_pasien_khusus') == '' ? null : safe_post('kondisi_pasien_khusus'),
				'diagnosa_spiritual'               	=> safe_post('diagnosa_pasien_baru') == '' ? null : safe_post('diagnosa_pasien_baru'),	
                'terapi_tindak_lanjut'              => safe_post('terapi_pasien_khusus') == '' ? null : safe_post('terapi_pasien_khusus'),
				
			);
			
            $this->db->insert('sm_order_bimroh', $data);
		}else {
			$data = array(												
				'kondisi_pasien' 	                => safe_post('kondisi_pasien_khusus') == '' ? null : safe_post('kondisi_pasien_khusus'),
				'diagnosa_spiritual'               	=> safe_post('diagnosa_pasien_khusus') == '' ? null : safe_post('diagnosa_pasien_khusus'),		
                'terapi_tindak_lanjut'              => safe_post('terapi_pasien_khusus') == '' ? null : safe_post('terapi_pasien_khusus'),
			);
			
            $this->db->where('id_layanan_pendaftaran', safe_post('id_layanan_pendaftaran'));
            $this->db->update('sm_order_bimroh', $data);      

        }

        if ($this->db->trans_status() === false) :
            $this->db->trans_rollback();
            $status = false;
            $message = 'Gagal simpan formulir pendampingan spiritual pasien baru';
        else :
            $this->db->trans_commit();
            $status = true;
            $message = 'Berhasil formulir pendampingan spiritual pasien baru';
        endif;
    
        $this->response(array('status' => $status, 'message' => $message), REST_Controller::HTTP_OK);
    }


	function pembatalan_order_bimroh_post()
	{
		$data = $this->m_bimbingan_rohani->pembatalanOrderBimroh($this->post('id', true));
		$this->response($data, REST_Controller::HTTP_OK);	
	}

	function form_bimroh_pasien_baru_get() {  

        if (!$this->get('id_layanan_pendaftaran')) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
        endif;

        $data = $this->m_bimbingan_rohani->getFormBimrohPasienBaru($this->get('id_layanan_pendaftaran'));

		if ($data != null) {
			$this->response($data, REST_Controller::HTTP_OK);
		} else {
			$this->response($data, REST_Controller::HTTP_OK);
		}
    }

	function form_bimroh_pasien_khusus_get() {  


        if (!$this->get('id_layanan_pendaftaran')) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
        endif;

        $data = $this->m_bimbingan_rohani->getFormBimrohPasienKhusus($this->get('id_layanan_pendaftaran'));

		if ($data != null) {
			$this->response($data, REST_Controller::HTTP_OK);
		} else {
			$this->response($data, REST_Controller::HTTP_OK);
		}
    }

	
}
