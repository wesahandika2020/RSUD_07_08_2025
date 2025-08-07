<?php

defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class Profile extends REST_Controller
{

    function __construct()
    {
        parent::__construct();

        $id_translucent = $this->session->userdata('id_translucent');
        if (empty($id_translucent)) :
            $this->response(array('error' => 'Anda belum login'), REST_Controller::HTTP_UNAUTHORIZED);
            exit();
        endif;
    }

    function save_signature_dokter_post()
    {
        $id_pegawai = $this->session->userdata('id_translucent');

        // delete file lama
        $tanda_tangan = $this->db->select('tanda_tangan')->where('id', $id_pegawai)->get('sm_pegawai')->row('tanda_tangan');
        if ($tanda_tangan !== null) {
            $file_path = FCPATH . 'resources/images/ttd_dokter/' . $tanda_tangan;
            if (file_exists($file_path)) {
                unlink($file_path);
            }
        }

        $this->db->where('id', $id_pegawai)->update('sm_pegawai', [
            'tanda_tangan' => $this->saveTtdDokter($this->post('signature', false))
        ]);

        $this->response([
            'status' => true,
            'message' => 'Tanda tangan berhasil disimpan'
        ], REST_Controller::HTTP_OK);
    }

    private function saveTtdDokter($base64String){
		$imageBinary = file_get_contents($base64String);

        if($imageBinary){
            // Simpan gambar ke dalam folder public dengan format file PNG
            $filename = 'ttd_dokter_' . uniqid() . '.png';
            $filepath = FCPATH . 'resources/images/ttd_dokter/' . $filename;

            // Simpan gambar ke folder public
            file_put_contents($filepath, $imageBinary);

            return $filename;
        }
        
        return $base64String;
    }

    function get_ttd_dokter_get()
    {
        $id_pegawai = $this->session->userdata('id_translucent');
        $tanda_tangan = $this->db->select('tanda_tangan')->where('id', $id_pegawai)->get('sm_pegawai')->row('tanda_tangan');

        $this->response([
            'status' => true,
            'tanda_tangan' => $tanda_tangan
        ], REST_Controller::HTTP_OK);
    }
}