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
class Modality extends REST_Controller
{

    function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->batas = 10;
        $this->limit = 20;
        $this->datetime = date('Y-m-d H:i:s');      
        $this->load->model('Modality_model', 'modality');

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

    function simpan_modality_post(){

        $this->db->trans_begin();

        $idUser = $this->session->userdata('id_translucent');

        $id = safe_post('id');

        $dataModality = array(

            "id_modality"     => (int)safe_post('id_modal'),
            "code_modality"   => safe_post('kode_modality'),
            "name_modality"   => safe_post('nama_modality'),
            "id_aetitle"      => safe_post('id_aetitle'),
            "create_date"     => $this->datetime,
            "user"            => $idUser
        
        );

        if($id !== '' && $id !== null){

            $this->db->where("id", $id)->update("sm_alat_modality", $dataModality);

            $decode = ["metaData" => ["code" => 200,"message" => "Alat Modality Berhasil Disimpan"]];

        } else {

            $modality = $this->modality->simpanModality($dataModality);

            if($modality !== NULL){

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

    function daftar_modality_get()
    {
        if (!$this->get('page')) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
        endif;
        
        $start = $this->mulai($this->get('page'));
        $search         = [
            'keyword'           => safe_get('keyword'),
        ];
        
        $data            = $this->modality->ambilDataModality($start, $this->batas, $search);
        $data['page']    = (int) $this->get('page');
        $data['limit']   = $this->batas;

        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK); // (200)
        endif;
    }


    function ambil_modality_get()
    {
        $idModality = $this->get('id');
        $data = $this->modality->cekDataModality($idModality);

        if($data === null){

            $decode = ["metaData" => ["code" => 201,"message" => 'Tidak ada Data Modality untuk id tersebut']];

        } else {

            $decode = ["metaData" => ["code" => 200,"data" => $data]];
        
        }

        $this->response($decode, REST_Controller::HTTP_OK);
        
    }

    function hapus_modality_delete()
    {
        $id = $this->get('id', true);

        if ($id <= 0) :
            $decode = ["metaData" => ["code" => 201,"message" => 'ID Tidak Ada']];
            die(json_encode($decode));
        endif;

        $this->modality->deleteModality($id);

        $decode = ["metaData" => ["code" => 200,"message" => 'Data telah berhasil terhapus']];
        $this->response($decode, REST_Controller::HTTP_OK);
    }

    function aetitle_get()
    {
        $q = safe_get('q');
        $page = safe_get('page');
        $start = $this->start($page);
        $data = $this->modality->idAetitle($q, $start, $this->limit);

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
