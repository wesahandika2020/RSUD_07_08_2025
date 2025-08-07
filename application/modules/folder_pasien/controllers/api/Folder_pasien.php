<?php

defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';

require_once 'vendor/dompdf/dompdf/src/dompdf.php';
require_once APPPATH . 'modules/rekap_billing/controllers/Rekap_billing.php';
require_once APPPATH . 'modules/pengkodean_icd_x/controllers/Pengkodean_icd_x.php';
require_once APPPATH . 'modules/casemix/controllers/Casemix.php';
require_once APPPATH . 'modules/pelayanan/controllers/Pelayanan.php';

use Restserver\Libraries\REST_Controller;

/**
 * @package         CodeIgniter
 * @subpackage      Rest Server
 * @category        Controller
 * @author          Faiz Muhammad Syam
 * @license         Syams Corporation
 */
class Folder_pasien extends REST_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->waktu_cetak = date('d/m/Y H:i');
    $this->load->model('App_model', 'm_default');
    $this->load->model('Masterdata_model', 'm_masterdata');
    $this->load->model('keuangan/Keuangan_model', 'm_keuangan');
    $this->load->model('casemix/Casemix_model', 'm_casemix');
    $this->load->model('casemix/Dokumen_model', 'dokumen');
    $this->load->model('rekap_billing/Rekap_billing_model', 'm_rekap_billing');
    $this->load->model('pendaftaran/Pendaftaran_model', 'klinik');
    $this->load->model('rawat_inap/Rawat_inap_model', 'm_rawat_inap');

    $this->load->model('pelayanan/Pelayanan_model', 'm_pelayanan');
    $data_lis = $this->m_pelayanan->getLIS();

    $this->url = $data_lis->url;
    $this->user = $data_lis->user;
    $this->pass = $data_lis->pass;

    $id_translucent = $this->session->userdata('id_translucent');
    if (empty($id_translucent)) :
      $this->response(array('error' => 'Anda belum login'), REST_Controller::HTTP_UNAUTHORIZED);
      exit();
    endif;
  }

  function createZipArchive($folder_path, $zip_file_path)
  {
    $zip = new ZipArchive();

    if ($zip->open($zip_file_path, ZipArchive::CREATE | ZipArchive::OVERWRITE) === TRUE) {
      // Mendapatkan daftar file dalam folder
      $files = new RecursiveIteratorIterator(
        new RecursiveDirectoryIterator($folder_path),
        RecursiveIteratorIterator::LEAVES_ONLY
      );

      foreach ($files as $name => $file) {
        // Melakukan pengecekan apakah file valid dan bukan direktori
        if (!$file->isDir()) {
          // Mendapatkan path dan nama file relatif terhadap folder awal
          $file_path = $file->getRealPath();
          $relative_path = substr($file_path, strlen($folder_path));

          // Menambahkan file ke dalam ZIP
          $zip->addFile($file_path, $relative_path);
        }
      }

      $zip->close();

      return true;
    } else {
      return false;
    }
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

  // function createdDomPDF($html, $upload_path, $nama_dokumen)
  // {
  //   $this->load->library('pdf');

  //   $font = base_url() . 'vendor/dompdf/dompdf/fonts/verdana.ttf';  // Ganti dengan path font yang Anda ingin gunakan
  //   $this->pdf->set_option('isRemoteEnabled', true);
  //   $this->pdf->set_option('defaultMediaType', 'all');
  //   $this->pdf->set_option('isFontSubsettingEnabled', true);
  //   $this->pdf->set_option('isPhpEnabled', true); // Aktifkan PHP di dalam HTML
  //   $this->pdf->set_option('fontPath', $font);
  //   $this->pdf->set_option('fontFamily', 'Verdana');
  //   $this->pdf->setPaper('A4', 'portrait');

  //   $pdf_content = $html;
  //   $this->pdf->loadHTML($pdf_content);
  //   $this->pdf->render();

  //   $file_name = $nama_dokumen . '.pdf';
  //   $file_path = $upload_path . $file_name;
  //   $output = $this->pdf->output();

  //   file_put_contents($file_path, $output);
  //   // die;
  //   // $this->pdf->close();
  // }

  function createdDomPDF($html, $upload_path, $nama_dokumen)
  {
    $this->load->library('download_pdf');
    $this->download_pdf->generatePdf($html, $upload_path, $nama_dokumen);
    return true;
  }

  function download_dokumen_post()
  {
    $id_pendaftaran = safe_post('id_pendaftaran');
    $id_layanan = safe_post('id_layanan');
    $id_radiologi = safe_post('id_radiologi');
    $id_laboratorium = safe_post('id_laboratorium');
    $jenis_laboratorium = safe_post('jenis_laboratorium');
    $jenis_layanan = safe_post('jenis_layanan');


    $this->db->select('pd.id, DATE(pd.tanggal_daftar)tanggal_daftar, pd.id_pasien as no_rm, p.nama, pd.jenis_rawat')
      ->from('sm_pendaftaran pd')
      ->join('sm_pasien p', 'pd.id_pasien = p.id')
      ->where('pd.id', $id_pendaftaran);

    $data_pasien = $this->db->get()->row();
    $folder_name = $data_pasien->tanggal_daftar . ' - ' . $data_pasien->nama . ' (' . $data_pasien->no_rm . ')';
    $jenis_rawat = $data_pasien->jenis_rawat;

    $upload_path = FCPATH . 'resources/dokumen_casemix/' . $folder_name . '/';

    if (!is_dir($upload_path)) {
      mkdir($upload_path, 0777, true);
    }

    $billing        = new Rekap_billing;
    $icd_x_resume   = new Pengkodean_icd_x;
    $casemix        = new Casemix;
    $pelayanan      = new Pelayanan;

    $data_billing       = $billing->printing_rincian_billing($id_pendaftaran, 'data');
    $data_resume_ranap  = $icd_x_resume->cetak_resume_medis_ranap($id_layanan, $id_pendaftaran, 'data');
    $data_resume_icare  = $icd_x_resume->cetak_resume_medis_intensive_care($id_layanan, $id_pendaftaran, 'data');
    $data_resume        = $casemix->cetak_resume_medis($id_layanan, $id_pendaftaran, 'data');

    $id_cppt = $this->db->get_where('sm_cppt', ['id_layanan_pendaftaran' => $id_layanan])->row()->id ?? null;
    $data['cppt'] = true;
    if (!empty($id_cppt)) {
      $data_cppt          = $pelayanan->printing_cppt($id_pendaftaran, $id_layanan, 'data');
      $file_name_cppt = $data_pasien->no_rm . " - CPPT";
      $html_cppt      = $this->load->view('download/cppt', $data_cppt, true);

      $data['cppt'] = $this->createdDomPDF($html_cppt, $upload_path, $file_name_cppt);

      // $cppt = array(
      //     array(
      //         'file_name' => $data_pasien->no_rm . " - CPPT",
      //         'html'      => $this->load->view('download/cppt', $data_cppt, true),
      //     )
      // );
    }

    // var_dump($id_cppt);
    // die;
    if ($data['cppt']) {
      if ($jenis_rawat == 'Inap') {
        if ($jenis_layanan !== 'Intensive Care') {
          $view_resume = 'resume_medis_ri';
          $data_resume_view = $data_resume_ranap;
        } else {
          $view_resume = 'resume_medis_intensive_care';
          $data_resume_view = $data_resume_icare;
        }

        $file_name_resume_ranap = $data_pasien->no_rm . " - Resume Medis";
        $html_resume_ranap      = $this->load->view('download/' . $view_resume, $data_resume_view, true);
        $data['resume'] = $this->createdDomPDF($html_resume_ranap, $upload_path, $file_name_resume_ranap);

        // $resume_medis = array(
        //     array(
        //         'file_name' => $data_pasien->no_rm . " - Resume Medis",
        //         'html'      => $this->load->view('download/' . $view_resume, $data_resume_view, true),
        //     )
        // );
      } else {
        $view_resume = 'resume_medis';
        $data_resume_view = $data_resume;

        $file_name_resume_rajal = $data_pasien->no_rm . " - Resume Medis";
        $html_resume_rajal      = $this->load->view('download/' . $view_resume, $data_resume_view, true);
        $data['resume'] = $this->createdDomPDF($html_resume_rajal, $upload_path, $file_name_resume_rajal);

        // $resume_medis = array(
        //     array(
        //         'file_name' => $data_pasien->no_rm . " - Resume Medis",
        //         'html'      => $this->load->view('download/' . $view_resume, $data_resume_view, true),
        //     )
        // );
      }
      if ($data['resume']) {

        $file_name_billing = $data_pasien->no_rm . " - Rincian Billing";
        $html_billing      = $this->load->view('download/rincian_billing', $data_billing, true);
        $data['rekap_billing'] = $this->createdDomPDF($html_billing, $upload_path, $file_name_billing);
      }
    }
    // $rekap_billing = array(
    //     array(
    //         'file_name' => $data_pasien->no_rm . " - Rincian Billing",
    //         'html'      => $this->load->view('download/rincian_billing', $data_billing, true),
    //     )
    // );

    // $documents = array_merge($rekap_billing, $resume_medis);

    // // var_dump($documents); die;
    // foreach ($documents as $document) {
    //     $html = $document['html'];
    //     $nama_dokumen = $document['file_name'];
    //     // $this->creatTCPDF($html, $upload_path, $nama_dokumen);
    //     $this->createdDomPDF($html, $upload_path, $nama_dokumen);
    // }

    // $this->processDocuments($documents, 0, $upload_path);

    // $this->deletedFolderZip($folder_name, $upload_path);
    if ($data) :
      $this->response($data, REST_Controller::HTTP_OK);
    endif;
  }

  private function deletedFolderZip($folder_name, $upload_path)
  {
    $zip_name = $folder_name . '.zip';
    $zip_path = FCPATH . 'resources/dokumen_casemix/' . $zip_name;
    $this->createZipArchive($upload_path, $zip_path);

    $this->deleteDirectory($upload_path);

    if (file_exists($zip_path)) {
      $this->load->helper('download');
      force_download($zip_path, NULL);

      $this->deleteDirectory(FCPATH . 'resources/dokumen_casemix/');
      // unlink($zip_path);
    }
  }
}
