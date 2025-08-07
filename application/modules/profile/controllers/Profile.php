<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Profile extends SYAM_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('App_model', 'default');
        $this->load->model('Pegawai/Pegawai_model', 'm_pegawai');
        
    }

    function index()
    {
        $data['active'] = 'Profile';
        $data['modules'] = $this->default->getDataModules($this->session->userdata('id_account_group'));
        $is_login = $this->session->userdata('is_login');

        if ($is_login === true) :
            $data['hospital'] = $this->default->getDataHospital();
            $this->load->view('layouts/index', $data);
        else :
            redirect('/');
        endif;
    }

    function page_profile()
    {
        $id = $this->session->userdata('id_translucent');
        $data['biodata'] = $this->m_pegawai->getDataPegawaiById($id);
        $this->load->view('index', $data);
    }

    function upload_image()
    {
        if (!empty($_FILES['file_image']['name'])) :
            $config['upload_path']   = $_SERVER['DOCUMENT_ROOT'] . '/resources/images/avatars/';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['max_size']      = 1024;
            $config['file_name']     = 'ava_' . $this->session->userdata('id_translucent'); //set max size allowed in Kilobyte
            $config['overwrite']     = TRUE;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('file_image')) :
                $data['error'] = 'Terjadi Kesalahan | ' . $this->upload->display_errors();
                $data['status'] = false;

                die(json_encode($data));
            else :
                $data['status'] = true;
                $data['file_name'] = $this->upload->data('file_name');
                $data['success'] = 'Proses Upload Telah Berhasil';
                $data_image = explode('.', $data['file_name']);
                $data_profil = [
                    'profil' => $data_image[0],
                    'type'   => $data_image[1],
                ];
                $this->db->where('id', $this->session->userdata('id_translucent'));
                $this->db->update('sm_pegawai', $data_profil);
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

    function page_profile_hospital()
    {
        $data['hospital'] = $this->default->getDataHospital();
        $this->load->view('hospital/index', $data);
    }

    function update_profile_hospital()
    {
        $id = safe_post('id');
        $data = [
            'nama' => safe_post('nama'),
            'email' => safe_post('email'),
            'telp' => safe_post('telp'),
            'fax' => safe_post('fax'),
            'alamat' => safe_post('alamat'),
            'nip_direktur' => safe_post('nip_direktur'),
            'direktur' => safe_post('nama_direktur'),
        ];

        $this->db->where('id', $id, true)->update('sm_hospital', $data);
        $data = $this->db->affected_rows();
        if ($data) {
            redirect('/');
        } else {
            redirect('/');
        }
    }
}