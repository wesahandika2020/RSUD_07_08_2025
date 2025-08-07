<?php

defined('BASEPATH') or exit('No direct script access allowed');


class Eklaim_bpjs extends SYAM_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->model('App_model', 'default');
    $this->load->model('Masterdata_model', 'auto');
    $this->load->model('Eklaim_bpjs_auto_model', 'eklaim_bpjs_auto');
    $this->load->model('Eklaim_bpjs_model', 'eklaim_bpjs');
    $this->load->model('Eklaim_bpjs_detail_model', 'm_detail_eklaim');
  }

  function index()
  {
    $data['active'] = 'Configs';
    $data['modules'] = $this->default->getDataModules($this->session->userdata('id_account_group'));
    $is_login = $this->session->userdata('is_login');

    if ($is_login === true) :
      $data['hospital'] = $this->default->getDataHospital();
      $this->load->view('layouts/index', $data);

    else :
      redirect('/');

    endif;
  }

  function page_eklaim_bpjs()
  {
    // $data['cara_masuk'] = $this->eklaim_bpjs_auto->getCaraMasukEklaim();
    // $data['cob_list'] = $this->eklaim_bpjs_auto->getListCOB();
    // $data['metode_bayar'] = $this->eklaim_bpjs_auto->getMetodeBayar();
    // $data['cara_pulang'] = $this->eklaim_bpjs_auto->getCaraPulang();
    // $data['kode_tarif'] = $this->eklaim_bpjs_auto->getKodeTarif();

    // $this->load->view('index', $data);
    $this->load->view('index');
  }

  function page_coding_grouping($noRM = null)
  {
    $data['no_rm'] = $noRM;
    $data['cara_masuk'] = $this->eklaim_bpjs_auto->getCaraMasukEklaim();
    $data['cob_list'] = $this->eklaim_bpjs_auto->getListCOB();
    $data['metode_bayar'] = $this->eklaim_bpjs_auto->getMetodeBayar();
    $data['cara_pulang'] = $this->eklaim_bpjs_auto->getCaraPulang();
    $data['kode_tarif'] = $this->eklaim_bpjs_auto->getKodeTarif();

    $this->load->view('coding-grouping/index', $data);
  }

  function page_kirim_data_online()
  {
    $data['jenis_pelayanan'] = ['' => 'Pilih...', '1' => 'Rawat Inap', '2' => 'Rawat Jalan'];
    $this->load->view('kirim-data-online/index', $data);
  }

  function page_laporan_eklaim()
  {
    $data['cara_masuk'] = $this->eklaim_bpjs_auto->getCaraMasukEklaim();
    $data['cob_list'] = $this->eklaim_bpjs_auto->getListCOB();
    $data['metode_bayar'] = $this->eklaim_bpjs_auto->getMetodeBayar();
    $data['cara_pulang'] = $this->eklaim_bpjs_auto->getCaraPulang();
    $data['kode_tarif'] = $this->eklaim_bpjs_auto->getKodeTarif();
    $data['cob'] = $this->eklaim_bpjs_auto->getListCOB();

    $this->load->view('laporan-terkirim/index', $data);
  }

  function modal_eklaim($id, $jenisRawat)
  {
    $data['cara_masuk'] = $this->eklaim_bpjs_auto->getCaraMasukEklaim();
    $data['cob_list'] = $this->eklaim_bpjs_auto->getListCOB();
    $data['metode_bayar'] = $this->eklaim_bpjs_auto->getMetodeBayar();
    $data['cara_pulang'] = $this->eklaim_bpjs_auto->getCaraPulang();
    $data['kode_tarif'] = $this->eklaim_bpjs_auto->getKodeTarif();
    $data['cob'] = $this->eklaim_bpjs_auto->getListCOB();

    $this->load->model('pendaftaran/Pendaftaran_model', 'm_pendaftaran');
    $this->load->model('keuangan/Keuangan_model', 'm_keuangan');
    $this->load->model('rekap_billing/Rekap_billing_model', 'm_rekap_billing');
    $this->load->model('pengkodean_icd_x/Pengkodean_icd_x_model', 'm_pengkodean_icd_x');

    $data['pendaftaran'] = [];
    $data['eclaim'] = [];
    $data['pendaftaran'] = $this->m_detail_eklaim->getPendaftaranByIdPendaftaran($id);
    $data['status_eklaim'] = $this->m_detail_eklaim->getEklaim($id);
    $data['status_eklaim']->response = json_decode($data['status_eklaim']->response, true);
    $data['status_grouper'] = $this->m_detail_eklaim->getDataGrouper($id);
    $data['apgar_score'] = $this->db->get_where('sm_apgar_score', ['id_pendaftaran' => ($id)])->row();
    $data['data_kelahiran'] = $this->m_detail_eklaim->getKelahiranEklaim($id);
    $data['eclaim'] = $this->m_detail_eklaim->getDetailEkalim($id);
    // $data['diagnosa_full'] = $this->m_pengkodean_icd_x->getDiagnosa($this->get('id_layanan_pendaftaran'));
    // $data['kode_diagnosa'] = $this->m_pengkodean_icd_x->getKodeDiagnosa($id);
    // $data['diagnosa_utama'] = $this->m_pengkodean_icd_x->getDiagnosaUtama($id);
    // $data['diagnosa_sekunder'] = $this->m_pengkodean_icd_x->getDiagnosaSekunder($id);
    // TAG BARU
    $data['diagnosa'] = $this->m_detail_eklaim->getDiagnosa($id);
    $data['procedure'] = $this->m_detail_eklaim->getProsedur($id);
    // $data['kode_prosedur_tindakan'] = $this->m_pengkodean_icd_x->getKodeProsedurTindakan($id);
    // $data['prosedur_tindakan'] = $this->m_pengkodean_icd_x->getProsedurTindakan($id);
    $data['tindakan_ok'] = $this->m_pengkodean_icd_x->getProsedureTindakanOK($id);
    $data['tindakan_lab'] = $this->m_pengkodean_icd_x->getProsedureTindakanLab($id);
    $data['tindakan_rad'] = $this->m_pengkodean_icd_x->getProsedureTindakanRad($id);

    $this->load->view('modal_grouping/index_eklaim', $data);
  }


  // LAPORAN EKLAIM
  public function export_rekap_xlsx()
  {
    $search = [
      'jenis_rawat'           => safe_get('jenis_rawat_lap'),
      'periode'               => safe_get('periode_lap'),
      'tanggal_awal'          => safe_get('tanggal_awal_lap'),
      'tanggal_akhir'         => safe_get('tanggal_akhir_lap'),
      'metode_bayar'          => safe_get('metode_bayar_lap'),
      'kelas_rawat'           => safe_get('kelas_rawat_lap'),
      'cara_pulang'           => safe_get('cara_pulang_lap'),
      'jenis_tarif'           => safe_get('jenis_tarif_lap'),
      'cob'                   => safe_get('cob_lap'),
      'tanggal_awal_grouper'  => safe_get('tanggal_awal_grouper'),
      'tanggal_akhir_grouper' => safe_get('tanggal_akhir_grouper'),
      'petugas_klaim'         => safe_get('petugas_klaim'),
      'order_by'              => safe_get('order_by'),
    ];

    $data                   = $this->eklaim_bpjs->getLaporanEklaim(0, 0, $search);
    $data['parameter']      = $search;

    $this->load->view('laporan-terkirim/download/rekap-xlsx.php', $data);
  }

  public function export_rekap_pdf()
  {
    $this->load->library('pdf');
    $this->load->model('medical_check_up/Hasil_pemeriksaan_mcu_model', 'm_hasil_mcu');

    $search = [
      'jenis_rawat'           => safe_get('jenis_rawat_lap'),
      'periode'               => safe_get('periode_lap'),
      'tanggal_awal'          => safe_get('tanggal_awal_lap'),
      'tanggal_akhir'         => safe_get('tanggal_akhir_lap'),
      'metode_bayar'          => safe_get('metode_bayar_lap'),
      'kelas_rawat'           => safe_get('kelas_rawat_lap'),
      'cara_pulang'           => safe_get('cara_pulang_lap'),
      'jenis_tarif'           => safe_get('jenis_tarif_lap'),
      'cob'                   => safe_get('cob_lap'),
      'tanggal_awal_grouper'  => safe_get('tanggal_awal_grouper'),
      'tanggal_akhir_grouper' => safe_get('tanggal_akhir_grouper'),
      'petugas_klaim'         => safe_get('petugas_klaim'),
      'order_by'              => safe_get('order_by'),
    ];

    $data                   = $this->eklaim_bpjs->getLaporanEklaim(0, 0, $search);
    $data['parameter']      = $search;

    // Tangkap output HTML dari view
    ob_start();
    $this->load->view('laporan-terkirim/download/rekap-pdf.php', $data);
    $html = ob_get_clean();
    ob_clean();

    // Set opsi PDF
    $font = base_url() . 'vendor/dompdf/dompdf/fonts/verdana.ttf';  // Ganti dengan path font yang Anda ingin gunakan
    $this->pdf->setPaper('A4', 'landscape');
    $this->pdf->set_option('isHtml5ParserEnabled', true);
    $this->pdf->set_option('isRemoteEnabled', true);
    $this->pdf->set_option('defaultMediaType', 'all');
    $this->pdf->set_option('isFontSubsettingEnabled', true);
    $this->pdf->set_option('isPhpEnabled', true); // Aktifkan PHP di dalam HTML
    $this->pdf->set_option('fontPath', $font);
    $this->pdf->set_option('fontFamily', 'Verdana');
    $this->pdf->set_option('debugPng', true);
    $this->pdf->set_option('debugKeepTemp', true);

    // Muat konten HTML
    $this->pdf->loadHTML($html);

    // Render PDF
    $this->pdf->render();

    $tglAwal = str_replace('/', '-', $search['tanggal_awal']);
    $tglAkhir = str_replace('/', '-', $search['tanggal_akhir']);
    // Nama file PDF
    $file_name = 'Laporan Eklaim - ' . $tglAwal . ' s.d ' . $tglAkhir . '.pdf';

    // Stream PDF ke browser
    $this->pdf->stream($file_name, ["Attachment" => false]);


    // $this->load->view('laporan-terkirim/download/rekap-xlsx.php', $data);
  }
}
