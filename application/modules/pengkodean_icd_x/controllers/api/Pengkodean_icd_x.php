<?php

defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class Pengkodean_icd_x extends REST_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->limit = 10;
		$this->datetime = date('Y-m-d H:i:s');
		$this->load->model('Pengkodean_icd_x_model', 'm_pengkodean_icd_x');	

		$id_translucent = $this->session->userdata('id_translucent');
		if (empty($id_translucent)) :
			$this->response(array('error' => 'Anda belum login'), REST_Controller::HTTP_UNAUTHORIZED);
			exit();
		endif;
	}

	function get_list_pengkodean_icd_x_get()
	{
		if (!$this->get('page')) :
			$this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
		endif;
		// alert( date2mysql(safe_get('tgl-masuk-awal')));
		$start  = ($this->get('page') - 1) * $this->limit;
		$search = [
			'tgl_masuk_awal'   => date2mysql(safe_get('tgl_masuk_awal')),
			'tgl_masuk_akhir'  => date2mysql(safe_get('tgl_masuk_akhir')),
			'tgl_keluar_awal'  => date2mysql(safe_get('tgl_keluar_awal')),
			'tgl_keluar_akhir' => date2mysql(safe_get('tgl_keluar_akhir')),
			'kunjungan'        => safe_get('kunjungan'),
			'no_rm'            => safe_get('no_rm')
		];

		$data            = $this->m_pengkodean_icd_x->getListDataKunjunganPasien($this->limit, $start, $search);
		$data['page']    = (int) $this->get('page');
		$data['limit']   = $this->limit;

		if ($data) :
			$this->response($data, REST_Controller::HTTP_OK); // (200)
		endif;
	}

	function get_list_layanan_pasien_get()
	{
		if (!$this->get('page')) :
			$this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
		endif;

		$start  = ($this->get('page') - 1) * $this->limit;
		$search = [
			'id_pendaftaran'  	=> $this->get('id_pendaftaran')
		];

		$data  = $this->m_pengkodean_icd_x->getListDataLayananPasien($this->limit, $start, $search);
		$data['page']    = (int) $this->get('page');
		$data['limit']   = $this->limit;

		if ($data) :
			$this->response($data, REST_Controller::HTTP_OK); // (200)
		endif;
	}

	function get_list_soap_get()
	{
		if (!$this->get('page')) :
			$this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
		endif;

		$start  = ($this->get('page') - 1) * $this->limit;
		$search = [
			'id_layanan_pendaftaran'  	=> $this->get('id_layanan_pendaftaran')
		];

		$data            = $this->m_pengkodean_icd_x->getListDataSOAP($this->limit, $start, $search);
		$data['page']    = (int) $this->get('page');
		$data['limit']   = $this->limit;

		if ($data) :
			$this->response($data, REST_Controller::HTTP_OK); // (200)
		endif;
	}

	function get_detail_layanan_pendaftaran_get()
	{
		if (!$this->get('id_layanan_pendaftaran')) :
			$this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
		endif;

		$data = $this->m_pengkodean_icd_x->getLayananPendataranById($this->get('id_layanan_pendaftaran'));

		$this->response($data, REST_Controller::HTTP_OK); // (200)
	}

	function get_list_tindakan_get()
	{
		if (!$this->get('page')) :
			$this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
		endif;

		$start  = ($this->get('page') - 1) * $this->limit;
		$search = [
			'id_layanan_pendaftaran' => $this->get('id_layanan_pendaftaran'),
			'spesialisasi'  	     => $this->get('spesialisasi'),
			'id_konsul'  	         => $this->get('id_konsul'),			
			'filterTindakan'  	     => $this->get('filterTindakan'),
		];

		$data            = $this->m_pengkodean_icd_x->getListDataTindakan($this->limit, $start, $search);
		$data['page']    = (int) $this->get('page');
		$data['limit']   = $this->limit;

		if ($data) :
			$this->response($data, REST_Controller::HTTP_OK); // (200)
		endif;
	}

	function get_filter_tindakan_get()
	{
		if (!$this->get('page')) :
			$this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
		endif;

		$start  = ($this->get('page') - 1) * $this->limit;
		$search = [
			'id_layanan_pendaftaran' => $this->get('id_layanan_pendaftaran'),
			'spesialisasi'  	     => $this->get('spesialisasi'),
			'id_konsul'  	         => $this->get('id_konsul'),
		];

		$data            = $this->m_pengkodean_icd_x->getFilterTindakan($this->limit, $start, $search);
		$data['page']    = (int) $this->get('page');
		$data['limit']   = $this->limit;

		if ($data) :
			$this->response($data, REST_Controller::HTTP_OK); // (200)
		endif;
	}

	private function kirimDataProcedure($idTindakan)
    {

        $this->autentikasi_user_post();

        if($idTindakan === null){

            date_default_timezone_set('Asia/Jakarta');
        	$xDetailData = ["kategori" => "Procedure", "message" => 'ID Tindakan Tidak ada, harap refresh kembali', "jenis_data" => 'error', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama')];
            $this->db->insert('sm_satu_sehat_log', $xDetailData);
        
        }

        $this->load->model('satu_sehat/Satu_sehat_model', 'sehat');

        $xKonfigurasi = $this->sehat->getConfigSatuSehat();

        $data = $this->sehat->cekTindakanPasien((int)$idTindakan);

        $idUser = $this->session->userdata('id_translucent');

        $getID = $this->sehat->aksesSatuSehat($idUser);

        $tokenBearer = $getID->token;

        $header = $this->sehat->authBearer($tokenBearer);

        if($data->id_tindakan_satset !== null && $data->id_tindakan_satset !== ''){

        	$idParams = $data->id_tindakan_satset;

        	$url = $xKonfigurasi->apiurl."Procedure/".$idParams;

        	$params=array(
	                    "resourceType"=> "Procedure",
	                    "id" => $idParams,
	                    "status"=> "completed",
	                    "code"=> array(
	                        "coding"=> [
	                                    array(
	                                       "system"=> "http://hl7.org/fhir/sid/icd-9-cm",
	                                       "code"=> $data->icd9,
	                                       "display"=> $data->nama_icd
	                                    )
	                        ]
	                    ),
	                    "subject"=> array(
	                         "reference"=> "Patient/".$data->ihsn,
	                         "display"=> $data->nama_pasien
	                    ),
	                    "encounter"=> array(
	                        "reference"=> "Encounter/".$data->id_encounter,
	                        "display"=> "Tindakan ".$data->nama." ".$data->nama_pasien." pada ".convertDateIndo($data->tanggal_layanan)
	                    )
	                        

	        );


        } else {

        	$url = $xKonfigurasi->apiurl."Procedure";

        	$params=array(
	                        "resourceType"=> "Procedure",
	                        "status"=> "completed",
	                        "code"=> array(
	                            "coding"=> [
	                                        array(
	                                           "system"=> "http://hl7.org/fhir/sid/icd-9-cm",
	                                           "code"=> $data->icd9,
	                                           "display"=> $data->nama_icd
	                                        )
	                            ]
	                        ),
	                        "subject"=> array(
	                             "reference"=> "Patient/".$data->ihsn,
	                             "display"=> $data->nama_pasien
	                        ),
	                        "encounter"=> array(
	                            "reference"=> "Encounter/".$data->id_encounter,
	        					"display"=> "Tindakan ".$data->nama." ".$data->nama_pasien." pada ".convertDateIndo($data->tanggal_layanan)
	                        )
	        
	            );

	    }

        $data_api = json_encode($params);

        if($data->id_tindakan_satset !== null && $data->id_tindakan_satset !== ''){

        	$output = $this->sehat->putEncounter($url, $data_api, $header);

        } else {

        	$output = $this->sehat->postEncounter($url, $data_api, $header);

        }

        if($output['result'] !== false){

	        if($output['respon'] === 201){

	            $result = json_decode($output['result']);

	            date_default_timezone_set('Asia/Jakarta');
	            
	            $update = ["id_tindakan_satset" => $result->id];

	            $this->db->where('id', $idTindakan)->update('sm_tarif_tindakan_pasien', $update);
	            
	            $xDetailData = ["kategori" => "Procedure", "no_rm" => $data->no_rm, "message" => json_encode($params), "jenis_data" => 'ok', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama')];

	            $this->db->insert('sm_satu_sehat_log', $xDetailData);

	            $decode = ["metaData" => ["code" => 200,"message" => 'Integrasi Procedure Pasien Berhasil']];

	        } else if($output['respon'] === 200){

	        	$result = json_decode($output['result']);

	            date_default_timezone_set('Asia/Jakarta');

	        	$xDetailData = ["kategori" => "Update Procedure", "no_rm" => $data->no_rm, "message" => json_encode($params), "jenis_data" => 'ok', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama')];

	        	$this->db->insert('sm_satu_sehat_log', $xDetailData);

	        } else {

	            $result = json_decode($output['result']);

	            if(isset($result->issue)){

		            $issued = $result->issue;
		            $details = $issued[0]->details;
		            date_default_timezone_set('Asia/Jakarta');
		            $xDetailData = ["kategori" => "Procedure","no_rm" => $data->no_rm, "message" => json_encode($details), "jenis_data" => 'error', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama')];
		            $this->db->insert('sm_satu_sehat_log', $xDetailData);
		        
		        } else {

		        	date_default_timezone_set('Asia/Jakarta');
		        	$xDetailData = ["kategori" => "Procedure","no_rm" => $data->no_rm, "message" => $output['result'], "jenis_data" => 'error', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama')];
		            $this->db->insert('sm_satu_sehat_log', $xDetailData);
		        
		        }

	        }

	    }

    }

	function simpan_coding_tindakan_post()
	{
		if(safe_post('id-unit-tindakan')=='40'): //OK
			$tabelTindakan='sm_tarif_operasi';
			$tabelHistori='sm_history_pengkodean_tindakanok';
		elseif(safe_post('id-unit-tindakan')=='41'): //Radiologi
			$tabelTindakan='sm_detail_radiologi';
			$tabelHistori='sm_history_pengkodean_tindakanradiologi';
		elseif(safe_post('id-unit-tindakan')=='38'): //Lab
			$tabelTindakan='sm_detail_laboratorium';
			$tabelHistori='sm_history_pengkodean_tindakanlab';
		elseif(safe_post('id-unit-tindakan')=='39'): //Lab
			$tabelTindakan='sm_detail_laboratorium';
			$tabelHistori='sm_history_pengkodean_tindakanlab';
		else :
			$tabelTindakan='sm_tarif_tindakan_pasien';
			$tabelHistori='sm_history_pengkodean_tindakan';
		endif;

		$dataUpdateTarifTindakan = array(
			'id_pengkodean' => safe_post('code-tindakan'),
			'id_coder' => $this->session->userdata('id_pegawai')
		);

		$where = array(
			'id' => safe_post('id-tarif-tindakan-pasien')
		);

		$this->db->trans_begin();

		$this->m_pengkodean_icd_x->updateData($where, $dataUpdateTarifTindakan, $tabelTindakan);

		$dataInsertHistory = array(
			'id_tarif_tindakan_pasien'	=> safe_post('id-tarif-tindakan-pasien'),
			'id_pengkodean_after' 		=> safe_post('code-tindakan'),
			'id_pengkodean_before' 		=> safe_post('id-golongan-sebab-before-tindakan') == '' ? NULL : safe_post('id-golongan-sebab-before-tindakan'),
			'id_coder' 					=> $this->session->userdata('id_pegawai'),
			'updated_on' 				=> date('Y-m-d H:i:s')
		);

		$this->m_pengkodean_icd_x->insertHistoryCodeTindakan($dataInsertHistory,$tabelHistori );


		$jenisLayanan = $this->m_pengkodean_icd_x->getTarifTindakanPasien((int)safe_post('id-tarif-tindakan-pasien'));

		if(isset($jenisLayanan->jenis_layanan)){

			if($jenisLayanan->jenis_layanan === 'Poliklinik'){

				$this->kirimDataProcedure(safe_post('id-tarif-tindakan-pasien'));

			}

		}

		if ($this->db->trans_status() === false) :
			$this->db->trans_rollback();
			$status = false;
			$message = 'Gagal menyimpan pengkodean';
		else :
			$this->db->trans_commit();
			$status = true;
			$message = 'Berhasil menyimpan pengkodean';
		endif;

		$this->response(array('status' => $status, 'message' => $message));
	}

	function get_list_diagnosa_get()
	{
		if (!$this->get('page')) :
			$this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
		endif;

		$start  = ($this->get('page') - 1) * $this->limit;
		$search = [
			'id_layanan_pendaftaran'  	=> $this->get('id_layanan_pendaftaran')
		];

		$data            = $this->m_pengkodean_icd_x->getListDataDiagnosa($this->limit, $start, $search);
		$data['page']    = (int) $this->get('page');
		$data['limit']   = $this->limit;

		if ($data) :
			$this->response($data, REST_Controller::HTTP_OK); // (200)
		endif;
	}

	function get_detail_layanan_get()
	{
		if (!$this->get('id_layanan_pendaftaran')) :
			$this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
		endif;		

		$data            = $this->m_pengkodean_icd_x->getLayananPendaftaranByIdLayananPendaftaran($this->get('id_layanan_pendaftaran'));		
		
		if ($data) :
			$this->response($data, REST_Controller::HTTP_OK); // (200)
		endif;
	}

	private function autentikasi_user_post($x = null)
    {

        $this->load->model('satu_sehat/Satu_sehat_model', 'sehat');

        $idUser = $this->session->userdata('id_translucent');

        $dataAkses = $this->sehat->aksesSatuSehat($idUser);

        $xKonfigurasi = $this->sehat->getConfigSatuSehat();

        if(empty($dataAkses)){

            $cekTimeissued = $this->sehat->aksesTimeissued();

            $waktu = (int)$cekTimeissued->timeissued;

            date_default_timezone_set('Asia/Jakarta');
            $tanggalTunggu = (round(microtime(true) * 1000));
            $satuJam = 120000;
            $tglWaktu = (int)$tanggalTunggu - (int)$waktu;

            if((int)$tglWaktu === (int)$satuJam || (int)$tglWaktu > (int)$satuJam){
            	
                $url = $xKonfigurasi->auth."accesstoken?grant_type=client_credentials";

                $header = $this->sehat->authHeader();

                $params=array(
                                "client_id" => $xKonfigurasi->clientid,
                                "client_secret" => $xKonfigurasi->clientsecret
                            );
                
                $data_api = http_build_query($params);

                $output = $this->sehat->postCurl($url, $data_api, $header);

                if($output['result'] !== false){

                    if($output['respon'] === 200){

                        $result = json_decode($output['result']);
                        date_default_timezone_set('Asia/Jakarta');

                        $data_response = array(

                            "userakses"         => (int)$idUser,
                            "nama"              => $this->session->userdata('nama'),
                            "token"             => $result->access_token,
                            "timeissued"        => $result->issued_at,
                            "app_name"          => $result->application_name,
                            "tanggal"           => date('Y-m-d H:i:s')

                        );

                        $this->db->insert('sm_akses_satu_sehat', $data_response);

                    } else {

                        date_default_timezone_set('Asia/Jakarta');

                        $dataResponse = array(

                            "userakses"         => (int)$idUser,
                            "nama"              => $this->session->userdata('nama'),
                            "token"             => $cekTimeissued->token,
                            "timeissued"        => $cekTimeissued->timeissued,
                            "app_name"          => $cekTimeissued->app_name,
                            "tanggal"           => date('Y-m-d H:i:s')

                        );

                        $this->db->insert('sm_akses_satu_sehat', $dataResponse);

                        $xDetailData = ["kategori" => "Autentikasi", "param" => $idUser, "message" => $output['result'], "jenis_data" => 'error', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama'), "respon" => $output['respon'], "function" => 'autentikasi_user_post pengkodean_icd_x'];
                        $this->db->insert('sm_satu_sehat_log', $xDetailData);

                    }

                } else {

                    date_default_timezone_set('Asia/Jakarta');

                    $dataResponse = array(

                        "userakses"         => (int)$idUser,
                        "nama"              => $this->session->userdata('nama'),
                        "token"             => $cekTimeissued->token,
                        "timeissued"        => $cekTimeissued->timeissued,
                        "app_name"          => $cekTimeissued->app_name,
                        "tanggal"           => date('Y-m-d H:i:s')

                    );

                    $this->db->insert('sm_akses_satu_sehat', $dataResponse);

                    $xDetailData = ["kategori" => "Autentikasi", "param" => $idUser, "message" => 'false', "jenis_data" => 'error', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama'), "function" => 'autentikasi_user_post pengkodean_icd_x'];
                    $this->db->insert('sm_satu_sehat_log', $xDetailData);

                }

            } else {

                date_default_timezone_set('Asia/Jakarta');

                $dataResponse = array(

                    "userakses"         => (int)$idUser,
                    "nama"              => $this->session->userdata('nama'),
                    "token"             => $cekTimeissued->token,
                    "timeissued"        => $cekTimeissued->timeissued,
                    "app_name"          => $cekTimeissued->app_name,
                    "tanggal"           => date('Y-m-d H:i:s')

                );

                $this->db->insert('sm_akses_satu_sehat', $dataResponse);

            }

        } else {

        	$cekTimeissued = $this->sehat->aksesTimeissued();

            if(isset($dataAkses->timeissued) && !is_null($dataAkses->timeissued)){

                $waktu = (int)$cekTimeissued->timeissued;

	            date_default_timezone_set('Asia/Jakarta');
	            $tanggalTunggu = (round(microtime(true) * 1000));
	            $satuJam = 120000;
	            $tglWaktu = (int)$tanggalTunggu - (int)$waktu;

	            if((int)$tglWaktu === (int)$satuJam || (int)$tglWaktu > (int)$satuJam){

                    $url = $xKonfigurasi->auth."accesstoken?grant_type=client_credentials";

                    $header = $this->sehat->authHeader();

                    $params=array(
                                    "client_id" => $xKonfigurasi->clientid,
                                    "client_secret" => $xKonfigurasi->clientsecret
                                );
                    
                    $data_api = http_build_query($params);

                    $output = $this->sehat->postCurl($url, $data_api, $header);

                    if($output['result'] !== false){

	                    if($output['respon'] === 200){

	                        $result = json_decode($output['result']);
	                        date_default_timezone_set('Asia/Jakarta');

	                        $data_response = array(

	                            "userakses"         => (int)$idUser,
	                            "nama"              => $this->session->userdata('nama'),
	                            "token"             => $result->access_token,
	                            "timeissued"        => $result->issued_at,
	                            "app_name"          => $result->application_name,
	                            "tanggal"           => date('Y-m-d H:i:s')

	                        );

	                        $this->db->insert('sm_akses_satu_sehat', $data_response);

	                    } else {

	                        date_default_timezone_set('Asia/Jakarta');

	                        $dataResponse = array(

	                            "userakses"         => (int)$idUser,
	                            "nama"              => $this->session->userdata('nama'),
	                            "token"             => $cekTimeissued->token,
	                            "timeissued"        => $cekTimeissued->timeissued,
	                            "app_name"          => $cekTimeissued->app_name,
	                            "tanggal"           => date('Y-m-d H:i:s')

	                        );

	                        $this->db->insert('sm_akses_satu_sehat', $dataResponse);

	                        $xDetailData = ["kategori" => "Autentikasi", "param" => $idUser, "message" => $output['result'], "jenis_data" => 'error', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama'), "respon" => $output['respon'], "function" => 'autentikasi_user_post pengkodean_icd_x'];
                        	$this->db->insert('sm_satu_sehat_log', $xDetailData);

	                    }

	                } else {

	                    date_default_timezone_set('Asia/Jakarta');

	                    $dataResponse = array(

	                        "userakses"         => (int)$idUser,
	                        "nama"              => $this->session->userdata('nama'),
	                        "token"             => $cekTimeissued->token,
	                        "timeissued"        => $cekTimeissued->timeissued,
	                        "app_name"          => $cekTimeissued->app_name,
	                        "tanggal"           => date('Y-m-d H:i:s')

	                    );

	                    $this->db->insert('sm_akses_satu_sehat', $dataResponse);

	                    $xDetailData = ["kategori" => "Autentikasi", "param" => $idUser, "message" => 'false', "jenis_data" => 'error', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama'), "function" => 'autentikasi_user_post pengkodean_icd_x'];
                    	$this->db->insert('sm_satu_sehat_log', $xDetailData);

	                }

                } else {

                    date_default_timezone_set('Asia/Jakarta');

                    $update = ["token" => $cekTimeissued->token,"timeissued" => $cekTimeissued->timeissued,"app_name" => $cekTimeissued->app_name,"tanggal" => date('Y-m-d H:i:s')];

                    $id = (int)$idUser;

                    $data = $this->db->where('userakses', $id)->update('sm_akses_satu_sehat', $update);

                }

            } else {

                $url = $xKonfigurasi->auth."accesstoken?grant_type=client_credentials";

                $header = $this->sehat->authHeader();

                $params=array(
                                "client_id" => $xKonfigurasi->clientid,
                                "client_secret" => $xKonfigurasi->clientsecret
                            );
                
                $data_api = http_build_query($params);

                $output = $this->sehat->postCurl($url, $data_api, $header);

                if($output['result'] !== false){

                    if($output['respon'] === 200){

                        $result = json_decode($output['result']);
                        date_default_timezone_set('Asia/Jakarta');

                        $data_response = array(

                            "userakses"         => (int)$idUser,
                            "nama"              => $this->session->userdata('nama'),
                            "token"             => $result->access_token,
                            "timeissued"        => $result->issued_at,
                            "app_name"          => $result->application_name,
                            "tanggal"           => date('Y-m-d H:i:s')

                        );

                        $this->db->insert('sm_akses_satu_sehat', $data_response);

                    } else {

                        date_default_timezone_set('Asia/Jakarta');

                        $dataResponse = array(

                            "userakses"         => (int)$idUser,
                            "nama"              => $this->session->userdata('nama'),
                            "token"             => $cekTimeissued->token,
                            "timeissued"        => $cekTimeissued->timeissued,
                            "app_name"          => $cekTimeissued->app_name,
                            "tanggal"           => date('Y-m-d H:i:s')

                        );

                        $this->db->insert('sm_akses_satu_sehat', $dataResponse);

                        $xDetailData = ["kategori" => "Autentikasi", "param" => $idUser, "message" => $output['result'], "jenis_data" => 'error', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama'), "respon" => $output['respon'], "function" => 'autentikasi_user_post pengkodean_icd_x'];
                        $this->db->insert('sm_satu_sehat_log', $xDetailData);

                    }

                } else {

                    date_default_timezone_set('Asia/Jakarta');

                    $dataResponse = array(

                        "userakses"         => (int)$idUser,
                        "nama"              => $this->session->userdata('nama'),
                        "token"             => $cekTimeissued->token,
                        "timeissued"        => $cekTimeissued->timeissued,
                        "app_name"          => $cekTimeissued->app_name,
                        "tanggal"           => date('Y-m-d H:i:s')

                    );

                    $this->db->insert('sm_akses_satu_sehat', $dataResponse);

                    $xDetailData = ["kategori" => "Autentikasi", "param" => $idUser, "message" => 'false', "jenis_data" => 'error', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama'), "function" => 'autentikasi_user_post pengkodean_icd_x'];
                    $this->db->insert('sm_satu_sehat_log', $xDetailData);

                }
                
            }

        }

    }

	private function konverTimeStamp($time){

        $estimate = new DateTime($time);
        $nw_est = $estimate->getTimestamp();
        $nw_est_one = $nw_est*1000;

        return $nw_est_one;

    }

	private function finish_encounter_put($idLayanan)
    {

        $this->autentikasi_user_post();

        if($idLayanan === null){

            $cdecode = ["metaData" => ["code" => 201,"message" => 'ID Layanan Tidak ada, harap refresh kembali']];
            return $cdecode;
        
        }

        $this->load->model('satu_sehat/Satu_sehat_model', 'sehat');

        $data = $this->sehat->cekidLayananPendaftaran((int)$idLayanan);

        if($data->id_poli !== null){

            $idSpesial = (int)$data->id_poli;

            $nama = 1;

            $dataPoli = $this->sehat->cekDataPoli($nama, $idSpesial);

            if($dataPoli !== null && $dataPoli !== ''){

                $lokasi = $dataPoli->integrasi_baru;
                $nama = $dataPoli->nama;

            } else {

                $cdecode = ["metaData" => ["code" => 201,"message" => 'Poli Belum di integrasi, Silakan integrasikan ke satu sehat terlebih dahulu']];
                return $cdecode;
            	die();

            }

        } else {

            $cdecode = ["metaData" => ["code" => 201,"message" => 'Id Poli Tidak Ada']];
            return $cdecode;
            die();

        }

        if($data->ihsn !== null){

            $dataIhsn = $data->ihsn;
            $namaPasien = $data->nama_pasien;

        } else {

            $cdecode = ["metaData" => ["code" => 201,"message" => 'Silakan Integrasikan Pasien Terlebih Dahulu ke Satu Sehat']];
            return $cdecode;
            die();     

        }

        if($data->ihs_number !== null){

            $dataIhsDokter = $data->ihs_number;
            $namaDokter = $data->nama_dokter;

        } else {

            $cdecode = ["metaData" => ["code" => 201,"message" => 'Silakan Integrasikan Dokter Terlebih Dahulu ke Satu Sehat']];
            return $cdecode;
            die();     

        }

        $xKonfigurasi = $this->sehat->getConfigSatuSehat();

        $idOrganization = (int)$xKonfigurasi->organization;

        $idUser = $this->session->userdata('id_translucent');

        $getID = $this->sehat->aksesSatuSehat($idUser);

        $tokenBearer = $getID->token;

        $idParams = $data->id_encounter;

        $url = $xKonfigurasi->apiurl."Encounter/".$idParams;

        $header = $this->sehat->authBearer($tokenBearer);

        $waktuStart = $data->task_tiga;

        $waktuProgress = $data->task_empat;

        $waktuEnd = $data->task_lima;

        $konvTimeStart = $this->konverTimeStamp($waktuStart);

        $konvTimeProgress = $this->konverTimeStamp($waktuProgress);

        $konvTimeEnd = $this->konverTimeStamp($waktuEnd);

        $timeStart = date('c', $konvTimeStart/1000);

        $timeProgress = date('c', $konvTimeProgress/1000);

        $timeEnd = date('c', $konvTimeEnd/1000);

        $diagnosis = $this->sehat->cekDiagnosisEncounter($idLayanan);

        $dArray = array();

        foreach ($diagnosis as $key => $value) {

            $dArray[$key]['kondisi'] = $value;

        }

        $item = "[";

        foreach ($dArray as $key => $value) {

            $prioritas = $value['kondisi']->prioritas;

            if($prioritas === 'Utama'){

                $rank = 1;

            } else {

                $rank = (int)$key+1;

            }

            $item .= "{\"condition\": {
                \"reference\":\"Condition/".$value['kondisi']->id_kondisi. "\",
                \"display\": \"".$value['kondisi']->nama_diagnosis. "\"
            },
                    \"use\": {
                    \"coding\": [
                            {
                                \"system\": \"http://terminology.hl7.org/CodeSystem/diagnosis-role\",
                                \"code\": \"DD\",
                                \"display\": \"Discharge diagnosis\"
                            }
                        ]
                    },
                    \"rank\": ".$rank. "
               }";

            if ($key < sizeof($dArray) - 1) {
                $item .= ",";
            }

        }

        $item .= "]";

        $diagArray = json_decode($item);

        $params=array(

                  "resourceType"    => "Encounter",
                  "id" => $data->id_encounter,
                  "identifier"  => [
                    array(
                      "system"  => "http://sys-ids.kemkes.go.id/encounter/".$idOrganization,
                      "value"   => $data->kode_booking
                    )
                  ],
                  "status"  => "finished",
                  "class"   => array(
                    "system"    => "http://terminology.hl7.org/CodeSystem/v3-ActCode",
                    "code"      => "AMB",
                    "display"   => "ambulatory"
                  ),
                  "subject" => array(
                                "reference" => "Patient/".$dataIhsn,
                                "display"   => $namaPasien

                            ),
                  "participant" => [
                    array(
                      "type"    => [
                        array(
                          "coding"  => [
                            array(
                              "system"  => "http://terminology.hl7.org/CodeSystem/v3-ParticipationType",
                              "code"    => "ATND",
                              "display" => "attender"
                            )
                          ]
                        )
                      ],
                      "individual" => array(
                                        "reference" => "Practitioner/".$dataIhsDokter,
                                        "display"   => $namaDokter
                        )
                    )
                  ],
                  "period"  => array(
                    "start" => $timeStart,
                    "end"   => $timeEnd
                  ),
                  "location"  => [array(
                                
                        "location" => array(
                            "reference"  => "Location/".$lokasi,
                            "display"    => $nama
                        )
                                
                    )],

                  "diagnosis"=> $diagArray,
                  "statusHistory"   => [
                    array(
                      "status"   => "arrived",
                      "period"   => array(
                        "start"   => $timeStart,
                        "end"   => $timeProgress
                      )
                    ),
                    array(
                      "status"   => "in-progress",
                      "period"   => array(
                        "start"   => $timeProgress,
                        "end"   => $timeEnd
                      )
                    ),
                    array(
                      "status"   => "finished",
                      "period"   => array(
                        "start"   => $timeEnd,
                        "end"   => $timeEnd
                      )
                    )
                  ],
                  "serviceProvider"   => array(
                    "reference"=> "Organization/".$idOrganization
                  )
        );

        $data_api = json_encode($params);

        $output = $this->sehat->putEncounter($url, $data_api, $header);

        if($output['result'] !== false){

	        if($output['respon'] === 200){

	            $result = json_decode($output['result']);

	            $update = ["finish" => 'OK'];

	            $this->db->where('id', $idLayanan)->update('sm_layanan_pendaftaran', $update);

	            date_default_timezone_set('Asia/Jakarta');

	          	$xDetailData = ["kategori" => "Finish Encounter", "no_rm" => $data->no_rm, "message" => json_encode($params), "jenis_data" => 'ok', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama')];

	          	$this->db->insert('sm_satu_sehat_log', $xDetailData);

	          	$decode = ["metaData" => ["code" => 200,"message" => 'Update Encounter Finish Berhasil']];

	        } else {

	            $result = json_decode($output['result']);

	            if(isset($result->issue)){

		            $issued = $result->issue;
		            $details = $issued[0]->details;
		            date_default_timezone_set('Asia/Jakarta');
		            $xDetailData = ["kategori" => "Finish Encounter","no_rm" => $data->no_rm, "message" => json_encode($details), "jenis_data" => 'error', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama')];
		            $this->db->insert('sm_satu_sehat_log', $xDetailData);
		            $decode = ["metaData" => ["code" => 201,"message" => $details->text]];

		        } else {

		        	date_default_timezone_set('Asia/Jakarta');
		            $xDetailData = ["kategori" => "Finish Encounter","no_rm" => $data->no_rm, "message" => $output['result'], "jenis_data" => 'error', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama')];
		            $this->db->insert('sm_satu_sehat_log', $xDetailData);
		            $decode = ["metaData" => ["code" => 202,"message" => 'error']];

		        }

	        }

	        return $decode;
        
        }
    }

    private function konversiTanggal($tanggal){

        date_default_timezone_set('Asia/Jakarta');

        $konvTanggal = date("Y-m-d\TH:i:sP", strtotime($tanggal));

        return $konvTanggal;

    }

    private function kirim_primary_condition_post($idDiagnosis)
    {

        $this->autentikasi_user_post();

        if($idDiagnosis === null){

            $cdecode = ["metaData" => ["code" => 201,"message" => 'ID Diagnosis Tidak ada, harap refresh kembali']];
            return $cdecode;
            die();

        }

        $this->load->model('satu_sehat/Satu_sehat_model', 'sehat');

        $xKonfigurasi = $this->sehat->getConfigSatuSehat();

        $data = $this->sehat->cekPrimaryCondition((int)$idDiagnosis);

        $tanggalLayanan = $this->konversiTanggal($data->tanggal_layanan);

        $idUser = $this->session->userdata('id_translucent');

        $getID = $this->sehat->aksesSatuSehat($idUser);

        $tokenBearer = $getID->token;

        $xKonfigurasi = $this->sehat->getConfigSatuSehat();

        $url = $xKonfigurasi->apiurl."Condition";

        $header = $this->sehat->authBearer($tokenBearer);

        $params=array(
                        "resourceType"=> "Condition",
                        "clinicalStatus"=> array(
                            "coding"=> [
                                        array(
                                           "system"=> "http://terminology.hl7.org/CodeSystem/condition-clinical",
                                           "code"=> "active",
                                           "display"=> "Active"
                                        )
                            ]
                        ),
                        "category"=> [
                            array(
                                "coding"=> [
                                           array(
                                              "system"=> "http://terminology.hl7.org/CodeSystem/condition-category",
                                              "code"=> "encounter-diagnosis",
                                              "display"=> "Encounter Diagnosis"
                                           )
                                ]
                            )
                        ],
                        "code"=> array(
                            "coding"=> [
                                        array(
                                           "system"=> "http://hl7.org/fhir/sid/icd-10",
                                           "code"=> $data->kode_icdx,
                                           "display"=> $data->nama_diagnosis
                                        )
                            ]
                        ),
                        "subject"=> array(
                             "reference"=> "Patient/".$data->ihsn,
                             "display"=> $data->nama_pasien
                        ),
                        "encounter"=> array(
                            "reference"=> "Encounter/".$data->id_encounter
                        ),
                        "onsetDateTime"=> $tanggalLayanan,
                        "recordedDate" => $tanggalLayanan
                            

            );

        $data_api = json_encode($params);

        $output = $this->sehat->postEncounter($url, $data_api, $header);

        if($output['result'] !== false){

	        if($output['respon'] === 201){

	            $result = json_decode($output['result']);

	            $update = ["id_kondisi" => $result->id];

	            $this->db->where('id', $idDiagnosis)->update('sm_diagnosa', $update);

	            date_default_timezone_set('Asia/Jakarta');

		        $xDetailData = ["kategori" => "Primary Condition", "no_rm" => $data->no_rm, "message" => json_encode($params), "jenis_data" => 'ok', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama')];

		        $this->db->insert('sm_satu_sehat_log', $xDetailData);

	            $decode = ["metaData" => ["code" => 200,"message" => 'Integrasi Primary Condition Berhasil']];

	        } else {

	            $result = json_decode($output['result']);

	            if(isset($result->issue)){

		            $issued = $result->issue;
		            $details = $issued[0]->details;
		            date_default_timezone_set('Asia/Jakarta');
		            $xDetailData = ["kategori" => "Primary Condition","no_rm" => $data->no_rm, "message" => $output['result'], "jenis_data" => 'error', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama')];
		            $this->db->insert('sm_satu_sehat_log', $xDetailData);
		            $decode = ["metaData" => ["code" => 202,"message" => $details->text]];

	            } else {

	            	date_default_timezone_set('Asia/Jakarta');
	            	$xDetailData = ["kategori" => "Primary Condition","no_rm" => $data->no_rm, "message" => $output['result'], "jenis_data" => 'error', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama')];
	              	$this->db->insert('sm_satu_sehat_log', $xDetailData);
	              	$decode = ["metaData" => ["code" => 202,"message" => 'error']];

	          	}

	        }

	        return $decode;

	    }

    }

    private function kirim_secondary_condition_post($idDiagnosis)
    {

        $this->autentikasi_user_post();

        if($idDiagnosis === null){

            $cdecode = ["metaData" => ["code" => 201,"message" => 'ID Diagnosis Tidak ada, harap refresh kembali']];
            return $cdecode;
            die();

        }

        $this->load->model('satu_sehat/Satu_sehat_model', 'sehat');

        $data = $this->sehat->cekSecondaryCondition((int)$idDiagnosis);
        
        $hariLayanan = get_day($data->tanggal_layanan);

        $formatTanggal = get_date_format($data->tanggal_layanan);

        $tanggalLayanan = $this->konversiTanggal($data->tanggal_layanan);

        $idUser = $this->session->userdata('id_translucent');

        $getID = $this->sehat->aksesSatuSehat($idUser);

        $tokenBearer = $getID->token;

        $xKonfigurasi = $this->sehat->getConfigSatuSehat();

        $url = $xKonfigurasi->apiurl."Condition";

        $header = $this->sehat->authBearer($tokenBearer);

        $params=array(
                        "resourceType"=> "Condition",
                        "clinicalStatus"=> array(
                            "coding"=> [
                                        array(
                                           "system"=> "http://terminology.hl7.org/CodeSystem/condition-clinical",
                                           "code"=> "active",
                                           "display"=> "Active"
                                        )
                            ]
                        ),
                        "category"=> [
                            array(
                                "coding"=> [
                                           array(
                                              "system"=> "http://terminology.hl7.org/CodeSystem/condition-category",
                                              "code"=> "encounter-diagnosis",
                                              "display"=> "Encounter Diagnosis"
                                           )
                                ]
                            )
                        ],
                        "code"=> array(
                            "coding"=> [
                                        array(
                                           "system"=> "http://hl7.org/fhir/sid/icd-10",
                                           "code"=> $data->kode_icdx,
                                           "display"=> $data->nama_diagnosis
                                        )
                            ]
                        ),
                        "subject"=> array(
                             "reference"=> "Patient/".$data->ihsn,
                             "display"=> $data->nama_pasien
                        ),
                        "encounter"=> array(
                            "reference"=> "Encounter/".$data->id_encounter,
                            "display" => "Kunjungan ".$data->nama_pasien." di hari ".$hariLayanan.", ".$formatTanggal
                        ),
                        "onsetDateTime"=> $tanggalLayanan,
                        "recordedDate" => $tanggalLayanan
                            

            );

        $data_api = json_encode($params);

        $output = $this->sehat->postEncounter($url, $data_api, $header);

        if($output['result'] !== false){

	        if($output['respon'] === 201){

	            $result = json_decode($output['result']);

	            $update = ["id_kondisi" => $result->id];

	            $this->db->where('id', $idDiagnosis)->update('sm_diagnosa', $update);

	            date_default_timezone_set('Asia/Jakarta');

		        $xDetailData = ["kategori" => "Secondary Condition", "no_rm" => $data->no_rm, "message" => json_encode($params), "jenis_data" => 'ok', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama')];

		        $this->db->insert('sm_satu_sehat_log', $xDetailData);

	            $decode = ["metaData" => ["code" => 200,"message" => 'Integrasi Primary Condition Berhasil']];

	        } else {

	            $result = json_decode($output['result']);

	            if(isset($result->issue)){

		            date_default_timezone_set('Asia/Jakarta');
		            $xDetailData = ["kategori" => "Secondary Condition","no_rm" => $data->no_rm, "message" => $output['result'], "jenis_data" => 'error', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama')];
		            $this->db->insert('sm_satu_sehat_log', $xDetailData);
		            $issued = $result->issue;
		            $details = $issued[0]->details;
		            $decode = ["metaData" => ["code" => 202,"message" => $details->text]];

		        } else {

		            date_default_timezone_set('Asia/Jakarta');
		            $xDetailData = ["kategori" => "Secondary Condition","no_rm" => $data->no_rm, "message" => $output['result'], "jenis_data" => 'error', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama')];
		            $this->db->insert('sm_satu_sehat_log', $xDetailData);
		            $decode = ["metaData" => ["code" => 202,"message" => 'error']];

	          	}

	        }

	        return $decode;

	    }


    }

    private function update_condition_secondary_put($idDiagnosis)
    {

        $this->autentikasi_user_post();

        if($idDiagnosis === null){

            $cdecode = ["metaData" => ["code" => 201,"message" => 'ID Diagnosis Tidak ada, harap refresh kembali']];
            return $cdecode;
            die();

        }

        $this->load->model('satu_sehat/Satu_sehat_model', 'sehat');

        $data = $this->sehat->cekSecondaryCondition((int)$idDiagnosis);

        $hariLayanan = get_day($data->tanggal_layanan);

        $formatTanggal = get_date_format($data->tanggal_layanan);

        $tanggalLayanan = $this->konversiTanggal($data->tanggal_layanan);

        $idUser = $this->session->userdata('id_translucent');

        $getID = $this->sehat->aksesSatuSehat($idUser);

        $tokenBearer = $getID->token;

        $idParams = $data->id_kondisi;

        $xKonfigurasi = $this->sehat->getConfigSatuSehat();

        $url = $xKonfigurasi->apiurl."Condition/".$idParams;

        $header = $this->sehat->authBearer($tokenBearer);

        $params=array(
                        "resourceType"=> "Condition",
                        "id" => $idParams,
                        "clinicalStatus"=> array(
                            "coding"=> [
                                        array(
                                           "system"=> "http://terminology.hl7.org/CodeSystem/condition-clinical",
                                           "code"=> "remission",
                                           "display"=> "Remission"
                                        )
                            ]
                        ),
                        "category"=> [
                            array(
                                "coding"=> [
                                           array(
                                              "system"=> "http://terminology.hl7.org/CodeSystem/condition-category",
                                              "code"=> "encounter-diagnosis",
                                              "display"=> "Encounter Diagnosis"
                                           )
                                ]
                            )
                        ],
                        "code"=> array(
                            "coding"=> [
                                        array(
                                           "system"=> "http://hl7.org/fhir/sid/icd-10",
                                           "code"=> $data->kode_icdx,
                                           "display"=> $data->nama_diagnosis
                                        )
                            ]
                        ),
                        "subject"=> array(
                             "reference"=> "Patient/".$data->ihsn,
                             "display"=> $data->nama_pasien
                        ),
                        "encounter"=> array(
                            "reference"=> "Encounter/".$data->id_encounter,
                            "display" => "Kunjungan ".$data->nama_pasien." di hari ".$hariLayanan.", ".$formatTanggal
                        ),
                        "onsetDateTime"=> $tanggalLayanan,
                        "recordedDate" => $tanggalLayanan
                            

            );

        $data_api = json_encode($params);

        $output = $this->sehat->putEncounter($url, $data_api, $header);

        if($output['result'] !== false){

	        if($output['respon'] === 200){

	            $result = json_decode($output['result']);

	            $update = ["id_kondisi" => $result->id];

	            $this->db->where('id', $idDiagnosis)->update('sm_diagnosa', $update);

	            date_default_timezone_set('Asia/Jakarta');

		        $xDetailData = ["kategori" => "Update Secondary Condition", "no_rm" => $data->no_rm, "message" => json_encode($params), "jenis_data" => 'ok', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama')];

		        $this->db->insert('sm_satu_sehat_log', $xDetailData);

	            $decode = ["metaData" => ["code" => 200,"message" => 'Integrasi Secondary Condition Berhasil']];

	        } else {

	            $result = json_decode($output['result']);

	            if(isset($result->issue)){
	            
		            date_default_timezone_set('Asia/Jakarta');
		            $xDetailData = ["kategori" => "Update Secondary Condition","no_rm" => $data->no_rm, "message" => $output['result'], "jenis_data" => 'error', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama')];
		            $this->db->insert('sm_satu_sehat_log', $xDetailData);
		            $issued = $result->issue;
		            $details = $issued[0]->details;
		            $decode = ["metaData" => ["code" => 202,"message" => $details->text]];

		        } else {

	            	date_default_timezone_set('Asia/Jakarta');
	            	$xDetailData = ["kategori" => "Update Secondary Condition","no_rm" => $data->no_rm, "message" => $output['result'], "jenis_data" => 'error', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama')];
	              	$this->db->insert('sm_satu_sehat_log', $xDetailData);
	              	$decode = ["metaData" => ["code" => 202,"message" => 'error']];

	          	}

	        }

	        return $decode;

	    }


    }

    private function update_condition_primary_put($idDiagnosis)
    {

        $this->autentikasi_user_post();

        if($idDiagnosis === null){

            $cdecode = ["metaData" => ["code" => 201,"message" => 'ID Diagnosis Tidak ada, harap refresh kembali']];
            return $cdecode;
            die();

        }

        $this->load->model('satu_sehat/Satu_sehat_model', 'sehat');
        
        $data = $this->sehat->cekPrimaryCondition((int)$idDiagnosis);

        $hariLayanan = get_day($data->tanggal_layanan);

        $formatTanggal = get_date_format($data->tanggal_layanan);

        $tanggalLayanan = $this->konversiTanggal($data->tanggal_layanan);

        $idUser = $this->session->userdata('id_translucent');

        $getID = $this->sehat->aksesSatuSehat($idUser);

        $tokenBearer = $getID->token;

        $idParams = $data->id_kondisi;

        $xKonfigurasi = $this->sehat->getConfigSatuSehat();

        $url = $xKonfigurasi->apiurl."Condition/".$idParams;

        $header = $this->sehat->authBearer($tokenBearer);

        $params=array(
                        "resourceType"=> "Condition",
                        "id" => $idParams,
                        "clinicalStatus"=> array(
                            "coding"=> [
                                        array(
                                           "system"=> "http://terminology.hl7.org/CodeSystem/condition-clinical",
                                           "code"=> "remission",
                                           "display"=> "Remission"
                                        )
                            ]
                        ),
                        "category"=> [
                            array(
                                "coding"=> [
                                           array(
                                              "system"=> "http://terminology.hl7.org/CodeSystem/condition-category",
                                              "code"=> "encounter-diagnosis",
                                              "display"=> "Encounter Diagnosis"
                                           )
                                ]
                            )
                        ],
                        "code"=> array(
                            "coding"=> [
                                        array(
                                           "system"=> "http://hl7.org/fhir/sid/icd-10",
                                           "code"=> $data->kode_icdx,
                                           "display"=> $data->nama_diagnosis
                                        )
                            ]
                        ),
                        "subject"=> array(
                             "reference"=> "Patient/".$data->ihsn,
                             "display"=> $data->nama_pasien
                        ),
                        "encounter"=> array(
                            "reference"=> "Encounter/".$data->id_encounter,
                            "display" => "Kunjungan ".$data->nama_pasien." di hari ".$hariLayanan.", ".$formatTanggal
                        ),
                        "onsetDateTime"=> $tanggalLayanan,
                        "recordedDate" => $tanggalLayanan
                            

            );

        $data_api = json_encode($params);

        $output = $this->sehat->putEncounter($url, $data_api, $header);

        if($output['result'] !== false){

	        if($output['respon'] === 200){

	            $result = json_decode($output['result']);

	            $update = ["id_kondisi" => $result->id];

	            $this->db->where('id', $idDiagnosis)->update('sm_diagnosa', $update);

	            date_default_timezone_set('Asia/Jakarta');

		        $xDetailData = ["kategori" => "Update Primary Condition", "no_rm" => $data->no_rm, "message" => json_encode($params), "jenis_data" => 'ok', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama')];

		        $this->db->insert('sm_satu_sehat_log', $xDetailData);

	            $decode = ["metaData" => ["code" => 200,"message" => 'Integrasi Primary Condition Berhasil']];

	        } else {

	            $result = json_decode($output['result']);

	            if(isset($result->issue)){

		            date_default_timezone_set('Asia/Jakarta');
		            $xDetailData = ["kategori" => "Update Primary Condition","no_rm" => $data->no_rm, "message" => $output['result'], "jenis_data" => 'error', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama')];
		            $this->db->insert('sm_satu_sehat_log', $xDetailData);
		            $issued = $result->issue;
		            $details = $issued[0]->details;
		            $decode = ["metaData" => ["code" => 202,"message" => $details->text]];

		        } else {

	            	date_default_timezone_set('Asia/Jakarta');
	            	$xDetailData = ["kategori" => "Update Primary Condition","no_rm" => $data->no_rm, "message" => $output['result'], "jenis_data" => 'error', "tanggal" => date('Y-m-d H:i:s'), "user" => $this->session->userdata('nama')];
	              	$this->db->insert('sm_satu_sehat_log', $xDetailData);
	              	$decode = ["metaData" => ["code" => 202,"message" => 'error']];

	          	}

	        }

	        return $decode;

	    }

    }

	function simpan_coding_diagnosa_post()
	{
		if(safe_post('code-diagnosa-asterik')==''){
			$dataUpdateDiagnosa = array(
				'id_pengkodean' => safe_post('code-diagnosa'),
				'id_coder' => $this->session->userdata('id_pegawai')
			);
		} else {
			$dataUpdateDiagnosa = array(
				'id_pengkodean' => safe_post('code-diagnosa'),
				'id_pengkodean_asterik' => safe_post('code-diagnosa-asterik'),
				'id_coder' => $this->session->userdata('id_pegawai')
			);
		}

		$where = array(
			'id' => safe_post('id-diagnosa')
		);

		$this->db->trans_begin();

		$this->m_pengkodean_icd_x->updateData($where, $dataUpdateDiagnosa, 'sm_diagnosa');

		$dataInsertHistory = array(
			'id_diagnosa'						=> safe_post('id-diagnosa'),
			'id_golongan_sebab_sakit_after' 	=> safe_post('code-diagnosa'),
			'id_golongan_sebab_sakit_before' 	=> safe_post('id-golongan-sebab-before-diagnosa') == '' ? NULL : safe_post('id-golongan-sebab-before-diagnosa'),
			'id_coder' 							=> $this->session->userdata('id_pegawai'),
			'updated_on' 						=> date('Y-m-d H:i:s')
		);

		$this->m_pengkodean_icd_x->insertHistoryCodeDiagnosa($dataInsertHistory, 'sm_history_pengkodean_diagnosa');

		$jenisLayanan = $this->m_pengkodean_icd_x->jenisLayanan(safe_post('id-layanan-pendaftaran-coding-diagnosa'));

		if($jenisLayanan === 'Poliklinik'){

			if(safe_post('id-layanan-pendaftaran-coding-diagnosa') !== null){

				$cekDataDiagnosis = $this->m_pengkodean_icd_x->ambilDataDiagnosis((int)safe_post('id-diagnosa'));

				$cekDataLayanan = $this->m_pengkodean_icd_x->ambilDataLayanan((int)safe_post('id-layanan-pendaftaran-coding-diagnosa'));

				if(!empty($cekDataLayanan)){

	                if($cekDataDiagnosis->prioritas === 'Utama'){

	                	if($cekDataDiagnosis->id_kondisi === null){

	                		$x = $this->kirim_primary_condition_post(safe_post('id-diagnosa'));

	                	} else {

	                		$x = $this->update_condition_primary_put(safe_post('id-diagnosa'));

	                	}

	                } else {

	                	if($cekDataDiagnosis->id_kondisi === null){

	                		$x = $this->kirim_secondary_condition_post((int)safe_post('id-diagnosa'));

	                	} else {

	                		$x = $this->update_condition_secondary_put((int)safe_post('id-diagnosa'));

	                	}

	                }

	                $cekDataLayananUpdate = $this->m_pengkodean_icd_x->ambilDataLayanan((int)safe_post('id-layanan-pendaftaran-coding-diagnosa'));

	                $hasilValidasi = array();

	                // Perulangan untuk mencari nilai yang sesuai
	                foreach ($cekDataLayananUpdate as $a => $b) {
	                    if ($b->id_kondisi === null) {

	                       	$hasilValidasi[] = $a;

	                    }
	                }

	                if(count($hasilValidasi) === 0){

	                    $x = $this->finish_encounter_put(safe_post('id-layanan-pendaftaran-coding-diagnosa'));

	                }

	            }

			}

		}

		if ($this->db->trans_status() === false) :
			$this->db->trans_rollback();
			$status = false;
			$message = 'Gagal menyimpan pengkodean';
		else :
			$this->db->trans_commit();
			$status = true;
			$message = 'Berhasil menyimpan pengkodean';
		endif;

		$this->response(array('status' => $status, 'message' => $message));
	}

	function setStatusKoding($idPendaftaran)
	{
		$statusKoding = 0;

		$dataLayananPendaftaran = $this->m_pengkodean_icd_x->getLayananPendaftaranByIdPendaftaran($idPendaftaran);				

		$countTarifTindakanPasien = $this->m_pengkodean_icd_x->countDataTarifTindakanPasien($dataLayananPendaftaran[0]->id);

		$countAlreadyCodeTindakan = $this->m_pengkodean_icd_x->countAlreadyCodeTindakan($dataLayananPendaftaran[0]->id);
		
		if ($countTarifTindakanPasien == $countAlreadyCodeTindakan) {
			$statusKoding = 2;
		}else if($countAlreadyCodeTindakan > 0 && $countTarifTindakanPasien != $countAlreadyCodeTindakan) {
			$statusKoding = 1;
		}else {
			$statusKoding = 0;
		}			
		
		$data = array(
			'status_koding' => $statusKoding,			
		);

		$where = array(
			'id' => $idPendaftaran
		);		

		$this->m_pengkodean_icd_x->updateData($where, $data, 'sm_pendaftaran');
	}

	function get_list_anamnesa_get()
	{
		if (!$this->get('page')) :
			$this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
		endif;

		$start  = ($this->get('page') - 1) * $this->limit;
		$search = [
			'id_layanan_pendaftaran'  	=> $this->get('id_layanan_pendaftaran')
		];

		$data            = $this->m_pengkodean_icd_x->getListDataAnamnesa($this->limit, $start, $search);
		$data['page']    = (int) $this->get('page');
		$data['limit']   = $this->limit;

		if ($data) :
			$this->response($data, REST_Controller::HTTP_OK); // (200)
		endif;
	}

	function get_list_pengkodean_diagnosa_history_get()
	{
		if (!$this->get('page')) :
			$this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
		endif;
		
		$start  = ($this->get('page') - 1) * $this->limit;
		$search = [
			'id_diagnosa'  	=> $this->get('id_diagnosa')
		];

		$data            = $this->m_pengkodean_icd_x->getListPengkodeanDiagnosaHistory($this->limit, $start, $search);
		$data['page']    = (int) $this->get('page');
		$data['limit']   = $this->limit;

		if ($data) :
			$this->response($data, REST_Controller::HTTP_OK); // (200)
		endif;
	}

	function get_list_pengkodean_tindakan_history_get()
	{
		if (!$this->get('page')) :
			$this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
		endif;

		$start  = ($this->get('page') - 1) * $this->limit;
		$search = [
			'id_tarif_tindakan_pasien' => $this->get('id_tarif_tindakan_pasien'),
			'spesialisasi'  	       => $this->get('spesialisasi'),
			'id_konsul'  	           => $this->get('id_konsul')
		];

		$data            = $this->m_pengkodean_icd_x->getListPengkodeanTindakanHistory($this->limit, $start, $search);
		$data['page']    = (int) $this->get('page');
		$data['limit']   = $this->limit;

		if ($data) :
			$this->response($data, REST_Controller::HTTP_OK); // (200)
		endif;
	}

	function simpan_jenis_kasus_diagnosa_post()
	{
		$dataUpdateDiagnosa = array(
			'jenis_kasus' => safe_post('jenis_kasus'),			
		);

		$where = array(
			'id' => safe_post('id_diagnosa')
		);

		$this->db->trans_begin();

		$this->m_pengkodean_icd_x->updateData($where, $dataUpdateDiagnosa, 'sm_diagnosa');		

		if ($this->db->trans_status() === false) :
			$this->db->trans_rollback();
			$status = false;
			$message = 'Gagal menyimpan jenis kasus';
		else :
			$this->db->trans_commit();
			$status = true;
			$message = 'Berhasil menyimpan jenis kasus';
		endif;

		$this->response(array('status' => $status, 'message' => $message));
	}

	function save_new_diagnosa_post()
	{		
		$this->db->trans_begin();

		// data diagnosa
        $diagnosa = array(
            'id_diag'                   => $this->post('id_diag'),
            'id_dokter'                 => $this->post('dokter_diag'),
            'id_golongan_sebab_sakit'   => $this->post('id_golongan_sebab_sakit') !== '' ? $this->post('id_golongan_sebab_sakit') : NULL, 
            'kode_diagnosa'             => $this->post('kode_diag') !== '' ? $this->post('kode_diag') : NULL, 
            'diagnosa_manual'           => $this->post('diag_manual') === "on" ? NULL : $this->post('diag_manual'), 
            'golongan_sebab_sakit_lain' => $this->post('gol_sebab_sakit_lain') !== '' ? $this->post('gol_sebab_sakit_lain') : NULL, 
            'diagnosa_klinis'           => $this->post('diag_klinis') === "on" ? NULL : $this->post('diag_klinis'), 
            'prioritas'                 => $this->post('prioritas') !== '' ? $this->post('prioritas') : NULL, 
            'diagnosa_banding'          => $this->post('diag_banding') !== '' ? $this->post('diag_banding') : NULL, 
            'diagnosa_akhir'            => $this->post('diag_akhir') === "on" ? 0 : $this->post('diag_akhir'), 
            'penyebab_kematian'         => $this->post('sebab_kematian') === "on" ? 0 : $this->post('sebab_kematian'), 
        );
        
		$this->load->model('pelayanan/Pelayanan_model', 'm_pelayanan');		
        $this->m_pelayanan->simpanDiagnosaPemeriksaan(safe_post('id_layanan_pendaftaran'), $diagnosa, safe_post('id_pasien'));

		if ($this->db->trans_status() === false) :
			$this->db->trans_rollback();
			$status = false;
			$message = 'Gagal menambahkan diagnosa';
		else :
			$this->db->trans_commit();
			$status = true;
			$message = 'Berhasil menambahkan diagnosa';
		endif;

		$this->response(array('status' => $status, 'message' => $message));
	}

	function simpan_input_nomor_peserta_post()
	{
		$this->db->trans_begin();

		$id_pendaftaran = $this->post('id');
		$id_layanan_pendaftaran = $this->post('id_layanan');

		$data_pendaftaran = array(
			'no_polish'             => $this->post('no_kartu'),
			'no_sep'                => $this->post('no_sep'),
		);

		$this->db->where('id', $id_pendaftaran)->update('sm_pendaftaran', $data_pendaftaran);
		// $this->db->where('id_pendaftaran', $id_pendaftaran)->update('sm_layanan_pendaftaran', ['no_polish' => $this->post('no_kartu')]);

		if ($this->db->trans_status() === false) :
			$this->db->trans_rollback();
			$status = false;
			$message = 'Gagal input nomor peserta BPJS';
		else :
			$this->db->trans_commit();
			$status = true;
			$message = 'Berhasil input nomor peserta BPJS';
		endif;

		$this->response(array('status' => $status, 'message' => $message));
	}
}
