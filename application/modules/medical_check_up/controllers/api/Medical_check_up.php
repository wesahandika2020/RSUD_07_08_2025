<?php

defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class Medical_check_up extends REST_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->limit = 10;
        $this->load->model('Medical_check_up_model', 'm_mcu');
        $this->load->model('pendaftaran/Pendaftaran_model', 'm_pendaftaran');
        $this->load->model('pelayanan/Pelayanan_model', 'm_pelayanan');
        $this->load->model('paket_mcu/Paket_mcu_model', 'm_paket_mcu');
        $this->load->model('pendaftaran/Pendaftaran_model', 'klinik');
        // HPDO
        $this->load->model('Hasil_pemeriksaan_mcu_model', 'm_hasil_mcu');


        $id_translucent = $this->session->userdata('id_translucent');
        if (empty($id_translucent)) :
            $this->response(array('error' => 'Anda belum login'), REST_Controller::HTTP_UNAUTHORIZED);
            exit();
        endif;
    }

    function get_list_medical_check_up_get()
    {
        if (!$this->get('page')) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
        endif;

        $start          = ($this->get('page') - 1) * $this->limit;
        $search         = [
            'tanggal_awal'      => safe_get('tanggal_awal'),
            'tanggal_akhir'     => safe_get('tanggal_akhir'),
            'jenis_layanan'     => $this->get('jenis'),
            'no_register'       => safe_get('no_register'),
            'no_rm'             => safe_get('no_rm'),
            'nik'               => safe_get('nik'),
            'nama'              => safe_get('nama'),
            'layanan'           => safe_get('layanan'),
            'id_dokter'         => safe_get('id_dokter'),
        ];

        $data            = $this->m_mcu->getListDataPemeriksaanMcu($this->limit, $start, $search);
        $data['page']    = (int) $this->get('page');
        $data['limit']   = $this->limit;

        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK); // (200)
        endif;
    }

    function store_post()
    {
        $this->db->trans_begin();

        $checkPaketLayanan = $this->m_mcu->getByIdPaketIdLayananPendaftaran(safe_post('id_layanan'), safe_post('id_paket'));

        if ($checkPaketLayanan == NULL) {
            $paketLayanan = array(
                'id_layanan_pendaftaran' => safe_post('id_layanan'),
                'id_paket' => safe_post('id_paket'),
                'created_at' => $this->datetime,
                'created_by' => $this->session->userdata('id_translucent'),
            );

            $this->db->insert('sm_layanan_pendaftaran_paket', $paketLayanan);
        }

        if ($this->db->trans_status() === false) :
            $this->db->trans_rollback();
            $status = false;
            $message = 'Gagal menyimpan pemeriksaan MCU';
        else :
            $this->db->trans_commit();
            $status = true;
            $message = 'Berhasil menyimpan pemeriksaan MCU';
        endif;

        $this->response(array('status' => $status, 'message' => $message));
    }


 

    function detail_pemeriksaan_get()
    {
        $idLayananPendaftaran = $this->get('id_layanan', true);

        $layananPendaftaranPaket = $this->m_mcu->getLayananPendaftaranByIdLayananPendaftaran($idLayananPendaftaran);

        $data = $this->m_pendaftaran->getPendaftaranDetail($this->get('id', true), $idLayananPendaftaran);

        if (!empty($layananPendaftaranPaket)) {
            $data['tindakan'] = $this->m_paket_mcu->getDetailByIdPaket($layananPendaftaranPaket->id_paket);
        }

        $data['anamnesa']           = $this->m_pelayanan->getAnamnesa($idLayananPendaftaran);
        $data['anamnesa_okupasi']   = $this->m_pelayanan->getAnamnesaOkupasi($data['pasien']->id);
        $data['tindakan']           = $this->m_pelayanan->getTindakanPemeriksaan($idLayananPendaftaran);
        $data['profil']             = $this->m_pelayanan->getProfilPasien($data['pasien']->id_pasien);
        $data['subspesialis']       = $this->m_pelayanan->checkSubSpesialis((int)$data['layanan']->id_unit_layanan);
        $data['diagnosa']           = $this->m_pelayanan->getDiagnosaPemeriksaan($data['layanan']->id);

        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK); // (200)
        endif;
    }

    function data_item_paket_get()
    {
        $idLayananTarif = $this->get('id', true);
        $data['item'] = $this->m_mcu->getLayananByIdLayananTarif($idLayananTarif);

        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK); // (200)
        endif;
    }

    function data_anamnesa_get()
    {
        $idLayananPendaftaran = $this->get('id_layanan', true);

        // $layananPendaftaranPaket = $this->m_mcu->getLayananPendaftaranByIdLayananPendaftaran($idLayananPendaftaran);						

        // $data = $this->m_pendaftaran->getPendaftaranDetail($this->get('id', true), $idLayananPendaftaran);

        // if(!empty($layananPendaftaranPaket)) {
        // 	$data['tindakan'] = $this->m_paket_mcu->getDetailByIdPaket($layananPendaftaranPaket->id_paket);			
        // }

        $data['anamnesa']     = $this->m_pelayanan->getAnamnesa($idLayananPendaftaran);
        // $data['tindakan']     = $this->m_pelayanan->getTindakanPemeriksaan($idLayananPendaftaran);			
        // $data['profil']       = $this->m_pelayanan->getProfilPasien($data['pasien']->id_pasien);
        // $data['subspesialis'] = $this->m_pelayanan->checkSubSpesialis((int)$data['layanan']->id_unit_layanan);

        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK); // (200)
        endif;
    }

    // SKPK
    function form_skpk_get(){
        $this->load->model('pendaftaran/Pendaftaran_model', 'm_pendaftaran');

        $data['pendaftaran_detail'] = [];
        $data['form_skpk'] = [];

        $data['pendaftaran_detail'] = $this->m_pendaftaran->getPendaftaranDetail($this->get('id_pendaftaran', true));

        $form_skpk = $this->m_mcu->getFormSKPK($this->get('id_pendaftaran'));

        if (!empty($form_skpk)) {
            $data['form_skpk'] = $form_skpk;
        }


        if ($data != null) {
            $this->response($data, REST_Controller::HTTP_OK);
        } else {
            $this->response($data, REST_Controller::HTTP_OK);
        }
    }

    // SKPK
    function simpan_skpk_post(){
        $checkDataSKPK = '';
        $checkDataSKPK =  $this->m_mcu->getFormSKPK(safe_post('id_pendaftaran'));
        $this->db->trans_begin();
        if ($checkDataSKPK == NULL) {
            $data = array(
                'id_pendaftaran'            => safe_post('id_pendaftaran'),
                'no_surat'                  => safe_post('no_surat_skpk'),
                'tahun_surat'               => safe_post('tahun_surat_skpk'),
                'nip'                       => safe_post('nip_skpk'),
                'gol_ruang_skpk'            => safe_post('gol_ruang_skpk'),
                'nama_kecil'                => safe_post('nama_kecil_skpk'),
                'karpeg'                    => safe_post('karpeg_skpk'),
                'salinan_hasil_satu'        => safe_post('salinan_hasil_satu'),
                'salinan_hasil_dua'         => safe_post('salinan_hasil_dua'),
                'salinan_hasil_tiga'        => safe_post('salinan_hasil_tiga'),
                'telah_diperiksa'           => safe_post('telah_diperiksa'),
                'tanggal_diperiksa_skpk'    => safe_post('tanggal_diperiksa_skpk')  == '' ? null : date2mysql(safe_post('tanggal_diperiksa_skpk')),
                'tanggal_surat'             => safe_post('tanggal_surat')  == '' ? null : date2mysql(safe_post('tanggal_surat')),
                'id_dokter'                 => safe_post('dokter_penguji_kesahatan'),
            );
            $this->db->insert('sm_form_skpk', $data);
        } else {
            $data = array(
                'no_surat'                  => safe_post('no_surat_skpk'),
                'tahun_surat'               => safe_post('tahun_surat_skpk'),
                'nip'                       => safe_post('nip_skpk'),
                'gol_ruang_skpk'            => safe_post('gol_ruang_skpk'),
                'nama_kecil'                => safe_post('nama_kecil_skpk'),
                'karpeg'                    => safe_post('karpeg_skpk'),
                'salinan_hasil_satu'        => safe_post('salinan_hasil_satu'),
                'salinan_hasil_dua'         => safe_post('salinan_hasil_dua'),
                'salinan_hasil_tiga'        => safe_post('salinan_hasil_tiga'),
                'telah_diperiksa'           => safe_post('telah_diperiksa'),
                'tanggal_diperiksa_skpk'    => safe_post('tanggal_diperiksa_skpk')  == '' ? null : date2mysql(safe_post('tanggal_diperiksa_skpk')),
                'tanggal_surat'             => safe_post('tanggal_surat')  == '' ? null : date2mysql(safe_post('tanggal_surat')),
                'id_dokter'                 => safe_post('dokter_penguji_kesahatan'),
            );
            $this->db->where('id_pendaftaran', safe_post('id_pendaftaran'));
            $this->db->update('sm_form_skpk', $data);
        }
        if ($this->db->trans_status() === false) :
            $this->db->trans_rollback();
            $status = false;
            $message = 'Gagal simpan form SKPK';
        else :
            $this->db->trans_commit();
            $status = true;
            $message = 'Berhasil simpan form SKPK';
        endif;
        $this->response(array('status' => $status, 'message' => $message), REST_Controller::HTTP_OK);
    }


    function form_sk_dinkes_get()
    {
        $this->load->model('pendaftaran/Pendaftaran_model', 'm_pendaftaran');

        $data['pendaftaran_detail'] = [];
        $data['sk_dinkes'] = [];

        $data['pendaftaran_detail'] = $this->m_pendaftaran->getPendaftaranDetail($this->get('id_pendaftaran', true));

        $sk_dinkes = $this->m_mcu->getSKDinkes($this->get('id_pendaftaran'));

        if (!empty($sk_dinkes)) {
            $data['sk_dinkes'] = $sk_dinkes;
        }


        if ($data != null) {
            $this->response($data, REST_Controller::HTTP_OK);
        } else {
            $this->response($data, REST_Controller::HTTP_OK);
        }
    }

    function simpan_sk_dinkes_post()
    {
        $checkDataSKDinkes = '';
        $checkDataSKDinkes =  $this->m_mcu->getSKDinkes(safe_post('id_pendaftaran'));

        $this->db->trans_begin();
        if ($checkDataSKDinkes == NULL) {
            $data = array(
                'id_pendaftaran'         => safe_post('id_pendaftaran'),
                'nip'                   => safe_post('nip_sk'),
                'gol_ruang'             => safe_post('gol_ruang_sk'),
                'nama_kecil'            => safe_post('nama_kecil_sk'),
                'karpeg'                => safe_post('karpeg_sk'),
                'salinan_satu'          => safe_post('salin_hasil_satu'),
                'salinan_dua'           => safe_post('salin_hasil_dua'),
                'salinan_tiga'          => safe_post('salin_hasil_tiga'),
                'tanggal_surat_dinkes'  => safe_post('tanggal_surat_sk'),
                'id_dokter_dinkes'      => safe_post('dokter_sk_dinkes'),
            );

            $this->db->insert('sm_skpk_dinkes', $data);
        } else {
            $data = array(
                'nip'                   => safe_post('nip_sk'),
                'gol_ruang'             => safe_post('gol_ruang_sk'),
                'nama_kecil'            => safe_post('nama_kecil_sk'),
                'karpeg'                => safe_post('karpeg_sk'),
                'salinan_satu'          => safe_post('salin_hasil_satu'),
                'salinan_dua'           => safe_post('salin_hasil_dua'),
                'salinan_tiga'          => safe_post('salin_hasil_tiga'),
                'tanggal_surat_dinkes'  => safe_post('tanggal_surat_sk'),
                'id_dokter_dinkes'      => safe_post('dokter_sk_dinkes'),
            );

            $this->db->where('id_pendaftaran', safe_post('id_pendaftaran'));
            $this->db->update('sm_skpk_dinkes', $data);
        }

        if ($this->db->trans_status() === false) :
            $this->db->trans_rollback();
            $status = false;
            $message = 'Gagal simpan form SK Kemenkes';
        else :
            $this->db->trans_commit();
            $status = true;
            $message = 'Berhasil simpan form SK Kemenkes';
        endif;

        $this->response(array('status' => $status, 'message' => $message), REST_Controller::HTTP_OK);
    }

    function form_sk_sehat_get()
    {

        $this->load->model('pendaftaran/Pendaftaran_model', 'm_pendaftaran');

        $data['pendaftaran_detail'] = [];
        $data['sk_sehat'] = [];

        $data['pendaftaran_detail'] = $this->m_pendaftaran->getPendaftaranDetail($this->get('id', true), $this->get('id_layanan_pendaftaran', true));


        $sk_sehat = $this->m_mcu->getSKSehat($this->get('id_layanan_pendaftaran'));

        if (!empty($sk_sehat)) {
            $data['sk_sehat'] = $sk_sehat;
        }

        if ($data != null) {
            $this->response($data, REST_Controller::HTTP_OK);
        } else {
            $this->response($data, REST_Controller::HTTP_OK);
        }
    }

    function simpan_sks_post()
    {
        $checkDataSKSehat = '';
        $checkDataSKSehat =  $this->m_mcu->getSKSehat(safe_post('id_layanan_pendaftaran'));

        $this->db->trans_begin();

        if ($checkDataSKSehat->id_dokter_sks == NULL) {
            $data = array(
                'id_layanan_pendaftaran'         => safe_post('id_layanan_pendaftaran'),
                'id_dokter_sks'                 => safe_post('dokter_sks'),
                'keterangan_surat_sks'          => safe_post('keterangan_surat_sks'),
                'keterangan_sks_english'        => safe_post('keterangan_surat_english'),
                'catatan_sks'                   => safe_post('catatan_sks'),
                'notes_sks'                     => safe_post('notes_sks'),
                'no_surat_sks'                  => safe_post('no_surat_sks'),
                'tahun_surat_sks'               => safe_post('tahun_surat_sks'),
                'hasil_pemeriksaan'             => safe_post('hasil_pemeriksaan_mcu'),
                'hasil_pemeriksaan_english'     => safe_post('hasil_pemeriksaan_mcuu'),
                'nip_sip'                       => safe_post('nip_sip'),
                'tanggal_periksa_sks'           => safe_post('tanggal_periksa_sks')  == '' ? null : date2mysql(safe_post('tanggal_periksa_sks')),

            );

            $this->db->insert('sm_form_sks', $data);
        } else {
            $data = array(
                'id_dokter_sks'                 => safe_post('dokter_sks'),
                'keterangan_surat_sks'          => safe_post('keterangan_surat_sks'),
                'keterangan_sks_english'        => safe_post('keterangan_surat_english'),
                'catatan_sks'                   => safe_post('catatan_sks'),
                'notes_sks'                     => safe_post('notes_sks'),
                'no_surat_sks'                  => safe_post('no_surat_sks'),
                'tahun_surat_sks'               => safe_post('tahun_surat_sks'),
                'hasil_pemeriksaan'             => safe_post('hasil_pemeriksaan_mcu'),
                'hasil_pemeriksaan_english'     => safe_post('hasil_pemeriksaan_mcuu'),
                'nip_sip'                       => safe_post('nip_sip'),
                'tanggal_periksa_sks'           => safe_post('tanggal_periksa_sks')  == '' ? null : date2mysql(safe_post('tanggal_periksa_sks')),

            );

            $this->db->where('id_layanan_pendaftaran', safe_post('id_layanan_pendaftaran'));
            $this->db->update('sm_form_sks', $data);
        }

        if ($this->db->trans_status() === false) :
            $this->db->trans_rollback();
            $status = false;
            $message = 'Gagal simpan Surat Keterangan Sehat';
        else :
            $this->db->trans_commit();
            $status = true;
            $message = 'Berhasil simpan Surat Keterangan Sehat';
        endif;

        $this->response(array('status' => $status, 'message' => $message), REST_Controller::HTTP_OK);
    }

    function surat_bebas_narkoba_get()
    {

        $this->load->model('pendaftaran/Pendaftaran_model', 'm_pendaftaran');

        $data['pendaftaran_detail'] = [];
        $data['surat_narkoba'] = [];

        $data['pendaftaran_detail'] = $this->m_pendaftaran->getPendaftaranDetail($this->get('id', true), $this->get('id_layanan_pendaftaran', true));


        $sbn = $this->m_mcu->getSBN($this->get('id_layanan_pendaftaran'));

        if (!empty($sbn)) {
            $data['surat_narkoba'] = $sbn;
        }

        if ($data != null) {
            $this->response($data, REST_Controller::HTTP_OK);
        } else {
            $this->response($data, REST_Controller::HTTP_OK);
        }
    }

    function simpan_sbn_post()
    {
        $checkDataSBN = '';
        $checkDataSBN =  $this->m_mcu->getSBN(safe_post('id_layanan_pendaftaran'));

        $this->db->trans_begin();

        if ($checkDataSBN->id_dokter_narkoba == NULL) {
            $data = array(
                'id_layanan_pendaftaran'         => safe_post('id_layanan_pendaftaran'),
                'no_surat'                      => safe_post('no_surat_sbn'),
                'tahun_surat'                   => safe_post('tahun_surat_sbn'),
                'id_dokter_narkoba'             => safe_post('dokter_sbn'),
                'nip_sip'                       => safe_post('nip_sip'),
                'tanggal_pemeriksaan'           => safe_post('tanggal_surat_sbn')  == '' ? null : date2mysql(safe_post('tanggal_surat_sbn')),

            );

            $this->db->insert('sm_surat_narkoba', $data);
        } else {
            $data = array(
                'no_surat'                      => safe_post('no_surat_sbn'),
                'tahun_surat'                   => safe_post('tahun_surat_sbn'),
                'id_dokter_narkoba'             => safe_post('dokter_sbn'),
                'nip_sip'                       => safe_post('nip_sip'),
                'tanggal_pemeriksaan'           => safe_post('tanggal_surat_sbn')  == '' ? null : date2mysql(safe_post('tanggal_surat_sbn')),

            );

            $this->db->where('id_layanan_pendaftaran', safe_post('id_layanan_pendaftaran'));
            $this->db->update('sm_surat_narkoba', $data);
        }

        if ($this->db->trans_status() === false) :
            $this->db->trans_rollback();
            $status = false;
            $message = 'Gagal simpan Surat Keterangan Bebas Narkoba';
        else :
            $this->db->trans_commit();
            $status = true;
            $message = 'Berhasil simpan Surat Keterangan Bebas Narkoba';
        endif;

        $this->response(array('status' => $status, 'message' => $message), REST_Controller::HTTP_OK);
    }








    function simpan_pemeriksaan_mcu_post() {


        /*$this->db->trans_begin();

		$checkPaketLayanan = $this->m_mcu->getByIdPaketIdLayananPendaftaran(safe_post('id_layanan'), safe_post('id_paket'));

		if($checkPaketLayanan == NULL) {
			$paketLayanan = array(
				'id_layanan_pendaftaran' => safe_post('id_layanan'),
				'id_paket' => safe_post('id_paket'),            
				'created_at' => $this->datetime, 
				'created_by' => $this->session->userdata('id_translucent'),             
			);        				
	
			$this->db->insert('sm_layanan_pendaftaran_paket', $paketLayanan);
		}		*/

        $this->db->trans_begin();

        // update alergi pasien
        $this->m_pelayanan->updateAlergiPasien(safe_post('id_pasien'), safe_post('alergi'));
        $lp_status = $this->db->select('status_terlayani, id_pendaftaran')->where('id', safe_post('id_layanan'))->get('sm_layanan_pendaftaran')->row();
        $id_sub_spesialis = NULL;

        // check subspesialis post
        if (isset($_POST['subspesialis'])) :
            $id_sub_spesialis = safe_post('subspesialis') !== '' ? safe_post('subspesialis') : NULL;
        endif;

        $dokter = safe_post('dokter') !== '' ? safe_post('dokter') : NULL;
        $layanan = array('id' => safe_post('id_layanan'), 'id_dokter' => $dokter, 'status_terlayani' => 'Sudah', 'id_sub_spesialis' => $id_sub_spesialis);

        // check dokter pengganti post
        if (isset($_POST['dokter_pengganti'])) :
            $layanan['id_dokter_pengganti'] = !empty($_POST['dokter_pengganti']) ? $_POST['dokter_pengganti'] : NULL;
        endif;

        // update layanan pendaftaran
        $this->m_pelayanan->updateLayananPendaftaran($layanan);


        // data anamnesa
        if (safe_post('jenis_layanan') !== 'Rawat Inap') {
            $anamnesa = array(
                'id_layanan_pendaftaran'    => safe_post('id_layanan'),
                'waktu'                     => $this->datetime,
                'keluhan_utama'             => safe_post('keluhan_utama') !== '' ? safe_post('keluhan_utama') : NULL,
                'riwayat_penyakit_keluarga' => safe_post('riwayat_penyakit_keluarga') !== '' ? safe_post('riwayat_penyakit_keluarga') : NULL,
                'riwayat_penyakit_sekarang' => safe_post('riwayat_penyakit_sekarang') !== '' ? safe_post('riwayat_penyakit_sekarang') : NULL,
                'anamnesa_sosial'           => safe_post('anamnesa_sosial') !== '' ? safe_post('anamnesa_sosial') : NULL,
                'riwayat_penyakit_dahulu'   => safe_post('riwayat_penyakit_dahulu') !== '' ? safe_post('riwayat_penyakit_dahulu') : NULL,
                'keadaan_umum'              => safe_post('keadaan_umum') !== '' ? safe_post('keadaan_umum') : NULL,
                'kesadaran'                 => safe_post('kesadaran') !== '' ? safe_post('kesadaran') : NULL,
                'gcs'                       => safe_post('gcs') !== '' ? safe_post('gcs') : NULL,
                'tensi_sistolik'            => safe_post('tensi_sistolik') !== '' ? safe_post('tensi_sistolik') : NULL,
                'tensi_diastolik'           => safe_post('tensi_diastolik') !== '' ? safe_post('tensi_diastolik') : NULL,
                'suhu'                      => safe_post('suhu') !== '' ? safe_post('suhu') : NULL,
                'nadi'                      => safe_post('nadi') !== '' ? safe_post('nadi') : NULL,
                'tinggi_badan'              => safe_post('tinggi_badan') !== '' ? safe_post('tinggi_badan') : NULL,
                'berat_badan'               => safe_post('berat_badan') !== '' ? safe_post('berat_badan') : NULL,
                'rr'                        => safe_post('rr') !== '' ? safe_post('rr') : NULL,
                'nps'                       => safe_post('nps') !== '' ? safe_post('nps') : NULL,
                'kepala'                    => safe_post('kepala') !== '' ? safe_post('kepala') : NULL,
                'thorax'                    => safe_post('thorax') !== '' ? safe_post('thorax') : NULL,
                'cor'                       => safe_post('cor') !== '' ? safe_post('cor') : NULL,
                'genitalia'                 => safe_post('genitalia') !== '' ? safe_post('genitalia') : NULL,
                'pemeriksaan_penunjang'     => safe_post('pemeriksaan_penunjang') !== '' ? safe_post('pemeriksaan_penunjang') : NULL,
                'status_mentalis'           => safe_post('status_mentalis') !== '' ? safe_post('status_mentalis') : NULL,
                'status_gizi'               => safe_post('status_gizi') !== '' ? safe_post('status_gizi') : NULL,
                'hidung'                    => safe_post('hidung') !== '' ? safe_post('hidung') : NULL,
                'mata'                      => safe_post('mata') !== '' ? safe_post('mata') : NULL,
                'usul_tindak_lanjut'        => safe_post('usul_tindak_lanjut') !== '' ? safe_post('usul_tindak_lanjut') : NULL,
                'leher'                     => safe_post('leher') !== '' ? safe_post('leher') : NULL,
                'pulmo'                     => safe_post('pulmo') !== '' ? safe_post('pulmo') : NULL,
                'abdomen'                   => safe_post('abdomen') !== '' ? safe_post('abdomen') : NULL,
                'ekstrimitas'               => safe_post('ekstrimitas') !== '' ? safe_post('ekstrimitas') : NULL,
                'prognosis'                 => safe_post('prognosis') !== '' ? safe_post('prognosis') : NULL,
                'lingkar_kepala'            => safe_post('lingkar_kepala') !== '' ? safe_post('lingkar_kepala') : NULL,
                'telinga'                   => safe_post('telinga') !== '' ? safe_post('telinga') : NULL,
                'tenggorok'                 => safe_post('tenggorok') !== '' ? safe_post('tenggorok') : NULL,
                'kulit_kelamin'             => safe_post('kulit_kelamin') !== '' ? safe_post('kulit_kelamin') : NULL,
                'pupil_dbn'                 => safe_post('pupil_dbn') !== '' ? safe_post('pupil_dbn') : NULL,
                'pupil_bentuk'              => safe_post('pupil_bentuk') !== '' ? safe_post('pupil_bentuk') : NULL,
                'pupil_ukuran'              => safe_post('pupil_ukuran') !== '' ? safe_post('pupil_ukuran') : NULL,
                'pupil_reflek_cahaya'       => safe_post('pupil_reflek_cahaya') !== '' ? safe_post('pupil_reflek_cahaya') : NULL,
                'nervi_cranialis_dbn'       => safe_post('nervi_cranialis_dbn') !== '' ? safe_post('nervi_cranialis_dbn') : NULL,
                'nervi_cranialis_paresis'   => safe_post('nervi_cranialis_paresis') !== '' ? safe_post('nervi_cranialis_paresis') : NULL,
                'rf_kiri_atas'              => safe_post('rf_kiri_atas') !== '' ? safe_post('rf_kiri_atas') : NULL,
                'rf_kiri_bawah'             => safe_post('rf_kiri_bawah') !== '' ? safe_post('rf_kiri_bawah') : NULL,
                'rf_kanan_atas'             => safe_post('rf_kanan_atas') !== '' ? safe_post('rf_kanan_atas') : NULL,
                'rf_kanan_bawah'            => safe_post('rf_kanan_bawah') !== '' ? safe_post('rf_kanan_bawah') : NULL,
                'sensorik_dbn'              => safe_post('sensorik_dbn') !== '' ? safe_post('sensorik_dbn') : NULL,
                'sensorik_lain'             => safe_post('sensorik_lain') !== '' ? safe_post('sensorik_lain') : NULL,
                'pemeriksaan_khusus'        => safe_post('pemeriksaan_khusus') !== '' ? safe_post('pemeriksaan_khusus') : NULL,
                'trm_dbn'                   => safe_post('trm_dbn') !== '' ? safe_post('trm_dbn') : NULL,
                'trm_kaku_kuduk'            => safe_post('trm_kaku_kuduk') !== '' ? safe_post('trm_kaku_kuduk') : NULL,
                'trm_laseque'               => safe_post('trm_laseque') !== '' ? safe_post('trm_laseque') : NULL,
                'trm_kerning'               => safe_post('trm_kerning') !== '' ? safe_post('trm_kerning') : NULL,
                'motorik_kiri_atas'         => safe_post('motorik_kiri_atas') !== '' ? safe_post('motorik_kiri_atas') : NULL,
                'motorik_kiri_bawah'        => safe_post('motorik_kiri_bawah') !== '' ? safe_post('motorik_kiri_bawah') : NULL,
                'motorik_kanan_atas'        => safe_post('motorik_kanan_atas') !== '' ? safe_post('motorik_kanan_atas') : NULL,
                'motorik_kanan_bawah'       => safe_post('motorik_kanan_bawah') !== '' ? safe_post('motorik_kanan_bawah') : NULL,
                'reflek_patologis'          => safe_post('reflek_patologis') !== '' ? safe_post('reflek_patologis') : NULL,
                'otonom'                    => safe_post('otonom') !== '' ? safe_post('otonom') : NULL,
                'riwayat_kelahiran'         => safe_post('riwayat_kelahiran') !== '' ? safe_post('riwayat_kelahiran') : NULL,
                'riwayat_nutrisi'           => safe_post('riwayat_nutrisi') !== '' ? safe_post('riwayat_nutrisi') : NULL,
                'riwayat_imunisasi'         => safe_post('riwayat_imunisasi') !== '' ? safe_post('riwayat_imunisasi') : NULL,
                'riwayat_tumbuh_kembang'    => safe_post('riwayat_tumbuh_kembang') !== '' ? safe_post('riwayat_tumbuh_kembang') : NULL,
                's_soap'                    => safe_post('s_soap') !== '' ? safe_post('s_soap') : NULL,
                'o_soap'                    => safe_post('o_soap') !== '' ? safe_post('o_soap') : NULL,
                'a_soap'                    => safe_post('a_soap') !== '' ? safe_post('a_soap') : NULL,
                'p_soap'                    => safe_post('p_soap') !== '' ? safe_post('p_soap') : NULL,
                'kritik'                    => safe_post('kritik') !== '' ? safe_post('kritik') : NULL,
                'saran'                     => safe_post('saran') !== '' ? safe_post('saran') : NULL,
            );
        } else {
            $visitasi = array(
                'id_layanan_pendaftaran'    => safe_post('id_layanan'),
                'waktu'                     => $this->datetime,
                'keluhan_utama'             => safe_post('keluhan_utama_ri') !== '' ? safe_post('keluhan_utama_ri') : NULL,
                'tensi_sistolik'            => safe_post('tensi_s') !== '' ? safe_post('tensi_s') : NULL,
                'tensi_diastolik'           => safe_post('tensi_d') !== '' ? safe_post('tensi_d') : NULL,
                'suhu'                      => safe_post('suhu_ri') !== '' ? safe_post('suhu_ri') : NULL,
                'nadi'                      => safe_post('nadi_ri') !== '' ? safe_post('nadi_ri') : NULL,
                'nps'                       => safe_post('nafas_ri') !== '' ? safe_post('nafas_ri') : NULL,
                'rr'                        => safe_post('respirasi_ri') !== '' ? safe_post('respirasi_ri') : NULL,
            );

            $soap = array(
                'id_layanan_pendaftaran'    => safe_post('id_layanan'),
                'waktu'                     => $this->datetime,
                'id_dokter'                 => safe_post('dokter') !== '' ? safe_post('dokter') : NULL,
                'jenis'                     => safe_post('jenis_layanan'),
                's_soap'                    => safe_post('s_soap') !== '' ? safe_post('s_soap') : NULL,
                'o_soap'                    => safe_post('o_soap') !== '' ? safe_post('o_soap') : NULL,
                'a_soap'                    => safe_post('a_soap') !== '' ? safe_post('a_soap') : NULL,
                'p_soap'                    => safe_post('p_soap') !== '' ? safe_post('p_soap') : NULL,
                'keterangan'                => safe_post('keterangan') !== '' ? safe_post('keterangan') : NULL,
            );
        }

        // insert data anamnesa
        if (safe_post('jenis_layanan') === 'Rawat Inap') :
            $this->m_pelayanan->insertAnamnesa($visitasi);
            $this->m_pelayanan->insertSOAP($soap);
            $jenis = 'Rawat Inap';
        else :
            if (safe_post('jenis_layanan') === 'IGD') :
                $this->m_pelayanan->updateAnamnesa($anamnesa);
                $jenis = 'IGD';
            else :
                if (safe_post('jenis_layanan') === 'Pemulasaran Jenazah') :
                    $jenis = 'Pemulasaran Jenazah';
                else :
                    if (safe_post('jenis_layanan') === 'Hemodialisa') :
                        $this->m_pelayanan->updateAnamnesa($anamnesa);
                        $jenis = 'Hemodialisa';
                    else :
                        if (safe_post('jenis_layanan') === 'MCU') :
                        $this->m_pelayanan->updateAnamnesa($anamnesa);
                        $jenis = 'MCU';
                    else :
                        $this->m_pelayanan->updateAnamnesa($anamnesa);
                        $jenis = 'Rawat Jalan';
                    endif;
                    endif;
                endif;
            endif;
        endif;

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
            'jenis_kasus'               => $this->post('jenis_kasus') !== '' ? $this->post('jenis_kasus') : NULL,
        );

        if ($jenis !== "Intensive Care") :
            $diagnosa['post'] = array(1);
        endif;
        // echo json_encode($diagnosa); die;
        // insert data diagnosa
        $this->m_pelayanan->simpanDiagnosaPemeriksaan($layanan['id'], $diagnosa, safe_post('id_pasien'));

        // data tindakan
        $tindakan = array(
            'operator' => $this->post('id_operator'),
            'tindakan' => $this->post('id_tindakan'),
            'tindakan_icd9' => $this->post('id_tindakan_icd9'),
            'qty'      => $this->post('qty'),
        );
        // var_dump($tindakan);die;

        // Looping setiap tindakan
        // for ($i = 0; $i < count($tindakan['operator']); $i++) {
        //     $data = array(
        //         'operator' => $tindakan['operator'][$i],
        //         'tindakan' => $tindakan['tindakan'][$i],
        //        'tindakan_icd9' => $tindakan['id_tindakan_icd9'][$i],
        //         'qty'      => $tindakan['qty'][$i],
        //     );
        // }

        //  insert data tindakan
        $this->m_pelayanan->simpanTindakanPemeriksaan(safe_post('id_layanan'), $tindakan, safe_post('jenis_layanan'));

        if ($this->db->trans_status() === false) :
            $this->db->trans_rollback();
            $status = false;
            $message = 'Gagal menyimpan pemeriksaan MCU';
        else :
            $this->db->trans_commit();
            $status = true;
            $message = 'Berhasil menyimpan pemeriksaan MCU';
        endif;

        $this->response(array('status' => $status, 'message' => $message));
    }







    

    // MRM
    function form_rekam_medis_get(){
        $this->load->model('pendaftaran/Pendaftaran_model', 'm_pendaftaran');

        $data['pendaftaran_detail'] = [];
        $data['data_resume_medis'] = [];

        $data['pendaftaran_detail'] = $this->m_pendaftaran->getPendaftaranDetail($this->get('id', true), $this->get('id_layanan_pendaftaran', true));

        $mcu = $this->m_mcu->getMCU($this->get('id_layanan_pendaftaran'));

        if (!empty($mcu)) {
            $data['data_resume_medis'] = $mcu;
        }

        if ($data != null) {
            $this->response($data, REST_Controller::HTTP_OK);
        } else {
            $this->response($data, REST_Controller::HTTP_OK);
        }
    }

    // MRM
    function simpan_mcu_post(){
        $checkDataMCU = '';
        $checkDataMCU = $this->m_mcu->getMCU(safe_post('id_layanan_pendaftaran'));

        $this->db->trans_begin();

        if ($checkDataMCU->mcu_dokter == NULL) {
            $data = array(
                'id_layanan_pendaftaran'    => safe_post('id_layanan_pendaftaran'),
                'mcu_unit_kerja'            => safe_post('mcu_unit_kerja'),
                // 'mcu_bmi'                   => safe_post('mcu_bmi'),
                'mcu_persepsi_warna'        => safe_post('mcu_persepsi_warna'),
                'mcu_jauh_od'               => safe_post('mcu_jauh_od'),
                'mcu_jauh_os'               => safe_post('mcu_jauh_os'),
                'mcu_dekat_od'              => safe_post('mcu_dekat_od'),
                'mcu_dekat_os'              => safe_post('mcu_dekat_os'),
                'mcu_konjungtiva'           => safe_post('mcu_konjungtiva'),
                'mcu_sklera'                => safe_post('mcu_sklera'),
                'mcu_komea'                 => safe_post('mcu_komea'),
                'mcu_gdm'                   => safe_post('mcu_gdm'),
                'mcu_jantung'               => safe_post('mcu_jantung'),
                'mcu_status_kesehatan'      => safe_post('mcu_status_kesehatan'),
                'mcu_dokter'                => safe_post('mcu_dokter'),
                'mcu_tanggal_surat'         => safe_post('mcu_tanggal_surat') == '' ? null : date2mysql(safe_post('mcu_tanggal_surat')),
            );

            // var_dump($data);
            // die;
            $this->db->insert('sm_resume_medis', $data);
        } else {
            $data = array(
                'id_layanan_pendaftaran'    => safe_post('id_layanan_pendaftaran'),
                'mcu_unit_kerja'            => safe_post('mcu_unit_kerja'),
                // 'mcu_bmi'                   => safe_post('mcu_bmi'),
                'mcu_persepsi_warna'        => safe_post('mcu_persepsi_warna'),
                'mcu_jauh_od'               => safe_post('mcu_jauh_od'),
                'mcu_jauh_os'               => safe_post('mcu_jauh_os'),
                'mcu_dekat_od'              => safe_post('mcu_dekat_od'),
                'mcu_dekat_os'              => safe_post('mcu_dekat_os'),
                'mcu_konjungtiva'           => safe_post('mcu_konjungtiva'),
                'mcu_sklera'                => safe_post('mcu_sklera'),
                'mcu_komea'                 => safe_post('mcu_komea'),
                'mcu_gdm'                   => safe_post('mcu_gdm'),
                'mcu_jantung'               => safe_post('mcu_jantung'),
                'mcu_status_kesehatan'      => safe_post('mcu_status_kesehatan'),
                'mcu_dokter'                => safe_post('mcu_dokter'),
                'mcu_tanggal_surat'         => safe_post('mcu_tanggal_surat') == '' ? null : date2mysql(safe_post('mcu_tanggal_surat')),

            );
            // var_dump($data);
            // die;
            $this->db->where('id_layanan_pendaftaran', safe_post('id_layanan_pendaftaran'));
            $this->db->update('sm_resume_medis', $data);
        }

        if ($this->db->trans_status() === false) :
            $this->db->trans_rollback();
            $status = false;
            $message = 'Gagal simpan Hasil Resume Medical Chek Up';
        else :
            $this->db->trans_commit();
            $status = true;
            $message = 'Berhasil simpan Hasil Resume Medical Chek Up';
        endif;

        $this->response(array('status' => $status, 'message' => $message), REST_Controller::HTTP_OK);
    }


















    // SKKJ1 RUBAH  
    function form_sk_kesehatan_jiwa_1_get(){  
        $this->load->model('pendaftaran/Pendaftaran_model', 'm_pendaftaran');  
        $data['pendaftaran_detail'] = [];
        $data['surat_keterangan_kesehatan_jiwa_1'] = [];   
        $data['pendaftaran_detail'] = $this->m_pendaftaran->getPendaftaranDetail($this->get('id', true), $this->get('id_layanan_pendaftaran', true));   
        $surat_skkj_1 = $this->m_mcu->getSKKJsatu($this->get('id_layanan_pendaftaran'));  
        if (!empty($surat_skkj_1)) {
            $data['surat_keterangan_kesehatan_jiwa_1'] = $surat_skkj_1;
        }   
        if ($data != null) {
            $this->response($data, REST_Controller::HTTP_OK);
        } else {
            $this->response($data, REST_Controller::HTTP_OK);
        }
    }
    
    function simpan_skkj_1_post(){
        $checkDataSKKJsatu = '';
        $checkDataSKKJsatu = $this->m_mcu->getSKKJsatu(safe_post('id_layanan_pendaftaran'));   
        $this->db->trans_begin();   
        if ($checkDataSKKJsatu->dokter_skkj_1 == NULL) {
            $data = array(
                'id_layanan_pendaftaran'        => safe_post('id_layanan_pendaftaran'),
                'valid_1'                       => safe_post('valid_1'),
                'valid_2'                       => safe_post('valid_2'),
                'nrptt_nip'                     => safe_post('nrptt_nip'),
                'no_surat_skkj_1'               => safe_post('no_surat_skkj_1'),
                'dokter_skkj_1'                 => safe_post('dokter_skkj_1'),
                'tanggal_skkj_1'                => safe_post('tanggal_skkj_1') == '' ? null : date2mysql(safe_post('tanggal_skkj_1')),
                'keterangan_skkj_1'                 => safe_post('keterangan_skkj_1'),
            );    
            // var_dump($data);die;
            $this->db->insert('sm_form_skkj_1', $data);
        } else {
            $data = array(
                // 'id_layanan_pendaftaran'    => safe_post('id_layanan_pendaftaran'),
                'valid_1'                     => safe_post('valid_1'),
                'valid_2'                     => safe_post('valid_2'),
                'nrptt_nip'                   => safe_post('nrptt_nip'),
                'no_surat_skkj_1'             => safe_post('no_surat_skkj_1'),
                'dokter_skkj_1'               => safe_post('dokter_skkj_1'),
                'tanggal_skkj_1'              => safe_post('tanggal_skkj_1') == '' ? null : date2mysql(safe_post('tanggal_skkj_1')),
                'keterangan_skkj_1'                 => safe_post('keterangan_skkj_1'),

            );
            // var_dump($data);die
            $this->db->where('id_layanan_pendaftaran', safe_post('id_layanan_pendaftaran'));
            $this->db->update('sm_form_skkj_1', $data);
        }
        if ($this->db->trans_status() === false) :
            $this->db->trans_rollback();
            $status = false;
            $message = 'Gagal simpan Hasil Surat Keterangan Kesehatan Jiwa';
        else :
            $this->db->trans_commit();
            $status = true;
            $message = 'Berhasil simpan Hasil Surat Keterangan Kesehatan Jiwa';
        endif;

        $this->response(array('status' => $status, 'message' => $message), REST_Controller::HTTP_OK);
    }

    // SKKJ2
    function form_sk_kesehatan_jiwa_2_get(){  
        $this->load->model('pendaftaran/Pendaftaran_model', 'm_pendaftaran');     
        $data['pendaftaran_detail'] = [];
        $data['surat_keterangan_kesehatan_jiwa_2'] = [];     
        $data['pendaftaran_detail'] = $this->m_pendaftaran->getPendaftaranDetail($this->get('id', true), $this->get('id_layanan_pendaftaran', true));     
        $surat_skkj_2 = $this->m_mcu->getSKKJdua($this->get('id_layanan_pendaftaran'));     
        if (!empty($surat_skkj_2)) {
            $data['surat_keterangan_kesehatan_jiwa_2'] = $surat_skkj_2;
        }      
        if ($data != null) {
            $this->response($data, REST_Controller::HTTP_OK);
        } else {
            $this->response($data, REST_Controller::HTTP_OK);
        }
    }
        
    function simpan_skkj_2_post(){
        $checkDataSKKJdua = '';
        $checkDataSKKJdua = $this->m_mcu->getSKKJdua(safe_post('id_layanan_pendaftaran'));     
        $this->db->trans_begin();    
        if ($checkDataSKKJdua->dokter_skkj_2 == NULL) {
            $data = array(
                'id_layanan_pendaftaran'      => safe_post('id_layanan_pendaftaran'),
                'valid_1'                     => safe_post('valid_1'),
                'valid_2'                     => safe_post('valid_2'),
                'nrptt_nip'                   => safe_post('nrptt_nip'),
                'no_surat_skkj_2'             => safe_post('no_surat_skkj_2'),
                'dokter_skkj_2'               => safe_post('dokter_skkj_2'),
                'tanggal_skkj_2'              => safe_post('tanggal_skkj_2') == '' ? null : date2mysql(safe_post('tanggal_skkj_2')),
                'keterangan_skkj_2'                 => safe_post('keterangan_skkj_2'),
            );     
            // var_dump($data);die;
            $this->db->insert('sm_form_skkj_2', $data);
        } else {
            $data = array(
                'valid_1'                     => safe_post('valid_1'),
                'valid_2'                     => safe_post('valid_2'),
                'nrptt_nip'                   => safe_post('nrptt_nip'),
                'no_surat_skkj_2'             => safe_post('no_surat_skkj_2'),
                'dokter_skkj_2'               => safe_post('dokter_skkj_2'),
                'tanggal_skkj_2'              => safe_post('tanggal_skkj_2') == '' ? null : date2mysql(safe_post('tanggal_skkj_2')),  
                'keterangan_skkj_2'                 => safe_post('keterangan_skkj_2'),  
            );
            // var_dump($data);die;
            $this->db->where('id_layanan_pendaftaran', safe_post('id_layanan_pendaftaran'));
            $this->db->update('sm_form_skkj_2', $data);
        }  
        if ($this->db->trans_status() === false) :
            $this->db->trans_rollback();
            $status = false;
            $message = 'Gagal simpan Hasil Surat Keterangan Kesehatan Jiwa';
        else :
            $this->db->trans_commit();
            $status = true;
            $message = 'Berhasil simpan Hasil Surat Keterangan Kesehatan Jiwa';
        endif;    
        $this->response(array('status' => $status, 'message' => $message), REST_Controller::HTTP_OK);
    }
        
    // SKKJ3
    function form_sk_kesehatan_jiwa_3_get(){  
        $this->load->model('pendaftaran/Pendaftaran_model', 'm_pendaftaran');     
        $data['pendaftaran_detail'] = [];
        $data['surat_keterangan_kesehatan_jiwa_3'] = [];     
        $data['pendaftaran_detail'] = $this->m_pendaftaran->getPendaftaranDetail($this->get('id', true), $this->get('id_layanan_pendaftaran', true));     
        $surat_skkj_3 = $this->m_mcu->getSKKJtiga($this->get('id_layanan_pendaftaran'));   
        if (!empty($surat_skkj_3)) {
            $data['surat_keterangan_kesehatan_jiwa_3'] = $surat_skkj_3;
        }   
        if ($data != null) {
            $this->response($data, REST_Controller::HTTP_OK);
        } else {
            $this->response($data, REST_Controller::HTTP_OK);
        }
    }
        
    function simpan_skkj_3_post(){
        $checkDataSKKJtiga = '';
        $checkDataSKKJtiga = $this->m_mcu->getSKKJtiga(safe_post('id_layanan_pendaftaran'));     
        $this->db->trans_begin();    
        if ($checkDataSKKJtiga->dokter_skkj_3 == NULL) {
            $data = array(
                'id_layanan_pendaftaran'      => safe_post('id_layanan_pendaftaran'),
                'valid_1'                     => safe_post('valid_1'),
                'valid_2'                     => safe_post('valid_2'),
                'nrptt_nip'                   => safe_post('nrptt_nip'),
                'no_surat_skkj_3'             => safe_post('no_surat_skkj_3'),
                'dokter_skkj_3'               => safe_post('dokter_skkj_3'),
                'tanggal_skkj_3'              => safe_post('tanggal_skkj_3') == '' ? null : date2mysql(safe_post('tanggal_skkj_3')),
                'keterangan_skkj_3'                 => safe_post('keterangan_skkj_3'),

            );     
            // var_dump($data);die;
            $this->db->insert('sm_form_skkj_3', $data);
        } else {
            $data = array(
                'valid_1'                     => safe_post('valid_1'),
                'valid_2'                     => safe_post('valid_2'),
                'nrptt_nip'                   => safe_post('nrptt_nip'),
                'no_surat_skkj_3'             => safe_post('no_surat_skkj_3'),
                'dokter_skkj_3'               => safe_post('dokter_skkj_3'),
                'tanggal_skkj_3'              => safe_post('tanggal_skkj_3') == '' ? null : date2mysql(safe_post('tanggal_skkj_3')),   
                'keterangan_skkj_3'                 => safe_post('keterangan_skkj_3'),

            );
            // var_dump($data);die;
            $this->db->where('id_layanan_pendaftaran', safe_post('id_layanan_pendaftaran'));
            $this->db->update('sm_form_skkj_3', $data);
        }

        if ($this->db->trans_status() === false) :
            $this->db->trans_rollback();
            $status = false;
            $message = 'Gagal simpan Hasil Surat Keterangan Kesehatan Jiwa';
        else :
            $this->db->trans_commit();
            $status = true;
            $message = 'Berhasil simpan Hasil Surat Keterangan Kesehatan Jiwa';
        endif;    
        $this->response(array('status' => $status, 'message' => $message), REST_Controller::HTTP_OK);
    }

    // SKB 
    function get_kelaikan_bekerja_get() {  
        $this->load->model('pendaftaran/Pendaftaran_model', 'm_pendaftaran');  
        $id = $this->get('id', true);
        $id_layanan_pendaftaran = $this->get('id_layanan_pendaftaran', true);  
        $data = [
            'pendaftaran_detail' => $this->m_pendaftaran->getPendaftaranDetail($id, $id_layanan_pendaftaran),
            'kelalaian_bekerja' => $this->m_mcu->getKelaikanBekerja($id_layanan_pendaftaran) ?: []
        ]; 
        $this->response($data, REST_Controller::HTTP_OK);
    }

    // SKB 
    function simpan_kelalaian_bekerja_post() {
        $idLayananPendaftaran = safe_post('id_layanan_pendaftaran');
        $checkDataKb = $this->m_mcu->getKelaikanBekerja($idLayananPendaftaran);       
        $this->db->trans_begin();      
        $data = array(
            'id_layanan_pendaftaran'    => $idLayananPendaftaran,
            'id_user'                   => $this->session->userdata('id_translucent'),
            'id_pendaftaran'            => safe_post('id_pendaftaran'),
            'kb_nomor_1'                => safe_post('kb_nomor_1') !== '' ? safe_post('kb_nomor_1') : NULL,
            'kb_nomor_2'                => safe_post('kb_nomor_2') !== '' ? safe_post('kb_nomor_2') : NULL,
            'kb_permintaan_dari'        => safe_post('kb_permintaan_dari') !== '' ? safe_post('kb_permintaan_dari') : NULL,
            'kb_permintaan_nomor'       => safe_post('kb_permintaan_nomor') !== '' ? safe_post('kb_permintaan_nomor') : NULL,
            'kb_permintaan_tanggal'     => safe_post('kb_permintaan_tanggal') !== '' ? date2mysql(safe_post('kb_permintaan_tanggal')) : NULL,
            'kb_keterangan'             => safe_post('kb_keterangan') !== '' ? safe_post('kb_keterangan') : NULL,
            'kb_tanggal'                => safe_post('kb_tanggal') !== '' ? date2mysql(safe_post('kb_tanggal')) : NULL,
            'dokter_sepesialis_skb'             => safe_post('dokter_sepesialis_skb') !== '' ? safe_post('dokter_sepesialis_skb') : NULL,
            'updated_on'                => date('Y-m-d H:i:s')
        );  
        // if ($checkDataKb->id_user == NULL) {
        if ($checkDataKb->id_user == NULL) {
            $data['created_at'] = date('Y-m-d H:i:s');
            $this->db->insert('sm_mcu_16_00', $data);
        } else {
            $this->db->where('id_layanan_pendaftaran', $idLayananPendaftaran);
            $this->db->update('sm_mcu_16_00', $data);
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

    // lpk
    public function simpan_lpk_post()
    {
        $this->db->trans_begin();
        $layanan = array('id' => safe_post('id_layanan_pendaftaran'));
        $pendaftaran = array('id' => safe_post('id_pendaftaran'));
        $lpk_id = safe_post('lpk_id');

        // LAPORAN TINDAKAN
        if ($lpk_id !== '') {
        $data_lpk = array(
            'id_layanan_pendaftaran'    => $layanan['id'],
            'id_pendaftaran'            => $pendaftaran['id'],
            'id_users'				    => $this->session->userdata('id_translucent'),
            'lpk_dokter'                => safe_post('lpk_dokter') !== '' ? safe_post('lpk_dokter') : NULL,

            'lpk_dirawat'               => safe_post('lpk_dirawat') !== '' ? safe_post('lpk_dirawat') : NULL,
            'lpk_dirawat_ket'           => safe_post('lpk_dirawat_ket') !== '' ? safe_post('lpk_dirawat_ket') : NULL,
            'lpk_kecelakaan'            => safe_post('lpk_kecelakaan') !== '' ? safe_post('lpk_kecelakaan') : NULL,
            'lpk_kecelakaan_ket'        => safe_post('lpk_kecelakaan_ket') !== '' ? safe_post('lpk_kecelakaan_ket') : NULL,
            'lpk_batuk'                 => safe_post('lpk_batuk') !== '' ? safe_post('lpk_batuk') : NULL,
            'lpk_batuk_ket'             => safe_post('lpk_batuk_ket') !== '' ? safe_post('lpk_batuk_ket') : NULL,
            'lpk_dada'                  => safe_post('lpk_dada') !== '' ? safe_post('lpk_dada') : NULL,
            'lpk_dada_ket'              => safe_post('lpk_dada_ket') !== '' ? safe_post('lpk_dada_ket') : NULL,
            'lpk_kuning'                => safe_post('lpk_kuning') !== '' ? safe_post('lpk_kuning') : NULL,
            'lpk_kuning_ket'            => safe_post('lpk_kuning_ket') !== '' ? safe_post('lpk_kuning_ket') : NULL,
            'lpk_pingsan'               => safe_post('lpk_pingsan') !== '' ? safe_post('lpk_pingsan') : NULL,
            'lpk_pingsan_ket'           => safe_post('lpk_pingsan_ket') !== '' ? safe_post('lpk_pingsan_ket') : NULL,
            'lpk_kejang'                => safe_post('lpk_kejang') !== '' ? safe_post('lpk_kejang') : NULL,
            'lpk_kejang_ket'            => safe_post('lpk_kejang_ket') !== '' ? safe_post('lpk_kejang_ket') : NULL,
            'lpk_muntah'                => safe_post('lpk_muntah') !== '' ? safe_post('lpk_muntah') : NULL,
            'lpk_muntah_ket'            => safe_post('lpk_muntah_ket') !== '' ? safe_post('lpk_muntah_ket') : NULL,
            'lpk_hati'                  => safe_post('lpk_hati') !== '' ? safe_post('lpk_hati') : NULL,
            'lpk_hati_ket'              => safe_post('lpk_hati_ket') !== '' ? safe_post('lpk_hati_ket') : NULL,
            'lpk_batu'                  => safe_post('lpk_batu') !== '' ? safe_post('lpk_batu') : NULL,
            'lpk_batu_ket'              => safe_post('lpk_batu_ket') !== '' ? safe_post('lpk_batu_ket') : NULL,
            'lpk_nanah'                 => safe_post('lpk_nanah') !== '' ? safe_post('lpk_nanah') : NULL,
            'lpk_nanah_ket'             => safe_post('lpk_nanah_ket') !== '' ? safe_post('lpk_nanah_ket') : NULL,
            'lpk_ambien'                => safe_post('lpk_ambien') !== '' ? safe_post('lpk_ambien') : NULL,
            'lpk_ambien_ket'            => safe_post('lpk_ambien_ket') !== '' ? safe_post('lpk_ambien_ket') : NULL,
            'lpk_buang'                 => safe_post('lpk_buang') !== '' ? safe_post('lpk_buang') : NULL,
            'lpk_buang_ket'             => safe_post('lpk_buang_ket') !== '' ? safe_post('lpk_buang_ket') : NULL,
            'lpk_narkotik'              => safe_post('lpk_narkotik') !== '' ? safe_post('lpk_narkotik') : NULL,
            'lpk_narkotik_ket'          => safe_post('lpk_narkotik_ket') !== '' ? safe_post('lpk_narkotik_ket') : NULL,
            'lpk_darah'                 => safe_post('lpk_darah') !== '' ? safe_post('lpk_darah') : NULL,
            'lpk_darah_ket'             => safe_post('lpk_darah_ket') !== '' ? safe_post('lpk_darah_ket') : NULL,
            'lpk_jantung'               => safe_post('lpk_jantung') !== '' ? safe_post('lpk_jantung') : NULL,
            'lpk_jantung_ket'           => safe_post('lpk_jantung_ket') !== '' ? safe_post('lpk_jantung_ket') : NULL,
            'lpk_asma'                  => safe_post('lpk_asma') !== '' ? safe_post('lpk_asma') : NULL,
            'lpk_asma_ket'              => safe_post('lpk_asma_ket') !== '' ? safe_post('lpk_asma_ket') : NULL,
            'lpk_malaria'               => safe_post('lpk_malaria') !== '' ? safe_post('lpk_malaria') : NULL,
            'lpk_malaria_ket'           => safe_post('lpk_malaria_ket') !== '' ? safe_post('lpk_malaria_ket') : NULL,
            'lpk_jiwa'                  => safe_post('lpk_jiwa') !== '' ? safe_post('lpk_jiwa') : NULL,
            'lpk_jiwa_ket'              => safe_post('lpk_jiwa_ket') !== '' ? safe_post('lpk_jiwa_ket') : NULL,
            'lpk_manis'                 => safe_post('lpk_manis') !== '' ? safe_post('lpk_manis') : NULL,
            'lpk_manis_ket'             => safe_post('lpk_manis_ket') !== '' ? safe_post('lpk_manis_ket') : NULL,
            'lpk_hipertensi'            => safe_post('lpk_hipertensi') !== '' ? safe_post('lpk_hipertensi') : NULL,
            'lpk_hipertensi_ket'        => safe_post('lpk_hipertensi_ket') !== '' ? safe_post('lpk_hipertensi_ket') : NULL,
            'lpk_penyakit'              => safe_post('lpk_penyakit') !== '' ? safe_post('lpk_penyakit') : NULL,
            'lpk_penyakit_ket'          => safe_post('lpk_penyakit_ket') !== '' ? safe_post('lpk_penyakit_ket') : NULL,
            'lpk_stroke'                => safe_post('lpk_stroke') !== '' ? safe_post('lpk_stroke') : NULL,
            'lpk_stroke_ket'            => safe_post('lpk_stroke_ket') !== '' ? safe_post('lpk_stroke_ket') : NULL,
            'lpk_cacat'                 => safe_post('lpk_cacat') !== '' ? safe_post('lpk_cacat') : NULL,
            'lpk_cacat_ket'             => safe_post('lpk_cacat_ket') !== '' ? safe_post('lpk_cacat_ket') : NULL,
            'lpk_tanggal'               => safe_post('lpk_tanggal') !== '' ? date2mysql(safe_post('lpk_tanggal')) : NULL,
            'created_date'			    => $this->datetime

        );
        // var_dump('update');
        // var_dump($data_lpk);die;
        $this->db->where('id', $lpk_id);
        $this->db->update('sm_mcu_18_00', $data_lpk);
        } else {
        $data_lpk = array(
            'id_layanan_pendaftaran'    => $layanan['id'],
            'id_pendaftaran'            => $pendaftaran['id'],
            'id_users'				    => $this->session->userdata('id_translucent'),
            'lpk_dokter'                => safe_post('lpk_dokter') !== '' ? safe_post('lpk_dokter') : NULL,

            'lpk_dirawat'               => safe_post('lpk_dirawat') !== '' ? safe_post('lpk_dirawat') : NULL,
            'lpk_dirawat_ket'           => safe_post('lpk_dirawat_ket') !== '' ? safe_post('lpk_dirawat_ket') : NULL,
            'lpk_kecelakaan'            => safe_post('lpk_kecelakaan') !== '' ? safe_post('lpk_kecelakaan') : NULL,
            'lpk_kecelakaan_ket'        => safe_post('lpk_kecelakaan_ket') !== '' ? safe_post('lpk_kecelakaan_ket') : NULL,
            'lpk_batuk'                 => safe_post('lpk_batuk') !== '' ? safe_post('lpk_batuk') : NULL,
            'lpk_batuk_ket'             => safe_post('lpk_batuk_ket') !== '' ? safe_post('lpk_batuk_ket') : NULL,
            'lpk_dada'                  => safe_post('lpk_dada') !== '' ? safe_post('lpk_dada') : NULL,
            'lpk_dada_ket'              => safe_post('lpk_dada_ket') !== '' ? safe_post('lpk_dada_ket') : NULL,
            'lpk_kuning'                => safe_post('lpk_kuning') !== '' ? safe_post('lpk_kuning') : NULL,
            'lpk_kuning_ket'            => safe_post('lpk_kuning_ket') !== '' ? safe_post('lpk_kuning_ket') : NULL,
            'lpk_pingsan'               => safe_post('lpk_pingsan') !== '' ? safe_post('lpk_pingsan') : NULL,
            'lpk_pingsan_ket'           => safe_post('lpk_pingsan_ket') !== '' ? safe_post('lpk_pingsan_ket') : NULL,
            'lpk_kejang'                => safe_post('lpk_kejang') !== '' ? safe_post('lpk_kejang') : NULL,
            'lpk_kejang_ket'            => safe_post('lpk_kejang_ket') !== '' ? safe_post('lpk_kejang_ket') : NULL,
            'lpk_muntah'                => safe_post('lpk_muntah') !== '' ? safe_post('lpk_muntah') : NULL,
            'lpk_muntah_ket'            => safe_post('lpk_muntah_ket') !== '' ? safe_post('lpk_muntah_ket') : NULL,
            'lpk_hati'                  => safe_post('lpk_hati') !== '' ? safe_post('lpk_hati') : NULL,
            'lpk_hati_ket'              => safe_post('lpk_hati_ket') !== '' ? safe_post('lpk_hati_ket') : NULL,
            'lpk_batu'                  => safe_post('lpk_batu') !== '' ? safe_post('lpk_batu') : NULL,
            'lpk_batu_ket'              => safe_post('lpk_batu_ket') !== '' ? safe_post('lpk_batu_ket') : NULL,
            'lpk_nanah'                 => safe_post('lpk_nanah') !== '' ? safe_post('lpk_nanah') : NULL,
            'lpk_nanah_ket'             => safe_post('lpk_nanah_ket') !== '' ? safe_post('lpk_nanah_ket') : NULL,
            'lpk_ambien'                => safe_post('lpk_ambien') !== '' ? safe_post('lpk_ambien') : NULL,
            'lpk_ambien_ket'            => safe_post('lpk_ambien_ket') !== '' ? safe_post('lpk_ambien_ket') : NULL,
            'lpk_buang'                 => safe_post('lpk_buang') !== '' ? safe_post('lpk_buang') : NULL,
            'lpk_buang_ket'             => safe_post('lpk_buang_ket') !== '' ? safe_post('lpk_buang_ket') : NULL,
            'lpk_narkotik'              => safe_post('lpk_narkotik') !== '' ? safe_post('lpk_narkotik') : NULL,
            'lpk_narkotik_ket'          => safe_post('lpk_narkotik_ket') !== '' ? safe_post('lpk_narkotik_ket') : NULL,
            'lpk_darah'                 => safe_post('lpk_darah') !== '' ? safe_post('lpk_darah') : NULL,
            'lpk_darah_ket'             => safe_post('lpk_darah_ket') !== '' ? safe_post('lpk_darah_ket') : NULL,
            'lpk_jantung'               => safe_post('lpk_jantung') !== '' ? safe_post('lpk_jantung') : NULL,
            'lpk_jantung_ket'           => safe_post('lpk_jantung_ket') !== '' ? safe_post('lpk_jantung_ket') : NULL,
            'lpk_asma'                  => safe_post('lpk_asma') !== '' ? safe_post('lpk_asma') : NULL,
            'lpk_asma_ket'              => safe_post('lpk_asma_ket') !== '' ? safe_post('lpk_asma_ket') : NULL,
            'lpk_malaria'               => safe_post('lpk_malaria') !== '' ? safe_post('lpk_malaria') : NULL,
            'lpk_malaria_ket'           => safe_post('lpk_malaria_ket') !== '' ? safe_post('lpk_malaria_ket') : NULL,
            'lpk_jiwa'                  => safe_post('lpk_jiwa') !== '' ? safe_post('lpk_jiwa') : NULL,
            'lpk_jiwa_ket'              => safe_post('lpk_jiwa_ket') !== '' ? safe_post('lpk_jiwa_ket') : NULL,
            'lpk_manis'                 => safe_post('lpk_manis') !== '' ? safe_post('lpk_manis') : NULL,
            'lpk_manis_ket'             => safe_post('lpk_manis_ket') !== '' ? safe_post('lpk_manis_ket') : NULL,
            'lpk_hipertensi'            => safe_post('lpk_hipertensi') !== '' ? safe_post('lpk_hipertensi') : NULL,
            'lpk_hipertensi_ket'        => safe_post('lpk_hipertensi_ket') !== '' ? safe_post('lpk_hipertensi_ket') : NULL,
            'lpk_penyakit'              => safe_post('lpk_penyakit') !== '' ? safe_post('lpk_penyakit') : NULL,
            'lpk_penyakit_ket'          => safe_post('lpk_penyakit_ket') !== '' ? safe_post('lpk_penyakit_ket') : NULL,
            'lpk_stroke'                => safe_post('lpk_stroke') !== '' ? safe_post('lpk_stroke') : NULL,
            'lpk_stroke_ket'            => safe_post('lpk_stroke_ket') !== '' ? safe_post('lpk_stroke_ket') : NULL,
            'lpk_cacat'                 => safe_post('lpk_cacat') !== '' ? safe_post('lpk_cacat') : NULL,
            'lpk_cacat_ket'             => safe_post('lpk_cacat_ket') !== '' ? safe_post('lpk_cacat_ket') : NULL,
            'lpk_tanggal'               => safe_post('lpk_tanggal') !== '' ? date2mysql(safe_post('lpk_tanggal')) : NULL,
            'created_date'			    => $this->datetime

        );
        // var_dump('simpan');
        // var_dump($data_lpk);die;
        $this->db->insert('sm_mcu_18_00', $data_lpk);
        }

        // END FUNTION
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
        'token' => $this->security->get_csrf_hash(),
        'id' => $layanan['id'],
        'respon' => $response,
        );

        $this->response($message, REST_Controller::HTTP_OK);
    }

    // SKM narik data
    function get_surat_keterangan_medis_get() {  
        $this->load->model('pendaftaran/Pendaftaran_model', 'm_pendaftaran');  
        $id = $this->get('id', true);
        $id_layanan_pendaftaran = $this->get('id_layanan_pendaftaran', true);  
        $data = [
            'pendaftaran_detail' => $this->m_pendaftaran->getPendaftaranDetail($id, $id_layanan_pendaftaran),
            'anamnesa' => $this->m_pelayanan->getAnamnesa($id_layanan_pendaftaran),
            'diagnosa' => $this->m_pelayanan->getDiagnosaPemeriksaan($id_layanan_pendaftaran),
            'surat_keterangan_medis' => $this->m_mcu->getSKM($id_layanan_pendaftaran) ?: []
        ]; 
        $this->response($data, REST_Controller::HTTP_OK);
    }

    // SKM 
    function simpan_skm_post() {
        $idLayananPendaftaran = safe_post('id_layanan_pendaftaran');
        $checkDataSKM = $this->m_mcu->getSKM($idLayananPendaftaran);       
        $this->db->trans_begin();      
        $data = array(
            'id_layanan_pendaftaran'    => $idLayananPendaftaran,
            'id_pendaftaran'            => safe_post('id_pendaftaran'),
            'nomor_skm_1'               => safe_post('nomor_skm_1'),
            'nomor_skm_2'               => safe_post('nomor_skm_2'),
            'no_porsi'                  => safe_post('no_porsi'),
            'menyatakan'                => safe_post('menyatakan'),
            'tanggal_skm'               => safe_post('tanggal_skm') == '' ? null : date2mysql(safe_post('tanggal_skm')),
            'dokter_skm'                => safe_post('dokter_skm'),
            'updated_on'                => date('Y-m-d H:i:s')
        );  
        if ($checkDataSKM->dokter_skm == NULL) {
            $data['created_at'] = date('Y-m-d H:i:s');
            $this->db->insert('sm_form_skm', $data);
        } else {
            $this->db->where('id_layanan_pendaftaran', $idLayananPendaftaran);
            $this->db->update('sm_form_skm', $data);
        }
    
        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            $status = false;
            $message = 'Gagal simpan Hasil Surat Keterangan Medis';
        } else {
            $this->db->trans_commit();
            $status = true;
            $message = 'Berhasil simpan Hasil Surat Keterangan Medis';
        }   
        $this->response(array('status' => $status, 'message' => $message), REST_Controller::HTTP_OK);
    }

    // SKD 
    function get_surat_keterangan_disabilitas_get() {  
        $this->load->model('pendaftaran/Pendaftaran_model', 'm_pendaftaran');  
        $id = $this->get('id', true);
        $id_layanan_pendaftaran = $this->get('id_layanan_pendaftaran', true);  
        $data = [
            'pendaftaran_detail' => $this->m_pendaftaran->getPendaftaranDetail($id, $id_layanan_pendaftaran),
            'surat_keterangan_disabilitas' => $this->m_mcu->getSuratKeteranganDisabilitas($id_layanan_pendaftaran) ?: []
        ]; 
        $this->response($data, REST_Controller::HTTP_OK);
    }
    
    // SKD 
    function simpan_surat_keterangan_disabilitas_post() {
        $idLayananPendaftaran = safe_post('id_layanan_pendaftaran');
        $checkDataSKD = $this->m_mcu->getSuratKeteranganDisabilitas($idLayananPendaftaran);       
        $this->db->trans_begin();      
        $data = array(
            'id_layanan_pendaftaran'    => $idLayananPendaftaran,
            'id_user'                   => $this->session->userdata('id_translucent'),
            'id_pendaftaran'            => safe_post('id_pendaftaran'),
            'nomorskd'                  => safe_post('nomorskd'),
            'lokasiskd'            => safe_post('lokasiskd'),
            'adadisabilitas'            => safe_post('adadisabilitas'),
            'adadisabilitasq'            => safe_post('adadisabilitasq'),
            'susunanskd'                => safe_post('susunanskd'),
            'organskd'                  => safe_post('organskd'),
            'ektremitasataskanan'       => safe_post('ektremitasataskanan'),
            'extremitasataskiri'        => safe_post('extremitasataskiri'),
            'extremitasataskeduanya'    => safe_post('extremitasataskeduanya'),
            'dominankanan'              => safe_post('dominankanan'),
            'dominankiri'               => safe_post('dominankiri'),
            'ektremitasbawahkanan'      => safe_post('ektremitasbawahkanan'),
            'extremitasbawahkiri'       => safe_post('extremitasbawahkiri'),
            'extremitasbawahkeduanya'   => safe_post('extremitasbawahkeduanya'),
            'lainskd'                   => safe_post('lainskd'),
            'sejakskd'                  => safe_post('sejakskd'),
            'kecelakaanskd'             => safe_post('kecelakaanskd'),
            'kecelaskd'                 => safe_post('kecelaskd'),
            'strokeskd'                 => safe_post('strokeskd'),
            'kustaskd'                  => safe_post('kustaskd'),
            'laenskd'                   => safe_post('laenskd'),
            'ptskd'                     => safe_post('ptskd'),
            'skdpt'                     => safe_post('skdpt'),
            'sesudahskd'                => safe_post('sesudahskd'),
            'thskd'                     => safe_post('thskd'),
            'kemampuanskd'              => safe_post('kemampuanskd'),
            'tmskd'                     => safe_post('tmskd'),
            'besarbisaskd'              => safe_post('besarbisaskd'),
            'jelasskd'                  => safe_post('jelasskd'),
            'perluskd'                  => safe_post('perluskd'),
            'bsaskb'                    => safe_post('bsaskb'),
            'anggotaskd'                => safe_post('anggotaskd'),
            'atanganskd'                => safe_post('atanganskd'),
            'akakiskd'                  => safe_post('akakiskd'),
            'tangankakiskd'             => safe_post('tangankakiskd'),
            'akelemahanskd'             => safe_post('akelemahanskd'),
            'aparaplegiskd'             => safe_post('aparaplegiskd'),
            'acelebral'                 => safe_post('acelebral'),
            'anetralskd'                => safe_post('anetralskd'),
            'bnetralskd'                => safe_post('bnetralskd'),
            'brunguskd'                 => safe_post('brunguskd'),
            'bwicaraskd'                => safe_post('bwicaraskd'),
            'cgrahitaskd'               => safe_post('cgrahitaskd'),
            'csyndromskd'               => safe_post('csyndromskd'),
            'dmentallskd'               => safe_post('dmentallskd'),
            'dperkembanganskd'          => safe_post('dperkembanganskd'),
            'derajatskd1'               => safe_post('derajatskd1'),
            'derajatskd2'               => safe_post('derajatskd2'),
            'derajatskd3'               => safe_post('derajatskd3'),
            'derajatskd4'               => safe_post('derajatskd4'),
            'derajatskd5'               => safe_post('derajatskd5'),
            'derajatskd6'               => safe_post('derajatskd6'),
            'amjalanskd'                => safe_post('amjalanskd'),
            'amperlahanskd'             => safe_post('amperlahanskd'),
            'amalatskd'                 => safe_post('amalatskd'),
            'ammampuskd'                => safe_post('ammampuskd'),
            'bnaikskd'                  => safe_post('bnaikskd'),
            'btanggaskd'                => safe_post('btanggaskd'),
            'bnaeikskd'                 => safe_post('bnaeikskd'),
            'aextrimskd1'               => safe_post('aextrimskd1'),
            'aextrimskd2'               => safe_post('aextrimskd2'),
            'aextrimskd3'               => safe_post('aextrimskd3'),
            'aextrimskd4'               => safe_post('aextrimskd4'),
            'aextrimskd5'               => safe_post('aextrimskd5'),
            'aextrimskd6'               => safe_post('aextrimskd6'),
            'aextrimskd7'               => safe_post('aextrimskd7'),
            'aextrimskd8'               => safe_post('aextrimskd8'),
            'bextrimskd1'               => safe_post('bextrimskd1'),
            'bextrimskd2'               => safe_post('bextrimskd2'),
            'bextrimskd3'               => safe_post('bextrimskd3'),
            'bextrimskd4'               => safe_post('bextrimskd4'),
            'bextrimskd5'               => safe_post('bextrimskd5'),
            'bextrimskd6'               => safe_post('bextrimskd6'),
            'bextrimskd7'               => safe_post('bextrimskd7'),
            'bextrimskd8'               => safe_post('bextrimskd8'),
            'gunakanskd'                => safe_post('gunakanskd'),
            'skdada'                    => safe_post('skdada'),
            'skdsebutkan'               => safe_post('skdsebutkan'),
            'tidakkakd'                 => safe_post('tidakkakd'),
            'adaaskd'                   => safe_post('adaaskd'),
            'sebuttkannskd'             => safe_post('sebuttkannskd'),
            'tidakpskd'                 => safe_post('tidakpskd'),
            'adapskd'                   => safe_post('adapskd'),
            'sebutkanpskd'              => safe_post('sebutkanpskd'),
            // 'catatan_tambahan_skd'      => (safe_post('catatan_tambahan_skd') !== '' ? safe_post('catatan_tambahan_skd') : NULL),
            'tanggalskd'                => safe_post('tanggalskd') == '' ? null : date2mysql(safe_post('tanggalskd')),
            'dokterskd'                 => safe_post('dokterskd'),
            'nip_sip_skd'               => (safe_post('nip_sip_skd') !== '' ? safe_post('nip_sip_skd') : NULL),
            'updated_on'                => date('Y-m-d H:i:s')
        );  
        if ($checkDataSKD->id_user == NULL) {
            $data['created_at'] = date('Y-m-d H:i:s');
            $this->db->insert('sm_surat_keterangan_disabilitas', $data);
        } else {
            $this->db->where('id_layanan_pendaftaran', $idLayananPendaftaran);
            $this->db->update('sm_surat_keterangan_disabilitas', $data);
        }
    
        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            $status = false;
            $message = 'Gagal simpan Hasil Surat Keterangan Disabilitas';
        } else {
            $this->db->trans_commit();
            $status = true;
            $message = 'Berhasil simpan Hasil Surat Keterangan Disabilitas';
        }   
        $this->response(array('status' => $status, 'message' => $message), REST_Controller::HTTP_OK);
    }
    
    // SKTD 
    function get_surat_keterangan_tidak_disabilitas_get() {  
        $this->load->model('pendaftaran/Pendaftaran_model', 'm_pendaftaran');  
        $id = $this->get('id', true);
        $id_layanan_pendaftaran = $this->get('id_layanan_pendaftaran', true);  
        $data = [
            'pendaftaran_detail' => $this->m_pendaftaran->getPendaftaranDetail($id, $id_layanan_pendaftaran),
            'surat_keterangan_tidak_disabilitas' => $this->m_mcu->getSuratKeteranganTidakDisabilitas($id_layanan_pendaftaran) ?: []
        ]; 
        $this->response($data, REST_Controller::HTTP_OK);
    }
    
    // SKTD 
    function simpan_surat_keterangan_tidak_disabilitas_post() {
        $idLayananPendaftaran = safe_post('id_layanan_pendaftaran');
        $checkDataSKTD = $this->m_mcu->getSuratKeteranganTidakDisabilitas($idLayananPendaftaran);       
        $this->db->trans_begin();      
        $data = array(
            'id_layanan_pendaftaran'    => $idLayananPendaftaran,
            'id_user'                   => $this->session->userdata('id_translucent'),
            'id_pendaftaran'            => safe_post('id_pendaftaran'),
            'nomorsktd'                 => safe_post('nomorsktd'),
            'tanggalsktd'               => safe_post('tanggalsktd') == '' ? null : date2mysql(safe_post('tanggalsktd')),
            'doktersktd'                => safe_post('doktersktd'),
            'nip_sip_sktd'               => (safe_post('nip_sip_sktd') !== '' ? safe_post('nip_sip_sktd') : NULL),
            'updated_on'                => date('Y-m-d H:i:s')
        );  
        if ($checkDataSKTD->id_user == NULL) {
            $data['created_at'] = date('Y-m-d H:i:s');
            $this->db->insert('sm_surat_keterangan_tidak_disabilitas', $data);
        } else {
            $this->db->where('id_layanan_pendaftaran', $idLayananPendaftaran);
            $this->db->update('sm_surat_keterangan_tidak_disabilitas', $data);
        }
    
        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            $status = false;
            $message = 'Gagal simpan Hasil Surat Keterangan Tidak Disabilitas';
        } else {
            $this->db->trans_commit();
            $status = true;
            $message = 'Berhasil simpan Hasil Surat Keterangan Tidak Disabilitas';
        }   
        $this->response(array('status' => $status, 'message' => $message), REST_Controller::HTTP_OK);
    }

    // // HPDO BANGET
    // function get_hasil_pemeriksaan_dokter_okupasi_get() {  
    //     $this->load->model('pendaftaran/Pendaftaran_model', 'm_pendaftaran');  
    //     $id = $this->get('id', true);
    //     $id_layanan_pendaftaran = $this->get('id_layanan_pendaftaran', true);  
    //     $data = [
    //         'pendaftaran_detail' => $this->m_pendaftaran->getPendaftaranDetail($id, $id_layanan_pendaftaran),
    //         'hasil_pemeriksaan_dokter_okupasi' => $this->m_mcu->getHasilPemeriksaanDokterOkupasi($id_layanan_pendaftaran),
    //         'questionnaire_mcu_okupasi'        => $this->m_hasil_mcu->getDataQuisionerMCU($id_layanan_pendaftaran)     
    //     ]; 
    //     $this->response($data, REST_Controller::HTTP_OK);
    // }

    // // HPDO BARU BANGET
    // function simpan_hasil_pemeriksaan_dokter_okupasi_post() {
    //     $idLayananPendaftaran = safe_post('id_layanan_pendaftaran');
    //     $checkDataHPDO = $this->m_mcu->getHasilPemeriksaanDokterOkupasi($idLayananPendaftaran);
    //     $this->db->trans_begin();      
    //     $data = array(
    //         'id_layanan_pendaftaran'    => $idLayananPendaftaran,
    //         'id_user'                   => $this->session->userdata('id_translucent'),
    //         'id_pendaftaran'            => safe_post('id_pendaftaran'),
    //         'pekerjaany_hpdo'           => safe_post('pekerjaany_hpdo'),
    //         'uraian_hpdo'               => safe_post('uraian_hpdo'),
    //         'masakerja_hpdo'            => safe_post('masakerja_hpdo'),
    //         'keterangan_hpdo'           => safe_post('keterangan_hpdo'),
    //         'keluhan_hpdo'              => safe_post('keluhan_hpdo'),
    //         'bising_hpdo'               => safe_post('bising_hpdo'),
    //         'ketinggian_hpdo'           => safe_post('ketinggian_hpdo'),
    //         'gtubuh_hpdo'               => safe_post('gtubuh_hpdo'),
    //         'gtangan_hpdo'              => safe_post('gtangan_hpdo'),
    //         'suhu_hpdo'                 => safe_post('suhu_hpdo'),
    //         'radiasi_hpdo'              => safe_post('radiasi_hpdo'),
    //         'lain_hpdo'                 => safe_post('lain_hpdo'),
    //         'debu_hpdo'                 => safe_post('debu_hpdo'),
    //         'zatkimia_hpdo'             => safe_post('zatkimia_hpdo'),
    //         'pestisida_hpdo'            => safe_post('pestisida_hpdo'),
    //         'asap_hpdo'                 => safe_post('asap_hpdo'),
    //         'lainn_hpdo'                => safe_post('lainn_hpdo'),
    //         'bakteri_hpdo'              => safe_post('bakteri_hpdo'),
    //         'virus_hpdo'                => safe_post('virus_hpdo'),
    //         'parasit_hpdo'              => safe_post('parasit_hpdo'),
    //         'jamur_hpdo'                => safe_post('jamur_hpdo'),
    //         'lainnya_hpdo'              => safe_post('lainnya_hpdo'),
    //         'gberulang_hpdo'            => safe_post('gberulang_hpdo'),
    //         'angkat_hpdo'               => safe_post('angkat_hpdo'),
    //         'berdiri_hpdo'              => safe_post('berdiri_hpdo'),
    //         'duduk_hpdo'                => safe_post('duduk_hpdo'),
    //         'posisi_hpdo'               => safe_post('posisi_hpdo'),
    //         'pencahayaan_hpdo'          => safe_post('pencahayaan_hpdo'),
    //         'bekerja_hpdo'              => safe_post('bekerja_hpdo'),
    //         'laint_hpdo'                => safe_post('laint_hpdo'),
    //         'bebankerja_hpdo'           => safe_post('bebankerja_hpdo'),
    //         'kerjagilir_hpdo'           => safe_post('kerjagilir_hpdo'),
    //         'ketidakjelasan_hpdo'       => safe_post('ketidakjelasan_hpdo'),
    //         'pekerjaan_monoton_hpdo'    => safe_post('pekerjaan_monoton_hpdo'),
    //         'konflik_kerja_hpdo'        => safe_post('konflik_kerja_hpdo'),
    //         'tuntutan_hpdo'             => safe_post('tuntutan_hpdo'),
    //         // 'gejala_hpdo'               => safe_post('gejala_hpdo'),
    //         'ketaksaan'                 => safe_post('ketaksaan'),
    //         'konflikk'                  => safe_post('konflikk'),
    //         'kuantitatif'               => safe_post('kuantitatif'),
    //         'kualitatif'                => safe_post('kualitatif'),
    //         'pengembang'                => safe_post('pengembang'),
    //         'tanggungjewab'             => safe_post('tanggungjewab'),
    //         'kesimpulanhpdo'            => safe_post('kesimpulanhpdo'),
    //         'saranhpdo'                 => safe_post('saranhpdo'),
    //         'tanggal_hpdo'              => safe_post('tanggal_hpdo') == '' ? null : date2mysql(safe_post('tanggal_hpdo')),
    //         'dokter_hpdo'               => safe_post('dokter_hpdo'),
    //         'updated_on'                => date('Y-m-d H:i:s')
    //     );  

    //     if ($checkDataHPDO == NULL) {
    //         $data['created_at'] = date('Y-m-d H:i:s');
    //         $this->db->insert('sm_hasil_pemeriksaan_dokter_okupasih', $data);
    //     } else {
    //         $this->db->where('id_layanan_pendaftaran', $idLayananPendaftaran);
    //         $this->db->update('sm_hasil_pemeriksaan_dokter_okupasih', $data);
    //     }
    
    //     if ($this->db->trans_status() === false) {
    //         $this->db->trans_rollback();
    //         $status = false;
    //         $message = 'Gagal simpan Hasil Pemeriksaan Dokter Okupasi';
    //     } else {
    //         $this->db->trans_commit();
    //         $status = true;
    //         $message = 'Berhasil simpan Hasil Pemeriksaan Dokter Okupasi';
    //     }   
    //     $this->response(array('status' => $status, 'message' => $message), REST_Controller::HTTP_OK);
    // }


    // HPDO BANGET
    function get_hasil_pemeriksaan_dokter_okupasi_get() {  
        $this->load->model('pendaftaran/Pendaftaran_model', 'm_pendaftaran');  
        $id = $this->get('id', true);
        $id_layanan_pendaftaran = $this->get('id_layanan_pendaftaran', true);  
        $data = [
            'pendaftaran_detail' => $this->m_pendaftaran->getPendaftaranDetail($id, $id_layanan_pendaftaran),
            'hasil_pemeriksaan_dokter_okupasi' => $this->m_mcu->getHasilPemeriksaanDokterOkupasi($id_layanan_pendaftaran),
            'questionnaire_mcu_okupasi'        => $this->m_hasil_mcu->getDataQuisionerMCU($id_layanan_pendaftaran)     
        ]; 
        $this->response($data, REST_Controller::HTTP_OK);
    }

    // HPDO BARU BANGET LOGS
    function simpan_hasil_pemeriksaan_dokter_okupasi_post() {
        $idLayananPendaftaran = safe_post('id_layanan_pendaftaran');
        $checkDataHPDO = $this->m_mcu->getHasilPemeriksaanDokterOkupasi($idLayananPendaftaran);
        $this->db->trans_begin();      
        $data = array(
            'id_layanan_pendaftaran'    => $idLayananPendaftaran,
            'id_user'                   => $this->session->userdata('id_translucent'),
            'id_pendaftaran'            => safe_post('id_pendaftaran'),
            'pekerjaany_hpdo'           => safe_post('pekerjaany_hpdo'),
            'uraian_hpdo'               => safe_post('uraian_hpdo'),
            'masakerja_hpdo'            => safe_post('masakerja_hpdo'),
            'keterangan_hpdo'           => safe_post('keterangan_hpdo'),
            'keluhan_hpdo'              => safe_post('keluhan_hpdo'),
            'bising_hpdo'               => safe_post('bising_hpdo'),
            'ketinggian_hpdo'           => safe_post('ketinggian_hpdo'),
            'gtubuh_hpdo'               => safe_post('gtubuh_hpdo'),
            'gtangan_hpdo'              => safe_post('gtangan_hpdo'),
            'suhu_hpdo'                 => safe_post('suhu_hpdo'),
            'radiasi_hpdo'              => safe_post('radiasi_hpdo'),
            'lain_hpdo'                 => safe_post('lain_hpdo'),
            'debu_hpdo'                 => safe_post('debu_hpdo'),
            'zatkimia_hpdo'             => safe_post('zatkimia_hpdo'),
            'pestisida_hpdo'            => safe_post('pestisida_hpdo'),
            'asap_hpdo'                 => safe_post('asap_hpdo'),
            'lainn_hpdo'                => safe_post('lainn_hpdo'),
            'bakteri_hpdo'              => safe_post('bakteri_hpdo'),
            'virus_hpdo'                => safe_post('virus_hpdo'),
            'parasit_hpdo'              => safe_post('parasit_hpdo'),
            'jamur_hpdo'                => safe_post('jamur_hpdo'),
            'lainnya_hpdo'              => safe_post('lainnya_hpdo'),
            'gberulang_hpdo'            => safe_post('gberulang_hpdo'),
            'angkat_hpdo'               => safe_post('angkat_hpdo'),
            'berdiri_hpdo'              => safe_post('berdiri_hpdo'),
            'duduk_hpdo'                => safe_post('duduk_hpdo'),
            'posisi_hpdo'               => safe_post('posisi_hpdo'),
            'pencahayaan_hpdo'          => safe_post('pencahayaan_hpdo'),
            'bekerja_hpdo'              => safe_post('bekerja_hpdo'),
            'laint_hpdo'                => safe_post('laint_hpdo'),
            'bebankerja_hpdo'           => safe_post('bebankerja_hpdo'),
            'kerjagilir_hpdo'           => safe_post('kerjagilir_hpdo'),
            'ketidakjelasan_hpdo'       => safe_post('ketidakjelasan_hpdo'),
            'pekerjaan_monoton_hpdo'    => safe_post('pekerjaan_monoton_hpdo'),
            'konflik_kerja_hpdo'        => safe_post('konflik_kerja_hpdo'),
            'tuntutan_hpdo'             => safe_post('tuntutan_hpdo'),
            // 'gejala_hpdo'               => safe_post('gejala_hpdo'),
            'ketaksaan'                 => safe_post('ketaksaan'),
            'konflikk'                  => safe_post('konflikk'),
            'kuantitatif'               => safe_post('kuantitatif'),
            'kualitatif'                => safe_post('kualitatif'),
            'pengembang'                => safe_post('pengembang'),
            'tanggungjewab'             => safe_post('tanggungjewab'),
            'kesimpulanhpdo'            => safe_post('kesimpulanhpdo'),
            'saranhpdo'                 => safe_post('saranhpdo'),
            'tanggal_hpdo'              => safe_post('tanggal_hpdo') == '' ? null : date2mysql(safe_post('tanggal_hpdo')),
            'dokter_hpdo'               => safe_post('dokter_hpdo'),
            'updated_on'                => date('Y-m-d H:i:s')
        );  

        if (!$checkDataHPDO || $checkDataHPDO->id_user == NULL) {
            $data['created_at'] = date('Y-m-d H:i:s');
            $this->db->insert('sm_hasil_pemeriksaan_dokter_okupasih', $data);
        } else {
            // Simpan log sebelum update
            $logData = $this->m_mcu->getHasilPemeriksaanDokterOkupasi($idLayananPendaftaran);
            $this->m_mcu->insertHasilPemeriksaanDokterOkupasiLog($logData);

            // Update data utama
            $this->db->where('id_layanan_pendaftaran', $idLayananPendaftaran);
            $this->db->update('sm_hasil_pemeriksaan_dokter_okupasih', $data);
        }

    
        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            $status = false;
            $message = 'Gagal simpan Hasil Pemeriksaan Dokter Okupasi';
        } else {
            $this->db->trans_commit();
            $status = true;
            $message = 'Berhasil simpan Hasil Pemeriksaan Dokter Okupasi';
        }   
        $this->response(array('status' => $status, 'message' => $message), REST_Controller::HTTP_OK);
    }




}
