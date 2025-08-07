<?php

defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class Bimbingan_talqin extends REST_Controller{

    function __construct()
	{
		parent::__construct();
		$this->limit = 10;
		$this->load->model('Bimbingan_talqin_model', 'm_bimbingan_talqin');
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

	function get_list_permintaan_bimbingan_talqin_get()
	{
		if (!$this->get('page')) :
			$this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
		endif;

		$start          = ($this->get('page') - 1) * $this->limit;
		$search         = [
			'tanggal_awal'      => safe_get('tanggal_awal'),
			'tanggal_akhir'     => safe_get('tanggal_akhir'),
			'jenis_layanan'     => $this->get('jenis'),
			'no_register'       => safe_get('no_register'),
			'no_rm'             => safe_get('no_rm'),
			'nik'               => safe_get('nik'),
			'nama'              => safe_get('nama'),
		];

		$data            = $this->m_bimbingan_talqin->getListDataPermintaanTalqin($this->limit, $start, $search);
		$data['page']    = (int) $this->get('page');
		$data['limit']   = $this->limit;

		if ($data) :
			$this->response($data, REST_Controller::HTTP_OK); // (200)
		endif;
	}

	function simpan_konfirmasi_talqin_post()
	{		
		$data = $this->m_bimbingan_talqin->simpanKonfirmasiTalqin();
		$this->response($data, REST_Controller::HTTP_OK);
	}

	function get_list_data_talqin_get()
    {
        if (!$this->get('page')) :
			$this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
		endif;

		$start = ($this->get('page') - 1) * $this->limit;
		$search = [
			'tanggal_awal'      => safe_get('tanggal_awal'),
			'tanggal_akhir'     => safe_get('tanggal_akhir'),
			'jenis_layanan'     => $this->get('jenis'),
			'no_register'       => safe_get('no_register'),
			'no_rm'             => safe_get('no_rm'),
			'nik'               => safe_get('nik'),
			'nama'              => safe_get('nama'),
			'status' 			=> 'Confirmed',
			'urut' 				=> 'Status',
		];
		
		$data = $this->m_bimbingan_talqin->getListDataTalqin($this->limit, $start, $search);
		$data['page'] = (int) $this->get('page');
		$data['limit'] = $this->limit;

		if ($data) :
			$this->response($data, REST_Controller::HTTP_OK); // (200)
		else :
			$this->response(array('error' => 'Data is Not Found'), REST_Controller::HTTP_NOT_FOUND);
		endif;
	}

	function form_talqin_get() {  

        if (!$this->get('id_layanan_pendaftaran')) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
        endif;

        $data = $this->m_bimbingan_talqin->getFormTalqin($this->get('id_layanan_pendaftaran'));

		if ($data != null) {
			$this->response($data, REST_Controller::HTTP_OK);
		} else {
			$this->response($data, REST_Controller::HTTP_OK);
		}
    }

	function simpan_form_talqin_post() {
        $checkDataTalqin 	= '';
		
        $checkDataTalqin	=  $this->m_bimbingan_talqin->getFormTalqin(safe_post('id_layanan_pendaftaran'));
        
        $this->db->trans_begin();
		
        if ($checkDataTalqin == NULL) {

            $data = array (
		    	'id_layanan_pendaftaran' 	        => safe_post('id_layanan_pendaftaran'),			
				'kondisi_pasien_talqin' 	        => safe_post('kondisi_pasien_talqin') == '' ? null : safe_post('kondisi_pasien_talqin'),			
                'terapi_advice_talqin'              => safe_post('terapi_pasien_talqin') == '' ? null : safe_post('terapi_pasien_talqin'),
				
			);
			
            $this->db->insert('sm_order_talqin', $data);
		}else {
			$data = array(												
				'kondisi_pasien_talqin' 	        => safe_post('kondisi_pasien_talqin') == '' ? null : safe_post('kondisi_pasien_talqin'),			
                'terapi_advice_talqin'              => safe_post('terapi_pasien_talqin') == '' ? null : safe_post('terapi_pasien_talqin'),
			);
			
            $this->db->where('id_layanan_pendaftaran', safe_post('id_layanan_pendaftaran'));
            $this->db->update('sm_order_talqin', $data);
		}

		// var_dump(safe_post('id_layanan_pendaftaran'));exit(1);
        if ($this->db->trans_status() === false) :
            $this->db->trans_rollback();
            $status = false;
            $message = 'Gagal simpan formulir permohonan pendampingan pasien sakaratul maut';
        else :
            $this->db->trans_commit();
            $status = true;
            $message = 'Berhasil simpan formulir permohonan pendampingan pasien sakaratul maut';
        endif;
    
        $this->response(array('status' => $status, 'message' => $message), REST_Controller::HTTP_OK);
    }

}