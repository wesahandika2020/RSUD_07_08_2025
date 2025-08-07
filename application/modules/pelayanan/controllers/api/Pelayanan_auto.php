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
class Pelayanan_auto extends REST_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->limit = 20;
        $this->load->model('pelayanan/Pelayanan_model', 'm_pelayanan');

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

    function generate_no_resep_get()
    {
        $data = $this->m_pelayanan->generateNoResep();
        $this->response($data, REST_Controller::HTTP_OK);
    }

    function get_resep_pasien_get()
    {
        $param = array();
        if (!empty($_GET["q"])) :
            $param["q"] = safe_get("q");
        endif;

        if (!empty($_GET["id_pasien"])) :
            $param["id_pasien"] = safe_get("id_pasien");
        endif;

        if (!empty($_GET["id_layanan_pendaftaran"])) :
            $param["id_layanan_pendaftaran"] = safe_get("id_layanan_pendaftaran");
        endif;

        if (safe_get("page")) :
            $param["index"] = $this->start(safe_get("page"));
            $param["limit"] = $this->limit;
        endif;

        $data = $this->m_pelayanan->getListResep($param)->result_array();
        $tmp_tot = $this->m_pelayanan->getListResepTotal($param)->row_array();
        $total = !empty($tmp_tot["total"]) ? $tmp_tot["total"] : 0;
        if (!empty($_GET["def"])) :
            array_unshift($data, $_GET["def"]);
            $total = $total + 1;
        endif;

        $hasil["data"] = $data;
        $hasil["meta"]["total"] = $total;
        $this->response($hasil, REST_Controller::HTTP_OK);
    }

    function get_layanan_pendaftaran_get()
    {
        $data = $this->m_pelayanan->getLayananPendaftaran($this->get('id_layanan_pendaftaran', true));
        $this->response($data, REST_Controller::HTTP_OK);
    }

    function nomor_penjualan_auto_get()
    {
        $q = safe_get("q");
        $start = $this->start(safe_get("page"));
        $data = $this->m_pelayanan->getAutoNomorPenjualan($q, $start, $this->limit);
        if (safe_get("page") == 1 & $q == "") :
            $pilih[] = array("id" => "", "nama" => "-", "alamat" => "");
            $data["data"] = array_merge($pilih, $data["data"]);
            $data["total"] += 1;
        endif;
        $this->response($data, 200);
    }

    function waktu_pemberian_auto_get()
	{
		$data = $this->db->get_where('sm_waktu_pemberian_obat', ['is_waktu_pemberian' => safe_get('waktu_pemberian')])->result();
		$this->response($data, 200);
	}
}
