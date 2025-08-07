<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Aplicares_bpjs extends SYAM_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('App_model', 'default');
    $this->load->model('Masterdata_model', 'masterdata');

    $this->date = date('Y-m-d');
    $this->datetime = date('Y-m-d H:i:s');
    $this->load->model('Aplicares_model', 'm_aplicares');

    $this->code = 400;
    $this->message = "Tidak terhubung dengan Server BPJS, Server BPJS sedang bermasalah. Silahkan Hubungi Pihak IT BPJS";

    $this->bpjs_config = $this->default->getConfigAplicares();
  }

  public function update_all_bed()
  {
    $kodeppk = $this->bpjs_config->no_ppk;

    $req = '';
    $url = $this->bpjs_config->server . "rest/bed/update/" . $kodeppk;
    $beds = $this->m_aplicares->DataSummaryBed();
    foreach ($beds as $key => $value) :
      if (!empty($value->id)) {
        $req = array(
          "kodekelas"             => $value->kodekelas,
          "koderuang"             => $value->id,
          "namaruang"             => $value->namaruang,
          "kapasitas"             => $value->kapasitas,
          "tersedia"              => $value->tersedia,
          "tersediapria"          => $value->tersediapria,
          "tersediawanita"        => $value->tersediawanita,
          "tersediapriawanita"    => $value->tersediapriawanita
        );
        $data = array(
          "kodekelas"             => $value->kodekelas,
          "koderuang"             => $value->koderuang,
          "namaruang"             => $value->namaruang,
          "kapasitas"             => $value->kapasitas,
          "tersedia"              => $value->tersedia,
          "tersediapria"          => $value->tersediapria,
          "tersediawanita"        => $value->tersediawanita,
          "tersediapriawanita"    => $value->tersediapriawanita,
          "update_terakhir"       => $this->datetime,
          "user_log"              => 'Server'
        );

        $header = $this->m_aplicares->createHeader($this->bpjs_config);
        $header[3] = "Content-type: application/json";
        // $header[3] = "Content-type: application/www-x-form-urlencoded";

        $output = postCurl($url, json_encode($req), $header);

        $outputJson = json_decode($output);
        if ($outputJson->metadata->code == "1") {
          // $update_lp = array("no_rujukan" => $outputJson->response->rujukan->noRujukan);
          // $this->db->where("no_sep", $no_sep)->update("sm_layanan_pendaftaran", $update_lp);
          $this->db->where('id', $value->id, true)->update('sm_ketersediaan_bed', $data);
        }
      }
    endforeach;
    exit($output);
  }
}
