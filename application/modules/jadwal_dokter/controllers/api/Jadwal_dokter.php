<?php

defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class Jadwal_dokter extends REST_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->limit = 10;
        $this->load->model('Jadwal_dokter_model', 'jadwaldokter');

        // $id_translucent = $this->session->userdata('id_translucent');
        // if (empty($id_translucent)) :
        //     $this->response(array('error' => 'Anda belum login'), REST_Controller::HTTP_UNAUTHORIZED);
        //     exit();
        // endif;
    }

    private function start($page)
    {
        return (($page - 1) * $this->limit);
    }

    function get_jadwal_dokter_get()
    {
        if (!$this->get('id', true)) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
        endif;

        $data['data'] = $this->jadwaldokter->getDataJadwalDokterById($this->get('id', true));
        $data['page'] = 1;
        $data['limit'] = $this->limit;

        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK); // (200)
        endif;
    }

    function get_list_jadwal_dokter_get()
    {
        $limit=20;
        if (!$this->get('page')) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
        endif;

        $start          = ($this->get('page') - 1) * $limit;
        $search         = [
            'keyword'       => $this->get('keyword'),
            'layanan'       => safe_get('layanan'),
            'tanggal_awal'  => safe_get('tanggal_awal'),
            'tanggal_akhir' => safe_get('tanggal_akhir'),
            'shift_poli'    => safe_get('shift_poli'),
        ];

        $data           = $this->jadwaldokter->getListDataJadwalDokter($start, $limit, $search);
        $data['page']   = (int) $this->get('page');
        $data['limit']  = $limit;

        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK); // (200)
        endif;
    }

    function list_kunjungan_dokter_post()
    {
        session_write_close();
        set_time_limit(0);
        $data_lama = safe_post('response');
    
        $tanggal   = $this->get('tanggal');
        $shift_poli= $this->get('shift_poli');
        while (true) {
            $data_baru = $this->jadwaldokter->getListKunjunganDokter($tanggal,$shift_poli);
            // var_dump($data_lama !== $data_baru);
            if ($data_lama !== $data_baru) {
                $this->response($data_baru, self::HTTP_OK);
                return;
            }
            sleep(1);
        }
    }

    function edit_jml_kunjungan_dokter_post()
    {
        $tanggal   = safe_post('tanggal');
        $shift_poli= safe_post('shift_poli');

        $data["status"] = $this->jadwaldokter->updateJmlKunjunganDokter($tanggal,$shift_poli);
        $data['token']  = $this->security->get_csrf_hash();
        if ($data["status"] == false) {
            $data['token'] = $data['token'];
        }
        $this->response($data, 200);
    }

    function delete_jadwal_dokter_delete()
    {
        $id = $this->get('id', true);
        if ($id <= 0) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
        endif;

        $this->jadwaldokter->deleteJadwalDokter($id);
        $message = [
            'message' => 'Data telah berhasil terhapus'
        ];
        $this->set_response($message, REST_Controller::HTTP_NO_CONTENT); // (204)
    }

    function edit_jadwal_dokter_post($id = NULL)
    {
   
        if ($id === NULL) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
        endif;

        $user_log = $this->session->userdata('nama');
        $created_date_log = $this->datetime;


        if(safe_post("bpjs_dokter")===''){
            $getBpjsDokter = NULL;
        } else {
            $getBpjsDokter = safe_post("bpjs_dokter");
        }

        $data = array(
            // "id"                => $id,
            "nama_dokter"       => safe_post("nama_dokter"),
            "id_dokter"         => safe_post("kode_dokter"),
            "kode_bpjs_dokter"  => $getBpjsDokter,
            "kuota"             => safe_post("kuota_dokter"),
            "time_start"        => safe_post("time_start_detail"),
            "time_end"          => safe_post("time_end_detail"),
            "created_user"      => $user_log,
            "created_date"      => $created_date_log,
            "logs"              => '1'
        );
        
        $cekData = $this->jadwaldokter->cekJadwalDOkter($id, safe_post("tanggal_detail"),safe_post("kode_poli_detail"),safe_post("kode_dokter"),safe_post("shift_poli_detail"));

        if($cekData){
            $data["status"] = FALSE;
        } else {
            $data["status"] = $this->jadwaldokter->updateJadwalDokter($id, $data);
        }
        
        $data['token']  = $this->security->get_csrf_hash();

        if ($data["status"] == false) {
            $data['token'] = $data['token'];
        }
        $this->response($data, 200);
    }

    function get_history_jadwal_dokter_get($id)
    {
        
        if ($id === NULL) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
        endif;

        if (!$this->get('page')) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
        endif;

        $start          = ($this->get('page') - 1) * $this->limit;
        $data           = $this->jadwaldokter->getHistoryJadwalDokter($id,$start, $this->limit);
        $data['page']   = (int) $this->get('page');
        $data['limit']  = $this->limit;

        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK); // (200)
        endif;
    }

    function get_dokter_spesialisasi_get()
    {
        $q = safe_get('q');
        $id_dokter = safe_get('id_dokter');
        $page = safe_get('page');
        $start = $this->start($page);
        $data = $this->jadwaldokter->getAutoDokterSpesialisasi($q, $id_dokter, $start, $this->limit);
        if ((safe_get('page') == 1) & ($q == '')) :
            $pilih[] = array(
                'nama' => '', 
                'spesialisasi' => '',
                'id' => '', 
                'kode_bpjs' => ''
            );
            $data['data'] = array_merge($pilih, $data['data']);
            $data['total'] += 1;
        endif;
        $this->response($data, REST_Controller::HTTP_OK);
    }

    function get_poli_get()
    {
        $q = safe_get('q');
        $page = safe_get('page');
        $start = $this->start($page);
        $data = $this->jadwaldokter->getPoli($q, $start, $this->limit);
        if ((safe_get('page') == 1) & ($q == '')) :
            $pilih[] = array(
                'nama' => '', 
                'spesialisasi' => '',
                'id' => '', 
                'kode_bpjs' => ''
            );
            $data['data'] = array_merge($pilih, $data['data']);
            $data['total'] += 1;
        endif;
        $this->response($data, REST_Controller::HTTP_OK);
    }

    function tambah_jadwal_dokter_post()
    {
        $message = "";

        $dataJd = array(
            'tanggal'         => $this->post('tgl_jd'),
            'nama_dokter'     => $this->post('nama_dokter_jd') !== '' ? $this->post('nama_dokter_jd') : NULL,
            'id_dokter'       => $this->post('kode_dokter_jd') !== '' ? $this->post('kode_dokter_jd') : NULL,
            'kode_bpjs_dokter'=> $this->post('bpjs_dokter_jd') !== '' ? $this->post('bpjs_dokter_jd') : NULL,
            'nama_poli'       => $this->post('nama_poli_jd') !== '' ?   $this->post('nama_poli_jd') : NULL,
            'id_poli'         => $this->post('kode_poli_jd') !== '' ?   $this->post('kode_poli_jd') : NULL,
            'kode_bpjs_poli'  => $this->post('bpjs_poli_jd') !== '' ?   $this->post('bpjs_poli_jd') : NULL,
            'shift_poli'      => $this->post('shift_poli_jd') !== '' ?  $this->post('shift_poli_jd') : NULL,
            'time_start'      => $this->post('time_start_jd') !== '' ?  $this->post('time_start_jd') : NULL,
            'time_end'        => $this->post('time_end_jd') !== '' ?    $this->post('time_end_jd') : NULL,
            'kuota'           => $this->post('kuota_jd') !== '' ?       $this->post('kuota_jd') : NULL,
        );
        $status = $this->jadwaldokter->simpanJadwalDokter($dataJd);

        if($status == 'Success'){
            $message = "Berhasil Tambah Jadwal Dokter";
        } else if($status =='Info'){
            $message = "Jadwal dokter sudah pernah disimpan";
        } else {            
            $message = "Gagal Tambah Jadwal Dokter";
        }

        $response = array("status" => $status, "message" => $message);
        $this->response($response, 200);
    }
	
	function cek_jadwal_dokter_get()
    {
        $data['minus']     = $this->jadwaldokter->getDataJadwalMinus();
        $data['double']    = $this->jadwaldokter->getDataJadwalDouble();
        $data['history']   = $this->jadwaldokter->getDataJadwalHistory();
        $data['duplicate'] = $this->jadwaldokter->getDataJadwalDuplicate();

        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK); // (200)
        endif;
    }

}
