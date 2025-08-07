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
class Hasil_laboratorium_pa extends REST_Controller
{

    function __construct()
    {
        parent::__construct();
		$this->limit = 10;
		$this->datetime = date('Y-m-d H:i:s');
        $this->load->model('Hasil_laboratorium_PA_model', 'm_hasil_laboratorium_pa');
        $this->load->model('pelayanan/Pelayanan_model', 'm_pelayanan');

        $id_translucent = $this->session->userdata('id_translucent');
        if (empty($id_translucent)) :
            $this->response(array('error' => 'Anda belum login'), REST_Controller::HTTP_UNAUTHORIZED);
            exit();
        endif;
    }

    function get_hasil_laboratorium_pa_get()
    {
        if (!$this->get('id', true)) :
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // (400)
        endif;

        $data = array(
            'hasil' => 'No Available',
            'data' => NULL
        );

        $hasil = $this->db->where('id_laboratorium', $this->get('id', true))->get('sm_hasil_laboratorium_pa')->row();
        if (0 < count((array)$hasil)) :
            $data['hasil'] = 'Available';
            $data['data'] = $hasil;
        endif;
        $this->response($data, REST_Controller::HTTP_OK); //200
    }

    function simpan_hasil_laboratorium_pa_post()
    {
        if (safe_post('id_laboratorium') === '') {
            $message = array('status' => false);
            $this->response($message, REST_Controller::HTTP_OK);
        }

        $jenis_pemeriksaan = safe_post('jenis_pemeriksaan');

        if($jenis_pemeriksaan === 'PS'){

            $data = array(
                'id_laboratorium' => safe_post('id_laboratorium'),
                'no_lab_pa' => safe_post('no_lab_pa'),
                'diagnosa_klinik' => safe_post('diagnosa_klinik'),
                'anamnesa' => null,
                'kondisi' => safe_post('kondisi'),
                'rincian' => safe_post('rincian'),
                'makroskopik' => null,
                'mikroskopik' => null,
                'kesimpulan' => safe_post('kesimpulan'),
                'anjuran' => safe_post('anjuran'),
                'jenis_pemeriksaan' => $jenis_pemeriksaan,
            );
        } else if($jenis_pemeriksaan === 'HP'){

            $data = array(
                'id_laboratorium' => safe_post('id_laboratorium'),
                'no_lab_pa' => safe_post('no_lab_pa'),
                'diagnosa_klinik' => safe_post('diagnosa_klinik'),
                'anamnesa' => null,
                'kondisi' => null,
                'rincian' => null,
                'makroskopik' => safe_post('makroskopik'),
                'mikroskopik' => safe_post('mikroskopik'),
                'kesimpulan' => safe_post('kesimpulan'),
                'anjuran' => safe_post('anjuran'),
                'jenis_pemeriksaan' => $jenis_pemeriksaan,
            );
        } else {

            $data = array(
                'id_laboratorium' => safe_post('id_laboratorium'),
                'no_lab_pa' => safe_post('no_lab_pa'),
                'diagnosa_klinik' => safe_post('diagnosa_klinik'),
                'anamnesa' => safe_post('anamnesa'),
                'kondisi' => null,
                'rincian' => null,
                'makroskopik' => null,
                'mikroskopik' => safe_post('mikroskopik'),
                'kesimpulan' => safe_post('kesimpulan'),
                'anjuran' => safe_post('anjuran'),
                'jenis_pemeriksaan' => $jenis_pemeriksaan,
            );
            
        }  

        
        $status = $this->m_hasil_laboratorium_pa->updateHasilLaboratoriumPA($data);
        $message = array($status => $status);
        $this->response($message, REST_Controller::HTTP_OK);
    }

}