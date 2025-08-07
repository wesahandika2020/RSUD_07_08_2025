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
class Kirim_data_online extends REST_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->limit = 25;
    $this->datetime = date('Y-m-d H:i:s');
    $this->load->model('Kirim_data_online_model', 'kirim_klaim');
    $this->load->model('App_model', 'default');
  }

  function get_summary_data_klaim_get()
  {
    $search = [
      'jenis_rawat'       => safe_get('jenis_rawat_kdo'),
      'jenis_tanggal'     => safe_get('filter_kdo'),
      'tanggal_seacrh'    => safe_get('tanggal_seacrh_kdo'),
    ];

    $data   = $this->kirim_klaim->getSummaryDataKlaim($search);

    if ($data) :
      $this->response($data, REST_Controller::HTTP_OK); // (200)
    else :
      $this->response(array('error' => 'Data is Not Found'), REST_Controller::HTTP_NOT_FOUND);
    endif;
  }

  function get_list_data_klaim_get()
  {
    if (!$this->get('page')) :
      $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
    endif;

    $start  = ($this->get('page') - 1) * $this->limit;
    $search = [
      'jenis_rawat'       => safe_get('jenis_rawat_kdo'),
      'jenis_tanggal'     => safe_get('filter_kdo'),
      'tanggal_seacrh'    => safe_get('tanggal_seacrh_kdo'),
    ];

    $data   = $this->kirim_klaim->getListDataKlaim($this->limit, $start, $search);
    $data['page']    = (int) $this->get('page');
    $data['limit']   = $this->limit;

    if ($data) :
      $this->response($data, REST_Controller::HTTP_OK); // (200)
    else :
      $this->response(array('error' => 'Data is Not Found'), REST_Controller::HTTP_NOT_FOUND);
    endif;
  }
}
