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
class Pemeriksaan_igd extends REST_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->limit = 10;
        $this->load->model('Pemeriksaan_igd_model', 'm_pemeriksaan_igd');

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

    function get_list_pemeriksaan_igd_get()
    {
        if (!$this->get('page')) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
        endif;
        $start          = ((int) $this->get('page') - 1) * $this->limit;
        $search = [
            'tanggal_awal'      => safe_get('tanggal_awal'),
            'tanggal_akhir'     => safe_get('tanggal_akhir'),
            'jenis_layanan'     => $this->get('jenis'),
            'no_register'       => safe_get('no_register'),
            'no_rm'             => safe_get('no_rm'),
            'nik'               => safe_get('nik'),
            'nama'              => safe_get('nama'),
            'layanan'           => safe_get('layanan'),
        ];

        $data = $this->m_pemeriksaan_igd->getListDataPemeriksaanIgd($this->limit, $start, $search);
        $data['page'] = (int) $this->get('page');
        $data['limit'] = $this->limit;

        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK); // (200)
        endif;
    }


    // GABUNGAN WH // PIM
    function get_data_pengkajian_awal_igd_get(){
        if (!$this->get('id')) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
        endif;
        $this->load->model('pendaftaran/Pendaftaran_model', 'm_pendaftaran');
        $this->load->model('pelayanan/Pelayanan_model', 'm_pelayanan');
        $data = $this->m_pendaftaran->getPendaftaranDetail($this->get('id', true), $this->get('id_layanan', true));
        $data['profil'] = $this->m_pelayanan->getProfilPasien($data['pasien']->id_pasien);
        $data['kajian_medis'] = $this->m_pemeriksaan_igd->getKajianMedis($this->get('id', true));
        $data['kajian_keperawatan'] = $this->m_pemeriksaan_igd->getKajianKeperawatan($this->get('id', true));
        // WH1
        $data['kajian_triase'] = $this->m_pemeriksaan_igd->getKajianTriase($this->get('id', true));
        // PIM
        $data['maternal'] = $this->m_pemeriksaan_igd->getMaternal($this->get('id', true), $this->get('id_layanan', true));
        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK); // (200)
        endif;
    }

    // GABUNGAN WH // PIM
    function simpan_pengkajian_awal_igd_post(){
        $data_medis = [
            'id_layanan_pendaftaran' => safe_post('id_layanan_pendaftaran'),
            'waktu' => datetime2mysql($this->post('waktu_kajian')),
            'keluhan_utama' => safe_post('keluhan_utama_medis'),
            'riwayat_penyakit_sekarang' => safe_post('rps_medis'),
            'riwayat_penyakit_dahulu' => json_encode([
                'asma' => safe_post('rpt_asma'),
                'diabetes_miletus' => safe_post('rpt_diabetes_miletus'),
                'cardiovascular' => safe_post('rpt_cardiovascular'),
                'kanker' => safe_post('rpt_kanker'),
                'thalasemia' => safe_post('rpt_thalasemia'),
                'lain' => safe_post('rpt_lain'),
                'ket_lain' => safe_post('rpt_lain_input'),
            ]),
            'riwayat_penyakit_keluarga' => json_encode([
                'asma' => safe_post('rpk_asma'),
                'diabetes_miletus' => safe_post('rpk_diabetes_miletus'),
                'cardiovascular' => safe_post('rpk_cardiovascular'),
                'kanker' => safe_post('rpk_kanker'),
                'thalasemia' => safe_post('rpk_thalasemia'),
                'lain' => safe_post('rpk_lain_lain'),
                'ket_lain' => safe_post('rpk_lain_input'),
            ]),
            'riwayat_detail' => safe_post('riwayat_detail'),
            'alergi' => (safe_post('alergi') !== '' ? safe_post('alergi') : NULL),
            'ket_alergi' => safe_post('alergi_input'),
            'ket_reaksi_alergi' => safe_post('reaksi_alergi_input'),
            'neonatus' => json_encode([
                'menangis' => safe_post('menangis'),
                'spo' => safe_post('spo'),
                'vital' => safe_post('vital'),
                'wajah' => safe_post('wajah'),
                'tidur' => safe_post('tidur'),
                'total' => safe_post('total_neonatus'),
            ]),
            'ket_nyeri' => safe_post('ptn_keterangan'),
            'ket_nyeri_hilang' => json_encode([
                'minum_obat' => safe_post('ptn_minum_obat'),
                'mendengarkan_musik' => safe_post('ptn_mendengarkan_musik'),
                'istirahat' => safe_post('ptn_istirahat'),
                'berubah_posisi' => safe_post('ptn_berubah_posisi'),
                'lain' => safe_post('ptn_lain'),
                'ket_lain' => safe_post('ptn_lain_input'),
            ]),
            'flacc_wajah' => (safe_post('nilai_flacc_wajah') !== '' ? safe_post('nilai_flacc_wajah') : NULL),
            'flacc_kaki' => (safe_post('nilai_flacc_kaki') !== '' ? safe_post('nilai_flacc_kaki') : NULL),
            'flacc_aktifitas' => (safe_post('nilai_flacc_aktifitas') !== '' ? safe_post('nilai_flacc_aktifitas') : NULL),
            'flacc_menangis' => (safe_post('nilai_flacc_menangis') !== '' ? safe_post('nilai_flacc_aktifitas') : NULL),
            'flacc_bicara' => (safe_post('nilai_flacc_bicara') !== '' ? safe_post('nilai_flacc_bicara') : NULL),
            'flacc_total' => (safe_post('total_nilai_flacc') !== '' ? safe_post('total_nilai_flacc') : NULL),
            'fisik_kepala' => safe_post('kepala_pm'),
            'fisik_mata' => safe_post('mata_pm'),
            'fisik_mulut' => safe_post('mulut_pm'),
            'fisik_leher' => safe_post('leher_pm'),
            'fisik_thoraks_cor' => safe_post('thoraks_cor_pm'),
            'fisik_thoraks_pulmo' => safe_post('thoraks_pulmo_pm'),
            'fisik_abdomen' => safe_post('abdomen_pm'),
            'fisik_ekstermitas' => safe_post('ekstermitas_pm'),
            'fisik_kulit_kelamin' => safe_post('kulit_kelamin_pm'),
            'fisik_note_anathomi' => $this->post('drawpad', false),
            'fisik_status_lokalis' => safe_post('status_lokalis'),
            'diagnosa_awal' => safe_post('diagnosa_awal'),
            'diagnosa_banding' => safe_post('diagnosa_banding'),
            'penunjang_lab' => json_encode([
                'dpl' => safe_post('lab_dpl'),
                'agd' => safe_post('lab_agd'),
                'elektrolit' => safe_post('lab_elektrolit'),
                'urin' => safe_post('lab_urin'),
                'ck' => safe_post('lab_ck'),
                'gds' => safe_post('lab_gds'),
                'ureum' => safe_post('lab_ureum'),
                'lain' => safe_post('lab_lain'),
                'ket_lain' => safe_post('lab_lain_input'),
            ]),
            'penunjang_xray' => json_encode([
                'tidak_ada' => safe_post('xray_tidak_ada'),
                'thorax' => safe_post('xray_thorax'),
                'abdomen' => safe_post('xray_abdomen'),
                'ctscan' => safe_post('xray_ctscan'),
                'lain' => safe_post('xray_lain'),
                'ket_lain' => safe_post('xray_lain_input'),
            ]),
            'penunjang_ekg' => json_encode([
                'ekg' => safe_post('ekg'),
                'ket_ekg' => safe_post('ket_ekg')
            ]),
            'terapi_tindakan' => $this->post('terapi_tindakan'),
            'id_bangsal' => (safe_post('bangsal') !== '' ? safe_post('bangsal') : NULL),
            'kontrol' => (safe_post('dipulangkan') !== '' ? safe_post('dipulangkan') : NULL),
            'ket_kontrol' => safe_post('ket_dipulangkan'),
            'dirujuk_ke' => safe_post('dirujuk_ke'),
            'alasan_rujuk' => safe_post('alasan_rujuk'),
            'alasan_pulang_paksa' => safe_post('alasan_pulang_paksa'),
            'meninggal' => (safe_post('meninggal') !== '' ? safe_post('meninggal') : 0),
            'kondisi_saat_pulang' => safe_post('kondisi_pulang'),
            'kesadaran' => json_encode([
                'cm' => safe_post('kesadaran_cm'),
                'apatis' => safe_post('kesadaran_apatis'),
                'delirium' => safe_post('kesadaran_delirium'),
                'sopor' => safe_post('kesadaran_sopor'),
                'koma' => safe_post('kesadaran_koma'),
            ]),
            'gcs_e' => safe_post('gcs_e'),
            'gcs_m' => safe_post('gcs_m'),
            'gcs_v' => safe_post('gcs_v'),
            'catatan_khusus' => $this->post('catatan_khusus'),
            'id_dokter_igd' => (safe_post('dokter_igd') !== '' ? safe_post('dokter_igd') : NULL),
            'id_dokter_dpjp' => (safe_post('verifikasi_dpjp') !== '' ? safe_post('verifikasi_dpjp') : NULL),
            'signature_dokter_igd' => (safe_post('ttd_dokter_igd') !== '' ? safe_post('ttd_dokter_igd') : NULL),
            'signature_dokter_dpjp' => (safe_post('ttd_verifikasi_dpjp') !== '' ? safe_post('ttd_verifikasi_dpjp') : NULL),
        ];
        $get_signature_medis = $this->m_pemeriksaan_igd->getDataSignatureKajianMedis($data_medis['id_layanan_pendaftaran']);
        if ($get_signature_medis !== NULL) :
            if ($get_signature_medis->signature_dokter_igd !== NULL) :
                $data_medis['signature_dokter_igd'] = $get_signature_medis->signature_dokter_igd;
            endif;
        else :
            $data_medis['signature_dokter_igd'] = (safe_post('ttd_dokter_igd') !== '' ? safe_post('ttd_dokter_igd') : NULL);
        endif;

        if ($get_signature_medis !== NULL) :
            if ($get_signature_medis->signature_dokter_dpjp !== NULL) :
                $data_medis['signature_dokter_dpjp'] = $get_signature_medis->signature_dokter_dpjp;
            endif;
        else :
            $data_medis['signature_dokter_dpjp'] = (safe_post('ttd_verifikasi_dpjp') !== '' ? safe_post('ttd_verifikasi_dpjp') : NULL);
        endif;



        $data_keperawatan = [
            'id_layanan_pendaftaran' => safe_post('id_layanan_pendaftaran'),
            'informasi_dari' => json_encode(array(
                'pasien' => safe_post('informasi_dari_pasien'),
                'keluarga' => safe_post('informasi_dari_keluarga'),
                'lain' => safe_post('informasi_dari_lain'),
                'ket_lain' => safe_post('informasi_dari_lain_input'),
            )),
            'cara_masuk' => json_encode([
                'tanpa_bantuan' => safe_post('cara_masuk_tanpa_bantuan'),
                'dengan_bantuan' => safe_post('cara_masuk_dengan_bantuan'),
                'kursi_roda' => safe_post('cara_masuk_kursi_roda'),
                'brankar' => safe_post('cara_masuk_brankar'),
            ]),
            'keluhan_utama' => safe_post('keluhan_utama_keperawatan'),
            'riwayat_penyakit_sekarang' => safe_post('rps_keperawatan'),
            'riwayat_penyakit_terdahulu' => json_encode([
                'asma' => safe_post('rpt_keperawatan_asma'),
                'hipertensi' => safe_post('rpt_keperawatan_hipertensi'),
                'jantung' => safe_post('rpt_keperawatan_jantung'),
                'diabetes' => safe_post('rpt_keperawatan_diabetes'),
                'hepatitis' => safe_post('rpt_keperawatan_hepatitis'),
                'lain' => safe_post('rpt_keperawatan_lain'),
                'ket_lain' => safe_post('rpt_keperawatan_lain_input'),
            ]),
            'riwayat_penyakit_keluarga' => json_encode([
                'asma' => safe_post('rpk_keperawatan_asma'),
                'hipertensi' => safe_post('rpk_keperawatan_hipertensi'),
                'jantung' => safe_post('rpk_keperawatan_jantung'),
                'diabetes' => safe_post('rpk_keperawatan_diabetes'),
                'hepatitis' => safe_post('rpk_keperawatan_hepatitis'),
                'lain' => safe_post('rpk_keperawatan_lain'),
                'ket_lain' => safe_post('rpk_keperawatan_lain_input'),
            ]),
            'kesadaran' => json_encode(array(
                'composmentis' => safe_post('composmentis'),
                'apatis' => safe_post('apatis'),
                'samnolen' => safe_post('samnolen'),
                'sopor' => safe_post('sopor'),
                'koma' => safe_post('koma'),
            )),

            'tensi_sistolik' => safe_post('tensi_sis'),
            'tensi_diastolik' => safe_post('tensi_dis'),
            'nadi' => safe_post('nadi_pa'),
            'suhu' => safe_post('suhu_pa'),
            'nafas' => safe_post('nafas_pa'),
            'status_psikologis' => json_encode(array(
                'cemas' => safe_post('sps_cemas'),
                'takut' => safe_post('sps_takut'),
                'marah' => safe_post('sps_marah'),
                'sedih' => safe_post('sps_sedih'),
                'bunuh_diri' => safe_post('sps_bunuh_diri'),
                'lain' => safe_post('sps_lain'),
                'ket_lain' => safe_post('sps_lain_input'),
            )),
            'status_mental' => json_encode(array(
                'sadar' => safe_post('smen_sadar'),
                'ada_masalah' => safe_post('smen_ada_masalah'),
                'ket_ada_masalah' => safe_post('smen_ada_masalah_input'),
                'perilaku_kekerasan' => safe_post('smen_perilaku_kekerasan'),
            )),
            'prja_umur' => safe_post('prja_umur'),
            'prja_jenis_kelamin' => safe_post('prja_kelamin'),
            'prja_diagnosis' => safe_post('prja_diagnosis'),
            'prja_gangguan_kognitif' => safe_post('prja_gangguan_kognitif'),
            'prja_faktor_lingkungan' => safe_post('prja_faktor_lingkungan'),
            'prja_respon_pembedahan' => safe_post('prja_pembedahan'),
            'prja_penggunaan_obat' => safe_post('prja_obat'),
            'prja_total' => safe_post('prja_jumlah_skor'),
            'prjd_riwayat_jatuh' => (safe_post('prjd_riwayat_jatuh') !== '' ? safe_post('prjd_riwayat_jatuh') : NULL),
            'prjd_diagnosis_sekunder' => (safe_post('prjd_diagnosis_sekunder') !== '' ? safe_post('prjd_diagnosis_sekunder') : NULL),
            'prjd_alat_bantu_jalan_1' => (safe_post('alat_bantu_jalan_1_ya') !== '' ? safe_post('alat_bantu_jalan_1_ya') : NULL),
            'prjd_alat_bantu_jalan_2' => (safe_post('alat_bantu_jalan_2_ya') !== '' ? safe_post('alat_bantu_jalan_2_ya') : NULL),
            'prjd_alat_bantu_jalan_3' => (safe_post('alat_bantu_jalan_3_ya') !== '' ? safe_post('alat_bantu_jalan_3_ya') : NULL),
            'prjd_terpasang_infus' => (safe_post('prjd_terpasang_infus') !== '' ? safe_post('prjd_terpasang_infus') : NULL),
            'prjd_cara_berjalan_1' => (safe_post('cara_berjalan_1_ya') !== '' ? safe_post('cara_berjalan_1_ya') : NULL),
            'prjd_cara_berjalan_2' => (safe_post('cara_berjalan_2_ya') !== '' ? safe_post('cara_berjalan_2_ya') : NULL),
            'prjd_cara_berjalan_3' => (safe_post('cara_berjalan_3_ya') !== '' ? safe_post('cara_berjalan_3_ya') : NULL),
            'prjd_status_mental_1' => (safe_post('status_mental_1_ya') !== '' ? safe_post('status_mental_1_ya') : NULL),
            'prjd_status_mental_2' => (safe_post('status_mental_2_ya') !== '' ? safe_post('status_mental_2_ya') : NULL),
            'prjd_total' => (safe_post('prjd_jumlah_skor') !== '' ? safe_post('prjd_jumlah_skor') : NULL),
            'prjl_riwayat_jatuh' => (safe_post('prjl_riwayat_jatuh') !== '' ? safe_post('prjl_riwayat_jatuh') : NULL),
            'prjl_riwayat_jatuh_opt' => (safe_post('prjl_riwayat_jatuh_opt') !== '' ? safe_post('prjl_riwayat_jatuh_opt') : NULL),
            'prjl_status_mental' => (safe_post('prjl_status_mental') !== '' ? safe_post('prjl_status_mental') : NULL),
            'prjl_status_mental_opt_1' => (safe_post('prjl_status_mental_opt_1') !== '' ? safe_post('prjl_status_mental_opt_1') : NULL),
            'prjl_status_mental_opt_2' => (safe_post('prjl_status_mental_opt_2') !== '' ? safe_post('prjl_status_mental_opt_2') : NULL),
            'prjl_penglihatan' => (safe_post('prjl_penglihatan') !== '' ? safe_post('prjl_penglihatan') : NULL),
            'prjl_penglihatan_opt_1' => (safe_post('prjl_penglihatan_opt_1') !== '' ? safe_post('prjl_penglihatan_opt_1') : NULL),
            'prjl_penglihatan_opt_2' => (safe_post('prjl_penglihatan_opt_2') !== '' ? safe_post('prjl_penglihatan_opt_2') : NULL),
            'prjl_berkemih' => (safe_post('prjl_berkemih') !== '' ? safe_post('prjl_berkemih') : NULL),
            'prjl_transfer' => (safe_post('prjl_transfer') !== '') ? safe_post('prjl_transfer') : NULL,
            'prjl_mobilitas' => (safe_post('prjl_mobilitas') !== '' ? safe_post('prjl_mobilitas') : NULL),
            'prjl_total' => (safe_post('prjl_jumlah') !== '' ? safe_post('prjl_jumlah') : NULL),
            'skala_nyeri' => safe_post('skala_nyeri_keperawatan'),
            'frekuensi_nyeri' => safe_post('frekuensi_nyeri_keperawatan'),
            'lama_nyeri' => safe_post('lama_nyeri_keperawatan'),
            'kualitas_nyeri' => safe_post('kualitas_nyeri_keperawatan'),
            'faktor_memperberat_nyeri' => safe_post('pemberat_nyeri_keperawatan'),
            'faktor_mengurangi_nyeri' => safe_post('pengurang_nyeri_keperawatan'),


            // BARU DI TAMBAH  PERBAIKAN WESA
            // TAMBAHAN WESAA
            'gcs_e' => safe_post('gcs_keperawatan_e'),
            'gcs_m' => safe_post('gcs_keperawatan_m'),
            'gcs_v' => safe_post('gcs_keperawatan_v'),
            'gcs_tottal' => safe_post('gcs_tottal'),
 

            'pernahdirawat' => json_encode([
                'pernahdirawat_1' => safe_post('pernahdirawat_1') !== '' ? safe_post('pernahdirawat_1') : null,
                'pernahdirawat_2' => safe_post('pernahdirawat_2') !== '' ? safe_post('pernahdirawat_2') : null,
                'pernahdirawat_3' => safe_post('pernahdirawat_3') !== '' ? safe_post('pernahdirawat_3') : null,
            ]),

            'pernahdioprasi' => json_encode([
                'pernahdioprasi_1' => safe_post('pernahdioprasi_1') !== '' ? safe_post('pernahdioprasi_1') : null,
                'pernahdioprasi_2' => safe_post('pernahdioprasi_2') !== '' ? safe_post('pernahdioprasi_2') : null,
                'pernahdioprasi_3' => safe_post('pernahdioprasi_3') !== '' ? safe_post('pernahdioprasi_3') : null,
            ]),

            'riwayatkesehatanZ' => json_encode([
                'riwayatkesehatanZ_1' => safe_post('riwayatkesehatanZ_1') !== '' ? safe_post('riwayatkesehatanZ_1') : null,
                'riwayatkesehatanZ_2' => safe_post('riwayatkesehatanZ_2') !== '' ? safe_post('riwayatkesehatanZ_2') : null,
                'riwayatkesehatanZ_3' => safe_post('riwayatkesehatanZ_3') !== '' ? safe_post('riwayatkesehatanZ_3') : null,
                'riwayatkesehatanZ_4' => safe_post('riwayatkesehatanZ_4') !== '' ? safe_post('riwayatkesehatanZ_4') : null,
                'riwayatkesehatanZ_5' => safe_post('riwayatkesehatanZ_5') !== '' ? safe_post('riwayatkesehatanZ_5') : null,
                'riwayatkesehatanZ_6' => safe_post('riwayatkesehatanZ_6') !== '' ? safe_post('riwayatkesehatanZ_6') : null,
                'riwayatkesehatanZ_7' => safe_post('riwayatkesehatanZ_7') !== '' ? safe_post('riwayatkesehatanZ_7') : null,
                'riwayatkesehatanZ_8' => safe_post('riwayatkesehatanZ_8') !== '' ? safe_post('riwayatkesehatanZ_8') : null,
                'riwayatkesehatanZ_9' => safe_post('riwayatkesehatanZ_9') !== '' ? safe_post('riwayatkesehatanZ_9') : null,
                'riwayatkesehatanZ_10' => safe_post('riwayatkesehatanZ_10') !== '' ? safe_post('riwayatkesehatanZ_10') : null,
                'riwayatkesehatanZ_11' => safe_post('riwayatkesehatanZ_11') !== '' ? safe_post('riwayatkesehatanZ_11') : null,
                'riwayatkesehatanZ_12' => safe_post('riwayatkesehatanZ_12') !== '' ? safe_post('riwayatkesehatanZ_12') : null,
            ]),

            'rpkimunisasi' => json_encode([
                'rpkimunisasi_1' => safe_post('rpkimunisasi_1') !== '' ? safe_post('rpkimunisasi_1') : null,
                'rpkimunisasi_2' => safe_post('rpkimunisasi_2') !== '' ? safe_post('rpkimunisasi_2') : null,
                'rpkimunisasi_3' => safe_post('rpkimunisasi_3') !== '' ? safe_post('rpkimunisasi_3') : null,
                'rpkimunisasi_4' => safe_post('rpkimunisasi_4') !== '' ? safe_post('rpkimunisasi_4') : null,
                'rpkimunisasi_5' => safe_post('rpkimunisasi_5') !== '' ? safe_post('rpkimunisasi_5') : null,
                'rpkimunisasi_6' => safe_post('rpkimunisasi_6') !== '' ? safe_post('rpkimunisasi_6') : null,
                'rpkimunisasi_7' => safe_post('rpkimunisasi_7') !== '' ? safe_post('rpkimunisasi_7') : null,
                'rpkimunisasi_8' => safe_post('rpkimunisasi_8') !== '' ? safe_post('rpkimunisasi_8') : null,
                'rpkimunisasi_9' => safe_post('rpkimunisasi_9') !== '' ? safe_post('rpkimunisasi_9') : null,
                'rpkimunisasi_10' => safe_post('rpkimunisasi_10') !== '' ? safe_post('rpkimunisasi_10') : null,
                'rpkimunisasi_11' => safe_post('rpkimunisasi_11') !== '' ? safe_post('rpkimunisasi_11') : null,
                'rpkimunisasi_12' => safe_post('rpkimunisasi_12') !== '' ? safe_post('rpkimunisasi_12') : null,
            ]),

            'personalsosial' => json_encode([
                'personalsosial_1' => safe_post('personalsosial_1') !== '' ? safe_post('personalsosial_1') : null,
                'personalsosial_2' => safe_post('personalsosial_2') !== '' ? safe_post('personalsosial_2') : null,
                'personalsosial_3' => safe_post('personalsosial_3') !== '' ? safe_post('personalsosial_3') : null,
                'personalsosial_4' => safe_post('personalsosial_4') !== '' ? safe_post('personalsosial_4') : null,
            ]),
            'motorikhalus' => json_encode([
                'motorikhalus_1' => safe_post('motorikhalus_1') !== '' ? safe_post('motorikhalus_1') : null,
                'motorikhalus_2' => safe_post('motorikhalus_2') !== '' ? safe_post('motorikhalus_2') : null,
                'motorikhalus_3' => safe_post('motorikhalus_3') !== '' ? safe_post('motorikhalus_3') : null,
                'motorikhalus_4' => safe_post('motorikhalus_4') !== '' ? safe_post('motorikhalus_4') : null,
            ]),
            'motorikkasar' => json_encode([
                'motorikkasar_1' => safe_post('motorikkasar_1') !== '' ? safe_post('motorikkasar_1') : null,
                'motorikkasar_2' => safe_post('motorikkasar_2') !== '' ? safe_post('motorikkasar_2') : null,
                'motorikkasar_3' => safe_post('motorikkasar_3') !== '' ? safe_post('motorikkasar_3') : null,
                'motorikkasar_4' => safe_post('motorikkasar_4') !== '' ? safe_post('motorikkasar_4') : null,
            ]),
            'bahasaP' => json_encode([
                'bahasaP_1' => safe_post('bahasaP_1') !== '' ? safe_post('bahasaP_1') : null,
                'bahasaP_2' => safe_post('bahasaP_2') !== '' ? safe_post('bahasaP_2') : null,
                'bahasaP_3' => safe_post('bahasaP_3') !== '' ? safe_post('bahasaP_3') : null,
                'bahasaP_4' => safe_post('bahasaP_4') !== '' ? safe_post('bahasaP_4') : null,
            ]),
            'bahasaQ' => json_encode([
                'bahasaQ_1' => safe_post('bahasaQ_1') !== '' ? safe_post('bahasaQ_1') : null,
                'bahasaQ_2' => safe_post('bahasaQ_2') !== '' ? safe_post('bahasaQ_2') : null,
                'bahasaQ_3' => safe_post('bahasaQ_3') !== '' ? safe_post('bahasaQ_3') : null,
                'bahasaQ_4' => safe_post('bahasaQ_4') !== '' ? safe_post('bahasaQ_4') : null,
            ]),

            'saturasiTM' => safe_post('saturasiTM'),

            'retraksidada' => json_encode([
                'retraksidada_1' => safe_post('retraksidada_1') !== '' ? safe_post('retraksidada_1') : null,
                'retraksidada_2' => safe_post('retraksidada_2') !== '' ? safe_post('retraksidada_2') : null,
                'retraksidada_3' => safe_post('retraksidada_3') !== '' ? safe_post('retraksidada_3') : null,
                'retraksidada_4' => safe_post('retraksidada_4') !== '' ? safe_post('retraksidada_4') : null,
                'retraksidada_5' => safe_post('retraksidada_5') !== '' ? safe_post('retraksidada_5') : null,
                'retraksidada_6' => safe_post('retraksidada_6') !== '' ? safe_post('retraksidada_6') : null,
                'retraksidada_7' => safe_post('retraksidada_7') !== '' ? safe_post('retraksidada_7') : null,
                'retraksidada_8' => safe_post('retraksidada_8') !== '' ? safe_post('retraksidada_8') : null,
                'retraksidada_9' => safe_post('retraksidada_9') !== '' ? safe_post('retraksidada_9') : null,
                'retraksidada_10' => safe_post('retraksidada_10') !== '' ? safe_post('retraksidada_10') : null,
            ]),

            'aktifikasaktif' => json_encode([
                'aktifikasaktif_1' => safe_post('aktifikasaktif_1') !== '' ? safe_post('aktifikasaktif_1') : null,
                'aktifikasaktif_2' => safe_post('aktifikasaktif_2') !== '' ? safe_post('aktifikasaktif_2') : null,
                'aktifikasaktif_3' => safe_post('aktifikasaktif_3') !== '' ? safe_post('aktifikasaktif_3') : null,
                'aktifikasaktif_4' => safe_post('aktifikasaktif_4') !== '' ? safe_post('aktifikasaktif_4') : null,
            ]),

            'sistemsaraf' => json_encode([
                'sistemsaraf_1' => safe_post('sistemsaraf_1') !== '' ? safe_post('sistemsaraf_1') : null,
                'sistemsaraf_2' => safe_post('sistemsaraf_2') !== '' ? safe_post('sistemsaraf_2') : null,
                'sistemsaraf_3' => safe_post('sistemsaraf_3') !== '' ? safe_post('sistemsaraf_3') : null,
                'sistemsaraf_4' => safe_post('sistemsaraf_4') !== '' ? safe_post('sistemsaraf_4') : null,
                'sistemsaraf_5' => safe_post('sistemsaraf_5') !== '' ? safe_post('sistemsaraf_5') : null,
                'sistemsaraf_6' => safe_post('sistemsaraf_6') !== '' ? safe_post('sistemsaraf_6') : null,
                'sistemsaraf_7' => safe_post('sistemsaraf_7') !== '' ? safe_post('sistemsaraf_7') : null,
                // 'sistemsaraf_8' => safe_post('sistemsaraf_8') !== '' ? safe_post('sistemsaraf_8') : null,
                'sistemsaraf_9' => safe_post('sistemsaraf_9') !== '' ? safe_post('sistemsaraf_9') : null,
                'sistemsaraf_10' => safe_post('sistemsaraf_10') !== '' ? safe_post('sistemsaraf_10') : null,
                'sistemsaraf_11' => safe_post('sistemsaraf_11') !== '' ? safe_post('sistemsaraf_11') : null,
            ]),

            'hambatanlain' => json_encode([
                'hambatanlain_1' => safe_post('hambatanlain_1') !== '' ? safe_post('hambatanlain_1') : null,
                'hambatanlain_2' => safe_post('hambatanlain_2') !== '' ? safe_post('hambatanlain_2') : null,
                'hambatanlain_3' => safe_post('hambatanlain_3') !== '' ? safe_post('hambatanlain_3') : null,
                'hambatanlain_4' => safe_post('hambatanlain_4') !== '' ? safe_post('hambatanlain_4') : null,
                'hambatanlain_5' => safe_post('hambatanlain_5') !== '' ? safe_post('hambatanlain_5') : null,
                'hambatanlain_6' => safe_post('hambatanlain_6') !== '' ? safe_post('hambatanlain_6') : null,
                'hambatanlain_7' => safe_post('hambatanlain_7') !== '' ? safe_post('hambatanlain_7') : null,
                'hambatanlain_8' => safe_post('hambatanlain_8') !== '' ? safe_post('hambatanlain_8') : null,
                'hambatanlain_9' => safe_post('hambatanlain_9') !== '' ? safe_post('hambatanlain_9') : null,
                'hambatanlain_10' => safe_post('hambatanlain_10') !== '' ? safe_post('hambatanlain_10') : null,
            ]),

            'pekerjaaanes' => json_encode([
                'pekerjaaanes_1' => safe_post('pekerjaaanes_1') !== '' ? safe_post('pekerjaaanes_1') : null,
                'pekerjaaanes_2' => safe_post('pekerjaaanes_2') !== '' ? safe_post('pekerjaaanes_2') : null,
                'pekerjaaanes_3' => safe_post('pekerjaaanes_3') !== '' ? safe_post('pekerjaaanes_3') : null,
                'pekerjaaanes_4' => safe_post('pekerjaaanes_4') !== '' ? safe_post('pekerjaaanes_4') : null,
                'pekerjaaanes_5' => safe_post('pekerjaaanes_5') !== '' ? safe_post('pekerjaaanes_5') : null,
            ]),

            'carapembayaran' => json_encode([
                'carapembayaran_1' => safe_post('carapembayaran_1') !== '' ? safe_post('carapembayaran_1') : null,
                'carapembayaran_2' => safe_post('carapembayaran_2') !== '' ? safe_post('carapembayaran_2') : null,
                'carapembayaran_3' => safe_post('carapembayaran_3') !== '' ? safe_post('carapembayaran_3') : null,
                'carapembayaran_4' => safe_post('carapembayaran_4') !== '' ? safe_post('carapembayaran_4') : null,
                'carapembayaran_5' => safe_post('carapembayaran_5') !== '' ? safe_post('carapembayaran_5') : null,
                'carapembayaran_6' => safe_post('carapembayaran_6') !== '' ? safe_post('carapembayaran_6') : null,
            ]),

            'pengasuh' => json_encode([
                'pengasuh_1' => safe_post('pengasuh_1') !== '' ? safe_post('pengasuh_1') : null,
                'pengasuh_2' => safe_post('pengasuh_2') !== '' ? safe_post('pengasuh_2') : null,
                'pengasuh_3' => safe_post('pengasuh_3') !== '' ? safe_post('pengasuh_3') : null,
                'pengasuh_4' => safe_post('pengasuh_4') !== '' ? safe_post('pengasuh_4') : null,
                'pengasuh_5' => safe_post('pengasuh_5') !== '' ? safe_post('pengasuh_5') : null,
            ]),

            'dukungan' => json_encode([
                'dukungan_1' => safe_post('dukungan_1') !== '' ? safe_post('dukungan_1') : null,
                'dukungan_2' => safe_post('dukungan_2') !== '' ? safe_post('dukungan_2') : null,
            ]),

            'sew_laju_respirasi'    => safe_post('respirasinews'),
            'sew_saturasi'          => safe_post('spskala'),
            'sew_suplemen'          => safe_post('spskalappok'),
            'sew_temperatur'        => safe_post('suplement'),
            'sew_tds'               => safe_post('tdssistolik'),
            'sew_laju_jantung'      => safe_post('nadiws'),
            'sew_kesadaran'         => safe_post('kesadaranws'),
            'suhunews'              => safe_post('suhunews'),
            'total_skalanews'       => safe_post('total_skalanews'),

            'pews_suhu'             => safe_post('suhupews'),
            'pews_pernafasan'       => safe_post('pernafasanpews'),
            'pews_subpernafasan'    => safe_post('tidakretraksipews'),
            'pews_alat_bantu'       => safe_post('alatbantupews'),
            'pews_saturasi'         => safe_post('saturasipewas'),
            'pews_nadi'             => safe_post('nadipews'),
            'pews_warna_kulit'      => safe_post('warnakulitpews'),
            'pews_tds'              => safe_post('tdspews'),
            'pews_kesadaran'        => safe_post('kesadaranpews'),
            'pews_total'            => safe_post('total_skalapews'),

            'neuro'            => safe_post('neuro'),
            'nadiq'            => safe_post('nadiq'),
            'respirasq'        => safe_post('respirasq'),
            'warnaulit'        => safe_post('warnaulit'),
            'suhuq'            => safe_post('suhuq'),
            'merintihq'        => safe_post('merintihq'),
            'total_calsneuk'     => safe_post('total_calsneuk'),
            // 'hijau'            => safe_post('hijau'),
            // 'kuning'           => safe_post('kuning'),
            // 'merah'            => safe_post('merah'),    
            
            'lainop' => json_encode([
                'lainop_1' => safe_post('lainop_1') !== '' ? safe_post('lainop_1') : null,
                'lainop_2' => safe_post('lainop_2') !== '' ? safe_post('lainop_2') : null,
            ]),
            
            //  THE END

            'kegiatan_keagamaan' => safe_post('kegiatan_keagamaan'),
            'wajib_ibadah' => safe_post('wajib_ibadah'),
            'ket_halangan' => safe_post('wajib_ibadah_halangan_input'),
            'thaharoh' => safe_post('thaharoh'),
            'sholat' => safe_post('sholat'),
            'status_nutrisi' => json_encode([
                'penurunan_bb' => safe_post('penurunan_bb'),
                'ket_penurunan_bb' => safe_post('ket_penurunan_bb')
            ]),
            'status_fungsional' => json_encode([
                'mandiri' => safe_post('sf_mandiri'),
                'perlu_bantuan' => safe_post('sf_perlu_bantuan'),
                'ketergantungan' => safe_post('sf_ketergantungan'),
                'ket_ketergantungan' => safe_post('ket_sf_ketergantungan'),
            ]),
            'masalah_keperawatan' => json_encode(array(
                'ket_1' => safe_post('masalah_keperawatan_1'),
                'ket_2' => safe_post('masalah_keperawatan_2'),
                'ket_3' => safe_post('masalah_keperawatan_3'),
                'ket_4' => safe_post('masalah_keperawatan_4'),
                'ket_5' => safe_post('masalah_keperawatan_5'),
                'ket_6' => safe_post('masalah_keperawatan_6'),
                'ket_7' => safe_post('masalah_keperawatan_7'),
                'ket_8' => safe_post('masalah_keperawatan_8'),
                'ket_9' => safe_post('masalah_keperawatan_9'),
                'ket_10' => safe_post('masalah_keperawatan_10'),
                'ket_11' => safe_post('masalah_keperawatan_11'),
                'ket_12' => safe_post('masalah_keperawatan_12'),
                'ket_13' => safe_post('masalah_keperawatan_13'),
                'ket_14' => safe_post('masalah_keperawatan_14'),
                'ket_15' => safe_post('masalah_keperawatan_15'),
                'ket_16' => safe_post('masalah_keperawatan_16'),
                'ket_17' => safe_post('masalah_keperawatan_17'),
                'ket_18' => safe_post('masalah_keperawatan_18'),
                'ket_19' => safe_post('masalah_keperawatan_19'),
                'ket_20' => safe_post('masalah_keperawatan_20'),
                'ket_21' => safe_post('masalah_keperawatan_21'),
                'ket_22' => safe_post('masalah_keperawatan_22'),
                'ket_23' => safe_post('masalah_keperawatan_23'),
                'ket_24' => safe_post('masalah_keperawatan_24'),
                'ket_25' => safe_post('masalah_keperawatan_25'),
                'ket_26' => safe_post('masalah_keperawatan_26'),
                'ket_27' => safe_post('masalah_keperawatan_27'),
                'ket_28' => safe_post('masalah_keperawatan_28'),
                'ket_29' => safe_post('masalah_keperawatan_29'),
                'ket_30' => safe_post('masalah_keperawatan_30'),
                'ket_lain' => safe_post('masalah_keperawatan_lain_input'),
                'ket_31' => safe_post('masalah_keperawatan_31'),
                'ket_32' => safe_post('masalah_keperawatan_32'),
                'ket_33' => safe_post('masalah_keperawatan_33'),
                'ket_34' => safe_post('masalah_keperawatan_34'),
            )),
            'id_perawat_igd' => (safe_post('perawat_igd') !== '' ? safe_post('perawat_igd') : NULL),
            'id_dokter_dpjp' => (safe_post('verifikasi_dpjp_2') !== '' ? safe_post('verifikasi_dpjp_2') : NULL),
            'signature_perawat_igd' => safe_post('ttd_perawat_igdGDG') !== '' ? safe_post('ttd_perawat_igdGDG') : NULL,
            'signature_dokter_dpjp' => safe_post('ttd_verifikasi_dpjp_2') !== '' ? safe_post('ttd_verifikasi_dpjp_2') : NULL,
        ];
        $get_signature_keperawatan = $this->m_pemeriksaan_igd->getDataSignatureKajianKeperawatan($data_keperawatan['id_layanan_pendaftaran']);
        if ($get_signature_keperawatan !== NULL) :
            if ($get_signature_keperawatan->signature_perawat_igd !== NULL) :
                $data_keperawatan['signature_perawat_igd'] = $get_signature_keperawatan->signature_perawat_igd;
            endif;
        else :
            $data_keperawatan['signature_perawat_igd'] = (safe_post('ttd_perawat_igdGDG') !== '' ? safe_post('ttd_perawat_igdGDG') : NULL);
        endif;

        if ($get_signature_keperawatan !== NULL) :
            if ($get_signature_keperawatan->signature_dokter_dpjp !== NULL) :
                $data_keperawatan['signature_dokter_dpjp'] = $get_signature_keperawatan->signature_dokter_dpjp;
            endif;
        else :
            $data_keperawatan['signature_dokter_dpjp'] = (safe_post('ttd_verifikasi_dpjp_2') !== '' ? safe_post('ttd_verifikasi_dpjp_2') : NULL);
        endif;




        // WH2
        $data_triase_igd = [
            'id_layanan_pendaftaran' => safe_post('id_layanan_pendaftaran'),
            'waktu_igd' => datetime2mysql($this->post('waktu_kajian_igd')),
            // CARA DATANG PASIEN
            'cara_datang_pasien_igd' => json_encode([
                'cara_datang_pasien_igd_1' => safe_post('cara_datang_pasien_igd_1') !== '' ? safe_post('cara_datang_pasien_igd_1') : null,
                'cara_datang_pasien_igd_2' => safe_post('cara_datang_pasien_igd_2') !== '' ? safe_post('cara_datang_pasien_igd_2') : null,
                'cara_datang_pasien_igd_3' => safe_post('cara_datang_pasien_igd_3') !== '' ? safe_post('cara_datang_pasien_igd_3') : null,
                'cara_datang_pasien_igd_4' => safe_post('cara_datang_pasien_igd_4') !== '' ? safe_post('cara_datang_pasien_igd_4') : null,
                'cara_datang_pasien_igd_5' => safe_post('cara_datang_pasien_igd_5') !== '' ? safe_post('cara_datang_pasien_igd_5') : null,
                'cara_datang_pasien_igd_6' => safe_post('cara_datang_pasien_igd_6') !== '' ? safe_post('cara_datang_pasien_igd_6') : null,
                'cara_datang_pasien_igd_7' => safe_post('cara_datang_pasien_igd_7') !== '' ? safe_post('cara_datang_pasien_igd_7') : null,
                'cara_datang_pasien_igd_8' => safe_post('cara_datang_pasien_igd_8') !== '' ? safe_post('cara_datang_pasien_igd_8') : null,
                'cara_datang_pasien_igd_9' => safe_post('cara_datang_pasien_igd_9') !== '' ? safe_post('cara_datang_pasien_igd_9') : null,
                'cara_datang_pasien_igd_10' => safe_post('cara_datang_pasien_igd_10') !== '' ? safe_post('cara_datang_pasien_igd_10') : null,
                'cara_datang_pasien_igd_11' => safe_post('cara_datang_pasien_igd_11') !== '' ? safe_post('cara_datang_pasien_igd_11') : null,
                'cara_datang_pasien_igd_12' => safe_post('cara_datang_pasien_igd_12') !== '' ? safe_post('cara_datang_pasien_igd_12') : null,
            ]),

            // KESADARAN
            'kesadaran_igd' => json_encode([
                'kesadaran_igd_1' => safe_post('kesadaran_igd_1') !== '' ? safe_post('kesadaran_igd_1') : null,
                'kesadaran_igd_2' => safe_post('kesadaran_igd_2') !== '' ? safe_post('kesadaran_igd_2') : null,
                'kesadaran_igd_3' => safe_post('kesadaran_igd_3') !== '' ? safe_post('kesadaran_igd_3') : null,
                'kesadaran_igd_4' => safe_post('kesadaran_igd_4') !== '' ? safe_post('kesadaran_igd_4') : null,
                'kesadaran_igd_5' => safe_post('kesadaran_igd_5') !== '' ? safe_post('kesadaran_igd_5') : null,
            ]),

            // G,C,S,T
            'gcs_e_igd' => safe_post('gcs_e_igd') !== '' ? safe_post('gcs_e_igd') : NULL,
            'gcs_m_igd' => safe_post('gcs_m_igd') !== '' ? safe_post('gcs_m_igd') : NULL,
            'gcs_v_igd' => safe_post('gcs_v_igd') !== '' ? safe_post('gcs_v_igd') : NULL,
            'gcs_total_igd' => safe_post('gcs_total_igd') !== '' ? safe_post('gcs_total_igd') : NULL,

            // TEKANAN DARAH
            'tekanan_darah_igd' => json_encode([
                'tekanan_darah_igd_1' => safe_post('tekanan_darah_igd_1') !== '' ? safe_post('tekanan_darah_igd_1') : null,
                'tekanan_darah_igd_2' => safe_post('tekanan_darah_igd_2') !== '' ? safe_post('tekanan_darah_igd_2') : null,
                'tekanan_darah_igd_3' => safe_post('tekanan_darah_igd_3') !== '' ? safe_post('tekanan_darah_igd_3') : null,
            ]),

            // FREKUENSI NADI
            'frekuensi_nadi_igd' => json_encode([
                'frekuensi_igd_1' => safe_post('frekuensi_igd_1') !== '' ? safe_post('frekuensi_igd_1') : null,
                'frekuensi_igd_2' => safe_post('frekuensi_igd_2') !== '' ? safe_post('frekuensi_igd_2') : null,
            ]),

            // TINGGI BADAN
            'tinggi_badan_igd' => json_encode([
                'tinggi_badan_igd_1' => safe_post('tinggi_badan_igd_1') !== '' ? safe_post('tinggi_badan_igd_1') : null,
                'tinggi_badan_igd_2' => safe_post('tinggi_badan_igd_2') !== '' ? safe_post('tinggi_badan_igd_2') : null,
            ]),

            // S02
            's_o2' => json_encode([
                'imunisasi_igd_1' => safe_post('imunisasi_igd_1') !== '' ? safe_post('imunisasi_igd_1') : null,
                'imunisasi_igd_2' => safe_post('imunisasi_igd_2') !== '' ? safe_post('imunisasi_igd_2') : null,
                'imunisasi_igd_3' => safe_post('imunisasi_igd_3') !== '' ? safe_post('imunisasi_igd_3') : null,
            ]),

            // JALAAN NAFAS
            'jalan_nafas_igd' => json_encode([
                'jalan_nafas_igd_1' => safe_post('jalan_nafas_igd_1') !== '' ? safe_post('jalan_nafas_igd_1') : null,
                'jalan_nafas_igd_2' => safe_post('jalan_nafas_igd_2') !== '' ? safe_post('jalan_nafas_igd_2') : null,
                'jalan_nafas_igd_3' => safe_post('jalan_nafas_igd_3') !== '' ? safe_post('jalan_nafas_igd_3') : null,
                'jalan_nafas_igd_4' => safe_post('jalan_nafas_igd_4') !== '' ? safe_post('jalan_nafas_igd_4') : null,
                'jalan_nafas_igd_5' => safe_post('jalan_nafas_igd_5') !== '' ? safe_post('jalan_nafas_igd_5') : null,
                'jalan_nafas_igd_6' => safe_post('jalan_nafas_igd_6') !== '' ? safe_post('jalan_nafas_igd_6') : null,
            ]),

            // PERNAFASAN
            'pernafasan_igd' => json_encode([
                'pernafasan_igd_1' => safe_post('pernafasan_igd_1') !== '' ? safe_post('pernafasan_igd_1') : null,
                'pernafasan_igd_2' => safe_post('pernafasan_igd_2') !== '' ? safe_post('pernafasan_igd_2') : null,
                'pernafasan_igd_3' => safe_post('pernafasan_igd_3') !== '' ? safe_post('pernafasan_igd_3') : null,
                'pernafasan_igd_4' => safe_post('pernafasan_igd_4') !== '' ? safe_post('pernafasan_igd_4') : null,
                'pernafasan_igd_5' => safe_post('pernafasan_igd_5') !== '' ? safe_post('pernafasan_igd_5') : null,
                'pernafasan_igd_6' => safe_post('pernafasan_igd_6') !== '' ? safe_post('pernafasan_igd_6') : null,
                'pernafasan_igd_7' => safe_post('pernafasan_igd_7') !== '' ? safe_post('pernafasan_igd_7') : null,
                'pernafasan_igd_8' => safe_post('pernafasan_igd_8') !== '' ? safe_post('pernafasan_igd_8') : null,
            ]),

            // SIRKULASI
            'sirkulasi_igd' => json_encode([
                'sirkulasi_igd_1' => safe_post('sirkulasi_igd_1') !== '' ? safe_post('sirkulasi_igd_1') : null,
                'sirkulasi_igd_2' => safe_post('sirkulasi_igd_2') !== '' ? safe_post('sirkulasi_igd_2') : null,
                'sirkulasi_igd_3' => safe_post('sirkulasi_igd_3') !== '' ? safe_post('sirkulasi_igd_3') : null,
                'sirkulasi_igd_4' => safe_post('sirkulasi_igd_4') !== '' ? safe_post('sirkulasi_igd_4') : null,
                'sirkulasi_igd_5' => safe_post('sirkulasi_igd_5') !== '' ? safe_post('sirkulasi_igd_5') : null,
                'sirkulasi_igd_6' => safe_post('sirkulasi_igd_6') !== '' ? safe_post('sirkulasi_igd_6') : null,
                'sirkulasi_igd_7' => safe_post('sirkulasi_igd_7') !== '' ? safe_post('sirkulasi_igd_7') : null,
                'sirkulasi_igd_8' => safe_post('sirkulasi_igd_8') !== '' ? safe_post('sirkulasi_igd_8') : null,
                'sirkulasi_igd_9' => safe_post('sirkulasi_igd_9') !== '' ? safe_post('sirkulasi_igd_9') : null,
                'sirkulasi_igd_10' => safe_post('sirkulasi_igd_10') !== '' ? safe_post('sirkulasi_igd_10') : null,
                'sirkulasi_igd_11' => safe_post('sirkulasi_igd_11') !== '' ? safe_post('sirkulasi_igd_11') : null,
                'sirkulasi_igd_12' => safe_post('sirkulasi_igd_12') !== '' ? safe_post('sirkulasi_igd_12') : null,
                'sirkulasi_igd_13' => safe_post('sirkulasi_igd_13') !== '' ? safe_post('sirkulasi_igd_13') : null,
                'sirkulasi_igd_14' => safe_post('sirkulasi_igd_14') !== '' ? safe_post('sirkulasi_igd_14') : null,
                'sirkulasi_igd_15' => safe_post('sirkulasi_igd_15') !== '' ? safe_post('sirkulasi_igd_15') : null,
                'sirkulasi_igd_16' => safe_post('sirkulasi_igd_16') !== '' ? safe_post('sirkulasi_igd_16') : null,
                'sirkulasi_igd_17' => safe_post('sirkulasi_igd_17') !== '' ? safe_post('sirkulasi_igd_17') : null,
                'sirkulasi_igd_18' => safe_post('sirkulasi_igd_18') !== '' ? safe_post('sirkulasi_igd_18') : null,
                'sirkulasi_igd_19' => safe_post('sirkulasi_igd_19') !== '' ? safe_post('sirkulasi_igd_19') : null,
                'sirkulasi_igd_20' => safe_post('sirkulasi_igd_20') !== '' ? safe_post('sirkulasi_igd_20') : null,
                'sirkulasi_igd_21' => safe_post('sirkulasi_igd_21') !== '' ? safe_post('sirkulasi_igd_21') : null,
            ]),

            // KESADARAN
            'kesadaran_igd_w' => json_encode([
                'kesadaran_igdd_1' => safe_post('kesadaran_igdd_1') !== '' ? safe_post('kesadaran_igdd_1') : null,
                'kesadaran_igdd_2' => safe_post('kesadaran_igdd_2') !== '' ? safe_post('kesadaran_igdd_2') : null,
                'kesadaran_igdd_3' => safe_post('kesadaran_igdd_3') !== '' ? safe_post('kesadaran_igdd_3') : null,
                'kesadaran_igdd_4' => safe_post('kesadaran_igdd_4') !== '' ? safe_post('kesadaran_igdd_4') : null,
                'kesadaran_igdd_5' => safe_post('kesadaran_igdd_5') !== '' ? safe_post('kesadaran_igdd_5') : null,
                'kesadaran_igdd_6' => safe_post('kesadaran_igdd_6') !== '' ? safe_post('kesadaran_igdd_6') : null,
                'kesadaran_igdd_7' => safe_post('kesadaran_igdd_7') !== '' ? safe_post('kesadaran_igdd_7') : null,
                'kesadaran_igdd_8' => safe_post('kesadaran_igdd_8') !== '' ? safe_post('kesadaran_igdd_8') : null,
                'kesadaran_igdd_9' => safe_post('kesadaran_igdd_9') !== '' ? safe_post('kesadaran_igdd_9') : null,
                'kesadaran_igdd_10' => safe_post('kesadaran_igdd_10') !== '' ? safe_post('kesadaran_igdd_10') : null,
                'kesadaran_igdd_11' => safe_post('kesadaran_igdd_11') !== '' ? safe_post('kesadaran_igdd_11') : null,
                'kesadaran_igdd_12' => safe_post('kesadaran_igdd_12') !== '' ? safe_post('kesadaran_igdd_12') : null,
                'kesadaran_igdd_13' => safe_post('kesadaran_igdd_13') !== '' ? safe_post('kesadaran_igdd_13') : null,
                'kesadaran_igdd_14' => safe_post('kesadaran_igdd_14') !== '' ? safe_post('kesadaran_igdd_14') : null,
                'kesadaran_igdd_15' => safe_post('kesadaran_igdd_15') !== '' ? safe_post('kesadaran_igdd_15') : null,
            ]),

            // PEMERIKSAAN ANAK
            // 'pernafasan_igd_w' => (safe_post('nilai_pa_pernafasan') !== '' ? safe_post('nilai_pa_pernafasan') : NULL),
            // 'sirkulasi_igd_w' => (safe_post('nilai_pa_sirkulasi') !== '' ? safe_post('nilai_pa_sirkulasi') : NULL),
            // 'kesadaran_igd_3' => (safe_post('nilai_pa_kesadaran') !== '' ? safe_post('nilai_pa_kesadaran') : NULL),
            // 'pa_jumlah_skor' => (safe_post('total_nilai_pa') !== '' ? safe_post('total_nilai_pa') : NULL),

            // PDA
            // 'pernafasan_igd_w' => (safe_post('pa_pernafasan') !== '' ? safe_post('pa_pernafasan') : NULL),
            // 'sirkulasi_igd_w' => (safe_post('pa_sirkulasi') !== '' ? safe_post('pa_sirkulasi') : NULL),
            // 'kesadaran_igd_3' => (safe_post('pa_kesadaran') !== '' ? safe_post('pa_kesadaran') : NULL),
            // 'pa_jumlah_skor' => (safe_post('total_nilai_pa') !== '' ? safe_post('total_nilai_pa') : NULL),

            //  ASESMENT TRIAGE
            'asesment_triage_igd' => json_encode([
                'asesment_triage_1' => safe_post('asesment_triage_1') !== '' ? safe_post('asesment_triage_1') : null,
                'asesment_triage_2' => safe_post('asesment_triage_2') !== '' ? safe_post('asesment_triage_2') : null,
                'asesment_triage_3' => safe_post('asesment_triage_3') !== '' ? safe_post('asesment_triage_3') : null,
                'asesment_triage_4' => safe_post('asesment_triage_4') !== '' ? safe_post('asesment_triage_4') : null,
                'asesment_triage_5' => safe_post('asesment_triage_5') !== '' ? safe_post('asesment_triage_5') : null,
                'asesment_triage_6' => safe_post('asesment_triage_6') !== '' ? safe_post('asesment_triage_6') : null,
                'asesment_triage_7' => safe_post('asesment_triage_7') !== '' ? safe_post('asesment_triage_7') : null,
                'asesment_triage_8' => safe_post('asesment_triage_8') !== '' ? safe_post('asesment_triage_8') : null,
                'asesment_triage_9' => safe_post('asesment_triage_9') !== '' ? safe_post('asesment_triage_9') : null,
                'asesment_triage_10' => safe_post('asesment_triage_10') !== '' ? safe_post('asesment_triage_10') : null,
            ]),

            //  TINDAK LAMJUT
            'tindak_lanjut_igd' => json_encode([
                'tindak_lanjut_1' => safe_post('tindak_lanjut_1') !== '' ? safe_post('tindak_lanjut_1') : null,
                'tindak_lanjut_2' => safe_post('tindak_lanjut_2') !== '' ? safe_post('tindak_lanjut_2') : null,
                'tindak_lanjut_3' => safe_post('tindak_lanjut_3') !== '' ? safe_post('tindak_lanjut_3') : null,
                'tindak_lanjut_4' => safe_post('tindak_lanjut_4') !== '' ? safe_post('tindak_lanjut_4') : null,
            ]),

            // TGL / TTD / NAMA PERAWAT OR DOKTEER
            'id_perawatt_igd' => safe_post('pk_perawat_igd') !== '' ? safe_post('pk_perawat_igd') : NULL,
            'id_dokterr_igd' => safe_post('pk_dokter_igd') !== '' ? safe_post('pk_dokter_igd') : NULL,
            'tgl_jam_perawat' => (safe_post('tanggal_perawat_igd') !== '' ? datetime2mysql(safe_post('tanggal_perawat_igd')) : NULL),
            // 'tgl_jam_dokter' => (safe_post('tanggal_dokter_igd') !== '' ? datetime2mysql(safe_post('tanggal_dokter_igd')) : NULL),
            'ttd_perawat_igd' => safe_post('ttd_perawat_igd') !== '' ? safe_post('ttd_perawat_igd') : NULL,
            'ttd_dokter_igd' => safe_post('ttd_dokter_dpjp_igd') !== '' ? safe_post('ttd_dokter_dpjp_igd') : NULL,

            'tampilan_saga_1' => safe_post('tampilan_saga_1') !== '' ? safe_post('tampilan_saga_1') : NULL,
            'tampilan_saga_2' => safe_post('tampilan_saga_2') !== '' ? safe_post('tampilan_saga_2') : NULL,
            'tampilan_saga_3' => safe_post('tampilan_saga_3') !== '' ? safe_post('tampilan_saga_3') : NULL,
            'tampilan_saga_4' => safe_post('tampilan_saga_4') !== '' ? safe_post('tampilan_saga_4') : NULL,
            'tampilan_saga_5' => safe_post('tampilan_saga_5') !== '' ? safe_post('tampilan_saga_5') : NULL,
            'usaha_saga_1' => safe_post('usaha_saga_1') !== '' ? safe_post('usaha_saga_1') : NULL,
            'usaha_saga_2' => safe_post('usaha_saga_2') !== '' ? safe_post('usaha_saga_2') : NULL,
            'usaha_saga_3' => safe_post('usaha_saga_3') !== '' ? safe_post('usaha_saga_3') : NULL,
            'usaha_saga_4' => safe_post('usaha_saga_4') !== '' ? safe_post('usaha_saga_4') : NULL,
            'sirkulasi_saga_1' => safe_post('sirkulasi_saga_1') !== '' ? safe_post('sirkulasi_saga_1') : NULL,
            'sirkulasi_saga_2' => safe_post('sirkulasi_saga_2') !== '' ? safe_post('sirkulasi_saga_2') : NULL,
            'sirkulasi_saga_3' => safe_post('sirkulasi_saga_3') !== '' ? safe_post('sirkulasi_saga_3') : NULL,
            'gambarsaga_1' => safe_post('gambarsaga_1') !== '' ? safe_post('gambarsaga_1') : NULL,
            'gambarsaga_2' => safe_post('gambarsaga_2') !== '' ? safe_post('gambarsaga_2') : NULL,
            'gambarsaga_3' => safe_post('gambarsaga_3') !== '' ? safe_post('gambarsaga_3') : NULL,
            'gambarsaga_4' => safe_post('gambarsaga_4') !== '' ? safe_post('gambarsaga_4') : NULL,
            'gambarsaga_5' => safe_post('gambarsaga_5') !== '' ? safe_post('gambarsaga_5') : NULL,
            'gambarsaga_6' => safe_post('gambarsaga_6') !== '' ? safe_post('gambarsaga_6') : NULL,

        
        ];
        $get_triase_igd = $this->m_pemeriksaan_igd->getDataTriaseIgd($data_triase_igd['id_layanan_pendaftaran']);
        if ($get_triase_igd !== NULL) :
            if ($get_triase_igd->ttd_perawat_igd !== NULL) :
                $data_triase_igd['ttd_perawat_igd'] = $get_triase_igd->ttd_perawat_igd;
            endif;
        else :
            $data_triase_igd['ttd_perawat_igd'] = (safe_post('ttd_perawat_igd') !== '' ? safe_post('ttd_perawat_igd') : NULL);
        endif;

        if ($get_triase_igd !== NULL) :
            if ($get_triase_igd->ttd_dokter_igd !== NULL) :
                $data_triase_igd['ttd_dokter_igd'] = $get_triase_igd->ttd_dokter_igd;
            endif;
        else :
            $data_triase_igd['ttd_dokter_igd'] = (safe_post('ttd_dokter_dpjp_igd') !== '' ? safe_post('ttd_dokter_dpjp_igd') : NULL);
        endif;


        // PIM
        $pm_waktu_kajian = $this->post('pm_waktu_kajian', true);
		if ($pm_waktu_kajian !== '') {
			$pm_waktu_kajian = str_replace('/', '-', $pm_waktu_kajian);
			$pm_waktu_kajian = date('Y-m-d H:i', strtotime($pm_waktu_kajian));
        }
        $pm_waktu_bidan = $this->post('pm_waktu_bidan', true);
		if ($pm_waktu_bidan !== '') {
			$pm_waktu_bidan = str_replace('/', '-', $pm_waktu_bidan);
			$pm_waktu_bidan = date('Y-m-d H:i', strtotime($pm_waktu_bidan));
		}
        $pm_waktu_dpjp = $this->post('pm_waktu_dpjp', true);
		if ($pm_waktu_dpjp !== '') {
			$pm_waktu_dpjp = str_replace('/', '-', $pm_waktu_dpjp);
			$pm_waktu_dpjp = date('Y-m-d H:i', strtotime($pm_waktu_dpjp));
		}
        $pm_waktu_kontraksi = $this->post('pm_waktu_kontraksi', true);
		if ($pm_waktu_kontraksi !== '') {
			$pm_waktu_kontraksi = str_replace('/', '-', $pm_waktu_kontraksi);
			$pm_waktu_kontraksi = date('Y-m-d H:i', strtotime($pm_waktu_kontraksi));
		}
        $pm_waktu_lendir = $this->post('pm_waktu_lendir', true);
		if ($pm_waktu_lendir !== '') {
			$pm_waktu_lendir = date('H:i', strtotime($pm_waktu_lendir));
		}
        $pm_waktu_ketuban = $this->post('pm_waktu_ketuban', true);
		if ($pm_waktu_ketuban !== '') {
			$pm_waktu_ketuban = date('H:i', strtotime($pm_waktu_ketuban));
		}
        // $pm_waktu_partus_1 = $this->post('pm_waktu_partus_1', true);
		// if ($pm_waktu_partus_1 !== '') {
		// 	$pm_waktu_partus_1 = date('Y-m-d', strtotime($pm_waktu_partus_1));
		// }
        // $pm_waktu_partus_2 = $this->post('pm_waktu_partus_2', true);
		// if ($pm_waktu_partus_2 !== '') {
		// 	$pm_waktu_partus_2 = date('Y-m-d', strtotime($pm_waktu_partus_2));
		// }
        // $pm_waktu_partus_3 = $this->post('pm_waktu_partus_3', true);
		// if ($pm_waktu_partus_3 !== '') {
		// 	$pm_waktu_partus_3 = date('Y-m-d', strtotime($pm_waktu_partus_3));
		// }
        // $pm_waktu_partus_4 = $this->post('pm_waktu_partus_4', true);
		// if ($pm_waktu_partus_4 !== '') {
		// 	$pm_waktu_partus_4 = date('Y-m-d', strtotime($pm_waktu_partus_4));
		// }
        // $pm_waktu_partus_5 = $this->post('pm_waktu_partus_5', true);
		// if ($pm_waktu_partus_5 !== '') {
		// 	$pm_waktu_partus_5 = date('Y-m-d', strtotime($pm_waktu_partus_5));
		// }
        // $pm_waktu_partus_6 = $this->post('pm_waktu_partus_6', true);
		// if ($pm_waktu_partus_6 !== '') {
		// 	$pm_waktu_partus_6 = date('Y-m-d', strtotime($pm_waktu_partus_6));
		// }

        $data_maternal = [
            'id_layanan_pendaftaran'        => safe_post('id_layanan_pendaftaran'),
            // 'id_user_maternal'              => safe_post('id_user_maternal'),
            'pm_waktu_kajian'               => (safe_post('pm_waktu_kajian') !== '' ? $pm_waktu_kajian : NULL),
    
            'pm_diperoleh'                  => (safe_post('pm_diperoleh') !== '' ? safe_post('pm_diperoleh') : NULL),
            'pm_diperoleh_sebutkan'         => (safe_post('pm_diperoleh_sebutkan') !== '' ? safe_post('pm_diperoleh_sebutkan') : NULL),
            'pm_cara_masuk'                 => (safe_post('pm_cara_masuk') !== '' ? safe_post('pm_cara_masuk') : NULL),
                
            // PEMERIKSAAN KELUHAN UTAMA    
            'pm_keluhan_utama'              => (safe_post('pm_keluhan_utama') !== '' ? safe_post('pm_keluhan_utama') : NULL),
            'pm_kontraksi'                  => (safe_post('pm_kontraksi') !== '' ? safe_post('pm_kontraksi') : NULL),
            'pm_waktu_kontraksi'            => (safe_post('pm_waktu_kontraksi') !== '' ? $pm_waktu_kontraksi : NULL),
            'pm_lendir'                     => (safe_post('pm_lendir') !== '' ? safe_post('pm_lendir') : NULL),
            'pm_waktu_lendir'               => (safe_post('pm_waktu_lendir') !== '' ? $pm_waktu_lendir : NULL),
            'pm_ketuban'                    => (safe_post('pm_ketuban') !== '' ? safe_post('pm_ketuban') : NULL),
            'pm_waktu_ketuban'              => (safe_post('pm_waktu_ketuban') !== '' ? $pm_waktu_ketuban : NULL),
            'pm_warna_ketuban'              => (safe_post('pm_warna_ketuban') !== '' ? safe_post('pm_warna_ketuban') : NULL),
            'pm_darah'                      => (safe_post('pm_darah') !== '' ? safe_post('pm_darah') : NULL),
            'pm_darah_sebutkan'             => (safe_post('pm_darah_sebutkan') !== '' ? safe_post('pm_darah_sebutkan') : NULL),
            'pm_lainnya'                    => (safe_post('pm_lainnya') !== '' ? safe_post('pm_lainnya') : NULL),
            'pm_lainnya_sebutkan'           => (safe_post('pm_lainnya_sebutkan') !== '' ? safe_post('pm_lainnya_sebutkan') : NULL),
    
            // RIWAYAT PENYAKIT SEKARANG    
            'pm_hamil_muda'                 => (safe_post('pm_hamil_muda') !== '' ? safe_post('pm_hamil_muda') : NULL),
            'pm_hamil_muda_muntah'          => (safe_post('pm_hamil_muda_muntah') !== '' ? safe_post('pm_hamil_muda_muntah') : NULL),
            'pm_hamil_muda_pendarahan'      => (safe_post('pm_hamil_muda_pendarahan') !== '' ? safe_post('pm_hamil_muda_pendarahan') : NULL),
            'pm_hamil_muda_lain'            => (safe_post('pm_hamil_muda_lain') !== '' ? safe_post('pm_hamil_muda_lain') : NULL),
            'pm_hamil_muda_sebutkan'        => (safe_post('pm_hamil_muda_sebutkan') !== '' ? safe_post('pm_hamil_muda_sebutkan') : NULL),


            'pm_hamil_tua'                  => (safe_post('pm_hamil_tua') !== '' ? safe_post('pm_hamil_tua') : NULL),
            'pm_hamil_tua_kepala'           => (safe_post('pm_hamil_tua_kepala') !== '' ? safe_post('pm_hamil_tua_kepala') : NULL),
            'pm_hamil_tua_pendarahan'       => (safe_post('pm_hamil_tua_pendarahan') !== '' ? safe_post('pm_hamil_tua_pendarahan') : NULL),
            'pm_hamil_tua_lain'             => (safe_post('pm_hamil_tua_lain') !== '' ? safe_post('pm_hamil_tua_lain') : NULL),
            'pm_hamil_tua_sebutkan'         => (safe_post('pm_hamil_tua_sebutkan') !== '' ? safe_post('pm_hamil_tua_sebutkan') : NULL),


            'pm_anc_x'                      => (safe_post('pm_anc_x') !== '' ? safe_post('pm_anc_x') : NULL),
            'pm_anc_lokasi'                 => (safe_post('pm_anc_lokasi') !== '' ? safe_post('pm_anc_lokasi') : NULL),


            'pm_anc'                        => (safe_post('pm_anc') !== '' ? safe_post('pm_anc') : NULL),
            'pm_anc_tidak_teratur'          => (safe_post('pm_anc_tidak_teratur') !== '' ? safe_post('pm_anc_tidak_teratur') : NULL),
            'pm_anc_imunisasi'              => (safe_post('pm_anc_imunisasi') !== '' ? safe_post('pm_anc_imunisasi') : NULL),


    
            // RIWAYAT KEHAMILAN PERSALI    NAN DAN NIFAS YANG LALU
            'pm_nifas_g'                    => (safe_post('pm_nifas_g') !== '' ? safe_post('pm_nifas_g') : NULL),
            'pm_nifas_p'                    => (safe_post('pm_nifas_p') !== '' ? safe_post('pm_nifas_p') : NULL),
            'pm_nifas_a'                    => (safe_post('pm_nifas_a') !== '' ? safe_post('pm_nifas_a') : NULL),
            'pm_nifas_hidup'                => (safe_post('pm_nifas_hidup') !== '' ? safe_post('pm_nifas_hidup') : NULL),
                
            // 'pm_waktu_partus_1'             => (safe_post('pm_waktu_partus_1') !== '' ? $pm_waktu_partus_1 : NULL),
            'pm_waktu_partus_1'               => safe_post('pm_waktu_partus_1') == '' ? null : date2mysql(safe_post('pm_waktu_partus_1')),
            'pm_tempat_partus_1'            => (safe_post('pm_tempat_partus_1') !== '' ? safe_post('pm_tempat_partus_1') : NULL),
            'pm_umur_hamil_1'               => (safe_post('pm_umur_hamil_1') !== '' ? safe_post('pm_umur_hamil_1') : NULL),
            'pm_jenis_persalinan_1'         => (safe_post('pm_jenis_persalinan_1') !== '' ? safe_post('pm_jenis_persalinan_1') : NULL),
            'pm_penolong_persalinan_1'      => (safe_post('pm_penolong_persalinan_1') !== '' ? safe_post('pm_penolong_persalinan_1') : NULL),
            'pm_penyulit_1'                 => (safe_post('pm_penyulit_1') !== '' ? safe_post('pm_penyulit_1') : NULL),
            'pm_nifas_1'                    => (safe_post('pm_nifas_1') !== '' ? safe_post('pm_nifas_1') : NULL),
            'pm_kelamin_1'                  => (safe_post('pm_kelamin_1') !== '' ? safe_post('pm_kelamin_1') : NULL),
            'pm_keadaan_1'                  => (safe_post('pm_keadaan_1') !== '' ? safe_post('pm_keadaan_1') : NULL),
                
            // 'pm_waktu_partus_2'             => (safe_post('pm_waktu_partus_2') !== '' ? $pm_waktu_partus_2 : NULL),
            'pm_waktu_partus_2'               => safe_post('pm_waktu_partus_2') == '' ? null : date2mysql(safe_post('pm_waktu_partus_2')),
            'pm_tempat_partus_2'            => (safe_post('pm_tempat_partus_2') !== '' ? safe_post('pm_tempat_partus_2') : NULL),
            'pm_umur_hamil_2'               => (safe_post('pm_umur_hamil_2') !== '' ? safe_post('pm_umur_hamil_2') : NULL),
            'pm_jenis_persalinan_2'         => (safe_post('pm_jenis_persalinan_2') !== '' ? safe_post('pm_jenis_persalinan_2') : NULL),
            'pm_penolong_persalinan_2'      => (safe_post('pm_penolong_persalinan_2') !== '' ? safe_post('pm_penolong_persalinan_2') : NULL),
            'pm_penyulit_2'                 => (safe_post('pm_penyulit_2') !== '' ? safe_post('pm_penyulit_2') : NULL),
            'pm_nifas_2'                    => (safe_post('pm_nifas_2') !== '' ? safe_post('pm_nifas_2') : NULL),
            'pm_kelamin_2'                  => (safe_post('pm_kelamin_2') !== '' ? safe_post('pm_kelamin_2') : NULL),
            'pm_keadaan_2'                  => (safe_post('pm_keadaan_2') !== '' ? safe_post('pm_keadaan_2') : NULL),
                
            // 'pm_waktu_partus_3'             => (safe_post('pm_waktu_partus_3') !== '' ? $pm_waktu_partus_3 : NULL),
            'pm_waktu_partus_3'               => safe_post('pm_waktu_partus_3') == '' ? null : date2mysql(safe_post('pm_waktu_partus_3')),
            'pm_tempat_partus_3'            => (safe_post('pm_tempat_partus_3') !== '' ? safe_post('pm_tempat_partus_3') : NULL),
            'pm_umur_hamil_3'               => (safe_post('pm_umur_hamil_3') !== '' ? safe_post('pm_umur_hamil_3') : NULL),
            'pm_jenis_persalinan_3'         => (safe_post('pm_jenis_persalinan_3') !== '' ? safe_post('pm_jenis_persalinan_3') : NULL),
            'pm_penolong_persalinan_3'      => (safe_post('pm_penolong_persalinan_3') !== '' ? safe_post('pm_penolong_persalinan_3') : NULL),
            'pm_penyulit_3'                 => (safe_post('pm_penyulit_3') !== '' ? safe_post('pm_penyulit_3') : NULL),
            'pm_nifas_3'                    => (safe_post('pm_nifas_3') !== '' ? safe_post('pm_nifas_3') : NULL),
            'pm_kelamin_3'                  => (safe_post('pm_kelamin_3') !== '' ? safe_post('pm_kelamin_3') : NULL),
            'pm_keadaan_3'                  => (safe_post('pm_keadaan_3') !== '' ? safe_post('pm_keadaan_3') : NULL),
                
            // 'pm_waktu_partus_4'             => (safe_post('pm_waktu_partus_4') !== '' ? $pm_waktu_partus_4 : NULL),
            'pm_waktu_partus_4'               => safe_post('pm_waktu_partus_4') == '' ? null : date2mysql(safe_post('pm_waktu_partus_4')),
            'pm_tempat_partus_4'            => (safe_post('pm_tempat_partus_4') !== '' ? safe_post('pm_tempat_partus_4') : NULL),
            'pm_umur_hamil_4'               => (safe_post('pm_umur_hamil_4') !== '' ? safe_post('pm_umur_hamil_4') : NULL),
            'pm_jenis_persalinan_4'         => (safe_post('pm_jenis_persalinan_4') !== '' ? safe_post('pm_jenis_persalinan_4') : NULL),
            'pm_penolong_persalinan_4'      => (safe_post('pm_penolong_persalinan_4') !== '' ? safe_post('pm_penolong_persalinan_4') : NULL),
            'pm_penyulit_4'                 => (safe_post('pm_penyulit_4') !== '' ? safe_post('pm_penyulit_4') : NULL),
            'pm_nifas_4'                    => (safe_post('pm_nifas_4') !== '' ? safe_post('pm_nifas_4') : NULL),
            'pm_kelamin_4'                  => (safe_post('pm_kelamin_4') !== '' ? safe_post('pm_kelamin_4') : NULL),
            'pm_keadaan_4'                  => (safe_post('pm_keadaan_4') !== '' ? safe_post('pm_keadaan_4') : NULL),
                
            // 'pm_waktu_partus_5'             => (safe_post('pm_waktu_partus_5') !== '' ? $pm_waktu_partus_5 : NULL),
            'pm_waktu_partus_5'               => safe_post('pm_waktu_partus_5') == '' ? null : date2mysql(safe_post('pm_waktu_partus_5')),
            'pm_tempat_partus_5'            => (safe_post('pm_tempat_partus_5') !== '' ? safe_post('pm_tempat_partus_5') : NULL),
            'pm_umur_hamil_5'               => (safe_post('pm_umur_hamil_5') !== '' ? safe_post('pm_umur_hamil_5') : NULL),
            'pm_jenis_persalinan_5'         => (safe_post('pm_jenis_persalinan_5') !== '' ? safe_post('pm_jenis_persalinan_5') : NULL),
            'pm_penolong_persalinan_5'      => (safe_post('pm_penolong_persalinan_5') !== '' ? safe_post('pm_penolong_persalinan_5') : NULL),
            'pm_penyulit_5'                 => (safe_post('pm_penyulit_5') !== '' ? safe_post('pm_penyulit_5') : NULL),
            'pm_nifas_5'                    => (safe_post('pm_nifas_5') !== '' ? safe_post('pm_nifas_5') : NULL),
            'pm_kelamin_5'                  => (safe_post('pm_kelamin_5') !== '' ? safe_post('pm_kelamin_5') : NULL),
            'pm_keadaan_5'                  => (safe_post('pm_keadaan_5') !== '' ? safe_post('pm_keadaan_5') : NULL),
                
            // 'pm_waktu_partus_6'             => (safe_post('pm_waktu_partus_6') !== '' ? $pm_waktu_partus_6 : NULL),
            'pm_waktu_partus_6'               => safe_post('pm_waktu_partus_6') == '' ? null : date2mysql(safe_post('pm_waktu_partus_6')),
            'pm_tempat_partus_6'            => (safe_post('pm_tempat_partus_6') !== '' ? safe_post('pm_tempat_partus_6') : NULL),
            'pm_umur_hamil_6'               => (safe_post('pm_umur_hamil_6') !== '' ? safe_post('pm_umur_hamil_6') : NULL),
            'pm_jenis_persalinan_6'         => (safe_post('pm_jenis_persalinan_6') !== '' ? safe_post('pm_jenis_persalinan_6') : NULL),
            'pm_penolong_persalinan_6'      => (safe_post('pm_penolong_persalinan_6') !== '' ? safe_post('pm_penolong_persalinan_6') : NULL),
            'pm_penyulit_6'                 => (safe_post('pm_penyulit_6') !== '' ? safe_post('pm_penyulit_6') : NULL),
            'pm_nifas_6'                    => (safe_post('pm_nifas_6') !== '' ? safe_post('pm_nifas_6') : NULL),
            'pm_kelamin_6'                  => (safe_post('pm_kelamin_6') !== '' ? safe_post('pm_kelamin_6') : NULL),
            'pm_keadaan_6'                  => (safe_post('pm_keadaan_6') !== '' ? safe_post('pm_keadaan_6') : NULL),
                
            // RIWAYAT MENSTRUASI   
            'pm_umur_menarche'              => (safe_post('pm_umur_menarche') !== '' ? safe_post('pm_umur_menarche') : NULL),
            'pm_umur_menarche_sebutkan'     => (safe_post('pm_umur_menarche_sebutkan') !== '' ? safe_post('pm_umur_menarche_sebutkan') : NULL),
            'pm_lama_haid'                  => (safe_post('pm_lama_haid') !== '' ? safe_post('pm_lama_haid') : NULL),
            'pm_pembalut'                   => (safe_post('pm_pembalut') !== '' ? safe_post('pm_pembalut') : NULL),
            'pm_dismenorroe'                => (safe_post('pm_dismenorroe') !== '' ? safe_post('pm_dismenorroe') : NULL),
            'pm_spoting'                    => (safe_post('pm_spoting') !== '' ? safe_post('pm_spoting') : NULL),
            'pm_menorrhagia'                => (safe_post('pm_menorrhagia') !== '' ? safe_post('pm_menorrhagia') : NULL),
            'pmm_metrorhagia'                => (safe_post('pmm_metrorhagia') !== '' ? safe_post('pmm_metrorhagia') : NULL),
            'pm_menstrual'                  => (safe_post('pm_menstrual') !== '' ? safe_post('pm_menstrual') : NULL),
            'pm_hpht'                       => (safe_post('pm_hpht') !== '' ? safe_post('pm_hpht') : NULL),
            'pm_taksiran'                   => (safe_post('pm_taksiran') !== '' ? safe_post('pm_taksiran') : NULL),
                
            // RIWAYAT PENYAKIT KELUARGA    
            'pm_asma'                       => (safe_post('pm_asma') !== '' ? safe_post('pm_asma') : NULL),
            'pm_hipertensi'                 => (safe_post('pm_hipertensi') !== '' ? safe_post('pm_hipertensi') : NULL),
            'pm_jantung'                    => (safe_post('pm_jantung') !== '' ? safe_post('pm_jantung') : NULL),
            'pm_diabetes'                   => (safe_post('pm_diabetes') !== '' ? safe_post('pm_diabetes') : NULL),
            'pm_diabetes'                   => (safe_post('pm_diabetes') !== '' ? safe_post('pm_diabetes') : NULL),
            'pm_penyakit_lain'              => (safe_post('pm_penyakit_lain') !== '' ? safe_post('pm_penyakit_lain') : NULL),
            'pm_penyakit_lain_sebutkan'     => (safe_post('pm_penyakit_lain_sebutkan') !== '' ? safe_post('pm_penyakit_lain_sebutkan') : NULL),
    
            // PEMERIKSAAN FISIK DAN TAN    DA-TANDA VITAL
            'pm_kesadaran'                  => (safe_post('pm_kesadaran') !== '' ? safe_post('pm_kesadaran') : NULL),
            'pm_sistolik'                   => (safe_post('pm_sistolik') !== '' ? safe_post('pm_sistolik') : NULL),
            'pm_suhu_sistolik'              => (safe_post('pm_suhu_sistolik') !== '' ? safe_post('pm_suhu_sistolik') : NULL),
            'pm_diastolik'                  => (safe_post('pm_diastolik') !== '' ? safe_post('pm_diastolik') : NULL),
            // 'pm_suhu_diastolik'             => (safe_post('pm_suhu_diastolik') !== '' ? safe_post('pm_suhu_diastolik') : NULL),
            'pm_cgs_e'                      => (safe_post('pm_cgs_e') !== '' ? safe_post('pm_cgs_e') : NULL),
            'pm_cgs_m'                      => (safe_post('pm_cgs_m') !== '' ? safe_post('pm_cgs_m') : NULL),
            'pm_cgs_v'                      => (safe_post('pm_cgs_v') !== '' ? safe_post('pm_cgs_v') : NULL),
            'pm_cgs_total'                  => (safe_post('pm_cgs_total') !== '' ? safe_post('pm_cgs_total') : NULL),
            'pm_spo2'                       => (safe_post('pm_spo2') !== '' ? safe_post('pm_spo2') : NULL),
            'pm_frekuensi_nadi'             => (safe_post('pm_frekuensi_nadi') !== '' ? safe_post('pm_frekuensi_nadi') : NULL),
            'pm_frekuensi_nafas'            => (safe_post('pm_frekuensi_nafas') !== '' ? safe_post('pm_frekuensi_nafas') : NULL),

            // PEMERIKSAAN KEBIDANAN DAN KANDUNGAN
            'pm_membesar'                   => (safe_post('pm_membesar') !== '' ? safe_post('pm_membesar') : NULL),
            'pm_melebar'                    => (safe_post('pm_melebar') !== '' ? safe_post('pm_melebar') : NULL),
            'pm_pelebaran'                  => (safe_post('pm_pelebaran') !== '' ? safe_post('pm_pelebaran') : NULL),
            'pm_linea_alba'                 => (safe_post('pm_linea_alba') !== '' ? safe_post('pm_linea_alba') : NULL),
            'pm_linea_nigra'                => (safe_post('pm_linea_nigra') !== '' ? safe_post('pm_linea_nigra') : NULL),
            'pm_striae_livide'              => (safe_post('pm_striae_livide') !== '' ? safe_post('pm_striae_livide') : NULL),
            'pm_striae_albican'             => (safe_post('pm_striae_albican') !== '' ? safe_post('pm_striae_albican') : NULL),
            'pm_luka'                       => (safe_post('pm_luka') !== '' ? safe_post('pm_luka') : NULL),
            'pm_luka_lain'                  => (safe_post('pm_luka_lain') !== '' ? safe_post('pm_luka_lain') : NULL),
            'pm_luka_lain_sebutkan'         => (safe_post('pm_luka_lain_sebutkan') !== '' ? safe_post('pm_luka_lain_sebutkan') : NULL),
            'pm_tfu'                        => (safe_post('pm_tfu') !== '' ? safe_post('pm_tfu') : NULL),


            'pm_leopold_1'                  => (safe_post('pm_leopold_1') !== '' ? safe_post('pm_leopold_1') : NULL),
            'pm_leopold_bokong'             => (safe_post('pm_leopold_bokong') !== '' ? safe_post('pm_leopold_bokong') : NULL),
            'pm_leopold_lain'               => (safe_post('pm_leopold_lain') !== '' ? safe_post('pm_leopold_lain') : NULL),
            'pm_leopold_1_sebutkan'         => (safe_post('pm_leopold_1_sebutkan') !== '' ? safe_post('pm_leopold_1_sebutkan') : NULL),



            'pm_leopold_2'                  => (safe_post('pm_leopold_2') !== '' ? safe_post('pm_leopold_2') : NULL),
            'pm_leopold_punggung'           => (safe_post('pm_leopold_punggung') !== '' ? safe_post('pm_leopold_punggung') : NULL),
            'pm_leopold_lainn'              => (safe_post('pm_leopold_lainn') !== '' ? safe_post('pm_leopold_lainn') : NULL),
            'pm_leopold_2_sebutkan'         => (safe_post('pm_leopold_2_sebutkan') !== '' ? safe_post('pm_leopold_2_sebutkan') : NULL),



            'pm_leopold_3'                  => (safe_post('pm_leopold_3') !== '' ? safe_post('pm_leopold_3') : NULL),
            'pm_leopold_bokonggg'           => (safe_post('pm_leopold_bokonggg') !== '' ? safe_post('pm_leopold_bokonggg') : NULL),
            'pm_leopold_lainnn'             => (safe_post('pm_leopold_lainnn') !== '' ? safe_post('pm_leopold_lainnn') : NULL),
            'pm_leopold_3_sebutkan'         => (safe_post('pm_leopold_3_sebutkan') !== '' ? safe_post('pm_leopold_3_sebutkan') : NULL),


            'pm_leopold_4'                  => (safe_post('pm_leopold_4') !== '' ? safe_post('pm_leopold_4') : NULL),
            'pm_leopold_bokongggg'          => (safe_post('pm_leopold_bokongggg') !== '' ? safe_post('pm_leopold_bokongggg') : NULL),


            'pm_janin_masuk'                => (safe_post('pm_janin_masuk') !== '' ? safe_post('pm_janin_masuk') : NULL),
            'pm_taksiran_janin'             => (safe_post('pm_taksiran_janin') !== '' ? safe_post('pm_taksiran_janin') : NULL),
            'pm_djj_x'                      => (safe_post('pm_djj_x') !== '' ? safe_post('pm_djj_x') : NULL),
            'pm_djj'                        => (safe_post('pm_djj') !== '' ? safe_post('pm_djj') : NULL),
            'pm_gerak_janin'                => (safe_post('pm_gerak_janin') !== '' ? safe_post('pm_gerak_janin') : NULL),
            'pm_his_x'                      => (safe_post('pm_his_x') !== '' ? safe_post('pm_his_x') : NULL),
            'pm_his_detik'                  => (safe_post('pm_his_detik') !== '' ? safe_post('pm_his_detik') : NULL),
            'pm_his_kekuatan'               => (safe_post('pm_his_kekuatan') !== '' ? safe_post('pm_his_kekuatan') : NULL),
            'pm_vulva'                      => (safe_post('pm_vulva') !== '' ? safe_post('pm_vulva') : NULL),
            'pm_vulva_sebutkan'             => (safe_post('pm_vulva_sebutkan') !== '' ? safe_post('pm_vulva_sebutkan') : NULL),
            'pm_pengeluaran_lendir'         => (safe_post('pm_pengeluaran_lendir') !== '' ? safe_post('pm_pengeluaran_lendir') : NULL),
            'pm_pengeluaran_ketuban'        => (safe_post('pm_pengeluaran_ketuban') !== '' ? safe_post('pm_pengeluaran_ketuban') : NULL),
            'pm_pengeluaran_ketuban_warna'  => (safe_post('pm_pengeluaran_ketuban_warna') !== '' ? safe_post('pm_pengeluaran_ketuban_warna') : NULL),
            'pm_pengeluaran_flex'           => (safe_post('pm_pengeluaran_flex') !== '' ? safe_post('pm_pengeluaran_flex') : NULL),
            'pm_pengeluaran_darah'          => (safe_post('pm_pengeluaran_darah') !== '' ? safe_post('pm_pengeluaran_darah') : NULL),
            'pm_pengeluaran_darah_sebanyak' => (safe_post('pm_pengeluaran_darah_sebanyak') !== '' ? safe_post('pm_pengeluaran_darah_sebanyak') : NULL),
            'pm_pengeluaran_lain'           => (safe_post('pm_pengeluaran_lain') !== '' ? safe_post('pm_pengeluaran_lain') : NULL),
            'pm_pengeluaran_lain_sebutkan'  => (safe_post('pm_pengeluaran_lain_sebutkan') !== '' ? safe_post('pm_pengeluaran_lain_sebutkan') : NULL),
            'pm_introitus'                  => (safe_post('pm_introitus') !== '' ? safe_post('pm_introitus') : NULL),
            'pm_introitus_sebutkan'         => (safe_post('pm_introitus_sebutkan') !== '' ? safe_post('pm_introitus_sebutkan') : NULL),
            'pm_porsio'                     => (safe_post('pm_porsio') !== '' ? safe_post('pm_porsio') : NULL),
            'pm_porsio_sebutkan'            => (safe_post('pm_porsio_sebutkan') !== '' ? safe_post('pm_porsio_sebutkan') : NULL),
            'pm_pembukaan'                  => (safe_post('pm_pembukaan') !== '' ? safe_post('pm_pembukaan') : NULL),
            'pm_pembukaan_ketuban'          => (safe_post('pm_pembukaan_ketuban') !== '' ? safe_post('pm_pembukaan_ketuban') : NULL),
            'pm_pembukaan_ketuban_warna'    => (safe_post('pm_pembukaan_ketuban_warna') !== '' ? safe_post('pm_pembukaan_ketuban_warna') : NULL),
            'pm_hodge'                      => (safe_post('pm_hodge') !== '' ? safe_post('pm_hodge') : NULL),
            'pm_uuk'                        => (safe_post('pm_uuk') !== '' ? safe_post('pm_uuk') : NULL),
            'pm_moulage'                    => (safe_post('pm_moulage') !== '' ? safe_post('pm_moulage') : NULL),
            'pm_nyeri_porsio'               => (safe_post('pm_nyeri_porsio') !== '' ? safe_post('pm_nyeri_porsio') : NULL),

            // PENILAIAN RESIKO JATUH   
            'pm_jatuh'                      => (safe_post('pm_jatuh') !== '' ? safe_post('pm_jatuh') : NULL),
            'pm_diagnosis'                  => (safe_post('pm_diagnosis') !== '' ? safe_post('pm_diagnosis') : NULL),
            'pm_kursi_roda'                 => (safe_post('pm_kursi_roda') !== '' ? safe_post('pm_kursi_roda') : NULL),
            'pm_kursi_roda_ya'              => (safe_post('pm_kursi_roda_ya') !== '' ? safe_post('pm_kursi_roda_ya') : NULL),
            'pm_kruk'                       => (safe_post('pm_kruk') !== '' ? safe_post('pm_kruk') : NULL),
            'pm_kruk_ya'                    => (safe_post('pm_kruk_ya') !== '' ? safe_post('pm_kruk_ya') : NULL),
            'pm_pegangan'                   => (safe_post('pm_pegangan') !== '' ? safe_post('pm_pegangan') : NULL),
            'pm_pegangan_ya'                => (safe_post('pm_pegangan_ya') !== '' ? safe_post('pm_pegangan_ya') : NULL),
            'pm_heparin'                    => (safe_post('pm_heparin') !== '' ? safe_post('pm_heparin') : NULL),
            'pm_imobilisasi'                => (safe_post('pm_imobilisasi') !== '' ? safe_post('pm_imobilisasi') : NULL),
            'pm_imobilisasi_ya'             => (safe_post('pm_imobilisasi_ya') !== '' ? safe_post('pm_imobilisasi_ya') : NULL),
            'pm_lemah'                      => (safe_post('pm_lemah') !== '' ? safe_post('pm_lemah') : NULL),
            'pm_lemah_ya'                   => (safe_post('pm_lemah_ya') !== '' ? safe_post('pm_lemah_ya') : NULL),
            'pm_terganggu'                  => (safe_post('pm_terganggu') !== '' ? safe_post('pm_terganggu') : NULL),
            'pm_terganggu_ya'               => (safe_post('pm_terganggu_ya') !== '' ? safe_post('pm_terganggu_ya') : NULL),
            'pm_kemampuan'                  => (safe_post('pm_kemampuan') !== '' ? safe_post('pm_kemampuan') : NULL),
            'pm_kemampuan_ya'               => (safe_post('pm_kemampuan_ya') !== '' ? safe_post('pm_kemampuan_ya') : NULL),
            'pm_lupa'                       => (safe_post('pm_lupa') !== '' ? safe_post('pm_lupa') : NULL),
            'pm_lupa_ya'                    => (safe_post('pm_lupa_ya') !== '' ? safe_post('pm_lupa_ya') : NULL),
            'pm_jumlah_skor'                => (safe_post('pm_jumlah_skor') !== '' ? safe_post('pm_jumlah_skor') : NULL),

            // PENILAIAN TINGKAT NYERI  
            'pm_skala_nyeri'                => (safe_post('pm_skala_nyeri') !== '' ? safe_post('pm_skala_nyeri') : NULL),
            'pm_kualitas_nyeri'             => (safe_post('pm_kualitas_nyeri') !== '' ? safe_post('pm_kualitas_nyeri') : NULL),
            'pm_frekuensi_nyeri'            => (safe_post('pm_frekuensi_nyeri') !== '' ? safe_post('pm_frekuensi_nyeri') : NULL),
            'pm_pemberat_nyeri'             => (safe_post('pm_pemberat_nyeri') !== '' ? safe_post('pm_pemberat_nyeri') : NULL),
            'pm_lama_nyeri'                 => (safe_post('pm_lama_nyeri') !== '' ? safe_post('pm_lama_nyeri') : NULL),
            'pm_pengurang_nyeri'            => (safe_post('pm_pengurang_nyeri') !== '' ? safe_post('pm_pengurang_nyeri') : NULL),

            // RIWAYAT ALERGI   
            'pm_alergi'                     => (safe_post('pm_alergi') !== '' ? safe_post('pm_alergi') : NULL),
            'pm_alergi_obat'                => (safe_post('pm_alergi_obat') !== '' ? safe_post('pm_alergi_obat') : NULL),
            'pm_alergi_obat_reaksi'         => (safe_post('pm_alergi_obat_reaksi') !== '' ? safe_post('pm_alergi_obat_reaksi') : NULL),
            'pm_alergi_makan'               => (safe_post('pm_alergi_makan') !== '' ? safe_post('pm_alergi_makan') : NULL),
            'pm_alergi_makan_reaksi'        => (safe_post('pm_alergi_makan_reaksi') !== '' ? safe_post('pm_alergi_makan_reaksi') : NULL),
            'pm_alergi_lain'                => (safe_post('pm_alergi_lain') !== '' ? safe_post('pm_alergi_lain') : NULL),
            'pm_alergi_lain_reaksi'         => (safe_post('pm_alergi_lain_reaksi') !== '' ? safe_post('pm_alergi_lain_reaksi') : NULL),
            'pm_alergi_obat_konsumsi'       => (safe_post('pm_alergi_obat_konsumsi') !== '' ? safe_post('pm_alergi_obat_konsumsi') : NULL),

            // STATUS NUTRISI   
            'pm_berat_badan'                => (safe_post('pm_berat_badan') !== '' ? safe_post('pm_berat_badan') : NULL),
            'pm_berat_badan_kg'             => (safe_post('pm_berat_badan_kg') !== '' ? safe_post('pm_berat_badan_kg') : NULL),
            'pm_berat_badan_sebutkan'       => (safe_post('pm_berat_badan_sebutkan') !== '' ? safe_post('pm_berat_badan_sebutkan') : NULL),
            'pm_berat_badan_t'                => (safe_post('pm_berat_badan_t') !== '' ? safe_post('pm_berat_badan_t') : NULL),

            // STATUS FUNGSIONAL    
            'pm_fungsional'                 => (safe_post('pm_fungsional') !== '' ? safe_post('pm_fungsional') : NULL),
            'pm_fungsional_sebutkan'        => (safe_post('pm_fungsional_sebutkan') !== '' ? safe_post('pm_fungsional_sebutkan') : NULL),

            // PSIKOSOSIAL EKONOMI  
            'pm_psikologis'                 => (safe_post('pm_psikologis') !== '' ? safe_post('pm_psikologis') : NULL),
            'pm_psikologis_sebutkan'        => (safe_post('pm_psikologis_sebutkan') !== '' ? safe_post('pm_psikologis_sebutkan') : NULL),
            'pm_mental'                     => (safe_post('pm_mental') !== '' ? safe_post('pm_mental') : NULL),
            'pm_mental_sebutkan'            => (safe_post('pm_mental_sebutkan') !== '' ? safe_post('pm_mental_sebutkan') : NULL),
            'pm_pekerjaan'                  => (safe_post('pm_pekerjaan') !== '' ? safe_post('pm_pekerjaan') : NULL),
            'pm_bayar'                      => (safe_post('pm_bayar') !== '' ? safe_post('pm_bayar') : NULL),
            'pm_bayar_asuransi_sebutkan'    => (safe_post('pm_bayar_asuransi_sebutkan') !== '' ? safe_post('pm_bayar_asuransi_sebutkan') : NULL),
            'pm_bayar_sebutkan'             => (safe_post('pm_bayar_sebutkan') !== '' ? safe_post('pm_bayar_sebutkan') : NULL),
            'pm_bayar_t'                      => (safe_post('pm_bayar_t') !== '' ? safe_post('pm_bayar_t') : NULL),

            // PENGKAJIAN SPIRITUAL 
            'pm_keagamaan'                  => (safe_post('pm_keagamaan') !== '' ? safe_post('pm_keagamaan') : NULL),
            'pm_ibadah'                     => (safe_post('pm_ibadah') !== '' ? safe_post('pm_ibadah') : NULL),
            'pm_ibadah_sebutkan'            => (safe_post('pm_ibadah_sebutkan') !== '' ? safe_post('pm_ibadah_sebutkan') : NULL),
            'pm_thaharoh'                   => (safe_post('pm_thaharoh') !== '' ? safe_post('pm_thaharoh') : NULL),
            'pm_sholat'                     => (safe_post('pm_sholat') !== '' ? safe_post('pm_sholat') : NULL),

            // KLEBUTUHAN BIOLOGIS  
            'pm_banyak_makan'               => (safe_post('pm_banyak_makan') !== '' ? safe_post('pm_banyak_makan') : NULL),
            'pm_waktu_makan'                => (safe_post('pm_waktu_makan') !== '' ? safe_post('pm_waktu_makan') : NULL),
            'pm_banyak_minum'               => (safe_post('pm_banyak_minum') !== '' ? safe_post('pm_banyak_minum') : NULL),
            'pm_waktu_minum'                => (safe_post('pm_waktu_minum') !== '' ? safe_post('pm_waktu_minum') : NULL),
            'pm_banyak_bak'                 => (safe_post('pm_banyak_bak') !== '' ? safe_post('pm_banyak_bak') : NULL),
            'pm_waktu_bak'                  => (safe_post('pm_waktu_bak') !== '' ? safe_post('pm_waktu_bak') : NULL),
            'pm_banyak_bab'                 => (safe_post('pm_banyak_bab') !== '' ? safe_post('pm_banyak_bab') : NULL),
            'pm_waktu_bab'                  => (safe_post('pm_waktu_bab') !== '' ? safe_post('pm_waktu_bab') : NULL),
            'pm_sex'                        => (safe_post('pm_sex') !== '' ? safe_post('pm_sex') : NULL),

            // SKALA EARLY WARNING SYSTEM (EWS) MEOWS & NEWS
            'sews_respirasit'       => safe_post('sews_respirasit') !== '' ? safe_post('sews_respirasit') : NULL,
            'sews_saturasit'        => safe_post('sews_saturasit') !== '' ? safe_post('sews_saturasit') : NULL,
            'sews_o2t'              => safe_post('sews_o2t') !== '' ? safe_post('sews_o2t') : NULL,
            'sews_suhut'            => safe_post('sews_suhut') !== '' ? safe_post('sews_suhut') : NULL,
            'sews_td_sintolikt'     => safe_post('sews_td_sintolikt') !== '' ? safe_post('sews_td_sintolikt') : NULL,
            'sews_td_diastolikt'    => safe_post('sews_td_diastolikt') !== '' ? safe_post('sews_td_diastolikt') : NULL,
            'sews_nadit'            => safe_post('sews_nadit') !== '' ? safe_post('sews_nadit') : NULL,
            'sews_kesadarant'       => safe_post('sews_kesadarant') !== '' ? safe_post('sews_kesadarant') : NULL,
            'sews_nyerit'           => safe_post('sews_nyerit') !== '' ? safe_post('sews_nyerit') : NULL,
            'sews_pengeluwarant'    => safe_post('sews_pengeluwarant') !== '' ? safe_post('sews_pengeluwarant') : NULL,
            'sews_proteint'         => safe_post('sews_proteint') !== '' ? safe_post('sews_proteint') : NULL,
            'pm_meows'              => safe_post('pm_meows') !== '' ? safe_post('pm_meows') : NULL,

            // SKALA EARLY WARNING SYSTEM (NEWS)
            'sews_laju_respirasio'      => safe_post('sews_laju_respirasio') !== '' ? safe_post('sews_laju_respirasio') : NULL,
            'sews_saturasio'            => safe_post('sews_saturasio') !== '' ? safe_post('sews_saturasio') : NULL,
            'sews_suplemeno'            => safe_post('sews_suplemeno') !== '' ? safe_post('sews_suplemeno') : NULL,
            'sews_temperaturo'          => safe_post('sews_temperaturo') !== '' ? safe_post('sews_temperaturo') : NULL,
            'sews_tdso'                 => safe_post('sews_tdso') !== '' ? safe_post('sews_tdso') : NULL,
            'sews_laju_jantungo'        => safe_post('sews_laju_jantungo') !== '' ? safe_post('sews_laju_jantungo') : NULL,
            'sews_kesadarano'           => safe_post('sews_kesadarano') !== '' ? safe_post('sews_kesadarano') : NULL,
            'pm_news'                   => safe_post('pm_news') !== '' ? safe_post('pm_news') : NULL,


            // DATA PENUNJANG
            'pm_tanggal_lab'                => (safe_post('pm_tanggal_lab') !== '' ? safe_post('pm_tanggal_lab') : NULL),
            'pm_hasil_lab'                  => (safe_post('pm_hasil_lab') !== '' ? safe_post('pm_hasil_lab') : NULL),
            'pm_tanggal_cgt'                => (safe_post('pm_tanggal_cgt') !== '' ? safe_post('pm_tanggal_cgt') : NULL),
            'pm_hasil_cgt'                  => (safe_post('pm_hasil_cgt') !== '' ? safe_post('pm_hasil_cgt') : NULL),
            'pm_penunjang_lain'             => (safe_post('pm_penunjang_lain') !== '' ? safe_post('pm_penunjang_lain') : NULL),
    
            // ASSESMEN KEBIDANAN   
            'pm_infeksi'                    => (safe_post('pm_infeksi') !== '' ? safe_post('pm_infeksi') : NULL),
            'pm_pendarahan'                 => (safe_post('pm_pendarahan') !== '' ? safe_post('pm_pendarahan') : NULL),
            'pm_nausea'                     => (safe_post('pm_nausea') !== '' ? safe_post('pm_nausea') : NULL),
            'pm_gawat_jalan'                => (safe_post('pm_gawat_jalan') !== '' ? safe_post('pm_gawat_jalan') : NULL),
            'pm_anxietas'                   => (safe_post('pm_anxietas') !== '' ? safe_post('pm_anxietas') : NULL),
            'pm_nyeri_melahirkan'           => (safe_post('pm_nyeri_melahirkan') !== '' ? safe_post('pm_nyeri_melahirkan') : NULL),
            'pm_pola_nafas'                 => (safe_post('pm_pola_nafas') !== '' ? safe_post('pm_pola_nafas') : NULL),
            'pm_kebutuhan_lain'             => (safe_post('pm_kebutuhan_lain') !== '' ? safe_post('pm_kebutuhan_lain') : NULL),
            'pm_kebutuhan_sebutkan'         => (safe_post('pm_kebutuhan_sebutkan') !== '' ? safe_post('pm_kebutuhan_sebutkan') : NULL),

            // RENCANA ASUHAN KEBIDANAN
            'pm_asuhan_jelaskan'            => (safe_post('pm_asuhan_jelaskan') !== '' ? safe_post('pm_asuhan_jelaskan') : NULL),
            'pm_asuhan_laporkan'            => (safe_post('pm_asuhan_laporkan') !== '' ? safe_post('pm_asuhan_laporkan') : NULL),
            'pm_asuhan_fasilitas'           => (safe_post('pm_asuhan_fasilitas') !== '' ? safe_post('pm_asuhan_fasilitas') : NULL),
            'pm_asuhan_masalah'             => (safe_post('pm_asuhan_masalah') !== '' ? safe_post('pm_asuhan_masalah') : NULL),
            'pm_asuhan_observasi'           => (safe_post('pm_asuhan_observasi') !== '' ? safe_post('pm_asuhan_observasi') : NULL),
            'pm_asuhan_edukasi'             => (safe_post('pm_asuhan_edukasi') !== '' ? safe_post('pm_asuhan_edukasi') : NULL),
            'pm_asuhan_lain'                => (safe_post('pm_asuhan_lain') !== '' ? safe_post('pm_asuhan_lain') : NULL),
            'pm_asuhan_sebutkan'            => (safe_post('pm_asuhan_sebutkan') !== '' ? safe_post('pm_asuhan_sebutkan') : NULL),
            
            // TGL / TTD / NAMA PERAWAT OR DOKTEER
            'pm_waktu_bidan'                => (safe_post('pm_waktu_bidan') !== '' ? $pm_waktu_bidan : NULL),
            'pm_waktu_dpjp'                 => (safe_post('pm_waktu_dpjp') !== '' ? $pm_waktu_dpjp : NULL),
            'pm_bidan'                      => (safe_post('pm_bidan') !== '' ? safe_post('pm_bidan') : NULL),
            'pm_dpjp'                       => (safe_post('pm_dpjp') !== '' ? safe_post('pm_dpjp') : NULL),
            'pm_paraf_bidan'                => (safe_post('pm_paraf_bidan') !== '' ? safe_post('pm_paraf_bidan') : NULL),
            'pm_paraf_dpjp'                 => (safe_post('pm_paraf_dpjp') !== '' ? safe_post('pm_paraf_dpjp') : NULL) 
            
        ];
        $get_maternal_igd = $this->m_pemeriksaan_igd->getDataMaternalIgd($data_maternal['id_layanan_pendaftaran']);
        if ($get_maternal_igd !== NULL) :
            if ($get_maternal_igd->pm_paraf_bidan !== NULL) :
                 $data_maternal['pm_paraf_bidan'] = $get_maternal_igd->pm_paraf_bidan;
            endif;
        else :
             $data_maternal['pm_paraf_bidan'] = (safe_post('pm_paraf_bidan') !== '' ? safe_post('pm_paraf_bidan') : NULL);
        endif;

        if ($get_maternal_igd !== NULL) :
            if ($get_maternal_igd->pm_paraf_dpjp !== NULL) :
                 $data_maternal['pm_paraf_dpjp'] = $get_maternal_igd->pm_paraf_dpjp;
            endif;
        else :
             $data_maternal['pm_paraf_dpjp'] = (safe_post('pm_paraf_dpjp') !== '' ? safe_post('pm_paraf_dpjp') : NULL);
        endif;

        // WH3 // PIM
        $response = $this->m_pemeriksaan_igd->simpanPengkajianAwalIGD($data_medis, $data_keperawatan, $data_triase_igd, $data_maternal);
        $this->response($response, REST_Controller::HTTP_OK);
    }
 

	function pembatalan_igd_get()
    {
        if (!$this->get('id_pendaftaran') & !$this->get('id_layanan_pendaftaran')) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
        endif;

        $id_pendaftaran         = $this->get('id_pendaftaran');
        $id_layanan_pendaftaran = $this->get('id_layanan_pendaftaran');

        $response = $this->m_pemeriksaan_igd->pembatalanIGD($id_pendaftaran, $id_layanan_pendaftaran);
        $this->load->model('logs/Logs_model', 'm_logs');
        $this->m_logs->recordAdminLogs($id_layanan_pendaftaran, 'Batal Pemeriksaan IGD ');
        $this->response($response, REST_Controller::HTTP_OK);
    }
	
}
