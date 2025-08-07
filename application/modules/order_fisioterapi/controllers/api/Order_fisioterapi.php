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
class Order_fisioterapi extends REST_Controller
{

    function __construct()
    {
        parent::__construct();
		$this->limit = 10;
		$this->datetime = date('Y-m-d H:i:s');
        $this->load->model('Order_fisioterapi_model', 'm_order_fisioterapi');
        $this->load->model('pemeriksaan_poli/Protokol_terapi_model', 'protokol_terapi');
        
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

    function get_list_order_fisioterapi_get()
    {
        if (!$this->get('page')) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
        endif;
        
        $start          = ($this->get('page') - 1) * $this->limit;
        $search         = [
            'tanggal_awal'      => safe_get('tanggal_awal'),
            'tanggal_akhir'     => safe_get('tanggal_akhir'),
            'no_register'       => safe_get('no_register'),
            'no_rm'             => safe_get('no_rm'),
            'nama'              => safe_get('nama'),
            'dokter'            => safe_get('dokter'),
        ];
        
        $data = $this->m_order_fisioterapi->getListDataOrderFisioterapi($this->limit, $start, $search);
        $data['page']    = (int) $this->get('page');
        $data['limit']   = $this->limit;

        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK); // (200)
        endif;
    }

    function simpan_data_status_terapi_post() 
    {
      $this->db->trans_begin();

        if (safe_post('id_t') === '' ){

            $response = array('status' => false, 'message' => 'Silakan Lakukan Entri Tindakan pada Form Pemeriksaan Terlebih Dahulu');
            $this->response($response, REST_Controller::HTTP_OK);

        } else if (safe_post('id_k') === '' | safe_post('rm') === '' | safe_post('id_layanan_pendaftaran') === ''){
            $response = array('status' => false, 'message' => 'Parameter tidak lengkap, silahkan hubungi bagian IT.');
            $this->response($response, REST_Controller::HTTP_OK);

        }


        $user = safe_post('user');
        $irm = safe_post('ir_m');
        $idk = safe_post('id_k');
        $idt = safe_post('id_t');
        $no_rm = safe_post('rm');
        $id_layanan_pendaftaran = safe_post('id_layanan_pendaftaran');

        $total_idk =  $this->db->select("srmk.total_kunjungan as total")->from("sm_rehab_medik_kunjungan as srmk")->where("srmk.id", $idk, true)->get()->row();

        $get_total_idk = $total_idk->total;

        $data_total_status = $this->db->select("sum(srms.stop_terapi) as total")->from("sm_rehab_medik_status as srms")->where("srms.id_kunjungan", $idk, true)->get()->row();
        
        $total_status = $data_total_status->total;

        

        if($total_status < $get_total_idk){
        

               if($irm !== 'null'){

                       $data_status_terapi = array(

                                'id_layanan_pendaftaran'            => $id_layanan_pendaftaran,
                                'keterangan'                        => 'selesai',
                                'tanggal'                           => $this->datetime,
                                'id_operator'                       => $user,
                                'id_rehab_medik'                    => $irm,
                                'stop_terapi'                       => 1,
                                'id_pasien'                         => $no_rm,
                                'id_kunjungan'                      => $idk,
                                'id_tindakan'                       => $idt,


                            );

                         $this->m_order_fisioterapi->simpan_status($data_status_terapi); 

                         
                } else {

                  


               $data_rehab = array(

                    'id_layanan_pendaftaran'            => $id_layanan_pendaftaran,
                    'catatan'                           => 'Silakan perbaharui Catatan ini',
                    'tanggal'                           => $this->datetime,
                    'user'                              => $user,
                    'id_pasien'                         => $no_rm,
                    'id_kunjungan'                      => $idk,


                );
                    $this->protokol_terapi->simpan_rehab($data_rehab);
                    
                    $checkIdRehab = $this->db->query("select id from sm_rehab_medik where id_layanan_pendaftaran = '".$id_layanan_pendaftaran."'")->row();

                        $idRehab = $checkIdRehab->id;

                        

                        $data_status_terapi = array(

                                'id_layanan_pendaftaran'            => $id_layanan_pendaftaran,
                                'keterangan'                        => 'selesai',
                                'tanggal'                           => $this->datetime,
                                'id_operator'                       => $user,
                                'id_rehab_medik'                    => $idRehab,
                                'stop_terapi'                       => 1,
                                'id_pasien'                         => $no_rm,
                                'id_kunjungan'                      => $idk,
                                'id_tindakan'                       => $idt,


                            );

                          $this->m_order_fisioterapi->simpan_status($data_status_terapi);

                          



                }

                $message_status = 1;

            } else 

            {

               $message_status = 0;
                

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

    function stop_status_terapi_put() 
    {
     
        $this->db->trans_begin();

        $idk = $this->put('id_k', true);
        $waktu = $this->datetime;
        $status = 1;
        $user = $this->put('user', true);

        $total_idk =  $this->db->select("srmk.total_kunjungan as total, srmk.id_pasien")->from("sm_rehab_medik_kunjungan as srmk")->where("srmk.id", $idk, true)->get()->row();

        $get_total_idk = $total_idk->total;

        $data_total_status = $this->db->select("sum(srms.stop_terapi) as total")->from("sm_rehab_medik_status as srms")->where("srms.id_kunjungan", $idk, true)->get()->row();
        
        $total_status = $data_total_status->total;

        $get_rm = $total_idk->id_pasien;

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
        

            if($total_status < $get_total_idk){

                $update = ['tanggal_stop' => $waktu, 'user_stop' => $user, 'status' => $status];

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


    function update_status_srms_put() 
    {
     
        $this->db->trans_begin();

        $idk = $this->put('id_k', true);
        $status = 1;
        
        $update = ['status' => $status];

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

     function batal_data_status_terapi_delete() 
    {
     

        $idStatus = $this->get("id_tindakan");

       
        $data_batal = $this->db->query("select id from sm_rehab_medik_status where id_tindakan = '".$idStatus."'")->row();
        $del = $data_batal->id;
        $response = $this->m_order_fisioterapi->batal_status($del);    
        $this->response($response, REST_Controller::HTTP_NO_CONTENT);

    } 
    

}