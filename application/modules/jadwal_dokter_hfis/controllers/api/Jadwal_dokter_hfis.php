<?php

defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH.'/libraries/REST_Controller.php';
// require_once 'vendor/autoload.php';

use Restserver\Libraries\REST_Controller;
use \LZCompressor\LZString as LZString;

/**
 * @package         CodeIgniter
 * @subpackage      Rest Server
 * @category        Controller
 * @author          Faiz Muhammad Syam
 * @license         Syams Corporation
 */
class Jadwal_dokter_hfis extends REST_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->limit = 20;
        date_default_timezone_set('Asia/Jakarta');
        $this->datetime = date('Y-m-d H:i:s');
        $this->load->model('App_model', 'm_default');
        $this->load->model('Jadwal_dokter_hfis_model', 'jadwal');
        
        $this->code = 400;
        $this->message = "Tidak terhubung dengan Server BPJS, Server BPJS sedang bermasalah. Silahkan Hubungi Pihak IT BPJS";

        //dev
        $this->bpjs_config = $this->jadwal->getConfigBPJSV2();


        $id_translucent = $this->session->userdata('id_translucent');
        if (empty($id_translucent)) :
            $this->response(array('error' => 'Anda belum login'), REST_Controller::HTTP_UNAUTHORIZED);
            exit();
        endif;
    }

    function jadwal_dokter_hfis_get()
    {
        
        $tanggal_jadwal = $this->get('tanggal_jadwal');
        $kode_bpjs = $this->get('kode');
        $url = $this->bpjs_config->server."jadwaldokter/kodepoli/".$kode_bpjs."/tanggal/".$tanggal_jadwal;
        $header = $this->jadwal->createHeader($this->bpjs_config);
        $output = getCurl($url, $header);
        $decode = json_decode($output);


        if ($decode === NULL) :
            $decode = ["metaData" => ["code" => $this->code,"message" => $this->message]];
            die(json_encode($decode));
        endif;
        
        if(isset($decode->response)){
            
            $decode->response = $this->jadwal->decryptResponse($decode->response);
            $decode = ["metaData" => ["code" => 200,"message" => $decode->metadata->message], "response" => $decode->response];

        } else {

            $decode = ["metaData" => ["code" => 201,"message" => $decode->metadata->message]];
            die(json_encode($decode));

        }
        
        $this->response($decode, REST_Controller::HTTP_OK);
    }

    private function start($page)
    {
        return (($page - 1) * $this->limit);
    }

    function kode_bpjs_get()
    {
        $q = safe_get('q');
        $page = safe_get('page');
        $start = $this->start($page);
        $data = $this->jadwal->getKodeBPJS($q, $start, $this->limit);
        if ((safe_get('page') == 1) & ($q == '')){
            $pilih[] = array(
                'id' => '', 
                'nama' => '', 
                'kode' => '', 
                'kode_bpjs' => '' 
            );
            $data['data'] = array_merge($pilih, $data['data']);
            $data['total'] += 1;
        }
        $this->response($data, REST_Controller::HTTP_OK);
    }

    function simpan_perubahan_jadwal_post()
    {   

        if (!$this->post('kode_poli', true) || !$this->post('kode_sub', true) || !$this->post('kode_bpjs_dokter', true)) :
            $this->response(array('status' => false, 'message' => 'Parameter tidak lengkap Silakan Hubungi IT'), REST_Controller::HTTP_BAD_GATEWAY);
        endif;

        $this->db->trans_begin();

        $jadwal_hari = safe_post('ubah_hari');
    
        if(!empty($jadwal_hari)){

            $jam_buka = safe_post('ubah_jam_buka');
            $jam_tutup = safe_post('ubah_jam_tutup');

            $kode_bpjs_dokter = (int)$this->post('kode_bpjs_dokter', true);

            foreach ($jam_buka as $a => $jb) {


                    $jam_buka_val[$a]            = $jb;

                     
                    
                }

            foreach ($jam_tutup as $c => $jt) {


                    $jam_tutup_val[$c]            = $jt;

                     
                    
                }


            $arr_item = array();
            foreach($jadwal_hari as $key => $value){

                $arr_item[$key]['hari']     = $value;
                $arr_item[$key]['buka']     = $jam_buka_val[$key];
                $arr_item[$key]['tutup']    = $jam_tutup_val[$key];
                        
            }

            $params=array(

                "kodepoli" => $this->post('kode_poli', true),
                "kodesubspesialis" => $this->post('kode_sub', true),
                "kodedokter" => $kode_bpjs_dokter,
                "jadwal" => $arr_item,

            );

            $url = $this->bpjs_config->server."jadwaldokter/updatejadwaldokter";

            $header = $this->jadwal->createHeader($this->bpjs_config);

            $data_api = json_encode($params);
            $output = postCurl($url, $data_api, $header);
            $decode = json_decode($output);

            if($decode !== NULL){

                if(isset($decode->metadata->code)){

                    if($decode->metadata->code === 200){

                        $pesan = $decode->metadata->code;

                        $array_response = ["response" => $pesan,"keterangan_respon" => $decode->metadata->message,"waktu" => $this->datetime,"bpjs_dokter" => $kode_bpjs_dokter,"kode_poli" => $this->post('kode_poli', true),"kode_subspesialis" => $this->post('kode_sub', true)];

                        $id_ubah = $this->jadwal->insResponse($array_response);

                        foreach($arr_item as $d => $e){

                            $data_detail = array(

                                "id_ubah" => $id_ubah,
                                "hari" => $e['hari'],
                                "buka" => $e['buka'],
                                "tutup" => $e['tutup'],


                            );

                            $this->db->insert('sm_detail_jadwal_dokter_hfis', $data_detail);
                        }
                        
                        if(isset($decode->metadata->message)){

                            $decode = ["metaData" => ["code" => $pesan,"message" => $decode->metadata->message]];

                        }

                    } else {

                        $pesan = $decode->metadata->code;

                        $array_response = ["response" => $pesan,"keterangan_respon" => $decode->metadata->message,"waktu" => $this->datetime,"bpjs_dokter" => $kode_bpjs_dokter,"kode_poli" => $this->post('kode_poli', true),"kode_subspesialis" => $this->post('kode_sub', true)];

                        $id_ubah = $this->jadwal->insResponse($array_response);

                        foreach($arr_item as $d => $e){

                            $data_detail = array(

                                "id_ubah" => $id_ubah,
                                "hari" => $e['hari'],
                                "buka" => $e['buka'],
                                "tutup" => $e['tutup'],


                            );

                            $this->db->insert('sm_detail_jadwal_dokter_hfis', $data_detail);
                        }

                        $decode = ["metaData" => ["code" => $decode->metadata->code,"message" => $decode->metadata->message]];

                    }

                    
                } else {

                    $decode = ["metaData" => ["code" => "201","message" => "Gagal Update Dokter HFIS"]];
                }

            } else {

                $decode = ["metaData" => ["code" => "201","message" => "Gagal Update Dokter HFIS"]];
            }

        } else {

            $decode = ["metaData" => ["code" => "201","message" => "Silakan Lengkapi data update dokter HFIS"]];

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

    function detail_pengajuan_get()
    {
        
        if (!$this->get('id')) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
        endif;

        $id_bpjs = $this->get('id');

        $data = $this->jadwal->dataDetailPengajuan($id_bpjs);

        if(empty($data)){

            $decode = ["metaData" => ["code" => "201","message" => "Belum ada Pengajuan"]];

        } else {

            $decode = ["metaData" => ["code" => "200","message" => $data]];
        }

        $this->response($decode, REST_Controller::HTTP_OK);
    }

    function detail_jadwal_get()
    {
        
        if (!$this->get('id')) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
        endif;

        $id = $this->get('id');

        $data = $this->jadwal->dataDetailJadwal($id);

        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK);
        endif;
    }

    


}
