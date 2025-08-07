<?php

defined('BASEPATH') or exit('No direct script access allowed');


class Medical_record extends SYAM_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('App_model', 'default');
        $this->load->model('Masterdata_model', 'auto');
        $this->load->model('pasien/Pasien_model', 'pasien');
    }

    function index()
    {
        $data['active'] = 'Medical Record';
        $data['modules'] = $this->default->getDataModules($this->session->userdata('id_account_group'));
        $is_login = $this->session->userdata('is_login');

        if ($is_login === true) :
            $data['hospital'] = $this->default->getDataHospital();
            $this->load->view('layouts/index', $data);

        else :
            redirect('/');

        endif;
    }

    function cetak_label_berkas_rekam_medik($id_pasien = NULL, $size = '1', $format = 'print')
    {
       $data['title'] = 'Label Berkas Pasien';
       $data['size'] = $size;
       if ($id_pasien != NULL) :
        $data['pasien'] = $this->pasien->getDataPasienWithRM($id_pasien);
           if (0 < count((array)$data['pasien'])) :
               switch ($format) {
                   case 'print':
                       $this->load->view('printing/label_rekam_medik', $data);
                        break;
                    case 'json':
                        exit(json_encode($data));
                    default:
                        $this->load->view('printing/label_rekam_medik', $data);
                        break;
               }
           endif;
       endif;
    }

    function cetak_label_gelang($id_pasien = NULL, $format = 'print')
    {
        if ($id_pasien != NULL) :
            $data['title'] = 'Label Gelang Pasien';
            $data['pasien'] = $this->pasien->getDataPasienWithRM($id_pasien);
            if (0 < count((array)$data['pasien'])) :
                switch ($format) {
                    case 'print':
                        $this->load->view('printing/label_gelang', $data);
                            break;
                        case 'json':
                            exit(json_encode($data));
                        default:
                            $this->load->view('printing/label_gelang', $data);
                            break;
                }
            endif;
       endif;
    }

    function cetak_label_ranap($id_pasien = NULL, $format = 'print')
    {
        if ($id_pasien != NULL) :
            $data['title'] = 'Label Rawat Inap';
            $data['pasien'] = $this->pasien->getDataPasienWithRM($id_pasien);
            if (0 < count((array)$data['pasien'])) :
                switch ($format) {
                    case 'print':
                        $this->load->view('printing/label_ranap', $data);
                            break;
                        case 'json':
                            exit(json_encode($data));
                        default:
                            $this->load->view('printing/label_ranap', $data);
                            break;
                }
            endif;
       endif;
    }
}
