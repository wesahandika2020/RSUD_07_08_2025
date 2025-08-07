<?php

defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class Surat_ket_kontrol extends REST_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->limit = 10;
        $this->datetime = date('Y-m-d H:i:s');
        $this->load->model('Surat_ket_kontrol_model', 'skd');

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
    
    function get_list_skd_get()
    {
        $limit=10;
        if (!$this->get('page')) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
        endif;

        $start          = ($this->get('page') - 1) * $limit;
        $search         = [
            'kategori'      => $this->get('kategori'),
            'keyword'       => $this->get('keyword'),
            'filtertgl'     => safe_get('filtertgl'),
            'layanan'       => safe_get('layanan'),
            'tanggal_awal'  => safe_get('tanggal_awal'),
            'tanggal_akhir' => safe_get('tanggal_akhir'),
        ];

        $data           = $this->skd->getListDataSKD($start, $limit, $search);
        $data['page']   = (int) $this->get('page');
        $data['limit']  = $limit;

        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK); // (200)
        endif;
    }

    function tgl_kunjungan_get()
    {
        $idpasien = safe_get('idpasien');
        
        if ($idpasien !== '') {
            $data = $this->skd->getTglKunjungan($idpasien)->result();
        } else {
            $data = NULL;
        }
        echo json_encode($data);
    }

    function detail_kunjungan_get()
    {
        $id_layanan_pendaftran = safe_get('id_layanan_pendaftran');
        
        if ($id_layanan_pendaftran !== '') {
            $data = $this->skd->getDetailKunjungan($id_layanan_pendaftran)->result();
        } else {
            $data = NULL;
        }
        echo json_encode($data);
    }

    function simpan_skb_post()
    {
        $dataSKB = array(
            'id_pasien'            => safe_post('id_pasien_inputskb'),
            'no_surat'             => safe_post('no_skb'),
            'jenis'         	   => safe_post('skb_jenis_kontrol'),
            'tgl_rencana_kontrol'  => safe_post('skb_tgl_kontrol'),
            'dokter'               => safe_post('skb_dokter'),
            'id_user'              => $this->session->userdata('id_translucent'),
            'created_date'         => $this->datetime,
            'no_kartu'             => safe_post('skb_nobpjs'),
            'id_pendaftaran_asal'  => safe_post('id_pendaftaran_inputskb'),
            'id_layanan_pendaftaran_asal' => safe_post('id_layanan_pendaftaran_inputskb'),
        );
        $id_skb = $this->skd->simpanSKB($dataSKB);

        if ($id_skb !== '') :
            $data = [
                'id_skb' => $id_skb
            ];

            $this->db->where('id', safe_post('id_skk_inputskb') )->update('sm_surat_kontrol', $data);
        endif;

        if ($this->db->trans_status() === FALSE) :
            $this->db->trans_rollback();
            $status = FALSE;
        else :
            $this->db->trans_commit();
            $status = TRUE;
        endif;

        $message = [
            'id_skb' => $id_skb,
            'status' => $status,
            'token' => $this->security->get_csrf_hash()
        ];

        $this->response($message, REST_Controller::HTTP_OK);
    }
	
	function simpan_skb_cek_post()
    {
        $dataSKB = array(
            'id_pasien'            => safe_post('skb_cek_id_pasien'),
            'no_surat'             => safe_post('skb_no_cek'),
            'jenis'         	   => safe_post('skb_cek_jenis_kontrol'),
            'tgl_rencana_kontrol'  => safe_post('skb_tgl_kontrol_cek'),
            'dokter'               => safe_post('skb_dokter_cek'),
            'id_user'              => $this->session->userdata('id_translucent'),
            'created_date'         => $this->datetime,
            'no_kartu'             => safe_post('skb_cek_no_kartu'),
            'id_pendaftaran_asal'  => safe_post('skb_cek_id_pendaftaran'),
            'id_layanan_pendaftaran_asal' => safe_post('skb_cek_id_layanan_pendaftaran'),
        );
        $id_skb = $this->skd->simpanSKB($dataSKB);

        if ($id_skb !== '') :
            $data = [
                'id_skb' => $id_skb
            ];

            $this->db->where('id', safe_post('skb_cek_id_surat_kontrol') )->update('sm_surat_kontrol', $data);
        endif;

        if ($this->db->trans_status() === FALSE) :
            $this->db->trans_rollback();
            $status = FALSE;
        else :
            $this->db->trans_commit();
            $status = TRUE;
        endif;

        $message = [
            'id_skb' => $id_skb,
            'status' => $status,
            'token' => $this->security->get_csrf_hash()
        ];

        $this->response($message, REST_Controller::HTTP_OK);
    }

}
