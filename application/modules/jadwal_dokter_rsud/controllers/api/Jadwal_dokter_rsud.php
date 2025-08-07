<?php

defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH.'/libraries/REST_Controller.php';
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
class Jadwal_dokter_rsud extends REST_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->limit = 20;
        $this->batas = 10;
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('App_model', 'm_default');
        $this->load->model('Jadwal_dokter_rsud_model', 'rsud');
        
        $id_translucent = $this->session->userdata('id_translucent');
        if (empty($id_translucent)) :
            $this->response(array('error' => 'Anda belum login'), REST_Controller::HTTP_UNAUTHORIZED);
            exit();
        endif;
    }

    private function mulai($page)
    {
        return (($page - 1) * $this->batas);
    }

    function data_jadwal_dokter_rsud_get()
    {
        
        if (!$this->get('page')) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
        endif;

        $search = [
            'tanggal_jadwal'        => safe_get('tanggal_jadwal'),
            'layanan'               => safe_get('layanan'),
        ];

        $start = $this->mulai($this->get('page'));

        $data = $this->rsud->jadwalDokterRSUD($this->batas, $start, $search);

        $data['page'] = (int) $this->get('page');
        $data['limit'] = $this->batas;

        if ($data) :
            $this->response($data, REST_Controller::HTTP_OK);
        endif;
    }

    private function start($page)
    {
        return (($page - 1) * $this->limit);
    }

    function kode_bpjs_get()
    {
        $q = safe_get('q');
        $page = safe_get('page');
        $start = $this->start($page);
        $data = $this->rsud->getKodeBPJS($q, $start, $this->limit);
        if ((safe_get('page') == 1) & ($q == '')){
            $pilih[] = array(
                'id' => '', 
                'nama' => '', 
                'kode' => '', 
                'kode_bpjs' => '' 
            );
            $data['data'] = array_merge($pilih, $data['data']);
            $data['total'] += 1;
        }
        $this->response($data, REST_Controller::HTTP_OK);
    }

    


}
