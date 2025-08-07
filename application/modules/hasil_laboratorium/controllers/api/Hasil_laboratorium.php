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
class Hasil_laboratorium extends REST_Controller
{

    function __construct()
    {
        parent::__construct();
		$this->limit = 10;
		$this->datetime = date('Y-m-d H:i:s');
        $this->load->model('Hasil_laboratorium_model', 'm_hasil_laboratorium');
        $this->load->model('pelayanan/Pelayanan_model', 'm_pelayanan');

        $id_translucent = $this->session->userdata('id_translucent');
        if (empty($id_translucent)) :
            $this->response(array('error' => 'Anda belum login'), REST_Controller::HTTP_UNAUTHORIZED);
            exit();
        endif;

        $data_lis = $this->m_pelayanan->getLIS();

        $this->url = $data_lis->url;
        $this->user = $data_lis->user;
        $this->pass = $data_lis->pass;

    }

    function get_list_hasil_laboratorium_get()
    {   
        if (!$this->get('page')) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
        endif;
        
        $start          = ($this->get('page') - 1) * $this->limit;
        $search         = [
            'tanggal_awal'       => safe_get('tanggal_awal'),
            'tanggal_akhir'      => safe_get('tanggal_akhir'),
            'no_register'        => safe_get('no_register'),
            'no_rm'              => safe_get('no_rm'),
            'nama'               => safe_get('nama'),
            'kode'               => safe_get('no_lab'),
            'jenis_layanan'      => safe_get('jenis_layanan'),
            'status_hasil'       => safe_get('status_hasil'),
            'jenis_laboratorium' => safe_get('jenis_laboratorium'),
        ];
        
        $data            = $this->m_hasil_laboratorium->getListDataHasilLaboratorium($this->limit, $start, $search);
        $data['page']    = (int) $this->get('page');
        $data['limit']   = $this->limit;

        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK); // (200)
        endif;
    }

    function getDataOrderLaboratorium_get()
    {
        if (!$this->get('id', true)) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
        endif;

        $data = $this->m_hasil_laboratorium->getDataOrderLaboratorium($this->get('id', true));
        $this->response($data, REST_Controller::HTTP_OK);
    }

    function getOrderLaboratorium_get()
    {
        if (!$this->get('id', true)) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
        endif;

        $data = $this->m_hasil_laboratorium->getOrderLaboratorium($this->get('id', true));
        $this->response($data, REST_Controller::HTTP_OK);
    }

    function tambah_rekap_cetak_post() 
    {
        if (safe_post('id_lab') === '') :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
        endif;

        $id_lab = safe_post('id_lab');
        $data = $this->m_hasil_laboratorium->tambahRekapCetak($id_lab);
        $this->response($data, REST_Controller::HTTP_OK);
    }

    function get_permintaan_pemeriksaan_laboratorium_get() 
    {
        if (!$this->get('id', true)) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
        endif;

        $data = $this->m_pelayanan->get_pemeriksaan_laboratorium($this->get('id', true), 'detail');
        
        if (!empty($data->id_order_laboratorium)) :
            $id_order_laboratorium = $data->id_order_laboratorium;
            $sql = "select * from sm_order_laboratorium where id = '".$id_order_laboratorium."'";
            $data->order = $this->db->query($sql)->row_array();
        endif;

        $this->response($data, REST_Controller::HTTP_OK);
    }

    function checkOrderLAB_get() 
    {
        if (!$this->get('id_lab', true)) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
        endif;

        $id_lab = $this->get('id_lab');

        $data = $this->m_hasil_laboratorium->getDetailLaboratorium($id_lab);

        $status_lis = $data->status_lis;

        if($status_lis === null){

            $this->load->library('Curl');
            $ch = curl_init();
            curl_setopt_array($ch, array(
                CURLOPT_URL => $this->url.'/api/result/ono/'.$data->kode.'/view/',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_USERAGENT => 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13',
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 120,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "GET",
                CURLOPT_HTTPHEADER => array('x-username: '.$this->user.'',
                    'x-password: '.$this->pass.''),
            ));
            $response = curl_exec($ch);

                if($response === false){

                    curl_close($ch); // close cURL handler
                    $status = false;
                    $message = "Gagal Menghubungi LIS";
                    $respon = 503;

                } else {

                    $response_getinfo = curl_getinfo($ch, CURLINFO_RESPONSE_CODE);
                    $response_http = curl_getinfo($ch, CURLINFO_HTTP_CODE);
                    $outputJSON = json_decode($response);

                    curl_close($ch); // close cURL handler 24112022

                    if($response_http === 404) {

                        $status_lis = 0;
                        $status = false;
                        $message = "Data Tidak Tersedia";
                        $respon = 404;
                    
                    } else if(isset($outputJSON->content)){

                        if($outputJSON->content === 'Not Found'){

                            $status_lis = 0;
                            $status = false;
                            $message = "Data Tidak Tersedia";
                            $respon = 404;
                        }
                        
                    } else if($outputJSON !== null) {
                        $detail = $outputJSON->detail;
                        $global = "'".$outputJSON->global_comment."'";

                        
                        foreach ($detail as $i => $value){

                            $val_test_cd[$i]        = "'".strval($value->test_cd)."'";
                            $test_nm[$i]            = "'".$value->test_nm."'";
                            $data_type[$i]          = "'".$value->data_type."'";
                            $val_result_value[$i]   = "'".$value->result_value."'";
                            // $result_ft[$i]          = "'".$value->result_ft."'";
                            $unit[$i]               = "'".$value->unit."'";
                            $flag[$i]               = "'".$value->flag."'";
                            $ref_range[$i]          = "'".$value->ref_range."'";
                            $status[$i]             = "'".$value->status."'";
                            $test_comment[$i]       = "'".$value->test_comment."'";
                            $disp_seq[$i]           = "'".$value->disp_seq."'";
                            $order_testid[$i]       = "'".$value->order_testid."'";
                            $order_testnm[$i]       = "'".$value->order_testnm."'";
                            $test_group[$i]         = "'".$value->test_group."'";
                            $item_parent[$i]        = "'".$value->item_parent."'";
                            $specimen[$i]           = "'".json_encode($value->specimen)."'";
                            $release[$i]            = "'".json_encode($value->release)."'";
                            $authorise[$i]          = "'".json_encode($value->authorise)."'";
                            $phoned[$i]             = "'".json_encode($value->phoned)."'";

                        }

                        if (is_array($val_test_cd)){
                            $response = array();
                            foreach($val_test_cd as $i => $value){

                                $result[] = array(

                                    "result_value"     => $val_result_value[$i],
                                    "test_cd"          => $val_test_cd[$i],
                                    "test_nm"          => $test_nm[$i],
                                    "ono"              => "'".$data->kode."'",
                                    "id_lab"           => (int)$id_lab,
                                    "global_comment"   => $global,
                                    "data_type"        => $data_type[$i],
                                    // "result_ft"        => $result_ft[$i],
                                    "unit"             => $unit[$i],
                                    "flag"             => $flag[$i],
                                    "ref_range"        => $ref_range[$i],
                                    "status"           => $status[$i],
                                    "test_comment"     => $test_comment[$i],
                                    "disp_seq"         => $disp_seq[$i],
                                    "order_testid"     => $order_testid[$i],
                                    "order_testnm"     => $order_testnm[$i],
                                    "test_group"       => $test_group[$i],
                                    "item_parent"      => $item_parent[$i],
                                    "specimen"         => $specimen[$i],
                                    "release"          => $release[$i],
                                    "authorise"        => $authorise[$i],
                                    "phoned"           => $phoned[$i]  

                                );
                            }

                            $this->db->insert_batch('sm_item_detail_laboratorium',$result,false);
                            // var_dump($this->db->last_query());exit(1);

                            $status = '1';

                            $update = ["status_lis" => $status];

                            $this->db->where('id', $id_lab)->update('sm_laboratorium', $update);

                            $status_lis = 1;
                            $status = true;
                            $message = "Berhasil Melakukan Sinkronisasi";
                            $respon = 200;

                        } else {

                            $status_lis = 0;
                            $status = false;
                            $message = "Data Tidak Tersedia";
                            $respon = 404;

                        }

                        

                    } else {

                        $status_lis = 0;
                        $status = false;
                        $message = "Data Tidak Tersedia";
                        $respon = 404;

                    }

                }

        } else {

            if($status_lis === "1"){

                $status_lis = 1;
                $status = true;
                $message = "Data sudah tersinkronisasi dengan LIS";
                $respon = 200;

            } else {

                $status_lis = 1;
                $status = false;
                $message = "Data Tidak Tersedia";
                $respon = 404;

            }

        }
        
        $data = array("status_lis" => $status_lis, "status" => $status, "message" => $message);
        $this->response($data, $respon);
    }

    function perbaharuiHasil_get()
    {
        
        if (!$this->get('ono') && !$this->get('id_lab')) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
        endif;
        $id_ono         = $this->get('ono');
        
        $this->load->library('Curl');
        $ch = curl_init();
        curl_setopt_array($ch, array(
            CURLOPT_URL => $this->url.'/api/result/ono/'.$id_ono.'/view/',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_USERAGENT => 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13',
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 120,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array('x-username: '.$this->user.'',
                'x-password: '.$this->pass.''),
        ));

        $response = curl_exec($ch);

        if ($response === false){

            curl_close($ch); // close cURL handler

            $status = false;
            $message = "Gagal Menghubungi LIS";
            $respon = 503;
            
            $data_response = $respon;
            
        } else {

            $response_getinfo = curl_getinfo($ch, CURLINFO_RESPONSE_CODE);

            if ($response_getinfo === 200){

                $respon = 200;
                $status = true;
                $message = "Berhasil melakukan permintaan Laboratorium ke LIS";
                $data_response = $respon;

                
                
                curl_close($ch);

            } else {

                curl_close($ch);
                $status = false;
                $message = "Data Belum Tersedia";
                $respon = 404;
                $data_response = $respon;
            }
            
        }
        
        $data = array("response"=> $data_response, "status" => $status, "message" => $message);
        $this->response($data, $respon);

    }

    function update_keabnormalan_post()
    {
        $status = false;
        $message = NULL;
        $param["where"]["id"] = $this->post('id', true);
        $param["data"]["abnormal"] = $this->post('abnormal') !== '' ? $this->post('abnormal', true) : NULL;
        if (!empty($param["where"]["id"])) {
            $this->load->model("General_model", "m_general");
            $param["table"] = "sm_item_detail_laboratorium";
            $update = $this->m_general->updateData($param);
            if ($update) {
                $status = true;
                $message = "Berhasil memperbarui data keabnormalan";
            } else {
                $message = "Gagal memperbarui data keabnormalan";
            }
        } else {
            $message = "ID tidak boleh kosong";
        }

        $hasil = array('status' => $status, 'message' => $message);
        $this->response($hasil, REST_Controller::HTTP_OK);
    }

    function hapusTindakanLaboratorium_delete($id_tarif, $id_lab)
    {

        if ($id_tarif === null && $id_lab === null) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
        endif;

        $this->db->trans_begin();
        

        $status = $this->m_hasil_laboratorium->hapusTindakanLaboratorium($id_tarif, $id_lab);
        
        if ($this->db->trans_status() === false) :
            $this->db->trans_rollback();
            $status = false;
            $message = 'Gagal menghapus Tindakan Laboratorium!';
        else :
            $this->db->trans_commit();
            $status = true;
            $message = 'Berhasil menghapus Tindakan Laboratorium!';
        endif;
        $response = array('status' => $status, 'message' => $message);
        $this->response($response, REST_Controller::HTTP_OK);
    }

    function batalHasilLab_delete($id_lab)
    {

        if ($id_lab === null) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
        endif;

        $this->db->trans_begin();
        
        $hasilLab = $this->db->where('id', $id_lab)->get('sm_laboratorium')->row();
        
        $status = $this->m_hasil_laboratorium->batalHasilLab($id_lab);

        $batalStatus = 'Batal';

        $update = ["status_hasil" => $batalStatus];

        $this->db->where('id', $id_lab)->update('sm_laboratorium', $update);
        $this->db->where('id', $hasilLab->id_order_laboratorium)->update('sm_order_laboratorium', ["status" => 'batal']);
        
        if ($this->db->trans_status() === false) :
            $this->db->trans_rollback();
            $status = false;
            $message = 'Gagal menghapus Hasil Laboratorium!';
        else :
            $this->db->trans_commit();
            $status = true;
            $message = 'Berhasil membatalkan Hasil Laboratorium!';
        endif;
        $response = array('status' => $status, 'message' => $message);
        $this->response($response, REST_Controller::HTTP_OK);
    }



    function hapus_pemeriksaan_laboratorium_detail_delete($id)
    {
        $sql = "select lyn.nama, lab.id_layanan_pendaftaran 
                from sm_detail_laboratorium dl 
                join sm_laboratorium lab on (dl.id_laboratorium = lab.id) 
                join sm_tarif_pelayanan kt on (dl.id_tarif = kt.id) 
                join sm_layanan lyn on (kt.id_layanan =  lyn.id) 
                where dl.id = " . $id;
        $result = $this->db->query($sql)->row();
        $catatan = "Item Laboratorium Dihapus : " . $result->nama;
        $response = $this->m_hasil_laboratorium->deletePemeriksaanLaboratoriumDetail($id);
        if ($response["status"]) {
            // record logs
            $this->load->model('logs/Logs_model', 'logs');
            $this->logs->recordAdminLogs($result->id_layanan_pendaftaran, 'Hapus Item Laboratorium', $catatan);
        }
        $this->response($response, 200);
    }

    function simpan_item_pemeriksaan_laboratorium_post()
    {
        $this->db->trans_begin();
        if (safe_post('id_laboratorium') === '') :
            $response = array('status' => false, 'message' => 'Kesalahan aplikasi, parameter kurang lengkap. segera hubungi bagian IT');
            $this->response($response, REST_Controller::HTTP_OK);
        endif;

        $id_laboratorium = safe_post('id_laboratorium');
        $tindakan = safe_post('tindakan_laboratorium');
        $cito = safe_post('cito');
        $item_lab = safe_post('item_laboratorium');

        // ambil data laboratoriumnya
        $dataLaboratorium = $this->db->select('lb.*, lp.jenis_layanan, lp.id as id_layanan_pendaftaran')->from('sm_laboratorium as lb')->join('sm_layanan_pendaftaran as lp', 'lp.id = lb.id_layanan_pendaftaran')->where('lb.id', $id_laboratorium, true)->get()->row();

        $dataDetailLaboratorium = array(
            'id_laboratorium' => $id_laboratorium,
            'dokter' => NULL,
            'tindakan_laboratorium' => $tindakan,
            'cito' => $cito,
            'item_lab' => $item_lab,
            'rujuk' => NULL,
            'instansi' => NULL,
        );

        $jenisLayanan = $dataLaboratorium->jenis_layanan;
        $this->load->model('order_laboratorium/Order_laboratorium_model', 'm_order_laboratorium');
        $this->m_order_laboratorium->simpanDataDetailLaboratorium($dataLaboratorium->id_layanan_pendaftaran, $dataDetailLaboratorium, $jenisLayanan);
        if ($this->db->trans_status() === false) :
            $this->db->trans_rollback();
            $status = false;
            $message = 'Gagal menambah item pemeriksaan laboratorium';
        else :
            $this->db->trans_commit();
            $status = true;
            $message = 'Berhasil menambah item pemeriksaan laboratorium';
        endif;

        $response = array('status' => $status, 'message' => $message);
        $this->response($response, REST_Controller::HTTP_OK);
    }

    function simpan_hasil_laboratorium_post()
    {
        $this->db->trans_begin();
        $dataHasil = array(
            'waktu_hasil' => $this->datetime,
            'id_item_detail_lab' => safe_post('id_hasil_laboratorium'),
            'hasil' => safe_post('input_hasil_lab'),
            'catatan' => safe_post('catatan')
        );

        $this->m_hasil_laboratorium->updateHasilLaboratorium($dataHasil);
        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            $status = false;
        } else {
            $this->db->trans_commit();
            $status = true;
        }
        $message = array("status" => $status);
        $this->response($message, 200);
    }
	
	function get_kirim_lab_wa_get() 
    {
        if (!$this->get('id_pendaftaran', true))         : $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); endif;
        if (!$this->get('id_layanan_pendaftaran', true)) : $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); endif;
        if (!$this->get('id_laboratorium', true))        : $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); endif;
        if (!$this->get('jenis_laboratorium', true))     : $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); endif;

        $id_pendaftaran         = $this->get('id_pendaftaran', true);
        $id_layanan_pendaftaran = $this->get('id_layanan_pendaftaran', true);
        $id_laboratorium        = $this->get('id_laboratorium', true);
        $jenis_laboratorium     = $this->get('jenis_laboratorium', true);

        $data['data'] = $this->m_hasil_laboratorium->getKirimLabWa($id_pendaftaran, $id_layanan_pendaftaran, $id_laboratorium, $jenis_laboratorium);        
        $this->response($data, REST_Controller::HTTP_OK);
    }

    function simpan_kirim_lab_wa_get()
    {
        $id_pendaftaran         = $this->get('id_pendaftaran');
        $id_layanan_pendaftaran = $this->get('id_layanan_pendaftaran');
        $id_laboratorium        = $this->get('id_laboratorium');
        $jenis_laboratorium     = $this->get('jenis_laboratorium');

        $response = $this->m_hasil_laboratorium->simpanKirimLabWa($id_pendaftaran, $id_layanan_pendaftaran, $id_laboratorium, $jenis_laboratorium);

        $this->response($response, 200);
    }

    function respon_kirim_lab_wa_get()
    {
        $id_pendaftaran         = $this->get('id_pendaftaran');
        $id_layanan_pendaftaran = $this->get('id_layanan_pendaftaran');
        $id_laboratorium        = $this->get('id_laboratorium');
        $jenis_laboratorium     = $this->get('jenis_laboratorium');
        $status                 = $this->get('status');
        $respon                 = $this->get('respon');

        $response = $this->m_hasil_laboratorium->responKirimLabWa($id_pendaftaran, $id_layanan_pendaftaran, $id_laboratorium, $jenis_laboratorium, $status, $respon);

        $this->response($response, 200);
    }


}