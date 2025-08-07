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
class Hasil_fisioterapi extends REST_Controller
{

    function __construct()
    {
        parent::__construct();
		$this->limit = 10;
		$this->datetime = date('Y-m-d H:i:s');
        $this->load->model('Hasil_fisioterapi_model', 'm_hasil_fisioterapi');
        $this->load->model('pelayanan/Pelayanan_model', 'm_pelayanan');

        $id_translucent = $this->session->userdata('id_translucent');
        if (empty($id_translucent)) :
            $this->response(array('error' => 'Anda belum login'), REST_Controller::HTTP_UNAUTHORIZED);
            exit();
        endif;
    }

    function get_list_hasil_fisioterapi_get()
    {
        if (!$this->get('page')) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
        endif;
        
        $start = ($this->get('page') - 1) * $this->limit;
        $search = [
            'tanggal_awal'    => safe_get('tanggal_awal'),
            'tanggal_akhir'   => safe_get('tanggal_akhir'),
            'no_register'     => safe_get('no_register'),
            'no_rm'           => safe_get('no_rm'),
            'nama'            => safe_get('nama'),
            'jenis_layanan'   => safe_get('jenis_layanan'),
            'status_hasil'    => safe_get('status_hasil'),
        ];
        
        $data = $this->m_hasil_fisioterapi->getListDataHasilFisioterapi($this->limit, $start, $search);
        $data['page'] = (int) $this->get('page');
        $data['limit'] = $this->limit;

        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK); // (200)
        endif;
    }

    function get_permintaan_pemeriksaan_fisioterapi_get() 
    {
        if (!$this->get('id', true)) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
        endif;


        $data = $this->m_pelayanan->getPemeriksaanFisioterapi($this->get('id', true), 'detail');
        $data->detail = $this->m_pelayanan->getPemeriksaanFisioterapiDetail($data->id);

        if (!empty($data->id_order_fisioterapi)) :
            $id_order_fisioterapi = $data->id_order_fisioterapi;
            $sql = "select * from sm_order_fisioterapi where id = '".$id_order_fisioterapi."'";
            $data->order = $this->db->query($sql)->row_array();
        endif;

        $this->response($data, REST_Controller::HTTP_OK);
    }

    function simpan_hasil_fisioterapi_post()
    {
        $this->db->trans_begin();
        if (safe_post('id_detail_fisioterapi') === "" | safe_post('id_fisioterapi') === "") :
            $message = array("status" => false);
            $this->response($message, REST_Controller::HTTP_OK);
        endif;

        $dataFisioterapi = array(
            "id" => safe_post("id_fisioterapi"),
            "waktu_hasil" => $this->datetime,
        );

        $dataHasilFisioterapi = array(
            "id" => safe_post("id_detail_fisioterapi"),
            "hasil" => safe_post("hasil"),
        );

        $this->m_hasil_fisioterapi->updateHasilFisioterapi($dataFisioterapi, $dataHasilFisioterapi);
        if ($this->db->trans_status() === false) :
            $this->db->trans_rollback();
            $status = false;
        else :
            $this->db->trans_commit();
            $status = true;
        endif;
        
        $message = array('status' => $status);
        $this->response($message, REST_Controller::HTTP_OK);
    }

    function hapus_pemeriksaan_fisioterapi_detail_delete($id)
    {
        $status = $this->m_hasil_fisioterapi->deletePemeriksaanFisioterapiDetail($id);
        $this->response($status, REST_Controller::HTTP_OK);
    }

    function simpan_item_pemeriksaan_fisioterapi_post()
    {
        $this->db->trans_begin();
        if (safe_post('id_fisioterapi') === '') :
            $response = array('status' => false, 'message' => 'Kesalahan aplikasi, parameter kurang lengkap. segera hubungi bagian IT');
            $this->response($response, REST_Controller::HTTP_OK);
        endif;

        $id_fisioterapi = safe_post('id_fisioterapi');
        $tindakan = safe_post('tindakan_fisioterapi');

        // ambil data fisioterapinya
        $dataFisioterapi = $this->db->select('fis.*, lp.jenis_layanan, lp.id as id_layanan_pendaftaran')->from('sm_fisioterapi as fis')->join('sm_layanan_pendaftaran as lp', 'lp.id = fis.id_layanan_pendaftaran')->where('fis.id', $id_fisioterapi, true)->get()->row();

        $dataDetailFisioterapi = array(
            'id_fisioterapi' => $id_fisioterapi,
            'dokter' => NULL,
            'tindakan_fisioterapi' => $tindakan,
            'rujuk' => NULL,
            'instansi' => NULL,
        );

        $jenisLayanan = $dataFisioterapi->jenis_layanan;
        $this->load->model('order_fisioterapi/Order_fisioterapi_model', 'm_order_fisioterapi');
        $this->m_order_fisioterapi->simpanDataDetailFisioterapi($dataFisioterapi->id_layanan_pendaftaran, $dataDetailFisioterapi, $jenisLayanan);
        if ($this->db->trans_status() === false) :
            $this->db->trans_rollback();
            $status = false;
            $message = 'Gagal menambah item pemeriksaan fisioterapi';
        else :
            $this->db->trans_commit();
            $status = true;
            $message = 'Berhasil menambah item pemeriksaan fisioterapi';
        endif;

        $response = array('status' => $status, 'message' => $message);
        $this->response($response, REST_Controller::HTTP_OK);
    }
  
}