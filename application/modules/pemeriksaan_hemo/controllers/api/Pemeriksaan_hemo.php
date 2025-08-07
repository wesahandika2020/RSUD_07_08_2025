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
class Pemeriksaan_hemo extends REST_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->limit = 10;
        $this->datetime = date('Y-m-d H:i:s');
        $this->load->model('Pemeriksaan_hemo_model', 'm_pemeriksaan_hemo');

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

    function get_list_pemeriksaan_hemo_get()
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
        ];

        $data            = $this->m_pemeriksaan_hemo->getListDataPemeriksaanHemodialisa($this->limit, $start, $search);
        foreach ($data['data'] as $item) {
            $item->jml_id_pendaftaran     = $this->m_pemeriksaan_hemo->getCountIdPendaftran($item->id_pendaftaran);
        }
        $data['page']    = (int) $this->get('page');
        $data['limit']   = $this->limit;

        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK); // (200)
        endif;
    }

    function get_detail_asuhan_keperawatan_get()
    {
        if (!$this->get('id_pendaftaran') && !$this->get('id_layanan_pendaftaran')) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
        endif;

        $this->load->model('pendaftaran/Pendaftaran_model', 'm_pendaftaran');
        $this->load->model('pelayanan/Pelayanan_model', 'm_pelayanan');
        $data                       = $this->m_pendaftaran->getPendaftaranDetail($this->get('id_pendaftaran', true), $this->get('id_layanan_pendaftaran', true));
        $data['profil']             = $this->m_pelayanan->getProfilPasien($data['pasien']->id_pasien);
        $data['hemodialisa_ke']     = $this->m_pemeriksaan_hemo->getCountHemodialisa($data['layanan']->id);
        // $data['anamnesa']           = $this->m_pelayanan->getAnamnesa($data['layanan']->id, $this->get('id_pendaftaran', true));
        $data['anamnesa']           = $this->m_pelayanan->getAnamnesa($data['layanan']->id);
        $data['diagnosa']           = $this->m_pelayanan->getDiagnosaPemeriksaan($data['layanan']->id);
        $data['asuhan_keperawatan'] = $this->m_pemeriksaan_hemo->getDetailAsuhanKeperawatan($this->get('id_pendaftaran', true));

        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK); // (200)
        endif;
    }

    function get_detail_laporan_hd_get()
    {
        if (!$this->get('id_pendaftaran') && !$this->get('id_layanan_pendaftaran')) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
        endif;

        $this->load->model('pendaftaran/Pendaftaran_model', 'm_pendaftaran');
        $this->load->model('pelayanan/Pelayanan_model', 'm_pelayanan');
        $data               = $this->m_pendaftaran->getPendaftaranDetail($this->get('id_pendaftaran', true), $this->get('id_layanan_pendaftaran', true));
        $data['profil']     = $this->m_pelayanan->getProfilPasien($data['pasien']->id_pasien);
        $data['laporan_hd'] = $this->m_pemeriksaan_hemo->getLaporanHDDetail($this->get('id_pendaftaran', true));

        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK); // (200)
        endif;
    }

    function update_asuhan_keperawatan_post()
    {
        $this->db->trans_begin();
        if (!$this->post('id_pendaftaran', true) && !$this->post('id_layanan_pendaftaran', true)) {
            $this->response(array('status' => false, 'message' => 'Parameter Tidak Lengkap'), REST_Controller::HTTP_OK);
        }

        $this->load->model('pendaftaran/Pendaftaran_model', 'm_pendaftaran');
        // ambil data pendaftaran pasien
        $data = $this->m_pendaftaran->getPendaftaranDetail($this->post('id_pendaftaran', true), $this->post('id_layanan_pendaftaran', true));
        $id_pendaftaran = safe_post('id_pendaftaran');
        $id_layanan_pendaftaran = safe_post('id_layanan_pendaftaran');

        $waktu_asuhan = (safe_post('waktu_asuhan') !== '' ? datetime2mysql(safe_post('waktu_asuhan')) : $this->datetime);
        // tampung data keluhan utama menjadi json
        $data_keluhan_utama = json_encode(array(
            'sesak_nafas' => safe_post('ku_sesak_nafas'),
            'mual' => safe_post('ku_mual'),
            'muntah' => safe_post('ku_muntah'),
            'gatal' => safe_post('ku_gatal'),
            'lain_lain' => safe_post('ku_lain_lain'),
            'ket_lain_lain' => safe_post('ku_lain_lain_input'),
        ));
        // tampung data riwayat penyakit dahulu menjadi json
        $data_riwayat_penyakit_dahulu = json_encode(array(
            'asma' => safe_post('rpd_asma'),
            'hipertensi' => safe_post('rpd_hipertensi'),
            'jantung' => safe_post('rpd_jantung'),
            'diabetes' => safe_post('rpd_diabetes'),
            'lain_lain' => safe_post('rpd_lain_lain'),
            'ket_lain_lain' => safe_post('rpd_lain_lain_input'),
        ));
        // tampung data riwayat penyakit keluarga menjadi json
        $data_riwayat_penyakit_keluarga = json_encode(array(
            'asma' => safe_post('rpk_asma'),
            'hipertensi' => safe_post('rpk_hipertensi'),
            'jantung' => safe_post('rpk_jantung'),
            'diabetes' => safe_post('rpk_diabetes'),
            'lain_lain' => safe_post('rpk_lain_lain'),
            'ket_lain_lain' => safe_post('rpk_lain_lain_input'),
        ));
        // tampung data kebiasaan menjadi json
        $data_kebiasaan = json_encode(array(
            'merokok' => array(
                'hasil' => safe_post('kebiasaan_merokok'),
                'ket_hasil' => safe_post('kebiasaan_merokok_ya_lain_lain')
            ),
            'narkoba' => array(
                'hasil' => safe_post('kebiasaan_narkoba'),
                'ket_hasil' => safe_post('kebiasaan_narkoba_ya_lain_lain')
            ),
            'alkohol' => array(
                'hasil' => safe_post('kebiasaan_alkohol'),
                'ket_hasil' => safe_post('kebiasaan_alkohol_ya_lain_lain')
            )
        ));
        // tampung data alergi menjadi json
        $data_alergi = json_encode(array(
            'hasil' => safe_post('alergi'),
            'ket_hasil' => safe_post('alergi_ya_lain_lain')
        ));
        // tampung data status psikologis menjadi json
        $data_status_psikologis = json_encode(array(
            'tenang' => safe_post('sp_tenang'),
            'cemas' => safe_post('sp_cemas'),
            'takut' => safe_post('sp_takut'),
            'marah' => safe_post('sp_marah'),
            'sedih' => safe_post('sp_sedih'),
            'bunuh_diri' => safe_post('sp_bunuh_diri'),
            'lain_lain' => safe_post('sp_lain_lain'),
            'ket_lain_lain' => safe_post('sp_lain_lain_input'),
        ));
        // tampung data kesadaran mejadi json
        $data_kesadaran = json_encode(array(
            'composmentis' => safe_post('composmentis'),
            'apatis' => safe_post('apatis'),
            'delirium' => safe_post('delirium'),
            'samnolen' => safe_post('samnolen'),
            'sopor' => safe_post('sopor'),
            'coma' => safe_post('coma'),
            'lain_lain' => safe_post('kesadaran_lain'),
            'ket_lain_lain' => safe_post('kesadaran_lain_input'),
        ));
        // tampung data tensi
        $data_tensi = (safe_post('pf_td_sistolik') !== '' && safe_post('pf_td_diastolik') !== '' ? safe_post('pf_td_sistolik') . ' / ' . safe_post('pf_td_diastolik') : NULL);
        // tampung data ekstermitas mejadi json
        $data_ekstermitas = json_encode(array(
            'tidak_edema' => safe_post('tidak_edema'),
            'dehidrasi' => safe_post('dehidrasi'),
            'edema' => safe_post('edema'),
            'edema_anasarka' => safe_post('edema_anasarka'),
            'pucat_dingin' => safe_post('pucat_dingin'),
        ));
        // tampung data akses vaskuler menjadi json
        $data_akses_vaskuler = json_encode(array(
            'av_fistula' => safe_post('av_fistula'),
            'hd_kateter' => safe_post('hd_kateter'),
            'subciavia' => safe_post('subciavia'),
            'jugular' => safe_post('jugular'),
            'femoral' => safe_post('femoral'),
            'lokasi' => array(
                'kanan' => safe_post('lokasi_kanan'),
                'kiri' => safe_post('lokasi_kiri'),
            )
        ));

        // tampung data diagnosa keperawatan menjadi json
        $data_diagnosa_keperawatan = json_encode(array(
            'diag_keperawatan_1' => safe_post('diag_keperawatan_1'),
            'diag_keperawatan_2' => safe_post('diag_keperawatan_2'),
            'diag_keperawatan_3' => safe_post('diag_keperawatan_3'),
            'diag_keperawatan_4' => safe_post('diag_keperawatan_4'),
            'diag_keperawatan_5' => safe_post('diag_keperawatan_5'),
            'diag_keperawatan_6' => safe_post('diag_keperawatan_6'),
            'diag_keperawatan_7' => safe_post('diag_keperawatan_7'),
            'diag_keperawatan_8' => safe_post('diag_keperawatan_8'),
            'diag_keperawatan_9' => safe_post('diag_keperawatan_9'),
            'diag_keperawatan_lain' => safe_post('diag_keperawatan_lain')
        ));
        // tampung data intervensi keperawatan menjadi json
        $data_intervensi_keperawatan = json_encode(array(
            'intervensi_keperawatan_1' => safe_post('intervensi_keperawatan_1'),
            'intervensi_keperawatan_2' => safe_post('intervensi_keperawatan_2'),
            'intervensi_keperawatan_3' => safe_post('intervensi_keperawatan_3'),
            'intervensi_keperawatan_4' => safe_post('intervensi_keperawatan_4'),
            'intervensi_keperawatan_5' => safe_post('intervensi_keperawatan_5'),
            'intervensi_keperawatan_6' => safe_post('intervensi_keperawatan_6'),
            'intervensi_keperawatan_7' => safe_post('intervensi_keperawatan_7'),
            'intervensi_keperawatan_8' => safe_post('intervensi_keperawatan_8'),
            'intervensi_keperawatan_9' => safe_post('intervensi_keperawatan_9'),
            'intervensi_keperawatan_10' => safe_post('intervensi_keperawatan_10'),
            'intervensi_keperawatan_11' => safe_post('intervensi_keperawatan_11'),
            'intervensi_keperawatan_12' => safe_post('intervensi_keperawatan_12'),
            'intervensi_keperawatan_13' => safe_post('intervensi_keperawatan_13'),
            'intervensi_keperawatan_14' => safe_post('intervensi_keperawatan_14'),
            'intervensi_keperawatan_av_shunt' => safe_post('intervensi_keperawatan_av_shunt'),
            'intervensi_keperawatan_lain' => safe_post('intervensi_keperawatan_lain'),
        ));
        // tampung data intervensi kolaborasi
        $data_intervensi_kolaborasi = json_encode(array(
            'program_hd' => safe_post('inv_program_hd'),
            'transfusi_darah' => safe_post('inv_transfusi_darah'),
            'kolaborasi_diit' => safe_post('inv_kolaborasi_diit'),
            'pemberian_ga_glueonas' => safe_post('inv_pemberian_ga_glueonas'),
            'pemberian_antipiretik' => safe_post('inv_pemberian_antipiretik'),
            'pemberian_analgetik' => safe_post('inv_pemberian_analgetik'),
            'pemberian_erytropoetin' => safe_post('inv_pemberian_erytropoetin'),
            'pemberian_preparat_besi' => safe_post('inv_pemberian_preparat_besi'),
            'obat_obat_emergensi' => safe_post('inv_obat_obat_emergensi'),
            'pemberian_antibiotik' => safe_post('inv_pemberian_antibiotik'),
            'antibiotik' => safe_post('inv_antibiotik'),
        ));
        // tampung data intruksi medik
        $data_intruksi_medik = json_encode(array(
            'inisiasi' => safe_post('im_inisiasi'),
            'akut' => safe_post('im_akut'),
            'rutin' => safe_post('im_rutin'),
            'pre_op' => safe_post('im_pre_op'),
            'sled' => safe_post('im_sled'),
        ));
        // tampung data intruksi medik dialisat
        $data_intruksi_medik_dialisat = json_encode(array(
            'bicarbonat' => safe_post('dialisat_bicarbonat'),
            'condusctivity' => safe_post('dialisat_condusctivity'),
            'temperatur' => safe_post('dialisat_temperatur'),
        ));
        // tampung data intruksi medik dialiser
        $data_intruksi_medik_dialiser = json_encode(array(
            'dialiser' => safe_post('im_dialiser'),
            'ket_dialiser_reuse' => safe_post('im_dialiser_reuse_input'),
            'ket_dialiser_tcv' => safe_post('im_dialiser_tcv_input')
        ));

        // tampung data penyakit selama hd
        $data_penyakit_selama_hd = json_encode(array(
            'masalah_akses' => safe_post('ps_masalah_akses'),
            'pendarahan' => safe_post('ps_pendarahan'),
            'first_use_syndrom' => safe_post('ps_first_use_syndrom'),
            'sakit_kepala' => safe_post('ps_sakit_kepala'),
            'mual_muntah' => safe_post('ps_mual_muntah'),
            'kram_otot' => safe_post('ps_kram_otot'),
            'hiperkalemia' => safe_post('ps_hiperkalemia'),
            'hipotensi' => safe_post('ps_hipotensi'),
            'hipertensi' => safe_post('ps_hipertensi'),
            'nyeri_dada' => safe_post('ps_nyeri_dada'),
            'aritmia' => safe_post('ps_aritmia'),
            'gatal_gatal' => safe_post('ps_gatal_gatal'),
            'demam' => safe_post('ps_demam'),
            'menggigil' => safe_post('ps_menggigil'),
            'lain_lain' => safe_post('ps_lain_lain'),
            'ket_lain_lain' => safe_post('ps_lain_lain_input'),
        ));
        // tampung data evaluasi keperawatan menjadi json
        $data_evaluasi_keperawatan = json_encode(array(
            'subject' => safe_post('ek_subject'),
            'objective' => safe_post('ek_objective'),
            'assessment' => safe_post('ek_assessment'),
            'plan' => safe_post('ek_plan'),
        ));


        $data_asuhan_keperawatan = array(
            'id_layanan_pendaftaran' => $id_layanan_pendaftaran,
            'id_pasien' => $data['pasien']->id_pasien,
            'waktu' => $waktu_asuhan,
            'no_mesin' => safe_post('no_mesin'),
            'dx_medis' => safe_post('dx_medis'),
            'hemodialisa_ke' => safe_post('hemodialisa_ke'),
            'keluhan_utama' => $data_keluhan_utama,
            'riwayat_penyakit_sekarang' => safe_post('penyakit_sekarang'),
            'riwayat_penyakit_dahulu' => $data_riwayat_penyakit_dahulu,
            'riwayat_penyakit_keluarga' => $data_riwayat_penyakit_keluarga,
            'riwayat_penyakit_keluarga' => $data_riwayat_penyakit_keluarga,
            'kebiasaan' => $data_kebiasaan,
            'alergi' => $data_alergi,
            'hubungan_pasien_dengan_keluarga' => safe_post('hubungan_keluarga'),
            'status_psikologis' => $data_status_psikologis,
            'kebiasaan_keagamaan' => safe_post('kebiasaan_keagamaan'),
            'wajib_ibadah' => safe_post('wajib_ibadah'),
            'halangan_lain' => (safe_post('wajib_ibadah') == 'Halangan Lain' ? safe_post('halangan_lain_input') : NULL),
            'thaharoh' => safe_post('thaharoh'),
            'shalat' => safe_post('shalat'),
            'kesadaran' => $data_kesadaran,
            'tensi' => $data_tensi,
            'nadi' => (safe_post('pf_nadi') !== '' ? safe_post('pf_nadi') : NULL),
            'nafas' => (safe_post('pf_pernafasan') !== '' ? safe_post('pf_pernafasan') : NULL),
            'suhu' => (safe_post('pf_suhu') !== '' ? safe_post('pf_suhu') : NULL),
            'konjungtiva' => (safe_post('konjungtiva') !== '' ? safe_post('konjungtiva') : NULL),
            'ekstermitas' => $data_ekstermitas,
            'bb_pre_hd' =>  safe_post('bb_pre_hd'),
            'bb_bbk' => safe_post('bb_bbk'),
            'bb_post_hd_lalu' => safe_post('bb_post_hd_lalu'),
            'bb_post_hd' => safe_post('bb_post_hd'),
            'akses_vaskuler' => $data_akses_vaskuler,
            'penilaian_tingkat_nyeri' => safe_post('measurement_scale'),
            'skala_nyeri' => safe_post('skala_nyeri'),
            'lokasi_skala_nyeri' => safe_post('skala_nyeri_lokasi'),
            'keterangan_tingkat_nyeri' => (safe_post('ket_tingkat_nyeri') !== '' ? safe_post('ket_tingkat_nyeri') : NULL),
            'status_fungsional' => (safe_post('status_fungsional') !== '' ? safe_post('status_fungsional') : NULL),
            'sf_ket_perlu_bantuan' => (safe_post('sf_perlu_bantuan') !== '' ? safe_post('sf_perlu_bantuan') : NULL),
            'sf_ket_ketergantungan' => (safe_post('sf_ketergantungan') !== '' ? safe_post('sf_ketergantungan') : NULL),
            'sn_penurunan_berat_badan' => (safe_post('sn_penurunan_bb') !== '' ?  safe_post('sn_penurunan_bb') : NULL),
            'sn_penurunan_berat_badan_on' => (safe_post('sn_penurunan_bb') == '3' ? safe_post('sn_penurunan_bb_on') : NULL),
            'sn_asupan_makan' => (safe_post('sn_asupan_makan') !== '' ? safe_post('sn_asupan_makan') : NULL),
            'total_sn' => (safe_post('sn_total') !== '' ? safe_post('sn_total') : NULL),
            'src_a' => (safe_post('src_a') !== '' ? safe_post('src_a') : NULL),
            'src_b' => (safe_post('src_b') !== '' ? safe_post('src_b') : NULL),
            'src_hasil' => (safe_post('src_hasil') !== '' ? safe_post('src_hasil') : NULL),
            'pemeriksaan_penunjang' => safe_post('pemeriksaan_penunjang'),
            'diagnosa_keperawatan' => $data_diagnosa_keperawatan,
            'intervensi_keperawatan' => $data_intervensi_keperawatan,
            'intervensi_kolaborasi' => $data_intervensi_kolaborasi,
            'intruksi_medik' => $data_intruksi_medik,
            'im_time' => (safe_post('im_time') == '1' ? safe_post('im_time_input') : NULL),
            'im_qb' => safe_post('im_qb'),
            'im_qd' => safe_post('im_qd'),
            'im_uf_goal' => safe_post('im_uf_goal'),
            'im_profile_hd' => (safe_post('im_profile_hd') == '1' ? safe_post('im_profile_hd_input') : NULL),
            'im_dialisat' => $data_intruksi_medik_dialisat,
            'im_dialiser' => $data_intruksi_medik_dialiser,
            'im_dialiser_tipe' => safe_post('im_dialiser_tipe'),
            'heparin' => safe_post('heparin'),
            'heparin_dosis_awal' => safe_post('heparin_dosis_awal'),
            'heparin_dosis_sirkulasi' => safe_post('heparin_dosis_sirkulasi'),
            'heparin_dosis_maintenance' => safe_post('heparin_dosis_maintenance'),
            'heparin_dosis_total' => safe_post('heparin_total'),
            'penyakit_selama_hd' => $data_penyakit_selama_hd,
            'evaluasi_keperawatan' => $data_evaluasi_keperawatan,
            'dischart_planning' => safe_post('dischart_planning'),
            'akses_vaskuler_oleh' => safe_post('akses_vaskuler_oleh'),
            'id_users' => $this->session->userdata('id_translucent'),
            'obat' => (safe_post('obat') !== '' ? safe_post('obat') : NULL),
            'catatan_medis' => (safe_post('catatan_medis') !== '' ? safe_post('catatan_medis') : NULL),
            'id_dokter' => (safe_post('dokter_asuhan_keperawatan') !== '' ? safe_post('dokter_asuhan_keperawatan') : NULL)
        );

        // simpan jika id asuhan keperawatan tidak ada | update jika ada
        $id_asuhan_keperawatan = $this->m_pemeriksaan_hemo->updateAsuhanKeperawatan($data_asuhan_keperawatan, safe_post('id_asuhan_keperawatan'));

        // tampungan keterangan lain pre hd
        $data_keterangan_lain_pre_hd = json_encode(array(
            'subject' => safe_post('pre_keterangan_lain_subject'),
            'objective' => safe_post('pre_keterangan_lain_objective'),
            'assessment' => safe_post('pre_keterangan_lain_assessment'),
            'plan' => safe_post('pre_keterangan_lain_plan'),
        ));
        // tampung data tindakan keperewatan pre hd
        $data_tindakan_keperawatan_pre_hd = array(
            'id_asuhan_keperawatan' => $id_asuhan_keperawatan,
            'jenis_observasi' => safe_post('pre_jenis_observasi'),
            'observasi_jam' => safe_post('pre_observasi_jam'),
            'observasi_qb' => safe_post('pre_observasi_qb'),
            'observasi_ufr' => safe_post('pre_observasi_ufr'),
            'observasi_td' => safe_post('pre_observasi_td'),
            'observasi_n' => safe_post('pre_observasi_n'),
            'observasi_rr' => safe_post('pre_observasi_rr'),
            'observasi_suhu' => safe_post('pre_observasi_suhu'),
            'intake_nacl' => safe_post('pre_intake_nacl'),
            'intake_dextrose' => safe_post('pre_intake_dextrose'),
            'intake_makan_minum' => safe_post('pre_intake_makan_minum'),
            'intake_lain_lain' => safe_post('pre_intake_lain_lain'),
            'output_uf_tercapai' => safe_post('pre_output_uf_tercapai'),
            'output_lain_lain' => safe_post('pre_output_lain_lain'),
            'keterangan_lain' => $data_keterangan_lain_pre_hd,
            'paraf' => (safe_post('pre_paraf') !== '' ? safe_post('pre_paraf') : NULL),
            'nama_paraf' => $this->session->userdata('nama'),
            'waktu' => $this->datetime,
        );

        // tampung data tindakan keperewatan intra hd
        $data_tindakan_keperawatan_intra_hd = array(
            'id_tindakan_keperawatan' => safe_post('id_tindakan_keperawatan'),
            'id_asuhan_keperawatan' => $id_asuhan_keperawatan,
            'jenis_observasi' => safe_post('intra_jenis_observasi'),
            'intra_observasi_jam' => safe_post('intra_observasi_jam'),
            'intra_observasi_qb' => safe_post('intra_observasi_qb'),
            'intra_observasi_ufr' => safe_post('intra_observasi_ufr'),
            'intra_observasi_td' => safe_post('intra_observasi_td'),
            'intra_observasi_n' => safe_post('intra_observasi_n'),
            'intra_observasi_rr' => safe_post('intra_observasi_rr'),
            'intra_observasi_suhu' => safe_post('intra_observasi_suhu'),
            'intra_intake_nacl' => safe_post('intra_intake_nacl'),
            'intra_intake_dextrose' => safe_post('intra_intake_dextrose'),
            'intra_intake_makan_minum' => safe_post('intra_intake_makan_minum'),
            'intra_intake_lain_lain' => safe_post('intra_intake_lain_lain'),
            'intra_output_uf_tercapai' => safe_post('intra_output_uf_tercapai'),
            'intra_output_lain_lain' => safe_post('intra_output_lain_lain'),
            'intra_keterangan_lain' => safe_post('intra_keterangan_lain'),
            'intra_paraf' => (safe_post('intra_paraf') !== '' ? safe_post('intra_paraf') : ''),
        );

        // tampung data tindakan keperewatan post
        $data_tindakan_keperawatan_post_hd = array(
            'id_asuhan_keperawatan' => $id_asuhan_keperawatan,
            'jenis_observasi' => safe_post('post_jenis_observasi'),
            'observasi_jam' => safe_post('post_observasi_jam'),
            'observasi_qb' => safe_post('post_observasi_qb'),
            'observasi_ufr' => safe_post('post_observasi_ufr'),
            'observasi_td' => safe_post('post_observasi_td'),
            'observasi_n' => safe_post('post_observasi_n'),
            'observasi_rr' => safe_post('post_observasi_rr'),
            'observasi_suhu' => safe_post('post_observasi_suhu'),
            'intake_nacl' => safe_post('post_intake_nacl'),
            'intake_dextrose' => safe_post('post_intake_dextrose'),
            'intake_makan_minum' => safe_post('post_intake_makan_minum'),
            'intake_lain_lain' => safe_post('post_intake_lain_lain'),
            'output_uf_tercapai' => safe_post('post_output_uf_tercapai'),
            'output_lain_lain' => safe_post('post_output_lain_lain'),
            'keterangan_lain' => safe_post('post_keterangan_lain'),
            'paraf' => (safe_post('post_paraf') !== '' ? safe_post('post_paraf') : NULL),
            'nama_paraf' => $this->session->userdata('nama'),
            'waktu' => $this->datetime,
        );

        $tipe = $this->m_pemeriksaan_hemo->updateTindakanKeperawatan($data_tindakan_keperawatan_pre_hd, $data_tindakan_keperawatan_intra_hd, $data_tindakan_keperawatan_post_hd, $id_asuhan_keperawatan);

        if ($this->db->trans_status() === false) :
            $this->db->trans_rollback();
            $status = false;
            ($tipe == 'insert' ? $message = 'Gagal menyimpan asuhan keperawatan' : $message = 'Gagal mengubah asuhan keperawatan');
        else :
            $this->db->trans_commit();
            $status = true;
            ($tipe == 'insert' ? $message = 'Berhasil menyimpan asuhan keperawatan' : $message = 'Berhasil mengubah asuhan keperawatan');
        endif;

        $this->response(array('status' => $status, 'message' => $message, 'tipe' => $tipe));
    }

    function delete_asuhan_keperawatan_delete($id)
    {
        $status = $this->m_pemeriksaan_hemo->deleteAsuhanKeperawatan($id);
        $this->response(array('status' => $status), REST_Controller::HTTP_OK);
    }

    function delete_laporan_hd_delete($id)
    {
        $status = $this->m_pemeriksaan_hemo->deleteLaporanHD($id);
        $this->response(array('status' => $status), REST_Controller::HTTP_OK);
    }

    function get_asuhan_keperawatan_by_id_get()
    {
        if (!$this->get('id', true)) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
        endif;

        $data = $this->m_pemeriksaan_hemo->getAsuhanKeperawatanById($this->get('id', true));
        $this->response($data, REST_Controller::HTTP_OK);
    }

    function get_laporan_hd_by_id_get()
    {
        if (!$this->get('id', true)) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
        endif;

        $data = $this->m_pemeriksaan_hemo->getLaporanHDById($this->get('id', true));
        $this->response($data, REST_Controller::HTTP_OK);
    }

    // Laporan Hemodialisa Rawat Inap
    function update_laporan_hd_post()
    {
        $data_program = json_encode(array(
            'hd' => safe_post('program_hd'),
            'sleed' => safe_post('program_sleed'),
            'hfr' => safe_post('program_hfr'),
            'hdf' => safe_post('program_hdf'),
            'lain' => safe_post('program_lain'),
            'ket_lain' => safe_post('program_lain_input'),
            'dengan' => safe_post('dengan'),
        ));

        $data_akses_sirkulasi = json_encode(array(
            'cimino' => safe_post('akses_sirkulasi_cimino'),
            'femoral' => safe_post('akses_sirkulasi_femoral'),
            'catheter' => safe_post('akses_sirkulasi_catheter'),
            'ket_catheter' => safe_post('akses_sirkulasi_catheter_input'),
        ));

        $gcs_total = 0;
        if (safe_post('gcs_e') | safe_post('gcs_m') | safe_post('gcs_v') !== '') :
            $gcs_total = (int)safe_post('gcs_e') + (int)safe_post('gcs_m') + (int)safe_post('gcs_v');
        endif;

        $data = array(
            'id_layanan_pendaftaran' => safe_post('id_layanan_pendaftaran'),
            // 'id_rawat_inap' => safe_post('id_rawat_inap'),
            'ranap_asal_hd' => (safe_post('ranap_asal_hd') !== '' ? safe_post('ranap_asal_hd') : NULL),
            'waktu' => (safe_post('waktu') !== '' ? datetime2mysql(safe_post('waktu')) : NULL),
            'waktu_awal' => (safe_post('waktu_awal') !== '' ? safe_post('waktu_awal') : NULL),
            'waktu_akhir' => (safe_post('waktu_akhir') !== '' ? safe_post('waktu_akhir') : NULL),
            'program' => $data_program,
            'waktu_dialisis' => safe_post('waktu_dialisis'),
            'uf_goal' => safe_post('uf_goal'),
            'quick_blood' => safe_post('quick_blood'),
            'quick_dialysat' => safe_post('quick_dialysat'),
            'profilling_uf' => safe_post('profilling_uf'),
            'profilling_na' => safe_post('profilling_na'),
            'profilling_lain' => safe_post('profilling_lain'),
            'akses_sirkulasi' => $data_akses_sirkulasi,
            'keluhan_utama' => safe_post('keluhan_utama'),
            'keadaan_umum' => safe_post('keadaan_umum'),
            'kesadaran' => safe_post('kesadaran'),
            'gcs_e' => safe_post('gcs_e'),
            'gcs_m' => safe_post('gcs_m'),
            'gcs_v' => safe_post('gcs_v'),
            'gcs_total' => $gcs_total,
            // 'gcs_total' => safe_post('gcs_total'),
            'tensi_sistolik' => safe_post('tensi_s'),
            'tensi_diastolik' => safe_post('tensi_d'),
            'suhu' => safe_post('suhu'),
            'nadi' => safe_post('nadi'),
            'respirasi' => safe_post('respirasi'),
            'ventilator' => (safe_post('ventilator') !== '' ? safe_post('ventilator') : NULL),
            'on_hd' => safe_post('on_hd'),
            'waktu_dialisis_post_hd' => safe_post('waktu_dialisis_post_hd'),
            'transfusi' => safe_post('transfusi'),
            'terapi_cairan' => safe_post('terapi_cairan'),
            'asupan_cairan' => safe_post('asupan_cairan'),
            'hasil_lain' => safe_post('hasil_lain'),
            'jumlah' => safe_post('jumlah'),
            'balance' => safe_post('balance'),
            'keterangan_lain' => safe_post('keterangan_lain'),
            'uf_goal_post_hd' => safe_post('uf_goal_post_hd'),
            'uf_goal_lain' => safe_post('uf_goal_lain'),
            'uf_goal_jumlah' => safe_post('uf_goal_jumlah'),
            'ket_darah_lab' => (safe_post('darah_lab') !== '' ? safe_post('darah_lab') : NULL),
            'id_dokter' => (safe_post('dokter_jaga') !== '' ? safe_post('dokter_jaga') : NULL),
            'id_perawat_hd' => (safe_post('perawat_hd') !== '' ? safe_post('perawat_hd') : NULL),
            'id_perawat_ruangan' => (safe_post('perawat_ruangan') !== '' ? safe_post('perawat_ruangan') : NULL),
            // 'id_ruang_rawat' => (safe_post('id_bangsal') !== '' ? safe_post('id_bangsal') : NULL),
            // 'ruang_rawat' => (safe_post('bangsal') !== '' ? safe_post('bangsal') : NULL),
        );

        $response = $this->m_pemeriksaan_hemo->updateLaporanHD($data);
        $this->response($response, REST_Controller::HTTP_OK);
    }

    function batal_konsul_post()
    {
        if (!safe_post('id_pendaftaran')) {
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
        }

        $this->load->model('pelayanan/Pelayanan_model', 'm_pelayanan');

        $id_pendaftaran = safe_post('id_pendaftaran');
        $id_layanan_pendaftaran = safe_post('id_layanan_pendaftaran');
        $jenis = safe_post('jenis_layanan');

        // Update pembatalan layanan
        $updateBatal = $this->db->where("id", $id_layanan_pendaftaran)->update("sm_layanan_pendaftaran", [
            'status_terlayani' => 'Batal',
            'tindak_lanjut' => 'Batal',
        ]);

        if ($updateBatal) {

            // Ambil data diagnosa dan tindakan berdasarkan layanan
            $dataDiagnosa = $this->db->get_where('sm_diagnosa', ['id_layanan_pendaftaran' => $id_layanan_pendaftaran])->result();
            $dataTindakan = $this->db->get_where('sm_tarif_tindakan_pasien', ['id_layanan_pendaftaran' => $id_layanan_pendaftaran])->result();

            // Mapping jenis layanan
            $jenisMapping = [
                'Poliklinik' => 'Tindakan',
                'Rawat Inap' => 'Rawat Inap',
                'Intensive Care' => 'Intensive Care',
                'Pemulasaran Jenazah' => 'Pemulasaran Jenazah',
            ];
            $jenis = $jenisMapping[$jenis] ?? 'Tindakan'; // Default ke "Tindakan"

            // Hapus data diagnosa
            if (!empty($dataDiagnosa)) {
                foreach ($dataDiagnosa as $value) {
                    $this->m_pelayanan->deleteDiagnosaPemeriksaan($value->id);
                }
            }

            // Hapus data tindakan
            if (!empty($dataTindakan)) {
                foreach ($dataTindakan as $value) {
                    $this->m_pelayanan->deleteTindakanPemeriksaan($value->id, $jenis);
                }
            }

            $message = [
                'status'  => TRUE,
                'message' => 'Pembatalan Konsul Berhasil.'
            ];
            $this->response($message, REST_Controller::HTTP_OK);
        } else {
            $message = [
                'status' => FALSE,
                'message' => 'Gagal Melakukan Pembatalan Konsul.'
            ];
            $this->response($message, REST_Controller::HTTP_OK);
        }
    }
}
