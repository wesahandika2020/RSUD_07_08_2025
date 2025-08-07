<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Antrian_bpjs extends SYAM_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('App_model', 'default');
        $this->load->model('Masterdata_model', 'auto');
        $this->load->model('Antrian_bpjs_model', 'antrian');
    }

    function index()
    {
        $data['active'] = 'Masterdata';
        $data['modules'] = $this->default->getDataModules($this->session->userdata('id_account_group'));
        $is_login = $this->session->userdata('is_login');

        if ($is_login === true) :
            $data['hospital'] = $this->default->getDataHospital();
            $this->load->view('layouts/index', $data);
        else :
            redirect('/');
        endif;
    }

    function page_antrian_bpjs()
    {
        $data['jenis_pasien']       = $this->antrian->getJenisPasien();
        $data['jenis_kunjungan']    = $this->antrian->getJenisKunjungan();
        $data['pasien_baru']        = $this->antrian->getPasienBaru();
        $data['kebutuhan_khusus']   = $this->antrian->getKebutuhanKhusus();
        $data['jenis_loket']        = $this->antrian->getJenisLoket();
        $data['status_antrean']     = $this->antrian->getStatusAntrean();
        $data['agama']              = $this->auto->getAgama();
        $data['etnis']              = $this->auto->getEtnis();
        $data['kelamin']            = $this->auto->getKelamin();
        $data['domisili']           = $this->auto->getDomisili();
        $data['cara_bayar']         = $this->auto->getCaraBayar();
        $data['asal_masuk']         = $this->auto->getAsalMasuk();
        $data['kunjungan']          = $this->auto->getKunjungan();
        $data['pekerjaan']          = $this->auto->getPekerjaan();
        $data['pendidikan']         = $this->auto->getPendidikan();
        $data['statuspasien']       = $this->auto->getStatusPasien();
        $data['goldarah']           = $this->auto->getGolonganDarah();
        $data['pernikahan']         = $this->auto->getStatusPernikahan();
        $data['hamkom']             = $this->auto->getHambatanKomunikasi();
        $data['filter_onsite']      = $this->antrian->getFilterOnsite();
        $this->load->view('index', $data);
    }

    function cetak_antrian($id)
    {
        if ($id !== null) {
            $data['title'] = 'Cetak Nomor Antrian Admisi';
            $data['admisi'] = $this->antrian->getDataBooking((int)$id);
            $data['hospital'] = $this->default->getDataHospital();
            $this->load->view('antrian_bpjs/printing/tiket_antrian', $data);
        }
    }

    private function cekUmur($tgl)
    {
        date_default_timezone_set('Asia/Jakarta');
        $tanggalLahir = new DateTime($tgl);
        $sekarang = new DateTime();
        $perbedaan = $tanggalLahir->diff($sekarang);
        return $perbedaan;
    }

    function nota_sep($no_sep, $format = 'print')
    {
        $bpjs_vclaim2 = $this->antrian->getConfigVclaim2();
        $this->load->model('pasien/Pasien_model', 'pasien');

        $data['hospital'] = $this->default->getDataHospital();
        $data['title']    = 'Nota SEP';
        $output = NULL;
        $decode = NULL;
        $data['no_rm']    = '';
        // cek history SEP
        $sep_history = $this->db->get_where('sm_history_sep', array('no_sep' => $no_sep))->row();
        $data['sep_history'] = $sep_history;

        if ((count((array) $sep_history) > 0) && ($sep_history->no_rm !== null)) :
            // jika SEP sudah tersimpan
            $data['no_rm'] = $sep_history->no_rm;
        endif;

        $url    = $bpjs_vclaim2->server . "/SEP/";
        $header = $this->antrian->createHeader($bpjs_vclaim2);
        $output = getCurl($url.$no_sep, $header);
        $decode = json_decode($output);

        if(isset($decode->response)){

            $decode->response = $this->antrian->decryptResponseVclaim2($decode->response);
            
            if ($output !== '') :
                if (($decode !== null) && ($decode->metaData->code === '200')) :
                    if ($decode->response !== null) :
                        $data['sep'] = $decode->response;
                        $konvAngka = $decode->response->peserta->noMr;
                        $formatKonv = str_pad($konvAngka, 8, '0', STR_PAD_LEFT);
                        $cekPasien = $this->pasien->getDataPasienById($formatKonv);
                        $cekUmur = $this->cekUmur($cekPasien->tanggal_lahir);
                        $data['umur'] = $cekUmur->y;
                        $data['pasien'] = $cekPasien;
                        if ($format === 'json') :
                            die(json_encode($data));
                        else :
                            $this->load->view('vclaim_bpjs/printing/nota_sep', $data);
                        endif;
                    else :
                        echo "Gagal mendapatkan data, Silahkan refresh kembali.";
                    endif;
                else :
                    echo $decode->metaData->message;
                endif;
            else :
                echo "timeout";
            endif;

        } else {

            echo "Gagal mendapatkan data, Silahkan refresh kembali.";
            
        }
    }
    
}
