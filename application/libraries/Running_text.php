<?php
if(!defined('BASEPATH'))exit('No direct script access allowed');
class Running_text {
	function __construct(){

	}

	function getInformasi($param = NULL){
		$ci =& get_instance();
		$ci->load->model('App_model', 'm_app');
		$hasil = $ci->m_app->getInformasi($param);

		return $hasil;
	}
}
