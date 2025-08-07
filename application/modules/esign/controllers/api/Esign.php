<?php
use setasign\Fpdi\Tcpdf\Fpdi;
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';

class Esign extends REST_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Esign_model', 'm_esign');
		
		//development / production_testing / production / prod_testing
		$this->status_esign = 'production';
    }

    function esign_pdf_get()
    {   
        $this->m_esign->esign_pdf();
    }
    
    function get_esign_get()
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
        $outputFile = FCPATH . 'uploads/hasil_ttd_baruuuuuuuuuuu.pdf';
    
        if (!file_exists($filePath)) {
            echo "Error: File PDF tidak ditemukan!";
            return;
        }
    
        if (!file_exists($imagePath)) {
            echo "Error: File tanda tangan tidak ditemukan!";
            return;
        }
    
        $authHeader = 'Authorization: Basic ' . base64_encode("$username:$password");
    
        // invisible visible
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

    function get_status_user_nik_get()
    {
        $nik = $this->get('nik');
        
        if (!$nik) {
            echo json_encode([
                'status' => false,
                'response' => 'NIK tidak boleh kosong !'
            ]);
            return;
        }

        $this->load->library('curl');
        $curl = curl_init();

        $konfigurasi_esign = $this->db->get_where('sm_konfigurasi_esign', ['status' => $this->status_esign])->row();
		if($this->status_esign != 'production'){
			$nik = $konfigurasi_esign->nik;
		}		
		
        $url = $konfigurasi_esign->server . '/api/user/status/' . $nik;

        curl_setopt_array($curl, array(
            CURLOPT_URL            => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING       => '',
            CURLOPT_MAXREDIRS      => 10,
            CURLOPT_TIMEOUT        => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION   => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST  => 'GET',
            CURLOPT_HTTPHEADER     => array(
                'Authorization: Basic dGVzdGluZzp0ZXN0aW5n'
            ),
        ));

        // dGVzdGluZzp0ZXN0aW5n
        $response = curl_exec($curl);
        $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        curl_close($curl);

        if ($httpCode == 200 && !empty($response)) {
            echo json_encode([
                'status' 	   => true,
				'status_esign' => $this->status_esign,
				'url' 		   => $url,
                'response' 	   => json_decode($response, true)
            ]);
        } else {
            echo json_encode([
                'status' 	   => false,
                'status_esign' => $this->status_esign,
				'url' 		   => $url,
                'http_code'    => $httpCode,
                'response' 	   => $response
            ]);
        }
    }
	
	// Cek Status User NIK Versi 2
    /*function get_status_user_nik_get()
    {   
        $nik = $this->get('nik');
        $this->load->library('curl');    
        $curl = curl_init();    

        //$nik = '1234567890123456'; //development
		$nik = '3271022004910006'; //production

        $payload = json_encode([
            'nik' => $nik
        ]);

		//development production prod
        $konfigurasi_esign = $this->db->get_where('sm_konfigurasi_esign', ['status' => 'production'])->row();
        $url = $konfigurasi_esign->server . '/api/v2/user/check/status';
    
        curl_setopt_array($curl, array(
            CURLOPT_URL            => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING       => '',
            CURLOPT_MAXREDIRS      => 10,
            CURLOPT_TIMEOUT        => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION   => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST  => 'POST',
            CURLOPT_POSTFIELDS     => $payload,
            CURLOPT_HTTPHEADER     => array(
                'Authorization: Basic ZXNpZ246d3JqY2dYNjUyNkEyZENZU0FWNnU=',
                'Content-Type: application/json',
                'Cookie: JSESSIONID=4C09DCE1A5790842C1D8A3F9BBEB65C7'
            ),
        ));
          
        $response = curl_exec($curl);
        $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);        
        curl_close($curl);

        if ($httpCode == 200 && !empty($response)) {
            echo json_encode([
                'status' => true,
                'response' => json_decode($response, true)
            ]);
        } else {
            echo json_encode([
                'status' => false,
                'response' => $response,
                'url' => $url
            ]);
        }
    }*/
    
}