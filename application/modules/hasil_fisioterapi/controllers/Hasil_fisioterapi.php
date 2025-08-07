<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Hasil_fisioterapi extends SYAM_Controller 
{
    function __construct()
    {
        parent::__construct();
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

    function page_hasil_fisioterapi()
    {
        $data['kelas_tindakan'] = 'III';
		$data['jenis_layanan'] = $this->m_masterdata->getJenisPelayanan();
        $data['jenis_layanan'] += array('Fisioterapi' => 'Fisioterapi', 'Hemodialisa' => 'Hemodialisa');
		$data['status_hasil'] = $this->m_masterdata->getStatusHasil(true);
        $this->load->view('index',$data);
    }

    function printing_hasil_fisioterapi($id_fisioterapi)
    {
        if ($id_fisioterapi === NULL) {
            exit;
        }

        $this->load->model('pelayanan/Pelayanan_model', 'm_pelayanan');
        $this->load->model('pendaftaran/Pendaftaran_model', 'm_pendaftaran');

        $dataFisioterapi = $this->m_pelayanan->getPemeriksaanFisioterapi($id_fisioterapi, 'detail');
        $dataFisioterapi->detail = $this->m_pelayanan->cetakPemeriksaanFisioterapiDetail($dataFisioterapi->id);
        $data['title'] = 'Hasil Fisioterapi';
        $data['hospital'] = $this->default->getDataHospital();
        $data['pendaftaran'] = $this->m_pendaftaran->getPendaftaranDetail($dataFisioterapi->id_pendaftaran, $dataFisioterapi->id_layanan_pendaftaran);
        $data['fisioterapi'] = $dataFisioterapi;
        
        $this->load->view('hasil_fisioterapi/printing/cetak_hasil_fisioterapi', $data);
    }
}