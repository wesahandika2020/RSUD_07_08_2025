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
class Diet extends REST_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->limit = 10;
        $this->datetime = date('Y-m-d H:i:s');      
        $this->load->model('Diet_model', 'diet');

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

    function diet_list_get()
    {
        if (!$this->get('page')) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
        endif;
        
        $start          = ($this->get('page') - 1) * $this->limit;
        $search         = [
            'keyword'           => safe_get('keyword'),
        ];
        
        $data            = $this->diet->getListDiet($start, $this->limit, $search);
        $data['page']    = (int) $this->get('page');
        $data['limit']   = $this->limit;

        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK); // (200)
        endif;
    }

    function simpan_diet_post()
    {               
        $this->db->trans_begin();

        $diet = array(
            'nama'          => safe_post('nama_diet'),
            'kode'          => safe_post('kode_diet'),
            'is_active'     => 1, 
            'created_at'    => $this->datetime, 
            'created_by'    => $this->session->userdata('id_translucent'),             
        );                      

        $this->db->insert('sm_diet', $diet);   
        $idPaket = $this->db->insert_id();          

        foreach (safe_post('item_diet') as $key => $value) {
            $itemDiet = array(
                'id_diet' => $idPaket,
                'nama' => $value,
                'created_at' => $this->datetime,
                'created_by' => $this->session->userdata('id_translucent')
            );

            $this->db->insert('sm_item_diet', $itemDiet);
        }

        if ($this->db->trans_status() === false) :
            $this->db->trans_rollback();
            $status = false;
            $message = 'Gagal menambahkan Item Diet';
        else :
            $this->db->trans_commit();
            $status = true;
            $message = 'Berhasil menambahkan Item Diet';
        endif;

        $this->response(array('status' => $status, 'message' => $message));
    }

    function get_detail_item_diet_get()
    {
        if (!$this->get('id_diet')) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
        endif;

        $data = $this->diet->getDetailItemDietById($this->get('id_diet'));

        $this->response($data, REST_Controller::HTTP_OK); // (200)
    }

    function hapus_item_diet_post()
    {               
        $this->db->trans_begin();

        $this->db->delete('sm_item_diet', array(
            'id' => safe_post('idItemDiet'),
        ));

        if ($this->db->trans_status() === false) :
            $this->db->trans_rollback();
            $status = false;
            $message = 'Gagal menghapus Item Diet';
        else :
            $this->db->trans_commit();
            $status = true;
            $message = 'Berhasil menghapus Item Diet';
        endif;

        $this->response(array('status' => $status, 'message' => $message));
    }

    function update_item_post()
    {               
        $this->db->trans_begin();               

        $dataDiet = array(
            'nama'          => safe_post('nama_diet'),
            'kode'         => safe_post('kode_diet'),
            'updated_at'    => $this->datetime,
            'updated_by'    => $this->session->userdata('id_translucent')
        );

        $this->db->where('id', safe_post('id_diet'));
        $this->db->update('sm_diet', $dataDiet);

        foreach (safe_post('item_diet') as $key => $value) {
            $checkItem = $this->diet->getDietByIdDietIdItemDiet(safe_post('id_diet'), $value);            

            if($checkItem == NULL) {
                $itemDiet = array(
                    'id_diet' => safe_post('id_diet'),
                    'nama' => $value,
                    'created_at' => $this->datetime,
                    'created_by' => $this->session->userdata('id_translucent')
                );
    
                $this->db->insert('sm_item_diet', $itemDiet);
            }           
        }       

        if ($this->db->trans_status() === false) :
            $this->db->trans_rollback();
            $status = false;
            $message = 'Gagal mengubah item Diet';
        else :
            $this->db->trans_commit();
            $status = true;
            $message = 'Berhasil mengubah item Diet';
        endif;

        $this->response(array('status' => $status, 'message' => $message));
    }

    function delete_diet_post()
    {               
        $this->db->trans_begin();

        $checkDetail = $this->diet->getToCheckDelete(safe_post('idDiet')); 

        $kirimStatus = '';
        $kirimMessage = '';

        if(empty($checkDetail)){

            $this->db->delete('sm_diet', array('id' => safe_post('idDiet')));

        } else {

            $kirimStatus = false;
        
        }

        
        

        if ($this->db->trans_status() === false){
            $this->db->trans_rollback();

            $status = false;
            $message = 'Gagal menghapus Masterdata Diet';
            

        } else {

            $this->db->trans_commit();
            if($kirimStatus === false){

                $status = false;
                $message = 'Silakan Hapus Item Diet Terlebih Dahulu';
                
            } else {

                $status = true;
                $message = 'Berhasil menghapus Masterdata Diet';

            }

        }

        $this->response(array('status' => $status, 'message' => $message));
    }

    function aktifkan_masterdata_post()
    {               
        $this->db->trans_begin();       

        $data = array(
            'is_active'         => safe_post('status'),
            'updated_at'        => $this->datetime,
            'updated_by'        => $this->session->userdata('id_translucent')
        );

        $this->db->where('id', safe_post('id'));
        $this->db->update('sm_diet', $data);

        if ($this->db->trans_status() === false) :
            $this->db->trans_rollback();
            $status = false;
            $message = 'Gagal mengubah status Masterdata Diet';
        else :
            $this->db->trans_commit();
            $status = true;
            $message = 'Berhasil mengubah status Masterdata Diet';
        endif;

        $this->response(array('status' => $status, 'message' => $message));
    }


}
