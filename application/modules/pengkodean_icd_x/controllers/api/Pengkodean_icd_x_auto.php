<?php

defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class Pengkodean_icd_x_auto extends REST_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->limit = 20;
        $this->load->model('Pengkodean_icd_x_model', 'm_pengkodean_icd_x');

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

	function code_icd_auto_get()
    {
        $params['q'] = safe_get('q');
        $start = $this->start(safe_get('page'));        
        $data = $this->m_pengkodean_icd_x->getAutoCodeIcd($params, $start, $this->limit);

        if ((safe_get('page') == 1) & ($params['q'] == '')) {
            $pilih[] = array(
                'id' => '', 
                'nama' => ' ', 
                'kode_icdx_rinci' => '',
                'nama_idn' => '',
            );

            $data['data'] = array_merge($pilih, $data['data']);
            $data['total'] += 1;
        }
        $this->response($data, REST_Controller::HTTP_OK);
    }

    function code_icd_asterik_auto_get()
    {
        $params['q'] = safe_get('q');
        $start = $this->start(safe_get('page'));        
        $data = $this->m_pengkodean_icd_x->getAutoCodeIcdAsterik($params, $start, $this->limit);

        if ((safe_get('page') == 1) & ($params['q'] == '')) {
            $pilih[] = array(
                'id' => '', 
                'nama' => ' ', 
                'kode_icdx_rinci' => '',
                'nama_idn' => '',
            );

            $data['data'] = array_merge($pilih, $data['data']);
            $data['total'] += 1;
        }
        $this->response($data, REST_Controller::HTTP_OK);
    }

    function code_icd9_auto_get()
    {
        $params['q'] = safe_get('q');
        $start = $this->start(safe_get('page'));        
        $data = $this->m_pengkodean_icd_x->getAutoCodeIcd9($params, $start, $this->limit);

        if ((safe_get('page') == 1) & ($params['q'] == '')) {
            $pilih[] = array(
                'id' => '', 
                'nama' => ' ', 
                'icd9' => '',
            );

            $data['data'] = array_merge($pilih, $data['data']);
            $data['total'] += 1;
        }
        $this->response($data, REST_Controller::HTTP_OK);
    }
}
