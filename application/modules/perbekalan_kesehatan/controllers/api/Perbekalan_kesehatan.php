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
class Perbekalan_kesehatan extends REST_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->limit = 10;
        $this->datetime = date('Y-m-d H:i:s');
        $this->load->model('Perbekalan_kesehatan_model', 'm_pkrt');

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

    function perbekalan_kesehatan_list_get()
    {
        if (!$this->get('page')) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
        endif;

        $start          = $this->start($this->get('page'));
        $search         = [
            'keyword'           => safe_get('keyword'),
        ];

        $data            = $this->m_pkrt->getListPKRT($start, $this->limit, $search);
        $data['page']    = (int) $this->get('page');
        $data['limit']   = $this->limit;

        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK); // (200)
        endif;
    }

    function simpan_pkrt_post()
    {
        $this->db->trans_begin();

        $data = array(
            'nama'          => safe_post('nama'),
            'is_active'     => safe_post('status_active'),
            'created_at'    => $this->datetime,
            'created_by'    => $this->session->userdata('id_translucent'),
        );

        $this->db->insert('sm_perbekalan_kesehatan', $data);

        if ($this->db->trans_status() === false) :
            $this->db->trans_rollback();
            $status = false;
            $message = 'Gagal menambahkan Item Barang PKRT';
        else :
            $this->db->trans_commit();
            $status = true;
            $message = 'Berhasil menambahkan Item Barang PKRT';
        endif;

        $this->response(array('status' => $status, 'message' => $message));
    }

    function get_detail_pkrt_get()
    {
        if (!$this->get('id_pkrt')) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
        endif;

        $data = $this->m_pkrt->getPKRTById($this->get('id_pkrt'));

        $this->response($data, REST_Controller::HTTP_OK); // (200)
    }

    function update_item_post()
    {
        $this->db->trans_begin();

        $data = array(
            'nama'          => safe_post('nama'),
            'is_active'     => safe_post('status_active'),
            'updated_at'    => $this->datetime,
            'updated_by'    => $this->session->userdata('id_translucent')
        );

        $this->db->where('id', safe_post('id_pkrt'));
        $this->db->update('sm_perbekalan_kesehatan', $data);

        if ($this->db->trans_status() === false) :
            $this->db->trans_rollback();
            $status = false;
            $message = 'Gagal mengubah data PKRT';
        else :
            $this->db->trans_commit();
            $status = true;
            $message = 'Berhasil mengubah data PKRT';
        endif;

        $this->response(array('status' => $status, 'message' => $message));
    }

    function delete_pkrt_post()
    {
        $idPKRT = safe_post('idPKRT');
        
        $this->db->trans_begin();

        $checkData = $this->db->get_where('sm_perbekalan_kesehatan', ['id' => $idPKRT])->row()->id ?? null;
        $kirimStatus = '';

        if (!empty($checkData)) {
            $this->db->delete('sm_perbekalan_kesehatan', array('id' => $idPKRT));
        } else {
            $kirimStatus = false;
        }

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();

            $status = false;
            $message = 'Gagal menghapus Masterdata PKRT';
        } else {

            $this->db->trans_commit();
            if ($kirimStatus === false) {

                $status = false;
                $message = 'Silakan Hapus Item PKRT Terlebih Dahulu';
            } else {

                $status = true;
                $message = 'Berhasil menghapus Masterdata PKRT';
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
        $this->db->update('sm_perbekalan_kesehatan', $data);

        if ($this->db->trans_status() === false) :
            $this->db->trans_rollback();
            $status = false;
            $message = 'Gagal mengubah status Masterdata PKRT';
        else :
            $this->db->trans_commit();
            $status = true;
            $message = 'Berhasil mengubah status Masterdata PKRT';
        endif;

        $this->response(array('status' => $status, 'message' => $message));
    }
}
