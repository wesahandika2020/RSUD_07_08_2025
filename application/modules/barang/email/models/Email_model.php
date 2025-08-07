<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Email_model extends CI_Model {
    
    function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->library('email');
        $this->email->initialize([
            'protocol'    => 'smtp',
            'smtp_host'   => 'smtp.tangerangkota.go.id',
            'smtp_user'   => 'rsud@tangerangkota.go.id',
            'smtp_pass'   => 'Rsud_2024',
            'smtp_port'   => 587, // Ganti ke port 587 atau 465
            'smtp_crypto' => 'ssl', // Gunakan 'ssl' jika memakai port 465, ssl jika 587
            'mailtype'    => 'html',    
            'charset'     => 'utf-8',
            'wordwrap'    => TRUE,  
        ]);

        $this->batas_menit_kirim_email = 5;
    }

    function kirim($email_tujuan, $subject, $isi){
        $this->email->from('rsud@tangerangkota.go.id','RSUD Kota Tangerang');
        $this->email->to($email_tujuan);
        $this->email->subject($subject);
        $this->email->message($isi);
        $this->email->set_mailtype('html');
        $respone = $this->email->send();
        if($respone){
            return $respone;
        } else {
            log_message('error', $this->email->print_debugger());
            return false;
        }
    }

    function tess_get(){
        $this->load->library('email');
        $this->email->initialize([
            'protocol' => 'smtp',
            'smtp_host' => 'smtp.tangerangkota.go.id',
            'smtp_user' => 'rsud@tangerangkota.go.id',
            'smtp_pass' => 'Rsud_2024',
            'smtp_port' => 587,
            'smtp_crypto' => 'tls',
            'mailtype' => 'html'
        ]);
        $this->email->from('rsud@tangerangkota.go.id', 'RSUD');
        $this->email->to("berlianalinaa@gmail.com");
        $this->email->subject("TESSS");
        $this->email->message("TESSS ISI");
        $this->email->set_mailtype('html');
        $response = $this->email->send();
        if ($response) {
            echo $response;
        } else {
            echo false;
        }
    }

}