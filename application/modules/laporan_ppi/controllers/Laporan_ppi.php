<?php

defined('BASEPATH') or exit('No direct script access allowed');

// require('./application/third_party/phpoffice/vendor/autoload.php');

class Laporan_ppi extends SYAM_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('App_model', 'm_default');
        $this->load->model('Masterdata_model', 'm_masterdata');
        $this->load->model('Laporan_ppi_model', 'model_ppi');
        $this->load->helper('syams');
    }
    
    public function index()
    {
        $data['active']  = 'Laporan ppi';
        $data['modules'] = $this->m_default->getDataModules($this->session->userdata('id_account_group'));
        $is_login        = $this->session->userdata('is_login');

        if ($is_login === true) :
            $data['hospital'] = $this->m_default->getDataHospital();
            $this->load->view('layouts/index', $data);

        else :
            redirect('/');
            
        endif;
    }
    
    public function page_laporan_ppi()
    {
        $data['jenis_laporan']      = $this->model_ppi->list_laporan();
        $data['bangsal_filter']     = $this->model_ppi->getDataDropdownBangsal();
        $data['status_pasien']      = $this->model_ppi->getDataPasienKeluar();
        $data['kultur']             = $this->model_ppi->getDataDropdownKultur();
        $data['antiobika']          = $this->model_ppi->getDataDropdownAntiobika();
        $data['bulan']              = $this->m_masterdata->getBulan();

        $this->load->view('index', $data);
    }

    public function export_laporan_bulanan()
    {
        $search = [
			'bulan'    			=> safe_get('bulan'),
			'tahun'             => safe_get('tahun'),
			'bangsal_search'    => safe_get('bangsal_search'),
			'status_pasien'     => safe_get('status_pasien'),
			'keyword'       	=> safe_get('keyword'),
			'kultur'       		=> safe_get('kultur'),
			'antiobika'         => safe_get('antiobika'),
		];

        $data                   = $this->model_ppi->getListDataLaporanBulanPPI(0, 0, $search);
        $data['parameter']      = $search;

        $this->load->view('lap_bulanan_ppi/export.php', $data);
    }

    public function export_laporan_kultur()
    {
        $search = [
			'bulan'    			=> safe_get('bulan'),
			'tahun'             => safe_get('tahun'),
			'bangsal_search'    => safe_get('bangsal_search'),
			'status_pasien'     => safe_get('status_pasien'),
			'keyword'       	=> safe_get('keyword'),
			'kultur'       		=> safe_get('kultur'),
			'antiobika'         => safe_get('antiobika'),
		];

        $data                   = $this->model_ppi->getListDataLaporanKultur(0, 0, $search);
        $data['parameter']      = $search;

        $this->load->view('lap_kultur_ppi/export.php', $data);
    }

    public function export_laporan_antiobika()
    {
        $search = [
			'bulan'    			=> safe_get('bulan'),
			'tahun'             => safe_get('tahun'),
			'bangsal_search'    => safe_get('bangsal_search'),
			'status_pasien'     => safe_get('status_pasien'),
			'keyword'       	=> safe_get('keyword'),
			'kultur'       		=> safe_get('kultur'),
			'antiobika'         => safe_get('antiobika'),
		];

        $data                   = $this->model_ppi->getListDataLaporanAntiobika(0, 0, $search);
        $data['parameter']      = $search;

        $this->load->view('lap_antiobika_ppi/export.php', $data);
    }

}
