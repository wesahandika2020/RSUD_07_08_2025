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
class Ae_title extends REST_Controller
{

    function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->batas = 10;
        $this->datetime = date('Y-m-d H:i:s');      
        $this->load->model('Ae_title_model', 'ae');

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

    function simpan_ae_title_post(){

        $this->db->trans_begin();

        $idUser = $this->session->userdata('id_translucent');

        $id = safe_post('id');

        $dataAeTitle = array(

            "id_ae"           => (int)safe_post('id_ae'),
            "aetitle"         => safe_post('nama_aetitle'),
            "ip"              => safe_post('ip_address'),
            "create_date"     => $this->datetime,
            "user"            => $idUser
        
        );

        if($id !== '' && $id !== null){

            $this->db->where("id", $id)->update("sm_ae_title", $dataAeTitle);

            $decode = ["metaData" => ["code" => 200,"message" => "Ae Title Berhasil Disimpan"]];

        } else {

            $ae = $this->ae->simpanAeTitle($dataAeTitle);

            if($ae !== NULL){

                $decode = ["metaData" => ["code" => 200,"message" => "Ae Title Berhasil Disimpan"]];

            } else {

                $decode = ["metaData" => ["code" => 201,"message" => "Ae Title Gagal diSimpan"]];
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

    function daftar_ae_title_get()
    {
        if (!$this->get('page')) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
        endif;
        
        $start = $this->mulai($this->get('page'));
        $search         = [
            'keyword'           => safe_get('keyword'),
        ];
        
        $data            = $this->ae->ambilDataAetitle($start, $this->batas, $search);
        $data['page']    = (int) $this->get('page');
        $data['limit']   = $this->batas;

        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK); // (200)
        endif;
    }


    function ambil_aetitle_get()
    {
        $idUser = $this->get('id');
        $data = $this->ae->cekDataAeTitle($idUser);

        if($data === null){

            $decode = ["metaData" => ["code" => 201,"message" => 'Tidak ada Data Username untuk id tersebut']];

        } else {

            $decode = ["metaData" => ["code" => 200,"data" => $data]];
        
        }

        $this->response($decode, REST_Controller::HTTP_OK);
        
    }

    function hapus_aetitle_delete()
    {
        $id = $this->get('id', true);

        if ($id <= 0) :
            $decode = ["metaData" => ["code" => 201,"message" => 'ID Tidak Ada']];
            die(json_encode($decode));
        endif;

        $this->ae->deleteAeTitle($id);

        $decode = ["metaData" => ["code" => 200,"message" => 'Data telah berhasil terhapus']];
        $this->response($decode, REST_Controller::HTTP_OK);
    }

    


}
