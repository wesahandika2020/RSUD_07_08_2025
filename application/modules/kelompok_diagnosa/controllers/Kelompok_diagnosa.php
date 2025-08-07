<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Kelompok_diagnosa extends SYAM_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('App_model', 'm_default');
        $this->load->model('Kelompok_diagnosa_model', 'm_kel_diag');
    }

    public function index()
    {
        $data['active']  = 'Laporan Gizi';
        $data['modules'] = $this->m_default->getDataModules($this->session->userdata('id_account_group'));
        $is_login        = $this->session->userdata('is_login');

        if ($is_login === true) :
            $data['hospital'] = $this->m_default->getDataHospital();
            $this->load->view('layouts/index', $data);
        else :
            redirect('/');
        endif;
    }

    public function page_kelompok_diagnosa()
    {
        $data['kode_skdr']     = $this->m_kel_diag->getKodeSkdr();
        $data['jenis_laporan'] = $this->m_kel_diag->getJenisLaporan();
        $this->load->view('index', $data);
    }

    function export_klp_diagnosa_01() {

        $search = [
			'kode_skdr'   => safe_get('kode_skdr'),
		];		
		
		$data['data']  = $this->m_kel_diag->getKlpDiagnosa01($search);	

		$this->load->view( 'export/export_klp_diagnosa_01.php', $data );
	}

}
