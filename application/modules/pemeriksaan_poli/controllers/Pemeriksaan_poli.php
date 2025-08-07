<?php

defined('BASEPATH') or exit('No direct script access allowed');


class Pemeriksaan_poli extends SYAM_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('App_model', 'default');
        $this->load->model('Masterdata_model', 'auto');
        $this->load->model('Protokol_terapi_model', 'protokol');
        $this->load->model('rekam_medis/Rekam_medis_model', 'rekam_medis');
        $this->load->model('pendaftaran/Pendaftaran_model', 'klinik');
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

    function page_pemeriksaan_poli()
    {
        $this->load->model('pelayanan/Pelayanan_model', 'pelayanan');
        $data['kelas_tindakan']      = '1';
        $data['jenis_tindakan']      = 'Rawat Jalan';
        $data['jenis_tindak_lanjut'] = '';
        $data['poli']                = (int) $this->session->userdata('poli');
        $data['group']               = $this->session->userdata('account_group');
        $data['kelas']               = $this->auto->getDataKelas();
        $data['profesi']             = $this->auto->getProfesi();
        $data['kondisi_keluar']      = $this->auto->getKondisiKeluar();
        $data['tindak_lanjut']       = $this->pelayanan->getTindakLanjut();
        $data['layanan']             = $this->auto->getLayananRegistration(null);

        $data['klinik']              = '';
        $klinik = $this->auto->getSpesialisasi($this->session->userdata('id_spesialis'));
        if (0 < count((array)$klinik)) :
            $data['klinik'] = $klinik->nama;
        endif;

        $data['jenis']              = 'Poliklinik';
        $data['jenis_igd']          = $this->auto->getJenisIGD();
        $data['hospital']           = $this->default->getDataHospital();
        $data['jenis_kasus']        = $this->auto->getJenisKasusDiagnosa();
        $data['status_pemeriksaan'] = $this->auto->getStatusPemeriksaan(true);
        $data['kelas_rawat']        = $this->auto->getOpsiKelasInacbg(false);
        $data['status_gizi']        = $this->auto->getStatusGizi();
        $data['bangsal']            = $this->auto->getDataBangsalReady();
        unset($data['bangsal']['']);
		$data['shifpoli']           = $this->auto->shiftPoli();

        $this->load->view('index', $data);
    }

    function cetak_riwayat_program_terapi($JSON = NULL)
    {
        $id_kunjungan = $this->input->get('id_kunjungan', true);
        $id_layanan_pendaftaran = $this->input->get('id_layanan_pendaftaran', true);
        if ($id_kunjungan !== NULL | $id_kunjungan !== '') :
            $data['title'] = 'Riwayat Program Terapi';
            $data['hospital'] = $this->default->getDataHospital();
            $data['pasien'] = $this->protokol->getDataPasienKunjungan($id_kunjungan);
            $data['dokter'] = $this->protokol->getDoctorName($id_layanan_pendaftaran);
            $data['riwayat'] = $this->protokol->getDataRiwayatKunjungan($id_kunjungan);

            $this->load->view('pemeriksaan_poli/kunjungan/cetak/cetak_riwayat_program_terapi', $data);

        endif;
    }

    function cetak_checklist_penerimaan_pasien_rawat_inap($id)
    {
        if ($id !== null) :
            $checklistPenerimaanPasien = $this->rekam_medis->getChecklistPenerimaanPasienRawatInapById($id);
            $data['checklist_penerimaan_pasien'] = $checklistPenerimaanPasien[0];

            $data['checklist_penerimaan_pasien']->kelamin_pasien == 'P' ? $data['checklist_penerimaan_pasien']->kelamin_pasien = 'Perempuan' : $data['checklist_penerimaan_pasien']->kelamin_pasien = 'Laki-laki';

            if ($data['checklist_penerimaan_pasien']->is_pasien == 1) {
                $data['ttd_pasien_title'] = 'Pasien';
                $data['ttd_pasien_name'] = $data['checklist_penerimaan_pasien']->nama_pasien;
            } else if ($data['checklist_penerimaan_pasien']->is_pasien == 0) {
                $data['ttd_pasien_title'] = 'Keluarga';
                $data['ttd_pasien_name'] = $data['checklist_penerimaan_pasien']->nama_keluarga;
            }

            $this->load->view('pemeriksaan_poli/printing/checklist_penerimaan_pasien_rawat_inap', $data);
        endif;
    }

    // function cetak_pemberian_informasi($id)
    // {
    //     if ($id !== null) :
    //         $pemberianInformasi = $this->rekam_medis->getPemberianInformasiById($id);
    //         $data['pemberian_informasi'] = $pemberianInformasi[0];

    //         $data['pemberian_informasi']->kelamin == 'P' ? $data['pemberian_informasi']->kelamin = 'Perempuan' : $data['pemberian_informasi']->kelamin = 'Laki-laki';

    //         if ($pemberianInformasi[0]->is_pasien == '1') {
    //             $data['ttd_pasien_name'] = $data['pemberian_informasi']->nama_pasien;
    //         } else {
    //             $data['ttd_pasien_name'] = $pemberianInformasi[0]->nama_keluarga;
    //         }

    //         $this->load->view('pemeriksaan_poli/printing/pemberian_informasi', $data);
    //     endif;
    // }


    // PI +
    // function cetak_pemberian_informasi($id)
    // {
    //     if ($id !== null) :
    //         $pemberianInformasi = $this->rekam_medis->getPemberianInformasiById($id);
    //         $data['pemberian_informasi'] = $pemberianInformasi[0];
    //         $data['pemberian_informasi']->kelamin == 'P' ? $data['pemberian_informasi']->kelamin = 'Perempuan' : $data['pemberian_informasi']->kelamin = 'Laki-laki';
    //         $data['is_pasien'] = $pemberianInformasi[0]->is_pasien;
    //         if ($pemberianInformasi[0]->is_pasien == '1') {
    //             $data['ttd_pasien_name'] = $data['pemberian_informasi']->nama_pasien;
    //             $data['ttd_pemberi_informasi'] = $pemberianInformasi[0]->pemberi_informasi;
    //             $data['ttd_penerima_informasi'] = $pemberianInformasi[0]->penerima_informasi;
    //         } else {
    //             $data['ttd_pasien_name'] = $pemberianInformasi[0]->nama_keluarga;
    //             $data['ttd_pemberi_informasi'] = $pemberianInformasi[0]->pemberi_informasi;
    //             $data['ttd_penerima_informasi'] = $pemberianInformasi[0]->penerima_informasi;
    //         }
    //         $this->load->view('pemeriksaan_poli/printing/pemberian_informasi', $data);
    //     endif;
    // }


    function cetak_skrining_resiko_jatuh_rajal($id)
    {
        if ($id !== null) :
            $skriningRajal = $this->rekam_medis->getSkriningResikoJatuhRajalById($id);
            $data['skrining_resiko_jatuh_rajal'] = $skriningRajal[0];

            $data['skrining_resiko_jatuh_rajal']->kelamin == 'P' ? $data['skrining_resiko_jatuh_rajal']->kelamin = 'Perempuan' : $data['skrining_resiko_jatuh_rajal']->kelamin = 'Laki-laki';

            $this->load->view('pemeriksaan_poli/printing/skrining_resiko_jatuh_rajal', $data);
        endif;
    }

    function cetak_form_rehab_medik($id)
    {
        // var_dump($id);die;
        if ($id !== null) :
            $formRehabMedik = $this->protokol->getCetakFormRehabMedik($id);
            $data['form_rehab_medik'] = $formRehabMedik[0];

            $this->load->view('pemeriksaan_poli/printing/form_rehab_medik', $data);
        endif;
    }

    function cetak_detail_rehab_medik($id)
    {
        // var_dump($id);die;
        if ($id !== null) :
            $formRehabMedik = $this->protokol->getCetakDetailHistoryRehabMedik($id);
            $data['detail_rehab_medik'] = $formRehabMedik[0];

            $this->load->view('pemeriksaan_poli/printing/history_rehab_medik', $data);
        endif;
    }

    function cetak_penolakan_tindakan_kedokteran($id)
    {
        if ($id !== null) :
            $penolakanTindakanKedokteran = $this->rekam_medis->getPenolakanTindakanKedokteranById($id);
            $data['penolakan_tindakan_kedokteran'] = $penolakanTindakanKedokteran[0];

            if ($penolakanTindakanKedokteran[0]->is_pasien == '1') {
                $data['ttd_pasien_title'] = 'saya sendiri';
                $data['ttd_pasien_name'] = $data['penolakan_tindakan_kedokteran']->nama_pasien;
                $data['ttd_pasien_tgl_lahir'] = datefmysql($data['penolakan_tindakan_kedokteran']->tanggal_lahir_pasien);
                $data['ttd_pasien_kelamin'] = $data['penolakan_tindakan_kedokteran']->kelamin_pasien;
                $data['ttd_pasien_alamat'] = $data['penolakan_tindakan_kedokteran']->alamat_pasien;
            } else {
                $data['ttd_pasien_title'] = $penolakanTindakanKedokteran[0]->hubungan_keluarga;
                $data['ttd_pasien_name'] = $penolakanTindakanKedokteran[0]->nama_keluarga;
                $data['ttd_pasien_tgl_lahir'] = datefmysql($penolakanTindakanKedokteran[0]->tanggal_lahir);
                $data['ttd_pasien_kelamin'] = $penolakanTindakanKedokteran[0]->jenis_kelamin;
                $data['ttd_pasien_alamat'] = $penolakanTindakanKedokteran[0]->alamat;
            }

            $this->load->view('pemeriksaan_poli/printing/penolakan_tindakan_kedokteran', $data);
        endif;
    }

    function cetak_persetujuan_tindakan_anestesi($id)
    {
        if ($id !== null) :
            $persetujuanTindakanAnestesi = $this->rekam_medis->getPersetujuanTindakanAnestesiById($id);
            $data['persetujuan_tindakan_anestesi'] = $persetujuanTindakanAnestesi[0];

            if ($persetujuanTindakanAnestesi[0]->is_pasien == '1') {
                $data['ttd_pasien_title'] = 'saya sendiri';
                $data['ttd_pasien_name'] = $data['persetujuan_tindakan_anestesi']->nama_pasien;
                $data['ttd_pasien_tgl_lahir'] = datefmysql($data['persetujuan_tindakan_anestesi']->tanggal_lahir_pasien);
                $data['ttd_pasien_kelamin'] = $data['persetujuan_tindakan_anestesi']->kelamin_pasien;
                $data['ttd_pasien_alamat'] = $data['persetujuan_tindakan_anestesi']->alamat_pasien;
            } else {
                $data['ttd_pasien_title'] = $persetujuanTindakanAnestesi[0]->hubungan_keluarga;
                $data['ttd_pasien_name'] = $persetujuanTindakanAnestesi[0]->nama_keluarga;
                $data['ttd_pasien_tgl_lahir'] = datefmysql($persetujuanTindakanAnestesi[0]->tanggal_lahir);
                $data['ttd_pasien_kelamin'] = $persetujuanTindakanAnestesi[0]->jenis_kelamin;
                $data['ttd_pasien_alamat'] = $persetujuanTindakanAnestesi[0]->alamat;
            }

            $this->load->view('pemeriksaan_poli/printing/persetujuan_tindakan_anestesi', $data);
        endif;
    }

    function cetak_persetujuan_tindakan_kedokteran($id)
    {
        if ($id !== null) :
            $persetujuanTindakanKedokteran = $this->rekam_medis->getPersetujuanTindakanKedokteranById($id);
            $data['persetujuan_tindakan_kedokteran'] = $persetujuanTindakanKedokteran[0];

            if ($persetujuanTindakanKedokteran[0]->is_pasien == '1') {
                $data['ttd_pasien_title'] = 'saya sendiri';
                $data['ttd_pasien_name'] = $data['persetujuan_tindakan_kedokteran']->nama_pasien;
                $data['ttd_pasien_tgl_lahir'] = datefmysql($data['persetujuan_tindakan_kedokteran']->tanggal_lahir_pasien);
                $data['ttd_pasien_kelamin'] = $data['persetujuan_tindakan_kedokteran']->kelamin_pasien;
                $data['ttd_pasien_alamat'] = $data['persetujuan_tindakan_kedokteran']->alamat_pasien;
            } else {
                $data['ttd_pasien_title'] = $persetujuanTindakanKedokteran[0]->hubungan_keluarga;
                $data['ttd_pasien_name'] = $persetujuanTindakanKedokteran[0]->nama_keluarga;
                $data['ttd_pasien_tgl_lahir'] = datefmysql($persetujuanTindakanKedokteran[0]->tanggal_lahir);
                $data['ttd_pasien_kelamin'] = $persetujuanTindakanKedokteran[0]->jenis_kelamin;
                $data['ttd_pasien_alamat'] = $persetujuanTindakanKedokteran[0]->alamat;
            }

            $this->load->view('pemeriksaan_poli/printing/persetujuan_tindakan_kedokteran', $data);
        endif;
    }

    function cetak_persetujuan_tindakan_operasi($id)
    {
        if ($id !== null) :
            $persetujuanTindakanOperasi = $this->rekam_medis->getPersetujuanTindakanOperasiById($id);
            $data['persetujuan_tindakan_operasi'] = $persetujuanTindakanOperasi[0];

            if ($persetujuanTindakanOperasi[0]->is_pasien == '1') {
                $data['ttd_pasien_title'] = 'saya sendiri';
                $data['ttd_pasien_name'] = $data['persetujuan_tindakan_operasi']->nama_pasien;
                $data['ttd_pasien_tgl_lahir'] = datefmysql($data['persetujuan_tindakan_operasi']->tanggal_lahir_pasien);
                $data['ttd_pasien_kelamin'] = $data['persetujuan_tindakan_operasi']->kelamin_pasien;
                $data['ttd_pasien_alamat'] = $data['persetujuan_tindakan_operasi']->alamat_pasien;
            } else {
                $data['ttd_pasien_title'] = $persetujuanTindakanOperasi[0]->hubungan_keluarga;
                $data['ttd_pasien_name'] = $persetujuanTindakanOperasi[0]->nama_keluarga;
                $data['ttd_pasien_tgl_lahir'] = datefmysql($persetujuanTindakanOperasi[0]->tanggal_lahir);
                $data['ttd_pasien_kelamin'] = $persetujuanTindakanOperasi[0]->jenis_kelamin;
                $data['ttd_pasien_alamat'] = $persetujuanTindakanOperasi[0]->alamat;
            }

            $this->load->view('pemeriksaan_poli/printing/persetujuan_tindakan_operasi', $data);
        endif;
    }

    function cetak_surat_keterangan_kematian($id)
    {
        if ($id !== null) :
            $pendaftaran = $this->klinik->getPendaftaranDetail($id);

            if (count((array) $pendaftaran['pasien']) < 1) :
                die();
            endif;

            $data['pasien'] = $pendaftaran['pasien'];
            $data['pasien']->kelamin == 'P' ? $data['pasien']->kelamin = 'Perempuan' : $data['pasien']->kelamin = 'Laki-laki';

            $suratKeteranganKematian = $this->rekam_medis->getSuratKeteranganKematianById($id);
            $data['surat_keterangan_kematian'] = $suratKeteranganKematian[0];

            $this->load->view('pendaftaran_poli/printing/surat_keterangan_kematian', $data);
        endif;
    }

    function cetak_resume_medis($id, $type = null)
    {
        // $this->load->model('rawat_inap/Rawat_inap_model', 'm_rawat_inap');

        if (!$id) :
            exit();
        endif;


        if ($id !== null) :
            $data['pemeriksaan_fisik'] = '';
            $data['diagnosa_utama'] = '';
            $data['diagnosa_sekunder'] = '';
            $data['diagnosa_manual_utama'] = '';
            $data['diagnosa_manual_sekunder'] = '';
            $data['pengobatan'] = '';
            $data['s_soap'] = '';
            $data['o_soap'] = '';
            $data['a_soap'] = '';
            $data['p_soap'] = '';
            $data['subject'] = '';
            $data['objective'] = '';
            $data['assessment'] = '';
            $data['plan'] = '';
            $data['keluhan_utama'] = '';
            $data['tindakan'] = '';
            $data['tindakan_ok'] = '';
            $data['tindakan_lab'] = '';
            $data['tindakan_rad'] = '';
            $data['diet'] = '';

            $data['pasien'] = $this->db->select(" ps.id no_rm, ps.nama nama_pasien,ps.tanggal_lahir, case when ps.kelamin='P' then 'Perempuan' else 'Laki-Laki' end kelamin, pd.tanggal_daftar, pd.tanggal_keluar,pj.nama as penjamin, ps.alergi, sp.nama as ruang_asal, pg.nama dokter_dpjp, pg.tanda_tangan, pd.jenis_rawat, pd.jenis_pendaftaran, lp.tindak_lanjut, lp.jenis_layanan, rms.diagnosa_awal_masuk, rms.hasil_konsultasi, rms.pending_lab ")
                ->from('sm_pasien ps')
                ->join('sm_pendaftaran pd', 'ps.id=pd.id_pasien')
                ->join('sm_layanan_pendaftaran lp', 'pd.id=lp.id_pendaftaran')
                ->join('sm_resume_medis_ranap as rms', 'rms.id_layanan_pendaftaran = lp.id', 'left')
                ->join('sm_spesialisasi as sp', 'sp.id = lp.id_unit_layanan', 'left')
                ->join('sm_penjamin as pj', 'pj.id = pd.id_penjamin', 'left')
                ->join('sm_tenaga_medis tm', 'lp.id_dokter = tm.id', 'left')
                ->join('sm_pegawai pg', 'tm.id_pegawai = pg.id', 'left')
                ->where('lp.id', $id, true)
                ->get()
                ->row();

            // $data['rawat_inap'] = $this->db->select('ri.*, bg.nama as nama_bangsal, k.nama as nama_kelas, pj.nama as penjamin, pa.nama as nama_pasien, pd.no_register, pa.tanggal_lahir, pa.kelamin, lp.tindak_lanjut as status, lp.kondisi')
            //     ->from('sm_rawat_inap as ri')
            //     ->join('sm_layanan_pendaftaran as lp', 'lp.id = ri.id_layanan_pendaftaran')
            //     ->join('sm_pendaftaran as pd', 'pd.id = lp.id_pendaftaran')
            //     ->join('sm_pasien as pa', 'pa.id = pd.id_pasien')
            //     ->join('sm_bangsal as bg', 'bg.id = ri.id_bangsal')
            //     ->join('sm_kelas as k', 'k.id = ri.id_kelas')
            //     ->join('sm_penjamin as pj', 'pj.id = ri.id_penjamin', 'left')
            //     ->where('lp.id', $id, true)
            //     ->get()
            //     ->row();

            $data['intensive_care'] = $this->db->select('ri.*, bg.nama as nama_bangsal, k.nama as nama_kelas, pj.nama as penjamin, pa.nama as nama_pasien, pd.no_register, pa.tanggal_lahir, pa.kelamin, lp.tindak_lanjut as status, lp.kondisi')
                ->from('sm_intensive_care as ri')
                ->join('sm_layanan_pendaftaran as lp', 'lp.id = ri.id_layanan_pendaftaran')
                ->join('sm_pendaftaran as pd', 'pd.id = lp.id_pendaftaran')
                ->join('sm_pasien as pa', 'pa.id = pd.id_pasien')
                ->join('sm_bangsal as bg', 'bg.id = ri.id_bangsal')
                ->join('sm_kelas as k', 'k.id = ri.id_kelas')
                ->join('sm_penjamin as pj', 'pj.id = ri.id_penjamin', 'left')
                ->where('lp.id', $id, true)
                ->get()
                ->row();

            $data['kajian_ranap'] = $this->db->select('kmr.*, kmr.keluhan_utama, kmr.riwayat_penyakit_sekarang, kmr.riwayat_penyakit_terdahulu, riwayat_penyakit_keluarga, kmr.pengobatan, kmr.riwayat, kmr.hasil_laboratorium, kmr.hasil_radiologi, kmr.hasil_penunjang_lain, kmr.diagnosa_awal ')
                ->from('sm_kajian_medis_ranap as kmr')
                ->join('sm_layanan_pendaftaran as lp', 'lp.id = kmr.id_layanan_pendaftaran')
                ->where('lp.id', $id, true)
                ->get()
                ->row();

            $data['kajian_icare'] = $this->db->select('kmr.*, kmr.keluhan_utama, kmr.riwayat_penyakit_sekarang, kmr.riwayat_penyakit_terdahulu, riwayat_penyakit_keluarga, kmr.pengobatan, kmr.riwayat, kmr.hasil_laboratorium, kmr.hasil_radiologi, kmr.hasil_penunjang_lain, kmr.diagnosa_awal ')
                ->from('sm_kajian_medis_icare as kmr')
                ->join('sm_layanan_pendaftaran as lp', 'lp.id = kmr.id_layanan_pendaftaran')
                ->where('lp.id', $id, true)
                ->get()
                ->row();

            $data['anamnesa'] = $this->db->select(" keluhan_utama, riwayat_penyakit_sekarang, riwayat_penyakit_dahulu, riwayat_penyakit_keluarga, anamnesa_sosial, pemeriksaan_penunjang, keadaan_umum, kesadaran, gcs, rr, suhu, tensi_sistolik as sistolik, tensi_diastolik as diastolik, nadi, nps, tinggi_badan, berat_badan, kepala, leher, thorax, pulmo, cor, abdomen, genitalia, ekstrimitas, prognosis, status_mentalis, lingkar_kepala, status_gizi, telinga, hidung, tenggorok, mata, kulit_kelamin, usul_tindak_lanjut, s_soap, o_soap, a_soap, p_soap ")
                ->from('sm_anamnesa an')
                ->join('sm_layanan_pendaftaran lp', 'an.id_layanan_pendaftaran=lp.id')
                ->join('sm_pendaftaran p', 'p.id=lp.id_pendaftaran', 'left')
                ->where('lp.id', $id, true)
                ->get()
                ->row();

            if ($data['anamnesa'] != NULL) {
                $anam = $data['anamnesa'];
                $data['s_soap'] = 'S: ' . $anam->s_soap;
                $data['o_soap'] = 'O: ' . $anam->o_soap;
                $data['a_soap'] = 'A: ' . $anam->a_soap;
                $data['p_soap'] = 'P: ' . $anam->p_soap;
            }

            $data['soap'] = $this->db->select(" subject, objective, assessment, plan ")
                ->from('sm_soap so')
                ->join('sm_layanan_pendaftaran lp', 'so.id_layanan_pendaftaran=lp.id')
                ->join('sm_pendaftaran p', 'p.id=lp.id_pendaftaran', 'left')
                ->where('lp.id', $id, true)
                ->get()
                ->row();

            if ($data['soap'] != NULL) {
                $soap = $data['soap'];
                $data['subject'] = 'S: ' . $soap->subject;
                $data['objective'] = 'O: ' . $soap->objective;
                $data['assessment'] = 'A: ' . $soap->assessment;
                $data['plan'] = 'P: ' . $soap->plan;
            }

            $data['terapi_pulang'] = $this->db->select("tp.*, b.nama as nama_obat")
                ->from('sm_resume_medis_terapi_pulang as tp')
                ->join('sm_barang as b', 'b.id = tp.obat')
                ->where('tp.id_layanan_pendaftaran', $id, true)
                ->get()
                ->result();

            $data['jadwal_kontrol'] = $this->db->select("kr.*, kr.tanggal_kontrol, 
            CASE
                WHEN to_char(kr.tanggal_kontrol, 'd')='2' THEN 'Senin'
                WHEN to_char(kr.tanggal_kontrol, 'd')='3' THEN 'Selasa'
                WHEN to_char(kr.tanggal_kontrol, 'd')='4' THEN 'Rabu'
                WHEN to_char(kr.tanggal_kontrol, 'd')='5' THEN 'Kamis'
                WHEN to_char(kr.tanggal_kontrol, 'd')='6' THEN 'Jumat'
                WHEN to_char(kr.tanggal_kontrol, 'd')='7' THEN 'Sabtu'
                WHEN to_char(kr.tanggal_kontrol, 'd')='1' THEN 'Minggu'
            END as hari, pg.nama as nama_dokter")
                ->from('sm_resume_medis_kontrol_ranap as kr')
                ->join('sm_tenaga_medis as tm', 'tm.id = kr.id_ek_nama_dokter')
                ->join('sm_pegawai as pg', 'pg.id = tm.id_pegawai')
                ->where('kr.id_layanan_pendaftaran', $id, true)
                ->get()
                ->result();

            // if ($data['kajian_perawatan'] != NULL) {
            //     if ($data['kajian_perawatan']->alergi != NULL) {
            //         $data['kajian_perawatan']->alergi == 0 ? $data['kajian_perawatan']->alergi == 'Tidak Ada' : 'Ada';
            //     }

            //     $encodeKesadaran = json_decode($data['kajian_perawatan']->kesadaran);

            //     if ($encodeKesadaran->composmentis == 1) {
            //         $kesadaran = 'Composmentis';
            //     } else if ($encodeKesadaran->apatis == 1) {
            //         $kesadaran = 'Apatis';
            //     } else if ($encodeKesadaran->samnolen == 1) {
            //         $kesadaran = 'Samnolen';
            //     } else if ($encodeKesadaran->sopor == 1) {
            //         $kesadaran = 'Sopor';
            //     } else if ($encodeKesadaran->koma == 1) {
            //         $kesadaran = 'Koma';
            //     } else if ($encodeKesadaran->koma == NULL) {
            //         $kesadaran = '';
            //     }

            //     $gcs = $encodeKesadaran->gcs_e || $encodeKesadaran->gcs_m || $encodeKesadaran->gcs_v;

            //     $data['pemeriksaan_fisik'] = 'Kesadaran: ' . $kesadaran . ', GCS: ' . $gcs . ', E: ' . $encodeKesadaran->gcs_e . ', M: ' . $encodeKesadaran->gcs_m . ', V:' . $encodeKesadaran->gcs_v . ', TD: ' . $data['kajian_perawatan']->tensi_sistolik_awal . '/' . $data['kajian_perawatan']->tensi_diastolik_awal . 'mmHg, RR: ' . $data['kajian_perawatan']->nafas_awal . ' x/m, N: ' . $data['kajian_perawatan']->nadi_awal . ' x/m, T: ' . $data['kajian_perawatan']->suhu_awal . 'c';
            // }

            $resume_keperawatan = $this->db->select('rk.diet_khusus')
                ->from('sm_resume_keperawatan as rk')
                ->where('rk.id_layanan_pendaftaran', $id, true)
                ->get()
                ->row();

            if ($resume_keperawatan != NULL) {
                $encodeDietKhusus = json_decode($resume_keperawatan->diet_khusus);

                $data['diet'] = $encodeDietKhusus->diet_khusus;
            }


            if ($data['pasien']->alergi != NULL) {
                $data['pasien']->alergi == 0 ? $data['pasien']->alergi == 'Tidak Ada' : 'Ada';
            }

            $diagnosa_utamas = $this->db->select(" concat_ws ('. ', ( SELECT gss.kode_icdx_rinci FROM sm_golongan_sebab_sakit AS gss WHERE gss.ID = d.id_pengkodean ), ( SELECT gss.kode_icdx_rinci FROM sm_golongan_sebab_sakit AS gss WHERE gss.ID = d.id_pengkodean_asterik ), gss.nama ) AS nama ")
                ->from('sm_diagnosa as d')
                ->join('sm_golongan_sebab_sakit as gss', 'gss.id = d.id_golongan_sebab_sakit')
                ->where('d.id_layanan_pendaftaran', $id, true)
                ->where('prioritas', 'Utama')
                ->get()
                ->result();

            foreach ($diagnosa_utamas as $diagnosa_utama) {
                $data['diagnosa_utama'] .= $diagnosa_utama->nama . '. ' . '<br>';
            }

            $diagnosa_manual_utamas = $this->db->select(" concat_ws ('. ', ( SELECT gss.kode_icdx_rinci FROM sm_golongan_sebab_sakit AS gss WHERE gss.ID = d.id_pengkodean ), ( SELECT gss.kode_icdx_rinci FROM sm_golongan_sebab_sakit AS gss WHERE gss.ID = d.id_pengkodean_asterik ), d.golongan_sebab_sakit_lain ) AS nama ")
                ->from('sm_diagnosa as d')
                ->where('d.id_layanan_pendaftaran', $id, true)
                ->where('prioritas', 'Utama')
                ->where('d.diagnosa_manual', '1')
                ->get()
                ->result();

            foreach ($diagnosa_manual_utamas as $diagnosa_manual_utama) {
                $data['diagnosa_manual_utama'] .= $diagnosa_manual_utama->nama . '. ' . '<br>';
            }

            $diagnosa_sekunders = $this->db->select("distinct concat_ws ('. ', ( SELECT gss.kode_icdx_rinci FROM sm_golongan_sebab_sakit AS gss WHERE gss.ID = d.id_pengkodean ), ( SELECT gss.kode_icdx_rinci FROM sm_golongan_sebab_sakit AS gss WHERE gss.ID = d.id_pengkodean_asterik ), gss.nama ) AS nama ")
                ->from('sm_diagnosa as d')
                ->join('sm_golongan_sebab_sakit as gss', 'gss.id = d.id_golongan_sebab_sakit')
                ->where('d.id_layanan_pendaftaran', $id, true)
                ->where('prioritas', 'Sekunder')
                ->get()
                ->result();

            foreach ($diagnosa_sekunders as $diagnosa_sekunder) {
                $data['diagnosa_sekunder'] .= $diagnosa_sekunder->nama . '. ' . '<br>';
            }

            $diagnosa_manual_sekunders = $this->db->select("distinct concat_ws ('. ', ( SELECT gss.kode_icdx_rinci FROM sm_golongan_sebab_sakit AS gss WHERE gss.ID = d.id_pengkodean ), ( SELECT gss.kode_icdx_rinci FROM sm_golongan_sebab_sakit AS gss WHERE gss.ID = d.id_pengkodean_asterik ), d.golongan_sebab_sakit_lain ) AS nama ")
                ->from('sm_diagnosa as d')
                ->where('d.id_layanan_pendaftaran', $id, true)
                ->where('prioritas', 'Sekunder')
                ->where('d.diagnosa_manual', '1')
                ->get()
                ->result();

            foreach ($diagnosa_manual_sekunders as $diagnosa_manual_sekunder) {
                $data['diagnosa_manual_sekunder'] .= $diagnosa_manual_sekunder->nama . '. ' . '<br>';
            }

            $pengobatans = $this->db->select("concat ( br.nama_lengkap, ' (', rs.aturan_pakai, ')', CASE WHEN rs.keterangan_resep IS NULL THEN '' ELSE concat(' Keterangan Resep: ', rs.keterangan_resep) END ) AS nama")
                ->from('sm_resep_r_detail as rsd')
                ->join('sm_resep_r as rs', 'rs.id = rsd.id_resep_r', 'left')
                ->join('sm_resep as rp', 'rp.id = rs.id_resep', 'left')
                ->join('sm_barang as br', 'br.id = rsd.id_barang')
                ->where('rp.id_layanan_pendaftaran', $id, true)
                ->where('br.id_kategori', '1')
                ->get()
                ->result();

            // foreach ($pengobatans as $pengobatan) {
            //     $data['pengobatan'] .= $pengobatan->nama . '. ';
            // }
            $spasiPengobatan = [];

            foreach ($pengobatans as $pengobatan) {
                $obatKecil = $pengobatan->nama;
                $spasiPengobatan[$pengobatan->nama] = $this->filterOlower($obatKecil);
            }

            if (!empty($spasiPengobatan)) {
                $filterNamaObat = array_unique($spasiPengobatan);

                $data['pengobatan'] = '';

                foreach ($filterNamaObat as $i => $obat) {
                    $data['pengobatan'] .= $i . '. ';
                }
            } else {
                $data['pengobatan'] = '';
            }

            $tindakans = $this->db->select(" concat( case when ttp.id_pengkodean is null then '' else '[' end, ( SELECT tp.code FROM sm_icd_ix AS tp WHERE tp.ID = ttp.id_pengkodean ), case when ttp.id_pengkodean is null then '' else '] ' end, pl.nama) as nama ")
                ->from('sm_tarif_tindakan_pasien as ttp')
                ->join('sm_tarif_pelayanan as tpl', 'tpl.id = ttp.id_tarif_pelayanan')
                ->join('sm_layanan as pl', 'pl.id = tpl.id_layanan')
                ->where('ttp.id_layanan_pendaftaran', $id, true)
                ->get()
                ->result();

            // foreach ($tindakans as $tindakan) {
            //     $data['tindakan'] .= $tindakan->nama . '. ' . '<br>';
            // }
            foreach ($tindakans as $tindakan) {

                $huKecil = strtolower($tindakan->nama);

                $tindakanNama[] = $this->filterOlower($huKecil);
            }

            $filterNama = array_unique($tindakanNama);

            foreach ($filterNama as $key) {

                $data['tindakan'] .= $key . '. ' . '<br>';
            }

            $tindakans_ok = $this->db->select(" concat( case when too.id_pengkodean is null then '' else '[' end, ( SELECT tp.code FROM sm_icd_ix AS tp WHERE tp.ID = too.id_pengkodean ), case when too.id_pengkodean is null then '' else '] ' end, pl.nama) as nama ")
                ->from('sm_tarif_operasi as too')
                ->join('sm_jadwal_kamar_operasi as jko', 'jko.id = too.id_operasi')
                ->join('sm_tarif_pelayanan as tpl', 'tpl.id = too.id_tarif')
                ->join('sm_layanan as pl', 'pl.id = tpl.id_layanan')
                ->where('jko.id_layanan_pendaftaran', $id, true)
                ->get()
                ->result();

            foreach ($tindakans_ok as $tindakan_ok) {
                $data['tindakan_ok'] .= '<u>' . $tindakan_ok->nama . '</u>' . '*. ' . '<br>';
            }

            $tindakans_lab = $this->db->select(" concat( case when dlab.id_pengkodean is null then '' else '[' end, ( SELECT tp.code FROM sm_icd_ix AS tp WHERE tp.ID = dlab.id_pengkodean ), case when dlab.id_pengkodean is null then '' else '] ' end, pl.nama) as nama ")
                ->from('sm_detail_laboratorium as dlab')
                ->join('sm_laboratorium as lab', 'lab.id = dlab.id_laboratorium')
                ->join('sm_order_laboratorium as olab', 'olab.id = lab.id_order_laboratorium')
                ->join('sm_tarif_pelayanan as tpl', 'tpl.id = dlab.id_tarif')
                ->join('sm_layanan as pl', 'pl.id = tpl.id_layanan')
                ->where('lab.id_layanan_pendaftaran = ', $id, true)
                ->get()
                ->result();

            foreach ($tindakans_lab as $tindakan_lab) {
                $data['tindakan_lab'] .= '<u>' . $tindakan_lab->nama . '</u>' . '*. ' . '<br>';
            }

            $tindakans_rad = $this->db->select(" concat( case when drad.id_pengkodean is null then '' else '[' end, ( SELECT tp.code FROM sm_icd_ix AS tp WHERE tp.ID = drad.id_pengkodean ), case when drad.id_pengkodean is null then '' else '] ' end, pl.nama) as nama ")
                ->from('sm_detail_radiologi as drad')
                ->join('sm_radiologi as rad', 'rad.id = drad.id_radiologi')
                ->join('sm_order_radiologi as orad', 'orad.id = rad.id_order_radiologi')
                ->join('sm_tarif_pelayanan as tpl', 'tpl.id = drad.id_tarif')
                ->join('sm_layanan as pl', 'pl.id = tpl.id_layanan')
                ->where('rad.id_layanan_pendaftaran', $id, true)
                ->get()
                ->result();

            foreach ($tindakans_rad as $tindakan_rad) {
                $data['tindakan_rad'] .= '<u>' . $tindakan_rad->nama . '</u>' . '*. ' . '<br>';
            }

            $resume_keperawatan = $this->db->select('rk.diet_khusus')
                ->from('sm_resume_keperawatan as rk')
                ->where('rk.id_layanan_pendaftaran', $id, true)
                ->get()
                ->row();

            if ($resume_keperawatan != NULL) {
                $encodeDietKhusus = json_decode($resume_keperawatan->diet_khusus);

                $data['diet'] = $encodeDietKhusus->diet_khusus;
            }

        endif;
        if ($type === 'data') {
            return $data;
        }

        $this->load->view('pemeriksaan_poli/printing/resume_medis', $data);
    }

    function cetak_tata_tertib_pasien($id)
    {
        if ($id !== null) :
            $tataTertib = $this->rekam_medis->getTataTertibById($id);
            $data['tata_tertib'] = $tataTertib[0];

            $data['tata_tertib']->kelamin_pasien == 'P' ? $data['tata_tertib']->kelamin_pasien = 'Perempuan' : $data['tata_tertib']->kelamin_pasien = 'Laki-laki';

            if ($data['tata_tertib']->is_pasien == 1) {
                $data['ttd_pasien_title'] = 'Pasien';
                $data['ttd_pasien_name'] = $data['tata_tertib']->nama_pasien;
            } else if ($data['tata_tertib']->is_pasien == 0) {
                $data['ttd_pasien_title'] = 'Keluarga';
                $data['ttd_pasien_name'] = $data['tata_tertib']->nama_keluarga;
            }

            $this->load->view('pemeriksaan_poli/printing/tata_tertib_pasien', $data);
        endif;
    }

    // SPR +++
    function cetak_surat_pengantar_rawat($id_pendaftaran, $type = 'print')
    {
        if ($id_pendaftaran !== NULL) :
            $pendaftaran = $this->klinik->getPendaftaranDetail($id_pendaftaran);
            if (count((array) $pendaftaran['pasien']) < 1) :
                die();
            endif;
            $data['pasien'] = $pendaftaran['pasien'];
            $data['pasien']->kelamin == 'P' ? $data['pasien']->kelamin = 'Perempuan' : $data['pasien']->kelamin = 'Laki-laki';
            $SuratPengantarRawat = $this->rekam_medis->getSuratPengantarRawatById($id_pendaftaran);
            // var_dump($SuratPengantarRawat);die;
            if (!empty($SuratPengantarRawat)) {
                $data['surat_pengantar_rawat'] = $SuratPengantarRawat[0];
                if ($SuratPengantarRawat[0]->is_pasien_spr == '1') {
                    $data['ttd_pasien_title'] = 'saya sendiri';
                    $data['ttd_pasien_name'] = $data['surat_pengantar_rawat']->nama_pasien;
                    $data['ttd_pasien_kelamin'] = $data['surat_pengantar_rawat']->kelamin_pasien;
                    $data['ttd_pasien_nomor'] = $data['surat_pengantar_rawat']->no_rm;
                    $data['ttd_pasien_umur'] = $data['surat_pengantar_rawat']->umur_pasien;
                } else {
                    $data['ttd_pasien_name'] = $SuratPengantarRawat[0]->nama_pasien_spr;
                    $data['ttd_pasien_kelamin'] = $SuratPengantarRawat[0]->j_spr;
                    $data['ttd_pasien_nomor'] = $SuratPengantarRawat[0]->no_rm_spr;
                    $data['ttd_pasien_umur'] = $SuratPengantarRawat[0]->umur_spr;
                }
            }

            if ($type === 'data') {
                return $data;
            } else {
                $this->load->view('pemeriksaan_poli/printing/surat_pengantar_rawat', $data);
            }
        endif;
    }

    function cetak_persetujuan_rawat_inap($id, $isPasien)
    {
        if ($id !== NULL) :
            $layananPendaftaran = $this->db->where('id', $id)->get('sm_layanan_pendaftaran')->row();
            $pendaftaran        = $this->klinik->getPendaftaranDetail($layananPendaftaran->id_pendaftaran);

            if (count((array) $pendaftaran['pasien']) < 1) :
                die();
            endif;

            $data['pasien'] = $pendaftaran['pasien'];
            $data['pasien']->kelamin == 'P' ? $data['pasien']->kelamin = 'Perempuan' : $data['pasien']->kelamin = 'Laki-laki';

            if ($isPasien == 'ya') {
                $data['ttd_pasien_title']     = '<b>saya sendiri</b>';
                $data['ttd_pasien_name']      = '<b>' . $data['pasien']->nama . '</b>';
                $data['ttd_pasien_tgl_lahir'] = '<b>' . datefmysql($data['pasien']->tanggal_lahir) . '</b>';
                $data['ttd_pasien_kelamin']   = '<b>' . $data['pasien']->kelamin . '</b>';
                $data['ttd_pasien_alamat']    = '<b>' . $data['pasien']->alamat . '</b>';
                $data['ttd_pasien_nik']       = '<b>' . $data['pasien']->no_identitas . '</b>';
            } else {
                $data['ttd_pasien_title']     = 'saya sendiri*/Suami/Isteri/Anak*/Ayah/Ibu* Saya';
                $data['ttd_pasien_name']      = '..........................................';
                $data['ttd_pasien_tgl_lahir'] = '.....................................................';
                $data['ttd_pasien_kelamin']   = 'Laki-laki/Perempuan*';
                $data['ttd_pasien_alamat']    = '.....................................................';
                $data['ttd_pasien_nik']       = '.....................................................';
            }
            $this->load->view('pemeriksaan_poli/printing/surat_persetujuan_rawat_inap', $data);

        endif;
    }

    public function ambil_profil_pasien($no_rm)
    {
        $this->load->model('Pemeriksaan_poli_model', 'pemeriksaan_poli');

        $data['profil']            = $this->pemeriksaan_poli->getDataProfilPasien($no_rm);
        $data['data']              = $this->pemeriksaan_poli->ambilDataKedatanganPRMRJ($no_rm);

        /*		highlight_string("<?php\n\$data =\n".var_export($data, true).";\n?>");die;*/

        $this->load->view('printing/profil_ringkas_medis_rawat_jalan', $data);
    }

    // SSCRJ 
    function cetak_surgical_safety_ceklist_rawat_jalan($id)
    {
        if ($id !== null) :
            $id_pendaftaran = $this->db->select('id_pendaftaran')->where('id', $id)->get('sm_layanan_pendaftaran')->row()->id_pendaftaran;
            $pendaftaran = $this->klinik->getPendaftaranDetail($id_pendaftaran);
            if (count((array) $pendaftaran['pasien']) < 1) :
                die();
            endif;
            $data['pasien'] = $pendaftaran['pasien'];
            $data['pasien']->kelamin == 'P' ? $data['pasien']->kelamin = 'Perempuan' : $data['pasien']->kelamin = 'Laki-laki';

            $surgicalSafetyCeklisRawatJalan = $this->rekam_medis->getSurgicalSafetyCeklistRawatJalanById($id);
            $data['surgical_safety_ceklist_rawat_jalan'] = $surgicalSafetyCeklisRawatJalan[0];
            // var_dump($data);die;
            $this->load->view('pemeriksaan_poli/printing/surgical_safety_ceklist_rawat_jalan', $data);
        endif;
    }



    // SKPM 
    function cetak_surat_keterangan_pemeriksaan_mata($id)
    {
        if ($id !== null) :
            $id_pendaftaran = $this->db->select('id_pendaftaran')->where('id', $id)->get('sm_layanan_pendaftaran')->row()->id_pendaftaran;
            $pendaftaran = $this->klinik->getPendaftaranDetail($id_pendaftaran);
            if (count((array) $pendaftaran['pasien']) < 1) :
                die();
            endif;
            $data['pasien'] = $pendaftaran['pasien'];
            $data['pasien']->kelamin == 'P' ? $data['pasien']->kelamin = 'Perempuan' : $data['pasien']->kelamin = 'Laki-laki';
            $SuratKeteranganPemeriksaanMata = $this->rekam_medis->getSuratKeteranganPemeriksaanMataById($id);
            $data['surat_keterangan_pemeriksaan_mata'] = $SuratKeteranganPemeriksaanMata[0];
            if ($SuratKeteranganPemeriksaanMata[0]->ya_skpm == '1') {
                $data['ttd_pasien_title'] = 'saya sendiri';
                $data['ttd_pasien_name'] = $data['surat_keterangan_pemeriksaan_mata']->nama_pasien;
                $data['ttd_pasien_kelamin'] = $data['surat_keterangan_pemeriksaan_mata']->kelamin_pasien;
                $data['ttd_pasien_nomor'] = $data['surat_keterangan_pemeriksaan_mata']->no_rm;
                $data['ttd_pasien_umur'] = $data['surat_keterangan_pemeriksaan_mata']->umur_pasien;
                $data['ttd_pasien_ktp'] = $data['surat_keterangan_pemeriksaan_mata']->no_identitas;
                $data['ttd_pasien_alamat'] = $data['surat_keterangan_pemeriksaan_mata']->alamat_pasien;
                $data['ttd_pasien_tlp'] = $data['surat_keterangan_pemeriksaan_mata']->telp;
            } else {
                $data['ttd_pasien_name'] = $SuratKeteranganPemeriksaanMata[0]->nama_skpm;
                $data['ttd_pasien_kelamin'] = $SuratKeteranganPemeriksaanMata[0]->skpm;
                $data['ttd_pasien_nomor'] = $SuratKeteranganPemeriksaanMata[0]->no_rm_skpm;
                $data['ttd_pasien_umur'] = $SuratKeteranganPemeriksaanMata[0]->usia_skpm;
                $data['ttd_pasien_ktp'] = $SuratKeteranganPemeriksaanMata[0]->ktp_skpm;
                $data['ttd_pasien_alamat'] = $SuratKeteranganPemeriksaanMata[0]->alamat_skpm;
                $data['ttd_pasien_tlp'] = $SuratKeteranganPemeriksaanMata[0]->tlp_skpm;
            }
            $this->load->view('pemeriksaan_poli/printing/surat_keterangan_pemeriksaan_mata', $data);
        endif;
    }

    function filterOlower($text)
    {

        $filter = trim(preg_replace('/[\t\n\r\s]+/', ' ', $text));

        return $filter;
    }
}
