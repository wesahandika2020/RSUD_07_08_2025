<?php

defined('BASEPATH') or exit('No direct script access allowed');

// require('./application/third_party/phpoffice/vendor/autoload.php');

class Pemakaian_peralatan_medis extends SYAM_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('App_model', 'm_default');
        $this->load->model('Masterdata_model', 'm_masterdata');
        $this->load->model('Pemakaian_peralatan_medis_model', 'model_ppi');
    }

    public function index()
    {
        $data['active']  = 'Pemakaian Peralatan Medis';
        $data['modules'] = $this->m_default->getDataModules($this->session->userdata('id_account_group'));
        $is_login        = $this->session->userdata('is_login');

        if ($is_login === true) :
            $data['hospital'] = $this->m_default->getDataHospital();
            $this->load->view('layouts/index', $data);

        else :
            redirect('/');

        endif;
    }

    public function page_pemakaian_peralatan_medis()
    {
        $data['bulan']              = $this->m_masterdata->getBulan();
        // $data['periode_laporan']    = $this->model_ppi->getPeriodeLaporan();
        $data['bangsal_filter']     = $this->model_ppi->getDataDropdownBangsal();
        $data['kultur']             = $this->model_ppi->getDataDropdownKultur();
        $data['antiobika']          = $this->model_ppi->getDataDropdownAntiobika();
        $data['pasien_keluar']      = $this->model_ppi->getDataPasienKeluar();
        $data['hospital']           = $this->m_default->getDataHospital();
        // $data['kultur_search']      = $this->model_ppi->getKultur();
        // $data['antiobika_search']   = $this->model_ppi->getAntiobika();

        $this->load->view('index', $data);
    }

    public function export_laporan_harian()
    {
        $search = [
			'keyword'       	=> safe_get('keyword'),
			'tanggal_masuk'    	=> safe_get('tanggal_masuk'),
			'bangsal_search'    => safe_get('bangsal_search'),
			'pasien_keluar'    	=> safe_get('pasien_keluar'),
		];

        // var_dump($search);
        // die();
        
        $data['get_date_format'] = $this->m_masterdata->get_date_format();
        $data                    = $this->model_ppi->getLapHarianPPI(0, 0, $search);
        $data['parameter']       = $search;

        $this->load->view('export.php', $data);
    }
}
