<?php

defined('BASEPATH') or exit('No direct script access allowed');


class Pendaftaran_igd extends SYAM_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('App_model', 'default');
        $this->load->model('Masterdata_model', 'auto');
        $this->load->model('opendata/Opendata_model', 'opendata');
        $this->load->model('pendaftaran/Pendaftaran_model', 'klinik');
        $this->load->model('rekam_medis/Rekam_medis_model', 'rekam_medis');
        $this->load->model('Pendaftaran_igd_model', 'm_pendaftaran_igd');
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

    private function getHakKelasBPJS()
    {
        $data = array(
            ''          => '--Pilih Hak Kelas--',
            'Non Kleas' => 'Non Kelas',
            'KELAS I'   => 'KELAS I',
            'KELAS II'  => 'KELAS II',
            'KELAS III' => 'KELAS III',
            'VIP'       => 'VIP',
        );

        return $data;
    }

    function page_pendaftaran_igd()
    {
        $data['jenis_pelayanan'] = '2';
        $data['agama']           = $this->auto->getAgama();
        $data['etnis']           = $this->auto->getEtnis();
        $data['kelamin']         = $this->auto->getKelamin();
        $data['jenis_igd']       = $this->auto->getJenisIGD();
        $data['domisili']        = $this->auto->getDomisili();
        $data['asal_masuk']      = $this->auto->getAsalMasuk();
        $data['cara_bayar']      = $this->auto->getCaraBayar();
        $data['kunjungan']       = $this->auto->getKunjungan();
        $data['pekerjaan']       = $this->auto->getPekerjaan();
        $data['pendidikan']      = $this->auto->getPendidikan();
        $data['statuspasien']    = $this->auto->getStatusPasien();
        $data['goldarah']        = $this->auto->getGolonganDarah();
        $data['pernikahan']      = $this->auto->getStatusPernikahan();
        $data['hamkom']          = $this->auto->getHambatanKomunikasi();
        $data['layanan']         = $this->auto->getLayananRegistration(null);
        $data['hak_kelas']       = $this->getHakKelasBPJS();
        $this->load->model('panggil_pasien/Panggil_pasien_model', 'call');
        $data['filter_advance']  = $this->call->getFilterLoket();

        $this->load->view('index', $data);
    }

    function cetak_label_berkas_igd($id_pendaftaran)
    {
        if ($id_pendaftaran !== null) :
            $data['title'] = 'KARTU PASIEN';
            $data['hospital'] = $this->default->getDataHospital();
            $pendaftaran = $this->klinik->getPendaftaranDetail($id_pendaftaran);
            if (count((array) $pendaftaran['pasien']) < 1) :
                die();
            endif;
            // echo json_encode($pendaftaran); die;
            $data['pasien'] = $pendaftaran['pasien'];

            // echo json_encode($data); die;
            $this->load->view('pendaftaran_igd/printing/label_berkas_igd', $data);
        endif;
    }

    private function penanggung_jawab($id)
	{
		return $this->db->select('p.nama_pjwb, p.telp_pjwb, p.alamat_pjwb, p.nik_pjwb, p.kelamin_pjwb, p.tgl_lahir_pjwb, p.hubungan_pjwb')
			->from('sm_layanan_pendaftaran lp')
			->join('sm_pendaftaran p', 'p.id = lp.id_pendaftaran')
			->where('lp.id', $id)->get()->row();
	}

    function cetak_persetujuan_rawat_inap($id, $type = null)
    {
        if ($id !== NULL) :
            $layananPendaftaran = $this->db->where('id', $id)->get('sm_layanan_pendaftaran')->row();
            $pendaftaran        = $this->klinik->getPendaftaranDetail($layananPendaftaran->id_pendaftaran);

            if (count((array) $pendaftaran['pasien']) < 1) :
                die();
            endif;

            $data['pasien'] = $pendaftaran['pasien'];
            $data['pasien']->kelamin == 'P' ? $data['pasien']->kelamin = 'Perempuan' : $data['pasien']->kelamin = 'Laki-laki';

            $this->load->model('Pendaftaran_igd_model', 'm_pedaftaran_igd');
            $persetujuan = $this->m_pedaftaran_igd->getSuratPersetujuanRawatInap($layananPendaftaran->id_pendaftaran);
            $penanggungjawab = $this->penanggung_jawab($id);

            $jenis_kelamin = '';
            $hubungan_keluarga = '';
            $tanggal_lahir = '';

            if ($persetujuan->jenis_kelamin) {
                $jenis_kelamin = $persetujuan->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan';
            }

            if ($penanggungjawab->kelamin_pjwb) {
                $jenis_kelamin = $penanggungjawab->kelamin_pjwb == 'L' ? 'Laki-laki' : 'Perempuan';
            }

            if ($persetujuan->hubungan_keluarga) {
                $hubungan_keluarga = ucfirst(strtolower($persetujuan->hubungan_keluarga));
            }

            if ($penanggungjawab->hubungan_pjwb) {
                $hubungan_keluarga = ucfirst(strtolower($penanggungjawab->hubungan_pjwb));
            }

            if ($persetujuan->tanggal_lahir) {
                $tanggal_lahir = date('d/m/Y', strtotime($persetujuan->tanggal_lahir));
            }

            if ($penanggungjawab->tgl_lahir_pjwb) {
                $tanggal_lahir = date('d/m/Y', strtotime($penanggungjawab->tgl_lahir_pjwb));
            }

            $data['ttd_pasien_title']     = $hubungan_keluarga;
            $data['ttd_pasien_name']      = $persetujuan->nama ?? $penanggungjawab->nama_pjwb;
            $data['ttd_pasien_tgl_lahir'] = $tanggal_lahir;
            $data['ttd_pasien_kelamin']   = $jenis_kelamin;
            $data['ttd_pasien_alamat']    = $persetujuan->alamat ?? $penanggungjawab->alamat_pjwb;
            $data['ttd_pasien_nik']       = $persetujuan->identitas ?? $penanggungjawab->nik_pjwb;
            $data['dirawat_di']           = $persetujuan->dirawat_di;
            $data['saksi']                = $persetujuan->nama_saksi;

            if ($type !== 'data') {
                $this->load->view('pendaftaran_igd/printing/surat_persetujuan_rawat_inap', $data);
            } else {
                return $data;
            }

        endif;
    }

    public function cetak_identitas_pasien($id)
    {
        $layananPendaftaran = $this->db->where('id', $id)->get('sm_layanan_pendaftaran')->row();
        $data = $this->m_pendaftaran_igd->getIdentitasPasien($layananPendaftaran->id_pendaftaran);

        $this->load->view('pendaftaran_igd/printing/identitas_pasien', $data);
    }

    public function cetak_persetujuan_umum($id)
    {
        $data = $this->m_pendaftaran_igd->getPersetujuanUmumById($id);

        $this->load->view('pendaftaran_igd/printing/persetujuan_umum', $data);
    }

    public function cetak_ringkasan_riwayat_masuk_dan_keluar($id)
    {
        $data = $this->m_pendaftaran_igd->getRingkasanRiwayatMasukDanKeluarById($id);

        $this->load->view('pendaftaran_igd/printing/ringkasan_riwayat_masuk_dan_keluar', $data[0]);
    }

    function printing_edukasi($id_pendaftaran = NULL, $id_layanan_pendaftaran = NULL)
    {
        if ($id_pendaftaran === NULL | $id_layanan_pendaftaran === NULL) {
            exit;
        }

        $this->load->model('pendaftaran/Pendaftaran_model', 'm_pendaftaran');
        $data = $this->m_pendaftaran->getPendaftaranDetail($id_pendaftaran, $id_layanan_pendaftaran);
        $data["title"] = "FORMULIR EDUKASI PASIEN DAN KELUARGA TERINTEGRASI";
        $data["hospital"] = $this->default->getDataHospital();
        // FEPDKT
        $data['edukasi'] = $this->m_pendaftaran_igd->getEdukasi($id_pendaftaran);
        // $data['edukasi'] = $this->m_pelayanan->getEdukasi($id_layanan_pendaftaran);
        $this->load->view('printing/cetak_form_edukasi', $data);
    }

    // SPPIP
    function penanggung_jawabt($id){
        return $this->db->select("p.nama_pjwb, p.telp_pjwb, p.alamat_pjwb, p.nik_pjwb, p.kelamin_pjwb, p.tgl_lahir_pjwb, date_part('year', age(p.tgl_lahir_pjwb)) as umur, p.hubungan_pjwb")
			->from('sm_layanan_pendaftaran lp')
			->join('sm_pendaftaran p', 'p.id = lp.id_pendaftaran')
			->where('lp.id', $id)->get()->row();
	}

    // SPPIP BARU
    function cetak_surat_peryataan_pembaharuan_identitas_pasien($id){
        if ($id !== NULL) :
            $layananPendaftaran = $this->db->where('id', $id)->get('sm_layanan_pendaftaran')->row();
            $pendaftaran        = $this->klinik->getPendaftaranDetail($layananPendaftaran->id_pendaftaran);
            if (count((array) $pendaftaran['pasien']) < 1) :
                die();
            endif;
            $data['pasien'] = $pendaftaran['pasien'];
            $data['pasien']->kelamin == 'P' ? $data['pasien']->kelamin = 'Perempuan' : $data['pasien']->kelamin = 'Laki-laki';
            $this->load->model('Pendaftaran_igd_model', 'm_pedaftaran_igd');
            $persetujuan = $this->m_pedaftaran_igd->getSuratPeryataanPembaharuanIdentitasPasien($layananPendaftaran->id_pendaftaran);
            $penanggung_jawab = $this->penanggung_jawabt($id);
            if ($persetujuan->tgl_lahir_sppip) {
                $tgl_lahir_sppip = date('d/m/Y', strtotime($persetujuan->tgl_lahir_sppip));
            }
            $data['ttd_pasien_nama']                    = $persetujuan->nama_sppip;
            $data['ttd_pasien_tanggal_lahir']           = $tgl_lahir_sppip;
            $data['ttd_umur']                           = $persetujuan->umur_sppip;
            $data['ttd_jenis_kelamin']                  = $persetujuan->jk_sppip;
            $data['ttd_pasien_ktp']                     = $persetujuan->no_ktp_sppip;
            $data['ttd_alamat']                         = $persetujuan->alamat_sppip;
            $data['ttd_no_hp']                          = $persetujuan->no_hp_sppip;
            $data['ttd_hubungan_keluarga']              = $persetujuan->hubungan_pasien_sppip;
            $data['ttd_pasien_tgl']                     = $persetujuan->tgl_sppip;
            // var_dump($penanggungjawab);die;
            $this->load->view('pendaftaran_igd/printing/cetak_surat_peryataan_pembaharuan_identitas_pasien', $data);
        endif;
    }

    // FORM PRDNR
    function cetak_surat_penolakan_resusitas($id){
        if ($id !== NULL) :       
            $layananPendaftaran = $this->db->where('id', $id)->get('sm_layanan_pendaftaran')->row();           
            $pendaftaran        = $this->klinik->getPendaftaranDetail($layananPendaftaran->id_pendaftaran);
            if (count((array) $pendaftaran['pasien']) < 1) :
                die();
            endif;
            $data['pasien'] = $pendaftaran['pasien'];
            $data['pasien']->kelamin == 'P' ? $data['pasien']->kelamin = 'Perempuan' : $data['pasien']->kelamin = 'Laki-laki';
            $this->load->model('Pendaftaran_igd_model', 'm_pedaftaran_igd');
            // $formpenolakan = $this->m_pedaftaran_igd->getSuratPenolakanResusitas($layananPendaftaran->id_pendaftaran); di ubah jadi id doank
            $formpenolakan = $this->m_pedaftaran_igd->getSuratPenolakanResusitas($layananPendaftaran->id);
            $data['ttd_pelaksana_dokter']               = $formpenolakan->nama_dokter_1;
            $data['ttd_pemberi_dokter']                 = $formpenolakan->nama_dokter_2;
            $data['ttd_penerima_informasi']             = $formpenolakan->penerima_form_1;
            $data['ttd_diagnosis']                      = $formpenolakan->diagnosis_form;
            $data['ttd_tanda_1']                        = $formpenolakan->tanda_form_1;
            $data['ttd_alasan']                         = $formpenolakan->alasan_form;
            $data['ttd_tanda_2']                        = $formpenolakan->tanda_form_2;
            $data['ttd_tata']                           = $formpenolakan->tata_form;
            $data['ttd_tanda_3']                        = $formpenolakan->tanda_form_3;
            $data['ttd_tujuan']                         = $formpenolakan->tujuan_form;
            $data['ttd_tanda_4']                        = $formpenolakan->tanda_form_4;
            $data['ttd_risiko']                         = $formpenolakan->resiko_form;
            $data['ttd_tanda_5']                        = $formpenolakan->tanda_form_5;
            $data['ttd_prognosis']                      = $formpenolakan->prognosis_form;
            $data['ttd_tanda_6']                        = $formpenolakan->tanda_form_6;
            $data['ttd_alternatif']                     = $formpenolakan->alternatif_form;
            $data['ttd_tanda_7']                        = $formpenolakan->tanda_form_7;
            $data['ttd_hal']                            = $formpenolakan->hal_form;
            $data['ttd_tanda_8']                        = $formpenolakan->tanda_form_8;   
            // var_dump($formpenolakan);die;     
            $this->load->view('pendaftaran_igd/printing/cetak_surat_penolakan_resusitas', $data);
        endif;
    }

    // PRDNR
    function cetak_form_surat_penolakan_resusitas($id){
        if ($id !== NULL) :
            $layananPendaftaran = $this->db->where('id', $id)->get('sm_layanan_pendaftaran')->row();
            $pendaftaran        = $this->klinik->getPendaftaranDetail($layananPendaftaran->id_pendaftaran);
            if (count((array) $pendaftaran['pasien']) < 1) :
                die();
            endif;
            $data['pasien'] = $pendaftaran['pasien'];
            $data['pasien']->kelamin == 'P' ? $data['pasien']->kelamin = 'Perempuan' : $data['pasien']->kelamin = 'Laki-laki';
            $this->load->model('Pendaftaran_igd_model', 'm_pedaftaran_igd');
            $penolakan = $this->m_pedaftaran_igd->getSuratPenolakanResusitas($layananPendaftaran->id);
            $data['penolakan_resusitas'] = $penolakan;

            if ($penolakan->pr_prdnr == '1') {
                $data['ttd_pasien_title'] = 'saya sendiri';
                $data['ttd_pasien_name'] = $data['penolakan_resusitas']->nama_pasien;
                $data['ttd_pasien_tgl_lahir'] = datefmysql($data['penolakan_resusitas']->tanggal_lahir_pasien);
                $data['ttd_pasien_kelamin'] = $data['penolakan_resusitas']->kelamin_pasien;
                $data['ttd_pasien_alamat'] = $data['penolakan_resusitas']->alamat_pasien;
            } else {
                $data['ttd_pasien_title'] = $penolakan->hubungan_keluarga_prdnr;
                $data['ttd_pasien_name'] = $penolakan->nama_prdnr;
                $data['ttd_pasien_tgl_lahir'] = datefmysql($penolakan->tgl_lahir_prdnr);
                $data['ttd_pasien_kelamin'] = $penolakan->jk_prdnr;
                $data['ttd_pasien_alamat'] = $penolakan->alamat_prdnr;
            }
            // var_dump($penolakan);die;
            $this->load->view('pendaftaran_igd/printing/cetak_form_surat_penolakan_resusitas', $data);
        endif;
    }

    // TPERS 
    function cetak_transfer_pasien_ekstra_rs($id){
        // var_dump($id);die;
        if ($id !== NULL) :    
            $layananPendaftaran = $this->db->where('id', $id)->get('sm_layanan_pendaftaran')->row();             
            $pendaftaran        = $this->klinik->getPendaftaranDetail($layananPendaftaran->id_pendaftaran);
            if (count((array) $pendaftaran['pasien']) < 1) :
                die();
            endif;
            $data['pasien'] = $pendaftaran['pasien'];
            $data['layanan'] = $pendaftaran['layanan'];

            // var_dump($data['layanan']);die;
            // var_dump($data['layanan'][1]);die;
            // var_dump($data['layanan'][1]->bangsal);die;

            $data['pasien']->kelamin == 'P' ? $data['pasien']->kelamin = 'Perempuan' : $data['pasien']->kelamin = 'Laki-laki';
            $this->load->model('Pendaftaran_igd_model', 'm_pedaftaran_igd');
            $formtpers = $this->m_pedaftaran_igd->getTransferPasienExstraRS($layananPendaftaran->id);
            $data['ttd_ceklis_tpers_1']                     = $formtpers->ceklis_tpers_1;
            $data['ttd_rs_dituju_tpers']                    = $formtpers->rs_dituju_tpers;
            $data['ttd_ceklis_tpers_2']                     = $formtpers->ceklis_tpers_2;
            $data['ttd_ruang_tpers']                        = $formtpers->ruang_tpers;
            $data['ttd_ceklis_tpers_3']                     = $formtpers->ceklis_tpers_3;
            $data['ttd_dokter_sp_tpers']                    = $formtpers->dokter_sp_tpers;
            $data['ttd_staf_tpers']                         = $formtpers->staf_tpers;
            $data['ttd_nama_tpers']                         = $formtpers->perawat_1;
            $data['ttd_nama_staf_tpers']                    = $formtpers->nama_staf_tpers;
            $data['ttd_no_staf_tpers']                      = $formtpers->no_staf_tpers;
            $data['ttd_transportasi_tpers_1']               = $formtpers->transportasi_tpers_1;
            $data['ttd_transportasi_tpers_2']               = $formtpers->transportasi_tpers_2;
            $data['ttd_transportasi_tpers_3']               = $formtpers->transportasi_tpers_3;
            $data['ttd_jika_staf_tpers']                    = $formtpers->jika_staf_tpers;
            $data['ttd_tiba_staf_tpers']                    = $formtpers->tiba_staf_tpers;
            $data['ttd_alasan_tpers_1']                     = $formtpers->alasan_tpers_1;
            $data['ttd_alasan_tpers_2']                     = $formtpers->alasan_tpers_2;
            $data['ttd_alasan_tpers_3']                     = $formtpers->alasan_tpers_3;
            $data['ttd_alasan_tpers_4']                     = $formtpers->alasan_tpers_4;
            $data['ttd_alasan_tpers_5']                     = $formtpers->alasan_tpers_5;
            $data['ttd_alasan_tpers_6']                     = $formtpers->alasan_tpers_6;
            $data['ttd_dokter_dpjp_tpers']                  = $formtpers->dokter_1;
            $data['ttd_ceklis_tpers_4']                     = $formtpers->ceklis_tpers_4;
            $data['ttd_dokter_pendamping_tpers']            = $formtpers->dokter_2;
            $data['ttd_kel_tpers']                          = $formtpers->kel_tpers;
            $data['ttd_ceklis_tpers_5']                     = $formtpers->ceklis_tpers_5;
            $data['ttd_perawat_pendamping_tpers']           = $formtpers->perawat_2;          
            $data['ttd_tidak_ada_tpers']                    = $formtpers->tidak_ada_tpers;
            $data['ttd_indikasi_tpers']                     = $formtpers->indikasi_tpers;
            $data['ttd_riwayat_kesehatan_tpers']            = $formtpers->riwayat_kesehatan_tpers;
            $data['ttd_alergi_tpers_1']                     = $formtpers->alergi_tpers_1;
            $data['ttd_alergi_tpers_2']                     = $formtpers->alergi_tpers_2;
            $data['ttd_alergi_tpers_3']                     = $formtpers->alergi_tpers_3;
            // var_dump($formtpers);die;
            
            $data['ds_manual_utama'] = [];
            $ds_manual_utamas = $this->m_pelayanan->getDiagnosaManualUtama($layananPendaftaran->id_pendaftaran);
            if (!empty($ds_manual_utamas)) {
                $data['ds_manual_utama'] = $ds_manual_utamas;
            }
            // var_dump($data['ds_manual_utama']);die;

            $data['ds_manual_sekunder'] = [];
            $ds_manual_sekunders = $this->m_pelayanan->getDiagnosaManualSekunder($layananPendaftaran->id_pendaftaran);
            if (!empty($ds_manual_sekunders)) {
                $data['ds_manual_sekunder'] = $ds_manual_sekunders;
            }

            $data['terapi_resume'] = [];
            $terapiResume = $this->m_pelayanan->getObatTerapiPulang($id);
            if (!empty($terapiResume)) {
                $data['terapi_resume'] = $terapiResume;
            }

            // var_dump($id);die;
            // var_dump($data['ds_manual_utama'] );die;
            // var_dump($id);die;
            $data['ttd_terapi_tpers_1']                 = $formtpers->terapi_tpers_1;
            $data['ttd_terapi_tpers_2']                 = $formtpers->terapi_tpers_2;
            $data['ttd_terapi_tpers_3']                 = $formtpers->terapi_tpers_3;
            $data['ttd_rw_penyakit_tpers_1']            = $formtpers->rw_penyakit_tpers_1;
            $data['ttd_rw_penyakit_tpers_2']            = $formtpers->rw_penyakit_tpers_2;
            $data['ttd_rw_penyakit_tpers_3']            = $formtpers->rw_penyakit_tpers_3;
            $data['ttd_intake_tpers']                   = $formtpers->intake_tpers;
            $data['ttd_E_tpers']                        = $formtpers->E_tpers;
            $data['ttd_V_tpers']                        = $formtpers->V_tpers;
            $data['ttd_M_tpers']                        = $formtpers->M_tpers;
            $data['ttd_pupil_tpers']                    = $formtpers->pupil_tpers;
            $data['ttd_reflek_tpers_1']                 = $formtpers->reflek_tpers_1;
            $data['ttd_reflek_tpers_2']                 = $formtpers->reflek_tpers_2;
            $data['ttd_td_tpers_1']                     = $formtpers->td_tpers_1;
            $data['ttd_td_tpers_2']                     = $formtpers->td_tpers_2;
            $data['ttd_nadi_tpers']                     = $formtpers->nadi_tpers;
            $data['ttd_suhu_tpers']                     = $formtpers->suhu_tpers;
            $data['ttd_pf_tpers']                       = $formtpers->pf_tpers;
            $data['ttd_pasien_mmberi_tpers_1']          = $formtpers->pasien_mmberi_tpers_1;
            $data['ttd_pasien_mmberi_tpers_2']          = $formtpers->pasien_mmberi_tpers_2;
            $data['ttd_infus_tpers']                    = $formtpers->infus_tpers;
            $data['ttd_ett_tpers']                      = $formtpers->ett_tpers;
            $data['ttd_oksigen_tpers']                  = $formtpers->oksigen_tpers;
            $data['ttd_cvc_tpers']                      = $formtpers->cvc_tpers;
            $data['ttd_kateter_tpers']                  = $formtpers->kateter_tpers;
            $data['ttd_bidai_tpers']                    = $formtpers->bidai_tpers;
            $data['ttd_pupm_tpers']                     = $formtpers->pupm_tpers;
            $data['ttd_lain_tpers']                     = $formtpers->lain_tpers;
            $data['ttd_peralatan_tpers']                = $formtpers->peralatan_tpers;          
            $data['ttd_pp_dianostik_1']                 = $formtpers->pp_dianostik_1;
            $data['ttd_pp_dianostik_2']                 = $formtpers->pp_dianostik_2;
            $data['ttd_pp_dianostik_3']                 = $formtpers->pp_dianostik_3;
            $data['ttd_pj_shift_tpers']                 = $formtpers->perawat_3;
            $data['ttd_dokter_pem_tpers']               = $formtpers->dokter_3;       
            $this->load->view('pendaftaran_igd/printing/cetak_transfer_pasien_ekstra_rs', $data);
        endif;
    }

    // OPAT
    function cetak_observasi_pasien_saat_transfer($id){
        if ($id !== NULL) :       
            $layananPendaftaran = $this->db->where('id', $id)->get('sm_layanan_pendaftaran')->row();           
            $pendaftaran        = $this->klinik->getPendaftaranDetail($layananPendaftaran->id_pendaftaran);
            if (count((array) $pendaftaran['pasien']) < 1) :
                die();
            endif;
            $data['pasien'] = $pendaftaran['pasien'];
            $data['pasien']->kelamin == 'P' ? $data['pasien']->kelamin = 'Perempuan' : $data['pasien']->kelamin = 'Laki-laki';
            $this->load->model('Pendaftaran_igd_model', 'm_pedaftaran_igd');
            $formopst = $this->m_pedaftaran_igd->getTransferPasienExstraRS($layananPendaftaran->id);
            $data['ttd_tgl_opst_1']                 = $formopst->tgl_opst_1;
            $data['ttd_keadaan_opst_1']             = $formopst->keadaan_opst_1;
            $data['ttd_td_opst_1']                  = $formopst->td_opst_1;
            $data['ttd_n_opst_1']                   = $formopst->n_opst_1;
            $data['ttd_rr_opst_1']                  = $formopst->rr_opst_1;
            $data['ttd_s_opst_1']                   = $formopst->s_opst_1;
            $data['ttd_sp02_opst_1']                = $formopst->sp02_opst_1;
            $data['ttd_oksigen_opst_1']             = $formopst->oksigen_opst_1;
            $data['ttd_tindakan_opst_1']            = $formopst->tindakan_opst_1;
            $data['ttd_evaluasi_opst_1']            = $formopst->evaluasi_opst_1;
            $data['ttd_nama_perawat_1']             = $formopst->nama_perawat_1;
            $data['ttd_tgl_opst_2']                 = $formopst->tgl_opst_2;
            $data['ttd_keadaan_opst_2']             = $formopst->keadaan_opst_2;
            $data['ttd_td_opst_2']                  = $formopst->td_opst_2;
            $data['ttd_n_opst_2']                   = $formopst->n_opst_2;
            $data['ttd_rr_opst_2']                  = $formopst->rr_opst_2;
            $data['ttd_s_opst_2']                   = $formopst->s_opst_2;
            $data['ttd_sp02_opst_2']                = $formopst->sp02_opst_2;
            $data['ttd_oksigen_opst_2']             = $formopst->oksigen_opst_2;
            $data['ttd_tindakan_opst_2']            = $formopst->tindakan_opst_2;
            $data['ttd_evaluasi_opst_2']            = $formopst->evaluasi_opst_2;
            $data['ttd_nama_perawat_2']             = $formopst->nama_perawat_2;
            $data['ttd_tgl_opst_3']                 = $formopst->tgl_opst_3;
            $data['ttd_keadaan_opst_3']             = $formopst->keadaan_opst_3;
            $data['ttd_td_opst_3']                  = $formopst->td_opst_3;
            $data['ttd_n_opst_3']                   = $formopst->n_opst_3;
            $data['ttd_rr_opst_3']                  = $formopst->rr_opst_3;
            $data['ttd_s_opst_3']                   = $formopst->s_opst_3;
            $data['ttd_sp02_opst_3']                = $formopst->sp02_opst_3;
            $data['ttd_oksigen_opst_3']             = $formopst->oksigen_opst_3;
            $data['ttd_tindakan_opst_3']            = $formopst->tindakan_opst_3;
            $data['ttd_evaluasi_opst_3']            = $formopst->evaluasi_opst_3;
            $data['ttd_nama_perawat_3']             = $formopst->nama_perawat_3;
            $data['ttd_tgl_opst_4']                 = $formopst->tgl_opst_4;
            $data['ttd_keadaan_opst_4']             = $formopst->keadaan_opst_4;
            $data['ttd_td_opst_4']                  = $formopst->td_opst_4;
            $data['ttd_n_opst_4']                   = $formopst->n_opst_4;
            $data['ttd_rr_opst_4']                  = $formopst->rr_opst_4;
            $data['ttd_s_opst_4']                   = $formopst->s_opst_4;
            $data['ttd_sp02_opst_4']                = $formopst->sp02_opst_4;
            $data['ttd_oksigen_opst_4']             = $formopst->oksigen_opst_4;
            $data['ttd_tindakan_opst_4']            = $formopst->tindakan_opst_4;
            $data['ttd_evaluasi_opst_4']            = $formopst->evaluasi_opst_4;
            $data['ttd_nama_perawat_4']             = $formopst->nama_perawat_4;
            $data['ttd_tgl_opst_5']                 = $formopst->tgl_opst_5;
            $data['ttd_keadaan_opst_5']             = $formopst->keadaan_opst_5;
            $data['ttd_td_opst_5']                  = $formopst->td_opst_5;
            $data['ttd_n_opst_5']                   = $formopst->n_opst_5;
            $data['ttd_rr_opst_5']                  = $formopst->rr_opst_5;
            $data['ttd_s_opst_5']                   = $formopst->s_opst_5;
            $data['ttd_sp02_opst_5']                = $formopst->sp02_opst_5;
            $data['ttd_oksigen_opst_5']             = $formopst->oksigen_opst_5;
            $data['ttd_tindakan_opst_5']            = $formopst->tindakan_opst_5;
            $data['ttd_evaluasi_opst_5']            = $formopst->evaluasi_opst_5;
            $data['ttd_nama_perawat_5']             = $formopst->nama_perawat_5;
            $data['ttd_tgl_opst_6']                 = $formopst->tgl_opst_6;
            $data['ttd_keadaan_opst_6']             = $formopst->keadaan_opst_6;
            $data['ttd_td_opst_6']                  = $formopst->td_opst_6;
            $data['ttd_n_opst_6']                   = $formopst->n_opst_6;
            $data['ttd_rr_opst_6']                  = $formopst->rr_opst_6;
            $data['ttd_s_opst_6']                   = $formopst->s_opst_6;
            $data['ttd_sp02_opst_6']                = $formopst->sp02_opst_6;
            $data['ttd_oksigen_opst_6']             = $formopst->oksigen_opst_6;
            $data['ttd_tindakan_opst_6']            = $formopst->tindakan_opst_6;
            $data['ttd_evaluasi_opst_6']            = $formopst->evaluasi_opst_6;
            $data['ttd_nama_perawat_6']             = $formopst->nama_perawat_6;
            $data['ttd_tgl_opst_7']                 = $formopst->tgl_opst_7;
            $data['ttd_keadaan_opst_7']             = $formopst->keadaan_opst_7;
            $data['ttd_td_opst_7']                  = $formopst->td_opst_7;
            $data['ttd_n_opst_7']                   = $formopst->n_opst_7;
            $data['ttd_rr_opst_7']                  = $formopst->rr_opst_7;
            $data['ttd_s_opst_7']                   = $formopst->s_opst_7;
            $data['ttd_sp02_opst_7']                = $formopst->sp02_opst_7;
            $data['ttd_oksigen_opst_7']             = $formopst->oksigen_opst_7;
            $data['ttd_tindakan_opst_7']            = $formopst->tindakan_opst_7;
            $data['ttd_evaluasi_opst_7']            = $formopst->evaluasi_opst_7;
            $data['ttd_nama_perawat_7']             = $formopst->nama_perawat_7;
            $data['ttd_tgl_opst_8']                 = $formopst->tgl_opst_8;
            $data['ttd_keadaan_opst_8']             = $formopst->keadaan_opst_8;
            $data['ttd_td_opst_8']                  = $formopst->td_opst_8;
            $data['ttd_n_opst_8']                   = $formopst->n_opst_8;
            $data['ttd_rr_opst_8']                  = $formopst->rr_opst_8;
            $data['ttd_s_opst_8']                   = $formopst->s_opst_8;
            $data['ttd_sp02_opst_8']                = $formopst->sp02_opst_8;
            $data['ttd_oksigen_opst_8']             = $formopst->oksigen_opst_8;
            $data['ttd_tindakan_opst_8']            = $formopst->tindakan_opst_8;
            $data['ttd_evaluasi_opst_8']            = $formopst->evaluasi_opst_8;
            $data['ttd_nama_perawat_8']             = $formopst->nama_perawat_8;
            $data['ttd_tgl_opst_9']                 = $formopst->tgl_opst_9;
            $data['ttd_keadaan_opst_9']             = $formopst->keadaan_opst_9;
            $data['ttd_td_opst_9']                  = $formopst->td_opst_9;
            $data['ttd_n_opst_9']                   = $formopst->n_opst_9;
            $data['ttd_rr_opst_9']                  = $formopst->rr_opst_9;
            $data['ttd_s_opst_9']                   = $formopst->s_opst_9;
            $data['ttd_sp02_opst_9']                = $formopst->sp02_opst_9;
            $data['ttd_oksigen_opst_9']             = $formopst->oksigen_opst_9;
            $data['ttd_tindakan_opst_9']            = $formopst->tindakan_opst_9;
            $data['ttd_evaluasi_opst_9']            = $formopst->evaluasi_opst_9;
            $data['ttd_nama_perawat_9']             = $formopst->nama_perawat_9;
            $data['ttd_tgl_opst_10']                 = $formopst->tgl_opst_10;
            $data['ttd_keadaan_opst_10']             = $formopst->keadaan_opst_10;
            $data['ttd_td_opst_10']                  = $formopst->td_opst_10;
            $data['ttd_n_opst_10']                   = $formopst->n_opst_10;
            $data['ttd_rr_opst_10']                  = $formopst->rr_opst_10;
            $data['ttd_s_opst_10']                   = $formopst->s_opst_10;
            $data['ttd_sp02_opst_10']                = $formopst->sp02_opst_10;
            $data['ttd_oksigen_opst_10']             = $formopst->oksigen_opst_10;
            $data['ttd_tindakan_opst_10']            = $formopst->tindakan_opst_10;
            $data['ttd_evaluasi_opst_10']            = $formopst->evaluasi_opst_10;
            $data['ttd_nama_perawat_10']             = $formopst->nama_perawat_10;
            $data['ttd_tgl_opst_11']                 = $formopst->tgl_opst_11;
            $data['ttd_keadaan_opst_11']             = $formopst->keadaan_opst_11;
            $data['ttd_td_opst_11']                  = $formopst->td_opst_11;
            $data['ttd_n_opst_11']                   = $formopst->n_opst_11;
            $data['ttd_rr_opst_11']                  = $formopst->rr_opst_11;
            $data['ttd_s_opst_11']                   = $formopst->s_opst_11;
            $data['ttd_sp02_opst_11']                = $formopst->sp02_opst_11;
            $data['ttd_oksigen_opst_11']             = $formopst->oksigen_opst_11;
            $data['ttd_tindakan_opst_11']            = $formopst->tindakan_opst_11;
            $data['ttd_evaluasi_opst_11']            = $formopst->evaluasi_opst_11;
            $data['ttd_nama_perawat_11']             = $formopst->nama_perawat_11;
            $data['ttd_tgl_opst_12']                 = $formopst->tgl_opst_12;
            $data['ttd_keadaan_opst_12']             = $formopst->keadaan_opst_12;
            $data['ttd_td_opst_12']                  = $formopst->td_opst_12;
            $data['ttd_n_opst_12']                   = $formopst->n_opst_12;
            $data['ttd_rr_opst_12']                  = $formopst->rr_opst_12;
            $data['ttd_s_opst_12']                   = $formopst->s_opst_12;
            $data['ttd_sp02_opst_12']                = $formopst->sp02_opst_12;
            $data['ttd_oksigen_opst_12']             = $formopst->oksigen_opst_12;
            $data['ttd_tindakan_opst_12']            = $formopst->tindakan_opst_12;
            $data['ttd_evaluasi_opst_12']            = $formopst->evaluasi_opst_12;
            $data['ttd_nama_perawat_12']             = $formopst->nama_perawat_12;
            $data['ttd_tgl_opst_13']                 = $formopst->tgl_opst_13;
            $data['ttd_keadaan_opst_13']             = $formopst->keadaan_opst_13;
            $data['ttd_td_opst_13']                  = $formopst->td_opst_13;
            $data['ttd_n_opst_13']                   = $formopst->n_opst_13;
            $data['ttd_rr_opst_13']                  = $formopst->rr_opst_13;
            $data['ttd_s_opst_13']                   = $formopst->s_opst_13;
            $data['ttd_sp02_opst_13']                = $formopst->sp02_opst_13;
            $data['ttd_oksigen_opst_13']             = $formopst->oksigen_opst_13;
            $data['ttd_tindakan_opst_13']            = $formopst->tindakan_opst_13;
            $data['ttd_evaluasi_opst_13']            = $formopst->evaluasi_opst_13;
            $data['ttd_nama_perawat_13']             = $formopst->nama_perawat_13;
            $data['ttd_tgl_opst_14']                 = $formopst->tgl_opst_14;
            $data['ttd_keadaan_opst_14']             = $formopst->keadaan_opst_14;
            $data['ttd_td_opst_14']                  = $formopst->td_opst_14;
            $data['ttd_n_opst_14']                   = $formopst->n_opst_14;
            $data['ttd_rr_opst_14']                  = $formopst->rr_opst_14;
            $data['ttd_s_opst_14']                   = $formopst->s_opst_14;
            $data['ttd_sp02_opst_14']                = $formopst->sp02_opst_14;
            $data['ttd_oksigen_opst_14']             = $formopst->oksigen_opst_14;
            $data['ttd_tindakan_opst_14']            = $formopst->tindakan_opst_14;
            $data['ttd_evaluasi_opst_14']            = $formopst->evaluasi_opst_14;
            $data['ttd_nama_perawat_14']             = $formopst->nama_perawat_14;
            $data['ttd_tgl_opst_15']                 = $formopst->tgl_opst_15;
            $data['ttd_keadaan_opst_15']             = $formopst->keadaan_opst_15;
            $data['ttd_td_opst_15']                  = $formopst->td_opst_15;
            $data['ttd_n_opst_15']                   = $formopst->n_opst_15;
            $data['ttd_rr_opst_15']                  = $formopst->rr_opst_15;
            $data['ttd_s_opst_15']                   = $formopst->s_opst_15;
            $data['ttd_sp02_opst_15']                = $formopst->sp02_opst_15;
            $data['ttd_oksigen_opst_15']             = $formopst->oksigen_opst_15;
            $data['ttd_tindakan_opst_15']            = $formopst->tindakan_opst_15;
            $data['ttd_evaluasi_opst_15']            = $formopst->evaluasi_opst_15;
            $data['ttd_nama_perawat_15']             = $formopst->nama_perawat_15;
            $data['ttd_tanggal_opst']                = $formopst->tanggal_opst;
            $data['ttd_pasien_opst']                 = $formopst->pasien_opst;
            $data['ttd_petugas_menerima']            = $formopst->petugas_menerima;
            $data['ttd_nama_perawat_16']             = $formopst->nama_perawat_16;             
            $this->load->view('pendaftaran_igd/printing/cetak_observasi_pasien_saat_transfer', $data);
        endif;
    }

    // DOA_D_O_A 
    function cetak_form_doa($id){
        if ($id !== NULL) :
            $layananPendaftaran = $this->db->where('id', $id)->get('sm_layanan_pendaftaran')->row();
            $pendaftaran        = $this->klinik->getPendaftaranDetail($layananPendaftaran->id_pendaftaran);
            if (count((array) $pendaftaran['pasien']) < 1) :
                die();
            endif;
            $data['pasien'] = $pendaftaran['pasien'];
            $data['pasien']->kelamin == 'P' ? $data['pasien']->kelamin = 'Perempuan' : $data['pasien']->kelamin = 'Laki-laki';
            $this->load->model('Pendaftaran_igd_model', 'm_pedaftaran_igd');
            $sk_doa = $this->m_pedaftaran_igd->getSuratKeteranganDOA($layananPendaftaran->id_pendaftaran);
            // var_dump($sk_doa);die;
            $data['ttd_tanggal_doa']                   = $sk_doa->tanggal_doa;
            $data['ttd_pukul_doa']                     = $sk_doa->pukul_doa;
            $data['ttd_tanggal_surat_doa']             = $sk_doa->tanggal_surat_doa;
            $data['ttd_dokter_doa']                    = $sk_doa->nama_dokter;
            $this->load->view('pendaftaran_igd/printing/cetak_form_doa', $data);
        endif;
    }

    // ICPMK 
    function cetak_form_icpmk($id){
        if ($id !== NULL) :
            $layananPendaftaran = $this->db->where('id', $id)->get('sm_layanan_pendaftaran')->row();
            $pendaftaran        = $this->klinik->getPendaftaranDetail($layananPendaftaran->id_pendaftaran);
            if (count((array) $pendaftaran['pasien']) < 1) :
                die();
            endif;
            $data['pasien'] = $pendaftaran['pasien'];
            $data['pasien']->kelamin == 'P' ? $data['pasien']->kelamin = 'Perempuan' : $data['pasien']->kelamin = 'Laki-laki';
            $this->load->model('Pendaftaran_igd_model', 'm_pedaftaran_igd');
            $informed_constant_pmk = $this->m_pedaftaran_igd->getSuratInformedConsentPMK($layananPendaftaran->id_pendaftaran);
            // var_dump($informed_constant_pmk);die;
            $data['ttd_nama_ort_icpmk']          = $informed_constant_pmk->nama_ort_icpmk;
            $data['ttd_alamat_icpmk']            = $informed_constant_pmk->alamat_icpmk;
            $data['ttd_usia_by_icpmk']           = $informed_constant_pmk->usia_by_icpmk;
            $data['ttd_hubungan_ayah_icpmk']     = $informed_constant_pmk->hubungan_ayah_icpmk;
            $data['ttd_hubungan_ibu_icpmk']      = $informed_constant_pmk->hubungan_ibu_icpmk;
            $data['ttd_hubungan_nenek_icpmk']    = $informed_constant_pmk->hubungan_nenek_icpmk;
            $data['ttd_hubungan_kakek_icpmk']    = $informed_constant_pmk->hubungan_kakek_icpmk;
            $data['ttd_hubungan_lainya_icpmk']   = $informed_constant_pmk->hubungan_lainya_icpmk;
            $data['ttd_tanggal_icpmk']           = $informed_constant_pmk->tanggal_icpmk;
            $data['ttd_perawat_1_icpmk']         = $informed_constant_pmk->nama_perawat_1;
            $data['ttd_perawat_2_icpmk']         = $informed_constant_pmk->nama_perawat_2;
            $data['ttd_dokter_icpmk']            = $informed_constant_pmk->nama_dokter;
            $this->load->view('pendaftaran_igd/printing/cetak_form_icpmk', $data);
        endif;
    }



    // SKKM  
    function cetak_surat_keterangan_kesediaan_membayar($id){
        if ($id !== NULL) :
            $layananPendaftaran = $this->db->where('id', $id)->get('sm_layanan_pendaftaran')->row();
            $pendaftaran        = $this->klinik->getPendaftaranDetail($layananPendaftaran->id_pendaftaran);
            if (count((array) $pendaftaran['pasien']) < 1) :
                die();
            endif;
            // var_dump($pendaftaran );die;
            $data['pasien'] = $pendaftaran['pasien'];
            // var_dump($data['pasien']);die;
            $data['layanan'] = $pendaftaran['layanan'];
            // var_dump($data['layanan']);die;
            $data['pasien']->kelamin == 'P' ? $data['pasien']->kelamin = 'Perempuan' : $data['pasien']->kelamin = 'Laki-laki';
            $this->load->model('Pendaftaran_igd_model', 'm_pedaftaran_igd');
            $data_skkm = $this->m_pedaftaran_igd->getSuratKeteranganKesediaanMembayar($layananPendaftaran->id);
            // var_dump($data_skkm);die;
            $data['ttd_suamiskkm']              = $data_skkm->suamiskkm;
            $data['ttd_istriskkm']              = $data_skkm->istriskkm;
            $data['ttd_ayahskkm']               = $data_skkm->ayahskkm;
            $data['ttd_ibuskkm']                = $data_skkm->ibuskkm;
            $data['ttd_waliskkm']               = $data_skkm->waliskkm;
            $data['ttd_anakskkm']               = $data_skkm->anakskkm;
            $data['ttd_penanggungjawabskkm']    = $data_skkm->penanggungjawabskkm;
            $data['ttd_sebutkanskkm']           = $data_skkm->sebutkanskkm;
            $data['ttd_tanggalskkm']            = $data_skkm->tanggalskkm;
            $data['ttd_user']                   = $data_skkm->id_user;       
            $this->load->view('pendaftaran_igd/printing/cetak_surat_keterangan_kesediaan_membayar', $data);
        endif;
    }

    // // SPPPMK  
    // function cetak_surat_pernyataan_persetujuan_pmk($id){
    //     if ($id !== NULL) :
    //         $layananPendaftaran = $this->db->where('id', $id)->get('sm_layanan_pendaftaran')->row();
    //         $pendaftaran        = $this->klinik->getPendaftaranDetail($layananPendaftaran->id_pendaftaran);
    //         if (count((array) $pendaftaran['pasien']) < 1) :
    //             die();
    //         endif;
    //         // var_dump($pendaftaran );die;
    //         $data['pasien'] = $pendaftaran['pasien'];
    //         // var_dump($data['pasien']);die;
    //         $data['layanan'] = $pendaftaran['layanan'];
    //         // var_dump($data['layanan']);die;
    //         $data['pasien']->kelamin == 'P' ? $data['pasien']->kelamin = 'Perempuan' : $data['pasien']->kelamin = 'Laki-laki';
    //         $this->load->model('Pendaftaran_igd_model', 'm_pedaftaran_igd');
    //         $data_spppmk = $this->m_pedaftaran_igd->getSuratPernyataanPersetujuanPenolakanMedisKhusus($layananPendaftaran->id);
    //         // var_dump($data_spppmk);die;
    //         $data['ttd_sayasendirispppmk']      = $data_spppmk->sayasendirispppmk;
    //         $data['ttd_sebagaiorangtuaspppmk']  = $data_spppmk->sebagaiorangtuaspppmk;
    //         $data['ttd_keluargaspppmk']         = $data_spppmk->keluargaspppmk;
    //         $data['ttd_walispppmk']             = $data_spppmk->walispppmk;
    //         $data['ttd_darispppmk']             = $data_spppmk->darispppmk;
    //         $data['ttd_setujuspppmk']           = $data_spppmk->setujuspppmk;
    //         $data['ttd_menolakspppmk']          = $data_spppmk->menolakspppmk;
    //         $data['ttd_pmitujuanspppmk']        = $data_spppmk->pmitujuanspppmk;
    //         $data['ttd_dokterspppmk']           = $data_spppmk->nama_dokter;
    //         $data['ttd_tanggalspppmk']          = $data_spppmk->tanggalspppmk;          
    //         $this->load->view('pendaftaran_igd/printing/cetak_surat_pernyataan_persetujuan_pmk', $data);
    //     endif;
    // }

    // SP_WE 
    function cetak_form_surat_pernyataan($id){
        if ($id !== NULL) :
            $layananPendaftaran = $this->db->where('id', $id)->get('sm_layanan_pendaftaran')->row();
            $pendaftaran        = $this->klinik->getPendaftaranDetail($layananPendaftaran->id_pendaftaran);
            if (count((array) $pendaftaran['pasien']) < 1) :
                die();
            endif;
            $data['pasien'] = $pendaftaran['pasien'];
            $data['pasien']->kelamin == 'P' ? $data['pasien']->kelamin = 'Perempuan' : $data['pasien']->kelamin = 'Laki-laki';
            $this->load->model('Pendaftaran_igd_model', 'm_pedaftaran_igd');
            $surat_pernyataan = $this->m_pedaftaran_igd->getSuratPernyataan($layananPendaftaran->id_pendaftaran);
            // var_dump($surat_pernyataan);die;
            $data['ttd_nama_kel_sp']          = $surat_pernyataan->nama_kel_sp;
            $data['ttd_umur_kel_sp']            = $surat_pernyataan->umur_kel_sp;
            $data['ttd_jk_kel_sp']           = $surat_pernyataan->jk_kel_sp;
            $data['ttd_alamat_kel_sp']     = $surat_pernyataan->alamat_kel_sp;
            $data['ttd_no_ktp_kel_sp']      = $surat_pernyataan->no_ktp_kel_sp;
            $data['ttd_saya_sendiri_kel_sp']    = $surat_pernyataan->saya_sendiri_kel_sp;
            $data['ttd_anak_kel_sp']    = $surat_pernyataan->anak_kel_sp;
            $data['ttd_istri_kel_sp']    = $surat_pernyataan->istri_kel_sp;
            $data['ttd_suami_kel_sp']   = $surat_pernyataan->suami_kel_sp;
            $data['ttd_ayah_kel_sp']           = $surat_pernyataan->ayah_kel_sp;
            $data['ttd_ibu_kel_sp']           = $surat_pernyataan->ibu_kel_sp;
            $data['ttd_lainya_kel_sp']           = $surat_pernyataan->lainya_kel_sp;
            $data['ttd_mengajukan_sp']           = $surat_pernyataan->mengajukan_sp;
            $data['ttd_menolak_sp']           = $surat_pernyataan->menolak_sp;
            $data['ttd_dirawat_sp']           = $surat_pernyataan->dirawat_sp;
            $data['ttd_perawatan_sp']           = $surat_pernyataan->perawatan_sp;
            $data['ttd_perawatan_dgn_sp']           = $surat_pernyataan->perawatan_dgn_sp;
            $data['ttd_menolak_pp_sp']           = $surat_pernyataan->menolak_pp_sp;
            $data['ttd_lainya_sp']           = $surat_pernyataan->lainya_sp;
            $data['ttd_dg_alasan_sp']           = $surat_pernyataan->dg_alasan_sp;
            $data['ttd_dg_alasan_sp_1']           = $surat_pernyataan->dg_alasan_sp_1;
            $data['ttd_tgl_sp']         = $surat_pernyataan->tgl_sp;
            $data['ttd_saksi_1_sp']         = $surat_pernyataan->nama_perawat_1;
            $data['ttd_saksi_2_sp']         = $surat_pernyataan->nama_perawat_2;
            $data['ttd_dokter_sp']            = $surat_pernyataan->nama_dokter;
            $this->load->view('pendaftaran_igd/printing/cetak_form_surat_pernyataan', $data);
            // var_dump($data);die;
        endif;
    }

    // TPI B
    function cetak_travelling_patient_information($id){
        if ($id !== NULL) :
            $layananPendaftaran = $this->db->where('id', $id)->get('sm_layanan_pendaftaran')->row();
            $pendaftaran        = $this->klinik->getPendaftaranDetail($layananPendaftaran->id_pendaftaran);
            if (count((array) $pendaftaran['pasien']) < 1) :
                die();
            endif;
            $data['pasien'] = $pendaftaran['pasien'];
            $data['pasien']->kelamin == 'P' ? $data['pasien']->kelamin = 'Perempuan' : $data['pasien']->kelamin = 'Laki-laki';
            $this->load->model('Pendaftaran_igd_model', 'm_pedaftaran_igd');
            // $formtpi = $this->m_pedaftaran_igd->getTravellingPatientInformation($layananPendaftaran->id_pendaftaran); // ini id_pendaftaran
            $formtpi = $this->m_pedaftaran_igd->getTravellingPatientInformation($layananPendaftaran->id);

            // DIBAWAH INI SAMA FUNGSINYA JIKA KODINGAN ADA MAKA MUNCUL JIKA TIDAK ADA MAKA KODINGANYA TETP MUNCUL TANPA EROR
            if ($formtpi !== null) {
                $data['ttd_dialysis'] = $formtpi->dialysis;
                // Lanjutkan dengan pengisian $data lainnya
            } else {
                // Lakukan tindakan yang sesuai jika data tidak ditemukan
                $data['ttd_dialysis'] = ''; // Atau nilai default lainnya
            }
            // SAMA FUNGSINYA HANYA BEDA KODINGANYA LEBIH SIMPLE
            $data['ttd_duration'] = ($formtpi !== null) ? $formtpi->duration : '';
            $data['ttd_dialisat'] = ($formtpi !== null) ? $formtpi->dialisat : '';
            $data['ttd_dry_weight'] = ($formtpi !== null) ? $formtpi->dry_weight : '';
            $data['ttd_acces_vascular'] = ($formtpi !== null) ? $formtpi->acces_vascular : '';
            $data['ttd_average_weight'] = ($formtpi !== null) ? $formtpi->average_weight : '';
            $data['ttd_average_blood_pre'] = ($formtpi !== null) ? $formtpi->average_blood_pre : '';
            $data['ttd_average_blood_post'] = ($formtpi !== null) ? $formtpi->average_blood_post : '';
            $data['ttd_dialyser_type'] = ($formtpi !== null) ? $formtpi->dialyser_type : '';
            $data['ttd_blood_flow'] = ($formtpi !== null) ? $formtpi->blood_flow : '';
            $data['ttd_heparinitation'] = ($formtpi !== null) ? $formtpi->heparinitation : '';
            $data['ttd_loading_dose'] = ($formtpi !== null) ? $formtpi->loading_dose : '';
            $data['ttd_maintenance_dose'] = ($formtpi !== null) ? $formtpi->maintenance_dose : '';
            $data['ttd_blood_group'] = ($formtpi !== null) ? $formtpi->blood_group : '';
            $data['ttd_blood_tranfusion'] = ($formtpi !== null) ? $formtpi->blood_tranfusion : '';
            $data['ttd_date_of_laboratorium'] = ($formtpi !== null) ? $formtpi->date_of_laboratorium : '';
            $data['ttd_hb_ereum_pre'] = ($formtpi !== null) ? $formtpi->hb_ereum_pre : '';
            $data['ttd_hb_ureum_post'] = ($formtpi !== null) ? $formtpi->hb_ureum_post : '';
            $data['ttd_cratine_pre'] = ($formtpi !== null) ? $formtpi->cratine_pre : '';
            $data['ttd_kalium'] = ($formtpi !== null) ? $formtpi->kalium : '';
            $data['ttd_phospor'] = ($formtpi !== null) ? $formtpi->phospor : '';
            $data['ttd_hbsag'] = ($formtpi !== null) ? $formtpi->hbsag : '';
            $data['ttd_anti_hcv'] = ($formtpi !== null) ? $formtpi->anti_hcv : '';
            $data['ttd_anti_hiv'] = ($formtpi !== null) ? $formtpi->anti_hiv : '';
            $data['ttd_problem_during'] = ($formtpi !== null) ? $formtpi->problem_during : '';
            $data['ttd_tanggal_tpi'] = ($formtpi !== null) ? $formtpi->tanggal_tpi : '';
            $data['ttd_dokter'] = ($formtpi !== null) ? $formtpi->dokter : '';

            $data['diagnosa']      = $this->m_pelayanan->getDiagnosaPemeriksaan($id);              
            
            $data['ttd_nama_medication_1'] = ($formtpi !== null) ? $formtpi->obat_1 : '';
            $data['ttd_nama_medication_2'] = ($formtpi !== null) ? $formtpi->obat_2 : '';
            $data['ttd_nama_medication_3'] = ($formtpi !== null) ? $formtpi->obat_3 : '';
            $data['ttd_nama_medication_4'] = ($formtpi !== null) ? $formtpi->obat_4 : '';
            $data['ttd_nama_medication_5'] = ($formtpi !== null) ? $formtpi->obat_5 : '';
            $data['ttd_nama_medication_6'] = ($formtpi !== null) ? $formtpi->obat_6 : '';
            $data['ttd_nama_medication_7'] = ($formtpi !== null) ? $formtpi->obat_7 : '';
            $data['ttd_nama_medication_8'] = ($formtpi !== null) ? $formtpi->obat_8 : '';
            $data['ttd_nama_medication_9'] = ($formtpi !== null) ? $formtpi->obat_9 : '';
            $data['ttd_nama_medication_10'] = ($formtpi !== null) ? $formtpi->obat_10 : '';
            $data['ttd_nama_medication_11'] = ($formtpi !== null) ? $formtpi->obat_11 : '';
            $data['ttd_nama_medication_12'] = ($formtpi !== null) ? $formtpi->obat_12 : '';
            $data['ttd_nama_medication_13'] = ($formtpi !== null) ? $formtpi->obat_13 : '';
            $data['ttd_nama_medication_14'] = ($formtpi !== null) ? $formtpi->obat_14 : '';
            $data['ttd_nama_medication_15'] = ($formtpi !== null) ? $formtpi->obat_15 : '';       
            $data['ttd_dosis_1'] = ($formtpi !== null) ? $formtpi->dosis_1 : '';   
            $data['ttd_dosis_2'] = ($formtpi !== null) ? $formtpi->dosis_2 : '';   
            $data['ttd_dosis_3'] = ($formtpi !== null) ? $formtpi->dosis_3 : '';   
            $data['ttd_dosis_4'] = ($formtpi !== null) ? $formtpi->dosis_4 : '';   
            $data['ttd_dosis_5'] = ($formtpi !== null) ? $formtpi->dosis_5 : '';   
            $data['ttd_dosis_6'] = ($formtpi !== null) ? $formtpi->dosis_6 : '';   
            $data['ttd_dosis_7'] = ($formtpi !== null) ? $formtpi->dosis_7 : '';   
            $data['ttd_dosis_8'] = ($formtpi !== null) ? $formtpi->dosis_8 : '';   
            $data['ttd_dosis_9'] = ($formtpi !== null) ? $formtpi->dosis_9 : '';   
            $data['ttd_dosis_10'] = ($formtpi !== null) ? $formtpi->dosis_10 : '';   
            $data['ttd_dosis_11'] = ($formtpi !== null) ? $formtpi->dosis_11 : '';   
            $data['ttd_dosis_12'] = ($formtpi !== null) ? $formtpi->dosis_12 : '';   
            $data['ttd_dosis_13'] = ($formtpi !== null) ? $formtpi->dosis_13 : '';   
            $data['ttd_dosis_14'] = ($formtpi !== null) ? $formtpi->dosis_14 : '';   
            $data['ttd_dosis_15'] = ($formtpi !== null) ? $formtpi->dosis_15 : '';  
            $this->load->view('pendaftaran_igd/printing/cetak_travelling_patient_information', $data);
        endif;
    }

    // TPIGD
    function cetak_triase_pasien_gawat_darurat($id_pendaftaran, $type = null){
        if ($id_pendaftaran !== NULL) : 
            $pendaftaran        = $this->klinik->getPendaftaranDetail($id_pendaftaran);
            if (count((array) $pendaftaran['pasien']) < 1) :
                die();
            endif;
            $data['layanan'] = $pendaftaran['layanan'];
            $data['pasien'] = $pendaftaran['pasien'];
            $data['pasien']->kelamin == 'P' ? $data['pasien']->kelamin = 'Perempuan' : $data['pasien']->kelamin = 'Laki-laki';
            $this->load->model('Pendaftaran_igd_model', 'm_pedaftaran_igd');
            $this->load->model('pemeriksaan_igd/Pemeriksaan_igd_model', 'm_pemeriksaan_igd');
            $form_tpigd = $this->m_pemeriksaan_igd->getKajianTriase($id_pendaftaran); 
            $data['ttd_waktu_igd']              = $form_tpigd->waktu_igd; 
            $data['ttd_cara_datang_pasien_igd'] = $form_tpigd->cara_datang_pasien_igd;   
            $data['ttd_jalan_nafas_igd']        = $form_tpigd->jalan_nafas_igd;   
            $data['ttd_pernafasan_igd']         = $form_tpigd->pernafasan_igd;   
            $data['ttd_sirkulasi_igd']          = $form_tpigd->sirkulasi_igd;   
            $data['ttd_kesadaran_igd_w']        = $form_tpigd->kesadaran_igd_w;   
            $data['ttd_kesadaran_igd']          = $form_tpigd->kesadaran_igd;   
            $data['ttd_gcs_e_igd']              = $form_tpigd->gcs_e_igd;   
            $data['ttd_gcs_m_igd']              = $form_tpigd->gcs_m_igd;   
            $data['ttd_gcs_v_igd']              = $form_tpigd->gcs_v_igd;   
            $data['ttd_gcs_total_igd']          = $form_tpigd->gcs_total_igd;  
            $data['ttd_tekanan_darah_igd']      = $form_tpigd->tekanan_darah_igd;   
            $data['ttd_frekuensi_nadi_igd']     = $form_tpigd->frekuensi_nadi_igd;   
            $data['ttd_s_o2']                   = $form_tpigd->s_o2;   
            $data['ttd_tinggi_badan_igd']       = $form_tpigd->tinggi_badan_igd;   
            $data['ttd_tampilan_saga_1']        = $form_tpigd->tampilan_saga_1;   
            $data['ttd_tampilan_saga_2']        = $form_tpigd->tampilan_saga_2;   
            $data['ttd_tampilan_saga_3']        = $form_tpigd->tampilan_saga_3;   
            $data['ttd_tampilan_saga_4']        = $form_tpigd->tampilan_saga_4;   
            $data['ttd_tampilan_saga_5']        = $form_tpigd->tampilan_saga_5;   
            $data['ttd_usaha_saga_1']           = $form_tpigd->usaha_saga_1;   
            $data['ttd_usaha_saga_2']           = $form_tpigd->usaha_saga_2;   
            $data['ttd_usaha_saga_3']           = $form_tpigd->usaha_saga_3;   
            $data['ttd_usaha_saga_4']           = $form_tpigd->usaha_saga_4;   
            $data['ttd_sirkulasi_saga_1']       = $form_tpigd->sirkulasi_saga_1;   
            $data['ttd_sirkulasi_saga_2']       = $form_tpigd->sirkulasi_saga_2;   
            $data['ttd_sirkulasi_saga_3']       = $form_tpigd->sirkulasi_saga_3;  
            $data['ttd_gambarsaga_1']           = $form_tpigd->gambarsaga_1;   
            $data['ttd_gambarsaga_2']           = $form_tpigd->gambarsaga_2;   
            $data['ttd_gambarsaga_3']           = $form_tpigd->gambarsaga_3;   
            $data['ttd_gambarsaga_4']           = $form_tpigd->gambarsaga_4;   
            $data['ttd_gambarsaga_5']           = $form_tpigd->gambarsaga_5;   
            $data['ttd_gambarsaga_6']           = $form_tpigd->gambarsaga_6;   
            $data['ttd_asesment_triage_igd']    = $form_tpigd->asesment_triage_igd;   
            $data['ttd_tindak_lanjut_igd']      = $form_tpigd->tindak_lanjut_igd;   
            $data['ttd_tgl_jam_perawat']        = $form_tpigd->tgl_jam_perawat;        
            $data['ttd_id_perawatt_igd']        = $form_tpigd->perawat;
            $data['ttd_id_dokterr_igd']         = $form_tpigd->verifikasi_dpjp;
            $data['ttd_perawat_triase']         = $form_tpigd->ttd_perawat_triase;         
            $data['ttd_dokter_triase']          = $form_tpigd->ttd_dokter_triase;
            // var_dump($data['ttd_perawat_triase']);die;
            if ($type !== 'data') {
                $this->load->view('pendaftaran_igd/printing/cetak_triase_pasien_gawat_darurat', $data);
            } else {
                return $data;
            }
        endif;
    }


    // PR 
    function cetak_pengkajian_restrain($id_pendaftaran){
        if ($id_pendaftaran !== NULL) : 
            $pendaftaran        = $this->klinik->getPendaftaranDetail($id_pendaftaran);
            if (count((array) $pendaftaran['pasien']) < 1) :
                die();
            endif;
            $data['layanan'] = $pendaftaran['layanan'];
            $data['pasien'] = $pendaftaran['pasien'];
            // var_dump($data['layanan']);die;   
            $data['pasien']->kelamin == 'P' ? $data['pasien']->kelamin = 'Perempuan' : $data['pasien']->kelamin = 'Laki-laki';
            $this->load->model('Pendaftaran_igd_model', 'm_pedaftaran_igd');
            $this->load->model('pelayanan/Pelayanan_model', 'm_pelayanan');
            $form_pengkajian_restrain  = $this->m_pelayanan->getPengkajianRestrain($id_pendaftaran);      
            $data['ttd_tanggal_layanan']    = $form_pengkajian_restrain->tanggal; 
            $data['ttd_bangsal']            = $form_pengkajian_restrain->bangsal; 
            $data['ttd_gcs_pr']             = $form_pengkajian_restrain->gcs_pr; 
            $data['ttd_tanda_pr']           = $form_pengkajian_restrain->tanda_pr; 
            $data['ttd_hasil_pr']           = $form_pengkajian_restrain->hasil_pr; 
            $data['ttd_pertimbangan_pr']    = $form_pengkajian_restrain->pertimbangan_pr; 
            $data['ttd_penilaian_pr']       = $form_pengkajian_restrain->penilaian_pr; 
            $data['ttd_pendidikan_pr']      = $form_pengkajian_restrain->pendidikan_pr; 
            $data['ttd_keluarga_pr']        = $form_pengkajian_restrain->keluarga_pr; 
            $data['ttd_perawat_bidan']      = $form_pengkajian_restrain->perawat_bidan; 
            $data['ttd_tperawat_bidan']     = $form_pengkajian_restrain->ttd_dokter;          
            $this->load->view('pendaftaran_igd/printing/cetak_pengkajian_restrain', $data);
        endif;
    }



    function getDataTriaseIGD($id_pendaftaran)
    {
        $this->db->select('tri.*');
        $this->db->from('sm_kajian_triase_igd as tri');
        $this->db->join('sm_layanan_pendaftaran as lp', 'tri.id_layanan_pendaftaran = lp.id');
        $this->db->where('lp.id_pendaftaran', $id_pendaftaran);
        $query = $this->db->get();
        return $query->row();
    }

    // MONITORING 
    function cetak_form_monitoring($id_pendaftaran){
        if ($id_pendaftaran !== NULL) : 
            $pendaftaran        = $this->klinik->getPendaftaranDetail($id_pendaftaran);
            if (count((array) $pendaftaran['pasien']) < 1) :
                die();
            endif;
            $data['layanan'] = $pendaftaran['layanan'];
            $data['pasien'] = $pendaftaran['pasien'];
            // var_dump($data['pasien'] );die;
            $data['pasien']->kelamin == 'P' ? $data['pasien']->kelamin = 'Perempuan' : $data['pasien']->kelamin = 'Laki-laki';
            $this->load->model('Pendaftaran_igd_model', 'm_pedaftaran_igd');
            $this->load->model('pelayanan/Pelayanan_model', 'm_pelayanan');
            $grafikmonitoring = $this->m_pelayanan->getaGrafikMonitoring($id_pendaftaran); 
            // Memanggil fungsi `getaGrafikMonitoring` dari model `m_pelayanan` dengan parameter `$id_pendaftaran`
            // dan menyimpan hasilnya dalam variabel `$grafikmonitoring`.
            $data['ttd_mp_tanggal'] = array_map(function ($date) { return date('d-m-Y', strtotime($date)); }, array_column((array) $grafikmonitoring, 'mp_tanggal'));

            // Mengambil semua nilai kolom `mp_tanggal` dari array `$grafikmonitoring` menggunakan `array_column`
            // Lalu memformat setiap nilai tanggal menjadi format `d-m-Y` menggunakan `array_map`.
            $data['ttd_mp_jam'] = array_column((array) $grafikmonitoring, 'mp_jam');// Mengambil semua nilai kolom `mp_jam` dari array `$grafikmonitoring` dan menyimpannya dalam `$data['ttd_mp_jam']`.
            $data['ttd_mp_suhu'] = array_column((array) $grafikmonitoring, 'mp_suhu'); // Menyusun array yang hanya berisi nilai dari kolom 'denyut_partograf'
            $data['ttd_mp_rr'] = array_column((array) $grafikmonitoring, 'mp_rr'); // Menyusun array yang hanya berisi nilai dari kolom 'denyut_partograf'
            $data['ttd_mp_nadi'] = array_column((array) $grafikmonitoring, 'mp_nadi'); // Menyusun array yang hanya berisi nilai dari kolom 'denyut_partograf'
            // var_dump($data['ttd_mp_rr']);die;

            $form_monitoring = $this->m_pelayanan->getMonitoringPasien1($id_pendaftaran); 
            $data['ttd_bangsal']               = $form_monitoring->bangsal; 
            $data['ttd_tanggal_mp']            = $form_monitoring->tanggal_mp; 
            $data['ttd_bb_mp']                 = $form_monitoring->bb_mp; 
            $data['ttd_tb_mp']                 = $form_monitoring->tb_mp; 
            $data['ttd_sews_laju_respirasi']   = $form_monitoring->sews_laju_respirasi; 
            $data['ttd_sews_saturasi_2']       = $form_monitoring->sews_saturasi_2; 
            $data['ttd_spo2_skala2_news']      = $form_monitoring->spo2_skala2_news; 
            $data['ttd_sews_suplemen']         = $form_monitoring->sews_suplemen; 
            $data['ttd_td_sistolik_news']      = $form_monitoring->td_sistolik_news; 
            $data['ttd_nadi_news']             = $form_monitoring->nadi_news; 
            $data['ttd_kesadaran_news']        = $form_monitoring->kesadaran_news; 
            $data['ttd_suhu_newst']            = $form_monitoring->suhu_newst; 
            $data['ttd_sews_total_2']          = $form_monitoring->sews_total_2; 
            $data['ttd_sews_respirasi']        = $form_monitoring->sews_respirasi; 
            $data['ttd_sews_saturasi_1']       = $form_monitoring->sews_saturasi_1; 
            $data['ttd_sews_o2']               = $form_monitoring->sews_o2; 
            $data['ttd_sews_suhu']             = $form_monitoring->sews_suhu; 
            $data['ttd_sews_td_sistolik']      = $form_monitoring->sews_td_sistolik; 
            $data['ttd_sews_td_diastolik']     = $form_monitoring->sews_td_diastolik; 
            $data['ttd_sews_nadi']             = $form_monitoring->sews_nadi; 
            $data['ttd_sews_kesadaran_1']      = $form_monitoring->sews_kesadaran_1; 
            $data['ttd_sews_nyeri']            = $form_monitoring->sews_nyeri; 
            $data['ttd_sews_pengeluaran']      = $form_monitoring->sews_pengeluaran; 
            $data['ttd_sews_protein_urin']     = $form_monitoring->sews_protein_urin; 
            $data['ttd_sews_total_1']          = $form_monitoring->sews_total_1; 
            $data['ttd_pews_suhu']             = $form_monitoring->pews_suhu; 
            $data['ttd_pews_pernafasan']       = $form_monitoring->pews_pernafasan; 
            $data['ttd_pews_subpernafasan']    = $form_monitoring->pews_subpernafasan; 
            $data['ttd_pews_alat_bantu']       = $form_monitoring->pews_alat_bantu; 
            $data['ttd_pews_saturasi']         = $form_monitoring->pews_saturasi; 
            $data['ttd_pews_nadi']             = $form_monitoring->pews_nadi; 
            $data['ttd_pews_warna_kulit']      = $form_monitoring->pews_warna_kulit; 
            $data['ttd_pews_tds']              = $form_monitoring->pews_tds; 
            $data['ttd_pews_kesadaran']        = $form_monitoring->pews_kesadaran; 
            $data['ttd_pews_total']            = $form_monitoring->pews_total; 

            $form_sat_monitoring = $this->m_pelayanan->getMonitoringPasien2($id_pendaftaran); 
            $data['ttd_tdarah_mpp']         = array_column((array) $form_sat_monitoring, 'tdarah_mpp');
            $data['ttd_saturasi_mppp']      = array_column((array) $form_sat_monitoring, 'saturasi_mppp');
            $data['ttd_toksigen_mpp']       = array_column((array) $form_sat_monitoring, 'toksigen_mpp');
            $data['ttd_skesadaran_mpp']     = array_column((array) $form_sat_monitoring, 'skesadaran_mpp');
            $data['ttd_kategori_mpp']       = array_column((array) $form_sat_monitoring, 'kategori_mpp');
            $data['ttd_pengawasan_mpp']     = array_column((array) $form_sat_monitoring, 'pengawasan_mpp');
            $data['ttd_oral_mpp']           = array_column((array) $form_sat_monitoring, 'oral_mpp');
            $data['ttd_ngt_mpp']            = array_column((array) $form_sat_monitoring, 'ngt_mpp');
            $data['ttd_paranteral_mpp']     = array_column((array) $form_sat_monitoring, 'paranteral_mpp');
            $data['ttd_paranteral_mppp']    = array_column((array) $form_sat_monitoring, 'paranteral_mppp');
            $data['ttd_produk_mpp']         = array_column((array) $form_sat_monitoring, 'produk_mpp');
            $data['ttd_input_mpp']          = array_column((array) $form_sat_monitoring, 'input_mpp');
            $data['ttd_urin_mpp']           = array_column((array) $form_sat_monitoring, 'urin_mpp');
            $data['ttd_bab_mpp']            = array_column((array) $form_sat_monitoring, 'bab_mpp');
            $data['ttd_gastrik_mpp']        = array_column((array) $form_sat_monitoring, 'gastrik_mpp');
            $data['ttd_wsd_mpp']            = array_column((array) $form_sat_monitoring, 'wsd_mpp');
            $data['ttd_iwl_mpp']            = array_column((array) $form_sat_monitoring, 'iwl_mpp');
            $data['ttd_output_mpp']         = array_column((array) $form_sat_monitoring, 'output_mpp');
            $data['ttd_blance_cairan_mpp']  = array_column((array) $form_sat_monitoring, 'blance_cairan_mpp');
            $data['ttd_diit_mpp']           = array_column((array) $form_sat_monitoring, 'diit_mpp');
            $data['ttd_jam_mpp']            = array_column((array) $form_sat_monitoring, 'jam_mpp');
            $data['ttd_tgl_mpp']            = array_map(function ($date) { return date('d-m-Y', strtotime($date)); }, array_column((array) $form_sat_monitoring, 'tgl_mpp'));
            $data['ttd_perawat_mpp']        = array_column((array) $form_sat_monitoring, 'nama_perawat');
            $this->load->view('pendaftaran_igd/printing/cetak_form_monitoring', $data);
        endif;
    }



    // PARTOGRAF 
    function cetak_form_partograf($id_pendaftaran){
        if ($id_pendaftaran !== NULL) : 
            $pendaftaran        = $this->klinik->getPendaftaranDetail($id_pendaftaran);
            if (count((array) $pendaftaran['pasien']) < 1) :
                die();
            endif;
            $data['layanan'] = $pendaftaran['layanan'];
            $data['pasien'] = $pendaftaran['pasien'];
            $data['pasien']->kelamin == 'P' ? $data['pasien']->kelamin = 'Perempuan' : $data['pasien']->kelamin = 'Laki-laki';
            $this->load->model('Pendaftaran_igd_model', 'm_pedaftaran_igd');
            $this->load->model('pelayanan/Pelayanan_model', 'm_pelayanan');
            $form_catatan_persalinan = $this->m_pelayanan->getCatatanPersalinan($id_pendaftaran); 

            $data['ttd_nama_ayah']        = $form_catatan_persalinan->nama_ayah; 


            $grafikpartograf = $this->m_pelayanan->getGrafikPartograf($id_pendaftaran); // Mengambil data grafik partograf berdasarkan ID pendaftaran
            $data['ttd_denyut_partograf'] = array_column((array) $grafikpartograf, 'denyut_partograf'); // Menyusun array yang hanya berisi nilai dari kolom 'denyut_partograf'

            // var_dump($data['ttd_denyut_partograf']);die;

            $grafikserviks = $this->m_pelayanan->getGrafikServiks($id_pendaftaran);
            $data['ttd_number_serviks'] = array_column((array) $grafikserviks, 'number_serviks');
            $data['ttd_kepala_serviks'] = array_column((array) $grafikserviks, 'kepala_serviks');
            $data['ttd_pembukaan_serviks'] = array_column((array) $grafikserviks, 'pembukaan_serviks');      
            // var_dump( $grafikserviks);die;
            
            $grafiknt = $this->m_pelayanan->getGrafikNT($id_pendaftaran);
            $data['ttd_number_nt'] = array_column((array) $grafiknt, 'number_nt');
            $data['ttd_atas_nt'] = array_column((array) $grafiknt, 'atas_nt');
            $data['ttd_nadi_nt'] = array_column((array) $grafiknt, 'nadi_nt');
            $data['ttd_tekanan_nt'] = array_column((array) $grafiknt, 'tekanan_nt');

            $data['ttd_tekanan_nt_3'] = array_column((array) $grafiknt, 'tekanan_nt_3');
            $data['ttd_tekanan_nt_4'] = array_column((array) $grafiknt, 'tekanan_nt_4');
            $data['ttd_tekanan_nt_5'] = array_column((array) $grafiknt, 'tekanan_nt_5');
            $data['ttd_tekanan_nt_6'] = array_column((array) $grafiknt, 'tekanan_nt_6');
            $data['ttd_tekanan_nt_7'] = array_column((array) $grafiknt, 'tekanan_nt_7');
            $data['ttd_tekanan_nt_8'] = array_column((array) $grafiknt, 'tekanan_nt_8');

            $data['ttd_hamil_partograf']        = $form_catatan_persalinan->hamil_partograf; 
            $data['ttd_g_partograf']            = $form_catatan_persalinan->g_partograf; 
            $data['ttd_p_partograf']            = $form_catatan_persalinan->p_partograf; 
            $data['ttd_a_partograf']            = $form_catatan_persalinan->a_partograf; 
            $data['ttd_tbj_partograf']          = $form_catatan_persalinan->tbj_partograf; 
            $data['ttd_tgl_mulas_partograf']    = $form_catatan_persalinan->tgl_mulas_partograf; 
            $data['ttd_pukul_mulas_partograf']  = $form_catatan_persalinan->pukul_mulas_partograf; 
            $data['ttd_tgl_masuk_partograf']    = $form_catatan_persalinan->tgl_masuk_partograf; 
            $data['ttd_pukul_masuk_partograf']  = $form_catatan_persalinan->pukul_masuk_partograf; 
            $data['ttd_tgl_pecah_partograf']    = $form_catatan_persalinan->tgl_pecah_partograf; 
            $data['ttd_pukul_pecah_partograf']  = $form_catatan_persalinan->pukul_pecah_partograf; 
            $data['ttd_air_ket_penyusupan']     = $form_catatan_persalinan->air_ket_penyusupan; 
            $data['ttd_air_ketu_penyusupan']    = $form_catatan_persalinan->air_ketu_penyusupan; 

            // var_dump($data['ttd_air_ket_penyusupan']);die;
            // var_dump($data['ttd_air_ketu_penyusupan']);die;

            $data['ttd_tgl_grafik_sk']          = $form_catatan_persalinan->tgl_grafik_sk; 
            $data['ttd_jam_grafik_sk']          = $form_catatan_persalinan->jam_grafik_sk; 
            $data['ttd_keterangan_grafik_sk']   = $form_catatan_persalinan->keterangan_grafik_sk; 
            $data['ttd_waktujam']               = $form_catatan_persalinan->waktujam; 
            $data['ttd_oksitosin']              = $form_catatan_persalinan->oksitosin; 
            $data['ttd_tetes']                  = $form_catatan_persalinan->tetes; 
            $data['ttd_obat_cairan']            = $form_catatan_persalinan->obat_cairan; 
            $data['ttd_suhu']                   = $form_catatan_persalinan->suhu; 
            $data['ttd_protein']                = $form_catatan_persalinan->protein; 
            $data['ttd_aseton']                 = $form_catatan_persalinan->aseton; 
            $data['ttd_volume']                 = $form_catatan_persalinan->volume; 
            $data['ttd_tgl_cp']                 = $form_catatan_persalinan->tgl_cp; 
            $data['ttd_bidan_cp']               = $form_catatan_persalinan->bidan; 
            $data['ttd_tp_cp']                  = $form_catatan_persalinan->tp_cp; 
            $data['ttd_alamat_cp']              = $form_catatan_persalinan->alamat_cp; 
            $data['ttd_catatan_cp']             = $form_catatan_persalinan->catatan_cp; 
            $data['ttd_as_cp']                  = $form_catatan_persalinan->as_cp; 
            $data['ttd_tr_cp']                  = $form_catatan_persalinan->tr_cp; 
            $data['ttd_juk_cp']                 = $form_catatan_persalinan->juk_cp; 
            $data['ttd_mas_cp']                 = $form_catatan_persalinan->mas_cp; 
            $data['ttd_part_cp']                = $form_catatan_persalinan->part_cp; 
            $data['ttd_kan_cp']                 = $form_catatan_persalinan->kan_cp; 
            $data['ttd_but_cp']                 = $form_catatan_persalinan->but_cp; 
            $data['ttd_sil_cp']                 = $form_catatan_persalinan->sil_cp; 
            $data['ttd_episiotomi_cp']          = $form_catatan_persalinan->episiotomi_cp; 
            $data['ttd_pendm_cp']               = $form_catatan_persalinan->pendm_cp; 
            $data['ttd_gwt_cp']                 = $form_catatan_persalinan->gwt_cp; 
            $data['ttd_distosia_cp']            = $form_catatan_persalinan->distosia_cp; 
            $data['ttd_tsb_cp']                 = $form_catatan_persalinan->tsb_cp; 
            $data['ttd_ini_cp']                 = $form_catatan_persalinan->ini_cp; 
            $data['ttd_iii_cp']                 = $form_catatan_persalinan->iii_cp; 
            $data['ttd_im_cp']                  = $form_catatan_persalinan->im_cp; 
            $data['ttd_tali_cp']                = $form_catatan_persalinan->tali_cp; 
            $data['ttd_pb_cp']                  = $form_catatan_persalinan->pb_cp; 
            $data['ttd_penegangan_cp']          = $form_catatan_persalinan->penegangan_cp; 
            $data['ttd_masase_cp']              = $form_catatan_persalinan->masase_cp; 
            $data['ttd_lahi_cp']                = $form_catatan_persalinan->lahi_cp; 
            $data['ttd_senta_cp']               = $form_catatan_persalinan->senta_cp; 
            $data['ttd_laser_cp']               = $form_catatan_persalinan->laser_cp; 
            $data['ttd_jika_cp']                = $form_catatan_persalinan->jika_cp; 
            $data['ttd_atoni_cp']               = $form_catatan_persalinan->atoni_cp; 
            $data['ttd_jum_cp']                 = $form_catatan_persalinan->jum_cp; 
            $data['ttd_penatalaksanaan_cp']     = $form_catatan_persalinan->penatalaksanaan_cp; 
            $data['ttd_Masalah_cp']             = $form_catatan_persalinan->Masalah_cp; 
            $data['ttd_bb_cp']                  = $form_catatan_persalinan->bb_cp; 
            $data['ttd_panjang_cp']             = $form_catatan_persalinan->panjang_cp; 
            $data['ttd_jk_cp']                  = $form_catatan_persalinan->jk_cp; 
            $data['ttd_by_cp']                  = $form_catatan_persalinan->by_cp; 
            $data['ttd_by_cplh']                = $form_catatan_persalinan->by_cplh; 
            $data['ttd_asi_cp']                 = $form_catatan_persalinan->asi_cp; 
            $data['ttd_sebutkan_cp']            = $form_catatan_persalinan->sebutkan_cp; 
            $data['ttd_waktu_iv']               = $form_catatan_persalinan->waktu_iv; 
            $data['ttd_tekanan_darah_iv']       = $form_catatan_persalinan->tekanan_darah_iv; 
            $data['ttd_nadi_iv']                = $form_catatan_persalinan->nadi_iv; 
            $data['ttd_suhu_iv']                = $form_catatan_persalinan->suhu_iv; 
            $data['ttd_tfu_iv']                 = $form_catatan_persalinan->tfu_iv; 
            $data['ttd_kontraksi_uterus_iv']    = $form_catatan_persalinan->kontraksi_uterus_iv; 
            $data['ttd_kandung_kemih_iv']       = $form_catatan_persalinan->kandung_kemih_iv; 
            $data['ttd_darah_yg_keluar_iv']     = $form_catatan_persalinan->darah_yg_keluar_iv; 
            $data['ttd_putih']                  = $form_catatan_persalinan->putih; 
            $data['ttd_abu']                    = $form_catatan_persalinan->abu; 
            $data['ttd_hitam']                  = $form_catatan_persalinan->hitam; 
            $this->load->view('pendaftaran_igd/printing/cetak_form_partograf', $data);
        endif;
    }


    // CPTDI CETAK 
    function cetak_cheklist_persiapan_tindakan_diagnostik_invasif($id_pendaftaran) {
        if ($id_pendaftaran !== NULL) :
            // Ambil data detail pendaftaran termasuk info pasien & layanan
            $pendaftaran = $this->klinik->getPendaftaranDetail($id_pendaftaran);

            // Jika data pasien kosong, hentikan proses
            if (count((array) $pendaftaran['pasien']) < 1) :
                die();
            endif;

            // Siapkan data untuk dikirim ke view
            $data['layanan'] = $pendaftaran['layanan'];
            $data['pasien'] = $pendaftaran['pasien'];

            // Konversi jenis kelamin ke bentuk teks
            $data['pasien']->kelamin == 'P'
                ? $data['pasien']->kelamin = 'Perempuan'
                : $data['pasien']->kelamin = 'Laki-laki';

            // Load model yang dibutuhkan
            $this->load->model('Pendaftaran_igd_model', 'm_pedaftaran_igd');
            $this->load->model('pelayanan/Pelayanan_model', 'm_pelayanan');

            // Ambil data checklist form dari database
            $form_cptdi = $this->m_pelayanan->getCheklistPersiapanTindakanDiagnostikInvasif($id_pendaftaran);

            $grafikobservasi = $this->m_pelayanan->getGrafikObservasiInvasif($id_pendaftaran);  // INI DATA GRAFIK
            // Memanggil fungsi `getaGrafikMonitoring` dari model `m_pelayanan` dengan parameter `$id_pendaftaran`
            // dan menyimpan hasilnya dalam variabel `$grafikobservasi`.
            $data['ttd_tglgo_cptdi'] = array_map(function ($date) { return date('d-m-Y', strtotime($date)); }, array_column((array) $grafikobservasi, 'tglgo_cptdi'));
            // Mengambil semua nilai kolom `tglgo_cptdi` dari array `$grafikobservasi` menggunakan `array_column`
            // Lalu memformat setiap nilai tanggal menjadi format `d-m-Y` menggunakan `array_map`.
            $data['ttd_bloodpressure_cptdi'] = array_column((array) $grafikobservasi, 'bloodpressure_cptdi');// Mengambil semua nilai kolom `bloodpressure_cptdi` dari array `$grafikobservasi` dan menyimpannya dalam `$data['ttd_bloodpressure_cptdi']`.
            $data['ttd_nadipulse_cptdi'] = array_column((array) $grafikobservasi, 'nadipulse_cptdi'); // Menyusun array yang hanya berisi nilai dari kolom 'nadipulse_cptdi'
            $data['ttd_pernafasan_cptdi'] = array_column((array) $grafikobservasi, 'pernafasan_cptdi'); // Menyusun array yang hanya berisi nilai dari kolom 'pernafasan_cptdi'
            $data['ttd_suhu_cptdi'] = array_column((array) $grafikobservasi, 'suhu_cptdi'); // Menyusun array yang hanya berisi nilai dari kolom 'suhu_cptdi'
            $data['ttd_jamgo_cptdi'] = array_column((array) $grafikobservasi, 'jamgo_cptdi'); // Menyusun array yang hanya berisi nilai dari kolom 'jamgo_cptdi'
            // var_dump($data['ttd_tglgo_cptdi']);die;

            // INI DATA BIASA
            $data['form_cptdi'] = $form_cptdi; 
            $data['ttd_tgl_layanan'] = $form_cptdi->tanggal ?? null; // Ambil tanggal tindakan (untuk ttd di cetakan)
            $data['ttd_bb_cptdi'] = $form_cptdi->bb_cptdi ?? null;
            $data['ttd_tb_cptdi'] = $form_cptdi->tb_cptdi ?? null;
            $data['ttd_tanggaljam_cptdi'] = $form_cptdi->tanggaljam_cptdi ?? null;
            $data['ttd_perawat_cptdi'] = $form_cptdi->perawat_1 ?? null;
            $data['ttd_perawat_1'] = $form_cptdi->ttd_perawat_1 ?? null;
            $data['ttd_sedasi_cptdi'] = $form_cptdi->sedasi_cptdi ?? null;
            $data['ttd_tanggaljagm_cptdi'] = $form_cptdi->tanggaljagm_cptdi ?? null;
            $data['ttd_perawatobsser_cptdi'] = $form_cptdi->perawat_2 ?? null;
            $data['ttd_perawat_2'] = $form_cptdi->ttd_perawat_2 ?? null;
            $data['ttd_sistemkemih_cptdi'] = $form_cptdi->sistemkemih_cptdi ?? null;

            // INI DATA MENGGUNKAN JSON
            $tujuan_cptdi = json_decode($form_cptdi->tujuan_cptdi ?? '{}', true); // Decode data JSON tujuan tindakan
            $data['ttd_tujuan_cptdi'] = $tujuan_cptdi;  // Simpan ke variabel agar mudah diakses di view
            $statuspsikologis_cptdi = json_decode($form_cptdi->statuspsikologis_cptdi ?? '{}', true);
            $data['ttd_statuspsikologis_cptdi'] = $statuspsikologis_cptdi;
            $riwayatpenyakit_cptdi = json_decode($form_cptdi->riwayatpenyakit_cptdi ?? '{}', true);
            $data['ttd_riwayatpenyakit_cptdi'] = $riwayatpenyakit_cptdi;
            $sistempernafasan_cptdi = json_decode($form_cptdi->sistempernafasan_cptdi ?? '{}', true);
            $data['ttd_sistempernafasan_cptdi'] = $sistempernafasan_cptdi;
            $sistempencernaan_cptdi = json_decode($form_cptdi->sistempencernaan_cptdi ?? '{}', true);
            $data['ttd_sistempencernaan_cptdi'] = $sistempencernaan_cptdi;
            $riwayatpengob_cptdi = json_decode($form_cptdi->riwayatpengob_cptdi ?? '{}', true);
            $data['ttd_riwayatpengob_cptdi'] = $riwayatpengob_cptdi;
            $riwayatalergi_cptdi = json_decode($form_cptdi->riwayatalergi_cptdi ?? '{}', true);
            $data['ttd_riwayatalergi_cptdi'] = $riwayatalergi_cptdi;
            $ttv_cptdi = json_decode($form_cptdi->ttv_cptdi ?? '{}', true);
            $data['ttd_ttv_cptdi'] = $ttv_cptdi;
            $testalent_cptdi = json_decode($form_cptdi->testalent_cptdi ?? '{}', true);
            $data['ttd_testalent_cptdi'] = $testalent_cptdi;         
            $arteridor_cptdi = json_decode($form_cptdi->arteridor_cptdi ?? '{}', true);
            $data['ttd_arteridor_cptdi'] = $arteridor_cptdi;
            $keluhannyeri_cptdi = json_decode($form_cptdi->keluhannyeri_cptdi ?? '{}', true);
            $data['ttd_keluhannyeri_cptdi'] = $keluhannyeri_cptdi;
            $kebutuhanedu_cptdi = json_decode($form_cptdi->kebutuhanedu_cptdi ?? '{}', true);
            $data['ttd_kebutuhanedu_cptdi'] = $kebutuhanedu_cptdi;
            $labroturiem_cptdi = json_decode($form_cptdi->labroturiem_cptdi ?? '{}', true);
            $data['ttd_labroturiem_cptdi'] = $labroturiem_cptdi;
            $skrining_cptdi = json_decode($form_cptdi->skrining_cptdi ?? '{}', true);
            $data['ttd_skrining_cptdi'] = $skrining_cptdi;      
            $hasilecho_cptdi = json_decode($form_cptdi->hasilecho_cptdi ?? '{}', true);
            $data['ttd_hasilecho_cptdi'] = $hasilecho_cptdi;     
            $mskep_cptdi = json_decode($form_cptdi->mskep_cptdi ?? '{}', true);
            $data['ttd_mskep_cptdi'] = $mskep_cptdi;  
            $rctindkep_cptdi = json_decode($form_cptdi->rctindkep_cptdi ?? '{}', true);
            $data['ttd_rctindkep_cptdi'] = $rctindkep_cptdi;          
            $pasientiba_cptdi = json_decode($form_cptdi->pasientiba_cptdi ?? '{}', true);
            $data['ttd_pasientiba_cptdi'] = $pasientiba_cptdi;
            $terpasang_cptdi = json_decode($form_cptdi->terpasang_cptdi ?? '{}', true);
            $data['ttd_terpasang_cptdi'] = $terpasang_cptdi;
            $pulsasia_cptdi = json_decode($form_cptdi->pulsasia_cptdi ?? '{}', true);
            $data['ttd_pulsasia_cptdi'] = $pulsasia_cptdi; 
            $pulsasidor_cptdi = json_decode($form_cptdi->pulsasidor_cptdi ?? '{}', true);
            $data['ttd_pulsasidor_cptdi'] = $pulsasidor_cptdi;
            $alatyt_cptdi = json_decode($form_cptdi->alatyt_cptdi ?? '{}', true);
            $data['ttd_alatyt_cptdi'] = $alatyt_cptdi; 
            $jenisanest_cptdi = json_decode($form_cptdi->jenisanest_cptdi ?? '{}', true);
            $data['ttd_jenisanest_cptdi'] = $jenisanest_cptdi;
            $antikoagulan_cptdi = json_decode($form_cptdi->antikoagulan_cptdi ?? '{}', true);
            $data['ttd_antikoagulan_cptdi'] = $antikoagulan_cptdi;
            $hematoma_cptdi = json_decode($form_cptdi->hematoma_cptdi ?? '{}', true);
            $data['ttd_hematoma_cptdi'] = $hematoma_cptdi;
            $leserasi_cptdi = json_decode($form_cptdi->leserasi_cptdi ?? '{}', true);
            $data['ttd_leserasi_cptdi'] = $leserasi_cptdi;
            $reaksif_cptdi = json_decode($form_cptdi->reaksif_cptdi ?? '{}', true);
            $data['ttd_reaksif_cptdi'] = $reaksif_cptdi;
            $intaker_cptdi = json_decode($form_cptdi->intaker_cptdi ?? '{}', true);
            $data['ttd_intaker_cptdi'] = $intaker_cptdi;
            $imobil_cptdi = json_decode($form_cptdi->imobil_cptdi ?? '{}', true);
            $data['ttd_imobil_cptdi'] = $imobil_cptdi;
            $maskeptan_cptdi = json_decode($form_cptdi->maskeptan_cptdi ?? '{}', true);
            $data['ttd_maskeptan_cptdi'] = $maskeptan_cptdi;
            $tdmandiri_cptdi = json_decode($form_cptdi->tdmandiri_cptdi ?? '{}', true);
            $data['ttd_tdmandiri_cptdi'] = $tdmandiri_cptdi;
            $saturasy_cptdi = json_decode($form_cptdi->saturasy_cptdi ?? '{}', true);
            $data['ttd_saturasy_cptdi'] = $saturasy_cptdi;
            $pulsasi_cptdi = json_decode($form_cptdi->pulsasi_cptdi ?? '{}', true);
            $data['ttd_pulsasi_cptdi'] = $pulsasi_cptdi;
            $reflek_cptdi = json_decode($form_cptdi->reflek_cptdi ?? '{}', true);
            $data['ttd_reflek_cptdi'] = $reflek_cptdi;

            // Cek apakah ada id_pendaftaran untuk ambil data diagnosa
            if (isset($form_cptdi->id_pendaftaran)) {
                // Diagnosa otomatis (utama & sekunder)
                $data['diagnosa_utama'] = $this->m_pelayanan->getDiagnosa($form_cptdi->id_pendaftaran) ?? [];
                $data['diagnosa_sekunder'] = $this->m_pelayanan->getDiagnosaSekunder($form_cptdi->id_pendaftaran) ?? [];
                // Diagnosa manual (input manual oleh petugas)
                $data['ds_manual_utama'] = $this->m_pelayanan->getDiagnosaManualUtama($form_cptdi->id_pendaftaran) ?? [];
                $data['ds_manual_sekunder'] = $this->m_pelayanan->getDiagnosaManualSekunder($form_cptdi->id_pendaftaran) ?? [];
            } else {
                // Jika tidak ada id_pendaftaran, kosongkan semua diagnosa
                $data['diagnosa_utama'] = [];
                $data['diagnosa_sekunder'] = [];
                $data['ds_manual_utama'] = [];
                $data['ds_manual_sekunder'] = [];
            }
            // Tampilkan halaman cetak checklist
            $this->load->view('pendaftaran_igd/printing/cetak_cheklist_persiapan_tindakan_diagnostik_invasif', $data);
        endif;
    }


     // ICC CETAK 
    function cetak_form_intensive_care_chart($id_pendaftaran){
        if ($id_pendaftaran !== NULL) : 
            $pendaftaran        = $this->klinik->getPendaftaranDetail($id_pendaftaran);
            // var_dump($pendaftaran);die;
            if (count((array) $pendaftaran['pasien']) < 1) :
                die();
            endif;
            $data['layanan'] = $pendaftaran['layanan'];
            $data['pasien'] = $pendaftaran['pasien'];
            // var_dump($data['pasien'] );die;
            $data['pasien']->kelamin == 'P' ? $data['pasien']->kelamin = 'Perempuan' : $data['pasien']->kelamin = 'Laki-laki';
            $this->load->model('Pendaftaran_igd_model', 'm_pedaftaran_igd');
            $this->load->model('pelayanan/Pelayanan_model', 'm_pelayanan');
            $form_icc = $this->m_pelayanan->getItensiveCareChart($id_pendaftaran); 
            // $data['ttd_dokterdpjpicc']          = $form_icc->dokter_1;
            $form_dokter = $this->m_pelayanan->getIDokter($id_pendaftaran); 
            $data['ttd_dokterdpjpicc']   = array_column((array) $form_dokter, 'dokter_1');
            
            $data['ttd_tgl_layanan']            = $form_icc->tanggal;
            $data['ttd_unitruangansebelumnya']  = $form_icc->unitruangansebelumnya;
            $data['ttd_dokterdpjptambahicc']    = $form_icc->dokter_2;
            $data['ttd_tglicc']                 = $form_icc->tglicc;
            $data['ttd_sofascore']              = $form_icc->sofascore;
            $data['ttd_bradenscore']            = $form_icc->bradenscore;
            $data['ttd_downscore']              = $form_icc->downscore;
            // $data['ttd_dokterdpjptambahiccq']   = $form_icc->dokter_3;
            $data['ttd_perawatanharike']        = $form_icc->perawatanharike;
            // $data['ttd_dokterdpjptambahiccw']   = $form_icc->dokter_4;
            $data['ttd_bbicc']                  = $form_icc->bbicc;
            $data['ttd_tbicc']                  = $form_icc->tbicc;
            $data['ttd_goldarahrh']             = $form_icc->goldarahrh;
            $data['ttd_diagnosisicc']           = $form_icc->diagnosisicc;
            $data['ttd_tanggaljoicc']           = $form_icc->tanggaljoicc;
            $data['ttd_jenisoperasiicc']        = $form_icc->jenisoperasiicc;
            $data['ttd_infusIicc']              = $form_icc->infusIicc;
            $data['ttd_tanggalpemasangan1']     = $form_icc->tanggalpemasangan1;
            $data['ttd_posisi1']                = $form_icc->posisi1;
            $data['ttd_ukuran1']                = $form_icc->ukuran1;
            $data['ttd_tanggalpencabutan1']     = $form_icc->tanggalpencabutan1;
            $data['ttd_infusIIicc']             = $form_icc->infusIIicc;
            $data['ttd_tanggalpemasangan2']     = $form_icc->tanggalpemasangan2;
            $data['ttd_posisi2']                = $form_icc->posisi2;
            $data['ttd_ukuran2']                = $form_icc->ukuran2;
            $data['ttd_tanggalpencabutan2']     = $form_icc->tanggalpencabutan2;
            $data['ttd_cvc']                    = $form_icc->cvc;
            $data['ttd_cdl']                    = $form_icc->cdl;
            $data['ttd_picc']                   = $form_icc->picc;
            $data['ttd_tanggalpemasangan3']     = $form_icc->tanggalpemasangan3;
            $data['ttd_posisi3']                = $form_icc->posisi3;
            $data['ttd_ukuran3']                = $form_icc->ukuran3;
            $data['ttd_tanggalpencabutan3']     = $form_icc->tanggalpencabutan3;
            $data['ttd_ett']                    = $form_icc->ett;
            $data['ttd_tracheostomy']           = $form_icc->tracheostomy;
            $data['ttd_tanggalpemasangan4']     = $form_icc->tanggalpemasangan4;
            $data['ttd_posisi4']                = $form_icc->posisi4;
            $data['ttd_ukuran4']                = $form_icc->ukuran4;
            $data['ttd_tanggalpencabutan4']     = $form_icc->tanggalpencabutan4;
            $data['ttd_icp']                    = $form_icc->icp;
            $data['ttd_ext']                    = $form_icc->ext;
            $data['ttd_epi']                    = $form_icc->epi;
            $data['ttd_tanggalpemasangan5']     = $form_icc->tanggalpemasangan5;
            $data['ttd_posisi5']                = $form_icc->posisi5;
            $data['ttd_ukuran5']                = $form_icc->ukuran5;
            $data['ttd_tanggalpencabutan5']     = $form_icc->tanggalpencabutan5;
            $data['ttd_cimino']                 = $form_icc->cimino;
            $data['ttd_avgraft']                = $form_icc->avgraft;
            $data['ttd_tanggalpemasangan6']     = $form_icc->tanggalpemasangan6;
            $data['ttd_posisi6']                = $form_icc->posisi6;
            $data['ttd_ukuran6']                = $form_icc->ukuran6;
            $data['ttd_tanggalpencabutan6']     = $form_icc->tanggalpencabutan6;
            $data['ttd_ngticc']                 = $form_icc->ngticc;
            $data['ttd_ogticc']                 = $form_icc->ogticc;
            $data['ttd_tanggalpemasangan7']     = $form_icc->tanggalpemasangan7;
            $data['ttd_posisi7']                = $form_icc->posisi7;
            $data['ttd_ukuran7']                = $form_icc->ukuran7;
            $data['ttd_tanggalpencabutan7']     = $form_icc->tanggalpencabutan7;
            $data['ttd_urineekttr']             = $form_icc->urineekttr;
            $data['ttd_tanggalpemasangan8']     = $form_icc->tanggalpemasangan8;
            $data['ttd_posisi8']                = $form_icc->posisi8;
            $data['ttd_ukuran8']                = $form_icc->ukuran8;
            $data['ttd_tanggalpencabutan8']     = $form_icc->tanggalpencabutan8;
            $data['ttd_pesaniic']               = $form_icc->pesaniic;
            $data['ttd_textkosong']             = $form_icc->textkosong;
            $data['ttd_alergiicct']             = $form_icc->alergiicct;
            $data['ttd_antibiotikicc']          = $form_icc->antibiotikicc;
            $data['ttd_kulturicc']              = $form_icc->kulturicc;
            $data['ttd_terapioralicc']          = $form_icc->terapioralicc;
            $data['ttd_terapioralicca']         = $form_icc->terapioralicca;
            $data['ttd_terapioraliccb']         = $form_icc->terapioraliccb;
            $data['ttd_terapioraliccc']         = $form_icc->terapioraliccc;
            $data['ttd_terapioraliccd']         = $form_icc->terapioraliccd;
            $data['ttd_terapioralicce']         = $form_icc->terapioralicce;
            $data['ttd_terapioraliccf']         = $form_icc->terapioraliccf;
            $data['ttd_terapioraliccg']         = $form_icc->terapioraliccg;
            $data['ttd_terapioralicch']         = $form_icc->terapioralicch;
            $data['ttd_terapioralicci']         = $form_icc->terapioralicci;
            $data['ttd_terapioraliccj']         = $form_icc->terapioraliccj;
            $data['ttd_terapioralicck']         = $form_icc->terapioralicck;
            $data['ttd_terapiinjeksiicc']       = $form_icc->terapiinjeksiicc;
            $data['ttd_terapiinjeksiicca']      = $form_icc->terapiinjeksiicca;
            $data['ttd_terapiinjeksiiccb']      = $form_icc->terapiinjeksiiccb;
            $data['ttd_terapiinjeksiiccc']      = $form_icc->terapiinjeksiiccc;
            $data['ttd_terapiinjeksiiccd']      = $form_icc->terapiinjeksiiccd;
            $data['ttd_terapiinjeksiicce']      = $form_icc->terapiinjeksiicce;
            $data['ttd_terapiinjeksiiccf']      = $form_icc->terapiinjeksiiccf;
            $data['ttd_terapiinjeksiiccg']      = $form_icc->terapiinjeksiiccg;
            $data['ttd_terapiinjeksiicch']      = $form_icc->terapiinjeksiicch;
            $data['ttd_terapiinjeksiicci']      = $form_icc->terapiinjeksiicci;
            $data['ttd_terapiinjeksiiccj']      = $form_icc->terapiinjeksiiccj;
            $data['ttd_terapiinjeksiicck']      = $form_icc->terapiinjeksiicck;
            $data['ttd_terapilainicc']          = $form_icc->terapilainicc;
            $data['ttd_terapilainicca']         = $form_icc->terapilainicca;
            $data['ttd_terapilainiccb']         = $form_icc->terapilainiccb;
            $data['ttd_lapcwpA']                = $form_icc->lapcwpA;
            $data['ttd_lapcwpB']                = $form_icc->lapcwpB;
            $data['ttd_lapcwpC']                = $form_icc->lapcwpC;
            $data['ttd_lapcwpD']                = $form_icc->lapcwpD;
            $data['ttd_lapcwpE']                = $form_icc->lapcwpE;
            $data['ttd_lapcwpF']                = $form_icc->lapcwpF;
            $data['ttd_lapcwpG']                = $form_icc->lapcwpG;
            $data['ttd_lapcwpH']                = $form_icc->lapcwpH;
            $data['ttd_lapcwpI']                = $form_icc->lapcwpI;
            $data['ttd_lapcwpJ']                = $form_icc->lapcwpJ;
            $data['ttd_lapcwpK']                = $form_icc->lapcwpK;
            $data['ttd_lapcwpL']                = $form_icc->lapcwpL;
            $data['ttd_lapcwpM']                = $form_icc->lapcwpM;
            $data['ttd_lapcwpN']                = $form_icc->lapcwpN;
            $data['ttd_lapcwpO']                = $form_icc->lapcwpO;
            $data['ttd_lapcwpP']                = $form_icc->lapcwpP;
            $data['ttd_lapcwpQ']                = $form_icc->lapcwpQ;
            $data['ttd_lapcwpR']                = $form_icc->lapcwpR;
            $data['ttd_lapcwpS']                = $form_icc->lapcwpS;
            $data['ttd_lapcwpT']                = $form_icc->lapcwpT;
            $data['ttd_lapcwpU']                = $form_icc->lapcwpU;
            $data['ttd_lapcwpV']                = $form_icc->lapcwpV;
            $data['ttd_lapcwpW']                = $form_icc->lapcwpW;
            $data['ttd_lapcwpX']                = $form_icc->lapcwpX;
            $data['ttd_lapcwpY']                = $form_icc->lapcwpY;
            $data['ttd_lapcwpZ']                = $form_icc->lapcwpZ;
            $data['ttd_lapcwpAA']               = $form_icc->lapcwpAA;
            $data['ttd_lapcwpBB']               = $form_icc->lapcwpBB;
            $data['ttd_lapcwpCC']               = $form_icc->lapcwpCC;
            $data['ttd_lapcwpDD']               = $form_icc->lapcwpDD;
            $data['ttd_lapcwpEE']               = $form_icc->lapcwpEE;
            $data['ttd_lapcwpFF']               = $form_icc->lapcwpFF;
            $data['ttd_lapcwpGG']               = $form_icc->lapcwpGG;
            $data['ttd_lapcwptext']             = $form_icc->lapcwptext;
            $data['ttd_sirkulasiA']             = $form_icc->sirkulasiA;
            $data['ttd_sirkulasiB']             = $form_icc->sirkulasiB;
            $data['ttd_sirkulasiC']             = $form_icc->sirkulasiC;
            $data['ttd_sirkulasiD']             = $form_icc->sirkulasiD;
            $data['ttd_sirkulasiE']             = $form_icc->sirkulasiE;
            $data['ttd_sirkulasiF']             = $form_icc->sirkulasiF;
            $data['ttd_sirkulasitext']          = $form_icc->sirkulasitext;
            $data['ttd_modeicc']                = $form_icc->modeicc;
            $data['ttd_mvemvicc']               = $form_icc->mvemvicc;
            $data['ttd_tvetvicc']               = $form_icc->tvetvicc;
            $data['ttd_totalrateicc']           = $form_icc->totalrateicc;
            $data['ttd_inspirasipressicc']      = $form_icc->inspirasipressicc;
            $data['ttd_modpeepicc']             = $form_icc->modpeepicc;
            $data['ttd_peakicc']                = $form_icc->peakicc;
            $data['ttd_fiicc']                  = $form_icc->fiicc;
            $data['ttd_cufforessicc']           = $form_icc->cufforessicc;
            $data['ttd_suctionicc']             = $form_icc->suctionicc;
            $data['ttd_gdsicc']                 = $form_icc->gdsicc;
            $data['ttd_respirasitext']          = $form_icc->respirasitext;
            $data['ttd_ukuranpupilicc']         = $form_icc->ukuranpupilicc;
            $data['ttd_reaksipupilicc']         = $form_icc->reaksipupilicc;
            $data['ttd_gcsicc']                 = $form_icc->gcsicc;
            $data['ttd_kesadaranicct']          = $form_icc->kesadaranicct;
            $data['ttd_plebitisicc']            = $form_icc->plebitisicc;
            $data['ttd_locationicc']            = $form_icc->locationicc;
            $data['ttd_intensity']              = $form_icc->intensity;
            $data['ttd_sedationicc']            = $form_icc->sedationicc;
            $data['ttd_neurotext']              = $form_icc->neurotext;         
            $data['ttd_phicc']                  = $form_icc->phicc;
            $data['ttd_pcoicc']                 = $form_icc->pcoicc;
            $data['ttd_poicc']                  = $form_icc->poicc;
            $data['ttd_tcoicc']                 = $form_icc->tcoicc;
            $data['ttd_belicc']                 = $form_icc->belicc;
            $data['ttd_hcoicc']                 = $form_icc->hcoicc;
            $data['ttd_ooduaicc']               = $form_icc->ooduaicc;
            $data['ttd_saturwasiicc']           = $form_icc->saturwasiicc;
            $data['ttd_nakclcaicc']             = $form_icc->nakclcaicc;
            $data['ttd_ureumcreatininicc']      = $form_icc->ureumcreatininicc;
            $data['ttd_albuminicc']             = $form_icc->albuminicc;
            $data['ttd_hbhtleuicc']             = $form_icc->hbhtleuicc;
            $data['ttd_otpticc']                = $form_icc->otpticc;
            $data['ttd_bildirectlicc']          = $form_icc->bildirectlicc;
            $data['ttd_ckckmbicc']              = $form_icc->ckckmbicc;
            $data['ttd_ptapttcc']               = $form_icc->ptapttcc;
            $data['ttd_fibrinogenicc']          = $form_icc->fibrinogenicc;
            $data['ttd_crppcticc']              = $form_icc->crppcticc;

            $form_cpi = $this->m_pelayanan->getCatatanPerawatIcc($id_pendaftaran); 
            $data['ttd_jampagiicc']         = array_column((array) $form_cpi, 'jampagiicc');
            $data['ttd_dinaspagiicc']       = array_column((array) $form_cpi, 'dinaspagiicc');
            $data['ttd_parafpagiicc']       = array_column((array) $form_cpi, 'parafpagiicc');
            $data['ttd_nama_perawat_pagi']  = array_column((array) $form_cpi, 'nama_perawat_pagi');
            $data['ttd_jamsoreicc']         = array_column((array) $form_cpi, 'jamsoreicc');
            $data['ttd_dinassoreicc']       = array_column((array) $form_cpi, 'dinassoreicc');
            $data['ttd_parafsoreicc']       = array_column((array) $form_cpi, 'parafsoreicc');
            $data['ttd_nama_perawat_sore']  = array_column((array) $form_cpi, 'nama_perawat_sore');
            $data['ttd_jammalamicc']        = array_column((array) $form_cpi, 'jammalamicc');
            $data['ttd_dinasmalamicc']      = array_column((array) $form_cpi, 'dinasmalamicc');
            $data['ttd_parafmalamicc']      = array_column((array) $form_cpi, 'parafmalamicc');
            $data['ttd_nama_perawat_malam'] = array_column((array) $form_cpi, 'nama_perawat_malam');

            $data['ttd_intakeA']            = $form_icc->intakeA;
            $data['ttd_intakeB']            = $form_icc->intakeB;
            $data['ttd_intakeC']            = $form_icc->intakeC;
            $data['ttd_intakeD']            = $form_icc->intakeD;
            $data['ttd_intakeE']            = $form_icc->intakeE;
            $data['ttd_intakeF']            = $form_icc->intakeF;
            $data['ttd_intakeG']            = $form_icc->intakeG;
            $data['ttd_intakeH']            = $form_icc->intakeH;
            $data['ttd_intakeI']            = $form_icc->intakeI;
            $data['ttd_intakeJ']            = $form_icc->intakeJ;
            $data['ttd_intakeK']            = $form_icc->intakeK;
            $data['ttd_intakeL']            = $form_icc->intakeL;
            $data['ttd_drainA']             = $form_icc->drainA;
            $data['ttd_drainB']             = $form_icc->drainB;
            $data['ttd_drainC']             = $form_icc->drainC;
            $data['ttd_drainD']             = $form_icc->drainD;
            $data['ttd_ngtE']               = $form_icc->ngtE;
            $data['ttd_babF']               = $form_icc->babF;
            $data['ttd_bakG']               = $form_icc->bakG;
            $data['ttd_totalperjamH']       = $form_icc->totalperjamH;
            $data['ttd_runingtotalI']       = $form_icc->runingtotalI;
            $data['ttd_totaloutput']        = $form_icc->totaloutput;
            $data['ttd_balenceJ']           = $form_icc->balenceJ;
            $data['ttd_balenceK']           = $form_icc->balenceK;
            $data['ttd_balanceL']           = $form_icc->balanceL;
            $data['ttd_frekuensinafasicc']  = $form_icc->frekuensinafasicc; 
            $data['ttd_retraksiicc']        = $form_icc->retraksiicc; 
            $data['ttd_sianosisicc']        = $form_icc->sianosisicc; 
            $data['ttd_airentriicc']        = $form_icc->airentriicc; 
            $data['ttd_merintihicc']        = $form_icc->merintihicc; 
            $data['ttd_total_nilai_dsegn']  = $form_icc->total_nilai_dsegn; 
            $data['ttd_totalyicc_1']        = $form_icc->totalyicc_1; 
            $data['ttd_totalyicc_2']        = $form_icc->totalyicc_2; 
            $data['ttd_totalyicc_3']        = $form_icc->totalyicc_3; 
            $data['ttd_totalyicc_4']        = $form_icc->totalyicc_4; 
            $data['ttd_totalyicc_5']        = $form_icc->totalyicc_5; 
            $data['ttd_totalyicc_6']        = $form_icc->totalyicc_6; 
            $data['ttd_veryicc_1']          = $form_icc->veryicc_1; 
            $data['ttd_veryicc_2']          = $form_icc->veryicc_2; 
            $data['ttd_veryicc_3']          = $form_icc->veryicc_3; 
            $data['ttd_veryicc_4']          = $form_icc->veryicc_4; 
            $data['ttd_veryicc_5']          = $form_icc->veryicc_5; 
            $data['ttd_veryicc_6']          = $form_icc->veryicc_6; 
            $data['ttd_slightly_1']         = $form_icc->slightly_1; 
            $data['ttd_slightly_2']         = $form_icc->slightly_2; 
            $data['ttd_slightly_3']         = $form_icc->slightly_3; 
            $data['ttd_slightly_4']         = $form_icc->slightly_4; 
            $data['ttd_slightly_5']         = $form_icc->slightly_5; 
            $data['ttd_slightly_6']         = $form_icc->slightly_6; 
            $data['ttd_impairment_1']       = $form_icc->impairment_1; 
            $data['ttd_impairment_2']       = $form_icc->impairment_2; 
            $data['ttd_impairment_3']       = $form_icc->impairment_3; 
            $data['ttd_impairment_4']       = $form_icc->impairment_4; 
            $data['ttd_impairment_5']       = $form_icc->impairment_5; 
            $data['ttd_total_nilai_bras']   = $form_icc->total_nilai_bras; 
            $data['ttd_respirationa']       = $form_icc->respirationa; 
            $data['ttd_coagulation']        = $form_icc->coagulation; 
            $data['ttd_bilirubin']          = $form_icc->bilirubin; 
            $data['ttd_cardiovascular']     = $form_icc->cardiovascular; 
            $data['ttd_cns']                = $form_icc->cns; 
            $data['ttd_renalicc']           = $form_icc->renalicc; 
            $data['ttd_total_nilai_ss']     = $form_icc->total_nilai_ss; 
            $data['ttd_sspm']               = $form_icc->sspm; 
            $data['ttd_ngcsk']              = $form_icc->ngcsk; 
            $data['ttd_mataicc']            = $form_icc->mataicc; 
            $data['ttd_motorikicc']         = $form_icc->motorikicc; 
            $data['ttd_verbalicc']          = $form_icc->verbalicc; 
            $data['ttd_jmlhtrs']            = $form_icc->jmlhtrs; 
            $data['ttd_plebitistkicc']      = $form_icc->plebitistkicc; 
            $this->load->view('pendaftaran_igd/printing/cetak_form_intensive_care_chart', $data);
        endif;
    }


    
}
