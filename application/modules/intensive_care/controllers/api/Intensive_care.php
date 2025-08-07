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
class Intensive_care extends REST_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->limit = 10;
        $this->datetime = date('Y-m-d H:i:s');
        $this->load->model('Intensive_care_model', 'm_intensive_care');

        $id_translucent = $this->session->userdata('id_translucent');
        if (empty($id_translucent)) :
            $this->response(array('error' => 'Anda belum login'), REST_Controller::HTTP_UNAUTHORIZED);
            exit();
        endif;
    }

    function get_list_intensive_care_get()
    {
        if (!$this->get('page')) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
        endif;

        $start  = ($this->get('page') - 1) * $this->limit;
        $search = [
            'tanggal_awal'  => safe_get('tanggal_awal'),
            'tanggal_akhir' => safe_get('tanggal_akhir'),
            'no_register'   => safe_get('no_register'),
            'no_rm'         => safe_get('no_rm'),
            'dokter'         => safe_get('dokter'),
            'nama'          => safe_get('nama'),
            'status_keluar' => safe_get('status_keluar'),
            'bangsal'       => safe_get('bangsal'),
            'kelas'         => safe_get('kelas'),
            'list_admin'    => !isset($_GET['status_icare']) ? 'Ya' : 'Tidak',
            'key'            => isset($_GET['key']) ? safe_get('key') : '',
            'status_icare'    => isset($_GET['status_icare']) ? safe_get('status_icare') : NULL,
            'no_sep'        => isset($_GET['no_sep']) ? safe_get('no_sep') : '',

            'status_pasien_icare' => safe_get('status_pasien_icare'),

        ];

        if ($this->session->userdata('id_account_group') != 1) :
            $search['status_keluar_not'] = 'Batal';
        endif;

        $data            = $this->m_intensive_care->getListDataIntensiveCare($this->limit, $start, $search);
        $data['page']    = (int) $this->get('page');
        $data['limit']   = $this->limit;

        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK); // (200)
        endif;
    }

    function pembatalan_intensive_care_get()
    {
        if (!$this->get('id_layanan_pendaftaran', true)) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
        endif;

        $id_layanan_pendaftaran = $this->get('id_layanan_pendaftaran', true);
        $status = $this->m_intensive_care->pembatalanIntensiveCare($id_layanan_pendaftaran);
        // catat log transaksi batalnya
        $this->load->model('logs/Logs_model', 'm_logs');
        $this->m_logs->recordAdminLogs($id_layanan_pendaftaran, 'Batal Intensive Care');
        $this->response(array('status' => $status), REST_Controller::HTTP_OK);
    }

    function konfirmasi_masuk_intensive_care_post()
    {
        if (!$this->post('id_intensive_care', true)) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
        endif;

        $this->db->trans_begin();
        $id_intensive_care = $this->post('id_intensive_care', true);
        $dataIcare = $this->db->where('id', $id_intensive_care, true)->get('sm_intensive_care')->row();
        if (!empty($dataIcare->id_bed)) :
            // update data table intensive care nya
            $dataUpdateIcare = array('konfirmasi_icare' => 'Ya', 'waktu_konfirmasi_icare' => $this->datetime);
            $this->db->where('id', $id_intensive_care, true)->update('sm_intensive_care', $dataUpdateIcare);

            // update juga table bed nya
            $dataUpdateBed = array('keterangan' => 'Terpakai');
            $this->db->where('id', $dataIcare->id_bed, true)->update('sm_bed', $dataUpdateBed);
        endif;

        if ($this->db->trans_status() === false) :
            $this->db->trans_rollback();
            $status = false;
            $message = 'Gagal mengkonfirmasi pasien masuk ke ruangan';
        else :
            $this->db->trans_commit();
            $status = true;
            $message = 'Pasien Berhasil masuk ke ruangan';
        endif;

        $this->response(array('status' => $status, 'message' => $message), REST_Controller::HTTP_OK);
    }

    function update_waktu_intensive_care_post()
    {
        if (safe_post('id_layanan_pendaftaran') === '') :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
        endif;

        $id_layanan_pendaftaran = safe_post('id_layanan_pendaftaran');
        $updateWaktu = array(
            // 'waktu_masuk' => safe_post('waktu_masuk'), 
            // waktu konfirmasi Icare menjadi waktu Icare
            'waktu_konfirmasi_icare' => safe_post('waktu_masuk'),
            'waktu_keluar' => safe_post('waktu_keluar') !== '' ? safe_post('waktu_keluar') : NULL
        );

        $dataIcare = $this->db->where('id_layanan_pendaftaran', $id_layanan_pendaftaran, true)->get('sm_intensive_care')->row();
        $catatan = "Sebelum edit : Waktu Masuk " . indo_time($dataIcare->waktu_konfirmasi_icare) . ", Waktu Keluar " . ($dataIcare->waktu_keluar !== NULL ? indo_time($dataIcare->waktu_keluar) : '-');
        $catatan .= "<br>Setelah edit : Waktu Masuk " . indo_time($updateWaktu['waktu_konfirmasi_icare']) . ", Waktu Keluar " . ($updateWaktu['waktu_keluar'] !== NULL ? indo_time($updateWaktu['waktu_keluar']) : '-');
        $status = $this->m_intensive_care->updateWaktuIntensiveCare($id_layanan_pendaftaran, $updateWaktu);
        // record logs
        $this->load->model('logs/Logs_model', 'm_logs');
        $this->m_logs->recordAdminLogs($id_layanan_pendaftaran, 'Edit Waktu Intensive Care', $catatan);
        $response = array('id' => $id_layanan_pendaftaran, 'status' => $status);
        $this->response($response, REST_Controller::HTTP_OK);
    }

    function reset_status_bed_get()
    {
        if (!$this->get('id_intensive_care', true)) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
        endif;

        $id_intensive_care = $this->get('id_intensive_care', true);
        $status = $this->m_intensive_care->resetStatusBed($id_intensive_care);
        $this->response(array('status' => $status), REST_Controller::HTTP_OK);
    }

    function get_data_pengkajian_awal_icare_get()
    {
        if (!$this->get('id')) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
        endif;

        $this->load->model('pendaftaran/Pendaftaran_model', 'm_pendaftaran');
        $this->load->model('pelayanan/Pelayanan_model', 'm_pelayanan');
        $data                 = $this->m_pendaftaran->getPendaftaranDetail($this->get('id', true), $this->get('id_layanan', true));
        $data['profil']       = $this->m_pelayanan->getProfilPasien($data['pasien']->id_pasien);
        $data['kajian_perawat'] = $this->m_intensive_care->getKajianKeperawatan($data['layanan']->id);
        $data['kajian_medis'] = $this->m_intensive_care->getKajianMedis($data['layanan']->id);
        $data['kajian_perawat_logs'] = $this->m_intensive_care->getKajianKeperawatanLogs($data['layanan']->id);
        $data['kajian_medis_logs'] = $this->m_intensive_care->getKajianMedisLogs($data['layanan']->id);

        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK); // (200)
        endif;
    }

    function get_history_logs_pengkajian_awal_icare_get()
    {
        if (!$this->get('id_layanan_pendaftaran', true)) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
        endif;

        $id_layanan_pendaftaran = $this->get('id_layanan_pendaftaran', true);

        $data['kajian_perawat_logs'] = $this->m_intensive_care->getKajianKeperawatanLogs($id_layanan_pendaftaran);
        $data['kajian_medis_logs'] = $this->m_intensive_care->getKajianMedisLogs($id_layanan_pendaftaran);

        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK); // (200)
        endif;
    }

    function simpan_pengkajian_awal_icare_post()
    {
        // echo json_encode($_POST); die;

        if (safe_post('id_layanan_pendaftaran') === '') :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
        endif;

        $id_layanan_pendaftaran = safe_post('id_layanan_pendaftaran');
        $id_kajian_keperawatan = safe_post('id_kajian_keperawatan');

        $data_kajian_keperawatan = array(
            'id_layanan_pendaftaran' => $id_layanan_pendaftaran,
            'waktu_pengkajian' => (safe_post('waktu_pengkajian') !== '' ? datetime2mysql(safe_post('waktu_pengkajian')) : NULL),
            'cara_tiba_diruangan' => safe_post('cara_tiba_diruangan'),
            'informasi_dari' => json_encode(array(
                'pasien' => safe_post('informasi_dari_pasien'),
                'keluarga' => safe_post('informasi_dari_keluarga'),
                'lain' => safe_post('informasi_dari_lain'),
                'ket_lain' => safe_post('informasi_dari_lain_input'),
            )),
            'keluhan_utama' => safe_post('keluhan_utama'),
            'timbul_keluhan' => safe_post('mulai_timbul_keluhan'),
            'lama_keluhan' => safe_post('lama_keluhan'),
            'faktor_pencetus' => json_encode(array(
                'infeksi' => safe_post('faktor_pencetus_infeksi'),
                'lain' => safe_post('faktor_pencetus_lain'),
                'ket_lain' => safe_post('faktor_pencetus_lain_input'),
            )),
            'sifat_keluhan' => safe_post('sifat_keluhan'),
            'rps' => safe_post('riwayat_penyakit_sekarang'),
            'rpd' => json_encode(array(
                'asma' => safe_post('rpt_asma'),
                'hipertensi' => safe_post('rpt_hipertensi'),
                'jantung' => safe_post('rpt_jantung'),
                'diabetes' => safe_post('rpt_diabetes'),
                'hepatitis' => safe_post('rpt_hepatitis'),
                'lain' => safe_post('rpt_lain'),
                'ket_lain' => safe_post('rpt_lain_input'),
            )),
            'rpk' => json_encode(array(
                'asma' => safe_post('rpk_asma'),
                'hipertensi' => safe_post('rpk_hipertensi'),
                'jantung' => safe_post('rpk_jantung'),
                'diabetes' => safe_post('rpk_diabetes'),
                'hepatitis' => safe_post('rpk_hepatitis'),
                'lain' => safe_post('rpk_lain'),
                'ket_lain' => safe_post('rpk_lain_input'),
            )),
            'pernah_dirawat' => json_encode(array(
                'dirawat' => safe_post('pernah_dirawat'),
                'kapan' => safe_post('pernah_dirawat_kapan'),
                'dimana' => safe_post('pernah_dirawat_dimana'),
            )),
            'kebiasaan' => json_encode(array(
                'merokok' => safe_post('kebiasaan_merokok'),
                'ket_merokok' => safe_post('kebiasaan_merokok_input'),
                'alkohol' => safe_post('kebiasaan_alkohol'),
                'ket_alkohol' => safe_post('kebiasaan_alkohol_input'),
                'narkoba' => safe_post('kebiasaan_narkoba'),
                'olahraga' => safe_post('kebiasaan_olahraga'),
            )),
            'riwayat_operasi' => json_encode(array(
                'operasi' => safe_post('riwayat_operasi'),
                'kapan' => safe_post('riwayat_operasi_kapan'),
                'dimana' => safe_post('riwayat_operasi_dimana'),
            )),
            'obat_dari_luar' => safe_post('obat_luar'),
            'alergi' => safe_post('alergi'),
            'alergi_obat' => safe_post('alergi_obat'),
            'alergi_obat_reaksi' => safe_post('alergi_obat_reaksi'),
            'alergi_makanan' => safe_post('alergi_makanan'),
            'alergi_makanan_reaksi' => safe_post('alergi_makanan_reaksi'),
            'keadaan_hamil' => safe_post('hamil'),
            'sedang_menyusui' => safe_post('menyusui'),
            'riwayat_kelahiran' => safe_post('riwayat_kelahiran'),
            'kesadaran' => json_encode(array(
                'composmentis' => safe_post('composmentis'),
                'apatis' => safe_post('apatis'),
                'samnolen' => safe_post('samnolen'),
                'sopor' => safe_post('sopor'),
                'koma' => safe_post('koma'),
                'gcs_e' => safe_post('gcs_e'),
                'gcs_m' => safe_post('gcs_m'),
                'gcs_v' => safe_post('gcs_v'),
            )),
            'tensi_sistolik_awal' => safe_post('tensi_sis'),
            'tensi_diastolik_awal' => safe_post('tensi_dis'),
            'nadi_awal' => safe_post('nadi_pa'),
            'suhu_awal' => safe_post('suhu_pa'),
            'nafas_awal' => safe_post('nafas_pa'),
            'suara_nafas' => json_encode(array(
                'vesikuler' => safe_post('sf_vesikuler'),
                'wheezing' => safe_post('sf_wheezing'),
                'ronchi' => safe_post('sf_ronchi'),
                'dispnoe' => safe_post('sf_dispnoe'),
                'stridor' => safe_post('sf_stridor'),
            )),
            'pola_nafas' => json_encode(array(
                'normal' => safe_post('pn_normal'),
                'bradipnea' => safe_post('pn_bradipnea'),
                'tachipnea' => safe_post('pn_tachipnea'),
            )),
            'jenis_pernafasan' => json_encode(array(
                'dada' => safe_post('jp_dada'),
                'perut' => safe_post('jp_perut'),
                'cuping_hidung' => safe_post('jp_cuping_hidung'),
            )),
            'otot_bantu_nafas' => safe_post('otot_bantu_nafas'),
            'irama_nafas' => safe_post('irama_nafas'),
            'batuk_sekresi' => safe_post('batuk_sekresi'),
            'ket_batuk_sekresi' => json_encode(array(
                'produktif' => (safe_post('bs_produktif') !== '' ? safe_post('bs_produktif') : NULL),
                'non_produktif' => (safe_post('bs_non_produktif') !== '' ? safe_post('bs_non_produktif') : NULL),
                'hemaptoe' => (safe_post('bs_hemaptoe') !== '' ? safe_post('bs_hemaptoe') : NULL),
                'lain' => (safe_post('bs_lain') !== '' ? safe_post('bs_lain') : NULL),
                'ket_lain' => (safe_post('bs_lain_input') !== '' ? safe_post('bs_lain_input') : NULL),
            )),
            'warna_kulit' => json_encode(array(
                'normal' => safe_post('wk_normal'),
                'kemerahan' => safe_post('wk_kemerahan'),
                'sianosis' => safe_post('wk_sianosis'),
                'pucat' => safe_post('wk_pucat'),
                'lain' => safe_post('wk_lain'),
                'ket_lain' => safe_post('wk_lain_input'),
            )),
            'nyeri_dada' => safe_post('nyeri_dada'),
            'ket_nyeri_dada' => safe_post('nyeri_dada_input'),
            'denyut_nadi' => safe_post('denyut_nadi'),
            'sirkulasi' => json_encode(array(
                'akral_hangat' => safe_post('s_akral_hangat'),
                'akral_dingin' => safe_post('s_akral_dingin'),
                'rasa_bebas' => safe_post('s_rasa_bebas'),
                'palpitasi' => safe_post('s_palpitasi'),
                'edema' => safe_post('s_edema'),
                'ket_edema' => safe_post('s_edema_input'),
            )),
            'pulsasi' => json_encode(array(
                'kuat' => safe_post('pulsasi_kuat'),
                'lemah' => safe_post('pulsasi_lemah'),
                'lain' => safe_post('pulsasi_lain'),
                'ket_lain' => safe_post('pulsasi_lain_input'),
            )),
            'mulut' => json_encode(array(
                'tidak_ada_kelainan' => safe_post('mulut_tidak_ada_kelainan'),
                'simetris' => safe_post('mulut_simetris'),
                'asimetris' => safe_post('mulut_asimetris'),
                'mukosa' => safe_post('mulut_mukosa'),
                'bibir_pucat' => safe_post('mulut_bibir_pucat'),
                'lain' => safe_post('mulut_lain'),
                'ket_lain' => safe_post('mulut_lain_input'),
            )),
            'gigi' => json_encode(array(
                'tidak_ada_kelainan' => safe_post('gigi_tidak_ada_kelainan'),
                'caries' => safe_post('gigi_caries'),
                'goyang' => safe_post('gigi_goyang'),
                'palsu' => safe_post('gigi_palsu'),
                'lain' => safe_post('gigi_lain'),
                'ket_lain' => safe_post('gigi_lain_input'),
            )),
            'lidah' => json_encode(array(
                'tidak_ada_kelainan' => safe_post('lidah_tidak_ada_kelainan'),
                'kotor' => safe_post('lidah_kotor'),
                'gerakan_asimetris' => safe_post('lidah_gerakan_asimetris'),
                'lain' => safe_post('lidah_lain'),
                'ket_lain' => safe_post('lidah_lain_input'),
            )),
            'tenggorokan' => json_encode(array(
                'gangguan_menelan' => safe_post('teng_gangguan_menelan'),
                'sakit_menelan' => safe_post('teng_sakit_menelan'),
                'lain' => safe_post('teng_lain'),
                'ket_lain' => safe_post('teng_lain_input'),
            )),
            'abdomen' => json_encode(array(
                'asites' => safe_post('abdomen_asites'),
                'tegang' => safe_post('abdomen_tegang'),
                'supel' => safe_post('abdomen_supel'),
                'lain' => safe_post('abdomen_lain'),
                'ket_lain' => safe_post('abdomen_lain_input'),
            )),
            'nafsu_makan' => safe_post('nafsu_makan'),
            'mual' => safe_post('mual'),
            'muntah' => safe_post('muntah'),
            'kesulitan_menelan' => safe_post('kesulitan_menelan'),
            'eleminasi_bab' => json_encode(array(
                'normal' => safe_post('bab_normal'),
                'konstipasi' => safe_post('bab_konstipasi'),
                'melena' => safe_post('bab_melena'),
                'inkontinensia_alvi' => safe_post('bab_inkontinensia_alvi'),
                'colostomy' => safe_post('bab_colostomy'),
                'diare' => safe_post('bab_diare'),
                'ket_diare' => safe_post('bab_diare_input'),
            )),
            'eleminasi_bak' => json_encode(array(
                'normal' => safe_post('bak_normal'),
                'hematuri' => safe_post('bak_hematuri'),
                'nokturia' => safe_post('bak_nokturia'),
                'inkontinensia_uri' => safe_post('bak_inkontinensia_uri'),
                'urostomi' => safe_post('bak_urostomi'),
                'urin_menetes' => safe_post('bak_urin_menetes'),
                'kateter_warna' => safe_post('bak_kateter_warna'),
                'ket_kateter_warna' => safe_post('bak_kateter_warna_input'),
                'kandung_kemih' => safe_post('bak_kandung_kemih'),
                'lain' => safe_post('bak_lain'),
                'ket_lain' => safe_post('bak_lain_input'),
            )),
            'tulang' => json_encode(array(
                'fraktur_terbuka' => safe_post('sm_tulang_fraktur_terbuka'),
                'fraktur_terbuka_lokasi' => safe_post('sm_tulang_fraktur_terbuka_lokasi'),
                'fraktur_tertutup' => safe_post('sm_tulang_fraktur_tertutup'),
                'fraktur_tertutup_lokasi' => safe_post('sm_tulang_fraktur_tertutup_lokasi'),
                'amputasi' => safe_post('sm_tulang_amputasi'),
                'tumor_tulang' => safe_post('sm_tulang_tumor_tulang'),
                'nyeri_tulang' => safe_post('sm_tulang_nyeri_tulang'),
            )),
            'sendi' => json_encode(array(
                'dislokasi' => safe_post('sm_sendi_dislokasi'),
                'infeksi' => safe_post('sm_sendi_infeksi'),
                'nyeri' => safe_post('sm_sendi_nyeri'),
                'oedema' => safe_post('sm_sendi_oedema'),
                'lain' => safe_post('sm_sendi_lain'),
                'ket_lain' => safe_post('sm_sendi_lain_input'),
            )),
            'integumen_warna' => json_encode(array(
                'pucat' => safe_post('si_warna_pucat'),
                'sianosis' => safe_post('si_warna_sianosis'),
                'normal' => safe_post('si_warna_normal'),
                'lain' => safe_post('si_warna_lain'),
                'ket_lain' => safe_post('si_warna_lain_input'),
            )),
            'integumen_turgor' => json_encode(array(
                'baik' => safe_post('si_turgor_baik'),
                'sedang' => safe_post('si_turgor_sedang'),
                'buruk' => safe_post('si_turgor_buruk'),
            )),
            'integumen_kulit' => json_encode(array(
                'normal' => safe_post('si_kulit_normal'),
                'kemerahan' => safe_post('si_kulit_kemerahan'),
                'lesi' => safe_post('si_kulit_lesi'),
                'luka' => safe_post('si_kulit_luka'),
                'memar' => safe_post('si_kulit_memar'),
                'petechie' => safe_post('si_kulit_petechie'),
                'bulae' => safe_post('si_kulit_bulae'),
                'lain' => safe_post('si_kulit_lain'),
                'ket_lain' => safe_post('si_kulit_lain_input'),
            )),
            'penglihatan' => json_encode(array(
                'baik' => safe_post('sin_penglihatan_baik'),
                'buram' => safe_post('sin_penglihatan_buram'),
                'tidak_bisa_melihat' => safe_post('sin_penglihatan_tidak_bisa_melihat'),
                'pakai_alat_bantu' => safe_post('sin_penglihatan_pakai_alat_bantu'),
                'hypema' => safe_post('sin_penglihatan_hypema'),
            )),
            'penciuman' => json_encode(array(
                'sekresi' => safe_post('sin_penciuman_sekresi'),
                'polip' => safe_post('sin_penciuman_polip'),
                'gangguan' => safe_post('sin_penciuman_gangguan'),
            )),
            'pendengaran' => json_encode(array(
                'kurang_jelas' => safe_post('sin_pendengaran_kurang_jelas'),
                'baik' => safe_post('sin_pendengaran_baik'),
                'tidak_bisa_dengar' => safe_post('sin_pendengaran_tidak_bisa_dengar'),
                'pakai_alat_bantu' => safe_post('sin_pendengaran_pakai_alat_bantu'),
                'nyeri_telinga' => safe_post('sin_pendengaran_nyeri_telinga'),
            )),
            'pengecap' => json_encode(array(
                'tidak_ada_kelainan' => safe_post('sin_pengecap_tidak_ada_kelainan'),
                'gangguan_fungsi' => safe_post('sin_pengecap_gangguan_fungsi'),
                'lain' => safe_post('sin_pengecap_lain'),
                'ket_lain' => safe_post('sin_pengecap_lain_input'),
            )),
            'persyarafan' => json_encode(array(
                'kesemutan' => safe_post('sp_kesemutan'),
                'kelumpuhan' => safe_post('sp_kelumpuhan'),
                'kelumpuhan_lokasi' => safe_post('sp_kelumpuhan_lokasi'),
                'kejang' => safe_post('sp_kejang'),
                'pusing' => safe_post('sp_pusing'),
                'muntah' => safe_post('sp_muntah'),
                'kaku_kuduk' => safe_post('sp_kaku_kuduk'),
                'hemiparese' => safe_post('sp_hemiparese'),
                'alasia' => safe_post('sp_alasia'),
                'tremor' => safe_post('sp_tremor'),
                'lain' => safe_post('sp_lain'),
                'ket_lain' => safe_post('sp_lain_input'),
            )),
            'reproduksi_alat' => safe_post('sr_alat'),
            'reproduksi_genital' => safe_post('sr_genital'),
            'reproduksi_payudara' => safe_post('sr_payudara'),
            'ket_reproduksi_payudara' => safe_post('sr_payudara_lain_input'),
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
            'status_keluarga' => safe_post('kel_tinggal'),
            'ket_status_keluarga' => safe_post('kel_tinggal_lain_input'),
            'tempat_tinggal' => safe_post('kel_tinggal'),
            'ket_tempat_tinggal' => safe_post('kel_tinggal_lain_input'),
            'status_hubungan_pasien' => safe_post('hubungan_dengan_keluarga'),
            'keyakinan' => safe_post('snk_keyakinan'),
            'ket_keyakinan' => safe_post('snk_keyakinan_ya_input'),
            'nilai_kepercayaan' => safe_post('snk_nilai_kepercayaan'),
            'ket_nilai_kepercayaan' => safe_post('snk_nilai_kepercayaan_ya_input'),
            'kebiasaan_keagamaan' => safe_post('snk_kebiasaan_keagamaan'),
            'wajib_ibadah' => safe_post('wajib_ibadah'),
            'ket_wajib_ibadah_halangan' => safe_post('wajib_ibadah_halangan_input'),
            'thaharoh' => safe_post('thaharoh'),
            'sholat' => safe_post('sholat'),
            'nilai_budaya' => safe_post('nilai_budaya'),
            'ket_nilai_budaya' => safe_post('nb_lain_input'),
            'budaya_pola_aktivitas' => safe_post('budaya_pola_aktivitas'),
            'pola_komunikasi' => safe_post('pola_komunikasi'),
            'ket_pola_komunikasi' => safe_post('pk_lain_input'),
            'pola_makan' => safe_post('pola_makan'),
            'makanan_pokok' => safe_post('makanan_pokok'),
            'ket_makanan_pokok' => safe_post('mp_selain_nasi_input'),
            'pantang_makanan' => safe_post('pantang_makanan'),
            'ket_pantang_makanan' => safe_post('pantang_makanan_ya_input'),
            'konsumsi_makanan_luar' => safe_post('konsumsi_makanan_luar'),
            'ket_konsumsi_makanan_luar' => safe_post('konsumsi_makanan_luar_ya_input'),
            'kepercayaan_penyakit' => safe_post('kepercayaan_penyakit'),
            'ket_kepercayaan_penyakit' => safe_post('kepercayaan_penyakit_ya_input'),
            'kewarganegaraan' => safe_post('kewarganegaraan'),
            'suku_bangsa' => safe_post('suku_bangsa'),
            'bicara' => safe_post('bicara'),
            'ket_bicara' => safe_post('bicara_input'),
            'perlu_penterjemah' => safe_post('perlu_penterjemah'),
            'perlu_penterjemah_bahasa' => safe_post('perlu_penterjemah_input'),
            'bahasa_isyarat' => safe_post('bahasa_isyarat'),
            'pemahaman_penyakit' => safe_post('pt_penyakit_perawatan'),
            'pemahaman_pengobatan' => safe_post('pt_pengobatan'),
            'pemahaman_nutrisi_diet' => safe_post('pt_nutrisi_diet'),
            'pemahaman_spiritual' => safe_post('pt_spiritual'),
            'pemahaman_peralatan_medis' => safe_post('pt_peralatan_medis'),
            'pemahaman_rehab_medik' => safe_post('pt_rehab_medik'),
            'pemahaman_manajemen_nyeri' => safe_post('pt_manajemen_nyeri'),
            'hambatan_menerima_edukasi' => json_encode(array(
                'hambatan_1' => safe_post('hambatan_edukasi_1'),
                'hambatan_2' => safe_post('hambatan_edukasi_2'),
                'hambatan_3' => safe_post('hambatan_edukasi_3'),
                'hambatan_4' => safe_post('hambatan_edukasi_4'),
                'hambatan_5' => safe_post('hambatan_edukasi_5'),
                'hambatan_6' => safe_post('hambatan_edukasi_6'),
                'hambatan_7' => safe_post('hambatan_edukasi_7'),
                'hambatan_8' => safe_post('hambatan_edukasi_8'),
                'hambatan_9' => safe_post('hambatan_edukasi_9'),
                'hambatan_10' => safe_post('hambatan_edukasi_10'),
            )),
            'sn_penurunan_bb' => (safe_post('sn_penurunan_bb') !== '' ? safe_post('sn_penurunan_bb') : NULL),
            'sn_penurunan_bb_on' => (safe_post('sn_penurunan_bb_on') !== '' ? safe_post('sn_penurunan_bb_on') : NULL),
            'sn_asupan_makan' => (safe_post('sn_asupan_makan') !== '' ? safe_post('sn_asupan_makan') : NULL),
            'sn_total' => (safe_post('sn_total') !== '' ? safe_post('sn_total') : NULL),
            'nilai_fungsi_makan' => (safe_post('nilai_pkf_makan') !== '' ? safe_post('nilai_pkf_makan') : NULL),
            'nilai_fungsi_mandi' => (safe_post('nilai_pkf_mandi') !== '' ? safe_post('nilai_pkf_mandi') : NULL),
            'nilai_fungsi_personal' => (safe_post('nilai_pkf_personal') !== '' ? safe_post('nilai_pkf_personal') : NULL),
            'nilai_fungsi_berpakaian' => (safe_post('nilai_pkf_berpakaian') !== '' ? safe_post('nilai_pkf_berpakaian') : NULL),
            'nilai_fungsi_bab' => (safe_post('nilai_pkf_bab') !== '' ? safe_post('nilai_pkf_bab') : NULL),
            'nilai_fungsi_bak' => (safe_post('nilai_pkf_bak') !== '' ? safe_post('nilai_pkf_bak') : NULL),
            'nilai_fungsi_berpindah' => (safe_post('nilai_pkf_berpindah') !== '' ? safe_post('nilai_pkf_berpindah') : NULL),
            'nilai_fungsi_toiletting' => (safe_post('nilai_pkf_toiletting') !== '' ? safe_post('nilai_pkf_toiletting') : NULL),
            'nilai_fungsi_mobilisasi' => (safe_post('nilai_pkf_mobilisasi') !== '' ? safe_post('nilai_pkf_mobilisasi') : NULL),
            'nilai_fungsi_naik_turun_tangga' => (safe_post('nilai_pkf_naikturuntangga') !== '' ? safe_post('nilai_pkf_naikturuntangga') : NULL),
            'nilai_fungsi_total' => (safe_post('total_nilai_pkf') !== '' ? safe_post('total_nilai_pkf') : NULL),
            'nilai_tingkat_nyeri' => safe_post('ptn_keterangan'),
            'nyeri_hilang' => json_encode(array(
                'minum_obat' => safe_post('ptn_minum_obat'),
                'mendengarkan_musik' => safe_post('ptn_mendengarkan_musik'),
                'istirahat' => safe_post('ptn_istirahat'),
                'berubah_posisi' => safe_post('ptn_berubah_posisi'),
                'lain' => safe_post('ptn_lain'),
                'ket_lain' => safe_post('ptn_lain_input'),
            )),
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
            'prjd_nilai_total' => (safe_post('prjd_jumlah_skor') !== '' ? safe_post('prjd_jumlah_skor') : NULL),
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
            'prjl_nilai_total' => (safe_post('prjl_jumlah') !== '' ? safe_post('prjl_jumlah') : NULL),
            'skrining_pasien_akhir_kehidupan' => json_encode(array(
                'kriteria_1' => safe_post('spak_1'),
                'kriteria_2' => safe_post('spak_2'),
                'kriteria_3' => safe_post('spak_3'),
                'kriteria_4' => safe_post('spak_4'),
                'kriteria_5' => safe_post('spak_5'),
            )),
            'pk_geriatri' => json_encode(array(
                'gangguan_penglihatan' => safe_post('pk_geriatri_1'),
                'ket_gangguan_penglihatan' => safe_post('pk_geriatri_1_input'),
                'gangguan_pendengaran' => safe_post('pk_geriatri_2'),
                'ket_gangguan_pendengaran' => safe_post('pk_geriatri_2_input'),
                'gangguan_berkemih' => safe_post('pk_geriatri_3'),
                'ket_gangguan_berkemih' => array(
                    'inkontinensia' => safe_post('pk_geriatri_inkontinensia'),
                    'disuria' => safe_post('pk_geriatri_disuria'),
                    'oliguria' => safe_post('pk_geriatri_oliguria'),
                    'anuria' => safe_post('pk_geriatri_anuria'),
                ),
                'gangguan_daya_ingat' => safe_post('pk_geriatri_4'),
                'ket_gangguan_daya_ingat' => safe_post('pk_geriatri_4_input'),
                'gangguan_bicara' => safe_post('pk_geriatri_5'),
                'ket_gangguan_bicara' => safe_post('pk_geriatri_5_input'),
            )),
            'pk_penyakit_menular' => json_encode(array(
                // pasien mengetahui penyakit saat ini
                'penyakit_saat_ini' => safe_post('pk_penyakit_menular_1'),
                // sumber informasi tentang penyakit diperoleh dari
                'informasi_dari' => array(
                    'dokter' => safe_post('pk_pm_dokter'),
                    'perawat' => safe_post('pk_pm_perawat'),
                    'keluarga' => safe_post('pk_pm_keluarga'),
                    'lain' => safe_post('pk_pm_lain'),
                    'ket_lain' => safe_post('pk_pm_lain_input'),
                ),
                // menerima informasi jangka waktu pengobatan
                'informasi_jangka_waktu' => safe_post('pk_penyakit_menular_3'),
                'ket_informasi_jangka_waktu' => safe_post('pk_penyakit_menular_3_input'),
                // melakukan pemeriksaan rutin
                'pemeriksaan_rutin' => safe_post('pk_penyakit_menular_4'),
                'ket_pemeriksaan_rutin' => safe_post('pk_penyakit_menular_4_input'),
                'cara_penularan' => array(
                    'airbone' => safe_post('pk_pm_airbone'),
                    'droplet' => safe_post('pk_pm_droplet'),
                    'kontak_langsung' => safe_post('pk_pm_kontak_langsung'),
                    'cairan_tubuh' => safe_post('pk_pm_cairan_tubuh'),
                ),
                'penyakit_penyerta' => safe_post('pk_penyakit_menular_6'),
                'ket_penyakit_penyerta' => safe_post('pk_penyakit_menular_6_input'),
            )),
            'pk_penurunan_daya_tahan' => json_encode(array(
                // pasien mengetahui penyakit saat ini
                'penyakit_saat_ini' => safe_post('pk_penyakit_pdtt_1'),
                // sumber informasi tentang penyakit diperoleh dari
                'informasi_dari' => array(
                    'dokter' => safe_post('pk_pdtt_dokter'),
                    'perawat' => safe_post('pk_pdtt_perawat'),
                    'keluarga' => safe_post('pk_pdtt_keluarga'),
                    'lain' => safe_post('pk_pdtt_lain'),
                    'ket_lain' => safe_post('pk_pdtt_lain_input'),
                ),
                // menerima informasi jangka waktu pengobatan
                'informasi_jangka_waktu' => safe_post('pk_penyakit_pdtt_3'),
                'ket_informasi_jangka_waktu' => safe_post('pk_penyakit_pdtt_3_input'),
                // melakukan pemeriksaan rutin
                'pemeriksaan_rutin' => safe_post('pk_penyakit_pdtt_4'),
                'ket_pemeriksaan_rutin' => safe_post('pk_penyakit_pdtt_4_input'),
                'penyakit_penyerta' => safe_post('pk_penyakit_pdtt_5'),
                'ket_penyakit_penyerta' => safe_post('pk_penyakit_pdtt_5_input'),
            )),
            'pk_kesehatan_jiwa' => json_encode(array(
                'ket_1' => safe_post('pk_kesehatan_jiwa_1'),
                'ket_2' => safe_post('pk_kesehatan_jiwa_2'),
                'ket_3' => safe_post('pk_kesehatan_jiwa_3'),
                'ket_4' => safe_post('pk_kesehatan_jiwa_4'),
                'ket_5' => safe_post('pk_kesehatan_jiwa_5'),
                'ket_6' => safe_post('pk_kesehatan_jiwa_6'),
                'ket_7' => safe_post('pk_kesehatan_jiwa_7'),
                'ket_8' => safe_post('pk_kesehatan_jiwa_8'),
                'ket_9' => safe_post('pk_kesehatan_jiwa_9'),
            )),
            'pk_pasien_kekerasan' => json_encode(array(
                'ket_1' => safe_post('pk_pasien_kekerasan_1'),
                'ket_2' => safe_post('pk_pasien_kekerasan_2'),
                'ket_3' => safe_post('pk_pasien_kekerasan_3'),
                'ket_4' => safe_post('pk_pasien_kekerasan_4'),
                'ket_5' => safe_post('pk_pasien_kekerasan_5'),
                'ket_6' => safe_post('pk_pasien_kekerasan_6'),
            )),
            'pk_pasien_ketergantungan' => json_encode(array(
                'obat' => safe_post('pk_pasien_ketergantungan_obat'),
                'ket_obat' => safe_post('pk_pasien_ketergantungan_obat_input'),
                'lama_ketergantungan' => safe_post('pk_pasien_lama_ketergantungan_obat_input'),
            )),
            // skala early warning system
            'sew_laju_respirasi' => safe_post('laju_respirasi'),
            'sew_saturasi' => safe_post('saturasi'),
            'sew_suplemen' => safe_post('suplemen'),
            'sew_temperatur' => safe_post('temperatur'),
            'sew_tds' => safe_post('tds'),
            'sew_laju_jantung' => safe_post('laju_jantung'),
            'sew_kesadaran' => safe_post('kesadaran'),
            'sew_total' => safe_post('total_skala'),

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
            'perencanaan_pulang' => json_encode(array(
                'planning_1' => safe_post('discharge_planning_1'),
                'planning_2' => safe_post('discharge_planning_2'),
                'planning_3' => safe_post('discharge_planning_3'),
                'planning_4' => safe_post('discharge_planning_4'),
                'kriteria' => array(
                    'kriteria_1' => safe_post('kriteria_discharge_1'),
                    'kriteria_2' => safe_post('kriteria_discharge_2'),
                    'kriteria_3' => safe_post('kriteria_discharge_3'),
                    'kriteria_4' => safe_post('kriteria_discharge_4'),
                    'kriteria_5' => safe_post('kriteria_discharge_5'),
                    'kriteria_6' => safe_post('kriteria_discharge_6'),
                    'kriteria_7' => safe_post('kriteria_discharge_7'),
                    'kriteria_8' => safe_post('kriteria_discharge_8'),
                    'kriteria_9' => safe_post('kriteria_discharge_9'),
                    'kriteria_lain' => safe_post('kriteria_discharge_lain_input'),
                ),
            )),
            'id_perawat' => (safe_post('perawat') !== '' ? safe_post('perawat') : NULL),
            'id_verifikasi_dokter_dpjp' => (safe_post('verifikasi_dokter_dpjp') !== '' ? safe_post('verifikasi_dokter_dpjp') : NULL),
        );

        $id_kajian_medis = safe_post('id_kajian_medis');

        // update alergi pasien
        $this->load->model('pelayanan/Pelayanan_model', 'm_pelayanan');
        $this->m_pelayanan->updateAlergiPasien(safe_post('id_pasien'), safe_post('riwayat_alergi'));
        // cek profil pasien
        $checkProfilPasien = $this->db->query("select * from sm_profil_pasien where id_pasien = '" . safe_post('id_pasien') . "'")->row();
        $dataProfilPasien = array(
            'id_pasien' => safe_post('id_pasien'),
            'tinggi_badan' => safe_post('tinggi_badan') !== '' ? safe_post('tinggi_badan') : NULL,
            'berat_badan'  => safe_post('berat_badan') !== '' ? safe_post('berat_badan') : NULL,
        );
        if ($checkProfilPasien) :
            $this->db->where('id_pasien', safe_post('id_pasien'), true)->update('sm_profil_pasien', $dataProfilPasien);
        else :
            $this->db->insert('sm_profil_pasien', $dataProfilPasien);
        endif;

        $data_kajian_medis = array(
            'id_layanan_pendaftaran' => $id_layanan_pendaftaran,
            'waktu_pengkajian' => (safe_post('waktu_kajian_medis') !== '' ? datetime2mysql(safe_post('waktu_kajian_medis')) : NULL),
            'keluhan_utama' => safe_post('keluhan_utama_medis'),
            'riwayat_penyakit_sekarang' => safe_post('rps_medis'),
            'riwayat_penyakit_terdahulu' => safe_post('rpt_medis'),
            'pengobatan' => safe_post('pengobatan_medis'),
            'riwayat_alergi' => safe_post('riwayat_alergi'),
            'riwayat_penyakit_keluarga' => json_encode(array(
                'hasil' => safe_post('rpk_medis'),
                'asma' => safe_post('rpk_medis_asma'),
                'dm' => safe_post('rpk_medis_dm'),
                'cardiovascular' => safe_post('rpk_medis_cardiovascular'),
                'kanker' => safe_post('rpk_medis_kanker'),
                'thalasemia' => safe_post('rpk_medis_thalasemia'),
                'lain' => safe_post('rpk_medis_lain'),
                'ket_lain' => safe_post('rpk_medis_lain_input'),
            )),
            'riwayat' => safe_post('riwayat'),
            'kesadaran' => json_encode(array(
                'composmentis' => safe_post('composmentis_medis'),
                'apatis' => safe_post('apatis_medis'),
                'samnolen' => safe_post('samnolen_medis'),
                'sopor' => safe_post('sopor_medis'),
                'koma' => safe_post('koma_medis'),
            )),
            'pf_kepala' => safe_post('pf_kepala'),
            'ket_pf_kepala' => safe_post('ket_pf_kepala'),
            'pf_mata' => safe_post('pf_mata'),
            'ket_pf_mata' => safe_post('ket_pf_mata'),
            'pf_hidung' => safe_post('pf_hidung'),
            'ket_pf_hidung' => safe_post('ket_pf_hidung'),
            'pf_gigi_mulut' => safe_post('pf_gigi_mulut'),
            'ket_pf_gigi_mulut' => safe_post('ket_pf_gigi_mulut'),
            'pf_tenggorokan' => safe_post('pf_tenggorokan'),
            'ket_pf_tenggorokan' => safe_post('ket_pf_tenggorokan'),
            'pf_telinga' => safe_post('pf_telinga'),
            'ket_pf_telinga' => safe_post('ket_pf_telinga'),
            'pf_leher' => safe_post('pf_leher'),
            'ket_pf_leher' => safe_post('ket_pf_leher'),
            'pf_thorax' => safe_post('pf_thorax'),
            'ket_pf_thorax' => safe_post('ket_pf_thorax'),
            'pf_jantung' => safe_post('pf_jantung'),
            'ket_pf_jantung' => safe_post('ket_pf_jantung'),
            'pf_paru' => safe_post('pf_paru'),
            'ket_pf_paru' => safe_post('ket_pf_paru'),
            'pf_abdomen' => safe_post('pf_abdomen'),
            'ket_pf_abdomen' => safe_post('ket_pf_abdomen'),
            'pf_genitalia_anus' => safe_post('pf_genitalia'),
            'ket_pf_genitalia_anus' => safe_post('ket_pf_genitalia'),
            'pf_ekstermitas' => safe_post('pf_ekstermitas'),
            'ket_pf_ekstermitas' => safe_post('ket_pf_ekstermitas'),
            'pf_kulit' => safe_post('pf_kulit'),
            'ket_pf_kulit' => safe_post('ket_pf_kulit'),
            'hasil_laboratorium' => safe_post('hasil_lab'),
            'hasil_radiologi' => safe_post('hasil_rad'),
            'hasil_penunjang_lain' => safe_post('hasil_pen_lain'),
            'diagnosa_awal' => safe_post('diag_awal'),
            'rencana_edukasi' => safe_post('rencana_edukasi_medis'),
            'rencana_pemeriksaan_penunjang' => safe_post('rencana_pemeriksaan_penunjang'),
            'rencana_terapi' => safe_post('rencana_terapi'),
            'rencana_konsultasi' => safe_post('rencana_konsultasi'),
            'perkiraan_lama_rawat' => safe_post('perkiraan_lama_rawat'),
            'ditetapkan_berapa_hari' => safe_post('ditetapkan_berapa_hari'),
            'tanggal_rencana_pulang' => (safe_post('tanggal_rencana_pulang') !== '' ? date2mysql(safe_post('tanggal_rencana_pulang')) : NULL),
            'alasan_belum_ditetapkan' => safe_post('alasan_belum_ditetapkan'),
            'id_dokter_dpjp' => (safe_post('dokter_dpjp') !== '' ? safe_post('dokter_dpjp') : NULL),
            // 'ttd_dokter_dpjp' => safe_post('ttd_dokter_dpjp'),
            'id_dokter_pengkajian' => (safe_post('dokter_pengkajian') !== '' ? safe_post('dokter_pengkajian') : NULL),
            // 'ttd_dokter_pengkajian' => safe_post('ttd_dokter_pengkajian'),
        );

        $sign = $this->db->select('kkr.waktu_ttd_perawat, kkr.ttd_perawat, kkr.waktu_ttd_verifikasi_dokter_dpjp, kkr.ttd_verifikasi_dokter_dpjp, kmr.waktu_ttd_dokter_dpjp, kmr.ttd_dokter_dpjp, kmr.waktu_ttd_dokter_pengkajian, kmr.ttd_dokter_pengkajian')
            ->from('sm_kajian_keperawatan_icare as kkr')
            ->join('sm_kajian_medis_icare as kmr', 'kmr.id_layanan_pendaftaran = kkr.id_layanan_pendaftaran')
            ->where('kkr.id_layanan_pendaftaran', $id_layanan_pendaftaran)
            ->get()
            ->row();
        // var_dump($sign); die;
        if (isset($sign)) :
            if ($sign->waktu_ttd_perawat !== NULL) :
                $data_kajian_keperawatan['waktu_ttd_perawat'] = $sign->waktu_ttd_perawat;
            else :
                $data_kajian_keperawatan['waktu_ttd_perawat'] = (safe_post('tanggal_ttd_perawat') !== '' ? datetime2mysql(safe_post('tanggal_ttd_perawat')) : NULL);
            endif;

            if ($sign->ttd_perawat !== NULL) :
                $data_kajian_keperawatan['ttd_perawat'] = $sign->ttd_perawat;
            else :
                $data_kajian_keperawatan['ttd_perawat'] = (safe_post('ttd_perawat') !== '' ? safe_post('ttd_perawat') : NULL);
            endif;

            if ($sign->waktu_ttd_verifikasi_dokter_dpjp !== NULL) :
                $data_kajian_keperawatan['waktu_ttd_verifikasi_dokter_dpjp'] = $sign->waktu_ttd_verifikasi_dokter_dpjp;
            else :
                $data_kajian_keperawatan['waktu_ttd_verifikasi_dokter_dpjp'] = (safe_post('tanggal_verifikasi_dokter_dpjp') !== '' ? datetime2mysql(safe_post('tanggal_verifikasi_dokter_dpjp')) : NULL);
            endif;

            if ($sign->ttd_verifikasi_dokter_dpjp !== NULL) :
                $data_kajian_keperawatan['ttd_verifikasi_dokter_dpjp'] = $sign->ttd_verifikasi_dokter_dpjp;
            else :
                $data_kajian_keperawatan['ttd_verifikasi_dokter_dpjp'] = (safe_post('ttd_verifikasi_dokter_dpjp') !== '' ? safe_post('ttd_verifikasi_dokter_dpjp') : NULL);
            endif;

            if ($sign->waktu_ttd_dokter_dpjp !== NULL) :
                $data_kajian_medis['waktu_ttd_dokter_dpjp'] = $sign->waktu_ttd_dokter_dpjp;
            else :
                $data_kajian_medis['waktu_ttd_dokter_dpjp'] = (safe_post('tanggal_ttd_dokter_dpjp') !== '' ? datetime2mysql(safe_post('tanggal_ttd_dokter_dpjp')) : NULL);
            endif;

            if ($sign->ttd_dokter_dpjp !== NULL) :
                $data_kajian_medis['ttd_dokter_dpjp'] = $sign->ttd_dokter_dpjp;
            else :
                $data_kajian_medis['ttd_dokter_dpjp'] = (safe_post('ttd_dokter_dpjp') !== '' ? safe_post('ttd_dokter_dpjp') : NULL);
            endif;

            if ($sign->waktu_ttd_dokter_pengkajian !== NULL) :
                $data_kajian_medis['waktu_ttd_dokter_pengkajian'] = $sign->waktu_ttd_dokter_pengkajian;
            else :
                $data_kajian_medis['waktu_ttd_dokter_pengkajian'] = (safe_post('tanggal_ttd_dokter_pengkajian') !== '' ? datetime2mysql(safe_post('tanggal_ttd_dokter_pengkajian')) : NULL);
            endif;

            if ($sign->ttd_dokter_pengkajian !== NULL) :
                $data_kajian_medis['ttd_dokter_pengkajian'] = $sign->ttd_dokter_pengkajian;
            else :
                $data_kajian_medis['ttd_dokter_pengkajian'] = (safe_post('ttd_dokter_pengkajian') !== '' ? safe_post('ttd_dokter_pengkajian') : NULL);
            endif;
        else :
            $data_kajian_keperawatan['waktu_ttd_perawat'] = (safe_post('tanggal_ttd_perawat') !== '' ? datetime2mysql(safe_post('tanggal_ttd_perawat')) : NULL);
            $data_kajian_keperawatan['waktu_ttd_verifikasi_dokter_dpjp'] = (safe_post('tanggal_verifikasi_dokter_dpjp') !== '' ? datetime2mysql(safe_post('tanggal_verifikasi_dokter_dpjp')) : NULL);
            $data_kajian_keperawatan['ttd_perawat'] = (safe_post('ttd_perawat') !== '' ? safe_post('ttd_perawat') : NULL);
            $data_kajian_keperawatan['ttd_verifikasi_dokter_dpjp'] = (safe_post('ttd_verifikasi_dokter_dpjp') !== '' ? safe_post('ttd_verifikasi_dokter_dpjp') : NULL);

            $data_kajian_medis['waktu_ttd_dokter_dpjp'] = (safe_post('tanggal_ttd_dokter_dpjp') !== '' ? datetime2mysql(safe_post('tanggal_ttd_dokter_dpjp')) : NULL);
            $data_kajian_medis['waktu_ttd_dokter_pengkajian'] = (safe_post('tanggal_ttd_dokter_pengkajian') !== '' ? datetime2mysql(safe_post('tanggal_ttd_dokter_pengkajian')) : NULL);
            $data_kajian_medis['ttd_dokter_dpjp'] = (safe_post('ttd_dokter_dpjp') !== '' ? safe_post('ttd_dokter_dpjp') : NULL);
            $data_kajian_medis['ttd_dokter_pengkajian'] = (safe_post('ttd_dokter_pengkajian') !== '' ? safe_post('ttd_dokter_pengkajian') : NULL);
        endif;

        $response = $this->m_intensive_care->updatePengkajianAwalIcare($data_kajian_keperawatan, $data_kajian_medis, $id_kajian_keperawatan, $id_kajian_medis);
        $this->response($response, REST_Controller::HTTP_OK);
    }

    // surat kontrol
    function simpan_surat_kontrol_post()
    {
        $data = array(
            'id_pendaftaran' => safe_post('id_pendaftaran'),
            'id_layanan_pendaftaran' => safe_post('id_layanan_pendaftaran'),
            'tanggal' => date2mysql(safe_post('tanggal_kontrol')),
            'id_spesialisasi' => safe_post('poli_auto'),
            'id_user' => $this->session->userdata('id_translucent'),
            'jenis' => 'Surat Kontrol',
        );

        $data = $this->m_intensive_care->updateSuratKontrol($data);
        $this->response($data, REST_Controller::HTTP_OK);
    }

    function get_surat_kontrol_get()
    {
        if (!$this->get('id_pendaftaran') || !$this->get('id_layanan_pendaftaran')) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
        endif;

        $data = $this->m_intensive_care->getDataSuratKontrol($this->get('id_pendaftaran'), $this->get('id_layanan_pendaftaran'));
        $this->response($data, REST_Controller::HTTP_OK);
    }
    // end surat kontrol

    private function start($page)
    {
        return (($page - 1) * $this->limit);
    }

    function tindakan_icare_get()
    {
        $q = safe_get('q');
        $start = $this->start(safe_get('page'));
        $limit = 20;
        $data = $this->m_intensive_care->getPemeriksaanIcare($q, $start, $limit);
        if ((safe_get('page') == 1) & ($q == '')) {
            $pilih[] = array(
                'id'             => '',
                'layanan'        => '',
                'layanan_parent' => '',
                'total'          => '',
            );

            $data['data'] = array_merge($pilih, $data['data']);
            $data['total'] += 1;
        }
        $this->response($data, REST_Controller::HTTP_OK);
    }

    // Get data from Resume Medis
    function resume_medis_get()
    {
        $this->load->model('pendaftaran/Pendaftaran_model', 'm_pendaftaran');

        $data['pendaftaran_detail'] = [];
        $data['resume_medis']       = [];
        $data['diagnosa_utama']     = '';
        $data['diagnosa_sekunder']  = '';
        $data['ds_manual_utama']    = '';
        $data['ds_manual_sekunder'] = '';
        $data['diagnosa_utama_instalasi_lainnya'] = '';
        $data['tindakan_lab']       = [];
        $data['tindakan_rad']       = [];
        $data['tindakan_ok']        = [];
        $data['tindakan']           = [];
        $data['kontrol_resume']     = [];
        $data['kontrol_resume_keperawatan'] = [];
        $data['terapi_resume']      = [];
        $data['terapi_resume_keperawatan'] = [];

        $data['pendaftaran_detail'] = $this->m_pendaftaran->getPendaftaranDetail($this->get('id', true), $this->get('id_layanan_pendaftaran', true));


        $cekDaftar = $this->m_intensive_care->cekDaftar($this->get('id', true));

        if (!empty($cekDaftar)) {

            $idLayanan           = (int) $cekDaftar[0]->id;
            $diagnosaUtama       = $this->m_intensive_care->getDiagnosaUtama($idLayanan);
            $diagnosaUtamaManual = $this->m_intensive_care->getDiagnosaManualAwal($idLayanan);

            if (isset($diagnosaUtama[0]->nama)) {

                $data['diag_awal'] = $diagnosaUtama[0]->nama;
            } else {

                $data['diagnosa_awal'] = null;
            }
        } else {

            $diagnosaUtama       = $this->m_intensive_care->getDiagnosaUtama($this->get('id_layanan_pendaftaran', true));
            $diagnosaUtamaManual = $this->m_intensive_care->getDiagnosaManualAwal($this->get('id_layanan_pendaftaran', true));

            if (isset($diagnosaUtama[0]->nama)) {

                $data['diagnosa_awal'] = $diagnosaUtama[0]->nama;
            } else {

                $data['diagnosa_awal'] = null;
            }
        }
        if (isset($diagnosaUtamaManual[0]->nama_manual)) {

            $data['diag_manual'] = $diagnosaUtamaManual[0]->nama_manual;
        } else {

            $data['diag_manual'] = null;
        }

        $cekLaboratorium = $this->m_intensive_care->cekLaboratorium($this->get('id', true));

        $this->load->model('pelayanan/Pelayanan_model', 'm_pelayanan');
        $this->load->model('hasil_laboratorium/Hasil_laboratorium_model', 'm_hasil_laboratorium');
        $data_lis = $this->m_pelayanan->getLIS();

        $this->url  = $data_lis->url;
        $this->user = $data_lis->user;
        $this->pass = $data_lis->pass;

        if (!empty($cekLaboratorium)) {

            foreach ($cekLaboratorium as $j => $key) {

                $detail_lab = $this->m_hasil_laboratorium->getDetailLaboratorium($key->id);
                $status_lis = $detail_lab->status_lis;

                $ch = curl_init();
                curl_setopt_array($ch, array(
                    CURLOPT_URL            => $this->url . '/api/result/ono/' . $key->kode . '/view/',
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_USERAGENT,
                    'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13',
                    CURLOPT_ENCODING       => "",
                    CURLOPT_MAXREDIRS      => 10,
                    CURLOPT_TIMEOUT        => 120,
                    CURLOPT_HTTP_VERSION   => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST  => "GET",
                    CURLOPT_HTTPHEADER     => array(
                        'x-username: ' . $this->user . '',
                        'x-password: ' . $this->pass . ''
                    ),
                ));
                $response        = curl_exec($ch);
                $response_status = curl_getinfo($ch, CURLINFO_RESPONSE_CODE);

                if ($response === false) {

                    curl_close($ch); // close cURL handler

                    if ($status_lis === "1") {

                        $data_lab            = $this->m_hasil_laboratorium->getItemDetailLaboratorium($key->id);
                        $dataResponse[]      = $data_lab;
                        $dataOno[]           = $key->kode;
                        $dataPesan[]         = "Gagal Menghubungi LIS, data sinkronisasi";
                        $data_status         = false;
                        $data_laboratorium[] = null;
                    } else {

                        $dataResponse[]      = null;
                        $data_status         = false;
                        $dataOno[]           = $key->kode;
                        $dataPesan[]         = "Gagal Menghubungi LIS, belum ada data sinkronisasi";
                        $data_laboratorium[] = null;
                    }
                } else {

                    $response_getinfo = curl_getinfo($ch, CURLINFO_RESPONSE_CODE);

                    if ($response_getinfo === 200) {

                        $dataOno[]           = $key->kode;
                        $dataPesan[]         = null;
                        $data_laboratorium[] = json_decode($response);
                        $data_status[]       = true;

                        curl_close($ch);
                    } else {

                        curl_close($ch);
                        $dataResponse[]      = null;
                        $data_status[]       = true;
                        $dataOno[]           = $key->kode;
                        $dataPesan[]         = "Belum ada Hasil Lab";
                        $data_laboratorium[] = null;
                    }
                }
            }

            if (!empty($data_laboratorium) && $response !== false) {

                foreach ($data_laboratorium as $j => $k) {

                    if (!empty($k->ono)) {

                        $dataONO[] = $k->ono;

                        $dataKdetail[] = $k->detail;
                    }
                }

                foreach ($dataONO as $n => $o) {
                    foreach ($dataKdetail[$n] as $p => $q) {
                        $dataResponse[] = [
                            'flag'         => $q->flag,
                            'order_testnm' => $q->order_testnm,
                            'test_comment' => $q->test_comment,
                            'test_cd'      => $q->test_cd,
                            'test_group'   => $q->test_group,
                            'nama'         => $this->m_hasil_laboratorium->getDataItemPemeriksaan($q->test_cd),
                            'result_value' => $q->result_value,
                            'ref_range'    => $q->ref_range,
                            'unit'         => $q->unit,
                            'disp_seq'     => $q->disp_seq,
                            'ono'          => $o,
                            'release'      => $q->authorise
                        ];
                    }
                }
            }


            $data['resume_lab'] = array_values(array_filter($dataResponse));
            $data['status_lab'] = $data_status;
            $data['pesan_lab']  = $dataPesan;
        }

        $idDaftar = (int) $this->get('id', true);

        $cekRadiologi = $this->m_intensive_care->cekRadiologi($idDaftar);

        if (!empty($cekRadiologi)) {
            $data['cek_radiologi'] = $cekRadiologi;
        }

        // $cekPengobatan = $this->m_intensive_care->getPengobatan($idDaftar);
        $cekPengobatan = $this->m_intensive_care->getPengobatanNew($idDaftar);
        if (!empty($cekPengobatan)) {
            $data['cek_obat'] = $cekPengobatan;
        }

        $resume_medis = $this->m_intensive_care->getResumeMedis($this->get('id', true));

        if (!empty($resume_medis)) {

            $data['resume_medis'] = $resume_medis[0];
            $data['resume_medis']->cara_keluar = $this->db->get_where('sm_layanan_pendaftaran', ['id' => $this->get('id_layanan_pendaftaran')])->row()->tindak_lanjut;
            $data['resume_medis']->id_cppt = $this->m_intensive_care->cekCPPT($this->get('id', true));
            $data['resume_medis']->id_radiologi = $this->m_intensive_care->cekHasilRadiologi($this->get('id', true));
            $data['resume_medis']->id_laboratorium = $this->m_intensive_care->cekHasilLaboratorium($this->get('id', true));
        }


        $diagnosa_utamas = $this->db->select(" concat_ws ('. ', ( SELECT gss.kode_icdx_rinci FROM sm_golongan_sebab_sakit AS gss WHERE gss.ID = d.id_pengkodean ), ( SELECT gss.kode_icdx_rinci FROM sm_golongan_sebab_sakit AS gss WHERE gss.ID = d.id_pengkodean_asterik ), gss.nama ) AS nama, lp.id as id_layanan_pendaftaran ")
            ->from('sm_diagnosa as d')
            ->join('sm_golongan_sebab_sakit as gss', 'gss.id = d.id_golongan_sebab_sakit', 'left')
            ->join('sm_layanan_pendaftaran as lp', 'lp.id = d.id_layanan_pendaftaran', 'left')
            ->join('sm_pendaftaran as pd', 'pd.id = lp.id_pendaftaran', 'left')
            ->where('lp.id_pendaftaran', $this->get('id', true), true)
            ->where('d.prioritas', 'Utama')
            ->where('d.diagnosa_manual <>', '1')
            ->where('d.is_resume', '1')
            ->order_by('lp.id', 'desc')
            ->limit(1)
            ->get()
            ->result();

        //			foreach ($diagnosa_utamas as $diagnosa_utama) {
        //				$data['diagnosa_utama'] .= $diagnosa_utama->nama . '. ' . '<br>';
        //			}

        $diagnosa_manual_utamas = $this->db->select(" concat_ws ('. ', ( SELECT gss.kode_icdx_rinci FROM sm_golongan_sebab_sakit AS gss WHERE gss.ID = d.id_pengkodean ), ( SELECT gss.kode_icdx_rinci FROM sm_golongan_sebab_sakit AS gss WHERE gss.ID = d.id_pengkodean_asterik ), d.golongan_sebab_sakit_lain ) AS nama, lp.id as id_layanan_pendaftaran ")
            ->from('sm_diagnosa as d')
            ->join('sm_layanan_pendaftaran as lp', 'lp.id = d.id_layanan_pendaftaran', 'left')
            ->join('sm_pendaftaran as pd', 'pd.id = lp.id_pendaftaran', 'left')
            ->where('lp.id_pendaftaran', $this->get('id', true), true)
            ->where('d.prioritas', 'Utama')
            ->where('d.diagnosa_manual', '1')
            ->where('d.is_resume', '1')
            // ->where("lp.jenis_layanan not in('Poliklinik', 'IGD')")
            ->order_by('lp.id', 'desc')
            ->limit(1)
            ->get()
            ->result();

        //			foreach ($diagnosa_manual_utamas as $diagnosa_manual_utama) {
        //				$data['diagnosa_manual_utama'] .= $diagnosa_manual_utama->nama . '. ' . '<br>';
        //			}

        $data['diagnosa_utama'] = array_merge($diagnosa_utamas, $diagnosa_manual_utamas);
        usort($data['diagnosa_utama'], function ($a, $b) {
            return strcmp($b->id_layanan_pendaftaran, $a->id_layanan_pendaftaran);
        });

        $diagnosa_sekunders = $this->db->select("distinct concat_ws ('. ', ( SELECT gss.kode_icdx_rinci FROM sm_golongan_sebab_sakit AS gss WHERE gss.ID = d.id_pengkodean ), ( SELECT gss.kode_icdx_rinci FROM sm_golongan_sebab_sakit AS gss WHERE gss.ID = d.id_pengkodean_asterik ), gss.nama ) AS nama ")
            ->from('sm_diagnosa as d')
            ->join('sm_golongan_sebab_sakit as gss', 'gss.id = d.id_golongan_sebab_sakit', 'left')
            ->join('sm_layanan_pendaftaran as lp', 'lp.id = d.id_layanan_pendaftaran', 'left')
            ->join('sm_pendaftaran as pd', 'pd.id = lp.id_pendaftaran', 'left')
            ->where('lp.id_pendaftaran', $this->get('id', true), true)
            ->where('d.prioritas', 'Sekunder')
            ->where('d.is_resume', '1')
            ->where('d.diagnosa_manual <>', '1')
            // ->where("lp.jenis_layanan not in('Poliklinik', 'IGD')")
            ->get()
            ->result();

        foreach ($diagnosa_sekunders as $diagnosa_sekunder) {
            $data['diagnosa_sekunder'] .= $diagnosa_sekunder->nama . '. ' . '<br>';
        }

        $diagnosa_manual_sekunders = $this->db->select("distinct concat_ws ('. ', ( SELECT gss.kode_icdx_rinci FROM sm_golongan_sebab_sakit AS gss WHERE gss.ID = d.id_pengkodean ), ( SELECT gss.kode_icdx_rinci FROM sm_golongan_sebab_sakit AS gss WHERE gss.ID = d.id_pengkodean_asterik ), d.golongan_sebab_sakit_lain ) AS nama ")
            ->from('sm_diagnosa as d')
            ->join('sm_layanan_pendaftaran as lp', 'lp.id = d.id_layanan_pendaftaran', 'left')
            ->join('sm_pendaftaran as pd', 'pd.id = lp.id_pendaftaran', 'left')
            ->where('lp.id_pendaftaran', $this->get('id', true), true)
            ->where('d.prioritas', 'Sekunder')
            ->where('d.is_resume', '1')
            ->where('d.diagnosa_manual', '1')
            // ->where("lp.jenis_layanan not in('Poliklinik', 'IGD')")
            ->get()
            ->result();

        foreach ($diagnosa_manual_sekunders as $diagnosa_manual_sekunder) {
            $data['ds_manual_sekunder'] .= $diagnosa_manual_sekunder->nama . '. ' . '<br>';
        }

        $diagnosa_utama_instalasi_lainnya = $this->db->query(" select concat_ws ('. ', ( SELECT gss.kode_icdx_rinci FROM sm_golongan_sebab_sakit AS gss WHERE gss.id = d.id_pengkodean ), ( SELECT gss.kode_icdx_rinci FROM sm_golongan_sebab_sakit AS gss WHERE gss.id = d.id_pengkodean_asterik ), d.golongan_sebab_sakit_lain ) AS nama  , lp.id as id_layanan_pendaftaran
            from sm_diagnosa d
            join sm_layanan_pendaftaran lp ON lp.id = d.id_layanan_pendaftaran 
            join sm_pendaftaran pd ON pd.id = lp.id_pendaftaran 
            where lp.id_pendaftaran = '" . $this->get('id', true) . "'
            and lp.jenis_layanan not in('Poliklinik', 'IGD')
            and d.is_resume = '1'
            and d.prioritas = 'Utama'")->result();

        $layananDeleted = $diagnosa_utamas[0]->id_layanan_pendaftaran ?? $diagnosa_manual_utamas[0]->id_layanan_pendaftaran ?? null;

        $filter_duil = array_values(array_filter($diagnosa_utama_instalasi_lainnya, function ($value) use ($layananDeleted) {
            return $value->id_layanan_pendaftaran != $layananDeleted;
        }));

        foreach ($filter_duil as $value) {
            $data['diagnosa_utama_instalasi_lainnya'] .= $value->nama . '. ' . '<br>';
        }


        $tindakan_oks = $this->m_intensive_care->getTindakanOperasi($this->get('id', true));
        if (!empty($tindakan_oks)) {
            $data['tindakan_ok'] = $tindakan_oks;
        }

        $tindakan = $this->m_intensive_care->getTindakan($this->get('id', true));
        if (!empty($tindakan)) {
            $data['tindakan'] = $tindakan;
        }
        $kontrolresume = $this->m_intensive_care->getResumeMedisKontrol($this->get('id', true));
        if (!empty($kontrolresume)) {
            $data['kontrol_resume'] = $kontrolresume;
        }

        $kontrolresumeKeperawatan = $this->m_intensive_care->getKeperawatanKontrol($this->get('id_layanan_pendaftaran'));
        if (!empty($kontrolresumeKeperawatan)) {
            $data['kontrol_resume_keperawatan'] = $kontrolresumeKeperawatan;
        }

        // old
        // $terapiResume = $this->m_intensive_care->getResumeTerapiPulang( $this->get( 'id_layanan_pendaftaran' ) );
        // if ( ! empty( $terapiResume ) ) {
        // 	$data['terapi_resume'] = $terapiResume;
        // }
        $terapiResume = $this->m_intensive_care->getObatTerapiPulang($this->get('id_layanan_pendaftaran'));
        if (!empty($terapiResume)) {
            $data['terapi_resume'] = $terapiResume;
        }
        $terapiResumeKeperawatan = $this->m_intensive_care->getKeperawatanPulang($this->get('id_layanan_pendaftaran'));
        if (!empty($terapiResumeKeperawatan)) {
            $data['terapi_resume_keperawatan'] = $terapiResumeKeperawatan;
        }

        if ($data != null) {
            $this->response($data, REST_Controller::HTTP_OK);
        } else {
            $this->response($data, REST_Controller::HTTP_OK);
        }
    }

    function simpan_resume_medis_intensive_care_post()
    {

        $this->db->trans_begin();
        $layanan = array('id' => safe_post('id_layanan_pendaftaran'));
        $id = $layanan['id'];

        $ringkasanRiwayat = safe_post('ringkasan_riwayat');
        $pemeriksaanFisik = safe_post('pemeriksaan_fisik');

        if ($ringkasanRiwayat !== null) {

            $filterRingkasan = $this->filterForm($ringkasanRiwayat);
        }

        if ($pemeriksaanFisik !== null) {

            $filterPemeriksaan = $this->filterForm($pemeriksaanFisik);
        }


        $checkDataResumeMedisRanap =  $this->db->select("*")
            ->from('sm_resume_medis_intensive_care')
            ->where('id_layanan_pendaftaran', $id, true)
            ->get()->row();

        if ($checkDataResumeMedisRanap == NULL) {

            $data = array( //3355 3610
                'id_pendaftaran'                    => safe_post('id_pendaftaran'),
                'id_layanan_pendaftaran'            => safe_post('id_layanan_pendaftaran'),
                'diagnosa_awal_masuk'               => safe_post('diagnosis_waktu_masuk_rs') == '' ? null : safe_post('diagnosis_waktu_masuk_rs'),
                'hasil_konsultasi'                  => safe_post('hasil_konsultasi_rm') == '' ? null : safe_post('hasil_konsultasi_rm'),
                'alergi_obat'                       => safe_post('alergi_obat_rm') == '' ? null : safe_post('alergi_obat_rm'),
                'diet'                              => safe_post('diet_rm') == '' ? null : safe_post('diet_rm'),
                'ringkasan_riwayat'                 => (safe_post('ringkasan_riwayat') !== '' ? $filterRingkasan : NULL),
                'pemeriksaan_fisik'                 => (safe_post('pemeriksaan_fisik') !== '' ? $filterPemeriksaan : NULL),
                'penunjang_diagnostik'              => safe_post('penunjang_diagnostik') == '' ? null : safe_post('penunjang_diagnostik'),
                'pending_lab'                       => safe_post('pending_lab') == '' ? null : safe_post('pending_lab'),
                'anjuran_edukasi'                   => safe_post('anjuran_edukasi_rm') == '' ? null : safe_post('anjuran_edukasi_rm'),
                'kondisi_waktu_keluar'              => safe_post('kondisi_waktu_keluar') == '' ? null : safe_post('kondisi_waktu_keluar'),
                'pengobatan_dilanjutkan'            => safe_post('pengobatan_dilanjutkan') == '' ? null : safe_post('pengobatan_dilanjutkan'),
                'cara_terapi_pengobatan'            => safe_post('cara_terapi_pengobatan_rm') !== '' ? safe_post('cara_terapi_pengobatan_rm') : NULL,
                'id_users'                          => safe_post('user_account') !== '' ? safe_post('user_account') : NULL,
                'created_date'                      => $this->datetime,

            );

            $this->db->insert('sm_resume_medis_intensive_care', $data);
        } else {
            $data = array(
                'id_pendaftaran'                    => safe_post('id_pendaftaran'),
                'diagnosa_awal_masuk'               => safe_post('diagnosis_waktu_masuk_rs') == '' ? null : safe_post('diagnosis_waktu_masuk_rs'),
                'hasil_konsultasi'                  => safe_post('hasil_konsultasi_rm') == '' ? null : safe_post('hasil_konsultasi_rm'),
                'alergi_obat'                       => safe_post('alergi_obat_rm') == '' ? null : safe_post('alergi_obat_rm'),
                'diet'                              => safe_post('diet_rm') == '' ? null : safe_post('diet_rm'),
                'ringkasan_riwayat'                 => (safe_post('ringkasan_riwayat') !== '' ? $filterRingkasan : NULL),
                'pemeriksaan_fisik'                 => (safe_post('pemeriksaan_fisik') !== '' ? $filterPemeriksaan : NULL),
                'penunjang_diagnostik'              => safe_post('penunjang_diagnostik') == '' ? null : safe_post('penunjang_diagnostik'),
                'pending_lab'                       => safe_post('pending_lab') == '' ? null : safe_post('pending_lab'),
                'anjuran_edukasi'                   => safe_post('anjuran_edukasi_rm') == '' ? null : safe_post('anjuran_edukasi_rm'),
                'kondisi_waktu_keluar'              => safe_post('kondisi_waktu_keluar') == '' ? null : safe_post('kondisi_waktu_keluar'),
                'pengobatan_dilanjutkan'            => safe_post('pengobatan_dilanjutkan') == '' ? null : safe_post('pengobatan_dilanjutkan'),
                'cara_terapi_pengobatan'            => safe_post('cara_terapi_pengobatan_rm') !== '' ? safe_post('cara_terapi_pengobatan_rm') : NULL,
                'id_users'                          => safe_post('user_account') !== '' ? safe_post('user_account') : NULL,
                'created_date'                      => $this->datetime,
            );

            $this->db->where('id_layanan_pendaftaran', safe_post('id_layanan_pendaftaran'));
            $this->db->update('sm_resume_medis_intensive_care', $data);
        }

        $ek_kontrol_dokter_resume = safe_post('ambil_tanggal_kontrol');

        if ($ek_kontrol_dokter_resume) {

            $ek_kontrol = array_filter($ek_kontrol_dokter_resume);

            if ($ek_kontrol_dokter_resume === "" || $ek_kontrol_dokter_resume === null) {

                $ek_dokter = null;
            } else if (!is_array($ek_kontrol_dokter_resume)) {


                $ek_dokter = null;
            } else if (empty($ek_kontrol_dokter_resume)) {


                $ek_dokter = null;
            } else if (empty($ek_kontrol)) {


                $ek_dokter = null;
            } else {

                foreach ($ek_kontrol_dokter_resume as $key => $value) {

                    $date = new DateTime($value);
                    $new = $date->format('Y-m-d H:i:s');


                    $ek_dokter[$key] = $new;
                }
            }

            $tanggal_dibuat = safe_post('tanggal_dibuat');

            $ek_tanggal_dibuat = array_filter($tanggal_dibuat);

            if ($tanggal_dibuat === "" || $tanggal_dibuat === null) {

                $dibuat_tanggal = null;
            } else if (!is_array($tanggal_dibuat)) {


                $dibuat_tanggal = null;
            } else if (empty($tanggal_dibuat)) {


                $dibuat_tanggal = null;
            } else if (empty($ek_tanggal_dibuat)) {


                $dibuat_tanggal = null;
            } else {

                foreach ($tanggal_dibuat as $key => $value) {

                    $date = new DateTime($value);
                    $new = $date->format('Y-m-d H:i:s');


                    $dibuat_tanggal[$key] = $new;
                }
            }
            $jadwal_kontrol_resume = array(
                'id_layanan_pendaftaran' => safe_post('id_layanan_pendaftaran'),
                'id_pendaftaran'         => safe_post('id_pendaftaran'),
                'tanggal_kontrol'        => $ek_dokter,
                'id_ek_nama_dokter'      => safe_post('ek_nama_dokter_resume') !== '' ? safe_post('ek_nama_dokter_resume') : null,
                'id_users'               => safe_post('ek_operator') !== '' ? safe_post('ek_operator') : null,
                'tempat_kontrol'         => safe_post('ek_tempat_kontrol') !== '' ? safe_post('ek_tempat_kontrol') : null,
                'created_date'           => $dibuat_tanggal,
            );

            $this->m_intensive_care->updateJadwalKontrolResumeMedis($jadwal_kontrol_resume);
            $this->m_intensive_care->insertJadwalKontrolKeperawatan($jadwal_kontrol_resume);
        }

        $obat_rm = safe_post('id_obat_rm');
        if ($obat_rm) {
            $terapi_pulang_rm = array(
                'id_layanan_pendaftaran' => safe_post('id_layanan_pendaftaran'),
                'obat'                   => safe_post('id_obat_rm') !== '' ? safe_post('id_obat_rm') : null,
                'jumlah_obat'            => safe_post('jumlah_obat_rm') !== '' ? safe_post('jumlah_obat_rm') : null,
                'dosis'                  => safe_post('dosis_rm') !== '' ? safe_post('dosis_rm') : null,
                'frekuensi'              => safe_post('frekuensi_rm') !== '' ? safe_post('frekuensi_rm') : null,
                'cara_pemberian'         => safe_post('cara_pemberian_rm') !== '' ? safe_post('cara_pemberian_rm') : null,
                'ek_jam_pemberian'       => safe_post('ek_jam_pemberian_rm') !== '' ? safe_post('ek_jam_pemberian_rm') : null,
                'ek_jam_pemberian_satu'  => safe_post('ek_jam_pemberian_satu_rm') !== '' ? safe_post('ek_jam_pemberian_satu_rm') : null,
                'ek_jam_pemberian_dua'   => safe_post('ek_jam_pemberian_dua_rm') !== '' ? safe_post('ek_jam_pemberian_dua_rm') : null,
                'ek_jam_pemberian_tiga'  => safe_post('ek_jam_pemberian_tiga_rm') !== '' ? safe_post('ek_jam_pemberian_tiga_rm') : null,
                'ek_jam_pemberian_empat' => safe_post('ek_jam_pemberian_empat_rm') !== '' ? safe_post('ek_jam_pemberian_empat_rm') : null,
                'ek_jam_pemberian_lima'  => safe_post('ek_jam_pemberian_lima_rm') !== '' ? safe_post('ek_jam_pemberian_lima_rm') : null,
                'petunjuk_khusus'        => safe_post('petunjuk_khusus_rm') !== '' ? safe_post('petunjuk_khusus_rm') : null,
                'id_users'               => safe_post('trp_users') !== '' ? safe_post('trp_users') : null,
            );

            $this->m_intensive_care->updateTerapiPulangRM($terapi_pulang_rm);
            $this->m_intensive_care->insertTerapiPulangKeperawatan($terapi_pulang_rm);
        }

        if ($this->db->trans_status() === false) :
            $this->db->trans_rollback();
            $this->load->model('logs/Logs_model', 'm_logs');
            $status = false;
            $message = 'Gagal Simpan Form Resume Medis';
        else :
            $this->db->trans_commit();
            $status = true;
            $message = 'Berhasil Form Resume Medis';
        endif;

        $this->response(array('status' => $status, 'message' => $message), REST_Controller::HTTP_OK);
    }

    function filterForm($text)
    {

        $filter = preg_replace('/[^a-z0-9A-Z\%\/\:\-\+\(\)\.\"\\<\>\', ]+/', '', $text);

        return $filter;
    }

    function hapus_terapi_pulang_rm_delete($id, $idKeperawatan)
    {
        $this->db->trans_begin();
        $this->db->where("id", $id)->delete("sm_resume_medis_terapi_pulang");
        if ($idKeperawatan !== 'undefined') {
            $this->db->where("id", $idKeperawatan)->delete("sm_terapi_pulang");
        }
        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            $status  = false;
            $message = 'Gagal menghapus Terapi Pulang!';
        } else {
            $this->db->trans_commit();
            $status  = true;
            $message = 'Berhasil menghapus Terapi Pulang';
        }
        $response = array('status' => $status, 'message' => $message);
        $this->response($response, REST_Controller::HTTP_OK);
    }

    function hapus_kontrol_kembali_rm_delete($id, $idKeperawatan)
    {
        $this->db->trans_begin();
        $this->db->where("id", $id)->delete("sm_resume_medis_kontrol_ranap");
        if ($idKeperawatan !== 'undefined') {
            $this->db->where("id", $idKeperawatan)->delete("sm_jadwal_kontrol_keperawatan");
        }

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            $status  = false;
            $message = 'Gagal menghapus Terapi Pulang!';
        } else {
            $this->db->trans_commit();
            $status  = true;
            $message = 'Berhasil menghapus Terapi Pulang';
        }

        $response = array('status' => $status, 'message' => $message);
        $this->response($response, REST_Controller::HTTP_OK);
    }


    // CPPRI WH IC     
    function simpan_checklist_penerimaan_pasien_rawat_inap_post()
    {
        $checkData = '';
        // var_dump($checkData);die; WH
        $checkData = $this->m_intensive_care->getChecklistPenerimaanPasienRawatInapById(safe_post('id_layanan_pendaftaran'));

        $this->db->trans_begin();
        if ($checkData == null) {
            $data = array(
                'id_layanan_pendaftaran'          => safe_post('id_layanan_pendaftaran'),
                'is_pasien'                       => safe_post('is_paasien') == '' ? null : safe_post('is_paasien'),
                'nama_keluarga'                   => safe_post('nama_keluarga') == '' ? null : safe_post('nama_keluarga'),
                'perawat_yang_merawat'            => safe_post('informasi_tentang_perawat_yang_merawat_hari_ini') == '' ? null : safe_post('informasi_tentang_perawat_yang_merawat_hari_ini'),
                'dokter_yang_merawat'             => safe_post('informasi_tentang_dokter_yang_merawat') == '' ? null : safe_post('informasi_tentang_dokter_yang_merawat'),
                'nurse_station'                   => safe_post('nurse_station') == '' ? null : safe_post('nurse_station'),
                'kamar_mandi_pasien'              => safe_post('kamar_mandi_pasien') == '' ? null : safe_post('kamar_mandi_pasien'),
                'bel_pasien'                      => safe_post('bel_di_kamar_mandi') == '' ? null : safe_post('bel_di_kamar_mandi'),
                'tempat_tidur_pasien'             => safe_post('tempat_tidur_pasien') == '' ? null : safe_post('tempat_tidur_pasien'),
                'remote'                          => safe_post('remote_tv_ac') == '' ? null : safe_post('remote_tv_ac'),
                'tempat_ibadah'                   => safe_post('tempat_ibadah') == '' ? null : safe_post('tempat_ibadah'),
                'tempat_sampah'                   => safe_post('tempat_sampah_infeksi_dan_non_infeksi') == '' ? null : safe_post('tempat_sampah_infeksi_dan_non_infeksi'),
                'jadwal_pembagian'                => safe_post('jadwal_pembagian_makan_dari_rumah_sakit') == '' ? null : safe_post('jadwal_pembagian_makan_dari_rumah_sakit'),
                'jadwal_visit'                    => safe_post('jadwal_visit_dokter') == '' ? null : safe_post('jadwal_visit_dokter'),
                'jadwal_jam_berkunjung'           => safe_post('jadwal_jam_berkunjung') == '' ? null : safe_post('jadwal_jam_berkunjung'),
                'jadwal_ganti_linen'              => safe_post('jadwal_ganti_linen') == '' ? null : safe_post('jadwal_ganti_linen'),
                'membawa_barang_sesuai_keperluan' => safe_post('perawat_menjelaskan_untuk_membawa_barang_sesuai_keperluan') == '' ? null : safe_post('perawat_menjelaskan_untuk_membawa_barang_sesuai_keperluan'),
                'mematuhi_peraturan'              => safe_post('perawat_menghimbau_untuk_mematuhi_peraturan_yang_tertempel_di_ruangan') == '' ? null : safe_post('perawat_menghimbau_untuk_mematuhi_peraturan_yang_tertempel_di_ruangan'),
                'tidak_duduk_ditempat_tidur'      => safe_post('menghimbau_tidak_duduk_ditempat_tidur') == '' ? null : safe_post('menghimbau_tidak_duduk_ditempat_tidur'),
                'menyimpan_barang_berharga'       => safe_post('tidak_diperkenankan_menyimpan_barang_berharga') == '' ? null : safe_post('tidak_diperkenankan_menyimpan_barang_berharga'),
                'dapat_kartu_penunggu'            => safe_post('mendapat_kartu_penunggu') == '' ? null : safe_post('mendapat_kartu_penunggu'),
                'menghargai_privasi_pasien'       => safe_post('untuk_selalu_menghargai_privasi_pasien') == '' ? null : safe_post('untuk_selalu_menghargai_privasi_pasien'),
                'gelang'                          => safe_post('pemasangan_dan_fungsi_gelang') == '' ? null : safe_post('pemasangan_dan_fungsi_gelang'),
                'cuci_tangan'                     => safe_post('cara_cuci_tangan') == '' ? null : safe_post('cara_cuci_tangan'),
                'updated_on'                      => $this->datetime,
            );

            $this->db->insert('sm_form_checklist_penerimaan_pasien_rawat_inap', $data);
        } else {
            $data = array(
                'is_pasien'                       => safe_post('is_paasien') == '' ? null : safe_post('is_paasien'),
                'nama_keluarga'                   => safe_post('nama_keluarga') == '' ? null : safe_post('nama_keluarga'),
                'perawat_yang_merawat'            => safe_post('informasi_tentang_perawat_yang_merawat_hari_ini') == '' ? null : safe_post('informasi_tentang_perawat_yang_merawat_hari_ini'),
                'dokter_yang_merawat'             => safe_post('informasi_tentang_dokter_yang_merawat') == '' ? null : safe_post('informasi_tentang_dokter_yang_merawat'),
                'nurse_station'                   => safe_post('nurse_station') == '' ? null : safe_post('nurse_station'),
                'kamar_mandi_pasien'              => safe_post('kamar_mandi_pasien') == '' ? null : safe_post('kamar_mandi_pasien'),
                'bel_pasien'                      => safe_post('bel_di_kamar_mandi') == '' ? null : safe_post('bel_di_kamar_mandi'),
                'tempat_tidur_pasien'             => safe_post('tempat_tidur_pasien') == '' ? null : safe_post('tempat_tidur_pasien'),
                'remote'                          => safe_post('remote_tv_ac') == '' ? null : safe_post('remote_tv_ac'),
                'tempat_ibadah'                   => safe_post('tempat_ibadah') == '' ? null : safe_post('tempat_ibadah'),
                'tempat_sampah'                   => safe_post('tempat_sampah_infeksi_dan_non_infeksi') == '' ? null : safe_post('tempat_sampah_infeksi_dan_non_infeksi'),
                'jadwal_pembagian'                => safe_post('jadwal_pembagian_makan_dari_rumah_sakit') == '' ? null : safe_post('jadwal_pembagian_makan_dari_rumah_sakit'),
                'jadwal_visit'                    => safe_post('jadwal_visit_dokter') == '' ? null : safe_post('jadwal_visit_dokter'),
                'jadwal_jam_berkunjung'           => safe_post('jadwal_jam_berkunjung') == '' ? null : safe_post('jadwal_jam_berkunjung'),
                'jadwal_ganti_linen'              => safe_post('jadwal_ganti_linen') == '' ? null : safe_post('jadwal_ganti_linen'),
                'membawa_barang_sesuai_keperluan' => safe_post('perawat_menjelaskan_untuk_membawa_barang_sesuai_keperluan') == '' ? null : safe_post('perawat_menjelaskan_untuk_membawa_barang_sesuai_keperluan'),
                'mematuhi_peraturan'              => safe_post('perawat_menghimbau_untuk_mematuhi_peraturan_yang_tertempel_di_ruangan') == '' ? null : safe_post('perawat_menghimbau_untuk_mematuhi_peraturan_yang_tertempel_di_ruangan'),
                'tidak_duduk_ditempat_tidur'      => safe_post('menghimbau_tidak_duduk_ditempat_tidur') == '' ? null : safe_post('menghimbau_tidak_duduk_ditempat_tidur'),
                'menyimpan_barang_berharga'       => safe_post('tidak_diperkenankan_menyimpan_barang_berharga') == '' ? null : safe_post('tidak_diperkenankan_menyimpan_barang_berharga'),
                'dapat_kartu_penunggu'            => safe_post('mendapat_kartu_penunggu') == '' ? null : safe_post('mendapat_kartu_penunggu'),
                'menghargai_privasi_pasien'       => safe_post('untuk_selalu_menghargai_privasi_pasien') == '' ? null : safe_post('untuk_selalu_menghargai_privasi_pasien'),
                'gelang'                          => safe_post('pemasangan_dan_fungsi_gelang') == '' ? null : safe_post('pemasangan_dan_fungsi_gelang'),
                'cuci_tangan'                     => safe_post('cara_cuci_tangan') == '' ? null : safe_post('cara_cuci_tangan'),
                'updated_on'                      => $this->datetime,
            );

            $this->db->where('id_layanan_pendaftaran', safe_post('id_layanan_pendaftaran'));
            $this->db->update('sm_form_checklist_penerimaan_pasien_rawat_inap', $data);
        }

        if ($this->db->trans_status() === false) :
            $this->db->trans_rollback();
            $status  = false;
            $message = 'Gagal simpan form checklist penerimaan pasien rawat inap';
        else :
            $this->db->trans_commit();
            $status  = true;
            $message = 'Berhasil simpan form checklist penerimaan pasien rawat inap';
        endif;

        $this->response(array('status' => $status, 'message' => $message), REST_Controller::HTTP_OK);
    }




    // CPPRI WH  IC
    function check_checklist_penerimaan_pasien_rawat_inap_get()
    {
        $data = [];
        $data = $this->m_intensive_care->getChecklistPenerimaanPasienRawatInapById($this->get('id'));

        if ($data != null) {
            $this->response($data[0], REST_Controller::HTTP_OK);
        } else {
            $this->response($data, REST_Controller::HTTP_OK);
        }
    }

    public function get_jadwal_dokter_get()
    {
        $id_layanan = $this->get('id_layanan_pendaftaran');
        if (
            !$id_layanan
        ) {
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);

            return;
        }

        $jadwal_dokter = $this->db->select('tanggal')
            ->from('sm_layanan_pendaftaran slp')
            ->join('sm_jadwal_dokter sjd', 'slp.id_dokter = sjd.id_dokter')
            ->where('date(tanggal) >= ', date('Y-m-d', strtotime('+7 days')))
            ->where('slp.id', $id_layanan)
            ->get()->result();
        $data_jadwal   = [];
        foreach ($jadwal_dokter as $jadwal) {
            $data_jadwal[] = $jadwal->tanggal;
        }

        $poli_dokter = $this->db->select('ss.nama, ss.id')
            ->from('sm_layanan_pendaftaran slp')
            ->join('sm_tenaga_medis stm', 'slp.id_dokter = stm.id')
            ->join('sm_spesialisasi ss', 'slp.id_unit_layanan = ss.id')
            ->where('slp.id', $id_layanan)
            ->get()->row();

        $this->response(
            [
                'status'        => TRUE,
                'jadwal_dokter' => $data_jadwal,
                'poli_dokter'   => $poli_dokter
            ],
            self::HTTP_OK
        );
    }
}
