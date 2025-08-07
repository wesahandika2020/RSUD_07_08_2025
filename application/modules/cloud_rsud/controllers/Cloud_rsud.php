<?php

defined('BASEPATH') or exit('No direct script access allowed');


class Cloud_rsud extends SYAM_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('App_model', 'default');
        $this->load->model('Masterdata_model', 'auto');
        // $this->load->model('Protokol_terapi_model', 'protokol');
        $this->load->model('rekam_medis/Rekam_medis_model', 'rekam_medis');
        $this->load->model('pendaftaran/Pendaftaran_model', 'klinik');
        $this->load->model('Cloud_rsud_model', 'cloud_rsud');

        $this->cloud_config = (object) [
            'server'     => 'http://192.168.77.101/api/file-upload/',
            'user_key'   => '80d402801bf7653318ee305235880de8'
        ];
    }

    function index()
    {
        $data['active'] = 'Configs';
        $data['modules'] = $this->default->getDataModules($this->session->userdata('id_account_group'));
        $is_login = $this->session->userdata('is_login');

        if ($is_login === true) :
            $data['hospital'] = $this->default->getDataHospital();
            $this->load->view('layouts/index', $data);

        else :
            redirect('/');

        endif;
    }

    function page_cloud_rsud()
    {
        $this->load->model('pelayanan/Pelayanan_model', 'pelayanan');
        $data['kelas_tindakan']      = '1';
        $data['jenis_tindakan']      = 'Rawat Jalan';
        $data['jenis_tindak_lanjut'] = '';
        $data['poli']                = (int) $this->session->userdata('poli');
        $data['group']               = $this->session->userdata('account_group');
        $data['kelas']               = $this->auto->getDataKelas();
        $data['profesi']             = $this->auto->getProfesi();
        $data['kondisi_keluar']      = $this->auto->getKondisiKeluar();
        $data['tindak_lanjut']       = $this->pelayanan->getTindakLanjut();
        $data['layanan']             = $this->auto->getLayananRegistration(null);

        $data['klinik']              = '';
        $klinik = $this->auto->getSpesialisasi($this->session->userdata('id_spesialis'));
        if (0 < count((array)$klinik)) :
            $data['klinik'] = $klinik->nama;
        endif;

        $data['jenis']              = 'Poliklinik';
        $data['jenis_igd']          = $this->auto->getJenisIGD();
        $data['hospital']           = $this->default->getDataHospital();
        $data['jenis_kasus']        = $this->auto->getJenisKasusDiagnosa();
        $data['status_pemeriksaan'] = $this->auto->getStatusPemeriksaan(true);
        $data['kelas_rawat']        = $this->auto->getOpsiKelasInacbg(false);
        $data['status_gizi']        = $this->auto->getStatusGizi();
        $data['bangsal']            = $this->auto->getDataBangsalReady();
        unset($data['bangsal']['']);

        $this->load->view('index', $data);
    }

    private function getDataCloudLain($id_cloud)
    {
        $parameters = array(
            'id' => base64_encode($id_cloud)
        );

        $url = $this->cloud_config->server . 'getpdf-folder?' . http_build_query($parameters);
        $header = $this->cloud_rsud->createHeader($this->cloud_config);

        $output = getCurl($url, $header);
        $output = json_decode($output);

        return $output;
    }

    public function print_file_lain($id_cloud, $type = null)
    {
        $this->load->model('pendaftaran/Pendaftaran_model', 'm_pendaftaran');

        if ($id_cloud !== NULL) {
            $id = base64_decode($id_cloud);
            
            $data['data'] = $this->db->get_where('sm_file_upload_lainnya', ['id_cloud' => $id])->row();
            $data['pendaftaran'] = $this->m_pendaftaran->getPendaftaranDetail($data['data']->id_pendaftaran, $data['data']->id_layanan);
            $data['data']->nama_kategori = $this->db->get_where('sm_master_upload_file', ['id' => $data['data']->id_master_upload_file])->row()->nama;
            
            $data_cloud = $this->getDataCloudLain($id);
            
            $filePaths = $data_cloud->data->file_location;
            usort($filePaths, function ($a, $b) {
                preg_match('/page(\d+)\.png$/', $a, $matchA);
                preg_match('/page(\d+)\.png$/', $b, $matchB);

                return intval($matchA[1]) <=> intval($matchB[1]);
            });
            
            $data['data']->image_paths = $filePaths;
            
            if ($type !== 'data') {
                $this->load->view('cloud_rsud/printing/print_file_lain', $data);
            } else {
                return $data;
            }
        }
    }

}
