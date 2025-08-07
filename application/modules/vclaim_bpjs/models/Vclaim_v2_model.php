<?php
defined('BASEPATH') or exit('No direct script access allowed');

use \LZCompressor\LZString as LZString;

class Vclaim_v2_model extends CI_Model
{

    private $timestamp;

    function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('App_model', 'm_default');
        $this->load->model('vclaim_bpjs/Sep_v2_model', 'm_sep_v2');
        // $this->bpjs_config = $this->default->getConfigBPJSV2();
        $this->timestamp = strval(time());

        $this->code = 400;
        $this->message = "Tidak terhubung dengan Server BPJS, Server BPJS sedang bermasalah. Silahkan Hubungi Pihak IT BPJS";

        $this->bpjs_config = $this->default->getConfigBPJSV2();
    }

    function get_rujukan_rs($noRujukan)
    {

        $url1 = base_url('vclaim_bpjs/api/vclaim_bpjs_v2/get_rujukan?norujukan=' . $noRujukan);
        $url2 = base_url('vclaim_bpjs/api/vclaim_bpjs_v2/get_rujukan_rs?norujukan=' . $noRujukan);

        $header = $this->m_sep_v2->createHeader($this->bpjs_config);

        // Ambil dari endpoint pertama
        $rujukan = getCurl($url1, $header);
        $rujukan = json_decode($rujukan);

        // Jika gagal (response null), coba endpoint kedua
        if ($rujukan === null || $rujukan->response === null) {
            $rujukan = getCurl($url2, $header);
            $rujukan = json_decode($rujukan);
        }

        return $rujukan;
    }
}
