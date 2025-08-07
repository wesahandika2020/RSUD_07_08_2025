<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Satu_sehat extends SYAM_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('App_model', 'default');
        $this->load->model('Masterdata_model', 'masterdata');
        $this->load->model('Satu_sehat_model', 'sehat');
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

    function page_satu_sehat()
    {
        $this->load->view('index');
    }

    function page_organisasi()
    {
        $data['organisasi'] = $this->sehat->getStatusOrganisasi();
        
        $this->load->view('satu_sehat/organisasi/index', $data);
    }

    function page_lokasi()
    {   
        $data['lokasi'] = $this->sehat->getStatusLokasi();

        $this->load->view('satu_sehat/lokasi/index', $data);
    }

    function page_pasien()
    {
        $this->load->view('satu_sehat/pasien/index');
    }
    
    function page_tenaga_medis()
    {
        $this->load->view('satu_sehat/nakes/index');
    }

    function page_encounter_kunjungan()
    {
        $this->load->view('satu_sehat/encounter/index');
    }

    function page_condition_primary()
    {
        $this->load->view('satu_sehat/conditionprim/index');
    }

    function page_condition_secondary()
    {
        $this->load->view('satu_sehat/conditionsecond/index');
    }

    function page_procedure()
    {
        $this->load->view('satu_sehat/procedure/index');
    }

    function page_observasi()
    {
        $this->load->view('satu_sehat/observasi/index');
    }

    function page_medication()
    {
        $this->load->view('satu_sehat/medication/index');
    }

    function page_medication_dispense()
    {
        $this->load->view('satu_sehat/medicationdispense/index');
    }
    
}
