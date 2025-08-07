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
class Inventori_rt_auto extends REST_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->limit = 20;
        $this->load->model('Inventori_rt_model', 'inventori');

        $id_translucent = $this->session->userdata('id_translucent');
        if (empty($id_translucent)) :
            $this->response(array('error' => 'Anda belum login'), REST_Controller::HTTP_UNAUTHORIZED);
            exit();
        endif;
    }

    private function start($page)
    {
        return (((int)$page - 1) * (int)$this->limit);
    }

    function nomor_faktur_penerimaan_auto_get()
    {
        $q = safe_get('q');
        $start = $this->start(safe_get('page'));
        $data = $this->inventori->getAutoNoFakturPenerimaan($q, $start, $this->limit);
        if ((safe_get('page') == 1) & ($q == '')) {
            $pilih[] = array('id' => '', 'no_faktur' => 'Pilih No Faktur...', 'supplier' => '');
            $data['data'] = array_merge($pilih, $data['data']);
            $data['total'] += 1;
        }
        $this->response($data, REST_Controller::HTTP_OK);
    }

    function nomor_distribusi_auto_get()
    {
        $param["q"] = safe_get('q');
        $param["status"] = safe_get('status');
        $start = $this->start(safe_get('page'));
        $data = $this->inventori->getAutoNoDistribusi($param, (int)$start, (int)$this->limit);
        if ((safe_get('page') == 1) & ($param == '')) {
            $pilih[] = array('id' => '', 'unit_kirim' => '', 'Unit' => 'Pilih...', 'tanggal' => NULL);
            $data['data'] = array_merge($pilih, $data['data']);
            $data['total'] += 1;
        }
        $this->response($data, REST_Controller::HTTP_OK);
    }

}
