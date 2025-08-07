<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Informasi extends SYAM_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('App_model', 'default');
    }

    function index()
    {
        $data['active'] = 'Settings';
        $data['modules'] = $this->default->getDataModules($this->session->userdata('id_account_group'));
        $is_login = $this->session->userdata('is_login');

        if ($is_login === true) :
            $data['hospital'] = $this->default->getDataHospital();
            $this->load->view('layouts/index', $data);

        else :
            redirect('/');

        endif;
    }

    function page_informasi()
    {
        $this->load->view('index');
	}
	
	function get_informasi()
	{
		$data = $this->default->getInformasi();
		echo json_encode($data);
	}

	function simpan_informasi() {
		if (!$this->input->post('id', true)) {
			echo json_encode(array('status' => false, 'message' => 'Parameter tidak lengkap!'));
		} else {
			$id = $this->input->post('id', true);
			$pesan = $this->input->post('pesan', true);
			$status = $this->input->post('status', true);

			$data = array(
				'pesan' => $pesan,
				'status' => $status,
			);

			$data = $this->db->where('id', $id, true)->update('sm_informasi', $data);
			if ($data) :
				echo json_encode(array('status' => true, 'message' => 'Berhasil melakukan update broadcast informasi!'));
			else :
				echo json_encode(array('status' => false, 'message' => 'Gagal melakukan update broadcast informasi!'));
			endif;
		}
	}
}
