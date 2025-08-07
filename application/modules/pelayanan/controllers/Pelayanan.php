<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pelayanan extends SYAM_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('App_model', 'm_default');
        $this->load->model('pendaftaran/Pendaftaran_model', 'm_pendaftaran');
        $this->load->model('pelayanan/Pelayanan_model', 'm_pelayanan');
        $this->load->model('pendaftaran/Pendaftaran_model', 'klinik');

    }

    function printing_surat_rujukan() 
    {
        $id_pendaftaran = $this->input->get('id_pendaftaran', true);
        $id_layanan_pendaftaran = $this->input->get('id_layanan_pendaftaran', true);
        $nama_dokter_tujukan = $this->input->get('dokter', true);

        $data = $this->m_pendaftaran->getPendaftaranDetail($id_pendaftaran, $id_layanan_pendaftaran);
        $data['anamnesa'] = $this->m_pelayanan->getAnamnesa($id_layanan_pendaftaran);
        $data['diagnosa'] = $this->m_pelayanan->getDiagnosaPemeriksaan($id_layanan_pendaftaran);
        $data['resep'] = $this->m_pelayanan->getResepByIdLayanan($id_layanan_pendaftaran);
        $data['tindakan'] = $this->m_pelayanan->getTindakanPemeriksaan($id_layanan_pendaftaran);
        $data['title'] = 'SURAT RUJUKAN';
        $data['hospital'] = $this->m_default->getDataHospital();
        $data['nama_dokter_tujuan'] = $nama_dokter_tujukan;
        $this->load->view('printing/cetak_surat_rujukan', $data);
    }

    function printing_resume_keperawatan() {

        $id = $this->input->get('id', true);
        $id_pendaftaran = $this->input->get('id_pendaftaran', true);
        $id_layanan_pendaftaran = $this->input->get('id_layanan_pendaftaran', true);

        $pendaftaran = $this->klinik->getPendaftaranDetail($id_pendaftaran);

        if (count((array) $pendaftaran['pasien']) < 1) :
            die();
        endif;

        $data['pasien'] = $pendaftaran['pasien'];
        $data['pasien']->kelamin == 'P' ? $data['pasien']->kelamin = 'Perempuan' : $data['pasien']->kelamin = 'Laki-laki';
        $data['ruangan'] = $pendaftaran['layanan'][count($pendaftaran['layanan']) - 1]->bangsal;

        
        // $data['pasien'] = $this->m_pendaftaran->getPendaftaranDetail($id_pendaftaran, $id_layanan_pendaftaran);
        $data['hospital'] = $this->m_default->getDataHospital();
        $data['resume_keperawatan'] = $this->m_pelayanan->getResume($id);
        // ACEH
		$diagUtamaAwal = $this->m_pelayanan->getDiagnosaUtamaAwal($id_pendaftaran);
		$diagManualAwal = $this->m_pelayanan->getDiagnosaManualAwal($id_pendaftaran);
		$data['diagnosa_awal'] = isset($diagUtamaAwal[0]->nama) ? $diagUtamaAwal[0]->nama : $diagManualAwal[0]->nama ?? null;

		// $diagUtamaAkhir = $this->m_pelayanan->getDiagnosaUtamaAkhir($id_pendaftaran);
		// $diagManualAkhir = $this->m_pelayanan->getDiagnosaManualAkhir($id_pendaftaran);
		// $mergedArray = array_merge($diagUtamaAkhir, $diagManualAkhir);
		// usort($mergedArray, function($a, $b) {
		// 	if(is_array($a) && is_array($b)){
		// 		return $b['id_layanan_pendaftaran'] <=> $a['id_layanan_pendaftaran'];
		// 	}
		// 	return $b->id_layanan_pendaftaran <=> $a->id_layanan_pendaftaran;
		// });
		// $data['diagnosa_akhir'] = $mergedArray[0]->nama ?? null;

        // TAMBAHAN WH
        $data['diagnosa_utama'] = [];
        $diagnosa_utamas = $this->m_pelayanan->getDiagnosa($id_pendaftaran);
        if (!empty($diagnosa_utamas)) {
            $data['diagnosa_utama'] = $diagnosa_utamas;
        }
        $data['ds_manual_utama'] = [];
        $ds_manual_utamas = $this->m_pelayanan->getDiagnosaManualUtama($id_pendaftaran);
        if (!empty($ds_manual_utamas)) {
            $data['ds_manual_utama'] = $ds_manual_utamas;
        }
        $data['diagnosa_sekunder'] = [];
        $ds_manual_sekunders = $this->m_pelayanan->getDiagnosaSekunder($id_pendaftaran);
        if (!empty($ds_manual_sekunders)) {
            $data['diagnosa_sekunder'] = $ds_manual_sekunders;
        }
        $data['ds_manual_sekunder'] = [];
        $ds_manual_sekunders = $this->m_pelayanan->getDiagnosaManualSekunder($id_pendaftaran);
        if (!empty($ds_manual_sekunders)) {
            $data['ds_manual_sekunder'] = $ds_manual_sekunders;
        }
		$terapiResume1  = $this->m_pelayanan->getTerapiPulang($id_layanan_pendaftaran);
		foreach ($terapiResume1 as $value) {
			$value->nama_obat = $value->barang_auto;
		}
		$terapiResume2 = $this->m_pelayanan->getObatTerapiPulang($id_layanan_pendaftaran);
		$data['terapi_pulang'] = array_merge($terapiResume2, $terapiResume1);
		// ACEH
        $data['kontrol_kembali']  = $this->m_pelayanan->getKontrolKembali($id_layanan_pendaftaran);
        
        $this->load->view('printing/cetak_resume_keperawatan', $data);

    }
    
    function printing_cppt($id_pendaftaran, $id_layanan_pendaftaran, $type = null)
    {
        $data = $this->m_pendaftaran->getPendaftaranDetail($id_pendaftaran, $id_layanan_pendaftaran);
        $list_cppt = $this->m_pelayanan->getCPPTDetail($id_pendaftaran, $id_layanan_pendaftaran);
        $data['cppt'] = [];
        foreach ($list_cppt as $value) {
            $data['cppt'][$value->id_layanan_pendaftaran][]=$value;
        }

        if ($type == 'data') {
            return $data;
        } else if ($type == 'view') {
            $this->load->view('printing/view_cppt', $data);
        } else {
            $this->load->view('printing/cetak_cppt', $data);
        }
    }
	
	function printing_tanda_vital($id_pendaftaran, $id_layanan_pendaftaran, $type = null)
    {
        $data = $this->m_pendaftaran->getPendaftaranDetail($id_pendaftaran, $id_layanan_pendaftaran);
        $data['tanda_vital'] = $this->m_pelayanan->getTandaVital($id_layanan_pendaftaran);
        $this->load->view('printing/cetak_tanda_vital', $data);
    }
}
