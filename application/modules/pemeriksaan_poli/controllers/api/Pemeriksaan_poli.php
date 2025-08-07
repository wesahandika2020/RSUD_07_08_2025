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
class Pemeriksaan_poli extends REST_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->limit = 10;
        $this->load->model('Pemeriksaan_poli_model', 'pemeriksaan_poli');

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

    function get_list_pemeriksaan_poli_get()
    {
        if (!$this->get('page')) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
        endif;
        
        $start          = ((int) $this->get('page') - 1) * $this->limit;
        $search         = [
            'tanggal_awal'      => safe_get('tanggal_awal'),
            'tanggal_akhir'     => safe_get('tanggal_akhir'),
            'tanggal_awal_layanan'  => safe_get('tanggal_awal_layanan'),
            'tanggal_akhir_layanan' => safe_get('tanggal_akhir_layanan'),
            'jenis_layanan'     => $this->get('jenis'),
            'no_register'       => safe_get('no_register'),
            'no_rm'             => safe_get('no_rm'),
            'nik'               => safe_get('nik'),
            'nama'              => safe_get('nama'),
            'layanan'           => safe_get('layanan'),
            'id_dokter'         => safe_get('id_dokter'),
            'shifpoli'          => safe_get('shifpoli'),
        ];
        
        $data            = $this->pemeriksaan_poli->getListDataPemeriksaanPoliklinik($this->limit, $start, $search);
		foreach($data['data'] as $item) {
            $item->lab   = $this->pemeriksaan_poli->getJmlOrderLab($item->id);
            $item->rad   = $this->pemeriksaan_poli->getJmlOrderRadiologi($item->id);
        }
        $data['page']    = (int) $this->get('page');
        $data['limit']   = $this->limit;

        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK); // (200)
        endif;
    }

    function ambil_profil_pasien_get() {
        if (!$this->get('id', true)) :
            $this->response( null, REST_Controller::HTTP_BAD_REQUEST ); // (400)
        endif;

        $no_rm          = $this->get('id', true);
        $data['profil'] = $this->pemeriksaan_poli->getDataProfilPasien($no_rm);
        $datang         = $this->pemeriksaan_poli->getListKedatangan($no_rm);

        foreach ($datang as $row) :
            $row->tanggal_kunjungan = indo_tgl( $row->tanggal_kunjungan );
            $row->layanan           = $this->pemeriksaan_poli->getLayananProfilPasien($row->id);
        endforeach;

        $data['datang'] = $datang;

        if ( $data ) :
            $this->response( $data, REST_Controller::HTTP_OK ); // (200)
        endif;
    }

    function ambil_profil_riwayat_pasien_get() {
        if (!$this->get('id', true)) :
            $this->response( null, REST_Controller::HTTP_BAD_REQUEST); // (400)
        endif;
        $id_pendaftaran          = $this->get('id', true);
        $data                    = $this->pemeriksaan_poli->ambilDataKedatangan($id_pendaftaran);
        $data->tanggal_kunjungan = indo_tgl($data->tanggal_kunjungan);
        $data->layanan           = $this->pemeriksaan_poli->ambilLayananKedatangan($data->id);
        $this->response($data, REST_Controller::HTTP_OK);
    }

    function ambil_detail_profil_anamnesa_get() {
        if ( ! $this->get( 'id', true ) ) :
            $this->response( null, REST_Controller::HTTP_BAD_REQUEST ); // (400)
        endif;

        $id   = $this->get( 'id', true );
        $data = $this->pemeriksaan_poli->ambilDetailProfilAnamnesa( $id );

        if ( $data ) :
            $this->response( $data, REST_Controller::HTTP_OK ); // (200)
        endif;

    }

     
    // PDIRJRJ + +
    function get_data_entri_rekam_medis_get(){
        if (!$this->get('id_layanan_pendaftaran')) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
        endif;
        $this->load->model('pendaftaran/Pendaftaran_model', 'm_pendaftaran'); 
        $this->load->model('pelayanan/Pelayanan_model', 'm_pelayanan');
        $data                               = $this->m_pendaftaran->getPendaftaranDetail($this->get('id', true), $this->get('id_layanan', true));
        $data['profil']                     = $this->m_pelayanan->getProfilPasien($data['pasien']->id_pasien);
        // $data['pengkajian_dan_intervensi_resiko_jatuh_rawat_jalan']            = $this->pemeriksaan_poli->getPengkajianDanIntervensiResikoJatuhRawatJalan($data['layanan']->id);
        // $data['pengkajian_dan_intervensi_resiko_jatuh_rawat_jalan_logs']       = $this->pemeriksaan_poli->getPengkajianDanIntervensiResikoJatuhRawatJalanLogs($data['layanan']->id);
        $data['pengkajian_dan_intervensi_resiko_jatuh_rawat_jalan']            = $this->pemeriksaan_poli->getPengkajianDanIntervensiResikoJatuhRawatJalan($this->get('id', true));
        $data['pengkajian_dan_intervensi_resiko_jatuh_rawat_jalan_logs']       = $this->pemeriksaan_poli->getPengkajianDanIntervensiResikoJatuhRawatJalanLogs($this->get('id', true));
        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK); // (200)
        endif;
    }

 
    // PDIRJRJ +
    function get_history_logs_pengkajian_dan_intervensi_resiko_jatuh_rawat_jalan_get(){
        if (!$this->get('id_layanan_pendaftaran', true)) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
        endif;
        $id_layanan_pendaftaran = $this->get('id_layanan_pendaftaran', true);
        $data['pengkajian_dan_intervensi_resiko_jatuh_rawat_jalan_logs']   = $this->pemeriksaan_poli->getPengkajianDanIntervensiResikoJatuhRawatJalanLogs($id_layanan_pendaftaran);
        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK); // (200)
        endif;
    }

    // PDIRJRJ +
    function simpan_entri_rekam_medis_rajal_post(){

        if (safe_post('id_layanan_pendaftaran') === '') :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
        endif;
        $id_layanan_pendaftaran = safe_post('id_layanan_pendaftaran');
        $id_pendaftaran = safe_post('id_pendaftaran');;
        $id_efrm = safe_post('id_efrm');
        $id_users = safe_post('id_user');
        $pengkajianDanIntervensiResikoJatuhRawatJalan = array(			
            'id_layanan_pendaftaran' => $id_layanan_pendaftaran,
            'id_pendaftaran' => $id_pendaftaran,
            'id_users' => $id_users, 

            'pengkajian_pdirjrj' => json_encode([
                'pengkajian_pdirjrj_1' => safe_post('pengkajian_pdirjrj_1') !== '' ? safe_post('pengkajian_pdirjrj_1') : null,
                'pengkajian_pdirjrj_2' => safe_post('pengkajian_pdirjrj_2') !== '' ? safe_post('pengkajian_pdirjrj_2') : null,
                'pengkajian_pdirjrj_2' => safe_post('pengkajian_pdirjrj_2') !== '' ? safe_post('pengkajian_pdirjrj_2') : null,
                'pengkajian_pdirjrj_4' => safe_post('pengkajian_pdirjrj_4') !== '' ? safe_post('pengkajian_pdirjrj_4') : null,
                'pengkajian_pdirjrj_5' => safe_post('pengkajian_pdirjrj_5') !== '' ? safe_post('pengkajian_pdirjrj_5') : null,
                'pengkajian_pdirjrj_5' => safe_post('pengkajian_pdirjrj_5') !== '' ? safe_post('pengkajian_pdirjrj_5') : null,
                'pengkajian_pdirjrj_7' => safe_post('pengkajian_pdirjrj_7') !== '' ? safe_post('pengkajian_pdirjrj_7') : null,
                'pengkajian_pdirjrj_8' => safe_post('pengkajian_pdirjrj_8') !== '' ? safe_post('pengkajian_pdirjrj_8') : null,
                'pengkajian_pdirjrj_8' => safe_post('pengkajian_pdirjrj_8') !== '' ? safe_post('pengkajian_pdirjrj_8') : null,
            ]),
            'hasil_pdirjrj' => json_encode([
                'hasil_pdirjrj_1' => safe_post('hasil_pdirjrj_1') !== '' ? safe_post('hasil_pdirjrj_1') : null,
                'hasil_pdirjrj_2' => safe_post('hasil_pdirjrj_2') !== '' ? safe_post('hasil_pdirjrj_2') : null,
                'hasil_pdirjrj_3' => safe_post('hasil_pdirjrj_3') !== '' ? safe_post('hasil_pdirjrj_3') : null,
                'hasil_pdirjrj_4' => safe_post('hasil_pdirjrj_4') !== '' ? safe_post('hasil_pdirjrj_4') : null,
                'hasil_pdirjrj_5' => safe_post('hasil_pdirjrj_5') !== '' ? safe_post('hasil_pdirjrj_5') : null,
                'hasil_pdirjrj_6' => safe_post('hasil_pdirjrj_6') !== '' ? safe_post('hasil_pdirjrj_6') : null,
                'hasil_pdirjrj_7' => safe_post('hasil_pdirjrj_7') !== '' ? safe_post('hasil_pdirjrj_7') : null,
                'hasil_pdirjrj_8' => safe_post('hasil_pdirjrj_8') !== '' ? safe_post('hasil_pdirjrj_8') : null,
                'hasil_pdirjrj_9' => safe_post('hasil_pdirjrj_9') !== '' ? safe_post('hasil_pdirjrj_9') : null,
            ]),
            'intervensi_pdirjrj' => json_encode([
                'intervensi_pdirjrj_1' => safe_post('intervensi_pdirjrj_1') !== '' ? safe_post('intervensi_pdirjrj_1') : null,
                'intervensi_pdirjrj_2' => safe_post('intervensi_pdirjrj_2') !== '' ? safe_post('intervensi_pdirjrj_2') : null,
                'intervensi_pdirjrj_3' => safe_post('intervensi_pdirjrj_3') !== '' ? safe_post('intervensi_pdirjrj_3') : null,
                'intervensi_pdirjrj_3' => safe_post('intervensi_pdirjrj_3') !== '' ? safe_post('intervensi_pdirjrj_3') : null,
                'intervensi_pdirjrj_5' => safe_post('intervensi_pdirjrj_5') !== '' ? safe_post('intervensi_pdirjrj_5') : null,
                'intervensi_pdirjrj_6' => safe_post('intervensi_pdirjrj_6') !== '' ? safe_post('intervensi_pdirjrj_6') : null,
                'intervensi_pdirjrj_7' => safe_post('intervensi_pdirjrj_7') !== '' ? safe_post('intervensi_pdirjrj_7') : null,
                'intervensi_pdirjrj_7' => safe_post('intervensi_pdirjrj_7') !== '' ? safe_post('intervensi_pdirjrj_7') : null,
                'intervensi_pdirjrj_9' => safe_post('intervensi_pdirjrj_9') !== '' ? safe_post('intervensi_pdirjrj_9') : null,
                'intervensi_pdirjrj_10' => safe_post('intervensi_pdirjrj_10') !== '' ? safe_post('intervensi_pdirjrj_10') : null,
                'intervensi_pdirjrj_11' => safe_post('intervensi_pdirjrj_11') !== '' ? safe_post('intervensi_pdirjrj_11') : null,
                'intervensi_pdirjrj_11' => safe_post('intervensi_pdirjrj_11') !== '' ? safe_post('intervensi_pdirjrj_11') : null,
            ]),
            'perawat_pdirjrj_1' 		=> safe_post('perawat_pdirjrj_1') !== '' ? safe_post('perawat_pdirjrj_1') : NULL,
            'perawat_pdirjrj_2' 		=> safe_post('perawat_pdirjrj_2') !== '' ? safe_post('perawat_pdirjrj_2') : NULL,
            'perawat_pdirjrj_3' 		=> safe_post('perawat_pdirjrj_3') !== '' ? safe_post('perawat_pdirjrj_3') : NULL,			
        );

        // var_dump($pengkajianDanIntervensiResikoJatuhRawatJalan);die;

        $sign = $this->db->select('pdirjrj. perawat_pdirjrj_1, perawat_pdirjrj_2,  perawat_pdirjrj_3')
        ->from('sm_pengkajian_dan_intervensi_resiko_jatuh_rajal as pdirjrj')      
        ->where('pdirjrj.id_layanan_pendaftaran', $id_layanan_pendaftaran)
        ->get()
        ->row();   
        if (isset($sign)) :          			
            if ($sign->perawat_pdirjrj_1 !== NULL) :
                $pengkajianDanIntervensiResikoJatuhRawatJalan['perawat_pdirjrj_1'] = $sign->perawat_pdirjrj_1;
            else :
                $pengkajianDanIntervensiResikoJatuhRawatJalan['perawat_pdirjrj_1'] = (safe_post('perawat_pdirjrj_1') !== '' ? safe_post('perawat_pdirjrj_1') : NULL);
            endif;
            if ($sign->perawat_pdirjrj_2 !== NULL) :
                $pengkajianDanIntervensiResikoJatuhRawatJalan['perawat_pdirjrj_2'] = $sign->perawat_pdirjrj_2;
            else :
                $pengkajianDanIntervensiResikoJatuhRawatJalan['perawat_pdirjrj_2'] = (safe_post('perawat_pdirjrj_2') !== '' ? safe_post('perawat_pdirjrj_2') : NULL);
            endif;
            if ($sign->perawat_pdirjrj_3 !== NULL) :
                $pengkajianDanIntervensiResikoJatuhRawatJalan['perawat_pdirjrj_3'] = $sign->perawat_pdirjrj_3;
            else :
                $pengkajianDanIntervensiResikoJatuhRawatJalan['perawat_pdirjrj_3'] = (safe_post('perawat_pdirjrj_3') !== '' ? safe_post('perawat_pdirjrj_3') : NULL);
            endif;           
        endif;
        $this->pemeriksaan_poli->updatePengkajianDanIntervensiResikoJatuhRawatJalan($pengkajianDanIntervensiResikoJatuhRawatJalan, $id_efrm);

        if (!empty($respon)) {

            $response = $respon;
        } else {

            $response = null;
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
            // 'id'     => $layanan['id'],
            'id_pendaftaran' => ('id_pendaftaran'),
            'id_layanan_pendaftaran' => ('id_layanan_pendaftaran'),
            'respon' => $response,
        );

        $this->response($message, REST_Controller::HTTP_OK);
    }






    // PAKARJ + ubah
    function get_data_pengkajian_keperawatan_anak_get(){
        if (!$this->get('id_layanan_pendaftaran')) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
        endif;
        $this->load->model('pendaftaran/Pendaftaran_model', 'm_pendaftaran'); 
        $this->load->model('pelayanan/Pelayanan_model', 'm_pelayanan');
        $data                               = $this->m_pendaftaran->getPendaftaranDetail($this->get('id', true), $this->get('id_layanan', true));
        $data['profil']                     = $this->m_pelayanan->getProfilPasien($data['pasien']->id_pasien);
        $data['pengkajian_awal_keperawatan_anak']            = $this->pemeriksaan_poli->getPengkajianAwalKeperawatanAnakRawatJalan($this->get('id', true));
        $data['pengkajian_awal_keperawatan_anak_logs']       = $this->pemeriksaan_poli->getPengkajianAwalKeperawatanAnakRawatJalanLogs($this->get('id', true));
        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK); // (200)
        endif;
    }


    // PAKARJ + ubah
    function get_history_logs_pengkajian_awal_keperawatan_anak_get(){
        if (!$this->get('id_layanan_pendaftaran', true)) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
        endif;
        $id_layanan_pendaftaran = $this->get('id_layanan_pendaftaran', true);
        $data['pengkajian_awal_keperawatan_anak_logs']       = $this->pemeriksaan_poli->getPengkajianAwalKeperawatanAnakRawatJalanLogs($id_layanan_pendaftaran);
        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK); // (200)
        endif;
    }


    // PAKARJ + ubah
    function simpan_data_pengkajian_keperawatan_anak_rajal_post(){    

        if (safe_post('id_layanan_pendaftaran') === '') :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
        endif;
    
        $id_layanan_pendaftaran = safe_post('id_layanan_pendaftaran');
        $id_pendaftaran = safe_post('id_pendaftaran');;
        $id_pakarj = safe_post('id_pakarj');
        $id_users = safe_post('id_user');

        $pengkajianAwalKeperawatanAnakRawatJalan = array(		
            'id_layanan_pendaftaran' => $id_layanan_pendaftaran,
            'id_pendaftaran' => $id_pendaftaran,
            'id_users' => $id_users,

            'keluhan_utama_pakarj' => (safe_post('keluhan_utama_pakarj') !== '' ? safe_post('keluhan_utama_pakarj') : NULL), 

            'riwayat_kes' => json_encode([
                'riwayat_kes_1' => safe_post('riwayat_kes_1') !== '' ? safe_post('riwayat_kes_1') : null,
				'riwayat_kes_1' => safe_post('riwayat_kes_1') !== '' ? safe_post('riwayat_kes_1') : null,
				'riwayat_kes_3' => safe_post('riwayat_kes_3') !== '' ? safe_post('riwayat_kes_3') : null,
				'riwayat_kes_4' => safe_post('riwayat_kes_4') !== '' ? safe_post('riwayat_kes_4') : null,
                'riwayat_kes_5' => safe_post('riwayat_kes_5') !== '' ? safe_post('riwayat_kes_5') : null,
				'riwayat_kes_6' => safe_post('riwayat_kes_6') !== '' ? safe_post('riwayat_kes_6') : null,
				'riwayat_kes_7' => safe_post('riwayat_kes_7') !== '' ? safe_post('riwayat_kes_7') : null,
				'riwayat_kes_8' => safe_post('riwayat_kes_8') !== '' ? safe_post('riwayat_kes_8') : null,
                'riwayat_kes_9' => safe_post('riwayat_kes_9') !== '' ? safe_post('riwayat_kes_9') : null,
                'riwayat_kes_10' => safe_post('riwayat_kes_10') !== '' ? safe_post('riwayat_kes_10') : null,
                'riwayat_kes_10' => safe_post('riwayat_kes_10') !== '' ? safe_post('riwayat_kes_10') : null,
                'riwayat_kes_12' => safe_post('riwayat_kes_12') !== '' ? safe_post('riwayat_kes_12') : null,
                'riwayat_kes_13' => safe_post('riwayat_kes_13') !== '' ? safe_post('riwayat_kes_13') : null,
                'riwayat_kes_14' => safe_post('riwayat_kes_14') !== '' ? safe_post('riwayat_kes_14') : null,
                'riwayat_kes_14' => safe_post('riwayat_kes_14') !== '' ? safe_post('riwayat_kes_14') : null,
                'riwayat_kes_14' => safe_post('riwayat_kes_14') !== '' ? safe_post('riwayat_kes_14') : null,
                'riwayat_kes_17' => safe_post('riwayat_kes_17') !== '' ? safe_post('riwayat_kes_17') : null,
            ]),

            'riwayat_pesi' => json_encode([
                'riwayat_pesi_1' => safe_post('riwayat_pesi_1') !== '' ? safe_post('riwayat_pesi_1') : null,
				'riwayat_pesi_1' => safe_post('riwayat_pesi_1') !== '' ? safe_post('riwayat_pesi_1') : null,
				'riwayat_pesi_3' => safe_post('riwayat_pesi_3') !== '' ? safe_post('riwayat_pesi_3') : null,
				'riwayat_pesi_4' => safe_post('riwayat_pesi_4') !== '' ? safe_post('riwayat_pesi_4') : null,
                'riwayat_pesi_5' => safe_post('riwayat_pesi_5') !== '' ? safe_post('riwayat_pesi_5') : null,
				'riwayat_pesi_6' => safe_post('riwayat_pesi_6') !== '' ? safe_post('riwayat_pesi_6') : null,
				'riwayat_pesi_7' => safe_post('riwayat_pesi_7') !== '' ? safe_post('riwayat_pesi_7') : null,
				'riwayat_pesi_8' => safe_post('riwayat_pesi_8') !== '' ? safe_post('riwayat_pesi_8') : null,
                'riwayat_pesi_9' => safe_post('riwayat_pesi_9') !== '' ? safe_post('riwayat_pesi_9') : null,
                'riwayat_pesi_10' => safe_post('riwayat_pesi_10') !== '' ? safe_post('riwayat_pesi_10') : null,
                'riwayat_pesi_11' => safe_post('riwayat_pesi_11') !== '' ? safe_post('riwayat_pesi_11') : null,
                'riwayat_pesi_12' => safe_post('riwayat_pesi_12') !== '' ? safe_post('riwayat_pesi_12') : null,
                'riwayat_pesi_13' => safe_post('riwayat_pesi_13') !== '' ? safe_post('riwayat_pesi_13') : null,
            ]),

            'pemeriksaan_fisik' => json_encode([
                'pemeriksaan_fisik_1' => safe_post('pemeriksaan_fisik_1') !== '' ? safe_post('pemeriksaan_fisik_1') : null,
				'pemeriksaan_fisik_2' => safe_post('pemeriksaan_fisik_2') !== '' ? safe_post('pemeriksaan_fisik_2') : null,
				'pemeriksaan_fisik_3' => safe_post('pemeriksaan_fisik_3') !== '' ? safe_post('pemeriksaan_fisik_3') : null,
				'pemeriksaan_fisik_4' => safe_post('pemeriksaan_fisik_4') !== '' ? safe_post('pemeriksaan_fisik_4') : null,
                'pemeriksaan_fisik_5' => safe_post('pemeriksaan_fisik_5') !== '' ? safe_post('pemeriksaan_fisik_5') : null,
				'pemeriksaan_fisik_6' => safe_post('pemeriksaan_fisik_6') !== '' ? safe_post('pemeriksaan_fisik_6') : null,
				'pemeriksaan_fisik_7' => safe_post('pemeriksaan_fisik_7') !== '' ? safe_post('pemeriksaan_fisik_7') : null,
            ]),

            'status_ekom' => json_encode([
                'status_ekom_1' => safe_post('status_ekom_1') !== '' ? safe_post('status_ekom_1') : null,
				'status_ekom_1' => safe_post('status_ekom_1') !== '' ? safe_post('status_ekom_1') : null,
				'status_ekom_3' => safe_post('status_ekom_3') !== '' ? safe_post('status_ekom_3') : null,
				'status_ekom_4' => safe_post('status_ekom_4') !== '' ? safe_post('status_ekom_4') : null,
                'status_ekom_5' => safe_post('status_ekom_5') !== '' ? safe_post('status_ekom_5') : null,
				'status_ekom_6' => safe_post('status_ekom_6') !== '' ? safe_post('status_ekom_6') : null,
            ]),

            'riwayat_kelahiran' => json_encode([
                'riwayat_kelahiran_1' => safe_post('riwayat_kelahiran_1') !== '' ? safe_post('riwayat_kelahiran_1') : null,
				'riwayat_kelahiran_2' => safe_post('riwayat_kelahiran_2') !== '' ? safe_post('riwayat_kelahiran_2') : null,
				'riwayat_kelahiran_3' => safe_post('riwayat_kelahiran_3') !== '' ? safe_post('riwayat_kelahiran_3') : null,
				'riwayat_kelahiran_4' => safe_post('riwayat_kelahiran_4') !== '' ? safe_post('riwayat_kelahiran_4') : null,
                'riwayat_kelahiran_5' => safe_post('riwayat_kelahiran_5') !== '' ? safe_post('riwayat_kelahiran_5') : null,
				'riwayat_kelahiran_6' => safe_post('riwayat_kelahiran_6') !== '' ? safe_post('riwayat_kelahiran_6') : null,
				'riwayat_kelahiran_7' => safe_post('riwayat_kelahiran_7') !== '' ? safe_post('riwayat_kelahiran_7') : null,
				'riwayat_kelahiran_7' => safe_post('riwayat_kelahiran_7') !== '' ? safe_post('riwayat_kelahiran_7') : null,
                'riwayat_kelahiran_7' => safe_post('riwayat_kelahiran_7') !== '' ? safe_post('riwayat_kelahiran_7') : null,
                'riwayat_kelahiran_7' => safe_post('riwayat_kelahiran_7') !== '' ? safe_post('riwayat_kelahiran_7') : null,
                'riwayat_kelahiran_11' => safe_post('riwayat_kelahiran_11') !== '' ? safe_post('riwayat_kelahiran_11') : null,
                'riwayat_kelahiran_11' => safe_post('riwayat_kelahiran_11') !== '' ? safe_post('riwayat_kelahiran_11') : null,
                'riwayat_kelahiran_13' => safe_post('riwayat_kelahiran_13') !== '' ? safe_post('riwayat_kelahiran_13') : null,
                'riwayat_kelahiran_13' => safe_post('riwayat_kelahiran_13') !== '' ? safe_post('riwayat_kelahiran_13') : null,
            ]),

            'riwayat_imunisasi' => json_encode([
                'riwayat_imunisasi_1' => safe_post('riwayat_imunisasi_1') !== '' ? safe_post('riwayat_imunisasi_1') : null,
				'riwayat_imunisasi_2' => safe_post('riwayat_imunisasi_2') !== '' ? safe_post('riwayat_imunisasi_2') : null,
				'riwayat_imunisasi_3' => safe_post('riwayat_imunisasi_3') !== '' ? safe_post('riwayat_imunisasi_3') : null,
				'riwayat_imunisasi_4' => safe_post('riwayat_imunisasi_4') !== '' ? safe_post('riwayat_imunisasi_4') : null,
                'riwayat_imunisasi_5' => safe_post('riwayat_imunisasi_5') !== '' ? safe_post('riwayat_imunisasi_5') : null,
				'riwayat_imunisasi_6' => safe_post('riwayat_imunisasi_6') !== '' ? safe_post('riwayat_imunisasi_6') : null,
				'riwayat_imunisasi_7' => safe_post('riwayat_imunisasi_7') !== '' ? safe_post('riwayat_imunisasi_7') : null,
				'riwayat_imunisasi_8' => safe_post('riwayat_imunisasi_8') !== '' ? safe_post('riwayat_imunisasi_8') : null,
                'riwayat_imunisasi_9' => safe_post('riwayat_imunisasi_9') !== '' ? safe_post('riwayat_imunisasi_9') : null,
            ]),

            'riwayat_tumbuh' => json_encode([
                'riwayat_tumbuh_1' => safe_post('riwayat_tumbuh_1') !== '' ? safe_post('riwayat_tumbuh_1') : null,
				'riwayat_tumbuh_2' => safe_post('riwayat_tumbuh_2') !== '' ? safe_post('riwayat_tumbuh_2') : null,
				'riwayat_tumbuh_3' => safe_post('riwayat_tumbuh_3') !== '' ? safe_post('riwayat_tumbuh_3') : null,
				'riwayat_tumbuh_4' => safe_post('riwayat_tumbuh_4') !== '' ? safe_post('riwayat_tumbuh_4') : null,
                'riwayat_tumbuh_5' => safe_post('riwayat_tumbuh_5') !== '' ? safe_post('riwayat_tumbuh_5') : null,
				'riwayat_tumbuh_6' => safe_post('riwayat_tumbuh_6') !== '' ? safe_post('riwayat_tumbuh_6') : null,
				'riwayat_tumbuh_7' => safe_post('riwayat_tumbuh_7') !== '' ? safe_post('riwayat_tumbuh_7') : null,
				'riwayat_tumbuh_8' => safe_post('riwayat_tumbuh_8') !== '' ? safe_post('riwayat_tumbuh_8') : null,
                'riwayat_tumbuh_9' => safe_post('riwayat_tumbuh_9') !== '' ? safe_post('riwayat_tumbuh_9') : null,
                'riwayat_tumbuh_10' => safe_post('riwayat_tumbuh_10') !== '' ? safe_post('riwayat_tumbuh_10') : null,
                'riwayat_tumbuh_11' => safe_post('riwayat_tumbuh_11') !== '' ? safe_post('riwayat_tumbuh_11') : null,
                'riwayat_tumbuh_12' => safe_post('riwayat_tumbuh_12') !== '' ? safe_post('riwayat_tumbuh_12') : null,
                'riwayat_tumbuh_13' => safe_post('riwayat_tumbuh_13') !== '' ? safe_post('riwayat_tumbuh_13') : null,
                'riwayat_tumbuh_14' => safe_post('riwayat_tumbuh_14') !== '' ? safe_post('riwayat_tumbuh_14') : null,
                'riwayat_tumbuh_15' => safe_post('riwayat_tumbuh_15') !== '' ? safe_post('riwayat_tumbuh_15') : null,
                'riwayat_tumbuh_16' => safe_post('riwayat_tumbuh_16') !== '' ? safe_post('riwayat_tumbuh_16') : null,
            ]),

            'kebutuhan_komunikasi' => json_encode([
                'kebutuhan_komunikasi_1' => safe_post('kebutuhan_komunikasi_1') !== '' ? safe_post('kebutuhan_komunikasi_1') : null,
				'kebutuhan_komunikasi_2' => safe_post('kebutuhan_komunikasi_2') !== '' ? safe_post('kebutuhan_komunikasi_2') : null,
				'kebutuhan_komunikasi_3' => safe_post('kebutuhan_komunikasi_3') !== '' ? safe_post('kebutuhan_komunikasi_3') : null,
				'kebutuhan_komunikasi_4' => safe_post('kebutuhan_komunikasi_4') !== '' ? safe_post('kebutuhan_komunikasi_4') : null,
                'kebutuhan_komunikasi_4' => safe_post('kebutuhan_komunikasi_4') !== '' ? safe_post('kebutuhan_komunikasi_4') : null,
				'kebutuhan_komunikasi_6' => safe_post('kebutuhan_komunikasi_6') !== '' ? safe_post('kebutuhan_komunikasi_6') : null,
				'kebutuhan_komunikasi_7' => safe_post('kebutuhan_komunikasi_7') !== '' ? safe_post('kebutuhan_komunikasi_7') : null,
				'kebutuhan_komunikasi_7' => safe_post('kebutuhan_komunikasi_7') !== '' ? safe_post('kebutuhan_komunikasi_7') : null,
                'kebutuhan_komunikasi_9' => safe_post('kebutuhan_komunikasi_9') !== '' ? safe_post('kebutuhan_komunikasi_9') : null,
                'kebutuhan_komunikasi_9' => safe_post('kebutuhan_komunikasi_9') !== '' ? safe_post('kebutuhan_komunikasi_9') : null,
                'kebutuhan_komunikasi_11' => safe_post('kebutuhan_komunikasi_11') !== '' ? safe_post('kebutuhan_komunikasi_11') : null,
                'kebutuhan_komunikasi_12' => safe_post('kebutuhan_komunikasi_12') !== '' ? safe_post('kebutuhan_komunikasi_12') : null,
                'kebutuhan_komunikasi_13' => safe_post('kebutuhan_komunikasi_13') !== '' ? safe_post('kebutuhan_komunikasi_13') : null,
                'kebutuhan_komunikasi_14' => safe_post('kebutuhan_komunikasi_14') !== '' ? safe_post('kebutuhan_komunikasi_14') : null,
                'kebutuhan_komunikasi_15' => safe_post('kebutuhan_komunikasi_15') !== '' ? safe_post('kebutuhan_komunikasi_15') : null,
                'kebutuhan_komunikasi_16' => safe_post('kebutuhan_komunikasi_16') !== '' ? safe_post('kebutuhan_komunikasi_16') : null,
            ]),

            'pengkajian_spiritual' => json_encode([
                'pengkajian_spiritual_1' => safe_post('pengkajian_spiritual_1') !== '' ? safe_post('pengkajian_spiritual_1') : null,
				'pengkajian_spiritual_2' => safe_post('pengkajian_spiritual_2') !== '' ? safe_post('pengkajian_spiritual_2') : null,
				'pengkajian_spiritual_3' => safe_post('pengkajian_spiritual_3') !== '' ? safe_post('pengkajian_spiritual_3') : null,
				'pengkajian_spiritual_4' => safe_post('pengkajian_spiritual_4') !== '' ? safe_post('pengkajian_spiritual_4') : null,
                'pengkajian_spiritual_5' => safe_post('pengkajian_spiritual_5') !== '' ? safe_post('pengkajian_spiritual_5') : null,
				'pengkajian_spiritual_6' => safe_post('pengkajian_spiritual_6') !== '' ? safe_post('pengkajian_spiritual_6') : null,
				'pengkajian_spiritual_7' => safe_post('pengkajian_spiritual_7') !== '' ? safe_post('pengkajian_spiritual_7') : null,
				'pengkajian_spiritual_8' => safe_post('pengkajian_spiritual_8') !== '' ? safe_post('pengkajian_spiritual_8') : null,
                'pengkajian_spiritual_9' => safe_post('pengkajian_spiritual_9') !== '' ? safe_post('pengkajian_spiritual_9') : null,
                'pengkajian_spiritual_10' => safe_post('pengkajian_spiritual_10') !== '' ? safe_post('pengkajian_spiritual_10') : null,
                'pengkajian_spiritual_11' => safe_post('pengkajian_spiritual_11') !== '' ? safe_post('pengkajian_spiritual_11') : null,
            ]),

            'skrining_gizi_1' => (safe_post('skrining_gizi_1') !== '' ? safe_post('skrining_gizi_1') : NULL),
            'skrining_gizi_3' => (safe_post('skrining_gizi_3') !== '' ? safe_post('skrining_gizi_3') : NULL),
            'skrining_gizi_5' => (safe_post('skrining_gizi_5') !== '' ? safe_post('skrining_gizi_5') : NULL),
            'skrining_gizi_7' => (safe_post('skrining_gizi_7') !== '' ? safe_post('skrining_gizi_7') : NULL),
            'jumlah_skor_anak' => (safe_post('jumlah_skor_anak') !== '' ? safe_post('jumlah_skor_anak') : NULL),

            'neonatust' => json_encode([
                'menangist' => safe_post('menangist') !== '' ? safe_post('menangist') : null,
                'spot' => safe_post('spot') !== '' ? safe_post('spot') : null,
                'vitalt' => safe_post('vitalt') !== '' ? safe_post('vitalt') : null,
                'wajaht' => safe_post('wajaht') !== '' ? safe_post('wajaht') : null,
                'tidurt' => safe_post('tidurt') !== '' ? safe_post('tidurt') : null,
                'total_neonatust' => safe_post('total_neonatust') !== '' ? safe_post('total_neonatust') : null,
            ]),

            'ptnt_keterangan' => json_encode([
                'ptnt_keterangan_1' => safe_post('ptnt_keterangan_1') !== '' ? safe_post('ptnt_keterangan_1') : null,
				'ptnt_keterangan_1' => safe_post('ptnt_keterangan_1') !== '' ? safe_post('ptnt_keterangan_1') : null,
				'ptnt_keterangan_1' => safe_post('ptnt_keterangan_1') !== '' ? safe_post('ptnt_keterangan_1') : null,
				'ptnt_keterangan_1' => safe_post('ptnt_keterangan_1') !== '' ? safe_post('ptnt_keterangan_1') : null,
            ]),

            'sk_nyeri' => json_encode([
                'sk_nyeri_1' => safe_post('sk_nyeri_1') !== '' ? safe_post('sk_nyeri_1') : null,
				'sk_nyeri_2' => safe_post('sk_nyeri_2') !== '' ? safe_post('sk_nyeri_2') : null,
				'sk_nyeri_3' => safe_post('sk_nyeri_3') !== '' ? safe_post('sk_nyeri_3') : null,
				'sk_nyeri_4' => safe_post('sk_nyeri_4') !== '' ? safe_post('sk_nyeri_4') : null,
                'sk_nyeri_5' => safe_post('sk_nyeri_5') !== '' ? safe_post('sk_nyeri_5') : null,
				'sk_nyeri_6' => safe_post('sk_nyeri_6') !== '' ? safe_post('sk_nyeri_6') : null,
            ]),

            'keterangan_anak' => json_encode([
                'keterangan_anak_1' => safe_post('keterangan_anak_1') !== '' ? safe_post('keterangan_anak_1') : null,
				'keterangan_anak_1' => safe_post('keterangan_anak_1') !== '' ? safe_post('keterangan_anak_1') : null,
				'keterangan_anak_1' => safe_post('keterangan_anak_1') !== '' ? safe_post('keterangan_anak_1') : null,
            ]),

            'nyeri_hilang_anak' => json_encode([
                'nyeri_hilang_anak_1' => safe_post('nyeri_hilang_anak_1') !== '' ? safe_post('nyeri_hilang_anak_1') : null,
				'nyeri_hilang_anak_2' => safe_post('nyeri_hilang_anak_2') !== '' ? safe_post('nyeri_hilang_anak_2') : null,
				'nyeri_hilang_anak_3' => safe_post('nyeri_hilang_anak_3') !== '' ? safe_post('nyeri_hilang_anak_3') : null,
				'nyeri_hilang_anak_4' => safe_post('nyeri_hilang_anak_4') !== '' ? safe_post('nyeri_hilang_anak_4') : null,
                'nyeri_hilang_anak_5' => safe_post('nyeri_hilang_anak_5') !== '' ? safe_post('nyeri_hilang_anak_5') : null,
				'nyeri_hilang_anak_6' => safe_post('nyeri_hilang_anak_6') !== '' ? safe_post('nyeri_hilang_anak_6') : null,
            ]),

            'wajah_anak' => (safe_post('wajah_anak_1') !== '' ? safe_post('wajah_anak_1') : NULL),
            'kaki_anak' => (safe_post('kaki_anak_1') !== '' ? safe_post('kaki_anak_1') : NULL),
            'aktifitas_anak' => (safe_post('aktifitas_anak_1') !== '' ? safe_post('aktifitas_anak_1') : NULL),
            'menangis_anak' => (safe_post('menangis_anak_1') !== '' ? safe_post('menangis_anak_1') : NULL),
            'bicara_anak' => (safe_post('bicara_anak_1') !== '' ? safe_post('bicara_anak_1') : NULL),
            'jumlah_total_anak' => (safe_post('jumlah_total_anak') !== '' ? safe_post('jumlah_total_anak') : NULL),

            'cidera_anak' => json_encode([
                'cidera_anak_1' => safe_post('cidera_anak_1') !== '' ? safe_post('cidera_anak_1') : null,
				'cidera_anak_1' => safe_post('cidera_anak_1') !== '' ? safe_post('cidera_anak_1') : null,
				'cidera_anak_3' => safe_post('cidera_anak_3') !== '' ? safe_post('cidera_anak_3') : null,
				'cidera_anak_3' => safe_post('cidera_anak_3') !== '' ? safe_post('cidera_anak_3') : null,
                'cidera_anak_5' => safe_post('cidera_anak_5') !== '' ? safe_post('cidera_anak_5') : null,
				'cidera_anak_5' => safe_post('cidera_anak_5') !== '' ? safe_post('cidera_anak_5') : null,
                'cidera_anak_5' => safe_post('cidera_anak_5') !== '' ? safe_post('cidera_anak_5') : null,
            ]),

            'status_fung_anak' => json_encode([
                'status_fung_anak_1' => safe_post('status_fung_anak_1') !== '' ? safe_post('status_fung_anak_1') : null,
				'status_fung_anak_2' => safe_post('status_fung_anak_2') !== '' ? safe_post('status_fung_anak_2') : null,
				'status_fung_anak_3' => safe_post('status_fung_anak_3') !== '' ? safe_post('status_fung_anak_3') : null,
				'status_fung_anak_4' => safe_post('status_fung_anak_4') !== '' ? safe_post('status_fung_anak_4') : null,
                'status_fung_anak_5' => safe_post('status_fung_anak_5') !== '' ? safe_post('status_fung_anak_5') : null,
            ]),

            'masalah_kep_anak' => json_encode([
                'masalah_kep_anak_1' => safe_post('masalah_kep_anak_1') !== '' ? safe_post('masalah_kep_anak_1') : null,
				'masalah_kep_anak_2' => safe_post('masalah_kep_anak_2') !== '' ? safe_post('masalah_kep_anak_2') : null,
				'masalah_kep_anak_3' => safe_post('masalah_kep_anak_3') !== '' ? safe_post('masalah_kep_anak_3') : null,
				'masalah_kep_anak_4' => safe_post('masalah_kep_anak_4') !== '' ? safe_post('masalah_kep_anak_4') : null,
                'masalah_kep_anak_5' => safe_post('masalah_kep_anak_5') !== '' ? safe_post('masalah_kep_anak_5') : null,
				'masalah_kep_anak_6' => safe_post('masalah_kep_anak_6') !== '' ? safe_post('masalah_kep_anak_6') : null,
				'masalah_kep_anak_7' => safe_post('masalah_kep_anak_7') !== '' ? safe_post('masalah_kep_anak_7') : null,
				'masalah_kep_anak_8' => safe_post('masalah_kep_anak_8') !== '' ? safe_post('masalah_kep_anak_8') : null,
                'masalah_kep_anak_9' => safe_post('masalah_kep_anak_9') !== '' ? safe_post('masalah_kep_anak_9') : null,
                'masalah_kep_anak_10' => safe_post('masalah_kep_anak_10') !== '' ? safe_post('masalah_kep_anak_10') : null,
                'masalah_kep_anak_11' => safe_post('masalah_kep_anak_11') !== '' ? safe_post('masalah_kep_anak_11') : null,
                'masalah_kep_anak_12' => safe_post('masalah_kep_anak_12') !== '' ? safe_post('masalah_kep_anak_12') : null,
                'masalah_kep_anak_13' => safe_post('masalah_kep_anak_13') !== '' ? safe_post('masalah_kep_anak_13') : null,
                'masalah_kep_anak_14' => safe_post('masalah_kep_anak_14') !== '' ? safe_post('masalah_kep_anak_14') : null,
                'masalah_kep_anak_15' => safe_post('masalah_kep_anak_15') !== '' ? safe_post('masalah_kep_anak_15') : null,
                'masalah_kep_anak_16' => safe_post('masalah_kep_anak_16') !== '' ? safe_post('masalah_kep_anak_16') : null,
                'masalah_kep_anak_17' => safe_post('masalah_kep_anak_17') !== '' ? safe_post('masalah_kep_anak_17') : null,
                'masalah_kep_anak_18' => safe_post('masalah_kep_anak_18') !== '' ? safe_post('masalah_kep_anak_18') : null,
                'masalah_kep_anak_19' => safe_post('masalah_kep_anak_19') !== '' ? safe_post('masalah_kep_anak_19') : null,
                'masalah_kep_anak_20' => safe_post('masalah_kep_anak_20') !== '' ? safe_post('masalah_kep_anak_20') : null,
            ]),
          
            'tanggal_jam_perawat_anak' => (safe_post('tanggal_jam_perawat_anak') !== '' ? datetime2mysql(safe_post('tanggal_jam_perawat_anak')) : NULL),
            'perawat_anak' => safe_post('perawat_anak') !== '' ? safe_post('perawat_anak') : NULL,
            'ttd_perawat_anak' => safe_post('ttd_perawat_anak') !== '' ? safe_post('ttd_perawat_anak') : NULL,

            'tanggal_jam_dokter_anak' => (safe_post('tanggal_jam_dokter_anak') !== '' ? datetime2mysql(safe_post('tanggal_jam_dokter_anak')) : NULL),
            'dokter_anak' => safe_post('dokter_anak') !== '' ? safe_post('dokter_anak') : NULL,
            'ttd_dokter_anak' => safe_post('ttd_dokter_anak') !== '' ? safe_post('ttd_dokter_anak') : NULL,    
        );		
        // ];

        // var_dump($layanan);die;
		$sign = $this->db->select('pakarj.tanggal_jam_perawat_anak, pakarj.ttd_perawat_anak, pakarj.tanggal_jam_dokter_anak, pakarj.ttd_dokter_anak,')
        ->from('sm_pengkajian_awal_keperawatan_anak_rawat_jalan as pakarj')     
        // ->where('pakarj.id_layanan_pendaftaran')
        ->where('pakarj.id_layanan_pendaftaran', $id_layanan_pendaftaran)
        ->get()
        ->row();   
		if (isset($sign)) :          			
			if ($sign->tanggal_jam_perawat_anak !== NULL) :
                $pengkajianAwalKeperawatanAnakRawatJalan['tanggal_jam_perawat_anak'] = $sign->tanggal_jam_perawat_anak;
            else :
                $pengkajianAwalKeperawatanAnakRawatJalan['tanggal_jam_perawat_anak'] = (safe_post('tanggal_jam_perawat_anak') !== '' ? datetime2mysql(safe_post('tanggal_jam_perawat_anak')) : NULL);
            endif;

            if ($sign->ttd_perawat_anak !== NULL) :
                $pengkajianAwalKeperawatanAnakRawatJalan['ttd_perawat_anak'] = $sign->ttd_perawat_anak;
            else :
                $pengkajianAwalKeperawatanAnakRawatJalan['ttd_perawat_anak'] = (safe_post('ttd_perawat_anak') !== '' ? safe_post('ttd_perawat_anak') : NULL);
            endif;

            if ($sign->tanggal_jam_dokter_anak !== NULL) :
                $pengkajianAwalKeperawatanAnakRawatJalan['tanggal_jam_dokter_anak'] = $sign->tanggal_jam_dokter_anak;
            else :
                $pengkajianAwalKeperawatanAnakRawatJalan['tanggal_jam_dokter_anak'] = (safe_post('tanggal_jam_dokter_anak') !== '' ? datetime2mysql(safe_post('tanggal_jam_dokter_anak')) : NULL);
            endif;

            if ($sign->ttd_dokter_anak !== NULL) :
                $pengkajianAwalKeperawatanAnakRawatJalan['ttd_dokter_anak'] = $sign->ttd_dokter_anak;
            else :
                $pengkajianAwalKeperawatanAnakRawatJalan['ttd_dokter_anak'] = (safe_post('ttd_dokter_anak') !== '' ? safe_post('ttd_dokter_anak') : NULL);
            endif;           
        endif;
        $this->pemeriksaan_poli->updatePengkajianAwalKeperawatanAnakRawatJalan($pengkajianAwalKeperawatanAnakRawatJalan, $id_pakarj);

		if (!empty($respon)) {

			$response = $respon;
		} else {

			$response = null;
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
            'id_pendaftaran' => ('id_pendaftaran'),
            'id_layanan_pendaftaran' => ('id_layanan_pendaftaran'),
			'respon' => $response,
		);

		$this->response($message, REST_Controller::HTTP_OK);
	}



	function get_kuota_poli_get()
    {
        $search = [
            'layanan'       => safe_get('layanan'),
            'tanggal_awal'  => safe_get('tanggal_awal'),
            'tanggal_akhir' => safe_get('tanggal_akhir'),
            'id_dokter'     => $this->session->userdata('id_tenaga_medis'),
            'id_profesi'    => $this->session->userdata('id_profesi_nadis'), // 10 = Dokter Spesialis
			'shifpoli'      => safe_get('shifpoli'),
        ];

        $data = $this->pemeriksaan_poli->kuotaPoliByLayanan($search);
        
        $response = array('status' => true, 'data' => $data);
        $this->response($response, REST_Controller::HTTP_OK);
    }




    
    // PKRJ + ubah
    function get_data_pengkajian_keperawatan_rajal_get(){
        if (!$this->get('id_layanan_pendaftaran')) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
        endif;
        $this->load->model('pendaftaran/Pendaftaran_model', 'm_pendaftaran'); 
        $this->load->model('pelayanan/Pelayanan_model', 'm_pelayanan');
        $data                               = $this->m_pendaftaran->getPendaftaranDetail($this->get('id', true), $this->get('id_layanan', true));
        $data['profil']                     = $this->m_pelayanan->getProfilPasien($data['pasien']->id_pasien);
        $data['pengkajian_awal_keperawatan_rajal']            = $this->pemeriksaan_poli->getPengkajianKeperawatanRajal($this->get('id', true));
        $data['pengkajian_awal_keperawatan_rajal_logs']       = $this->pemeriksaan_poli->getPengkajianKeperawatanRajalLogs($this->get('id', true));
        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK); // (200)
        endif;
    }
   
    // PKRJ LOGS 
    function get_history_logs_pengkajian_awal_keperawatan_rajal_get(){
        if (!$this->get('id_layanan_pendaftaran', true)) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
        endif;
        $id_layanan_pendaftaran = $this->get('id_layanan_pendaftaran', true);
        $data['pengkajian_awal_keperawatan_rajal_logs']       = $this->pemeriksaan_poli->getPengkajianKeperawatanRajalLogs($id_layanan_pendaftaran);
        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK); // (200)
        endif;
    }

    // PKRJ
    function simpan_data_pengkajian_keperawatan_rajal_post(){      

        if (safe_post('id_layanan_pendaftaran') === '') :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
        endif;

        $id_layanan_pendaftaran = safe_post('id_layanan_pendaftaran');
        $id_pendaftaran = safe_post('id_pendaftaran');;
        $id_pkrj = safe_post('id_pkrj');
        $id_users = safe_post('id_user');

        $pengkajianKeperawatanRajal = array(		
            'id_layanan_pendaftaran' => $id_layanan_pendaftaran,
            'id_pendaftaran' => $id_pendaftaran,
            'id_users' => $id_users,

            'keluhan_utama_pkrj' => (safe_post('keluhan_utama_pkrj') !== '' ? safe_post('keluhan_utama_pkrj') : NULL), 

            'rpk_pkrj' => json_encode([
                'rpk_pkrj_1' => safe_post('rpk_pkrj_1') !== '' ? safe_post('rpk_pkrj_1') : null,
				'rpk_pkrj_2' => safe_post('rpk_pkrj_2') !== '' ? safe_post('rpk_pkrj_2') : null,
				'rpk_pkrj_3' => safe_post('rpk_pkrj_3') !== '' ? safe_post('rpk_pkrj_3') : null,
				'rpk_pkrj_4' => safe_post('rpk_pkrj_4') !== '' ? safe_post('rpk_pkrj_4') : null,
                'rpk_pkrj_5' => safe_post('rpk_pkrj_5') !== '' ? safe_post('rpk_pkrj_5') : null,
				'rpk_pkrj_6' => safe_post('rpk_pkrj_6') !== '' ? safe_post('rpk_pkrj_6') : null,
				'rpk_pkrj_7' => safe_post('rpk_pkrj_7') !== '' ? safe_post('rpk_pkrj_7') : null,
				'rpk_pkrj_7' => safe_post('rpk_pkrj_7') !== '' ? safe_post('rpk_pkrj_7') : null,
                'rpk_pkrj_9' => safe_post('rpk_pkrj_9') !== '' ? safe_post('rpk_pkrj_9') : null,
                'rpk_pkrj_10' => safe_post('rpk_pkrj_10') !== '' ? safe_post('rpk_pkrj_10') : null,
                'rpk_pkrj_10' => safe_post('rpk_pkrj_10') !== '' ? safe_post('rpk_pkrj_10') : null,
                'rpk_pkrj_12' => safe_post('rpk_pkrj_12') !== '' ? safe_post('rpk_pkrj_12') : null,
                'rpk_pkrj_13' => safe_post('rpk_pkrj_13') !== '' ? safe_post('rpk_pkrj_13') : null,
                'rpk_pkrj_13' => safe_post('rpk_pkrj_13') !== '' ? safe_post('rpk_pkrj_13') : null,
                'rpk_pkrj_15' => safe_post('rpk_pkrj_15') !== '' ? safe_post('rpk_pkrj_15') : null,
                'rpk_pkrj_15' => safe_post('rpk_pkrj_15') !== '' ? safe_post('rpk_pkrj_15') : null,
                'rpk_pkrj_17' => safe_post('rpk_pkrj_17') !== '' ? safe_post('rpk_pkrj_17') : null,
                'rpk_pkrj_17' => safe_post('rpk_pkrj_17') !== '' ? safe_post('rpk_pkrj_17') : null,
                'rpk_pkrj_19' => safe_post('rpk_pkrj_19') !== '' ? safe_post('rpk_pkrj_19') : null,
                'rpk_pkrj_20' => safe_post('rpk_pkrj_20') !== '' ? safe_post('rpk_pkrj_20') : null,
                'rpk_pkrj_21' => safe_post('rpk_pkrj_21') !== '' ? safe_post('rpk_pkrj_21') : null,
                'rpk_pkrj_21' => safe_post('rpk_pkrj_21') !== '' ? safe_post('rpk_pkrj_21') : null,
                'rpk_pkrj_21' => safe_post('rpk_pkrj_21') !== '' ? safe_post('rpk_pkrj_21') : null,
                'rpk_pkrj_24' => safe_post('rpk_pkrj_24') !== '' ? safe_post('rpk_pkrj_24') : null,
            ]),

            'riwayat_pkrj' => json_encode([
                'riwayat_pkrj_1' => safe_post('riwayat_pkrj_1') !== '' ? safe_post('riwayat_pkrj_1') : null,
				'riwayat_pkrj_1' => safe_post('riwayat_pkrj_1') !== '' ? safe_post('riwayat_pkrj_1') : null,
				'riwayat_pkrj_3' => safe_post('riwayat_pkrj_3') !== '' ? safe_post('riwayat_pkrj_3') : null,
				'riwayat_pkrj_4' => safe_post('riwayat_pkrj_4') !== '' ? safe_post('riwayat_pkrj_4') : null,
                'riwayat_pkrj_5' => safe_post('riwayat_pkrj_5') !== '' ? safe_post('riwayat_pkrj_5') : null,
				'riwayat_pkrj_6' => safe_post('riwayat_pkrj_6') !== '' ? safe_post('riwayat_pkrj_6') : null,
				'riwayat_pkrj_7' => safe_post('riwayat_pkrj_7') !== '' ? safe_post('riwayat_pkrj_7') : null,
				'riwayat_pkrj_8' => safe_post('riwayat_pkrj_8') !== '' ? safe_post('riwayat_pkrj_8') : null,
                'riwayat_pkrj_9' => safe_post('riwayat_pkrj_9') !== '' ? safe_post('riwayat_pkrj_9') : null,
                'riwayat_pkrj_10' => safe_post('riwayat_pkrj_10') !== '' ? safe_post('riwayat_pkrj_10') : null,
                'riwayat_pkrj_11' => safe_post('riwayat_pkrj_11') !== '' ? safe_post('riwayat_pkrj_11') : null,
            ]),

            'status_pkrj' => json_encode([
                'status_pkrj_1' => safe_post('status_pkrj_1') !== '' ? safe_post('status_pkrj_1') : null,
				'status_pkrj_1' => safe_post('status_pkrj_1') !== '' ? safe_post('status_pkrj_1') : null,
				'status_pkrj_1' => safe_post('status_pkrj_1') !== '' ? safe_post('status_pkrj_1') : null,
				'status_pkrj_1' => safe_post('status_pkrj_1') !== '' ? safe_post('status_pkrj_1') : null,
                'status_pkrj_1' => safe_post('status_pkrj_1') !== '' ? safe_post('status_pkrj_1') : null,
				'status_pkrj_1' => safe_post('status_pkrj_1') !== '' ? safe_post('status_pkrj_1') : null,
				'status_pkrj_7' => safe_post('status_pkrj_7') !== '' ? safe_post('status_pkrj_7') : null,
				'status_pkrj_8' => safe_post('status_pkrj_8') !== '' ? safe_post('status_pkrj_8') : null,
                'status_pkrj_8' => safe_post('status_pkrj_8') !== '' ? safe_post('status_pkrj_8') : null,
                'status_pkrj_8' => safe_post('status_pkrj_8') !== '' ? safe_post('status_pkrj_8') : null,
                'status_pkrj_11' => safe_post('status_pkrj_11') !== '' ? safe_post('status_pkrj_11') : null,
                'status_pkrj_12' => safe_post('status_pkrj_12') !== '' ? safe_post('status_pkrj_12') : null,
                'status_pkrj_13' => safe_post('status_pkrj_13') !== '' ? safe_post('status_pkrj_13') : null,
            ]),
            
            'pemeriksaan_pkrj' => json_encode([
                'pemeriksaan_pkrj_1' => safe_post('pemeriksaan_pkrj_1') !== '' ? safe_post('pemeriksaan_pkrj_1') : null,
				'pemeriksaan_pkrj_2' => safe_post('pemeriksaan_pkrj_2') !== '' ? safe_post('pemeriksaan_pkrj_2') : null,
				'pemeriksaan_pkrj_3' => safe_post('pemeriksaan_pkrj_3') !== '' ? safe_post('pemeriksaan_pkrj_3') : null,
				'pemeriksaan_pkrj_4' => safe_post('pemeriksaan_pkrj_4') !== '' ? safe_post('pemeriksaan_pkrj_4') : null,
                'pemeriksaan_pkrj_5' => safe_post('pemeriksaan_pkrj_5') !== '' ? safe_post('pemeriksaan_pkrj_5') : null,
				'pemeriksaan_pkrj_6' => safe_post('pemeriksaan_pkrj_6') !== '' ? safe_post('pemeriksaan_pkrj_6') : null,
				'pemeriksaan_pkrj_7' => safe_post('pemeriksaan_pkrj_7') !== '' ? safe_post('pemeriksaan_pkrj_7') : null,
            ]),

            'pengkajian_pkrj' => json_encode([
                'pengkajian_pkrj_1' => safe_post('pengkajian_pkrj_1') !== '' ? safe_post('pengkajian_pkrj_1') : null,
				'pengkajian_pkrj_2' => safe_post('pengkajian_pkrj_2') !== '' ? safe_post('pengkajian_pkrj_2') : null,
				'pengkajian_pkrj_3' => safe_post('pengkajian_pkrj_3') !== '' ? safe_post('pengkajian_pkrj_3') : null,
				'pengkajian_pkrj_4' => safe_post('pengkajian_pkrj_4') !== '' ? safe_post('pengkajian_pkrj_4') : null,
                // 'pengkajian_pkrj_5' => safe_post('pengkajian_pkrj_5') !== '' ? safe_post('pengkajian_pkrj_5') : null,
				'pengkajian_pkrj_6' => safe_post('pengkajian_pkrj_6') !== '' ? safe_post('pengkajian_pkrj_6') : null,
				'pengkajian_pkrj_7' => safe_post('pengkajian_pkrj_7') !== '' ? safe_post('pengkajian_pkrj_7') : null,
				'pengkajian_pkrj_8' => safe_post('pengkajian_pkrj_8') !== '' ? safe_post('pengkajian_pkrj_8') : null,
                'pengkajian_pkrj_9' => safe_post('pengkajian_pkrj_9') !== '' ? safe_post('pengkajian_pkrj_9') : null,
                'pengkajian_pkrj_10' => safe_post('pengkajian_pkrj_10') !== '' ? safe_post('pengkajian_pkrj_10') : null,
                'pengkajian_pkrj_11' => safe_post('pengkajian_pkrj_11') !== '' ? safe_post('pengkajian_pkrj_11') : null,
            ]),

            'status_fung_pkrj' => json_encode([
                'status_fung_pkrj_1' => safe_post('status_fung_pkrj_1') !== '' ? safe_post('status_fung_pkrj_1') : null,
				'status_fung_pkrj_2' => safe_post('status_fung_pkrj_2') !== '' ? safe_post('status_fung_pkrj_2') : null,
				'status_fung_pkrj_3' => safe_post('status_fung_pkrj_3') !== '' ? safe_post('status_fung_pkrj_3') : null,
				'status_fung_pkrj_4' => safe_post('status_fung_pkrj_4') !== '' ? safe_post('status_fung_pkrj_4') : null,
                'status_fung_pkrj_5' => safe_post('status_fung_pkrj_5') !== '' ? safe_post('status_fung_pkrj_5') : null,
            ]),

            'cidera_pkrj' => json_encode([
                'cidera_pkrj_1' => safe_post('cidera_pkrj_1') !== '' ? safe_post('cidera_pkrj_1') : null,
				'cidera_pkrj_1' => safe_post('cidera_pkrj_1') !== '' ? safe_post('cidera_pkrj_1') : null,
				'cidera_pkrj_3' => safe_post('cidera_pkrj_3') !== '' ? safe_post('cidera_pkrj_3') : null,
				'cidera_pkrj_3' => safe_post('cidera_pkrj_3') !== '' ? safe_post('cidera_pkrj_3') : null,
                'cidera_pkrj_5' => safe_post('cidera_pkrj_5') !== '' ? safe_post('cidera_pkrj_5') : null,
				'cidera_pkrj_5' => safe_post('cidera_pkrj_5') !== '' ? safe_post('cidera_pkrj_5') : null,
				'cidera_pkrj_5' => safe_post('cidera_pkrj_5') !== '' ? safe_post('cidera_pkrj_5') : null,
            ]),

            'sn_penurunan_bb_pkrj' => (safe_post('sn_penurunan_bb_pkrj') !== '' ? safe_post('sn_penurunan_bb_pkrj') : NULL),
            'sn_penurunan_bb_on_pkrj' => (safe_post('sn_penurunan_bb_on_pkrj') !== '' ? safe_post('sn_penurunan_bb_on_pkrj') : NULL),
            'sn_asupan_makan_pkrj' => (safe_post('sn_asupan_makan_pkrj') !== '' ? safe_post('sn_asupan_makan_pkrj') : NULL),
            'sn_total_pkrj' => (safe_post('sn_total_pkrj') !== '' ? safe_post('sn_total_pkrj') : NULL),

            'keterangan_pkrj' => json_encode([
                'keterangan_pkrj_1' => safe_post('keterangan_pkrj_1') !== '' ? safe_post('keterangan_pkrj_1') : null,
				'keterangan_pkrj_1' => safe_post('keterangan_pkrj_1') !== '' ? safe_post('keterangan_pkrj_1') : null,
				'keterangan_pkrj_1' => safe_post('keterangan_pkrj_1') !== '' ? safe_post('keterangan_pkrj_1') : null,
				'keterangan_pkrj_1' => safe_post('keterangan_pkrj_1') !== '' ? safe_post('keterangan_pkrj_1') : null,
                'keterangan_pkrj_5' => safe_post('keterangan_pkrj_5') !== '' ? safe_post('keterangan_pkrj_5') : null,
				'keterangan_pkrj_6' => safe_post('keterangan_pkrj_6') !== '' ? safe_post('keterangan_pkrj_6') : null,
				'keterangan_pkrj_7' => safe_post('keterangan_pkrj_7') !== '' ? safe_post('keterangan_pkrj_7') : null,
				'keterangan_pkrj_8' => safe_post('keterangan_pkrj_8') !== '' ? safe_post('keterangan_pkrj_8') : null,
                'keterangan_pkrj_9' => safe_post('keterangan_pkrj_9') !== '' ? safe_post('keterangan_pkrj_9') : null,
                'keterangan_pkrj_10' => safe_post('keterangan_pkrj_10') !== '' ? safe_post('keterangan_pkrj_10') : null,
                'keterangan_pkrj_11' => safe_post('keterangan_pkrj_11') !== '' ? safe_post('keterangan_pkrj_11') : null,
                'keterangan_pkrj_12' => safe_post('keterangan_pkrj_12') !== '' ? safe_post('keterangan_pkrj_12') : null,
                'keterangan_pkrj_13' => safe_post('keterangan_pkrj_13') !== '' ? safe_post('keterangan_pkrj_13') : null,
                'keterangan_pkrj_14' => safe_post('keterangan_pkrj_14') !== '' ? safe_post('keterangan_pkrj_14') : null,
                'keterangan_pkrj_15' => safe_post('keterangan_pkrj_15') !== '' ? safe_post('keterangan_pkrj_15') : null,
                'keterangan_pkrj_16' => safe_post('keterangan_pkrj_16') !== '' ? safe_post('keterangan_pkrj_16') : null,
                'keterangan_pkrj_17' => safe_post('keterangan_pkrj_17') !== '' ? safe_post('keterangan_pkrj_17') : null,
                'keterangan_pkrj_18' => safe_post('keterangan_pkrj_18') !== '' ? safe_post('keterangan_pkrj_18') : null,
                'keterangan_pkrj_18' => safe_post('keterangan_pkrj_18') !== '' ? safe_post('keterangan_pkrj_18') : null,
                'keterangan_pkrj_20' => safe_post('keterangan_pkrj_20') !== '' ? safe_post('keterangan_pkrj_20') : null,
            ]),
          
            'masalah_kep_pkrj' => json_encode([
                'masalah_kep_pkrj_1' => safe_post('masalah_kep_pkrj_1') !== '' ? safe_post('masalah_kep_pkrj_1') : null,
				'masalah_kep_pkrj_2' => safe_post('masalah_kep_pkrj_2') !== '' ? safe_post('masalah_kep_pkrj_2') : null,
				'masalah_kep_pkrj_3' => safe_post('masalah_kep_pkrj_3') !== '' ? safe_post('masalah_kep_pkrj_3') : null,
				'masalah_kep_pkrj_4' => safe_post('masalah_kep_pkrj_4') !== '' ? safe_post('masalah_kep_pkrj_4') : null,
                'masalah_kep_pkrj_5' => safe_post('masalah_kep_pkrj_5') !== '' ? safe_post('masalah_kep_pkrj_5') : null,
				'masalah_kep_pkrj_6' => safe_post('masalah_kep_pkrj_6') !== '' ? safe_post('masalah_kep_pkrj_6') : null,
				'masalah_kep_pkrj_7' => safe_post('masalah_kep_pkrj_7') !== '' ? safe_post('masalah_kep_pkrj_7') : null,
				'masalah_kep_pkrj_8' => safe_post('masalah_kep_pkrj_8') !== '' ? safe_post('masalah_kep_pkrj_8') : null,
                'masalah_kep_pkrj_9' => safe_post('masalah_kep_pkrj_9') !== '' ? safe_post('masalah_kep_pkrj_9') : null,
                'masalah_kep_pkrj_10' => safe_post('masalah_kep_pkrj_10') !== '' ? safe_post('masalah_kep_pkrj_10') : null,
                'masalah_kep_pkrj_11' => safe_post('masalah_kep_pkrj_11') !== '' ? safe_post('masalah_kep_pkrj_11') : null,
                'masalah_kep_pkrj_12' => safe_post('masalah_kep_pkrj_12') !== '' ? safe_post('masalah_kep_pkrj_12') : null,
                'masalah_kep_pkrj_13' => safe_post('masalah_kep_pkrj_13') !== '' ? safe_post('masalah_kep_pkrj_13') : null,
                'masalah_kep_pkrj_14' => safe_post('masalah_kep_pkrj_14') !== '' ? safe_post('masalah_kep_pkrj_14') : null,
                'masalah_kep_pkrj_15' => safe_post('masalah_kep_pkrj_15') !== '' ? safe_post('masalah_kep_pkrj_15') : null,
                'masalah_kep_pkrj_16' => safe_post('masalah_kep_pkrj_16') !== '' ? safe_post('masalah_kep_pkrj_16') : null,
                'masalah_kep_pkrj_17' => safe_post('masalah_kep_pkrj_17') !== '' ? safe_post('masalah_kep_pkrj_17') : null,
                'masalah_kep_pkrj_18' => safe_post('masalah_kep_pkrj_18') !== '' ? safe_post('masalah_kep_pkrj_18') : null,
                'masalah_kep_pkrj_19' => safe_post('masalah_kep_pkrj_19') !== '' ? safe_post('masalah_kep_pkrj_19') : null,
                'masalah_kep_pkrj_20' => safe_post('masalah_kep_pkrj_20') !== '' ? safe_post('masalah_kep_pkrj_20') : null,
                'masalah_kep_pkrj_21' => safe_post('masalah_kep_pkrj_21') !== '' ? safe_post('masalah_kep_pkrj_21') : null,
                'masalah_kep_pkrj_22' => safe_post('masalah_kep_pkrj_22') !== '' ? safe_post('masalah_kep_pkrj_22') : null,
                'masalah_kep_pkrj_23' => safe_post('masalah_kep_pkrj_23') !== '' ? safe_post('masalah_kep_pkrj_23') : null,
                'masalah_kep_pkrj_24' => safe_post('masalah_kep_pkrj_24') !== '' ? safe_post('masalah_kep_pkrj_24') : null,
                'masalah_kep_pkrj_25' => safe_post('masalah_kep_pkrj_25') !== '' ? safe_post('masalah_kep_pkrj_25') : null,
                'masalah_kep_pkrj_26' => safe_post('masalah_kep_pkrj_26') !== '' ? safe_post('masalah_kep_pkrj_26') : null,
                'masalah_kep_pkrj_27' => safe_post('masalah_kep_pkrj_27') !== '' ? safe_post('masalah_kep_pkrj_27') : null,
                'masalah_kep_pkrj_28' => safe_post('masalah_kep_pkrj_28') !== '' ? safe_post('masalah_kep_pkrj_28') : null,
                'masalah_kep_pkrj_29' => safe_post('masalah_kep_pkrj_29') !== '' ? safe_post('masalah_kep_pkrj_29') : null,
                'masalah_kep_pkrj_30' => safe_post('masalah_kep_pkrj_30') !== '' ? safe_post('masalah_kep_pkrj_30') : null,
            ]),
          
            'tanggal_jam_perawat_pkrj' => (safe_post('tanggal_jam_perawat_pkrj') !== '' ? datetime2mysql(safe_post('tanggal_jam_perawat_pkrj')) : NULL),
            'perawat_pkrj' => safe_post('perawat_pkrj') !== '' ? safe_post('perawat_pkrj') : NULL,
            'ttd_perawat_pkrj' => safe_post('ttd_perawat_pkrj') !== '' ? safe_post('ttd_perawat_pkrj') : NULL,

            'tanggal_jam_dokter_pkrj' => (safe_post('tanggal_jam_dokter_pkrj') !== '' ? datetime2mysql(safe_post('tanggal_jam_dokter_pkrj')) : NULL),
            'dokter_pkrj' => safe_post('dokter_pkrj') !== '' ? safe_post('dokter_pkrj') : NULL,
            'ttd_dokter_pkrj' => safe_post('ttd_dokter_pkrj') !== '' ? safe_post('ttd_dokter_pkrj') : NULL,    
        );		
        // var_dump($layanan);die;
		$sign = $this->db->select('pkrj.tanggal_jam_perawat_pkrj, pkrj.ttd_perawat_pkrj, pkrj.tanggal_jam_dokter_pkrj, pkrj.ttd_dokter_pkrj,')
        ->from('sm_pengkajian_keperawatan_rajal as pkrj')     
        ->where('pkrj.id_layanan_pendaftaran', $id_layanan_pendaftaran)
        ->get()
        ->row();   
		if (isset($sign)) :          			
			if ($sign->tanggal_jam_perawat_pkrj !== NULL) :
                $pengkajianKeperawatanRajal['tanggal_jam_perawat_pkrj'] = $sign->tanggal_jam_perawat_pkrj;
            else :
                $pengkajianKeperawatanRajal['tanggal_jam_perawat_pkrj'] = (safe_post('tanggal_jam_perawat_pkrj') !== '' ? datetime2mysql(safe_post('tanggal_jam_perawat_pkrj')) : NULL);
            endif;

            if ($sign->ttd_perawat_pkrj !== NULL) :
                $pengkajianKeperawatanRajal['ttd_perawat_pkrj'] = $sign->ttd_perawat_pkrj;
            else :
                $pengkajianKeperawatanRajal['ttd_perawat_pkrj'] = (safe_post('ttd_perawat_pkrj') !== '' ? safe_post('ttd_perawat_pkrj') : NULL);
            endif;

            if ($sign->tanggal_jam_dokter_pkrj !== NULL) :
                $pengkajianKeperawatanRajal['tanggal_jam_dokter_pkrj'] = $sign->tanggal_jam_dokter_pkrj;
            else :
                $pengkajianKeperawatanRajal['tanggal_jam_dokter_pkrj'] = (safe_post('tanggal_jam_dokter_pkrj') !== '' ? datetime2mysql(safe_post('tanggal_jam_dokter_pkrj')) : NULL);
            endif;

            if ($sign->ttd_dokter_pkrj !== NULL) :
                $pengkajianKeperawatanRajal['ttd_dokter_pkrj'] = $sign->ttd_dokter_pkrj;
            else :
                $pengkajianKeperawatanRajal['ttd_dokter_pkrj'] = (safe_post('ttd_dokter_pkrj') !== '' ? safe_post('ttd_dokter_pkrj') : NULL);
            endif;           
        endif;
        // $respon = $this->pemeriksaan_poli->updatepengkajianKeperawatanRajal($pengkajianKeperawatanRajal, $id_pkrj);
        $this->pemeriksaan_poli->updatepengkajianKeperawatanRajal($pengkajianKeperawatanRajal, $id_pkrj);

		if (!empty($respon)) {

			$response = $respon;
		} else {

			$response = null;
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
            'id_pendaftaran' => ('id_pendaftaran'),
            'id_layanan_pendaftaran' => ('id_layanan_pendaftaran'),
			'respon' => $response,
		);

		$this->response($message, REST_Controller::HTTP_OK);
	}

    // PRJODG + ubah
    function get_data_pengkajian_rajal_obstetri_ginekologi_get(){
        if (!$this->get('id_layanan_pendaftaran')) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
        endif;
        $this->load->model('pendaftaran/Pendaftaran_model', 'm_pendaftaran'); 
        $this->load->model('pelayanan/Pelayanan_model', 'm_pelayanan');
        $data                               = $this->m_pendaftaran->getPendaftaranDetail($this->get('id', true), $this->get('id_layanan', true));
        $data['profil']                     = $this->m_pelayanan->getProfilPasien($data['pasien']->id_pasien);
        $data['pengkajian_rajal_obstetri_ginekologi']            = $this->pemeriksaan_poli->getPengkajianRajalObstetriGinekologi($this->get('id', true));
        $data['pengkajian_rajal_obstetri_ginekologi_logs']       = $this->pemeriksaan_poli->getPengkajianRajalObstetriGinekologiLogs($this->get('id', true));
        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK); // (200)
        endif;
    }
    
    // PRJODG LOGS 
    function get_history_logs_pengkajian_rajal_obstetri_ginekologi_get(){
        if (!$this->get('id_layanan_pendaftaran', true)) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
        endif;
        $id_layanan_pendaftaran = $this->get('id_layanan_pendaftaran', true);
        $data['pengkajian_rajal_obstetri_ginekologi_logs']       = $this->pemeriksaan_poli->getPengkajianRajalObstetriGinekologiLogs($id_layanan_pendaftaran);
        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK); // (200)
        endif;
    }

    // PRJODG
    function simpan_data_pengkajian_rajal_obstetri_ginekologi_post(){      

        if (safe_post('id_layanan_pendaftaran') === '') :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
        endif;

        $id_layanan_pendaftaran = safe_post('id_layanan_pendaftaran');
        $id_pendaftaran = safe_post('id_pendaftaran');;
        $id_prjogd = safe_post('id_prjogd');
        $id_users = safe_post('id_user');

        $pengkajianRajalObstetriGinekologi = array(		
            'id_layanan_pendaftaran' => $id_layanan_pendaftaran,
            'id_pendaftaran' => $id_pendaftaran,
            'id_users' => $id_users,
            
            'informasi_pasien_prjogd' => json_encode([
                'informasi_pasien_prjogd_1' => safe_post('informasi_pasien_prjogd_1') !== '' ? safe_post('informasi_pasien_prjogd_1') : null,
                'informasi_pasien_prjogd_1' => safe_post('informasi_pasien_prjogd_1') !== '' ? safe_post('informasi_pasien_prjogd_1') : null,
                'informasi_pasien_prjogd_1' => safe_post('informasi_pasien_prjogd_1') !== '' ? safe_post('informasi_pasien_prjogd_1') : null,                
                'informasi_pasien_prjogd_4' => safe_post('informasi_pasien_prjogd_4') !== '' ? safe_post('informasi_pasien_prjogd_4') : null,         
            ]),

            'rujukan_prjogd' => json_encode([
                'rujukan_prjogd_1' => safe_post('rujukan_prjogd_1') !== '' ? safe_post('rujukan_prjogd_1') : null,
                'rujukan_prjogd_1' => safe_post('rujukan_prjogd_1') !== '' ? safe_post('rujukan_prjogd_1') : null,
                'rujukan_prjogd_3' => safe_post('rujukan_prjogd_3') !== '' ? safe_post('rujukan_prjogd_3') : null,                       
            ]),

            'diagnosa_rujukan_prjogd' => (safe_post('diagnosa_rujukan_prjogd') !== '' ? safe_post('diagnosa_rujukan_prjogd') : NULL), 
            'keluhan_utama_prjogd' => (safe_post('keluhan_utama_prjogd') !== '' ? safe_post('keluhan_utama_prjogd') : NULL),
            
            'rk_prjogd' => json_encode([
                'rk_prjogd_1' => safe_post('rk_prjogd_1') !== '' ? safe_post('rk_prjogd_1') : null,
				'rk_prjogd_2' => safe_post('rk_prjogd_2') !== '' ? safe_post('rk_prjogd_2') : null,
				'rk_prjogd_3' => safe_post('rk_prjogd_3') !== '' ? safe_post('rk_prjogd_3') : null,
				'rk_prjogd_4' => safe_post('rk_prjogd_4') !== '' ? safe_post('rk_prjogd_4') : null,
                'rk_prjogd_5' => safe_post('rk_prjogd_5') !== '' ? safe_post('rk_prjogd_5') : null,
				'rk_prjogd_6' => safe_post('rk_prjogd_6') !== '' ? safe_post('rk_prjogd_6') : null,
                'rk_prjogd_7' => safe_post('rk_prjogd_7') !== '' ? safe_post('rk_prjogd_7') : null,
				'rk_prjogd_8' => safe_post('rk_prjogd_8') !== '' ? safe_post('rk_prjogd_8') : null,
				'rk_prjogd_8' => safe_post('rk_prjogd_8') !== '' ? safe_post('rk_prjogd_8') : null,
				'rk_prjogd_10' => safe_post('rk_prjogd_10') !== '' ? safe_post('rk_prjogd_10') : null,
                'rk_prjogd_11' => safe_post('rk_prjogd_11') !== '' ? safe_post('rk_prjogd_11') : null,
				'rk_prjogd_12' => safe_post('rk_prjogd_12') !== '' ? safe_post('rk_prjogd_12') : null,
				'rk_prjogd_12' => safe_post('rk_prjogd_12') !== '' ? safe_post('rk_prjogd_12') : null,
				'rk_prjogd_14' => safe_post('rk_prjogd_14') !== '' ? safe_post('rk_prjogd_14') : null,
                'rk_prjogd_15' => safe_post('rk_prjogd_15') !== '' ? safe_post('rk_prjogd_15') : null,
				'rk_prjogd_16' => safe_post('rk_prjogd_16') !== '' ? safe_post('rk_prjogd_16') : null,
				'rk_prjogd_16' => safe_post('rk_prjogd_16') !== '' ? safe_post('rk_prjogd_16') : null,
                'rk_prjogd_18' => safe_post('rk_prjogd_18') !== '' ? safe_post('rk_prjogd_18') : null,
				'rk_prjogd_19' => safe_post('rk_prjogd_19') !== '' ? safe_post('rk_prjogd_19') : null,
				'rk_prjogd_19' => safe_post('rk_prjogd_19') !== '' ? safe_post('rk_prjogd_19') : null,
                'rk_prjogd_21' => safe_post('rk_prjogd_21') !== '' ? safe_post('rk_prjogd_21') : null,
				'rk_prjogd_21' => safe_post('rk_prjogd_21') !== '' ? safe_post('rk_prjogd_21') : null,
				'rk_prjogd_23' => safe_post('rk_prjogd_23') !== '' ? safe_post('rk_prjogd_23') : null,
                'rk_prjogd_24' => safe_post('rk_prjogd_24') !== '' ? safe_post('rk_prjogd_24') : null,
                'rk_prjogd_25' => safe_post('rk_prjogd_25') !== '' ? safe_post('rk_prjogd_25') : null,
				'rk_prjogd_25' => safe_post('rk_prjogd_25') !== '' ? safe_post('rk_prjogd_25') : null,
				'rk_prjogd_27' => safe_post('rk_prjogd_27') !== '' ? safe_post('rk_prjogd_27') : null,
                'rk_prjogd_28' => safe_post('rk_prjogd_28') !== '' ? safe_post('rk_prjogd_28') : null,
                'rk_prjogd_28' => safe_post('rk_prjogd_28') !== '' ? safe_post('rk_prjogd_28') : null,
				'rk_prjogd_28' => safe_post('rk_prjogd_28') !== '' ? safe_post('rk_prjogd_28') : null,
				'rk_prjogd_31' => safe_post('rk_prjogd_31') !== '' ? safe_post('rk_prjogd_31') : null,
                'rk_prjogd_32' => safe_post('rk_prjogd_32') !== '' ? safe_post('rk_prjogd_32') : null,
				'rk_prjogd_33' => safe_post('rk_prjogd_33') !== '' ? safe_post('rk_prjogd_33') : null,
				'rk_prjogd_34' => safe_post('rk_prjogd_34') !== '' ? safe_post('rk_prjogd_34') : null,
				'rk_prjogd_35' => safe_post('rk_prjogd_35') !== '' ? safe_post('rk_prjogd_35') : null,
                'rk_prjogd_36' => safe_post('rk_prjogd_36') !== '' ? safe_post('rk_prjogd_36') : null,
				'rk_prjogd_37' => safe_post('rk_prjogd_37') !== '' ? safe_post('rk_prjogd_37') : null,
                'rk_prjogd_38' => safe_post('rk_prjogd_38') !== '' ? safe_post('rk_prjogd_38') : null,
				'rk_prjogd_38' => safe_post('rk_prjogd_38') !== '' ? safe_post('rk_prjogd_38') : null,
				'rk_prjogd_40' => safe_post('rk_prjogd_40') !== '' ? safe_post('rk_prjogd_40') : null,
                'rk_prjogd_41' => safe_post('rk_prjogd_41') !== '' ? safe_post('rk_prjogd_41') : null,
				'rk_prjogd_41' => safe_post('rk_prjogd_41') !== '' ? safe_post('rk_prjogd_41') : null,
				'rk_prjogd_43' => safe_post('rk_prjogd_43') !== '' ? safe_post('rk_prjogd_43') : null,
                'rk_prjogd_41' => safe_post('rk_prjogd_41') !== '' ? safe_post('rk_prjogd_41') : null,
				'rk_prjogd_41' => safe_post('rk_prjogd_41') !== '' ? safe_post('rk_prjogd_41') : null,
                'rk_prjogd_46' => safe_post('rk_prjogd_46') !== '' ? safe_post('rk_prjogd_46') : null,
                'rk_prjogd_47' => safe_post('rk_prjogd_47') !== '' ? safe_post('rk_prjogd_47') : null,
                'rk_prjogd_48' => safe_post('rk_prjogd_48') !== '' ? safe_post('rk_prjogd_48') : null,
                'rk_prjogd_49' => safe_post('rk_prjogd_49') !== '' ? safe_post('rk_prjogd_49') : null,
                'rk_prjogd_50' => safe_post('rk_prjogd_50') !== '' ? safe_post('rk_prjogd_50') : null,
                'rk_prjogd_51' => safe_post('rk_prjogd_51') !== '' ? safe_post('rk_prjogd_51') : null,
                'rk_prjogd_52' => safe_post('rk_prjogd_52') !== '' ? safe_post('rk_prjogd_52') : null,
                'rk_prjogd_53' => safe_post('rk_prjogd_53') !== '' ? safe_post('rk_prjogd_53') : null,
                'rk_prjogd_54' => safe_post('rk_prjogd_54') !== '' ? safe_post('rk_prjogd_54') : null,
                'rk_prjogd_55' => safe_post('rk_prjogd_55') !== '' ? safe_post('rk_prjogd_55') : null,
                'rk_prjogd_56' => safe_post('rk_prjogd_56') !== '' ? safe_post('rk_prjogd_56') : null,
                'rk_prjogd_57' => safe_post('rk_prjogd_57') !== '' ? safe_post('rk_prjogd_57') : null,
                'rk_prjogd_58' => safe_post('rk_prjogd_58') !== '' ? safe_post('rk_prjogd_58') : null,
                'rk_prjogd_59' => safe_post('rk_prjogd_59') !== '' ? safe_post('rk_prjogd_59') : null,
                'rk_prjogd_60' => safe_post('rk_prjogd_60') !== '' ? safe_post('rk_prjogd_60') : null,
            ]),

            'tgl_partus_prjogd_1' => safe_post('tgl_partus_prjogd_1') !== '' ? date('Y-m-d', strtotime(str_replace('/', '-', safe_post('tgl_partus_prjogd_1')))) : NULL,
            'tgl_partus_prjogd_2' => safe_post('tgl_partus_prjogd_2') !== '' ? date('Y-m-d', strtotime(str_replace('/', '-', safe_post('tgl_partus_prjogd_2')))) : NULL,
            'tgl_partus_prjogd_3' => safe_post('tgl_partus_prjogd_3') !== '' ? date('Y-m-d', strtotime(str_replace('/', '-', safe_post('tgl_partus_prjogd_3')))) : NULL,
            'tgl_partus_prjogd_4' => safe_post('tgl_partus_prjogd_4') !== '' ? date('Y-m-d', strtotime(str_replace('/', '-', safe_post('tgl_partus_prjogd_4')))) : NULL,
            'tgl_partus_prjogd_5' => safe_post('tgl_partus_prjogd_5') !== '' ? date('Y-m-d', strtotime(str_replace('/', '-', safe_post('tgl_partus_prjogd_5')))) : NULL,
            'tgl_partus_prjogd_6' => safe_post('tgl_partus_prjogd_6') !== '' ? date('Y-m-d', strtotime(str_replace('/', '-', safe_post('tgl_partus_prjogd_6')))) : NULL,
            'tgl_partus_prjogd_7' => safe_post('tgl_partus_prjogd_7') !== '' ? date('Y-m-d', strtotime(str_replace('/', '-', safe_post('tgl_partus_prjogd_7')))) : NULL,

            'tempat_partus_prjogd' => json_encode([
                'tempat_partus_prjogd_1' => safe_post('tempat_partus_prjogd_1') !== '' ? safe_post('tempat_partus_prjogd_1') : null,
				'tempat_partus_prjogd_2' => safe_post('tempat_partus_prjogd_2') !== '' ? safe_post('tempat_partus_prjogd_2') : null,
				'tempat_partus_prjogd_3' => safe_post('tempat_partus_prjogd_3') !== '' ? safe_post('tempat_partus_prjogd_3') : null,
				'tempat_partus_prjogd_4' => safe_post('tempat_partus_prjogd_4') !== '' ? safe_post('tempat_partus_prjogd_4') : null,
                'tempat_partus_prjogd_5' => safe_post('tempat_partus_prjogd_5') !== '' ? safe_post('tempat_partus_prjogd_5') : null,
				'tempat_partus_prjogd_6' => safe_post('tempat_partus_prjogd_6') !== '' ? safe_post('tempat_partus_prjogd_6') : null,
                'tempat_partus_prjogd_7' => safe_post('tempat_partus_prjogd_7') !== '' ? safe_post('tempat_partus_prjogd_7') : null,
            ]),

            'umur_kh_prjogd' => json_encode([
                'umur_kh_prjogd_1' => safe_post('umur_kh_prjogd_1') !== '' ? safe_post('umur_kh_prjogd_1') : null,
				'umur_kh_prjogd_2' => safe_post('umur_kh_prjogd_2') !== '' ? safe_post('umur_kh_prjogd_2') : null,
				'umur_kh_prjogd_3' => safe_post('umur_kh_prjogd_3') !== '' ? safe_post('umur_kh_prjogd_3') : null,
				'umur_kh_prjogd_4' => safe_post('umur_kh_prjogd_4') !== '' ? safe_post('umur_kh_prjogd_4') : null,
                'umur_kh_prjogd_5' => safe_post('umur_kh_prjogd_5') !== '' ? safe_post('umur_kh_prjogd_5') : null,
				'umur_kh_prjogd_6' => safe_post('umur_kh_prjogd_6') !== '' ? safe_post('umur_kh_prjogd_6') : null,
                'umur_kh_prjogd_7' => safe_post('umur_kh_prjogd_7') !== '' ? safe_post('umur_kh_prjogd_7') : null,
            ]),

            'jenis_persalinan_prjogd' => json_encode([
                'jenis_persalinan_prjogd_1' => safe_post('jenis_persalinan_prjogd_1') !== '' ? safe_post('jenis_persalinan_prjogd_1') : null,
				'jenis_persalinan_prjogd_2' => safe_post('jenis_persalinan_prjogd_2') !== '' ? safe_post('jenis_persalinan_prjogd_2') : null,
				'jenis_persalinan_prjogd_3' => safe_post('jenis_persalinan_prjogd_3') !== '' ? safe_post('jenis_persalinan_prjogd_3') : null,
				'jenis_persalinan_prjogd_4' => safe_post('jenis_persalinan_prjogd_4') !== '' ? safe_post('jenis_persalinan_prjogd_4') : null,
                'jenis_persalinan_prjogd_5' => safe_post('jenis_persalinan_prjogd_5') !== '' ? safe_post('jenis_persalinan_prjogd_5') : null,
				'jenis_persalinan_prjogd_6' => safe_post('jenis_persalinan_prjogd_6') !== '' ? safe_post('jenis_persalinan_prjogd_6') : null,
                'jenis_persalinan_prjogd_7' => safe_post('jenis_persalinan_prjogd_7') !== '' ? safe_post('jenis_persalinan_prjogd_7') : null,
            ]),

            'penolong_prjogd' => json_encode([
                'penolong_prjogd_1' => safe_post('penolong_prjogd_1') !== '' ? safe_post('penolong_prjogd_1') : null,
				'penolong_prjogd_2' => safe_post('penolong_prjogd_2') !== '' ? safe_post('penolong_prjogd_2') : null,
				'penolong_prjogd_3' => safe_post('penolong_prjogd_3') !== '' ? safe_post('penolong_prjogd_3') : null,
				'penolong_prjogd_4' => safe_post('penolong_prjogd_4') !== '' ? safe_post('penolong_prjogd_4') : null,
                'penolong_prjogd_5' => safe_post('penolong_prjogd_5') !== '' ? safe_post('penolong_prjogd_5') : null,
				'penolong_prjogd_6' => safe_post('penolong_prjogd_6') !== '' ? safe_post('penolong_prjogd_6') : null,
                'penolong_prjogd_7' => safe_post('penolong_prjogd_7') !== '' ? safe_post('penolong_prjogd_7') : null,
            ]),

            'penyulit_prjogd' => json_encode([
                'penyulit_prjogd_1' => safe_post('penyulit_prjogd_1') !== '' ? safe_post('penyulit_prjogd_1') : null,
				'penyulit_prjogd_2' => safe_post('penyulit_prjogd_2') !== '' ? safe_post('penyulit_prjogd_2') : null,
				'penyulit_prjogd_3' => safe_post('penyulit_prjogd_3') !== '' ? safe_post('penyulit_prjogd_3') : null,
				'penyulit_prjogd_4' => safe_post('penyulit_prjogd_4') !== '' ? safe_post('penyulit_prjogd_4') : null,
                'penyulit_prjogd_5' => safe_post('penyulit_prjogd_5') !== '' ? safe_post('penyulit_prjogd_5') : null,
				'penyulit_prjogd_6' => safe_post('penyulit_prjogd_6') !== '' ? safe_post('penyulit_prjogd_6') : null,
                'penyulit_prjogd_7' => safe_post('penyulit_prjogd_7') !== '' ? safe_post('penyulit_prjogd_7') : null,
            ]),

            'jk_prjogd' => json_encode([
                'jk_prjogd_1' => safe_post('jk_prjogd_1') !== '' ? safe_post('jk_prjogd_1') : null,
				'jk_prjogd_2' => safe_post('jk_prjogd_2') !== '' ? safe_post('jk_prjogd_2') : null,
				'jk_prjogd_3' => safe_post('jk_prjogd_3') !== '' ? safe_post('jk_prjogd_3') : null,
				'jk_prjogd_4' => safe_post('jk_prjogd_4') !== '' ? safe_post('jk_prjogd_4') : null,
                'jk_prjogd_5' => safe_post('jk_prjogd_5') !== '' ? safe_post('jk_prjogd_5') : null,
				'jk_prjogd_6' => safe_post('jk_prjogd_6') !== '' ? safe_post('jk_prjogd_6') : null,
                'jk_prjogd_7' => safe_post('jk_prjogd_7') !== '' ? safe_post('jk_prjogd_7') : null,
            ]),

            'bb_prjogd' => json_encode([
                'bb_prjogd_1' => safe_post('bb_prjogd_1') !== '' ? safe_post('bb_prjogd_1') : null,
				'bb_prjogd_2' => safe_post('bb_prjogd_2') !== '' ? safe_post('bb_prjogd_2') : null,
				'bb_prjogd_3' => safe_post('bb_prjogd_3') !== '' ? safe_post('bb_prjogd_3') : null,
				'bb_prjogd_4' => safe_post('bb_prjogd_4') !== '' ? safe_post('bb_prjogd_4') : null,
                'bb_prjogd_5' => safe_post('bb_prjogd_5') !== '' ? safe_post('bb_prjogd_5') : null,
				'bb_prjogd_6' => safe_post('bb_prjogd_6') !== '' ? safe_post('bb_prjogd_6') : null,
                'bb_prjogd_7' => safe_post('bb_prjogd_7') !== '' ? safe_post('bb_prjogd_7') : null,
            ]),

            'pb_prjogd' => json_encode([
                'pb_prjogd_1' => safe_post('pb_prjogd_1') !== '' ? safe_post('pb_prjogd_1') : null,
				'pb_prjogd_2' => safe_post('pb_prjogd_2') !== '' ? safe_post('pb_prjogd_2') : null,
				'pb_prjogd_3' => safe_post('pb_prjogd_3') !== '' ? safe_post('pb_prjogd_3') : null,
				'pb_prjogd_4' => safe_post('pb_prjogd_4') !== '' ? safe_post('pb_prjogd_4') : null,
                'pb_prjogd_5' => safe_post('pb_prjogd_5') !== '' ? safe_post('pb_prjogd_5') : null,
				'pb_prjogd_6' => safe_post('pb_prjogd_6') !== '' ? safe_post('pb_prjogd_6') : null,
                'pb_prjogd_7' => safe_post('pb_prjogd_7') !== '' ? safe_post('pb_prjogd_7') : null,
            ]),

            'nifas_prjogd' => json_encode([
                'nifas_prjogd_1' => safe_post('nifas_prjogd_1') !== '' ? safe_post('nifas_prjogd_1') : null,
				'nifas_prjogd_2' => safe_post('nifas_prjogd_2') !== '' ? safe_post('nifas_prjogd_2') : null,
				'nifas_prjogd_3' => safe_post('nifas_prjogd_3') !== '' ? safe_post('nifas_prjogd_3') : null,
				'nifas_prjogd_4' => safe_post('nifas_prjogd_4') !== '' ? safe_post('nifas_prjogd_4') : null,
                'nifas_prjogd_5' => safe_post('nifas_prjogd_5') !== '' ? safe_post('nifas_prjogd_5') : null,
				'nifas_prjogd_6' => safe_post('nifas_prjogd_6') !== '' ? safe_post('nifas_prjogd_6') : null,
                'nifas_prjogd_7' => safe_post('nifas_prjogd_7') !== '' ? safe_post('nifas_prjogd_7') : null,
            ]),

            'keadaan_prjogd' => json_encode([
                'keadaan_prjogd_1' => safe_post('keadaan_prjogd_1') !== '' ? safe_post('keadaan_prjogd_1') : null,
				'keadaan_prjogd_2' => safe_post('keadaan_prjogd_2') !== '' ? safe_post('keadaan_prjogd_2') : null,
				'keadaan_prjogd_3' => safe_post('keadaan_prjogd_3') !== '' ? safe_post('keadaan_prjogd_3') : null,
				'keadaan_prjogd_4' => safe_post('keadaan_prjogd_4') !== '' ? safe_post('keadaan_prjogd_4') : null,
                'keadaan_prjogd_5' => safe_post('keadaan_prjogd_5') !== '' ? safe_post('keadaan_prjogd_5') : null,
				'keadaan_prjogd_6' => safe_post('keadaan_prjogd_6') !== '' ? safe_post('keadaan_prjogd_6') : null,
                'keadaan_prjogd_7' => safe_post('keadaan_prjogd_7') !== '' ? safe_post('keadaan_prjogd_7') : null,
            ]),

            'riwayat_prjogd' => json_encode([
                'riwayat_prjogd_1' => safe_post('riwayat_prjogd_1') !== '' ? safe_post('riwayat_prjogd_1') : null,
				'riwayat_prjogd_1' => safe_post('riwayat_prjogd_1') !== '' ? safe_post('riwayat_prjogd_1') : null,
				'riwayat_prjogd_3' => safe_post('riwayat_prjogd_3') !== '' ? safe_post('riwayat_prjogd_3') : null,
				'riwayat_prjogd_4' => safe_post('riwayat_prjogd_4') !== '' ? safe_post('riwayat_prjogd_4') : null,
                'riwayat_prjogd_5' => safe_post('riwayat_prjogd_5') !== '' ? safe_post('riwayat_prjogd_5') : null,
				'riwayat_prjogd_6' => safe_post('riwayat_prjogd_6') !== '' ? safe_post('riwayat_prjogd_6') : null,
				'riwayat_prjogd_7' => safe_post('riwayat_prjogd_7') !== '' ? safe_post('riwayat_prjogd_7') : null,
				'riwayat_prjogd_8' => safe_post('riwayat_prjogd_8') !== '' ? safe_post('riwayat_prjogd_8') : null,
                'riwayat_prjogd_9' => safe_post('riwayat_prjogd_9') !== '' ? safe_post('riwayat_prjogd_9') : null,
                'riwayat_prjogd_10' => safe_post('riwayat_prjogd_10') !== '' ? safe_post('riwayat_prjogd_10') : null,
                'riwayat_prjogd_11' => safe_post('riwayat_prjogd_11') !== '' ? safe_post('riwayat_prjogd_11') : null,
            ]),

            'status_prjogd' => json_encode([
                'status_prjogd_1' => safe_post('status_prjogd_1') !== '' ? safe_post('status_prjogd_1') : null,
				'status_prjogd_1' => safe_post('status_prjogd_1') !== '' ? safe_post('status_prjogd_1') : null,
				'status_prjogd_1' => safe_post('status_prjogd_1') !== '' ? safe_post('status_prjogd_1') : null,
				'status_prjogd_1' => safe_post('status_prjogd_1') !== '' ? safe_post('status_prjogd_1') : null,
                'status_prjogd_1' => safe_post('status_prjogd_1') !== '' ? safe_post('status_prjogd_1') : null,
				'status_prjogd_1' => safe_post('status_prjogd_1') !== '' ? safe_post('status_prjogd_1') : null,
				'status_prjogd_7' => safe_post('status_prjogd_7') !== '' ? safe_post('status_prjogd_7') : null,
				'status_prjogd_8' => safe_post('status_prjogd_8') !== '' ? safe_post('status_prjogd_8') : null,
                'status_prjogd_8' => safe_post('status_prjogd_8') !== '' ? safe_post('status_prjogd_8') : null,
                'status_prjogd_8' => safe_post('status_prjogd_8') !== '' ? safe_post('status_prjogd_8') : null,
                'status_prjogd_11' => safe_post('status_prjogd_11') !== '' ? safe_post('status_prjogd_11') : null,
                'status_prjogd_12' => safe_post('status_prjogd_12') !== '' ? safe_post('status_prjogd_12') : null,
                'status_prjogd_13' => safe_post('status_prjogd_13') !== '' ? safe_post('status_prjogd_13') : null,
            ]),

            'pengkajian_prjogd' => json_encode([
                'pengkajian_prjogd_1' => safe_post('pengkajian_prjogd_1') !== '' ? safe_post('pengkajian_prjogd_1') : null,
				'pengkajian_prjogd_2' => safe_post('pengkajian_prjogd_2') !== '' ? safe_post('pengkajian_prjogd_2') : null,
				'pengkajian_prjogd_3' => safe_post('pengkajian_prjogd_3') !== '' ? safe_post('pengkajian_prjogd_3') : null,
				'pengkajian_prjogd_4' => safe_post('pengkajian_prjogd_4') !== '' ? safe_post('pengkajian_prjogd_4') : null,
                'pengkajian_prjogd_5' => safe_post('pengkajian_prjogd_5') !== '' ? safe_post('pengkajian_prjogd_5') : null,
				'pengkajian_prjogd_6' => safe_post('pengkajian_prjogd_6') !== '' ? safe_post('pengkajian_prjogd_6') : null,
				'pengkajian_prjogd_7' => safe_post('pengkajian_prjogd_7') !== '' ? safe_post('pengkajian_prjogd_7') : null,
				'pengkajian_prjogd_8' => safe_post('pengkajian_prjogd_8') !== '' ? safe_post('pengkajian_prjogd_8') : null,
                'pengkajian_prjogd_9' => safe_post('pengkajian_prjogd_9') !== '' ? safe_post('pengkajian_prjogd_9') : null,
                'pengkajian_prjogd_10' => safe_post('pengkajian_prjogd_10') !== '' ? safe_post('pengkajian_prjogd_10') : null,
            ]),

              
            'pemeriksaan_prjogd' => json_encode([
                'pemeriksaan_prjogd_1' => safe_post('pemeriksaan_prjogd_1') !== '' ? safe_post('pemeriksaan_prjogd_1') : null,
				'pemeriksaan_prjogd_2' => safe_post('pemeriksaan_prjogd_2') !== '' ? safe_post('pemeriksaan_prjogd_2') : null,
				'pemeriksaan_prjogd_3' => safe_post('pemeriksaan_prjogd_3') !== '' ? safe_post('pemeriksaan_prjogd_3') : null,
				'pemeriksaan_prjogd_4' => safe_post('pemeriksaan_prjogd_4') !== '' ? safe_post('pemeriksaan_prjogd_4') : null,
                'pemeriksaan_prjogd_5' => safe_post('pemeriksaan_prjogd_5') !== '' ? safe_post('pemeriksaan_prjogd_5') : null,
				'pemeriksaan_prjogd_6' => safe_post('pemeriksaan_prjogd_6') !== '' ? safe_post('pemeriksaan_prjogd_6') : null,
				'pemeriksaan_prjogd_7' => safe_post('pemeriksaan_prjogd_7') !== '' ? safe_post('pemeriksaan_prjogd_7') : null,
            ]),

            'sn_penurunan_bb_prjogd' => (safe_post('sn_penurunan_bb_prjogd') !== '' ? safe_post('sn_penurunan_bb_prjogd') : NULL),
            'sn_penurunan_bb_on_prjogd' => (safe_post('sn_penurunan_bb_on_prjogd') !== '' ? safe_post('sn_penurunan_bb_on_prjogd') : NULL),
            'sn_asupan_makan_prjogd' => (safe_post('sn_asupan_makan_prjogd') !== '' ? safe_post('sn_asupan_makan_prjogd') : NULL),
            'sn_total_prjogd' => (safe_post('sn_total_prjogd') !== '' ? safe_post('sn_total_prjogd') : NULL),


            'skrining_prjogd' => json_encode([
                'skrining_prjogd_1' => safe_post('skrining_prjogd_1') !== '' ? safe_post('skrining_prjogd_1') : null,
				'skrining_prjogd_1' => safe_post('skrining_prjogd_1') !== '' ? safe_post('skrining_prjogd_1') : null,
				'skrining_prjogd_3' => safe_post('skrining_prjogd_3') !== '' ? safe_post('skrining_prjogd_3') : null,
				'skrining_prjogd_4' => safe_post('skrining_prjogd_4') !== '' ? safe_post('skrining_prjogd_4') : null,
                'skrining_prjogd_4' => safe_post('skrining_prjogd_4') !== '' ? safe_post('skrining_prjogd_4') : null,
				'skrining_prjogd_6' => safe_post('skrining_prjogd_6') !== '' ? safe_post('skrining_prjogd_6') : null,
				'skrining_prjogd_6' => safe_post('skrining_prjogd_6') !== '' ? safe_post('skrining_prjogd_6') : null,
				'skrining_prjogd_8' => safe_post('skrining_prjogd_8') !== '' ? safe_post('skrining_prjogd_8') : null,
                'skrining_prjogd_8' => safe_post('skrining_prjogd_8') !== '' ? safe_post('skrining_prjogd_8') : null,
            ]),

            'status_fung_prjogd' => json_encode([
                'status_fung_prjogd_1' => safe_post('status_fung_prjogd_1') !== '' ? safe_post('status_fung_prjogd_1') : null,
				'status_fung_prjogd_2' => safe_post('status_fung_prjogd_2') !== '' ? safe_post('status_fung_prjogd_2') : null,
				'status_fung_prjogd_3' => safe_post('status_fung_prjogd_3') !== '' ? safe_post('status_fung_prjogd_3') : null,
				'status_fung_prjogd_4' => safe_post('status_fung_prjogd_4') !== '' ? safe_post('status_fung_prjogd_4') : null,
                'status_fung_prjogd_5' => safe_post('status_fung_prjogd_5') !== '' ? safe_post('status_fung_prjogd_5') : null,
            ]),

            'cidera_prjogd' => json_encode([
                'cidera_prjogd_1' => safe_post('cidera_prjogd_1') !== '' ? safe_post('cidera_prjogd_1') : null,
				'cidera_prjogd_1' => safe_post('cidera_prjogd_1') !== '' ? safe_post('cidera_prjogd_1') : null,
				'cidera_prjogd_3' => safe_post('cidera_prjogd_3') !== '' ? safe_post('cidera_prjogd_3') : null,
				'cidera_prjogd_3' => safe_post('cidera_prjogd_3') !== '' ? safe_post('cidera_prjogd_3') : null,
                'cidera_prjogd_5' => safe_post('cidera_prjogd_5') !== '' ? safe_post('cidera_prjogd_5') : null,
				'cidera_prjogd_5' => safe_post('cidera_prjogd_5') !== '' ? safe_post('cidera_prjogd_5') : null,
				'cidera_prjogd_5' => safe_post('cidera_prjogd_5') !== '' ? safe_post('cidera_prjogd_5') : null,
            ]),

            'keterangan_prjogd' => json_encode([
                'keterangan_prjogd_1' => safe_post('keterangan_prjogd_1') !== '' ? safe_post('keterangan_prjogd_1') : null,
				'keterangan_prjogd_1' => safe_post('keterangan_prjogd_1') !== '' ? safe_post('keterangan_prjogd_1') : null,
				'keterangan_prjogd_1' => safe_post('keterangan_prjogd_1') !== '' ? safe_post('keterangan_prjogd_1') : null,
				'keterangan_prjogd_1' => safe_post('keterangan_prjogd_1') !== '' ? safe_post('keterangan_prjogd_1') : null,
                'keterangan_prjogd_5' => safe_post('keterangan_prjogd_5') !== '' ? safe_post('keterangan_prjogd_5') : null,
				'keterangan_prjogd_6' => safe_post('keterangan_prjogd_6') !== '' ? safe_post('keterangan_prjogd_6') : null,
				'keterangan_prjogd_7' => safe_post('keterangan_prjogd_7') !== '' ? safe_post('keterangan_prjogd_7') : null,
				'keterangan_prjogd_8' => safe_post('keterangan_prjogd_8') !== '' ? safe_post('keterangan_prjogd_8') : null,
                'keterangan_prjogd_9' => safe_post('keterangan_prjogd_9') !== '' ? safe_post('keterangan_prjogd_9') : null,
                'keterangan_prjogd_10' => safe_post('keterangan_prjogd_10') !== '' ? safe_post('keterangan_prjogd_10') : null,
                'keterangan_prjogd_11' => safe_post('keterangan_prjogd_11') !== '' ? safe_post('keterangan_prjogd_11') : null,
                'keterangan_prjogd_12' => safe_post('keterangan_prjogd_12') !== '' ? safe_post('keterangan_prjogd_12') : null,
                'keterangan_prjogd_13' => safe_post('keterangan_prjogd_13') !== '' ? safe_post('keterangan_prjogd_13') : null,
                'keterangan_prjogd_14' => safe_post('keterangan_prjogd_14') !== '' ? safe_post('keterangan_prjogd_14') : null,
                'keterangan_prjogd_15' => safe_post('keterangan_prjogd_15') !== '' ? safe_post('keterangan_prjogd_15') : null,
                'keterangan_prjogd_16' => safe_post('keterangan_prjogd_16') !== '' ? safe_post('keterangan_prjogd_16') : null,
                'keterangan_prjogd_17' => safe_post('keterangan_prjogd_17') !== '' ? safe_post('keterangan_prjogd_17') : null,
                'keterangan_prjogd_18' => safe_post('keterangan_prjogd_18') !== '' ? safe_post('keterangan_prjogd_18') : null,
                'keterangan_prjogd_18' => safe_post('keterangan_prjogd_18') !== '' ? safe_post('keterangan_prjogd_18') : null,
                'keterangan_prjogd_20' => safe_post('keterangan_prjogd_20') !== '' ? safe_post('keterangan_prjogd_20') : null,
            ]),

            'masalah_kebidanan_prjogd' => (safe_post('masalah_kebidanan_prjogd') !== '' ? safe_post('masalah_kebidanan_prjogd') : NULL),
          
            'tanggal_jam_bidan_prjogd' => (safe_post('tanggal_jam_bidan_prjogd') !== '' ? datetime2mysql(safe_post('tanggal_jam_bidan_prjogd')) : NULL),
            'bidan_prjogd' => safe_post('bidan_prjogd') !== '' ? safe_post('bidan_prjogd') : NULL,
            'ttd_bidan_prjogd' => safe_post('ttd_bidan_prjogd') !== '' ? safe_post('ttd_bidan_prjogd') : NULL,

            'tanggal_jam_dokter_prjogd' => (safe_post('tanggal_jam_dokter_prjogd') !== '' ? datetime2mysql(safe_post('tanggal_jam_dokter_prjogd')) : NULL),
            'dokter_prjogd' => safe_post('dokter_prjogd') !== '' ? safe_post('dokter_prjogd') : NULL,
            'ttd_dokter_prjogd' => safe_post('ttd_dokter_prjogd') !== '' ? safe_post('ttd_dokter_prjogd') : NULL,    
        );		
        // var_dump($layanan);die;
		$sign = $this->db->select('prjogd.tanggal_jam_bidan_prjogd, prjogd.ttd_bidan_prjogd, prjogd.tanggal_jam_dokter_prjogd, prjogd.ttd_dokter_prjogd,')
        ->from('sm_pengkajian_rajal_obstetri_ginekologi as prjogd')     
        ->where('prjogd.id_layanan_pendaftaran', $id_layanan_pendaftaran)
        ->get()
        ->row();   
		if (isset($sign)) :          			
			if ($sign->tanggal_jam_bidan_prjogd !== NULL) :
                $pengkajianRajalObstetriGinekologi['tanggal_jam_bidan_prjogd'] = $sign->tanggal_jam_bidan_prjogd;
            else :
                $pengkajianRajalObstetriGinekologi['tanggal_jam_bidan_prjogd'] = (safe_post('tanggal_jam_bidan_prjogd') !== '' ? datetime2mysql(safe_post('tanggal_jam_bidan_prjogd')) : NULL);
            endif;

            if ($sign->ttd_bidan_prjogd !== NULL) :
                $pengkajianRajalObstetriGinekologi['ttd_bidan_prjogd'] = $sign->ttd_bidan_prjogd;
            else :
                $pengkajianRajalObstetriGinekologi['ttd_bidan_prjogd'] = (safe_post('ttd_bidan_prjogd') !== '' ? safe_post('ttd_bidan_prjogd') : NULL);
            endif;

            if ($sign->tanggal_jam_dokter_prjogd !== NULL) :
                $pengkajianRajalObstetriGinekologi['tanggal_jam_dokter_prjogd'] = $sign->tanggal_jam_dokter_prjogd;
            else :
                $pengkajianRajalObstetriGinekologi['tanggal_jam_dokter_prjogd'] = (safe_post('tanggal_jam_dokter_prjogd') !== '' ? datetime2mysql(safe_post('tanggal_jam_dokter_prjogd')) : NULL);
            endif;

            if ($sign->ttd_dokter_prjogd !== NULL) :
                $pengkajianRajalObstetriGinekologi['ttd_dokter_prjogd'] = $sign->ttd_dokter_prjogd;
            else :
                $pengkajianRajalObstetriGinekologi['ttd_dokter_prjogd'] = (safe_post('ttd_dokter_prjogd') !== '' ? safe_post('ttd_dokter_prjogd') : NULL);
            endif;           
        endif;
        // $respon = $this->pemeriksaan_poli->updatepengkajianRajalObstetriGinekologi($pengkajianRajalObstetriGinekologi, $id_prjogd);
        $this->pemeriksaan_poli->updatepengkajianRajalObstetriGinekologi($pengkajianRajalObstetriGinekologi, $id_prjogd);

		if (!empty($respon)) {

			$response = $respon;
		} else {

			$response = null;
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
            'id_pendaftaran' => ('id_pendaftaran'),
            'id_layanan_pendaftaran' => ('id_layanan_pendaftaran'),
			'respon' => $response,
		);

		$this->response($message, REST_Controller::HTTP_OK);
	}

    // PAPAK + ubah
    function get_data_pengkajian_awal_pasien_akhir_kehidupan_get(){
        if (!$this->get('id_layanan_pendaftaran')) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
        endif;
        $this->load->model('pendaftaran/Pendaftaran_model', 'm_pendaftaran'); 
        $this->load->model('pelayanan/Pelayanan_model', 'm_pelayanan');
        $data                               = $this->m_pendaftaran->getPendaftaranDetail($this->get('id', true), $this->get('id_layanan', true));
        $data['profil']                     = $this->m_pelayanan->getProfilPasien($data['pasien']->id_pasien);
        $data['pengkajian_awal_pasien_akhir_kehidupan']            = $this->pemeriksaan_poli->getPengkajianAwalPasienAkhirKehidupan($this->get('id', true));
        $data['pengkajian_awal_pasien_akhir_kehidupan_logs']       = $this->pemeriksaan_poli->getPengkajianAwalPasienAkhirKehidupanLogs($this->get('id', true));
        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK); // (200)
        endif;
    }

    
    // PAPAK LOGS 
    function get_history_logs_pengkajian_awal_pasien_akhir_kehidupan_get(){
        if (!$this->get('id_layanan_pendaftaran', true)) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
        endif;
        $id_layanan_pendaftaran = $this->get('id_layanan_pendaftaran', true);
        $data['pengkajian_awal_pasien_akhir_kehidupan_logs']       = $this->pemeriksaan_poli->getPengkajianAwalPasienAkhirKehidupanLogs($id_layanan_pendaftaran);
        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK); // (200)
        endif;
    }

    // PAPAK
    function simpan_data_pengkajian_awal_pasien_akhir_kehidupan_post(){      

        if (safe_post('id_layanan_pendaftaran') === '') :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
        endif;

        $id_layanan_pendaftaran = safe_post('id_layanan_pendaftaran');
        $id_pendaftaran = safe_post('id_pendaftaran');;
        $id_papak = safe_post('id_papak');
        $id_users = safe_post('id_user');

        $pengkajianAwalPasienAkhirKehidupan = array(		
            'id_layanan_pendaftaran' => $id_layanan_pendaftaran,
            'id_pendaftaran' => $id_pendaftaran,
            'id_users' => $id_users,

            // 'tgl_masuk_papak' => (safe_post('tgl_masuk_papak') !== '' ? datetime2mysql(safe_post('tgl_masuk_papak')) : NULL),
            'tgl_pengkajian_papak' => (safe_post('tgl_pengkajian_papak') !== '' ? datetime2mysql(safe_post('tgl_pengkajian_papak')) : NULL),

            // 'kewarganegaraan_papak' => json_encode([
            //     'kewarganegaraan_papak' => safe_post('kewarganegaraan_papak') !== '' ? safe_post('kewarganegaraan_papak') : null,
            //     'kewarganegaraan_papak' => safe_post('kewarganegaraan_papak') !== '' ? safe_post('kewarganegaraan_papak') : null,
            // ]),  

            // 'suku_bangsa_papak' => (safe_post('suku_bangsa_papak') !== '' ? safe_post('suku_bangsa_papak') : NULL), 

            // 'bahasa_papak' => json_encode([
            //     'bahasa_papak_1' => safe_post('bahasa_papak_1') !== '' ? safe_post('bahasa_papak_1') : null,
			// 	'bahasa_papak_2' => safe_post('bahasa_papak_2') !== '' ? safe_post('bahasa_papak_2') : null,
			// 	'bahasa_papak_3' => safe_post('bahasa_papak_3') !== '' ? safe_post('bahasa_papak_3') : null,
			// 	'bahasa_papak_4' => safe_post('bahasa_papak_4') !== '' ? safe_post('bahasa_papak_4') : null,
            // ]),

            // 'agama_papak' => json_encode([
            //     'agama_papak_1' => safe_post('agama_papak_1') !== '' ? safe_post('agama_papak_1') : null,
			// 	'agama_papak_2' => safe_post('agama_papak_2') !== '' ? safe_post('agama_papak_2') : null,
			// 	'agama_papak_3' => safe_post('agama_papak_3') !== '' ? safe_post('agama_papak_3') : null,
			// 	'agama_papak_4' => safe_post('agama_papak_4') !== '' ? safe_post('agama_papak_4') : null,
			// 	'agama_papak_5' => safe_post('agama_papak_5') !== '' ? safe_post('agama_papak_5') : null,
			// 	'agama_papak_6' => safe_post('agama_papak_6') !== '' ? safe_post('agama_papak_6') : null,
			// 	'agama_papak_7' => safe_post('agama_papak_7') !== '' ? safe_post('agama_papak_7') : null,
            // ]),

            // 'status_papak' => json_encode([
            //     'status_papak' => safe_post('status_papak') !== '' ? safe_post('status_papak') : null,
            //     'status_papak' => safe_post('status_papak') !== '' ? safe_post('status_papak') : null,
            //     'status_papak' => safe_post('status_papak') !== '' ? safe_post('status_papak') : null,
            // ]),

            // 'pendidikan_papak' => (safe_post('pendidikan_papak') !== '' ? safe_post('pendidikan_papak') : NULL), 


            // 'yang_merawat_papak' => json_encode([
            //     'yang_merawat_papak_1' => safe_post('yang_merawat_papak_1') !== '' ? safe_post('yang_merawat_papak_1') : null,
			// 	'yang_merawat_papak_2' => safe_post('yang_merawat_papak_2') !== '' ? safe_post('yang_merawat_papak_2') : null,
			// 	'yang_merawat_papak_3' => safe_post('yang_merawat_papak_3') !== '' ? safe_post('yang_merawat_papak_3') : null,
			// 	'yang_merawat_papak_4' => safe_post('yang_merawat_papak_4') !== '' ? safe_post('yang_merawat_papak_4') : null,
			// 	'yang_merawat_papak_5' => safe_post('yang_merawat_papak_5') !== '' ? safe_post('yang_merawat_papak_5') : null,
            // ]),

            // 'cara_masuk_papak' => json_encode([
            //     'cara_masuk_papak_1' => safe_post('cara_masuk_papak_1') !== '' ? safe_post('cara_masuk_papak_1') : null,
			// 	'cara_masuk_papak_2' => safe_post('cara_masuk_papak_2') !== '' ? safe_post('cara_masuk_papak_2') : null,
			// 	'cara_masuk_papak_3' => safe_post('cara_masuk_papak_3') !== '' ? safe_post('cara_masuk_papak_3') : null,
			// 	'cara_masuk_papak_4' => safe_post('cara_masuk_papak_4') !== '' ? safe_post('cara_masuk_papak_4') : null,
            // ]),

            // 'cara_tiba_diruangan_papak' => json_encode([
            //     'cara_tiba_diruangan_papak' => safe_post('cara_tiba_diruangan_papak') !== '' ? safe_post('cara_tiba_diruangan_papak') : null,
            //     'cara_tiba_diruangan_papak' => safe_post('cara_tiba_diruangan_papak') !== '' ? safe_post('cara_tiba_diruangan_papak') : null,
            //     'cara_tiba_diruangan_papak' => safe_post('cara_tiba_diruangan_papak') !== '' ? safe_post('cara_tiba_diruangan_papak') : null,
            // ]),

            // 'idd_papak' => json_encode([
            //     'idd_papak_1' => safe_post('idd_papak_1') !== '' ? safe_post('idd_papak_1') : null,
			// 	'idd_papak_2' => safe_post('idd_papak_2') !== '' ? safe_post('idd_papak_2') : null,
			// 	'idd_papak_3' => safe_post('idd_papak_3') !== '' ? safe_post('idd_papak_3') : null,
			// 	'idd_papak_4' => safe_post('idd_papak_4') !== '' ? safe_post('idd_papak_4') : null,
			// 	'idd_papak_5' => safe_post('idd_papak_5') !== '' ? safe_post('idd_papak_5') : null,
            // ]),

            // 'ra_papak' => json_encode([
            //     'ra_papak_1' => safe_post('ra_papak_1') !== '' ? safe_post('ra_papak_1') : null,
            //     'ra_papak_1' => safe_post('ra_papak_1') !== '' ? safe_post('ra_papak_1') : null,
            //     'ra_papak_1' => safe_post('ra_papak_1') !== '' ? safe_post('ra_papak_1') : null,
			// 	'ra_papak_4' => safe_post('ra_papak_4') !== '' ? safe_post('ra_papak_4') : null,
			// 	'ra_papak_5' => safe_post('ra_papak_5') !== '' ? safe_post('ra_papak_5') : null,
			// 	'ra_papak_6' => safe_post('ra_papak_6') !== '' ? safe_post('ra_papak_6') : null,
			// 	'ra_papak_7' => safe_post('ra_papak_7') !== '' ? safe_post('ra_papak_7') : null,
            //     'ra_papak_8' => safe_post('ra_papak_8') !== '' ? safe_post('ra_papak_8') : null,
            //     'ra_papak_9' => safe_post('ra_papak_9') !== '' ? safe_post('ra_papak_9') : null,
            //     'ra_papak_10' => safe_post('ra_papak_10') !== '' ? safe_post('ra_papak_10') : null,
            //     'ra_papak_11' => safe_post('ra_papak_11') !== '' ? safe_post('ra_papak_11') : null,
            //     'ra_papak_12' => safe_post('ra_papak_12') !== '' ? safe_post('ra_papak_12') : null,
            //     'ra_papak_13' => safe_post('ra_papak_13') !== '' ? safe_post('ra_papak_13') : null,
            //     'ra_papak_14' => safe_post('ra_papak_14') !== '' ? safe_post('ra_papak_14') : null,
			// 	'ra_papak_15' => safe_post('ra_papak_15') !== '' ? safe_post('ra_papak_15') : null,
			// 	'ra_papak_15' => safe_post('ra_papak_15') !== '' ? safe_post('ra_papak_15') : null,
			// 	'ra_papak_17' => safe_post('ra_papak_17') !== '' ? safe_post('ra_papak_17') : null,
            //     'ra_papak_18' => safe_post('ra_papak_18') !== '' ? safe_post('ra_papak_18') : null,
			// 	'ra_papak_19' => safe_post('ra_papak_19') !== '' ? safe_post('ra_papak_19') : null,
			// 	'ra_papak_19' => safe_post('ra_papak_19') !== '' ? safe_post('ra_papak_19') : null,
			// 	'ra_papak_21' => safe_post('ra_papak_21') !== '' ? safe_post('ra_papak_21') : null,
            //     'ra_papak_22' => safe_post('ra_papak_22') !== '' ? safe_post('ra_papak_22') : null,
			// 	'ra_papak_23' => safe_post('ra_papak_23') !== '' ? safe_post('ra_papak_23') : null,
			// 	'ra_papak_23' => safe_post('ra_papak_23') !== '' ? safe_post('ra_papak_23') : null,
            //     'ra_papak_25' => safe_post('ra_papak_25') !== '' ? safe_post('ra_papak_25') : null,
			// 	'ra_papak_25' => safe_post('ra_papak_25') !== '' ? safe_post('ra_papak_25') : null,
			// 	'ra_papak_27' => safe_post('ra_papak_27') !== '' ? safe_post('ra_papak_27') : null,
			// 	'ra_papak_28' => safe_post('ra_papak_28') !== '' ? safe_post('ra_papak_28') : null,
            // ]),

            // 'rpk_papak' => json_encode([
            //     'rpk_papak_1' => safe_post('rpk_papak_1') !== '' ? safe_post('rpk_papak_1') : null,
			// 	'rpk_papak_2' => safe_post('rpk_papak_2') !== '' ? safe_post('rpk_papak_2') : null,
			// 	'rpk_papak_3' => safe_post('rpk_papak_3') !== '' ? safe_post('rpk_papak_3') : null,
			// 	'rpk_papak_4' => safe_post('rpk_papak_4') !== '' ? safe_post('rpk_papak_4') : null,
			// 	'rpk_papak_5' => safe_post('rpk_papak_5') !== '' ? safe_post('rpk_papak_5') : null,
			// 	'rpk_papak_6' => safe_post('rpk_papak_6') !== '' ? safe_post('rpk_papak_6') : null,
            // ]),

            // 'kesadaran_papak' => json_encode([
            //     'kesadaran_papak_1' => safe_post('kesadaran_papak_1') !== '' ? safe_post('kesadaran_papak_1') : null,
			// 	'kesadaran_papak_2' => safe_post('kesadaran_papak_2') !== '' ? safe_post('kesadaran_papak_2') : null,
			// 	'kesadaran_papak_3' => safe_post('kesadaran_papak_3') !== '' ? safe_post('kesadaran_papak_3') : null,
			// 	'kesadaran_papak_4' => safe_post('kesadaran_papak_4') !== '' ? safe_post('kesadaran_papak_4') : null,
			// 	'kesadaran_papak_5' => safe_post('kesadaran_papak_5') !== '' ? safe_post('kesadaran_papak_5') : null,
            // ]),

            // 'gcs_et' => json_encode([
            //     'gcs_et_1' => safe_post('gcs_et_1') !== '' ? safe_post('gcs_et_1') : null,
			// 	'gcs_et_2' => safe_post('gcs_et_2') !== '' ? safe_post('gcs_et_2') : null,
			// 	'gcs_et_3' => safe_post('gcs_et_3') !== '' ? safe_post('gcs_et_3') : null,
			// 	'gcs_et_4' => safe_post('gcs_et_4') !== '' ? safe_post('gcs_et_4') : null,
            // ]),

            // 'pemeriksaan_papak' => json_encode([
            //     'pemeriksaan_papak_1' => safe_post('pemeriksaan_papak_1') !== '' ? safe_post('pemeriksaan_papak_1') : null,
			// 	'pemeriksaan_papak_2' => safe_post('pemeriksaan_papak_2') !== '' ? safe_post('pemeriksaan_papak_2') : null,
			// 	'pemeriksaan_papak_3' => safe_post('pemeriksaan_papak_3') !== '' ? safe_post('pemeriksaan_papak_3') : null,
			// 	'pemeriksaan_papak_4' => safe_post('pemeriksaan_papak_4') !== '' ? safe_post('pemeriksaan_papak_4') : null,
			// 	'pemeriksaan_papak_5' => safe_post('pemeriksaan_papak_5') !== '' ? safe_post('pemeriksaan_papak_5') : null,
			// 	'pemeriksaan_papak_6' => safe_post('pemeriksaan_papak_6') !== '' ? safe_post('pemeriksaan_papak_6') : null,
			// 	'pemeriksaan_papak_7' => safe_post('pemeriksaan_papak_7') !== '' ? safe_post('pemeriksaan_papak_7') : null,
            // ]),

            'kegawatan_papak' => json_encode([
                'kegawatan_papak_1' => safe_post('kegawatan_papak_1') !== '' ? safe_post('kegawatan_papak_1') : null,
				'kegawatan_papak_2' => safe_post('kegawatan_papak_2') !== '' ? safe_post('kegawatan_papak_2') : null,
				'kegawatan_papak_3' => safe_post('kegawatan_papak_3') !== '' ? safe_post('kegawatan_papak_3') : null,
				'kegawatan_papak_4' => safe_post('kegawatan_papak_4') !== '' ? safe_post('kegawatan_papak_4') : null,
				'kegawatan_papak_5' => safe_post('kegawatan_papak_5') !== '' ? safe_post('kegawatan_papak_5') : null,
				'kegawatan_papak_6' => safe_post('kegawatan_papak_6') !== '' ? safe_post('kegawatan_papak_6') : null,
				'kegawatan_papak_7' => safe_post('kegawatan_papak_7') !== '' ? safe_post('kegawatan_papak_7') : null,
				'kegawatan_papak_8' => safe_post('kegawatan_papak_8') !== '' ? safe_post('kegawatan_papak_8') : null,
				'kegawatan_papak_9' => safe_post('kegawatan_papak_9') !== '' ? safe_post('kegawatan_papak_9') : null,
            ]),

            'kehilangan_papak' => json_encode([
                'kehilangan_papak_1' => safe_post('kehilangan_papak_1') !== '' ? safe_post('kehilangan_papak_1') : null,
				'kehilangan_papak_2' => safe_post('kehilangan_papak_2') !== '' ? safe_post('kehilangan_papak_2') : null,
				'kehilangan_papak_3' => safe_post('kehilangan_papak_3') !== '' ? safe_post('kehilangan_papak_3') : null,
				'kehilangan_papak_4' => safe_post('kehilangan_papak_4') !== '' ? safe_post('kehilangan_papak_4') : null,
				'kehilangan_papak_5' => safe_post('kehilangan_papak_5') !== '' ? safe_post('kehilangan_papak_5') : null,
				'kehilangan_papak_6' => safe_post('kehilangan_papak_6') !== '' ? safe_post('kehilangan_papak_6') : null,
				'kehilangan_papak_7' => safe_post('kehilangan_papak_7') !== '' ? safe_post('kehilangan_papak_7') : null,
				'kehilangan_papak_8' => safe_post('kehilangan_papak_8') !== '' ? safe_post('kehilangan_papak_8') : null,
            ]),
            
            'perlambatan_papak' => json_encode([
                'perlambatan_papak_1' => safe_post('perlambatan_papak_1') !== '' ? safe_post('perlambatan_papak_1') : null,
				'perlambatan_papak_2' => safe_post('perlambatan_papak_2') !== '' ? safe_post('perlambatan_papak_2') : null,
				'perlambatan_papak_3' => safe_post('perlambatan_papak_3') !== '' ? safe_post('perlambatan_papak_3') : null,
				'perlambatan_papak_4' => safe_post('perlambatan_papak_4') !== '' ? safe_post('perlambatan_papak_4') : null,
				'perlambatan_papak_5' => safe_post('perlambatan_papak_5') !== '' ? safe_post('perlambatan_papak_5') : null,
				'perlambatan_papak_6' => safe_post('perlambatan_papak_6') !== '' ? safe_post('perlambatan_papak_6') : null,
				'perlambatan_papak_7' => safe_post('perlambatan_papak_7') !== '' ? safe_post('perlambatan_papak_7') : null,
            ]),

            'faktor_papak' => json_encode([
                'faktor_papak_1' => safe_post('faktor_papak_1') !== '' ? safe_post('faktor_papak_1') : null,
				'faktor_papak_2' => safe_post('faktor_papak_2') !== '' ? safe_post('faktor_papak_2') : null,
				'faktor_papak_3' => safe_post('faktor_papak_3') !== '' ? safe_post('faktor_papak_3') : null,
				'faktor_papak_4' => safe_post('faktor_papak_4') !== '' ? safe_post('faktor_papak_4') : null,
            ]),

            'manajemen_papak' => json_encode([
                'manajemen_papak_1' => safe_post('manajemen_papak_1') !== '' ? safe_post('manajemen_papak_1') : null,
				'manajemen_papak_2' => safe_post('manajemen_papak_2') !== '' ? safe_post('manajemen_papak_2') : null,
				'manajemen_papak_3' => safe_post('manajemen_papak_3') !== '' ? safe_post('manajemen_papak_3') : null,
				'manajemen_papak_4' => safe_post('manajemen_papak_4') !== '' ? safe_post('manajemen_papak_4') : null,
				'manajemen_papak_5' => safe_post('manajemen_papak_5') !== '' ? safe_post('manajemen_papak_5') : null,
				'manajemen_papak_6' => safe_post('manajemen_papak_6') !== '' ? safe_post('manajemen_papak_6') : null,
				'manajemen_papak_7' => safe_post('manajemen_papak_7') !== '' ? safe_post('manajemen_papak_7') : null,
				'manajemen_papak_8' => safe_post('manajemen_papak_8') !== '' ? safe_post('manajemen_papak_8') : null,
				'manajemen_papak_9' => safe_post('manajemen_papak_9') !== '' ? safe_post('manajemen_papak_9') : null,
            ]),

            'orintasi_papak' => json_encode([
                'orintasi_papak_1' => safe_post('orintasi_papak_1') !== '' ? safe_post('orintasi_papak_1') : null,
                'orintasi_papak_1' => safe_post('orintasi_papak_1') !== '' ? safe_post('orintasi_papak_1') : null,
				'orintasi_papak_3' => safe_post('orintasi_papak_3') !== '' ? safe_post('orintasi_papak_3') : null,
            ]),

            'reaksi_pasien_papak' => json_encode([
                'reaksi_pasien_papak_1' => safe_post('reaksi_pasien_papak_1') !== '' ? safe_post('reaksi_pasien_papak_1') : null,
				'reaksi_pasien_papak_2' => safe_post('reaksi_pasien_papak_2') !== '' ? safe_post('reaksi_pasien_papak_2') : null,
				'reaksi_pasien_papak_3' => safe_post('reaksi_pasien_papak_3') !== '' ? safe_post('reaksi_pasien_papak_3') : null,
				'reaksi_pasien_papak_4' => safe_post('reaksi_pasien_papak_4') !== '' ? safe_post('reaksi_pasien_papak_4') : null,
				'reaksi_pasien_papak_5' => safe_post('reaksi_pasien_papak_5') !== '' ? safe_post('reaksi_pasien_papak_5') : null,
				'reaksi_pasien_papak_6' => safe_post('reaksi_pasien_papak_6') !== '' ? safe_post('reaksi_pasien_papak_6') : null,
            ]),

            'mp_papak' => json_encode([
                'mp_papak_1' => safe_post('mp_papak_1') !== '' ? safe_post('mp_papak_1') : null,
                'mp_papak_2' => safe_post('mp_papak_2') !== '' ? safe_post('mp_papak_2') : null,
            ]),

            'reaksi_keluarga_papak' => json_encode([
                'reaksi_keluarga_papak_1' => safe_post('reaksi_keluarga_papak_1') !== '' ? safe_post('reaksi_keluarga_papak_1') : null,
				'reaksi_keluarga_papak_2' => safe_post('reaksi_keluarga_papak_2') !== '' ? safe_post('reaksi_keluarga_papak_2') : null,
				'reaksi_keluarga_papak_3' => safe_post('reaksi_keluarga_papak_3') !== '' ? safe_post('reaksi_keluarga_papak_3') : null,
				'reaksi_keluarga_papak_4' => safe_post('reaksi_keluarga_papak_4') !== '' ? safe_post('reaksi_keluarga_papak_4') : null,
				'reaksi_keluarga_papak_5' => safe_post('reaksi_keluarga_papak_5') !== '' ? safe_post('reaksi_keluarga_papak_5') : null,
				'reaksi_keluarga_papak_6' => safe_post('reaksi_keluarga_papak_6') !== '' ? safe_post('reaksi_keluarga_papak_6') : null,
				'reaksi_keluarga_papak_7' => safe_post('reaksi_keluarga_papak_7') !== '' ? safe_post('reaksi_keluarga_papak_7') : null,
				'reaksi_keluarga_papak_8' => safe_post('reaksi_keluarga_papak_8') !== '' ? safe_post('reaksi_keluarga_papak_8') : null,
				'reaksi_keluarga_papak_9' => safe_post('reaksi_keluarga_papak_9') !== '' ? safe_post('reaksi_keluarga_papak_9') : null,
            ]),

            'masalah_kep_papak' => json_encode([
                // 'masalah_kep_papak_1' => safe_post('masalah_kep_papak_1') !== '' ? safe_post('masalah_kep_papak_1') : null,
				// 'masalah_kep_papak_2' => safe_post('masalah_kep_papak_2') !== '' ? safe_post('masalah_kep_papak_2') : null,
				// 'masalah_kep_papak_3' => safe_post('masalah_kep_papak_3') !== '' ? safe_post('masalah_kep_papak_3') : null,
				// 'masalah_kep_papak_4' => safe_post('masalah_kep_papak_4') !== '' ? safe_post('masalah_kep_papak_4') : null,
                // 'masalah_kep_papak_5' => safe_post('masalah_kep_papak_5') !== '' ? safe_post('masalah_kep_papak_5') : null,
				// 'masalah_kep_papak_6' => safe_post('masalah_kep_papak_6') !== '' ? safe_post('masalah_kep_papak_6') : null,
				// 'masalah_kep_papak_7' => safe_post('masalah_kep_papak_7') !== '' ? safe_post('masalah_kep_papak_7') : null,
				'masalah_kep_papak_8' => safe_post('masalah_kep_papak_8') !== '' ? safe_post('masalah_kep_papak_8') : null,
                // 'masalah_kep_papak_9' => safe_post('masalah_kep_papak_9') !== '' ? safe_post('masalah_kep_papak_9') : null,
                // 'masalah_kep_papak_10' => safe_post('masalah_kep_papak_10') !== '' ? safe_post('masalah_kep_papak_10') : null,
                // 'masalah_kep_papak_11' => safe_post('masalah_kep_papak_11') !== '' ? safe_post('masalah_kep_papak_11') : null,
                // 'masalah_kep_papak_12' => safe_post('masalah_kep_papak_12') !== '' ? safe_post('masalah_kep_papak_12') : null,
                'masalah_kep_papak_13' => safe_post('masalah_kep_papak_13') !== '' ? safe_post('masalah_kep_papak_13') : null,
                // 'masalah_kep_papak_14' => safe_post('masalah_kep_papak_14') !== '' ? safe_post('masalah_kep_papak_14') : null,
                // 'masalah_kep_papak_15' => safe_post('masalah_kep_papak_15') !== '' ? safe_post('masalah_kep_papak_15') : null,
                'masalah_kep_papak_16' => safe_post('masalah_kep_papak_16') !== '' ? safe_post('masalah_kep_papak_16') : null,
            ]),

            'kebutuhan_papak' => json_encode([
                'kebutuhan_papak_1' => safe_post('kebutuhan_papak_1') !== '' ? safe_post('kebutuhan_papak_1') : null,
				'kebutuhan_papak_2' => safe_post('kebutuhan_papak_2') !== '' ? safe_post('kebutuhan_papak_2') : null,
				'kebutuhan_papak_3' => safe_post('kebutuhan_papak_3') !== '' ? safe_post('kebutuhan_papak_3') : null,
				'kebutuhan_papak_4' => safe_post('kebutuhan_papak_4') !== '' ? safe_post('kebutuhan_papak_4') : null,
				'kebutuhan_papak_5' => safe_post('kebutuhan_papak_5') !== '' ? safe_post('kebutuhan_papak_5') : null,
            ]),

            'apakah_papak' => json_encode([
                'apakah_papak_1' => safe_post('apakah_papak_1') !== '' ? safe_post('apakah_papak_1') : null,
				'apakah_papak_2' => safe_post('apakah_papak_2') !== '' ? safe_post('apakah_papak_2') : null,
				'apakah_papak_3' => safe_post('apakah_papak_3') !== '' ? safe_post('apakah_papak_3') : null,
				'apakah_papak_4' => safe_post('apakah_papak_4') !== '' ? safe_post('apakah_papak_4') : null,
				'apakah_papak_5' => safe_post('apakah_papak_5') !== '' ? safe_post('apakah_papak_5') : null,
				'apakah_papak_6' => safe_post('apakah_papak_6') !== '' ? safe_post('apakah_papak_6') : null,
            ]),

            'bagi_papak' => json_encode([
                'bagi_papak_1' => safe_post('bagi_papak_1') !== '' ? safe_post('bagi_papak_1') : null,
				'bagi_papak_2' => safe_post('bagi_papak_2') !== '' ? safe_post('bagi_papak_2') : null,
				'bagi_papak_3' => safe_post('bagi_papak_3') !== '' ? safe_post('bagi_papak_3') : null,
				'bagi_papak_4' => safe_post('bagi_papak_4') !== '' ? safe_post('bagi_papak_4') : null,
				'bagi_papak_5' => safe_post('bagi_papak_5') !== '' ? safe_post('bagi_papak_5') : null,
				'bagi_papak_6' => safe_post('bagi_papak_6') !== '' ? safe_post('bagi_papak_6') : null,
				'bagi_papak_7' => safe_post('bagi_papak_7') !== '' ? safe_post('bagi_papak_7') : null,
				'bagi_papak_8' => safe_post('bagi_papak_8') !== '' ? safe_post('bagi_papak_8') : null,
				'bagi_papak_9' => safe_post('bagi_papak_9') !== '' ? safe_post('bagi_papak_9') : null,
            ]),

            'mpn_papak' => json_encode([
                'mpn_papak_1' => safe_post('mpn_papak_1') !== '' ? safe_post('mpn_papak_1') : null,
                'mpn_papak_2' => safe_post('mpn_papak_2') !== '' ? safe_post('mpn_papak_2') : null,
            ]),



            'penilaian_papak' => json_encode([
                // 'penilaian_papak_1' => safe_post('penilaian_papak_1') !== '' ? safe_post('penilaian_papak_1') : null,
                // 'penilaian_papak_1' => safe_post('penilaian_papak_1') !== '' ? safe_post('penilaian_papak_1') : null,
                // 'penilaian_papak_1' => safe_post('penilaian_papak_1') !== '' ? safe_post('penilaian_papak_1') : null,
				'penilaian_papak_5' => safe_post('penilaian_papak_5') !== '' ? safe_post('penilaian_papak_5') : null,
				'penilaian_papak_6' => safe_post('penilaian_papak_6') !== '' ? safe_post('penilaian_papak_6') : null,
				// 'penilaian_papak_7' => safe_post('penilaian_papak_7') !== '' ? safe_post('penilaian_papak_7') : null,
                'penilaian_papak_8' => safe_post('penilaian_papak_8') !== '' ? safe_post('penilaian_papak_8') : null,
                'penilaian_papak_9' => safe_post('penilaian_papak_9') !== '' ? safe_post('penilaian_papak_9') : null,
                // 'penilaian_papak_10' => safe_post('penilaian_papak_10') !== '' ? safe_post('penilaian_papak_10') : null,
                // 'penilaian_papak_11' => safe_post('penilaian_papak_11') !== '' ? safe_post('penilaian_papak_11') : null,
                // 'penilaian_papak_12' => safe_post('penilaian_papak_12') !== '' ? safe_post('penilaian_papak_12') : null,
                // 'penilaian_papak_13' => safe_post('penilaian_papak_13') !== '' ? safe_post('penilaian_papak_13') : null,
                // 'penilaian_papak_14' => safe_post('penilaian_papak_14') !== '' ? safe_post('penilaian_papak_14') : null,
				// 'penilaian_papak_15' => safe_post('penilaian_papak_15') !== '' ? safe_post('penilaian_papak_15') : null,
				// 'penilaian_papak_16' => safe_post('penilaian_papak_16') !== '' ? safe_post('penilaian_papak_16') : null,
				// 'penilaian_papak_17' => safe_post('penilaian_papak_17') !== '' ? safe_post('penilaian_papak_17') : null,
				// 'penilaian_papak_18' => safe_post('penilaian_papak_18') !== '' ? safe_post('penilaian_papak_18') : null,
				// 'penilaian_papak_18' => safe_post('penilaian_papak_18') !== '' ? safe_post('penilaian_papak_18') : null,
                // 'penilaian_papak_20' => safe_post('penilaian_papak_20') !== '' ? safe_post('penilaian_papak_20') : null,

            ]),

           

            'urusan_papak' => json_encode([
                'urusan_papak_1' => safe_post('urusan_papak_1') !== '' ? safe_post('urusan_papak_1') : null,
                'urusan_papak_1' => safe_post('urusan_papak_1') !== '' ? safe_post('urusan_papak_1') : null,
				'urusan_papak_7' => safe_post('urusan_papak_7') !== '' ? safe_post('urusan_papak_7') : null,
				'urusan_papak_3' => safe_post('urusan_papak_3') !== '' ? safe_post('urusan_papak_3') : null,
				'urusan_papak_3' => safe_post('urusan_papak_3') !== '' ? safe_post('urusan_papak_3') : null,
				'urusan_papak_8' => safe_post('urusan_papak_8') !== '' ? safe_post('urusan_papak_8') : null,
				'urusan_papak_5' => safe_post('urusan_papak_5') !== '' ? safe_post('urusan_papak_5') : null,
				'urusan_papak_5' => safe_post('urusan_papak_5') !== '' ? safe_post('urusan_papak_5') : null,
				'urusan_papak_9' => safe_post('urusan_papak_9') !== '' ? safe_post('urusan_papak_9') : null,
            ]),


            'psikologis_papak' => json_encode([
                'psikologis_papak_1' => safe_post('psikologis_papak_1') !== '' ? safe_post('psikologis_papak_1') : null,
				'psikologis_papak_2' => safe_post('psikologis_papak_2') !== '' ? safe_post('psikologis_papak_2') : null,
				'psikologis_papak_3' => safe_post('psikologis_papak_3') !== '' ? safe_post('psikologis_papak_3') : null,
				'psikologis_papak_4' => safe_post('psikologis_papak_4') !== '' ? safe_post('psikologis_papak_4') : null,
				'psikologis_papak_5' => safe_post('psikologis_papak_5') !== '' ? safe_post('psikologis_papak_5') : null,
				'psikologis_papak_6' => safe_post('psikologis_papak_6') !== '' ? safe_post('psikologis_papak_6') : null,
				'psikologis_papak_7' => safe_post('psikologis_papak_7') !== '' ? safe_post('psikologis_papak_7') : null,
				'psikologis_papak_8' => safe_post('psikologis_papak_8') !== '' ? safe_post('psikologis_papak_8') : null,
				'psikologis_papak_8' => safe_post('psikologis_papak_8') !== '' ? safe_post('psikologis_papak_8') : null,
				'psikologis_papak_10' => safe_post('psikologis_papak_10') !== '' ? safe_post('psikologis_papak_10') : null,
				'psikologis_papak_11' => safe_post('psikologis_papak_11') !== '' ? safe_post('psikologis_papak_11') : null,
				'psikologis_papak_10' => safe_post('psikologis_papak_10') !== '' ? safe_post('psikologis_papak_10') : null,
				'psikologis_papak_13' => safe_post('psikologis_papak_13') !== '' ? safe_post('psikologis_papak_13') : null,
				'psikologis_papak_13' => safe_post('psikologis_papak_13') !== '' ? safe_post('psikologis_papak_13') : null,
            ]),

           
            // 'sn_penurunan_bb_papak'     => (safe_post('sn_penurunan_bb_papak') !== '' ? safe_post('sn_penurunan_bb_papak') : NULL),
            // 'sn_penurunan_bb_on_papak'  => (safe_post('sn_penurunan_bb_on_papak') !== '' ? safe_post('sn_penurunan_bb_on_papak') : NULL),
            // 'sn_asupan_makan_papak'     => (safe_post('sn_asupan_makan_papak') !== '' ? safe_post('sn_asupan_makan_papak') : NULL),
            // 'sn_total_papak'            => (safe_post('sn_total_papak') !== '' ? safe_post('sn_total_papak') : NULL), 
            
            'tanggal_jam_perawat_papak' => (safe_post('tanggal_jam_perawat_papak') !== '' ? datetime2mysql(safe_post('tanggal_jam_perawat_papak')) : NULL),
            'perawat_papak' => safe_post('perawat_papak') !== '' ? safe_post('perawat_papak') : NULL,
            'ttd_perawat_papak' => safe_post('ttd_perawat_papak') !== '' ? safe_post('ttd_perawat_papak') : NULL, 
        );	

        // var_dump('kewarganegaraan_papak');die;

		$sign = $this->db->select('papak.tgl_masuk_papak, papak.tgl_pengkajian_papak, papak.tanggal_jam_perawat_papak, papak.ttd_perawat_papak')
        ->from('sm_pengkajian_awal_pasien_akhir_kehidupan as papak')     
        ->where('papak.id_layanan_pendaftaran', $id_layanan_pendaftaran)
        ->get()
        ->row();   
		if (isset($sign)) : 
            // if ($sign->tgl_masuk_papak !== NULL) :
            //     $pengkajianAwalPasienAkhirKehidupan['tgl_masuk_papak'] = $sign->tgl_masuk_papak;
            // else :
            //     $pengkajianAwalPasienAkhirKehidupan['tgl_masuk_papak'] = (safe_post('tgl_masuk_papak') !== '' ? datetime2mysql(safe_post('tgl_masuk_papak')) : NULL);
            // endif;

            // if ($sign->tgl_pengkajian_papak !== NULL) :
            //     $pengkajianAwalPasienAkhirKehidupan['tgl_pengkajian_papak'] = $sign->tgl_pengkajian_papak;
            // else :
            //     $pengkajianAwalPasienAkhirKehidupan['tgl_pengkajian_papak'] = (safe_post('tgl_pengkajian_papak') !== '' ? datetime2mysql(safe_post('tgl_pengkajian_papak')) : NULL);
            // endif;
                     
			// if ($sign->tanggal_jam_perawat_papak !== NULL) :
            //     $pengkajianAwalPasienAkhirKehidupan['tanggal_jam_perawat_papak'] = $sign->tanggal_jam_perawat_papak;
            // else :
            //     $pengkajianAwalPasienAkhirKehidupan['tanggal_jam_perawat_papak'] = (safe_post('tanggal_jam_perawat_papak') !== '' ? datetime2mysql(safe_post('tanggal_jam_perawat_papak')) : NULL);
            // endif;

            if ($sign->ttd_perawat_papak !== NULL) :
                $pengkajianAwalPasienAkhirKehidupan['ttd_perawat_papak'] = $sign->ttd_perawat_papak;
            else :
                $pengkajianAwalPasienAkhirKehidupan['ttd_perawat_papak'] = (safe_post('ttd_perawat_papak') !== '' ? safe_post('ttd_perawat_papak') : NULL);
            endif;           
        endif;
        $this->pemeriksaan_poli->updatepengkajianAwalPasienAkhirKehidupan($pengkajianAwalPasienAkhirKehidupan, $id_papak);

		if (!empty($respon)) {

			$response = $respon;
		} else {

			$response = null;
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
            'id_pendaftaran' => ('id_pendaftaran'),
            'id_layanan_pendaftaran' => ('id_layanan_pendaftaran'),
			'respon' => $response,
		);

		$this->response($message, REST_Controller::HTTP_OK);
	}





    function getAlergiAuto_get() {

        $this->batas = 20;
        $q = safe_get('q');
        $page = safe_get('page');
        $group = safe_get('group');
        $start = (((int)$page - 1) * (int)$this->batas);
        $data = $this->pemeriksaan_poli->getAlergiAuto($group, $q, $start, $this->batas);
        if ((safe_get('page') == 1) & ($q == '')) {
            $pilih[] = array('id' => '0', 'name' => 'Pilih Alergi'); // Gunakan '0' agar tidak undefined
            $data['data'] = array_merge($pilih, $data['data']);
            $data['total'] += 1;
        }
        $this->response($data, REST_Controller::HTTP_OK);
        
    }

    function getPrognosisOptions_get()
    {
        $data = [
            'Baik' => 'Baik',
            'Dubia Et Bonam' => 'Dubia Et Bonam / Cenderung Baik',
            'Dubia Et Malam' => 'Dubia Et Malam / Cenderung Tidak Baik',
            'Tidak Baik' => 'Tidak Baik'
        ];

        $this->response($data, REST_Controller::HTTP_OK);
    }

}
