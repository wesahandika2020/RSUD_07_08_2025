<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Export_tarif extends SYAM_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Tarif_pelayanan_model', 'tapel');
        $this->load->model('layanan/Layanan_model', 'layanan');
        $this->load->model('instalasi/Instalasi_model', 'instalasi');
        $this->load->model('jenis_pemeriksaan/Jenis_pemeriksaan_model', 'jenispemeriksaan');
    }

    
    function tarif_pelayanan()
    {
        $search = [
            'nama'                 => safe_get('nama'),
            'id_layanan'           => safe_get('layanan'),
            'id_jenis_pemeriksaan' => safe_get('jenis_pemeriksaan'),
            'id_unit'              => safe_get('instalasi'),
            'kelas'                => safe_get('kelas'),
            'jenis'                => safe_get('jenis'),
        ];

        $data = $this->tapel->getListDataTarifPelayanan(NULL, NULL, $search);
        $parameter = '';

        if ($search['id_layanan'] !== '') :
            $query = $this->layanan->getDataLayananById($search['id_layanan']);
            if ($query) :
                $parameter .= ' ' . $query->nama;
            endif;
        endif;

        if ($search['id_unit'] !== '') :
            $query = $this->unit->getDataLayananById($search['id_unit']);
            if ($query) :
                $parameter .= ' ' . $query->nama;
            endif;
        endif;

        if ($search['kelas'] !== '') :
            $parameter .= ' kelas ' . $search['kelas'];
        endif;
        
        if ($search['id_jenis_pemeriksaan'] !== '') :
            $query = $this->jenispemeriksaan->getDataJenisPemeriksaanById($search['id_instalasi']);
            if ($query) :
                $parameter .= ' ' . $query->nama;
            endif;
        endif;
        
        if ($search['jenis'] !== '') :
            $parameter .= ' layanan ' . $search['jenis'];
        endif;

        $data['title'] = "Data Tarif " . $parameter;
        $this->load->view('tarif_pelayanan/export/export_tarif_pelayanan', $data);
        
    }
}
