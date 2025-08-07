<?php

defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';

// FCB
require APPPATH . '/libraries/Redis.php';

use Restserver\Libraries\REST_Controller;

use function GuzzleHttp\json_decode;

/**
 * @package         CodeIgniter
 * @subpackage      Rest Server
 * @category        Controller
 * @author          Faiz Muhammad Syam
 * @license         Syams Corporation
 */
class Diagnosa_resume extends REST_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->limit = 10;

    // FCB
    $this->redis = new CI_Redis();

    date_default_timezone_set('Asia/Jakarta');
    $this->datetime = date('Y-m-d H:i:s');
    $this->load->model('Pelayanan_model', 'm_pelayanan');
    $this->load->model('Diagnosa_resume_model', 'm_diag_resume');
    $this->load->model('logs/Logs_model', 'm_m_logs');
    $this->load->model('pendaftaran/Pendaftaran_model', 'm_pendaftaran');

    $id_translucent = $this->session->userdata('id_translucent');
    if (empty($id_translucent)) :
      $this->response(array('error' => 'Anda belum login'), REST_Controller::HTTP_UNAUTHORIZED);
      exit();
    endif;
  }

  function get_diagnosa_id_pendaftaran_get()
  {
    if (!$this->get('id')) :
      $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
    endif;

    $data = $this->m_pendaftaran->getPendaftaranDetail($this->get('id', true), $this->get('id_layanan', true));
    $data['diagnosa']     = $this->m_diag_resume->getDiagnosaPemeriksaan($this->get('id', true));

    if ($data) :
      $this->response($data, REST_Controller::HTTP_OK); // (200)
    endif;
  }
}
