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
class Pegawai extends REST_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->limit = 10;
        $this->load->model('Pegawai_model', 'pegawai');

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

    function get_list_pegawai_get()
    {
        if (!$this->get('page')) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
        endif;

        $start          = ($this->get('page') - 1) * $this->limit;
        $search         = [
            'keyword' => $this->get('keyword')
        ];

        $data           = $this->pegawai->getListDataPegawai($start, $this->limit, $search);
        $data['page']   = (int) $this->get('page');
        $data['limit']  = $this->limit;

        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK); // (200)
        endif;
    }

    function simpan_pegawai_post()
    {
        $datetime = date('Y-m-d H:i:s');
        if (safe_post('nama_image') !== '' || safe_post('nama_image') !== null) :
            $data_image = explode('.', safe_post('nama_image'));
        endif;

        if ($this->get('id')) :
                $data_pegawai = [
                    'id'                => $this->get('id'),
                    'nip'               => (safe_post('nip_pegawai') !== '') ? safe_post('nip_pegawai') : NULL,
                    'nama'              => safe_post('nama_pegawai'),
                    'kelamin'           => safe_post('kelamin_pegawai'),
                    'agama'             => (safe_post('agama_pegawai') !== '') ? safe_post('agama_pegawai') : NULL,
                    'id_kota_kabupaten' => (safe_post('id_kota_kabupaten') !== '') ? safe_post('id_kota_kabupaten') : NULL,
                    'tgl_lahir'         => (safe_post('tgl_lahir_pegawai') !== '') ? date2mysql(safe_post('tgl_lahir_pegawai')) : NULL,
                    'alamat'            => safe_post('alamat_pegawai'),
                    'hp'                => safe_post('hp_pegawai'),
                    'updated_date'      => $datetime,
                    'gol_darah'         => (safe_post('gol_darah_pegawai') !== '') ? safe_post('gol_darah_pegawai') : NULL,
                    'id_jabatan'        => (safe_post('id_jabatan_pegawai') !== '') ? safe_post('id_jabatan_pegawai') : NULL,
                    'nik'               => (safe_post('nik_pegawai') !== '') ? safe_post('nik_pegawai') : NULL,
                    'email'             => (safe_post('email_pegawai') !== '') ? safe_post('email_pegawai') : NULL,
                    'profil'            => (safe_post('nama_image') !== '') ? $data_image[0] : NULL,
                    'type'              => (safe_post('nama_image') !== '') ? $data_image[1] : NULL,
                ];
            $id = $this->pegawai->updateData($data_pegawai);
            $message = [
                'id'     => $id,
                'status' => true,
                'token'  => $this->security->get_csrf_hash()
            ];
            $this->set_response($message, REST_Controller::HTTP_CREATED);
        else :
            $this->form_validation->set_rules('nama_pegawai', 'Nama Pegawai', 'required');
            // $this->form_validation->set_rules('id_kota_kabupaten', 'Tempat Lahir Pegawai', 'required');
            // $this->form_validation->set_rules('tgl_lahir_pegawai', 'Tanggal Lahir Pegawai', 'required');
            $this->form_validation->set_rules('kelamin_pegawai', 'Kelamin Pegawai', 'required');
            // $this->form_validation->set_rules('id_jabatan_pegawai', 'Jabatan Pegawai', 'required');

            if ($this->form_validation->run() == true) :
                $data_pegawai = [
                    'nip'               => (safe_post('nip_pegawai') !== '') ? safe_post('nip_pegawai') : NULL,
                    'nama'              => safe_post('nama_pegawai'),
                    'kelamin'           => safe_post('kelamin_pegawai'),
                    'agama'             => (safe_post('agama_pegawai') !== '') ? safe_post('agama_pegawai') : NULL,
                    'id_kota_kabupaten' => (safe_post('id_kota_kabupaten') !== '') ? safe_post('id_kota_kabupaten') : NULL,
                    'tgl_lahir'         => (safe_post('tgl_lahir_pegawai') !== '') ? date2mysql(safe_post('tgl_lahir_pegawai')) : NULL,
                    'alamat'            => safe_post('alamat_pegawai'),
                    'telp'              => 0,
                    'hp'                => safe_post('hp_pegawai'),
                    'status'            => 1,
                    'created_date'      => $datetime,
                    'gol_darah'         => (safe_post('gol_darah_pegawai') !== '') ? safe_post('gol_darah_pegawai') : NULL,
                    'id_jabatan'        => (safe_post('id_jabatan_pegawai') !== '') ? safe_post('id_jabatan_pegawai') : NULL,
                    'nik'               => (safe_post('nik_pegawai') !== '') ? safe_post('nik_pegawai') : NULL,
                    'email'             => (safe_post('email_pegawai') !== '') ? safe_post('email_pegawai') : NULL,
                    'profil'            => (safe_post('nama_image') !== '') ? $data_image[0] : NULL,
                    'type'              => (safe_post('nama_image') !== '') ? $data_image[1] : NULL,
                ];

                $id = $this->pegawai->simpanData($data_pegawai);

                $message = [
                    'status' => true,
                    'token'  => $this->security->get_csrf_hash()
                ];
                $this->set_response($message, REST_Controller::HTTP_CREATED);
            else :
                $message = [
                    'status' => false,
                ];
                $this->set_response($message, REST_Controller::HTTP_OK);
            endif;

        endif;
    }

    function get_pegawai_get()
    {
        if (!$this->get('id', true)) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
        endif;

        $data['data'] = $this->pegawai->getDataPegawaiById($this->get('id', true));
        $data['page'] = 1;
        $data['limit'] = $this->limit;

        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK); // (200)
        endif;
    }

    function delete_pegawai_delete()
    {
        $id = $this->get('id', true);
        if ($id <= 0) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
        endif;

        $this->pegawai->deletePegawai($id);
        $message = [
            'message' => 'Data telah berhasil terhapus'
        ];
        $this->set_response($message, REST_Controller::HTTP_NO_CONTENT); // (204)
    }

    function pegawai_auto_get()
    {
        $q = safe_get('q');
        $start = $this->start(safe_get('page'));
        $data = $this->pegawai->getAutoPegawai($q, $start, $this->limit);
        if ((safe_get('page') == 1) & ($q == '')) {
            $pilih[] = array('id' => '', 'nama' => ' ', 'jabatan' => '');
            $data['data'] = array_merge($pilih, $data['data']);
            $data['total'] += 1;
        }
        $this->response($data, 200);
    }


}
