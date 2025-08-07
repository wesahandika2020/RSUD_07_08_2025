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
class Hclab_sysmex extends REST_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->limit = 20;
        $this->datetime = date('Y-m-d H:i:s');
        $this->load->model('App_model', 'default');

        $this->hclab = $this->default->getConfigHCLAB();
    }

	private function getCurlHCLAB($url, $data)
	{

	}

	private function curlHCLAB($method, $url, $data = null)
	{
		$ch = curl_init();
		curl_setopt_array($ch, [
			CURLOPT_URL => $url,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => '',
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => $method,
			CURLOPT_HTTPHEADER => [
				'x-username: ' . $this->hclab->username,
				'x-password: ' . $this->hclab->password,
			],
		]);
		if ($method !== 'GET') {
			curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		}
		$response = curl_exec($ch);
		curl_close($ch);
		return $response;
	}

    function create_order_lab_post()
	{
		
	}

	function get_result_lab_get()
	{
		$ono = $this->get('ono', true);
		$url = $this->hclab->server . "hclab/api/result/ono/$ono/view/";
		var_dump($url); die;
	}
}