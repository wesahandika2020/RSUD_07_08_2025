<?php

use setasign\Fpdi\Tcpdf\Fpdi;
use \Mpdf\Mpdf;
use Spatie\PdfToImage\Pdf;


defined('BASEPATH') or exit('No direct script access allowed');
// require_once 'vendor/setasign/fpdi/src/fpdi.php';
require_once APPPATH . 'modules/rekap_billing/controllers/Rekap_billing.php';
require_once APPPATH . 'modules/pengkodean_icd_x/controllers/Pengkodean_icd_x.php';
require_once APPPATH . 'modules/pengkodean_icd_x/controllers/api/Eklaim.php';
require_once APPPATH . 'modules/casemix/controllers/Casemix.php';
require_once APPPATH . 'modules/pelayanan/controllers/Pelayanan.php';
require_once APPPATH . 'modules/pemeriksaan_hemo/controllers/Pemeriksaan_hemo.php';
require_once APPPATH . 'modules/order_operasi/controllers/Order_operasi.php';
require_once APPPATH . 'modules/hasil_radiologi/controllers/Hasil_radiologi.php';
require_once APPPATH . 'modules/hasil_laboratorium/controllers/Hasil_laboratorium.php';
require_once APPPATH . 'modules/vclaim_bpjs/controllers/Vclaim_bpjs_v2.php';
require_once APPPATH . 'modules/pendaftaran_igd/controllers/Pendaftaran_igd.php';
require_once APPPATH . 'modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php';
require_once APPPATH . 'modules/gizi/controllers/Gizi.php';
require_once APPPATH . 'modules/cloud_rsud/controllers/Cloud_rsud_api.php';
// require_once APPPATH . 'modules/cloud_rsud/controllers/api/Cloud_rsud.php';

class Folder_pasien extends SYAM_Controller
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
        $this->load->model('hasil_radiologi/Hasil_radiologi_model', 'm_hasil_radiologi');
        $this->load->model('hasil_laboratorium/Hasil_laboratorium_model', 'lab_model');
        $this->load->model('hasil_laboratorium/Hasil_laboratorium_pa_model', 'lab_pa');
        $this->load->model('pengkodean_icd_x/Pengkodean_icd_x_model', 'm_pengkodean_icd_x');
        $this->load->model('pemeriksaan_hemo/Pemeriksaan_hemo_model', 'm_pemeriksaan_hemo');
        $this->load->model('order_operasi/Order_operasi_model', 'm_order_operasi');
        $this->load->model('pendaftaran_igd/Pendaftaran_igd_model', 'm_pedaftaran_igd');
        $this->load->model('rekam_medis/Rekam_medis_model', 'rekam_medis');
        $this->load->model('pemeriksaan_poli/Pemeriksaan_poli_model', 'm_pemeriksaan_poli');
        $this->load->model('pemeriksaan_poli/Protokol_terapi_model', 'protokol');
        $this->load->model('gizi/Gizi_model', 'gizi');
        $this->load->model('cloud_rsud/Cloud_rsud_model', 'cloud_rsud');

        $this->load->model('pelayanan/Pelayanan_model', 'm_pelayanan');
        $data_lis = $this->m_pelayanan->getLIS();

        $this->url = $data_lis->url;
        $this->user = $data_lis->user;
        $this->pass = $data_lis->pass;

        // $this->load->model('Folder_pasien_model', 'm_folder');

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

    function createdDomPDF($html, $upload_path, $nama_dokumen)
    {
        set_time_limit(300);
        ini_set('memory_limit', '512M');

        $this->load->library('download_pdf');

        $this->download_pdf->generatePdf($html, $upload_path, $nama_dokumen);
    }

    function download_dokumen($id_pendaftaran, $id_layanan, $id_radiologi, $id_laboratorium, $jenis_laboratorium, $jenis_layanan)
    {
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
        $cppt = [];
        if (!empty($id_cppt)) {
            $data_cppt          = $pelayanan->printing_cppt($id_pendaftaran, $id_layanan, 'data');
            $file_name_cppt = $data_pasien->no_rm . " - CPPT";
            $html_cppt      = $this->load->view('download/cppt', $data_cppt, true);

            $this->createdDomPDF($html_cppt, $upload_path, $file_name_cppt);

            // $cppt = array(
            //     array(
            //         'file_name' => $data_pasien->no_rm . " - CPPT",
            //         'html'      => $this->load->view('download/cppt', $data_cppt, true),
            //     )
            // );
        }

        // var_dump($id_cppt);
        // die;

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
            $this->createdDomPDF($html_resume_ranap, $upload_path, $file_name_resume_ranap);

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
            $this->createdDomPDF($html_resume_rajal, $upload_path, $file_name_resume_rajal);

            // $resume_medis = array(
            //     array(
            //         'file_name' => $data_pasien->no_rm . " - Resume Medis",
            //         'html'      => $this->load->view('download/' . $view_resume, $data_resume_view, true),
            //     )
            // );
        }

        $file_name_billing = $data_pasien->no_rm . " - Rincian Billing";
        $html_billing      = $this->load->view('download/rincian_billing', $data_billing, true);
        $this->createdDomPDF($html_billing, $upload_path, $file_name_billing);

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

    function processDocuments($documents, $index, $upload_path)
    {
        if ($index >= count($documents)) {
            // Base case: semua dokumen telah diproses
            return;
        }

        $document = $documents[$index];
        $html = $document['html'];
        $nama_dokumen = $document['file_name'];

        // Callback untuk dipanggil setelah pembuatan PDF selesai
        $callback = function () use ($documents, $index, $upload_path) {
            // Proses dokumen berikutnya setelah selesai
            $this->processDocuments($documents, $index + 1, $upload_path);
        };

        // Proses dokumen saat ini
        // $this->creatTCPDF($html, $upload_path, $nama_dokumen, $callback);
    }


    function download_cppt($id_pendaftaran, $id_layanan, $id_radiologi, $id_laboratorium, $jenis_laboratorium, $jenis_layanan)
    {
        $this->db->select('pd.id, DATE(pd.tanggal_daftar)tanggal_daftar, pd.id_pasien as no_rm, p.nama, pd.jenis_rawat')
            ->from('sm_pendaftaran pd')
            ->join('sm_pasien p', 'pd.id_pasien = p.id')
            ->where('pd.id', $id_pendaftaran);

        $data_pasien = $this->db->get()->row();
        $folder_name = $data_pasien->tanggal_daftar . ' - ' . $data_pasien->nama . ' (' . $data_pasien->no_rm . ')';

        $upload_path = FCPATH . 'resources/dokumen_casemix/' . $folder_name . '/';

        if (!is_dir($upload_path)) {
            mkdir($upload_path, 0777, true);
        }

        $pelayanan      = new Pelayanan;

        $id_cppt = $this->db->get_where('sm_cppt', ['id_layanan_pendaftaran' => $id_layanan])->row()->id ?? null;
        if (!empty($id_cppt)) {
            $data_cppt          = $pelayanan->printing_cppt($id_pendaftaran, $id_layanan, 'data');
            $file_name_cppt = $data_pasien->no_rm . " - CPPT";
            $html_cppt      = $this->load->view('download/cppt', $data_cppt, true);

            $this->createdDomPDF($html_cppt, $upload_path, $file_name_cppt);
        }
    }

    function download_resume($id_pendaftaran, $id_layanan, $id_radiologi, $id_laboratorium, $jenis_laboratorium, $jenis_layanan)
    {
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

        $icd_x_resume   = new Pengkodean_icd_x;
        $casemix        = new Casemix;

        $data_resume_ranap  = $icd_x_resume->cetak_resume_medis_ranap($id_layanan, $id_pendaftaran, 'data');
        $data_resume_icare  = $icd_x_resume->cetak_resume_medis_intensive_care($id_layanan, $id_pendaftaran, 'data');
        $data_resume        = $casemix->cetak_resume_medis($id_layanan, $id_pendaftaran, 'data');

        if ($jenis_rawat == 'Inap') {
            if ($jenis_layanan !== 'Intensive%20Care') {
                $view_resume = 'resume_medis_ri';
                $data_resume_view = $data_resume_ranap;
            } else {
                $view_resume = 'resume_medis_intensive_care';
                $data_resume_view = $data_resume_icare;
            }

            $file_name_resume_ranap = $data_pasien->no_rm . " - Resume Medis";
            $html_resume_ranap      = $this->load->view('download/' . $view_resume, $data_resume_view, true);
            $this->createdDomPDF($html_resume_ranap, $upload_path, $file_name_resume_ranap);
        } else {
            $view_resume = 'resume_medis';
            $data_resume_view = $data_resume;

            $file_name_resume_rajal = $data_pasien->no_rm . " - Resume Medis";
            $html_resume_rajal      = $this->load->view('download/' . $view_resume, $data_resume_view, true);
            $this->createdDomPDF($html_resume_rajal, $upload_path, $file_name_resume_rajal);
        }
    }

    function download_billing($id_pendaftaran, $id_layanan, $id_radiologi, $id_laboratorium, $jenis_laboratorium, $jenis_layanan)
    {
        $this->db->select('pd.id, DATE(pd.tanggal_daftar)tanggal_daftar, pd.id_pasien as no_rm, p.nama, pd.jenis_rawat')
            ->from('sm_pendaftaran pd')
            ->join('sm_pasien p', 'pd.id_pasien = p.id')
            ->where('pd.id', $id_pendaftaran);

        $data_pasien = $this->db->get()->row();
        $folder_name = $data_pasien->tanggal_daftar . ' - ' . $data_pasien->nama . ' (' . $data_pasien->no_rm . ')';

        $upload_path = FCPATH . 'resources/dokumen_casemix/' . $folder_name . '/';

        if (!is_dir($upload_path)) {
            mkdir($upload_path, 0777, true);
        }

        $billing        = new Rekap_billing;
        $data_billing       = $billing->printing_rincian_billing($id_pendaftaran, 'data');

        $file_name_billing = $data_pasien->no_rm . " - Rincian Billing";
        $html_billing      = $this->load->view('download/rincian_billing', $data_billing, true);
        $this->createdDomPDF($html_billing, $upload_path, $file_name_billing);
    }

    function download_radiologi($id_pendaftaran, $id_layanan, $id_radiologi, $id_laboratorium, $jenis_laboratorium, $jenis_layanan)
    {
        $this->db->select('pd.id, DATE(pd.tanggal_daftar)tanggal_daftar, pd.id_pasien as no_rm, p.nama, pd.jenis_rawat')
            ->from('sm_pendaftaran pd')
            ->join('sm_pasien p', 'pd.id_pasien = p.id')
            ->where('pd.id', $id_pendaftaran);

        $data_pasien = $this->db->get()->row();
        $folder_name = $data_pasien->tanggal_daftar . ' - ' . $data_pasien->nama . ' (' . $data_pasien->no_rm . ')';

        $upload_path = FCPATH . 'resources/dokumen_casemix/' . $folder_name . '/';

        if (!is_dir($upload_path)) {
            mkdir($upload_path, 0777, true);
        }

        if ($id_radiologi !== 'null') {
            $radiologi        = new Hasil_radiologi;

            $this->db->select('*');
            $this->db->from('sm_detail_radiologi');
            $this->db->where('id_radiologi', $id_radiologi);
            $this->db->group_start();
            $this->db->where('hasil !=', '');
            $this->db->or_where('html !=', '');
            $this->db->group_end();

            $hasil_radiologi = $this->db->get()->row()->id ?? null;
            if (!empty($hasil_radiologi)) {
                $data_radiologi      = $radiologi->printing_hasil_radiologi($id_radiologi, 'data');
                $file_name_cppt      = $data_pasien->no_rm . " - Hasil Radiologi";
                $html_radiologi      = $this->load->view('download/hasil_radiologi', $data_radiologi, true);

                $this->createdDomPDF($html_radiologi, $upload_path, $file_name_cppt);
            }
        }
    }

    function download_laboratorium($id_pendaftaran, $id_layanan, $id_radiologi, $id_laboratorium, $jenis_laboratorium, $jenis_layanan)
    {
        $this->db->select('pd.id, DATE(pd.tanggal_daftar)tanggal_daftar, pd.id_pasien as no_rm, p.nama, pd.jenis_rawat')
            ->from('sm_pendaftaran pd')
            ->join('sm_pasien p', 'pd.id_pasien = p.id')
            ->where('pd.id', $id_pendaftaran);

        $data_pasien = $this->db->get()->row();
        $folder_name = $data_pasien->tanggal_daftar . ' - ' . $data_pasien->nama . ' (' . $data_pasien->no_rm . ')';

        $upload_path = FCPATH . 'resources/dokumen_casemix/' . $folder_name . '/';

        if (!is_dir($upload_path)) {
            mkdir($upload_path, 0777, true);
        }

        if ($id_laboratorium !== 'null') {

            $laboratorium = new Hasil_laboratorium;
            $casemix = new Casemix;
            $hasil_laboratorium = $this->db->get_where('sm_item_detail_laboratorium', ['id' => $id_laboratorium])->row()->id ?? null;

            if (!empty($hasil_laboratorium)) {
                if ($jenis_laboratorium = '1') {
                    $data_laboratorium = $casemix->printing_hasil_laboratorium($id_pendaftaran, 'data');
                    $html_laboratorium      = $this->load->view('download/cetak_hasil_laboratorium', $data_laboratorium, true);
                    $file_name_cppt      = $data_pasien->no_rm . " - Hasil laboratorium";

                    $this->createdDomPDF($html_laboratorium, $upload_path, $file_name_cppt);
                } elseif ($jenis_laboratorium = '2') {
                    $data_laboratorium = $laboratorium->printing_hasil_laboratorium_pa($id_laboratorium, 'data');
                    $html_laboratorium      = $this->load->view('download/hasil_laboratorium_pa', $data_laboratorium, true);
                    $file_name_cppt      = $data_pasien->no_rm . " - Hasil laboratorium";
                    $this->createdDomPDF($html_laboratorium, $upload_path, $file_name_cppt);
                } elseif ($jenis_laboratorium = '3') {
                    $data_laboratorium = $laboratorium->printing_hasil_laboratorium_mb($id_laboratorium, 'data');
                    $html_laboratorium      = $this->load->view('download/hasil_laboratorium_mb', $data_laboratorium, true);
                    $file_name_cppt      = $data_pasien->no_rm . " - Hasil laboratorium";
                    $this->createdDomPDF($html_laboratorium, $upload_path, $file_name_cppt);
                }
            }
        }
    }

    function download_zip($id_pendaftaran, $id_layanan, $id_radiologi, $id_laboratorium, $jenis_laboratorium, $jenis_layanan)
    {
        $this->db->select('pd.id, DATE(pd.tanggal_daftar)tanggal_daftar, pd.id_pasien as no_rm, p.nama, pd.jenis_rawat')
            ->from('sm_pendaftaran pd')
            ->join('sm_pasien p', 'pd.id_pasien = p.id')
            ->where('pd.id', $id_pendaftaran);

        $data_pasien = $this->db->get()->row();
        $folder_name = $data_pasien->tanggal_daftar . ' - ' . $data_pasien->nama . ' (' . $data_pasien->no_rm . ')';
        $upload_path = FCPATH . 'resources/dokumen_casemix/' . $folder_name . '/';

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

    function download_margepdf($id_pendaftaran, $id_layanan, $id_radiologi, $id_laboratorium, $jenis_laboratorium, $jenis_layanan)
    {
        $this->db->select('pd.id, pd.no_sep, DATE(pd.tanggal_daftar)tanggal_daftar, pd.id_pasien as no_rm, p.nama, pd.jenis_rawat')
            ->from('sm_pendaftaran pd')
            ->join('sm_pasien p', 'pd.id_pasien = p.id')
            ->where('pd.id', $id_pendaftaran);

        $data_pasien = $this->db->get()->row();

        $folder_name = $data_pasien->tanggal_daftar . ' - ' . $data_pasien->nama . ' (' . $data_pasien->no_rm . ')';
        $file_name = $data_pasien->no_sep . ' - ' . $data_pasien->nama . ' (' . $data_pasien->no_rm . ')';
        $pdfDirectory = FCPATH . 'resources/dokumen_casemix/' . $folder_name . '/';

        // Daftar file PDF dalam direktori
        $pdfFiles = glob($pdfDirectory . '*.pdf');

        // Inisialisasi TCPDF
        $pdf = new Fpdi();
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);

        foreach ($pdfFiles as $pdfFile) {
            $pageCount = $pdf->setSourceFile($pdfFile);
            for ($pageNo = 1; $pageNo <= $pageCount; $pageNo++) {
                $pdf->AddPage();
                $templateId = $pdf->importPage($pageNo);
                $pdf->useTemplate($templateId);
            }
        }

        // Simpan file PDF gabungan
        $outputFilePath = $pdfDirectory . $file_name . '.pdf';
        $pdf->Output($outputFilePath, 'F');

        if (file_exists($outputFilePath)) {
            $this->load->helper('download');
            force_download($outputFilePath, NULL);

            $this->deleteDirectory(FCPATH . 'resources/dokumen_casemix/');
            // unlink($zip_path);
        }
    }

    private function confertPdftoImg($pdf)
    {
        $url = 'http://192.168.77.101/api/file-upload/convertPdftoImage';
        $data = ['nama_file' => $pdf];

        $output = postCurl($url, $data);
        $output = json_decode($output);

        return $output;
    }

    
    function preview_dokumen($id_pendaftaran, $id_layanan, $id_radiologi, $id_laboratorium, $jenis_laboratorium, $jenis_layanan){
        set_time_limit(300);

        $this->db->select('pd.id, pd.no_sep, DATE(pd.tanggal_daftar)tanggal_daftar, pd.id_pasien as no_rm, p.nama, pd.jenis_rawat')
            ->from('sm_pendaftaran pd')
            ->join('sm_pasien p', 'pd.id_pasien = p.id')
            ->where('pd.id', $id_pendaftaran);

        $data_pasien = $this->db->get()->row();
        $jenis_rawat = $data_pasien->jenis_rawat;

        $data_sep           = "";
        $data_eklaim        = [];
        $data_resume        = "";
        $data_resume_ranap  = "";
        $data_resume_icare  = "";
        $data_triase_igd    = "";
        $data_dietetik      = [];
        $data_konsul_gizi   = [];
        $data_gizi_anak     = [];
        $data_asuhan_hd     = [];
        $data_hemodialisa   = [];
        $data_operasi       = [];
        $data_laboratorium  = "";
        $data_radiologi     = [];
        $data_lap_tindakan  = [];
        $data_spr           = [];
        $data_file_upload   = [];
        $data_sitb          = [];
        $data_file_lain     = [];
        $data_billing       = "";
        $data_jenis_lab     = $jenis_laboratorium;

        // Data HTML
        $billing        = new Rekap_billing;
        $eklaim         = new Eklaim;
        $icd_x_resume   = new Pengkodean_icd_x;
        $casemix        = new Casemix;
        $sep            = new Vclaim_bpjs_v2;
        // $spri           = new Pendaftaran_igd;

        $spr            = new Pemeriksaan_poli;
        $pendaftaran_igd = new Pendaftaran_igd;
        // $pelayanan      = new Pelayanan;

        if (!empty($data_pasien->no_sep)) {
            $data_sep       = $sep->nota_sep($data_pasien->no_sep, 'data');

            $_eklaim        = $eklaim->claim_print($data_pasien->no_sep);

            if ($_eklaim['metadata']['code'] !== 200) {
                $data_eklaim = [];
            } else {
                $pdfBinary  = $_eklaim['data'];
                $imageKlaim = $this->confertPdftoImg($pdfBinary);

                if ($imageKlaim->metadata->success !== true) {
                    $pathImage = [];
                } else {
                    $pathImage = $imageKlaim->data;
                }

                $data_eklaim = $pathImage;
            }
        }

        $data_billing       = $billing->printing_rincian_billing($id_pendaftaran, 'data');

            // var_dump($billing);die;

        // Resume Medis
        if ($jenis_rawat == 'Inap') {
            if ($jenis_layanan !== 'Intensive%20Care') {
                $data_resume_ranap  = $icd_x_resume->cetak_resume_medis_ranap($id_layanan, $id_pendaftaran, 'data');
            } else {
                $data_resume_icare  = $icd_x_resume->cetak_resume_medis_intensive_care($id_layanan, $id_pendaftaran, 'data');
            }
        } else {
            // $data_resume = $spr->cetak_resume_medis($id_layanan, 'data');
            $data_resume = $casemix->cetak_resume_medis($id_layanan, $id_pendaftaran, 'data');
            // var_dump($data_resume);die;
        }

        // Triase IGD
        // if($jenis_rawat === 'Jalan'){ // tambahan (triase dikeluarin kalau rawat jalan aja)
            $get_triase_igd = $pendaftaran_igd->getDataTriaseIGD($id_pendaftaran);
            if (!empty($get_triase_igd)) {
                $data_triase_igd = $pendaftaran_igd->cetak_triase_pasien_gawat_darurat($id_pendaftaran, 'data');
            } else {
                $data_triase_igd = '';
            }
        // }

        // Asuhan Keperawatan HD
        $asuhan_hd = new Pemeriksaan_hemo;
        $get_asuhan_hd = $asuhan_hd->getDataAsuhanHD($id_pendaftaran);

        if (!empty($get_asuhan_hd)) {
            foreach ($get_asuhan_hd as $val) {
                $data_asuhan_hd[] = $asuhan_hd->data_printing_asuhan_keperawatan($val->id, $id_pendaftaran, $val->id_layanan_pendaftaran);
            }
        }

        // Gizi Dietetik
        $gizi = new Gizi;
        $get_gizi_dietetik = $gizi->data_cetak_dietetik($id_pendaftaran);

        if (!empty($get_gizi_dietetik)) {
            foreach ($get_gizi_dietetik as $val) {
                $data_dietetik[] = $gizi->cetak_dietetik($val->id_gd, $id_pendaftaran, $val->id_layanan_pendaftaran, 'data');
            }
        }
        
        // Gizi Konsultasi
        $get_konsultasi_gizi = $gizi->data_konsultasi_gizi($id_pendaftaran);

        if (!empty($get_konsultasi_gizi)) {
            foreach ($get_konsultasi_gizi as $val) {
                $data_konsul_gizi[] = $gizi->cetak_konsultasi_gizi($val->id_kg, $id_pendaftaran, $val->id_layanan_pendaftaran, 'data');
            }
        }

        // Gizi Anak
        $get_gizi_anak = $gizi->data_diet_anak($id_pendaftaran);

        if (!empty($get_gizi_anak)) {
            foreach ($get_gizi_anak as $val) {
                $data_gizi_anak[] = $gizi->cetak_diet_anak($val->id_ga, $id_pendaftaran, $val->id_layanan_pendaftaran, null, 'data');
            }
        }

        // Surat Pengantar Rawat
        $get_spr = $this->m_pemeriksaan_poli->getSuratPengantarRawat($id_pendaftaran);
        if (!empty($get_spr)) {
            $data_spr = $spr->cetak_surat_pengantar_rawat($id_pendaftaran, 'data');
        } else {
            $data_spr = [];
        }

        // Hasil Laboratorium
        if ($id_laboratorium !== 'null') {
            // $laboratorium   = new Hasil_laboratorium;
            $hasil_laboratorium = $this->db->get_where('sm_item_detail_laboratorium', ['id' => $id_laboratorium])->row()->id ?? null;
            if (!empty($hasil_laboratorium)) {
                $data_laboratorium = $casemix->printing_hasil_laboratorium($id_pendaftaran, 'data');
            }
        }

        // Hasil Radiologi
        $sql = "SELECT rd.* FROM sm_radiologi AS rd
                JOIN sm_layanan_pendaftaran AS lp ON rd.id_layanan_pendaftaran = lp.id
                WHERE lp.id_pendaftaran = '" . $id_pendaftaran . "'";

        $data_list_radiologi = $this->db->query($sql)->result();

        if (!empty($data_list_radiologi)) {
            $radiologi = new Hasil_radiologi;

            foreach ($data_list_radiologi as $val) {
                $data_radiologi[] = $radiologi->printing_hasil_radiologi($val->id, 'data');
            }
        }

        // Hasil Hemodialisa
        $sql = "SELECT lh.* FROM sm_laporan_hd AS lh
                JOIN sm_layanan_pendaftaran AS lp ON lh.id_layanan_pendaftaran = lp.id
                WHERE lp.id_pendaftaran = '" . $id_pendaftaran . "'";

        $data_list_hd = $this->db->query($sql)->result();

        if (!empty($data_list_hd)) {
            $hemmodialisa = new Pemeriksaan_hemo;

            foreach ($data_list_hd as $val) {
                $data_hemodialisa[] = $hemmodialisa->data_printing_laporan_hemodialisa($val->id, $id_pendaftaran, $val->id_layanan_pendaftaran);
            }
        }

        // Hasil Operasi
        $sql = "SELECT lo.* FROM sm_laporan_operasi AS lo
                JOIN sm_layanan_pendaftaran AS lp ON lo.id_layanan_pendaftaran = lp.id
                WHERE lp.id_pendaftaran = '" . $id_pendaftaran . "'";

        $data_list_operasi = $this->db->query($sql)->result();

        if (!empty($data_list_operasi)) {
            $operasi = new Order_operasi;

            foreach ($data_list_operasi as $val) {
                $data_operasi[] = $operasi->laporan_operasi($val->id, $id_pendaftaran, $val->id_layanan_pendaftaran, 'data');
            }
        }

        // Laporan Tindakan
        $sql = "SELECT lt.* FROM sm_laporan_tindakan AS lt
                WHERE lt.id_pendaftaran = '" . $id_pendaftaran . "'";

        $data_list_lo = $this->db->query($sql)->result();

        if (!empty($data_list_lo)) {
            $lap_tindakan = new Order_operasi;

            foreach ($data_list_lo as $val) {
                $data_lap_tindakan[] = $lap_tindakan->laporan_tindakan($val->id, $id_pendaftaran, $val->id_layanan_pendaftaran, 'data');
            }
        }

        $list_file_upload = new Cloud_rsud_api;
        $data_file_upload = $list_file_upload->get_file_upload_pasien($id_pendaftaran, $data_pasien->no_rm);

        $data['title_file_download'] = (!empty($data_pasien->no_sep) ? $data_pasien->no_sep . ' - ' : '') . $data_pasien->nama . ' (' . $data_pasien->no_rm . ')';
        $data['data_sep']           = $data_sep;
        $data['data_eklaim']        = $data_eklaim;
        $data['data_resume']        = $data_resume;
        $data['data_resume_ranap']  = $data_resume_ranap;
        $data['data_resume_icare']  = $data_resume_icare;
        $data['data_triase']        = $data_triase_igd;
        $data['data_asuhan_hd']     = $data_asuhan_hd;
        $data['data_dietetik']      = $data_dietetik;
        $data['data_konsul_gizi']   = $data_konsul_gizi;
        $data['data_gizi_anak']     = $data_gizi_anak;
        $data['data_hemodialisa']   = $data_hemodialisa;
        $data['data_operasi']       = $data_operasi;
        $data['data_lap_tindakan']  = $data_lap_tindakan;
        $data['jenis_lab']          = $data_jenis_lab;
        $data['data_laboratorium']  = $data_laboratorium;
        $data['data_radiologi']     = $data_radiologi;
        $data['data_spr']           = $data_spr;
        $data['data_file_upload']   = $data_file_upload;
        $data['data_billing']       = $data_billing;

            // var_dump($data['data_resume'] );die;
        $this->load->view('download/all_dokumen', $data);
    }



    function checkURL($url)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_NOBODY, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        return $httpCode;
    }

    function view_hasil_radiologi($id_pendaftaran, $id_layanan)
    {
        set_time_limit(300);

        $this->db->select('pd.id, pd.no_sep, DATE(pd.tanggal_daftar)tanggal_daftar, pd.id_pasien as no_rm, p.nama, pd.jenis_rawat')
            ->from('sm_pendaftaran pd')
            ->join('sm_pasien p', 'pd.id_pasien = p.id')
            ->where('pd.id', $id_pendaftaran);

        $data_pasien = $this->db->get()->row();
        $jenis_rawat = $data_pasien->jenis_rawat;

        $data_radiologi     = [];

        // Hasil Radiologi
        $sql = "SELECT rd.* FROM sm_radiologi AS rd
                JOIN sm_layanan_pendaftaran AS lp ON rd.id_layanan_pendaftaran = lp.id
                WHERE lp.id_pendaftaran = '" . $id_pendaftaran . "'";

        $data_list_radiologi = $this->db->query($sql)->result();

        if (!empty($data_list_radiologi)) {
            $radiologi = new Hasil_radiologi;

            foreach ($data_list_radiologi as $val) {
                $data_radiologi[] = $radiologi->printing_hasil_radiologi($val->id, 'data');
            }
        }

        $data['title_file_download'] = (!empty($data_pasien->no_sep) ? $data_pasien->no_sep . ' - ' : '') . $data_pasien->nama . ' (' . $data_pasien->no_rm . ')';
        $data['data_radiologi']     = $data_radiologi;

        $this->load->view('download/view_hasil_radiologi', $data);
    }

    function view_hasil_laboratorium($id_pendaftaran, $id_layanan)
    {
        set_time_limit(300);

        $this->db->select('pd.id, pd.no_sep, DATE(pd.tanggal_daftar)tanggal_daftar, pd.id_pasien as no_rm, p.nama, pd.jenis_rawat')
            ->from('sm_pendaftaran pd')
            ->join('sm_pasien p', 'pd.id_pasien = p.id')
            ->where('pd.id', $id_pendaftaran);

        $data_pasien = $this->db->get()->row();

        // Hasil Laboratorium
        $sql = "SELECT DISTINCT lb.kode as ono, pd.id_pasien, lb.* FROM sm_laboratorium AS lb
                JOIN sm_layanan_pendaftaran AS lp ON lb.id_layanan_pendaftaran = lp.id
                JOIN sm_pendaftaran AS pd ON pd.id = lp.id_pendaftaran
                WHERE lp.id_pendaftaran = '" . $id_pendaftaran . "'";

        $data_list_laboratorium = $this->db->query($sql)->result();

        if (!empty($data_list_laboratorium)) {
            foreach ($data_list_laboratorium as $val) {
                $url = "http://10.10.10.11/rsud/" . $val->id_pasien . "_" . $val->kode . ".pdf";
                $statusCode = $this->checkURL($url);

                $val->code_link = $statusCode;
                if ($statusCode !== 200) {
                    $val->pesan_code = "Link tidak dapat diakses. Hasil Labaratorium belum di masukan.";
                } else {
                    $val->pesan_code = "";
                }
            }
        }


        $data['title_file_download'] = (!empty($data_pasien->no_sep) ? $data_pasien->no_sep . ' - ' : '') . $data_pasien->nama . ' (' . $data_pasien->no_rm . ')';
        $data['data_laboratorium']     = $data_list_laboratorium;

        $this->load->view('download/view_hasil_laboratorium', $data);
    }



}
