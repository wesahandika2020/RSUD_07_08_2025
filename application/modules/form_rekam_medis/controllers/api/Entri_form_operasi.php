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
class Entri_form_operasi extends REST_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->limit = 10;
    // $this->redis = new CI_Redis();
    // $this->load->model('Masterdata_model', 'masterdata');
    // $this->load->model('Form_rekam_medis_model', 'form_rekam_medis');
    $this->load->model('Pelayanan/Pelayanan_model', 'm_pelayanan');
    $this->load->model('Order_operasi/Order_operasi_model', 'm_order_operasi');
    $this->load->model('pendaftaran/Pendaftaran_model', 'm_pendaftaran');

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

  // function simpan_entri_sscko_post()
  // {
  //   $layanan = array('id' => safe_post('id_layanan_pendaftaran'));
  //   $this->db->trans_begin();

  //   // SSCKO 2
  //   $sscko_tanggal_sign_in = safe_post('sscko_tanggal_sign_in');
  //   $sscko_tanggal_time_out = safe_post('sscko_tanggal_time_out');
  //   $sscko_tanggal_sign_out = safe_post('sscko_tanggal_sign_out');
  //   if ($sscko_tanggal_sign_in || $sscko_tanggal_time_out || $sscko_tanggal_sign_out) {
  //     $surgicalCeklisKamarOperasi = array(
  //       'id_layanan_pendaftaran'                => $layanan['id'],
  //       'id_pendaftaran'                        => safe_post('id_pendaftaran'),
  //       'sscko_tanggal_sign_in'                 => safe_post('sscko_tanggal_sign_in'),
  //       'sscko_tanggal_time_out'                => safe_post('sscko_tanggal_time_out'),
  //       'sscko_tanggal_sign_out'                => safe_post('sscko_tanggal_sign_out'),
  //       'user_surgical_safety_ceklis'          => safe_post('user_surgical_safety_ceklis') !== '' ? safe_post('user_surgical_safety_ceklis') : NULL,

  //       // sign in = SSCKO H
  //       'sscko_igp'         => safe_post('sscko_igp')          !== '' ? safe_post('sscko_igp') : NULL,
  //       'sscko_lo'           => safe_post('sscko_lo')           !== '' ? safe_post('sscko_lo') : NULL,
  //       'sscko_prosedur'     => safe_post('sscko_prosedur')     !== '' ? safe_post('sscko_prosedur') : NULL,
  //       'sscko_sio'          => safe_post('sscko_sio')           !== '' ? safe_post('sscko_sio') : NULL,
  //       'sscko_tanda'        => safe_post('sscko_tanda')      !== '' ? safe_post('sscko_tanda') : NULL,
  //       'sscko_mesin'        => safe_post('sscko_mesin')      !== '' ? safe_post('sscko_mesin') : NULL,
  //       'sscko_monitor'      => safe_post('sscko_monitor')      !== '' ? safe_post('sscko_monitor') : NULL,
  //       'sscko_alergi'       => safe_post('sscko_alergi')       !== '' ? safe_post('sscko_alergi') : NULL,
  //       'sscko_sebut'        => safe_post('sscko_sebut')        !== '' ? safe_post('sscko_sebut') : NULL,
  //       'sscko_kemungkinan'  => safe_post('sscko_kemungkinan')  !== '' ? safe_post('sscko_kemungkinan') : NULL,
  //       'sscko_resiko'       => safe_post('sscko_resiko')       !== '' ? safe_post('sscko_resiko') : NULL,
  //       'sscko_rencana'      => safe_post('sscko_rencana')      !== '' ? safe_post('sscko_rencana') : NULL,
  //       'sscko_jenis'         => safe_post('sscko_jenis')        !== '' ? safe_post('sscko_jenis') : NULL,
  //       'sscko_anastesi'     => safe_post('sscko_anastesi')     !== '' ? safe_post('sscko_anastesi') : NULL,
  //       'sscko_paraf_perawat_sign_in'          => safe_post('sscko_paraf_perawat_sign_in')           !== '' ? safe_post('sscko_paraf_perawat_sign_in') : NULL,
  //       'sscko_perawat_sign_in'                => safe_post('sscko_perawat_sign_in')                 !== '' ? safe_post('sscko_perawat_sign_in') : NULL,
  //       'sscko_paraf_dokter_anestesi_sign_in'  => safe_post('sscko_paraf_dokter_anestesi_sign_in')    !== '' ? safe_post('sscko_paraf_dokter_anestesi_sign_in') : NULL,
  //       'sscko_dokter_anestesi_sign_in'        => safe_post('sscko_dokter_anestesi_sign_in')         !== '' ? safe_post('sscko_dokter_anestesi_sign_in') : NULL,

  //       // time out = SSCKO H
  //       'sscko_konfirmasi'  => safe_post('sscko_konfirmasi')        !== '' ? safe_post('sscko_konfirmasi') : NULL,
  //       'sscko_np'          => safe_post('sscko_np')                     !== '' ? safe_post('sscko_np') : NULL,
  //       'sscko_prosedurr'   => safe_post('sscko_prosedurr')             !== '' ? safe_post('sscko_prosedurr') : NULL,
  //       'sscko_lokasi'      => safe_post('sscko_lokasi')                !== '' ? safe_post('sscko_lokasi') : NULL,
  //       'sscko_antibiotik'  => safe_post('sscko_antibiotik')            !== '' ? safe_post('sscko_antibiotik') : NULL,
  //       'sscko_bedah'       => safe_post('sscko_bedah')             !== '' ? safe_post('sscko_bedah') : NULL,
  //       'sscko_anastesiii'  => safe_post('sscko_anastesiii')           !== '' ? safe_post('sscko_anastesiii') : NULL,
  //       'sscko_perawat'     => safe_post('sscko_perawat')              !== '' ? safe_post('sscko_perawat') : NULL,
  //       'sscko_foto'        => safe_post('sscko_foto')              !== '' ? safe_post('sscko_foto') : NULL,
  //       'sscko_paraf_perawat_time_out'        => safe_post('sscko_paraf_perawat_time_out')          !== '' ? safe_post('sscko_paraf_perawat_time_out') : NULL,
  //       'sscko_perawat_time_out'              => safe_post('sscko_perawat_time_out')                !== '' ? safe_post('sscko_perawat_time_out') : NULL,
  //       'sscko_paraf_dokter_anestesi_time_out' => safe_post('sscko_paraf_dokter_anestesi_time_out')   !== '' ? safe_post('sscko_paraf_dokter_anestesi_time_out') : NULL,
  //       'sscko_dokter_anestesi_time_out'      => safe_post('sscko_dokter_anestesi_time_out')        !== '' ? safe_post('sscko_dokter_anestesi_time_out') : NULL,

  //       // sign out = SSCKO H
  //       'sscko_npt'         => safe_post('sscko_npt')            !== '' ? safe_post('sscko_npt') : NULL,
  //       'sscko_instrumen'   => safe_post('sscko_instrumen')       !== '' ? safe_post('sscko_instrumen') : NULL,
  //       'sscko_specimen'    => safe_post('sscko_specimen')        !== '' ? safe_post('sscko_specimen') : NULL,
  //       'sscko_adakah'      => safe_post('sscko_adakah')          !== '' ? safe_post('sscko_adakah') : NULL,
  //       'sscko_operator'    => safe_post('sscko_operator')        !== '' ? safe_post('sscko_operator') : NULL,
  //       'sscko_tanggal_tindakan'           => safe_post('sscko_tanggal_tindakan')              !== '' ? safe_post('sscko_tanggal_tindakan') : NULL,
  //       'sscko_paraf_perawat_sign_out'         => safe_post('sscko_paraf_perawat_sign_out')          !== '' ? safe_post('sscko_paraf_perawat_sign_out') : NULL,
  //       'sscko_perawat_sign_out'               => safe_post('sscko_perawat_sign_out')                !== '' ? safe_post('sscko_perawat_sign_out') : NULL,
  //       'sscko_paraf_dokter_anestesi_sign_out' => safe_post('sscko_paraf_dokter_anestesi_sign_out')  !== '' ? safe_post('sscko_paraf_dokter_anestesi_sign_out') : NULL,
  //       'sscko_dokter_anestesi_sign_out'       => safe_post('sscko_dokter_anestesi_sign_out')        !== '' ? safe_post('sscko_dokter_anestesi_sign_out') : NULL,
  //     );
  //     // var_dump($surgicalCeklisKamarOperasi);die;

  //     $this->m_order_operasi->insertSurgicalSafetyCeklisKamarOperasi($surgicalCeklisKamarOperasi);
  //   } else {
  //     $sscko_tanggal_sign_in = safe_post('sscko_tanggal_sign_in');
  //     $sscko_tanggal_time_out = safe_post('sscko_tanggal_time_out');
  //     $sscko_tanggal_sign_out = safe_post('sscko_tanggal_sign_out');
  //     if (!empty($sscko_tanggal_sign_in || $sscko_tanggal_time_out || $sscko_tanggal_sign_out)) {
  //       $respon = ['show' => '5', 'status' => false, 'message' => 'Surgical Safety Ceklis Kamar Operasi Belum ditambahkan', 'id' => ' #data-surgical-safety-ceklis'];
  //     }
  //   }


  //   // End function
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
  //     'token'  => $this->security->get_csrf_hash(),
  //     'id'     => $layanan['id'],
  //     'respon' => $response,
  //   );

  //   $this->response($message, REST_Controller::HTTP_OK);
  // }

  function simpan_entri_rpppp_post()
  {
    $layanan = array('id' => safe_post('id_layanan_pendaftaran'));
    $this->db->trans_begin();

    // RPPPPP SIMPAN 
    $rencanaPelayananPasienPascaPembedahan = array(

      'id_layanan_pendaftaran' => $layanan['id'],
      'id_pendaftaran'          => safe_post('id_pendaftaran'),
      'id_users'             => $this->session->userdata('id_translucent'),
      'id_rpppp'          => safe_post('id_rpppp'),


      'tanggal_rpppp'          => (safe_post('tanggal_rpppp') !== '' ? datetime2mysql(safe_post('tanggal_rpppp')) : NULL),
      'hari_rpppp'           => safe_post('hari_rpppp') !== '' ? safe_post('hari_rpppp') : NULL,
      'diagnosis_kerja'         => safe_post('diagnosis_kerja') !== '' ? safe_post('diagnosis_kerja') : NULL,
      'masalah_kebutuhan_prioritas'   => safe_post('masalah_kebutuhan_prioritas') !== '' ? safe_post('masalah_kebutuhan_prioritas') : NULL,

      'kewaspadaan' => json_encode([
        'kewaspadaan_1' => safe_post('kewaspadaan_1') !== '' ? safe_post('kewaspadaan_1') : null,
        'kewaspadaan_2' => safe_post('kewaspadaan_2') !== '' ? safe_post('kewaspadaan_2') : null,
        'kewaspadaan_3' => safe_post('kewaspadaan_3') !== '' ? safe_post('kewaspadaan_3') : null,
        'kewaspadaan_4' => safe_post('kewaspadaan_4') !== '' ? safe_post('kewaspadaan_4') : null,
      ]),

      'tim_dokter' => safe_post('tim_dokter') !== '' ? safe_post('tim_dokter') : NULL,
      'id_dokter_1' => safe_post('tim_dpjp') !== '' ? safe_post('tim_dpjp') : NULL,

      'tim_perawat' => safe_post('tim_perawat') !== '' ? safe_post('tim_perawat') : NULL,
      'id_perawat_1' => safe_post('tim_perawat_1') !== '' ? safe_post('tim_perawat_1') : NULL,
      'id_perawat_2' => safe_post('tim_perawat_2') !== '' ? safe_post('tim_perawat_2') : NULL,
      'id_perawat_3' => safe_post('tim_perawat_3') !== '' ? safe_post('tim_perawat_3') : NULL,

      'pemeriksaan' => json_encode([
        'pemeriksaan_1' => safe_post('pemeriksaan_1') !== '' ? safe_post('pemeriksaan_1') : null,
        'pemeriksaan_2' => safe_post('pemeriksaan_2') !== '' ? safe_post('pemeriksaan_2') : null,
        'pemeriksaan_3' => safe_post('pemeriksaan_3') !== '' ? safe_post('pemeriksaan_3') : null,
      ]),

      'prosedur_tindakan' => safe_post('prosedur_tindakan') !== '' ? safe_post('prosedur_tindakan') : NULL,

      'nutrisi_rpppp' => json_encode([
        'nutrisi_1' => safe_post('nutrisi_1') !== '' ? safe_post('nutrisi_1') : null,
        'nutrisi_2' => safe_post('nutrisi_2') !== '' ? safe_post('nutrisi_2') : null,
        'nutrisi_3' => safe_post('nutrisi_3') !== '' ? safe_post('nutrisi_3') : null,
        'nutrisi_3' => safe_post('nutrisi_3') !== '' ? safe_post('nutrisi_3') : null,
        'nutrisi_5' => safe_post('nutrisi_5') !== '' ? safe_post('nutrisi_5') : null,
      ]),

      'aktivitas_rpppp' => json_encode([
        'aktivitas_1' => safe_post('aktivitas_1') !== '' ? safe_post('aktivitas_1') : null,
        'aktivitas_2' => safe_post('aktivitas_2') !== '' ? safe_post('aktivitas_2') : null,
        'aktivitas_3' => safe_post('aktivitas_3') !== '' ? safe_post('aktivitas_3') : null,
      ]),

      'pengobatann' => json_encode([
        'pengobatann_1' => safe_post('pengobatann_1') !== '' ? safe_post('pengobatann_1') : null,
        'pengobatann_2' => safe_post('pengobatann_2') !== '' ? safe_post('pengobatann_2') : null,
        'pengobatann_3' => safe_post('pengobatann_3') !== '' ? safe_post('pengobatann_3') : null,
      ]),

      'keperawwatan' => json_encode([
        'keperawwatan_1' => safe_post('keperawwatan_1') !== '' ? safe_post('keperawwatan_1') : null,
        'keperawwatan_2' => safe_post('keperawwatan_2') !== '' ? safe_post('keperawwatan_2') : null,
        'keperawwatan_3' => safe_post('keperawwatan_3') !== '' ? safe_post('keperawwatan_3') : null,
        'keperawwatan_4' => safe_post('keperawwatan_4') !== '' ? safe_post('keperawwatan_4') : null,
      ]),

      'tindakan_rehabilitan_medik'  => safe_post('tindakan_rehabilitan_medik') !== '' ? safe_post('tindakan_rehabilitan_medik') : NULL,
      'konsultasi_rpppp'         => safe_post('konsultasi_rpppp') !== '' ? safe_post('konsultasi_rpppp') : NULL,
      'sasaran_rpppp'         => safe_post('sasaran_rpppp') !== '' ? safe_post('sasaran_rpppp') : NULL,
      'planing_rpppp'         => safe_post('planing_rpppp') !== '' ? safe_post('planing_rpppp') : NULL,

      'nama_jelas_rpppp'         => safe_post('nama_jelas_rpppp') !== '' ? safe_post('nama_jelas_rpppp') : NULL,
      'id_dokter_2'           => safe_post('paraf_dokter_rpppp') !== '' ? safe_post('paraf_dokter_rpppp') : NULL,
    );
    // var_dump($rencanaPelayananPasienPascaPembedahan);die;

    $sign = $this->db->select('rpppp.tanggal_rpppp, tim_dokter, tim_perawat,  nama_jelas_rpppp')
      ->from('sm_rencana_pelayanan_pasien_pasca_pembedahan as rpppp')
      ->where('rpppp.id_pendaftaran', $layanan['id'])
      ->get()
      ->row();

    if (isset($sign)) :
      if ($sign->tanggal_rpppp !== NULL) :
        $rencanaPelayananPasienPascaPembedahan['tanggal_rpppp'] = $sign->tanggal_rpppp;
      else :
        $rencanaPelayananPasienPascaPembedahan['tanggal_rpppp'] = (safe_post('tanggal_rpppp') !== '' ? datetime2mysql(safe_post('tanggal_rpppp')) : NULL);
      endif;
      if ($sign->tim_dokter !== NULL) :
        $rencanaPelayananPasienPascaPembedahan['tim_dokter'] = $sign->tim_dokter;
      else :
        $rencanaPelayananPasienPascaPembedahan['tim_dokter'] = (safe_post('tim_dokter') !== '' ? safe_post('tim_dokter') : NULL);
      endif;
      if ($sign->tim_perawat !== NULL) :
        $rencanaPelayananPasienPascaPembedahan['tim_perawat'] = $sign->tim_perawat;
      else :
        $rencanaPelayananPasienPascaPembedahan['tim_perawat'] = (safe_post('tim_perawat') !== '' ? safe_post('tim_perawat') : NULL);
      endif;
      if ($sign->nama_jelas_rpppp !== NULL) :
        $rencanaPelayananPasienPascaPembedahan['nama_jelas_rpppp'] = $sign->nama_jelas_rpppp;
      else :
        $rencanaPelayananPasienPascaPembedahan['nama_jelas_rpppp'] = (safe_post('nama_jelas_rpppp') !== '' ? safe_post('nama_jelas_rpppp') : NULL);
      endif;

    endif;
    $this->m_order_operasi->updateRencanaPelayananPasienPascaPembedahan($rencanaPelayananPasienPascaPembedahan);



    // End function
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
      'id'     => $layanan['id'],
      'respon' => $response,
    );

    $this->response($message, REST_Controller::HTTP_OK);
  }


  // function simpan_entri_ckp_post()
  // {
  //   $layanan = array('id' => safe_post('id_layanan_pendaftaran'));
  //   $this->db->trans_begin();

  //   // CKP SIMPAN 
  //   // var_dump(json_decode(safe_post ('grafik_ckp')));die;
  //   $catatanKeperawatanPerioperatif = array(

  //     'id_layanan_pendaftaran' => $layanan['id'],
  //     'id_pendaftaran'          => safe_post('id_pendaftaran'),
  //     'id_users'             => $this->session->userdata('id_translucent'),
  //     'id_ckp'          => safe_post('id_ckp'),

  //     'suhu_ckp' => json_encode([
  //       'suhu_ckp_1' => safe_post('suhu_ckp_1') !== '' ? safe_post('suhu_ckp_1') : null,
  //       'suhu_ckp_2' => safe_post('suhu_ckp_2') !== '' ? safe_post('suhu_ckp_2') : null,
  //       'suhu_ckp_3' => safe_post('suhu_ckp_3') !== '' ? safe_post('suhu_ckp_3') : null,
  //       'suhu_ckp_4' => safe_post('suhu_ckp_4') !== '' ? safe_post('suhu_ckp_4') : null,
  //       'suhu_ckp_5' => safe_post('suhu_ckp_5') !== '' ? safe_post('suhu_ckp_5') : null,
  //       'suhu_ckp_6' => safe_post('suhu_ckp_6') !== '' ? safe_post('suhu_ckp_6') : null,
  //       'suhu_ckp_7' => safe_post('suhu_ckp_7') !== '' ? safe_post('suhu_ckp_7') : null,
  //     ]),

  //     'status_mental_ckp' => json_encode([
  //       'status_mental_ckp_1' => safe_post('status_mental_ckp_1') !== '' ? safe_post('status_mental_ckp_1') : null,
  //       'status_mental_ckp_2' => safe_post('status_mental_ckp_2') !== '' ? safe_post('status_mental_ckp_2') : null,
  //       'status_mental_ckp_3' => safe_post('status_mental_ckp_3') !== '' ? safe_post('status_mental_ckp_3') : null,
  //       'status_mental_ckp_4' => safe_post('status_mental_ckp_4') !== '' ? safe_post('status_mental_ckp_4') : null,
  //       'status_mental_ckp_5' => safe_post('status_mental_ckp_5') !== '' ? safe_post('status_mental_ckp_5') : null,
  //     ]),

  //     'riwayat_penyakit_ckp' => json_encode([
  //       'riwayat_penyakit_ckp_1' => safe_post('riwayat_penyakit_ckp_1') !== '' ? safe_post('riwayat_penyakit_ckp_1') : null,
  //       'riwayat_penyakit_ckp_1' => safe_post('riwayat_penyakit_ckp_1') !== '' ? safe_post('riwayat_penyakit_ckp_1') : null,
  //       'riwayat_penyakit_ckp_3' => safe_post('riwayat_penyakit_ckp_3') !== '' ? safe_post('riwayat_penyakit_ckp_3') : null,
  //       'riwayat_penyakit_ckp_4' => safe_post('riwayat_penyakit_ckp_4') !== '' ? safe_post('riwayat_penyakit_ckp_4') : null,
  //       'riwayat_penyakit_ckp_5' => safe_post('riwayat_penyakit_ckp_5') !== '' ? safe_post('riwayat_penyakit_ckp_5') : null,
  //       'riwayat_penyakit_ckp_6' => safe_post('riwayat_penyakit_ckp_6') !== '' ? safe_post('riwayat_penyakit_ckp_6') : null,
  //       'riwayat_penyakit_ckp_7' => safe_post('riwayat_penyakit_ckp_7') !== '' ? safe_post('riwayat_penyakit_ckp_7') : null,
  //       'riwayat_penyakit_ckp_8' => safe_post('riwayat_penyakit_ckp_8') !== '' ? safe_post('riwayat_penyakit_ckp_8') : null,
  //       'riwayat_penyakit_ckp_9' => safe_post('riwayat_penyakit_ckp_9') !== '' ? safe_post('riwayat_penyakit_ckp_9') : null,
  //     ]),

  //     'pengobatan_saat_ini_ckp' => safe_post('pengobatan_saat_ini_ckp') !== '' ? safe_post('pengobatan_saat_ini_ckp') : NULL,
  //     'operasi_sebelumnya_ckp' => safe_post('operasi_sebelumnya_ckp') !== '' ? safe_post('operasi_sebelumnya_ckp') : NULL,

  //     'alergi_ckp' => json_encode([
  //       'alergi_ckp'   => safe_post('alergi_ckp') !== '' ? safe_post('alergi_ckp') : null,
  //       'alergi_ckp'   => safe_post('alergi_ckp') !== '' ? safe_post('alergi_ckp') : null,
  //       'alergi_ckp_3'  => safe_post('alergi_ckp_3') !== '' ? safe_post('alergi_ckp_3') : null,
  //       'alergi_ckp_4'   => safe_post('alergi_ckp_4') !== '' ? safe_post('alergi_ckp_4') : null,
  //     ]),

  //     'gol_darah_ckp' => json_encode([
  //       'gol_darah_ckp_1' => safe_post('gol_darah_ckp_1') !== '' ? safe_post('gol_darah_ckp_1') : null,
  //       'gol_darah_ckp_2' => safe_post('gol_darah_ckp_2') !== '' ? safe_post('gol_darah_ckp_2') : null,
  //     ]),

  //     'standar_kewaspadaan_ckp' => json_encode([
  //       'standar_kewaspadaan_ckp_1' => safe_post('standar_kewaspadaan_ckp_1') !== '' ? safe_post('standar_kewaspadaan_ckp_1') : null,
  //       'standar_kewaspadaan_ckp_2' => safe_post('standar_kewaspadaan_ckp_2') !== '' ? safe_post('standar_kewaspadaan_ckp_2') : null,
  //     ]),

  //     'rencana_tindakan_operasi_ckp'       => safe_post('rencana_tindakan_operasi_ckp') !== '' ? safe_post('rencana_tindakan_operasi_ckp') : NULL,
  //     'dokter_operator_ckp'           => safe_post('dokter_operator_ckp') !== '' ? safe_post('dokter_operator_ckp') : NULL,
  //     'rencana_perawatan_pasca_operasi_ckp'   => safe_post('rencana_perawatan_pasca_operasi_ckp') !== '' ? safe_post('rencana_perawatan_pasca_operasi_ckp') : NULL,

  //     'verifikasi_pasien_ckp' => json_encode([
  //       'verifikasi_pasien_1' => safe_post('verifikasi_pasien_1') !== '' ? safe_post('verifikasi_pasien_1') : null,
  //       'verifikasi_pasien_2' => safe_post('verifikasi_pasien_2') !== '' ? safe_post('verifikasi_pasien_2') : null,
  //       'verifikasi_pasien_3' => safe_post('verifikasi_pasien_3') !== '' ? safe_post('verifikasi_pasien_3') : null,
  //       'verifikasi_pasien_4' => safe_post('verifikasi_pasien_4') !== '' ? safe_post('verifikasi_pasien_4') : null,
  //       'verifikasi_pasien_5' => safe_post('verifikasi_pasien_5') !== '' ? safe_post('verifikasi_pasien_5') : null,
  //       'verifikasi_pasien_6' => safe_post('verifikasi_pasien_6') !== '' ? safe_post('verifikasi_pasien_6') : null,
  //       'verifikasi_pasien_7' => safe_post('verifikasi_pasien_7') !== '' ? safe_post('verifikasi_pasien_7') : null,
  //       'verifikasi_pasien_8' => safe_post('verifikasi_pasien_8') !== '' ? safe_post('verifikasi_pasien_8') : null,
  //       'verifikasi_pasien_9' => safe_post('verifikasi_pasien_9') !== '' ? safe_post('verifikasi_pasien_9') : null,
  //       'verifikasi_pasien_10' => safe_post('verifikasi_pasien_10') !== '' ? safe_post('verifikasi_pasien_10') : null,
  //       'verifikasi_pasien_11' => safe_post('verifikasi_pasien_11') !== '' ? safe_post('verifikasi_pasien_11') : null,
  //       'verifikasi_pasien_12' => safe_post('verifikasi_pasien_12') !== '' ? safe_post('verifikasi_pasien_12') : null,
  //       'verifikasi_pasien_13' => safe_post('verifikasi_pasien_13') !== '' ? safe_post('verifikasi_pasien_13') : null,
  //       'verifikasi_pasien_14' => safe_post('verifikasi_pasien_14') !== '' ? safe_post('verifikasi_pasien_14') : null,
  //       'verifikasi_pasien_15' => safe_post('verifikasi_pasien_15') !== '' ? safe_post('verifikasi_pasien_15') : null,
  //       'verifikasi_pasien_16' => safe_post('verifikasi_pasien_16') !== '' ? safe_post('verifikasi_pasien_16') : null,
  //       'verifikasi_pasien_17' => safe_post('verifikasi_pasien_17') !== '' ? safe_post('verifikasi_pasien_17') : null,
  //       'verifikasi_pasien_18' => safe_post('verifikasi_pasien_18') !== '' ? safe_post('verifikasi_pasien_18') : null,
  //       'verifikasi_pasien_19' => safe_post('verifikasi_pasien_19') !== '' ? safe_post('verifikasi_pasien_19') : null,
  //       'verifikasi_pasien_20' => safe_post('verifikasi_pasien_20') !== '' ? safe_post('verifikasi_pasien_20') : null,
  //       'verifikasi_pasien_21' => safe_post('verifikasi_pasien_21') !== '' ? safe_post('verifikasi_pasien_21') : null,
  //       'verifikasi_pasien_22' => safe_post('verifikasi_pasien_22') !== '' ? safe_post('verifikasi_pasien_22') : null,
  //       'verifikasi_pasien_23' => safe_post('verifikasi_pasien_23') !== '' ? safe_post('verifikasi_pasien_23') : null,
  //       'verifikasi_pasien_24' => safe_post('verifikasi_pasien_24') !== '' ? safe_post('verifikasi_pasien_24') : null,
  //       'verifikasi_pasien_25' => safe_post('verifikasi_pasien_25') !== '' ? safe_post('verifikasi_pasien_25') : null,
  //       'verifikasi_pasien_26' => safe_post('verifikasi_pasien_26') !== '' ? safe_post('verifikasi_pasien_26') : null,
  //       'verifikasi_pasien_27' => safe_post('verifikasi_pasien_27') !== '' ? safe_post('verifikasi_pasien_27') : null,
  //       'verifikasi_pasien_28' => safe_post('verifikasi_pasien_28') !== '' ? safe_post('verifikasi_pasien_28') : null,
  //       'verifikasi_pasien_29' => safe_post('verifikasi_pasien_29') !== '' ? safe_post('verifikasi_pasien_29') : null,
  //       'verifikasi_pasien_30' => safe_post('verifikasi_pasien_30') !== '' ? safe_post('verifikasi_pasien_30') : null,
  //       'verifikasi_pasien_31' => safe_post('verifikasi_pasien_31') !== '' ? safe_post('verifikasi_pasien_31') : null,
  //       'verifikasi_pasien_32' => safe_post('verifikasi_pasien_32') !== '' ? safe_post('verifikasi_pasien_32') : null,
  //       'verifikasi_pasien_33' => safe_post('verifikasi_pasien_33') !== '' ? safe_post('verifikasi_pasien_33') : null,
  //       'verifikasi_pasien_34' => safe_post('verifikasi_pasien_34') !== '' ? safe_post('verifikasi_pasien_34') : null,
  //       'verifikasi_pasien_35' => safe_post('verifikasi_pasien_35') !== '' ? safe_post('verifikasi_pasien_35') : null,
  //       'verifikasi_pasien_36' => safe_post('verifikasi_pasien_36') !== '' ? safe_post('verifikasi_pasien_36') : null,
  //     ]),

  //     'persiapan_fisik_pasien_ckp' => json_encode([
  //       'persiapan_fisik_pasien_1' => safe_post('persiapan_fisik_pasien_1') !== '' ? safe_post('persiapan_fisik_pasien_1') : null,
  //       'persiapan_fisik_pasien_2' => safe_post('persiapan_fisik_pasien_2') !== '' ? safe_post('persiapan_fisik_pasien_2') : null,
  //       'persiapan_fisik_pasien_3' => safe_post('persiapan_fisik_pasien_3') !== '' ? safe_post('persiapan_fisik_pasien_3') : null,
  //       'persiapan_fisik_pasien_4' => safe_post('persiapan_fisik_pasien_4') !== '' ? safe_post('persiapan_fisik_pasien_4') : null,
  //       'persiapan_fisik_pasien_5' => safe_post('persiapan_fisik_pasien_5') !== '' ? safe_post('persiapan_fisik_pasien_5') : null,
  //       'persiapan_fisik_pasien_6' => safe_post('persiapan_fisik_pasien_6') !== '' ? safe_post('persiapan_fisik_pasien_6') : null,
  //       'persiapan_fisik_pasien_7' => safe_post('persiapan_fisik_pasien_7') !== '' ? safe_post('persiapan_fisik_pasien_7') : null,
  //       'persiapan_fisik_pasien_8' => safe_post('persiapan_fisik_pasien_8') !== '' ? safe_post('persiapan_fisik_pasien_8') : null,
  //       'persiapan_fisik_pasien_9' => safe_post('persiapan_fisik_pasien_9') !== '' ? safe_post('persiapan_fisik_pasien_9') : null,
  //       'persiapan_fisik_pasien_10' => safe_post('persiapan_fisik_pasien_10') !== '' ? safe_post('persiapan_fisik_pasien_10') : null,
  //       'persiapan_fisik_pasien_11' => safe_post('persiapan_fisik_pasien_11') !== '' ? safe_post('persiapan_fisik_pasien_11') : null,
  //       'persiapan_fisik_pasien_12' => safe_post('persiapan_fisik_pasien_12') !== '' ? safe_post('persiapan_fisik_pasien_12') : null,
  //       'persiapan_fisik_pasien_13' => safe_post('persiapan_fisik_pasien_13') !== '' ? safe_post('persiapan_fisik_pasien_13') : null,
  //       'persiapan_fisik_pasien_14' => safe_post('persiapan_fisik_pasien_14') !== '' ? safe_post('persiapan_fisik_pasien_14') : null,
  //       'persiapan_fisik_pasien_15' => safe_post('persiapan_fisik_pasien_15') !== '' ? safe_post('persiapan_fisik_pasien_15') : null,
  //       'persiapan_fisik_pasien_16' => safe_post('persiapan_fisik_pasien_16') !== '' ? safe_post('persiapan_fisik_pasien_16') : null,
  //       'persiapan_fisik_pasien_17' => safe_post('persiapan_fisik_pasien_17') !== '' ? safe_post('persiapan_fisik_pasien_17') : null,
  //       'persiapan_fisik_pasien_18' => safe_post('persiapan_fisik_pasien_18') !== '' ? safe_post('persiapan_fisik_pasien_18') : null,
  //       'persiapan_fisik_pasien_19' => safe_post('persiapan_fisik_pasien_19') !== '' ? safe_post('persiapan_fisik_pasien_19') : null,
  //       'persiapan_fisik_pasien_20' => safe_post('persiapan_fisik_pasien_20') !== '' ? safe_post('persiapan_fisik_pasien_20') : null,
  //       'persiapan_fisik_pasien_21' => safe_post('persiapan_fisik_pasien_21') !== '' ? safe_post('persiapan_fisik_pasien_21') : null,
  //       'persiapan_fisik_pasien_22' => safe_post('persiapan_fisik_pasien_22') !== '' ? safe_post('persiapan_fisik_pasien_22') : null,
  //       'persiapan_fisik_pasien_23' => safe_post('persiapan_fisik_pasien_23') !== '' ? safe_post('persiapan_fisik_pasien_23') : null,
  //       'persiapan_fisik_pasien_24' => safe_post('persiapan_fisik_pasien_24') !== '' ? safe_post('persiapan_fisik_pasien_24') : null,
  //       'persiapan_fisik_pasien_25' => safe_post('persiapan_fisik_pasien_25') !== '' ? safe_post('persiapan_fisik_pasien_25') : null,
  //       'persiapan_fisik_pasien_26' => safe_post('persiapan_fisik_pasien_26') !== '' ? safe_post('persiapan_fisik_pasien_26') : null,
  //       'persiapan_fisik_pasien_27' => safe_post('persiapan_fisik_pasien_27') !== '' ? safe_post('persiapan_fisik_pasien_27') : null,
  //       'persiapan_fisik_pasien_28' => safe_post('persiapan_fisik_pasien_28') !== '' ? safe_post('persiapan_fisik_pasien_28') : null,
  //       'persiapan_fisik_pasien_29' => safe_post('persiapan_fisik_pasien_29') !== '' ? safe_post('persiapan_fisik_pasien_29') : null,
  //       'persiapan_fisik_pasien_30' => safe_post('persiapan_fisik_pasien_30') !== '' ? safe_post('persiapan_fisik_pasien_30') : null,
  //       'persiapan_fisik_pasien_31' => safe_post('persiapan_fisik_pasien_31') !== '' ? safe_post('persiapan_fisik_pasien_31') : null,
  //       'persiapan_fisik_pasien_32' => safe_post('persiapan_fisik_pasien_32') !== '' ? safe_post('persiapan_fisik_pasien_32') : null,
  //       'persiapan_fisik_pasien_33' => safe_post('persiapan_fisik_pasien_33') !== '' ? safe_post('persiapan_fisik_pasien_33') : null,
  //       'persiapan_fisik_pasien_34' => safe_post('persiapan_fisik_pasien_34') !== '' ? safe_post('persiapan_fisik_pasien_34') : null,
  //       'persiapan_fisik_pasien_35' => safe_post('persiapan_fisik_pasien_35') !== '' ? safe_post('persiapan_fisik_pasien_35') : null,
  //       'persiapan_fisik_pasien_36' => safe_post('persiapan_fisik_pasien_36') !== '' ? safe_post('persiapan_fisik_pasien_36') : null,
  //       'persiapan_fisik_pasien_37' => safe_post('persiapan_fisik_pasien_37') !== '' ? safe_post('persiapan_fisik_pasien_37') : null,
  //       'persiapan_fisik_pasien_38' => safe_post('persiapan_fisik_pasien_38') !== '' ? safe_post('persiapan_fisik_pasien_38') : null,
  //       'persiapan_fisik_pasien_39' => safe_post('persiapan_fisik_pasien_39') !== '' ? safe_post('persiapan_fisik_pasien_39') : null,
  //       'persiapan_fisik_pasien_40' => safe_post('persiapan_fisik_pasien_40') !== '' ? safe_post('persiapan_fisik_pasien_40') : null,
  //       'persiapan_fisik_pasien_41' => safe_post('persiapan_fisik_pasien_41') !== '' ? safe_post('persiapan_fisik_pasien_41') : null,
  //       'persiapan_fisik_pasien_42' => safe_post('persiapan_fisik_pasien_42') !== '' ? safe_post('persiapan_fisik_pasien_42') : null,
  //       'persiapan_fisik_pasien_43' => safe_post('persiapan_fisik_pasien_43') !== '' ? safe_post('persiapan_fisik_pasien_43') : null,
  //       'persiapan_fisik_pasien_44' => safe_post('persiapan_fisik_pasien_44') !== '' ? safe_post('persiapan_fisik_pasien_44') : null,
  //       'persiapan_fisik_pasien_45' => safe_post('persiapan_fisik_pasien_45') !== '' ? safe_post('persiapan_fisik_pasien_45') : null,
  //       'persiapan_fisik_pasien_46' => safe_post('persiapan_fisik_pasien_46') !== '' ? safe_post('persiapan_fisik_pasien_46') : null,
  //       'persiapan_fisik_pasien_47' => safe_post('persiapan_fisik_pasien_47') !== '' ? safe_post('persiapan_fisik_pasien_47') : null,
  //       'persiapan_fisik_pasien_48' => safe_post('persiapan_fisik_pasien_48') !== '' ? safe_post('persiapan_fisik_pasien_48') : null,
  //       'persiapan_fisik_pasien_49' => safe_post('persiapan_fisik_pasien_49') !== '' ? safe_post('persiapan_fisik_pasien_49') : null,
  //     ]),

  //     'perawat_ruangan_pfp'     => safe_post('perawat_ruangan_pfp') !== '' ? safe_post('perawat_ruangan_pfp') : NULL,
  //     'jam_pfp'           => safe_post('jam_pfp') !== '' ? safe_post('jam_pfp') : NULL,
  //     'perawat_penerima_ot_ppo'   => safe_post('perawat_penerima_ot_ppo') !== '' ? safe_post('perawat_penerima_ot_ppo') : NULL,
  //     'jam_ppo'           => safe_post('jam_ppo') !== '' ? safe_post('jam_ppo') : NULL,


  //     'site_marketing' => json_encode([
  //       'site_marketing' => safe_post('site_marketing') !== '' ? safe_post('site_marketing') : null,
  //       'site_marketing' => safe_post('site_marketing') !== '' ? safe_post('site_marketing') : null,
  //     ]),

  //     'perawat_ot_po'   => safe_post('perawat_ot_po') !== '' ? safe_post('perawat_ot_po') : NULL,
  //     'jam_tanggal_po'  => (safe_post('jam_tanggal_po') !== '' ? datetime2mysql(safe_post('jam_tanggal_po')) : NULL),

  //     'asuhan_keperawatan_ak_1' => json_encode([
  //       'asuhan_keperawatan_ak_1' => safe_post('asuhan_keperawatan_ak_1') !== '' ? safe_post('asuhan_keperawatan_ak_1') : null,
  //       'asuhan_keperawatan_ak_2' => safe_post('asuhan_keperawatan_ak_2') !== '' ? safe_post('asuhan_keperawatan_ak_2') : null,
  //       'asuhan_keperawatan_ak_3' => safe_post('asuhan_keperawatan_ak_3') !== '' ? safe_post('asuhan_keperawatan_ak_3') : null,
  //       'asuhan_keperawatan_ak_4' => safe_post('asuhan_keperawatan_ak_4') !== '' ? safe_post('asuhan_keperawatan_ak_4') : null,
  //       'asuhan_keperawatan_ak_5' => safe_post('asuhan_keperawatan_ak_5') !== '' ? safe_post('asuhan_keperawatan_ak_5') : null,
  //       'asuhan_keperawatan_ak_6' => safe_post('asuhan_keperawatan_ak_6') !== '' ? safe_post('asuhan_keperawatan_ak_6') : null,
  //       'asuhan_keperawatan_ak_7' => safe_post('asuhan_keperawatan_ak_7') !== '' ? safe_post('asuhan_keperawatan_ak_7') : null,
  //       'asuhan_keperawatan_ak_8' => safe_post('asuhan_keperawatan_ak_8') !== '' ? safe_post('asuhan_keperawatan_ak_8') : null,
  //       'asuhan_keperawatan_ak_9' => safe_post('asuhan_keperawatan_ak_9') !== '' ? safe_post('asuhan_keperawatan_ak_9') : null,
  //       'asuhan_keperawatan_ak_10' => safe_post('asuhan_keperawatan_ak_10') !== '' ? safe_post('asuhan_keperawatan_ak_10') : null,
  //       'asuhan_keperawatan_ak_11' => safe_post('asuhan_keperawatan_ak_11') !== '' ? safe_post('asuhan_keperawatan_ak_11') : null,
  //       'asuhan_keperawatan_ak_12' => safe_post('asuhan_keperawatan_ak_12') !== '' ? safe_post('asuhan_keperawatan_ak_12') : null,
  //       'asuhan_keperawatan_ak_13' => safe_post('asuhan_keperawatan_ak_13') !== '' ? safe_post('asuhan_keperawatan_ak_13') : null,
  //       'asuhan_keperawatan_ak_14' => safe_post('asuhan_keperawatan_ak_14') !== '' ? safe_post('asuhan_keperawatan_ak_14') : null,
  //       'asuhan_keperawatan_ak_15' => safe_post('asuhan_keperawatan_ak_15') !== '' ? safe_post('asuhan_keperawatan_ak_15') : null,
  //       'asuhan_keperawatan_ak_16' => safe_post('asuhan_keperawatan_ak_16') !== '' ? safe_post('asuhan_keperawatan_ak_16') : null,
  //       'asuhan_keperawatan_ak_17' => safe_post('asuhan_keperawatan_ak_17') !== '' ? safe_post('asuhan_keperawatan_ak_17') : null,
  //       'asuhan_keperawatan_ak_18' => safe_post('asuhan_keperawatan_ak_18') !== '' ? safe_post('asuhan_keperawatan_ak_18') : null,
  //       'asuhan_keperawatan_ak_19' => safe_post('asuhan_keperawatan_ak_19') !== '' ? safe_post('asuhan_keperawatan_ak_19') : null,
  //       'asuhan_keperawatan_ak_20' => safe_post('asuhan_keperawatan_ak_20') !== '' ? safe_post('asuhan_keperawatan_ak_20') : null,
  //       'asuhan_keperawatan_ak_21' => safe_post('asuhan_keperawatan_ak_21') !== '' ? safe_post('asuhan_keperawatan_ak_21') : null,
  //       'asuhan_keperawatan_ak_22' => safe_post('asuhan_keperawatan_ak_22') !== '' ? safe_post('asuhan_keperawatan_ak_22') : null,
  //       'asuhan_keperawatan_ak_23' => safe_post('asuhan_keperawatan_ak_23') !== '' ? safe_post('asuhan_keperawatan_ak_23') : null,
  //       'asuhan_keperawatan_ak_24' => safe_post('asuhan_keperawatan_ak_24') !== '' ? safe_post('asuhan_keperawatan_ak_24') : null,
  //       'asuhan_keperawatan_ak_25' => safe_post('asuhan_keperawatan_ak_25') !== '' ? safe_post('asuhan_keperawatan_ak_25') : null,
  //       'asuhan_keperawatan_ak_26' => safe_post('asuhan_keperawatan_ak_26') !== '' ? safe_post('asuhan_keperawatan_ak_26') : null,
  //       'asuhan_keperawatan_ak_27' => safe_post('asuhan_keperawatan_ak_27') !== '' ? safe_post('asuhan_keperawatan_ak_27') : null,
  //       'asuhan_keperawatan_ak_28' => safe_post('asuhan_keperawatan_ak_28') !== '' ? safe_post('asuhan_keperawatan_ak_28') : null,
  //       'asuhan_keperawatan_ak_29' => safe_post('asuhan_keperawatan_ak_29') !== '' ? safe_post('asuhan_keperawatan_ak_29') : null,
  //       'asuhan_keperawatan_ak_30' => safe_post('asuhan_keperawatan_ak_30') !== '' ? safe_post('asuhan_keperawatan_ak_30') : null,
  //       'asuhan_keperawatan_ak_31' => safe_post('asuhan_keperawatan_ak_31') !== '' ? safe_post('asuhan_keperawatan_ak_31') : null,
  //       'asuhan_keperawatan_ak_32' => safe_post('asuhan_keperawatan_ak_32') !== '' ? safe_post('asuhan_keperawatan_ak_32') : null,
  //       'asuhan_keperawatan_ak_33' => safe_post('asuhan_keperawatan_ak_33') !== '' ? safe_post('asuhan_keperawatan_ak_33') : null,
  //       'asuhan_keperawatan_ak_34' => safe_post('asuhan_keperawatan_ak_34') !== '' ? safe_post('asuhan_keperawatan_ak_34') : null,
  //       'asuhan_keperawatan_ak_35' => safe_post('asuhan_keperawatan_ak_35') !== '' ? safe_post('asuhan_keperawatan_ak_35') : null,
  //       'asuhan_keperawatan_ak_36' => safe_post('asuhan_keperawatan_ak_36') !== '' ? safe_post('asuhan_keperawatan_ak_36') : null,
  //       'asuhan_keperawatan_ak_37' => safe_post('asuhan_keperawatan_ak_37') !== '' ? safe_post('asuhan_keperawatan_ak_37') : null,
  //       'asuhan_keperawatan_ak_38' => safe_post('asuhan_keperawatan_ak_38') !== '' ? safe_post('asuhan_keperawatan_ak_38') : null,
  //       'asuhan_keperawatan_ak_39' => safe_post('asuhan_keperawatan_ak_39') !== '' ? safe_post('asuhan_keperawatan_ak_39') : null,
  //       'asuhan_keperawatan_ak_40' => safe_post('asuhan_keperawatan_ak_40') !== '' ? safe_post('asuhan_keperawatan_ak_40') : null,
  //       'asuhan_keperawatan_ak_41' => safe_post('asuhan_keperawatan_ak_41') !== '' ? safe_post('asuhan_keperawatan_ak_41') : null,
  //       'asuhan_keperawatan_ak_42' => safe_post('asuhan_keperawatan_ak_42') !== '' ? safe_post('asuhan_keperawatan_ak_42') : null,
  //       'asuhan_keperawatan_ak_43' => safe_post('asuhan_keperawatan_ak_43') !== '' ? safe_post('asuhan_keperawatan_ak_43') : null,
  //       'asuhan_keperawatan_ak_44' => safe_post('asuhan_keperawatan_ak_44') !== '' ? safe_post('asuhan_keperawatan_ak_44') : null,
  //       'asuhan_keperawatan_ak_45' => safe_post('asuhan_keperawatan_ak_45') !== '' ? safe_post('asuhan_keperawatan_ak_45') : null,
  //       'asuhan_keperawatan_ak_46' => safe_post('asuhan_keperawatan_ak_46') !== '' ? safe_post('asuhan_keperawatan_ak_46') : null,
  //       'asuhan_keperawatan_ak_47' => safe_post('asuhan_keperawatan_ak_47') !== '' ? safe_post('asuhan_keperawatan_ak_47') : null,
  //       'asuhan_keperawatan_ak_48' => safe_post('asuhan_keperawatan_ak_48') !== '' ? safe_post('asuhan_keperawatan_ak_48') : null,
  //       'asuhan_keperawatan_ak_49' => safe_post('asuhan_keperawatan_ak_49') !== '' ? safe_post('asuhan_keperawatan_ak_49') : null,
  //       'asuhan_keperawatan_ak_50' => safe_post('asuhan_keperawatan_ak_50') !== '' ? safe_post('asuhan_keperawatan_ak_50') : null,
  //       'asuhan_keperawatan_ak_51' => safe_post('asuhan_keperawatan_ak_51') !== '' ? safe_post('asuhan_keperawatan_ak_51') : null,
  //       'asuhan_keperawatan_ak_52' => safe_post('asuhan_keperawatan_ak_52') !== '' ? safe_post('asuhan_keperawatan_ak_52') : null,
  //       'asuhan_keperawatan_ak_53' => safe_post('asuhan_keperawatan_ak_53') !== '' ? safe_post('asuhan_keperawatan_ak_53') : null,
  //       'asuhan_keperawatan_ak_54' => safe_post('asuhan_keperawatan_ak_54') !== '' ? safe_post('asuhan_keperawatan_ak_54') : null,
  //       'asuhan_keperawatan_ak_55' => safe_post('asuhan_keperawatan_ak_55') !== '' ? safe_post('asuhan_keperawatan_ak_55') : null,
  //       'asuhan_keperawatan_ak_56' => safe_post('asuhan_keperawatan_ak_56') !== '' ? safe_post('asuhan_keperawatan_ak_56') : null,
  //       'asuhan_keperawatan_ak_57' => safe_post('asuhan_keperawatan_ak_57') !== '' ? safe_post('asuhan_keperawatan_ak_57') : null,
  //     ]),

  //     'perawwat_ruangan_pr'     => safe_post('perawwat_ruangan_pr') !== '' ? safe_post('perawwat_ruangan_pr') : NULL,
  //     'perawwat_anastesi_pa'     => safe_post('perawwat_anastesi_pa') !== '' ? safe_post('perawwat_anastesi_pa') : NULL,
  //     'perawwat_kamar_bedah'     => safe_post('perawwat_kamar_bedah') !== '' ? safe_post('perawwat_kamar_bedah') : NULL,



  //     'time_out_ckio' => json_encode([
  //       'time_out_ckio_1' => safe_post('time_out_ckio_1') !== '' ? safe_post('time_out_ckio_1') : null,
  //       'time_out_ckio_2' => safe_post('time_out_ckio_2') !== '' ? safe_post('time_out_ckio_2') : null,
  //       'time_out_ckio_1' => safe_post('time_out_ckio_1') !== '' ? safe_post('time_out_ckio_1') : null,
  //       'time_out_ckio_4' => safe_post('time_out_ckio_4') !== '' ? safe_post('time_out_ckio_4') : null,
  //       'time_out_ckio_5' => safe_post('time_out_ckio_5') !== '' ? safe_post('time_out_ckio_5') : null,
  //       'time_out_ckio_4' => safe_post('time_out_ckio_4') !== '' ? safe_post('time_out_ckio_4') : null,
  //       'time_out_ckio_7' => safe_post('time_out_ckio_7') !== '' ? safe_post('time_out_ckio_7') : null,
  //       'time_out_ckio_8' => safe_post('time_out_ckio_8') !== '' ? safe_post('time_out_ckio_8') : null,
  //       'time_out_ckio_7' => safe_post('time_out_ckio_7') !== '' ? safe_post('time_out_ckio_7') : null,
  //       'time_out_ckio_10' => safe_post('time_out_ckio_10') !== '' ? safe_post('time_out_ckio_10') : null,
  //       'time_out_ckio_11' => safe_post('time_out_ckio_11') !== '' ? safe_post('time_out_ckio_11') : null,
  //     ]),

  //     'catatan_keperawatan_intra_operasi' => json_encode([
  //       'catatan_keperawatan_intra_operasi_1' => safe_post('catatan_keperawatan_intra_operasi_1') !== '' ? safe_post('catatan_keperawatan_intra_operasi_1') : null,
  //       'catatan_keperawatan_intra_operasi_2' => safe_post('catatan_keperawatan_intra_operasi_2') !== '' ? safe_post('catatan_keperawatan_intra_operasi_2') : null,
  //       'catatan_keperawatan_intra_operasi_3' => safe_post('catatan_keperawatan_intra_operasi_3') !== '' ? safe_post('catatan_keperawatan_intra_operasi_3') : null,
  //       'catatan_keperawatan_intra_operasi_4' => safe_post('catatan_keperawatan_intra_operasi_4') !== '' ? safe_post('catatan_keperawatan_intra_operasi_4') : null,
  //       'catatan_keperawatan_intra_operasi_5' => safe_post('catatan_keperawatan_intra_operasi_5') !== '' ? safe_post('catatan_keperawatan_intra_operasi_5') : null,
  //       'catatan_keperawatan_intra_operasi_6' => safe_post('catatan_keperawatan_intra_operasi_6') !== '' ? safe_post('catatan_keperawatan_intra_operasi_6') : null,
  //       'catatan_keperawatan_intra_operasi_7' => safe_post('catatan_keperawatan_intra_operasi_7') !== '' ? safe_post('catatan_keperawatan_intra_operasi_7') : null,
  //       'catatan_keperawatan_intra_operasi_8' => safe_post('catatan_keperawatan_intra_operasi_8') !== '' ? safe_post('catatan_keperawatan_intra_operasi_8') : null,
  //       'catatan_keperawatan_intra_operasi_9' => safe_post('catatan_keperawatan_intra_operasi_9') !== '' ? safe_post('catatan_keperawatan_intra_operasi_9') : null,
  //       'catatan_keperawatan_intra_operasi_10' => safe_post('catatan_keperawatan_intra_operasi_10') !== '' ? safe_post('catatan_keperawatan_intra_operasi_10') : null,
  //       'catatan_keperawatan_intra_operasi_11' => safe_post('catatan_keperawatan_intra_operasi_11') !== '' ? safe_post('catatan_keperawatan_intra_operasi_11') : null,
  //       'catatan_keperawatan_intra_operasi_12' => safe_post('catatan_keperawatan_intra_operasi_12') !== '' ? safe_post('catatan_keperawatan_intra_operasi_12') : null,
  //       'catatan_keperawatan_intra_operasi_13' => safe_post('catatan_keperawatan_intra_operasi_13') !== '' ? safe_post('catatan_keperawatan_intra_operasi_13') : null,
  //       'catatan_keperawatan_intra_operasi_14' => safe_post('catatan_keperawatan_intra_operasi_14') !== '' ? safe_post('catatan_keperawatan_intra_operasi_14') : null,
  //       'catatan_keperawatan_intra_operasi_15' => safe_post('catatan_keperawatan_intra_operasi_15') !== '' ? safe_post('catatan_keperawatan_intra_operasi_15') : null,
  //       'catatan_keperawatan_intra_operasi_16' => safe_post('catatan_keperawatan_intra_operasi_16') !== '' ? safe_post('catatan_keperawatan_intra_operasi_16') : null,
  //       'catatan_keperawatan_intra_operasi_16' => safe_post('catatan_keperawatan_intra_operasi_16') !== '' ? safe_post('catatan_keperawatan_intra_operasi_16') : null,
  //       'catatan_keperawatan_intra_operasi_18' => safe_post('catatan_keperawatan_intra_operasi_18') !== '' ? safe_post('catatan_keperawatan_intra_operasi_18') : null,
  //       'catatan_keperawatan_intra_operasi_19' => safe_post('catatan_keperawatan_intra_operasi_19') !== '' ? safe_post('catatan_keperawatan_intra_operasi_19') : null,
  //       'catatan_keperawatan_intra_operasi_19' => safe_post('catatan_keperawatan_intra_operasi_19') !== '' ? safe_post('catatan_keperawatan_intra_operasi_19') : null,
  //       'catatan_keperawatan_intra_operasi_21' => safe_post('catatan_keperawatan_intra_operasi_21') !== '' ? safe_post('catatan_keperawatan_intra_operasi_21') : null,
  //       'catatan_keperawatan_intra_operasi_22' => safe_post('catatan_keperawatan_intra_operasi_22') !== '' ? safe_post('catatan_keperawatan_intra_operasi_22') : null,
  //       'catatan_keperawatan_intra_operasi_23' => safe_post('catatan_keperawatan_intra_operasi_23') !== '' ? safe_post('catatan_keperawatan_intra_operasi_23') : null,
  //       'catatan_keperawatan_intra_operasi_24' => safe_post('catatan_keperawatan_intra_operasi_24') !== '' ? safe_post('catatan_keperawatan_intra_operasi_24') : null,
  //       'catatan_keperawatan_intra_operasi_25' => safe_post('catatan_keperawatan_intra_operasi_25') !== '' ? safe_post('catatan_keperawatan_intra_operasi_25') : null,
  //       'catatan_keperawatan_intra_operasi_26' => safe_post('catatan_keperawatan_intra_operasi_26') !== '' ? safe_post('catatan_keperawatan_intra_operasi_26') : null,
  //       'catatan_keperawatan_intra_operasi_27' => safe_post('catatan_keperawatan_intra_operasi_27') !== '' ? safe_post('catatan_keperawatan_intra_operasi_27') : null,
  //       'catatan_keperawatan_intra_operasi_28' => safe_post('catatan_keperawatan_intra_operasi_28') !== '' ? safe_post('catatan_keperawatan_intra_operasi_28') : null,
  //       'catatan_keperawatan_intra_operasi_29' => safe_post('catatan_keperawatan_intra_operasi_29') !== '' ? safe_post('catatan_keperawatan_intra_operasi_29') : null,
  //       'catatan_keperawatan_intra_operasi_30' => safe_post('catatan_keperawatan_intra_operasi_30') !== '' ? safe_post('catatan_keperawatan_intra_operasi_30') : null,
  //       'catatan_keperawatan_intra_operasi_30' => safe_post('catatan_keperawatan_intra_operasi_30') !== '' ? safe_post('catatan_keperawatan_intra_operasi_30') : null,
  //       'catatan_keperawatan_intra_operasi_32' => safe_post('catatan_keperawatan_intra_operasi_32') !== '' ? safe_post('catatan_keperawatan_intra_operasi_32') : null,
  //       'catatan_keperawatan_intra_operasi_33' => safe_post('catatan_keperawatan_intra_operasi_33') !== '' ? safe_post('catatan_keperawatan_intra_operasi_33') : null,
  //       'catatan_keperawatan_intra_operasi_34' => safe_post('catatan_keperawatan_intra_operasi_34') !== '' ? safe_post('catatan_keperawatan_intra_operasi_34') : null,
  //       'catatan_keperawatan_intra_operasi_35' => safe_post('catatan_keperawatan_intra_operasi_35') !== '' ? safe_post('catatan_keperawatan_intra_operasi_35') : null,
  //       'catatan_keperawatan_intra_operasi_35' => safe_post('catatan_keperawatan_intra_operasi_35') !== '' ? safe_post('catatan_keperawatan_intra_operasi_35') : null,
  //       'catatan_keperawatan_intra_operasi_37' => safe_post('catatan_keperawatan_intra_operasi_37') !== '' ? safe_post('catatan_keperawatan_intra_operasi_37') : null,
  //       'catatan_keperawatan_intra_operasi_38' => safe_post('catatan_keperawatan_intra_operasi_38') !== '' ? safe_post('catatan_keperawatan_intra_operasi_38') : null,
  //       'catatan_keperawatan_intra_operasi_38' => safe_post('catatan_keperawatan_intra_operasi_38') !== '' ? safe_post('catatan_keperawatan_intra_operasi_38') : null,
  //       'catatan_keperawatan_intra_operasi_40' => safe_post('catatan_keperawatan_intra_operasi_40') !== '' ? safe_post('catatan_keperawatan_intra_operasi_40') : null,
  //       'catatan_keperawatan_intra_operasi_41' => safe_post('catatan_keperawatan_intra_operasi_41') !== '' ? safe_post('catatan_keperawatan_intra_operasi_41') : null,
  //       'catatan_keperawatan_intra_operasi_42' => safe_post('catatan_keperawatan_intra_operasi_42') !== '' ? safe_post('catatan_keperawatan_intra_operasi_42') : null,
  //       'catatan_keperawatan_intra_operasi_43' => safe_post('catatan_keperawatan_intra_operasi_43') !== '' ? safe_post('catatan_keperawatan_intra_operasi_43') : null,
  //       'catatan_keperawatan_intra_operasi_44' => safe_post('catatan_keperawatan_intra_operasi_44') !== '' ? safe_post('catatan_keperawatan_intra_operasi_44') : null,
  //       'catatan_keperawatan_intra_operasi_45' => safe_post('catatan_keperawatan_intra_operasi_45') !== '' ? safe_post('catatan_keperawatan_intra_operasi_45') : null,
  //       'catatan_keperawatan_intra_operasi_46' => safe_post('catatan_keperawatan_intra_operasi_46') !== '' ? safe_post('catatan_keperawatan_intra_operasi_46') : null,
  //       'catatan_keperawatan_intra_operasi_47' => safe_post('catatan_keperawatan_intra_operasi_47') !== '' ? safe_post('catatan_keperawatan_intra_operasi_47') : null,
  //       'catatan_keperawatan_intra_operasi_48' => safe_post('catatan_keperawatan_intra_operasi_48') !== '' ? safe_post('catatan_keperawatan_intra_operasi_48') : null,
  //       'catatan_keperawatan_intra_operasi_49' => safe_post('catatan_keperawatan_intra_operasi_49') !== '' ? safe_post('catatan_keperawatan_intra_operasi_49') : null,
  //       'catatan_keperawatan_intra_operasi_50' => safe_post('catatan_keperawatan_intra_operasi_50') !== '' ? safe_post('catatan_keperawatan_intra_operasi_50') : null,
  //       'catatan_keperawatan_intra_operasi_51' => safe_post('catatan_keperawatan_intra_operasi_51') !== '' ? safe_post('catatan_keperawatan_intra_operasi_51') : null,
  //       'catatan_keperawatan_intra_operasi_52' => safe_post('catatan_keperawatan_intra_operasi_52') !== '' ? safe_post('catatan_keperawatan_intra_operasi_52') : null,
  //       'catatan_keperawatan_intra_operasi_53' => safe_post('catatan_keperawatan_intra_operasi_53') !== '' ? safe_post('catatan_keperawatan_intra_operasi_53') : null,
  //       'catatan_keperawatan_intra_operasi_54' => safe_post('catatan_keperawatan_intra_operasi_54') !== '' ? safe_post('catatan_keperawatan_intra_operasi_54') : null,
  //       'catatan_keperawatan_intra_operasi_55' => safe_post('catatan_keperawatan_intra_operasi_55') !== '' ? safe_post('catatan_keperawatan_intra_operasi_55') : null,
  //       'catatan_keperawatan_intra_operasi_56' => safe_post('catatan_keperawatan_intra_operasi_56') !== '' ? safe_post('catatan_keperawatan_intra_operasi_56') : null,
  //       'catatan_keperawatan_intra_operasi_57' => safe_post('catatan_keperawatan_intra_operasi_57') !== '' ? safe_post('catatan_keperawatan_intra_operasi_57') : null,
  //       'catatan_keperawatan_intra_operasi_58' => safe_post('catatan_keperawatan_intra_operasi_58') !== '' ? safe_post('catatan_keperawatan_intra_operasi_58') : null,
  //       'catatan_keperawatan_intra_operasi_59' => safe_post('catatan_keperawatan_intra_operasi_59') !== '' ? safe_post('catatan_keperawatan_intra_operasi_59') : null,
  //       'catatan_keperawatan_intra_operasi_60' => safe_post('catatan_keperawatan_intra_operasi_60') !== '' ? safe_post('catatan_keperawatan_intra_operasi_60') : null,
  //       'catatan_keperawatan_intra_operasi_61' => safe_post('catatan_keperawatan_intra_operasi_61') !== '' ? safe_post('catatan_keperawatan_intra_operasi_61') : null,
  //       'catatan_keperawatan_intra_operasi_61' => safe_post('catatan_keperawatan_intra_operasi_61') !== '' ? safe_post('catatan_keperawatan_intra_operasi_61') : null,
  //       'catatan_keperawatan_intra_operasi_63' => safe_post('catatan_keperawatan_intra_operasi_63') !== '' ? safe_post('catatan_keperawatan_intra_operasi_63') : null,
  //       'catatan_keperawatan_intra_operasi_64' => safe_post('catatan_keperawatan_intra_operasi_64') !== '' ? safe_post('catatan_keperawatan_intra_operasi_64') : null,
  //       'catatan_keperawatan_intra_operasi_64' => safe_post('catatan_keperawatan_intra_operasi_64') !== '' ? safe_post('catatan_keperawatan_intra_operasi_64') : null,
  //       'catatan_keperawatan_intra_operasi_66' => safe_post('catatan_keperawatan_intra_operasi_66') !== '' ? safe_post('catatan_keperawatan_intra_operasi_66') : null,
  //       'catatan_keperawatan_intra_operasi_67' => safe_post('catatan_keperawatan_intra_operasi_67') !== '' ? safe_post('catatan_keperawatan_intra_operasi_67') : null,
  //       'catatan_keperawatan_intra_operasi_68' => safe_post('catatan_keperawatan_intra_operasi_68') !== '' ? safe_post('catatan_keperawatan_intra_operasi_68') : null,
  //       'catatan_keperawatan_intra_operasi_69' => safe_post('catatan_keperawatan_intra_operasi_69') !== '' ? safe_post('catatan_keperawatan_intra_operasi_69') : null,
  //       'catatan_keperawatan_intra_operasi_70' => safe_post('catatan_keperawatan_intra_operasi_70') !== '' ? safe_post('catatan_keperawatan_intra_operasi_70') : null,
  //       'catatan_keperawatan_intra_operasi_71' => safe_post('catatan_keperawatan_intra_operasi_71') !== '' ? safe_post('catatan_keperawatan_intra_operasi_71') : null,
  //       'catatan_keperawatan_intra_operasi_72' => safe_post('catatan_keperawatan_intra_operasi_72') !== '' ? safe_post('catatan_keperawatan_intra_operasi_72') : null,
  //       'catatan_keperawatan_intra_operasi_73' => safe_post('catatan_keperawatan_intra_operasi_73') !== '' ? safe_post('catatan_keperawatan_intra_operasi_73') : null,
  //       'catatan_keperawatan_intra_operasi_74' => safe_post('catatan_keperawatan_intra_operasi_74') !== '' ? safe_post('catatan_keperawatan_intra_operasi_74') : null,
  //       'catatan_keperawatan_intra_operasi_75' => safe_post('catatan_keperawatan_intra_operasi_75') !== '' ? safe_post('catatan_keperawatan_intra_operasi_75') : null,
  //       'catatan_keperawatan_intra_operasi_76' => safe_post('catatan_keperawatan_intra_operasi_76') !== '' ? safe_post('catatan_keperawatan_intra_operasi_76') : null,
  //       'catatan_keperawatan_intra_operasi_77' => safe_post('catatan_keperawatan_intra_operasi_77') !== '' ? safe_post('catatan_keperawatan_intra_operasi_77') : null,
  //       'catatan_keperawatan_intra_operasi_78' => safe_post('catatan_keperawatan_intra_operasi_78') !== '' ? safe_post('catatan_keperawatan_intra_operasi_78') : null,
  //       'catatan_keperawatan_intra_operasi_78' => safe_post('catatan_keperawatan_intra_operasi_78') !== '' ? safe_post('catatan_keperawatan_intra_operasi_78') : null,
  //       'catatan_keperawatan_intra_operasi_80' => safe_post('catatan_keperawatan_intra_operasi_80') !== '' ? safe_post('catatan_keperawatan_intra_operasi_80') : null,
  //       'catatan_keperawatan_intra_operasi_81' => safe_post('catatan_keperawatan_intra_operasi_81') !== '' ? safe_post('catatan_keperawatan_intra_operasi_81') : null,
  //       'catatan_keperawatan_intra_operasi_82' => safe_post('catatan_keperawatan_intra_operasi_82') !== '' ? safe_post('catatan_keperawatan_intra_operasi_82') : null,
  //       'catatan_keperawatan_intra_operasi_83' => safe_post('catatan_keperawatan_intra_operasi_83') !== '' ? safe_post('catatan_keperawatan_intra_operasi_83') : null,
  //       'catatan_keperawatan_intra_operasi_84' => safe_post('catatan_keperawatan_intra_operasi_84') !== '' ? safe_post('catatan_keperawatan_intra_operasi_84') : null,
  //       'catatan_keperawatan_intra_operasi_85' => safe_post('catatan_keperawatan_intra_operasi_85') !== '' ? safe_post('catatan_keperawatan_intra_operasi_85') : null,
  //       'catatan_keperawatan_intra_operasi_86' => safe_post('catatan_keperawatan_intra_operasi_86') !== '' ? safe_post('catatan_keperawatan_intra_operasi_86') : null,
  //       'catatan_keperawatan_intra_operasi_87' => safe_post('catatan_keperawatan_intra_operasi_87') !== '' ? safe_post('catatan_keperawatan_intra_operasi_87') : null,
  //       'catatan_keperawatan_intra_operasi_88' => safe_post('catatan_keperawatan_intra_operasi_88') !== '' ? safe_post('catatan_keperawatan_intra_operasi_88') : null,
  //       'catatan_keperawatan_intra_operasi_89' => safe_post('catatan_keperawatan_intra_operasi_89') !== '' ? safe_post('catatan_keperawatan_intra_operasi_89') : null,
  //       'catatan_keperawatan_intra_operasi_90' => safe_post('catatan_keperawatan_intra_operasi_90') !== '' ? safe_post('catatan_keperawatan_intra_operasi_90') : null,
  //       'catatan_keperawatan_intra_operasi_91' => safe_post('catatan_keperawatan_intra_operasi_91') !== '' ? safe_post('catatan_keperawatan_intra_operasi_91') : null,
  //     ]),

  //     'catatan_keperawatan_intra_op' => json_encode([
  //       'catatan_keperawatan_intra_op_1' => safe_post('catatan_keperawatan_intra_op_1') !== '' ? safe_post('catatan_keperawatan_intra_op_1') : null,
  //       'catatan_keperawatan_intra_op_2' => safe_post('catatan_keperawatan_intra_op_2') !== '' ? safe_post('catatan_keperawatan_intra_op_2') : null,
  //       'catatan_keperawatan_intra_op_3' => safe_post('catatan_keperawatan_intra_op_3') !== '' ? safe_post('catatan_keperawatan_intra_op_3') : null,
  //       'catatan_keperawatan_intra_op_4' => safe_post('catatan_keperawatan_intra_op_4') !== '' ? safe_post('catatan_keperawatan_intra_op_4') : null,
  //       'catatan_keperawatan_intra_op_5' => safe_post('catatan_keperawatan_intra_op_5') !== '' ? safe_post('catatan_keperawatan_intra_op_5') : null,
  //       'catatan_keperawatan_intra_op_6' => safe_post('catatan_keperawatan_intra_op_6') !== '' ? safe_post('catatan_keperawatan_intra_op_6') : null,
  //       'catatan_keperawatan_intra_op_7' => safe_post('catatan_keperawatan_intra_op_7') !== '' ? safe_post('catatan_keperawatan_intra_op_7') : null,
  //       'catatan_keperawatan_intra_op_8' => safe_post('catatan_keperawatan_intra_op_8') !== '' ? safe_post('catatan_keperawatan_intra_op_8') : null,
  //       'catatan_keperawatan_intra_op_9' => safe_post('catatan_keperawatan_intra_op_9') !== '' ? safe_post('catatan_keperawatan_intra_op_9') : null,
  //       'catatan_keperawatan_intra_op_10' => safe_post('catatan_keperawatan_intra_op_10') !== '' ? safe_post('catatan_keperawatan_intra_op_10') : null,
  //       'catatan_keperawatan_intra_op_11' => safe_post('catatan_keperawatan_intra_op_11') !== '' ? safe_post('catatan_keperawatan_intra_op_11') : null,
  //       'catatan_keperawatan_intra_op_12' => safe_post('catatan_keperawatan_intra_op_12') !== '' ? safe_post('catatan_keperawatan_intra_op_12') : null,
  //       'catatan_keperawatan_intra_op_13' => safe_post('catatan_keperawatan_intra_op_13') !== '' ? safe_post('catatan_keperawatan_intra_op_13') : null,
  //       'catatan_keperawatan_intra_op_14' => safe_post('catatan_keperawatan_intra_op_14') !== '' ? safe_post('catatan_keperawatan_intra_op_14') : null,
  //       'catatan_keperawatan_intra_op_15' => safe_post('catatan_keperawatan_intra_op_15') !== '' ? safe_post('catatan_keperawatan_intra_op_15') : null,
  //       'catatan_keperawatan_intra_op_16' => safe_post('catatan_keperawatan_intra_op_16') !== '' ? safe_post('catatan_keperawatan_intra_op_16') : null,
  //       'catatan_keperawatan_intra_op_17' => safe_post('catatan_keperawatan_intra_op_17') !== '' ? safe_post('catatan_keperawatan_intra_op_17') : null,
  //       'catatan_keperawatan_intra_op_18' => safe_post('catatan_keperawatan_intra_op_18') !== '' ? safe_post('catatan_keperawatan_intra_op_18') : null,
  //       'catatan_keperawatan_intra_op_19' => safe_post('catatan_keperawatan_intra_op_19') !== '' ? safe_post('catatan_keperawatan_intra_op_19') : null,
  //       'catatan_keperawatan_intra_op_20' => safe_post('catatan_keperawatan_intra_op_20') !== '' ? safe_post('catatan_keperawatan_intra_op_20') : null,
  //       'catatan_keperawatan_intra_op_21' => safe_post('catatan_keperawatan_intra_op_21') !== '' ? safe_post('catatan_keperawatan_intra_op_21') : null,
  //       'catatan_keperawatan_intra_op_22' => safe_post('catatan_keperawatan_intra_op_22') !== '' ? safe_post('catatan_keperawatan_intra_op_22') : null,
  //       'catatan_keperawatan_intra_op_23' => safe_post('catatan_keperawatan_intra_op_23') !== '' ? safe_post('catatan_keperawatan_intra_op_23') : null,
  //       'catatan_keperawatan_intra_op_24' => safe_post('catatan_keperawatan_intra_op_24') !== '' ? safe_post('catatan_keperawatan_intra_op_24') : null,
  //       'catatan_keperawatan_intra_op_25' => safe_post('catatan_keperawatan_intra_op_25') !== '' ? safe_post('catatan_keperawatan_intra_op_25') : null,
  //       'catatan_keperawatan_intra_op_26' => safe_post('catatan_keperawatan_intra_op_26') !== '' ? safe_post('catatan_keperawatan_intra_op_26') : null,
  //       'catatan_keperawatan_intra_op_27' => safe_post('catatan_keperawatan_intra_op_27') !== '' ? safe_post('catatan_keperawatan_intra_op_27') : null,
  //       'catatan_keperawatan_intra_op_28' => safe_post('catatan_keperawatan_intra_op_28') !== '' ? safe_post('catatan_keperawatan_intra_op_28') : null,
  //       'catatan_keperawatan_intra_op_29' => safe_post('catatan_keperawatan_intra_op_29') !== '' ? safe_post('catatan_keperawatan_intra_op_29') : null,
  //       'catatan_keperawatan_intra_op_30' => safe_post('catatan_keperawatan_intra_op_30') !== '' ? safe_post('catatan_keperawatan_intra_op_30') : null,
  //       'catatan_keperawatan_intra_op_31' => safe_post('catatan_keperawatan_intra_op_31') !== '' ? safe_post('catatan_keperawatan_intra_op_31') : null,
  //       'catatan_keperawatan_intra_op_32' => safe_post('catatan_keperawatan_intra_op_32') !== '' ? safe_post('catatan_keperawatan_intra_op_32') : null,
  //       'catatan_keperawatan_intra_op_33' => safe_post('catatan_keperawatan_intra_op_33') !== '' ? safe_post('catatan_keperawatan_intra_op_33') : null,
  //       'catatan_keperawatan_intra_op_34' => safe_post('catatan_keperawatan_intra_op_34') !== '' ? safe_post('catatan_keperawatan_intra_op_34') : null,
  //       'catatan_keperawatan_intra_op_35' => safe_post('catatan_keperawatan_intra_op_35') !== '' ? safe_post('catatan_keperawatan_intra_op_35') : null,
  //       'catatan_keperawatan_intra_op_36' => safe_post('catatan_keperawatan_intra_op_36') !== '' ? safe_post('catatan_keperawatan_intra_op_36') : null,
  //       'catatan_keperawatan_intra_op_37' => safe_post('catatan_keperawatan_intra_op_37') !== '' ? safe_post('catatan_keperawatan_intra_op_37') : null,
  //       'catatan_keperawatan_intra_op_38' => safe_post('catatan_keperawatan_intra_op_38') !== '' ? safe_post('catatan_keperawatan_intra_op_38') : null,
  //       'catatan_keperawatan_intra_op_39' => safe_post('catatan_keperawatan_intra_op_39') !== '' ? safe_post('catatan_keperawatan_intra_op_39') : null,
  //       'catatan_keperawatan_intra_op_40' => safe_post('catatan_keperawatan_intra_op_40') !== '' ? safe_post('catatan_keperawatan_intra_op_40') : null,
  //       'catatan_keperawatan_intra_op_41' => safe_post('catatan_keperawatan_intra_op_41') !== '' ? safe_post('catatan_keperawatan_intra_op_41') : null,
  //       'catatan_keperawatan_intra_op_42' => safe_post('catatan_keperawatan_intra_op_42') !== '' ? safe_post('catatan_keperawatan_intra_op_42') : null,
  //       'catatan_keperawatan_intra_op_43' => safe_post('catatan_keperawatan_intra_op_43') !== '' ? safe_post('catatan_keperawatan_intra_op_43') : null,
  //       'catatan_keperawatan_intra_op_44' => safe_post('catatan_keperawatan_intra_op_44') !== '' ? safe_post('catatan_keperawatan_intra_op_44') : null,
  //       'catatan_keperawatan_intra_op_45' => safe_post('catatan_keperawatan_intra_op_45') !== '' ? safe_post('catatan_keperawatan_intra_op_45') : null,
  //       'catatan_keperawatan_intra_op_46' => safe_post('catatan_keperawatan_intra_op_46') !== '' ? safe_post('catatan_keperawatan_intra_op_46') : null,
  //       'catatan_keperawatan_intra_op_47' => safe_post('catatan_keperawatan_intra_op_47') !== '' ? safe_post('catatan_keperawatan_intra_op_47') : null,
  //       'catatan_keperawatan_intra_op_48' => safe_post('catatan_keperawatan_intra_op_48') !== '' ? safe_post('catatan_keperawatan_intra_op_48') : null,
  //       'catatan_keperawatan_intra_op_49' => safe_post('catatan_keperawatan_intra_op_49') !== '' ? safe_post('catatan_keperawatan_intra_op_49') : null,
  //       'catatan_keperawatan_intra_op_50' => safe_post('catatan_keperawatan_intra_op_50') !== '' ? safe_post('catatan_keperawatan_intra_op_50') : null,
  //     ]),

  //     'tanggal_jam_ckio'      => (safe_post('tanggal_jam_ckio') !== '' ? datetime2mysql(safe_post('tanggal_jam_ckio')) : NULL),
  //     'perawat_instrument_1'     => safe_post('perawat_instrument_1') !== '' ? safe_post('perawat_instrument_1') : NULL,
  //     'perawat_instrument_2'     => safe_post('perawat_instrument_2') !== '' ? safe_post('perawat_instrument_2') : NULL,

  //     'asuhan_keperawatan_ak_2' => json_encode([
  //       'asuhan_keperawatannnnn_ak_1' => safe_post('asuhan_keperawatannnnn_ak_1') !== '' ? safe_post('asuhan_keperawatannnnn_ak_1') : null,
  //       'asuhan_keperawatannnnn_ak_2' => safe_post('asuhan_keperawatannnnn_ak_2') !== '' ? safe_post('asuhan_keperawatannnnn_ak_2') : null,
  //       'asuhan_keperawatannnnn_ak_3' => safe_post('asuhan_keperawatannnnn_ak_3') !== '' ? safe_post('asuhan_keperawatannnnn_ak_3') : null,
  //       'asuhan_keperawatannnnn_ak_4' => safe_post('asuhan_keperawatannnnn_ak_4') !== '' ? safe_post('asuhan_keperawatannnnn_ak_4') : null,
  //       'asuhan_keperawatannnnn_ak_5' => safe_post('asuhan_keperawatannnnn_ak_5') !== '' ? safe_post('asuhan_keperawatannnnn_ak_5') : null,
  //       'asuhan_keperawatannnnn_ak_6' => safe_post('asuhan_keperawatannnnn_ak_6') !== '' ? safe_post('asuhan_keperawatannnnn_ak_6') : null,
  //       'asuhan_keperawatannnnn_ak_7' => safe_post('asuhan_keperawatannnnn_ak_7') !== '' ? safe_post('asuhan_keperawatannnnn_ak_7') : null,
  //       'asuhan_keperawatannnnn_ak_8' => safe_post('asuhan_keperawatannnnn_ak_8') !== '' ? safe_post('asuhan_keperawatannnnn_ak_8') : null,
  //       'asuhan_keperawatannnnn_ak_9' => safe_post('asuhan_keperawatannnnn_ak_9') !== '' ? safe_post('asuhan_keperawatannnnn_ak_9') : null,
  //       'asuhan_keperawatannnnn_ak_10' => safe_post('asuhan_keperawatannnnn_ak_10') !== '' ? safe_post('asuhan_keperawatannnnn_ak_10') : null,
  //       'asuhan_keperawatannnnn_ak_11' => safe_post('asuhan_keperawatannnnn_ak_11') !== '' ? safe_post('asuhan_keperawatannnnn_ak_11') : null,
  //       'asuhan_keperawatannnnn_ak_12' => safe_post('asuhan_keperawatannnnn_ak_12') !== '' ? safe_post('asuhan_keperawatannnnn_ak_12') : null,
  //       'asuhan_keperawatannnnn_ak_13' => safe_post('asuhan_keperawatannnnn_ak_13') !== '' ? safe_post('asuhan_keperawatannnnn_ak_13') : null,
  //       'asuhan_keperawatannnnn_ak_14' => safe_post('asuhan_keperawatannnnn_ak_14') !== '' ? safe_post('asuhan_keperawatannnnn_ak_14') : null,
  //       'asuhan_keperawatannnnn_ak_15' => safe_post('asuhan_keperawatannnnn_ak_15') !== '' ? safe_post('asuhan_keperawatannnnn_ak_15') : null,
  //       'asuhan_keperawatannnnn_ak_16' => safe_post('asuhan_keperawatannnnn_ak_16') !== '' ? safe_post('asuhan_keperawatannnnn_ak_16') : null,
  //       'asuhan_keperawatannnnn_ak_17' => safe_post('asuhan_keperawatannnnn_ak_17') !== '' ? safe_post('asuhan_keperawatannnnn_ak_17') : null,
  //       'asuhan_keperawatannnnn_ak_18' => safe_post('asuhan_keperawatannnnn_ak_18') !== '' ? safe_post('asuhan_keperawatannnnn_ak_18') : null,
  //       'asuhan_keperawatannnnn_ak_19' => safe_post('asuhan_keperawatannnnn_ak_19') !== '' ? safe_post('asuhan_keperawatannnnn_ak_19') : null,
  //       'asuhan_keperawatannnnn_ak_20' => safe_post('asuhan_keperawatannnnn_ak_20') !== '' ? safe_post('asuhan_keperawatannnnn_ak_20') : null,
  //       'asuhan_keperawatannnnn_ak_21' => safe_post('asuhan_keperawatannnnn_ak_21') !== '' ? safe_post('asuhan_keperawatannnnn_ak_21') : null,
  //       'asuhan_keperawatannnnn_ak_22' => safe_post('asuhan_keperawatannnnn_ak_22') !== '' ? safe_post('asuhan_keperawatannnnn_ak_22') : null,
  //       'asuhan_keperawatannnnn_ak_23' => safe_post('asuhan_keperawatannnnn_ak_23') !== '' ? safe_post('asuhan_keperawatannnnn_ak_23') : null,
  //       'asuhan_keperawatannnnn_ak_24' => safe_post('asuhan_keperawatannnnn_ak_24') !== '' ? safe_post('asuhan_keperawatannnnn_ak_24') : null,
  //       'asuhan_keperawatannnnn_ak_25' => safe_post('asuhan_keperawatannnnn_ak_25') !== '' ? safe_post('asuhan_keperawatannnnn_ak_25') : null,
  //       'asuhan_keperawatannnnn_ak_26' => safe_post('asuhan_keperawatannnnn_ak_26') !== '' ? safe_post('asuhan_keperawatannnnn_ak_26') : null,
  //       'asuhan_keperawatannnnn_ak_27' => safe_post('asuhan_keperawatannnnn_ak_27') !== '' ? safe_post('asuhan_keperawatannnnn_ak_27') : null,
  //       'asuhan_keperawatannnnn_ak_28' => safe_post('asuhan_keperawatannnnn_ak_28') !== '' ? safe_post('asuhan_keperawatannnnn_ak_28') : null,
  //       'asuhan_keperawatannnnn_ak_29' => safe_post('asuhan_keperawatannnnn_ak_29') !== '' ? safe_post('asuhan_keperawatannnnn_ak_29') : null,
  //       'asuhan_keperawatannnnn_ak_30' => safe_post('asuhan_keperawatannnnn_ak_30') !== '' ? safe_post('asuhan_keperawatannnnn_ak_30') : null,
  //       'asuhan_keperawatannnnn_ak_31' => safe_post('asuhan_keperawatannnnn_ak_31') !== '' ? safe_post('asuhan_keperawatannnnn_ak_31') : null,
  //       'asuhan_keperawatannnnn_ak_32' => safe_post('asuhan_keperawatannnnn_ak_32') !== '' ? safe_post('asuhan_keperawatannnnn_ak_32') : null,
  //       'asuhan_keperawatannnnn_ak_33' => safe_post('asuhan_keperawatannnnn_ak_33') !== '' ? safe_post('asuhan_keperawatannnnn_ak_33') : null,
  //       'asuhan_keperawatannnnn_ak_34' => safe_post('asuhan_keperawatannnnn_ak_34') !== '' ? safe_post('asuhan_keperawatannnnn_ak_34') : null,
  //       'asuhan_keperawatannnnn_ak_35' => safe_post('asuhan_keperawatannnnn_ak_35') !== '' ? safe_post('asuhan_keperawatannnnn_ak_35') : null,
  //       'asuhan_keperawatannnnn_ak_36' => safe_post('asuhan_keperawatannnnn_ak_36') !== '' ? safe_post('asuhan_keperawatannnnn_ak_36') : null,
  //       'asuhan_keperawatannnnn_ak_37' => safe_post('asuhan_keperawatannnnn_ak_37') !== '' ? safe_post('asuhan_keperawatannnnn_ak_37') : null,
  //       'asuhan_keperawatannnnn_ak_38' => safe_post('asuhan_keperawatannnnn_ak_38') !== '' ? safe_post('asuhan_keperawatannnnn_ak_38') : null,
  //       'asuhan_keperawatannnnn_ak_39' => safe_post('asuhan_keperawatannnnn_ak_39') !== '' ? safe_post('asuhan_keperawatannnnn_ak_39') : null,
  //       'asuhan_keperawatannnnn_ak_40' => safe_post('asuhan_keperawatannnnn_ak_40') !== '' ? safe_post('asuhan_keperawatannnnn_ak_40') : null,
  //       'asuhan_keperawatannnnn_ak_41' => safe_post('asuhan_keperawatannnnn_ak_41') !== '' ? safe_post('asuhan_keperawatannnnn_ak_41') : null,
  //       'asuhan_keperawatannnnn_ak_42' => safe_post('asuhan_keperawatannnnn_ak_42') !== '' ? safe_post('asuhan_keperawatannnnn_ak_42') : null,
  //       'asuhan_keperawatannnnn_ak_43' => safe_post('asuhan_keperawatannnnn_ak_43') !== '' ? safe_post('asuhan_keperawatannnnn_ak_43') : null,
  //       'asuhan_keperawatannnnn_ak_44' => safe_post('asuhan_keperawatannnnn_ak_44') !== '' ? safe_post('asuhan_keperawatannnnn_ak_44') : null,
  //       'asuhan_keperawatannnnn_ak_45' => safe_post('asuhan_keperawatannnnn_ak_45') !== '' ? safe_post('asuhan_keperawatannnnn_ak_45') : null,
  //       'asuhan_keperawatannnnn_ak_46' => safe_post('asuhan_keperawatannnnn_ak_46') !== '' ? safe_post('asuhan_keperawatannnnn_ak_46') : null,
  //       'asuhan_keperawatannnnn_ak_47' => safe_post('asuhan_keperawatannnnn_ak_47') !== '' ? safe_post('asuhan_keperawatannnnn_ak_47') : null,
  //       'asuhan_keperawatannnnn_ak_48' => safe_post('asuhan_keperawatannnnn_ak_48') !== '' ? safe_post('asuhan_keperawatannnnn_ak_48') : null,
  //       'asuhan_keperawatannnnn_ak_49' => safe_post('asuhan_keperawatannnnn_ak_49') !== '' ? safe_post('asuhan_keperawatannnnn_ak_49') : null,
  //       'asuhan_keperawatannnnn_ak_50' => safe_post('asuhan_keperawatannnnn_ak_50') !== '' ? safe_post('asuhan_keperawatannnnn_ak_50') : null,
  //       'asuhan_keperawatannnnn_ak_51' => safe_post('asuhan_keperawatannnnn_ak_51') !== '' ? safe_post('asuhan_keperawatannnnn_ak_51') : null,
  //       'asuhan_keperawatannnnn_ak_52' => safe_post('asuhan_keperawatannnnn_ak_52') !== '' ? safe_post('asuhan_keperawatannnnn_ak_52') : null,
  //       'asuhan_keperawatannnnn_ak_53' => safe_post('asuhan_keperawatannnnn_ak_53') !== '' ? safe_post('asuhan_keperawatannnnn_ak_53') : null,
  //       'asuhan_keperawatannnnn_ak_54' => safe_post('asuhan_keperawatannnnn_ak_54') !== '' ? safe_post('asuhan_keperawatannnnn_ak_54') : null,
  //       'asuhan_keperawatannnnn_ak_55' => safe_post('asuhan_keperawatannnnn_ak_55') !== '' ? safe_post('asuhan_keperawatannnnn_ak_55') : null,
  //       'asuhan_keperawatannnnn_ak_56' => safe_post('asuhan_keperawatannnnn_ak_56') !== '' ? safe_post('asuhan_keperawatannnnn_ak_56') : null,
  //       'asuhan_keperawatannnnn_ak_57' => safe_post('asuhan_keperawatannnnn_ak_57') !== '' ? safe_post('asuhan_keperawatannnnn_ak_57') : null,
  //       'asuhan_keperawatannnnn_ak_58' => safe_post('asuhan_keperawatannnnn_ak_58') !== '' ? safe_post('asuhan_keperawatannnnn_ak_58') : null,
  //       'asuhan_keperawatannnnn_ak_59' => safe_post('asuhan_keperawatannnnn_ak_59') !== '' ? safe_post('asuhan_keperawatannnnn_ak_59') : null,
  //       'asuhan_keperawatannnnn_ak_60' => safe_post('asuhan_keperawatannnnn_ak_60') !== '' ? safe_post('asuhan_keperawatannnnn_ak_60') : null,
  //       'asuhan_keperawatannnnn_ak_61' => safe_post('asuhan_keperawatannnnn_ak_61') !== '' ? safe_post('asuhan_keperawatannnnn_ak_61') : null,
  //       'asuhan_keperawatannnnn_ak_62' => safe_post('asuhan_keperawatannnnn_ak_62') !== '' ? safe_post('asuhan_keperawatannnnn_ak_62') : null,
  //       'asuhan_keperawatannnnn_ak_63' => safe_post('asuhan_keperawatannnnn_ak_63') !== '' ? safe_post('asuhan_keperawatannnnn_ak_63') : null,
  //       'asuhan_keperawatannnnn_ak_64' => safe_post('asuhan_keperawatannnnn_ak_64') !== '' ? safe_post('asuhan_keperawatannnnn_ak_64') : null,
  //       'asuhan_keperawatannnnn_ak_65' => safe_post('asuhan_keperawatannnnn_ak_65') !== '' ? safe_post('asuhan_keperawatannnnn_ak_65') : null,
  //       'asuhan_keperawatannnnn_ak_66' => safe_post('asuhan_keperawatannnnn_ak_66') !== '' ? safe_post('asuhan_keperawatannnnn_ak_66') : null,
  //       'asuhan_keperawatannnnn_ak_67' => safe_post('asuhan_keperawatannnnn_ak_67') !== '' ? safe_post('asuhan_keperawatannnnn_ak_67') : null,
  //       'asuhan_keperawatannnnn_ak_68' => safe_post('asuhan_keperawatannnnn_ak_68') !== '' ? safe_post('asuhan_keperawatannnnn_ak_68') : null,
  //       'asuhan_keperawatannnnn_ak_69' => safe_post('asuhan_keperawatannnnn_ak_69') !== '' ? safe_post('asuhan_keperawatannnnn_ak_69') : null,
  //       'asuhan_keperawatannnnn_ak_70' => safe_post('asuhan_keperawatannnnn_ak_70') !== '' ? safe_post('asuhan_keperawatannnnn_ak_70') : null,
  //       'asuhan_keperawatannnnn_ak_71' => safe_post('asuhan_keperawatannnnn_ak_71') !== '' ? safe_post('asuhan_keperawatannnnn_ak_71') : null,
  //       'asuhan_keperawatannnnn_ak_72' => safe_post('asuhan_keperawatannnnn_ak_72') !== '' ? safe_post('asuhan_keperawatannnnn_ak_72') : null,
  //       'asuhan_keperawatannnnn_ak_73' => safe_post('asuhan_keperawatannnnn_ak_73') !== '' ? safe_post('asuhan_keperawatannnnn_ak_73') : null,
  //       'asuhan_keperawatannnnn_ak_74' => safe_post('asuhan_keperawatannnnn_ak_74') !== '' ? safe_post('asuhan_keperawatannnnn_ak_74') : null,
  //       'asuhan_keperawatannnnn_ak_75' => safe_post('asuhan_keperawatannnnn_ak_75') !== '' ? safe_post('asuhan_keperawatannnnn_ak_75') : null,
  //       'asuhan_keperawatannnnn_ak_76' => safe_post('asuhan_keperawatannnnn_ak_76') !== '' ? safe_post('asuhan_keperawatannnnn_ak_76') : null,
  //       'asuhan_keperawatannnnn_ak_77' => safe_post('asuhan_keperawatannnnn_ak_77') !== '' ? safe_post('asuhan_keperawatannnnn_ak_77') : null,
  //       'asuhan_keperawatannnnn_ak_78' => safe_post('asuhan_keperawatannnnn_ak_78') !== '' ? safe_post('asuhan_keperawatannnnn_ak_78') : null,
  //       'asuhan_keperawatannnnn_ak_79' => safe_post('asuhan_keperawatannnnn_ak_79') !== '' ? safe_post('asuhan_keperawatannnnn_ak_79') : null,
  //       'asuhan_keperawatannnnn_ak_80' => safe_post('asuhan_keperawatannnnn_ak_80') !== '' ? safe_post('asuhan_keperawatannnnn_ak_80') : null,
  //       'asuhan_keperawatannnnn_ak_81' => safe_post('asuhan_keperawatannnnn_ak_81') !== '' ? safe_post('asuhan_keperawatannnnn_ak_81') : null,
  //       'asuhan_keperawatannnnn_ak_82' => safe_post('asuhan_keperawatannnnn_ak_82') !== '' ? safe_post('asuhan_keperawatannnnn_ak_82') : null,
  //       'asuhan_keperawatannnnn_ak_83' => safe_post('asuhan_keperawatannnnn_ak_83') !== '' ? safe_post('asuhan_keperawatannnnn_ak_83') : null,
  //       'asuhan_keperawatannnnn_ak_84' => safe_post('asuhan_keperawatannnnn_ak_84') !== '' ? safe_post('asuhan_keperawatannnnn_ak_84') : null,
  //       'asuhan_keperawatannnnn_ak_85' => safe_post('asuhan_keperawatannnnn_ak_85') !== '' ? safe_post('asuhan_keperawatannnnn_ak_85') : null,
  //       'asuhan_keperawatannnnn_ak_86' => safe_post('asuhan_keperawatannnnn_ak_86') !== '' ? safe_post('asuhan_keperawatannnnn_ak_86') : null,
  //       'asuhan_keperawatannnnn_ak_87' => safe_post('asuhan_keperawatannnnn_ak_87') !== '' ? safe_post('asuhan_keperawatannnnn_ak_87') : null,
  //       'asuhan_keperawatannnnn_ak_88' => safe_post('asuhan_keperawatannnnn_ak_88') !== '' ? safe_post('asuhan_keperawatannnnn_ak_88') : null,
  //       'asuhan_keperawatannnnn_ak_89' => safe_post('asuhan_keperawatannnnn_ak_89') !== '' ? safe_post('asuhan_keperawatannnnn_ak_89') : null,
  //       'asuhan_keperawatannnnn_ak_90' => safe_post('asuhan_keperawatannnnn_ak_90') !== '' ? safe_post('asuhan_keperawatannnnn_ak_90') : null,
  //       'asuhan_keperawatannnnn_ak_91' => safe_post('asuhan_keperawatannnnn_ak_91') !== '' ? safe_post('asuhan_keperawatannnnn_ak_91') : null,
  //       'asuhan_keperawatannnnn_ak_92' => safe_post('asuhan_keperawatannnnn_ak_92') !== '' ? safe_post('asuhan_keperawatannnnn_ak_92') : null,
  //       'asuhan_keperawatannnnn_ak_93' => safe_post('asuhan_keperawatannnnn_ak_93') !== '' ? safe_post('asuhan_keperawatannnnn_ak_93') : null,
  //       'asuhan_keperawatannnnn_ak_94' => safe_post('asuhan_keperawatannnnn_ak_94') !== '' ? safe_post('asuhan_keperawatannnnn_ak_94') : null,
  //       'asuhan_keperawatannnnn_ak_95' => safe_post('asuhan_keperawatannnnn_ak_95') !== '' ? safe_post('asuhan_keperawatannnnn_ak_95') : null,
  //       'asuhan_keperawatannnnn_ak_96' => safe_post('asuhan_keperawatannnnn_ak_96') !== '' ? safe_post('asuhan_keperawatannnnn_ak_96') : null,
  //       'asuhan_keperawatannnnn_ak_97' => safe_post('asuhan_keperawatannnnn_ak_97') !== '' ? safe_post('asuhan_keperawatannnnn_ak_97') : null,
  //       'asuhan_keperawatannnnn_ak_98' => safe_post('asuhan_keperawatannnnn_ak_98') !== '' ? safe_post('asuhan_keperawatannnnn_ak_98') : null,
  //       'asuhan_keperawatannnnn_ak_99' => safe_post('asuhan_keperawatannnnn_ak_99') !== '' ? safe_post('asuhan_keperawatannnnn_ak_99') : null,
  //       'asuhan_keperawatannnnn_ak_100' => safe_post('asuhan_keperawatannnnn_ak_100') !== '' ? safe_post('asuhan_keperawatannnnn_ak_100') : null,
  //       'asuhan_keperawatannnnn_ak_101' => safe_post('asuhan_keperawatannnnn_ak_101') !== '' ? safe_post('asuhan_keperawatannnnn_ak_101') : null,
  //       'asuhan_keperawatannnnn_ak_102' => safe_post('asuhan_keperawatannnnn_ak_102') !== '' ? safe_post('asuhan_keperawatannnnn_ak_102') : null,
  //       'asuhan_keperawatannnnn_ak_103' => safe_post('asuhan_keperawatannnnn_ak_103') !== '' ? safe_post('asuhan_keperawatannnnn_ak_103') : null,
  //       'asuhan_keperawatannnnn_ak_104' => safe_post('asuhan_keperawatannnnn_ak_104') !== '' ? safe_post('asuhan_keperawatannnnn_ak_104') : null,
  //       'asuhan_keperawatannnnn_ak_105' => safe_post('asuhan_keperawatannnnn_ak_105') !== '' ? safe_post('asuhan_keperawatannnnn_ak_105') : null,
  //       'asuhan_keperawatannnnn_ak_106' => safe_post('asuhan_keperawatannnnn_ak_106') !== '' ? safe_post('asuhan_keperawatannnnn_ak_106') : null,
  //     ]),

  //     'perawwat_ruangan_prr'     => safe_post('perawwat_ruangan_prr') !== '' ? safe_post('perawwat_ruangan_prr') : NULL,
  //     'perawwat_anastesi_paa'   => safe_post('perawwat_anastesi_paa') !== '' ? safe_post('perawwat_anastesi_paa') : NULL,
  //     'perawwat_kamar_bedahh'   => safe_post('perawwat_kamar_bedahh') !== '' ? safe_post('perawwat_kamar_bedahh') : NULL,

  //     'catatan_keperawatan_sesudah_operasi' => json_encode([
  //       'catatan_keperawatan_sesudah_operasi_1' => safe_post('catatan_keperawatan_sesudah_operasi_1') !== '' ? safe_post('catatan_keperawatan_sesudah_operasi_1') : null,
  //       'catatan_keperawatan_sesudah_operasi_2' => safe_post('catatan_keperawatan_sesudah_operasi_2') !== '' ? safe_post('catatan_keperawatan_sesudah_operasi_2') : null,
  //       'catatan_keperawatan_sesudah_operasi_3' => safe_post('catatan_keperawatan_sesudah_operasi_3') !== '' ? safe_post('catatan_keperawatan_sesudah_operasi_3') : null,
  //       'catatan_keperawatan_sesudah_operasi_4' => safe_post('catatan_keperawatan_sesudah_operasi_4') !== '' ? safe_post('catatan_keperawatan_sesudah_operasi_4') : null,
  //       'catatan_keperawatan_sesudah_operasi_5' => safe_post('catatan_keperawatan_sesudah_operasi_5') !== '' ? safe_post('catatan_keperawatan_sesudah_operasi_5') : null,
  //     ]),

  //     'catatan_keperawatan_sesudah_op' => json_encode([
  //       'catatan_keperawatan_sesudah_op_1' => safe_post('catatan_keperawatan_sesudah_op_1') !== '' ? safe_post('catatan_keperawatan_sesudah_op_1') : null,
  //       'catatan_keperawatan_sesudah_op_2' => safe_post('catatan_keperawatan_sesudah_op_2') !== '' ? safe_post('catatan_keperawatan_sesudah_op_2') : null,
  //       'catatan_keperawatan_sesudah_op_3' => safe_post('catatan_keperawatan_sesudah_op_3') !== '' ? safe_post('catatan_keperawatan_sesudah_op_3') : null,
  //       'catatan_keperawatan_sesudah_op_4' => safe_post('catatan_keperawatan_sesudah_op_4') !== '' ? safe_post('catatan_keperawatan_sesudah_op_4') : null,
  //       'catatan_keperawatan_sesudah_op_5' => safe_post('catatan_keperawatan_sesudah_op_5') !== '' ? safe_post('catatan_keperawatan_sesudah_op_5') : null,
  //       'catatan_keperawatan_sesudah_op_6' => safe_post('catatan_keperawatan_sesudah_op_6') !== '' ? safe_post('catatan_keperawatan_sesudah_op_6') : null,
  //       'catatan_keperawatan_sesudah_op_7' => safe_post('catatan_keperawatan_sesudah_op_7') !== '' ? safe_post('catatan_keperawatan_sesudah_op_7') : null,
  //       'catatan_keperawatan_sesudah_op_8' => safe_post('catatan_keperawatan_sesudah_op_8') !== '' ? safe_post('catatan_keperawatan_sesudah_op_8') : null,
  //       'catatan_keperawatan_sesudah_op_9' => safe_post('catatan_keperawatan_sesudah_op_9') !== '' ? safe_post('catatan_keperawatan_sesudah_op_9') : null,
  //       'catatan_keperawatan_sesudah_op_10' => safe_post('catatan_keperawatan_sesudah_op_10') !== '' ? safe_post('catatan_keperawatan_sesudah_op_10') : null,
  //       'catatan_keperawatan_sesudah_op_11' => safe_post('catatan_keperawatan_sesudah_op_11') !== '' ? safe_post('catatan_keperawatan_sesudah_op_11') : null,
  //       'catatan_keperawatan_sesudah_op_12' => safe_post('catatan_keperawatan_sesudah_op_12') !== '' ? safe_post('catatan_keperawatan_sesudah_op_12') : null,
  //       'catatan_keperawatan_sesudah_op_13' => safe_post('catatan_keperawatan_sesudah_op_13') !== '' ? safe_post('catatan_keperawatan_sesudah_op_13') : null,
  //       'catatan_keperawatan_sesudah_op_14' => safe_post('catatan_keperawatan_sesudah_op_14') !== '' ? safe_post('catatan_keperawatan_sesudah_op_14') : null,
  //       'catatan_keperawatan_sesudah_op_15' => safe_post('catatan_keperawatan_sesudah_op_15') !== '' ? safe_post('catatan_keperawatan_sesudah_op_15') : null,
  //       'catatan_keperawatan_sesudah_op_16' => safe_post('catatan_keperawatan_sesudah_op_16') !== '' ? safe_post('catatan_keperawatan_sesudah_op_16') : null,
  //       'catatan_keperawatan_sesudah_op_17' => safe_post('catatan_keperawatan_sesudah_op_17') !== '' ? safe_post('catatan_keperawatan_sesudah_op_17') : null,
  //       'catatan_keperawatan_sesudah_op_18' => safe_post('catatan_keperawatan_sesudah_op_18') !== '' ? safe_post('catatan_keperawatan_sesudah_op_18') : null,
  //       'catatan_keperawatan_sesudah_op_19' => safe_post('catatan_keperawatan_sesudah_op_19') !== '' ? safe_post('catatan_keperawatan_sesudah_op_19') : null,
  //       'catatan_keperawatan_sesudah_op_20' => safe_post('catatan_keperawatan_sesudah_op_20') !== '' ? safe_post('catatan_keperawatan_sesudah_op_20') : null,
  //       'catatan_keperawatan_sesudah_op_21' => safe_post('catatan_keperawatan_sesudah_op_21') !== '' ? safe_post('catatan_keperawatan_sesudah_op_21') : null,
  //       'catatan_keperawatan_sesudah_op_22' => safe_post('catatan_keperawatan_sesudah_op_22') !== '' ? safe_post('catatan_keperawatan_sesudah_op_22') : null,
  //       'catatan_keperawatan_sesudah_op_23' => safe_post('catatan_keperawatan_sesudah_op_23') !== '' ? safe_post('catatan_keperawatan_sesudah_op_23') : null,
  //       'catatan_keperawatan_sesudah_op_24' => safe_post('catatan_keperawatan_sesudah_op_24') !== '' ? safe_post('catatan_keperawatan_sesudah_op_24') : null,
  //       'catatan_keperawatan_sesudah_op_25' => safe_post('catatan_keperawatan_sesudah_op_25') !== '' ? safe_post('catatan_keperawatan_sesudah_op_25') : null,
  //       'catatan_keperawatan_sesudah_op_26' => safe_post('catatan_keperawatan_sesudah_op_26') !== '' ? safe_post('catatan_keperawatan_sesudah_op_26') : null,
  //       'catatan_keperawatan_sesudah_op_27' => safe_post('catatan_keperawatan_sesudah_op_27') !== '' ? safe_post('catatan_keperawatan_sesudah_op_27') : null,
  //       'catatan_keperawatan_sesudah_op_28' => safe_post('catatan_keperawatan_sesudah_op_28') !== '' ? safe_post('catatan_keperawatan_sesudah_op_28') : null,
  //       'catatan_keperawatan_sesudah_op_29' => safe_post('catatan_keperawatan_sesudah_op_29') !== '' ? safe_post('catatan_keperawatan_sesudah_op_29') : null,
  //       'catatan_keperawatan_sesudah_op_30' => safe_post('catatan_keperawatan_sesudah_op_30') !== '' ? safe_post('catatan_keperawatan_sesudah_op_30') : null,
  //       'catatan_keperawatan_sesudah_op_31' => safe_post('catatan_keperawatan_sesudah_op_31') !== '' ? safe_post('catatan_keperawatan_sesudah_op_31') : null,
  //       'catatan_keperawatan_sesudah_op_32' => safe_post('catatan_keperawatan_sesudah_op_32') !== '' ? safe_post('catatan_keperawatan_sesudah_op_32') : null,
  //       'catatan_keperawatan_sesudah_op_33' => safe_post('catatan_keperawatan_sesudah_op_33') !== '' ? safe_post('catatan_keperawatan_sesudah_op_33') : null,
  //       'catatan_keperawatan_sesudah_op_34' => safe_post('catatan_keperawatan_sesudah_op_34') !== '' ? safe_post('catatan_keperawatan_sesudah_op_34') : null,
  //       'catatan_keperawatan_sesudah_op_35' => safe_post('catatan_keperawatan_sesudah_op_35') !== '' ? safe_post('catatan_keperawatan_sesudah_op_35') : null,
  //       'catatan_keperawatan_sesudah_op_36' => safe_post('catatan_keperawatan_sesudah_op_36') !== '' ? safe_post('catatan_keperawatan_sesudah_op_36') : null,
  //       'catatan_keperawatan_sesudah_op_37' => safe_post('catatan_keperawatan_sesudah_op_37') !== '' ? safe_post('catatan_keperawatan_sesudah_op_37') : null,
  //       'catatan_keperawatan_sesudah_op_38' => safe_post('catatan_keperawatan_sesudah_op_38') !== '' ? safe_post('catatan_keperawatan_sesudah_op_38') : null,
  //       'catatan_keperawatan_sesudah_op_39' => safe_post('catatan_keperawatan_sesudah_op_39') !== '' ? safe_post('catatan_keperawatan_sesudah_op_39') : null,
  //       'catatan_keperawatan_sesudah_op_40' => safe_post('catatan_keperawatan_sesudah_op_40') !== '' ? safe_post('catatan_keperawatan_sesudah_op_40') : null,
  //       'catatan_keperawatan_sesudah_op_40' => safe_post('catatan_keperawatan_sesudah_op_40') !== '' ? safe_post('catatan_keperawatan_sesudah_op_40') : null,
  //       'catatan_keperawatan_sesudah_op_42' => safe_post('catatan_keperawatan_sesudah_op_42') !== '' ? safe_post('catatan_keperawatan_sesudah_op_42') : null,
  //       'catatan_keperawatan_sesudah_op_43' => safe_post('catatan_keperawatan_sesudah_op_43') !== '' ? safe_post('catatan_keperawatan_sesudah_op_43') : null,
  //       'catatan_keperawatan_sesudah_op_44' => safe_post('catatan_keperawatan_sesudah_op_44') !== '' ? safe_post('catatan_keperawatan_sesudah_op_44') : null,
  //     ]),

  //     'ceklis_persiapan_operasi' => json_encode([
  //       'ceklis_persiapan_operasi_1' => safe_post('ceklis_persiapan_operasi_1') !== '' ? safe_post('ceklis_persiapan_operasi_1') : null,
  //       'ceklis_persiapan_operasi_2' => safe_post('ceklis_persiapan_operasi_2') !== '' ? safe_post('ceklis_persiapan_operasi_2') : null,
  //       'ceklis_persiapan_operasi_3' => safe_post('ceklis_persiapan_operasi_3') !== '' ? safe_post('ceklis_persiapan_operasi_3') : null,
  //       'ceklis_persiapan_operasi_4' => safe_post('ceklis_persiapan_operasi_4') !== '' ? safe_post('ceklis_persiapan_operasi_4') : null,
  //       'ceklis_persiapan_operasi_5' => safe_post('ceklis_persiapan_operasi_5') !== '' ? safe_post('ceklis_persiapan_operasi_5') : null,
  //       'ceklis_persiapan_operasi_6' => safe_post('ceklis_persiapan_operasi_6') !== '' ? safe_post('ceklis_persiapan_operasi_6') : null,
  //       'ceklis_persiapan_operasi_7' => safe_post('ceklis_persiapan_operasi_7') !== '' ? safe_post('ceklis_persiapan_operasi_7') : null,
  //       'ceklis_persiapan_operasi_8' => safe_post('ceklis_persiapan_operasi_8') !== '' ? safe_post('ceklis_persiapan_operasi_8') : null,
  //       'ceklis_persiapan_operasi_9' => safe_post('ceklis_persiapan_operasi_9') !== '' ? safe_post('ceklis_persiapan_operasi_9') : null,
  //       'ceklis_persiapan_operasi_10' => safe_post('ceklis_persiapan_operasi_10') !== '' ? safe_post('ceklis_persiapan_operasi_10') : null,
  //       'ceklis_persiapan_operasi_11' => safe_post('ceklis_persiapan_operasi_11') !== '' ? safe_post('ceklis_persiapan_operasi_11') : null,
  //       'ceklis_persiapan_operasi_12' => safe_post('ceklis_persiapan_operasi_12') !== '' ? safe_post('ceklis_persiapan_operasi_12') : null,
  //       'ceklis_persiapan_operasi_13' => safe_post('ceklis_persiapan_operasi_13') !== '' ? safe_post('ceklis_persiapan_operasi_13') : null,
  //       'ceklis_persiapan_operasi_14' => safe_post('ceklis_persiapan_operasi_14') !== '' ? safe_post('ceklis_persiapan_operasi_14') : null,
  //       'ceklis_persiapan_operasi_15' => safe_post('ceklis_persiapan_operasi_15') !== '' ? safe_post('ceklis_persiapan_operasi_15') : null,
  //       'ceklis_persiapan_operasi_16' => safe_post('ceklis_persiapan_operasi_16') !== '' ? safe_post('ceklis_persiapan_operasi_16') : null,
  //     ]),

  //     'ceklis_persiapan_operasii' => json_encode([
  //       'ceklis_persiapan_operasii_1' => safe_post('ceklis_persiapan_operasii_1') !== '' ? safe_post('ceklis_persiapan_operasii_1') : null,
  //       'ceklis_persiapan_operasii_2' => safe_post('ceklis_persiapan_operasii_2') !== '' ? safe_post('ceklis_persiapan_operasii_2') : null,
  //       'ceklis_persiapan_operasii_3' => safe_post('ceklis_persiapan_operasii_3') !== '' ? safe_post('ceklis_persiapan_operasii_3') : null,
  //       'ceklis_persiapan_operasii_4' => safe_post('ceklis_persiapan_operasii_4') !== '' ? safe_post('ceklis_persiapan_operasii_4') : null,
  //       'ceklis_persiapan_operasii_5' => safe_post('ceklis_persiapan_operasii_5') !== '' ? safe_post('ceklis_persiapan_operasii_5') : null,
  //       'ceklis_persiapan_operasii_6' => safe_post('ceklis_persiapan_operasii_6') !== '' ? safe_post('ceklis_persiapan_operasii_6') : null,
  //       'ceklis_persiapan_operasii_7' => safe_post('ceklis_persiapan_operasii_7') !== '' ? safe_post('ceklis_persiapan_operasii_7') : null,
  //       'ceklis_persiapan_operasii_8' => safe_post('ceklis_persiapan_operasii_8') !== '' ? safe_post('ceklis_persiapan_operasii_8') : null,
  //       'ceklis_persiapan_operasii_9' => safe_post('ceklis_persiapan_operasii_9') !== '' ? safe_post('ceklis_persiapan_operasii_9') : null,
  //       'ceklis_persiapan_operasii_10' => safe_post('ceklis_persiapan_operasii_10') !== '' ? safe_post('ceklis_persiapan_operasii_10') : null,
  //       'ceklis_persiapan_operasii_11' => safe_post('ceklis_persiapan_operasii_11') !== '' ? safe_post('ceklis_persiapan_operasii_11') : null,
  //       'ceklis_persiapan_operasii_12' => safe_post('ceklis_persiapan_operasii_12') !== '' ? safe_post('ceklis_persiapan_operasii_12') : null,
  //       'ceklis_persiapan_operasii_13' => safe_post('ceklis_persiapan_operasii_13') !== '' ? safe_post('ceklis_persiapan_operasii_13') : null,
  //       'ceklis_persiapan_operasii_14' => safe_post('ceklis_persiapan_operasii_14') !== '' ? safe_post('ceklis_persiapan_operasii_14') : null,
  //       'ceklis_persiapan_operasii_15' => safe_post('ceklis_persiapan_operasii_15') !== '' ? safe_post('ceklis_persiapan_operasii_15') : null,
  //       'ceklis_persiapan_operasii_16' => safe_post('ceklis_persiapan_operasii_16') !== '' ? safe_post('ceklis_persiapan_operasii_16') : null,
  //     ]),

  //     'ceklis_persiapan_operasiii' => json_encode([
  //       'ceklis_persiapan_operasiii_1' => safe_post('ceklis_persiapan_operasiii_1') !== '' ? safe_post('ceklis_persiapan_operasiii_1') : null,
  //       'ceklis_persiapan_operasiii_2' => safe_post('ceklis_persiapan_operasiii_2') !== '' ? safe_post('ceklis_persiapan_operasiii_2') : null,
  //       'ceklis_persiapan_operasiii_3' => safe_post('ceklis_persiapan_operasiii_3') !== '' ? safe_post('ceklis_persiapan_operasiii_3') : null,
  //       'ceklis_persiapan_operasiii_4' => safe_post('ceklis_persiapan_operasiii_4') !== '' ? safe_post('ceklis_persiapan_operasiii_4') : null,
  //       'ceklis_persiapan_operasiii_5' => safe_post('ceklis_persiapan_operasiii_5') !== '' ? safe_post('ceklis_persiapan_operasiii_5') : null,
  //       'ceklis_persiapan_operasiii_6' => safe_post('ceklis_persiapan_operasiii_6') !== '' ? safe_post('ceklis_persiapan_operasiii_6') : null,
  //       'ceklis_persiapan_operasiii_7' => safe_post('ceklis_persiapan_operasiii_7') !== '' ? safe_post('ceklis_persiapan_operasiii_7') : null,
  //       'ceklis_persiapan_operasiii_8' => safe_post('ceklis_persiapan_operasiii_8') !== '' ? safe_post('ceklis_persiapan_operasiii_8') : null,
  //       'ceklis_persiapan_operasiii_9' => safe_post('ceklis_persiapan_operasiii_9') !== '' ? safe_post('ceklis_persiapan_operasiii_9') : null,
  //     ]),

  //     'grafik_ckp' => safe_post('grafik_ckp') !== '' ? json_encode(json_decode(safe_post('grafik_ckp'))) : null,

  //     'keterangan_cpo'     => safe_post('keterangan_cpo') !== '' ? safe_post('keterangan_cpo') : NULL,
  //     'jam_cpo' => json_encode([
  //       'jam_cpo_1' => safe_post('jam_cpo_1') !== '' ? safe_post('jam_cpo_1') : null,
  //       'jam_cpo_2' => safe_post('jam_cpo_2') !== '' ? safe_post('jam_cpo_2') : null,
  //     ]),
  //     'perawat_cpo'     => safe_post('perawat_cpo') !== '' ? safe_post('perawat_cpo') : NULL,
  //     'barang_cpo'     => safe_post('barang_cpo') !== '' ? safe_post('barang_cpo') : NULL,
  //     'perawatt_cpo'     => safe_post('perawatt_cpo') !== '' ? safe_post('perawatt_cpo') : NULL,
  //     'jam_tanggal_cpo'  => (safe_post('jam_tanggal_cpo') !== '' ? datetime2mysql(safe_post('jam_tanggal_cpo')) : NULL),

  //     'asssuhan_keperawatan_ak_3' => json_encode([
  //       'asssuhan_keperawatannnnn_ak_1' => safe_post('asssuhan_keperawatannnnn_ak_1') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_1') : null,
  //       'asssuhan_keperawatannnnn_ak_2' => safe_post('asssuhan_keperawatannnnn_ak_2') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_2') : null,
  //       'asssuhan_keperawatannnnn_ak_3' => safe_post('asssuhan_keperawatannnnn_ak_3') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_3') : null,
  //       'asssuhan_keperawatannnnn_ak_4' => safe_post('asssuhan_keperawatannnnn_ak_4') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_4') : null,
  //       'asssuhan_keperawatannnnn_ak_5' => safe_post('asssuhan_keperawatannnnn_ak_5') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_5') : null,
  //       'asssuhan_keperawatannnnn_ak_6' => safe_post('asssuhan_keperawatannnnn_ak_6') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_6') : null,
  //       'asssuhan_keperawatannnnn_ak_7' => safe_post('asssuhan_keperawatannnnn_ak_7') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_7') : null,
  //       'asssuhan_keperawatannnnn_ak_8' => safe_post('asssuhan_keperawatannnnn_ak_8') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_8') : null,
  //       'asssuhan_keperawatannnnn_ak_9' => safe_post('asssuhan_keperawatannnnn_ak_9') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_9') : null,
  //       'asssuhan_keperawatannnnn_ak_10' => safe_post('asssuhan_keperawatannnnn_ak_10') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_10') : null,
  //       'asssuhan_keperawatannnnn_ak_11' => safe_post('asssuhan_keperawatannnnn_ak_11') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_11') : null,
  //       'asssuhan_keperawatannnnn_ak_12' => safe_post('asssuhan_keperawatannnnn_ak_12') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_12') : null,
  //       'asssuhan_keperawatannnnn_ak_13' => safe_post('asssuhan_keperawatannnnn_ak_13') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_13') : null,
  //       'asssuhan_keperawatannnnn_ak_14' => safe_post('asssuhan_keperawatannnnn_ak_14') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_14') : null,
  //       'asssuhan_keperawatannnnn_ak_15' => safe_post('asssuhan_keperawatannnnn_ak_15') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_15') : null,
  //       'asssuhan_keperawatannnnn_ak_16' => safe_post('asssuhan_keperawatannnnn_ak_16') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_16') : null,
  //       'asssuhan_keperawatannnnn_ak_17' => safe_post('asssuhan_keperawatannnnn_ak_17') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_17') : null,
  //       'asssuhan_keperawatannnnn_ak_18' => safe_post('asssuhan_keperawatannnnn_ak_18') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_18') : null,
  //       'asssuhan_keperawatannnnn_ak_19' => safe_post('asssuhan_keperawatannnnn_ak_19') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_19') : null,
  //       'asssuhan_keperawatannnnn_ak_20' => safe_post('asssuhan_keperawatannnnn_ak_20') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_20') : null,
  //       'asssuhan_keperawatannnnn_ak_21' => safe_post('asssuhan_keperawatannnnn_ak_21') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_21') : null,
  //       'asssuhan_keperawatannnnn_ak_22' => safe_post('asssuhan_keperawatannnnn_ak_22') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_22') : null,
  //       'asssuhan_keperawatannnnn_ak_23' => safe_post('asssuhan_keperawatannnnn_ak_23') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_23') : null,
  //       'asssuhan_keperawatannnnn_ak_24' => safe_post('asssuhan_keperawatannnnn_ak_24') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_24') : null,
  //       'asssuhan_keperawatannnnn_ak_25' => safe_post('asssuhan_keperawatannnnn_ak_25') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_25') : null,
  //       'asssuhan_keperawatannnnn_ak_26' => safe_post('asssuhan_keperawatannnnn_ak_26') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_26') : null,
  //       'asssuhan_keperawatannnnn_ak_27' => safe_post('asssuhan_keperawatannnnn_ak_27') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_27') : null,
  //       'asssuhan_keperawatannnnn_ak_28' => safe_post('asssuhan_keperawatannnnn_ak_28') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_28') : null,
  //       'asssuhan_keperawatannnnn_ak_29' => safe_post('asssuhan_keperawatannnnn_ak_29') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_29') : null,
  //       'asssuhan_keperawatannnnn_ak_30' => safe_post('asssuhan_keperawatannnnn_ak_30') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_30') : null,
  //       'asssuhan_keperawatannnnn_ak_31' => safe_post('asssuhan_keperawatannnnn_ak_31') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_31') : null,
  //       'asssuhan_keperawatannnnn_ak_32' => safe_post('asssuhan_keperawatannnnn_ak_32') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_32') : null,
  //       'asssuhan_keperawatannnnn_ak_33' => safe_post('asssuhan_keperawatannnnn_ak_33') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_33') : null,
  //       'asssuhan_keperawatannnnn_ak_34' => safe_post('asssuhan_keperawatannnnn_ak_34') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_34') : null,
  //       'asssuhan_keperawatannnnn_ak_35' => safe_post('asssuhan_keperawatannnnn_ak_35') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_35') : null,
  //       'asssuhan_keperawatannnnn_ak_36' => safe_post('asssuhan_keperawatannnnn_ak_36') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_36') : null,
  //       'asssuhan_keperawatannnnn_ak_37' => safe_post('asssuhan_keperawatannnnn_ak_37') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_37') : null,
  //       'asssuhan_keperawatannnnn_ak_38' => safe_post('asssuhan_keperawatannnnn_ak_38') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_38') : null,
  //       'asssuhan_keperawatannnnn_ak_39' => safe_post('asssuhan_keperawatannnnn_ak_39') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_39') : null,
  //       'asssuhan_keperawatannnnn_ak_40' => safe_post('asssuhan_keperawatannnnn_ak_40') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_40') : null,
  //       'asssuhan_keperawatannnnn_ak_41' => safe_post('asssuhan_keperawatannnnn_ak_41') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_41') : null,
  //       'asssuhan_keperawatannnnn_ak_42' => safe_post('asssuhan_keperawatannnnn_ak_42') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_42') : null,
  //       'asssuhan_keperawatannnnn_ak_43' => safe_post('asssuhan_keperawatannnnn_ak_43') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_43') : null,
  //       'asssuhan_keperawatannnnn_ak_44' => safe_post('asssuhan_keperawatannnnn_ak_44') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_44') : null,
  //       'asssuhan_keperawatannnnn_ak_45' => safe_post('asssuhan_keperawatannnnn_ak_45') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_45') : null,
  //       'asssuhan_keperawatannnnn_ak_46' => safe_post('asssuhan_keperawatannnnn_ak_46') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_46') : null,
  //       'asssuhan_keperawatannnnn_ak_47' => safe_post('asssuhan_keperawatannnnn_ak_47') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_47') : null,
  //       'asssuhan_keperawatannnnn_ak_48' => safe_post('asssuhan_keperawatannnnn_ak_48') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_48') : null,
  //       'asssuhan_keperawatannnnn_ak_49' => safe_post('asssuhan_keperawatannnnn_ak_49') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_49') : null,
  //       'asssuhan_keperawatannnnn_ak_50' => safe_post('asssuhan_keperawatannnnn_ak_50') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_50') : null,
  //       'asssuhan_keperawatannnnn_ak_51' => safe_post('asssuhan_keperawatannnnn_ak_51') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_51') : null,
  //       'asssuhan_keperawatannnnn_ak_52' => safe_post('asssuhan_keperawatannnnn_ak_52') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_52') : null,
  //       'asssuhan_keperawatannnnn_ak_53' => safe_post('asssuhan_keperawatannnnn_ak_53') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_53') : null,
  //       'asssuhan_keperawatannnnn_ak_54' => safe_post('asssuhan_keperawatannnnn_ak_54') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_54') : null,
  //       'asssuhan_keperawatannnnn_ak_55' => safe_post('asssuhan_keperawatannnnn_ak_55') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_55') : null,
  //       'asssuhan_keperawatannnnn_ak_56' => safe_post('asssuhan_keperawatannnnn_ak_56') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_56') : null,
  //       'asssuhan_keperawatannnnn_ak_57' => safe_post('asssuhan_keperawatannnnn_ak_57') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_57') : null,
  //       'asssuhan_keperawatannnnn_ak_58' => safe_post('asssuhan_keperawatannnnn_ak_58') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_58') : null,
  //       'asssuhan_keperawatannnnn_ak_59' => safe_post('asssuhan_keperawatannnnn_ak_59') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_59') : null,
  //       'asssuhan_keperawatannnnn_ak_60' => safe_post('asssuhan_keperawatannnnn_ak_60') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_60') : null,
  //       'asssuhan_keperawatannnnn_ak_61' => safe_post('asssuhan_keperawatannnnn_ak_61') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_61') : null,
  //       'asssuhan_keperawatannnnn_ak_62' => safe_post('asssuhan_keperawatannnnn_ak_62') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_62') : null,
  //       'asssuhan_keperawatannnnn_ak_63' => safe_post('asssuhan_keperawatannnnn_ak_63') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_63') : null,
  //       'asssuhan_keperawatannnnn_ak_64' => safe_post('asssuhan_keperawatannnnn_ak_64') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_64') : null,
  //       'asssuhan_keperawatannnnn_ak_65' => safe_post('asssuhan_keperawatannnnn_ak_65') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_65') : null,
  //       'asssuhan_keperawatannnnn_ak_66' => safe_post('asssuhan_keperawatannnnn_ak_66') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_66') : null,
  //       'asssuhan_keperawatannnnn_ak_67' => safe_post('asssuhan_keperawatannnnn_ak_67') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_67') : null,
  //       'asssuhan_keperawatannnnn_ak_68' => safe_post('asssuhan_keperawatannnnn_ak_68') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_68') : null,
  //       'asssuhan_keperawatannnnn_ak_69' => safe_post('asssuhan_keperawatannnnn_ak_69') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_69') : null,
  //       'asssuhan_keperawatannnnn_ak_70' => safe_post('asssuhan_keperawatannnnn_ak_70') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_70') : null,
  //       'asssuhan_keperawatannnnn_ak_71' => safe_post('asssuhan_keperawatannnnn_ak_71') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_71') : null,
  //       'asssuhan_keperawatannnnn_ak_72' => safe_post('asssuhan_keperawatannnnn_ak_72') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_72') : null,
  //       'asssuhan_keperawatannnnn_ak_73' => safe_post('asssuhan_keperawatannnnn_ak_73') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_73') : null,
  //       'asssuhan_keperawatannnnn_ak_74' => safe_post('asssuhan_keperawatannnnn_ak_74') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_74') : null,
  //       'asssuhan_keperawatannnnn_ak_75' => safe_post('asssuhan_keperawatannnnn_ak_75') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_75') : null,
  //       'asssuhan_keperawatannnnn_ak_76' => safe_post('asssuhan_keperawatannnnn_ak_76') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_76') : null,
  //       'asssuhan_keperawatannnnn_ak_77' => safe_post('asssuhan_keperawatannnnn_ak_77') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_77') : null,
  //       'asssuhan_keperawatannnnn_ak_78' => safe_post('asssuhan_keperawatannnnn_ak_78') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_78') : null,
  //       'asssuhan_keperawatannnnn_ak_79' => safe_post('asssuhan_keperawatannnnn_ak_79') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_79') : null,
  //       'asssuhan_keperawatannnnn_ak_80' => safe_post('asssuhan_keperawatannnnn_ak_80') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_80') : null,
  //       'asssuhan_keperawatannnnn_ak_81' => safe_post('asssuhan_keperawatannnnn_ak_81') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_81') : null,
  //       'asssuhan_keperawatannnnn_ak_82' => safe_post('asssuhan_keperawatannnnn_ak_82') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_82') : null,
  //       'asssuhan_keperawatannnnn_ak_83' => safe_post('asssuhan_keperawatannnnn_ak_83') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_83') : null,
  //       'asssuhan_keperawatannnnn_ak_84' => safe_post('asssuhan_keperawatannnnn_ak_84') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_84') : null,
  //       'asssuhan_keperawatannnnn_ak_85' => safe_post('asssuhan_keperawatannnnn_ak_85') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_85') : null,
  //       'asssuhan_keperawatannnnn_ak_86' => safe_post('asssuhan_keperawatannnnn_ak_86') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_86') : null,
  //       'asssuhan_keperawatannnnn_ak_87' => safe_post('asssuhan_keperawatannnnn_ak_87') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_87') : null,
  //       'asssuhan_keperawatannnnn_ak_88' => safe_post('asssuhan_keperawatannnnn_ak_88') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_88') : null,
  //       'asssuhan_keperawatannnnn_ak_89' => safe_post('asssuhan_keperawatannnnn_ak_89') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_89') : null,
  //       'asssuhan_keperawatannnnn_ak_90' => safe_post('asssuhan_keperawatannnnn_ak_90') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_90') : null,
  //       'asssuhan_keperawatannnnn_ak_91' => safe_post('asssuhan_keperawatannnnn_ak_91') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_91') : null,
  //       'asssuhan_keperawatannnnn_ak_92' => safe_post('asssuhan_keperawatannnnn_ak_92') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_92') : null,
  //       'asssuhan_keperawatannnnn_ak_93' => safe_post('asssuhan_keperawatannnnn_ak_93') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_93') : null,
  //       'asssuhan_keperawatannnnn_ak_94' => safe_post('asssuhan_keperawatannnnn_ak_94') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_94') : null,
  //       'asssuhan_keperawatannnnn_ak_95' => safe_post('asssuhan_keperawatannnnn_ak_95') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_95') : null,
  //       'asssuhan_keperawatannnnn_ak_96' => safe_post('asssuhan_keperawatannnnn_ak_96') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_96') : null,
  //       'asssuhan_keperawatannnnn_ak_97' => safe_post('asssuhan_keperawatannnnn_ak_97') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_97') : null,
  //       'asssuhan_keperawatannnnn_ak_98' => safe_post('asssuhan_keperawatannnnn_ak_98') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_98') : null,
  //       'asssuhan_keperawatannnnn_ak_99' => safe_post('asssuhan_keperawatannnnn_ak_99') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_99') : null,
  //       'asssuhan_keperawatannnnn_ak_100' => safe_post('asssuhan_keperawatannnnn_ak_100') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_100') : null,
  //       'asssuhan_keperawatannnnn_ak_101' => safe_post('asssuhan_keperawatannnnn_ak_101') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_101') : null,
  //       'asssuhan_keperawatannnnn_ak_102' => safe_post('asssuhan_keperawatannnnn_ak_102') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_102') : null,
  //       'asssuhan_keperawatannnnn_ak_103' => safe_post('asssuhan_keperawatannnnn_ak_103') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_103') : null,
  //       'asssuhan_keperawatannnnn_ak_104' => safe_post('asssuhan_keperawatannnnn_ak_104') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_104') : null,
  //       'asssuhan_keperawatannnnn_ak_105' => safe_post('asssuhan_keperawatannnnn_ak_105') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_105') : null,
  //       'asssuhan_keperawatannnnn_ak_106' => safe_post('asssuhan_keperawatannnnn_ak_106') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_106') : null,
  //       'asssuhan_keperawatannnnn_ak_107' => safe_post('asssuhan_keperawatannnnn_ak_107') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_107') : null,
  //       'asssuhan_keperawatannnnn_ak_108' => safe_post('asssuhan_keperawatannnnn_ak_108') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_108') : null,
  //       'asssuhan_keperawatannnnn_ak_109' => safe_post('asssuhan_keperawatannnnn_ak_109') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_109') : null,
  //       'asssuhan_keperawatannnnn_ak_110' => safe_post('asssuhan_keperawatannnnn_ak_110') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_110') : null,
  //       'asssuhan_keperawatannnnn_ak_111' => safe_post('asssuhan_keperawatannnnn_ak_111') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_111') : null,
  //       'asssuhan_keperawatannnnn_ak_112' => safe_post('asssuhan_keperawatannnnn_ak_112') !== '' ? safe_post('asssuhan_keperawatannnnn_ak_112') : null,
  //     ]),

  //     'perawwat_ruangan_prrr'     => safe_post('perawwat_ruangan_prrr') !== '' ? safe_post('perawwat_ruangan_prrr') : NULL,
  //     'perawwat_anastesi_paaa'     => safe_post('perawwat_anastesi_paaa') !== '' ? safe_post('perawwat_anastesi_paaa') : NULL,
  //     'perawwat_kamar_bedahhh'     => safe_post('perawwat_kamar_bedahhh') !== '' ? safe_post('perawwat_kamar_bedahhh') : NULL,
  //   );
  //   $sign = $this->db->select('ckp.jam_tanggal_po, tanggal_jam_ckio, jam_tanggal_cpo')
  //     ->from('sm_catatan_keperawatan_perioperatif as ckp')
  //     ->where('ckp.id_pendaftaran', $layanan['id'])
  //     ->get()
  //     ->row();

  //   if (isset($sign)) :
  //     if ($sign->jam_tanggal_po !== NULL) :
  //       $catatanKeperawatanPerioperatif['jam_tanggal_po'] = $sign->jam_tanggal_po;
  //     else :
  //       $catatanKeperawatanPerioperatif['jam_tanggal_po'] = (safe_post('jam_tanggal_po') !== '' ? datetime2mysql(safe_post('jam_tanggal_po')) : NULL);
  //     endif;
  //     if ($sign->tanggal_jam_ckio !== NULL) :
  //       $catatanKeperawatanPerioperatif['tanggal_jam_ckio'] = $sign->tanggal_jam_ckio;
  //     else :
  //       $catatanKeperawatanPerioperatif['tanggal_jam_ckio'] = (safe_post('tanggal_jam_ckio') !== '' ? datetime2mysql(safe_post('tanggal_jam_ckio')) : NULL);
  //     endif;
  //     if ($sign->jam_tanggal_cpo !== NULL) :
  //       $catatanKeperawatanPerioperatif['jam_tanggal_cpo'] = $sign->jam_tanggal_cpo;
  //     else :
  //       $catatanKeperawatanPerioperatif['jam_tanggal_cpo'] = (safe_post('jam_tanggal_cpo') !== '' ? datetime2mysql(safe_post('jam_tanggal_cpo')) : NULL);
  //     endif;

  //   endif;
  //   $this->m_order_operasi->updateCatatanKeperawatanPerioperatif($catatanKeperawatanPerioperatif);


  //   // End function
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
  //     'token'  => $this->security->get_csrf_hash(),
  //     'id'     => $layanan['id'],
  //     'respon' => $response,
  //   );

  //   $this->response($message, REST_Controller::HTTP_OK);
  // }


  function simpan_entri_plo_post()
  {
    $layanan = array('id' => safe_post('id_layanan_pendaftaran'));
    $this->db->trans_begin();

    // simpan PLO
    // var_dump(safe_post('id'));die;
    $checkData = safe_post('id');
    $plo_tanggal = safe_post('plo_tanggal');
    if ($plo_tanggal !== '') {
      $plo_tanggal = str_replace('/', '-', $plo_tanggal);
      $plo_tanggal = date('Y-m-d', strtotime($plo_tanggal));
    }
    $plo_tanggal_pasien = safe_post('plo_tanggal_pasien');
    if ($plo_tanggal_pasien !== '') {
      $plo_tanggal_pasien = str_replace('/', '-', $plo_tanggal_pasien);
      $plo_tanggal_pasien = date('Y-m-d H:i', strtotime($plo_tanggal_pasien));
    }
    $plo_tanggal_dokter = safe_post('plo_tanggal_dokter');
    if ($plo_tanggal_dokter !== '') {
      $plo_tanggal_dokter = str_replace('/', '-', $plo_tanggal_dokter);
      $plo_tanggal_dokter = date('Y-m-d H:i', strtotime($plo_tanggal_dokter));
    }

    // // Mendapatkan data gambar dari input post
    // $imageData = $_POST['imageData'];

    // // Hilangkan informasi tipe file dan karakter whitespace yang tidak dibutuhkan
    // $imageData = str_replace('data:image/png;base64,', '', $imageData);
    // $imageData = str_replace(' ', '+', $imageData);

    // // Decode data gambar dari format base64 ke binary
    // $imageDataBinary = base64_decode($imageData);

    // // Simpan gambar ke dalam folder public dengan format file PNG
    // $filename = 'canvas_' . date('YmdHis') . '.png';
    // $filepath = FCPATH . 'resources/images/lokasi_operasi/' . $filename;
    // file_put_contents($filepath, $imageDataBinary);

    // Mendapatkan data gambar dari input post
    $imageData = $_POST['imageData'];
    // var_dump($imageData);die;
    $filename = safe_post('gambar_lama');
    // var_dump($filename);die;
    if ($imageData !== '0') {
      // Hilangkan informasi tipe file dan karakter whitespace yang tidak dibutuhkan
      $imageData = str_replace('data:image/png;base64,', '', $imageData);
      $imageData = str_replace(' ', '+', $imageData);

      // Decode data gambar dari format base64 ke binary
      $imageDataBinary = base64_decode($imageData);

      // Simpan gambar ke dalam folder public dengan format file PNG
      $filename = 'canvas_' . date('YmdHis') . '.png';
      $filepath = FCPATH . 'resources/images/lokasi_operasi/' . $filename;

      // Jika file gambar lama sudah ada, hapus file tersebut
      $fileLama = FCPATH . 'resources/images/lokasi_operasi/' . safe_post('gambar_lama');
      if (is_file($fileLama)) {
        // Hapus file gambar lama
        unlink($fileLama);
      }

      // Simpan gambar ke folder public
      file_put_contents($filepath, $imageDataBinary);
    }

    if ($checkData != '') {
      $data_plo = array(
        'id'            => safe_post('id'),
        'id_layanan_pendaftaran'  => $layanan['id'],
        'id_pendaftaran'      => safe_post('id_pendaftaran'),
        'id_users'               => $this->session->userdata('id_translucent'),

        'plo_prosedur'        => safe_post('plo_prosedur') !== '' ? safe_post('plo_prosedur') : NULL,
        'plo_tanggal'        => $plo_tanggal ? $plo_tanggal : Null,
        'plo_gambar'        => $filename ? $filename : Null,
        'plo_tanggal_pasien'    => $plo_tanggal_pasien ? $plo_tanggal_pasien : Null,
        'plo_tanggal_dokter'    => $plo_tanggal_dokter ? $plo_tanggal_dokter : Null,
        'plo_dokter'                 => safe_post('plo_dokter') !== '' ? safe_post('plo_dokter') : NULL,

        'updated_at'                 => $this->datetime,

      );

      // var_dump($data_plo);die;
      $this->db->where('id', safe_post('id'));
      $this->db->update('sm_lokasi_operasi', $data_plo);
    } else {
      $data_plo = array(
        'id_layanan_pendaftaran'  => $layanan['id'],
        'id_pendaftaran'      => safe_post('id_pendaftaran'),
        'id_users'               => $this->session->userdata('id_translucent'),

        'plo_prosedur'        => safe_post('plo_prosedur') !== '' ? safe_post('plo_prosedur') : NULL,
        'plo_tanggal'        => $plo_tanggal ? $plo_tanggal : Null,
        'plo_gambar'        => $filename ? $filename : Null,
        'plo_tanggal_pasien'    => $plo_tanggal_pasien ? $plo_tanggal_pasien : Null,
        'plo_tanggal_dokter'    => $plo_tanggal_dokter ? $plo_tanggal_dokter : Null,
        'plo_dokter'                 => safe_post('plo_dokter') !== '' ? safe_post('plo_dokter') : NULL,

        'created_at'                 => $this->datetime,

      );
      // var_dump($data_plo);die;
      $this->db->insert('sm_lokasi_operasi', $data_plo);
    }


    // End function
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
      'id'     => $layanan['id'],
      'respon' => $response,
    );

    $this->response($message, REST_Controller::HTTP_OK);
  }

  function simpan_entri_cpkji_post()
  {
    $layanan = array('id' => safe_post('id_layanan_pendaftaran'));
    $this->db->trans_begin();

    // CPKJI SIMPAN 
    $catatanPerhitunganKasaJarumInstrumen = array(

      'id_layanan_pendaftaran' => $layanan['id'],
      'id_pendaftaran'          => safe_post('id_pendaftaran'),
      'id_users'             => $this->session->userdata('id_translucent'),
      'id_cpkji'          => safe_post('id_cpkji'),

      'raytec' => json_encode([
        'raytec_1' => safe_post('raytec_1') !== '' ? safe_post('raytec_1') : null,
        'raytec_2' => safe_post('raytec_2') !== '' ? safe_post('raytec_2') : null,
        'raytec_3' => safe_post('raytec_3') !== '' ? safe_post('raytec_3') : null,
        'raytec_4' => safe_post('raytec_4') !== '' ? safe_post('raytec_4') : null,
        'raytec_5' => safe_post('raytec_5') !== '' ? safe_post('raytec_5') : null,
        'raytec_6' => safe_post('raytec_6') !== '' ? safe_post('raytec_6') : null,
        'raytec_7' => safe_post('raytec_7') !== '' ? safe_post('raytec_7') : null,
        'raytec_8' => safe_post('raytec_8') !== '' ? safe_post('raytec_8') : null,
        'raytec_9' => safe_post('raytec_9') !== '' ? safe_post('raytec_9') : null,
        'raytec_10' => safe_post('raytec_10') !== '' ? safe_post('raytec_10') : null,
      ]),

      'laps' => json_encode([
        'laps_1' => safe_post('laps_1') !== '' ? safe_post('laps_1') : null,
        'laps_2' => safe_post('laps_2') !== '' ? safe_post('laps_2') : null,
        'laps_3' => safe_post('laps_3') !== '' ? safe_post('laps_3') : null,
        'laps_4' => safe_post('laps_4') !== '' ? safe_post('laps_4') : null,
        'laps_5' => safe_post('laps_5') !== '' ? safe_post('laps_5') : null,
        'laps_6' => safe_post('laps_6') !== '' ? safe_post('laps_6') : null,
        'laps_7' => safe_post('laps_7') !== '' ? safe_post('laps_7') : null,
        'laps_8' => safe_post('laps_8') !== '' ? safe_post('laps_8') : null,
        'laps_9' => safe_post('laps_9') !== '' ? safe_post('laps_9') : null,
        'laps_10' => safe_post('laps_10') !== '' ? safe_post('laps_10') : null,
      ]),

      'depper' => json_encode([
        'depper_1' => safe_post('depper_1') !== '' ? safe_post('depper_1') : null,
        'depper_2' => safe_post('depper_2') !== '' ? safe_post('depper_2') : null,
        'depper_3' => safe_post('depper_3') !== '' ? safe_post('depper_3') : null,
        'depper_4' => safe_post('depper_4') !== '' ? safe_post('depper_4') : null,
        'depper_5' => safe_post('depper_5') !== '' ? safe_post('depper_5') : null,
        'depper_6' => safe_post('depper_6') !== '' ? safe_post('depper_6') : null,
        'depper_7' => safe_post('depper_7') !== '' ? safe_post('depper_7') : null,
        'depper_8' => safe_post('depper_8') !== '' ? safe_post('depper_8') : null,
        'depper_9' => safe_post('depper_9') !== '' ? safe_post('depper_9') : null,
        'depper_10' => safe_post('depper_10') !== '' ? safe_post('depper_10') : null,
      ]),

      'blade' => json_encode([
        'blade_1' => safe_post('blade_1') !== '' ? safe_post('blade_1') : null,
        'blade_2' => safe_post('blade_2') !== '' ? safe_post('blade_2') : null,
        'blade_3' => safe_post('blade_3') !== '' ? safe_post('blade_3') : null,
        'blade_4' => safe_post('blade_4') !== '' ? safe_post('blade_4') : null,
        'blade_5' => safe_post('blade_5') !== '' ? safe_post('blade_5') : null,
        'blade_6' => safe_post('blade_6') !== '' ? safe_post('blade_6') : null,
        'blade_7' => safe_post('blade_7') !== '' ? safe_post('blade_7') : null,
        'blade_8' => safe_post('blade_8') !== '' ? safe_post('blade_8') : null,
        'blade_9' => safe_post('blade_9') !== '' ? safe_post('blade_9') : null,
        'blade_10' => safe_post('blade_10') !== '' ? safe_post('blade_10') : null,
      ]),

      'tape' => json_encode([
        'tape_1' => safe_post('tape_1') !== '' ? safe_post('tape_1') : null,
        'tape_2' => safe_post('tape_2') !== '' ? safe_post('tape_2') : null,
        'tape_3' => safe_post('tape_3') !== '' ? safe_post('tape_3') : null,
        'tape_4' => safe_post('tape_4') !== '' ? safe_post('tape_4') : null,
        'tape_5' => safe_post('tape_5') !== '' ? safe_post('tape_5') : null,
        'tape_6' => safe_post('tape_6') !== '' ? safe_post('tape_6') : null,
        'tape_7' => safe_post('tape_7') !== '' ? safe_post('tape_7') : null,
        'tape_8' => safe_post('tape_8') !== '' ? safe_post('tape_8') : null,
        'tape_9' => safe_post('tape_9') !== '' ? safe_post('tape_9') : null,
        'tape_10' => safe_post('tape_10') !== '' ? safe_post('tape_10') : null,
      ]),

      'jjarum' => json_encode([
        'jjarum_1' => safe_post('jjarum_1') !== '' ? safe_post('jjarum_1') : null,
        'jjarum_2' => safe_post('jjarum_2') !== '' ? safe_post('jjarum_2') : null,
        'jjarum_3' => safe_post('jjarum_3') !== '' ? safe_post('jjarum_3') : null,
        'jjarum_4' => safe_post('jjarum_4') !== '' ? safe_post('jjarum_4') : null,
        'jjarum_5' => safe_post('jjarum_5') !== '' ? safe_post('jjarum_5') : null,
        'jjarum_6' => safe_post('jjarum_6') !== '' ? safe_post('jjarum_6') : null,
        'jjarum_7' => safe_post('jjarum_7') !== '' ? safe_post('jjarum_7') : null,
        'jjarum_8' => safe_post('jjarum_8') !== '' ? safe_post('jjarum_8') : null,
        'jjarum_9' => safe_post('jjarum_9') !== '' ? safe_post('jjarum_9') : null,
        'jjarum_10' => safe_post('jjarum_10') !== '' ? safe_post('jjarum_10') : null,
      ]),

      'pledget' => json_encode([
        'pledget_1' => safe_post('pledget_1') !== '' ? safe_post('pledget_1') : null,
        'pledget_2' => safe_post('pledget_2') !== '' ? safe_post('pledget_2') : null,
        'pledget_3' => safe_post('pledget_3') !== '' ? safe_post('pledget_3') : null,
        'pledget_4' => safe_post('pledget_4') !== '' ? safe_post('pledget_4') : null,
        'pledget_5' => safe_post('pledget_5') !== '' ? safe_post('pledget_5') : null,
        'pledget_6' => safe_post('pledget_6') !== '' ? safe_post('pledget_6') : null,
        'pledget_7' => safe_post('pledget_7') !== '' ? safe_post('pledget_7') : null,
        'pledget_8' => safe_post('pledget_8') !== '' ? safe_post('pledget_8') : null,
        'pledget_9' => safe_post('pledget_9') !== '' ? safe_post('pledget_9') : null,
        'pledget_10' => safe_post('pledget_10') !== '' ? safe_post('pledget_10') : null,
      ]),

      'drain' => json_encode([
        'drain_1' => safe_post('drain_1') !== '' ? safe_post('drain_1') : null,
        'drain_2' => safe_post('drain_2') !== '' ? safe_post('drain_2') : null,
        'drain_3' => safe_post('drain_3') !== '' ? safe_post('drain_3') : null,
        'drain_4' => safe_post('drain_4') !== '' ? safe_post('drain_4') : null,
        'drain_5' => safe_post('drain_5') !== '' ? safe_post('drain_5') : null,
        'drain_6' => safe_post('drain_6') !== '' ? safe_post('drain_6') : null,
        'drain_7' => safe_post('drain_7') !== '' ? safe_post('drain_7') : null,
        'drain_8' => safe_post('drain_8') !== '' ? safe_post('drain_8') : null,
        'drain_9' => safe_post('drain_9') !== '' ? safe_post('drain_9') : null,
        'drain_10' => safe_post('drain_10') !== '' ? safe_post('drain_10') : null,
      ]),

      'innstrumen' => json_encode([
        'innstrumen_1' => safe_post('innstrumen_1') !== '' ? safe_post('innstrumen_1') : null,
        'innstrumen_2' => safe_post('innstrumen_2') !== '' ? safe_post('innstrumen_2') : null,
        'innstrumen_3' => safe_post('innstrumen_3') !== '' ? safe_post('innstrumen_3') : null,
        'innstrumen_4' => safe_post('innstrumen_4') !== '' ? safe_post('innstrumen_4') : null,
        'innstrumen_5' => safe_post('innstrumen_5') !== '' ? safe_post('innstrumen_5') : null,
        'innstrumen_6' => safe_post('innstrumen_6') !== '' ? safe_post('innstrumen_6') : null,
        'innstrumen_7' => safe_post('innstrumen_7') !== '' ? safe_post('innstrumen_7') : null,
        'innstrumen_8' => safe_post('innstrumen_8') !== '' ? safe_post('innstrumen_8') : null,
        'innstrumen_9' => safe_post('innstrumen_9') !== '' ? safe_post('innstrumen_9') : null,
        'innstrumen_10' => safe_post('innstrumen_10') !== '' ? safe_post('innstrumen_10') : null,
      ]),

      'laint' => json_encode([
        'laint_1' => safe_post('laint_1') !== '' ? safe_post('laint_1') : null,
        'laint_2' => safe_post('laint_2') !== '' ? safe_post('laint_2') : null,
        'laint_3' => safe_post('laint_3') !== '' ? safe_post('laint_3') : null,
        'laint_4' => safe_post('laint_4') !== '' ? safe_post('laint_4') : null,
        'laint_5' => safe_post('laint_5') !== '' ? safe_post('laint_5') : null,
        'laint_6' => safe_post('laint_6') !== '' ? safe_post('laint_6') : null,
        'laint_7' => safe_post('laint_7') !== '' ? safe_post('laint_7') : null,
        'laint_8' => safe_post('laint_8') !== '' ? safe_post('laint_8') : null,
        'laint_9' => safe_post('laint_9') !== '' ? safe_post('laint_9') : null,
        'laint_10' => safe_post('laint_10') !== '' ? safe_post('laint_10') : null,
      ]),

      'ro' => json_encode([
        'ro_1' => safe_post('ro_1') !== '' ? safe_post('ro_1') : null,
        'ro_2' => safe_post('ro_2') !== '' ? safe_post('ro_2') : null,
        'ro_3' => safe_post('ro_3') !== '' ? safe_post('ro_3') : null,
        'ro_4' => safe_post('ro_4') !== '' ? safe_post('ro_4') : null,
        'ro_5' => safe_post('ro_5') !== '' ? safe_post('ro_5') : null,
        'ro_6' => safe_post('ro_6') !== '' ? safe_post('ro_6') : null,
        'ro_7' => safe_post('ro_7') !== '' ? safe_post('ro_7') : null,
        'ro_8' => safe_post('ro_8') !== '' ? safe_post('ro_8') : null,
        'ro_9' => safe_post('ro_9') !== '' ? safe_post('ro_9') : null,
        'ro_10' => safe_post('ro_10') !== '' ? safe_post('ro_10') : null,
        'ro_11' => safe_post('ro_11') !== '' ? safe_post('ro_11') : null,
      ]),

      'or' => json_encode([
        'or_1' => safe_post('or_1') !== '' ? safe_post('or_1') : null,
        'or_2' => safe_post('or_2') !== '' ? safe_post('or_2') : null,
        'or_3' => safe_post('or_3') !== '' ? safe_post('or_3') : null,
        'or_4' => safe_post('or_4') !== '' ? safe_post('or_4') : null,
        'or_5' => safe_post('or_5') !== '' ? safe_post('or_5') : null,
        'or_6' => safe_post('or_6') !== '' ? safe_post('or_6') : null,
        'or_7' => safe_post('or_7') !== '' ? safe_post('or_7') : null,
        'or_8' => safe_post('or_8') !== '' ? safe_post('or_8') : null,
        'or_9' => safe_post('or_9') !== '' ? safe_post('or_9') : null,
        'or_10' => safe_post('or_10') !== '' ? safe_post('or_10') : null,
        'or_11' => safe_post('or_11') !== '' ? safe_post('or_11') : null,
      ]),


      'peerawat_1'     => safe_post('peerawat_1') !== '' ? safe_post('peerawat_1') : NULL,

      'tanggal_c'     => safe_post('tanggal_c') !== '' ? date('Y-m-d', strtotime(str_replace('/', '-', safe_post('tanggal_c')))) : NULL,
      'jenis_operasi'   => safe_post('jenis_operasi') !== '' ? safe_post('jenis_operasi') : NULL,
      'jam_mulai_c'     => safe_post('jam_mulai_c') !== '' ? safe_post('jam_mulai_c') : NULL,
      'jam_selesai_c'   => safe_post('jam_selesai_c') !== '' ? safe_post('jam_selesai_c') : NULL,
      'lain_c'       => safe_post('lain_c') !== '' ? safe_post('lain_c') : NULL,


      'jummlah_c' => json_encode([
        'jummlah_c_1' => safe_post('jummlah_c_1') !== '' ? safe_post('jummlah_c_1') : null,
        'jummlah_c_1' => safe_post('jummlah_c_1') !== '' ? safe_post('jummlah_c_1') : null,
        'jummlah_c_3' => safe_post('jummlah_c_3') !== '' ? safe_post('jummlah_c_3') : null,
        'jummlah_c_3' => safe_post('jummlah_c_3') !== '' ? safe_post('jummlah_c_3') : null,
        'jummlah_c_5' => safe_post('jummlah_c_5') !== '' ? safe_post('jummlah_c_5') : null,
        'jummlah_c_5' => safe_post('jummlah_c_5') !== '' ? safe_post('jummlah_c_5') : null,
        'jummlah_c_7' => safe_post('jummlah_c_7') !== '' ? safe_post('jummlah_c_7') : null,
        'jummlah_c_7' => safe_post('jummlah_c_7') !== '' ? safe_post('jummlah_c_7') : null,
        'jummlah_c_9' => safe_post('jummlah_c_9') !== '' ? safe_post('jummlah_c_9') : null,
        'jummlah_c_9' => safe_post('jummlah_c_9') !== '' ? safe_post('jummlah_c_9') : null,
      ]),

      'dokterr_1'   => safe_post('dokterr_1') !== '' ? safe_post('dokterr_1') : NULL,
      'peerawat_2'   => safe_post('peerawat_2') !== '' ? safe_post('peerawat_2') : NULL,
      'peerawat_3'   => safe_post('peerawat_3') !== '' ? safe_post('peerawat_3') : NULL,

      'ttd_1'   => safe_post('ttd_1') !== '' ? safe_post('ttd_1') : NULL,
      'ttd_2'   => safe_post('ttd_2') !== '' ? safe_post('ttd_2') : NULL,
      'ttd_3'   => safe_post('ttd_3') !== '' ? safe_post('ttd_3') : NULL,

    );
    // var_dump($rencanaPelayananPasienPascaPembedahan);die;

    $sign = $this->db->select('cpkji.tanggal_c, ttd_1, ttd_2, ttd_3')
      ->from('sm_catatan_perhitungan_kasa_jarum_instrumen as cpkji')
      ->where('cpkji.id_pendaftaran', $layanan['id'])
      ->get()
      ->row();

    if (isset($sign)) :
      if ($sign->tanggal_c !== NULL) :
        $catatanPerhitunganKasaJarumInstrumen['tanggal_c'] = $sign->tanggal_c;
      else :
        $catatanPerhitunganKasaJarumInstrumen['tanggal_c'] = (safe_post('tanggal_c') !== '' ? date2mysql(safe_post('tanggal_c')) : NULL);
      endif;
      if ($sign->ttd_1 !== NULL) :
        $catatanPerhitunganKasaJarumInstrumen['ttd_1'] = $sign->ttd_1;
      else :
        $catatanPerhitunganKasaJarumInstrumen['ttd_1'] = (safe_post('ttd_1') !== '' ? safe_post('ttd_1') : NULL);
      endif;
      if ($sign->ttd_2 !== NULL) :
        $catatanPerhitunganKasaJarumInstrumen['ttd_2'] = $sign->ttd_2;
      else :
        $catatanPerhitunganKasaJarumInstrumen['ttd_2'] = (safe_post('ttd_2') !== '' ? safe_post('ttd_2') : NULL);
      endif;
      if ($sign->ttd_3 !== NULL) :
        $catatanPerhitunganKasaJarumInstrumen['ttd_3'] = $sign->ttd_3;
      else :
        $catatanPerhitunganKasaJarumInstrumen['ttd_3'] = (safe_post('ttd_3') !== '' ? safe_post('ttd_3') : NULL);
      endif;
    endif;
    $this->m_order_operasi->updateCatatanPerhitunganKasaJarumInstrumen($catatanPerhitunganKasaJarumInstrumen);


    // End function
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
      'id'     => $layanan['id'],
      'respon' => $response,
    );

    $this->response($message, REST_Controller::HTTP_OK);
  }
}
