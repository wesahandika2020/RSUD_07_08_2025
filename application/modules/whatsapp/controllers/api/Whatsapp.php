<?php
use setasign\Fpdi\Tcpdf\Fpdi;
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';

class Whatsapp extends REST_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->limit = 20;
        $this->date = date('Y-m-d');
        $this->datetime = date('Y-m-d H:i:s');
    }

    function get_token_get()
    {   
        $url = "https://services.mitratechindonesia.co.id/smart-awe/api/Auth";
        $credentials = [
            'username' => 'rsudkotatangerang',
            'password' => 'HLN#*$L$VDF.D3J$J2340#J@M'
        ];
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($credentials));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json',]);

        $output = curl_exec($ch);
        curl_close($ch);
        $decode = json_decode($output, true);

        if ($decode == null || !$decode['status']) {
            $decode = ["metaData" => ["code" => 500, "message" => "Failed to retrieve token"]];
            die(json_encode($decode));
        }

        $this->response($decode, REST_Controller::HTTP_OK);
        return $decode;
    }
          
    function kirim_hasil_lab_get() 
    {
        $data_token  = $this->get_token_get();        
        if ($data_token['status'] == false ) {
			die(json_encode(["metaData" => ["status" => false, "code" => 400, "message" => "Gagal terhubung dengan server WA, silahkan ulangi lagi ! "]]));
		};

        $token          = $data_token['token'];
        $no_hp          = $this->get('no_hp');        
        $nama_pasien    = $this->get('nama_pasien');
        $tgl_layanan    = $this->get('tgl_layanan');
        $password       = $this->get('pass');
        $nama_file      = $this->get('nama_file');

        // die(json_encode(["metaData" => ["no_hp" => $no_hp, "nama_pasien" => $nama_pasien, "tgl_layanan" => $tgl_layanan, "password" => $password, "nama_file" => $nama_file]]));
		
        $url     = "https://services.mitratechindonesia.co.id/smart-awe/api/SendMessageNew";
        $fileUrl = "https://10.10.10.11/rsud/".$nama_file.".pdf";  
        
        $tempFilePath = sys_get_temp_dir() . DIRECTORY_SEPARATOR . basename($fileUrl);
    
        $headers = get_headers($fileUrl, 1);
        if (strpos($headers[0], '200') === false) {
            die(json_encode(["metaData" => ["status" => false, "code" => 400, "message" => "File pdf tidak ditemukan, silahkan hubungi LIS ! ", "no_hp" => $no_hp, "nama_pasien" => $nama_pasien, "tgl_layanan" => $tgl_layanan, "password" => $password, "nama_file" => $nama_file]]));
        }
        
        $fileContent = file_get_contents($fileUrl);
        if ($fileContent === false) {
            die(json_encode(["metaData" => ["status" => false, "code" => 400, "message" => "Gagal download file pdf. Silahkan ulangi lagi !", "no_hp" => $no_hp, "nama_pasien" => $nama_pasien, "tgl_layanan" => $tgl_layanan, "password" => $password, "nama_file" => $nama_file]]));
        }
        
        file_put_contents($tempFilePath, $fileContent);
    
        $pdf = new Fpdi();
    
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('RSUD Kota Tangerang');
        $pdf->SetTitle('Protected PDF');
    
        $pageCount = $pdf->setSourceFile($tempFilePath);
    
        for ($pageNo = 1; $pageNo <= $pageCount; $pageNo++) {
            $tplId = $pdf->importPage($pageNo);
            $size  = $pdf->getTemplateSize($tplId);
            $pdf->AddPage($size['orientation'], [$size['width'], $size['height']]);
            $pdf->useTemplate($tplId);
        }
    
        $pdf->SetProtection(['copy', 'print'], $password);
    
        $outputPath = sys_get_temp_dir() . DIRECTORY_SEPARATOR . basename($fileUrl);
        $pdf->Output($outputPath, 'F');
    
        if (!file_exists($outputPath)) {
            die(json_encode(["metaData" => ["status" => false, "code" => 400, "message" => "Gagal mengamankan file", "no_hp" => $no_hp, "nama_pasien" => $nama_pasien, "tgl_layanan" => $tgl_layanan, "password" => $password, "nama_file" => $nama_file]]));
        }
    
        $body = [
            'serviceId'    => '5',
            'phone'        => $no_hp,
            'category'     => 'Info Lab',
            'token'        => $token,
            'templateCode' => 'd22ae52a-5ba2-40d2-a873-e30e36cb18b4',
            'param'        => json_encode([
                '1' => $nama_pasien,
                '2' => $nama_pasien,     
                '3' => $tgl_layanan
            ]),
            'attachment'   => new CURLFile($outputPath)
        ];
    
        $ch = curl_init($url);
        curl_setopt_array($ch, [
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => $body,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER => [
                'Content-Type: multipart/form-data',
                'Cookie: smart_awe_v20_session=FLInDBkG6dWQtzHCetKnwfXPullRU4tBJS3Uf03x'
            ],
        ]);
    
        $output = curl_exec($ch);
        if (curl_errno($ch)) {
            $error_msg = curl_error($ch);
            curl_close($ch);
            die(json_encode(["metaData" => ["code" => 500, "message" => $error_msg]]));
        }
    
        curl_close($ch);
        if (file_exists($tempFilePath)) {
            unlink($tempFilePath);
        }
        if (file_exists($outputPath)) {
            unlink($outputPath);
        }
        $decode = json_decode($output, true);
        $this->response($decode, REST_Controller::HTTP_OK);
    }

    //////////////////////////////////////////////////////////////////////////////////////////////////////

    function kirim_hasil_lab_merge_get() 
    {
        $id_pendaftaran = $this->get('id_pendaftaran');

        $this->db->query("
            INSERT INTO sm_lab_kirim_wa_log (id_lama, id_pendaftaran, id_pasien, nama_pasien, no_hp, pass, waktu_kirim, id_user, waktu_respon, respon, status,
                    keterangan, waktu_cek_file, jml_wa_berhasil, jml_email_berhasil, status_email, respon_email, waktu_respon_email )
            SELECT id AS id_lama, id_pendaftaran, id_pasien, nama_pasien, no_hp, pass, waktu_kirim, id_user, waktu_respon, respon, status,
                    'wa', waktu_cek_file, jml_wa_berhasil, jml_email_berhasil, status_email, respon_email, waktu_respon_email 
                FROM sm_lab_kirim_wa
                WHERE id_pendaftaran = ?
        ", [$id_pendaftaran]);

        // Update data di tabel `sm_lab_kirim_wa`
		$update = ['waktu_kirim' => $this->datetime,
                   'id_user'     => $this->session->userdata('id_translucent')];
        $this->db->where('id_pendaftaran', $id_pendaftaran)->update('sm_lab_kirim_wa', $update);

        $this->load->model('hasil_lab_kirim_wa/Hasil_lab_kirim_wa_model', 'm_lab_wa');

        $data_token  = $this->get_token_get();        
        if ($data_token['status'] == false ) {
            die(json_encode(["metaData" => ["status" => false, "code" => 400, "message" => "Gagal terhubung dengan server WA, silahkan ulangi lagi ! "]]));
        };
        
        $dataModel = $this->db->query($this->m_lab_wa->getfileTerpilih($id_pendaftaran). " AND is_kirim ='1' ")->result();       

        foreach ($dataModel as $v) {
            $v->tgl_daftar  = get_day($v->tanggal_daftar) .", ". get_date_format($v->tanggal_daftar);
        }

        $pdf_urls = [];
        foreach ($dataModel as $val){
            $pdf_urls[] .= 'http://10.10.10.11/rsud/'.$val->id_pasien.'_'.$val->kode.'.pdf';
        }

        // Daftar URL file PDF yang ingin digabungkan
        // $pdf_urls       = [
        //     'https://10.10.10.11/rsud/00356476_00356476256396.pdf',
        //     'https://10.10.10.11/rsud/00000127_00000127246794.pdf'
        // ];

        $token       = $data_token['token']; 
        $no_hp       = $dataModel[0]->telp;
        $nama_pasien = $dataModel[0]->nama_pasien;
        $tgl_layanan = $dataModel[0]->tgl_daftar;
        $password    = $dataModel[0]->pass;
        $temp_files  = [];
        $no_register = $dataModel[0]->no_register;
        
        // $no_hp       = '081311123219'; //PUTRI
        // $no_hp       = '081389457964'; //LINA
        
        // Download each file and store it temporarily
        foreach ($pdf_urls as $url) {
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

        if (!file_exists($outputPath)) {
            die(json_encode(["metaData" => ["status" => false, "code" => 400, "message" => "Gagal mengamankan file", "no_hp" => $no_hp, "nama_pasien" => $nama_pasien, "tgl_layanan" => $tgl_layanan]]));
        }
        
        // Mengirim file PDF melalui API
        $body = [
            'serviceId'    => '5',
            'phone'        => $no_hp,
            'category'     => 'Info Lab',
            'token'        => $token,
            'templateCode' => 'd22ae52a-5ba2-40d2-a873-e30e36cb18b4',
            'param'        => json_encode([
                '1' => $nama_pasien,
                '2' => $nama_pasien,     
                '3' => $tgl_layanan
            ]),
            'attachment'   => new CURLFile($outputPath)
        ];        

        $ch = curl_init("https://services.mitratechindonesia.co.id/smart-awe/api/SendMessageNew");
        curl_setopt_array($ch, [
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => $body,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER => [
                'Content-Type: multipart/form-data',
                'Cookie: smart_awe_v20_session=FLInDBkG6dWQtzHCetKnwfXPullRU4tBJS3Uf03x'
            ],
        ]);

        $output = curl_exec($ch);
        if (curl_errno($ch)) {
            $error_msg = curl_error($ch);
            curl_close($ch);
            die(json_encode(["metaData" => ["code" => 500, "message" => $error_msg]]));
        }

        curl_close($ch);       

        // Hapus file sementara setelah selesai
        foreach ($temp_files as $file) {
            if (file_exists($file)) {
                unlink($file);
            }
        }
        if (file_exists($outputPath)) {
            unlink($outputPath);
        }
        
        $decode = json_decode($output, true);
        $this->response($decode, REST_Controller::HTTP_OK);
    }



}
