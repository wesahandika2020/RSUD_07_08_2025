<?php

defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;
class Icd_ix extends REST_Controller
{

    function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->batas = 10;
        $this->datetime = date('Y-m-d H:i:s');      
        $this->load->model('Icd_ix_model', 'm_icd_ix');

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

    function get_list_icd_ix_get()
    {
        if (!$this->get('page')) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
        endif;
        
        $start = $this->mulai($this->get('page'));
        $search         = [
            'keyword'   => safe_get('keyword'),
            'status'    => safe_get('status'),
        ];
        
        $data            = $this->m_icd_ix->listIcdIx($start, $this->batas, $search);
        $data['page']    = (int) $this->get('page');
        $data['status']    = safe_get('status');
        $data['limit']   = $this->batas;

        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK); // (200)
        endif;
    }

    function update_status_post()
    {
        if (!safe_post('id')) {
            die(json_encode(['status' => false, 'message' => 'Parameter tidak lengkap.']));
        }
        $param = [
            'id' => safe_post('id'),
            'status' => safe_post('status')
        ];
        $data = $this->m_icd_ix->updateStatus($param);
        if ($data) {
            $this->response(['status' => true, 'message' => 'Berhasil mengubah status.'], REST_Controller::HTTP_OK);
        } else {
            $this->response(['status' => false, 'message' => 'Gagal mengubah status.'], REST_Controller::HTTP_OK);
        }
    }

    function simpan_icd9_post(){
        $this->db->trans_begin();
        $id        = safe_post('id');
        $kode_icd9 = trim(safe_post('kode_icd9_add'));
        $nama      = trim(safe_post('nama_add'));      
        $is_aktif  = safe_post('status_add');    

        // EDIT
        if($id !== '' && $id !== null){
            $id = $this->m_icd_ix->ubahIcd9($id,$kode_icd9,$nama,$is_aktif);
            if($id !== NULL){
                $decode = ["metaData" => ["code" => 200,"message" => "ICD IX Berhasil DiUbah"]];
            } else {
                $decode = ["metaData" => ["code" => 201,"message" => "ICD IX Gagal DiUbah"]];
            }

        // SIMPAN
        } else {
            $query = $this->db->query("SELECT COUNT(*) as count FROM sm_icd_ix WHERE icd9='".$kode_icd9."'");
            $cek_data = $query->row()->count;

            // Data Sudah Ada
            if($cek_data>=1){ 
                $decode = ["metaData" => ["code" => 201,"message" => "ICD IX Gagal diSimpan, Kode ICD IX sudah ada. "]];

            // Data Baru
            } else {
                $id = $this->m_icd_ix->simpanIcd9($kode_icd9,$nama,$is_aktif);
                if($id !== NULL){
                    $decode = ["metaData" => ["code" => 200,"message" => "ICD IX Berhasil Disimpan"]];
                } else {
                    $decode = ["metaData" => ["code" => 201,"message" => "ICD IX Gagal diSimpan"]];
                }
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


    function get_icd9_get()
    {
        $id   = $this->get('id');
        $data = $this->db->select('*')->from('sm_icd_ix')->where('id', $id)->get() ->row();

        if($data === null){
            $decode = ["metaData" => ["code" => 201,"message" => 'Tidak ada Data ICD IX untuk id tersebut']];
        } else {
            $decode = ["metaData" => ["code" => 200,"data" => $data]];        
        }
        $this->response($decode, REST_Controller::HTTP_OK);        
    }

    function hapus_icd9_delete()
    {
        $id = $this->get('id', true);

        if ($id <= 0) :
            $decode = ["metaData" => ["code" => 201,"message" => 'Data Tidak Ada']];
            die(json_encode($decode));
        endif;

        $this->m_icd_ix->deleteIcd9($id);

        $decode = ["metaData" => ["code" => 200,"message" => 'Data telah berhasil terhapus']];
        $this->response($decode, REST_Controller::HTTP_OK);
    }

}
