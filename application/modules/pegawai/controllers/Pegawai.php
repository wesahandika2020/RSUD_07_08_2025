<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pegawai extends SYAM_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('App_model', 'default');
        $this->load->model('Masterdata_model', 'masterdata');
    }

    function index()
    {
        $data['active'] = 'Masterdata';
        $data['modules'] = $this->default->getDataModules($this->session->userdata('id_account_group'));
        $is_login = $this->session->userdata('is_login');

        if ($is_login === true) :
            $data['hospital'] = $this->default->getDataHospital();
            $this->load->view('layouts/index', $data);

        else :
            redirect('/');

        endif;
    }

    function page_pegawai()
    {
        $this->load->view('pegawai/index');
    }

    function page_jabatan()
    {
        $this->load->view('pegawai/jabatan/index');
    }

    function page_kepegawaian()
    {
        $data['kelamin'] = $this->masterdata->getKelamin();
        $data['gol_darah'] = $this->masterdata->getGolonganDarah();
        $data['agama']   = $this->masterdata->getAgama();
        $this->load->view('pegawai/kepegawaian/index', $data);
    }

    function upload_image()
    {
        if (!empty($_FILES['file_image']['name'])) :
            $config['upload_path']          = $_SERVER['DOCUMENT_ROOT'] . '/resources/images/avatars/';
            $config['allowed_types']        = 'jpg|png|jpeg';
            $config['max_size']             = 1024; //set max size allowed in Kilobyte
            $config['overwrite']            = TRUE;
            $config['encrypt_name']         = TRUE;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('file_image')) :
                $data['error'] = 'Terjadi Kesalahan | ' . $this->upload->display_errors();
                $data['status'] = false;

                die(json_encode($data));
            else :
                $data['status'] = true;
                $data['file_name'] = $this->upload->data('file_name');
                $data['success'] = 'Proses Upload Telah Berhasil';
                die(json_encode($data));
            endif;
        else :
            die(json_encode(['status' => false]));
        endif;
    }

    function delete_image_old()
    {
        if (($_POST['file_tmp'] !== NULL) && ($_POST['file_tmp'] !== "")) {
            $file = $_SERVER['DOCUMENT_ROOT'] . '/resources/images/avatars/' . $_POST['file_tmp'];
            unlink($file);
            echo json_encode(array('status' => TRUE));
        } else {
            echo json_encode(array('status' => FALSE));
        }
    }

    function page_tenaga_medis()
    {
        $this->load->view('pegawai/nadis/index');
    }
}
