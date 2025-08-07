<?php
defined('BASEPATH') or exit('No direct script access allowed');

// require_once APPPATH . 'third_party/dompdf/autoload.inc.php';
require_once 'vendor/autoload.php';

use Dompdf\Dompdf;
use Dompdf\Options;

class Download_pdf
{
  private $dompdf;

  public function __construct()
  {
    $options = new Options();
    $options->set('isPhpEnabled', true); // Aktifkan PHP di dalam HTML
    $options->set('isRemoteEnabled', true);
    $options->set('isFontSubsettingEnabled', true);

    // Ganti dengan path font yang Anda ingin gunakan
    $font_path = base_url() . 'vendor/dompdf/dompdf/fonts/verdana.ttf';
    $options->set('fontPath', $font_path);
    $options->set('fontFamily', 'Verdana');

    // $this->pdf->set_option('defaultMediaType', 'all');

    $this->dompdf = new Dompdf($options);
  }

  public function generatePdf($html, $upload_path, $nama_dokumen)
  {
    $this->dompdf->loadHtml($html);
    $this->dompdf->setPaper('A4', 'portrait');
    $this->dompdf->render();

    // var_dump($output_path);
    // die;
    $file_name = $nama_dokumen . '.pdf';
    $file_path = $upload_path . $file_name;
    $output = $this->dompdf->output();

    file_put_contents($file_path, $output);

    // return $file_path;
  }
}
