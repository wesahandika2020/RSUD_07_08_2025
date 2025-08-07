<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Hasil_mcu_kirim_online extends SYAM_Controller 
{
    function __construct()
    {
        parent::__construct();
        $this->waktu_cetak = date('d/m/Y H:i');
        $this->load->model('App_model', 'default');
        $this->load->model('Masterdata_model', 'm_masterdata');
    }

    function index()
    {
        $data['active'] = 'Pelayanan';
        $data['modules'] = $this->default->getDataModules($this->session->userdata('id_account_group'));
        $is_login = $this->session->userdata('is_login');

        if ($is_login === true) :
            $data['hospital'] = $this->default->getDataHospital();
            $this->load->view('layouts/index', $data);

        else :
            redirect('/');

        endif;
    }

    function page_hasil_mcu_kirim_online()
    {
        $data['jenis_tanggal']  = ['daftar' => 'Tanggal Daftar', 'keluar' => 'Tanggal Keluar', 'layanan' => 'Tanggal Layanan'];
        $data['jenis_file_mcu'] = $this->m_masterdata->getJenisFileMcu();
        $this->load->view('index', $data);
    }

    public function generate_qrcode_text($isi_code)
    {
        $this->load->library('ciqrcode');
        $decoded_code = base64_decode($isi_code);
        QRcode::png($decoded_code, false, QR_ECLEVEL_H, 4); // Pastikan untuk menggunakan ukuran yang sesuai
    }

    // 2. Surat Keterangan Pengujian Kesehatan
    function cetak_form_skpk($idPendaftaran)
    {
        $this->load->library('pdf');
        if ($idPendaftaran !== null) :
            $data['pasien'] = $this->db->select("pd.id_pasien, (p.nama) as nama_pasien, p.kelamin, p.tempat_lahir, p.tanggal_lahir, p.telp,
                                                    p.alamat, p.no_rt as rt, p.no_rw as rw, p.no_rumah as norumah, 
                                                    p.nama_kec as kec, p.nama_kel as kel, p.nama_kab as kab, p.nama_prop as prop, pd.no_register", true)
                                                    ->from('sm_pasien as p')
                                                    ->join('sm_pendaftaran as pd', 'p.id = pd.id_pasien')
                                                    ->where('pd.id', $idPendaftaran, true)->get()->row();                                                    
            $data['pasien']->cekbarcode = null;

            $this->load->model('medical_check_up/Medical_check_up_model', 'm_mcu');
            $formskpk = $this->m_mcu->getFormSKPK($idPendaftaran);  
            $data['data_form'] = $formskpk; 

            ob_start();
            $this->load->view('hasil_mcu_kirim_online/download/cetak_form_02_skpk', $data);
            $html = ob_get_clean();
            ob_clean();

            $font = base_url() . 'vendor/dompdf/dompdf/fonts/verdana.ttf';
            $this->pdf->set_option('isHtml5ParserEnabled', true);
            $this->pdf->set_option('isRemoteEnabled', true);
            $this->pdf->set_option('defaultMediaType', 'all');
            $this->pdf->set_option('isFontSubsettingEnabled', true);
            $this->pdf->set_option('isPhpEnabled', true);
            $this->pdf->set_option('fontPath', $font);
            $this->pdf->set_option('fontFamily', 'Verdana');
            $this->pdf->set_option('debugPng', true);
            $this->pdf->set_option('debugKeepTemp', true);

            $this->pdf->loadHTML($html);
            $this->pdf->render();

            $file_name = 'Ket Pengujian Kesehatan'.'.pdf';
            $this->pdf->stream($file_name, ["Attachment" => false]);            
        endif;
    }

    // 3. Surat Keterangan Sehat
    function cetak_ket_sehat($id)
    {
        $this->load->library('pdf');
        if ($id !== null) :
            $data['pasien'] = $this->db->select("lp.*, pd.id_pasien, p.nama as nama_pasien, p.kelamin, p.alamat, p.no_rt as rt, p.no_rw as rw, p.no_rumah as norumah, p.nama_kec as kec, p.nama_kel as kel, p.nama_kab as kab, p.nama_prop as prop", true)
                ->from('sm_layanan_pendaftaran as lp')
                ->join('sm_pendaftaran as pd', 'pd.id = lp.id_pendaftaran')
                ->join('sm_pasien as p', 'p.id = pd.id_pasien')
                ->where('lp.id', $id, true)->get()->row();
            $data['pasien']->kelamin == 'P' ? $data['pasien']->kelamin = 'PEREMPUAN' : $data['pasien']->kelamin = 'LAKI-LAKI';
            $data['pasien']->cekbarcode = null;

            $this->load->model('medical_check_up/Medical_check_up_model', 'm_mcu');
            $sk_sehat = $this->m_mcu->getSKSehat($id);
            $data['data_form'] = $sk_sehat;

            ob_start();
            $this->load->view('hasil_mcu_kirim_online/download/cetak_form_03_sk_sehat', $data);
            $html = ob_get_clean();
            ob_clean();

            $font = base_url() . 'vendor/dompdf/dompdf/fonts/verdana.ttf';
            $this->pdf->set_option('isHtml5ParserEnabled', true);
            $this->pdf->set_option('isRemoteEnabled', true);
            $this->pdf->set_option('defaultMediaType', 'all');
            $this->pdf->set_option('isFontSubsettingEnabled', true);
            $this->pdf->set_option('isPhpEnabled', true);
            $this->pdf->set_option('fontPath', $font);
            $this->pdf->set_option('fontFamily', 'Verdana');
            $this->pdf->set_option('debugPng', true);
            $this->pdf->set_option('debugKeepTemp', true);

            $this->pdf->loadHTML($html);
            $this->pdf->render();

            $file_name = 'Ket Pengujian Kesehatan'.'.pdf';
            $this->pdf->stream($file_name, ["Attachment" => false]);       
        endif;
    }

    // 4. Surat Keterangan Bebas Narkoba
    function cetak_surat_narkoba($id)
    {
        $this->load->library('pdf');
        if ($id !== null) :
            $data['pasien'] = $this->db->select("lp.*, pd.id_pasien, p.nama as nama_pasien, p.kelamin, p.alamat, p.no_rt as rt, p.no_rw as rw, p.no_rumah as norumah, p.nama_kec as kec, p.nama_kel as kel, p.nama_kab as kab, p.nama_prop as prop", true)
                ->from('sm_layanan_pendaftaran as lp')
                ->join('sm_pendaftaran as pd', 'pd.id = lp.id_pendaftaran')
                ->join('sm_pasien as p', 'p.id = pd.id_pasien')
                ->where('lp.id', $id, true)->get()->row();
            $data['pasien']->kelamin == 'P' ? $data['pasien']->kelamin = 'PEREMPUAN' : $data['pasien']->kelamin = 'LAKI-LAKI';
            $data['pasien']->cekbarcode = null;

            $this->load->model('medical_check_up/Medical_check_up_model', 'm_mcu');
            $surat_narkoba = $this->m_mcu->getSBN($id);
            $data['data_form'] = $surat_narkoba;

            ob_start();
            $this->load->view('hasil_mcu_kirim_online/download/cetak_form_04_surat_narkoba', $data);
            $html = ob_get_clean();
            ob_clean();

            $font = base_url() . 'vendor/dompdf/dompdf/fonts/verdana.ttf';
            $this->pdf->set_option('isHtml5ParserEnabled', true);
            $this->pdf->set_option('isRemoteEnabled', true);
            $this->pdf->set_option('defaultMediaType', 'all');
            $this->pdf->set_option('isFontSubsettingEnabled', true);
            $this->pdf->set_option('isPhpEnabled', true);
            $this->pdf->set_option('fontPath', $font);
            $this->pdf->set_option('fontFamily', 'Verdana');
            $this->pdf->set_option('debugPng', true);
            $this->pdf->set_option('debugKeepTemp', true);

            $this->pdf->loadHTML($html);
            $this->pdf->render();

            $file_name = 'Ket Pengujian Kesehatan'.'.pdf';
            $this->pdf->stream($file_name, ["Attachment" => false]);    
            
        endif;
    }	

    // 5. Resume Medis Pasien
    function cetak_resum_medis_pasien($idPendaftaran)
    {        
        $this->load->library('pdf');
        if ($idPendaftaran !== null) :
            $data['pasien']->cekbarcode = null;
            $this->load->model('medical_check_up/Medical_check_up_model', 'm_mcu');
            $surat_mcu = $this->m_mcu->getMCU($idPendaftaran);
            $data['data_form'] = $surat_mcu;

            ob_start();
            $this->load->view('hasil_mcu_kirim_online/download/cetak_form_05_resum_medis', $data);
            $html = ob_get_clean();
            ob_clean();

            $font = base_url() . 'vendor/dompdf/dompdf/fonts/verdana.ttf';
            $this->pdf->set_option('isHtml5ParserEnabled', true);
            $this->pdf->set_option('isRemoteEnabled', true);
            $this->pdf->set_option('defaultMediaType', 'all');
            $this->pdf->set_option('isFontSubsettingEnabled', true);
            $this->pdf->set_option('isPhpEnabled', true);
            $this->pdf->set_option('fontPath', $font);
            $this->pdf->set_option('fontFamily', 'Verdana');
            $this->pdf->set_option('debugPng', true);
            $this->pdf->set_option('debugKeepTemp', true);

            $this->pdf->loadHTML($html);
            $this->pdf->render();

            $file_name = 'Resum Medis Pasien'.'.pdf';
            $this->pdf->stream($file_name, ["Attachment" => false]);
        endif;
    }

    // 6. Surat Keterangan Kesehatan Jiwa Tipe 1
    function cetak_ket_jiwa1($id)
    { 
        $this->load->library('pdf');
        if ($id !== null) {
            $data['pasien'] = $this->db->select("lp.*, pd.id_pasien, p.nama as nama_pasien, p.kelamin, p.alamat, p.no_rt as rt, p.no_rw as rw, p.no_rumah as norumah, p.nama_kec as kec, p.nama_kel as kel, p.nama_kab as kab, p.nama_prop as prop", true)
                ->from('sm_layanan_pendaftaran as lp')
                ->join('sm_pendaftaran as pd', 'pd.id = lp.id_pendaftaran')
                ->join('sm_pasien as p', 'p.id = pd.id_pasien')
                ->where('lp.id', $id, true)->get()->row();
            $data['pasien']->kelamin == 'P' ? $data['pasien']->kelamin = 'PEREMPUAN' : $data['pasien']->kelamin = 'LAKI-LAKI';
            $data['pasien']->cekbarcode = null;

            $this->load->model('medical_check_up/Medical_check_up_model', 'm_mcu');
            $surat_skkj_1 = $this->m_mcu->getSKKJsatu($id);
            $data['data_form'] = $surat_skkj_1;

            ob_start();
            $this->load->view('hasil_mcu_kirim_online/download/cetak_form_06_skkj_1', $data);
            $html = ob_get_clean();
            ob_clean();

            $font = base_url() . 'vendor/dompdf/dompdf/fonts/verdana.ttf';
            $this->pdf->set_option('isHtml5ParserEnabled', true);
            $this->pdf->set_option('isRemoteEnabled', true);
            $this->pdf->set_option('defaultMediaType', 'all');
            $this->pdf->set_option('isFontSubsettingEnabled', true);
            $this->pdf->set_option('isPhpEnabled', true);
            $this->pdf->set_option('fontPath', $font);
            $this->pdf->set_option('fontFamily', 'Verdana');
            $this->pdf->set_option('debugPng', true);
            $this->pdf->set_option('debugKeepTemp', true);

            $this->pdf->loadHTML($html);
            $this->pdf->render();

            $file_name = 'Ket Kesehatan Jiwa'.'.pdf';
            $this->pdf->stream($file_name, ["Attachment" => false]);
        }
    }

    // 7. Surat Keterangan Kesehatan Jiwa Tipe 2
    function cetak_ket_jiwa2($id)
    { 
        $this->load->library('pdf');
        if ($id !== null) {
            $data['pasien'] = $this->db->select("lp.*, pd.id_pasien, p.nama as nama_pasien, p.kelamin, p.alamat, p.no_rt as rt, p.no_rw as rw, p.no_rumah as norumah, p.nama_kec as kec, p.nama_kel as kel, p.nama_kab as kab, p.nama_prop as prop", true)
                ->from('sm_layanan_pendaftaran as lp')
                ->join('sm_pendaftaran as pd', 'pd.id = lp.id_pendaftaran')
                ->join('sm_pasien as p', 'p.id = pd.id_pasien')
                ->where('lp.id', $id, true)->get()->row();
            $data['pasien']->kelamin == 'P' ? $data['pasien']->kelamin = 'PEREMPUAN' : $data['pasien']->kelamin = 'LAKI-LAKI';
            $data['pasien']->cekbarcode = null;
            
            $this->load->model('medical_check_up/Medical_check_up_model', 'm_mcu');
            $surat_skkj_2 = $this->m_mcu->getSKKJdua($id);
            $data['data_form'] = $surat_skkj_2;

            ob_start();               
            $this->load->view('hasil_mcu_kirim_online/download/cetak_form_07_skkj_2', $data);
            $html = ob_get_clean();
            ob_clean();

            $font = base_url() . 'vendor/dompdf/dompdf/fonts/verdana.ttf';
            $this->pdf->set_option('isHtml5ParserEnabled', true);
            $this->pdf->set_option('isRemoteEnabled', true);
            $this->pdf->set_option('defaultMediaType', 'all');
            $this->pdf->set_option('isFontSubsettingEnabled', true);
            $this->pdf->set_option('isPhpEnabled', true);
            $this->pdf->set_option('fontPath', $font);
            $this->pdf->set_option('fontFamily', 'Verdana');
            $this->pdf->set_option('debugPng', true);
            $this->pdf->set_option('debugKeepTemp', true);

            $this->pdf->loadHTML($html);
            $this->pdf->render();

            $file_name = 'Ket Kesehatan Jiwa'.'.pdf';
            $this->pdf->stream($file_name, ["Attachment" => false]);
        }
    }

    // 8. Surat Keterangan Kesehatan Jiwa Tipe 3
    function cetak_ket_jiwa3($id)
    { 
        $this->load->library('pdf');
        if ($id !== null) {
            $data['pasien'] = $this->db->select("lp.*, pd.id_pasien, p.nama as nama_pasien, p.kelamin, p.alamat, p.no_rt as rt, p.no_rw as rw, p.no_rumah as norumah, p.nama_kec as kec, p.nama_kel as kel, p.nama_kab as kab, p.nama_prop as prop", true)
                ->from('sm_layanan_pendaftaran as lp')
                ->join('sm_pendaftaran as pd', 'pd.id = lp.id_pendaftaran')
                ->join('sm_pasien as p', 'p.id = pd.id_pasien')
                ->where('lp.id', $id, true)->get()->row();
            $data['pasien']->kelamin == 'P' ? $data['pasien']->kelamin = 'PEREMPUAN' : $data['pasien']->kelamin = 'LAKI-LAKI';
            $data['pasien']->cekbarcode = null;

            $this->load->model('medical_check_up/Medical_check_up_model', 'm_mcu');
            $surat_skkj_3 = $this->m_mcu->getSKKJtiga($id);
            $data['data_form'] = $surat_skkj_3;
            
            ob_start();
            $this->load->view('hasil_mcu_kirim_online/download/cetak_form_08_skkj_3', $data);
            $html = ob_get_clean();
            ob_clean();

            $font = base_url() . 'vendor/dompdf/dompdf/fonts/verdana.ttf';
            $this->pdf->set_option('isHtml5ParserEnabled', true);
            $this->pdf->set_option('isRemoteEnabled', true);
            $this->pdf->set_option('defaultMediaType', 'all');
            $this->pdf->set_option('isFontSubsettingEnabled', true);
            $this->pdf->set_option('isPhpEnabled', true);
            $this->pdf->set_option('fontPath', $font);
            $this->pdf->set_option('fontFamily', 'Verdana');
            $this->pdf->set_option('debugPng', true);
            $this->pdf->set_option('debugKeepTemp', true);

            $this->pdf->loadHTML($html);
            $this->pdf->render();

            $file_name = 'Ket Kesehatan Jiwa'.'.pdf';
            $this->pdf->stream($file_name, ["Attachment" => false]);
        }
    }

    // 9. Sertifikat Kelaikan Bekerja
    function cetak_kelaikan_bekerja($id_layanan_pendaftaran)
    {
        $this->load->library('pdf');
        $data['pasien']->cekbarcode = null;
        $this->load->model('medical_check_up/Medical_check_up_model', 'm_mcu');        
        $data ['data_form'] = $this->m_mcu->getKelaikanBekerja($id_layanan_pendaftaran);

        ob_start();
        $this->load->view('hasil_mcu_kirim_online/download/cetak_form_09_kelaikan_bekerja', $data);
        $html = ob_get_clean();
        ob_clean();

        $font = base_url() . 'vendor/dompdf/dompdf/fonts/verdana.ttf';
        $this->pdf->set_option('isHtml5ParserEnabled', true);
        $this->pdf->set_option('isRemoteEnabled', true);
        $this->pdf->set_option('defaultMediaType', 'all');
        $this->pdf->set_option('isFontSubsettingEnabled', true);
        $this->pdf->set_option('isPhpEnabled', true);
        $this->pdf->set_option('fontPath', $font);
        $this->pdf->set_option('fontFamily', 'Verdana');
        $this->pdf->set_option('debugPng', true);
        $this->pdf->set_option('debugKeepTemp', true);

        $this->pdf->loadHTML($html);
        $this->pdf->render();

        $file_name = 'Lap Pemeriksaan Kesehatan'.'.pdf';
        $this->pdf->stream($file_name, ["Attachment" => false]);
    }

    // 10. Laporan Pemeriksaan Kesehatan
    function cetak_form_lpk($id_layanan_pendaftaran)
    {
        $this->load->library('pdf');
        $data['pasien'] = $this->db->select("lp.*, pd.id_pasien, p.nama as nama_pasien, p.kelamin, p.tempat_lahir, p.tanggal_lahir, p.telp, p.alamat, p.no_rt as rt, p.no_rw as rw, p.no_rumah as norumah, p.nama_kec as kec, p.nama_kel as kel, p.nama_kab as kab, p.nama_prop as prop", true)
                ->from('sm_layanan_pendaftaran as lp')
                ->join('sm_pendaftaran as pd', 'pd.id = lp.id_pendaftaran')
                ->join('sm_pasien as p', 'p.id = pd.id_pasien')
                ->where('lp.id', $id_layanan_pendaftaran, true)->get()->row();
        $data['pasien']->kelamin == 'P' ? $data['pasien']->kelamin = 'PEREMPUAN' : $data['pasien']->kelamin = 'LAKI-LAKI';
        $data['pasien']->cekbarcode = null;
        $this->load->model('medical_check_up/Medical_check_up_model', 'm_mcu');
        $data['data_form'] = $this->m_mcu->getLpkByLayPendaftaran($id_layanan_pendaftaran);

        ob_start();
        $this->load->view('hasil_mcu_kirim_online/download/cetak_form_10_lpk', $data);
        $html = ob_get_clean();
        ob_clean();

        $font = base_url() . 'vendor/dompdf/dompdf/fonts/verdana.ttf';
        $this->pdf->set_option('isHtml5ParserEnabled', true);
        $this->pdf->set_option('isRemoteEnabled', true);
        $this->pdf->set_option('defaultMediaType', 'all');
        $this->pdf->set_option('isFontSubsettingEnabled', true);
        $this->pdf->set_option('isPhpEnabled', true);
        $this->pdf->set_option('fontPath', $font);
        $this->pdf->set_option('fontFamily', 'Verdana');
        $this->pdf->set_option('debugPng', true);
        $this->pdf->set_option('debugKeepTemp', true);

        $this->pdf->loadHTML($html);
        $this->pdf->render();

        $file_name = 'Lap Pemeriksaan Kesehatan'.'.pdf';
        $this->pdf->stream($file_name, ["Attachment" => false]);
    }

    // 11. Surat Keterangan Medis
    function cetak_form_skm($id_layanan_pendaftaran)
    {
        $this->load->library('pdf');
        if ($id_layanan_pendaftaran !== null) {       
            $data['pasien'] = $this->db->select("pd.id_pasien, (p.nama) as nama_pasien, p.kelamin, p.tempat_lahir, p.tanggal_lahir, p.telp,
                                                    p.alamat, p.no_rt as rt, p.no_rw as rw, p.no_rumah as norumah, 
                                                    p.nama_kec as kec, p.nama_kel as kel, p.nama_kab as kab, p.nama_prop as prop, pd.no_register", true)
                                                    ->from('sm_pasien as p')
                                                    ->join('sm_pendaftaran as pd', 'p.id = pd.id_pasien')
                                                    ->join('sm_layanan_pendaftaran as lp', 'pd.id =lp.id_pendaftaran')
                                                    ->where('lp.id', $id_layanan_pendaftaran, true)->get()->row();
            $data['pasien']->kelamin == 'P' ? $data['pasien']->kelamin = 'PEREMPUAN' : $data['pasien']->kelamin = 'LAKI-LAKI';
            $data['pasien']->cekbarcode = null;
            $this->load->model('medical_check_up/Medical_check_up_model', 'm_mcu');
            $skm = $this->m_mcu->getSKM($id_layanan_pendaftaran);
            $data['data_form'] = $skm;
            $this->load->model('pelayanan/Pelayanan_model', 'm_pelayanan');
            $data['anamnesa'] = $this->m_pelayanan->getAnamnesa($id_layanan_pendaftaran);
            
            ob_start();
            $this->load->view('hasil_mcu_kirim_online/download/cetak_form_11_skm', $data);
            $html = ob_get_clean();
            ob_clean();

            $font = base_url() . 'vendor/dompdf/dompdf/fonts/verdana.ttf';
            $this->pdf->set_option('isHtml5ParserEnabled', true);
            $this->pdf->set_option('isRemoteEnabled', true);
            $this->pdf->set_option('defaultMediaType', 'all');
            $this->pdf->set_option('isFontSubsettingEnabled', true);
            $this->pdf->set_option('isPhpEnabled', true);
            $this->pdf->set_option('fontPath', $font);
            $this->pdf->set_option('fontFamily', 'Verdana');
            $this->pdf->set_option('debugPng', true);
            $this->pdf->set_option('debugKeepTemp', true);

            $this->pdf->loadHTML($html);
            $this->pdf->render();

            $file_name = 'Surat Keterangan Medis'.'.pdf';
            $this->pdf->stream($file_name, ["Attachment" => false]);
        }
    }

    // 12. Surat Keterangan Disabilitas
    function cetak_disabilitas($id_layanan_pendaftaran)
    {        
        $this->load->library('pdf');
        if ($id_layanan_pendaftaran !== null) {       
            $data['pasien'] = $this->db->select("pd.id_pasien, (p.nama) as nama_pasien, p.kelamin, p.tempat_lahir, p.tanggal_lahir, p.telp,
                                                    p.alamat, p.no_rt as rt, p.no_rw as rw, p.no_rumah as norumah, 
                                                    p.nama_kec as kec, p.nama_kel as kel, p.nama_kab as kab, p.nama_prop as prop, pd.no_register", true)
                                                    ->from('sm_pasien as p')
                                                    ->join('sm_pendaftaran as pd', 'p.id = pd.id_pasien')
                                                    ->join('sm_layanan_pendaftaran as lp', 'pd.id =lp.id_pendaftaran')
                                                    ->where('lp.id', $id_layanan_pendaftaran, true)->get()->row();
            $data['pasien']->cekbarcode = null;
                                                    
            $this->load->model('medical_check_up/Medical_check_up_model', 'm_mcu');
            $skd = $this->m_mcu->getSuratKeteranganDisabilitas($id_layanan_pendaftaran);
            $data['data_form'] = $skd;

            ob_start();
            $this->load->view('hasil_mcu_kirim_online/download/cetak_form_12_ket_disabilitas', $data);
            $html = ob_get_clean();
            ob_clean();

            $font = base_url() . 'vendor/dompdf/dompdf/fonts/verdana.ttf';
            $this->pdf->set_option('isHtml5ParserEnabled', true);
            $this->pdf->set_option('isRemoteEnabled', true);
            $this->pdf->set_option('defaultMediaType', 'all');
            $this->pdf->set_option('isFontSubsettingEnabled', true);
            $this->pdf->set_option('isPhpEnabled', true);
            $this->pdf->set_option('fontPath', $font);
            $this->pdf->set_option('fontFamily', 'Verdana');
            $this->pdf->set_option('debugPng', true);
            $this->pdf->set_option('debugKeepTemp', true);

            $this->pdf->loadHTML($html);
            $this->pdf->render();

            $file_name = 'Surat Keterangan Disabilitas'.'.pdf';
            $this->pdf->stream($file_name, ["Attachment" => false]);
        }
    }

    // 13. Surat Keterangan Tidak Disabilitas
    function cetak_tidak_disabilitas($id_layanan_pendaftaran)
    {
        $this->load->library('pdf');
        if ($id_layanan_pendaftaran !== null) {     
            $data['pasien'] = $this->db->select("lp.*, pd.id_pasien, upper(p.nama) as nama_pasien, p.kelamin, p.alamat, p.no_rt as rt, p.no_rw as rw, p.no_rumah as norumah, p.nama_kec as kec, p.nama_kel as kel, p.nama_kab as kab, p.nama_prop as prop", true)
                ->from('sm_layanan_pendaftaran as lp')
                ->join('sm_pendaftaran as pd', 'pd.id = lp.id_pendaftaran')
                ->join('sm_pasien as p', 'p.id = pd.id_pasien')
                ->where('lp.id', $id_layanan_pendaftaran, true)
                ->get()
                ->row();
            $data['pasien']->kelamin == 'P' ? $data['pasien']->kelamin = 'Perempuan' : $data['pasien']->kelamin = 'Laki-laki';            
            $data['pasien']->cekbarcode = null;
            $this->load->model('medical_check_up/Medical_check_up_model', 'm_mcu');
            $sktd = $this->m_mcu->getSuratKeteranganTidakDisabilitas($id_layanan_pendaftaran);
            $data['data_form'] = $sktd;

            ob_start();
            $this->load->view('hasil_mcu_kirim_online/download/cetak_form_13_ket_tidak_disabilitas', $data);
            $html = ob_get_clean();
            ob_clean();

            $font = base_url() . 'vendor/dompdf/dompdf/fonts/verdana.ttf';
            $this->pdf->set_option('isHtml5ParserEnabled', true);
            $this->pdf->set_option('isRemoteEnabled', true);
            $this->pdf->set_option('defaultMediaType', 'all');
            $this->pdf->set_option('isFontSubsettingEnabled', true);
            $this->pdf->set_option('isPhpEnabled', true);
            $this->pdf->set_option('fontPath', $font);
            $this->pdf->set_option('fontFamily', 'Verdana');
            $this->pdf->set_option('debugPng', true);
            $this->pdf->set_option('debugKeepTemp', true);

            $this->pdf->loadHTML($html);
            $this->pdf->render();

            $file_name = 'Surat Keterangan Tidak Disabilitas'.'.pdf';
            $this->pdf->stream($file_name, ["Attachment" => false]);
        }
    }

    // 14. Hasil Pemeriksaan Dokter Okupasi
    function cetak_pemeriksaan_okupasi($id_layanan_pendaftaran)
    {        
        $this->load->library('pdf');
        $this->load->model('medical_check_up/Medical_check_up_model', 'm_mcu');
        $data['pasien'] = $this->db->select("lp.*, pd.id_pasien, upper(p.nama) as nama_pasien, p.kelamin, pj.nama pekerjaan, p.tanggal_lahir, p.alamat, p.no_rt as rt, p.no_rw as rw, p.no_rumah as norumah, p.nama_kec as kec, p.nama_kel as kel, p.nama_kab as kab, p.nama_prop as prop", true)
            ->from('sm_layanan_pendaftaran as lp')
            ->join('sm_pendaftaran as pd', 'pd.id = lp.id_pendaftaran')
            ->join('sm_pasien as p', 'p.id = pd.id_pasien')
            ->join('sm_pekerjaan as pj', 'pj.id = p.id_pekerjaan','left')
            ->where('lp.id', $id_layanan_pendaftaran, true)
            ->get()
            ->row();
        $data['pasien']->kelamin == 'P' ? $data['pasien']->kelamin = 'Perempuan' : $data['pasien']->kelamin = 'Laki-laki';
        $data['pasien']->cekbarcode = null;

        $hasil_okupasi = $this->db->get_where('sm_hasil_pemeriksaan_dokter_okupasih', array('id_layanan_pendaftaran' => $id_layanan_pendaftaran))->row();
    
        if (!empty($hasil_okupasi)) {
            $data_okupasi = $this->m_mcu->getHasilPemeriksaanDokterOkupasi($id_layanan_pendaftaran);
        }

        $data['data_form']      = $data_okupasi;
        
        ob_start();
        $this->load->view('hasil_mcu_kirim_online/download/cetak_form_14_hasil_okupasi', $data);
        $html = ob_get_clean();
        ob_clean();

        $font = base_url() . 'vendor/dompdf/dompdf/fonts/verdana.ttf';
        $this->pdf->set_option('isHtml5ParserEnabled', true);
        $this->pdf->set_option('isRemoteEnabled', true);
        $this->pdf->set_option('defaultMediaType', 'all');
        $this->pdf->set_option('isFontSubsettingEnabled', true);
        $this->pdf->set_option('isPhpEnabled', true);
        $this->pdf->set_option('fontPath', $font);
        $this->pdf->set_option('fontFamily', 'Verdana');
        $this->pdf->set_option('debugPng', true);
        $this->pdf->set_option('debugKeepTemp', true);

        $this->pdf->loadHTML($html);
        $this->pdf->render();

        $file_name = 'Hasil Pemeriksaan Dokter Okupasi'.'.pdf';
        $this->pdf->stream($file_name, ["Attachment" => false]);
        
    }

    function cetak_hasil_pemeriksaan_dokter_okupasi($id_pendaftaran, $id_layanan_pendaftaran)
    {
        $this->load->library('pdf');
        $this->load->model('Hasil_pemeriksaan_mcu_model', 'm_hasil_mcu');

        $data_laboratorium  = [];
        $data_radiologi     = [];
        $data_okupasi       = '';
        $data_ekg           = '';

        // Ambil detail pendaftaran
        $data = $this->klinik->getPendaftaranDetail($id_pendaftaran, $id_layanan_pendaftaran);

        // Hasil Okupasi
        $hasil_okupasi = $this->db->get_where('sm_hasil_pemeriksaan_dokter_okupasih', array('id_layanan_pendaftaran' => $id_layanan_pendaftaran))->row();

        if (!empty($hasil_okupasi)) {
            $data_okupasi = $this->m_mcu->getHasilPemeriksaanDokterOkupasi($id_layanan_pendaftaran);
        }

        $data['hasil_okupasi']      = $data_okupasi;

        // Tangkap output HTML dari view
        ob_start();
        $this->load->view('medical_check_up/printing/cetak_hpdo_dompdf', $data);
        $html = ob_get_clean();
        ob_clean();

        // Set opsi PDF
        $font = base_url() . 'vendor/dompdf/dompdf/fonts/verdana.ttf';  // Ganti dengan path font yang Anda ingin gunakan
        $this->pdf->set_option('isHtml5ParserEnabled', true);
        $this->pdf->set_option('isRemoteEnabled', true);
        $this->pdf->set_option('defaultMediaType', 'all');
        $this->pdf->set_option('isFontSubsettingEnabled', true);
        $this->pdf->set_option('isPhpEnabled', true); // Aktifkan PHP di dalam HTML
        $this->pdf->set_option('fontPath', $font);
        $this->pdf->set_option('fontFamily', 'Verdana');
        $this->pdf->set_option('debugPng', true);
        $this->pdf->set_option('debugKeepTemp', true);

        // Muat konten HTML
        $this->pdf->loadHTML($html);

        // Render PDF
        $this->pdf->render();

        // Nama file PDF
        $file_name = 'Hasil_Pemeriksaan_Okupasi-' . $data['pasien']->id_pasien . '_' . $data['pasien']->nama . '.pdf';

        // Stream PDF ke browser
        $this->pdf->stream($file_name, ["Attachment" => false]);
    }
}
