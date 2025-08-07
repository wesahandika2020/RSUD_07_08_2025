<?php

defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';
// require_once 'vendor/autoload.php';

use Restserver\Libraries\REST_Controller;
use \LZCompressor\LZString as LZString;

/**
 * @package         CodeIgniter
 * @subpackage      Rest Server
 * @category        Controller
 * @author          Faiz Muhammad Syam
 * @license         Syams Corporation
 */
class Kuota_hadir extends REST_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->limit = 20;
        $this->start = 1;
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('App_model', 'm_default');
        $this->load->model('Kuota_hadir_model', 'kuota');

        $id_translucent = $this->session->userdata('id_translucent');
        if (empty($id_translucent)) :
            $this->response(array('error' => 'Anda belum login'), REST_Controller::HTTP_UNAUTHORIZED);
            exit();
        endif;
    }

    function data_kuota_hadir_get()
    {

        if (!$this->get('page')) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
        endif;

        $start  = ($this->get('page') - 1) * $this->limit;
        $search = [
            'poliklinik'        => safe_get('poliklinik'),
            'tanggal_awal'     => safe_get('tanggal_awal'),
            'tanggal_akhir'     => safe_get('tanggal_akhir'),
        ];

        $data = $this->kuota->queryKuotaHadir($this->limit, $start, $search);
        $data['dashboard'] = $this->kuota->queryDashboardKuota();

        $data['page'] = (int) $this->get('page');
        $data['limit'] = $this->limit;

        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK);
        endif;
    }

    function data_dashboard_kuota_post()
    {
        session_write_close();
        set_time_limit(0);
        $data_lama = safe_post('response');

        while (true) {
            $data_baru = $this->kuota->queryDashboardKuota();
            // var_dump($data_lama);
            // die;

            if($data_lama !== $data_baru){
                $this->response($data_baru, self::HTTP_OK);
                return;
            }

            sleep(1);
        }
    }

    function data_detail_kuota_get()
    {

        if (!$this->get('id')) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
        endif;

        $id = $this->get('id');

        $search = [
            'tanggal_awal'     => safe_get('tanggal_awal'),
            'tanggal_akhir'     => safe_get('tanggal_akhir'),
        ];

        $data = $this->kuota->detailKuotaAntrian($id, $search);

        $data['page'] = (int) $this->get('page');
        $data['limit'] = $this->limit;

        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK);
        endif;
    }
}
