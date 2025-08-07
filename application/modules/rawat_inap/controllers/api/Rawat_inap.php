<?php

defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';
// SPPRAPS WH 
require APPPATH . '/libraries/Redis.php';

use Restserver\Libraries\REST_Controller;

/**
 * @package         CodeIgniter
 * @subpackage      Rest Server
 * @category        Controller
 * @author          Faiz Muhammad Syam
 * @license         Syams Corporation
 */
class Rawat_inap extends REST_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->limit = 10;
        // SPPRAPS WH 
        $this->redis = new CI_Redis();
        $this->datetime = date('Y-m-d H:i:s');
        $this->load->model('Rawat_inap_model', 'm_rawat_inap');
        $this->load->model('pemeriksaan_igd/Pemeriksaan_igd_model', 'm_pemeriksaan_igd');

        $id_translucent = $this->session->userdata('id_translucent');
        if (empty($id_translucent)) :
            $this->response(array('error' => 'Anda belum login'), REST_Controller::HTTP_UNAUTHORIZED);
            exit();
        endif;

        $this->load->model('vclaim_bpjs/Sep_v2_model', 'm_sep_v2');
        $this->load->model('pelayanan/Pelayanan_model', 'm_pelayanan');
        $this->load->model('booking_poliklinik/Booking_poliklinik_model', 'm_booking');

        $this->bpjs_configv2 = $this->m_pelayanan->getConfigBPJSVclaim2();
        $this->bpjs_config = (object) [
            'server'     => 'https://apijkn.bpjs-kesehatan.go.id/vclaim-rest',
            'cons_id'    => 22178,
            'secret_key' => '5xJF9FD078',
            'no_ppk'     => '0223R038',
            'user_key'   => '80d402801bf7653318ee305235880de8'
        ];
    }

    // SPPRAPS WH 
    private function start($page)
    {
        return (($page - 1) * $this->limit);
    }

    function get_list_rawat_inap_get()
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
            'list_admin'    => !isset($_GET['status_ranap']) ? 'Ya' : 'Tidak',
            'key'            => isset($_GET['key']) ? safe_get('key') : '',
            'status_ranap'    => isset($_GET['status_ranap']) ? safe_get('status_ranap') : NULL,
            'no_sep'        => isset($_GET['no_sep']) ? safe_get('no_sep') : '',
            'jenis_sep'        => isset($_GET['jenis_sep']) ? safe_get('jenis_sep') : '',
            'status_pasien_ranap' => safe_get('status_pasien_ranap'),

        ];

        if ($this->session->userdata('id_account_group') != 1) :
            $search['status_keluar_not'] = 'Batal';
        endif;

        $data            = $this->m_rawat_inap->getListDataRawatInap($this->limit, $start, $search);
        $data['page']    = (int) $this->get('page');
        $data['limit']   = $this->limit;

        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK); // (200)
        endif;
    }

    function get_list_sep_rawat_inap_get()
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
            'list_admin'    => !isset($_GET['status_ranap']) ? 'Ya' : 'Tidak',
            'key'            => isset($_GET['key']) ? safe_get('key') : '',
            'status_ranap'    => isset($_GET['status_ranap']) ? safe_get('status_ranap') : NULL,
            'no_sep'           => isset($_GET['no_sep']) ? safe_get('no_sep') : '',
            'sep_asal'      => isset($_GET['sep_asal']) ? safe_get('sep_asal') : '',
            'jenis_sep'        => isset($_GET['jenis_sep']) ? safe_get('jenis_sep') : '',
            'status_pasien_ranap' => safe_get('status_pasien_ranap'),
            'asal' => $this->get('asal')
        ];

        if ($this->session->userdata('id_account_group') != 1) :
            $search['status_keluar_not'] = 'Batal';
        endif;

        $data            = $this->m_rawat_inap->getListSepDataRawatInap($this->limit, $start, $search);
        $data['page']    = (int) $this->get('page');
        $data['limit']   = $this->limit;

        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK); // (200)
        endif;
    }

    function get_data_pengkajian_awal_anak_get()
    {
        if (!$this->get('id')) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
        endif;

        $this->load->model('pendaftaran/Pendaftaran_model', 'm_pendaftaran');
        $this->load->model('pelayanan/Pelayanan_model', 'm_pelayanan');
        $data                                       = $this->m_pendaftaran->getPendaftaranDetail($this->get('id', true), $this->get('id_layanan', true));
        $data['profil']                             = $this->m_pelayanan->getProfilPasien($data['pasien']->id_pasien);
        $data['kajian_perawat_anak']                = $this->m_rawat_inap->getKajianKeperawatanAnak($this->get('id', true));
        $data['kajian_medis_anak']                  = $this->m_rawat_inap->getKajianMedisAnak($this->get('id', true));
        $data['kajian_perawat_logs_anak']           = $this->m_rawat_inap->getKajianKeperawatanAnakLogs($this->get('id', true));
        $data['kajian_medis_logs_anak']             = $this->m_rawat_inap->getKajianMedisAnakLogs($this->get('id', true));
        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK); // (200)
        endif;
    }

    function pembatalan_rawat_inap_get()
    {
        if (!$this->get('id_layanan_pendaftaran', true)) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
        endif;

        $id_layanan_pendaftaran = $this->get('id_layanan_pendaftaran', true);
        $status = $this->m_rawat_inap->pembatalanRawatInap($id_layanan_pendaftaran);
        // catat log transaksi batalnya
        $this->load->model('logs/Logs_model', 'm_logs');
        $this->m_logs->recordAdminLogs($id_layanan_pendaftaran, 'Batal Rawat Inap');
        $this->response(array('status' => $status), REST_Controller::HTTP_OK);
    }

    function konfirmasi_masuk_rawat_inap_post()
    {
        if (!$this->post('id_rawat_inap', true)) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
        endif;

        $this->db->trans_begin();
        $id_rawat_inap = $this->post('id_rawat_inap', true);
        $dataRanap = $this->db->where('id', $id_rawat_inap, true)->get('sm_rawat_inap')->row();
        if (!empty($dataRanap->id_bed)) :
            // update data table rawat inap nya
            $dataUpdateRanap = array('konfirmasi_ranap' => 'Ya', 'waktu_konfirmasi_ranap' => $this->datetime);
            $this->db->where('id', $id_rawat_inap, true)->update('sm_rawat_inap', $dataUpdateRanap);

            // update juga table bed nya
            $dataUpdateBed = array('keterangan' => 'Terpakai');
            $this->db->where('id', $dataRanap->id_bed, true)->update('sm_bed', $dataUpdateBed);
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

    function update_waktu_rawat_inap_post()
    {
        if (safe_post('id_layanan_pendaftaran') === '') :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
        endif;

        $id_layanan_pendaftaran = safe_post('id_layanan_pendaftaran');
        $updateWaktu = array(
            // 'waktu_masuk' => safe_post('waktu_masuk'), 
            // waktu konfirmasi ranap menjadi waktu ranap
            'waktu_konfirmasi_ranap' => safe_post('waktu_masuk'),
            'waktu_keluar' => safe_post('waktu_keluar') !== '' ? safe_post('waktu_keluar') : NULL
        );

        $dataRanap = $this->db->where('id_layanan_pendaftaran', $id_layanan_pendaftaran, true)->get('sm_rawat_inap')->row();
        $catatan = "Sebelum edit : Waktu Masuk " . indo_time($dataRanap->waktu_konfirmasi_ranap) . ", Waktu Keluar " . ($dataRanap->waktu_keluar !== NULL ? indo_time($dataRanap->waktu_keluar) : '-');
        $catatan .= "<br>Setelah edit : Waktu Masuk " . indo_time($updateWaktu['waktu_konfirmasi_ranap']) . ", Waktu Keluar " . ($updateWaktu['waktu_keluar'] !== NULL ? indo_time($updateWaktu['waktu_keluar']) : '-');
        $status = $this->m_rawat_inap->updateWaktuRawatInap($id_layanan_pendaftaran, $updateWaktu);
        // record logs
        $this->load->model('logs/Logs_model', 'm_logs');
        $this->m_logs->recordAdminLogs($id_layanan_pendaftaran, 'Edit Waktu Rawat Inap', $catatan);
        $response = array('id' => $id_layanan_pendaftaran, 'status' => $status);
        $this->response($response, REST_Controller::HTTP_OK);
    }

    function reset_status_bed_get()
    {
        if (!$this->get('id_rawat_inap', true)) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
        endif;

        $id_rawat_inap = $this->get('id_rawat_inap', true);
        $status = $this->m_rawat_inap->resetStatusBed($id_rawat_inap);
        $this->response(array('status' => $status), REST_Controller::HTTP_OK);
    }

    function get_data_pengkajian_awal_ranap_get()
    {
        if (!$this->get('id')) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
        endif;

        $this->load->model('pendaftaran/Pendaftaran_model', 'm_pendaftaran');
        $this->load->model('pelayanan/Pelayanan_model', 'm_pelayanan');
        $data                                       = $this->m_pendaftaran->getPendaftaranDetail($this->get('id', true), $this->get('id_layanan', true));
        $data['profil']                             = $this->m_pelayanan->getProfilPasien($data['pasien']->id_pasien);
        $data['kajian_perawat']                     = $this->m_rawat_inap->getKajianKeperawatan($this->get('id', true));
        $data['kajian_medis']                       = $this->m_rawat_inap->getKajianMedis($this->get('id', true));
        $data['kajian_perawat_logs']                = $this->m_rawat_inap->getKajianKeperawatanLogs($this->get('id', true));
        $data['kajian_medis_logs']                  = $this->m_rawat_inap->getKajianMedisLogs($this->get('id', true));
        $data['pengkajian_spiritual_pasien_pulang'] = $this->m_rawat_inap->getPengkajianSpiritualPasienPulang($this->get('id', true));
        $data['indikasi_pasien_masuk_icu']          = $this->m_rawat_inap->getIndikasiPasienMasukICU($this->get('id', true), $this->get('id_layanan', true));
        $data['pemberian_informasi_pasien']         = $this->m_rawat_inap->getPemberianInformasiPasien($this->get('id', true));
        // $data['resume_medis_ranap']                 = $this->m_rawat_inap->getResumeMedisRanap($data['layanan']->id);

        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK); // (200)
        endif;
    }

    function get_history_logs_pengkajian_awal_anak_get()
    {
        if (!$this->get('id_layanan_pendaftaran', true)) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
        endif;

        $id_layanan_pendaftaran = $this->get('id_layanan_pendaftaran', true);

        $data['kajian_perawat_logs_anak'] = $this->m_rawat_inap->getKajianKeperawatanAnakLogs($id_layanan_pendaftaran);
        $data['kajian_medis_logs_anak'] = $this->m_rawat_inap->getKajianMedisAnakLogs($id_layanan_pendaftaran);

        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK); // (200)
        endif;
    }







    
    // PARI 
    function get_data_pengkajian_awal_rawat_inapw_get(){
        if (!$this->get('id')) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
        endif;

        $this->load->model('pendaftaran/Pendaftaran_model', 'm_pendaftaran');
        $this->load->model('pelayanan/Pelayanan_model', 'm_pelayanan');
        $data                                       = $this->m_pendaftaran->getPendaftaranDetail($this->get('id', true), $this->get('id_layanan', true));
        $data['profil']                             = $this->m_pelayanan->getProfilPasien($data['pasien']->id_pasien);
        $data['kajian_perawat']                     = $this->m_rawat_inap->getKajianKeperawatan($this->get('id', true));
        $data['kajian_medis']                       = $this->m_rawat_inap->getKajianMedis($this->get('id', true));
        $data['kajian_perawat_logs']                = $this->m_rawat_inap->getKajianKeperawatanLogs($this->get('id', true));
        $data['kajian_medis_logs']                  = $this->m_rawat_inap->getKajianMedisLogs($this->get('id', true));
        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK); // (200)
        endif;
    }

    // PARI
    function get_history_logs_pengkajian_awal_ranap_get(){
        if (!$this->get('id_layanan_pendaftaran', true)) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
        endif;

        $id_layanan_pendaftaran = $this->get('id_layanan_pendaftaran', true);

        $data['kajian_perawat_logs'] = $this->m_rawat_inap->getKajianKeperawatanLogs($id_layanan_pendaftaran);
        $data['kajian_medis_logs'] = $this->m_rawat_inap->getKajianMedisLogs($id_layanan_pendaftaran);

        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK); // (200)
        endif;
    }

    // PARI BARU 
    function simpan_pengkajian_awal_ranap_post() {
        if (safe_post('id_layanan_pendaftaran') === '') {
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
            return;
        }
    
        $id_layanan_pendaftaran = safe_post('id_layanan_pendaftaran');
        $id_kajian_keperawatan = safe_post('id_kajian_keperawatan');
        $id_kajian_medis = safe_post('id_kajian_medis');
    
        // Data Kajian Keperawatan
        $data_kajian_keperawatan = array(
            'id_layanan_pendaftaran' => $id_layanan_pendaftaran,
            'waktu_pengkajian' => safe_post('waktu_pengkajian') !== '' ? datetime2mysql(safe_post('waktu_pengkajian')) : NULL,

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

            'tinggi_badan' 			=> safe_post('tinggi_badan') == '' ? null : safe_post('tinggi_badan'),
            'berat_badan' 			=> safe_post('berat_badan') == '' ? null : safe_post('berat_badan'),

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
                'produktif' => safe_post('bs_produktif'),
                'non_produktif' => safe_post('bs_non_produktif'),
                'hemaptoe' => safe_post('bs_hemaptoe'),
                'lain' => safe_post('bs_lain'),
                'ket_lain' => safe_post('bs_lain_input'),
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

            // PARI
            'sew_laju_respirasi'    => safe_post('respirasinewst'),
            'sew_saturasi'          => safe_post('spskalat'),
            'sew_suplemen'          => safe_post('spskalappokt'),
            'sew_temperatur'        => safe_post('suplementt'),
            'sew_tds'               => safe_post('tdssistolikt'),
            'sew_laju_jantung'      => safe_post('nadiwst'),
            'sew_kesadaran'         => safe_post('kesadaranwst'),
            'suhunewst'             => safe_post('suhunewst'),
            'sew_total'             => safe_post('total_skalanewst'),

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
            'id_perawat' => safe_post('perawat') !== '' ? safe_post('perawat') : NULL,
            'id_verifikasi_dokter_dpjp' => safe_post('verifikasi_dokter_dpjp') !== '' ? safe_post('verifikasi_dokter_dpjp') : NULL,
            'waktu_ttd_perawat' => safe_post('tanggal_ttd_perawat') !== '' ? datetime2mysql(safe_post('tanggal_ttd_perawat')) : NULL,
            'waktu_ttd_verifikasi_dokter_dpjp' => safe_post('tanggal_verifikasi_dokter_dpjp') !== '' ? datetime2mysql(safe_post('tanggal_verifikasi_dokter_dpjp')) : NULL,
            'ttd_perawat' => safe_post('ttd_perawat') !== '' ? safe_post('ttd_perawat') : NULL,
            'ttd_verifikasi_dokter_dpjp' => safe_post('ttd_verifikasi_dokter_dpjp') !== '' ? safe_post('ttd_verifikasi_dokter_dpjp') : NULL,
        );
    
        // Data Kajian Medis
        $data_kajian_medis = array(
            'id_layanan_pendaftaran' => $id_layanan_pendaftaran,
            'waktu_pengkajian' => safe_post('waktu_kajian_medis') !== '' ? datetime2mysql(safe_post('waktu_kajian_medis')) : NULL,
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
            'id_dokter_dpjp' => safe_post('dokter_dpjp') !== '' ? safe_post('dokter_dpjp') : NULL,
            'ttd_dokter_dpjp' => safe_post('ttd_dokter_dpjp') !== '' ? safe_post('ttd_dokter_dpjp') : NULL,
            'id_dokter_pengkajian' => safe_post('dokter_pengkajian') !== '' ? safe_post('dokter_pengkajian') : NULL,
            'ttd_dokter_pengkajian' => safe_post('ttd_dokter_pengkajian') !== '' ? safe_post('ttd_dokter_pengkajian') : NULL,
            'waktu_ttd_dokter_dpjp' => safe_post('tanggal_ttd_dokter_dpjp') !== '' ? datetime2mysql(safe_post('tanggal_ttd_dokter_dpjp')) : NULL,
            'waktu_ttd_dokter_pengkajian' => safe_post('tanggal_ttd_dokter_pengkajian') !== '' ? datetime2mysql(safe_post('tanggal_ttd_dokter_pengkajian')) : NULL,
        );
    
        // Update Data Pengkajian
        $response = $this->m_rawat_inap->updatePengkajianAwalRanap($data_kajian_keperawatan, $data_kajian_medis, $id_kajian_keperawatan, $id_kajian_medis);
        $this->response($response, REST_Controller::HTTP_OK);
    }
        
    
    










    
    // function simpan_pengkajian_awal_ranap_post(){

    //     if (safe_post('id_layanan_pendaftaran') === '') :
    //         $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
    //     endif;

    //     $id_layanan_pendaftaran = safe_post('id_layanan_pendaftaran');
    //     $id_kajian_keperawatan = safe_post('id_kajian_keperawatan');

    //     $data_kajian_keperawatan = array(
    //         'id_layanan_pendaftaran' => $id_layanan_pendaftaran,
    //         'waktu_pengkajian' => (safe_post('waktu_pengkajian') !== '' ? datetime2mysql(safe_post('waktu_pengkajian')) : NULL),
    //         'cara_tiba_diruangan' => safe_post('cara_tiba_diruangan'),
    //         'informasi_dari' => json_encode(array(
    //             'pasien' => safe_post('informasi_dari_pasien'),
    //             'keluarga' => safe_post('informasi_dari_keluarga'),
    //             'lain' => safe_post('informasi_dari_lain'),
    //             'ket_lain' => safe_post('informasi_dari_lain_input'),
    //         )),
    //         'keluhan_utama' => safe_post('keluhan_utama'),
    //         'timbul_keluhan' => safe_post('mulai_timbul_keluhan'),
    //         'lama_keluhan' => safe_post('lama_keluhan'),
    //         'faktor_pencetus' => json_encode(array(
    //             'infeksi' => safe_post('faktor_pencetus_infeksi'),
    //             'lain' => safe_post('faktor_pencetus_lain'),
    //             'ket_lain' => safe_post('faktor_pencetus_lain_input'),
    //         )),
    //         'sifat_keluhan' => safe_post('sifat_keluhan'),
    //         'rps' => safe_post('riwayat_penyakit_sekarang'),
    //         'rpd' => json_encode(array(
    //             'asma' => safe_post('rpt_asma'),
    //             'hipertensi' => safe_post('rpt_hipertensi'),
    //             'jantung' => safe_post('rpt_jantung'),
    //             'diabetes' => safe_post('rpt_diabetes'),
    //             'hepatitis' => safe_post('rpt_hepatitis'),
    //             'lain' => safe_post('rpt_lain'),
    //             'ket_lain' => safe_post('rpt_lain_input'),
    //         )),
    //         'rpk' => json_encode(array(
    //             'asma' => safe_post('rpk_asma'),
    //             'hipertensi' => safe_post('rpk_hipertensi'),
    //             'jantung' => safe_post('rpk_jantung'),
    //             'diabetes' => safe_post('rpk_diabetes'),
    //             'hepatitis' => safe_post('rpk_hepatitis'),
    //             'lain' => safe_post('rpk_lain'),
    //             'ket_lain' => safe_post('rpk_lain_input'),
    //         )),
    //         'pernah_dirawat' => json_encode(array(
    //             'dirawat' => safe_post('pernah_dirawat'),
    //             'kapan' => safe_post('pernah_dirawat_kapan'),
    //             'dimana' => safe_post('pernah_dirawat_dimana'),
    //         )),
    //         'kebiasaan' => json_encode(array(
    //             'merokok' => safe_post('kebiasaan_merokok'),
    //             'ket_merokok' => safe_post('kebiasaan_merokok_input'),
    //             'alkohol' => safe_post('kebiasaan_alkohol'),
    //             'ket_alkohol' => safe_post('kebiasaan_alkohol_input'),
    //             'narkoba' => safe_post('kebiasaan_narkoba'),
    //             'olahraga' => safe_post('kebiasaan_olahraga'),
    //         )),
    //         'riwayat_operasi' => json_encode(array(
    //             'operasi' => safe_post('riwayat_operasi'),
    //             'kapan' => safe_post('riwayat_operasi_kapan'),
    //             'dimana' => safe_post('riwayat_operasi_dimana'),
    //         )),
    //         'obat_dari_luar' => safe_post('obat_luar'),
    //         'alergi' => safe_post('alergi'),
    //         'alergi_obat' => safe_post('alergi_obat'),
    //         'alergi_obat_reaksi' => safe_post('alergi_obat_reaksi'),
    //         'alergi_makanan' => safe_post('alergi_makanan'),
    //         'alergi_makanan_reaksi' => safe_post('alergi_makanan_reaksi'),
    //         'keadaan_hamil' => safe_post('hamil'),
    //         'sedang_menyusui' => safe_post('menyusui'),
    //         'riwayat_kelahiran' => safe_post('riwayat_kelahiran'),
    //         'kesadaran' => json_encode(array(
    //             'composmentis' => safe_post('composmentis'),
    //             'apatis' => safe_post('apatis'),
    //             'samnolen' => safe_post('samnolen'),
    //             'sopor' => safe_post('sopor'),
    //             'koma' => safe_post('koma'),
    //             'gcs_e' => safe_post('gcs_e'),
    //             'gcs_m' => safe_post('gcs_m'),
    //             'gcs_v' => safe_post('gcs_v'),
    //         )),
    //         'tensi_sistolik_awal' => safe_post('tensi_sis'),
    //         'tensi_diastolik_awal' => safe_post('tensi_dis'),
    //         'nadi_awal' => safe_post('nadi_pa'),
    //         'suhu_awal' => safe_post('suhu_pa'),
    //         'nafas_awal' => safe_post('nafas_pa'),
    //         'suara_nafas' => json_encode(array(
    //             'vesikuler' => safe_post('sf_vesikuler'),
    //             'wheezing' => safe_post('sf_wheezing'),
    //             'ronchi' => safe_post('sf_ronchi'),
    //             'dispnoe' => safe_post('sf_dispnoe'),
    //             'stridor' => safe_post('sf_stridor'),
    //         )),
    //         'pola_nafas' => json_encode(array(
    //             'normal' => safe_post('pn_normal'),
    //             'bradipnea' => safe_post('pn_bradipnea'),
    //             'tachipnea' => safe_post('pn_tachipnea'),
    //         )),
    //         'jenis_pernafasan' => json_encode(array(
    //             'dada' => safe_post('jp_dada'),
    //             'perut' => safe_post('jp_perut'),
    //             'cuping_hidung' => safe_post('jp_cuping_hidung'),
    //         )),
    //         'otot_bantu_nafas' => safe_post('otot_bantu_nafas'),
    //         'irama_nafas' => safe_post('irama_nafas'),
    //         'batuk_sekresi' => safe_post('batuk_sekresi'),
    //         'ket_batuk_sekresi' => json_encode(array(
    //             'produktif' => safe_post('bs_produktif'),
    //             'non_produktif' => safe_post('bs_non_produktif'),
    //             'hemaptoe' => safe_post('bs_hemaptoe'),
    //             'lain' => safe_post('bs_lain'),
    //             'ket_lain' => safe_post('bs_lain_input'),
    //         )),
    //         'warna_kulit' => json_encode(array(
    //             'normal' => safe_post('wk_normal'),
    //             'kemerahan' => safe_post('wk_kemerahan'),
    //             'sianosis' => safe_post('wk_sianosis'),
    //             'pucat' => safe_post('wk_pucat'),
    //             'lain' => safe_post('wk_lain'),
    //             'ket_lain' => safe_post('wk_lain_input'),
    //         )),
    //         'nyeri_dada' => safe_post('nyeri_dada'),
    //         'ket_nyeri_dada' => safe_post('nyeri_dada_input'),
    //         'denyut_nadi' => safe_post('denyut_nadi'),
    //         'sirkulasi' => json_encode(array(
    //             'akral_hangat' => safe_post('s_akral_hangat'),
    //             'akral_dingin' => safe_post('s_akral_dingin'),
    //             'rasa_bebas' => safe_post('s_rasa_bebas'),
    //             'palpitasi' => safe_post('s_palpitasi'),
    //             'edema' => safe_post('s_edema'),
    //             'ket_edema' => safe_post('s_edema_input'),
    //         )),
    //         'pulsasi' => json_encode(array(
    //             'kuat' => safe_post('pulsasi_kuat'),
    //             'lemah' => safe_post('pulsasi_lemah'),
    //             'lain' => safe_post('pulsasi_lain'),
    //             'ket_lain' => safe_post('pulsasi_lain_input'),
    //         )),
    //         'mulut' => json_encode(array(
    //             'tidak_ada_kelainan' => safe_post('mulut_tidak_ada_kelainan'),
    //             'simetris' => safe_post('mulut_simetris'),
    //             'asimetris' => safe_post('mulut_asimetris'),
    //             'mukosa' => safe_post('mulut_mukosa'),
    //             'bibir_pucat' => safe_post('mulut_bibir_pucat'),
    //             'lain' => safe_post('mulut_lain'),
    //             'ket_lain' => safe_post('mulut_lain_input'),
    //         )),
    //         'gigi' => json_encode(array(
    //             'tidak_ada_kelainan' => safe_post('gigi_tidak_ada_kelainan'),
    //             'caries' => safe_post('gigi_caries'),
    //             'goyang' => safe_post('gigi_goyang'),
    //             'palsu' => safe_post('gigi_palsu'),
    //             'lain' => safe_post('gigi_lain'),
    //             'ket_lain' => safe_post('gigi_lain_input'),
    //         )),
    //         'lidah' => json_encode(array(
    //             'tidak_ada_kelainan' => safe_post('lidah_tidak_ada_kelainan'),
    //             'kotor' => safe_post('lidah_kotor'),
    //             'gerakan_asimetris' => safe_post('lidah_gerakan_asimetris'),
    //             'lain' => safe_post('lidah_lain'),
    //             'ket_lain' => safe_post('lidah_lain_input'),
    //         )),
    //         'tenggorokan' => json_encode(array(
    //             'gangguan_menelan' => safe_post('teng_gangguan_menelan'),
    //             'sakit_menelan' => safe_post('teng_sakit_menelan'),
    //             'lain' => safe_post('teng_lain'),
    //             'ket_lain' => safe_post('teng_lain_input'),
    //         )),
    //         'abdomen' => json_encode(array(
    //             'asites' => safe_post('abdomen_asites'),
    //             'tegang' => safe_post('abdomen_tegang'),
    //             'supel' => safe_post('abdomen_supel'),
    //             'lain' => safe_post('abdomen_lain'),
    //             'ket_lain' => safe_post('abdomen_lain_input'),
    //         )),
    //         'nafsu_makan' => safe_post('nafsu_makan'),
    //         'mual' => safe_post('mual'),
    //         'muntah' => safe_post('muntah'),
    //         'kesulitan_menelan' => safe_post('kesulitan_menelan'),
    //         'eleminasi_bab' => json_encode(array(
    //             'normal' => safe_post('bab_normal'),
    //             'konstipasi' => safe_post('bab_konstipasi'),
    //             'melena' => safe_post('bab_melena'),
    //             'inkontinensia_alvi' => safe_post('bab_inkontinensia_alvi'),
    //             'colostomy' => safe_post('bab_colostomy'),
    //             'diare' => safe_post('bab_diare'),
    //             'ket_diare' => safe_post('bab_diare_input'),
    //         )),
    //         'eleminasi_bak' => json_encode(array(
    //             'normal' => safe_post('bak_normal'),
    //             'hematuri' => safe_post('bak_hematuri'),
    //             'nokturia' => safe_post('bak_nokturia'),
    //             'inkontinensia_uri' => safe_post('bak_inkontinensia_uri'),
    //             'urostomi' => safe_post('bak_urostomi'),
    //             'urin_menetes' => safe_post('bak_urin_menetes'),
    //             'kateter_warna' => safe_post('bak_kateter_warna'),
    //             'ket_kateter_warna' => safe_post('bak_kateter_warna_input'),
    //             'kandung_kemih' => safe_post('bak_kandung_kemih'),
    //             'lain' => safe_post('bak_lain'),
    //             'ket_lain' => safe_post('bak_lain_input'),
    //         )),
    //         'tulang' => json_encode(array(
    //             'fraktur_terbuka' => safe_post('sm_tulang_fraktur_terbuka'),
    //             'fraktur_terbuka_lokasi' => safe_post('sm_tulang_fraktur_terbuka_lokasi'),
    //             'fraktur_tertutup' => safe_post('sm_tulang_fraktur_tertutup'),
    //             'fraktur_tertutup_lokasi' => safe_post('sm_tulang_fraktur_tertutup_lokasi'),
    //             'amputasi' => safe_post('sm_tulang_amputasi'),
    //             'tumor_tulang' => safe_post('sm_tulang_tumor_tulang'),
    //             'nyeri_tulang' => safe_post('sm_tulang_nyeri_tulang'),
    //         )),
    //         'sendi' => json_encode(array(
    //             'dislokasi' => safe_post('sm_sendi_dislokasi'),
    //             'infeksi' => safe_post('sm_sendi_infeksi'),
    //             'nyeri' => safe_post('sm_sendi_nyeri'),
    //             'oedema' => safe_post('sm_sendi_oedema'),
    //             'lain' => safe_post('sm_sendi_lain'),
    //             'ket_lain' => safe_post('sm_sendi_lain_input'),
    //         )),
    //         'integumen_warna' => json_encode(array(
    //             'pucat' => safe_post('si_warna_pucat'),
    //             'sianosis' => safe_post('si_warna_sianosis'),
    //             'normal' => safe_post('si_warna_normal'),
    //             'lain' => safe_post('si_warna_lain'),
    //             'ket_lain' => safe_post('si_warna_lain_input'),
    //         )),
    //         'integumen_turgor' => json_encode(array(
    //             'baik' => safe_post('si_turgor_baik'),
    //             'sedang' => safe_post('si_turgor_sedang'),
    //             'buruk' => safe_post('si_turgor_buruk'),
    //         )),
    //         'integumen_kulit' => json_encode(array(
    //             'normal' => safe_post('si_kulit_normal'),
    //             'kemerahan' => safe_post('si_kulit_kemerahan'),
    //             'lesi' => safe_post('si_kulit_lesi'),
    //             'luka' => safe_post('si_kulit_luka'),
    //             'memar' => safe_post('si_kulit_memar'),
    //             'petechie' => safe_post('si_kulit_petechie'),
    //             'bulae' => safe_post('si_kulit_bulae'),
    //             'lain' => safe_post('si_kulit_lain'),
    //             'ket_lain' => safe_post('si_kulit_lain_input'),
    //         )),
    //         'penglihatan' => json_encode(array(
    //             'baik' => safe_post('sin_penglihatan_baik'),
    //             'buram' => safe_post('sin_penglihatan_buram'),
    //             'tidak_bisa_melihat' => safe_post('sin_penglihatan_tidak_bisa_melihat'),
    //             'pakai_alat_bantu' => safe_post('sin_penglihatan_pakai_alat_bantu'),
    //             'hypema' => safe_post('sin_penglihatan_hypema'),
    //         )),
    //         'penciuman' => json_encode(array(
    //             'sekresi' => safe_post('sin_penciuman_sekresi'),
    //             'polip' => safe_post('sin_penciuman_polip'),
    //             'gangguan' => safe_post('sin_penciuman_gangguan'),
    //         )),
    //         'pendengaran' => json_encode(array(
    //             'kurang_jelas' => safe_post('sin_pendengaran_kurang_jelas'),
    //             'baik' => safe_post('sin_pendengaran_baik'),
    //             'tidak_bisa_dengar' => safe_post('sin_pendengaran_tidak_bisa_dengar'),
    //             'pakai_alat_bantu' => safe_post('sin_pendengaran_pakai_alat_bantu'),
    //             'nyeri_telinga' => safe_post('sin_pendengaran_nyeri_telinga'),
    //         )),
    //         'pengecap' => json_encode(array(
    //             'tidak_ada_kelainan' => safe_post('sin_pengecap_tidak_ada_kelainan'),
    //             'gangguan_fungsi' => safe_post('sin_pengecap_gangguan_fungsi'),
    //             'lain' => safe_post('sin_pengecap_lain'),
    //             'ket_lain' => safe_post('sin_pengecap_lain_input'),
    //         )),
    //         'persyarafan' => json_encode(array(
    //             'kesemutan' => safe_post('sp_kesemutan'),
    //             'kelumpuhan' => safe_post('sp_kelumpuhan'),
    //             'kelumpuhan_lokasi' => safe_post('sp_kelumpuhan_lokasi'),
    //             'kejang' => safe_post('sp_kejang'),
    //             'pusing' => safe_post('sp_pusing'),
    //             'muntah' => safe_post('sp_muntah'),
    //             'kaku_kuduk' => safe_post('sp_kaku_kuduk'),
    //             'hemiparese' => safe_post('sp_hemiparese'),
    //             'alasia' => safe_post('sp_alasia'),
    //             'tremor' => safe_post('sp_tremor'),
    //             'lain' => safe_post('sp_lain'),
    //             'ket_lain' => safe_post('sp_lain_input'),
    //         )),
    //         'reproduksi_alat' => safe_post('sr_alat'),
    //         'reproduksi_payudara' => safe_post('sr_payudara'),
    //         'ket_reproduksi_payudara' => safe_post('sr_payudara_lain_input'),
    //         'status_psikologis' => json_encode(array(
    //             'cemas' => safe_post('sps_cemas'),
    //             'takut' => safe_post('sps_takut'),
    //             'marah' => safe_post('sps_marah'),
    //             'sedih' => safe_post('sps_sedih'),
    //             'bunuh_diri' => safe_post('sps_bunuh_diri'),
    //             'lain' => safe_post('sps_lain'),
    //             'ket_lain' => safe_post('sps_lain_input'),
    //         )),
    //         'status_mental' => json_encode(array(
    //             'sadar' => safe_post('smen_sadar'),
    //             'ada_masalah' => safe_post('smen_ada_masalah'),
    //             'ket_ada_masalah' => safe_post('smen_ada_masalah_input'),
    //             'perilaku_kekerasan' => safe_post('smen_perilaku_kekerasan'),
    //         )),
    //         'status_keluarga' => safe_post('kel_tinggal'),
    //         'ket_status_keluarga' => safe_post('kel_tinggal_lain_input'),
    //         'tempat_tinggal' => safe_post('kel_tinggal'),
    //         'ket_tempat_tinggal' => safe_post('kel_tinggal_lain_input'),
    //         'status_hubungan_pasien' => safe_post('hubungan_dengan_keluarga'),
    //         'keyakinan' => safe_post('snk_keyakinan'),
    //         'ket_keyakinan' => safe_post('snk_keyakinan_ya_input'),
    //         'nilai_kepercayaan' => safe_post('snk_nilai_kepercayaan'),
    //         'ket_nilai_kepercayaan' => safe_post('snk_nilai_kepercayaan_ya_input'),
    //         'kebiasaan_keagamaan' => safe_post('snk_kebiasaan_keagamaan'),
    //         'wajib_ibadah' => safe_post('wajib_ibadah'),
    //         'ket_wajib_ibadah_halangan' => safe_post('wajib_ibadah_halangan_input'),
    //         'thaharoh' => safe_post('thaharoh'),
    //         'sholat' => safe_post('sholat'),
    //         'nilai_budaya' => safe_post('nilai_budaya'),
    //         'ket_nilai_budaya' => safe_post('nb_lain_input'),
    //         'budaya_pola_aktivitas' => safe_post('budaya_pola_aktivitas'),
    //         'pola_komunikasi' => safe_post('pola_komunikasi'),
    //         'ket_pola_komunikasi' => safe_post('pk_lain_input'),
    //         'pola_makan' => safe_post('pola_makan'),
    //         'makanan_pokok' => safe_post('makanan_pokok'),
    //         'ket_makanan_pokok' => safe_post('mp_selain_nasi_input'),
    //         'pantang_makanan' => safe_post('pantang_makanan'),
    //         'ket_pantang_makanan' => safe_post('pantang_makanan_ya_input'),
    //         'konsumsi_makanan_luar' => safe_post('konsumsi_makanan_luar'),
    //         'ket_konsumsi_makanan_luar' => safe_post('konsumsi_makanan_luar_ya_input'),
    //         'kepercayaan_penyakit' => safe_post('kepercayaan_penyakit'),
    //         'ket_kepercayaan_penyakit' => safe_post('kepercayaan_penyakit_ya_input'),
    //         'kewarganegaraan' => safe_post('kewarganegaraan'),
    //         'suku_bangsa' => safe_post('suku_bangsa'),
    //         'bicara' => safe_post('bicara'),
    //         'ket_bicara' => safe_post('bicara_input'),
    //         'perlu_penterjemah' => safe_post('perlu_penterjemah'),
    //         'perlu_penterjemah_bahasa' => safe_post('perlu_penterjemah_input'),
    //         'bahasa_isyarat' => safe_post('bahasa_isyarat'),
    //         'pemahaman_penyakit' => safe_post('pt_penyakit_perawatan'),
    //         'pemahaman_pengobatan' => safe_post('pt_pengobatan'),
    //         'pemahaman_nutrisi_diet' => safe_post('pt_nutrisi_diet'),
    //         'pemahaman_spiritual' => safe_post('pt_spiritual'),
    //         'pemahaman_peralatan_medis' => safe_post('pt_peralatan_medis'),
    //         'pemahaman_rehab_medik' => safe_post('pt_rehab_medik'),
    //         'pemahaman_manajemen_nyeri' => safe_post('pt_manajemen_nyeri'),
    //         'hambatan_menerima_edukasi' => json_encode(array(
    //             'hambatan_1' => safe_post('hambatan_edukasi_1'),
    //             'hambatan_2' => safe_post('hambatan_edukasi_2'),
    //             'hambatan_3' => safe_post('hambatan_edukasi_3'),
    //             'hambatan_4' => safe_post('hambatan_edukasi_4'),
    //             'hambatan_5' => safe_post('hambatan_edukasi_5'),
    //             'hambatan_6' => safe_post('hambatan_edukasi_6'),
    //             'hambatan_7' => safe_post('hambatan_edukasi_7'),
    //             'hambatan_8' => safe_post('hambatan_edukasi_8'),
    //             'hambatan_9' => safe_post('hambatan_edukasi_9'),
    //             'hambatan_10' => safe_post('hambatan_edukasi_10'),
    //         )),
    //         'sn_penurunan_bb' => (safe_post('sn_penurunan_bb') !== '' ? safe_post('sn_penurunan_bb') : NULL),
    //         'sn_penurunan_bb_on' => (safe_post('sn_penurunan_bb_on') !== '' ? safe_post('sn_penurunan_bb_on') : NULL),
    //         'sn_asupan_makan' => (safe_post('sn_asupan_makan') !== '' ? safe_post('sn_asupan_makan') : NULL),
    //         'sn_total' => (safe_post('sn_total') !== '' ? safe_post('sn_total') : NULL),
    //         'nilai_fungsi_makan' => (safe_post('nilai_pkf_makan') !== '' ? safe_post('nilai_pkf_makan') : NULL),
    //         'nilai_fungsi_mandi' => (safe_post('nilai_pkf_mandi') !== '' ? safe_post('nilai_pkf_mandi') : NULL),
    //         'nilai_fungsi_personal' => (safe_post('nilai_pkf_personal') !== '' ? safe_post('nilai_pkf_personal') : NULL),
    //         'nilai_fungsi_berpakaian' => (safe_post('nilai_pkf_berpakaian') !== '' ? safe_post('nilai_pkf_berpakaian') : NULL),
    //         'nilai_fungsi_bab' => (safe_post('nilai_pkf_bab') !== '' ? safe_post('nilai_pkf_bab') : NULL),
    //         'nilai_fungsi_bak' => (safe_post('nilai_pkf_bak') !== '' ? safe_post('nilai_pkf_bak') : NULL),
    //         'nilai_fungsi_berpindah' => (safe_post('nilai_pkf_berpindah') !== '' ? safe_post('nilai_pkf_berpindah') : NULL),
    //         'nilai_fungsi_toiletting' => (safe_post('nilai_pkf_toiletting') !== '' ? safe_post('nilai_pkf_toiletting') : NULL),
    //         'nilai_fungsi_mobilisasi' => (safe_post('nilai_pkf_mobilisasi') !== '' ? safe_post('nilai_pkf_mobilisasi') : NULL),
    //         'nilai_fungsi_naik_turun_tangga' => (safe_post('nilai_pkf_naikturuntangga') !== '' ? safe_post('nilai_pkf_naikturuntangga') : NULL),
    //         'nilai_fungsi_total' => (safe_post('total_nilai_pkf') !== '' ? safe_post('total_nilai_pkf') : NULL),
    //         'nilai_tingkat_nyeri' => safe_post('ptn_keterangan'),
    //         'nyeri_hilang' => json_encode(array(
    //             'minum_obat' => safe_post('ptn_minum_obat'),
    //             'mendengarkan_musik' => safe_post('ptn_mendengarkan_musik'),
    //             'istirahat' => safe_post('ptn_istirahat'),
    //             'berubah_posisi' => safe_post('ptn_berubah_posisi'),
    //             'lain' => safe_post('ptn_lain'),
    //             'ket_lain' => safe_post('ptn_lain_input'),
    //         )),
    //         'prjd_riwayat_jatuh' => (safe_post('prjd_riwayat_jatuh') !== '' ? safe_post('prjd_riwayat_jatuh') : NULL),
    //         'prjd_diagnosis_sekunder' => (safe_post('prjd_diagnosis_sekunder') !== '' ? safe_post('prjd_diagnosis_sekunder') : NULL),
    //         'prjd_alat_bantu_jalan_1' => (safe_post('alat_bantu_jalan_1_ya') !== '' ? safe_post('alat_bantu_jalan_1_ya') : NULL),
    //         'prjd_alat_bantu_jalan_2' => (safe_post('alat_bantu_jalan_2_ya') !== '' ? safe_post('alat_bantu_jalan_2_ya') : NULL),
    //         'prjd_alat_bantu_jalan_3' => (safe_post('alat_bantu_jalan_3_ya') !== '' ? safe_post('alat_bantu_jalan_3_ya') : NULL),
    //         'prjd_terpasang_infus' => (safe_post('prjd_terpasang_infus') !== '' ? safe_post('prjd_terpasang_infus') : NULL),
    //         'prjd_cara_berjalan_1' => (safe_post('cara_berjalan_1_ya') !== '' ? safe_post('cara_berjalan_1_ya') : NULL),
    //         'prjd_cara_berjalan_2' => (safe_post('cara_berjalan_2_ya') !== '' ? safe_post('cara_berjalan_2_ya') : NULL),
    //         'prjd_cara_berjalan_3' => (safe_post('cara_berjalan_3_ya') !== '' ? safe_post('cara_berjalan_3_ya') : NULL),
    //         'prjd_status_mental_1' => (safe_post('status_mental_1_ya') !== '' ? safe_post('status_mental_1_ya') : NULL),
    //         'prjd_status_mental_2' => (safe_post('status_mental_2_ya') !== '' ? safe_post('status_mental_2_ya') : NULL),
    //         'prjd_nilai_total' => (safe_post('prjd_jumlah_skor') !== '' ? safe_post('prjd_jumlah_skor') : NULL),
    //         'prjl_riwayat_jatuh' => (safe_post('prjl_riwayat_jatuh') !== '' ? safe_post('prjl_riwayat_jatuh') : NULL),
    //         'prjl_riwayat_jatuh_opt' => (safe_post('prjl_riwayat_jatuh_opt') !== '' ? safe_post('prjl_riwayat_jatuh_opt') : NULL),
    //         'prjl_status_mental' => (safe_post('prjl_status_mental') !== '' ? safe_post('prjl_status_mental') : NULL),
    //         'prjl_status_mental_opt_1' => (safe_post('prjl_status_mental_opt_1') !== '' ? safe_post('prjl_status_mental_opt_1') : NULL),
    //         'prjl_status_mental_opt_2' => (safe_post('prjl_status_mental_opt_2') !== '' ? safe_post('prjl_status_mental_opt_2') : NULL),
    //         'prjl_penglihatan' => (safe_post('prjl_penglihatan') !== '' ? safe_post('prjl_penglihatan') : NULL),
    //         'prjl_penglihatan_opt_1' => (safe_post('prjl_penglihatan_opt_1') !== '' ? safe_post('prjl_penglihatan_opt_1') : NULL),
    //         'prjl_penglihatan_opt_2' => (safe_post('prjl_penglihatan_opt_2') !== '' ? safe_post('prjl_penglihatan_opt_2') : NULL),
    //         'prjl_berkemih' => (safe_post('prjl_berkemih') !== '' ? safe_post('prjl_berkemih') : NULL),
    //         'prjl_transfer' => (safe_post('prjl_transfer') !== '') ? safe_post('prjl_transfer') : NULL,
    //         'prjl_mobilitas' => (safe_post('prjl_mobilitas') !== '' ? safe_post('prjl_mobilitas') : NULL),
    //         'prjl_nilai_total' => (safe_post('prjl_jumlah') !== '' ? safe_post('prjl_jumlah') : NULL),


    //         'skrining_pasien_akhir_kehidupan' => json_encode(array(
    //             'kriteria_1' => safe_post('spak_1'),
    //             'kriteria_2' => safe_post('spak_2'),
    //             'kriteria_3' => safe_post('spak_3'),
    //             'kriteria_4' => safe_post('spak_4'),
    //             'kriteria_5' => safe_post('spak_5'),
    //         )),






    //         'pk_geriatri' => json_encode(array(
    //             'gangguan_penglihatan' => safe_post('pk_geriatri_1'),
    //             'ket_gangguan_penglihatan' => safe_post('pk_geriatri_1_input'),
    //             'gangguan_pendengaran' => safe_post('pk_geriatri_2'),
    //             'ket_gangguan_pendengaran' => safe_post('pk_geriatri_2_input'),
    //             'gangguan_berkemih' => safe_post('pk_geriatri_3'),
    //             'ket_gangguan_berkemih' => array(
    //                 'inkontinensia' => safe_post('pk_geriatri_inkontinensia'),
    //                 'disuria' => safe_post('pk_geriatri_disuria'),
    //                 'oliguria' => safe_post('pk_geriatri_oliguria'),
    //                 'anuria' => safe_post('pk_geriatri_anuria'),
    //             ),
    //             'gangguan_daya_ingat' => safe_post('pk_geriatri_4'),
    //             'ket_gangguan_daya_ingat' => safe_post('pk_geriatri_4_input'),
    //             'gangguan_bicara' => safe_post('pk_geriatri_5'),
    //             'ket_gangguan_bicara' => safe_post('pk_geriatri_5_input'),
    //         )),
    //         'pk_penyakit_menular' => json_encode(array(
    //             // pasien mengetahui penyakit saat ini
    //             'penyakit_saat_ini' => safe_post('pk_penyakit_menular_1'),
    //             // sumber informasi tentang penyakit diperoleh dari
    //             'informasi_dari' => array(
    //                 'dokter' => safe_post('pk_pm_dokter'),
    //                 'perawat' => safe_post('pk_pm_perawat'),
    //                 'keluarga' => safe_post('pk_pm_keluarga'),
    //                 'lain' => safe_post('pk_pm_lain'),
    //                 'ket_lain' => safe_post('pk_pm_lain_input'),
    //             ),
    //             // menerima informasi jangka waktu pengobatan
    //             'informasi_jangka_waktu' => safe_post('pk_penyakit_menular_3'),
    //             'ket_informasi_jangka_waktu' => safe_post('pk_penyakit_menular_3_input'),
    //             // melakukan pemeriksaan rutin
    //             'pemeriksaan_rutin' => safe_post('pk_penyakit_menular_4'),
    //             'ket_pemeriksaan_rutin' => safe_post('pk_penyakit_menular_4_input'),
    //             'cara_penularan' => array(
    //                 'airbone' => safe_post('pk_pm_airbone'),
    //                 'droplet' => safe_post('pk_pm_droplet'),
    //                 'kontak_langsung' => safe_post('pk_pm_kontak_langsung'),
    //                 'cairan_tubuh' => safe_post('pk_pm_cairan_tubuh'),
    //             ),
    //             'penyakit_penyerta' => safe_post('pk_penyakit_menular_6'),
    //             'ket_penyakit_penyerta' => safe_post('pk_penyakit_menular_6_input'),
    //         )),
    //         'pk_penurunan_daya_tahan' => json_encode(array(
    //             // pasien mengetahui penyakit saat ini
    //             'penyakit_saat_ini' => safe_post('pk_penyakit_pdtt_1'),
    //             // sumber informasi tentang penyakit diperoleh dari
    //             'informasi_dari' => array(
    //                 'dokter' => safe_post('pk_pdtt_dokter'),
    //                 'perawat' => safe_post('pk_pdtt_perawat'),
    //                 'keluarga' => safe_post('pk_pdtt_keluarga'),
    //                 'lain' => safe_post('pk_pdtt_lain'),
    //                 'ket_lain' => safe_post('pk_pdtt_lain_input'),
    //             ),
    //             // menerima informasi jangka waktu pengobatan
    //             'informasi_jangka_waktu' => safe_post('pk_penyakit_pdtt_3'),
    //             'ket_informasi_jangka_waktu' => safe_post('pk_penyakit_pdtt_3_input'),
    //             // melakukan pemeriksaan rutin
    //             'pemeriksaan_rutin' => safe_post('pk_penyakit_pdtt_4'),
    //             'ket_pemeriksaan_rutin' => safe_post('pk_penyakit_pdtt_4_input'),
    //             'penyakit_penyerta' => safe_post('pk_penyakit_pdtt_5'),
    //             'ket_penyakit_penyerta' => safe_post('pk_penyakit_pdtt_5_input'),
    //         )),
    //         'pk_kesehatan_jiwa' => json_encode(array(
    //             'ket_1' => safe_post('pk_kesehatan_jiwa_1'),
    //             'ket_2' => safe_post('pk_kesehatan_jiwa_2'),
    //             'ket_3' => safe_post('pk_kesehatan_jiwa_3'),
    //             'ket_4' => safe_post('pk_kesehatan_jiwa_4'),
    //             'ket_5' => safe_post('pk_kesehatan_jiwa_5'),
    //             'ket_6' => safe_post('pk_kesehatan_jiwa_6'),
    //             'ket_7' => safe_post('pk_kesehatan_jiwa_7'),
    //             'ket_8' => safe_post('pk_kesehatan_jiwa_8'),
    //             'ket_9' => safe_post('pk_kesehatan_jiwa_9'),
    //         )),
    //         'pk_pasien_kekerasan' => json_encode(array(
    //             'ket_1' => safe_post('pk_pasien_kekerasan_1'),
    //             'ket_2' => safe_post('pk_pasien_kekerasan_2'),
    //             'ket_3' => safe_post('pk_pasien_kekerasan_3'),
    //             'ket_4' => safe_post('pk_pasien_kekerasan_4'),
    //             'ket_5' => safe_post('pk_pasien_kekerasan_5'),
    //             'ket_6' => safe_post('pk_pasien_kekerasan_6'),
    //         )),
    //         'pk_pasien_ketergantungan' => json_encode(array(
    //             'obat' => safe_post('pk_pasien_ketergantungan_obat'),
    //             'ket_obat' => safe_post('pk_pasien_ketergantungan_obat_input'),
    //             'lama_ketergantungan' => safe_post('pk_pasien_lama_ketergantungan_obat_input'),
    //         )),

    //         // skala early warning system
    //         // 'sew_laju_respirasi' => safe_post('laju_respirasi'),
    //         // 'sew_saturasi' => safe_post('saturasi'),
    //         // 'sew_suplemen' => safe_post('suplemen'),
    //         // 'sew_temperatur' => safe_post('temperatur'),
    //         // 'sew_tds' => safe_post('tds'),
    //         // 'sew_laju_jantung' => safe_post('laju_jantung'),
    //         // 'sew_kesadaran' => safe_post('kesadaran'),
    //         // 'sew_total' => safe_post('total_skala'),

    //         // PARI
    //         'sew_laju_respirasi'    => safe_post('respirasinewst'),
    //         'sew_saturasi'          => safe_post('spskalat'),
    //         'sew_suplemen'          => safe_post('spskalappokt'),
    //         'sew_temperatur'        => safe_post('suplementt'),
    //         'sew_tds'               => safe_post('tdssistolikt'),
    //         'sew_laju_jantung'      => safe_post('nadiwst'),
    //         'sew_kesadaran'         => safe_post('kesadaranwst'),
    //         'suhunewst'             => safe_post('suhunewst'),
    //         'sew_total'             => safe_post('total_skalanewst'),

    //         'masalah_keperawatan' => json_encode(array(
    //             'ket_1' => safe_post('masalah_keperawatan_1'),
    //             'ket_2' => safe_post('masalah_keperawatan_2'),
    //             'ket_3' => safe_post('masalah_keperawatan_3'),
    //             'ket_4' => safe_post('masalah_keperawatan_4'),
    //             'ket_5' => safe_post('masalah_keperawatan_5'),
    //             'ket_6' => safe_post('masalah_keperawatan_6'),
    //             'ket_7' => safe_post('masalah_keperawatan_7'),
    //             'ket_8' => safe_post('masalah_keperawatan_8'),
    //             'ket_9' => safe_post('masalah_keperawatan_9'),
    //             'ket_10' => safe_post('masalah_keperawatan_10'),
    //             'ket_11' => safe_post('masalah_keperawatan_11'),
    //             'ket_12' => safe_post('masalah_keperawatan_12'),
    //             'ket_13' => safe_post('masalah_keperawatan_13'),
    //             'ket_14' => safe_post('masalah_keperawatan_14'),
    //             'ket_15' => safe_post('masalah_keperawatan_15'),
    //             'ket_16' => safe_post('masalah_keperawatan_16'),
    //             'ket_17' => safe_post('masalah_keperawatan_17'),
    //             'ket_18' => safe_post('masalah_keperawatan_18'),
    //             'ket_19' => safe_post('masalah_keperawatan_19'),
    //             'ket_20' => safe_post('masalah_keperawatan_20'),
    //             'ket_21' => safe_post('masalah_keperawatan_21'),
    //             'ket_22' => safe_post('masalah_keperawatan_22'),
    //             'ket_23' => safe_post('masalah_keperawatan_23'),
    //             'ket_24' => safe_post('masalah_keperawatan_24'),
    //             'ket_25' => safe_post('masalah_keperawatan_25'),
    //             'ket_26' => safe_post('masalah_keperawatan_26'),
    //             'ket_27' => safe_post('masalah_keperawatan_27'),
    //             'ket_28' => safe_post('masalah_keperawatan_28'),
    //             'ket_29' => safe_post('masalah_keperawatan_29'),
    //             'ket_30' => safe_post('masalah_keperawatan_30'),
    //             'ket_lain' => safe_post('masalah_keperawatan_lain_input'),
    //             'ket_31' => safe_post('masalah_keperawatan_31'),
    //             'ket_32' => safe_post('masalah_keperawatan_32'),
    //             'ket_33' => safe_post('masalah_keperawatan_33'),
    //             'ket_34' => safe_post('masalah_keperawatan_34'),
    //         )),
    //         'perencanaan_pulang' => json_encode(array(
    //             'planning_1' => safe_post('discharge_planning_1'),
    //             'planning_2' => safe_post('discharge_planning_2'),
    //             'planning_3' => safe_post('discharge_planning_3'),
    //             'planning_4' => safe_post('discharge_planning_4'),
    //             'kriteria' => array(
    //                 'kriteria_1' => safe_post('kriteria_discharge_1'),
    //                 'kriteria_2' => safe_post('kriteria_discharge_2'),
    //                 'kriteria_3' => safe_post('kriteria_discharge_3'),
    //                 'kriteria_4' => safe_post('kriteria_discharge_4'),
    //                 'kriteria_5' => safe_post('kriteria_discharge_5'),
    //                 'kriteria_6' => safe_post('kriteria_discharge_6'),
    //                 'kriteria_7' => safe_post('kriteria_discharge_7'),
    //                 'kriteria_8' => safe_post('kriteria_discharge_8'),
    //                 'kriteria_9' => safe_post('kriteria_discharge_9'),
    //                 'kriteria_lain' => safe_post('kriteria_discharge_lain_input'),
    //             ),
    //         )),
    //         'id_perawat' => (safe_post('perawat') !== '' ? safe_post('perawat') : NULL),
    //         'id_verifikasi_dokter_dpjp' => (safe_post('verifikasi_dokter_dpjp') !== '' ? safe_post('verifikasi_dokter_dpjp') : NULL),

    //         'waktu_ttd_perawat' => (safe_post('tanggal_ttd_perawat') !== '' ? datetime2mysql(safe_post('tanggal_ttd_perawat')) : NULL),
    //         'waktu_ttd_verifikasi_dokter_dpjp' => (safe_post('tanggal_verifikasi_dokter_dpjp') !== '' ? datetime2mysql(safe_post('tanggal_verifikasi_dokter_dpjp')) : NULL),

    //     );

    //     $id_kajian_medis = safe_post('id_kajian_medis');

    //     // update alergi pasien
    //     $this->load->model('pelayanan/Pelayanan_model', 'm_pelayanan');
    //     $this->m_pelayanan->updateAlergiPasien(safe_post('id_pasien'), safe_post('riwayat_alergi'));
    //     // cek profil pasien
    //     $checkProfilPasien = $this->db->query("select * from sm_profil_pasien where id_pasien = '" . safe_post('id_pasien') . "'")->row();
    //     $dataProfilPasien = array(
    //         'id_pasien' => safe_post('id_pasien'),
    //         'tinggi_badan' => safe_post('tinggi_badan') !== '' ? safe_post('tinggi_badan') : NULL,
    //         'berat_badan'  => safe_post('berat_badan') !== '' ? safe_post('berat_badan') : NULL,
    //     );
    //     if ($checkProfilPasien) :
    //         $this->db->where('id_pasien', safe_post('id_pasien'), true)->update('sm_profil_pasien', $dataProfilPasien);
    //     else :
    //         $this->db->insert('sm_profil_pasien', $dataProfilPasien);
    //     endif;

    //     $data_kajian_medis = array(
    //         'id_layanan_pendaftaran' => $id_layanan_pendaftaran,
    //         'waktu_pengkajian' => (safe_post('waktu_kajian_medis') !== '' ? datetime2mysql(safe_post('waktu_kajian_medis')) : NULL),
    //         'keluhan_utama' => safe_post('keluhan_utama_medis'),
    //         'riwayat_penyakit_sekarang' => safe_post('rps_medis'),
    //         'riwayat_penyakit_terdahulu' => safe_post('rpt_medis'),
    //         'pengobatan' => safe_post('pengobatan_medis'),
    //         'riwayat_alergi' => safe_post('riwayat_alergi'),
    //         'riwayat_penyakit_keluarga' => json_encode(array(
    //             'hasil' => safe_post('rpk_medis'),
    //             'asma' => safe_post('rpk_medis_asma'),
    //             'dm' => safe_post('rpk_medis_dm'),
    //             'cardiovascular' => safe_post('rpk_medis_cardiovascular'),
    //             'kanker' => safe_post('rpk_medis_kanker'),
    //             'thalasemia' => safe_post('rpk_medis_thalasemia'),
    //             'lain' => safe_post('rpk_medis_lain'),
    //             'ket_lain' => safe_post('rpk_medis_lain_input'),
    //         )),
    //         'riwayat' => safe_post('riwayat'),
    //         'kesadaran' => json_encode(array(
    //             'composmentis' => safe_post('composmentis_medis'),
    //             'apatis' => safe_post('apatis_medis'),
    //             'samnolen' => safe_post('samnolen_medis'),
    //             'sopor' => safe_post('sopor_medis'),
    //             'koma' => safe_post('koma_medis'),
    //         )),
    //         'pf_kepala' => safe_post('pf_kepala'),
    //         'ket_pf_kepala' => safe_post('ket_pf_kepala'),
    //         'pf_mata' => safe_post('pf_mata'),
    //         'ket_pf_mata' => safe_post('ket_pf_mata'),
    //         'pf_hidung' => safe_post('pf_hidung'),
    //         'ket_pf_hidung' => safe_post('ket_pf_hidung'),
    //         'pf_gigi_mulut' => safe_post('pf_gigi_mulut'),
    //         'ket_pf_gigi_mulut' => safe_post('ket_pf_gigi_mulut'),
    //         'pf_tenggorokan' => safe_post('pf_tenggorokan'),
    //         'ket_pf_tenggorokan' => safe_post('ket_pf_tenggorokan'),
    //         'pf_telinga' => safe_post('pf_telinga'),
    //         'ket_pf_telinga' => safe_post('ket_pf_telinga'),
    //         'pf_leher' => safe_post('pf_leher'),
    //         'ket_pf_leher' => safe_post('ket_pf_leher'),
    //         'pf_thorax' => safe_post('pf_thorax'),
    //         'ket_pf_thorax' => safe_post('ket_pf_thorax'),
    //         'pf_jantung' => safe_post('pf_jantung'),
    //         'ket_pf_jantung' => safe_post('ket_pf_jantung'),
    //         'pf_paru' => safe_post('pf_paru'),
    //         'ket_pf_paru' => safe_post('ket_pf_paru'),
    //         'pf_abdomen' => safe_post('pf_abdomen'),
    //         'ket_pf_abdomen' => safe_post('ket_pf_abdomen'),
    //         'pf_genitalia_anus' => safe_post('pf_genitalia'),
    //         'ket_pf_genitalia_anus' => safe_post('ket_pf_genitalia'),
    //         'pf_ekstermitas' => safe_post('pf_ekstermitas'),
    //         'ket_pf_ekstermitas' => safe_post('ket_pf_ekstermitas'),
    //         'pf_kulit' => safe_post('pf_kulit'),
    //         'ket_pf_kulit' => safe_post('ket_pf_kulit'),
    //         'hasil_laboratorium' => safe_post('hasil_lab'),
    //         'hasil_radiologi' => safe_post('hasil_rad'),
    //         'hasil_penunjang_lain' => safe_post('hasil_pen_lain'),
    //         'diagnosa_awal' => safe_post('diag_awal'),
    //         'rencana_edukasi' => safe_post('rencana_edukasi_medis'),
    //         'rencana_pemeriksaan_penunjang' => safe_post('rencana_pemeriksaan_penunjang'),
    //         'rencana_terapi' => safe_post('rencana_terapi'),
    //         'rencana_konsultasi' => safe_post('rencana_konsultasi'),
    //         'perkiraan_lama_rawat' => safe_post('perkiraan_lama_rawat'),
    //         'ditetapkan_berapa_hari' => safe_post('ditetapkan_berapa_hari'),
    //         'tanggal_rencana_pulang' => (safe_post('tanggal_rencana_pulang') !== '' ? date2mysql(safe_post('tanggal_rencana_pulang')) : NULL),
    //         'alasan_belum_ditetapkan' => safe_post('alasan_belum_ditetapkan'),
    //         'id_dokter_dpjp' => (safe_post('dokter_dpjp') !== '' ? safe_post('dokter_dpjp') : NULL),
    //         'ttd_dokter_dpjp' => safe_post('ttd_dokter_dpjp'),
    //         'id_dokter_pengkajian' => (safe_post('dokter_pengkajian') !== '' ? safe_post('dokter_pengkajian') : NULL),
    //         'ttd_dokter_pengkajian' => safe_post('ttd_dokter_pengkajian'),

    //         'waktu_ttd_dokter_dpjp' => (safe_post('tanggal_ttd_dokter_dpjp') !== '' ? datetime2mysql(safe_post('tanggal_ttd_dokter_dpjp')) : NULL),
    //         'waktu_ttd_dokter_pengkajian' => (safe_post('tanggal_ttd_dokter_pengkajian') !== '' ? datetime2mysql(safe_post('tanggal_ttd_dokter_pengkajian')) : NULL),


    //     );

    //     $sign = $this->db->select('kkr.waktu_ttd_perawat, kkr.ttd_perawat, kkr.waktu_ttd_verifikasi_dokter_dpjp, kkr.ttd_verifikasi_dokter_dpjp, kmr.waktu_ttd_dokter_dpjp, kmr.ttd_dokter_dpjp, kmr.waktu_ttd_dokter_pengkajian, kmr.ttd_dokter_pengkajian')
    //         ->from('sm_kajian_keperawatan_ranap as kkr')
    //         ->join('sm_kajian_medis_ranap as kmr', 'kmr.id_layanan_pendaftaran = kkr.id_layanan_pendaftaran')
    //         ->where('kkr.id_layanan_pendaftaran', $id_layanan_pendaftaran)
    //         ->get()
    //         ->row();
            
    //     if (isset($sign)) :
    //         if ($sign->waktu_ttd_perawat !== NULL) :
    //             $data_kajian_keperawatan['waktu_ttd_perawat'] = $sign->waktu_ttd_perawat;
    //         else :
    //             $data_kajian_keperawatan['waktu_ttd_perawat'] = (safe_post('tanggal_ttd_perawat') !== '' ? datetime2mysql(safe_post('tanggal_ttd_perawat')) : NULL);
    //         endif;

    //         if ($sign->ttd_perawat !== NULL) :
    //             $data_kajian_keperawatan['ttd_perawat'] = $sign->ttd_perawat;
    //         else :
    //             $data_kajian_keperawatan['ttd_perawat'] = (safe_post('ttd_perawat') !== '' ? safe_post('ttd_perawat') : NULL);
    //         endif;

    //         if ($sign->waktu_ttd_verifikasi_dokter_dpjp !== NULL) :
    //             $data_kajian_keperawatan['waktu_ttd_verifikasi_dokter_dpjp'] = $sign->waktu_ttd_verifikasi_dokter_dpjp;
    //         else :
    //             $data_kajian_keperawatan['waktu_ttd_verifikasi_dokter_dpjp'] = (safe_post('tanggal_verifikasi_dokter_dpjp') !== '' ? datetime2mysql(safe_post('tanggal_verifikasi_dokter_dpjp')) : NULL);
    //         endif;

    //         if ($sign->ttd_verifikasi_dokter_dpjp !== NULL) :
    //             $data_kajian_keperawatan['ttd_verifikasi_dokter_dpjp'] = $sign->ttd_verifikasi_dokter_dpjp;
    //         else :
    //             $data_kajian_keperawatan['ttd_verifikasi_dokter_dpjp'] = (safe_post('ttd_verifikasi_dokter_dpjp') !== '' ? safe_post('ttd_verifikasi_dokter_dpjp') : NULL);
    //         endif;

    //         if ($sign->waktu_ttd_dokter_dpjp !== NULL) :
    //             $data_kajian_medis['waktu_ttd_dokter_dpjp'] = $sign->waktu_ttd_dokter_dpjp;
    //         else :
    //             $data_kajian_medis['waktu_ttd_dokter_dpjp'] = (safe_post('tanggal_ttd_dokter_dpjp') !== '' ? datetime2mysql(safe_post('tanggal_ttd_dokter_dpjp')) : NULL);
    //         endif;

    //         if ($sign->ttd_dokter_dpjp !== NULL) :
    //             $data_kajian_medis['ttd_dokter_dpjp'] = $sign->ttd_dokter_dpjp;
    //         else :
    //             $data_kajian_medis['ttd_dokter_dpjp'] = (safe_post('ttd_dokter_dpjp') !== '' ? safe_post('ttd_dokter_dpjp') : NULL);
    //         endif;

    //         if ($sign->waktu_ttd_dokter_pengkajian !== NULL) :
    //             $data_kajian_medis['waktu_ttd_dokter_pengkajian'] = $sign->waktu_ttd_dokter_pengkajian;
    //         else :
    //             $data_kajian_medis['waktu_ttd_dokter_pengkajian'] = (safe_post('tanggal_ttd_dokter_pengkajian') !== '' ? datetime2mysql(safe_post('tanggal_ttd_dokter_pengkajian')) : NULL);
    //         endif;

    //         if ($sign->ttd_dokter_pengkajian !== NULL) :
    //             $data_kajian_medis['ttd_dokter_pengkajian'] = $sign->ttd_dokter_pengkajian;
    //         else :
    //             $data_kajian_medis['ttd_dokter_pengkajian'] = (safe_post('ttd_dokter_pengkajian') !== '' ? safe_post('ttd_dokter_pengkajian') : NULL);
    //         endif;
    //     else :
    //         $data_kajian_keperawatan['waktu_ttd_perawat'] = (safe_post('tanggal_ttd_perawat') !== '' ? datetime2mysql(safe_post('tanggal_ttd_perawat')) : NULL);
    //         $data_kajian_keperawatan['waktu_ttd_verifikasi_dokter_dpjp'] = (safe_post('tanggal_verifikasi_dokter_dpjp') !== '' ? datetime2mysql(safe_post('tanggal_verifikasi_dokter_dpjp')) : NULL);
    //         $data_kajian_keperawatan['ttd_perawat'] = (safe_post('ttd_perawat') !== '' ? safe_post('ttd_perawat') : NULL);
    //         $data_kajian_keperawatan['ttd_verifikasi_dokter_dpjp'] = (safe_post('ttd_verifikasi_dokter_dpjp') !== '' ? safe_post('ttd_verifikasi_dokter_dpjp') : NULL);

    //         $data_kajian_medis['waktu_ttd_dokter_dpjp'] = (safe_post('tanggal_ttd_dokter_dpjp') !== '' ? datetime2mysql(safe_post('tanggal_ttd_dokter_dpjp')) : NULL);
    //         $data_kajian_medis['waktu_ttd_dokter_pengkajian'] = (safe_post('tanggal_ttd_dokter_pengkajian') !== '' ? datetime2mysql(safe_post('tanggal_ttd_dokter_pengkajian')) : NULL);
    //         $data_kajian_medis['ttd_dokter_dpjp'] = (safe_post('ttd_dokter_dpjp') !== '' ? safe_post('ttd_dokter_dpjp') : NULL);
    //         $data_kajian_medis['ttd_dokter_pengkajian'] = (safe_post('ttd_dokter_pengkajian') !== '' ? safe_post('ttd_dokter_pengkajian') : NULL);
    //     endif;

    //     $response = $this->m_rawat_inap->updatePengkajianAwalRanap($data_kajian_keperawatan, $data_kajian_medis, $id_kajian_keperawatan, $id_kajian_medis);
    //     $this->response($response, REST_Controller::HTTP_OK);
    // }






 








    // PAPA
    function simpan_pengkajian_awal_anak_post()
    {
        if (safe_post('id_layanan_pendaftaran_anak') === '') :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
        endif;

        $id_layanan_pendaftaran = safe_post('id_layanan_pendaftaran_anak');
        $id_kajian_keperawatan_anak = safe_post('id_kajian_keperawatan_anak');

        $data_kajian_keperawatan_anak = array(
            'id_layanan_pendaftaran'   => $id_layanan_pendaftaran,
            'waktu_pengkajian_anak'    => (safe_post('waktu_pengkajian_anak') !== '' ? datetime2mysql(safe_post('waktu_pengkajian_anak')) : NULL),
            'cara_tiba_diruangan_anak' => safe_post('cara_tiba_diruangan_anak'),
            //data kesehatan pasien
            'informasi_dari_anak'  => json_encode(array(
                'pasien'           => safe_post('informasi_dari_pasien_anak'),
                'keluarga'         => safe_post('informasi_dari_keluarga_anak'),
                'lain'             => safe_post('informasi_dari_lain_anak'),
                'ket_lain'         => safe_post('informasi_dari_lain_anak_input'),
            )),

            'keluhan_utama_anak'        => safe_post('keluhan_utama_anak'),
            'timbul_keluhan_anak'       => safe_post('mulai_timbul_keluhan_anak'),
            'lama_keluhan_anak'         => safe_post('lama_keluhan_anak'),


            'faktor_pencetus_anak'  => json_encode(array(
                'infeksi'   => safe_post('faktor_pencetus_infeksi_anak'),
                'lain'      => safe_post('faktor_pencetus_lain_anak'),
                'ket_lain'  => safe_post('faktor_pencetus_lain_input_anak'),
            )),

            'sifat_keluhan_anak'                => safe_post('sifat_keluhan_anak'),
            'riwayat_penyakit_sekarang_anak'    => safe_post('riwayat_penyakit_sekarang_anak'),


            'riwayat_penyakit_terdahulu' => json_encode(array(
                'asma'       => safe_post('rpt_asma_anak'),
                'hipertensi' => safe_post('rpt_hipertensi_anak'),
                'jantung'    => safe_post('rpt_jantung_anak'),
                'diabetes'   => safe_post('rpt_diabetes_anak'),
                'hepatitis'  => safe_post('rpt_hepatitis_anak'),
                'lain'       => safe_post('rpt_lain_anak'),
                'ket_lain'   => safe_post('rpt_lain_anak_input'),
            )),

            'riwayat_penyakit_keluarga' => json_encode(array(
                'asma'       => safe_post('rpk_asma_anak'),
                'hipertensi' => safe_post('rpk_hipertensi_anak'),
                'jantung'    => safe_post('rpk_jantung_anak'),
                'diabetes'   => safe_post('rpk_diabetes_anak'),
                'hepatitis'  => safe_post('rpk_hepatitis_anak'),
                'lain'       => safe_post('rpk_lain_anak'),
                'ket_lain'   => safe_post('rpk_lain_anak_input'),
            )),

            'pernah_dirawat_anak' => json_encode(array(
                'dirawat'    => safe_post('pernah_dirawat_anak'),
                'kapan'      => safe_post('pernah_dirawat_anak_kapan'),
                'dimana'     => safe_post('pernah_dirawat_anak_dimana'),
            )),

            'obat_dari_luar_anak'           => safe_post('obat_luar_anak'),
            // riwayat alergi
            'alergi_anak'                   => safe_post('alergi_anak'),
            'alergi_obat_anak'              => safe_post('alergi_obat_anak'),
            'alergi_obat_reaksi_anak'       => safe_post('alergi_obat_anak_reaksi'),
            'alergi_makanan_anak'           => safe_post('alergi_makanan_anak'),
            'alergi_makanan_reaksi_anak'    => safe_post('alergi_makanan_anak_reaksi'),

            // Riwayat Kehamilan
            'usia_kehamilan'                => safe_post('usia_kehamilan_anak'),
            'berat_badan_lahir'             => safe_post('berat_badan_anak'),
            'panjang_badan_lahir'           => safe_post('panjang_badan_lahir_anak'),
            'riwayat_kelahiran_anak'        => safe_post('riwayat_kelahiran_anak'),
            'menangis'                      => safe_post('menangis_anak'),
            'riwayat_kuning'                => safe_post('riwayat_kuning_anak'),

            //Riwayat Imunisasi Anak
            'riwayat_imunisasi' => json_encode(array(
                'lengkap'           => safe_post('riwayat_imunisasi_anak_lengkap'),
                'tidak_pernah'      => safe_post('riwayat_imunisasi_anak_tidak_pernah'),
                'tidak_lengkap'     => safe_post('riwayat_imunisasi_anak_tidak_lengkap'),
                'imunisasi_lain'    => safe_post('riwayat_imunisasi_anak_lain'),
            )),

            //status fungsional
            'stts_fungsional_mandiri'               => safe_post('status_fungsional_mandiri_anak'),
            'stts_fungsional_ketergantungan'        => safe_post('ketergantungan_total_anak'),
            'stts_fungsional_ket_ketergantungan'    => safe_post('ketergantungan_total_anak_input'),
            'stts_fungsional_perlu_bantuan'         => safe_post('perlu_bantuan_anak'),
            'stts_fungsional_ket_perlu_bantuan'     => safe_post('perlu_bantuan_anak_input'),

            // Riwayat Tumbuh Kembang
            'asi_anak'          => safe_post('rtk_asi_anak'),
            'susu_formula'      => safe_post('rtk_susu_formula_anak'),
            'tengkurap'         => safe_post('rtk_tengkurep_anak'),
            'tumbuh_gigi'       => safe_post('rtk_tumbuh_gigi_anak'),
            'rtk_bicara'        => safe_post('rtk_bicara_anak'),
            'rtk_duduk'         => safe_post('rtk_duduk_anak'),
            'rtk_berdiri'       => safe_post('rtk_berdiri_anak'),
            'rtk_berjalan'      => safe_post('rtk_berjalan_anak'),

            //PSIKOSOSIAL, EKONOMI DAN SPIRITUAL
            'status_psikologi_anak' => json_encode(array(
                'cemas'             => safe_post('sps_cemas_anak'),
                'takut'             => safe_post('sps_takut_anak'),
                'marah'             => safe_post('sps_marah_anak'),
                'sedih'             => safe_post('sps_sedih_anak'),
                'bunuh_diri'        => safe_post('sps_bunuh_diri_anak'),
                'lain'              => safe_post('sps_lain_anak'),
                'ket_lain'          => safe_post('sps_lain_input_anak'),
            )),


            'hubungan_dengan_orang_tua'         => safe_post('hubungan_dengan_orang_tua_anak'),
            'tempat_tinggal_anak'               => safe_post('tempat_tinggal_anak'),
            'ket_tempat_tinggal_anak'           => safe_post('tempat_tinggal_anak_lain_input'),
            'pekerjaan_ayah'                    => safe_post('pekerjaan_ayah'),
            'pekerjaan_ibu'                     => safe_post('pekerjaan_ibu'),
            'cara_bayar'                        => safe_post('cara_bayar_anak'),


            'cara_bayar_anak_t' => safe_post('cara_bayar_anak_t'),


            'ket_asuransi_cara_bayar'           => safe_post('cara_bayar_anak_asuransi'),
            'ket_cara_bayar_lain'               => safe_post('cara_bayar_anak_lain_input'),
            'agama_anak'                        => safe_post('agama_anak'),
            'ket_agama_lain_anak'               => safe_post('agama_anak_lain_input'),
            'kegiatan_agama_dilakukan'          => safe_post('kegiatan_keagamaan_anak'),
            'kegiatan_spiritual_dilakukan'      => safe_post('kegiatan_spiritual_perawatan_anak'),
            'wajib_ibadah_anak'                 => safe_post('wajib_ibadah_anak'),
            'ket_wajib_ibadah_halangan_anak'    => safe_post('wajib_ibadah_anak_halangan_input'),
            'thaharoh_anak'                     => safe_post('thaharoh_anak'),
            'sholat_anak'                       => safe_post('sholat_anak'),

            //IDENTIFIKASI KEBUTUHAN KOMUNIKASI, BELAJAR/EDUKASI
            'kewarganegaraan_anak'      => safe_post('kewarganegaraan_anak'),
            'suku_bangsa'               => safe_post('suku_bangsa_anak'),
            'bicara_anak'               => safe_post('bicara_anak'),
            'ket_bicara_anak'           => safe_post('bicara_input_anak'),
            'perlu_penterjemah'         => safe_post('perlu_penterjemah_anak'),
            'ket_penterjemah'           => safe_post('perlu_penterjemah_anak_input'),
            'bahasa_isyarat'            => safe_post('bahasa_isyarat_anak'),
            'hanbatan_belajar_w'        => safe_post('hanbatan_belajar_w'),
            'h_menerima_edikasi_w'      => safe_post('h_menerima_edikasi_w'),


            'pendidikan_anak'           => safe_post('pendidikan_anak'),
            'pemahaman_penyakit'        => safe_post('pt_penyakit_perawatan_anak'),
            'pemahaman_pengobatan'      => safe_post('pt_pengobatan_anak'),
            'pemahaman_nutrisi_diet'    => safe_post('pt_nutrisi_diet_anak'),
            'pemahaman_spiritual'       => safe_post('pt_spiritual_anak'),
            'pemahaman_peralatan_medis' => safe_post('pt_peralatan_medis_anak'),
            'pemahaman_rehab_medik'     => safe_post('pt_rehab_medik_anak'),
            'pemahaman_manajemen_nyeri' => safe_post('pt_manajemen_nyeri_anak'),

            //Pemeriksaan Fisik Anak GCS
            'kesadaran'         => json_encode(array(
                'composmentis'  => safe_post('composmentis_anak'),
                'apatis'        => safe_post('apatis_anak'),
                'samnolen'      => safe_post('samnolen_anak'),
                'sopor'         => safe_post('sopor_anak'),
                'koma'          => safe_post('koma_anak'),
                'gcs_e'         => safe_post('gcs_e_anak'),
                'gcs_m'         => safe_post('gcs_m_anak'),
                'gcs_v'         => safe_post('gcs_v_anak'),
                'gcsm_total'    => safe_post('gcsm_total'),
            )),

            'tensi_sistolik_awal'           => safe_post('tensi_sis_anak'),
            'tensi_diastolik_awal'          => safe_post('tensi_dis_anak'),
            'nadi_awal'                     => safe_post('nadi_pa_anak'),
            'suhu_awal'                     => safe_post('suhu_pa_anak'),
            'nafas_awal_anak'               => safe_post('nafas_pa_anak'),
            'berat_badan_awal'              => safe_post('berat_badan_awal'),
            'lingkar_kepala_anak'           => safe_post('lingkar_kepala_anak'),
            'tinggi_badan_anak'             => safe_post('tinggi_awal_anak'),
            'lingkar_dada_anak'             => safe_post('lingkar_dada_anak'),
            'lingkar_perut_anak'            => safe_post('lingkar_perut_anak'),
            'gangguan_neurologis'           => safe_post('gangguan_neurologis'),
            'ket_gangguan_neurologis'       => safe_post('gangguan_neurologis_input'),
            'irama_nafas'                   => safe_post('irama_nafas_anak'),
            'retraksi_dada'                 => safe_post('retraksi_dada_anak'),
            'bentuk_dada'                   => safe_post('bentuk_dada_anak'),
            'ket_bentuk_dada'               => safe_post('bentuk_dada_anak_input'),
            'pola_nafas'                    => safe_post('pola_nafas_anak'),
            'ket_pola_nafas'                => safe_post('pola_nafas_anak_input'),
            'suara_nafas'                   => safe_post('suara_nafas_anak'),
            'ket_suara_nafas'               => safe_post('suara_nafas_anak_input'),
            'nafas_cuping_hidung'           => safe_post('nafas_cuping_hidung'),
            'sianosis_nafas'                => safe_post('sianosis_nafas_anak'),
            'alat_bantu_nafas'              => safe_post('alat_bantu_nafas_anak'),
            'ket_kanul'                     => safe_post('alat_bantu_nafas_anak_kanul_input'),


            'alat_bantu_nafas_anak_t'   => safe_post('alat_bantu_nafas_anak_ventilator'),


            'ket_ventilator'                => safe_post('alat_bantu_nafas_anak_ventilator_input'),
            'sirkulasi_sianosis'            => safe_post('sirkualsi_sianosis'),
            'sirkulasi_pucat'               => safe_post('pucat_anak'),

            'intensitas_nadi' => json_encode(array(
                'Kuat'              => safe_post('intensitas_nadi_anak_kuat'),
                'Lemah'             => safe_post('intensitas_nadi_anak_lemah'),
                'Bounding'          => safe_post('itensitas_nadi_anak_bounding'),
            )),
            // 'intensitas_nadi' => safe_post('intensitas_nadi_anak_kuat'),
            // 'intensitas_nadi'   => safe_post('intensitas_nadi_anak_lemah'),
            // 'intensitas_nadi' => safe_post('itensitas_nadi_anak_bounding'),

            'irama_nadi'                    => safe_post('irama_nadi_anak'),
            'sirkulasi_edema'               => safe_post('edema_anak'),
            'sirkulasi_crt'                 => safe_post('crt_anak'),
            'sirkulasi_akral'               => safe_post('akral_anak'),
            'sirkulasi_clubing_finger'      => safe_post('clubing_finger_anak'),

            'gastro_mulut' => json_encode(array(
                'mukosa_lembab'             => safe_post('mukosa_lembab_anak'),
                'mukosa_kering'             => safe_post('mukosa_kering_anak'),
                'stomatitis'                => safe_post('stomatitis_anak'),
                'labio'                     => safe_post('labio_anak'),
                'pendarahan_gusi'           => safe_post('pendarahan_gusi_anak'),
                'mulut_lainnya'             => safe_post('mulut_lainnya'),
                'ket_gastro_mulut'          => safe_post('mulut_lainnya_input'),
            )),


            // 'gastro_mulut' => json_encode(array(
            //     'mukosa_lembab_anak' => safe_post('mukosa_lembab_anak'),
            //     'mukosa_kering_anak' => safe_post('mukosa_kering_anak'),
            //     'stomatitis_anak' => safe_post('stomatitis_anak'),
            //     'labio_anak' => safe_post('labio_anak'),
            //     'pendarahan_gusi_anak' => safe_post('pendarahan_gusi_anak'),
            //     'mulut_lainnya' => safe_post('mulut_lainnya'),
            //     'mulut_lainnya_input' => safe_post('mulut_lainnya_input'),
            // )),

            'gastro_muntah'             => safe_post('muntah_anak'),
            'ket_gastro_muntah'         => safe_post('muntah_anak_lainnya'),
            'gastro_peristaltik'        => safe_post('peristaltik_usus_anak'),
            'gastro_mual'               => safe_post('mual_anak'),
            'gastro_ascites'            => safe_post('nyeri_ulu_hati_anak'),
            'gastro_nyeri_ulu_hati'     => safe_post('ascites_anak'),

            'bab_pengeluaran' => json_encode(array(
                'anus'          => safe_post('pengeluaran_anus'),
                'stomata'       => safe_post('pengeluaran_stomata'),
                'lainnya'       => safe_post('pengeluaran_stomata_lokasi'),
            )),

            'bab_frekuensi'         => safe_post('frekuensi_bab'),
            'konsistensi_anak'         => safe_post('konsistensi_anak'),

            'normal_anak' =>  json_encode([
                'normal_anak_1' => safe_post('normal_anak_1') !== '' ? safe_post('normal_anak_1') : null,
                'normal_anak_2' => safe_post('normal_anak_2') !== '' ? safe_post('normal_anak_2') : null,
                'normal_anak_3' => safe_post('normal_anak_3') !== '' ? safe_post('normal_anak_3') : null,
                'normal_anak_4' => safe_post('normal_anak_4') !== '' ? safe_post('normal_anak_4') : null,
                'normal_anak_5' => safe_post('normal_anak_5') !== '' ? safe_post('normal_anak_5') : null,
                'normal_anak_6' => safe_post('normal_anak_6') !== '' ? safe_post('normal_anak_6') : null,
            ]),


            'bab_konsistensi'       => safe_post('konsistensi_bab'),

            'bak_pengeluaran' => json_encode(array(
                'spontan'       => safe_post('pengeluaran_spontan_bak'),
                'kateter_urine' => safe_post('krakter_urine_bak'),
                'cystostomy'    => safe_post('pengeluaran_cystostomy'),
            )),

            'bak_kelainan'      => safe_post('kelainan_bak'),
            'bak_ket_kelainan'  => safe_post('kelainan_bak_lainnya'),

            'integumen_warna_kulit' => json_encode(array(
                'pucat'         => safe_post('si_warna_pucat_anak'),
                'kuning'        => safe_post('si_warna_kuniing_anak'),
                'normal'        => safe_post('si_warna_normal_anak'),
                'mootled'       => safe_post('si_warna_kulit_mootled'),
            )),

            'integumen_kelainan'            => safe_post('kelainan_sistem_integumen'),
            'integumen_resiko_dubitus'      => safe_post('resiko_dekubitus_anak'),
            'integumen_luka'                => safe_post('luka_anak'),
            'kelainan_tulang'               => safe_post('kelainan_tulang_anak'),
            'ket_kelainan_tulang'           => safe_post('kelainan_tulang_anak_lainnya'),
            'gerakan_anak'                  => safe_post('gerakan_anak'),
            'gentalia_anak'                 => safe_post('genetalia_anak'),
            'ket_gentalia_anak'             => safe_post('genetalia_anak_lainnya'),

            //Skrining Nyeri
            'nilai_tingkat_nyeri'           => safe_post('ptn_keterangan_anak'),

            'nyeri_hilang' => json_encode(array(
                'minum_obat'            => safe_post('ptn_minum_obat_anak'),
                'mendengarkan_musik'    => safe_post('ptn_mendengarkan_musik_anak'),
                'istirahat'             => safe_post('ptn_istirahat_anak'),
                'berubah_posisi'        => safe_post('ptn_berubah_posisi_anak'),
                'lain'                  => safe_post('ptn_lain_anak'),
                'ket_lain'              => safe_post('ptn_lain_input_anak'),
            )),

            'lokasi_nyeri'          => safe_post('lokasi_nyeri_anak'),
            'durasi_nyeri'          => safe_post('durasi_nyeri_anak'),
            'frekuensi_nyeri'       => safe_post('frekuensi_nyeri_anak'),
            //sn wajah
            'sn_wajah_1' => (safe_post('ekspresi_wajah_anak_1_ya') !== '' ? safe_post('ekspresi_wajah_anak_1_ya') : NULL),
            'sn_wajah_2' => (safe_post('ekspresi_wajah_anak_2_ya') !== '' ? safe_post('ekspresi_wajah_anak_2_ya') : NULL),
            'sn_wajah_3' => (safe_post('ekspresi_wajah_anak_3_ya') !== '' ? safe_post('ekspresi_wajah_anak_3_ya') : NULL),

            //sn kaki
            'sn_kaki_1' => (safe_post('kaki_anak_1_ya') !== '' ? safe_post('kaki_anak_1_ya') : NULL),
            'sn_kaki_2' => (safe_post('kaki_anak_2_ya') !== '' ? safe_post('kaki_anak_2_ya') : NULL),
            'sn_kaki_3' => (safe_post('kaki_anak_3_ya') !== '' ? safe_post('kaki_anak_3_ya') : NULL),

            //sn aktvitas
            'sn_aktivitas_1' => (safe_post('aktifitas_anak_1_ya') !== '' ? safe_post('aktifitas_anak_1_ya') : NULL),
            'sn_aktivitas_2' => (safe_post('aktifitas_anak_2_ya') !== '' ? safe_post('aktifitas_anak_2_ya') : NULL),
            'sn_aktivitas_3' => (safe_post('aktifitas_anak_3_ya') !== '' ? safe_post('aktifitas_anak_3_ya') : NULL),

            //sn menangis
            'sn_menangis_1' => (safe_post('ekspresi_menangis_anak_1_ya') !== '' ? safe_post('ekspresi_menangis_anak_1_ya') : NULL),
            'sn_menangis_2' => (safe_post('ekspresi_menangis_anak_2_ya') !== '' ? safe_post('ekspresi_menangis_anak_2_ya') : NULL),
            'sn_menangis_3' => (safe_post('ekspresi_menangis_anak_3_ya') !== '' ? safe_post('ekspresi_menangis_anak_3_ya') : NULL),

            //bicara
            'sn_bicara_1' => (safe_post('cara_biacara_anak_1_ya') !== '' ? safe_post('cara_biacara_anak_1_ya') : NULL),
            'sn_bicara_2' => (safe_post('cara_bicara_anak_2_ya') !== '' ? safe_post('cara_bicara_anak_2_ya') : NULL),
            'sn_bicara_3' => (safe_post('cara_bicara_anak_3_ya') !== '' ? safe_post('cara_bicara_anak_3_ya') : NULL),

            //skor
            'sn_nilai_total' => (safe_post('skrining_jumlah_skor') !== '' ? safe_post('skrining_jumlah_skor') : NULL),

            //Penilaian Resiko jatuh Anak
            //Umur
            'prja_umur_1' => (safe_post('prja_riwayat_jatuh_anak_3_tahun') !== '' ? safe_post('prja_riwayat_jatuh_anak_3_tahun') : NULL),
            'prja_umur_2' => (safe_post('prja_riwayat_jatuh_anak_7_tahun') !== '' ? safe_post('prja_riwayat_jatuh_anak_7_tahun') : NULL),
            'prja_umur_3' => (safe_post('prja_riwayat_jatuh_anak_13_tahun') !== '' ? safe_post('prja_riwayat_jatuh_anak_13_tahun') : NULL),
            'prja_umur_4' => (safe_post('prja_riwayat_jatuh_anak_lebih_13') !== '' ? safe_post('prja_riwayat_jatuh_anak_lebih_13') : NULL),

            //Jenis Kelamin
            'prja_jk_1' => (safe_post('prja_jk_laki') !== '' ? safe_post('prja_jk_laki') : NULL),
            'prja_jk_2' => (safe_post('prja_jk_perempuan') !== '' ? safe_post('prja_jk_perempuan') : NULL),

            //Diagnosis
            'prja_diagnosis_1' => (safe_post('prja_diagnosis_neurologi') !== '' ? safe_post('prja_diagnosis_neurologi') : NULL),
            'prja_diagnosis_2' => (safe_post('prja_diagnosis_respirator') !== '' ? safe_post('prja_diagnosis_respirator') : NULL),
            'prja_diagnosis_3' => (safe_post('prja_diagnosis_perilaku') !== '' ? safe_post('prja_diagnosis_perilaku') : NULL),
            'prja_diagnosis_4' => (safe_post('prja_diagnosis_lain') !== '' ? safe_post('prja_diagnosis_lain') : NULL),

            //Gangguan Kognitif
            'prja_kognitif_1' => (safe_post('prja_gk_keterbatasan') !== '' ? safe_post('prja_gk_keterbatasan') : NULL),
            'prja_kognitif_2' => (safe_post('prja_gk_pelupa') !== '' ? safe_post('prja_gk_pelupa') : NULL),
            'prja_kognitif_3' => (safe_post('prja_gk_daya_pikir') !== '' ? safe_post('prja_gk_daya_pikir') : NULL),

            //Faktor LIngkungan 
            'prja_lingkungan_1' => (safe_post('prja_riwayat_jatuh_bayi') !== '' ? safe_post('prja_riwayat_jatuh_bayi') : NULL),
            'prja_lingkungan_2' => (safe_post('prja_alat_bantu_pasien') !== '' ? safe_post('prja_alat_bantu_pasien') : NULL),
            'prja_lingkungan_3' => (safe_post('prja_psaien_tempat_tidur') !== '' ? safe_post('prja_psaien_tempat_tidur') : NULL),
            'prja_lingkungan_4' => (safe_post('prja_area_pasien') !== '' ? safe_post('prja_area_pasien') : NULL),

            //Respon Terhadap Pembedahan 
            // 'prja_respon_1' => (safe_post('prja_riwayat_jatuh_anak_3_tahun') !== '' ? safe_post('prja_riwayat_jatuh_anak_3_tahun') : NULL),
            // 'prja_respon_2' => (safe_post('prja_riwayat_jatuh_anak_7_tahun') !== '' ? safe_post('prja_riwayat_jatuh_anak_7_tahun') : NULL),
            // 'prja_respon_3' => (safe_post('prja_riwayat_jatuh_anak_13_tahun') !== '' ? safe_post('prja_riwayat_jatuh_anak_13_tahun') : NULL),

            'prja_respon_1' => (safe_post('prja_24_jam') !== '' ? safe_post('prja_24_jam') : NULL),
            'prja_respon_2' => (safe_post('prja_48_jam') !== '' ? safe_post('prja_48_jam') : NULL),
            'prja_respon_3' => (safe_post('prja_lebih_48_jam') !== '' ? safe_post('prja_lebih_48_jam') : NULL),

            //Penggunaan Obat-obatan
            // 'prja_obat_1' => (safe_post('prja_riwayat_jatuh_anak_3_tahun') !== '' ? safe_post('prja_riwayat_jatuh_anak_3_tahun') : NULL),
            // 'prja_obat_2' => (safe_post('prja_riwayat_jatuh_anak_7_tahun') !== '' ? safe_post('prja_riwayat_jatuh_anak_7_tahun') : NULL),
            // 'prja_obat_3' => (safe_post('prja_riwayat_jatuh_anak_13_tahun') !== '' ? safe_post('prja_riwayat_jatuh_anak_13_tahun') : NULL),

            'prja_obat_1' => (safe_post('prja_pengguanaan_obat_bersama') !== '' ? safe_post('prja_pengguanaan_obat_bersama') : NULL),
            'prja_obat_2' => (safe_post('prja_penggunaan_salah_satu_obat') !== '' ? safe_post('prja_penggunaan_salah_satu_obat') : NULL),
            'prja_obat_3' => (safe_post('prja_tanpa_obat') !== '' ? safe_post('prja_tanpa_obat') : NULL),

            //SKOR
            'prja_nilai_total' => (safe_post('prja_nilai_total') !== '' ? safe_post('prja_nilai_total') : NULL),

            //SKRINING GIZI
            'sg_nilai_1' => (safe_post('sgizi_gizi_buruk') !== '' ? safe_post('sgizi_gizi_buruk') : NULL),
            'sg_nilai_2' => (safe_post('sgizi_penurunan_bb') !== '' ? safe_post('sgizi_penurunan_bb') : NULL),
            'sg_nilai_3' => (safe_post('sgizi_dua_kondisi') !== '' ? safe_post('sgizi_dua_kondisi') : NULL),
            'sg_nilai_4' => (safe_post('sgizi_malnutrisi') !== '' ? safe_post('sgizi_malnutrisi') : NULL),
            'sg_nilai_total' => (safe_post('sgizi_jumlah') !== '' ? safe_post('sgizi_jumlah') : NULL),

            //Daftar Penyakit atau Keadaan Beresiko
            'daftar_penyakit_malnutrisi' => json_encode(array(
                'diare_persisten'                   => safe_post('penyakit_diare'),
                'prematuris'                        => safe_post('penyakit_prematuris'),
                'penyakit_jantung_bawaan'           => safe_post('penyakit_jantung_bawaan'),
                'kelainan_bawaan'                   => safe_post('penyakit_kelainan_bawaan'),
                'wajah_dismorfik'                   => safe_post('penyakit_wajah_aneh'),
                'penyakit_akut_berat'               => safe_post('penyakit_akut_berat'),
                'ginjal'                            => safe_post('penyakit_ginjal_anak'),
                'infeksi_hiv'                       => safe_post('penyakit_hiv_anak'),
                'kanker'                            => safe_post('penyakit_kanker_anak'),
                'penyakit_hati_kronik'              => safe_post('penyakit_hati_kronik_anak'),
                'penyakit_ginjal_kronik'            => safe_post('penyakit_ginjal_kronik_anak'),
                'terdapat_stoma'                    => safe_post('penyakit_stoma_usus_halus'),
                'trauma'                            => safe_post('penyakit_trauma_anak'),
                'kontipasi_berulang'                => safe_post('penyakit_kontipasi_berulang_anak'),
                'gagal_tumbuh'                      => safe_post('penyakit_gagal_tumbuh_anak'),
                'penyakit_metabolik'                => safe_post('penyakit_metabolik_anak'),
                'retardasi_metabolik'               => safe_post('penyakit_retardasi_anak'),
                'keterlambatan_perkembangan'        => safe_post('penyakit_keterlambatan_kembang_anak'),
                'luka_bakar'                        => safe_post('penyakit_luka_bakar_anak'),
                'rencana_operasi'                   => safe_post('penyakit_obesitas_anak'),
            )),

            //Skrining Pasien Akhi Kehidupan
            'skrining_pasien_akhir_kehidupan' => json_encode(array(
                'kriteria_anak_1' => safe_post('spak_1_anak'),
                'kriteria_anak_2' => safe_post('spak_2_anak'),
                'kriteria_anak_3' => safe_post('spak_3_anak'),
                'kriteria_anak_4' => safe_post('spak_4_anak'),
                'kriteria_anak_5' => safe_post('spak_5_anak'),
            )),

            //Populasi Khusus            
            'pk_penyakit_menular'                   => json_encode(array(
                // pasien mengetahui penyakit saat ini
                'penyakit_saat_ini'                 => safe_post('pk_penyakit_menular_1_anak'),
                // sumber informasi tentang penyakit diperoleh dari
                'informasi_dari'              => array(
                    'dokter'                    => safe_post('pk_pm_dokter_anak'),
                    'perawat'                   => safe_post('pk_pm_perawat_anak'),
                    'keluarga'                  => safe_post('pk_pm_keluarga_anak'),
                    'lain'                      => safe_post('pk_pm_lain_anak'),
                    'ket_lain'                  => safe_post('pk_pm_lain_anak_input'),
                ),
                // menerima informasi jangka waktu pengobatan
                'informasi_jangka_waktu'                    => safe_post('pk_penyakit_menular_3_anak'),
                'ket_informasi_jangka_waktu'                => safe_post('pk_penyakit_menular_3_anak_input'),
                // melakukan pemeriksaan rutin
                'pemeriksaan_rutin'                     => safe_post('pk_penyakit_menular_4_anak'),
                'ket_pemeriksaan_rutin'                 => safe_post('pk_penyakit_menular_4_anak_input'),

                'cara_penularan'       => array(
                    'airbone'                   => safe_post('pk_pm_airbone_anak'),
                    'droplet'                   => safe_post('pk_pm_droplet_anak'),
                    'kontak_langsung'           => safe_post('pk_pm_kontak_langsung_anak'),
                    'cairan_tubuh'              => safe_post('pk_pm_cairan_tubuh_anak'),
                ),

                'penyakit_penyerta'                 => safe_post('pk_penyakit_menular_6_anak'),
                'ket_penyakit_penyerta'             => safe_post('pk_penyakit_menular_6_anak_input'),
            )),


            'pk_penurunan_daya_tahan'   => json_encode(array(
                // pasien mengetahui penyakit saat ini
                'penyakit_saat_ini'     => safe_post('pk_penyakit_pdtt_1_anak'),
                // sumber informasi tentang penyakit diperoleh dari
                'informasi_dari' => array(
                    'dokter'        => safe_post('pk_pdtt_dokter_anak'),
                    'perawat'       => safe_post('pk_pdtt_perawat_anak'),
                    'keluarga'      => safe_post('pk_pdtt_keluarga_anak'),
                    'lain'          => safe_post('pk_pdtt_lain_anak'),
                    'ket_lain'      => safe_post('pk_pdtt_lain_anak_input'),
                ),
                // menerima informasi jangka waktu pengobatan
                'informasi_jangka_waktu'        => safe_post('pk_penyakit_pdtt_3_anak'),
                'ket_informasi_jangka_waktu'    => safe_post('pk_penyakit_pdtt_3_anak_input'),
                // melakukan pemeriksaan rutin
                'pemeriksaan_rutin'             => safe_post('pk_penyakit_pdtt_4_anak'),
                'ket_pemeriksaan_rutin'         => safe_post('pk_penyakit_pdtt_4_anak_input'),
                'penyakit_penyerta'             => safe_post('pk_penyakit_pdtt_5_anak'),
                'ket_penyakit_penyerta'         => safe_post('pk_penyakit_pdtt_5_anak_input'),
            )),


            'pk_kesehatan_jiwa' => json_encode(array(
                'ket_1' => safe_post('pk_kesehatan_jiwa_1_anak'),
                'ket_2' => safe_post('pk_kesehatan_jiwa_2_anak'),
                'ket_3' => safe_post('pk_kesehatan_jiwa_3_anak'),
                'ket_4' => safe_post('pk_kesehatan_jiwa_4_anak'),
                'ket_5' => safe_post('pk_kesehatan_jiwa_5_anak'),
                'ket_6' => safe_post('pk_kesehatan_jiwa_6_anak'),
                'ket_7' => safe_post('pk_kesehatan_jiwa_7_anak'),
                'ket_8' => safe_post('pk_kesehatan_jiwa_8_anak'),
                'ket_9' => safe_post('pk_kesehatan_jiwa_9_anak'),
            )),


            'pk_pasien_kekerasan' => json_encode(array(
                'ket_1' => safe_post('pk_pasien_kekerasan_1_anak'),
                'ket_2' => safe_post('pk_pasien_kekerasan_2_anak'),
                'ket_3' => safe_post('pk_pasien_kekerasan_3_anak'),
                'ket_4' => safe_post('pk_pasien_kekerasan_4_anak'),
                'ket_5' => safe_post('pk_pasien_kekerasan_5_anak'),
                'ket_6' => safe_post('pk_pasien_kekerasan_6_anak'),
            )),

            'pk_pasien_ketergantungan'  => json_encode(array(
                'obat'                  => safe_post('pk_pasien_ketergantungan_obat_anak'),
                'ket_obat'              => safe_post('pk_pasien_ketergantungan_obat_input_anak'),
                'lama_ketergantungan'   => safe_post('pk_pasien_lama_ketergantungan_obat_input_anak'),
            )),

            //baru sampe sini 
            // skala early warning system
            // 'sew_suhu'                  => safe_post('suhu_anak_sew'),
            // 'sew_pernafasan'            => safe_post('pernafasan_anak_sew'),
            // 'sew_kondisi_pernafasan'    => safe_post('kondisi_pernafasan_anak_sew'),
            // 'sew_alat_bantu'            => safe_post('alat_bantu_anak_sew'),
            // 'sew_saturasi'              => safe_post('saturasi_anak_sew'),
            // 'sew_nadi'                  => safe_post('nadi_anak_sew'),
            // 'sew_warna_kulit'           => safe_post('warna_kulit_anak_sew'),
            // 'sew_tds'                   => safe_post('tds_anak_sew'),
            // 'sew_kesadaran'             => safe_post('kesadaran_anak_sew'),
            // 'sew_total'                 => safe_post('total_skala_sew_anak'),

            // TAMBAHAN WH
            'sew_suhu'                  => safe_post('suhupewsk'),
            'sew_pernafasan'            => safe_post('pernafasanpewsk'),
            'sew_kondisi_pernafasan'    => safe_post('tidakretraksipewsk'),
            'sew_alat_bantu'            => safe_post('alatbantupewsk'),
            'sew_saturasi'              => safe_post('saturasipewask'),
            'sew_nadi'                  => safe_post('nadipewsk'),
            'sew_warna_kulit'           => safe_post('warnakulitpewsk'),
            'sew_tds'                   => safe_post('tdspewsk'),
            'sew_kesadaran'             => safe_post('kesadaranpewsk'),
            'sew_total'                 => safe_post('sew_total'),

            //Data Penunjang 
            'penunjang_lab'         => (safe_post('tanggal_pemeriksaan_lab_anak') !== '' ? date2mysql(safe_post('tanggal_pemeriksaan_lab_anak')) : NULL),
            'penunjang_rad'         => (safe_post('tanggal_pemeriksaan_rad_anak') !== '' ? date2mysql(safe_post('tanggal_pemeriksaan_rad_anak')) : NULL),
            'hasil_lab'             => safe_post('hasiil_pemeriksaan_labo_anak'),
            'hsail_rad'             => safe_post('hasil_pemeriksaan_rad_anak'),
            'penunjang_lainnya'     => safe_post('penunjang_lain_anak'),

            //Masalah Keperawatam
            'masalah_keperawatan'      => json_encode(array(
                'ket_1' => safe_post('masalah_keperawatan_1_anak'),
                'ket_2' => safe_post('masalah_keperawatan_2_anak'),
                'ket_3' => safe_post('masalah_keperawatan_3_anak'),
                'ket_4' => safe_post('masalah_keperawatan_4_anak'),
                'ket_5' => safe_post('masalah_keperawatan_5_anak'),
                'ket_6' => safe_post('masalah_keperawatan_6_anak'),
                'ket_7' => safe_post('masalah_keperawatan_7_anak'),
                'ket_8' => safe_post('masalah_keperawatan_8_anak'),
                'ket_9' => safe_post('masalah_keperawatan_9_anak'),
                'ket_10' => safe_post('masalah_keperawatan_10_anak'),
                'ket_11' => safe_post('masalah_keperawatan_11_anak'),
                'ket_12' => safe_post('masalah_keperawatan_12_anak'),
                'ket_13' => safe_post('masalah_keperawatan_13_anak'),
                'ket_14' => safe_post('masalah_keperawatan_14_anak'),
                'ket_15' => safe_post('masalah_keperawatan_15_anak'),
                'ket_16' => safe_post('masalah_keperawatan_16_anak'),
                'ket_17' => safe_post('masalah_keperawatan_17_anak'),
                'ket_18' => safe_post('masalah_keperawatan_18_anak'),
                'ket_19' => safe_post('masalah_keperawatan_19_anak'),
                'ket_20' => safe_post('masalah_keperawatan_20_anak'),
                'ket_21' => safe_post('masalah_keperawatan_21_anak'),
                'ket_22' => safe_post('masalah_keperawatan_22_anak'),
                'ket_23' => safe_post('masalah_keperawatan_23_anak'),
                'ket_24' => safe_post('masalah_keperawatan_24_anak'),
                'ket_25' => safe_post('masalah_keperawatan_25_anak'),
                'ket_26' => safe_post('masalah_keperawatan_26_anak'),
                'ket_27' => safe_post('masalah_keperawatan_27_anak'),
                'ket_28' => safe_post('masalah_keperawatan_28_anak'),
                'ket_29' => safe_post('masalah_keperawatan_29_anak'),
                'ket_30' => safe_post('masalah_keperawatan_30_anak'),
                'ket_31' => safe_post('masalah_keperawatan_31_anak'),
                'ket_32' => safe_post('masalah_keperawatan_32_anak'),
                'ket_33' => safe_post('masalah_keperawatan_33_anak'),
                'ket_34' => safe_post('masalah_keperawatan_34_anak'),
                'ket_lain' => safe_post('masalah_keperawatan_lain_input_anak'),
            )),

            'perencanaan_pulang'   => json_encode(array(
                'planning_1'   => safe_post('discharge_planning_1_anak'),
                'planning_2'   => safe_post('discharge_planning_2_anak'),
                'planning_3'   => safe_post('discharge_planning_3_anak'),
                'planning_4'   => safe_post('discharge_planning_4_anak'),
                'kriteria' => array(
                    'kriteria_1'   => safe_post('kriteria_discharge_1_anak'),
                    'kriteria_2'   => safe_post('kriteria_discharge_2_anak'),
                    'kriteria_3'   => safe_post('kriteria_discharge_3_anak'),
                    'kriteria_4'   => safe_post('kriteria_discharge_4_anak'),
                    'kriteria_5'   => safe_post('kriteria_discharge_5_anak'),
                    'kriteria_6'   => safe_post('kriteria_discharge_6_anak'),
                    'kriteria_7'   => safe_post('kriteria_discharge_7_anak'),
                    'kriteria_8'   => safe_post('kriteria_discharge_8_anak'),
                    'kriteria_9'   => safe_post('kriteria_discharge_9_anak'),
                    'kriteria_lain' => safe_post('kriteria_discharge_lain_input_anak'),
                ),
            )),
            'id_perawat'   => (safe_post('perawat_anak') !== '' ? safe_post('perawat_anak') : NULL),
            'id_verifikasi_dokter_dpjp' => (safe_post('verifikasi_dokter_dpjp_anak') !== '' ? safe_post('verifikasi_dokter_dpjp_anak') : NULL),
        );


        //KAJIAN MEDIS PASIEN ANAK
        $id_kajian_medis_anak = safe_post('id_kajian_medis_anak');

        // update alergi pasien
        $this->load->model('pelayanan/Pelayanan_model', 'm_pelayanan');
        $this->m_pelayanan->updateAlergiPasien(safe_post('id_pasien'), safe_post('riwayat_alergi'));
        // cek profil pasien
        $checkProfilPasien = $this->db->query("select * from sm_profil_pasien where id_pasien = '" . safe_post('id_pasien') . "'")->row();
        $dataProfilPasien = array(
            'id_pasien' => safe_post('id_pasien'),

        );
        if ($checkProfilPasien) :
            $this->db->where('id_pasien', safe_post('id_pasien'), true)->update('sm_profil_pasien', $dataProfilPasien);
        else :
            $this->db->insert('sm_profil_pasien', $dataProfilPasien);
        endif;

        $data_kajian_medis_anak = array(
            'id_layanan_pendaftaran'        => $id_layanan_pendaftaran,
            'waktu_pengkajian'              => (safe_post('waktu_kajian_medis_anak') !== '' ? datetime2mysql(safe_post('waktu_kajian_medis_anak')) : NULL),
            'keluhan_utama'                 => safe_post('keluhan_utama_medis_anak'),
            'riwayat_penyakit_sekarang'     => safe_post('rps_medis_anak'),
            'riwayat_penyakit_terdahulu'    => safe_post('rpt_medis_anak'),
            'pengobatan'                    => safe_post('pengobatan_medis_anak'),
            'riwayat_alergi'                => safe_post('riwayat_alergi_anak'),
            'riwayat_pasien'                => safe_post('riwayat_alergi'),

            'riwayat_penyakit_keluarga'     => json_encode(array(
                'hasil'                     => safe_post('rpk_medis_anak'),
                'asma'                      => safe_post('rpk_medis_anak_asma'),
                'dm'                        => safe_post('rpk_medis_anak_dm'),
                'cardiovascular'            => safe_post('rpk_medis_anak_cardiovascular'),
                'kanker'                    => safe_post('rpk_medis_anak_kanker'),
                'thalasemia'                => safe_post('rpk_medis_anak_thalasemia'),
                'lain'                      => safe_post('rpk_medis_anak'),
                'ket_lain'                  => safe_post('rpk_medis_anak_lain_input'),
            )),

            'riwayat_pasien'                => safe_post('riwayat_anak'),

            'kesadaran'                     => json_encode(array(
                'composmentis'              => safe_post('composmentis_medis_anak'),
                'apatis'                    => safe_post('apatis_medis_anak'),
                'samnolen'                  => safe_post('samnolen_medis_anak'),
                'sopor'                     => safe_post('sopor_medis_anak'),
                'koma'                      => safe_post('koma_medis_anak'),
            )),
            'pf_kepala'                     => safe_post('pf_kepala_anak'),
            'ket_pf_kepala'                 => safe_post('ket_pf_kepala_anak'),
            'pf_mata'                       => safe_post('pf_hidung_anak'),
            'ket_pf_mata'                   => safe_post('ket_pf_mata_anak'),
            'pf_hidung'                     => safe_post('pf_hidung_anak'),
            'ket_pf_hidung'                 => safe_post('ket_pf_hidung_anak'),
            'pf_gigi_mulut'                 => safe_post('pf_gigi_mulut_anak'),
            'ket_pf_gigi_mulut'             => safe_post('ket_pf_gigi_mulut_anak'),
            'pf_tenggorokan'                => safe_post('pf_tenggorokan_anak'),
            'ket_pf_tenggorokan'            => safe_post('ket_pf_tenggorokan_anak'),
            'pf_telinga'                    => safe_post('pf_telinga_anak'),
            'ket_pf_telinga'                => safe_post('ket_pf_telinga_anak'),
            'pf_leher'                      => safe_post('pf_leher_anak'),
            'ket_pf_leher'                  => safe_post('ket_pf_leher_anak'),
            'pf_thorax'                     => safe_post('pf_thorax_anak'),
            'ket_pf_thorax'                 => safe_post('ket_pf_thorax_anak'),
            'pf_jantung'                    => safe_post('pf_jantung_anak'),
            'ket_pf_jantung'                => safe_post('ket_pf_jantung_anak'),
            'pf_paru'                       => safe_post('pf_paru_anak'),
            'ket_pf_paru'                   => safe_post('ket_pf_paru_anak'),
            'pf_abdomen'                    => safe_post('pf_abdomen_anak'),
            'ket_pf_abdomen'                => safe_post('ket_pf_abdomen_anak'),
            'pf_genitalia_anus'             => safe_post('pf_genitalia_anak'),
            'ket_pf_genitalia_anus'         => safe_post('ket_pf_genitalia_anak'),
            'pf_ekstermitas'                => safe_post('pf_ekstermitas_anak'),
            'ket_pf_ekstermitas'            => safe_post('ket_pf_ekstermitas_anak'),
            'pf_kulit'                      => safe_post('pf_kulit_anak'),
            'ket_pf_kulit'                  => safe_post('ket_pf_kulit_anak'),

            'hasil_laboratorium'            => safe_post('hasil_lab_anak'),
            'hasil_radiologi'               => safe_post('hasil_rad_anak'),
            'hasil_penunjang_lain'          => safe_post('hasil_pen_lain_anak'),
            'diagnosa_awal'                 => safe_post('diag_awal_anak'),


            'rencana_edukasi'               => safe_post('rencana_edukasi_medis_anak'),
            'rencana_pemeriksaan_penunjang' => safe_post('rencana_pemeriksaan_penunjang_anak'),
            'rencana_terapi'                => safe_post('rencana_terapi_anak'),
            'rencana_konsultasi'            => safe_post('rencana_konsultasi_anak'),
            'perkiraan_lama_rawat'          => safe_post('perkiraan_lama_rawat_anak'),
            'ditetapkan_berapa_hari'        => safe_post('ditetapkan_berapa_hari_anak'),
            'tanggal_rencana_pulang'        => (safe_post('tanggal_rencana_pulang_anak') !== '' ? date2mysql(safe_post('tanggal_rencana_pulang_anak')) : NULL),
            'alasan_belum_ditetapkan'       => safe_post('alasan_belum_ditetapkan_anak'),
            'sbd_anak'                      => safe_post('sbd_anak'),
            'id_dokter_dpjp'                => (safe_post('dokter_dpjp_anak') !== '' ? safe_post('dokter_dpjp_anak') : NULL),
            // 'ttd_dokter_dpjp'            => safe_post('ttd_dokter_dpjp_anak'),
            'id_dokter_pengkajian'          => (safe_post('dokter_pengkajian_anak') !== '' ? safe_post('dokter_pengkajian_anak') : NULL),
            // 'ttd_dokter_pengkajian'      => safe_post('ttd_dokter_pengkajian'),
        );

        $sign = $this->db->select('kkr.waktu_ttd_perawat, kkr.ttd_perawat, kkr.waktu_ttd_verifikasi_dokter_dpjp, kkr.ttd_verifikasi_dokter_dpjp, kmr.waktu_ttd_dokter_dpjp, kmr.ttd_dokter_dpjp, kmr.waktu_ttd_dokter_pengkajian, kmr.ttd_dokter_pengkajian')
            ->from('sm_kajian_keperawatan_anak as kkr')
            ->join('sm_kajian_medis_anak as kmr', 'kmr.id_layanan_pendaftaran = kkr.id_layanan_pendaftaran')
            ->where('kkr.id_layanan_pendaftaran', $id_layanan_pendaftaran)
            ->get()
            ->row();
        if (isset($sign)) :
            if ($sign->waktu_ttd_perawat !== NULL) :
                $data_kajian_keperawatan_anak['waktu_ttd_perawat'] = $sign->waktu_ttd_perawat;
            else :
                $data_kajian_keperawatan_anak['waktu_ttd_perawat'] = (safe_post('tanggal_ttd_perawat_anak') !== '' ? datetime2mysql(safe_post('tanggal_ttd_perawat_anak')) : NULL);
            endif;

            if ($sign->ttd_perawat !== NULL) :
                $data_kajian_keperawatan_anak['ttd_perawat'] = $sign->ttd_perawat;
            else :
                $data_kajian_keperawatan_anak['ttd_perawat'] = (safe_post('ttd_perawat_anak') !== '' ? safe_post('ttd_perawat_anak') : NULL);
            endif;

            if ($sign->waktu_ttd_verifikasi_dokter_dpjp !== NULL) :
                $data_kajian_keperawatan_anak['waktu_ttd_verifikasi_dokter_dpjp'] = $sign->waktu_ttd_verifikasi_dokter_dpjp;
            else :
                $data_kajian_keperawatan_anak['waktu_ttd_verifikasi_dokter_dpjp'] = (safe_post('tanggal_verifikasi_dokter_dpjp_anak') !== '' ? datetime2mysql(safe_post('tanggal_verifikasi_dokter_dpjp_anak')) : NULL);
            endif;

            if ($sign->ttd_verifikasi_dokter_dpjp !== NULL) :
                $data_kajian_keperawatan_anak['ttd_verifikasi_dokter_dpjp'] = $sign->ttd_verifikasi_dokter_dpjp;
            else :
                $data_kajian_keperawatan_anak['ttd_verifikasi_dokter_dpjp'] = (safe_post('ttd_verifikasi_dokter_dpjp_anak') !== '' ? safe_post('ttd_verifikasi_dokter_dpjp_anak') : NULL);
            endif;

            if ($sign->waktu_ttd_dokter_dpjp !== NULL) :
                $data_kajian_medis_anak['waktu_ttd_dokter_dpjp'] = $sign->waktu_ttd_dokter_dpjp;
            else :
                $data_kajian_medis_anak['waktu_ttd_dokter_dpjp'] = (safe_post('tanggal_ttd_dokter_dpjp_anak') !== '' ? datetime2mysql(safe_post('tanggal_ttd_dokter_dpjp_anak')) : NULL);
            endif;

            if ($sign->ttd_dokter_dpjp !== NULL) :
                $data_kajian_medis_anak['ttd_dokter_dpjp'] = $sign->ttd_dokter_dpjp;
            else :
                $data_kajian_medis_anak['ttd_dokter_dpjp'] = (safe_post('ttd_dokter_dpjp_anak') !== '' ? safe_post('ttd_dokter_dpjp_anak') : NULL);
            endif;

            if ($sign->waktu_ttd_dokter_pengkajian !== NULL) :
                $data_kajian_medis_anak['waktu_ttd_dokter_pengkajian'] = $sign->waktu_ttd_dokter_pengkajian;
            else :
                $data_kajian_medis_anak['waktu_ttd_dokter_pengkajian'] = (safe_post('tanggal_ttd_dokter_pengkajian_anak') !== '' ? datetime2mysql(safe_post('tanggal_ttd_dokter_pengkajian_anak')) : NULL);
            endif;

            if ($sign->ttd_dokter_pengkajian !== NULL) :
                $data_kajian_medis_anak['ttd_dokter_pengkajian'] = $sign->ttd_dokter_pengkajian;
            else :
                $data_kajian_medis_anak['ttd_dokter_pengkajian'] = (safe_post('ttd_dokter_pengkajian_anak') !== '' ? safe_post('ttd_dokter_pengkajian_anak') : NULL);
            endif;
        else :
            $data_kajian_keperawatan_anak['waktu_ttd_perawat'] = (safe_post('tanggal_ttd_perawat_anak_anak') !== '' ? datetime2mysql(safe_post('tanggal_ttd_perawat_anak_anak')) : NULL);
            $data_kajian_keperawatan_anak['waktu_ttd_verifikasi_dokter_dpjp'] = (safe_post('tanggal_verifikasi_dokter_dpjp_anak') !== '' ? datetime2mysql(safe_post('tanggal_verifikasi_dokter_dpjp_anak')) : NULL);
            $data_kajian_keperawatan_anak['ttd_perawat'] = (safe_post('ttd_perawat_anak') !== '' ? safe_post('ttd_perawat_anak') : NULL);
            $data_kajian_keperawatan_anak['ttd_verifikasi_dokter_dpjp'] = (safe_post('ttd_verifikasi_dokter_dpjp_anak') !== '' ? safe_post('ttd_verifikasi_dokter_dpjp_anak') : NULL);

            $data_kajian_medis_anak['waktu_ttd_dokter_dpjp'] = (safe_post('tanggal_ttd_dokter_dpjp_anak') !== '' ? datetime2mysql(safe_post('tanggal_ttd_dokter_dpjp_anak')) : NULL);
            $data_kajian_medis_anak['waktu_ttd_dokter_pengkajian'] = (safe_post('tanggal_ttd_dokter_pengkajian_anak') !== '' ? datetime2mysql(safe_post('tanggal_ttd_dokter_pengkajian_anak')) : NULL);
            $data_kajian_medis_anak['ttd_dokter_dpjp'] = (safe_post('ttd_dokter_dpjp_anak') !== '' ? safe_post('ttd_dokter_dpjp_anak') : NULL);
            $data_kajian_medis_anak['ttd_dokter_pengkajian'] = (safe_post('ttd_dokter_pengkajian_anak') !== '' ? safe_post('ttd_dokter_pengkajian_anak') : NULL);
        endif;

        $response = $this->m_rawat_inap->updatePengkajianAwalAnak($data_kajian_keperawatan_anak, $data_kajian_medis_anak, $id_kajian_keperawatan_anak, $id_kajian_medis_anak);
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

        $data = $this->m_rawat_inap->updateSuratKontrol($data);
        $this->response($data, REST_Controller::HTTP_OK);
    }

    public function simpan_surat_keterangan_kontrol_post()
    {
        $id_pendaftaran         = safe_post('id_pendaftaran');
        $id_layanan_pendaftaran = safe_post('id_layanan_pendaftaran');
        $id_jadwal_dokter       = safe_post('dokter_tujuan');
        $id_poli                = safe_post('poli_tujuan');
        $tanggal_kontrol        = date2mysql(safe_post('tanggal_kontrol'));

        $jadwal_dokter = $this->db->get_where('sm_jadwal_dokter', array('id' => $id_jadwal_dokter))->row();
        $id_dokter      = $jadwal_dokter->id_dokter;

        $kode_bpjs_dokter       = $this->db->select('kode_bpjs')->from('sm_tenaga_medis')->where('id', $id_dokter)->get()->row()->kode_bpjs;
        $kode_bpjs_poli         = $this->db->select('kode')->from('sm_spesialisasi')->where('id', $id_poli)->get()->row()->kode;
        $pendaftaran            = $this->db->select('id_pasien, id_penjamin, no_polish')->from('sm_pendaftaran')->where('id', $id_pendaftaran)->get()->row();

        if (!$pendaftaran->no_polish && $pendaftaran->id_penjamin == 1) {
            $penjamin_pasien = $this->db->select('no_polish')->from('sm_penjamin_pasien')->where('id_pasien', $pendaftaran->id_pasien)->where('id_penjamin', $pendaftaran->id_penjamin)->get()->row();
            if (!$penjamin_pasien) {
                $this->response([
                    'status' => FALSE,
                    'message' => 'No Polish Pasien Tidak Ditemukan'
                ], REST_Controller::HTTP_NOT_FOUND);
                return;
            } else {
                $pendaftaran->no_polish = $penjamin_pasien->no_polish;
            }
        }

        $data = [
            'id_pendaftaran'         => $id_pendaftaran,
            'id_layanan_pendaftaran' => $id_layanan_pendaftaran,
            'id_jadwal_dokter'       => $id_jadwal_dokter,
            'tanggal'                => $tanggal_kontrol,
            'id_spesialisasi'        => $id_poli,
            'id_user'                => $this->session->userdata('id_translucent'),
            'jenis'                  => 'Surat Kontrol',
            'id_spesialisasi_asal'   => NULL,
            'id_pasien'              => $pendaftaran->id_pasien,
            'id_penjamin'            => $pendaftaran->id_penjamin,
            'alasan_kontrol'         => NULL,
            'rencana_tindak_lanjut'  => NULL,
            'jenis_bantuan'          => json_encode(array(
                'konsul' => NULL,
                'raber'  => NULL,
                'alih'   => NULL,
            )),
            'dirawat_dengan'         => NULL,
            'keterangan'             => NULL,
            'prb'                    => NULL,
            'created_date'           => $this->datetime,
            'updated_date'           => $this->datetime,
            'id_dokter_asal'         => $id_dokter,
            'id_dokter_tujuan'       => $id_dokter,
        ];

        $this->simpan_surat_kontrol_bpjs(
            $pendaftaran,
            $kode_bpjs_dokter,
            $kode_bpjs_poli,
            $tanggal_kontrol,
            $pendaftaran->id_pasien,
            $id_pendaftaran,
            $id_layanan_pendaftaran,
            $data
        );
    }

    public function update_surat_keterangan_kontrol_post()
    {
        $id_pendaftaran         = safe_post('id_pendaftaran');
        $id_surat_kontrol       = safe_post('id_surat_kontrol');
        $id_jadwal_dokter              = safe_post('dokter_tujuan');
        $id_poli                = safe_post('poli_tujuan');
        $tanggal_kontrol        = date2mysql(safe_post('tanggal_kontrol'));

        $jadwal_dokter = $this->db->get_where('sm_jadwal_dokter', array('id' => $id_jadwal_dokter))->row();
        $id_dokter      = $jadwal_dokter->id_dokter;

        $kode_bpjs_dokter       = $this->db->select('kode_bpjs')->from('sm_tenaga_medis')->where('id', $id_dokter)->get()->row()->kode_bpjs;
        $kode_bpjs_poli         = $this->db->select('kode')->from('sm_spesialisasi')->where('id', $id_poli)->get()->row()->kode;
        $pendaftaran            = $this->db->select('id_pasien, id_penjamin, no_polish')->from('sm_pendaftaran')->where('id', $id_pendaftaran)->get()->row();

        if (!$pendaftaran->no_polish) {
            $penjamin_pasien = $this->db->select('no_polish')->from('sm_penjamin_pasien')->where('id_pasien', $pendaftaran->id_pasien)->where('id_penjamin', $pendaftaran->id_penjamin)->get()->row();
            $pendaftaran->no_polish = $penjamin_pasien->no_polish;
        }

        $surat_kontrol = $this->db->select('skb.no_surat, sk.*')->from('sm_surat_kontrol sk')
            ->join('sm_surat_kontrol_bpjs skb', 'skb.id = sk.id_skb', 'left')
            ->where('sk.id', $id_surat_kontrol)
            ->get()->row();

        $dataUpdate = [
            'tanggal'                => $tanggal_kontrol,
            'id_spesialisasi'        => $id_poli,
            'updated_date'           => $this->datetime,
            'id_dokter_asal'         => $id_dokter,
            'id_dokter_tujuan'       => $id_dokter,
            'id_jadwal_dokter'       => $id_jadwal_dokter,
        ];

        $this->update_surat_kontrol_bpjs(
            $pendaftaran,
            $surat_kontrol,
            $kode_bpjs_dokter,
            $kode_bpjs_poli,
            $tanggal_kontrol,
            $dataUpdate
        );
    }

    private function history_sep($no_bpjs)
    {
        $tglAwal  = date('Y-m-d', strtotime(date('Y-m-d') . "-89 days"));
        $tglAkhir = date('Y-m-d');
        $url      = $this->bpjs_config->server . "/monitoring/HistoriPelayanan/NoKartu/" . $no_bpjs . "/tglAwal/" . $tglAwal . "/tglAkhir/" . $tglAkhir;
        $header   = $this->m_booking->createHeader($this->bpjs_config);
        $output   = getCurl($url, $header);
        $decode   = json_decode($output);
        if ($decode == NULL) :
            $decode = ["metaData" => ["code" => $this->code, "message" => $this->message]];
            die(json_encode($decode));
        endif;
        $decode->response = $this->m_booking->decryptResponse($decode->response, $this->bpjs_config);

        return $decode;
    }

    private function simpan_surat_kontrol_bpjs(
        $pendaftaran,
        $kode_dokter,
        $kode_poli,
        $tanggal_kontrol,
        $id_pasien,
        $id_pendaftaran,
        $id_layanan_pendaftaran,
        $data
    ) {
        if ($pendaftaran->id_penjamin == 1) {
            $list_sep = $this->history_sep($pendaftaran->no_polish);

            if ($list_sep->metaData->code != 200) {
                $this->response(['status' => FALSE, 'message' => 'Gagal mengambil data SEP'], REST_Controller::HTTP_BAD_REQUEST);

                return;
            }

            $sep = array_values(array_filter((array) $list_sep->response->histori, function ($v) {
                return empty($v->poliTujSep) && $v->ppkPelayanan === 'RSUD KOTA TANGERANG';
            }));


            if (count($sep) <= 0) {
                $this->response(['status' => FALSE, 'message' => 'Tidak ada SEP yang dapat digunakan'], REST_Controller::HTTP_BAD_REQUEST);

                return;
            }

            $no_sep = $sep[0]->noSep;

            $url  = $this->bpjs_configv2->server . "/RencanaKontrol/insert";
            $spri = [
                "request" => array(
                    "noSEP"             => $no_sep,
                    "kodeDokter"        => $kode_dokter,
                    "poliKontrol"       => $kode_poli,
                    "tglRencanaKontrol" => $tanggal_kontrol,
                    "user"              => $this->session->userdata("account")
                )
            ];

            $header    = $this->m_sep_v2->createHeader($this->bpjs_configv2);
            $header[4] = "Content-type: Application/x-www-form-urlencoded";
            $output    = postCurl($url, json_encode($spri), $header);
            $decode    = json_decode($output);

            if ($decode == NULL) {
                $decode = ["metaData" => ["code" => $this->code, "message" => $this->message]];
                die(json_encode($decode));
            }


            if ($decode->metaData->code === '203') {
                $this->response(['status' => FALSE, 'message' => $decode->metaData->message], self::HTTP_BAD_REQUEST);

                return;
            }

            if ($decode->metaData->code === '201') {
                $this->response(['status' => FALSE, 'message' => $decode->metaData->message], self::HTTP_BAD_REQUEST);

                return;
            }

            $this->db->trans_begin();

            if (
                !empty($decode)
            ) {
                $decode->response = $this->m_booking->decryptResponse($decode->response, $this->bpjs_config);

                $skb = array(
                    'id_pasien'                   => $id_pasien,
                    'jenis'                       => 1,
                    'tgl_rencana_kontrol'         => $decode->response->tglRencanaKontrol,
                    'dokter'                      => $decode->response->namaDokter,
                    'id_user'                     => $this->session->userdata("id_translucent"),
                    'no_kartu'                    => $decode->response->noKartu,
                    'no_surat'                    => $decode->response->noSuratKontrol,
                    'created_date'                => $this->datetime,
                    'id_pendaftaran_asal'         => $id_pendaftaran,
                    'id_layanan_pendaftaran_asal' => $id_layanan_pendaftaran,
                );

                $this->db->insert('sm_surat_kontrol_bpjs', $skb);
                $id_skb         = $this->db->insert_id();
                $data['id_skb'] = $id_skb;
            }
        }

        $this->db->insert('sm_surat_kontrol', $data);

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            $status  = false;
            $kode = self::HTTP_BAD_REQUEST;
            $message = "Gagal menyimpam Surat Kontrol Dokter. Hubungi IT";
        } else {
            $this->db->trans_commit();
            $status = true;
            $kode = self::HTTP_OK;
            $message = "Berhasil menyimpam Surat Kontrol Dokter";
        }

        $this->response([
            'status' => $status,
            'message' => $message,
        ], $kode);
    }

    private function update_surat_kontrol_bpjs(
        $pendaftaran,
        $surat_kontrol,
        $kode_dokter,
        $kode_poli,
        $tanggal_kontrol,
        $dataUpdate
    ) {
        if ($surat_kontrol && $pendaftaran->id_penjamin == 1) {
            $list_sep = $this->history_sep($pendaftaran->no_polish);

            if ($list_sep->metaData->code != 200) {
                $this->response(['status' => FALSE, 'message' => 'Gagal mengambil data SEP'], REST_Controller::HTTP_BAD_REQUEST);

                return;
            }

            $sep = array_values(array_filter((array) $list_sep->response->histori, function ($v) {
                return empty($v->poliTujSep) && $v->ppkPelayanan === 'RSUD KOTA TANGERANG';
            }));

            if (count($sep) <= 0) {
                $this->response(['status' => FALSE, 'message' => 'Tidak ada SEP yang dapat digunakan'], REST_Controller::HTTP_BAD_REQUEST);

                return;
            }

            $no_sep = $sep[0]->noSep;

            $url  = $this->bpjs_configv2->server . "/RencanaKontrol/Update";
            $spri = [
                "request" => array(
                    "noSuratKontrol"    => $surat_kontrol->no_surat,
                    "noSEP"             => $no_sep,
                    "kodeDokter"        => $kode_dokter,
                    "poliKontrol"       => $kode_poli,
                    "tglRencanaKontrol" => $tanggal_kontrol,
                    "user"              => $this->session->userdata("account"),
                )
            ];

            $header    = $this->m_sep_v2->createHeader($this->bpjs_configv2);
            $header[4] = "Content-type: Application/x-www-form-urlencoded";
            $output    = customCurl('PUT', $url, json_encode($spri), $header);
            $decode    = json_decode($output);

            if ($decode == NULL) {
                $decode = ["metaData" => ["code" => $this->code, "message" => $this->message]];
                die(json_encode($decode));
            }


            if ($decode->metaData->code === '203') {
                $this->response(['status' => FALSE, 'message' => $decode->metaData->message], self::HTTP_BAD_REQUEST);

                return;
            }

            if ($decode->metaData->code === '201') {
                $this->response(['status' => FALSE, 'message' => $decode->metaData->message], self::HTTP_BAD_REQUEST);

                return;
            }

            $this->db->trans_begin();

            if (!empty($decode)) {
                $decode->response = $this->m_booking->decryptResponse($decode->response, $this->bpjs_config);

                $skb = array(
                    'tgl_rencana_kontrol'         => $decode->response->tglRencanaKontrol,
                    'dokter'                      => $decode->response->namaDokter,
                    'id_user'                     => $this->session->userdata("id_translucent"),
                    'updated_date'                => $this->datetime,
                );

                $this->db->update('sm_surat_kontrol_bpjs', $skb, ['id' => $surat_kontrol->id_skb]);
            }
        }
        $this->db->update('sm_surat_kontrol', $dataUpdate, ['id' => $surat_kontrol->id]);

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            $status  = false;
            $kode = self::HTTP_BAD_REQUEST;
            $message = "Gagal menyimpam Surat Kontrol Dokter. Hubungi IT";
        } else {
            $this->db->trans_commit();
            $status = true;
            $kode = self::HTTP_OK;
            $message = "Berhasil menyimpam Surat Kontrol Dokter";
        }

        $this->response([
            'status' => $status,
            'message' => $message,
        ], $kode);
    }

    function get_surat_kontrol_get()
    {
        if (!$this->get('id_pendaftaran') || !$this->get('id_layanan_pendaftaran')) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
        endif;

        $data = $this->m_rawat_inap->getDataSuratKontrol($this->get('id_pendaftaran'), $this->get('id_layanan_pendaftaran'));
        $this->response($data, REST_Controller::HTTP_OK);
    }
    // end surat kontrol


    // PSPMP
    function simpan_pengkajian_spiritual_pasien_post()
    {
        $checkDataPengkajianSpiritualPasien = '';
        $checkDataPengkajianSpiritualPasien =  $this->m_rawat_inap->getPengkajianSpiritualPasienPulang(safe_post('id_pendaftaran'));

        $this->db->trans_begin();
        if ($checkDataPengkajianSpiritualPasien == NULL) {

            $data = array(
                'id_pendaftaran'                    => safe_post('id_pendaftaran'),
                'pasien_keluarga'                   => safe_post('nama_keluarga') == '' ? null : safe_post('nama_keluarga'),
                // 'hubungan_keluarga'                 => safe_post('hubungan_keluarga') == '' ? null : safe_post('hubungan_keluarga'),
                'kondisi_ibadah'                    => safe_post('kondisi_ibadah_pasien') == '' ? null : safe_post('kondisi_ibadah_pasien'),
                'kondisi_psiko_spiritual'           => safe_post('kondisi_psiko_spiritual') == '' ? null : safe_post('kondisi_psiko_spiritual'),
                'saran_rencana_tindak_selanjutnya'  => safe_post('saran_rencana_tindak_selanjutnya') == '' ? null : safe_post('saran_rencana_tindak_selanjutnya'),
                'is_pasien'                         => safe_post('is_pasien') == 'ya' ? 1 : 0,
                'edukasi_islam'                     => safe_post('edukasi_islam') == '' ? null : safe_post('edukasi_islam'),
                'created_date'                 => $this->datetime,

            );

            $this->db->insert('sm_pengkajian_spiritual_pasien_pulang', $data);
        } else {
            $data = array(
                'pasien_keluarga'                   => safe_post('nama_keluarga') == '' ? null : safe_post('nama_keluarga'),
                // 'hubungan_keluarga'                 => safe_post('hubungan_keluarga') == '' ? null : safe_post('hubungan_keluarga'),
                'kondisi_ibadah'                    => safe_post('kondisi_ibadah_pasien') == '' ? null : safe_post('kondisi_ibadah_pasien'),
                'kondisi_psiko_spiritual'           => safe_post('kondisi_psiko_spiritual') == '' ? null : safe_post('kondisi_psiko_spiritual'),
                'saran_rencana_tindak_selanjutnya'  => safe_post('saran_rencana_tindak_selanjutnya') == '' ? null : safe_post('saran_rencana_tindak_selanjutnya'),
                'is_pasien'                         => safe_post('is_pasien') == 'ya' ? 1 : 0,
                'edukasi_islam'                     => safe_post('edukasi_islam') == '' ? null : safe_post('edukasi_islam'),
                'updated_on'                   => $this->datetime,

            );

            $this->db->where('id_pendaftaran', safe_post('id_pendaftaran'));
            $this->db->update('sm_pengkajian_spiritual_pasien_pulang', $data);
        }

        if ($this->db->trans_status() === false) :
            $this->db->trans_rollback();
            $status = false;
            $message = 'Gagal simpan form pengkajian spiritual pasien pulang (muslim)';
        else :
            $this->db->trans_commit();
            $status = true;
            $message = 'Berhasil form pengkajian spiritual pasien pulang (muslim)';
        endif;

        $this->response(array('status' => $status, 'message' => $message), REST_Controller::HTTP_OK);
    }

    // Get datas from Pasien Masuk ICU 
    // function indikasi_pasien_masuk_icu_get()
    // {
    //     $this->load->model('pendaftaran/Pendaftaran_model', 'm_pendaftaran');

    //     $data['pendaftaran_detail'] = [];
    //     $data['indikasi_pasien_masuk_icu'] = [];
    //     $data['diagnosa'] = [];

    //     $data['pendaftaran_detail'] = $this->m_pendaftaran->getPendaftaranDetail($this->get('id', true));
    //     $data['indikasi_pasien_masuk_icu'] = $this->m_rawat_inap->getIndikasiPasienMasukICU($this->get('id', true), $this->get('id_layanan_pendaftaran', true));

    //     $data['diagnosa']     = $this->m_pelayanan->getDiagnosaPemeriksaan($this->get('id_layanan_pendaftaran', true));

    //     if ($data != null) {
    //         $this->response($data, REST_Controller::HTTP_OK);
    //     } else {
    //         $this->response($data, REST_Controller::HTTP_OK);
    //     }
    // }

    // function simpan_indikasi_pasien_masuk_icu_post()
    // {

    //     $checkDataIndikasiPasienMasukICU = '';

    //     $checkDataIndikasiPasienMasukICU = $this->m_rawat_inap->getIndikasiPasienMasukICU(safe_post('id_pendaftaran_pasien_masuk_icu'), safe_post('id_layanan_pendaftaran_pasien_masuk_icu'));

    //     $this->db->trans_begin();
    //     if ($checkDataIndikasiPasienMasukICU == NULL) {
    //         $data = array(
    //             'id_pendaftaran'        => safe_post('id_pendaftaran_pasien_masuk_icu'),
    //             'diagnosa_pasien'       => safe_post('diagnosa_pasien_icu'),
    //         );

    //         $this->db->insert('sm_indikasi_pasien_icu', $data);
    //     } else {
    //         $data = array(
    //             'diagnosa_pasien'       => safe_post('diagnosa_pasien_icu'),
    //         );

    //         $this->db->where('id_pendaftaran', safe_post('id_pendaftaran_pasien_masuk_icu'));
    //         $this->db->update('sm_indikasi_pasien_icu', $data);
    //     }

    //     if ($this->db->trans_status() === false) :
    //         $this->db->trans_rollback();
    //         $status = false;
    //         $message = 'Gagal simpan form indikasi pasien masuk ICU';
    //     else :
    //         $this->db->trans_commit();
    //         $status = true;
    //         $message = 'Berhasil simpan form indikasi pasien masuk ICU';
    //     endif;

    //     $this->response(array('status' => $status, 'message' => $message), REST_Controller::HTTP_OK);
    // }

    // IPI 
    function get_indikasi_pasien_masuk_icu_get()
    {
        $this->load->model('pendaftaran/Pendaftaran_model', 'm_pendaftaran');
        $data['pendaftaran_detail'] = [];
        $data['indikasi_pasien_masuk_icu'] = [];
        $data['diagnosa'] = [];
        $data['pendaftaran_detail'] = $this->m_pendaftaran->getPendaftaranDetail($this->get('id', true), $this->get('id_layanan_pendaftaran', true));
        $data['indikasi_pasien_masuk_icu'] = $this->m_rawat_inap->getIndikasiPasienMasukICU($this->get('id', true), $this->get('id_layanan_pendaftaran', true));
        $data['tabel_indikasi_tambahan'] = $this->m_rawat_inap->getIndikasiPasienMasukICUTambahan($this->get('id', true), $this->get('id_layanan_pendaftaran', true));
        $data['diagnosa']     = $this->m_pelayanan->getDiagnosaPemeriksaan($this->get('id_layanan_pendaftaran', true));
        // var_dump($data['diagnosa'] );die;
        if ($data != null) {
            $this->response($data, REST_Controller::HTTP_OK);
        } else {
            $this->response($data, REST_Controller::HTTP_OK);
        }
    }

    // IPI  
    function simpan_indikasi_pasien_masuk_icu_post()
    {
        $data = '';
        $data = $this->m_rawat_inap->getPrintIcu($this->get('id', true), $this->get('id_pendaftaran', true), $this->get('id_layanan_pendaftaran', true));
        if ($data != null) {
            $this->response($data, REST_Controller::HTTP_OK);
        } else {
            $this->response($data, REST_Controller::HTTP_OK);
        }
    }

    // IPI 
    function hapus_indikasi_pasien_icu_delete($id)
    {
        $status = $this->m_rawat_inap->deleteIndikasiPasienIcu($id);
        if ($status) :
            $response = array('status' => $status, 'message' => 'Berhasil menghapus Data!');
        else :
            $response = array('status' => $status, 'message' => 'Gagal menghapus Data!');
        endif;
        $this->response($response, REST_Controller::HTTP_OK);
    }

    // IPI 
    function simpan_ipi_post()
    {
        $data = array(
            'id_layanan_pendaftaran'    => safe_post('id_layanan_pendaftaran'),
            'id_pendaftaran'            => safe_post('id_pendaftaran'),
            'id_user'                   => safe_post('id_user'),
            'tanggal_ipi'               => safe_post('tgl'),
            'nama_pasien'               => safe_post('nama_pasien'),
            'diagnosa'                  => safe_post('diagnosa'),
            'ruang'                     => safe_post('ruang')
        );

        // Simpan data ke database
        $this->m_rawat_inap->insertIndikasiPasienMasukICUTambahan($data);

        // Ambil data yang baru saja disimpan untuk dikembalikan dalam respons
        $data = $this->m_rawat_inap->getIndikasiPasienMasukICUTambahan($data['id_pendaftaran'], $data['id_layanan_pendaftaran']);
        // var_dump($data);die;

        // Kembalikan data dalam respons
        $this->response($data, REST_Controller::HTTP_OK);
    }




    function filterForm($text)
    {

        $filter = preg_replace('/[^a-z0-9A-Z\%\/\:\-\+\(\)\.\"\\<\>\', ]+/', '', $text);

        return $filter;
    }

    // function simpan_resume_medis_ranap_post()
    // {

    //     $this->db->trans_begin();
    //     $layanan = array('id' => safe_post('id_layanan_pendaftaran'));
    //     $id = $layanan['id'];
    //     $id_daftar = safe_post('id_pendaftaran');

    //     $ringkasanRiwayat = safe_post('ringkasan_riwayat');
    //     $pemeriksaanFisik = safe_post('pemeriksaan_fisik');

    //     if ($ringkasanRiwayat !== '' || $ringkasanRiwayat !== null) {

    //         $filterRingkasan = $this->filterForm($ringkasanRiwayat);
    //     }

    //     if ($pemeriksaanFisik !== '' || $pemeriksaanFisik !== null) {

    //         $filterPemeriksaan = $this->filterForm($pemeriksaanFisik);
    //     }


    //     $checkDataResumeMedisRanap =  $this->db->select("*")
    //         ->from('sm_resume_medis_ranap')
    //         ->where('id_pendaftaran', $id_daftar, true)
    //         ->get()->row();

    //     if ($checkDataResumeMedisRanap == NULL) {

    //         $data = array( //3355 3610
    //             'id_pendaftaran'                    => safe_post('id_pendaftaran'),
    //             'id_layanan_pendaftaran'            => safe_post('id_layanan_pendaftaran'),
    //             'diagnosa_awal_masuk'               => safe_post('diagnosis_waktu_masuk_rs') == '' ? null : safe_post('diagnosis_waktu_masuk_rs'),
    //             'hasil_konsultasi'                  => safe_post('hasil_konsultasi_rm') == '' ? null : safe_post('hasil_konsultasi_rm'),
    //             'alergi_obat'                       => safe_post('alergi_obat_rm') == '' ? null : safe_post('alergi_obat_rm'),
    //             'diet'                              => safe_post('diet_rm') == '' ? null : safe_post('diet_rm'),
    //             'ringkasan_riwayat'                 => (safe_post('ringkasan_riwayat') !== '' ? $filterRingkasan : NULL),
    //             'pemeriksaan_fisik'                 => (safe_post('pemeriksaan_fisik') !== '' ? $filterPemeriksaan : NULL),
    //             'penunjang_diagnostik'              => safe_post('penunjang_diagnostik') == '' ? null : safe_post('penunjang_diagnostik'),
    //             'pending_lab'                       => safe_post('pending_lab') == '' ? null : safe_post('pending_lab'),
    //             'anjuran_edukasi'                   => safe_post('anjuran_edukasi_rm') == '' ? null : safe_post('anjuran_edukasi_rm'),
    //             'kondisi_waktu_keluar'              => safe_post('kondisi_waktu_keluar') == '' ? null : safe_post('kondisi_waktu_keluar'),
    //             'pengobatan_dilanjutkan'            => safe_post('pengobatan_dilanjutkan') == '' ? null : safe_post('pengobatan_dilanjutkan'),
    //             'cara_terapi_pengobatan'            => safe_post('cara_terapi_pengobatan_rm') !== '' ? safe_post('cara_terapi_pengobatan_rm') : NULL,
    //             'id_users'                          => safe_post('user_account') !== '' ? safe_post('user_account') : NULL,
    //             'created_date'                      => $this->datetime,

    //         );

    //         $this->db->insert('sm_resume_medis_ranap', $data);
    //     } else {
    //         $data = array(
    //             'id_pendaftaran'                    => safe_post('id_pendaftaran'),
    //             'diagnosa_awal_masuk'               => safe_post('diagnosis_waktu_masuk_rs') == '' ? null : safe_post('diagnosis_waktu_masuk_rs'),
    //             'hasil_konsultasi'                  => safe_post('hasil_konsultasi_rm') == '' ? null : safe_post('hasil_konsultasi_rm'),
    //             'alergi_obat'                       => safe_post('alergi_obat_rm') == '' ? null : safe_post('alergi_obat_rm'),
    //             'diet'                              => safe_post('diet_rm') == '' ? null : safe_post('diet_rm'),
    //             'ringkasan_riwayat'                 => (safe_post('ringkasan_riwayat') !== '' ? $filterRingkasan : NULL),
    //             'pemeriksaan_fisik'                 => (safe_post('pemeriksaan_fisik') !== '' ? $filterPemeriksaan : NULL),
    //             'penunjang_diagnostik'              => safe_post('penunjang_diagnostik') == '' ? null : safe_post('penunjang_diagnostik'),
    //             'pending_lab'                       => safe_post('pending_lab') == '' ? null : safe_post('pending_lab'),
    //             'anjuran_edukasi'                   => safe_post('anjuran_edukasi_rm') == '' ? null : safe_post('anjuran_edukasi_rm'),
    //             'kondisi_waktu_keluar'              => safe_post('kondisi_waktu_keluar') == '' ? null : safe_post('kondisi_waktu_keluar'),
    //             'pengobatan_dilanjutkan'            => safe_post('pengobatan_dilanjutkan') == '' ? null : safe_post('pengobatan_dilanjutkan'),
    //             'cara_terapi_pengobatan'            => safe_post('cara_terapi_pengobatan_rm') !== '' ? safe_post('cara_terapi_pengobatan_rm') : NULL,
    //             'id_users'                          => safe_post('user_account') !== '' ? safe_post('user_account') : NULL,
    //             'created_date'                      => $this->datetime,
    //         );

    //         $this->db->where('id_pendaftaran', safe_post('id_pendaftaran'));
    //         $this->db->update('sm_resume_medis_ranap', $data);
    //     }

    //     $ek_kontrol_dokter_resume = safe_post('ambil_tanggal_kontrol');

    //     if ($ek_kontrol_dokter_resume) {

    //         $ek_kontrol = array_filter($ek_kontrol_dokter_resume);

    //         if ($ek_kontrol_dokter_resume === "" || $ek_kontrol_dokter_resume === null) {

    //             $ek_dokter = null;
    //         } else if (!is_array($ek_kontrol_dokter_resume)) {


    //             $ek_dokter = null;
    //         } else if (empty($ek_kontrol_dokter_resume)) {


    //             $ek_dokter = null;
    //         } else if (empty($ek_kontrol)) {


    //             $ek_dokter = null;
    //         } else {

    //             foreach ($ek_kontrol_dokter_resume as $key => $value) {

    //                 $date = new DateTime($value);
    //                 $new = $date->format('Y-m-d H:i:s');


    //                 $ek_dokter[$key] = $new;
    //             }
    //         }

    //         $tanggal_dibuat = safe_post('tanggal_dibuat');

    //         $ek_tanggal_dibuat = array_filter($tanggal_dibuat);

    //         if ($tanggal_dibuat === "" || $tanggal_dibuat === null) {

    //             $dibuat_tanggal = null;
    //         } else if (!is_array($tanggal_dibuat)) {


    //             $dibuat_tanggal = null;
    //         } else if (empty($tanggal_dibuat)) {


    //             $dibuat_tanggal = null;
    //         } else if (empty($ek_tanggal_dibuat)) {


    //             $dibuat_tanggal = null;
    //         } else {

    //             foreach ($tanggal_dibuat as $key => $value) {

    //                 $date = new DateTime($value);
    //                 $new = $date->format('Y-m-d H:i:s');


    //                 $dibuat_tanggal[$key] = $new;
    //             }
    //         }
    //         $jadwal_kontrol_resume = array(
    //             'id_layanan_pendaftaran' => safe_post('id_layanan_pendaftaran'),
    //             'id_pendaftaran'         => safe_post('id_pendaftaran'),
    //             'tanggal_kontrol'        => $ek_dokter,
    //             'id_ek_nama_dokter'      => safe_post('ek_nama_dokter_resume') !== '' ? safe_post('ek_nama_dokter_resume') : null,
    //             'id_users'               => safe_post('ek_operator') !== '' ? safe_post('ek_operator') : null,
    //             'tempat_kontrol'         => safe_post('ek_tempat_kontrol') !== '' ? safe_post('ek_tempat_kontrol') : null,
    //             'created_date'           => $dibuat_tanggal,
    //         );

    //         $this->m_rawat_inap->updateJadwalKontrolResumeMedis($jadwal_kontrol_resume);
    //         $this->m_rawat_inap->insertJadwalKontrolKeperawatan($jadwal_kontrol_resume);
    //     }

    //     // if ($this->db->trans_status() === false) :
    //     //     $this->db->trans_rollback();
    //     //     $this->load->model('logs/Logs_model', 'm_logs');
    //     //     $status = false;
    //     //     $message = 'Gagal Simpan Form Resume Medis';
    //     // else :
    //     //     $this->db->trans_commit();
    //     //     $status = true;
    //     //     $message = 'Berhasil Form Resume Medis';
    //     // endif;

    //     // $this->response(array('status' => $status, 'message' => $message), REST_Controller::HTTP_OK);

    //     $obat_rm = safe_post('id_obat_rm');
    //     if ($obat_rm) {
    //         $ek_nol_rm = safe_post('ek_jam_pemberian_rm');

    //         $ek_nol_rm_filter = array_filter($ek_nol_rm);

    //         if ($ek_nol_rm === "" || $ek_nol_rm === null) {

    //             $terapi_nol_rm = null;
    //         } else if (!is_array($ek_nol_rm)) {

    //             $terapi_nol_rm = null;
    //         } else if (empty($ek_nol_rm)) {


    //             $terapi_nol_rm = null;
    //         } else if (empty($ek_nol_rm_filter)) {


    //             $terapi_nol_rm = null;
    //         } else {

    //             foreach ($ek_nol_rm as $key => $value) {

    //                 $date = new DateTime($value);
    //                 $new = $date->format('H:i:s');

    //                 $terapi_nol_rm[$key] = $new;
    //             }
    //         }

    //         //            $ek_satu_rm = safe_post('ek_jam_pemberian_satu_rm');
    //         //
    //         //            $ek_satu_rm_filter = array_filter($ek_satu_rm);
    //         //
    //         //
    //         //            if ($ek_satu_rm === "" || $ek_satu_rm === null) {
    //         //
    //         //                $terapi_satu_rm = null;
    //         //            } else if (!is_array($ek_satu_rm)) {
    //         //
    //         //
    //         //                $terapi_satu_rm = null;
    //         //            } else if (empty($ek_satu_rm)) {
    //         //
    //         //
    //         //                $terapi_satu_rm = null;
    //         //            } else if (empty($ek_satu_rm_filter)) {
    //         //
    //         //
    //         //                $terapi_satu_rm = null;
    //         //            } else {
    //         //
    //         //                foreach ($ek_satu_rm as $key => $value) {
    //         //
    //         //                    $date = new DateTime($value);
    //         //                    $new = $date->format('H:i:s');
    //         //
    //         //
    //         //                    $terapi_satu_rm[$key] = $new;
    //         //                }
    //         //            }
    //         //
    //         //            $ek_dua_rm = safe_post('ek_jam_pemberian_dua_rm');
    //         //
    //         //            $ek_dua_rm_filter = array_filter($ek_dua_rm);
    //         //
    //         //
    //         //            if ($ek_dua_rm === "" || $ek_dua_rm === null) {
    //         //
    //         //                $terapi_dua_rm = null;
    //         //            } else if (!is_array($ek_dua_rm)) {
    //         //
    //         //
    //         //                $terapi_dua_rm = null;
    //         //            } else if (empty($ek_dua_rm)) {
    //         //
    //         //
    //         //                $terapi_dua_rm = null;
    //         //            } else if (empty($ek_dua_rm_filter)) {
    //         //
    //         //
    //         //                $terapi_dua_rm = null;
    //         //            } else {
    //         //
    //         //                foreach ($ek_dua_rm as $key => $value) {
    //         //
    //         //                    $date = new DateTime($value);
    //         //                    $new = $date->format('H:i:s');
    //         //
    //         //
    //         //                    $terapi_dua_rm[$key] = $new;
    //         //                }
    //         //            }
    //         //
    //         //            $ek_tiga_rm = safe_post('ek_jam_pemberian_tiga_rm');
    //         //
    //         //            $ek_tiga_rm_filter = array_filter($ek_tiga_rm);
    //         //
    //         //
    //         //            if ($ek_tiga_rm === "" || $ek_tiga_rm === null) {
    //         //
    //         //                $terapi_tiga_rm = null;
    //         //            } else if (!is_array($ek_tiga_rm)) {
    //         //
    //         //
    //         //                $terapi_tiga_rm = null;
    //         //            } else if (empty($ek_tiga_rm)) {
    //         //
    //         //
    //         //                $terapi_tiga_rm = null;
    //         //            } else if (empty($ek_tiga_rm_filter)) {
    //         //
    //         //
    //         //                $terapi_tiga_rm = null;
    //         //            } else {
    //         //
    //         //                foreach ($ek_tiga_rm as $key => $value) {
    //         //
    //         //                    $date = new DateTime($value);
    //         //                    $new = $date->format('H:i:s');
    //         //
    //         //
    //         //                    $terapi_tiga_rm[$key] = $new;
    //         //                }
    //         //            }
    //         //
    //         //
    //         //            $ek_empat_rm = safe_post('ek_jam_pemberian_empat_rm');
    //         //
    //         //            $ek_empat_rm_filter = array_filter($ek_empat_rm);
    //         //
    //         //            if ($ek_empat_rm === "" || $ek_empat_rm === null) {
    //         //
    //         //                $terapi_empat_rm = null;
    //         //            } else if (!is_array($ek_empat_rm)) {
    //         //
    //         //
    //         //                $terapi_empat_rm = null;
    //         //            } else if (empty($ek_empat_rm)) {
    //         //
    //         //
    //         //                $terapi_empat_rm = null;
    //         //            } else if (empty($ek_empat_rm_filter)) {
    //         //
    //         //
    //         //                $terapi_empat_rm = null;
    //         //            } else {
    //         //
    //         //                foreach ($ek_empat_rm as $key => $value) {
    //         //
    //         //                    $date = new DateTime($value);
    //         //                    $new = $date->format('H:i:s');
    //         //
    //         //                    $terapi_empat_rm[$key] = $new;
    //         //                }
    //         //            }
    //         //
    //         //            $ek_lima_rm = safe_post('ek_jam_pemberian_lima_rm');
    //         //
    //         //            $ek_lima_rm_filter = array_filter($ek_lima_rm);
    //         //
    //         //            if ($ek_lima_rm === "" || $ek_lima_rm === null) {
    //         //
    //         //                $terapi_lima_rm = null;
    //         //            } else if (!is_array($ek_lima_rm)) {
    //         //
    //         //
    //         //                $terapi_lima_rm = null;
    //         //            } else if (empty($ek_lima_rm)) {
    //         //
    //         //                $terapi_lima_rm = null;
    //         //            } else if (empty($ek_lima_rm_filter)) {
    //         //
    //         //                $terapi_lima_rm = null;
    //         //            } else {
    //         //
    //         //                foreach ($ek_lima_rm as $key => $value) {
    //         //
    //         //                    $date = new DateTime($value);
    //         //                    $new = $date->format('H:i:s');
    //         //
    //         //                    $terapi_lima_rm[$key] = $new;
    //         //                }
    //         //            }

    //         $created_date = safe_post('created_date');

    //         $ek_created_date = array_filter($created_date);

    //         if ($created_date === "" || $created_date === null) {

    //             $date_created = null;
    //         } else if (!is_array($created_date)) {


    //             $date_created = null;
    //         } else if (empty($created_date)) {


    //             $date_created = null;
    //         } else if (empty($ek_created_date)) {


    //             $date_created = null;
    //         } else {

    //             foreach ($created_date as $key => $value) {

    //                 $date = new DateTime($value);
    //                 $new = $date->format('Y-m-d H:i:s');

    //                 $date_created[$key] = $new;
    //             }
    //         }

    //         $terapi_pulang_rm = array(
    //             'id_layanan_pendaftaran'   =>  safe_post('id_layanan_pendaftaran'),
    //             'obat'                     => safe_post('id_obat_rm') !== '' ? safe_post('id_obat_rm') : NULL,
    //             'jumlah_obat'              => safe_post('jumlah_obat_rm') !== '' ? safe_post('jumlah_obat_rm') : NULL,
    //             'dosis'                    => safe_post('dosis_rm') !== '' ? safe_post('dosis_rm') : NULL,
    //             'frekuensi'                => safe_post('frekuensi_rm') !== '' ? safe_post('frekuensi_rm') : NULL,
    //             'cara_pemberian'           => safe_post('cara_pemberian_rm') !== '' ? safe_post('cara_pemberian_rm') : NULL,
    //             'ek_jam_pemberian'         => safe_post('ek_jam_pemberian_rm'),
    //             'ek_jam_pemberian_satu'    => safe_post('ek_jam_pemberian_satu_rm'),
    //             'ek_jam_pemberian_dua'     => safe_post('ek_jam_pemberian_dua_rm'),
    //             'ek_jam_pemberian_tiga'    => safe_post('ek_jam_pemberian_tiga_rm'),
    //             'ek_jam_pemberian_empat'   => safe_post('ek_jam_pemberian_empat_rm'),
    //             'ek_jam_pemberian_lima'    => safe_post('ek_jam_pemberian_lima_rm'),
    //             'petunjuk_khusus'          => safe_post('petunjuk_khusus_rm') !== '' ? safe_post('petunjuk_khusus_rm') : NULL,
    //             'id_users'                 => safe_post('trp_users') !== '' ? safe_post('trp_users') : NULL,
    //             'created_date'             => $date_created,
    //         );

    //         $this->m_rawat_inap->updateTerapiPulangRM($terapi_pulang_rm);
    //         $this->m_rawat_inap->insertTerapiPulangKeperawatan($terapi_pulang_rm);
    //     }

    //     if ($this->db->trans_status() === false) :
    //         $this->db->trans_rollback();
    //         $this->load->model('logs/Logs_model', 'm_logs');
    //         $status = false;
    //         $message = 'Gagal Simpan Form Resume Medis';
    //     else :
    //         $this->db->trans_commit();
    //         $status = true;
    //         $message = 'Berhasil Form Resume Medis';
    //     endif;

    //     $this->response(array('status' => $status, 'message' => $message), REST_Controller::HTTP_OK);
    // }

    // LOGS RESUMEDIS TERAPI
    function simpan_resume_medis_ranap_post(){
        $this->db->trans_begin();
        $this->load->model('Rawat_inap_model', 'm_rawat_inap');

        $id_daftar = safe_post('id_pendaftaran');
        $ringkasanRiwayat = safe_post('ringkasan_riwayat');
        $pemeriksaanFisik = safe_post('pemeriksaan_fisik');

        if ($ringkasanRiwayat !== '' && $ringkasanRiwayat !== null) { // Cek input tidak kosong/null
            $filterRingkasan = $this->filterForm($ringkasanRiwayat); // Filter input agar aman & bersih
        }

        if ($pemeriksaanFisik !== '' && $pemeriksaanFisik !== null) { // Cek input tidak kosong/null
            $filterPemeriksaan = $this->filterForm($pemeriksaanFisik); // Filter input agar aman & bersih
        }

        $checkData = $this->db->select("*")
            ->from('sm_resume_medis_ranap')
            ->where('id_pendaftaran', $id_daftar)
            ->get()->row();

        $data = array(
            'id_pendaftaran'         => $id_daftar,
            'id_layanan_pendaftaran' => safe_post('id_layanan_pendaftaran'),
            'diagnosa_awal_masuk'    => safe_post('diagnosis_waktu_masuk_rs') === '' ? null : safe_post('diagnosis_waktu_masuk_rs'),
            'hasil_konsultasi'       => safe_post('hasil_konsultasi_rm') === '' ? null : safe_post('hasil_konsultasi_rm'),
            'alergi_obat'            => safe_post('alergi_obat_rm') === '' ? null : safe_post('alergi_obat_rm'),
            'diet'                   => safe_post('diet_rm') === '' ? null : safe_post('diet_rm'),
            'ringkasan_riwayat'      => ($ringkasanRiwayat !== '' ? $filterRingkasan : null),
            'pemeriksaan_fisik'      => ($pemeriksaanFisik !== '' ? $filterPemeriksaan : null),
            'penunjang_diagnostik'   => safe_post('penunjang_diagnostik') === '' ? null : safe_post('penunjang_diagnostik'),
            'pending_lab'            => safe_post('pending_lab') === '' ? null : safe_post('pending_lab'),
            'anjuran_edukasi'        => safe_post('anjuran_edukasi_rm') === '' ? null : safe_post('anjuran_edukasi_rm'),
            'kondisi_waktu_keluar'   => safe_post('kondisi_waktu_keluar') === '' ? null : safe_post('kondisi_waktu_keluar'),
            'pengobatan_dilanjutkan' => safe_post('pengobatan_dilanjutkan') === '' ? null : safe_post('pengobatan_dilanjutkan'),
            'id_users'               => safe_post('user_account') !== '' ? safe_post('user_account') : null,
            'created_date'           => $this->datetime,
        );

        if (!$checkData) {
            // INSERT DATA BARU
            $data['id_users'] = safe_post('user_account');
            $data['created_date'] = $this->datetime;

            $this->db->insert('sm_resume_medis_ranap', $data);

            // insert pertama tidak perlu log
        } else {
            // AMBIL ID_USERS & CREATED_DATE LAMA BIAR TIDAK DIUBAH
            $data_lama = (array) $checkData;

            // Hitung edit ke-berapa
            $jumlah_edit = $this->db->where('id_pendaftaran', $id_daftar)
                                    ->where('log_action', 'update')
                                    ->count_all_results('sm_resume_medis_ranap_logs');

            $data_lama['edit_ke'] = $jumlah_edit + 1;

            // JANGAN UPDATE id_users & created_date
            unset($data['id_users']);
            unset($data['created_date']);

            $this->db->where('id_pendaftaran', $id_daftar);
            $this->db->update('sm_resume_medis_ranap', $data);

            $this->m_rawat_inap->logsResumeMedisRanap($data_lama, 'update', safe_post('user_account'));
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

            $this->m_rawat_inap->updateJadwalKontrolResumeMedis($jadwal_kontrol_resume);
            $this->m_rawat_inap->insertJadwalKontrolKeperawatan($jadwal_kontrol_resume);
        }

        $obat_rm = safe_post('id_obat_rm');
        if ($obat_rm) {
            $ek_nol_rm = safe_post('ek_jam_pemberian_rm');

            $ek_nol_rm_filter = array_filter($ek_nol_rm);

            if ($ek_nol_rm === "" || $ek_nol_rm === null) {

                $terapi_nol_rm = null;
            } else if (!is_array($ek_nol_rm)) {

                $terapi_nol_rm = null;
            } else if (empty($ek_nol_rm)) {


                $terapi_nol_rm = null;
            } else if (empty($ek_nol_rm_filter)) {


                $terapi_nol_rm = null;
            } else {

                foreach ($ek_nol_rm as $key => $value) {

                    $date = new DateTime($value);
                    $new = $date->format('H:i:s');

                    $terapi_nol_rm[$key] = $new;
                }
            }

            $created_date = safe_post('created_date');

            $ek_created_date = array_filter($created_date);

            if ($created_date === "" || $created_date === null) {

                $date_created = null;
            } else if (!is_array($created_date)) {


                $date_created = null;
            } else if (empty($created_date)) {


                $date_created = null;
            } else if (empty($ek_created_date)) {


                $date_created = null;
            } else {

                foreach ($created_date as $key => $value) {

                    $date = new DateTime($value);
                    $new = $date->format('Y-m-d H:i:s');

                    $date_created[$key] = $new;
                }
            }

            $terapi_pulang_rm = array(
                'id_layanan_pendaftaran'   =>  safe_post('id_layanan_pendaftaran'),
                'obat'                     => safe_post('id_obat_rm') !== '' ? safe_post('id_obat_rm') : NULL,
                'jumlah_obat'              => safe_post('jumlah_obat_rm') !== '' ? safe_post('jumlah_obat_rm') : NULL,
                'dosis'                    => safe_post('dosis_rm') !== '' ? safe_post('dosis_rm') : NULL,
                'frekuensi'                => safe_post('frekuensi_rm') !== '' ? safe_post('frekuensi_rm') : NULL,
                'cara_pemberian'           => safe_post('cara_pemberian_rm') !== '' ? safe_post('cara_pemberian_rm') : NULL,
                'ek_jam_pemberian'         => safe_post('ek_jam_pemberian_rm'),
                'ek_jam_pemberian_satu'    => safe_post('ek_jam_pemberian_satu_rm'),
                'ek_jam_pemberian_dua'     => safe_post('ek_jam_pemberian_dua_rm'),
                'ek_jam_pemberian_tiga'    => safe_post('ek_jam_pemberian_tiga_rm'),
                'ek_jam_pemberian_empat'   => safe_post('ek_jam_pemberian_empat_rm'),
                'ek_jam_pemberian_lima'    => safe_post('ek_jam_pemberian_lima_rm'),
                'petunjuk_khusus'          => safe_post('petunjuk_khusus_rm') !== '' ? safe_post('petunjuk_khusus_rm') : NULL,
                'id_users'                 => safe_post('trp_users') !== '' ? safe_post('trp_users') : NULL,
                'created_date'             => $date_created,
            );

            $this->m_rawat_inap->updateTerapiPulangRM($terapi_pulang_rm);
            $this->m_rawat_inap->insertTerapiPulangKeperawatan($terapi_pulang_rm);
        }

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            $status = false;
            $message = 'Gagal Simpan Form Resume Medis';
        } else {
            $this->db->trans_commit();
            $status = true;
            $message = 'Berhasil Simpan Form Resume Medis';
        }

        $this->response([
            'status'  => $status,
            'message' => $message
        ], REST_Controller::HTTP_OK);
    }


    // Get datas from Pengkajian Spiritual Pasien
    function pengkajian_spiritual_pasien_get()
    {
        $this->load->model('pendaftaran/Pendaftaran_model', 'm_pendaftaran');

        $data['pendaftaran_detail'] = [];
        $data['pengkajian_spiritual_pasien'] = [];

        $data['pendaftaran_detail'] = $this->m_pendaftaran->getPendaftaranDetail($this->get('id', true));
        $data['pengkajian_spiritual_pasien'] = $this->m_rawat_inap->getPengkajianSpiritualPasienPulang($this->get('id'));

        if ($data != null) {
            $this->response($data, REST_Controller::HTTP_OK);
        } else {
            $this->response($data, REST_Controller::HTTP_OK);
        }
    }




    // Get datas from Informasi Pasien & Keluarga
    function pemberian_informasi_pasien_get()
    {
        $this->load->model('pendaftaran/Pendaftaran_model', 'm_pendaftaran');

        $data['pendaftaran_detail'] = [];
        $data['pemberian_informasi_pasien'] = [];

        $data['pendaftaran_detail'] = $this->m_pendaftaran->getPendaftaranDetail($this->get('id', true), $this->get('id_layanan_pendaftaran', true));
        $pemberian_informasi_pasien = $this->m_rawat_inap->getPemberianInformasiPasien($this->get('id'));
        if (!empty($pemberian_informasi_pasien)) {
            $data['pemberian_informasi_pasien'] = $pemberian_informasi_pasien;
        }


        if ($data != null) {
            $this->response($data, REST_Controller::HTTP_OK);
        } else {
            $this->response($data, REST_Controller::HTTP_OK);
        }
    }

    function simpan_pemberian_informasi_pasien_post()
    {
        $checkDataPemberianInformasiPasien = '';
        $checkDataPemberianInformasiPasien =  $this->m_rawat_inap->getPemberianInformasiPasien(safe_post('id_layanan_pendaftaran'));

        $this->db->trans_begin();
        if ($checkDataPemberianInformasiPasien == NULL) {

            $data = array(
                'id_layanan_pendaftaran'            => safe_post('id_layanan_pendaftaran'),
                'keluarga'                          => safe_post('nama_keluarga') == '' ? null : safe_post('nama_keluarga'),
                'hubungan_keluarga'                 => safe_post('hubungan_keluarga') == '' ? null : safe_post('hubungan_keluarga'),
                'tanggal_waktu'                     => safe_post('tanggal_waktu') == '' ? null : datetime2mysql(safe_post('tanggal_waktu')),
                'materi_edukasi'                    => safe_post('materi_edukasi') == '' ? null : safe_post('materi_edukasi'),
                'daftar_pertanyaan'                 => safe_post('daftar_pertanyaan') == '' ? null : safe_post('daftar_pertanyaan'),
                'id_dokter'                         => safe_post('dokter') == '' ? null : safe_post('dokter'),
                'is_pasien'                         => safe_post('is_pasien') == 'ya' ? 1 : 0,
                'id_users'                          => safe_post('nama_user') == '' ? null : safe_post('nama_user'),
            );

            $this->db->insert('sm_pemberian_informasi_pasien', $data);
        } else {
            $data = array(
                'keluarga'                          => safe_post('nama_keluarga') == '' ? null : safe_post('nama_keluarga'),
                'hubungan_keluarga'                 => safe_post('hubungan_keluarga') == '' ? null : safe_post('hubungan_keluarga'),
                'tanggal_waktu'                     => safe_post('tanggal_waktu') == '' ? null : datetime2mysql(safe_post('tanggal_waktu')),
                'materi_edukasi'                    => safe_post('materi_edukasi') == '' ? null : safe_post('materi_edukasi'),
                'daftar_pertanyaan'                 => safe_post('daftar_pertanyaan') == '' ? null : safe_post('daftar_pertanyaan'),
                'id_dokter'                         => safe_post('dokter') == '' ? null : safe_post('dokter'),
                'id_users'                          => safe_post('nama_user') == '' ? null : safe_post('nama_user'),
                'is_pasien'                         => safe_post('is_pasien') == 'ya' ? 1 : 0,
            );

            $this->db->where('id_layanan_pendaftaran', safe_post('id_layanan_pendaftaran'));
            $this->db->update('sm_pemberian_informasi_pasien', $data);
        }

        // if ($this->db->trans_status() === false) :
        //     $this->db->trans_rollback();
        //     $status = false;
        //     $message = 'Gagal simpan form Pemberian Informasi Pasien & Keluarga';
        // else :
        //     $this->db->trans_commit();
        //     $status = true;
        //     $message = 'Berhasil form Pemberian Informasi Pasien & Keluarga';
        // endif;

        // $this->response(array('status' => $status, 'message' => $message), REST_Controller::HTTP_OK);

        $obat_rm = safe_post('id_obat_rm');
        if ($obat_rm) {
            $ek_nol_rm = safe_post('ek_jam_pemberian_rm');

            $ek_nol_rm_filter = array_filter($ek_nol_rm);

            if ($ek_nol_rm === "" || $ek_nol_rm === null) {

                $terapi_nol_rm = null;
            } else if (!is_array($ek_nol_rm)) {

                $terapi_nol_rm = null;
            } else if (empty($ek_nol_rm)) {


                $terapi_nol_rm = null;
            } else if (empty($ek_nol_rm_filter)) {


                $terapi_nol_rm = null;
            } else {

                foreach ($ek_nol_rm as $key => $value) {

                    $date = new DateTime($value);
                    $new = $date->format('H:i:s');

                    $terapi_nol_rm[$key] = $new;
                }
            }

            $ek_satu_rm = safe_post('ek_jam_pemberian_satu_rm');

            $ek_satu_rm_filter = array_filter($ek_satu_rm);


            if ($ek_satu_rm === "" || $ek_satu_rm === null) {

                $terapi_satu_rm = null;
            } else if (!is_array($ek_satu_rm)) {


                $terapi_satu_rm = null;
            } else if (empty($ek_satu_rm)) {


                $terapi_satu_rm = null;
            } else if (empty($ek_satu_rm_filter)) {


                $terapi_satu_rm = null;
            } else {

                foreach ($ek_satu_rm as $key => $value) {

                    $date = new DateTime($value);
                    $new = $date->format('H:i:s');


                    $terapi_satu_rm[$key] = $new;
                }
            }

            $ek_dua_rm = safe_post('ek_jam_pemberian_dua_rm');

            $ek_dua_rm_filter = array_filter($ek_dua_rm);


            if ($ek_dua_rm === "" || $ek_dua_rm === null) {

                $terapi_dua_rm = null;
            } else if (!is_array($ek_dua_rm)) {


                $terapi_dua_rm = null;
            } else if (empty($ek_dua_rm)) {


                $terapi_dua_rm = null;
            } else if (empty($ek_dua_rm_filter)) {


                $terapi_dua_rm = null;
            } else {

                foreach ($ek_dua_rm as $key => $value) {

                    $date = new DateTime($value);
                    $new = $date->format('H:i:s');


                    $terapi_dua_rm[$key] = $new;
                }
            }

            $ek_tiga_rm = safe_post('ek_jam_pemberian_tiga_rm');

            $ek_tiga_rm_filter = array_filter($ek_tiga_rm);


            if ($ek_tiga_rm === "" || $ek_tiga_rm === null) {

                $terapi_tiga_rm = null;
            } else if (!is_array($ek_tiga_rm)) {


                $terapi_tiga_rm = null;
            } else if (empty($ek_tiga_rm)) {


                $terapi_tiga_rm = null;
            } else if (empty($ek_tiga_rm_filter)) {


                $terapi_tiga_rm = null;
            } else {

                foreach ($ek_tiga_rm as $key => $value) {

                    $date = new DateTime($value);
                    $new = $date->format('H:i:s');


                    $terapi_tiga_rm[$key] = $new;
                }
            }


            $ek_empat_rm = safe_post('ek_jam_pemberian_empat_rm');

            $ek_empat_rm_filter = array_filter($ek_empat_rm);

            if ($ek_empat_rm === "" || $ek_empat_rm === null) {

                $terapi_empat_rm = null;
            } else if (!is_array($ek_empat_rm)) {


                $terapi_empat_rm = null;
            } else if (empty($ek_empat_rm)) {


                $terapi_empat_rm = null;
            } else if (empty($ek_empat_rm_filter)) {


                $terapi_empat_rm = null;
            } else {

                foreach ($ek_empat_rm as $key => $value) {

                    $date = new DateTime($value);
                    $new = $date->format('H:i:s');

                    $terapi_empat_rm[$key] = $new;
                }
            }

            $ek_lima_rm = safe_post('ek_jam_pemberian_lima_rm');

            $ek_lima_rm_filter = array_filter($ek_lima_rm);

            if ($ek_lima_rm === "" || $ek_lima_rm === null) {

                $terapi_lima_rm = null;
            } else if (!is_array($ek_lima_rm)) {


                $terapi_lima_rm = null;
            } else if (empty($ek_lima_rm)) {

                $terapi_lima_rm = null;
            } else if (empty($ek_lima_rm_filter)) {

                $terapi_lima_rm = null;
            } else {

                foreach ($ek_lima_rm as $key => $value) {

                    $date = new DateTime($value);
                    $new = $date->format('H:i:s');

                    $terapi_lima_rm[$key] = $new;
                }
            }

            $created_date = safe_post('created_date');

            $ek_created_date = array_filter($created_date);

            if ($created_date === "" || $created_date === null) {

                $date_created = null;
            } else if (!is_array($created_date)) {


                $date_created = null;
            } else if (empty($created_date)) {


                $date_created = null;
            } else if (empty($ek_created_date)) {


                $date_created = null;
            } else {

                foreach ($created_date as $key => $value) {

                    $date = new DateTime($value);
                    $new = $date->format('Y-m-d H:i:s');

                    $date_created[$key] = $new;
                }
            }

            $terapi_pulang_rm = array(
                'id_layanan_pendaftaran'   =>  safe_post('id_layanan_pendaftaran'),
                'obat'                     => safe_post('id_obat_rm') !== '' ? safe_post('id_obat_rm') : NULL,
                'jumlah_obat'              => safe_post('jumlah_obat_rm') !== '' ? safe_post('jumlah_obat_rm') : NULL,
                'dosis'                    => safe_post('dosis_rm') !== '' ? safe_post('dosis_rm') : NULL,
                'frekuensi'                => safe_post('frekuensi_rm') !== '' ? safe_post('frekuensi_rm') : NULL,
                'cara_pemberian'           => safe_post('cara_pemberian_rm') !== '' ? safe_post('cara_pemberian_rm') : NULL,
                'ek_jam_pemberian'         => $terapi_nol_rm,
                'ek_jam_pemberian_satu'    => $terapi_satu_rm,
                'ek_jam_pemberian_dua'     => $terapi_dua_rm,
                'ek_jam_pemberian_tiga'    => $terapi_tiga_rm,
                'ek_jam_pemberian_empat'   => $terapi_empat_rm,
                'ek_jam_pemberian_lima'    => $terapi_lima_rm,
                'petunjuk_khusus'          => safe_post('petunjuk_khusus_rm') !== '' ? safe_post('petunjuk_khusus_rm') : NULL,
                'id_users'                 => safe_post('trp_users') !== '' ? safe_post('trp_users') : NULL,
                'created_date'             => $date_created,
            );

            $this->m_rawat_inap->updateTerapiPulangRM($terapi_pulang_rm);
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

    function printing_asesment_pra_bedah_get()
    {
        $data['asesment_pra_bedah'] = $this->m_pelayanan->getAsessmenPraBedah($this->get('id_layanan_pendaftaran'));

        if ($data['asesment_pra_bedah'] == NULL) :
            $status = false;
            $message = 'Data asesment pra bedah masih kosong, silahkan isi terlebih dahulu!';
        else :
            $status = true;
            $message = 'Berhasil';
        endif;

        $this->response(array('status' => $status, 'message' => $message), REST_Controller::HTTP_OK);
    }

    // Get datas from Resume Medis
    function resume_medis_get()
    {
        $this->load->model('pendaftaran/Pendaftaran_model', 'm_pendaftaran');

        $data['pendaftaran_detail'] = [];
        $data['resume_medis'] = [];
        $data['diagnosa_utama'] = '';
        $data['diagnosa_sekunder'] = '';
        $data['ds_manual_utama'] = '';
        $data['ds_manual_sekunder'] = '';
        $data['diagnosa_utama_instalasi_lainnya'] = '';
        $data['tindakan_lab'] = [];
        $data['tindakan_rad'] = [];
        $data['tindakan_ok'] = [];
        $data['tindakan'] = [];
        $data['kontrol_resume'] = [];
        $data['kontrol_resume_keperawatan'] = [];
        $data['terapi_resume'] = [];
        $data['terapi_resume_keperawatan'] = [];

        $data['pendaftaran_detail'] = $this->m_pendaftaran->getPendaftaranDetail($this->get('id', true), $this->get('id_layanan_pendaftaran', true));


        $cekDaftar = $this->m_rawat_inap->cekDaftar($this->get('id', true));

        if (!empty($cekDaftar)) {

            $idLayanan = (int)$cekDaftar[0]->id;
            $diagnosaUtama = $this->m_rawat_inap->getDiagnosaUtama($idLayanan);
            $diagnosaUtamaManual = $this->m_rawat_inap->getDiagnosaManualAwal($idLayanan);

            if (isset($diagnosaUtama[0]->nama)) {

                $data['diagnosa_awal'] = $diagnosaUtama[0]->nama;
            } else {

                $data['diagnosa_awal'] = null;
            }

            if (isset($diagnosaUtamaManual[0]->nama_manual)) {

                $data['diag_manual'] = $diagnosaUtamaManual[0]->nama_manual;
            } else {

                $data['diag_manual'] = null;
            }
        } else {

            $diagnosaUtama = $this->m_rawat_inap->getDiagnosaUtama($this->get('id_layanan_pendaftaran', true));
            $diagnosaUtamaManual = $this->m_rawat_inap->getDiagnosaManualAwal($this->get('id_layanan_pendaftaran', true));

            if (isset($diagnosaUtama[0]->nama)) {

                $data['diagnosa_awal'] = $diagnosaUtama[0]->nama;
            } else {

                $data['diagnosa_awal'] = null;
            }

            if (isset($diagnosaUtamaManual[0]->nama_manual)) {

                $data['diag_manual'] = $diagnosaUtamaManual[0]->nama_manual;
            } else {

                $data['diag_manual'] = null;
            }
        }

        $cekLaboratorium = $this->m_rawat_inap->cekLaboratorium($this->get('id', true));

        $this->load->model('pelayanan/Pelayanan_model', 'm_pelayanan');
        $this->load->model('hasil_laboratorium/Hasil_laboratorium_model', 'm_hasil_laboratorium');
        $data_lis = $this->m_pelayanan->getLIS();

        $this->url = $data_lis->url;
        $this->user = $data_lis->user;
        $this->pass = $data_lis->pass;

        if (!empty($cekLaboratorium)) {

            foreach ($cekLaboratorium as $j => $key) {

                $detail_lab = $this->m_hasil_laboratorium->getDetailLaboratorium($key->id);
                $status_lis = $detail_lab->status_lis;

                $ch = curl_init();
                curl_setopt_array($ch, array(
                    CURLOPT_URL => $this->url . '/api/result/ono/' . $key->kode . '/view/',
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13',
                    CURLOPT_ENCODING => "",
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 120,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => "GET",
                    CURLOPT_HTTPHEADER => array(
                        'x-username: ' . $this->user . '',
                        'x-password: ' . $this->pass . ''
                    ),
                ));
                $response = curl_exec($ch);
                $response_status = curl_getinfo($ch, CURLINFO_RESPONSE_CODE);

                if ($response === false) {

                    curl_close($ch); // close cURL handler

                    if ($status_lis === "1") {

                        $data_lab = $this->m_hasil_laboratorium->getItemDetailLaboratorium($key->id);
                        $dataResponse[] = $data_lab;
                        $dataOno[] = $key->kode;
                        $dataPesan[] = "Gagal Menghubungi LIS, data sinkronisasi";
                        $data_status = false;
                        $data_laboratorium[] = null;
                    } else {

                        $dataResponse[] = null;
                        $data_status = false;
                        $dataOno[] = $key->kode;
                        $dataPesan[] = "Gagal Menghubungi LIS, belum ada data sinkronisasi";
                        $data_laboratorium[] = null;
                    }
                } else {

                    $response_getinfo = curl_getinfo($ch, CURLINFO_RESPONSE_CODE);

                    if ($response_getinfo === 200) {

                        $dataOno[] = $key->kode;
                        $dataPesan[] = null;
                        $data_laboratorium[] = json_decode($response);
                        $data_status[] = true;

                        curl_close($ch);
                    } else {

                        curl_close($ch);
                        $dataResponse[] = null;
                        $data_status[] = true;
                        $dataOno[] = $key->kode;
                        $dataPesan[] = "Belum ada Hasil Lab";
                        $data_laboratorium[] = null;
                    }
                }
            }

            if (!empty($data_laboratorium) && $response !== false) {
                $dataONO = [];
                $gabung_item = array();

                foreach ($data_laboratorium as $j => $k) {

                    if (!empty($k->ono)) {

                        $dataONO[] = $k->ono;

                        $dataKdetail[] = $k->detail;
                    }
                }

                foreach ($dataONO as $n => $o) {

                    foreach ($dataKdetail[$n] as $p => $q) {

                        $gabung_item[$n]['flag'] = $q->flag;
                        $gabung_item[$n]['order_testnm'] = $q->order_testnm;
                        $gabung_item[$n]['test_comment'] = $q->test_comment;
                        $gabung_item[$n]['test_cd'] = $q->test_cd;
                        $gabung_item[$n]['test_group'] = $q->test_group;
                        $gabung_item[$n]['nama'] = $this->m_hasil_laboratorium->getDataItemPemeriksaan($q->test_cd);
                        $gabung_item[$n]['result_value'] = $q->result_value;
                        $gabung_item[$n]['ref_range'] = $q->ref_range;
                        $gabung_item[$n]['unit'] = $q->unit;
                        $gabung_item[$n]['disp_seq'] = $q->disp_seq;
                        $gabung_item[$n]['ono'] = $o;
                        $gabung_item[$n]['release'] = $q->authorise;


                        $dataResponse[] = array("ono" => $gabung_item[$n]['ono'], "release" => $gabung_item[$n]['release'], "flag" => $gabung_item[$n]['flag'], "order_testnm" => $gabung_item[$n]['order_testnm'], "test_comment" => $gabung_item[$n]['test_comment'], "test_cd" => $gabung_item[$n]['test_cd'], "test_group" => $gabung_item[$n]['test_group'], "nama" => $gabung_item[$n]['nama'], "result_value" => $gabung_item[$n]['result_value'], "ref_range" => $gabung_item[$n]['ref_range'], "unit" => $gabung_item[$n]['unit'], "disp_seq" => $gabung_item[$n]['disp_seq']);
                    }
                }
            }


            $data['resume_lab'] = array_values(array_filter($dataResponse));
            $data['status_lab'] = $data_status;
            $data['pesan_lab'] = $dataPesan;
        }

        $idDaftar = (int)$this->get('id', true);

        $cekRadiologi = $this->m_rawat_inap->cekRadiologi($idDaftar);

        if (!empty($cekRadiologi)) {
            $data['cek_radiologi'] = $cekRadiologi;
        }

        // $cekPengobatan = $this->m_rawat_inap->getPengobatan($idDaftar);
        $cekPengobatan = $this->m_rawat_inap->getPengobatanNew($idDaftar);
        if (!empty($cekPengobatan)) {
            $data['cek_obat'] = $cekPengobatan;
        }

        $resume_medis = $this->m_rawat_inap->getResumeMedis($this->get('id', true));

        if (!empty($resume_medis)) {

            $data['resume_medis'] = $resume_medis[0];
            $data['resume_medis']->cara_keluar = $this->db->get_where('sm_layanan_pendaftaran', ['id' => $this->get('id_layanan_pendaftaran')])->row()->tindak_lanjut;
            $data['resume_medis']->id_cppt = $this->m_rawat_inap->cekCPPT($this->get('id', true));
            $data['resume_medis']->id_radiologi = $this->m_rawat_inap->cekHasilRadiologi($this->get('id', true));
            $data['resume_medis']->id_laboratorium = $this->m_rawat_inap->cekHasilLaboratorium($this->get('id', true));
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
            ->where('lp.jenis_layanan', 'Rawat Inap')
            ->order_by('lp.id', 'desc')
            ->limit(1)
            ->get()
            ->result();

        //            foreach ($diagnosa_utamas as $diagnosa_utama) {
        //                $data['diagnosa_utama'] .= $diagnosa_utama->nama . '. ' . '<br>';
        //            }

        $diagnosa_manual_utamas = $this->db->select(" concat_ws ('. ', ( SELECT gss.kode_icdx_rinci FROM sm_golongan_sebab_sakit AS gss WHERE gss.ID = d.id_pengkodean ), ( SELECT gss.kode_icdx_rinci FROM sm_golongan_sebab_sakit AS gss WHERE gss.ID = d.id_pengkodean_asterik ), d.golongan_sebab_sakit_lain ) AS nama, lp.id as id_layanan_pendaftaran ")
            ->from('sm_diagnosa as d')
            ->join('sm_layanan_pendaftaran as lp', 'lp.id = d.id_layanan_pendaftaran', 'left')
            ->join('sm_pendaftaran as pd', 'pd.id = lp.id_pendaftaran', 'left')
            ->where('lp.id_pendaftaran', $this->get('id', true), true)
            ->where('d.prioritas', 'Utama')
            ->where('d.diagnosa_manual', '1')
            ->where('d.is_resume', '1')
            ->where('lp.jenis_layanan', 'Rawat Inap')
            ->order_by('lp.id', 'desc')
            ->limit(1)
            ->get()
            ->result();

        //            foreach ($diagnosa_manual_utamas as $diagnosa_manual_utama) {
        //                $data['diagnosa_manual_utama'] .= $diagnosa_manual_utama->nama . '. ' . '<br>';
        //            }

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
            ->where('d.diagnosa_manual <>', '1')
            ->where('d.is_resume', '1')
            // ->where('lp.jenis_layanan', 'Rawat Inap')
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
            ->where('d.diagnosa_manual', '1')
            ->where('d.is_resume', '1')
            // ->where('lp.jenis_layanan', 'Rawat Inap')
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


        $tindakan_oks = $this->m_rawat_inap->getTindakanOperasi($this->get('id', true));
        if (!empty($tindakan_oks)) {
            $data['tindakan_ok'] = $tindakan_oks;
        }

        $tindakan = $this->m_rawat_inap->getTindakan($this->get('id', true));
        if (!empty($tindakan)) {
            $data['tindakan'] = $tindakan;
        }
        $kontrolresume = $this->m_rawat_inap->getResumeMedisKontrol($this->get('id_layanan_pendaftaran'));
        if (!empty($kontrolresume)) {
            $data['kontrol_resume'] = $kontrolresume;
        }

        $kontrolresumeKeperawatan = $this->m_rawat_inap->getKeperawatanKontrol($this->get('id_layanan_pendaftaran'));
        if (!empty($kontrolresumeKeperawatan)) {
            $data['kontrol_resume_keperawatan'] = $kontrolresumeKeperawatan;
        }

        //Punya Mas reza
        // $terapiResume = $this->m_rawat_inap->getResumeTerapiPulang($this->get('id', true));
        // if (!empty($terapiResume)) {
        //     $data['terapi_resume'] = $terapiResume;
        // }

        $terapiResume1 = $this->m_rawat_inap->getResumeTerapiPulang($this->get('id_layanan_pendaftaran'));
        $terapiResume2 = $this->m_rawat_inap->getObatTerapiPulang($this->get('id_layanan_pendaftaran'));
        if (!empty($terapiResume1) && !empty($terapiResume2)) {
            foreach ($terapiResume1 as $value) {
                $value->nama_obat = $value->obat_rm;
                $value->can_edit = true;
            }
            $data['terapi_resume'] = array_merge($terapiResume2, $terapiResume1);
        } elseif (!empty($terapiResume1)) {
            foreach ($terapiResume1 as $value) {
                $value->nama_obat = $value->obat_rm;
                $value->can_edit = true;
            }
            $data['terapi_resume'] = $terapiResume1;
        } elseif (!empty($terapiResume2)) {
            $data['terapi_resume'] = $terapiResume2;
        }
        $terapiResumeKeperawatan = $this->m_rawat_inap->getKeperawatanPulang($this->get('id_layanan_pendaftaran'));
        if (!empty($terapiResumeKeperawatan)) {
            $data['terapi_resume_keperawatan'] = $terapiResumeKeperawatan;
        }

        if ($data != null) {
            $this->response($data, REST_Controller::HTTP_OK);
        } else {
            $this->response($data, REST_Controller::HTTP_OK);
        }
    }

    // function hapus_terapi_pulang_rm_delete($id, $idKeperawatan)
    // {
    //     $this->db->trans_begin();
    //     $this->db->where("id", $id)->delete("sm_resume_medis_terapi_pulang");
    //     if ($idKeperawatan !== 'undefined') {
    //         $this->db->where("id", $idKeperawatan)->delete("sm_terapi_pulang");
    //     }

    //     if ($this->db->trans_status() === false) {
    //         $this->db->trans_rollback();
    //         $status  = false;
    //         $message = 'Gagal menghapus Terapi Pulang!';
    //     } else {
    //         $this->db->trans_commit();
    //         $status  = true;
    //         $message = 'Berhasil menghapus Terapi Pulang';
    //     }
    //     $response = array('status' => $status, 'message' => $message);
    //     $this->response($response, REST_Controller::HTTP_OK);
    // }

    // LOGS RESUMEDIS TERAPI
    function hapus_terapi_pulang_rm_delete($id, $idKeperawatan){
        $this->load->model('Rawat_inap_model');

        $this->db->trans_begin();

        // Ambil data sebelum dihapus untuk log
        $kontrol = $this->db->get_where('sm_resume_medis_terapi_pulang', ['id' => $id])->row_array();

        $nama_user = $this->session->userdata('nama'); // ambil nama dari session

        if ($kontrol) {
            $this->Rawat_inap_model->logsResumMedisTerapiPulang($kontrol, $nama_user);
        }

        // Hapus data utama
        $this->db->where("id", $id)->delete("sm_resume_medis_terapi_pulang");

        // Hapus jadwal kontrol keperawatan (jika ada)
        if ($idKeperawatan !== 'undefined') {
            $this->db->where("id", $idKeperawatan)->delete("sm_terapi_pulang");
        }

        // Cek status transaksi
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

    function get_data_pengkajian_medis_igd_get()
    {
        if (!$this->get('id', true)) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
        endif;

        $no_rm = $this->get('id', true);
        $id_pendaftaran = $this->get('id_pendaftaran', true);

        $pasien = $this->m_rawat_inap->getDataPengkajianMedisIGDById($no_rm, $id_pendaftaran);
        $data['pasien']             = $pasien;

        if ($data['pasien']->id_layanan_igd <> null) {
            $kajianmedis = $this->m_pemeriksaan_igd->getKajianMedis((int) $data['pasien']->id_layanan_igd);
            $kajiankeperawatan = $this->m_pemeriksaan_igd->getKajianKeperawatan((int) $data['pasien']->id_layanan_igd);
        }
        $data['kajian_medis']       = $kajianmedis;
        $data['kajian_keperawatan'] = $kajiankeperawatan;


        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK); // (200)
        endif;
    }

    // function hapus_kontrol_kembali_rm_delete($id, $idKeperawatan)
    // {
    //     $this->db->trans_begin();
    //     $this->db->where("id", $id)->delete("sm_resume_medis_kontrol_ranap");
    //     if ($idKeperawatan !== 'undefined') {
    //         $this->db->where("id", $idKeperawatan)->delete("sm_jadwal_kontrol_keperawatan");
    //     }

    //     if ($this->db->trans_status() === false) {
    //         $this->db->trans_rollback();
    //         $status  = false;
    //         $message = 'Gagal menghapus Terapi Pulang!';
    //     } else {
    //         $this->db->trans_commit();
    //         $status  = true;
    //         $message = 'Berhasil menghapus Terapi Pulang';
    //     }

    //     $response = array('status' => $status, 'message' => $message);
    //     $this->response($response, REST_Controller::HTTP_OK);
    // }

    // LOGS RESUMEDIS KONTROL
    function hapus_kontrol_kembali_rm_delete($id, $idKeperawatan){
        $this->load->model('Rawat_inap_model');

        $this->db->trans_begin();

        // Ambil data sebelum dihapus untuk log
        $kontrol = $this->db->get_where('sm_resume_medis_kontrol_ranap', ['id' => $id])->row_array();
        $nama_user = $this->session->userdata('nama'); // ambil nama dari session

        if ($kontrol) {
            $this->Rawat_inap_model->logsTglKontrolKembali($kontrol, $nama_user);
        }

        // Hapus data utama
        $this->db->where("id", $id)->delete("sm_resume_medis_kontrol_ranap");

        // Hapus jadwal kontrol keperawatan (jika ada)
        if ($idKeperawatan !== 'undefined') {
            $this->db->where("id", $idKeperawatan)->delete("sm_jadwal_kontrol_keperawatan");
        }

        // Cek status transaksi
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











    // PAKDK
    function simpan_pengkajian_awal_kebidanan_post()
    {
        if (safe_post('id_layanan_pendaftaran') === '') :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
        endif;

        $id_layanan_pendaftaran = safe_post('id_layanan_pendaftaran');
        $id_pendaftaran = safe_post('id_pendaftaran');
        $id_kajian_kebidanan = safe_post('id_kajian_kebidanan');
        $id_user = safe_post('id_user');
        $data_kajian_kebidanan = array(
            'id_layanan_pendaftaran' => $id_layanan_pendaftaran,
            'id_pendaftaran' => $id_pendaftaran,
            'id_users' => $id_user,
            'waktu_kajian_kebidanan' => (safe_post('waktu_kajian_kebidanan') !== '' ? datetime2mysql(safe_post('waktu_kajian_kebidanan')) : NULL),

            // Tiba Diruangan Rawat dengan Cara
            'cara_tiba' => json_encode([
                'cara_tiba_diruangan_pasien' => safe_post('cara_tiba_diruangan_pasien') !== '' ? safe_post('cara_tiba_diruangan_pasien') : null,
                'cara_tiba_diruangan_pasien' => safe_post('cara_tiba_diruangan_pasien') !== '' ? safe_post('cara_tiba_diruangan_pasien') : null,
                'cara_tiba_diruangan_pasien' => safe_post('cara_tiba_diruangan_pasien') !== '' ? safe_post('cara_tiba_diruangan_pasien') : null,
            ]),

            //  Rujukan  pengkajian >
            'rujukan' => json_encode([
                'rujukan_pasien_1' => safe_post('rujukan_pasien_1') !== '' ? safe_post('rujukan_pasien_1') : null,
                'rujukan_pasien_2' => safe_post('rujukan_pasien_2') !== '' ? safe_post('rujukan_pasien_2') : null,
                'rujukan_pasien_3' => safe_post('rujukan_pasien_3') !== '' ? safe_post('rujukan_pasien_3') : null,
                'rujukan_pasien_4' => safe_post('rujukan_pasien_4') !== '' ? safe_post('rujukan_pasien_4') : null,
                'rujukan_pasien_5' => safe_post('rujukan_pasien_5') !== '' ? safe_post('rujukan_pasien_5') : null,
                'rujukan_pasien_6' => safe_post('rujukan_pasien_6') !== '' ? safe_post('rujukan_pasien_6') : null,
                'rujukan_pasien_7' => safe_post('rujukan_pasien_7') !== '' ? safe_post('rujukan_pasien_7') : null,
                'rujukan_pasien_8' => safe_post('rujukan_pasien_8') !== '' ? safe_post('rujukan_pasien_8') : null,
                'rujukan_pasienl' => safe_post('rujukan_pasienl') !== '' ? safe_post('rujukan_pasienl') : null,
            ]),

            // Informasi
            'informasi' => json_encode([
                'informasi_pasien' => safe_post('informasi_pasien') !== '' ? safe_post('informasi_pasien') : null,
                'informasi_pasien' => safe_post('informasi_pasien') !== '' ? safe_post('informasi_pasien') : null,
                'informasi_pasien' => safe_post('informasi_pasien') !== '' ? safe_post('informasi_pasien') : null,
                'informasi_pasienn' => safe_post('informasi_pasienn') !== '' ? safe_post('informasi_pasienn') : null,
            ]),

            // KELUHAN UTAMA
            'keluhan_utama_keb' => json_encode([
                'keluhan_utama_keb_1' => safe_post('keluhan_utama_keb_1') !== '' ? safe_post('keluhan_utama_keb_1') : null,
                'keluhan_utama_keb_2' => safe_post('keluhan_utama_keb_2') !== '' ? safe_post('keluhan_utama_keb_2') : null,
                // 'keluhan_utama_keb_3' => safe_post('keluhan_utama_keb_3') !== '' ? safe_post('keluhan_utama_keb_3') : null,
                'keluhan_utama_keb_3' => safe_post('keluhan_utama_keb_3') !== '' ? date('Y-m-d', strtotime(str_replace('/', '-', safe_post('keluhan_utama_keb_3')))) : NULL,
                'keluhan_utama_keb_4' => safe_post('keluhan_utama_keb_4') !== '' ? safe_post('keluhan_utama_keb_4') : null,
                'keluhan_utama_keb_5' => safe_post('keluhan_utama_keb_5') !== '' ? safe_post('keluhan_utama_keb_5') : null,
                'keluhan_utama_keb_6' => safe_post('keluhan_utama_keb_6') !== '' ? safe_post('keluhan_utama_keb_6') : null,
                'keluhan_utama_keb_7' => safe_post('keluhan_utama_keb_7') !== '' ? safe_post('keluhan_utama_keb_7') : null,
                'keluhan_utama_keb_8' => safe_post('keluhan_utama_keb_8') !== '' ? safe_post('keluhan_utama_keb_8') : null,
                'keluhan_utama_keb_9' => safe_post('keluhan_utama_keb_9') !== '' ? safe_post('keluhan_utama_keb_9') : null,
                'keluhan_utama_keb_10' => safe_post('keluhan_utama_keb_10') !== '' ? safe_post('keluhan_utama_keb_10') : null,
                'keluhan_utama_keb_11' => safe_post('keluhan_utama_keb_11') !== '' ? safe_post('keluhan_utama_keb_11') : null,
            ]),

            // RIWAYAT KEMAHILAN SEKARANG

            'rks_hamil_muda' => json_encode([
                'hamil_muda_1' => safe_post('hamil_muda_1') !== '' ? safe_post('hamil_muda_1') : null,
                'hamil_muda_2' => safe_post('hamil_muda_2') !== '' ? safe_post('hamil_muda_2') : null,
                'hamil_muda_3' => safe_post('hamil_muda_3') !== '' ? safe_post('hamil_muda_3') : null,
                'hamil_muda_4' => safe_post('hamil_muda_4') !== '' ? safe_post('hamil_muda_4') : null,
                'hamil_lain_lain' => safe_post('hamil_lain_lain') !== '' ? safe_post('hamil_lain_lain') : null,
            ]),

            'rks_hamil_tua' => json_encode([
                'hamil_tua_1' => safe_post('hamil_tua_1') !== '' ? safe_post('hamil_tua_1') : null,
                'hamil_tua_2' => safe_post('hamil_tua_2') !== '' ? safe_post('hamil_tua_2') : null,
                'hamil_tua_3' => safe_post('hamil_tua_3') !== '' ? safe_post('hamil_tua_3') : null,
                'hamil_tua_4' => safe_post('hamil_tua_4') !== '' ? safe_post('hamil_tua_4') : null,
                'hamil_lain_5' => safe_post('hamil_lain_5') !== '' ? safe_post('hamil_lain_5') : null,
            ]),

            'rks_anc' =>  json_encode([
                'anc_1' => safe_post('anc_1') !== '' ? safe_post('anc_1') : null,
                'anc_2' => safe_post('anc_2') !== '' ? safe_post('anc_2') : null,
                'anc_3' => safe_post('anc_3') !== '' ? safe_post('anc_3') : null,
                'anc_4' => safe_post('anc_4') !== '' ? safe_post('anc_4') : null,
                'anc_5' => safe_post('anc_5') !== '' ? safe_post('anc_5') : null,
            ]),

            'rks_g' => safe_post('g_riwayat') !== '' ? safe_post('g_riwayat') : NULL,
            'rks_p' => safe_post('p_riwayat') !== '' ? safe_post('p_riwayat') : NULL,
            'rks_a' => safe_post('a_riwayat') !== '' ? safe_post('a_riwayat') : NULL,
            'rks_usia_kehamilan' => safe_post('usia_kehamilan') !== '' ? safe_post('usia_kehamilan') : NULL,
            'rks_hpht' => safe_post('hari_pertama_haid') !== '' ? safe_post('hari_pertama_haid') : NULL,
            'rks_tp' => safe_post('taksiran_persalinan') !== '' ? safe_post('taksiran_persalinan') : NULL,





            // RIWAYAT KESEHATAN
            'rk_riwayat_menstruasi' => json_encode([
                'riwayat_menstruasi_1' => safe_post('riwayat_menstruasi_1') !== '' ? safe_post('riwayat_menstruasi_1') : null,
                'riwayat_menstruasi_2' => safe_post('riwayat_menstruasi_2') !== '' ? safe_post('riwayat_menstruasi_2') : null,
                'riwayat_menstruasi_3' => safe_post('riwayat_menstruasi_3') !== '' ? safe_post('riwayat_menstruasi_3') : null,
                'riwayat_menstruasi_4' => safe_post('riwayat_menstruasi_4') !== '' ? safe_post('riwayat_menstruasi_4') : null,
                'riwayat_menstruasi_5' => safe_post('riwayat_menstruasi_5') !== '' ? safe_post('riwayat_menstruasi_5') : null,
                'riwayat_menstruasi_6' => safe_post('riwayat_menstruasi_6') !== '' ? safe_post('riwayat_menstruasi_6') : null,
                'riwayat_menstruasi_7' => safe_post('riwayat_menstruasi_7') !== '' ? safe_post('riwayat_menstruasi_7') : null,
                'riwayat_menstruasi_8' => safe_post('riwayat_menstruasi_8') !== '' ? safe_post('riwayat_menstruasi_8') : null,
                'riwayat_menstruasi_9' => safe_post('riwayat_menstruasi_9') !== '' ? safe_post('riwayat_menstruasi_9') : null,
            ]),

            'rk_riwayat_perkawinan' => json_encode([
                'riwayat_perkawinan_1' => safe_post('riwayat_perkawinan_1') !== '' ? safe_post('riwayat_perkawinan_1') : null,
                'riwayat_perkawinan_2' => safe_post('riwayat_perkawinan_2') !== '' ? safe_post('riwayat_perkawinan_2') : null,
                'riwayat_perkawinan_3' => safe_post('riwayat_perkawinan_3') !== '' ? safe_post('riwayat_perkawinan_3') : null,
                'riwayat_perkawinan_4' => safe_post('riwayat_perkawinan_4') !== '' ? safe_post('riwayat_perkawinan_4') : null,
                'riwayat_perkawinan_5' => safe_post('riwayat_perkawinan_5') !== '' ? safe_post('riwayat_perkawinan_5') : null,
                'riwayat_perkawinan_6' => safe_post('riwayat_perkawinan_6') !== '' ? safe_post('riwayat_perkawinan_6') : null,
                'riwayat_perkawinan_7' => safe_post('riwayat_perkawinan_7') !== '' ? safe_post('riwayat_perkawinan_7') : null,
                'riwayat_perkawinan_8' => safe_post('riwayat_perkawinan_8') !== '' ? safe_post('riwayat_perkawinan_8') : null,
                'riwayat_perkawinan_9' => safe_post('riwayat_perkawinan_9') !== '' ? safe_post('riwayat_perkawinan_9') : null,
                'riwayat_perkawinan_10' => safe_post('riwayat_perkawinan_10') !== '' ? safe_post('riwayat_perkawinan_10') : null,
                'riwayat_perkawinan_11' => safe_post('riwayat_perkawinan_11') !== '' ? safe_post('riwayat_perkawinan_11') : null,
            ]),

            'rk_riwayat_penyakit_operasi' => json_encode([
                'riwayat_penyakit_oprasi_1' => safe_post('riwayat_penyakit_oprasi_1') !== '' ? safe_post('riwayat_penyakit_oprasi_1') : null,
                'riwayat_penyakit_oprasi_2' => safe_post('riwayat_penyakit_oprasi_2') !== '' ? safe_post('riwayat_penyakit_oprasi_2') : null,
                'riwayat_penyakit_oprasi_3' => safe_post('riwayat_penyakit_oprasi_3') !== '' ? safe_post('riwayat_penyakit_oprasi_3') : null,
                'riwayat_penyakit_oprasi_4' => safe_post('riwayat_penyakit_oprasi_4') !== '' ? safe_post('riwayat_penyakit_oprasi_4') : null,
                'riwayat_penyakit_oprasi_5' => safe_post('riwayat_penyakit_oprasi_5') !== '' ? safe_post('riwayat_penyakit_oprasi_5') : null,
                'riwayat_penyakit_oprasi_6' => safe_post('riwayat_penyakit_oprasi_6') !== '' ? safe_post('riwayat_penyakit_oprasi_6') : null,
                'riwayat_penyakit_oprasi_7' => safe_post('riwayat_penyakit_oprasi_7') !== '' ? safe_post('riwayat_penyakit_oprasi_7') : null,
                'riwayat_penyakit_oprasi_8' => safe_post('riwayat_penyakit_oprasi_8') !== '' ? safe_post('riwayat_penyakit_oprasi_8') : null,
                'riwayat_penyakit_oprasi_9' => safe_post('riwayat_penyakit_oprasi_9') !== '' ? safe_post('riwayat_penyakit_oprasi_9') : null,
                'riwayat_penyakit_oprasi_10' => safe_post('riwayat_penyakit_oprasi_10') !== '' ? safe_post('riwayat_penyakit_oprasi_10') : null,
                'riwayat_penyakit_oprasi_11' => safe_post('riwayat_penyakit_oprasi_11') !== '' ? safe_post('riwayat_penyakit_oprasi_11') : null,
                'riwayat_penyakit_oprasi_11' => safe_post('riwayat_penyakit_oprasi_11') !== '' ? safe_post('riwayat_penyakit_oprasi_11') : null,
                'riwayat_penyakit_oprasi_13' => safe_post('riwayat_penyakit_oprasi_13') !== '' ? safe_post('riwayat_penyakit_oprasi_13') : null,
                'riwayat_penyakit_oprasi_14' => safe_post('riwayat_penyakit_oprasi_14') !== '' ? safe_post('riwayat_penyakit_oprasi_14') : null,
                'riwayat_penyakit_oprasi' => safe_post('riwayat_penyakit_oprasi') !== '' ? safe_post('riwayat_penyakit_oprasi') : null,
                'riwayat_penyakit_oprasi' => safe_post('riwayat_penyakit_oprasi') !== '' ? safe_post('riwayat_penyakit_oprasi') : null,
                'riwayat_penyakit_oprasi_17' => safe_post('riwayat_penyakit_oprasi_17') !== '' ? safe_post('riwayat_penyakit_oprasi_17') : null,
                'riwayat_penyakit_oprasi_18' => safe_post('riwayat_penyakit_oprasi_18') !== '' ? safe_post('riwayat_penyakit_oprasi_18') : null,
            ]),

            'rk_obat_dikosumsi' => safe_post('rk_obat_dikosumsi') !== '' ? safe_post('rk_obat_dikosumsi') : NULL,

            'rk_membawa_obat_dari_luar' => json_encode([
                'membawa_obat_1' => safe_post('membawa_obat_1') !== '' ? safe_post('membawa_obat_1') : null,
                'membawa_obat_1' => safe_post('membawa_obat_1') !== '' ? safe_post('membawa_obat_1') : null,
            ]),

            'rk_terapi_komplementari' => json_encode([
                'terapi_komplementari_1' => safe_post('terapi_komplementari_1') !== '' ? safe_post('terapi_komplementari_1') : null,
                'terapi_komplementari_2' => safe_post('terapi_komplementari_2') !== '' ? safe_post('terapi_komplementari_2') : null,
                'terapi_komplementari_3' => safe_post('terapi_komplementari_3') !== '' ? safe_post('terapi_komplementari_3') : null,
                'terapi_komplementari_4' => safe_post('terapi_komplementari_4') !== '' ? safe_post('terapi_komplementari_4') : null,
                'terapi_komplementari_5' => safe_post('terapi_komplementari_5') !== '' ? safe_post('terapi_komplementari_5') : null,
                'terapi_komplementari_6' => safe_post('terapi_komplementari_6') !== '' ? safe_post('terapi_komplementari_6') : null,
            ]),

            'rk_riwayat_penyakit_kluwarga' => json_encode([
                'riwayat_penyakit_kluwarga_1' => safe_post('riwayat_penyakit_kluwarga_1') !== '' ? safe_post('riwayat_penyakit_kluwarga_1') : null,
                'riwayat_penyakit_kluwarga_2' => safe_post('riwayat_penyakit_kluwarga_2') !== '' ? safe_post('riwayat_penyakit_kluwarga_2') : null,
                'riwayat_penyakit_kluwarga_3' => safe_post('riwayat_penyakit_kluwarga_3') !== '' ? safe_post('riwayat_penyakit_kluwarga_3') : null,
                'riwayat_penyakit_kluwarga_4' => safe_post('riwayat_penyakit_kluwarga_4') !== '' ? safe_post('riwayat_penyakit_kluwarga_4') : null,
                'riwayat_penyakit_kluwarga_5' => safe_post('riwayat_penyakit_kluwarga_5') !== '' ? safe_post('riwayat_penyakit_kluwarga_5') : null,
                'riwayat_penyakit_kluwarga_6' => safe_post('riwayat_penyakit_kluwarga_6') !== '' ? safe_post('riwayat_penyakit_kluwarga_6') : null,
                'riwayat_penyakit_kluwarga_7' => safe_post('riwayat_penyakit_kluwarga_7') !== '' ? safe_post('riwayat_penyakit_kluwarga_7') : null,
                'riwayat_penyakit_kluwarga_8' => safe_post('riwayat_penyakit_kluwarga_8') !== '' ? safe_post('riwayat_penyakit_kluwarga_8') : null,
                'riwayat_penyakit_kluwarga_9' => safe_post('riwayat_penyakit_kluwarga_9') !== '' ? safe_post('riwayat_penyakit_kluwarga_9') : null,
                'riwayat_penyakit_kluwarga_10' => safe_post('riwayat_penyakit_kluwarga_10') !== '' ? safe_post('riwayat_penyakit_kluwarga_10') : null,
                'riwayat_penyakit_kluwarga_11' => safe_post('riwayat_penyakit_kluwarga_11') !== '' ? safe_post('riwayat_penyakit_kluwarga_11') : null,
                'riwayat_penyakit_kluwarga_12' => safe_post('riwayat_penyakit_kluwarga_12') !== '' ? safe_post('riwayat_penyakit_kluwarga_12') : null,
                'riwayat_penyakit_kluwarga_13' => safe_post('riwayat_penyakit_kluwarga_13') !== '' ? safe_post('riwayat_penyakit_kluwarga_13') : null,
                'riwayat_penyakit_kluwarga_14' => safe_post('riwayat_penyakit_kluwarga_14') !== '' ? safe_post('riwayat_penyakit_kluwarga_14') : null,
                'riwayat_penyakit_kluwarga_15' => safe_post('riwayat_penyakit_kluwarga_15') !== '' ? safe_post('riwayat_penyakit_kluwarga_15') : null,
            ]),

            'rk_riwayat_kluwarga_berencana' => json_encode([
                'riwayat_kel_berencana_1' => safe_post('riwayat_kel_berencana_1') !== '' ? safe_post('riwayat_kel_berencana_1') : null,
                'riwayat_kel_berencana_2' => safe_post('riwayat_kel_berencana_2') !== '' ? safe_post('riwayat_kel_berencana_2') : null,
                'riwayat_kel_berencana_3' => safe_post('riwayat_kel_berencana_3') !== '' ? safe_post('riwayat_kel_berencana_3') : null,
                'riwayat_kel_berencana_4' => safe_post('riwayat_kel_berencana_4') !== '' ? safe_post('riwayat_kel_berencana_4') : null,
                'riwayat_kel_berencana_5' => safe_post('riwayat_kel_berencana_5') !== '' ? safe_post('riwayat_kel_berencana_5') : null,
                'riwayat_kel_berencana_6' => safe_post('riwayat_kel_berencana_6') !== '' ? safe_post('riwayat_kel_berencana_6') : null,
                'riwayat_kel_berencana_7' => safe_post('riwayat_kel_berencana_7') !== '' ? safe_post('riwayat_kel_berencana_7') : null,
                'riwayat_kel_berencana_8' => safe_post('riwayat_kel_berencana_8') !== '' ? safe_post('riwayat_kel_berencana_8') : null,
                'riwayat_kel_berencana_9' => safe_post('riwayat_kel_berencana_9') !== '' ? safe_post('riwayat_kel_berencana_9') : null,
            ]),

            'rk_riwayat_ginekologi' => json_encode([
                'riwayat_ginekologi_1' => safe_post('riwayat_ginekologi_1') !== '' ? safe_post('riwayat_ginekologi_1') : null,
                'riwayat_ginekologi_2' => safe_post('riwayat_ginekologi_2') !== '' ? safe_post('riwayat_ginekologi_2') : null,
                'riwayat_ginekologi_3' => safe_post('riwayat_ginekologi_3') !== '' ? safe_post('riwayat_ginekologi_3') : null,
                'riwayat_ginekologi_4' => safe_post('riwayat_ginekologi_4') !== '' ? safe_post('riwayat_ginekologi_4') : null,
                'riwayat_ginekologi_5' => safe_post('riwayat_ginekologi_5') !== '' ? safe_post('riwayat_ginekologi_5') : null,
                'riwayat_ginekologi_6' => safe_post('riwayat_ginekologi_6') !== '' ? safe_post('riwayat_ginekologi_6') : null,
                'riwayat_ginekologi_7' => safe_post('riwayat_ginekologi_7') !== '' ? safe_post('riwayat_ginekologi_7') : null,
                'riwayat_ginekologi_8' => safe_post('riwayat_ginekologi_8') !== '' ? safe_post('riwayat_ginekologi_8') : null,
                'riwayat_ginekologi_9' => safe_post('riwayat_ginekologi_9') !== '' ? safe_post('riwayat_ginekologi_9') : null,
                'riwayat_ginekologi_10' => safe_post('riwayat_ginekologi_10') !== '' ? safe_post('riwayat_ginekologi_10') : null,
                'riwayat_ginekologi_11' => safe_post('riwayat_ginekologi_11') !== '' ? safe_post('riwayat_ginekologi_11') : null,
                'riwayat_ginekologi_12' => safe_post('riwayat_ginekologi_12') !== '' ? safe_post('riwayat_ginekologi_12') : null,
            ]),

            'rk_riwayat_alergi' => json_encode([
                'riwayat_alergi_1' => safe_post('riwayat_alergi_1') !== '' ? safe_post('riwayat_alergi_1') : null,
                'riwayat_alergi_1' => safe_post('riwayat_alergi_1') !== '' ? safe_post('riwayat_alergi_1') : null,
                'riwayat_alergi_3' => safe_post('riwayat_alergi_3') !== '' ? safe_post('riwayat_alergi_3') : null,
                'riwayat_alergi_4' => safe_post('riwayat_alergi_4') !== '' ? safe_post('riwayat_alergi_4') : null,
                'riwayat_alergi_5' => safe_post('riwayat_alergi_5') !== '' ? safe_post('riwayat_alergi_5') : null,
                'riwayat_alergi_6' => safe_post('riwayat_alergi_6') !== '' ? safe_post('riwayat_alergi_6') : null,
                'riwayat_alergi_7' => safe_post('riwayat_alergi_7') !== '' ? safe_post('riwayat_alergi_7') : null,
                'riwayat_alergi_8' => safe_post('riwayat_alergi_8') !== '' ? safe_post('riwayat_alergi_8') : null,
            ]),

            'rk_riwayat_tranfusi_darah' =>  json_encode([
                'riwayat_tranfusi_darah_1' => safe_post('riwayat_tranfusi_darah_1') !== '' ? safe_post('riwayat_tranfusi_darah_1') : null,
                'riwayat_tranfusi_darah_2' => safe_post('riwayat_tranfusi_darah_2') !== '' ? safe_post('riwayat_tranfusi_darah_2') : null,
                'riwayat_tranfusi_darah_3' => safe_post('riwayat_tranfusi_darah_3') !== '' ? safe_post('riwayat_tranfusi_darah_3') : null,
                'riwayat_tranfusi_darah_3' => safe_post('riwayat_tranfusi_darah_3') !== '' ? safe_post('riwayat_tranfusi_darah_3') : null,
                'riwayat_tranfusi_darah_5' => safe_post('riwayat_tranfusi_darah_5') !== '' ? safe_post('riwayat_tranfusi_darah_5') : null,
            ]),

            'rk_kebiasaan' =>  json_encode([
                'kebiasaan_1' => safe_post('kebiasaan_1') !== '' ? safe_post('kebiasaan_1') : null,
                'kebiasaan_2' => safe_post('kebiasaan_2') !== '' ? safe_post('kebiasaan_2') : null,
                'kebiasaan_3' => safe_post('kebiasaan_3') !== '' ? safe_post('kebiasaan_3') : null,
                'kebiasaan_4' => safe_post('kebiasaan_4') !== '' ? safe_post('kebiasaan_4') : null,
                'kebiasaan_5' => safe_post('kebiasaan_5') !== '' ? safe_post('kebiasaan_5') : null,
                'kebiasaan_6' => safe_post('kebiasaan_6') !== '' ? safe_post('kebiasaan_6') : null,
            ]),

            'rk_status_psikologi' => json_encode([
                'status_psikologis_1' => safe_post('status_psikologis_1') !== '' ? safe_post('status_psikologis_1') : null,
                'status_psikologis_2' => safe_post('status_psikologis_2') !== '' ? safe_post('status_psikologis_2') : null,
                'status_psikologis_3' => safe_post('status_psikologis_3') !== '' ? safe_post('status_psikologis_3') : null,
                'status_psikologis_4' => safe_post('status_psikologis_4') !== '' ? safe_post('status_psikologis_4') : null,
                'status_psikologis_5' => safe_post('status_psikologis_5') !== '' ? safe_post('status_psikologis_5') : null,
                'status_psikologis_6' => safe_post('status_psikologis_6') !== '' ? safe_post('status_psikologis_6') : null,
                'status_psikologis_7' => safe_post('status_psikologis_7') !== '' ? safe_post('status_psikologis_7') : null,
                'status_psikologis_8' => safe_post('status_psikologis_8') !== '' ? safe_post('status_psikologis_8') : null,
                'status_psikologis_9' => safe_post('status_psikologis_9') !== '' ? safe_post('status_psikologis_9') : null,
                'status_psikologis_10' => safe_post('status_psikologis_10') !== '' ? safe_post('status_psikologis_10') : null,
            ]),

            'rk_status_mental' => json_encode([
                'status_mental_1' => safe_post('status_mental_1') !== '' ? safe_post('status_mental_1') : null,
                'status_mental_2' => safe_post('status_mental_2') !== '' ? safe_post('status_mental_2') : null,
                'status_mental_3' => safe_post('status_mental_3') !== '' ? safe_post('status_mental_3') : null,
                'status_mental_4' => safe_post('status_mental_4') !== '' ? safe_post('status_mental_4') : null,
                'status_mental_5' => safe_post('status_mental_5') !== '' ? safe_post('status_mental_5') : null,
            ]),

            'rk_kebutuhan_biologis' => json_encode([
                'kebutuhan_biologis_1' => safe_post('kebutuhan_biologis_1') !== '' ? safe_post('kebutuhan_biologis_1') : null,
                'kebutuhan_biologis_2' => safe_post('kebutuhan_biologis_2') !== '' ? safe_post('kebutuhan_biologis_2') : null,
                'kebutuhan_biologis_3' => safe_post('kebutuhan_biologis_3') !== '' ? safe_post('kebutuhan_biologis_3') : null,
                'kebutuhan_biologis_4' => safe_post('kebutuhan_biologis_4') !== '' ? safe_post('kebutuhan_biologis_4') : null,
                'kebutuhan_biologis_5' => safe_post('kebutuhan_biologis_5') !== '' ? safe_post('kebutuhan_biologis_5') : null,
                'kebutuhan_biologis_6' => safe_post('kebutuhan_biologis_6') !== '' ? safe_post('kebutuhan_biologis_6') : null,
                'kebutuhan_biologis_7' => safe_post('kebutuhan_biologis_7') !== '' ? safe_post('kebutuhan_biologis_7') : null,
                'kebutuhan_biologis_8' => safe_post('kebutuhan_biologis_8') !== '' ? safe_post('kebutuhan_biologis_8') : null,
                'kebutuhan_biologis_9' => safe_post('kebutuhan_biologis_9') !== '' ? safe_post('kebutuhan_biologis_9') : null,
            ]),

            'rk_kebutuhan_sosial' => json_encode([
                'kebutuhan_sosial_1' => safe_post('kebutuhan_sosial_1') !== '' ? safe_post('kebutuhan_sosial_1') : null,
                'kebutuhan_sosial_2' => safe_post('kebutuhan_sosial_2') !== '' ? safe_post('kebutuhan_sosial_2') : null,
                'kebutuhan_sosial_3' => safe_post('kebutuhan_sosial_3') !== '' ? safe_post('kebutuhan_sosial_3') : null,
                'kebutuhan_sosial_4' => safe_post('kebutuhan_sosial_4') !== '' ? safe_post('kebutuhan_sosial_4') : null,
                'kebutuhan_sosial_5' => safe_post('kebutuhan_sosial_5') !== '' ? safe_post('kebutuhan_sosial_5') : null,
                'kebutuhan_sosial_6' => safe_post('kebutuhan_sosial_6') !== '' ? safe_post('kebutuhan_sosial_6') : null,
                'kebutuhan_sosial_7' => safe_post('kebutuhan_sosial_7') !== '' ? safe_post('kebutuhan_sosial_7') : null,
                'kebutuhan_sosial_8' => safe_post('kebutuhan_sosial_8') !== '' ? safe_post('kebutuhan_sosial_8') : null,
                'kebutuhan_sosial_8' => safe_post('kebutuhan_sosial_8') !== '' ? safe_post('kebutuhan_sosial_8') : null,
                'kebutuhan_sosial_10' => safe_post('kebutuhan_sosial_10') !== '' ? safe_post('kebutuhan_sosial_10') : null,
                'kebutuhan_sosial_11' => safe_post('kebutuhan_sosial_11') !== '' ? safe_post('kebutuhan_sosial_11') : null,
                'kebutuhan_sosial_12' => safe_post('kebutuhan_sosial_12') !== '' ? safe_post('kebutuhan_sosial_12') : null,
                'kebutuhan_sosial_13' => safe_post('kebutuhan_sosial_13') !== '' ? safe_post('kebutuhan_sosial_13') : null,
                'kebutuhan_sosial_14' => safe_post('kebutuhan_sosial_14') !== '' ? safe_post('kebutuhan_sosial_14') : null,
            ]),

            'rk_status_ekonomi' => json_encode([
                'status_ekonomi_1' => safe_post('status_ekonomi_1') !== '' ? safe_post('status_ekonomi_1') : null,
                'status_ekonomi_2' => safe_post('status_ekonomi_2') !== '' ? safe_post('status_ekonomi_2') : null,
                'status_ekonomi_3' => safe_post('status_ekonomi_3') !== '' ? safe_post('status_ekonomi_3') : null,
                'status_ekonomi_4' => safe_post('status_ekonomi_4') !== '' ? safe_post('status_ekonomi_4') : null,
                'status_ekonomi_5' => safe_post('status_ekonomi_5') !== '' ? safe_post('status_ekonomi_5') : null,
                'status_ekonomi_6' => safe_post('status_ekonomi_6') !== '' ? safe_post('status_ekonomi_6') : null,
                'status_ekonomi_7' => safe_post('status_ekonomi_7') !== '' ? safe_post('status_ekonomi_7') : null,
                'status_ekonomi_8' => safe_post('status_ekonomi_8') !== '' ? safe_post('status_ekonomi_8') : null,
                'status_ekonomi_9' => safe_post('status_ekonomi_9') !== '' ? safe_post('status_ekonomi_9') : null,
            ]),

            'rk_status_nilai_kepercayaan' => json_encode([
                'status_nn_kepercayaan_1' => safe_post('status_nn_kepercayaan_1') !== '' ? safe_post('status_nn_kepercayaan_1') : null,
                'status_nn_kepercayaan_1' => safe_post('status_nn_kepercayaan_1') !== '' ? safe_post('status_nn_kepercayaan_1') : null,
                'status_nn_kepercayaan_3' => safe_post('status_nn_kepercayaan_3') !== '' ? safe_post('status_nn_kepercayaan_3') : null,
                'status_nn_kepercayaan_4' => safe_post('status_nn_kepercayaan_4') !== '' ? safe_post('status_nn_kepercayaan_4') : null,
                'status_nn_kepercayaan_4' => safe_post('status_nn_kepercayaan_4') !== '' ? safe_post('status_nn_kepercayaan_4') : null,
                'status_nn_kepercayaan_6' => safe_post('status_nn_kepercayaan_6') !== '' ? safe_post('status_nn_kepercayaan_6') : null,
                'status_nn_kepercayaan_7' => safe_post('status_nn_kepercayaan_7') !== '' ? safe_post('status_nn_kepercayaan_7') : null,
            ]),

            'rk_spiritual' => json_encode([
                'spiritual_1' => safe_post('spiritual_1') !== '' ? safe_post('spiritual_1') : null,
                'spiritual_2' => safe_post('spiritual_2') !== '' ? safe_post('spiritual_2') : null,
                'spiritual_3' => safe_post('spiritual_3') !== '' ? safe_post('spiritual_3') : null,
                'spiritual_4' => safe_post('spiritual_4') !== '' ? safe_post('spiritual_4') : null,
                'spiritual_5' => safe_post('spiritual_5') !== '' ? safe_post('spiritual_5') : null,
                'spiritual_6' => safe_post('spiritual_6') !== '' ? safe_post('spiritual_6') : null,
                'spiritual_7' => safe_post('spiritual_7') !== '' ? safe_post('spiritual_7') : null,
                'spiritual_8' => safe_post('spiritual_8') !== '' ? safe_post('spiritual_8') : null,
                'spiritual_9' => safe_post('spiritual_9') !== '' ? safe_post('spiritual_9') : null,
            ]),

            'rk_budaya' => json_encode([
                'budaya_1' => safe_post('budaya_1') !== '' ? safe_post('budaya_1') : null,
                'budaya_2' => safe_post('budaya_2') !== '' ? safe_post('budaya_2') : null,
                'budaya_3' => safe_post('budaya_3') !== '' ? safe_post('budaya_3') : null,
                'budaya_4' => safe_post('budaya_4') !== '' ? safe_post('budaya_4') : null,
                'budaya_5' => safe_post('budaya_5') !== '' ? safe_post('budaya_5') : null,
                'budaya_6' => safe_post('budaya_6') !== '' ? safe_post('budaya_6') : null,
                'budaya_7' => safe_post('budaya_7') !== '' ? safe_post('budaya_7') : null,
                'budaya_8' => safe_post('budaya_8') !== '' ? safe_post('budaya_8') : null,
                'budaya_9' => safe_post('budaya_9') !== '' ? safe_post('budaya_9') : null,
                'budaya_10' => safe_post('budaya_10') !== '' ? safe_post('budaya_10') : null,
                'budaya_11' => safe_post('budaya_11') !== '' ? safe_post('budaya_11') : null,
                'budaya_12' => safe_post('budaya_12') !== '' ? safe_post('budaya_12') : null,
                'budaya_12' => safe_post('budaya_12') !== '' ? safe_post('budaya_12') : null,
                'budaya_14' => safe_post('budaya_14') !== '' ? safe_post('budaya_14') : null,
                'budaya_14' => safe_post('budaya_14') !== '' ? safe_post('budaya_14') : null,
                'budaya_16' => safe_post('budaya_16') !== '' ? safe_post('budaya_16') : null,
                'budaya_17' => safe_post('budaya_17') !== '' ? safe_post('budaya_17') : null,
                'budaya_17' => safe_post('budaya_17') !== '' ? safe_post('budaya_17') : null,
                'budaya_19' => safe_post('budaya_19') !== '' ? safe_post('budaya_19') : null,
                'budaya_20' => safe_post('budaya_20') !== '' ? safe_post('budaya_20') : null,
                'budaya_20' => safe_post('budaya_20') !== '' ? safe_post('budaya_20') : null,
                'budaya_22' => safe_post('budaya_22') !== '' ? safe_post('budaya_22') : null,
            ]),


            // IDENTIFIKASI KEBUTUHAN BELAJAR EDUKASI
            'ikbe_kewarganegaraan' => safe_post('kewarganegaraan_pasien') !== '' ? safe_post('kewarganegaraan_pasien') : NULL,
            'ikbe_suku_bangsa' => safe_post('suku_bangsa_pasien') !== '' ? safe_post('suku_bangsa_pasien') : NULL,
            'ikbe_bicara' => safe_post('bicara_pasien') !== '' ? safe_post('bicara_pasien') : NULL,
            'ikbe_jelaskan' => safe_post('bicara_pasien_1') !== '' ? safe_post('bicara_pasien_1') : NULL,
            'ikbe_perlu_peterjemah' => safe_post('perlu_penterjemah') !== '' ? safe_post('perlu_penterjemah') : NULL,
            'ikbe_bahasa' => safe_post('perlu_penterjemah_1') !== '' ? safe_post('perlu_penterjemah_1') : NULL,
            'ikbe_bahasa_isyarat' => safe_post('bahasa_isyarat') !== '' ? safe_post('bahasa_isyarat') : NULL,
            'ikbe_pemahaman_penyakit' => safe_post('pemahaman_pasien') !== '' ? safe_post('pemahaman_pasien') : NULL,
            'ikbe_pemahaman_pengobatan' => safe_post('pt_pengobatan_pasien') !== '' ? safe_post('pt_pengobatan_pasien') : NULL,
            'ikbe_pemahaman_nutrisi' => safe_post('pt_nutrisi') !== '' ? safe_post('pt_nutrisi') : NULL,
            'ikbe_pemahaman_spiritual' => safe_post('pt_spiritual') !== '' ? safe_post('pt_spiritual') : NULL,
            'ikbe_pemahaman_peralatan' => safe_post('pt_peralatan') !== '' ? safe_post('pt_peralatan') : NULL,
            'ikbe_pemahaman_rahab' => safe_post('pt_rehab') !== '' ? safe_post('pt_rehab') : NULL,
            'ikbe_pemahaman_manajemen' => safe_post('pt_manajemen') !== '' ? safe_post('pt_manajemen') : NULL,


            // HAMBATAN UNTUK MENERIMA EDUKASI
            'hambatan_keb' => json_encode([
                'hambatan_keb_1' => safe_post('hambatan_keb_1') !== '' ? safe_post('hambatan_keb_1') : null,
                'hambatan_keb_2' => safe_post('hambatan_keb_2') !== '' ? safe_post('hambatan_keb_2') : null,
                'hambatan_keb_3' => safe_post('hambatan_keb_3') !== '' ? safe_post('hambatan_keb_3') : null,
                'hambatan_keb_4' => safe_post('hambatan_keb_4') !== '' ? safe_post('hambatan_keb_4') : null,
                'hambatan_keb_5' => safe_post('hambatan_keb_5') !== '' ? safe_post('hambatan_keb_5') : null,
                'hambatan_keb_6' => safe_post('hambatan_keb_6') !== '' ? safe_post('hambatan_keb_6') : null,
                'hambatan_keb_7' => safe_post('hambatan_keb_7') !== '' ? safe_post('hambatan_keb_7') : null,
                'hambatan_keb_8' => safe_post('hambatan_keb_8') !== '' ? safe_post('hambatan_keb_8') : null,
                'hambatan_keb_9' => safe_post('hambatan_keb_9') !== '' ? safe_post('hambatan_keb_9') : null,
                'hambatan_keb_10' => safe_post('hambatan_keb_10') !== '' ? safe_post('hambatan_keb_10') : null,
            ]),


            // PEMERIKSAAN KEBIDANAN DAN KANDUNGAN
            'pkdk_inpeksi_abdomen' => json_encode([
                'infeksi_abdomen_1' => safe_post('infeksi_abdomen_1') !== '' ? safe_post('infeksi_abdomen_1') : null,
                'infeksi_abdomen_2' => safe_post('infeksi_abdomen_2') !== '' ? safe_post('infeksi_abdomen_2') : null,
                'infeksi_abdomen_3' => safe_post('infeksi_abdomen_3') !== '' ? safe_post('infeksi_abdomen_3') : null,
                'infeksi_abdomen_4' => safe_post('infeksi_abdomen_4') !== '' ? safe_post('infeksi_abdomen_4') : null,
                'infeksi_abdomen_5' => safe_post('infeksi_abdomen_5') !== '' ? safe_post('infeksi_abdomen_5') : null,
                'infeksi_abdomen_6' => safe_post('infeksi_abdomen_6') !== '' ? safe_post('infeksi_abdomen_6') : null,
                'infeksi_abdomen_7' => safe_post('infeksi_abdomen_7') !== '' ? safe_post('infeksi_abdomen_7') : null,
                'infeksi_abdomen_8' => safe_post('infeksi_abdomen_8') !== '' ? safe_post('infeksi_abdomen_8') : null,
                'infeksi_abdomen_9' => safe_post('infeksi_abdomen_9') !== '' ? safe_post('infeksi_abdomen_9') : null,
                'infeksi_abdomen_10' => safe_post('infeksi_abdomen_10') !== '' ? safe_post('infeksi_abdomen_10') : null,
            ]),

            'pkdk_palpasi' =>  json_encode([
                'palpasi_1' => safe_post('palpasi_1') !== '' ? safe_post('palpasi_1') : null,
                'palpasi_2' => safe_post('palpasi_2') !== '' ? safe_post('palpasi_2') : null,
                'palpasi_3' => safe_post('palpasi_3') !== '' ? safe_post('palpasi_3') : null,
                'palpasi_4' => safe_post('palpasi_4') !== '' ? safe_post('palpasi_4') : null,
                'palpasi_5' => safe_post('palpasi_5') !== '' ? safe_post('palpasi_5') : null,
                'palpasi_6' => safe_post('palpasi_6') !== '' ? safe_post('palpasi_6') : null,
                'palpasi_7' => safe_post('palpasi_7') !== '' ? safe_post('palpasi_7') : null,
                'palpasi_8' => safe_post('palpasi_8') !== '' ? safe_post('palpasi_8') : null,
                'palpasi_9' => safe_post('palpasi_9') !== '' ? safe_post('palpasi_9') : null,
                'palpasi_10' => safe_post('palpasi_10') !== '' ? safe_post('palpasi_10') : null,
                'palpasi_11' => safe_post('palpasi_11') !== '' ? safe_post('palpasi_11') : null,
                'palpasi_12' => safe_post('palpasi_12') !== '' ? safe_post('palpasi_12') : null,
                'palpasi_13' => safe_post('palpasi_13') !== '' ? safe_post('palpasi_13') : null,
                'palpasi_14' => safe_post('palpasi_14') !== '' ? safe_post('palpasi_14') : null,
                'palpasi_15' => safe_post('palpasi_15') !== '' ? safe_post('palpasi_15') : null,
                'palpasi_16' => safe_post('palpasi_16') !== '' ? safe_post('palpasi_16') : null,
                'palpasi_17' => safe_post('palpasi_17') !== '' ? safe_post('palpasi_17') : null,
            ]),

            'pkdk_auskultasi' => json_encode([
                'auskultasi_1' => safe_post('auskultasi_1') !== '' ? safe_post('auskultasi_1') : null,
                'auskultasi_2' => safe_post('auskultasi_2') !== '' ? safe_post('auskultasi_2') : null,
                'auskultasi_3' => safe_post('auskultasi_3') !== '' ? safe_post('auskultasi_3') : null,
                'auskultasi_4' => safe_post('auskultasi_4') !== '' ? safe_post('auskultasi_4') : null,
            ]),

            'pkdk_gerak_janin' => safe_post('gerak_janin') !== '' ? safe_post('gerak_janin') : NULL,

            'pkdk_his_kontraksi' => json_encode([
                'his_konteraksi_1' => safe_post('his_konteraksi_1') !== '' ? safe_post('his_konteraksi_1') : null,
                'his_konteraksi_2' => safe_post('his_konteraksi_2') !== '' ? safe_post('his_konteraksi_2') : null,
                'his_konteraksi_3' => safe_post('his_konteraksi_3') !== '' ? safe_post('his_konteraksi_3') : null,
            ]),
            'pkdk_pemeriksaan_dalam' => json_encode([
                'pemeriksaan_dalam_1' => safe_post('pemeriksaan_dalam_1') !== '' ? safe_post('pemeriksaan_dalam_1') : null,
                'pemeriksaan_dalam_2' => safe_post('pemeriksaan_dalam_2') !== '' ? safe_post('pemeriksaan_dalam_2') : null,
                'pemeriksaan_dalam_3' => safe_post('pemeriksaan_dalam_3') !== '' ? safe_post('pemeriksaan_dalam_3') : null,
                'pemeriksaan_dalam_4' => safe_post('pemeriksaan_dalam_4') !== '' ? safe_post('pemeriksaan_dalam_4') : null,
                'pemeriksaan_dalam_5' => safe_post('pemeriksaan_dalam_5') !== '' ? safe_post('pemeriksaan_dalam_5') : null,
                'pemeriksaan_dalam_6' => safe_post('pemeriksaan_dalam_6') !== '' ? safe_post('pemeriksaan_dalam_6') : null,
                'pemeriksaan_dalam_7' => safe_post('pemeriksaan_dalam_7') !== '' ? safe_post('pemeriksaan_dalam_7') : null,
                'pemeriksaan_dalam_8' => safe_post('pemeriksaan_dalam_8') !== '' ? safe_post('pemeriksaan_dalam_8') : null,
                'pemeriksaan_dalam_9' => safe_post('pemeriksaan_dalam_9') !== '' ? safe_post('pemeriksaan_dalam_9') : null,
                'pemeriksaan_dalam_10' => safe_post('pemeriksaan_dalam_10') !== '' ? safe_post('pemeriksaan_dalam_10') : null,
                'pemeriksaan_dalam_11' => safe_post('pemeriksaan_dalam_11') !== '' ? safe_post('pemeriksaan_dalam_11') : null,
                'pemeriksaan_dalam_12' => safe_post('pemeriksaan_dalam_12') !== '' ? safe_post('pemeriksaan_dalam_12') : null,
                'pemeriksaan_dalam_13' => safe_post('pemeriksaan_dalam_13') !== '' ? safe_post('pemeriksaan_dalam_13') : null,
                'pemeriksaan_dalam_13' => safe_post('pemeriksaan_dalam_13') !== '' ? safe_post('pemeriksaan_dalam_13') : null,
            ]),

            // PENILAIAN KEMMAPUAN FUNGSIONAL
            'pkf_makan' => (safe_post('nilai_pkf_makan') !== '' ? safe_post('nilai_pkf_makan') : NULL),
            'pkf_mandi' => (safe_post('nilai_pkf_mandi') !== '' ? safe_post('nilai_pkf_mandi') : NULL),
            'pkf_personal' => (safe_post('nilai_pkf_personal') !== '' ? safe_post('nilai_pkf_personal') : NULL),
            'pkf_berpakaian' => (safe_post('nilai_pkf_berpakaian') !== '' ? safe_post('nilai_pkf_berpakaian') : NULL),
            'pkf_buang_besar' => (safe_post('nilai_pkf_bab') !== '' ? safe_post('nilai_pkf_bab') : NULL),
            'pkf_buang_kecil' => (safe_post('nilai_pkf_bak') !== '' ? safe_post('nilai_pkf_bak') : NULL),
            'pkf_berpindah' => (safe_post('nilai_pkf_berpindah') !== '' ? safe_post('nilai_pkf_berpindah') : NULL),
            'pkf_toileting' => (safe_post('nilai_pkf_toiletting') !== '' ? safe_post('nilai_pkf_toiletting') : NULL),
            'pkf_mobilitas' => (safe_post('nilai_pkf_mobilisasi') !== '' ? safe_post('nilai_pkf_mobilisasi') : NULL),
            'pkf_naik' => (safe_post('nilai_pkf_naikturuntangga') !== '' ? safe_post('nilai_pkf_naikturuntangga') : NULL),
            'pkf_jumlah_skor' => (safe_post('total_nilai_pkf') !== '' ? safe_post('total_nilai_pkf') : NULL),

            // SKRINING NUTRISI (/MTSMODIFIKASI)
            'sn_penurunan_bb_kebidanan' => (safe_post('sn_penurunan_bb') !== '' ? safe_post('sn_penurunan_bb') : NULL),
            'sn_penurunan_bb_on_kebidanan' => (safe_post('sn_penurunan_bb_on') !== '' ? safe_post('sn_penurunan_bb_on') : NULL),
            'sn_asupan_makan_kebidanan' => (safe_post('sn_asupan_makan') !== '' ? safe_post('sn_asupan_makan') : NULL),
            'sn_total_kebidanan' => (safe_post('sn_total') !== '' ? safe_post('sn_total') : NULL),

            // PENILAIAN TINGKAT NYERI
            'ptn_nilai_tingkat_nyeri' => json_encode([
                'keterangan_kebidanan_1' => safe_post('keterangan_kebidanan_1') !== '' ? safe_post('keterangan_kebidanan_1') : null,
                'keterangan_kebidanan_1' => safe_post('keterangan_kebidanan_1') !== '' ? safe_post('keterangan_kebidanan_1') : null,
                'keterangan_kebidanan_1' => safe_post('keterangan_kebidanan_1') !== '' ? safe_post('keterangan_kebidanan_1') : null,
            ]),
            'ptn_nyeri_hilang' => json_encode([
                'nyeri_hilang_kebidanan_1' => safe_post('nyeri_hilang_kebidanan_1') !== '' ? safe_post('nyeri_hilang_kebidanan_1') : null,
                'nyeri_hilang_kebidanan_2' => safe_post('nyeri_hilang_kebidanan_2') !== '' ? safe_post('nyeri_hilang_kebidanan_2') : null,
                'nyeri_hilang_kebidanan_3' => safe_post('nyeri_hilang_kebidanan_3') !== '' ? safe_post('nyeri_hilang_kebidanan_3') : null,
                'nyeri_hilang_kebidanan_4' => safe_post('nyeri_hilang_kebidanan_4') !== '' ? safe_post('nyeri_hilang_kebidanan_4') : null,
                'nyeri_hilang_kebidanan_5' => safe_post('nyeri_hilang_kebidanan_5') !== '' ? safe_post('nyeri_hilang_kebidanan_5') : null,
                'nyeri_hilang_kebidanan_6' => safe_post('nyeri_hilang_kebidanan_6') !== '' ? safe_post('nyeri_hilang_kebidanan_6') : null,
            ]),

            // PENILAIAN RESIKO JATUH DEWASA
            'prjd_riwayat_jatuh' => (safe_post('prjd_riwayat_jatuh_kebidanan') !== '' ? safe_post('prjd_riwayat_jatuh_kebidanan') : NULL),
            'prjd_diagnosis' => (safe_post('prjd_diagnosis_sekunder_kebidanan') !== '' ? safe_post('prjd_diagnosis_sekunder_kebidanan') : NULL),
            'prjd_kursi_roda' => (safe_post('alat_bantu_jalan_1_kebidanan_ya') !== '' ? safe_post('alat_bantu_jalan_1_kebidanan_ya') : NULL),
            'prjd_kruk_tongkat' => (safe_post('alat_bantu_jalan_2_kebidanan_ya') !== '' ? safe_post('alat_bantu_jalan_2_kebidanan_ya') : NULL),
            'prjd_berpegangan' => (safe_post('alat_bantu_jalan_3_kebidanan_ya') !== '' ? safe_post('alat_bantu_jalan_3_kebidanan_ya') : NULL),
            'prjd_terpasang_infus' => (safe_post('prjd_terpasang_infus_kebidanan') !== '' ? safe_post('prjd_terpasang_infus_kebidanan') : NULL),
            'prjd_normal' => (safe_post('cara_berjalan_1_kebidanan_ya') !== '' ? safe_post('cara_berjalan_1_kebidanan_ya') : NULL),
            'prjd_lemah' => (safe_post('cara_berjalan_2_kebidanan_ya') !== '' ? safe_post('cara_berjalan_2_kebidanan_ya') : NULL),
            'prjd_terganggu' => (safe_post('cara_berjalan_3_kebidanan_ya') !== '' ? safe_post('cara_berjalan_3_kebidanan_ya') : NULL),
            'prjd_sadar' => (safe_post('status_mental_1_kebidanan_ya') !== '' ? safe_post('status_mental_1_kebidanan_ya') : NULL),
            'prjd_sering' => (safe_post('status_mental_2_kebidanan_ya') !== '' ? safe_post('status_mental_2_kebidanan_ya') : NULL),
            'prjd_jumlah_skor' => (safe_post('prjd_jumlah_skor_kebidanan') !== '' ? safe_post('prjd_jumlah_skor_kebidanan') : NULL),

            // SKRINING PASIEN AKHIR KEHIDUPAN
            'spak_usia' => safe_post('spak_1_kebidanan_ya') !== '' ? safe_post('spak_1_kebidanan_ya') : NULL,
            'spak_nafas' => safe_post('spak_2_kebidanan_ya') !== '' ? safe_post('spak_2_kebidanan_ya') : NULL,
            'spak_sepsis' => safe_post('spak_3_kebidanan_ya') !== '' ? safe_post('spak_3_kebidanan_ya') : NULL,
            'spak_multiple' => safe_post('spak_4_kebidanan_ya') !== '' ? safe_post('spak_4_kebidanan_ya') : NULL,
            'spak_studium' => safe_post('spak_5_kebidanan_ya') !== '' ? safe_post('spak_5_kebidanan_ya') : NULL,


            // PEMERIKSAAN FISIK DAN TANDA TANDA FITAL
            'pftv_kesadaran' => json_encode([
                'kesadaran_1' => safe_post('kesadaran_1') !== '' ? safe_post('kesadaran_1') : null,
                'kesadaran_2' => safe_post('kesadaran_2') !== '' ? safe_post('kesadaran_2') : null,
                'kesadaran_3' => safe_post('kesadaran_3') !== '' ? safe_post('kesadaran_3') : null,
                'kesadaran_4' => safe_post('kesadaran_4') !== '' ? safe_post('kesadaran_4') : null,
            ]),

            // GCS KEBIDANAN
            'pftv_gsc_e' => safe_post('gcs_e') !== '' ? safe_post('gcs_e') : NULL,
            'pftv_gsc_m' => safe_post('gcs_m') !== '' ? safe_post('gcs_m') : NULL,
            'pftv_gsc_v' => safe_post('gcs_v') !== '' ? safe_post('gcs_v') : NULL,
            'pftv_total' => safe_post('gsc_total') !== '' ? safe_post('gsc_total') : NULL,

            'pftv_tekanan_darah' => json_encode([
                'tekanan_darah_1' => safe_post('tekanan_darah_1') !== '' ? safe_post('tekanan_darah_1') : null,
                'tekanan_darah_2' => safe_post('tekanan_darah_2') !== '' ? safe_post('tekanan_darah_2') : null,
                'tekanan_darah_3' => safe_post('tekanan_darah_3') !== '' ? safe_post('tekanan_darah_3') : null,
            ]),

            'pftv_frekuensi_nadi' => json_encode([
                'frekuensi_nadi_1' => safe_post('frekuensi_nadi_1') !== '' ? safe_post('frekuensi_nadi_1') : null,
                'frekuensi_nadi_2' => safe_post('frekuensi_nadi_2') !== '' ? safe_post('frekuensi_nadi_2') : null,
            ]),

            'pftv_berat_badan' => json_encode([
                'berat_badan_1' => safe_post('berat_badan_1') !== '' ? safe_post('berat_badan_1') : null,
                'berat_badan_2' => safe_post('berat_badan_2') !== '' ? safe_post('berat_badan_2') : null,
            ]),

            'pftv_mata' => json_encode([
                'mata_1' => safe_post('mata_1') !== '' ? safe_post('mata_1') : null,
                'mata_2' => safe_post('mata_2') !== '' ? safe_post('mata_2') : null,
                'mata_3' => safe_post('mata_3') !== '' ? safe_post('mata_3') : null,
                'mata_4' => safe_post('mata_4') !== '' ? safe_post('mata_4') : null,
            ]),

            'pftv_dada_aksila' => json_encode([
                'dada_askila_1' => safe_post('dada_askila_1') !== '' ? safe_post('dada_askila_1') : null,
                'dada_askila_2' => safe_post('dada_askila_2') !== '' ? safe_post('dada_askila_2') : null,
                'dada_askila_3' => safe_post('dada_askila_3') !== '' ? safe_post('dada_askila_3') : null,
                'dada_askila_4' => safe_post('dada_askila_4') !== '' ? safe_post('dada_askila_4') : null,
                'dada_askila_5' => safe_post('dada_askila_5') !== '' ? safe_post('dada_askila_5') : null,
                'dada_askila_6' => safe_post('dada_askila_6') !== '' ? safe_post('dada_askila_6') : null,
            ]),

            'pftv_ekstremitas' => json_encode([
                'ekstremitas_1' => safe_post('ekstremitas_1') !== '' ? safe_post('ekstremitas_1') : null,
                'ekstremitas_2' => safe_post('ekstremitas_2') !== '' ? safe_post('ekstremitas_2') : null,
                'ekstremitas_3' => safe_post('ekstremitas_3') !== '' ? safe_post('ekstremitas_3') : null,
                'ekstremitas_4' => safe_post('ekstremitas_4') !== '' ? safe_post('ekstremitas_4') : null,
            ]),

            'pftv_sistem_pernafasan' => json_encode([
                'sistem_pernafasan_1' => safe_post('sistem_pernafasan_1') !== '' ? safe_post('sistem_pernafasan_1') : null,
                'sistem_pernafasan_2' => safe_post('sistem_pernafasan_2') !== '' ? safe_post('sistem_pernafasan_2') : null,
                'sistem_pernafasan_3' => safe_post('sistem_pernafasan_3') !== '' ? safe_post('sistem_pernafasan_3') : null,
                'sistem_pernafasan_4' => safe_post('sistem_pernafasan_4') !== '' ? safe_post('sistem_pernafasan_4') : null,
                'sistem_pernafasan_5' => safe_post('sistem_pernafasan_5') !== '' ? safe_post('sistem_pernafasan_5') : null,
                'sistem_pernafasan_6' => safe_post('sistem_pernafasan_6') !== '' ? safe_post('sistem_pernafasan_6') : null,
                'sistem_pernafasan_7' => safe_post('sistem_pernafasan_7') !== '' ? safe_post('sistem_pernafasan_7') : null,
                'sistem_pernafasan_8' => safe_post('sistem_pernafasan_8') !== '' ? safe_post('sistem_pernafasan_8') : null,
                'sistem_pernafasan_9' => safe_post('sistem_pernafasan_9') !== '' ? safe_post('sistem_pernafasan_9') : null,
            ]),

            'pftv_sistem_kardiovaskuler' => json_encode([
                'sistem_kardiovaskuler_1' => safe_post('sistem_kardiovaskuler_1') !== '' ? safe_post('sistem_kardiovaskuler_1') : null,
                'sistem_kardiovaskuler_2' => safe_post('sistem_kardiovaskuler_2') !== '' ? safe_post('sistem_kardiovaskuler_2') : null,
                'sistem_kardiovaskuler_3' => safe_post('sistem_kardiovaskuler_3') !== '' ? safe_post('sistem_kardiovaskuler_3') : null,
                'sistem_kardiovaskuler_4' => safe_post('sistem_kardiovaskuler_4') !== '' ? safe_post('sistem_kardiovaskuler_4') : null,
                'sistem_kardiovaskuler_5' => safe_post('sistem_kardiovaskuler_5') !== '' ? safe_post('sistem_kardiovaskuler_5') : null,
                'sistem_kardiovaskuler_5' => safe_post('sistem_kardiovaskuler_5') !== '' ? safe_post('sistem_kardiovaskuler_5') : null,
                'sistem_kardiovaskuler_7' => safe_post('sistem_kardiovaskuler_7') !== '' ? safe_post('sistem_kardiovaskuler_7') : null,
                'sistem_kardiovaskuler_8' => safe_post('sistem_kardiovaskuler_8') !== '' ? safe_post('sistem_kardiovaskuler_8') : null,
                'sistem_kardiovaskuler_8' => safe_post('sistem_kardiovaskuler_8') !== '' ? safe_post('sistem_kardiovaskuler_8') : null,
                'sistem_kardiovaskuler_10' => safe_post('sistem_kardiovaskuler_10') !== '' ? safe_post('sistem_kardiovaskuler_10') : null,
                'sistem_kardiovaskuler_11' => safe_post('sistem_kardiovaskuler_11') !== '' ? safe_post('sistem_kardiovaskuler_11') : null,
                'sistem_kardiovaskuler_12' => safe_post('sistem_kardiovaskuler_12') !== '' ? safe_post('sistem_kardiovaskuler_12') : null,
                'sistem_kardiovaskuler_13' => safe_post('sistem_kardiovaskuler_13') !== '' ? safe_post('sistem_kardiovaskuler_13') : null,
                'sistem_kardiovaskuler_14' => safe_post('sistem_kardiovaskuler_14') !== '' ? safe_post('sistem_kardiovaskuler_14') : null,
                'sistem_kardiovaskuler_15' => safe_post('sistem_kardiovaskuler_15') !== '' ? safe_post('sistem_kardiovaskuler_15') : null,
                'sistem_kardiovaskuler_16' => safe_post('sistem_kardiovaskuler_16') !== '' ? safe_post('sistem_kardiovaskuler_16') : null,
            ]),

            // SKALA EARLY WARNING SYSTEM (MEOWS)
            'sews_respirasi' => safe_post('respirasi') !== '' ? safe_post('respirasi') : NULL,
            'sews_saturasi_1' => safe_post('saturasi') !== '' ? safe_post('saturasi') : NULL,
            'sews_o2' => safe_post('o2') !== '' ? safe_post('o2') : NULL,
            'sews_suhu' => safe_post('suhu') !== '' ? safe_post('suhu') : NULL,
            'sews_td_sistolik' => safe_post('sintolik') !== '' ? safe_post('sintolik') : NULL,
            'sews_td_diastolik' => safe_post('diastolik') !== '' ? safe_post('diastolik') : NULL,
            'sews_nadi' => safe_post('nadi') !== '' ? safe_post('nadi') : NULL,
            'sews_kesadaran_1' => safe_post('kesadaran') !== '' ? safe_post('kesadaran') : NULL,
            'sews_nyeri' => safe_post('nyeri_11') !== '' ? safe_post('nyeri_11') : NULL,
            'sews_pengeluaran' => safe_post('pengeluwaran_11') !== '' ? safe_post('pengeluwaran_11') : NULL,
            'sews_protein_urin' => safe_post('protein') !== '' ? safe_post('protein') : NULL,
            'sews_total_1' => safe_post('total_skalameows') !== '' ? safe_post('total_skalameows') : NULL,

            // SKALA EARLY WARNING SYSTEM (NEWS)
            'sews_laju_respirasi' => safe_post('laju_respirasi') !== '' ? safe_post('laju_respirasi') : NULL,
            'sews_saturasi_2' => safe_post('saturasi_1') !== '' ? safe_post('saturasi_1') : NULL,
            'sews_suplemen' => safe_post('suplemen') !== '' ? safe_post('suplemen') : NULL,
            'sews_temperatur' => safe_post('temperatur') !== '' ? safe_post('temperatur') : NULL,
            'sews_tds' => safe_post('tds') !== '' ? safe_post('tds') : NULL,
            'sews_laju_jantung' => safe_post('laju_jantung') !== '' ? safe_post('laju_jantung') : NULL,
            'sews_kesadaran_2' => safe_post('kesadaran_1') !== '' ? safe_post('kesadaran_1') : NULL,
            'sews_total_2' => safe_post('total_skalanews') !== '' ? safe_post('total_skalanews') : NULL,

            // DATA PENUNJANG
            'dp_pemeriksaan_lab_tanggal' => safe_post('tanggal_pemeriksaan_lab_kebidanan_1') !== '' ? date('Y-m-d', strtotime(str_replace('/', '-', safe_post('tanggal_pemeriksaan_lab_kebidanan_1')))) : NULL,
            'dp_pemeriksaan_ctg_tanggal' => safe_post('tanggal_pemeriksaan_rad_kebidanan_3') !== '' ? date('Y-m-d', strtotime(str_replace('/', '-', safe_post('tanggal_pemeriksaan_rad_kebidanan_3')))) : NULL,
            'dp_hasil' => safe_post('hasil_pemeriksaan_labo_kebidanan_2') !== '' ? safe_post('hasil_pemeriksaan_labo_kebidanan_2') : NULL,
            'dp_hasil1' => safe_post('hasil_pemeriksaan_rad_kebidanan_4') !== '' ? safe_post('hasil_pemeriksaan_rad_kebidanan_4') : NULL,
            'dp_lain_lain' => safe_post('penunjang_lain_kebidanan_5') !== '' ? safe_post('penunjang_lain_kebidanan_5') : NULL,


            // POPULASI KHUSUS (ISI SESUAI KEBUTUHAN  PASIEN)
            'pk_penyakit_menular' => json_encode([
                'pk_penyakit_menular_1' => safe_post('pk_penyakit_menular_1') !== '' ? safe_post('pk_penyakit_menular_1') : null,
                'pk_penyakit_menular_1' => safe_post('pk_penyakit_menular_1') !== '' ? safe_post('pk_penyakit_menular_1') : null,
                'pk_penyakit_menular_3' => safe_post('pk_penyakit_menular_3') !== '' ? safe_post('pk_penyakit_menular_3') : null,
                'pk_penyakit_menular_4' => safe_post('pk_penyakit_menular_4') !== '' ? safe_post('pk_penyakit_menular_4') : null,
                'pk_penyakit_menular_5' => safe_post('pk_penyakit_menular_5') !== '' ? safe_post('pk_penyakit_menular_5') : null,
                'pk_penyakit_menular_6' => safe_post('pk_penyakit_menular_6') !== '' ? safe_post('pk_penyakit_menular_6') : null,
                'pk_penyakit_menular_7' => safe_post('pk_penyakit_menular_7') !== '' ? safe_post('pk_penyakit_menular_7') : null,
                'pk_penyakit_menular_8' => safe_post('pk_penyakit_menular_8') !== '' ? safe_post('pk_penyakit_menular_8') : null,
                'pk_penyakit_menular_9' => safe_post('pk_penyakit_menular_9') !== '' ? safe_post('pk_penyakit_menular_9') : null,
                'pk_penyakit_menular_8' => safe_post('pk_penyakit_menular_8') !== '' ? safe_post('pk_penyakit_menular_8') : null,
                'pk_penyakit_menular_11' => safe_post('pk_penyakit_menular_11') !== '' ? safe_post('pk_penyakit_menular_11') : null,
                'pk_penyakit_menular_11' => safe_post('pk_penyakit_menular_11') !== '' ? safe_post('pk_penyakit_menular_11') : null,
                'pk_penyakit_menular_13' => safe_post('pk_penyakit_menular_13') !== '' ? safe_post('pk_penyakit_menular_13') : null,
                'pk_penyakit_menular_14' => safe_post('pk_penyakit_menular_14') !== '' ? safe_post('pk_penyakit_menular_14') : null,
                'pk_penyakit_menular_15' => safe_post('pk_penyakit_menular_15') !== '' ? safe_post('pk_penyakit_menular_15') : null,
                'pk_penyakit_menular_16' => safe_post('pk_penyakit_menular_16') !== '' ? safe_post('pk_penyakit_menular_16') : null,
                'pk_penyakit_menular_17' => safe_post('pk_penyakit_menular_17') !== '' ? safe_post('pk_penyakit_menular_17') : null,
                'pk_penyakit_menular_18' => safe_post('pk_penyakit_menular_18') !== '' ? safe_post('pk_penyakit_menular_18') : null,
                'pk_penyakit_menular_18' => safe_post('pk_penyakit_menular_18') !== '' ? safe_post('pk_penyakit_menular_18') : null,
                'pk_penyakit_menular_20' => safe_post('pk_penyakit_menular_20') !== '' ? safe_post('pk_penyakit_menular_20') : null,
            ]),

            'pk_penurunan_daya_tahan_tubuh' => json_encode(array(
                // pasien mengetahui penyakit saat ini
                'penyakit_saat_ini' => safe_post('pk_penyakit_pdtt_1_kebidanan'),
                // sumber informasi tentang penyakit diperoleh dari
                'informasi_dari'    => array(
                    'dokter'        => safe_post('pk_pdtt_dokter_kebidanan'),
                    'perawat'       => safe_post('pk_pdtt_perawat_kebidanan'),
                    'keluarga'      => safe_post('pk_pdtt_keluarga_kebidanan'),
                    'lain'          => safe_post('pk_pdtt_lain_kebidanan'),
                    'ket_lain'      => safe_post('pk_pdtt_lain_kebidanan_input'),
                ),
                // menerima informasi jangka waktu pengobatan
                'informasi_jangka_waktu'        => safe_post('pk_penyakit_pdtt_3_kebidanan'),
                'ket_informasi_jangka_waktu'    => safe_post('pk_penyakit_pdtt_3_kebidanan_input'),
                // melakukan pemeriksaan rutin
                'pemeriksaan_rutin'             => safe_post('pk_penyakit_pdtt_4_kebidanan'),
                'ket_pemeriksaan_rutin'         => safe_post('pk_penyakit_pdtt_4_kebidanan_input'),
                'penyakit_penyerta'             => safe_post('pk_penyakit_pdtt_5_kebidanan'),
                'ket_penyakit_penyerta'         => safe_post('pk_penyakit_pdtt_5_kebidanan_input'),
            )),


            'pk_kesehatan_jiwa' => json_encode(array(
                'ket_1' => safe_post('pk_kesehatan_jiwa_1_kebidanan'),
                'ket_2' => safe_post('pk_kesehatan_jiwa_2_kebidanan'),
                'ket_3' => safe_post('pk_kesehatan_jiwa_3_kebidanan'),
                'ket_4' => safe_post('pk_kesehatan_jiwa_4_kebidanan'),
                'ket_5' => safe_post('pk_kesehatan_jiwa_5_kebidanan'),
                'ket_6' => safe_post('pk_kesehatan_jiwa_6_kebidanan'),
                'ket_7' => safe_post('pk_kesehatan_jiwa_7_kebidanan'),
                'ket_8' => safe_post('pk_kesehatan_jiwa_8_kebidanan'),
                'ket_9' => safe_post('pk_kesehatan_jiwa_9_kebidanan'),
            )),

            'pk_pasien_kekerasan_penganiayaan' => json_encode(array(
                'ket_1' => safe_post('pk_pasien_kekerasan_1_kebidanan'),
                'ket_2' => safe_post('pk_pasien_kekerasan_2_kebidanan'),
                'ket_3' => safe_post('pk_pasien_kekerasan_3_kebidanan'),
                'ket_4' => safe_post('pk_pasien_kekerasan_4_kebidanan'),
                'ket_5' => safe_post('pk_pasien_kekerasan_5_kebidanan'),
                'ket_6' => safe_post('pk_pasien_kekerasan_6_kebidanan'),
            )),

            'pk_pasien_ketergantungan_obat'  => json_encode(array(
                'obat'  => safe_post('pk_pasien_ketergantungan_obat_kebidanan'),
                'ket_obat'  => safe_post('pk_pasien_ketergantungan_obat_input_kebidanan'),
                'lama_ketergantungan'   => safe_post('pk_pasien_lama_ketergantungan_obat_input_kebidanan'),
            )),


            // ASSESMEN KEBIDANAN
            'ak_infeksi' => safe_post('masalah_resiko_infeksi') !== '' ? safe_post('masalah_resiko_infeksi') : NULL,
            'ak_anxeitas' => safe_post('masalah_anxietas') !== '' ? safe_post('masalah_anxietas') : NULL,
            'ak_perdarahan' => safe_post('masalah_resiko_perdarahan') !== '' ? safe_post('masalah_resiko_perdarahan') : NULL,
            'ak_melahirkan' => safe_post('masalah_nyeri') !== '' ? safe_post('masalah_nyeri') : NULL,
            'ak_nausea' => safe_post('masalah_nausea') !== '' ? safe_post('masalah_nausea') : NULL,
            'ak_efektif' => safe_post('masalah_pola_nafas') !== '' ? safe_post('masalah_pola_nafas') : NULL,
            'ak_janin' => safe_post('masalah_resiko_gawat') !== '' ? safe_post('masalah_resiko_gawat') : NULL,
            'ak_lain' => safe_post('masalah_lain') !== '' ? safe_post('masalah_lain') : NULL,
            'ak_lainl' => safe_post('masalah_lainl') !== '' ? safe_post('masalah_lainl') : NULL,

            // RENCANA ASUHAN KEBIDANAN
            'rak_kluwarga' => safe_post('rencana_jelaskan') !== '' ? safe_post('rencana_jelaskan') : NULL,
            'rak_selanjutnya' => safe_post('rencana_laporkan') !== '' ? safe_post('rencana_laporkan') : NULL,
            'rak_consent' => safe_post('rencana_fasilitas') !== '' ? safe_post('rencana_fasilitas') : NULL,
            'rak_kebutuhan' => safe_post('rencana_asuhan') !== '' ? safe_post('rencana_asuhan') : NULL,
            'rak_persalinan' => safe_post('rencana_lakukan') !== '' ? safe_post('rencana_lakukan') : NULL,
            'rak_pasien' => safe_post('rencana_lakukan_edukasi') !== '' ? safe_post('rencana_lakukan_edukasi') : NULL,
            'rak_lain' => safe_post('rencana_lain') !== '' ? safe_post('rencana_lain') : NULL,
            'rak_lainl' => safe_post('rencana_lainl') !== '' ? safe_post('rencana_lainl') : NULL,

            // PERENCANAAN PULANG / DISCHARGE PLANING
            'kriteria_discharge_planing' => json_encode([
                'discharge_planning_kebidanan_1' => safe_post('discharge_planning_kebidanan_1') !== '' ? safe_post('discharge_planning_kebidanan_1') : null,
                'discharge_planning_kebidanan_2' => safe_post('discharge_planning_kebidanan_2') !== '' ? safe_post('discharge_planning_kebidanan_2') : null,
                'discharge_planning_kebidanan_3' => safe_post('discharge_planning_kebidanan_3') !== '' ? safe_post('discharge_planning_kebidanan_3') : null,
                'discharge_planning_kebidanan_4' => safe_post('discharge_planning_kebidanan_4') !== '' ? safe_post('discharge_planning_kebidanan_4') : null,
            ]),
            'perencanaa_pulang' => json_encode([
                'kriteria_discharge_kebidanan_1' => safe_post('kriteria_discharge_kebidanan_1') !== '' ? safe_post('kriteria_discharge_kebidanan_1') : null,
                'kriteria_discharge_kebidanan_2' => safe_post('kriteria_discharge_kebidanan_2') !== '' ? safe_post('kriteria_discharge_kebidanan_2') : null,
                'kriteria_discharge_kebidanan_3' => safe_post('kriteria_discharge_kebidanan_3') !== '' ? safe_post('kriteria_discharge_kebidanan_3') : null,
                'kriteria_discharge_kebidanan_4' => safe_post('kriteria_discharge_kebidanan_4') !== '' ? safe_post('kriteria_discharge_kebidanan_4') : null,
                'kriteria_discharge_kebidanan_5' => safe_post('kriteria_discharge_kebidanan_5') !== '' ? safe_post('kriteria_discharge_kebidanan_5') : null,
                'kriteria_discharge_kebidanan_6' => safe_post('kriteria_discharge_kebidanan_6') !== '' ? safe_post('kriteria_discharge_kebidanan_6') : null,
                'kriteria_discharge_kebidanan_7' => safe_post('kriteria_discharge_kebidanan_7') !== '' ? safe_post('kriteria_discharge_kebidanan_7') : null,
                'kriteria_discharge_kebidanan_8' => safe_post('kriteria_discharge_kebidanan_8') !== '' ? safe_post('kriteria_discharge_kebidanan_8') : null,
                'kriteria_discharge_kebidanan_9' => safe_post('kriteria_discharge_kebidanan_9') !== '' ? safe_post('kriteria_discharge_kebidanan_9') : null,
                'kriteria_discharge_kebidanan_10' => safe_post('kriteria_discharge_kebidanan_10') !== '' ? safe_post('kriteria_discharge_kebidanan_10') : null,
            ]),

            // TGL / TTD / NAMA BIDAN OR DOKTEER
            'tanggal_jam_bidan' => (safe_post('tanggal_jam_bidan') !== '' ? datetime2mysql(safe_post('tanggal_jam_bidan')) : NULL),
            'id_bidan' => safe_post('id_bidan') !== '' ? safe_post('id_bidan') : NULL,
            'ttd_bidan' => safe_post('ttd_bidan') !== '' ? safe_post('ttd_bidan') : NULL,

            'tanggal_jam_dokter_keb' => (safe_post('tanggal_jam_dokter_keb') !== '' ? datetime2mysql(safe_post('tanggal_jam_dokter_keb')) : NULL),
            'id_dokter' => safe_post('id_dokter') !== '' ? safe_post('id_dokter') : NULL,
            'ttd_dokter' => safe_post('ttd_dokter') !== '' ? safe_post('ttd_dokter') : NULL,

        );

        // PENGKAJIAN MEDIS // PAKDKM
        $id_kajian_medis_kebidanan = safe_post('id_kajian_medis_kebidanan');

        $id_layanan_pendaftaran = safe_post('id_layanan_pendaftaran');
        $id_user = safe_post('id_user');

        // update alergi pasien
        $this->load->model('pelayanan/Pelayanan_model', 'm_pelayanan');
        $this->m_pelayanan->updateAlergiPasien(safe_post('id_pasien'), safe_post('riwayat_alergi'));
        // cek profil pasien
        $checkProfilPasien = $this->db->query("select * from sm_profil_pasien where id_pasien = '" . safe_post('id_pasien') . "'")->row();
        $dataProfilPasien = array(
            'id_pasien' => safe_post('id_pasien'),
        );
        if ($checkProfilPasien) :
            $this->db->where('id_pasien', safe_post('id_pasien'), true)->update('sm_profil_pasien', $dataProfilPasien);
        else :
            $this->db->insert('sm_profil_pasien', $dataProfilPasien);
        endif;

        $data_kajian_medis_kebidanan = array(
            'id_layanan_pendaftaran'        => $id_layanan_pendaftaran,
            'id_users' => $id_user,
            'waktu_kajian_medis_bidan'      => (safe_post('waktu_kajian_medis_bidan') !== '' ? datetime2mysql(safe_post('waktu_kajian_medis_bidan')) : NULL),

            'keluhan_utama'                 => safe_post('keluhan_utama_medis_kebidanan'),
            'riwayat_penyakit_sekarang'     => safe_post('rps_medis_kebidanan'),
            'riwayat_penyakit_terdahulu'    => safe_post('rpt_medis_kebidanan'),
            'pengobatan'                    => safe_post('pengobatan_medis_kebidanan'),
            'riwayat_alergi'                => safe_post('riwayat_alergi_kebidanan'),
            // 'riwayat_pasien'                => safe_post('riwayat_alergi'),

            'riwayat_penyakit_keluarga' => json_encode([
                'rpk_medis_kebidanan'                    => safe_post('rpk_medis_kebidanan'),
                'rpk_medis_kebidanan'                    => safe_post('rpk_medis_kebidanan'),
                'rpk_medis_kebidanan_asma'               => safe_post('rpk_medis_kebidanan_asma'),
                'rpk_medis_kebidanan_dm'                 => safe_post('rpk_medis_kebidanan_dm'),
                'rpk_medis_kebidanan_cardiovascular'     => safe_post('rpk_medis_kebidanan_cardiovascular'),
                'rpk_medis_kebidanan_kanker'             => safe_post('rpk_medis_kebidanan_kanker'),
                'rpk_medis_kebidanan_thalasemia'         => safe_post('rpk_medis_kebidanan_thalasemia'),
                'rpk_medis_kebidanan_lain'               => safe_post('rpk_medis_kebidanan_lain'),
                'rpk_medis_kebidanan_lain_input'         => safe_post('rpk_medis_kebidanan_lain_input'),
            ]),

            // 'riwayat_pasien'                => safe_post('riwayat-field-neonatus'),

            'pf_tekanan_darah' => json_encode([
                'tekanan_darah_kebidanan_1' => safe_post('tekanan_darah_kebidanan_1') !== '' ? safe_post('tekanan_darah_kebidanan_1') : null,
                'tekanan_darah_kebidanan_2' => safe_post('tekanan_darah_kebidanan_2') !== '' ? safe_post('tekanan_darah_kebidanan_2') : null,
                'tekanan_darah_kebidanan_3' => safe_post('tekanan_darah_kebidanan_3') !== '' ? safe_post('tekanan_darah_kebidanan_3') : null,
            ]),

            'pf_frekuensi_nadi' => json_encode([
                'frekuensi_nadi_kebidanan_1' => safe_post('frekuensi_nadi_kebidanan_1') !== '' ? safe_post('frekuensi_nadi_kebidanan_1') : null,
                'frekuensi_nadi_kebidanan_2' => safe_post('frekuensi_nadi_kebidanan_2') !== '' ? safe_post('frekuensi_nadi_kebidanan_2') : null,
            ]),


            'kesadaran'                     => json_encode(array(
                'composmentis'              => safe_post('composmentis_medis_kebidanan'),
                'apatis'                    => safe_post('apatis_medis_kebidanan'),
                'samnolen'                  => safe_post('samnolen_medis_kebidanan'),
                'sopor'                     => safe_post('sopor_medis_kebidanan'),
                'koma'                      => safe_post('koma_medis_kebidanan'),
            )),

            'pf_kepala'                     => safe_post('pf_kepala_kebidanan'),
            'ket_pf_kepala'                 => safe_post('ket_pf_kepala_kebidanan'),
            'pf_mata'                       => safe_post('pf_mata_kebidanan'),
            'ket_pf_mata'                   => safe_post('ket_pf_mata_kebidanan'),
            'pf_hidung'                     => safe_post('pf_hidung_kebidanan'),
            'ket_pf_hidung'                 => safe_post('ket_pf_hidung_kebidanan'),
            'pf_gigi_mulut'                 => safe_post('pf_gigi_mulut_kebidanan'),
            'ket_pf_gigi_mulut'             => safe_post('ket_pf_gigi_mulut_kebidanan'),
            'pf_tenggorokan'                => safe_post('pf_tenggorokan_kebidanan'),
            'ket_pf_tenggorokan'            => safe_post('ket_pf_tenggorokan_kebidanan'),
            'pf_telinga'                    => safe_post('pf_telinga_kebidanan'),
            'ket_pf_telinga'                => safe_post('ket_pf_telinga_kebidanan'),
            'pf_leher'                      => safe_post('pf_leher_kebidanan'),
            'ket_pf_leher'                  => safe_post('ket_pf_leher_kebidanan'),
            'pf_thorax'                     => safe_post('pf_thorax_kebidanan'),
            'ket_pf_thorax'                 => safe_post('ket_pf_thorax_kebidanan'),
            'pf_jantung'                    => safe_post('pf_jantung_kebidanan'),
            'ket_pf_jantung'                => safe_post('ket_pf_jantung_kebidanan'),
            'pf_paru'                       => safe_post('pf_paru_kebidanan'),
            'ket_pf_paru'                   => safe_post('ket_pf_paru_kebidanan'),
            'pf_abdomen'                    => safe_post('pf_abdomen_kebidanan'),
            'ket_pf_abdomen'                => safe_post('ket_pf_abdomen_kebidanan'),
            'pf_genitalia_anus'             => safe_post('pf_genitalia_kebidanan'),
            'ket_pf_genitalia_anus'         => safe_post('ket_pf_genitalia_kebidanan'),
            'pf_ekstermitas'                => safe_post('pf_ekstermitas_kebidanan'),
            'ket_pf_ekstermitas'            => safe_post('ket_pf_ekstermitas_kebidanan'),
            'pf_kulit'                      => safe_post('pf_kulit_kebidanan'),
            'ket_pf_kulit'                  => safe_post('ket_pf_kulit_kebidanan'),


            'riwayat_field_bidan'     => safe_post('riwayat_bidan'),
            'hasil_laboratorium_bidan'     => safe_post('hasil_lab_bidan'),
            'hasil_radiologi_bidan'     => safe_post('hasil_rad_bidan'),
            'hasil_penunjang_lain_bidan'     => safe_post('hasil_pen_lain_bidan'),
            'diagnosa_awal_medis_bidan'     => safe_post('diag_awal_bidan'),


            'rd_bidan'     => safe_post('rd_bidan'),
            'rpp_bidan'     => safe_post('rpp_bidan'),
            'rt_bidan'     => safe_post('rt_bidan'),
            'rk_bidan'     => safe_post('rk_bidan'),

            'rp_bidan' => json_encode([
                'rp_bidan_1' => safe_post('rp_bidan_1') !== '' ? safe_post('rp_bidan_1') : null,
                'rp_bidan_2' => safe_post('rp_bidan_2') !== '' ? safe_post('rp_bidan_2') : null,
                'rp_bidan_3' => safe_post('rp_bidan_3') !== '' ? safe_post('rp_bidan_3') : null,
                'rp_bidan_4' => safe_post('rp_bidan_4') !== '' ? safe_post('rp_bidan_4') : null,
                // 'rp_bidan_5' => safe_post('rp_bidan_5') !== '' ? safe_post('rp_bidan_5') : null,
                'rp_bidan_5' => safe_post('rp_bidan_5') !== '' ? date('Y-m-d', strtotime(str_replace('/', '-', safe_post('rp_bidan_5')))) : NULL,
                // 'rp_bidan_5'        => (safe_post('rp_bidan_5') !== '' ? date2mysql(safe_post('rp_bidan_5')) : NULL),
            ]),

            'tgl_medis_dpjp' => (safe_post('tgl_medis_dpjp') !== '' ? datetime2mysql(safe_post('tgl_medis_dpjp')) : NULL),
            'ttd_medis_dpjp' => safe_post('ttd_medis_dpjp') !== '' ? safe_post('ttd_medis_dpjp') : NULL,
            'ceklis_dpjp' => safe_post('ceklis_dpjp') !== '' ? safe_post('ceklis_dpjp') : NULL,

            'tgl_medis_dokter' => (safe_post('tgl_medis_dokter') !== '' ? datetime2mysql(safe_post('tgl_medis_dokter')) : NULL),
            'ttd_medis_dokter' => safe_post('ttd_medis_dokter') !== '' ? safe_post('ttd_medis_dokter') : NULL,
            'ceklis_dokter' => safe_post('ceklis_dokter') !== '' ? safe_post('ceklis_dokter') : NULL,
        );

        // PENGKAJIAN MEDIS // PAKDK   // PAKDKM   
        $sign = $this->db->select('pakdk.tanggal_jam_bidan, pakdk.ttd_bidan, pakdk.tanggal_jam_dokter_keb, pakdk.ttd_dokter,
                                    pmakdk.tgl_medis_dpjp, pmakdk.ceklis_dpjp, pmakdk.tgl_medis_dokter, pmakdk.ceklis_dokter')

            ->from('sm_pengkajian_awal_kebidanan_dan_kandungan as pakdk')
            ->join('sm_pengkajian_medis_awal_kebidanan_dan_kandungan as pmakdk', 'pmakdk.id_layanan_pendaftaran = pakdk.id_layanan_pendaftaran')
            ->where('pakdk.id_layanan_pendaftaran', $id_layanan_pendaftaran)
            ->get()
            ->row();

        // DATA KAJIAN KEBIDANAN 
        if (isset($sign)) :
            // if ($sign->waktu_kajian_kebidanan !== NULL) :
            //     $data_kajian_kebidanan['waktu_kajian_kebidanan'] = $sign->waktu_kajian_kebidanan;
            // else :
            //     $data_kajian_kebidanan['waktu_kajian_kebidanan'] = (safe_post('waktu_kajian_kebidanan') !== '' ? datetime2mysql(safe_post('waktu_kajian_kebidanan')) : NULL);
            // endif;

            if ($sign->tanggal_jam_bidan !== NULL) :
                $data_kajian_kebidanan['tanggal_jam_bidan'] = $sign->tanggal_jam_bidan;
            else :
                $data_kajian_kebidanan['tanggal_jam_bidan'] = (safe_post('tanggal_jam_bidan') !== '' ? datetime2mysql(safe_post('tanggal_jam_bidan')) : NULL);
            endif;

            if ($sign->ttd_bidan !== NULL) :
                $data_kajian_kebidanan['ttd_bidan'] = $sign->ttd_bidan;
            else :
                $data_kajian_kebidanan['ttd_bidan'] = (safe_post('ttd_bidan') !== '' ? safe_post('ttd_bidan') : NULL);
            endif;

            if ($sign->tanggal_jam_dokter_keb !== NULL) :
                $data_kajian_kebidanan['tanggal_jam_dokter_keb'] = $sign->tanggal_jam_dokter_keb;
            else :
                $data_kajian_kebidanan['tanggal_jam_dokter_keb'] = (safe_post('tanggal_jam_dokter_keb') !== '' ? datetime2mysql(safe_post('tanggal_jam_dokter_keb')) : NULL);
            endif;

            if ($sign->ttd_dokter !== NULL) :
                $data_kajian_kebidanan['ttd_dokter'] = $sign->ttd_dokter;
            else :
                $data_kajian_kebidanan['ttd_dokter'] = (safe_post('ttd_dokter') !== '' ? safe_post('ttd_dokter') : NULL);
            endif;


            // DATA PENGKAJIAN MEDIS KEBIDANAN
            if ($sign->tgl_medis_dpjp !== NULL) :
                $data_kajian_medis_kebidanan['tgl_medis_dpjp'] = $sign->tgl_medis_dpjp;
            else :
                $data_kajian_medis_kebidanan['tgl_medis_dpjp'] = (safe_post('tgl_medis_dpjp') !== '' ? datetime2mysql(safe_post('tgl_medis_dpjp')) : NULL);
            endif;

            if ($sign->ceklis_dpjp !== NULL) :
                $data_kajian_medis_kebidanan['ceklis_dpjp'] = $sign->ceklis_dpjp;
            else :
                $data_kajian_medis_kebidanan['ceklis_dpjp'] = (safe_post('ceklis_dpjp') !== '' ? safe_post('ceklis_dpjp') : NULL);
            endif;

            if ($sign->tgl_medis_dokter !== NULL) :
                $data_kajian_medis_kebidanan['tgl_medis_dokter'] = $sign->tgl_medis_dokter;
            else :
                $data_kajian_medis_kebidanan['tgl_medis_dokter'] = (safe_post('tgl_medis_dokter') !== '' ? datetime2mysql(safe_post('tgl_medis_dokter')) : NULL);
            endif;

            if ($sign->ceklis_dokter !== NULL) :
                $data_kajian_medis_kebidanan['ceklis_dokter'] = $sign->ceklis_dokter;
            else :
                $data_kajian_medis_kebidanan['ceklis_dokter'] = (safe_post('ceklis_dokter') !== '' ? safe_post('ceklis_dokter') : NULL);
            endif;

        else :
            $data_kajian_kebidanan['tanggal_jam_bidan'] = (safe_post('tanggal_jam_bidan') !== '' ? datetime2mysql(safe_post('tanggal_jam_bidan')) : NULL);
            $data_kajian_kebidanan['ttd_bidan'] = (safe_post('ttd_bidan') !== '' ? safe_post('ttd_bidan') : NULL);
            $data_kajian_kebidanan['tanggal_jam_dokter_keb'] = (safe_post('tanggal_jam_dokter_keb') !== '' ? datetime2mysql(safe_post('tanggal_jam_dokter_keb')) : NULL);
            $data_kajian_kebidanan['ttd_dokter'] = (safe_post('ttd_dokter') !== '' ? safe_post('ttd_dokter') : NULL);

            $data_kajian_medis_kebidanan['tgl_medis_dpjp'] = (safe_post('tgl_medis_dpjp') !== '' ? datetime2mysql(safe_post('tgl_medis_dpjp')) : NULL);
            $data_kajian_medis_kebidanan['ceklis_dpjp'] = (safe_post('ceklis_dpjp') !== '' ? safe_post('ceklis_dpjp') : NULL);
            $data_kajian_medis_kebidanan['tgl_medis_dokter'] = (safe_post('tgl_medis_dokter') !== '' ? datetime2mysql(safe_post('tgl_medis_dokter')) : NULL);
            $data_kajian_medis_kebidanan['ceklis_dokter'] = (safe_post('ceklis_dokter') !== '' ? safe_post('ceklis_dokter') : NULL);
        endif;
        $response = $this->m_rawat_inap->updatePengkajianAwalKebidanan($data_kajian_kebidanan, $data_kajian_medis_kebidanan, $id_kajian_kebidanan, $id_kajian_medis_kebidanan);
        $this->response($response, REST_Controller::HTTP_OK);
    }


    // PAKDK
    function get_data_pengkajian_awal_kebidanan_get()
    {
        if (!$this->get('id_layanan_pendaftaran')) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
        endif;

        $this->load->model('pendaftaran/Pendaftaran_model', 'm_pendaftaran');
        $this->load->model('pelayanan/Pelayanan_model', 'm_pelayanan');
        $data                                       = $this->m_pendaftaran->getPendaftaranDetail($this->get('id', true), $this->get('id_layanan', true));
        $data['profil']                             = $this->m_pelayanan->getProfilPasien($data['pasien']->id_pasien);
        $data['kajian_kebidanan']                   = $this->m_rawat_inap->getKajianKebidanan($this->get('id', true));
        $data['kajian_kebidanan_logs']              = $this->m_rawat_inap->getKajianKebidananLogs($this->get('id', true));
        $data['kajian_medis_kebidanan']             = $this->m_rawat_inap->getKajianMedisKebidanan($this->get('id', true));
        $data['kajian_medis_kebidanan_logs']        = $this->m_rawat_inap->getKajianMedisKebidananLogs($this->get('id', true));
        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK); // (200)
        endif;
    }


    // PAKDK LOGS
    function get_history_logs_pengkajian_awal_kebidanan_get()
    {
        if (!$this->get('id_layanan_pendaftaran', true)) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
        endif;
        $id_layanan_pendaftaran = $this->get('id_layanan_pendaftaran', true);
        $data['kajian_kebidanan_logs']          = $this->m_rawat_inap->getKajianKebidananLogs($id_layanan_pendaftaran);
        $data['kajian_medis_kebidanan_logs']    = $this->m_rawat_inap->getKajianMedisKebidananLogs($id_layanan_pendaftaran);
        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK); // (200)
        endif;
    }































    // PAN
    function get_data_pengkajian_awal_neonatus_get(){
        if (!$this->get('id_layanan_pendaftaran')) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
        endif;
        $this->load->model('pendaftaran/Pendaftaran_model', 'm_pendaftaran');
        $this->load->model('pelayanan/Pelayanan_model', 'm_pelayanan');
        $data                               = $this->m_pendaftaran->getPendaftaranDetail($this->get('id', true), $this->get('id_layanan', true));
        $data['profil']                     = $this->m_pelayanan->getProfilPasien($data['pasien']->id_pasien);
        $data['kajian_neonatus']            = $this->m_rawat_inap->getKajianNeonatus($this->get('id', true));
        $data['kajian_neonatus_logs']       = $this->m_rawat_inap->getKajianNeonatusLogs($this->get('id', true));
        $data['kajian_medis_neonatus']      = $this->m_rawat_inap->getKajianMedisNeonatus($this->get('id', true));
        $data['kajian_medis_neonatus_logs'] = $this->m_rawat_inap->getKajianMedisNeonatusLogs($this->get('id', true));
        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK); // (200)
        endif;
    }


    // PAN LOGS 
    function get_history_logs_pengkajian_awal_neonatus_get(){
        if (!$this->get('id_layanan_pendaftaran', true)) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
        endif;
        $id_layanan_pendaftaran = $this->get('id_layanan_pendaftaran', true);
        $data['kajian_neonatus_logs']       = $this->m_rawat_inap->getKajianNeonatusLogs($id_layanan_pendaftaran);
        // $data['kajian_medis_neonatus_logs'] = $this->m_rawat_inap->getKajianMedisNeonatusLogs($id_layanan_pendaftaran);
        // var_dump($data);die;
        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK); // (200)
        endif;
    }



    // SIMPAN // PAN
    function simpan_pengkajian_awal_neonatus_post()
    {
        if (safe_post('id_layanan_pendaftaran') === '') :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
        endif;

        $id_layanan_pendaftaran = safe_post('id_layanan_pendaftaran');
        $id_pendaftaran = safe_post('id_pendaftaran');;
        $id_kajian_neonatus = safe_post('id_kajian_neonatus');
        $id_user = safe_post('id_user');

        $data_kajian_neonatus = array(
            'id_layanan_pendaftaran' => $id_layanan_pendaftaran,
            'id_pendaftaran' => $id_pendaftaran,
            'id_users' => $id_user,

            'tanggal_jam_pengkajian' => (safe_post('waktu_pengkajian_neonatus') !== '' ? datetime2mysql(safe_post('waktu_pengkajian_neonatus')) : NULL),
            'membawa_obat' => safe_post('membawa_obat') !== '' ? safe_post('membawa_obat') : null,

            'cara_masuk_irj_neonatus' => safe_post('cara_masuk_irj_neonatus') !== '' ? safe_post('cara_masuk_irj_neonatus') : null,
            'cara_masuk_igd_neonatus' => safe_post('cara_masuk_igd_neonatus') !== '' ? safe_post('cara_masuk_igd_neonatus') : null,
            'cara_masuk_lain_neonatus' => safe_post('cara_masuk_lain_neonatus') !== '' ? safe_post('cara_masuk_lain_neonatus') : null,
            'cara_masuk_lain_lain_neonatus' => safe_post('cara_masuk_lain_lain_neonatus') !== '' ? safe_post('cara_masuk_lain_lain_neonatus') : null,

            // DATA AYAH
            'nama_ayah' => json_encode([
                'data_ayah_1' => safe_post('data_ayah_1') !== '' ? safe_post('data_ayah_1') : null,
                'data_ayah_2' => safe_post('data_ayah_2') !== '' ? safe_post('data_ayah_2') : null,
                'data_ayah_3' => safe_post('data_ayah_3') !== '' ? safe_post('data_ayah_3') : null,
                'data_ayah_4' => safe_post('data_ayah_4') !== '' ? safe_post('data_ayah_4') : null,
                'data_ayah_5' => safe_post('data_ayah_5') !== '' ? safe_post('data_ayah_5') : null,
                'data_ayah_6' => safe_post('data_ayah_6') !== '' ? safe_post('data_ayah_6') : null,
                'data_ayah_7' => safe_post('data_ayah_7') !== '' ? safe_post('data_ayah_7') : null,
            ]),

            // DATA IBU
            'nama_ibu' => json_encode([
                'data_ibu_1' => safe_post('data_ibu_1') !== '' ? safe_post('data_ibu_1') : null,
                'data_ibu_2' => safe_post('data_ibu_2') !== '' ? safe_post('data_ibu_2') : null,
                'data_ibu_3' => safe_post('data_ibu_3') !== '' ? safe_post('data_ibu_3') : null,
                'data_ibu_4' => safe_post('data_ibu_4') !== '' ? safe_post('data_ibu_4') : null,
                'data_ibu_5' => safe_post('data_ibu_5') !== '' ? safe_post('data_ibu_5') : null,
                'data_ibu_6' => safe_post('data_ibu_6') !== '' ? safe_post('data_ibu_6') : null,
                'data_ibu_7' => safe_post('data_ibu_7') !== '' ? safe_post('data_ibu_7') : null,
            ]),

            // RIWAYAT KEHAMILAN DAN PERSALINAN IBU NEONATUS 
            'riwayat_kehamilan_persalinan' => json_encode([
                'riwayat_kdpi_1' => safe_post('riwayat_kdpi_1') !== '' ? safe_post('riwayat_kdpi_1') : null,
                'riwayat_kdpi_2' => safe_post('riwayat_kdpi_2') !== '' ? safe_post('riwayat_kdpi_2') : null,
                'riwayat_kdpi_3' => safe_post('riwayat_kdpi_3') !== '' ? safe_post('riwayat_kdpi_3') : null,
                'riwayat_kdpi_4' => safe_post('riwayat_kdpi_4') !== '' ? safe_post('riwayat_kdpi_4') : null,
                'riwayat_kdpi_5' => safe_post('riwayat_kdpi_5') !== '' ? safe_post('riwayat_kdpi_5') : null,
                'riwayat_kdpi_6' => safe_post('riwayat_kdpi_6') !== '' ? safe_post('riwayat_kdpi_6') : null,
                'riwayat_kdpi_7' => safe_post('riwayat_kdpi_7') !== '' ? safe_post('riwayat_kdpi_7') : null,
            ]),

            // RIWAYAT KELAHIRAN BAYI 1
            'tanggal_lahir_riwayat' => (safe_post('tangggal_riwayat_kelahiran_bayi') !== '' ? datetime2mysql(safe_post('tangggal_riwayat_kelahiran_bayi')) : NULL),
            'riwayat_kehamilan_bayi' => json_encode([
                'riwayat_kb_1' => safe_post('riwayat_kb_1') !== '' ? safe_post('riwayat_kb_1') : null,
                'riwayat_kb_2' => safe_post('riwayat_kb_2') !== '' ? safe_post('riwayat_kb_2') : null,
                'riwayat_kb_3' => safe_post('riwayat_kb_3') !== '' ? safe_post('riwayat_kb_3') : null,
                'riwayat_kb_4' => safe_post('riwayat_kb_4') !== '' ? safe_post('riwayat_kb_4') : null,
                'riwayat_kb_5' => safe_post('riwayat_kb_5') !== '' ? safe_post('riwayat_kb_5') : null,
            ]),
            // RIWAYAT KELAHIRAN BAYI 2
            'riwayat_kehamilan_bayii' => json_encode([
                'riwayat_kb_6' => safe_post('riwayat_kb_6') !== '' ? safe_post('riwayat_kb_6') : null,
                'riwayat_kb_7' => safe_post('riwayat_kb_7') !== '' ? safe_post('riwayat_kb_7') : null,
                'riwayat_kb_8' => safe_post('riwayat_kb_8') !== '' ? safe_post('riwayat_kb_8') : null,
                'riwayat_kb_9' => safe_post('riwayat_kb_9') !== '' ? safe_post('riwayat_kb_9') : null,
                'riwayat_kb_10' => safe_post('riwayat_kb_10') !== '' ? safe_post('riwayat_kb_10') : null,
                'riwayat_kb_11' => safe_post('riwayat_kb_11') !== '' ? safe_post('riwayat_kb_11') : null,
            ]),

            // APGAR SCORE 
            // FREKUENSI JANTUNG NEONATUS A
            'apgar_frekuensi_jantung' => json_encode([
                'apgar_frekuensi_1' => safe_post('apgar_frekuensi_1') !== '' ? safe_post('apgar_frekuensi_1') : null,
                'apgar_frekuensi_2' => safe_post('apgar_frekuensi_2') !== '' ? safe_post('apgar_frekuensi_2') : null,
                'apgar_frekuensi_3' => safe_post('apgar_frekuensi_3') !== '' ? safe_post('apgar_frekuensi_3') : null,
                'apgar_frekuensi_4' => safe_post('apgar_frekuensi_4') !== '' ? safe_post('apgar_frekuensi_4') : null,
                'apgar_frekuensi_6' => safe_post('apgar_frekuensi_6') !== '' ? safe_post('apgar_frekuensi_6') : null,
            ]),


            // USAHA NAFAS NEONATUS
            'apgar_usaha_nafas' => json_encode([
                'apgar_usaha_1' => safe_post('apgar_usaha_1') !== '' ? safe_post('apgar_usaha_1') : null,
                'apgar_usaha_2' => safe_post('apgar_usaha_2') !== '' ? safe_post('apgar_usaha_2') : null,
                'apgar_usaha_3' => safe_post('apgar_usaha_3') !== '' ? safe_post('apgar_usaha_3') : null,
                'apgar_usaha_4' => safe_post('apgar_usaha_4') !== '' ? safe_post('apgar_usaha_4') : null,
                'apgar_usaha_6' => safe_post('apgar_usaha_6') !== '' ? safe_post('apgar_usaha_6') : null,
            ]),


            // TONUS OTOT NEONATUS
            'apgar_tonus_otot' => json_encode([
                'apgar_tonus_1' => safe_post('apgar_tonus_1') !== '' ? safe_post('apgar_tonus_1') : null,
                'apgar_tonus_2' => safe_post('apgar_tonus_2') !== '' ? safe_post('apgar_tonus_2') : null,
                'apgar_tonus_3' => safe_post('apgar_tonus_3') !== '' ? safe_post('apgar_tonus_3') : null,
                'apgar_tonus_4' => safe_post('apgar_tonus_4') !== '' ? safe_post('apgar_tonus_4') : null,
                'apgar_tonus_6' => safe_post('apgar_tonus_6') !== '' ? safe_post('apgar_tonus_6') : null,
            ]),

            // REFLEKSI NEONATUS
            'apgar_refleksi' => json_encode([
                'apgar_refleksi_1' => safe_post('apgar_refleksi_1') !== '' ? safe_post('apgar_refleksi_1') : null,
                'apgar_refleksi_2' => safe_post('apgar_refleksi_2') !== '' ? safe_post('apgar_refleksi_2') : null,
                'apgar_refleksi_3' => safe_post('apgar_refleksi_3') !== '' ? safe_post('apgar_refleksi_3') : null,
                'apgar_refleksi_4' => safe_post('apgar_refleksi_4') !== '' ? safe_post('apgar_refleksi_4') : null,
                'apgar_refleksi_6' => safe_post('apgar_refleksi_6') !== '' ? safe_post('apgar_refleksi_6') : null,
            ]),

            // TONUS OTOT NEONATUS
            'apgar_warna' => json_encode([
                'apgar_warna_1' => safe_post('apgar_warna_1') !== '' ? safe_post('apgar_warna_1') : null,
                'apgar_warna_2' => safe_post('apgar_warna_2') !== '' ? safe_post('apgar_warna_2') : null,
                'apgar_warna_3' => safe_post('apgar_warna_3') !== '' ? safe_post('apgar_warna_3') : null,
                'apgar_warna_4' => safe_post('apgar_warna_4') !== '' ? safe_post('apgar_warna_4') : null,
                'apgar_warna_6' => safe_post('apgar_warna_6') !== '' ? safe_post('apgar_warna_6') : null,
            ]),

            // SKOR 1 NEONATUS
            'apgar_skor_1' => json_encode([
                'total_skor_1' => safe_post('total_skor_1') !== '' ? safe_post('total_skor_1') : null,
                'total_skor_1_1' => safe_post('total_skor_1_1') !== '' ? safe_post('total_skor_1_1') : null,
                'total_skor_1_1_1' => safe_post('total_skor_1_1_1') !== '' ? safe_post('total_skor_1_1_1') : null,
                'total_skor_1_1_1_1' => safe_post('total_skor_1_1_1_1') !== '' ? safe_post('total_skor_1_1_1_1') : null,
                'total_skor_1_1_1_1_1' => safe_post('total_skor_1_1_1_1_1') !== '' ? safe_post('total_skor_1_1_1_1_1') : null,
            ]),

            // SKOR 2 NEONATUS
            'apgar_skor_2' => json_encode([
                'total_skor_2' => safe_post('total_skor_2') !== '' ? safe_post('total_skor_2') : null,
                'total_skor_2_2' => safe_post('total_skor_2_2') !== '' ? safe_post('total_skor_2_2') : null,
                'total_skor_2_2_2' => safe_post('total_skor_2_2_2') !== '' ? safe_post('total_skor_2_2_2') : null,
                'total_skor_2_2_2_2' => safe_post('total_skor_2_2_2_2') !== '' ? safe_post('total_skor_2_2_2_2') : null,
                'total_skor_2_2_2_2_2' => safe_post('total_skor_2_2_2_2_2') !== '' ? safe_post('total_skor_2_2_2_2_2') : null,
            ]),


            // PEMERIKSAAN FISIK DAN TANDA ATANDA FITAL NEONATUS
            'pemeriksaan_fisik_dan_ttv' => json_encode([
                'pemeriksaan_fdttl_1' => safe_post('pemeriksaan_fdttl_1') !== '' ? safe_post('pemeriksaan_fdttl_1') : null,
                'pemeriksaan_fdttl_2' => safe_post('pemeriksaan_fdttl_2') !== '' ? safe_post('pemeriksaan_fdttl_2') : null,
                'pemeriksaan_fdttl_3' => safe_post('pemeriksaan_fdttl_3') !== '' ? safe_post('pemeriksaan_fdttl_3') : null,
                'pemeriksaan_fdttl_4' => safe_post('pemeriksaan_fdttl_4') !== '' ? safe_post('pemeriksaan_fdttl_4') : null,
            ]),

            // PENGKAJIAN NYERI NEONATUS 1
            'neonatusj' => json_encode([
                'menangisj'  => safe_post('menangisj') !== '' ? safe_post('menangisj') : null,
                'spoj'       => safe_post('spoj') !== '' ? safe_post('spoj') : null,
                'vitalj'     => safe_post('vitalj') !== '' ? safe_post('vitalj') : null,
                'wajahj'     => safe_post('wajahj') !== '' ? safe_post('wajahj') : null,
                'tidurj'     => safe_post('tidurj') !== '' ? safe_post('tidurj') : null,
                'total_neonatusj' => safe_post('total_neonatusj') !== '' ? safe_post('total_neonatusj') : null,
            ]),

            // KETERANGAN NYERI AWAL
            'ket_nyerii' => json_encode([
                'ptn_keterangan' => safe_post('ptn_keterangan') !== '' ? safe_post('ptn_keterangan') : null,

            ]),

            // PENGKAJIAN NYERI NEONATUS  2
            // KEPALA
            'pengkajian_nyeri_kepala' => json_encode([
                'kepalaa_1' => safe_post('kepalaa_1') !== '' ? safe_post('kepalaa_1') : null,
                'kepalaa_2' => safe_post('kepalaa_2') !== '' ? safe_post('kepalaa_2') : null,
                'kepalaa_3' => safe_post('kepalaa_3') !== '' ? safe_post('kepalaa_3') : null,
                'kepalaa_4' => safe_post('kepalaa_4') !== '' ? safe_post('kepalaa_4') : null,
                'kepalaa_5' => safe_post('kepalaa_5') !== '' ? safe_post('kepalaa_5') : null,
                'kepalaa_6' => safe_post('kepalaa_6') !== '' ? safe_post('kepalaa_6') : null,
                'kepalaa_7' => safe_post('kepalaa_7') !== '' ? safe_post('kepalaa_7') : null,
                'kepalaa_8' => safe_post('kepalaa_8') !== '' ? safe_post('kepalaa_8') : null,
                'kepalaa_9' => safe_post('kepalaa_9') !== '' ? safe_post('kepalaa_9') : null,
                'kepalaa_10' => safe_post('kepalaa_10') !== '' ? safe_post('kepalaa_10') : null,
                'kepalaa_11' => safe_post('kepalaa_11') !== '' ? safe_post('kepalaa_11') : null,
                'kepalaa_12' => safe_post('kepalaa_11') !== '' ? safe_post('kepalaa_11') : null,
                'kepalaa_13' => safe_post('kepalaa_13') !== '' ? safe_post('kepalaa_13') : null,
                'kepalaa_14' => safe_post('kepalaa_14') !== '' ? safe_post('kepalaa_14') : null,
            ]),

            // MATA
            'pengkajian_nyeri_mata' => json_encode([
                'mataa_1' => safe_post('mataa_1') !== '' ? safe_post('mataa_1') : null,
                'mataa_2' => safe_post('mataa_2') !== '' ? safe_post('mataa_2') : null,
                'mataa_3' => safe_post('mataa_3') !== '' ? safe_post('mataa_3') : null,
                'mataa_4' => safe_post('mataa_4') !== '' ? safe_post('mataa_4') : null,
                'mataa_5' => safe_post('mataa_5') !== '' ? safe_post('mataa_5') : null,
                'mataa_6' => safe_post('mataa_6') !== '' ? safe_post('mataa_6') : null,
                'mataa_7' => safe_post('mataa_7') !== '' ? safe_post('mataa_7') : null,
                'mataa_8' => safe_post('mataa_8') !== '' ? safe_post('mataa_8') : null,
                'mataa_9' => safe_post('mataa_9') !== '' ? safe_post('mataa_9') : null,
                'mataa_10' => safe_post('mataa_10') !== '' ? safe_post('mataa_10') : null,
                'mataa_11' => safe_post('mataa_11') !== '' ? safe_post('mataa_11') : null,
            ]),

            // THT 
            'pengkajian_nyeri_tht' => json_encode([
                'tht_1' => safe_post('tht_1') !== '' ? safe_post('tht_1') : null,
                'tht_2' => safe_post('tht_2') !== '' ? safe_post('tht_2') : null,
                'tht_3' => safe_post('tht_3') !== '' ? safe_post('tht_3') : null,
                'tht_4' => safe_post('tht_4') !== '' ? safe_post('tht_4') : null,
                'tht_5' => safe_post('tht_5') !== '' ? safe_post('tht_5') : null,
                'tht_6' => safe_post('tht_6') !== '' ? safe_post('tht_6') : null,
            ]),

            // MULUT
            'pengkajian_nyeri_mulut' => json_encode([
                'mulut_1' => safe_post('mulut_1') !== '' ? safe_post('mulut_1') : null,
                'mulut_2' => safe_post('mulut_2') !== '' ? safe_post('mulut_2') : null,
                'mulut_3' => safe_post('mulut_3') !== '' ? safe_post('mulut_3') : null,
                'mulut_4' => safe_post('mulut_4') !== '' ? safe_post('mulut_4') : null,
                'mulut_5' => safe_post('mulut_5') !== '' ? safe_post('mulut_5') : null,
                'mulut_6' => safe_post('mulut_6') !== '' ? safe_post('mulut_6') : null,
                'mulut_7' => safe_post('mulut_7') !== '' ? safe_post('mulut_7') : null,
            ]),

            // GIGI
            'pengkajian_nyeri_gigi' => json_encode([
                'gigi_1' => safe_post('gigi_1') !== '' ? safe_post('gigi_1') : null,
                'gigi_2' => safe_post('gigi_2') !== '' ? safe_post('gigi_2') : null,
                'gigi_3' => safe_post('gigi_3') !== '' ? safe_post('gigi_3') : null,
            ]),

            // LEHER
            'pengkajian_nyeri_leher' => json_encode([
                'leher_1' => safe_post('leher_1') !== '' ? safe_post('leher_1') : null,
                'leher_2' => safe_post('leher_2') !== '' ? safe_post('leher_2') : null,
                'leher_3' => safe_post('leher_3') !== '' ? safe_post('leher_3') : null,
            ]),

            // DADA
            'pengkajian_nyeri_dada' => json_encode([
                'dada_1' => safe_post('dada_1') !== '' ? safe_post('dada_1') : null,
                'dada_2' => safe_post('dada_2') !== '' ? safe_post('dada_2') : null,
                'dada_3' => safe_post('dada_3') !== '' ? safe_post('dada_3') : null,
                'dada_4' => safe_post('dada_4') !== '' ? safe_post('dada_4') : null,
                'dada_5' => safe_post('dada_5') !== '' ? safe_post('dada_5') : null,
                'dada_6' => safe_post('dada_6') !== '' ? safe_post('dada_6') : null,
                'dada_7' => safe_post('dada_7') !== '' ? safe_post('dada_7') : null,
            ]),

            // PARU - PARU
            'pengkajian_nyeri_paru_paru' => json_encode([
                'paru_1' => safe_post('paru_1') !== '' ? safe_post('paru_1') : null,
                'paru_2' => safe_post('paru_2') !== '' ? safe_post('paru_2') : null,
                'paru_3' => safe_post('paru_3') !== '' ? safe_post('paru_3') : null,
                'paru_4' => safe_post('paru_4') !== '' ? safe_post('paru_4') : null,
                'paru_5' => safe_post('paru_5') !== '' ? safe_post('paru_5') : null,
                'paru_6' => safe_post('paru_6') !== '' ? safe_post('paru_6') : null,
                'paru_7' => safe_post('paru_7') !== '' ? safe_post('paru_7') : null,
                'paru_8' => safe_post('paru_8') !== '' ? safe_post('paru_8') : null,
                'paru_9' => safe_post('paru_9') !== '' ? safe_post('paru_9') : null,
                'paru_10' => safe_post('paru_10') !== '' ? safe_post('paru_10') : null,
                'paru_11' => safe_post('paru_11') !== '' ? safe_post('paru_11') : null,
                'paru_12' => safe_post('paru_12') !== '' ? safe_post('paru_12') : null,
                'paru_13' => safe_post('paru_13') !== '' ? safe_post('paru_13') : null,
                'paru_14' => safe_post('paru_14') !== '' ? safe_post('paru_14') : null,
                'paru_15' => safe_post('paru_15') !== '' ? safe_post('paru_15') : null,
                'paru_16' => safe_post('paru_16') !== '' ? safe_post('paru_16') : null,
                'paru_17' => safe_post('paru_17') !== '' ? safe_post('paru_17') : null,
                'paru_18' => safe_post('paru_18') !== '' ? safe_post('paru_18') : null,
                'paru_19' => safe_post('paru_19') !== '' ? safe_post('paru_19') : null,
                'paru_20' => safe_post('paru_20') !== '' ? safe_post('paru_20') : null,
                'paru_20' => safe_post('paru_20') !== '' ? safe_post('paru_20') : null,
                'paru_22' => safe_post('paru_22') !== '' ? safe_post('paru_22') : null,
                'paru_23' => safe_post('paru_23') !== '' ? safe_post('paru_23') : null,
                'paru_24' => safe_post('paru_24') !== '' ? safe_post('paru_24') : null,
                'paru_25' => safe_post('paru_25') !== '' ? safe_post('paru_25') : null,
            ]),

            // JANTUNG
            'pengkajian_nyeri_jantung' => json_encode([
                'jantung_1' => safe_post('jantung_1') !== '' ? safe_post('jantung_1') : null,
                'jantung_2' => safe_post('jantung_2') !== '' ? safe_post('jantung_2') : null,
                'jantung_3' => safe_post('jantung_3') !== '' ? safe_post('jantung_3') : null,
                'jantung_4' => safe_post('jantung_4') !== '' ? safe_post('jantung_4') : null,
            ]),

            // EXTREMITAS ATAS
            'pengkajian_nyeri_extremitas_atas' => json_encode([
                'extremitas_1' => safe_post('extremitas_1') !== '' ? safe_post('extremitas_1') : null,
                'extremitas_2' => safe_post('extremitas_2') !== '' ? safe_post('extremitas_2') : null,
                'extremitas_3' => safe_post('extremitas_3') !== '' ? safe_post('extremitas_3') : null,
                'extremitas_4' => safe_post('extremitas_4') !== '' ? safe_post('extremitas_4') : null,
                'extremitas_5' => safe_post('extremitas_5') !== '' ? safe_post('extremitas_5') : null,
                'extremitas_6' => safe_post('extremitas_6') !== '' ? safe_post('extremitas_6') : null,
                'extremitas_7' => safe_post('extremitas_7') !== '' ? safe_post('extremitas_7') : null,
            ]),

            // EXTREMITAS ATAS
            'pengkajian_nyeri_abdomen' => json_encode([
                'ardomen_1' => safe_post('ardomen_1') !== '' ? safe_post('ardomen_1') : null,
                'ardomen_2' => safe_post('ardomen_2') !== '' ? safe_post('ardomen_2') : null,
                'ardomen_3' => safe_post('ardomen_3') !== '' ? safe_post('ardomen_3') : null,
                'ardomen_4' => safe_post('ardomen_4') !== '' ? safe_post('ardomen_4') : null,
                'ardomen_5' => safe_post('ardomen_5') !== '' ? safe_post('ardomen_5') : null,
                'ardomen_6' => safe_post('ardomen_6') !== '' ? safe_post('ardomen_6') : null,
                'ardomen_7' => safe_post('ardomen_7') !== '' ? safe_post('ardomen_7') : null,
                'ardomen_8' => safe_post('ardomen_8') !== '' ? safe_post('ardomen_8') : null,
            ]),

            // UMBILIKAL 
            'pengkajian_nyeri_umbilikal' => json_encode([
                'umbilikal_1' => safe_post('umbilikal_1') !== '' ? safe_post('umbilikal_1') : null,
                'umbilikal_2' => safe_post('umbilikal_2') !== '' ? safe_post('umbilikal_2') : null,
                'umbilikal_3' => safe_post('umbilikal_3') !== '' ? safe_post('umbilikal_3') : null,
                'umbilikal_4' => safe_post('umbilikal_4') !== '' ? safe_post('umbilikal_4') : null,
            ]),

            // GENETALIA
            'pengkajian_nyeri_genetalia' => json_encode([
                'genetalia_1' => safe_post('genetalia_1') !== '' ? safe_post('genetalia_1') : null,
                'genetalia_2' => safe_post('genetalia_2') !== '' ? safe_post('genetalia_2') : null,
                'genetalia_3' => safe_post('genetalia_3') !== '' ? safe_post('genetalia_3') : null,
                'genetalia_4' => safe_post('genetalia_4') !== '' ? safe_post('genetalia_4') : null,
            ]),

            // ANUS
            'pengkajian_nyeri_anus' => json_encode([
                'anus_1' => safe_post('anus_1') !== '' ? safe_post('anus_1') : null,
                'anus_1' => safe_post('anus_1') !== '' ? safe_post('anus_1') : null,
            ]),

            // KULIT
            'pengkajian_nyeri_kulit' => json_encode([
                'kulit_1' => safe_post('kulit_1') !== '' ? safe_post('kulit_1') : null,
                'kulit_2' => safe_post('kulit_2') !== '' ? safe_post('kulit_2') : null,
                'kulit_3' => safe_post('kulit_3') !== '' ? safe_post('kulit_3') : null,
                'kulit_4' => safe_post('kulit_4') !== '' ? safe_post('kulit_4') : null,
                'kulit_5' => safe_post('kulit_5') !== '' ? safe_post('kulit_5') : null,
                'kulit_6' => safe_post('kulit_6') !== '' ? safe_post('kulit_6') : null,
                'kulit_7' => safe_post('kulit_7') !== '' ? safe_post('kulit_7') : null,
                'kulit_8' => safe_post('kulit_8') !== '' ? safe_post('kulit_8') : null,
            ]),

            // REFLEKS
            'pengkajian_nyeri_refleks' => json_encode([
                'refleks_1' => safe_post('refleks_1') !== '' ? safe_post('refleks_1') : null,
                'refleks_2' => safe_post('refleks_2') !== '' ? safe_post('refleks_2') : null,
                'refleks_3' => safe_post('refleks_3') !== '' ? safe_post('refleks_3') : null,
                'refleks_4' => safe_post('refleks_4') !== '' ? safe_post('refleks_4') : null,
                'refleks_5' => safe_post('refleks_5') !== '' ? safe_post('refleks_5') : null,
                'refleks_6' => safe_post('refleks_6') !== '' ? safe_post('refleks_6') : null,
            ]),

            // TONUS OTOT 
            'pengkajian_nyeri_otot_tonus' => json_encode([
                'tonus_1' => safe_post('tonus_1') !== '' ? safe_post('tonus_1') : null,
                'tonus_2' => safe_post('tonus_2') !== '' ? safe_post('tonus_2') : null,
                'tonus_3' => safe_post('tonus_3') !== '' ? safe_post('tonus_3') : null,
                'tonus_4' => safe_post('tonus_4') !== '' ? safe_post('tonus_4') : null,
                'tonus_5' => safe_post('tonus_5') !== '' ? safe_post('tonus_5') : null,
                'tonus_6' => safe_post('tonus_6') !== '' ? safe_post('tonus_6') : null,
                'tonus_7' => safe_post('tonus_7') !== '' ? safe_post('tonus_7') : null,
                'tonus_8' => safe_post('tonus_8') !== '' ? safe_post('tonus_8') : null,
            ]),

            // EKSTREMITAS BAWAH
            'pengkajian_nyeri_ektremitas_bawah' => json_encode([
                'extremitass_1' => safe_post('extremitass_1') !== '' ? safe_post('extremitass_1') : null,
                'extremitass_2' => safe_post('extremitass_2') !== '' ? safe_post('extremitass_2') : null,
                'extremitass_3' => safe_post('extremitass_3') !== '' ? safe_post('extremitass_3') : null,
                'extremitass_4' => safe_post('extremitass_4') !== '' ? safe_post('extremitass_4') : null,
                'extremitass_5' => safe_post('extremitass_5') !== '' ? safe_post('extremitass_5') : null,
            ]),

            // SKALA EARLY WARNING SYSTEM EWS NEONATUS
            // 'pews_suhu' => (safe_post('suhupews') !== '' ? safe_post('suhupews') : NULL),
            // 'pews_pernafasan' => (safe_post('pernafasanpews') !== '' ? safe_post('pernafasanpews') : NULL),
            // 'pews_alat_bantu' => (safe_post('alatpews') !== '' ? safe_post('alatpews') : NULL),
            // 'pews_saturasi' => (safe_post('saturasipews') !== '' ? safe_post('saturasipews') : NULL),
            // 'pews_nadi' => (safe_post('nadipews') !== '' ? safe_post('nadipews') : NULL),
            // 'pews_warna_kulit' => (safe_post('warnapews') !== '' ? safe_post('warnapews') : NULL),
            // 'pews_tds' => (safe_post('tdspews') !== '' ? safe_post('tdspews') : NULL),
            // 'pews_kesadaran' => (safe_post('kesadaranpews') !== '' ? safe_post('kesadaranpews') : NULL),
            // 'pews_total' => (safe_post('total_skalapews') !== '' ? safe_post('total_skalapews') : NULL),

            'pews_pernafasan'  => safe_post('neurobehavirol'),
            'pews_alat_bantu'  => safe_post('nadiqy'),
            'pews_saturasi'    => safe_post('respirasqy'),
            'pews_nadi'        => safe_post('warnaulity'),
            'pews_warna_kulit' => safe_post('suhuqy'),
            'pews_tds'         => safe_post('merintihqy'),
            'pews_total'       => safe_post('total_calsnews'),

            // SKRINING AKHIR KEHIDUPAN NEONATUS
            'skrining_usia' => (safe_post('spak_1_neonatus_ya') !== '' ? safe_post('spak_1_neonatus_ya') : NULL),
            'skrining_nafas' => (safe_post('spak_2_neonatus_ya') !== '' ? safe_post('spak_2_neonatus_ya') : NULL),
            'skrining_sepsis' => (safe_post('spak_3_neonatus_ya') !== '' ? safe_post('spak_3_neonatus_ya') : NULL),
            'skrining_multiple' => (safe_post('spak_4_neonatus_ya') !== '' ? safe_post('spak_4_neonatus_ya') : NULL),
            'skrining_stadium' => (safe_post('spak_5_neonatus_ya') !== '' ? safe_post('spak_5_neonatus_ya') : NULL),

            // DATA PENUNJANG NEONATUS 
            'data_penunjang_tgl_lab' => safe_post('tanggal_pemeriksaan_lab_neonatus') !== '' ? date('Y-m-d', strtotime(str_replace('/', '-', safe_post('tanggal_pemeriksaan_lab_neonatus')))) : NULL,
            'data_penunjang_tgl_radiologi' => safe_post('tanggal_pemeriksaan_rad_neonatus') !== '' ? date('Y-m-d', strtotime(str_replace('/', '-', safe_post('tanggal_pemeriksaan_rad_neonatus')))) : NULL,
            'data_penunjang_hasil' => safe_post('hasil_pemeriksaan_labo_neonatus') !== '' ? safe_post('hasil_pemeriksaan_labo_neonatus') : NULL,
            'data_penunjang_hasil1' => safe_post('hasil_pemeriksaan_rad_neonatus') !== '' ? safe_post('hasil_pemeriksaan_rad_neonatus') : NULL,
            'data_penunjang_lain_lain' => safe_post('penunjang_lain_neonatus') !== '' ? safe_post('penunjang_lain_neonatus') : NULL,

            // MASALAH KEPERAWATAN NEONATUS 
            'masalah_keperawatann' => json_encode([
                'masalah_keperawatan_1_neonatus' => safe_post('masalah_keperawatan_1_neonatus') !== '' ? safe_post('masalah_keperawatan_1_neonatus') : null,
                'masalah_keperawatan_2_neonatus' => safe_post('masalah_keperawatan_2_neonatus') !== '' ? safe_post('masalah_keperawatan_2_neonatus') : null,
                'masalah_keperawatan_3_neonatus' => safe_post('masalah_keperawatan_3_neonatus') !== '' ? safe_post('masalah_keperawatan_3_neonatus') : null,
                'masalah_keperawatan_4_neonatus' => safe_post('masalah_keperawatan_4_neonatus') !== '' ? safe_post('masalah_keperawatan_4_neonatus') : null,
                'masalah_keperawatan_5_neonatus' => safe_post('masalah_keperawatan_5_neonatus') !== '' ? safe_post('masalah_keperawatan_5_neonatus') : null,
                'masalah_keperawatan_6_neonatus' => safe_post('masalah_keperawatan_6_neonatus') !== '' ? safe_post('masalah_keperawatan_6_neonatus') : null,
                'masalah_keperawatan_7_neonatus' => safe_post('masalah_keperawatan_7_neonatus') !== '' ? safe_post('masalah_keperawatan_7_neonatus') : null,
                'masalah_keperawatan_8_neonatus' => safe_post('masalah_keperawatan_8_neonatus') !== '' ? safe_post('masalah_keperawatan_8_neonatus') : null,
                'masalah_keperawatan_9_neonatus' => safe_post('masalah_keperawatan_9_neonatus') !== '' ? safe_post('masalah_keperawatan_9_neonatus') : null,
                'masalah_keperawatan_10_neonatus' => safe_post('masalah_keperawatan_10_neonatus') !== '' ? safe_post('masalah_keperawatan_10_neonatus') : null,
                'masalah_keperawatan_11_neonatus' => safe_post('masalah_keperawatan_11_neonatus') !== '' ? safe_post('masalah_keperawatan_11_neonatus') : null,
                'masalah_keperawatan_12_neonatus' => safe_post('masalah_keperawatan_12_neonatus') !== '' ? safe_post('masalah_keperawatan_12_neonatus') : null,
                'masalah_keperawatan_13_neonatus' => safe_post('masalah_keperawatan_13_neonatus') !== '' ? safe_post('masalah_keperawatan_13_neonatus') : null,
                'masalah_keperawatan_14_neonatus' => safe_post('masalah_keperawatan_14_neonatus') !== '' ? safe_post('masalah_keperawatan_14_neonatus') : null,
                'masalah_keperawatan_14_neonatus' => safe_post('masalah_keperawatan_14_neonatus') !== '' ? safe_post('masalah_keperawatan_14_neonatus') : null,
                'masalah_keperawatan_15_neonatus' => safe_post('masalah_keperawatan_15_neonatus') !== '' ? safe_post('masalah_keperawatan_15_neonatus') : null,
                'masalah_keperawatan_16_neonatus' => safe_post('masalah_keperawatan_16_neonatus') !== '' ? safe_post('masalah_keperawatan_16_neonatus') : null,
                'masalah_keperawatan_17_neonatus' => safe_post('masalah_keperawatan_17_neonatus') !== '' ? safe_post('masalah_keperawatan_17_neonatus') : null,
                'masalah_keperawatan_18_neonatus' => safe_post('masalah_keperawatan_18_neonatus') !== '' ? safe_post('masalah_keperawatan_18_neonatus') : null,
                'masalah_keperawatan_19_neonatus' => safe_post('masalah_keperawatan_19_neonatus') !== '' ? safe_post('masalah_keperawatan_19_neonatus') : null,
                'masalah_keperawatan_20_neonatus' => safe_post('masalah_keperawatan_20_neonatus') !== '' ? safe_post('masalah_keperawatan_20_neonatus') : null,
                'masalah_keperawatan_21_neonatus' => safe_post('masalah_keperawatan_21_neonatus') !== '' ? safe_post('masalah_keperawatan_21_neonatus') : null,
                'masalah_keperawatan_22_neonatus' => safe_post('masalah_keperawatan_22_neonatus') !== '' ? safe_post('masalah_keperawatan_22_neonatus') : null,
                'masalah_keperawatan_23_neonatus' => safe_post('masalah_keperawatan_23_neonatus') !== '' ? safe_post('masalah_keperawatan_23_neonatus') : null,
                'masalah_keperawatan_24_neonatus' => safe_post('masalah_keperawatan_24_neonatus') !== '' ? safe_post('masalah_keperawatan_24_neonatus') : null,
                'masalah_keperawatan_25_neonatus' => safe_post('masalah_keperawatan_25_neonatus') !== '' ? safe_post('masalah_keperawatan_25_neonatus') : null,
                'masalah_keperawatan_26_neonatus' => safe_post('masalah_keperawatan_26_neonatus') !== '' ? safe_post('masalah_keperawatan_26_neonatus') : null,
                'masalah_keperawatan_27_neonatus' => safe_post('masalah_keperawatan_27_neonatus') !== '' ? safe_post('masalah_keperawatan_27_neonatus') : null,
                'masalah_keperawatan_28_neonatus' => safe_post('masalah_keperawatan_28_neonatus') !== '' ? safe_post('masalah_keperawatan_28_neonatus') : null,
                'masalah_keperawatan_29_neonatus' => safe_post('masalah_keperawatan_29_neonatus') !== '' ? safe_post('masalah_keperawatan_29_neonatus') : null,
                'masalah_keperawatan_30_neonatus' => safe_post('masalah_keperawatan_30_neonatus') !== '' ? safe_post('masalah_keperawatan_30_neonatus') : null,
                'masalah_keperawatan_31_neonatus' => safe_post('masalah_keperawatan_31_neonatus') !== '' ? safe_post('masalah_keperawatan_31_neonatus') : null,
                'masalah_keperawatan_32_neonatus' => safe_post('masalah_keperawatan_32_neonatus') !== '' ? safe_post('masalah_keperawatan_32_neonatus') : null,
                'masalah_keperawatan_33_neonatus' => safe_post('masalah_keperawatan_33_neonatus') !== '' ? safe_post('masalah_keperawatan_33_neonatus') : null,
                'masalah_keperawatan_34_neonatus' => safe_post('masalah_keperawatan_34_neonatus') !== '' ? safe_post('masalah_keperawatan_34_neonatus') : null,
                'masalah_keperawatan_35_neonatus' => safe_post('masalah_keperawatan_35_neonatus') !== '' ? safe_post('masalah_keperawatan_35_neonatus') : null,
                'masalah_keperawatan_36_neonatus' => safe_post('masalah_keperawatan_36_neonatus') !== '' ? safe_post('masalah_keperawatan_36_neonatus') : null,
                'masalah_keperawatan_lain_input_neonatus' => safe_post('masalah_keperawatan_lain_input_neonatus') !== '' ? safe_post('masalah_keperawatan_lain_input_neonatus') : null,
            ]),


            // PERENCANAAN PULANG (DISCHARGE PLANNING) NOENATUS
            'kriteria_discharge_planingg' => json_encode([
                'discharge_planning_noenatus_1' => safe_post('discharge_planning_noenatus_1') !== '' ? safe_post('discharge_planning_noenatus_1') : null,
                'discharge_planning_noenatus_2' => safe_post('discharge_planning_noenatus_2') !== '' ? safe_post('discharge_planning_noenatus_2') : null,
                'discharge_planning_noenatus_3' => safe_post('discharge_planning_noenatus_3') !== '' ? safe_post('discharge_planning_noenatus_3') : null,
                'discharge_planning_noenatus_4' => safe_post('discharge_planning_noenatus_4') !== '' ? safe_post('discharge_planning_noenatus_4') : null,
            ]),

            'perencanaan_pulangg' => json_encode([
                'kriteria_discharge_noenatus_1' => safe_post('kriteria_discharge_noenatus_1') !== '' ? safe_post('kriteria_discharge_noenatus_1') : null,
                'kriteria_discharge_noenatus_2' => safe_post('kriteria_discharge_noenatus_2') !== '' ? safe_post('kriteria_discharge_noenatus_2') : null,
                'kriteria_discharge_noenatus_3' => safe_post('kriteria_discharge_noenatus_3') !== '' ? safe_post('kriteria_discharge_noenatus_3') : null,
                'kriteria_discharge_noenatus_4' => safe_post('kriteria_discharge_noenatus_4') !== '' ? safe_post('kriteria_discharge_noenatus_4') : null,
                'kriteria_discharge_noenatus_5' => safe_post('kriteria_discharge_noenatus_5') !== '' ? safe_post('kriteria_discharge_noenatus_5') : null,
                'kriteria_discharge_noenatus_6' => safe_post('kriteria_discharge_noenatus_6') !== '' ? safe_post('kriteria_discharge_noenatus_6') : null,
                'kriteria_discharge_noenatus_7' => safe_post('kriteria_discharge_noenatus_7') !== '' ? safe_post('kriteria_discharge_noenatus_7') : null,
                'kriteria_discharge_noenatus_8' => safe_post('kriteria_discharge_noenatus_8') !== '' ? safe_post('kriteria_discharge_noenatus_8') : null,
                'kriteria_discharge_noenatus_9' => safe_post('kriteria_discharge_noenatus_9') !== '' ? safe_post('kriteria_discharge_noenatus_9') : null,
                'kriteria_discharge_noenatus_10' => safe_post('kriteria_discharge_noenatus_10') !== '' ? safe_post('kriteria_discharge_noenatus_10') : null,
            ]),

            // TGL / TTD / NAMA PERAWAT OR DOKTEER
            'tanggal_jam_perawat' => (safe_post('tanggal_ttd_perawat_neonatus') !== '' ? datetime2mysql(safe_post('tanggal_ttd_perawat_neonatus')) : NULL),
            'id_perawat' => safe_post('pilih_perawat_neonatus') !== '' ? safe_post('pilih_perawat_neonatus') : NULL,
            'ceklis_ttd_perawat' => safe_post('ceklis_ttd_perawat_neonatus') !== '' ? safe_post('ceklis_ttd_perawat_neonatus') : NULL,

            'tanggal_jam_dokter' => (safe_post('tanggal_ttd_neonatus_dokter') !== '' ? datetime2mysql(safe_post('tanggal_ttd_neonatus_dokter')) : NULL),
            'id_dokter' => safe_post('pilih_dokter_neonatus') !== '' ? safe_post('pilih_dokter_neonatus') : NULL,
            'ceklis_ttd_dokter' => safe_post('ceklis_ttd_dokter_neonatus') !== '' ? safe_post('ceklis_ttd_dokter_neonatus') : NULL,

        );

        //KAJIAN MEDIS PENGKAJIAN AWAL NEONATUS AWAL
        $id_kajian_medis_neonatus = safe_post('id_kajian_medis_neonatus');

        $id_layanan_pendaftaran = safe_post('id_layanan_pendaftaran');
        $id_user = safe_post('id_user');

        // update alergi pasien
        $this->load->model('pelayanan/Pelayanan_model', 'm_pelayanan');
        $this->m_pelayanan->updateAlergiPasien(safe_post('id_pasien'), safe_post('riwayat_alergi'));
        // cek profil pasien
        $checkProfilPasien = $this->db->query("select * from sm_profil_pasien where id_pasien = '" . safe_post('id_pasien') . "'")->row();
        $dataProfilPasien = array(
            'id_pasien' => safe_post('id_pasien'),
        );
        if ($checkProfilPasien) :
            $this->db->where('id_pasien', safe_post('id_pasien'), true)->update('sm_profil_pasien', $dataProfilPasien);
        else :
            $this->db->insert('sm_profil_pasien', $dataProfilPasien);
        endif;

        // KAJIAN MEDIS  AWAL NEONATUS
        $data_kajian_medis_neonatus = array(
            'id_layanan_pendaftaran'        => $id_layanan_pendaftaran,
            'id_users' => $id_user,
            'waktu_pengkajian'              => (safe_post('waktu_kajian_medis_neonatus') !== '' ? datetime2mysql(safe_post('waktu_kajian_medis_neonatus')) : NULL),
            'keluhan_utama'                 => safe_post('keluhan_utama_medis_neonatus'),
            'riwayat_penyakit_sekarang'     => safe_post('rps_medis_neonatus'),
            'riwayat_penyakit_terdahulu'    => safe_post('rpt_medis_neonatus'),
            'pengobatan'                    => safe_post('pengobatan_medis_neonatus'),
            'riwayat_alergi'                => safe_post('riwayat_alergi_neonatus'),
            // 'riwayat_pasien'                => safe_post('riwayat_alergi'),

            'riwayat_penyakit_keluarga'     => json_encode(array(
                'hasil'                     => safe_post('rpk_medis_neonatus'),
                'asma'                      => safe_post('rpk_medis_neonatus_asma'),
                'dm'                        => safe_post('rpk_medis_neonatus_dm'),
                'cardiovascular'            => safe_post('rpk_medis_neonatus_cardiovascular'),
                'kanker'                    => safe_post('rpk_medis_neonatus_kanker'),
                'thalasemia'                => safe_post('rpk_medis_neonatus_thalasemia'),
                'lain'                      => safe_post('rpk_medis_neonatus_lain'),
                'ket_lain'                  => safe_post('rpk_medis_neonatus_lain_input'),
            )),



            'kesadaran'                     => json_encode(array(
                'composmentis'              => safe_post('composmentis_medis_neonatus'),
                'apatis'                    => safe_post('apatis_medis_neonatus'),
                'samnolen'                  => safe_post('samnolen_medis_neonatus'),
                'sopor'                     => safe_post('sopor_medis_neonatus'),
                'koma'                      => safe_post('koma_medis_neonatus'),
            )),

            'pf_kepala'                     => safe_post('pf_kepala_neonatus'),
            'ket_pf_kepala'                 => safe_post('ket_pf_kepala_neonatus'),
            'pf_mata'                       => safe_post('pf_mata_neonatus'),
            'ket_pf_mata'                   => safe_post('ket_pf_mata_neonatus'),
            'pf_hidung'                     => safe_post('pf_hidung_neonatus'),
            'ket_pf_hidung'                 => safe_post('ket_pf_hidung_neonatus'),
            'pf_gigi_mulut'                 => safe_post('pf_gigi_mulut_neonatus'),
            'ket_pf_gigi_mulut'             => safe_post('ket_pf_gigi_mulut_neonatus'),
            'pf_tenggorokan'                => safe_post('pf_tenggorokan_neonatus'),
            'ket_pf_tenggorokan'            => safe_post('ket_pf_tenggorokan_neonatus'),
            'pf_telinga'                    => safe_post('pf_telinga_neonatus'),
            'ket_pf_telinga'                => safe_post('ket_pf_telinga_neonatus'),
            'pf_leher'                      => safe_post('pf_leher_neonatus'),
            'ket_pf_leher'                  => safe_post('ket_pf_leher_neonatus'),
            'pf_thorax'                     => safe_post('pf_thorax_neonatus'),
            'ket_pf_thorax'                 => safe_post('ket_pf_thorax_neonatus'),
            'pf_jantung'                    => safe_post('pf_jantung_neonatus'),
            'ket_pf_jantung'                => safe_post('ket_pf_jantung_neonatus'),
            'pf_paru'                       => safe_post('pf_paru_neonatus'),
            'ket_pf_paru'                   => safe_post('ket_pf_paru_neonatus'),
            'pf_abdomen'                    => safe_post('pf_abdomen_neonatus'),
            'ket_pf_abdomen'                => safe_post('ket_pf_abdomen_neonatus'),
            'pf_genitalia_anus'             => safe_post('pf_genitalia_neonatus'),
            'ket_pf_genitalia_anus'         => safe_post('ket_pf_genitalia_neonatus'),
            'pf_ekstermitas'                => safe_post('pf_ekstermitas_neonatus'),
            'ket_pf_ekstermitas'            => safe_post('ket_pf_ekstermitas_neonatus'),
            'pf_kulit'                      => safe_post('pf_kulit_neonatus'),
            'ket_pf_kulit'                  => safe_post('ket_pf_kulit_neonatus'),

            'riwayat_field_neonatus'                => safe_post('riwayat_neonatus'),
            'hasil_laboratorium_neonatus'     => safe_post('hasil_lab_neonatus'),
            'hasil_radiologi_neonatus'     => safe_post('hasil_rad_neonatus'),
            'hasil_penunjang_lain_neonatus'     => safe_post('hasil_pen_lain_neonatus'),
            'diagnosa_awal_medis_neonatus'     => safe_post('diag_awal_neonatus'),


            'rd_neonatus'     => safe_post('rd_neonatus'),
            'rpp_neonatus'     => safe_post('rpp_neonatus'),
            'rt_neonatus'     => safe_post('rt_neonatus'),
            'rk_neonatus'     => safe_post('rk_neonatus'),

            'rp_neonatus' => json_encode([
                'rp_neonatus_1' => safe_post('rp_neonatus_1') !== '' ? safe_post('rp_neonatus_1') : null,
                'rp_neonatus_2' => safe_post('rp_neonatus_2') !== '' ? safe_post('rp_neonatus_2') : null,
                'rp_neonatus_3' => safe_post('rp_neonatus_3') !== '' ? safe_post('rp_neonatus_3') : null,
                'rp_neonatus_4' => safe_post('rp_neonatus_4') !== '' ? safe_post('rp_neonatus_4') : null,
                'rp_neonatus_5' => safe_post('rp_neonatus_5') !== '' ? date('Y-m-d', strtotime(str_replace('/', '-', safe_post('rp_neonatus_5')))) : NULL,
            ]),


            // TGL / TTD / NAMA PERAWAT OR DOKTEER
            'waktu_ttd_dokter_dpjp' => (safe_post('tanggal_ttd_dokter_dpjp_neonatus') !== '' ? datetime2mysql(safe_post('tanggal_ttd_dokter_dpjp_neonatus')) : NULL),
            'id_dokter_dpjp' => safe_post('dokter_dpjp_neonatus') !== '' ? safe_post('dokter_dpjp_neonatus') : NULL,
            'ttd_dokter_dpjp' => safe_post('ttd_dokter_dpjp_neonatus') !== '' ? safe_post('ttd_dokter_dpjp_neonatus') : NULL,

            'waktu_ttd_dokter_pengkajian' => (safe_post('tanggal_ttd_dokter_pengkajian_neonatus') !== '' ? datetime2mysql(safe_post('tanggal_ttd_dokter_pengkajian_neonatus')) : NULL),
            'id_dokter_pengkajian' => safe_post('dokter_pengkajian_neonatus') !== '' ? safe_post('dokter_pengkajian_neonatus') : NULL,
            'ttd_dokter_pengkajian' => safe_post('ttd_dokter_pengkajian_neonatus') !== '' ? safe_post('ttd_dokter_pengkajian_neonatus') : NULL,

        );


        $sign = $this->db->select('pan.tanggal_jam_perawat, pan.ceklis_ttd_perawat, pan.tanggal_jam_dokter, pan.ceklis_ttd_dokter,   pman.waktu_ttd_dokter_dpjp, pman.ttd_dokter_dpjp,  pman.waktu_ttd_dokter_pengkajian, pman.ttd_dokter_pengkajian')
            ->from('sm_pengkajian_awal_neonatus as pan')
            ->join('sm_pengkajian_medis_awal_neonatus as pman', 'pman.id_layanan_pendaftaran = pan.id_layanan_pendaftaran')
            ->where('pan.id_layanan_pendaftaran', $id_layanan_pendaftaran)
            ->get()
            ->row();

        // DATA KAJIAN NEONTAUS
        if (isset($sign)) :
            // if ($sign->tanggal_jam_perawat !== NULL) :
            //     $data_kajian_neonatus['tanggal_jam_perawat'] = $sign->tanggal_jam_perawat;
            // else :
            //     $data_kajian_neonatus['tanggal_jam_perawat'] = (safe_post('tanggal_ttd_perawat_neonatus') !== '' ? datetime2mysql(safe_post('tanggal_ttd_perawat_neonatus')) : NULL);
            // endif;

            if ($sign->ceklis_ttd_perawat !== NULL) :
                $data_kajian_neonatus['ceklis_ttd_perawat'] = $sign->ceklis_ttd_perawat;
            else :
                $data_kajian_neonatus['ceklis_ttd_perawat'] = (safe_post('ceklis_ttd_perawat_neonatus') !== '' ? safe_post('ceklis_ttd_perawat_neonatus') : NULL);
            endif;

            // if ($sign->tanggal_jam_dokter !== NULL) :
            //     $data_kajian_neonatus['tanggal_jam_dokter'] = $sign->tanggal_jam_dokter;
            // else :
            //     $data_kajian_neonatus['tanggal_jam_dokter'] = (safe_post('tanggal_ttd_neonatus_dokter') !== '' ? datetime2mysql(safe_post('tanggal_ttd_neonatus_dokter')) : NULL);
            // endif;

            if ($sign->ceklis_ttd_dokter !== NULL) :
                $data_kajian_neonatus['ceklis_ttd_dokter'] = $sign->ceklis_ttd_dokter;
            else :
                $data_kajian_neonatus['ceklis_ttd_dokter'] = (safe_post('ceklis_ttd_dokter_neonatus') !== '' ? safe_post('ceklis_ttd_dokter_neonatus') : NULL);
            endif;

            // DATA KAJIAN MEDIS NEONATUS
            // if ($sign->waktu_ttd_dokter_dpjp !== NULL) :
            //     $data_kajian_medis_neonatus['waktu_ttd_dokter_dpjp'] = $sign->waktu_ttd_dokter_dpjp;
            // else :
            //     $data_kajian_medis_neonatus['waktu_ttd_dokter_dpjp'] = (safe_post('tanggal_ttd_dokter_dpjp_neonatus') !== '' ? datetime2mysql(safe_post('tanggal_ttd_dokter_dpjp_neonatus')) : NULL);
            // endif;

            if ($sign->ttd_dokter_dpjp !== NULL) :
                $data_kajian_medis_neonatus['ttd_dokter_dpjp'] = $sign->ttd_dokter_dpjp;
            else :
                $data_kajian_medis_neonatus['ttd_dokter_dpjp'] = (safe_post('ttd_dokter_dpjp_neonatus') !== '' ? safe_post('ttd_dokter_dpjp_neonatus') : NULL);
            endif;

            // if ($sign->waktu_ttd_dokter_pengkajian !== NULL) :
            //     $data_kajian_medis_neonatus['waktu_ttd_dokter_pengkajian'] = $sign->waktu_ttd_dokter_pengkajian;
            // else :
            //     $data_kajian_medis_neonatus['waktu_ttd_dokter_pengkajian'] = (safe_post('tanggal_ttd_dokter_pengkajian_neonatus') !== '' ? datetime2mysql(safe_post('tanggal_ttd_dokter_pengkajian_neonatus')) : NULL);
            // endif;

            if ($sign->ttd_dokter_pengkajian !== NULL) :
                $data_kajian_medis_neonatus['ttd_dokter_pengkajian'] = $sign->ttd_dokter_pengkajian;
            else :
                $data_kajian_medis_neonatus['ttd_dokter_pengkajian'] = (safe_post('ttd_dokter_pengkajian_neonatus') !== '' ? safe_post('ttd_dokter_pengkajian_neonatus') : NULL);
            endif;

        else :
            // $data_kajian_neonatus['tanggal_jam_perawat'] = (safe_post('tanggal_ttd_perawat_neonatus') !== '' ? datetime2mysql(safe_post('tanggal_ttd_perawat_neonatus')) : NULL);
            $data_kajian_neonatus['ceklis_ttd_perawat'] = (safe_post('ceklis_ttd_perawat_neonatus') !== '' ? safe_post('ceklis_ttd_perawat_neonatus') : NULL);
            // $data_kajian_neonatus['tanggal_jam_dokter'] = (safe_post('tanggal_ttd_neonatus_dokter') !== '' ? datetime2mysql(safe_post('tanggal_ttd_neonatus_dokter')) : NULL);
            $data_kajian_neonatus['ceklis_ttd_dokter'] = (safe_post('ceklis_ttd_dokter_neonatus') !== '' ? safe_post('ceklis_ttd_dokter_neonatus') : NULL);

            // $data_kajian_medis_neonatus['waktu_ttd_dokter_dpjp'] = (safe_post('tanggal_ttd_dokter_dpjp_neonatus') !== '' ? datetime2mysql(safe_post('tanggal_ttd_dokter_dpjp_neonatus')) : NULL);
            $data_kajian_medis_neonatus['ttd_dokter_dpjp'] = (safe_post('ttd_dokter_dpjp_neonatus') !== '' ? safe_post('ttd_dokter_dpjp_neonatus') : NULL);
            // $data_kajian_medis_neonatus['waktu_ttd_dokter_pengkajian'] = (safe_post('tanggal_ttd_dokter_pengkajian_neonatus') !== '' ? datetime2mysql(safe_post('tanggal_ttd_dokter_pengkajian_neonatus')) : NULL);
            $data_kajian_medis_neonatus['ttd_dokter_pengkajian'] = (safe_post('ttd_dokter_pengkajian_neonatus') !== '' ? safe_post('ttd_dokter_pengkajian_neonatus') : NULL);
        endif;
        $response = $this->m_rawat_inap->updatePengkajianAwalNeonatus($data_kajian_neonatus, $data_kajian_medis_neonatus, $id_kajian_neonatus, $id_kajian_medis_neonatus);
        $this->response($response, REST_Controller::HTTP_OK);
    }


    // SKL
    function surat_kenal_lahir_get(){
        $this->load->model('pendaftaran/Pendaftaran_model', 'm_pendaftaran');   
            $data['pendaftaran_detail'] = [];
            $data['surat_kenal_lahir'] = [];
            $data['pendaftaran_detail'] = $this->m_pendaftaran->getPendaftaranDetail($this->get('id', true));
            $data['surat_kenal_lahir'] = $this->m_rawat_inap->getSuratKenalLahir($this->get('id'));  
        if ($data != null) {
            $this->response($data, REST_Controller::HTTP_OK);
        } else {
            $this->response($data, REST_Controller::HTTP_OK);
        }
    }

    // SKL           
    function simpan_surat_kenal_lahir_post(){
        $checkDataSuratKenalLahir = '';
        $checkDataSuratKenalLahir =  $this->m_rawat_inap->getSuratKenalLahir(safe_post('id_pendaftaran'));
        $this->db->trans_begin();
        if ($checkDataSuratKenalLahir == NULL) {
            $data = array(
                'id_pendaftaran'          => safe_post('id_pendaftaran'),
                'id_layanan_pendaftaran'  => safe_post('id_layanan_pendaftaran'),
                'no_surat_lahir'          => safe_post('no_surat_lahir') == '' ? null : safe_post('no_surat_lahir'),
                'id_ttd_skl'                => safe_post('nama_skl') == '' ? null : safe_post('nama_skl'),
                'nama_bayi_skl'           => safe_post('nama_bayi_skl') == '' ? null : safe_post('nama_bayi_skl'),
                'jenis_kelamin_skl'       => safe_post('jenis_kelamin_skl') == '' ? null : safe_post('jenis_kelamin_skl'),
                'ibu_skl'                 => safe_post('ibu_skl') == '' ? null : safe_post('ibu_skl'),
                'nik_ektp_skl_ibu'        => safe_post('nik_ektp_ibu') == '' ? null : safe_post('nik_ektp_ibu'),
                'gol_darah_ibu'           => safe_post('gol_darah_ibu') == '' ? null : safe_post('gol_darah_ibu'),
                'ayah_skl'                => safe_post('ayah_skl') == '' ? null : safe_post('ayah_skl'),
                'nik_ektp_skl_ayah'       => safe_post('nik_ektp_ayah') == '' ? null : safe_post('nik_ektp_ayah'),
                'gol_darah_ayah'          => safe_post('gol_darah_ayah') == '' ? null : safe_post('gol_darah_ayah'),
                'alamat_rumah_skl'        => safe_post('alamat_rumah_skl') == '' ? null : safe_post('alamat_rumah_skl'),
                'pekerjaan_skl'           => safe_post('pekerjaan_skl') == '' ? null : safe_post('pekerjaan_skl'),
                'hari_skl'                => safe_post('hari_skl') == '' ? null : safe_post('hari_skl'),
                'tanggal_skl'             => safe_post('tanggal_skl') !== '' ? date('Y-m-d', strtotime(str_replace('/', '-', safe_post('tanggal_skl')))) : NULL,
                'jam_skl'                 => safe_post('jam_skl') !== '' ? safe_post('jam_skl') : NULL,
                'proses_persalinan_skl_1' => safe_post('proses_persalinan_skl_1') !== '' ? safe_post('proses_persalinan_skl_1') : null,
                'proses_persalinan_skl_2' => safe_post('proses_persalinan_skl_2') !== '' ? safe_post('proses_persalinan_skl_2') : null,
                'anak_yang_ke_skl_1'      => safe_post('anak_yang_ke_skl_1') !== '' ? safe_post('anak_yang_ke_skl_1') : NULL,
                'kembar_skl'              => safe_post('kembar_skl') == '' ? null : safe_post('kembar_skl'),
                'panjang_skl'             => safe_post('panjang_skl') == '' ? null : safe_post('panjang_skl'),
                'berat_badan_skl'         => safe_post('berat_badan_skl') == '' ? null : safe_post('berat_badan_skl'),
                'lingkar_kepala_skl'      => safe_post('lingkar_kepala_skl') == '' ? null : safe_post('lingkar_kepala_skl'),
                'lingkar_dada_skl'        => safe_post('lingkar_dada_skl') == '' ? null : safe_post('lingkar_dada_skl'),
                'lingkar_pinggang_skl'    => safe_post('lingkar_pinggang_skl') == '' ? null : safe_post('lingkar_pinggang_skl'),
                'tanggal_dokter'      => safe_post('tanggal_dokter_skl') !== '' ? date('Y-m-d', strtotime(str_replace('/', '-', safe_post('tanggal_dokter_skl')))) : NULL,
                'id_dokter'           => safe_post('ttd_dokter_skl') !== '' ? safe_post('ttd_dokter_skl') : NULL,
                'hbng_keluarga_skl_1'       => safe_post('hbng_keluarga_skl_1') == '' ? null : safe_post('hbng_keluarga_skl_1'),
                'hbng_keluarga_skl_2'       => safe_post('hbng_keluarga_skl_2') == '' ? null : safe_post('hbng_keluarga_skl_2'),
                'hbng_keluarga_skl_3'       => safe_post('hbng_keluarga_skl_3') == '' ? null : safe_post('hbng_keluarga_skl_3'),
                'hbng_keluarga_skl_4'       => safe_post('hbng_keluarga_skl_4') == '' ? null : safe_post('hbng_keluarga_skl_4'),
                'hbng_keluarga_skl_5'       => safe_post('hbng_keluarga_skl_5') == '' ? null : safe_post('hbng_keluarga_skl_5'),
                'hbng_keluarga_skl_6'       => safe_post('hbng_keluarga_skl_6') == '' ? null : safe_post('hbng_keluarga_skl_6'),
                'hbng_keluarga_lainya'       => safe_post('hbng_keluarga_lainya') == '' ? null : safe_post('hbng_keluarga_lainya'),
            );

            $this->db->insert('sm_surat_kenal_lahir', $data);
        } else {
            $data = array(
                'id_pendaftaran'          => safe_post('id_pendaftaran'),
                'no_surat_lahir'          => safe_post('no_surat_lahir') == '' ? null : safe_post('no_surat_lahir'),
                'id_ttd_skl'                => safe_post('nama_skl') == '' ? null : safe_post('nama_skl'),
                'nama_bayi_skl'           => safe_post('nama_bayi_skl') == '' ? null : safe_post('nama_bayi_skl'),
                'jenis_kelamin_skl'       => safe_post('jenis_kelamin_skl') == '' ? null : safe_post('jenis_kelamin_skl'),
                'ibu_skl'                 => safe_post('ibu_skl') == '' ? null : safe_post('ibu_skl'),
                'nik_ektp_skl_ibu'        => safe_post('nik_ektp_ibu') == '' ? null : safe_post('nik_ektp_ibu'),
                'gol_darah_ibu'           => safe_post('gol_darah_ibu') == '' ? null : safe_post('gol_darah_ibu'),
                'ayah_skl'                => safe_post('ayah_skl') == '' ? null : safe_post('ayah_skl'),
                'nik_ektp_skl_ayah'       => safe_post('nik_ektp_ayah') == '' ? null : safe_post('nik_ektp_ayah'),
                'gol_darah_ayah'          => safe_post('gol_darah_ayah') == '' ? null : safe_post('gol_darah_ayah'),
                'alamat_rumah_skl'        => safe_post('alamat_rumah_skl') == '' ? null : safe_post('alamat_rumah_skl'),
                'pekerjaan_skl'           => safe_post('pekerjaan_skl') == '' ? null : safe_post('pekerjaan_skl'),
                'hari_skl'                => safe_post('hari_skl') == '' ? null : safe_post('hari_skl'),
                'tanggal_skl'             => safe_post('tanggal_skl') !== '' ? date('Y-m-d', strtotime(str_replace('/', '-', safe_post('tanggal_skl')))) : NULL,
                'jam_skl'                 => safe_post('jam_skl') !== '' ? safe_post('jam_skl') : NULL,
                'proses_persalinan_skl_1' => safe_post('proses_persalinan_skl_1') !== '' ? safe_post('proses_persalinan_skl_1') : null,
                'proses_persalinan_skl_2' => safe_post('proses_persalinan_skl_2') !== '' ? safe_post('proses_persalinan_skl_2') : null,
                'anak_yang_ke_skl_1'      => safe_post('anak_yang_ke_skl_1') !== '' ? safe_post('anak_yang_ke_skl_1') : NULL,
                'kembar_skl'              => safe_post('kembar_skl') == '' ? null : safe_post('kembar_skl'),
                'panjang_skl'             => safe_post('panjang_skl') == '' ? null : safe_post('panjang_skl'),
                'berat_badan_skl'         => safe_post('berat_badan_skl') == '' ? null : safe_post('berat_badan_skl'),
                'lingkar_kepala_skl'      => safe_post('lingkar_kepala_skl') == '' ? null : safe_post('lingkar_kepala_skl'),
                'lingkar_dada_skl'        => safe_post('lingkar_dada_skl') == '' ? null : safe_post('lingkar_dada_skl'),
                'lingkar_pinggang_skl'    => safe_post('lingkar_pinggang_skl') == '' ? null : safe_post('lingkar_pinggang_skl'),
                'tanggal_dokter'      => safe_post('tanggal_dokter_skl') !== '' ? date('Y-m-d', strtotime(str_replace('/', '-', safe_post('tanggal_dokter_skl')))) : NULL,
                'id_dokter'           => safe_post('ttd_dokter_skl') !== '' ? safe_post('ttd_dokter_skl') : NULL,
                'hbng_keluarga_skl_1'       => safe_post('hbng_keluarga_skl_1') == '' ? null : safe_post('hbng_keluarga_skl_1'),
                'hbng_keluarga_skl_2'       => safe_post('hbng_keluarga_skl_2') == '' ? null : safe_post('hbng_keluarga_skl_2'),
                'hbng_keluarga_skl_3'       => safe_post('hbng_keluarga_skl_3') == '' ? null : safe_post('hbng_keluarga_skl_3'),
                'hbng_keluarga_skl_4'       => safe_post('hbng_keluarga_skl_4') == '' ? null : safe_post('hbng_keluarga_skl_4'),
                'hbng_keluarga_skl_5'       => safe_post('hbng_keluarga_skl_5') == '' ? null : safe_post('hbng_keluarga_skl_5'),
                'hbng_keluarga_skl_6'       => safe_post('hbng_keluarga_skl_6') == '' ? null : safe_post('hbng_keluarga_skl_6'),
                'hbng_keluarga_lainya'       => safe_post('hbng_keluarga_lainya') == '' ? null : safe_post('hbng_keluarga_lainya'),
            );
            $this->db->where('id_pendaftaran', safe_post('id_pendaftaran'));
            $this->db->update('sm_surat_kenal_lahir', $data);
        }

        if ($this->db->trans_status() === false) :
            $this->db->trans_rollback();
            $status = false;
            $message = 'Gagal simpan form surat kenal lahir';
        else :
            $this->db->trans_commit();
            $status = true;
            $message = 'Berhasil simpan form surat kenal lahir';
        endif;

        $this->response(array('status' => $status, 'message' => $message), REST_Controller::HTTP_OK);
    }


    // CPPRI WH      
    function simpan_checklist_penerimaan_pasien_rawat_inap_post()
    {
        $checkData = '';
        // var_dump($checkData);die; WH
        $checkData = $this->m_rawat_inap->getChecklistPenerimaanPasienRawatInapById(safe_post('id_layanan_pendaftaran'));

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


    // CPPRI WH  
    function check_checklist_penerimaan_pasien_rawat_inap_get()
    {
        $data = [];
        $data = $this->m_rawat_inap->getChecklistPenerimaanPasienRawatInapById($this->get('id'));

        if ($data != null) {
            $this->response($data[0], REST_Controller::HTTP_OK);
        } else {
            $this->response($data, REST_Controller::HTTP_OK);
        }
    }



    // SPPRAPS WH      
    function simpan_surat_peryataan_pulang_rawat_atas_permintaan_sendiri_post()
    {
        $checkData = '';
        // var_dump($checkData);die; 
        $checkData = $this->m_rawat_inap->getSuratPeryataanPulangAtasPermintaanSendiriById(safe_post('id_pendaftaran'));
        $this->db->trans_begin();
        if ($checkData == null) {
            $data = array(
                'id_layanan_pendaftaran'            => safe_post('id_layanan_pendaftaran'),
                'nama_sppraps'                      => safe_post('nama_sppraps') == '' ? null : safe_post('nama_sppraps'),
                'tgl_lahir_sppraps'                 => safe_post('tgl_lahir_sppraps') !== '' ? date('Y-m-d', strtotime(str_replace('/', '-', safe_post('tgl_lahir_sppraps')))) : NULL,
                'tahun_sppraps'                     => safe_post('tahun_sppraps') == '' ? null : safe_post('tahun_sppraps'),
                'jenis_kelamin_tahun_sppraps'       => safe_post('jenis_kelamin_tahun_sppraps') == '' ? null : safe_post('jenis_kelamin_tahun_sppraps'),
                'alamat_sppraps'                    => safe_post('alamat_sppraps') == '' ? null : safe_post('alamat_sppraps'),
                'rt_sppraps'                        => safe_post('rt_sppraps') == '' ? null : safe_post('rt_sppraps'),
                'rw_sppraps'                        => safe_post('rw_sppraps') == '' ? null : safe_post('rw_sppraps'),
                'kelurahan_sppraps'                 => safe_post('kelurahan_sppraps') == '' ? null : safe_post('kelurahan_sppraps'),
                'kecamatan_sppraps'                 => safe_post('kecamatan_sppraps') == '' ? null : safe_post('kecamatan_sppraps'),
                'kota_sppraps'                      => safe_post('kota_sppraps') == '' ? null : safe_post('kota_sppraps'),
                'nomor_ktp_sppraps'                 => safe_post('nomor_ktp_sppraps') == '' ? null : safe_post('nomor_ktp_sppraps'),
                'nomor_tlp_sppraps'                 => safe_post('nomor_tlp_sppraps') == '' ? null : safe_post('nomor_tlp_sppraps'),
                'diri_sppraps'                      => safe_post('diri_sppraps') == '' ? null : safe_post('diri_sppraps'),
                'nama_sppraps1'                     => safe_post('nama_sppraps1') == '' ? null : safe_post('nama_sppraps1'),
                'nomor_rekam_sppraps'               => safe_post('nomor_rekam_sppraps') == '' ? null : safe_post('nomor_rekam_sppraps'),
                'tgl_lahir_sppraps1'                => safe_post('tgl_lahir_sppraps1') !== '' ? date('Y-m-d', strtotime(str_replace('/', '-', safe_post('tgl_lahir_sppraps1')))) : NULL,
                'tahun_sppraps1'                    => safe_post('tahun_sppraps1') == '' ? null : safe_post('tahun_sppraps1'),
                'jenis_kelamin_tahun_sppraps1'      => safe_post('jenis_kelamin_tahun_sppraps1') == '' ? null : safe_post('jenis_kelamin_tahun_sppraps1'),
                'kelas_sppraps'                     => safe_post('kelas_sppraps') == '' ? null : safe_post('kelas_sppraps'),
                'dokter_sppraps'                    => safe_post('dokter_sppraps') !== '' ? safe_post('dokter_sppraps') : NULL,
                'tanggal_dokter_sppraps'            => (safe_post('tanggal_dokter_sppraps') !== '' ? datetime2mysql(safe_post('tanggal_dokter_sppraps')) : NULL),
                'ttd_dokter_sppraps'                => safe_post('ttd_dokter_sppraps') !== '' ? safe_post('ttd_dokter_sppraps') : NULL,
                'ceklis_ttd_dokter_sppraps'         => safe_post('ceklis_ttd_dokter_sppraps') !== '' ? safe_post('ceklis_ttd_dokter_sppraps') : NULL,
                'ttd_pasien_sppraps'                => safe_post('ttd_pasien_sppraps') !== '' ? safe_post('ttd_pasien_sppraps') : NULL,
                'ceklis_ttd_pasien_sppraps'         => safe_post('ceklis_ttd_pasien_sppraps') !== '' ? safe_post('ceklis_ttd_pasien_sppraps') : NULL,
                'ya_sppraps'                        => safe_post('ya_sppraps') == '' ? null : safe_post('ya_sppraps'),
                'alasanaps_sppraps'                        => safe_post('alasanaps_sppraps') == '' ? null : safe_post('alasanaps_sppraps'),
                'updated_on'                        => $this->datetime,
            );

            $this->db->insert('sm_surat_peryataan_pulang_rawat_atas_permintaan_sendiri', $data);
        } else {
            $data = array(
                'nama_sppraps'                      => safe_post('nama_sppraps') == '' ? null : safe_post('nama_sppraps'),
                'tgl_lahir_sppraps'                 => safe_post('tgl_lahir_sppraps') !== '' ? date('Y-m-d', strtotime(str_replace('/', '-', safe_post('tgl_lahir_sppraps')))) : NULL,
                'tahun_sppraps'                     => safe_post('tahun_sppraps') == '' ? null : safe_post('tahun_sppraps'),
                'jenis_kelamin_tahun_sppraps'       => safe_post('jenis_kelamin_tahun_sppraps') == '' ? null : safe_post('jenis_kelamin_tahun_sppraps'),
                'alamat_sppraps'                    => safe_post('alamat_sppraps') == '' ? null : safe_post('alamat_sppraps'),
                'rt_sppraps'                        => safe_post('rt_sppraps') == '' ? null : safe_post('rt_sppraps'),
                'rw_sppraps'                        => safe_post('rw_sppraps') == '' ? null : safe_post('rw_sppraps'),
                'kelurahan_sppraps'                 => safe_post('kelurahan_sppraps') == '' ? null : safe_post('kelurahan_sppraps'),
                'kecamatan_sppraps'                 => safe_post('kecamatan_sppraps') == '' ? null : safe_post('kecamatan_sppraps'),
                'kota_sppraps'                      => safe_post('kota_sppraps') == '' ? null : safe_post('kota_sppraps'),
                'nomor_ktp_sppraps'                 => safe_post('nomor_ktp_sppraps') == '' ? null : safe_post('nomor_ktp_sppraps'),
                'nomor_tlp_sppraps'                 => safe_post('nomor_tlp_sppraps') == '' ? null : safe_post('nomor_tlp_sppraps'),
                'diri_sppraps'                      => safe_post('diri_sppraps') == '' ? null : safe_post('diri_sppraps'),
                'nama_sppraps1'                     => safe_post('nama_sppraps1') == '' ? null : safe_post('nama_sppraps1'),
                'nomor_rekam_sppraps'               => safe_post('nomor_rekam_sppraps') == '' ? null : safe_post('nomor_rekam_sppraps'),
                'tgl_lahir_sppraps1'                => safe_post('tgl_lahir_sppraps1') !== '' ? date('Y-m-d', strtotime(str_replace('/', '-', safe_post('tgl_lahir_sppraps1')))) : NULL,
                'tahun_sppraps1'                    => safe_post('tahun_sppraps1') == '' ? null : safe_post('tahun_sppraps1'),
                'jenis_kelamin_tahun_sppraps1'      => safe_post('jenis_kelamin_tahun_sppraps1') == '' ? null : safe_post('jenis_kelamin_tahun_sppraps1'),
                'kelas_sppraps'                     => safe_post('kelas_sppraps') == '' ? null : safe_post('kelas_sppraps'),
                'dokter_sppraps'                    => safe_post('dokter_sppraps') !== '' ? safe_post('dokter_sppraps') : NULL,
                'tanggal_dokter_sppraps'            => (safe_post('tanggal_dokter_sppraps') !== '' ? datetime2mysql(safe_post('tanggal_dokter_sppraps')) : NULL),
                'ttd_dokter_sppraps'                => safe_post('ttd_dokter_sppraps') !== '' ? safe_post('ttd_dokter_sppraps') : NULL,
                'ceklis_ttd_dokter_sppraps'         => safe_post('ceklis_ttd_dokter_sppraps') !== '' ? safe_post('ceklis_ttd_dokter_sppraps') : NULL,
                'ttd_pasien_sppraps'                => safe_post('ttd_pasien_sppraps') !== '' ? safe_post('ttd_pasien_sppraps') : NULL,
                'ceklis_ttd_pasien_sppraps'         => safe_post('ceklis_ttd_pasien_sppraps') !== '' ? safe_post('ceklis_ttd_pasien_sppraps') : NULL,
                'ya_sppraps'                        => safe_post('ya_sppraps') == '' ? null : safe_post('ya_sppraps'),
                'alasanaps_sppraps'                        => safe_post('alasanaps_sppraps') == '' ? null : safe_post('alasanaps_sppraps'),
                'updated_on'                        => $this->datetime,
                // var_dump($data);die;
            );

            $this->db->where('id_layanan_pendaftaran', safe_post('id_layanan_pendaftaran'));
            $this->db->update('sm_surat_peryataan_pulang_rawat_atas_permintaan_sendiri', $data);
        }
        if ($this->db->trans_status() === false) :
            $this->db->trans_rollback();
            $status  = false;
            $message = 'Gagal simpan form surat peryataan pulang rawat atas permintaan sendiri';
        else :
            $this->db->trans_commit();
            $status  = true;
            $message = 'Berhasil simpan form surat peryataan pulang rawat atas permintaan sendiri';
        endif;
        $this->response(array('status' => $status, 'message' => $message), REST_Controller::HTTP_OK);
    }



    // SPPRAPS WH 
    function check_surat_peryataan_pulang_rawat_atas_permintaan_sendiri_get()
    {
        $this->load->model('pendaftaran/Pendaftaran_model', 'm_pendaftaran');

        $data = [];
        $data['data_sppraps'] = [];

        $data = $this->m_pendaftaran->getPendaftaranDetail($this->get('id', true), $this->get('id_layanan_pendaftaran', true));
        $data['data_sppraps'] = $this->m_rawat_inap->getSuratPeryataanPulangAtasPermintaanSendiriById($this->get('id'));

        if ($data != null) {
            $this->response($data, REST_Controller::HTTP_OK);
        } else {
            $this->response($data, REST_Controller::HTTP_OK);
        }
    }



    // SPPRAPS WH 
    function kamar_auto_get()
    {
        $q = safe_get('q');
        $page = safe_get('page');
        $start = $this->start($page);
        $key = 'kamar_auto1_' . $q . '_' . $page;
        if (!$this->redis->get($key)) :
            $data = $this->m_rawat_inap->getAutoKamar($q, $start, $this->limit);
            // var_dump($data);die;
            if ((safe_get('page') == 1) & ($q == '')) :
                $pilih[] = array(
                    'id' => '',
                    'nama' => ' ',
                );
                $data['data'] = array_merge($pilih, $data['data']);
                $data['total'] += 1;
            endif;
            $this->redis->setex($key, 86400, json_encode($data));
            $this->response($data, REST_Controller::HTTP_OK);
        else :
            exit($this->redis->get($key));
        endif;
    }











    public function get_jadwal_dokter_get()
    {
        $id_layanan = $this->get('id_layanan_pendaftaran');
        if (!$id_layanan) {
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);

            return;
        }

        $tanggal_keluar = $this->db->select('p.tanggal_keluar, lp.id_dokter')
            ->from('sm_layanan_pendaftaran lp')
            ->join('sm_pendaftaran p', 'p.id = lp.id_pendaftaran')
            ->where('lp.id', $id_layanan)
            ->get()->row();

        if (empty($tanggal_keluar->tanggal_keluar)) {
            $tanggal = date('Y-m-d', strtotime(date('Y-m-d') . ' +7 days'));
        } else if (date('Y-m-d', strtotime($tanggal_keluar->tanggal_keluar . ' +7 days')) < date('Y-m-d')) {
            $tanggal = date('Y-m-d', strtotime('-1 days'));
        } else {
            $tanggal = date('Y-m-d', strtotime($tanggal_keluar->tanggal_keluar . ' +7 days'));
        }

        $jadwal_dokter = $this->db->select('tanggal')
            ->from('sm_jadwal_dokter')
            ->where('date(tanggal) >= ', date('Y-m-d'))
            ->get()->result();
        $data_jadwal   = [];
        foreach ($jadwal_dokter as $jadwal) {
            $data_jadwal[] = $jadwal->tanggal;
        }

        $data_jadwal = array_unique($data_jadwal);
        sort($data_jadwal);

        $poli_dokter = $this->db->select('ss.nama, ss.id')
            ->from('sm_layanan_pendaftaran slp')
            ->join('sm_tenaga_medis stm', 'slp.id_dokter = stm.id')
            ->join('sm_spesialisasi ss', 'stm.id_spesialisasi = ss.id')
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

    public function get_list_poli_by_tanggal_get()
    {
        $tanggal = $this->get('tanggal', TRUE);
        $tanggal = date2mysql($tanggal);

        // get list poli available in that tanggal on table sm_jadwal_dokter
        $list_poli = $this->db->select('p.id, p.nama')
            ->from('sm_jadwal_dokter jd')
            ->join('sm_spesialisasi p', 'jd.id_poli = p.id')
            ->where('jd.tanggal', $tanggal)
            ->where('p.is_klinik', '1')
            ->group_by('p.id')
            ->get()->result();

        $this->response(
            [
                'status'    => TRUE,
                'list_poli' => $list_poli,
            ],
            self::HTTP_OK
        );
    }

    public function get_list_dokter_by_poli_dan_tanggal_get()
    {
        $tanggal = $this->get('tanggal', TRUE);
        $poli = $this->get('poli', TRUE);
        $tanggal = date2mysql($tanggal);

        // get list dokter available in that tanggal and poli on table sm_jadwal_dokter
        $list_dokter = $this->db->select('id, id_dokter, nama_dokter, kuota, jml_kunjung, shift_poli')
            ->from('sm_jadwal_dokter')
            ->where('tanggal', $tanggal)
            ->where('id_poli', $poli)
            ->get()
            ->result();

        $this->response(
            [
                'status'    => TRUE,
                'list_dokter' => $list_dokter,
            ],
            self::HTTP_OK
        );
    }

    // PPPK
    function get_data_pengkajian_pasien_populasi_khusus_get()
    {
        if (!$this->get('id_layanan_pendaftaran')) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
        endif;
        $this->load->model('pendaftaran/Pendaftaran_model', 'm_pendaftaran');
        $this->load->model('pelayanan/Pelayanan_model', 'm_pelayanan');
        $data                               = $this->m_pendaftaran->getPendaftaranDetail($this->get('id', true), $this->get('id_layanan', true));
        $data['profil']                     = $this->m_pelayanan->getProfilPasien($data['pasien']->id_pasien);
        $data['pengkajian_pasien_populasi_khusus']  = $this->m_rawat_inap->getPengkajianPasienPopulasiKhusus($this->get('id', true));
        $data['pengkajian_pasien_populasi_khusus_logs']       = $this->m_rawat_inap->getPengkajianPasienPopulasiKhususLogs($this->get('id', true));
        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK); // (200)
        endif;
    }

    // PPPK LOGS 
    function get_pengkajian_Pasien_Populasi_Khusus_logs_get()
    {
        if (!$this->get('id_layanan_pendaftaran', true)) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
        endif;
        $id_layanan_pendaftaran = $this->get('id_layanan_pendaftaran', true);
        $data['pengkajian_pasien_populasi_khusus_logs']    = $this->m_rawat_inap->getPengkajianPasienPopulasiKhususLogs($id_layanan_pendaftaran);
        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK); // (200)
        endif;
    }

    // PPPK
    function simpan_data_pengkajian_pasien_populasi_khusus_post()
    {
        if (safe_post('id_layanan_pendaftaran') === '') :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
        endif;
        $id_layanan_pendaftaran = safe_post('id_layanan_pendaftaran');
        $id_pendaftaran = safe_post('id_pendaftaran');;
        $id_pppk = safe_post('id_pppk');
        $id_user = safe_post('id_user');

        $data_populasi = array(
            'id_layanan_pendaftaran' => $id_layanan_pendaftaran,
            'id_pendaftaran' => $id_pendaftaran,
            'id_users' => $id_user,
            'tanggal_jam_pengkajian_ppk' => (safe_post('tanggal_jam_pengkajian_ppk') !== '' ? datetime2mysql(safe_post('tanggal_jam_pengkajian_ppk')) : NULL),
            'geriatri_pppk' => json_encode([
                'geriatri_pppk_1' => safe_post('geriatri_pppk_1') !== '' ? safe_post('geriatri_pppk_1') : null,
                'geriatri_pppk_2' => safe_post('geriatri_pppk_2') !== '' ? safe_post('geriatri_pppk_2') : null,
                'geriatri_pppk_3' => safe_post('geriatri_pppk_3') !== '' ? safe_post('geriatri_pppk_3') : null,
                'geriatri_pppk_4' => safe_post('geriatri_pppk_4') !== '' ? safe_post('geriatri_pppk_4') : null,
                'geriatri_pppk_5' => safe_post('geriatri_pppk_5') !== '' ? safe_post('geriatri_pppk_5') : null,
                'geriatri_pppk_6' => safe_post('geriatri_pppk_6') !== '' ? safe_post('geriatri_pppk_6') : null,
                'geriatri_pppk_7' => safe_post('geriatri_pppk_7') !== '' ? safe_post('geriatri_pppk_7') : null,
                'geriatri_pppk_8' => safe_post('geriatri_pppk_8') !== '' ? safe_post('geriatri_pppk_8') : null,
                'geriatri_pppk_9' => safe_post('geriatri_pppk_9') !== '' ? safe_post('geriatri_pppk_9') : null,
                'geriatri_pppk_10' => safe_post('geriatri_pppk_10') !== '' ? safe_post('geriatri_pppk_10') : null,
                'geriatri_pppk_11' => safe_post('geriatri_pppk_11') !== '' ? safe_post('geriatri_pppk_11') : null,
                'geriatri_pppk_12' => safe_post('geriatri_pppk_12') !== '' ? safe_post('geriatri_pppk_12') : null,
                'geriatri_pppk_13' => safe_post('geriatri_pppk_13') !== '' ? safe_post('geriatri_pppk_13') : null,
                'geriatri_pppk_14' => safe_post('geriatri_pppk_14') !== '' ? safe_post('geriatri_pppk_14') : null,
                'geriatri_pppk_15' => safe_post('geriatri_pppk_15') !== '' ? safe_post('geriatri_pppk_15') : null,
                'geriatri_pppk_16' => safe_post('geriatri_pppk_16') !== '' ? safe_post('geriatri_pppk_16') : null,
                'geriatri_pppk_17' => safe_post('geriatri_pppk_17') !== '' ? safe_post('geriatri_pppk_17') : null,
                'geriatri_pppk_18' => safe_post('geriatri_pppk_18') !== '' ? safe_post('geriatri_pppk_18') : null,
            ]),

            'penyakitmenular_pppk' => json_encode([
                'penyakitmenular_pppk_1' => safe_post('penyakitmenular_pppk_1') !== '' ? safe_post('penyakitmenular_pppk_1') : null,
                'penyakitmenular_pppk_2' => safe_post('penyakitmenular_pppk_2') !== '' ? safe_post('penyakitmenular_pppk_2') : null,
                'penyakitmenular_pppk_3' => safe_post('penyakitmenular_pppk_3') !== '' ? safe_post('penyakitmenular_pppk_3') : null,
                'penyakitmenular_pppk_4' => safe_post('penyakitmenular_pppk_4') !== '' ? safe_post('penyakitmenular_pppk_4') : null,
                'penyakitmenular_pppk_5' => safe_post('penyakitmenular_pppk_5') !== '' ? safe_post('penyakitmenular_pppk_5') : null,
                'penyakitmenular_pppk_6' => safe_post('penyakitmenular_pppk_6') !== '' ? safe_post('penyakitmenular_pppk_6') : null,
                'penyakitmenular_pppk_7' => safe_post('penyakitmenular_pppk_7') !== '' ? safe_post('penyakitmenular_pppk_7') : null,
                'penyakitmenular_pppk_8' => safe_post('penyakitmenular_pppk_8') !== '' ? safe_post('penyakitmenular_pppk_8') : null,
                'penyakitmenular_pppk_9' => safe_post('penyakitmenular_pppk_9') !== '' ? safe_post('penyakitmenular_pppk_9') : null,
                'penyakitmenular_pppk_10' => safe_post('penyakitmenular_pppk_10') !== '' ? safe_post('penyakitmenular_pppk_10') : null,
                'penyakitmenular_pppk_11' => safe_post('penyakitmenular_pppk_11') !== '' ? safe_post('penyakitmenular_pppk_11') : null,
                'penyakitmenular_pppk_12' => safe_post('penyakitmenular_pppk_12') !== '' ? safe_post('penyakitmenular_pppk_12') : null,
                'penyakitmenular_pppk_13' => safe_post('penyakitmenular_pppk_13') !== '' ? safe_post('penyakitmenular_pppk_13') : null,
                'penyakitmenular_pppk_14' => safe_post('penyakitmenular_pppk_14') !== '' ? safe_post('penyakitmenular_pppk_14') : null,
                'penyakitmenular_pppk_15' => safe_post('penyakitmenular_pppk_15') !== '' ? safe_post('penyakitmenular_pppk_15') : null,
                'penyakitmenular_pppk_16' => safe_post('penyakitmenular_pppk_16') !== '' ? safe_post('penyakitmenular_pppk_16') : null,
                'penyakitmenular_pppk_17' => safe_post('penyakitmenular_pppk_17') !== '' ? safe_post('penyakitmenular_pppk_17') : null,
                'penyakitmenular_pppk_18' => safe_post('penyakitmenular_pppk_18') !== '' ? safe_post('penyakitmenular_pppk_18') : null,
                'penyakitmenular_pppk_19' => safe_post('penyakitmenular_pppk_19') !== '' ? safe_post('penyakitmenular_pppk_19') : null,
                'penyakitmenular_pppk_20' => safe_post('penyakitmenular_pppk_20') !== '' ? safe_post('penyakitmenular_pppk_20') : null,
                'penyakitmenular_pppk_21' => safe_post('penyakitmenular_pppk_21') !== '' ? safe_post('penyakitmenular_pppk_21') : null,
                'penyakitmenular_pppk_22' => safe_post('penyakitmenular_pppk_22') !== '' ? safe_post('penyakitmenular_pppk_22') : null,
                'penyakitmenular_pppk_23' => safe_post('penyakitmenular_pppk_23') !== '' ? safe_post('penyakitmenular_pppk_23') : null,
            ]),

            'penyakitpenurunan_pppk' => json_encode([
                'penyakitpenurunan_pppk_1' => safe_post('penyakitpenurunan_pppk_1') !== '' ? safe_post('penyakitpenurunan_pppk_1') : null,
                'penyakitpenurunan_pppk_2' => safe_post('penyakitpenurunan_pppk_2') !== '' ? safe_post('penyakitpenurunan_pppk_2') : null,
                'penyakitpenurunan_pppk_3' => safe_post('penyakitpenurunan_pppk_3') !== '' ? safe_post('penyakitpenurunan_pppk_3') : null,
                'penyakitpenurunan_pppk_4' => safe_post('penyakitpenurunan_pppk_4') !== '' ? safe_post('penyakitpenurunan_pppk_4') : null,
                'penyakitpenurunan_pppk_5' => safe_post('penyakitpenurunan_pppk_5') !== '' ? safe_post('penyakitpenurunan_pppk_5') : null,
                'penyakitpenurunan_pppk_6' => safe_post('penyakitpenurunan_pppk_6') !== '' ? safe_post('penyakitpenurunan_pppk_6') : null,
                'penyakitpenurunan_pppk_7' => safe_post('penyakitpenurunan_pppk_7') !== '' ? safe_post('penyakitpenurunan_pppk_7') : null,
                'penyakitpenurunan_pppk_8' => safe_post('penyakitpenurunan_pppk_8') !== '' ? safe_post('penyakitpenurunan_pppk_8') : null,
                'penyakitpenurunan_pppk_9' => safe_post('penyakitpenurunan_pppk_9') !== '' ? safe_post('penyakitpenurunan_pppk_9') : null,
                'penyakitpenurunan_pppk_10' => safe_post('penyakitpenurunan_pppk_10') !== '' ? safe_post('penyakitpenurunan_pppk_10') : null,
                'penyakitpenurunan_pppk_11' => safe_post('penyakitpenurunan_pppk_11') !== '' ? safe_post('penyakitpenurunan_pppk_11') : null,
                'penyakitpenurunan_pppk_12' => safe_post('penyakitpenurunan_pppk_12') !== '' ? safe_post('penyakitpenurunan_pppk_12') : null,
                'penyakitpenurunan_pppk_13' => safe_post('penyakitpenurunan_pppk_13') !== '' ? safe_post('penyakitpenurunan_pppk_13') : null,
                'penyakitpenurunan_pppk_14' => safe_post('penyakitpenurunan_pppk_14') !== '' ? safe_post('penyakitpenurunan_pppk_14') : null,
                'penyakitpenurunan_pppk_15' => safe_post('penyakitpenurunan_pppk_15') !== '' ? safe_post('penyakitpenurunan_pppk_15') : null,
                'penyakitpenurunan_pppk_16' => safe_post('penyakitpenurunan_pppk_16') !== '' ? safe_post('penyakitpenurunan_pppk_16') : null,
                'penyakitpenurunan_pppk_17' => safe_post('penyakitpenurunan_pppk_17') !== '' ? safe_post('penyakitpenurunan_pppk_17') : null,
                'penyakitpenurunan_pppk_18' => safe_post('penyakitpenurunan_pppk_18') !== '' ? safe_post('penyakitpenurunan_pppk_18') : null,
                'penyakitpenurunan_pppk_19' => safe_post('penyakitpenurunan_pppk_19') !== '' ? safe_post('penyakitpenurunan_pppk_19') : null,
            ]),

            'kesehatanjiwa_pppk' => json_encode([
                'kesehatanjiwa_pppk_1' => safe_post('kesehatanjiwa_pppk_1') !== '' ? safe_post('kesehatanjiwa_pppk_1') : null,
                'kesehatanjiwa_pppk_2' => safe_post('kesehatanjiwa_pppk_2') !== '' ? safe_post('kesehatanjiwa_pppk_2') : null,
                'kesehatanjiwa_pppk_3' => safe_post('kesehatanjiwa_pppk_3') !== '' ? safe_post('kesehatanjiwa_pppk_3') : null,
                'kesehatanjiwa_pppk_4' => safe_post('kesehatanjiwa_pppk_4') !== '' ? safe_post('kesehatanjiwa_pppk_4') : null,
                'kesehatanjiwa_pppk_5' => safe_post('kesehatanjiwa_pppk_5') !== '' ? safe_post('kesehatanjiwa_pppk_5') : null,
                'kesehatanjiwa_pppk_6' => safe_post('kesehatanjiwa_pppk_6') !== '' ? safe_post('kesehatanjiwa_pppk_6') : null,
                'kesehatanjiwa_pppk_7' => safe_post('kesehatanjiwa_pppk_7') !== '' ? safe_post('kesehatanjiwa_pppk_7') : null,
                'kesehatanjiwa_pppk_8' => safe_post('kesehatanjiwa_pppk_8') !== '' ? safe_post('kesehatanjiwa_pppk_8') : null,
                'kesehatanjiwa_pppk_9' => safe_post('kesehatanjiwa_pppk_9') !== '' ? safe_post('kesehatanjiwa_pppk_9') : null,
                'kesehatanjiwa_pppk_10' => safe_post('kesehatanjiwa_pppk_10') !== '' ? safe_post('kesehatanjiwa_pppk_10') : null,
                'kesehatanjiwa_pppk_11' => safe_post('kesehatanjiwa_pppk_11') !== '' ? safe_post('kesehatanjiwa_pppk_11') : null,
                'kesehatanjiwa_pppk_12' => safe_post('kesehatanjiwa_pppk_12') !== '' ? safe_post('kesehatanjiwa_pppk_12') : null,
                'kesehatanjiwa_pppk_13' => safe_post('kesehatanjiwa_pppk_13') !== '' ? safe_post('kesehatanjiwa_pppk_13') : null,
                'kesehatanjiwa_pppk_14' => safe_post('kesehatanjiwa_pppk_14') !== '' ? safe_post('kesehatanjiwa_pppk_14') : null,
                'kesehatanjiwa_pppk_15' => safe_post('kesehatanjiwa_pppk_15') !== '' ? safe_post('kesehatanjiwa_pppk_15') : null,
                'kesehatanjiwa_pppk_16' => safe_post('kesehatanjiwa_pppk_16') !== '' ? safe_post('kesehatanjiwa_pppk_16') : null,
                'kesehatanjiwa_pppk_17' => safe_post('kesehatanjiwa_pppk_17') !== '' ? safe_post('kesehatanjiwa_pppk_17') : null,
                'kesehatanjiwa_pppk_18' => safe_post('kesehatanjiwa_pppk_18') !== '' ? safe_post('kesehatanjiwa_pppk_18') : null,
            ]),


            'kekerasanpenganiayaan_pppk' => json_encode([
                'kekerasanpenganiayaan_pppk_1' => safe_post('kekerasanpenganiayaan_pppk_1') !== '' ? safe_post('kekerasanpenganiayaan_pppk_1') : null,
                'kekerasanpenganiayaan_pppk_2' => safe_post('kekerasanpenganiayaan_pppk_2') !== '' ? safe_post('kekerasanpenganiayaan_pppk_2') : null,
                'kekerasanpenganiayaan_pppk_3' => safe_post('kekerasanpenganiayaan_pppk_3') !== '' ? safe_post('kekerasanpenganiayaan_pppk_3') : null,
                'kekerasanpenganiayaan_pppk_4' => safe_post('kekerasanpenganiayaan_pppk_4') !== '' ? safe_post('kekerasanpenganiayaan_pppk_4') : null,
                'kekerasanpenganiayaan_pppk_5' => safe_post('kekerasanpenganiayaan_pppk_5') !== '' ? safe_post('kekerasanpenganiayaan_pppk_5') : null,
                'kekerasanpenganiayaan_pppk_6' => safe_post('kekerasanpenganiayaan_pppk_6') !== '' ? safe_post('kekerasanpenganiayaan_pppk_6') : null,
                'kekerasanpenganiayaan_pppk_7' => safe_post('kekerasanpenganiayaan_pppk_7') !== '' ? safe_post('kekerasanpenganiayaan_pppk_7') : null,
                'kekerasanpenganiayaan_pppk_8' => safe_post('kekerasanpenganiayaan_pppk_8') !== '' ? safe_post('kekerasanpenganiayaan_pppk_8') : null,
            ]),

            'masalah_keppppk' => json_encode([
                'masalah_keppppk_1' => safe_post('masalah_keppppk_1') !== '' ? safe_post('masalah_keppppk_1') : null,
                'masalah_keppppk_2' => safe_post('masalah_keppppk_2') !== '' ? safe_post('masalah_keppppk_2') : null,
                'masalah_keppppk_3' => safe_post('masalah_keppppk_3') !== '' ? safe_post('masalah_keppppk_3') : null,
                'masalah_keppppk_4' => safe_post('masalah_keppppk_4') !== '' ? safe_post('masalah_keppppk_4') : null,
                'masalah_keppppk_5' => safe_post('masalah_keppppk_5') !== '' ? safe_post('masalah_keppppk_5') : null,
                'masalah_keppppk_6' => safe_post('masalah_keppppk_6') !== '' ? safe_post('masalah_keppppk_6') : null,
                'masalah_keppppk_7' => safe_post('masalah_keppppk_7') !== '' ? safe_post('masalah_keppppk_7') : null,
                'masalah_keppppk_8' => safe_post('masalah_keppppk_8') !== '' ? safe_post('masalah_keppppk_8') : null,
                'masalah_keppppk_9' => safe_post('masalah_keppppk_9') !== '' ? safe_post('masalah_keppppk_9') : null,
                'masalah_keppppk_10' => safe_post('masalah_keppppk_10') !== '' ? safe_post('masalah_keppppk_10') : null,
                'masalah_keppppk_11' => safe_post('masalah_keppppk_11') !== '' ? safe_post('masalah_keppppk_11') : null,
                'masalah_keppppk_12' => safe_post('masalah_keppppk_12') !== '' ? safe_post('masalah_keppppk_12') : null,
                'masalah_keppppk_13' => safe_post('masalah_keppppk_13') !== '' ? safe_post('masalah_keppppk_13') : null,
                'masalah_keppppk_14' => safe_post('masalah_keppppk_14') !== '' ? safe_post('masalah_keppppk_14') : null,
            ]),

            'tanggal_pkkk' => (safe_post('tanggal_pkkk') !== '' ? datetime2mysql(safe_post('tanggal_pkkk')) : NULL),
            'perawatpkkk' => safe_post('perawatpkkk') !== '' ? safe_post('perawatpkkk') : NULL,
            'ttd_pppk' => safe_post('ttd_pppk') !== '' ? safe_post('ttd_pppk') : NULL

        );

        $response = $this->m_rawat_inap->updatePengkajianPasienPopulasiKhusus($data_populasi, $id_pppk);
        $this->response($response, REST_Controller::HTTP_OK);
    }
}
