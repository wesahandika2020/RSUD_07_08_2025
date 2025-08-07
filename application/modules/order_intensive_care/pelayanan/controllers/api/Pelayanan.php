<?php

defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

use function GuzzleHttp\json_decode;

/**
 * @package         CodeIgniter
 * @subpackage      Rest Server
 * @category        Controller
 * @author          Faiz Muhammad Syam
 * @license         Syams Corporation
 */
class Pelayanan extends REST_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->limit = 10;
        $this->datetime = date('Y-m-d H:i:s');
        $this->load->model('Pelayanan_model', 'm_pelayanan');
        $this->load->model('logs/Logs_model', 'm_m_logs');

        $id_translucent = $this->session->userdata('id_translucent');
        if (empty($id_translucent)) :
            $this->response(array('error' => 'Anda belum login'), REST_Controller::HTTP_UNAUTHORIZED);
            exit();
        endif;
    }

    function get_layanan_pendaftaran_detail_get()
    {
        if (!$this->get('id')) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
        endif;

        $this->load->model('pendaftaran/Pendaftaran_model', 'm_pendaftaran');
        
        $tipe = NULL;
        if ($this->get('tipe')) :
            $tipe = $this->get('tipe');
        endif;
        
        if ($tipe === 'cppt') :
            $data = $this->m_pendaftaran->getPendaftaranDetail($this->get('id', true), $this->get('id_layanan', true));
        elseif ($tipe === 'edukasi') :
            $data = $this->m_pendaftaran->getPendaftaranDetail($this->get('id', true), $this->get('id_layanan', true));
            // $data['edukasi'] = $this->m_pelayanan->getEdukasi($data['layanan']->id);
            // FEPDKT
            $data['edukasi'] = $this->m_pelayanan->getEdukasi($this->get('id'));
        else :
            $data = $this->m_pendaftaran->getPendaftaranDetail($this->get('id', true), $this->get('id_layanan', true));
            $data['anamnesa']     = $this->m_pelayanan->getAnamnesa($data['layanan']->id);
            $data['profil']       = $this->m_pelayanan->getProfilPasien($data['pasien']->id_pasien);
            $data['soap']         = $this->m_pelayanan->getSOAP($data['layanan']->id);
            $data['diagnosa']     = $this->m_pelayanan->getDiagnosaPemeriksaan($data['layanan']->id);
            $data['tindakan']     = $this->m_pelayanan->getTindakanPemeriksaan($data['layanan']->id);
            $data['operasi']      = $this->m_pelayanan->getJadwalTindakanOperasi($data['layanan']->id);
            $data['bhp']          = $this->m_pelayanan->getBHPPemeriksaan($data['layanan']->id);
            $data['tindakan_bhp'] = $this->m_pelayanan->getTindakanPemeriksaanBHP($data['layanan']->id);
            $data['subspesialis'] = $this->m_pelayanan->checkSubSpesialis((int)$data['layanan']->id_unit_layanan);
        endif;

        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK); // (200)
        endif;
    }

// fungsi untuk mendapatkan detail layanan untuk pemulasaran jenazah
    function get_layanan_pendaftaran_detail_untuk_pemulasaran_get()
    {
        if (!$this->get('id')) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
        endif;

        $this->load->model('pendaftaran/Pendaftaran_model', 'm_pendaftaran');
        
        $tipe = NULL;
        if ($this->get('tipe')) :
            $tipe = $this->get('tipe');
        endif;
       
            $data = $this->m_pendaftaran->getPendaftaranDetailUntukPemulasaran($this->get('id', true), $this->get('id_layanan', true));
            $data['diagnosa']     = $this->m_pelayanan->getDiagnosaPemeriksaanUntukPemulasaran($data['layanan']->id_pendaftaran);        
        
            $data['asal_ruangan']  = $this->m_pelayanan->getAsalRuangan($this->get('id', true));
            
        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK); // (200)
        endif;
    }
    function get_profil_pasien_get() {
        if (!$this->get('id')) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
        endif;

        $data['data'] = $this->m_pelayanan->getProfilPasien($this->get('id'));
        $this->response($data, REST_Controller::HTTP_OK);
    }

    function update_profil_pasien_put()
    {
        if (!$this->put('id_profil_pasien')) :
            $this->response(array('status' => false, 'message' => 'Parameter tidak lengkap'), REST_Controller::HTTP_OK);
        endif;

        $id = $this->put('id_profil_pasien');

        $data = array(
            'is_potensi_komplain' => ($this->put('pasien_potensi_komplain') !== '' ? $this->put('pasien_potensi_komplain') : NULL),
            'is_pemilik_rs' => ($this->put('pasien_pemilik_rs') !== '' ? $this->put('pasien_pemilik_rs') : NULL),
            'is_pasien_pejabat' => ($this->put('pasien_pejabat') !== '' ? $this->put('pasien_pejabat') : NULL),
        );

        $response = $this->m_pelayanan->updateProfilPasien($data, $id);
        $this->response($response, REST_Controller::HTTP_OK);

    }

    function get_visitasi_get()
    {
        if (!$this->get('id', true)) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
        endif;

        $data = $this->m_pelayanan->getVisitasiByID($this->get('id', true));
        $this->response($data, REST_Controller::HTTP_OK);
    }

    function hapus_visitasi_delete($id)
    {
        $status = $this->m_pelayanan->deleteVisitasi($id);
        if ($status) :
            $response = array('status' => $status, 'message' => 'Berhasil menghapus visitasi!');
        else :
            $response = array('status' => $status, 'message' => 'Gagal menghapus visitasi!');
        endif;
        $this->response($response, REST_Controller::HTTP_OK);
    }

    function update_visitasi_put()
    {
        if (!$this->put('id', true)) :
            $this->response(array('status' => false), REST_Controller::HTTP_OK);
        endif;

        $data = array(
            'id' => $this->put('id', true),
            'tensi_sistolik' => $this->put('tensi_sistolik', true),
            'tensi_diastolik' => $this->put('tensi_diastolik', true),
            'nadi' => $this->put('nadi', true),
            'suhu' => $this->put('suhu', true),
            'nps' => $this->put('nafas', true),
            'rr' => $this->put('respirasi', true),
            'keluhan_utama' => $this->put('keluhan_utama', true),
            'keterangan' => $this->put('keterangan', true),
            'id_users' => $this->session->userdata('id_translucent'),
        );

        $status = $this->m_pelayanan->updateVisitasi($data);
        $this->response(array('status' => $status), REST_Controller::HTTP_OK);

    }

    function get_list_vital_sign_get($id_layanan_pendaftaran)
    {
        $data = $this->m_pelayanan->getAnamnesa($id_layanan_pendaftaran);
        $result['data'] = $data;
        $tensi_s = array();
        $tensi_d = array();
        $nadi = array();
        $suhu = array();
        $respirasi = array();
        $nafas = array();
        if (0 < count((array)$data)) :
            foreach ($data as $i => $value) :
                $result['waktu'][] = $value->waktu !== NULL ? datetimefmysql($value->waktu, true) : '';
                $tensi_s[] = (double) $value->tensi_sistolik;
                $tensi_d[] = (double) $value->tensi_diastolik;
                $nadi[] = (int) $value->nadi;
                $suhu[] = (int) $value->suhu;
                $nafas[] = (int) $value->nps;
                $respirasi[] = (int) $value->rr;
            endforeach;

            $result['title_tensi'] = 'Grafik Status Tekanan Darah Pasien';
            $result['title_nadi'] = 'Grafik Status Denyut Nadi Pasien';
            $result['title_suhu'] = 'Grafik Status Suhu Tubuh Pasien';
            $result['title_nafas'] = 'Grafik Status Nafas Pasien';
            $result['title_respirasi'] = 'Grafik Status Respirasi Pasien';
            $result['tensi'] = array(
                array('name' => 'Sistolik', 'stack' => 'Sistolik', 'data' => $tensi_s),
                array('name' => 'Diastolik', 'stack' => 'Diastolik', 'data' => $tensi_d)
            );
            $result['nadi'] = array(array('type' => 'spline', 'name' => 'Nadi', 'data' => $nadi));
            $result['suhu'] = array(array('type' => 'spline', 'name' => 'Suhu', 'data' => $suhu));
            $result['nafas'] = array(array('type' => 'spline', 'name' => 'Nafas', 'data' => $nafas));
            $result['respirasi'] = array(array('type' => 'spline', 'name' => 'Respirasi', 'data' => $respirasi));
        else :
            $result = NULL;
        endif;
        $this->response($result, REST_Controller::HTTP_OK);
    }

    function hapus_soap_delete($id)
    {
        $status = $this->m_pelayanan->deleteSOAP($id);
        if ($status) :
            $response = array('status' => $status, 'message' => 'Berhasil menghapus visitasi!');
        else :
            $response = array('status' => $status, 'message' => 'Gagal menghapus visitasi!');
        endif;
        $this->response($response, REST_Controller::HTTP_OK);
    }

    function get_soap_get()
    {
        if (!$this->get('id', true)) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
        endif;

        $data = $this->m_pelayanan->getSOAPByID($this->get('id', true));
        $this->response($data, REST_Controller::HTTP_OK);
    }

    function update_soap_put()
    {
        if (!$this->put('id', true)) :
            $this->response(array('status' => false), REST_Controller::HTTP_OK);
        endif;

        $data = array(
            'id' => $this->put('id', true),
            'subject' => $this->put('subject', true),
            'objective' => $this->put('objective', true),
            'assessment' => $this->put('assessment', true),
            'plan' => $this->put('plan', true),
            'keterangan' => $this->put('keterangan', true),
            'id_users' => $this->session->userdata('id_translucent'),
        );

        $status = $this->m_pelayanan->updateSOAP($data);
        $this->response(array('status' => $status), REST_Controller::HTTP_OK);

    }

    function hapus_diagnosa_pemeriksaan_delete($id)
    {
        $this->m_pelayanan->deleteDiagnosaPemeriksaan($id);
        
        $response = array(
            'status' => true,
            'message' => 'Berhasil menghapus diagnosa'
        );

        $this->response($response, REST_Controller::HTTP_OK);
    }

    function hapus_tindakan_pemeriksaan_delete($id, $jenis = NULL)
    {
        $response = array(
            'status' => false,
            'message' => 'Gagal menghapus tindakan'
        );

        if ($jenis !== NULL) :
            if ($jenis === 'Poliklinik') :
                $jenis = 'Tindakan';
            else :
                if ($jenis === 'Rawat Inap') :
                    $jenis = 'Rawat Inap';
                else :
                    if ($jenis === 'Intensive Care') :
                        $jenis = 'Intensive Care';
                    else :
                        if ($jenis === 'Pemulasaran Jenazah') :
                            $jenis = 'Pemulasaran Jenazah';
                        else :
                        $jenis = 'Tindakan';
                        endif;
                    endif;
                endif;
            endif;
            $response = $this->m_pelayanan->deleteTindakanPemeriksaan($id, $jenis);
        else :
            $response = array(
                'status' => false,
                'message' => 'Gagal menghapus tindakan, parameter tidak lengkap'
            );
        endif;

        $this->response($response, REST_Controller::HTTP_OK);
    }

    function simpan_pemeriksaan_post() 
    {
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
                'id_layanan_pendaftaran'    => $layanan['id'],
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
            );
        } else {
            $visitasi = array(
                'id_layanan_pendaftaran'    => $layanan['id'],
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
                'id_layanan_pendaftaran'    => $layanan['id'],
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
                        $this->m_pelayanan->updateAnamnesa($anamnesa);
                        $jenis = 'Rawat Jalan';
                        endif;
                    endif;
                endif;
            endif;
        

        // cek profil pasien
        $checkProfilPasien = $this->db->query("select * from sm_profil_pasien where id_pasien = '".safe_post('id_pasien')."'")->row();
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
        );

        if ($jenis !== "Rawat Inap") :
            $diagnosa['post'] = array(1);
        endif;
        // echo json_encode($diagnosa); die;
        // insert data diagnosa
        $this->m_pelayanan->simpanDiagnosaPemeriksaan($layanan['id'], $diagnosa, safe_post('id_pasien'));
        
        // data tindakan
        $tindakan = array(
            'operator' => $this->post('id_operator'),
            'tindakan' => $this->post('id_tindakan'),
            'qty'      => $this->post('qty'),
        );
        
        //  insert data tindakan
        $this->m_pelayanan->simpanTindakanPemeriksaan($layanan['id'], $tindakan, $jenis);
        
        if (safe_post('jenis_layanan') === 'Poliklinik') :
            $this->m_pelayanan->updateDokterTindakanKonsultasi($layanan['id'], $dokter, $lp_status->status_terlayani);
        else :
            $posted = true;
            if (safe_post('jenis_layanan') === 'IGD') :
                $posted = false;
            endif;

            if (safe_post('jenis_layanan') === 'Rawat Inap') :
                $posted = false;
            endif;

            if ($posted) :
                $data_logs = array(
                    'waktu'       => $this->datetime,
                    'status'      => safe_post('jenis_layanan'),
                    'id_dokter'   => $dokter,
                    'query'       => "select pd.* from sm_layanan_pendaftaran as lp 
                                      join sm_pendaftaran as pd on (pd.id = lp.id_pendaftaran) 
                                      where lp.id = '". $layanan['id']."' ",
                    'no_register' => $layanan['id'],
                    'klinik'      => ''
                );

                $this->db->insert('sm_logs_error', $data_logs);
            endif;  
        endif;

        // insert data BHP
        $kemasan = safe_post('id_kemasan');
        if (is_array($kemasan)) :
            $this->m_pelayanan->simpanBHP();
        endif;

        // insert data Order Operasi
        $id_tarif_operasi = safe_post('id_tarif_operasi');
        $timing = safe_post('timing');
        $bobot = safe_post('bobot');
        if (is_array($id_tarif_operasi)) :
            foreach ($id_tarif_operasi as $i => $val) :
                $data_operasi = array(
                    'id_tarif' => $val,
                    'bobot' => $bobot[$i],
                    'timing' => $timing[$i],
                    'id_layanan_pendaftaran' => $layanan['id'],
                    'id_pasien' => safe_post('id_pasien')
                );
                $this->m_pelayanan->simpanJadwalOperasi($data_operasi);
            endforeach;
        endif;

        // insert data Order VK
        $order_vk = safe_post('jml_order_vk');
        if (is_array($order_vk)) :
            foreach ($order_vk as $i => $val) :
                $data_vk = array(
                    'id_layanan_pendaftaran' => $layanan['id'],
                    'id_pasien' => safe_post('id_pasien'),
                    'layanan' => 'VK',
                );
                $this->m_pelayanan->simpanOrderVK($data_vk);
            endforeach;
        endif;

        // update tanggal periksa
        $waktu_periksa = array('id_layanan_pendaftaran' => $layanan['id'], 'waktu' => $this->datetime);
        $this->m_pelayanan->updateWaktuPeriksa($waktu_periksa);

        // update tracer
        $this->load->model('Tracer_model', 'tracer');
        $this->tracer->updateStatusBerkas($layanan['id']);

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

    function simpan_pemeriksaan_icare_post() 
    {
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
        if (safe_post('jenis_layanan') !== 'Intensive Care') {
            $anamnesa = array(
                'id_layanan_pendaftaran'    => $layanan['id'],
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
            );
        } else {
            $visitasi = array(
                'id_layanan_pendaftaran'    => $layanan['id'],
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
                'id_layanan_pendaftaran'    => $layanan['id'],
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
       
            if (safe_post('jenis_layanan') === 'Intensive Care') :
                $this->m_pelayanan->insertAnamnesa($visitasi);
                $this->m_pelayanan->insertSOAP($soap);
                $jenis = 'Intensive Care';
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
                        $this->m_pelayanan->updateAnamnesa($anamnesa);
                        $jenis = 'Rawat Jalan';
                        endif;
                    endif;
                endif;
            endif;
       

        // cek profil pasien
        $checkProfilPasien = $this->db->query("select * from sm_profil_pasien where id_pasien = '".safe_post('id_pasien')."'")->row();
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
        );

        if ($jenis !== "Intensive Care" ) :
            $diagnosa['post'] = array(1);
        endif;
        // echo json_encode($diagnosa); die;
        // insert data diagnosa
        $this->m_pelayanan->simpanDiagnosaPemeriksaan($layanan['id'], $diagnosa, safe_post('id_pasien'));
        
        // data tindakan
        $tindakan = array(
            'operator' => $this->post('id_operator'),
            'tindakan' => $this->post('id_tindakan'),
            'qty'      => $this->post('qty'),
        );
        
        //  insert data tindakan
        $this->m_pelayanan->simpanTindakanPemeriksaan($layanan['id'], $tindakan, $jenis);
        
        if (safe_post('jenis_layanan') === 'Poliklinik') :
            $this->m_pelayanan->updateDokterTindakanKonsultasi($layanan['id'], $dokter, $lp_status->status_terlayani);
        else :
            $posted = true;
            if (safe_post('jenis_layanan') === 'IGD') :
                $posted = false;
            endif;

            if (safe_post('jenis_layanan') === 'Intensive Care') :
                $posted = false;
            endif;

            if ($posted) :
                $data_logs = array(
                    'waktu'       => $this->datetime,
                    'status'      => safe_post('jenis_layanan'),
                    'id_dokter'   => $dokter,
                    'query'       => "select pd.* from sm_layanan_pendaftaran as lp 
                                      join sm_pendaftaran as pd on (pd.id = lp.id_pendaftaran) 
                                      where lp.id = '". $layanan['id']."' ",
                    'no_register' => $layanan['id'],
                    'klinik'      => ''
                );

                $this->db->insert('sm_logs_error', $data_logs);
            endif;  
        endif;

        // insert data BHP
        $kemasan = safe_post('id_kemasan');
        if (is_array($kemasan)) :
            $this->m_pelayanan->simpanBHP();
        endif;

        // insert data Order Operasi
        $id_tarif_operasi = safe_post('id_tarif_operasi');
        $timing = safe_post('timing');
        $bobot = safe_post('bobot');
        if (is_array($id_tarif_operasi)) :
            foreach ($id_tarif_operasi as $i => $val) :
                $data_operasi = array(
                    'id_tarif' => $val,
                    'bobot' => $bobot[$i],
                    'timing' => $timing[$i],
                    'id_layanan_pendaftaran' => $layanan['id'],
                    'id_pasien' => safe_post('id_pasien')
                );
                $this->m_pelayanan->simpanJadwalOperasi($data_operasi);
            endforeach;
        endif;

        // insert data Order VK
        $order_vk = safe_post('jml_order_vk');
        if (is_array($order_vk)) :
            foreach ($order_vk as $i => $val) :
                $data_vk = array(
                    'id_layanan_pendaftaran' => $layanan['id'],
                    'id_pasien' => safe_post('id_pasien'),
                    'layanan' => 'VK',
                );
                $this->m_pelayanan->simpanOrderVK($data_vk);
            endforeach;
        endif;

        // update tanggal periksa
        $waktu_periksa = array('id_layanan_pendaftaran' => $layanan['id'], 'waktu' => $this->datetime);
        $this->m_pelayanan->updateWaktuPeriksa($waktu_periksa);

        // update tracer
        $this->load->model('Tracer_model', 'tracer');
        $this->tracer->updateStatusBerkas($layanan['id']);

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

    function get_tindakan_detail_get()
    {
        if (!$this->get('id', true)) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
        endif;

        $data     = $this->m_pelayanan->getTindakanDetail($this->get('id', true));
        $response = array('status' => true, 'data' => $data);
        $this->response($response, REST_Controller::HTTP_OK);
    }

    function update_operator_tindakan_put()
    {
        $this->db->trans_begin();
        $operator = $this->put('operator', true) !== '' ? $this->put('operator', true) : NULL;
        $id = $this->put('id_tarif_tindakan', true);
        $tindakan = $this->m_pelayanan->getTindakanDetail($id);
        $id_layanan_pendaftaran = $tindakan->id_layanan_pendaftaran;
        $catatan = 'Tindakan : ' . $tindakan->layanan;
        $catatan .= '<br>Sebelum edit : Operator ' . $tindakan->operator;
        
        // update operator tindakan
        $update = ['id_operator' => $operator];
        $this->db->where('id', $id)->update('sm_tarif_tindakan_pasien', $update);

        $tindakan = $this->m_pelayanan->getTindakanDetail($id);
        $catatan .= '<br>Setelah edit : Operator ' . $tindakan->operator;

        if ($this->db->trans_status() === false) :
            $this->db->trans_rollback();
            $status = false;
        else :
            $this->db->trans_commit();
            $this->load->model('logs/Logs_model', 'm_logs');
            $this->m_logs->recordAdminLogs($id_layanan_pendaftaran, 'Edit Operator Tindakan', $catatan);
            $status = true;
        endif;

        $message = array('status' => $status);
        $this->response($message, REST_Controller::HTTP_OK);
    }

    function get_tindakan_list_get() 
    {
        if (!$this->get('id_layanan', true)) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
        endif;

        $data = $this->m_pelayanan->getTindakanPemeriksaan($this->get('id_layanan', true));
        $response = array('status' => true, 'data' => $data);
        $this->response($response, REST_Controller::HTTP_OK);
    }

    function update_waktu_tindakan_put()
    {
        $this->db->trans_begin();
        $id = $this->put('id', true);
        $waktu = $this->put('waktu', true);
        $tindakan = $this->m_pelayanan->getTindakanDetail($id);
        $id_layanan_pendaftaran = $tindakan->id_layanan_pendaftaran;
        $catatan = 'Tindakan : ' . $tindakan->layanan;
        $catatan .= '<br>Sebelum edit : Waktu ' . $tindakan->tanggal;

        // update tanggal tindakan
        $update = ['tanggal' => $waktu];
        $this->db->where('id', $id)->update('sm_tarif_tindakan_pasien', $update);

        $tindakan = $this->m_pelayanan->getTindakanDetail($id);
        $catatan .= '<br>Setelah edit : Waktu ' . $tindakan->tanggal;

        if ($this->db->trans_status() === false) :
            $this->db->trans_rollback();
            $status = false;
        else :
            $this->db->trans_commit();
            $this->load->model('logs/Logs_model', 'm_logs');
            $this->m_logs->recordAdminLogs($id_layanan_pendaftaran, 'Edit Waktu Tindakan', $catatan);
            $status = true;
        endif;

        $message = array('status' => $status, 'id_layanan_pendaftaran' => $id_layanan_pendaftaran);
        $this->response($message, REST_Controller::HTTP_OK);
    }

    function simpan_konsul_post()
    {
        $this->db->trans_begin();
        $id_pendaftaran = safe_post('id_pendaftaran');
        $id_layanan_pendaftaran = safe_post('id_layanan_pendaftaran');
        $layanan = $this->post('layanan') != '' ? $this->post('layanan') : NULL;
        $jenis_layanan = 'Poliklinik';
        $catatan = 'Konsul ke ';

        $layanan_pendaftaran_last = $this->m_pelayanan->getLastLayananPendaftaran($id_pendaftaran);
        $this->load->model('pendaftaran/Pendaftaran_model', 'pendaftaran');
        foreach ($layanan as $index => $value) :
            $no_antrian = $this->pendaftaran->getNextNoAntrian(array('id_unit' => $value, 'tanggal' => date('Y-m-d')));
            $layanan_pendaftaran = array(
                'id_pendaftaran'  => $id_pendaftaran,
                'tanggal_layanan' => $this->datetime,
                'id_unit_layanan' => $value,
                'no_antrian'      => $no_antrian,
                'jenis_layanan'   => $jenis_layanan,
                'konsul'          => 1,
                'kondisi'         => 'Hidup',
                'resusitasi'      => 0,
                'cara_bayar'      => $layanan_pendaftaran_last->cara_bayar,
                'id_penjamin'     => $layanan_pendaftaran_last->id_penjamin,
                'no_polish'       => $layanan_pendaftaran_last->no_polish,
                'id_users'        => $this->session->userdata('id_translucent')
            );

            $id = $this->pendaftaran->simpanDataLayananPendaftaran($layanan_pendaftaran);
            $this->m_pelayanan->updateLastLayanan($id, true);

            $this->load->model('spesialisasi/Spesialisasi_model', 'sp');
            $spesialis = $this->sp->getDataSpesialisasiById($value);
            if ($spesialis->id_tarif !== NULL) :
                $tindakan = array('operator' => array(''), 'tindakan' => array($spesialis->id_tarif), 'qty' => array(1));
                $this->m_pelayanan->simpanTindakanPemeriksaan($id, $tindakan, 'Pendaftaran');
            endif;

            $catatan .= 'Klinik ' . $spesialis->nama;
            if ($index < count(array($layanan)) - 1) :
                $catatan .= ', ';
            endif;
        endforeach;

        $tindak_lanjut = array('tindak_lanjut' => 'Klinik Lain', 'kondisi'=> 'Hidup');
        $this->m_pelayanan->updateTindakLanjut($id_layanan_pendaftaran, $tindak_lanjut);
        if ($this->db->trans_status() === FALSE) :
            $this->db->trans_rollback();
            $status = false;
        else :
            $this->db->trans_commit();
            $status = true;
        endif;

        $this->load->model('logs/Logs_model', 'm_logs');
        $this->m_logs->recordAdminLogs($id_layanan_pendaftaran, 'Konsul Klinik', $catatan);
        $message = array('id' => $layanan_pendaftaran['id_pendaftaran'], 'status' => $status, 'message' => '');
        $this->response($message, REST_Controller::HTTP_OK);
    }

    function hapus_bhp_delete()
    {
        $data_bhp = array("id_penjualan" => $this->get("id"), "id_kemasan" => $this->get("id_kemasan"), "id_barang" => $this->get("id_barang"));
        $data = $this->m_pelayanan->deleteDataBHP($data_bhp);
        exit(json_encode($data));
    }

    // resep
    function get_pasien_last_resep_get()
    {
        $data = $this->m_pelayanan->getLastResepPasien($this->get("id"));
        $this->response($data, REST_Controller::HTTP_OK);
    }

    function get_list_history_resep_get()
    {
        if (!$this->get("page")) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
        endif;

        $search = array(
                "key"           => safe_get("pencarian"),
                "id"            => $this->get("id"),
                "status"        => safe_get("status"),
                "tanggal_awal"  => date2mysql(safe_get("tanggal_awal")),
                "tanggal_akhir" => date2mysql(safe_get("tanggal_akhir")),
                "dokter"        => safe_get("dokter"),
                "pasien"        => safe_get("pasien"),
                "barang"        => safe_get("nama"),
                "sediaan"       => safe_get("sediaan"),
                "formularium"   => safe_get("formularium"),
                "fornas"        => safe_get("fornas"),
                "generik"       => safe_get("generik"),
                "roa"           => safe_get("roa"),
                "ven"           => safe_get("ven"),
                "golongan"      => safe_get("golongan") !== "" ? implode(",", safe_get("golongan")): "",
                "katastropik"   => safe_get("katastropik"),
                "id_lp"         => safe_get("id_layanan_pendaftaran"),
                "cara_bayar"    => safe_get("cara_bayar"),
                "penjamin"      => safe_get("penjamin"),
                "id_unit"       => safe_get("unit")
        );

        $start = ($this->get("page") - 1) * $this->limit;
        $data = $this->m_pelayanan->getListDataHistoryResep($this->limit, $start, $search);
        $data["page"] = (int) $this->get("page");
        $data["limit"] = $this->limit;
        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK);
        else :
            $this->response(array("error" => "Data tidak ditemukan"), REST_Controller::HTTP_NOT_FOUND);
        endif;
    }

    function simpan_data_resep_post()
    {
        $data = $this->m_pelayanan->simpanDataResep();
        $this->response($data, REST_Controller::HTTP_OK);
    }

    function get_data_resep_get()
    {
        $result = array();
        $data   = $this->m_pelayanan->getDataResepById(safe_get('id'));
        $result = $data;
        if (!empty($_GET['cek_stok']) && !empty($data['data']) && !empty($data['data'][0]->resep_r)) :
            $arr_resep_r = array();
            foreach ($data['data'][0]->resep_r as $i => $val) :
                $tmp_resep_r = $val;
                if (!empty($val->resep_r_detail)) :
                    $arr_resep_r_detail = array();
                    foreach ($val->resep_r_detail as $j => $val2) :
                        $tmp_resep_r_detail = $val2;
                        $tmp_resep_r_detail->stok_awal = $val2->sisa - 0;
                        $tmp_resep_r_detail->stok_akhir = $val2->sisa - $val2->jumlah_pakai;
                        $arr_resep_r_detail[] = $tmp_resep_r_detail;
                        if ($tmp_resep_r_detail->stok_akhir < 0) :
                            $arr_warning[] = array(
                                "code" => NULL, 
                                "message" => "Stok " . $val2->nama_barang . " tidak mencukupi. Sisa stok " . $val2->sisa . " " . $val2->sediaan . ", akan digunakan " . $val2->jumlah_pakai . " " . $val2->sediaan, "key_resep_r" => $i, "key_resep_r_detail" => $j
                            );
                        endif;
                    endforeach;
                    $tmp_resep_r->resep_r_detail = $arr_resep_r_detail;
                endif;
                $arr_resep_r[] = $tmp_resep_r;
            endforeach;
            $result['data'][0]->resep_r = $arr_resep_r;
            if (!empty($arr_warning)) :
                $result['status']['warning'] = $arr_warning;
            endif;
        endif;

        $this->response($result, REST_Controller::HTTP_OK);
    }

    function get_resep_tebus_get()
    {
        $data = $this->m_pelayanan->getListDataResepTebus($this->get('id', true));
        $this->response($data, REST_Controller::HTTP_OK);
    }

    // end resep

    function delete_penjualan_delete()
    {
        $data = $this->m_pelayanan->deletePenjualan($this->get("id", true));
        $this->response($data, REST_Controller::HTTP_OK);
    }

    // CEK
    function cek_diagnosa_akhir_get()
    {
        if (!$this->get('id')) :
            $result = array('status' => false, 'message' => 'Parameter tidak lengkap');
            $this->response($result, REST_Controller::HTTP_OK);
        endif;

        $id     = $this->get('id');
        $status = $this->m_pelayanan->cekDiagnosaAkhir($id);
        $result = array('status' => $status);
        $this->response($result, REST_Controller::HTTP_OK);
    }

    function cek_status_bhp_operasi_get()
    {
        $data = $this->m_pelayanan->checkStatusBHPOperasi($this->get("id_layanan_pendaftaran"));
        $this->response($data, REST_Controller::HTTP_OK);
    }

    function simpan_tindak_lanjut_post($jenis = NULL) {
        $this->db->trans_begin();
        $status_order_ranap     = true;
        $message                = '';
        $id_pendaftaran         = '';
        $id_layanan_pendaftaran = '';
        $pindah_ipj             = 'Tidak';
        if (safe_post('id_layanan_pendaftaran') === '') :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
        endif;

        $id_pendaftaran         = safe_post('id_pendaftaran');
        $id_layanan_pendaftaran = safe_post('id_layanan_pendaftaran');

        $cek_resep = $this->db->select('count(*) as count')->from('sm_resep')->where('id_layanan_pendaftaran', $id_layanan_pendaftaran, true)->get()->row()->count;
        if (safe_post('tanpa_resep') !== 'Ya' && $cek_resep < 1 ) :
            $response = array(
                'id_pendaftaran'         => $id_pendaftaran,
                'id_layanan_pendaftaran' => $id_layanan_pendaftaran,
                'status'                 => false,
                'message'                => "Pasien <b>Belum</b> menerima resep <br> Apakah anda yakin akan men-checkout pasien ?",
            );

            echo json_encode($response); die;
        endif;

        $layanan_pendaftaran = $this->db->select('tindak_lanjut')->get_where('sm_layanan_pendaftaran', array('id' => $id_layanan_pendaftaran))->row();
        if (0 < count((array)$layanan_pendaftaran) && $layanan_pendaftaran->tindak_lanjut !== NULL) :
            $response = array(
                'status'  => false, 
                'message' => 'Pasien sudah keluar', 
            );
            echo json_encode($response); die;
        endif;
        // Update Data Tindak Lanjut / Checkout
        $data = array(
            'tindak_lanjut' => safe_post('tindak_lanjut'), 
            'kondisi'       => safe_post('kondisi_keluar')
        );
        $this->m_pelayanan->updateTindakLanjut($id_layanan_pendaftaran, $data);

        if ($data['tindak_lanjut'] === 'Pulang' | $data['tindak_lanjut'] === 'Pulang APS' | $data['tindak_lanjut'] === 'Atas Izin Dokter' | $data['tindak_lanjut'] === 'Pulang Paksa' | $data['tindak_lanjut'] === 'Melarikan Diri' | $data['tindak_lanjut'] === 'Perujuk') :
            $pindah_ipj = safe_post('pindah_ipj');
            // Update Data Tindak Lanjut di Table Pendaftaran
            $pendaftaran = array(
                'tanggal_keluar' => $this->datetime, 
                'kondisi_keluar' => $this->post('kondisi_keluar')
            );
            $this->db->where('id', $id_pendaftaran)->update('sm_pendaftaran', $pendaftaran);
            $message = 'Berhasil mengubah status pasien menjadi Pulang / Pulang APS';
        else :
            if ($data['tindak_lanjut'] === 'RS Lain') :
                $pendaftaran = array(
                    'tanggal_keluar'      => $this->datetime, 
                    'kondisi_keluar'      => safe_post('kondisi_keluar'), 
                    'id_instansi_merujuk' => safe_post('instansi_rujukan') ?: NULL,
                    'nadis_merujuk' => safe_post('dokter') ?: NULL,
                    'keterangan_rujukan' => safe_post('keterangan_rujukan') ?: NULL
                );
                $this->db->where('id', $id_pendaftaran)->update('sm_pendaftaran', $pendaftaran);
                $message = 'Berhasil merujuk pasien ke RS Lain';
            else :
                if ($data['tindak_lanjut'] === 'IGD') :
                    $data_layanan_pendaftaran = array(
                        'id_pendaftaran' => $id_pendaftaran, 
                        'tanggal_layanan'=> $this->datetime, 
                        'jenis_layanan'  => $data['tindak_lanjut'], 
                        'kondisi'        => safe_post('kondisi_keluar'), 
                        'resusitasi'     => 0, 
                        'cara_bayar'     => 'Tunai',
                        'id_users'       => $this->session->userdata('id_translucent')
                    );
                    $this->load->model('pendaftaran/Pendaftaran_model', 'pendaftaran');
                    $this->pendaftaran->simpanDataLayananPendaftaran($data_layanan_pendaftaran);
                    
                    $update_pendaftaran = array(
                        'jenis_igd' => safe_post('jenis_igd')
                    );
                    $this->db->where('id', $id_pendaftaran, true)->update('sm_pendaftaran', $update_pendaftaran);
                    $message = 'Berhasil memindahkan pasien ke pelayanan ' . $data["tindak_lanjut"];
                // jika pasien tindak lanjut nya pemulasaran jenazah
                else :
                    if ($data['tindak_lanjut'] === 'Pemulasaran Jenazah') :
                        $data_layanan_pendaftaran = array(
                            'id_pendaftaran' => $id_pendaftaran, 
                            'tanggal_layanan'=> $this->datetime, 
                            'jenis_layanan'  => $data['tindak_lanjut'], 
                            'kondisi'        => $this->post('kondisi_keluar'), 
                            'resusitasi'     => 0,
                            'cara_bayar'     => 'Tunai', 
                            'id_users'       => $this->session->userdata('id_translucent')
                        );
                        $this->load->model('pendaftaran/Pendaftaran_model', 'pendaftaran');
                        $this->pendaftaran->simpanDataLayananPendaftaran($data_layanan_pendaftaran);
                        
                        $message = 'Berhasil memindahkan pasien ke pelayanan ' . $data["tindak_lanjut"];
                    endif;
                endif;
            endif;
        endif;

        // get id_pasien di sm_pendaftaran
        $pasien = $this->db->select('id_pasien')->get_where('sm_pendaftaran', array('id' => $id_pendaftaran))->row();
        if (safe_post('kondisi_keluar') === 'Meninggal' | safe_post('kondisi_keluar') === 'Meninggal < 48 Jam' | safe_post('kondisi_keluar') === 'Meninggal > 48 Jam') :
            // update table sm_profil_pasien -> is_died = Ya
            $this->db->where('id_pasien', $pasien->id_pasien)->update('sm_profil_pasien', array('is_died' => 'Ya'));
        endif;


        if ($jenis === 'Inap') :
            $this->m_pelayanan->dischargeToRawatInap($id_layanan_pendaftaran);
            if ($data['tindak_lanjut'] === 'Pulang' | $data['tindak_lanjut'] === 'Pulang APS' | $data['tindak_lanjut'] === 'Atas Izin Dokter' | $data['tindak_lanjut'] === 'Pulang Paksa' | $data['tindak_lanjut'] === 'Melarikan Diri' | $data['tindak_lanjut'] === 'Perujuk' | $data['tindak_lanjut'] === 'Pemulasaran Jenazah') :
                $this->m_pelayanan->insertAdministrasiRawatInap($id_pendaftaran, $id_layanan_pendaftaran);
            endif;
        endif;

        if ($data['tindak_lanjut'] === 'Rawat Inap') :
            $add = array(
                'waktu'                  => $this->datetime,
                'id_pendaftaran'         => $id_pendaftaran,
                'id_layanan_pendaftaran' => $id_layanan_pendaftaran,
                'id_dokter'              => safe_post('dokter') !== '' ? safe_post('dokter') : NULL,
                'id_dokter_dpjp'         => safe_post('dokter_dpjp') !== '' ? safe_post('dokter_dpjp') : NULL,
                'id_bangsal_tujuan'      => safe_post('bangsal') !== '' ? safe_post('bangsal') : NULL,
                'is_pindah_ruang'        => safe_post('pindah_ruang') !== '' ?  safe_post('pindah_ruang') : 0
            );
            $status_order_ranap = $this->m_pelayanan->simpanOrderRawatInap($add);
        endif;
        
        //intensive care
        if ($data['tindak_lanjut'] === 'Intensive Care') :
            $add = array(
                'waktu'                  => $this->datetime,
                'id_pendaftaran'         => $id_pendaftaran,
                'id_layanan_pendaftaran' => $id_layanan_pendaftaran,
                'id_dokter'              => safe_post('dokter') !== '' ? safe_post('dokter') : NULL,
                'id_dokter_dpjp'         => safe_post('dokter_dpjp') !== '' ? safe_post('dokter_dpjp') : NULL
            );
            $status_order_icare = $this->m_pelayanan->simpanOrderIntensiveCare($add);
        endif;

        //Kebidanan
        if ($data['tindak_lanjut'] === 'Kebidanan') :
            $add = array(
                'waktu'                  => $this->datetime,
                'id_pendaftaran'         => $id_pendaftaran,
                'id_layanan_pendaftaran' => $id_layanan_pendaftaran,
                'id_dokter'              => safe_post('dokter') !== '' ? safe_post('dokter') : NULL,
                'id_dokter_dpjp'         => safe_post('dokter_dpjp') !== '' ? safe_post('dokter_dpjp') : NULL
            );
            $status_order_kebidanan = $this->m_pelayanan->simpanOrderKebidanan($add);
        endif;

        $this->m_pelayanan->insertResumeDiagnosa($id_pendaftaran);


        if ($this->db->trans_status() === false) :
            $this->db->trans_rollback();
            $status  = false;
            $message = "Gagal mengubah status keluar pasien";
        else :
            $this->db->trans_commit();
            $status = true;
            
            if ($status_order_ranap) :
                $status = true;
                $message = "Berhasil men-checkout pasien";
            else :
                $status = false;
                $message = "Gagal memindahkan pasien ke Rawat Inap, pasien masih dalam status order rawat inap";
            endif;

            

            $vclaim = NULL;
            if ($jenis === "Inap" && $data['tindak_lanjut'] === 'Pulang' | $data['tindak_lanjut'] === 'Pulang APS' | $data['tindak_lanjut'] === 'Atas Izin Dokter' | $data['tindak_lanjut'] === 'Pulang Paksa' | $data['tindak_lanjut'] === 'Melarikan Diri' | $data['tindak_lanjut'] === 'Perujuk' | $data['tindak_lanjut'] === 'Pemulasaran Jenazah') :
                $vclaim = $this->updateTanggalPulangSEP($id_pendaftaran);
            endif;

        endif;
        
        $this->load->model('logs/Logs_model', 'm_logs');
        $this->m_logs->recordAdminLogs($id_layanan_pendaftaran, 'Status Keluar ' . $data['tindak_lanjut']);
        $response = array('status' => $status, 'token' => $this->security->get_csrf_hash(), 'message' => $message);
        $this->response($response, REST_Controller::HTTP_OK);
    }

    function simpan_tindak_lanjut_icare_post($jenis = NULL) {
        $this->db->trans_begin();
        $status_order_icare     = true;
        $message                = '';
        $id_pendaftaran         = '';
        $id_layanan_pendaftaran = '';
        $pindah_ipj             = 'Tidak';
        if (safe_post('id_layanan_pendaftaran') === '') :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
        endif;

        $id_pendaftaran         = safe_post('id_pendaftaran');
        $id_layanan_pendaftaran = safe_post('id_layanan_pendaftaran');

        $cek_resep = $this->db->select('count(*) as count')->from('sm_resep')->where('id_layanan_pendaftaran', $id_layanan_pendaftaran, true)->get()->row()->count;
        if (safe_post('tanpa_resep') !== 'Ya' && $cek_resep < 1 ) :
            $response = array(
                'id_pendaftaran'         => $id_pendaftaran,
                'id_layanan_pendaftaran' => $id_layanan_pendaftaran,
                'status'                 => false,
                'message'                => "Pasien <b>Belum</b> menerima resep <br> Apakah anda yakin akan men-checkout pasien ?",
            );

            echo json_encode($response); die;
        endif;

        $layanan_pendaftaran = $this->db->select('tindak_lanjut')->get_where('sm_layanan_pendaftaran', array('id' => $id_layanan_pendaftaran))->row();
        if (0 < count((array)$layanan_pendaftaran) && $layanan_pendaftaran->tindak_lanjut !== NULL) :
            $response = array(
                'status'  => false, 
                'message' => 'Pasien sudah keluar', 
            );
            echo json_encode($response); die;
        endif;
        // Update Data Tindak Lanjut / Checkout
        $data = array(
            'tindak_lanjut' => safe_post('tindak_lanjut'), 
            'kondisi'       => safe_post('kondisi_keluar')
        );
        $this->m_pelayanan->updateTindakLanjut($id_layanan_pendaftaran, $data);

        if ($data['tindak_lanjut'] === 'Pulang' | $data['tindak_lanjut'] === 'Pulang APS' | $data['tindak_lanjut'] === 'Atas Izin Dokter' | $data['tindak_lanjut'] === 'Pulang Paksa' | $data['tindak_lanjut'] === 'Melarikan Diri' | $data['tindak_lanjut'] === 'Perujuk') :
            $pindah_ipj = safe_post('pindah_ipj');
            // Update Data Tindak Lanjut di Table Pendaftaran
            $pendaftaran = array(
                'tanggal_keluar' => $this->datetime, 
                'kondisi_keluar' => $this->post('kondisi_keluar')
            );
            $this->db->where('id', $id_pendaftaran)->update('sm_pendaftaran', $pendaftaran);
            $message = 'Berhasil mengubah status pasien menjadi Pulang / Pulang APS';
        else :
            if ($data['tindak_lanjut'] === 'RS Lain') :
                $pendaftaran = array(
                    'tanggal_keluar'      => $this->datetime, 
                    'kondisi_keluar'      => safe_post('kondisi_keluar'), 
                    'id_instansi_merujuk' => safe_post('instansi_rujukan') ?: NULL,
                    'nadis_merujuk' => safe_post('dokter') ?: NULL,
                    'keterangan_rujukan' => safe_post('keterangan_rujukan') ?: NULL
                );
                $this->db->where('id', $id_pendaftaran)->update('sm_pendaftaran', $pendaftaran);
                $message = 'Berhasil merujuk pasien ke RS Lain';
            else :
                if ($data['tindak_lanjut'] === 'IGD') :
                    $data_layanan_pendaftaran = array(
                        'id_pendaftaran' => $id_pendaftaran, 
                        'tanggal_layanan'=> $this->datetime, 
                        'jenis_layanan'  => $data['tindak_lanjut'], 
                        'kondisi'        => safe_post('kondisi_keluar'), 
                        'resusitasi'     => 0, 
                        'cara_bayar'     => 'Tunai',
                        'id_users'       => $this->session->userdata('id_translucent')
                    );
                    $this->load->model('pendaftaran/Pendaftaran_model', 'pendaftaran');
                    $this->pendaftaran->simpanDataLayananPendaftaran($data_layanan_pendaftaran);
                    
                    $update_pendaftaran = array(
                        'jenis_igd' => safe_post('jenis_igd')
                    );
                    $this->db->where('id', $id_pendaftaran, true)->update('sm_pendaftaran', $update_pendaftaran);
                    $message = 'Berhasil memindahkan pasien ke pelayanan ' . $data["tindak_lanjut"];
                // jika pasien tindak lanjut nya pemulasaran jenazah
                else :
                    if ($data['tindak_lanjut'] === 'Pemulasaran Jenazah') :
                        $data_layanan_pendaftaran = array(
                            'id_pendaftaran' => $id_pendaftaran, 
                            'tanggal_layanan'=> $this->datetime, 
                            'jenis_layanan'  => $data['tindak_lanjut'], 
                            'kondisi'        => $this->post('kondisi_keluar'), 
                            'resusitasi'     => 0,
                            'cara_bayar'     => 'Tunai', 
                            'id_users'       => $this->session->userdata('id_translucent')
                        );
                        $this->load->model('pendaftaran/Pendaftaran_model', 'pendaftaran');
                        $this->pendaftaran->simpanDataLayananPendaftaran($data_layanan_pendaftaran);
                        
                        $message = 'Berhasil memindahkan pasien ke pelayanan ' . $data["tindak_lanjut"];
                    endif;
                endif;
            endif;
        endif;

        // get id_pasien di sm_pendaftaran
        $pasien = $this->db->select('id_pasien')->get_where('sm_pendaftaran', array('id' => $id_pendaftaran))->row();
        if (safe_post('kondisi_keluar') === 'Meninggal' | safe_post('kondisi_keluar') === 'Meninggal < 48 Jam' | safe_post('kondisi_keluar') === 'Meninggal > 48 Jam') :
            // update table sm_profil_pasien -> is_died = Ya
            $this->db->where('id_pasien', $pasien->id_pasien)->update('sm_profil_pasien', array('is_died' => 'Ya'));
        endif;


       if ($jenis === 'Inap') :
            $this->m_pelayanan->dischargeToIntensiveCare($id_layanan_pendaftaran);
            if ($data['tindak_lanjut'] === 'Pulang' | $data['tindak_lanjut'] === 'Pulang APS' | $data['tindak_lanjut'] === 'Atas Izin Dokter' | $data['tindak_lanjut'] === 'Pulang Paksa' | $data['tindak_lanjut'] === 'Melarikan Diri' | $data['tindak_lanjut'] === 'Perujuk' | $data['tindak_lanjut'] === 'Pemulasaran Jenazah') :
                $this->m_pelayanan->insertAdministrasiIntensiveCare($id_pendaftaran, $id_layanan_pendaftaran);
            endif;
        endif;

        if ($data['tindak_lanjut'] === 'Rawat Inap') :
            $add = array(
                'waktu'                  => $this->datetime,
                'id_pendaftaran'         => $id_pendaftaran,
                'id_layanan_pendaftaran' => $id_layanan_pendaftaran,
                'id_dokter'              => safe_post('dokter') !== '' ? safe_post('dokter') : NULL,
                'id_dokter_dpjp'         => safe_post('dokter_dpjp') !== '' ? safe_post('dokter_dpjp') : NULL,
                'id_bangsal_tujuan'      => safe_post('bangsal') !== '' ? safe_post('bangsal') : NULL,
                'is_pindah_ruang'        => safe_post('pindah_ruang') !== '' ?  safe_post('pindah_ruang') : 0
            );
            $status_order_ranap = $this->m_pelayanan->simpanOrderRawatInap($add);
        endif;
        
        //intensive care
        if ($data['tindak_lanjut'] === 'Intensive Care') :
            $add = array(
                'waktu'                  => $this->datetime,
                'id_pendaftaran'         => $id_pendaftaran,
                'id_layanan_pendaftaran' => $id_layanan_pendaftaran,
                'id_dokter'              => safe_post('dokter') !== '' ? safe_post('dokter') : NULL,
                'id_dokter_dpjp'         => safe_post('dokter_dpjp') !== '' ? safe_post('dokter_dpjp') : NULL
                
            );
            $status_order_icare = $this->m_pelayanan->simpanOrderIntensiveCare($add);

        endif;

        //Kebidanan
        if ($data['tindak_lanjut'] === 'Kebidanan') :
            $add = array(
                'waktu'                  	=> $this->datetime,
                'id_pendaftaran'         	=> $id_pendaftaran,
                'id_layanan_pendaftaran' 	=> $id_layanan_pendaftaran,
                'id_dokter'              	=> safe_post('dokter') !== '' ? safe_post('dokter') : NULL,
                'id_dokter_dpjp'         	=> safe_post('dokter_dpjp') !== '' ? safe_post('dokter_dpjp') : NULL,
                'id_bangsal_tujuan'      	=> safe_post('bangsal') !== '' ? safe_post('bangsal') : NULL,
                'is_pindah_ruang'        	=> safe_post('pindah_ruang') !== '' ?  safe_post('pindah_ruang') : 0
            );
            $status_order_kebidanan = $this->m_pelayanan->simpanOrderKebidanan($add);
        endif;
        
        $this->m_pelayanan->insertResumeDiagnosa($id_pendaftaran);


        if ($this->db->trans_status() === false) :
            $this->db->trans_rollback();
            $status  = false;
            $message = "Gagal mengubah status keluar pasien";
        else :
            $this->db->trans_commit();
            $status = true;
            
            if ($status_order_icare) :
                $status = true;
                $message = "Berhasil men-checkout pasien";
            else :
                $status = false;
                $message = "Gagal memindahkan pasien ke Intensive Care, pasien masih dalam status order intensive care";
            endif;

            $vclaim = NULL;
            if ($jenis === "Inap" && $data['tindak_lanjut'] === 'Pulang' | $data['tindak_lanjut'] === 'Pulang APS' | $data['tindak_lanjut'] === 'Atas Izin Dokter' | $data['tindak_lanjut'] === 'Pulang Paksa' | $data['tindak_lanjut'] === 'Melarikan Diri' | $data['tindak_lanjut'] === 'Perujuk' | $data['tindak_lanjut'] === 'Pemulasaran Jenazah') :
                $vclaim = $this->updateTanggalPulangSEP($id_pendaftaran);
            endif;

        endif;
        
        $this->load->model('logs/Logs_model', 'm_logs');
        $this->m_logs->recordAdminLogs($id_layanan_pendaftaran, 'Status Keluar ' . $data['tindak_lanjut']);
        $response = array('status' => $status, 'token' => $this->security->get_csrf_hash(), 'message' => $message);
        $this->response($response, REST_Controller::HTTP_OK);
    }

    function pembatalan_status_keluar_get() 
    {
        if (!$this->get('id_pendaftaran') & !$this->get('id_layanan_pendaftaran')) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
        endif;
        $id_pendaftaran         = $this->get('id_pendaftaran');
        $id_layanan_pendaftaran = $this->get('id_layanan_pendaftaran');
        $response = $this->m_pelayanan->pembatalanStatusKeluar($id_pendaftaran, $id_layanan_pendaftaran);
        $this->load->model('logs/Logs_model', 'm_logs');
        $this->m_logs->recordAdminLogs($id_layanan_pendaftaran, 'Batal Status keluar ' . $response['tindak_lanjut']);
        $this->response($response, REST_Controller::HTTP_OK);
    }

    function pembatalan_status_keluar_icare_get() 
    {
        if (!$this->get('id_pendaftaran') & !$this->get('id_layanan_pendaftaran')) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
        endif;
        $id_pendaftaran         = $this->get('id_pendaftaran');
        $id_layanan_pendaftaran = $this->get('id_layanan_pendaftaran');
        $response = $this->m_pelayanan->pembatalanStatusKeluarIcare($id_pendaftaran, $id_layanan_pendaftaran);
        $this->load->model('logs/Logs_model', 'm_logs');
        $this->m_logs->recordAdminLogs($id_layanan_pendaftaran, 'Batal Status keluar ' . $response['tindak_lanjut']);
        $this->response($response, REST_Controller::HTTP_OK);
    }
    
    function updateTanggalPulangSEP($id_pendaftaran) 
    {
        $this->db->select('pd.no_sep')->from('sm_pendaftaran as pd')->where('pd.id', $id_pendaftaran, true)->where('pd.no_sep is not null');
        $layanan = $this->db->get()->row();
        $result = NULL;
        if ($layanan) :
            $no_sep = $layanan->no_sep;
            $data = array('no_sep' => $no_sep, 'tanggal_pulang' => date('d/m/Y'), 'user' => $this->session->userdata('account'));
            $result = postCurl(base_url().URL_VCLAIM."update_tgl_pulang_sep", http_build_query($data));
        endif;

        return $result;
    }
    
    function get_item_laboratorium_get()
    {
        if (!$this->get('id_layanan') | $this->get('id_layanan') === '') {
            $response = array('status' => false, 'message' => 'Kesalahan aplikasi, parameter kurang lengkap');
            $this->response($response, 200);
        }
        $id_layanan = $this->get('id_layanan');
        $message = 'OK';
        $data = $this->m_pelayanan->get_item_laboratorium_by_layanan($id_layanan);
        if (sizeof($data) < 1) {
            $message = 'Tarif laboratorium yang dipilih belum mempunyai item pemeriksaan.<br/>Hubungi administrator untuk meminta penambahan item pemeriksaan';
        }
        $response = array('status' => true, 'message' => $message, 'data' => $data);
        $this->response($response, 200);
    }
    
    function order_laboratorium_post()
    {
        $status = true;
        $message = "";
        $id_layanan_pendaftaran = $this->post('id_layanan');
        $item_post = $this->post('tindakan_lab');
        $cito = $this->post('cito');
        $item_lab = $this->post('item_lab');
        $item_lab_label = $this->post('item_lab_label');
        $sql = "select lp.*, pj.diskon
                from sm_layanan_pendaftaran lp
                left join sm_penjamin pj on (pj.id = lp.id_penjamin)
                where lp.id = '" . $id_layanan_pendaftaran . "' ";
        $layanan_pendaftaran = $this->db->query($sql)->row();
        
        if (0 < count((array)$layanan_pendaftaran)) {
            $arr_item = array();
            if (is_array($item_post)) {
                foreach ($item_post as $key => $value) {
                    if ($value !== '') {
                        $arr_item[$key]['layanan'] = $value;
                        $arr_item[$key]['cito'] = $cito[$key];
                        $arr_item[$key]['item_lab'] = $item_lab[$key];
                        $arr_item[$key]['item_lab_label'] = $item_lab_label[$key];
                    }
                }

                if (is_array($arr_item)) {
                    $item = "[";
                    foreach ($arr_item as $key => $value) {
                        if ($value !== '') {
                            $cek = $this->m_pelayanan->cek_penjaminan_tarif($value['layanan'], $layanan_pendaftaran->id_penjamin);
                            $penjamin = 0;
                            if (0 < $cek) {
                                $penjamin = $layanan_pendaftaran->id_penjamin;
                            }
                            $item .= "{\"item\":\"" . $value['layanan'] . "\",\"penjamin\":\"" . $penjamin . "\",\"cito\":\"" . $value['cito'] . "\", \"item_lab\":" . ($value['item_lab'] !== "" ? $value['item_lab'] : "[]") . " , \"item_lab_label\":\"" . $value['item_lab_label'] . "\"}";
                            if ($key < sizeof($arr_item) - 1) {
                                $item .= ",";
                            }
                        }
                    }
                    $item .= "]";
                    $request = array(
                        'id_layanan_pendaftaran' => (int)$this->post('id_layanan'),
                        'id_dokter' => $this->post('dokter') !== '' & $this->post('dokter') !== 'none' ? (int)$this->post('dokter') : 'NULL',
                        'waktu_order' => "'".date('Y-m-d H:i:s')."'",
                        'jenis' => "'".$this->post('jenis')."'",
                        'status' => "'request'",
                        'item' => "'".$item."'"
                    );
                    $this->m_pelayanan->add_order_laboratorium($request);
                    $status = true;
                    $message = "Berhasil order laboratorium";
                } else {
                    $status = false;
                    $message = "Gagal order laboratorium, anda belum memilih item pemerikaan";
                }
            } else {
                $status = false;
                $message = "Gagal order laboratorium, anda belum memilih item pemerikaan";
            }
        } else {
            $status = false;
            $message = "Gagal order laboratorium, Kesalahan sistem.<br/>Ulangi transaksi dan mohon segera hubungi admin";
        }
        $response = array("status" => $status, "message" => $message);
        $this->response($response, 200);
    }
    
    function pemeriksaan_laboratorium_detail_get()
    {
        if (!$this->get("id")) {
            $this->response(NULL, 400);
        }
        $data = $this->m_pelayanan->get_pemeriksaan_laboratorium($this->get("id"), "list");
        foreach ($data as $key => $value) {
            $value->detail = $this->m_pelayanan->get_pemeriksaan_laboratorium_detail($value->id);
        }
        $request = $this->m_pelayanan->get_request_laboratorium($this->get("id"));
        foreach ($request as $key => $value) {
            $data[] = $value;
        }
        $this->response($data, 200);
    }
    
    function order_radiologi_post()
    {
        $status = true;
        $message = "";
        $id_layanan_pendaftaran = $this->post('id_layanan');
        $item_post = $this->post('tindakan_rad');
        $cito = $this->post('cito');
        $item_rad = $this->post('item_rad');
        $item_rad_label = $this->post('item_rad_label');
        $sql = "select lp.*, pj.diskon
                from sm_layanan_pendaftaran lp
                left join sm_penjamin pj on (pj.id = lp.id_penjamin)
                where lp.id = '" . $id_layanan_pendaftaran . "' ";
        $layanan_pendaftaran = $this->db->query($sql)->row();
        
        if (0 < count((array)$layanan_pendaftaran)) {
            $arr_item = array();
            if (is_array($item_post)) {
                foreach ($item_post as $key => $value) {
                    if ($value !== '') {
                        $arr_item[$key]['layanan'] = $value;
                        $arr_item[$key]['cito'] = $cito[$key];
                        $arr_item[$key]['item_rad'] = $item_rad[$key];
                        $arr_item[$key]['item_rad_label'] = $item_rad_label[$key];
                    }
                }

                if (is_array($arr_item)) {
                    $item = "[";
                    foreach ($arr_item as $key => $value) {
                        if ($value !== '') {
                            $cek = $this->m_pelayanan->cek_penjaminan_tarif($value['layanan'], $layanan_pendaftaran->id_penjamin);
                            $penjamin = 0;
                            if (0 < $cek) {
                                $penjamin = $layanan_pendaftaran->id_penjamin;
                            }
                            $item .= "{\"item\":\"" . $value['layanan'] . "\",\"penjamin\":\"" . $penjamin . "\",\"cito\":\"" . $value['cito'] . "\", \"item_rad\":" . ($value['item_rad'] !== "" ? $value['item_rad'] : "[]") . " , \"item_rad_label\":\"" . $value['item_rad_label'] . "\"}";
                            if ($key < sizeof($arr_item) - 1) {
                                $item .= ",";
                            }
                        }
                    }
                    $item .= "]";
                    $request = array(
                        'id_layanan_pendaftaran' => (int)$this->post('id_layanan'),
                        'id_dokter' => $this->post('dokter') !== '' & $this->post('dokter') !== 'none' ? (int)$this->post('dokter') : 'NULL',
                        'waktu_order' => "'".date('Y-m-d H:i:s')."'",
                        'jenis' => "'".$this->post('jenis_rad')."'",
                        'status' => "'request'",
                        'item' => "'".$item."'"
                    );
                    $this->m_pelayanan->add_order_radiologi($request);
                    $status = true;
                    $message = "Berhasil order radiologi";
                } else {
                    $status = false;
                    $message = "Gagal order radiologi, anda belum memilih item pemerikaan";
                }
            } else {
                $status = false;
                $message = "Gagal order radiologi, anda belum memilih item pemerikaan";
            }
        } else {
            $status = false;
            $message = "Gagal order radiologi, Kesalahan sistem.<br/>Ulangi transaksi dan mohon segera hubungi admin";
        }
        $response = array("status" => $status, "message" => $message);
        $this->response($response, 200);
    }
    
    function pemeriksaan_radiologi_detail_get()
    {
        if (!$this->get("id")) {
            $this->response(NULL, 400);
        }
        $data = $this->m_pelayanan->get_pemeriksaan_radiologi($this->get("id"), "list");
        foreach ($data as $key => $value) {
            $value->detail = $this->m_pelayanan->get_pemeriksaan_radiologi_detail($value->id);
        }
        $request = $this->m_pelayanan->get_request_radiologi($this->get("id"));
        foreach ($request as $key => $value) {
            $data[] = $value;
        }
        $this->response($data, 200);
    }

    function get_detail_radiologi_get() 
    {
        if (!$this->get("id")) {
            $this->response(NULL, 400);
        }
        
        $data = $this->m_pelayanan->getDetailRadiologi($this->get('id'));
        $this->response($data, REST_Controller::HTTP_OK);
    }

    // fisioterapi
    function get_pemeriksaan_fisioterapi_detail_get()
    {
        if (!$this->get('id', true)) {
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
        }
        $id = $this->get('id', true);
        $data = $this->m_pelayanan->getPemeriksaanFisioterapi($id, 'list');
        foreach ($data as $key => $value) {
            $value->detail = $this->m_pelayanan->getPemeriksaanFisioterapiDetail($value->id);
        }

        $request = $this->m_pelayanan->getRequestFisioterapi($id);
        foreach ($request as $key => $value) {
            $data[] = $value;
        }

        $this->response($data, REST_Controller::HTTP_OK);
    }

    function simpan_order_fisioterapi_post()
    {
        $status = true;
        $message = "";
        $dataRequest = array(
            "id_layanan_pendaftaran" => (int)$this->post("id_layanan_pendaftaran"), 
            "id_dokter" => $this->post("dokter") !== "" & $this->post("dokter") !== "none" ? (int)$this->post("dokter") : NULL,
            "waktu_order" => "'" . $this->datetime . "'",
            "status" => "'request'", 
            "item" => NULL
        );
        $itemPost = $this->post("id_tindakan_fisio");
        $sql = "select lp.*, pj.diskon 
                from sm_layanan_pendaftaran as lp 
                left join sm_penjamin as pj on (pj.id = lp.id_penjamin) 
                where lp.id = '".$dataRequest["id_layanan_pendaftaran"]."' ";
        $data  = $this->db->query($sql)->row();
        if (0 < count((array)$data)) {
            $item = array();
            if (is_array($itemPost)) {
                foreach ($itemPost as $key => $value) {
                    if ($value !== "") {
                        $item[] = $value;
                    }
                }

                if (is_array($item)) {
                    $dataRequest["item"] = "'[";
                    foreach ($item as $key => $value) {
                        if ($value !== "") {
                            $cek = $this->m_pelayanan->cek_penjaminan_tarif($value, $data->id_penjamin);
                            $penjamin = 0;
                        }

                        if (0 < $cek) {
                            $penjamin = $data->id_penjamin;
                        }

                        $dataRequest["item"] .= "{\"item\":\"" . $value . "\",\"penjamin\":\"" . $penjamin . "\"}";
                        if ($key < count((array)$item) - 1) {
                            $dataRequest["item"] .= ",";
                        }
                    }
                    $dataRequest["item"] .= "]'";
                    $responseSimpan = $this->m_pelayanan->simpanOrderFisioterapi($dataRequest);

                    if ($responseSimpan) {
                        $status = true;
                        $message = "Berhasil order rehabilitasi medik";
                    } else {
                        $status = false;
                        $message = "Gagal order rehabilitasi medik";
                    }
                } else {
                    $status = false;
                    $message = "Gagal order rehabilitasi medik, anda belum memilih item pemeriksaan";
                }
            } else {
                $status = false;
                $message = "Gagal order rehabilitasi medik, anda belum memilih item pemeriksaan";
            }
        } else {
            $status = false;
            $message = "Gagal order Rehabilitasi medik, Terjadi kesalahan sistem.<br>Ulangi transaksi dan segera hubungi admin";
        }

        $response = array("status" => $status, "message" => $message);
        $this->response($response, REST_Controller::HTTP_OK);   
    }


    function get_detail_fisioterapi_get() 
    {
        if (!$this->get("id")) {
            $this->response(NULL, 400);
        }
        
        $data = $this->m_pelayanan->getDetailFisioterapi($this->get('id'));
        $this->response($data, REST_Controller::HTTP_OK);
    }
    // end fisioterapi

    // signature
    function upload_signature_post()
    {
        $id = safe_post('id'); 
        $name = safe_post('name'); 
        $imageData = base64_decode($_POST['signature']);
        $imageName = 'ttd-' . $id . '-' . str_replace(' ', '-', $name) . '.png'; 
        // update to your database
        if ($id !== '') {
            // location to where you want to created sign image
            $fileName = './signatures/' . $imageName;
            // write_file('./signatures/' . $imageName, $imageData, 'r+');
            $upload = file_put_contents($fileName, $imageData);
            if ($upload) {
                $status = $this->db->where('id', $id)->update('sm_pegawai', array('signature' => $imageName));
                if ($status) {
                    $result['status'] = $status;
                } else {
                    $result['status'] = $status;
                }
            } else {
                $result['status'] = false;
            }
            $result['filename'] = $imageName;
            $this->response($result, REST_Controller::HTTP_OK);
        }
    }
    // signature

    // cppt
    function simpan_cppt_post()
    {
        if (!safe_post('id_layanan_pendaftaran')) :
            $this->response(array('status' => false, 'message' => 'Parameter tidak lengkap'), REST_Controller::HTTP_BAD_REQUEST);
        endif;

        $data = array(
            'id' => safe_post('id_cppt'),
            'id_layanan_pendaftaran' => safe_post('id_layanan_pendaftaran'),
            'waktu' => (safe_post('waktu_cppt') !== '' ? datetime2mysql(safe_post('waktu_cppt')) : NULL),
            'id_profesi' => safe_post('profesi'),
            'subject' => safe_post('subject'),
            'objective' => safe_post('objective'),
            'assessment' => safe_post('assessment'),
            'plan' => safe_post('plan'),
            'hasil' => safe_post('hasil'),
            'id_nadis' => (safe_post('nadis') !== '' ? safe_post('nadis') : NULL),
            'ttd_nadis' => (safe_post('ttd_nadis') !== '' ? safe_post('ttd_nadis') : NULL),
            'instruksi_ppa' => safe_post('instruksi'),
            'id_dokter_dpjp' => (safe_post('dokter_dpjp') !== '' ? safe_post('dokter_dpjp') : NULL),
            'id_user' => $this->session->userdata('id_translucent'),
            'konsul_via_telp' => (safe_post('konsul_via_telp') !== '' ? safe_post('konsul_via_telp') : 0),
        ); 

        $response = $this->m_pelayanan->updateCPPT($data);
        $this->response($response, REST_Controller::HTTP_OK);
    }

    function get_list_cppt_get()
    {
        if (!$this->get('page', true)) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
        endif;
        $limit = 5;
        $start  = ($this->get('page') - 1) * $limit;
        $search = [
            'keyword' => safe_get('keyword'),
            'waktu' => date2mysql(safe_get('waktu')),
            'id_layanan_pendaftaran'  => $this->get('id_layanan_pendaftaran', true),
            'id_pendaftaran'  => $this->get('id_pendaftaran', true),	
		];
        
        $data            = $this->m_pelayanan->getListDataCPPT($limit, $start, $search);
        $data['page']    = (int) $this->get('page');
        $data['limit']   = $limit;

        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK); // (200)
        endif;
    }

    function get_cppt_get()
    {
        if (!$this->get('id', true)) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
        endif;

        $data = $this->m_pelayanan->getCPPT($this->get('id', true));
        $this->response($data, REST_Controller::HTTP_OK);
    }
    
    function hapus_cppt_delete($id)
    {
        $status = $this->m_pelayanan->deleteCPPT($id);
        if ($status) :
            $response = array('status' => $status, 'message' => 'Berhasil Menghapus Catatan Perkembangan Pasien Terintegrasi');
        else :
            $response = array('status' => $status, 'message' => 'Gagal Menghapus Catatan Perkembangan Pasien Terintegrasi');
        endif;
        $this->response($response, REST_Controller::HTTP_OK);
    }

    function verifikasi_tbak_post()
    {
        if (!$this->post('id', true)) :
            $this->response(array('status' => false, 'message' => 'Parameter tidak lengkap'));
        endif;

        $data = array(
            'waktu_penerima_tbak' => (safe_post('waktu_penerima_tbak') !== '' ? datetime2mysql(safe_post('waktu_penerima_tbak')) : NULL),
            'waktu_pemberi_tbak' => (safe_post('waktu_pemberi_tbak') !== '' ? datetime2mysql(safe_post('waktu_pemberi_tbak')) : NULL),
            'id_nadis_tbak' => safe_post('nadis_tbak'),
            'id_dokter_dpjp_tbak' => safe_post('dokter_dpjp_tbak'),
            'ttd_nadis_tbak' => safe_post('ttd_nadis_tbak'),
            'ttd_dokter_dpjp_tbak' => safe_post('ttd_dokter_dpjp_tbak'),
        );

        $status = $this->db->where('id', $this->post('id', true), true)->update('sm_cppt', $data);
        if ($status) {
            $response['status'] = $status;
            $response['message'] = 'Berhasil memverifikasi CPPT dengan metode TBAK';
        } else {
            $response['status'] = $status;
            $response['message'] = 'Berhasil memverifikasi CPPT dengan metode TBAK';
        }
        $this->response($response, REST_Controller::HTTP_OK);
    }

    function get_cppt_verified_get()
    {
        if (!$this->get('id', true)) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
        endif;

        $data = $this->m_pelayanan->getVerifiedCPPT($this->get('id', true));
        $this->response($data, REST_Controller::HTTP_OK);
    }
    // end cppt

    // edukasi
    function simpan_edukasi_post()
    {
        $this->db->trans_begin();
        if (!$this->post('id_layanan_pendaftaran', true)) :
            $this->response(array('status' => false, 'alert' => 'error', 'message' => 'Parameter tidak lengkap'), REST_Controller::HTTP_BAD_GATEWAY);
        endif;

        if (!$this->post('id')) {
            $data = array(
                'id_layanan_pendaftaran' => safe_post('id_layanan_pendaftaran'),
                'waktu' => $this->datetime,
                'sedia_menerima_info' => safe_post('sedia_menerima_informasi'),
                'bahasa' => safe_post('bahasa'),
                'ket_bahasa_lain' => safe_post('bahasa_lain'),
                'ket_bahasa_daerah' => safe_post('daerah'),
                'butuh_penterjemah' => safe_post('kebutuhan_penterjemah'),
                'baca_tulis' => safe_post('baca_tulis'),
                'tipe_pembelajaran' => safe_post('tipe_belajar'),
                'hambatan_edukasi' => safe_post('hambatan_edukasi'),
                'ket_hambatan_edukasi' => safe_post('hambatan_edukasi_lain'),
                'perencanaan_edukasi' => (safe_post('perencanaan_edukasi') !== '' ? implode(', ', safe_post('perencanaan_edukasi')) : ''),
                'id_user' => $this->session->userdata('id_translucent'),
                'created_date' => $this->datetime,
            );
            
            $id_edukasi = $this->m_pelayanan->simpanEdukasi($data);
        } else {
            $id_edukasi = $this->post('id');
        }


        $data_detail = array(
            'id_edu' => $this->post('id_edu', true),
            'id_topik_edu' => $this->post('id_topik_edu') !== '' ? $this->post('id_topik_edu', true) : NULL,
            'ket_topik_edu' => $this->post('ket_topik_edu') !== '' ? $this->post('ket_topik_edu', true) : NULL,
            'tanggal_edu' => $this->post('tanggal_edu') !== '' ? $this->post('tanggal_edu', true) : NULL,
            'nama_keluarga_edu' => $this->post('nama_keluarga_edu') !== '' ? $this->post('nama_keluarga_edu', true) : NULL,
            'status_hubungan_edu' => $this->post('status_hubungan_edu') !== '' ? $this->post('status_hubungan_edu', true) : NULL,
            'id_edukator_edu' => $this->post('id_edukator_edu') !== '' ? $this->post('id_edukator_edu', true) : NULL,
            'pemahaman_awal_edu' => $this->post('pemahaman_awal_edu') !== '' ? $this->post('pemahaman_awal_edu', true) : NULL,
            'metoda_edu' => $this->post('metoda_edu') !== '' ? $this->post('metoda_edu', true) : NULL,
            'media_edu' => $this->post('media_edu') !== '' ? $this->post('media_edu', true) : NULL,
            'evaluasi_edu' => $this->post('evaluasi_edu') !== '' ? $this->post('evaluasi_edu', true) : NULL,
            'tanggal_re_edu' => $this->post('tanggal_re_edu') !== '' ? $this->post('tanggal_re_edu') : NULL,
        );

        $this->m_pelayanan->simpanDetailEdukasi($data_detail, $id_edukasi);
        if ($this->db->trans_status() === false) :
            $this->db->trans_rollback();
            $response = array('status' => false, 'alert' => 'error', 'message' => 'Gagal menyimpan edukasi pasien dan keluarga terintegrasi');
        else :
            $this->db->trans_commit();
            $response = array('status' => true, 'alert' => 'success', 'message' => 'Berhasil menyimpan edukasi pasien dan keluarga terintegrasi');
        endif;

        $this->response($response, REST_Controller::HTTP_OK);
    }

    function hapus_edukasi_delete($id)
    {
        $status = $this->m_pelayanan->deleteEdukasi($id);
        if ($status) {
            $response = array('status' => $status, 'message' => 'Berhasil menghapus edukasi');
        } else {
            $response = array('status' => $status, 'message' => 'Gagal menghapus edukasi');
        }
        $this->response($response, REST_Controller::HTTP_OK);
    }
    // end edukasi

    // surat
    function simpan_surat_post()
    {
        if (!$this->post('id_layanan_pendaftaran', true)) :
            $this->response(array('status' => false, 'message' => 'Parameter tidak lengkap'), REST_Controller::HTTP_BAD_GATEWAY);
        endif;

        $data = array(
            'id' => safe_post('id'),
            'id_layanan_pendaftaran' => safe_post('id_layanan_pendaftaran'),
            'kode' => $this->m_pelayanan->getAutoNumberSurat($this->post('id_layanan_pendaftaran'), $this->post('jenis_surat_aps')),
            'waktu' => $this->datetime,
            'nik' => safe_post('nik_pjwb_aps'),
            'nama' => safe_post('nama_pjwb_aps'),
            'tanggal_lahir' => (safe_post('tgl_lahir_pjwb_aps') !== '' ? date2mysql(safe_post('tgl_lahir_pjwb_aps')) : NULL),
            'kelamin' => safe_post('kelamin_pjwb_aps'),
            'alamat' => safe_post('alamat_pjwb_aps'),
            'no_telp' => safe_post('telp_pjwb_aps'),
            'status_hubungan' => safe_post('status_hubungan_pjwb_aps'),
            'jenis_surat' => safe_post('jenis_surat_aps'),
            'alasan' => safe_post('alasan'),
            'id_pasien' => (safe_post('id_pasien') !== '' ? safe_post('id_pasien') : NULL),
            'id_user' => $this->session->userdata('id_translucent'),
        );
        
        $reponse = $this->m_pelayanan->simpanSurat($data);
        $this->response($reponse, REST_Controller::HTTP_OK);
    }

    function get_data_surat_get()
    {
        if (!$this->get('id_layanan_pendaftaran', true)) :
            $this->response(array('status' => false, 'message' => 'Parameter tidak lengkap'), REST_Controller::HTTP_BAD_GATEWAY);
        endif;
        
        $data = $this->m_pelayanan->getDataSurat($this->get('id_layanan_pendaftaran', true));
        $this->response($data, REST_Controller::HTTP_OK);
    }
    // end surat

    // penjualan
    function get_detail_harga_barang_penjualan_get()
    {
        $param = array(
            'id_barang' => $this->get('id', true),
            'id_kemasan' => $this->get('id_kemasan', true)
        );
        $data = $this->m_pelayanan->getDetailHargaBarangPenjualan($param);
        $this->response($data, REST_Controller::HTTP_OK);
    }

    function get_data_penjualan_get()
    {
        $id = $this->get('id', true);
        $data = $this->m_pelayanan->getDataPenjualan($id);
        $this->response($data, REST_Controller::HTTP_OK);
    }

    function delete_data_penjualan_delete()
    {
        $id = $this->get('id', true);
        $data = $this->m_pelayanan->deleteDataPenjualan($id);
        $this->response($data, REST_Controller::HTTP_OK);
    }

    function get_detail_penjualan_get()
    {
        $id = $this->get('id', true);
        $data = $this->m_pelayanan->getDataDetailPenjualan($id);
        $this->response($data, REST_Controller::HTTP_OK);
    }
    // end penjualan

    // operasi
    function get_load_data_operasi_get()
    {
        $jenis = $this->get('jenis', true);
        $id_layanan = $this->get('id_layanan', true);
        $data = $this->m_pelayanan->getLoadDataOperasi($id_layanan, $jenis)->result();
        exit(json_encode($data));
    }

    function hapus_jadwal_operasi_delete()
    {
        $id = $this->delete('id', true);
        $id_layanan_pendaftaran = $this->delete('id_layanan_pendaftaran', true);
        $jenis = $this->delete('jenis', true);
        $data = $this->m_pelayanan->hapusJadwalOperasi($id, $id_layanan_pendaftaran, $jenis);
        exit(json_encode($data));
    }
    // end operasi

    function check_history_pembayaran_get()
    {
        $param = ['table' => $this->get('table', true), 'id' => $this->get('id', true)];
        $data = $this->m_pelayanan->checkHistoryPembayaran($param);
        $this->response($data, REST_Controller::HTTP_OK);
    }
}
