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
class Dokter_radiologi extends REST_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->batas = 10;
        $this->limit = 20;
        $this->datetime = date('Y-m-d H:i:s');      
        $this->load->model('Dokter_radiologi_model', 'radio');

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

    function user_dokter_get()
    {
        $q = safe_get('q');
        $page = safe_get('page');
        $start = $this->start($page);
        $data = $this->radio->userDokter($q, $start, $this->limit);

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


    function simpan_dokter_radiologi_post(){

        $this->db->trans_begin();

        $idUser = $this->session->userdata('id_translucent');

        $id = safe_post('id');

        $userDokter = array(

            "id_dokter"             => safe_post('dokter_radiologi'),
            "username"              => safe_post('username'),
            "create_date"           => $this->datetime,
            "user"                  => $idUser
        
        );

        if($id !== '' && $id !== null){

            $this->db->where("id", $id)->update("sm_dokter_radiologi", $userDokter);

            $decode = ["metaData" => ["code" => 200,"message" => "User Name Dokter Radiologi Berhasil Disimpan"]];

        } else {

            $user = $this->radio->simpanUserDokter($userDokter);

            if($user !== NULL){

                $decode = ["metaData" => ["code" => 200,"message" => "User Name Dokter Radiologi Berhasil Disimpan"]];

            } else {

                $decode = ["metaData" => ["code" => 201,"message" => "User Name Dokter Radiologi Gagal diSimpan"]];
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

    function daftar_dokter_radiologi_get()
    {
        if (!$this->get('page')) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
        endif;
        
        $start = $this->mulai($this->get('page'));
        $search         = [
            'keyword'           => safe_get('keyword'),
        ];
        
        $data            = $this->radio->ambilDataDokter($start, $this->batas, $search);
        $data['page']    = (int) $this->get('page');
        $data['limit']   = $this->batas;

        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK); // (200)
        endif;
    }


    function ambil_username_get()
    {
        $idUser = $this->get('id');
        $data = $this->radio->cekDataUsername($idUser);

        if($data === null){

            $decode = ["metaData" => ["code" => 201,"message" => 'Tidak ada Data Username untuk id tersebut']];

        } else {

            $decode = ["metaData" => ["code" => 200,"data" => $data]];
        
        }

        $this->response($decode, REST_Controller::HTTP_OK);
        
    }

    function hapus_username_delete()
    {
        $id = $this->get('id', true);

        if ($id <= 0) :
            $decode = ["metaData" => ["code" => 201,"message" => 'ID Tidak Ada']];
            die(json_encode($decode));
        endif;

        $this->radio->deleteUsername($id);

        $decode = ["metaData" => ["code" => 200,"message" => 'Data telah berhasil terhapus']];
        $this->response($decode, REST_Controller::HTTP_OK);
    }

    


}
