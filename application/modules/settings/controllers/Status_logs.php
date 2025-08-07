<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Status_logs extends SYAM_Controller
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

    function page_status_logs()
    {
        $this->load->view('status_logs/index');
    }

    function get_konfigurasi_logs()
    {
        $data = $this->db->get('sm_konfigurasi_logs')->row();
        echo json_encode($data);
    }

    function ubah_status()
    {
        $status = $this->input->get('status');
        if ($status == 'On') {
            $data = $this->db->where('id', '1', true)->update('sm_konfigurasi_logs', array('status' => 'On'));
        } else {
            $data = $this->db->where('id', '1', true)->update('sm_konfigurasi_logs', array('status' => 'Off'));
        }

        if ($data) {
            echo json_encode(array('status' => true));
        } else {
            echo json_encode(array('status' => false));
        }
    }

    public function get_jam_server()
    {
        echo json_encode(['jam_server' => date('Y-m-d H:i:s')]);
    }
}
