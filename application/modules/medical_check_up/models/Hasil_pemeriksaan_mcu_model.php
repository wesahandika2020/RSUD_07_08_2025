<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Hasil_pemeriksaan_mcu_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
        $this->datetime = date('Y-m-d H:i:s');
    }

    public function getHasilPemeriksaan($id_pendaftaran)
    {
        $this->db->select('mcu.*, pg.nama as nama_dokter, pg.nip as nip_dokter');
        $this->db->from('sm_hasil_pemeriksaan_mcu as mcu');
        $this->db->join('sm_tenaga_medis as tm', 'mcu.id_dokter = tm.id');
        $this->db->join('sm_pegawai as pg', 'tm.id_pegawai = pg.id');
        $this->db->where('mcu.id_pendaftaran', $id_pendaftaran);

        return $this->db->get()->row();
    }

    function getFaktorKlinis($id_pendaftaran)
    {
        $detailFK = [];
        $data_faktor_klinis = $this->db->get_where('sm_faktor_klinis_mcu', array('id_pendaftaran' => $id_pendaftaran))->result();

        foreach ($data_faktor_klinis as $val) {
            $detailFK = $this->db->get_where('sm_detail_faktor_klinis_mcu', array('id_faktor_klinis' => $val->id))->result();
            $val->detail = $detailFK;
        }

        return $data_faktor_klinis;
    }

    public function getDataFileRMLain($id_pendaftaran)
    {
        $this->db->select('fu.*, pd.tanggal_daftar, pd.jenis_rawat, pg.nama as nama_petugas, muf.nama as nama_kategori, muf.kode as kode_kategori');
        $this->db->from('sm_file_upload_lainnya as fu');
        $this->db->join('sm_master_upload_file as muf', 'fu.id_master_upload_file = muf.id');
        $this->db->join('sm_pegawai as pg', 'fu.id_user = pg.id');
        $this->db->join('sm_pendaftaran as pd', 'fu.id_pendaftaran = pd.id');

        // Permintaan Perubahan Dok Erny tgl 18 Juli 2024
        $this->db->where('pd.id', $id_pendaftaran);

        // if ($for_case === 'CASEMIX') {
        //     $this->db->where('fu.id_pasien', $id_pasien);
        // } else {
        //     $this->db->where('fu.id_pendaftaran', $id_pendaftaran);
        // }

        return $this->db->get()->row();
    }

    public function getDataQuisionerMCU($id_layanan)
    {
        $this->db->select("to_char(lp.tanggal_layanan, 'yyyy-mm-dd') as tanggal_layanan, p.no_identitas as nik")
            ->from("sm_layanan_pendaftaran lp")
            ->join("sm_pendaftaran as pd", "lp.id_pendaftaran = pd.id")
            ->join("sm_pasien as p", "pd.id_pasien = p.id")
            ->where("lp.id", $id_layanan);
        $getData = $this->db->get()->row();

        $sql = "SELECT *, CONCAT_WS(', ', CASE WHEN rp.rl_alergi_makanan = '1' then 'Alergi Makanan' ELSE null END, 
                CASE WHEN rp.rl_alergi_obat = '1' THEN 'Alergi Obat' ELSE null END) as alergi,
                CONCAT_WS(', ',
                    CASE WHEN rp.rpk_hipertensi = 1 THEN 'Hipertensi' ELSE NULL END,
                    CASE WHEN rp.rpk_tumor = 1 THEN 'Tumor' ELSE NULL END,
                    CASE WHEN rp.rpk_asma = 1 THEN 'Asma' ELSE NULL END,
                    CASE WHEN rp.rpk_hemoroid = 1 THEN 'Hemoroid' ELSE NULL END,
                    CASE WHEN rp.rpk_alergi = 1 THEN 'Ada Riwayat Alergi dari Keluarga' ELSE NULL END,
                    CASE WHEN rp.rpk_tb = 1 THEN 'Tuberculosis' ELSE NULL END,
                    CASE WHEN rp.rpk_stroke = 1 THEN 'Stroke' ELSE NULL END,
                    CASE WHEN rp.rpk_diabetes = 1 THEN 'Diabetes' ELSE NULL END,
                    CASE WHEN rp.rpk_gangguan_jiwa = 1 THEN 'Gangguan Jiwa' ELSE NULL END,
                    CASE WHEN rp.rpk_sakit_kuning = 1 THEN 'Sakit Kuning' ELSE NULL END,
                    CASE WHEN rp.rpk_kelainan_darah = 1 THEN 'Kelainan Darah' ELSE NULL END,
                    CASE WHEN rp.rpk_penyakit_jantung = 1 THEN 'Penyakit Jantung' ELSE NULL END,
                    CASE WHEN rp.rpk_riwayat_lainnya = 1 THEN 'Ada Riwayat Penyakit Lainnya' ELSE NULL END
                ) AS riwayat_penyakit_keluarga,
                CONCAT_WS(', ',
                    CASE WHEN (rp.rss_radang_selaput + rp.rss_lumpuh + rp.rss_polio + rp.rss_ayan + rp.rss_stroke) > 1 THEN 'Sistem Saraf' ELSE NULL END,
                    CASE WHEN (rp.rj_serangan_jantung + rp.rj_nyeri_dada + rp.rj_rasa_berdebar + rp.rj_rtekanan_darting) > 1 THEN 'Jantung' ELSE NULL END,
                    CASE WHEN (rp.rp_difteri + rp.rp_sinusitis + rp.rp_bronkitis + rp.rp_batuk_darah + rp.rp_tbc + rp.rp_radang_paru + rp.rp_asma + rp.rp_sesak_nafas) > 1 THEN 'Pernapasan' ELSE NULL END,
                    CASE WHEN (rp.rgsk_sulit_bak + rp.rgsk_radang_saluran_kemih + rp.rgsk_penyakit_ginjal + rp.rgsk_kencing_batu + rp.rgsk_sulit_menahan_kemih) > 1 THEN 'Ginjal dan Saluran Kemih' ELSE NULL END,
                    CASE WHEN (rp.rkk_cacar_air + rp.rkk_jamur_kulit + rp.rkk_penyakit_kelamin + rp.rkk_tbc_kulit + rp.rkk_campak) > 1 THEN 'Kulit dan kelamin' ELSE NULL END,
                    CASE WHEN (rp.rsc_tifoid + rp.rsc_muntah_darah + rp.rsc_sulit_bab + rp.rsc_maag + rp.rsc_penyakit_kuning + rp.rsc_penyakit_empedu + rp.rsc_sulit_menahan_bab + rp.rsc_gangguan_menelan) > 1 THEN 'Saluran Cerna' ELSE NULL END,
                    CASE WHEN (rp.rst_reumatik + rp.rst_tbc_tulang) > 1 THEN 'Sendi dan tulang' ELSE NULL END,
                    CASE WHEN (rp.rst_reumatik + rp.rst_tbc_tulang) > 1 THEN 'Sendi dan tulang' ELSE NULL END,
                    CASE WHEN rp.rl_alergi_makanan = 1 THEN 'Alergi Makanan' ELSE NULL END,
                    CASE WHEN rp.rl_alergi_obat = 1 THEN 'Alergi Obat' ELSE NULL END,
                    CASE WHEN rp.rl_malaria = 1 THEN 'Malaria' ELSE NULL END,
                    CASE WHEN rp.rl_gangguan_tidur = 1 THEN 'Gangguan Tidur' ELSE NULL END,
                    CASE WHEN rp.rl_penyakit_jiwa = 1 THEN 'Penyakit jiwa' ELSE NULL END,
                    CASE WHEN rp.rl_kanker = 1 THEN 'Kanker' ELSE NULL END,
                    CASE WHEN rp.rl_gangguan_pendengaran = 1 THEN 'Gangguan Pendengaran' ELSE NULL END,
                    CASE WHEN rp.rl_gangguan_penglihatan = 1 THEN 'Gangguan Pengelihatan' ELSE NULL END,
                    CASE WHEN rp.rl_sulit_konsentrasi = 1 THEN 'Sulit Konsentrasi' ELSE NULL END
                ) AS riwayat_penyakit_saat_ini,
                CONCAT_WS(', ',
                    CASE WHEN rp.rpd_tuberkulosis = 1 THEN 'Tuberkulosis/flek paru' ELSE NULL END,
                    CASE WHEN rp.rpd_sakit_kuning = 1 THEN 'Hepatitis/sakit kuning' ELSE NULL END,
                    CASE WHEN rp.rpd_asma = 1 THEN 'Asma' ELSE NULL END,
                    CASE WHEN rp.rpd_artritis = 1 THEN 'Artritis/Radang sendi' ELSE NULL END,
                    CASE WHEN rp.rpd_serangan_jantung = 1 THEN 'Serangan jantung' ELSE NULL END,
                    CASE WHEN rp.rpd_asam_urat = 1 THEN 'Aertritis gout/Asam urat' ELSE NULL END,
                    CASE WHEN rp.rpd_kateterisasi = 1 THEN 'Operasi By Pass jantung/kateterisasi' ELSE NULL END,
                    CASE WHEN rp.rpd_kelainan_darah = 1 THEN 'Kelainan darah' ELSE NULL END,
                    CASE WHEN rp.rpd_patah_tulang = 1 THEN 'Patah tulang/pasang pen' ELSE NULL END,
                    CASE WHEN rp.rpd_wasir = 1 THEN 'Hemoroid/wasir' ELSE NULL END,
                    CASE WHEN rp.rpd_darting = 1 THEN 'Hipertensi/darah tinggi' ELSE NULL END,
                    CASE WHEN rp.rpd_diabetes_melitus = 1 THEN 'Diabetes melitus/kencing manis saat hamil' ELSE NULL END,
                    CASE WHEN rp.rpd_gondok = 1 THEN 'Penyakit Tiroid/gondok' ELSE NULL END,
                    CASE WHEN rp.rpd_tranfusi_darah = 1 THEN 'Tranfusi darah' ELSE NULL END,
                    CASE WHEN rp.rpd_nyeri_tulang_belakang = 1 THEN 'Nyeri tulang belakang' ELSE NULL END,
                    CASE WHEN rp.rpd_diabetes = 1 THEN 'Diabetes/kencing manis' ELSE NULL END,
                    CASE WHEN rp.rpd_demam_berdarah = 1 THEN 'Demam berdarah' ELSE NULL END,
                    CASE WHEN rp.rpd_stres = 1 THEN 'Gangguan psikologi/stres' ELSE NULL END,
                    CASE WHEN rp.rpd_penyakit_ginjal = 1 THEN 'Penyakit ginjal & saluran kencing' ELSE NULL END,
                    CASE WHEN rp.rpd_nfeksi_menular_seksual = 1 THEN 'Infeksi menular seksual' ELSE NULL END,
                    CASE WHEN rp.rpd_stroke = 1 THEN 'Stroke' ELSE NULL END,
                    CASE WHEN rp.rpd_epilepsi = 1 THEN 'Epilepsi/ayan/kejang' ELSE NULL END,
                    CASE WHEN rp.rpd_vertigo = 1 THEN 'Vertigo/pusing berputar' ELSE NULL END,
                    CASE WHEN rp.rpd_demam_tifoid = 1 THEN 'Demam tifoid' ELSE NULL END,
                    CASE WHEN rp.rpd_infeksi_HIV = 1 THEN 'Infeksi HIV' ELSE NULL END,
                    CASE WHEN rp.rpd_kelainan_jantung_bawaan = 1 THEN 'Kelainan Jantung Bawaan' ELSE NULL END,
                    CASE WHEN rp.rpd_malaria = 1 THEN 'Malaria' ELSE NULL END,
                    CASE WHEN rp.rpd_covid = 1 THEN 'Covid' ELSE NULL END,
                    CASE WHEN rp.rpd_dirawat_rs = 1 THEN 'Di rawat di RS' ELSE NULL END,
                    CASE WHEN rp.rpd_tumor = 1 THEN 'Tumor/Kanker' ELSE NULL END,
                    CASE WHEN rp.rpd_operasi = 1 THEN 'Operasi' ELSE NULL END
                ) AS riwayat_penyakit_dahulu,
                CONCAT_WS(', ',
                    CASE WHEN rp.ri_difteri = 1 THEN 'Difteri' ELSE NULL END,
                    CASE WHEN rp.ri_hepatitis_b = 1 THEN 'Hepatitis B' ELSE NULL END,
                    CASE WHEN rp.ri_hpv = 1 THEN 'Human Papiloma Virus(HPV/Anti Kanker Leher Rahim)' ELSE NULL END,
                    CASE WHEN rp.ri_bcg = 1 THEN 'BCG' ELSE NULL END,
                    CASE WHEN rp.ri_pneumonia = 1 THEN 'Pneumonia' ELSE NULL END,
                    CASE WHEN rp.ri_tetanus = 1 THEN 'Tetanus' ELSE NULL END,
                    CASE WHEN rp.ri_cacar_air = 1 THEN 'Cacar air/Penah Menderita' ELSE NULL END,
                    CASE WHEN rp.ri_mengitis = 1 THEN 'Meningitis' ELSE NULL END,
                    CASE WHEN rp.ri_polio = 1 THEN 'Polio' ELSE NULL END,
                    CASE WHEN rp.ri_rotavirus = 1 THEN 'Rotavirus' ELSE NULL END,
                    CASE WHEN rp.ri_influenza = 1 THEN 'Influenza' ELSE NULL END,
                    CASE WHEN rp.ri_thypoid = 1 THEN 'Thypoid' ELSE NULL END,
                    CASE WHEN rp.ri_mmr = 1 THEN 'MMR(Mump, Measles, Rubela)' ELSE NULL END,
                    CASE WHEN rp.ri_campak = 1 THEN 'Campak' ELSE NULL END,
                    CASE WHEN rp.ri_covid = 1 THEN 'Covid' ELSE NULL END
                ) AS vaksinasi,
                (rp.rss_radang_selaput + rp.rss_lumpuh + rp.rss_polio + rp.rss_ayan + rp.rss_stroke ) AS sum_rss,
                (rp.rj_serangan_jantung + rp.rj_nyeri_dada + rp.rj_rasa_berdebar + rp.rj_rtekanan_darting) AS sum_rj,
                (rp.rp_difteri + rp.rp_sinusitis + rp.rp_bronkitis + rp.rp_batuk_darah + rp.rp_tbc + rp.rp_radang_paru + rp.rp_asma + rp.rp_sesak_nafas) AS sum_rp,
                (rp.rgsk_sulit_bak + rp.rgsk_radang_saluran_kemih + rp.rgsk_penyakit_ginjal + rp.rgsk_kencing_batu + rp.rgsk_sulit_menahan_kemih) AS sum_rgsk,
                (rp.rkk_cacar_air + rp.rkk_jamur_kulit + rp.rkk_penyakit_kelamin + rp.rkk_tbc_kulit + rp.rkk_campak) AS sum_rkk,
                (rp.rsc_tifoid + rp.rsc_muntah_darah + rp.rsc_sulit_bab + rp.rsc_maag + rp.rsc_penyakit_kuning + rp.rsc_penyakit_empedu + rp.rsc_sulit_menahan_bab + rp.rsc_gangguan_menelan) AS sum_rsc,
                (rp.rst_reumatik + rp.rst_tbc_tulang) AS sum_rst,
                (rp.rl_malaria + rp.rl_gangguan_tidur + rp.rl_penyakit_jiwa + rp.rl_kanker + rp.rl_gangguan_pendengaran + rp.rl_gangguan_penglihatan + rp.rl_sulit_konsentrasi) AS sum_rl,
                (rp.rpd_tuberkulosis + rp.rpd_sakit_kuning + rp.rpd_asma + rp.rpd_artritis + rp.rpd_serangan_jantung + rp.rpd_asam_urat + rp.rpd_kateterisasi + rp.rpd_kelainan_darah + rp.rpd_patah_tulang + rp.rpd_wasir + rp.rpd_darting + rp.rpd_diabetes_melitus + rp.rpd_gondok + rp.rpd_tranfusi_darah + rp.rpd_nyeri_tulang_belakang + rp.rpd_diabetes + rp.rpd_demam_berdarah + rp.rpd_stres + rp.rpd_penyakit_ginjal + rp.rpd_nfeksi_menular_seksual + rp.rpd_stroke + rp.rpd_epilepsi + rp.rpd_vertigo + rp.rpd_demam_tifoid + rp.rpd_infeksi_HIV + rp.rpd_kelainan_jantung_bawaan + rp.rpd_malaria + rp.rpd_covid + rp.rpd_dirawat_rs + rp.rpd_tumor + rp.rpd_operasi) AS sum_rpd,
                (rp.rpk_hipertensi + rp.rpk_tumor + rp.rpk_asma + rp.rpk_hemoroid + rp.rpk_alergi + rp.rpk_tb + rp.rpk_stroke + rp.rpk_diabetes + rp.rpk_gangguan_jiwa + rp.rpk_sakit_kuning + rp.rpk_kelainan_darah + rp.rpk_penyakit_jantung + rp.rpk_riwayat_lainnya) AS sum_rpk,
                (rp.ri_difteri + rp.ri_hepatitis_b + rp.ri_hpv + rp.ri_bcg + rp.ri_pneumonia + rp.ri_tetanus + rp.ri_cacar_air + rp.ri_mengitis + rp.ri_polio + rp.ri_rotavirus + rp.ri_influenza + rp.ri_thypoid + rp.ri_mmr + rp.ri_campak + rp.ri_covid) AS sum_ri
                
                FROM sm_master_identitas_mcu as mcu
                JOIN sm_riwayat_penyakit_mcu as rp on rp.id_master_identitas = mcu.id
                JOIN sm_gaya_hidup_mcu as gh on gh.id_master_identitas = mcu.id
                JOIN sm_resiko_kerja_mcu as rk on rk.id_master_identitas = mcu.id
                JOIN sm_srq29_mcu as srq on srq.id_master_identitas = mcu.id
                JOIN sm_sds_mcu as sds on sds.id_master_identitas = mcu.id

                WHERE mcu.nik = '$getData->nik' 
                AND mcu.tanggal_kedatangan_mcu = '$getData->tanggal_layanan'
                ";

        $query = $this->db->query($sql)->row();

        return $query;
    }
}

/* End of file Pendaftaran_poliklinik_model.php */