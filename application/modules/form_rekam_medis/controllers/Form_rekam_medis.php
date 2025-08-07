<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Form_rekam_medis extends SYAM_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('App_model', 'default');
        $this->load->model('Masterdata_model', 'm_masterdata');
        $this->load->model('pelayanan/Pelayanan_model', 'm_pelayanan');
        $this->load->model('pendaftaran/Pendaftaran_model', 'klinik');
        $this->load->model('form_rekam_medis/Form_rekam_medis_model', 'm_rm');
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

    function page_form_rekam_medis()
    {
        // $data['jenis_daftar'] = $this->getJenisDaftar();
        $data['jenis_rawat'] = [
            "" => "--Jenis Rawat--",
            "Jalan" => "Rawat Jalan",
            "Inap" => "Rawat Inap"
        ];

        $this->load->view('index', $data);
    }

    function page_master_form_rekam_medis()
    {
        $this->load->view('master/index');
    }

    private function getJenisdaftar()
    {
        $this->db->select('jenis_pendaftaran');
        $this->db->from('sm_pendaftaran');
        $this->db->group_by('jenis_pendaftaran');
        $this->db->order_by('jenis_pendaftaran', 'ASC');

        $result = $this->db->get()->result();

        $jenis_pendaftaran_array = array();
        foreach ($result as $row) {
            // $lowercase_string = strtolower($row->jenis_pendaftaran);
            // $value = str_replace(' ', '_', $lowercase_string);

            // $jenis_pendaftaran_array[$value] = $row->jenis_pendaftaran;
            $jenis_pendaftaran_array[""] = "--Jenis Pendaftaran--";
            $jenis_pendaftaran_array[$row->jenis_pendaftaran] = $row->jenis_pendaftaran;
        }

        return $jenis_pendaftaran_array;
    }

    function cetak_resep_kaca_mata($id, $id_pendaftaran, $id_layanan_pendaftaran)
    {
        // var_dump($id, $id_pendaftaran, $id_layanan_pendaftaran);die;
        if (!$id) :
            exit();
        endif; 

        $pendaftaran = $this->klinik->getPendaftaranDetail($id_pendaftaran, $id_layanan_pendaftaran);

        
        if (count((array) $pendaftaran['pasien']) < 1) :
            die();
        endif;

        $data['layanan'] = $pendaftaran['layanan'];
        $data['pasien'] = $pendaftaran['pasien'];
        $data['pasien']->kelamin == 'P' ? $data['pasien']->kelamin = 'Perempuan' : $data['pasien']->kelamin = 'Laki-laki';

        $data['rkm'] = $this->m_rm->getRkmByID($id);
        // var_dump($data['rkm']);die;

        

        $this->load->view('form_rekam_medis/printing/cetak_resep_kaca_mata', $data);
    }

    function cetak_kelaikan_bekerja($id, $id_pendaftaran, $id_layanan_pendaftaran)
    {
        // var_dump($id, $id_pendaftaran, $id_layanan_pendaftaran);die;
        if (!$id) :
            exit();
        endif; 

        $pendaftaran = $this->klinik->getPendaftaranDetail($id_pendaftaran, $id_layanan_pendaftaran);

        
        if (count((array) $pendaftaran['pasien']) < 1) :
            die();
        endif;

        $data['layanan'] = $pendaftaran['layanan'];
        $data['pasien'] = $pendaftaran['pasien'];
        $data['pasien']->kelamin == 'P' ? $data['pasien']->kelamin = 'Perempuan' : $data['pasien']->kelamin = 'Laki-laki';

        $data['kb'] = $this->m_rm->getKbByID($id);
        // var_dump($data['kb']);die;

        

        $this->load->view('form_rekam_medis/printing/cetak_kelaikan_bekerja', $data);
    }


}
