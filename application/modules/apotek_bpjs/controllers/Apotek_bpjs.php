<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Apotek_bpjs extends SYAM_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('App_model', 'm_default');
		$this->load->model('Masterdata_model', 'm_masterdata');
    }

    function index()
    {
        $data['active']  = 'Apotek BPJS';
        $data['modules'] = $this->default->getDataModules($this->session->userdata('id_account_group'));
        $is_login = $this->session->userdata('is_login');

        if ($is_login === true) :
            $data['hospital'] = $this->default->getDataHospital();
            $this->load->view('layouts/index', $data);
        else :
            redirect('/');
        endif;
    }

    // START
    function page_mapping_dpho()
    {
        $data['kategori_barang'] = $this->m_masterdata->kategoriBarangLoadData('')->result();
        $this->load->view('mapping_dpho/index', $data);
    }


    // END

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
        $this->load->model('vclaim_bpjs/Sep_v2_model', 'm_sep_v2');
        $this->load->model('pasien/Pasien_model', 'pasien');

        $bpjs_config = $this->default->getConfigBPJSV2();
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

        $url    = $bpjs_config->server . "/SEP/";
        $header = $this->m_sep_v2->createHeader($bpjs_config);
        $output = getCurl($url . $no_sep, $header);
        $decode = json_decode($output);
        $decode->response = $this->m_sep_v2->decryptResponse($decode->response);

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
                        if ($format !== 'data') {
                            $this->load->view('vclaim_bpjs/printing/nota_sep', $data);
                        } else {
                            return $data;
                        }
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
    }

    function surat_rujukan_bpjs($no_rujukan, $format = 'print')
    {
        $this->load->model('vclaim_bpjs/Sep_v2_model', 'm_sep_v2');
        $bpjs_config = $this->default->getConfigBPJSV2();
        $data['hospital'] = $this->default->getDataHospital();
        $data['title']    = 'Surat Rujukan';
        $output = NULL;
        $decode = NULL;
        $url    = $bpjs_config->server . "/Rujukan/Keluar/";
        $header = $this->m_sep_v2->createHeader($bpjs_config);
        $header[4] = 'Content-type: Application/x-www-form-urlencoded';
        $output = getCurl($url . $no_rujukan, $header);
        $decode = json_decode($output);
        $decode->response = $this->m_sep_v2->decryptResponse($decode->response);
        // var_dump($decode); die;
        if ($output !== '') :
            if (($decode !== null) && ($decode->metaData->code === '200')) :
                if ($decode->response !== null) :
                    $data['data'] = $decode->response->rujukan;
                    if ($format === 'json') :
                        die(json_encode($data));
                    else :
                        $this->load->view('vclaim_bpjs/printing/surat_rujukan', $data);
                    endif;
                else :
                    echo "Gagal mendapatkan data, Silahkan refresh kembali.";
                endif;
            else :
                echo $decode->metaData->message;
            endif;
        else :
            echo "timeout.";
        endif;
    }

    function surat_kontrol_bpjs($no_surat, $format = 'print')
    {
        $this->load->model('vclaim_bpjs/Sep_v2_model', 'm_sep_v2');
        $bpjs_config = $this->default->getConfigBPJSV2();
        $data['hospital'] = $this->default->getDataHospital();
        $data['title']    = 'Surat Kontrol';
        $output = NULL;
        $decode = NULL;
        $url    = $bpjs_config->server . "/RencanaKontrol/noSuratKontrol/";
        $header = $this->m_sep_v2->createHeader($bpjs_config);
        $header[4] = 'Content-type: Application/x-www-form-urlencoded';
        $output = getCurl($url . $no_surat, $header);
        $decode = json_decode($output);
        $decode->response = $this->m_sep_v2->decryptResponse($decode->response);
        // var_dump($decode); die;
        if ($output !== '') :
            if (($decode !== null) && ($decode->metaData->code === '200')) :
                if ($decode->response !== null) :
                    $data['data'] = $decode->response;
                    if ($format === 'json') :
                        die(json_encode($data));
                    else :
                        $this->load->view('vclaim_bpjs/printing/nota_surat_kontrol', $data);
                    endif;
                else :
                    echo "Gagal mendapatkan data, Silahkan refresh kembali.";
                endif;
            else :
                echo $decode->metaData->message;
            endif;
        else :
            echo "timeout.";
        endif;
    }

    // vclaim monitoring
    function page_monitoring()
    {
        $this->load->view('vclaim_bpjs/vclaim_v2/monitoring/index');
    }

    function page_monitoring_kunjungan()
    {
        $data['jenis_pelayanan'] = ['' => 'Pilih...', '1' => 'Rawat Inap', '2' => 'Rawat Jalan'];
        $this->load->view('vclaim_bpjs/vclaim_v2/monitoring/kunjungan/index', $data);
    }

    function page_monitoring_klaim()
    {
        $data['jenis_pelayanan'] = ['' => 'Pilih...', '1' => 'Rawat Inap', '2' => 'Rawat Jalan'];
        $data['status_klaim'] = ['' => 'Pilih...', '1' => 'Proses Verifikasi', '2' => 'Pending Verifikasi', '3' => 'Klaim'];
        $this->load->view('vclaim_bpjs/vclaim_v2/monitoring/klaim/index', $data);
    }

    function page_monitoring_histori_pelayanan()
    {
        $this->load->view('vclaim_bpjs/vclaim_v2/monitoring/histori_pelayanan/index');
    }

    function page_monitoring_klaim_jaminan_raharja()
    {
        $this->load->view('vclaim_bpjs/vclaim_v2/monitoring/klaim_jaminan_raharja/index');
    }
    // end vclaim monitoring

    // surat kontrol / spri
    function page_surat_kontrol()
    {
        $this->load->view('vclaim_bpjs/vclaim_v2/surat_kontrol/index');
    }
    // end surat kontrol / spri
}
