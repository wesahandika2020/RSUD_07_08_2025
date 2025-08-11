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
class Radiologi_log extends REST_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->batas = 10;
        date_default_timezone_set('Asia/Jakarta');
        $this->datetime = date('Y-m-d H:i:s');
        $this->load->model('App_model', 'm_default');
        $this->load->model('Radiologi_log_model', 'radiologi');

        // PPDRAD
		$this->load->model('pendaftaran/Pendaftaran_model', 'm_pendaftaran');

        
        $id_translucent = $this->session->userdata('id_translucent');
        if (empty($id_translucent)) :
            $this->response(array('error' => 'Anda belum login'), REST_Controller::HTTP_UNAUTHORIZED);
            exit();
        endif;
    }

    private function mulai($page)
    {
        return (((int)$page - 1) * (int)$this->batas);
    }

    function data_radiologi_hapus_get()
    {
        
        if (!$this->get('page')) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
        endif;

        $start = $this->mulai((int)$this->get('page'));
        $search = [
            'acc_numb' => safe_get('acc_numb'),
            'no_rm' => safe_get('no_rm'),
        ];

        $data = $this->radiologi->dataRadiologiDelete((int)$this->batas, (int)$start, $search);

        $data['page'] = (int) $this->get('page');
        $data['limit'] = (int)$this->batas;

        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK);
        endif;
    }

    private function awal($page)
    {
        return (((int)$page - 1) * (int)$this->batas);
    }

    function data_radiologi_acc_get()
    {
        
        if (!$this->get('page')) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
        endif;

        $search = [
            'acc_numb' => safe_get('acc_numb'),
            'no_rm' => safe_get('no_rm'),
        ];

        $start = $this->awal((int)$this->get('page'));

        $data = $this->radiologi->dataRadiologiLogAcc((int)$this->batas, (int)$start, $search);

        $data['page'] = (int) $this->get('page');
        $data['limit'] = (int)$this->batas;

        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK);
        endif;
    }



	// PPDRAD LOGS
	function get_permintaan_pemeriksaan_diagnostik_get(){
		$data['pendaftaran_detail'] = "";
		$data['list_permintaan_pemeriksaan_diagnostik'] = [];
		$data = $this->radiologi->getPendaftaranDetailTindakanRadiologi($this->get('id_pendaftaran', true), $this->get('id_layanan', true));
		$data['pendaftaran_detail'] = $this->radiologi->getPendaftaranDetailRadiologi($this->get('id_layanan_pendaftaran'));
		$data['list_permintaan_pemeriksaan_diagnostik'] = $this->radiologi->getPermintaanPemeriksaanDiagnostik($this->get('id_pendaftaran'));	
		$data['list_permintaan_pemeriksaan_diagnostik_logs'] = $this->radiologi->getPermintaanPemeriksaanDiagnostikLogs($this->get('id_pendaftaran'));	
		if ($data != null) {
			$this->response($data, REST_Controller::HTTP_OK);
		} else {
			$this->response($data, REST_Controller::HTTP_OK);
		}
	}

	// PPDRAD LOGS
	function simpan_permintaan_pemeriksaan_diagnostik_post(){
		$checkDataPpd = '';
		if (safe_post('id_ppd') !== '') {
			$checkDataPpd = $this->radiologi->getPermintaanPemeriksaanDiagnostikByID(safe_post('id_ppd'));
		}
		$this->db->trans_begin();
	
		if (empty($checkDataPpd)) {
			// INSERT DATA
			$data = array(
				'id_pendaftaran'			=> safe_post('id_pendaftaran'),
				'id_layanan_pendaftaran'    => safe_post('id_layanan_pendaftaran'),
				'no_formulir_ppd'           => safe_post('no_formulir_ppd') == '' ? null : safe_post('no_formulir_ppd'),
				'kode_pengirim_ppd'         => safe_post('kode_pengirim_ppd') == '' ? null : safe_post('kode_pengirim_ppd'),
				'kode_konsultan_ppd'        => safe_post('kode_konsultan_ppd') == '' ? null : safe_post('kode_konsultan_ppd'),
				'cito_ppd'              	=> safe_post('cito_ppd') == '' ? null : safe_post('cito_ppd'),
				'biasa_ppd'              	=> safe_post('biasa_ppd') == '' ? null : safe_post('biasa_ppd'),
				'hasil_ppd'              	=> safe_post('hasil_ppd') == '' ? null : safe_post('hasil_ppd'),
				'hasil_yg_ppd'              => safe_post('hasil_yg_ppd') == '' ? null : safe_post('hasil_yg_ppd'),
				'diagnose_ppd'              => safe_post('diagnose_ppd') == '' ? null : safe_post('diagnose_ppd'),
				'gasturoduodenoskopi_ppd'   => safe_post('gasturoduodenoskopi_ppd') == '' ? null : safe_post('gasturoduodenoskopi_ppd'),
				'endosonografi_ppd'         => safe_post('endosonografi_ppd') == '' ? null : safe_post('endosonografi_ppd'),
				'ercp_ppd'              	=> safe_post('ercp_ppd') == '' ? null : safe_post('ercp_ppd'),
				'kolonoskopi_ppd'           => safe_post('kolonoskopi_ppd') == '' ? null : safe_post('kolonoskopi_ppd'),
				'polipektomi_ppd'           => safe_post('polipektomi_ppd') == '' ? null : safe_post('polipektomi_ppd'),
				'ligasi_ppd'              	=> safe_post('ligasi_ppd') == '' ? null : safe_post('ligasi_ppd'),
				'rektosigmoidoskopi_ppd'    => safe_post('rektosigmoidoskopi_ppd') == '' ? null : safe_post('rektosigmoidoskopi_ppd'),
				'sklero_ppd'              	=> safe_post('sklero_ppd') == '' ? null : safe_post('sklero_ppd'),
				'kepela_ppd'              	=> safe_post('kepela_ppd') == '' ? null : safe_post('kepela_ppd'),
				'muskuloskeletel_ppd'       => safe_post('muskuloskeletel_ppd') == '' ? null : safe_post('muskuloskeletel_ppd'),
				'wrist_ppd'              	=> safe_post('wrist_ppd') == '' ? null : safe_post('wrist_ppd'),
				'guilding_ppd'              => safe_post('guilding_ppd') == '' ? null : safe_post('guilding_ppd'),
				'thyroid_ppd'              	=> safe_post('thyroid_ppd') == '' ? null : safe_post('thyroid_ppd'),
				'abdomen_ppd'              	=> safe_post('abdomen_ppd') == '' ? null : safe_post('abdomen_ppd'),
				'knee_ppd'              	=> safe_post('knee_ppd') == '' ? null : safe_post('knee_ppd'),
				'mammaei_ppd'              	=> safe_post('mammaei_ppd') == '' ? null : safe_post('mammaei_ppd'),
				'jantungg_ppd'              => safe_post('jantungg_ppd') == '' ? null : safe_post('jantungg_ppd'),
				'calcaneus_ppd'             => safe_post('calcaneus_ppd') == '' ? null : safe_post('calcaneus_ppd'),
				'whole_ppd'              	=> safe_post('whole_ppd') == '' ? null : safe_post('whole_ppd'),
				'ginekologii_ppd'           => safe_post('ginekologii_ppd') == '' ? null : safe_post('ginekologii_ppd'),
				'kepalai_ppd'              	=> safe_post('kepalai_ppd') == '' ? null : safe_post('kepalai_ppd'),
				'appendix_ppd'              => safe_post('appendix_ppd') == '' ? null : safe_post('appendix_ppd'),
				'extremitass_ppd'           => safe_post('extremitass_ppd') == '' ? null : safe_post('extremitass_ppd'),
				'abdomenr_ppd'              => safe_post('abdomenr_ppd') == '' ? null : safe_post('abdomenr_ppd'),
				'abdomen_atas_ppd'          => safe_post('abdomen_atas_ppd') == '' ? null : safe_post('abdomen_atas_ppd'),
				'shoulder_ppd'              => safe_post('shoulder_ppd') == '' ? null : safe_post('shoulder_ppd'),
				'hip_ppd'              		=> safe_post('hip_ppd') == '' ? null : safe_post('hip_ppd'),
				'vertebralis_ppd'           => safe_post('vertebralis_ppd') == '' ? null : safe_post('vertebralis_ppd'),
				'mammaeo_ppd'              	=> safe_post('mammaeo_ppd') == '' ? null : safe_post('mammaeo_ppd'),
				'kgb_ppd'              		=> safe_post('kgb_ppd') == '' ? null : safe_post('kgb_ppd'),
				'tcd_ppd'              		=> safe_post('tcd_ppd') == '' ? null : safe_post('tcd_ppd'),
				'heper_ppd'              	=> safe_post('heper_ppd') == '' ? null : safe_post('heper_ppd'),
				'exxtremitas_ppd'           => safe_post('exxtremitas_ppd') == '' ? null : safe_post('exxtremitas_ppd'),
				'sofft_ppd'              	=> safe_post('sofft_ppd') == '' ? null : safe_post('sofft_ppd'),
				'ginjal_ppd'              	=> safe_post('ginjal_ppd') == '' ? null : safe_post('ginjal_ppd'),
				'venaa_ppd'              	=> safe_post('venaa_ppd') == '' ? null : safe_post('venaa_ppd'),
				'scrotum_ppd'              	=> safe_post('scrotum_ppd') == '' ? null : safe_post('scrotum_ppd'),
				'usg3d_ppd'              	=> safe_post('usg3d_ppd') == '' ? null : safe_post('usg3d_ppd'),
				'faal_ppd'              	=> safe_post('faal_ppd') == '' ? null : safe_post('faal_ppd'),
				'bronkoskopi_ppd'           => safe_post('bronkoskopi_ppd') == '' ? null : safe_post('bronkoskopi_ppd'),
				'bunksi_ppd'              	=> safe_post('bunksi_ppd') == '' ? null : safe_post('bunksi_ppd'),
				'testt_ppd'              	=> safe_post('testt_ppd') == '' ? null : safe_post('testt_ppd'),
				'fallparu_ppd'              => safe_post('fallparu_ppd') == '' ? null : safe_post('fallparu_ppd'),
				'bronkoskeopi_ppd'          => safe_post('bronkoskeopi_ppd') == '' ? null : safe_post('bronkoskeopi_ppd'),
				'pleura_ppd'              	=> safe_post('pleura_ppd') == '' ? null : safe_post('pleura_ppd'),
				'bronkoskmopi_ppd'          => safe_post('bronkoskmopi_ppd') == '' ? null : safe_post('bronkoskmopi_ppd'),
				'gguidance_ppd'             => safe_post('gguidance_ppd') == '' ? null : safe_post('gguidance_ppd'),
				'transthorakal_ppd'         => safe_post('transthorakal_ppd') == '' ? null : safe_post('transthorakal_ppd'),
				'eeg_ppd'              		=> safe_post('eeg_ppd') == '' ? null : safe_post('eeg_ppd'),
				'audiometri_ppd'            => safe_post('audiometri_ppd') == '' ? null : safe_post('audiometri_ppd'),
				'treadmili_ppd'             => safe_post('treadmili_ppd') == '' ? null : safe_post('treadmili_ppd'),
				'erchokardiografi_ppd'      => safe_post('erchokardiografi_ppd') == '' ? null : safe_post('erchokardiografi_ppd'),
				'emg_ppd'              		=> safe_post('emg_ppd') == '' ? null : safe_post('emg_ppd'),
				'eng_ppd'              		=> safe_post('eng_ppd') == '' ? null : safe_post('eng_ppd'),
				'ekg_ppd'              		=> safe_post('ekg_ppd') == '' ? null : safe_post('ekg_ppd'),
				'ekchokardiografi_ppd'      => safe_post('ekchokardiografi_ppd') == '' ? null : safe_post('ekchokardiografi_ppd'),
				'impedans_ppd'              => safe_post('impedans_ppd') == '' ? null : safe_post('impedans_ppd'),
				'hotelekg_ppd'              => safe_post('hotelekg_ppd') == '' ? null : safe_post('hotelekg_ppd'),
				'eecp_ppd'              	=> safe_post('eecp_ppd') == '' ? null : safe_post('eecp_ppd'),
				'hotelekig_ppd'             => safe_post('hotelekig_ppd') == '' ? null : safe_post('hotelekig_ppd'),
				'kathererisasi_ppd'         => safe_post('kathererisasi_ppd') == '' ? null : safe_post('kathererisasi_ppd'),
				'pukul_ppd'              	=> safe_post('pukul_ppd') == '' ? null : safe_post('pukul_ppd'),
				'tanggal_ppd' 				=> safe_post('tanggal_ppd') == '' ? null : date2mysql(safe_post('tanggal_ppd')),
				'dokter_pengirim_ppd'		=> safe_post('dokter_pengirim_ppd') == '' ? null : safe_post('dokter_pengirim_ppd'),
				'id_users'					=> $this->session->userdata('id_translucent'),
				'created_date'				=> $this->datetime,
				'updated_date'             	=> $this->datetime	
			);
			$this->db->insert('sm_permintaan_pemeriksaan_diagnostik', $data);
	
		} else {
			// UPDATE DATA
			$data = array(
				'no_formulir_ppd'           => safe_post('no_formulir_ppd') == '' ? null : safe_post('no_formulir_ppd'),
				'kode_pengirim_ppd'         => safe_post('kode_pengirim_ppd') == '' ? null : safe_post('kode_pengirim_ppd'),
				'kode_konsultan_ppd'        => safe_post('kode_konsultan_ppd') == '' ? null : safe_post('kode_konsultan_ppd'),
				'cito_ppd'              	=> safe_post('cito_ppd') == '' ? null : safe_post('cito_ppd'),
				'biasa_ppd'              	=> safe_post('biasa_ppd') == '' ? null : safe_post('biasa_ppd'),
				'hasil_ppd'              	=> safe_post('hasil_ppd') == '' ? null : safe_post('hasil_ppd'),
				'hasil_yg_ppd'              => safe_post('hasil_yg_ppd') == '' ? null : safe_post('hasil_yg_ppd'),
				'diagnose_ppd'              => safe_post('diagnose_ppd') == '' ? null : safe_post('diagnose_ppd'),
				'gasturoduodenoskopi_ppd'   => safe_post('gasturoduodenoskopi_ppd') == '' ? null : safe_post('gasturoduodenoskopi_ppd'),
				'endosonografi_ppd'         => safe_post('endosonografi_ppd') == '' ? null : safe_post('endosonografi_ppd'),
				'ercp_ppd'              	=> safe_post('ercp_ppd') == '' ? null : safe_post('ercp_ppd'),
				'kolonoskopi_ppd'           => safe_post('kolonoskopi_ppd') == '' ? null : safe_post('kolonoskopi_ppd'),
				'polipektomi_ppd'           => safe_post('polipektomi_ppd') == '' ? null : safe_post('polipektomi_ppd'),
				'ligasi_ppd'              	=> safe_post('ligasi_ppd') == '' ? null : safe_post('ligasi_ppd'),
				'rektosigmoidoskopi_ppd'    => safe_post('rektosigmoidoskopi_ppd') == '' ? null : safe_post('rektosigmoidoskopi_ppd'),
				'sklero_ppd'              	=> safe_post('sklero_ppd') == '' ? null : safe_post('sklero_ppd'),
				'kepela_ppd'              	=> safe_post('kepela_ppd') == '' ? null : safe_post('kepela_ppd'),
				'muskuloskeletel_ppd'       => safe_post('muskuloskeletel_ppd') == '' ? null : safe_post('muskuloskeletel_ppd'),
				'wrist_ppd'              	=> safe_post('wrist_ppd') == '' ? null : safe_post('wrist_ppd'),
				'guilding_ppd'              => safe_post('guilding_ppd') == '' ? null : safe_post('guilding_ppd'),
				'thyroid_ppd'              	=> safe_post('thyroid_ppd') == '' ? null : safe_post('thyroid_ppd'),
				'abdomen_ppd'              	=> safe_post('abdomen_ppd') == '' ? null : safe_post('abdomen_ppd'),
				'knee_ppd'              	=> safe_post('knee_ppd') == '' ? null : safe_post('knee_ppd'),
				'mammaei_ppd'              	=> safe_post('mammaei_ppd') == '' ? null : safe_post('mammaei_ppd'),
				'jantungg_ppd'              => safe_post('jantungg_ppd') == '' ? null : safe_post('jantungg_ppd'),
				'calcaneus_ppd'             => safe_post('calcaneus_ppd') == '' ? null : safe_post('calcaneus_ppd'),
				'whole_ppd'              	=> safe_post('whole_ppd') == '' ? null : safe_post('whole_ppd'),
				'ginekologii_ppd'           => safe_post('ginekologii_ppd') == '' ? null : safe_post('ginekologii_ppd'),
				'kepalai_ppd'              	=> safe_post('kepalai_ppd') == '' ? null : safe_post('kepalai_ppd'),
				'appendix_ppd'              => safe_post('appendix_ppd') == '' ? null : safe_post('appendix_ppd'),
				'extremitass_ppd'           => safe_post('extremitass_ppd') == '' ? null : safe_post('extremitass_ppd'),
				'abdomenr_ppd'              => safe_post('abdomenr_ppd') == '' ? null : safe_post('abdomenr_ppd'),
				'abdomen_atas_ppd'          => safe_post('abdomen_atas_ppd') == '' ? null : safe_post('abdomen_atas_ppd'),
				'shoulder_ppd'              => safe_post('shoulder_ppd') == '' ? null : safe_post('shoulder_ppd'),
				'hip_ppd'              		=> safe_post('hip_ppd') == '' ? null : safe_post('hip_ppd'),
				'vertebralis_ppd'           => safe_post('vertebralis_ppd') == '' ? null : safe_post('vertebralis_ppd'),
				'mammaeo_ppd'              	=> safe_post('mammaeo_ppd') == '' ? null : safe_post('mammaeo_ppd'),
				'kgb_ppd'              		=> safe_post('kgb_ppd') == '' ? null : safe_post('kgb_ppd'),
				'tcd_ppd'              		=> safe_post('tcd_ppd') == '' ? null : safe_post('tcd_ppd'),
				'heper_ppd'              	=> safe_post('heper_ppd') == '' ? null : safe_post('heper_ppd'),
				'exxtremitas_ppd'           => safe_post('exxtremitas_ppd') == '' ? null : safe_post('exxtremitas_ppd'),
				'sofft_ppd'              	=> safe_post('sofft_ppd') == '' ? null : safe_post('sofft_ppd'),
				'ginjal_ppd'              	=> safe_post('ginjal_ppd') == '' ? null : safe_post('ginjal_ppd'),
				'venaa_ppd'              	=> safe_post('venaa_ppd') == '' ? null : safe_post('venaa_ppd'),
				'scrotum_ppd'              	=> safe_post('scrotum_ppd') == '' ? null : safe_post('scrotum_ppd'),
				'usg3d_ppd'              	=> safe_post('usg3d_ppd') == '' ? null : safe_post('usg3d_ppd'),
				'faal_ppd'              	=> safe_post('faal_ppd') == '' ? null : safe_post('faal_ppd'),
				'bronkoskopi_ppd'           => safe_post('bronkoskopi_ppd') == '' ? null : safe_post('bronkoskopi_ppd'),
				'bunksi_ppd'              	=> safe_post('bunksi_ppd') == '' ? null : safe_post('bunksi_ppd'),
				'testt_ppd'              	=> safe_post('testt_ppd') == '' ? null : safe_post('testt_ppd'),
				'fallparu_ppd'              => safe_post('fallparu_ppd') == '' ? null : safe_post('fallparu_ppd'),
				'bronkoskeopi_ppd'          => safe_post('bronkoskeopi_ppd') == '' ? null : safe_post('bronkoskeopi_ppd'),
				'pleura_ppd'              	=> safe_post('pleura_ppd') == '' ? null : safe_post('pleura_ppd'),
				'bronkoskmopi_ppd'          => safe_post('bronkoskmopi_ppd') == '' ? null : safe_post('bronkoskmopi_ppd'),
				'gguidance_ppd'             => safe_post('gguidance_ppd') == '' ? null : safe_post('gguidance_ppd'),
				'transthorakal_ppd'         => safe_post('transthorakal_ppd') == '' ? null : safe_post('transthorakal_ppd'),
				'eeg_ppd'              		=> safe_post('eeg_ppd') == '' ? null : safe_post('eeg_ppd'),
				'audiometri_ppd'            => safe_post('audiometri_ppd') == '' ? null : safe_post('audiometri_ppd'),
				'treadmili_ppd'             => safe_post('treadmili_ppd') == '' ? null : safe_post('treadmili_ppd'),
				'erchokardiografi_ppd'      => safe_post('erchokardiografi_ppd') == '' ? null : safe_post('erchokardiografi_ppd'),
				'emg_ppd'              		=> safe_post('emg_ppd') == '' ? null : safe_post('emg_ppd'),
				'eng_ppd'              		=> safe_post('eng_ppd') == '' ? null : safe_post('eng_ppd'),
				'ekg_ppd'              		=> safe_post('ekg_ppd') == '' ? null : safe_post('ekg_ppd'),
				'ekchokardiografi_ppd'      => safe_post('ekchokardiografi_ppd') == '' ? null : safe_post('ekchokardiografi_ppd'),
				'impedans_ppd'              => safe_post('impedans_ppd') == '' ? null : safe_post('impedans_ppd'),
				'hotelekg_ppd'              => safe_post('hotelekg_ppd') == '' ? null : safe_post('hotelekg_ppd'),
				'eecp_ppd'              	=> safe_post('eecp_ppd') == '' ? null : safe_post('eecp_ppd'),
				'hotelekig_ppd'             => safe_post('hotelekig_ppd') == '' ? null : safe_post('hotelekig_ppd'),
				'kathererisasi_ppd'         => safe_post('kathererisasi_ppd') == '' ? null : safe_post('kathererisasi_ppd'),
				'pukul_ppd'              	=> safe_post('pukul_ppd') == '' ? null : safe_post('pukul_ppd'),
				'tanggal_ppd' 				=> safe_post('tanggal_ppd') == '' ? null : date2mysql(safe_post('tanggal_ppd')),
				'dokter_pengirim_ppd'		=> safe_post('dokter_pengirim_ppd') == '' ? null : safe_post('dokter_pengirim_ppd'),
				'id_users'                 	=> $this->session->userdata('id_translucent'),
				'updated_date'              => $this->datetime
			);
	
			// HANYA SIMPAN FIELD VALID KE DALAM LOG
			$logData = array(
				// 'id'                      => $checkDataPpd->id,
				'id_pendaftaran'      		=> $checkDataPpd->id_pendaftaran,
				'id_layanan_pendaftaran'  	=> $checkDataPpd->id_layanan_pendaftaran,
				'no_formulir_ppd'         	=> $checkDataPpd->no_formulir_ppd,
				'kode_pengirim_ppd'         => $checkDataPpd->kode_pengirim_ppd,
				'kode_konsultan_ppd'        => $checkDataPpd->kode_konsultan_ppd,
				'cito_ppd'       			=> $checkDataPpd->cito_ppd,
				'biasa_ppd'      			=> $checkDataPpd->biasa_ppd,
				'hasil_ppd'  				=> $checkDataPpd->hasil_ppd,
				'hasil_yg_ppd'          	=> $checkDataPpd->hasil_yg_ppd,
				'diagnose_ppd'				=> $checkDataPpd->diagnose_ppd,
				'gasturoduodenoskopi_ppd'   => $checkDataPpd->gasturoduodenoskopi_ppd,
				'endosonografi_ppd'         => $checkDataPpd->endosonografi_ppd,
				'ercp_ppd'             		=> $checkDataPpd->ercp_ppd,
				'kolonoskopi_ppd'           => $checkDataPpd->kolonoskopi_ppd,
				'polipektomi_ppd'           => $checkDataPpd->polipektomi_ppd,
				'ligasi_ppd'             	=> $checkDataPpd->ligasi_ppd,
				'rektosigmoidoskopi_ppd'    => $checkDataPpd->rektosigmoidoskopi_ppd,
				'sklero_ppd'             	=> $checkDataPpd->sklero_ppd,
				'kepela_ppd'             	=> $checkDataPpd->kepela_ppd,
				'muskuloskeletel_ppd'       => $checkDataPpd->muskuloskeletel_ppd,
				'wrist_ppd'             	=> $checkDataPpd->wrist_ppd,
				'guilding_ppd'             	=> $checkDataPpd->guilding_ppd,
				'thyroid_ppd'             	=> $checkDataPpd->thyroid_ppd,
				'abdomen_ppd'             	=> $checkDataPpd->abdomen_ppd,
				'knee_ppd'             		=> $checkDataPpd->knee_ppd,
				'mammaei_ppd'             	=> $checkDataPpd->mammaei_ppd,
				'jantungg_ppd'             	=> $checkDataPpd->jantungg_ppd,
				'calcaneus_ppd'             => $checkDataPpd->calcaneus_ppd,
				'whole_ppd'             	=> $checkDataPpd->whole_ppd,
				'ginekologii_ppd'           => $checkDataPpd->ginekologii_ppd,
				'kepalai_ppd'             	=> $checkDataPpd->kepalai_ppd,
				'appendix_ppd'             	=> $checkDataPpd->appendix_ppd,
				'extremitass_ppd'           => $checkDataPpd->extremitass_ppd,
				'abdomenr_ppd'             	=> $checkDataPpd->abdomenr_ppd,
				'abdomen_atas_ppd'          => $checkDataPpd->abdomen_atas_ppd,
				'shoulder_ppd'             	=> $checkDataPpd->shoulder_ppd,
				'hip_ppd'             		=> $checkDataPpd->hip_ppd,
				'vertebralis_ppd'           => $checkDataPpd->vertebralis_ppd,
				'mammaeo_ppd'             	=> $checkDataPpd->mammaeo_ppd,
				'kgb_ppd'             		=> $checkDataPpd->kgb_ppd,
				'tcd_ppd'             		=> $checkDataPpd->tcd_ppd,
				'heper_ppd'             	=> $checkDataPpd->heper_ppd,
				'exxtremitas_ppd'           => $checkDataPpd->exxtremitas_ppd,
				'sofft_ppd'             	=> $checkDataPpd->sofft_ppd,
				'ginjal_ppd'             	=> $checkDataPpd->ginjal_ppd,
				'venaa_ppd'             	=> $checkDataPpd->venaa_ppd,
				'scrotum_ppd'             	=> $checkDataPpd->scrotum_ppd,
				'usg3d_ppd'             	=> $checkDataPpd->usg3d_ppd,
				'faal_ppd'             		=> $checkDataPpd->faal_ppd,
				'bronkoskopi_ppd'           => $checkDataPpd->bronkoskopi_ppd,
				'bunksi_ppd'             	=> $checkDataPpd->bunksi_ppd,
				'testt_ppd'             	=> $checkDataPpd->testt_ppd,
				'fallparu_ppd'             	=> $checkDataPpd->fallparu_ppd,
				'bronkoskeopi_ppd'          => $checkDataPpd->bronkoskeopi_ppd,
				'pleura_ppd'             	=> $checkDataPpd->pleura_ppd,
				'bronkoskmopi_ppd'          => $checkDataPpd->bronkoskmopi_ppd,
				'gguidance_ppd'            	=> $checkDataPpd->gguidance_ppd,
				'transthorakal_ppd'         => $checkDataPpd->transthorakal_ppd,
				'eeg_ppd'             		=> $checkDataPpd->eeg_ppd,
				'audiometri_ppd'            => $checkDataPpd->audiometri_ppd,
				'treadmili_ppd'             => $checkDataPpd->treadmili_ppd,
				'erchokardiografi_ppd'      => $checkDataPpd->erchokardiografi_ppd,
				'emg_ppd'             		=> $checkDataPpd->emg_ppd,
				'eng_ppd'             		=> $checkDataPpd->eng_ppd,
				'ekg_ppd'             		=> $checkDataPpd->ekg_ppd,
				'ekchokardiografi_ppd'      => $checkDataPpd->ekchokardiografi_ppd,
				'impedans_ppd'             	=> $checkDataPpd->impedans_ppd,
				'hotelekg_ppd'             	=> $checkDataPpd->hotelekg_ppd,
				'eecp_ppd'             		=> $checkDataPpd->eecp_ppd,
				'hotelekig_ppd'            	=> $checkDataPpd->hotelekig_ppd,
				'kathererisasi_ppd'         => $checkDataPpd->kathererisasi_ppd,
				'pukul_ppd'             	=> $checkDataPpd->pukul_ppd,
				'tanggal_ppd'             	=> $checkDataPpd->tanggal_ppd,
				'dokter_pengirim_ppd'       => $checkDataPpd->dokter_pengirim_ppd,
				'id_users'                	=> $checkDataPpd->id_users,
				'created_date'            	=> $this->datetime,
				'log_action'              	=> 'update'
			);
			$this->db->insert('sm_permintaan_pemeriksaan_diagnostik_logs', $logData);
	
			$this->db->where('id', safe_post('id_ppd'));
			$this->db->update('sm_permintaan_pemeriksaan_diagnostik', $data);
		}
	
		if ($this->db->trans_status() === false) {
			$this->db->trans_rollback();
			$status = false;
			$message = 'Gagal simpan Data';
		} else {
			$this->db->trans_commit();
			$status = true;
			$message = 'Berhasil simpan Data';
		}
	
		$this->response(array('status' => $status, 'message' => $message), REST_Controller::HTTP_OK);
	}

	// PPDRAD LOGS
	function hapus_permintaan_pemeriksaan_diagnostik_post(){
		if (!safe_post('id', true)) :
			$this->response(null, REST_Controller::HTTP_BAD_REQUEST);
		endif;
	
		// Ambil data sebelum dihapus
		$diagnotstik = $this->db->where('id', safe_post('id'))->get('sm_permintaan_pemeriksaan_diagnostik')->row();
	
		$this->db->trans_begin();
	
		if ($diagnotstik) {
			// Simpan ke log
			$logDataDgstik = array(
				'id_pendaftaran'          	=> $diagnotstik->id_pendaftaran,
				'id_layanan_pendaftaran'  	=> $diagnotstik->id_layanan_pendaftaran,
				'no_formulir_ppd'         	=> $diagnotstik->no_formulir_ppd,
				'kode_pengirim_ppd'         => $diagnotstik->kode_pengirim_ppd,
				'kode_konsultan_ppd'        => $diagnotstik->kode_konsultan_ppd,
				'cito_ppd'       			=> $diagnotstik->cito_ppd,
				'biasa_ppd'      			=> $diagnotstik->biasa_ppd,
				'hasil_ppd'  				=> $diagnotstik->hasil_ppd,
				'hasil_yg_ppd'          	=> $diagnotstik->hasil_yg_ppd,
				'diagnose_ppd'				=> $diagnotstik->diagnose_ppd,
				'gasturoduodenoskopi_ppd'   => $diagnotstik->gasturoduodenoskopi_ppd,
				'endosonografi_ppd'         => $diagnotstik->endosonografi_ppd,
				'ercp_ppd'             		=> $diagnotstik->ercp_ppd,
				'kolonoskopi_ppd'           => $diagnotstik->kolonoskopi_ppd,
				'polipektomi_ppd'           => $diagnotstik->polipektomi_ppd,
				'ligasi_ppd'             	=> $diagnotstik->ligasi_ppd,
				'rektosigmoidoskopi_ppd'    => $diagnotstik->rektosigmoidoskopi_ppd,
				'sklero_ppd'             	=> $diagnotstik->sklero_ppd,
				'kepela_ppd'             	=> $diagnotstik->kepela_ppd,
				'muskuloskeletel_ppd'       => $diagnotstik->muskuloskeletel_ppd,
				'wrist_ppd'             	=> $diagnotstik->wrist_ppd,
				'guilding_ppd'             	=> $diagnotstik->guilding_ppd,
				'thyroid_ppd'             	=> $diagnotstik->thyroid_ppd,
				'abdomen_ppd'             	=> $diagnotstik->abdomen_ppd,
				'knee_ppd'             		=> $diagnotstik->knee_ppd,
				'mammaei_ppd'             	=> $diagnotstik->mammaei_ppd,
				'jantungg_ppd'             	=> $diagnotstik->jantungg_ppd,
				'calcaneus_ppd'             => $diagnotstik->calcaneus_ppd,
				'whole_ppd'             	=> $diagnotstik->whole_ppd,
				'ginekologii_ppd'           => $diagnotstik->ginekologii_ppd,
				'kepalai_ppd'             	=> $diagnotstik->kepalai_ppd,
				'appendix_ppd'             	=> $diagnotstik->appendix_ppd,
				'extremitass_ppd'           => $diagnotstik->extremitass_ppd,
				'abdomenr_ppd'             	=> $diagnotstik->abdomenr_ppd,
				'abdomen_atas_ppd'          => $diagnotstik->abdomen_atas_ppd,
				'shoulder_ppd'             	=> $diagnotstik->shoulder_ppd,
				'hip_ppd'             		=> $diagnotstik->hip_ppd,
				'vertebralis_ppd'           => $diagnotstik->vertebralis_ppd,
				'mammaeo_ppd'             	=> $diagnotstik->mammaeo_ppd,
				'kgb_ppd'             		=> $diagnotstik->kgb_ppd,
				'tcd_ppd'             		=> $diagnotstik->tcd_ppd,
				'heper_ppd'             	=> $diagnotstik->heper_ppd,
				'exxtremitas_ppd'           => $diagnotstik->exxtremitas_ppd,
				'sofft_ppd'             	=> $diagnotstik->sofft_ppd,
				'ginjal_ppd'             	=> $diagnotstik->ginjal_ppd,
				'venaa_ppd'             	=> $diagnotstik->venaa_ppd,
				'scrotum_ppd'             	=> $diagnotstik->scrotum_ppd,
				'usg3d_ppd'             	=> $diagnotstik->usg3d_ppd,
				'faal_ppd'             		=> $diagnotstik->faal_ppd,
				'bronkoskopi_ppd'           => $diagnotstik->bronkoskopi_ppd,
				'bunksi_ppd'             	=> $diagnotstik->bunksi_ppd,
				'testt_ppd'             	=> $diagnotstik->testt_ppd,
				'fallparu_ppd'             	=> $diagnotstik->fallparu_ppd,
				'bronkoskeopi_ppd'          => $diagnotstik->bronkoskeopi_ppd,
				'pleura_ppd'             	=> $diagnotstik->pleura_ppd,
				'bronkoskmopi_ppd'          => $diagnotstik->bronkoskmopi_ppd,
				'gguidance_ppd'            	=> $diagnotstik->gguidance_ppd,
				'transthorakal_ppd'         => $diagnotstik->transthorakal_ppd,
				'eeg_ppd'             		=> $diagnotstik->eeg_ppd,
				'audiometri_ppd'            => $diagnotstik->audiometri_ppd,
				'treadmili_ppd'             => $diagnotstik->treadmili_ppd,
				'erchokardiografi_ppd'      => $diagnotstik->erchokardiografi_ppd,
				'emg_ppd'             		=> $diagnotstik->emg_ppd,
				'eng_ppd'             		=> $diagnotstik->eng_ppd,
				'ekg_ppd'             		=> $diagnotstik->ekg_ppd,
				'ekchokardiografi_ppd'      => $diagnotstik->ekchokardiografi_ppd,
				'impedans_ppd'             	=> $diagnotstik->impedans_ppd,
				'hotelekg_ppd'             	=> $diagnotstik->hotelekg_ppd,
				'eecp_ppd'             		=> $diagnotstik->eecp_ppd,
				'hotelekig_ppd'            	=> $diagnotstik->hotelekig_ppd,
				'kathererisasi_ppd'         => $diagnotstik->kathererisasi_ppd,
				'pukul_ppd'             	=> $diagnotstik->pukul_ppd,
				'tanggal_ppd'             	=> $diagnotstik->tanggal_ppd,
				'dokter_pengirim_ppd'       => $diagnotstik->dokter_pengirim_ppd,
				'id_users'                	=> $diagnotstik->id_users,
				'created_date'            	=> $this->datetime,
				'log_action'              	=> 'delete'
			);
			$this->db->insert('sm_permintaan_pemeriksaan_diagnostik_logs', $logDataDgstik);
		}
	
		// Hapus data utama
		$this->db->where('id', safe_post('id'))->delete('sm_permintaan_pemeriksaan_diagnostik');
	
		if ($this->db->trans_status() === false) :
			$this->db->trans_rollback();
			$status = false;
			$message = 'Gagal Hapus Data';
		else :
			$this->db->trans_commit();
			$status = true;
			$message = 'Berhasil Hapus Data';
		endif;
	
		$this->response(array('status' => $status, 'message' => $message), REST_Controller::HTTP_OK);
	}
	
	// PPDRAD
	function edit_permintaan_pemeriksaan_diagnostik_get(){
		$data['pendaftaran_detail'] = "";
		$data['pemeriksaan_diagnostik'] = "";
		$data['pendaftaran_detail'] = $this->radiologi->getPendaftaranDetailRadiologi($this->get('id_layanan_pendaftaran'));
		$data['pemeriksaan_diagnostik'] = $this->radiologi->getPermintaanPemeriksaanDiagnostikByID($this->get('id'));
		if ($data != null) {
			$this->response($data, REST_Controller::HTTP_OK);
		} else {
			$this->response($data, REST_Controller::HTTP_OK);
		}
	}








	// LHOPI LOGS
	function get_lembar_hand_over_pasien_igd_rsudtng_get(){
		$data['pendaftaran_detail'] = "";
		$data['list_lembar_hand_over_pasien_igd_rsudtng'] = [];
		$data = $this->radiologi->getPendaftaranDetailTindakanRadiologi($this->get('id_pendaftaran', true), $this->get('id_layanan', true));
		$data['pendaftaran_detail'] = $this->radiologi->getPendaftaranDetailRadiologi($this->get('id_layanan_pendaftaran'));
		$data['list_lembar_hand_over_pasien_igd_rsudtng'] = $this->radiologi->getLembarHandOverPasienIGD($this->get('id_pendaftaran'));	
		$data['list_lembar_hand_over_pasien_igd_rsudtng_logs'] = $this->radiologi->getLembarHandOverPasienIGDLogs($this->get('id_pendaftaran'));	
		if ($data != null) {
			$this->response($data, REST_Controller::HTTP_OK);
		} else {
			$this->response($data, REST_Controller::HTTP_OK);
		}
	}

	// LHOPI LOGS
	function simpan_lembar_hand_over_pasien_post(){
		$checkDataLHOPI = '';
		if (safe_post('id_lhopi') !== '') {
			$checkDataLHOPI = $this->radiologi->getLembarHandOverPasienIGDByID(safe_post('id_lhopi'));
		}
		$this->db->trans_begin();
	
		if (empty($checkDataLHOPI)) {
			// INSERT DATA
			$data = array(
				'id_pendaftaran'			=> safe_post('id_pendaftaran'),
				'id_layanan_pendaftaran'    => safe_post('id_layanan_pendaftaran'),
				'shift_lhopi'				=> safe_post('shift_lhopi') == '' ? null : safe_post('shift_lhopi'),
				'bed_lhopi'					=> safe_post('bed_lhopi') == '' ? null : safe_post('bed_lhopi'),
				'diagnosa_lhopi'			=> safe_post('diagnosa_lhopi') == '' ? null : safe_post('diagnosa_lhopi'),
				'rencana_tatalaksana_lhopi'	=> safe_post('rencana_tatalaksana_lhopi') == '' ? null : safe_post('rencana_tatalaksana_lhopi'),
				'keterangan_lhopi'			=> safe_post('keterangan_lhopi') == '' ? null : safe_post('keterangan_lhopi'),
				'tanggal_lhopi' 			=> safe_post('tanggal_lhopi') == '' ? null : date2mysql(safe_post('tanggal_lhopi')),
				'dpjp_lhopi'				=> safe_post('dpjp_lhopi') == '' ? null : safe_post('dpjp_lhopi'),
				'mengoverkan_lhopi'			=> safe_post('mengoverkan_lhopi') == '' ? null : safe_post('mengoverkan_lhopi'),
				'menerima_lhopi'			=> safe_post('menerima_lhopi') == '' ? null : safe_post('menerima_lhopi'),
				'id_users'					=> $this->session->userdata('id_translucent'),
				'created_date'				=> $this->datetime,
				'updated_date'             	=> $this->datetime	
			);
			$this->db->insert('sm_lembar_hand_over_pasien_igd', $data);
	
		} else {
			// UPDATE DATA
			$data = array(
				'shift_lhopi'				=> safe_post('shift_lhopi') == '' ? null : safe_post('shift_lhopi'),
				'bed_lhopi'					=> safe_post('bed_lhopi') == '' ? null : safe_post('bed_lhopi'),
				'diagnosa_lhopi'			=> safe_post('diagnosa_lhopi') == '' ? null : safe_post('diagnosa_lhopi'),
				'rencana_tatalaksana_lhopi'	=> safe_post('rencana_tatalaksana_lhopi') == '' ? null : safe_post('rencana_tatalaksana_lhopi'),
				'keterangan_lhopi'			=> safe_post('keterangan_lhopi') == '' ? null : safe_post('keterangan_lhopi'),
				'tanggal_lhopi' 			=> safe_post('tanggal_lhopi') == '' ? null : date2mysql(safe_post('tanggal_lhopi')),
				'dpjp_lhopi'				=> safe_post('dpjp_lhopi') == '' ? null : safe_post('dpjp_lhopi'),
				'mengoverkan_lhopi'			=> safe_post('mengoverkan_lhopi') == '' ? null : safe_post('mengoverkan_lhopi'),
				'menerima_lhopi'			=> safe_post('menerima_lhopi') == '' ? null : safe_post('menerima_lhopi'),
				'id_users'                 	=> $this->session->userdata('id_translucent'),
				'updated_date'              => $this->datetime
			);
	
			// HANYA SIMPAN FIELD VALID KE DALAM LOG
			$logData = array(
				'id_pendaftaran'      		=> $checkDataLHOPI->id_pendaftaran,
				'id_layanan_pendaftaran'  	=> $checkDataLHOPI->id_layanan_pendaftaran,
				'shift_lhopi'             	=> $checkDataLHOPI->shift_lhopi,
				'bed_lhopi'             	=> $checkDataLHOPI->bed_lhopi,
				'diagnosa_lhopi'       		=> $checkDataLHOPI->diagnosa_lhopi,
				'rencana_tatalaksana_lhopi' => $checkDataLHOPI->rencana_tatalaksana_lhopi,
				'keterangan_lhopi'       	=> $checkDataLHOPI->keterangan_lhopi,
				'tanggal_lhopi'       		=> $checkDataLHOPI->tanggal_lhopi,
				'dpjp_lhopi'       			=> $checkDataLHOPI->dpjp_lhopi,
				'mengoverkan_lhopi'       	=> $checkDataLHOPI->mengoverkan_lhopi,
				'menerima_lhopi'       		=> $checkDataLHOPI->menerima_lhopi,
				'id_users'                	=> $checkDataLHOPI->id_users,
				'created_date'            	=> $checkDataLHOPI->created_date,
				'updated_date'            	=> $this->datetime,
				'log_action'              	=> 'update'
			);
			$this->db->insert('sm_lembar_hand_over_pasien_igd_logs', $logData);
	
			$this->db->where('id', safe_post('id_lhopi'));
			$this->db->update('sm_lembar_hand_over_pasien_igd', $data);
		}
	
		if ($this->db->trans_status() === false) {
			$this->db->trans_rollback();
			$status = false;
			$message = 'Gagal simpan Data';
		} else {
			$this->db->trans_commit();
			$status = true;
			$message = 'Berhasil simpan Data';
		}
	
		$this->response(array('status' => $status, 'message' => $message), REST_Controller::HTTP_OK);
	}

	// LHOPI LOGS
	function hapus_lembar_hand_over_pasien_igd_post(){
		if (!safe_post('id', true)) :
			$this->response(null, REST_Controller::HTTP_BAD_REQUEST);
		endif;
	
		// Ambil data sebelum dihapus
		$lhopiHapus = $this->db->where('id', safe_post('id'))->get('sm_lembar_hand_over_pasien_igd')->row();
	
		$this->db->trans_begin();
	
		if ($lhopiHapus) {
			// Simpan ke log
			$logDataLhopi = array(
				'id_pendaftaran'          	=> $lhopiHapus->id_pendaftaran,
				'id_layanan_pendaftaran'  	=> $lhopiHapus->id_layanan_pendaftaran,
				'shift_lhopi'             	=> $lhopiHapus->shift_lhopi,
				'bed_lhopi'             	=> $lhopiHapus->bed_lhopi,
				'diagnosa_lhopi'       		=> $lhopiHapus->diagnosa_lhopi,
				'rencana_tatalaksana_lhopi' => $lhopiHapus->rencana_tatalaksana_lhopi,
				'keterangan_lhopi'       	=> $lhopiHapus->keterangan_lhopi,
				'tanggal_lhopi'       		=> $lhopiHapus->tanggal_lhopi,
				'dpjp_lhopi'       			=> $lhopiHapus->dpjp_lhopi,
				'mengoverkan_lhopi'       	=> $lhopiHapus->mengoverkan_lhopi,
				'menerima_lhopi'       		=> $lhopiHapus->menerima_lhopi,
				'id_users'                	=> $lhopiHapus->id_users,
				'created_date'            	=> $lhopiHapus->created_date,
				'updated_date'            	=> $this->datetime,
				'log_action'              	=> 'delete'
			);
			$this->db->insert('sm_lembar_hand_over_pasien_igd_logs', $logDataLhopi);
		}
	
		// Hapus data utama
		$this->db->where('id', safe_post('id'))->delete('sm_lembar_hand_over_pasien_igd');
	
		if ($this->db->trans_status() === false) :
			$this->db->trans_rollback();
			$status = false;
			$message = 'Gagal Hapus Data';
		else :
			$this->db->trans_commit();
			$status = true;
			$message = 'Berhasil Hapus Data';
		endif;
	
		$this->response(array('status' => $status, 'message' => $message), REST_Controller::HTTP_OK);
	}
	
	// LHOPI
	function edit_lembar_hand_over_pasien_igd_get(){
		$data['pendaftaran_detail'] = "";
		$data['edit_lembar_hand'] = "";
		$data['pendaftaran_detail'] = $this->radiologi->getPendaftaranDetailRadiologi($this->get('id_layanan_pendaftaran'));
		$data['edit_lembar_hand'] = $this->radiologi->getLembarHandOverPasienIGDByID($this->get('id'));
		if ($data != null) {
			$this->response($data, REST_Controller::HTTP_OK);
		} else {
			$this->response($data, REST_Controller::HTTP_OK);
		}
	}

	// RPRDL 
	function get_rencana_pasien_rujukan_dari_luar_get(){
		$data['pendaftaran_detail'] = "";
		$data['list_rencana_rujukan_pasien_dari_luar_rsudtng'] = [];
		$data = $this->radiologi->getPendaftaranDetailTindakanRadiologi($this->get('id_pendaftaran', true), $this->get('id_layanan', true));
		$data['pendaftaran_detail'] = $this->radiologi->getPendaftaranDetailRadiologi($this->get('id_layanan_pendaftaran'));
		$data['list_rencana_rujukan_pasien_dari_luar_rsudtng'] = $this->radiologi->getRencanaRujukanPasienDariLuarIGD($this->get('id_pendaftaran'));	
		$data['list_rencana_rujukan_pasien_dari_luar_rsudtng_logs'] = $this->radiologi->getRencanaRujukanPasienDariLuarIGDLogs($this->get('id_pendaftaran'));	
		if ($data != null) {
			$this->response($data, REST_Controller::HTTP_OK);
		} else {
			$this->response($data, REST_Controller::HTTP_OK);
		}
	}

	// RPRDL LOGS
	function simpan_rencana_pasien_rujukan_dari_luar_post(){
		$checkDataRPRDL = '';
		if (safe_post('id_lhopi') !== '') {
			$checkDataRPRDL = $this->radiologi->getRencanaRujukanPasienDariLuarIGDByID(safe_post('id_lhopi'));
		}
		$this->db->trans_begin();
	
		if (empty($checkDataRPRDL)) {
			// INSERT DATA
			$data = array(
				'id_pendaftaran'			=> safe_post('id_pendaftaran'),
				'id_layanan_pendaftaran'    => safe_post('id_layanan_pendaftaran'),
				'tanggal_jam_rprdl' 		=> (safe_post('tanggal_jam_rprdl') !== '' ? datetime2mysql(safe_post('tanggal_jam_rprdl')) : NULL),
				'asalrujukan_rprdl'			=> safe_post('asalrujukan_rprdl') == '' ? null : safe_post('asalrujukan_rprdl'),
				'diagnosis_rprdl'			=> safe_post('diagnosis_rprdl') == '' ? null : safe_post('diagnosis_rprdl'),
				'rencana_rprdl'				=> safe_post('rencana_rprdl') == '' ? null : safe_post('rencana_rprdl'),
				'id_users'					=> $this->session->userdata('id_translucent'),
				'created_date'				=> $this->datetime,
				'updated_date'             	=> $this->datetime	
			);
			$this->db->insert('sm_rencana_pasien_rujukan_dari_luar', $data);
	
		} else {
			// UPDATE DATA
			$data = array(
				'tanggal_jam_rprdl' 		=> (safe_post('tanggal_jam_rprdl') !== '' ? datetime2mysql(safe_post('tanggal_jam_rprdl')) : NULL),
				'asalrujukan_rprdl'			=> safe_post('asalrujukan_rprdl') == '' ? null : safe_post('asalrujukan_rprdl'),
				'diagnosis_rprdl'			=> safe_post('diagnosis_rprdl') == '' ? null : safe_post('diagnosis_rprdl'),
				'rencana_rprdl'				=> safe_post('rencana_rprdl') == '' ? null : safe_post('rencana_rprdl'),
				'id_users'                 	=> $this->session->userdata('id_translucent'),
				'updated_date'              => $this->datetime
			);
	
			// HANYA SIMPAN FIELD VALID KE DALAM LOG
			$logData = array(
				'id_pendaftaran'      		=> $checkDataRPRDL->id_pendaftaran,
				'id_layanan_pendaftaran'  	=> $checkDataRPRDL->id_layanan_pendaftaran,
				'tanggal_jam_rprdl'         => $checkDataRPRDL->tanggal_jam_rprdl,
				'asalrujukan_rprdl'         => $checkDataRPRDL->asalrujukan_rprdl,
				'diagnosis_rprdl'       	=> $checkDataRPRDL->diagnosis_rprdl,
				'rencana_rprdl' 			=> $checkDataRPRDL->rencana_rprdl,
				'id_users'                	=> $checkDataRPRDL->id_users,
				'created_date'            	=> $checkDataRPRDL->created_date,
				'updated_date'            	=> $this->datetime,
				'log_action'              	=> 'update'
			);
			$this->db->insert('sm_rencana_pasien_rujukan_dari_luar_logs', $logData);
	
			$this->db->where('id', safe_post('id_lhopi'));
			$this->db->update('sm_rencana_pasien_rujukan_dari_luar', $data);
		}
	
		if ($this->db->trans_status() === false) {
			$this->db->trans_rollback();
			$status = false;
			$message = 'Gagal simpan Data';
		} else {
			$this->db->trans_commit();
			$status = true;
			$message = 'Berhasil simpan Data';
		}
	
		$this->response(array('status' => $status, 'message' => $message), REST_Controller::HTTP_OK);
	}

	// RPRDL LOGS
	function hapus_rencana_rujukan_pasien_dari_luar_post(){
		if (!safe_post('id', true)) :
			$this->response(null, REST_Controller::HTTP_BAD_REQUEST);
		endif;
	
		// Ambil data sebelum dihapus
		$rprdLHapus = $this->db->where('id', safe_post('id'))->get('sm_rencana_pasien_rujukan_dari_luar')->row();
	
		$this->db->trans_begin();
	
		if ($rprdLHapus) {
			// Simpan ke log
			$logDataRprdl = array(
				'id_pendaftaran'          	=> $rprdLHapus->id_pendaftaran,
				'id_layanan_pendaftaran'  	=> $rprdLHapus->id_layanan_pendaftaran,
				'tanggal_jam_rprdl'         => $rprdLHapus->tanggal_jam_rprdl,
				'asalrujukan_rprdl'         => $rprdLHapus->asalrujukan_rprdl,
				'diagnosis_rprdl'       	=> $rprdLHapus->diagnosis_rprdl,
				'rencana_rprdl' 			=> $rprdLHapus->rencana_rprdl,
				'id_users'                	=> $rprdLHapus->id_users,
				'created_date'            	=> $rprdLHapus->created_date,
				'updated_date'            	=> $this->datetime,
				'log_action'              	=> 'delete'
			);
			$this->db->insert('sm_rencana_pasien_rujukan_dari_luar_logs', $logDataRprdl);
		}
	
		// Hapus data utama
		$this->db->where('id', safe_post('id'))->delete('sm_rencana_pasien_rujukan_dari_luar');
	
		if ($this->db->trans_status() === false) :
			$this->db->trans_rollback();
			$status = false;
			$message = 'Gagal Hapus Data';
		else :
			$this->db->trans_commit();
			$status = true;
			$message = 'Berhasil Hapus Data';
		endif;
	
		$this->response(array('status' => $status, 'message' => $message), REST_Controller::HTTP_OK);
	}

	// RPRDL
	function edit_rencana_rujukan_pasien_dari_luar_get(){
		$data['pendaftaran_detail'] = "";
		$data['edit_rencana_rujukan'] = "";
		$data['pendaftaran_detail'] = $this->radiologi->getPendaftaranDetailRadiologi($this->get('id_layanan_pendaftaran'));
		$data['edit_rencana_rujukan'] = $this->radiologi->getRencanaRujukanPasienDariLuarIGDByID($this->get('id'));
		if ($data != null) {
			$this->response($data, REST_Controller::HTTP_OK);
		} else {
			$this->response($data, REST_Controller::HTTP_OK);
		}
	}












	// PPPDJ LOGS
	function get_data_ppp_diagnostik_jantung_get(){
		$data['pendaftaran_detail'] = "";
		$data['list_ppp_diagnostik_jantung'] = [];
		$data = $this->radiologi->getPendaftaranDetailTindakanRadiologi($this->get('id_pendaftaran', true), $this->get('id_layanan', true));
		$data['pendaftaran_detail'] = $this->radiologi->getPendaftaranDetailRadiologi($this->get('id_layanan_pendaftaran'));
		$data['list_ppp_diagnostik_jantung'] = $this->radiologi->getPppDiagnostikJanTung($this->get('id_pendaftaran'));	
		$data['list_ppp_diagnostik_jantung_logs'] = $this->radiologi->getPppDiagnostikJanTungLogs($this->get('id_pendaftaran'));	
		if ($data != null) {
			$this->response($data, REST_Controller::HTTP_OK);
		} else {
			$this->response($data, REST_Controller::HTTP_OK);
		}
	}

	// PPPDJ LOGS
	function simpan_ppp_diagnostik_jantung_post(){
		$checkDatapppdj = '';
		if (safe_post('id_pppdj') !== '') {
			$checkDatapppdj = $this->radiologi->getPppDiagnostikJanTungById(safe_post('id_pppdj'));
		}
		$this->db->trans_begin();
	
		if (empty($checkDatapppdj)) {
			// INSERT DATA
			$data = array(
				'id_pendaftaran'			=> safe_post('id_pendaftaran'),
				'id_layanan_pendaftaran'    => safe_post('id_layanan_pendaftaran'),
				'ekg_pppdj'                 => safe_post('ekg_pppdj') == '' ? null : safe_post('ekg_pppdj'),
				'ekokardiorafi_pppdj'       => safe_post('ekokardiorafi_pppdj') == '' ? null : safe_post('ekokardiorafi_pppdj'),
				'carotis_pppdj'             => safe_post('carotis_pppdj') == '' ? null : safe_post('carotis_pppdj'),
				'tradmil_pppdj'             => safe_post('tradmil_pppdj') == '' ? null : safe_post('tradmil_pppdj'),
				'lain_pppdj'                => safe_post('lain_pppdj') == '' ? null : safe_post('lain_pppdj'),
				'diagnosa_pppdj'            => safe_post('diagnosa_pppdj') == '' ? null : safe_post('diagnosa_pppdj'),
				'tanggal_pppdj' 	    	=> safe_post('tanggal_pppdj') == '' ? null : date2mysql(safe_post('tanggal_pppdj')),
				'dokter_pemeriksa_pppdj'   	=> safe_post('dokter_pemeriksa_pppdj') == '' ? null : safe_post('dokter_pemeriksa_pppdj'),
				'id_users'					=> $this->session->userdata('id_translucent'),
				'created_date'				=> $this->datetime,
				'updated_on'             	=> $this->datetime	
			);
			$this->db->insert('sm_ppp_diagnostik_jantung', $data);
	
		} else {
			// UPDATE DATA
			$data = array(
				'ekg_pppdj'                 => safe_post('ekg_pppdj') == '' ? null : safe_post('ekg_pppdj'),
				'ekokardiorafi_pppdj'       => safe_post('ekokardiorafi_pppdj') == '' ? null : safe_post('ekokardiorafi_pppdj'),
				'carotis_pppdj'             => safe_post('carotis_pppdj') == '' ? null : safe_post('carotis_pppdj'),
				'tradmil_pppdj'             => safe_post('tradmil_pppdj') == '' ? null : safe_post('tradmil_pppdj'),
				'lain_pppdj'                => safe_post('lain_pppdj') == '' ? null : safe_post('lain_pppdj'),
				'diagnosa_pppdj'            => safe_post('diagnosa_pppdj') == '' ? null : safe_post('diagnosa_pppdj'),
				'tanggal_pppdj' 	    	=> safe_post('tanggal_pppdj') == '' ? null : date2mysql(safe_post('tanggal_pppdj')),
				'dokter_pemeriksa_pppdj'   	=> safe_post('dokter_pemeriksa_pppdj') == '' ? null : safe_post('dokter_pemeriksa_pppdj'),
				// 'id_users'					=> $this->session->userdata('id_translucent'),
				'updated_on'              	=> $this->datetime
			);
	
			$logData = array(
				'id_pppdj'              	=> $checkDatapppdj->id, // 🆕 ID utama
				'id_pendaftaran'       		=> $checkDatapppdj->id_pendaftaran,
				'id_layanan_pendaftaran' 	=> $checkDatapppdj->id_layanan_pendaftaran,
				'ekg_pppdj'             	=> $checkDatapppdj->ekg_pppdj,
				'ekokardiorafi_pppdj'   	=> $checkDatapppdj->ekokardiorafi_pppdj,
				'carotis_pppdj'         	=> $checkDatapppdj->carotis_pppdj,
				'tradmil_pppdj'         	=> $checkDatapppdj->tradmil_pppdj,
				'lain_pppdj'            	=> $checkDatapppdj->lain_pppdj,
				'diagnosa_pppdj'        	=> $checkDatapppdj->diagnosa_pppdj,
				'tanggal_pppdj'         	=> $checkDatapppdj->tanggal_pppdj,
				'dokter_pemeriksa_pppdj'	=> $checkDatapppdj->dokter_pemeriksa_pppdj,
				'id_users'             		=> $checkDatapppdj->id_users, // ✅ user input pertama
				'updated_by'           		=> $this->session->userdata('id_translucent'), // ✅ user yang edit
				'created_date'         		=> $checkDatapppdj->created_date,
				'updated_on'           		=> $this->datetime,
				'log_action'           		=> 'update'
			);

			$this->db->insert('sm_ppp_diagnostik_jantung_logs', $logData);
	
			$this->db->where('id', safe_post('id_pppdj'));
			$this->db->update('sm_ppp_diagnostik_jantung', $data);
		}
	
		if ($this->db->trans_status() === false) {
			$this->db->trans_rollback();
			$status = false;
			$message = 'Gagal simpan Data';
		} else {
			$this->db->trans_commit();
			$status = true;
			$message = 'Berhasil simpan Data';
		}
	
		$this->response(array('status' => $status, 'message' => $message), REST_Controller::HTTP_OK);
	}

	// PPPDJ LOGS
	function hapus_ppp_diagnostik_jantung_post(){
		if (!safe_post('id', true)) :
			$this->response(null, REST_Controller::HTTP_BAD_REQUEST);
		endif;
		// Ambil data sebelum dihapus
		$PppdjHapus = $this->db->where('id', safe_post('id'))->get('sm_ppp_diagnostik_jantung')->row();
		$this->db->trans_begin();
		if ($PppdjHapus) {
			// Simpan ke log
			$logDataPppdj = array(
				'id_pppdj'              	=> $PppdjHapus->id, // 🆕 ID utama
				'id_pendaftaran'       		=> $PppdjHapus->id_pendaftaran,
				'id_layanan_pendaftaran' 	=> $PppdjHapus->id_layanan_pendaftaran,
				'ekg_pppdj'             	=> $PppdjHapus->ekg_pppdj,
				'ekokardiorafi_pppdj'   	=> $PppdjHapus->ekokardiorafi_pppdj,
				'carotis_pppdj'         	=> $PppdjHapus->carotis_pppdj,
				'tradmil_pppdj'         	=> $PppdjHapus->tradmil_pppdj,
				'lain_pppdj'            	=> $PppdjHapus->lain_pppdj,
				'diagnosa_pppdj'        	=> $PppdjHapus->diagnosa_pppdj,
				'tanggal_pppdj'         	=> $PppdjHapus->tanggal_pppdj,
				'dokter_pemeriksa_pppdj'	=> $PppdjHapus->dokter_pemeriksa_pppdj,
				'id_users'             		=> $PppdjHapus->id_users, // ✅ user input pertama
				'deleted_by'           		=> $this->session->userdata('id_translucent'), // ✅ user yang hapus
				'created_date'         		=> $PppdjHapus->created_date,
				'updated_on'           		=> $this->datetime,
				'log_action'           		=> 'delete'
			);
			$this->db->insert('sm_ppp_diagnostik_jantung_logs', $logDataPppdj);
		}
		// Hapus data utama
		$this->db->where('id', safe_post('id'))->delete('sm_ppp_diagnostik_jantung');
	
		if ($this->db->trans_status() === false) :
			$this->db->trans_rollback();
			$status = false;
			$message = 'Gagal Hapus Data';
		else :
			$this->db->trans_commit();
			$status = true;
			$message = 'Berhasil Hapus Data';
		endif;
	
		$this->response(array('status' => $status, 'message' => $message), REST_Controller::HTTP_OK);
	}

	// PPPDJ
	function get_edit_ppp_diagnostik_jantung_get(){
		$data['pendaftaran_detail'] = "";
		$data['list_edit_ppp_diagnostik_jantung'] = "";
		$data['pendaftaran_detail'] = $this->radiologi->getPendaftaranDetailRadiologi($this->get('id_layanan_pendaftaran'));
		$data['list_edit_ppp_diagnostik_jantung'] = $this->radiologi->getPppDiagnostikJanTungById($this->get('id'));
		if ($data != null) {
			$this->response($data, REST_Controller::HTTP_OK);
		} else {
			$this->response($data, REST_Controller::HTTP_OK);
		}
	}



	// CPTD LOGS
	function get_data_cheklist_post_tindakan_diagnostik_get(){
		$data['pendaftaran_detail'] = "";
		$data['list_checklist_post_tindakan_diagnostik'] = [];
		$data = $this->radiologi->getPendaftaranDetailTindakanRadiologi($this->get('id_pendaftaran', true), $this->get('id_layanan', true));
		$data['pendaftaran_detail'] = $this->radiologi->getPendaftaranDetailRadiologi($this->get('id_layanan_pendaftaran'));
		$data['list_checklist_post_tindakan_diagnostik'] = $this->radiologi->getCheklistPostTindakanDiagnostik($this->get('id_pendaftaran'));	
		$data['list_checklist_post_tindakan_diagnostik_logs'] = $this->radiologi->getCheklistPostTindakanDiagnostikLogs($this->get('id_pendaftaran'));	
		if ($data != null) {
			$this->response($data, REST_Controller::HTTP_OK);
		} else {
			$this->response($data, REST_Controller::HTTP_OK);
		}
	}

	// CPTD LOGS
	function simpan_checklist_post_tindakan_diagnostik_post(){
		$checkDataCptd = '';
		if (safe_post('id_cptd') !== '') {
			$checkDataCptd = $this->radiologi->getCheklistPostTindakanDiagnostikById(safe_post('id_cptd'));
		}
		$this->db->trans_begin();
	
		if (empty($checkDataCptd)) {
			// INSERT DATA
			$data = array(
				'id_pendaftaran'			=> safe_post('id_pendaftaran'),
				'id_layanan_pendaftaran'    => safe_post('id_layanan_pendaftaran'),
				'td_cptd'                 	=> safe_post('td_cptd') == '' ? null : safe_post('td_cptd'),
				'hr_cptd'                 	=> safe_post('hr_cptd') == '' ? null : safe_post('hr_cptd'),
				'rr_cptd'                 	=> safe_post('rr_cptd') == '' ? null : safe_post('rr_cptd'),
				'suhu_cptd'                 => safe_post('suhu_cptd') == '' ? null : safe_post('suhu_cptd'),
				'radical_cptd_1'            => safe_post('radical_cptd_1') == '' ? null : safe_post('radical_cptd_1'),
				'radical_cptd_2'            => safe_post('radical_cptd_2') == '' ? null : safe_post('radical_cptd_2'),
				'radical_cptd_3'            => safe_post('radical_cptd_3') == '' ? null : safe_post('radical_cptd_3'),
				'hematom_cptd_1'            => safe_post('hematom_cptd_1') == '' ? null : safe_post('hematom_cptd_1'),
				'hematom_cptd_2'            => safe_post('hematom_cptd_2') == '' ? null : safe_post('hematom_cptd_2'),
				'hematom_cptd_3'            => safe_post('hematom_cptd_3') == '' ? null : safe_post('hematom_cptd_3'),
				'jampergelangan_cptd'       => safe_post('jampergelangan_cptd') == '' ? null : safe_post('jampergelangan_cptd'),
				'jamsiku_cptd'              => safe_post('jamsiku_cptd') == '' ? null : safe_post('jamsiku_cptd'),
				'jampci_cptd'               => safe_post('jampci_cptd') == '' ? null : safe_post('jampci_cptd'),
				'denyut_cptd_1'             => safe_post('denyut_cptd_1') == '' ? null : safe_post('denyut_cptd_1'),
				'denyut_cptd_2'             => safe_post('denyut_cptd_2') == '' ? null : safe_post('denyut_cptd_2'),
				'denyut_cptd_3'             => safe_post('denyut_cptd_3') == '' ? null : safe_post('denyut_cptd_3'),
				'hemmattom_cptd_1'          => safe_post('hemmattom_cptd_1') == '' ? null : safe_post('hemmattom_cptd_1'),
				'hemmattom_cptd_2'          => safe_post('hemmattom_cptd_2') == '' ? null : safe_post('hemmattom_cptd_2'),
				'hemmattom_cptd_3'          => safe_post('hemmattom_cptd_3') == '' ? null : safe_post('hemmattom_cptd_3'),
				'jamkaki_cptd'              => safe_post('jamkaki_cptd') == '' ? null : safe_post('jamkaki_cptd'),
				'jamkitekuk_cptd'           => safe_post('jamkitekuk_cptd') == '' ? null : safe_post('jamkitekuk_cptd'),
				'jamaptt_cptd'              => safe_post('jamaptt_cptd') == '' ? null : safe_post('jamaptt_cptd'),
				'hasil_cptd_1'              => safe_post('hasil_cptd_1') == '' ? null : safe_post('hasil_cptd_1'),
				'hasil_cptd_2'              => safe_post('hasil_cptd_2') == '' ? null : safe_post('hasil_cptd_2'),
				'hasil_cptd_3'              => safe_post('hasil_cptd_3') == '' ? null : safe_post('hasil_cptd_3'),
				'cddvd_cptd_1'              => safe_post('cddvd_cptd_1') == '' ? null : safe_post('cddvd_cptd_1'),
				'cddvd_cptd_2'              => safe_post('cddvd_cptd_2') == '' ? null : safe_post('cddvd_cptd_2'),
				'cddvd_cptd_3'              => safe_post('cddvd_cptd_3') == '' ? null : safe_post('cddvd_cptd_3'),
				'tanggal_cptd' 	    		=> safe_post('tanggal_cptd') == '' ? null : date2mysql(safe_post('tanggal_cptd')),
				'perawatcathlab_cptd'   	=> safe_post('perawatcathlab_cptd') == '' ? null : safe_post('perawatcathlab_cptd'),
				'perawatruangan_cptd'   	=> safe_post('perawatruangan_cptd') == '' ? null : safe_post('perawatruangan_cptd'),
				'id_users'					=> $this->session->userdata('id_translucent'),
				'created_date'				=> $this->datetime,
				'updated_on'             	=> $this->datetime	
			);
			$this->db->insert('sm_cheklist_post_tindakan_diagnostik', $data);
	
		} else {
			// UPDATE DATA
			$data = array(
				'td_cptd'                 	=> safe_post('td_cptd') == '' ? null : safe_post('td_cptd'),
				'hr_cptd'                 	=> safe_post('hr_cptd') == '' ? null : safe_post('hr_cptd'),
				'rr_cptd'                 	=> safe_post('rr_cptd') == '' ? null : safe_post('rr_cptd'),
				'suhu_cptd'                 => safe_post('suhu_cptd') == '' ? null : safe_post('suhu_cptd'),
				'radical_cptd_1'            => safe_post('radical_cptd_1') == '' ? null : safe_post('radical_cptd_1'),
				'radical_cptd_2'            => safe_post('radical_cptd_2') == '' ? null : safe_post('radical_cptd_2'),
				'radical_cptd_3'            => safe_post('radical_cptd_3') == '' ? null : safe_post('radical_cptd_3'),
				'hematom_cptd_1'            => safe_post('hematom_cptd_1') == '' ? null : safe_post('hematom_cptd_1'),
				'hematom_cptd_2'            => safe_post('hematom_cptd_2') == '' ? null : safe_post('hematom_cptd_2'),
				'hematom_cptd_3'            => safe_post('hematom_cptd_3') == '' ? null : safe_post('hematom_cptd_3'),
				'jampergelangan_cptd'       => safe_post('jampergelangan_cptd') == '' ? null : safe_post('jampergelangan_cptd'),
				'jamsiku_cptd'              => safe_post('jamsiku_cptd') == '' ? null : safe_post('jamsiku_cptd'),
				'jampci_cptd'               => safe_post('jampci_cptd') == '' ? null : safe_post('jampci_cptd'),
				'denyut_cptd_1'             => safe_post('denyut_cptd_1') == '' ? null : safe_post('denyut_cptd_1'),
				'denyut_cptd_2'             => safe_post('denyut_cptd_2') == '' ? null : safe_post('denyut_cptd_2'),
				'denyut_cptd_3'             => safe_post('denyut_cptd_3') == '' ? null : safe_post('denyut_cptd_3'),
				'hemmattom_cptd_1'          => safe_post('hemmattom_cptd_1') == '' ? null : safe_post('hemmattom_cptd_1'),
				'hemmattom_cptd_2'          => safe_post('hemmattom_cptd_2') == '' ? null : safe_post('hemmattom_cptd_2'),
				'hemmattom_cptd_3'          => safe_post('hemmattom_cptd_3') == '' ? null : safe_post('hemmattom_cptd_3'),
				'jamkaki_cptd'              => safe_post('jamkaki_cptd') == '' ? null : safe_post('jamkaki_cptd'),
				'jamkitekuk_cptd'           => safe_post('jamkitekuk_cptd') == '' ? null : safe_post('jamkitekuk_cptd'),
				'jamaptt_cptd'              => safe_post('jamaptt_cptd') == '' ? null : safe_post('jamaptt_cptd'),
				'hasil_cptd_1'              => safe_post('hasil_cptd_1') == '' ? null : safe_post('hasil_cptd_1'),
				'hasil_cptd_2'              => safe_post('hasil_cptd_2') == '' ? null : safe_post('hasil_cptd_2'),
				'hasil_cptd_3'              => safe_post('hasil_cptd_3') == '' ? null : safe_post('hasil_cptd_3'),
				'cddvd_cptd_1'              => safe_post('cddvd_cptd_1') == '' ? null : safe_post('cddvd_cptd_1'),
				'cddvd_cptd_2'              => safe_post('cddvd_cptd_2') == '' ? null : safe_post('cddvd_cptd_2'),
				'cddvd_cptd_3'              => safe_post('cddvd_cptd_3') == '' ? null : safe_post('cddvd_cptd_3'),
				'tanggal_cptd' 	    		=> safe_post('tanggal_cptd') == '' ? null : date2mysql(safe_post('tanggal_cptd')),
				'perawatcathlab_cptd'   	=> safe_post('perawatcathlab_cptd') == '' ? null : safe_post('perawatcathlab_cptd'),
				'perawatruangan_cptd'   	=> safe_post('perawatruangan_cptd') == '' ? null : safe_post('perawatruangan_cptd'),
				'updated_on'              	=> $this->datetime
			);
	
			$logData = array(
				'id_cptd'              	=> $checkDataCptd->id, // 🆕 ID utama
				'id_pendaftaran'       	=> $checkDataCptd->id_pendaftaran,
				'id_layanan_pendaftaran'=> $checkDataCptd->id_layanan_pendaftaran,
				'td_cptd'             	=> $checkDataCptd->td_cptd,
				'hr_cptd'             	=> $checkDataCptd->hr_cptd,
				'rr_cptd'             	=> $checkDataCptd->rr_cptd,
				'suhu_cptd'             => $checkDataCptd->suhu_cptd,
				'radical_cptd_1'        => $checkDataCptd->radical_cptd_1,
				'radical_cptd_2'        => $checkDataCptd->radical_cptd_2,
				'radical_cptd_3'        => $checkDataCptd->radical_cptd_3,
				'hematom_cptd_1'        => $checkDataCptd->hematom_cptd_1,
				'hematom_cptd_2'        => $checkDataCptd->hematom_cptd_2,
				'hematom_cptd_3'        => $checkDataCptd->hematom_cptd_3,
				'jampergelangan_cptd'   => $checkDataCptd->jampergelangan_cptd,
				'jamsiku_cptd'         	=> $checkDataCptd->jamsiku_cptd,
				'jampci_cptd'           => $checkDataCptd->jampci_cptd,
				'denyut_cptd_1'         => $checkDataCptd->denyut_cptd_1,
				'denyut_cptd_2'         => $checkDataCptd->denyut_cptd_2,
				'denyut_cptd_3'         => $checkDataCptd->denyut_cptd_3,
				'hemmattom_cptd_1'      => $checkDataCptd->hemmattom_cptd_1,
				'hemmattom_cptd_2'      => $checkDataCptd->hemmattom_cptd_2,
				'hemmattom_cptd_3'      => $checkDataCptd->hemmattom_cptd_3,
				'jamkaki_cptd'          => $checkDataCptd->jamkaki_cptd,
				'jamkitekuk_cptd'       => $checkDataCptd->jamkitekuk_cptd,
				'jamaptt_cptd'          => $checkDataCptd->jamaptt_cptd,
				'hasil_cptd_1'          => $checkDataCptd->hasil_cptd_1,
				'hasil_cptd_2'          => $checkDataCptd->hasil_cptd_2,
				'hasil_cptd_3'          => $checkDataCptd->hasil_cptd_3,
				'cddvd_cptd_1'          => $checkDataCptd->cddvd_cptd_1,
				'cddvd_cptd_2'          => $checkDataCptd->cddvd_cptd_2,
				'cddvd_cptd_3'          => $checkDataCptd->cddvd_cptd_3,
				'tanggal_cptd'          => $checkDataCptd->tanggal_cptd,
				'perawatcathlab_cptd'   => $checkDataCptd->perawatcathlab_cptd,
				'perawatruangan_cptd'   => $checkDataCptd->perawatruangan_cptd,
				'id_users'             	=> $checkDataCptd->id_users, // ✅ user input pertama
				'updated_by'           	=> $this->session->userdata('id_translucent'), // ✅ user yang edit
				'created_date'         	=> $checkDataCptd->created_date,
				'updated_on'           	=> $this->datetime,
				'log_action'           	=> 'update'
			);

			$this->db->insert('sm_cheklist_post_tindakan_diagnostik_logs', $logData);
	
			$this->db->where('id', safe_post('id_cptd'));
			$this->db->update('sm_cheklist_post_tindakan_diagnostik', $data);
		}
	
		if ($this->db->trans_status() === false) {
			$this->db->trans_rollback();
			$status = false;
			$message = 'Gagal simpan Data';
		} else {
			$this->db->trans_commit();
			$status = true;
			$message = 'Berhasil simpan Data';
		}
	
		$this->response(array('status' => $status, 'message' => $message), REST_Controller::HTTP_OK);
	}

	// CPTD LOGS
	function hapus_checklist_post_tindakan_diagnostik_post(){
		if (!safe_post('id', true)) :
			$this->response(null, REST_Controller::HTTP_BAD_REQUEST);
		endif;
		// Ambil data sebelum dihapus
		$CpTdHapus = $this->db->where('id', safe_post('id'))->get('sm_cheklist_post_tindakan_diagnostik')->row();
		$this->db->trans_begin();
		if ($CpTdHapus) {
			// Simpan ke log
			$logDataCpTd = array(
				'id_cptd'              		=> $CpTdHapus->id, // 🆕 ID utama
				'id_pendaftaran'       		=> $CpTdHapus->id_pendaftaran,
				'id_layanan_pendaftaran' 	=> $CpTdHapus->id_layanan_pendaftaran,
				'td_cptd'             		=> $CpTdHapus->td_cptd,
				'hr_cptd'             		=> $CpTdHapus->hr_cptd,
				'rr_cptd'             		=> $CpTdHapus->rr_cptd,
				'suhu_cptd'             	=> $CpTdHapus->suhu_cptd,
				'radical_cptd_1'        	=> $CpTdHapus->radical_cptd_1,
				'radical_cptd_2'        	=> $CpTdHapus->radical_cptd_2,
				'radical_cptd_3'        	=> $CpTdHapus->radical_cptd_3,
				'hematom_cptd_1'        	=> $CpTdHapus->hematom_cptd_1,
				'hematom_cptd_2'        	=> $CpTdHapus->hematom_cptd_2,
				'hematom_cptd_3'        	=> $CpTdHapus->hematom_cptd_3,
				'jampergelangan_cptd'   	=> $CpTdHapus->jampergelangan_cptd,
				'jamsiku_cptd'         		=> $CpTdHapus->jamsiku_cptd,
				'jampci_cptd'           	=> $CpTdHapus->jampci_cptd,
				'denyut_cptd_1'         	=> $CpTdHapus->denyut_cptd_1,
				'denyut_cptd_2'         	=> $CpTdHapus->denyut_cptd_2,
				'denyut_cptd_3'         	=> $CpTdHapus->denyut_cptd_3,
				'hemmattom_cptd_1'      	=> $CpTdHapus->hemmattom_cptd_1,
				'hemmattom_cptd_2'      	=> $CpTdHapus->hemmattom_cptd_2,
				'hemmattom_cptd_3'      	=> $CpTdHapus->hemmattom_cptd_3,
				'jamkaki_cptd'          	=> $CpTdHapus->jamkaki_cptd,
				'jamkitekuk_cptd'       	=> $CpTdHapus->jamkitekuk_cptd,
				'jamaptt_cptd'          	=> $CpTdHapus->jamaptt_cptd,
				'hasil_cptd_1'          	=> $CpTdHapus->hasil_cptd_1,
				'hasil_cptd_2'          	=> $CpTdHapus->hasil_cptd_2,
				'hasil_cptd_3'          	=> $CpTdHapus->hasil_cptd_3,
				'cddvd_cptd_1'          	=> $CpTdHapus->cddvd_cptd_1,
				'cddvd_cptd_2'          	=> $CpTdHapus->cddvd_cptd_2,
				'cddvd_cptd_3'          	=> $CpTdHapus->cddvd_cptd_3,
				'tanggal_cptd'          	=> $CpTdHapus->tanggal_cptd,
				'perawatcathlab_cptd'   	=> $CpTdHapus->perawatcathlab_cptd,
				'perawatruangan_cptd'   	=> $CpTdHapus->perawatruangan_cptd,
				'id_users'             		=> $CpTdHapus->id_users, // ✅ user input pertama
				'deleted_by'           		=> $this->session->userdata('id_translucent'), // ✅ user yang hapus
				'created_date'         		=> $CpTdHapus->created_date,
				'updated_on'           		=> $this->datetime,
				'log_action'           		=> 'delete'
			);
			$this->db->insert('sm_cheklist_post_tindakan_diagnostik_logs', $logDataCpTd);
		}
		// Hapus data utama
		$this->db->where('id', safe_post('id'))->delete('sm_cheklist_post_tindakan_diagnostik');
	
		if ($this->db->trans_status() === false) :
			$this->db->trans_rollback();
			$status = false;
			$message = 'Gagal Hapus Data';
		else :
			$this->db->trans_commit();
			$status = true;
			$message = 'Berhasil Hapus Data';
		endif;
	
		$this->response(array('status' => $status, 'message' => $message), REST_Controller::HTTP_OK);
	}

	// CPTD
	function get_edit_checklist_post_tindakan_diagnostik_get(){
		$data['pendaftaran_detail'] = "";
		$data['list_edit_checklist_post_tindakan_diagnostik'] = "";
		$data['pendaftaran_detail'] = $this->radiologi->getPendaftaranDetailRadiologi($this->get('id_layanan_pendaftaran'));
		$data['list_edit_checklist_post_tindakan_diagnostik'] = $this->radiologi->getCheklistPostTindakanDiagnostikById($this->get('id'));
		if ($data != null) {
			$this->response($data, REST_Controller::HTTP_OK);
		} else {
			$this->response($data, REST_Controller::HTTP_OK);
		}
	}


	
	// AAKC LOGS
	function get_data_asesmen_awal_keperawatan_cathlab_get(){
		$data['pendaftaran_detail'] = "";
		$data['list_asesmen_awal_keperawatan_cathlab'] = [];
		$data = $this->radiologi->getPendaftaranDetailTindakanRadiologi($this->get('id_pendaftaran', true), $this->get('id_layanan', true));
		$data['pendaftaran_detail'] = $this->radiologi->getPendaftaranDetailRadiologi($this->get('id_layanan_pendaftaran'));
		$data['list_asesmen_awal_keperawatan_cathlab'] = $this->radiologi->getAsesmenAwalKeperawatanCathlab($this->get('id_pendaftaran'));	
		$data['list_asesmen_awal_keperawatan_cathlab_logs'] = $this->radiologi->getAsesmenAwalKeperawatanCathlabLogs($this->get('id_pendaftaran'));	
		if ($data != null) {
			$this->response($data, REST_Controller::HTTP_OK);
		} else {
			$this->response($data, REST_Controller::HTTP_OK);
		}
	}

	// AAKC LOGS
	function simpan_asesmen_awal_keperawatan_cathlab_post(){
		$checkDataAaKC = '';
		if (safe_post('id_aakc') !== '') {
			$checkDataAaKC = $this->radiologi->getAsesmenAwalKeperawatanCathlabById(safe_post('id_aakc'));
		}
		$this->db->trans_begin();
	
		if (empty($checkDataAaKC)) {
			// INSERT DATA
			$data = array(
				'id_pendaftaran'			=> safe_post('id_pendaftaran'),
				'id_layanan_pendaftaran'    => safe_post('id_layanan_pendaftaran'),
				'nm_tindakan'              	=> safe_post('nm_tindakan') == '' ? null : safe_post('nm_tindakan'),
				'dokteroperator1_aakc'      => safe_post('dokteroperator1_aakc') == '' ? null : safe_post('dokteroperator1_aakc'),
				'signin_aakc'               => safe_post('signin_aakc') == '' ? null : safe_post('signin_aakc'),

				'identitas_aakc_1'         	=> safe_post('identitas_aakc_1') == '' ? null : safe_post('identitas_aakc_1'),
				'identitas_aakc_2'          => safe_post('identitas_aakc_2') == '' ? null : safe_post('identitas_aakc_2'),
				'lokasi_aakc_1'           	=> safe_post('lokasi_aakc_1') == '' ? null : safe_post('lokasi_aakc_1'),
				'lokasi_aakc_2'           	=> safe_post('lokasi_aakc_2') == '' ? null : safe_post('lokasi_aakc_2'),
				'prosedur_aakc_1'           => safe_post('prosedur_aakc_1') == '' ? null : safe_post('prosedur_aakc_1'),
				'prosedur_aakc_2'           => safe_post('prosedur_aakc_2') == '' ? null : safe_post('prosedur_aakc_2'),
				'surat_aakc_1'           	=> safe_post('surat_aakc_1') == '' ? null : safe_post('surat_aakc_1'),
				'surat_aakc_2'           	=> safe_post('surat_aakc_2') == '' ? null : safe_post('surat_aakc_2'),
				'tanda_aakc_1'           	=> safe_post('tanda_aakc_1') == '' ? null : safe_post('tanda_aakc_1'),
				'tanda_aakc_2'           	=> safe_post('tanda_aakc_2') == '' ? null : safe_post('tanda_aakc_2'),
				'mesin_aakc_1'           	=> safe_post('mesin_aakc_1') == '' ? null : safe_post('mesin_aakc_1'),
				'mesin_aakc_2'           	=> safe_post('mesin_aakc_2') == '' ? null : safe_post('mesin_aakc_2'),
				'monitor_aakc_1'           	=> safe_post('monitor_aakc_1') == '' ? null : safe_post('monitor_aakc_1'),
				'monitor_aakc_2'           	=> safe_post('monitor_aakc_2') == '' ? null : safe_post('monitor_aakc_2'),
				'apakah_aakc_1'           	=> safe_post('apakah_aakc_1') == '' ? null : safe_post('apakah_aakc_1'),
				'apakah_aakc_2'           	=> safe_post('apakah_aakc_2') == '' ? null : safe_post('apakah_aakc_2'),
				'asma_aakc_1'           	=> safe_post('asma_aakc_1') == '' ? null : safe_post('asma_aakc_1'),
				'asma_aakc_2'           	=> safe_post('asma_aakc_2') == '' ? null : safe_post('asma_aakc_2'),
				'kesulitan_aakc_1'          => safe_post('kesulitan_aakc_1') == '' ? null : safe_post('kesulitan_aakc_1'),
				'kesulitan_aakc_2'          => safe_post('kesulitan_aakc_2') == '' ? null : safe_post('kesulitan_aakc_2'),
				'darah_aakc_1'           	=> safe_post('darah_aakc_1') == '' ? null : safe_post('darah_aakc_1'),
				'darah_aakc_2'           	=> safe_post('darah_aakc_2') == '' ? null : safe_post('darah_aakc_2'),
				'akses_aakc_1'           	=> safe_post('akses_aakc_1') == '' ? null : safe_post('akses_aakc_1'),
				'akses_aakc_2'           	=> safe_post('akses_aakc_2') == '' ? null : safe_post('akses_aakc_2'),

				'timeout_aakc'           	=> safe_post('timeout_aakc') == '' ? null : safe_post('timeout_aakc'),
				'peran_aakc_1'           	=> safe_post('peran_aakc_1') == '' ? null : safe_post('peran_aakc_1'),
				'peran_aakc_2'           	=> safe_post('peran_aakc_2') == '' ? null : safe_post('peran_aakc_2'),
				'nama_aakc_1'           	=> safe_post('nama_aakc_1') == '' ? null : safe_post('nama_aakc_1'),
				'nama_aakc_2'           	=> safe_post('nama_aakc_2') == '' ? null : safe_post('nama_aakc_2'),
				'nama_aakc_3'           	=> safe_post('nama_aakc_3') == '' ? null : safe_post('nama_aakc_3'),
				'prosedure_aakc_1'          => safe_post('prosedure_aakc_1') == '' ? null : safe_post('prosedure_aakc_1'),
				'prosedure_aakc_2'          => safe_post('prosedure_aakc_2') == '' ? null : safe_post('prosedure_aakc_2'),
				'prosedure_aakc_3'          => safe_post('prosedure_aakc_3') == '' ? null : safe_post('prosedure_aakc_3'),
				'lokassie_aakc_1'           => safe_post('lokassie_aakc_1') == '' ? null : safe_post('lokassie_aakc_1'),
				'lokassie_aakc_2'           => safe_post('lokassie_aakc_2') == '' ? null : safe_post('lokassie_aakc_2'),
				'lokassie_aakc_3'           => safe_post('lokassie_aakc_3') == '' ? null : safe_post('lokassie_aakc_3'),
				'antibiotik_aakc_1'         => safe_post('antibiotik_aakc_1') == '' ? null : safe_post('antibiotik_aakc_1'),
				'antibiotik_aakc_2'         => safe_post('antibiotik_aakc_2') == '' ? null : safe_post('antibiotik_aakc_2'),
				'namaantib_aakc'           	=> safe_post('namaantib_aakc') == '' ? null : safe_post('namaantib_aakc'),
				'dosies_aakc'           	=> safe_post('dosies_aakc') == '' ? null : safe_post('dosies_aakc'),
				'reviiew_dokter'           	=> safe_post('reviiew_dokter') == '' ? null : safe_post('reviiew_dokter'),
				'reviiew_anestesi'          => safe_post('reviiew_anestesi') == '' ? null : safe_post('reviiew_anestesi'),
				'reviiew_perawat'           => safe_post('reviiew_perawat') == '' ? null : safe_post('reviiew_perawat'),
				'ctscan_aakc_1'           	=> safe_post('ctscan_aakc_1') == '' ? null : safe_post('ctscan_aakc_1'),
				'ctscan_aakc_2'           	=> safe_post('ctscan_aakc_2') == '' ? null : safe_post('ctscan_aakc_2'),

				'signout_aakc'           	=> safe_post('signout_aakc') == '' ? null : safe_post('signout_aakc'),
				'komunikasie_aakc_1'        => safe_post('komunikasie_aakc_1') == '' ? null : safe_post('komunikasie_aakc_1'),
				'komunikasie_aakc_2'        => safe_post('komunikasie_aakc_2') == '' ? null : safe_post('komunikasie_aakc_2'),
				'dicatat_aakc_1'           	=> safe_post('dicatat_aakc_1') == '' ? null : safe_post('dicatat_aakc_1'),
				'dicatat_aakc_2'           	=> safe_post('dicatat_aakc_2') == '' ? null : safe_post('dicatat_aakc_2'),
				'benar_aakc_1'           	=> safe_post('benar_aakc_1') == '' ? null : safe_post('benar_aakc_1'),
				'benar_aakc_2'           	=> safe_post('benar_aakc_2') == '' ? null : safe_post('benar_aakc_2'),
				'spesimen_aakc_1'           => safe_post('spesimen_aakc_1') == '' ? null : safe_post('spesimen_aakc_1'),
				'spesimen_aakc_2'           => safe_post('spesimen_aakc_2') == '' ? null : safe_post('spesimen_aakc_2'),
				'peralatan_aakc_1'          => safe_post('peralatan_aakc_1') == '' ? null : safe_post('peralatan_aakc_1'),
				'peralatan_aakc_2'          => safe_post('peralatan_aakc_2') == '' ? null : safe_post('peralatan_aakc_2'),
				'penyembuhan_aakc_1'        => safe_post('penyembuhan_aakc_1') == '' ? null : safe_post('penyembuhan_aakc_1'),
				'penyembuhan_aakc_2'       	=> safe_post('penyembuhan_aakc_2') == '' ? null : safe_post('penyembuhan_aakc_2'),
				'ada_aakc_1'           		=> safe_post('ada_aakc_1') == '' ? null : safe_post('ada_aakc_1'),
				'ada_aakc_2'           		=> safe_post('ada_aakc_2') == '' ? null : safe_post('ada_aakc_2'),
				'tdada_aakc_1'           	=> safe_post('tdada_aakc_1') == '' ? null : safe_post('tdada_aakc_1'),
				'ya_aakc_2'           		=> safe_post('ya_aakc_2') == '' ? null : safe_post('ya_aakc_2'),
				'jelaskan_aakc'           	=> safe_post('jelaskan_aakc') == '' ? null : safe_post('jelaskan_aakc'),
				'jamverifikasi_aakc'        => safe_post('jamverifikasi_aakc') == '' ? null : safe_post('jamverifikasi_aakc'),
				'tanggal_aakc' 	    		=> safe_post('tanggal_aakc') == '' ? null : date2mysql(safe_post('tanggal_aakc')),

				'dokteroperator2_aakc'      => safe_post('dokteroperator2_aakc') == '' ? null : safe_post('dokteroperator2_aakc'),
				'perawat_aakc'            	=> safe_post('perawat_aakc') == '' ? null : safe_post('perawat_aakc'),
				'dokteroperator3_aakc'      => safe_post('dokteroperator3_aakc') == '' ? null : safe_post('dokteroperator3_aakc'),
				'id_users'					=> $this->session->userdata('id_translucent'),
				'created_date'				=> $this->datetime,
				'updated_on'             	=> $this->datetime	
			);
			$this->db->insert('sm_asesmen_awal_keperawatan_cathlab', $data);
	
		} else {
			// UPDATE DATA
			$data = array(
				'nm_tindakan'              	=> safe_post('nm_tindakan') == '' ? null : safe_post('nm_tindakan'),
				'dokteroperator1_aakc'      => safe_post('dokteroperator1_aakc') == '' ? null : safe_post('dokteroperator1_aakc'),
				
				'signin_aakc'               => safe_post('signin_aakc') == '' ? null : safe_post('signin_aakc'),
				'identitas_aakc_1'         	=> safe_post('identitas_aakc_1') == '' ? null : safe_post('identitas_aakc_1'),
				'identitas_aakc_2'          => safe_post('identitas_aakc_2') == '' ? null : safe_post('identitas_aakc_2'),
				'lokasi_aakc_1'           	=> safe_post('lokasi_aakc_1') == '' ? null : safe_post('lokasi_aakc_1'),
				'lokasi_aakc_2'           	=> safe_post('lokasi_aakc_2') == '' ? null : safe_post('lokasi_aakc_2'),
				'prosedur_aakc_1'           => safe_post('prosedur_aakc_1') == '' ? null : safe_post('prosedur_aakc_1'),
				'prosedur_aakc_2'           => safe_post('prosedur_aakc_2') == '' ? null : safe_post('prosedur_aakc_2'),
				'surat_aakc_1'           	=> safe_post('surat_aakc_1') == '' ? null : safe_post('surat_aakc_1'),
				'surat_aakc_2'           	=> safe_post('surat_aakc_2') == '' ? null : safe_post('surat_aakc_2'),
				'tanda_aakc_1'           	=> safe_post('tanda_aakc_1') == '' ? null : safe_post('tanda_aakc_1'),
				'tanda_aakc_2'           	=> safe_post('tanda_aakc_2') == '' ? null : safe_post('tanda_aakc_2'),
				'mesin_aakc_1'           	=> safe_post('mesin_aakc_1') == '' ? null : safe_post('mesin_aakc_1'),
				'mesin_aakc_2'           	=> safe_post('mesin_aakc_2') == '' ? null : safe_post('mesin_aakc_2'),
				'monitor_aakc_1'           	=> safe_post('monitor_aakc_1') == '' ? null : safe_post('monitor_aakc_1'),
				'monitor_aakc_2'           	=> safe_post('monitor_aakc_2') == '' ? null : safe_post('monitor_aakc_2'),
				'apakah_aakc_1'           	=> safe_post('apakah_aakc_1') == '' ? null : safe_post('apakah_aakc_1'),
				'apakah_aakc_2'           	=> safe_post('apakah_aakc_2') == '' ? null : safe_post('apakah_aakc_2'),
				'asma_aakc_1'           	=> safe_post('asma_aakc_1') == '' ? null : safe_post('asma_aakc_1'),
				'asma_aakc_2'           	=> safe_post('asma_aakc_2') == '' ? null : safe_post('asma_aakc_2'),
				'kesulitan_aakc_1'          => safe_post('kesulitan_aakc_1') == '' ? null : safe_post('kesulitan_aakc_1'),
				'kesulitan_aakc_2'          => safe_post('kesulitan_aakc_2') == '' ? null : safe_post('kesulitan_aakc_2'),
				'darah_aakc_1'           	=> safe_post('darah_aakc_1') == '' ? null : safe_post('darah_aakc_1'),
				'darah_aakc_2'           	=> safe_post('darah_aakc_2') == '' ? null : safe_post('darah_aakc_2'),
				'akses_aakc_1'           	=> safe_post('akses_aakc_1') == '' ? null : safe_post('akses_aakc_1'),
				'akses_aakc_2'           	=> safe_post('akses_aakc_2') == '' ? null : safe_post('akses_aakc_2'),

				'timeout_aakc'           	=> safe_post('timeout_aakc') == '' ? null : safe_post('timeout_aakc'),
				'peran_aakc_1'           	=> safe_post('peran_aakc_1') == '' ? null : safe_post('peran_aakc_1'),
				'peran_aakc_2'           	=> safe_post('peran_aakc_2') == '' ? null : safe_post('peran_aakc_2'),
				'nama_aakc_1'           	=> safe_post('nama_aakc_1') == '' ? null : safe_post('nama_aakc_1'),
				'nama_aakc_2'           	=> safe_post('nama_aakc_2') == '' ? null : safe_post('nama_aakc_2'),
				'nama_aakc_3'           	=> safe_post('nama_aakc_3') == '' ? null : safe_post('nama_aakc_3'),
				'prosedure_aakc_1'          => safe_post('prosedure_aakc_1') == '' ? null : safe_post('prosedure_aakc_1'),
				'prosedure_aakc_2'          => safe_post('prosedure_aakc_2') == '' ? null : safe_post('prosedure_aakc_2'),
				'prosedure_aakc_3'          => safe_post('prosedure_aakc_3') == '' ? null : safe_post('prosedure_aakc_3'),
				'lokassie_aakc_1'           => safe_post('lokassie_aakc_1') == '' ? null : safe_post('lokassie_aakc_1'),
				'lokassie_aakc_2'           => safe_post('lokassie_aakc_2') == '' ? null : safe_post('lokassie_aakc_2'),
				'lokassie_aakc_3'           => safe_post('lokassie_aakc_3') == '' ? null : safe_post('lokassie_aakc_3'),
				'antibiotik_aakc_1'         => safe_post('antibiotik_aakc_1') == '' ? null : safe_post('antibiotik_aakc_1'),
				'antibiotik_aakc_2'         => safe_post('antibiotik_aakc_2') == '' ? null : safe_post('antibiotik_aakc_2'),
				'namaantib_aakc'           	=> safe_post('namaantib_aakc') == '' ? null : safe_post('namaantib_aakc'),
				'dosies_aakc'           	=> safe_post('dosies_aakc') == '' ? null : safe_post('dosies_aakc'),
				'reviiew_dokter'           	=> safe_post('reviiew_dokter') == '' ? null : safe_post('reviiew_dokter'),
				'reviiew_anestesi'          => safe_post('reviiew_anestesi') == '' ? null : safe_post('reviiew_anestesi'),
				'reviiew_perawat'           => safe_post('reviiew_perawat') == '' ? null : safe_post('reviiew_perawat'),
				'ctscan_aakc_1'           	=> safe_post('ctscan_aakc_1') == '' ? null : safe_post('ctscan_aakc_1'),
				'ctscan_aakc_2'           	=> safe_post('ctscan_aakc_2') == '' ? null : safe_post('ctscan_aakc_2'),

				'signout_aakc'           	=> safe_post('signout_aakc') == '' ? null : safe_post('signout_aakc'),
				'komunikasie_aakc_1'        => safe_post('komunikasie_aakc_1') == '' ? null : safe_post('komunikasie_aakc_1'),
				'komunikasie_aakc_2'        => safe_post('komunikasie_aakc_2') == '' ? null : safe_post('komunikasie_aakc_2'),
				'dicatat_aakc_1'           	=> safe_post('dicatat_aakc_1') == '' ? null : safe_post('dicatat_aakc_1'),
				'dicatat_aakc_2'           	=> safe_post('dicatat_aakc_2') == '' ? null : safe_post('dicatat_aakc_2'),
				'benar_aakc_1'           	=> safe_post('benar_aakc_1') == '' ? null : safe_post('benar_aakc_1'),
				'benar_aakc_2'           	=> safe_post('benar_aakc_2') == '' ? null : safe_post('benar_aakc_2'),
				'spesimen_aakc_1'           => safe_post('spesimen_aakc_1') == '' ? null : safe_post('spesimen_aakc_1'),
				'spesimen_aakc_2'           => safe_post('spesimen_aakc_2') == '' ? null : safe_post('spesimen_aakc_2'),
				'peralatan_aakc_1'          => safe_post('peralatan_aakc_1') == '' ? null : safe_post('peralatan_aakc_1'),
				'peralatan_aakc_2'          => safe_post('peralatan_aakc_2') == '' ? null : safe_post('peralatan_aakc_2'),
				'penyembuhan_aakc_1'        => safe_post('penyembuhan_aakc_1') == '' ? null : safe_post('penyembuhan_aakc_1'),
				'penyembuhan_aakc_2'       	=> safe_post('penyembuhan_aakc_2') == '' ? null : safe_post('penyembuhan_aakc_2'),


				'ada_aakc_1'           		=> safe_post('ada_aakc_1') == '' ? null : safe_post('ada_aakc_1'),
				'ada_aakc_2'           		=> safe_post('ada_aakc_2') == '' ? null : safe_post('ada_aakc_2'),
				'tdada_aakc_1'           	=> safe_post('tdada_aakc_1') == '' ? null : safe_post('tdada_aakc_1'),
				'ya_aakc_2'           		=> safe_post('ya_aakc_2') == '' ? null : safe_post('ya_aakc_2'),

				'jelaskan_aakc'           	=> safe_post('jelaskan_aakc') == '' ? null : safe_post('jelaskan_aakc'),
				'jamverifikasi_aakc'        => safe_post('jamverifikasi_aakc') == '' ? null : safe_post('jamverifikasi_aakc'),
				'tanggal_aakc' 	    		=> safe_post('tanggal_aakc') == '' ? null : date2mysql(safe_post('tanggal_aakc')),

				'dokteroperator2_aakc'      => safe_post('dokteroperator2_aakc') == '' ? null : safe_post('dokteroperator2_aakc'),
				'perawat_aakc'            	=> safe_post('perawat_aakc') == '' ? null : safe_post('perawat_aakc'),
				'dokteroperator3_aakc'      => safe_post('dokteroperator3_aakc') == '' ? null : safe_post('dokteroperator3_aakc'),
				'updated_on'              	=> $this->datetime
			);
	
			$logData = array(
				'id_aakc'              	=> $checkDataAaKC->id, // 🆕 ID utama
				'id_pendaftaran'       	=> $checkDataAaKC->id_pendaftaran,
				'id_layanan_pendaftaran'=> $checkDataAaKC->id_layanan_pendaftaran,

				'nm_tindakan'           => $checkDataAaKC->nm_tindakan,
				'dokteroperator1_aakc'  => $checkDataAaKC->dokteroperator1_aakc,
				'signin_aakc'        	=> $checkDataAaKC->signin_aakc,
				'identitas_aakc_1'      => $checkDataAaKC->identitas_aakc_1,
				'identitas_aakc_2'      => $checkDataAaKC->identitas_aakc_2,
				'lokasi_aakc_1'         => $checkDataAaKC->lokasi_aakc_1,
				'lokasi_aakc_2'         => $checkDataAaKC->lokasi_aakc_2,
				'prosedur_aakc_1'       => $checkDataAaKC->prosedur_aakc_1,
				'prosedur_aakc_2'       => $checkDataAaKC->prosedur_aakc_2,
				'surat_aakc_1'          => $checkDataAaKC->surat_aakc_1,
				'surat_aakc_2'          => $checkDataAaKC->surat_aakc_2,
				'tanda_aakc_1'          => $checkDataAaKC->tanda_aakc_1,
				'tanda_aakc_2'          => $checkDataAaKC->tanda_aakc_2,
				'mesin_aakc_1'          => $checkDataAaKC->mesin_aakc_1,
				'mesin_aakc_2'          => $checkDataAaKC->mesin_aakc_2,
				'monitor_aakc_1'        => $checkDataAaKC->monitor_aakc_1,
				'monitor_aakc_2'        => $checkDataAaKC->monitor_aakc_2,
				'apakah_aakc_1'         => $checkDataAaKC->apakah_aakc_1,
				'apakah_aakc_2'         => $checkDataAaKC->apakah_aakc_2,
				'asma_aakc_1'           => $checkDataAaKC->asma_aakc_1,
				'asma_aakc_2'           => $checkDataAaKC->asma_aakc_2,
				'kesulitan_aakc_1'      => $checkDataAaKC->kesulitan_aakc_1,
				'kesulitan_aakc_2'      => $checkDataAaKC->kesulitan_aakc_2,
				'darah_aakc_1'          => $checkDataAaKC->darah_aakc_1,
				'darah_aakc_2'          => $checkDataAaKC->darah_aakc_2,
				'akses_aakc_1'          => $checkDataAaKC->akses_aakc_1,
				'akses_aakc_2'          => $checkDataAaKC->akses_aakc_2,

				'timeout_aakc'          => $checkDataAaKC->timeout_aakc,
				'peran_aakc_1'          => $checkDataAaKC->peran_aakc_1,
				'peran_aakc_2'          => $checkDataAaKC->peran_aakc_2,
				'nama_aakc_1'           => $checkDataAaKC->nama_aakc_1,
				'nama_aakc_2'           => $checkDataAaKC->nama_aakc_2,
				'nama_aakc_3'           => $checkDataAaKC->nama_aakc_3,
				'prosedure_aakc_1'      => $checkDataAaKC->prosedure_aakc_1,
				'prosedure_aakc_2'      => $checkDataAaKC->prosedure_aakc_2,
				'prosedure_aakc_3'      => $checkDataAaKC->prosedure_aakc_3,
				'lokassie_aakc_1'       => $checkDataAaKC->lokassie_aakc_1,
				'lokassie_aakc_2'       => $checkDataAaKC->lokassie_aakc_2,
				'lokassie_aakc_3'       => $checkDataAaKC->lokassie_aakc_3,
				'antibiotik_aakc_1'     => $checkDataAaKC->antibiotik_aakc_1,
				'antibiotik_aakc_2'     => $checkDataAaKC->antibiotik_aakc_2,
				'namaantib_aakc'        => $checkDataAaKC->namaantib_aakc,
				'dosies_aakc'           => $checkDataAaKC->dosies_aakc,
				'reviiew_dokter'        => $checkDataAaKC->reviiew_dokter,
				'reviiew_anestesi'      => $checkDataAaKC->reviiew_anestesi,
				'reviiew_perawat'       => $checkDataAaKC->reviiew_perawat,
				'ctscan_aakc_1'         => $checkDataAaKC->ctscan_aakc_1,
				'ctscan_aakc_2'         => $checkDataAaKC->ctscan_aakc_2,

				'signout_aakc'          => $checkDataAaKC->signout_aakc,
				'komunikasie_aakc_1'    => $checkDataAaKC->komunikasie_aakc_1,
				'komunikasie_aakc_2'    => $checkDataAaKC->komunikasie_aakc_2,
				'dicatat_aakc_1'        => $checkDataAaKC->dicatat_aakc_1,
				'dicatat_aakc_2'        => $checkDataAaKC->dicatat_aakc_2,
				'benar_aakc_1'          => $checkDataAaKC->benar_aakc_1,
				'benar_aakc_2'          => $checkDataAaKC->benar_aakc_2,
				'spesimen_aakc_1'       => $checkDataAaKC->spesimen_aakc_1,
				'spesimen_aakc_2'       => $checkDataAaKC->spesimen_aakc_2,
				'peralatan_aakc_1'      => $checkDataAaKC->peralatan_aakc_1,
				'peralatan_aakc_2'      => $checkDataAaKC->peralatan_aakc_2,
				'penyembuhan_aakc_1'    => $checkDataAaKC->penyembuhan_aakc_1,
				'penyembuhan_aakc_2'    => $checkDataAaKC->penyembuhan_aakc_2,

				'ada_aakc_1'            => $checkDataAaKC->ada_aakc_1,
				'ada_aakc_2'            => $checkDataAaKC->ada_aakc_2,
				'tdada_aakc_1'         => $checkDataAaKC->tdada_aakc_1,
				'ya_aakc_2'            	=> $checkDataAaKC->ya_aakc_2,

				'jelaskan_aakc'         => $checkDataAaKC->jelaskan_aakc,
				'jamverifikasi_aakc'    => $checkDataAaKC->jamverifikasi_aakc,
				'tanggal_aakc'          => $checkDataAaKC->tanggal_aakc,
				'dokteroperator2_aakc'  => $checkDataAaKC->dokteroperator2_aakc,
				'perawat_aakc'          => $checkDataAaKC->perawat_aakc,
				'dokteroperator3_aakc' 	=> $checkDataAaKC->dokteroperator3_aakc,

				'id_users'             	=> $checkDataAaKC->id_users, // ✅ user input pertama
				'updated_by'           	=> $this->session->userdata('id_translucent'), // ✅ user yang edit
				'created_date'         	=> $checkDataAaKC->created_date,
				'updated_on'           	=> $this->datetime,
				'log_action'           	=> 'update'
			);

			$this->db->insert('sm_asesmen_awal_keperawatan_cathlab_logs', $logData);
	
			$this->db->where('id', safe_post('id_aakc'));
			$this->db->update('sm_asesmen_awal_keperawatan_cathlab', $data);
		}
	
		if ($this->db->trans_status() === false) {
			$this->db->trans_rollback();
			$status = false;
			$message = 'Gagal simpan Data';
		} else {
			$this->db->trans_commit();
			$status = true;
			$message = 'Berhasil simpan Data';
		}
	
		$this->response(array('status' => $status, 'message' => $message), REST_Controller::HTTP_OK);
	}

	// AAKC LOGS
	function hapus_asesmen_awal_keperawatan_cathlab_post(){
		if (!safe_post('id', true)) :
			$this->response(null, REST_Controller::HTTP_BAD_REQUEST);
		endif;
		// Ambil data sebelum dihapus
		$AaKcHapus = $this->db->where('id', safe_post('id'))->get('sm_asesmen_awal_keperawatan_cathlab')->row();
		$this->db->trans_begin();
		if ($AaKcHapus) {
			// Simpan ke log
			$logDataAaKc = array(
				'id_aakc'             	=> $AaKcHapus->id, // 🆕 ID utama
				'id_pendaftaran'       	=> $AaKcHapus->id_pendaftaran,
				'id_layanan_pendaftaran'=> $AaKcHapus->id_layanan_pendaftaran,

				'nm_tindakan'           => $AaKcHapus->nm_tindakan,
				'dokteroperator1_aakc'  => $AaKcHapus->dokteroperator1_aakc,
				'signin_aakc'        	=> $AaKcHapus->signin_aakc,
				'identitas_aakc_1'      => $AaKcHapus->identitas_aakc_1,
				'identitas_aakc_2'      => $AaKcHapus->identitas_aakc_2,
				'lokasi_aakc_1'         => $AaKcHapus->lokasi_aakc_1,
				'lokasi_aakc_2'         => $AaKcHapus->lokasi_aakc_2,
				'prosedur_aakc_1'       => $AaKcHapus->prosedur_aakc_1,
				'prosedur_aakc_2'       => $AaKcHapus->prosedur_aakc_2,
				'surat_aakc_1'          => $AaKcHapus->surat_aakc_1,
				'surat_aakc_2'          => $AaKcHapus->surat_aakc_2,
				'tanda_aakc_1'          => $AaKcHapus->tanda_aakc_1,
				'tanda_aakc_2'          => $AaKcHapus->tanda_aakc_2,
				'mesin_aakc_1'          => $AaKcHapus->mesin_aakc_1,
				'mesin_aakc_2'          => $AaKcHapus->mesin_aakc_2,
				'monitor_aakc_1'        => $AaKcHapus->monitor_aakc_1,
				'monitor_aakc_2'        => $AaKcHapus->monitor_aakc_2,
				'apakah_aakc_1'         => $AaKcHapus->apakah_aakc_1,
				'apakah_aakc_2'         => $AaKcHapus->apakah_aakc_2,
				'asma_aakc_1'           => $AaKcHapus->asma_aakc_1,
				'asma_aakc_2'           => $AaKcHapus->asma_aakc_2,
				'kesulitan_aakc_1'      => $AaKcHapus->kesulitan_aakc_1,
				'kesulitan_aakc_2'      => $AaKcHapus->kesulitan_aakc_2,
				'darah_aakc_1'          => $AaKcHapus->darah_aakc_1,
				'darah_aakc_2'          => $AaKcHapus->darah_aakc_2,
				'akses_aakc_1'          => $AaKcHapus->akses_aakc_1,
				'akses_aakc_2'          => $AaKcHapus->akses_aakc_2,

				'timeout_aakc'          => $AaKcHapus->timeout_aakc,
				'peran_aakc_1'          => $AaKcHapus->peran_aakc_1,
				'peran_aakc_2'          => $AaKcHapus->peran_aakc_2,
				'nama_aakc_1'           => $AaKcHapus->nama_aakc_1,
				'nama_aakc_2'           => $AaKcHapus->nama_aakc_2,
				'nama_aakc_3'           => $AaKcHapus->nama_aakc_3,
				'prosedure_aakc_1'      => $AaKcHapus->prosedure_aakc_1,
				'prosedure_aakc_2'      => $AaKcHapus->prosedure_aakc_2,
				'prosedure_aakc_3'      => $AaKcHapus->prosedure_aakc_3,
				'lokassie_aakc_1'       => $AaKcHapus->lokassie_aakc_1,
				'lokassie_aakc_2'       => $AaKcHapus->lokassie_aakc_2,
				'lokassie_aakc_3'       => $AaKcHapus->lokassie_aakc_3,
				'antibiotik_aakc_1'     => $AaKcHapus->antibiotik_aakc_1,
				'antibiotik_aakc_2'     => $AaKcHapus->antibiotik_aakc_2,
				'namaantib_aakc'        => $AaKcHapus->namaantib_aakc,
				'dosies_aakc'           => $AaKcHapus->dosies_aakc,
				'reviiew_dokter'        => $AaKcHapus->reviiew_dokter,
				'reviiew_anestesi'      => $AaKcHapus->reviiew_anestesi,
				'reviiew_perawat'       => $AaKcHapus->reviiew_perawat,
				'ctscan_aakc_1'         => $AaKcHapus->ctscan_aakc_1,
				'ctscan_aakc_2'         => $AaKcHapus->ctscan_aakc_2,

				'signout_aakc'          => $AaKcHapus->signout_aakc,
				'komunikasie_aakc_1'    => $AaKcHapus->komunikasie_aakc_1,
				'komunikasie_aakc_2'    => $AaKcHapus->komunikasie_aakc_2,
				'dicatat_aakc_1'        => $AaKcHapus->dicatat_aakc_1,
				'dicatat_aakc_2'        => $AaKcHapus->dicatat_aakc_2,
				'benar_aakc_1'          => $AaKcHapus->benar_aakc_1,
				'benar_aakc_2'          => $AaKcHapus->benar_aakc_2,
				'spesimen_aakc_1'       => $AaKcHapus->spesimen_aakc_1,
				'spesimen_aakc_2'       => $AaKcHapus->spesimen_aakc_2,
				'peralatan_aakc_1'      => $AaKcHapus->peralatan_aakc_1,
				'peralatan_aakc_2'      => $AaKcHapus->peralatan_aakc_2,
				'penyembuhan_aakc_1'    => $AaKcHapus->penyembuhan_aakc_1,
				'penyembuhan_aakc_2'    => $AaKcHapus->penyembuhan_aakc_2,

				'ada_aakc_1'            => $AaKcHapus->ada_aakc_1,
				'ada_aakc_2'            => $AaKcHapus->ada_aakc_2,
				'tdada_aakc_1'         => $AaKcHapus->tdada_aakc_1,
				'ya_aakc_2'            	=> $AaKcHapus->ya_aakc_2,

				'jelaskan_aakc'         => $AaKcHapus->jelaskan_aakc,
				'jamverifikasi_aakc'    => $AaKcHapus->jamverifikasi_aakc,
				'tanggal_aakc'          => $AaKcHapus->tanggal_aakc,
				'dokteroperator2_aakc'  => $AaKcHapus->dokteroperator2_aakc,
				'perawat_aakc'          => $AaKcHapus->perawat_aakc,
				'dokteroperator3_aakc' 	=> $AaKcHapus->dokteroperator3_aakc,

				'id_users'             	=> $AaKcHapus->id_users, // ✅ user input pertama
				'deleted_by'           	=> $this->session->userdata('id_translucent'), // ✅ user yang hapus
				'created_date'         	=> $AaKcHapus->created_date,
				'updated_on'           	=> $this->datetime,
				'log_action'           	=> 'delete'
			);
			$this->db->insert('sm_asesmen_awal_keperawatan_cathlab_logs', $logDataAaKc);
		}
		// Hapus data utama
		$this->db->where('id', safe_post('id'))->delete('sm_asesmen_awal_keperawatan_cathlab');
	
		if ($this->db->trans_status() === false) :
			$this->db->trans_rollback();
			$status = false;
			$message = 'Gagal Hapus Data';
		else :
			$this->db->trans_commit();
			$status = true;
			$message = 'Berhasil Hapus Data';
		endif;
	
		$this->response(array('status' => $status, 'message' => $message), REST_Controller::HTTP_OK);
	}

	// AAKC
	function get_edit_asesmen_awal_keperawatan_cathlab_get(){
		$data['pendaftaran_detail'] = "";
		$data['list_edit_asesmen_awal_keperawatan_cathlab'] = "";
		$data['pendaftaran_detail'] = $this->radiologi->getPendaftaranDetailRadiologi($this->get('id_layanan_pendaftaran'));
		$data['list_edit_asesmen_awal_keperawatan_cathlab'] = $this->radiologi->getAsesmenAwalKeperawatanCathlabById($this->get('id'));
		if ($data != null) {
			$this->response($data, REST_Controller::HTTP_OK);
		} else {
			$this->response($data, REST_Controller::HTTP_OK);
		}
	}


	// CPTDQ LOGS
	function get_data_cheklist_post_tindakan_diagnostik_qembar_get(){
		$data['pendaftaran_detail'] = "";
		$data['list_checklist_post_tindakan_diagnostik_qembar'] = [];
		$data = $this->radiologi->getPendaftaranDetailTindakanRadiologi($this->get('id_pendaftaran', true), $this->get('id_layanan', true));
		$data['pendaftaran_detail'] = $this->radiologi->getPendaftaranDetailRadiologi($this->get('id_layanan_pendaftaran'));
		$data['list_checklist_post_tindakan_diagnostik_qembar'] = $this->radiologi->getCheklistPostTindakanDiagnostikQembar($this->get('id_pendaftaran'));	
		$data['list_checklist_post_tindakan_diagnostik_qembar_logs'] = $this->radiologi->getCheklistPostTindakanDiagnostikQembarLogs($this->get('id_pendaftaran'));	
		if ($data != null) {
			$this->response($data, REST_Controller::HTTP_OK);
		} else {
			$this->response($data, REST_Controller::HTTP_OK);
		}
	}

	// CPTDQ LOGS
	function simpan_checklist_post_tindakan_diagnostik_qembar_post(){
		$checkDataCptdq = '';
		if (safe_post('id_cptdq') !== '') {
			$checkDataCptdq = $this->radiologi->getCheklistPostTindakanDiagnostikQembarById(safe_post('id_cptdq'));
		}
		$this->db->trans_begin();
	
		if (empty($checkDataCptdq)) {
			// INSERT DATA
			$data = array(
				'id_pendaftaran'			=> safe_post('id_pendaftaran'),
				'id_layanan_pendaftaran'    => safe_post('id_layanan_pendaftaran'),
				'td_cptdq'                 	=> safe_post('td_cptdq') == '' ? null : safe_post('td_cptdq'),
				'hr_cptdq'                 	=> safe_post('hr_cptdq') == '' ? null : safe_post('hr_cptdq'),
				'rr_cptdq'                 	=> safe_post('rr_cptdq') == '' ? null : safe_post('rr_cptdq'),
				'suhu_cptdq'                => safe_post('suhu_cptdq') == '' ? null : safe_post('suhu_cptdq'),
				'radical_cptdq_1'           => safe_post('radical_cptdq_1') == '' ? null : safe_post('radical_cptdq_1'),
				'radical_cptdq_2'           => safe_post('radical_cptdq_2') == '' ? null : safe_post('radical_cptdq_2'),
				'radical_cptdq_3'           => safe_post('radical_cptdq_3') == '' ? null : safe_post('radical_cptdq_3'),
				'hematom_cptdq_1'           => safe_post('hematom_cptdq_1') == '' ? null : safe_post('hematom_cptdq_1'),
				'hematom_cptdq_2'           => safe_post('hematom_cptdq_2') == '' ? null : safe_post('hematom_cptdq_2'),
				'hematom_cptdq_3'           => safe_post('hematom_cptdq_3') == '' ? null : safe_post('hematom_cptdq_3'),
				'jampergelangan_cptdq'      => safe_post('jampergelangan_cptdq') == '' ? null : safe_post('jampergelangan_cptdq'),
				'jamsiku_cptdq'             => safe_post('jamsiku_cptdq') == '' ? null : safe_post('jamsiku_cptdq'),
				'jampci_cptdq'              => safe_post('jampci_cptdq') == '' ? null : safe_post('jampci_cptdq'),
				'denyut_cptdq_1'            => safe_post('denyut_cptdq_1') == '' ? null : safe_post('denyut_cptdq_1'),
				'denyut_cptdq_2'            => safe_post('denyut_cptdq_2') == '' ? null : safe_post('denyut_cptdq_2'),
				'denyut_cptdq_3'            => safe_post('denyut_cptdq_3') == '' ? null : safe_post('denyut_cptdq_3'),
				'hemmattom_cptdq_1'         => safe_post('hemmattom_cptdq_1') == '' ? null : safe_post('hemmattom_cptdq_1'),
				'hemmattom_cptdq_2'         => safe_post('hemmattom_cptdq_2') == '' ? null : safe_post('hemmattom_cptdq_2'),
				'hemmattom_cptdq_3'         => safe_post('hemmattom_cptdq_3') == '' ? null : safe_post('hemmattom_cptdq_3'),
				'jamkaki_cptdq'             => safe_post('jamkaki_cptdq') == '' ? null : safe_post('jamkaki_cptdq'),
				'jamkitekuk_cptdq'          => safe_post('jamkitekuk_cptdq') == '' ? null : safe_post('jamkitekuk_cptdq'),
				'jamaptt_cptdq'             => safe_post('jamaptt_cptdq') == '' ? null : safe_post('jamaptt_cptdq'),
				'hasil_cptdq_1'             => safe_post('hasil_cptdq_1') == '' ? null : safe_post('hasil_cptdq_1'),
				'hasil_cptdq_2'             => safe_post('hasil_cptdq_2') == '' ? null : safe_post('hasil_cptdq_2'),
				'hasil_cptdq_3'             => safe_post('hasil_cptdq_3') == '' ? null : safe_post('hasil_cptdq_3'),
				'cddvd_cptdq_1'             => safe_post('cddvd_cptdq_1') == '' ? null : safe_post('cddvd_cptdq_1'),
				'cddvd_cptdq_2'             => safe_post('cddvd_cptdq_2') == '' ? null : safe_post('cddvd_cptdq_2'),
				'cddvd_cptdq_3'             => safe_post('cddvd_cptdq_3') == '' ? null : safe_post('cddvd_cptdq_3'),
				'tanggal_cptdq' 	    	=> safe_post('tanggal_cptdq') == '' ? null : date2mysql(safe_post('tanggal_cptdq')),
				'perawatcathlab_cptdq'   	=> safe_post('perawatcathlab_cptdq') == '' ? null : safe_post('perawatcathlab_cptdq'),
				'perawatruangan_cptdq'   	=> safe_post('perawatruangan_cptdq') == '' ? null : safe_post('perawatruangan_cptdq'),
				'id_users'					=> $this->session->userdata('id_translucent'),
				'created_date'				=> $this->datetime,
				'updated_on'             	=> $this->datetime	
			);
			$this->db->insert('sm_cheklist_post_tindakan_diagnostik_qembar', $data);
	
		} else {
			// UPDATE DATA
			$data = array(
				'td_cptdq'                 	=> safe_post('td_cptdq') == '' ? null : safe_post('td_cptdq'),
				'hr_cptdq'                 	=> safe_post('hr_cptdq') == '' ? null : safe_post('hr_cptdq'),
				'rr_cptdq'                 	=> safe_post('rr_cptdq') == '' ? null : safe_post('rr_cptdq'),
				'suhu_cptdq'                 => safe_post('suhu_cptdq') == '' ? null : safe_post('suhu_cptdq'),
				'radical_cptdq_1'            => safe_post('radical_cptdq_1') == '' ? null : safe_post('radical_cptdq_1'),
				'radical_cptdq_2'            => safe_post('radical_cptdq_2') == '' ? null : safe_post('radical_cptdq_2'),
				'radical_cptdq_3'            => safe_post('radical_cptdq_3') == '' ? null : safe_post('radical_cptdq_3'),
				'hematom_cptdq_1'            => safe_post('hematom_cptdq_1') == '' ? null : safe_post('hematom_cptdq_1'),
				'hematom_cptdq_2'            => safe_post('hematom_cptdq_2') == '' ? null : safe_post('hematom_cptdq_2'),
				'hematom_cptdq_3'            => safe_post('hematom_cptdq_3') == '' ? null : safe_post('hematom_cptdq_3'),
				'jampergelangan_cptdq'       => safe_post('jampergelangan_cptdq') == '' ? null : safe_post('jampergelangan_cptdq'),
				'jamsiku_cptdq'              => safe_post('jamsiku_cptdq') == '' ? null : safe_post('jamsiku_cptdq'),
				'jampci_cptdq'               => safe_post('jampci_cptdq') == '' ? null : safe_post('jampci_cptdq'),
				'denyut_cptdq_1'             => safe_post('denyut_cptdq_1') == '' ? null : safe_post('denyut_cptdq_1'),
				'denyut_cptdq_2'             => safe_post('denyut_cptdq_2') == '' ? null : safe_post('denyut_cptdq_2'),
				'denyut_cptdq_3'             => safe_post('denyut_cptdq_3') == '' ? null : safe_post('denyut_cptdq_3'),
				'hemmattom_cptdq_1'          => safe_post('hemmattom_cptdq_1') == '' ? null : safe_post('hemmattom_cptdq_1'),
				'hemmattom_cptdq_2'          => safe_post('hemmattom_cptdq_2') == '' ? null : safe_post('hemmattom_cptdq_2'),
				'hemmattom_cptdq_3'          => safe_post('hemmattom_cptdq_3') == '' ? null : safe_post('hemmattom_cptdq_3'),
				'jamkaki_cptdq'              => safe_post('jamkaki_cptdq') == '' ? null : safe_post('jamkaki_cptdq'),
				'jamkitekuk_cptdq'           => safe_post('jamkitekuk_cptdq') == '' ? null : safe_post('jamkitekuk_cptdq'),
				'jamaptt_cptdq'              => safe_post('jamaptt_cptdq') == '' ? null : safe_post('jamaptt_cptdq'),
				'hasil_cptdq_1'              => safe_post('hasil_cptdq_1') == '' ? null : safe_post('hasil_cptdq_1'),
				'hasil_cptdq_2'              => safe_post('hasil_cptdq_2') == '' ? null : safe_post('hasil_cptdq_2'),
				'hasil_cptdq_3'              => safe_post('hasil_cptdq_3') == '' ? null : safe_post('hasil_cptdq_3'),
				'cddvd_cptdq_1'              => safe_post('cddvd_cptdq_1') == '' ? null : safe_post('cddvd_cptdq_1'),
				'cddvd_cptdq_2'              => safe_post('cddvd_cptdq_2') == '' ? null : safe_post('cddvd_cptdq_2'),
				'cddvd_cptdq_3'              => safe_post('cddvd_cptdq_3') == '' ? null : safe_post('cddvd_cptdq_3'),
				'tanggal_cptdq' 	    		=> safe_post('tanggal_cptdq') == '' ? null : date2mysql(safe_post('tanggal_cptdq')),
				'perawatcathlab_cptdq'   	=> safe_post('perawatcathlab_cptdq') == '' ? null : safe_post('perawatcathlab_cptdq'),
				'perawatruangan_cptdq'   	=> safe_post('perawatruangan_cptdq') == '' ? null : safe_post('perawatruangan_cptdq'),
				'updated_on'              	=> $this->datetime
			);
	
			$logData = array(
				'id_cptdq'              	=> $checkDataCptdq->id, // 🆕 ID utama
				'id_pendaftaran'       	=> $checkDataCptdq->id_pendaftaran,
				'id_layanan_pendaftaran'=> $checkDataCptdq->id_layanan_pendaftaran,
				'td_cptdq'             	=> $checkDataCptdq->td_cptdq,
				'hr_cptdq'             	=> $checkDataCptdq->hr_cptdq,
				'rr_cptdq'             	=> $checkDataCptdq->rr_cptdq,
				'suhu_cptdq'             => $checkDataCptdq->suhu_cptdq,
				'radical_cptdq_1'        => $checkDataCptdq->radical_cptdq_1,
				'radical_cptdq_2'        => $checkDataCptdq->radical_cptdq_2,
				'radical_cptdq_3'        => $checkDataCptdq->radical_cptdq_3,
				'hematom_cptdq_1'        => $checkDataCptdq->hematom_cptdq_1,
				'hematom_cptdq_2'        => $checkDataCptdq->hematom_cptdq_2,
				'hematom_cptdq_3'        => $checkDataCptdq->hematom_cptdq_3,
				'jampergelangan_cptdq'   => $checkDataCptdq->jampergelangan_cptdq,
				'jamsiku_cptdq'         	=> $checkDataCptdq->jamsiku_cptdq,
				'jampci_cptdq'           => $checkDataCptdq->jampci_cptdq,
				'denyut_cptdq_1'         => $checkDataCptdq->denyut_cptdq_1,
				'denyut_cptdq_2'         => $checkDataCptdq->denyut_cptdq_2,
				'denyut_cptdq_3'         => $checkDataCptdq->denyut_cptdq_3,
				'hemmattom_cptdq_1'      => $checkDataCptdq->hemmattom_cptdq_1,
				'hemmattom_cptdq_2'      => $checkDataCptdq->hemmattom_cptdq_2,
				'hemmattom_cptdq_3'      => $checkDataCptdq->hemmattom_cptdq_3,
				'jamkaki_cptdq'          => $checkDataCptdq->jamkaki_cptdq,
				'jamkitekuk_cptdq'       => $checkDataCptdq->jamkitekuk_cptdq,
				'jamaptt_cptdq'          => $checkDataCptdq->jamaptt_cptdq,
				'hasil_cptdq_1'          => $checkDataCptdq->hasil_cptdq_1,
				'hasil_cptdq_2'          => $checkDataCptdq->hasil_cptdq_2,
				'hasil_cptdq_3'          => $checkDataCptdq->hasil_cptdq_3,
				'cddvd_cptdq_1'          => $checkDataCptdq->cddvd_cptdq_1,
				'cddvd_cptdq_2'          => $checkDataCptdq->cddvd_cptdq_2,
				'cddvd_cptdq_3'          => $checkDataCptdq->cddvd_cptdq_3,
				'tanggal_cptdq'          => $checkDataCptdq->tanggal_cptdq,
				'perawatcathlab_cptdq'   => $checkDataCptdq->perawatcathlab_cptdq,
				'perawatruangan_cptdq'   => $checkDataCptdq->perawatruangan_cptdq,
				'id_users'             	=> $checkDataCptdq->id_users, // ✅ user input pertama
				'updated_by'           	=> $this->session->userdata('id_translucent'), // ✅ user yang edit
				'created_date'         	=> $checkDataCptdq->created_date,
				'updated_on'           	=> $this->datetime,
				'log_action'           	=> 'update'
			);

			$this->db->insert('sm_cheklist_post_tindakan_diagnostik_qembar_logs', $logData);
	
			$this->db->where('id', safe_post('id_cptdq'));
			$this->db->update('sm_cheklist_post_tindakan_diagnostik_qembar', $data);
		}
	
		if ($this->db->trans_status() === false) {
			$this->db->trans_rollback();
			$status = false;
			$message = 'Gagal simpan Data';
		} else {
			$this->db->trans_commit();
			$status = true;
			$message = 'Berhasil simpan Data';
		}
	
		$this->response(array('status' => $status, 'message' => $message), REST_Controller::HTTP_OK);
	}

	// CPTDQ LOGS
	function hapus_checklist_post_tindakan_diagnostik_qembar_post(){
		if (!safe_post('id', true)) :
			$this->response(null, REST_Controller::HTTP_BAD_REQUEST);
		endif;
		// Ambil data sebelum dihapus
		$CpTdQHapus = $this->db->where('id', safe_post('id'))->get('sm_cheklist_post_tindakan_diagnostik_qembar')->row();
		$this->db->trans_begin();
		if ($CpTdQHapus) {
			// Simpan ke log
			$logDataCpTdQ = array(
				'id_cptdq'              	=> $CpTdQHapus->id, // 🆕 ID utama
				'id_pendaftaran'       		=> $CpTdQHapus->id_pendaftaran,
				'id_layanan_pendaftaran' 	=> $CpTdQHapus->id_layanan_pendaftaran,
				'td_cptdq'             		=> $CpTdQHapus->td_cptdq,
				'hr_cptdq'             		=> $CpTdQHapus->hr_cptdq,
				'rr_cptdq'             		=> $CpTdQHapus->rr_cptdq,
				'suhu_cptdq'             	=> $CpTdQHapus->suhu_cptdq,
				'radical_cptdq_1'        	=> $CpTdQHapus->radical_cptdq_1,
				'radical_cptdq_2'        	=> $CpTdQHapus->radical_cptdq_2,
				'radical_cptdq_3'        	=> $CpTdQHapus->radical_cptdq_3,
				'hematom_cptdq_1'        	=> $CpTdQHapus->hematom_cptdq_1,
				'hematom_cptdq_2'        	=> $CpTdQHapus->hematom_cptdq_2,
				'hematom_cptdq_3'        	=> $CpTdQHapus->hematom_cptdq_3,
				'jampergelangan_cptdq'   	=> $CpTdQHapus->jampergelangan_cptdq,
				'jamsiku_cptdq'         	=> $CpTdQHapus->jamsiku_cptdq,
				'jampci_cptdq'           	=> $CpTdQHapus->jampci_cptdq,
				'denyut_cptdq_1'         	=> $CpTdQHapus->denyut_cptdq_1,
				'denyut_cptdq_2'         	=> $CpTdQHapus->denyut_cptdq_2,
				'denyut_cptdq_3'         	=> $CpTdQHapus->denyut_cptdq_3,
				'hemmattom_cptdq_1'      	=> $CpTdQHapus->hemmattom_cptdq_1,
				'hemmattom_cptdq_2'      	=> $CpTdQHapus->hemmattom_cptdq_2,
				'hemmattom_cptdq_3'      	=> $CpTdQHapus->hemmattom_cptdq_3,
				'jamkaki_cptdq'          	=> $CpTdQHapus->jamkaki_cptdq,
				'jamkitekuk_cptdq'       	=> $CpTdQHapus->jamkitekuk_cptdq,
				'jamaptt_cptdq'          	=> $CpTdQHapus->jamaptt_cptdq,
				'hasil_cptdq_1'          	=> $CpTdQHapus->hasil_cptdq_1,
				'hasil_cptdq_2'          	=> $CpTdQHapus->hasil_cptdq_2,
				'hasil_cptdq_3'          	=> $CpTdQHapus->hasil_cptdq_3,
				'cddvd_cptdq_1'          	=> $CpTdQHapus->cddvd_cptdq_1,
				'cddvd_cptdq_2'          	=> $CpTdQHapus->cddvd_cptdq_2,
				'cddvd_cptdq_3'          	=> $CpTdQHapus->cddvd_cptdq_3,
				'tanggal_cptdq'          	=> $CpTdQHapus->tanggal_cptdq,
				'perawatcathlab_cptdq'   	=> $CpTdQHapus->perawatcathlab_cptdq,
				'perawatruangan_cptdq'   	=> $CpTdQHapus->perawatruangan_cptdq,
				'id_users'             		=> $CpTdQHapus->id_users, // ✅ user input pertama
				'deleted_by'           		=> $this->session->userdata('id_translucent'), // ✅ user yang hapus
				'created_date'         		=> $CpTdQHapus->created_date,
				'updated_on'           		=> $this->datetime,
				'log_action'           		=> 'delete'
			);
			$this->db->insert('sm_cheklist_post_tindakan_diagnostik_qembar_logs', $logDataCpTdQ);
		}
		// Hapus data utama
		$this->db->where('id', safe_post('id'))->delete('sm_cheklist_post_tindakan_diagnostik_qembar');
	
		if ($this->db->trans_status() === false) :
			$this->db->trans_rollback();
			$status = false;
			$message = 'Gagal Hapus Data';
		else :
			$this->db->trans_commit();
			$status = true;
			$message = 'Berhasil Hapus Data';
		endif;
	
		$this->response(array('status' => $status, 'message' => $message), REST_Controller::HTTP_OK);
	}

	// CPTDQ
	function get_edit_checklist_post_tindakan_diagnostik_qembar_get(){
		$data['pendaftaran_detail'] = "";
		$data['list_edit_checklist_post_tindakan_diagnostik_qembar'] = "";
		$data['pendaftaran_detail'] = $this->radiologi->getPendaftaranDetailRadiologi($this->get('id_layanan_pendaftaran'));
		$data['list_edit_checklist_post_tindakan_diagnostik_qembar'] = $this->radiologi->getCheklistPostTindakanDiagnostikQembarById($this->get('id'));
		if ($data != null) {
			$this->response($data, REST_Controller::HTTP_OK);
		} else {
			$this->response($data, REST_Controller::HTTP_OK);
		}
	}




}
