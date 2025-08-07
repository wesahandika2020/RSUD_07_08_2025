<?php defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

/**
 * @package         CodeIgniter
 * @subpackage      Rest Server
 * @category        Controller
 * @author          Faiz Muhammad Syam
 * @license         Syams Corporation
 */
class Eklaim_v_5_8_x extends REST_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->datetime = date('Y-m-d H:i:s');
    $this->load->model('Pengkodean_icd_x_model', 'm_pengkodean_icd_x');
    $this->load->model('eklaim_bpjs/Eklaim_bpjs_model', 'eklaim_bpjs');
    $this->load->model('eklaim_bpjs/Eklaim_bpjs_auto_model', 'eklaim_bpjs_auto');
    $this->load->model('App_model', 'default');

    // $this->eclaim_config = $this->default->getConfigEklaim();
  }

  function new_claim_post()
  {
    $post = [
      'nomor_kartu'   => safe_post('nomor_kartu'),
      'nomor_sep'     => safe_post('nomor_sep'),
      'nomor_rm'      => safe_post('nomor_rm'),
      'nama_pasien'   => safe_post('nama_pasien'),
      'tgl_lahir'     => safe_post('tgl_lahir'), // Format tgl lahir YYYY-MM-DD hh:mm:ss
      'gender'        => safe_post('gender'), // Gender 1=laki-laki, 2=perempuan
    ];

    $data = $this->eklaim_bpjs->newClaim($post);

    if ($data) :
      $this->response($data, REST_Controller::HTTP_OK); // (200)
    endif;
  }

  function set_claim_data_get()
  {
    $data = [
      'nomor_sep'     => safe_get('nomor_sep'),
      'nomor_rm'      => safe_get('nomor_rm'),
      'coder_nik'     => safe_get('coder_nik') // NIK Koder
    ];

    $data = $this->eklaim_bpjs->setClaimData($data);

    if ($data) :
      $this->response($data, REST_Controller::HTTP_OK); // (200)
    endif;
  }

  function delete_patient_get()
  {
    $data = [
      'nomor_rm'      => safe_get('nomor_rm'),
      'coder_nik'     => safe_get('coder_nik') // NIK Koder
    ];

    $data = $this->eklaim_bpjs->deletePatient($data);

    if ($data) :
      $this->response($data, REST_Controller::HTTP_OK); // (200)
    endif;
  }


  private function _validasi()
  {
    $this->load->library('form_validation');
    $this->config->set_item('language', 'indonesia');

    $this->form_validation->set_rules('nomor_sep', 'Nomor SEP', 'required');

    if ($this->form_validation->run()) return TRUE;

    $data                = $error                = array();
    $data['error_class'] = $data['error_string'] = array();
    $data['status']      = TRUE;

    if (form_error('nomor_sep')) $error[] = 'nomor_sep';

    if ($error) :
      foreach ($error as $row) :
        // $data['error_class'][$row] = 'is-invalid';
        // $data['error_class_feedback'][$row] = 'invalid-feedback';
        $data['error_string'][$row] = form_error($row);
      endforeach;

      $data['status'] = FALSE;
      $data['token'] = $this->security->get_csrf_hash();
      echo json_encode($data);
      exit();
    endif;
  }

  function simpan_data_eklaim_post()
  {
    $checkDataEklaim = '';
    $checkDataEklaim =  $this->m_pengkodean_icd_x->getEklaim(safe_post('id_pendaftaran'));

    if (safe_post('discharge_status') == 'Atas Izin Dokter') {
      $discharge_status = 1;
    } else if (safe_post('discharge_status') == 'RS Lain') {
      $discharge_status = 2;
    } else if (safe_post('discharge_status') == 'Pulang APS') {
      $discharge_status = 3;
    } else if (safe_post('discharge_status') == 'Pemulasaran Jenazah') {
      $discharge_status = 4;
    } else {
      $discharge_status = 5;
    }

    if (safe_post('gender') == 'Perempuan') {
      $gender = 2;
    } else {
      $gender = 1;
    }

    if (safe_post('jenis_rawat') == 'Rawat Inap') {
      $jenis_rawat = 1;
    } else if (safe_post('jenis_rawat') == 'Rawat Jalan') {
      $jenis_rawat = 2;
    } else {
      $jenis_rawat = 3;
    }

    if (safe_post('hak_kelas') == 'Kelas 1') {
      $hak_kelas = 1;
    } else if (safe_post('hak_kelas') == 'Kelas 2') {
      $hak_kelas = 2;
    } else if (safe_post('hak_kelas') == 'Kelas 3') {
      $hak_kelas = 3;
    } else {
      $hak_kelas = 3;
    }

    $id_pendaftaran = safe_post('id_pendaftaran');
    $id_layanan_pendaftaran = safe_post('id_layanan_pendaftaran');

    $this->_validasi();
    $data = array(
      'id_pendaftaran'                => safe_post('id_pendaftaran'),
      'id_layanan_pendaftaran'        => safe_post('id_layanan_pendaftaran'),
      'nomor_kartu'                   => safe_post('nomor_kartu'),
      'nomor_sep'                     => safe_post('nomor_sep'),
      'nomor_rm'                      => safe_post('nomor_rm'),
      'nama_pasien'                   => safe_post('nama_pasien'),
      'tgl_lahir'                     => safe_post('tgl_lahir'),
      'gender'                        => $gender,
      'tgl_masuk'                     => safe_post('tgl_masuk'),
      'tgl_pulang'                    => safe_post('tgl_pulang'),
      'cara_masuk'                    => safe_post('cara_masuk'), // new update
      'jenis_rawat'                   => $jenis_rawat,
      'kelas_rawat'                   => $hak_kelas,
      'adl_sub_acute'                 => safe_post('adl_sub_acute'),
      'adl_chronic'                   => safe_post('adl_chronic'),
      'sistole'                       => safe_post('sistole') ?? NULL, // new update
      'diastole'                      => safe_post('diastole') ?? NULL, // new update
      'icu_indikator'                 => !empty(safe_post('icu_los')) ? '1' : '0',
      'icu_los'                       => safe_post('icu_los'),
      'ventilator_hour'               => '0',
      'upgrade_class_ind'             => '0',
      'upgrade_class_class'           => '0',
      'upgrade_class_los'             => '0',
      'add_payment_pct'               => '0',
      'birth_weight'                  => safe_post('birth_weight') ?? NULL,
      'discharge_status'              => $discharge_status,
      'diagnosa'                      => safe_post('diagnosa'),
      'procedure'                     => safe_post('procedure'),
      'prosedur_non_bedah'            => str_replace('.', '', safe_post('prosedur_non_bedah')),
      'prosedur_bedah'                => str_replace('.', '', safe_post('prosedur_bedah')),
      'konsultasi'                    => str_replace('.', '', safe_post('konsultasi')),
      'tenaga_ahli'                   => str_replace('.', '', safe_post('tenaga_ahli')),
      'keperawatan'                   => str_replace('.', '', safe_post('keperawatan')),
      'penunjang'                     => str_replace('.', '', safe_post('penunjang')),
      'radiologi'                     => str_replace('.', '', safe_post('radiologi')),
      'laboratorium'                  => str_replace('.', '', safe_post('laboratorium')),
      'pelayanan_darah'               => str_replace('.', '', safe_post('pelayanan_darah')),
      'rehabilitasi'                  => str_replace('.', '', safe_post('rehabilitasi')),
      'kamar'                         => str_replace('.', '', safe_post('kamar')),
      'rawat_intensif'                => str_replace('.', '', safe_post('rawat_intensif')),
      'obat'                          => str_replace('.', '', safe_post('obat')),
      'obat_kronis'                   => str_replace('.', '', safe_post('obat_kronis')),
      'obat_kemoterapi'               => str_replace('.', '', safe_post('obat_kemoterapi')),
      'alkes'                         => str_replace('.', '', safe_post('alkes')),
      'bmhp'                          => str_replace('.', '', safe_post('bmhp')),
      'sewa_alat'                     => str_replace('.', '', safe_post('sewa_alat')),
      'nama_dokter'                   => safe_post('nama_dokter'),
      'kode_tarif'                    => 'CP',
      'payor_id'                      => '00003',
      'payor_cd'                      => 'JKN',
      'coder_nik'                     => $this->session->userdata('nik'),
      'created_at'                    => $this->datetime,
    );

    $status = false;
    $message = "Tidak terhubung ke server eKlaim.";

    $newClaim = $this->eklaim_bpjs->newClaim($data);

    if ($newClaim['metadata']['code'] == '200' || ($newClaim['metadata']['code'] == '400' && $newClaim['metadata']['message'] == 'Duplikasi nomor SEP')) {
      $setClaimData = $this->eklaim_bpjs->setClaimData($data);

      if ($setClaimData['metadata']['code'] != '200') {
        $status = false;
        $message = $setClaimData['metadata']['message'];

        $this->response(array('status' => $status, 'message' => $message), REST_Controller::HTTP_OK);
      } else {

        $update = array(
          'no_sep'      => safe_post('nomor_sep'),
          'no_polish'   => safe_post('nomor_kartu')
        );

        $this->db->where("id", $id_layanan_pendaftaran)->update("sm_layanan_pendaftaran", $update);
        $this->db->where("id", $id_pendaftaran)->update("sm_pendaftaran", $update);

        if (empty($checkDataEklaim)) :
          $this->m_pengkodean_icd_x->simpanDataeklaim($data);
          $message = [
            'status'  => TRUE,
            'message' => 'Data Berhasil disimpan ke Server.'
          ];

          $this->response($message, REST_Controller::HTTP_OK);
        else :
          $id = $this->m_pengkodean_icd_x->updateDataeklaim($data, safe_post('id_pendaftaran'));
          $message = [
            'id_pendaftaran'    => convert_hash($id),
            'status'            => true,
            'message'           => 'Data Berhasil diupdate ke Server.'
          ];

          $this->response($message, REST_Controller::HTTP_OK);
        endif;
      }
    } else {
      $status = false;
      $message = $newClaim['metadata']['message'];

      $this->response(array('status' => $status, 'message' => $message), REST_Controller::HTTP_OK);
    }
  }
}
