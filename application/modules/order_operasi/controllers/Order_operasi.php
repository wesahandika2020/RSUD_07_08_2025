<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Order_operasi extends SYAM_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('App_model', 'm_default');
        $this->load->model('Masterdata_model', 'm_masterdata');
        $this->load->model('pelayanan/Pelayanan_model', 'm_pelayanan');
        $this->load->model('pendaftaran/Pendaftaran_model', 'klinik');

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

    function page_order_operasi()
    {   
        
        $data['hospital'] = $this->m_default->getDataHospital();
        $data['kelas_tindakan'] = '1';
        $data['jenis_tindakan'] = 'Rawat Jalan';
        $this->load->view('order_operasi/index', $data);
	}

    function page_permintaan_operasi()
    {
        $this->load->view('order_operasi/permintaan_operasi/index');
    }
    
    function page_data_operasi()
    {
        $data['kelas_tindakan'] = '1';
        $data['jenis_tindakan'] = 'Rawat Jalan';
        $this->load->view('order_operasi/operasi/index', $data);
	}

    function laporan_operasi($id, $id_pendaftaran, $id_layanan_pendaftaran, $type = null)
    {
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

        $this->load->model('order_operasi/Order_operasi_model', 'm_order_operasi');
        $data['laporan_operasi'] = $this->m_order_operasi->getLaporanOperasiByID($id);
        
        if ($type !== 'data') {
            $this->load->view('order_operasi/printing/cetak_laporan_operasi', $data);
        } else {
            return $data;
        }
    }

    
    // BKS
    function bukti_kondisi_sterilisasi($id_pendaftaran, $id){    
        // var_dump($id);die;  
        if (!$id) :
            exit();
        endif; 
        $pendaftaran = $this->klinik->getPendaftaranDetail($id_pendaftaran);         
        if (count((array) $pendaftaran['pasien']) < 1) :
            die();
        endif;          
        $data['layanan'] = $pendaftaran['layanan'];
        $data['pasien'] = $pendaftaran['pasien'];
        $data['pasien']->kelamin == 'P' ? $data['pasien']->kelamin = 'Perempuan' : $data['pasien']->kelamin = 'Laki-laki'; 
        $this->load->model('order_operasi/Order_operasi_model', 'm_order_operasi');
        $data['bukti_kondisi_sterilisasi'] = $this->m_order_operasi->getBuktiKondisiSterilisasiByID($id);   
        //   var_dump($data['bukti_kondisi_sterilisasi'][0]->dokter_bks_1);die;  untuk melihat bentuk araynya objek atau araay
        // var_dump($data['bukti_kondisi_sterilisasi']);die;
        $this->load->view('order_operasi/printing/cetak_bukti_kondisi_sterilisasi', $data);          
    }

    // laporan tindakan
    function laporan_tindakan($id, $id_pendaftaran, $id_layanan_pendaftaran, $type = null)
    {
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

        $this->load->model('order_operasi/Order_operasi_model', 'm_order_operasi');
        $data['lt'] = $this->m_order_operasi->getLTByID($id);
        // var_dump($data['lt']);die;
        
        if ($type !== 'data') {
            $this->load->view('order_operasi/printing/cetak_laporan_tindakan', $data);
        } else {
            return $data;
        }
    }

    // RH
    function rehabilitas_medik($id, $id_pendaftaran, $id_layanan_pendaftaran, $type = null){
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
        $this->load->model('order_operasi/Order_operasi_model', 'm_order_operasi');
        $data['rehabilitas_medik'] = $this->m_order_operasi->getRehabilitasMedikByID($id);
        $data['anamnesa'] = $this->m_order_operasi->getDataRehabilitasAnamnesa($id_pendaftaran); 
        $data['diagnosa'] = $this->m_order_operasi->getDataRehabilitasDiagnosa($id_pendaftaran); 
        $data['tindakan'] = $this->m_order_operasi->getDataRehabilitasTindakan($id_pendaftaran);   
        // var_dump($data['tindakan']);die;
        if ($type !== 'data') {
            $this->load->view('order_operasi/printing/cetak_rehabilitas_medik', $data);
        } else {
            return $data;
        }
    }

}