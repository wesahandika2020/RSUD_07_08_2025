<?php

defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class Protokol_terapi extends REST_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->limit = 10;
        $this->load->model('Protokol_terapi_model', 'protokol_terapi');

        $id_translucent = $this->session->userdata('id_translucent');
        if (empty($id_translucent)) :
            $this->response(array('error' => 'Anda belum login'), REST_Controller::HTTP_UNAUTHORIZED);
            exit();
        endif;
    }

     
    function get_pendaftaran_get()
    {        

        if (!$this->get('page')) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
        endif; 

        $this->load->model('pendaftaran/Pendaftaran_model', 'm_pendaftaran');
        
        
                $data = $this->m_pendaftaran->getPendaftaranDetail($this->get('id', true), $this->get('id_layanan', true));
                $data['dokter']         = $this->m_pelayanan->getDiagnosaPemeriksaan($data['layanan']->id);
                $data['tindakan']       = $this->m_pelayanan->getTindakanPemeriksaan($data['layanan']->id); 
                $data['terapi']         = $this->protokol_terapi->getTerapiProtokol($data['layanan']->id);
                
                $getIDKunjung = $this->db->select("srm.id_kunjungan")
                                                ->from('sm_layanan_pendaftaran as slp')
                                                ->join('sm_rehab_medik as srm', 'slp.id = srm.id_layanan_pendaftaran', 'left')
                                                ->join('sm_rehab_medik_kunjungan as srmk', 'srm.id_kunjungan = srmk.id', 'left')
                                                ->where('srm.id_layanan_pendaftaran', $data['layanan']->id, true)
                                                ->order_by('srmk.id', 'desc')
                                                ->get()
                                                ->row();
                                    

                if($getIDKunjung !== null){

                    $getID = $getIDKunjung->id_kunjungan;

                    $getIDPendaftaran = $this->db->select("srmk.id_layanan_pendaftaran as id_daftar")
                                        ->from('sm_rehab_medik_kunjungan as srmk')
                                        ->where('srmk.id', $getID, true)
                                        ->order_by('srmk.id', 'desc')
                                        ->get()
                                        ->row();

                    $data['kunjungan']      = $this->protokol_terapi->getTerapiKunjungan($getID);     
                    $getPendaftaran = $getIDPendaftaran->id_daftar;
                    $data['diagnosa'] = $this->protokol_terapi->getDiagnosa($getPendaftaran);
                    
                } else {

                    $data['diagnosa'] = $this->protokol_terapi->getDiagnosa($data['layanan']->id);

                    $iddft = $data['layanan']->id;
                    $getIDKunjungan = $this->db->select("srmk.id")
                                        ->from('sm_rehab_medik_kunjungan as srmk')
                                        ->where('srmk.id_layanan_pendaftaran', $iddft, true)
                                        ->order_by('srmk.id', 'desc')
                                        ->get()
                                        ->row();

                    
                    
                    if($getIDKunjungan){

                        $getIDKJG = $getIDKunjungan->id;

                        $data['kunjungan']      = $this->protokol_terapi->getTerapiKunjungan($getIDKJG);

                    } else {

                        $getIDPasien = $data['pasien']->no_rm;

                        $getIDPK = $this->db->select("srmk.id")
                                        ->from('sm_rehab_medik_kunjungan as srmk')
                                        ->where('srmk.id_pasien', $getIDPasien, true)
                                        ->where('srmk.status', null)
                                        ->order_by('srmk.id', 'desc')
                                        ->get()
                                        ->row();

                        
                        
                        if($getIDPK){

                            $IDPK = $getIDPK->id;

                        $data['kunjungan']      = $this->protokol_terapi->getTerapiKunjungan($IDPK);

                        } else {

                            $data['kunjungan'] = 0;

                        }




                    }


                }


        

       if ($data) :
            $this->response($data, REST_Controller::HTTP_OK); // (200)
        endif;
    
    }

    function simpan_form_stop_terapi_put() 
    {
     
        $this->db->trans_begin();

        $idk = $this->put('id_kunjungan', true);

        $total_idk =  $this->db->select("srmk.total_kunjungan as total, srmk.id_pasien")->from("sm_rehab_medik_kunjungan as srmk")->where("srmk.id", $idk, true)->get()->row();

        $get_rm = $total_idk->id_pasien;

        $get_total_idk = $total_idk->total;

        $data_total_status = $this->db->select("sum(srms.stop_terapi) as total")->from("sm_rehab_medik_status as srms")->where("srms.id_kunjungan", $idk, true)->get()->row();
        
        $total_status = $data_total_status->total;

        $data_banding_ttp = $this->db->query("select count(ttp.id) as count_ttp
                from sm_tarif_tindakan_pasien as ttp 
                left join sm_layanan_pendaftaran as lp on lp.id = ttp.id_layanan_pendaftaran
                left join sm_pendaftaran as sp on sp.id = lp.id_pendaftaran
                left join sm_rehab_medik_status as srms on ttp.id = srms.id_tindakan
                where lp.id_unit_layanan = 34 and sp.id_pasien = '".$get_rm."'
                and srms.id_tindakan is null")->result();

        foreach ($data_banding_ttp as $key) {
            $get_id = $key->count_ttp;

            if($get_id > 0){

                $dapet_status = 2;
            } else {

                $dapet_status = 1;
            }
        }

        if($dapet_status === 2){

            $message_status = 2;

        } else {
            

            if($total_status <= $get_total_idk){

                $waktu = $this->datetime;
                $status = 1;
                $user = $this->put('user', true);

                $update = ['tanggal_stop' => $waktu, 'user_stop' => $user, 'status' => $status];

                $this->db->where('id', $idk)->update('sm_rehab_medik_kunjungan', $update);


                $status_srms = 1;
        
                $update = ['status' => $status_srms];

                $this->db->where('id_kunjungan', $idk)->update('sm_rehab_medik_status', $update);

                $message_status = 1;

                

            } else { 

                $message_status = 0;
            }

        }

        $get_message_status = $message_status;

         if ($this->db->trans_status() === false) :
                                $this->db->trans_rollback();
                                $status = false;
                                $message = 'Status Terapi Gagal disimpan';
                            else :
                                $this->db->trans_commit();
                                $status = true;
                                $message = $get_message_status;
                            endif;
    
        $this->response(array('status' => $status, 'message' => $message, 'token'  => $this->security->get_csrf_hash()), REST_Controller::HTTP_OK);
    }


    function simpan_ubah_status_terapi_put() 
    {
     
        $this->db->trans_begin();

        $idk = $this->put('id_kunjungan', true);
        $user = $this->put('user', true);


        $waktu = $this->datetime;
        $status = null;
        $user = $this->put('user', true);

        $update = ['tanggal_stop' => $waktu, 'user_stop' => $user, 'status' => $status];

        $this->db->where('id', $idk)->update('sm_rehab_medik_kunjungan', $update);


        $status_srms = null;

        $update = ['status' => $status_srms];

        $this->db->where('id_kunjungan', $idk)->update('sm_rehab_medik_status', $update);

        if ($this->db->trans_status() === false) :
            $this->db->trans_rollback();
            $status = false;
        else :
            $this->db->trans_commit();
            $status = true;
        endif;

        $message = array(
            'status' => $status, 
            'token'  => $this->security->get_csrf_hash(),
        );

        $this->response($message, REST_Controller::HTTP_OK); 
    }

    function edit_total_program_put() 
    {
     
        $this->db->trans_begin();

        $idk = $this->put('rhm_id_kunjungan', true);
        $total_edit_terapi = $this->put('total_edit_terapi', true);

        $total_idk =  $this->db->select("srmk.id_pasien")->from("sm_rehab_medik_kunjungan as srmk")->where("srmk.id", $idk, true)->get()->row();

        $get_rm = $total_idk->id_pasien;

        $data_total_status = $this->db->select("sum(srms.stop_terapi) as total")->from("sm_rehab_medik_status as srms")->where("srms.id_kunjungan", $idk, true)->get()->row();
        
        $total_status = $data_total_status->total;

        $data_banding_ttp = $this->db->query("select count(ttp.id) as count_ttp
                from sm_tarif_tindakan_pasien as ttp 
                left join sm_layanan_pendaftaran as lp on lp.id = ttp.id_layanan_pendaftaran
                left join sm_pendaftaran as sp on sp.id = lp.id_pendaftaran
                left join sm_rehab_medik_status as srms on ttp.id = srms.id_tindakan
                where lp.id_unit_layanan = 34 and sp.id_pasien = '".$get_rm."'
                and srms.id_tindakan is null")->result();

        foreach ($data_banding_ttp as $key) {
            $get_id = $key->count_ttp;

            if($get_id > 1){

                $dapet_status = 2;
            } else {

                $dapet_status = 1;
            }
        }

        if($dapet_status === 2){

            $message_status = 2;

        } else {
        

            if($total_status < $total_edit_terapi){

                $update = ['total_kunjungan' => $total_edit_terapi];

                $this->db->where('id', $idk)->update('sm_rehab_medik_kunjungan', $update);

                $message_status = 1;

                

            } else { 

                $message_status = 0;
            }

        }
       
        $get_message_status = $message_status;

         if ($this->db->trans_status() === false) :
                                $this->db->trans_rollback();
                                $status = false;
                                $message = 'Status Terapi Gagal disimpan';
                            else :
                                $this->db->trans_commit();
                                $status = true;
                                $message = $get_message_status;
                            endif;
    
        $this->response(array('status' => $status, 'message' => $message, 'token'  => $this->security->get_csrf_hash()), REST_Controller::HTTP_OK); 
    }


    function get_riwayat_kunjungan_get(){

        if (!$this->get('id', true)) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
        endif;

        $no_rm = $this->get('id', true);
        $data['pasien'] = $this->protokol_terapi->getDataPasienById($no_rm);
        $kunjungan = $this->protokol_terapi->getListDataKunjungan($no_rm);
        foreach ($kunjungan as $row) :
            $row->tanggal_kunjungan = indo_tgl($row->tanggal_kunjungan);
        endforeach;

        $data['kunjungan'] = $kunjungan;

        $first_kunjungan = $this->protokol_terapi->getFirstDataKunjungan($no_rm);
        if($first_kunjungan !== null){

            $get_id_kunjungan = $first_kunjungan->id;
            $data['data_kunjungan'] = $get_id_kunjungan;

        } else {

            $data['data_kunjungan'] = null;
        }

        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK); // (200)
        endif;

    }

    function get_riwayat_kunjungan_pasien_get()
    {
        if (!$this->get('id', true)) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
        endif;
        $id_kunjungan = $this->get('id', true);
        $data = $this->protokol_terapi->getDataKunjungan($id_kunjungan);
        $data->layanan = $this->protokol_terapi->getLayananKunjungan($data->id);
        $this->response($data, REST_Controller::HTTP_OK);
    }

    function simpan_data_rehab_post() 
    {
        $this->db->trans_begin();
        $layanan = array('id' => safe_post('id_layanan_pendaftaran'), 'idk' => safe_post('id_kunjungan'), 'id_pasien' => safe_post('id_pasien'));
        $idk = safe_post('id_kunjungan');
        $idp = $layanan['id_pasien'];
        $checkDataRehabMedik = $this->db->query("select * from sm_rehab_medik where id_layanan_pendaftaran = '".safe_post('id_layanan_pendaftaran')."'")->row();
        $data_rehab = array(
            'id_layanan_pendaftaran'            => $layanan['id'],
            'tanggal'                           => $this->datetime,
            'catatan'                           => safe_post('catatan_terapi') !== '' ? safe_post('catatan_terapi') : NULL,
            'catatan_dokter'                    => safe_post('catatan_dokter_terapi') !== '' ? safe_post('catatan_dokter_terapi') : NULL,
            'id_operator'                       => safe_post('id_operator') !== '' ? safe_post('id_operator') : NULL,
            'user'                              => safe_post('user') !== '' ? safe_post('user') : NULL,
            'id_pasien'                         => safe_post('id_pasien') !== '' ? safe_post('id_pasien') : NULL,
        );
        if(!empty($idk)){
            $checkDataKunjungan = $this->db->query("select * from sm_rehab_medik_kunjungan where id = '".$idk."' and id_pasien = '".$idp."' and status is null")->row(); 
            if($checkDataKunjungan !== null && $checkDataRehabMedik !== null){
                $getIdOperatorMedik = $checkDataRehabMedik->id_operator;
                $getIDRehab = $checkDataRehabMedik->id;
                if($getIdOperatorMedik === null){
                    $id_op = safe_post('id_operator');
                    $catatan = safe_post('catatan_terapi');
                    $catatan_dokter = safe_post('catatan_dokter_terapi');
                    $user_update = safe_post('user');
                    $update = ['id_operator' => $id_op, 'catatan' => $catatan, 'catatan_dokter' => $catatan_dokter, 'update_user' => $user_update];
                    $this->db->where('id', $getIDRehab)->update('sm_rehab_medik', $update);
                } else {
                        $dataKunjunganPasien = array(
                            'id_layanan_pendaftaran'    => safe_post('id_layanan_pendaftaran'),
                            'tanggal'                   => $this->datetime,
                            'catatan'                   => safe_post('catatan_terapi') !== '' ? safe_post('catatan_terapi') : NULL,
                            'catatan_dokter'            => safe_post('catatan_dokter_terapi') !== '' ? safe_post('catatan_dokter_terapi') : NULL,
                            'id_operator'               => safe_post('id_operator') !== '' ? safe_post('id_operator') : NULL,
                            'update_user'               => safe_post('user') !== '' ? safe_post('user') : NULL,
                            'id_kunjungan'              => $idk,
                        );
                        $this->db->where('id_layanan_pendaftaran', safe_post('id_layanan_pendaftaran'), true)->update('sm_rehab_medik', $dataKunjunganPasien); 
                }
            } else if($checkDataKunjungan !== null && $checkDataRehabMedik === null){
                $response = $this->protokol_terapi->simpan_rehab($data_rehab);
                $checkIdRehab = $this->db->query("select id from sm_rehab_medik where id_layanan_pendaftaran = '".safe_post('id_layanan_pendaftaran')."'")->row();
                $idRehab = $checkIdRehab->id;
                $update = ['id_kunjungan' => $idk];
                $this->db->where('id', $idRehab)->update('sm_rehab_medik', $update);
            } 
        } else {
            $response = $this->protokol_terapi->simpan_rehab($data_rehab);

                $data_kunjungan = array(

                    'tanggal'                           => $this->datetime,
                    'total_kunjungan'                   => safe_post('program_terapi') !== '' ? safe_post('program_terapi') : NULL,
                    'user'                              => safe_post('user') !== '' ? safe_post('user') : NULL,
                    'id_pasien'                         => safe_post('id_pasien') !== '' ? safe_post('id_pasien') : NULL,
                    'id_layanan_pendaftaran'            => $layanan['id'],
                );

                $response = $this->protokol_terapi->simpan_kunjungan($data_kunjungan); 

                $checkIdKunjungan = '';

                $checkIdKunjungan = $this->db->query("select id from sm_rehab_medik_kunjungan where id_layanan_pendaftaran = '".safe_post('id_layanan_pendaftaran')."'")->row();

                

                $getIdKunjungan = $checkIdKunjungan->id;

                $checkIdRehab = $this->db->query("select id from sm_rehab_medik where id_layanan_pendaftaran = '".safe_post('id_layanan_pendaftaran')."'")->row();

                $idRehab = $checkIdRehab->id;

                $update = ['id_kunjungan' => $getIdKunjungan];

                $this->db->where('id', $idRehab)->update('sm_rehab_medik', $update);

        } 


        if ($this->db->trans_status() === false) :
            $this->db->trans_rollback();
            $status = false;
        else :
            $this->db->trans_commit();
            $status = true;
        endif;

        $message = array(
            'status' => $status, 
            'token'  => $this->security->get_csrf_hash(),
            'id'     => $layanan['id'],
        );

        $this->response($message, REST_Controller::HTTP_OK); 

    }

    function get_rehab_medik_get()
	{
		$data = [];
		$data['dataAwal'] = $this->protokol_terapi->dataAwalRehabMedik($this->get('noReM'));
		$data['dataProgram'] = $this->protokol_terapi->getJadwalProgram($this->get('id_pendaftaran'), $this->get('noReM'));
        // var_dump($data['dataAwal']);die;

		if ($data != null) {
			$this->response($data, REST_Controller::HTTP_OK);
		} else {
			$this->response($data, REST_Controller::HTTP_OK);
		}
	}

    function get_diagnosis_rehab_medik_get()
	{
		$data = [];
		$data['dataDiagnosa'] = $this->protokol_terapi->getDiagnosaSekunder($this->get('id_pendaftaran'));
        $data['dataMedik'] = $this->protokol_terapi->getDataMedik($this->get('id_pendaftaran'));
        // var_dump($data['dataProgram']);die;

		if ($data != null) {
			$this->response($data, REST_Controller::HTTP_OK);
		} else {
			$this->response($data, REST_Controller::HTTP_OK);
		}
	}

    function get_history_rehab_medik_get()
	{
		$data = [];
        // var_dump($this->get('id_pendaftaran'));die;
		$data = $this->protokol_terapi->getHistoryRehabMedik($this->get('noReM'));
        // var_dump($data);die;
		if ($data != null) {
			$this->response($data, REST_Controller::HTTP_OK);
		} else {
			$this->response($data, REST_Controller::HTTP_OK);
		}
	}

    function get_detail_history_rehab_medik_get()
	{
		$data = [];
        // var_dump($this->get('id_pendaftaran'));die;
		$data = $this->protokol_terapi->getDetailHistoryRehabMedik($this->get('id_rmf_log'));
        // var_dump($data);die;
		if ($data != null) {
			$this->response($data, REST_Controller::HTTP_OK);
		} else {
			$this->response($data, REST_Controller::HTTP_OK);
		}
	}

    function simpan_rehab_medik_form_post()
	{   
        // var_dump(safe_post('id_rmf'));die;
        $checkData = safe_post('id_rmf');

        $rmf_tanggal_pelayanan = safe_post('rmf_tanggal_pelayanan');
        $rmf_tanggal_pelayanan = str_replace('/', '-', $rmf_tanggal_pelayanan);
        $rmf_tanggal_pelayanan = date('Y-m-d H:i', strtotime($rmf_tanggal_pelayanan));

        $rmf_tanggal_program_0 = safe_post('rmf_tanggal_program_0');
        if ($rmf_tanggal_program_0 !== '') {
            $rmf_tanggal_program_0 = str_replace('/', '-', $rmf_tanggal_program_0);
            $rmf_tanggal_program_0 = date('Y-m-d H:i', strtotime($rmf_tanggal_program_0));
        }

        $rmf_tanggal_program_1 = safe_post('rmf_tanggal_program_1');
        if ($rmf_tanggal_program_1 !== '') {
            $rmf_tanggal_program_1 = str_replace('/', '-', $rmf_tanggal_program_1);
            $rmf_tanggal_program_1 = date('Y-m-d H:i', strtotime($rmf_tanggal_program_1));
        }

        $rmf_tanggal_program_2 = safe_post('rmf_tanggal_program_2');
        if ($rmf_tanggal_program_2 !== '') {
            $rmf_tanggal_program_2 = str_replace('/', '-', $rmf_tanggal_program_2);
            $rmf_tanggal_program_2 = date('Y-m-d H:i', strtotime($rmf_tanggal_program_2));
        }

        $rmf_tanggal_program_3 = safe_post('rmf_tanggal_program_3');
        if ($rmf_tanggal_program_3 !== '') {
            $rmf_tanggal_program_3 = str_replace('/', '-', $rmf_tanggal_program_3);
            $rmf_tanggal_program_3 = date('Y-m-d H:i', strtotime($rmf_tanggal_program_3));
        }

        $rmf_tanggal_program_4 = safe_post('rmf_tanggal_program_4');
        if ($rmf_tanggal_program_4 !== '') {
            $rmf_tanggal_program_4 = str_replace('/', '-', $rmf_tanggal_program_4);
            $rmf_tanggal_program_4 = date('Y-m-d H:i', strtotime($rmf_tanggal_program_4));
        }

        $rmf_tanggal_program_5 = safe_post('rmf_tanggal_program_5');
        if ($rmf_tanggal_program_5 !== '') {
            $rmf_tanggal_program_5 = str_replace('/', '-', $rmf_tanggal_program_5);
            $rmf_tanggal_program_5 = date('Y-m-d H:i', strtotime($rmf_tanggal_program_5));
        }

        $rmf_tanggal_program_6 = safe_post('rmf_tanggal_program_6');
        if ($rmf_tanggal_program_6 !== '') {
            $rmf_tanggal_program_6 = str_replace('/', '-', $rmf_tanggal_program_6);
            $rmf_tanggal_program_6 = date('Y-m-d H:i', strtotime($rmf_tanggal_program_6));
        }

        $rmf_tanggal_program_7 = safe_post('rmf_tanggal_program_7');
        if ($rmf_tanggal_program_7 !== '') {
            $rmf_tanggal_program_7 = str_replace('/', '-', $rmf_tanggal_program_7);
            $rmf_tanggal_program_7 = date('Y-m-d H:i', strtotime($rmf_tanggal_program_7));
        }

        $rmf_tanggal_program_8 = safe_post('rmf_tanggal_program_8');
        if ($rmf_tanggal_program_8 !== '') {
            $rmf_tanggal_program_8 = str_replace('/', '-', $rmf_tanggal_program_8);
            $rmf_tanggal_program_8 = date('Y-m-d H:i', strtotime($rmf_tanggal_program_8));
        }

        $rmf_tanggal_program_9 = safe_post('rmf_tanggal_program_9');
        if ($rmf_tanggal_program_9 !== '') {
            $rmf_tanggal_program_9 = str_replace('/', '-', $rmf_tanggal_program_9);
            $rmf_tanggal_program_9 = date('Y-m-d H:i', strtotime($rmf_tanggal_program_9));
        }

        $id_pendaftaran_awal = safe_post('id_pendaftaran_awal');
        $id_pendaftaran = safe_post('id_pendaftaran');
        if( $id_pendaftaran !== $id_pendaftaran_awal ){
            $id_pendaftaran_simpan = $id_pendaftaran_awal;
        } else {
            $id_pendaftaran_simpan = $id_pendaftaran;
        }
        // var_dump($id_pendaftaran_simpan);die;


		$this->db->trans_begin();
		if ($checkData != null || $checkData != '') {
            $data = array(
                'id_pendaftaran'                    => $id_pendaftaran_simpan,
                'id_layanan_pendaftaran'            => safe_post('id_layanan_pendaftaran'),
				'id_pasien'                         => safe_post('id_pasien'),
                'id_users'              	        => safe_post('id_users') !== '' ? safe_post('id_users') : NULL,

                // Pemeriksaan Fisik dan Uji Fungsi
                'rmf_tanggal_pelayanan'             => $rmf_tanggal_pelayanan !== '' ? $rmf_tanggal_pelayanan : NULL,
                'rmf_anamnesa'                      => safe_post('rmf_anamnesa') !== '' ? safe_post('rmf_anamnesa'): NULL,
                'rmf_keadaan_umum'                  => safe_post('rmf_keadaan_umum') !== '' ? safe_post('rmf_keadaan_umum'): NULL,
                'rmf_gcs'                           => safe_post('rmf_gcs') !== '' ? safe_post('rmf_gcs'): NULL,
                'rmf_kesadaran'                     => safe_post('rmf_kesadaran') !== '' ? safe_post('rmf_kesadaran'): NULL,
                'rmf_alergi'                        => safe_post('rmf_alergi') !== '' ? safe_post('rmf_alergi'): NULL,
                'rmf_tensi_sistolik'                => safe_post('rmf_tensi_sistolik') !== '' ? safe_post('rmf_tensi_sistolik'): NULL,
                'rmf_tensi_diastolik'               => safe_post('rmf_tensi_diastolik') !== '' ? safe_post('rmf_tensi_diastolik'): NULL,
                'rmf_suhu'                          => safe_post('rmf_suhu') !== '' ? safe_post('rmf_suhu'): NULL,
                'rmf_nadi'                          => safe_post('rmf_nadi') !== '' ? safe_post('rmf_nadi'): NULL,
                'rmf_rr'                            => safe_post('rmf_rr') !== '' ? safe_post('rmf_rr'): NULL,
                'rmf_tinggi_badan'                  => safe_post('rmf_tinggi_badan') !== '' ? safe_post('rmf_tinggi_badan'): NULL,
                'rmf_berat_badan'                   => safe_post('rmf_berat_badan') !== '' ? safe_post('rmf_berat_badan'): NULL,
                'rmf_kepala'                        => safe_post('rmf_kepala') !== '' ? safe_post('rmf_kepala'): NULL,
                'rmf_leher'                         => safe_post('rmf_leher') !== '' ? safe_post('rmf_leher'): NULL,
                'rmf_thorax'                        => safe_post('rmf_thorax') !== '' ? safe_post('rmf_thorax'): NULL,
                'rmf_pulmo'                         => safe_post('rmf_pulmo') !== '' ? safe_post('rmf_pulmo'): NULL,
                'rmf_cor'                           => safe_post('rmf_cor') !== '' ? safe_post('rmf_cor'): NULL,
                'rmf_abdomen'                       => safe_post('rmf_abdomen') !== '' ? safe_post('rmf_abdomen'): NULL,
                'rmf_genitalia'                     => safe_post('rmf_genitalia') !== '' ? safe_post('rmf_genitalia'): NULL,
                'rmf_ekstrimitas'                   => safe_post('rmf_ekstrimitas') !== '' ? safe_post('rmf_ekstrimitas'): NULL,
                'rmf_prognosis'                     => safe_post('rmf_prognosis') !== '' ? safe_post('rmf_prognosis'): NULL,
                'rmf_status_mentalis'               => safe_post('rmf_status_mentalis') !== '' ? safe_post('rmf_status_mentalis'): NULL,
                'rmf_lingkar_kepala'                => safe_post('rmf_lingkar_kepala') !== '' ? safe_post('rmf_lingkar_kepala'): NULL,
                'rmf_status_gizi'                   => safe_post('rmf_status_gizi') !== '' ? safe_post('rmf_status_gizi'): NULL,
                'rmf_telinga'                       => safe_post('rmf_telinga') !== '' ? safe_post('rmf_telinga'): NULL,
                'rmf_hidung'                        => safe_post('rmf_hidung') !== '' ? safe_post('rmf_hidung'): NULL,
                'rmf_tenggorok'                     => safe_post('rmf_tenggorok') !== '' ? safe_post('rmf_tenggorok'): NULL,
                'rmf_mata'                          => safe_post('rmf_mata') !== '' ? safe_post('rmf_mata'): NULL,
                'rmf_kulit_kelamin'                 => safe_post('rmf_kulit_kelamin') !== '' ? safe_post('rmf_kulit_kelamin'): NULL,

                'rmf_diagnosa'                      => safe_post('rmf_diagnosa_[]') !== '' ? json_encode(safe_post('rmf_diagnosa_[]')) : NULL,

				'rmf_diagnosis_fungsi'              => safe_post('rmf_diagnosis_fungsi') !== '' ? safe_post('rmf_diagnosis_fungsi') : NULL,
				'rmf_pemeriksaan_penunjang'         => safe_post('rmf_pemeriksaan_penunjang') !== '' ? safe_post('rmf_pemeriksaan_penunjang') : NULL,
				'rmf_tata_laksana'                  => safe_post('rmf_tata_laksana') !== '' ? safe_post('rmf_tata_laksana') : NULL,
				'rmf_rekomendasi_asessmen'          => safe_post('rmf_rekomendasi_asessmen') !== '' ? safe_post('rmf_rekomendasi_asessmen') : NULL,
				'rmf_evaluasi'                      => safe_post('rmf_evaluasi') !== '' ? safe_post('rmf_evaluasi') : NULL,
				'rmf_suspek_penyakit'               => safe_post('rmf_suspek_penyakit') !== '' ? safe_post('rmf_suspek_penyakit') : NULL,

                // program terapi
				'rmf_permintaan_terapi'             => safe_post('rmf_permintaan_terapi') !== '' ? safe_post('rmf_permintaan_terapi') : NULL,
                'rmf_program_0'                     => safe_post('rmf_program_0') !== '' ? safe_post('rmf_program_0') : NULL,
                'rmf_program_1'                     => safe_post('rmf_program_1') !== '' ? safe_post('rmf_program_1') : NULL,
                'rmf_program_2'                     => safe_post('rmf_program_2') !== '' ? safe_post('rmf_program_2') : NULL,
                'rmf_program_3'                     => safe_post('rmf_program_3') !== '' ? safe_post('rmf_program_3') : NULL,
                'rmf_program_4'                     => safe_post('rmf_program_4') !== '' ? safe_post('rmf_program_4') : NULL,
                'rmf_program_5'                     => safe_post('rmf_program_5') !== '' ? safe_post('rmf_program_5') : NULL,
                'rmf_program_6'                     => safe_post('rmf_program_6') !== '' ? safe_post('rmf_program_6') : NULL,
                'rmf_program_7'                     => safe_post('rmf_program_7') !== '' ? safe_post('rmf_program_7') : NULL,
                'rmf_program_8'                     => safe_post('rmf_program_8') !== '' ? safe_post('rmf_program_8') : NULL,
                'rmf_program_9'                     => safe_post('rmf_program_9') !== '' ? safe_post('rmf_program_9') : NULL,

                'rmf_tanggal_program_0'             => $rmf_tanggal_program_0 !== '' ? $rmf_tanggal_program_0 : NULL,
                'rmf_tanggal_program_1'             => $rmf_tanggal_program_1 !== '' ? $rmf_tanggal_program_1 : NULL,
                'rmf_tanggal_program_2'             => $rmf_tanggal_program_2 !== '' ? $rmf_tanggal_program_2 : NULL,
                'rmf_tanggal_program_3'             => $rmf_tanggal_program_3 !== '' ? $rmf_tanggal_program_3 : NULL,
                'rmf_tanggal_program_4'             => $rmf_tanggal_program_4 !== '' ? $rmf_tanggal_program_4 : NULL,
                'rmf_tanggal_program_5'             => $rmf_tanggal_program_5 !== '' ? $rmf_tanggal_program_5 : NULL,
                'rmf_tanggal_program_6'             => $rmf_tanggal_program_6 !== '' ? $rmf_tanggal_program_6 : NULL,
                'rmf_tanggal_program_7'             => $rmf_tanggal_program_7 !== '' ? $rmf_tanggal_program_7 : NULL,
                'rmf_tanggal_program_8'             => $rmf_tanggal_program_8 !== '' ? $rmf_tanggal_program_8 : NULL,
                'rmf_tanggal_program_9'             => $rmf_tanggal_program_9 !== '' ? $rmf_tanggal_program_9 : NULL,

                'rmf_paraf_pasien_0'                => safe_post('rmf_paraf_pasien_0') !== '' ? safe_post('rmf_paraf_pasien_0') : NULL,
                'rmf_paraf_pasien_1'                => safe_post('rmf_paraf_pasien_1') !== '' ? safe_post('rmf_paraf_pasien_1') : NULL,
                'rmf_paraf_pasien_2'                => safe_post('rmf_paraf_pasien_2') !== '' ? safe_post('rmf_paraf_pasien_2') : NULL,
                'rmf_paraf_pasien_3'                => safe_post('rmf_paraf_pasien_3') !== '' ? safe_post('rmf_paraf_pasien_3') : NULL,
                'rmf_paraf_pasien_4'                => safe_post('rmf_paraf_pasien_4') !== '' ? safe_post('rmf_paraf_pasien_4') : NULL,
                'rmf_paraf_pasien_5'                => safe_post('rmf_paraf_pasien_5') !== '' ? safe_post('rmf_paraf_pasien_5') : NULL,
                'rmf_paraf_pasien_6'                => safe_post('rmf_paraf_pasien_6') !== '' ? safe_post('rmf_paraf_pasien_6') : NULL,
                'rmf_paraf_pasien_7'                => safe_post('rmf_paraf_pasien_7') !== '' ? safe_post('rmf_paraf_pasien_7') : NULL,
                'rmf_paraf_pasien_8'                => safe_post('rmf_paraf_pasien_8') !== '' ? safe_post('rmf_paraf_pasien_8') : NULL,
                'rmf_paraf_pasien_9'                => safe_post('rmf_paraf_pasien_9') !== '' ? safe_post('rmf_paraf_pasien_9') : NULL,

                'rmf_paraf_dokter_0'                => safe_post('rmf_paraf_dokter_0') !== '' ? safe_post('rmf_paraf_dokter_0') : NULL,
                'rmf_paraf_dokter_1'                => safe_post('rmf_paraf_dokter_1') !== '' ? safe_post('rmf_paraf_dokter_1') : NULL,
                'rmf_paraf_dokter_2'                => safe_post('rmf_paraf_dokter_2') !== '' ? safe_post('rmf_paraf_dokter_2') : NULL,
                'rmf_paraf_dokter_3'                => safe_post('rmf_paraf_dokter_3') !== '' ? safe_post('rmf_paraf_dokter_3') : NULL,
                'rmf_paraf_dokter_4'                => safe_post('rmf_paraf_dokter_4') !== '' ? safe_post('rmf_paraf_dokter_4') : NULL,
                'rmf_paraf_dokter_5'                => safe_post('rmf_paraf_dokter_5') !== '' ? safe_post('rmf_paraf_dokter_5') : NULL,
                'rmf_paraf_dokter_6'                => safe_post('rmf_paraf_dokter_6') !== '' ? safe_post('rmf_paraf_dokter_6') : NULL,
                'rmf_paraf_dokter_7'                => safe_post('rmf_paraf_dokter_7') !== '' ? safe_post('rmf_paraf_dokter_7') : NULL,
                'rmf_paraf_dokter_8'                => safe_post('rmf_paraf_dokter_8') !== '' ? safe_post('rmf_paraf_dokter_8') : NULL,
                'rmf_paraf_dokter_9'                => safe_post('rmf_paraf_dokter_9') !== '' ? safe_post('rmf_paraf_dokter_9') : NULL,

                'rmf_paraf_terapis_0'               => safe_post('rmf_paraf_terapis_0') !== '' ? safe_post('rmf_paraf_terapis_0') : NULL,
                'rmf_paraf_terapis_1'               => safe_post('rmf_paraf_terapis_1') !== '' ? safe_post('rmf_paraf_terapis_1') : NULL,
                'rmf_paraf_terapis_2'               => safe_post('rmf_paraf_terapis_2') !== '' ? safe_post('rmf_paraf_terapis_2') : NULL,
                'rmf_paraf_terapis_3'               => safe_post('rmf_paraf_terapis_3') !== '' ? safe_post('rmf_paraf_terapis_3') : NULL,
                'rmf_paraf_terapis_4'               => safe_post('rmf_paraf_terapis_4') !== '' ? safe_post('rmf_paraf_terapis_4') : NULL,
                'rmf_paraf_terapis_5'               => safe_post('rmf_paraf_terapis_5') !== '' ? safe_post('rmf_paraf_terapis_5') : NULL,
                'rmf_paraf_terapis_6'               => safe_post('rmf_paraf_terapis_6') !== '' ? safe_post('rmf_paraf_terapis_6') : NULL,
                'rmf_paraf_terapis_7'               => safe_post('rmf_paraf_terapis_7') !== '' ? safe_post('rmf_paraf_terapis_7') : NULL,
                'rmf_paraf_terapis_8'               => safe_post('rmf_paraf_terapis_8') !== '' ? safe_post('rmf_paraf_terapis_8') : NULL,
                'rmf_paraf_terapis_9'               => safe_post('rmf_paraf_terapis_9') !== '' ? safe_post('rmf_paraf_terapis_9') : NULL,
                
				'rmf_instrumen_uji'                 => safe_post('rmf_instrumen_uji') !== '' ? safe_post('rmf_instrumen_uji') : NULL,
				'rmf_hasil'                         => safe_post('rmf_hasil') !== '' ? safe_post('rmf_hasil') : NULL,
				'rmf_kesimpulan'                    => safe_post('rmf_kesimpulan') !== '' ? safe_post('rmf_kesimpulan') : NULL,
				'rmf_rekomendasi'                   => safe_post('rmf_rekomendasi') !== '' ? safe_post('rmf_rekomendasi') : NULL,
				'rmf_dokter'                        => safe_post('rmf_dokter') !== '' ? safe_post('rmf_dokter') : NULL,
				'rmf_status'                        => safe_post('rmf_status') !== '' ? safe_post('rmf_status') : NULL,
                
				'updated_at'                        => $this->datetime,
			);
            // var_dump($data);die;
            $this->db->where('id_rmf', safe_post('id_rmf'));
			$this->db->update('sm_rehab_medik_form', $data);
		} else {
			$data = array(
                'id_pendaftaran'                    => $id_pendaftaran_simpan,
                'id_layanan_pendaftaran'            => safe_post('id_layanan_pendaftaran'),
				'id_pasien'                         => safe_post('id_pasien'),
                'id_users'              	        => safe_post('id_users') !== '' ? safe_post('id_users') : NULL,

                // Pemeriksaan Fisik dan Uji Fungsi
                'rmf_tanggal_pelayanan'             => $rmf_tanggal_pelayanan !== '' ? $rmf_tanggal_pelayanan : NULL,
                'rmf_anamnesa'                      => safe_post('rmf_anamnesa') !== '' ? safe_post('rmf_anamnesa'): NULL,
                'rmf_keadaan_umum'                  => safe_post('rmf_keadaan_umum') !== '' ? safe_post('rmf_keadaan_umum'): NULL,
                'rmf_gcs'                           => safe_post('rmf_gcs') !== '' ? safe_post('rmf_gcs'): NULL,
                'rmf_kesadaran'                     => safe_post('rmf_kesadaran') !== '' ? safe_post('rmf_kesadaran'): NULL,
                'rmf_alergi'                        => safe_post('rmf_alergi') !== '' ? safe_post('rmf_alergi'): NULL,
                'rmf_tensi_sistolik'                => safe_post('rmf_tensi_sistolik') !== '' ? safe_post('rmf_tensi_sistolik'): NULL,
                'rmf_tensi_diastolik'               => safe_post('rmf_tensi_diastolik') !== '' ? safe_post('rmf_tensi_diastolik'): NULL,
                'rmf_suhu'                          => safe_post('rmf_suhu') !== '' ? safe_post('rmf_suhu'): NULL,
                'rmf_nadi'                          => safe_post('rmf_nadi') !== '' ? safe_post('rmf_nadi'): NULL,
                'rmf_rr'                            => safe_post('rmf_rr') !== '' ? safe_post('rmf_rr'): NULL,
                'rmf_tinggi_badan'                  => safe_post('rmf_tinggi_badan') !== '' ? safe_post('rmf_tinggi_badan'): NULL,
                'rmf_berat_badan'                   => safe_post('rmf_berat_badan') !== '' ? safe_post('rmf_berat_badan'): NULL,
                'rmf_kepala'                        => safe_post('rmf_kepala') !== '' ? safe_post('rmf_kepala'): NULL,
                'rmf_leher'                         => safe_post('rmf_leher') !== '' ? safe_post('rmf_leher'): NULL,
                'rmf_thorax'                        => safe_post('rmf_thorax') !== '' ? safe_post('rmf_thorax'): NULL,
                'rmf_pulmo'                         => safe_post('rmf_pulmo') !== '' ? safe_post('rmf_pulmo'): NULL,
                'rmf_cor'                           => safe_post('rmf_cor') !== '' ? safe_post('rmf_cor'): NULL,
                'rmf_abdomen'                       => safe_post('rmf_abdomen') !== '' ? safe_post('rmf_abdomen'): NULL,
                'rmf_genitalia'                     => safe_post('rmf_genitalia') !== '' ? safe_post('rmf_genitalia'): NULL,
                'rmf_ekstrimitas'                   => safe_post('rmf_ekstrimitas') !== '' ? safe_post('rmf_ekstrimitas'): NULL,
                'rmf_prognosis'                     => safe_post('rmf_prognosis') !== '' ? safe_post('rmf_prognosis'): NULL,
                'rmf_status_mentalis'               => safe_post('rmf_status_mentalis') !== '' ? safe_post('rmf_status_mentalis'): NULL,
                'rmf_lingkar_kepala'                => safe_post('rmf_lingkar_kepala') !== '' ? safe_post('rmf_lingkar_kepala'): NULL,
                'rmf_status_gizi'                   => safe_post('rmf_status_gizi') !== '' ? safe_post('rmf_status_gizi'): NULL,
                'rmf_telinga'                       => safe_post('rmf_telinga') !== '' ? safe_post('rmf_telinga'): NULL,
                'rmf_hidung'                        => safe_post('rmf_hidung') !== '' ? safe_post('rmf_hidung'): NULL,
                'rmf_tenggorok'                     => safe_post('rmf_tenggorok') !== '' ? safe_post('rmf_tenggorok'): NULL,
                'rmf_mata'                          => safe_post('rmf_mata') !== '' ? safe_post('rmf_mata'): NULL,
                'rmf_kulit_kelamin'                 => safe_post('rmf_kulit_kelamin') !== '' ? safe_post('rmf_kulit_kelamin'): NULL,

                'rmf_diagnosa'                      => safe_post('rmf_diagnosa_[]') !== '' ? json_encode(safe_post('rmf_diagnosa_[]')) : NULL,

				'rmf_diagnosis_fungsi'              => safe_post('rmf_diagnosis_fungsi') !== '' ? safe_post('rmf_diagnosis_fungsi') : NULL,
				'rmf_pemeriksaan_penunjang'         => safe_post('rmf_pemeriksaan_penunjang') !== '' ? safe_post('rmf_pemeriksaan_penunjang') : NULL,
				'rmf_tata_laksana'                  => safe_post('rmf_tata_laksana') !== '' ? safe_post('rmf_tata_laksana') : NULL,
				'rmf_rekomendasi_asessmen'          => safe_post('rmf_rekomendasi_asessmen') !== '' ? safe_post('rmf_rekomendasi_asessmen') : NULL,
				'rmf_evaluasi'                      => safe_post('rmf_evaluasi') !== '' ? safe_post('rmf_evaluasi') : NULL,
				'rmf_suspek_penyakit'               => safe_post('rmf_suspek_penyakit') !== '' ? safe_post('rmf_suspek_penyakit') : NULL,

                // program terapi
				'rmf_permintaan_terapi'             => safe_post('rmf_permintaan_terapi') !== '' ? safe_post('rmf_permintaan_terapi') : NULL,
                'rmf_program_0'                     => safe_post('rmf_program_0') !== '' ? safe_post('rmf_program_0') : NULL,
                'rmf_program_1'                     => safe_post('rmf_program_1') !== '' ? safe_post('rmf_program_1') : NULL,
                'rmf_program_2'                     => safe_post('rmf_program_2') !== '' ? safe_post('rmf_program_2') : NULL,
                'rmf_program_3'                     => safe_post('rmf_program_3') !== '' ? safe_post('rmf_program_3') : NULL,
                'rmf_program_4'                     => safe_post('rmf_program_4') !== '' ? safe_post('rmf_program_4') : NULL,
                'rmf_program_5'                     => safe_post('rmf_program_5') !== '' ? safe_post('rmf_program_5') : NULL,
                'rmf_program_6'                     => safe_post('rmf_program_6') !== '' ? safe_post('rmf_program_6') : NULL,
                'rmf_program_7'                     => safe_post('rmf_program_7') !== '' ? safe_post('rmf_program_7') : NULL,
                'rmf_program_8'                     => safe_post('rmf_program_8') !== '' ? safe_post('rmf_program_8') : NULL,
                'rmf_program_9'                     => safe_post('rmf_program_9') !== '' ? safe_post('rmf_program_9') : NULL,

                'rmf_tanggal_program_0'             => $rmf_tanggal_program_0 !== '' ? $rmf_tanggal_program_0 : NULL,
                'rmf_tanggal_program_1'             => $rmf_tanggal_program_1 !== '' ? $rmf_tanggal_program_1 : NULL,
                'rmf_tanggal_program_2'             => $rmf_tanggal_program_2 !== '' ? $rmf_tanggal_program_2 : NULL,
                'rmf_tanggal_program_3'             => $rmf_tanggal_program_3 !== '' ? $rmf_tanggal_program_3 : NULL,
                'rmf_tanggal_program_4'             => $rmf_tanggal_program_4 !== '' ? $rmf_tanggal_program_4 : NULL,
                'rmf_tanggal_program_5'             => $rmf_tanggal_program_5 !== '' ? $rmf_tanggal_program_5 : NULL,
                'rmf_tanggal_program_6'             => $rmf_tanggal_program_6 !== '' ? $rmf_tanggal_program_6 : NULL,
                'rmf_tanggal_program_7'             => $rmf_tanggal_program_7 !== '' ? $rmf_tanggal_program_7 : NULL,
                'rmf_tanggal_program_8'             => $rmf_tanggal_program_8 !== '' ? $rmf_tanggal_program_8 : NULL,
                'rmf_tanggal_program_9'             => $rmf_tanggal_program_9 !== '' ? $rmf_tanggal_program_9 : NULL,

                'rmf_paraf_pasien_0'                => safe_post('rmf_paraf_pasien_0') !== '' ? safe_post('rmf_paraf_pasien_0') : NULL,
                'rmf_paraf_pasien_1'                => safe_post('rmf_paraf_pasien_1') !== '' ? safe_post('rmf_paraf_pasien_1') : NULL,
                'rmf_paraf_pasien_2'                => safe_post('rmf_paraf_pasien_2') !== '' ? safe_post('rmf_paraf_pasien_2') : NULL,
                'rmf_paraf_pasien_3'                => safe_post('rmf_paraf_pasien_3') !== '' ? safe_post('rmf_paraf_pasien_3') : NULL,
                'rmf_paraf_pasien_4'                => safe_post('rmf_paraf_pasien_4') !== '' ? safe_post('rmf_paraf_pasien_4') : NULL,
                'rmf_paraf_pasien_5'                => safe_post('rmf_paraf_pasien_5') !== '' ? safe_post('rmf_paraf_pasien_5') : NULL,
                'rmf_paraf_pasien_6'                => safe_post('rmf_paraf_pasien_6') !== '' ? safe_post('rmf_paraf_pasien_6') : NULL,
                'rmf_paraf_pasien_7'                => safe_post('rmf_paraf_pasien_7') !== '' ? safe_post('rmf_paraf_pasien_7') : NULL,
                'rmf_paraf_pasien_8'                => safe_post('rmf_paraf_pasien_8') !== '' ? safe_post('rmf_paraf_pasien_8') : NULL,
                'rmf_paraf_pasien_9'                => safe_post('rmf_paraf_pasien_9') !== '' ? safe_post('rmf_paraf_pasien_9') : NULL,

                'rmf_paraf_dokter_0'                => safe_post('rmf_paraf_dokter_0') !== '' ? safe_post('rmf_paraf_dokter_0') : NULL,
                'rmf_paraf_dokter_1'                => safe_post('rmf_paraf_dokter_1') !== '' ? safe_post('rmf_paraf_dokter_1') : NULL,
                'rmf_paraf_dokter_2'                => safe_post('rmf_paraf_dokter_2') !== '' ? safe_post('rmf_paraf_dokter_2') : NULL,
                'rmf_paraf_dokter_3'                => safe_post('rmf_paraf_dokter_3') !== '' ? safe_post('rmf_paraf_dokter_3') : NULL,
                'rmf_paraf_dokter_4'                => safe_post('rmf_paraf_dokter_4') !== '' ? safe_post('rmf_paraf_dokter_4') : NULL,
                'rmf_paraf_dokter_5'                => safe_post('rmf_paraf_dokter_5') !== '' ? safe_post('rmf_paraf_dokter_5') : NULL,
                'rmf_paraf_dokter_6'                => safe_post('rmf_paraf_dokter_6') !== '' ? safe_post('rmf_paraf_dokter_6') : NULL,
                'rmf_paraf_dokter_7'                => safe_post('rmf_paraf_dokter_7') !== '' ? safe_post('rmf_paraf_dokter_7') : NULL,
                'rmf_paraf_dokter_8'                => safe_post('rmf_paraf_dokter_8') !== '' ? safe_post('rmf_paraf_dokter_8') : NULL,
                'rmf_paraf_dokter_9'                => safe_post('rmf_paraf_dokter_9') !== '' ? safe_post('rmf_paraf_dokter_9') : NULL,

                'rmf_paraf_terapis_0'               => safe_post('rmf_paraf_terapis_0') !== '' ? safe_post('rmf_paraf_terapis_0') : NULL,
                'rmf_paraf_terapis_1'               => safe_post('rmf_paraf_terapis_1') !== '' ? safe_post('rmf_paraf_terapis_1') : NULL,
                'rmf_paraf_terapis_2'               => safe_post('rmf_paraf_terapis_2') !== '' ? safe_post('rmf_paraf_terapis_2') : NULL,
                'rmf_paraf_terapis_3'               => safe_post('rmf_paraf_terapis_3') !== '' ? safe_post('rmf_paraf_terapis_3') : NULL,
                'rmf_paraf_terapis_4'               => safe_post('rmf_paraf_terapis_4') !== '' ? safe_post('rmf_paraf_terapis_4') : NULL,
                'rmf_paraf_terapis_5'               => safe_post('rmf_paraf_terapis_5') !== '' ? safe_post('rmf_paraf_terapis_5') : NULL,
                'rmf_paraf_terapis_6'               => safe_post('rmf_paraf_terapis_6') !== '' ? safe_post('rmf_paraf_terapis_6') : NULL,
                'rmf_paraf_terapis_7'               => safe_post('rmf_paraf_terapis_7') !== '' ? safe_post('rmf_paraf_terapis_7') : NULL,
                'rmf_paraf_terapis_8'               => safe_post('rmf_paraf_terapis_8') !== '' ? safe_post('rmf_paraf_terapis_8') : NULL,
                'rmf_paraf_terapis_9'               => safe_post('rmf_paraf_terapis_9') !== '' ? safe_post('rmf_paraf_terapis_9') : NULL,
                
				'rmf_instrumen_uji'                 => safe_post('rmf_instrumen_uji') !== '' ? safe_post('rmf_instrumen_uji') : NULL,
				'rmf_hasil'                         => safe_post('rmf_hasil') !== '' ? safe_post('rmf_hasil') : NULL,
				'rmf_kesimpulan'                    => safe_post('rmf_kesimpulan') !== '' ? safe_post('rmf_kesimpulan') : NULL,
				'rmf_rekomendasi'                   => safe_post('rmf_rekomendasi') !== '' ? safe_post('rmf_rekomendasi') : NULL,
				'rmf_dokter'                        => safe_post('rmf_dokter') !== '' ? safe_post('rmf_dokter') : NULL,
				'rmf_status'                        => safe_post('rmf_status') !== '' ? safe_post('rmf_status') : NULL,
                
				'created_at'                        => $this->datetime,
			);
            // var_dump($data);die;
			$this->db->insert('sm_rehab_medik_form', $data);
		}

		if ($this->db->trans_status() === false) :
			$this->db->trans_rollback();
			$status  = false;
			$message = 'Gagal simpan form rehabilitas medik';
		else :
			$this->db->trans_commit();
			$status  = true;
			$message = 'Berhasil simpan form rehabilitas medik';
		endif;

		$this->response(array('status' => $status, 'message' => $message), REST_Controller::HTTP_OK);
	}

    function simpan_log_rehab_medik_form_post()
	{   
        // var_dump(safe_post('id_rmf'),);die;
        $rmf_tanggal_pelayanan = safe_post('rmf_tanggal_pelayanan');
        $rmf_tanggal_pelayanan = str_replace('/', '-', $rmf_tanggal_pelayanan);
        $rmf_tanggal_pelayanan = date('Y-m-d H:i', strtotime($rmf_tanggal_pelayanan));

        $rmf_tanggal_program_0 = safe_post('rmf_tanggal_program_0');
        if ($rmf_tanggal_program_0 !== '') {
            $rmf_tanggal_program_0 = str_replace('/', '-', $rmf_tanggal_program_0);
            $rmf_tanggal_program_0 = date('Y-m-d H:i', strtotime($rmf_tanggal_program_0));
        }

        $rmf_tanggal_program_1 = safe_post('rmf_tanggal_program_1');
        if ($rmf_tanggal_program_1 !== '') {
            $rmf_tanggal_program_1 = str_replace('/', '-', $rmf_tanggal_program_1);
            $rmf_tanggal_program_1 = date('Y-m-d H:i', strtotime($rmf_tanggal_program_1));
        }

        $rmf_tanggal_program_2 = safe_post('rmf_tanggal_program_2');
        if ($rmf_tanggal_program_2 !== '') {
            $rmf_tanggal_program_2 = str_replace('/', '-', $rmf_tanggal_program_2);
            $rmf_tanggal_program_2 = date('Y-m-d H:i', strtotime($rmf_tanggal_program_2));
        }

        $rmf_tanggal_program_3 = safe_post('rmf_tanggal_program_3');
        if ($rmf_tanggal_program_3 !== '') {
            $rmf_tanggal_program_3 = str_replace('/', '-', $rmf_tanggal_program_3);
            $rmf_tanggal_program_3 = date('Y-m-d H:i', strtotime($rmf_tanggal_program_3));
        }

        $rmf_tanggal_program_4 = safe_post('rmf_tanggal_program_4');
        if ($rmf_tanggal_program_4 !== '') {
            $rmf_tanggal_program_4 = str_replace('/', '-', $rmf_tanggal_program_4);
            $rmf_tanggal_program_4 = date('Y-m-d H:i', strtotime($rmf_tanggal_program_4));
        }

        $rmf_tanggal_program_5 = safe_post('rmf_tanggal_program_5');
        if ($rmf_tanggal_program_5 !== '') {
            $rmf_tanggal_program_5 = str_replace('/', '-', $rmf_tanggal_program_5);
            $rmf_tanggal_program_5 = date('Y-m-d H:i', strtotime($rmf_tanggal_program_5));
        }

        $rmf_tanggal_program_6 = safe_post('rmf_tanggal_program_6');
        if ($rmf_tanggal_program_6 !== '') {
            $rmf_tanggal_program_6 = str_replace('/', '-', $rmf_tanggal_program_6);
            $rmf_tanggal_program_6 = date('Y-m-d H:i', strtotime($rmf_tanggal_program_6));
        }

        $rmf_tanggal_program_7 = safe_post('rmf_tanggal_program_7');
        if ($rmf_tanggal_program_7 !== '') {
            $rmf_tanggal_program_7 = str_replace('/', '-', $rmf_tanggal_program_7);
            $rmf_tanggal_program_7 = date('Y-m-d H:i', strtotime($rmf_tanggal_program_7));
        }

        $rmf_tanggal_program_8 = safe_post('rmf_tanggal_program_8');
        if ($rmf_tanggal_program_8 !== '') {
            $rmf_tanggal_program_8 = str_replace('/', '-', $rmf_tanggal_program_8);
            $rmf_tanggal_program_8 = date('Y-m-d H:i', strtotime($rmf_tanggal_program_8));
        }

        $rmf_tanggal_program_9 = safe_post('rmf_tanggal_program_9');
        if ($rmf_tanggal_program_9 !== '') {
            $rmf_tanggal_program_9 = str_replace('/', '-', $rmf_tanggal_program_9);
            $rmf_tanggal_program_9 = date('Y-m-d H:i', strtotime($rmf_tanggal_program_9));
        }

        $id_pendaftaran_awal = safe_post('id_pendaftaran_awal');
        $id_pendaftaran = safe_post('id_pendaftaran');
        if( $id_pendaftaran !== $id_pendaftaran_awal ){
            $id_pendaftaran_simpan = $id_pendaftaran_awal;
        } else {
            $id_pendaftaran_simpan = $id_pendaftaran;
        }
        
        $id_layanan_pendaftaran_awal = safe_post('id_layanan_pendaftaran_awal');
        $id_layanan_pendaftaran = safe_post('id_layanan_pendaftaran');
        if( $id_layanan_pendaftaran !== $id_layanan_pendaftaran_awal ){
            $id_layanan_pendaftaran_simpan = $id_layanan_pendaftaran_awal;
        } else {
            $id_layanan_pendaftaran_simpan = $id_layanan_pendaftaran;
        }

        // var_dump($id_layanan_pendaftaran_simpan);die;

        $this->db->trans_begin(); 
        $data = array(
            'id_pendaftaran'                    => $id_pendaftaran_simpan,
            'id_layanan_pendaftaran'            => $id_layanan_pendaftaran_simpan,
            // 'id_layanan_pendaftaran'            => safe_post('id_layanan_pendaftaran'),
            'id_rmf'                            => safe_post('id_rmf') !== '' ? safe_post('id_rmf'): NULL,
            'id_pasien'                         => safe_post('id_pasien'),
            'id_users'              	        => safe_post('id_users') !== '' ? safe_post('id_users') : NULL,

            // Pemeriksaan Fisik dan Uji Fungsi
            'rmf_tanggal_pelayanan'             => $rmf_tanggal_pelayanan !== '' ? $rmf_tanggal_pelayanan : NULL,
            'rmf_anamnesa'                      => safe_post('rmf_anamnesa') !== '' ? safe_post('rmf_anamnesa'): NULL,
            'rmf_keadaan_umum'                  => safe_post('rmf_keadaan_umum') !== '' ? safe_post('rmf_keadaan_umum'): NULL,
            'rmf_gcs'                           => safe_post('rmf_gcs') !== '' ? safe_post('rmf_gcs'): NULL,
            'rmf_kesadaran'                     => safe_post('rmf_kesadaran') !== '' ? safe_post('rmf_kesadaran'): NULL,
            'rmf_alergi'                        => safe_post('rmf_alergi') !== '' ? safe_post('rmf_alergi'): NULL,
            'rmf_tensi_sistolik'                => safe_post('rmf_tensi_sistolik') !== '' ? safe_post('rmf_tensi_sistolik'): NULL,
            'rmf_tensi_diastolik'               => safe_post('rmf_tensi_diastolik') !== '' ? safe_post('rmf_tensi_diastolik'): NULL,
            'rmf_suhu'                          => safe_post('rmf_suhu') !== '' ? safe_post('rmf_suhu'): NULL,
            'rmf_nadi'                          => safe_post('rmf_nadi') !== '' ? safe_post('rmf_nadi'): NULL,
            'rmf_rr'                            => safe_post('rmf_rr') !== '' ? safe_post('rmf_rr'): NULL,
            'rmf_tinggi_badan'                  => safe_post('rmf_tinggi_badan') !== '' ? safe_post('rmf_tinggi_badan'): NULL,
            'rmf_berat_badan'                   => safe_post('rmf_berat_badan') !== '' ? safe_post('rmf_berat_badan'): NULL,
            'rmf_kepala'                        => safe_post('rmf_kepala') !== '' ? safe_post('rmf_kepala'): NULL,
            'rmf_leher'                         => safe_post('rmf_leher') !== '' ? safe_post('rmf_leher'): NULL,
            'rmf_thorax'                        => safe_post('rmf_thorax') !== '' ? safe_post('rmf_thorax'): NULL,
            'rmf_pulmo'                         => safe_post('rmf_pulmo') !== '' ? safe_post('rmf_pulmo'): NULL,
            'rmf_cor'                           => safe_post('rmf_cor') !== '' ? safe_post('rmf_cor'): NULL,
            'rmf_abdomen'                       => safe_post('rmf_abdomen') !== '' ? safe_post('rmf_abdomen'): NULL,
            'rmf_genitalia'                     => safe_post('rmf_genitalia') !== '' ? safe_post('rmf_genitalia'): NULL,
            'rmf_ekstrimitas'                   => safe_post('rmf_ekstrimitas') !== '' ? safe_post('rmf_ekstrimitas'): NULL,
            'rmf_prognosis'                     => safe_post('rmf_prognosis') !== '' ? safe_post('rmf_prognosis'): NULL,
            'rmf_status_mentalis'               => safe_post('rmf_status_mentalis') !== '' ? safe_post('rmf_status_mentalis'): NULL,
            'rmf_lingkar_kepala'                => safe_post('rmf_lingkar_kepala') !== '' ? safe_post('rmf_lingkar_kepala'): NULL,
            'rmf_status_gizi'                   => safe_post('rmf_status_gizi') !== '' ? safe_post('rmf_status_gizi'): NULL,
            'rmf_telinga'                       => safe_post('rmf_telinga') !== '' ? safe_post('rmf_telinga'): NULL,
            'rmf_hidung'                        => safe_post('rmf_hidung') !== '' ? safe_post('rmf_hidung'): NULL,
            'rmf_tenggorok'                     => safe_post('rmf_tenggorok') !== '' ? safe_post('rmf_tenggorok'): NULL,
            'rmf_mata'                          => safe_post('rmf_mata') !== '' ? safe_post('rmf_mata'): NULL,
            'rmf_kulit_kelamin'                 => safe_post('rmf_kulit_kelamin') !== '' ? safe_post('rmf_kulit_kelamin'): NULL,

            'rmf_diagnosa'                      => safe_post('rmf_diagnosa_[]') !== '' ? json_encode(safe_post('rmf_diagnosa_[]')) : NULL,

            'rmf_diagnosis_fungsi'              => safe_post('rmf_diagnosis_fungsi') !== '' ? safe_post('rmf_diagnosis_fungsi') : NULL,
            'rmf_pemeriksaan_penunjang'         => safe_post('rmf_pemeriksaan_penunjang') !== '' ? safe_post('rmf_pemeriksaan_penunjang') : NULL,
            'rmf_tata_laksana'                  => safe_post('rmf_tata_laksana') !== '' ? safe_post('rmf_tata_laksana') : NULL,
            'rmf_rekomendasi_asessmen'          => safe_post('rmf_rekomendasi_asessmen') !== '' ? safe_post('rmf_rekomendasi_asessmen') : NULL,
            'rmf_evaluasi'                      => safe_post('rmf_evaluasi') !== '' ? safe_post('rmf_evaluasi') : NULL,
            'rmf_suspek_penyakit'               => safe_post('rmf_suspek_penyakit') !== '' ? safe_post('rmf_suspek_penyakit') : NULL,

            // program terapi
            'rmf_permintaan_terapi'             => safe_post('rmf_permintaan_terapi') !== '' ? safe_post('rmf_permintaan_terapi') : NULL,
            'rmf_program_0'                     => safe_post('rmf_program_0') !== '' ? safe_post('rmf_program_0') : NULL,
            'rmf_program_1'                     => safe_post('rmf_program_1') !== '' ? safe_post('rmf_program_1') : NULL,
            'rmf_program_2'                     => safe_post('rmf_program_2') !== '' ? safe_post('rmf_program_2') : NULL,
            'rmf_program_3'                     => safe_post('rmf_program_3') !== '' ? safe_post('rmf_program_3') : NULL,
            'rmf_program_4'                     => safe_post('rmf_program_4') !== '' ? safe_post('rmf_program_4') : NULL,
            'rmf_program_5'                     => safe_post('rmf_program_5') !== '' ? safe_post('rmf_program_5') : NULL,
            'rmf_program_6'                     => safe_post('rmf_program_6') !== '' ? safe_post('rmf_program_6') : NULL,
            'rmf_program_7'                     => safe_post('rmf_program_7') !== '' ? safe_post('rmf_program_7') : NULL,
            'rmf_program_8'                     => safe_post('rmf_program_8') !== '' ? safe_post('rmf_program_8') : NULL,
            'rmf_program_9'                     => safe_post('rmf_program_9') !== '' ? safe_post('rmf_program_9') : NULL,

            'rmf_tanggal_program_0'             => $rmf_tanggal_program_0 !== '' ? $rmf_tanggal_program_0 : NULL,
            'rmf_tanggal_program_1'             => $rmf_tanggal_program_1 !== '' ? $rmf_tanggal_program_1 : NULL,
            'rmf_tanggal_program_2'             => $rmf_tanggal_program_2 !== '' ? $rmf_tanggal_program_2 : NULL,
            'rmf_tanggal_program_3'             => $rmf_tanggal_program_3 !== '' ? $rmf_tanggal_program_3 : NULL,
            'rmf_tanggal_program_4'             => $rmf_tanggal_program_4 !== '' ? $rmf_tanggal_program_4 : NULL,
            'rmf_tanggal_program_5'             => $rmf_tanggal_program_5 !== '' ? $rmf_tanggal_program_5 : NULL,
            'rmf_tanggal_program_6'             => $rmf_tanggal_program_6 !== '' ? $rmf_tanggal_program_6 : NULL,
            'rmf_tanggal_program_7'             => $rmf_tanggal_program_7 !== '' ? $rmf_tanggal_program_7 : NULL,
            'rmf_tanggal_program_8'             => $rmf_tanggal_program_8 !== '' ? $rmf_tanggal_program_8 : NULL,
            'rmf_tanggal_program_9'             => $rmf_tanggal_program_9 !== '' ? $rmf_tanggal_program_9 : NULL,

            'rmf_paraf_pasien_0'                => safe_post('rmf_paraf_pasien_0') !== '' ? safe_post('rmf_paraf_pasien_0') : NULL,
            'rmf_paraf_pasien_1'                => safe_post('rmf_paraf_pasien_1') !== '' ? safe_post('rmf_paraf_pasien_1') : NULL,
            'rmf_paraf_pasien_2'                => safe_post('rmf_paraf_pasien_2') !== '' ? safe_post('rmf_paraf_pasien_2') : NULL,
            'rmf_paraf_pasien_3'                => safe_post('rmf_paraf_pasien_3') !== '' ? safe_post('rmf_paraf_pasien_3') : NULL,
            'rmf_paraf_pasien_4'                => safe_post('rmf_paraf_pasien_4') !== '' ? safe_post('rmf_paraf_pasien_4') : NULL,
            'rmf_paraf_pasien_5'                => safe_post('rmf_paraf_pasien_5') !== '' ? safe_post('rmf_paraf_pasien_5') : NULL,
            'rmf_paraf_pasien_6'                => safe_post('rmf_paraf_pasien_6') !== '' ? safe_post('rmf_paraf_pasien_6') : NULL,
            'rmf_paraf_pasien_7'                => safe_post('rmf_paraf_pasien_7') !== '' ? safe_post('rmf_paraf_pasien_7') : NULL,
            'rmf_paraf_pasien_8'                => safe_post('rmf_paraf_pasien_8') !== '' ? safe_post('rmf_paraf_pasien_8') : NULL,
            'rmf_paraf_pasien_9'                => safe_post('rmf_paraf_pasien_9') !== '' ? safe_post('rmf_paraf_pasien_9') : NULL,

            'rmf_paraf_dokter_0'                => safe_post('rmf_paraf_dokter_0') !== '' ? safe_post('rmf_paraf_dokter_0') : NULL,
            'rmf_paraf_dokter_1'                => safe_post('rmf_paraf_dokter_1') !== '' ? safe_post('rmf_paraf_dokter_1') : NULL,
            'rmf_paraf_dokter_2'                => safe_post('rmf_paraf_dokter_2') !== '' ? safe_post('rmf_paraf_dokter_2') : NULL,
            'rmf_paraf_dokter_3'                => safe_post('rmf_paraf_dokter_3') !== '' ? safe_post('rmf_paraf_dokter_3') : NULL,
            'rmf_paraf_dokter_4'                => safe_post('rmf_paraf_dokter_4') !== '' ? safe_post('rmf_paraf_dokter_4') : NULL,
            'rmf_paraf_dokter_5'                => safe_post('rmf_paraf_dokter_5') !== '' ? safe_post('rmf_paraf_dokter_5') : NULL,
            'rmf_paraf_dokter_6'                => safe_post('rmf_paraf_dokter_6') !== '' ? safe_post('rmf_paraf_dokter_6') : NULL,
            'rmf_paraf_dokter_7'                => safe_post('rmf_paraf_dokter_7') !== '' ? safe_post('rmf_paraf_dokter_7') : NULL,
            'rmf_paraf_dokter_8'                => safe_post('rmf_paraf_dokter_8') !== '' ? safe_post('rmf_paraf_dokter_8') : NULL,
            'rmf_paraf_dokter_9'                => safe_post('rmf_paraf_dokter_9') !== '' ? safe_post('rmf_paraf_dokter_9') : NULL,

            'rmf_paraf_terapis_0'               => safe_post('rmf_paraf_terapis_0') !== '' ? safe_post('rmf_paraf_terapis_0') : NULL,
            'rmf_paraf_terapis_1'               => safe_post('rmf_paraf_terapis_1') !== '' ? safe_post('rmf_paraf_terapis_1') : NULL,
            'rmf_paraf_terapis_2'               => safe_post('rmf_paraf_terapis_2') !== '' ? safe_post('rmf_paraf_terapis_2') : NULL,
            'rmf_paraf_terapis_3'               => safe_post('rmf_paraf_terapis_3') !== '' ? safe_post('rmf_paraf_terapis_3') : NULL,
            'rmf_paraf_terapis_4'               => safe_post('rmf_paraf_terapis_4') !== '' ? safe_post('rmf_paraf_terapis_4') : NULL,
            'rmf_paraf_terapis_5'               => safe_post('rmf_paraf_terapis_5') !== '' ? safe_post('rmf_paraf_terapis_5') : NULL,
            'rmf_paraf_terapis_6'               => safe_post('rmf_paraf_terapis_6') !== '' ? safe_post('rmf_paraf_terapis_6') : NULL,
            'rmf_paraf_terapis_7'               => safe_post('rmf_paraf_terapis_7') !== '' ? safe_post('rmf_paraf_terapis_7') : NULL,
            'rmf_paraf_terapis_8'               => safe_post('rmf_paraf_terapis_8') !== '' ? safe_post('rmf_paraf_terapis_8') : NULL,
            'rmf_paraf_terapis_9'               => safe_post('rmf_paraf_terapis_9') !== '' ? safe_post('rmf_paraf_terapis_9') : NULL,
            
            'rmf_instrumen_uji'                 => safe_post('rmf_instrumen_uji') !== '' ? safe_post('rmf_instrumen_uji') : NULL,
            'rmf_hasil'                         => safe_post('rmf_hasil') !== '' ? safe_post('rmf_hasil') : NULL,
            'rmf_kesimpulan'                    => safe_post('rmf_kesimpulan') !== '' ? safe_post('rmf_kesimpulan') : NULL,
            'rmf_rekomendasi'                   => safe_post('rmf_rekomendasi') !== '' ? safe_post('rmf_rekomendasi') : NULL,
            'rmf_dokter'                        => safe_post('rmf_dokter') !== '' ? safe_post('rmf_dokter') : NULL,
            'rmf_status'                        => safe_post('rmf_status') !== '' ? safe_post('rmf_status') : NULL,
            
            'created_at'                        => $this->datetime,
        );
        // var_dump($data);die;
        $this->db->insert('sm_rehab_medik_form_log', $data);


		if ($this->db->trans_status() === false) :
			$this->db->trans_rollback();
			$status  = false;
			$message = 'Gagal simpan form checklist penerimaan pasien rawat jalan';
		else :
			$this->db->trans_commit();
			$status  = true;
			$message = 'Berhasil simpan form checklist penerimaan pasien rawat jalan';
		endif;

		$this->response(array('status' => $status, 'message' => $message), REST_Controller::HTTP_OK);
	}

}