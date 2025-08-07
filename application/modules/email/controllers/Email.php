<?php

defined('BASEPATH') or exit('No direct script access allowed');


class Email extends SYAM_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Email_model');
    }

    public function index()
    {
        $email_tujuan = 'putri.rsud@gmail.com'; // Ganti dengan email tujuan
        $subject = 'Tes Email dari CodeIgniter';
        $isi = '<h1>Halo,</h1><p>Ini adalah email percobaan dari aplikasi CodeIgniter.</p>';

        if ($this->Email_model->kirim($email_tujuan, $subject, $isi)) {
            echo "Email berhasil dikirim!";
        } else {
            echo "Gagal mengirim email.";
        }
    }

	
	function kirim_email() {
		// Load library email
		$this->load->library('email');
		
		// Konfigurasi email
		$this->email->initialize([
			'protocol' => 'smtp',
			'smtp_host' => 'smtp.tangerangkota.go.id',
			'smtp_user' => 'rsud@tangerangkota.go.id',
			'smtp_pass' => 'Rsud_2024',
			'smtp_port' => 587,
			'smtp_crypto' => 'tls',
			'mailtype' => 'html',
			'charset' => 'utf-8',
			'wordwrap' => TRUE
		]);

		// Detail email
		$this->email->from('rsud@tangerangkota.go.id', 'RSUD');
		$this->email->to("putri.rsud@gmail.com");
		$this->email->subject("Hasil MCU RSUD Kota Tangerang");
		$this->email->message("<h1>Ini Judul</h1><p>Ini kalimat dari isi hasil text</p>");
		
		// Daftar URL file yang akan dilampirkan
		$file_urls = [
			'http://10.10.10.11/rsud/00356476_00356476256396.pdf',
			'http://10.10.10.11/rsud/00000127_00000127246794.pdf',
			'http://192.168.77.101/storage/file_pdf_to_image/BERRA_2024-10-25_2410250643/BERRA_2024-10-25_2410250643_page1.png'
		];
		$temporary_files = []; // Untuk menyimpan path file sementara

		foreach ($file_urls as $index => $file_url) {
			// Ekstrak ekstensi file dari URL
			$file_extension = pathinfo($file_url, PATHINFO_EXTENSION);
			
			// Tentukan path file sementara
			$local_file_path = "./uploads/temp_file_{$index}." . $file_extension;

			// Unduh file dari URL
			$file_content = file_get_contents($file_url);
			if ($file_content) {
				// Simpan file sementara
				file_put_contents($local_file_path, $file_content);
				$temporary_files[] = $local_file_path;

				// Lampirkan file
				$this->email->attach($local_file_path);
			} else {
				echo "Gagal mengunduh file dari URL: $file_url<br>";
			}
		}

		// Kirim email
		if ($this->email->send()) {
			echo "Email berhasil dikirim.";

			// Hapus semua file sementara setelah email terkirim
			foreach ($temporary_files as $file_path) {
				if (file_exists($file_path)) {
					unlink($file_path);
				}
			}
		} else {
			echo "Gagal mengirim email. Error: " . $this->email->print_debugger();

			// Hapus semua file sementara jika ada error
			foreach ($temporary_files as $file_path) {
				if (file_exists($file_path)) {
					unlink($file_path);
				}
			}
		}
	}





}
