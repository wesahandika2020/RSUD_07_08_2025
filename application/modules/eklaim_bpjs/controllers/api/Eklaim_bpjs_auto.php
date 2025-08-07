<?php defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';
require APPPATH . '/libraries/Redis.php';

use Restserver\Libraries\REST_Controller;

/**
 * @package         CodeIgniter
 * @subpackage      Rest Server
 * @category        Controller
 * @author          Faiz Muhammad Syam
 * @license         Syams Corporation
 */
class Eklaim_bpjs_auto extends REST_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->limit = 10;
        $this->redis = new CI_Redis();
        $this->datetime = date('Y-m-d H:i:s');
        $this->load->model('Eklaim_bpjs_model', 'eklaim_bpjs');
        $this->load->model('Eklaim_bpjs_auto_model', 'eklaim_bpjs_auto');
        $this->load->model('App_model', 'default');

        // $this->eclaim_config = $this->default->getConfigEklaim();
    }

    private function start($page)
    {
        return (($page - 1) * $this->limit);
    }

    // function pasien_auto_get()
    // {
    //     $keyword = $this->input->get('keyword', true);

    //     // Query pencarian, sesuaikan dengan tabel Anda
    //     $this->db->like('id', $keyword);
    //     $this->db->or_like('no_identitas', $keyword);
    //     $this->db->or_like('nama', $keyword);
    //     $data = $this->db->get('sm_pasien')->result();

    //     // Kirimkan hasil sebagai JSON
    //     if ($data) :
    //         $this->response($data, REST_Controller::HTTP_OK); // (200)
    //     endif;
    // }

    function pasien_auto_get()
    {
        $q = safe_get('q');
        $page = safe_get('page');
        $start = $this->start($page);
        $key = 'pasien_auto_' . $q . '_' . $page;
        $data = $this->eklaim_bpjs_auto->getAutoPasien($q, $start, $this->limit);
        $this->redis->setex($key, 3600, json_encode($data));

        $this->response($data, REST_Controller::HTTP_OK);
    }

    function diagnosa_ina_get()
    {
        $q = safe_get('q');
        $jenis = safe_get('jenis');

        // $page = safe_get('page_dropdown');
        // $start = $this->start($page);
        // $key = 'pasien_auto_' . $q . '_' . $page;
        // $data = $this->eklaim_bpjs_auto->getAutoPasien($q, $start, $this->limit);
        // $this->redis->setex($key, 3600, json_encode($data));

        if (!$this->get('page')) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
        endif;

        $start          = ($this->get('page') - 1) * $this->limit;
        if ($jenis == 'unu') :
            $data = $this->eklaim_bpjs_auto->getDiagnosaEKlaim($this->limit, $start, $q);
        else :
            $data = $this->eklaim_bpjs_auto->getDiagnosaEKlaimINA($this->limit, $start, $q);
        endif;

        $data['page']    = (int) $this->get('page');
        $data['limit']   = $this->limit;

        $this->response($data, REST_Controller::HTTP_OK);
    }

    function prosedur_ina_get()
    {
        $q = safe_get('q');
        $jenis = safe_get('jenis');

        // $page = safe_get('page_dropdown');
        // $start = $this->start($page);
        // $key = 'pasien_auto_' . $q . '_' . $page;
        // $data = $this->eklaim_bpjs_auto->getAutoPasien($q, $start, $this->limit);
        // $this->redis->setex($key, 3600, json_encode($data));

        if (!$this->get('page')) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
        endif;

        $start          = ($this->get('page') - 1) * $this->limit;
        if ($jenis == 'unu') :
            $data = $this->eklaim_bpjs_auto->getProsedurEKlaim($this->limit, $start, $q);
        else :
            $data = $this->eklaim_bpjs_auto->getProsedurEKlaimINA($this->limit, $start, $q);
        endif;

        $data['page']    = (int) $this->get('page');
        $data['limit']   = $this->limit;

        $this->response($data, REST_Controller::HTTP_OK);
    }

    function petugas_eklaim_get()
    {
        $q = safe_get('q');
        $page = safe_get('page');
        $start = $this->start($page);
        // $key = 'petugas_eklaim_' . $q . '_' . $page;
        // if (!$this->redis->get($key)) :
        $data = $this->eklaim_bpjs_auto->getAutoPetugasEklaim($q, $start, $this->limit);
        if ((safe_get('page') == 1) & ($q == '')) :
            $pilih[] = array(
                'id' => '',
                'nama' => 'Semua'
            );
            $data['data'] = array_merge($pilih, $data['data']);
            $data['total'] += 1;
        endif;
        // $this->redis->setex($key, 86400, json_encode($data));
        $this->response($data, REST_Controller::HTTP_OK);
        // else :
        //     exit($this->redis->get($key));
        // endif;
    }
}
