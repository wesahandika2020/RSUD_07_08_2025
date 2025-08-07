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
class Resume_medis_RI extends REST_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->datetime = date('Y-m-d H:i:s');
    // $this->load->model('Eclaim_bpjs_model', 'eclaim_bpjs');
    $this->load->model('App_model', 'default');

    // $this->eclaim_config = $this->default->getConfigEclaim();
  }

  function filterOlower($text)
  {

    $filter = trim(preg_replace('/[\t\n\r\s]+/', ' ', $text));

    return $filter;
  }
}
