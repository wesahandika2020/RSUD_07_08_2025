<?php

defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class Paket_mcu extends REST_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->limit = 10;
		$this->datetime = date('Y-m-d H:i:s');		
		$this->load->model('Paket_mcu_model', 'm_paket_mcu');

		$id_translucent = $this->session->userdata('id_translucent');
		if (empty($id_translucent)) :
			$this->response(array('error' => 'Anda belum login'), REST_Controller::HTTP_UNAUTHORIZED);
			exit();
		endif;
	}

	function store_post()
	{				
		$this->db->trans_begin();

		$paket = array(
            'nama'			=> safe_post('nama_paket'),
            'harga'         => safe_post('harga_paket'),
            'is_active'   	=> 1, 
            'created_at'    => $this->datetime, 
            'created_by'    => $this->session->userdata('id_translucent'),             
        );        				

		$this->db->insert('sm_paket', $paket);	 
		$idPaket = $this->db->insert_id();			

		foreach (safe_post('list_tindakan') as $key => $value) {
			$paketTindakan = array(
				'id_paket' => $idPaket,
				'id_tindakan' => $value,
				'created_at' => $this->datetime,
				'created_by' => $this->session->userdata('id_translucent')
			);

			$this->db->insert('sm_paket_tindakan', $paketTindakan);
		}

		if ($this->db->trans_status() === false) :
			$this->db->trans_rollback();
			$status = false;
			$message = 'Gagal menambahkan paket MCU';
		else :
			$this->db->trans_commit();
			$status = true;
			$message = 'Berhasil menambahkan paket MCU';
		endif;

		$this->response(array('status' => $status, 'message' => $message));
	}

	function get_list_get()
    {
        if (!$this->get('page')) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
        endif;

        $start          = ($this->get('page') - 1) * $this->limit;
        $search         = [
            'keyword' => $this->get('keyword')
        ];

        $data           = $this->m_paket_mcu->getList($start, $this->limit, $search);
        $data['page']   = (int) $this->get('page');
        $data['limit']  = $this->limit;

        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK); // (200)
        endif;
    }

	function get_detail_get()
	{
		if (!$this->get('id_paket')) :
			$this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
		endif;

		$data = $this->m_paket_mcu->getDetailByIdPaket($this->get('id_paket'));

		$this->response($data, REST_Controller::HTTP_OK); // (200)
	}

	function delete_paket_post()
	{				
		$this->db->trans_begin();

		$this->db->delete('sm_paket', array('id' => safe_post('idPaket')));

		if ($this->db->trans_status() === false) :
			$this->db->trans_rollback();
			$status = false;
			$message = 'Gagal menghapus paket MCU';
		else :
			$this->db->trans_commit();
			$status = true;
			$message = 'Berhasil menghapus paket MCU';
		endif;

		$this->response(array('status' => $status, 'message' => $message));
	}

	function activate_paket_post()
	{				
		$this->db->trans_begin();		

		$data = array(
			'is_active' 		=> safe_post('status'),
			'updated_at'		=> $this->datetime,
			'updated_by'		=> $this->session->userdata('id_translucent')
		);

		$this->db->where('id', safe_post('id'));
		$this->db->update('sm_paket', $data);

		if ($this->db->trans_status() === false) :
			$this->db->trans_rollback();
			$status = false;
			$message = 'Gagal mengubah status paket MCU';
		else :
			$this->db->trans_commit();
			$status = true;
			$message = 'Berhasil mengubah status paket MCU';
		endif;

		$this->response(array('status' => $status, 'message' => $message));
	}

	function update_paket_post()
	{				
		$this->db->trans_begin();				

		$dataPaket = array(
			'nama' 			=> safe_post('nama_paket'),
			'harga' 		=> safe_post('harga_paket'),
			'updated_at'	=> $this->datetime,
			'updated_by'	=> $this->session->userdata('id_translucent')
		);

		$this->db->where('id', safe_post('id_paket'));
		$this->db->update('sm_paket', $dataPaket);

		foreach (safe_post('list_tindakan') as $key => $value) {
			$checkTindakan = $this->m_paket_mcu->getPaketByIdPaketIdTindakan(safe_post('id_paket'), $value);			

			if($checkTindakan == NULL) {
				$paketTindakan = array(
					'id_paket' => safe_post('id_paket'),
					'id_tindakan' => $value,
					'created_at' => $this->datetime,
					'created_by' => $this->session->userdata('id_translucent')
				);
	
				$this->db->insert('sm_paket_tindakan', $paketTindakan);
			}			
		}		

		if ($this->db->trans_status() === false) :
			$this->db->trans_rollback();
			$status = false;
			$message = 'Gagal mengubah paket MCU';
		else :
			$this->db->trans_commit();
			$status = true;
			$message = 'Berhasil mengubah paket MCU';
		endif;

		$this->response(array('status' => $status, 'message' => $message));
	}

	function delete_tindakan_paket_post()
	{				
		$this->db->trans_begin();

		$this->db->delete('sm_paket_tindakan', array(
			'id_paket' => safe_post('idPaket'),
			'id_tindakan' => safe_post('idTindakan')
		));

		if ($this->db->trans_status() === false) :
			$this->db->trans_rollback();
			$status = false;
			$message = 'Gagal menghapus tindakan';
		else :
			$this->db->trans_commit();
			$status = true;
			$message = 'Berhasil menghapus tindakan';
		endif;

		$this->response(array('status' => $status, 'message' => $message));
	}
}
