<?php

defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;
use \LZCompressor\LZString as LZString;

/**
 * @package         CodeIgniter
 * @subpackage      Rest Server
 * @category        Controller
 * @author          Faiz Muhammad Syam
 * @license         Syams Corporation
 */
class Pasien extends REST_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->limit = 10;
        $this->load->model('Pasien_model', 'pasien');
        $this->bpjs_config = $this->pasien->getConfigBPJSV2();
        $this->antrean_testing = $this->pasien->getConfigAntrianBPJSTesting();
        date_default_timezone_set('Asia/Jakarta');
        $this->datetime = date("Y-m-d H:i:s");
        $this->timestamp = strval(time());

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

    function get_pasien_get()
    {
        if (!$this->get('id', true)) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
        endif;

        $data['data'] = $this->pasien->getDataPasienById($this->get('id', true));
        $data['page'] = 1;
        $data['limit'] = $this->limit;

        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK); // (200)
        endif;
    }

    //Wa Security
    function get_pasien_wa_lama_get()		
    {		
        if (!$this->get('id', true) && !$this->get('id_wa', true)) :	
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)		
        endif;		
        $data['data'] = $this->pasien->getDataPasienWaLama($this->get('id', true),$this->get('id_wa', true));		
        $data['page'] = 1;		
        $data['limit'] = $this->limit;		
        if ($data) :		
            $this->response($data, REST_Controller::HTTP_OK); // (200)		
        endif;		
    }
      
    //Wa Security
    function get_pasien_wa_baru_get()		
    {		
        if (!$this->get('nik', true) && !$this->get('id_wa', true)) :		
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)		
        endif;		
        $data['data'] = $this->pasien->getDataPasienWaBaru($this->get('nik', true),$this->get('id_wa', true));		
        $data['page'] = 1;		
        $data['limit'] = $this->limit;		
        if ($data) :		
            $this->response($data, REST_Controller::HTTP_OK); // (200)		
        endif;		
    }	
    // Wa Security
    function get_list_pasien_get()	
    {	
        if (!$this->get('page')) :	
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)	
        endif;	
        $start          = ($this->get('page') - 1) * $this->limit;	
        $search         = [	
            'id'            => safe_get('no_rm'),	
            'nik'           => safe_get('nik'),	
            'nama'          => safe_get('nama'),	
            'kelamin'       => safe_get('kelamin'),	
            'tanggal_lahir' => date2mysql(safe_get('tanggal_lahir')),	
            'umur'          => safe_get('umur'),	
            'alamat'        => safe_get('alamat'),	
            'telp'          => safe_get('telp'),	
            'status'        => safe_get('status'),	
            'nik'           => safe_get('nik'),	
            'nobpjs'        => safe_get('nobpjs'),	
        ];	
        $data           = $this->pasien->getListDataPasien($start, $this->limit, $search);	
        $data['page']   = (int) $this->get('page');	
        $data['limit']  = $this->limit;	
        if ($data) :	
            $this->response($data, REST_Controller::HTTP_OK); // (200)	
        endif;	
    }	

    function list_bridging_get()
    {
        if (!$this->get('id', true)) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
        endif;

        $dataPasien = $this->pasien->getDataPasienFinger($this->get('id'));

        $url = null;

        if($dataPasien->no_identitas !== null && $dataPasien->no_identitas !== ''){

            $noIdentitas = $dataPasien->no_identitas;
            $jenisIdentitas = 'nik';

            // aktifkan ketika live

            $url = $this->bpjs_config->server."ref/pasien/fp/identitas/".$jenisIdentitas."/noidentitas/".$noIdentitas;

        } else {

            if($dataPasien->no_polish !== null && $dataPasien->no_polish !== ''){

                $noIdentitas = $dataPasien->no_polish;
                $jenisIdentitas = 'noka';

                // aktifkan ketika live
                $url = $this->bpjs_config->server."ref/pasien/fp/identitas/".$jenisIdentitas."/noidentitas/".$noIdentitas;

            } else {

                $decode = ["metaData" => ["code" => 201, "message" => 'Pasien Tidak Memiliki Nomor Kartu BPJS dan NIK']];

                die(json_encode($decode));

            }

        }

        if($url !== null){

            // aktifkan ketika live
            $header = $this->pasien->createHeader($this->bpjs_config);

            $output = getCurl($url, $header);
            $xdecode = json_decode($output);

            if ($xdecode === NULL) :
                $ydecode = ["metaData" => ["code" => $this->code,"message" => $this->message]];
                die(json_encode($ydecode));
            endif;

            if(isset($xdecode->metadata->code)){

                if(isset($xdecode->response)){

                    if($xdecode->response !== null  && $xdecode->response !== false){

                        // aktifkan ketika live
                        $rdecode = $this->pasien->decryptResponse($xdecode->response);
                        
                    } else {

                        $decode = ["metaData" => ["code" => 201, "message" => $xdecode->metadata->message]];

                        die(json_encode($decode));

                    }

                    if($rdecode->daftarfp === 0){

                        $decode = ["metaData" => ["code" => 201, "message" => 'Pasien Belum Melakukan Finger Print']];

                        die(json_encode($decode));

                    } else if($rdecode->daftarfp === 1){

                        if($dataPasien !== null && $dataPasien !== false){

                            $noRM = $dataPasien->id;

                            $updateDataBridging = ["status_finger" => 1, "tgl_bridging" => $this->datetime];

                            $xIdSurat = $this->db->where('id', $this->get('id'))->update('sm_pasien', $updateDataBridging);

                            if($xIdSurat !== false){

                                $message = 'Data Finger Pasien Berhasil diupdate';

                                $decode = ["metaData" => ["code" => 200, "message" => $message]];

                                $this->response($decode, REST_Controller::HTTP_OK);

                            } else {

                                $message = 'Gagal Update Data Pasien, Silakan Checkin Ulang';

                                $decode = ["metaData" => ["code" => 201, "message" => $message]];

                                die(json_encode($decode));
                            
                            }

                        } else {

                            $message = 'Data Pasien Tersebut Tidak ada, Silakan cek Data Booking Antrian Anda';

                            $decode = ["metaData" => ["code" => 201, "message" => $message]];

                            die(json_encode($decode));
                        
                        }

                    } else {

                        $decode = ["metaData" => ["code" => $this->code, "message" => var_dump($rdecode->daftarfp)]];

                        die(json_encode($decode));

                    }

                } else {

                    $decode = ["metaData" => ["code" => 201, "message" => $xdecode->metadata->message]];

                    die(json_encode($decode));

                }

            } else {

                $decode = ["metaData" => ["code" => $this->code, "message" => $this->message]];

                die(json_encode($decode));

            }
            
        }
    }

    function get_list_kode_daftar_get()
    {
        if (!$this->get('page')) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
        endif;

        $start          = ($this->get('page') - 1) * $this->limit;
        $search         = [
            'id'            => safe_get('kode_wa'),
            'id_pasien'     => safe_get('no_rm'),
            'nik'           => safe_get('nik'),
            'nama'          => safe_get('nama'),
            
        ];

        $data           = $this->pasien->getListKodeDaftar($start, $this->limit, $search);
        $data['page']   = (int) $this->get('page');
        $data['limit']  = $this->limit;

        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK); // (200)
        endif;
    }

    private function _validasi()
    {
        $this->load->library('form_validation');
        $this->config->set_item('language', 'indonesia');

        $this->form_validation->set_rules('nama', 'nama', 'required');
        $this->form_validation->set_rules('kelamin', 'kelamin', 'required|trim');
        $this->form_validation->set_rules('tanggal_lahir', 'tanggal_lahir', 'required');
        $this->form_validation->set_rules('provinsi', 'provinsi', 'required');
        $this->form_validation->set_rules('kabupaten', 'kabupaten', 'required');
        $this->form_validation->set_rules('kecamatan', 'kecamatan', 'required');
        $this->form_validation->set_rules('kelurahan', 'kelurahan', 'required');
        $this->form_validation->set_rules('agama', 'agama', 'required');
        $this->form_validation->set_rules('pendidikan', 'pendidikan', 'required');
        $this->form_validation->set_rules('no_identitas', 'nik', 'required|is_numeric');
        $this->form_validation->set_rules('telp', 'telp', 'required|is_numeric');


        if ($this->form_validation->run()) return TRUE;

        $data                = $error                = array();
        $data['error_class'] = $data['error_string'] = array();
        $data['status']      = TRUE;

        if (form_error('nama')) $error[]          = 'nama';
        if (form_error('kelamin')) $error[]       = 'kelamin';
        if (form_error('tanggal_lahir')) $error[] = 'tanggal_lahir';
        if (form_error('provinsi')) $error[]      = 'provinsi';
        if (form_error('kabupaten')) $error[]     = 'kabupaten';
        if (form_error('kecamatan')) $error[]     = 'kecamatan';
        if (form_error('kelurahan')) $error[]     = 'kelurahan';
        if (form_error('agama')) $error[]         = 'agama';
        if (form_error('pendidikan')) $error[]    = 'pendidikan';
        if (form_error('no_identitas')) $error[]  = 'no_identitas';
        if (form_error('telp')) $error[]          = 'telp';
        

        if ($error) :
            foreach ($error as $row) :
                $data['error_string'][$row] = form_error($row);
            endforeach;

            $data['validasi'] = FALSE;
            $data['token'] = $this->security->get_csrf_hash();
            echo json_encode($data);
            exit();
        endif;
    }

    function update_data_pasien_post()
    {
        $this->_validasi();

        if ($this->get('id')) :
            $data = [
                'id'            => $this->get('id'),
                'status_pasien' => (safe_post('statuspasien') != '') ? safe_post('statuspasien') : NULL,
                'nama'          => safe_post('nama'),
                'kelamin'       => safe_post('kelamin'),
                'tempat_lahir'  => safe_post('tempat_lahir'),
                'tanggal_lahir' => (safe_post('tanggal_lahir') !== null) ? date2mysql(safe_post('tanggal_lahir')) : null,
                'alamat'        => safe_post('alamat'),
                'no_prop'       => safe_post('provinsi'),
                'nama_prop'     => safe_post('nama_provinsi'),
                'no_kab'        => safe_post('kabupaten'),
                'nama_kab'      => safe_post('nama_kabupaten'),
                'no_kec'        => safe_post('kecamatan'),
                'nama_kec'      => safe_post('nama_kecamatan'),
                'no_kel'        => safe_post('kelurahan'),
                'nama_kel'      => safe_post('nama_kelurahan'),
                'agama'         => safe_post('agama'),
                'gol_darah'     => (safe_post('gol_darah') !== null) ? safe_post('gol_darah') : null,
                'id_pendidikan' => (safe_post('pendidikan') !== null) ? safe_post('pendidikan') : null,
                'id_pekerjaan'  => (safe_post('pekerjaan') !== null) ? safe_post('pekerjaan') : null,
                'status_kawin'  => (safe_post('pernikahan') !== null) ? safe_post('pernikahan') : 'Belum Kawin',
                'nama_ayah'     => (safe_post('ayah') !== null) ? safe_post('ayah') : null,
                'nama_ibu'      => (safe_post('ibu') !== null) ? safe_post('ibu') : null,
                'no_identitas'  => (safe_post('no_identitas') !== null) ? safe_post('no_identitas') : null,
                'telp'          => (safe_post('telp') !== null) ? safe_post('telp') : null,
                'status'        => (safe_post('status') !== null) ? safe_post('status') : 'Hidup',
                'no_rt'         => (safe_post('no_rt') !== null) ? safe_post('no_rt') : null,
                'no_rw'         => (safe_post('no_rw') !== null) ? safe_post('no_rw') : null,
                'no_rumah'      => (safe_post('no_rumah') !== null) ? safe_post('no_rumah') : null,
                'kode_pos'      => (safe_post('kode_pos') !== null) ? safe_post('kode_pos') : null,
                'id_etnis'      => (safe_post('etnis') !== null) ? safe_post('etnis') : null,
                'email'         => (safe_post('email') !== null) ? safe_post('email') : null,

            ];

            $id = $this->pasien->updateDataPasien($data, true);

            $no_bpjs = safe_post('no_bpjs') !== '' ? safe_post('no_bpjs') : null;
			if($no_bpjs){
				// get is pasien has penjamin bpjs insert or update
				$this->db->get_where('sm_penjamin_pasien', ['id_pasien' => $id, 'id_penjamin' => 1])->num_rows() > 0
					? $this->db->update('sm_penjamin_pasien', ['no_polish' => $no_bpjs], ['id_pasien' => $id, 'id_penjamin' => 1])
					: $this->db->insert('sm_penjamin_pasien', ['id_pasien' => $id, 'id_penjamin' => 1, 'no_polish' => $no_bpjs ]);
			}
			
			if($no_bpjs){
				$this->db->get_where('sm_antrian_bpjs', ['no_rm' => $id])->num_rows() > 0
					? $this->db->update('sm_antrian_bpjs', ['no_kartu' => $no_bpjs], ['no_rm' => $id])
					: '';
			}
            
			$no_identitas = safe_post('no_identitas') !== '' ? safe_post('no_identitas') : null;
            if($no_identitas){
				$this->db->get_where('sm_antrian_bpjs', ['no_rm' => $id])->num_rows() > 0
					? $this->db->update('sm_antrian_bpjs', ['nik' => $no_identitas], ['no_rm' => $id])
					: '';
			}
			
            $message = [
                'id'     => $id,
                'status' => true,
                'token'  => $this->security->get_csrf_hash()
            ];
            $this->set_response($message, REST_Controller::HTTP_CREATED);
        endif;
    }

    // Penjamin Pasien
    function get_penjamin_pasien_get()
    {
        if (!$this->get('id')) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
        endif;

        $no_rm = $this->get('id');
        $data['pasien'] = $this->db->where('id', $no_rm)->get('sm_pasien')->row();
        $data['penjamin'] = $this->pasien->getDataPenjaminPasien($no_rm);
        $this->response($data, REST_Controller::HTTP_OK);
    }

    private function _validasi_penjamin()
    {
        $this->load->library('form_validation');
        $this->config->set_item('language', 'indonesia');

        $this->form_validation->set_rules('penjamin', 'penjamin', 'required');
        $this->form_validation->set_rules('no_polish', 'no polish', 'required|trim|is_numeric');
       
        if ($this->form_validation->run()) return TRUE;

        $data                = $error                = array();
        $data['error_class'] = $data['error_string'] = array();
        $data['status']      = TRUE;

        if (form_error('penjamin')) $error[]  = 'penjamin';
        if (form_error('no_polish')) $error[] = 'no_polish';

        if ($error) :
            foreach ($error as $row) :
                $data['error_string'][$row] = form_error($row);
            endforeach;

            $data['validasi'] = FALSE;
            $data['token'] = $this->security->get_csrf_hash();
            echo json_encode($data);
            exit();
        endif;
    }

    function simpan_penjamin_pasien_post()
    {
        $this->_validasi_penjamin();
        
        if (!$this->get('id')) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
        endif;

        $no_rm = $this->get('id');
        $data = [
            'id_pasien' => $no_rm,
            'id_penjamin' => safe_post('penjamin'),
            'no_polish' => safe_post('no_polish'),
        ];

        $status = $this->pasien->simpanPenjaminPasien($data);
        $this->response([
            'status' => $status, 
            'token' => $this->security->get_csrf_hash()
        ], REST_Controller::HTTP_OK);
    }

    function hapus_penjamin_pasien_delete()
    {
        if (!$this->get('id')) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
        endif;

        $status = $this->pasien->deletePenjaminPasien($this->get('id'));
        $this->response([
            'status' => $status,
            'token' => $this->security->get_csrf_hash()
        ], REST_Controller::HTTP_OK);
    }

    function get_nopolish_pasien_get()
    {
        if (!$this->get('id') | !$this->get('penjamin')) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
        endif;

        $no_rm    = $this->get('id');
        $penjamin = $this->get('penjamin');
        $no_polish = $this->pasien->getNoPolishPasien($no_rm, $penjamin);
        $this->response([
            'no_polish' => $no_polish,
        ], REST_Controller::HTTP_OK);
    }

    // End Penjamin

    // Merge Pasien
    function proses_merge_pasien_post()
    {
        if (safe_post('pasien_utama') === '') :
            $response = [
                'status_pasien' => false,
                'token' => $this->security->get_csrf_hash(),
                'message' => 'Parameter pasien utama tidak ada'
            ];

            echo json_encode($response); die;
        endif;

        $params = array(
            'pasien_utama' => $this->input->post('pasien_utama', true),
            'pasien_merge' => $this->input->post('pasien_merge', true), // array
        );

        $result = $this->pasien->mergePasien($params);
        $response = [
            'status' => $result['status'],
            'token' => $this->security->get_csrf_hash(),
            'message' => $result['message']
        ];

        $this->response($response, REST_Controller::HTTP_OK);
    }
	
	function get_merge_history_get()	
    {	
        if (!$this->get('id_pasien')) :	
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)	
        endif;	

        $id_pasien = $this->get('id_pasien');        
        $jml_data  = $this->db->where("id = lpad('" . $id_pasien . "'::VARCHAR, 8, '0')")->get('sm_pasien')->num_rows();
		$id_pasien_baru	= null;
		$data['utama']  = null;
        $data['log']    = null;
		
        if($jml_data <=0){
            $id_pasien_baru  = $this->db->where('id_lama', $id_pasien)->get('sm_pasien_merge')->row()->id_baru ?? null;
            $data['message'] = 'Data Tidak Ada';
			if($id_pasien_baru <> null){
				$data['utama']   = $this->pasien->getPasienUtama($id_pasien_baru);
				$data['log']     = $this->pasien->getPasienUtamaLog($id_pasien_baru);
			}            
        } else {
            $data['message'] = 'Data Ada';
            $data['utama']   = $this->pasien->getPasienUtama($id_pasien);
            $data['log']     = $this->pasien->getPasienUtamaLog($id_pasien);
        }       

        // $this->response($data, REST_Controller::HTTP_OK);	

        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK); // (200)
        endif;
    }

    function dataIcare_get()
    {

        if (!$this->get('id')) : 
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)  
        endif;

        $idLayanan = $this->get('id');

        $this->bpjsConfig = $this->pasien->getConfigIcareBPJS();

        $forParamsIcare = $this->pasien->dataParamIcare((int)$idLayanan);

        if(isset($forParamsIcare->no_polish)){

            $penjamin = $forParamsIcare->no_polish;

        } else {

            if(isset($forParamsIcare->no_polish_penjamin)){

                $penjamin = $forParamsIcare->no_polish_penjamin;
            
            } else {

                $decode = ["metaData" => ["code" => 400, "message" => 'Tidak ada Data No Kartu BPJS Pasien']];
                die(json_encode($decode));

            }

        }

        if($this->session->userdata('id_tenaga_medis') !== null && $this->session->userdata('id_tenaga_medis') !== ''){

            $kodeBpjsDokter = $this->pasien->kodeBpjsDokter((int)$this->session->userdata('id_tenaga_medis'));

            $kodeDokter = $kodeBpjsDokter->kode_bpjs;

        } else {

            $decode = ["metaData" => ["code" => 400, "message" => 'Anda Belum memiliki Kode BPJS, Silakan lengkapi Data Anda']];
            die(json_encode($decode));

        }

        $params = array(
            "param"=> $penjamin,
            "kodedokter"=> (int)$kodeDokter
        );

        $url = $this->bpjsConfig->server . "api/rs/validate";
        $header = $this->createHeader($this->bpjsConfig);
        $dataApi = json_encode($params);
        $output = postCurl($url, $dataApi, $header);
        $decode = json_decode($output);

        $transResponse = $this->decryptResponse($decode->response);

        if(isset($transResponse->url)){
            $urlGetContent = $transResponse->url;
            $decode = ["metaData" => ["code" => 201, "message" => $urlGetContent]];

        } else {

            if(isset($decode->metaData->message)){

                $decode = ["metaData" => ["code" => 400, "message" => $decode->metaData->message]];

            } else {

                $decode = ["metaData" => ["code" => 400, "message" => 'Tidak ada Data Icare']];
                
            }

        }
        

        $this->response($decode, REST_Controller::HTTP_OK);
    
    }

    function getSignatureBPJS($config)
    {
        $cid = $config->cons_id;
        $skey = $config->secret_key;

        // get timestamp
        // date_default_timezone_set("Asia/Jakarta");
        // $timestamp = strtotime(date("Y/m/d H:i:s"));

        date_default_timezone_set("UTC");
        $timestamp = $this->timestamp;

        // set data value
        $data = $cid."&".$timestamp;

        // generate signature
        $signature = hash_hmac('sha256', $data, $skey, true);
        $encodedSignature = base64_encode($signature);

        // urlencode...
        // $encodedSignature = urlencode($encodedSignature);
        $data = array(
            'timestamp' => $timestamp,
            'signature' => $encodedSignature
        );

        return (Object)$data;
         //return strtotime(date("Y-m-d H:i:s")) * 1000;
    }

    function createHeader($bpjs_config)
    {
        $sign = $this->getSignatureBPJS($bpjs_config);
        return array (
            'X-cons-id:' . $bpjs_config->cons_id,
            'X-timestamp:' . $sign->timestamp,
            'X-signature:' . $sign->signature,
            'user_key:' . $bpjs_config->user_key,
            'Content-type: application/json'
        );
    }

    function decryptResponse($string)
    {   
        $key = $this->bpjs_config->cons_id.$this->bpjs_config->secret_key.$this->timestamp;
        
        $encryptMethod = 'AES-256-CBC';
        // hash
        $keyHash = hex2bin(hash('sha256', $key));
        // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
        $iv = substr(hex2bin(hash('sha256', $key)), 0, 16);
        $output = openssl_decrypt(base64_decode($string), $encryptMethod, $keyHash, OPENSSL_RAW_DATA, $iv);
        $output = LZString::decompressFromEncodedURIComponent($output);
        $output = json_decode($output);
        return $output;
    }

	function add_data_pasien_post()
    {
        $data_pasien = [
            'tanggal_daftar' => $this->datetime,
            'no_identitas'   => safe_post('no_identitas_add'),
            'nama'           => strtoupper(trim(safe_post('nama_add'))),
            'kelamin'        => safe_post('kelamin_add'),
            'tanggal_lahir'  => (safe_post('tanggal_lahir_add') !== null) ? date2mysql(safe_post('tanggal_lahir_add')) : null,
            'id_pendidikan'  => (safe_post('pendidikan_add') !== '') ? safe_post('pendidikan_add') : NULL,
            'agama'          => (safe_post('agama_add') !== '') ? safe_post('agama_add') : 'Lain-lain',
            'disabilitas'    => 0,
        ];
        $this->load->model('pasien/Pasien_model', 'pasien');
        $no_rm = $this->pasien->addDataPasien($data_pasien);

        $message = [
            'id'     => $no_rm,
            'status' => true,
            'token'  => $this->security->get_csrf_hash()
        ];
        $this->set_response($message, REST_Controller::HTTP_CREATED);
    }
	
	function get_list_pasien_add_get()	
    {	
        $search = [	
            'nama'=> safe_get('nama'),	
            'ktp' => safe_get('ktp'),	
        ];	
        $data  = $this->pasien->getListDataPasienAdd($search);	
        if ($data) :	
            $this->response($data, REST_Controller::HTTP_OK); // (200)	
        endif;	
    }	

    function kycPasien_get()
    {

        $path = APPPATH . 'libraries/kyc/satusehat.ini';
        if (!file_exists($path)) {
            show_error('satusehat.ini tidak ditemukan.');
        }

        $init = parse_ini_file($path);

        require_once(APPPATH . 'libraries/kyc/auth.php');
        require_once(APPPATH . 'libraries/kyc/function.php');

        $agent_name = $this->session->userdata('nama');
        $agent_nik = $this->session->userdata('nik');

        $auth_result = authenticateWithOAuth2($init['client_id'], $init['client_secret'], $init['auth_url']);
        $json = generateUrl($agent_name, $agent_nik, $auth_result, $init['api_url']);
        $validation_web = json_decode($json, TRUE);

        $data['url'] = $validation_web['data']['url'] ?? '';

        $this->response($data['url'], REST_Controller::HTTP_OK);

    }

}
