<?php

defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class Antrian_radiologi_arduino extends REST_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->limit = 10;
        date_default_timezone_set('Asia/Jakarta');
		$this->datetime = date('Y-m-d H:i:s');
        $this->load->model('App_model', 'default');        
        $this->load->model('Antrian_radiologi_arduino_model', 'rad_arduino');

        // $id_translucent = $this->session->userdata('id_translucent');
        //if (empty($id_translucent)) :
        //    $this->response(array('error' => 'Anda belum login'), REST_Controller::HTTP_UNAUTHORIZED);
        //    exit();
        //endif;
    }

    function start($page)
    {
        return (($page - 1) * $this->limit);
    }
	
	function get_call_arduino_get()
    {
        $ruang = $this->get('ruang', true);
        $user  = $this->get('user', true);
        $respon = $this->rad_arduino->getCallArduino($ruang,$user);
        // $data = $this->rad_arduino->getTundaPanggilan($ruang);

		     if($user=='Arduino Ruang 1') { echo "ok";}
        else if($user=='Arduino Ruang 2A'){ echo "ok";}
        else if($user=='Arduino Ruang 2B'){ echo "ok";}
        else if($user=='Arduino Ruang 3') { echo "ok";}
        else if($user=='Arduino Ruang 4') { echo "ok";}
        else if($user=='Arduino Ruang 5') { echo "ok";
		} else {	
			$this->response($respon, REST_Controller::HTTP_OK);return;
		}
    }

    function get_recall_arduino_get()
    {
        $ruang  = $this->get('ruang', true);
        $user  = $this->get('user', true);
        $respon = $this->rad_arduino->getReCallArduino($ruang,$user);

        if($user=='Arduino'){
			echo "ok";
		} else {	
			$this->response($respon, REST_Controller::HTTP_OK);return;
		}
    }

}
