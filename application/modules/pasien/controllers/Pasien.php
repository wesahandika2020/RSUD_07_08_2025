<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pasien extends SYAM_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('App_model', 'default');
        $this->load->model('Masterdata_model', 'masterdata');
        $this->load->model('Pasien_model', 'pasien');
    }

    function index()
    {
        $data['active'] = 'Pendaftaran';
        $data['modules'] = $this->default->getDataModules($this->session->userdata('id_account_group'));
        $is_login = $this->session->userdata('is_login');

        if ($is_login === true) :
            $data['hospital'] = $this->default->getDataHospital();
            $this->load->view('layouts/index', $data);

        else :
            redirect('/');

        endif;
    }

    function page_pasien()
    {
        $data['agama']        = $this->masterdata->getAgama();
        $data['kelamin']      = $this->masterdata->getKelamin();
        $data['pekerjaan']    = $this->masterdata->getPekerjaan();
        $data['pendidikan']   = $this->masterdata->getPendidikan();
        $data['statuspasien'] = $this->masterdata->getStatusPasien();
        $data['gol_darah']    = $this->masterdata->getGolonganDarah();
        $data['pernikahan']   = $this->masterdata->getStatusPernikahan();
        $data['etnis']        = $this->masterdata->getEtnis();
        $data['kelamin']      = $this->masterdata->getKelamin();
        $this->load->view('index', $data);
    }

    function export_data_pasien()
    {
        $search         = [
            'id'      => $this->input->get('no_rm', true),
            'nama'    => $this->input->get('nama', true),
            'kelamin' => $this->input->get('kelamin', true),
            'umur'    => $this->input->get('umur', true),
            'alamat'  => $this->input->get('alamat', true),
            'telp'    => $this->input->get('telp', true),
            'status'  => $this->input->get('status', true),
        ];

        $data = $this->pasien->getListDataPasien(null, null, $search);
        $data['title'] = 'Data Pasien';
        $this->load->view('pasien/export/export_data_pasien', $data);
    }
}
