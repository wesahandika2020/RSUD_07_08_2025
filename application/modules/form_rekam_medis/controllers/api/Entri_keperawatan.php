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
class Entri_keperawatan extends REST_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->limit = 10;
    // $this->redis = new CI_Redis();
    // $this->load->model('Masterdata_model', 'masterdata');
    // $this->load->model('Form_rekam_medis_model', 'form_rekam_medis');
    $this->load->model('Pelayanan/Pelayanan_model', 'm_pelayanan');

    $id_translucent = $this->session->userdata('id_translucent');
    if (empty($id_translucent)) :
      $this->response(array('error' => 'Anda belum login'), REST_Controller::HTTP_UNAUTHORIZED);
      exit();
    endif;
  }

  function cekDate($show, $id, $message, $form)
  {
    // ekspresi reguler untuk mencocokkan format tanggal yang dibutuhkan
    date_default_timezone_set('Asia/Jakarta');
    $layanan = array('id' => safe_post('id_layanan_pendaftaran'));

    if ($form !== '') {

      if (is_array($form)) {

        foreach ($form as $key => $value) {

          $regs = preg_match("/^(\d{1,2})[\/](\d{1,2})[\/](\d{4})$/", $value);

          if ($regs === 0) {

            if ($id !== '') {

              $respon = ['show' => $show, 'status' => false, 'message' => $message . ', format tanggal yang benar dd/mm/yyyy', 'id' => $id];

              $status = false;

              $message = array(
                'status' => $status,
                'token'  => $this->security->get_csrf_hash(),
                'id'     => $layanan['id'],
                'respon' => $respon,
              );

              $this->response($message, REST_Controller::HTTP_CREATED);

              return false;
            } else {

              $respon = ['show' => $show, 'status' => false, 'message' => $message . ', format tanggal yang benar dd/mm/yyyy'];

              $status = false;

              $message = array(
                'status' => $status,
                'token'  => $this->security->get_csrf_hash(),
                'id'     => $layanan['id'],
                'respon' => $respon,
              );

              $this->response($message, REST_Controller::HTTP_CREATED);

              return false;
            }
          } else {

            $var1 = explode("/", $value);

            $fungsi_tanggal = (int)$var1[0];
            $fungsi_bulan = (int)$var1[1];
            $fungsi_tahun = (int)$var1[2];

            if ($fungsi_tanggal < 1 || $fungsi_tanggal > 31) {

              if ($id !== '') {

                $respon = ['show' => $show, 'status' => false, 'message' => 'Nilai tidak valid untuk tanggal: ' . $fungsi_tanggal, 'id' => $id];
              } else {

                $respon = ['show' => $show, 'status' => false, 'message' => 'Nilai tidak valid untuk tanggal: ' . $fungsi_tanggal];
              }

              $status = false;

              $message = array(
                'status' => $status,
                'token'  => $this->security->get_csrf_hash(),
                'id'     => $layanan['id'],
                'respon' => $respon,
              );

              $this->response($message, REST_Controller::HTTP_CREATED);

              return false;
            } else if ($fungsi_bulan < 1 || $fungsi_bulan > 12) {

              if ($id !== '') {

                $respon = ['show' => $show, 'status' => false, 'message' => 'Nilai tidak valid untuk bulan: ' . $fungsi_bulan, 'id' => $id];
              } else {

                $respon = ['show' => $show, 'status' => false, 'message' => 'Nilai tidak valid untuk bulan: ' . $fungsi_bulan];
              }

              $status = false;

              $message = array(
                'status' => $status,
                'token'  => $this->security->get_csrf_hash(),
                'id'     => $layanan['id'],
                'respon' => $respon,
              );

              $this->response($message, REST_Controller::HTTP_CREATED);

              return false;
            } else if ($fungsi_tahun < (date('Y')) - 1 || $fungsi_tahun > (date('Y')) + 1) {

              if ($id !== '') {

                $respon = ['show' => $show, 'status' => false, 'message' => 'Nilai tidak valid untuk tahun: ' . $fungsi_tahun . ' - harus antara ' . ((date('Y')) - 1) . ' dan ' . ((date('Y')) + 1), 'id' => $id];
              } else {

                $respon = ['show' => $show, 'status' => false, 'message' => 'Nilai tidak valid untuk tahun: ' . $fungsi_tahun . ' - harus antara ' . ((date('Y')) - 1) . ' dan ' . ((date('Y')) + 1)];
              }

              $status = false;

              $message = array(
                'status' => $status,
                'token'  => $this->security->get_csrf_hash(),
                'id'     => $layanan['id'],
                'respon' => $respon,
              );

              $this->response($message, REST_Controller::HTTP_CREATED);

              return false;
            } else {

              return true;
            }
          }
        }
      } else {

        $regs = preg_match("/^(\d{1,2})[\/](\d{1,2})[\/](\d{4})$/", $form);

        if ($regs === 0) {

          if ($id !== '') {

            $respon = ['show' => $show, 'status' => false, 'message' => $message . ', format tanggal yang benar dd/mm/yyyy', 'id' => $id];

            $status = false;

            $message = array(
              'status' => $status,
              'token'  => $this->security->get_csrf_hash(),
              'id'     => $layanan['id'],
              'respon' => $respon,
            );

            $this->response($message, REST_Controller::HTTP_CREATED);

            return false;
          } else {

            $respon = ['show' => $show, 'status' => false, 'message' => $message . ', tidak sesuai, format tanggal yang benar dd/mm/yyyy'];

            $status = false;

            $message = array(
              'status' => $status,
              'token'  => $this->security->get_csrf_hash(),
              'id'     => $layanan['id'],
              'respon' => $respon,
            );

            $this->response($message, REST_Controller::HTTP_CREATED);

            return false;
          }
        } else {

          $var1 = explode("/", $form);

          $fungsi_tanggal = (int)$var1[0];
          $fungsi_bulan = (int)$var1[1];
          $fungsi_tahun = (int)$var1[2];

          if ($fungsi_tanggal < 1 || $fungsi_tanggal > 31) {

            if ($id !== '') {

              $respon = ['show' => $show, 'status' => false, 'message' => 'Nilai tidak valid untuk tanggal: ' . $fungsi_tanggal, 'id' => $id];
            } else {

              $respon = ['show' => $show, 'status' => false, 'message' => 'Nilai tidak valid untuk tanggal: ' . $fungsi_tanggal];
            }

            $status = false;

            $message = array(
              'status' => $status,
              'token'  => $this->security->get_csrf_hash(),
              'id'     => $layanan['id'],
              'respon' => $respon,
            );

            $this->response($message, REST_Controller::HTTP_CREATED);

            return false;
          } else if ($fungsi_bulan < 1 || $fungsi_bulan > 12) {

            if ($id !== '') {

              $respon = ['show' => $show, 'status' => false, 'message' => 'Nilai tidak valid untuk bulan: ' . $fungsi_bulan, 'id' => $id];
            } else {

              $respon = ['show' => $show, 'status' => false, 'message' => 'Nilai tidak valid untuk bulan: ' . $fungsi_bulan];
            }

            $status = false;

            $message = array(
              'status' => $status,
              'token'  => $this->security->get_csrf_hash(),
              'id'     => $layanan['id'],
              'respon' => $respon,
            );

            $this->response($message, REST_Controller::HTTP_CREATED);

            return false;
          } else if ($fungsi_tahun < (date('Y')) - 1 || $fungsi_tahun > (date('Y')) + 1) {

            if ($id !== '') {

              $respon = ['show' => $show, 'status' => false, 'message' => 'Nilai tidak valid untuk tahun: ' . $fungsi_tahun . ' - harus antara ' . ((date('Y')) - 1) . ' dan ' . ((date('Y')) + 1), 'id' => $id];
            } else {

              $respon = ['show' => $show, 'status' => false, 'message' => 'Nilai tidak valid untuk tahun: ' . $fungsi_tahun . ' - harus antara ' . ((date('Y')) - 1) . ' dan ' . ((date('Y')) + 1)];
            }

            $status = false;

            $message = array(
              'status' => $status,
              'token'  => $this->security->get_csrf_hash(),
              'id'     => $layanan['id'],
              'respon' => $respon,
            );

            $this->response($message, REST_Controller::HTTP_CREATED);

            return false;
          } else {

            return true;
          }
        }
      }
    } else {

      return true;
    }
  }

  function cekDateTime($show, $id, $message, $form)
  {
    // ekspresi reguler untuk mencocokkan format tanggal yang dibutuhkan
    date_default_timezone_set('Asia/Jakarta');

    $layanan = array('id' => safe_post('id_layanan_pendaftaran'));

    if ($form !== '') {

      if (is_array($form)) {

        foreach ($form as $key => $value) {
          $regs = preg_match("/^(\d{1,2})[\/](\d{1,2})[\/](\d{4})[\ ](\d{1,2})[\:](\d{1,2})$/", $value);

          if ($regs === 0) {
            if ($id !== '') {
              $respon = ['show' => $show, 'status' => false, 'message' => $message . ', format tanggal yang benar dd/mm/yyyy hh:mm', 'id' => $id];
              $status = false;
              $message = array(
                'status' => $status,
                'token'  => $this->security->get_csrf_hash(),
                'id'     => $layanan['id'],
                'respon' => $respon,
              );
              $this->response($message, REST_Controller::HTTP_CREATED);

              return false;
            } else {
              $respon = ['show' => $show, 'status' => false, 'message' => $message . ', format tanggal yang benar dd/mm/yyyy hh:mm'];
              $status = false;
              $message = array(
                'status' => $status,
                'token'  => $this->security->get_csrf_hash(),
                'id'     => $layanan['id'],
                'respon' => $respon,
              );
              $this->response($message, REST_Controller::HTTP_CREATED);

              return false;
            }
          } else {
            $var1 = explode(" ", $value);
            $var2 = explode("/", $var1[0]);
            $var3 = explode(":", $var1[1]);
            $fungsi_tanggal = (int)$var2[0];
            $fungsi_bulan = (int)$var2[1];
            $fungsi_tahun = (int)$var2[2];
            $fungsi_jam = (int)$var3[0];
            $fungsi_menit = (int)$var3[1];

            if ($fungsi_tanggal < 1 || $fungsi_tanggal > 31) {
              if ($id !== '') {
                $respon = ['show' => $show, 'status' => false, 'message' => 'Nilai tidak valid untuk tanggal: ' . $fungsi_tanggal, 'id' => $id];
              } else {
                $respon = ['show' => $show, 'status' => false, 'message' => 'Nilai tidak valid untuk tanggal: ' . $fungsi_tanggal];
              }
              $status = false;
              $message = array(
                'status' => $status,
                'token'  => $this->security->get_csrf_hash(),
                'id'     => $layanan['id'],
                'respon' => $respon,
              );
              $this->response($message, REST_Controller::HTTP_CREATED);

              return false;
            } else if ($fungsi_bulan < 1 || $fungsi_bulan > 12) {
              if ($id !== '') {
                $respon = ['show' => $show, 'status' => false, 'message' => 'Nilai tidak valid untuk bulan: ' . $fungsi_bulan, 'id' => $id];
              } else {
                $respon = ['show' => $show, 'status' => false, 'message' => 'Nilai tidak valid untuk bulan: ' . $fungsi_bulan];
              }
              $status = false;
              $message = array(
                'status' => $status,
                'token'  => $this->security->get_csrf_hash(),
                'id'     => $layanan['id'],
                'respon' => $respon,
              );
              $this->response($message, REST_Controller::HTTP_CREATED);

              return false;
            } else if ($fungsi_tahun < (date('Y')) - 1 || $fungsi_tahun > (date('Y')) + 1) {
              if ($id !== '') {
                $respon = ['show' => $show, 'status' => false, 'message' => 'Nilai tidak valid untuk tahun: ' . $fungsi_tahun . ' - harus antara ' . ((date('Y')) - 1) . ' dan ' . ((date('Y')) + 1), 'id' => $id];
              } else {
                $respon = ['show' => $show, 'status' => false, 'message' => 'Nilai tidak valid untuk tahun: ' . $fungsi_tahun . ' - harus antara ' . ((date('Y')) - 1) . ' dan ' . ((date('Y')) + 1)];
              }
              $status = false;
              $message = array(
                'status' => $status,
                'token'  => $this->security->get_csrf_hash(),
                'id'     => $layanan['id'],
                'respon' => $respon,
              );
              $this->response($message, REST_Controller::HTTP_CREATED);

              return false;
            } else if ($fungsi_jam < 0 || $fungsi_jam > 23) {
              if ($id !== '') {
                $respon = ['show' => $show, 'status' => false, 'message' => 'Nilai tidak valid untuk jam: ' . $fungsi_jam, 'id' => $id];
              } else {
                $respon = ['show' => $show, 'status' => false, 'message' => 'Nilai tidak valid untuk jam: ' . $fungsi_jam];
              }
              $status = false;
              $message = array(
                'status' => $status,
                'token'  => $this->security->get_csrf_hash(),
                'id'     => $layanan['id'],
                'respon' => $respon,
              );
              $this->response($message, REST_Controller::HTTP_CREATED);

              return false;
            } else if ($fungsi_menit < 0 || $fungsi_menit > 59) {
              if ($id !== '') {
                $respon = ['show' => $show, 'status' => false, 'message' => 'Nilai tidak valid untuk menit: ' . $fungsi_menit, 'id' => $id];
              } else {
                $respon = ['show' => $show, 'status' => false, 'message' => 'Nilai tidak valid untuk menit: ' . $fungsi_menit];
              }
              $status = false;
              $message = array(
                'status' => $status,
                'token'  => $this->security->get_csrf_hash(),
                'id'     => $layanan['id'],
                'respon' => $respon,
              );
              $this->response($message, REST_Controller::HTTP_CREATED);

              return false;
            } else {
              return true;
            }
          }
        }
      } else {
        $regs = preg_match("/^(\d{1,2})[\/](\d{1,2})[\/](\d{4})[\ ](\d{1,2})[\:](\d{1,2})$/", $form);

        if ($regs === 0) {
          if ($id !== '') {
            $respon = ['show' => $show, 'status' => false, 'message' => $message . ', format tanggal yang benar dd/mm/yyyy hh:mm', 'id' => $id];
            $status = false;
            $message = array(
              'status' => $status,
              'token'  => $this->security->get_csrf_hash(),
              'id'     => $layanan['id'],
              'respon' => $respon,
            );
            $this->response($message, REST_Controller::HTTP_CREATED);

            return false;
          } else {
            $respon = ['show' => $show, 'status' => false, 'message' => $message . ', format tanggal yang benar dd/mm/yyyy hh:mm'];
            $status = false;
            $message = array(
              'status' => $status,
              'token'  => $this->security->get_csrf_hash(),
              'id'     => $layanan['id'],
              'respon' => $respon,
            );
            $this->response($message, REST_Controller::HTTP_CREATED);

            return false;
          }
        } else {
          $var1 = explode(" ", $form);
          $var2 = explode("/", $var1[0]);
          $var3 = explode(":", $var1[1]);
          $fungsi_tanggal = (int)$var2[0];
          $fungsi_bulan = (int)$var2[1];
          $fungsi_tahun = (int)$var2[2];
          $fungsi_jam = (int)$var3[0];
          $fungsi_menit = (int)$var3[1];

          if ($fungsi_tanggal < 1 || $fungsi_tanggal > 31) {
            if ($id !== '') {
              $respon = ['show' => $show, 'status' => false, 'message' => 'Nilai tidak valid untuk tanggal: ' . $fungsi_tanggal, 'id' => $id];
            } else {
              $respon = ['show' => $show, 'status' => false, 'message' => 'Nilai tidak valid untuk tanggal: ' . $fungsi_tanggal];
            }
            $status = false;
            $message = array(
              'status' => $status,
              'token'  => $this->security->get_csrf_hash(),
              'id'     => $layanan['id'],
              'respon' => $respon,
            );
            $this->response($message, REST_Controller::HTTP_CREATED);

            return false;
          } else if ($fungsi_bulan < 1 || $fungsi_bulan > 12) {
            if ($id !== '') {
              $respon = ['show' => $show, 'status' => false, 'message' => 'Nilai tidak valid untuk bulan: ' . $fungsi_bulan, 'id' => $id];
            } else {
              $respon = ['show' => $show, 'status' => false, 'message' => 'Nilai tidak valid untuk bulan: ' . $fungsi_bulan];
            }
            $status = false;
            $message = array(
              'status' => $status,
              'token'  => $this->security->get_csrf_hash(),
              'id'     => $layanan['id'],
              'respon' => $respon,
            );
            $this->response($message, REST_Controller::HTTP_CREATED);

            return false;
          } else if ($fungsi_tahun < (date('Y')) - 1 || $fungsi_tahun > (date('Y')) + 1) {
            if ($id !== '') {
              $respon = ['show' => $show, 'status' => false, 'message' => 'Nilai tidak valid untuk tahun: ' . $fungsi_tahun . ' - harus antara ' . ((date('Y')) - 1) . ' dan ' . ((date('Y')) + 1), 'id' => $id];
            } else {
              $respon = ['show' => $show, 'status' => false, 'message' => 'Nilai tidak valid untuk tahun: ' . $fungsi_tahun . ' - harus antara ' . ((date('Y')) - 1) . ' dan ' . ((date('Y')) + 1)];
            }
            $status = false;
            $message = array(
              'status' => $status,
              'token'  => $this->security->get_csrf_hash(),
              'id'     => $layanan['id'],
              'respon' => $respon,
            );

            $this->response($message, REST_Controller::HTTP_CREATED);
            return false;
          } else if ($fungsi_jam < 0 || $fungsi_jam > 23) {
            if ($id !== '') {
              $respon = ['show' => $show, 'status' => false, 'message' => 'Nilai tidak valid untuk jam: ' . $fungsi_jam, 'id' => $id];
            } else {
              $respon = ['show' => $show, 'status' => false, 'message' => 'Nilai tidak valid untuk jam: ' . $fungsi_jam];
            }
            $status = false;
            $message = array(
              'status' => $status,
              'token'  => $this->security->get_csrf_hash(),
              'id'     => $layanan['id'],
              'respon' => $respon,
            );
            $this->response($message, REST_Controller::HTTP_CREATED);

            return false;
          } else if ($fungsi_menit < 0 || $fungsi_menit > 59) {
            if ($id !== '') {
              $respon = ['show' => $show, 'status' => false, 'message' => 'Nilai tidak valid untuk menit: ' . $fungsi_menit, 'id' => $id];
            } else {
              $respon = ['show' => $show, 'status' => false, 'message' => 'Nilai tidak valid untuk menit: ' . $fungsi_menit];
            }
            $status = false;
            $message = array(
              'status' => $status,
              'token'  => $this->security->get_csrf_hash(),
              'id'     => $layanan['id'],
              'respon' => $respon,
            );
            $this->response($message, REST_Controller::HTTP_CREATED);

            return false;
          } else {

            return true;
          }
        }
      }
    } else {
      return true;
    }
  }

  function simpan_entri_keperawatan_post()
  {
    $layanan = array('id' => safe_post('id_layanan_pendaftaran'));

    $ek_tanggal_penerima = safe_post('ek_tanggal_verifikasi_penerima');
    $ek_tanggal_perawat = safe_post('ek_tanggal_ttd_perawat');
    $ek_tanggal_dokter = safe_post('ek_tanggal_verifikasi_dokter');

    $tanggal_selesai = safe_post('sirs_tanggal_selesai');
    $si_tanggal_mulai = safe_post('sirs_tanggal_mulai');
    $waktu_pslp_petugas = safe_post('plsp_tanggal_ttd_petugas');

    $cekTanggal = $this->cekDate('6', '', 'Tanggal Mulai pada A. Tempat di Rawat', $si_tanggal_mulai);

    if ($cekTanggal === false) {
      return false;
      exit();
    }

    $cekTanggalSelesai = $this->cekDate('6', '', 'Tanggal Selesai pada A. Tempat di Rawat', $tanggal_selesai);
    if ($cekTanggalSelesai === false) {
      return false;
      exit();
    }

    $cekTanggalPerawat = $this->cekDateTime('0', '#data-kontrol-kembali', 'Tanggal dan Jam Perawat yang merawat', $ek_tanggal_perawat);
    if ($cekTanggalPerawat === false) {
      return false;
      exit();
    }

    $cekTanggalDokter = $this->cekDateTime('0', '#data-kontrol-kembali', 'Tanggal dan Jam Dokter yang merawat', $ek_tanggal_dokter);
    if ($cekTanggalDokter === false) {
      return false;
      exit();
    }

    $cekTanggalPenerima = $this->cekDateTime('0', '#data-kontrol-kembali', 'Tanggal dan Jam Penerima', $ek_tanggal_penerima);
    if ($cekTanggalPenerima === false) {
      return false;
      exit();
    }

    $cekWaktuPSLPPetugas = $this->cekDateTime('5', '', 'Tanggal dan Jam Petugas Pengkajian Lanjutan Spiritual Pasien', $waktu_pslp_petugas);
    if ($cekWaktuPSLPPetugas === false) {
      return false;
      exit();
    }

    $this->db->trans_begin();

    $rk_id_layanan = array('id' => safe_post('rk_id_layanan_pendaftaran'));
    $id_rk = array('id' => safe_post('id_rk'));
    $id = $layanan['id'];

    $resume_keperawatan = array(
      'id_layanan_pendaftaran' => $layanan['id'],
      'waktu' => $this->datetime,
      'ruang_resume_keperawatan' => safe_post('ruang_resume_keperawatan') !== '' ? safe_post('ruang_resume_keperawatan') : NULL,
      'ek_diagnosa_masuk' => safe_post('rk_diagnosa_masuk') !== '' ? safe_post('rk_diagnosa_masuk') : NULL,
      'ek_diagnosa_keluar' => safe_post('rk_diagnosa_keluar') !== '' ? safe_post('rk_diagnosa_keluar') : NULL,
      'ek_tensi_sis' => safe_post('ek_tensi_sis') !== '' ? safe_post('ek_tensi_sis') : NULL,
      'ek_tensi_dis' => safe_post('rk_tensi_dis') !== '' ? safe_post('rk_tensi_dis') : NULL,
      'ek_suhu' => safe_post('ek_suhu') !== '' ? safe_post('ek_suhu') : NULL,
      'ek_nadi' => safe_post('ek_nadi') !== '' ? safe_post('ek_nadi') : NULL,
      'ek_pernafasan' => safe_post('ek_pernafasan') !== '' ? safe_post('ek_pernafasan') : NULL,
      'diet_khusus' => json_encode(array(
        'diet_khusus' => safe_post('diet_khusus'),
        'sm_diet_khusus' => safe_post('sm_diet_khusus'),
      )),
      'batasan_cairan' => json_encode(array(
        'batasan_cairan' => safe_post('batasan_cairan'),
        'sm_batasan_cairan' => safe_post('sm_batasan_cairan'),
      )),
      'diet_oral' => safe_post('diet_oral') !== '' ? safe_post('diet_oral') : NULL,
      'diet_ngt' => safe_post('diet_ngt') !== '' ? safe_post('diet_ngt') : NULL,

      'bab' => safe_post('bab') !== '' ? safe_post('bab') : NULL,
      'bak' => safe_post('bak') !== '' ? safe_post('bak') : NULL,
      'bak_kateter' => (safe_post('bak_kateter') !== '' ? datetime2mysql(safe_post('bak_kateter')) : NULL),
      'luka' => safe_post('luka_operasi') !== '' ? safe_post('luka_operasi') : NULL,
      'luka_operasi_cairan' => safe_post('sm_cairan_luka') !== '' ? safe_post('sm_cairan_luka') : NULL,
      'mobilisasi' => safe_post('mobilisasi') !== '' ? safe_post('mobilisasi') : NULL,
      'alat_bantu' => safe_post('alat_bantu') !== '' ? safe_post('alat_bantu') : NULL,
      'alat_bantu_lain' => safe_post('alat_bantu_lain') !== '' ? safe_post('alat_bantu_lain') : NULL,
      'edukasi' => json_encode(array(
        'edukasi_penyakit' => safe_post('edukasi_penyakit'),
        'edukasi_perawatan' => safe_post('edukasi_perawatan'),
        'edukasi_dirumah' => safe_post('edukasi_dirumah'),
        'edukasi_ibubayi' => safe_post('edukasi_ibubayi'),
        'edukasi_nyeri' => safe_post('edukasi_nyeri'),
        'edukasi_lingkungan' => safe_post('edukasi_lingkungan'),
        'edukasi_kb' => safe_post('edukasi_kb'),
        'edukasi_rehabilitas' => safe_post('edukasi_rehabilitas'),
        'edukasi_lain' => safe_post('edukasi_lain'),
        'edukasi_lain_input' => safe_post('edukasi_lain_input'),
      )),
      'diagnosa_perawat' => safe_post('diagnosa_perawat') !== '' ? safe_post('diagnosa_perawat') : NULL,
      'diagnosa_perawat_satu' => safe_post('diagnosa_perawat_satu') !== '' ? safe_post('diagnosa_perawat_satu') : NULL,
      'anjuran_perawat' => safe_post('anjuran_perawat') !== '' ? safe_post('anjuran_perawat') : NULL,
      'anjuran_perawat_satu' => safe_post('anjuran_perawat_satu') !== '' ? safe_post('anjuran_perawat_satu') : NULL,
      'anjuran_perawat_dua' => safe_post('anjuran_perawat_dua') !== '' ? safe_post('anjuran_perawat_dua') : NULL,
      'anjuran_perawat_tiga' => safe_post('anjuran_perawat_tiga') !== '' ? safe_post('anjuran_perawat_tiga') : NULL,
      'kontraksi' => safe_post('kontraksi') !== '' ? safe_post('kontraksi') : NULL,
      'fundus' => safe_post('fundus_uteri') !== '' ? safe_post('fundus_uteri') : NULL,
      'vulva' => safe_post('vulva') !== '' ? safe_post('vulva') : NULL,
      'perineum' => safe_post('perineum') !== '' ? safe_post('perineum') : NULL,
      'lochaea' => safe_post('lochaea') !== '' ? safe_post('lochaea') : NULL,
      'warna' => safe_post('warna_lochaea') !== '' ? safe_post('warna_lochaea') : NULL,
      'bau_lochaea' => safe_post('bau_lochaea') !== '' ? safe_post('bau_lochaea') : NULL,
      'hasil_lab' => safe_post('hasil_lab') !== '' ? safe_post('hasil_lab') : NULL,
      'ekg' => safe_post('ekg') !== '' ? safe_post('ekg') : NULL,
      'rontgen' => safe_post('foto_rontgen') !== '' ? safe_post('foto_rontgen') : NULL,
      'mri' => safe_post('mri') !== '' ? safe_post('mri') : NULL,
      'ct_scan' => safe_post('ct_scan') !== '' ? safe_post('ct_scan') : NULL,
      'usg' => safe_post('usg') !== '' ? safe_post('usg') : NULL,
      'surat_kontrol' => safe_post('surat_kontrol') !== '' ? safe_post('surat_kontrol') : NULL,
      'resume' => safe_post('resume_medis') !== '' ? safe_post('resume_medis') : NULL,
      'hasil_satu' => safe_post('hasil_satu') !== '' ? safe_post('hasil_satu') : NULL,
      'surat_asuransi' => safe_post('surat_asuransi') !== '' ? safe_post('surat_asuransi') : NULL,
      'hasil_dua' => safe_post('hasil_dua') !== '' ? safe_post('hasil_dua') : NULL,
      'summary' => safe_post('summary_pasien') !== '' ? safe_post('summary_pasien') : NULL,
      'hasil_tiga' => safe_post('hasil_tiga') !== '' ? safe_post('hasil_tiga') : NULL,
      'suket_lahir' => safe_post('suket_lahir') !== '' ? safe_post('suket_lahir') : NULL,
      'hasil_empat' => safe_post('hasil_empat') !== '' ? safe_post('hasil_empat') : NULL,
      'bayi_diserahkan' => safe_post('bayi_diserahkan') !== '' ? safe_post('bayi_diserahkan') : NULL,
      'hasil_lima' => safe_post('hasil_lima') !== '' ? safe_post('hasil_lima') : NULL,
      'lain_lain' => safe_post('lain_lain') !== '' ? safe_post('lain_lain') : NULL,
      'id_perawat_medis' => safe_post('perawat_medis') !== '' ? safe_post('perawat_medis') : NULL,
      'id_verifikasi_dokter' => safe_post('verifikasi_dokter') !== '' ? safe_post('verifikasi_dokter') : NULL,
      'id_users' => safe_post('id_users') !== '' ? safe_post('id_users') : NULL,
    );

    if ($id_rk['id'] !== '') {

      if ($layanan['id'] === $rk_id_layanan['id']) {

        $id_resume = $id_rk['id'];

        $id_layanan = $this->db->select("srk.id, srk.ek_ttd_pasien, srk.penerima, srk.ek_tanggal_ttd_perawat, srk.ek_ttd_perawat, srk.ek_tanggal_verifikasi_dokter, srk.ek_ttd_verifikasi_dokter, srk.ek_tanggal_verifikasi_penerima")
          ->from('sm_resume_keperawatan as srk')
          ->where('srk.id', $id_resume, true)
          ->get()
          ->row();

        if ($id_layanan->ek_tanggal_verifikasi_dokter !== NULL) :
          $resume_keperawatan['ek_tanggal_verifikasi_dokter'] = $id_layanan->ek_tanggal_verifikasi_dokter;
        else :
          $resume_keperawatan['ek_tanggal_verifikasi_dokter'] = (safe_post('ek_tanggal_verifikasi_dokter') !== '' ? datetime2mysql(safe_post('ek_tanggal_verifikasi_dokter')) : NULL);
        endif;

        if ($id_layanan->ek_ttd_verifikasi_dokter !== NULL) :
          $resume_keperawatan['ek_ttd_verifikasi_dokter'] = $id_layanan->ek_ttd_verifikasi_dokter;
        else :
          $resume_keperawatan['ek_ttd_verifikasi_dokter'] = safe_post('ek_ttd_verifikasi_dokter') !== '' ? safe_post('ek_ttd_verifikasi_dokter') : NULL;
        endif;

        if ($id_layanan->ek_ttd_perawat !== NULL) :
          $resume_keperawatan['ek_ttd_perawat'] = $id_layanan->ek_ttd_perawat;
        else :
          $resume_keperawatan['ek_ttd_perawat'] = safe_post('ek_ttd_perawat') !== '' ? safe_post('ek_ttd_perawat') : NULL;
        endif;

        if ($id_layanan->ek_tanggal_ttd_perawat !== NULL) :
          $resume_keperawatan['ek_tanggal_ttd_perawat'] = $id_layanan->ek_tanggal_ttd_perawat;
        else :
          $resume_keperawatan['ek_tanggal_ttd_perawat'] = (safe_post('ek_tanggal_ttd_perawat') !== '' ? datetime2mysql(safe_post('ek_tanggal_ttd_perawat')) : NULL);
        endif;

        if ($id_layanan->ek_tanggal_verifikasi_penerima !== NULL) :
          $resume_keperawatan['ek_tanggal_verifikasi_penerima'] = $id_layanan->ek_tanggal_verifikasi_penerima;
        else :
          $resume_keperawatan['ek_tanggal_verifikasi_penerima'] = (safe_post('ek_tanggal_verifikasi_penerima') !== '' ? datetime2mysql(safe_post('ek_tanggal_verifikasi_penerima')) : NULL);
        endif;

        if ($id_layanan->penerima !== NULL) :
          $resume_keperawatan['penerima'] = $id_layanan->penerima;
        else :
          $resume_keperawatan['penerima'] = safe_post('verifikasi_penerima') !== '' ? safe_post('verifikasi_penerima') : NULL;
        endif;

        if ($id_layanan->ek_ttd_pasien !== NULL) :
          $resume_keperawatan['ek_ttd_pasien'] = $id_layanan->ek_ttd_pasien;
        else :
          $resume_keperawatan['ek_ttd_pasien'] = safe_post('ek_ttd_pasien') !== '' ? safe_post('ek_ttd_pasien') : NULL;
        endif;

        $resume_keperawatan['updated_date'] = $this->datetime;

        $this->db->where('id', $id_resume)->update('sm_resume_keperawatan', $resume_keperawatan);
      } else {

        $id_resume = $id_rk['id'];

        $rk['updated_date'] = $this->datetime;

        $this->db->where('id', $id_resume)->update('sm_resume_keperawatan', $rk);
      }
    } else {

      if ($resume_keperawatan['ek_suhu'] !== null) {

        $resume_keperawatan['ek_tanggal_ttd_perawat'] = (safe_post('ek_tanggal_ttd_perawat') !== '' ? datetime2mysql(safe_post('ek_tanggal_ttd_perawat')) : NULL);

        $resume_keperawatan['ek_ttd_perawat'] = safe_post('ek_ttd_perawat') !== '' ? safe_post('ek_ttd_perawat') : NULL;
        $resume_keperawatan['ek_tanggal_verifikasi_dokter'] = (safe_post('ek_tanggal_verifikasi_dokter') !== '' ? datetime2mysql(safe_post('ek_tanggal_verifikasi_dokter')) : NULL);

        $resume_keperawatan['ek_ttd_verifikasi_dokter'] = safe_post('ek_ttd_verifikasi_dokter') !== '' ? safe_post('ek_ttd_verifikasi_dokter') : NULL;
        $resume_keperawatan['ek_tanggal_verifikasi_penerima'] = (safe_post('ek_tanggal_verifikasi_penerima') !== '' ? datetime2mysql(safe_post('ek_tanggal_verifikasi_penerima')) : NULL);

        $resume_keperawatan['penerima'] = safe_post('verifikasi_penerima') !== '' ? safe_post('verifikasi_penerima') : NULL;
        $resume_keperawatan['ek_ttd_pasien'] = safe_post('ek_ttd_pasien') !== '' ? safe_post('ek_ttd_pasien') : NULL;

        $this->m_pelayanan->updateResumeKeperawatan($resume_keperawatan);
      }
    }


    // $ssc_tanggal_sign_in = safe_post('ssc_tanggal_sign_in');
    // $ssc_tanggal_time_out = safe_post('ssc_tanggal_time_out');
    // $ssc_tanggal_sign_out = safe_post('ssc_tanggal_sign_out');
    // if ($ssc_tanggal_sign_in || $ssc_tanggal_time_out || $ssc_tanggal_sign_out) {

    //   $surgicalCeklis = array(
    //     'id_layanan_pendaftaran' => $layanan['id'],
    //     'id_pendaftaran' => safe_post('id_pendaftaran'),
    //     'ssc_tanggal_sign_in' => safe_post('ssc_tanggal_sign_in'),
    //     'ssc_tanggal_time_out' => safe_post('ssc_tanggal_time_out'),
    //     'ssc_tanggal_sign_out' => safe_post('ssc_tanggal_sign_out'),
    //     'user_surgical_safety_ceklis' => safe_post('user_surgical_safety_ceklis') !== '' ? safe_post('user_surgical_safety_ceklis') : NULL,

    //     // sign in
    //     'ssc_gelang' => safe_post('ssc_gelang') !== '' ? safe_post('ssc_gelang') : NULL,
    //     'ssc_informed' => safe_post('ssc_informed') !== '' ? safe_post('ssc_informed') : NULL,
    //     'ssc_dokter_bedah' => safe_post('ssc_dokter_bedah') !== '' ? safe_post('ssc_dokter_bedah') : NULL,
    //     'ssc_anestesi' => safe_post('ssc_anestesi') !== '' ? safe_post('ssc_anestesi') : NULL,
    //     'ssc_dokter_operator' => safe_post('ssc_dokter_operator') !== '' ? safe_post('ssc_dokter_operator') : NULL,
    //     'ssc_dokter_anestesi' => safe_post('ssc_dokter_anestesi') !== '' ? safe_post('ssc_dokter_anestesi') : NULL,
    //     'ssc_nama_tindakan' => safe_post('ssc_nama_tindakan') !== '' ? safe_post('ssc_nama_tindakan') : NULL,
    //     'ssc_lokasi' => safe_post('ssc_lokasi') !== '' ? safe_post('ssc_lokasi') : NULL,
    //     'ssc_mesin_anestesi' => safe_post('ssc_mesin_anestesi') !== '' ? safe_post('ssc_mesin_anestesi') : NULL,
    //     'ssc_obat' => safe_post('ssc_obat') !== '' ? safe_post('ssc_obat') : NULL,
    //     'ssc_oximeter' => safe_post('ssc_oximeter') !== '' ? safe_post('ssc_oximeter') : NULL,
    //     'ssc_lab' => safe_post('ssc_lab') !== '' ? safe_post('ssc_lab') : NULL,
    //     'ssc_line' => safe_post('ssc_line') !== '' ? safe_post('ssc_line') : NULL,
    //     'ssc_tekanan_darah' => safe_post('ssc_tekanan_darah') !== '' ? safe_post('ssc_tekanan_darah') : NULL,
    //     'ssc_nadi' => safe_post('ssc_nadi') !== '' ? safe_post('ssc_nadi') : NULL,
    //     'ssc_pernafasan' => safe_post('ssc_pernafasan') !== '' ? safe_post('ssc_pernafasan') : NULL,
    //     'ssc_saturasi' => safe_post('ssc_saturasi') !== '' ? safe_post('ssc_saturasi') : NULL,
    //     'ssc_suhu' => safe_post('ssc_suhu') !== '' ? safe_post('ssc_suhu') : NULL,
    //     'ssc_alergi' => safe_post('ssc_alergi') !== '' ? safe_post('ssc_alergi') : NULL,
    //     'ssc_alergi_ket' => safe_post('ssc_alergi_ket') !== '' ? safe_post('ssc_alergi_ket') : NULL,
    //     'ssc_aspirasi' => safe_post('ssc_aspirasi') !== '' ? safe_post('ssc_aspirasi') : NULL,
    //     'ssc_pendarahan' => safe_post('ssc_pendarahan') !== '' ? safe_post('ssc_pendarahan') : NULL,
    //     'ssc_rencana_anestesi' => safe_post('ssc_rencana_anestesi') !== '' ? safe_post('ssc_rencana_anestesi') : NULL,
    //     'ssc_paraf_perawat_sign_in' => safe_post('ssc_paraf_perawat_sign_in') !== '' ? safe_post('ssc_paraf_perawat_sign_in') : NULL,
    //     'ssc_perawat_sign_in' => safe_post('ssc_perawat_sign_in') !== '' ? safe_post('ssc_perawat_sign_in') : NULL,
    //     'ssc_paraf_dokter_anestesi_sign_in' => safe_post('ssc_paraf_dokter_anestesi_sign_in') !== '' ? safe_post('ssc_paraf_dokter_anestesi_sign_in') : NULL,
    //     'ssc_dokter_anestesi_sign_in' => safe_post('ssc_dokter_anestesi_sign_in') !== '' ? safe_post('ssc_dokter_anestesi_sign_in') : NULL,

    //     // time out
    //     'ssc_lengkap' => safe_post('ssc_lengkap') !== '' ? safe_post('ssc_lengkap') : NULL,
    //     'ssc_alasan' => safe_post('ssc_alasan') !== '' ? safe_post('ssc_alasan') : NULL,
    //     'ssc_instrument' => safe_post('ssc_instrument') !== '' ? safe_post('ssc_instrument') : NULL,
    //     'ssc_kassa' => safe_post('ssc_kassa') !== '' ? safe_post('ssc_kassa') : NULL,
    //     'ssc_jarum' => safe_post('ssc_jarum') !== '' ? safe_post('ssc_jarum') : NULL,
    //     'ssc_tanggal_tindakan' => safe_post('ssc_tanggal_tindakan') !== '' ? safe_post('ssc_tanggal_tindakan') : NULL,
    //     'ssc_identitas_pasien' => safe_post('ssc_identitas_pasien') !== '' ? safe_post('ssc_identitas_pasien') : NULL,
    //     'ssc_nama_tindakan_time_out' => safe_post('ssc_nama_tindakan_time_out') !== '' ? safe_post('ssc_nama_tindakan_time_out') : NULL,
    //     'ssc_prosedur_tindakan' => safe_post('ssc_prosedur_tindakan') !== '' ? safe_post('ssc_prosedur_tindakan') : NULL,
    //     'ssc_lokasi_tindakan' => safe_post('ssc_lokasi_tindakan') !== '' ? safe_post('ssc_lokasi_tindakan') : NULL,
    //     'ssc_consent' => safe_post('ssc_consent') !== '' ? safe_post('ssc_consent') : NULL,
    //     'ssc_premedikasi' => safe_post('ssc_premedikasi') !== '' ? safe_post('ssc_premedikasi') : NULL,
    //     'ssc_premedikasi_obat' => safe_post('ssc_premedikasi_obat') !== '' ? safe_post('ssc_premedikasi_obat') : NULL,
    //     'ssc_tanggal_obat' => safe_post('ssc_tanggal_obat') !== '' ? safe_post('ssc_tanggal_obat') : NULL,
    //     'ssc_antibiotik' => safe_post('ssc_antibiotik') !== '' ? safe_post('ssc_antibiotik') : NULL,
    //     'ssc_antibiotik_obat' => safe_post('ssc_antibiotik_obat') !== '' ? safe_post('ssc_antibiotik_obat') : NULL,
    //     'ssc_antibiotik_dosis' => safe_post('ssc_antibiotik_dosis') !== '' ? safe_post('ssc_antibiotik_dosis') : NULL,
    //     'ssc_jam_antibiotik_obat' => safe_post('ssc_jam_antibiotik_obat') !== '' ? safe_post('ssc_jam_antibiotik_obat') : NULL,
    //     'ssc_foto' => safe_post('ssc_foto') !== '' ? safe_post('ssc_foto') : NULL,
    //     'ssc_implant' => safe_post('ssc_implant') !== '' ? safe_post('ssc_implant') : NULL,
    //     'ssc_jenis' => safe_post('ssc_jenis') !== '' ? safe_post('ssc_jenis') : NULL,
    //     'ssc_jenis_ket' => safe_post('ssc_jenis_ket') !== '' ? safe_post('ssc_jenis_ket') : NULL,
    //     'ssc_paraf_perawat_time_out' => safe_post('ssc_paraf_perawat_time_out') !== '' ? safe_post('ssc_paraf_perawat_time_out') : NULL,
    //     'ssc_perawat_time_out' => safe_post('ssc_perawat_time_out') !== '' ? safe_post('ssc_perawat_time_out') : NULL,
    //     'ssc_paraf_dokter_anestesi_time_out' => safe_post('ssc_paraf_dokter_anestesi_time_out') !== '' ? safe_post('ssc_paraf_dokter_anestesi_time_out') : NULL,
    //     'ssc_dokter_anestesi_time_out' => safe_post('ssc_dokter_anestesi_time_out') !== '' ? safe_post('ssc_dokter_anestesi_time_out') : NULL,

    //     // sign out
    //     'ssc_nama_tindakan_sign_out' => safe_post('ssc_nama_tindakan_sign_out') !== '' ? safe_post('ssc_nama_tindakan_sign_out') : NULL,
    //     'ssc_instrument_sign_out' => safe_post('ssc_instrument_sign_out') !== '' ? safe_post('ssc_instrument_sign_out') : NULL,
    //     'ssc_kassa_sign_out' => safe_post('ssc_kassa_sign_out') !== '' ? safe_post('ssc_kassa_sign_out') : NULL,
    //     'ssc_jarum_sign_out' => safe_post('ssc_jarum_sign_out') !== '' ? safe_post('ssc_jarum_sign_out') : NULL,
    //     'ssc_preparat' => safe_post('ssc_preparat') !== '' ? safe_post('ssc_preparat') : NULL,
    //     'ssc_preparat_pa' => safe_post('ssc_preparat_pa') !== '' ? safe_post('ssc_preparat_pa') : NULL,
    //     'ssc_preparat_kultur' => safe_post('ssc_preparat_kultur') !== '' ? safe_post('ssc_preparat_kultur') : NULL,
    //     'ssc_preparat_sitologi' => safe_post('ssc_preparat_sitologi') !== '' ? safe_post('ssc_preparat_sitologi') : NULL,
    //     'ssc_formulir_permintaan' => safe_post('ssc_formulir_permintaan') !== '' ? safe_post('ssc_formulir_permintaan') : NULL,
    //     'ssc_lengkap_pasien' => safe_post('ssc_lengkap_pasien') !== '' ? safe_post('ssc_lengkap_pasien') : NULL,
    //     'ssc_penjelasan_keluarga' => safe_post('ssc_penjelasan_keluarga') !== '' ? safe_post('ssc_penjelasan_keluarga') : NULL,
    //     'ssc_penjelasan_keluarga_ket' => safe_post('ssc_penjelasan_keluarga_ket') !== '' ? safe_post('ssc_penjelasan_keluarga_ket') : NULL,
    //     'ssc_obat_operasi' => safe_post('ssc_obat_operasi') !== '' ? safe_post('ssc_obat_operasi') : NULL,
    //     'ssc_obat_operasi_ya_alasan' => safe_post('ssc_obat_operasi_ya_alasan') !== '' ? safe_post('ssc_obat_operasi_ya_alasan') : NULL,
    //     'ssc_obat_operasi_tidak_alasan' => safe_post('ssc_obat_operasi_tidak_alasan') !== '' ? safe_post('ssc_obat_operasi_tidak_alasan') : NULL,
    //     'ssc_kesadaran_sign_out' => safe_post('ssc_kesadaran_sign_out') !== '' ? safe_post('ssc_kesadaran_sign_out') : NULL,
    //     'ssc_tekanan_darah_sign_out' => safe_post('ssc_tekanan_darah_sign_out') !== '' ? safe_post('ssc_tekanan_darah_sign_out') : NULL,
    //     'ssc_nadi_sign_out' => safe_post('ssc_nadi_sign_out') !== '' ? safe_post('ssc_nadi_sign_out') : NULL,
    //     'ssc_pernafasan_sign_out' => safe_post('ssc_pernafasan_sign_out') !== '' ? safe_post('ssc_pernafasan_sign_out') : NULL,
    //     'ssc_saturasi_sign_out' => safe_post('ssc_saturasi_sign_out') !== '' ? safe_post('ssc_saturasi_sign_out') : NULL,
    //     'ssc_suhu_sign_out' => safe_post('ssc_suhu_sign_out') !== '' ? safe_post('ssc_suhu_sign_out') : NULL,
    //     'ssc_skala_nyeri_sign_out' => safe_post('ssc_skala_nyeri_sign_out') !== '' ? safe_post('ssc_skala_nyeri_sign_out') : NULL,
    //     'ssc_rembesan' => safe_post('ssc_rembesan') !== '' ? safe_post('ssc_rembesan') : NULL,
    //     'ssc_paraf_perawat_sign_out' => safe_post('ssc_paraf_perawat_sign_out') !== '' ? safe_post('ssc_paraf_perawat_sign_out') : NULL,
    //     'ssc_perawat_sign_out' => safe_post('ssc_perawat_sign_out') !== '' ? safe_post('ssc_perawat_sign_out') : NULL,
    //     'ssc_paraf_dokter_anestesi_sign_out' => safe_post('ssc_paraf_dokter_anestesi_sign_out') !== '' ? safe_post('ssc_paraf_dokter_anestesi_sign_out') : NULL,
    //     'ssc_dokter_anestesi_sign_out' => safe_post('ssc_dokter_anestesi_sign_out') !== '' ? safe_post('ssc_dokter_anestesi_sign_out') : NULL,
    //   );

    //   $this->m_pelayanan->insertSurgicalSafetyCeklis($surgicalCeklis);
    // } else {
    //   $ssc_tanggal_sign_in = safe_post('ssc_tanggal_sign_in');
    //   $ssc_tanggal_time_out = safe_post('ssc_tanggal_time_out');
    //   $ssc_tanggal_sign_out = safe_post('ssc_tanggal_sign_out');
    //   if (!empty($ssc_tanggal_sign_in || $ssc_tanggal_time_out || $ssc_tanggal_sign_out)) {
    //     $respon = ['show' => '5', 'status' => false, 'message' => 'Surgical Safety Ceklis Belum ditambahkan', 'id' => '#data-surgical-safety-ceklis'];
    //   }
    // }

    // SURGICAL SAFETY CHEKLIST DI LUAR KAMAR OPERASI
    $dko_tanggal_verifikasi = safe_post('dko_tanggal_verifikasi');
    if ($dko_tanggal_verifikasi) {

      $surgicalCeklis = array(
        'id_layanan_pendaftaran' => safe_post('id_layanan_pendaftaran'),
        'id_pendaftaran' => safe_post('id_pendaftaran'),
        'dko_tanggal_verifikasi' => safe_post('dko_tanggal_verifikasi'),
        'user_dko' => safe_post('user_dko'),

        // sign in
        'dko_jam_sign_in' => safe_post('dko_jam_sign_in'),
        'dko_gelang' => safe_post('dko_gelang'),
        'dko_lokasi' => safe_post('dko_lokasi'),
        'dko_prosedur' => safe_post('dko_prosedur'),
        'dko_izin' => safe_post('dko_izin'),
        'dko_tanda' => safe_post('dko_tanda'),
        'dko_obat' => safe_post('dko_obat'),
        'dko_alergi' => safe_post('dko_alergi'),
        'dko_alergi_ket' => safe_post('dko_alergi_ket'),
        'dko_aspirasi' => safe_post('dko_aspirasi'),
        'dko_darah' => safe_post('dko_darah'),
        'dko_anestesi' => safe_post('dko_anestesi'),

        // time out
        'dko_jam_time_out' => safe_post('dko_jam_time_out'),
        'dko_konfirmasi' => safe_post('dko_konfirmasi'),
        'dko_nama' => safe_post('dko_nama'),
        'dko_prosedur_time_out' => safe_post('dko_prosedur_time_out'),
        'dko_insisi' => safe_post('dko_insisi'),
        'dko_profilaksis' => safe_post('dko_profilaksis'),
        'dko_dokter_bedah_ket' => safe_post('dko_dokter_bedah_ket'),
        'dko_dokter_anestesi_ket' => safe_post('dko_dokter_anestesi_ket'),
        'dko_perawat_ket' => safe_post('dko_perawat_ket'),
        'dko_foto' => safe_post('dko_foto'),

        // sign out
        'dko_jam_sign_out' => safe_post('dko_jam_sign_out'),
        'dko_tindakan' => safe_post('dko_tindakan'),
        'dko_instrumen' => safe_post('dko_instrumen'),
        'dko_specimen' => safe_post('dko_specimen'),
        'dko_masalah' => safe_post('dko_masalah'),
        'dko_review' => safe_post('dko_review'),

        // tanda tangan dokter dan perawat
        'dko_perawat_sign_in' => safe_post('dko_perawat_sign_in'),
        'dko_ttd_perawat_sign_in' => safe_post('dko_ttd_perawat_sign_in'),
        'dko_dokter_sign_in' => safe_post('dko_dokter_sign_in'),
        'dko_ttd_dokter_sign_in' => safe_post('dko_ttd_dokter_sign_in'),
        'dko_operator_time_out' => safe_post('dko_operator_time_out'),
        'dko_ttd_operator_time_out' => safe_post('dko_ttd_operator_time_out'),
        'dko_dokter_time_out' => safe_post('dko_dokter_time_out'),
        'dko_ttd_dokter_time_out' => safe_post('dko_ttd_dokter_time_out'),
        'dko_perawat_time_out' => safe_post('dko_perawat_time_out'),
        'dko_ttd_perawat_time_out' => safe_post('dko_ttd_perawat_time_out'),
        'dko_operator_sign_out' => safe_post('dko_operator_sign_out'),
        'dko_ttd_operator_sign_out' => safe_post('dko_ttd_operator_sign_out'),
        'dko_dokter_sign_out' => safe_post('dko_dokter_sign_out'),
        'dko_ttd_dokter_sign_out' => safe_post('dko_ttd_dokter_sign_out'),
        
      );
      $this->m_pelayanan->insertLKO($surgicalCeklis);
    } else {
      $dko_tanggal_verifikasi = safe_post('dko_tanggal_verifikasi');
      if (!empty($dko_tanggal_verifikasi)) {
        $respon = ['show' => '5', 'status' => false, 'message' => 'Surgical Safety Ceklis Belum ditambahkan', 'id' => '#data-surgical-safety-ceklis'];
      }
    }

    // CPDPO 5
    $tanggal_rpo = safe_post('tanggal_rpo');
    $tangggal_rpo = safe_post('tangggal_rpo');
    $pencegahan_date_rpo = safe_post('pencegahan_date_rpo');
    $id_pendaftaran = safe_post('id_pendaftaran');
    if (!empty($pencegahan_date_rpo)) {
      $riwayat_pemakaian_obat = array(
        'id_pendaftaran' => $id_pendaftaran,
        'id_layanan_pendaftaran' => $layanan['id'],
        'id_user' => safe_post('user_pengkajian') !== '' ? safe_post('user_pengkajian') : null,
        'tanggal_rpo' => safe_post('tanggal_rpo') !== '' ? safe_post('tanggal_rpo') : null,
        'tangggal_rpo' => safe_post('tangggal_rpo') !== '' ? safe_post('tangggal_rpo') : null,
        'nama_obat_rpo' => safe_post('nama_obat_rpo') !== '' ? safe_post('nama_obat_rpo') : null,
        'dokter_1_rpo' => safe_post('dokter_1_rpo') !== '' ? safe_post('dokter_1_rpo') : null,
        'dokter_2_rpo' => safe_post('dokter_2_rpo') !== '' ? safe_post('dokter_2_rpo') : null,
        'rute_rpo' => safe_post('rute_rpo') !== '' ? safe_post('rute_rpo') : null,
        'dosis_rpo' => safe_post('dosis_rpo') !== '' ? safe_post('dosis_rpo') : null,
        'frekuensi_rpo' => safe_post('frekuensi_rpo') !== '' ? safe_post('frekuensi_rpo') : null,
        'eso_rpo' => safe_post('eso_rpo') !== '' ? safe_post('eso_rpo') : null,
        'r_farmasi_rpo' => safe_post('r_farmasi_rpo') !== '' ? safe_post('r_farmasi_rpo') : null,
        'alergii_ob' => safe_post('alergii_ob') !== '' ? safe_post('alergii_ob') : null,
        'alergii' => safe_post('alergii') !== '' ? safe_post('alergii') : null,
        'date_created' => safe_post('pencegahan_date_rpo') !== '' ? safe_post('pencegahan_date_rpo') : null,
      );
      $this->m_pelayanan->insertRiwayatPemakaianObat($riwayat_pemakaian_obat);
    }

    // ILLIS 5
    $tanggal_rpoo = safe_post('tanggal_rpoo');
    $tangggal_rpoo = safe_post('tangggal_rpoo');
    $pencegahan_date_rpo_infus = safe_post('pencegahan_date_rpo_infus');
    $id_pendaftaran = safe_post('id_pendaftaran');
    if (!empty($pencegahan_date_rpo_infus)) {
      $riwayat_pemakaian_obat_infus = array(
        'id_pendaftaran' => $id_pendaftaran,
        'id_layanan_pendaftaran' => $layanan['id'],
        'id_user' => safe_post('user_pengkajian') !== '' ? safe_post('user_pengkajian') : null,
        'tanggal_rpoo' => safe_post('tanggal_rpoo') !== '' ? safe_post('tanggal_rpoo') : null,
        'tangggal_rpoo' => safe_post('tangggal_rpoo') !== '' ? safe_post('tangggal_rpoo') : null,
        'nama_obat_rpoo' => safe_post('nama_obat_rpoo') !== '' ? safe_post('nama_obat_rpoo') : null,
        'dokter_1_rpoo' => safe_post('dokter_1_rpoo') !== '' ? safe_post('dokter_1_rpoo') : null,
        'dokter_2_rpoo' => safe_post('dokter_2_rpoo') !== '' ? safe_post('dokter_2_rpoo') : null,
        'rute_rpoo' => safe_post('rute_rpoo') !== '' ? safe_post('rute_rpoo') : null,
        'dosis_rpoo' => safe_post('dosis_rpoo') !== '' ? safe_post('dosis_rpoo') : null,
        'frekuensi_rpoo' => safe_post('frekuensi_rpoo') !== '' ? safe_post('frekuensi_rpoo') : null,
        'eso_rpoo' => safe_post('eso_rpoo') !== '' ? safe_post('eso_rpoo') : null,
        'r_farmasi_rpoo' => safe_post('r_farmasi_rpoo') !== '' ? safe_post('r_farmasi_rpoo') : null,
        'alergiii' => safe_post('alergiii') !== '' ? safe_post('alergiii') : null,
        'alergii_obb' => safe_post('alergii_obb') !== '' ? safe_post('alergii_obb') : null,
        'date_created' => safe_post('pencegahan_date_rpo_infus') !== '' ? safe_post('pencegahan_date_rpo_infus') : null,
      );
      $this->m_pelayanan->insertRiwayatPemakaianObatInfus($riwayat_pemakaian_obat_infus);
    }

    // WPT 5
    $tanggal_wpt = safe_post('tanggal_wpt');
    $pencegahan_date_wpt = safe_post('pencegahan_date_wpt');
    $id_pendaftaran = safe_post('id_pendaftaran');
    if (!empty($pencegahan_date_wpt)) {
      $waktu_pemberian_tanggal = array(
        'id_pendaftaran' => $id_pendaftaran,
        'id_layanan_pendaftaran' => $layanan['id'],
        'id_user' => safe_post('user_pengkajian') !== '' ? safe_post('user_pengkajian') : null,
        'tanggal_wpt' => safe_post('tanggal_wpt') !== '' ? safe_post('tanggal_wpt') : null,
        'hari_wpt' => safe_post('hari_wpt') !== '' ? safe_post('hari_wpt') : null,
        'jam_wpt' => safe_post('jam_wpt') !== '' ? safe_post('jam_wpt') : null,
        'perawat_1_wpt' => safe_post('perawat_1_wpt') !== '' ? safe_post('perawat_1_wpt') : null,
        'pasien_keluarga_wpt' => safe_post('pasien_keluarga_wpt') !== '' ? safe_post('pasien_keluarga_wpt') : null,
        'pagi_wpt' => safe_post('pagi_wpt') !== '' ? safe_post('pagi_wpt') : null,
        'siang_wpt' => safe_post('siang_wpt') !== '' ? safe_post('siang_wpt') : null,
        'sore_wpt' => safe_post('sore_wpt') !== '' ? safe_post('sore_wpt') : null,
        'malam_wpt' => safe_post('malam_wpt') !== '' ? safe_post('malam_wpt') : null,
        'date_created' => safe_post('pencegahan_date_wpt') !== '' ? safe_post('pencegahan_date_wpt') : null,
      );
      $this->m_pelayanan->insertWaktuPemberianTanggal($waktu_pemberian_tanggal);
    }

    // IWPT 5
    $tanggal_wptt = safe_post('tanggal_wptt');
    $pencegahan_date_wptt_infus = safe_post('pencegahan_date_wptt_infus');
    $id_pendaftaran = safe_post('id_pendaftaran');
    if (!empty($pencegahan_date_wptt_infus)) {
      $waktu_pemberian_tanggal_infus = array(
        'id_pendaftaran' => $id_pendaftaran,
        'id_layanan_pendaftaran' => $layanan['id'],
        'id_user' => safe_post('user_pengkajian') !== '' ? safe_post('user_pengkajian') : null,
        'tanggal_wptt' => safe_post('tanggal_wptt') !== '' ? safe_post('tanggal_wptt') : null,
        'hari_wptt' => safe_post('hari_wptt') !== '' ? safe_post('hari_wptt') : null,
        'jam_wptt' => safe_post('jam_wptt') !== '' ? safe_post('jam_wptt') : null,
        'perawat_2_wptt' => safe_post('perawat_2_wptt') !== '' ? safe_post('perawat_2_wptt') : null,
        'pasien_keluarga_wptt' => safe_post('pasien_keluarga_wptt') !== '' ? safe_post('pasien_keluarga_wptt') : null,
        'pagi_wptt' => safe_post('pagi_wptt') !== '' ? safe_post('pagi_wptt') : null,
        'siang_wptt' => safe_post('siang_wptt') !== '' ? safe_post('siang_wptt') : null,
        'sore_wptt' => safe_post('sore_wptt') !== '' ? safe_post('sore_wptt') : null,
        'malam_wptt' => safe_post('malam_wptt') !== '' ? safe_post('malam_wptt') : null,
        'date_created' => safe_post('pencegahan_date_wptt_infus') !== '' ? safe_post('pencegahan_date_wptt_infus') : null,
      );
      $this->m_pelayanan->insertWaktuPemberianTanggalInfus($waktu_pemberian_tanggal_infus);
    }


    // MPP-C 5
    $tgl_mpp    = safe_post('tgl_mpp');
    $pencegahan_date_mpp    = safe_post('pencegahan_date_mpp');
    $id_pendaftaran         = safe_post('id_pendaftaran');
    if (!empty($pencegahan_date_mpp)) {
      $monitoring_pasien_2 = array(
        'id_pendaftaran'         => $id_pendaftaran,
        'id_layanan_pendaftaran' => $layanan['id'],
        'id_user'                => safe_post('user_pengkajian') !== '' ? safe_post('user_pengkajian') : null,
        'oral_mpp'               => safe_post('oral_mpp') !== '' ? safe_post('oral_mpp') : null,
        'ngt_mpp'                => safe_post('ngt_mpp') !== '' ? safe_post('ngt_mpp') : null,
        'paranteral_mpp'         => safe_post('paranteral_mpp') !== '' ? safe_post('paranteral_mpp') : null,
        'paranteral_mppp'        => safe_post('paranteral_mppp') !== '' ? safe_post('paranteral_mppp') : null,
        'produk_mpp'             => safe_post('produk_mpp') !== '' ? safe_post('produk_mpp') : null,
        'input_mpp'              => safe_post('input_mpp') !== '' ? safe_post('input_mpp') : null,
        'urin_mpp'               => safe_post('urin_mpp') !== '' ? safe_post('urin_mpp') : null,
        'bab_mpp'                => safe_post('bab_mpp') !== '' ? safe_post('bab_mpp') : null,
        'gastrik_mpp'            => safe_post('gastrik_mpp') !== '' ? safe_post('gastrik_mpp') : null,
        'wsd_mpp'                => safe_post('wsd_mpp') !== '' ? safe_post('wsd_mpp') : null,
        'iwl_mpp'                => safe_post('iwl_mpp') !== '' ? safe_post('iwl_mpp') : null,
        'output_mpp'             => safe_post('output_mpp') !== '' ? safe_post('output_mpp') : null,
        'blance_cairan_mpp'      => safe_post('blance_cairan_mpp') !== '' ? safe_post('blance_cairan_mpp') : null,
        'tdarah_mpp'              => safe_post('tdarah_mpp') !== '' ? safe_post('tdarah_mpp') : null,
        'saturasi_mppp'            => safe_post('saturasi_mppp') !== '' ? safe_post('saturasi_mppp') : null,
        'toksigen_mpp'            => safe_post('toksigen_mpp') !== '' ? safe_post('toksigen_mpp') : null,
        'skesadaran_mpp'          => safe_post('skesadaran_mpp') !== '' ? safe_post('skesadaran_mpp') : null,
        'kategori_mpp'            => safe_post('kategori_mpp') !== '' ? safe_post('kategori_mpp') : null,
        'pengawasan_mpp'          => safe_post('pengawasan_mpp') !== '' ? safe_post('pengawasan_mpp') : null,
        'diit_mpp'                => safe_post('diit_mpp') !== '' ? safe_post('diit_mpp') : null,
        'tgl_mpp'                   => safe_post('tgl_mpp') !== '' ? safe_post('tgl_mpp') : null,
        'jam_mpp'                   => safe_post('jam_mpp') !== '' ? safe_post('jam_mpp') : null,
        'perawat_mpp'             => safe_post('perawat_mpp') !== '' ? safe_post('perawat_mpp') : null,
        'date_created'            => safe_post('pencegahan_date_mpp') !== '' ? safe_post('pencegahan_date_mpp') : null,
      );
      $this->m_pelayanan->insertMonitoringPasien2($monitoring_pasien_2);
    }




    // PKN 5
    $tgl_pkn = safe_post('tgl_pkn');
    $pencegahan_date_pkn = safe_post('pencegahan_date_pkn');
    $id_pendaftaran = safe_post('id_pendaftaran');
    if (!empty($pencegahan_date_pkn)) {
      $pengawasan_khusus_neonatus = array(
        'id_pendaftaran' => $id_pendaftaran,
        'id_layanan_pendaftaran' => $layanan['id'],
        'id_user' => safe_post('user_pengkajian') !== '' ? safe_post('user_pengkajian') : null,
        'tgl_pkn' => safe_post('tgl_pkn') !== '' ? safe_post('tgl_pkn') : null,
        'jam_pkn' => safe_post('jam_pkn') !== '' ? safe_post('jam_pkn') : null,
        'bb_pkn' => safe_post('bb_pkn') !== '' ? safe_post('bb_pkn') : null,
        'lp_pkn' => safe_post('lp_pkn') !== '' ? safe_post('lp_pkn') : null,
        'kesadaran_pkn' => safe_post('kesadaran_pkn') !== '' ? safe_post('kesadaran_pkn') : null,
        'pasien_pkn' => safe_post('pasien_pkn') !== '' ? safe_post('pasien_pkn') : null,
        'inkubator_pkn' => safe_post('inkubator_pkn') !== '' ? safe_post('inkubator_pkn') : null,
        'nadi_pkn' => safe_post('nadi_pkn') !== '' ? safe_post('nadi_pkn') : null,
        'rr_pkn' => safe_post('rr_pkn') !== '' ? safe_post('rr_pkn') : null,
        'modus_pkn' => safe_post('modus_pkn') !== '' ? safe_post('modus_pkn') : null,
        'peep_pkn' => safe_post('peep_pkn') !== '' ? safe_post('peep_pkn') : null,
        'buble_pkn' => safe_post('buble_pkn') !== '' ? safe_post('buble_pkn') : null,
        'fio2_pkn' => safe_post('fio2_pkn') !== '' ? safe_post('fio2_pkn') : null,
        'spo2_pkn' => safe_post('spo2_pkn') !== '' ? safe_post('spo2_pkn') : null,
        'flow_pkn' => safe_post('flow_pkn') !== '' ? safe_post('flow_pkn') : null,
        'air_pkn' => safe_post('air_pkn') !== '' ? safe_post('air_pkn') : null,
        'suhu_pkn' => safe_post('suhu_pkn') !== '' ? safe_post('suhu_pkn') : null,
        'line1_pkn' => safe_post('line1_pkn') !== '' ? safe_post('line1_pkn') : null,
        'line2_pkn' => safe_post('line2_pkn') !== '' ? safe_post('line2_pkn') : null,
        'plebitis_pkn' => safe_post('plebitis_pkn') !== '' ? safe_post('plebitis_pkn') : null,
        'oral_pkn' => safe_post('oral_pkn') !== '' ? safe_post('oral_pkn') : null,
        'jml_pkn' => safe_post('jml_pkn') !== '' ? safe_post('jml_pkn') : null,
        'muntah_pkn' => safe_post('muntah_pkn') !== '' ? safe_post('muntah_pkn') : null,
        'residu_pkn' => safe_post('residu_pkn') !== '' ? safe_post('residu_pkn') : null,
        'bak_pkn' => safe_post('bak_pkn') !== '' ? safe_post('bak_pkn') : null,
        'bab_pkn' => safe_post('bab_pkn') !== '' ? safe_post('bab_pkn') : null,
        'foto_therapy_pkn' => safe_post('foto_therapy_pkn') !== '' ? safe_post('foto_therapy_pkn') : null,
        'obat_pkn' => safe_post('obat_pkn') !== '' ? safe_post('obat_pkn') : null,
        'perawat_pkn' => safe_post('perawat_pkn') !== '' ? safe_post('perawat_pkn') : null,
        'date_created' => safe_post('pencegahan_date_pkn') !== '' ? safe_post('pencegahan_date_pkn') : null,
      );
      $this->m_pelayanan->insertPengawasanKhususNeonatus($pengawasan_khusus_neonatus);
    }


    $ek_kontrol_dokter = safe_post('ambil_tanggal');

    if ($ek_kontrol_dokter) {

      $ek_kontrol = is_string($ek_kontrol_dokter);

      if ($ek_kontrol_dokter === "" || $ek_kontrol_dokter === null) {

        $ek_dokter = null;
      } else if (!is_array($ek_kontrol_dokter)) {

        $ek_dokter = null;
      } else if (empty($ek_kontrol_dokter)) {

        $ek_dokter = null;
      } else if ($ek_kontrol === true) {

        $ek_dokter = null;
      } else {

        foreach ($ek_kontrol_dokter as $key => $value) {

          $date = new DateTime($value);
          $new = $date->format('Y-m-d H:i:s');

          $ek_dokter[$key] = $new;
        }
      }

      $tanggal_dibuat = safe_post('tanggal_dibuat');

      $ek_tanggal_dibuat = is_string($tanggal_dibuat);

      if ($tanggal_dibuat === "" || $tanggal_dibuat === null) {

        $dibuat_tanggal = null;
      } else if (!is_array($tanggal_dibuat)) {

        $dibuat_tanggal = null;
      } else if (empty($tanggal_dibuat)) {

        $dibuat_tanggal = null;
      } else if ($ek_tanggal_dibuat === true) {

        $dibuat_tanggal = null;
      } else {

        foreach ($tanggal_dibuat as $key => $value) {

          $date = new DateTime($value);
          $new = $date->format('Y-m-d H:i:s');

          $dibuat_tanggal[$key] = $new;
        }
      }

      $jadwal_kontrol = array(
        'id_layanan_pendaftaran' => $layanan['id'],
        'tanggal' => $ek_dokter,
        'id_ek_nama_dokter' => safe_post('id_ek_nama_dokter') !== '' ? safe_post('id_ek_nama_dokter') : NULL,
        'tempat_kontrol' => safe_post('ek_tempat_kontrol') !== '' ? safe_post('ek_tempat_kontrol') : NULL,
        'user' => safe_post('ek_operator') !== '' ? safe_post('ek_operator') : NULL,
        'created_date' => $dibuat_tanggal,
      );

      $this->m_pelayanan->updateJadwalKontrolKeperawatan($jadwal_kontrol);
    } else {

      $ek_kontrol_dokter = safe_post('ek_kontrol_dokter');

      if (!empty($ek_kontrol_dokter)) {

        $respon = ['show' => '0', 'status' => false, 'message' => 'Data Kontrol Kembali Belum ditambahkan', 'id' => '#data-kontrol-kembali'];
      }
    }

    $obat = safe_post('id_barang_auto');

    if ($obat) {

      $ek_nol = safe_post('ek_jam_pemberian');

      $ek_nol_filter = is_string($ek_nol);

      if ($ek_nol === "" || $ek_nol === null) {

        $terapi_nol = null;
      } else if ($ek_nol[0] === '') {

        $terapi_nol = null;
      } else if (!is_array($ek_nol)) {

        $terapi_nol = null;
      } else if (empty($ek_nol)) {

        $terapi_nol = null;
      } else if ($ek_nol_filter === true) {

        $terapi_nol = null;
      } else {

        foreach ($ek_nol as $key => $value) {

          $date = new DateTime($value);
          $new = $date->format('H:i:s');

          $terapi_nol[$key] = $new;
        }
      }

      $ek_satu = safe_post('ek_jam_pemberian_satu');

      $ek_satu_filter = is_string($ek_satu);

      if ($ek_satu === "" || $ek_satu === null) {

        $terapi_satu = null;
      } else if ($ek_satu[0] === '') {

        $terapi_satu = null;
      } else if (!is_array($ek_satu)) {

        $terapi_satu = null;
      } else if (empty($ek_satu)) {

        $terapi_satu = null;
      } else if ($ek_satu_filter === true) {

        $terapi_satu = null;
      } else {

        foreach ($ek_satu as $key => $value) {
          $date = new DateTime($value);
          $new = $date->format('H:i:s');

          $terapi_satu[$key] = $new;
        }
      }

      $ek_dua = safe_post('ek_jam_pemberian_dua');

      $ek_dua_filter = is_string($ek_dua);

      if ($ek_dua === "" || $ek_dua === null) {

        $terapi_dua = null;
      } else if ($ek_dua[0] === '') {

        $terapi_dua = null;
      } else if (!is_array($ek_dua)) {

        $terapi_dua = null;
      } else if (empty($ek_dua)) {

        $terapi_dua = null;
      } else if ($ek_dua_filter === true) {

        $terapi_dua = null;
      } else {

        foreach ($ek_dua as $key => $value) {

          $date = new DateTime($value);
          $new = $date->format('H:i:s');

          $terapi_dua[$key] = $new;
        }
      }

      $ek_tiga = safe_post('ek_jam_pemberian_tiga');

      $ek_tiga_filter = is_string($ek_tiga);

      if ($ek_tiga === "" || $ek_tiga === null) {

        $terapi_tiga = null;
      } else if ($ek_tiga[0] === '') {

        $terapi_tiga = null;
      } else if (!is_array($ek_tiga)) {

        $terapi_tiga = null;
      } else if (empty($ek_tiga)) {

        $terapi_tiga = null;
      } else if ($ek_tiga_filter === true) {

        $terapi_tiga = null;
      } else {

        foreach ($ek_tiga as $key => $value) {

          $date = new DateTime($value);
          $new = $date->format('H:i:s');

          $terapi_tiga[$key] = $new;
        }
      }

      $ek_empat = safe_post('ek_jam_pemberian_empat');

      $ek_empat_filter = is_string($ek_empat);

      if ($ek_empat === "" || $ek_empat === null) {

        $terapi_empat = null;
      } else if ($ek_empat[0] === '') {

        $terapi_empat = null;
      } else if (!is_array($ek_empat)) {


        $terapi_empat = null;
      } else if (empty($ek_empat)) {


        $terapi_empat = null;
      } else if ($ek_empat_filter === true) {

        $terapi_empat = null;
      } else {

        foreach ($ek_empat as $key => $value) {

          $date = new DateTime($value);
          $new = $date->format('H:i:s');

          $terapi_empat[$key] = $new;
        }
      }

      $ek_lima = safe_post('ek_jam_pemberian_lima');

      $ek_lima_filter = is_string($ek_lima);

      if ($ek_lima === "" || $ek_lima === null) {

        $terapi_lima = null;
      } else if ($ek_lima[0] === '') {

        $terapi_lima = null;
      } else if (!is_array($ek_lima)) {

        $terapi_lima = null;
      } else if (empty($ek_lima)) {

        $terapi_lima = null;
      } else if ($ek_lima_filter === true) {

        $terapi_lima = null;
      } else {

        foreach ($ek_lima as $key => $value) {

          $date = new DateTime($value);
          $new = $date->format('H:i:s');

          $terapi_lima[$key] = $new;
        }
      }

      $created_date = safe_post('created_date');

      $ek_created_date = is_string($created_date);

      if ($created_date === "" || $created_date === null) {

        $date_created = null;
      } else if ($created_date[0] === '') {

        $date_created = null;
      } else if (!is_array($created_date)) {

        $date_created = null;
      } else if (empty($created_date)) {

        $date_created = null;
      } else if ($ek_created_date === true) {

        $date_created = null;
      } else {

        foreach ($created_date as $key => $value) {

          $date = new DateTime($value);
          $new = $date->format('Y-m-d H:i:s');

          $date_created[$key] = $new;
        }
      }

      $terapi_pulang = array(
        'id_layanan_pendaftaran' => $layanan['id'],
        'obat' => safe_post('id_barang_auto') !== '' ? safe_post('id_barang_auto') : NULL,
        'jumlah_obat' => safe_post('jumlah_obat') !== '' ? safe_post('jumlah_obat') : NULL,
        'dosis' => safe_post('trp_dosis') !== '' ? safe_post('trp_dosis') : NULL,
        'frekuensi' => safe_post('frekuensi') !== '' ? safe_post('frekuensi') : NULL,
        'cara_pemberian' => safe_post('cara_pemberian') !== '' ? safe_post('cara_pemberian') : NULL,
        'ek_jam_pemberian' => $terapi_nol,
        'ek_jam_pemberian_satu' => $terapi_satu,
        'ek_jam_pemberian_dua' => $terapi_dua,
        'ek_jam_pemberian_tiga' => $terapi_tiga,
        'ek_jam_pemberian_empat' => $terapi_empat,
        'ek_jam_pemberian_lima' => $terapi_lima,
        'petunjuk_khusus' => safe_post('petunjuk_khusus') !== '' ? safe_post('petunjuk_khusus') : NULL,
        'id_users' => safe_post('user_account') !== '' ? safe_post('user_account') : NULL,
        'created_date' => $date_created,
      );

      $this->m_pelayanan->updateTerapiPulang($terapi_pulang);
    } else {

      $obat = safe_post('obat');

      if (!empty($obat)) {

        $respon = ['show' => '0', 'add_show' => '0', 'status' => false, 'message' => 'Data Terapi Pulang Belum ditambahkan', 'id' => '#data-terapi-pulang'];
      }
    }

    $ek_tanggal_catatan_tindakan = safe_post('ek_tanggal_catatan_tindakan');

    if ($ek_tanggal_catatan_tindakan) {

      $ek_tanggal_catatan_tindakan = safe_post('ek_tanggal_catatan_tindakan');

      $ek_tanggal_tindakan_satu = is_string($ek_tanggal_catatan_tindakan);

      if ($ek_tanggal_catatan_tindakan === "" || $ek_tanggal_catatan_tindakan === null) {

        $tanggal_catatan_tindakan = null;
      } else if (!is_array($ek_tanggal_catatan_tindakan)) {

        $tanggal_catatan_tindakan = null;
      } else if (empty($ek_tanggal_catatan_tindakan)) {

        $tanggal_catatan_tindakan = null;
      } else if ($ek_tanggal_tindakan_satu === true) {

        $tanggal_catatan_tindakan = null;
      } else {

        foreach ($ek_tanggal_catatan_tindakan as $key => $value) {

          $date = new DateTime($value);
          $new = $date->format('Y-m-d');

          $tanggal_catatan_tindakan[$key] = $new;
        }
      }

      $ek_catatan_tindakan_keperawatan = safe_post('ek_catatan_tindakan_keperawatan');
      $ek_catatan_tindakan_keperawatan_filter = is_string($ek_catatan_tindakan_keperawatan);
      if ($ek_catatan_tindakan_keperawatan === "" || $ek_catatan_tindakan_keperawatan === null) {
        $catatan_tindakan_keperawatan = NULL;
      } else if (!is_array($ek_catatan_tindakan_keperawatan)) {
        $catatan_tindakan_keperawatan = NULL;
      } else if (empty($ek_catatan_tindakan_keperawatan)) {
        $catatan_tindakan_keperawatan = NULL;
      } else if ($ek_catatan_tindakan_keperawatan_filter === true) {
        $catatan_tindakan_keperawatan = NULL;
      } else {
        foreach ($ek_catatan_tindakan_keperawatan as $key => $value) {
          $catatan_tindakan_keperawatan[$key] = $value;
        }
      }

      $ek_catatan_tindakan_keperawatan_manual = safe_post('ek_catatan_tindakan_keperawatan_manual');
      $ek_catatan_tindakan_keperawatan_manual_filter = is_string($ek_catatan_tindakan_keperawatan_manual);
      if ($ek_catatan_tindakan_keperawatan_manual === "" || $ek_catatan_tindakan_keperawatan_manual === null) {
        $catatan_tindakan_keperawatan_manual = NULL;
      } else if (!is_array($ek_catatan_tindakan_keperawatan_manual)) {
        $catatan_tindakan_keperawatan_manual = NULL;
      } else if (empty($ek_catatan_tindakan_keperawatan_manual)) {
        $catatan_tindakan_keperawatan_manual = NULL;
      } else if ($ek_catatan_tindakan_keperawatan_manual_filter === true) {
        $catatan_tindakan_keperawatan_manual = NULL;
      } else {
        foreach ($ek_catatan_tindakan_keperawatan_manual as $key => $value) {
          $catatan_tindakan_keperawatan_manual[$key] = $value;
        }
      }

      $tanggal_catatan_tindakan_dibuat = safe_post('tanggal_catatan_tindakan_dibuat');
      $ek_tanggal_catatan_tindakan_dibuat = is_string($tanggal_catatan_tindakan_dibuat);

      if ($tanggal_catatan_tindakan_dibuat === "" || $tanggal_catatan_tindakan_dibuat === null) {

        $tanggal_tindakan = null;
      } else if (!is_array($tanggal_catatan_tindakan_dibuat)) {

        $tanggal_tindakan = null;
      } else if (empty($tanggal_catatan_tindakan_dibuat)) {

        $tanggal_tindakan = null;
      } else if ($ek_tanggal_catatan_tindakan_dibuat === true) {

        $tanggal_tindakan = null;
      } else {

        foreach ($tanggal_catatan_tindakan_dibuat as $key => $value) {

          $date = new DateTime($value);
          $new = $date->format('Y-m-d H:i:s');

          $tanggal_tindakan[$key] = $new;
        }
      }

      //PAGI
      $ek_jam_pagi = safe_post('ek_jam_pagi');
      $catatan_jam_pagi = [];
      foreach ($ek_jam_pagi as $key => $value) {
        if (empty($value)) {
          $catatan_jam_pagi[] = NULL;
          continue;
        }
        $date = new DateTime($value);
        $new = $date->format('H:i:s');
        $catatan_jam_pagi[$key] = $new;
      }

      //SORE
      $ek_jam_sore = safe_post('ek_jam_sore');
      $catatan_jam_sore = [];
      foreach ($ek_jam_sore as $key => $value) {
        if (empty($value)) {
          $catatan_jam_sore[] = NULL;
          continue;
        }
        $date = new DateTime($value);
        $new = $date->format('H:i:s');
        $catatan_jam_sore[$key] = $new;
      }

      //MALAM
      $ek_jam_malam = safe_post('ek_jam_malam');
      $catatan_jam_malam = [];
      foreach ($ek_jam_malam as $key => $value) {
        if (empty($value)) {
          $catatan_jam_malam[] = NULL;
          continue;
        }
        $date = new DateTime($value);
        $new = $date->format('H:i:s');
        $catatan_jam_malam[$key] = $new;
      }

      $catatan_tindakan_keperawatan = array(
        'id_layanan_pendaftaran' => $layanan['id'],
        'ek_catatan_tindakan_keperawatan' => $catatan_tindakan_keperawatan,
        'ek_catatan_tindakan_keperawatan_manual' => $catatan_tindakan_keperawatan_manual,
        'ek_keterangan_catatan' => safe_post('ek_keterangan_catatan') !== '' ? safe_post('ek_keterangan_catatan') : NULL,
        'ek_tanggal_catatan_tindakan' => $tanggal_catatan_tindakan,
        'ek_bismillah_pagi' => safe_post('ek_bismillah_pagi') !== '' ? safe_post('ek_bismillah_pagi') : NULL,
        'ek_cek_pagi' => safe_post('ek_cek_pagi') !== '' ? safe_post('ek_cek_pagi') : NULL,
        'ek_jam_pagi' => $catatan_jam_pagi,
        'ek_paraf_pagi' => safe_post('ek_paraf_pagi') !== '' ? safe_post('ek_paraf_pagi') : NULL,
        'ek_perawat_tindakan_pagi' => safe_post('ek_perawat_tindakan_pagi') !== '' ? safe_post('ek_perawat_tindakan_pagi') : NULL,
        'ek_hamdalah_pagi' => safe_post('ek_hamdalah_pagi') !== '' ? safe_post('ek_hamdalah_pagi') : NULL,
        'ek_bismillah_sore' => safe_post('ek_bismillah_sore') !== '' ? safe_post('ek_bismillah_sore') : NULL,
        'ek_cek_sore' => safe_post('ek_cek_sore') !== '' ? safe_post('ek_cek_sore') : NULL,
        'ek_jam_sore' => $catatan_jam_sore,
        'ek_paraf_sore' => safe_post('ek_paraf_sore') !== '' ? safe_post('ek_paraf_sore') : NULL,
        'ek_perawat_tindakan_sore' => safe_post('ek_perawat_tindakan_sore') !== '' ? safe_post('ek_perawat_tindakan_sore') : NULL,
        'ek_hamdalah_sore' => safe_post('ek_hamdalah_sore') !== '' ? safe_post('ek_hamdalah_sore') : NULL,
        'ek_bismillah_malam' => safe_post('ek_bismillah_malam') !== '' ? safe_post('ek_bismillah_malam') : NULL,
        'ek_cek_malam' => safe_post('ek_cek_malam') !== '' ? safe_post('ek_cek_malam') : NULL,
        'ek_jam_malam' => $catatan_jam_malam,
        'ek_perawat_tindakan_malam' => safe_post('ek_perawat_tindakan_malam') !== '' ? safe_post('ek_perawat_tindakan_malam') : NULL,
        'ek_hamdalah_malam' => safe_post('ek_hamdalah_malam') !== '' ? safe_post('ek_hamdalah_malam') : NULL,
        'ek_paraf_malam' => safe_post('ek_paraf_malam') !== '' ? safe_post('ek_paraf_malam') : NULL,
        'ek_operator_catatan_tindakan' => safe_post('ek_operator_catatan_tindakan') !== '' ? safe_post('ek_operator_catatan_tindakan') : NULL,
        'created_date' => $tanggal_tindakan,
      );

      $this->m_pelayanan->updateCatatanTindakanKeperawatan($catatan_tindakan_keperawatan, false);
    } else {

      $keg_tindakan_keperawatan = safe_post('keg_tindakan_keperawatan');

      if (!empty($keg_tindakan_keperawatan)) {

        $respon = ['show' => '2', 'status' => false, 'message' => 'Kegiatan Tindakan Keperawatan Belum ditambahkan', 'id' => '#nurse-note'];
      }
    }

    $rencana_tindakan_keperawatan = safe_post('rencana_tindakan_keperawatan');

    if ($rencana_tindakan_keperawatan) {

      $tanggal_tindakan_satu = safe_post('tanggal_tindakan_satu');
      $ek_tanggal_tindakan_satu = is_string($tanggal_tindakan_satu);

      if ($tanggal_tindakan_satu === "" || $tanggal_tindakan_satu === null) {

        $tanggal_dibuat_rencana = null;
      } else if (!is_array($tanggal_tindakan_satu)) {

        $tanggal_dibuat_rencana = null;
      } else if (empty($tanggal_tindakan_satu)) {

        $tanggal_dibuat_rencana = null;
      } else if ($ek_tanggal_tindakan_satu === true) {

        $tanggal_dibuat_rencana = null;
      } else {

        foreach ($tanggal_tindakan_satu as $key => $value) {

          $date = new DateTime($value);
          $new = $date->format('Y-m-d');

          $tanggal_dibuat_rencana[$key] = $new;
        }
      }

      $tanggal_tindakan_dua = safe_post('tanggal_tindakan_dua');
      $ek_tanggal_tindakan_dua = is_string($tanggal_tindakan_dua);

      if ($tanggal_tindakan_dua === "" || $tanggal_tindakan_dua === null) {

        $tanggal_dibuat_rencana_dua = null;
      } else if (!is_array($tanggal_tindakan_dua)) {


        $tanggal_dibuat_rencana_dua = null;
      } else if (empty($tanggal_tindakan_dua)) {


        $tanggal_dibuat_rencana_dua = null;
      } else if ($ek_tanggal_tindakan_dua === true) {

        $tanggal_dibuat_rencana_dua = null;
      } else {

        foreach ($tanggal_tindakan_dua as $key => $value) {

          $date = new DateTime($value);
          $new = $date->format('Y-m-d');

          $tanggal_dibuat_rencana_dua[$key] = $new;
        }
      }

      $tanggal_tindakan_tiga = safe_post('tanggal_tindakan_tiga');
      $ek_tanggal_tindakan_tiga = is_string($tanggal_tindakan_tiga);

      if ($tanggal_tindakan_tiga === "" || $tanggal_tindakan_tiga === null) {

        $tanggal_dibuat_rencana_tiga = null;
      } else if (!is_array($tanggal_tindakan_tiga)) {

        $tanggal_dibuat_rencana_tiga = null;
      } else if (empty($tanggal_tindakan_tiga)) {

        $tanggal_dibuat_rencana_tiga = null;
      } else if ($ek_tanggal_tindakan_tiga === true) {

        $tanggal_dibuat_rencana_tiga = null;
      } else {

        foreach ($tanggal_tindakan_tiga as $key => $value) {

          $date = new DateTime($value);
          $new = $date->format('Y-m-d');

          $tanggal_dibuat_rencana_tiga[$key] = $new;
        }
      }

      $tanggal_rencana_dibuat = safe_post('tanggal_rencana_dibuat');
      $ek_tanggal_rencana_dibuat = is_string($tanggal_rencana_dibuat);

      if ($tanggal_rencana_dibuat === "" || $tanggal_rencana_dibuat === null) {

        $tanggal_rencana = null;
      } else if (!is_array($tanggal_rencana_dibuat)) {

        $tanggal_rencana = null;
      } else if (empty($tanggal_rencana_dibuat)) {

        $tanggal_rencana = null;
      } else if ($ek_tanggal_rencana_dibuat === true) {

        $tanggal_rencana = null;
      } else {

        foreach ($tanggal_rencana_dibuat as $key => $value) {

          $date = new DateTime($value);
          $new = $date->format('Y-m-d H:i:s');

          $tanggal_rencana[$key] = $new;
        }
      }

      $rncn_tind_keperawatan = array(
        'id_layanan_pendaftaran' => $layanan['id'],
        'rencana_tindakan_keperawatan' => safe_post('rencana_tindakan_keperawatan') !== '' ? safe_post('rencana_tindakan_keperawatan') : NULL,
        'keterangan' => safe_post('ek_keterangan_tambahan') !== '' ? safe_post('ek_keterangan_tambahan') : NULL,
        'tanggal_tindakan_satu' => $tanggal_dibuat_rencana,
        'ek_tambahan_status' => safe_post('ek_tambahan_status') !== '' ? safe_post('ek_tambahan_status') : NULL,
        'ek_waktu_pagi' => safe_post('ek_waktu_pagi') !== '' ? safe_post('ek_waktu_pagi') : NULL,
        'ek_waktu_siang' => safe_post('ek_waktu_siang') !== '' ? safe_post('ek_waktu_siang') : NULL,
        'ek_waktu_malam' => safe_post('ek_waktu_malam') !== '' ? safe_post('ek_waktu_malam') : NULL,
        'tanggal_tindakan_dua' => $tanggal_dibuat_rencana_dua,
        'ek_tambahan_status_dua' => safe_post('ek_tambahan_status_dua') !== '' ? safe_post('ek_tambahan_status_dua') : NULL,
        'ek_waktu_pagi_dua' => safe_post('ek_waktu_pagi_dua') !== '' ? safe_post('ek_waktu_pagi_dua') : NULL,
        'ek_waktu_siang_dua' => safe_post('ek_waktu_siang_dua') !== '' ? safe_post('ek_waktu_siang_dua') : NULL,
        'ek_waktu_malam_dua' => safe_post('ek_waktu_malam_dua') !== '' ? safe_post('ek_waktu_malam_dua') : NULL,
        'tanggal_tindakan_tiga' => $tanggal_dibuat_rencana_tiga,
        'ek_tambahan_status_tiga' => safe_post('ek_tambahan_status_tiga') !== '' ? safe_post('ek_tambahan_status_tiga') : NULL,
        'ek_waktu_pagi_tiga' => safe_post('ek_waktu_pagi_tiga') !== '' ? safe_post('ek_waktu_pagi_tiga') : NULL,
        'ek_waktu_siang_tiga' => safe_post('ek_waktu_siang_tiga') !== '' ? safe_post('ek_waktu_siang_tiga') : NULL,
        'ek_waktu_malam_tiga' => safe_post('ek_waktu_malam_tiga') !== '' ? safe_post('ek_waktu_malam_tiga') : NULL,
        'ek_operator_rencana_tindakan' => safe_post('ek_operator_rencana_tindakan') !== '' ? safe_post('ek_operator_rencana_tindakan') : NULL,
        'created_date' => $tanggal_rencana,
      );

      $this->m_pelayanan->updateRencanaTindakanKeperawatan($rncn_tind_keperawatan, false);
    } else {

      $rencana_tindakan = safe_post('rencana_tindakan');

      if (!empty($rencana_tindakan)) {

        $respon = ['show' => '1', 'status' => false, 'message' => 'Rencana Tindakan Keperawatan Belum ditambahkan', 'id' => '#rencana-tindakan-keperawatan'];
      }
    }

    $masalah_keperawatan = safe_post('masalah_keperawatan');

    if ($masalah_keperawatan) {

      $tanggal_masalah_dibuat = safe_post('tanggal_masalah_dibuat');

      $ek_tanggal_masalah_dibuat = is_string($tanggal_masalah_dibuat);

      if ($tanggal_masalah_dibuat === "" || $tanggal_masalah_dibuat === null) {

        $tanggal_dibuat_masalah = null;
      } else if (!is_array($tanggal_masalah_dibuat)) {

        $tanggal_dibuat_masalah = null;
      } else if (empty($tanggal_masalah_dibuat)) {

        $tanggal_dibuat_masalah = null;
      } else if ($ek_tanggal_masalah_dibuat === true) {

        $tanggal_dibuat_masalah = null;
      } else {

        foreach ($tanggal_masalah_dibuat as $key => $value) {

          $date = new DateTime($value);
          $new = $date->format('Y-m-d H:i:s');

          $tanggal_dibuat_masalah[$key] = $new;
        }
      }

      $tanggal_dimulai = safe_post('tanggal_mulai');

      $ek_tanggal_dimulai = is_string($tanggal_dimulai);

      if ($tanggal_dimulai === "" || $tanggal_dimulai === null) {

        $tanggal_mulai_awal = null;
      } else if (!is_array($tanggal_dimulai)) {

        $tanggal_mulai_awal = null;
      } else if (empty($tanggal_dimulai)) {

        $tanggal_mulai_awal = null;
      } else if ($ek_tanggal_dimulai === true) {

        $tanggal_mulai_awal = null;
      } else {

        foreach ($tanggal_dimulai as $key => $value) {

          $date = new DateTime($value);
          $new = $date->format('Y-m-d H:i:s');

          $tanggal_mulai_awal[$key] = $new;
        }
      }

      $tanggal_diakhiri = safe_post('tanggal_selesai');

      $ek_tanggal_diakhiri = is_string($tanggal_diakhiri);

      if ($tanggal_diakhiri === "" || $tanggal_diakhiri === null) {

        $tanggal_mulai_akhir = null;
      } else if (!is_array($tanggal_diakhiri)) {

        $tanggal_mulai_akhir = null;
      } else if (empty($tanggal_diakhiri)) {

        $tanggal_mulai_akhir = null;
      } else if ($ek_tanggal_diakhiri === true) {

        $tanggal_mulai_akhir = null;
      } else {

        foreach ($tanggal_diakhiri as $key => $value) {

          $date = new DateTime($value);
          $new = $date->format('Y-m-d H:i:s');

          $tanggal_mulai_akhir[$key] = $new;
        }
      }

      $mslh_keperawatan = array(
        'id_layanan_pendaftaran' => $layanan['id'],
        'masalah_keperawatan' => safe_post('masalah_keperawatan') !== '' ? safe_post('masalah_keperawatan') : NULL,
        'tanggal_mulai' => $tanggal_mulai_awal,
        'tanggal_selesai' => $tanggal_mulai_akhir,
        'id_users' => safe_post('ek_operator_masalah') !== '' ? safe_post('ek_operator_masalah') : NULL,
        'created_date' => $tanggal_dibuat_masalah,
      );

      $this->m_pelayanan->updateMasalahKeperawatan($mslh_keperawatan);
    } else {

      $masalah_keperawatan = safe_post('ek_masalah_keperawatan');

      if (!empty($masalah_keperawatan)) {

        $respon = ['show' => '1', 'status' => false, 'message' => 'Data Asuhan Keperawatan Belum ditambahkan', 'id' => '#data-asuhan-keperawatan'];
      }
    }


    $purja_tanggal_pengkajian = safe_post('purja_tanggal_pengkajian');
    $id_pendaftaran = safe_post('id_pendaftaran');

    if (!empty($purja_tanggal_pengkajian)) {
      $pengkajian_date_anak = safe_post('pengkajian_date_anak') ?? null;

      $pengkajian_ulang = array(
        'id_pendaftaran' => $id_pendaftaran,
        'id_layanan_pendaftaran' => $layanan['id'],
        'tanggal_pengkajian' => safe_post('purjpa_tanggal_pengkajian'),
        'jumlah_skor' => safe_post('jumlah_skor') !== '' ? safe_post('jumlah_skor') : null,
        'paraf' => safe_post('purjpa_paraf') !== '' ? safe_post('purjpa_paraf') : null,
        'perawat' => safe_post('purjpa_perawat') !== '' ? safe_post('purjpa_perawat') : null,
        'umur' => safe_post('umur') !== '' ? safe_post('umur') : null,
        'jenis_kelamin' => safe_post('jenis_kelamin') !== '' ? safe_post('jenis_kelamin') : null,
        'diagnosis' => safe_post('diagnosis') !== '' ? safe_post('diagnosis') : null,
        'gangguan_kognitif' => safe_post('gangguan_kognitif') !== '' ? safe_post('gangguan_kognitif') : null,
        'faktor_lingkungan' => safe_post('faktor_lingkungan') !== '' ? safe_post('faktor_lingkungan') : null,
        'respon_pembedahan' => safe_post('respon_pembedahan') !== '' ? safe_post('respon_pembedahan') : null,
        'penggunaan_obat' => safe_post('penggunaan_obat') !== '' ? safe_post('penggunaan_obat') : null,
        'date_created' => $pengkajian_date_anak,
        'users' => safe_post('user_pengkajian') !== '' ? safe_post('user_pengkajian') : null,
      );


      $this->m_pelayanan->insertPengkajianUlangAnak($pengkajian_ulang);
    }

    // else {

    // $purjd_tanggal_pengkajian = safe_post('purjd_tanggal_pengkajian');

    // if (!empty($purjd_tanggal_pengkajian)) {

    // $respon = ['show' => '3', 'status' => false, 'message' => 'Pengkajian Ulang Resiko Jatuh Dewasa Belum ditambahkan', 'id' => '#data-pengkajian-ulang-resiko'];
    // }
    // }

    $uprjpa_tanggal_pengkajian = safe_post('uprjpa_tanggal_pengkajian');
    $id_pendaftaran = safe_post('id_pendaftaran');

    if (!empty($uprjpa_tanggal_pengkajian)) {
      $uprjpa_data = array(
        'id_pendaftaran' => $id_pendaftaran,
        'id_layanan_pendaftaran' => $layanan['id'],
        'id_perawat_p' => safe_post('uprjpa_perawat_p') !== '' ? safe_post('uprjpa_perawat_p') : null,
        'id_perawat_s' => safe_post('uprjpa_perawat_s') !== '' ? safe_post('uprjpa_perawat_s') : null,
        'id_perawat_m' => safe_post('uprjpa_perawat_m') !== '' ? safe_post('uprjpa_perawat_m') : null,
        'id_user' => safe_post('user_uprjpa') !== '' ? safe_post('user_uprjpa') : null,
        'tanggal_pengkajian' => safe_post('uprjpa_tanggal_pengkajian'),

        // Bel berfungsi dan mudah dijangkau
        'bel_p_ho' => safe_post('uprjpa_bel_p_ho') !== '' ? safe_post('uprjpa_bel_p_ho') : null,
        'bel_p_10' => safe_post('uprjpa_bel_p_10') !== '' ? safe_post('uprjpa_bel_p_10') : null,
        'bel_s_ho' => safe_post('uprjpa_bel_s_ho') !== '' ? safe_post('uprjpa_bel_s_ho') : null,
        'bel_s_18' => safe_post('uprjpa_bel_s_18') !== '' ? safe_post('uprjpa_bel_s_18') : null,
        'bel_m_ho' => safe_post('uprjpa_bel_m_ho') !== '' ? safe_post('uprjpa_bel_m_ho') : null,
        'bel_m_23' => safe_post('uprjpa_bel_m_23') !== '' ? safe_post('uprjpa_bel_m_23') : null,
        'bel_m_4' => safe_post('uprjpa_bel_m_4') !== '' ? safe_post('uprjpa_bel_m_4') : null,

        // Roda tempat tidur terkunci
        'roda_p_ho' => safe_post('uprjpa_roda_p_ho') !== '' ? safe_post('uprjpa_roda_p_ho') : null,
        'roda_p_10' => safe_post('uprjpa_roda_p_10') !== '' ? safe_post('uprjpa_roda_p_10') : null,
        'roda_s_ho' => safe_post('uprjpa_roda_s_ho') !== '' ? safe_post('uprjpa_roda_s_ho') : null,
        'roda_s_18' => safe_post('uprjpa_roda_s_18') !== '' ? safe_post('uprjpa_roda_s_18') : null,
        'roda_m_ho' => safe_post('uprjpa_roda_m_ho') !== '' ? safe_post('uprjpa_roda_m_ho') : null,
        'roda_m_23' => safe_post('uprjpa_roda_m_23') !== '' ? safe_post('uprjpa_roda_m_23') : null,
        'roda_m_4' => safe_post('uprjpa_roda_m_4') !== '' ? safe_post('uprjpa_roda_m_4') : null,

        // Posisikan tempat tidur pada posisi terendah
        'ptt_p_ho' => safe_post('uprjpa_ptt_p_ho') !== '' ? safe_post('uprjpa_ptt_p_ho') : null,
        'ptt_p_10' => safe_post('uprjpa_ptt_p_10') !== '' ? safe_post('uprjpa_ptt_p_10') : null,
        'ptt_s_ho' => safe_post('uprjpa_ptt_s_ho') !== '' ? safe_post('uprjpa_ptt_s_ho') : null,
        'ptt_s_18' => safe_post('uprjpa_ptt_s_18') !== '' ? safe_post('uprjpa_ptt_s_18') : null,
        'ptt_m_ho' => safe_post('uprjpa_ptt_m_ho') !== '' ? safe_post('uprjpa_ptt_m_ho') : null,
        'ptt_m_23' => safe_post('uprjpa_ptt_m_23') !== '' ? safe_post('uprjpa_ptt_m_23') : null,
        'ptt_m_4' => safe_post('uprjpa_ptt_m_4') !== '' ? safe_post('uprjpa_ptt_m_4') : null,

        // Pagar pengaman tempat tidur dinaikan
        'ppt_p_ho' => safe_post('uprjpa_ppt_p_ho') !== '' ? safe_post('uprjpa_ppt_p_ho') : null,
        'ppt_p_10' => safe_post('uprjpa_ppt_p_10') !== '' ? safe_post('uprjpa_ppt_p_10') : null,
        'ppt_s_ho' => safe_post('uprjpa_ppt_s_ho') !== '' ? safe_post('uprjpa_ppt_s_ho') : null,
        'ppt_s_18' => safe_post('uprjpa_ppt_s_18') !== '' ? safe_post('uprjpa_ppt_s_18') : null,
        'ppt_m_ho' => safe_post('uprjpa_ppt_m_ho') !== '' ? safe_post('uprjpa_ppt_m_ho') : null,
        'ppt_m_23' => safe_post('uprjpa_ppt_m_23') !== '' ? safe_post('uprjpa_ppt_m_23') : null,
        'ppt_m_4' => safe_post('uprjpa_ppt_m_4') !== '' ? safe_post('uprjpa_ppt_m_4') : null,

        // Penerang cukup
        'penerangan_p_ho' => safe_post('uprjpa_penerangan_p_ho') !== '' ? safe_post('uprjpa_penerangan_p_ho') : null,
        'penerangan_p_10' => safe_post('uprjpa_penerangan_p_10') !== '' ? safe_post('uprjpa_penerangan_p_10') : null,
        'penerangan_s_ho' => safe_post('uprjpa_penerangan_s_ho') !== '' ? safe_post('uprjpa_penerangan_s_ho') : null,
        'penerangan_s_18' => safe_post('uprjpa_penerangan_s_18') !== '' ? safe_post('uprjpa_penerangan_s_18') : null,
        'penerangan_m_ho' => safe_post('uprjpa_penerangan_m_ho') !== '' ? safe_post('uprjpa_penerangan_m_ho') : null,
        'penerangan_m_23' => safe_post('uprjpa_penerangan_m_23') !== '' ? safe_post('uprjpa_penerangan_m_23') : null,
        'penerangan_m_4' => safe_post('uprjpa_penerangan_m_4') !== '' ? safe_post('uprjpa_penerangan_m_4') : null,

        // Pastikan alas kaki yang tidak licin untuk pasien yang dapat berjalan
        'alas_p_ho' => safe_post('uprjpa_alas_p_ho') !== '' ? safe_post('uprjpa_alas_p_ho') : null,
        'alas_p_10' => safe_post('uprjpa_alas_p_10') !== '' ? safe_post('uprjpa_alas_p_10') : null,
        'alas_s_ho' => safe_post('uprjpa_alas_s_ho') !== '' ? safe_post('uprjpa_alas_s_ho') : null,
        'alas_s_18' => safe_post('uprjpa_alas_s_18') !== '' ? safe_post('uprjpa_alas_s_18') : null,
        'alas_m_ho' => safe_post('uprjpa_alas_m_ho') !== '' ? safe_post('uprjpa_alas_m_ho') : null,
        'alas_m_23' => safe_post('uprjpa_alas_m_23') !== '' ? safe_post('uprjpa_alas_m_23') : null,
        'alas_m_4' => safe_post('uprjpa_alas_m_4') !== '' ? safe_post('uprjpa_alas_m_4') : null,

        // Lantai kering dan tidak licin
        'lantai_p_ho' => safe_post('uprjpa_lantai_p_ho') !== '' ? safe_post('uprjpa_lantai_p_ho') : null,
        'lantai_p_10' => safe_post('uprjpa_lantai_p_10') !== '' ? safe_post('uprjpa_lantai_p_10') : null,
        'lantai_s_ho' => safe_post('uprjpa_lantai_s_ho') !== '' ? safe_post('uprjpa_lantai_s_ho') : null,
        'lantai_s_18' => safe_post('uprjpa_lantai_s_18') !== '' ? safe_post('uprjpa_lantai_s_18') : null,
        'lantai_m_ho' => safe_post('uprjpa_lantai_m_ho') !== '' ? safe_post('uprjpa_lantai_m_ho') : null,
        'lantai_m_23' => safe_post('uprjpa_lantai_m_23') !== '' ? safe_post('uprjpa_lantai_m_23') : null,
        'lantai_m_4' => safe_post('uprjpa_lantai_m_4') !== '' ? safe_post('uprjpa_lantai_m_4') : null,

        // Dekatkan alat-alat pasien
        'alat_p_ho' => safe_post('uprjpa_alat_p_ho') !== '' ? safe_post('uprjpa_alat_p_ho') : null,
        'alat_p_10' => safe_post('uprjpa_alat_p_10') !== '' ? safe_post('uprjpa_alat_p_10') : null,
        'alat_s_ho' => safe_post('uprjpa_alat_s_ho') !== '' ? safe_post('uprjpa_alat_s_ho') : null,
        'alat_s_18' => safe_post('uprjpa_alat_s_18') !== '' ? safe_post('uprjpa_alat_s_18') : null,
        'alat_m_ho' => safe_post('uprjpa_alat_m_ho') !== '' ? safe_post('uprjpa_alat_m_ho') : null,
        'alat_m_23' => safe_post('uprjpa_alat_m_23') !== '' ? safe_post('uprjpa_alat_m_23') : null,
        'alat_m_4' => safe_post('uprjpa_alat_m_4') !== '' ? safe_post('uprjpa_alat_m_4') : null,

        // Edukasi pasien tentang efek samping obat yang diberikan
        'edukasi_p_ho' => safe_post('uprjpa_edukasi_p_ho') !== '' ? safe_post('uprjpa_edukasi_p_ho') : null,
        'edukasi_p_10' => safe_post('uprjpa_edukasi_p_10') !== '' ? safe_post('uprjpa_edukasi_p_10') : null,
        'edukasi_s_ho' => safe_post('uprjpa_edukasi_s_ho') !== '' ? safe_post('uprjpa_edukasi_s_ho') : null,
        'edukasi_s_18' => safe_post('uprjpa_edukasi_s_18') !== '' ? safe_post('uprjpa_edukasi_s_18') : null,
        'edukasi_m_ho' => safe_post('uprjpa_edukasi_m_ho') !== '' ? safe_post('uprjpa_edukasi_m_ho') : null,
        'edukasi_m_23' => safe_post('uprjpa_edukasi_m_23') !== '' ? safe_post('uprjpa_edukasi_m_23') : null,
        'edukasi_m_4' => safe_post('uprjpa_edukasi_m_4') !== '' ? safe_post('uprjpa_edukasi_m_4') : null,

        // Tidak meninggalkan pasien di kamar mandi saat menggunakan commode
        'commode_p_ho' => safe_post('uprjpa_commode_p_ho') !== '' ? safe_post('uprjpa_commode_p_ho') : null,
        'commode_p_10' => safe_post('uprjpa_commode_p_10') !== '' ? safe_post('uprjpa_commode_p_10') : null,
        'commode_s_ho' => safe_post('uprjpa_commode_s_ho') !== '' ? safe_post('uprjpa_commode_s_ho') : null,
        'commode_s_18' => safe_post('uprjpa_commode_s_18') !== '' ? safe_post('uprjpa_commode_s_18') : null,
        'commode_m_ho' => safe_post('uprjpa_commode_m_ho') !== '' ? safe_post('uprjpa_commode_m_ho') : null,
        'commode_m_23' => safe_post('uprjpa_commode_m_23') !== '' ? safe_post('uprjpa_commode_m_23') : null,
        'commode_m_4' => safe_post('uprjpa_commode_m_4') !== '' ? safe_post('uprjpa_commode_m_4') : null,

        // Pasang gelang khusus
        'gelang_p_ho' => safe_post('uprjpa_gelang_p_ho') !== '' ? safe_post('uprjpa_gelang_p_ho') : null,
        'gelang_p_10' => safe_post('uprjpa_gelang_p_10') !== '' ? safe_post('uprjpa_gelang_p_10') : null,
        'gelang_s_ho' => safe_post('uprjpa_gelang_s_ho') !== '' ? safe_post('uprjpa_gelang_s_ho') : null,
        'gelang_s_18' => safe_post('uprjpa_gelang_s_18') !== '' ? safe_post('uprjpa_gelang_s_18') : null,
        'gelang_m_ho' => safe_post('uprjpa_gelang_m_ho') !== '' ? safe_post('uprjpa_gelang_m_ho') : null,
        'gelang_m_23' => safe_post('uprjpa_gelang_m_23') !== '' ? safe_post('uprjpa_gelang_m_23') : null,
        'gelang_m_4' => safe_post('uprjpa_gelang_m_4') !== '' ? safe_post('uprjpa_gelang_m_4') : null,

        // Tempatkan pasien di kamar yang paling dekat dengan Nurse Station
        'station_p_ho' => safe_post('uprjpa_station_p_ho') !== '' ? safe_post('uprjpa_station_p_ho') : null,
        'station_p_10' => safe_post('uprjpa_station_p_10') !== '' ? safe_post('uprjpa_station_p_10') : null,
        'station_s_ho' => safe_post('uprjpa_station_s_ho') !== '' ? safe_post('uprjpa_station_s_ho') : null,
        'station_s_18' => safe_post('uprjpa_station_s_18') !== '' ? safe_post('uprjpa_station_s_18') : null,
        'station_m_ho' => safe_post('uprjpa_station_m_ho') !== '' ? safe_post('uprjpa_station_m_ho') : null,
        'station_m_23' => safe_post('uprjpa_station_m_23') !== '' ? safe_post('uprjpa_station_m_23') : null,
        'station_m_4' => safe_post('uprjpa_station_m_4') !== '' ? safe_post('uprjpa_station_m_4') : null,

        // Paraf
        'paraf_p_ho' => safe_post('uprjpa_paraf_p_ho') !== '' ? safe_post('uprjpa_paraf_p_ho') : null,
        'paraf_p_10' => safe_post('uprjpa_paraf_p_10') !== '' ? safe_post('uprjpa_paraf_p_10') : null,
        'paraf_s_ho' => safe_post('uprjpa_paraf_s_ho') !== '' ? safe_post('uprjpa_paraf_s_ho') : null,
        'paraf_s_18' => safe_post('uprjpa_paraf_s_18') !== '' ? safe_post('uprjpa_paraf_s_18') : null,
        'paraf_m_ho' => safe_post('uprjpa_paraf_m_ho') !== '' ? safe_post('uprjpa_paraf_m_ho') : null,
        'paraf_m_23' => safe_post('uprjpa_paraf_m_23') !== '' ? safe_post('uprjpa_paraf_m_23') : null,
        'paraf_m_4' => safe_post('uprjpa_paraf_m_4') !== '' ? safe_post('uprjpa_paraf_m_4') : null,

        'date_created' => safe_post('pencegahan_date_anak') !== '' ? safe_post('pencegahan_date_anak') : null,
      );

      $this->m_pelayanan->insertUpayaPencegahanAnak($uprjpa_data);
    }

    $purjl_tanggal_pengkajian = safe_post('purjpl_tanggal_pengkajian');
    $id_pendaftaran = safe_post('id_pendaftaran');

    if (!empty($purjl_tanggal_pengkajian)) {
      $pengkajian_date_lansia = safe_post('pengkajian_date_lansia') ?? null;

      $pengkajian_ulang = array(
        'id_pendaftaran' => $id_pendaftaran,
        'id_layanan_pendaftaran' => $layanan['id'],
        'id_perawat' => safe_post('purjpl_perawat') !== '' ? safe_post('purjpl_perawat') : null,
        'id_user' => safe_post('user_pengkajian') !== '' ? safe_post('user_pengkajian') : null,
        'tanggal_pengkajian' => safe_post('purjpl_tanggal_pengkajian'),
        'jumlah_skor' => safe_post('jumlah_skor') !== '' ? safe_post('jumlah_skor') : null,
        'paraf' => safe_post('purjpl_paraf') !== '' ? safe_post('purjpl_paraf') : null,
        'pasien_datang_karena_jatuh' => safe_post('purjpl_pasien_datang_karena_jatuh') !== '' ? safe_post('purjpl_pasien_datang_karena_jatuh') : null,
        'jatuh_dua_bulan_terakhir' => safe_post('purjpl_jatuh_2_bulan_terakhir') !== '' ? safe_post('purjpl_jatuh_2_bulan_terakhir') : null,
        'delirium' => safe_post('purjpl_pasien_delirium') !== '' ? safe_post('purjpl_pasien_delirium') : null,
        'disorientasi' => safe_post('purjpl_pasien_disorientasi') !== '' ? safe_post('purjpl_pasien_disorientasi') : null,
        'agitasi' => safe_post('purjpl_pasien_agitasi') !== '' ? safe_post('purjpl_pasien_agitasi') : null,
        'kacamata' => safe_post('purjpl_pasien_kacamata') !== '' ? safe_post('purjpl_pasien_kacamata') : null,
        'buram' => safe_post('purjpl_pasien_buram') !== '' ? safe_post('purjpl_pasien_buram') : null,
        'galukoma' => safe_post('purjpl_pasien_galukoma') !== '' ? safe_post('purjpl_pasien_galukoma') : null,
        'berkemih' => safe_post('purjpl_berkemih') !== '' ? safe_post('purjpl_berkemih') : null,
        'mandiri' => safe_post('purjpl_pasien_mandiri') !== '' ? safe_post('purjpl_pasien_mandiri') : null,
        'sedikit_bantuan' => safe_post('purjpl_pasien_sedikit_bantuan') !== '' ? safe_post('purjpl_pasien_sedikit_bantuan') : null,
        'bantuan_nyata' => safe_post('purjpl_pasien_bantuan_nyata') !== '' ? safe_post('purjpl_pasien_bantuan_nyata') : null,
        'bantuan_total' => safe_post('purjpl_pasien_bantuan_total') !== '' ? safe_post('purjpl_pasien_bantuan_total') : null,
        'm_mandiri' => safe_post('purjpl_pasien_m_mandiri') !== '' ? safe_post('purjpl_pasien_m_mandiri') : null,
        'm_sedikit_bantuan' => safe_post('purjpl_pasien_m_sedikit_bantuan') !== '' ? safe_post('purjpl_pasien_m_sedikit_bantuan') : null,
        'kursi_roda' => safe_post('purjpl_pasien_kursi_roda') !== '' ? safe_post('purjpl_pasien_kursi_roda') : null,
        'imobilisasi' => safe_post('purjpl_pasien_imobilisasi') !== '' ? safe_post('purjpl_pasien_imobilisasi') : null,
        'date_created' => $pengkajian_date_lansia,
      );

      $this->m_pelayanan->insertPengkajianUlangLansia($pengkajian_ulang);
    }

    $uprjpl_tanggal_pengkajian = safe_post('uprjpl_tanggal_pengkajian');
    $id_pendaftaran = safe_post('id_pendaftaran');

    if (!empty($uprjpl_tanggal_pengkajian)) {
      $pengkajian_ulang = array(
        'id_pendaftaran' => $id_pendaftaran,
        'id_layanan_pendaftaran' => $layanan['id'],
        'id_perawat_p' => safe_post('uprjpl_perawat_p') !== '' ? safe_post('uprjpl_perawat_p') : null,
        'id_perawat_s' => safe_post('uprjpl_perawat_s') !== '' ? safe_post('uprjpl_perawat_s') : null,
        'id_perawat_m' => safe_post('uprjpl_perawat_m') !== '' ? safe_post('uprjpl_perawat_m') : null,
        'id_user' => safe_post('user_pengkajian') !== '' ? safe_post('user_pengkajian') : null,
        'tanggal_pengkajian' => safe_post('uprjpl_tanggal_pengkajian'),

        // Bel berfungsi dan mudah dijangkau
        'bel_p_ho' => safe_post('uprjpl_bel_p_ho') !== '' ? safe_post('uprjpl_bel_p_ho') : null,
        'bel_p_10' => safe_post('uprjpl_bel_p_10') !== '' ? safe_post('uprjpl_bel_p_10') : null,
        'bel_s_ho' => safe_post('uprjpl_bel_s_ho') !== '' ? safe_post('uprjpl_bel_s_ho') : null,
        'bel_s_18' => safe_post('uprjpl_bel_s_18') !== '' ? safe_post('uprjpl_bel_s_18') : null,
        'bel_m_ho' => safe_post('uprjpl_bel_m_ho') !== '' ? safe_post('uprjpl_bel_m_ho') : null,
        'bel_m_23' => safe_post('uprjpl_bel_m_23') !== '' ? safe_post('uprjpl_bel_m_23') : null,
        'bel_m_4' => safe_post('uprjpl_bel_m_4') !== '' ? safe_post('uprjpl_bel_m_4') : null,

        // Roda tempat tidur terkunci
        'roda_p_ho' => safe_post('uprjpl_roda_p_ho') !== '' ? safe_post('uprjpl_roda_p_ho') : null,
        'roda_p_10' => safe_post('uprjpl_roda_p_10') !== '' ? safe_post('uprjpl_roda_p_10') : null,
        'roda_s_ho' => safe_post('uprjpl_roda_s_ho') !== '' ? safe_post('uprjpl_roda_s_ho') : null,
        'roda_s_18' => safe_post('uprjpl_roda_s_18') !== '' ? safe_post('uprjpl_roda_s_18') : null,
        'roda_m_ho' => safe_post('uprjpl_roda_m_ho') !== '' ? safe_post('uprjpl_roda_m_ho') : null,
        'roda_m_23' => safe_post('uprjpl_roda_m_23') !== '' ? safe_post('uprjpl_roda_m_23') : null,
        'roda_m_4' => safe_post('uprjpl_roda_m_4') !== '' ? safe_post('uprjpl_roda_m_4') : null,

        // Posisikan tempat tidur pada posisi terendah
        'ptt_p_ho' => safe_post('uprjpl_ptt_p_ho') !== '' ? safe_post('uprjpl_ptt_p_ho') : null,
        'ptt_p_10' => safe_post('uprjpl_ptt_p_10') !== '' ? safe_post('uprjpl_ptt_p_10') : null,
        'ptt_s_ho' => safe_post('uprjpl_ptt_s_ho') !== '' ? safe_post('uprjpl_ptt_s_ho') : null,
        'ptt_s_18' => safe_post('uprjpl_ptt_s_18') !== '' ? safe_post('uprjpl_ptt_s_18') : null,
        'ptt_m_ho' => safe_post('uprjpl_ptt_m_ho') !== '' ? safe_post('uprjpl_ptt_m_ho') : null,
        'ptt_m_23' => safe_post('uprjpl_ptt_m_23') !== '' ? safe_post('uprjpl_ptt_m_23') : null,
        'ptt_m_4' => safe_post('uprjpl_ptt_m_4') !== '' ? safe_post('uprjpl_ptt_m_4') : null,

        // Pagar pengaman tempat tidur dinaikan
        'ppt_p_ho' => safe_post('uprjpl_ppt_p_ho') !== '' ? safe_post('uprjpl_ppt_p_ho') : null,
        'ppt_p_10' => safe_post('uprjpl_ppt_p_10') !== '' ? safe_post('uprjpl_ppt_p_10') : null,
        'ppt_s_ho' => safe_post('uprjpl_ppt_s_ho') !== '' ? safe_post('uprjpl_ppt_s_ho') : null,
        'ppt_s_18' => safe_post('uprjpl_ppt_s_18') !== '' ? safe_post('uprjpl_ppt_s_18') : null,
        'ppt_m_ho' => safe_post('uprjpl_ppt_m_ho') !== '' ? safe_post('uprjpl_ppt_m_ho') : null,
        'ppt_m_23' => safe_post('uprjpl_ppt_m_23') !== '' ? safe_post('uprjpl_ppt_m_23') : null,
        'ppt_m_4' => safe_post('uprjpl_ppt_m_4') !== '' ? safe_post('uprjpl_ppt_m_4') : null,

        // Penerang cukup
        'penerangan_p_ho' => safe_post('uprjpl_penerangan_p_ho') !== '' ? safe_post('uprjpl_penerangan_p_ho') : null,
        'penerangan_p_10' => safe_post('uprjpl_penerangan_p_10') !== '' ? safe_post('uprjpl_penerangan_p_10') : null,
        'penerangan_s_ho' => safe_post('uprjpl_penerangan_s_ho') !== '' ? safe_post('uprjpl_penerangan_s_ho') : null,
        'penerangan_s_18' => safe_post('uprjpl_penerangan_s_18') !== '' ? safe_post('uprjpl_penerangan_s_18') : null,
        'penerangan_m_ho' => safe_post('uprjpl_penerangan_m_ho') !== '' ? safe_post('uprjpl_penerangan_m_ho') : null,
        'penerangan_m_23' => safe_post('uprjpl_penerangan_m_23') !== '' ? safe_post('uprjpl_penerangan_m_23') : null,
        'penerangan_m_4' => safe_post('uprjpl_penerangan_m_4') !== '' ? safe_post('uprjpl_penerangan_m_4') : null,

        // Pastikan alas kaki yang tidak licin untuk pasien yang dapat berjalan
        'alas_p_ho' => safe_post('uprjpl_alas_p_ho') !== '' ? safe_post('uprjpl_alas_p_ho') : null,
        'alas_p_10' => safe_post('uprjpl_alas_p_10') !== '' ? safe_post('uprjpl_alas_p_10') : null,
        'alas_s_ho' => safe_post('uprjpl_alas_s_ho') !== '' ? safe_post('uprjpl_alas_s_ho') : null,
        'alas_s_18' => safe_post('uprjpl_alas_s_18') !== '' ? safe_post('uprjpl_alas_s_18') : null,
        'alas_m_ho' => safe_post('uprjpl_alas_m_ho') !== '' ? safe_post('uprjpl_alas_m_ho') : null,
        'alas_m_23' => safe_post('uprjpl_alas_m_23') !== '' ? safe_post('uprjpl_alas_m_23') : null,
        'alas_m_4' => safe_post('uprjpl_alas_m_4') !== '' ? safe_post('uprjpl_alas_m_4') : null,

        // Lantai kering dan tidak licin
        'lantai_p_ho' => safe_post('uprjpl_lantai_p_ho') !== '' ? safe_post('uprjpl_lantai_p_ho') : null,
        'lantai_p_10' => safe_post('uprjpl_lantai_p_10') !== '' ? safe_post('uprjpl_lantai_p_10') : null,
        'lantai_s_ho' => safe_post('uprjpl_lantai_s_ho') !== '' ? safe_post('uprjpl_lantai_s_ho') : null,
        'lantai_s_18' => safe_post('uprjpl_lantai_s_18') !== '' ? safe_post('uprjpl_lantai_s_18') : null,
        'lantai_m_ho' => safe_post('uprjpl_lantai_m_ho') !== '' ? safe_post('uprjpl_lantai_m_ho') : null,
        'lantai_m_23' => safe_post('uprjpl_lantai_m_23') !== '' ? safe_post('uprjpl_lantai_m_23') : null,
        'lantai_m_4' => safe_post('uprjpl_lantai_m_4') !== '' ? safe_post('uprjpl_lantai_m_4') : null,

        // Dekatkan alat-alat pasien
        'alat_p_ho' => safe_post('uprjpl_alat_p_ho') !== '' ? safe_post('uprjpl_alat_p_ho') : null,
        'alat_p_10' => safe_post('uprjpl_alat_p_10') !== '' ? safe_post('uprjpl_alat_p_10') : null,
        'alat_s_ho' => safe_post('uprjpl_alat_s_ho') !== '' ? safe_post('uprjpl_alat_s_ho') : null,
        'alat_s_18' => safe_post('uprjpl_alat_s_18') !== '' ? safe_post('uprjpl_alat_s_18') : null,
        'alat_m_ho' => safe_post('uprjpl_alat_m_ho') !== '' ? safe_post('uprjpl_alat_m_ho') : null,
        'alat_m_23' => safe_post('uprjpl_alat_m_23') !== '' ? safe_post('uprjpl_alat_m_23') : null,
        'alat_m_4' => safe_post('uprjpl_alat_m_4') !== '' ? safe_post('uprjpl_alat_m_4') : null,

        // Edukasi pasien tentang efek samping obat yang diberikan
        'edukasi_p_ho' => safe_post('uprjpl_edukasi_p_ho') !== '' ? safe_post('uprjpl_edukasi_p_ho') : null,
        'edukasi_p_10' => safe_post('uprjpl_edukasi_p_10') !== '' ? safe_post('uprjpl_edukasi_p_10') : null,
        'edukasi_s_ho' => safe_post('uprjpl_edukasi_s_ho') !== '' ? safe_post('uprjpl_edukasi_s_ho') : null,
        'edukasi_s_18' => safe_post('uprjpl_edukasi_s_18') !== '' ? safe_post('uprjpl_edukasi_s_18') : null,
        'edukasi_m_ho' => safe_post('uprjpl_edukasi_m_ho') !== '' ? safe_post('uprjpl_edukasi_m_ho') : null,
        'edukasi_m_23' => safe_post('uprjpl_edukasi_m_23') !== '' ? safe_post('uprjpl_edukasi_m_23') : null,
        'edukasi_m_4' => safe_post('uprjpl_edukasi_m_4') !== '' ? safe_post('uprjpl_edukasi_m_4') : null,

        // Tidak meninggalkan pasien di kamar mandi saat menggunakan commode
        'commode_p_ho' => safe_post('uprjpl_commode_p_ho') !== '' ? safe_post('uprjpl_commode_p_ho') : null,
        'commode_p_10' => safe_post('uprjpl_commode_p_10') !== '' ? safe_post('uprjpl_commode_p_10') : null,
        'commode_s_ho' => safe_post('uprjpl_commode_s_ho') !== '' ? safe_post('uprjpl_commode_s_ho') : null,
        'commode_s_18' => safe_post('uprjpl_commode_s_18') !== '' ? safe_post('uprjpl_commode_s_18') : null,
        'commode_m_ho' => safe_post('uprjpl_commode_m_ho') !== '' ? safe_post('uprjpl_commode_m_ho') : null,
        'commode_m_23' => safe_post('uprjpl_commode_m_23') !== '' ? safe_post('uprjpl_commode_m_23') : null,
        'commode_m_4' => safe_post('uprjpl_commode_m_4') !== '' ? safe_post('uprjpl_commode_m_4') : null,

        // Pasang gelang khusus
        'gelang_p_ho' => safe_post('uprjpl_gelang_p_ho') !== '' ? safe_post('uprjpl_gelang_p_ho') : null,
        'gelang_p_10' => safe_post('uprjpl_gelang_p_10') !== '' ? safe_post('uprjpl_gelang_p_10') : null,
        'gelang_s_ho' => safe_post('uprjpl_gelang_s_ho') !== '' ? safe_post('uprjpl_gelang_s_ho') : null,
        'gelang_s_18' => safe_post('uprjpl_gelang_s_18') !== '' ? safe_post('uprjpl_gelang_s_18') : null,
        'gelang_m_ho' => safe_post('uprjpl_gelang_m_ho') !== '' ? safe_post('uprjpl_gelang_m_ho') : null,
        'gelang_m_23' => safe_post('uprjpl_gelang_m_23') !== '' ? safe_post('uprjpl_gelang_m_23') : null,
        'gelang_m_4' => safe_post('uprjpl_gelang_m_4') !== '' ? safe_post('uprjpl_gelang_m_4') : null,

        // Tempatkan pasien di kamar yang paling dekat dengan Nurse Station
        'station_p_ho' => safe_post('uprjpl_station_p_ho') !== '' ? safe_post('uprjpl_station_p_ho') : null,
        'station_p_10' => safe_post('uprjpl_station_p_10') !== '' ? safe_post('uprjpl_station_p_10') : null,
        'station_s_ho' => safe_post('uprjpl_station_s_ho') !== '' ? safe_post('uprjpl_station_s_ho') : null,
        'station_s_18' => safe_post('uprjpl_station_s_18') !== '' ? safe_post('uprjpl_station_s_18') : null,
        'station_m_ho' => safe_post('uprjpl_station_m_ho') !== '' ? safe_post('uprjpl_station_m_ho') : null,
        'station_m_23' => safe_post('uprjpl_station_m_23') !== '' ? safe_post('uprjpl_station_m_23') : null,
        'station_m_4' => safe_post('uprjpl_station_m_4') !== '' ? safe_post('uprjpl_station_m_4') : null,

        // Paraf
        'paraf_p_ho' => safe_post('uprjpl_paraf_p_ho') !== '' ? safe_post('uprjpl_paraf_p_ho') : null,
        'paraf_p_10' => safe_post('uprjpl_paraf_p_10') !== '' ? safe_post('uprjpl_paraf_p_10') : null,
        'paraf_s_ho' => safe_post('uprjpl_paraf_s_ho') !== '' ? safe_post('uprjpl_paraf_s_ho') : null,
        'paraf_s_18' => safe_post('uprjpl_paraf_s_18') !== '' ? safe_post('uprjpl_paraf_s_18') : null,
        'paraf_m_ho' => safe_post('uprjpl_paraf_m_ho') !== '' ? safe_post('uprjpl_paraf_m_ho') : null,
        'paraf_m_23' => safe_post('uprjpl_paraf_m_23') !== '' ? safe_post('uprjpl_paraf_m_23') : null,
        'paraf_m_4' => safe_post('uprjpl_paraf_m_4') !== '' ? safe_post('uprjpl_paraf_m_4') : null,

        'date_created' => safe_post('pencegahan_date_lansia') !== '' ? safe_post('pencegahan_date_lansia') : null,
      );

      $this->m_pelayanan->insertUpayaPencegahanLansia($pengkajian_ulang);
    }

    // UPRJPN
    $uprjpn_tanggal_pengkajian = safe_post('uprjpn_tanggal_pengkajian');
    $id_pendaftaran = safe_post('id_pendaftaran');

    if (!empty($uprjpn_tanggal_pengkajian)) {
      $upaya_pencegahan_resiko_jatuh_neonatus = array(
        'id_pendaftaran' => $id_pendaftaran,
        'id_layanan_pendaftaran' => $layanan['id'],
        'id_perawat_1' => safe_post('perawat_1') !== '' ? safe_post('perawat_1') : null,
        'id_perawat_2' => safe_post('perawat_2') !== '' ? safe_post('perawat_2') : null,
        'id_perawat_3' => safe_post('perawat_3') !== '' ? safe_post('perawat_3') : null,
        'id_user' => safe_post('user_pengkajian') !== '' ? safe_post('user_pengkajian') : null,
        'tanggal_pengkajian' => safe_post('uprjpn_tanggal_pengkajian'),

        // Posisi tanda Risiko jatuh tetap ada/terpasang
        'terpasang_p_ho' => safe_post('terpasang_p_ho') !== '' ? safe_post('terpasang_p_ho') : null,
        'terpasang_p_10' => safe_post('terpasang_p_10') !== '' ? safe_post('terpasang_p_10') : null,
        'terpasang_s_ho' => safe_post('terpasang_s_ho') !== '' ? safe_post('terpasang_s_ho') : null,
        'terpasang_s_18' => safe_post('terpasang_s_18') !== '' ? safe_post('terpasang_s_18') : null,
        'terpasang_m_ho' => safe_post('terpasang_m_ho') !== '' ? safe_post('terpasang_m_ho') : null,
        'terpasang_m_23' => safe_post('terpasang_m_23') !== '' ? safe_post('terpasang_m_23') : null,
        'terpasang_m_4' => safe_post('terpasang_m_4') !== '' ? safe_post('terpasang_m_4') : null,

        // Pastikan roda box/incubator pada posisi terkunci
        'terkunci_p_ho' => safe_post('terkunci_p_ho') !== '' ? safe_post('terkunci_p_ho') : null,
        'terkunci_p_10' => safe_post('terkunci_p_10') !== '' ? safe_post('terkunci_p_10') : null,
        'terkunci_s_ho' => safe_post('terkunci_s_ho') !== '' ? safe_post('terkunci_s_ho') : null,
        'terkunci_s_18' => safe_post('terkunci_s_18') !== '' ? safe_post('terkunci_s_18') : null,
        'terkunci_m_ho' => safe_post('terkunci_m_ho') !== '' ? safe_post('terkunci_m_ho') : null,
        'terkunci_m_23' => safe_post('terkunci_m_23') !== '' ? safe_post('terkunci_m_23') : null,
        'terkunci_m_4' => safe_post('terkunci_m_4') !== '' ? safe_post('terkunci_m_4') : null,

        // Pastikan pintu inkubator tertutup bila tidak ada tindakan
        'tindakan_p_ho' => safe_post('tindakan_p_ho') !== '' ? safe_post('tindakan_p_ho') : null,
        'tindakan_p_10' => safe_post('tindakan_p_10') !== '' ? safe_post('tindakan_p_10') : null,
        'tindakan_s_ho' => safe_post('tindakan_s_ho') !== '' ? safe_post('tindakan_s_ho') : null,
        'tindakan_s_18' => safe_post('tindakan_s_18') !== '' ? safe_post('tindakan_s_18') : null,
        'tindakan_m_ho' => safe_post('tindakan_m_ho') !== '' ? safe_post('tindakan_m_ho') : null,
        'tindakan_m_23' => safe_post('tindakan_m_23') !== '' ? safe_post('tindakan_m_23') : null,
        'tindakan_m_4' => safe_post('tindakan_m_4') !== '' ? safe_post('tindakan_m_4') : null,

        // Paraf
        'paraff_p_ho' => safe_post('paraff_p_ho') !== '' ? safe_post('paraff_p_ho') : null,
        'paraff_p_10' => safe_post('paraff_p_10') !== '' ? safe_post('paraff_p_10') : null,
        'paraff_s_ho' => safe_post('paraff_s_ho') !== '' ? safe_post('paraff_s_ho') : null,
        'paraff_s_18' => safe_post('paraff_s_18') !== '' ? safe_post('paraff_s_18') : null,
        'paraff_m_ho' => safe_post('paraff_m_ho') !== '' ? safe_post('paraff_m_ho') : null,
        'paraff_m_23' => safe_post('paraff_m_23') !== '' ? safe_post('paraff_m_23') : null,
        'paraff_m_4' => safe_post('paraff_m_4') !== '' ? safe_post('paraff_m_4') : null,

        'date_created' => safe_post('pencegahan_date_neonatus') !== '' ? safe_post('pencegahan_date_neonatus') : null,
      );
      $this->m_pelayanan->insertUpayaPencegahanResikoJatuhPadaNeonatus($upaya_pencegahan_resiko_jatuh_neonatus);
    }


    $tindakan_petugas = safe_post('tindakan_petugas');

    if ($tindakan_petugas) {

      $tanggal_kajian = safe_post('tanggal_kajian');

      $pundpn_tanggal_kajian = is_string($tanggal_kajian);

      if ($tanggal_kajian === "" || $tanggal_kajian === null) {

        $date_kajian = null;
      } else if (!is_array($tanggal_kajian)) {

        $date_kajian = null;
      } else if (empty($tanggal_kajian)) {

        $date_kajian = null;
      } else if ($pundpn_tanggal_kajian === true) {

        $date_kajian = null;
      } else {

        foreach ($tanggal_kajian as $key => $value) {

          $date = new DateTime($value);
          $new = $date->format('Y-m-d H:i:s');

          $date_kajian[$key] = $new;
        }
      }

      $tanggal_kajian_dibuat = safe_post('tanggal_kajian_dibuat');

      $pundpn_tanggal_kajian_dibuat = is_string($tanggal_kajian_dibuat);

      if ($tanggal_kajian_dibuat === "" || $tanggal_kajian_dibuat === null) {

        $date_kajian_dibuat = null;
      } else if (!is_array($tanggal_kajian_dibuat)) {

        $date_kajian_dibuat = null;
      } else if (empty($tanggal_kajian_dibuat)) {

        $date_kajian_dibuat = null;
      } else if ($pundpn_tanggal_kajian_dibuat === true) {

        $date_kajian_dibuat = null;
      } else {

        foreach ($tanggal_kajian_dibuat as $key => $value) {

          $date = new DateTime($value);
          $new = $date->format('Y-m-d H:i:s');

          $date_kajian_dibuat[$key] = $new;
        }
      }

      $pengkajian_ulang = array(
        'id_layanan_pendaftaran' => $layanan['id'],
        'tanggal_pemantauan' => $date_kajian,
        'skor_nyeri' => safe_post('skor_nyeri') !== '' ? safe_post('skor_nyeri') : NULL,
        'tindakan_petugas' => safe_post('tindakan_petugas') !== '' ? safe_post('tindakan_petugas') : NULL,
        'id_users' => safe_post('petugas_kajian') !== '' ? safe_post('petugas_kajian') : NULL,
        'created_date' => $date_kajian_dibuat,
      );

      $this->m_pelayanan->updatePemantauanUlang($pengkajian_ulang);
    } else {

      $tanggal_kaji = safe_post('tanggal_kaji');

      if (!empty($tanggal_kaji)) {

        $respon = ['show' => '4', 'status' => false, 'message' => 'Pengkajian dan Pemantauan Nyeri Belum ditambahkan', 'id' => '#data-pengkajian-pemantauan-nyeri'];
      }
    }

    //Bukti Visit Dokter DPJP
    $dokter_visit = safe_post('dokter_visit');

    if (!empty($dokter_visit)) {

      $tanggal_visit = safe_post('tanggal_visit');
      $tanggal_waktu_visit = is_string($tanggal_visit);

      if ($tanggal_visit === "" || $tanggal_visit === null) {

        $date_visit = null;
      } else if (!is_array($tanggal_visit)) {

        $date_visit = null;
      } else if (empty($tanggal_visit)) {

        $date_visit = null;
      } else if ($tanggal_waktu_visit === true) {

        $date_visit = null;
      } else {

        foreach ($tanggal_visit as $key => $value) {

          $date = new DateTime($value);
          $new = $date->format('Y-m-d H:i:s');

          $date_visit[$key] = $new;
        }
      }

      $tanggal_visit_dibuat = safe_post('tanggal_visit_dibuat');

      $tanggal_waktu_visit = is_string($tanggal_visit_dibuat);

      if ($tanggal_visit_dibuat === "" || $tanggal_visit_dibuat === null) {

        $date_visit_dibuat = null;
      } else if (!is_array($tanggal_visit_dibuat)) {


        $date_visit_dibuat = null;
      } else if (empty($tanggal_visit_dibuat)) {

        $date_visit_dibuat = null;
      } else if ($tanggal_waktu_visit === true) {

        $date_visit_dibuat = null;
      } else {

        foreach ($tanggal_visit_dibuat as $key => $value) {

          $date = new DateTime($value);
          $new = $date->format('Y-m-d H:i:s');

          $date_visit_dibuat[$key] = $new;
        }
      }

      $bukti_visit_dokter = array(
        'id_layanan_pendaftaran' => $layanan['id'],
        'tanggal_waktu_visit' => $date_visit,
        'id_dokter_visit' => safe_post('dokter_visit') !== '' ? safe_post('dokter_visit') : NULL,
        'keterangan_visit' => safe_post('ket_bukti_visit') !== '' ? safe_post('ket_bukti_visit') : NULL,
        'id_users' => safe_post('operator_visit') !== '' ? safe_post('operator_visit') : NULL,
        'created_date' => $date_visit_dibuat,
      );

      $this->m_pelayanan->updateBuktiVisit($bukti_visit_dokter);
    }

    // Catatan Operan Perawat PAGI
    $id_dpjp_utama_pagi = safe_post('dpjp_utama_pagi');

    if (!empty($id_dpjp_utama_pagi)) {

      $tanggal_waktu_pagi = safe_post('tanggal_waktu_pagi');

      $di_tanggal_waktu_pagi = is_string($tanggal_waktu_pagi);

      if ($tanggal_waktu_pagi === "" || $tanggal_waktu_pagi === null) {

        $date_pagi = null;
      } else if (!is_array($tanggal_waktu_pagi)) {

        $date_pagi = null;
      } else if (empty($tanggal_waktu_pagi)) {

        $date_pagi = null;
      } else if ($di_tanggal_waktu_pagi === true) {

        $date_pagi = null;
      } else {

        foreach ($tanggal_waktu_pagi as $key => $value) {

          $date = new DateTime($value);
          $new = $date->format('Y-m-d H:i:s');

          $date_pagi[$key] = $new;
        }
      }


      $catatan_operan_perawat_pagi = array(
        'id_layanan_pendaftaran' => $layanan['id'],
        'operan_diagnosa_keperawatan' => safe_post('operan_diagnosa_keperawatan') !== '' ? safe_post('operan_diagnosa_keperawatan') : NULL,
        'dpjp_utama_pagi' => safe_post('dpjp_utama_pagi') !== '' ? safe_post('dpjp_utama_pagi') : NULL,
        'konsulen_pagi' => safe_post('konsulen_pagi'),
        'tanggal_waktu_pagi' => $date_pagi,
        'diagnosa_keperawatan_pagi' => safe_post('diagnosa_keperawatan_pagi') !== '' ? safe_post('diagnosa_keperawatan_pagi') : NULL,
        'infus_pagi' => safe_post('infus_pagi') !== '' ? safe_post('infus_pagi') : NULL,
        'rencana_tindakan_pagi' => safe_post('rencana_tindakan_pagi') !== '' ? safe_post('rencana_tindakan_pagi') : NULL,
        'perawat_mengover_pagi' => safe_post('perawat_mengover_pagi') !== '' ? safe_post('perawat_mengover_pagi') : NULL,
        'perawat_menerima_pagi' => safe_post('perawat_menerima_pagi') !== '' ? safe_post('perawat_menerima_pagi') : NULL,
        'id_users' => safe_post('user_input_catatan') !== '' ? safe_post('user_input_catatan') : NULL,
      );

      $this->m_pelayanan->updateCatatanPagi($catatan_operan_perawat_pagi);
    }


    //Catatan Operan Perawat Sore
    $id_dokter_dpjp_sore = safe_post('id_dokter_dpjp_sore');

    if (!empty($id_dokter_dpjp_sore)) {

      $tanggal_waktu_sore = safe_post('tanggal_waktu_sore');

      $di_tanggal_waktu_sore = is_string($tanggal_waktu_sore);

      if ($tanggal_waktu_sore === "" || $tanggal_waktu_sore === null) {

        $date_sore = null;
      } else if (!is_array($tanggal_waktu_sore)) {

        $date_sore = null;
      } else if (empty($tanggal_waktu_sore)) {

        $date_sore = null;
      } else if ($di_tanggal_waktu_sore === true) {

        $date_sore = null;
      } else {

        foreach ($tanggal_waktu_sore as $key => $value) {

          $date = new DateTime($value);
          $new = $date->format('Y-m-d H:i:s');

          $date_sore[$key] = $new;
        }
      }

      $catatan_operan_perawat_sore = array(
        'id_layanan_pendaftaran' => $layanan['id'],
        'dokter_dpjp_sore' => safe_post('id_dokter_dpjp_sore') !== '' ? safe_post('id_dokter_dpjp_sore') : NULL,
        'konsulen_sore' => safe_post('konsulen_sore'),
        'tanggal_waktu_sore' => $date_sore,
        'diagnosa_keperawatan_sore' => safe_post('diagnosa_keperawatan_sore') !== '' ? safe_post('diagnosa_keperawatan_sore') : NULL,
        'infus_sore' => safe_post('infus_sore') !== '' ? safe_post('infus_sore') : NULL,
        'rencana_tindakan_sore' => safe_post('rencana_tindakan_sore') !== '' ? safe_post('rencana_tindakan_sore') : NULL,
        'perawat_mengover_sore' => safe_post('perawat_mengover_sore') !== '' ? safe_post('perawat_mengover_sore') : NULL,
        'perawat_menerima_sore' => safe_post('perawat_menerima_sore') !== '' ? safe_post('perawat_menerima_sore') : NULL,
        'id_users' => safe_post('user_input_catatan') !== '' ? safe_post('user_input_catatan') : NULL,
      );

      $this->m_pelayanan->updateCatatanSore($catatan_operan_perawat_sore);
    }

    //Catatan Operan Perawat Malam
    $dokter_dpjp_malam = safe_post('id_dokter_dpjp_malam');

    if (!empty($dokter_dpjp_malam)) {

      $tanggal_waktu_malam = safe_post('tanggal_waktu_malam');

      $di_tanggal_waktu_malam = is_string($tanggal_waktu_malam);

      if ($tanggal_waktu_malam === "" || $tanggal_waktu_malam === null) {

        $date_malam = null;
      } else if (!is_array($tanggal_waktu_malam)) {

        $date_malam = null;
      } else if (empty($tanggal_waktu_malam)) {

        $date_malam = null;
      } else if ($tanggal_waktu_malam === true) {

        $date_malam = null;
      } else {

        foreach ($tanggal_waktu_malam as $key => $value) {

          $date = new DateTime($value);
          $new = $date->format('Y-m-d H:i:s');

          $date_malam[$key] = $new;
        }
      }

      $catatan_operan_perawat_malam = array(
        'id_layanan_pendaftaran' => $layanan['id'],
        'dokter_dpjp_malam' => safe_post('id_dokter_dpjp_malam') !== '' ? safe_post('id_dokter_dpjp_malam') : NULL,
        'konsulen_malam' => safe_post('konsulen_malam'),
        'tanggal_waktu_malam' => $date_malam,
        'diagnosa_keperawatan_malam' => safe_post('diagnosa_keperawatan_malam') !== '' ? safe_post('diagnosa_keperawatan_malam') : NULL,
        'infus_malam' => safe_post('infus_malam') !== '' ? safe_post('infus_malam') : NULL,
        'rencana_tindakan_malam' => safe_post('rencana_tindakan_malam') !== '' ? safe_post('rencana_tindakan_malam') : NULL,
        'perawat_mengover_malam' => safe_post('perawat_mengover_malam') !== '' ? safe_post('perawat_mengover_malam') : NULL,
        'perawat_menerima_malam' => safe_post('perawat_menerima_malam') !== '' ? safe_post('perawat_menerima_malam') : NULL,
        'id_users' => safe_post('user_input_catatan') !== '' ? safe_post('user_input_catatan') : NULL,
      );

      $this->m_pelayanan->updateCatatanMalam($catatan_operan_perawat_malam);
    }


    // Daftar Dokter DPJP
    $diagnosis_dokter = safe_post('diagnosis_dokter');

    if (!empty($diagnosis_dokter)) {

      // tanggal dpjp
      $tanggal_mulai_dpjp = safe_post('tanggal_mulai_dpjp');

      $dpjp_tanggal_mulai = is_string($tanggal_mulai_dpjp);

      if ($tanggal_mulai_dpjp === "" || $tanggal_mulai_dpjp === null) {

        $date_dpjp = null;
      } else if (!is_array($tanggal_mulai_dpjp)) {

        $date_dpjp = null;
      } else if (empty($tanggal_mulai_dpjp)) {

        $date_dpjp = null;
      } else if ($dpjp_tanggal_mulai === true) {

        $date_dpjp = null;
      } else {

        foreach ($tanggal_mulai_dpjp as $key => $value) {

          $var1 = explode("/", $value);
          $var2 = "$var1[2]-$var1[1]-$var1[0]";

          $date = new DateTime($var2);
          $new = $date->format('Y-m-d');

          $date_dpjp[$key] = $new;
        }
      }

      $tanggal_akhir_dpjp = safe_post('tanggal_akhir_dpjp');

      $dpjp_tanggal_akhir = is_string($tanggal_akhir_dpjp);

      if ($tanggal_akhir_dpjp === "" || $tanggal_akhir_dpjp === null) {

        $date_akhir_dpjp = null;
      } else if (!is_array($tanggal_akhir_dpjp)) {

        $date_akhir_dpjp = null;
      } else if (empty($tanggal_akhir_dpjp)) {

        $date_akhir_dpjp = null;
      } else if ($dpjp_tanggal_akhir === true) {

        $date_akhir_dpjp = null;
      } else {

        foreach ($tanggal_akhir_dpjp as $key => $value) {

          $var1 = explode("/", $value);
          $var2 = "$var1[2]-$var1[1]-$var1[0]";

          $date = new DateTime($var2);
          $new = $date->format('Y-m-d');

          $date_akhir_dpjp[$key] = $new;
        }
      }

      //tanggal dpjp utama
      $tanggal_mulai_dpjp_utama = safe_post('tanggal_mulai_dpjp_utama');

      $dpjp_tanggal_mulai_utama = is_string($tanggal_mulai_dpjp_utama);

      if ($tanggal_mulai_dpjp_utama === "" || $tanggal_mulai_dpjp_utama === null) {

        $date_mulai_dpjp_utama = null;
      } else if (!is_array($tanggal_mulai_dpjp_utama)) {

        $date_mulai_dpjp_utama = null;
      } else if (empty($tanggal_mulai_dpjp_utama)) {

        $date_mulai_dpjp_utama = null;
      } else if ($dpjp_tanggal_mulai_utama === true) {

        $date_mulai_dpjp_utama = null;
      } else {

        foreach ($tanggal_mulai_dpjp_utama as $key => $value) {

          $var1 = explode("/", $value);
          $var2 = "$var1[2]-$var1[1]-$var1[0]";

          $date = new DateTime($var2);
          $new = $date->format('Y-m-d');

          $date_mulai_dpjp_utama[$key] = $new;
        }
      }

      $tanggal_akhir_dpjp_utama = safe_post('tanggal_akhir_dpjp_utama');

      $dpjp_tanggal_akhir_utama = is_string($tanggal_akhir_dpjp_utama);

      if ($tanggal_akhir_dpjp_utama === "" || $tanggal_akhir_dpjp_utama === null) {

        $date_akhir_dpjp_utama = null;
      } else if (!is_array($tanggal_akhir_dpjp_utama)) {


        $date_akhir_dpjp_utama = null;
      } else if (empty($tanggal_akhir_dpjp_utama)) {

        $date_akhir_dpjp_utama = null;
      } else if ($dpjp_tanggal_akhir_utama === true) {

        $date_akhir_dpjp_utama = null;
      } else {

        foreach ($tanggal_akhir_dpjp_utama as $key => $value) {
          $var1 = explode("/", $value);
          $var2 = "$var1[2]-$var1[1]-$var1[0]";

          $date = new DateTime($var2);
          $new = $date->format('Y-m-d');

          $date_akhir_dpjp_utama[$key] = $new;
        }
      }

      $daftar_dokter_dpjp = array(
        'id_layanan_pendaftaran' => $layanan['id'],
        'diagnosis_dokter' => safe_post('diagnosis_dokter') !== '' ? safe_post('diagnosis_dokter') : NULL,
        'keterangan_dpjp' => safe_post('keterangan_dpjp') !== '' ? safe_post('keterangan_dpjp') : NULL,
        'tanggal_awal_dpjp' => $date_dpjp,
        'tanggal_akhir_dpjp' => $date_akhir_dpjp,
        'tanggal_awal_dpjp_utama' => $date_mulai_dpjp_utama,
        'tanggal_akhir_dpjp_utama' => $date_akhir_dpjp_utama,
        'id_dokter_dpjp' => safe_post('nama_dokter_dpjp') !== '' ? safe_post('nama_dokter_dpjp') : NULL,
        'id_dokter_dpjp_utama' => safe_post('nama_dokter_dpjp_utama') !== '' ? safe_post('nama_dokter_dpjp_utama') : NULL,
        'id_users' => safe_post('user_dokter_dpjp') !== '' ? safe_post('user_dokter_dpjp') : NULL,
        'created_date' => $this->datetime,
      );

      $this->m_pelayanan->updateDaftarDPJP($daftar_dokter_dpjp);
    }

    // End Function
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

  public function simpan_surveilans_post()
  {
    $layanan = array('id' => safe_post('id_layanan_pendaftaran'));
    $ek_tanggal_penerima = safe_post('ek_tanggal_verifikasi_penerima');
    $ek_tanggal_perawat = safe_post('ek_tanggal_ttd_perawat');
    $ek_tanggal_dokter = safe_post('ek_tanggal_verifikasi_dokter');

    $tanggal_selesai = safe_post('sirs_tanggal_selesai');
    $si_tanggal_mulai = safe_post('sirs_tanggal_mulai');
    $waktu_pslp_petugas = safe_post('plsp_tanggal_ttd_petugas');

    $cekTanggal = $this->cekDate('6', '', 'Tanggal Mulai pada A. Tempat di Rawat', $si_tanggal_mulai);

    if ($cekTanggal === false) {
      return false;
      exit();
    }

    // $cekTanggalSelesai = $this->cekDate('6', '', 'Tanggal Selesai pada A. Tempat di Rawat', $tanggal_selesai);
    // if ($cekTanggalSelesai === false) {
    //   return false;
    //   exit();
    // }

    $cekTanggalPerawat = $this->cekDateTime('0', '#data-kontrol-kembali', 'Tanggal dan Jam Perawat yang merawat', $ek_tanggal_perawat);
    if ($cekTanggalPerawat === false) {
      return false;
      exit();
    }

    $cekTanggalDokter = $this->cekDateTime('0', '#data-kontrol-kembali', 'Tanggal dan Jam Dokter yang merawat', $ek_tanggal_dokter);
    if ($cekTanggalDokter === false) {
      return false;
      exit();
    }

    $cekTanggalPenerima = $this->cekDateTime('0', '#data-kontrol-kembali', 'Tanggal dan Jam Penerima', $ek_tanggal_penerima);
    if ($cekTanggalPenerima === false) {
      return false;
      exit();
    }

    $cekWaktuPSLPPetugas = $this->cekDateTime('5', '', 'Tanggal dan Jam Petugas Pengkajian Lanjutan Spiritual Pasien', $waktu_pslp_petugas);
    if ($cekWaktuPSLPPetugas === false) {
      return false;
      exit();
    }

    $this->db->trans_begin();

    $rk_id_layanan = array('id' => safe_post('rk_id_layanan_pendaftaran'));
    $id_rk = array('id' => safe_post('id_rk'));
    $id = $layanan['id'];

    // SURVEILANS INFEKSI RUMAH SAKIT
    $ruang_rawat = safe_post('sirs_ruang_rawat');

    if ($ruang_rawat) {

      $si_tanggal_mulai = safe_post('sirs_tanggal_mulai');

      $sirs_tanggal_mulai = is_string($si_tanggal_mulai);

      if ($si_tanggal_mulai === "" || $si_tanggal_mulai === null) {

        $sirs_mulai = null;
      } else if (!is_array($si_tanggal_mulai)) {

        $sirs_mulai = null;
      } else if (empty($si_tanggal_mulai)) {

        $sirs_mulai = null;
      } else if ($sirs_tanggal_mulai === true) {

        $sirs_mulai = null;
      } else {

        foreach ($si_tanggal_mulai as $key => $value) {

          $var1 = explode("/", $value);
          $var2 = "$var1[2]-$var1[1]-$var1[0]";

          $date = new DateTime($var2);
          $new = $date->format('Y-m-d');

          $sirs_mulai[$key] = $new;
        }
      }

      $sirs_tanggal_selesai = safe_post('sirs_tanggal_selesai');
      $sirs_selesai = [null]; // Setel defaultnya ke null

      // Filter elemen array yang tidak kosong
      $sirs_tanggal_selesai = array_filter($sirs_tanggal_selesai);

      if (!empty($sirs_tanggal_selesai)) {
        $sirs_selesai = array_map(function ($tanggal) {
          $var1 = explode("/", $tanggal);
          $var2 = "$var1[2]/$var1[1]/$var1[0]"; // Ubah format menjadi yyyy/mm/dd

          return $var2;
        }, $sirs_tanggal_selesai);
      }


      $sirs_ruang_rawat = array(
        'id_layanan_pendaftaran' => $layanan['id'],
        'ruang_rawat' => $ruang_rawat,
        'tanggal_mulai' => $sirs_mulai,
        'tanggal_selesai' => $sirs_selesai,
        'user' => safe_post('sirs_petugas') !== '' ? safe_post('sirs_petugas') : NULL,
      );
      $this->m_pelayanan->updateRuangRawat($sirs_ruang_rawat);
    } else {

      $sirs_ruang = safe_post('sirs_ruang');

      if (!empty($sirs_ruang)) {

        $respon = ['show' => '6', 'status' => false, 'message' => 'Tempat Di Rawat Belum ditambahkan'];
      }
    }

    $sirs_tindakan = safe_post('sirs_tindakan');

    if ($sirs_tindakan) {

      $tanggal_pasang = safe_post('sirs_tanggal_pasang');

      $sirs_tanggal_pasang = is_string($tanggal_pasang);

      if ($tanggal_pasang === "" || $tanggal_pasang === null) {

        $sirs_pasang = null;
      } else if (!is_array($tanggal_pasang)) {

        $sirs_pasang = null;
      } else if (empty($tanggal_pasang)) {

        $sirs_pasang = null;
      } else if ($sirs_tanggal_pasang === true) {

        $sirs_pasang = null;
      } else {

        foreach ($tanggal_pasang as $key => $value) {

          $var1 = explode("/", $value);
          $var2 = "$var1[2]-$var1[1]-$var1[0]";

          $date = new DateTime($var2);
          $new = $date->format('Y-m-d');

          $sirs_pasang[$key] = $new;
        }
      }

      $tanggal_lepas = safe_post('sirs_tanggal_lepas');

      $sirs_tanggal_lepas = is_string($tanggal_lepas);
      $sirs_lepas = null;

      if ($tanggal_lepas === "" || $tanggal_lepas === null) {

        $sirs_lepas = null;
      } else if (!is_array($tanggal_lepas)) {

        $sirs_lepas = null;
      } else if (empty($tanggal_lepas)) {

        $sirs_lepas = null;
      } else if ($sirs_tanggal_lepas === true) {

        $sirs_lepas = null;
      } else if (!empty($tanggal_lepas[0])) {

        foreach ($tanggal_lepas as $key => $value) {

          $var1 = explode("/", $value);
          $var2 = "$var1[2]-$var1[1]-$var1[0]";

          $date = new DateTime($var2);
          $new = $date->format('Y-m-d');

          $sirs_lepas[$key] = $new;
        }
      }

      $perawat_lepas = safe_post('sirs_perawat_lepas');

      $sirs_perawat_lepas = is_string($perawat_lepas);

      if ($perawat_lepas === "" || $perawat_lepas === null) {

        $sirs_perawat = null;
      } else if (!is_array($perawat_lepas)) {

        $sirs_perawat = null;
      } else if (empty($perawat_lepas)) {

        $sirs_perawat = null;
      } else if ($sirs_perawat_lepas === true) {

        $sirs_perawat = null;
      } else {

        foreach ($perawat_lepas as $key => $value) {

          $sirs_perawat[$key] = $value;
        }
      }

      $sirs_tindakan_pemasangan = array(
        'id_layanan_pendaftaran' => $layanan['id'],
        'sirs_tindakan' => $sirs_tindakan,
        'sirs_tanggal_pasang' => $sirs_pasang,
        'sirs_lokasi' => safe_post('sirs_lokasi') !== '' ? safe_post('sirs_lokasi') : NULL,
        'sirs_alasan_pasang' => safe_post('sirs_alasan_pasang') !== '' ? safe_post('sirs_alasan_pasang') : NULL,
        'sirs_perawat_pasang' => safe_post('sirs_perawat_pasang') !== '' ? safe_post('sirs_perawat_pasang') : NULL,
        'sirs_tanggal_lepas' => $sirs_lepas,
        'sirs_alasan_lepas' => !empty(safe_post('sirs_alasan_lepas')) ? safe_post('sirs_alasan_lepas') : NULL,
        'sirs_perawat_lepas' => !empty(safe_post('sirs_perawat_lepas')) ? safe_post('sirs_perawat_lepas') : NULL,
        'sirs_pemasang_alat' => safe_post('sirs_pemasang_alat') !== '' ? safe_post('sirs_pemasang_alat') : NULL,
      );
      $this->m_pelayanan->updatePemasanganAlat($sirs_tindakan_pemasangan);
    } else {

      $pasang_sirs_tindakan = safe_post('pasang_sirs_tindakan');

      if (!empty($pasang_sirs_tindakan)) {

        $respon = ['show' => '6', 'status' => false, 'message' => 'Pemasangan Alat Belum ditambahkan'];
      }
    }

    $sirs_antibiotik = safe_post('sirs_nama_antibiotika');

    if ($sirs_antibiotik) {

      $tanggal_pemberian = safe_post('sirs_tanggal_pemberian');

      $tanggal_pemberian = safe_post('sirs_tanggal_pemberian');

      $sirs_tanggal_pemberian = is_string($tanggal_pemberian);

      if ($tanggal_pemberian === "" || $tanggal_pemberian === null) {

        $sirs_pemberian = null;
      } else if (!is_array($tanggal_pemberian)) {


        $sirs_pemberian = null;
      } else if (empty($tanggal_pemberian)) {

        $sirs_pemberian = null;
      } else if ($sirs_tanggal_pemberian === true) {

        $sirs_pemberian = null;
      } else {

        foreach ($tanggal_pemberian as $key => $value) {

          $date = new DateTime($value);
          $new = $date->format('Y-m-d');

          $sirs_pemberian[$key] = $new;
        }
      }

      $tanggal_selesai = safe_post('sirs_antibiotik_tanggal_selesai');

      $sirs_tanggal_selesai = is_string($tanggal_selesai);

      if ($tanggal_selesai === "" || $tanggal_selesai === null) {

        $sirs_selesai = null;
      } else if (!is_array($tanggal_selesai)) {

        $sirs_selesai = null;
      } else if (empty($tanggal_selesai)) {

        $sirs_selesai = null;
      } else if ($sirs_tanggal_selesai === true) {

        $sirs_selesai = null;
      } else {

        foreach ($tanggal_selesai as $key => $value) {

          $date = new DateTime($value);
          $new = $date->format('Y-m-d');

          $sirs_selesai[$key] = $new;
        }
      }

      $antibiotika = array(
        'id_layanan_pendaftaran' => $layanan['id'],
        'sirs_antibiotik' => $sirs_antibiotik,
        'sirs_dosis_antibiotik' => safe_post('dosis_antibiotik') !== '' ? safe_post('dosis_antibiotik') : NULL,
        'sirs_tanggal_pemberian' => $sirs_pemberian,
        'sirs_tanggal_selesai' => $sirs_selesai,
        'sirs_teknik_antibiotik' => safe_post('sirs_teknik_pemberian_antibiotik') !== '' ? safe_post('sirs_teknik_pemberian_antibiotik') : NULL,
        'sirs_petugas_antibiotik' => safe_post('petugas_antibiotik') !== '' ? safe_post('petugas_antibiotik') : NULL,
      );

      $this->m_pelayanan->updateAntibiotika($antibiotika);
    } else {

      $f_sirs_nama_antibiotika = safe_post('f_sirs_nama_antibiotika');

      if (!empty($f_sirs_nama_antibiotika)) {

        $respon = ['show' => '6', 'status' => false, 'message' => 'F. Antibiotika Belum ditambahkan'];
      }
    }

    $surveilans = array(
      'id_layanan_pendaftaran' => $layanan['id'],
      'sirs_diagnosis_masuk' => safe_post('sirs_diagnosis_masuk') !== '' ? safe_post('sirs_diagnosis_masuk') : NULL,
      'sirs_diagnosis_operasi' => safe_post('sirs_diagnosis_operasi') !== '' ? safe_post('sirs_diagnosis_operasi') : NULL,
      'hbsag' => safe_post('hbsag') !== '' ? safe_post('hbsag') : NULL,
      'antihcv' => safe_post('antihcv') !== '' ? safe_post('antihcv') : NULL,
      'antihiv' => safe_post('antihiv') !== '' ? safe_post('antihiv') : NULL,
      't_op' => json_encode(array(
        't_op_ortopedi' => safe_post('t_op_ortopedi'),
        't_op_digestive' => safe_post('t_op_digestive'),
        't_op_plastik' => safe_post('t_op_plastik'),
        't_op_tumor' => safe_post('t_op_tumor'),
        't_op_urologi' => safe_post('t_op_urologi'),
        't_op_tht' => safe_post('t_op_tht'),
        't_op_anak' => safe_post('t_op_anak'),
        't_op_gilut' => safe_post('t_op_gilut'),
        't_op_vaskuler' => safe_post('t_op_vaskuler'),
        't_op_saraf' => safe_post('t_op_saraf'),
        't_op_mata' => safe_post('t_op_mata'),
        't_op_thorax' => safe_post('t_op_thorax'),
        't_op_obgyn' => safe_post('t_op_obgyn'),
        't_op_lain' => safe_post('t_op_lain'),
        'sm_top_lain' => safe_post('sm_top_lain'),

      )),
      'sirs_jam' => safe_post('sirs_jam') !== '' ? safe_post('sirs_jam') : NULL,
      'sirs_menit' => safe_post('sirs_menit') !== '' ? safe_post('sirs_menit') : NULL,
      'sirs_drain' => safe_post('sirs_drain') !== '' ? safe_post('sirs_drain') : NULL,
      'sirs_asascore' => safe_post('sirs_asascore') !== '' ? safe_post('sirs_asascore') : NULL,
      'sirs_jenis_operasi' => safe_post('sirs_jenis_operasi') !== '' ? safe_post('sirs_jenis_operasi') : NULL,
      'sirs_tindakan_operasi' => safe_post('sirs_tindakan_operasi') !== '' ? safe_post('sirs_tindakan_operasi') : NULL,
      'sirs_antibiotik' => json_encode(array(
        'sirs_antibiotik' => safe_post('sirs_antibiotik'),
        'sirs_antibiotik_profilaksis' => safe_post('sirs_antibiotik_profilaksis'),
        'sirs_dosis_antibiotik' => safe_post('sirs_dosis_antibiotik'),
      )),
      'sirs_waktu_pemberian' => safe_post('sirs_waktu_pemberian') !== '' ? safe_post('sirs_waktu_pemberian') : NULL,
      'sirs_jam_satu' => safe_post('sirs_jam_satu') !== '' ? safe_post('sirs_jam_satu') : NULL,
      'sirs_menit_satu' => safe_post('sirs_menit_satu') !== '' ? safe_post('sirs_menit_satu') : NULL,
      'sirs_drain_satu' => safe_post('sirs_drain_satu') !== '' ? safe_post('sirs_drain_satu') : NULL,
      'sirs_asascore_satu' => safe_post('sirs_asascore_satu') !== '' ? safe_post('sirs_asascore_satu') : NULL,
      'sirs_jenis_operasi_satu' => safe_post('sirs_jenis_operasi_satu') !== '' ? safe_post('sirs_jenis_operasi_satu') : NULL,
      'sirs_tindakan_operasi_satu' => safe_post('sirs_tindakan_operasi_satu') !== '' ? safe_post('sirs_tindakan_operasi_satu') : NULL,
      'sirs_antibiotik_satu' => json_encode(array(
        'sirs_antibiotik_satu' => safe_post('sirs_antibiotik_satu'),
        'sirs_antibiotik_profilaksis_satu' => safe_post('sirs_antibiotik_profilaksis_satu'),
        'sirs_dosis_antibiotik_satu' => safe_post('sirs_dosis_antibiotik_satu'),
      )),
      'sirs_waktu_pemberian_satu' => safe_post('sirs_waktu_pemberian_satu') !== '' ? safe_post('sirs_waktu_pemberian_satu') : NULL,
      'sirs_tirah_baring' => safe_post('sirs_tirah_baring') !== '' ? safe_post('sirs_tirah_baring') : NULL,
      'sirs_ido' => json_encode(array(
        'sirs_ido' => safe_post('sirs_ido'),
        'sirs_komplikasi_ido' => safe_post('sirs_komplikasi_ido'),
        'sirs_kultur_ido' => safe_post('sirs_kultur_ido'),
      )),
      'sirs_iad' => json_encode(array(
        'sirs_iad' => safe_post('sirs_iad'),
        'sirs_komplikasi_iad' => safe_post('sirs_komplikasi_iad'),
        'sirs_kultur_iad' => safe_post('sirs_kultur_iad'),
      )),
      'sirs_isk' => json_encode(array(
        'sirs_isk' => safe_post('sirs_isk'),
        'sirs_komplikasi_isk' => safe_post('sirs_komplikasi_isk'),
        'sirs_kultur_isk' => safe_post('sirs_kultur_isk'),
      )),
      'sirs_hap' => json_encode(array(
        'sirs_hap' => safe_post('sirs_hap'),
        'sirs_komplikasi_hap' => safe_post('sirs_komplikasi_hap'),
        'sirs_kultur_hap' => safe_post('sirs_kultur_hap'),
      )),
      'sirs_vap' => json_encode(array(
        'sirs_vap' => safe_post('sirs_vap'),
        'sirs_komplikasi_vap' => safe_post('sirs_komplikasi_vap'),
        'sirs_kultur_vap' => safe_post('sirs_kultur_vap'),
      )),
      'sirs_plebitis' => json_encode(array(
        'sirs_plebitis' => safe_post('sirs_plebitis'),
        'sirs_komplikasi_plebitis' => safe_post('sirs_komplikasi_plebitis'),
        'sirs_kultur_plebitis' => safe_post('sirs_kultur_plebitis'),
      )),
      'sirs_dekubitus' => json_encode(array(
        'sirs_dekubitus' => safe_post('sirs_dekubitus'),
        'sirs_komplikasi_dekubitus' => safe_post('sirs_komplikasi_dekubitus'),
        'sirs_kultur_dekubitus' => safe_post('sirs_kultur_dekubitus'),
      )),
      'sirs_lain' => json_encode(array(
        'sirs_lain' => safe_post('sirs_lain'),
        'sirs_komplikasi_lain' => safe_post('sirs_komplikasi_lain'),
        'sirs_kultur_lain' => safe_post('sirs_kultur_lain'),
      )),
      'sirs_pemakaian_antibiotika' => safe_post('sirs_pemakaian_antibiotika') !== '' ? safe_post('sirs_pemakaian_antibiotika') : NULL,
      'sirs_keluar_rs' => safe_post('sirs_keluar_rs') !== '' ? safe_post('sirs_keluar_rs') : NULL,
      'sirs_sebab_keluar' => safe_post('sirs_sebab_keluar') !== '' ? safe_post('sirs_sebab_keluar') : NULL,
      'sirs_diagnosis_akhir' => safe_post('sirs_diagnosis_akhir') !== '' ? safe_post('sirs_diagnosis_akhir') : NULL,
      'sirs_perawat' => safe_post('surveilans_perawat') !== '' ? safe_post('surveilans_perawat') : NULL,
      'sirs_ipcn' => safe_post('surveilans_ipcn') !== '' ? safe_post('surveilans_ipcn') : NULL,
      'id_users' => safe_post('id_users') !== '' ? safe_post('id_users') : NULL,
    );

    $id_surveilans = $this->db->select("ss.id, ss.sirs_tanggal_diagnosis, ss.sirs_tanggal_diagnosis_satu, ss.sirs_tanggal_keluars, ss.sirs_petugas, ss.sirs_ipcn_link, ss.sirs_tanggal_ttd_perawat, ss.sirs_tanggal_ttd_ipcn")
      ->from('sm_surveilans as ss')
      ->where('ss.id_layanan_pendaftaran', $id, true)
      ->get()
      ->row();

    if (isset($id_surveilans)) {

      $id_ssp = $id_surveilans->id;

      $sirs_tanggal_diagnosis = safe_post('sirs_tanggal_diagnosis');

      if ($sirs_tanggal_diagnosis === '' && $id_surveilans->sirs_tanggal_diagnosis !== NULL) {

        $surveilans['sirs_tanggal_diagnosis'] = null;
      } else {

        if ($id_surveilans->sirs_tanggal_diagnosis !== NULL) {

          $sirs_tanggal_diag = $id_surveilans->sirs_tanggal_diagnosis;
        } else if ($sirs_tanggal_diagnosis === "" || $sirs_tanggal_diagnosis === null) {

          $sirs_tanggal_diag = null;
        } else if (empty($sirs_tanggal_diagnosis)) {

          $sirs_tanggal_diag = null;
        } else if (is_null($sirs_tanggal_diagnosis)) {

          $sirs_tanggal_diag = null;
        } else {

          $var1 = explode("/", $sirs_tanggal_diagnosis);
          $var2 = "$var1[2]-$var1[1]-$var1[0]";

          $date = new DateTime($var2);
          $new = $date->format('Y-m-d');

          $sirs_tanggal_diag = $new;
        }

        $surveilans['sirs_tanggal_diagnosis'] = $sirs_tanggal_diag;
      }

      if ($id_surveilans->sirs_tanggal_diagnosis_satu !== NULL) {
        $surveilans['sirs_tanggal_diagnosis_satu'] = $id_surveilans->sirs_tanggal_diagnosis_satu;
      } else {

        $sirs_tanggal_diagnosis_satu = safe_post('sirs_tanggal_diagnosis_satu');

        if ($sirs_tanggal_diagnosis_satu === "" || $sirs_tanggal_diagnosis_satu === null) {

          $sirs_tanggal_diag_satu = null;
        } else if (empty($sirs_tanggal_diagnosis_satu)) {

          $sirs_tanggal_diag_satu = null;
        } else if (is_null($sirs_tanggal_diagnosis_satu)) {

          $sirs_tanggal_diag_satu = null;
        } else {

          $var1 = explode("/", $sirs_tanggal_diagnosis_satu);
          $var2 = "$var1[2]-$var1[1]-$var1[0]";

          $date = new DateTime($var2);
          $new = $date->format('Y-m-d');

          $sirs_tanggal_diag_satu = $new;
        }

        $surveilans['sirs_tanggal_diagnosis_satu'] = $sirs_tanggal_diag_satu;
      }

      if ($id_surveilans->sirs_tanggal_keluars !== NULL) {

        $surveilans['sirs_tanggal_keluars'] = $id_surveilans->sirs_tanggal_keluars;
      } else {

        $sirs_tanggal_keluars = safe_post('sirs_tanggal_keluars');

        if ($sirs_tanggal_keluars === "" || $sirs_tanggal_keluars === null) {

          $sirs_tanggal_klr = null;
        } else if (empty($sirs_tanggal_keluars)) {

          $sirs_tanggal_klr = null;
        } else if (is_null($sirs_tanggal_keluars)) {

          $sirs_tanggal_klr = null;
        } else {

          $var1 = explode("/", $sirs_tanggal_keluars);

          $var2 = "$var1[2]-$var1[1]-$var1[0]";

          $date = new DateTime($var2);
          $new = $date->format('Y-m-d');

          $sirs_tanggal_klr = $new;
        }

        $surveilans['sirs_tanggal_keluars'] = $sirs_tanggal_klr;
      }

      if ($id_surveilans->sirs_petugas !== NULL) {
        $surveilans['sirs_petugas'] = $id_surveilans->sirs_petugas;
      } else {
        $surveilans['sirs_petugas'] = safe_post('surveilans_petugas') !== '' ? safe_post('surveilans_petugas') : NULL;
      }

      if ($id_surveilans->sirs_ipcn_link !== NULL) {
        $surveilans['sirs_ipcn_link'] = $id_surveilans->sirs_ipcn_link;
      } else {
        $surveilans['sirs_ipcn_link'] = safe_post('surveilans_ipcn_link') !== '' ? safe_post('surveilans_ipcn_link') : NULL;
      }

      if ($id_surveilans->sirs_tanggal_ttd_perawat !== NULL) {
        $surveilans['sirs_tanggal_ttd_perawat'] = $id_surveilans->sirs_tanggal_ttd_perawat;
      } else {

        $sirs_ttd_tanggal_p = safe_post('surveilans_tanggal_ttd_perawat');

        if ($sirs_ttd_tanggal_p === "" || $sirs_ttd_tanggal_p === null) {

          $sirs_tanggal_p = null;
        } else if (empty($sirs_ttd_tanggal_p)) {

          $sirs_tanggal_p = null;
        } else if (is_null($sirs_ttd_tanggal_p)) {

          $sirs_tanggal_p = null;
        } else {

          $var1 = explode("/", $sirs_ttd_tanggal_p);
          $var2 = explode(" ", $var1[2]);
          $var3 = $var2[0] . "-" . $var1[1] . "-" . $var1[0] . " " . $var2[1];

          $date = new DateTime($var3);
          $new = $date->format('Y-m-d H:i:s');

          $sirs_tanggal_p = $new;
        }

        $surveilans['sirs_tanggal_ttd_perawat'] = $sirs_tanggal_p;
      }

      if ($id_surveilans->sirs_tanggal_ttd_ipcn !== NULL) {

        $surveilans['sirs_tanggal_ttd_ipcn'] = $id_surveilans->sirs_tanggal_ttd_ipcn;
      } else {

        $sirs_tanggal_ipcn = safe_post('surveilans_tanggal_ttd_ipcn');

        if ($sirs_tanggal_ipcn === "" || $sirs_tanggal_ipcn === null) {

          $sirs_ttd_ipcn = null;
        } else if (empty($sirs_tanggal_ipcn)) {

          $sirs_ttd_ipcn = null;
        } else if (is_null($sirs_tanggal_ipcn)) {

          $sirs_ttd_ipcn = null;
        } else {

          $var1 = explode("/", $sirs_tanggal_ipcn);

          $var2 = explode(" ", $var1[2]);

          $var3 = $var2[0] . "-" . $var1[1] . "-" . $var1[0] . " " . $var2[1];

          $date = new DateTime($var3);

          $new = $date->format('Y-m-d H:i:s');

          $sirs_ttd_ipcn = $new;
        }

        $surveilans['sirs_tanggal_ttd_ipcn'] = $sirs_ttd_ipcn;
      }

      $surveilans['updated_date'] = $this->datetime;

      $this->db->where('id', $id_ssp)->update('sm_surveilans', $surveilans);
    } else {

      $sirs_tanggal_diagnosis = safe_post('sirs_tanggal_diagnosis');

      if ($sirs_tanggal_diagnosis === "" || $sirs_tanggal_diagnosis === null) {

        $sirs_tanggal_diag = null;
      } else if (empty($sirs_tanggal_diagnosis)) {

        $sirs_tanggal_diag = null;
      } else if (is_null($sirs_tanggal_diagnosis)) {

        $sirs_tanggal_diag = null;
      } else {

        $var1 = explode("/", $sirs_tanggal_diagnosis);
        $var2 = "$var1[2]-$var1[1]-$var1[0]";

        $date = new DateTime($var2);
        $new = $date->format('Y-m-d');

        $sirs_tanggal_diag = $new;
      }

      $surveilans['sirs_tanggal_diagnosis'] = $sirs_tanggal_diag;

      $sirs_tanggal_diagnosis_satu = safe_post('sirs_tanggal_diagnosis_satu');

      if ($sirs_tanggal_diagnosis_satu === "" || $sirs_tanggal_diagnosis_satu === null) {

        $sirs_tanggal_diag_satu = null;
      } else if (empty($sirs_tanggal_diagnosis_satu)) {

        $sirs_tanggal_diag_satu = null;
      } else if (is_null($sirs_tanggal_diagnosis_satu)) {

        $sirs_tanggal_diag_satu = null;
      } else {

        $var1 = explode("/", $sirs_tanggal_diagnosis_satu);
        $var2 = "$var1[2]-$var1[1]-$var1[0]";

        $date = new DateTime($var2);
        $new = $date->format('Y-m-d');

        $sirs_tanggal_diag_satu = $new;
      }

      $surveilans['sirs_tanggal_diagnosis_satu'] = $sirs_tanggal_diag_satu;

      $sirs_tanggal_keluars = safe_post('sirs_tanggal_keluars');

      if ($sirs_tanggal_keluars === "" || $sirs_tanggal_keluars === null) {

        $sirs_tanggal_klr = null;
      } else if (empty($sirs_tanggal_keluars)) {

        $sirs_tanggal_klr = null;
      } else if (is_null($sirs_tanggal_keluars)) {

        $sirs_tanggal_klr = null;
      } else {

        $var1 = explode("/", $sirs_tanggal_keluars);
        $var2 = "$var1[2]-$var1[1]-$var1[0]";

        $date = new DateTime($var2);
        $new = $date->format('Y-m-d');

        $sirs_tanggal_klr = $new;
      }

      $surveilans['sirs_tanggal_keluars'] = $sirs_tanggal_klr;

      $sirs_ttd_tanggal_p = safe_post('surveilans_tanggal_ttd_perawat');

      if ($sirs_ttd_tanggal_p === "" || $sirs_ttd_tanggal_p === null) {

        $sirs_tanggal_p = null;
      } else if (empty($sirs_ttd_tanggal_p)) {

        $sirs_tanggal_p = null;
      } else if (is_null($sirs_ttd_tanggal_p)) {

        $sirs_tanggal_p = null;
      } else {

        $var1 = explode("/", $sirs_ttd_tanggal_p);
        $var2 = explode(" ", $var1[2]);
        $var3 = $var2[0] . "-" . $var1[1] . "-" . $var1[0] . " " . $var2[1];

        $date = new DateTime($var3);
        $new = $date->format('Y-m-d H:i:s');

        $sirs_tanggal_p = $new;
      }

      $surveilans['sirs_tanggal_ttd_perawat'] = $sirs_tanggal_p;

      $sirs_tanggal_ipcn = safe_post('surveilans_tanggal_ttd_ipcn');

      if ($sirs_tanggal_ipcn === "" || $sirs_tanggal_ipcn === null) {

        $sirs_ttd_ipcn = null;
      } else if (empty($sirs_tanggal_ipcn)) {

        $sirs_ttd_ipcn = null;
      } else if (is_null($sirs_tanggal_ipcn)) {

        $sirs_ttd_ipcn = null;
      } else {

        $var1 = explode("/", $sirs_tanggal_ipcn);
        $var2 = explode(" ", $var1[2]);
        $var3 = $var2[0] . "-" . $var1[1] . "-" . $var1[0] . " " . $var2[1];

        $date = new DateTime($var3);
        $new = $date->format('Y-m-d H:i:s');

        $sirs_ttd_ipcn = $new;
      }

      $surveilans['sirs_tanggal_ttd_ipcn'] = $sirs_ttd_ipcn;
      $surveilans['sirs_petugas'] = safe_post('surveilans_petugas') !== '' ? safe_post('surveilans_petugas') : NULL;
      $surveilans['sirs_ipcn_link'] = safe_post('surveilans_ipcn_link') !== '' ? safe_post('surveilans_ipcn_link') : NULL;

      $this->m_pelayanan->updateSurveilans($surveilans);
    }

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

  public function simpan_assesmen_awal_anestesi_post()
  {
    $layanan = array('id' => safe_post('id_layanan_pendaftaran'));

    $ek_tanggal_penerima = safe_post('ek_tanggal_verifikasi_penerima');
    $ek_tanggal_perawat = safe_post('ek_tanggal_ttd_perawat');
    $ek_tanggal_dokter = safe_post('ek_tanggal_verifikasi_dokter');

    $tanggal_selesai = safe_post('sirs_tanggal_selesai');
    $si_tanggal_mulai = safe_post('sirs_tanggal_mulai');
    $waktu_pslp_petugas = safe_post('plsp_tanggal_ttd_petugas');

    $cekTanggal = $this->cekDate('6', '', 'Tanggal Mulai pada A. Tempat di Rawat', $si_tanggal_mulai);

    if ($cekTanggal === false) {
      return false;
      exit();
    }

    $cekTanggalSelesai = $this->cekDate('6', '', 'Tanggal Selesai pada A. Tempat di Rawat', $tanggal_selesai);
    if ($cekTanggalSelesai === false) {
      return false;
      exit();
    }

    $cekTanggalPerawat = $this->cekDateTime('0', '#data-kontrol-kembali', 'Tanggal dan Jam Perawat yang merawat', $ek_tanggal_perawat);
    if ($cekTanggalPerawat === false) {
      return false;
      exit();
    }

    $cekTanggalDokter = $this->cekDateTime('0', '#data-kontrol-kembali', 'Tanggal dan Jam Dokter yang merawat', $ek_tanggal_dokter);
    if ($cekTanggalDokter === false) {
      return false;
      exit();
    }

    $cekTanggalPenerima = $this->cekDateTime('0', '#data-kontrol-kembali', 'Tanggal dan Jam Penerima', $ek_tanggal_penerima);
    if ($cekTanggalPenerima === false) {
      return false;
      exit();
    }

    $cekWaktuPSLPPetugas = $this->cekDateTime('5', '', 'Tanggal dan Jam Petugas Pengkajian Lanjutan Spiritual Pasien', $waktu_pslp_petugas);
    if ($cekWaktuPSLPPetugas === false) {
      return false;
      exit();
    }

    $this->db->trans_begin();

    $rk_id_layanan = array('id' => safe_post('rk_id_layanan_pendaftaran'));
    $id_rk = array('id' => safe_post('id_rk'));
    $id = $layanan['id'];


    // ASSESMEN AWAL ANESTESI/SEDASI
    $checkDataAsessmentAnestesiSedasi = $this->db->select("*")
      ->from('sm_assesment_anestesi_sedasi')
      ->where('id_layanan_pendaftaran', $id, true)
      ->get()->row();

    if ($checkDataAsessmentAnestesiSedasi == NULL) {
      $assesmen_anestesi_sedasi = array(
        'id_layanan_pendaftaran' => $id,
        'diagnosis_pra_bedah' => safe_post('aas_diagnosis') !== '' ? safe_post('aas_diagnosis') : NULL,
        'rencana_tindak_operasi' => safe_post('aas_rot') !== '' ? safe_post('aas_rot') : NULL,
        'id_perawat_medis' => safe_post('aas_perawat') !== '' ? safe_post('aas_perawat') : NULL,
        'anamnesa_dari' => safe_post('aas_anamnesa') !== '' ? safe_post('aas_anamnesa') : NULL,
        'ket_anamnesa_dari' => safe_post('aas_riwayat_lainnya') !== '' ? safe_post('aas_riwayat_lainnya') : NULL,
        'riwayat_anestesi' => safe_post('aas_riwayat_anestesi') !== '' ? safe_post('aas_riwayat_anestesi') : NULL,
        'ket_riwayat_anestesi' => safe_post('aas_riwayat_anestesi') !== '' ? safe_post('aas_riwayat_anestesi') : NULL,
        'konsumsi_obat' => safe_post('ass_konsumsi_obat') !== '' ? safe_post('ass_konsumsi_obat') : NULL,
        'riwayat_alergi' => safe_post('aas_riwayat_alergi') !== '' ? safe_post('aas_riwayat_alergi') : NULL,
        'ket_riwayat_alergi' => safe_post('aas_riwayat_alergi_lain') !== '' ? safe_post('aas_riwayat_alergi_lain') : NULL,
        'komplikasi' => safe_post('aas_komplikasi_anestesi') !== '' ? safe_post('aas_komplikasi_anestesi') : NULL,
        'ket_komplikasi' => safe_post('aas_komplikasi_anestesi_lain') !== '' ? safe_post('aas_komplikasi_anestesi_lain') : NULL,
        'berat_badan' => safe_post('aas_bb') !== '' ? safe_post('aas_bb') : NULL,
        'tinggi_badan' => safe_post('aas_tinggi_badan') !== '' ? safe_post('aas_tinggi_badan') : NULL,
        'tekanan_darah' => safe_post('aas_td') !== '' ? safe_post('aas_td') : NULL,
        'rr' => safe_post('aas_rr') !== '' ? safe_post('aas_rr') : NULL,
        'skor_nyeri' => safe_post('aas_skor_nyeri') !== '' ? safe_post('aas_skor_nyeri') : NULL,
        'bebas' => safe_post('aas_evaluasi_bebas') !== '' ? safe_post('aas_evaluasi_bebas') : NULL,
        'protrusi_mandibula' => safe_post('aas_mandi_bula') !== '' ? safe_post('aas_mandi_bula') : NULL,
        'buka_mulut' => safe_post('aas_buka_mulut') !== '' ? safe_post('aas_buka_mulut') : NULL,
        'ket_buka_mulut' => safe_post('aas_riwayat_buka_mulut') !== '' ? safe_post('aas_riwayat_buka_mulut') : NULL,
        'jarak_mentohyoid' => safe_post('aas_mentohyoid') !== '' ? safe_post('aas_mentohyoid') : NULL,
        'ket_jarak_mentohyoid' => safe_post('aas_riwayat_mentohyoid') !== '' ? safe_post('aas_riwayat_mentohyoid') : NULL,
        'aas_jarak_hyothyoroid' => safe_post('aas_jarak_hyothyoroid') !== '' ? safe_post('aas_jarak_hyothyoroid') : NULL,
        'aas_ket_jarak_hyothyoroid' => safe_post('aas_ket_jarak_hyothyoroid') !== '' ? safe_post('aas_ket_jarak_hyothyoroid') : NULL,
        'leher' => safe_post('aas_leher_anestesi') !== '' ? safe_post('aas_leher_anestesi') : NULL,
        'gerak_leher' => safe_post('aas_gerak_leher_anestesi') !== '' ? safe_post('aas_gerak_leher_anestesi') : NULL,
        'mallampathy' => safe_post('ass_mallamapathy') !== '' ? safe_post('ass_mallamapathy') : NULL,
        'obesitas' => safe_post('ass_obestitas_anestei') !== '' ? safe_post('ass_obestitas_anestei') : NULL,
        'massa' => safe_post('ass_massa_anestesi') !== '' ? safe_post('ass_massa_anestesi') : NULL,
        'gigi_palsu' => safe_post('ass_gigi_palsu_anestesi') !== '' ? safe_post('ass_gigi_palsu_anestesi') : NULL,
        'sulit_ventilasi' => safe_post('aas_sulit_ventilasi_anestesi') !== '' ? safe_post('aas_sulit_ventilasi_anestesi') : NULL,
        'pernafasan' => json_encode(array(
          'aas_asma' => safe_post('aas_asma'),
          'aas_batuk_produktif' => safe_post('aas_batuk_produktif'),
          'aas_bronchitis' => safe_post('aas_bronchitis'),
          'aas_ispa' => safe_post('aas_ispa'),
          'aas_dyspnea' => safe_post('aas_dyspnea'),
          'aas_ppok' => safe_post('aas_ppok'),
          'orthopnea_anestesi' => safe_post('orthopnea_anestesi'),
          'aas_tuberkulosis' => safe_post('aas_tuberkulosis'),
          'aas_pneumonia' => safe_post('aas_pneumonia'),
          'aas_efusi_pleura' => safe_post('aas_efusi_pleura'),

        )),
        'kardiovaskular' => json_encode(array(
          'aas_angina' => safe_post('aas_angina'),
          'aas_ht' => safe_post('aas_ht'),
          'aas_pancamaker' => safe_post('aas_pancamaker'),
          'aas_pjk' => safe_post('aas_pjk'),
          'aas_disritmia' => safe_post('aas_disritmia'),
          'aas_pjr' => safe_post('aas_pjr'),
          'aas_limitasi_aktivitas' => safe_post('aas_limitasi_aktivitas'),
          'aas_chd' => safe_post('aas_chd'),
          'aas_jantung_katup' => safe_post('aas_jantung_katup'),
          'aas_murmur' => safe_post('aas_murmur'),

        )),
        'neuro_maskuloskeletal' => json_encode(array(
          'aas_kelemahan_otot' => safe_post('aas_kelemahan_otot'),
          'aas_stroke' => safe_post('aas_stroke'),
          'aas_keluhan_punggung' => safe_post('aas_keluhan_punggung'),
          'aas_kejang' => safe_post('aas_kejang'),
          'aas_nyeri_kepala' => safe_post('aas_nyeri_kepala'),
          'aas_epilepsi' => safe_post('aas_epilepsi'),
          'aas_penurunan_kesadaran' => safe_post('aas_penurunan_kesadaran'),
          'aas_sop' => safe_post('aas_sop'),

        )),
        'renal_endokrin' => json_encode(array(
          'aas_dm' => safe_post('aas_dm'),
          'aas_peny_thiroid' => safe_post('aas_peny_thiroid'),
          'aas_penyakit_gigi' => safe_post('aas_penyakit_gigi'),
          'aas_penyakit_lain' => safe_post('aas_penyakit_lain'),


        )),
        'hepato' => json_encode(array(
          'aas_obstruksi_usus' => safe_post('aas_obstruksi_usus'),
          'aas_sirosis' => safe_post('aas_sirosis'),
          'aas_heptitis' => safe_post('aas_heptitis'),
          'aas_tukak_peptik' => safe_post('aas_tukak_peptik'),
          'aas_refluks' => safe_post('aas_refluks'),
          'aas_mual' => safe_post('aas_mual'),


        )),
        'lain_lain' => json_encode(array(
          'aas_hemofilia' => safe_post('aas_hemofilia'),
          'aas_anemia' => safe_post('aas_anemia'),
          'aas_bleeding_tendencies' => safe_post('aas_bleeding_tendencies'),
          'aas_hamil' => safe_post('aas_hamil'),
          'aas_antikoagula' => safe_post('aas_antikoagula'),
          'aas_kanker' => safe_post('aas_kanker'),
          'aas_riwayat_transfusi' => safe_post('aas_riwayat_transfusi'),
          'aas_geriatri' => safe_post('aas_geriatri'),
          'aas_imunosupresan' => safe_post('aas_imunosupresan'),
          'aas_dehidrasi' => safe_post('aas_dehidrasi'),
          'aas_neonatus' => safe_post('aas_neonatus'),

        )),
        'hematologi_hb' => safe_post('aas_hb') !== '' ? safe_post('aas_hb') : NULL,
        'hematologi_hct' => safe_post('aas_hct') !== '' ? safe_post('aas_hct') : NULL,
        'hematologi_leukosit' => safe_post('aas_leukosit') !== '' ? safe_post('aas_leukosit') : NULL,
        'hematologi_trombosit' => safe_post('aas_trombosit') !== '' ? safe_post('aas_trombosit') : NULL,
        'hematologi_ppt' => safe_post('aas_ppt') !== '' ? safe_post('aas_ppt') : NULL,
        'hematologi_appt' => safe_post('aas_appt') !== '' ? safe_post('aas_appt') : NULL,
        'elektrolit_na' => safe_post('aas_na') !== '' ? safe_post('aas_na') : NULL,
        'elektrolit_k' => safe_post('aas_k') !== '' ? safe_post('aas_k') : NULL,
        'elektrolit_ca' => safe_post('aas_ca') !== '' ? safe_post('aas_ca') : NULL,
        'elektrolit_cl' => safe_post('aas_cl') !== '' ? safe_post('aas_cl') : NULL,
        'fungsi_ginjal_ureum' => safe_post('aas_ureum') !== '' ? safe_post('aas_ureum') : NULL,
        'fungsi_ginjal_creatinin' => safe_post('aas_creatin') !== '' ? safe_post('aas_creatin') : NULL,
        'endokorin_gda' => safe_post('aas_gda') !== '' ? safe_post('aas_gda') : NULL,
        'endokorin_gdp' => safe_post('aas_gdp') !== '' ? safe_post('aas_gdp') : NULL,
        'endokorin_gdjampp' => safe_post('aas_gdajampp') !== '' ? safe_post('aas_gdajampp') : NULL,
        'endokorin_ttiga' => safe_post('aas_t3') !== '' ? safe_post('aas_t3') : NULL,
        'endokorin_tempat' => safe_post('aas_t4') !== '' ? safe_post('aas_t4') : NULL,
        'endokorin_tshs' => safe_post('aas_tshs') !== '' ? safe_post('aas_tshs') : NULL,
        'agd_ph' => safe_post('aas_ph') !== '' ? safe_post('aas_ph') : NULL,
        'agd_pcodua' => safe_post('aas_pco2') !== '' ? safe_post('aas_pco2') : NULL,
        'agd_podua' => safe_post('aas_po2') !== '' ? safe_post('aas_po2') : NULL,
        'agd_be' => safe_post('aas_be') !== '' ? safe_post('aas_be') : NULL,
        'agd_spodua' => safe_post('aas_spo2') !== '' ? safe_post('aas_spo2') : NULL,
        'penunjang_ekg' => safe_post('aas_ekg') !== '' ? safe_post('aas_ekg') : NULL,
        'penunjang_xray' => safe_post('aas_xray') !== '' ? safe_post('aas_xray') : NULL,
        'penunjang_echocardiograph' => safe_post('aas_echocardiograph') !== '' ? safe_post('aas_echocardiograph') : NULL,
        'penunjang_faal_paru' => safe_post('aas_faal_paru') !== '' ? safe_post('aas_faal_paru') : NULL,
        'penunjang_lain' => safe_post('aas_lain_lain') !== '' ? safe_post('aas_lain_lain') : NULL,
        'tas_sedasi' => safe_post('aas_sedasi') !== '' ? safe_post('aas_sedasi') : NULL,
        'tas_ga' => safe_post('aas_ga') !== '' ? safe_post('aas_ga') : NULL,
        'tas_regional' => safe_post('regional') !== '' ? safe_post('regional') : NULL,
        'tas_teknik_khusus' => safe_post('teknik_khusus') !== '' ? safe_post('teknik_khusus') : NULL,
        'tas_teknik_khusus_lain' => safe_post('tk_lainnya') !== '' ? safe_post('tk_lainnya') : NULL,
        'tas_monitoring' => safe_post('monitoring') !== '' ? safe_post('monitoring') : NULL,
        'tas_monitoring_lain' => safe_post('monitoring_lain_lain') !== '' ? safe_post('monitoring_lain_lain') : NULL,
        'tas_alat_khusus' => safe_post('alat_khusus') !== '' ? safe_post('alat_khusus') : NULL,
        'tas_alat_khusus_lain' => safe_post('alat_khusus_lain') !== '' ? safe_post('alat_khusus_lain') : NULL,
        'tas_perawatan_anestesi' => safe_post('perawatan_pasca_anestesi') !== '' ? safe_post('perawatan_pasca_anestesi') : NULL,
        'tas_perawatan_anestesi_lain' => safe_post('perawatan_pasca_anestesi_lain') !== '' ? safe_post('perawatan_pasca_anestesi_lain') : NULL,
        'ps_asa' => safe_post('aas_ps_asa') !== '' ? safe_post('aas_ps_asa') : NULL,
        'penyulit' => safe_post('penyulit') !== '' ? safe_post('penyulit') : NULL,
        'puasa' => safe_post('puasa') !== '' ? safe_post('puasa') : NULL,
        'premedikal' => safe_post('premedikal') !== '' ? safe_post('premedikal') : NULL,
        'catatan_pra_anestesi' => safe_post('aas_catatan') !== '' ? safe_post('aas_catatan') : NULL,
        'tanggal_waktu' => $this->datetime,
        'id_perawat_medis' => safe_post('pemeriksa_asesmen_anestesi') !== '' ? safe_post('pemeriksa_asesmen_anestesi') : NULL,
        'verifikasi_pemeriksa' => safe_post('aas_pemeriksa') !== '' ? safe_post('aas_pemeriksa') : NULL,
      );

      $this->db->insert('sm_assesment_anestesi_sedasi', $assesmen_anestesi_sedasi);
    } else {

      $assesmen_anestesi_sedasi = array(
        'id_layanan_pendaftaran' => $id,
        'diagnosis_pra_bedah' => safe_post('aas_diagnosis') !== '' ? safe_post('aas_diagnosis') : NULL,
        'rencana_tindak_operasi' => safe_post('aas_rot') !== '' ? safe_post('aas_rot') : NULL,
        'id_perawat_medis' => safe_post('aas_perawat') !== '' ? safe_post('aas_perawat') : NULL,
        'anamnesa_dari' => safe_post('aas_anamnesa') !== '' ? safe_post('aas_anamnesa') : NULL,
        'ket_anamnesa_dari' => safe_post('aas_riwayat_lainnya') !== '' ? safe_post('aas_riwayat_lainnya') : NULL,
        'riwayat_anestesi' => safe_post('aas_riwayat_anestesi') !== '' ? safe_post('aas_riwayat_anestesi') : NULL,
        'ket_riwayat_anestesi' => safe_post('aas_riwayat_anestesi') !== '' ? safe_post('aas_riwayat_anestesi') : NULL,
        'konsumsi_obat' => safe_post('ass_konsumsi_obat') !== '' ? safe_post('ass_konsumsi_obat') : NULL,
        'riwayat_alergi' => safe_post('aas_riwayat_alergi') !== '' ? safe_post('aas_riwayat_alergi') : NULL,
        'ket_riwayat_alergi' => safe_post('aas_riwayat_alergi_lain') !== '' ? safe_post('aas_riwayat_alergi_lain') : NULL,
        'komplikasi' => safe_post('aas_komplikasi_anestesi') !== '' ? safe_post('aas_komplikasi_anestesi') : NULL,
        'ket_komplikasi' => safe_post('aas_komplikasi_anestesi_lain') !== '' ? safe_post('aas_komplikasi_anestesi_lain') : NULL,
        'berat_badan' => safe_post('aas_bb') !== '' ? safe_post('aas_bb') : NULL,
        'tinggi_badan' => safe_post('aas_tinggi_badan') !== '' ? safe_post('aas_tinggi_badan') : NULL,
        'tekanan_darah' => safe_post('aas_td') !== '' ? safe_post('aas_td') : NULL,
        'rr' => safe_post('aas_rr') !== '' ? safe_post('aas_rr') : NULL,
        'skor_nyeri' => safe_post('aas_skor_nyeri') !== '' ? safe_post('aas_skor_nyeri') : NULL,
        'bebas' => safe_post('aas_evaluasi_bebas') !== '' ? safe_post('aas_evaluasi_bebas') : NULL,
        'protrusi_mandibula' => safe_post('aas_mandi_bula') !== '' ? safe_post('aas_mandi_bula') : NULL,
        'buka_mulut' => safe_post('aas_buka_mulut') !== '' ? safe_post('aas_buka_mulut') : NULL,
        'ket_buka_mulut' => safe_post('aas_riwayat_buka_mulut') !== '' ? safe_post('aas_riwayat_buka_mulut') : NULL,
        'jarak_mentohyoid' => safe_post('aas_mentohyoid') !== '' ? safe_post('aas_mentohyoid') : NULL,
        'ket_jarak_mentohyoid' => safe_post('aas_riwayat_mentohyoid') !== '' ? safe_post('aas_riwayat_mentohyoid') : NULL,
        'aas_jarak_hyothyoroid' => safe_post('aas_jarak_hyothyoroid') !== '' ? safe_post('aas_jarak_hyothyoroid') : NULL,
        'aas_ket_jarak_hyothyoroid' => safe_post('aas_ket_jarak_hyothyoroid') !== '' ? safe_post('aas_ket_jarak_hyothyoroid') : NULL,
        'leher' => safe_post('aas_leher_anestesi') !== '' ? safe_post('aas_leher_anestesi') : NULL,
        'gerak_leher' => safe_post('aas_gerak_leher_anestesi') !== '' ? safe_post('aas_gerak_leher_anestesi') : NULL,
        'mallampathy' => safe_post('ass_mallamapathy') !== '' ? safe_post('ass_mallamapathy') : NULL,
        'obesitas' => safe_post('ass_obestitas_anestei') !== '' ? safe_post('ass_obestitas_anestei') : NULL,
        'massa' => safe_post('ass_massa_anestesi') !== '' ? safe_post('ass_massa_anestesi') : NULL,
        'gigi_palsu' => safe_post('ass_gigi_palsu_anestesi') !== '' ? safe_post('ass_gigi_palsu_anestesi') : NULL,
        'sulit_ventilasi' => safe_post('aas_sulit_ventilasi_anestesi') !== '' ? safe_post('aas_sulit_ventilasi_anestesi') : NULL,
        'pernafasan' => json_encode(array(
          'aas_asma' => safe_post('aas_asma'),
          'aas_batuk_produktif' => safe_post('aas_batuk_produktif'),
          'aas_bronchitis' => safe_post('aas_bronchitis'),
          'aas_ispa' => safe_post('aas_ispa'),
          'aas_dyspnea' => safe_post('aas_dyspnea'),
          'aas_ppok' => safe_post('aas_ppok'),
          'orthopnea_anestesi' => safe_post('orthopnea_anestesi'),
          'aas_tuberkulosis' => safe_post('aas_tuberkulosis'),
          'aas_pneumonia' => safe_post('aas_pneumonia'),
          'aas_efusi_pleura' => safe_post('aas_efusi_pleura'),

        )),
        'kardiovaskular' => json_encode(array(
          'aas_angina' => safe_post('aas_angina'),
          'aas_ht' => safe_post('aas_ht'),
          'aas_pancamaker' => safe_post('aas_pancamaker'),
          'aas_pjk' => safe_post('aas_pjk'),
          'aas_disritmia' => safe_post('aas_disritmia'),
          'aas_pjr' => safe_post('aas_pjr'),
          'aas_limitasi_aktivitas' => safe_post('aas_limitasi_aktivitas'),
          'aas_chd' => safe_post('aas_chd'),
          'aas_jantung_katup' => safe_post('aas_jantung_katup'),
          'aas_murmur' => safe_post('aas_murmur'),

        )),
        'neuro_maskuloskeletal' => json_encode(array(
          'aas_kelemahan_otot' => safe_post('aas_kelemahan_otot'),
          'aas_stroke' => safe_post('aas_stroke'),
          'aas_keluhan_punggung' => safe_post('aas_keluhan_punggung'),
          'aas_kejang' => safe_post('aas_kejang'),
          'aas_nyeri_kepala' => safe_post('aas_nyeri_kepala'),
          'aas_epilepsi' => safe_post('aas_epilepsi'),
          'aas_penurunan_kesadaran' => safe_post('aas_penurunan_kesadaran'),
          'aas_sop' => safe_post('aas_sop'),

        )),
        'renal_endokrin' => json_encode(array(
          'aas_dm' => safe_post('aas_dm'),
          'aas_peny_thiroid' => safe_post('aas_peny_thiroid'),
          'aas_penyakit_gigi' => safe_post('aas_penyakit_gigi'),
          'aas_penyakit_lain' => safe_post('aas_penyakit_lain'),


        )),
        'hepato' => json_encode(array(
          'aas_obstruksi_usus' => safe_post('aas_obstruksi_usus'),
          'aas_sirosis' => safe_post('aas_sirosis'),
          'aas_heptitis' => safe_post('aas_heptitis'),
          'aas_tukak_peptik' => safe_post('aas_tukak_peptik'),
          'aas_refluks' => safe_post('aas_refluks'),
          'aas_mual' => safe_post('aas_mual'),


        )),
        'lain_lain' => json_encode(array(
          'aas_hemofilia' => safe_post('aas_hemofilia'),
          'aas_anemia' => safe_post('aas_anemia'),
          'aas_bleeding_tendencies' => safe_post('aas_bleeding_tendencies'),
          'aas_hamil' => safe_post('aas_hamil'),
          'aas_antikoagula' => safe_post('aas_antikoagula'),
          'aas_kanker' => safe_post('aas_kanker'),
          'aas_riwayat_transfusi' => safe_post('aas_riwayat_transfusi'),
          'aas_geriatri' => safe_post('aas_geriatri'),
          'aas_imunosupresan' => safe_post('aas_imunosupresan'),
          'aas_dehidrasi' => safe_post('aas_dehidrasi'),
          'aas_neonatus' => safe_post('aas_neonatus'),

        )),
        'hematologi_hb' => safe_post('aas_hb') !== '' ? safe_post('aas_hb') : NULL,
        'hematologi_hct' => safe_post('aas_hct') !== '' ? safe_post('aas_hct') : NULL,
        'hematologi_leukosit' => safe_post('aas_leukosit') !== '' ? safe_post('aas_leukosit') : NULL,
        'hematologi_trombosit' => safe_post('aas_trombosit') !== '' ? safe_post('aas_trombosit') : NULL,
        'hematologi_ppt' => safe_post('aas_ppt') !== '' ? safe_post('aas_ppt') : NULL,
        'hematologi_appt' => safe_post('aas_appt') !== '' ? safe_post('aas_appt') : NULL,
        'elektrolit_na' => safe_post('aas_na') !== '' ? safe_post('aas_na') : NULL,
        'elektrolit_k' => safe_post('aas_k') !== '' ? safe_post('aas_k') : NULL,
        'elektrolit_ca' => safe_post('aas_ca') !== '' ? safe_post('aas_ca') : NULL,
        'elektrolit_cl' => safe_post('aas_cl') !== '' ? safe_post('aas_cl') : NULL,
        'fungsi_ginjal_ureum' => safe_post('aas_ureum') !== '' ? safe_post('aas_ureum') : NULL,
        'fungsi_ginjal_creatinin' => safe_post('aas_creatin') !== '' ? safe_post('aas_creatin') : NULL,
        'endokorin_gda' => safe_post('aas_gda') !== '' ? safe_post('aas_gda') : NULL,
        'endokorin_gdp' => safe_post('aas_gdp') !== '' ? safe_post('aas_gdp') : NULL,
        'endokorin_gdjampp' => safe_post('aas_gdajampp') !== '' ? safe_post('aas_gdajampp') : NULL,
        'endokorin_ttiga' => safe_post('aas_t3') !== '' ? safe_post('aas_t3') : NULL,
        'endokorin_tempat' => safe_post('aas_t4') !== '' ? safe_post('aas_t4') : NULL,
        'endokorin_tshs' => safe_post('aas_tshs') !== '' ? safe_post('aas_tshs') : NULL,
        'agd_ph' => safe_post('aas_ph') !== '' ? safe_post('aas_ph') : NULL,
        'agd_pcodua' => safe_post('aas_pco2') !== '' ? safe_post('aas_pco2') : NULL,
        'agd_podua' => safe_post('aas_po2') !== '' ? safe_post('aas_po2') : NULL,
        'agd_be' => safe_post('aas_be') !== '' ? safe_post('aas_be') : NULL,
        'agd_spodua' => safe_post('aas_spo2') !== '' ? safe_post('aas_spo2') : NULL,
        'penunjang_ekg' => safe_post('aas_ekg') !== '' ? safe_post('aas_ekg') : NULL,
        'penunjang_xray' => safe_post('aas_xray') !== '' ? safe_post('aas_xray') : NULL,
        'penunjang_echocardiograph' => safe_post('aas_echocardiograph') !== '' ? safe_post('aas_echocardiograph') : NULL,
        'penunjang_faal_paru' => safe_post('aas_faal_paru') !== '' ? safe_post('aas_faal_paru') : NULL,
        'penunjang_lain' => safe_post('aas_lain_lain') !== '' ? safe_post('aas_lain_lain') : NULL,
        'tas_sedasi' => safe_post('aas_sedasi') !== '' ? safe_post('aas_sedasi') : NULL,
        'tas_ga' => safe_post('aas_ga') !== '' ? safe_post('aas_ga') : NULL,
        'tas_regional' => safe_post('regional') !== '' ? safe_post('regional') : NULL,
        'tas_teknik_khusus' => safe_post('teknik_khusus') !== '' ? safe_post('teknik_khusus') : NULL,
        'tas_teknik_khusus_lain' => safe_post('tk_lainnya') !== '' ? safe_post('tk_lainnya') : NULL,
        'tas_monitoring' => safe_post('monitoring') !== '' ? safe_post('monitoring') : NULL,
        'tas_monitoring_lain' => safe_post('monitoring_lain_lain') !== '' ? safe_post('monitoring_lain_lain') : NULL,
        'tas_alat_khusus' => safe_post('alat_khusus') !== '' ? safe_post('alat_khusus') : NULL,
        'tas_alat_khusus_lain' => safe_post('alat_khusus_lain') !== '' ? safe_post('alat_khusus_lain') : NULL,
        'tas_perawatan_anestesi' => safe_post('perawatan_pasca_anestesi') !== '' ? safe_post('perawatan_pasca_anestesi') : NULL,
        'tas_perawatan_anestesi_lain' => safe_post('perawatan_pasca_anestesi_lain') !== '' ? safe_post('perawatan_pasca_anestesi_lain') : NULL,
        'ps_asa' => safe_post('aas_ps_asa') !== '' ? safe_post('aas_ps_asa') : NULL,
        'penyulit' => safe_post('penyulit') !== '' ? safe_post('penyulit') : NULL,
        'puasa' => safe_post('puasa') !== '' ? safe_post('puasa') : NULL,
        'premedikal' => safe_post('premedikal') !== '' ? safe_post('premedikal') : NULL,
        'catatan_pra_anestesi' => safe_post('aas_catatan') !== '' ? safe_post('aas_catatan') : NULL,
        'tanggal_waktu' => $this->datetime,
        'id_perawat_medis' => safe_post('pemeriksa_asesmen_anestesi') !== '' ? safe_post('pemeriksa_asesmen_anestesi') : NULL,
        'verifikasi_pemeriksa' => safe_post('aas_pemeriksa') !== '' ? safe_post('aas_pemeriksa') : NULL,
      );
      $this->db->where('id_layanan_pendaftaran', $id);
      $this->db->update('sm_assesment_anestesi_sedasi', $assesmen_anestesi_sedasi);
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

  public function simpan_transfer_pasien_intra_post()
  {
    $this->db->trans_begin();
    $layanan = array('id' => safe_post('id_layanan_pendaftaran'));
    $id_transfer = safe_post('id_transfer');

    // transfer pasien

    if ($id_transfer !== '') {
      $transfer_pasien_intra_rumah_sakit = array(
        'id_layanan_pendaftaran'                    => $layanan['id'],
        'tpi_tanggal_masuk'                         => safe_post('tpi_tanggal_masuk') !== '' ? datetime2mysql(safe_post('tpi_tanggal_masuk')) : NULL,
        'tpi_tanggal_pindah'                        => safe_post('tpi_tanggal_pindah') !== '' ? datetime2mysql(safe_post('tpi_tanggal_pindah')) : NULL,
        'tpi_ruang_asal'                            => safe_post('tpi_ruang_asal') !== '' ? safe_post('tpi_ruang_asal') : NULL,
        'tpi_ruang_tujuan'                          => safe_post('tpi_ruang_tujuan') !== '' ? safe_post('tpi_ruang_tujuan') : NULL,
        'tpi_diagnosis_utama'                       => safe_post('tpi_diagnosis_utama') !== '' ? safe_post('tpi_diagnosis_utama') : NULL,
        'tpi_diagnosis_sekunder'                    => safe_post('tpi_diagnosis_sekunder') !== '' ? safe_post('tpi_diagnosis_sekunder') : NULL,
        'tpi_dpjp'                                  => safe_post('tpi_dpjp') !== '' ? safe_post('tpi_dpjp') : NULL,
        'tpi_kewaspadaan'                           => safe_post('tpi_kewaspadaan') !== '' ? safe_post('tpi_kewaspadaan') : NULL,
        'tpi_riwayat_kewaspadan'                    => safe_post('tpi_riwayat_kewaspadan') !== '' ? safe_post('tpi_riwayat_kewaspadan') : NULL,
        'tpi_indikasi_masuk_rs'                     => safe_post('tpi_indikasi_masuk_rs') !== '' ? safe_post('tpi_indikasi_masuk_rs') : NULL,
        'tpi_riwayat_kesehatan'                     => safe_post('tpi_riwayat_kesehatan') !== '' ? safe_post('tpi_riwayat_kesehatan') : NULL,

        // PEMERIKSAAN FISIK DAN TANDA-TANDA VITAL
        'tpi_pf_composmentis'                       => safe_post('tpi_pf_composmentis') !== '' ? safe_post('tpi_pf_composmentis') : NULL,
        'tpi_pf_apatis'                             => safe_post('tpi_pf_apatis') !== '' ? safe_post('tpi_pf_apatis') : NULL,
        'tpi_pf_samnolen'                           => safe_post('tpi_pf_samnolen') !== '' ? safe_post('tpi_pf_samnolen') : NULL,
        'tpi_pf_sopor'                              => safe_post('tpi_pf_sopor') !== '' ? safe_post('tpi_pf_sopor') : NULL,
        'tpi_pf_koma'                               => safe_post('tpi_pf_koma') !== '' ? safe_post('tpi_pf_koma') : NULL,
        'tpi_pf_gcs_e'                              => safe_post('tpi_pf_gcs_e') !== '' ? safe_post('tpi_pf_gcs_e') : NULL,
        'tpi_pf_gcs_m'                              => safe_post('tpi_pf_gcs_m') !== '' ? safe_post('tpi_pf_gcs_m') : NULL,
        'tpi_pf_gcs_v'                              => safe_post('tpi_pf_gcs_v') !== '' ? safe_post('tpi_pf_gcs_v') : NULL,
        'tpi_pf_gcs_total'                          => safe_post('tpi_pf_gcs_total') !== '' ? safe_post('tpi_pf_gcs_total') : NULL,
        'tpi_pf_afgar_score'                        => safe_post('tpi_pf_afgar_score') !== '' ? safe_post('tpi_pf_afgar_score') : NULL,
        'tpi_pf_djj'                                => safe_post('tpi_pf_djj') !== '' ? safe_post('tpi_pf_djj') : NULL,
        'tpi_pf_pupil_1'                            => safe_post('tpi_pf_pupil_1') !== '' ? safe_post('tpi_pf_pupil_1') : NULL,
        'tpi_pf_pupil_2'                            => safe_post('tpi_pf_pupil_2') !== '' ? safe_post('tpi_pf_pupil_2') : NULL,
        'tpi_pf_pupil_3'                            => safe_post('tpi_pf_pupil_3') !== '' ? safe_post('tpi_pf_pupil_3') : NULL,
        'tpi_pf_pupil_4'                            => safe_post('tpi_pf_pupil_4') !== '' ? safe_post('tpi_pf_pupil_4') : NULL,
        'tpi_pf_cdl'                                => safe_post('tpi_pf_cdl') !== '' ? safe_post('tpi_pf_cdl') : NULL,
        'tpi_pf_tanggal_cdl'                        => safe_post('tpi_pf_tanggal_cdl') !== '' ? date2mysql(safe_post('tpi_pf_tanggal_cdl')) : NULL,
        'tpi_pf_tensi_sis'                          => safe_post('tpi_pf_tensi_sis') !== '' ? safe_post('tpi_pf_tensi_sis') : NULL,
        'tpi_pf_tensi_dis'                          => safe_post('tpi_pf_tensi_dis') !== '' ? safe_post('tpi_pf_tensi_dis') : NULL,
        'tpi_pf_suhu'                               => safe_post('tpi_pf_suhu') !== '' ? safe_post('tpi_pf_suhu') : NULL,
        'tpi_pf_nadi'                               => safe_post('tpi_pf_nadi') !== '' ? safe_post('tpi_pf_nadi') : NULL,
        'tpi_pf_nafas'                              => safe_post('tpi_pf_nafas') !== '' ? safe_post('tpi_pf_nafas') : NULL,
        'tpi_pf_alergi'                             => safe_post('tpi_pf_alergi') !== '' ? safe_post('tpi_pf_alergi') : NULL,
        'tpi_pf_riwayat_alergi'                     => safe_post('tpi_pf_riwayat_alergi') !== '' ? safe_post('tpi_pf_riwayat_alergi') : NULL,
        'tpi_pf_skala_nyeri_pasien'                 => safe_post('tpi_pf_skala_nyeri_pasien') !== '' ? safe_post('tpi_pf_skala_nyeri_pasien') : NULL,
        'tpi_pf_riwayat_nyeri_pasien'               => safe_post('tpi_pf_riwayat_nyeri_pasien') !== '' ? safe_post('tpi_pf_riwayat_nyeri_pasien') : NULL,
        'tpi_pf_resiko_jatuh_pasien'                => safe_post('tpi_pf_resiko_jatuh_pasien') !== '' ? safe_post('tpi_pf_resiko_jatuh_pasien') : NULL,
        'tpi_pf_riwayat_resiko_jatuh_pasien'        => safe_post('tpi_pf_riwayat_resiko_jatuh_pasien') !== '' ? safe_post('tpi_pf_riwayat_resiko_jatuh_pasien') : NULL,
        'tpi_pf_mobilisasi_pasien'                  => safe_post('tpi_pf_mobilisasi_pasien') !== '' ? safe_post('tpi_pf_mobilisasi_pasien') : NULL,
        'tpi_pf_mobilisasi_pasien_transfer'         => safe_post('tpi_pf_mobilisasi_pasien_transfer') !== '' ? safe_post('tpi_pf_mobilisasi_pasien_transfer') : NULL,
        'tpi_pf_resiko_dekubitus_pasien'            => safe_post('tpi_pf_resiko_dekubitus_pasien') !== '' ? safe_post('tpi_pf_resiko_dekubitus_pasien') : NULL,
        'tpi_pf_riwayat_resiko_dekubitus_pasien'    => safe_post('tpi_pf_riwayat_resiko_dekubitus_pasien') !== '' ? safe_post('tpi_pf_riwayat_resiko_dekubitus_pasien') : NULL,
        'tpi_pf_infus'                              => safe_post('tpi_pf_infus') !== '' ? safe_post('tpi_pf_infus') : NULL,
        'tpi_pf_tanggal_infus'                      => safe_post('tpi_pf_tanggal_infus') !== '' ? date2mysql(safe_post('tpi_pf_tanggal_infus')) : NULL,
        'tpi_pf_ngt_pasien'                         => safe_post('tpi_pf_ngt_pasien') !== '' ? safe_post('tpi_pf_ngt_pasien') : NULL,
        'tpi_pf_tanggal_ngt'                        => safe_post('tpi_pf_tanggal_ngt') !== '' ? date2mysql(safe_post('tpi_pf_tanggal_ngt')) : NULL,
        'tpi_pf_ett'                                => safe_post('tpi_pf_ett') !== '' ? safe_post('tpi_pf_ett') : NULL,
        'tpi_pf_tanggal_ett'                        => safe_post('tpi_pf_tanggal_ett') !== '' ? date2mysql(safe_post('tpi_pf_tanggal_ett')) : NULL,
        'tpi_pf_cvc'                                => safe_post('tpi_pf_cvc') !== '' ? safe_post('tpi_pf_cvc') : NULL,
        'tpi_pf_tanggal_cvc'                        => safe_post('tpi_pf_tanggal_cvc') !== '' ? date2mysql(safe_post('tpi_pf_tanggal_cvc')) : NULL,
        'tpi_pf_dc'                                 => safe_post('tpi_pf_dc') !== '' ? safe_post('tpi_pf_dc') : NULL,
        'tpi_pf_tanggal_dc'                         => safe_post('tpi_pf_tanggal_dc') !== '' ? date2mysql(safe_post('tpi_pf_tanggal_dc')) : NULL,
        'tpi_pf_lain'                               => safe_post('tpi_pf_lain') !== '' ? safe_post('tpi_pf_lain') : NULL,
        'tpi_pf_tanggal_lain'                       => safe_post('tpi_pf_tanggal_lain') !== '' ? date2mysql(safe_post('tpi_pf_tanggal_lain')) : NULL,
        'tpi_pf_oksigen'                            => safe_post('tpi_pf_oksigen') !== '' ? safe_post('tpi_pf_oksigen') : NULL,
        'tpi_pf_keterangan_oksigen'                 => safe_post('tpi_pf_keterangan_oksigen') !== '' ? safe_post('tpi_pf_keterangan_oksigen') : NULL,
        'tpi_pf_pump'                               => safe_post('tpi_pf_pump') !== '' ? safe_post('tpi_pf_pump') : NULL,
        'tpi_pf_bidai'                              => safe_post('tpi_pf_bidai') !== '' ? safe_post('tpi_pf_bidai') : NULL,

        // PEMBERIAN THERAPHY
        'tpi_pt_infus'                              => safe_post('tpi_pt_infus') !== '' ? safe_post('tpi_pt_infus') : NULL,
        'tpi_pt_obat'                               => safe_post('tpi_pt_obat') !== '' ? safe_post('tpi_pt_obat') : NULL,

        // PEMERIKSAAN PENUNJANG
        'tpi_pp_labolatorium'                       => safe_post('tpi_pp_labolatorium') !== '' ? safe_post('tpi_pp_labolatorium') : NULL,
        'tpi_pp_ket_labolatorium'                   => safe_post('tpi_pp_ket_labolatorium') !== '' ? safe_post('tpi_pp_ket_labolatorium') : NULL,
        'tpi_pp_radiologi'                          => safe_post('tpi_pp_radiologi') !== '' ? safe_post('tpi_pp_radiologi') : NULL,
        'tpi_pp_ket_radiologi'                      => safe_post('tpi_pp_ket_radiologi') !== '' ? safe_post('tpi_pp_ket_radiologi') : NULL,
        'tpi_pp_lainnya'                            => safe_post('tpi_pp_lainnya') !== '' ? safe_post('tpi_pp_lainnya') : NULL,
        'tpi_pp_ket_lainnya'                        => safe_post('tpi_pp_ket_lainnya') !== '' ? safe_post('tpi_pp_ket_lainnya') : NULL,

        // TINDAKAN MEDIS YANG SUDAH DILAKUKAN
        'tpi_tm_tindakan_medis'                     => safe_post('tpi_tm_tindakan_medis') !== '' ? safe_post('tpi_tm_tindakan_medis') : NULL,

        // RENCANA TINDAKAN YANG AKAN DILAKUKAN
        'tpi_tm_rencana_tindakan'                   => safe_post('tpi_tm_rencana_tindakan') !== '' ? safe_post('tpi_tm_rencana_tindakan') : NULL,

        // KONDISI PASIEN
        'tpi_kp_sebelum_composmentis'               => safe_post('tpi_kp_sebelum_composmentis') !== '' ? safe_post('tpi_kp_sebelum_composmentis') : NULL,
        'tpi_kp_sebelum_apatis'                     => safe_post('tpi_kp_sebelum_apatis') !== '' ? safe_post('tpi_kp_sebelum_apatis') : NULL,
        'tpi_kp_sebelum_samnolen'                   => safe_post('tpi_kp_sebelum_samnolen') !== '' ? safe_post('tpi_kp_sebelum_samnolen') : NULL,
        'tpi_kp_sebelum_sopor'                      => safe_post('tpi_kp_sebelum_sopor') !== '' ? safe_post('tpi_kp_sebelum_sopor') : NULL,
        'tpi_kp_sebelum_koma'                       => safe_post('tpi_kp_sebelum_koma') !== '' ? safe_post('tpi_kp_sebelum_koma') : NULL,
        'tpi_kp_sebelum_gcs_e'                      => safe_post('tpi_kp_sebelum_gcs_e') !== '' ? safe_post('tpi_kp_sebelum_gcs_e') : NULL,
        'tpi_kp_sebelum_gcs_m'                      => safe_post('tpi_kp_sebelum_gcs_m') !== '' ? safe_post('tpi_kp_sebelum_gcs_m') : NULL,
        'tpi_kp_sebelum_gcs_v'                      => safe_post('tpi_kp_sebelum_gcs_v') !== '' ? safe_post('tpi_kp_sebelum_gcs_v') : NULL,
        'tpi_kp_sebelum_gcs_total'                  => safe_post('tpi_kp_sebelum_gcs_total') !== '' ? safe_post('tpi_kp_sebelum_gcs_total') : NULL,
        'tpi_kp_sebelum_catatan'                    => safe_post('tpi_kp_sebelum_catatan') !== '' ? safe_post('tpi_kp_sebelum_catatan') : NULL,
        'tpi_kp_perjalanan_masalah_selama_trasnfer' => safe_post('tpi_kp_perjalanan_masalah_selama_trasnfer') !== '' ? safe_post('tpi_kp_perjalanan_masalah_selama_trasnfer') : NULL,
        'tpi_kp_perjalanan_penanganan_masalah'      => safe_post('tpi_kp_perjalanan_penanganan_masalah') !== '' ? safe_post('tpi_kp_perjalanan_penanganan_masalah') : NULL,
        'tpi_kp_sudah_composmentis'                 => safe_post('tpi_kp_sudah_composmentis') !== '' ? safe_post('tpi_kp_sudah_composmentis') : NULL,
        'tpi_kp_sudah_apatis'                       => safe_post('tpi_kp_sudah_apatis') !== '' ? safe_post('tpi_kp_sudah_apatis') : NULL,
        'tpi_kp_sudah_samnolen'                     => safe_post('tpi_kp_sudah_samnolen') !== '' ? safe_post('tpi_kp_sudah_samnolen') : NULL,
        'tpi_kp_sudah_sopor'                        => safe_post('tpi_kp_sudah_sopor') !== '' ? safe_post('tpi_kp_sudah_sopor') : NULL,
        'tpi_kp_sudah_koma'                         => safe_post('tpi_kp_sudah_koma') !== '' ? safe_post('tpi_kp_sudah_koma') : NULL,
        'tpi_kp_sudah_gcs_e'                        => safe_post('tpi_kp_sudah_gcs_e') !== '' ? safe_post('tpi_kp_sudah_gcs_e') : NULL,
        'tpi_kp_sudah_gcs_m'                        => safe_post('tpi_kp_sudah_gcs_m') !== '' ? safe_post('tpi_kp_sudah_gcs_m') : NULL,
        'tpi_kp_sudah_gcs_v'                        => safe_post('tpi_kp_sudah_gcs_v') !== '' ? safe_post('tpi_kp_sudah_gcs_v') : NULL,
        'tpi_kp_sudah_gcs_total'                    => safe_post('tpi_kp_sudah_gcs_total') !== '' ? safe_post('tpi_kp_sudah_gcs_total') : NULL,
        'tpi_kp_sudah_tensi_sis'                    => safe_post('tpi_kp_sudah_tensi_sis') !== '' ? safe_post('tpi_kp_sudah_tensi_sis') : NULL,
        'tpi_kp_sudah_tensi_dis'                    => safe_post('tpi_kp_sudah_tensi_dis') !== '' ? safe_post('tpi_kp_sudah_tensi_dis') : NULL,
        'tpi_kp_sudah_nadi'                         => safe_post('tpi_kp_sudah_nadi') !== '' ? safe_post('tpi_kp_sudah_nadi') : NULL,
        'tpi_kp_sudah_pernafasan'                   => safe_post('tpi_kp_sudah_pernafasan') !== '' ? safe_post('tpi_kp_sudah_pernafasan') : NULL,
        'tpi_kp_sudah_suhu'                         => safe_post('tpi_kp_sudah_suhu') !== '' ? safe_post('tpi_kp_sudah_suhu') : NULL,
        'tpi_kp_sudah_kondisi_pasien'               => safe_post('tpi_kp_sudah_kondisi_pasien') !== '' ? safe_post('tpi_kp_sudah_kondisi_pasien') : NULL,
        'tpi_kp_sudah_nama_obat'                    => safe_post('tpi_kp_sudah_nama_obat') !== '' ? safe_post('tpi_kp_sudah_nama_obat') : NULL,
        'tpi_kp_sudah_ket_nama_obat'                => safe_post('tpi_kp_sudah_ket_nama_obat') !== '' ? safe_post('tpi_kp_sudah_ket_nama_obat') : NULL,
        'tpi_kp_sudah_pemeriksaan_penunjang'        => safe_post('tpi_kp_sudah_pemeriksaan_penunjang') !== '' ? safe_post('tpi_kp_sudah_pemeriksaan_penunjang') : NULL,
        'tpi_kp_sudah_ket_pemeriksaan_penunjang'    => safe_post('tpi_kp_sudah_ket_pemeriksaan_penunjang') !== '' ? safe_post('tpi_kp_sudah_ket_pemeriksaan_penunjang') : NULL,
        'tpi_kp_sudah_catatan_penting'              => safe_post('tpi_kp_sudah_catatan_penting') !== '' ? safe_post('tpi_kp_sudah_catatan_penting') : NULL,
        'tpi_kp_waktu_ttd_petugas_tf'               => safe_post('tpi_kp_waktu_ttd_petugas_tf') !== '' ? datetime2mysql(safe_post('tpi_kp_waktu_ttd_petugas_tf')) : NULL,
        'tpi_kp_waktu_ttd_petugas_penerima'         => safe_post('tpi_kp_waktu_ttd_petugas_penerima') !== '' ? datetime2mysql(safe_post('tpi_kp_waktu_ttd_petugas_penerima')) : NULL,
        'tpi_kp_petugas_tansfer'                    => safe_post('tpi_kp_petugas_tansfer') !== '' ? safe_post('tpi_kp_petugas_tansfer') : NULL,
        'tpi_kp_petugas_terima_transfer'            => safe_post('tpi_kp_petugas_terima_transfer') !== '' ? safe_post('tpi_kp_petugas_terima_transfer') : NULL,
        'tpi_kp_ttd_petugas_transfer'               => safe_post('tpi_kp_ttd_petugas_transfer') !== '' ? safe_post('tpi_kp_ttd_petugas_transfer') : NULL,
        'tpi_kp_ttd_petugas_terima_transfer'        => safe_post('tpi_kp_ttd_petugas_terima_transfer') !== '' ? safe_post('tpi_kp_ttd_petugas_terima_transfer') : NULL,

        // KONDISI PASIEN SESUDAH TINDAKAN
        'tpi_st_sebelum_composmentis'               => safe_post('tpi_st_sebelum_composmentis') !== '' ? safe_post('tpi_st_sebelum_composmentis') : NULL,
        'tpi_st_sebelum_apatis'                     => safe_post('tpi_st_sebelum_apatis') !== '' ? safe_post('tpi_st_sebelum_apatis') : NULL,
        'tpi_st_sebelum_samnolen'                   => safe_post('tpi_st_sebelum_samnolen') !== '' ? safe_post('tpi_st_sebelum_samnolen') : NULL,
        'tpi_st_sebelum_sopor'                      => safe_post('tpi_st_sebelum_sopor') !== '' ? safe_post('tpi_st_sebelum_sopor') : NULL,
        'tpi_st_sebelum_koma'                       => safe_post('tpi_st_sebelum_koma') !== '' ? safe_post('tpi_st_sebelum_koma') : NULL,
        'tpi_st_sebelum_gcs_e'                      => safe_post('tpi_st_sebelum_gcs_e') !== '' ? safe_post('tpi_st_sebelum_gcs_e') : NULL,
        'tpi_st_sebelum_gcs_m'                      => safe_post('tpi_st_sebelum_gcs_m') !== '' ? safe_post('tpi_st_sebelum_gcs_m') : NULL,
        'tpi_st_sebelum_gcs_v'                      => safe_post('tpi_st_sebelum_gcs_v') !== '' ? safe_post('tpi_st_sebelum_gcs_v') : NULL,
        'tpi_st_sebelum_gcs_total'                  => safe_post('tpi_st_sebelum_gcs_total') !== '' ? safe_post('tpi_st_sebelum_gcs_total') : NULL,
        'tpi_st_sebelum_tensi_sis'                    => safe_post('tpi_st_sebelum_tensi_sis') !== '' ? safe_post('tpi_st_sebelum_tensi_sis') : NULL,
        'tpi_st_sebelum_tensi_dis'                    => safe_post('tpi_st_sebelum_tensi_dis') !== '' ? safe_post('tpi_st_sebelum_tensi_dis') : NULL,
        'tpi_st_sebelum_nadi'                         => safe_post('tpi_st_sebelum_nadi') !== '' ? safe_post('tpi_st_sebelum_nadi') : NULL,
        'tpi_st_sebelum_pernafasan'                   => safe_post('tpi_st_sebelum_pernafasan') !== '' ? safe_post('tpi_st_sebelum_pernafasan') : NULL,
        'tpi_st_sebelum_suhu'                         => safe_post('tpi_st_sebelum_suhu') !== '' ? safe_post('tpi_st_sebelum_suhu') : NULL,
        'tpi_st_sebelum_catatan'                    => safe_post('tpi_st_sebelum_catatan') !== '' ? safe_post('tpi_st_sebelum_catatan') : NULL,
        'tpi_st_perjalanan_masalah_selama_transfer' => safe_post('tpi_st_perjalanan_masalah_selama_transfer') !== '' ? safe_post('tpi_st_perjalanan_masalah_selama_transfer') : NULL,
        'tpi_st_perjalanan_penanganan_masalah'      => safe_post('tpi_st_perjalanan_penanganan_masalah') !== '' ? safe_post('tpi_st_perjalanan_penanganan_masalah') : NULL,
        'tpi_st_sudah_composmentis'                 => safe_post('tpi_st_sudah_composmentis') !== '' ? safe_post('tpi_st_sudah_composmentis') : NULL,
        'tpi_st_sudah_apatis'                       => safe_post('tpi_st_sudah_apatis') !== '' ? safe_post('tpi_st_sudah_apatis') : NULL,
        'tpi_st_sudah_samnolen'                     => safe_post('tpi_st_sudah_samnolen') !== '' ? safe_post('tpi_st_sudah_samnolen') : NULL,
        'tpi_st_sudah_sopor'                        => safe_post('tpi_st_sudah_sopor') !== '' ? safe_post('tpi_st_sudah_sopor') : NULL,
        'tpi_st_sudah_koma'                         => safe_post('tpi_st_sudah_koma') !== '' ? safe_post('tpi_st_sudah_koma') : NULL,
        'tpi_st_sudah_gcs_e'                        => safe_post('tpi_st_sudah_gcs_e') !== '' ? safe_post('tpi_st_sudah_gcs_e') : NULL,
        'tpi_st_sudah_gcs_m'                        => safe_post('tpi_st_sudah_gcs_m') !== '' ? safe_post('tpi_st_sudah_gcs_m') : NULL,
        'tpi_st_sudah_gcs_v'                        => safe_post('tpi_st_sudah_gcs_v') !== '' ? safe_post('tpi_st_sudah_gcs_v') : NULL,
        'tpi_st_sudah_gcs_total'                    => safe_post('tpi_st_sudah_gcs_total') !== '' ? safe_post('tpi_st_sudah_gcs_total') : NULL,
        'tpi_st_sudah_tensi_sis'                    => safe_post('tpi_st_sudah_tensi_sis') !== '' ? safe_post('tpi_st_sudah_tensi_sis') : NULL,
        'tpi_st_sudah_tensi_dis'                    => safe_post('tpi_st_sudah_tensi_dis') !== '' ? safe_post('tpi_st_sudah_tensi_dis') : NULL,
        'tpi_st_sudah_nadi'                         => safe_post('tpi_st_sudah_nadi') !== '' ? safe_post('tpi_st_sudah_nadi') : NULL,
        'tpi_st_sudah_pernafasan'                   => safe_post('tpi_st_sudah_pernafasan') !== '' ? safe_post('tpi_st_sudah_pernafasan') : NULL,
        'tpi_st_sudah_suhu'                         => safe_post('tpi_st_sudah_suhu') !== '' ? safe_post('tpi_st_sudah_suhu') : NULL,
        'tpi_st_sudah_kondisi_pasien'               => safe_post('tpi_st_sudah_kondisi_pasien') !== '' ? safe_post('tpi_st_sudah_kondisi_pasien') : NULL,
        'tpi_st_sudah_nama_obat'                    => safe_post('tpi_st_sudah_nama_obat') !== '' ? safe_post('tpi_st_sudah_nama_obat') : NULL,
        'tpi_st_sudah_ket_nama_obat'                => safe_post('tpi_st_sudah_ket_nama_obat') !== '' ? safe_post('tpi_st_sudah_ket_nama_obat') : NULL,
        'tpi_st_sudah_pemeriksaan_penunjang'        => safe_post('tpi_st_sudah_pemeriksaan_penunjang') !== '' ? safe_post('tpi_st_sudah_pemeriksaan_penunjang') : NULL,
        'tpi_st_sudah_ket_pemeriksaan_penunjang'    => safe_post('tpi_st_sudah_ket_pemeriksaan_penunjang') !== '' ? safe_post('tpi_st_sudah_ket_pemeriksaan_penunjang') : NULL,
        'tpi_st_sudah_catatan_penting'              => safe_post('tpi_st_sudah_catatan_penting') !== '' ? safe_post('tpi_st_sudah_catatan_penting') : NULL,
        'tpi_st_waktu_ttd_petugas_tf'               => safe_post('tpi_st_waktu_ttd_petugas_tf') !== '' ? datetime2mysql(safe_post('tpi_st_waktu_ttd_petugas_tf')) : NULL,
        'tpi_st_waktu_ttd_petugas_penerima'         => safe_post('tpi_st_waktu_ttd_petugas_penerima') !== '' ? datetime2mysql(safe_post('tpi_st_waktu_ttd_petugas_penerima')) : NULL,
        'tpi_st_petugas_tansfer'                    => safe_post('tpi_st_petugas_tansfer') !== '' ? safe_post('tpi_st_petugas_tansfer') : NULL,
        'tpi_st_petugas_terima_transfer'            => safe_post('tpi_st_petugas_terima_transfer') !== '' ? safe_post('tpi_st_petugas_terima_transfer') : NULL,
        'tpi_st_ttd_petugas_transfer'               => safe_post('tpi_st_ttd_petugas_transfer') !== '' ? safe_post('tpi_st_ttd_petugas_transfer') : NULL,
        'tpi_st_ttd_petugas_terima_transfer'        => safe_post('tpi_st_ttd_petugas_terima_transfer') !== '' ? safe_post('tpi_st_ttd_petugas_terima_transfer') : NULL,

      );
      $filtered_array = array_filter($transfer_pasien_intra_rumah_sakit);
      $this->db->where('id', $id_transfer);
      $this->db->update('sm_transfer_pasien_intra', $filtered_array);
    } else {
      $transfer_pasien_intra_rumah_sakit = array(
        'id_layanan_pendaftaran'                    => $layanan['id'],
        'tpi_tanggal_masuk'                         => safe_post('tpi_tanggal_masuk') !== '' ? datetime2mysql(safe_post('tpi_tanggal_masuk')) : NULL,
        'tpi_tanggal_pindah'                        => safe_post('tpi_tanggal_pindah') !== '' ? datetime2mysql(safe_post('tpi_tanggal_pindah')) : NULL,
        'tpi_ruang_asal'                            => safe_post('tpi_ruang_asal') !== '' ? safe_post('tpi_ruang_asal') : NULL,
        'tpi_ruang_tujuan'                          => safe_post('tpi_ruang_tujuan') !== '' ? safe_post('tpi_ruang_tujuan') : NULL,
        'tpi_diagnosis_utama'                       => safe_post('tpi_diagnosis_utama') !== '' ? safe_post('tpi_diagnosis_utama') : NULL,
        'tpi_diagnosis_sekunder'                    => safe_post('tpi_diagnosis_sekunder') !== '' ? safe_post('tpi_diagnosis_sekunder') : NULL,
        'tpi_dpjp'                                  => safe_post('tpi_dpjp') !== '' ? safe_post('tpi_dpjp') : NULL,
        'tpi_kewaspadaan'                           => safe_post('tpi_kewaspadaan') !== '' ? safe_post('tpi_kewaspadaan') : NULL,
        'tpi_riwayat_kewaspadan'                    => safe_post('tpi_riwayat_kewaspadan') !== '' ? safe_post('tpi_riwayat_kewaspadan') : NULL,
        'tpi_indikasi_masuk_rs'                     => safe_post('tpi_indikasi_masuk_rs') !== '' ? safe_post('tpi_indikasi_masuk_rs') : NULL,
        'tpi_riwayat_kesehatan'                     => safe_post('tpi_riwayat_kesehatan') !== '' ? safe_post('tpi_riwayat_kesehatan') : NULL,

        // PEMERIKSAAN FISIK DAN TANDA-TANDA VITAL
        'tpi_pf_composmentis'                       => safe_post('tpi_pf_composmentis') !== '' ? safe_post('tpi_pf_composmentis') : NULL,
        'tpi_pf_apatis'                             => safe_post('tpi_pf_apatis') !== '' ? safe_post('tpi_pf_apatis') : NULL,
        'tpi_pf_samnolen'                           => safe_post('tpi_pf_samnolen') !== '' ? safe_post('tpi_pf_samnolen') : NULL,
        'tpi_pf_sopor'                              => safe_post('tpi_pf_sopor') !== '' ? safe_post('tpi_pf_sopor') : NULL,
        'tpi_pf_koma'                               => safe_post('tpi_pf_koma') !== '' ? safe_post('tpi_pf_koma') : NULL,
        'tpi_pf_gcs_e'                              => safe_post('tpi_pf_gcs_e') !== '' ? safe_post('tpi_pf_gcs_e') : NULL,
        'tpi_pf_gcs_m'                              => safe_post('tpi_pf_gcs_m') !== '' ? safe_post('tpi_pf_gcs_m') : NULL,
        'tpi_pf_gcs_v'                              => safe_post('tpi_pf_gcs_v') !== '' ? safe_post('tpi_pf_gcs_v') : NULL,
        'tpi_pf_gcs_total'                          => safe_post('tpi_pf_gcs_total') !== '' ? safe_post('tpi_pf_gcs_total') : NULL,
        'tpi_pf_afgar_score'                        => safe_post('tpi_pf_afgar_score') !== '' ? safe_post('tpi_pf_afgar_score') : NULL,
        'tpi_pf_djj'                                => safe_post('tpi_pf_djj') !== '' ? safe_post('tpi_pf_djj') : NULL,
        'tpi_pf_pupil_1'                            => safe_post('tpi_pf_pupil_1') !== '' ? safe_post('tpi_pf_pupil_1') : NULL,
        'tpi_pf_pupil_2'                            => safe_post('tpi_pf_pupil_2') !== '' ? safe_post('tpi_pf_pupil_2') : NULL,
        'tpi_pf_pupil_3'                            => safe_post('tpi_pf_pupil_3') !== '' ? safe_post('tpi_pf_pupil_3') : NULL,
        'tpi_pf_pupil_4'                            => safe_post('tpi_pf_pupil_4') !== '' ? safe_post('tpi_pf_pupil_4') : NULL,
        'tpi_pf_cdl'                                => safe_post('tpi_pf_cdl') !== '' ? safe_post('tpi_pf_cdl') : NULL,
        'tpi_pf_tanggal_cdl'                        => safe_post('tpi_pf_tanggal_cdl') !== '' ? date2mysql(safe_post('tpi_pf_tanggal_cdl')) : NULL,
        'tpi_pf_tensi_sis'                          => safe_post('tpi_pf_tensi_sis') !== '' ? safe_post('tpi_pf_tensi_sis') : NULL,
        'tpi_pf_tensi_dis'                          => safe_post('tpi_pf_tensi_dis') !== '' ? safe_post('tpi_pf_tensi_dis') : NULL,
        'tpi_pf_suhu'                               => safe_post('tpi_pf_suhu') !== '' ? safe_post('tpi_pf_suhu') : NULL,
        'tpi_pf_nadi'                               => safe_post('tpi_pf_nadi') !== '' ? safe_post('tpi_pf_nadi') : NULL,
        'tpi_pf_nafas'                              => safe_post('tpi_pf_nafas') !== '' ? safe_post('tpi_pf_nafas') : NULL,
        'tpi_pf_alergi'                             => safe_post('tpi_pf_alergi') !== '' ? safe_post('tpi_pf_alergi') : NULL,
        'tpi_pf_riwayat_alergi'                     => safe_post('tpi_pf_riwayat_alergi') !== '' ? safe_post('tpi_pf_riwayat_alergi') : NULL,
        'tpi_pf_skala_nyeri_pasien'                 => safe_post('tpi_pf_skala_nyeri_pasien') !== '' ? safe_post('tpi_pf_skala_nyeri_pasien') : NULL,
        'tpi_pf_riwayat_nyeri_pasien'               => safe_post('tpi_pf_riwayat_nyeri_pasien') !== '' ? safe_post('tpi_pf_riwayat_nyeri_pasien') : NULL,
        'tpi_pf_resiko_jatuh_pasien'                => safe_post('tpi_pf_resiko_jatuh_pasien') !== '' ? safe_post('tpi_pf_resiko_jatuh_pasien') : NULL,
        'tpi_pf_riwayat_resiko_jatuh_pasien'        => safe_post('tpi_pf_riwayat_resiko_jatuh_pasien') !== '' ? safe_post('tpi_pf_riwayat_resiko_jatuh_pasien') : NULL,
        'tpi_pf_mobilisasi_pasien'                  => safe_post('tpi_pf_mobilisasi_pasien') !== '' ? safe_post('tpi_pf_mobilisasi_pasien') : NULL,
        'tpi_pf_mobilisasi_pasien_transfer'         => safe_post('tpi_pf_mobilisasi_pasien_transfer') !== '' ? safe_post('tpi_pf_mobilisasi_pasien_transfer') : NULL,
        'tpi_pf_resiko_dekubitus_pasien'            => safe_post('tpi_pf_resiko_dekubitus_pasien') !== '' ? safe_post('tpi_pf_resiko_dekubitus_pasien') : NULL,
        'tpi_pf_riwayat_resiko_dekubitus_pasien'    => safe_post('tpi_pf_riwayat_resiko_dekubitus_pasien') !== '' ? safe_post('tpi_pf_riwayat_resiko_dekubitus_pasien') : NULL,
        'tpi_pf_infus'                              => safe_post('tpi_pf_infus') !== '' ? safe_post('tpi_pf_infus') : NULL,
        'tpi_pf_tanggal_infus'                      => safe_post('tpi_pf_tanggal_infus') !== '' ? date2mysql(safe_post('tpi_pf_tanggal_infus')) : NULL,
        'tpi_pf_ngt_pasien'                         => safe_post('tpi_pf_ngt_pasien') !== '' ? safe_post('tpi_pf_ngt_pasien') : NULL,
        'tpi_pf_tanggal_ngt'                        => safe_post('tpi_pf_tanggal_ngt') !== '' ? date2mysql(safe_post('tpi_pf_tanggal_ngt')) : NULL,
        'tpi_pf_ett'                                => safe_post('tpi_pf_ett') !== '' ? safe_post('tpi_pf_ett') : NULL,
        'tpi_pf_tanggal_ett'                        => safe_post('tpi_pf_tanggal_ett') !== '' ? date2mysql(safe_post('tpi_pf_tanggal_ett')) : NULL,
        'tpi_pf_cvc'                                => safe_post('tpi_pf_cvc') !== '' ? safe_post('tpi_pf_cvc') : NULL,
        'tpi_pf_tanggal_cvc'                        => safe_post('tpi_pf_tanggal_cvc') !== '' ? date2mysql(safe_post('tpi_pf_tanggal_cvc')) : NULL,
        'tpi_pf_dc'                                 => safe_post('tpi_pf_dc') !== '' ? safe_post('tpi_pf_dc') : NULL,
        'tpi_pf_tanggal_dc'                         => safe_post('tpi_pf_tanggal_dc') !== '' ? date2mysql(safe_post('tpi_pf_tanggal_dc')) : NULL,
        'tpi_pf_lain'                               => safe_post('tpi_pf_lain') !== '' ? safe_post('tpi_pf_lain') : NULL,
        'tpi_pf_tanggal_lain'                       => safe_post('tpi_pf_tanggal_lain') !== '' ? date2mysql(safe_post('tpi_pf_tanggal_lain')) : NULL,
        'tpi_pf_oksigen'                            => safe_post('tpi_pf_oksigen') !== '' ? safe_post('tpi_pf_oksigen') : NULL,
        'tpi_pf_keterangan_oksigen'                 => safe_post('tpi_pf_keterangan_oksigen') !== '' ? safe_post('tpi_pf_keterangan_oksigen') : NULL,
        'tpi_pf_pump'                               => safe_post('tpi_pf_pump') !== '' ? safe_post('tpi_pf_pump') : NULL,
        'tpi_pf_bidai'                              => safe_post('tpi_pf_bidai') !== '' ? safe_post('tpi_pf_bidai') : NULL,

        // PEMBERIAN THERAPHY
        'tpi_pt_infus'                              => safe_post('tpi_pt_infus') !== '' ? safe_post('tpi_pt_infus') : NULL,
        'tpi_pt_obat'                               => safe_post('tpi_pt_obat') !== '' ? safe_post('tpi_pt_obat') : NULL,

        // PEMERIKSAAN PENUNJANG
        'tpi_pp_labolatorium'                       => safe_post('tpi_pp_labolatorium') !== '' ? safe_post('tpi_pp_labolatorium') : NULL,
        'tpi_pp_ket_labolatorium'                   => safe_post('tpi_pp_ket_labolatorium') !== '' ? safe_post('tpi_pp_ket_labolatorium') : NULL,
        'tpi_pp_radiologi'                          => safe_post('tpi_pp_radiologi') !== '' ? safe_post('tpi_pp_radiologi') : NULL,
        'tpi_pp_ket_radiologi'                      => safe_post('tpi_pp_ket_radiologi') !== '' ? safe_post('tpi_pp_ket_radiologi') : NULL,
        'tpi_pp_lainnya'                            => safe_post('tpi_pp_lainnya') !== '' ? safe_post('tpi_pp_lainnya') : NULL,
        'tpi_pp_ket_lainnya'                        => safe_post('tpi_pp_ket_lainnya') !== '' ? safe_post('tpi_pp_ket_lainnya') : NULL,

        // TINDAKAN MEDIS YANG SUDAH DILAKUKAN
        'tpi_tm_tindakan_medis'                     => safe_post('tpi_tm_tindakan_medis') !== '' ? safe_post('tpi_tm_tindakan_medis') : NULL,

        // RENCANA TINDAKAN YANG AKAN DILAKUKAN
        'tpi_tm_rencana_tindakan'                   => safe_post('tpi_tm_rencana_tindakan') !== '' ? safe_post('tpi_tm_rencana_tindakan') : NULL,

        // KONDISI PASIEN
        'tpi_kp_sebelum_composmentis'               => safe_post('tpi_kp_sebelum_composmentis') !== '' ? safe_post('tpi_kp_sebelum_composmentis') : NULL,
        'tpi_kp_sebelum_apatis'                     => safe_post('tpi_kp_sebelum_apatis') !== '' ? safe_post('tpi_kp_sebelum_apatis') : NULL,
        'tpi_kp_sebelum_samnolen'                   => safe_post('tpi_kp_sebelum_samnolen') !== '' ? safe_post('tpi_kp_sebelum_samnolen') : NULL,
        'tpi_kp_sebelum_sopor'                      => safe_post('tpi_kp_sebelum_sopor') !== '' ? safe_post('tpi_kp_sebelum_sopor') : NULL,
        'tpi_kp_sebelum_koma'                       => safe_post('tpi_kp_sebelum_koma') !== '' ? safe_post('tpi_kp_sebelum_koma') : NULL,
        'tpi_kp_sebelum_gcs_e'                      => safe_post('tpi_kp_sebelum_gcs_e') !== '' ? safe_post('tpi_kp_sebelum_gcs_e') : NULL,
        'tpi_kp_sebelum_gcs_m'                      => safe_post('tpi_kp_sebelum_gcs_m') !== '' ? safe_post('tpi_kp_sebelum_gcs_m') : NULL,
        'tpi_kp_sebelum_gcs_v'                      => safe_post('tpi_kp_sebelum_gcs_v') !== '' ? safe_post('tpi_kp_sebelum_gcs_v') : NULL,
        'tpi_kp_sebelum_gcs_total'                  => safe_post('tpi_kp_sebelum_gcs_total') !== '' ? safe_post('tpi_kp_sebelum_gcs_total') : NULL,
        'tpi_kp_sebelum_catatan'                    => safe_post('tpi_kp_sebelum_catatan') !== '' ? safe_post('tpi_kp_sebelum_catatan') : NULL,
        'tpi_kp_perjalanan_masalah_selama_trasnfer' => safe_post('tpi_kp_perjalanan_masalah_selama_trasnfer') !== '' ? safe_post('tpi_kp_perjalanan_masalah_selama_trasnfer') : NULL,
        'tpi_kp_perjalanan_penanganan_masalah'      => safe_post('tpi_kp_perjalanan_penanganan_masalah') !== '' ? safe_post('tpi_kp_perjalanan_penanganan_masalah') : NULL,
        'tpi_kp_sudah_composmentis'                 => safe_post('tpi_kp_sudah_composmentis') !== '' ? safe_post('tpi_kp_sudah_composmentis') : NULL,
        'tpi_kp_sudah_apatis'                       => safe_post('tpi_kp_sudah_apatis') !== '' ? safe_post('tpi_kp_sudah_apatis') : NULL,
        'tpi_kp_sudah_samnolen'                     => safe_post('tpi_kp_sudah_samnolen') !== '' ? safe_post('tpi_kp_sudah_samnolen') : NULL,
        'tpi_kp_sudah_sopor'                        => safe_post('tpi_kp_sudah_sopor') !== '' ? safe_post('tpi_kp_sudah_sopor') : NULL,
        'tpi_kp_sudah_koma'                         => safe_post('tpi_kp_sudah_koma') !== '' ? safe_post('tpi_kp_sudah_koma') : NULL,
        'tpi_kp_sudah_gcs_e'                        => safe_post('tpi_kp_sudah_gcs_e') !== '' ? safe_post('tpi_kp_sudah_gcs_e') : NULL,
        'tpi_kp_sudah_gcs_m'                        => safe_post('tpi_kp_sudah_gcs_m') !== '' ? safe_post('tpi_kp_sudah_gcs_m') : NULL,
        'tpi_kp_sudah_gcs_v'                        => safe_post('tpi_kp_sudah_gcs_v') !== '' ? safe_post('tpi_kp_sudah_gcs_v') : NULL,
        'tpi_kp_sudah_gcs_total'                    => safe_post('tpi_kp_sudah_gcs_total') !== '' ? safe_post('tpi_kp_sudah_gcs_total') : NULL,
        'tpi_kp_sudah_tensi_sis'                    => safe_post('tpi_kp_sudah_tensi_sis') !== '' ? safe_post('tpi_kp_sudah_tensi_sis') : NULL,
        'tpi_kp_sudah_tensi_dis'                    => safe_post('tpi_kp_sudah_tensi_dis') !== '' ? safe_post('tpi_kp_sudah_tensi_dis') : NULL,
        'tpi_kp_sudah_nadi'                         => safe_post('tpi_kp_sudah_nadi') !== '' ? safe_post('tpi_kp_sudah_nadi') : NULL,
        'tpi_kp_sudah_pernafasan'                   => safe_post('tpi_kp_sudah_pernafasan') !== '' ? safe_post('tpi_kp_sudah_pernafasan') : NULL,
        'tpi_kp_sudah_suhu'                         => safe_post('tpi_kp_sudah_suhu') !== '' ? safe_post('tpi_kp_sudah_suhu') : NULL,
        'tpi_kp_sudah_kondisi_pasien'               => safe_post('tpi_kp_sudah_kondisi_pasien') !== '' ? safe_post('tpi_kp_sudah_kondisi_pasien') : NULL,
        'tpi_kp_sudah_nama_obat'                    => safe_post('tpi_kp_sudah_nama_obat') !== '' ? safe_post('tpi_kp_sudah_nama_obat') : NULL,
        'tpi_kp_sudah_ket_nama_obat'                => safe_post('tpi_kp_sudah_ket_nama_obat') !== '' ? safe_post('tpi_kp_sudah_ket_nama_obat') : NULL,
        'tpi_kp_sudah_pemeriksaan_penunjang'        => safe_post('tpi_kp_sudah_pemeriksaan_penunjang') !== '' ? safe_post('tpi_kp_sudah_pemeriksaan_penunjang') : NULL,
        'tpi_kp_sudah_ket_pemeriksaan_penunjang'    => safe_post('tpi_kp_sudah_ket_pemeriksaan_penunjang') !== '' ? safe_post('tpi_kp_sudah_ket_pemeriksaan_penunjang') : NULL,
        'tpi_kp_sudah_catatan_penting'              => safe_post('tpi_kp_sudah_catatan_penting') !== '' ? safe_post('tpi_kp_sudah_catatan_penting') : NULL,
        'tpi_kp_waktu_ttd_petugas_tf'               => safe_post('tpi_kp_waktu_ttd_petugas_tf') !== '' ? datetime2mysql(safe_post('tpi_kp_waktu_ttd_petugas_tf')) : NULL,
        'tpi_kp_waktu_ttd_petugas_penerima'         => safe_post('tpi_kp_waktu_ttd_petugas_penerima') !== '' ? datetime2mysql(safe_post('tpi_kp_waktu_ttd_petugas_penerima')) : NULL,
        'tpi_kp_petugas_tansfer'                    => safe_post('tpi_kp_petugas_tansfer') !== '' ? safe_post('tpi_kp_petugas_tansfer') : NULL,
        'tpi_kp_petugas_terima_transfer'            => safe_post('tpi_kp_petugas_terima_transfer') !== '' ? safe_post('tpi_kp_petugas_terima_transfer') : NULL,
        'tpi_kp_ttd_petugas_transfer'               => safe_post('tpi_kp_ttd_petugas_transfer') !== '' ? safe_post('tpi_kp_ttd_petugas_transfer') : NULL,
        'tpi_kp_ttd_petugas_terima_transfer'        => safe_post('tpi_kp_ttd_petugas_terima_transfer') !== '' ? safe_post('tpi_kp_ttd_petugas_terima_transfer') : NULL,

        // KONDISI PASIEN SESUDAH TINDAKAN
        'tpi_st_sebelum_composmentis'               => safe_post('tpi_st_sebelum_composmentis') !== '' ? safe_post('tpi_st_sebelum_composmentis') : NULL,
        'tpi_st_sebelum_apatis'                     => safe_post('tpi_st_sebelum_apatis') !== '' ? safe_post('tpi_st_sebelum_apatis') : NULL,
        'tpi_st_sebelum_samnolen'                   => safe_post('tpi_st_sebelum_samnolen') !== '' ? safe_post('tpi_st_sebelum_samnolen') : NULL,
        'tpi_st_sebelum_sopor'                      => safe_post('tpi_st_sebelum_sopor') !== '' ? safe_post('tpi_st_sebelum_sopor') : NULL,
        'tpi_st_sebelum_koma'                       => safe_post('tpi_st_sebelum_koma') !== '' ? safe_post('tpi_st_sebelum_koma') : NULL,
        'tpi_st_sebelum_gcs_e'                      => safe_post('tpi_st_sebelum_gcs_e') !== '' ? safe_post('tpi_st_sebelum_gcs_e') : NULL,
        'tpi_st_sebelum_gcs_m'                      => safe_post('tpi_st_sebelum_gcs_m') !== '' ? safe_post('tpi_st_sebelum_gcs_m') : NULL,
        'tpi_st_sebelum_gcs_v'                      => safe_post('tpi_st_sebelum_gcs_v') !== '' ? safe_post('tpi_st_sebelum_gcs_v') : NULL,
        'tpi_st_sebelum_gcs_total'                  => safe_post('tpi_st_sebelum_gcs_total') !== '' ? safe_post('tpi_st_sebelum_gcs_total') : NULL,
        'tpi_st_sebelum_tensi_sis'                    => safe_post('tpi_st_sebelum_tensi_sis') !== '' ? safe_post('tpi_st_sebelum_tensi_sis') : NULL,
        'tpi_st_sebelum_tensi_dis'                    => safe_post('tpi_st_sebelum_tensi_dis') !== '' ? safe_post('tpi_st_sebelum_tensi_dis') : NULL,
        'tpi_st_sebelum_nadi'                         => safe_post('tpi_st_sebelum_nadi') !== '' ? safe_post('tpi_st_sebelum_nadi') : NULL,
        'tpi_st_sebelum_pernafasan'                   => safe_post('tpi_st_sebelum_pernafasan') !== '' ? safe_post('tpi_st_sebelum_pernafasan') : NULL,
        'tpi_st_sebelum_suhu'                         => safe_post('tpi_st_sebelum_suhu') !== '' ? safe_post('tpi_st_sebelum_suhu') : NULL,
        'tpi_st_sebelum_catatan'                    => safe_post('tpi_st_sebelum_catatan') !== '' ? safe_post('tpi_st_sebelum_catatan') : NULL,
        'tpi_st_perjalanan_masalah_selama_transfer' => safe_post('tpi_st_perjalanan_masalah_selama_transfer') !== '' ? safe_post('tpi_st_perjalanan_masalah_selama_transfer') : NULL,
        'tpi_st_perjalanan_penanganan_masalah'      => safe_post('tpi_st_perjalanan_penanganan_masalah') !== '' ? safe_post('tpi_st_perjalanan_penanganan_masalah') : NULL,
        'tpi_st_sudah_composmentis'                 => safe_post('tpi_st_sudah_composmentis') !== '' ? safe_post('tpi_st_sudah_composmentis') : NULL,
        'tpi_st_sudah_apatis'                       => safe_post('tpi_st_sudah_apatis') !== '' ? safe_post('tpi_st_sudah_apatis') : NULL,
        'tpi_st_sudah_samnolen'                     => safe_post('tpi_st_sudah_samnolen') !== '' ? safe_post('tpi_st_sudah_samnolen') : NULL,
        'tpi_st_sudah_sopor'                        => safe_post('tpi_st_sudah_sopor') !== '' ? safe_post('tpi_st_sudah_sopor') : NULL,
        'tpi_st_sudah_koma'                         => safe_post('tpi_st_sudah_koma') !== '' ? safe_post('tpi_st_sudah_koma') : NULL,
        'tpi_st_sudah_gcs_e'                        => safe_post('tpi_st_sudah_gcs_e') !== '' ? safe_post('tpi_st_sudah_gcs_e') : NULL,
        'tpi_st_sudah_gcs_m'                        => safe_post('tpi_st_sudah_gcs_m') !== '' ? safe_post('tpi_st_sudah_gcs_m') : NULL,
        'tpi_st_sudah_gcs_v'                        => safe_post('tpi_st_sudah_gcs_v') !== '' ? safe_post('tpi_st_sudah_gcs_v') : NULL,
        'tpi_st_sudah_gcs_total'                    => safe_post('tpi_st_sudah_gcs_total') !== '' ? safe_post('tpi_st_sudah_gcs_total') : NULL,
        'tpi_st_sudah_tensi_sis'                    => safe_post('tpi_st_sudah_tensi_sis') !== '' ? safe_post('tpi_st_sudah_tensi_sis') : NULL,
        'tpi_st_sudah_tensi_dis'                    => safe_post('tpi_st_sudah_tensi_dis') !== '' ? safe_post('tpi_st_sudah_tensi_dis') : NULL,
        'tpi_st_sudah_nadi'                         => safe_post('tpi_st_sudah_nadi') !== '' ? safe_post('tpi_st_sudah_nadi') : NULL,
        'tpi_st_sudah_pernafasan'                   => safe_post('tpi_st_sudah_pernafasan') !== '' ? safe_post('tpi_st_sudah_pernafasan') : NULL,
        'tpi_st_sudah_suhu'                         => safe_post('tpi_st_sudah_suhu') !== '' ? safe_post('tpi_st_sudah_suhu') : NULL,
        'tpi_st_sudah_kondisi_pasien'               => safe_post('tpi_st_sudah_kondisi_pasien') !== '' ? safe_post('tpi_st_sudah_kondisi_pasien') : NULL,
        'tpi_st_sudah_nama_obat'                    => safe_post('tpi_st_sudah_nama_obat') !== '' ? safe_post('tpi_st_sudah_nama_obat') : NULL,
        'tpi_st_sudah_ket_nama_obat'                => safe_post('tpi_st_sudah_ket_nama_obat') !== '' ? safe_post('tpi_st_sudah_ket_nama_obat') : NULL,
        'tpi_st_sudah_pemeriksaan_penunjang'        => safe_post('tpi_st_sudah_pemeriksaan_penunjang') !== '' ? safe_post('tpi_st_sudah_pemeriksaan_penunjang') : NULL,
        'tpi_st_sudah_ket_pemeriksaan_penunjang'    => safe_post('tpi_st_sudah_ket_pemeriksaan_penunjang') !== '' ? safe_post('tpi_st_sudah_ket_pemeriksaan_penunjang') : NULL,
        'tpi_st_sudah_catatan_penting'              => safe_post('tpi_st_sudah_catatan_penting') !== '' ? safe_post('tpi_st_sudah_catatan_penting') : NULL,
        'tpi_st_waktu_ttd_petugas_tf'               => safe_post('tpi_st_waktu_ttd_petugas_tf') !== '' ? datetime2mysql(safe_post('tpi_st_waktu_ttd_petugas_tf')) : NULL,
        'tpi_st_waktu_ttd_petugas_penerima'         => safe_post('tpi_st_waktu_ttd_petugas_penerima') !== '' ? datetime2mysql(safe_post('tpi_st_waktu_ttd_petugas_penerima')) : NULL,
        'tpi_st_petugas_tansfer'                    => safe_post('tpi_st_petugas_tansfer') !== '' ? safe_post('tpi_st_petugas_tansfer') : NULL,
        'tpi_st_petugas_terima_transfer'            => safe_post('tpi_st_petugas_terima_transfer') !== '' ? safe_post('tpi_st_petugas_terima_transfer') : NULL,
        'tpi_st_ttd_petugas_transfer'               => safe_post('tpi_st_ttd_petugas_transfer') !== '' ? safe_post('tpi_st_ttd_petugas_transfer') : NULL,
        'tpi_st_ttd_petugas_terima_transfer'        => safe_post('tpi_st_ttd_petugas_terima_transfer') !== '' ? safe_post('tpi_st_ttd_petugas_terima_transfer') : NULL,

      );
      $this->db->insert('sm_transfer_pasien_intra', $transfer_pasien_intra_rumah_sakit);
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

  public function simpan_resiko_jatuh_dewasa_post()
  {
    $layanan = array('id' => safe_post('id_layanan_pendaftaran'));

    $ek_tanggal_penerima = safe_post('ek_tanggal_verifikasi_penerima');
    $ek_tanggal_perawat = safe_post('ek_tanggal_ttd_perawat');
    $ek_tanggal_dokter = safe_post('ek_tanggal_verifikasi_dokter');

    $tanggal_selesai = safe_post('sirs_tanggal_selesai');
    $si_tanggal_mulai = safe_post('sirs_tanggal_mulai');
    $waktu_pslp_petugas = safe_post('plsp_tanggal_ttd_petugas');

    $cekTanggal = $this->cekDate('6', '', 'Tanggal Mulai pada A. Tempat di Rawat', $si_tanggal_mulai);

    if ($cekTanggal === false) {
      return false;
      exit();
    }

    $cekTanggalSelesai = $this->cekDate('6', '', 'Tanggal Selesai pada A. Tempat di Rawat', $tanggal_selesai);
    if ($cekTanggalSelesai === false) {
      return false;
      exit();
    }

    $cekTanggalPerawat = $this->cekDateTime('0', '#data-kontrol-kembali', 'Tanggal dan Jam Perawat yang merawat', $ek_tanggal_perawat);
    if ($cekTanggalPerawat === false) {
      return false;
      exit();
    }

    $cekTanggalDokter = $this->cekDateTime('0', '#data-kontrol-kembali', 'Tanggal dan Jam Dokter yang merawat', $ek_tanggal_dokter);
    if ($cekTanggalDokter === false) {
      return false;
      exit();
    }

    $cekTanggalPenerima = $this->cekDateTime('0', '#data-kontrol-kembali', 'Tanggal dan Jam Penerima', $ek_tanggal_penerima);
    if ($cekTanggalPenerima === false) {
      return false;
      exit();
    }

    $cekWaktuPSLPPetugas = $this->cekDateTime('5', '', 'Tanggal dan Jam Petugas Pengkajian Lanjutan Spiritual Pasien', $waktu_pslp_petugas);
    if ($cekWaktuPSLPPetugas === false) {
      return false;
      exit();
    }

    $this->db->trans_begin();

    $rk_id_layanan = array('id' => safe_post('rk_id_layanan_pendaftaran'));
    $id_rk = array('id' => safe_post('id_rk'));
    $id = $layanan['id'];

    // start pengkajian dewasa
    $tanggal_pengkajian = safe_post('tanggal_pengkajian');

    if ($tanggal_pengkajian) {

      $tanggal_pengkajian_dibuat = safe_post('tanggal_pengkajian');

      $ek_tanggal_pengkajian_dibuat = is_string($tanggal_pengkajian_dibuat);

      if ($tanggal_pengkajian_dibuat === "" || $tanggal_pengkajian_dibuat === null) {

        $tanggal_pengkajian_ulang = null;
      } else if (!is_array($tanggal_pengkajian_dibuat)) {

        $tanggal_pengkajian_ulang = null;
      } else if (empty($tanggal_pengkajian_dibuat)) {

        $tanggal_pengkajian_ulang = null;
      } else if ($ek_tanggal_pengkajian_dibuat === true) {

        $tanggal_pengkajian_ulang = null;
      } else {

        foreach ($tanggal_pengkajian_dibuat as $key => $value) {

          $var1 = explode("/", $value);
          $var2 = "$var1[2]-$var1[1]-$var1[0]";

          $date = new DateTime($var2);
          $new = $date->format('Y-m-d');

          $tanggal_pengkajian_ulang[$key] = $new;
        }
      }

      $pengkajian_date = safe_post('pengkajian_date');

      $ek_pengkajian_date = is_string($pengkajian_date);

      if ($pengkajian_date === "" || $pengkajian_date === null) {

        $date_pengkajian = null;
      } else if (!is_array($pengkajian_date)) {

        $date_pengkajian = null;
      } else if (empty($pengkajian_date)) {

        $date_pengkajian = null;
      } else if ($ek_pengkajian_date === true) {

        $date_pengkajian = null;
      } else {

        foreach ($pengkajian_date as $key => $value) {

          $date = new DateTime($value);
          $new = $date->format('Y-m-d H:i:s');

          $date_pengkajian[$key] = $new;
        }
      }


      $pengkajian_ulang = array(
        'id_layanan_pendaftaran' => $layanan['id'],
        'id_pendaftaran'         => safe_post('id_pendaftaran'),
        'tanggal_pengkajian' => $tanggal_pengkajian_ulang,
        'jumlah_skor' => safe_post('jumlah_skor') !== '' ? safe_post('jumlah_skor') : NULL,
        'riwayat_jatuh' => safe_post('riwayat_jatuh') !== '' ? safe_post('riwayat_jatuh') : NULL,
        'diagnosis_sekunder' => safe_post('diagnosis_sekunder') !== '' ? safe_post('diagnosis_sekunder') : NULL,
        'alat_bantu_dua' => safe_post('alat_bantu_dua') !== '' ? safe_post('alat_bantu_dua') : NULL,
        'infus' => safe_post('infus') !== '' ? safe_post('infus') : NULL,
        'cara_berjalan' => safe_post('cara_berjalan') !== '' ? safe_post('cara_berjalan') : NULL,
        'status_mental' => safe_post('status_mental') !== '' ? safe_post('status_mental') : NULL,
        'users' => safe_post('user_pengkajian') !== '' ? safe_post('user_pengkajian') : NULL,
        'date_created' => $date_pengkajian,
        'perawat_purjpd'   => safe_post('perawat_purjpd') !== '' ? safe_post('perawat_purjpd') : NULL,

      );

      $this->m_pelayanan->updatePengkajianUlang($pengkajian_ulang);
    }

    $uprjpd_tanggal_pengkajian = safe_post('uprjpd_tanggal_pengkajian');
    $id_pendaftaran = safe_post('id_pendaftaran');

    if (!empty($uprjpd_tanggal_pengkajian)) {
      $uprjpd_data = array(
        'id_pendaftaran' => $id_pendaftaran,
        'id_layanan_pendaftaran' => $layanan['id'],
        'id_perawat_p' => safe_post('uprjpd_perawat_p') !== '' ? safe_post('uprjpd_perawat_p') : null,
        'id_perawat_s' => safe_post('uprjpd_perawat_s') !== '' ? safe_post('uprjpd_perawat_s') : null,
        'id_perawat_m' => safe_post('uprjpd_perawat_m') !== '' ? safe_post('uprjpd_perawat_m') : null,
        'id_user' => safe_post('user_uprjpd') !== '' ? safe_post('user_uprjpd') : null,
        'tanggal_pengkajian' => safe_post('uprjpd_tanggal_pengkajian'),

        // Bel berfungsi dan mudah dijangkau
        'bel_p_ho' => safe_post('uprjpd_bel_p_ho') !== '' ? safe_post('uprjpd_bel_p_ho') : null,
        'bel_p_10' => safe_post('uprjpd_bel_p_10') !== '' ? safe_post('uprjpd_bel_p_10') : null,
        'bel_s_ho' => safe_post('uprjpd_bel_s_ho') !== '' ? safe_post('uprjpd_bel_s_ho') : null,
        'bel_s_18' => safe_post('uprjpd_bel_s_18') !== '' ? safe_post('uprjpd_bel_s_18') : null,
        'bel_m_ho' => safe_post('uprjpd_bel_m_ho') !== '' ? safe_post('uprjpd_bel_m_ho') : null,
        'bel_m_23' => safe_post('uprjpd_bel_m_23') !== '' ? safe_post('uprjpd_bel_m_23') : null,
        'bel_m_4' => safe_post('uprjpd_bel_m_4') !== '' ? safe_post('uprjpd_bel_m_4') : null,

        // Roda tempat tidur terkunci
        'roda_p_ho' => safe_post('uprjpd_roda_p_ho') !== '' ? safe_post('uprjpd_roda_p_ho') : null,
        'roda_p_10' => safe_post('uprjpd_roda_p_10') !== '' ? safe_post('uprjpd_roda_p_10') : null,
        'roda_s_ho' => safe_post('uprjpd_roda_s_ho') !== '' ? safe_post('uprjpd_roda_s_ho') : null,
        'roda_s_18' => safe_post('uprjpd_roda_s_18') !== '' ? safe_post('uprjpd_roda_s_18') : null,
        'roda_m_ho' => safe_post('uprjpd_roda_m_ho') !== '' ? safe_post('uprjpd_roda_m_ho') : null,
        'roda_m_23' => safe_post('uprjpd_roda_m_23') !== '' ? safe_post('uprjpd_roda_m_23') : null,
        'roda_m_4' => safe_post('uprjpd_roda_m_4') !== '' ? safe_post('uprjpd_roda_m_4') : null,

        // Posisikan tempat tidur pada posisi terendah
        'ptt_p_ho' => safe_post('uprjpd_ptt_p_ho') !== '' ? safe_post('uprjpd_ptt_p_ho') : null,
        'ptt_p_10' => safe_post('uprjpd_ptt_p_10') !== '' ? safe_post('uprjpd_ptt_p_10') : null,
        'ptt_s_ho' => safe_post('uprjpd_ptt_s_ho') !== '' ? safe_post('uprjpd_ptt_s_ho') : null,
        'ptt_s_18' => safe_post('uprjpd_ptt_s_18') !== '' ? safe_post('uprjpd_ptt_s_18') : null,
        'ptt_m_ho' => safe_post('uprjpd_ptt_m_ho') !== '' ? safe_post('uprjpd_ptt_m_ho') : null,
        'ptt_m_23' => safe_post('uprjpd_ptt_m_23') !== '' ? safe_post('uprjpd_ptt_m_23') : null,
        'ptt_m_4' => safe_post('uprjpd_ptt_m_4') !== '' ? safe_post('uprjpd_ptt_m_4') : null,

        // Pagar pengaman tempat tidur dinaikan
        'ppt_p_ho' => safe_post('uprjpd_ppt_p_ho') !== '' ? safe_post('uprjpd_ppt_p_ho') : null,
        'ppt_p_10' => safe_post('uprjpd_ppt_p_10') !== '' ? safe_post('uprjpd_ppt_p_10') : null,
        'ppt_s_ho' => safe_post('uprjpd_ppt_s_ho') !== '' ? safe_post('uprjpd_ppt_s_ho') : null,
        'ppt_s_18' => safe_post('uprjpd_ppt_s_18') !== '' ? safe_post('uprjpd_ppt_s_18') : null,
        'ppt_m_ho' => safe_post('uprjpd_ppt_m_ho') !== '' ? safe_post('uprjpd_ppt_m_ho') : null,
        'ppt_m_23' => safe_post('uprjpd_ppt_m_23') !== '' ? safe_post('uprjpd_ppt_m_23') : null,
        'ppt_m_4' => safe_post('uprjpd_ppt_m_4') !== '' ? safe_post('uprjpd_ppt_m_4') : null,

        // Penerang cukup
        'penerangan_p_ho' => safe_post('uprjpd_penerangan_p_ho') !== '' ? safe_post('uprjpd_penerangan_p_ho') : null,
        'penerangan_p_10' => safe_post('uprjpd_penerangan_p_10') !== '' ? safe_post('uprjpd_penerangan_p_10') : null,
        'penerangan_s_ho' => safe_post('uprjpd_penerangan_s_ho') !== '' ? safe_post('uprjpd_penerangan_s_ho') : null,
        'penerangan_s_18' => safe_post('uprjpd_penerangan_s_18') !== '' ? safe_post('uprjpd_penerangan_s_18') : null,
        'penerangan_m_ho' => safe_post('uprjpd_penerangan_m_ho') !== '' ? safe_post('uprjpd_penerangan_m_ho') : null,
        'penerangan_m_23' => safe_post('uprjpd_penerangan_m_23') !== '' ? safe_post('uprjpd_penerangan_m_23') : null,
        'penerangan_m_4' => safe_post('uprjpd_penerangan_m_4') !== '' ? safe_post('uprjpd_penerangan_m_4') : null,

        // Pastikan alas kaki yang tidak licin untuk pasien yang dapat berjalan
        'alas_p_ho' => safe_post('uprjpd_alas_p_ho') !== '' ? safe_post('uprjpd_alas_p_ho') : null,
        'alas_p_10' => safe_post('uprjpd_alas_p_10') !== '' ? safe_post('uprjpd_alas_p_10') : null,
        'alas_s_ho' => safe_post('uprjpd_alas_s_ho') !== '' ? safe_post('uprjpd_alas_s_ho') : null,
        'alas_s_18' => safe_post('uprjpd_alas_s_18') !== '' ? safe_post('uprjpd_alas_s_18') : null,
        'alas_m_ho' => safe_post('uprjpd_alas_m_ho') !== '' ? safe_post('uprjpd_alas_m_ho') : null,
        'alas_m_23' => safe_post('uprjpd_alas_m_23') !== '' ? safe_post('uprjpd_alas_m_23') : null,
        'alas_m_4' => safe_post('uprjpd_alas_m_4') !== '' ? safe_post('uprjpd_alas_m_4') : null,

        // Lantai kering dan tidak licin
        'lantai_p_ho' => safe_post('uprjpd_lantai_p_ho') !== '' ? safe_post('uprjpd_lantai_p_ho') : null,
        'lantai_p_10' => safe_post('uprjpd_lantai_p_10') !== '' ? safe_post('uprjpd_lantai_p_10') : null,
        'lantai_s_ho' => safe_post('uprjpd_lantai_s_ho') !== '' ? safe_post('uprjpd_lantai_s_ho') : null,
        'lantai_s_18' => safe_post('uprjpd_lantai_s_18') !== '' ? safe_post('uprjpd_lantai_s_18') : null,
        'lantai_m_ho' => safe_post('uprjpd_lantai_m_ho') !== '' ? safe_post('uprjpd_lantai_m_ho') : null,
        'lantai_m_23' => safe_post('uprjpd_lantai_m_23') !== '' ? safe_post('uprjpd_lantai_m_23') : null,
        'lantai_m_4' => safe_post('uprjpd_lantai_m_4') !== '' ? safe_post('uprjpd_lantai_m_4') : null,

        // Dekatkan alat-alat pasien
        'alat_p_ho' => safe_post('uprjpd_alat_p_ho') !== '' ? safe_post('uprjpd_alat_p_ho') : null,
        'alat_p_10' => safe_post('uprjpd_alat_p_10') !== '' ? safe_post('uprjpd_alat_p_10') : null,
        'alat_s_ho' => safe_post('uprjpd_alat_s_ho') !== '' ? safe_post('uprjpd_alat_s_ho') : null,
        'alat_s_18' => safe_post('uprjpd_alat_s_18') !== '' ? safe_post('uprjpd_alat_s_18') : null,
        'alat_m_ho' => safe_post('uprjpd_alat_m_ho') !== '' ? safe_post('uprjpd_alat_m_ho') : null,
        'alat_m_23' => safe_post('uprjpd_alat_m_23') !== '' ? safe_post('uprjpd_alat_m_23') : null,
        'alat_m_4' => safe_post('uprjpd_alat_m_4') !== '' ? safe_post('uprjpd_alat_m_4') : null,

        // Edukasi pasien tentang efek samping obat yang diberikan
        'edukasi_p_ho' => safe_post('uprjpd_edukasi_p_ho') !== '' ? safe_post('uprjpd_edukasi_p_ho') : null,
        'edukasi_p_10' => safe_post('uprjpd_edukasi_p_10') !== '' ? safe_post('uprjpd_edukasi_p_10') : null,
        'edukasi_s_ho' => safe_post('uprjpd_edukasi_s_ho') !== '' ? safe_post('uprjpd_edukasi_s_ho') : null,
        'edukasi_s_18' => safe_post('uprjpd_edukasi_s_18') !== '' ? safe_post('uprjpd_edukasi_s_18') : null,
        'edukasi_m_ho' => safe_post('uprjpd_edukasi_m_ho') !== '' ? safe_post('uprjpd_edukasi_m_ho') : null,
        'edukasi_m_23' => safe_post('uprjpd_edukasi_m_23') !== '' ? safe_post('uprjpd_edukasi_m_23') : null,
        'edukasi_m_4' => safe_post('uprjpd_edukasi_m_4') !== '' ? safe_post('uprjpd_edukasi_m_4') : null,

        // Tidak meninggalkan pasien di kamar mandi saat menggunakan commode
        'commode_p_ho' => safe_post('uprjpd_commode_p_ho') !== '' ? safe_post('uprjpd_commode_p_ho') : null,
        'commode_p_10' => safe_post('uprjpd_commode_p_10') !== '' ? safe_post('uprjpd_commode_p_10') : null,
        'commode_s_ho' => safe_post('uprjpd_commode_s_ho') !== '' ? safe_post('uprjpd_commode_s_ho') : null,
        'commode_s_18' => safe_post('uprjpd_commode_s_18') !== '' ? safe_post('uprjpd_commode_s_18') : null,
        'commode_m_ho' => safe_post('uprjpd_commode_m_ho') !== '' ? safe_post('uprjpd_commode_m_ho') : null,
        'commode_m_23' => safe_post('uprjpd_commode_m_23') !== '' ? safe_post('uprjpd_commode_m_23') : null,
        'commode_m_4' => safe_post('uprjpd_commode_m_4') !== '' ? safe_post('uprjpd_commode_m_4') : null,

        // Pasang gelang khusus
        'gelang_p_ho' => safe_post('uprjpd_gelang_p_ho') !== '' ? safe_post('uprjpd_gelang_p_ho') : null,
        'gelang_p_10' => safe_post('uprjpd_gelang_p_10') !== '' ? safe_post('uprjpd_gelang_p_10') : null,
        'gelang_s_ho' => safe_post('uprjpd_gelang_s_ho') !== '' ? safe_post('uprjpd_gelang_s_ho') : null,
        'gelang_s_18' => safe_post('uprjpd_gelang_s_18') !== '' ? safe_post('uprjpd_gelang_s_18') : null,
        'gelang_m_ho' => safe_post('uprjpd_gelang_m_ho') !== '' ? safe_post('uprjpd_gelang_m_ho') : null,
        'gelang_m_23' => safe_post('uprjpd_gelang_m_23') !== '' ? safe_post('uprjpd_gelang_m_23') : null,
        'gelang_m_4' => safe_post('uprjpd_gelang_m_4') !== '' ? safe_post('uprjpd_gelang_m_4') : null,

        // Tempatkan pasien di kamar yang paling dekat dengan Nurse Station
        'station_p_ho' => safe_post('uprjpd_station_p_ho') !== '' ? safe_post('uprjpd_station_p_ho') : null,
        'station_p_10' => safe_post('uprjpd_station_p_10') !== '' ? safe_post('uprjpd_station_p_10') : null,
        'station_s_ho' => safe_post('uprjpd_station_s_ho') !== '' ? safe_post('uprjpd_station_s_ho') : null,
        'station_s_18' => safe_post('uprjpd_station_s_18') !== '' ? safe_post('uprjpd_station_s_18') : null,
        'station_m_ho' => safe_post('uprjpd_station_m_ho') !== '' ? safe_post('uprjpd_station_m_ho') : null,
        'station_m_23' => safe_post('uprjpd_station_m_23') !== '' ? safe_post('uprjpd_station_m_23') : null,
        'station_m_4' => safe_post('uprjpd_station_m_4') !== '' ? safe_post('uprjpd_station_m_4') : null,

        // Paraf
        'paraf_p_ho' => safe_post('uprjpd_paraf_p_ho') !== '' ? safe_post('uprjpd_paraf_p_ho') : null,
        'paraf_p_10' => safe_post('uprjpd_paraf_p_10') !== '' ? safe_post('uprjpd_paraf_p_10') : null,
        'paraf_s_ho' => safe_post('uprjpd_paraf_s_ho') !== '' ? safe_post('uprjpd_paraf_s_ho') : null,
        'paraf_s_18' => safe_post('uprjpd_paraf_s_18') !== '' ? safe_post('uprjpd_paraf_s_18') : null,
        'paraf_m_ho' => safe_post('uprjpd_paraf_m_ho') !== '' ? safe_post('uprjpd_paraf_m_ho') : null,
        'paraf_m_23' => safe_post('uprjpd_paraf_m_23') !== '' ? safe_post('uprjpd_paraf_m_23') : null,
        'paraf_m_4' => safe_post('uprjpd_paraf_m_4') !== '' ? safe_post('uprjpd_paraf_m_4') : null,

        'date_created' => safe_post('pencegahan_date_dewasa') !== '' ? safe_post('pencegahan_date_dewasa') : null,
      );

      $this->m_pelayanan->insertUpayaPencegahanDewasa($uprjpd_data);
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

  public function simpan_Pengkajian_lanjutan_spiritual_post()
  {
    $layanan = array('id' => safe_post('id_layanan_pendaftaran'));

    $ek_tanggal_penerima = safe_post('ek_tanggal_verifikasi_penerima');
    $ek_tanggal_perawat = safe_post('ek_tanggal_ttd_perawat');
    $ek_tanggal_dokter = safe_post('ek_tanggal_verifikasi_dokter');

    $tanggal_selesai = safe_post('sirs_tanggal_selesai');
    $si_tanggal_mulai = safe_post('sirs_tanggal_mulai');
    $waktu_pslp_petugas = safe_post('plsp_tanggal_ttd_petugas');

    $cekTanggal = $this->cekDate('6', '', 'Tanggal Mulai pada A. Tempat di Rawat', $si_tanggal_mulai);

    if ($cekTanggal === false) {
      return false;
      exit();
    }

    $cekTanggalSelesai = $this->cekDate('6', '', 'Tanggal Selesai pada A. Tempat di Rawat', $tanggal_selesai);
    if ($cekTanggalSelesai === false) {
      return false;
      exit();
    }

    $cekTanggalPerawat = $this->cekDateTime('0', '#data-kontrol-kembali', 'Tanggal dan Jam Perawat yang merawat', $ek_tanggal_perawat);
    if ($cekTanggalPerawat === false) {
      return false;
      exit();
    }

    $cekTanggalDokter = $this->cekDateTime('0', '#data-kontrol-kembali', 'Tanggal dan Jam Dokter yang merawat', $ek_tanggal_dokter);
    if ($cekTanggalDokter === false) {
      return false;
      exit();
    }

    $cekTanggalPenerima = $this->cekDateTime('0', '#data-kontrol-kembali', 'Tanggal dan Jam Penerima', $ek_tanggal_penerima);
    if ($cekTanggalPenerima === false) {
      return false;
      exit();
    }

    $cekWaktuPSLPPetugas = $this->cekDateTime('5', '', 'Tanggal dan Jam Petugas Pengkajian Lanjutan Spiritual Pasien', $waktu_pslp_petugas);
    if ($cekWaktuPSLPPetugas === false) {
      return false;
      exit();
    }

    $this->db->trans_begin();

    $rk_id_layanan = array('id' => safe_post('rk_id_layanan_pendaftaran'));
    $id_rk = array('id' => safe_post('id_rk'));
    $id = $layanan['id'];

    // PLSP
    $pengkajian_lanjutan = array(
      'id_layanan_pendaftaran' => $layanan['id'],
      'anamnesis_pasien_terima' => safe_post('pasien_terima') !== '' ? safe_post('pasien_terima') : NULL,
      'anamnesis_pasien_tabah' => safe_post('pasien_tabah') !== '' ? safe_post('pasien_tabah') : NULL,
      'anamnesis_pasien_sabar' => safe_post('pasien_sabar') !== '' ? safe_post('pasien_sabar') : NULL,
      'anamnesis_keluarga_terima' => safe_post('keluarga_terima') !== '' ? safe_post('keluarga_terima') : NULL,
      'anamnesis_keluarga_tabah' => safe_post('keluarga_tabah') !== '' ? safe_post('keluarga_tabah') : NULL,
      'anamnesis_keluarga_sabar' => safe_post('keluarga_sabar') !== '' ? safe_post('keluarga_sabar') : NULL,
      'anamnesis_ekspresi_senyum' => safe_post('ekspresi_senyum') !== '' ? safe_post('ekspresi_senyum') : NULL,
      'anamnesis_ekspresi_ikut' => safe_post('ekspresi_mengikuti') !== '' ? safe_post('ekspresi_mengikuti') : NULL,
      'anamnesis_ekspresi_nasihat' => safe_post('ekspresi_nasihat') !== '' ? safe_post('ekspresi_nasihat') : NULL,
      'anamnesis_ekspresi_semangat' => safe_post('ekspresi_semangat') !== '' ? safe_post('ekspresi_semangat') : NULL,
      'anamnesis_ekspresi_pasrah' => safe_post('ekspresi_pasrah') !== '' ? safe_post('ekspresi_pasrah') : NULL,
      'anamnesis_penilaian' => safe_post('penilaian_satu_positif') !== '' ? safe_post('penilaian_satu_positif') : NULL,
      'kesimpulan_kiri' => safe_post('kesimpulan_kiri') !== '' ? safe_post('kesimpulan_kiri') : NULL,
      'pemeriksaan_pasien_sebelum' => safe_post('pasien_belum_disiplin') !== '' ? safe_post('pasien_belum_disiplin') : NULL,
      'pemeriksaan_pasien_sesudah' => safe_post('pasien_sudah_disiplin') !== '' ? safe_post('pasien_sudah_disiplin') : NULL,
      'pemeriksaan_keluarga_belum' => safe_post('keluarga_belum_disiplin') !== '' ? safe_post('keluarga_belum_disiplin') : NULL,
      'pemeriksaan_keluarga_sudah' => safe_post('keluarga_sudah_disiplin') !== '' ? safe_post('keluarga_sudah_disiplin') : NULL,
      'pemeriksaan_media_bersuci' => safe_post('keluarga_media_wudhu') !== '' ? safe_post('keluarga_media_wudhu') : NULL,
      'pemeriksaan_keluarga' => json_encode(array(
        'keluarga_hafalan_alfatihah' => safe_post('keluarga_hafalan_alfatihah'),
        'keluarga_hafalan_rukuk' => safe_post('keluarga_hafalan_rukuk'),
        'keluarga_hafalan_sujud' => safe_post('keluarga_hafalan_sujud'),
        'keluarga_hafalan_tasyahud' => safe_post('keluarga_hafalan_tasyahud'),

      )),
      'pemeriksaan_penilaian' => safe_post('penilaian_dua_positif') !== '' ? safe_post('penilaian_dua_positif') : NULL,
      'kesimpulan_kanan' => safe_post('kesimpulan_kanan') !== '' ? safe_post('kesimpulan_kanan') : NULL,
      'rencana_terapi' => json_encode(array(
        'rencana_motivasi' => safe_post('rencana_motivasi'),
        'pendampingan_umum' => safe_post('pendampingan_umum'),
        'fiqih_pasien' => safe_post('fiqih_pasien'),
        'pendampingan_khusus' => safe_post('pendampingan_khusus'),
        'fiqih_wanita' => safe_post('fiqih_wanita'),
        'ruqyah_syariyah' => safe_post('ruqyah_syariyah'),
        'bimbingan_doa' => safe_post('bimbingan_doa'),
        'terapi_tahajud' => safe_post('terapi_tahajud'),
        'bimbingan_membaca' => safe_post('bimbingan_membaca'),
        'terapi_dzikir' => safe_post('terapi_dzikir'),
        'motivasi_keluarga' => safe_post('motivasi_keluarga'),
        'manajemen_nyeri' => safe_post('manajemen_nyeri'),
        'anjuran_sedekah' => safe_post('anjuran_sedekah'),
      )),
      'perawat_terapi' => safe_post('perawat_terapi') !== '' ? safe_post('perawat_terapi') : NULL,
      'id_users' => safe_post('id_users') !== '' ? safe_post('id_users') : NULL,
    );

    $id_spiritual_pasien = $this->db->select("ssp.id, ssp.ttd_petugas, ssp.plsp_tanggal_ttd_petugas")
      ->from('sm_spiritual_pasien as ssp')
      ->where('ssp.id_layanan_pendaftaran', $id, true)
      ->get()
      ->row();

    if (isset($id_spiritual_pasien)) {

      $id_ssp = $id_spiritual_pasien->id;

      if ($id_spiritual_pasien->ttd_petugas !== NULL) :
        $pengkajian_lanjutan['ttd_petugas'] = $id_spiritual_pasien->ttd_petugas;
      else :
        $pengkajian_lanjutan['ttd_petugas'] = safe_post('ttd_petugas') !== '' ? safe_post('ttd_petugas') : NULL;
      endif;

      if ($id_spiritual_pasien->plsp_tanggal_ttd_petugas !== NULL) :
        $pengkajian_lanjutan['plsp_tanggal_ttd_petugas'] = $id_spiritual_pasien->plsp_tanggal_ttd_petugas;
      else :
        $pengkajian_lanjutan['plsp_tanggal_ttd_petugas'] = (safe_post('plsp_tanggal_ttd_petugas') !== '' ? datetime2mysql(safe_post('plsp_tanggal_ttd_petugas')) : NULL);
      endif;

      $pengkajian_lanjutan['updated_date'] = $this->datetime;

      $this->db->where('id', $id_ssp)->update('sm_spiritual_pasien', $pengkajian_lanjutan);
    } else {

      $pengkajian_lanjutan['plsp_tanggal_ttd_petugas'] = (safe_post('plsp_tanggal_ttd_petugas') !== '' ? datetime2mysql(safe_post('plsp_tanggal_ttd_petugas')) : NULL);

      $pengkajian_lanjutan['ttd_petugas'] = safe_post('ttd_petugas') !== '' ? safe_post('ttd_petugas') : NULL;

      $this->m_pelayanan->updatePengkajianLanjutan($pengkajian_lanjutan);
    }

    $pslw_tanggal_pemantauan = safe_post('tanggal_pemantauan');

    if ($pslw_tanggal_pemantauan) {

      $pslw_tanggal = is_string($pslw_tanggal_pemantauan);

      if ($pslw_tanggal_pemantauan === "" || $pslw_tanggal_pemantauan === null) {

        $pslw_pemantauan = null;
      } else if (!is_array($pslw_tanggal_pemantauan)) {

        $pslw_pemantauan = null;
      } else if (empty($pslw_tanggal_pemantauan)) {

        $pslw_pemantauan = null;
      } else if ($pslw_tanggal === true) {

        $pslw_pemantauan = null;
      } else {

        foreach ($pslw_tanggal_pemantauan as $key => $value) {
          $date = new DateTime($value);
          $new = $date->format('Y-m-d H:i:s');
          $pslw_pemantauan[$key] = $new;
        }
      }

      $pemantauan_sholat = array(
        'id_layanan_pendaftaran' => $layanan['id'],
        'tanggal_pemantauan' => $pslw_pemantauan,
        'sholat_subuh' => safe_post('sholat_subuh') !== '' ? safe_post('sholat_subuh') : NULL,
        'sholat_dzuhur' => safe_post('sholat_dzuhur') !== '' ? safe_post('sholat_dzuhur') : NULL,
        'sholat_ashar' => safe_post('sholat_ashar') !== '' ? safe_post('sholat_ashar') : NULL,
        'sholat_maghrib' => safe_post('sholat_maghrib') !== '' ? safe_post('sholat_maghrib') : NULL,
        'sholat_isya' => safe_post('sholat_isya') !== '' ? safe_post('sholat_isya') : NULL,
        'petugas_pemantau' => safe_post('petugas_pemantau') !== '' ? safe_post('petugas_pemantau') : NULL,
        'user_pantau' => safe_post('user_pantau') !== '' ? safe_post('user_pantau') : NULL,
      );

      $this->m_pelayanan->updatePemantauanSholat($pemantauan_sholat);
    } else {

      $slw_tanggal_pemantauan = safe_post('pslw_tanggal_pemantauan');

      if (!empty($slw_tanggal_pemantauan)) {

        $respon = ['show' => '5', 'status' => false, 'message' => 'Pemantauan Shalat Lima Waktu Selama di RS Belum ditambahkan', 'id' => '#data-pemantauan-shalat'];
      }
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

  public function simpan_assesment_pra_bedah_post()
  {
    $layanan = array('id' => safe_post('id_layanan_pendaftaran'));

    $ek_tanggal_penerima = safe_post('ek_tanggal_verifikasi_penerima');
    $ek_tanggal_perawat = safe_post('ek_tanggal_ttd_perawat');
    $ek_tanggal_dokter = safe_post('ek_tanggal_verifikasi_dokter');

    $tanggal_selesai = safe_post('sirs_tanggal_selesai');
    $si_tanggal_mulai = safe_post('sirs_tanggal_mulai');
    $waktu_pslp_petugas = safe_post('plsp_tanggal_ttd_petugas');

    $cekTanggal = $this->cekDate('6', '', 'Tanggal Mulai pada A. Tempat di Rawat', $si_tanggal_mulai);

    if ($cekTanggal === false) {
      return false;
      exit();
    }

    $cekTanggalSelesai = $this->cekDate('6', '', 'Tanggal Selesai pada A. Tempat di Rawat', $tanggal_selesai);
    if ($cekTanggalSelesai === false) {
      return false;
      exit();
    }

    $cekTanggalPerawat = $this->cekDateTime('0', '#data-kontrol-kembali', 'Tanggal dan Jam Perawat yang merawat', $ek_tanggal_perawat);
    if ($cekTanggalPerawat === false) {
      return false;
      exit();
    }

    $cekTanggalDokter = $this->cekDateTime('0', '#data-kontrol-kembali', 'Tanggal dan Jam Dokter yang merawat', $ek_tanggal_dokter);
    if ($cekTanggalDokter === false) {
      return false;
      exit();
    }

    $cekTanggalPenerima = $this->cekDateTime('0', '#data-kontrol-kembali', 'Tanggal dan Jam Penerima', $ek_tanggal_penerima);
    if ($cekTanggalPenerima === false) {
      return false;
      exit();
    }

    $cekWaktuPSLPPetugas = $this->cekDateTime('5', '', 'Tanggal dan Jam Petugas Pengkajian Lanjutan Spiritual Pasien', $waktu_pslp_petugas);
    if ($cekWaktuPSLPPetugas === false) {
      return false;
      exit();
    }

    $this->db->trans_begin();

    $rk_id_layanan = array('id' => safe_post('rk_id_layanan_pendaftaran'));
    $id_rk = array('id' => safe_post('id_rk'));
    $id = $layanan['id'];

    // APBT
    $checkDataAsessmentPraBedah = array(
      'id_layanan_pendaftaran' => $layanan['id'],
      'id_pendaftaran' => safe_post('id_pendaftaran'),
      'id_users' => $this->session->userdata('id_translucent'),
      'id_apbt' => safe_post('id_apbt'),
      'tanggal_waktu' => $this->datetime,
      // 'tanggal_waktu' => (safe_post('tanggal_waktu_asessment') !== '' ? datetime2mysql(safe_post('tanggal_waktu_asessment')) : NULL),
      'apb_suhu' => safe_post('apb_suhu') !== '' ? safe_post('apb_suhu') : NULL,
      'apb_pernafasan' => safe_post('apb_pernafasan') !== '' ? safe_post('apb_pernafasan') : NULL,
      'apb_bb' => safe_post('apb_berat_badan') !== '' ? safe_post('apb_berat_badan') : NULL,
      'apb_nadi' => safe_post('apb_nadi') !== '' ? safe_post('apb_nadi') : NULL,
      'apb_tensi_sis' => safe_post('apb_tensi_sis') !== '' ? safe_post('apb_tensi_sis') : NULL,
      'apb_tensi_dis' => safe_post('apb_tensi_dis') !== '' ? safe_post('apb_tensi_dis') : NULL,
      'apb_riwayat_alergi' => safe_post('apb_riwayat_alergi') !== '' ? safe_post('apb_riwayat_alergi') : NULL,
      'apb_ket_riwayat_alergi' => safe_post('apb_ket_riwayat_alergi') !== '' ? safe_post('apb_ket_riwayat_alergi') : NULL,
      'apb_keluhan_utama' => safe_post('apb_keluhan_utama') !== '' ? safe_post('apb_keluhan_utama') : NULL,
      'apb_rps' => safe_post('apb_rps') !== '' ? safe_post('apb_rps') : NULL,
      'apb_riwayat_penyakit_terdahulu' => safe_post('apb_rpt') !== '' ? safe_post('apb_rpt') : NULL,
      'pemeriksaan_fisik' => safe_post('apb_pemeriksaan_fisik') !== '' ? safe_post('apb_pemeriksaan_fisik') : NULL,
      'pemeriksaan_banding' => safe_post('apb_pemeriksaan_banding') !== '' ? safe_post('apb_pemeriksaan_banding') : NULL,
      'labolatorium' => safe_post('apb_laboratorium') !== '' ? safe_post('apb_laboratorium') : NULL,
      'diagnosa_pra_bedah' => safe_post('apb_diagnosis') !== '' ? safe_post('apb_diagnosis') : NULL,
      'diagnosis_banding' => safe_post('apb_diagnosis_banding') !== '' ? safe_post('apb_diagnosis_banding') : NULL,
      'permasalahan' => safe_post('apb_permasalahan') !== '' ? safe_post('apb_permasalahan') : NULL,
      'apb_rawat_inap' => safe_post('apb_rawat_inap') !== '' ? safe_post('apb_rawat_inap') : NULL,
      'apb_rawat_inap_indikasi' => safe_post('apb_rawat_inap_indikasi') !== '' ? safe_post('apb_rawat_inap_indikasi') : NULL,
      'is_pasien' => safe_post('apb_pasien') !== '' ? safe_post('apb_pasien') : NULL,
      'is_keluarga' => safe_post('apb_keluarga') !== '' ? safe_post('apb_keluarga') : NULL,
      'hubungan_keluarga' => safe_post('apb_riwayat_hk') !== '' ? safe_post('apb_riwayat_hk') : NULL,
      'nama_keluarga' => safe_post('apb_keluarga_keterangan') !== '' ? safe_post('apb_keluarga_keterangan') : NULL,
      'is_edukasi' => safe_post('apb_tidak_edukasi') !== '' ? safe_post('apb_tidak_edukasi') : NULL,
      'alasan_edukasi' => safe_post('apb_keterangan_edukasi') !== '' ? safe_post('apb_keterangan_edukasi') : NULL,
      // 'apb_tanggal_dokter_dpjp' => (safe_post('apb_tanggal_verifiaksi_dokter_dpjp') !== '' ? datetime2mysql(safe_post('apb_tanggal_verifiaksi_dokter_dpjp')) : NULL),
      // 'apb_tanggal_pasien' => (safe_post('apb_tanggal_verifiaksi_pasien') !== '' ? datetime2mysql(safe_post('apb_tanggal_verifiaksi_pasien')) : NULL),
      'apb_tanggal_dokter_dpjp' => $this->datetime,
      'apb_tanggal_pasien' => $this->datetime,
      'id_dokter_dpjp' => safe_post('apb_dokter_dpjp') !== '' ? safe_post('apb_dokter_dpjp') : NULL,
      'apb_pasien' => safe_post('apb_pasien_asesment') !== '' ? safe_post('apb_pasien_asesment') : NULL,
      'apb_verifikasi_dokter_dpjp' => safe_post('apb_ttd_dokter_dpjp') !== '' ? safe_post('apb_ttd_dokter_dpjp') : NULL,
      'apb_verifikasi_pasien' => safe_post('apb_ttd_pasien_dpjp') !== '' ? safe_post('apb_ttd_pasien_dpjp') : NULL,
      'apb_rencana_operasi' => safe_post('apb_rto') !== '' ? safe_post('apb_rto') : NULL,
      'apb_status_nutrisi' => safe_post('apb_status_nutrisi') !== '' ? safe_post('apb_status_nutrisi') : NULL,
      'apb_status_nutrisi' => safe_post('apb_status_nutrisi') !== '' ? safe_post('apb_status_nutrisi') : NULL,
      'apb_status_nutrisi' => safe_post('apb_status_nutrisi') !== '' ? safe_post('apb_status_nutrisi') : NULL,
      'apb_rawat_inap' => safe_post('rawat_inap') !== '' ? safe_post('rawat_inap') : NULL,
      'apb_indikasi_ranap' => safe_post('apb_indikasi_ranap') !== '' ? safe_post('apb_indikasi_ranap') : NULL,
    );

    $sign = $this->db->select('apb.tanggal_waktu, apb_tanggal_dokter_dpjp, apb_tanggal_pasien, apb_verifikasi_dokter_dpjp, apb_verifikasi_pasien')
      ->from('sm_asessmen_pra_bedah as apb')
      ->where('apb.id_pendaftaran', $layanan['id'])
      ->get()
      ->row();

    if (isset($sign)) :
      if ($sign->tanggal_waktu !== NULL) :
        $checkDataAsessmentPraBedah['tanggal_waktu'] = $sign->tanggal_waktu;
      else :
        $checkDataAsessmentPraBedah['tanggal_waktu'] = (safe_post('tanggal_waktu_asessment') !== '' ? datetime2mysql(safe_post('tanggal_waktu_asessment')) : NULL);
      endif;
      if ($sign->apb_tanggal_dokter_dpjp !== NULL) :
        $checkDataAsessmentPraBedah['apb_tanggal_dokter_dpjp'] = $sign->apb_tanggal_dokter_dpjp;
      else :
        $checkDataAsessmentPraBedah['apb_tanggal_dokter_dpjp'] = (safe_post('apb_tanggal_verifiaksi_dokter_dpjp') !== '' ? datetime2mysql(safe_post('apb_tanggal_verifiaksi_dokter_dpjp')) : NULL);
      endif;
      if ($sign->apb_tanggal_pasien !== NULL) :
        $checkDataAsessmentPraBedah['apb_tanggal_pasien'] = $sign->apb_tanggal_pasien;
      else :
        $checkDataAsessmentPraBedah['apb_tanggal_pasien'] = (safe_post('apb_tanggal_verifiaksi_pasien') !== '' ? datetime2mysql(safe_post('apb_tanggal_verifiaksi_pasien')) : NULL);
      endif;

      if ($sign->apb_verifikasi_dokter_dpjp !== NULL) :
        $checkDataAsessmentPraBedah['apb_verifikasi_dokter_dpjp'] = $sign->apb_verifikasi_dokter_dpjp;
      else :
        $checkDataAsessmentPraBedah['apb_verifikasi_dokter_dpjp'] = (safe_post('apb_ttd_dokter_dpjp') !== '' ? safe_post('apb_ttd_dokter_dpjp') : NULL);
      endif;
      if ($sign->apb_verifikasi_pasien !== NULL) :
        $checkDataAsessmentPraBedah['apb_verifikasi_pasien'] = $sign->apb_verifikasi_pasien;
      else :
        $checkDataAsessmentPraBedah['apb_verifikasi_pasien'] = (safe_post('apb_ttd_pasien_dpjp') !== '' ? safe_post('apb_ttd_pasien_dpjp') : NULL);
      endif;
    endif;
    $this->m_pelayanan->updateAssesmentPraBedah($checkDataAsessmentPraBedah);

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




  // MONITORING PASIEN NEWS MEOWS PEWS // GRVK
  public function simpan_monitoring_pasien_post(){
    $layanan = array('id' => safe_post('id_layanan_pendaftaran'));
    $this->db->trans_begin();
    $id = $layanan['id'];
    $checkMonitoringPasieeen =  $this->db->select("*")
      ->from('sm_monitoring_pasien_a')
      ->where('id_layanan_pendaftaran', $id, true)
      ->get()->row();
    if ($checkMonitoringPasieeen == NULL) {
      $monitoring_pasieeen = array(
        'id_layanan_pendaftaran'    => $id,
        'tanggal_mp'                => safe_post('tanggal_mp') !== '' ? date('Y-m-d', strtotime(str_replace('/', '-', safe_post('tanggal_mp')))) : NULL,
        'bb_mp'                     => safe_post('bb_mp') !== '' ? safe_post('bb_mp') : NULL,
        'tb_mp'                     => safe_post('tb_mp') !== '' ? safe_post('tb_mp') : NULL,
        // MONITORING PASIEN (NEWS)
        'sews_laju_respirasi'   => safe_post('laju_respirasi_mp') !== '' ? safe_post('laju_respirasi_mp') : NULL,
        'sews_saturasi_2'       => safe_post('saturasi_mp') !== '' ? safe_post('saturasi_mp') : NULL,
        'spo2_skala2_news'      => safe_post('spo2_skala2_news') !== '' ? safe_post('spo2_skala2_news') : NULL,
        'sews_suplemen'         => safe_post('suplemen_mp') !== '' ? safe_post('suplemen_mp') : NULL,
        'td_sistolik_news'      => safe_post('td_sistolik_news') !== '' ? safe_post('td_sistolik_news') : NULL,
        'nadi_news'             => safe_post('nadi_news') !== '' ? safe_post('nadi_news') : NULL,
        'kesadaran_news'        => safe_post('kesadaran_news') !== '' ? safe_post('kesadaran_news') : NULL,
        'suhu_newst'            => safe_post('suhu_newst') !== '' ? safe_post('suhu_newst') : NULL,
        'sews_total_2'          => safe_post('total_mpnews') !== '' ? safe_post('total_mpnews') : NULL,

        // MONITORING PASIEN (MEOWS)
        'sews_respirasi'       => safe_post('respirasi_mpp') !== '' ? safe_post('respirasi_mpp') : NULL,
        'sews_saturasi_1'      => safe_post('saturasi_mpp') !== '' ? safe_post('saturasi_mpp') : NULL,
        'sews_o2'              => safe_post('o2_mpp') !== '' ? safe_post('o2_mpp') : NULL,
        'sews_suhu'            => safe_post('suhu_mpp') !== '' ? safe_post('suhu_mpp') : NULL,
        'sews_td_sistolik'     => safe_post('sintolik_mpp') !== '' ? safe_post('sintolik_mpp') : NULL,
        'sews_td_diastolik'    => safe_post('diastolik_mpp') !== '' ? safe_post('diastolik_mpp') : NULL,
        'sews_nadi'            => safe_post('nadi_mpp') !== '' ? safe_post('nadi_mpp') : NULL,
        'sews_kesadaran_1'     => safe_post('kesadaran_mpp') !== '' ? safe_post('kesadaran_mpp') : NULL,
        'sews_nyeri'           => safe_post('nyeri_11_mpp') !== '' ? safe_post('nyeri_11_mpp') : NULL,
        'sews_pengeluaran'     => safe_post('pengeluwaran_11_mpp') !== '' ? safe_post('pengeluwaran_11_mpp') : NULL,
        'sews_protein_urin'    => safe_post('protein_mpp') !== '' ? safe_post('protein_mpp') : NULL,
        'sews_total_1'         => safe_post('total_mpmeows') !== '' ? safe_post('total_mpmeows') : NULL,

        // MONITORING PASIEN (PEWS)
        'pews_suhu'             => safe_post('suhu2') !== '' ? safe_post('suhu2') : NULL,
        'pews_pernafasan'       => safe_post('pernafasan2') !== '' ? safe_post('pernafasan2') : NULL,
        'pews_subpernafasan'    => safe_post('subpernafasan2') !== '' ? safe_post('subpernafasan2') : NULL,
        'pews_alat_bantu'       => safe_post('alat_bantu2') !== '' ? safe_post('alat_bantu2') : NULL,
        'pews_saturasi'         => safe_post('saturasi2') !== '' ? safe_post('saturasi2') : NULL,
        'pews_nadi'             => safe_post('nadi2') !== '' ? safe_post('nadi2') : NULL,
        'pews_warna_kulit'      => safe_post('warna_kulit2') !== '' ? safe_post('warna_kulit2') : NULL,
        'pews_tds'              => safe_post('tds2') !== '' ? safe_post('tds2') : NULL,
        'pews_kesadaran'        => safe_post('kesadaran2') !== '' ? safe_post('kesadaran2') : NULL,
        'pews_total'            => safe_post('total_skalapews') !== '' ? safe_post('total_skalapews') : NULL,

        'user_created'             => $this->session->userdata('id_translucent'),
      );

      $this->db->insert('sm_monitoring_pasien_a', $monitoring_pasieeen);
    } else {
      $monitoring_pasieeen = array(
        'id_layanan_pendaftaran'    => $id,
        'tanggal_mp'                => safe_post('tanggal_mp') !== '' ? date('Y-m-d', strtotime(str_replace('/', '-', safe_post('tanggal_mp')))) : NULL,
        'bb_mp'                     => safe_post('bb_mp') !== '' ? safe_post('bb_mp') : NULL,
        'tb_mp'                     => safe_post('tb_mp') !== '' ? safe_post('tb_mp') : NULL,
        // MONITORING PASIEN (NEWS)
        'sews_laju_respirasi'   => safe_post('laju_respirasi_mp') !== '' ? safe_post('laju_respirasi_mp') : NULL,
        'sews_saturasi_2'       => safe_post('saturasi_mp') !== '' ? safe_post('saturasi_mp') : NULL,
        'spo2_skala2_news'      => safe_post('spo2_skala2_news') !== '' ? safe_post('spo2_skala2_news') : NULL,
        'sews_suplemen'         => safe_post('suplemen_mp') !== '' ? safe_post('suplemen_mp') : NULL,
        'td_sistolik_news'      => safe_post('td_sistolik_news') !== '' ? safe_post('td_sistolik_news') : NULL,
        'nadi_news'             => safe_post('nadi_news') !== '' ? safe_post('nadi_news') : NULL,
        'kesadaran_news'        => safe_post('kesadaran_news') !== '' ? safe_post('kesadaran_news') : NULL,
        'suhu_newst'            => safe_post('suhu_newst') !== '' ? safe_post('suhu_newst') : NULL,
        'sews_total_2'          => safe_post('total_mpnews') !== '' ? safe_post('total_mpnews') : NULL,

        // MONITORING PASIEN (MEOWS)
        'sews_respirasi'       => safe_post('respirasi_mpp') !== '' ? safe_post('respirasi_mpp') : NULL,
        'sews_saturasi_1'      => safe_post('saturasi_mpp') !== '' ? safe_post('saturasi_mpp') : NULL,
        'sews_o2'              => safe_post('o2_mpp') !== '' ? safe_post('o2_mpp') : NULL,
        'sews_suhu'            => safe_post('suhu_mpp') !== '' ? safe_post('suhu_mpp') : NULL,
        'sews_td_sistolik'     => safe_post('sintolik_mpp') !== '' ? safe_post('sintolik_mpp') : NULL,
        'sews_td_diastolik'    => safe_post('diastolik_mpp') !== '' ? safe_post('diastolik_mpp') : NULL,
        'sews_nadi'            => safe_post('nadi_mpp') !== '' ? safe_post('nadi_mpp') : NULL,
        'sews_kesadaran_1'     => safe_post('kesadaran_mpp') !== '' ? safe_post('kesadaran_mpp') : NULL,
        'sews_nyeri'           => safe_post('nyeri_11_mpp') !== '' ? safe_post('nyeri_11_mpp') : NULL,
        'sews_pengeluaran'     => safe_post('pengeluwaran_11_mpp') !== '' ? safe_post('pengeluwaran_11_mpp') : NULL,
        'sews_protein_urin'    => safe_post('protein_mpp') !== '' ? safe_post('protein_mpp') : NULL,
        'sews_total_1'         => safe_post('total_mpmeows') !== '' ? safe_post('total_mpmeows') : NULL,

        // MONITORING PASIEN (PEWS)
        'pews_suhu'             => safe_post('suhu2') !== '' ? safe_post('suhu2') : NULL,
        'pews_pernafasan'       => safe_post('pernafasan2') !== '' ? safe_post('pernafasan2') : NULL,
        'pews_subpernafasan'    => safe_post('subpernafasan2') !== '' ? safe_post('subpernafasan2') : NULL,
        'pews_alat_bantu'       => safe_post('alat_bantu2') !== '' ? safe_post('alat_bantu2') : NULL,
        'pews_saturasi'         => safe_post('saturasi2') !== '' ? safe_post('saturasi2') : NULL,
        'pews_nadi'             => safe_post('nadi2') !== '' ? safe_post('nadi2') : NULL,
        'pews_warna_kulit'      => safe_post('warna_kulit2') !== '' ? safe_post('warna_kulit2') : NULL,
        'pews_tds'              => safe_post('tds2') !== '' ? safe_post('tds2') : NULL,
        'pews_kesadaran'        => safe_post('kesadaran2') !== '' ? safe_post('kesadaran2') : NULL,
        'pews_total'            => safe_post('total_skalapews') !== '' ? safe_post('total_skalapews') : NULL,
        // 'user_created'       	 	 => $this->session->userdata('id_translucent'),
      );
      $this->db->where('id_layanan_pendaftaran', $id);
      $this->db->update('sm_monitoring_pasien_a', $monitoring_pasieeen);
    }

    // MONITORING NEWS MEOWS PEWS
    $id_users = safe_post('id_user');
    $layanan = array('id' => safe_post('id_layanan_pendaftaran')); 
    $pencegahan_date_mpp = safe_post('pencegahan_date_mpp');  
    // KALAU GA ADA IINI PASTI EROR
    $id_pendaftaran           = safe_post('id_pendaftaran');  

    if (!empty($pencegahan_date_mpp)) {
      $monitoring_pasien_2 = array(
        'id_pendaftaran'         => $id_pendaftaran,
        'id_layanan_pendaftaran' => $layanan['id'],
        'id_user'                => safe_post('user_pengkajian') !== '' ? safe_post('user_pengkajian') : null,
        'oral_mpp'               => safe_post('oral_mpp') !== '' ? safe_post('oral_mpp') : null,
        'ngt_mpp'                => safe_post('ngt_mpp') !== '' ? safe_post('ngt_mpp') : null,
        'paranteral_mpp'         => safe_post('paranteral_mpp') !== '' ? safe_post('paranteral_mpp') : null,
        'paranteral_mppp'        => safe_post('paranteral_mppp') !== '' ? safe_post('paranteral_mppp') : null,
        'produk_mpp'             => safe_post('produk_mpp') !== '' ? safe_post('produk_mpp') : null,
        'input_mpp'              => safe_post('input_mpp') !== '' ? safe_post('input_mpp') : null,
        'urin_mpp'               => safe_post('urin_mpp') !== '' ? safe_post('urin_mpp') : null,
        'bab_mpp'                => safe_post('bab_mpp') !== '' ? safe_post('bab_mpp') : null,
        'gastrik_mpp'            => safe_post('gastrik_mpp') !== '' ? safe_post('gastrik_mpp') : null,
        'wsd_mpp'                => safe_post('wsd_mpp') !== '' ? safe_post('wsd_mpp') : null,
        'iwl_mpp'                => safe_post('iwl_mpp') !== '' ? safe_post('iwl_mpp') : null,
        'output_mpp'             => safe_post('output_mpp') !== '' ? safe_post('output_mpp') : null,
        'blance_cairan_mpp'      => safe_post('blance_cairan_mpp') !== '' ? safe_post('blance_cairan_mpp') : null,
        'tdarah_mpp'             => safe_post('tdarah_mpp') !== '' ? safe_post('tdarah_mpp') : null,
        'saturasi_mppp'          => safe_post('saturasi_mppp') !== '' ? safe_post('saturasi_mppp') : null,
        'toksigen_mpp'           => safe_post('toksigen_mpp') !== '' ? safe_post('toksigen_mpp') : null,
        'skesadaran_mpp'         => safe_post('skesadaran_mpp') !== '' ? safe_post('skesadaran_mpp') : null,
        'kategori_mpp'           => safe_post('kategori_mpp') !== '' ? safe_post('kategori_mpp') : null,
        'pengawasan_mpp'         => safe_post('pengawasan_mpp') !== '' ? safe_post('pengawasan_mpp') : null,
        'diit_mpp'               => safe_post('diit_mpp') !== '' ? safe_post('diit_mpp') : null,
        'tgl_mpp'                => safe_post('tgl_mpp') !== '' ? safe_post('tgl_mpp') : null,
        'jam_mpp'                => safe_post('jam_mpp') !== '' ? safe_post('jam_mpp') : null,
        'perawat_mpp'            => safe_post('perawat_mpp') !== '' ? safe_post('perawat_mpp') : null,
        'date_created'           => safe_post('pencegahan_date_mpp') !== '' ? safe_post('pencegahan_date_mpp') : null,
      );
      $this->m_pelayanan->insertMonitoringPasien2($monitoring_pasien_2);
    }

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








  public function simpan_mpp_post()
  {
    $this->db->trans_begin();
    $layanan = array('id' => safe_post('id_layanan_pendaftaran'));
    $pendaftaran = array('id' => safe_post('id_pendaftaran'));
    $mpp_id = safe_post('mpp_id');

    // SKRINING KEBUTUHAN MANAJER PELAYANAN PASIEN (MPP)
    if ($mpp_id !== '') {
      $data_mpp = array(
        'id_layanan_pendaftaran'  => $layanan['id'],
        'id_pendaftaran'          => $pendaftaran['id'],

        'mpp_tanggal_1'           => safe_post('mpp_tanggal_1') !== '' ? datetime2mysql(safe_post('mpp_tanggal_1')) : NULL,
        'mpp_tanggal_2'           => safe_post('mpp_tanggal_2') !== '' ? datetime2mysql(safe_post('mpp_tanggal_2')) : NULL,
        'mpp_tanggal_3'           => safe_post('mpp_tanggal_3') !== '' ? datetime2mysql(safe_post('mpp_tanggal_3')) : NULL,

        'mpp_usia_1'              => safe_post('mpp_usia_1') !== '' ? safe_post('mpp_usia_1') : NULL,
        'mpp_usia_2'              => safe_post('mpp_usia_2') !== '' ? safe_post('mpp_usia_2') : NULL,
        'mpp_usia_3'              => safe_post('mpp_usia_3') !== '' ? safe_post('mpp_usia_3') : NULL,

        'mpp_resiko_1'            => safe_post('mpp_resiko_1') !== '' ? safe_post('mpp_resiko_1') : NULL,
        'mpp_resiko_2'            => safe_post('mpp_resiko_2') !== '' ? safe_post('mpp_resiko_2') : NULL,
        'mpp_resiko_3'            => safe_post('mpp_resiko_3') !== '' ? safe_post('mpp_resiko_3') : NULL,

        'mpp_komplain_1'          => safe_post('mpp_komplain_1') !== '' ? safe_post('mpp_komplain_1') : NULL,
        'mpp_komplain_2'          => safe_post('mpp_komplain_2') !== '' ? safe_post('mpp_komplain_2') : NULL,
        'mpp_komplain_3'          => safe_post('mpp_komplain_3') !== '' ? safe_post('mpp_komplain_3') : NULL,

        'mpp_kronis_1'            => safe_post('mpp_kronis_1') !== '' ? safe_post('mpp_kronis_1') : NULL,
        'mpp_kronis_2'            => safe_post('mpp_kronis_2') !== '' ? safe_post('mpp_kronis_2') : NULL,
        'mpp_kronis_3'            => safe_post('mpp_kronis_3') !== '' ? safe_post('mpp_kronis_3') : NULL,

        'mpp_adl_1'               => safe_post('mpp_adl_1') !== '' ? safe_post('mpp_adl_1') : NULL,
        'mpp_adl_2'               => safe_post('mpp_adl_2') !== '' ? safe_post('mpp_adl_2') : NULL,
        'mpp_adl_3'               => safe_post('mpp_adl_3') !== '' ? safe_post('mpp_adl_3') : NULL,

        'mpp_peralatan_1'         => safe_post('mpp_peralatan_1') !== '' ? safe_post('mpp_peralatan_1') : NULL,
        'mpp_peralatan_2'         => safe_post('mpp_peralatan_2') !== '' ? safe_post('mpp_peralatan_2') : NULL,
        'mpp_peralatan_3'         => safe_post('mpp_peralatan_3') !== '' ? safe_post('mpp_peralatan_3') : NULL,

        'mpp_mental_1'            => safe_post('mpp_mental_1') !== '' ? safe_post('mpp_mental_1') : NULL,
        'mpp_mental_2'            => safe_post('mpp_mental_2') !== '' ? safe_post('mpp_mental_2') : NULL,
        'mpp_mental_3'            => safe_post('mpp_mental_3') !== '' ? safe_post('mpp_mental_3') : NULL,

        'mpp_igd_1'               => safe_post('mpp_igd_1') !== '' ? safe_post('mpp_igd_1') : NULL,
        'mpp_igd_2'               => safe_post('mpp_igd_2') !== '' ? safe_post('mpp_igd_2') : NULL,
        'mpp_igd_3'               => safe_post('mpp_igd_3') !== '' ? safe_post('mpp_igd_3') : NULL,

        'mpp_asuhan_1'            => safe_post('mpp_asuhan_1') !== '' ? safe_post('mpp_asuhan_1') : NULL,
        'mpp_asuhan_2'            => safe_post('mpp_asuhan_2') !== '' ? safe_post('mpp_asuhan_2') : NULL,
        'mpp_asuhan_3'            => safe_post('mpp_asuhan_3') !== '' ? safe_post('mpp_asuhan_3') : NULL,

        'mpp_pembiayaan_1'        => safe_post('mpp_pembiayaan_1') !== '' ? safe_post('mpp_pembiayaan_1') : NULL,
        'mpp_pembiayaan_2'        => safe_post('mpp_pembiayaan_2') !== '' ? safe_post('mpp_pembiayaan_2') : NULL,
        'mpp_pembiayaan_3'        => safe_post('mpp_pembiayaan_3') !== '' ? safe_post('mpp_pembiayaan_3') : NULL,

        'mpp_kasus_1'             => safe_post('mpp_kasus_1') !== '' ? safe_post('mpp_kasus_1') : NULL,
        'mpp_kasus_2'             => safe_post('mpp_kasus_2') !== '' ? safe_post('mpp_kasus_2') : NULL,
        'mpp_kasus_3'             => safe_post('mpp_kasus_3') !== '' ? safe_post('mpp_kasus_3') : NULL,

        'mpp_pemulangan_1'        => safe_post('mpp_pemulangan_1') !== '' ? safe_post('mpp_pemulangan_1') : NULL,
        'mpp_pemulangan_2'        => safe_post('mpp_pemulangan_2') !== '' ? safe_post('mpp_pemulangan_2') : NULL,
        'mpp_pemulangan_3'        => safe_post('mpp_pemulangan_3') !== '' ? safe_post('mpp_pemulangan_3') : NULL,

        'mpp_paraf_1'             => safe_post('mpp_paraf_1') !== '' ? safe_post('mpp_paraf_1') : NULL,
        'mpp_paraf_2'             => safe_post('mpp_paraf_2') !== '' ? safe_post('mpp_paraf_2') : NULL,
        'mpp_paraf_3'             => safe_post('mpp_paraf_3') !== '' ? safe_post('mpp_paraf_3') : NULL,

        'mpp_petugas_1'           => safe_post('mpp_petugas_1') !== '' ? safe_post('mpp_petugas_1') : NULL,
        'mpp_petugas_2'           => safe_post('mpp_petugas_2') !== '' ? safe_post('mpp_petugas_2') : NULL,
        'mpp_petugas_3'           => safe_post('mpp_petugas_3') !== '' ? safe_post('mpp_petugas_3') : NULL,

        'mpp_paraf_dokter'        => safe_post('mpp_paraf_dokter') !== '' ? safe_post('mpp_paraf_dokter') : NULL,
        'mpp_dokter'              => safe_post('mpp_dokter') !== '' ? safe_post('mpp_dokter') : NULL,

      );
      // $filtered_array = array_filter($data_mpp);
      // var_dump('update');
      // var_dump($data_mpp);die;
      $this->db->where('id', $mpp_id);
      $this->db->update('sm_manajer_pelayanan_pasien', $data_mpp);
    } else {
      $data_mpp = array(
        'id_layanan_pendaftaran'  => $layanan['id'],
        'id_pendaftaran'          => $pendaftaran['id'],

        'mpp_tanggal_1'           => safe_post('mpp_tanggal_1') !== '' ? datetime2mysql(safe_post('mpp_tanggal_1')) : NULL,
        'mpp_tanggal_2'           => safe_post('mpp_tanggal_2') !== '' ? datetime2mysql(safe_post('mpp_tanggal_2')) : NULL,
        'mpp_tanggal_3'           => safe_post('mpp_tanggal_3') !== '' ? datetime2mysql(safe_post('mpp_tanggal_3')) : NULL,

        'mpp_usia_1'              => safe_post('mpp_usia_1') !== '' ? safe_post('mpp_usia_1') : NULL,
        'mpp_usia_2'              => safe_post('mpp_usia_2') !== '' ? safe_post('mpp_usia_2') : NULL,
        'mpp_usia_3'              => safe_post('mpp_usia_3') !== '' ? safe_post('mpp_usia_3') : NULL,

        'mpp_resiko_1'            => safe_post('mpp_resiko_1') !== '' ? safe_post('mpp_resiko_1') : NULL,
        'mpp_resiko_2'            => safe_post('mpp_resiko_2') !== '' ? safe_post('mpp_resiko_2') : NULL,
        'mpp_resiko_3'            => safe_post('mpp_resiko_3') !== '' ? safe_post('mpp_resiko_3') : NULL,

        'mpp_komplain_1'          => safe_post('mpp_komplain_1') !== '' ? safe_post('mpp_komplain_1') : NULL,
        'mpp_komplain_2'          => safe_post('mpp_komplain_2') !== '' ? safe_post('mpp_komplain_2') : NULL,
        'mpp_komplain_3'          => safe_post('mpp_komplain_3') !== '' ? safe_post('mpp_komplain_3') : NULL,

        'mpp_kronis_1'            => safe_post('mpp_kronis_1') !== '' ? safe_post('mpp_kronis_1') : NULL,
        'mpp_kronis_2'            => safe_post('mpp_kronis_2') !== '' ? safe_post('mpp_kronis_2') : NULL,
        'mpp_kronis_3'            => safe_post('mpp_kronis_3') !== '' ? safe_post('mpp_kronis_3') : NULL,

        'mpp_adl_1'               => safe_post('mpp_adl_1') !== '' ? safe_post('mpp_adl_1') : NULL,
        'mpp_adl_2'               => safe_post('mpp_adl_2') !== '' ? safe_post('mpp_adl_2') : NULL,
        'mpp_adl_3'               => safe_post('mpp_adl_3') !== '' ? safe_post('mpp_adl_3') : NULL,

        'mpp_peralatan_1'         => safe_post('mpp_peralatan_1') !== '' ? safe_post('mpp_peralatan_1') : NULL,
        'mpp_peralatan_2'         => safe_post('mpp_peralatan_2') !== '' ? safe_post('mpp_peralatan_2') : NULL,
        'mpp_peralatan_3'         => safe_post('mpp_peralatan_3') !== '' ? safe_post('mpp_peralatan_3') : NULL,

        'mpp_mental_1'            => safe_post('mpp_mental_1') !== '' ? safe_post('mpp_mental_1') : NULL,
        'mpp_mental_2'            => safe_post('mpp_mental_2') !== '' ? safe_post('mpp_mental_2') : NULL,
        'mpp_mental_3'            => safe_post('mpp_mental_3') !== '' ? safe_post('mpp_mental_3') : NULL,

        'mpp_igd_1'               => safe_post('mpp_igd_1') !== '' ? safe_post('mpp_igd_1') : NULL,
        'mpp_igd_2'               => safe_post('mpp_igd_2') !== '' ? safe_post('mpp_igd_2') : NULL,
        'mpp_igd_3'               => safe_post('mpp_igd_3') !== '' ? safe_post('mpp_igd_3') : NULL,

        'mpp_asuhan_1'            => safe_post('mpp_asuhan_1') !== '' ? safe_post('mpp_asuhan_1') : NULL,
        'mpp_asuhan_2'            => safe_post('mpp_asuhan_2') !== '' ? safe_post('mpp_asuhan_2') : NULL,
        'mpp_asuhan_3'            => safe_post('mpp_asuhan_3') !== '' ? safe_post('mpp_asuhan_3') : NULL,

        'mpp_pembiayaan_1'        => safe_post('mpp_pembiayaan_1') !== '' ? safe_post('mpp_pembiayaan_1') : NULL,
        'mpp_pembiayaan_2'        => safe_post('mpp_pembiayaan_2') !== '' ? safe_post('mpp_pembiayaan_2') : NULL,
        'mpp_pembiayaan_3'        => safe_post('mpp_pembiayaan_3') !== '' ? safe_post('mpp_pembiayaan_3') : NULL,

        'mpp_kasus_1'             => safe_post('mpp_kasus_1') !== '' ? safe_post('mpp_kasus_1') : NULL,
        'mpp_kasus_2'             => safe_post('mpp_kasus_2') !== '' ? safe_post('mpp_kasus_2') : NULL,
        'mpp_kasus_3'             => safe_post('mpp_kasus_3') !== '' ? safe_post('mpp_kasus_3') : NULL,

        'mpp_pemulangan_1'        => safe_post('mpp_pemulangan_1') !== '' ? safe_post('mpp_pemulangan_1') : NULL,
        'mpp_pemulangan_2'        => safe_post('mpp_pemulangan_2') !== '' ? safe_post('mpp_pemulangan_2') : NULL,
        'mpp_pemulangan_3'        => safe_post('mpp_pemulangan_3') !== '' ? safe_post('mpp_pemulangan_3') : NULL,

        'mpp_paraf_1'             => safe_post('mpp_paraf_1') !== '' ? safe_post('mpp_paraf_1') : NULL,
        'mpp_paraf_2'             => safe_post('mpp_paraf_2') !== '' ? safe_post('mpp_paraf_2') : NULL,
        'mpp_paraf_3'             => safe_post('mpp_paraf_3') !== '' ? safe_post('mpp_paraf_3') : NULL,

        'mpp_petugas_1'           => safe_post('mpp_petugas_1') !== '' ? safe_post('mpp_petugas_1') : NULL,
        'mpp_petugas_2'           => safe_post('mpp_petugas_2') !== '' ? safe_post('mpp_petugas_2') : NULL,
        'mpp_petugas_3'           => safe_post('mpp_petugas_3') !== '' ? safe_post('mpp_petugas_3') : NULL,

        'mpp_paraf_dokter'        => safe_post('mpp_paraf_dokter') !== '' ? safe_post('mpp_paraf_dokter') : NULL,
        'mpp_dokter'              => safe_post('mpp_dokter') !== '' ? safe_post('mpp_dokter') : NULL,

      );
      // var_dump('simpan');
      // var_dump($data_mpp);die;
      $this->db->insert('sm_manajer_pelayanan_pasien', $data_mpp);
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

    public function simpan_LT_post()
  {
    $this->db->trans_begin();
    $layanan = array('id' => safe_post('id_layanan_pendaftaran'));
    $pendaftaran = array('id' => safe_post('id_pendaftaran'));
    $lt_id = safe_post('lt_id');

    // LAPORAN TINDAKAN
    if ($lt_id !== '') {
      $data_lt = array(
        'id_layanan_pendaftaran'  => $layanan['id'],
        'id_pendaftaran'          => $pendaftaran['id'],
        'id_users'					 		  => $this->session->userdata('id_translucent'),

        'lt_nama_tindakan'        => safe_post('lt_nama_tindakan') !== '' ? safe_post('lt_nama_tindakan') : NULL,
        'lt_diagnosa_sebelum'     => safe_post('lt_diagnosa_sebelum') !== '' ? safe_post('lt_diagnosa_sebelum') : NULL,
        'lt_diagnosa_sesudah'     => safe_post('lt_diagnosa_sesudah') !== '' ? safe_post('lt_diagnosa_sesudah') : NULL,
        'lt_pa'                   => safe_post('lt_pa') !== '' ? safe_post('lt_pa') : NULL,
        'lt_komplikasi'           => safe_post('lt_komplikasi') !== '' ? safe_post('lt_komplikasi') : NULL,
        'lt_pendarahan'           => safe_post('lt_pendarahan') !== '' ? safe_post('lt_pendarahan') : NULL,
        'lt_tanggal'              => safe_post('lt_tanggal') !== '' ? date2mysql(safe_post('lt_tanggal')) : NULL,
        'lt_waktu_mulai'          => safe_post('lt_waktu_mulai') !== '' ? safe_post('lt_waktu_mulai') : NULL,
        'lt_waktu_selesai'        => safe_post('lt_waktu_selesai') !== '' ? safe_post('lt_waktu_selesai') : NULL,
        'lt_lama_waktu'           => safe_post('lt_lama_waktu') !== '' ? safe_post('lt_lama_waktu') : NULL,
        'lt_laporan_tindakan'     => safe_post('lt_laporan_tindakan') !== '' ? safe_post('lt_laporan_tindakan') : NULL,
        'lt_paraf_dokter'         => safe_post('lt_paraf_dokter') !== '' ? safe_post('lt_paraf_dokter') : NULL,
        'lt_paraf_bidan'          => safe_post('lt_paraf_bidan') !== '' ? safe_post('lt_paraf_bidan') : NULL,
        'lt_paraf_perawat'        => safe_post('lt_paraf_perawat') !== '' ? safe_post('lt_paraf_perawat') : NULL,
        'lt_dokter'               => safe_post('lt_dokter') !== '' ? safe_post('lt_dokter') : NULL,
        'lt_bidan'                => safe_post('lt_bidan') !== '' ? safe_post('lt_bidan') : NULL,
        'lt_perawat'              => safe_post('lt_perawat') !== '' ? safe_post('lt_perawat') : NULL,
        'created_date'				 		=> $this->datetime

      );
      // $filtered_array = array_filter($data_lt);
      // var_dump('update');
      // var_dump($data_lt);die;
      $this->db->where('id', $lt_id);
      $this->db->update('sm_laporan_tindakan', $data_lt);
    } else {
      $data_lt = array(
        'id_layanan_pendaftaran'  => $layanan['id'],
        'id_pendaftaran'          => $pendaftaran['id'],
        'id_users'					 		  => $this->session->userdata('id_translucent'),

        'lt_nama_tindakan'        => safe_post('lt_nama_tindakan') !== '' ? safe_post('lt_nama_tindakan') : NULL,
        'lt_diagnosa_sebelum'     => safe_post('lt_diagnosa_sebelum') !== '' ? safe_post('lt_diagnosa_sebelum') : NULL,
        'lt_diagnosa_sesudah'     => safe_post('lt_diagnosa_sesudah') !== '' ? safe_post('lt_diagnosa_sesudah') : NULL,
        'lt_pa'                   => safe_post('lt_pa') !== '' ? safe_post('lt_pa') : NULL,
        'lt_komplikasi'           => safe_post('lt_komplikasi') !== '' ? safe_post('lt_komplikasi') : NULL,
        'lt_pendarahan'           => safe_post('lt_pendarahan') !== '' ? safe_post('lt_pendarahan') : NULL,
        'lt_tanggal'              => safe_post('lt_tanggal') !== '' ? date2mysql(safe_post('lt_tanggal')) : NULL,
        'lt_waktu_mulai'          => safe_post('lt_waktu_mulai') !== '' ? safe_post('lt_waktu_mulai') : NULL,
        'lt_waktu_selesai'        => safe_post('lt_waktu_selesai') !== '' ? safe_post('lt_waktu_selesai') : NULL,
        'lt_lama_waktu'           => safe_post('lt_lama_waktu') !== '' ? safe_post('lt_lama_waktu') : NULL,
        'lt_laporan_tindakan'     => safe_post('lt_laporan_tindakan') !== '' ? safe_post('lt_laporan_tindakan') : NULL,
        'lt_paraf_dokter'         => safe_post('lt_paraf_dokter') !== '' ? safe_post('lt_paraf_dokter') : NULL,
        'lt_paraf_bidan'          => safe_post('lt_paraf_bidan') !== '' ? safe_post('lt_paraf_bidan') : NULL,
        'lt_paraf_perawat'        => safe_post('lt_paraf_perawat') !== '' ? safe_post('lt_paraf_perawat') : NULL,
        'lt_dokter'               => safe_post('lt_dokter') !== '' ? safe_post('lt_dokter') : NULL,
        'lt_bidan'                => safe_post('lt_bidan') !== '' ? safe_post('lt_bidan') : NULL,
        'lt_perawat'              => safe_post('lt_perawat') !== '' ? safe_post('lt_perawat') : NULL,
        'created_date'				 	  => $this->datetime

      );
      // var_dump('simpan');
      // var_dump($data_lt);die;
      $this->db->insert('sm_laporan_tindakan', $data_lt);
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

  public function simpan_rkm_post()
  {
    $this->db->trans_begin();
    $layanan = array('id' => safe_post('id_layanan_pendaftaran'));
    $pendaftaran = array('id' => safe_post('id_pendaftaran'));
    $rkm_id = safe_post('rkm_id');

    // LAPORAN TINDAKAN
    if ($rkm_id !== '') {
      $data_rkm = array(
        'id_layanan_pendaftaran'  => $layanan['id'],
        'id_pendaftaran'          => $pendaftaran['id'],
        'id_users'					 		  => $this->session->userdata('id_translucent'),

        'rkm_kiri_jauh_Spher'     => safe_post('rkm_kiri_jauh_Spher') !== '' ? safe_post('rkm_kiri_jauh_Spher') : NULL,
        'rkm_kiri_jauh_cyl'       => safe_post('rkm_kiri_jauh_cyl') !== '' ? safe_post('rkm_kiri_jauh_cyl') : NULL,
        'rkm_kiri_jauh_axis'      => safe_post('rkm_kiri_jauh_axis') !== '' ? safe_post('rkm_kiri_jauh_axis') : NULL,
        'rkm_kiri_jauh_prism'     => safe_post('rkm_kiri_jauh_prism') !== '' ? safe_post('rkm_kiri_jauh_prism') : NULL,
        'rkm_kiri_jauh_bas'       => safe_post('rkm_kiri_jauh_bas') !== '' ? safe_post('rkm_kiri_jauh_bas') : NULL,
        'rkm_kanan_jauh_Spher'    => safe_post('rkm_kanan_jauh_Spher') !== '' ? safe_post('rkm_kanan_jauh_Spher') : NULL,
        'rkm_kanan_jauh_cyl'      => safe_post('rkm_kanan_jauh_cyl') !== '' ? safe_post('rkm_kanan_jauh_cyl') : NULL,
        'rkm_kanan_jauh_axis'     => safe_post('rkm_kanan_jauh_axis') !== '' ? safe_post('rkm_kanan_jauh_axis') : NULL,
        'rkm_kanan_jauh_prism'    => safe_post('rkm_kanan_jauh_prism') !== '' ? safe_post('rkm_kanan_jauh_prism') : NULL,
        'rkm_kanan_jauh_bas'      => safe_post('rkm_kanan_jauh_bas') !== '' ? safe_post('rkm_kanan_jauh_bas') : NULL,
        'rkm_jauh_pupil'          => safe_post('rkm_jauh_pupil') !== '' ? safe_post('rkm_jauh_pupil') : NULL,
        'rkm_kiri_dekat_Spher'    => safe_post('rkm_kiri_dekat_Spher') !== '' ? safe_post('rkm_kiri_dekat_Spher') : NULL,
        'rkm_kiri_dekat_cyl'      => safe_post('rkm_kiri_dekat_cyl') !== '' ? safe_post('rkm_kiri_dekat_cyl') : NULL,
        'rkm_kiri_dekat_axis'     => safe_post('rkm_kiri_dekat_axis') !== '' ? safe_post('rkm_kiri_dekat_axis') : NULL,
        'rkm_kiri_dekat_prism'    => safe_post('rkm_kiri_dekat_prism') !== '' ? safe_post('rkm_kiri_dekat_prism') : NULL,
        'rkm_kiri_dekat_bas'      => safe_post('rkm_kiri_dekat_bas') !== '' ? safe_post('rkm_kiri_dekat_bas') : NULL,
        'rkm_kanan_dekat_Spher'   => safe_post('rkm_kanan_dekat_Spher') !== '' ? safe_post('rkm_kanan_dekat_Spher') : NULL,
        'rkm_kanan_dekat_cyl'     => safe_post('rkm_kanan_dekat_cyl') !== '' ? safe_post('rkm_kanan_dekat_cyl') : NULL,
        'rkm_kanan_dekat_axis'    => safe_post('rkm_kanan_dekat_axis') !== '' ? safe_post('rkm_kanan_dekat_axis') : NULL,
        'rkm_kanan_dekat_prism'   => safe_post('rkm_kanan_dekat_prism') !== '' ? safe_post('rkm_kanan_dekat_prism') : NULL,
        'rkm_kanan_dekat_bas'     => safe_post('rkm_kanan_dekat_bas') !== '' ? safe_post('rkm_kanan_dekat_bas') : NULL,
        'rkm_dekat_pupil'         => safe_post('rkm_dekat_pupil') !== '' ? safe_post('rkm_dekat_pupil') : NULL,
        
        'rkm_tanggal'             => safe_post('rkm_tanggal') !== '' ? date2mysql(safe_post('rkm_tanggal')) : NULL,
        'rkm_paraf_dokter'        => safe_post('rkm_paraf_dokter') !== '' ? safe_post('rkm_paraf_dokter') : NULL,
        'rkm_dokter'              => safe_post('rkm_dokter') !== '' ? safe_post('rkm_dokter') : NULL,
        'created_date'				 		=> $this->datetime

      );
      // var_dump('update');
      // var_dump($data_rkm);die;
      $this->db->where('id', $rkm_id);
      $this->db->update('sm_resep_kaca_mata', $data_rkm);
    } else {
      $data_rkm = array(
        'id_layanan_pendaftaran'  => $layanan['id'],
        'id_pendaftaran'          => $pendaftaran['id'],
        'id_users'					 		  => $this->session->userdata('id_translucent'),

        'rkm_kiri_jauh_Spher'     => safe_post('rkm_kiri_jauh_Spher') !== '' ? safe_post('rkm_kiri_jauh_Spher') : NULL,
        'rkm_kiri_jauh_cyl'       => safe_post('rkm_kiri_jauh_cyl') !== '' ? safe_post('rkm_kiri_jauh_cyl') : NULL,
        'rkm_kiri_jauh_axis'      => safe_post('rkm_kiri_jauh_axis') !== '' ? safe_post('rkm_kiri_jauh_axis') : NULL,
        'rkm_kiri_jauh_prism'     => safe_post('rkm_kiri_jauh_prism') !== '' ? safe_post('rkm_kiri_jauh_prism') : NULL,
        'rkm_kiri_jauh_bas'       => safe_post('rkm_kiri_jauh_bas') !== '' ? safe_post('rkm_kiri_jauh_bas') : NULL,
        'rkm_kanan_jauh_Spher'    => safe_post('rkm_kanan_jauh_Spher') !== '' ? safe_post('rkm_kanan_jauh_Spher') : NULL,
        'rkm_kanan_jauh_cyl'      => safe_post('rkm_kanan_jauh_cyl') !== '' ? safe_post('rkm_kanan_jauh_cyl') : NULL,
        'rkm_kanan_jauh_axis'     => safe_post('rkm_kanan_jauh_axis') !== '' ? safe_post('rkm_kanan_jauh_axis') : NULL,
        'rkm_kanan_jauh_prism'    => safe_post('rkm_kanan_jauh_prism') !== '' ? safe_post('rkm_kanan_jauh_prism') : NULL,
        'rkm_kanan_jauh_bas'      => safe_post('rkm_kanan_jauh_bas') !== '' ? safe_post('rkm_kanan_jauh_bas') : NULL,
        'rkm_jauh_pupil'          => safe_post('rkm_jauh_pupil') !== '' ? safe_post('rkm_jauh_pupil') : NULL,
        'rkm_kiri_dekat_Spher'    => safe_post('rkm_kiri_dekat_Spher') !== '' ? safe_post('rkm_kiri_dekat_Spher') : NULL,
        'rkm_kiri_dekat_cyl'      => safe_post('rkm_kiri_dekat_cyl') !== '' ? safe_post('rkm_kiri_dekat_cyl') : NULL,
        'rkm_kiri_dekat_axis'     => safe_post('rkm_kiri_dekat_axis') !== '' ? safe_post('rkm_kiri_dekat_axis') : NULL,
        'rkm_kiri_dekat_prism'    => safe_post('rkm_kiri_dekat_prism') !== '' ? safe_post('rkm_kiri_dekat_prism') : NULL,
        'rkm_kiri_dekat_bas'      => safe_post('rkm_kiri_dekat_bas') !== '' ? safe_post('rkm_kiri_dekat_bas') : NULL,
        'rkm_kanan_dekat_Spher'   => safe_post('rkm_kanan_dekat_Spher') !== '' ? safe_post('rkm_kanan_dekat_Spher') : NULL,
        'rkm_kanan_dekat_cyl'     => safe_post('rkm_kanan_dekat_cyl') !== '' ? safe_post('rkm_kanan_dekat_cyl') : NULL,
        'rkm_kanan_dekat_axis'    => safe_post('rkm_kanan_dekat_axis') !== '' ? safe_post('rkm_kanan_dekat_axis') : NULL,
        'rkm_kanan_dekat_prism'   => safe_post('rkm_kanan_dekat_prism') !== '' ? safe_post('rkm_kanan_dekat_prism') : NULL,
        'rkm_kanan_dekat_bas'     => safe_post('rkm_kanan_dekat_bas') !== '' ? safe_post('rkm_kanan_dekat_bas') : NULL,
        'rkm_dekat_pupil'         => safe_post('rkm_dekat_pupil') !== '' ? safe_post('rkm_dekat_pupil') : NULL,
        
        'rkm_tanggal'             => safe_post('rkm_tanggal') !== '' ? date2mysql(safe_post('rkm_tanggal')) : NULL,
        'rkm_paraf_dokter'        => safe_post('rkm_paraf_dokter') !== '' ? safe_post('rkm_paraf_dokter') : NULL,
        'rkm_dokter'              => safe_post('rkm_dokter') !== '' ? safe_post('rkm_dokter') : NULL,
        'created_date'				 		=> $this->datetime

      );
      // var_dump('simpan');
      // var_dump($data_rkm);die;
      $this->db->insert('sm_resep_kaca_mata', $data_rkm);
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

  // grafik
  public function simpan_fpgg_post()
  {
    $this->db->trans_begin();
    $layanan = array('id' => safe_post('id_layanan_pendaftaran'));
    $pendaftaran = array('id' => safe_post('id_pendaftaran'));
    $fpgg_id = safe_post('fpgg_id');

    // Fenton pretern growth chart girls
    if ($fpgg_id !== '') {
      $data_fpgg = array(
        'id_layanan_pendaftaran'  => $layanan['id'],
        'id_pendaftaran'          => $pendaftaran['id'],
        'id_users'					 		  => $this->session->userdata('id_translucent'),
        'created_date'				 		=> $this->datetime

      );
      var_dump('update');
      var_dump($data_fpgg);die;
      $this->db->where('id', $fpgg_id);
      $this->db->update('sm_growth_girls', $data_fpgg);
    } else {
      $data_fpgg = array(
        'id_layanan_pendaftaran'  => $layanan['id'],
        'id_pendaftaran'          => $pendaftaran['id'],
        'id_users'					 		  => $this->session->userdata('id_translucent'),
        'created_date'				 		=> $this->datetime

      );
      // var_dump('simpan');
      // var_dump($data_fpgg);die;
      $this->db->insert('sm_growth_girls', $data_fpgg);
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

  public function simpan_fpg_post()
  {
    $this->db->trans_begin();
    $layanan = array('id' => safe_post('id_layanan_pendaftaran'));
    $pendaftaran = array('id' => safe_post('id_pendaftaran'));
    $fpg_id = safe_post('fpg_id');

    // Fenton pretern growth chart girls
    if ($fpg_id !== '') {
      $data_fpg = array(
        'id_layanan_pendaftaran'  => $layanan['id'],
        'id_pendaftaran'          => $pendaftaran['id'],
        'id_users'					 		  => $this->session->userdata('id_translucent'),
        'created_date'				 		=> $this->datetime

      );
      // var_dump('update');
      // var_dump($data_fpg);die;
      $this->db->where('id', $fpg_id);
      $this->db->update('sm_growth_boys', $data_fpg);
    } else {
      $data_fpg = array(
        'id_layanan_pendaftaran'  => $layanan['id'],
        'id_pendaftaran'          => $pendaftaran['id'],
        'id_users'					 		  => $this->session->userdata('id_translucent'),
        'created_date'				 		=> $this->datetime

      );
      // var_dump('simpan');
      // var_dump($data_fpg);die;
      $this->db->insert('sm_growth_boys', $data_fpg);
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
  
  public function simpan_wfl_post()
  {
    $this->db->trans_begin();
    $layanan = array('id' => safe_post('id_layanan_pendaftaran'));
    $pendaftaran = array('id' => safe_post('id_pendaftaran'));
    $wfl_id = safe_post('wfl_id');

    // Fenton pretern growth chart girls
    if ($wfl_id !== '') {
      $data_wfl = array(
        'id_layanan_pendaftaran'  => $layanan['id'],
        'id_pendaftaran'          => $pendaftaran['id'],
        'id_users'					 		  => $this->session->userdata('id_translucent'),
        'created_date'				 		=> $this->datetime

      );
      // var_dump('update');
      // var_dump($data_wfl);die;
      $this->db->where('id', $wfl_id);
      $this->db->update('sm_weight_fot_leght_boys', $data_wfl);
    } else {
      $data_wfl = array(
        'id_layanan_pendaftaran'  => $layanan['id'],
        'id_pendaftaran'          => $pendaftaran['id'],
        'id_users'					 		  => $this->session->userdata('id_translucent'),
        'created_date'				 		=> $this->datetime

      );
      // var_dump('simpan');
      // var_dump($data_wfl);die;
      $this->db->insert('sm_weight_fot_leght_boys', $data_wfl);
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
  
  public function simpan_bfb_post()
  {
    $this->db->trans_begin();
    $layanan = array('id' => safe_post('id_layanan_pendaftaran'));
    $pendaftaran = array('id' => safe_post('id_pendaftaran'));
    $bfb_id = safe_post('bfb_id');

    // Fenton pretern growth chart girls
    if ($bfb_id !== '') {
      $data_bfb = array(
        'id_layanan_pendaftaran'  => $layanan['id'],
        'id_pendaftaran'          => $pendaftaran['id'],
        'id_users'					 		  => $this->session->userdata('id_translucent'),
        'created_date'				 		=> $this->datetime

      );
      // var_dump('update');
      // var_dump($data_bfb);die;
      $this->db->where('id', $bfb_id);
      $this->db->update('sm_bmi_boys', $data_bfb);
    } else {
      $data_bfb = array(
        'id_layanan_pendaftaran'  => $layanan['id'],
        'id_pendaftaran'          => $pendaftaran['id'],
        'id_users'					 		  => $this->session->userdata('id_translucent'),
        'created_date'				 		=> $this->datetime

      );
      // var_dump('simpan');
      // var_dump($data_bfb);die;
      $this->db->insert('sm_bmi_boys', $data_bfb);
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

  public function simpan_wfb_post()
  {
    $this->db->trans_begin();
    $layanan = array('id' => safe_post('id_layanan_pendaftaran'));
    $pendaftaran = array('id' => safe_post('id_pendaftaran'));
    $wfb_id = safe_post('wfb_id');

    // Fenton pretern growth chart girls
    if ($wfb_id !== '') {
      $data_wfb = array(
        'id_layanan_pendaftaran'  => $layanan['id'],
        'id_pendaftaran'          => $pendaftaran['id'],
        'id_users'					 		  => $this->session->userdata('id_translucent'),
        'created_date'				 		=> $this->datetime

      );
      // var_dump('update');
      // var_dump($data_wfb);die;
      $this->db->where('id', $wfb_id);
      $this->db->update('sm_weight_boys', $data_wfb);
    } else {
      $data_wfb = array(
        'id_layanan_pendaftaran'  => $layanan['id'],
        'id_pendaftaran'          => $pendaftaran['id'],
        'id_users'					 		  => $this->session->userdata('id_translucent'),
        'created_date'				 		=> $this->datetime

      );
      // var_dump('simpan');
      // var_dump($data_wfb);die;
      $this->db->insert('sm_weight_boys', $data_wfb);
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

  public function simpan_wfh_post()
  {
    $this->db->trans_begin();
    $layanan = array('id' => safe_post('id_layanan_pendaftaran'));
    $pendaftaran = array('id' => safe_post('id_pendaftaran'));
    $wfh_id = safe_post('wfh_id');

    // Fenton pretern growth chart girls
    if ($wfh_id !== '') {
      $data_wfh = array(
        'id_layanan_pendaftaran'  => $layanan['id'],
        'id_pendaftaran'          => $pendaftaran['id'],
        'id_users'					 		  => $this->session->userdata('id_translucent'),
        'created_date'				 		=> $this->datetime

      );
      // var_dump('update');
      // var_dump($data_wfh);die;
      $this->db->where('id', $wfh_id);
      $this->db->update('sm_weight_fot_height_boys', $data_wfh);
    } else {
      $data_wfh = array(
        'id_layanan_pendaftaran'  => $layanan['id'],
        'id_pendaftaran'          => $pendaftaran['id'],
        'id_users'					 		  => $this->session->userdata('id_translucent'),
        'created_date'				 		=> $this->datetime

      );
      // var_dump('simpan');
      // var_dump($data_wfh);die;
      $this->db->insert('sm_weight_fot_height_boys', $data_wfh);
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

  public function simpan_cfb_post()
  {
    $this->db->trans_begin();
    $layanan = array('id' => safe_post('id_layanan_pendaftaran'));
    $pendaftaran = array('id' => safe_post('id_pendaftaran'));
    $cfb_id = safe_post('cfb_id');

    // Fenton pretern growth chart girls
    if ($cfb_id !== '') {
      $data_cfb = array(
        'id_layanan_pendaftaran'  => $layanan['id'],
        'id_pendaftaran'          => $pendaftaran['id'],
        'id_users'					 		  => $this->session->userdata('id_translucent'),
        'created_date'				 		=> $this->datetime

      );
      // var_dump('update');
      // var_dump($data_cfb);die;
      $this->db->where('id', $cfb_id);
      $this->db->update('sm_head_boys', $data_cfb);
    } else {
      $data_cfb = array(
        'id_layanan_pendaftaran'  => $layanan['id'],
        'id_pendaftaran'          => $pendaftaran['id'],
        'id_users'					 		  => $this->session->userdata('id_translucent'),
        'created_date'				 		=> $this->datetime

      );
      // var_dump('simpan');
      // var_dump($data_cfb);die;
      $this->db->insert('sm_head_boys', $data_cfb);
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
  

  public function simpan_hfb_post()
  {
    $this->db->trans_begin();
    $layanan = array('id' => safe_post('id_layanan_pendaftaran'));
    $pendaftaran = array('id' => safe_post('id_pendaftaran'));
    $hfb_id = safe_post('hfb_id');

    // Fenton pretern growth chart girls
    if ($hfb_id !== '') {
      $data_hfb = array(
        'id_layanan_pendaftaran'  => $layanan['id'],
        'id_pendaftaran'          => $pendaftaran['id'],
        'id_users'					 		  => $this->session->userdata('id_translucent'),
        'created_date'				 		=> $this->datetime

      );
      // var_dump('update');
      // var_dump($data_hfb);die;
      $this->db->where('id', $hfb_id);
      $this->db->update('sm_length_boys', $data_hfb);
    } else {
      $data_hfb = array(
        'id_layanan_pendaftaran'  => $layanan['id'],
        'id_pendaftaran'          => $pendaftaran['id'],
        'id_users'					 		  => $this->session->userdata('id_translucent'),
        'created_date'				 		=> $this->datetime

      );
      // var_dump('simpan');
      // var_dump($data_hfb);die;
      $this->db->insert('sm_length_boys', $data_hfb);
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

  public function simpan_wflg_post()
  {
    $this->db->trans_begin();
    $layanan = array('id' => safe_post('id_layanan_pendaftaran'));
    $pendaftaran = array('id' => safe_post('id_pendaftaran'));
    $wflg_id = safe_post('wflg_id');

    // Fenton pretern growth chart girls
    if ($wflg_id !== '') {
      $data_wflg = array(
        'id_layanan_pendaftaran'  => $layanan['id'],
        'id_pendaftaran'          => $pendaftaran['id'],
        'id_users'					 		  => $this->session->userdata('id_translucent'),
        'created_date'				 		=> $this->datetime

      );
      // var_dump('update');
      // var_dump($data_wflg);die;
      $this->db->where('id', $wflg_id);
      $this->db->update('sm_weight_fot_leght_girls', $data_wflg);
    } else {
      $data_wflg = array(
        'id_layanan_pendaftaran'  => $layanan['id'],
        'id_pendaftaran'          => $pendaftaran['id'],
        'id_users'					 		  => $this->session->userdata('id_translucent'),
        'created_date'				 		=> $this->datetime

      );
      // var_dump('simpan');
      // var_dump($data_wflg);die;
      $this->db->insert('sm_weight_fot_leght_girls', $data_wflg);
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

  public function simpan_bfg_post()
  {
    $this->db->trans_begin();
    $layanan = array('id' => safe_post('id_layanan_pendaftaran'));
    $pendaftaran = array('id' => safe_post('id_pendaftaran'));
    $bfg_id = safe_post('bfg_id');

    // Fenton pretern growth chart girls
    if ($bfg_id !== '') {
      $data_bfg = array(
        'id_layanan_pendaftaran'  => $layanan['id'],
        'id_pendaftaran'          => $pendaftaran['id'],
        'id_users'					 		  => $this->session->userdata('id_translucent'),
        'created_date'				 		=> $this->datetime

      );
      // var_dump('update');
      // var_dump($data_bfg);die;
      $this->db->where('id', $bfg_id);
      $this->db->update('sm_bmi_girls', $data_bfg);
    } else {
      $data_bfg = array(
        'id_layanan_pendaftaran'  => $layanan['id'],
        'id_pendaftaran'          => $pendaftaran['id'],
        'id_users'					 		  => $this->session->userdata('id_translucent'),
        'created_date'				 		=> $this->datetime

      );
      // var_dump('simpan');
      // var_dump($data_bfg);die;
      $this->db->insert('sm_bmi_girls', $data_bfg);
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

  public function simpan_wfg_post()
  {
    $this->db->trans_begin();
    $layanan = array('id' => safe_post('id_layanan_pendaftaran'));
    $pendaftaran = array('id' => safe_post('id_pendaftaran'));
    $wfg_id = safe_post('wfg_id');

    // Fenton pretern growth chart girls
    if ($wfg_id !== '') {
      $data_wfg = array(
        'id_layanan_pendaftaran'  => $layanan['id'],
        'id_pendaftaran'          => $pendaftaran['id'],
        'id_users'					 		  => $this->session->userdata('id_translucent'),
        'created_date'				 		=> $this->datetime

      );
      // var_dump('update');
      // var_dump($data_wfg);die;
      $this->db->where('id', $wfg_id);
      $this->db->update('sm_weight_girls', $data_wfg);
    } else {
      $data_wfg = array(
        'id_layanan_pendaftaran'  => $layanan['id'],
        'id_pendaftaran'          => $pendaftaran['id'],
        'id_users'					 		  => $this->session->userdata('id_translucent'),
        'created_date'				 		=> $this->datetime

      );
      // var_dump('simpan');
      // var_dump($data_wfg);die;
      $this->db->insert('sm_weight_girls', $data_wfg);
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

  public function simpan_wfhg_post()
  {
    $this->db->trans_begin();
    $layanan = array('id' => safe_post('id_layanan_pendaftaran'));
    $pendaftaran = array('id' => safe_post('id_pendaftaran'));
    $wfhg_id = safe_post('wfhg_id');

    // Fenton pretern growth chart girls
    if ($wfhg_id !== '') {
      $data_wfhg = array(
        'id_layanan_pendaftaran'  => $layanan['id'],
        'id_pendaftaran'          => $pendaftaran['id'],
        'id_users'					 		  => $this->session->userdata('id_translucent'),
        'created_date'				 		=> $this->datetime

      );
      // var_dump('update');
      // var_dump($data_wfhg);die;
      $this->db->where('id', $wfhg_id);
      $this->db->update('sm_weight_fot_height_girls', $data_wfhg);
    } else {
      $data_wfhg = array(
        'id_layanan_pendaftaran'  => $layanan['id'],
        'id_pendaftaran'          => $pendaftaran['id'],
        'id_users'					 		  => $this->session->userdata('id_translucent'),
        'created_date'				 		=> $this->datetime

      );
      // var_dump('simpan');
      // var_dump($data_wfhg);die;
      $this->db->insert('sm_weight_fot_height_girls', $data_wfhg);
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

  public function simpan_cfg_post()
  {
    $this->db->trans_begin();
    $layanan = array('id' => safe_post('id_layanan_pendaftaran'));
    $pendaftaran = array('id' => safe_post('id_pendaftaran'));
    $cfg_id = safe_post('cfg_id');

    // Fenton pretern growth chart girls
    if ($cfg_id !== '') {
      $data_cfg = array(
        'id_layanan_pendaftaran'  => $layanan['id'],
        'id_pendaftaran'          => $pendaftaran['id'],
        'id_users'					 		  => $this->session->userdata('id_translucent'),
        'created_date'				 		=> $this->datetime

      );
      // var_dump('update');
      // var_dump($data_cfg);die;
      $this->db->where('id', $cfg_id);
      $this->db->update('sm_head_girls', $data_cfg);
    } else {
      $data_cfg = array(
        'id_layanan_pendaftaran'  => $layanan['id'],
        'id_pendaftaran'          => $pendaftaran['id'],
        'id_users'					 		  => $this->session->userdata('id_translucent'),
        'created_date'				 		=> $this->datetime

      );
      // var_dump('simpan');
      // var_dump($data_cfg);die;
      $this->db->insert('sm_head_girls', $data_cfg);
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

  public function simpan_hfg_post()
  {
    $this->db->trans_begin();
    $layanan = array('id' => safe_post('id_layanan_pendaftaran'));
    $pendaftaran = array('id' => safe_post('id_pendaftaran'));
    $hfg_id = safe_post('hfg_id');

    // Fenton pretern growth chart girls
    if ($hfg_id !== '') {
      $data_hfg = array(
        'id_layanan_pendaftaran'  => $layanan['id'],
        'id_pendaftaran'          => $pendaftaran['id'],
        'id_users'					 		  => $this->session->userdata('id_translucent'),
        'created_date'				 		=> $this->datetime

      );
      // var_dump('update');
      // var_dump($data_hfg);die;
      $this->db->where('id', $hfg_id);
      $this->db->update('sm_length_girls', $data_hfg);
    } else {
      $data_hfg = array(
        'id_layanan_pendaftaran'  => $layanan['id'],
        'id_pendaftaran'          => $pendaftaran['id'],
        'id_users'					 		  => $this->session->userdata('id_translucent'),
        'created_date'				 		=> $this->datetime

      );
      // var_dump('simpan');
      // var_dump($data_hfg);die;
      $this->db->insert('sm_length_girls', $data_hfg);
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

  // end grafik





















  // Kelaikan Bekerja
  public function simpan_kb_post(){
    $this->db->trans_begin();
    $layanan = array('id' => safe_post('id_layanan_pendaftaran'));
    $pendaftaran = array('id' => safe_post('id_pendaftaran'));
    $kb_id = safe_post('kb_id');

    // LAPORAN TINDAKAN
    if ($kb_id !== '') {
      $data_kb = array(
        'id_layanan_pendaftaran'  => $layanan['id'],
        'id_pendaftaran'          => $pendaftaran['id'],
        'id_users'					 		  => $this->session->userdata('id_translucent'),

        'kb_nomor_1'              => safe_post('kb_nomor_1') !== '' ? safe_post('kb_nomor_1') : NULL,
        'kb_nomor_2'              => safe_post('kb_nomor_2') !== '' ? safe_post('kb_nomor_2') : NULL,
        'kb_permintaan_dari'      => safe_post('kb_permintaan_dari') !== '' ? safe_post('kb_permintaan_dari') : NULL,
        'kb_permintaan_nomor'     => safe_post('kb_permintaan_nomor') !== '' ? safe_post('kb_permintaan_nomor') : NULL,
        'kb_permintaan_tanggal'   => safe_post('kb_permintaan_tanggal') !== '' ? date2mysql(safe_post('kb_permintaan_tanggal')) : NULL,
        'kb_keterangan'           => safe_post('kb_keterangan') !== '' ? safe_post('kb_keterangan') : NULL,
        'kb_tanggal'              => safe_post('kb_tanggal') !== '' ? date2mysql(safe_post('kb_tanggal')) : NULL,
        'created_date'				 		=> $this->datetime

      );
      // var_dump('update');
      // var_dump($data_kb);die;
      $this->db->where('id', $kb_id);
      $this->db->update('sm_mcu_16_00', $data_kb);
    } else {
      $data_kb = array(
        'id_layanan_pendaftaran'  => $layanan['id'],
        'id_pendaftaran'          => $pendaftaran['id'],
        'id_users'					 		  => $this->session->userdata('id_translucent'),

        'kb_nomor_1'              => safe_post('kb_nomor_1') !== '' ? safe_post('kb_nomor_1') : NULL,
        'kb_nomor_2'              => safe_post('kb_nomor_2') !== '' ? safe_post('kb_nomor_2') : NULL,
        'kb_permintaan_dari'      => safe_post('kb_permintaan_dari') !== '' ? safe_post('kb_permintaan_dari') : NULL,
        'kb_permintaan_nomor'     => safe_post('kb_permintaan_nomor') !== '' ? safe_post('kb_permintaan_nomor') : NULL,
        'kb_permintaan_tanggal'   => safe_post('kb_permintaan_tanggal') !== '' ? date2mysql(safe_post('kb_permintaan_tanggal')) : NULL,
        'kb_keterangan'           => safe_post('kb_keterangan') !== '' ? safe_post('kb_keterangan') : NULL,
        'kb_tanggal'              => safe_post('kb_tanggal') !== '' ? date2mysql(safe_post('kb_tanggal')) : NULL,
        'created_date'				 		=> $this->datetime

      );
      // var_dump('simpan');
      // var_dump($data_kb);die;
      $this->db->insert('sm_mcu_16_00', $data_kb);
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























  // // Lembar Observasi
  // public function simpan_lo_post()
  // {
  //   $this->db->trans_begin();

  //   // Mengambil data dari input POST
  //   $lo_id = safe_post('lo_id');
  //   $layanan_id = safe_post('id_layanan_pendaftaran');
  //   $pendaftaran_id = safe_post('id_pendaftaran');
  //   $id_user = safe_post('id_user');
  //   $lo_tgl = safe_post('lo_tgl', true);
  //   $lo_td = safe_post('lo_td', true);
  //   $lo_n = safe_post('lo_n', true);
  //   $lo_r = safe_post('lo_r', true);
  //   $lo_s = safe_post('lo_s', true);
  //   $lo_sat = safe_post('lo_sat', true);
  //   $lo_djj = safe_post('lo_djj', true);
  //   $lo_his = safe_post('lo_his', true);
  //   $lo_tfu = safe_post('lo_tfu', true);
  //   $lo_kontraksi = safe_post('lo_kontraksi', true);
  //   $lo_perdarahan = safe_post('lo_perdarahan', true);
  //   $lo_urin = safe_post('lo_urin', true);
  //   $lo_ket = safe_post('lo_ket', true);

  //   $data_to_insert = array();

  //   // Pastikan $lo_tgl adalah array sebelum melakukan count
  //   if (is_array($lo_tgl) || $lo_tgl instanceof Countable) {
  //       $count = count($lo_tgl);
  //   } else {
  //       $count = 0; // Atau menangani kesalahan dengan cara lain
  //   }

  //   for ($i = 0; $i < $count; $i++) {
  //     // Pengecekan apakah data sudah ada dalam database
  //     $existing_data = $this->db->get_where('sm_kep_73_01', array(
  //         'id_user' => $id_user[$i],
  //         'lo_tgl' => datetime2mysql($lo_tgl[$i]),
  //         'id_layanan_pendaftaran' => $layanan_id,
  //     ))->row_array();

  //     if (!empty($existing_data)) {
  //         // Jika data sudah ada, lakukan pembaruan
  //         $data_lo = array(
  //           'lo_td' => !empty($lo_td[$i]) ? $lo_td[$i] : NULL,
  //           'lo_n' => !empty($lo_n[$i]) ? $lo_n[$i] : NULL,
  //           'lo_r' => !empty($lo_r[$i]) ? $lo_r[$i] : NULL,
  //           'lo_s' => !empty($lo_s[$i]) ? $lo_s[$i] : NULL,
  //           'lo_sat' => !empty($lo_sat[$i]) ? $lo_sat[$i] : NULL,
  //           'lo_djj' => !empty($lo_djj[$i]) ? $lo_djj[$i] : NULL,
  //           'lo_his' => !empty($lo_his[$i]) ? $lo_his[$i] : NULL,
  //           'lo_tfu' => !empty($lo_tfu[$i]) ? $lo_tfu[$i] : NULL,
  //           'lo_kontraksi' => !empty($lo_kontraksi[$i]) ? $lo_kontraksi[$i] : NULL,
  //           'lo_perdarahan' => !empty($lo_perdarahan[$i]) ? $lo_perdarahan[$i] : NULL,
  //           'lo_urin' => !empty($lo_urin[$i]) ? $lo_urin[$i] : NULL,
  //           'lo_ket' => !empty($lo_ket[$i]) ? $lo_ket[$i] : NULL,
  //           'updated_date' => $this->datetime,
  //         );

  //         $this->db->where('id', $existing_data['id']);
  //         $this->db->update('sm_kep_73_01', $data_lo);
  //     } else {
  //         // Jika data tidak ada, lakukan penambahan data baru
  //         $data_lo = array(
  //           'id_layanan_pendaftaran' => $layanan_id,
  //           'id_pendaftaran' => $pendaftaran_id,
  //           'id_user' => $id_user[$i],
  //           'lo_tgl' => !empty($lo_tgl[$i]) ? datetime2mysql($lo_tgl[$i]) : NULL,
  //           'lo_td' => !empty($lo_td[$i]) ? $lo_td[$i] : NULL,
  //           'lo_n' => !empty($lo_n[$i]) ? $lo_n[$i] : NULL,
  //           'lo_r' => !empty($lo_r[$i]) ? $lo_r[$i] : NULL,
  //           'lo_s' => !empty($lo_s[$i]) ? $lo_s[$i] : NULL,
  //           'lo_sat' => !empty($lo_sat[$i]) ? $lo_sat[$i] : NULL,
  //           'lo_djj' => !empty($lo_djj[$i]) ? $lo_djj[$i] : NULL,
  //           'lo_his' => !empty($lo_his[$i]) ? $lo_his[$i] : NULL,
  //           'lo_tfu' => !empty($lo_tfu[$i]) ? $lo_tfu[$i] : NULL,
  //           'lo_kontraksi' => !empty($lo_kontraksi[$i]) ? $lo_kontraksi[$i] : NULL,
  //           'lo_perdarahan' => !empty($lo_perdarahan[$i]) ? $lo_perdarahan[$i] : NULL,
  //           'lo_urin' => !empty($lo_urin[$i]) ? $lo_urin[$i] : NULL,
  //           'lo_ket' => !empty($lo_ket[$i]) ? $lo_ket[$i] : NULL,
  //           'created_date' => $this->datetime,
  //         );

  //         $data_to_insert[] = $data_lo;
  //     }
  //   }

  //   if (!empty($data_to_insert)) {
  //       $this->db->insert_batch('sm_kep_73_01', $data_to_insert);
  //   }

  //   if ($this->db->trans_status() === false) {
  //       $this->db->trans_rollback();
  //       $status = false;
  //   } else {
  //       $this->db->trans_commit();
  //       $status = true;
  //   }

  //   $message = array(
  //       'status' => $status,
  //       'token' => $this->security->get_csrf_hash(),
  //       'id' => $layanan_id,
  //       'respon' => null,
  //   );

  //   $this->response($message, REST_Controller::HTTP_OK);
  // }

  // function get_edit_lo_get($id, $id_pendaftaran, $id_layanan)
  // {
  //     if (!$this->get('id')) :
  //       $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
  //     endif;

  //     // Lembar Observasi by ID
  //     $data['lo_detail'] = $this->m_pelayanan->getLoByID($id);
  //     // var_dump($data['lo_detail']);die;

  //     if ($data) :
  //       $this->response($data, REST_Controller::HTTP_OK); // (200)
  //     endif;
  // }

  // public function update_lo_put()
  // {
   
  //   $this->db->trans_begin();
  //   $layanan = array('id' => $this->put('id_layanan_pendaftaran'));
  //   $pendaftaran = array('id' => $this->put('id_pendaftaran'));
  //   $lo_id = $this->put('lo_id'); 

  //   // Lembar Observasi
  //   if ($lo_id !== '') {
  //     $data_lo = array(
  //       'id_user'					 		    => $this->session->userdata('id_translucent'),
  //       'lo_tgl'                  => $this->put('edit_lo_tgl')         !== '' ? datetime2mysql($this->put('edit_lo_tgl')) : NULL,
  //       'lo_td'                   => $this->put('edit_lo_td')          !== '' ? $this->put('edit_lo_td') : NULL,
  //       'lo_n'                    => $this->put('edit_lo_n')           !== '' ? $this->put('edit_lo_n') : NULL,
  //       'lo_r'                    => $this->put('edit_lo_r')           !== '' ? $this->put('edit_lo_r') : NULL,
  //       'lo_s'                    => $this->put('edit_lo_s')           !== '' ? $this->put('edit_lo_s') : NULL,
  //       'lo_sat'                  => $this->put('edit_lo_sat')         !== '' ? $this->put('edit_lo_sat') : NULL,
  //       'lo_djj'                  => $this->put('edit_lo_djj')         !== '' ? $this->put('edit_lo_djj') : NULL,
  //       'lo_his'                  => $this->put('edit_lo_his')         !== '' ? $this->put('edit_lo_his') : NULL,
  //       'lo_tfu'                  => $this->put('edit_lo_tfu')         !== '' ? $this->put('edit_lo_tfu') : NULL,
  //       'lo_kontraksi'            => $this->put('edit_lo_kontraksi')   !== '' ? $this->put('edit_lo_kontraksi') : NULL,
  //       'lo_perdarahan'           => $this->put('edit_lo_perdarahan')  !== '' ? $this->put('edit_lo_perdarahan') : NULL,
  //       'lo_urin'                 => $this->put('edit_lo_urin')        !== '' ? $this->put('edit_lo_urin') : NULL,
  //       'lo_ket'                  => $this->put('edit_lo_ket')         !== '' ? $this->put('edit_lo_ket') : NULL,
        
  //       'updated_date'            => $this->datetime

  //     );
  //     // var_dump('update');
  //     // var_dump($data_lo);die;
  //     $this->db->where('id', $lo_id);
  //     $this->db->update('sm_kep_73_01', $data_lo);
  //   } 
    
  //   // END FUNTION
  //   if (!empty($respon)) {
  //     $response = $respon;
  //   } else {
  //     $response = null;
  //   }

  //   if ($this->db->trans_status() === false) :
  //     $this->db->trans_rollback();
  //     $status = false;
  //   else :
  //     $this->db->trans_commit();
  //     $status = true;
  //   endif;

  //   $message = array(
  //     'status' => $status,
  //     'token' => $this->security->get_csrf_hash(),
  //     'id' => $layanan['id'],
  //     'respon' => $response,
  //   );

  //   $this->response($message, REST_Controller::HTTP_OK);
  // }

  // function hapus_lo_delete($id){
  //   // var_dump($id);die;
  //     $status = $this->m_pelayanan->deleteLo($id);
  //     if ($status) :
  //         $response = array('status' => $status, 'message' => 'Berhasil menghapus Pemantauan Restrain!');
  //     else :
  //         $response = array('status' => $status, 'message' => 'Gagal menghapus Pemantauan Restrain!');
  //     endif;
  //     $this->response($response, REST_Controller::HTTP_OK);
  // }


  // Lembar Observasi
  public function simpan_lo_post(){
    $this->db->trans_begin();
    // Mengambil data dari input POST
    $lo_id = safe_post('lo_id');
    $layanan_id = safe_post('id_layanan_pendaftaran');
    $pendaftaran_id = safe_post('id_pendaftaran');
    $id_user = safe_post('id_user');
    $lo_tgl = safe_post('lo_tgl', true);
    $lo_td = safe_post('lo_td', true);
    $lo_n = safe_post('lo_n', true);
    $lo_r = safe_post('lo_r', true);
    $lo_s = safe_post('lo_s', true);
    $lo_sat = safe_post('lo_sat', true);
    $lo_djj = safe_post('lo_djj', true);
    $lo_his = safe_post('lo_his', true);
    $lo_tfu = safe_post('lo_tfu', true);
    $lo_kontraksi = safe_post('lo_kontraksi', true);
    $lo_perdarahan = safe_post('lo_perdarahan', true);
    $lo_urin = safe_post('lo_urin', true);
    $lo_ket = safe_post('lo_ket', true);

    $data_to_insert = array();

    // Pastikan $lo_tgl adalah array sebelum melakukan count
    if (is_array($lo_tgl) || $lo_tgl instanceof Countable) {
        $count = count($lo_tgl);
    } else {
        $count = 0; // Atau menangani kesalahan dengan cara lain
    }

    for ($i = 0; $i < $count; $i++) {
      // Pengecekan apakah data sudah ada dalam database
      $existing_data = $this->db->get_where('sm_kep_73_01', array(
          'id_user' => $id_user[$i],
          'lo_tgl' => datetime2mysql($lo_tgl[$i]),
          'id_layanan_pendaftaran' => $layanan_id,
      ))->row_array();

      if (!empty($existing_data)) {
          // Jika data sudah ada, lakukan pembaruan
          $data_lo = array(
            'lo_td' => !empty($lo_td[$i]) ? $lo_td[$i] : NULL,
            'lo_n' => !empty($lo_n[$i]) ? $lo_n[$i] : NULL,
            'lo_r' => !empty($lo_r[$i]) ? $lo_r[$i] : NULL,
            'lo_s' => !empty($lo_s[$i]) ? $lo_s[$i] : NULL,
            'lo_sat' => !empty($lo_sat[$i]) ? $lo_sat[$i] : NULL,
            'lo_djj' => !empty($lo_djj[$i]) ? $lo_djj[$i] : NULL,
            'lo_his' => !empty($lo_his[$i]) ? $lo_his[$i] : NULL,
            'lo_tfu' => !empty($lo_tfu[$i]) ? $lo_tfu[$i] : NULL,
            'lo_kontraksi' => !empty($lo_kontraksi[$i]) ? $lo_kontraksi[$i] : NULL,
            'lo_perdarahan' => !empty($lo_perdarahan[$i]) ? $lo_perdarahan[$i] : NULL,
            'lo_urin' => !empty($lo_urin[$i]) ? $lo_urin[$i] : NULL,
            'lo_ket' => !empty($lo_ket[$i]) ? $lo_ket[$i] : NULL,
            'updated_date' => $this->datetime,
          );

          $this->db->where('id', $existing_data['id']);
          $this->db->update('sm_kep_73_01', $data_lo);
      } else {
          // Jika data tidak ada, lakukan penambahan data baru
          $data_lo = array(
            'id_layanan_pendaftaran' => $layanan_id,
            'id_pendaftaran' => $pendaftaran_id,
            'id_user' => $id_user[$i],
            'lo_tgl' => !empty($lo_tgl[$i]) ? datetime2mysql($lo_tgl[$i]) : NULL,
            'lo_td' => !empty($lo_td[$i]) ? $lo_td[$i] : NULL,
            'lo_n' => !empty($lo_n[$i]) ? $lo_n[$i] : NULL,
            'lo_r' => !empty($lo_r[$i]) ? $lo_r[$i] : NULL,
            'lo_s' => !empty($lo_s[$i]) ? $lo_s[$i] : NULL,
            'lo_sat' => !empty($lo_sat[$i]) ? $lo_sat[$i] : NULL,
            'lo_djj' => !empty($lo_djj[$i]) ? $lo_djj[$i] : NULL,
            'lo_his' => !empty($lo_his[$i]) ? $lo_his[$i] : NULL,
            'lo_tfu' => !empty($lo_tfu[$i]) ? $lo_tfu[$i] : NULL,
            'lo_kontraksi' => !empty($lo_kontraksi[$i]) ? $lo_kontraksi[$i] : NULL,
            'lo_perdarahan' => !empty($lo_perdarahan[$i]) ? $lo_perdarahan[$i] : NULL,
            'lo_urin' => !empty($lo_urin[$i]) ? $lo_urin[$i] : NULL,
            'lo_ket' => !empty($lo_ket[$i]) ? $lo_ket[$i] : NULL,
            'created_date' => $this->datetime,
          );

          $data_to_insert[] = $data_lo;
      }
    }

    if (!empty($data_to_insert)) {
        $this->db->insert_batch('sm_kep_73_01', $data_to_insert);
    }

    if ($this->db->trans_status() === false) {
        $this->db->trans_rollback();
        $status = false;
    } else {
        $this->db->trans_commit();
        $status = true;
    }

    $message = array(
        'status' => $status,
        'token' => $this->security->get_csrf_hash(),
        'id' => $layanan_id,
        'respon' => null,
    );

    $this->response($message, REST_Controller::HTTP_OK);
  }

  // Lembar Observasi
  function get_edit_lo_get($id, $id_pendaftaran, $id_layanan){
      if (!$this->get('id')) :
        $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
      endif;

      // Lembar Observasi by ID
      $data['lo_detail'] = $this->m_pelayanan->getLoByID($id);
      // var_dump($data['lo_detail']);die;

      if ($data) :
        $this->response($data, REST_Controller::HTTP_OK); // (200)
      endif;
  }

  // LEMBAR OBSERVASI
  public function update_lo_put() {
      $this->db->trans_begin();
      $layanan = array('id' => $this->put('id_layanan_pendaftaran'));
      $pendaftaran = array('id' => $this->put('id_pendaftaran'));
      $lo_id = $this->put('lo_id'); 

      if ($lo_id !== '') {
          // Ambil data lama sebelum update
          $data_lama = $this->m_pelayanan->getLoByID($lo_id);
          if ($data_lama) {
              $this->m_pelayanan->logsLo((array)$data_lama, 'update', $this->session->userdata('id_translucent'));
          }

          $data_lo = array(
              'id_user' => $this->session->userdata('id_translucent'),
              'lo_tgl' => $this->put('edit_lo_tgl') !== '' ? datetime2mysql($this->put('edit_lo_tgl')) : NULL,
              'lo_td' => $this->put('edit_lo_td') !== '' ? $this->put('edit_lo_td') : NULL,
              'lo_n' => $this->put('edit_lo_n') !== '' ? $this->put('edit_lo_n') : NULL,
              'lo_r' => $this->put('edit_lo_r') !== '' ? $this->put('edit_lo_r') : NULL,
              'lo_s' => $this->put('edit_lo_s') !== '' ? $this->put('edit_lo_s') : NULL,
              'lo_sat' => $this->put('edit_lo_sat') !== '' ? $this->put('edit_lo_sat') : NULL,
              'lo_djj' => $this->put('edit_lo_djj') !== '' ? $this->put('edit_lo_djj') : NULL,
              'lo_his' => $this->put('edit_lo_his') !== '' ? $this->put('edit_lo_his') : NULL,
              'lo_tfu' => $this->put('edit_lo_tfu') !== '' ? $this->put('edit_lo_tfu') : NULL,
              'lo_kontraksi' => $this->put('edit_lo_kontraksi') !== '' ? $this->put('edit_lo_kontraksi') : NULL,
              'lo_perdarahan' => $this->put('edit_lo_perdarahan') !== '' ? $this->put('edit_lo_perdarahan') : NULL,
              'lo_urin' => $this->put('edit_lo_urin') !== '' ? $this->put('edit_lo_urin') : NULL,
              'lo_ket' => $this->put('edit_lo_ket') !== '' ? $this->put('edit_lo_ket') : NULL,
              'updated_date' => $this->datetime
          );

          $this->db->where('id', $lo_id);
          $this->db->update('sm_kep_73_01', $data_lo);
      } 

      if (!empty($respon)) {
          $response = $respon;
      } else {
          $response = null;
      }

      if ($this->db->trans_status() === false) {
          $this->db->trans_rollback();
          $status = false;
      } else {
          $this->db->trans_commit();
          $status = true;
      }

      $message = array(
          'status' => $status,
          'token' => $this->security->get_csrf_hash(),
          'id' => $layanan['id'],
          'respon' => $response,
      );

      $this->response($message, REST_Controller::HTTP_OK);
  }

  // LEMBAR OBSERVASI
  function hapus_lo_delete($id) {
      $data_lama = $this->m_pelayanan->getLoByID($id);
      if ($data_lama) {
          $this->m_pelayanan->logsLo((array)$data_lama, 'delete', $this->session->userdata('id_translucent'));
      }

      $status = $this->m_pelayanan->deleteLo($id);
      if ($status) {
          $response = array('status' => $status, 'message' => 'Berhasil menghapus Pemantauan Restrain!');
      } else {
          $response = array('status' => $status, 'message' => 'Gagal menghapus Pemantauan Restrain!');
      }
      $this->response($response, REST_Controller::HTTP_OK);
  }



  // CHAS
  public function simpan_chas_post()
  {
    $this->db->trans_begin();

    // Mengambil data dari input POST
    $chas_id = safe_post('chas_id');
    $layanan_id = safe_post('id_layanan_pendaftaran');
    $pendaftaran_id = safe_post('id_pendaftaran');
    $id_user = safe_post('id_user');
    $chas_tgl = safe_post('chas_tgl', true);

    $chas_tgl_pemasangan = safe_post('chas_tgl_pemasangan', true);
    $chas_lokasi = safe_post('chas_lokasi', true);
    $chas_batas = safe_post('chas_batas', true);
    
    $chas_Pemasangan_picc = safe_post('chas_Pemasangan_picc', true);
    $chas_Pemasangan_cdl = safe_post('chas_Pemasangan_cdl', true);
    $chas_Pemasangan_cvc = safe_post('chas_Pemasangan_cvc', true);
    $chas_Pemasangan_uac = safe_post('chas_Pemasangan_uac', true);
    $chas_Pemasangan_uvc = safe_post('chas_Pemasangan_uvc', true);

    $chas_kateter_premicath = safe_post('chas_kateter_premicath', true);
    $chas_kateter_nutriline = safe_post('chas_kateter_nutriline', true);
    $chas_kateter_doble = safe_post('chas_kateter_doble', true);
    $chas_kateter_triple = safe_post('chas_kateter_triple', true);

    // Mengambil data alert
    $chas_alert_pagi = safe_post('chas_alert_pagi', true);
    $chas_alert_sore = safe_post('chas_alert_sore', true);
    $chas_alert_malam = safe_post('chas_alert_malam', true);

    // Mengambil data verbal
    $chas_verbal_pagi = safe_post('chas_verbal_pagi', true);
    $chas_verbal_sore = safe_post('chas_verbal_sore', true);
    $chas_verbal_malam = safe_post('chas_verbal_malam', true);

    // Mengambil data pain
    $chas_pain_pagi = safe_post('chas_pain_pagi', true);
    $chas_pain_sore = safe_post('chas_pain_sore', true);
    $chas_pain_malam = safe_post('chas_pain_malam', true);

    // Mengambil data unrespon
    $chas_unrespon_pagi = safe_post('chas_unrespon_pagi', true);
    $chas_unrespon_sore = safe_post('chas_unrespon_sore', true);
    $chas_unrespon_malam = safe_post('chas_unrespon_malam', true);

    // Mengambil data demam
    $chas_demam_pagi = safe_post('chas_demam_pagi', true);
    $chas_demam_sore = safe_post('chas_demam_sore', true);
    $chas_demam_malam = safe_post('chas_demam_malam', true);

    // Mengambil data takikardi
    $chas_takikardi_pagi = safe_post('chas_takikardi_pagi', true);
    $chas_takikardi_sore = safe_post('chas_takikardi_sore', true);
    $chas_takikardi_malam = safe_post('chas_takikardi_malam', true);

    // Mengambil data takipnoe
    $chas_takipnoe_pagi = safe_post('chas_takipnoe_pagi', true);
    $chas_takipnoe_sore = safe_post('chas_takipnoe_sore', true);
    $chas_takipnoe_malam = safe_post('chas_takipnoe_malam', true);

    // Mengambil data tertekuk
    $chas_tertekuk_pagi = safe_post('chas_tertekuk_pagi', true);
    $chas_tertekuk_sore = safe_post('chas_tertekuk_sore', true);
    $chas_tertekuk_malam = safe_post('chas_tertekuk_malam', true);

    // Mengambil data rembes
    $chas_rembes_pagi = safe_post('chas_rembes_pagi', true);
    $chas_rembes_sore = safe_post('chas_rembes_sore', true);
    $chas_rembes_malam = safe_post('chas_rembes_malam', true);

    // Mengambil data aliran
    $chas_aliran_pagi = safe_post('chas_aliran_pagi', true);
    $chas_aliran_sore = safe_post('chas_aliran_sore', true);
    $chas_aliran_malam = safe_post('chas_aliran_malam', true);

    // Mengambil data sumbatan
    $chas_sumbatan_pagi = safe_post('chas_sumbatan_pagi', true);
    $chas_sumbatan_sore = safe_post('chas_sumbatan_sore', true);
    $chas_sumbatan_malam = safe_post('chas_sumbatan_malam', true);

    // Mengambil data kemerahan
    $chas_kemerahan_pagi = safe_post('chas_kemerahan_pagi', true);
    $chas_kemerahan_sore = safe_post('chas_kemerahan_sore', true);
    $chas_kemerahan_malam = safe_post('chas_kemerahan_malam', true);

    // Mengambil data bengkak
    $chas_bengkak_pagi = safe_post('chas_bengkak_pagi', true);
    $chas_bengkak_sore = safe_post('chas_bengkak_sore', true);
    $chas_bengkak_malam = safe_post('chas_bengkak_malam', true);

    // Mengambil data nyeri
    $chas_nyeri_pagi = safe_post('chas_nyeri_pagi', true);
    $chas_nyeri_sore = safe_post('chas_nyeri_sore', true);
    $chas_nyeri_malam = safe_post('chas_nyeri_malam', true);

    // Mengambil data vena
    $chas_vena_pagi = safe_post('chas_vena_pagi', true);
    $chas_vena_sore = safe_post('chas_vena_sore', true);
    $chas_vena_malam = safe_post('chas_vena_malam', true);

    // Mengambil data pus
    $chas_pus_pagi = safe_post('chas_pus_pagi', true);
    $chas_pus_sore = safe_post('chas_pus_sore', true);
    $chas_pus_malam = safe_post('chas_pus_malam', true);

    // Mengambil data terfikasi
    $chas_terfikasi_pagi = safe_post('chas_terfikasi_pagi', true);
    $chas_terfikasi_sore = safe_post('chas_terfikasi_sore', true);
    $chas_terfikasi_malam = safe_post('chas_terfikasi_malam', true);

    // Mengambil data darah
    $chas_darah_pagi = safe_post('chas_darah_pagi', true);
    $chas_darah_sore = safe_post('chas_darah_sore', true);
    $chas_darah_malam = safe_post('chas_darah_malam', true);

    // Mengambil data kotor
    $chas_kotor_pagi = safe_post('chas_kotor_pagi', true);
    $chas_kotor_sore = safe_post('chas_kotor_sore', true);
    $chas_kotor_malam = safe_post('chas_kotor_malam', true);

    // Mengambil data basah
    $chas_basah_pagi = safe_post('chas_basah_pagi', true);
    $chas_basah_sore = safe_post('chas_basah_sore', true);
    $chas_basah_malam = safe_post('chas_basah_malam', true);

    // Mengambil data tindakan
    $chas_tindakan_pagi = safe_post('chas_tindakan_pagi', true);
    $chas_tindakan_sore = safe_post('chas_tindakan_sore', true);
    $chas_tindakan_malam = safe_post('chas_tindakan_malam', true);

    // Mengambil data perawat
    $chas_perawat_pagi = safe_post('chas_perawat_pagi', true);
    $chas_perawat_sore = safe_post('chas_perawat_sore', true);
    $chas_perawat_malam = safe_post('chas_perawat_malam', true);

    $data_to_insert = array();

    // Pastikan $chas_tgl adalah array sebelum melakukan count
    if (is_array($chas_tgl) || $chas_tgl instanceof Countable) {
        $count = count($chas_tgl);
    } else {
        $count = 0; // Atau menangani kesalahan dengan cara lain
    }

    for ($i = 0; $i < $count; $i++) {
      // Pengecekan apakah data sudah ada dalam database
      $existing_data = $this->db->get_where('sm_kep_126_00', array(
          'id_user' => $id_user[$i],
          'chas_tgl' => date2mysql($chas_tgl[$i]),
          'id_layanan_pendaftaran' => $layanan_id,
      ))->row_array();

      if (!empty($existing_data)) {
          // Jika data sudah ada, lakukan pembaruan
        $data_chas = array(
          'chas_tgl_pemasangan' => ($chas_tgl_pemasangan[$i]) !== 'null' ? date2mysql($chas_tgl_pemasangan[$i]) : NULL,
          'chas_lokasi' => ($chas_lokasi[$i]) !== 'null' ? $chas_lokasi[$i] : NULL,
          'chas_batas' => ($chas_batas[$i]) !== 'null' ? $chas_batas[$i] : NULL,

          'chas_Pemasangan_picc' => ($chas_Pemasangan_picc[$i]) !== 'null' ? $chas_Pemasangan_picc[$i] : NULL,
          'chas_Pemasangan_cdl' => ($chas_Pemasangan_cdl[$i]) !== 'null' ? $chas_Pemasangan_cdl[$i] : NULL,
          'chas_Pemasangan_cvc' => ($chas_Pemasangan_cvc[$i]) !== 'null' ? $chas_Pemasangan_cvc[$i] : NULL,
          'chas_Pemasangan_uac' => ($chas_Pemasangan_uac[$i]) !== 'null' ? $chas_Pemasangan_uac[$i] : NULL,
          'chas_Pemasangan_uvc' => ($chas_Pemasangan_uvc[$i]) !== 'null' ? $chas_Pemasangan_uvc[$i] : NULL,

          'chas_kateter_premicath' => ($chas_kateter_premicath[$i]) !== 'null' ? $chas_kateter_premicath[$i] : NULL,
          'chas_kateter_nutriline' => ($chas_kateter_nutriline[$i]) !== 'null' ? $chas_kateter_nutriline[$i] : NULL,
          'chas_kateter_doble' => ($chas_kateter_doble[$i]) !== 'null' ? $chas_kateter_doble[$i] : NULL,
          'chas_kateter_triple' => ($chas_kateter_triple[$i]) !== 'null' ? $chas_kateter_triple[$i] : NULL,

          'chas_alert_pagi' => ($chas_alert_pagi[$i]) !== 'null' ? $chas_alert_pagi[$i] : NULL,
          'chas_alert_sore' => ($chas_alert_sore[$i]) !== 'null' ? $chas_alert_sore[$i] : NULL,
          'chas_alert_malam' => ($chas_alert_malam[$i]) !== 'null' ? $chas_alert_malam[$i] : NULL,

          'chas_verbal_pagi' => ($chas_verbal_pagi[$i]) !== 'null' ? $chas_verbal_pagi[$i] : NULL,
          'chas_verbal_sore' => ($chas_verbal_sore[$i]) !== 'null' ? $chas_verbal_sore[$i] : NULL,
          'chas_verbal_malam' => ($chas_verbal_malam[$i]) !== 'null' ? $chas_verbal_malam[$i] : NULL,

          'chas_pain_pagi' => ($chas_pain_pagi[$i]) !== 'null' ? $chas_pain_pagi[$i] : NULL,
          'chas_pain_sore' => ($chas_pain_sore[$i]) !== 'null' ? $chas_pain_sore[$i] : NULL,
          'chas_pain_malam' => ($chas_pain_malam[$i]) !== 'null' ? $chas_pain_malam[$i] : NULL,

          'chas_unrespon_pagi' => ($chas_unrespon_pagi[$i]) !== 'null' ? $chas_unrespon_pagi[$i] : NULL,
          'chas_unrespon_sore' => ($chas_unrespon_sore[$i]) !== 'null' ? $chas_unrespon_sore[$i] : NULL,
          'chas_unrespon_malam' => ($chas_unrespon_malam[$i]) !== 'null' ? $chas_unrespon_malam[$i] : NULL,

          'chas_demam_pagi' => ($chas_demam_pagi[$i]) !== 'null' ? $chas_demam_pagi[$i] : NULL,
          'chas_demam_sore' => ($chas_demam_sore[$i]) !== 'null' ? $chas_demam_sore[$i] : NULL,
          'chas_demam_malam' => ($chas_demam_malam[$i]) !== 'null' ? $chas_demam_malam[$i] : NULL,

          'chas_takikardi_pagi' => ($chas_takikardi_pagi[$i]) !== 'null' ? $chas_takikardi_pagi[$i] : NULL,
          'chas_takikardi_sore' => ($chas_takikardi_sore[$i]) !== 'null' ? $chas_takikardi_sore[$i] : NULL,
          'chas_takikardi_malam' => ($chas_takikardi_malam[$i]) !== 'null' ? $chas_takikardi_malam[$i] : NULL,

          'chas_takipnoe_pagi' => ($chas_takipnoe_pagi[$i]) !== 'null' ? $chas_takipnoe_pagi[$i] : NULL,
          'chas_takipnoe_sore' => ($chas_takipnoe_sore[$i]) !== 'null' ? $chas_takipnoe_sore[$i] : NULL,
          'chas_takipnoe_malam' => ($chas_takipnoe_malam[$i]) !== 'null' ? $chas_takipnoe_malam[$i] : NULL,

          'chas_tertekuk_pagi' => ($chas_tertekuk_pagi[$i]) !== 'null' ? $chas_tertekuk_pagi[$i] : NULL,
          'chas_tertekuk_sore' => ($chas_tertekuk_sore[$i]) !== 'null' ? $chas_tertekuk_sore[$i] : NULL,
          'chas_tertekuk_malam' => ($chas_tertekuk_malam[$i]) !== 'null' ? $chas_tertekuk_malam[$i] : NULL,

          'chas_rembes_pagi' => ($chas_rembes_pagi[$i]) !== 'null' ? $chas_rembes_pagi[$i] : NULL,
          'chas_rembes_sore' => ($chas_rembes_sore[$i]) !== 'null' ? $chas_rembes_sore[$i] : NULL,
          'chas_rembes_malam' => ($chas_rembes_malam[$i]) !== 'null' ? $chas_rembes_malam[$i] : NULL,

          'chas_aliran_pagi' => ($chas_aliran_pagi[$i]) !== 'null' ? $chas_aliran_pagi[$i] : NULL,
          'chas_aliran_sore' => ($chas_aliran_sore[$i]) !== 'null' ? $chas_aliran_sore[$i] : NULL,
          'chas_aliran_malam' => ($chas_aliran_malam[$i]) !== 'null' ? $chas_aliran_malam[$i] : NULL,

          'chas_sumbatan_pagi' => ($chas_sumbatan_pagi[$i]) !== 'null' ? $chas_sumbatan_pagi[$i] : NULL,
          'chas_sumbatan_sore' => ($chas_sumbatan_sore[$i]) !== 'null' ? $chas_sumbatan_sore[$i] : NULL,
          'chas_sumbatan_malam' => ($chas_sumbatan_malam[$i]) !== 'null' ? $chas_sumbatan_malam[$i] : NULL,

          'chas_kemerahan_pagi' => ($chas_kemerahan_pagi[$i]) !== 'null' ? $chas_kemerahan_pagi[$i] : NULL,
          'chas_kemerahan_sore' => ($chas_kemerahan_sore[$i]) !== 'null' ? $chas_kemerahan_sore[$i] : NULL,
          'chas_kemerahan_malam' => ($chas_kemerahan_malam[$i]) !== 'null' ? $chas_kemerahan_malam[$i] : NULL,

          'chas_bengkak_pagi' => ($chas_bengkak_pagi[$i]) !== 'null' ? $chas_bengkak_pagi[$i] : NULL,
          'chas_bengkak_sore' => ($chas_bengkak_sore[$i]) !== 'null' ? $chas_bengkak_sore[$i] : NULL,
          'chas_bengkak_malam' => ($chas_bengkak_malam[$i]) !== 'null' ? $chas_bengkak_malam[$i] : NULL,

          'chas_nyeri_pagi' => ($chas_nyeri_pagi[$i]) !== 'null' ? $chas_nyeri_pagi[$i] : NULL,
          'chas_nyeri_sore' => ($chas_nyeri_sore[$i]) !== 'null' ? $chas_nyeri_sore[$i] : NULL,
          'chas_nyeri_malam' => ($chas_nyeri_malam[$i]) !== 'null' ? $chas_nyeri_malam[$i] : NULL,

          'chas_vena_pagi' => ($chas_vena_pagi[$i]) !== 'null' ? $chas_vena_pagi[$i] : NULL,
          'chas_vena_sore' => ($chas_vena_sore[$i]) !== 'null' ? $chas_vena_sore[$i] : NULL,
          'chas_vena_malam' => ($chas_vena_malam[$i]) !== 'null' ? $chas_vena_malam[$i] : NULL,

          'chas_pus_pagi' => ($chas_pus_pagi[$i]) !== 'null' ? $chas_pus_pagi[$i] : NULL,
          'chas_pus_sore' => ($chas_pus_sore[$i]) !== 'null' ? $chas_pus_sore[$i] : NULL,
          'chas_pus_malam' => ($chas_pus_malam[$i]) !== 'null' ? $chas_pus_malam[$i] : NULL,

          'chas_terfikasi_pagi' => ($chas_terfikasi_pagi[$i]) !== 'null' ? $chas_terfikasi_pagi[$i] : NULL,
          'chas_terfikasi_sore' => ($chas_terfikasi_sore[$i]) !== 'null' ? $chas_terfikasi_sore[$i] : NULL,
          'chas_terfikasi_malam' => ($chas_terfikasi_malam[$i]) !== 'null' ? $chas_terfikasi_malam[$i] : NULL,

          'chas_darah_pagi' => ($chas_darah_pagi[$i]) !== 'null' ? $chas_darah_pagi[$i] : NULL,
          'chas_darah_sore' => ($chas_darah_sore[$i]) !== 'null' ? $chas_darah_sore[$i] : NULL,
          'chas_darah_malam' => ($chas_darah_malam[$i]) !== 'null' ? $chas_darah_malam[$i] : NULL,

          'chas_kotor_pagi' => ($chas_kotor_pagi[$i]) !== 'null' ? $chas_kotor_pagi[$i] : NULL,
          'chas_kotor_sore' => ($chas_kotor_sore[$i]) !== 'null' ? $chas_kotor_sore[$i] : NULL,
          'chas_kotor_malam' => ($chas_kotor_malam[$i]) !== 'null' ? $chas_kotor_malam[$i] : NULL,

          'chas_basah_pagi' => ($chas_basah_pagi[$i]) !== 'null' ? $chas_basah_pagi[$i] : NULL,
          'chas_basah_sore' => ($chas_basah_sore[$i]) !== 'null' ? $chas_basah_sore[$i] : NULL,
          'chas_basah_malam' => ($chas_basah_malam[$i]) !== 'null' ? $chas_basah_malam[$i] : NULL,

          'chas_tindakan_pagi' => ($chas_tindakan_pagi[$i]) !== 'null' ? $chas_tindakan_pagi[$i] : NULL,
          'chas_tindakan_sore' => ($chas_tindakan_sore[$i]) !== 'null' ? $chas_tindakan_sore[$i] : NULL,
          'chas_tindakan_malam' => ($chas_tindakan_malam[$i]) !== 'null' ? $chas_tindakan_malam[$i] : NULL,

          'chas_perawat_pagi' => ($chas_perawat_pagi[$i]) !== 'null' ? $chas_perawat_pagi[$i] : NULL,
          'chas_perawat_sore' => ($chas_perawat_sore[$i]) !== 'null' ? $chas_perawat_sore[$i] : NULL,
          'chas_perawat_malam' => ($chas_perawat_malam[$i]) !== 'null' ? $chas_perawat_malam[$i] : NULL,
          
          'updated_date' => $this->datetime,
        );
          // var_dump("update");
          // var_dump($data_chas);die;

          $this->db->where('id', $existing_data['id']);
          $this->db->update('sm_kep_126_00', $data_chas);
      } else {
          // Jika data tidak ada, lakukan penambahan data baru
        $data_chas = array(
          'id_layanan_pendaftaran' => $layanan_id,
          'id_pendaftaran' => $pendaftaran_id,
          'id_user' => $id_user[$i],
          'chas_tgl' => ($chas_tgl[$i]) !== 'null' ? date2mysql($chas_tgl[$i]) : NULL,

          'chas_tgl_pemasangan' => ($chas_tgl_pemasangan[$i]) !== 'null' ? date2mysql($chas_tgl_pemasangan[$i]) : NULL,
          'chas_lokasi' => ($chas_lokasi[$i]) !== 'null' ? $chas_lokasi[$i] : NULL,
          'chas_batas' => ($chas_batas[$i]) !== 'null' ? $chas_batas[$i] : NULL,

          'chas_Pemasangan_picc' => ($chas_Pemasangan_picc[$i]) !== 'null' ? $chas_Pemasangan_picc[$i] : NULL,
          'chas_Pemasangan_cdl' => ($chas_Pemasangan_cdl[$i]) !== 'null' ? $chas_Pemasangan_cdl[$i] : NULL,
          'chas_Pemasangan_cvc' => ($chas_Pemasangan_cvc[$i]) !== 'null' ? $chas_Pemasangan_cvc[$i] : NULL,
          'chas_Pemasangan_uac' => ($chas_Pemasangan_uac[$i]) !== 'null' ? $chas_Pemasangan_uac[$i] : NULL,
          'chas_Pemasangan_uvc' => ($chas_Pemasangan_uvc[$i]) !== 'null' ? $chas_Pemasangan_uvc[$i] : NULL,

          'chas_kateter_premicath' => ($chas_kateter_premicath[$i]) !== 'null' ? $chas_kateter_premicath[$i] : NULL,
          'chas_kateter_nutriline' => ($chas_kateter_nutriline[$i]) !== 'null' ? $chas_kateter_nutriline[$i] : NULL,
          'chas_kateter_doble' => ($chas_kateter_doble[$i]) !== 'null' ? $chas_kateter_doble[$i] : NULL,
          'chas_kateter_triple' => ($chas_kateter_triple[$i]) !== 'null' ? $chas_kateter_triple[$i] : NULL,

          'chas_alert_pagi' => ($chas_alert_pagi[$i]) !== 'null' ? $chas_alert_pagi[$i] : NULL,
          'chas_alert_sore' => ($chas_alert_sore[$i]) !== 'null' ? $chas_alert_sore[$i] : NULL,
          'chas_alert_malam' => ($chas_alert_malam[$i]) !== 'null' ? $chas_alert_malam[$i] : NULL,

          'chas_verbal_pagi' => ($chas_verbal_pagi[$i]) !== 'null' ? $chas_verbal_pagi[$i] : NULL,
          'chas_verbal_sore' => ($chas_verbal_sore[$i]) !== 'null' ? $chas_verbal_sore[$i] : NULL,
          'chas_verbal_malam' => ($chas_verbal_malam[$i]) !== 'null' ? $chas_verbal_malam[$i] : NULL,

          'chas_pain_pagi' => ($chas_pain_pagi[$i]) !== 'null' ? $chas_pain_pagi[$i] : NULL,
          'chas_pain_sore' => ($chas_pain_sore[$i]) !== 'null' ? $chas_pain_sore[$i] : NULL,
          'chas_pain_malam' => ($chas_pain_malam[$i]) !== 'null' ? $chas_pain_malam[$i] : NULL,

          'chas_unrespon_pagi' => ($chas_unrespon_pagi[$i]) !== 'null' ? $chas_unrespon_pagi[$i] : NULL,
          'chas_unrespon_sore' => ($chas_unrespon_sore[$i]) !== 'null' ? $chas_unrespon_sore[$i] : NULL,
          'chas_unrespon_malam' => ($chas_unrespon_malam[$i]) !== 'null' ? $chas_unrespon_malam[$i] : NULL,

          'chas_demam_pagi' => ($chas_demam_pagi[$i]) !== 'null' ? $chas_demam_pagi[$i] : NULL,
          'chas_demam_sore' => ($chas_demam_sore[$i]) !== 'null' ? $chas_demam_sore[$i] : NULL,
          'chas_demam_malam' => ($chas_demam_malam[$i]) !== 'null' ? $chas_demam_malam[$i] : NULL,

          'chas_takikardi_pagi' => ($chas_takikardi_pagi[$i]) !== 'null' ? $chas_takikardi_pagi[$i] : NULL,
          'chas_takikardi_sore' => ($chas_takikardi_sore[$i]) !== 'null' ? $chas_takikardi_sore[$i] : NULL,
          'chas_takikardi_malam' => ($chas_takikardi_malam[$i]) !== 'null' ? $chas_takikardi_malam[$i] : NULL,

          'chas_takipnoe_pagi' => ($chas_takipnoe_pagi[$i]) !== 'null' ? $chas_takipnoe_pagi[$i] : NULL,
          'chas_takipnoe_sore' => ($chas_takipnoe_sore[$i]) !== 'null' ? $chas_takipnoe_sore[$i] : NULL,
          'chas_takipnoe_malam' => ($chas_takipnoe_malam[$i]) !== 'null' ? $chas_takipnoe_malam[$i] : NULL,

          'chas_tertekuk_pagi' => ($chas_tertekuk_pagi[$i]) !== 'null' ? $chas_tertekuk_pagi[$i] : NULL,
          'chas_tertekuk_sore' => ($chas_tertekuk_sore[$i]) !== 'null' ? $chas_tertekuk_sore[$i] : NULL,
          'chas_tertekuk_malam' => ($chas_tertekuk_malam[$i]) !== 'null' ? $chas_tertekuk_malam[$i] : NULL,

          'chas_rembes_pagi' => ($chas_rembes_pagi[$i]) !== 'null' ? $chas_rembes_pagi[$i] : NULL,
          'chas_rembes_sore' => ($chas_rembes_sore[$i]) !== 'null' ? $chas_rembes_sore[$i] : NULL,
          'chas_rembes_malam' => ($chas_rembes_malam[$i]) !== 'null' ? $chas_rembes_malam[$i] : NULL,

          'chas_aliran_pagi' => ($chas_aliran_pagi[$i]) !== 'null' ? $chas_aliran_pagi[$i] : NULL,
          'chas_aliran_sore' => ($chas_aliran_sore[$i]) !== 'null' ? $chas_aliran_sore[$i] : NULL,
          'chas_aliran_malam' => ($chas_aliran_malam[$i]) !== 'null' ? $chas_aliran_malam[$i] : NULL,

          'chas_sumbatan_pagi' => ($chas_sumbatan_pagi[$i]) !== 'null' ? $chas_sumbatan_pagi[$i] : NULL,
          'chas_sumbatan_sore' => ($chas_sumbatan_sore[$i]) !== 'null' ? $chas_sumbatan_sore[$i] : NULL,
          'chas_sumbatan_malam' => ($chas_sumbatan_malam[$i]) !== 'null' ? $chas_sumbatan_malam[$i] : NULL,

          'chas_kemerahan_pagi' => ($chas_kemerahan_pagi[$i]) !== 'null' ? $chas_kemerahan_pagi[$i] : NULL,
          'chas_kemerahan_sore' => ($chas_kemerahan_sore[$i]) !== 'null' ? $chas_kemerahan_sore[$i] : NULL,
          'chas_kemerahan_malam' => ($chas_kemerahan_malam[$i]) !== 'null' ? $chas_kemerahan_malam[$i] : NULL,

          'chas_bengkak_pagi' => ($chas_bengkak_pagi[$i]) !== 'null' ? $chas_bengkak_pagi[$i] : NULL,
          'chas_bengkak_sore' => ($chas_bengkak_sore[$i]) !== 'null' ? $chas_bengkak_sore[$i] : NULL,
          'chas_bengkak_malam' => ($chas_bengkak_malam[$i]) !== 'null' ? $chas_bengkak_malam[$i] : NULL,

          'chas_nyeri_pagi' => ($chas_nyeri_pagi[$i]) !== 'null' ? $chas_nyeri_pagi[$i] : NULL,
          'chas_nyeri_sore' => ($chas_nyeri_sore[$i]) !== 'null' ? $chas_nyeri_sore[$i] : NULL,
          'chas_nyeri_malam' => ($chas_nyeri_malam[$i]) !== 'null' ? $chas_nyeri_malam[$i] : NULL,

          'chas_vena_pagi' => ($chas_vena_pagi[$i]) !== 'null' ? $chas_vena_pagi[$i] : NULL,
          'chas_vena_sore' => ($chas_vena_sore[$i]) !== 'null' ? $chas_vena_sore[$i] : NULL,
          'chas_vena_malam' => ($chas_vena_malam[$i]) !== 'null' ? $chas_vena_malam[$i] : NULL,

          'chas_pus_pagi' => ($chas_pus_pagi[$i]) !== 'null' ? $chas_pus_pagi[$i] : NULL,
          'chas_pus_sore' => ($chas_pus_sore[$i]) !== 'null' ? $chas_pus_sore[$i] : NULL,
          'chas_pus_malam' => ($chas_pus_malam[$i]) !== 'null' ? $chas_pus_malam[$i] : NULL,

          'chas_terfikasi_pagi' => ($chas_terfikasi_pagi[$i]) !== 'null' ? $chas_terfikasi_pagi[$i] : NULL,
          'chas_terfikasi_sore' => ($chas_terfikasi_sore[$i]) !== 'null' ? $chas_terfikasi_sore[$i] : NULL,
          'chas_terfikasi_malam' => ($chas_terfikasi_malam[$i]) !== 'null' ? $chas_terfikasi_malam[$i] : NULL,

          'chas_darah_pagi' => ($chas_darah_pagi[$i]) !== 'null' ? $chas_darah_pagi[$i] : NULL,
          'chas_darah_sore' => ($chas_darah_sore[$i]) !== 'null' ? $chas_darah_sore[$i] : NULL,
          'chas_darah_malam' => ($chas_darah_malam[$i]) !== 'null' ? $chas_darah_malam[$i] : NULL,

          'chas_kotor_pagi' => ($chas_kotor_pagi[$i]) !== 'null' ? $chas_kotor_pagi[$i] : NULL,
          'chas_kotor_sore' => ($chas_kotor_sore[$i]) !== 'null' ? $chas_kotor_sore[$i] : NULL,
          'chas_kotor_malam' => ($chas_kotor_malam[$i]) !== 'null' ? $chas_kotor_malam[$i] : NULL,

          'chas_basah_pagi' => ($chas_basah_pagi[$i]) !== 'null' ? $chas_basah_pagi[$i] : NULL,
          'chas_basah_sore' => ($chas_basah_sore[$i]) !== 'null' ? $chas_basah_sore[$i] : NULL,
          'chas_basah_malam' => ($chas_basah_malam[$i]) !== 'null' ? $chas_basah_malam[$i] : NULL,

          'chas_tindakan_pagi' => ($chas_tindakan_pagi[$i]) !== 'null' ? $chas_tindakan_pagi[$i] : NULL,
          'chas_tindakan_sore' => ($chas_tindakan_sore[$i]) !== 'null' ? $chas_tindakan_sore[$i] : NULL,
          'chas_tindakan_malam' => ($chas_tindakan_malam[$i]) !== 'null' ? $chas_tindakan_malam[$i] : NULL,

          'chas_perawat_pagi' => ($chas_perawat_pagi[$i]) !== 'null' ? $chas_perawat_pagi[$i] : NULL,
          'chas_perawat_sore' => ($chas_perawat_sore[$i]) !== 'null' ? $chas_perawat_sore[$i] : NULL,
          'chas_perawat_malam' => ($chas_perawat_malam[$i]) !== 'null' ? $chas_perawat_malam[$i] : NULL,
          
          'created_date' => $this->datetime,
        );

          $data_to_insert[] = $data_chas;
      }
    }
    // var_dump("simpan");
    // var_dump($data_to_insert);die;

    if (!empty($data_to_insert)) {
        $this->db->insert_batch('sm_kep_126_00', $data_to_insert);
    }

    if ($this->db->trans_status() === false) {
        $this->db->trans_rollback();
        $status = false;
    } else {
        $this->db->trans_commit();
        $status = true;
    }

    $message = array(
        'status' => $status,
        'token' => $this->security->get_csrf_hash(),
        'id' => $layanan_id,
        'respon' => null,
    );

    $this->response($message, REST_Controller::HTTP_OK);
  }

  function get_detail_chas_get($id, $id_pendaftaran, $id_layanan)
  {
      if (!$this->get('id')) :
        $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
      endif;

      // chas by ID
      $data['chas_detail'] = $this->m_pelayanan->getChasByID($id);

      if ($data) :
        $this->response($data, REST_Controller::HTTP_OK); // (200)
      endif;
  }

  public function update_chas_put()
  {
   
    $this->db->trans_begin();
    $layanan = $this->put('id_layanan_pendaftaran');
    $pendaftaran = $this->put('id_pendaftaran');
    $chas_id = $this->put('chas_id'); 

    // Lembar Chas
    if ($chas_id !== '') {

      // Inisialisasi data CHAS dengan nilai default NULL
      $data_chas = [
          'id_pendaftaran'          => $pendaftaran,
          'id_layanan_pendaftaran'  => $layanan,
          'id_user'                 => $this->session->userdata('id_translucent'),
          'chas_tgl'                => $this->put('edit_chas_tgl') !== '' ? date2mysql($this->put('edit_chas_tgl')) : NULL,
          'chas_tgl_pemasangan'     => $this->put('edit_chas_tgl_pemasangan') !== '' ? date2mysql($this->put('edit_chas_tgl_pemasangan')) : NULL,
          'updated_date'            => $this->datetime
      ];

      // Daftar semua field CHAS yang perlu diambil dari input
      $fields = [
          'chas_lokasi', 'chas_batas',
          'chas_Pemasangan_picc', 'chas_Pemasangan_cdl', 'chas_Pemasangan_cvc', 'chas_Pemasangan_uac', 'chas_Pemasangan_uvc',
          'chas_kateter_premicath', 'chas_kateter_nutriline', 'chas_kateter_doble', 'chas_kateter_triple',
          'chas_alert_pagi', 'chas_alert_sore', 'chas_alert_malam',
          'chas_verbal_pagi', 'chas_verbal_sore', 'chas_verbal_malam',
          'chas_pain_pagi', 'chas_pain_sore', 'chas_pain_malam',
          'chas_unrespon_pagi', 'chas_unrespon_sore', 'chas_unrespon_malam',
          'chas_demam_pagi', 'chas_demam_sore', 'chas_demam_malam',
          'chas_takikardi_pagi', 'chas_takikardi_sore', 'chas_takikardi_malam',
          'chas_takipnoe_pagi', 'chas_takipnoe_sore', 'chas_takipnoe_malam',
          'chas_tertekuk_pagi', 'chas_tertekuk_sore', 'chas_tertekuk_malam',
          'chas_rembes_pagi', 'chas_rembes_sore', 'chas_rembes_malam',
          'chas_aliran_pagi', 'chas_aliran_sore', 'chas_aliran_malam',
          'chas_sumbatan_pagi', 'chas_sumbatan_sore', 'chas_sumbatan_malam',
          'chas_kemerahan_pagi', 'chas_kemerahan_sore', 'chas_kemerahan_malam',
          'chas_bengkak_pagi', 'chas_bengkak_sore', 'chas_bengkak_malam',
          'chas_nyeri_pagi', 'chas_nyeri_sore', 'chas_nyeri_malam',
          'chas_vena_pagi', 'chas_vena_sore', 'chas_vena_malam',
          'chas_pus_pagi', 'chas_pus_sore', 'chas_pus_malam',
          'chas_terfikasi_pagi', 'chas_terfikasi_sore', 'chas_terfikasi_malam',
          'chas_darah_pagi', 'chas_darah_sore', 'chas_darah_malam',
          'chas_kotor_pagi', 'chas_kotor_sore', 'chas_kotor_malam',
          'chas_basah_pagi', 'chas_basah_sore', 'chas_basah_malam',
          'chas_tindakan_pagi', 'chas_tindakan_sore', 'chas_tindakan_malam',
          'chas_perawat_pagi', 'chas_perawat_sore', 'chas_perawat_malam'
      ];

      // Loop melalui setiap field untuk mengambil nilai dari input jika ada, jika tidak tetap null
      foreach ($fields as $field) {
          $data_chas[$field] = $this->put('edit_' . $field) !== '' ? $this->put('edit_' . $field) : NULL;
      }

      // var_dump('update');
      // var_dump($data_chas);die;
      $this->db->where('id', $chas_id);
      $this->db->update('sm_kep_126_00', $data_chas);
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
      'id' => $layanan,
      'respon' => $response,
    );

    $this->response($message, REST_Controller::HTTP_OK);
  }

  function hapus_chas_delete($id){
    // var_dump($id);die;
      $status = $this->m_pelayanan->deleteChas($id);
      if ($status) :
          $response = array('status' => $status, 'message' => 'Berhasil menghapus Pemantauan Restrain!');
      else :
          $response = array('status' => $status, 'message' => 'Gagal menghapus Pemantauan Restrain!');
      endif;
      $this->response($response, REST_Controller::HTTP_OK);
  }

  public function simpan_kg_post()
  {
    $this->db->trans_begin();
    $layanan 		  = safe_post('id_layanan_pendaftaran');
    $pendaftaran 	  = safe_post('id_pendaftaran');
    $kg_id 			  = safe_post('kg_id');
    $user_log         = $this->session->userdata('id_translucent');
    $created_date_log = $this->datetime;
    // var_dump($kg_id);die;

    // LAPORAN TINDAKAN
    if ($kg_id !== '') {
		$sqlLog = "INSERT INTO sm_konsultasi_gizi_log (
					  id_kg_lama,id_pendaftaran,id_layanan_pendaftaran,id_pasien,id_users,created_at,updated_at,
					  kg_bb,kg_lla,kg_pbb,kg_tb,kg_imt,kg_biokimia,kg_klinis,kg_gizi,kg_personal,kg_diagnosis,
					  kg_tujuan,kg_intervensi,kg_konseling,kg_evaluasi,kg_tgl_petugas,kg_petugas,kg_ttd,kg_dokter,kg_ttd_dokter,created_date_log,user_log,status_log)    
				  SELECT id_kg,id_pendaftaran,id_layanan_pendaftaran,id_pasien,id_users,created_at,updated_at,
					  kg_bb,kg_lla,kg_pbb,kg_tb,kg_imt,kg_biokimia,kg_klinis,kg_gizi,kg_personal,kg_diagnosis,
					  kg_tujuan,kg_intervensi,kg_konseling,kg_evaluasi,kg_tgl_petugas,kg_petugas,kg_ttd,kg_dokter,kg_ttd_dokter,
					  '$created_date_log' , '$user_log', 'Edit' from sm_konsultasi_gizi where id_kg = " . $kg_id;
		$this->db->query($sqlLog);
	  
      $data_rkm = array(
        // 'id_kg'                     => $kg_id,
        'id_pendaftaran'            => $pendaftaran,
        'id_layanan_pendaftaran'    => $layanan,
				'id_pasien'                 => safe_post('id_pasien'),
        'id_users'                  => $this->session->userdata('id_translucent'),

        'kg_bb'                     => safe_post('kg_bb')           !== '' ? safe_post('kg_bb'): NULL,
        'kg_lla'                    => safe_post('kg_lla')          !== '' ? safe_post('kg_lla'): NULL,
        'kg_pbb'                    => safe_post('kg_pbb')          !== '' ? safe_post('kg_pbb'): NULL,
        'kg_tb'                     => safe_post('kg_tb')           !== '' ? safe_post('kg_tb'): NULL,
        'kg_imt'                    => safe_post('kg_imt')          !== '' ? safe_post('kg_imt'): NULL,
        'kg_biokimia'               => safe_post('kg_biokimia')     !== '' ? safe_post('kg_biokimia'): NULL,
        'kg_klinis'                 => safe_post('kg_klinis')       !== '' ? safe_post('kg_klinis'): NULL,
        'kg_gizi'                   => safe_post('kg_gizi')         !== '' ? safe_post('kg_gizi'): NULL,
        'kg_personal'               => safe_post('kg_personal')     !== '' ? safe_post('kg_personal'): NULL,
        'kg_diagnosis'              => safe_post('kg_diagnosis')    !== '' ? safe_post('kg_diagnosis'): NULL,
        'kg_tujuan'                 => safe_post('kg_tujuan')       !== '' ? safe_post('kg_tujuan'): NULL,
        'kg_intervensi'             => safe_post('kg_intervensi')   !== '' ? safe_post('kg_intervensi'): NULL,
        'kg_konseling'              => safe_post('kg_konseling')    !== '' ? safe_post('kg_konseling'): NULL,
        'kg_evaluasi'               => safe_post('kg_evaluasi')     !== '' ? safe_post('kg_evaluasi'): NULL,

        // petugas
        'kg_tgl_petugas'            => safe_post('kg_tgl_petugas')  !== '' ? datetime2mysql(safe_post('kg_tgl_petugas')) : NULL,
        'kg_petugas'                => safe_post('kg_petugas')      !== '' ? safe_post('kg_petugas'): NULL,
        'kg_ttd'                    => safe_post('kg_ttd')          !== '' ? safe_post('kg_ttd'): NULL,
        'kg_dokter'                 => safe_post('kg_dokter')      !== '' ? safe_post('kg_dokter'): NULL,
        'kg_ttd_dokter'               => safe_post('kg_ttd_dokter')          !== '' ? safe_post('kg_ttd_dokter'): NULL,

        'updated_at'                => $this->datetime,
      );
      // var_dump($kg_id);die;
      
      $this->db->where('id_kg', $kg_id);
			$this->db->update('sm_konsultasi_gizi', $data_rkm);

      $this->load->model('satu_sehat/Satu_sehat_model', 'sehat');
      $cekDataGizi = $this->sehat->cekLayananGizi((int)$layanan);

      if(isset($cekDataGizi->jenis_layanan)){

        if($cekDataGizi->jenis_layanan === 'Poliklinik'){

            $this->sehat->integrasiComposition($cekDataGizi->id_kg);

        }

      }

    } else {
      $data_rkm = array(
        'id_pendaftaran'            => $pendaftaran,
        'id_layanan_pendaftaran'    => $layanan,
				'id_pasien'                 => safe_post('id_pasien'),
        'id_users'                  => $this->session->userdata('id_translucent'),

        'kg_bb'                     => safe_post('kg_bb')           !== '' ? safe_post('kg_bb'): NULL,
        'kg_lla'                    => safe_post('kg_lla')          !== '' ? safe_post('kg_lla'): NULL,
        'kg_pbb'                    => safe_post('kg_pbb')          !== '' ? safe_post('kg_pbb'): NULL,
        'kg_tb'                     => safe_post('kg_tb')           !== '' ? safe_post('kg_tb'): NULL,
        'kg_imt'                    => safe_post('kg_imt')          !== '' ? safe_post('kg_imt'): NULL,
        'kg_biokimia'               => safe_post('kg_biokimia')     !== '' ? safe_post('kg_biokimia'): NULL,
        'kg_klinis'                 => safe_post('kg_klinis')       !== '' ? safe_post('kg_klinis'): NULL,
        'kg_gizi'                   => safe_post('kg_gizi')         !== '' ? safe_post('kg_gizi'): NULL,
        'kg_personal'               => safe_post('kg_personal')     !== '' ? safe_post('kg_personal'): NULL,
        'kg_diagnosis'              => safe_post('kg_diagnosis')    !== '' ? safe_post('kg_diagnosis'): NULL,
        'kg_tujuan'                 => safe_post('kg_tujuan')       !== '' ? safe_post('kg_tujuan'): NULL,
        'kg_intervensi'             => safe_post('kg_intervensi')   !== '' ? safe_post('kg_intervensi'): NULL,
        'kg_konseling'              => safe_post('kg_konseling')    !== '' ? safe_post('kg_konseling'): NULL,
        'kg_evaluasi'               => safe_post('kg_evaluasi')     !== '' ? safe_post('kg_evaluasi'): NULL,

        // petugas
        'kg_tgl_petugas'            => safe_post('kg_tgl_petugas')  !== '' ? datetime2mysql(safe_post('kg_tgl_petugas')) : NULL,
        'kg_petugas'                => safe_post('kg_petugas')      !== '' ? safe_post('kg_petugas'): NULL,
        'kg_ttd'                    => safe_post('kg_ttd')          !== '' ? safe_post('kg_ttd'): NULL,
        'kg_dokter'                 => safe_post('kg_dokter')      !== '' ? safe_post('kg_dokter'): NULL,
        'kg_ttd_dokter'               => safe_post('kg_ttd_dokter')          !== '' ? safe_post('kg_ttd_dokter'): NULL,
        
        'created_at'				 		  => $this->datetime

      );
      $this->db->insert('sm_konsultasi_gizi', $data_rkm);

      $this->load->model('satu_sehat/Satu_sehat_model', 'sehat');
      $cekDataGizi = $this->sehat->cekLayananGizi((int)$layanan);

      if(isset($cekDataGizi->jenis_layanan)){

          if($cekDataGizi->jenis_layanan === 'Poliklinik'){

            $this->sehat->integrasiComposition($cekDataGizi->id_kg);

          }

      }

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
      'id' => $layanan,
      'respon' => $response,
    );

    $this->response($message, REST_Controller::HTTP_OK);
  }




  // FMPP
  function simpan_fmpp_post(){

    // Mulai transaksi database
    $this->db->trans_begin();

    // Mengambil data dari form
    $id_layanan = safe_post('id_layanan_pendaftaran');
    $id_pendaftaran = safe_post('id_pendaftaran');
    $id_pasien = safe_post('id_pasien');
    $id_users = safe_post('id_users');
    
    // Mengambil array data
    $fmpp_tanggal_a = safe_post('fmpp_tanggal_a');
    $fmpp_tanggal_b = safe_post('fmpp_tanggal_b');
    $fmpp_catatan_a = safe_post('fmpp_catatan_a');
    $fmpp_catatan_b = safe_post('fmpp_catatan_b');
    $fmpp_petugas_a = safe_post('fmpp_petugas_a');
    $fmpp_petugas_b = safe_post('fmpp_petugas_b');

    if ($fmpp_tanggal_a !== '') {
      // Mengonversi tanggal ke format Y-m-d H:i:s
      $fmpp_tanggal_a = array_map(function($tanggal) {
          return date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $tanggal)));
      }, $fmpp_tanggal_a);
      
      // Menyimpan data ke database untuk data_a
      foreach ($fmpp_tanggal_a as $key => $tanggal_a) {
        // Simpan ke database untuk tanggal_a
        $data_a = [
          'id_layanan_pendaftaran'  => $id_layanan,
          'id_pendaftaran'          => $id_pendaftaran,
          'id_pasien'               => $id_pasien,
          'id_users'                => $id_users,
          'fmpp_tanggal_a'            => $tanggal_a,  // Menggunakan fmpp_tanggal untuk menyimpan data
          'fmpp_catatan_a'            => $fmpp_catatan_a[$key], // Catatan A
          'fmpp_petugas_a'            => $fmpp_petugas_a[$key], // Petugas A
          'created_date'            => $this->datetime,
        ];
        
        // Proses penyimpanan ke tabel fmpp
        $this->db->insert('sm_fmpp', $data_a); // Simpan data untuk A
      }
    }

    if ($fmpp_tanggal_b !== '') {
      $fmpp_tanggal_b = array_map(function($tanggal) {
          return date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $tanggal)));
      }, $fmpp_tanggal_b);

      // Menyimpan data ke database untuk data_b
      foreach ($fmpp_tanggal_b as $key => $tanggal_b) {
        // Simpan ke database untuk tanggal_b
        $data_b = [
          'id_layanan_pendaftaran'  => $id_layanan,
          'id_pendaftaran'          => $id_pendaftaran,
          'id_pasien'               => $id_pasien,
          'id_users'                => $id_users,
          'fmpp_tanggal_b'            => $tanggal_b,  // Menggunakan fmpp_tanggal untuk menyimpan data
          'fmpp_catatan_b'            => isset($fmpp_catatan_b[$key]) ? $fmpp_catatan_b[$key] : null, // Catatan B
          'fmpp_petugas_b'            => isset($fmpp_petugas_b[$key]) ? $fmpp_petugas_b[$key] : null, // Petugas B
          'created_date'            => $this->datetime,
        ];

        // Proses penyimpanan ke tabel fmpp
        $this->db->insert('sm_fmpp', $data_b); // Simpan data untuk B
      }
    }

    // Cek status transaksi
    if ($this->db->trans_status() === false) {
      // Rollback transaksi jika ada error
      $this->db->trans_rollback();
      $status = false;
      $response = 'Gagal menyimpan data';
    } else {
      // Commit transaksi jika berhasil
      $this->db->trans_commit();
      $status = true;
      $response = 'Data berhasil disimpan';
    }

    // Menyusun response
    $message = array(
      'status' => $status,
      'token' => $this->security->get_csrf_hash(),
      'id' => $id_layanan,
      'respon' => $response,
    );

    // Mengirim response JSON
    $this->response($message, REST_Controller::HTTP_OK);
  }

  // FMPP
  function get_fmpp_get($id_pendaftaran, $id_layanan){
		$data = [];
		$data['fmpp'] = $this->m_pelayanan->getFmpp($id_pendaftaran, $id_layanan);
    // var_dump($data['fmpp']);die;
		if ($data != null) {
			$this->response($data, REST_Controller::HTTP_OK);
		} else {
			$this->response($data, REST_Controller::HTTP_OK);
		}
	}

  // FMPP
  function hapus_fmpp_delete($id){
      $status = $this->m_pelayanan->deleteFmpp($id);
      if ($status) :
          $response = array('status' => $status, 'message' => 'Berhasil menghapus Pemantauan Restrain!');
      else :
          $response = array('status' => $status, 'message' => 'Gagal menghapus Pemantauan Restrain!');
      endif;
      $this->response($response, REST_Controller::HTTP_OK);
  }

  // FMPP
  function get_fmpp_byid_get($id){
		$data = [];
		$data['fmpp'] = $this->m_pelayanan->getFmppByID($id);
		if ($data != null) {
			$this->response($data, REST_Controller::HTTP_OK);
		} else {
			$this->response($data, REST_Controller::HTTP_OK);
		}
	}

  // FMPP
  function update_fmpp_post() {
    $this->db->trans_begin();
  
    $id_fmpp_a = $this->input->post('id_fmpp_a');
    $id_fmpp_b = $this->input->post('id_fmpp_b');
    $id_layanan = $this->input->post('id_layanan');
    $id_pendaftaran = $this->input->post('id_pendaftaran');
  
    if ($id_fmpp_a !== '') {
      // Ambil data lama & simpan log
      $lama_a = $this->db->get_where('sm_fmpp', ['id' => $id_fmpp_a])->row_array();
      if ($lama_a) {
        $log_a = $lama_a;
        unset($log_a['id']); // supaya tidak overwrite ID
        $log_a['updated_date'] = $this->datetime;
        $log_a['created_date'] = date('Y-m-d H:i:s');
        $this->m_pelayanan->insertLogFmpp($log_a);
      }
  
      // Update data fmpp_a
      $data_fmpp = array(
        'id_users'           => $this->session->userdata('id_translucent'),
        'fmpp_tanggal_a'     => $this->post('fmpp_tanggal_a') !== '' ? datetime2mysql($this->post('fmpp_tanggal_a')) : NULL,
        'fmpp_catatan_a'     => $this->post('fmpp_catatan_a') !== '' ? $this->post('fmpp_catatan_a') : NULL,
        'fmpp_petugas_a'     => $this->post('fmpp_petugas_a') !== '' ? $this->post('fmpp_petugas_a') : NULL,
        'updated_date'       => $this->datetime
      );
      $this->db->where('id', $id_fmpp_a);
      $this->db->update('sm_fmpp', $data_fmpp);
    }
  
    if ($id_fmpp_b !== '') {
      // Ambil data lama & simpan log
      $lama_b = $this->db->get_where('sm_fmpp', ['id' => $id_fmpp_b])->row_array();
      if ($lama_b) {
        $log_b = $lama_b;
        unset($log_b['id']);
        $log_b['updated_date'] = $this->datetime;
        $log_b['created_date'] = date('Y-m-d H:i:s');
        $this->m_pelayanan->insertLogFmpp($log_b);
      }
  
      // Update data fmpp_b
      $data_fmpp = array(
        'id_users'           => $this->session->userdata('id_translucent'),
        'fmpp_tanggal_b'     => $this->post('fmpp_tanggal_b') !== '' ? datetime2mysql($this->post('fmpp_tanggal_b')) : NULL,
        'fmpp_catatan_b'     => $this->post('fmpp_catatan_b') !== '' ? $this->post('fmpp_catatan_b') : NULL,
        'fmpp_petugas_b'     => $this->post('fmpp_petugas_b') !== '' ? $this->post('fmpp_petugas_b') : NULL,
        'updated_date'       => $this->datetime
      );
      $this->db->where('id', $id_fmpp_b);
      $this->db->update('sm_fmpp', $data_fmpp);
    }
  
    // Handle respon
    $response = !empty($respon) ? $respon : null;
  
    if ($this->db->trans_status() === false) {
      $this->db->trans_rollback();
      $status = false;
    } else {
      $this->db->trans_commit();
      $status = true;
    }
  
    $message = array(
      'status' => $status,
      'token'  => $this->security->get_csrf_hash(),
      'id'     => $id_layanan,
      'respon' => $response,
    );
  
    $this->response($message, REST_Controller::HTTP_OK);
  }





  // FLISUB LOGS
  function get_fli_get($id_pendaftaran, $id_layanan){
      $data = [];
      $data['fli'] = $this->m_pelayanan->getFli($id_pendaftaran, $id_layanan);

      // Cek apakah fli tidak null, lalu ambil id-nya
      if ($data['fli']) {
          $id_fli = $data['fli']->id; // pastikan kolom ID di sm_kep_08_01 adalah "id"
          $data['fli_logs'] = $this->m_pelayanan->getFliLogs($id_fli);
      } else {
          $data['fli_logs'] = [];
      }

      $this->response($data, REST_Controller::HTTP_OK);
  }

  // FLISUB LOGS
  function simpan_fli_post() {
    $this->db->trans_begin();
    $layanan = safe_post('id_layanan_pendaftaran');
    $pendaftaran = safe_post('id_pendaftaran');
    $id_fli = safe_post('id_fli');
    $data_fli = array(
        'id_pendaftaran'                          => $pendaftaran,
        'id_layanan_pendaftaran'                  => $layanan,
        'id_pasien'                               => safe_post('id_pasien'),
        'id_users'                                => $this->session->userdata('id_translucent'),
        'fli_nama'                                => safe_post('fli_nama')           !== '' ? safe_post('fli_nama'): NULL,
        'fli_no_rm'                               => safe_post('fli_no_rm')           !== '' ? safe_post('fli_no_rm'): NULL,
        'fli_ruangan'                             => safe_post('fli_ruangan')           !== '' ? safe_post('fli_ruangan'): NULL,
        'fli_umur'                                => safe_post('fli_umur')           !== '' ? safe_post('fli_umur'): NULL,
        'fli_jenis_kelamin'                       => safe_post('fli_jenis_kelamin')           !== '' ? safe_post('fli_jenis_kelamin'): NULL,
        'fli_biaya'                               => safe_post('fli_biaya')           !== '' ? safe_post('fli_biaya'): NULL,
        'fli_tanggal'                             => safe_post('fli_tanggal')  !== '' ? datetime2mysql(safe_post('fli_tanggal')) : NULL,
        'fli_tanggal_insiden'                     => safe_post('fli_tanggal_insiden')  !== '' ? datetime2mysql(safe_post('fli_tanggal_insiden')) : NULL,
        'fli_insiden'                             => safe_post('fli_insiden')           !== '' ? safe_post('fli_insiden'): NULL,
        'fli_kronologi'                           => safe_post('fli_kronologi')           !== '' ? safe_post('fli_kronologi'): NULL,
        'fli_jenis_insiden'                       => safe_post('fli_jenis_insiden')           !== '' ? safe_post('fli_jenis_insiden'): NULL,
        'fli_lapor'                               => safe_post('fli_lapor')           !== '' ? safe_post('fli_lapor'): NULL,
        'fli_lapor_keterangan'                    => safe_post('fli_lapor_keterangan')           !== '' ? safe_post('fli_lapor_keterangan'): NULL,
        'fli_terjadi'                             => safe_post('fli_terjadi')           !== '' ? safe_post('fli_terjadi'): NULL,
        'fli_terjadi_keterangan'                  => safe_post('fli_terjadi_keterangan')           !== '' ? safe_post('fli_terjadi_keterangan'): NULL,
        'fli_menyangkut'                          => safe_post('fli_menyangkut')           !== '' ? safe_post('fli_menyangkut'): NULL,
        'fli_menyangkut_keterangan'               => safe_post('fli_menyangkut_keterangan')           !== '' ? safe_post('fli_menyangkut_keterangan'): NULL,
        'fli_tempat'                              => safe_post('fli_tempat')           !== '' ? safe_post('fli_tempat'): NULL,
        'fli_penyakit_dalam'                      => safe_post('fli_penyakit_dalam')           !== '' ? safe_post('fli_penyakit_dalam'): NULL,
        'fli_penyakit_anak'                       => safe_post('fli_penyakit_anak')           !== '' ? safe_post('fli_penyakit_anak'): NULL,
        'fli_penyakit_bedah'                      => safe_post('fli_penyakit_bedah')           !== '' ? safe_post('fli_penyakit_bedah'): NULL,
        'fli_penyakit_obstetri'                   => safe_post('fli_penyakit_obstetri')           !== '' ? safe_post('fli_penyakit_obstetri'): NULL,
        'fli_penyakit_tht'                        => safe_post('fli_penyakit_tht')           !== '' ? safe_post('fli_penyakit_tht'): NULL,
        'fli_penyakit_mata'                       => safe_post('fli_penyakit_mata')           !== '' ? safe_post('fli_penyakit_mata'): NULL,
        'fli_penyakit_syaraf'                     => safe_post('fli_penyakit_syaraf')           !== '' ? safe_post('fli_penyakit_syaraf'): NULL,
        'fli_penyakit_anastesi'                   => safe_post('fli_penyakit_anastesi')           !== '' ? safe_post('fli_penyakit_anastesi'): NULL,
        'fli_penyakit_kulit'                      => safe_post('fli_penyakit_kulit')           !== '' ? safe_post('fli_penyakit_kulit'): NULL,
        'fli_penyakit_jantung'                    => safe_post('fli_penyakit_jantung')           !== '' ? safe_post('fli_penyakit_jantung'): NULL,
        'fli_penyakit_paru'                       => safe_post('fli_penyakit_paru')           !== '' ? safe_post('fli_penyakit_paru'): NULL,
        'fli_penyakit_jiwa'                       => safe_post('fli_penyakit_jiwa')           !== '' ? safe_post('fli_penyakit_jiwa'): NULL,
        'fli_penyakit_keterangan'                 => safe_post('fli_penyakit_keterangan')           !== '' ? safe_post('fli_penyakit_keterangan'): NULL,
        'fli_unit'                                => safe_post('fli_unit')           !== '' ? safe_post('fli_unit'): NULL,
        'fli_akibat'                              => safe_post('fli_akibat')           !== '' ? safe_post('fli_akibat'): NULL,
        'fli_tindakan'                            => safe_post('fli_tindakan')           !== '' ? safe_post('fli_tindakan'): NULL,
        'fli_tindakan_tim'                        => safe_post('fli_tindakan_tim')           !== '' ? safe_post('fli_tindakan_tim'): NULL,
        'fli_tindakan_tim_keterangan'             => safe_post('fli_tindakan_tim_keterangan')           !== '' ? safe_post('fli_tindakan_tim_keterangan'): NULL,
        'fli_tindakan_dokter'                     => safe_post('fli_tindakan_dokter')           !== '' ? safe_post('fli_tindakan_dokter'): NULL,
        'fli_tindakan_perawat'                    => safe_post('fli_tindakan_perawat')           !== '' ? safe_post('fli_tindakan_perawat'): NULL,
        'fli_tindakan_petugas_lainnya'            => safe_post('fli_tindakan_petugas_lainnya')           !== '' ? safe_post('fli_tindakan_petugas_lainnya'): NULL,
        'fli_tindakan_petugas_lainnya_keterangan' => safe_post('fli_tindakan_petugas_lainnya_keterangan')           !== '' ? safe_post('fli_tindakan_petugas_lainnya_keterangan'): NULL,
        'fli_kejadian'                            => safe_post('fli_kejadian')           !== '' ? safe_post('fli_kejadian'): NULL,
        'fli_keterangan_kejadian'                 => safe_post('fli_keterangan_kejadian')           !== '' ? safe_post('fli_keterangan_kejadian'): NULL,
        'fli_grading'                             => safe_post('fli_grading')           !== '' ? safe_post('fli_grading'): NULL,
        'fli_pelapor'                             => safe_post('fli_pelapor')           !== '' ? safe_post('fli_pelapor'): NULL,
        'fli_penerima'                            => safe_post('fli_penerima')           !== '' ? safe_post('fli_penerima'): NULL,
        'fli_ttd_pelapor'                         => safe_post('fli_ttd_pelapor')           !== '' ? safe_post('fli_ttd_pelapor'): NULL,
        'fli_ttd_penerima'                        => safe_post('fli_ttd_penerima')           !== '' ? safe_post('fli_ttd_penerima'): NULL,
        'fli_tanggal_pelapor'                     => safe_post('fli_tanggal_pelapor')  !== '' ? date2mysql(safe_post('fli_tanggal_pelapor')) : NULL,
        'fli_tanggal_penerima'                    => safe_post('fli_tanggal_penerima')  !== '' ? date2mysql(safe_post('fli_tanggal_penerima')) : NULL,
        'updated_at'                              => $this->datetime
    );

    if ($id_fli !== '') {
        $this->db->where('id', $id_fli);
        $this->db->update('sm_kep_08_01', $data_fli);
    
        // Tambahkan log update
        $log_data = $data_fli;
        $log_data['id_fli'] = $id_fli; // referensi ke data utama
        $log_data['log_type'] = 'update'; // opsional: bisa 'insert' atau 'update'
        $log_data['log_created_at'] = $this->datetime; // waktu log disimpan
    
        $this->db->insert('sm_kep_08_01_logs', $log_data);
    } else {
        $data_fli['created_at'] = $this->datetime;
        $this->db->insert('sm_kep_08_01', $data_fli);
    }

    if ($this->db->trans_status() === FALSE) {
        $this->db->trans_rollback();
        echo json_encode(['status' => false, 'message' => 'Gagal menyimpan data.']);
    } else {
        $this->db->trans_commit();
        echo json_encode(['status' => true, 'message' => 'Data berhasil disimpan.']);
    }
  }



}
