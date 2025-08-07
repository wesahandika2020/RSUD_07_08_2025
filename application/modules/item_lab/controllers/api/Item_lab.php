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
class Item_lab extends REST_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->limit = 10;
        $this->load->model('Item_lab_model', 'item_lab');

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

    function get_list_item_laboratorium_get()
    {
        if (!$this->get('page')) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
        endif;

        $start          = ($this->get('page') - 1) * $this->limit;
        $search         = [
            'keyword' => $this->get('pencarian')
        ];

        $data           = $this->item_lab->getListDataItemLaboratorium($start, $this->limit, $search);
        $data['page']   = (int) $this->get('page');
        $data['limit']  = $this->limit;

        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK); // (200)
        endif;
    }
    
    function item_laboratorium_post()
    {
        $add = array(
            'item' => safe_post('item'),
            'id_layanan' => safe_post('id_layanan') !== '' ? safe_post('id_layanan') : NULL
        );
        
        $status = $this->item_lab->update_data_item_laboratorium($add);
        $message = array('status' => $status);
        $this->response($message, 200);
    }
    
    function nilai_normal_laboratorium_get()
    {
        if (!$this->get('id_item_laboratorium')) {
            $this->response(NULL, 400);
        }
        $id_item_laboratorium = $this->get('id_item_laboratorium');
        $data['nilai_normal'] = $this->item_lab->get_nilai_normal($id_item_laboratorium);
        $data['item'] = $this->item_lab->get_item_laboratorium($id_item_laboratorium);
        $this->response($data, 200);
    }
    
    function nilai_normal_laboratorium_post()
    {
        $edit = array(
            'id_item_laboratorium' => safe_post('id_item_laboratorium'),
            'kategori' => safe_post('kategori') !== '' ? safe_post('kategori') : NULL,
            'awal' => safe_post('awal'),
            'operator' => safe_post('operator'),
            'akhir' => safe_post('akhir')
        );
        $satuan = array(
            'id_satuan' => safe_post('satuan') !== '' ? safe_post('satuan') : NULL
        );
        $status = $this->item_lab->update_nilai_normal_laboratorium($edit, $satuan);
        $this->response(array('status' => $status), 200);
    }

    function item_laboratorium_edit_post()
    {
        $id = safe_post('id_item');
        $status = true;
        if ($id === '') {
            $this->response(array('status' => false), REST_Controller::HTTP_OK);
        } else {
            $edit = array('item' => safe_post('item'), 'kode_lis' => safe_post('kode_lis'));
            $status = $this->db->where("id", $id)->update("sm_item_laboratorium", $edit);
            $this->response(array('status' => $status), REST_Controller::HTTP_OK);
        }
    }

    function item_laboratorium_delete()
    {
        $id = $this->get('id', true);
        $status = $this->db->where("id", $id)->delete("sm_item_laboratorium");
        $this->response(array('status' => $status), REST_Controller::HTTP_OK);
    }

    function nilai_normal_laboratorium_delete()
    {
        $status = $this->item_lab->delete_data_nilai_normal_laboratorium($this->get("id"));
        $this->response(array('status' => $status), REST_Controller::HTTP_OK);
    }

}
