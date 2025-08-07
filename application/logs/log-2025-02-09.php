<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2025-02-09 00:06:17 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-02-09 00:06:23 --> 404 Page Not Found --> /index
ERROR - 2025-02-09 00:18:37 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...erian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES (784584, '1', '', '', ''...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 00:18:37 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...erian_5", "jam_pemberian_6") VALUES (784584, '1', '', '', ''...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (784584, '1', '', '', '', '', 'PC', '0', '', '0', 'MORN', NULL, '0', 1, 'sesuai GDS', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-02-09 00:19:02 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 00:19:02 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-09 00:19:10 --> 404 Page Not Found --> /index
ERROR - 2025-02-09 01:09:58 --> 404 Page Not Found --> /index
ERROR - 2025-02-09 01:18:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xbb /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 01:18:09 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xbb - Invalid query: INSERT INTO "sm_formulir_observasi_igd" ("id_pendaftaran", "id_layanan_pendaftaran", "id_user", "tanggal_1_fodti", "tanggal_2_fodti", "jam_1_fodti", "bismilah_fodti", "td_s_fodti", "td_d_fodti", "nadi_fodti", "rr_fodti", "suhu_fodti", "sat_o2_fodti", "kategori_fodti", "skala_fodti", "resiko_fodti", "kesadaran_fodti", "gcs_e_fodti", "gcs_m_fodti", "gcs_v_fodti", "total_gcs_fodti", "pupil_kanan_fodti", "pupil_kiri_fodti", "pemeriksaan_fodti", "jam_2_fodti", "implementasi_fodti", "alhamdulilah_fodti", "ttd_fodti", "perawat_fodti", "created_at") VALUES ('635035', '688148', '981', '2025-02-09', '2025-02-09', '1:15', '1', '77', '54', '80', '20', '36.2', '100', 'Kuning', '-', 'TINGGI', 'CM', '4', '6', '5', '15', '2/+', '2/+', '-', '1:30', 'Mengobservasi ku dan ttb 
memasang vaskon 2 dalam 50 ml nacl 0.9 »39 kg = 4,38 ', '1', '1', '225', '2025-02-09 01:14:47')
ERROR - 2025-02-09 01:27:27 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type timestamp: &quot;2025-02-09 06.00&quot;
LINE 1: ...ria_lain&quot;:&quot;&quot;}}', '207', '67', '2025-02-09 01:20', '2025-02-0...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 01:27:27 --> Query error: ERROR:  invalid input syntax for type timestamp: "2025-02-09 06.00"
LINE 1: ...ria_lain":""}}', '207', '67', '2025-02-09 01:20', '2025-02-0...
                                                             ^ - Invalid query: INSERT INTO "sm_kajian_keperawatan_ranap" ("id_layanan_pendaftaran", "waktu_pengkajian", "cara_tiba_diruangan", "informasi_dari", "keluhan_utama", "timbul_keluhan", "lama_keluhan", "faktor_pencetus", "sifat_keluhan", "rps", "rpd", "rpk", "pernah_dirawat", "kebiasaan", "riwayat_operasi", "obat_dari_luar", "alergi", "alergi_obat", "alergi_obat_reaksi", "alergi_makanan", "alergi_makanan_reaksi", "keadaan_hamil", "sedang_menyusui", "riwayat_kelahiran", "kesadaran", "tensi_sistolik_awal", "tensi_diastolik_awal", "nadi_awal", "suhu_awal", "nafas_awal", "tinggi_badan", "berat_badan", "suara_nafas", "pola_nafas", "jenis_pernafasan", "otot_bantu_nafas", "irama_nafas", "batuk_sekresi", "ket_batuk_sekresi", "warna_kulit", "nyeri_dada", "ket_nyeri_dada", "denyut_nadi", "sirkulasi", "pulsasi", "mulut", "gigi", "lidah", "tenggorokan", "abdomen", "nafsu_makan", "mual", "muntah", "kesulitan_menelan", "eleminasi_bab", "eleminasi_bak", "tulang", "sendi", "integumen_warna", "integumen_turgor", "integumen_kulit", "penglihatan", "penciuman", "pendengaran", "pengecap", "persyarafan", "reproduksi_alat", "reproduksi_payudara", "ket_reproduksi_payudara", "status_psikologis", "status_mental", "status_keluarga", "ket_status_keluarga", "tempat_tinggal", "ket_tempat_tinggal", "status_hubungan_pasien", "keyakinan", "ket_keyakinan", "nilai_kepercayaan", "ket_nilai_kepercayaan", "kebiasaan_keagamaan", "wajib_ibadah", "ket_wajib_ibadah_halangan", "thaharoh", "sholat", "nilai_budaya", "ket_nilai_budaya", "budaya_pola_aktivitas", "pola_komunikasi", "ket_pola_komunikasi", "pola_makan", "makanan_pokok", "ket_makanan_pokok", "pantang_makanan", "ket_pantang_makanan", "konsumsi_makanan_luar", "ket_konsumsi_makanan_luar", "kepercayaan_penyakit", "ket_kepercayaan_penyakit", "kewarganegaraan", "suku_bangsa", "bicara", "ket_bicara", "perlu_penterjemah", "perlu_penterjemah_bahasa", "bahasa_isyarat", "pemahaman_penyakit", "pemahaman_pengobatan", "pemahaman_nutrisi_diet", "pemahaman_spiritual", "pemahaman_peralatan_medis", "pemahaman_rehab_medik", "pemahaman_manajemen_nyeri", "hambatan_menerima_edukasi", "sn_penurunan_bb", "sn_penurunan_bb_on", "sn_asupan_makan", "sn_total", "nilai_fungsi_makan", "nilai_fungsi_mandi", "nilai_fungsi_personal", "nilai_fungsi_berpakaian", "nilai_fungsi_bab", "nilai_fungsi_bak", "nilai_fungsi_berpindah", "nilai_fungsi_toiletting", "nilai_fungsi_mobilisasi", "nilai_fungsi_naik_turun_tangga", "nilai_fungsi_total", "nilai_tingkat_nyeri", "nyeri_hilang", "prjd_riwayat_jatuh", "prjd_diagnosis_sekunder", "prjd_alat_bantu_jalan_1", "prjd_alat_bantu_jalan_2", "prjd_alat_bantu_jalan_3", "prjd_terpasang_infus", "prjd_cara_berjalan_1", "prjd_cara_berjalan_2", "prjd_cara_berjalan_3", "prjd_status_mental_1", "prjd_status_mental_2", "prjd_nilai_total", "prjl_riwayat_jatuh", "prjl_riwayat_jatuh_opt", "prjl_status_mental", "prjl_status_mental_opt_1", "prjl_status_mental_opt_2", "prjl_penglihatan", "prjl_penglihatan_opt_1", "prjl_penglihatan_opt_2", "prjl_berkemih", "prjl_transfer", "prjl_mobilitas", "prjl_nilai_total", "skrining_pasien_akhir_kehidupan", "pk_geriatri", "pk_penyakit_menular", "pk_penurunan_daya_tahan", "pk_kesehatan_jiwa", "pk_pasien_kekerasan", "pk_pasien_ketergantungan", "sew_laju_respirasi", "sew_saturasi", "sew_suplemen", "sew_temperatur", "sew_tds", "sew_laju_jantung", "sew_kesadaran", "suhunewst", "sew_total", "masalah_keperawatan", "perencanaan_pulang", "id_perawat", "id_verifikasi_dokter_dpjp", "waktu_ttd_perawat", "waktu_ttd_verifikasi_dokter_dpjp", "ttd_perawat", "ttd_verifikasi_dokter_dpjp", "created_date") VALUES ('688163', '2025-02-09 01:20', 'Brankar', '{"pasien":"1","keluarga":"1","lain":"","ket_lain":""}', 'nyeri perut', '2 minggu sebelum masuk RS', 'menetap dan bertambah berat', '{"infeksi":"","lain":"1","ket_lain":"colik abdomen susp Tumor intra abdomen "}', 'Akut', 'pasien mengeluh nyeri pada area perut bagian kuadran kanan menjalar ke bagian tengah perut dan pinggang. keluhan nyeri dirasakan seperti tertekan dan dirasakan memberat jika posisi perut tertekan., saat ini area prut tteraba keras., kencang dan begah. keluhan sudah dirasakan sejak 2 minggu dan memberat 1 hari ini., pasien mengeatakan masih bisa kentut namun sulit BAB', '{"asma":"","hipertensi":"","jantung":"","diabetes":"","hepatitis":"","lain":"1","ket_lain":"tidak ada masalah."}', '{"asma":"","hipertensi":"","jantung":"","diabetes":"","hepatitis":"","lain":"1","ket_lain":"tidak ada masalah."}', '{"dirawat":"0","kapan":"","dimana":""}', '{"merokok":"0","ket_merokok":"","alkohol":"0","ket_alkohol":"","narkoba":"0","olahraga":"0"}', '{"operasi":"0","kapan":"","dimana":""}', '0', '0', 'tidak ada masalah.', 'tidak ada masalah.', 'tidak ada masalah.', 'tidak ada masalah.', '0', '0', 'Spontan', '{"composmentis":"1","apatis":"","samnolen":"","sopor":"","koma":"","gcs_e":"4","gcs_m":"6","gcs_v":"5"}', '130', '78', '72', '36.4', '20', '168', '60', '{"vesikuler":"1","wheezing":"","ronchi":"","dispnoe":"","stridor":""}', '{"normal":"1","bradipnea":"","tachipnea":""}', '{"dada":"1","perut":"","cuping_hidung":""}', '0', '1', '0', '{"produktif":"","non_produktif":"","hemaptoe":"","lain":"1","ket_lain":"tidak ada masalah."}', '{"normal":"1","kemerahan":"","sianosis":"","pucat":"","lain":"","ket_lain":""}', '0', '', '1', '{"akral_hangat":"1","akral_dingin":"","rasa_bebas":"","palpitasi":"","edema":"","ket_edema":""}', '{"kuat":"1","lemah":"","lain":"1","ket_lain":"tidak ada masalah."}', '{"tidak_ada_kelainan":"1","simetris":"","asimetris":"","mukosa":"","bibir_pucat":"","lain":"","ket_lain":""}', '{"tidak_ada_kelainan":"1","caries":"","goyang":"","palsu":"","lain":"","ket_lain":""}', '{"tidak_ada_kelainan":"1","kotor":"","gerakan_asimetris":"","lain":"","ket_lain":""}', '{"gangguan_menelan":"","sakit_menelan":"","lain":"1","ket_lain":"tidak ada masalah."}', '{"asites":"","tegang":"1","supel":"","lain":"1","ket_lain":"teraba keras pada area kuadran kanan perut curiga massa intra abdomen "}', 'Turun', '1', '0', '0', '{"normal":"","konstipasi":"1","melena":"","inkontinensia_alvi":"","colostomy":"","diare":"","ket_diare":""}', '{"normal":"1","hematuri":"","nokturia":"","inkontinensia_uri":"","urostomi":"","urin_menetes":"","kateter_warna":"","ket_kateter_warna":"","kandung_kemih":"","lain":"1","ket_lain":"suli BAB terakhir BAB 2 hari lalu sedikit sedikit"}', '{"fraktur_terbuka":"","fraktur_terbuka_lokasi":"","fraktur_tertutup":"","fraktur_tertutup_lokasi":"","amputasi":"","tumor_tulang":"","nyeri_tulang":""}', '{"dislokasi":"","infeksi":"","nyeri":"","oedema":"","lain":"1","ket_lain":"tidak ada masalah."}', '{"pucat":"","sianosis":"","normal":"1","lain":"1","ket_lain":"tidak ada masalah."}', '{"baik":"1","sedang":"","buruk":""}', '{"normal":"1","kemerahan":"","lesi":"","luka":"","memar":"","petechie":"","bulae":"","lain":"1","ket_lain":"tidak ada masalah."}', '{"baik":"1","buram":"","tidak_bisa_melihat":"","pakai_alat_bantu":"","hypema":""}', '{"sekresi":"1","polip":"","gangguan":""}', '{"kurang_jelas":"","baik":"1","tidak_bisa_dengar":"","pakai_alat_bantu":"","nyeri_telinga":""}', '{"tidak_ada_kelainan":"1","gangguan_fungsi":"","lain":"1","ket_lain":"tidak ada masalah."}', '{"kesemutan":"","kelumpuhan":"","kelumpuhan_lokasi":"","kejang":"","pusing":"","muntah":"","kaku_kuduk":"","hemiparese":"","alasia":"","tremor":"","lain":"1","ket_lain":"tidak ada masalah."}', 'Hygiene', 'Lain', 'tidak ada masalah.', '{"cemas":"1","takut":"","marah":"","sedih":"","bunuh_diri":"","lain":"","ket_lain":""}', '{"sadar":"1","ada_masalah":"","ket_ada_masalah":"","perilaku_kekerasan":""}', 'Serumah', '', 'Serumah', '', '1', '1', 'islam ', '1', 'berdoa dan ibadah ', 'berdoa dan ibadah ', 'Baligh', '', 'Berwudhu', 'Berdiri', 'Ujian', '', 'sulit untuk aktivitas selama sakit', 'Normal', '', 'Sehat', 'Nasi', '', '0', '', '0', '', '0', '', 'WNI', 'Jawa /Indonesia ', 'Normal', '', '0', '', '0', '1', '1', '1', '1', '1', '0', '1', '{"hambatan_1":"1","hambatan_2":"","hambatan_3":"","hambatan_4":"","hambatan_5":"","hambatan_6":"","hambatan_7":"","hambatan_8":"","hambatan_9":"","hambatan_10":""}', '1', NULL, '1', '1', '10', '5', '5', '10', '10', '10', '10', '10', '15', '10', '95', 'Sedang', '{"minum_obat":"1","mendengarkan_musik":"1","istirahat":"1","berubah_posisi":"1","lain":"1","ket_lain":"relaksasi "}', '0', '0', NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, '0', '0', '0', '0', '0', '14', '0', '0', '0', '0', '2', '2', '18', '{"kriteria_1":"0","kriteria_2":"0","kriteria_3":"0","kriteria_4":"0","kriteria_5":"0"}', '{"gangguan_penglihatan":"0","ket_gangguan_penglihatan":"","gangguan_pendengaran":"0","ket_gangguan_pendengaran":"","gangguan_berkemih":"0","ket_gangguan_berkemih":{"inkontinensia":"","disuria":"","oliguria":"","anuria":""},"gangguan_daya_ingat":"0","ket_gangguan_daya_ingat":"","gangguan_bicara":"0","ket_gangguan_bicara":""}', '{"penyakit_saat_ini":"0","informasi_dari":{"dokter":"","perawat":"","keluarga":"","lain":"","ket_lain":""},"informasi_jangka_waktu":"0","ket_informasi_jangka_waktu":"","pemeriksaan_rutin":"0","ket_pemeriksaan_rutin":"","cara_penularan":{"airbone":"","droplet":"","kontak_langsung":"","cairan_tubuh":""},"penyakit_penyerta":"0","ket_penyakit_penyerta":""}', '{"penyakit_saat_ini":"0","informasi_dari":{"dokter":"","perawat":"","keluarga":"","lain":"","ket_lain":""},"informasi_jangka_waktu":"0","ket_informasi_jangka_waktu":"","pemeriksaan_rutin":"0","ket_pemeriksaan_rutin":"","penyakit_penyerta":"0","ket_penyakit_penyerta":""}', '{"ket_1":"0","ket_2":"0","ket_3":"0","ket_4":"1","ket_5":"1","ket_6":"1","ket_7":"0","ket_8":"0","ket_9":"1"}', '{"ket_1":"0","ket_2":"berdoa dan ibadah ","ket_3":"berdoa dan ibadah ","ket_4":"berdoa dan ibadah ","ket_5":"berdoa dan ibadah ","ket_6":"0"}', '{"obat":"0","ket_obat":"","lama_ketergantungan":""}', '0_3', '0_4', '0_4', '0_2', '0_4', '0_3', '0_1', '0_3', 'Putih', '{"ket_1":"","ket_2":"","ket_3":"","ket_4":"","ket_5":"","ket_6":"","ket_7":"","ket_8":"","ket_9":"","ket_10":"","ket_11":"","ket_12":"","ket_13":"","ket_14":"1","ket_15":"","ket_16":"","ket_17":"","ket_18":"","ket_19":"","ket_20":"","ket_21":"","ket_22":"","ket_23":"","ket_24":"","ket_25":"","ket_26":"","ket_27":"","ket_28":"","ket_29":"","ket_30":"","ket_lain":"","ket_31":"","ket_32":"","ket_33":"","ket_34":""}', '{"planning_1":"1","planning_2":"0","planning_3":"1","planning_4":"1","kriteria":{"kriteria_1":"1","kriteria_2":"","kriteria_3":"","kriteria_4":"1","kriteria_5":"","kriteria_6":"1","kriteria_7":"1","kriteria_8":"","kriteria_9":"","kriteria_lain":""}}', '207', '67', '2025-02-09 01:20', '2025-02-09 06.00', '1', '1', '2025-02-09 01:27:27')
ERROR - 2025-02-09 02:13:52 --> 404 Page Not Found --> /index
ERROR - 2025-02-09 02:27:41 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 02:27:41 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-09 02:45:17 --> 404 Page Not Found --> /index
ERROR - 2025-02-09 02:51:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 02:51:57 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-09 02:52:23 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 02:52:23 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-09 02:54:25 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 02:54:25 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-09 02:54:33 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 02:54:33 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-09 02:54:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 02:54:46 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-09 03:04:16 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 03:04:16 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-09 03:25:00 --> 404 Page Not Found --> /index
ERROR - 2025-02-09 04:07:45 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/views/js.php 1507
ERROR - 2025-02-09 04:13:30 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 04:13:30 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-02-09 04:13:30 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 04:13:30 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-02-09 04:13:50 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 04:13:50 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-02-09 04:13:50 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 04:13:50 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-02-09 04:34:45 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-02-09 04:34:48 --> 404 Page Not Found --> /index
ERROR - 2025-02-09 04:46:50 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 04:46:50 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-09 04:50:14 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 04:50:14 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-09 05:38:01 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 05:38:01 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-09 05:41:26 --> 404 Page Not Found --> /index
ERROR - 2025-02-09 05:45:13 --> 404 Page Not Found --> /index
ERROR - 2025-02-09 06:00:31 --> 404 Page Not Found --> /index
ERROR - 2025-02-09 06:24:00 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-02-09 06:26:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 06:26:36 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-09 06:36:37 --> 404 Page Not Found --> /index
ERROR - 2025-02-09 06:37:19 --> Severity: Notice  --> Trying to get property 'id_pendaftaran' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/salinan_resep/models/Salinan_resep_model.php 704
ERROR - 2025-02-09 06:42:01 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 06:42:01 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-09 06:43:16 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 06:43:16 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-09 06:43:19 --> 404 Page Not Found --> /index
ERROR - 2025-02-09 06:43:27 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 06:43:27 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-09 06:44:57 --> Severity: Notice  --> Undefined variable: spes /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 200
ERROR - 2025-02-09 06:45:00 --> Severity: Notice  --> Undefined variable: spes /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 200
ERROR - 2025-02-09 06:45:01 --> Severity: Notice  --> Undefined variable: spes /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 200
ERROR - 2025-02-09 06:45:01 --> Severity: Notice  --> Undefined variable: spes /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 200
ERROR - 2025-02-09 06:45:01 --> Severity: Notice  --> Undefined variable: spes /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 200
ERROR - 2025-02-09 06:49:34 --> Severity: Notice  --> Undefined variable: spes /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 200
ERROR - 2025-02-09 06:49:36 --> Severity: Notice  --> Undefined variable: spes /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 200
ERROR - 2025-02-09 06:49:36 --> Severity: Notice  --> Undefined variable: spes /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 200
ERROR - 2025-02-09 06:49:36 --> Severity: Notice  --> Undefined variable: spes /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 200
ERROR - 2025-02-09 06:49:36 --> Severity: Notice  --> Undefined variable: spes /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 200
ERROR - 2025-02-09 06:50:10 --> Severity: Notice  --> Undefined variable: spes /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 200
ERROR - 2025-02-09 06:50:11 --> Severity: Notice  --> Undefined variable: spes /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 200
ERROR - 2025-02-09 06:50:11 --> Severity: Notice  --> Undefined variable: spes /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 200
ERROR - 2025-02-09 06:50:11 --> Severity: Notice  --> Undefined variable: spes /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 200
ERROR - 2025-02-09 06:50:15 --> Severity: Notice  --> Undefined variable: spes /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 200
ERROR - 2025-02-09 06:50:15 --> Severity: Notice  --> Undefined variable: spes /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 200
ERROR - 2025-02-09 06:50:15 --> Severity: Notice  --> Undefined variable: spes /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 200
ERROR - 2025-02-09 06:50:16 --> Severity: Notice  --> Undefined variable: spes /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 200
ERROR - 2025-02-09 06:50:16 --> Severity: Notice  --> Undefined variable: spes /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 200
ERROR - 2025-02-09 06:50:17 --> Severity: Notice  --> Undefined variable: spes /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 200
ERROR - 2025-02-09 06:50:17 --> Severity: Notice  --> Undefined variable: spes /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 200
ERROR - 2025-02-09 07:02:14 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 07:02:14 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-09 07:02:20 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 07:02:20 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-09 07:02:28 --> Severity: Notice  --> Undefined variable: spes /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/api/Vclaim_bpjs_v2.php 200
ERROR - 2025-02-09 07:02:34 --> 404 Page Not Found --> /index
ERROR - 2025-02-09 07:02:38 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 07:02:38 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-09 07:04:47 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 07:04:47 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-09 07:08:11 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 14: ...s_layanan = 'Intensive Care'  and ri.id_bangsal = 'null'  AN...
                                                              ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 07:08:11 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 14: ...s_layanan = 'Intensive Care'  and ri.id_bangsal = 'null'  AN...
                                                              ^ - Invalid query: select lp.*, ri.id as id_intensive_care, ri.waktu_masuk, 
					ri.waktu_keluar, pd.id_pasien, pd.no_register, 
					p.nama, p.tanggal_lahir, pd.tanggal_daftar, p.telp,
					COALESCE(sp.nama, '') as layanan,
					COALESCE(pg.nama, '') as dokter, 
					(select bg.id from sm_bangsal as bg where bg.id = ri.id_bangsal) as id_bangsal,
					(select bg.nama from sm_bangsal as bg where bg.id = ri.id_bangsal) as bangsal,
					k.nama as kelas, ri.no_ruang, ri.no_bed, ri.checkout, ri.konfirmasi_icare, 
					ri.waktu_konfirmasi_icare, pj.nama as cara_bayar,
					odri.id_dokter_dpjp, pgdpjp.nama as dokter_dpjp,
					COALESCE(tr.account, '') as user_sep, 
					COALESCE((select case when va.visited_at is not null then '1' else '0' end from sm_visit_anestesi va where va.id_layanan_pendaftaran = lp.id and va.id_pegawai = '1682' LIMIT 1 ), '0') as visit_anestesi  from sm_layanan_pendaftaran as lp 
				join sm_intensive_care as ri on (ri.id_layanan_pendaftaran = lp.id) 
				join sm_kelas as k on (k.id = ri.id_kelas) join sm_pendaftaran as pd on (pd.id = lp.id_pendaftaran) join sm_pasien as p on (p.id = pd.id_pasien) left join sm_penjamin as pj on (pj.id = lp.id_penjamin) left join sm_spesialisasi as sp on (sp.id = lp.id_unit_layanan) left join sm_tenaga_medis as tm on (tm.id = lp.id_dokter) left join sm_pegawai as pg on (pg.id = tm.id_pegawai) left join sm_translucent as tr on (tr.id = lp.id_users_sep) left join sm_order_intensive_care as odri on (odri.id_intensive_care = ri.id) left join sm_tenaga_medis as tmdpjp on (tmdpjp.id = odri.id_dokter_dpjp) left join sm_pegawai as pgdpjp on (pgdpjp.id = tmdpjp.id_pegawai)  where lp.jenis_layanan = 'Intensive Care'  and ri.id_bangsal = 'null'  AND lp.tindak_lanjut is null order by ri.id desc  limit 10 offset 0
ERROR - 2025-02-09 07:10:22 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/views/js.php 1507
ERROR - 2025-02-09 07:11:36 --> 404 Page Not Found --> /index
ERROR - 2025-02-09 07:13:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 07:13:15 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-09 07:13:21 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 07:13:21 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-09 07:15:36 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/intensive_care/views/js.php 1119
ERROR - 2025-02-09 07:25:08 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 07:25:08 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-09 07:26:00 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 07:26:00 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-09 07:26:11 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 07:26:11 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-09 07:26:16 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 07:26:16 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-09 07:27:20 --> 404 Page Not Found --> /index
ERROR - 2025-02-09 07:30:23 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-02-09 07:44:58 --> 404 Page Not Found --> /index
ERROR - 2025-02-09 07:44:58 --> 404 Page Not Found --> /index
ERROR - 2025-02-09 07:45:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 07:45:12 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-09 07:49:34 --> 404 Page Not Found --> /index
ERROR - 2025-02-09 08:01:52 --> 404 Page Not Found --> /index
ERROR - 2025-02-09 08:02:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xde 0x6e /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 08:02:57 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xde 0x6e - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('687477', '2025-02-09 07:30', '8', '', '', '', '', '', '', '', '', 'Pasien tampak sesak (+), lemas (+), batuk (+), demam (+) naik turun, nafsu makan menurun, sulit makan
', 'TSS, Kes. Cm 
N: 115 x/m. 
P: 25x/m 
S: 36.8*C. 
Sp O2: 99Þngan NK 2lpm

Mukosa mulut kering (+)
Thorax : retraksi (+)
Pulmo : vbs +/+, rh +/+, wh -/-', 'Lower Respiratory Infection + BB kurang, perawakan pendek, gizi normal, + Stunting', 'lapor dr. Siti Nila, Sp. A', '2021', '1', '<div>sudah lapor dan konfirmasi ulang dr. Siti Nila, Sp. A, advis :</div>', NULL, '2021', '1', NULL, '2025-02-09 08:02:57')
ERROR - 2025-02-09 08:08:44 --> 404 Page Not Found --> /index
ERROR - 2025-02-09 08:11:26 --> 404 Page Not Found --> /index
ERROR - 2025-02-09 08:20:29 --> 404 Page Not Found --> /index
ERROR - 2025-02-09 08:22:46 --> 404 Page Not Found --> /index
ERROR - 2025-02-09 08:25:39 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...&quot;) VALUES (5532330, '212', 862.8, '1', '1.00', NULL, 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 08:25:39 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...") VALUES (5532330, '212', 862.8, '1', '1.00', NULL, 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (5532330, '212', 862.8, '1', '1.00', NULL, 'null')
ERROR - 2025-02-09 08:25:58 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type date: &quot;&quot;
LINE 1: ...osa&quot;, &quot;ruang&quot;) VALUES ('687477', '634396', '978', '', 'REVAR...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 08:25:58 --> Query error: ERROR:  invalid input syntax for type date: ""
LINE 1: ...osa", "ruang") VALUES ('687477', '634396', '978', '', 'REVAR...
                                                             ^ - Invalid query: INSERT INTO "sm_indikasi_pasien_icu_tambahan" ("id_layanan_pendaftaran", "id_pendaftaran", "id_user", "tanggal_ipi", "nama_pasien", "diagnosa", "ruang") VALUES ('687477', '634396', '978', '', 'REVARAZ UMAR ZULRAHEN', 'Bronkopneumonia (Utama).<br>asma exaserbasi akut.<br>BB kurang , perawakan pendek , gizi normal+ stunting.', 'Eboni')
ERROR - 2025-02-09 08:26:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type date: &quot;&quot;
LINE 1: ...osa&quot;, &quot;ruang&quot;) VALUES ('687477', '634396', '978', '', 'REVAR...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 08:26:15 --> Query error: ERROR:  invalid input syntax for type date: ""
LINE 1: ...osa", "ruang") VALUES ('687477', '634396', '978', '', 'REVAR...
                                                             ^ - Invalid query: INSERT INTO "sm_indikasi_pasien_icu_tambahan" ("id_layanan_pendaftaran", "id_pendaftaran", "id_user", "tanggal_ipi", "nama_pasien", "diagnosa", "ruang") VALUES ('687477', '634396', '978', '', 'REVARAZ UMAR ZULRAHEN', 'Bronkopneumonia (Utama).<br>asma exaserbasi akut.<br>BB kurang , perawakan pendek , gizi normal+ stunting.', 'Eboni')
ERROR - 2025-02-09 08:27:08 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-02-09 08:27:17 --> Severity: Notice  --> Undefined variable: indikasi_pasien_masuk_icu /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/views/printing/cetak_indikasi_pasien_masuk_icu.php 52
ERROR - 2025-02-09 08:27:17 --> Severity: Notice  --> Trying to get property 'diagnosa_pasien' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/views/printing/cetak_indikasi_pasien_masuk_icu.php 52
ERROR - 2025-02-09 08:28:11 --> 404 Page Not Found --> /index
ERROR - 2025-02-09 08:31:38 --> 404 Page Not Found --> /index
ERROR - 2025-02-09 08:34:10 --> 404 Page Not Found --> /index
ERROR - 2025-02-09 08:54:17 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 08:54:17 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-09 09:00:52 --> 404 Page Not Found --> /index
ERROR - 2025-02-09 09:00:55 --> 404 Page Not Found --> /index
ERROR - 2025-02-09 09:07:41 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-02-09 09:15:21 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 09:15:21 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-09 09:16:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 09:16:09 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-09 09:18:08 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 09:18:08 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-09 09:18:27 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xab /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 09:18:27 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xab - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('687489', '2025-02-09 08:34', '8', '', '', '', '', '', '', '', '', ' diare 3x disertai mual', 'TSS, Kes. CM 
TD: 112/83
N: 80x/menit 
P: 20x/menit 
S: 36.5 C 
Spo2: 100«domen : datar, soepel, BU(+)
Ekstremitas : akral hangat, CRT &lt;2dtk.   ', 'GEA ht stage II dm tipe II dyspepsia', 'lapor dr ryan sppd ', '738', '1', '<p>sudah lapor dan konfirmasi dr ryan sppdÂ </p><p>advice :Â </p>', NULL, '738', '1', NULL, '2025-02-09 09:18:27')
ERROR - 2025-02-09 09:18:34 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xab /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 09:18:34 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xab - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('687489', '2025-02-09 08:34', '8', '', '', '', '', '', '', '', '', ' diare 3x disertai mual', 'TSS, Kes. CM 
TD: 112/83
N: 80x/menit 
P: 20x/menit 
S: 36.5 C 
Spo2: 100«domen : datar, soepel, BU(+)
Ekstremitas : akral hangat, CRT &lt;2dtk.   ', 'GEA ht stage II dm tipe II dyspepsia', 'lapor dr ryan sppd ', '738', '1', '<p>sudah lapor dan konfirmasi dr ryan sppdÂ </p><p>advice :Â </p>', NULL, '738', '1', NULL, '2025-02-09 09:18:34')
ERROR - 2025-02-09 09:21:01 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 09:21:01 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-09 09:21:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 09:21:10 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-09 09:21:18 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 09:21:18 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-09 09:22:08 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 09:22:08 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-09 09:22:14 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xab /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 09:22:14 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xab - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('685014', '2025-02-09 08:34', '8', '', '', '', '', '', '', '', '', 'mual berkurang', 'TSS, Kes. CM 
TD: 119/75
N: 77x/menit 
P: 20x/menit 
S: 36.5 C 
Spo2: 98«domen : datar, soepel, BU(+)
Ekstremitas : akral hangat, CRT &lt;2dtk.   ', 'isk -sbsk, ackd hhd, pvc
', 'lapor dr rai kosa sppd ', '738', '1', '<p>sudah lapor dan konfirmasi dr rai kosa sppdÂ </p><p>advice :Â </p>', NULL, '738', '1', NULL, '2025-02-09 09:22:14')
ERROR - 2025-02-09 09:22:23 --> 404 Page Not Found --> /index
ERROR - 2025-02-09 09:27:51 --> 404 Page Not Found --> /index
ERROR - 2025-02-09 09:31:13 --> 404 Page Not Found --> /index
ERROR - 2025-02-09 09:37:09 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-02-09 09:37:09 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-02-09 09:37:18 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-02-09 09:37:18 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-02-09 09:37:22 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-02-09 09:42:26 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type timestamp: &quot;2025-02-09 :29&quot;
LINE 1: ...elp&quot;, &quot;konsul&quot;, &quot;created_date&quot;) VALUES ('687494', '2025-02-0...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 09:42:26 --> Query error: ERROR:  invalid input syntax for type timestamp: "2025-02-09 :29"
LINE 1: ...elp", "konsul", "created_date") VALUES ('687494', '2025-02-0...
                                                             ^ - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('687494', '2025-02-09 :29', '15', 'Ibu mengatakan nyeri luka heacting perineum hilang timbul, nyeri bertambah saat mobilisasi dan nyeri berkurang bila diberikan pereda nyeri.', 'Kesadaran: composmentis, GCS :15, EWS 0 (putih) Ibu tampak meringis kesakitan saat beraktivitas, skala nyeri 2/10. TFU 2 jari bawah pusat, kontraksi baik, perdarahan pervaginam 30cc tidak aktif,  bak spontan (+), VT (+), mobilisasi (+) . TD: 122/74 mmHg, N: 82 x/mnt, S: 36,6 C RR: 20x/mnt, SPO2 99 room air, Tanggal 07/02/2024 Hb 10.0, leukosit 17.0 Trombosit 258.000. Tanggal 07/02/2024 partus pervaginam, bayi rawat pinus.', 'P1A0 Post partum pervaginam heacting grade 2 ec preterm, KPD dengan nyeri melahirkan teratasi', 'Intervensi di hentikan
Anjurkan diit tktp
Anjurkan mobilisasi
anjurkan personal hygiene
Anjurkan istirahat yang cukup
Anjurkan kontrol sesuai jadwal yang di tentukan
Anjurkan pemberian asi eksklusif', '', '', '', '', '', '', '', '', '2052', '1', '<div>BLPL Kontrol puskesmas  tanggal 17/02/2025</div><div><br></div><div></div><div></div><div></div><div></div><div></div>', NULL, '2052', 0, NULL, '2025-02-09 09:42:25')
ERROR - 2025-02-09 09:44:55 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type date: &quot;&quot;
LINE 1: ..._steril_bks&quot; = '2025-02-09', &quot;tgl_steril_bks_0&quot; = '', &quot;tgl_s...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 09:44:55 --> Query error: ERROR:  invalid input syntax for type date: ""
LINE 1: ..._steril_bks" = '2025-02-09', "tgl_steril_bks_0" = '', "tgl_s...
                                                             ^ - Invalid query: UPDATE "sm_bukti_kondisi_sterilisasi" SET "id" = '2492', "tgl_operasi_bks" = '2025-02-09', "tanggal_steril_bks" = '2025-02-09', "tgl_steril_bks_0" = '', "tgl_steril_bks_1" = NULL, "tgl_steril_bks_2" = NULL, "tgl_steril_bks_3" = NULL, "tgl_steril_bks_4" = NULL, "tgl_steril_bks_5" = NULL, "tgl_steril_bks_6" = NULL, "tgl_steril_bks_7" = NULL, "tgl_steril_bks_8" = NULL, "tgl_steril_bks_9" = NULL, "tgl_steril_bks_10" = NULL, "tgl_steril_bks_11" = NULL, "tgl_steril_bks_12" = NULL, "tgl_steril_bks_13" = NULL, "tgl_steril_bks_14" = NULL, "alat_item_bks_0" = NULL, "alat_item_bks_1" = NULL, "alat_item_bks_2" = NULL, "alat_item_bks_3" = NULL, "alat_item_bks_4" = NULL, "alat_item_bks_5" = NULL, "alat_item_bks_6" = NULL, "alat_item_bks_7" = NULL, "alat_item_bks_8" = NULL, "alat_item_bks_9" = NULL, "alat_item_bks_10" = NULL, "alat_item_bks_11" = NULL, "alat_item_bks_12" = NULL, "alat_item_bks_13" = NULL, "alat_item_bks_14" = NULL, "dokter_bks_1" = '675', "dokter_bks_2" = '113', "jenis_nama_operasi_bks" = '6242', "perawat_bks_1" = '476', "perawat_bks_2" = NULL, "perawat_bks_3" = '488', "perawat_bks_4" = '219', "perawat_bks_5" = '539', "jenis_anastesi_bks" = 'Blok anastesi ', "jam_mulai_op_bks" = '9:00', "jam_selesai_op_bks" = '10:00', "lama_operasi_bks" = '40menit ', "indikator_sterilisasi_bks" = 'steril', "alat_item_bks" = 'set mayor', "updated_at" = '2025-02-09 09:44:55'
WHERE "id" = '2492'
ERROR - 2025-02-09 09:45:06 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type date: &quot;&quot;
LINE 1: ..._steril_bks&quot; = '2025-02-09', &quot;tgl_steril_bks_0&quot; = '', &quot;tgl_s...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 09:45:06 --> Query error: ERROR:  invalid input syntax for type date: ""
LINE 1: ..._steril_bks" = '2025-02-09', "tgl_steril_bks_0" = '', "tgl_s...
                                                             ^ - Invalid query: UPDATE "sm_bukti_kondisi_sterilisasi" SET "id" = '2492', "tgl_operasi_bks" = '2025-02-09', "tanggal_steril_bks" = '2025-02-09', "tgl_steril_bks_0" = '', "tgl_steril_bks_1" = NULL, "tgl_steril_bks_2" = NULL, "tgl_steril_bks_3" = NULL, "tgl_steril_bks_4" = NULL, "tgl_steril_bks_5" = NULL, "tgl_steril_bks_6" = NULL, "tgl_steril_bks_7" = NULL, "tgl_steril_bks_8" = NULL, "tgl_steril_bks_9" = NULL, "tgl_steril_bks_10" = NULL, "tgl_steril_bks_11" = NULL, "tgl_steril_bks_12" = NULL, "tgl_steril_bks_13" = NULL, "tgl_steril_bks_14" = NULL, "alat_item_bks_0" = NULL, "alat_item_bks_1" = NULL, "alat_item_bks_2" = NULL, "alat_item_bks_3" = NULL, "alat_item_bks_4" = NULL, "alat_item_bks_5" = NULL, "alat_item_bks_6" = NULL, "alat_item_bks_7" = NULL, "alat_item_bks_8" = NULL, "alat_item_bks_9" = NULL, "alat_item_bks_10" = NULL, "alat_item_bks_11" = NULL, "alat_item_bks_12" = NULL, "alat_item_bks_13" = NULL, "alat_item_bks_14" = NULL, "dokter_bks_1" = '675', "dokter_bks_2" = '113', "jenis_nama_operasi_bks" = '6242', "perawat_bks_1" = '476', "perawat_bks_2" = NULL, "perawat_bks_3" = '488', "perawat_bks_4" = '219', "perawat_bks_5" = '539', "jenis_anastesi_bks" = 'Blok anastesi ', "jam_mulai_op_bks" = '9:00', "jam_selesai_op_bks" = '10:00', "lama_operasi_bks" = '40menit ', "indikator_sterilisasi_bks" = 'steril', "alat_item_bks" = 'set mayor', "updated_at" = '2025-02-09 09:45:06'
WHERE "id" = '2492'
ERROR - 2025-02-09 09:45:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type date: &quot;&quot;
LINE 1: ..._steril_bks&quot; = '2025-02-09', &quot;tgl_steril_bks_0&quot; = '', &quot;tgl_s...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 09:45:09 --> Query error: ERROR:  invalid input syntax for type date: ""
LINE 1: ..._steril_bks" = '2025-02-09', "tgl_steril_bks_0" = '', "tgl_s...
                                                             ^ - Invalid query: UPDATE "sm_bukti_kondisi_sterilisasi" SET "id" = '2492', "tgl_operasi_bks" = '2025-02-09', "tanggal_steril_bks" = '2025-02-09', "tgl_steril_bks_0" = '', "tgl_steril_bks_1" = NULL, "tgl_steril_bks_2" = NULL, "tgl_steril_bks_3" = NULL, "tgl_steril_bks_4" = NULL, "tgl_steril_bks_5" = NULL, "tgl_steril_bks_6" = NULL, "tgl_steril_bks_7" = NULL, "tgl_steril_bks_8" = NULL, "tgl_steril_bks_9" = NULL, "tgl_steril_bks_10" = NULL, "tgl_steril_bks_11" = NULL, "tgl_steril_bks_12" = NULL, "tgl_steril_bks_13" = NULL, "tgl_steril_bks_14" = NULL, "alat_item_bks_0" = NULL, "alat_item_bks_1" = NULL, "alat_item_bks_2" = NULL, "alat_item_bks_3" = NULL, "alat_item_bks_4" = NULL, "alat_item_bks_5" = NULL, "alat_item_bks_6" = NULL, "alat_item_bks_7" = NULL, "alat_item_bks_8" = NULL, "alat_item_bks_9" = NULL, "alat_item_bks_10" = NULL, "alat_item_bks_11" = NULL, "alat_item_bks_12" = NULL, "alat_item_bks_13" = NULL, "alat_item_bks_14" = NULL, "dokter_bks_1" = '675', "dokter_bks_2" = '113', "jenis_nama_operasi_bks" = '6242', "perawat_bks_1" = '476', "perawat_bks_2" = NULL, "perawat_bks_3" = '488', "perawat_bks_4" = '219', "perawat_bks_5" = '539', "jenis_anastesi_bks" = 'Blok anastesi ', "jam_mulai_op_bks" = '9:00', "jam_selesai_op_bks" = '10:00', "lama_operasi_bks" = '40menit ', "indikator_sterilisasi_bks" = 'steril', "alat_item_bks" = 'set mayor', "updated_at" = '2025-02-09 09:45:09'
WHERE "id" = '2492'
ERROR - 2025-02-09 09:45:18 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type date: &quot;&quot;
LINE 1: ..._steril_bks&quot; = '2025-02-09', &quot;tgl_steril_bks_0&quot; = '', &quot;tgl_s...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 09:45:18 --> Query error: ERROR:  invalid input syntax for type date: ""
LINE 1: ..._steril_bks" = '2025-02-09', "tgl_steril_bks_0" = '', "tgl_s...
                                                             ^ - Invalid query: UPDATE "sm_bukti_kondisi_sterilisasi" SET "id" = '2492', "tgl_operasi_bks" = '2025-02-09', "tanggal_steril_bks" = '2025-02-09', "tgl_steril_bks_0" = '', "tgl_steril_bks_1" = NULL, "tgl_steril_bks_2" = NULL, "tgl_steril_bks_3" = NULL, "tgl_steril_bks_4" = NULL, "tgl_steril_bks_5" = NULL, "tgl_steril_bks_6" = NULL, "tgl_steril_bks_7" = NULL, "tgl_steril_bks_8" = NULL, "tgl_steril_bks_9" = NULL, "tgl_steril_bks_10" = NULL, "tgl_steril_bks_11" = NULL, "tgl_steril_bks_12" = NULL, "tgl_steril_bks_13" = NULL, "tgl_steril_bks_14" = NULL, "alat_item_bks_0" = NULL, "alat_item_bks_1" = NULL, "alat_item_bks_2" = NULL, "alat_item_bks_3" = NULL, "alat_item_bks_4" = NULL, "alat_item_bks_5" = NULL, "alat_item_bks_6" = NULL, "alat_item_bks_7" = NULL, "alat_item_bks_8" = NULL, "alat_item_bks_9" = NULL, "alat_item_bks_10" = NULL, "alat_item_bks_11" = NULL, "alat_item_bks_12" = NULL, "alat_item_bks_13" = NULL, "alat_item_bks_14" = NULL, "dokter_bks_1" = '675', "dokter_bks_2" = '113', "jenis_nama_operasi_bks" = '6242', "perawat_bks_1" = '476', "perawat_bks_2" = NULL, "perawat_bks_3" = '488', "perawat_bks_4" = '219', "perawat_bks_5" = '539', "jenis_anastesi_bks" = 'Blok anastesi ', "jam_mulai_op_bks" = '9:00', "jam_selesai_op_bks" = '10:00', "lama_operasi_bks" = '40menit ', "indikator_sterilisasi_bks" = 'steril', "alat_item_bks" = 'set mayor', "updated_at" = '2025-02-09 09:45:18'
WHERE "id" = '2492'
ERROR - 2025-02-09 09:45:21 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type date: &quot;&quot;
LINE 1: ..._steril_bks&quot; = '2025-02-09', &quot;tgl_steril_bks_0&quot; = '', &quot;tgl_s...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 09:45:21 --> Query error: ERROR:  invalid input syntax for type date: ""
LINE 1: ..._steril_bks" = '2025-02-09', "tgl_steril_bks_0" = '', "tgl_s...
                                                             ^ - Invalid query: UPDATE "sm_bukti_kondisi_sterilisasi" SET "id" = '2492', "tgl_operasi_bks" = '2025-02-09', "tanggal_steril_bks" = '2025-02-09', "tgl_steril_bks_0" = '', "tgl_steril_bks_1" = NULL, "tgl_steril_bks_2" = NULL, "tgl_steril_bks_3" = NULL, "tgl_steril_bks_4" = NULL, "tgl_steril_bks_5" = NULL, "tgl_steril_bks_6" = NULL, "tgl_steril_bks_7" = NULL, "tgl_steril_bks_8" = NULL, "tgl_steril_bks_9" = NULL, "tgl_steril_bks_10" = NULL, "tgl_steril_bks_11" = NULL, "tgl_steril_bks_12" = NULL, "tgl_steril_bks_13" = NULL, "tgl_steril_bks_14" = NULL, "alat_item_bks_0" = NULL, "alat_item_bks_1" = NULL, "alat_item_bks_2" = NULL, "alat_item_bks_3" = NULL, "alat_item_bks_4" = NULL, "alat_item_bks_5" = NULL, "alat_item_bks_6" = NULL, "alat_item_bks_7" = NULL, "alat_item_bks_8" = NULL, "alat_item_bks_9" = NULL, "alat_item_bks_10" = NULL, "alat_item_bks_11" = NULL, "alat_item_bks_12" = NULL, "alat_item_bks_13" = NULL, "alat_item_bks_14" = NULL, "dokter_bks_1" = '675', "dokter_bks_2" = '113', "jenis_nama_operasi_bks" = '6242', "perawat_bks_1" = '476', "perawat_bks_2" = NULL, "perawat_bks_3" = '488', "perawat_bks_4" = '219', "perawat_bks_5" = '539', "jenis_anastesi_bks" = 'Blok anastesi ', "jam_mulai_op_bks" = '9:00', "jam_selesai_op_bks" = '10:00', "lama_operasi_bks" = '40menit ', "indikator_sterilisasi_bks" = 'steril', "alat_item_bks" = 'set mayor', "updated_at" = '2025-02-09 09:45:21'
WHERE "id" = '2492'
ERROR - 2025-02-09 09:45:23 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type date: &quot;&quot;
LINE 1: ..._steril_bks&quot; = '2025-02-09', &quot;tgl_steril_bks_0&quot; = '', &quot;tgl_s...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 09:45:23 --> Query error: ERROR:  invalid input syntax for type date: ""
LINE 1: ..._steril_bks" = '2025-02-09', "tgl_steril_bks_0" = '', "tgl_s...
                                                             ^ - Invalid query: UPDATE "sm_bukti_kondisi_sterilisasi" SET "id" = '2492', "tgl_operasi_bks" = '2025-02-09', "tanggal_steril_bks" = '2025-02-09', "tgl_steril_bks_0" = '', "tgl_steril_bks_1" = NULL, "tgl_steril_bks_2" = NULL, "tgl_steril_bks_3" = NULL, "tgl_steril_bks_4" = NULL, "tgl_steril_bks_5" = NULL, "tgl_steril_bks_6" = NULL, "tgl_steril_bks_7" = NULL, "tgl_steril_bks_8" = NULL, "tgl_steril_bks_9" = NULL, "tgl_steril_bks_10" = NULL, "tgl_steril_bks_11" = NULL, "tgl_steril_bks_12" = NULL, "tgl_steril_bks_13" = NULL, "tgl_steril_bks_14" = NULL, "alat_item_bks_0" = NULL, "alat_item_bks_1" = NULL, "alat_item_bks_2" = NULL, "alat_item_bks_3" = NULL, "alat_item_bks_4" = NULL, "alat_item_bks_5" = NULL, "alat_item_bks_6" = NULL, "alat_item_bks_7" = NULL, "alat_item_bks_8" = NULL, "alat_item_bks_9" = NULL, "alat_item_bks_10" = NULL, "alat_item_bks_11" = NULL, "alat_item_bks_12" = NULL, "alat_item_bks_13" = NULL, "alat_item_bks_14" = NULL, "dokter_bks_1" = '675', "dokter_bks_2" = '113', "jenis_nama_operasi_bks" = '6242', "perawat_bks_1" = '476', "perawat_bks_2" = NULL, "perawat_bks_3" = '488', "perawat_bks_4" = '219', "perawat_bks_5" = '539', "jenis_anastesi_bks" = 'Blok anastesi ', "jam_mulai_op_bks" = '9:00', "jam_selesai_op_bks" = '10:00', "lama_operasi_bks" = '40menit ', "indikator_sterilisasi_bks" = 'steril', "alat_item_bks" = 'set mayor', "updated_at" = '2025-02-09 09:45:23'
WHERE "id" = '2492'
ERROR - 2025-02-09 09:45:24 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type date: &quot;&quot;
LINE 1: ..._steril_bks&quot; = '2025-02-09', &quot;tgl_steril_bks_0&quot; = '', &quot;tgl_s...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 09:45:24 --> Query error: ERROR:  invalid input syntax for type date: ""
LINE 1: ..._steril_bks" = '2025-02-09', "tgl_steril_bks_0" = '', "tgl_s...
                                                             ^ - Invalid query: UPDATE "sm_bukti_kondisi_sterilisasi" SET "id" = '2492', "tgl_operasi_bks" = '2025-02-09', "tanggal_steril_bks" = '2025-02-09', "tgl_steril_bks_0" = '', "tgl_steril_bks_1" = NULL, "tgl_steril_bks_2" = NULL, "tgl_steril_bks_3" = NULL, "tgl_steril_bks_4" = NULL, "tgl_steril_bks_5" = NULL, "tgl_steril_bks_6" = NULL, "tgl_steril_bks_7" = NULL, "tgl_steril_bks_8" = NULL, "tgl_steril_bks_9" = NULL, "tgl_steril_bks_10" = NULL, "tgl_steril_bks_11" = NULL, "tgl_steril_bks_12" = NULL, "tgl_steril_bks_13" = NULL, "tgl_steril_bks_14" = NULL, "alat_item_bks_0" = NULL, "alat_item_bks_1" = NULL, "alat_item_bks_2" = NULL, "alat_item_bks_3" = NULL, "alat_item_bks_4" = NULL, "alat_item_bks_5" = NULL, "alat_item_bks_6" = NULL, "alat_item_bks_7" = NULL, "alat_item_bks_8" = NULL, "alat_item_bks_9" = NULL, "alat_item_bks_10" = NULL, "alat_item_bks_11" = NULL, "alat_item_bks_12" = NULL, "alat_item_bks_13" = NULL, "alat_item_bks_14" = NULL, "dokter_bks_1" = '675', "dokter_bks_2" = '113', "jenis_nama_operasi_bks" = '6242', "perawat_bks_1" = '476', "perawat_bks_2" = NULL, "perawat_bks_3" = '488', "perawat_bks_4" = '219', "perawat_bks_5" = '539', "jenis_anastesi_bks" = 'Blok anastesi ', "jam_mulai_op_bks" = '9:00', "jam_selesai_op_bks" = '10:00', "lama_operasi_bks" = '40menit ', "indikator_sterilisasi_bks" = 'steril', "alat_item_bks" = 'set mayor', "updated_at" = '2025-02-09 09:45:24'
WHERE "id" = '2492'
ERROR - 2025-02-09 09:45:34 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type date: &quot;&quot;
LINE 1: ..._steril_bks&quot; = '2025-02-09', &quot;tgl_steril_bks_0&quot; = '', &quot;tgl_s...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 09:45:34 --> Query error: ERROR:  invalid input syntax for type date: ""
LINE 1: ..._steril_bks" = '2025-02-09', "tgl_steril_bks_0" = '', "tgl_s...
                                                             ^ - Invalid query: UPDATE "sm_bukti_kondisi_sterilisasi" SET "id" = '2492', "tgl_operasi_bks" = '2025-02-09', "tanggal_steril_bks" = '2025-02-09', "tgl_steril_bks_0" = '', "tgl_steril_bks_1" = NULL, "tgl_steril_bks_2" = NULL, "tgl_steril_bks_3" = NULL, "tgl_steril_bks_4" = NULL, "tgl_steril_bks_5" = NULL, "tgl_steril_bks_6" = NULL, "tgl_steril_bks_7" = NULL, "tgl_steril_bks_8" = NULL, "tgl_steril_bks_9" = NULL, "tgl_steril_bks_10" = NULL, "tgl_steril_bks_11" = NULL, "tgl_steril_bks_12" = NULL, "tgl_steril_bks_13" = NULL, "tgl_steril_bks_14" = NULL, "alat_item_bks_0" = NULL, "alat_item_bks_1" = NULL, "alat_item_bks_2" = NULL, "alat_item_bks_3" = NULL, "alat_item_bks_4" = NULL, "alat_item_bks_5" = NULL, "alat_item_bks_6" = NULL, "alat_item_bks_7" = NULL, "alat_item_bks_8" = NULL, "alat_item_bks_9" = NULL, "alat_item_bks_10" = NULL, "alat_item_bks_11" = NULL, "alat_item_bks_12" = NULL, "alat_item_bks_13" = NULL, "alat_item_bks_14" = NULL, "dokter_bks_1" = '675', "dokter_bks_2" = '113', "jenis_nama_operasi_bks" = '6242', "perawat_bks_1" = '476', "perawat_bks_2" = NULL, "perawat_bks_3" = '488', "perawat_bks_4" = '219', "perawat_bks_5" = '539', "jenis_anastesi_bks" = 'Blok anastesi ', "jam_mulai_op_bks" = '9:00', "jam_selesai_op_bks" = '10:00', "lama_operasi_bks" = '40menit ', "indikator_sterilisasi_bks" = 'steril', "alat_item_bks" = 'set mayor', "updated_at" = '2025-02-09 09:45:34'
WHERE "id" = '2492'
ERROR - 2025-02-09 09:45:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type date: &quot;&quot;
LINE 1: ..._steril_bks&quot; = '2025-02-09', &quot;tgl_steril_bks_0&quot; = '', &quot;tgl_s...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 09:45:36 --> Query error: ERROR:  invalid input syntax for type date: ""
LINE 1: ..._steril_bks" = '2025-02-09', "tgl_steril_bks_0" = '', "tgl_s...
                                                             ^ - Invalid query: UPDATE "sm_bukti_kondisi_sterilisasi" SET "id" = '2492', "tgl_operasi_bks" = '2025-02-09', "tanggal_steril_bks" = '2025-02-09', "tgl_steril_bks_0" = '', "tgl_steril_bks_1" = NULL, "tgl_steril_bks_2" = NULL, "tgl_steril_bks_3" = NULL, "tgl_steril_bks_4" = NULL, "tgl_steril_bks_5" = NULL, "tgl_steril_bks_6" = NULL, "tgl_steril_bks_7" = NULL, "tgl_steril_bks_8" = NULL, "tgl_steril_bks_9" = NULL, "tgl_steril_bks_10" = NULL, "tgl_steril_bks_11" = NULL, "tgl_steril_bks_12" = NULL, "tgl_steril_bks_13" = NULL, "tgl_steril_bks_14" = NULL, "alat_item_bks_0" = NULL, "alat_item_bks_1" = NULL, "alat_item_bks_2" = NULL, "alat_item_bks_3" = NULL, "alat_item_bks_4" = NULL, "alat_item_bks_5" = NULL, "alat_item_bks_6" = NULL, "alat_item_bks_7" = NULL, "alat_item_bks_8" = NULL, "alat_item_bks_9" = NULL, "alat_item_bks_10" = NULL, "alat_item_bks_11" = NULL, "alat_item_bks_12" = NULL, "alat_item_bks_13" = NULL, "alat_item_bks_14" = NULL, "dokter_bks_1" = '675', "dokter_bks_2" = '113', "jenis_nama_operasi_bks" = '6242', "perawat_bks_1" = '476', "perawat_bks_2" = NULL, "perawat_bks_3" = '488', "perawat_bks_4" = '219', "perawat_bks_5" = '539', "jenis_anastesi_bks" = 'Blok anastesi ', "jam_mulai_op_bks" = '9:00', "jam_selesai_op_bks" = '10:00', "lama_operasi_bks" = '40menit ', "indikator_sterilisasi_bks" = 'steril', "alat_item_bks" = 'set mayor', "updated_at" = '2025-02-09 09:45:36'
WHERE "id" = '2492'
ERROR - 2025-02-09 09:45:49 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type date: &quot;&quot;
LINE 1: ..._steril_bks&quot; = '2025-02-09', &quot;tgl_steril_bks_0&quot; = '', &quot;tgl_s...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 09:45:49 --> Query error: ERROR:  invalid input syntax for type date: ""
LINE 1: ..._steril_bks" = '2025-02-09', "tgl_steril_bks_0" = '', "tgl_s...
                                                             ^ - Invalid query: UPDATE "sm_bukti_kondisi_sterilisasi" SET "id" = '2492', "tgl_operasi_bks" = '2025-02-09', "tanggal_steril_bks" = '2025-02-09', "tgl_steril_bks_0" = '', "tgl_steril_bks_1" = NULL, "tgl_steril_bks_2" = NULL, "tgl_steril_bks_3" = NULL, "tgl_steril_bks_4" = NULL, "tgl_steril_bks_5" = NULL, "tgl_steril_bks_6" = NULL, "tgl_steril_bks_7" = NULL, "tgl_steril_bks_8" = NULL, "tgl_steril_bks_9" = NULL, "tgl_steril_bks_10" = NULL, "tgl_steril_bks_11" = NULL, "tgl_steril_bks_12" = NULL, "tgl_steril_bks_13" = NULL, "tgl_steril_bks_14" = NULL, "alat_item_bks_0" = NULL, "alat_item_bks_1" = NULL, "alat_item_bks_2" = NULL, "alat_item_bks_3" = NULL, "alat_item_bks_4" = NULL, "alat_item_bks_5" = NULL, "alat_item_bks_6" = NULL, "alat_item_bks_7" = NULL, "alat_item_bks_8" = NULL, "alat_item_bks_9" = NULL, "alat_item_bks_10" = NULL, "alat_item_bks_11" = NULL, "alat_item_bks_12" = NULL, "alat_item_bks_13" = NULL, "alat_item_bks_14" = NULL, "dokter_bks_1" = '675', "dokter_bks_2" = '113', "jenis_nama_operasi_bks" = '6242', "perawat_bks_1" = '476', "perawat_bks_2" = NULL, "perawat_bks_3" = '488', "perawat_bks_4" = '219', "perawat_bks_5" = '539', "jenis_anastesi_bks" = 'Blok anastesi ', "jam_mulai_op_bks" = '9:00', "jam_selesai_op_bks" = '10:00', "lama_operasi_bks" = '40menit ', "indikator_sterilisasi_bks" = 'steril', "alat_item_bks" = 'set mayor', "updated_at" = '2025-02-09 09:45:49'
WHERE "id" = '2492'
ERROR - 2025-02-09 09:46:18 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 12168
ERROR - 2025-02-09 09:46:32 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type date: &quot;&quot;
LINE 1: ..._steril_bks&quot; = '2025-02-09', &quot;tgl_steril_bks_0&quot; = '', &quot;tgl_s...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 09:46:32 --> Query error: ERROR:  invalid input syntax for type date: ""
LINE 1: ..._steril_bks" = '2025-02-09', "tgl_steril_bks_0" = '', "tgl_s...
                                                             ^ - Invalid query: UPDATE "sm_bukti_kondisi_sterilisasi" SET "id" = '2492', "tgl_operasi_bks" = '2025-02-09', "tanggal_steril_bks" = '2025-02-09', "tgl_steril_bks_0" = '', "tgl_steril_bks_1" = '', "tgl_steril_bks_2" = NULL, "tgl_steril_bks_3" = NULL, "tgl_steril_bks_4" = NULL, "tgl_steril_bks_5" = NULL, "tgl_steril_bks_6" = NULL, "tgl_steril_bks_7" = NULL, "tgl_steril_bks_8" = NULL, "tgl_steril_bks_9" = NULL, "tgl_steril_bks_10" = NULL, "tgl_steril_bks_11" = NULL, "tgl_steril_bks_12" = NULL, "tgl_steril_bks_13" = NULL, "tgl_steril_bks_14" = NULL, "alat_item_bks_0" = NULL, "alat_item_bks_1" = NULL, "alat_item_bks_2" = NULL, "alat_item_bks_3" = NULL, "alat_item_bks_4" = NULL, "alat_item_bks_5" = NULL, "alat_item_bks_6" = NULL, "alat_item_bks_7" = NULL, "alat_item_bks_8" = NULL, "alat_item_bks_9" = NULL, "alat_item_bks_10" = NULL, "alat_item_bks_11" = NULL, "alat_item_bks_12" = NULL, "alat_item_bks_13" = NULL, "alat_item_bks_14" = NULL, "dokter_bks_1" = '675', "dokter_bks_2" = '113', "jenis_nama_operasi_bks" = '6242', "perawat_bks_1" = '476', "perawat_bks_2" = NULL, "perawat_bks_3" = '488', "perawat_bks_4" = '219', "perawat_bks_5" = '539', "jenis_anastesi_bks" = 'Blok anastesi ', "jam_mulai_op_bks" = '9:30', "jam_selesai_op_bks" = '10:10', "lama_operasi_bks" = '40menit ', "indikator_sterilisasi_bks" = 'steril', "alat_item_bks" = 'set mayor', "updated_at" = '2025-02-09 09:46:32'
WHERE "id" = '2492'
ERROR - 2025-02-09 09:46:32 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 12168
ERROR - 2025-02-09 09:47:33 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type date: &quot;&quot;
LINE 1: ..._steril_bks&quot; = '2025-02-09', &quot;tgl_steril_bks_0&quot; = '', &quot;tgl_s...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 09:47:33 --> Query error: ERROR:  invalid input syntax for type date: ""
LINE 1: ..._steril_bks" = '2025-02-09', "tgl_steril_bks_0" = '', "tgl_s...
                                                             ^ - Invalid query: UPDATE "sm_bukti_kondisi_sterilisasi" SET "id" = '2492', "tgl_operasi_bks" = '2025-02-09', "tanggal_steril_bks" = '2025-02-09', "tgl_steril_bks_0" = '', "tgl_steril_bks_1" = '', "tgl_steril_bks_2" = NULL, "tgl_steril_bks_3" = NULL, "tgl_steril_bks_4" = NULL, "tgl_steril_bks_5" = NULL, "tgl_steril_bks_6" = NULL, "tgl_steril_bks_7" = NULL, "tgl_steril_bks_8" = NULL, "tgl_steril_bks_9" = NULL, "tgl_steril_bks_10" = NULL, "tgl_steril_bks_11" = NULL, "tgl_steril_bks_12" = NULL, "tgl_steril_bks_13" = NULL, "tgl_steril_bks_14" = NULL, "alat_item_bks_0" = NULL, "alat_item_bks_1" = NULL, "alat_item_bks_2" = NULL, "alat_item_bks_3" = NULL, "alat_item_bks_4" = NULL, "alat_item_bks_5" = NULL, "alat_item_bks_6" = NULL, "alat_item_bks_7" = NULL, "alat_item_bks_8" = NULL, "alat_item_bks_9" = NULL, "alat_item_bks_10" = NULL, "alat_item_bks_11" = NULL, "alat_item_bks_12" = NULL, "alat_item_bks_13" = NULL, "alat_item_bks_14" = NULL, "dokter_bks_1" = '675', "dokter_bks_2" = '113', "jenis_nama_operasi_bks" = '6242', "perawat_bks_1" = '476', "perawat_bks_2" = NULL, "perawat_bks_3" = '488', "perawat_bks_4" = '219', "perawat_bks_5" = '539', "jenis_anastesi_bks" = 'Blok anastesi ', "jam_mulai_op_bks" = '9:30', "jam_selesai_op_bks" = '10:10', "lama_operasi_bks" = '40menit ', "indikator_sterilisasi_bks" = 'steril', "alat_item_bks" = 'set mayor', "updated_at" = '2025-02-09 09:47:33'
WHERE "id" = '2492'
ERROR - 2025-02-09 09:47:40 --> Severity: Notice  --> Undefined offset: 0 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 87
ERROR - 2025-02-09 09:47:40 --> Severity: Notice  --> Trying to get property 'kelamin_pasien' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 89
ERROR - 2025-02-09 09:47:40 --> Severity: Warning  --> Creating default object from empty value /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 89
ERROR - 2025-02-09 09:47:40 --> Severity: Notice  --> Undefined property: stdClass::$is_pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 91
ERROR - 2025-02-09 09:47:40 --> Severity: Notice  --> Undefined property: stdClass::$is_pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 94
ERROR - 2025-02-09 09:47:40 --> Severity: Notice  --> Undefined property: stdClass::$nama_keluarga /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 96
ERROR - 2025-02-09 09:47:40 --> Severity: Notice  --> Undefined property: stdClass::$nama_pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 26
ERROR - 2025-02-09 09:47:40 --> Severity: Notice  --> Undefined property: stdClass::$id_pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 27
ERROR - 2025-02-09 09:47:40 --> Severity: Notice  --> Undefined property: stdClass::$tanggal_lahir_pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 28
ERROR - 2025-02-09 09:47:40 --> Severity: Notice  --> Undefined property: stdClass::$asal_ruangan /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 41
ERROR - 2025-02-09 09:47:40 --> Severity: Notice  --> Undefined property: stdClass::$perawat_yang_merawat /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 59
ERROR - 2025-02-09 09:47:40 --> Severity: Notice  --> Undefined property: stdClass::$perawat_yang_merawat /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 60
ERROR - 2025-02-09 09:47:40 --> Severity: Notice  --> Undefined property: stdClass::$dokter_yang_merawat /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 65
ERROR - 2025-02-09 09:47:40 --> Severity: Notice  --> Undefined property: stdClass::$dokter_yang_merawat /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 66
ERROR - 2025-02-09 09:47:40 --> Severity: Notice  --> Undefined property: stdClass::$nurse_station /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 74
ERROR - 2025-02-09 09:47:40 --> Severity: Notice  --> Undefined property: stdClass::$nurse_station /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 75
ERROR - 2025-02-09 09:47:40 --> Severity: Notice  --> Undefined property: stdClass::$kamar_mandi_pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 79
ERROR - 2025-02-09 09:47:40 --> Severity: Notice  --> Undefined property: stdClass::$kamar_mandi_pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 80
ERROR - 2025-02-09 09:47:40 --> Severity: Notice  --> Undefined property: stdClass::$bel_pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 84
ERROR - 2025-02-09 09:47:40 --> Severity: Notice  --> Undefined property: stdClass::$bel_pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 85
ERROR - 2025-02-09 09:47:40 --> Severity: Notice  --> Undefined property: stdClass::$tempat_tidur_pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 89
ERROR - 2025-02-09 09:47:40 --> Severity: Notice  --> Undefined property: stdClass::$tempat_tidur_pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 90
ERROR - 2025-02-09 09:47:40 --> Severity: Notice  --> Undefined property: stdClass::$remote /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 94
ERROR - 2025-02-09 09:47:40 --> Severity: Notice  --> Undefined property: stdClass::$remote /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 95
ERROR - 2025-02-09 09:47:40 --> Severity: Notice  --> Undefined property: stdClass::$tempat_ibadah /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 99
ERROR - 2025-02-09 09:47:40 --> Severity: Notice  --> Undefined property: stdClass::$tempat_ibadah /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 100
ERROR - 2025-02-09 09:47:40 --> Severity: Notice  --> Undefined property: stdClass::$tempat_sampah /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 104
ERROR - 2025-02-09 09:47:40 --> Severity: Notice  --> Undefined property: stdClass::$tempat_sampah /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 105
ERROR - 2025-02-09 09:47:40 --> Severity: Notice  --> Undefined property: stdClass::$jadwal_pembagian /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 109
ERROR - 2025-02-09 09:47:40 --> Severity: Notice  --> Undefined property: stdClass::$jadwal_pembagian /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 110
ERROR - 2025-02-09 09:47:40 --> Severity: Notice  --> Undefined property: stdClass::$jadwal_visit /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 114
ERROR - 2025-02-09 09:47:40 --> Severity: Notice  --> Undefined property: stdClass::$jadwal_visit /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 115
ERROR - 2025-02-09 09:47:40 --> Severity: Notice  --> Undefined property: stdClass::$jadwal_jam_berkunjung /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 119
ERROR - 2025-02-09 09:47:40 --> Severity: Notice  --> Undefined property: stdClass::$jadwal_jam_berkunjung /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 120
ERROR - 2025-02-09 09:47:40 --> Severity: Notice  --> Undefined property: stdClass::$jadwal_ganti_linen /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 124
ERROR - 2025-02-09 09:47:40 --> Severity: Notice  --> Undefined property: stdClass::$jadwal_ganti_linen /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 125
ERROR - 2025-02-09 09:47:40 --> Severity: Notice  --> Undefined property: stdClass::$membawa_barang_sesuai_keperluan /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 130
ERROR - 2025-02-09 09:47:40 --> Severity: Notice  --> Undefined property: stdClass::$membawa_barang_sesuai_keperluan /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 131
ERROR - 2025-02-09 09:47:40 --> Severity: Notice  --> Undefined property: stdClass::$mematuhi_peraturan /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 136
ERROR - 2025-02-09 09:47:40 --> Severity: Notice  --> Undefined property: stdClass::$mematuhi_peraturan /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 137
ERROR - 2025-02-09 09:47:40 --> Severity: Notice  --> Undefined property: stdClass::$tidak_duduk_ditempat_tidur /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 142
ERROR - 2025-02-09 09:47:40 --> Severity: Notice  --> Undefined property: stdClass::$tidak_duduk_ditempat_tidur /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 143
ERROR - 2025-02-09 09:47:40 --> Severity: Notice  --> Undefined property: stdClass::$menyimpan_barang_berharga /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 148
ERROR - 2025-02-09 09:47:40 --> Severity: Notice  --> Undefined property: stdClass::$menyimpan_barang_berharga /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 149
ERROR - 2025-02-09 09:47:40 --> Severity: Notice  --> Undefined property: stdClass::$dapat_kartu_penunggu /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 154
ERROR - 2025-02-09 09:47:40 --> Severity: Notice  --> Undefined property: stdClass::$dapat_kartu_penunggu /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 155
ERROR - 2025-02-09 09:47:40 --> Severity: Notice  --> Undefined property: stdClass::$menghargai_privasi_pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 160
ERROR - 2025-02-09 09:47:40 --> Severity: Notice  --> Undefined property: stdClass::$menghargai_privasi_pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 161
ERROR - 2025-02-09 09:47:40 --> Severity: Notice  --> Undefined property: stdClass::$gelang /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 169
ERROR - 2025-02-09 09:47:40 --> Severity: Notice  --> Undefined property: stdClass::$gelang /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 170
ERROR - 2025-02-09 09:47:40 --> Severity: Notice  --> Undefined property: stdClass::$cuci_tangan /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 174
ERROR - 2025-02-09 09:47:40 --> Severity: Notice  --> Undefined property: stdClass::$cuci_tangan /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 175
ERROR - 2025-02-09 09:47:40 --> Severity: Notice  --> Undefined property: stdClass::$updated_on /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 181
ERROR - 2025-02-09 09:47:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type date: &quot;&quot;
LINE 1: ..._steril_bks&quot; = '2025-02-09', &quot;tgl_steril_bks_0&quot; = '', &quot;tgl_s...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 09:47:57 --> Query error: ERROR:  invalid input syntax for type date: ""
LINE 1: ..._steril_bks" = '2025-02-09', "tgl_steril_bks_0" = '', "tgl_s...
                                                             ^ - Invalid query: UPDATE "sm_bukti_kondisi_sterilisasi" SET "id" = '2492', "tgl_operasi_bks" = '2025-02-09', "tanggal_steril_bks" = '2025-02-09', "tgl_steril_bks_0" = '', "tgl_steril_bks_1" = '', "tgl_steril_bks_2" = NULL, "tgl_steril_bks_3" = NULL, "tgl_steril_bks_4" = NULL, "tgl_steril_bks_5" = NULL, "tgl_steril_bks_6" = NULL, "tgl_steril_bks_7" = NULL, "tgl_steril_bks_8" = NULL, "tgl_steril_bks_9" = NULL, "tgl_steril_bks_10" = NULL, "tgl_steril_bks_11" = NULL, "tgl_steril_bks_12" = NULL, "tgl_steril_bks_13" = NULL, "tgl_steril_bks_14" = NULL, "alat_item_bks_0" = NULL, "alat_item_bks_1" = NULL, "alat_item_bks_2" = NULL, "alat_item_bks_3" = NULL, "alat_item_bks_4" = NULL, "alat_item_bks_5" = NULL, "alat_item_bks_6" = NULL, "alat_item_bks_7" = NULL, "alat_item_bks_8" = NULL, "alat_item_bks_9" = NULL, "alat_item_bks_10" = NULL, "alat_item_bks_11" = NULL, "alat_item_bks_12" = NULL, "alat_item_bks_13" = NULL, "alat_item_bks_14" = NULL, "dokter_bks_1" = '675', "dokter_bks_2" = '113', "jenis_nama_operasi_bks" = '6242', "perawat_bks_1" = '476', "perawat_bks_2" = NULL, "perawat_bks_3" = '488', "perawat_bks_4" = '219', "perawat_bks_5" = '539', "jenis_anastesi_bks" = 'Blok anastesi ', "jam_mulai_op_bks" = '9:30', "jam_selesai_op_bks" = '10:10', "lama_operasi_bks" = '40menit ', "indikator_sterilisasi_bks" = 'steril', "alat_item_bks" = 'set mayor', "updated_at" = '2025-02-09 09:47:57'
WHERE "id" = '2492'
ERROR - 2025-02-09 09:51:04 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 09:51:04 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-09 09:53:11 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...erian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES (784659, '1', '', '', ''...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 09:53:11 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...erian_5", "jam_pemberian_6") VALUES (784659, '1', '', '', ''...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (784659, '1', '', '', '', '', 'PC', '0', '', '0', '', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-02-09 09:55:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...LUES (5532543, '773', 8550.108, '0.9', '1.00', 'Ya', 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 09:55:03 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...LUES (5532543, '773', 8550.108, '0.9', '1.00', 'Ya', 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (5532543, '773', 8550.108, '0.9', '1.00', 'Ya', 'null')
ERROR - 2025-02-09 09:56:11 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-02-09 09:59:18 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 09:59:18 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-09 10:01:34 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type date: &quot;&quot;
LINE 1: ..._steril_bks&quot; = '2025-02-09', &quot;tgl_steril_bks_0&quot; = '', &quot;tgl_s...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 10:01:34 --> Query error: ERROR:  invalid input syntax for type date: ""
LINE 1: ..._steril_bks" = '2025-02-09', "tgl_steril_bks_0" = '', "tgl_s...
                                                             ^ - Invalid query: UPDATE "sm_bukti_kondisi_sterilisasi" SET "id" = '2492', "tgl_operasi_bks" = '2025-02-09', "tanggal_steril_bks" = '2025-02-09', "tgl_steril_bks_0" = '', "tgl_steril_bks_1" = '', "tgl_steril_bks_2" = NULL, "tgl_steril_bks_3" = NULL, "tgl_steril_bks_4" = NULL, "tgl_steril_bks_5" = NULL, "tgl_steril_bks_6" = NULL, "tgl_steril_bks_7" = NULL, "tgl_steril_bks_8" = NULL, "tgl_steril_bks_9" = NULL, "tgl_steril_bks_10" = NULL, "tgl_steril_bks_11" = NULL, "tgl_steril_bks_12" = NULL, "tgl_steril_bks_13" = NULL, "tgl_steril_bks_14" = NULL, "alat_item_bks_0" = NULL, "alat_item_bks_1" = NULL, "alat_item_bks_2" = NULL, "alat_item_bks_3" = NULL, "alat_item_bks_4" = NULL, "alat_item_bks_5" = NULL, "alat_item_bks_6" = NULL, "alat_item_bks_7" = NULL, "alat_item_bks_8" = NULL, "alat_item_bks_9" = NULL, "alat_item_bks_10" = NULL, "alat_item_bks_11" = NULL, "alat_item_bks_12" = NULL, "alat_item_bks_13" = NULL, "alat_item_bks_14" = NULL, "dokter_bks_1" = '675', "dokter_bks_2" = '113', "jenis_nama_operasi_bks" = '6242', "perawat_bks_1" = '476', "perawat_bks_2" = NULL, "perawat_bks_3" = '488', "perawat_bks_4" = '219', "perawat_bks_5" = '539', "jenis_anastesi_bks" = 'Blok anastesi ', "jam_mulai_op_bks" = '9:30', "jam_selesai_op_bks" = '10:10', "lama_operasi_bks" = '40menit ', "indikator_sterilisasi_bks" = 'steril', "alat_item_bks" = 'set mayor', "updated_at" = '2025-02-09 10:01:34'
WHERE "id" = '2492'
ERROR - 2025-02-09 10:03:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 10:03:12 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-09 10:03:23 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 10:03:23 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-09 10:04:31 --> 404 Page Not Found --> /index
ERROR - 2025-02-09 10:06:39 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type date: &quot;&quot;
LINE 1: ..._steril_bks&quot; = '2025-02-09', &quot;tgl_steril_bks_0&quot; = '', &quot;tgl_s...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 10:06:39 --> Query error: ERROR:  invalid input syntax for type date: ""
LINE 1: ..._steril_bks" = '2025-02-09', "tgl_steril_bks_0" = '', "tgl_s...
                                                             ^ - Invalid query: UPDATE "sm_bukti_kondisi_sterilisasi" SET "id" = '2492', "tgl_operasi_bks" = '2025-02-09', "tanggal_steril_bks" = '2025-02-09', "tgl_steril_bks_0" = '', "tgl_steril_bks_1" = '', "tgl_steril_bks_2" = NULL, "tgl_steril_bks_3" = NULL, "tgl_steril_bks_4" = NULL, "tgl_steril_bks_5" = NULL, "tgl_steril_bks_6" = NULL, "tgl_steril_bks_7" = NULL, "tgl_steril_bks_8" = NULL, "tgl_steril_bks_9" = NULL, "tgl_steril_bks_10" = NULL, "tgl_steril_bks_11" = NULL, "tgl_steril_bks_12" = NULL, "tgl_steril_bks_13" = NULL, "tgl_steril_bks_14" = NULL, "alat_item_bks_0" = NULL, "alat_item_bks_1" = NULL, "alat_item_bks_2" = NULL, "alat_item_bks_3" = NULL, "alat_item_bks_4" = NULL, "alat_item_bks_5" = NULL, "alat_item_bks_6" = NULL, "alat_item_bks_7" = NULL, "alat_item_bks_8" = NULL, "alat_item_bks_9" = NULL, "alat_item_bks_10" = NULL, "alat_item_bks_11" = NULL, "alat_item_bks_12" = NULL, "alat_item_bks_13" = NULL, "alat_item_bks_14" = NULL, "dokter_bks_1" = '675', "dokter_bks_2" = '113', "jenis_nama_operasi_bks" = '6242', "perawat_bks_1" = '476', "perawat_bks_2" = NULL, "perawat_bks_3" = '488', "perawat_bks_4" = '219', "perawat_bks_5" = '539', "jenis_anastesi_bks" = 'Blok anastesi ', "jam_mulai_op_bks" = '9:30', "jam_selesai_op_bks" = '10:10', "lama_operasi_bks" = '40menit ', "indikator_sterilisasi_bks" = 'steril', "alat_item_bks" = 'set mayor', "updated_at" = '2025-02-09 10:06:39'
WHERE "id" = '2492'
ERROR - 2025-02-09 10:09:13 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 10:09:13 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-09 10:10:17 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 10:10:17 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-09 10:10:30 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 10:10:30 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-09 10:10:56 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 10:10:56 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-09 10:13:17 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 10:13:17 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-09 10:18:11 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-02-09 10:18:31 --> 404 Page Not Found --> /index
ERROR - 2025-02-09 10:21:17 --> 404 Page Not Found --> /index
ERROR - 2025-02-09 10:24:49 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 10:24:49 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-09 10:26:31 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 10:26:31 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-09 10:26:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 10:26:40 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-09 10:26:54 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 10:26:54 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-09 10:28:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 10:28:46 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-09 10:36:47 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-02-09 10:41:55 --> 404 Page Not Found --> /index
ERROR - 2025-02-09 10:42:56 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-02-09 10:42:56 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-02-09 10:44:26 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 10:44:26 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-09 10:44:45 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 10:44:45 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-09 10:45:37 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-02-09 10:45:39 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-02-09 10:45:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 10:45:46 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-09 10:46:20 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 10:46:20 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-09 10:50:11 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type date: &quot;&quot;
LINE 1: ..._steril_bks&quot; = '2025-02-09', &quot;tgl_steril_bks_0&quot; = '', &quot;tgl_s...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 10:50:11 --> Query error: ERROR:  invalid input syntax for type date: ""
LINE 1: ..._steril_bks" = '2025-02-09', "tgl_steril_bks_0" = '', "tgl_s...
                                                             ^ - Invalid query: UPDATE "sm_bukti_kondisi_sterilisasi" SET "id" = '2492', "tgl_operasi_bks" = '2025-02-09', "tanggal_steril_bks" = '2025-02-09', "tgl_steril_bks_0" = '', "tgl_steril_bks_1" = '', "tgl_steril_bks_2" = NULL, "tgl_steril_bks_3" = NULL, "tgl_steril_bks_4" = NULL, "tgl_steril_bks_5" = NULL, "tgl_steril_bks_6" = NULL, "tgl_steril_bks_7" = NULL, "tgl_steril_bks_8" = NULL, "tgl_steril_bks_9" = NULL, "tgl_steril_bks_10" = NULL, "tgl_steril_bks_11" = NULL, "tgl_steril_bks_12" = NULL, "tgl_steril_bks_13" = NULL, "tgl_steril_bks_14" = NULL, "alat_item_bks_0" = NULL, "alat_item_bks_1" = NULL, "alat_item_bks_2" = NULL, "alat_item_bks_3" = NULL, "alat_item_bks_4" = NULL, "alat_item_bks_5" = NULL, "alat_item_bks_6" = NULL, "alat_item_bks_7" = NULL, "alat_item_bks_8" = NULL, "alat_item_bks_9" = NULL, "alat_item_bks_10" = NULL, "alat_item_bks_11" = NULL, "alat_item_bks_12" = NULL, "alat_item_bks_13" = NULL, "alat_item_bks_14" = NULL, "dokter_bks_1" = '675', "dokter_bks_2" = '113', "jenis_nama_operasi_bks" = '6242', "perawat_bks_1" = '476', "perawat_bks_2" = NULL, "perawat_bks_3" = '488', "perawat_bks_4" = '219', "perawat_bks_5" = '539', "jenis_anastesi_bks" = 'Blok anastesi ', "jam_mulai_op_bks" = '9:30', "jam_selesai_op_bks" = '10:10', "lama_operasi_bks" = '40menit ', "indikator_sterilisasi_bks" = 'steril', "alat_item_bks" = 'set mayor', "updated_at" = '2025-02-09 10:50:11'
WHERE "id" = '2492'
ERROR - 2025-02-09 10:57:23 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 10:57:23 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-09 10:57:27 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 10:57:27 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-09 10:57:56 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 10:57:56 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-09 10:58:01 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 10:58:01 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-09 11:06:56 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 11:06:56 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-09 11:08:54 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...&quot;) VALUES (5532822, '829', 9324, '25', '2.00', 'Ya', 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 11:08:54 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...") VALUES (5532822, '829', 9324, '25', '2.00', 'Ya', 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (5532822, '829', 9324, '25', '2.00', 'Ya', 'null')
ERROR - 2025-02-09 11:17:22 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/views/js.php 1507
ERROR - 2025-02-09 11:20:13 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 11:20:13 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-09 11:20:25 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 11:20:25 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-09 11:20:53 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;12.5&quot;
LINE 1: ...VALUES ('634410', '687507', '1686', '2025-02-09', '12.5', NU...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 11:20:53 --> Query error: ERROR:  invalid input syntax for type smallint: "12.5"
LINE 1: ...VALUES ('634410', '687507', '1686', '2025-02-09', '12.5', NU...
                                                             ^ - Invalid query: INSERT INTO "sm_monitoring_pasien_c" ("id_pendaftaran", "id_layanan_pendaftaran", "id_user", "tgl_mpp", "oral_mpp", "ngt_mpp", "paranteral_mpp", "paranteral_mppp", "produk_mpp", "input_mpp", "urin_mpp", "bab_mpp", "gastrik_mpp", "wsd_mpp", "iwl_mpp", "output_mpp", "blance_cairan_mpp", "tdarah_mpp", "saturasi_mppp", "toksigen_mpp", "skesadaran_mpp", "kategori_mpp", "pengawasan_mpp", "diit_mpp", "jam_mpp", "perawat_mpp", "created_at") VALUES ('634410', '687507', '1686', '2025-02-09', '12.5', NULL, '30', NULL, NULL, '42.5', '35', '3', NULL, NULL, NULL, '38', '4.5', NULL, '99', '0.3', 'CM', 'K', NULL, 'PASI', '12:00', '274', '2025-02-09 11:19:41')
ERROR - 2025-02-09 11:20:54 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 11:20:54 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-09 11:27:51 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-02-09 11:34:34 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-02-09 11:36:02 --> 404 Page Not Found --> /index
ERROR - 2025-02-09 11:37:54 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-02-09 11:37:54 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-02-09 11:37:54 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-02-09 11:37:54 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-02-09 11:37:54 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-02-09 11:37:54 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-02-09 11:40:33 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 11:40:33 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-09 11:47:06 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 11449
ERROR - 2025-02-09 11:47:14 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 11449
ERROR - 2025-02-09 11:48:43 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 11:48:43 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-09 11:55:11 --> 404 Page Not Found --> /index
ERROR - 2025-02-09 11:56:09 --> 404 Page Not Found --> /index
ERROR - 2025-02-09 12:19:46 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-02-09 12:19:46 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 792
ERROR - 2025-02-09 12:19:46 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-02-09 12:19:46 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 797
ERROR - 2025-02-09 12:19:46 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-02-09 12:19:46 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 798
ERROR - 2025-02-09 12:20:01 --> 404 Page Not Found --> /index
ERROR - 2025-02-09 12:21:56 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 12:21:56 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-09 12:22:17 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 12:22:17 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-09 12:23:37 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 12:23:37 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-09 12:23:53 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 12:23:53 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-09 12:32:41 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 12:32:41 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-09 12:38:07 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 12:38:07 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-09 12:39:05 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-02-09 12:39:18 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-02-09 12:50:28 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-02-09 12:55:31 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-02-09 13:02:40 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-02-09 13:03:00 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-02-09 13:04:10 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-02-09 13:06:02 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 13:06:02 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-09 13:09:25 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 13:09:25 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-09 13:17:31 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-02-09 13:19:03 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-02-09 13:20:31 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...erian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES (784708, '3', '', '', ''...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 13:20:31 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...erian_5", "jam_pemberian_6") VALUES (784708, '3', '', '', ''...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (784708, '3', '', '', '', '', 'PC', '0', '', '0', '', 'tegaderm', '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-02-09 13:20:50 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-02-09 13:20:54 --> 404 Page Not Found --> /index
ERROR - 2025-02-09 13:22:27 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...erian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES (784709, '3', '', '', ''...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 13:22:27 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...erian_5", "jam_pemberian_6") VALUES (784709, '3', '', '', ''...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (784709, '3', '', '', '', '', 'PC', '0', '', '0', '', 'tegaderm', '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-02-09 13:22:45 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-02-09 13:24:06 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 13:24:06 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-09 13:24:34 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 13:24:34 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-09 13:24:49 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...erian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES (784710, '3', '', '', ''...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 13:24:49 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...erian_5", "jam_pemberian_6") VALUES (784710, '3', '', '', ''...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (784710, '3', '', '', '', '', 'PC', '0', '', '0', '', 'tegaderm', '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-02-09 13:26:00 --> 404 Page Not Found --> /index
ERROR - 2025-02-09 13:26:19 --> 404 Page Not Found --> /index
ERROR - 2025-02-09 13:28:23 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-02-09 13:29:08 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...LUES (5533130, '607', 11580.408, '20', '1.00', 'Ya', 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 13:29:08 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...LUES (5533130, '607', 11580.408, '20', '1.00', 'Ya', 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (5533130, '607', 11580.408, '20', '1.00', 'Ya', 'null')
ERROR - 2025-02-09 13:37:04 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-02-09 13:37:09 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-02-09 13:37:14 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-02-09 13:37:28 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-02-09 13:37:35 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-02-09 13:37:43 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-02-09 13:41:10 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-02-09 13:42:02 --> 404 Page Not Found --> /index
ERROR - 2025-02-09 13:44:40 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-02-09 13:49:49 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 13:49:49 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-09 13:53:42 --> 404 Page Not Found --> /index
ERROR - 2025-02-09 13:55:22 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ... VALUES (5533211, '374', 97102.8, '1', '1.00', NULL, 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 13:55:22 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ... VALUES (5533211, '374', 97102.8, '1', '1.00', NULL, 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (5533211, '374', 97102.8, '1', '1.00', NULL, 'null')
ERROR - 2025-02-09 14:07:39 --> 404 Page Not Found --> /index
ERROR - 2025-02-09 14:11:29 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-02-09 14:15:05 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-02-09 14:15:14 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-02-09 14:15:23 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-02-09 14:15:50 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-02-09 14:29:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 14:29:12 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-09 14:29:25 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 14:29:25 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-09 14:34:45 --> 404 Page Not Found --> /index
ERROR - 2025-02-09 14:35:44 --> 404 Page Not Found --> /index
ERROR - 2025-02-09 14:36:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...) VALUES (5533270, '393', 6526.8, '1', '1.00', NULL, 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 14:36:03 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...) VALUES (5533270, '393', 6526.8, '1', '1.00', NULL, 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (5533270, '393', 6526.8, '1', '1.00', NULL, 'null')
ERROR - 2025-02-09 14:36:15 --> 404 Page Not Found --> /index
ERROR - 2025-02-09 14:37:01 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...&quot;, &quot;jam_pemberian_6&quot;) VALUES ('784717', '8', '1', '', '', ''...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 14:37:01 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...", "jam_pemberian_6") VALUES ('784717', '8', '1', '', '', ''...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES ('784717', '8', '1', '', '', '', 'PC', '0', '', '0', '', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-02-09 14:43:01 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 14:43:01 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-02-09 14:43:01 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 14:43:01 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-02-09 14:47:02 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 14:47:02 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-09 14:47:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 14:47:15 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-09 14:47:16 --> 404 Page Not Found --> /index
ERROR - 2025-02-09 14:47:21 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 14:47:21 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-09 15:07:46 --> 404 Page Not Found --> /index
ERROR - 2025-02-09 15:09:22 --> 404 Page Not Found --> /index
ERROR - 2025-02-09 15:10:25 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...&quot;) VALUES (5533363, '212', 862.8, '1', '1.00', NULL, 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 15:10:25 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...") VALUES (5533363, '212', 862.8, '1', '1.00', NULL, 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (5533363, '212', 862.8, '1', '1.00', NULL, 'null')
ERROR - 2025-02-09 15:13:13 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-02-09 15:19:35 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;id_layanan_pendaftaran&quot;
LINE 8:             where g.id_pendaftaran = 'id_layanan_pendaftaran...
                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 15:19:35 --> Query error: ERROR:  invalid input syntax for type integer: "id_layanan_pendaftaran"
LINE 8:             where g.id_pendaftaran = 'id_layanan_pendaftaran...
                                             ^ - Invalid query: 
            select g.*, pg.nama as petugas, pd.nama as dokter, us.nama users
            from sm_gizi_anak as g
            left join sm_pegawai as pg on pg.id = g.ga_petugas
            LEFT JOIN sm_tenaga_medis as tm on tm.id = g.ga_dokter
            LEFT JOIN sm_pegawai as pd on pd.id = tm.id_pegawai
            LEFT JOIN sm_pegawai as us on us.id = g.id_users
            where g.id_pendaftaran = 'id_layanan_pendaftaran'
            order by 
            case 
            when g.updated_at is not null then g.updated_at
            else g.created_at
            end desc
        
ERROR - 2025-02-09 15:19:35 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;id_layanan_pendaftaran&quot;
LINE 7:             where d.id_pendaftaran = 'id_layanan_pendaftaran...
                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 15:19:35 --> Query error: ERROR:  invalid input syntax for type integer: "id_layanan_pendaftaran"
LINE 7:             where d.id_pendaftaran = 'id_layanan_pendaftaran...
                                             ^ - Invalid query: 
            select d.*, pg.nama as petugas, pd.nama as dokter
            from sm_gizi_dietetik as d
            left join sm_pegawai as pg on pg.id = d.gd_petugas
            LEFT JOIN sm_tenaga_medis as tm on tm.id = d.gd_dokter
            LEFT JOIN sm_pegawai as pd on pd.id = tm.id_pegawai
            where d.id_pendaftaran = 'id_layanan_pendaftaran'
            order by 
            case 
            when d.updated_at is not null then d.updated_at
            else d.created_at
            end desc
        
ERROR - 2025-02-09 15:19:35 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;id_layanan_pendaftaran&quot;
LINE 8:             where k.id_pendaftaran = 'id_layanan_pendaftaran...
                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 15:19:35 --> Query error: ERROR:  invalid input syntax for type integer: "id_layanan_pendaftaran"
LINE 8:             where k.id_pendaftaran = 'id_layanan_pendaftaran...
                                             ^ - Invalid query: 
            select k.*, pg.nama as petugas, pd.nama as dokter, us.nama users
            from sm_konsultasi_gizi as k
            left join sm_pegawai as pg on pg.id = k.kg_petugas
            left join sm_tenaga_medis as tm on tm.id = k.kg_dokter
            left join sm_pegawai as pd on pd.id = tm.id_pegawai
            LEFT JOIN sm_pegawai as us on us.id = k.id_users
            where k.id_pendaftaran = 'id_layanan_pendaftaran'
            order by 
            case 
            when k.updated_at is not null then k.updated_at
            else k.created_at
            end desc
        
ERROR - 2025-02-09 15:22:04 --> 404 Page Not Found --> /index
ERROR - 2025-02-09 15:26:53 --> 404 Page Not Found --> /index
ERROR - 2025-02-09 15:28:07 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-02-09 15:29:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  null value in column &quot;waktu&quot; violates not-null constraint
DETAIL:  Failing row contains (794829, 688200, null, 8, , , , , , 2025, null, sudah konsul dan konfirmasi ulang dr. Angelia Sp. A&amp;nbsp;, null, null, 2025, 2025-02-09 15:29:46, null, null, null, null, null, null, null, 0, , , ,  Pasien dibawa ibu dengan keluhan demam sejak 6 hari SMRS. demam..., BB: 16.8kg
BB/U: 3percentile 
Ku TSS
GCS 15 E4M6V5
TD: -/- m..., Hiperpireksia H.6 + ISPA
, Terapi IGD
-IVFD RL 10tpm
-Pct 180mg IV drip 
-DR
, null, null, null, null). /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 15:29:46 --> Query error: ERROR:  null value in column "waktu" violates not-null constraint
DETAIL:  Failing row contains (794829, 688200, null, 8, , , , , , 2025, null, sudah konsul dan konfirmasi ulang dr. Angelia Sp. A&nbsp;, null, null, 2025, 2025-02-09 15:29:46, null, null, null, null, null, null, null, 0, , , ,  Pasien dibawa ibu dengan keluhan demam sejak 6 hari SMRS. demam..., BB: 16.8kg
BB/U: 3percentile 
Ku TSS
GCS 15 E4M6V5
TD: -/- m..., Hiperpireksia H.6 + ISPA
, Terapi IGD
-IVFD RL 10tpm
-Pct 180mg IV drip 
-DR
, null, null, null, null). - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('688200', NULL, '8', '', '', '', '', '', '', '', '', ' Pasien dibawa ibu dengan keluhan demam sejak 6 hari SMRS. demam dikatakan naik turun dan tinggi sejak 1 hari ini. demam tanpa disertai adanya riwayat perdarahan. bapil (+) sejak 2 hari SMRS. nyeri menelan (+), BAB cair 1 hari yang lalu dengan frekuensi 2x , BAB cair disertai ampas 2x hari ini, intake sulit (+), mual (-) muntah (-), BAK dbn. sejak 1 hari ini pasien tidak mau makan dan minum. 

Sudah ke klinik hari Kamis, hanya diberikan pct dan tidak membaik. Hari ini terakhir minum pct pkl 10.
Imunisasi dan perkembangan sesuai usia. 

RPD: tidak ada
RPO: tidak ada
Riw alergi: tidak ada, makanan (-), obat (-) 
', 'BB: 16.8kg
BB/U: 3percentile 
Ku TSS
GCS 15 E4M6V5
TD: -/- mmHg
HR: 122 x/m reguler, kuat angkat  
RR : 26 x/m 
Suhu : 39.8 C
Spo2 : 99 on RA

Mata :CA -/-, SI -/-
Leher : pembesaran KGB (-), JVP normal
Mulut : mukosa kering (-), faring hiperemis (+) sianosis (-)  
Paru: vbs +/+, rh-/-, wh -/- retraksi (-)
Jantung : S1S2 reguler, m(-), g(-) 
Abdomen : supel, bu meningkat min, nt (-) 
Eks : akral hangat, crt&lt;2s, edema -/-
Kulit: ptekiae (-) ', 'Hiperpireksia H.6 + ISPA
', 'Terapi IGD
-IVFD RL 10tpm
-Pct 180mg IV drip 
-DR
', '2025', NULL, 'sudah konsul dan konfirmasi ulang dr. Angelia Sp. A&nbsp;', NULL, '2025', 0, NULL, '2025-02-09 15:29:46')
ERROR - 2025-02-09 15:29:50 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  null value in column &quot;waktu&quot; violates not-null constraint
DETAIL:  Failing row contains (794830, 688200, null, 8, , , , , , 2025, null, sudah konsul dan konfirmasi ulang dr. Angelia Sp. A&amp;nbsp;, null, null, 2025, 2025-02-09 15:29:50, null, null, null, null, null, null, null, 0, , , ,  Pasien dibawa ibu dengan keluhan demam sejak 6 hari SMRS. demam..., BB: 16.8kg
BB/U: 3percentile 
Ku TSS
GCS 15 E4M6V5
TD: -/- m..., Hiperpireksia H.6 + ISPA
, Terapi IGD
-IVFD RL 10tpm
-Pct 180mg IV drip 
-DR
, null, null, null, null). /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 15:29:50 --> Query error: ERROR:  null value in column "waktu" violates not-null constraint
DETAIL:  Failing row contains (794830, 688200, null, 8, , , , , , 2025, null, sudah konsul dan konfirmasi ulang dr. Angelia Sp. A&nbsp;, null, null, 2025, 2025-02-09 15:29:50, null, null, null, null, null, null, null, 0, , , ,  Pasien dibawa ibu dengan keluhan demam sejak 6 hari SMRS. demam..., BB: 16.8kg
BB/U: 3percentile 
Ku TSS
GCS 15 E4M6V5
TD: -/- m..., Hiperpireksia H.6 + ISPA
, Terapi IGD
-IVFD RL 10tpm
-Pct 180mg IV drip 
-DR
, null, null, null, null). - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('688200', NULL, '8', '', '', '', '', '', '', '', '', ' Pasien dibawa ibu dengan keluhan demam sejak 6 hari SMRS. demam dikatakan naik turun dan tinggi sejak 1 hari ini. demam tanpa disertai adanya riwayat perdarahan. bapil (+) sejak 2 hari SMRS. nyeri menelan (+), BAB cair 1 hari yang lalu dengan frekuensi 2x , BAB cair disertai ampas 2x hari ini, intake sulit (+), mual (-) muntah (-), BAK dbn. sejak 1 hari ini pasien tidak mau makan dan minum. 

Sudah ke klinik hari Kamis, hanya diberikan pct dan tidak membaik. Hari ini terakhir minum pct pkl 10.
Imunisasi dan perkembangan sesuai usia. 

RPD: tidak ada
RPO: tidak ada
Riw alergi: tidak ada, makanan (-), obat (-) 
', 'BB: 16.8kg
BB/U: 3percentile 
Ku TSS
GCS 15 E4M6V5
TD: -/- mmHg
HR: 122 x/m reguler, kuat angkat  
RR : 26 x/m 
Suhu : 39.8 C
Spo2 : 99 on RA

Mata :CA -/-, SI -/-
Leher : pembesaran KGB (-), JVP normal
Mulut : mukosa kering (-), faring hiperemis (+) sianosis (-)  
Paru: vbs +/+, rh-/-, wh -/- retraksi (-)
Jantung : S1S2 reguler, m(-), g(-) 
Abdomen : supel, bu meningkat min, nt (-) 
Eks : akral hangat, crt&lt;2s, edema -/-
Kulit: ptekiae (-) ', 'Hiperpireksia H.6 + ISPA
', 'Terapi IGD
-IVFD RL 10tpm
-Pct 180mg IV drip 
-DR
', '2025', NULL, 'sudah konsul dan konfirmasi ulang dr. Angelia Sp. A&nbsp;', NULL, '2025', 0, NULL, '2025-02-09 15:29:50')
ERROR - 2025-02-09 15:35:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...UES (5533456, '709', 10197.792, '500', '1.00', 'Ya', 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 15:35:36 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...UES (5533456, '709', 10197.792, '500', '1.00', 'Ya', 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (5533456, '709', 10197.792, '500', '1.00', 'Ya', 'null')
ERROR - 2025-02-09 15:37:54 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 15:37:54 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-02-09 15:37:54 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 15:37:54 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-02-09 15:46:11 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 15:46:11 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-09 15:54:35 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 15:54:35 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-09 15:54:55 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-02-09 16:00:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 16:00:09 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-09 16:01:52 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-02-09 16:01:53 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-02-09 16:01:54 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-02-09 16:01:55 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-02-09 16:01:55 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-02-09 16:04:16 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-02-09 16:13:33 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 16:13:33 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-09 16:19:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 16:19:09 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-09 16:19:31 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 16:19:31 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-09 16:19:43 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 16:19:43 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-09 16:24:44 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 16:24:44 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-09 16:29:41 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 16:29:41 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-02-09 16:29:41 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 16:29:41 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-02-09 16:35:58 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 16:35:58 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-02-09 16:35:58 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 16:35:58 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-02-09 16:38:46 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/intensive_care/views/js.php 1119
ERROR - 2025-02-09 16:42:01 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-02-09 16:42:35 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-02-09 16:42:56 --> 404 Page Not Found --> /index
ERROR - 2025-02-09 16:43:40 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-02-09 16:43:50 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 16:43:50 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-09 16:43:58 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 16:43:58 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-09 16:44:21 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-02-09 16:46:55 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 16:46:55 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-09 16:47:07 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 16:47:07 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-09 16:47:11 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 16:47:11 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-09 16:47:23 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 16:47:23 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-09 16:47:29 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 16:47:29 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-09 16:47:42 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 16:47:42 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-09 16:47:47 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-02-09 16:48:10 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-02-09 16:48:20 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 16:48:20 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-09 16:48:26 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 16:48:26 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-09 16:48:39 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 16:48:39 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-09 16:52:55 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-02-09 16:53:43 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 16:53:43 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-09 16:59:45 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-02-09 17:00:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;no_kab&quot;
LINE 3: WHERE &quot;NO_PROP&quot; = 'no_kab'
                          ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 17:00:40 --> Query error: ERROR:  invalid input syntax for type integer: "no_kab"
LINE 3: WHERE "NO_PROP" = 'no_kab'
                          ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = 'no_kab'
AND "NO_KAB" IS NULL
ORDER BY "NAMA_KEC"
ERROR - 2025-02-09 17:09:05 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-02-09 17:10:11 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-02-09 17:14:17 --> 404 Page Not Found --> /index
ERROR - 2025-02-09 17:22:26 --> 404 Page Not Found --> /index
ERROR - 2025-02-09 17:26:01 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-02-09 17:42:47 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 17:42:47 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-09 17:43:06 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 17:43:06 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-09 17:43:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 17:43:57 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-09 17:45:49 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 17:45:49 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-09 17:53:22 --> 404 Page Not Found --> /index
ERROR - 2025-02-09 18:09:55 --> 404 Page Not Found --> /index
ERROR - 2025-02-09 18:19:21 --> 404 Page Not Found --> /index
ERROR - 2025-02-09 18:27:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 18:27:46 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-09 18:27:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...LUES (5533798, '1264', 28061.244, '1', '1.00', NULL, 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 18:27:51 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...LUES (5533798, '1264', 28061.244, '1', '1.00', NULL, 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (5533798, '1264', 28061.244, '1', '1.00', NULL, 'null')
ERROR - 2025-02-09 18:28:06 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 18:28:06 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-09 18:28:32 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 18:28:32 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-09 18:28:39 --> 404 Page Not Found --> /index
ERROR - 2025-02-09 18:29:04 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 18:29:04 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-09 18:29:14 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...LUES (5533820, '689', 9208.116, '0.9', '1.00', 'Ya', 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 18:29:14 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...LUES (5533820, '689', 9208.116, '0.9', '1.00', 'Ya', 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (5533820, '689', 9208.116, '0.9', '1.00', 'Ya', 'null')
ERROR - 2025-02-09 18:30:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 18:30:03 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-09 18:30:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 18:30:12 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-09 18:30:30 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 18:30:30 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-09 18:30:34 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 18:30:34 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-09 18:30:38 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 18:30:38 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-09 18:31:43 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  null value in column &quot;waktu&quot; violates not-null constraint
DETAIL:  Failing row contains (794887, 688214, null, 8, , , , , , 2056, null, &lt;p&gt;sudah lapor dan konfirmasi dr. Eko, Sp.NÂ &lt;/p&gt;&lt;p&gt;advis:Â &lt;/p&gt;..., null, null, 2056, 2025-02-09 18:31:43, null, null, null, null, null, null, null, 0, , , , Pasien datang dengan keluhan nyeri kepala sejak 1 minggu smrs, m..., Ku TSS
GCS 15 E4M6V5
TD: 128/66 mmHg
HR: 112bpm, reguler, kua..., Cephalgia TTH
, Terapi IGD
-IVFD
-Inj Ranitidine 1amp
-Inj Ketorolac 1amp
-D..., null, null, null, null). /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 18:31:43 --> Query error: ERROR:  null value in column "waktu" violates not-null constraint
DETAIL:  Failing row contains (794887, 688214, null, 8, , , , , , 2056, null, <p>sudah lapor dan konfirmasi dr. Eko, Sp.NÂ </p><p>advis:Â </p>..., null, null, 2056, 2025-02-09 18:31:43, null, null, null, null, null, null, null, 0, , , , Pasien datang dengan keluhan nyeri kepala sejak 1 minggu smrs, m..., Ku TSS
GCS 15 E4M6V5
TD: 128/66 mmHg
HR: 112bpm, reguler, kua..., Cephalgia TTH
, Terapi IGD
-IVFD
-Inj Ranitidine 1amp
-Inj Ketorolac 1amp
-D..., null, null, null, null). - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('688214', NULL, '8', '', '', '', '', '', '', '', '', 'Pasien datang dengan keluhan nyeri kepala sejak 1 minggu smrs, memberat hari ini VAS 7/10. Nyeri kepala nyut nyutan (+), mual (+), muntah (-), nyeri ulu hati (+), lemas (+), lemah AG (-), nyeri dada (-), BAK dan BAB dbn 

RPD: stroke (+), htn (+), dm (-), tb (-), asma (-) 
RPO: OMEprazole 1x20 mg, Bexicom 1x1, AMLOdipin 1x10 , Atorvastatin 1x20 mg, Eperison HCl 2x50 mg, Aspilet 1x 80 mg, Candesartan 1x16 mg 
Riw alergi: tidak ada
', 'Ku TSS
GCS 15 E4M6V5
TD: 128/66 mmHg
HR: 112bpm, reguler, kuat angkat  
RR : 22bpm 
Suhu : 36.5C
Spo2 : 99% on RA

Mata :CA -/-, SI -/
Leher : pembesaran KGB (-),  JVP normal
Mulut : mukosa kering (-),  sianosis (-)  
Paru: vbs +/+, rh-/-, wh -/- retraksi (-)
Jantung : S1S2 reguler, m(-), g(-) 
Abdomen : supel, bu dbn, nte (-)
Eks : akral hangat, crt&lt;2s, edema -/-', 'Cephalgia TTH
', 'Terapi IGD
-IVFD
-Inj Ranitidine 1amp
-Inj Ketorolac 1amp
-DR
-EKG ', '2056', NULL, '<p>sudah lapor dan konfirmasi dr. Eko, Sp.NÂ </p><p>advis:Â </p><p><br></p>', NULL, '2056', 0, NULL, '2025-02-09 18:31:43')
ERROR - 2025-02-09 18:40:01 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/views/js.php 1507
ERROR - 2025-02-09 18:41:59 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-02-09 18:53:04 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 18:53:04 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-09 18:53:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...&quot;) VALUES (5533852, '212', 862.8, '1', '1.00', NULL, 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 18:53:09 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...") VALUES (5533852, '212', 862.8, '1', '1.00', NULL, 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (5533852, '212', 862.8, '1', '1.00', NULL, 'null')
ERROR - 2025-02-09 18:53:19 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 18:53:19 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-09 18:54:39 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 18:54:39 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-09 18:55:11 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 18:55:11 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-09 18:55:16 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...VALUES (5533860, '2447', 8163.6, '30', '1.00', 'Ya', 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 18:55:16 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...VALUES (5533860, '2447', 8163.6, '30', '1.00', 'Ya', 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (5533860, '2447', 8163.6, '30', '1.00', 'Ya', 'null')
ERROR - 2025-02-09 18:55:33 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 18:55:33 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-09 18:55:53 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 18:55:53 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-09 19:05:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 19:05:51 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-09 19:05:58 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...LUES (5533879, '527', 169.164, '500', '10.00', 'Ya', 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 19:05:58 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...LUES (5533879, '527', 169.164, '500', '10.00', 'Ya', 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (5533879, '527', 169.164, '500', '10.00', 'Ya', 'null')
ERROR - 2025-02-09 19:06:05 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 19:06:05 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-09 19:06:13 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 19:06:13 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-09 19:07:45 --> 404 Page Not Found --> /index
ERROR - 2025-02-09 19:10:01 --> 404 Page Not Found --> /index
ERROR - 2025-02-09 19:20:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 19:20:09 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-09 19:20:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...&quot;) VALUES (5533918, '212', 862.8, '1', '1.00', NULL, 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 19:20:15 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...") VALUES (5533918, '212', 862.8, '1', '1.00', NULL, 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (5533918, '212', 862.8, '1', '1.00', NULL, 'null')
ERROR - 2025-02-09 19:20:27 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 19:20:27 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-09 19:21:41 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-02-09 19:29:24 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-02-09 19:45:49 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 19:45:49 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-09 19:46:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...s&quot;) VALUES (5533962, '704', 1680, '4', '1.00', 'Ya', 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 19:46:15 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...s") VALUES (5533962, '704', 1680, '4', '1.00', 'Ya', 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (5533962, '704', 1680, '4', '1.00', 'Ya', 'null')
ERROR - 2025-02-09 19:46:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 19:46:36 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-09 19:47:22 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 19:47:22 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-09 19:47:27 --> 404 Page Not Found --> /index
ERROR - 2025-02-09 19:47:29 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 19:47:29 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-09 19:49:23 --> 404 Page Not Found --> /index
ERROR - 2025-02-09 19:49:31 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 19:49:31 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-09 19:49:35 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...UES (5534005, '709', 10197.792, '500', '1.00', 'Ya', 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 19:49:35 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...UES (5534005, '709', 10197.792, '500', '1.00', 'Ya', 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (5534005, '709', 10197.792, '500', '1.00', 'Ya', 'null')
ERROR - 2025-02-09 19:49:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 19:49:52 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-09 19:50:13 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 19:50:13 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-09 19:50:38 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 19:50:38 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-09 19:55:10 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-02-09 19:55:11 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-02-09 19:55:11 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-02-09 19:55:13 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-02-09 19:55:13 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-02-09 20:02:49 --> 404 Page Not Found --> /index
ERROR - 2025-02-09 20:12:01 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 20:12:01 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-09 20:13:37 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 20:13:37 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-09 20:13:49 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...s&quot;) VALUES (5534070, '556', 4200, '5', '1.00', 'Ya', 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 20:13:49 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...s") VALUES (5534070, '556', 4200, '5', '1.00', 'Ya', 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (5534070, '556', 4200, '5', '1.00', 'Ya', 'null')
ERROR - 2025-02-09 20:14:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 20:14:15 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-09 20:14:25 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 20:14:25 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-09 20:16:26 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 20:16:26 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-09 20:16:34 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 20:16:34 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-09 20:45:54 --> 404 Page Not Found --> /index
ERROR - 2025-02-09 20:46:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 20:46:09 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-09 20:49:25 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 20:49:25 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-02-09 20:49:25 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 20:49:25 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-02-09 20:53:21 --> 404 Page Not Found --> /index
ERROR - 2025-02-09 20:56:16 --> 404 Page Not Found --> /index
ERROR - 2025-02-09 21:04:23 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-02-09 21:04:23 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-02-09 21:18:47 --> 404 Page Not Found --> /index
ERROR - 2025-02-09 14:19:50 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_sep_idx&quot;
DETAIL:  Key (no_sep)=(000) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 14:19:50 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_sep_idx"
DETAIL:  Key (no_sep)=(000) already exists. - Invalid query: UPDATE "sm_pendaftaran" SET "no_sep" = '000', "id_rujukan" = '21339'
WHERE "id" = '635078'
ERROR - 2025-02-09 21:21:21 --> 404 Page Not Found --> /index
ERROR - 2025-02-09 21:30:49 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-02-09 21:34:53 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;id_layanan_pendaftaran&quot;
LINE 8:             where g.id_pendaftaran = 'id_layanan_pendaftaran...
                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 21:34:53 --> Query error: ERROR:  invalid input syntax for type integer: "id_layanan_pendaftaran"
LINE 8:             where g.id_pendaftaran = 'id_layanan_pendaftaran...
                                             ^ - Invalid query: 
            select g.*, pg.nama as petugas, pd.nama as dokter, us.nama users
            from sm_gizi_anak as g
            left join sm_pegawai as pg on pg.id = g.ga_petugas
            LEFT JOIN sm_tenaga_medis as tm on tm.id = g.ga_dokter
            LEFT JOIN sm_pegawai as pd on pd.id = tm.id_pegawai
            LEFT JOIN sm_pegawai as us on us.id = g.id_users
            where g.id_pendaftaran = 'id_layanan_pendaftaran'
            order by 
            case 
            when g.updated_at is not null then g.updated_at
            else g.created_at
            end desc
        
ERROR - 2025-02-09 21:34:53 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;id_layanan_pendaftaran&quot;
LINE 7:             where d.id_pendaftaran = 'id_layanan_pendaftaran...
                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 21:34:53 --> Query error: ERROR:  invalid input syntax for type integer: "id_layanan_pendaftaran"
LINE 7:             where d.id_pendaftaran = 'id_layanan_pendaftaran...
                                             ^ - Invalid query: 
            select d.*, pg.nama as petugas, pd.nama as dokter
            from sm_gizi_dietetik as d
            left join sm_pegawai as pg on pg.id = d.gd_petugas
            LEFT JOIN sm_tenaga_medis as tm on tm.id = d.gd_dokter
            LEFT JOIN sm_pegawai as pd on pd.id = tm.id_pegawai
            where d.id_pendaftaran = 'id_layanan_pendaftaran'
            order by 
            case 
            when d.updated_at is not null then d.updated_at
            else d.created_at
            end desc
        
ERROR - 2025-02-09 21:34:53 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;id_layanan_pendaftaran&quot;
LINE 8:             where k.id_pendaftaran = 'id_layanan_pendaftaran...
                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 21:34:53 --> Query error: ERROR:  invalid input syntax for type integer: "id_layanan_pendaftaran"
LINE 8:             where k.id_pendaftaran = 'id_layanan_pendaftaran...
                                             ^ - Invalid query: 
            select k.*, pg.nama as petugas, pd.nama as dokter, us.nama users
            from sm_konsultasi_gizi as k
            left join sm_pegawai as pg on pg.id = k.kg_petugas
            left join sm_tenaga_medis as tm on tm.id = k.kg_dokter
            left join sm_pegawai as pd on pd.id = tm.id_pegawai
            LEFT JOIN sm_pegawai as us on us.id = k.id_users
            where k.id_pendaftaran = 'id_layanan_pendaftaran'
            order by 
            case 
            when k.updated_at is not null then k.updated_at
            else k.created_at
            end desc
        
ERROR - 2025-02-09 21:35:26 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;7.5&quot;
LINE 1: ...VALUES ('634410', '687507', '1683', '2025-02-09', '7.5', NUL...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 21:35:26 --> Query error: ERROR:  invalid input syntax for type smallint: "7.5"
LINE 1: ...VALUES ('634410', '687507', '1683', '2025-02-09', '7.5', NUL...
                                                             ^ - Invalid query: INSERT INTO "sm_monitoring_pasien_c" ("id_pendaftaran", "id_layanan_pendaftaran", "id_user", "tgl_mpp", "oral_mpp", "ngt_mpp", "paranteral_mpp", "paranteral_mppp", "produk_mpp", "input_mpp", "urin_mpp", "bab_mpp", "gastrik_mpp", "wsd_mpp", "iwl_mpp", "output_mpp", "blance_cairan_mpp", "tdarah_mpp", "saturasi_mppp", "toksigen_mpp", "skesadaran_mpp", "kategori_mpp", "pengawasan_mpp", "diit_mpp", "jam_mpp", "perawat_mpp", "created_at") VALUES ('634410', '687507', '1683', '2025-02-09', '7.5', NULL, NULL, NULL, NULL, '7.5', NULL, NULL, NULL, NULL, NULL, '0', '7.5', NULL, '96', '0.3', 'CM', 'K', '+', 'PASI', '0:00', '287', '2025-02-09 21:29:30')
ERROR - 2025-02-09 21:35:33 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;7.5&quot;
LINE 1: ...VALUES ('634410', '687507', '1683', '2025-02-09', '7.5', NUL...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 21:35:33 --> Query error: ERROR:  invalid input syntax for type smallint: "7.5"
LINE 1: ...VALUES ('634410', '687507', '1683', '2025-02-09', '7.5', NUL...
                                                             ^ - Invalid query: INSERT INTO "sm_monitoring_pasien_c" ("id_pendaftaran", "id_layanan_pendaftaran", "id_user", "tgl_mpp", "oral_mpp", "ngt_mpp", "paranteral_mpp", "paranteral_mppp", "produk_mpp", "input_mpp", "urin_mpp", "bab_mpp", "gastrik_mpp", "wsd_mpp", "iwl_mpp", "output_mpp", "blance_cairan_mpp", "tdarah_mpp", "saturasi_mppp", "toksigen_mpp", "skesadaran_mpp", "kategori_mpp", "pengawasan_mpp", "diit_mpp", "jam_mpp", "perawat_mpp", "created_at") VALUES ('634410', '687507', '1683', '2025-02-09', '7.5', NULL, NULL, NULL, NULL, '7.5', NULL, NULL, NULL, NULL, NULL, '0', '7.5', NULL, '96', '0.3', 'CM', 'K', '+', 'PASI', '0:00', '287', '2025-02-09 21:29:30')
ERROR - 2025-02-09 21:36:24 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;7.5&quot;
LINE 1: ...VALUES ('634410', '687507', '1683', '2025-02-09', '7.5', NUL...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 21:36:24 --> Query error: ERROR:  invalid input syntax for type smallint: "7.5"
LINE 1: ...VALUES ('634410', '687507', '1683', '2025-02-09', '7.5', NUL...
                                                             ^ - Invalid query: INSERT INTO "sm_monitoring_pasien_c" ("id_pendaftaran", "id_layanan_pendaftaran", "id_user", "tgl_mpp", "oral_mpp", "ngt_mpp", "paranteral_mpp", "paranteral_mppp", "produk_mpp", "input_mpp", "urin_mpp", "bab_mpp", "gastrik_mpp", "wsd_mpp", "iwl_mpp", "output_mpp", "blance_cairan_mpp", "tdarah_mpp", "saturasi_mppp", "toksigen_mpp", "skesadaran_mpp", "kategori_mpp", "pengawasan_mpp", "diit_mpp", "jam_mpp", "perawat_mpp", "created_at") VALUES ('634410', '687507', '1683', '2025-02-09', '7.5', NULL, NULL, NULL, NULL, '7.5', NULL, NULL, NULL, NULL, NULL, '0', '7.5', NULL, '96', '0.3', 'CM', 'K', '+', 'PASI', '0:00', '287', '2025-02-09 21:29:30')
ERROR - 2025-02-09 21:38:37 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-02-09 21:38:37 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-02-09 21:41:54 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-02-09 21:42:00 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-02-09 21:46:42 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...erian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES (784788, '1', '', '', '3...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 21:46:42 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...erian_5", "jam_pemberian_6") VALUES (784788, '1', '', '', '3...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (784788, '1', '', '', '3 x Sehari 5 ml', '(1 sendok obat)', 'null', '0', '', '0', 'MORN, NOON, EVE', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-02-09 21:50:18 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 21:50:18 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-09 21:54:35 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-02-09 21:54:35 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-02-09 21:54:45 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 21:54:45 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-09 21:55:19 --> 404 Page Not Found --> /index
ERROR - 2025-02-09 21:58:47 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 21:58:47 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-09 21:59:09 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-02-09 21:59:09 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-02-09 21:59:23 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 21:59:23 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-09 21:59:54 --> 404 Page Not Found --> /index
ERROR - 2025-02-09 22:01:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 22:01:15 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-09 22:03:13 --> 404 Page Not Found --> /index
ERROR - 2025-02-09 22:03:44 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 22:03:44 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-09 22:23:35 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 22:23:35 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-09 22:35:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xcc 0x3d /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 22:35:40 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xcc 0x3d - Invalid query: INSERT INTO "sm_catatan_operan_perawat_malam" ("id_layanan_pendaftaran", "dokter_dpjp_malam", "konsulen_malam", "tanggal_waktu_malam", "diagnosa_keperawatan_malam", "infus_malam", "rencana_tindakan_malam", "perawat_mengover_malam", "perawat_menerima_malam", "id_users") VALUES ('687501', '674', NULL, '2025-02-09 20:30:00', 'gangguan ventilasi sponta, risiko ketidakseimbangan cairan ', 'D 5(332)+nacl 3 perse(8,4)+kcl(2)+ca glu(2)=14 cc/jam, dobutamin 63,9mg in nacl 0,9Ì=0,5cc/menit, fentanyl 1mcg/kg/jam -> 0,2ml/jam.', 'P. A/C rate 45 pip 17/5 i:e 1:3 fio2 60%,  intake ASI 2ml/2jam -> tunda, th/ tambahan ranitidin 1mg/12jam,  foto therapy 1x24 jam s/d tanggal 10/02/2025 jam 17:00 wib,  R/ koreksi bicnat 4 mg in 16 cc nacl 0,9% selama 2 jam, R/ besok pagi cek ulang Dr, AGD, GDS.', '276', '277', '1685')
ERROR - 2025-02-09 22:35:45 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xcc 0x3d /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 22:35:45 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xcc 0x3d - Invalid query: INSERT INTO "sm_catatan_operan_perawat_malam" ("id_layanan_pendaftaran", "dokter_dpjp_malam", "konsulen_malam", "tanggal_waktu_malam", "diagnosa_keperawatan_malam", "infus_malam", "rencana_tindakan_malam", "perawat_mengover_malam", "perawat_menerima_malam", "id_users") VALUES ('687501', '674', NULL, '2025-02-09 20:30:00', 'gangguan ventilasi sponta, risiko ketidakseimbangan cairan ', 'D 5(332)+nacl 3 perse(8,4)+kcl(2)+ca glu(2)=14 cc/jam, dobutamin 63,9mg in nacl 0,9Ì=0,5cc/menit, fentanyl 1mcg/kg/jam -> 0,2ml/jam.', 'P. A/C rate 45 pip 17/5 i:e 1:3 fio2 60%,  intake ASI 2ml/2jam -> tunda, th/ tambahan ranitidin 1mg/12jam,  foto therapy 1x24 jam s/d tanggal 10/02/2025 jam 17:00 wib,  R/ koreksi bicnat 4 mg in 16 cc nacl 0,9% selama 2 jam, R/ besok pagi cek ulang Dr, AGD, GDS.', '276', '277', '1685')
ERROR - 2025-02-09 22:36:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xcc 0x3d /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 22:36:40 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xcc 0x3d - Invalid query: INSERT INTO "sm_catatan_operan_perawat_malam" ("id_layanan_pendaftaran", "dokter_dpjp_malam", "konsulen_malam", "tanggal_waktu_malam", "diagnosa_keperawatan_malam", "infus_malam", "rencana_tindakan_malam", "perawat_mengover_malam", "perawat_menerima_malam", "id_users") VALUES ('687501', '674', NULL, '2025-02-09 20:30:00', 'gangguan ventilasi sponta, risiko ketidakseimbangan cairan ', 'D 5(332)+nacl 3 perse(8,4)+kcl(2)+ca glu(2)=14 cc/jam, dobutamin 63,9mg in nacl 0,9Ì=0,5cc/menit, fentanyl 1mcg/kg/jam -> 0,2ml/jam.', 'P. A/C rate 45 pip 17/5 i:e 1:3 fio2 60%,  intake ASI 2ml/2jam -> tunda, th/ tambahan ranitidin 1mg/12jam,  foto therapy 1x24 jam s/d tanggal 10/02/2025 jam 17:00 wib,  R/ koreksi bicnat 4 mg in 16 cc nacl 0,9% selama 2 jam, R/ besok pagi cek ulang Dr, AGD, GDS.', '276', '277', '1685')
ERROR - 2025-02-09 22:38:18 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xcc 0x3d /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 22:38:18 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xcc 0x3d - Invalid query: INSERT INTO "sm_catatan_operan_perawat_malam" ("id_layanan_pendaftaran", "dokter_dpjp_malam", "konsulen_malam", "tanggal_waktu_malam", "diagnosa_keperawatan_malam", "infus_malam", "rencana_tindakan_malam", "perawat_mengover_malam", "perawat_menerima_malam", "id_users") VALUES ('687501', '674', NULL, '2025-02-09 20:30:00', 'gangguan ventilasi sponta, risiko ketidakseimbangan cairan', 'D 5(332)+nacl 3 perse(8,4)+kcl(2)+ca glu(2)=14 cc/jam, dobutamin 63,9mg in nacl 0,9Ì=0,5cc/menit, fentanyl 1mcg/kg/jam -> 0,2ml/jam.', 'P. A/C rate 45 pip 17/5 i:e 1:3 fio2 60%, intake ASI 2ml/2jam -> tunda, th/ tambahan ranitidin 1mg/12jam, foto therapy 1x24 jam s/d tanggal 10/02/2025 jam 17:00 wib, R/ koreksi bicnat 4 mg in 16 cc nacl 0,9% selama 2 jam, R/ besok pagi cek ulang Dr, AGD, GDS.', '276', '277', '1685')
ERROR - 2025-02-09 22:38:29 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xcc 0x3d /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 22:38:29 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xcc 0x3d - Invalid query: INSERT INTO "sm_catatan_operan_perawat_malam" ("id_layanan_pendaftaran", "dokter_dpjp_malam", "konsulen_malam", "tanggal_waktu_malam", "diagnosa_keperawatan_malam", "infus_malam", "rencana_tindakan_malam", "perawat_mengover_malam", "perawat_menerima_malam", "id_users") VALUES ('687501', '674', NULL, '2025-02-09 20:30:00', 'gangguan ventilasi sponta, risiko ketidakseimbangan cairan', 'D 5(332)+nacl 3 perse(8,4)+kcl(2)+ca glu(2)=14 cc/jam, dobutamin 63,9mg in nacl 0,9Ì=0,5cc/menit, fentanyl 1mcg/kg/jam -> 0,2ml/jam.', 'P. A/C rate 45 pip 17/5 i:e 1:3 fio2 60%, intake ASI 2ml/2jam -> tunda, th/ tambahan ranitidin 1mg/12jam, foto therapy 1x24 jam s/d tanggal 10/02/2025 jam 17:00 wib, R/ koreksi bicnat 4 mg in 16 cc nacl 0,9% selama 2 jam, R/ besok pagi cek ulang Dr, AGD, GDS.', '276', '277', '1685')
ERROR - 2025-02-09 22:38:45 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xcc 0x3d /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 22:38:45 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xcc 0x3d - Invalid query: INSERT INTO "sm_catatan_operan_perawat_malam" ("id_layanan_pendaftaran", "dokter_dpjp_malam", "konsulen_malam", "tanggal_waktu_malam", "diagnosa_keperawatan_malam", "infus_malam", "rencana_tindakan_malam", "perawat_mengover_malam", "perawat_menerima_malam", "id_users") VALUES ('687501', '674', NULL, '2025-02-09 20:30:00', 'gangguan ventilasi sponta, risiko ketidakseimbangan cairan', 'D 5(332)+nacl 3 perse(8,4)+kcl(2)+ca glu(2)=14 cc/jam, dobutamin 63,9mg in nacl 0,9Ì=0,5cc/menit, fentanyl 1mcg/kg/jam -> 0,2ml/jam.', 'P. A/C rate 45 pip 17/5 i:e 1:3 fio2 60%, intake ASI 2ml/2jam -> tunda, th/ tambahan ranitidin 1mg/12jam, foto therapy 1x24 jam s/d tanggal 10/02/2025 jam 17:00 wib, R/ koreksi bicnat 4 mg in 16 cc nacl 0,9% selama 2 jam, R/ besok pagi cek ulang Dr, AGD, GDS.', '276', '277', '1685')
ERROR - 2025-02-09 22:56:19 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 22:56:19 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-09 22:56:37 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 22:56:37 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-09 22:57:44 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 22:57:44 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-09 22:58:34 --> 404 Page Not Found --> /index
ERROR - 2025-02-09 22:58:58 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 22:58:58 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-09 23:00:49 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 23:00:49 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-09 23:00:54 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 23:00:54 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-09 23:01:00 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 23:01:00 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-09 23:06:34 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 23:06:34 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-09 23:06:41 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 23:06:41 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-09 23:06:47 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 23:06:47 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-09 23:10:33 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 23:10:33 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-09 23:10:50 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 23:10:50 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-02-09 23:22:32 --> 404 Page Not Found --> /index
ERROR - 2025-02-09 23:27:54 --> 404 Page Not Found --> /index
ERROR - 2025-02-09 23:43:38 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/views/js.php 1507
ERROR - 2025-02-09 23:43:44 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/views/js.php 1507
ERROR - 2025-02-09 23:43:44 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/views/js.php 1507
ERROR - 2025-02-09 23:47:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-02-09 23:47:52 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
