<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Esign_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->datetime = date('Y-m-d H:i:s');
    }

    function esign_pdf()
    {   
        $this->load->library('curl');
        
        // $username   = 'esign';
        // $password   = 'wrjcgX6526A2dCYSAV6u';
        // $nik        = '1234567890123456';
        // $passphrase = '#Bsr3DeVUser.!';
        // $url        = 'https://esign-dev.layanan.go.id/api/sign/pdf';

        $konfigurasi_esign = $this->db->get_where('sm_konfigurasi_esign', ['status' => 'development'])->row();
        $username   = $konfigurasi_esign->user;
        $password   = $konfigurasi_esign->pass;
        $nik        = $konfigurasi_esign->nik;
        $passphrase = $konfigurasi_esign->passphrase;
        $url        = $konfigurasi_esign->server . '/api/sign/pdf';

        $filePath   = FCPATH . 'uploads/contoh_ettd.pdf';
        $imagePath  = FCPATH . 'uploads/key_esign4.png';
        $outputFile = FCPATH . 'uploads/hasil_ttd_baruuuuuuuuuuussss.pdf';
    
        if (!file_exists($filePath)) {
            echo "Error: File PDF tidak ditemukan!";
            return;
        }
    
        if (!file_exists($imagePath)) {
            echo "Error: File tanda tangan tidak ditemukan!";
            return;
        }
    
        $authHeader = 'Authorization: Basic ' . base64_encode("$username:$password");
    
        $postData = [
            'file'          => new CURLFile($filePath, 'application/pdf', 'contoh_ettd.pdf'),
            'imageTTD'      => new CURLFile($imagePath, 'image/png', 'key.png'),
            'nik'           => $nik,
            'passphrase'    => $passphrase,
            'tampilan'      => 'visible',
            'tag_koordinat' => '$',
            'width'         => 100,
            'height'        => 200,
            'image'         => 'true'
        ];
    
        $curl = curl_init();
    
        curl_setopt_array($curl, [
            CURLOPT_URL            => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING       => '',
            CURLOPT_MAXREDIRS      => 10,
            CURLOPT_TIMEOUT        => 30,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION   => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST  => 'POST',
            CURLOPT_POSTFIELDS     => $postData,
            CURLOPT_HTTPHEADER     => [
                $authHeader,
                'Content-Type: multipart/form-data'
            ],
        ]);
    
        $response = curl_exec($curl);
        $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        curl_close($curl);
    
        if ($httpCode == 200 && !empty($response)) {
            // Simpan file hasil tanda tangan
            file_put_contents($outputFile, $response);
    
            // Kirim file sebagai unduhan
            // header('Content-Type: application/pdf');
            // header('Content-Disposition: attachment; filename="hasil_ttd.pdf"');
            // header('Content-Length: ' . filesize($outputFile));    
            // readfile($outputFile);

            // hapus file hasil tanda tangan
            // if (file_exists($outputFile)) {
            //     unlink($outputFile);
            // }
            exit;
        } else {
            echo "Gagal: HTTP Code " . $httpCode . " - Response: " . $response;
        }
    }
}