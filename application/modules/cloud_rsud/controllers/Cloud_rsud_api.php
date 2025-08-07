<?php

defined('BASEPATH') or exit('No direct script access allowed');


class Cloud_rsud_api extends SYAM_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->limit = 10;
    $this->load->model('Cloud_rsud_model', 'cloud_rsud');
    $this->datetime = date('Y-m-d H:i:s');

    $this->cloud_config = (object) [
      'server'     => 'http://192.168.77.101/api/file-upload/',
      'user_key'   => '80d402801bf7653318ee305235880de8'
    ];
    $this->code = 400;
    $this->message = "Tidak terhubung dengan Server Cloud RSUD, Server Cloud RSUD sedang bermasalah. Silahkan Hubungi Pihak IT RSUD";
    $this->load->helper('url');
  }

  function deleteDirectory($dir)
  {
    if (!file_exists($dir)) {
      return true;
    }

    if (!is_dir($dir)) {
      return unlink($dir);
    }

    foreach (scandir($dir) as $item) {
      if ($item == '.' || $item == '..') {
        continue;
      }

      if (!$this->deleteDirectory($dir . '/' . $item)) {
        return false;
      }
    }

    return rmdir($dir);
  }

  function delete_patch_post()
  {
    $filename = $this->input->post('filename');
    $path = FCPATH . 'resources/dokumen_rekam_medis/';

    $this->deleteDirectory($path);
  }

  function deleteCurl($url)
  {
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_ENCODING, '');
    curl_setopt($ch, CURLOPT_MAXREDIRS, 10);
    curl_setopt($ch, CURLOPT_TIMEOUT, 0);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');

    $output = curl_exec($ch);
    curl_close($ch);

    return $output;
  }

  // [Start] Bridging Aplikasi CLOUD RSUD
  public function getDataCloudRSUD($id_cloud, $kategori)
  {
    $parameters = array(
      'id' => $id_cloud,
      'aplikasi' => 'simrs',
      'kategori' => $kategori
    );

    $url = $this->cloud_config->server . 'getfile?' . http_build_query($parameters);
    $header = $this->cloud_rsud->createHeader($this->cloud_config);

    $output = getCurl($url, $header);
    $output = json_decode($output);

    return $output;
  }

  public function getDataCloudLain($id_cloud)
  {
    $parameters = array(
      'id' => base64_encode($id_cloud)
    );

    $url = $this->cloud_config->server . 'getpdf-folder?' . http_build_query($parameters);
    $header = $this->cloud_rsud->createHeader($this->cloud_config);

    $output = getCurl($url, $header);
    $output = json_decode($output);

    return $output;
  }

  public function addDataCloudRSUD($data)
  {
    $url = $this->cloud_config->server . 'addfile';

    $output = postCurl($url, $data);
    $output = json_decode($output);

    return $output;
  }

  public function addDataCloudLain($data)
  {
    $url = $this->cloud_config->server . 'addfile-lain';

    $output = postCurl($url, $data);
    $output = json_decode($output);

    return $output;
  }

  public function updateDataCloudRSUD($data, $id)
  {
    $url = $this->cloud_config->server . 'updatefile/' . $id;

    $output = postCurl($url, $data);
    $output = json_decode($output);

    return $output;
  }

  public function deleteDataCloudRSUD($id)
  {
    $url = $this->cloud_config->server . 'deletefile/' . $id;

    // $output = $this->deleteCurl($url);
    $output = customCurl('DELETE', $url, $id);
    $output = json_decode($output);

    return $output;
  }

  public function deleteDataCloudLain($id)
  {
    $url = $this->cloud_config->server . 'deletefile-lain/' . $id;

    // $output = $this->deleteCurl($url);
    $output = customCurl('DELETE', $url, $id);
    $output = json_decode($output);

    return $output;
  }
  // [End] Bridging Aplikasi CLOUD RSUD

  public function get_file_upload_pasien($id_pendaftaran, $id_pasien)
  {

    // $this->load->model('pendaftaran/Pendaftaran_model', 'm_pendaftaran');
    // $data = $this->m_pendaftaran->getPendaftaranDetail($id_pendaftaran);

    $data['file_sitb'] = $this->cloud_rsud->getDataFileRM($id_pasien);
    if (!empty($data['file_sitb']->id_cloud)) {

      $id_cloud = $data['file_sitb']->id_cloud;
      $rscloud = $this->getDataCloudRSUD($id_cloud, 'sitb');

      if ($rscloud == NULL) {
        $data = ["metadata" => ["code" => $this->code, "message" => $this->message]];
      }

      $timestamp = strtotime($rscloud->data->updated_at);
      $created_at = date('Y-m-d H:i:s', $timestamp);

      $data['file_sitb']->nama_file = $rscloud->data->nama_file;
      $data['file_sitb']->created_at = $created_at;
      $data['file_sitb']->file_location = $rscloud->data->file_location;
    }

    $data['file_rm_lain'] = $this->cloud_rsud->getDataFileRMLain($id_pendaftaran, $id_pasien, null);

    foreach ($data['file_rm_lain'] as $i => $val) {
      $data_cloud = $this->getDataCloudLain($val->id_cloud);
      $data['file_rm_lain'][$i]->file_location = $data_cloud->data->file_location ?? null;
    }

    return $data;
  }
}
