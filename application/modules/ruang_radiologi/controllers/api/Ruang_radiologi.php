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
class Ruang_radiologi extends REST_Controller
{

    function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->batas = 10;
        $this->limit = 20;
        $this->datetime = date('Y-m-d H:i:s');      
        $this->load->model('Ruang_radiologi_model', 'ruang');

        $id_translucent = $this->session->userdata('id_translucent');
        if (empty($id_translucent)) :
            $this->response(array('error' => 'Anda belum login'), REST_Controller::HTTP_UNAUTHORIZED);
            exit();
        endif;
    }

    private function mulai($page)
    {
        return (($page - 1) * $this->batas);
    }

    private function start($page)
    {
        return (($page - 1) * $this->limit);
    }

    function simpan_ruang_radiologi_post(){

        $this->db->trans_begin();

        $idUser = $this->session->userdata('id_translucent');

        $id = safe_post('id');

        $dataRuang = array(

            "id_alat"     => (int)safe_post('id_alat'),
            "nama_ruangan"   => safe_post('nama_ruangan'),
            "id_layanan"   => (int)safe_post('nama_layanan'),
            "create_date"     => $this->datetime,
            "user"            => $idUser
        
        );

        if($id !== '' && $id !== null){

            $this->db->where("id", $id)->update("sm_ruang_radiologi", $dataRuang);

            $decode = ["metaData" => ["code" => 200,"message" => "Ruang Radiologi Berhasil Disimpan"]];

        } else {

            $ruangRadiologi = $this->ruang->simpanRuangRadiologi($dataRuang);

            if($ruangRadiologi !== NULL){

                $decode = ["metaData" => ["code" => 200,"message" => "Ruang Radiologi Berhasil Disimpan"]];

            } else {

                $decode = ["metaData" => ["code" => 201,"message" => "Ruang Radiologi Gagal diSimpan"]];
            }

        }

        if ($this->db->trans_status() === FALSE) :
            $this->db->trans_rollback();
            $status = FALSE;
        else :
            $this->db->trans_commit();
            $status = TRUE;
        endif;

        $this->response($decode, REST_Controller::HTTP_OK);
    }

    function daftar_ruang_radiologi_get()
    {
        if (!$this->get('page')) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
        endif;
        
        $start = $this->mulai($this->get('page'));
        $search         = [
            'keyword'           => safe_get('keyword'),
        ];
        
        $data            = $this->ruang->ambilDataRuang($start, $this->batas, $search);
        $data['page']    = (int) $this->get('page');
        $data['limit']   = $this->batas;

        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK); // (200)
        endif;
    }


    function ambil_ruang_radiologi_get()
    {
        $idRuang = $this->get('id');
        $data = $this->ruang->cekDataRuang($idRuang);

        if($data === null){

            $decode = ["metaData" => ["code" => 201,"message" => 'Tidak ada Data Modality untuk id tersebut']];

        } else {

            $decode = ["metaData" => ["code" => 200,"data" => $data]];
        
        }

        $this->response($decode, REST_Controller::HTTP_OK);
        
    }

    function hapus_ruang_radiologi_delete()
    {
        $id = $this->get('id', true);

        if ($id <= 0) :
            $decode = ["metaData" => ["code" => 201,"message" => 'ID Tidak Ada']];
            die(json_encode($decode));
        endif;

        $this->ruang->deleteRuang($id);

        $decode = ["metaData" => ["code" => 200,"message" => 'Data telah berhasil terhapus']];
        $this->response($decode, REST_Controller::HTTP_OK);
    }

    function alat_modality_get()
    {
        $q = safe_get('q');
        $page = safe_get('page');
        $start = $this->start($page);
        $data = $this->ruang->alatModality($q, $start, $this->limit);

        if ((safe_get('page') == 1) & ($q == '')) :
            $pilih[] = array(
                'id' => '', 
                'nama' => ''
            );
            $data['data'] = array_merge($pilih, $data['data']);
            $data['total'] += 1;
        endif;

        $this->response($data, REST_Controller::HTTP_OK);
        
    }

    function nama_layanan_get()
    {
        $q = safe_get('q');
        $page = safe_get('page');
        $start = $this->start($page);
        $data = $this->ruang->namaLayanan($q, $start, $this->limit);

        if ((safe_get('page') == 1) & ($q == '')) :
            $pilih[] = array(
                'id' => '', 
                'nama' => ''
            );
            $data['data'] = array_merge($pilih, $data['data']);
            $data['total'] += 1;
        endif;

        $this->response($data, REST_Controller::HTTP_OK);
        
    }

}
