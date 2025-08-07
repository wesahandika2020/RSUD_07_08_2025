<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Salinan_resep extends SYAM_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('App_model', 'm_default');
        $this->load->model('rekam_medis/Rekam_medis_model', 'rekam_medis');
        $this->load->model('pasien/Pasien_model', 'pasien');
    }

    function index()
    {
        $data['active'] = 'Pelayanan';
        $data['modules'] = $this->m_default->getDataModules($this->session->userdata('id_account_group'));
        $is_login = $this->session->userdata('is_login');

        if ($is_login === true) :
            $data['hospital'] = $this->m_default->getDataHospital();
            $this->load->view('layouts/index', $data);
        else :
            redirect('/');
        endif;
    }

    function page_salinan_resep()
    {
        $data['hospital'] = $this->m_default->getDataHospital();
        $data['jenis_pelayanan'] = array(
            '' => 'Semua',
            'Poliklinik' =>
            'Rawat Jalan',
            'IGD' => 'IGD',
            'Rawat Inap' => 'Rawat Inap',
            'Intensive Care' => 'Intensive Care',
            'OK Central' => 'OK Central',
            'Laboratorium' => 'Laboratorium',
            'Radiologi' => 'Radiologi',
            'Fisioterapi' => 'Fisioterapi',
            'Hemodialisa' => 'Hemodialisa',
        );
        if ($this->session->userdata('id_unit') === '295') {
            $data['jenis_pelayanan'] = ['Poliklinik' => 'Rawat Jalan', 'Hemodialisa' => 'Hemodialisa', 'Radiologi' => 'Radiologi',];
        } else if ($this->session->userdata('id_unit') === '300') {
            $data['jenis_pelayanan'] = ['Rawat Inap' => 'Rawat Inap', 'Hemodialisa' => 'Hemodialisa', 'Radiologi' => 'Radiologi',];
        }
        $data['status_penyerahan'] = array('Semua' => 'Semua', 'Sudah' => 'Sudah', 'Belum' => 'Belum');
        $this->load->view('index', $data);
    }
}
