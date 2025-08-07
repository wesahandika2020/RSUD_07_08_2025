<?php

defined('BASEPATH') or exit('No direct script access allowed');


class Pendaftaran_poli extends SYAM_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('App_model', 'default');
        $this->load->model('Masterdata_model', 'auto');
        $this->load->model('opendata/Opendata_model', 'opendata');
        $this->load->model('pendaftaran/Pendaftaran_model', 'klinik');
        $this->load->model('rekam_medis/Rekam_medis_model', 'rekam_medis');
        $this->load->model('rawat_inap/Rawat_inap_model', 'm_rawat_inap');
        $this->load->model('panggil_pasien/Panggil_pasien_model', 'call');
        $this->load->model('Pendaftaran_poli_model', 'm_pendaftaran_poli');
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

    function page_pendaftaran_poli()
    {
        $data['jenis_pelayanan'] = '2';
        $data['agama']           = $this->auto->getAgama();
        $data['etnis']           = $this->auto->getEtnis();
        $data['kelamin']         = $this->auto->getKelamin();
        $data['domisili']        = $this->auto->getDomisili();
        $data['cara_bayar']      = $this->auto->getCaraBayar();
        $data['asal_masuk']      = $this->auto->getAsalMasuk();
        $data['kunjungan']       = $this->auto->getKunjungan();
        $data['pekerjaan']       = $this->auto->getPekerjaan();
        $data['pendidikan']      = $this->auto->getPendidikan();
        $data['statuspasien']    = $this->auto->getStatusPasien();
        $data['goldarah']        = $this->auto->getGolonganDarah();
        $data['pernikahan']      = $this->auto->getStatusPernikahan();
        $data['hamkom']          = $this->auto->getHambatanKomunikasi();
        $data['layanan']         = $this->auto->getLayananRegistration(null);
        $data['filter_advance']  = $this->call->getFilterLoket();
        $data['shifpoli']        = $this->auto->shiftPoli();
        $data['hak_kelas']       = $this->getHakKelasBPJS();
        $this->load->view('index', $data);
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

    function cetak_bukti_kunjungan_poli($id_pendaftaran)
    {
        if ($id_pendaftaran !== null) :
            $data['title'] = 'BUKTI KUNJUNGAN';
            $data['hospital'] = $this->default->getDataHospital();

            $pendaftaran = $this->klinik->getPendaftaranDetail($id_pendaftaran);
            if (count((array) $pendaftaran['pasien']) < 1) :
                die();
            endif;
            // echo json_encode($pendaftaran); die;
            $data['pasien'] = $pendaftaran['pasien'];
            $data['pelayanan'] = $pendaftaran['layanan'][0];
            // echo json_encode($data); die;
            $this->load->view('pendaftaran_poli/printing/bukti_kunjungan_poli', $data);
        endif;
    }

    function generate_qrcode($isi_code)
    {
        $this->load->library('ciqrcode');
        QRcode::png($isi_code, $outfile = false, $level = QR_ECLEVEL_H, $size = 4);
        // $this->ciqrcode->generate($isi_code);
    }

    public function generate_qrcode_text($isi_code)
    {
        $this->load->library('ciqrcode');
        $decoded_code = base64_decode($isi_code);
        QRcode::png($decoded_code, false, QR_ECLEVEL_H, 4); // Pastikan untuk menggunakan ukuran yang sesuai
    }

    public function generate_qrcode_url($isi_code)
    {
        $this->load->library('ciqrcode');
        // $decoded_code = base64_decode($isi_code);
        QRcode::png("https://pacsrsudkotatangerang.com/patient/samples/externalcontroller/viewer.html?study=".$isi_code, false, QR_ECLEVEL_H, 4); // Pastikan untuk menggunakan ukuran yang sesuai
    }

    function cetak_no_antrian($id_pendaftaran, $id_layanan)
    {
        if ($id_pendaftaran !== null) {
            $data['title'] = 'Cetak Nomor Antrian Pemeriksaan Poli';
            $data['hospital'] = $this->default->getDataHospital();
            $pendaftaran = $this->klinik->getPendaftaranDetail($id_pendaftaran, $id_layanan);
            $data['pasien'] = $pendaftaran['pasien'];
            $data['layanan'] = $pendaftaran['layanan'];
            $this->load->view('pendaftaran_poli/printing/no_antrian_poli', $data);
        }
    }

    function generate_barcode($code)
    {
        //load library
        $this->load->library('Zend');
        //load in folder Zend
        $this->zend->load('Zend/Barcode');
        //generate barcode
        Zend_Barcode::render('code128', 'image', array('text' => $code), array('imageType' => 'gif'));
    }

    function generate_barcode_v2($code)
    {
        //load library
        $this->load->library('Zend');
        //load in folder Zend
        $this->zend->load('Zend/Barcode');
        //generate barcode
        Zend_Barcode::render('code128', 'image', array('text' => $code, 'backgroundColor' => "#BDE3F4"), array('imageType' => 'gif'));
    }

    function cetak_kartu_pasien_poli($id_pendaftaran)
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
            $this->load->view('pendaftaran_poli/printing/kartu_pasien_poli', $data);
        endif;
    }

    function cetak_label_berkas_poli($id_pendaftaran)
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
            $this->load->view('pendaftaran_poli/printing/label_berkas_poli', $data);
        endif;
    }

    function cetak_resume_medis($id)
    {
        if ($id !== null) :

            $data['diagnosa_utama'] = '';
            $data['diagnosa_sekunder'] = '';
            $data['tindakan'] = '';
            $data['diet'] = '';
            $data['pemeriksaan_fisik'] = '';

            $data['kajian_medis'] = $this->m_rawat_inap->getKajianMedis($id);

            $data['kajian_perawatan'] = $this->m_rawat_inap->getKajianKeperawatan($id);

            $data['rawat_inap'] = $this->db->select('ri.*, bg.nama as nama_bangsal, k.nama as nama_kelas, pj.nama as penjamin, pa.nama as nama_pasien, pa.id as no_rm, pd.no_register, pa.tanggal_lahir, pa.kelamin, lp.tindak_lanjut as status, lp.kondisi')
                ->from('sm_rawat_inap as ri')
                ->join('sm_layanan_pendaftaran as lp', 'lp.id = ri.id_layanan_pendaftaran')
                ->join('sm_pendaftaran as pd', 'pd.id = lp.id_pendaftaran')
                ->join('sm_pasien as pa', 'pa.id = pd.id_pasien')
                ->join('sm_bangsal as bg', 'bg.id = ri.id_bangsal')
                ->join('sm_kelas as k', 'k.id = ri.id_kelas')
                ->join('sm_penjamin as pj', 'pj.id = ri.id_penjamin', 'left')
                ->where('ri.id_layanan_pendaftaran', $id, true)
                ->get()
                ->row();

            if ($data['kajian_perawatan'] != NULL) {
                if ($data['kajian_perawatan']->alergi != NULL) {
                    $data['kajian_perawatan']->alergi == 0 ? $data['kajian_perawatan']->alergi == 'Tidak Ada' : 'Ada';
                }

                $encodeKesadaran = json_decode($data['kajian_perawatan']->kesadaran);

                if ($encodeKesadaran->composmentis == 1) {
                    $kesadaran = 'Composmentis';
                } else if ($encodeKesadaran->apatis == 1) {
                    $kesadaran = 'Apatis';
                } else if ($encodeKesadaran->samnolen == 1) {
                    $kesadaran = 'Samnolen';
                } else if ($encodeKesadaran->sopor == 1) {
                    $kesadaran = 'Sopor';
                } else if ($encodeKesadaran->koma == 1) {
                    $kesadaran = 'Koma';
                }

                $gcs = $encodeKesadaran->gcs_e || $encodeKesadaran->gcs_m || $encodeKesadaran->gcs_v;

                $data['pemeriksaan_fisik'] = 'Kesadaran: ' . $kesadaran . ', GCS: ' . $gcs . ', E: ' . $encodeKesadaran->gcs_e . ', M: ' . $encodeKesadaran->gcs_m . ', V:' . $encodeKesadaran->gcs_v . ', TD: ' . $data['kajian_perawatan']->tensi_sistolik_awal . '/' . $data['kajian_perawatan']->tensi_diastolik_awal . 'mmHg, RR: ' . $data['kajian_perawatan']->nafas_awal . ' x/m, N: ' . $data['kajian_perawatan']->nadi_awal . ' x/m, T: ' . $data['kajian_perawatan']->suhu_awal . 'c';
            }

            $diagnosa_utamas = $this->db->select('gss.nama')
                ->from('sm_diagnosa as d')
                ->join('sm_golongan_sebab_sakit as gss', 'gss.id = d.id_golongan_sebab_sakit')
                ->where('d.id_layanan_pendaftaran', $id, true)
                ->where('prioritas', 'Utama')
                ->get()
                ->result();

            foreach ($diagnosa_utamas as $diagnosa_utama) {
                $data['diagnosa_utama'] .= $diagnosa_utama->nama . '. ';
            }

            $diagnosa_sekunders = $this->db->select('gss.nama')
                ->from('sm_diagnosa as d')
                ->join('sm_golongan_sebab_sakit as gss', 'gss.id = d.id_golongan_sebab_sakit')
                ->where('d.id_layanan_pendaftaran', $id, true)
                ->where('prioritas', 'Sekunder')
                ->get()
                ->result();

            foreach ($diagnosa_sekunders as $diagnosa_sekunder) {
                $data['diagnosa_sekunder'] .= $diagnosa_sekunder->nama . '. ';
            }

            $tindakans = $this->db->select('l.nama')
                ->from('sm_tarif_tindakan_pasien as ttp')
                ->join('sm_tarif_pelayanan as tp', 'tp.id = ttp.id_tarif_pelayanan')
                ->join('sm_layanan as l', 'l.id = tp.id_layanan')
                ->where('ttp.id_layanan_pendaftaran', $id, true)
                ->get()
                ->result();

            foreach ($tindakans as $tindakan) {
                $data['tindakan'] .= $tindakan->nama . '. ';
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

            $data['terapi_pulang'] = $this->db->select('tp.*, b.nama as nama_obat')
                ->from('sm_terapi_pulang as tp')
                ->join('sm_barang as b', 'b.id = tp.obat')
                ->where('tp.id_layanan_pendaftaran', $id, true)
                ->get()
                ->result();

            // var_dump($data['terapi_pulang']);exit(1);

            $this->load->view('pendaftaran_poli/printing/resume_medis', $data);
        endif;
    }

    // function cetak_surat_pengantar_rawat($id)
    // {
    //     if ($id !== null) :            
    //         $pendaftaran = $this->klinik->getPendaftaranDetail($id);

    //         if (count((array) $pendaftaran['pasien']) < 1) :
    //             die();
    //         endif;

    //         $data['pasien'] = $pendaftaran['pasien'];
    // 		$data['pasien']->kelamin == 'P' ? $data['pasien']->kelamin = 'Perempuan' : $data['pasien']->kelamin = 'Laki-laki';

    // 		$this->load->view('pendaftaran_poli/printing/surat_pengantar_rawat', $data);
    //     endif;
    // }

    function cetak_tata_tertib_pasien($id)
    {
        if ($id !== null) :
            $pendaftaran = $this->klinik->getPendaftaranDetail($id);

            if (count((array) $pendaftaran['pasien']) < 1) :
                die();
            endif;

            $data['pasien'] = $pendaftaran['pasien'];
            $data['pasien']->kelamin == 'P' ? $data['pasien']->kelamin = 'Perempuan' : $data['pasien']->kelamin = 'Laki-laki';

            $this->load->view('pendaftaran_poli/printing/tata_tertib_pasien', $data);
        endif;
    }

    function cetak_persetujuan_rawat_inap($id, $isPasien)
    {
        if ($id !== null) :
            $pendaftaran = $this->klinik->getPendaftaranDetail($id);

            if (count((array) $pendaftaran['pasien']) < 1) :
                die();
            endif;

            $data['pasien'] = $pendaftaran['pasien'];
            $data['pasien']->kelamin == 'P' ? $data['pasien']->kelamin = 'Perempuan' : $data['pasien']->kelamin = 'Laki-laki';

            if ($isPasien == 'ya') {
                $data['ttd_pasien_title'] = '<b>saya sendiri</b>';
                $data['ttd_pasien_name'] = '<b>' . $data['pasien']->nama . '</b>';
                $data['ttd_pasien_tgl_lahir'] = '<b>' . datefmysql($data['pasien']->tanggal_lahir) . '</b>';
                $data['ttd_pasien_kelamin'] = '<b>' . $data['pasien']->kelamin . '</b>';
                $data['ttd_pasien_alamat'] = '<b>' . $data['pasien']->alamat . '</b>';
                $data['ttd_pasien_nik'] = '<b>' . $data['pasien']->no_identitas . '</b>';
            } else {
                $data['ttd_pasien_title'] = 'saya sendiri*/Suami/Isteri/Anak*/Ayah/Ibu* Saya';
                $data['ttd_pasien_name'] = '..........................................';
                $data['ttd_pasien_tgl_lahir'] = '.....................................................';
                $data['ttd_pasien_kelamin'] = 'Laki-laki/Perempuan*';
                $data['ttd_pasien_alamat'] = '.....................................................';
                $data['ttd_pasien_nik'] = '.....................................................';
            }

            $this->load->view('pendaftaran_poli/printing/surat_persetujuan_rawat_inap', $data);
        endif;
    }

    function cetak_surat_keterangan_kematian($id)
    {
        if ($id !== null) :
            // $id_pendaftaran = $this->db->select('id_pendaftaran')->from('sm_layanan_pendaftaran')->where('id', $id)->get()->row()->id_pendaftaran;
            $pendaftaran = $this->klinik->getPendaftaranDetail($id);

            if (count((array) $pendaftaran['pasien']) < 1) :
                die();
            endif;

            $data['pasien'] = $pendaftaran['pasien'];
            $data['pasien']->kelamin == 'P' ? $data['pasien']->kelamin = 'Perempuan' : $data['pasien']->kelamin = 'Laki-laki';

            $suratKeteranganKematian = $this->rekam_medis->getSuratKeteranganKematianById($id);
            $data['surat_keterangan_kematian'] = $suratKeteranganKematian;

            $this->load->view('pendaftaran_poli/printing/surat_keterangan_kematian', $data);
        endif;
    }

    function cetak_visum_et_repertum($id)
    {
        if ($id !== null) :
            $pendaftaran = $this->klinik->getPendaftaranDetail($id);

            if (count((array) $pendaftaran['pasien']) < 1) :
                die();
            endif;

            $data['pasien'] = $pendaftaran['pasien'];
            $data['pasien']->kelamin == 'P' ? $data['pasien']->kelamin = 'Perempuan' : $data['pasien']->kelamin = 'Laki-laki';

            $visumEtRepertum = $this->rekam_medis->getVisumEtRepertumById($id);
            $data['visum_et_repertum'] = $visumEtRepertum[0];

            $this->load->view('pendaftaran_poli/printing/visum_et_repertum', $data);
        endif;
    }


    public function cetak_identitas_pasien($id)
    {
        $layananPendaftaran = $this->db->where('id', $id)->get('sm_layanan_pendaftaran')->row();
        $data = $this->m_pendaftaran_poli->getIdentitasPasien($layananPendaftaran->id_pendaftaran);

        $this->load->view('pendaftaran_poli/printing/identitas_pasien', $data);
    }

    public function cetak_persetujuan_umum($id)
    {
        $data = $this->m_pendaftaran_poli->getPersetujuanUmumById($id);

        $this->load->view('pendaftaran_poli/printing/persetujuan_umum', $data);
    }

    public function cetak_ringkasan_riwayat_masuk_dan_keluar($id)
    {
        $data = $this->m_pendaftaran_poli->getRingkasanRiwayatMasukDanKeluarById($id);

        $this->load->view('pendaftaran_poli/printing/ringkasan_riwayat_masuk_dan_keluar', $data[0]);
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
        $data['edukasi'] = $this->m_pendaftaran_poli->getEdukasi($id_pendaftaran);
        // $data['edukasi'] = $this->m_pelayanan->getEdukasi($id_layanan_pendaftaran);
        $this->load->view('printing/cetak_form_edukasi', $data);
    }
}
