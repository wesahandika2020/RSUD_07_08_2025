<?php

defined('BASEPATH') or exit('No direct script access allowed');
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
class Status_keluar_pasien extends REST_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->limit = 10;
        $this->redis = new CI_Redis();
        $this->load->model('Masterdata_model', 'auto');
        $this->load->model('Status_keluar_pasien_model', 'skp');

        $id_translucent = $this->session->userdata('id_translucent');
        if (empty($id_translucent)) :
            $this->response(array('error' => 'Anda belum login'), REST_Controller::HTTP_UNAUTHORIZED);
            exit();
        endif;
    }

    private function start($page)
    {
        return (($page - 1) * $this->limit);
    }
    

    function get_tempat_layanan_get()
    {
        $q = safe_get('q');
        $key = safe_get('key');
        $page = safe_get('page');
        $start = $this->start($page);
        // $key = 'tempat_layan_auto_'.$q.'_'.$page;
        // if (!$this->redis->get($key)) :
            $data = $this->skp->getTempatLayanan($q, $key, $start, $this->limit);
            if ((safe_get('page') == 1) & ($q == '')) :
                $pilih[] = array(
                    'id' => '', 
                    'nama' => '', 
                );
                $data['data'] = array_merge($pilih, $data['data']);
                $data['total'] += 1;
            endif;
            // $this->redis/->setex($key, 86400, json_encode($data));
            $this->response($data, REST_Controller::HTTP_OK);
        // else :
        //     exit($this->redis->get($key));
        // endif;
    }

    function get_list_status_keluar_pasien_get()
	{
		if (!$this->get('page')) :
			$this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
		endif;

		$start          = ($this->get('page') - 1) * $this->limit;
		$search         = [
			'filter'        => $this->get('filter'),
			'jenis_layanan' => $this->get('jenis_layanan'),
			'tanggal_awal'  => safe_get('tanggal_awal'),
			'tanggal_akhir' => safe_get('tanggal_akhir'),
			'no_register'   => safe_get('no_register'),
			'no_rm'         => safe_get('no_rm'),
			'nik'           => safe_get('nik'),
			'nama'          => safe_get('nama'),
			'dokter'        => safe_get('dokter'),
			'cara_bayar'	=> safe_get('cara_bayar'),
			'penjamin'		=> safe_get('penjamin'),
			'tempat_layanan'=> safe_get('tempat_layanan')
		];

		if ($this->get('jenis', true)) :
			$search['jenis'] = $this->get('jenis', true);
		endif;

		$data            = $this->skp->getListPemeriksaan($this->limit, $start, $search);
		$data['page']    = (int) $this->get('page');
		$data['limit']   = $this->limit;

		if ($data) :
			$this->response($data, REST_Controller::HTTP_OK); // (200)
		else :
			$this->response(array('error' => 'Data is Not Found'), REST_Controller::HTTP_NOT_FOUND);
		endif;
	}
}