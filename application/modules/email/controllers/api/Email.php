<?php

defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;
use setasign\Fpdi\Tcpdf\Fpdi;
use Dompdf\Dompdf;
use Dompdf\Options;
class Email extends REST_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->limit = 10;
        $this->datetime = date('Y-m-d H:i:s');
        $this->load->model('hasil_mcu_kirim_online/Hasil_mcu_kirim_online_model', 'm_mcu');
        $this->load->model('hasil_lab_kirim_wa/Hasil_lab_kirim_wa_model', 'm_lab');
        $this->id_translucent = $this->session->userdata('id_translucent');

        if (empty( $this->id_translucent)) :
            $this->response(array('error' => 'Anda belum login'), REST_Controller::HTTP_UNAUTHORIZED);
            exit();
        endif;
        
        // Email Initialize
        $this->protocol    = 'smtp';
        $this->smtp_host   = 'smtp.tangerangkota.go.id';
        $this->smtp_user   = 'rsud@tangerangkota.go.id';
        $this->smtp_pass   = 'Rsud2025#';
        $this->smtp_port   = 587;
        $this->smtp_crypto = 'tls';
        $this->mailtype    = 'html';
        $this->charset     = 'utf-8';
        $this->wordwrap    = TRUE ;
    }

    function kirim_email_lab_get() {

        $stop  = false;
        $id    = $this->get('id_pendaftaran');

        $this->db->query("
            INSERT INTO sm_lab_kirim_wa_log (id_lama, id_pendaftaran, id_pasien, nama_pasien, no_hp, pass, waktu_kirim, id_user, waktu_respon, respon, status,
                    keterangan, waktu_cek_file, jml_wa_berhasil, jml_email_berhasil, status_email, respon_email, waktu_respon_email )
            SELECT id AS id_lama, id_pendaftaran, id_pasien, nama_pasien, no_hp, pass, waktu_kirim, id_user, waktu_respon, respon, status,
                    'email', waktu_cek_file, jml_wa_berhasil, jml_email_berhasil, status_email, respon_email, waktu_respon_email 
                FROM sm_lab_kirim_wa
                WHERE id_pendaftaran = ?
        ", [$id]);


        $data  = $this->db->query($this->m_lab->dataKirimById($id))->row();

        $email_to     = $data->email;
        $lokasi_file  = explode(', ', $data->lokasi_file);        
        $tgl_layanan  = get_day($data->tanggal_layanan) .", ". get_date_format($data->tanggal_layanan);
        $nama_pasien  = $data->nama_pasien;
        $id_pasien    = $data->id_pasien;
        $password     = $data->tanggal_lahir;
        $no_register  = $data->no_register;

        if ($email_to === '' || empty($lokasi_file) || $tgl_layanan === '' || $nama_pasien === '' || $id_pasien === '') {
            return false;
        }
        
        $isi_pesan = $this->isi_pesan_hasil_lab($nama_pasien, $tgl_layanan);     
		$this->load->library('email');
		
		$this->email->initialize([
			'protocol'    => $this->protocol,
			'smtp_host'   => $this->smtp_host,
			'smtp_user'   => $this->smtp_user,
			'smtp_pass'   => $this->smtp_pass,
			'smtp_port'   => $this->smtp_port,
            'smtp_crypto' => $this->smtp_crypto,
			'mailtype'    => $this->mailtype,
			'charset'     => $this->charset,
			'wordwrap'    => $this->wordwrap
		]);

		$this->email->from('rsud@tangerangkota.go.id', 'RSUD');
		$this->email->to($email_to);
		$this->email->subject("Hasil Laboratorium RSUD Kota Tangerang");
		$this->email->message($isi_pesan);
		$file_urls = $lokasi_file;
		$temporary_files = []; 

		foreach ($file_urls as $index => $file_url) {
			// Ekstrak ekstensi file dari URL
			$file_extension = pathinfo($file_url, PATHINFO_EXTENSION);
			
			// Tentukan path file sementara
			$no = $index + 1;
			$local_file_path = "./uploads/hasil_lab_{$no}." . $file_extension;

			// Unduh file dari URL
			$file_content = file_get_contents($file_url);
			if ($file_content) {
				// Simpan file sementara
				file_put_contents($local_file_path, $file_content);
				$temporary_files[] = $local_file_path;

			} else {                
                $response = [
                    'status'  => FALSE, 
                    'message' => "Gagal mengunduh file dari URL"  
                    // 'message' => "Gagal mengunduh file dari URL: $file_url<br>"  
                ];
			}
		}

        // Download each file and store it temporarily
        foreach ($temporary_files as $url) {
            // $headers = get_headers($url, 1);
            // if (strpos($headers[0], '200') === false) {
            //     die(json_encode(["metaData" => ["status" => false, "code" => 400, "message" => "File pdf tidak ditemukan, silahkan hubungi LIS !", "no_hp" => $no_hp, "nama_pasien" => $nama_pasien, "tgl_layanan" => $tgl_layanan]]));
            // }
 
             $fileContent = file_get_contents($url);
            // if ($fileContent === false) {
            //     die(json_encode(["metaData" => ["status" => false, "code" => 400, "message" => "Gagal download file pdf. Silahkan ulangi lagi !", "no_hp" => $no_hp, "nama_pasien" => $nama_pasien, "tgl_layanan" => $tgl_layanan]]));
            // }
 
             $tempFilePath = sys_get_temp_dir() . DIRECTORY_SEPARATOR . basename($url);
             file_put_contents($tempFilePath, $fileContent);
             $temp_files[] = $tempFilePath;
             
         }


         // Menggabungkan file PDF
        $pdf = new Fpdi();
        foreach ($temp_files as $file) {
            $pageCount = $pdf->setSourceFile($file);
            for ($pageNo = 1; $pageNo <= $pageCount; $pageNo++) {
                $tplId = $pdf->importPage($pageNo);
                $size  = $pdf->getTemplateSize($tplId);
                $pdf->AddPage($size['orientation'], [$size['width'], $size['height']]);
                $pdf->useTemplate($tplId);
            }
        }
  
        // Memberikan proteksi password pada file hasil gabungan
        $pdf->SetProtection([], $password);

        // Simpan file PDF hasil gabungan
        $outputPath = sys_get_temp_dir() . DIRECTORY_SEPARATOR . $no_register . '_'.  'hasil_lab.pdf';
        $pdf->Output($outputPath, 'F');

        $this->email->attach($outputPath);
		// Kirim email
		if ($this->email->send()) {
            $response = [
                'status'  => TRUE, 
                'message' => "Hasil LAB berhasil dikirim"     
            ];

			// Hapus semua file sementara setelah email terkirim
			foreach ($temporary_files as $file_path) {
				if (file_exists($file_path)) {
					unlink($file_path);
				}
			}
		} else {
            $response = [
                'status'  => FALSE, 
                'message' => "Gagal mengirim email"      
                // 'message' => "Gagal mengirim email. Error: " . $this->email->print_debugger()      
            ];

			// Hapus semua file sementara jika ada error
			foreach ($temporary_files as $file_path) {
				if (file_exists($file_path)) {
					unlink($file_path);
				}
			}
		}        

        return $this->response($response, REST_Controller::HTTP_OK);
		
	}

    
    function isi_pesan_hasil_lab($nama, $tanggal_pemeriksaan) {
        $logo_rsud = "https://i.postimg.cc/7Pfj1JLM/rsud-web-logo.png";
    
        $isi_pesan = '
        <!DOCTYPE html>
        <html lang="id">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <style>
                body {
                    font-family: Tahoma, Arial, sans-serif;
                    background-color:rgb(224, 248, 255);
                    margin: 0;
                    padding: 0;
                }
                .email-container {
                    width: 100%;
                    max-width: 600px;
                    margin: 0 auto;
                    background-color:rgb(255, 255, 255);
                    padding: 20px;
                    border-radius: 8px;
                    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
                }
                .header {                   
                    padding: 5;
                    border-radius: 8px;
                    text-align: center;
                }
                .header img {
                    max-width: 400px;
                }
                .header h2 {
                    margin: 5px 0 0 0;
                    font-size: 14pt;
                }
                .content {
                    margin-top: 20px;
                    font-size: 12pt;
                }
                .content p {
                    line-height: 1.6;
                    color: #333;
                }
                .content b {
                    color: #0a78d2;
                }
                .footer {
                    margin-top: 20px;
                    text-align: center;
                    color: #777;
                    font-size: 12pt;
                }
            </style>
        </head>
        <body>
            <div style="background-color:rgb(224, 248, 255); padding: 20px;">
                <div class="email-container">
                    <div class="header">
                        <img src="'.$logo_rsud.'" alt="RSUD Kota Tangerang">
                    </div>
                    <div class="content">
                        <p>Assalamu’alaikum warahmatullahi wabarakatuh,</p>
                        <p>Yang terhormat <b>'.$nama.'</b>,</p>
                        <p>Berikut ini kami sampaikan hasil pemeriksaan laboratorium atas nama <b>'.$nama.'</b> yang dilakukan pemeriksaan pada <b>'.$tanggal_pemeriksaan.'</b>.</p>
                        
                        <p>Untuk membuka PDF hasil laboratorium, gunakan tanggal lahir Saudara sebagai kata sandi dengan format ddmmyyyy (tanggal, bulan, dan tahun lahir tanpa spasi).</p>
                        
                        <p>Terima kasih atas kepercayaannya terhadap RSUD Kota Tangerang.
                           Untuk informasi lebih lanjut dapat menghubungi chat whatsapp Laboratorium kami di nomor <a href="https://api.whatsapp.com/send/?phone=%2B6287764358525&text&type=phone_number&app_absent=0" target="_blank">+6287764358525</a> pada hari Senin - Sabtu di jam 07.30 - 14.00 WIB.</p>
        
                        <div class="footer">
                            <p>Hormat kami,<br><b>RSUD Kota Tangerang</b></p>
                        </div>
                    </div>
                </div>
            </div>
        </body>
        </html>';
        return $isi_pesan;
    }
    
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    function kirim_email_mcu_get() {
        $id = $this->get('id_pendaftaran');
        $data = $this->db->query($this->m_mcu->getfileTerpilih($id))->row();
    
        // Ambil data
        $email_to     = $data->email;
        $lokasi_file  = explode(', ', $data->lokasi_file); 
        $namai_file   = explode(', ', $data->nama_file);
        $tgl_layanan  = get_day($data->tanggal_layanan) .", ". get_date_format($data->tanggal_layanan);
        $nama_pasien  = $data->nama_pasien;
        $id_pasien    = $data->id_pasien;
        $diagnosa     = $data->diagnosa;
        $dokter       = $data->dokter;
    
        if (!$email_to || !$lokasi_file || !$tgl_layanan || !$nama_pasien || !$id_pasien || !$diagnosa || !$dokter) {
            return $this->response(['status' => FALSE, 'message' => 'Data tidak lengkap'], REST_Controller::HTTP_OK);
        }
    
        $isi_pesan = $this->isi_pesan_hasil_mcu($nama_pasien, $id_pasien, $diagnosa, $dokter, $tgl_layanan);
    
        $this->load->library('email');
        $this->email->initialize([
            'protocol'    => $this->protocol,
            'smtp_host'   => $this->smtp_host,
            'smtp_user'   => $this->smtp_user,
            'smtp_pass'   => $this->smtp_pass,
            'smtp_port'   => $this->smtp_port,            
            'smtp_crypto' => $this->smtp_crypto,
			'mailtype'    => $this->mailtype,
			'charset'     => $this->charset,
			'wordwrap'    => $this->wordwrap
        ]);
    
        $this->email->from('rsud@tangerangkota.go.id', 'RSUD');
        $this->email->to($email_to);
        $this->email->subject("Hasil Medical Check Up RSUD Kota Tangerang");
        $this->email->message($isi_pesan);
    
        $temporary_files = [];    
        foreach ($lokasi_file as $index => $file_url) {
            $file_extension = pathinfo($file_url, PATHINFO_EXTENSION);
            $no = $index + 1;
    
            // File sementara
            $local_file_path = sys_get_temp_dir() . DIRECTORY_SEPARATOR . "hasil_lab_{$no}." . $file_extension;    
            $file_content = @file_get_contents($file_url);

            // Ambil nama dari DB atau fallback
            $nama_file_asli = isset($namai_file[$index]) ? trim($namai_file[$index]) : "Lampiran_{$no}";
            $nama_file_email = $nama_file_asli . '.' . $file_extension;

            if ($file_content) {
                file_put_contents($local_file_path, $file_content);
                $temporary_files[] = $local_file_path;
                $this->email->attach($local_file_path, 'attachment', $nama_file_email);
            } else {
                return $this->response([
                    'status' => FALSE,
                    'message' => "Gagal mengunduh file ". $nama_file_asli
                ], REST_Controller::HTTP_OK);
            }
        }
    
        // Kirim email
        if ($this->email->send()) {
            foreach ($temporary_files as $file_path) {
                if (file_exists($file_path)) {
                    unlink($file_path);
                }
            }
            return $this->response([
                'status'  => TRUE, 
                'message' => "Hasil MCU berhasil dikirim"
            ], REST_Controller::HTTP_OK);
        } else {
            foreach ($temporary_files as $file_path) {
                if (file_exists($file_path)) {
                    unlink($file_path);
                }
            }
            return $this->response([
                'status'  => FALSE, 
                'message' => "Gagal mengirim email"
            ], REST_Controller::HTTP_OK);
        }
    }

    function isi_pesan_hasil_mcu($nama, $id_pasien, $diagnosa, $dokter_dpjp, $tgl_daftar){
        $isi_pesan='<!DOCTYPE html>
                    <html lang="id">
                    <head>
                        <meta charset="UTF-8">
                        <meta name="viewport" content="width=device-width, initial-scale=1.0">
                        <title>Hasil MCU - RSUD Kota Tangerang</title>
                        <style>
                            body {
                                font-family: Tahoma, Arial, sans-serif;
                                background-color: #f7f7f7;
                                margin: 0;
                                padding: 0;
                            }
                            .email-container {
                                width: 100%;
                                max-width: 600px;
                                margin: 0 auto;
                                background-color: #ffffff;
                                padding: 20px;
                                border-radius: 8px;
                            }
                            .header {
                                background-color: #0a78d2;
                                color: #ffffff;
                                padding: 15px;
                                border-radius: 8px;
                                text-align: center;
                            }
                            .header h2 {
                                margin: 0;
                                font-size: 24px;
                            }
                            .content {
                                margin-top: 20px;
                            }
                            .content p {
                                line-height: 1.6;
                                color: #333;
                            }
                            .content b {
                                color: #0a78d2;
                            }
                            .result-table {
                                width: 100%;
                                border-collapse: collapse;
                                margin-top: 20px;
                            }
                            .result-table th, .result-table td {
                                padding: 8px;
                                text-align: left;
                                border: 1px solid #ddd;
                            }
                            .result-table th {
                                background-color: #f0f0f0;
                            }
                            .footer {
                                margin-top: 20px;
                                text-align: center;
                                color: #777;
                                font-size: 12px;
                            }
                            .footer a {
                                color: #0a78d2;
                                text-decoration: none;
                            }
                        </style>
                    </head>
                    <body>
                        <div class="email-container">
                            <div class="header">
                                <h2>Hasil Pemeriksaan Medical Check Up</h2>
                                <h2>RSUD Kota Tangerang</h2>
                            </div>
                            <div class="content">
                                <p>Yth. <b>'.$nama.'</b>,</p>
                                <p>Terima kasih telah menjalani pemeriksaan Medical Check Up di RSUD Kota Tangerang. Berikut adalah hasil pemeriksaan medis Anda:</p>
                                
                                <table class="result-table">
                                    <tr>
                                        <th>Nama Pasien</th>
                                        <td>'.$nama.'</td>
                                    </tr>
                                    <tr>
                                        <th>No Rekam Medis</th>
                                        <td>'.$id_pasien.'</td>
                                    </tr>
                                    <tr>
                                        <th>Jenis Pemeriksaan</th>
                                        <td>'.$diagnosa.'</td>
                                    </tr>
                                    <tr>
                                        <th>Dokter Pemeriksa</th>
                                        <td>'.$dokter_dpjp.'</td>
                                    </tr>
                                    <tr>
                                        <th>Tgl Pemeriksaan</th>
                                        <td>'.$tgl_daftar.'</td>
                                    </tr>
                                </table>

                                <p>Untuk membuka PDF hasil Medical Check-Up, gunakan tanggal lahir Anda sebagai kata sandi dengan format ddmmyyyy (tanggal, bulan, dan tahun lahir tanpa spasi).</p>
                                <p>Apabila Anda memiliki pertanyaan lebih lanjut atau memerlukan konsultasi, Anda dapat menghubungi kami di:</p>
                                <p><b>Kontak RSUD Kota Tangerang:</b><br>
                                    Telepon: +62(21) 29720200 / 29720202<br>
                                    Website: <a href="https://rsud.tangerangkota.go.id/" target="_blank">https://rsud.tangerangkota.go.id</a><br>
                                    Humas  : <a href="https://api.whatsapp.com/send/?phone=%2B6281280703360&text&type=phone_number&app_absent=0" target="_blank">+6281280703360</a>
                                </p>

                                <p>Jika Anda membutuhkan bantuan lebih lanjut, jangan ragu untuk menghubungi kami kembali. Kami siap membantu Anda.</p>

                                <div class="footer">
                                    <p>Salam hormat,<br>RSUD Kota Tangerang</p>
                                </div>
                            </div>
                        </div>
                    </body>
                    </html>';
        return $isi_pesan;
    }


    //Contoh untuk generate pdf dari url
    public function generate_pdf_get()
    {
        $url = "http://localhost/simrs.tangerangkota.go.id.site_prod/medical_check_up/cetak_form_sks/673115";

        // Path simpan
        $output_path = './resources/uploads_pdf/temp_file_hasil.pdf';

        // Ambil konten dari URL
        $html_content = file_get_contents($url);

        // Inisialisasi Dompdf
        $options = new Options();
        $options->set('isRemoteEnabled', true);
        $dompdf = new Dompdf($options);

        // Load HTML ke Dompdf
        $dompdf->loadHtml($html_content);

        // Atur ukuran kertas dan orientasi
        $dompdf->setPaper('A4', 'portrait');

        // Render ke PDF
        $dompdf->render();

        // Simpan output ke file
        file_put_contents($output_path, $dompdf->output());

        // Berikan respon ke user
        if (file_exists($output_path)) {
            echo "PDF berhasil disimpan di: " . $output_path;
        } else {
            echo "Gagal menyimpan PDF.";
        }
    }

    
}