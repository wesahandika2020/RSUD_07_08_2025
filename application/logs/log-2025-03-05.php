<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2025-03-05 00:00:17 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-03-05 00:00:18 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-03-05 00:00:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 00:00:40 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 00:01:58 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 00:01:58 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 00:02:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 00:02:15 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 00:15:26 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;no_kab&quot;
LINE 3: WHERE &quot;NO_PROP&quot; = 'no_kab'
                          ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 00:15:26 --> Query error: ERROR:  invalid input syntax for type integer: "no_kab"
LINE 3: WHERE "NO_PROP" = 'no_kab'
                          ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = 'no_kab'
AND "NO_KAB" IS NULL
ORDER BY "NAMA_KEC"
ERROR - 2025-03-05 00:28:56 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...) VALUES (5709440, '725', 8580, '100', '1.00', 'Ya', 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 00:28:56 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...) VALUES (5709440, '725', 8580, '100', '1.00', 'Ya', 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (5709440, '725', 8580, '100', '1.00', 'Ya', 'null')
ERROR - 2025-03-05 00:29:31 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...ian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES ('801085', '3', '', '', '3...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 00:29:31 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...ian_5", "jam_pemberian_6") VALUES ('801085', '3', '', '', '3...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES ('801085', '3', '', '', '3 X SEHARI 10 ML', '(2 SENDOK OBAT )', 'PC', '0', '', '0', '', 'LAMBUNG 1 JAM SEBELUM MAKAN', '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-03-05 01:16:27 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 01:20:42 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type date: &quot;&quot;
LINE 1: ..., NULL, NULL, NULL, NULL, '1', '2025-03-04', '1', '', '1', '...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 01:20:42 --> Query error: ERROR:  invalid input syntax for type date: ""
LINE 1: ..., NULL, NULL, NULL, NULL, '1', '2025-03-04', '1', '', '1', '...
                                                             ^ - Invalid query: INSERT INTO "sm_transfer_pasien_intra" ("id_layanan_pendaftaran", "tpi_tanggal_masuk", "tpi_tanggal_pindah", "tpi_ruang_asal", "tpi_ruang_tujuan", "tpi_diagnosis_utama", "tpi_diagnosis_sekunder", "tpi_dpjp", "tpi_kewaspadaan", "tpi_riwayat_kewaspadan", "tpi_indikasi_masuk_rs", "tpi_riwayat_kesehatan", "tpi_pf_composmentis", "tpi_pf_apatis", "tpi_pf_samnolen", "tpi_pf_sopor", "tpi_pf_koma", "tpi_pf_gcs_e", "tpi_pf_gcs_m", "tpi_pf_gcs_v", "tpi_pf_gcs_total", "tpi_pf_afgar_score", "tpi_pf_djj", "tpi_pf_pupil_1", "tpi_pf_pupil_2", "tpi_pf_pupil_3", "tpi_pf_pupil_4", "tpi_pf_cdl", "tpi_pf_tanggal_cdl", "tpi_pf_tensi_sis", "tpi_pf_tensi_dis", "tpi_pf_suhu", "tpi_pf_nadi", "tpi_pf_nafas", "tpi_pf_alergi", "tpi_pf_riwayat_alergi", "tpi_pf_skala_nyeri_pasien", "tpi_pf_riwayat_nyeri_pasien", "tpi_pf_resiko_jatuh_pasien", "tpi_pf_riwayat_resiko_jatuh_pasien", "tpi_pf_mobilisasi_pasien", "tpi_pf_mobilisasi_pasien_transfer", "tpi_pf_resiko_dekubitus_pasien", "tpi_pf_riwayat_resiko_dekubitus_pasien", "tpi_pf_infus", "tpi_pf_tanggal_infus", "tpi_pf_ngt_pasien", "tpi_pf_tanggal_ngt", "tpi_pf_ett", "tpi_pf_tanggal_ett", "tpi_pf_cvc", "tpi_pf_tanggal_cvc", "tpi_pf_dc", "tpi_pf_tanggal_dc", "tpi_pf_lain", "tpi_pf_tanggal_lain", "tpi_pf_oksigen", "tpi_pf_keterangan_oksigen", "tpi_pf_pump", "tpi_pf_bidai", "tpi_pt_infus", "tpi_pt_obat", "tpi_pp_labolatorium", "tpi_pp_ket_labolatorium", "tpi_pp_radiologi", "tpi_pp_ket_radiologi", "tpi_pp_lainnya", "tpi_pp_ket_lainnya", "tpi_tm_tindakan_medis", "tpi_tm_rencana_tindakan", "tpi_kp_sebelum_composmentis", "tpi_kp_sebelum_apatis", "tpi_kp_sebelum_samnolen", "tpi_kp_sebelum_sopor", "tpi_kp_sebelum_koma", "tpi_kp_sebelum_gcs_e", "tpi_kp_sebelum_gcs_m", "tpi_kp_sebelum_gcs_v", "tpi_kp_sebelum_gcs_total", "tpi_kp_sebelum_catatan", "tpi_kp_perjalanan_masalah_selama_trasnfer", "tpi_kp_perjalanan_penanganan_masalah", "tpi_kp_sudah_composmentis", "tpi_kp_sudah_apatis", "tpi_kp_sudah_samnolen", "tpi_kp_sudah_sopor", "tpi_kp_sudah_koma", "tpi_kp_sudah_gcs_e", "tpi_kp_sudah_gcs_m", "tpi_kp_sudah_gcs_v", "tpi_kp_sudah_gcs_total", "tpi_kp_sudah_tensi_sis", "tpi_kp_sudah_tensi_dis", "tpi_kp_sudah_nadi", "tpi_kp_sudah_pernafasan", "tpi_kp_sudah_suhu", "tpi_kp_sudah_kondisi_pasien", "tpi_kp_sudah_nama_obat", "tpi_kp_sudah_ket_nama_obat", "tpi_kp_sudah_pemeriksaan_penunjang", "tpi_kp_sudah_ket_pemeriksaan_penunjang", "tpi_kp_sudah_catatan_penting", "tpi_kp_waktu_ttd_petugas_tf", "tpi_kp_waktu_ttd_petugas_penerima", "tpi_kp_petugas_tansfer", "tpi_kp_petugas_terima_transfer", "tpi_kp_ttd_petugas_transfer", "tpi_kp_ttd_petugas_terima_transfer", "tpi_st_sebelum_composmentis", "tpi_st_sebelum_apatis", "tpi_st_sebelum_samnolen", "tpi_st_sebelum_sopor", "tpi_st_sebelum_koma", "tpi_st_sebelum_gcs_e", "tpi_st_sebelum_gcs_m", "tpi_st_sebelum_gcs_v", "tpi_st_sebelum_gcs_total", "tpi_st_sebelum_tensi_sis", "tpi_st_sebelum_tensi_dis", "tpi_st_sebelum_nadi", "tpi_st_sebelum_pernafasan", "tpi_st_sebelum_suhu", "tpi_st_sebelum_catatan", "tpi_st_perjalanan_masalah_selama_transfer", "tpi_st_perjalanan_penanganan_masalah", "tpi_st_sudah_composmentis", "tpi_st_sudah_apatis", "tpi_st_sudah_samnolen", "tpi_st_sudah_sopor", "tpi_st_sudah_koma", "tpi_st_sudah_gcs_e", "tpi_st_sudah_gcs_m", "tpi_st_sudah_gcs_v", "tpi_st_sudah_gcs_total", "tpi_st_sudah_tensi_sis", "tpi_st_sudah_tensi_dis", "tpi_st_sudah_nadi", "tpi_st_sudah_pernafasan", "tpi_st_sudah_suhu", "tpi_st_sudah_kondisi_pasien", "tpi_st_sudah_nama_obat", "tpi_st_sudah_ket_nama_obat", "tpi_st_sudah_pemeriksaan_penunjang", "tpi_st_sudah_ket_pemeriksaan_penunjang", "tpi_st_sudah_catatan_penting", "tpi_st_waktu_ttd_petugas_tf", "tpi_st_waktu_ttd_petugas_penerima", "tpi_st_petugas_tansfer", "tpi_st_petugas_terima_transfer", "tpi_st_ttd_petugas_transfer", "tpi_st_ttd_petugas_terima_transfer") VALUES ('704125', '2025-03-04 23:00', '2025-03-05 01:30', 'IGD. MATERNAL', 'MERANTI', 'G1P0A0 HAMIL 34 MINGGU DENGAN PPI', NULL, '45', '1', NULL, 'mules-mules', NULL, '1', NULL, NULL, NULL, NULL, '4', '6', '5', '15', '-', '155', '2', NULL, '2', NULL, NULL, NULL, '168', '100', '36.5', '87', '21', '0', NULL, '1', 'SEDANG', '1', 'TINGGI', '2', '2', '0', NULL, '1', '2025-03-04', NULL, NULL, NULL, NULL, NULL, NULL, '1', '2025-03-04', '1', '', '1', '3', NULL, NULL, 'RL  +MGSO 4 PUKUL 23.15', 'DOPAMET500 MG PUKUL 23.30 WIB 
ADALAT OROS C30 MG PUKUL 23.35
MGSO 4 20 % BOLUS PUKUL 23.10 DEXAMETASONE 2X1 PUKUL 23.40 WIB 
RL+2 AMPUL PROTERINE PUKUL 01.10 WIB 
', '1', 'DR, GDS', NULL, NULL, NULL, NULL, '-PASANG INFUS 2 LINE
-PASANG DC
-CTG
-VT', 'PINDAH RUANG MERANTI ', '1', NULL, NULL, NULL, NULL, '4', '6', '5', '15', 'TERAPI LANJUT ASFOL, TTD DAN KALSIUM
OBSERVASI HIS', '-', '-', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, '100', NULL, NULL, NULL, '1', '1', NULL, '1', NULL, NULL, '2025-03-05 01:17', '2025-03-05 01:17', '613', '295', '1', '1', '1', NULL, NULL, NULL, NULL, '4', '6', '5', '15', '168', '100', '87', '21', '36.5', '-', '-', '-', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-03-05 01:19', '2025-03-05 01:19', '613', '295', '1', '1')
ERROR - 2025-03-05 01:21:07 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type date: &quot;&quot;
LINE 1: ..., NULL, NULL, NULL, NULL, '1', '2025-03-04', '1', '', '1', '...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 01:21:07 --> Query error: ERROR:  invalid input syntax for type date: ""
LINE 1: ..., NULL, NULL, NULL, NULL, '1', '2025-03-04', '1', '', '1', '...
                                                             ^ - Invalid query: INSERT INTO "sm_transfer_pasien_intra" ("id_layanan_pendaftaran", "tpi_tanggal_masuk", "tpi_tanggal_pindah", "tpi_ruang_asal", "tpi_ruang_tujuan", "tpi_diagnosis_utama", "tpi_diagnosis_sekunder", "tpi_dpjp", "tpi_kewaspadaan", "tpi_riwayat_kewaspadan", "tpi_indikasi_masuk_rs", "tpi_riwayat_kesehatan", "tpi_pf_composmentis", "tpi_pf_apatis", "tpi_pf_samnolen", "tpi_pf_sopor", "tpi_pf_koma", "tpi_pf_gcs_e", "tpi_pf_gcs_m", "tpi_pf_gcs_v", "tpi_pf_gcs_total", "tpi_pf_afgar_score", "tpi_pf_djj", "tpi_pf_pupil_1", "tpi_pf_pupil_2", "tpi_pf_pupil_3", "tpi_pf_pupil_4", "tpi_pf_cdl", "tpi_pf_tanggal_cdl", "tpi_pf_tensi_sis", "tpi_pf_tensi_dis", "tpi_pf_suhu", "tpi_pf_nadi", "tpi_pf_nafas", "tpi_pf_alergi", "tpi_pf_riwayat_alergi", "tpi_pf_skala_nyeri_pasien", "tpi_pf_riwayat_nyeri_pasien", "tpi_pf_resiko_jatuh_pasien", "tpi_pf_riwayat_resiko_jatuh_pasien", "tpi_pf_mobilisasi_pasien", "tpi_pf_mobilisasi_pasien_transfer", "tpi_pf_resiko_dekubitus_pasien", "tpi_pf_riwayat_resiko_dekubitus_pasien", "tpi_pf_infus", "tpi_pf_tanggal_infus", "tpi_pf_ngt_pasien", "tpi_pf_tanggal_ngt", "tpi_pf_ett", "tpi_pf_tanggal_ett", "tpi_pf_cvc", "tpi_pf_tanggal_cvc", "tpi_pf_dc", "tpi_pf_tanggal_dc", "tpi_pf_lain", "tpi_pf_tanggal_lain", "tpi_pf_oksigen", "tpi_pf_keterangan_oksigen", "tpi_pf_pump", "tpi_pf_bidai", "tpi_pt_infus", "tpi_pt_obat", "tpi_pp_labolatorium", "tpi_pp_ket_labolatorium", "tpi_pp_radiologi", "tpi_pp_ket_radiologi", "tpi_pp_lainnya", "tpi_pp_ket_lainnya", "tpi_tm_tindakan_medis", "tpi_tm_rencana_tindakan", "tpi_kp_sebelum_composmentis", "tpi_kp_sebelum_apatis", "tpi_kp_sebelum_samnolen", "tpi_kp_sebelum_sopor", "tpi_kp_sebelum_koma", "tpi_kp_sebelum_gcs_e", "tpi_kp_sebelum_gcs_m", "tpi_kp_sebelum_gcs_v", "tpi_kp_sebelum_gcs_total", "tpi_kp_sebelum_catatan", "tpi_kp_perjalanan_masalah_selama_trasnfer", "tpi_kp_perjalanan_penanganan_masalah", "tpi_kp_sudah_composmentis", "tpi_kp_sudah_apatis", "tpi_kp_sudah_samnolen", "tpi_kp_sudah_sopor", "tpi_kp_sudah_koma", "tpi_kp_sudah_gcs_e", "tpi_kp_sudah_gcs_m", "tpi_kp_sudah_gcs_v", "tpi_kp_sudah_gcs_total", "tpi_kp_sudah_tensi_sis", "tpi_kp_sudah_tensi_dis", "tpi_kp_sudah_nadi", "tpi_kp_sudah_pernafasan", "tpi_kp_sudah_suhu", "tpi_kp_sudah_kondisi_pasien", "tpi_kp_sudah_nama_obat", "tpi_kp_sudah_ket_nama_obat", "tpi_kp_sudah_pemeriksaan_penunjang", "tpi_kp_sudah_ket_pemeriksaan_penunjang", "tpi_kp_sudah_catatan_penting", "tpi_kp_waktu_ttd_petugas_tf", "tpi_kp_waktu_ttd_petugas_penerima", "tpi_kp_petugas_tansfer", "tpi_kp_petugas_terima_transfer", "tpi_kp_ttd_petugas_transfer", "tpi_kp_ttd_petugas_terima_transfer", "tpi_st_sebelum_composmentis", "tpi_st_sebelum_apatis", "tpi_st_sebelum_samnolen", "tpi_st_sebelum_sopor", "tpi_st_sebelum_koma", "tpi_st_sebelum_gcs_e", "tpi_st_sebelum_gcs_m", "tpi_st_sebelum_gcs_v", "tpi_st_sebelum_gcs_total", "tpi_st_sebelum_tensi_sis", "tpi_st_sebelum_tensi_dis", "tpi_st_sebelum_nadi", "tpi_st_sebelum_pernafasan", "tpi_st_sebelum_suhu", "tpi_st_sebelum_catatan", "tpi_st_perjalanan_masalah_selama_transfer", "tpi_st_perjalanan_penanganan_masalah", "tpi_st_sudah_composmentis", "tpi_st_sudah_apatis", "tpi_st_sudah_samnolen", "tpi_st_sudah_sopor", "tpi_st_sudah_koma", "tpi_st_sudah_gcs_e", "tpi_st_sudah_gcs_m", "tpi_st_sudah_gcs_v", "tpi_st_sudah_gcs_total", "tpi_st_sudah_tensi_sis", "tpi_st_sudah_tensi_dis", "tpi_st_sudah_nadi", "tpi_st_sudah_pernafasan", "tpi_st_sudah_suhu", "tpi_st_sudah_kondisi_pasien", "tpi_st_sudah_nama_obat", "tpi_st_sudah_ket_nama_obat", "tpi_st_sudah_pemeriksaan_penunjang", "tpi_st_sudah_ket_pemeriksaan_penunjang", "tpi_st_sudah_catatan_penting", "tpi_st_waktu_ttd_petugas_tf", "tpi_st_waktu_ttd_petugas_penerima", "tpi_st_petugas_tansfer", "tpi_st_petugas_terima_transfer", "tpi_st_ttd_petugas_transfer", "tpi_st_ttd_petugas_terima_transfer") VALUES ('704125', '2025-03-04 23:00', '2025-03-05 01:30', 'IGD. MATERNAL', 'MERANTI', 'G1P0A0 HAMIL 34 MINGGU DENGAN PPI', NULL, '45', '1', NULL, 'mules-mules', NULL, '1', NULL, NULL, NULL, NULL, '4', '6', '5', '15', '-', '155', '2', NULL, '2', NULL, NULL, NULL, '168', '100', '36.5', '87', '21', '0', NULL, '1', 'SEDANG', '1', 'TINGGI', '2', '2', '0', NULL, '1', '2025-03-04', NULL, NULL, NULL, NULL, NULL, NULL, '1', '2025-03-04', '1', '', '1', '3', NULL, NULL, 'RL  +MGSO 4 PUKUL 23.15', 'DOPAMET500 MG PUKUL 23.30 WIB 
ADALAT OROS C30 MG PUKUL 23.35
MGSO 4 20 % BOLUS PUKUL 23.10 DEXAMETASONE 2X1 PUKUL 23.40 WIB 
RL+2 AMPUL PROTERINE PUKUL 01.10 WIB 
', '1', 'DR, GDS', NULL, NULL, NULL, NULL, '-PASANG INFUS 2 LINE
-PASANG DC
-CTG
-VT', 'PINDAH RUANG MERANTI ', '1', NULL, NULL, NULL, NULL, '4', '6', '5', '15', 'TERAPI LANJUT ASFOL, TTD DAN KALSIUM
OBSERVASI HIS', '-', '-', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, '100', NULL, NULL, NULL, '1', '1', NULL, '1', NULL, NULL, '2025-03-05 01:17', '2025-03-05 01:17', '613', '295', '1', '1', '1', NULL, NULL, NULL, NULL, '4', '6', '5', '15', '168', '100', '87', '21', '36.5', '-', '-', '-', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-03-05 01:19', '2025-03-05 01:19', '613', '295', '1', '1')
ERROR - 2025-03-05 01:25:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 01:25:12 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 01:25:23 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...UES (5709520, '1126', 18757.224, '12', '1.00', 'Ya', 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 01:25:23 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...UES (5709520, '1126', 18757.224, '12', '1.00', 'Ya', 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (5709520, '1126', 18757.224, '12', '1.00', 'Ya', 'null')
ERROR - 2025-03-05 01:27:02 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 01:27:02 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 01:33:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type date: &quot;&quot;
LINE 1: ..., NULL, NULL, NULL, NULL, '1', '2025-03-04', '1', '', '1', '...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 01:33:15 --> Query error: ERROR:  invalid input syntax for type date: ""
LINE 1: ..., NULL, NULL, NULL, NULL, '1', '2025-03-04', '1', '', '1', '...
                                                             ^ - Invalid query: INSERT INTO "sm_transfer_pasien_intra" ("id_layanan_pendaftaran", "tpi_tanggal_masuk", "tpi_tanggal_pindah", "tpi_ruang_asal", "tpi_ruang_tujuan", "tpi_diagnosis_utama", "tpi_diagnosis_sekunder", "tpi_dpjp", "tpi_kewaspadaan", "tpi_riwayat_kewaspadan", "tpi_indikasi_masuk_rs", "tpi_riwayat_kesehatan", "tpi_pf_composmentis", "tpi_pf_apatis", "tpi_pf_samnolen", "tpi_pf_sopor", "tpi_pf_koma", "tpi_pf_gcs_e", "tpi_pf_gcs_m", "tpi_pf_gcs_v", "tpi_pf_gcs_total", "tpi_pf_afgar_score", "tpi_pf_djj", "tpi_pf_pupil_1", "tpi_pf_pupil_2", "tpi_pf_pupil_3", "tpi_pf_pupil_4", "tpi_pf_cdl", "tpi_pf_tanggal_cdl", "tpi_pf_tensi_sis", "tpi_pf_tensi_dis", "tpi_pf_suhu", "tpi_pf_nadi", "tpi_pf_nafas", "tpi_pf_alergi", "tpi_pf_riwayat_alergi", "tpi_pf_skala_nyeri_pasien", "tpi_pf_riwayat_nyeri_pasien", "tpi_pf_resiko_jatuh_pasien", "tpi_pf_riwayat_resiko_jatuh_pasien", "tpi_pf_mobilisasi_pasien", "tpi_pf_mobilisasi_pasien_transfer", "tpi_pf_resiko_dekubitus_pasien", "tpi_pf_riwayat_resiko_dekubitus_pasien", "tpi_pf_infus", "tpi_pf_tanggal_infus", "tpi_pf_ngt_pasien", "tpi_pf_tanggal_ngt", "tpi_pf_ett", "tpi_pf_tanggal_ett", "tpi_pf_cvc", "tpi_pf_tanggal_cvc", "tpi_pf_dc", "tpi_pf_tanggal_dc", "tpi_pf_lain", "tpi_pf_tanggal_lain", "tpi_pf_oksigen", "tpi_pf_keterangan_oksigen", "tpi_pf_pump", "tpi_pf_bidai", "tpi_pt_infus", "tpi_pt_obat", "tpi_pp_labolatorium", "tpi_pp_ket_labolatorium", "tpi_pp_radiologi", "tpi_pp_ket_radiologi", "tpi_pp_lainnya", "tpi_pp_ket_lainnya", "tpi_tm_tindakan_medis", "tpi_tm_rencana_tindakan", "tpi_kp_sebelum_composmentis", "tpi_kp_sebelum_apatis", "tpi_kp_sebelum_samnolen", "tpi_kp_sebelum_sopor", "tpi_kp_sebelum_koma", "tpi_kp_sebelum_gcs_e", "tpi_kp_sebelum_gcs_m", "tpi_kp_sebelum_gcs_v", "tpi_kp_sebelum_gcs_total", "tpi_kp_sebelum_catatan", "tpi_kp_perjalanan_masalah_selama_trasnfer", "tpi_kp_perjalanan_penanganan_masalah", "tpi_kp_sudah_composmentis", "tpi_kp_sudah_apatis", "tpi_kp_sudah_samnolen", "tpi_kp_sudah_sopor", "tpi_kp_sudah_koma", "tpi_kp_sudah_gcs_e", "tpi_kp_sudah_gcs_m", "tpi_kp_sudah_gcs_v", "tpi_kp_sudah_gcs_total", "tpi_kp_sudah_tensi_sis", "tpi_kp_sudah_tensi_dis", "tpi_kp_sudah_nadi", "tpi_kp_sudah_pernafasan", "tpi_kp_sudah_suhu", "tpi_kp_sudah_kondisi_pasien", "tpi_kp_sudah_nama_obat", "tpi_kp_sudah_ket_nama_obat", "tpi_kp_sudah_pemeriksaan_penunjang", "tpi_kp_sudah_ket_pemeriksaan_penunjang", "tpi_kp_sudah_catatan_penting", "tpi_kp_waktu_ttd_petugas_tf", "tpi_kp_waktu_ttd_petugas_penerima", "tpi_kp_petugas_tansfer", "tpi_kp_petugas_terima_transfer", "tpi_kp_ttd_petugas_transfer", "tpi_kp_ttd_petugas_terima_transfer", "tpi_st_sebelum_composmentis", "tpi_st_sebelum_apatis", "tpi_st_sebelum_samnolen", "tpi_st_sebelum_sopor", "tpi_st_sebelum_koma", "tpi_st_sebelum_gcs_e", "tpi_st_sebelum_gcs_m", "tpi_st_sebelum_gcs_v", "tpi_st_sebelum_gcs_total", "tpi_st_sebelum_tensi_sis", "tpi_st_sebelum_tensi_dis", "tpi_st_sebelum_nadi", "tpi_st_sebelum_pernafasan", "tpi_st_sebelum_suhu", "tpi_st_sebelum_catatan", "tpi_st_perjalanan_masalah_selama_transfer", "tpi_st_perjalanan_penanganan_masalah", "tpi_st_sudah_composmentis", "tpi_st_sudah_apatis", "tpi_st_sudah_samnolen", "tpi_st_sudah_sopor", "tpi_st_sudah_koma", "tpi_st_sudah_gcs_e", "tpi_st_sudah_gcs_m", "tpi_st_sudah_gcs_v", "tpi_st_sudah_gcs_total", "tpi_st_sudah_tensi_sis", "tpi_st_sudah_tensi_dis", "tpi_st_sudah_nadi", "tpi_st_sudah_pernafasan", "tpi_st_sudah_suhu", "tpi_st_sudah_kondisi_pasien", "tpi_st_sudah_nama_obat", "tpi_st_sudah_ket_nama_obat", "tpi_st_sudah_pemeriksaan_penunjang", "tpi_st_sudah_ket_pemeriksaan_penunjang", "tpi_st_sudah_catatan_penting", "tpi_st_waktu_ttd_petugas_tf", "tpi_st_waktu_ttd_petugas_penerima", "tpi_st_petugas_tansfer", "tpi_st_petugas_terima_transfer", "tpi_st_ttd_petugas_transfer", "tpi_st_ttd_petugas_terima_transfer") VALUES ('704125', '2025-03-04 23:00', '2025-03-05 01:24', 'IGD. MATERNAL', 'MERANTI', 'G1P0A0 HAMIL 39 MINGGU DENGAN PPI', NULL, '45', '1', NULL, 'mules-mules', NULL, '1', NULL, NULL, NULL, NULL, '4', NULL, NULL, '4', '-', '145', '2', '2', '2', '2', NULL, NULL, '168', '100', '36.5', '87', '19', '0', NULL, '1', '3', '1', 'TINGGI', '2', '2', '0', NULL, '1', '2025-03-04', NULL, NULL, NULL, NULL, NULL, NULL, '1', '2025-03-04', '1', '', '1', '3', NULL, NULL, 'TAKI : RL+2 AMPUL PROTERINE PUKUL 01.00 WIB
TAKA : RL+MGSO4 40( TPM PUKUL 23.40 WIB
MGSO4 20 % BOLUS PUKUL 23.15

', 'DEXA 2X1 PUKUL 23.45 WIB
DOPAMET 500 MG PUKUL 23.55 WIB
ADALAT 30 MG PUKUL 00.00 WIB 

', '1', 'DR, GDS', NULL, NULL, NULL, NULL, 'PASANG INFUS
PASANG DC
VT
CTG', 'PINDAH MERANTI ', '1', NULL, NULL, NULL, NULL, '4', NULL, NULL, '4', 'TERAPI LANJUT ASFOL ,TTD, KALSIUM ', '-', '-', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-03-05 01:33', '2025-03-05 01:33', '613', '295', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-03-05 01:33', '2025-03-05 01:33', '613', '295', NULL, NULL)
ERROR - 2025-03-05 01:33:28 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type date: &quot;&quot;
LINE 1: ..., NULL, NULL, NULL, NULL, '1', '2025-03-04', '1', '', '1', '...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 01:33:28 --> Query error: ERROR:  invalid input syntax for type date: ""
LINE 1: ..., NULL, NULL, NULL, NULL, '1', '2025-03-04', '1', '', '1', '...
                                                             ^ - Invalid query: INSERT INTO "sm_transfer_pasien_intra" ("id_layanan_pendaftaran", "tpi_tanggal_masuk", "tpi_tanggal_pindah", "tpi_ruang_asal", "tpi_ruang_tujuan", "tpi_diagnosis_utama", "tpi_diagnosis_sekunder", "tpi_dpjp", "tpi_kewaspadaan", "tpi_riwayat_kewaspadan", "tpi_indikasi_masuk_rs", "tpi_riwayat_kesehatan", "tpi_pf_composmentis", "tpi_pf_apatis", "tpi_pf_samnolen", "tpi_pf_sopor", "tpi_pf_koma", "tpi_pf_gcs_e", "tpi_pf_gcs_m", "tpi_pf_gcs_v", "tpi_pf_gcs_total", "tpi_pf_afgar_score", "tpi_pf_djj", "tpi_pf_pupil_1", "tpi_pf_pupil_2", "tpi_pf_pupil_3", "tpi_pf_pupil_4", "tpi_pf_cdl", "tpi_pf_tanggal_cdl", "tpi_pf_tensi_sis", "tpi_pf_tensi_dis", "tpi_pf_suhu", "tpi_pf_nadi", "tpi_pf_nafas", "tpi_pf_alergi", "tpi_pf_riwayat_alergi", "tpi_pf_skala_nyeri_pasien", "tpi_pf_riwayat_nyeri_pasien", "tpi_pf_resiko_jatuh_pasien", "tpi_pf_riwayat_resiko_jatuh_pasien", "tpi_pf_mobilisasi_pasien", "tpi_pf_mobilisasi_pasien_transfer", "tpi_pf_resiko_dekubitus_pasien", "tpi_pf_riwayat_resiko_dekubitus_pasien", "tpi_pf_infus", "tpi_pf_tanggal_infus", "tpi_pf_ngt_pasien", "tpi_pf_tanggal_ngt", "tpi_pf_ett", "tpi_pf_tanggal_ett", "tpi_pf_cvc", "tpi_pf_tanggal_cvc", "tpi_pf_dc", "tpi_pf_tanggal_dc", "tpi_pf_lain", "tpi_pf_tanggal_lain", "tpi_pf_oksigen", "tpi_pf_keterangan_oksigen", "tpi_pf_pump", "tpi_pf_bidai", "tpi_pt_infus", "tpi_pt_obat", "tpi_pp_labolatorium", "tpi_pp_ket_labolatorium", "tpi_pp_radiologi", "tpi_pp_ket_radiologi", "tpi_pp_lainnya", "tpi_pp_ket_lainnya", "tpi_tm_tindakan_medis", "tpi_tm_rencana_tindakan", "tpi_kp_sebelum_composmentis", "tpi_kp_sebelum_apatis", "tpi_kp_sebelum_samnolen", "tpi_kp_sebelum_sopor", "tpi_kp_sebelum_koma", "tpi_kp_sebelum_gcs_e", "tpi_kp_sebelum_gcs_m", "tpi_kp_sebelum_gcs_v", "tpi_kp_sebelum_gcs_total", "tpi_kp_sebelum_catatan", "tpi_kp_perjalanan_masalah_selama_trasnfer", "tpi_kp_perjalanan_penanganan_masalah", "tpi_kp_sudah_composmentis", "tpi_kp_sudah_apatis", "tpi_kp_sudah_samnolen", "tpi_kp_sudah_sopor", "tpi_kp_sudah_koma", "tpi_kp_sudah_gcs_e", "tpi_kp_sudah_gcs_m", "tpi_kp_sudah_gcs_v", "tpi_kp_sudah_gcs_total", "tpi_kp_sudah_tensi_sis", "tpi_kp_sudah_tensi_dis", "tpi_kp_sudah_nadi", "tpi_kp_sudah_pernafasan", "tpi_kp_sudah_suhu", "tpi_kp_sudah_kondisi_pasien", "tpi_kp_sudah_nama_obat", "tpi_kp_sudah_ket_nama_obat", "tpi_kp_sudah_pemeriksaan_penunjang", "tpi_kp_sudah_ket_pemeriksaan_penunjang", "tpi_kp_sudah_catatan_penting", "tpi_kp_waktu_ttd_petugas_tf", "tpi_kp_waktu_ttd_petugas_penerima", "tpi_kp_petugas_tansfer", "tpi_kp_petugas_terima_transfer", "tpi_kp_ttd_petugas_transfer", "tpi_kp_ttd_petugas_terima_transfer", "tpi_st_sebelum_composmentis", "tpi_st_sebelum_apatis", "tpi_st_sebelum_samnolen", "tpi_st_sebelum_sopor", "tpi_st_sebelum_koma", "tpi_st_sebelum_gcs_e", "tpi_st_sebelum_gcs_m", "tpi_st_sebelum_gcs_v", "tpi_st_sebelum_gcs_total", "tpi_st_sebelum_tensi_sis", "tpi_st_sebelum_tensi_dis", "tpi_st_sebelum_nadi", "tpi_st_sebelum_pernafasan", "tpi_st_sebelum_suhu", "tpi_st_sebelum_catatan", "tpi_st_perjalanan_masalah_selama_transfer", "tpi_st_perjalanan_penanganan_masalah", "tpi_st_sudah_composmentis", "tpi_st_sudah_apatis", "tpi_st_sudah_samnolen", "tpi_st_sudah_sopor", "tpi_st_sudah_koma", "tpi_st_sudah_gcs_e", "tpi_st_sudah_gcs_m", "tpi_st_sudah_gcs_v", "tpi_st_sudah_gcs_total", "tpi_st_sudah_tensi_sis", "tpi_st_sudah_tensi_dis", "tpi_st_sudah_nadi", "tpi_st_sudah_pernafasan", "tpi_st_sudah_suhu", "tpi_st_sudah_kondisi_pasien", "tpi_st_sudah_nama_obat", "tpi_st_sudah_ket_nama_obat", "tpi_st_sudah_pemeriksaan_penunjang", "tpi_st_sudah_ket_pemeriksaan_penunjang", "tpi_st_sudah_catatan_penting", "tpi_st_waktu_ttd_petugas_tf", "tpi_st_waktu_ttd_petugas_penerima", "tpi_st_petugas_tansfer", "tpi_st_petugas_terima_transfer", "tpi_st_ttd_petugas_transfer", "tpi_st_ttd_petugas_terima_transfer") VALUES ('704125', '2025-03-04 23:00', '2025-03-05 01:24', 'IGD. MATERNAL', 'MERANTI', 'G1P0A0 HAMIL 39 MINGGU DENGAN PPI', NULL, '45', '1', NULL, 'mules-mules', NULL, '1', NULL, NULL, NULL, NULL, '4', NULL, NULL, '4', '-', '145', '2', '2', '2', '2', NULL, NULL, '168', '100', '36.5', '87', '19', '0', NULL, '1', '3', '1', 'TINGGI', '2', '2', '0', NULL, '1', '2025-03-04', NULL, NULL, NULL, NULL, NULL, NULL, '1', '2025-03-04', '1', '', '1', '3', NULL, NULL, 'TAKI : RL+2 AMPUL PROTERINE PUKUL 01.00 WIB
TAKA : RL+MGSO4 40( TPM PUKUL 23.40 WIB
MGSO4 20 % BOLUS PUKUL 23.15

', 'DEXA 2X1 PUKUL 23.45 WIB
DOPAMET 500 MG PUKUL 23.55 WIB
ADALAT 30 MG PUKUL 00.00 WIB 

', '1', 'DR, GDS', NULL, NULL, NULL, NULL, 'PASANG INFUS
PASANG DC
VT
CTG', 'PINDAH MERANTI ', '1', NULL, NULL, NULL, NULL, '4', NULL, NULL, '4', 'TERAPI LANJUT ASFOL ,TTD, KALSIUM ', '-', '-', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-03-05 01:33', '2025-03-05 01:33', '613', '295', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-03-05 01:33', '2025-03-05 01:33', '613', '295', NULL, NULL)
ERROR - 2025-03-05 01:43:28 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ..._5&quot;, &quot;jam_pemberian_6&quot;) VALUES (801094, '2', '2', '', '1 x S...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 01:43:28 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ..._5", "jam_pemberian_6") VALUES (801094, '2', '2', '', '1 x S...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (801094, '2', '2', '', '1 x Sehari 1 Tablet', '', 'PC', '0', '', '0', 'MORN', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-03-05 01:45:54 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ..._5&quot;, &quot;jam_pemberian_6&quot;) VALUES (801095, '2', '2', '', '3 x S...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 01:45:54 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ..._5", "jam_pemberian_6") VALUES (801095, '2', '2', '', '3 x S...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (801095, '2', '2', '', '3 x Sehari 1 Tablet/Kapsul', '', 'PC', '0', '', '0', 'MORN, NOON, EVE', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-03-05 01:46:06 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type date: &quot;&quot;
LINE 1: ..., NULL, NULL, NULL, NULL, '1', '2025-03-04', '1', '', '1', '...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 01:46:06 --> Query error: ERROR:  invalid input syntax for type date: ""
LINE 1: ..., NULL, NULL, NULL, NULL, '1', '2025-03-04', '1', '', '1', '...
                                                             ^ - Invalid query: INSERT INTO "sm_transfer_pasien_intra" ("id_layanan_pendaftaran", "tpi_tanggal_masuk", "tpi_tanggal_pindah", "tpi_ruang_asal", "tpi_ruang_tujuan", "tpi_diagnosis_utama", "tpi_diagnosis_sekunder", "tpi_dpjp", "tpi_kewaspadaan", "tpi_riwayat_kewaspadan", "tpi_indikasi_masuk_rs", "tpi_riwayat_kesehatan", "tpi_pf_composmentis", "tpi_pf_apatis", "tpi_pf_samnolen", "tpi_pf_sopor", "tpi_pf_koma", "tpi_pf_gcs_e", "tpi_pf_gcs_m", "tpi_pf_gcs_v", "tpi_pf_gcs_total", "tpi_pf_afgar_score", "tpi_pf_djj", "tpi_pf_pupil_1", "tpi_pf_pupil_2", "tpi_pf_pupil_3", "tpi_pf_pupil_4", "tpi_pf_cdl", "tpi_pf_tanggal_cdl", "tpi_pf_tensi_sis", "tpi_pf_tensi_dis", "tpi_pf_suhu", "tpi_pf_nadi", "tpi_pf_nafas", "tpi_pf_alergi", "tpi_pf_riwayat_alergi", "tpi_pf_skala_nyeri_pasien", "tpi_pf_riwayat_nyeri_pasien", "tpi_pf_resiko_jatuh_pasien", "tpi_pf_riwayat_resiko_jatuh_pasien", "tpi_pf_mobilisasi_pasien", "tpi_pf_mobilisasi_pasien_transfer", "tpi_pf_resiko_dekubitus_pasien", "tpi_pf_riwayat_resiko_dekubitus_pasien", "tpi_pf_infus", "tpi_pf_tanggal_infus", "tpi_pf_ngt_pasien", "tpi_pf_tanggal_ngt", "tpi_pf_ett", "tpi_pf_tanggal_ett", "tpi_pf_cvc", "tpi_pf_tanggal_cvc", "tpi_pf_dc", "tpi_pf_tanggal_dc", "tpi_pf_lain", "tpi_pf_tanggal_lain", "tpi_pf_oksigen", "tpi_pf_keterangan_oksigen", "tpi_pf_pump", "tpi_pf_bidai", "tpi_pt_infus", "tpi_pt_obat", "tpi_pp_labolatorium", "tpi_pp_ket_labolatorium", "tpi_pp_radiologi", "tpi_pp_ket_radiologi", "tpi_pp_lainnya", "tpi_pp_ket_lainnya", "tpi_tm_tindakan_medis", "tpi_tm_rencana_tindakan", "tpi_kp_sebelum_composmentis", "tpi_kp_sebelum_apatis", "tpi_kp_sebelum_samnolen", "tpi_kp_sebelum_sopor", "tpi_kp_sebelum_koma", "tpi_kp_sebelum_gcs_e", "tpi_kp_sebelum_gcs_m", "tpi_kp_sebelum_gcs_v", "tpi_kp_sebelum_gcs_total", "tpi_kp_sebelum_catatan", "tpi_kp_perjalanan_masalah_selama_trasnfer", "tpi_kp_perjalanan_penanganan_masalah", "tpi_kp_sudah_composmentis", "tpi_kp_sudah_apatis", "tpi_kp_sudah_samnolen", "tpi_kp_sudah_sopor", "tpi_kp_sudah_koma", "tpi_kp_sudah_gcs_e", "tpi_kp_sudah_gcs_m", "tpi_kp_sudah_gcs_v", "tpi_kp_sudah_gcs_total", "tpi_kp_sudah_tensi_sis", "tpi_kp_sudah_tensi_dis", "tpi_kp_sudah_nadi", "tpi_kp_sudah_pernafasan", "tpi_kp_sudah_suhu", "tpi_kp_sudah_kondisi_pasien", "tpi_kp_sudah_nama_obat", "tpi_kp_sudah_ket_nama_obat", "tpi_kp_sudah_pemeriksaan_penunjang", "tpi_kp_sudah_ket_pemeriksaan_penunjang", "tpi_kp_sudah_catatan_penting", "tpi_kp_waktu_ttd_petugas_tf", "tpi_kp_waktu_ttd_petugas_penerima", "tpi_kp_petugas_tansfer", "tpi_kp_petugas_terima_transfer", "tpi_kp_ttd_petugas_transfer", "tpi_kp_ttd_petugas_terima_transfer", "tpi_st_sebelum_composmentis", "tpi_st_sebelum_apatis", "tpi_st_sebelum_samnolen", "tpi_st_sebelum_sopor", "tpi_st_sebelum_koma", "tpi_st_sebelum_gcs_e", "tpi_st_sebelum_gcs_m", "tpi_st_sebelum_gcs_v", "tpi_st_sebelum_gcs_total", "tpi_st_sebelum_tensi_sis", "tpi_st_sebelum_tensi_dis", "tpi_st_sebelum_nadi", "tpi_st_sebelum_pernafasan", "tpi_st_sebelum_suhu", "tpi_st_sebelum_catatan", "tpi_st_perjalanan_masalah_selama_transfer", "tpi_st_perjalanan_penanganan_masalah", "tpi_st_sudah_composmentis", "tpi_st_sudah_apatis", "tpi_st_sudah_samnolen", "tpi_st_sudah_sopor", "tpi_st_sudah_koma", "tpi_st_sudah_gcs_e", "tpi_st_sudah_gcs_m", "tpi_st_sudah_gcs_v", "tpi_st_sudah_gcs_total", "tpi_st_sudah_tensi_sis", "tpi_st_sudah_tensi_dis", "tpi_st_sudah_nadi", "tpi_st_sudah_pernafasan", "tpi_st_sudah_suhu", "tpi_st_sudah_kondisi_pasien", "tpi_st_sudah_nama_obat", "tpi_st_sudah_ket_nama_obat", "tpi_st_sudah_pemeriksaan_penunjang", "tpi_st_sudah_ket_pemeriksaan_penunjang", "tpi_st_sudah_catatan_penting", "tpi_st_waktu_ttd_petugas_tf", "tpi_st_waktu_ttd_petugas_penerima", "tpi_st_petugas_tansfer", "tpi_st_petugas_terima_transfer", "tpi_st_ttd_petugas_transfer", "tpi_st_ttd_petugas_terima_transfer") VALUES ('704125', '2025-03-05 00:00', '2025-03-05 01:40', 'IGD. MATERNAL', 'MERANTI', 'G1POA0 HAMIL 33 MINGGU DENGAN PPI+PEB', '-', '45', '1', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, '4', NULL, NULL, '4', '-', '155', NULL, NULL, NULL, NULL, NULL, NULL, '168', '100', '36.5', '78', '21', '0', NULL, '1', '3', '1', 'TINGGI', '2', '2', '0', NULL, '1', '2025-03-04', NULL, NULL, NULL, NULL, NULL, NULL, '1', '2025-03-04', '1', '', '1', '3', NULL, NULL, 'TAKI :RL +2 AMPUL PROTERINE PUKUL 00.00 WIB
TAKA : MGSO4 40 % PUKUL 23.30 WIB 
', 'DEXAMETASON 2X1 PUKUL 23. 40 WIB
DOPAMET 500 MG PUKUL 23.45 WIB
ADALAT 30 MG PUKUL 23.55
', '1', 'DR, GDS', NULL, NULL, NULL, NULL, 'PASANG INFUS
DC
CTG
VT', 'PINDAH RUANG MERANTI ', '1', NULL, NULL, NULL, NULL, '4', NULL, NULL, '4', 'TERAPI TAMBAHAN TTD,ASFOL,KALSIUM', '-', '-', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-03-05 01:45', '2025-03-05 01:45', '302', NULL, '1', '1', '1', NULL, NULL, NULL, NULL, '4', NULL, NULL, '4', '168', '100', '87', '21', '36.5', 'OBS HIS', '-', '-', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-03-05 01:46', '2025-03-05 01:46', '302', '295', '1', '1')
ERROR - 2025-03-05 01:46:11 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...) VALUES (5709561, '361', 4262.4, '1', '1.00', NULL, 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 01:46:11 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...) VALUES (5709561, '361', 4262.4, '1', '1.00', NULL, 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (5709561, '361', 4262.4, '1', '1.00', NULL, 'null')
ERROR - 2025-03-05 01:49:40 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/views/js.php 1507
ERROR - 2025-03-05 01:59:32 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...ALUES (5709624, '525', 3545.784, '25', '1.00', NULL, 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 01:59:32 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...ALUES (5709624, '525', 3545.784, '25', '1.00', NULL, 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (5709624, '525', 3545.784, '25', '1.00', NULL, 'null')
ERROR - 2025-03-05 02:05:12 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 02:20:16 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-03-05 02:20:22 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 02:36:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 02:36:46 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 02:36:55 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...&quot;) VALUES (5709667, '1646', 6660, '1', '2.00', 'Ya', 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 02:36:55 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...") VALUES (5709667, '1646', 6660, '1', '2.00', 'Ya', 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (5709667, '1646', 6660, '1', '2.00', 'Ya', 'null')
ERROR - 2025-03-05 02:37:06 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 02:37:06 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 02:50:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...s&quot;) VALUES (5709693, '704', 1680, '4', '1.00', 'Ya', 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 02:50:15 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...s") VALUES (5709693, '704', 1680, '4', '1.00', 'Ya', 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (5709693, '704', 1680, '4', '1.00', 'Ya', 'null')
ERROR - 2025-03-05 02:51:34 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-03-05 03:13:10 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 03:23:26 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...&quot;) VALUES (5709729, '526', 292.8, '1', '1.00', 'Ya', 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 03:23:26 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...") VALUES (5709729, '526', 292.8, '1', '1.00', 'Ya', 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (5709729, '526', 292.8, '1', '1.00', 'Ya', 'null')
ERROR - 2025-03-05 03:24:23 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...VALUES (5709759, '922', 1017.648, '1', '1.00', NULL, 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 03:24:23 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...VALUES (5709759, '922', 1017.648, '1', '1.00', NULL, 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (5709759, '922', 1017.648, '1', '1.00', NULL, 'null')
ERROR - 2025-03-05 03:43:23 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 03:43:24 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 03:53:49 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-03-05 03:53:50 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-03-05 03:53:51 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-03-05 04:08:21 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 04:08:21 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 04:26:49 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-03-05 04:31:50 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 04:31:50 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 04:32:23 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 04:32:23 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 04:32:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 04:32:51 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 04:33:00 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 04:33:00 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 04:33:11 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 04:33:11 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 04:33:24 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 04:33:24 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 04:36:32 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-03-05 05:08:11 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 05:08:11 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 05:09:21 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 05:09:21 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 05:10:27 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-03-05 05:10:27 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-03-05 05:10:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 05:10:46 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 05:11:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 05:11:15 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 05:37:47 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 05:37:47 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 05:37:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...&quot;) VALUES (5709953, '212', 862.8, '1', '1.00', NULL, 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 05:37:52 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...") VALUES (5709953, '212', 862.8, '1', '1.00', NULL, 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (5709953, '212', 862.8, '1', '1.00', NULL, 'null')
ERROR - 2025-03-05 05:38:11 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 05:38:11 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 05:38:45 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 05:38:45 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 05:42:50 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 05:48:14 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 06:05:26 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 06:10:45 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-03-05 06:21:30 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/intensive_care/views/js.php 1119
ERROR - 2025-03-05 06:35:53 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 06:35:53 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 06:36:23 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 06:36:23 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 06:42:19 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 06:47:05 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/views/js.php 1507
ERROR - 2025-03-05 06:48:45 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 06:49:01 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 06:49:29 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 812
ERROR - 2025-03-05 06:49:29 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 812
ERROR - 2025-03-05 06:49:29 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 817
ERROR - 2025-03-05 06:49:29 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 817
ERROR - 2025-03-05 06:49:29 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 818
ERROR - 2025-03-05 06:49:29 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 818
ERROR - 2025-03-05 06:49:36 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 06:50:58 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 06:51:42 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 06:53:36 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 06:55:15 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 06:55:46 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 06:57:24 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 07:00:04 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-03-05 07:00:40 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-03-05 07:00:46 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 812
ERROR - 2025-03-05 07:00:46 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 812
ERROR - 2025-03-05 07:00:46 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 817
ERROR - 2025-03-05 07:00:46 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 817
ERROR - 2025-03-05 07:00:46 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 818
ERROR - 2025-03-05 07:00:46 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 818
ERROR - 2025-03-05 07:00:59 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2503050034) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 07:00:59 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2503050034) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2503050034', '00189122', '2025-03-05 07:00:58', 'Poliklinik', NULL, 'Jalan', 1, NULL, NULL, 1, '0000049331024', NULL, '022309050125Y000504', 'Lama', NULL, 1950, 0, 'Belum', 'Poliklinik Rehab Medik', 0, 2, NULL, '20250305A109')
ERROR - 2025-03-05 07:01:01 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 07:02:37 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 812
ERROR - 2025-03-05 07:02:37 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 812
ERROR - 2025-03-05 07:02:37 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 817
ERROR - 2025-03-05 07:02:37 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 817
ERROR - 2025-03-05 07:02:37 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 818
ERROR - 2025-03-05 07:02:37 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 818
ERROR - 2025-03-05 07:02:56 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 07:03:04 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 07:04:05 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 07:04:05 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 07:04:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 07:04:36 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 07:04:46 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-03-05 07:04:47 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 07:04:47 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 07:04:56 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 07:04:56 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 07:09:24 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 07:09:45 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 07:10:02 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2503050075) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 07:10:02 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2503050075) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "hak_kelas", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "nik_pjwb", "nama_pjwb", "kelamin_pjwb", "telp_pjwb", "alamat_pjwb", "tgl_lahir_pjwb", "hubungan_pjwb", "nik_pjwb_finansial", "nama_pjwb_finansial", "kelamin_pjwb_finansial", "telp_pjwb_finansial", "alamat_pjwb_finansial", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2503050075', '00000634', '2025-03-05 07:10:02', 'Poliklinik', '', '', 'Jalan', '1', NULL, NULL, '', '', '', '', '', NULL, '', '', '', '', '', '', '1', '0001853136178', NULL, '022309051224Y001840', 'Lama', NULL, '1765', 0, 'Belum', 'Poliklinik Syaraf', 0, '2', '', '20250305A021')
ERROR - 2025-03-05 07:10:14 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 07:10:28 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 07:11:13 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 07:11:36 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 07:12:15 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 07:12:16 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 07:12:57 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 07:13:38 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-03-05 07:14:16 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 07:14:17 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 07:14:32 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 07:14:39 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 07:16:04 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-03-05 07:16:21 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2503050101) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 07:16:21 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2503050101) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2503050101', '00250096', '2025-03-05 07:16:19', 'Poliklinik', NULL, 'Jalan', 1, NULL, NULL, 1, '0001799565985', NULL, '022300011224Y001338', 'Lama', NULL, 1950, 0, 'Belum', 'Poliklinik Jiwa', 0, 2, NULL, '20250305B029')
ERROR - 2025-03-05 07:16:24 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-03-05 07:16:38 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 07:16:43 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 07:16:52 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 07:18:49 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 07:18:51 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 07:19:20 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 07:19:34 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2503050120) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 07:19:34 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2503050120) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2503050120', '00019050', '2025-03-05 07:19:32', 'Poliklinik', NULL, 'Jalan', 1, NULL, NULL, 1, '0000049172859', NULL, '0223B1560125P000220', 'Lama', NULL, 1950, 0, 'Belum', 'Poliklinik Jantung', 0, 2, NULL, '20250305A010')
ERROR - 2025-03-05 07:19:45 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 07:19:47 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 07:20:05 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2503050125) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 07:20:05 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2503050125) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2503050125', '00292060', '2025-03-05 07:20:02', 'Poliklinik', NULL, 'Jalan', 1, NULL, NULL, 1, '0002620401208', NULL, '022309070225Y001740', 'Lama', NULL, 1945, 0, 'Belum', 'Poliklinik Jantung', 0, 2, NULL, '20250305B150')
ERROR - 2025-03-05 07:22:22 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 07:23:11 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 07:23:11 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-03-05 07:23:11 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 07:23:11 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-03-05 07:23:40 --> Severity: Notice  --> Undefined variable: tindakanNama /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 572
ERROR - 2025-03-05 07:23:40 --> Severity: Warning  --> array_unique() expects parameter 1 to be array, null given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 572
ERROR - 2025-03-05 07:23:40 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 574
ERROR - 2025-03-05 07:24:21 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 07:25:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2503050150) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 07:25:15 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2503050150) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "hak_kelas", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "nik_pjwb", "nama_pjwb", "kelamin_pjwb", "telp_pjwb", "alamat_pjwb", "tgl_lahir_pjwb", "hubungan_pjwb", "nik_pjwb_finansial", "nama_pjwb_finansial", "kelamin_pjwb_finansial", "telp_pjwb_finansial", "alamat_pjwb_finansial", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2503050150', '00370801', '2025-03-05 07:25:15', 'Poliklinik', '', '', 'Jalan', '2', NULL, NULL, '', '', '', '', '', NULL, '', '', '', '', '', '', 9, NULL, NULL, NULL, 'Baru', NULL, '1768', 0, 'Belum', 'Poliklinik Bedah Mulut', 0, '2', '', '20250305B326')
ERROR - 2025-03-05 07:25:24 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 07:26:33 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...LUES (5710055, '689', 9208.116, '0.9', '1.00', 'Ya', 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 07:26:33 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...LUES (5710055, '689', 9208.116, '0.9', '1.00', 'Ya', 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (5710055, '689', 9208.116, '0.9', '1.00', 'Ya', 'null')
ERROR - 2025-03-05 07:26:36 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 07:27:17 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2503050157) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 07:27:17 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2503050157) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2503050157', '00299221', '2025-03-05 07:27:15', 'Poliklinik', NULL, 'Jalan', 1, NULL, NULL, 1, '0003001076256', NULL, '102501100225Y004310', 'Lama', NULL, 1945, 0, 'Belum', 'Poliklinik Jantung', 0, 2, NULL, '20250305A159')
ERROR - 2025-03-05 07:27:34 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-03-05 07:28:25 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2503050160) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 07:28:25 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2503050160) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "hak_kelas", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "nik_pjwb", "nama_pjwb", "kelamin_pjwb", "telp_pjwb", "alamat_pjwb", "tgl_lahir_pjwb", "hubungan_pjwb", "nik_pjwb_finansial", "nama_pjwb_finansial", "kelamin_pjwb_finansial", "telp_pjwb_finansial", "alamat_pjwb_finansial", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2503050160', '00193573', '2025-03-05 07:28:25', 'Poliklinik', '', '', 'Jalan', '1', NULL, NULL, '', '', '', '', '', NULL, '', '', '', '', '', '', '1', '0000049347821', NULL, '102505011224Y002015', 'Lama', NULL, '1775', 0, 'Belum', 'Poliklinik Syaraf', 0, '2', '', '20250305A029')
ERROR - 2025-03-05 07:28:31 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 07:28:40 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 07:28:44 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 07:29:00 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 07:29:00 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 07:29:44 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 07:30:19 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 07:30:19 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-03-05 00:00:00' AND '2025-03-05 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A004%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-03-05 07:31:05 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 07:31:57 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 07:32:01 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-03-05 07:32:09 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 07:34:09 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 07:35:03 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-03-05 07:35:13 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 07:35:18 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 07:35:38 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 07:35:38 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-03-05 07:35:38 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 07:35:38 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-03-05 07:35:43 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 07:36:48 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 07:38:16 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-03-05 07:38:25 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 07:38:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 07:38:46 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-03-05 00:00:00' AND '2025-03-05 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A140%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-03-05 07:39:24 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 07:39:35 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 07:40:06 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 07:40:16 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 07:40:47 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 07:41:23 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2503050203) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 07:41:23 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2503050203) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "hak_kelas", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "nik_pjwb", "nama_pjwb", "kelamin_pjwb", "telp_pjwb", "alamat_pjwb", "tgl_lahir_pjwb", "hubungan_pjwb", "nik_pjwb_finansial", "nama_pjwb_finansial", "kelamin_pjwb_finansial", "telp_pjwb_finansial", "alamat_pjwb_finansial", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2503050203', '00076651', '2025-03-05 07:41:23', 'Poliklinik', '', '', 'Jalan', '1', NULL, NULL, '', '', '', '', '', NULL, '', '', '', '', '', '', '1', '0002033722776', NULL, '0223U0280325P000280', 'Lama', NULL, '1775', 0, 'Belum', 'Poliklinik Kulit Kelamin', 0, '2', '', '20250305A140')
ERROR - 2025-03-05 07:42:04 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-03-05 07:42:13 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 07:42:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 07:42:15 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-03-05 00:00:00' AND '2025-03-05 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A145%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-03-05 07:42:39 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2503050207) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 07:42:39 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2503050207) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "hak_kelas", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "nik_pjwb", "nama_pjwb", "kelamin_pjwb", "telp_pjwb", "alamat_pjwb", "tgl_lahir_pjwb", "hubungan_pjwb", "nik_pjwb_finansial", "nama_pjwb_finansial", "kelamin_pjwb_finansial", "telp_pjwb_finansial", "alamat_pjwb_finansial", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2503050207', '00188899', '2025-03-05 07:42:38', 'Laboratorium', '', '', 'Jalan', '1', NULL, NULL, '', '', '', '', '', NULL, '', '', '', '', '', '', '1', '0001639241572', NULL, NULL, 'Lama', '0', '1775', 1, 'Belum', 'Laboratorium ', 0, '2', '', NULL)
ERROR - 2025-03-05 07:42:47 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 07:43:20 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 07:44:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 07:44:10 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-03-05 00:00:00' AND '2025-03-05 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A083%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-03-05 07:44:24 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 07:44:33 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 07:44:37 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 07:45:51 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 07:46:02 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-03-05 07:46:11 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-03-05 07:46:19 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 07:46:29 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 07:47:41 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 07:48:14 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2503050226) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 07:48:14 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2503050226) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2503050226', '00104303', '2025-03-05 07:48:12', 'Poliklinik', NULL, 'Jalan', 1, NULL, NULL, 1, '0001836964596', NULL, '022300090325Y000197', 'Lama', NULL, 1945, 0, 'Belum', 'Poliklinik Penyakit Dalam', 0, 2, NULL, '20250305B349')
ERROR - 2025-03-05 07:49:26 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 07:49:27 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-03-05 07:49:35 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 07:50:17 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 07:51:16 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 07:51:17 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 07:51:36 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-03-05 07:51:44 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 07:51:44 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2503050238) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 07:51:44 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2503050238) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2503050238', '00158409', '2025-03-05 07:51:37', 'Poliklinik', NULL, 'Jalan', 1, NULL, NULL, 1, '0000813897281', NULL, '022300090225Y001997', 'Lama', NULL, 1950, 0, 'Belum', 'Poliklinik Paru', 0, 2, NULL, '20250305A056')
ERROR - 2025-03-05 07:51:46 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 07:53:01 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 07:53:06 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 07:54:21 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-03-05 07:54:35 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 07:54:37 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;null&quot;
LINE 9: WHERE &quot;pd&quot;.&quot;id&quot; = 'null'
                          ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 07:54:37 --> Query error: ERROR:  invalid input syntax for type bigint: "null"
LINE 9: WHERE "pd"."id" = 'null'
                          ^ - Invalid query: SELECT "pd".*, "p"."id" as "no_rm", "p"."rm_lama", "p"."nama", "p"."kelamin", "p"."alamat", "p"."telp", "p"."agama", "p"."no_identitas", "p"."alergi", "p"."rm_lama", "p"."status_kawin", date_part('year', age(p.tanggal_lahir)) as umur_pasien, "p"."tanggal_lahir", "p"."tempat_lahir", "p"."no_rumah", "p"."no_rt", "p"."no_rw", "p"."kode_pos", coalesce(p.nama_prop, '') as provinsi, coalesce(p.nama_kab, '') as kabupaten, coalesce(p.nama_kec, '') as kecamatan, coalesce(p.nama_kel, '') as kelurahan, coalesce(pk.nama, '') as pekerjaan, coalesce(pend.nama, '') as pendidikan, coalesce(pj.nama, '') as penjamin, coalesce(pj.diskon, '0') as diskon, "i"."nama" as "instansi_perujuk", "pjp"."hak_kelas" as "kelas_rawat", "pd"."jenis_igd", "p"."gol_darah"
FROM "sm_pendaftaran" as "pd"
JOIN "sm_pasien" as "p" ON "p"."id" = "pd"."id_pasien"
LEFT JOIN "sm_instansi" as "i" ON "i"."id" = "pd"."id_instansi_perujuk"
LEFT JOIN "sm_pekerjaan" as "pk" ON "pk"."id" = "p"."id_pekerjaan"
LEFT JOIN "sm_pendidikan" as "pend" ON "pend"."id" = "p"."id_pendidikan"
LEFT JOIN "sm_penjamin" as "pj" ON "pj"."id" = "pd"."id_penjamin"
JOIN "sm_penjamin_pasien" as "pjp" ON "pjp"."id_pasien" = "p"."id"
WHERE "pd"."id" = 'null'
ERROR - 2025-03-05 07:55:23 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 07:55:26 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 07:56:06 --> Severity: Notice  --> Trying to get property 'nama' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/sisa_stok/views/export/sisa_stok_unit.php 44
ERROR - 2025-03-05 07:56:26 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 07:56:38 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 07:56:46 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 7939
ERROR - 2025-03-05 07:57:09 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 10120
ERROR - 2025-03-05 07:57:13 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 07:57:43 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 07:57:48 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 07:58:29 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 07:58:29 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 07:58:30 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-03-05 07:58:35 --> Severity: Notice  --> Trying to get property 'nama' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/sisa_stok/views/export/sisa_stok_unit.php 44
ERROR - 2025-03-05 07:58:38 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 07:58:47 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/views/js.php 1507
ERROR - 2025-03-05 07:58:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 07:58:57 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-03-05 07:58:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 07:58:57 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-03-05 07:59:29 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-03-05 07:59:35 --> Severity: Notice  --> Trying to get property 'nama' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/sisa_stok/views/export/sisa_stok_unit.php 44
ERROR - 2025-03-05 08:00:10 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 08:00:30 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 08:00:59 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 08:01:04 --> Severity: Notice  --> Trying to get property 'nama' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/sisa_stok/views/export/sisa_stok_unit.php 44
ERROR - 2025-03-05 08:01:06 --> Severity: Notice  --> Trying to get property 'id' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pendaftaran/models/Pendaftaran_model.php 441
ERROR - 2025-03-05 08:01:06 --> Severity: Notice  --> Trying to get property 'id_pendaftaran' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 9926
ERROR - 2025-03-05 08:01:06 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 4:                 where lp.id_pendaftaran = '' 
                                                  ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 08:01:06 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 4:                 where lp.id_pendaftaran = '' 
                                                  ^ - Invalid query: select lp.*, sp.id as id_spesialisasi, sp.nama as spesialisasi 
                from sm_layanan_pendaftaran as lp 
                left join sm_spesialisasi as sp on (sp.id = lp.id_unit_layanan) 
                where lp.id_pendaftaran = '' 
                order by lp.id desc 
ERROR - 2025-03-05 08:01:41 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 08:01:49 --> Severity: Notice  --> Trying to get property 'nama' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/sisa_stok/views/export/sisa_stok_unit.php 44
ERROR - 2025-03-05 08:03:40 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 08:03:55 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-03-05 08:04:09 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 08:04:51 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 08:05:36 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 08:06:37 --> Severity: Warning  --> number_format() expects parameter 1 to be float, string given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export.php 102
ERROR - 2025-03-05 08:06:37 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export.php 111
ERROR - 2025-03-05 08:06:40 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 08:06:57 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 08:07:13 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 08:07:32 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 08:07:43 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 08:07:56 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 08:07:56 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-03-05 08:07:56 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 08:07:56 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-03-05 08:07:59 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2503050283) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 08:07:59 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2503050283) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2503050283', '00182964', '2025-03-05 08:07:58', 'Poliklinik', NULL, 'Jalan', 1, NULL, NULL, 1, '0001815449804', NULL, '102504030225Y002208', 'Lama', NULL, 1950, 0, 'Belum', 'Poliklinik Bedah Mulut', 0, 2, NULL, '20250305B249')
ERROR - 2025-03-05 08:08:14 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 08:08:49 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 08:08:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2503050288) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 08:08:52 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2503050288) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "hak_kelas", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "nik_pjwb", "nama_pjwb", "kelamin_pjwb", "telp_pjwb", "alamat_pjwb", "tgl_lahir_pjwb", "hubungan_pjwb", "nik_pjwb_finansial", "nama_pjwb_finansial", "kelamin_pjwb_finansial", "telp_pjwb_finansial", "alamat_pjwb_finansial", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2503050288', '00370816', '2025-03-05 08:08:52', 'Laboratorium', '', '', 'Jalan', '1', NULL, NULL, '', '', '', '', '', NULL, '', '', '', '', '', '', '7', NULL, NULL, NULL, 'Baru', '0', '1775', 1, 'Belum', 'Laboratorium ', 0, '2', '', NULL)
ERROR - 2025-03-05 08:09:10 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 08:09:17 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 08:09:52 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 08:10:17 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 08:10:45 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2503050293) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 08:10:45 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2503050293) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2503050293', '00369917', '2025-03-05 08:10:26', 'Poliklinik', NULL, 'Jalan', 1, NULL, NULL, 1, '0003533754115', NULL, '0223R0580225B000015', 'Lama', NULL, 1948, 0, 'Belum', 'Poliklinik Anak', 0, 2, NULL, '20250305B162')
ERROR - 2025-03-05 08:11:24 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-03-05 08:11:28 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 08:11:36 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 08:12:15 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 812
ERROR - 2025-03-05 08:12:15 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 812
ERROR - 2025-03-05 08:12:15 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 817
ERROR - 2025-03-05 08:12:15 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 817
ERROR - 2025-03-05 08:12:15 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 818
ERROR - 2025-03-05 08:12:15 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 818
ERROR - 2025-03-05 08:13:03 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 08:13:40 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 08:14:20 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 08:15:19 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 08:15:57 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 812
ERROR - 2025-03-05 08:15:57 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 812
ERROR - 2025-03-05 08:15:57 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 817
ERROR - 2025-03-05 08:15:57 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 817
ERROR - 2025-03-05 08:15:57 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 818
ERROR - 2025-03-05 08:15:57 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 818
ERROR - 2025-03-05 08:15:57 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 812
ERROR - 2025-03-05 08:15:57 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 812
ERROR - 2025-03-05 08:15:57 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 817
ERROR - 2025-03-05 08:15:57 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 817
ERROR - 2025-03-05 08:15:57 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 818
ERROR - 2025-03-05 08:15:57 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 818
ERROR - 2025-03-05 08:16:02 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 08:17:03 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 08:17:10 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 08:17:17 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 08:17:21 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 08:17:41 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 08:18:28 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 08:18:59 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 08:19:08 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 08:19:23 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 08:19:52 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 08:19:54 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 08:19:56 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2503050317) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 08:19:56 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2503050317) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "hak_kelas", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "nik_pjwb", "nama_pjwb", "kelamin_pjwb", "telp_pjwb", "alamat_pjwb", "tgl_lahir_pjwb", "hubungan_pjwb", "nik_pjwb_finansial", "nama_pjwb_finansial", "kelamin_pjwb_finansial", "telp_pjwb_finansial", "alamat_pjwb_finansial", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2503050317', '00323475', '2025-03-05 08:19:55', 'Poliklinik', '', '', 'Jalan', '2', NULL, NULL, '', '', '', '', '', NULL, '', '', '', '', '', '', '1', '0001640157693', NULL, '022309050325Y000094', 'Lama', NULL, '1775', 0, 'Belum', 'Poliklinik Urologi', 0, '2', '', '20250305B288')
ERROR - 2025-03-05 08:20:02 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 08:20:10 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 08:20:21 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 08:20:48 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 08:20:55 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 08:21:13 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 08:21:24 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-03-05 08:21:24 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-03-05 08:22:44 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 08:22:44 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 08:22:49 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 08:22:49 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 08:23:06 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 08:23:24 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 08:23:24 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 08:23:25 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-03-05 08:23:33 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 08:23:35 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 08:23:39 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...an_5&quot;, &quot;jam_pemberian_6&quot;) VALUES ('801158', '10', '', '1', '...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 08:23:39 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...an_5", "jam_pemberian_6") VALUES ('801158', '10', '', '1', '...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES ('801158', '10', '', '1', '', '', 'null', '0', '', '0', '', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-03-05 08:24:03 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 08:24:18 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-03-05 08:24:18 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 08:24:18 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 08:24:36 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 08:25:21 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xac /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 08:25:21 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xac - Invalid query: UPDATE "sm_cppt" SET "id" = '813670', "id_layanan_pendaftaran" = '703346', "waktu" = '2025-03-05 08:22', "id_profesi" = '10', "subject" = 'keluhan membaik ', "objective" = 'Hba1c; 11.7', "assessment" = 'DM tipe II tidak terkontrol + Anemia ringan ec peny kronik Hiponatremia Susp pneumoniae
ISK
', "plan" = 'terapi lanjut 
cek ulang elektrolit + DR post nacl 3¬c pindah ruangan nanti sore', "ademi_assesment" = '', "ademi_diag" = '', "ademi_interv" = '', "ademi_monev" = '', "sbar_situation" = '', "sbar_background" = '', "sbar_assesment" = '', "sbar_recommend" = '', "id_nadis" = '2120', "ttd_nadis" = NULL, "instruksi_ppa" = 'terapi lanjut <div>cek ulang elektrolit + DR post nacl 3%</div><div>acc pindah ruangan nanti sore</div><div></div>', "id_dokter_dpjp" = NULL, "id_user" = '2120', "history_edit" = '1', "konsul" = NULL, "updated_date" = '2025-03-05 08:25:21'
WHERE "id" = '813670'
ERROR - 2025-03-05 08:25:24 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-03-05 08:25:24 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-03-05 08:25:39 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 08:25:49 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xac /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 08:25:49 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xac - Invalid query: UPDATE "sm_cppt" SET "id" = '813670', "id_layanan_pendaftaran" = '703346', "waktu" = '2025-03-05 08:22', "id_profesi" = '10', "subject" = 'keluhan membaik ', "objective" = 'Hba1c; 11.7', "assessment" = 'DM tipe II tidak terkontrol + Anemia ringan ec peny kronik Hiponatremia Susp pneumoniae
ISK
', "plan" = 'terapi lanjut 
cek ulang elektrolit + DR post nacl 3¬C pindah ruangan', "ademi_assesment" = '', "ademi_diag" = '', "ademi_interv" = '', "ademi_monev" = '', "sbar_situation" = '', "sbar_background" = '', "sbar_assesment" = '', "sbar_recommend" = '', "id_nadis" = '2120', "ttd_nadis" = NULL, "instruksi_ppa" = 'terapi lanjut <div>cek ulang elektrolit + DR post nacl 3%</div><div>ACC pindah ruangan</div><div></div>', "id_dokter_dpjp" = NULL, "id_user" = '2120', "history_edit" = '1', "konsul" = NULL, "updated_date" = '2025-03-05 08:25:49'
WHERE "id" = '813670'
ERROR - 2025-03-05 08:25:52 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-03-05 08:25:53 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/intensive_care/views/js.php 1119
ERROR - 2025-03-05 08:25:58 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xac /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 08:25:58 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xac - Invalid query: UPDATE "sm_cppt" SET "id" = '813670', "id_layanan_pendaftaran" = '703346', "waktu" = '2025-03-05 08:22', "id_profesi" = '10', "subject" = 'keluhan membaik ', "objective" = 'Hba1c; 11.7', "assessment" = 'DM tipe II tidak terkontrol + Anemia ringan ec peny kronik Hiponatremia Susp pneumoniae
ISK
', "plan" = 'terapi lanjut 
cek ulang elektrolit + DR post nacl 3¬C pindah ruangan', "ademi_assesment" = '', "ademi_diag" = '', "ademi_interv" = '', "ademi_monev" = '', "sbar_situation" = '', "sbar_background" = '', "sbar_assesment" = '', "sbar_recommend" = '', "id_nadis" = '2120', "ttd_nadis" = NULL, "instruksi_ppa" = 'terapi lanjut <div>cek ulang elektrolit + DR post nacl 3%</div><div>ACC pindah ruangan</div><div></div>', "id_dokter_dpjp" = NULL, "id_user" = '2120', "history_edit" = '1', "konsul" = NULL, "updated_date" = '2025-03-05 08:25:58'
WHERE "id" = '813670'
ERROR - 2025-03-05 08:26:00 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 08:26:02 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xac /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 08:26:02 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xac - Invalid query: UPDATE "sm_cppt" SET "id" = '813670', "id_layanan_pendaftaran" = '703346', "waktu" = '2025-03-05 08:22', "id_profesi" = '10', "subject" = 'keluhan membaik ', "objective" = 'Hba1c; 11.7', "assessment" = 'DM tipe II tidak terkontrol + Anemia ringan ec peny kronik Hiponatremia Susp pneumoniae
ISK
', "plan" = 'terapi lanjut 
cek ulang elektrolit + DR post nacl 3¬C pindah ruangan', "ademi_assesment" = '', "ademi_diag" = '', "ademi_interv" = '', "ademi_monev" = '', "sbar_situation" = '', "sbar_background" = '', "sbar_assesment" = '', "sbar_recommend" = '', "id_nadis" = '2120', "ttd_nadis" = NULL, "instruksi_ppa" = 'terapi lanjut <div>cek ulang elektrolit + DR post nacl 3%</div><div>ACC pindah ruangan</div><div></div>', "id_dokter_dpjp" = NULL, "id_user" = '2120', "history_edit" = '1', "konsul" = NULL, "updated_date" = '2025-03-05 08:26:02'
WHERE "id" = '813670'
ERROR - 2025-03-05 08:26:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xac /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 08:26:10 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xac - Invalid query: UPDATE "sm_cppt" SET "id" = '813670', "id_layanan_pendaftaran" = '703346', "waktu" = '2025-03-05 08:22', "id_profesi" = '10', "subject" = 'keluhan membaik ', "objective" = 'Hba1c; 11.7', "assessment" = 'DM tipe II tidak terkontrol + Anemia ringan ec peny kronik Hiponatremia Susp pneumoniae
ISK
', "plan" = 'terapi lanjut 
cek ulang elektrolit + DR post nacl 3¬C pindah ruangan', "ademi_assesment" = '', "ademi_diag" = '', "ademi_interv" = '', "ademi_monev" = '', "sbar_situation" = '', "sbar_background" = '', "sbar_assesment" = '', "sbar_recommend" = '', "id_nadis" = '2120', "ttd_nadis" = NULL, "instruksi_ppa" = 'terapi lanjut <div>cek ulang elektrolit + DR post nacl 3%</div><div>ACC pindah ruangan</div><div></div>', "id_dokter_dpjp" = NULL, "id_user" = '2120', "history_edit" = '1', "konsul" = NULL, "updated_date" = '2025-03-05 08:26:10'
WHERE "id" = '813670'
ERROR - 2025-03-05 08:26:13 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;&quot;
LINE 1: ...', '2025-03-05', '11', '1', '137', '3', '2', '1', '', '2', '...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 08:26:13 --> Query error: ERROR:  invalid input syntax for type smallint: ""
LINE 1: ...', '2025-03-05', '11', '1', '137', '3', '2', '1', '', '2', '...
                                                             ^ - Invalid query: INSERT INTO "sm_form_pengkajian_ulang_resiko_jatuh_pasien_anak" ("id_pendaftaran", "id_layanan_pendaftaran", "tanggal_pengkajian", "jumlah_skor", "paraf", "perawat", "umur", "jenis_kelamin", "diagnosis", "gangguan_kognitif", "faktor_lingkungan", "respon_terhadap_pembedahan", "penggunaan_obat_obatan", "date_created", "id_user") VALUES ('649084', '703718', '2025-03-05', '11', '1', '137', '3', '2', '1', '', '2', '2', '1', '2025-03-05 08:25:23', '1520')
ERROR - 2025-03-05 08:26:24 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 08:26:24 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-03-05 00:00:00' AND '2025-03-05 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A128%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-03-05 08:26:47 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 08:26:47 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-03-05 00:00:00' AND '2025-03-05 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A067%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-03-05 08:27:43 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 08:28:02 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 08:28:46 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 08:28:58 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 08:29:16 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 08:29:27 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 08:29:27 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 08:29:35 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 08:29:39 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 08:29:54 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 08:29:57 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 08:30:01 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 08:30:09 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 08:30:16 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 08:30:27 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 08:30:32 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 08:30:52 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 08:30:58 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 08:31:00 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-03-05 08:31:00 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-03-05 08:31:02 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-03-05 08:31:02 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-03-05 08:31:04 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-03-05 08:31:04 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-03-05 08:31:06 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-03-05 08:31:06 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-03-05 08:31:09 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 08:31:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2503050338) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 08:31:15 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2503050338) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "hak_kelas", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "nik_pjwb", "nama_pjwb", "kelamin_pjwb", "telp_pjwb", "alamat_pjwb", "tgl_lahir_pjwb", "hubungan_pjwb", "nik_pjwb_finansial", "nama_pjwb_finansial", "kelamin_pjwb_finansial", "telp_pjwb_finansial", "alamat_pjwb_finansial", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2503050338', '00085247', '2025-03-05 08:31:15', 'Poliklinik', '', '', 'Jalan', '1', NULL, NULL, '', '', '', '', '', NULL, '', '', '', '', '', '', '1', '0001296341177', NULL, '0223B0741224Y002386', 'Lama', NULL, '1765', 0, 'Belum', 'Poliklinik Syaraf', 0, '2', '', '20250305A033')
ERROR - 2025-03-05 08:31:18 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 08:31:20 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 08:31:27 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-03-05 08:31:27 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 08:31:31 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 08:31:41 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 08:32:23 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_antrian_bpjs_kode_booking_key&quot;
DETAIL:  Key (kode_booking)=(20250305B369) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 08:32:23 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_antrian_bpjs_kode_booking_key"
DETAIL:  Key (kode_booking)=(20250305B369) already exists. - Invalid query: INSERT INTO "sm_antrian_bpjs" ("kode_booking", "urutan", "nomor_antrean", "huruf_antrean", "tanggal_kunjungan", "kebutuhan", "create_date", "status", "lokasi_data", "usia_pasien", "pasien_baru", "waktu_estimasi", "status_rm", "user_create", "no_rm", "id_dokter", "kode_bpjs_dokter", "nama_poli", "kode_bpjs_poli", "no_hp", "nik", "tanggal_lahir", "nama_dokter", "id_penjamin", "jenis_bayar", "sisa_kuota", "total_kuota", "status_respon", "pesan_response", "is_kontrol_pasca_ranap", "id_jadwal_dokter", "no_kartu", "status_jkn", "id_skd", "rujukanawal", "id_poli_asal", "no_referensi", "jenis_kunjungan", "is_pasien_katarak", "no_sep_asal", "id_poli_rujukan") VALUES ('20250305B369', '369', 'B369', 'B', '2025-03-05', '0', '2025-03-05 08:32:22', 'Booking', 'APM', 'Asuransi', 0, '2025-03-05  09:01:30', 0, '1701', '00345101', 60, 252600, 36, 'THT', '083811261375', '3671012212030003', '2003-12-22', 'dr. HENDRARTO, Sp.THT-KL', 1, 'Asuransi', 33, '60', '200', 'Ok.', '0', '48985', '0000816336718', 'JKN', NULL, '1', NULL, '102501060325Y000161', '1', NULL, NULL, '36')
ERROR - 2025-03-05 08:32:35 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 08:32:40 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 08:32:41 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 08:32:55 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 08:33:37 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 08:33:39 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 08:34:04 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 08:34:10 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 08:34:16 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 08:34:34 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 08:34:38 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 08:34:44 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 08:34:56 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 08:35:25 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 08:35:38 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 08:35:43 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 08:35:55 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 08:36:19 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 08:36:27 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-03-05 08:36:33 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 08:36:40 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 08:37:00 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 08:37:08 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 08:37:14 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 08:37:21 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 08:37:49 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 08:37:54 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 08:38:00 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 08:38:08 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2503050359) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 08:38:08 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2503050359) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2503050359', '00320826', '2025-03-05 08:38:05', 'Poliklinik', NULL, 'Jalan', 1, NULL, NULL, 1, '0003046202594', NULL, '102504020225Y002177', 'Lama', NULL, 1945, 0, 'Belum', 'Poliklinik Rehab Medik', 0, 2, NULL, '20250305B211')
ERROR - 2025-03-05 08:38:37 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2503050362) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 08:38:37 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2503050362) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "hak_kelas", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "nik_pjwb", "nama_pjwb", "kelamin_pjwb", "telp_pjwb", "alamat_pjwb", "tgl_lahir_pjwb", "hubungan_pjwb", "nik_pjwb_finansial", "nama_pjwb_finansial", "kelamin_pjwb_finansial", "telp_pjwb_finansial", "alamat_pjwb_finansial", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2503050362', '00326499', '2025-03-05 08:38:36', 'Poliklinik', '', '', 'Jalan', '1', NULL, NULL, '', '', '', '', '', NULL, '', '', '', '', '', '', '19', NULL, NULL, NULL, 'Lama', NULL, '1773', 0, 'Belum', 'Poliklinik Klinik Akasia', 0, '2', '', '20250305E011')
ERROR - 2025-03-05 08:38:43 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 08:38:57 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 08:39:23 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 08:39:58 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 08:40:20 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 08:40:51 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 08:41:18 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 08:42:23 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 08:42:39 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 08:42:46 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 08:42:54 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 08:43:06 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 08:43:09 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 08:44:24 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 08:44:27 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;&quot;
LINE 1: ... &quot;sm_tarif_tindakan_pasien&quot; SET &quot;id_pengkodean&quot; = '', &quot;id_co...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 08:44:27 --> Query error: ERROR:  invalid input syntax for type integer: ""
LINE 1: ... "sm_tarif_tindakan_pasien" SET "id_pengkodean" = '', "id_co...
                                                             ^ - Invalid query: UPDATE "sm_tarif_tindakan_pasien" SET "id_pengkodean" = '', "id_coder" = '1478'
WHERE "id" = '4266733'
ERROR - 2025-03-05 08:44:28 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 08:44:31 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 08:45:02 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/intensive_care/views/js.php 1119
ERROR - 2025-03-05 08:45:52 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 08:46:17 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 08:46:55 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2503050381) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 08:46:55 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2503050381) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "hak_kelas", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "nik_pjwb", "nama_pjwb", "kelamin_pjwb", "telp_pjwb", "alamat_pjwb", "tgl_lahir_pjwb", "hubungan_pjwb", "nik_pjwb_finansial", "nama_pjwb_finansial", "kelamin_pjwb_finansial", "telp_pjwb_finansial", "alamat_pjwb_finansial", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2503050381', '00370828', '2025-03-05 08:46:54', 'Poliklinik', '', '', 'Jalan', '1', NULL, NULL, '', '', '', '', '', NULL, '', '', '', '', '', '', '1', '0003625110999', NULL, '0223R0170125B000069', 'Baru', NULL, '1765', 0, 'Belum', 'Poliklinik THT', 0, '2', '', '20250305F011')
ERROR - 2025-03-05 08:46:58 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-03-05 08:46:58 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2503050382) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 08:46:58 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2503050382) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2503050382', '00178883', '2025-03-05 08:46:57', 'Poliklinik', NULL, 'Jalan', 2, NULL, NULL, 1, '0001833558388', NULL, '102503010325Y000334', 'Lama', NULL, 1945, 0, 'Belum', 'Poliklinik Jiwa', 0, 2, NULL, '20250305B376')
ERROR - 2025-03-05 08:47:28 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2503050385) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 08:47:28 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2503050385) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2503050385', '00008126', '2025-03-05 08:47:26', 'Poliklinik', NULL, 'Jalan', 1, NULL, NULL, 1, '0000815557026', NULL, '102501021224Y002800', 'Lama', NULL, 1950, 0, 'Belum', 'Poliklinik Syaraf', 0, 2, NULL, '20250305B056')
ERROR - 2025-03-05 08:47:35 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 08:47:43 --> Severity: Notice  --> A non well formed numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_hemo/controllers/api/Pemeriksaan_hemo.php 527
ERROR - 2025-03-05 08:47:51 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 08:48:16 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 08:48:20 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 08:48:25 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2503050389) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 08:48:25 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2503050389) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "hak_kelas", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "nik_pjwb", "nama_pjwb", "kelamin_pjwb", "telp_pjwb", "alamat_pjwb", "tgl_lahir_pjwb", "hubungan_pjwb", "nik_pjwb_finansial", "nama_pjwb_finansial", "kelamin_pjwb_finansial", "telp_pjwb_finansial", "alamat_pjwb_finansial", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2503050389', '00370830', '2025-03-05 08:48:25', 'Poliklinik', '', '', 'Jalan', '1', NULL, NULL, '', '', '', '', '', NULL, '', '', '', '', '', '', '1', '0003019124182', NULL, '102501100225Y004819', 'Baru', NULL, '1765', 0, 'Belum', 'Poliklinik THT', 0, '2', '', '20250305F012')
ERROR - 2025-03-05 08:48:30 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 08:48:53 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 08:49:07 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 08:49:13 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 08:49:14 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 08:49:18 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 08:49:28 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 08:49:28 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-03-05 00:00:00' AND '2025-03-05 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A068%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-03-05 08:49:39 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 08:49:54 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 08:50:26 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 08:51:00 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;null&quot;
LINE 9: WHERE &quot;pd&quot;.&quot;id&quot; = 'null'
                          ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 08:51:00 --> Query error: ERROR:  invalid input syntax for type bigint: "null"
LINE 9: WHERE "pd"."id" = 'null'
                          ^ - Invalid query: SELECT "pd".*, "p"."id" as "no_rm", "p"."rm_lama", "p"."nama", "p"."kelamin", "p"."alamat", "p"."telp", "p"."agama", "p"."no_identitas", "p"."alergi", "p"."rm_lama", "p"."status_kawin", date_part('year', age(p.tanggal_lahir)) as umur_pasien, "p"."tanggal_lahir", "p"."tempat_lahir", "p"."no_rumah", "p"."no_rt", "p"."no_rw", "p"."kode_pos", coalesce(p.nama_prop, '') as provinsi, coalesce(p.nama_kab, '') as kabupaten, coalesce(p.nama_kec, '') as kecamatan, coalesce(p.nama_kel, '') as kelurahan, coalesce(pk.nama, '') as pekerjaan, coalesce(pend.nama, '') as pendidikan, coalesce(pj.nama, '') as penjamin, coalesce(pj.diskon, '0') as diskon, "i"."nama" as "instansi_perujuk", "pjp"."hak_kelas" as "kelas_rawat", "pd"."jenis_igd", "p"."gol_darah"
FROM "sm_pendaftaran" as "pd"
JOIN "sm_pasien" as "p" ON "p"."id" = "pd"."id_pasien"
LEFT JOIN "sm_instansi" as "i" ON "i"."id" = "pd"."id_instansi_perujuk"
LEFT JOIN "sm_pekerjaan" as "pk" ON "pk"."id" = "p"."id_pekerjaan"
LEFT JOIN "sm_pendidikan" as "pend" ON "pend"."id" = "p"."id_pendidikan"
LEFT JOIN "sm_penjamin" as "pj" ON "pj"."id" = "pd"."id_penjamin"
JOIN "sm_penjamin_pasien" as "pjp" ON "pjp"."id_pasien" = "p"."id"
WHERE "pd"."id" = 'null'
ERROR - 2025-03-05 08:51:02 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 08:51:19 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 08:51:50 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 08:51:58 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 08:52:06 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 08:52:06 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 08:52:07 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 08:52:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 08:52:15 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 08:52:45 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 08:52:47 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 08:52:52 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 08:53:00 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 08:53:00 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-03-05 00:00:00' AND '2025-03-05 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A139%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-03-05 08:53:13 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 08:53:46 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 08:54:13 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 08:54:13 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 08:54:21 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 08:54:21 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 08:54:26 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 08:54:32 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 08:54:55 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 08:55:19 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 08:55:28 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 08:56:24 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 08:56:40 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 08:56:48 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 08:56:58 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 08:57:10 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-03-05 08:57:10 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-03-05 08:57:10 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 08:57:11 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-03-05 08:57:14 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-03-05 08:57:14 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-03-05 08:57:16 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-03-05 08:57:18 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 08:57:24 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 08:57:49 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 08:58:01 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-03-05 08:58:05 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 08:58:05 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 08:58:14 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 08:58:14 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 08:58:26 --> Severity: Notice  --> A non well formed numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_hemo/controllers/api/Pemeriksaan_hemo.php 527
ERROR - 2025-03-05 08:58:30 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 812
ERROR - 2025-03-05 08:58:30 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 812
ERROR - 2025-03-05 08:58:30 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 817
ERROR - 2025-03-05 08:58:30 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 817
ERROR - 2025-03-05 08:58:30 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 818
ERROR - 2025-03-05 08:58:30 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 818
ERROR - 2025-03-05 08:58:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 08:58:57 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 08:59:01 --> Severity: Notice  --> Trying to get property 'nama' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/sisa_stok/views/export/sisa_stok_unit.php 44
ERROR - 2025-03-05 08:59:07 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 08:59:09 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 08:59:16 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 08:59:29 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 08:59:30 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 08:59:30 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 08:59:47 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 08:59:58 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:00:16 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:00:19 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:00:30 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:00:49 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:01:04 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 09:01:04 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-03-05 00:00:00' AND '2025-03-05 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A072%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-03-05 09:01:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 09:01:52 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-03-05 09:01:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 09:01:52 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-03-05 09:02:19 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:02:32 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:02:37 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:02:48 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:02:49 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:03:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;undefined&quot;
LINE 3: WHERE &quot;id_resep&quot; = 'undefined'
                           ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 09:03:12 --> Query error: ERROR:  invalid input syntax for type integer: "undefined"
LINE 3: WHERE "id_resep" = 'undefined'
                           ^ - Invalid query: SELECT *
FROM "sm_resep_tebus"
WHERE "id_resep" = 'undefined'
ERROR - 2025-03-05 09:03:12 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:03:14 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 6: WHERE &quot;r&quot;.&quot;id_layanan_pendaftaran&quot; = 'null'
                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 09:03:14 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 6: WHERE "r"."id_layanan_pendaftaran" = 'null'
                                             ^ - Invalid query: SELECT "r".*, "rt"."id" as "id_resep_tebus", "af"."id" as "id_antrian_farmasi", case when rt.cetakan_ke != '0' then 1 else 0 end as is_cetak, "p"."waktu_diserahkan"
FROM "sm_resep" "r"
JOIN "sm_resep_tebus" "rt" ON "r"."id" = "rt"."id_resep"
JOIN "sm_antrian_farmasi" "af" ON "af"."id_layanan_pendaftaran" = "r"."id_layanan_pendaftaran"
LEFT JOIN "sm_penjualan" "p" ON "r"."id" = "p"."id_resep"
WHERE "r"."id_layanan_pendaftaran" = 'null'
ERROR - 2025-03-05 09:03:14 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:03:18 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:03:23 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:03:44 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:03:55 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 812
ERROR - 2025-03-05 09:03:55 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 812
ERROR - 2025-03-05 09:03:55 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 817
ERROR - 2025-03-05 09:03:55 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 817
ERROR - 2025-03-05 09:03:55 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 818
ERROR - 2025-03-05 09:03:55 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 818
ERROR - 2025-03-05 09:03:59 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-03-05 09:03:59 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-03-05 09:04:03 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-03-05 09:04:08 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:04:13 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...erian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES (801300, '6', '', '', 'I...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 09:04:13 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...erian_5", "jam_pemberian_6") VALUES (801300, '6', '', '', 'I...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (801300, '6', '', '', 'Infus', '', 'PC', '0', '', '0', 'MORN', '12 tpm ', '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-03-05 09:04:13 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:04:32 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-03-05 09:04:32 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-03-05 09:04:32 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:04:40 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:05:06 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:05:20 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:05:20 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:06:33 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;&quot;
LINE 1: ... &quot;sm_tarif_tindakan_pasien&quot; SET &quot;id_pengkodean&quot; = '', &quot;id_co...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 09:06:33 --> Query error: ERROR:  invalid input syntax for type integer: ""
LINE 1: ... "sm_tarif_tindakan_pasien" SET "id_pengkodean" = '', "id_co...
                                                             ^ - Invalid query: UPDATE "sm_tarif_tindakan_pasien" SET "id_pengkodean" = '', "id_coder" = '1976'
WHERE "id" = '4256590'
ERROR - 2025-03-05 09:06:36 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:06:55 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:07:02 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-03-05 09:07:02 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-03-05 09:07:09 --> Severity: Warning  --> number_format() expects parameter 1 to be float, string given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export.php 102
ERROR - 2025-03-05 09:07:09 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export.php 111
ERROR - 2025-03-05 09:07:09 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-03-05 09:07:09 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-03-05 09:07:22 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:07:48 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:07:51 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:08:01 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:08:09 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:08:36 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:08:37 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:08:44 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 09:08:44 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-03-05 00:00:00' AND '2025-03-05 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A106%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-03-05 09:08:51 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-03-05 09:09:04 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:09:15 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:09:21 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:09:35 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:09:55 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:09:58 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:10:13 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:10:25 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:10:37 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:10:40 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:11:10 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:11:15 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:11:24 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 09:11:24 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 09:11:31 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:11:40 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:11:48 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:12:00 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:12:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2503050478) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 09:12:10 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2503050478) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2503050478', '00330167', '2025-03-05 09:12:08', 'Poliklinik', NULL, 'Jalan', 1, NULL, NULL, 1, '0002180684957', NULL, '102501020125Y000289', 'Lama', NULL, 1945, 0, 'Belum', 'Poliklinik Jantung', 0, 2, NULL, '20250305B290')
ERROR - 2025-03-05 09:12:40 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:12:51 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:12:56 --> Severity: Warning  --> Division by zero /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 599
ERROR - 2025-03-05 09:12:56 --> Severity: Warning  --> date() expects parameter 2 to be integer, float given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 605
ERROR - 2025-03-05 09:12:56 --> Severity: Warning  --> date() expects parameter 2 to be integer, float given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 606
ERROR - 2025-03-05 09:13:19 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:13:27 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:13:29 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:13:30 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-03-05 09:13:42 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:13:55 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:13:58 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:14:15 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:14:16 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:14:22 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:14:24 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:14:28 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:14:54 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:15:06 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:15:23 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 12167
ERROR - 2025-03-05 09:15:25 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:15:31 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:15:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 09:15:46 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 09:16:09 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:16:21 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:16:23 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:16:41 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 09:16:41 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 09:16:51 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:17:00 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:17:39 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:18:00 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:18:15 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:18:17 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:18:22 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:18:31 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:18:41 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:18:47 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:18:58 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:18:59 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:19:31 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:19:53 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;undefined&quot;
LINE 11: WHERE &quot;rt&quot;.&quot;id&quot; = 'undefined'
                           ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 09:19:53 --> Query error: ERROR:  invalid input syntax for type integer: "undefined"
LINE 11: WHERE "rt"."id" = 'undefined'
                           ^ - Invalid query: SELECT "rt".*, "lp"."id_penjamin", "lp"."cara_bayar", "lp"."jenis_layanan", "pjn"."nama" as "penjamin", date(r.waktu) as tanggal, "pj"."id" as "id_penjualan", "pg"."nama" as "dokter", "p"."tanggal_lahir", "p"."nama" as "nama_pasien", "p"."alamat" as "alamat_pasien", "p"."id" as "id_pasien", "af"."id" as "id_antrian_farmasi"
FROM "sm_resep_tebus" as "rt"
JOIN "sm_resep" as "r" ON "r"."id" = "rt"."id_resep"
LEFT JOIN "sm_antrian_farmasi" as "af" ON "af"."id_resep" = "r"."id"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "r"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
JOIN "sm_pasien" as "p" ON "p"."id" = "r"."id_pasien"
JOIN "sm_layanan_pendaftaran" as "lp" ON "lp"."id" = "r"."id_layanan_pendaftaran"
LEFT JOIN "sm_penjamin" as "pjn" ON "pjn"."id" = "lp"."id_penjamin"
LEFT JOIN "sm_penjualan" as "pj" ON "pj"."id_resep" = "r"."id"
WHERE "rt"."id" = 'undefined'
ORDER BY "r"."waktu" DESC
ERROR - 2025-03-05 09:19:59 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:20:04 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:20:10 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:20:11 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:20:31 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:20:31 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:20:36 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:20:50 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:21:21 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:21:23 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:21:25 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:21:32 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:21:52 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:21:55 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:22:01 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:22:11 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:22:14 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:22:23 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:22:23 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:22:39 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 09:22:39 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 09:22:42 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:22:45 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:22:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 09:22:51 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 09:22:51 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:22:52 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:23:04 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;undefined&quot;
LINE 11: WHERE &quot;rt&quot;.&quot;id&quot; = 'undefined'
                           ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 09:23:04 --> Query error: ERROR:  invalid input syntax for type integer: "undefined"
LINE 11: WHERE "rt"."id" = 'undefined'
                           ^ - Invalid query: SELECT "rt".*, "lp"."id_penjamin", "lp"."cara_bayar", "lp"."jenis_layanan", "pjn"."nama" as "penjamin", date(r.waktu) as tanggal, "pj"."id" as "id_penjualan", "pg"."nama" as "dokter", "p"."tanggal_lahir", "p"."nama" as "nama_pasien", "p"."alamat" as "alamat_pasien", "p"."id" as "id_pasien", "af"."id" as "id_antrian_farmasi"
FROM "sm_resep_tebus" as "rt"
JOIN "sm_resep" as "r" ON "r"."id" = "rt"."id_resep"
LEFT JOIN "sm_antrian_farmasi" as "af" ON "af"."id_resep" = "r"."id"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "r"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
JOIN "sm_pasien" as "p" ON "p"."id" = "r"."id_pasien"
JOIN "sm_layanan_pendaftaran" as "lp" ON "lp"."id" = "r"."id_layanan_pendaftaran"
LEFT JOIN "sm_penjamin" as "pjn" ON "pjn"."id" = "lp"."id_penjamin"
LEFT JOIN "sm_penjualan" as "pj" ON "pj"."id_resep" = "r"."id"
WHERE "rt"."id" = 'undefined'
ORDER BY "r"."waktu" DESC
ERROR - 2025-03-05 09:23:07 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:23:15 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:23:23 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-03-05 09:23:23 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-03-05 09:23:34 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:23:55 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-03-05 09:24:20 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:24:26 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-03-05 09:24:40 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-03-05 09:24:40 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-03-05 09:24:45 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:25:32 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:25:54 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:25:56 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:26:14 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 09:26:14 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 09:26:19 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:26:44 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:27:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;undefined&quot;
LINE 11: WHERE &quot;rt&quot;.&quot;id&quot; = 'undefined'
                           ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 09:27:09 --> Query error: ERROR:  invalid input syntax for type integer: "undefined"
LINE 11: WHERE "rt"."id" = 'undefined'
                           ^ - Invalid query: SELECT "rt".*, "lp"."id_penjamin", "lp"."cara_bayar", "lp"."jenis_layanan", "pjn"."nama" as "penjamin", date(r.waktu) as tanggal, "pj"."id" as "id_penjualan", "pg"."nama" as "dokter", "p"."tanggal_lahir", "p"."nama" as "nama_pasien", "p"."alamat" as "alamat_pasien", "p"."id" as "id_pasien", "af"."id" as "id_antrian_farmasi"
FROM "sm_resep_tebus" as "rt"
JOIN "sm_resep" as "r" ON "r"."id" = "rt"."id_resep"
LEFT JOIN "sm_antrian_farmasi" as "af" ON "af"."id_resep" = "r"."id"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "r"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
JOIN "sm_pasien" as "p" ON "p"."id" = "r"."id_pasien"
JOIN "sm_layanan_pendaftaran" as "lp" ON "lp"."id" = "r"."id_layanan_pendaftaran"
LEFT JOIN "sm_penjamin" as "pjn" ON "pjn"."id" = "lp"."id_penjamin"
LEFT JOIN "sm_penjualan" as "pj" ON "pj"."id_resep" = "r"."id"
WHERE "rt"."id" = 'undefined'
ORDER BY "r"."waktu" DESC
ERROR - 2025-03-05 09:28:19 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 02:28:21 --> Severity: Notice  --> Trying to get property 'tglRencanaKontrol' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/controllers/api/Rawat_inap.php 2867
ERROR - 2025-03-05 02:28:21 --> Severity: Notice  --> Trying to get property 'namaDokter' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/controllers/api/Rawat_inap.php 2868
ERROR - 2025-03-05 02:28:26 --> Severity: Notice  --> Trying to get property 'tglRencanaKontrol' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/controllers/api/Rawat_inap.php 2867
ERROR - 2025-03-05 02:28:26 --> Severity: Notice  --> Trying to get property 'namaDokter' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/controllers/api/Rawat_inap.php 2868
ERROR - 2025-03-05 09:28:28 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:29:06 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:29:11 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:29:53 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:30:00 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:30:51 --> Severity: Notice  --> Undefined offset: 0 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 87
ERROR - 2025-03-05 09:30:51 --> Severity: Notice  --> Trying to get property 'kelamin_pasien' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 89
ERROR - 2025-03-05 09:30:51 --> Severity: Warning  --> Creating default object from empty value /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 89
ERROR - 2025-03-05 09:30:51 --> Severity: Notice  --> Undefined property: stdClass::$is_pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 91
ERROR - 2025-03-05 09:30:51 --> Severity: Notice  --> Undefined property: stdClass::$is_pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 94
ERROR - 2025-03-05 09:30:51 --> Severity: Notice  --> Undefined property: stdClass::$nama_keluarga /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 96
ERROR - 2025-03-05 09:30:51 --> Severity: Notice  --> Undefined property: stdClass::$nama_pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 26
ERROR - 2025-03-05 09:30:51 --> Severity: Notice  --> Undefined property: stdClass::$id_pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 27
ERROR - 2025-03-05 09:30:51 --> Severity: Notice  --> Undefined property: stdClass::$tanggal_lahir_pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 28
ERROR - 2025-03-05 09:30:51 --> Severity: Notice  --> Undefined property: stdClass::$asal_ruangan /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 41
ERROR - 2025-03-05 09:30:51 --> Severity: Notice  --> Undefined property: stdClass::$perawat_yang_merawat /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 59
ERROR - 2025-03-05 09:30:51 --> Severity: Notice  --> Undefined property: stdClass::$perawat_yang_merawat /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 60
ERROR - 2025-03-05 09:30:51 --> Severity: Notice  --> Undefined property: stdClass::$dokter_yang_merawat /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 65
ERROR - 2025-03-05 09:30:51 --> Severity: Notice  --> Undefined property: stdClass::$dokter_yang_merawat /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 66
ERROR - 2025-03-05 09:30:51 --> Severity: Notice  --> Undefined property: stdClass::$nurse_station /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 74
ERROR - 2025-03-05 09:30:51 --> Severity: Notice  --> Undefined property: stdClass::$nurse_station /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 75
ERROR - 2025-03-05 09:30:51 --> Severity: Notice  --> Undefined property: stdClass::$kamar_mandi_pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 79
ERROR - 2025-03-05 09:30:51 --> Severity: Notice  --> Undefined property: stdClass::$kamar_mandi_pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 80
ERROR - 2025-03-05 09:30:51 --> Severity: Notice  --> Undefined property: stdClass::$bel_pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 84
ERROR - 2025-03-05 09:30:51 --> Severity: Notice  --> Undefined property: stdClass::$bel_pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 85
ERROR - 2025-03-05 09:30:51 --> Severity: Notice  --> Undefined property: stdClass::$tempat_tidur_pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 89
ERROR - 2025-03-05 09:30:51 --> Severity: Notice  --> Undefined property: stdClass::$tempat_tidur_pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 90
ERROR - 2025-03-05 09:30:51 --> Severity: Notice  --> Undefined property: stdClass::$remote /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 94
ERROR - 2025-03-05 09:30:51 --> Severity: Notice  --> Undefined property: stdClass::$remote /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 95
ERROR - 2025-03-05 09:30:51 --> Severity: Notice  --> Undefined property: stdClass::$tempat_ibadah /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 99
ERROR - 2025-03-05 09:30:51 --> Severity: Notice  --> Undefined property: stdClass::$tempat_ibadah /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 100
ERROR - 2025-03-05 09:30:51 --> Severity: Notice  --> Undefined property: stdClass::$tempat_sampah /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 104
ERROR - 2025-03-05 09:30:51 --> Severity: Notice  --> Undefined property: stdClass::$tempat_sampah /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 105
ERROR - 2025-03-05 09:30:51 --> Severity: Notice  --> Undefined property: stdClass::$jadwal_pembagian /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 109
ERROR - 2025-03-05 09:30:51 --> Severity: Notice  --> Undefined property: stdClass::$jadwal_pembagian /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 110
ERROR - 2025-03-05 09:30:51 --> Severity: Notice  --> Undefined property: stdClass::$jadwal_visit /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 114
ERROR - 2025-03-05 09:30:51 --> Severity: Notice  --> Undefined property: stdClass::$jadwal_visit /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 115
ERROR - 2025-03-05 09:30:51 --> Severity: Notice  --> Undefined property: stdClass::$jadwal_jam_berkunjung /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 119
ERROR - 2025-03-05 09:30:51 --> Severity: Notice  --> Undefined property: stdClass::$jadwal_jam_berkunjung /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 120
ERROR - 2025-03-05 09:30:51 --> Severity: Notice  --> Undefined property: stdClass::$jadwal_ganti_linen /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 124
ERROR - 2025-03-05 09:30:51 --> Severity: Notice  --> Undefined property: stdClass::$jadwal_ganti_linen /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 125
ERROR - 2025-03-05 09:30:51 --> Severity: Notice  --> Undefined property: stdClass::$membawa_barang_sesuai_keperluan /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 130
ERROR - 2025-03-05 09:30:51 --> Severity: Notice  --> Undefined property: stdClass::$membawa_barang_sesuai_keperluan /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 131
ERROR - 2025-03-05 09:30:51 --> Severity: Notice  --> Undefined property: stdClass::$mematuhi_peraturan /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 136
ERROR - 2025-03-05 09:30:51 --> Severity: Notice  --> Undefined property: stdClass::$mematuhi_peraturan /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 137
ERROR - 2025-03-05 09:30:51 --> Severity: Notice  --> Undefined property: stdClass::$tidak_duduk_ditempat_tidur /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 142
ERROR - 2025-03-05 09:30:51 --> Severity: Notice  --> Undefined property: stdClass::$tidak_duduk_ditempat_tidur /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 143
ERROR - 2025-03-05 09:30:51 --> Severity: Notice  --> Undefined property: stdClass::$menyimpan_barang_berharga /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 148
ERROR - 2025-03-05 09:30:51 --> Severity: Notice  --> Undefined property: stdClass::$menyimpan_barang_berharga /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 149
ERROR - 2025-03-05 09:30:51 --> Severity: Notice  --> Undefined property: stdClass::$dapat_kartu_penunggu /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 154
ERROR - 2025-03-05 09:30:51 --> Severity: Notice  --> Undefined property: stdClass::$dapat_kartu_penunggu /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 155
ERROR - 2025-03-05 09:30:51 --> Severity: Notice  --> Undefined property: stdClass::$menghargai_privasi_pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 160
ERROR - 2025-03-05 09:30:51 --> Severity: Notice  --> Undefined property: stdClass::$menghargai_privasi_pasien /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 161
ERROR - 2025-03-05 09:30:51 --> Severity: Notice  --> Undefined property: stdClass::$gelang /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 169
ERROR - 2025-03-05 09:30:51 --> Severity: Notice  --> Undefined property: stdClass::$gelang /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 170
ERROR - 2025-03-05 09:30:51 --> Severity: Notice  --> Undefined property: stdClass::$cuci_tangan /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 174
ERROR - 2025-03-05 09:30:51 --> Severity: Notice  --> Undefined property: stdClass::$cuci_tangan /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 175
ERROR - 2025-03-05 09:30:51 --> Severity: Notice  --> Undefined property: stdClass::$updated_on /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/views/printing/checklist_penerimaan_pasien_rawat_inap.php 181
ERROR - 2025-03-05 09:31:03 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:31:17 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:31:22 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:31:23 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:31:34 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:31:49 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:32:01 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:32:18 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:32:26 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:32:43 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:33:08 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:33:41 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:34:01 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:34:33 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:34:43 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:34:52 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:35:50 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 14: ...s_layanan = 'Intensive Care'  and ri.id_bangsal = 'null'  or...
                                                              ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 09:35:50 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 14: ...s_layanan = 'Intensive Care'  and ri.id_bangsal = 'null'  or...
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
					COALESCE((select case when va.visited_at is not null then '1' else '0' end from sm_visit_anestesi va where va.id_layanan_pendaftaran = lp.id and va.id_pegawai = '1688' LIMIT 1 ), '0') as visit_anestesi  from sm_layanan_pendaftaran as lp 
				join sm_intensive_care as ri on (ri.id_layanan_pendaftaran = lp.id) 
				join sm_kelas as k on (k.id = ri.id_kelas) join sm_pendaftaran as pd on (pd.id = lp.id_pendaftaran) join sm_pasien as p on (p.id = pd.id_pasien) left join sm_penjamin as pj on (pj.id = lp.id_penjamin) left join sm_spesialisasi as sp on (sp.id = lp.id_unit_layanan) left join sm_tenaga_medis as tm on (tm.id = lp.id_dokter) left join sm_pegawai as pg on (pg.id = tm.id_pegawai) left join sm_translucent as tr on (tr.id = lp.id_users_sep) left join sm_order_intensive_care as odri on (odri.id_intensive_care = ri.id) left join sm_tenaga_medis as tmdpjp on (tmdpjp.id = odri.id_dokter_dpjp) left join sm_pegawai as pgdpjp on (pgdpjp.id = tmdpjp.id_pegawai)  where lp.jenis_layanan = 'Intensive Care'  and ri.id_bangsal = 'null'  order by ri.id desc  limit 10 offset -10
ERROR - 2025-03-05 09:36:05 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:36:09 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:36:47 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:37:06 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:37:13 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-03-05 09:37:13 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-03-05 09:37:14 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:37:38 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:37:38 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:38:47 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:38:56 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:39:09 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:39:10 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:39:16 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 09:39:16 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 09:39:25 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:39:37 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 09:39:37 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 09:39:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 09:39:51 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 09:39:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2503050521) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 09:39:52 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2503050521) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "hak_kelas", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "nik_pjwb", "nama_pjwb", "kelamin_pjwb", "telp_pjwb", "alamat_pjwb", "tgl_lahir_pjwb", "hubungan_pjwb", "nik_pjwb_finansial", "nama_pjwb_finansial", "kelamin_pjwb_finansial", "telp_pjwb_finansial", "alamat_pjwb_finansial", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2503050521', '00303125', '2025-03-05 09:39:52', 'Poliklinik', '', '', 'Jalan', '2', NULL, NULL, '', '', '', '', '', NULL, '', '', '', '', '', '', '1', '0000272505947', NULL, '0496B0461224P000995', 'Lama', NULL, '1773', 0, 'Belum', 'Poliklinik Penyakit Dalam', 0, '2', '', '20250305B402')
ERROR - 2025-03-05 09:40:13 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-03-05 09:40:13 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-03-05 09:40:19 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-03-05 09:40:19 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-03-05 09:40:45 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:40:49 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:40:50 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:40:54 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:40:58 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:40:59 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-03-05 09:40:59 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-03-05 09:41:00 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2503050524) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 09:41:00 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2503050524) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2503050524', '00194036', '2025-03-05 09:40:59', 'Poliklinik', NULL, 'Jalan', 1, NULL, NULL, 1, '0001732479579', NULL, '102506020325Y000409', 'Lama', NULL, 1950, 0, 'Belum', 'Poliklinik Penyakit Dalam', 0, 2, NULL, '20250305B409')
ERROR - 2025-03-05 09:41:02 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:41:10 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-03-05 09:41:10 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-03-05 09:41:14 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:41:26 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:41:36 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:42:31 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 09:42:31 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 09:42:57 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:43:05 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:43:05 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:43:06 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:43:13 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:43:15 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:43:16 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:43:17 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:43:23 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:43:24 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2503050530) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 09:43:24 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2503050530) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2503050530', '00315726', '2025-03-05 09:43:21', 'Poliklinik', NULL, 'Jalan', 1, NULL, NULL, 1, '0000815364797', NULL, '022310040325Y000319', 'Lama', NULL, 1945, 0, 'Belum', 'Poliklinik Jantung', 0, 2, NULL, '20250305B411')
ERROR - 2025-03-05 09:44:07 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:44:29 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:44:29 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 09:44:29 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-03-05 09:44:29 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 09:44:29 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-03-05 09:44:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ..._5&quot;, &quot;jam_pemberian_6&quot;) VALUES (801441, '5', '2', '', '', ''...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 09:44:52 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ..._5", "jam_pemberian_6") VALUES (801441, '5', '2', '', '', ''...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (801441, '5', '2', '', '', '', 'PC', '0', '', '0', '', 'bhp', '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-03-05 09:45:00 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 09:45:00 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 09:45:02 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:45:09 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-03-05 09:45:19 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:45:21 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:45:39 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 09:45:39 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 09:45:45 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:46:11 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:46:29 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:46:46 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:46:55 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:47:10 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:47:32 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:48:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 1: ...yanan_pendaftaran&quot; = '703248', &quot;id_pendaftaran&quot; = '', &quot;id_us...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 09:48:03 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 1: ...yanan_pendaftaran" = '703248', "id_pendaftaran" = '', "id_us...
                                                             ^ - Invalid query: UPDATE "sm_pengkajian_awal_kebidanan_dan_kandungan" SET "id_layanan_pendaftaran" = '703248', "id_pendaftaran" = '', "id_users" = '2049', "waktu_kajian_kebidanan" = '2025-03-03 12:54', "cara_tiba" = '{"cara_tiba_diruangan_pasien":"Jalan"}', "rujukan" = '{"rujukan_pasien_1":null,"rujukan_pasien_2":null,"rujukan_pasien_3":null,"rujukan_pasien_4":null,"rujukan_pasien_5":null,"rujukan_pasien_6":null,"rujukan_pasien_7":"Tidak ada Rujukan","rujukan_pasien_8":null,"rujukan_pasienl":null}', "informasi" = '{"informasi_pasien":"Pasien","informasi_pasienn":null}', "keluhan_utama_keb" = '{"keluhan_utama_keb_1":null,"keluhan_utama_keb_2":null,"keluhan_utama_keb_3":null,"keluhan_utama_keb_4":null,"keluhan_utama_keb_5":null,"keluhan_utama_keb_6":null,"keluhan_utama_keb_7":null,"keluhan_utama_keb_8":null,"keluhan_utama_keb_9":null,"keluhan_utama_keb_10":"1","keluhan_utama_keb_11":null}', "rks_hamil_muda" = '{"hamil_muda_1":"1","hamil_muda_2":null,"hamil_muda_3":null,"hamil_muda_4":null,"hamil_lain_lain":null}', "rks_hamil_tua" = '{"hamil_tua_1":null,"hamil_tua_2":null,"hamil_tua_3":null,"hamil_tua_4":null,"hamil_lain_5":null}', "rks_anc" = '{"anc_1":"3","anc_2":"pkm","anc_3":"1","anc_4":null,"anc_5":null}', "rks_g" = '1', "rks_p" = '0', "rks_a" = '0', "rks_usia_kehamilan" = '-', "rks_hpht" = 'lupa ', "rks_tp" = '-', "rk_riwayat_menstruasi" = '{"riwayat_menstruasi_1":null,"riwayat_menstruasi_2":"12","riwayat_menstruasi_3":"6","riwayat_menstruasi_4":"3","riwayat_menstruasi_5":"1","riwayat_menstruasi_6":null,"riwayat_menstruasi_7":null,"riwayat_menstruasi_8":null,"riwayat_menstruasi_9":null}', "rk_riwayat_perkawinan" = '{"riwayat_perkawinan_1":"1","riwayat_perkawinan_2":null,"riwayat_perkawinan_3":"4 bulan ","riwayat_perkawinan_4":"1","riwayat_perkawinan_5":null,"riwayat_perkawinan_6":null,"riwayat_perkawinan_7":null,"riwayat_perkawinan_8":null,"riwayat_perkawinan_9":null,"riwayat_perkawinan_10":null,"riwayat_perkawinan_11":null}', "rk_riwayat_penyakit_operasi" = '{"riwayat_penyakit_oprasi_1":null,"riwayat_penyakit_oprasi_2":null,"riwayat_penyakit_oprasi_3":null,"riwayat_penyakit_oprasi_4":null,"riwayat_penyakit_oprasi_5":null,"riwayat_penyakit_oprasi_6":null,"riwayat_penyakit_oprasi_7":null,"riwayat_penyakit_oprasi_8":null,"riwayat_penyakit_oprasi_9":null,"riwayat_penyakit_oprasi_10":null,"riwayat_penyakit_oprasi_11":"1","riwayat_penyakit_oprasi_13":null,"riwayat_penyakit_oprasi_14":null,"riwayat_penyakit_oprasi":"1","riwayat_penyakit_oprasi_17":null,"riwayat_penyakit_oprasi_18":null}', "rk_obat_dikosumsi" = '-', "rk_membawa_obat_dari_luar" = '{"membawa_obat_1":"0"}', "rk_terapi_komplementari" = '{"terapi_komplementari_1":null,"terapi_komplementari_2":"-","terapi_komplementari_3":null,"terapi_komplementari_4":null,"terapi_komplementari_5":null,"terapi_komplementari_6":null}', "rk_riwayat_penyakit_kluwarga" = '{"riwayat_penyakit_kluwarga_1":null,"riwayat_penyakit_kluwarga_2":null,"riwayat_penyakit_kluwarga_3":null,"riwayat_penyakit_kluwarga_4":null,"riwayat_penyakit_kluwarga_5":null,"riwayat_penyakit_kluwarga_6":null,"riwayat_penyakit_kluwarga_7":null,"riwayat_penyakit_kluwarga_8":null,"riwayat_penyakit_kluwarga_9":null,"riwayat_penyakit_kluwarga_10":null,"riwayat_penyakit_kluwarga_11":null,"riwayat_penyakit_kluwarga_12":null,"riwayat_penyakit_kluwarga_13":null,"riwayat_penyakit_kluwarga_14":null,"riwayat_penyakit_kluwarga_15":null}', "rk_riwayat_kluwarga_berencana" = '{"riwayat_kel_berencana_1":null,"riwayat_kel_berencana_2":null,"riwayat_kel_berencana_3":null,"riwayat_kel_berencana_4":null,"riwayat_kel_berencana_5":null,"riwayat_kel_berencana_6":null,"riwayat_kel_berencana_7":"-","riwayat_kel_berencana_8":null,"riwayat_kel_berencana_9":null}', "rk_riwayat_ginekologi" = '{"riwayat_ginekologi_1":null,"riwayat_ginekologi_2":null,"riwayat_ginekologi_3":null,"riwayat_ginekologi_4":null,"riwayat_ginekologi_5":null,"riwayat_ginekologi_6":null,"riwayat_ginekologi_7":null,"riwayat_ginekologi_8":null,"riwayat_ginekologi_9":null,"riwayat_ginekologi_10":null,"riwayat_ginekologi_11":null,"riwayat_ginekologi_12":null}', "rk_riwayat_alergi" = '{"riwayat_alergi_1":"1","riwayat_alergi_3":null,"riwayat_alergi_4":null,"riwayat_alergi_5":null,"riwayat_alergi_6":null,"riwayat_alergi_7":null,"riwayat_alergi_8":null}', "rk_riwayat_tranfusi_darah" = '{"riwayat_tranfusi_darah_1":"1","riwayat_tranfusi_darah_2":null,"riwayat_tranfusi_darah_3":null,"riwayat_tranfusi_darah_5":null}', "rk_kebiasaan" = '{"kebiasaan_1":null,"kebiasaan_2":null,"kebiasaan_3":null,"kebiasaan_4":null,"kebiasaan_5":null,"kebiasaan_6":null}', "rk_status_psikologi" = '{"status_psikologis_1":null,"status_psikologis_2":null,"status_psikologis_3":null,"status_psikologis_4":null,"status_psikologis_5":"1","status_psikologis_6":null,"status_psikologis_7":null,"status_psikologis_8":null,"status_psikologis_9":null,"status_psikologis_10":"-"}', "rk_status_mental" = '{"status_mental_1":"1","status_mental_2":null,"status_mental_3":null,"status_mental_4":null,"status_mental_5":null}', "rk_kebutuhan_biologis" = '{"kebutuhan_biologis_1":"3","kebutuhan_biologis_2":"13:00","kebutuhan_biologis_3":"6","kebutuhan_biologis_4":"13:00","kebutuhan_biologis_5":"6","kebutuhan_biologis_6":"13:00","kebutuhan_biologis_7":"1","kebutuhan_biologis_8":"6:00","kebutuhan_biologis_9":null}', "rk_kebutuhan_sosial" = '{"kebutuhan_sosial_1":"1","kebutuhan_sosial_2":null,"kebutuhan_sosial_3":null,"kebutuhan_sosial_4":"1","kebutuhan_sosial_5":null,"kebutuhan_sosial_6":null,"kebutuhan_sosial_7":null,"kebutuhan_sosial_8":"1","kebutuhan_sosial_10":"1","kebutuhan_sosial_11":"1","kebutuhan_sosial_12":"1","kebutuhan_sosial_13":null,"kebutuhan_sosial_14":null}', "rk_status_ekonomi" = '{"status_ekonomi_1":null,"status_ekonomi_2":null,"status_ekonomi_3":null,"status_ekonomi_4":"1","status_ekonomi_5":null,"status_ekonomi_6":"1","status_ekonomi_7":null,"status_ekonomi_8":null,"status_ekonomi_9":null}', "rk_status_nilai_kepercayaan" = '{"status_nn_kepercayaan_1":"1","status_nn_kepercayaan_3":null,"status_nn_kepercayaan_4":"1","status_nn_kepercayaan_6":null,"status_nn_kepercayaan_7":"-"}', "rk_spiritual" = '{"spiritual_1":"1","spiritual_2":null,"spiritual_3":null,"spiritual_4":null,"spiritual_5":"1","spiritual_6":null,"spiritual_7":"1","spiritual_8":null,"spiritual_9":null}', "rk_budaya" = '{"budaya_1":null,"budaya_2":"1","budaya_3":null,"budaya_4":null,"budaya_5":null,"budaya_6":null,"budaya_7":"1","budaya_8":null,"budaya_9":null,"budaya_10":null,"budaya_11":null,"budaya_12":"1","budaya_14":"1","budaya_16":null,"budaya_17":"1","budaya_19":null,"budaya_20":"0","budaya_22":null}', "ikbe_kewarganegaraan" = '1', "ikbe_suku_bangsa" = NULL, "ikbe_bicara" = '0', "ikbe_jelaskan" = NULL, "ikbe_perlu_peterjemah" = '0', "ikbe_bahasa" = NULL, "ikbe_bahasa_isyarat" = '0', "ikbe_pemahaman_penyakit" = '1', "ikbe_pemahaman_pengobatan" = '1', "ikbe_pemahaman_nutrisi" = '1', "ikbe_pemahaman_spiritual" = '1', "ikbe_pemahaman_peralatan" = '1', "ikbe_pemahaman_rahab" = '1', "ikbe_pemahaman_manajemen" = '1', "hambatan_keb" = '{"hambatan_keb_1":"1","hambatan_keb_2":null,"hambatan_keb_3":null,"hambatan_keb_4":null,"hambatan_keb_5":null,"hambatan_keb_6":null,"hambatan_keb_7":null,"hambatan_keb_8":null,"hambatan_keb_9":null,"hambatan_keb_10":null}', "pkdk_inpeksi_abdomen" = '{"infeksi_abdomen_1":null,"infeksi_abdomen_2":"1","infeksi_abdomen_3":null,"infeksi_abdomen_4":null,"infeksi_abdomen_5":null,"infeksi_abdomen_6":null,"infeksi_abdomen_7":null,"infeksi_abdomen_8":null,"infeksi_abdomen_9":null,"infeksi_abdomen_10":null}', "pkdk_palpasi" = '{"palpasi_1":"28","palpasi_2":null,"palpasi_3":null,"palpasi_4":null,"palpasi_5":null,"palpasi_6":null,"palpasi_7":null,"palpasi_8":null,"palpasi_9":null,"palpasi_10":"1","palpasi_11":null,"palpasi_12":null,"palpasi_13":null,"palpasi_14":"1","palpasi_15":null,"palpasi_16":"-","palpasi_17":"-"}', "pkdk_auskultasi" = '{"auskultasi_1":"145","auskultasi_2":null,"auskultasi_3":null,"auskultasi_4":null}', "pkdk_gerak_janin" = '> 4', "pkdk_his_kontraksi" = '{"his_konteraksi_1":"2","his_konteraksi_2":"10","his_konteraksi_3":"10"}', "pkdk_pemeriksaan_dalam" = '{"pemeriksaan_dalam_1":null,"pemeriksaan_dalam_2":null,"pemeriksaan_dalam_3":null,"pemeriksaan_dalam_4":null,"pemeriksaan_dalam_5":null,"pemeriksaan_dalam_6":null,"pemeriksaan_dalam_7":null,"pemeriksaan_dalam_8":null,"pemeriksaan_dalam_9":"-","pemeriksaan_dalam_10":null,"pemeriksaan_dalam_11":null,"pemeriksaan_dalam_12":null,"pemeriksaan_dalam_13":null}', "pkf_makan" = '10', "pkf_mandi" = '5', "pkf_personal" = '5', "pkf_berpakaian" = '5', "pkf_buang_besar" = '5', "pkf_buang_kecil" = '10', "pkf_berpindah" = '10', "pkf_toileting" = '5', "pkf_mobilitas" = '10', "pkf_naik" = '5', "pkf_jumlah_skor" = '70', "sn_penurunan_bb_kebidanan" = '1', "sn_penurunan_bb_on_kebidanan" = NULL, "sn_asupan_makan_kebidanan" = '0', "sn_total_kebidanan" = '0', "ptn_nilai_tingkat_nyeri" = '{"keterangan_kebidanan_1":"Berat"}', "ptn_nyeri_hilang" = '{"nyeri_hilang_kebidanan_1":"1","nyeri_hilang_kebidanan_2":null,"nyeri_hilang_kebidanan_3":"1","nyeri_hilang_kebidanan_4":null,"nyeri_hilang_kebidanan_5":null,"nyeri_hilang_kebidanan_6":null}', "prjd_riwayat_jatuh" = NULL, "prjd_diagnosis" = NULL, "prjd_kursi_roda" = NULL, "prjd_kruk_tongkat" = NULL, "prjd_berpegangan" = NULL, "prjd_terpasang_infus" = NULL, "prjd_normal" = NULL, "prjd_lemah" = '10', "prjd_terganggu" = NULL, "prjd_sadar" = NULL, "prjd_sering" = NULL, "prjd_jumlah_skor" = '10', "spak_usia" = '0', "spak_nafas" = '0', "spak_sepsis" = '0', "spak_multiple" = '0', "spak_studium" = '0', "pftv_kesadaran" = '{"kesadaran_1":"1","kesadaran_2":null,"kesadaran_3":null,"kesadaran_4":null}', "pftv_gsc_e" = '4', "pftv_gsc_m" = '6', "pftv_gsc_v" = '5', "pftv_total" = '15', "pftv_tekanan_darah" = '{"tekanan_darah_1":"117","tekanan_darah_2":"68","tekanan_darah_3":"36.8"}', "pftv_frekuensi_nadi" = '{"frekuensi_nadi_1":"78","frekuensi_nadi_2":"20"}', "pftv_berat_badan" = '{"berat_badan_1":"68","berat_badan_2":"156"}', "pftv_mata" = '{"mata_1":null,"mata_2":null,"mata_3":null,"mata_4":null}', "pftv_dada_aksila" = '{"dada_askila_1":"1","dada_askila_2":null,"dada_askila_3":null,"dada_askila_4":null,"dada_askila_5":null,"dada_askila_6":null}', "pftv_ekstremitas" = '{"ekstremitas_1":"1","ekstremitas_2":null,"ekstremitas_3":null,"ekstremitas_4":null}', "pftv_sistem_pernafasan" = '{"sistem_pernafasan_1":null,"sistem_pernafasan_2":null,"sistem_pernafasan_3":null,"sistem_pernafasan_4":null,"sistem_pernafasan_5":null,"sistem_pernafasan_6":null,"sistem_pernafasan_7":null,"sistem_pernafasan_8":null,"sistem_pernafasan_9":null}', "pftv_sistem_kardiovaskuler" = '{"sistem_kardiovaskuler_1":"1","sistem_kardiovaskuler_2":null,"sistem_kardiovaskuler_3":null,"sistem_kardiovaskuler_4":null,"sistem_kardiovaskuler_5":"1","sistem_kardiovaskuler_7":null,"sistem_kardiovaskuler_8":"1","sistem_kardiovaskuler_10":"1","sistem_kardiovaskuler_11":null,"sistem_kardiovaskuler_12":null,"sistem_kardiovaskuler_13":"1","sistem_kardiovaskuler_14":null,"sistem_kardiovaskuler_15":null,"sistem_kardiovaskuler_16":null}', "sews_respirasi" = '0_2', "sews_saturasi_1" = '0_3', "sews_o2" = '0_2', "sews_suhu" = '0_2', "sews_td_sistolik" = '0_2', "sews_td_diastolik" = '0_1', "sews_nadi" = '0_3', "sews_kesadaran_1" = '0_1', "sews_nyeri" = '0_1', "sews_pengeluaran" = '0_1', "sews_protein_urin" = NULL, "sews_total_1" = 'Putih', "sews_laju_respirasi" = NULL, "sews_saturasi_2" = NULL, "sews_suplemen" = NULL, "sews_temperatur" = NULL, "sews_tds" = NULL, "sews_laju_jantung" = NULL, "sews_kesadaran_2" = '1', "sews_total_2" = NULL, "dp_pemeriksaan_lab_tanggal" = '2025-03-03', "dp_pemeriksaan_ctg_tanggal" = '2025-03-03', "dp_hasil" = 'terlampir ', "dp_hasil1" = 'terlampir ', "dp_lain_lain" = NULL, "pk_penyakit_menular" = '{"pk_penyakit_menular_1":"0","pk_penyakit_menular_3":null,"pk_penyakit_menular_4":null,"pk_penyakit_menular_5":null,"pk_penyakit_menular_6":null,"pk_penyakit_menular_7":null,"pk_penyakit_menular_8":null,"pk_penyakit_menular_9":null,"pk_penyakit_menular_11":"0","pk_penyakit_menular_13":null,"pk_penyakit_menular_14":null,"pk_penyakit_menular_15":null,"pk_penyakit_menular_16":null,"pk_penyakit_menular_17":null,"pk_penyakit_menular_18":"0","pk_penyakit_menular_20":null}', "pk_penurunan_daya_tahan_tubuh" = '{"penyakit_saat_ini":"","informasi_dari":{"dokter":"","perawat":"","keluarga":"","lain":"","ket_lain":""},"informasi_jangka_waktu":"","ket_informasi_jangka_waktu":"","pemeriksaan_rutin":"","ket_pemeriksaan_rutin":"","penyakit_penyerta":"","ket_penyakit_penyerta":""}', "pk_kesehatan_jiwa" = '{"ket_1":"","ket_2":"","ket_3":"","ket_4":"","ket_5":"","ket_6":"","ket_7":"","ket_8":"","ket_9":""}', "pk_pasien_kekerasan_penganiayaan" = '{"ket_1":"0","ket_2":"","ket_3":"","ket_4":"","ket_5":"","ket_6":"1"}', "pk_pasien_ketergantungan_obat" = '{"obat":"1","ket_obat":"","lama_ketergantungan":""}', "ak_infeksi" = NULL, "ak_anxeitas" = '1', "ak_perdarahan" = NULL, "ak_melahirkan" = '1', "ak_nausea" = NULL, "ak_efektif" = NULL, "ak_janin" = NULL, "ak_lain" = NULL, "ak_lainl" = NULL, "rak_kluwarga" = '1', "rak_selanjutnya" = '1', "rak_consent" = '1', "rak_kebutuhan" = '1', "rak_persalinan" = NULL, "rak_pasien" = '1', "rak_lain" = NULL, "rak_lainl" = NULL, "kriteria_discharge_planing" = '{"discharge_planning_kebidanan_1":null,"discharge_planning_kebidanan_2":null,"discharge_planning_kebidanan_3":"1","discharge_planning_kebidanan_4":null}', "perencanaa_pulang" = '{"kriteria_discharge_kebidanan_1":null,"kriteria_discharge_kebidanan_2":null,"kriteria_discharge_kebidanan_3":null,"kriteria_discharge_kebidanan_4":null,"kriteria_discharge_kebidanan_5":null,"kriteria_discharge_kebidanan_6":null,"kriteria_discharge_kebidanan_7":null,"kriteria_discharge_kebidanan_8":"1","kriteria_discharge_kebidanan_9":null,"kriteria_discharge_kebidanan_10":null}', "tanggal_jam_bidan" = '2025-03-03 12:54:00', "id_bidan" = '298', "ttd_bidan" = '1', "tanggal_jam_dokter_keb" = '2025-03-03 13:01:00', "id_dokter" = '579', "ttd_dokter" = '1', "updated_date" = '2025-03-05 09:48:03'
WHERE "id" = '2636'
ERROR - 2025-03-05 09:48:10 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:48:11 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:48:12 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:48:19 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:48:28 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:48:29 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:48:35 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:48:52 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:49:16 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:49:38 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:49:57 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:50:05 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:50:14 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:50:20 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:50:34 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:50:59 --> Severity: Warning  --> number_format() expects parameter 1 to be float, string given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export.php 102
ERROR - 2025-03-05 09:50:59 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export.php 111
ERROR - 2025-03-05 09:51:59 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:52:21 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 09:52:21 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 09:52:27 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type date: &quot;&quot;
LINE 4: AND &quot;tanggal_kunjungan&quot; = ''
                                  ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 09:52:27 --> Query error: ERROR:  invalid input syntax for type date: ""
LINE 4: AND "tanggal_kunjungan" = ''
                                  ^ - Invalid query: SELECT max(urutan) as urutan
FROM "sm_antrian_bpjs"
WHERE "usia_pasien" = 'Prioritas'
AND "tanggal_kunjungan" = ''
ERROR - 2025-03-05 09:52:31 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:52:50 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-03-05 09:53:07 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:53:32 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 812
ERROR - 2025-03-05 09:53:32 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 812
ERROR - 2025-03-05 09:53:32 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 817
ERROR - 2025-03-05 09:53:32 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 817
ERROR - 2025-03-05 09:53:32 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 818
ERROR - 2025-03-05 09:53:32 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 818
ERROR - 2025-03-05 09:53:49 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 09:53:49 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 09:53:52 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:54:17 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:54:18 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 09:54:18 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 09:54:29 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:54:37 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 09:54:37 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 09:54:49 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:54:54 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:54:58 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-03-05 09:55:24 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:55:34 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:55:38 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:56:07 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 09:56:07 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 09:56:11 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:56:13 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:56:26 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-03-05 09:56:29 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:56:34 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:56:35 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:56:37 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:56:46 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:56:55 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:56:59 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:57:09 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:57:09 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:57:24 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:57:38 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:57:54 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:58:02 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:58:02 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:58:07 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:58:24 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:58:34 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-03-05 09:58:58 --> Severity: Notice  --> Trying to get property 'jenis_layanan' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pengkodean_icd_x/controllers/api/Pengkodean_icd_x.php 350
ERROR - 2025-03-05 09:59:02 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:59:17 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:59:29 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type date: &quot;&quot;
LINE 4: AND date(tanggal_layanan) = ''
                                    ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 09:59:29 --> Query error: ERROR:  invalid input syntax for type date: ""
LINE 4: AND date(tanggal_layanan) = ''
                                    ^ - Invalid query: SELECT max(no_antrian) as no_antrian
FROM "sm_layanan_pendaftaran"
WHERE "id_unit_layanan" = '14'
AND date(tanggal_layanan) = ''
ERROR - 2025-03-05 09:59:52 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 09:59:58 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 09:59:58 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-03-05 10:00:00 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 10:00:00 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-03-05 10:00:07 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 10:00:37 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 10:00:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xde 0x6e /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 10:00:52 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xde 0x6e - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('704620', '2025-03-05 09:21', '18', 'pasien datang dg keluhan sesak sejak 2 hari terakhir, sejak malam ini pasien sulit diajak komunikasi. tampak napas cepat, merespon bila dibangunkan. mual + muntah + terutama bila makan dan minum, pasien tampak menguning di kedua mata sejak 2 hari ini. perut teraba keras +. bak masih bisa sedikit sedikit. kedua kaki tampak bengkak. ', 'Kesadaran coma. GCS 3 E1M1V1. EWS merah. tampak napas cepat . terpasang infus RL 500 cc/8 jam . vason 1mcg/kgbb.dopamin 5 microbb 50 kg di seting 3.75cc/jam .TD 74/56  nadi : 105x/ menit. respirasi: 12x/ menit. suhu : 36.4 celcius. spo2 : 95 Þngan NRM 15 lpm.sebelumnya pasien sudah di rujuk ke RSCM karena curiga tumor hepar, rencana ct scan tetapi belum dikalkukan,11 sudah cek hcv dan hbsag hasil nion reaktif
. tgl 5/3/2025 rontgen thorax tunggu hasil .EKG terlampir.periksa laboratorium hemoglobin : 13.1 hematokrit : 40 leukosit : 10.7 trombosit : 364.000. Ureum: 233 creatinin: 5.7.SGOT 152 SGPT 47 GDS 56 Natrium 131 kalium 7.9. pasien post looding RL 3 kolp urine post looding 50 cc. IC kondisi (+)', 'pola napas tidak efektif. risiko syok', 'Setelah dilakukan asuhan keperwatan selama 2x24 jam Inspirasi dan atau ekspirasi yang memberikan ventilasi membaik.risiko syok tidak terjadi 

', '', '', '', '', '', '', '', '', '1544', '1', 'Untuk PP Sore :<div>Monitor pola nafas. Monitor bunyi nafas tambahan. Posisikan semi fowler atau fowler. Berikan oksigen,jika perlu. Ajarkan tehnik batuk efektif.Periksa tingkat kesadaran dan respon pupil.Monitor status kardiopulmonal (frekuensi dan kekuatan nadi, frekuensi napas, TD,MAP).Monitor status kardiopulmonal (frekuensi dan kekuatan nadi, frekuensi napas, TD,MAP).Berikan oksigen untuk mempertahankan saturasi oksigen >94%</div><div><br></div><div></div><div>Untuk PP Sore :</div><div>Monitor pola nafas. Monitor bunyi nafas tambahan. Posisikan semi fowler atau fowler. Berikan oksigen,jika perlu. Ajarkan tehnik batuk efektif.Berikan oksigen,jika perlu. Ajarkan tehnik batuk efektif.Periksa tingkat kesadaran dan respon pupil.Monitor status kardiopulmonal (frekuensi dan kekuatan nadi, frekuensi napas, TD,MAP).Monitor status kardiopulmonal (frekuensi dan kekuatan nadi, frekuensi napas, TD,MAP).Berikan oksigen untuk mempertahankan saturasi oksigen >94%</div><div><br></div>', NULL, '1544', 0, NULL, '2025-03-05 10:00:52')
ERROR - 2025-03-05 10:01:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xde 0x6e /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 10:01:10 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xde 0x6e - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('704620', '2025-03-05 09:21', '18', 'pasien datang dg keluhan sesak sejak 2 hari terakhir, sejak malam ini pasien sulit diajak komunikasi. tampak napas cepat, merespon bila dibangunkan. mual + muntah + terutama bila makan dan minum, pasien tampak menguning di kedua mata sejak 2 hari ini. perut teraba keras +. bak masih bisa sedikit sedikit. kedua kaki tampak bengkak. ', 'Kesadaran coma. GCS 3 E1M1V1. EWS merah. tampak napas cepat . terpasang infus RL 500 cc/8 jam . vason 1mcg/kgbb.dopamin 5 microbb 50 kg di seting 3.75cc/jam .TD 74/56  nadi : 105x/ menit. respirasi: 12x/ menit. suhu : 36.4 celcius. spo2 : 95 Þngan NRM 15 lpm.sebelumnya pasien sudah di rujuk ke RSCM karena curiga tumor hepar, rencana ct scan tetapi belum dikalkukan,11 sudah cek hcv dan hbsag hasil nion reaktif
. tgl 5/3/2025 rontgen thorax tunggu hasil .EKG terlampir.periksa laboratorium hemoglobin : 13.1 hematokrit : 40 leukosit : 10.7 trombosit : 364.000. Ureum: 233 creatinin: 5.7.SGOT 152 SGPT 47 GDS 56 Natrium 131 kalium 7.9. pasien post looding RL 3 kolp urine post looding 50 cc. IC kondisi (+)', 'pola napas tidak efektif. risiko syok', 'Setelah dilakukan asuhan keperwatan selama 2x24 jam Inspirasi dan atau ekspirasi yang memberikan ventilasi membaik.risiko syok tidak terjadi 

', '', '', '', '', '', '', '', '', '1544', '1', 'Untuk PP Sore :<div>Monitor pola nafas. Monitor bunyi nafas tambahan. Posisikan semi fowler atau fowler. Berikan oksigen,jika perlu. Ajarkan tehnik batuk efektif.Periksa tingkat kesadaran dan respon pupil.Monitor status kardiopulmonal (frekuensi dan kekuatan nadi, frekuensi napas, TD,MAP).Monitor status kardiopulmonal (frekuensi dan kekuatan nadi, frekuensi napas, TD,MAP).Berikan oksigen untuk mempertahankan saturasi oksigen</div><div><br></div><div></div><div>Untuk PP Sore :</div><div>Monitor pola nafas. Monitor bunyi nafas tambahan. Posisikan semi fowler atau fowler. Berikan oksigen,jika perlu. Ajarkan tehnik batuk efektif.Berikan oksigen,jika perlu. Ajarkan tehnik batuk efektif.Periksa tingkat kesadaran dan respon pupil.Monitor status kardiopulmonal (frekuensi dan kekuatan nadi, frekuensi napas, TD,MAP).Monitor status kardiopulmonal (frekuensi dan kekuatan nadi, frekuensi napas, TD,MAP).Berikan oksigen untuk mempertahankan saturasi oksigen</div><div><br></div>', NULL, '1544', 0, NULL, '2025-03-05 10:01:10')
ERROR - 2025-03-05 10:01:13 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 10:01:25 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 10:01:25 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 10:02:23 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 10:02:23 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 10:02:23 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 10:02:35 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 10:02:48 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 10:02:48 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 10:03:00 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 10:03:37 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 10:04:07 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;&quot;
LINE 1: ...', &quot;no_rumah&quot; = '', &quot;kode_pos&quot; = '', &quot;id_etnis&quot; = '', &quot;email...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 10:04:07 --> Query error: ERROR:  invalid input syntax for type integer: ""
LINE 1: ...', "no_rumah" = '', "kode_pos" = '', "id_etnis" = '', "email...
                                                             ^ - Invalid query: UPDATE "sm_pasien" SET "id" = '00200627', "status_pasien" = NULL, "nama" = 'NOOR RACHMAWATI', "kelamin" = 'P', "tempat_lahir" = '', "tanggal_lahir" = '1970-01-31', "alamat" = 'DUTA BINTARO BLOK D II -12 RT. 005/008 KUNCIRAN PINANG KOTA TANGERANG BANTEN', "no_prop" = '36', "nama_prop" = 'BANTEN', "no_kab" = '71', "nama_kab" = 'KOTA TANGERANG', "no_kec" = '11', "nama_kec" = 'PINANG', "no_kel" = '1004', "nama_kel" = 'KUNCIRAN', "agama" = 'Islam', "gol_darah" = '', "id_pendidikan" = '8', "id_pekerjaan" = '5', "status_kawin" = '', "nama_ayah" = '', "nama_ibu" = '', "no_identitas" = '3671117101700006', "telp" = '087888907080', "status" = 'Hidup', "no_rt" = '', "no_rw" = '', "no_rumah" = '', "kode_pos" = '', "id_etnis" = '', "email" = '', "last_active" = '2025-03-05 10:04:07'
WHERE "id" = '00200627'
ERROR - 2025-03-05 10:04:41 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-03-05 10:06:53 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 10:06:54 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 10:06:57 --> Severity: Warning  --> Division by zero /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 599
ERROR - 2025-03-05 10:06:57 --> Severity: Warning  --> date() expects parameter 2 to be integer, float given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 605
ERROR - 2025-03-05 10:06:57 --> Severity: Warning  --> date() expects parameter 2 to be integer, float given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 606
ERROR - 2025-03-05 10:07:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 10:07:10 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-03-05 10:07:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 10:07:10 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-03-05 10:08:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 10:08:09 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 10:08:28 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 10:08:37 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 10:08:50 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 10:08:50 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 10:08:54 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 10:09:43 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-03-05 10:09:49 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 10:09:53 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 10:10:06 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 10:10:06 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 10:10:32 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 10:10:32 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 10:10:34 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2503050577) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 10:10:34 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2503050577) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2503050577', '00139396', '2025-03-05 10:10:32', 'Poliklinik', NULL, 'Jalan', 2, NULL, NULL, 9, '', NULL, NULL, 'Lama', NULL, 1945, 0, 'Belum', 'Poliklinik Paru', 0, 2, NULL, '20250305C014')
ERROR - 2025-03-05 10:10:54 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 10:11:09 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 10:11:20 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 10:11:43 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 10:12:19 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 10:12:23 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 10:12:51 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 10:13:05 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 10:13:05 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 10:13:15 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-03-05 10:13:41 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-03-05 10:13:46 --> Severity: Notice  --> Trying to get property 'nama_poli' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 1037
ERROR - 2025-03-05 10:13:46 --> Severity: Notice  --> Trying to get property 'tanggal_kunjungan' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 1037
ERROR - 2025-03-05 10:13:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  syntax error at or near &quot;)&quot;
LINE 10:                  )
                          ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 10:13:46 --> Query error: ERROR:  syntax error at or near ")"
LINE 10:                  )
                          ^ - Invalid query: WITH cte AS (
								SELECT *, ROW_NUMBER() OVER (ORDER BY create_date) - 1 AS position,
								          FLOOR((ROW_NUMBER() OVER (ORDER BY create_date) - 1) /
						                        case when nama_poli = 34 then 25 else 10 end) *
						                  case when EXTRACT(DOW FROM tanggal_kunjungan) = 5 then 45 else 60 end AS minutes_offset
								FROM sm_antrian_bpjs
						            where tanggal_kunjungan = ''
					                and (lokasi_data = 'APM' OR lokasi_data = 'mobile')
					                and nama_poli = 
					            )
								SELECT id,
								       TO_CHAR(DATE_TRUNC('hour', tanggal_kunjungan) +
								               '07:30'::time + minutes_offset * INTERVAL '1 minute', 'HH24:MI') AS estimated_time_start,
							           case
								           when TO_CHAR(DATE_TRUNC('hour', tanggal_kunjungan) +
								                        '07:30'::time + minutes_offset * INTERVAL '1 minute' + INTERVAL '1 hour',
								                        'HH24:MI') > '12:00'
								               then '12:00'
								           else TO_CHAR(DATE_TRUNC('hour', tanggal_kunjungan) +
								                        '07:30'::time + minutes_offset * INTERVAL '1 minute' + INTERVAL '1 hour',
								                        'HH24:MI')
							           end AS estimated_time_end
								FROM cte
								WHERE id = 508440
ERROR - 2025-03-05 10:13:57 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 10:14:10 --> Severity: Notice  --> Trying to get property 'nama_poli' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 1037
ERROR - 2025-03-05 10:14:10 --> Severity: Notice  --> Trying to get property 'tanggal_kunjungan' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 1037
ERROR - 2025-03-05 10:14:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  syntax error at or near &quot;)&quot;
LINE 10:                  )
                          ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 10:14:10 --> Query error: ERROR:  syntax error at or near ")"
LINE 10:                  )
                          ^ - Invalid query: WITH cte AS (
								SELECT *, ROW_NUMBER() OVER (ORDER BY create_date) - 1 AS position,
								          FLOOR((ROW_NUMBER() OVER (ORDER BY create_date) - 1) /
						                        case when nama_poli = 34 then 25 else 10 end) *
						                  case when EXTRACT(DOW FROM tanggal_kunjungan) = 5 then 45 else 60 end AS minutes_offset
								FROM sm_antrian_bpjs
						            where tanggal_kunjungan = ''
					                and (lokasi_data = 'APM' OR lokasi_data = 'mobile')
					                and nama_poli = 
					            )
								SELECT id,
								       TO_CHAR(DATE_TRUNC('hour', tanggal_kunjungan) +
								               '07:30'::time + minutes_offset * INTERVAL '1 minute', 'HH24:MI') AS estimated_time_start,
							           case
								           when TO_CHAR(DATE_TRUNC('hour', tanggal_kunjungan) +
								                        '07:30'::time + minutes_offset * INTERVAL '1 minute' + INTERVAL '1 hour',
								                        'HH24:MI') > '12:00'
								               then '12:00'
								           else TO_CHAR(DATE_TRUNC('hour', tanggal_kunjungan) +
								                        '07:30'::time + minutes_offset * INTERVAL '1 minute' + INTERVAL '1 hour',
								                        'HH24:MI')
							           end AS estimated_time_end
								FROM cte
								WHERE id = 508440
ERROR - 2025-03-05 10:14:21 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-03-05 10:14:29 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 10:14:56 --> Severity: Notice  --> Trying to get property 'nama_poli' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 1037
ERROR - 2025-03-05 10:14:56 --> Severity: Notice  --> Trying to get property 'tanggal_kunjungan' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 1037
ERROR - 2025-03-05 10:14:56 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  syntax error at or near &quot;)&quot;
LINE 10:                  )
                          ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 10:14:56 --> Query error: ERROR:  syntax error at or near ")"
LINE 10:                  )
                          ^ - Invalid query: WITH cte AS (
								SELECT *, ROW_NUMBER() OVER (ORDER BY create_date) - 1 AS position,
								          FLOOR((ROW_NUMBER() OVER (ORDER BY create_date) - 1) /
						                        case when nama_poli = 34 then 25 else 10 end) *
						                  case when EXTRACT(DOW FROM tanggal_kunjungan) = 5 then 45 else 60 end AS minutes_offset
								FROM sm_antrian_bpjs
						            where tanggal_kunjungan = ''
					                and (lokasi_data = 'APM' OR lokasi_data = 'mobile')
					                and nama_poli = 
					            )
								SELECT id,
								       TO_CHAR(DATE_TRUNC('hour', tanggal_kunjungan) +
								               '07:30'::time + minutes_offset * INTERVAL '1 minute', 'HH24:MI') AS estimated_time_start,
							           case
								           when TO_CHAR(DATE_TRUNC('hour', tanggal_kunjungan) +
								                        '07:30'::time + minutes_offset * INTERVAL '1 minute' + INTERVAL '1 hour',
								                        'HH24:MI') > '12:00'
								               then '12:00'
								           else TO_CHAR(DATE_TRUNC('hour', tanggal_kunjungan) +
								                        '07:30'::time + minutes_offset * INTERVAL '1 minute' + INTERVAL '1 hour',
								                        'HH24:MI')
							           end AS estimated_time_end
								FROM cte
								WHERE id = 508440
ERROR - 2025-03-05 10:15:01 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 10:15:01 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 10:15:05 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 10:15:05 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 10:15:21 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-03-05 10:15:21 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-03-05 10:15:27 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 10:15:31 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-03-05 10:15:38 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 10:15:54 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 10:16:06 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 10:16:06 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 10:16:19 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 10:16:26 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 10:16:38 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 10:16:52 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 10:17:21 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-03-05 10:17:35 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 10:17:43 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 10:17:56 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 10:17:56 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-03-05 00:00:00' AND '2025-03-05 23:59:59'
AND "ab"."kode_booking" = '20250305A138'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-03-05 10:18:23 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-03-05 10:19:17 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 10:19:24 --> Severity: Warning  --> number_format() expects parameter 1 to be float, string given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export.php 102
ERROR - 2025-03-05 10:19:24 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export.php 111
ERROR - 2025-03-05 10:19:45 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 10:20:37 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 10:20:38 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-03-05 10:21:36 --> Severity: Notice  --> Undefined property: stdClass::$response /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 554
ERROR - 2025-03-05 10:21:36 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 802
ERROR - 2025-03-05 10:22:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 10:22:10 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 10:22:17 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 10:22:17 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 10:22:45 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 10:22:57 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 7939
ERROR - 2025-03-05 10:23:21 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 10:23:28 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 10:23:48 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 812
ERROR - 2025-03-05 10:23:48 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 812
ERROR - 2025-03-05 10:23:48 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 817
ERROR - 2025-03-05 10:23:48 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 817
ERROR - 2025-03-05 10:23:48 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 818
ERROR - 2025-03-05 10:23:48 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 818
ERROR - 2025-03-05 10:24:40 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-03-05 10:26:35 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 10:26:47 --> Severity: Warning  --> unlink(/tmp/syam_session793661ae4bfdc3040b8845242bf102d4bef54be3): No such file or directory /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/libraries/Session/drivers/Session_files_driver.php 384
ERROR - 2025-03-05 10:26:47 --> Severity: Warning  --> unlink(/tmp/syam_sessionf76b400927c31e8bbe7b8a57bec8fa52019be1fe): No such file or directory /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/libraries/Session/drivers/Session_files_driver.php 384
ERROR - 2025-03-05 10:26:47 --> Severity: Warning  --> unlink(/tmp/syam_session2f174da953ea6f3a1b9485dab4b039a43ea0a06b): No such file or directory /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/libraries/Session/drivers/Session_files_driver.php 384
ERROR - 2025-03-05 10:26:47 --> Severity: Warning  --> unlink(/tmp/syam_session16b432804006ff161fd747e98165cf54d0eaa76d): No such file or directory /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/libraries/Session/drivers/Session_files_driver.php 384
ERROR - 2025-03-05 10:26:57 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 10:27:04 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 10:27:16 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 10:27:45 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-03-05 10:29:00 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 10:29:53 --> Severity: Notice  --> Undefined property: stdClass::$response /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 554
ERROR - 2025-03-05 10:29:53 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 802
ERROR - 2025-03-05 10:30:44 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 10:31:16 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 10:31:41 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 10:32:10 --> Severity: Warning  --> Division by zero /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 599
ERROR - 2025-03-05 10:32:10 --> Severity: Warning  --> date() expects parameter 2 to be integer, float given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 605
ERROR - 2025-03-05 10:32:10 --> Severity: Warning  --> date() expects parameter 2 to be integer, float given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 606
ERROR - 2025-03-05 10:32:14 --> Severity: Warning  --> Division by zero /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 599
ERROR - 2025-03-05 10:32:14 --> Severity: Warning  --> date() expects parameter 2 to be integer, float given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 605
ERROR - 2025-03-05 10:32:14 --> Severity: Warning  --> date() expects parameter 2 to be integer, float given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 606
ERROR - 2025-03-05 10:32:18 --> Severity: Warning  --> Division by zero /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 599
ERROR - 2025-03-05 10:32:18 --> Severity: Warning  --> date() expects parameter 2 to be integer, float given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 605
ERROR - 2025-03-05 10:32:18 --> Severity: Warning  --> date() expects parameter 2 to be integer, float given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 606
ERROR - 2025-03-05 10:32:26 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 7939
ERROR - 2025-03-05 10:32:28 --> Severity: Warning  --> Division by zero /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 599
ERROR - 2025-03-05 10:32:28 --> Severity: Warning  --> date() expects parameter 2 to be integer, float given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 605
ERROR - 2025-03-05 10:32:28 --> Severity: Warning  --> date() expects parameter 2 to be integer, float given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 606
ERROR - 2025-03-05 10:32:34 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;undefined&quot;
LINE 11: WHERE &quot;rt&quot;.&quot;id&quot; = 'undefined'
                           ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 10:32:34 --> Query error: ERROR:  invalid input syntax for type integer: "undefined"
LINE 11: WHERE "rt"."id" = 'undefined'
                           ^ - Invalid query: SELECT "rt".*, "lp"."id_penjamin", "lp"."cara_bayar", "lp"."jenis_layanan", "pjn"."nama" as "penjamin", date(r.waktu) as tanggal, "pj"."id" as "id_penjualan", "pg"."nama" as "dokter", "p"."tanggal_lahir", "p"."nama" as "nama_pasien", "p"."alamat" as "alamat_pasien", "p"."id" as "id_pasien", "af"."id" as "id_antrian_farmasi"
FROM "sm_resep_tebus" as "rt"
JOIN "sm_resep" as "r" ON "r"."id" = "rt"."id_resep"
LEFT JOIN "sm_antrian_farmasi" as "af" ON "af"."id_resep" = "r"."id"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "r"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
JOIN "sm_pasien" as "p" ON "p"."id" = "r"."id_pasien"
JOIN "sm_layanan_pendaftaran" as "lp" ON "lp"."id" = "r"."id_layanan_pendaftaran"
LEFT JOIN "sm_penjamin" as "pjn" ON "pjn"."id" = "lp"."id_penjamin"
LEFT JOIN "sm_penjualan" as "pj" ON "pj"."id_resep" = "r"."id"
WHERE "rt"."id" = 'undefined'
ORDER BY "r"."waktu" DESC
ERROR - 2025-03-05 10:32:41 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 10:32:46 --> Severity: Warning  --> Division by zero /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 599
ERROR - 2025-03-05 10:32:46 --> Severity: Warning  --> date() expects parameter 2 to be integer, float given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 605
ERROR - 2025-03-05 10:32:46 --> Severity: Warning  --> date() expects parameter 2 to be integer, float given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 606
ERROR - 2025-03-05 10:32:54 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 10:33:06 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 10:33:06 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 10:33:38 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 10:33:38 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 10:33:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 10:33:51 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 10:34:01 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 10:34:01 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 10:34:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 10:34:10 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 10:34:19 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-03-05 10:34:31 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 10:34:31 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 10:34:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 10:34:40 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 10:34:54 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 10:34:54 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 10:35:06 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 10:35:06 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 10:35:07 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-03-05 10:35:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 10:35:15 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 10:36:21 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 10:36:21 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 10:36:25 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 10:36:35 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 10:36:35 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 10:36:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 10:36:46 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 10:36:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 10:36:52 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 10:37:18 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 10:37:51 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 10:38:12 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-03-05 10:38:20 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 10:38:37 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 10:38:38 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 10:38:45 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-03-05 10:38:55 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 10:39:08 --> Severity: Notice  --> Undefined variable: data /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1879
ERROR - 2025-03-05 10:39:20 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 812
ERROR - 2025-03-05 10:39:20 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 812
ERROR - 2025-03-05 10:39:20 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 817
ERROR - 2025-03-05 10:39:20 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 817
ERROR - 2025-03-05 10:39:20 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 818
ERROR - 2025-03-05 10:39:20 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 818
ERROR - 2025-03-05 10:39:29 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-03-05 10:39:34 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 10:39:34 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 10:39:42 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 10:39:42 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 10:39:46 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 10:40:04 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 10:40:04 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 10:40:22 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 10:40:22 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 10:40:45 --> Severity: Error  --> Allowed memory size of 268435456 bytes exhausted (tried to allocate 20480 bytes) /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_result.php 179
ERROR - 2025-03-05 10:40:58 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type date: &quot; 00:00:00&quot;
LINE 10: AND &quot;ab&quot;.&quot;tanggal_kunjungan&quot; BETWEEN ' 00:00:00' AND '2025-0...
                                              ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 10:40:58 --> Query error: ERROR:  invalid input syntax for type date: " 00:00:00"
LINE 10: AND "ab"."tanggal_kunjungan" BETWEEN ' 00:00:00' AND '2025-0...
                                              ^ - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."status" = 'Check In'
AND "ab"."pasien_hadir" IS NULL
AND "ab"."tanggal_kunjungan" BETWEEN ' 00:00:00' AND '2025-03-05 23:59:59'
ORDER BY "ab"."id" ASC
 LIMIT 10
ERROR - 2025-03-05 10:40:59 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type date: &quot; 00:00:00&quot;
LINE 10: AND &quot;ab&quot;.&quot;tanggal_kunjungan&quot; BETWEEN ' 00:00:00' AND '2025-0...
                                              ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 10:40:59 --> Query error: ERROR:  invalid input syntax for type date: " 00:00:00"
LINE 10: AND "ab"."tanggal_kunjungan" BETWEEN ' 00:00:00' AND '2025-0...
                                              ^ - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."status" = 'Check In'
AND "ab"."pasien_hadir" IS NULL
AND "ab"."tanggal_kunjungan" BETWEEN ' 00:00:00' AND '2025-03-05 23:59:59'
ORDER BY "ab"."id" ASC
 LIMIT 10
ERROR - 2025-03-05 10:41:06 --> Severity: Error  --> Allowed memory size of 268435456 bytes exhausted (tried to allocate 20480 bytes) /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_result.php 179
ERROR - 2025-03-05 10:41:17 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-03-05 10:41:25 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 10:41:37 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 10:41:37 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 10:41:47 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 10:41:47 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 10:41:58 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 10:41:58 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 10:42:03 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-03-05 10:42:03 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-03-05 10:42:04 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-03-05 10:42:59 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 10:43:31 --> Severity: Notice  --> Trying to get property 'jenis_layanan' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pengkodean_icd_x/controllers/api/Pengkodean_icd_x.php 350
ERROR - 2025-03-05 10:43:43 --> Severity: Notice  --> Trying to get property 'jenis_layanan' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pengkodean_icd_x/controllers/api/Pengkodean_icd_x.php 350
ERROR - 2025-03-05 10:44:25 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  cannot cast jsonb null to type integer /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 10:44:25 --> Query error: ERROR:  cannot cast jsonb null to type integer - Invalid query: WITH cte as (select * from sm_resep_logs where penjualan ->> 'id' = '1115993'),
							list_obat as (select rrrd.resep_r_detail ->> 'id_resep_r'                          as id_resep_r,
												concat_ws(' ', b.nama, b.kekuatan, s.nama, sd.nama, pb.nama)  as nama_barang,
												concat_ws(' ', rrrd.resep_r_detail ->> 'dosis_racik', s.nama) as dosis_obat,
												rrrd.resep_r_detail ->> 'jumlah_pakai'                        as jumlah
										from sm_resep_logs rl
												join lateral JSONB_ARRAY_ELEMENTS(rl.resep_r_detail) AS rrd(resep_r_detail) ON TRUE
												join lateral JSONB_ARRAY_ELEMENTS(rrd.resep_r_detail) AS rrrd(resep_r_detail) ON TRUE
												JOIN sm_barang b on b.id = (rrrd.resep_r_detail ->> 'id_barang')::int
												LEFT JOIN sm_satuan as s on s.id = b.satuan_kekuatan
												LEFT JOIN sm_sediaan as sd on sd.id = b.id_sediaan
												LEFT JOIN sm_pabrik as pb on pb.id = b.id_pabrik)
					select rr.resep_r ->> 'racik'            as racik,
							rr.resep_r ->> 'r_no'             as r_no,
							json_agg(list_obat)               as list_obat,
							rr.resep_r ->> 'aturan_pakai'     as aturan_pakai,
							rr.resep_r ->> 'keterangan_resep' as keterangan_resep,
							rr.resep_r ->> 'id'               as id,
							rr.resep_r ->> 'resep_r_jumlah'   AS permintaan,
							coalesce(sd.nama, '-')            as sediaan
					from cte
								join lateral JSONB_ARRAY_ELEMENTS(cte.resep_r) AS rr(resep_r) on TRUE
								join list_obat on list_obat.id_resep_r = rr.resep_r ->> 'id'
								left join sm_sediaan sd on sd.id = (rr.resep_r -> 'id_sediaan')::int
					group by rr.resep_r, sd.nama
					order by rr.resep_r ->> 'r_no'
			 
ERROR - 2025-03-05 10:44:38 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 812
ERROR - 2025-03-05 10:44:38 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 812
ERROR - 2025-03-05 10:44:38 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 817
ERROR - 2025-03-05 10:44:38 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 817
ERROR - 2025-03-05 10:44:38 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 818
ERROR - 2025-03-05 10:44:38 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 818
ERROR - 2025-03-05 10:44:51 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 812
ERROR - 2025-03-05 10:44:51 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 812
ERROR - 2025-03-05 10:44:51 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 817
ERROR - 2025-03-05 10:44:51 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 817
ERROR - 2025-03-05 10:44:51 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 818
ERROR - 2025-03-05 10:44:51 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 818
ERROR - 2025-03-05 10:45:02 --> Severity: error  --> Exception: Too few arguments to function Pengkodean_icd_x::cetak_resume_medis_ranap(), 1 passed in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/CodeIgniter.php on line 529 and at least 2 expected /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pengkodean_icd_x/controllers/Pengkodean_icd_x.php 83
ERROR - 2025-03-05 10:45:02 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(ArgumentCountError))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-03-05 10:45:10 --> Severity: error  --> Exception: Too few arguments to function Pengkodean_icd_x::cetak_resume_medis_ranap(), 1 passed in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/CodeIgniter.php on line 529 and at least 2 expected /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pengkodean_icd_x/controllers/Pengkodean_icd_x.php 83
ERROR - 2025-03-05 10:45:10 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(ArgumentCountError))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-03-05 10:45:15 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-03-05 10:47:09 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 10:47:45 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 10:47:45 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 10:47:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 10:47:57 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 10:48:01 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_antrian_bpjs_kode_booking_key&quot;
DETAIL:  Key (kode_booking)=(20250319B128) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 10:48:01 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_antrian_bpjs_kode_booking_key"
DETAIL:  Key (kode_booking)=(20250319B128) already exists. - Invalid query: INSERT INTO "sm_antrian_bpjs" ("kode_booking", "urutan", "nomor_antrean", "huruf_antrean", "tanggal_kunjungan", "kebutuhan", "create_date", "status", "lokasi_data", "usia_pasien", "pasien_baru", "waktu_estimasi", "status_rm", "user_create", "no_rm", "id_dokter", "kode_bpjs_dokter", "nama_poli", "kode_bpjs_poli", "no_hp", "nik", "tanggal_lahir", "nama_dokter", "id_penjamin", "jenis_bayar", "sisa_kuota", "total_kuota", "status_respon", "pesan_response", "is_kontrol_pasca_ranap", "id_jadwal_dokter", "no_kartu", "status_jkn", "id_skd", "rujukanawal", "id_poli_asal", "no_referensi", "jenis_kunjungan", "is_pasien_katarak", "no_sep_asal", "id_poli_rujukan") VALUES ('20250319B128', '128', 'B128', 'B', '2025-03-19', '0', '2025-03-05 10:48:01', 'Booking', 'APM', 'Asuransi', 0, '2025-03-19  07:04:30', 0, '1701', '00324809', 65, 444269, 14, 'BED', '089626041018', '3671055103020005', '2002-03-11', 'dr. SURYANTI LASE, Sp.B', 1, 'Asuransi', 59, '60', '200', 'Ok.', '0', '49310', '0000814863543', 'JKN', '283145', '0', '14', '0223U0280325P000189', '3', NULL, '0223R0380325V002262', '14')
ERROR - 2025-03-05 10:48:03 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 10:48:06 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 10:48:06 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 10:48:06 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 10:48:13 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 10:48:13 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 10:48:29 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 10:49:01 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-03-05 10:49:10 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 10:49:14 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 10:49:14 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 10:49:37 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 10:49:37 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 10:50:09 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 10:50:44 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 10:50:52 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 10:51:05 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 10:51:17 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 10:51:21 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 10:51:34 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 10:52:35 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 812
ERROR - 2025-03-05 10:52:35 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 812
ERROR - 2025-03-05 10:52:35 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 817
ERROR - 2025-03-05 10:52:35 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 817
ERROR - 2025-03-05 10:52:35 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 818
ERROR - 2025-03-05 10:52:35 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 818
ERROR - 2025-03-05 10:52:35 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 812
ERROR - 2025-03-05 10:52:35 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 812
ERROR - 2025-03-05 10:52:35 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 817
ERROR - 2025-03-05 10:52:35 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 817
ERROR - 2025-03-05 10:52:35 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 818
ERROR - 2025-03-05 10:52:35 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 818
ERROR - 2025-03-05 10:52:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_antrian_bpjs_kode_booking_key&quot;
DETAIL:  Key (kode_booking)=(20250311B197) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 10:52:36 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_antrian_bpjs_kode_booking_key"
DETAIL:  Key (kode_booking)=(20250311B197) already exists. - Invalid query: INSERT INTO "sm_antrian_bpjs" ("kode_booking", "urutan", "nomor_antrean", "huruf_antrean", "tanggal_kunjungan", "kebutuhan", "create_date", "status", "lokasi_data", "usia_pasien", "pasien_baru", "waktu_estimasi", "status_rm", "user_create", "no_rm", "id_dokter", "kode_bpjs_dokter", "nama_poli", "kode_bpjs_poli", "no_hp", "nik", "tanggal_lahir", "nama_dokter", "id_penjamin", "jenis_bayar", "sisa_kuota", "total_kuota", "status_respon", "pesan_response", "is_kontrol_pasca_ranap", "id_jadwal_dokter", "no_kartu", "status_jkn", "id_skd", "rujukanawal", "id_poli_asal", "no_referensi", "jenis_kunjungan", "is_pasien_katarak", "no_sep_asal", "id_poli_rujukan", "kirim_bpjs", "respon_bpjs", "ket_bridging") VALUES ('20250311B197', '197', 'B197', 'B', '2025-03-11', '0', '2025-03-05 10:52:10', 'Booking', 'APM', 'Asuransi', 0, '2025-03-11  09:28:30', 0, '1701', '00118327', 353, 436935, 35, 'SAR', '081952423137', '3671014101730010', '1973-01-01', 'dr. EKO YUWONO, Sp.N', 1, 'Asuransi', 25, '60', '200', 'Ok.', '0', '49296', '0000814839107', 'JKN', NULL, '1', NULL, '102501060325Y000543', '1', NULL, NULL, '35', 'Belum', NULL, NULL)
ERROR - 2025-03-05 10:53:01 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 812
ERROR - 2025-03-05 10:53:01 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 812
ERROR - 2025-03-05 10:53:01 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 817
ERROR - 2025-03-05 10:53:01 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 817
ERROR - 2025-03-05 10:53:01 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 818
ERROR - 2025-03-05 10:53:01 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 818
ERROR - 2025-03-05 10:53:16 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...erian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES (801592, '3', '', '', ''...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 10:53:16 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...erian_5", "jam_pemberian_6") VALUES (801592, '3', '', '', ''...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (801592, '3', '', '', '', '', 'PC', '0', '', '0', 'MORN', NULL, '1', 1, '1x1 pulv', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-03-05 10:53:53 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 10:53:53 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-03-05 00:00:00' AND '2025-03-05 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A127%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-03-05 10:54:10 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 10:54:18 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 10:55:29 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 10:55:55 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 10:55:57 --> Severity: Warning  --> Division by zero /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 599
ERROR - 2025-03-05 10:55:57 --> Severity: Warning  --> date() expects parameter 2 to be integer, float given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 605
ERROR - 2025-03-05 10:55:57 --> Severity: Warning  --> date() expects parameter 2 to be integer, float given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 606
ERROR - 2025-03-05 10:56:00 --> Severity: Warning  --> Division by zero /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 599
ERROR - 2025-03-05 10:56:00 --> Severity: Warning  --> date() expects parameter 2 to be integer, float given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 605
ERROR - 2025-03-05 10:56:00 --> Severity: Warning  --> date() expects parameter 2 to be integer, float given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 606
ERROR - 2025-03-05 10:56:02 --> Severity: Warning  --> Division by zero /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 599
ERROR - 2025-03-05 10:56:02 --> Severity: Warning  --> date() expects parameter 2 to be integer, float given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 605
ERROR - 2025-03-05 10:56:02 --> Severity: Warning  --> date() expects parameter 2 to be integer, float given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 606
ERROR - 2025-03-05 10:56:07 --> Severity: Warning  --> Division by zero /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 599
ERROR - 2025-03-05 10:56:07 --> Severity: Warning  --> date() expects parameter 2 to be integer, float given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 605
ERROR - 2025-03-05 10:56:07 --> Severity: Warning  --> date() expects parameter 2 to be integer, float given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 606
ERROR - 2025-03-05 10:56:10 --> Severity: Warning  --> Division by zero /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 599
ERROR - 2025-03-05 10:56:10 --> Severity: Warning  --> date() expects parameter 2 to be integer, float given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 605
ERROR - 2025-03-05 10:56:10 --> Severity: Warning  --> date() expects parameter 2 to be integer, float given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 606
ERROR - 2025-03-05 10:56:14 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 10:56:14 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 10:56:22 --> Severity: Warning  --> Division by zero /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 599
ERROR - 2025-03-05 10:56:22 --> Severity: Warning  --> date() expects parameter 2 to be integer, float given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 605
ERROR - 2025-03-05 10:56:22 --> Severity: Warning  --> date() expects parameter 2 to be integer, float given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 606
ERROR - 2025-03-05 10:56:26 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-03-05 10:56:30 --> Severity: Warning  --> Division by zero /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 599
ERROR - 2025-03-05 10:56:30 --> Severity: Warning  --> date() expects parameter 2 to be integer, float given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 605
ERROR - 2025-03-05 10:56:30 --> Severity: Warning  --> date() expects parameter 2 to be integer, float given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 606
ERROR - 2025-03-05 10:56:37 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 10:58:56 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...erian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES (801600, '5', '', '14', ...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 10:58:56 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...erian_5", "jam_pemberian_6") VALUES (801600, '5', '', '14', ...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (801600, '5', '', '14', '2 x Sehari 1 Tablet', '', 'PC', '0', '', '0', 'MORN, EVE', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-03-05 10:59:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  null value in column &quot;waktu&quot; violates not-null constraint
DETAIL:  Failing row contains (813869, 702876, null, 10, sesak nafas (-) Demam (-) Kejang(-) sulit BAK

, KU: sedang, Kes: CM TD: 154/114 mmHg S: 36,7 C RR 20x/min HR: 12..., - Hiponatremia ec low intake perbaikan - Bacterial infection ec ..., BLPL Kontrol poli jiwa, , 2094, 1, &lt;div&gt;- Cefixime 2x200 mg po&lt;/div&gt;&lt;div&gt;- Amlodipin 1x10 mg po&lt;/d..., null, null, 2094, 2025-03-05 10:59:10, null, null, null, null, null, null, null, 0, , , , , , , , null, null, null, null). /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 10:59:10 --> Query error: ERROR:  null value in column "waktu" violates not-null constraint
DETAIL:  Failing row contains (813869, 702876, null, 10, sesak nafas (-) Demam (-) Kejang(-) sulit BAK

, KU: sedang, Kes: CM TD: 154/114 mmHg S: 36,7 C RR 20x/min HR: 12..., - Hiponatremia ec low intake perbaikan - Bacterial infection ec ..., BLPL Kontrol poli jiwa, , 2094, 1, <div>- Cefixime 2x200 mg po</div><div>- Amlodipin 1x10 mg po</d..., null, null, 2094, 2025-03-05 10:59:10, null, null, null, null, null, null, null, 0, , , , , , , , null, null, null, null). - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('702876', NULL, '10', 'sesak nafas (-) Demam (-) Kejang(-) sulit BAK

', 'KU: sedang, Kes: CM TD: 154/114 mmHg S: 36,7 C RR 20x/min HR: 120x/min reguler SpO2: 1003lpm. Lab: Na/k: 137/3,4. UL: DBN. - USG Abdomen: dbn

', '- Hiponatremia ec low intake perbaikan - Bacterial infection ec bacterial instestinal infection - obs seizure - Dyspepsia - HT - Retensio urin ec susp BPH

', 'BLPL Kontrol poli jiwa', '', '', '', '', '', '', '', '', '2094', '1', '<div>- Cefixime 2x200 mg po</div><div>- Amlodipin 1x10 mg po</div><div>- candesartan 1x8 mg po</div><div></div>', NULL, '2094', 0, NULL, '2025-03-05 10:59:10')
ERROR - 2025-03-05 10:59:19 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 10:59:19 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 10:59:35 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-03-05 10:59:42 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 10:59:42 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 10:59:44 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 10:59:49 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 10:59:49 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 10:59:56 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 10:59:56 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 11:00:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 11:00:36 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 11:01:00 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 11:01:00 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 11:01:11 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 11:01:11 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 11:01:18 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 11:01:18 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 11:02:37 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 11:02:37 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 11:02:55 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;undefined&quot;
LINE 3: WHERE &quot;id_resep&quot; = 'undefined'
                           ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 11:02:55 --> Query error: ERROR:  invalid input syntax for type integer: "undefined"
LINE 3: WHERE "id_resep" = 'undefined'
                           ^ - Invalid query: SELECT *
FROM "sm_resep_tebus"
WHERE "id_resep" = 'undefined'
ERROR - 2025-03-05 11:02:55 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 11:02:55 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 11:02:56 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 6: WHERE &quot;r&quot;.&quot;id_layanan_pendaftaran&quot; = 'null'
                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 11:02:56 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 6: WHERE "r"."id_layanan_pendaftaran" = 'null'
                                             ^ - Invalid query: SELECT "r".*, "rt"."id" as "id_resep_tebus", "af"."id" as "id_antrian_farmasi", case when rt.cetakan_ke != '0' then 1 else 0 end as is_cetak, "p"."waktu_diserahkan"
FROM "sm_resep" "r"
JOIN "sm_resep_tebus" "rt" ON "r"."id" = "rt"."id_resep"
JOIN "sm_antrian_farmasi" "af" ON "af"."id_layanan_pendaftaran" = "r"."id_layanan_pendaftaran"
LEFT JOIN "sm_penjualan" "p" ON "r"."id" = "p"."id_resep"
WHERE "r"."id_layanan_pendaftaran" = 'null'
ERROR - 2025-03-05 11:03:04 --> Severity: Warning  --> Division by zero /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 599
ERROR - 2025-03-05 11:03:04 --> Severity: Warning  --> date() expects parameter 2 to be integer, float given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 605
ERROR - 2025-03-05 11:03:04 --> Severity: Warning  --> date() expects parameter 2 to be integer, float given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 606
ERROR - 2025-03-05 11:03:05 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 11:03:05 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-03-05 11:03:05 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 11:03:05 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-03-05 11:03:22 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 812
ERROR - 2025-03-05 11:03:22 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 812
ERROR - 2025-03-05 11:03:22 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 817
ERROR - 2025-03-05 11:03:22 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 817
ERROR - 2025-03-05 11:03:22 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 818
ERROR - 2025-03-05 11:03:22 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 818
ERROR - 2025-03-05 11:03:54 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 11:03:54 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 11:04:07 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-03-05 11:04:08 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 11:04:08 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 11:04:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 11:04:10 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 11:04:11 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...ian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES ('801546', '2', '', '', ''...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 11:04:11 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...ian_5", "jam_pemberian_6") VALUES ('801546', '2', '', '', ''...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES ('801546', '2', '', '', '', '', 'null', '0', '', '0', '', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-03-05 11:04:16 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 11:04:17 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 11:04:17 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-03-05 11:04:17 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 11:04:17 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-03-05 11:04:28 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 11:04:28 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 11:04:35 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 11:04:35 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 11:04:47 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 11:04:47 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 11:05:06 --> Severity: error  --> Exception: Too few arguments to function Pengkodean_icd_x::cetak_resume_medis_ranap(), 1 passed in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/CodeIgniter.php on line 529 and at least 2 expected /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pengkodean_icd_x/controllers/Pengkodean_icd_x.php 83
ERROR - 2025-03-05 11:05:06 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(ArgumentCountError))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-03-05 11:05:17 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_register_idx&quot;
DETAIL:  Key (no_register)=(2503050636) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 11:05:17 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_register_idx"
DETAIL:  Key (no_register)=(2503050636) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "hak_kelas", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "nik_pjwb", "nama_pjwb", "kelamin_pjwb", "telp_pjwb", "alamat_pjwb", "tgl_lahir_pjwb", "hubungan_pjwb", "nik_pjwb_finansial", "nama_pjwb_finansial", "kelamin_pjwb_finansial", "telp_pjwb_finansial", "alamat_pjwb_finansial", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2503050636', '00184383', '2025-03-05 11:05:17', 'Poliklinik', '', '', 'Jalan', '2', NULL, NULL, '', '', '', '', '', NULL, '', '', '', '', '', '', 9, NULL, NULL, NULL, 'Baru', NULL, '1762', 0, 'Belum', 'Poliklinik Obgyn', 0, '2', '', '20250305A194')
ERROR - 2025-03-05 11:06:23 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 11:06:23 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 11:06:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 11:06:40 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 11:07:02 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 11:07:02 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 11:07:09 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-03-05 11:07:09 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 812
ERROR - 2025-03-05 11:07:09 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 812
ERROR - 2025-03-05 11:07:09 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 817
ERROR - 2025-03-05 11:07:09 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 817
ERROR - 2025-03-05 11:07:09 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 818
ERROR - 2025-03-05 11:07:09 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 818
ERROR - 2025-03-05 11:07:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 11:07:09 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 11:07:11 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 812
ERROR - 2025-03-05 11:07:11 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 812
ERROR - 2025-03-05 11:07:11 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 817
ERROR - 2025-03-05 11:07:11 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 817
ERROR - 2025-03-05 11:07:11 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 818
ERROR - 2025-03-05 11:07:11 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 818
ERROR - 2025-03-05 11:07:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 11:07:12 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 11:07:18 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 11:07:21 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 11:07:21 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 11:07:28 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 11:07:28 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 11:07:33 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 11:07:33 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 11:07:35 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 11:07:35 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 11:07:42 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 11:08:06 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 11:08:06 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 11:08:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 11:08:15 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 11:08:28 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 11:08:28 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 11:09:06 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 11:09:06 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 11:09:16 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  cannot cast jsonb null to type integer /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 11:09:16 --> Query error: ERROR:  cannot cast jsonb null to type integer - Invalid query: WITH cte as (select * from sm_resep_logs where penjualan ->> 'id' = '1115993'),
							list_obat as (select rrrd.resep_r_detail ->> 'id_resep_r'                          as id_resep_r,
												concat_ws(' ', b.nama, b.kekuatan, s.nama, sd.nama, pb.nama)  as nama_barang,
												concat_ws(' ', rrrd.resep_r_detail ->> 'dosis_racik', s.nama) as dosis_obat,
												rrrd.resep_r_detail ->> 'jumlah_pakai'                        as jumlah
										from sm_resep_logs rl
												join lateral JSONB_ARRAY_ELEMENTS(rl.resep_r_detail) AS rrd(resep_r_detail) ON TRUE
												join lateral JSONB_ARRAY_ELEMENTS(rrd.resep_r_detail) AS rrrd(resep_r_detail) ON TRUE
												JOIN sm_barang b on b.id = (rrrd.resep_r_detail ->> 'id_barang')::int
												LEFT JOIN sm_satuan as s on s.id = b.satuan_kekuatan
												LEFT JOIN sm_sediaan as sd on sd.id = b.id_sediaan
												LEFT JOIN sm_pabrik as pb on pb.id = b.id_pabrik)
					select rr.resep_r ->> 'racik'            as racik,
							rr.resep_r ->> 'r_no'             as r_no,
							json_agg(list_obat)               as list_obat,
							rr.resep_r ->> 'aturan_pakai'     as aturan_pakai,
							rr.resep_r ->> 'keterangan_resep' as keterangan_resep,
							rr.resep_r ->> 'id'               as id,
							rr.resep_r ->> 'resep_r_jumlah'   AS permintaan,
							coalesce(sd.nama, '-')            as sediaan
					from cte
								join lateral JSONB_ARRAY_ELEMENTS(cte.resep_r) AS rr(resep_r) on TRUE
								join list_obat on list_obat.id_resep_r = rr.resep_r ->> 'id'
								left join sm_sediaan sd on sd.id = (rr.resep_r -> 'id_sediaan')::int
					group by rr.resep_r, sd.nama
					order by rr.resep_r ->> 'r_no'
			 
ERROR - 2025-03-05 11:09:26 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 11:09:26 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 11:09:38 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 11:09:51 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-03-05 11:09:56 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  null value in column &quot;waktu&quot; violates not-null constraint
DETAIL:  Failing row contains (813892, 703300, null, 10, batuk dan sesak berkurang , retraksi minimal
rh +/+, pneumonia
hipotiroid , Infus D51/4 NS 29 ml/ jam
Inf pct 3x 100 mg kp
inj ampicilin 1..., , 2121, 1, Infus D51/4 NS 29 ml/ jam&lt;div&gt;Inf pct 3x 100 mg kp&lt;/div&gt;&lt;div&gt;i..., null, null, 2121, 2025-03-05 11:09:56, null, null, null, null, null, null, null, 0, , , , , , , , null, null, null, null). /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 11:09:56 --> Query error: ERROR:  null value in column "waktu" violates not-null constraint
DETAIL:  Failing row contains (813892, 703300, null, 10, batuk dan sesak berkurang , retraksi minimal
rh +/+, pneumonia
hipotiroid , Infus D51/4 NS 29 ml/ jam
Inf pct 3x 100 mg kp
inj ampicilin 1..., , 2121, 1, Infus D51/4 NS 29 ml/ jam<div>Inf pct 3x 100 mg kp</div><div>i..., null, null, 2121, 2025-03-05 11:09:56, null, null, null, null, null, null, null, 0, , , , , , , , null, null, null, null). - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('703300', NULL, '10', 'batuk dan sesak berkurang ', 'retraksi minimal
rh +/+', 'pneumonia
hipotiroid ', 'Infus D51/4 NS 29 ml/ jam
Inf pct 3x 100 mg kp
inj ampicilin 175 mg/ 6 jam
inj gentamicin 55 mg / 24 jam
salbutamol 0.6 mg + triamsinolol 0. 8 mg >> 3x1
cetirizine 1x 0.25 nk
nebu salbutamil 1/2 resp+ 3ml nacl / 8 jam
levotiroksin 1x 48 mg
O2 3 lpm NK-> aff oksigen
Pasang ngt , minum lewat ngt 120ml/6jam minumnya
makan sesuai usia

terapi lanjut 

rencana BLPL besok ', '', '', '', '', '', '', '', '', '2121', '1', 'Infus D51/4 NS 29 ml/ jam<div>Inf pct 3x 100 mg kp</div><div>inj ampicilin 175 mg/ 6 jam</div><div>inj gentamicin 55 mg / 24 jam</div><div>salbutamol 0.6 mg + triamsinolol 0. 8 mg >> 3x1</div><div>cetirizine 1x 0.25 nk</div><div>nebu salbutamil 1/2 resp+ 3ml nacl / 8 jam</div><div>levotiroksin 1x 48 mg</div><div>O2 3 lpm NK-> aff oksigen</div><div>Pasang ngt , minum lewat ngt 120ml/6jam minumnya</div><div>makan sesuai usia</div><div>terapi lanjut </div><div>rencana BLPL besokÂ </div><div></div><div></div>', NULL, '2121', 0, NULL, '2025-03-05 11:09:56')
ERROR - 2025-03-05 11:09:59 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-03-05 11:10:00 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 11:10:19 --> Severity: Notice  --> Undefined index: id_kelas /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/tarif/models/Tarif_pelayanan_model.php 47
ERROR - 2025-03-05 11:10:19 --> Severity: Notice  --> Undefined index: id_kelas /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/tarif/models/Tarif_pelayanan_model.php 47
ERROR - 2025-03-05 11:10:30 --> Severity: Notice  --> Undefined index: id_kelas /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/tarif/models/Tarif_pelayanan_model.php 47
ERROR - 2025-03-05 11:10:30 --> Severity: Notice  --> Undefined index: id_kelas /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/tarif/models/Tarif_pelayanan_model.php 47
ERROR - 2025-03-05 11:11:25 --> Severity: Warning  --> number_format() expects parameter 1 to be float, string given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export.php 102
ERROR - 2025-03-05 11:11:25 --> Severity: Warning  --> number_format() expects parameter 1 to be float, string given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export.php 102
ERROR - 2025-03-05 11:11:25 --> Severity: Warning  --> number_format() expects parameter 1 to be float, string given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export.php 102
ERROR - 2025-03-05 11:11:25 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export.php 111
ERROR - 2025-03-05 11:11:25 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export.php 111
ERROR - 2025-03-05 11:11:25 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export.php 111
ERROR - 2025-03-05 11:11:36 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-03-05 11:11:39 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-03-05 11:11:56 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 11:12:25 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-03-05 11:12:33 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 11:13:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 11:13:10 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 11:13:20 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 11:13:20 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 11:13:28 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  null value in column &quot;waktu&quot; violates not-null constraint
DETAIL:  Failing row contains (813897, 703313, null, 10, batuk 
bab cair berkurang , rh +/+
retraksi minimal , pneumonia
gea drs 
anemia , terapi lanjut
rencana BLPL besok jika keluhan membaik 
, , 2121, 1, terapi lanjut&lt;div&gt;rencana BLPL besok jika keluhan membaikÂ &lt;/di..., null, null, 2121, 2025-03-05 11:13:28, null, null, null, null, null, null, null, 0, , , , , , , , null, null, null, null). /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 11:13:28 --> Query error: ERROR:  null value in column "waktu" violates not-null constraint
DETAIL:  Failing row contains (813897, 703313, null, 10, batuk 
bab cair berkurang , rh +/+
retraksi minimal , pneumonia
gea drs 
anemia , terapi lanjut
rencana BLPL besok jika keluhan membaik 
, , 2121, 1, terapi lanjut<div>rencana BLPL besok jika keluhan membaikÂ </di..., null, null, 2121, 2025-03-05 11:13:28, null, null, null, null, null, null, null, 0, , , , , , , , null, null, null, null). - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('703313', NULL, '10', 'batuk 
bab cair berkurang ', 'rh +/+
retraksi minimal ', 'pneumonia
gea drs 
anemia ', 'terapi lanjut
rencana BLPL besok jika keluhan membaik 
', '', '', '', '', '', '', '', '', '2121', '1', 'terapi lanjut<div>rencana BLPL besok jika keluhan membaikÂ </div>', NULL, '2121', 0, NULL, '2025-03-05 11:13:28')
ERROR - 2025-03-05 11:13:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 11:13:51 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 11:14:32 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  null value in column &quot;waktu&quot; violates not-null constraint
DETAIL:  Failing row contains (813901, 703314, null, 10, batuk berkurang , rh minimal 
retraksi minimal , pneumonia
, terapi lanjut
rencana BLPL besok , , 2121, 1, terapi lanjut&lt;div&gt;rencana BLPL besokÂ &lt;/div&gt;, null, null, 2121, 2025-03-05 11:14:32, null, null, null, null, null, null, null, 0, , , , , , , , null, null, null, null). /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 11:14:32 --> Query error: ERROR:  null value in column "waktu" violates not-null constraint
DETAIL:  Failing row contains (813901, 703314, null, 10, batuk berkurang , rh minimal 
retraksi minimal , pneumonia
, terapi lanjut
rencana BLPL besok , , 2121, 1, terapi lanjut<div>rencana BLPL besokÂ </div>, null, null, 2121, 2025-03-05 11:14:32, null, null, null, null, null, null, null, 0, , , , , , , , null, null, null, null). - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('703314', NULL, '10', 'batuk berkurang ', 'rh minimal 
retraksi minimal ', 'pneumonia
', 'terapi lanjut
rencana BLPL besok ', '', '', '', '', '', '', '', '', '2121', '1', 'terapi lanjut<div>rencana BLPL besokÂ </div>', NULL, '2121', 0, NULL, '2025-03-05 11:14:32')
ERROR - 2025-03-05 11:14:39 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-03-05 11:14:49 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 11:15:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;&quot;
LINE 1: ... &quot;sm_tarif_tindakan_pasien&quot; SET &quot;id_pengkodean&quot; = '', &quot;id_co...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 11:15:03 --> Query error: ERROR:  invalid input syntax for type integer: ""
LINE 1: ... "sm_tarif_tindakan_pasien" SET "id_pengkodean" = '', "id_co...
                                                             ^ - Invalid query: UPDATE "sm_tarif_tindakan_pasien" SET "id_pengkodean" = '', "id_coder" = '1480'
WHERE "id" = '4270248'
ERROR - 2025-03-05 11:15:24 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 11:15:24 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 11:16:16 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 11:16:37 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;id_layanan_pendaftaran&quot;
LINE 8:             where g.id_pendaftaran = 'id_layanan_pendaftaran...
                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 11:16:37 --> Query error: ERROR:  invalid input syntax for type integer: "id_layanan_pendaftaran"
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
        
ERROR - 2025-03-05 11:16:37 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;id_layanan_pendaftaran&quot;
LINE 7:             where d.id_pendaftaran = 'id_layanan_pendaftaran...
                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 11:16:37 --> Query error: ERROR:  invalid input syntax for type integer: "id_layanan_pendaftaran"
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
        
ERROR - 2025-03-05 11:16:37 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;id_layanan_pendaftaran&quot;
LINE 8:             where k.id_pendaftaran = 'id_layanan_pendaftaran...
                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 11:16:37 --> Query error: ERROR:  invalid input syntax for type integer: "id_layanan_pendaftaran"
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
        
ERROR - 2025-03-05 11:16:54 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-03-05 11:16:54 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-03-05 11:16:54 --> Severity: Notice  --> Undefined property: stdClass::$id_icd9 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 348
ERROR - 2025-03-05 11:16:54 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-03-05 11:16:54 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-03-05 11:16:54 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-03-05 11:16:54 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-03-05 11:16:54 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-03-05 11:16:54 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-03-05 11:16:54 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-03-05 11:16:54 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-03-05 11:16:54 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-03-05 11:16:54 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-03-05 11:16:54 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-03-05 11:16:55 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;id_layanan_pendaftaran&quot;
LINE 8:             where g.id_pendaftaran = 'id_layanan_pendaftaran...
                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 11:16:55 --> Query error: ERROR:  invalid input syntax for type integer: "id_layanan_pendaftaran"
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
        
ERROR - 2025-03-05 11:16:55 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;id_layanan_pendaftaran&quot;
LINE 7:             where d.id_pendaftaran = 'id_layanan_pendaftaran...
                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 11:16:55 --> Query error: ERROR:  invalid input syntax for type integer: "id_layanan_pendaftaran"
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
        
ERROR - 2025-03-05 11:16:55 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;id_layanan_pendaftaran&quot;
LINE 8:             where k.id_pendaftaran = 'id_layanan_pendaftaran...
                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 11:16:55 --> Query error: ERROR:  invalid input syntax for type integer: "id_layanan_pendaftaran"
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
        
ERROR - 2025-03-05 11:17:00 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-03-05 11:17:00 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-03-05 11:17:00 --> Severity: Notice  --> Undefined property: stdClass::$id_icd9 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 348
ERROR - 2025-03-05 11:17:00 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-03-05 11:17:00 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-03-05 11:17:00 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-03-05 11:17:00 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-03-05 11:17:00 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-03-05 11:17:00 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-03-05 11:17:00 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-03-05 11:17:00 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-03-05 11:17:00 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-03-05 11:17:00 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-03-05 11:17:00 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-03-05 11:17:06 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-03-05 11:17:06 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-03-05 11:17:06 --> Severity: Notice  --> Undefined property: stdClass::$id_icd9 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 348
ERROR - 2025-03-05 11:17:06 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-03-05 11:17:06 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-03-05 11:17:06 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-03-05 11:17:06 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-03-05 11:17:06 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-03-05 11:17:06 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-03-05 11:17:06 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-03-05 11:17:06 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-03-05 11:17:06 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-03-05 11:17:06 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-03-05 11:17:06 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-03-05 11:17:33 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-03-05 11:17:38 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  null value in column &quot;waktu&quot; violates not-null constraint
DETAIL:  Failing row contains (813908, 703321, null, 10, batuk berkurang , rh -
retraksi - 
bb 6,5 kg , ispa , BLPL
obat pulang
paracetamol 3x0,8ml kp demam 
amoixicilin 3x..., , 2121, 1, BLPL&lt;div&gt;obat pulang&lt;/div&gt;&lt;div&gt;paracetamol 3x0,8ml kp demam &lt;..., null, null, 2121, 2025-03-05 11:17:38, null, null, null, null, null, null, null, 0, , , , , , , , null, null, null, null). /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 11:17:38 --> Query error: ERROR:  null value in column "waktu" violates not-null constraint
DETAIL:  Failing row contains (813908, 703321, null, 10, batuk berkurang , rh -
retraksi - 
bb 6,5 kg , ispa , BLPL
obat pulang
paracetamol 3x0,8ml kp demam 
amoixicilin 3x..., , 2121, 1, BLPL<div>obat pulang</div><div>paracetamol 3x0,8ml kp demam <..., null, null, 2121, 2025-03-05 11:17:38, null, null, null, null, null, null, null, 0, , , , , , , , null, null, null, null). - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('703321', NULL, '10', 'batuk berkurang ', 'rh -
retraksi - 
bb 6,5 kg ', 'ispa ', 'BLPL
obat pulang
paracetamol 3x0,8ml kp demam 
amoixicilin 3x80mg untuk 7 hari
Salbutamol 0,5mg + triamcinolon 0,8mg , 3x1 no XV
Cetirizin drop 1x0,25ml malam', '', '', '', '', '', '', '', '', '2121', '1', 'BLPL<div>obat pulang</div><div>paracetamol 3x0,8ml kp demam </div><div>amoixicilin 3x80mg untuk 7 hari</div><div>Salbutamol 0,5mg + triamcinolon 0,8mg , 3x1 no XV</div><div>Cetirizin drop 1x0,25ml malam</div>', NULL, '2121', 0, NULL, '2025-03-05 11:17:38')
ERROR - 2025-03-05 11:17:44 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 11:18:16 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 11:18:16 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 11:18:22 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 11:18:22 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 11:18:33 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 11:18:33 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 11:18:53 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 11:19:40 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-03-05 11:19:51 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 11:23:00 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  null value in column &quot;waktu&quot; violates not-null constraint
DETAIL:  Failing row contains (813917, 703323, null, 10, demam - , pf dbn
akral hangat crt kurang dari 2 , dengue fever with warning signs (demam hari ke 4), Inf RL 100ml/jam
Inj paracetamol 3x500mg kp demam
Inj ondancen..., , 2121, 1, Inf RL 100ml/jam&lt;div&gt;Inj paracetamol 3x500mg kp demam&lt;/div&gt;&lt;di..., null, null, 2121, 2025-03-05 11:23:00, null, null, null, null, null, null, null, 0, , , , , , , , null, null, null, null). /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 11:23:00 --> Query error: ERROR:  null value in column "waktu" violates not-null constraint
DETAIL:  Failing row contains (813917, 703323, null, 10, demam - , pf dbn
akral hangat crt kurang dari 2 , dengue fever with warning signs (demam hari ke 4), Inf RL 100ml/jam
Inj paracetamol 3x500mg kp demam
Inj ondancen..., , 2121, 1, Inf RL 100ml/jam<div>Inj paracetamol 3x500mg kp demam</div><di..., null, null, 2121, 2025-03-05 11:23:00, null, null, null, null, null, null, null, 0, , , , , , , , null, null, null, null). - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('703323', NULL, '10', 'demam - ', 'pf dbn
akral hangat crt kurang dari 2 ', 'dengue fever with warning signs (demam hari ke 4)', 'Inf RL 100ml/jam
Inj paracetamol 3x500mg kp demam
Inj ondancentron 3x4mg kp
Inj ranitidin 2x50mg kp
Inj omeprazol 1x20mg pagi
Sucralfat 3x10ml ac

cek dr evaluasi pagi ', '', '', '', '', '', '', '', '', '2121', '1', 'Inf RL 100ml/jam<div>Inj paracetamol 3x500mg kp demam</div><div>Inj ondancentron 3x4mg kp</div><div>Inj ranitidin 2x50mg kp</div><div>Inj omeprazol 1x20mg pagi</div><div>Sucralfat 3x10ml ac</div><div>cek dr evaluasi pagiÂ </div><div></div>', NULL, '2121', 0, NULL, '2025-03-05 11:23:00')
ERROR - 2025-03-05 11:23:00 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-03-05 11:23:00 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-03-05 11:23:07 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-03-05 11:23:07 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  null value in column &quot;waktu&quot; violates not-null constraint
DETAIL:  Failing row contains (813918, 703323, null, 10, demam - , pf dbn
akral hangat crt kurang dari 2 , dengue fever with warning signs (demam hari ke 4), Inf RL 100ml/jam
Inj paracetamol 3x500mg kp demam
Inj ondancen..., , 2121, 1, Inf RL 100ml/jam&lt;div&gt;Inj paracetamol 3x500mg kp demam&lt;/div&gt;&lt;di..., null, null, 2121, 2025-03-05 11:23:07, null, null, null, null, null, null, null, 0, , , , , , , , null, null, null, null). /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 11:23:07 --> Query error: ERROR:  null value in column "waktu" violates not-null constraint
DETAIL:  Failing row contains (813918, 703323, null, 10, demam - , pf dbn
akral hangat crt kurang dari 2 , dengue fever with warning signs (demam hari ke 4), Inf RL 100ml/jam
Inj paracetamol 3x500mg kp demam
Inj ondancen..., , 2121, 1, Inf RL 100ml/jam<div>Inj paracetamol 3x500mg kp demam</div><di..., null, null, 2121, 2025-03-05 11:23:07, null, null, null, null, null, null, null, 0, , , , , , , , null, null, null, null). - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('703323', NULL, '10', 'demam - ', 'pf dbn
akral hangat crt kurang dari 2 ', 'dengue fever with warning signs (demam hari ke 4)', 'Inf RL 100ml/jam
Inj paracetamol 3x500mg kp demam
Inj ondancentron 3x4mg kp
Inj ranitidin 2x50mg kp
Inj omeprazol 1x20mg pagi
Sucralfat 3x10ml ac

cek dr evaluasi pagi ', '', '', '', '', '', '', '', '', '2121', '1', 'Inf RL 100ml/jam<div>Inj paracetamol 3x500mg kp demam</div><div>Inj ondancentron 3x4mg kp</div><div>Inj ranitidin 2x50mg kp</div><div>Inj omeprazol 1x20mg pagi</div><div>Sucralfat 3x10ml ac</div><div>cek dr evaluasi pagiÂ </div><div></div>', NULL, '2121', 0, NULL, '2025-03-05 11:23:07')
ERROR - 2025-03-05 11:23:08 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-03-05 11:23:08 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-03-05 11:23:09 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-03-05 11:23:09 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-03-05 11:23:09 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-03-05 11:23:09 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-03-05 11:23:09 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-03-05 11:23:09 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-03-05 11:23:10 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-03-05 11:23:10 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-03-05 11:23:10 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-03-05 11:23:11 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-03-05 11:23:13 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-03-05 11:23:13 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-03-05 11:23:17 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 11:24:05 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-03-05 11:24:05 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-03-05 11:24:05 --> Severity: Notice  --> Undefined property: stdClass::$id_icd9 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 348
ERROR - 2025-03-05 11:24:05 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-03-05 11:24:05 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-03-05 11:24:05 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-03-05 11:24:05 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-03-05 11:24:05 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-03-05 11:24:05 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-03-05 11:24:05 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-03-05 11:24:05 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-03-05 11:24:05 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-03-05 11:24:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 11:24:10 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 11:24:10 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 812
ERROR - 2025-03-05 11:24:10 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 812
ERROR - 2025-03-05 11:24:10 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 817
ERROR - 2025-03-05 11:24:10 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 817
ERROR - 2025-03-05 11:24:10 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 818
ERROR - 2025-03-05 11:24:10 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 818
ERROR - 2025-03-05 11:24:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 11:24:15 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 11:24:21 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 11:24:21 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 11:24:27 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-03-05 11:24:27 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-03-05 11:24:27 --> Severity: Notice  --> Undefined property: stdClass::$id_icd9 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 348
ERROR - 2025-03-05 11:24:27 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-03-05 11:24:27 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-03-05 11:24:27 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-03-05 11:24:27 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-03-05 11:24:27 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-03-05 11:24:27 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-03-05 11:24:27 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-03-05 11:24:27 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-03-05 11:24:27 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-03-05 11:24:29 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 11:24:29 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 11:24:57 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 11:25:42 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  null value in column &quot;waktu&quot; violates not-null constraint
DETAIL:  Failing row contains (813925, 703343, null, 10, nyeri perut bagian bawah
nyeri saat bak tidak ada , nyeri tekan supra pubik, susp urolithiasis
isk , lacak hasil usg GUT 
terapi lanjut , , 2121, 1, -, null, null, 2121, 2025-03-05 11:25:42, null, null, null, null, null, null, null, 0, , , , , , , , null, null, null, null). /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 11:25:42 --> Query error: ERROR:  null value in column "waktu" violates not-null constraint
DETAIL:  Failing row contains (813925, 703343, null, 10, nyeri perut bagian bawah
nyeri saat bak tidak ada , nyeri tekan supra pubik, susp urolithiasis
isk , lacak hasil usg GUT 
terapi lanjut , , 2121, 1, -, null, null, 2121, 2025-03-05 11:25:42, null, null, null, null, null, null, null, 0, , , , , , , , null, null, null, null). - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('703343', NULL, '10', 'nyeri perut bagian bawah
nyeri saat bak tidak ada ', 'nyeri tekan supra pubik', 'susp urolithiasis
isk ', 'lacak hasil usg GUT 
terapi lanjut ', '', '', '', '', '', '', '', '', '2121', '1', '-', NULL, '2121', 0, NULL, '2025-03-05 11:25:42')
ERROR - 2025-03-05 11:25:49 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-03-05 11:25:57 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 11:26:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 11:26:36 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 11:26:36 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 11:26:41 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 11:26:41 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 11:26:43 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 11:27:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 11:27:03 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 11:27:31 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  null value in column &quot;waktu&quot; violates not-null constraint
DETAIL:  Failing row contains (813929, 703321, null, 10, batuk berkurang , pf dbn 
rh -
retraksi - , ispa, BLPL 
paracetamol 3x0.8ml kp
amoxicilin 3x80mg untuk 7 hari 
..., , 2121, 1, BLPL &lt;div&gt;paracetamol 3x0.8ml kp&lt;/div&gt;&lt;div&gt;amoxicilin 3x80mg u..., null, null, 2121, 2025-03-05 11:27:31, null, null, null, null, null, null, null, 0, , , , , , , , null, null, null, null). /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 11:27:31 --> Query error: ERROR:  null value in column "waktu" violates not-null constraint
DETAIL:  Failing row contains (813929, 703321, null, 10, batuk berkurang , pf dbn 
rh -
retraksi - , ispa, BLPL 
paracetamol 3x0.8ml kp
amoxicilin 3x80mg untuk 7 hari 
..., , 2121, 1, BLPL <div>paracetamol 3x0.8ml kp</div><div>amoxicilin 3x80mg u..., null, null, 2121, 2025-03-05 11:27:31, null, null, null, null, null, null, null, 0, , , , , , , , null, null, null, null). - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('703321', NULL, '10', 'batuk berkurang ', 'pf dbn 
rh -
retraksi - ', 'ispa', 'BLPL 
paracetamol 3x0.8ml kp
amoxicilin 3x80mg untuk 7 hari 
Puyer batuk 
Salbutamol 0,5mg + triamcinolon 0,8mg , 3x1 no XV
Cetirizin drop 1x0,25ml malam
', '', '', '', '', '', '', '', '', '2121', '1', 'BLPL <div>paracetamol 3x0.8ml kp</div><div>amoxicilin 3x80mg untuk 7 hari </div><div>Puyer batuk </div><div>Salbutamol 0,5mg + triamcinolon 0,8mg , 3x1 no XV</div><div>Cetirizin drop 1x0,25ml malam</div><div><br></div>', NULL, '2121', 0, NULL, '2025-03-05 11:27:31')
ERROR - 2025-03-05 11:27:39 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 11:27:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  null value in column &quot;waktu&quot; violates not-null constraint
DETAIL:  Failing row contains (813930, 703321, null, 10, batuk berkurang , pf dbn 
rh -
retraksi - , ispa, BLPL 
paracetamol 3x0.8ml kp
amoxicilin 3x80mg untuk 7 hari 
..., , 2121, 1, BLPL &lt;div&gt;paracetamol 3x0.8ml kp&lt;/div&gt;&lt;div&gt;amoxicilin 3x80mg u..., null, null, 2121, 2025-03-05 11:27:51, null, null, null, null, null, null, null, 0, , , , , , , , null, null, null, null). /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 11:27:51 --> Query error: ERROR:  null value in column "waktu" violates not-null constraint
DETAIL:  Failing row contains (813930, 703321, null, 10, batuk berkurang , pf dbn 
rh -
retraksi - , ispa, BLPL 
paracetamol 3x0.8ml kp
amoxicilin 3x80mg untuk 7 hari 
..., , 2121, 1, BLPL <div>paracetamol 3x0.8ml kp</div><div>amoxicilin 3x80mg u..., null, null, 2121, 2025-03-05 11:27:51, null, null, null, null, null, null, null, 0, , , , , , , , null, null, null, null). - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('703321', NULL, '10', 'batuk berkurang ', 'pf dbn 
rh -
retraksi - ', 'ispa', 'BLPL 
paracetamol 3x0.8ml kp
amoxicilin 3x80mg untuk 7 hari 
Puyer batuk 
Salbutamol 0,5mg + triamcinolon 0,8mg , 3x1 no XV
Cetirizin drop 1x0,25ml malam
', '', '', '', '', '', '', '', '', '2121', '1', 'BLPL <div>paracetamol 3x0.8ml kp</div><div>amoxicilin 3x80mg untuk 7 hari </div><div>Puyer batuk </div><div>Salbutamol 0,5mg + triamcinolon 0,8mg , 3x1 no XV</div><div>Cetirizin drop 1x0,25ml malam</div><div><br></div>', NULL, '2121', 0, NULL, '2025-03-05 11:27:51')
ERROR - 2025-03-05 11:28:49 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 11:29:02 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 812
ERROR - 2025-03-05 11:29:02 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 812
ERROR - 2025-03-05 11:29:02 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 817
ERROR - 2025-03-05 11:29:02 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 817
ERROR - 2025-03-05 11:29:02 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 818
ERROR - 2025-03-05 11:29:02 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 818
ERROR - 2025-03-05 11:29:07 --> Severity: Notice  --> Trying to get property 'jenis_layanan' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pengkodean_icd_x/controllers/api/Pengkodean_icd_x.php 350
ERROR - 2025-03-05 11:29:40 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 11:29:55 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-03-05 11:30:04 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 11:30:22 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 11:31:20 --> Severity: Notice  --> Trying to get property 'nama' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/sisa_stok/views/export/sisa_stok_unit.php 44
ERROR - 2025-03-05 11:31:21 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-03-05 11:31:21 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-03-05 11:31:21 --> Severity: Notice  --> Undefined property: stdClass::$id_icd9 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 348
ERROR - 2025-03-05 11:31:21 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-03-05 11:31:21 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-03-05 11:31:21 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-03-05 11:31:21 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-03-05 11:31:21 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-03-05 11:31:21 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-03-05 11:31:26 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-03-05 11:31:27 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 812
ERROR - 2025-03-05 11:31:27 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 812
ERROR - 2025-03-05 11:31:27 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 817
ERROR - 2025-03-05 11:31:27 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 817
ERROR - 2025-03-05 11:31:27 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 818
ERROR - 2025-03-05 11:31:27 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 818
ERROR - 2025-03-05 11:31:28 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-03-05 11:31:28 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-03-05 11:31:28 --> Severity: Notice  --> Undefined property: stdClass::$id_icd9 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 348
ERROR - 2025-03-05 11:31:28 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-03-05 11:31:28 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-03-05 11:31:28 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-03-05 11:31:28 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-03-05 11:31:28 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-03-05 11:31:28 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-03-05 11:31:28 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  syntax error at or near &quot;and&quot;
LINE 10:         and b.id_kategori = 1
                 ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 11:31:28 --> Query error: ERROR:  syntax error at or near "and"
LINE 10:         and b.id_kategori = 1
                 ^ - Invalid query: 
		select rrd.id_barang, r.tanggal_resep::date, b.nama_lengkap, rrd.jumlah_pakai
		from sm_resep r
		join sm_resep_r rr on r.id = rr.id_resep
		join sm_resep_r_detail rrd on rr.id = rrd.id_resep_r
		join sm_barang b on rrd.id_barang = b.id
		where id_pasien = '00273197'
		and tanggal_resep::date between (now() - interval '2 week')::date and now()::date
		and rrd.id_barang = 
        and b.id_kategori = 1
		and b.is_obat_kronis = '1'
		order by r.id desc
		limit 1
		
ERROR - 2025-03-05 11:31:58 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-03-05 11:32:07 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 11:32:35 --> Severity: Notice  --> Trying to get property 'nama' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/sisa_stok/views/export/sisa_stok_unit.php 44
ERROR - 2025-03-05 11:32:48 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-03-05 11:33:13 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 11:33:13 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: SELECT ab.*, sp.nama as poli, pg.nama as nama_dokter
FROM "sm_antrian_bpjs" as "ab"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "ab"."nama_poli"
LEFT JOIN "sm_translucent" as "cr" ON "cr"."id" = "ab"."user_create"
LEFT JOIN "sm_translucent" as "ur" ON "ur"."id" = "ab"."user_update"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "ab"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
WHERE "ab"."id" is not null
AND "ab"."tanggal_kunjungan" BETWEEN '2025-03-05 00:00:00' AND '2025-03-05 23:59:59'
AND  "ab"."nomor_antrean" LIKE '%A065%' ESCAPE '!'
ORDER BY "ab"."id" DESC
 LIMIT 10 OFFSET -10
ERROR - 2025-03-05 11:34:23 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-03-05 11:34:32 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 11:35:31 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 11:35:31 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 11:35:59 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-03-05 11:36:31 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 11:36:43 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 11:38:01 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-03-05 11:38:05 --> Severity: Notice  --> Undefined property: stdClass::$response /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/antrian_bpjs/controllers/api/Antrian_bpjs.php 4810
ERROR - 2025-03-05 11:38:05 --> Severity: Notice  --> Trying to get property 'status' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/antrian_bpjs/controllers/api/Antrian_bpjs.php 4904
ERROR - 2025-03-05 11:38:08 --> Severity: Notice  --> Undefined property: stdClass::$response /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/antrian_bpjs/controllers/api/Antrian_bpjs.php 4810
ERROR - 2025-03-05 11:38:09 --> Severity: Notice  --> Trying to get property 'status' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/antrian_bpjs/controllers/api/Antrian_bpjs.php 4904
ERROR - 2025-03-05 11:38:09 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 11:38:23 --> Severity: Notice  --> Undefined property: stdClass::$response /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/antrian_bpjs/controllers/api/Antrian_bpjs.php 4810
ERROR - 2025-03-05 11:38:23 --> Severity: Notice  --> Trying to get property 'status' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/antrian_bpjs/controllers/api/Antrian_bpjs.php 4904
ERROR - 2025-03-05 11:38:26 --> Severity: Notice  --> Undefined property: stdClass::$response /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/antrian_bpjs/controllers/api/Antrian_bpjs.php 4810
ERROR - 2025-03-05 11:38:26 --> Severity: Notice  --> Trying to get property 'status' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/antrian_bpjs/controllers/api/Antrian_bpjs.php 4904
ERROR - 2025-03-05 11:39:46 --> Severity: Notice  --> Undefined property: stdClass::$response /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/antrian_bpjs/controllers/api/Antrian_bpjs.php 4810
ERROR - 2025-03-05 11:39:46 --> Severity: Notice  --> Trying to get property 'status' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/antrian_bpjs/controllers/api/Antrian_bpjs.php 4904
ERROR - 2025-03-05 11:39:55 --> Severity: Notice  --> Undefined property: stdClass::$response /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/antrian_bpjs/controllers/api/Antrian_bpjs.php 4810
ERROR - 2025-03-05 11:39:55 --> Severity: Notice  --> Trying to get property 'status' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/antrian_bpjs/controllers/api/Antrian_bpjs.php 4904
ERROR - 2025-03-05 11:40:04 --> Severity: Notice  --> Undefined property: stdClass::$response /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/antrian_bpjs/controllers/api/Antrian_bpjs.php 4810
ERROR - 2025-03-05 11:40:05 --> Severity: Notice  --> Trying to get property 'status' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/antrian_bpjs/controllers/api/Antrian_bpjs.php 4904
ERROR - 2025-03-05 11:40:08 --> Severity: Notice  --> Undefined property: stdClass::$response /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/antrian_bpjs/controllers/api/Antrian_bpjs.php 4810
ERROR - 2025-03-05 11:40:08 --> Severity: Notice  --> Trying to get property 'status' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/antrian_bpjs/controllers/api/Antrian_bpjs.php 4904
ERROR - 2025-03-05 11:40:25 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 11:40:27 --> Severity: Notice  --> Undefined property: stdClass::$response /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/antrian_bpjs/controllers/api/Antrian_bpjs.php 4810
ERROR - 2025-03-05 11:40:27 --> Severity: Notice  --> Trying to get property 'status' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/antrian_bpjs/controllers/api/Antrian_bpjs.php 4904
ERROR - 2025-03-05 11:40:31 --> Severity: Notice  --> Undefined property: stdClass::$response /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/antrian_bpjs/controllers/api/Antrian_bpjs.php 4810
ERROR - 2025-03-05 11:40:31 --> Severity: Notice  --> Trying to get property 'status' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/antrian_bpjs/controllers/api/Antrian_bpjs.php 4904
ERROR - 2025-03-05 11:41:40 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 11:45:08 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 11:46:12 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 11:47:47 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-03-05 11:49:08 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/intensive_care/views/js.php 1119
ERROR - 2025-03-05 11:50:04 --> Severity: Warning  --> number_format() expects parameter 1 to be float, string given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export.php 102
ERROR - 2025-03-05 11:50:04 --> Severity: Warning  --> number_format() expects parameter 1 to be float, string given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export.php 102
ERROR - 2025-03-05 11:50:04 --> Severity: Warning  --> number_format() expects parameter 1 to be float, string given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export.php 102
ERROR - 2025-03-05 11:50:04 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export.php 111
ERROR - 2025-03-05 11:50:04 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export.php 111
ERROR - 2025-03-05 11:50:04 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export.php 111
ERROR - 2025-03-05 11:50:41 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 11:50:58 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 812
ERROR - 2025-03-05 11:50:58 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 812
ERROR - 2025-03-05 11:50:58 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 817
ERROR - 2025-03-05 11:50:58 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 817
ERROR - 2025-03-05 11:50:58 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 818
ERROR - 2025-03-05 11:50:58 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 818
ERROR - 2025-03-05 11:51:01 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 11:52:14 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 812
ERROR - 2025-03-05 11:52:14 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 812
ERROR - 2025-03-05 11:52:14 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 817
ERROR - 2025-03-05 11:52:14 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 817
ERROR - 2025-03-05 11:52:14 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 818
ERROR - 2025-03-05 11:52:14 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 818
ERROR - 2025-03-05 11:52:58 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 812
ERROR - 2025-03-05 11:52:58 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 812
ERROR - 2025-03-05 11:52:58 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 817
ERROR - 2025-03-05 11:52:58 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 817
ERROR - 2025-03-05 11:52:58 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 818
ERROR - 2025-03-05 11:52:58 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 818
ERROR - 2025-03-05 11:54:29 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 11:54:29 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 11:54:32 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 11:54:32 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 11:55:41 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 11:55:41 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 11:55:47 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 812
ERROR - 2025-03-05 11:55:47 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 812
ERROR - 2025-03-05 11:55:47 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 817
ERROR - 2025-03-05 11:55:47 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 817
ERROR - 2025-03-05 11:55:47 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 818
ERROR - 2025-03-05 11:55:47 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 818
ERROR - 2025-03-05 11:55:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 11:55:52 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 11:55:55 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 11:55:55 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 11:57:39 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 11:57:57 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 11:58:01 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 11:58:01 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 11:58:04 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 11:58:04 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 11:58:44 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 11:58:55 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 812
ERROR - 2025-03-05 11:58:55 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 812
ERROR - 2025-03-05 11:58:55 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 817
ERROR - 2025-03-05 11:58:55 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 817
ERROR - 2025-03-05 11:58:55 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 818
ERROR - 2025-03-05 11:58:55 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 818
ERROR - 2025-03-05 11:59:48 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 11:59:48 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 11:59:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 11:59:52 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 12:00:08 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 12:00:19 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 12:00:25 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-03-05 12:00:33 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;undefined&quot;
LINE 3: WHERE &quot;id_resep&quot; = 'undefined'
                           ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 12:00:33 --> Query error: ERROR:  invalid input syntax for type integer: "undefined"
LINE 3: WHERE "id_resep" = 'undefined'
                           ^ - Invalid query: SELECT *
FROM "sm_resep_tebus"
WHERE "id_resep" = 'undefined'
ERROR - 2025-03-05 12:00:34 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 6: WHERE &quot;r&quot;.&quot;id_layanan_pendaftaran&quot; = 'null'
                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 12:00:34 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 6: WHERE "r"."id_layanan_pendaftaran" = 'null'
                                             ^ - Invalid query: SELECT "r".*, "rt"."id" as "id_resep_tebus", "af"."id" as "id_antrian_farmasi", case when rt.cetakan_ke != '0' then 1 else 0 end as is_cetak, "p"."waktu_diserahkan"
FROM "sm_resep" "r"
JOIN "sm_resep_tebus" "rt" ON "r"."id" = "rt"."id_resep"
JOIN "sm_antrian_farmasi" "af" ON "af"."id_layanan_pendaftaran" = "r"."id_layanan_pendaftaran"
LEFT JOIN "sm_penjualan" "p" ON "r"."id" = "p"."id_resep"
WHERE "r"."id_layanan_pendaftaran" = 'null'
ERROR - 2025-03-05 12:01:53 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 12:01:53 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 12:02:19 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-03-05 12:02:19 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 12:02:24 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 12:02:30 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;undefined&quot;
LINE 11: WHERE &quot;rb&quot;.&quot;id&quot; = 'undefined'
                           ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 12:02:30 --> Query error: ERROR:  invalid input syntax for type integer: "undefined"
LINE 11: WHERE "rb"."id" = 'undefined'
                           ^ - Invalid query: SELECT "rr"."id", "rr"."r_no", "rr"."ket_aturan_pakai", "rr"."aturan_pakai", "rb"."waktu", "lp"."id_penjamin", "pjm"."nama" as "penjamin", "lp"."cara_bayar", date(r.waktu) as tanggal, "pj"."id" as "id_jual_resep", "pg"."nama" as "dokter", "p"."tanggal_lahir", "p"."nama" as "pasien", "lp"."jenis_layanan", "p"."alamat" as "alamat_pasien", "p"."id" as "no_rm", "rb"."id_resep", "rr"."keterangan_resep", case when rr.aturan_pakai_manual = '0' then rr.aturan_pakai else rr.ket_aturan_pakai_manual end as aturan_pakai
FROM "sm_resep_tebus_r" as "rr"
JOIN "sm_resep_tebus" as "rb" ON "rb"."id" = "rr"."id_resep_tebus"
JOIN "sm_resep" as "r" ON "r"."id" = "rb"."id_resep"
JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "r"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
JOIN "sm_pasien" as "p" ON "p"."id" = "r"."id_pasien"
JOIN "sm_layanan_pendaftaran" as "lp" ON "lp"."id" = "r"."id_layanan_pendaftaran"
LEFT JOIN "sm_penjamin" as "pjm" ON "pjm"."id" = "lp"."id_penjamin"
LEFT JOIN "sm_penjualan" as "pj" ON "pj"."id_resep" = "r"."id"
WHERE "rb"."id" = 'undefined'
ERROR - 2025-03-05 12:02:56 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-03-05 12:03:32 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 12:03:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 12:03:52 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 12:03:56 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 12:03:56 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 12:05:41 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 12:05:49 --> Severity: Notice  --> Trying to get property 'jenis_layanan' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pengkodean_icd_x/controllers/api/Pengkodean_icd_x.php 350
ERROR - 2025-03-05 12:05:51 --> Severity: Notice  --> Trying to get property 'jenis_layanan' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pengkodean_icd_x/controllers/api/Pengkodean_icd_x.php 350
ERROR - 2025-03-05 12:07:11 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 12:07:26 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-03-05 12:09:54 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-03-05 12:10:14 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 12:11:08 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 12:11:33 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 12:12:05 --> Severity: Warning  --> number_format() expects parameter 1 to be float, string given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export.php 102
ERROR - 2025-03-05 12:12:05 --> Severity: Warning  --> number_format() expects parameter 1 to be float, string given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export.php 102
ERROR - 2025-03-05 12:12:05 --> Severity: Warning  --> number_format() expects parameter 1 to be float, string given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export.php 102
ERROR - 2025-03-05 12:12:05 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export.php 111
ERROR - 2025-03-05 12:12:05 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export.php 111
ERROR - 2025-03-05 12:12:05 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/lap_kasir/views/export.php 111
ERROR - 2025-03-05 12:12:25 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 12:13:41 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  syntax error at or near &quot;and&quot;
LINE 10:         and b.id_kategori = 1
                 ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 12:13:41 --> Query error: ERROR:  syntax error at or near "and"
LINE 10:         and b.id_kategori = 1
                 ^ - Invalid query: 
		select rrd.id_barang, r.tanggal_resep::date, b.nama_lengkap, rrd.jumlah_pakai
		from sm_resep r
		join sm_resep_r rr on r.id = rr.id_resep
		join sm_resep_r_detail rrd on rr.id = rrd.id_resep_r
		join sm_barang b on rrd.id_barang = b.id
		where id_pasien = '00115332'
		and tanggal_resep::date between (now() - interval '2 week')::date and now()::date
		and rrd.id_barang = 
        and b.id_kategori = 1
		and b.is_obat_kronis = '1'
		order by r.id desc
		limit 1
		
ERROR - 2025-03-05 12:14:00 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-03-05 12:14:00 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-03-05 12:14:06 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-03-05 12:14:06 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-03-05 12:14:17 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-03-05 12:14:17 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-03-05 12:14:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_sep_idx&quot;
DETAIL:  Key (no_sep)=(0223R0380325V000506) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 12:14:46 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_sep_idx"
DETAIL:  Key (no_sep)=(0223R0380325V000506) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "hak_kelas", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "nik_pjwb", "nama_pjwb", "kelamin_pjwb", "telp_pjwb", "alamat_pjwb", "tgl_lahir_pjwb", "hubungan_pjwb", "nik_pjwb_finansial", "nama_pjwb_finansial", "kelamin_pjwb_finansial", "telp_pjwb_finansial", "alamat_pjwb_finansial", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2503050670', '00286512', '2025-03-05 12:14:46', 'Hemodialisa', 'Hemodialisa', '', 'Jalan', '1', NULL, NULL, '', '', '', '', '', NULL, '', '', '', '', '', '', '1', '0000048020152', '0223R0380325V000506', '0223R0380325K000270', 'Lama', '0', '1775', 0, 'Belum', 'Hemodialisa ', 0, '2', '', NULL)
ERROR - 2025-03-05 12:14:49 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_sep_idx&quot;
DETAIL:  Key (no_sep)=(0223R0380325V000506) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 12:14:49 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_sep_idx"
DETAIL:  Key (no_sep)=(0223R0380325V000506) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "hak_kelas", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "nik_pjwb", "nama_pjwb", "kelamin_pjwb", "telp_pjwb", "alamat_pjwb", "tgl_lahir_pjwb", "hubungan_pjwb", "nik_pjwb_finansial", "nama_pjwb_finansial", "kelamin_pjwb_finansial", "telp_pjwb_finansial", "alamat_pjwb_finansial", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2503050670', '00286512', '2025-03-05 12:14:49', 'Hemodialisa', 'Hemodialisa', '', 'Jalan', '1', NULL, NULL, '', '', '', '', '', NULL, '', '', '', '', '', '', '1', '0000048020152', '0223R0380325V000506', '0223R0380325K000270', 'Lama', '0', '1775', 0, 'Belum', 'Hemodialisa ', 0, '2', '', NULL)
ERROR - 2025-03-05 12:14:53 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_sep_idx&quot;
DETAIL:  Key (no_sep)=(0223R0380325V000506) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 12:14:53 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_sep_idx"
DETAIL:  Key (no_sep)=(0223R0380325V000506) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "hak_kelas", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "nik_pjwb", "nama_pjwb", "kelamin_pjwb", "telp_pjwb", "alamat_pjwb", "tgl_lahir_pjwb", "hubungan_pjwb", "nik_pjwb_finansial", "nama_pjwb_finansial", "kelamin_pjwb_finansial", "telp_pjwb_finansial", "alamat_pjwb_finansial", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2503050670', '00286512', '2025-03-05 12:14:53', 'Hemodialisa', 'Hemodialisa', '', 'Jalan', '1', NULL, NULL, '', '', '', '', '', NULL, '', '', '', '', '', '', '1', '0000048020152', '0223R0380325V000506', '0223R0380325K000270', 'Lama', '0', '1775', 0, 'Belum', 'Hemodialisa ', 0, '2', '', NULL)
ERROR - 2025-03-05 12:15:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_sep_idx&quot;
DETAIL:  Key (no_sep)=(0223R0380325V000506) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 12:15:09 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_sep_idx"
DETAIL:  Key (no_sep)=(0223R0380325V000506) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "hak_kelas", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "nik_pjwb", "nama_pjwb", "kelamin_pjwb", "telp_pjwb", "alamat_pjwb", "tgl_lahir_pjwb", "hubungan_pjwb", "nik_pjwb_finansial", "nama_pjwb_finansial", "kelamin_pjwb_finansial", "telp_pjwb_finansial", "alamat_pjwb_finansial", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2503050670', '00286512', '2025-03-05 12:15:09', 'Hemodialisa', 'Hemodialisa', '', 'Jalan', '1', NULL, NULL, '', '', '', '', '', NULL, '', '', '', '', '', '', '1', '0000048020152', '0223R0380325V000506', '0223R0380325K000270', 'Lama', '0', '1775', 0, 'Belum', 'Hemodialisa ', 0, '2', '', NULL)
ERROR - 2025-03-05 12:15:14 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-03-05 12:15:14 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-03-05 12:15:21 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-03-05 12:16:22 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_sep_idx&quot;
DETAIL:  Key (no_sep)=(0223R0380325V000506) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 12:16:22 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_sep_idx"
DETAIL:  Key (no_sep)=(0223R0380325V000506) already exists. - Invalid query: INSERT INTO "sm_pendaftaran" ("no_register", "id_pasien", "tanggal_daftar", "jenis_pendaftaran", "jenis_igd", "hak_kelas", "jenis_rawat", "domisili", "id_instansi_perujuk", "nadis_perujuk", "nik_pjwb", "nama_pjwb", "kelamin_pjwb", "telp_pjwb", "alamat_pjwb", "tgl_lahir_pjwb", "hubungan_pjwb", "nik_pjwb_finansial", "nama_pjwb_finansial", "kelamin_pjwb_finansial", "telp_pjwb_finansial", "alamat_pjwb_finansial", "id_penjamin", "no_polish", "no_sep", "no_rujukan", "status", "doa", "id_users", "pendaftaran_langsung", "lunas", "keterangan", "merge", "id_asal_masuk", "keterangan_asal_masuk", "kode_booking") VALUES ('2503050670', '00286512', '2025-03-05 12:16:22', 'Hemodialisa', 'Hemodialisa', '', 'Jalan', '1', NULL, NULL, '', '', '', '', '', NULL, '', '', '', '', '', '', '1', '0000048020152', '0223R0380325V000506', '0223R0380325K000270', 'Lama', '0', '1775', 0, 'Belum', 'Hemodialisa ', 0, '2', '', NULL)
ERROR - 2025-03-05 12:16:51 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-03-05 12:19:12 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 12:19:41 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 7939
ERROR - 2025-03-05 12:21:30 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;undefined&quot;
LINE 11: WHERE &quot;rt&quot;.&quot;id&quot; = 'undefined'
                           ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 12:21:30 --> Query error: ERROR:  invalid input syntax for type integer: "undefined"
LINE 11: WHERE "rt"."id" = 'undefined'
                           ^ - Invalid query: SELECT "rt".*, "lp"."id_penjamin", "lp"."cara_bayar", "lp"."jenis_layanan", "pjn"."nama" as "penjamin", date(r.waktu) as tanggal, "pj"."id" as "id_penjualan", "pg"."nama" as "dokter", "p"."tanggal_lahir", "p"."nama" as "nama_pasien", "p"."alamat" as "alamat_pasien", "p"."id" as "id_pasien", "af"."id" as "id_antrian_farmasi"
FROM "sm_resep_tebus" as "rt"
JOIN "sm_resep" as "r" ON "r"."id" = "rt"."id_resep"
LEFT JOIN "sm_antrian_farmasi" as "af" ON "af"."id_resep" = "r"."id"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "r"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
JOIN "sm_pasien" as "p" ON "p"."id" = "r"."id_pasien"
JOIN "sm_layanan_pendaftaran" as "lp" ON "lp"."id" = "r"."id_layanan_pendaftaran"
LEFT JOIN "sm_penjamin" as "pjn" ON "pjn"."id" = "lp"."id_penjamin"
LEFT JOIN "sm_penjualan" as "pj" ON "pj"."id_resep" = "r"."id"
WHERE "rt"."id" = 'undefined'
ORDER BY "r"."waktu" DESC
ERROR - 2025-03-05 12:24:07 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 12:24:08 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 812
ERROR - 2025-03-05 12:24:08 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 812
ERROR - 2025-03-05 12:24:08 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 817
ERROR - 2025-03-05 12:24:08 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 817
ERROR - 2025-03-05 12:24:08 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 818
ERROR - 2025-03-05 12:24:08 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 818
ERROR - 2025-03-05 12:24:58 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-03-05 12:24:58 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-03-05 12:24:58 --> Severity: Notice  --> Undefined property: stdClass::$id_icd9 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 348
ERROR - 2025-03-05 12:24:58 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-03-05 12:24:58 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-03-05 12:24:58 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-03-05 12:24:58 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-03-05 12:24:58 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-03-05 12:24:58 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-03-05 12:24:58 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-03-05 12:24:58 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-03-05 12:24:58 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-03-05 12:24:58 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-03-05 12:25:07 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-03-05 12:25:07 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-03-05 12:25:07 --> Severity: Notice  --> Undefined property: stdClass::$id_icd9 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 348
ERROR - 2025-03-05 12:25:07 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-03-05 12:25:07 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-03-05 12:25:07 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-03-05 12:25:07 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-03-05 12:25:07 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-03-05 12:25:07 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-03-05 12:25:07 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-03-05 12:25:07 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-03-05 12:25:07 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-03-05 12:25:07 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-03-05 12:25:56 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-03-05 12:25:56 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-03-05 12:25:56 --> Severity: Notice  --> Undefined property: stdClass::$id_icd9 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 348
ERROR - 2025-03-05 12:25:56 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-03-05 12:25:56 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-03-05 12:25:56 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-03-05 12:25:56 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-03-05 12:25:56 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-03-05 12:25:56 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-03-05 12:25:56 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-03-05 12:25:56 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-03-05 12:25:56 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-03-05 12:25:56 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-03-05 12:25:56 --> Severity: Notice  --> Undefined property: stdClass::$reimburse /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/models/Order_operasi_model.php 441
ERROR - 2025-03-05 12:26:14 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-03-05 12:26:32 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-03-05 12:26:33 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-03-05 12:26:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 12:26:36 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 12:26:42 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-03-05 12:27:28 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 12:27:28 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 12:27:35 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 12:27:35 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 12:27:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 12:27:46 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 12:28:00 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 12:28:30 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 12:28:30 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 12:28:50 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 12:28:50 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 12:29:18 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 12:29:18 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 12:29:24 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 12:29:24 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 12:29:31 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 12:29:31 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 12:29:44 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ..., &quot;jam_pemberian_6&quot;) VALUES ('801492', '10', '2', '', '', ''...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 12:29:44 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ..., "jam_pemberian_6") VALUES ('801492', '10', '2', '', '', ''...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES ('801492', '10', '2', '', '', '', 'null', '0', '', '0', '', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-03-05 12:29:51 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-03-05 12:29:56 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-03-05 12:30:01 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-03-05 12:30:05 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-03-05 12:30:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 12:30:12 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 12:30:26 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 12:31:23 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 12:31:23 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 12:31:29 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 12:31:29 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 12:31:55 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 12:31:55 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 12:32:04 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-03-05 12:32:35 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 12:32:35 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 12:32:41 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 12:32:41 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 12:33:07 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-03-05 12:33:24 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 12:33:24 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-03-05 12:33:24 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 12:33:24 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-03-05 12:33:47 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 12:33:47 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 12:33:54 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 12:33:54 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 12:34:01 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ..., &quot;jam_pemberian_6&quot;) VALUES ('801465', '15', '4', '', '', ''...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 12:34:01 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ..., "jam_pemberian_6") VALUES ('801465', '15', '4', '', '', ''...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES ('801465', '15', '4', '', '', '', 'null', '0', '', '0', '', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-03-05 12:34:28 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 12:34:28 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 12:34:34 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 12:34:34 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 12:34:59 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-03-05 12:35:24 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 12:35:24 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 12:35:32 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 12:35:32 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 12:35:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 12:35:40 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 12:35:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 12:35:46 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 12:35:53 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 12:35:53 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 12:36:21 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 12:36:21 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 12:36:27 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 12:36:27 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 12:36:32 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 12:36:32 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 12:36:41 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 812
ERROR - 2025-03-05 12:36:41 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 812
ERROR - 2025-03-05 12:36:41 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 817
ERROR - 2025-03-05 12:36:41 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 817
ERROR - 2025-03-05 12:36:41 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 818
ERROR - 2025-03-05 12:36:41 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 818
ERROR - 2025-03-05 12:36:53 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-03-05 12:37:13 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-03-05 12:37:14 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 12:37:14 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 12:37:20 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 12:37:20 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 12:37:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 12:37:36 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 12:37:38 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 12:37:38 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 12:37:43 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 12:37:43 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 12:37:45 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 12:37:45 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 12:37:50 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 12:37:50 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 12:37:53 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 12:37:53 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 12:38:05 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 12:38:05 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 12:38:34 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 12:39:34 --> Severity: Notice  --> Trying to get property 'jenis_layanan' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pengkodean_icd_x/controllers/api/Pengkodean_icd_x.php 350
ERROR - 2025-03-05 12:39:38 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 12:39:38 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 12:39:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 12:39:46 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 12:39:56 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-03-05 12:39:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 12:39:57 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 12:40:31 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 12:40:31 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 12:40:32 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 12:40:39 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 12:40:39 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 12:40:53 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 12:40:59 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 12:41:56 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-03-05 12:42:04 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 12:42:10 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-03-05 12:42:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 12:42:10 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 12:42:20 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 12:42:20 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 12:42:22 --> Severity: Notice  --> Trying to get property 'jenis_layanan' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pengkodean_icd_x/controllers/api/Pengkodean_icd_x.php 350
ERROR - 2025-03-05 12:42:26 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-03-05 12:42:27 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 12:42:27 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 12:43:09 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 12:43:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 12:43:12 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 12:43:44 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 12:43:44 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 12:44:02 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 12:44:02 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 12:44:02 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 12:44:02 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 12:44:06 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 12:44:06 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 12:44:08 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 12:44:08 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 12:44:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...ian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES ('801594', '4', '', '2', '...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 12:44:10 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...ian_5", "jam_pemberian_6") VALUES ('801594', '4', '', '2', '...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES ('801594', '4', '', '2', 'Injeksi', '', 'null', '0', '', '0', 'MORN', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-03-05 12:44:44 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 12:44:44 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 12:45:16 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 12:45:16 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 12:45:20 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 12:45:20 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 12:46:48 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 12:46:48 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 12:46:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 12:46:51 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 12:47:23 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 12:47:23 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 12:48:26 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 12:48:26 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 12:48:42 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 12:48:42 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 12:48:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 12:48:52 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 12:48:55 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 12:48:55 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 12:48:59 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 12:48:59 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 12:49:11 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 12:49:11 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 12:49:39 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-03-05 12:50:31 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 12:50:31 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 12:50:38 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 12:50:38 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 12:50:50 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 12:50:50 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 12:50:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 12:50:57 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 12:53:45 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 812
ERROR - 2025-03-05 12:53:45 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 812
ERROR - 2025-03-05 12:53:45 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 817
ERROR - 2025-03-05 12:53:45 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 817
ERROR - 2025-03-05 12:53:45 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 818
ERROR - 2025-03-05 12:53:45 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 818
ERROR - 2025-03-05 12:54:49 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 12:55:06 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 12:55:06 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 12:55:24 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 12:55:25 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 12:55:25 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 12:55:44 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 12:55:44 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 12:55:53 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 12:55:53 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 12:56:00 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 12:56:00 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 12:57:01 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 12:57:01 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 13:00:00 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 13:00:00 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 13:00:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 13:00:09 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 13:01:21 --> Severity: Notice  --> Undefined index: icd9_ok /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 10597
ERROR - 2025-03-05 13:01:21 --> Severity: Notice  --> Undefined index: icd9_ok /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 10597
ERROR - 2025-03-05 13:01:39 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 13:01:39 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 13:01:40 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 13:03:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 13:03:03 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 13:03:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 13:03:09 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 13:03:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 13:03:46 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 13:04:04 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 13:04:04 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 13:04:14 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 13:04:14 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 13:04:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 13:04:40 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 13:04:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 13:04:46 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 13:05:20 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 13:05:20 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 13:05:20 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 13:05:20 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 13:05:28 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 13:05:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;&quot;
LINE 1: ... &quot;sm_tarif_tindakan_pasien&quot; SET &quot;id_pengkodean&quot; = '', &quot;id_co...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 13:05:36 --> Query error: ERROR:  invalid input syntax for type integer: ""
LINE 1: ... "sm_tarif_tindakan_pasien" SET "id_pengkodean" = '', "id_co...
                                                             ^ - Invalid query: UPDATE "sm_tarif_tindakan_pasien" SET "id_pengkodean" = '', "id_coder" = '1480'
WHERE "id" = '4270504'
ERROR - 2025-03-05 13:05:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 13:05:52 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 13:06:44 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 13:06:44 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 13:06:50 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 13:06:50 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 13:07:07 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 13:07:07 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 13:07:24 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-03-05 13:07:24 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-03-05 13:07:27 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 13:07:27 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 13:07:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 13:07:36 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 13:07:41 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 13:07:41 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 13:07:47 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 13:07:47 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 13:07:55 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 13:07:55 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 13:08:14 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 13:08:14 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 13:08:40 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 13:09:24 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 13:09:24 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 13:09:26 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 13:09:26 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 13:09:34 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 13:09:34 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 13:09:48 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 13:09:48 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 13:10:00 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-03-05 13:10:00 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-03-05 13:10:04 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-03-05 13:10:04 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-03-05 13:10:06 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-03-05 13:10:06 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-03-05 13:10:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 13:10:09 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 13:10:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 13:10:15 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 13:10:23 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 13:10:23 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 13:10:30 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 13:10:30 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 13:10:31 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 13:10:31 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 13:10:38 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 13:10:38 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 13:10:42 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 13:10:42 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 13:11:06 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 13:11:06 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 13:11:06 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 13:11:08 --> Severity: Notice  --> Trying to get property 'jenis_layanan' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pengkodean_icd_x/controllers/api/Pengkodean_icd_x.php 350
ERROR - 2025-03-05 13:11:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 13:11:12 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 13:11:16 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 13:11:16 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 13:11:24 --> Severity: Notice  --> Undefined variable: tindakanNama /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 572
ERROR - 2025-03-05 13:11:24 --> Severity: Warning  --> array_unique() expects parameter 1 to be array, null given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 572
ERROR - 2025-03-05 13:11:24 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 574
ERROR - 2025-03-05 13:11:48 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 13:11:48 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 13:12:35 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 13:12:35 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 13:12:51 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 13:12:59 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;1 jam&quot;
LINE 1: ...&quot;,&quot;t_op_lain&quot;:&quot;&quot;,&quot;sm_top_lain&quot;:&quot;&quot;}', &quot;sirs_jam&quot; = '1 jam', &quot;...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 13:12:59 --> Query error: ERROR:  invalid input syntax for type integer: "1 jam"
LINE 1: ...","t_op_lain":"","sm_top_lain":""}', "sirs_jam" = '1 jam', "...
                                                             ^ - Invalid query: UPDATE "sm_surveilans" SET "id_layanan_pendaftaran" = '704128', "sirs_diagnosis_masuk" = 'G6P5A0 HAMIL 39 MINGGU DENGAN PEB', "sirs_diagnosis_operasi" = 'G6p5A0', "hbsag" = 'Negatif', "antihcv" = 'Tidak Diperiksa', "antihiv" = 'Negatif', "t_op" = '{"t_op_ortopedi":"","t_op_digestive":"","t_op_plastik":"","t_op_tumor":"","t_op_urologi":"","t_op_tht":"","t_op_anak":"","t_op_gilut":"","t_op_vaskuler":"","t_op_saraf":"","t_op_mata":"","t_op_thorax":"","t_op_obgyn":"1","t_op_lain":"","sm_top_lain":""}', "sirs_jam" = '1 jam', "sirs_menit" = NULL, "sirs_drain" = 'Negatif', "sirs_asascore" = '3', "sirs_jenis_operasi" = 'Bersih Tercemar', "sirs_tindakan_operasi" = 'Cito', "sirs_antibiotik" = '{"sirs_antibiotik":"1","sirs_antibiotik_profilaksis":"Ceftriaxone ","sirs_dosis_antibiotik":""}', "sirs_waktu_pemberian" = 'preoperasi', "sirs_jam_satu" = NULL, "sirs_menit_satu" = NULL, "sirs_drain_satu" = NULL, "sirs_asascore_satu" = NULL, "sirs_jenis_operasi_satu" = NULL, "sirs_tindakan_operasi_satu" = NULL, "sirs_antibiotik_satu" = '{"sirs_antibiotik_satu":"","sirs_antibiotik_profilaksis_satu":"","sirs_dosis_antibiotik_satu":""}', "sirs_waktu_pemberian_satu" = NULL, "sirs_tirah_baring" = 'tidak', "sirs_ido" = '{"sirs_ido":"tidak ada","sirs_komplikasi_ido":"","sirs_kultur_ido":""}', "sirs_iad" = '{"sirs_iad":"tidak ada","sirs_komplikasi_iad":"","sirs_kultur_iad":""}', "sirs_isk" = '{"sirs_isk":"tidak ada","sirs_komplikasi_isk":"","sirs_kultur_isk":""}', "sirs_hap" = '{"sirs_hap":"tidak ada","sirs_komplikasi_hap":"","sirs_kultur_hap":""}', "sirs_vap" = '{"sirs_vap":"tidak ada","sirs_komplikasi_vap":"","sirs_kultur_vap":""}', "sirs_plebitis" = '{"sirs_plebitis":"tidak ada","sirs_komplikasi_plebitis":"","sirs_kultur_plebitis":""}', "sirs_dekubitus" = '{"sirs_dekubitus":"tidak ada","sirs_komplikasi_dekubitus":"","sirs_kultur_dekubitus":""}', "sirs_lain" = '{"sirs_lain":"tidak ada","sirs_komplikasi_lain":"","sirs_kultur_lain":""}', "sirs_pemakaian_antibiotika" = 'tidak ada', "sirs_keluar_rs" = NULL, "sirs_sebab_keluar" = NULL, "sirs_diagnosis_akhir" = NULL, "sirs_perawat" = '613', "sirs_ipcn" = NULL, "id_users" = 'Farah Nurpadilah, Amd.Kep', "sirs_tanggal_diagnosis" = '2025-03-05', "sirs_tanggal_diagnosis_satu" = NULL, "sirs_tanggal_keluars" = NULL, "sirs_petugas" = NULL, "sirs_ipcn_link" = NULL, "sirs_tanggal_ttd_perawat" = NULL, "sirs_tanggal_ttd_ipcn" = NULL, "updated_date" = '2025-03-05 13:12:59'
WHERE "id" = '48685'
ERROR - 2025-03-05 13:13:04 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;1 jam&quot;
LINE 1: ...&quot;,&quot;t_op_lain&quot;:&quot;&quot;,&quot;sm_top_lain&quot;:&quot;&quot;}', &quot;sirs_jam&quot; = '1 jam', &quot;...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 13:13:04 --> Query error: ERROR:  invalid input syntax for type integer: "1 jam"
LINE 1: ...","t_op_lain":"","sm_top_lain":""}', "sirs_jam" = '1 jam', "...
                                                             ^ - Invalid query: UPDATE "sm_surveilans" SET "id_layanan_pendaftaran" = '704128', "sirs_diagnosis_masuk" = 'G6P5A0 HAMIL 39 MINGGU DENGAN PEB', "sirs_diagnosis_operasi" = 'G6p5A0', "hbsag" = 'Negatif', "antihcv" = 'Tidak Diperiksa', "antihiv" = 'Negatif', "t_op" = '{"t_op_ortopedi":"","t_op_digestive":"","t_op_plastik":"","t_op_tumor":"","t_op_urologi":"","t_op_tht":"","t_op_anak":"","t_op_gilut":"","t_op_vaskuler":"","t_op_saraf":"","t_op_mata":"","t_op_thorax":"","t_op_obgyn":"1","t_op_lain":"","sm_top_lain":""}', "sirs_jam" = '1 jam', "sirs_menit" = NULL, "sirs_drain" = 'Negatif', "sirs_asascore" = '3', "sirs_jenis_operasi" = 'Bersih Tercemar', "sirs_tindakan_operasi" = 'Cito', "sirs_antibiotik" = '{"sirs_antibiotik":"1","sirs_antibiotik_profilaksis":"Ceftriaxone ","sirs_dosis_antibiotik":""}', "sirs_waktu_pemberian" = 'preoperasi', "sirs_jam_satu" = NULL, "sirs_menit_satu" = NULL, "sirs_drain_satu" = NULL, "sirs_asascore_satu" = NULL, "sirs_jenis_operasi_satu" = NULL, "sirs_tindakan_operasi_satu" = NULL, "sirs_antibiotik_satu" = '{"sirs_antibiotik_satu":"","sirs_antibiotik_profilaksis_satu":"","sirs_dosis_antibiotik_satu":""}', "sirs_waktu_pemberian_satu" = NULL, "sirs_tirah_baring" = 'tidak', "sirs_ido" = '{"sirs_ido":"tidak ada","sirs_komplikasi_ido":"","sirs_kultur_ido":""}', "sirs_iad" = '{"sirs_iad":"tidak ada","sirs_komplikasi_iad":"","sirs_kultur_iad":""}', "sirs_isk" = '{"sirs_isk":"tidak ada","sirs_komplikasi_isk":"","sirs_kultur_isk":""}', "sirs_hap" = '{"sirs_hap":"tidak ada","sirs_komplikasi_hap":"","sirs_kultur_hap":""}', "sirs_vap" = '{"sirs_vap":"tidak ada","sirs_komplikasi_vap":"","sirs_kultur_vap":""}', "sirs_plebitis" = '{"sirs_plebitis":"tidak ada","sirs_komplikasi_plebitis":"","sirs_kultur_plebitis":""}', "sirs_dekubitus" = '{"sirs_dekubitus":"tidak ada","sirs_komplikasi_dekubitus":"","sirs_kultur_dekubitus":""}', "sirs_lain" = '{"sirs_lain":"tidak ada","sirs_komplikasi_lain":"","sirs_kultur_lain":""}', "sirs_pemakaian_antibiotika" = 'tidak ada', "sirs_keluar_rs" = NULL, "sirs_sebab_keluar" = NULL, "sirs_diagnosis_akhir" = NULL, "sirs_perawat" = '613', "sirs_ipcn" = NULL, "id_users" = 'Farah Nurpadilah, Amd.Kep', "sirs_tanggal_diagnosis" = '2025-03-05', "sirs_tanggal_diagnosis_satu" = NULL, "sirs_tanggal_keluars" = NULL, "sirs_petugas" = NULL, "sirs_ipcn_link" = NULL, "sirs_tanggal_ttd_perawat" = NULL, "sirs_tanggal_ttd_ipcn" = NULL, "updated_date" = '2025-03-05 13:13:04'
WHERE "id" = '48685'
ERROR - 2025-03-05 13:13:16 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;1 jam&quot;
LINE 1: ...&quot;,&quot;t_op_lain&quot;:&quot;&quot;,&quot;sm_top_lain&quot;:&quot;&quot;}', &quot;sirs_jam&quot; = '1 jam', &quot;...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 13:13:16 --> Query error: ERROR:  invalid input syntax for type integer: "1 jam"
LINE 1: ...","t_op_lain":"","sm_top_lain":""}', "sirs_jam" = '1 jam', "...
                                                             ^ - Invalid query: UPDATE "sm_surveilans" SET "id_layanan_pendaftaran" = '704128', "sirs_diagnosis_masuk" = 'G6P5A0 HAMIL 39 MINGGU DENGAN PEB', "sirs_diagnosis_operasi" = 'G6p5A0', "hbsag" = 'Negatif', "antihcv" = 'Tidak Diperiksa', "antihiv" = 'Negatif', "t_op" = '{"t_op_ortopedi":"","t_op_digestive":"","t_op_plastik":"","t_op_tumor":"","t_op_urologi":"","t_op_tht":"","t_op_anak":"","t_op_gilut":"","t_op_vaskuler":"","t_op_saraf":"","t_op_mata":"","t_op_thorax":"","t_op_obgyn":"1","t_op_lain":"","sm_top_lain":""}', "sirs_jam" = '1 jam', "sirs_menit" = NULL, "sirs_drain" = 'Negatif', "sirs_asascore" = '3', "sirs_jenis_operasi" = 'Bersih Tercemar', "sirs_tindakan_operasi" = 'Cito', "sirs_antibiotik" = '{"sirs_antibiotik":"1","sirs_antibiotik_profilaksis":"Ceftriaxone ","sirs_dosis_antibiotik":""}', "sirs_waktu_pemberian" = 'preoperasi', "sirs_jam_satu" = NULL, "sirs_menit_satu" = NULL, "sirs_drain_satu" = NULL, "sirs_asascore_satu" = NULL, "sirs_jenis_operasi_satu" = NULL, "sirs_tindakan_operasi_satu" = NULL, "sirs_antibiotik_satu" = '{"sirs_antibiotik_satu":"","sirs_antibiotik_profilaksis_satu":"","sirs_dosis_antibiotik_satu":""}', "sirs_waktu_pemberian_satu" = NULL, "sirs_tirah_baring" = 'tidak', "sirs_ido" = '{"sirs_ido":"tidak ada","sirs_komplikasi_ido":"","sirs_kultur_ido":""}', "sirs_iad" = '{"sirs_iad":"tidak ada","sirs_komplikasi_iad":"","sirs_kultur_iad":""}', "sirs_isk" = '{"sirs_isk":"tidak ada","sirs_komplikasi_isk":"","sirs_kultur_isk":""}', "sirs_hap" = '{"sirs_hap":"tidak ada","sirs_komplikasi_hap":"","sirs_kultur_hap":""}', "sirs_vap" = '{"sirs_vap":"tidak ada","sirs_komplikasi_vap":"","sirs_kultur_vap":""}', "sirs_plebitis" = '{"sirs_plebitis":"tidak ada","sirs_komplikasi_plebitis":"","sirs_kultur_plebitis":""}', "sirs_dekubitus" = '{"sirs_dekubitus":"tidak ada","sirs_komplikasi_dekubitus":"","sirs_kultur_dekubitus":""}', "sirs_lain" = '{"sirs_lain":"tidak ada","sirs_komplikasi_lain":"","sirs_kultur_lain":""}', "sirs_pemakaian_antibiotika" = 'tidak ada', "sirs_keluar_rs" = NULL, "sirs_sebab_keluar" = NULL, "sirs_diagnosis_akhir" = NULL, "sirs_perawat" = '613', "sirs_ipcn" = NULL, "id_users" = 'Farah Nurpadilah, Amd.Kep', "sirs_tanggal_diagnosis" = '2025-03-05', "sirs_tanggal_diagnosis_satu" = NULL, "sirs_tanggal_keluars" = NULL, "sirs_petugas" = NULL, "sirs_ipcn_link" = NULL, "sirs_tanggal_ttd_perawat" = NULL, "sirs_tanggal_ttd_ipcn" = NULL, "updated_date" = '2025-03-05 13:13:16'
WHERE "id" = '48685'
ERROR - 2025-03-05 13:13:20 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;1 jam&quot;
LINE 1: ...&quot;,&quot;t_op_lain&quot;:&quot;&quot;,&quot;sm_top_lain&quot;:&quot;&quot;}', &quot;sirs_jam&quot; = '1 jam', &quot;...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 13:13:20 --> Query error: ERROR:  invalid input syntax for type integer: "1 jam"
LINE 1: ...","t_op_lain":"","sm_top_lain":""}', "sirs_jam" = '1 jam', "...
                                                             ^ - Invalid query: UPDATE "sm_surveilans" SET "id_layanan_pendaftaran" = '704128', "sirs_diagnosis_masuk" = 'G6P5A0 HAMIL 39 MINGGU DENGAN PEB', "sirs_diagnosis_operasi" = 'G6p5A0', "hbsag" = 'Negatif', "antihcv" = 'Tidak Diperiksa', "antihiv" = 'Negatif', "t_op" = '{"t_op_ortopedi":"","t_op_digestive":"","t_op_plastik":"","t_op_tumor":"","t_op_urologi":"","t_op_tht":"","t_op_anak":"","t_op_gilut":"","t_op_vaskuler":"","t_op_saraf":"","t_op_mata":"","t_op_thorax":"","t_op_obgyn":"1","t_op_lain":"","sm_top_lain":""}', "sirs_jam" = '1 jam', "sirs_menit" = NULL, "sirs_drain" = 'Negatif', "sirs_asascore" = '3', "sirs_jenis_operasi" = 'Bersih Tercemar', "sirs_tindakan_operasi" = 'Cito', "sirs_antibiotik" = '{"sirs_antibiotik":"1","sirs_antibiotik_profilaksis":"Ceftriaxone ","sirs_dosis_antibiotik":""}', "sirs_waktu_pemberian" = 'preoperasi', "sirs_jam_satu" = NULL, "sirs_menit_satu" = NULL, "sirs_drain_satu" = NULL, "sirs_asascore_satu" = NULL, "sirs_jenis_operasi_satu" = NULL, "sirs_tindakan_operasi_satu" = NULL, "sirs_antibiotik_satu" = '{"sirs_antibiotik_satu":"","sirs_antibiotik_profilaksis_satu":"","sirs_dosis_antibiotik_satu":""}', "sirs_waktu_pemberian_satu" = NULL, "sirs_tirah_baring" = 'tidak', "sirs_ido" = '{"sirs_ido":"tidak ada","sirs_komplikasi_ido":"","sirs_kultur_ido":""}', "sirs_iad" = '{"sirs_iad":"tidak ada","sirs_komplikasi_iad":"","sirs_kultur_iad":""}', "sirs_isk" = '{"sirs_isk":"tidak ada","sirs_komplikasi_isk":"","sirs_kultur_isk":""}', "sirs_hap" = '{"sirs_hap":"tidak ada","sirs_komplikasi_hap":"","sirs_kultur_hap":""}', "sirs_vap" = '{"sirs_vap":"tidak ada","sirs_komplikasi_vap":"","sirs_kultur_vap":""}', "sirs_plebitis" = '{"sirs_plebitis":"tidak ada","sirs_komplikasi_plebitis":"","sirs_kultur_plebitis":""}', "sirs_dekubitus" = '{"sirs_dekubitus":"tidak ada","sirs_komplikasi_dekubitus":"","sirs_kultur_dekubitus":""}', "sirs_lain" = '{"sirs_lain":"tidak ada","sirs_komplikasi_lain":"","sirs_kultur_lain":""}', "sirs_pemakaian_antibiotika" = 'tidak ada', "sirs_keluar_rs" = NULL, "sirs_sebab_keluar" = NULL, "sirs_diagnosis_akhir" = NULL, "sirs_perawat" = '613', "sirs_ipcn" = NULL, "id_users" = 'Farah Nurpadilah, Amd.Kep', "sirs_tanggal_diagnosis" = '2025-03-05', "sirs_tanggal_diagnosis_satu" = NULL, "sirs_tanggal_keluars" = NULL, "sirs_petugas" = NULL, "sirs_ipcn_link" = NULL, "sirs_tanggal_ttd_perawat" = NULL, "sirs_tanggal_ttd_ipcn" = NULL, "updated_date" = '2025-03-05 13:13:20'
WHERE "id" = '48685'
ERROR - 2025-03-05 13:13:26 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;1 jam&quot;
LINE 1: ...&quot;,&quot;t_op_lain&quot;:&quot;&quot;,&quot;sm_top_lain&quot;:&quot;&quot;}', &quot;sirs_jam&quot; = '1 jam', &quot;...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 13:13:26 --> Query error: ERROR:  invalid input syntax for type integer: "1 jam"
LINE 1: ...","t_op_lain":"","sm_top_lain":""}', "sirs_jam" = '1 jam', "...
                                                             ^ - Invalid query: UPDATE "sm_surveilans" SET "id_layanan_pendaftaran" = '704128', "sirs_diagnosis_masuk" = 'G6P5A0 HAMIL 39 MINGGU DENGAN PEB', "sirs_diagnosis_operasi" = 'G6p5A0', "hbsag" = 'Negatif', "antihcv" = 'Tidak Diperiksa', "antihiv" = 'Negatif', "t_op" = '{"t_op_ortopedi":"","t_op_digestive":"","t_op_plastik":"","t_op_tumor":"","t_op_urologi":"","t_op_tht":"","t_op_anak":"","t_op_gilut":"","t_op_vaskuler":"","t_op_saraf":"","t_op_mata":"","t_op_thorax":"","t_op_obgyn":"1","t_op_lain":"","sm_top_lain":""}', "sirs_jam" = '1 jam', "sirs_menit" = NULL, "sirs_drain" = 'Negatif', "sirs_asascore" = '3', "sirs_jenis_operasi" = 'Bersih Tercemar', "sirs_tindakan_operasi" = 'Cito', "sirs_antibiotik" = '{"sirs_antibiotik":"1","sirs_antibiotik_profilaksis":"Ceftriaxone ","sirs_dosis_antibiotik":""}', "sirs_waktu_pemberian" = 'preoperasi', "sirs_jam_satu" = NULL, "sirs_menit_satu" = NULL, "sirs_drain_satu" = NULL, "sirs_asascore_satu" = NULL, "sirs_jenis_operasi_satu" = NULL, "sirs_tindakan_operasi_satu" = NULL, "sirs_antibiotik_satu" = '{"sirs_antibiotik_satu":"","sirs_antibiotik_profilaksis_satu":"","sirs_dosis_antibiotik_satu":""}', "sirs_waktu_pemberian_satu" = NULL, "sirs_tirah_baring" = 'tidak', "sirs_ido" = '{"sirs_ido":"tidak ada","sirs_komplikasi_ido":"","sirs_kultur_ido":""}', "sirs_iad" = '{"sirs_iad":"tidak ada","sirs_komplikasi_iad":"","sirs_kultur_iad":""}', "sirs_isk" = '{"sirs_isk":"tidak ada","sirs_komplikasi_isk":"","sirs_kultur_isk":""}', "sirs_hap" = '{"sirs_hap":"tidak ada","sirs_komplikasi_hap":"","sirs_kultur_hap":""}', "sirs_vap" = '{"sirs_vap":"tidak ada","sirs_komplikasi_vap":"","sirs_kultur_vap":""}', "sirs_plebitis" = '{"sirs_plebitis":"tidak ada","sirs_komplikasi_plebitis":"","sirs_kultur_plebitis":""}', "sirs_dekubitus" = '{"sirs_dekubitus":"tidak ada","sirs_komplikasi_dekubitus":"","sirs_kultur_dekubitus":""}', "sirs_lain" = '{"sirs_lain":"tidak ada","sirs_komplikasi_lain":"","sirs_kultur_lain":""}', "sirs_pemakaian_antibiotika" = 'tidak ada', "sirs_keluar_rs" = NULL, "sirs_sebab_keluar" = NULL, "sirs_diagnosis_akhir" = NULL, "sirs_perawat" = '613', "sirs_ipcn" = NULL, "id_users" = 'Farah Nurpadilah, Amd.Kep', "sirs_tanggal_diagnosis" = '2025-03-05', "sirs_tanggal_diagnosis_satu" = NULL, "sirs_tanggal_keluars" = NULL, "sirs_petugas" = NULL, "sirs_ipcn_link" = NULL, "sirs_tanggal_ttd_perawat" = NULL, "sirs_tanggal_ttd_ipcn" = NULL, "updated_date" = '2025-03-05 13:13:26'
WHERE "id" = '48685'
ERROR - 2025-03-05 13:13:26 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 13:13:26 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 13:14:17 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-03-05 13:14:17 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-03-05 13:14:22 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-03-05 13:14:22 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-03-05 13:15:18 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type double precision: &quot;&quot;
LINE 1: ...&quot;) VALUES ('2025-03-05 13:15:18', 1204691, '105', '', '81315...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 13:15:18 --> Query error: ERROR:  invalid input syntax for type double precision: ""
LINE 1: ...") VALUES ('2025-03-05 13:15:18', 1204691, '105', '', '81315...
                                                             ^ - Invalid query: INSERT INTO "sm_detail_penjualan" ("waktu", "id_penjualan", "id_kemasan", "qty", "hna", "harga_jual", "id_asuransi", "reimburse", "id_unit", "id_users") VALUES ('2025-03-05 13:15:18', 1204691, '105', '', '81315.00', '166633.20', '1', 166633.2, '259', '1928')
ERROR - 2025-03-05 13:18:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;NaN&quot;
LINE 1: ... '65000', '0', '0', '0', '0', '0', '0', '0', '0', 'NaN', '0'...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 13:18:03 --> Query error: ERROR:  invalid input syntax for type bigint: "NaN"
LINE 1: ... '65000', '0', '0', '0', '0', '0', '0', '0', '0', 'NaN', '0'...
                                                             ^ - Invalid query: INSERT INTO "sm_eklaim" ("id_pendaftaran", "id_layanan_pendaftaran", "nomor_kartu", "nomor_sep", "nomor_rm", "nama_pasien", "tgl_lahir", "gender", "tgl_masuk", "tgl_pulang", "cara_masuk", "jenis_rawat", "kelas_rawat", "adl_sub_acute", "adl_chronic", "sistole", "diastole", "icu_indikator", "icu_los", "ventilator_hour", "upgrade_class_ind", "upgrade_class_class", "upgrade_class_los", "add_payment_pct", "birth_weight", "discharge_status", "diagnosa", "procedure", "prosedur_non_bedah", "prosedur_bedah", "konsultasi", "tenaga_ahli", "keperawatan", "penunjang", "radiologi", "laboratorium", "pelayanan_darah", "rehabilitasi", "kamar", "rawat_intensif", "obat", "obat_kronis", "obat_kemoterapi", "alkes", "bmhp", "sewa_alat", "nama_dokter", "kode_tarif", "payor_id", "payor_cd", "coder_nik", "created_at", "status_bridging", "method_status", "diagnosa_inagrouper", "procedure_inagrouper") VALUES ('649830', '704157', '0003144300423', '0223R0380325V001880', '00023822', 'E. SAMSU', '1950-12-30', 1, '2025-03-05 06:59:02', '2025-03-05 08:02:28', 'gp', 2, 3, '', '', '', '', '0', '', '0', '0', '0', '0', '0', '0', 1, 'Z09.3#F00*', '89.05#94.38', '0', '0', '100000', '0', '65000', '0', '0', '0', '0', '0', '0', '0', '0', 'NaN', '0', '0', '0', '0', 'dr. JANS JULIANA ROULI SITORUS, Sp.KJ', 'CP', '00003', 'JKN', '3671054210950002', '2025-03-05 13:18:03', 'normal', 'set_claim_data', 'Z09.3#F00*', '89.05#94.38')
ERROR - 2025-03-05 13:19:50 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;NaN&quot;
LINE 1: ... '65000', '0', '0', '0', '0', '0', '0', '0', '0', 'NaN', '0'...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 13:19:50 --> Query error: ERROR:  invalid input syntax for type bigint: "NaN"
LINE 1: ... '65000', '0', '0', '0', '0', '0', '0', '0', '0', 'NaN', '0'...
                                                             ^ - Invalid query: INSERT INTO "sm_eklaim" ("id_pendaftaran", "id_layanan_pendaftaran", "nomor_kartu", "nomor_sep", "nomor_rm", "nama_pasien", "tgl_lahir", "gender", "tgl_masuk", "tgl_pulang", "cara_masuk", "jenis_rawat", "kelas_rawat", "adl_sub_acute", "adl_chronic", "sistole", "diastole", "icu_indikator", "icu_los", "ventilator_hour", "upgrade_class_ind", "upgrade_class_class", "upgrade_class_los", "add_payment_pct", "birth_weight", "discharge_status", "diagnosa", "procedure", "prosedur_non_bedah", "prosedur_bedah", "konsultasi", "tenaga_ahli", "keperawatan", "penunjang", "radiologi", "laboratorium", "pelayanan_darah", "rehabilitasi", "kamar", "rawat_intensif", "obat", "obat_kronis", "obat_kemoterapi", "alkes", "bmhp", "sewa_alat", "nama_dokter", "kode_tarif", "payor_id", "payor_cd", "coder_nik", "created_at", "status_bridging", "method_status", "diagnosa_inagrouper", "procedure_inagrouper") VALUES ('649830', '704157', '0003144300423', '0223R0380325V001880', '00023822', 'E. SAMSU', '1950-12-30', 1, '2025-03-05 06:59:02', '2025-03-05 08:02:28', 'gp', 2, 3, '', '', '', '', '0', '', '0', '0', '0', '0', '0', '0', 1, 'Z09.3#F00*', '89.05#94.38', '0', '0', '100000', '0', '65000', '0', '0', '0', '0', '0', '0', '0', '0', 'NaN', '0', '0', '0', '0', 'dr. JANS JULIANA ROULI SITORUS, Sp.KJ', 'CP', '00003', 'JKN', '3671054210950002', '2025-03-05 13:19:50', 'normal', 'set_claim_data', 'Z09.3#F00*', '89.05#94.38')
ERROR - 2025-03-05 13:20:38 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;NaN&quot;
LINE 1: ... '65000', '0', '0', '0', '0', '0', '0', '0', '0', 'NaN', '0'...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 13:20:38 --> Query error: ERROR:  invalid input syntax for type bigint: "NaN"
LINE 1: ... '65000', '0', '0', '0', '0', '0', '0', '0', '0', 'NaN', '0'...
                                                             ^ - Invalid query: INSERT INTO "sm_eklaim" ("id_pendaftaran", "id_layanan_pendaftaran", "nomor_kartu", "nomor_sep", "nomor_rm", "nama_pasien", "tgl_lahir", "gender", "tgl_masuk", "tgl_pulang", "cara_masuk", "jenis_rawat", "kelas_rawat", "adl_sub_acute", "adl_chronic", "sistole", "diastole", "icu_indikator", "icu_los", "ventilator_hour", "upgrade_class_ind", "upgrade_class_class", "upgrade_class_los", "add_payment_pct", "birth_weight", "discharge_status", "diagnosa", "procedure", "prosedur_non_bedah", "prosedur_bedah", "konsultasi", "tenaga_ahli", "keperawatan", "penunjang", "radiologi", "laboratorium", "pelayanan_darah", "rehabilitasi", "kamar", "rawat_intensif", "obat", "obat_kronis", "obat_kemoterapi", "alkes", "bmhp", "sewa_alat", "nama_dokter", "kode_tarif", "payor_id", "payor_cd", "coder_nik", "created_at", "status_bridging", "method_status", "diagnosa_inagrouper", "procedure_inagrouper") VALUES ('649830', '704157', '0003144300423', '0223R0380325V001880', '00023822', 'E. SAMSU', '1950-12-30', 1, '2025-03-05 06:59:02', '2025-03-05 08:02:28', 'gp', 2, 3, '', '', '', '', '0', '', '0', '0', '0', '0', '0', '0', 1, 'Z09.3#F00*', '89.05#94.38', '0', '0', '100000', '0', '65000', '0', '0', '0', '0', '0', '0', '0', '0', 'NaN', '0', '0', '0', '0', 'dr. JANS JULIANA ROULI SITORUS, Sp.KJ', 'CP', '00003', 'JKN', '3671054210950002', '2025-03-05 13:20:37', 'normal', 'set_claim_data', 'Z09.3#F00*', '89.05#94.38')
ERROR - 2025-03-05 13:21:18 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 13:21:18 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 13:21:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 13:21:52 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 13:22:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 13:22:15 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 13:22:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 13:22:36 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 13:22:45 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 13:22:45 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 13:23:23 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 13:23:23 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 13:23:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 13:23:52 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 13:23:56 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 13:23:56 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 13:24:29 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 13:24:29 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 13:24:35 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 13:24:35 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 13:25:00 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 13:25:00 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 13:25:02 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 13:25:02 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 13:25:07 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 13:25:07 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 13:25:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 13:25:40 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 13:25:53 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 13:25:53 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 13:25:58 --> Severity: Warning  --> Creating default object from empty value /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/eklaim_bpjs/models/Eklaim_bpjs_detail_model.php 76
ERROR - 2025-03-05 13:26:28 --> Severity: Warning  --> Creating default object from empty value /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/eklaim_bpjs/models/Eklaim_bpjs_detail_model.php 76
ERROR - 2025-03-05 13:26:45 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-03-05 13:26:45 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-03-05 13:27:34 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;id_layanan_pendaftaran&quot;
LINE 8:             where g.id_pendaftaran = 'id_layanan_pendaftaran...
                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 13:27:34 --> Query error: ERROR:  invalid input syntax for type integer: "id_layanan_pendaftaran"
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
        
ERROR - 2025-03-05 13:27:34 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;id_layanan_pendaftaran&quot;
LINE 7:             where d.id_pendaftaran = 'id_layanan_pendaftaran...
                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 13:27:34 --> Query error: ERROR:  invalid input syntax for type integer: "id_layanan_pendaftaran"
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
        
ERROR - 2025-03-05 13:27:34 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;id_layanan_pendaftaran&quot;
LINE 8:             where k.id_pendaftaran = 'id_layanan_pendaftaran...
                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 13:27:34 --> Query error: ERROR:  invalid input syntax for type integer: "id_layanan_pendaftaran"
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
        
ERROR - 2025-03-05 13:27:36 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 13:28:29 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 13:28:29 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 13:28:41 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-03-05 13:29:14 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-03-05 13:29:16 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-03-05 13:29:45 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-03-05 13:30:01 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 13:30:01 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 13:30:11 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-03-05 13:30:16 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 13:30:16 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 13:30:25 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 13:30:25 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 13:30:26 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 13:30:26 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 13:30:38 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 13:30:38 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 13:30:38 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 13:30:38 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 13:30:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 13:30:40 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 13:30:47 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 13:30:47 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 13:30:49 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 13:30:49 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 13:30:58 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 13:30:58 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 13:31:01 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 13:31:01 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 13:31:14 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 13:31:14 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 13:31:14 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 13:31:14 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 13:31:21 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 13:31:21 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 13:31:23 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 13:31:35 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;NaN&quot;
LINE 1: ... '65000', '0', '0', '0', '0', '0', '0', '0', '0', 'NaN', '0'...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 13:31:35 --> Query error: ERROR:  invalid input syntax for type bigint: "NaN"
LINE 1: ... '65000', '0', '0', '0', '0', '0', '0', '0', '0', 'NaN', '0'...
                                                             ^ - Invalid query: INSERT INTO "sm_eklaim" ("id_pendaftaran", "id_layanan_pendaftaran", "nomor_kartu", "nomor_sep", "nomor_rm", "nama_pasien", "tgl_lahir", "gender", "tgl_masuk", "tgl_pulang", "cara_masuk", "jenis_rawat", "kelas_rawat", "adl_sub_acute", "adl_chronic", "sistole", "diastole", "icu_indikator", "icu_los", "ventilator_hour", "upgrade_class_ind", "upgrade_class_class", "upgrade_class_los", "add_payment_pct", "birth_weight", "discharge_status", "diagnosa", "procedure", "prosedur_non_bedah", "prosedur_bedah", "konsultasi", "tenaga_ahli", "keperawatan", "penunjang", "radiologi", "laboratorium", "pelayanan_darah", "rehabilitasi", "kamar", "rawat_intensif", "obat", "obat_kronis", "obat_kemoterapi", "alkes", "bmhp", "sewa_alat", "nama_dokter", "kode_tarif", "payor_id", "payor_cd", "coder_nik", "created_at", "status_bridging", "method_status", "diagnosa_inagrouper", "procedure_inagrouper") VALUES ('649830', '704157', '0003144300423', '0223R0380325V001880', '00023822', 'E. SAMSU', '1950-12-30', 1, '2025-03-05 06:59:02', '2025-03-05 08:02:28', 'gp', 2, 3, '', '', '', '', '0', '', '0', '0', '0', '0', '0', '0', 1, 'Z09.3#F00*', '89.05#94.38', '0', '0', '100000', '0', '65000', '0', '0', '0', '0', '0', '0', '0', '0', 'NaN', '0', '0', '0', '0', 'dr. JANS JULIANA ROULI SITORUS, Sp.KJ', 'CP', '00003', 'JKN', '3671054210950002', '2025-03-05 13:31:35', 'normal', 'set_claim_data', 'Z09.3#F00*', '89.05#94.38')
ERROR - 2025-03-05 13:32:04 --> Severity: Warning  --> Creating default object from empty value /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/eklaim_bpjs/models/Eklaim_bpjs_detail_model.php 76
ERROR - 2025-03-05 13:33:26 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 13:33:26 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 13:33:43 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 13:33:43 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 13:33:53 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 13:33:53 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 13:34:00 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 13:34:01 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 13:34:01 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 13:34:05 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 13:34:05 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 13:34:14 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 13:34:14 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 13:34:22 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 13:34:22 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 13:36:21 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;NaN&quot;
LINE 1: ...00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'NaN', '41...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 13:36:21 --> Query error: ERROR:  invalid input syntax for type bigint: "NaN"
LINE 1: ...00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'NaN', '41...
                                                             ^ - Invalid query: INSERT INTO "sm_eklaim" ("id_pendaftaran", "id_layanan_pendaftaran", "nomor_kartu", "nomor_sep", "nomor_rm", "nama_pasien", "tgl_lahir", "gender", "tgl_masuk", "tgl_pulang", "cara_masuk", "jenis_rawat", "kelas_rawat", "adl_sub_acute", "adl_chronic", "sistole", "diastole", "icu_indikator", "icu_los", "ventilator_hour", "upgrade_class_ind", "upgrade_class_class", "upgrade_class_los", "add_payment_pct", "birth_weight", "discharge_status", "diagnosa", "procedure", "prosedur_non_bedah", "prosedur_bedah", "konsultasi", "tenaga_ahli", "keperawatan", "penunjang", "radiologi", "laboratorium", "pelayanan_darah", "rehabilitasi", "kamar", "rawat_intensif", "obat", "obat_kronis", "obat_kemoterapi", "alkes", "bmhp", "sewa_alat", "nama_dokter", "kode_tarif", "payor_id", "payor_cd", "coder_nik", "created_at", "status_bridging", "method_status", "diagnosa_inagrouper", "procedure_inagrouper") VALUES ('649957', '704280', '0001293271942', '0223R0380325V001992', '00280510', 'ENDY RUSDI', '1946-07-06', 1, '2025-03-05 07:24:07', '2025-03-05 10:34:10', 'gp', 2, 3, '', '', '', '', '0', '', '0', '0', '0', '0', '0', '0', 1, 'Z09.8#M51.1+', '89.05', '0', '0', '100000', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'NaN', '41040', '0', '0', '0', '0', 'dr. Vinnie Juliana Yonatan, Sp.N', 'CP', '00003', 'JKN', '3671054210950002', '2025-03-05 13:36:20', 'normal', 'set_claim_data', 'Z09.8#M51.1+', '89.05')
ERROR - 2025-03-05 13:36:25 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;NaN&quot;
LINE 1: ...00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'NaN', '41...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 13:36:25 --> Query error: ERROR:  invalid input syntax for type bigint: "NaN"
LINE 1: ...00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'NaN', '41...
                                                             ^ - Invalid query: INSERT INTO "sm_eklaim" ("id_pendaftaran", "id_layanan_pendaftaran", "nomor_kartu", "nomor_sep", "nomor_rm", "nama_pasien", "tgl_lahir", "gender", "tgl_masuk", "tgl_pulang", "cara_masuk", "jenis_rawat", "kelas_rawat", "adl_sub_acute", "adl_chronic", "sistole", "diastole", "icu_indikator", "icu_los", "ventilator_hour", "upgrade_class_ind", "upgrade_class_class", "upgrade_class_los", "add_payment_pct", "birth_weight", "discharge_status", "diagnosa", "procedure", "prosedur_non_bedah", "prosedur_bedah", "konsultasi", "tenaga_ahli", "keperawatan", "penunjang", "radiologi", "laboratorium", "pelayanan_darah", "rehabilitasi", "kamar", "rawat_intensif", "obat", "obat_kronis", "obat_kemoterapi", "alkes", "bmhp", "sewa_alat", "nama_dokter", "kode_tarif", "payor_id", "payor_cd", "coder_nik", "created_at", "status_bridging", "method_status", "diagnosa_inagrouper", "procedure_inagrouper") VALUES ('649957', '704280', '0001293271942', '0223R0380325V001992', '00280510', 'ENDY RUSDI', '1946-07-06', 1, '2025-03-05 07:24:07', '2025-03-05 10:34:10', 'gp', 2, 3, '', '', '', '', '0', '', '0', '0', '0', '0', '0', '0', 1, 'Z09.8#M51.1+', '89.05', '0', '0', '100000', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'NaN', '41040', '0', '0', '0', '0', 'dr. Vinnie Juliana Yonatan, Sp.N', 'CP', '00003', 'JKN', '3671054210950002', '2025-03-05 13:36:25', 'normal', 'set_claim_data', 'Z09.8#M51.1+', '89.05')
ERROR - 2025-03-05 13:36:39 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;NaN&quot;
LINE 1: ...00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'NaN', '41...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 13:36:39 --> Query error: ERROR:  invalid input syntax for type bigint: "NaN"
LINE 1: ...00', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'NaN', '41...
                                                             ^ - Invalid query: INSERT INTO "sm_eklaim" ("id_pendaftaran", "id_layanan_pendaftaran", "nomor_kartu", "nomor_sep", "nomor_rm", "nama_pasien", "tgl_lahir", "gender", "tgl_masuk", "tgl_pulang", "cara_masuk", "jenis_rawat", "kelas_rawat", "adl_sub_acute", "adl_chronic", "sistole", "diastole", "icu_indikator", "icu_los", "ventilator_hour", "upgrade_class_ind", "upgrade_class_class", "upgrade_class_los", "add_payment_pct", "birth_weight", "discharge_status", "diagnosa", "procedure", "prosedur_non_bedah", "prosedur_bedah", "konsultasi", "tenaga_ahli", "keperawatan", "penunjang", "radiologi", "laboratorium", "pelayanan_darah", "rehabilitasi", "kamar", "rawat_intensif", "obat", "obat_kronis", "obat_kemoterapi", "alkes", "bmhp", "sewa_alat", "nama_dokter", "kode_tarif", "payor_id", "payor_cd", "coder_nik", "created_at", "status_bridging", "method_status", "diagnosa_inagrouper", "procedure_inagrouper") VALUES ('649957', '704280', '0001293271942', '0223R0380325V001992', '00280510', 'ENDY RUSDI', '1946-07-06', 1, '2025-03-05 07:24:07', '2025-03-05 10:34:10', 'gp', 2, 3, '', '', '', '', '0', '', '0', '0', '0', '0', '0', '0', 1, 'Z09.8#M51.1+', '89.05', '0', '0', '100000', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'NaN', '41040', '0', '0', '0', '0', 'dr. Vinnie Juliana Yonatan, Sp.N', 'CP', '00003', 'JKN', '3671054210950002', '2025-03-05 13:36:39', 'normal', 'set_claim_data', 'Z09.8#M51.1+', '89.05')
ERROR - 2025-03-05 13:37:42 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 13:37:42 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 13:37:53 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 13:37:53 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 13:38:02 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 13:38:06 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 13:38:06 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 13:39:32 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 12167
ERROR - 2025-03-05 13:39:51 --> Severity: Warning  --> Creating default object from empty value /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/eklaim_bpjs/models/Eklaim_bpjs_detail_model.php 76
ERROR - 2025-03-05 13:39:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 13:39:52 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 13:40:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 13:40:15 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 13:40:21 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 13:40:21 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 13:40:23 --> Severity: Warning  --> Creating default object from empty value /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/eklaim_bpjs/models/Eklaim_bpjs_detail_model.php 76
ERROR - 2025-03-05 13:40:29 --> Severity: Warning  --> Creating default object from empty value /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/eklaim_bpjs/models/Eklaim_bpjs_detail_model.php 76
ERROR - 2025-03-05 13:40:35 --> Severity: Warning  --> Creating default object from empty value /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/eklaim_bpjs/models/Eklaim_bpjs_detail_model.php 76
ERROR - 2025-03-05 13:40:40 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 13:42:30 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 13:42:30 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 13:42:38 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 13:42:38 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 13:42:41 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 13:42:49 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 13:42:49 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 13:43:23 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 13:43:23 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 13:43:41 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 13:43:41 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 13:43:42 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 13:43:42 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 13:43:47 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_sep_idx&quot;
DETAIL:  Key (no_sep)=(0223R0380325V002061) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 13:43:47 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_sep_idx"
DETAIL:  Key (no_sep)=(0223R0380325V002061) already exists. - Invalid query: UPDATE "sm_pendaftaran" SET "no_sep" = '0223R0380325V002061', "no_polish" = '0001634331712'
WHERE "id" = '650040'
ERROR - 2025-03-05 13:43:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 13:43:57 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 13:44:01 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  duplicate key value violates unique constraint &quot;sm_pendaftaran_no_sep_idx&quot;
DETAIL:  Key (no_sep)=(0223R0380325V002062) already exists. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 13:44:01 --> Query error: ERROR:  duplicate key value violates unique constraint "sm_pendaftaran_no_sep_idx"
DETAIL:  Key (no_sep)=(0223R0380325V002062) already exists. - Invalid query: UPDATE "sm_pendaftaran" SET "no_sep" = '0223R0380325V002062', "no_polish" = '0002102065233'
WHERE "id" = '650042'
ERROR - 2025-03-05 13:44:01 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 13:44:16 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 13:44:16 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 13:45:59 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 13:45:59 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 13:46:01 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 13:46:01 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 13:46:02 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 13:46:02 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 13:46:06 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 13:46:06 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 13:46:27 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 13:46:27 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 13:46:28 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 13:46:28 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 13:46:55 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 13:46:55 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 13:47:02 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 13:47:02 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 13:47:05 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 13:47:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 13:47:09 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 13:47:30 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 13:47:30 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 13:48:20 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 13:48:20 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 13:48:20 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 13:48:20 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 13:48:29 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 13:48:29 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 13:48:32 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 13:48:32 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 13:48:38 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 13:48:38 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 13:48:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 13:48:52 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 13:49:08 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 13:49:08 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 13:49:08 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 13:49:08 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 13:49:19 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-03-05 13:49:20 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 13:49:20 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 13:49:53 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 13:49:53 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 13:49:58 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 13:49:58 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 13:50:06 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 13:50:06 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 13:50:16 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 13:50:16 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 13:50:31 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 13:50:31 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 13:50:50 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 13:50:50 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 13:50:55 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 13:50:55 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 13:51:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 13:51:12 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 13:51:22 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 13:51:22 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 13:51:30 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 13:51:33 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 13:51:33 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 13:51:35 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 13:51:35 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 13:51:37 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 13:51:37 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 13:51:42 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 13:51:42 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 13:51:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 13:51:52 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 13:51:59 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 13:51:59 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 13:52:12 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 13:53:13 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 13:53:13 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 13:53:24 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 13:53:24 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 13:53:38 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 13:53:38 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 13:53:41 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 13:53:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 13:53:46 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 13:54:04 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 13:54:04 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 13:54:25 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 13:54:25 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 13:54:42 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 13:54:42 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 13:54:42 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 13:54:42 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 13:55:16 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 13:55:16 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 13:55:49 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 13:55:56 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 13:55:56 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 13:56:04 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 13:56:04 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 13:56:13 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 13:56:13 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 13:56:21 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 13:58:00 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 13:58:00 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 13:58:48 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 13:58:48 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 13:58:54 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 13:59:03 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-03-05 13:59:03 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-03-05 13:59:10 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-03-05 13:59:10 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-03-05 13:59:21 --> Severity: Notice  --> Undefined variable: dokter_anesthesi_before /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 130
ERROR - 2025-03-05 13:59:21 --> Severity: Notice  --> Undefined variable: pendamping /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/order_operasi/controllers/api/Order_operasi.php 183
ERROR - 2025-03-05 14:01:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 14:01:15 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 14:01:36 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 8272
ERROR - 2025-03-05 14:02:27 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 14:02:27 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 14:03:01 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/views/js.php 1507
ERROR - 2025-03-05 14:03:04 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 14:03:04 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 14:04:37 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 14:04:37 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 14:05:33 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 14:05:33 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 14:05:38 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 14:05:38 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 14:06:33 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 14:06:33 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 14:06:47 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 14:06:47 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 14:06:50 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 14:06:55 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 14:06:55 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 14:07:04 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 14:07:04 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 14:08:38 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 14:08:38 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 14:09:04 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 14:09:04 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 14:09:20 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 14:09:20 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 14:09:23 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 14:09:23 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 14:09:33 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 14:09:33 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 14:09:50 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 14:09:50 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 14:10:04 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 14:10:04 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 14:10:18 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 14:10:18 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 14:10:30 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 14:10:30 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 14:10:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 14:10:46 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 14:10:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 14:10:57 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 14:11:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 14:11:12 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 14:11:29 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 14:11:29 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 14:11:43 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 14:11:43 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 14:11:43 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 14:11:43 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 14:11:45 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 14:11:45 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 14:11:48 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 14:11:48 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 14:11:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 14:11:51 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 14:13:08 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 14:13:08 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 14:13:25 --> Severity: Notice  --> Trying to get property 'nama' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/sisa_stok/views/export/sisa_stok_unit.php 44
ERROR - 2025-03-05 14:13:41 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 14:13:41 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 14:13:56 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 14:13:56 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 14:14:14 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 14:14:14 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 14:15:58 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 14:15:58 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 14:16:00 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 14:16:00 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 14:16:00 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 14:16:00 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 14:16:01 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-03-05 14:16:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 14:16:15 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 14:16:24 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 14:16:24 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 14:16:37 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 14:16:37 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 14:16:44 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 14:16:44 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 14:17:21 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-03-05 14:17:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 14:17:36 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 14:17:50 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 14:17:50 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 14:17:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 14:17:51 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 14:17:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 14:17:57 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 14:17:58 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 14:17:58 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 14:18:00 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 812
ERROR - 2025-03-05 14:18:00 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 812
ERROR - 2025-03-05 14:18:00 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 817
ERROR - 2025-03-05 14:18:00 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 817
ERROR - 2025-03-05 14:18:00 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 818
ERROR - 2025-03-05 14:18:00 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 818
ERROR - 2025-03-05 14:18:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 14:18:10 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 14:18:11 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-03-05 14:18:57 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 812
ERROR - 2025-03-05 14:18:57 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 812
ERROR - 2025-03-05 14:18:57 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 817
ERROR - 2025-03-05 14:18:57 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 817
ERROR - 2025-03-05 14:18:57 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 818
ERROR - 2025-03-05 14:18:57 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/booking_poliklinik/controllers/api/Booking_poliklinik.php 818
ERROR - 2025-03-05 14:20:01 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 14:20:17 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 14:20:17 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 14:20:24 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 14:20:24 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 14:20:32 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 14:20:32 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 14:20:56 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  update or delete on table &quot;sm_resep_r_detail&quot; violates foreign key constraint &quot;sm_rekonsiliasi_obat_id_detail_resep_fkey&quot; on table &quot;sm_rekonsiliasi_obat&quot;
DETAIL:  Key (id)=(6020004) is still referenced from table &quot;sm_rekonsiliasi_obat&quot;. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 14:20:56 --> Query error: ERROR:  update or delete on table "sm_resep_r_detail" violates foreign key constraint "sm_rekonsiliasi_obat_id_detail_resep_fkey" on table "sm_rekonsiliasi_obat"
DETAIL:  Key (id)=(6020004) is still referenced from table "sm_rekonsiliasi_obat". - Invalid query: DELETE FROM "sm_resep_r"
WHERE "id_resep" = '801314'
ERROR - 2025-03-05 14:20:57 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-03-05 14:21:05 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-03-05 14:21:23 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-03-05 14:21:46 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-03-05 14:23:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 14:23:15 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 14:23:26 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 14:23:26 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 14:23:28 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...an_5&quot;, &quot;jam_pemberian_6&quot;) VALUES ('801486', '13', '', '', ''...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 14:23:28 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...an_5", "jam_pemberian_6") VALUES ('801486', '13', '', '', ''...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES ('801486', '13', '', '', '', '', 'null', '0', '', '0', '', NULL, '1', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-03-05 14:25:41 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 14:25:41 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 14:25:50 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 14:25:50 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 14:25:55 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 14:25:55 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 14:26:17 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 14:26:17 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 14:26:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 14:26:40 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 14:28:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 14:28:03 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 14:29:44 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 14:29:44 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 14:30:06 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;id_layanan_pendaftaran&quot;
LINE 8:             where g.id_pendaftaran = 'id_layanan_pendaftaran...
                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 14:30:06 --> Query error: ERROR:  invalid input syntax for type integer: "id_layanan_pendaftaran"
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
        
ERROR - 2025-03-05 14:30:06 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;id_layanan_pendaftaran&quot;
LINE 7:             where d.id_pendaftaran = 'id_layanan_pendaftaran...
                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 14:30:06 --> Query error: ERROR:  invalid input syntax for type integer: "id_layanan_pendaftaran"
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
        
ERROR - 2025-03-05 14:30:06 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;id_layanan_pendaftaran&quot;
LINE 8:             where k.id_pendaftaran = 'id_layanan_pendaftaran...
                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 14:30:06 --> Query error: ERROR:  invalid input syntax for type integer: "id_layanan_pendaftaran"
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
        
ERROR - 2025-03-05 14:30:25 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 14:30:25 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 14:30:49 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 14:30:49 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 14:30:56 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 14:30:56 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 14:31:01 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;undefined&quot;
LINE 10: WHERE &quot;lp&quot;.&quot;id&quot; = 'undefined'
                           ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 14:31:01 --> Query error: ERROR:  invalid input syntax for type bigint: "undefined"
LINE 10: WHERE "lp"."id" = 'undefined'
                           ^ - Invalid query: SELECT "ps"."id" "no_rm", "ps"."nama" "nama_pasien", "ps"."tanggal_lahir", case when ps.kelamin='P' then 'Perempuan' else 'Laki-Laki' end kelamin, "pd"."tanggal_daftar", "pd"."tanggal_keluar", "pj"."nama" as "penjamin", "ps"."alergi", "sp"."nama" as "ruang_asal", "pg"."nama" "dokter_dpjp", "pg"."tanda_tangan", "pd"."jenis_rawat", "lp"."tindak_lanjut", "lp"."jenis_layanan", "rms"."diagnosa_awal_masuk", "rms"."hasil_konsultasi", "rms"."pending_lab"
FROM "sm_pasien" "ps"
JOIN "sm_pendaftaran" "pd" ON "ps"."id"="pd"."id_pasien"
JOIN "sm_layanan_pendaftaran" "lp" ON "pd"."id"="lp"."id_pendaftaran"
LEFT JOIN "sm_resume_medis_ranap" as "rms" ON "rms"."id_layanan_pendaftaran" = "lp"."id"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "lp"."id_unit_layanan"
LEFT JOIN "sm_penjamin" as "pj" ON "pj"."id" = "pd"."id_penjamin"
LEFT JOIN "sm_tenaga_medis" "tm" ON "lp"."id_dokter" = "tm"."id"
LEFT JOIN "sm_pegawai" "pg" ON "tm"."id_pegawai" = "pg"."id"
WHERE "lp"."id" = 'undefined'
ERROR - 2025-03-05 14:32:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 14:32:10 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 14:32:19 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 14:32:19 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 14:32:26 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 14:32:26 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 14:33:33 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 14:33:33 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 14:33:44 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 14:33:44 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 14:33:54 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 14:33:54 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 14:34:01 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 14:34:01 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 07:34:25 --> Severity: Notice  --> Trying to get property 'response' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/Vclaim_bpjs_v2.php 59
ERROR - 2025-03-05 07:34:25 --> Severity: Warning  --> Creating default object from empty value /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/Vclaim_bpjs_v2.php 59
ERROR - 2025-03-05 07:34:25 --> Severity: Notice  --> Undefined property: stdClass::$metaData /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/Vclaim_bpjs_v2.php 62
ERROR - 2025-03-05 07:34:25 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/Vclaim_bpjs_v2.php 62
ERROR - 2025-03-05 07:34:25 --> Severity: Notice  --> Undefined property: stdClass::$metaData /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/Vclaim_bpjs_v2.php 84
ERROR - 2025-03-05 07:34:25 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/Vclaim_bpjs_v2.php 84
ERROR - 2025-03-05 07:34:28 --> Severity: Notice  --> Trying to get property 'response' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/Vclaim_bpjs_v2.php 59
ERROR - 2025-03-05 07:34:28 --> Severity: Warning  --> Creating default object from empty value /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/Vclaim_bpjs_v2.php 59
ERROR - 2025-03-05 07:34:28 --> Severity: Notice  --> Undefined property: stdClass::$metaData /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/Vclaim_bpjs_v2.php 62
ERROR - 2025-03-05 07:34:28 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/Vclaim_bpjs_v2.php 62
ERROR - 2025-03-05 07:34:28 --> Severity: Notice  --> Undefined property: stdClass::$metaData /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/Vclaim_bpjs_v2.php 84
ERROR - 2025-03-05 07:34:28 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/Vclaim_bpjs_v2.php 84
ERROR - 2025-03-05 14:35:07 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0x80 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 14:35:07 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0x80 - Invalid query: UPDATE "sm_formulir_observasi_igd" SET "id" = '21743', "tanggal_1_fodti" = '2025-03-05', "tanggal_2_fodti" = '2025-03-05', "jam_1_fodti" = '6:30', "bismilah_fodti" = '1', "td_s_fodti" = '75', "td_d_fodti" = '58', "nadi_fodti" = '104', "rr_fodti" = '23', "suhu_fodti" = '36.1', "sat_o2_fodti" = '100% 3lpm', "kategori_fodti" = 'MERAH ', "skala_fodti" = '-', "resiko_fodti" = 'tinggi ', "kesadaran_fodti" = 'cm ', "gcs_e_fodti" = ' 4', "gcs_m_fodti" = '6', "gcs_v_fodti" = '5', "total_gcs_fodti" = '15', "pupil_kanan_fodti" = '+/2 mm', "pupil_kiri_fodti" = '2/+mm', "pemeriksaan_fodti" = 'ekg
gds =58', "jam_2_fodti" = '6:30', "implementasi_fodti" = 'mengobservasi ku dan ttv 
melakukan rekam jantung 
memberi terapi d 40 €0 mg IV', "alhamdulilah_fodti" = '1', "ttd_fodti" = '1', "perawat_fodti" = '594', "updated_at" = '2025-03-05 14:35:07'
WHERE "id" = '21743'
ERROR - 2025-03-05 14:35:12 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 14:35:16 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 14:35:16 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 14:35:22 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 14:35:22 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 14:36:05 --> Severity: Notice  --> Undefined property: CI::$code /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/third_party/MX/Controller.php 59
ERROR - 2025-03-05 14:36:05 --> Severity: Notice  --> Undefined property: CI::$message /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/third_party/MX/Controller.php 59
ERROR - 2025-03-05 14:37:02 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 14:37:02 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 14:37:19 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 14:37:19 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 14:37:27 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 14:37:27 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 07:37:56 --> Severity: Notice  --> Trying to get property 'response' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/Vclaim_bpjs_v2.php 59
ERROR - 2025-03-05 07:37:56 --> Severity: Warning  --> Creating default object from empty value /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/Vclaim_bpjs_v2.php 59
ERROR - 2025-03-05 07:37:56 --> Severity: Notice  --> Undefined property: stdClass::$metaData /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/Vclaim_bpjs_v2.php 62
ERROR - 2025-03-05 07:37:56 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/Vclaim_bpjs_v2.php 62
ERROR - 2025-03-05 07:37:56 --> Severity: Notice  --> Undefined property: stdClass::$metaData /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/Vclaim_bpjs_v2.php 84
ERROR - 2025-03-05 07:37:56 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/Vclaim_bpjs_v2.php 84
ERROR - 2025-03-05 07:38:00 --> Severity: Notice  --> Trying to get property 'response' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/Vclaim_bpjs_v2.php 59
ERROR - 2025-03-05 07:38:00 --> Severity: Warning  --> Creating default object from empty value /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/Vclaim_bpjs_v2.php 59
ERROR - 2025-03-05 07:38:00 --> Severity: Notice  --> Undefined property: stdClass::$metaData /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/Vclaim_bpjs_v2.php 62
ERROR - 2025-03-05 07:38:00 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/Vclaim_bpjs_v2.php 62
ERROR - 2025-03-05 07:38:00 --> Severity: Notice  --> Undefined property: stdClass::$metaData /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/Vclaim_bpjs_v2.php 84
ERROR - 2025-03-05 07:38:00 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/Vclaim_bpjs_v2.php 84
ERROR - 2025-03-05 07:38:02 --> Severity: Notice  --> Trying to get property 'response' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/Vclaim_bpjs_v2.php 59
ERROR - 2025-03-05 07:38:02 --> Severity: Warning  --> Creating default object from empty value /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/Vclaim_bpjs_v2.php 59
ERROR - 2025-03-05 07:38:02 --> Severity: Notice  --> Undefined property: stdClass::$metaData /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/Vclaim_bpjs_v2.php 62
ERROR - 2025-03-05 07:38:02 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/Vclaim_bpjs_v2.php 62
ERROR - 2025-03-05 07:38:02 --> Severity: Notice  --> Undefined property: stdClass::$metaData /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/Vclaim_bpjs_v2.php 84
ERROR - 2025-03-05 07:38:02 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/Vclaim_bpjs_v2.php 84
ERROR - 2025-03-05 14:38:04 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 14:38:35 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 14:38:35 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 14:38:43 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 14:38:43 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 14:38:43 --> Severity: Notice  --> Undefined property: CI::$code /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/third_party/MX/Controller.php 59
ERROR - 2025-03-05 14:38:43 --> Severity: Notice  --> Undefined property: CI::$message /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/third_party/MX/Controller.php 59
ERROR - 2025-03-05 14:38:48 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 14:38:48 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 14:38:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 14:38:57 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 14:38:58 --> Severity: Notice  --> Undefined property: CI::$code /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/third_party/MX/Controller.php 59
ERROR - 2025-03-05 14:38:58 --> Severity: Notice  --> Undefined property: CI::$message /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/third_party/MX/Controller.php 59
ERROR - 2025-03-05 07:39:51 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-03-05 07:39:51 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-03-05 07:39:59 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-03-05 07:39:59 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-03-05 07:40:08 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-03-05 07:40:08 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-03-05 07:40:17 --> Severity: Notice  --> Trying to get property 'metadata' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-03-05 07:40:17 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/aplicares_bpjs/controllers/api/Aplicares_bpjs.php 315
ERROR - 2025-03-05 14:40:20 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 14:40:34 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 14:40:34 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 07:41:35 --> Severity: Notice  --> Trying to get property 'response' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/Vclaim_bpjs_v2.php 59
ERROR - 2025-03-05 07:41:35 --> Severity: Warning  --> Creating default object from empty value /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/Vclaim_bpjs_v2.php 59
ERROR - 2025-03-05 07:41:35 --> Severity: Notice  --> Undefined property: stdClass::$metaData /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/Vclaim_bpjs_v2.php 62
ERROR - 2025-03-05 07:41:35 --> Severity: Notice  --> Trying to get property 'code' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/Vclaim_bpjs_v2.php 62
ERROR - 2025-03-05 07:41:35 --> Severity: Notice  --> Undefined property: stdClass::$metaData /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/Vclaim_bpjs_v2.php 84
ERROR - 2025-03-05 07:41:35 --> Severity: Notice  --> Trying to get property 'message' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/vclaim_bpjs/controllers/Vclaim_bpjs_v2.php 84
ERROR - 2025-03-05 14:41:37 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 14:41:37 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 14:41:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 14:41:52 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 14:42:05 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 14:42:05 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 14:42:06 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 14:42:06 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 14:42:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 14:42:12 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 14:42:39 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 14:42:39 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 14:42:54 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 14:42:54 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 14:43:14 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 14:43:16 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 14:43:16 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 14:48:06 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 14:48:27 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 14:48:27 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 14:49:18 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ... VALUES (5717288, '1229', 4995, '2.5', '1.00', 'Ya', 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 14:49:18 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ... VALUES (5717288, '1229', 4995, '2.5', '1.00', 'Ya', 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (5717288, '1229', 4995, '2.5', '1.00', 'Ya', 'null')
ERROR - 2025-03-05 14:50:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...ian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES ('801809', '8', '', '1', '...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 14:50:10 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...ian_5", "jam_pemberian_6") VALUES ('801809', '8', '', '1', '...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES ('801809', '8', '', '1', 'Infus', '', 'PC', '0', '', '0', 'MORN', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-03-05 14:51:02 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-03-05 14:51:51 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/views/js.php 1507
ERROR - 2025-03-05 14:52:05 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 14:53:52 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-03-05 14:56:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 14:56:15 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 14:57:14 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 14:57:14 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 14:57:48 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 14:57:48 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 14:57:51 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-03-05 14:58:46 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-03-05 14:59:34 --> Severity: Notice  --> Undefined variable: indikasi_pasien_masuk_icu /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/views/printing/cetak_indikasi_pasien_masuk_icu.php 52
ERROR - 2025-03-05 14:59:34 --> Severity: Notice  --> Trying to get property 'diagnosa_pasien' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/views/printing/cetak_indikasi_pasien_masuk_icu.php 52
ERROR - 2025-03-05 15:02:06 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-03-05 15:03:21 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-03-05 15:03:48 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-03-05 15:05:12 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-03-05 15:05:30 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-03-05 15:05:51 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-03-05 15:06:09 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-03-05 15:07:25 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...erian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES (801819, '5', '', '', '3...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 15:07:25 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...erian_5", "jam_pemberian_6") VALUES (801819, '5', '', '', '3...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (801819, '5', '', '', '3 X SEHARI 1 BUNGKUS', '', 'PC', '0', '', '0', 'MORN, NOON, EVE', 'Puyer Batuk 3x1 (salbutamol 1mg + triamcinolone 1.2mg)', '1', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-03-05 15:10:53 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-03-05 15:10:53 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-03-05 15:10:53 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-03-05 15:12:02 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-03-05 15:12:18 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;id_layanan_pendaftaran&quot;
LINE 8:             where g.id_pendaftaran = 'id_layanan_pendaftaran...
                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 15:12:18 --> Query error: ERROR:  invalid input syntax for type integer: "id_layanan_pendaftaran"
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
        
ERROR - 2025-03-05 15:12:18 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;id_layanan_pendaftaran&quot;
LINE 7:             where d.id_pendaftaran = 'id_layanan_pendaftaran...
                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 15:12:18 --> Query error: ERROR:  invalid input syntax for type integer: "id_layanan_pendaftaran"
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
        
ERROR - 2025-03-05 15:12:18 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;id_layanan_pendaftaran&quot;
LINE 8:             where k.id_pendaftaran = 'id_layanan_pendaftaran...
                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 15:12:18 --> Query error: ERROR:  invalid input syntax for type integer: "id_layanan_pendaftaran"
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
        
ERROR - 2025-03-05 15:12:32 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 15:13:42 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 15:15:31 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 15:15:31 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 15:16:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 15:16:10 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 15:16:32 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 15:16:32 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 15:16:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 15:16:46 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 15:17:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 15:17:03 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 15:17:13 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 15:17:13 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 15:17:38 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 15:17:38 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 15:17:59 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-03-05 15:18:00 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 15:18:00 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 15:18:16 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 15:18:16 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 15:18:37 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 15:18:37 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 15:18:58 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 15:18:58 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 15:19:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 15:19:09 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 15:19:16 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 15:19:16 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 15:19:25 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 15:19:25 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 15:21:49 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 15:21:49 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 15:22:06 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 15:22:06 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 15:22:17 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 15:22:17 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 15:22:26 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 15:22:26 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 15:22:33 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 15:22:33 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 15:22:37 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 15:22:37 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 15:22:47 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 15:22:47 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 15:22:54 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 15:22:54 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 15:22:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 15:22:57 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 15:23:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 15:23:09 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 15:23:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 15:23:09 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 15:23:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 15:23:15 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 15:23:20 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 15:23:20 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 15:23:27 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 15:23:27 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 15:23:31 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 15:23:31 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 15:23:47 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 15:25:37 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 15:25:37 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 15:25:45 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 15:25:45 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 15:25:50 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 15:25:50 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 15:30:27 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-03-05 15:32:11 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 1: ..., &quot;ttd_dokter&quot;, &quot;created_date&quot;) VALUES ('704844', '', '2055'...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 15:32:11 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 1: ..., "ttd_dokter", "created_date") VALUES ('704844', '', '2055'...
                                                             ^ - Invalid query: INSERT INTO "sm_pengkajian_awal_kebidanan_dan_kandungan" ("id_layanan_pendaftaran", "id_pendaftaran", "id_users", "waktu_kajian_kebidanan", "cara_tiba", "rujukan", "informasi", "keluhan_utama_keb", "rks_hamil_muda", "rks_hamil_tua", "rks_anc", "rks_g", "rks_p", "rks_a", "rks_usia_kehamilan", "rks_hpht", "rks_tp", "rk_riwayat_menstruasi", "rk_riwayat_perkawinan", "rk_riwayat_penyakit_operasi", "rk_obat_dikosumsi", "rk_membawa_obat_dari_luar", "rk_terapi_komplementari", "rk_riwayat_penyakit_kluwarga", "rk_riwayat_kluwarga_berencana", "rk_riwayat_ginekologi", "rk_riwayat_alergi", "rk_riwayat_tranfusi_darah", "rk_kebiasaan", "rk_status_psikologi", "rk_status_mental", "rk_kebutuhan_biologis", "rk_kebutuhan_sosial", "rk_status_ekonomi", "rk_status_nilai_kepercayaan", "rk_spiritual", "rk_budaya", "ikbe_kewarganegaraan", "ikbe_suku_bangsa", "ikbe_bicara", "ikbe_jelaskan", "ikbe_perlu_peterjemah", "ikbe_bahasa", "ikbe_bahasa_isyarat", "ikbe_pemahaman_penyakit", "ikbe_pemahaman_pengobatan", "ikbe_pemahaman_nutrisi", "ikbe_pemahaman_spiritual", "ikbe_pemahaman_peralatan", "ikbe_pemahaman_rahab", "ikbe_pemahaman_manajemen", "hambatan_keb", "pkdk_inpeksi_abdomen", "pkdk_palpasi", "pkdk_auskultasi", "pkdk_gerak_janin", "pkdk_his_kontraksi", "pkdk_pemeriksaan_dalam", "pkf_makan", "pkf_mandi", "pkf_personal", "pkf_berpakaian", "pkf_buang_besar", "pkf_buang_kecil", "pkf_berpindah", "pkf_toileting", "pkf_mobilitas", "pkf_naik", "pkf_jumlah_skor", "sn_penurunan_bb_kebidanan", "sn_penurunan_bb_on_kebidanan", "sn_asupan_makan_kebidanan", "sn_total_kebidanan", "ptn_nilai_tingkat_nyeri", "ptn_nyeri_hilang", "prjd_riwayat_jatuh", "prjd_diagnosis", "prjd_kursi_roda", "prjd_kruk_tongkat", "prjd_berpegangan", "prjd_terpasang_infus", "prjd_normal", "prjd_lemah", "prjd_terganggu", "prjd_sadar", "prjd_sering", "prjd_jumlah_skor", "spak_usia", "spak_nafas", "spak_sepsis", "spak_multiple", "spak_studium", "pftv_kesadaran", "pftv_gsc_e", "pftv_gsc_m", "pftv_gsc_v", "pftv_total", "pftv_tekanan_darah", "pftv_frekuensi_nadi", "pftv_berat_badan", "pftv_mata", "pftv_dada_aksila", "pftv_ekstremitas", "pftv_sistem_pernafasan", "pftv_sistem_kardiovaskuler", "sews_respirasi", "sews_saturasi_1", "sews_o2", "sews_suhu", "sews_td_sistolik", "sews_td_diastolik", "sews_nadi", "sews_kesadaran_1", "sews_nyeri", "sews_pengeluaran", "sews_protein_urin", "sews_total_1", "sews_laju_respirasi", "sews_saturasi_2", "sews_suplemen", "sews_temperatur", "sews_tds", "sews_laju_jantung", "sews_kesadaran_2", "sews_total_2", "dp_pemeriksaan_lab_tanggal", "dp_pemeriksaan_ctg_tanggal", "dp_hasil", "dp_hasil1", "dp_lain_lain", "pk_penyakit_menular", "pk_penurunan_daya_tahan_tubuh", "pk_kesehatan_jiwa", "pk_pasien_kekerasan_penganiayaan", "pk_pasien_ketergantungan_obat", "ak_infeksi", "ak_anxeitas", "ak_perdarahan", "ak_melahirkan", "ak_nausea", "ak_efektif", "ak_janin", "ak_lain", "ak_lainl", "rak_kluwarga", "rak_selanjutnya", "rak_consent", "rak_kebutuhan", "rak_persalinan", "rak_pasien", "rak_lain", "rak_lainl", "kriteria_discharge_planing", "perencanaa_pulang", "tanggal_jam_bidan", "id_bidan", "ttd_bidan", "tanggal_jam_dokter_keb", "id_dokter", "ttd_dokter", "created_date") VALUES ('704844', '', '2055', '2025-03-05 15:25', '{"cara_tiba_diruangan_pasien":"KursiRoda"}', '{"rujukan_pasien_1":null,"rujukan_pasien_2":null,"rujukan_pasien_3":null,"rujukan_pasien_4":null,"rujukan_pasien_5":null,"rujukan_pasien_6":null,"rujukan_pasien_7":"Tidak ada Rujukan","rujukan_pasien_8":null,"rujukan_pasienl":null}', '{"informasi_pasien":"Pasien","informasi_pasienn":null}', '{"keluhan_utama_keb_1":null,"keluhan_utama_keb_2":null,"keluhan_utama_keb_3":null,"keluhan_utama_keb_4":null,"keluhan_utama_keb_5":null,"keluhan_utama_keb_6":null,"keluhan_utama_keb_7":null,"keluhan_utama_keb_8":null,"keluhan_utama_keb_9":null,"keluhan_utama_keb_10":"1","keluhan_utama_keb_11":"pasien mengatakan  nyeri perut bagian bawah + mual + muntah +"}', '{"hamil_muda_1":"1","hamil_muda_2":"1","hamil_muda_3":null,"hamil_muda_4":null,"hamil_lain_lain":null}', '{"hamil_tua_1":null,"hamil_tua_2":null,"hamil_tua_3":null,"hamil_tua_4":null,"hamil_lain_5":null}', '{"anc_1":"1","anc_2":"bidan ","anc_3":null,"anc_4":null,"anc_5":null}', '4', '3', '0', '12 minggu ', '2/12/2024', '-', '{"riwayat_menstruasi_1":"1","riwayat_menstruasi_2":"10","riwayat_menstruasi_3":"5","riwayat_menstruasi_4":"3","riwayat_menstruasi_5":"1","riwayat_menstruasi_6":null,"riwayat_menstruasi_7":null,"riwayat_menstruasi_8":null,"riwayat_menstruasi_9":null}', '{"riwayat_perkawinan_1":"1","riwayat_perkawinan_2":"1","riwayat_perkawinan_3":"18","riwayat_perkawinan_4":null,"riwayat_perkawinan_5":null,"riwayat_perkawinan_6":null,"riwayat_perkawinan_7":null,"riwayat_perkawinan_8":null,"riwayat_perkawinan_9":null,"riwayat_perkawinan_10":null,"riwayat_perkawinan_11":null}', '{"riwayat_penyakit_oprasi_1":null,"riwayat_penyakit_oprasi_2":null,"riwayat_penyakit_oprasi_3":null,"riwayat_penyakit_oprasi_4":null,"riwayat_penyakit_oprasi_5":null,"riwayat_penyakit_oprasi_6":null,"riwayat_penyakit_oprasi_7":null,"riwayat_penyakit_oprasi_8":null,"riwayat_penyakit_oprasi_9":null,"riwayat_penyakit_oprasi_10":null,"riwayat_penyakit_oprasi_11":"0","riwayat_penyakit_oprasi_13":null,"riwayat_penyakit_oprasi_14":null,"riwayat_penyakit_oprasi":"0","riwayat_penyakit_oprasi_17":null,"riwayat_penyakit_oprasi_18":null}', '-', '{"membawa_obat_1":"0"}', '{"terapi_komplementari_1":null,"terapi_komplementari_2":"-","terapi_komplementari_3":null,"terapi_komplementari_4":null,"terapi_komplementari_5":null,"terapi_komplementari_6":null}', '{"riwayat_penyakit_kluwarga_1":null,"riwayat_penyakit_kluwarga_2":null,"riwayat_penyakit_kluwarga_3":null,"riwayat_penyakit_kluwarga_4":null,"riwayat_penyakit_kluwarga_5":null,"riwayat_penyakit_kluwarga_6":null,"riwayat_penyakit_kluwarga_7":null,"riwayat_penyakit_kluwarga_8":null,"riwayat_penyakit_kluwarga_9":null,"riwayat_penyakit_kluwarga_10":null,"riwayat_penyakit_kluwarga_11":null,"riwayat_penyakit_kluwarga_12":null,"riwayat_penyakit_kluwarga_13":null,"riwayat_penyakit_kluwarga_14":null,"riwayat_penyakit_kluwarga_15":null}', '{"riwayat_kel_berencana_1":null,"riwayat_kel_berencana_2":null,"riwayat_kel_berencana_3":null,"riwayat_kel_berencana_4":null,"riwayat_kel_berencana_5":null,"riwayat_kel_berencana_6":null,"riwayat_kel_berencana_7":null,"riwayat_kel_berencana_8":null,"riwayat_kel_berencana_9":null}', '{"riwayat_ginekologi_1":null,"riwayat_ginekologi_2":null,"riwayat_ginekologi_3":null,"riwayat_ginekologi_4":null,"riwayat_ginekologi_5":null,"riwayat_ginekologi_6":null,"riwayat_ginekologi_7":null,"riwayat_ginekologi_8":null,"riwayat_ginekologi_9":null,"riwayat_ginekologi_10":null,"riwayat_ginekologi_11":null,"riwayat_ginekologi_12":null}', '{"riwayat_alergi_1":"1","riwayat_alergi_3":null,"riwayat_alergi_4":null,"riwayat_alergi_5":null,"riwayat_alergi_6":null,"riwayat_alergi_7":null,"riwayat_alergi_8":null}', '{"riwayat_tranfusi_darah_1":"1","riwayat_tranfusi_darah_2":null,"riwayat_tranfusi_darah_3":null,"riwayat_tranfusi_darah_5":null}', '{"kebiasaan_1":null,"kebiasaan_2":null,"kebiasaan_3":null,"kebiasaan_4":null,"kebiasaan_5":null,"kebiasaan_6":null}', '{"status_psikologis_1":null,"status_psikologis_2":null,"status_psikologis_3":null,"status_psikologis_4":null,"status_psikologis_5":null,"status_psikologis_6":null,"status_psikologis_7":null,"status_psikologis_8":null,"status_psikologis_9":null,"status_psikologis_10":null}', '{"status_mental_1":"1","status_mental_2":null,"status_mental_3":null,"status_mental_4":null,"status_mental_5":null}', '{"kebutuhan_biologis_1":"3","kebutuhan_biologis_2":"10:00","kebutuhan_biologis_3":"6","kebutuhan_biologis_4":"12:00","kebutuhan_biologis_5":"7","kebutuhan_biologis_6":"15:00","kebutuhan_biologis_7":"1","kebutuhan_biologis_8":"6:00","kebutuhan_biologis_9":"2 minggu yang lalu"}', '{"kebutuhan_sosial_1":"1","kebutuhan_sosial_2":null,"kebutuhan_sosial_3":null,"kebutuhan_sosial_4":null,"kebutuhan_sosial_5":"1","kebutuhan_sosial_6":null,"kebutuhan_sosial_7":null,"kebutuhan_sosial_8":"1","kebutuhan_sosial_10":null,"kebutuhan_sosial_11":null,"kebutuhan_sosial_12":null,"kebutuhan_sosial_13":null,"kebutuhan_sosial_14":null}', '{"status_ekonomi_1":null,"status_ekonomi_2":null,"status_ekonomi_3":null,"status_ekonomi_4":"1","status_ekonomi_5":null,"status_ekonomi_6":"1","status_ekonomi_7":null,"status_ekonomi_8":null,"status_ekonomi_9":null}', '{"status_nn_kepercayaan_1":"1","status_nn_kepercayaan_3":null,"status_nn_kepercayaan_4":"0","status_nn_kepercayaan_6":null,"status_nn_kepercayaan_7":"shalat"}', '{"spiritual_1":"1","spiritual_2":null,"spiritual_3":null,"spiritual_4":null,"spiritual_5":"1","spiritual_6":null,"spiritual_7":"1","spiritual_8":null,"spiritual_9":null}', '{"budaya_1":null,"budaya_2":null,"budaya_3":null,"budaya_4":null,"budaya_5":null,"budaya_6":"-","budaya_7":"1","budaya_8":null,"budaya_9":null,"budaya_10":null,"budaya_11":null,"budaya_12":"1","budaya_14":"1","budaya_16":null,"budaya_17":"1","budaya_19":null,"budaya_20":"0","budaya_22":null}', '1', 'jawa', '0', NULL, '0', NULL, '0', '1', '1', '1', '1', '1', '1', '1', '{"hambatan_keb_1":"1","hambatan_keb_2":null,"hambatan_keb_3":null,"hambatan_keb_4":null,"hambatan_keb_5":null,"hambatan_keb_6":null,"hambatan_keb_7":null,"hambatan_keb_8":null,"hambatan_keb_9":null,"hambatan_keb_10":null}', '{"infeksi_abdomen_1":null,"infeksi_abdomen_2":null,"infeksi_abdomen_3":null,"infeksi_abdomen_4":null,"infeksi_abdomen_5":null,"infeksi_abdomen_6":null,"infeksi_abdomen_7":null,"infeksi_abdomen_8":null,"infeksi_abdomen_9":null,"infeksi_abdomen_10":null}', '{"palpasi_1":"-","palpasi_2":null,"palpasi_3":null,"palpasi_4":null,"palpasi_5":null,"palpasi_6":null,"palpasi_7":null,"palpasi_8":null,"palpasi_9":null,"palpasi_10":null,"palpasi_11":null,"palpasi_12":null,"palpasi_13":null,"palpasi_14":null,"palpasi_15":null,"palpasi_16":"-","palpasi_17":"-"}', '{"auskultasi_1":"-","auskultasi_2":null,"auskultasi_3":null,"auskultasi_4":null}', '-', '{"his_konteraksi_1":"-","his_konteraksi_2":"-","his_konteraksi_3":"-"}', '{"pemeriksaan_dalam_1":null,"pemeriksaan_dalam_2":null,"pemeriksaan_dalam_3":null,"pemeriksaan_dalam_4":null,"pemeriksaan_dalam_5":null,"pemeriksaan_dalam_6":null,"pemeriksaan_dalam_7":null,"pemeriksaan_dalam_8":null,"pemeriksaan_dalam_9":"-","pemeriksaan_dalam_10":null,"pemeriksaan_dalam_11":null,"pemeriksaan_dalam_12":null,"pemeriksaan_dalam_13":null}', '10', '5', '5', '10', '10', '10', '10', '5', '10', '0', '75', '1', NULL, '0', '0', '{"keterangan_kebidanan_1":"Ringan"}', '{"nyeri_hilang_kebidanan_1":null,"nyeri_hilang_kebidanan_2":null,"nyeri_hilang_kebidanan_3":"1","nyeri_hilang_kebidanan_4":null,"nyeri_hilang_kebidanan_5":null,"nyeri_hilang_kebidanan_6":null}', NULL, '15', NULL, NULL, NULL, '20', NULL, '10', NULL, '0', NULL, '45', '0', '0', '0', '0', '0', '{"kesadaran_1":"0_1","kesadaran_2":null,"kesadaran_3":null,"kesadaran_4":null}', '4', '6', '5', '15', '{"tekanan_darah_1":"120","tekanan_darah_2":"79","tekanan_darah_3":"36.7"}', '{"frekuensi_nadi_1":"80","frekuensi_nadi_2":"19"}', '{"berat_badan_1":"0","berat_badan_2":"0"}', '{"mata_1":null,"mata_2":null,"mata_3":null,"mata_4":null}', '{"dada_askila_1":"1","dada_askila_2":null,"dada_askila_3":null,"dada_askila_4":null,"dada_askila_5":null,"dada_askila_6":null}', '{"ekstremitas_1":"1","ekstremitas_2":null,"ekstremitas_3":null,"ekstremitas_4":null}', '{"sistem_pernafasan_1":null,"sistem_pernafasan_2":null,"sistem_pernafasan_3":null,"sistem_pernafasan_4":null,"sistem_pernafasan_5":null,"sistem_pernafasan_6":null,"sistem_pernafasan_7":null,"sistem_pernafasan_8":null,"sistem_pernafasan_9":null}', '{"sistem_kardiovaskuler_1":null,"sistem_kardiovaskuler_2":null,"sistem_kardiovaskuler_3":null,"sistem_kardiovaskuler_4":null,"sistem_kardiovaskuler_5":"0","sistem_kardiovaskuler_7":null,"sistem_kardiovaskuler_8":"1","sistem_kardiovaskuler_10":"1","sistem_kardiovaskuler_11":null,"sistem_kardiovaskuler_12":null,"sistem_kardiovaskuler_13":"1","sistem_kardiovaskuler_14":null,"sistem_kardiovaskuler_15":null,"sistem_kardiovaskuler_16":null}', '0_2', '0_3', '0_2', '0_2', '0_2', '0_1', '0_3', '0_1', NULL, NULL, NULL, 'Putih', '0_3', '0_4', '0_2', '0_3', '1_4', NULL, '0_1', 'Hijau', '2025-03-05', '1970-01-01', 'terlampir', '-', '-', '{"pk_penyakit_menular_1":"0","pk_penyakit_menular_3":null,"pk_penyakit_menular_4":null,"pk_penyakit_menular_5":null,"pk_penyakit_menular_6":null,"pk_penyakit_menular_7":null,"pk_penyakit_menular_8":null,"pk_penyakit_menular_9":null,"pk_penyakit_menular_11":"0","pk_penyakit_menular_13":null,"pk_penyakit_menular_14":null,"pk_penyakit_menular_15":null,"pk_penyakit_menular_16":null,"pk_penyakit_menular_17":null,"pk_penyakit_menular_18":"0","pk_penyakit_menular_20":null}', '{"penyakit_saat_ini":"0","informasi_dari":{"dokter":"","perawat":"","keluarga":"","lain":"","ket_lain":""},"informasi_jangka_waktu":"","ket_informasi_jangka_waktu":"","pemeriksaan_rutin":"0","ket_pemeriksaan_rutin":"","penyakit_penyerta":"0","ket_penyakit_penyerta":""}', '{"ket_1":"0","ket_2":"0","ket_3":"0","ket_4":"1","ket_5":"1","ket_6":"1","ket_7":"0","ket_8":"0","ket_9":"1"}', '{"ket_1":"0","ket_2":"","ket_3":"","ket_4":"","ket_5":"","ket_6":"0"}', '{"obat":"0","ket_obat":"","lama_ketergantungan":""}', NULL, NULL, NULL, '1', '1', NULL, NULL, NULL, NULL, '1', '1', '1', '1', NULL, '1', NULL, NULL, '{"discharge_planning_kebidanan_1":"0","discharge_planning_kebidanan_2":"0","discharge_planning_kebidanan_3":"1","discharge_planning_kebidanan_4":"0"}', '{"kriteria_discharge_kebidanan_1":null,"kriteria_discharge_kebidanan_2":null,"kriteria_discharge_kebidanan_3":null,"kriteria_discharge_kebidanan_4":null,"kriteria_discharge_kebidanan_5":null,"kriteria_discharge_kebidanan_6":"1","kriteria_discharge_kebidanan_7":null,"kriteria_discharge_kebidanan_8":null,"kriteria_discharge_kebidanan_9":null,"kriteria_discharge_kebidanan_10":null}', '2025-03-05 15:25', '618', '1', '2025-03-05 15:32', '45', '1', '2025-03-05 15:32:11')
ERROR - 2025-03-05 15:33:12 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 15:37:43 --> Severity: Notice  --> A non well formed numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_hemo/controllers/api/Pemeriksaan_hemo.php 527
ERROR - 2025-03-05 15:37:58 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-03-05 15:38:52 --> Severity: Warning  --> A non-numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 7939
ERROR - 2025-03-05 15:39:10 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 15:39:46 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-03-05 15:41:26 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 15:41:26 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 15:41:31 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 15:41:31 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 15:41:37 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 15:41:37 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 15:42:27 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xde 0x6e /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 15:42:27 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xde 0x6e - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('704842', '2025-03-05 15:32', '8', 'Pasien tampak sesak berat, kontak (-) pindahan dari ruang Ulin 1 ', 'GCS 3 Ku berat 
TTV TD 87/56mmhg n 56-62x/m teraba lemah, RR 16x/m SpO2 88-96Þngan NRM 
S afebris
Thorax VBS +/redup Rh +/+ Wh -/- 
', 'ARDS ec PCP+ TB paru + efusi pleura+ obs kejang ec suspek ME TB dd Toxoplasmosis, Malaise ec Anemia Gravis, HIV blm ARV; Hiponatremia (perbaikan)
', 'KIE ', '', '', '', '', '', '', '', '', '2039', '1', 'Terapi lain sesuai DPJP&nbsp;', NULL, '2039', 0, NULL, '2025-03-05 15:42:27')
ERROR - 2025-03-05 15:43:31 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-03-05 15:43:35 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 15:43:35 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 15:43:39 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 15:43:39 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 15:44:45 --> Severity: Notice  --> A non well formed numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_hemo/controllers/api/Pemeriksaan_hemo.php 527
ERROR - 2025-03-05 15:50:13 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 15:50:43 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2419
ERROR - 2025-03-05 15:50:43 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2432
ERROR - 2025-03-05 15:50:43 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2445
ERROR - 2025-03-05 15:51:36 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/intensive_care/views/js.php 1119
ERROR - 2025-03-05 15:53:02 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 15:55:07 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 15:55:59 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 15:55:59 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 15:56:19 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 15:56:19 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 15:56:38 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 15:56:38 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 15:59:05 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-03-05 16:05:28 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-03-05 16:06:22 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 16:06:22 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 16:06:31 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 16:06:31 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 16:10:47 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 16:11:44 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-03-05 16:12:12 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-03-05 16:13:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 16:13:51 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 16:13:54 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 16:13:54 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 16:13:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...) VALUES (5717817, '393', 6526.8, '1', '1.00', NULL, 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 16:13:57 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...) VALUES (5717817, '393', 6526.8, '1', '1.00', NULL, 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (5717817, '393', 6526.8, '1', '1.00', NULL, 'null')
ERROR - 2025-03-05 16:16:22 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-03-05 16:18:21 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-03-05 16:21:41 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 16:21:41 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 16:21:45 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 16:21:45 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 16:22:20 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 16:22:20 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 16:22:26 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 16:22:26 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 16:22:45 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 16:22:45 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 16:22:54 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 16:22:54 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 16:23:56 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 16:23:56 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 16:24:08 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 16:24:08 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 16:26:05 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-03-05 16:31:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 16:31:36 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 16:31:49 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 16:31:49 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 16:31:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...LUES (5717890, '1234', 19980, '60', '1.00', 'Tidak', 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 16:31:52 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...LUES (5717890, '1234', 19980, '60', '1.00', 'Tidak', 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (5717890, '1234', 19980, '60', '1.00', 'Tidak', 'null')
ERROR - 2025-03-05 16:34:55 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 16:34:55 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 16:35:11 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 16:35:11 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 16:40:38 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 16:40:38 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 16:40:40 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2419
ERROR - 2025-03-05 16:40:40 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2432
ERROR - 2025-03-05 16:40:40 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2445
ERROR - 2025-03-05 16:40:43 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2419
ERROR - 2025-03-05 16:40:43 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2432
ERROR - 2025-03-05 16:40:43 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/controllers/api/Pelayanan.php 2445
ERROR - 2025-03-05 16:40:47 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ...ian_5&quot;, &quot;jam_pemberian_6&quot;) VALUES ('801841', '1', '', '1', '...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 16:40:47 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ...ian_5", "jam_pemberian_6") VALUES ('801841', '1', '', '1', '...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES ('801841', '1', '', '1', '', '', 'null', '0', '', '0', '', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-03-05 16:41:02 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 16:41:02 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 16:45:46 --> Severity: Notice  --> Trying to get property 'nama' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/sisa_stok/views/export/sisa_stok_unit.php 44
ERROR - 2025-03-05 16:46:58 --> Severity: Notice  --> A non well formed numeric value encountered /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_hemo/controllers/api/Pemeriksaan_hemo.php 527
ERROR - 2025-03-05 16:50:08 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 16:52:54 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 16:52:54 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 16:53:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 16:53:03 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 16:55:16 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 16:55:16 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 16:58:30 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-03-05 16:58:56 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-03-05 16:59:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 16:59:52 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 16:59:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 16:59:57 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 17:00:32 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 17:00:32 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 17:01:02 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-03-05 17:01:43 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 17:01:43 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 17:02:58 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 17:02:58 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 17:03:05 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 17:03:05 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 17:03:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 17:03:09 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 17:03:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...VALUES (5718042, '921', 2040.624, '1', '1.00', NULL, 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 17:03:12 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...VALUES (5718042, '921', 2040.624, '1', '1.00', NULL, 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (5718042, '921', 2040.624, '1', '1.00', NULL, 'null')
ERROR - 2025-03-05 17:04:24 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 17:04:24 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 17:04:29 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 17:04:29 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 17:05:21 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-03-05 17:05:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 17:05:36 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 17:05:41 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 17:05:41 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 17:05:47 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 17:05:47 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 17:05:53 --> Severity: Notice  --> Undefined variable: tindakanNama /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 572
ERROR - 2025-03-05 17:05:53 --> Severity: Warning  --> array_unique() expects parameter 1 to be array, null given /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 572
ERROR - 2025-03-05 17:05:53 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pemeriksaan_poli/controllers/Pemeriksaan_poli.php 574
ERROR - 2025-03-05 17:05:53 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 17:10:26 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 17:10:26 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 17:10:55 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 17:10:55 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 17:20:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xde 0x6e /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 17:20:57 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xde 0x6e - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('704858', '2025-03-05 17:14', '8', 'Saat ini tidak ada keluhan, sesak (-) nyeri abdomen (-) ', 'CM/sedang 
TTV TD 98/62mmHg 
N 76x/m kuat angkat 
R 20x/m 
S afebris 
SpO2  96Þngan NK 
Thorax VBS +/+ Rh-/- Wh -/- 
Abdomen datar soepel BU (+) NT (-) 
Ekstrimitas CRT&lt; 2 akral hangat ptekie (+) ', 'weil''s disesase + AKI + Salmonella fever + hiponatremia
', '', '', '', '', '', '', '', '', '', '2039', '1', 'Terapi sesuai DPJP&nbsp;', NULL, '2039', 0, NULL, '2025-03-05 17:20:57')
ERROR - 2025-03-05 17:32:37 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 17:32:37 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 17:32:59 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-03-05 17:36:45 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xde 0x6e /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 17:36:45 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xde 0x6e - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('702460', '2025-03-05 17:33', '8', 'sesak berkurang, nyeri dada (-) ', 'CM/sedang 
TTV TD 118/83mmHg 
N 95x/m kuat angkat 
SpO2 96Þngan NK 3 lpm 
S afebris
Thorax VBS +/+ Rh -/- Wh -/- 
', 'STEMI Anteroseptal + pneumonia + asidosis metabolik perbaikan + aneurisma abdominalis + hematuria post lovenox+ PAF + susp diseksi aorta + anemia + aki
', 'follow up rujukan ', '', '', '', '', '', '', '', '', '2039', '1', 'Terapi sesuai DPJP&nbsp;', NULL, '2039', '1', NULL, '2025-03-05 17:36:45')
ERROR - 2025-03-05 17:39:55 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 17:39:55 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 17:39:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...&quot;) VALUES (5718164, '212', 862.8, '1', '1.00', NULL, 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 17:39:57 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...") VALUES (5718164, '212', 862.8, '1', '1.00', NULL, 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (5718164, '212', 862.8, '1', '1.00', NULL, 'null')
ERROR - 2025-03-05 17:40:01 --> Severity: Notice  --> Trying to get property 'id_pendaftaran' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/salinan_resep/models/Salinan_resep_model.php 680
ERROR - 2025-03-05 17:40:11 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 17:40:11 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 17:40:11 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xde 0x6e /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 17:40:11 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xde 0x6e - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('703346', '2025-03-05 17:33', '8', 'Saat ini tidak ada keluhan ', 'CM/ sedang 
TTV 117/71mmHg N 71x/m kuat angkat SpO2 97Þngan NK 2 lpm
S afebris 
', 'DM tipe II tidak terkontrol, Anemia ringan ec peny kronik, Hiponatremia, ISK', 'Rencana pindah ruangan ', '', '', '', '', '', '', '', '', '2039', '1', 'Terapi sesuai DPJP&nbsp;', NULL, '2039', '1', NULL, '2025-03-05 17:40:11')
ERROR - 2025-03-05 17:40:48 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 17:40:48 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 17:40:53 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 17:40:53 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 17:41:33 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 17:41:33 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 17:41:42 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 17:41:42 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 17:42:25 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 17:42:25 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 17:43:04 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-03-05 17:45:15 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 17:45:15 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 17:49:51 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xcd 0x65 /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 17:49:51 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xcd 0x65 - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('704092', '2025-03-05 17:33', '8', 'Sesak nafas (-) ', 'CM sedang 
TTV 115/67mmHg 
N 75x/m kuat angkat
SpO2 98Íengan NK 3 lpm ', 'Pneumonia, Bekas TB DD TB kambuh, PPOK dg gagal napas tipe 2, DM, CAD', '', '', '', '', '', '', '', '', '', '2039', '1', 'Terapi sesuai DPJP&nbsp;', NULL, '2039', '1', NULL, '2025-03-05 17:49:51')
ERROR - 2025-03-05 18:01:03 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-03-05 18:07:02 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 18:07:02 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 18:07:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 18:07:10 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 18:07:58 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 18:09:59 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-03-05 18:09:59 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-03-05 18:09:59 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-03-05 18:18:13 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 18:18:13 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 18:18:25 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 18:18:25 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 18:18:42 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 18:18:42 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 18:18:52 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 18:18:52 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 18:19:50 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 18:19:50 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 18:19:58 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 18:19:58 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 18:20:06 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 18:20:06 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 18:20:16 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 18:20:16 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 18:20:26 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 18:20:26 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 18:20:34 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 18:20:34 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 18:21:24 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 18:21:24 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 18:21:34 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 18:21:34 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 18:21:42 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ... VALUES (5718366, '1069', 4662, '0.1', '2.00', 'Ya', 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 18:21:42 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ... VALUES (5718366, '1069', 4662, '0.1', '2.00', 'Ya', 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (5718366, '1069', 4662, '0.1', '2.00', 'Ya', 'null')
ERROR - 2025-03-05 18:22:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 18:22:03 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 18:22:23 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 18:22:23 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 18:22:28 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 18:22:28 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 18:22:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 18:22:36 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 18:22:41 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 18:22:41 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 18:22:47 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 18:22:47 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 18:22:54 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 18:22:54 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 18:42:07 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-03-05 18:42:07 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-03-05 18:42:07 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-03-05 18:42:08 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-03-05 18:42:08 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-03-05 18:42:09 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-03-05 18:42:09 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-03-05 18:53:31 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-03-05 18:56:05 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 18:56:05 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 18:56:08 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 18:56:08 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 18:56:13 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 18:56:13 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 18:56:17 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...&quot;) VALUES (5718402, '697', 6600, '40', '1.00', 'Ya', 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 18:56:17 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...") VALUES (5718402, '697', 6600, '40', '1.00', 'Ya', 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (5718402, '697', 6600, '40', '1.00', 'Ya', 'null')
ERROR - 2025-03-05 18:56:31 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 18:56:31 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 18:56:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 18:56:36 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 18:56:39 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 18:56:39 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 18:57:54 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-03-05 18:58:01 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-03-05 18:58:06 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-03-05 19:05:33 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 19:23:35 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 19:23:35 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 19:23:49 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 19:23:49 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 19:23:58 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 19:23:58 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 19:24:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 19:24:10 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 19:34:01 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 19:34:01 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 19:34:11 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 19:34:11 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 19:34:19 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 19:34:19 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 19:34:21 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 19:34:21 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 19:34:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...ALUES (5718447, '3560', 4329.6, '24', '10.00', 'Ya', 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 19:34:46 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...ALUES (5718447, '3560', 4329.6, '24', '10.00', 'Ya', 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (5718447, '3560', 4329.6, '24', '10.00', 'Ya', 'null')
ERROR - 2025-03-05 19:35:04 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 19:35:04 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 19:35:06 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 19:35:06 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 19:35:09 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 19:35:09 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 19:35:11 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 19:35:11 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 19:36:53 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-03-05 19:37:40 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-03-05 19:38:05 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 19:39:46 --> Severity: Notice  --> Undefined variable: indikasi_pasien_masuk_icu /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/views/printing/cetak_indikasi_pasien_masuk_icu.php 52
ERROR - 2025-03-05 19:39:46 --> Severity: Notice  --> Trying to get property 'diagnosa_pasien' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/views/printing/cetak_indikasi_pasien_masuk_icu.php 52
ERROR - 2025-03-05 19:40:49 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-03-05 19:53:00 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 19:55:50 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid byte sequence for encoding &quot;UTF8&quot;: 0xde 0x6e /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 19:55:50 --> Query error: ERROR:  invalid byte sequence for encoding "UTF8": 0xde 0x6e - Invalid query: INSERT INTO "sm_cppt" ("id_layanan_pendaftaran", "waktu", "id_profesi", "subject", "objective", "assessment", "plan", "ademi_assesment", "ademi_diag", "ademi_interv", "ademi_monev", "sbar_situation", "sbar_background", "sbar_assesment", "sbar_recommend", "id_nadis", "ttd_nadis", "instruksi_ppa", "id_dokter_dpjp", "id_user", "konsul_via_telp", "konsul", "created_date") VALUES ('704128', '2025-03-05 16:02', '8', '', '', 'CAP', '', '', '', '', '', 'saat ini tidak ada keluhan ', 'kes CM KU sedang 
TTV TD 127/74mmHg 
N 91x/m
R 20x/m
S afebris 
SpO2 98Þngan NK 
Kepala: CA -/- 
Thorax dalam  batas normal 
Abdomen datar, soepel BU (+) 
Luka post op tertutup verban, rembesan (-) 
TFU 2 jari dibawah pusat, kontraksi kuat 
V/V lochia rubra (+) 

DR post Sc terlampir 
Hb 12,3>>> 10,2', 'P6A0 post SC a/i PEB + MOW a/i cukup anak ', 'Lapor dr Agus SpOG ', '2039', '1', '<p>Sudah konsultasi dan konfirmasi ulang dr Agus SpOGÂ <br>AdviceÂ </p><p>Dexamethasone pertahankan sampai 24 jamÂ <br>Acc analgetik (tramadol)Â </p>', NULL, '2039', '1', NULL, '2025-03-05 19:55:50')
ERROR - 2025-03-05 20:07:05 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-03-05 20:07:27 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 20:07:36 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 20:07:46 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 20:08:37 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Vclaim_bpjs_v2' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-03-05 20:09:26 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 20:09:58 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/intensive_care/views/js.php 1119
ERROR - 2025-03-05 20:11:34 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 20:11:34 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 20:12:45 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  OFFSET must not be negative /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 20:12:45 --> Query error: ERROR:  OFFSET must not be negative - Invalid query: select lp.*, ri.id as id_intensive_care, ri.waktu_masuk, 
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
					COALESCE((select case when va.visited_at is not null then '1' else '0' end from sm_visit_anestesi va where va.id_layanan_pendaftaran = lp.id and va.id_pegawai = '2118' LIMIT 1 ), '0') as visit_anestesi  from sm_layanan_pendaftaran as lp 
				join sm_intensive_care as ri on (ri.id_layanan_pendaftaran = lp.id) 
				join sm_kelas as k on (k.id = ri.id_kelas) join sm_pendaftaran as pd on (pd.id = lp.id_pendaftaran) join sm_pasien as p on (p.id = pd.id_pasien) left join sm_penjamin as pj on (pj.id = lp.id_penjamin) left join sm_spesialisasi as sp on (sp.id = lp.id_unit_layanan) left join sm_tenaga_medis as tm on (tm.id = lp.id_dokter) left join sm_pegawai as pg on (pg.id = tm.id_pegawai) left join sm_translucent as tr on (tr.id = lp.id_users_sep) left join sm_order_intensive_care as odri on (odri.id_intensive_care = ri.id) left join sm_tenaga_medis as tmdpjp on (tmdpjp.id = odri.id_dokter_dpjp) left join sm_pegawai as pgdpjp on (pgdpjp.id = tmdpjp.id_pegawai)  where lp.jenis_layanan = 'Intensive Care'  order by ri.id desc  limit 10 offset -10
ERROR - 2025-03-05 20:16:03 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 20:16:03 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 20:16:52 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-03-05 20:21:45 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 20:21:45 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 20:21:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 20:21:57 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 20:21:59 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  update or delete on table &quot;sm_resep_r_detail&quot; violates foreign key constraint &quot;sm_rekonsiliasi_obat_id_detail_resep_fkey&quot; on table &quot;sm_rekonsiliasi_obat&quot;
DETAIL:  Key (id)=(6016190) is still referenced from table &quot;sm_rekonsiliasi_obat&quot;. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 20:21:59 --> Query error: ERROR:  update or delete on table "sm_resep_r_detail" violates foreign key constraint "sm_rekonsiliasi_obat_id_detail_resep_fkey" on table "sm_rekonsiliasi_obat"
DETAIL:  Key (id)=(6016190) is still referenced from table "sm_rekonsiliasi_obat". - Invalid query: DELETE FROM "sm_resep_r"
WHERE "id_resep" = '801003'
ERROR - 2025-03-05 20:22:24 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 20:22:24 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 20:22:43 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 20:22:43 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 20:22:46 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  update or delete on table &quot;sm_resep_r_detail&quot; violates foreign key constraint &quot;sm_rekonsiliasi_obat_id_detail_resep_fkey&quot; on table &quot;sm_rekonsiliasi_obat&quot;
DETAIL:  Key (id)=(6016190) is still referenced from table &quot;sm_rekonsiliasi_obat&quot;. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 20:22:46 --> Query error: ERROR:  update or delete on table "sm_resep_r_detail" violates foreign key constraint "sm_rekonsiliasi_obat_id_detail_resep_fkey" on table "sm_rekonsiliasi_obat"
DETAIL:  Key (id)=(6016190) is still referenced from table "sm_rekonsiliasi_obat". - Invalid query: DELETE FROM "sm_resep_r"
WHERE "id_resep" = '801003'
ERROR - 2025-03-05 20:23:01 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 20:23:01 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 20:23:06 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 20:23:06 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 20:23:08 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  update or delete on table &quot;sm_resep_r_detail&quot; violates foreign key constraint &quot;sm_rekonsiliasi_obat_id_detail_resep_fkey&quot; on table &quot;sm_rekonsiliasi_obat&quot;
DETAIL:  Key (id)=(6016190) is still referenced from table &quot;sm_rekonsiliasi_obat&quot;. /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 20:23:08 --> Query error: ERROR:  update or delete on table "sm_resep_r_detail" violates foreign key constraint "sm_rekonsiliasi_obat_id_detail_resep_fkey" on table "sm_rekonsiliasi_obat"
DETAIL:  Key (id)=(6016190) is still referenced from table "sm_rekonsiliasi_obat". - Invalid query: DELETE FROM "sm_resep_r"
WHERE "id_resep" = '801003'
ERROR - 2025-03-05 20:24:11 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 20:24:11 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 20:24:19 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 20:24:19 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 20:24:24 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...s&quot;) VALUES (5718578, '674', 5040, '8', '1.00', 'Ya', 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 20:24:24 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...s") VALUES (5718578, '674', 5040, '8', '1.00', 'Ya', 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (5718578, '674', 5040, '8', '1.00', 'Ya', 'null')
ERROR - 2025-03-05 20:24:42 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  missing FROM-clause entry for table &quot;bgic&quot;
LINE 1: ...') as no_ruang, coalesce(ri.no_bed, 0) as no_bed, &quot;bgic&quot;.&quot;id...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 20:24:42 --> Query error: ERROR:  missing FROM-clause entry for table "bgic"
LINE 1: ...') as no_ruang, coalesce(ri.no_bed, 0) as no_bed, "bgic"."id...
                                                             ^ - Invalid query: SELECT "lp".*, case when lp.jenis_layanan = 'IGD' then 'IGD' else sp.nama end as layanan, case when lp.cara_bayar = 'Tunai' then 'UMUM' else pj.nama end as status_pasien, coalesce(lp.no_antrian, 0) as no_antrian, coalesce(pj.nama, '') as penjamin, coalesce(pj.diskon, 0) as diskon, coalesce(pg.nama, '') as dokter, coalesce(i.nama, '') as instansi_perujuk, coalesce(bg.nama, '') as bangsal, coalesce(ri.no_ruang, '') as no_ruang, coalesce(ri.no_bed, 0) as no_bed, "bgic"."id" as "id_bangsal_ic", "k"."nama" as "kelas", "ri"."waktu_masuk", "ri"."waktu_keluar", "ri"."waktu_konfirmasi_ranap", "bg"."id" as "id_bangsal", "odri"."id_dokter_dpjp", coalesce(pgdpjp.nama, '') as dokter_dpjp, "u"."id" as "id_unit", "u"."nama" as "unit", "pd"."no_rujukan", "peg"."nama" as "petugas", "ins"."nama" as "instansi_merujuk", "pd"."keterangan_rujukan", ('') as before
FROM "sm_layanan_pendaftaran" as "lp"
JOIN "sm_pendaftaran" as "pd" ON "pd"."id" = "lp"."id_pendaftaran"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "lp"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
LEFT JOIN "sm_pegawai" as "peg" ON "peg"."id" = "lp"."id_users"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "lp"."id_unit_layanan"
LEFT JOIN "sm_penjamin" as "pj" ON "pj"."id" = "lp"."id_penjamin"
LEFT JOIN "sm_instansi" as "i" ON "i"."id" = "pd"."id_instansi_perujuk"
LEFT JOIN "sm_unit" as "u" ON "u"."id" = "sp"."id_unit"
LEFT JOIN "sm_rawat_inap" as "ri" ON "ri"."id_layanan_pendaftaran" = "lp"."id"
LEFT JOIN "sm_order_rawat_inap" as "odri" ON "odri"."id_rawat_inap" = "ri"."id"
LEFT JOIN "sm_tenaga_medis" as "tmdpjp" ON "tmdpjp"."id" = "odri"."id_dokter_dpjp"
LEFT JOIN "sm_pegawai" as "pgdpjp" ON "pgdpjp"."id" = "tmdpjp"."id_pegawai"
LEFT JOIN "sm_bangsal" as "bg" ON "bg"."id" = "ri"."id_bangsal"
LEFT JOIN "sm_kelas" as "k" ON "k"."id" = "ri"."id_kelas"
LEFT JOIN "sm_instansi" as "ins" ON "ins"."id" = "pd"."id_instansi_merujuk"
WHERE "lp"."id_pendaftaran" = '649814'
AND "lp"."id_pendaftaran" = '649814'
ORDER BY "lp"."id" ASC
ERROR - 2025-03-05 20:24:42 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 20:24:42 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 20:24:51 --> Severity: Notice  --> Trying to get property 'id_pendaftaran' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/salinan_resep/models/Salinan_resep_model.php 680
ERROR - 2025-03-05 20:26:12 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 20:33:21 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 20:33:21 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 20:38:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  missing FROM-clause entry for table &quot;bgic&quot;
LINE 1: ...') as no_ruang, coalesce(ri.no_bed, 0) as no_bed, &quot;bgic&quot;.&quot;id...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 20:38:57 --> Query error: ERROR:  missing FROM-clause entry for table "bgic"
LINE 1: ...') as no_ruang, coalesce(ri.no_bed, 0) as no_bed, "bgic"."id...
                                                             ^ - Invalid query: SELECT "lp".*, case when lp.jenis_layanan = 'IGD' then 'IGD' else sp.nama end as layanan, case when lp.cara_bayar = 'Tunai' then 'UMUM' else pj.nama end as status_pasien, coalesce(lp.no_antrian, 0) as no_antrian, coalesce(pj.nama, '') as penjamin, coalesce(pj.diskon, 0) as diskon, coalesce(pg.nama, '') as dokter, coalesce(i.nama, '') as instansi_perujuk, coalesce(bg.nama, '') as bangsal, coalesce(ri.no_ruang, '') as no_ruang, coalesce(ri.no_bed, 0) as no_bed, "bgic"."id" as "id_bangsal_ic", "k"."nama" as "kelas", "ri"."waktu_masuk", "ri"."waktu_keluar", "ri"."waktu_konfirmasi_ranap", "bg"."id" as "id_bangsal", "odri"."id_dokter_dpjp", coalesce(pgdpjp.nama, '') as dokter_dpjp, "u"."id" as "id_unit", "u"."nama" as "unit", "pd"."no_rujukan", "peg"."nama" as "petugas", "ins"."nama" as "instansi_merujuk", "pd"."keterangan_rujukan", ('') as before
FROM "sm_layanan_pendaftaran" as "lp"
JOIN "sm_pendaftaran" as "pd" ON "pd"."id" = "lp"."id_pendaftaran"
LEFT JOIN "sm_tenaga_medis" as "tm" ON "tm"."id" = "lp"."id_dokter"
LEFT JOIN "sm_pegawai" as "pg" ON "pg"."id" = "tm"."id_pegawai"
LEFT JOIN "sm_pegawai" as "peg" ON "peg"."id" = "lp"."id_users"
LEFT JOIN "sm_spesialisasi" as "sp" ON "sp"."id" = "lp"."id_unit_layanan"
LEFT JOIN "sm_penjamin" as "pj" ON "pj"."id" = "lp"."id_penjamin"
LEFT JOIN "sm_instansi" as "i" ON "i"."id" = "pd"."id_instansi_perujuk"
LEFT JOIN "sm_unit" as "u" ON "u"."id" = "sp"."id_unit"
LEFT JOIN "sm_rawat_inap" as "ri" ON "ri"."id_layanan_pendaftaran" = "lp"."id"
LEFT JOIN "sm_order_rawat_inap" as "odri" ON "odri"."id_rawat_inap" = "ri"."id"
LEFT JOIN "sm_tenaga_medis" as "tmdpjp" ON "tmdpjp"."id" = "odri"."id_dokter_dpjp"
LEFT JOIN "sm_pegawai" as "pgdpjp" ON "pgdpjp"."id" = "tmdpjp"."id_pegawai"
LEFT JOIN "sm_bangsal" as "bg" ON "bg"."id" = "ri"."id_bangsal"
LEFT JOIN "sm_kelas" as "k" ON "k"."id" = "ri"."id_kelas"
LEFT JOIN "sm_instansi" as "ins" ON "ins"."id" = "pd"."id_instansi_merujuk"
WHERE "lp"."id_pendaftaran" = '650531'
AND "lp"."id_pendaftaran" = '650531'
ORDER BY "lp"."id" ASC
ERROR - 2025-03-05 20:47:49 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 20:52:28 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-03-05 20:54:26 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 20:54:26 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 20:57:18 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 21:10:02 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 21:14:06 --> Severity: Notice  --> Undefined index: account_group /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/rawat_inap/views/js.php 1507
ERROR - 2025-03-05 21:16:18 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 21:20:59 --> Severity: Notice  --> Undefined variable: jenis /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/views/tindak_lanjut_form/modal_tindak_lanjut.php 24
ERROR - 2025-03-05 21:30:47 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 21:38:39 --> Severity: Notice  --> Trying to get property 'count' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/models/Masterdata_model.php 1796
ERROR - 2025-03-05 21:40:38 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-03-05 21:40:38 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-03-05 21:40:48 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 21:40:53 --> Severity: error  --> Exception: Call to undefined method CI_Exceptions::show_exception() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 752
ERROR - 2025-03-05 21:40:53 --> Severity: Error  --> Uncaught Error: Call to undefined method CI_Exceptions::show_exception() in /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php:668
Stack trace:
#0 [internal function]: _exception_handler(Object(Error))
#1 {main}
  thrown /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/core/Common.php 668
ERROR - 2025-03-05 21:43:50 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 21:44:02 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 21:44:02 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-03-05 21:44:02 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 21:44:02 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-03-05 22:00:44 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 16633
ERROR - 2025-03-05 22:00:51 --> Severity: Warning  --> Invalid argument supplied for foreach() /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/pelayanan/models/Pelayanan_model.php 16633
ERROR - 2025-03-05 22:02:05 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 22:02:05 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kecamatan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
ORDER BY "NAMA_KEC"
ERROR - 2025-03-05 22:02:05 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;null&quot;
LINE 4: AND &quot;NO_KAB&quot; = 'null'
                       ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 22:02:05 --> Query error: ERROR:  invalid input syntax for type integer: "null"
LINE 4: AND "NO_KAB" = 'null'
                       ^ - Invalid query: SELECT *
FROM "sm_opendata_kelurahan"
WHERE "NO_PROP" = '36'
AND "NO_KAB" = 'null'
AND "NO_KEC" = 'null'
ORDER BY "NAMA_KEL"
ERROR - 2025-03-05 22:02:57 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 22:02:57 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 22:05:01 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 22:05:01 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 22:05:28 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 22:20:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;-&quot;
LINE 1: ...L, NULL, '4', '6', '5', '15', '-', '-', '2', '2', '-', '-', ...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 22:20:36 --> Query error: ERROR:  invalid input syntax for type integer: "-"
LINE 1: ...L, NULL, '4', '6', '5', '15', '-', '-', '2', '2', '-', '-', ...
                                                             ^ - Invalid query: INSERT INTO "sm_transfer_pasien_intra" ("id_layanan_pendaftaran", "tpi_tanggal_masuk", "tpi_tanggal_pindah", "tpi_ruang_asal", "tpi_ruang_tujuan", "tpi_diagnosis_utama", "tpi_diagnosis_sekunder", "tpi_dpjp", "tpi_kewaspadaan", "tpi_riwayat_kewaspadan", "tpi_indikasi_masuk_rs", "tpi_riwayat_kesehatan", "tpi_pf_composmentis", "tpi_pf_apatis", "tpi_pf_samnolen", "tpi_pf_sopor", "tpi_pf_koma", "tpi_pf_gcs_e", "tpi_pf_gcs_m", "tpi_pf_gcs_v", "tpi_pf_gcs_total", "tpi_pf_afgar_score", "tpi_pf_djj", "tpi_pf_pupil_1", "tpi_pf_pupil_2", "tpi_pf_pupil_3", "tpi_pf_pupil_4", "tpi_pf_cdl", "tpi_pf_tanggal_cdl", "tpi_pf_tensi_sis", "tpi_pf_tensi_dis", "tpi_pf_suhu", "tpi_pf_nadi", "tpi_pf_nafas", "tpi_pf_alergi", "tpi_pf_riwayat_alergi", "tpi_pf_skala_nyeri_pasien", "tpi_pf_riwayat_nyeri_pasien", "tpi_pf_resiko_jatuh_pasien", "tpi_pf_riwayat_resiko_jatuh_pasien", "tpi_pf_mobilisasi_pasien", "tpi_pf_mobilisasi_pasien_transfer", "tpi_pf_resiko_dekubitus_pasien", "tpi_pf_riwayat_resiko_dekubitus_pasien", "tpi_pf_infus", "tpi_pf_tanggal_infus", "tpi_pf_ngt_pasien", "tpi_pf_tanggal_ngt", "tpi_pf_ett", "tpi_pf_tanggal_ett", "tpi_pf_cvc", "tpi_pf_tanggal_cvc", "tpi_pf_dc", "tpi_pf_tanggal_dc", "tpi_pf_lain", "tpi_pf_tanggal_lain", "tpi_pf_oksigen", "tpi_pf_keterangan_oksigen", "tpi_pf_pump", "tpi_pf_bidai", "tpi_pt_infus", "tpi_pt_obat", "tpi_pp_labolatorium", "tpi_pp_ket_labolatorium", "tpi_pp_radiologi", "tpi_pp_ket_radiologi", "tpi_pp_lainnya", "tpi_pp_ket_lainnya", "tpi_tm_tindakan_medis", "tpi_tm_rencana_tindakan", "tpi_kp_sebelum_composmentis", "tpi_kp_sebelum_apatis", "tpi_kp_sebelum_samnolen", "tpi_kp_sebelum_sopor", "tpi_kp_sebelum_koma", "tpi_kp_sebelum_gcs_e", "tpi_kp_sebelum_gcs_m", "tpi_kp_sebelum_gcs_v", "tpi_kp_sebelum_gcs_total", "tpi_kp_sebelum_catatan", "tpi_kp_perjalanan_masalah_selama_trasnfer", "tpi_kp_perjalanan_penanganan_masalah", "tpi_kp_sudah_composmentis", "tpi_kp_sudah_apatis", "tpi_kp_sudah_samnolen", "tpi_kp_sudah_sopor", "tpi_kp_sudah_koma", "tpi_kp_sudah_gcs_e", "tpi_kp_sudah_gcs_m", "tpi_kp_sudah_gcs_v", "tpi_kp_sudah_gcs_total", "tpi_kp_sudah_tensi_sis", "tpi_kp_sudah_tensi_dis", "tpi_kp_sudah_nadi", "tpi_kp_sudah_pernafasan", "tpi_kp_sudah_suhu", "tpi_kp_sudah_kondisi_pasien", "tpi_kp_sudah_nama_obat", "tpi_kp_sudah_ket_nama_obat", "tpi_kp_sudah_pemeriksaan_penunjang", "tpi_kp_sudah_ket_pemeriksaan_penunjang", "tpi_kp_sudah_catatan_penting", "tpi_kp_waktu_ttd_petugas_tf", "tpi_kp_waktu_ttd_petugas_penerima", "tpi_kp_petugas_tansfer", "tpi_kp_petugas_terima_transfer", "tpi_kp_ttd_petugas_transfer", "tpi_kp_ttd_petugas_terima_transfer", "tpi_st_sebelum_composmentis", "tpi_st_sebelum_apatis", "tpi_st_sebelum_samnolen", "tpi_st_sebelum_sopor", "tpi_st_sebelum_koma", "tpi_st_sebelum_gcs_e", "tpi_st_sebelum_gcs_m", "tpi_st_sebelum_gcs_v", "tpi_st_sebelum_gcs_total", "tpi_st_sebelum_tensi_sis", "tpi_st_sebelum_tensi_dis", "tpi_st_sebelum_nadi", "tpi_st_sebelum_pernafasan", "tpi_st_sebelum_suhu", "tpi_st_sebelum_catatan", "tpi_st_perjalanan_masalah_selama_transfer", "tpi_st_perjalanan_penanganan_masalah", "tpi_st_sudah_composmentis", "tpi_st_sudah_apatis", "tpi_st_sudah_samnolen", "tpi_st_sudah_sopor", "tpi_st_sudah_koma", "tpi_st_sudah_gcs_e", "tpi_st_sudah_gcs_m", "tpi_st_sudah_gcs_v", "tpi_st_sudah_gcs_total", "tpi_st_sudah_tensi_sis", "tpi_st_sudah_tensi_dis", "tpi_st_sudah_nadi", "tpi_st_sudah_pernafasan", "tpi_st_sudah_suhu", "tpi_st_sudah_kondisi_pasien", "tpi_st_sudah_nama_obat", "tpi_st_sudah_ket_nama_obat", "tpi_st_sudah_pemeriksaan_penunjang", "tpi_st_sudah_ket_pemeriksaan_penunjang", "tpi_st_sudah_catatan_penting", "tpi_st_waktu_ttd_petugas_tf", "tpi_st_waktu_ttd_petugas_penerima", "tpi_st_petugas_tansfer", "tpi_st_petugas_terima_transfer", "tpi_st_ttd_petugas_transfer", "tpi_st_ttd_petugas_terima_transfer") VALUES ('704811', '2025-03-05 11:00', '2025-03-06 00:00', 'JATI', 'Ok', 'Batu ureter dx ', 'TB Meningitis', '677', '1', NULL, 'Pro URS sd Uretrolitotomy', '-', '1', NULL, NULL, NULL, NULL, '4', '6', '5', '15', '-', '-', '2', '2', '-', '-', NULL, NULL, NULL, NULL, NULL, NULL, '18', '0', NULL, '0', NULL, '1', 'Ringan', '1', '1', '0', NULL, '1', '2025-03-05', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Venflon', 'Ceftriaxone 1 gr jam 09:00
Phenitoin 100mg ham 03:00', '1', '09/12/24', '1', 'Ct uro nk tgl 22/11/24, usg urologi tgl 15/11/24', NULL, NULL, 'Infus 
Phenitoin 100mg jam 03:00 
Ceftriaxone 1 gr jam 09:00', 'R/ URS sd uretrolitotomy kamis 6/3/25 jam 09:30 Ok (+) LIA SIA SIO (+) 
Toleransi operasi 
Dr. Arafah sp.an : acc operasi
Dr fitri spp : acc ringan 
Dr marcel sppd : acc ringan
Dr vinnie sp s : resiko sedang, phenitoin 100mg iv 6 jam sebelum operasi ', '1', NULL, NULL, NULL, NULL, '4', '6', '5', '15', 'Sedang pengobatan meningitis --&gt; phenitoin 
/2 hari tgl 7/3/25', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-03-06 00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-03-05 22:20:47 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;-&quot;
LINE 1: ...L, NULL, '4', '6', '5', '15', '-', '-', '2', '2', '-', '-', ...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 22:20:47 --> Query error: ERROR:  invalid input syntax for type integer: "-"
LINE 1: ...L, NULL, '4', '6', '5', '15', '-', '-', '2', '2', '-', '-', ...
                                                             ^ - Invalid query: INSERT INTO "sm_transfer_pasien_intra" ("id_layanan_pendaftaran", "tpi_tanggal_masuk", "tpi_tanggal_pindah", "tpi_ruang_asal", "tpi_ruang_tujuan", "tpi_diagnosis_utama", "tpi_diagnosis_sekunder", "tpi_dpjp", "tpi_kewaspadaan", "tpi_riwayat_kewaspadan", "tpi_indikasi_masuk_rs", "tpi_riwayat_kesehatan", "tpi_pf_composmentis", "tpi_pf_apatis", "tpi_pf_samnolen", "tpi_pf_sopor", "tpi_pf_koma", "tpi_pf_gcs_e", "tpi_pf_gcs_m", "tpi_pf_gcs_v", "tpi_pf_gcs_total", "tpi_pf_afgar_score", "tpi_pf_djj", "tpi_pf_pupil_1", "tpi_pf_pupil_2", "tpi_pf_pupil_3", "tpi_pf_pupil_4", "tpi_pf_cdl", "tpi_pf_tanggal_cdl", "tpi_pf_tensi_sis", "tpi_pf_tensi_dis", "tpi_pf_suhu", "tpi_pf_nadi", "tpi_pf_nafas", "tpi_pf_alergi", "tpi_pf_riwayat_alergi", "tpi_pf_skala_nyeri_pasien", "tpi_pf_riwayat_nyeri_pasien", "tpi_pf_resiko_jatuh_pasien", "tpi_pf_riwayat_resiko_jatuh_pasien", "tpi_pf_mobilisasi_pasien", "tpi_pf_mobilisasi_pasien_transfer", "tpi_pf_resiko_dekubitus_pasien", "tpi_pf_riwayat_resiko_dekubitus_pasien", "tpi_pf_infus", "tpi_pf_tanggal_infus", "tpi_pf_ngt_pasien", "tpi_pf_tanggal_ngt", "tpi_pf_ett", "tpi_pf_tanggal_ett", "tpi_pf_cvc", "tpi_pf_tanggal_cvc", "tpi_pf_dc", "tpi_pf_tanggal_dc", "tpi_pf_lain", "tpi_pf_tanggal_lain", "tpi_pf_oksigen", "tpi_pf_keterangan_oksigen", "tpi_pf_pump", "tpi_pf_bidai", "tpi_pt_infus", "tpi_pt_obat", "tpi_pp_labolatorium", "tpi_pp_ket_labolatorium", "tpi_pp_radiologi", "tpi_pp_ket_radiologi", "tpi_pp_lainnya", "tpi_pp_ket_lainnya", "tpi_tm_tindakan_medis", "tpi_tm_rencana_tindakan", "tpi_kp_sebelum_composmentis", "tpi_kp_sebelum_apatis", "tpi_kp_sebelum_samnolen", "tpi_kp_sebelum_sopor", "tpi_kp_sebelum_koma", "tpi_kp_sebelum_gcs_e", "tpi_kp_sebelum_gcs_m", "tpi_kp_sebelum_gcs_v", "tpi_kp_sebelum_gcs_total", "tpi_kp_sebelum_catatan", "tpi_kp_perjalanan_masalah_selama_trasnfer", "tpi_kp_perjalanan_penanganan_masalah", "tpi_kp_sudah_composmentis", "tpi_kp_sudah_apatis", "tpi_kp_sudah_samnolen", "tpi_kp_sudah_sopor", "tpi_kp_sudah_koma", "tpi_kp_sudah_gcs_e", "tpi_kp_sudah_gcs_m", "tpi_kp_sudah_gcs_v", "tpi_kp_sudah_gcs_total", "tpi_kp_sudah_tensi_sis", "tpi_kp_sudah_tensi_dis", "tpi_kp_sudah_nadi", "tpi_kp_sudah_pernafasan", "tpi_kp_sudah_suhu", "tpi_kp_sudah_kondisi_pasien", "tpi_kp_sudah_nama_obat", "tpi_kp_sudah_ket_nama_obat", "tpi_kp_sudah_pemeriksaan_penunjang", "tpi_kp_sudah_ket_pemeriksaan_penunjang", "tpi_kp_sudah_catatan_penting", "tpi_kp_waktu_ttd_petugas_tf", "tpi_kp_waktu_ttd_petugas_penerima", "tpi_kp_petugas_tansfer", "tpi_kp_petugas_terima_transfer", "tpi_kp_ttd_petugas_transfer", "tpi_kp_ttd_petugas_terima_transfer", "tpi_st_sebelum_composmentis", "tpi_st_sebelum_apatis", "tpi_st_sebelum_samnolen", "tpi_st_sebelum_sopor", "tpi_st_sebelum_koma", "tpi_st_sebelum_gcs_e", "tpi_st_sebelum_gcs_m", "tpi_st_sebelum_gcs_v", "tpi_st_sebelum_gcs_total", "tpi_st_sebelum_tensi_sis", "tpi_st_sebelum_tensi_dis", "tpi_st_sebelum_nadi", "tpi_st_sebelum_pernafasan", "tpi_st_sebelum_suhu", "tpi_st_sebelum_catatan", "tpi_st_perjalanan_masalah_selama_transfer", "tpi_st_perjalanan_penanganan_masalah", "tpi_st_sudah_composmentis", "tpi_st_sudah_apatis", "tpi_st_sudah_samnolen", "tpi_st_sudah_sopor", "tpi_st_sudah_koma", "tpi_st_sudah_gcs_e", "tpi_st_sudah_gcs_m", "tpi_st_sudah_gcs_v", "tpi_st_sudah_gcs_total", "tpi_st_sudah_tensi_sis", "tpi_st_sudah_tensi_dis", "tpi_st_sudah_nadi", "tpi_st_sudah_pernafasan", "tpi_st_sudah_suhu", "tpi_st_sudah_kondisi_pasien", "tpi_st_sudah_nama_obat", "tpi_st_sudah_ket_nama_obat", "tpi_st_sudah_pemeriksaan_penunjang", "tpi_st_sudah_ket_pemeriksaan_penunjang", "tpi_st_sudah_catatan_penting", "tpi_st_waktu_ttd_petugas_tf", "tpi_st_waktu_ttd_petugas_penerima", "tpi_st_petugas_tansfer", "tpi_st_petugas_terima_transfer", "tpi_st_ttd_petugas_transfer", "tpi_st_ttd_petugas_terima_transfer") VALUES ('704811', '2025-03-05 11:00', '2025-03-06 00:00', 'JATI', 'Ok', 'Batu ureter dx ', 'TB Meningitis', '677', '1', NULL, 'Pro URS sd Uretrolitotomy', '-', '1', NULL, NULL, NULL, NULL, '4', '6', '5', '15', '-', '-', '2', '2', '-', '-', NULL, NULL, NULL, NULL, NULL, NULL, '18', '0', NULL, '0', NULL, '1', 'Ringan', '1', '1', '0', NULL, '1', '2025-03-05', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Venflon', 'Ceftriaxone 1 gr jam 09:00
Phenitoin 100mg ham 03:00', '1', '09/12/24', '1', 'Ct uro nk tgl 22/11/24, usg urologi tgl 15/11/24', NULL, NULL, 'Infus 
Phenitoin 100mg jam 03:00 
Ceftriaxone 1 gr jam 09:00', 'R/ URS sd uretrolitotomy kamis 6/3/25 jam 09:30 Ok (+) LIA SIA SIO (+) 
Toleransi operasi 
Dr. Arafah sp.an : acc operasi
Dr fitri spp : acc ringan 
Dr marcel sppd : acc ringan
Dr vinnie sp s : resiko sedang, phenitoin 100mg iv 6 jam sebelum operasi ', '1', NULL, NULL, NULL, NULL, '4', '6', '5', '15', 'Sedang pengobatan meningitis --&gt; phenitoin 
/2 hari tgl 7/3/25', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-03-05 22:21:21 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;-&quot;
LINE 1: ...L, NULL, '4', '6', '5', '15', '-', '-', '2', '2', '-', '-', ...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 22:21:21 --> Query error: ERROR:  invalid input syntax for type integer: "-"
LINE 1: ...L, NULL, '4', '6', '5', '15', '-', '-', '2', '2', '-', '-', ...
                                                             ^ - Invalid query: INSERT INTO "sm_transfer_pasien_intra" ("id_layanan_pendaftaran", "tpi_tanggal_masuk", "tpi_tanggal_pindah", "tpi_ruang_asal", "tpi_ruang_tujuan", "tpi_diagnosis_utama", "tpi_diagnosis_sekunder", "tpi_dpjp", "tpi_kewaspadaan", "tpi_riwayat_kewaspadan", "tpi_indikasi_masuk_rs", "tpi_riwayat_kesehatan", "tpi_pf_composmentis", "tpi_pf_apatis", "tpi_pf_samnolen", "tpi_pf_sopor", "tpi_pf_koma", "tpi_pf_gcs_e", "tpi_pf_gcs_m", "tpi_pf_gcs_v", "tpi_pf_gcs_total", "tpi_pf_afgar_score", "tpi_pf_djj", "tpi_pf_pupil_1", "tpi_pf_pupil_2", "tpi_pf_pupil_3", "tpi_pf_pupil_4", "tpi_pf_cdl", "tpi_pf_tanggal_cdl", "tpi_pf_tensi_sis", "tpi_pf_tensi_dis", "tpi_pf_suhu", "tpi_pf_nadi", "tpi_pf_nafas", "tpi_pf_alergi", "tpi_pf_riwayat_alergi", "tpi_pf_skala_nyeri_pasien", "tpi_pf_riwayat_nyeri_pasien", "tpi_pf_resiko_jatuh_pasien", "tpi_pf_riwayat_resiko_jatuh_pasien", "tpi_pf_mobilisasi_pasien", "tpi_pf_mobilisasi_pasien_transfer", "tpi_pf_resiko_dekubitus_pasien", "tpi_pf_riwayat_resiko_dekubitus_pasien", "tpi_pf_infus", "tpi_pf_tanggal_infus", "tpi_pf_ngt_pasien", "tpi_pf_tanggal_ngt", "tpi_pf_ett", "tpi_pf_tanggal_ett", "tpi_pf_cvc", "tpi_pf_tanggal_cvc", "tpi_pf_dc", "tpi_pf_tanggal_dc", "tpi_pf_lain", "tpi_pf_tanggal_lain", "tpi_pf_oksigen", "tpi_pf_keterangan_oksigen", "tpi_pf_pump", "tpi_pf_bidai", "tpi_pt_infus", "tpi_pt_obat", "tpi_pp_labolatorium", "tpi_pp_ket_labolatorium", "tpi_pp_radiologi", "tpi_pp_ket_radiologi", "tpi_pp_lainnya", "tpi_pp_ket_lainnya", "tpi_tm_tindakan_medis", "tpi_tm_rencana_tindakan", "tpi_kp_sebelum_composmentis", "tpi_kp_sebelum_apatis", "tpi_kp_sebelum_samnolen", "tpi_kp_sebelum_sopor", "tpi_kp_sebelum_koma", "tpi_kp_sebelum_gcs_e", "tpi_kp_sebelum_gcs_m", "tpi_kp_sebelum_gcs_v", "tpi_kp_sebelum_gcs_total", "tpi_kp_sebelum_catatan", "tpi_kp_perjalanan_masalah_selama_trasnfer", "tpi_kp_perjalanan_penanganan_masalah", "tpi_kp_sudah_composmentis", "tpi_kp_sudah_apatis", "tpi_kp_sudah_samnolen", "tpi_kp_sudah_sopor", "tpi_kp_sudah_koma", "tpi_kp_sudah_gcs_e", "tpi_kp_sudah_gcs_m", "tpi_kp_sudah_gcs_v", "tpi_kp_sudah_gcs_total", "tpi_kp_sudah_tensi_sis", "tpi_kp_sudah_tensi_dis", "tpi_kp_sudah_nadi", "tpi_kp_sudah_pernafasan", "tpi_kp_sudah_suhu", "tpi_kp_sudah_kondisi_pasien", "tpi_kp_sudah_nama_obat", "tpi_kp_sudah_ket_nama_obat", "tpi_kp_sudah_pemeriksaan_penunjang", "tpi_kp_sudah_ket_pemeriksaan_penunjang", "tpi_kp_sudah_catatan_penting", "tpi_kp_waktu_ttd_petugas_tf", "tpi_kp_waktu_ttd_petugas_penerima", "tpi_kp_petugas_tansfer", "tpi_kp_petugas_terima_transfer", "tpi_kp_ttd_petugas_transfer", "tpi_kp_ttd_petugas_terima_transfer", "tpi_st_sebelum_composmentis", "tpi_st_sebelum_apatis", "tpi_st_sebelum_samnolen", "tpi_st_sebelum_sopor", "tpi_st_sebelum_koma", "tpi_st_sebelum_gcs_e", "tpi_st_sebelum_gcs_m", "tpi_st_sebelum_gcs_v", "tpi_st_sebelum_gcs_total", "tpi_st_sebelum_tensi_sis", "tpi_st_sebelum_tensi_dis", "tpi_st_sebelum_nadi", "tpi_st_sebelum_pernafasan", "tpi_st_sebelum_suhu", "tpi_st_sebelum_catatan", "tpi_st_perjalanan_masalah_selama_transfer", "tpi_st_perjalanan_penanganan_masalah", "tpi_st_sudah_composmentis", "tpi_st_sudah_apatis", "tpi_st_sudah_samnolen", "tpi_st_sudah_sopor", "tpi_st_sudah_koma", "tpi_st_sudah_gcs_e", "tpi_st_sudah_gcs_m", "tpi_st_sudah_gcs_v", "tpi_st_sudah_gcs_total", "tpi_st_sudah_tensi_sis", "tpi_st_sudah_tensi_dis", "tpi_st_sudah_nadi", "tpi_st_sudah_pernafasan", "tpi_st_sudah_suhu", "tpi_st_sudah_kondisi_pasien", "tpi_st_sudah_nama_obat", "tpi_st_sudah_ket_nama_obat", "tpi_st_sudah_pemeriksaan_penunjang", "tpi_st_sudah_ket_pemeriksaan_penunjang", "tpi_st_sudah_catatan_penting", "tpi_st_waktu_ttd_petugas_tf", "tpi_st_waktu_ttd_petugas_penerima", "tpi_st_petugas_tansfer", "tpi_st_petugas_terima_transfer", "tpi_st_ttd_petugas_transfer", "tpi_st_ttd_petugas_terima_transfer") VALUES ('704811', '2025-03-05 11:00', '2025-03-06 00:00', 'JATI', 'Ok', 'Batu ureter dx ', 'TB Meningitis', '677', '1', NULL, 'Pro URS sd Uretrolitotomy', '-', '1', NULL, NULL, NULL, NULL, '4', '6', '5', '15', '-', '-', '2', '2', '-', '-', NULL, NULL, NULL, NULL, NULL, NULL, '18', '0', NULL, '0', NULL, '1', 'Ringan', '1', '1', '0', NULL, '1', '2025-03-05', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Venflon', 'Ceftriaxone 1 gr jam 09:00
Phenitoin 100mg ham 03:00', '1', '09/12/24', '1', 'Ct uro nk tgl 22/11/24, usg urologi tgl 15/11/24', NULL, NULL, 'Infus 
Phenitoin 100mg jam 03:00 
Ceftriaxone 1 gr jam 09:00', 'R/ URS sd uretrolitotomy kamis 6/3/25 jam 09:30 Ok (+) LIA SIA SIO (+) 
Toleransi operasi 
Dr. Arafah sp.an : acc operasi
Dr fitri spp : acc ringan 
Dr marcel sppd : acc ringan
Dr vinnie sp s : resiko sedang, phenitoin 100mg iv 6 jam sebelum operasi ', '1', NULL, NULL, NULL, NULL, '4', '6', '5', '15', 'Sedang pengobatan meningitis --&gt; phenitoin 
/2 hari tgl 7/3/25', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-03-05 22:21:30 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;-&quot;
LINE 1: ...L, NULL, '4', '6', '5', '15', '-', '-', '2', '2', '-', '-', ...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 22:21:30 --> Query error: ERROR:  invalid input syntax for type integer: "-"
LINE 1: ...L, NULL, '4', '6', '5', '15', '-', '-', '2', '2', '-', '-', ...
                                                             ^ - Invalid query: INSERT INTO "sm_transfer_pasien_intra" ("id_layanan_pendaftaran", "tpi_tanggal_masuk", "tpi_tanggal_pindah", "tpi_ruang_asal", "tpi_ruang_tujuan", "tpi_diagnosis_utama", "tpi_diagnosis_sekunder", "tpi_dpjp", "tpi_kewaspadaan", "tpi_riwayat_kewaspadan", "tpi_indikasi_masuk_rs", "tpi_riwayat_kesehatan", "tpi_pf_composmentis", "tpi_pf_apatis", "tpi_pf_samnolen", "tpi_pf_sopor", "tpi_pf_koma", "tpi_pf_gcs_e", "tpi_pf_gcs_m", "tpi_pf_gcs_v", "tpi_pf_gcs_total", "tpi_pf_afgar_score", "tpi_pf_djj", "tpi_pf_pupil_1", "tpi_pf_pupil_2", "tpi_pf_pupil_3", "tpi_pf_pupil_4", "tpi_pf_cdl", "tpi_pf_tanggal_cdl", "tpi_pf_tensi_sis", "tpi_pf_tensi_dis", "tpi_pf_suhu", "tpi_pf_nadi", "tpi_pf_nafas", "tpi_pf_alergi", "tpi_pf_riwayat_alergi", "tpi_pf_skala_nyeri_pasien", "tpi_pf_riwayat_nyeri_pasien", "tpi_pf_resiko_jatuh_pasien", "tpi_pf_riwayat_resiko_jatuh_pasien", "tpi_pf_mobilisasi_pasien", "tpi_pf_mobilisasi_pasien_transfer", "tpi_pf_resiko_dekubitus_pasien", "tpi_pf_riwayat_resiko_dekubitus_pasien", "tpi_pf_infus", "tpi_pf_tanggal_infus", "tpi_pf_ngt_pasien", "tpi_pf_tanggal_ngt", "tpi_pf_ett", "tpi_pf_tanggal_ett", "tpi_pf_cvc", "tpi_pf_tanggal_cvc", "tpi_pf_dc", "tpi_pf_tanggal_dc", "tpi_pf_lain", "tpi_pf_tanggal_lain", "tpi_pf_oksigen", "tpi_pf_keterangan_oksigen", "tpi_pf_pump", "tpi_pf_bidai", "tpi_pt_infus", "tpi_pt_obat", "tpi_pp_labolatorium", "tpi_pp_ket_labolatorium", "tpi_pp_radiologi", "tpi_pp_ket_radiologi", "tpi_pp_lainnya", "tpi_pp_ket_lainnya", "tpi_tm_tindakan_medis", "tpi_tm_rencana_tindakan", "tpi_kp_sebelum_composmentis", "tpi_kp_sebelum_apatis", "tpi_kp_sebelum_samnolen", "tpi_kp_sebelum_sopor", "tpi_kp_sebelum_koma", "tpi_kp_sebelum_gcs_e", "tpi_kp_sebelum_gcs_m", "tpi_kp_sebelum_gcs_v", "tpi_kp_sebelum_gcs_total", "tpi_kp_sebelum_catatan", "tpi_kp_perjalanan_masalah_selama_trasnfer", "tpi_kp_perjalanan_penanganan_masalah", "tpi_kp_sudah_composmentis", "tpi_kp_sudah_apatis", "tpi_kp_sudah_samnolen", "tpi_kp_sudah_sopor", "tpi_kp_sudah_koma", "tpi_kp_sudah_gcs_e", "tpi_kp_sudah_gcs_m", "tpi_kp_sudah_gcs_v", "tpi_kp_sudah_gcs_total", "tpi_kp_sudah_tensi_sis", "tpi_kp_sudah_tensi_dis", "tpi_kp_sudah_nadi", "tpi_kp_sudah_pernafasan", "tpi_kp_sudah_suhu", "tpi_kp_sudah_kondisi_pasien", "tpi_kp_sudah_nama_obat", "tpi_kp_sudah_ket_nama_obat", "tpi_kp_sudah_pemeriksaan_penunjang", "tpi_kp_sudah_ket_pemeriksaan_penunjang", "tpi_kp_sudah_catatan_penting", "tpi_kp_waktu_ttd_petugas_tf", "tpi_kp_waktu_ttd_petugas_penerima", "tpi_kp_petugas_tansfer", "tpi_kp_petugas_terima_transfer", "tpi_kp_ttd_petugas_transfer", "tpi_kp_ttd_petugas_terima_transfer", "tpi_st_sebelum_composmentis", "tpi_st_sebelum_apatis", "tpi_st_sebelum_samnolen", "tpi_st_sebelum_sopor", "tpi_st_sebelum_koma", "tpi_st_sebelum_gcs_e", "tpi_st_sebelum_gcs_m", "tpi_st_sebelum_gcs_v", "tpi_st_sebelum_gcs_total", "tpi_st_sebelum_tensi_sis", "tpi_st_sebelum_tensi_dis", "tpi_st_sebelum_nadi", "tpi_st_sebelum_pernafasan", "tpi_st_sebelum_suhu", "tpi_st_sebelum_catatan", "tpi_st_perjalanan_masalah_selama_transfer", "tpi_st_perjalanan_penanganan_masalah", "tpi_st_sudah_composmentis", "tpi_st_sudah_apatis", "tpi_st_sudah_samnolen", "tpi_st_sudah_sopor", "tpi_st_sudah_koma", "tpi_st_sudah_gcs_e", "tpi_st_sudah_gcs_m", "tpi_st_sudah_gcs_v", "tpi_st_sudah_gcs_total", "tpi_st_sudah_tensi_sis", "tpi_st_sudah_tensi_dis", "tpi_st_sudah_nadi", "tpi_st_sudah_pernafasan", "tpi_st_sudah_suhu", "tpi_st_sudah_kondisi_pasien", "tpi_st_sudah_nama_obat", "tpi_st_sudah_ket_nama_obat", "tpi_st_sudah_pemeriksaan_penunjang", "tpi_st_sudah_ket_pemeriksaan_penunjang", "tpi_st_sudah_catatan_penting", "tpi_st_waktu_ttd_petugas_tf", "tpi_st_waktu_ttd_petugas_penerima", "tpi_st_petugas_tansfer", "tpi_st_petugas_terima_transfer", "tpi_st_ttd_petugas_transfer", "tpi_st_ttd_petugas_terima_transfer") VALUES ('704811', '2025-03-05 11:00', '2025-03-06 00:00', 'JATI', 'Ok', 'Batu ureter dx ', 'TB Meningitis', '677', '1', NULL, 'Pro URS sd Uretrolitotomy', '-', '1', NULL, NULL, NULL, NULL, '4', '6', '5', '15', '-', '-', '2', '2', '-', '-', NULL, NULL, NULL, NULL, NULL, NULL, '18', '0', NULL, '0', NULL, '1', 'Ringan', '1', '1', '0', NULL, '1', '2025-03-05', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Venflon', 'Ceftriaxone 1 gr jam 09:00
Phenitoin 100mg ham 03:00', '1', '09/12/24', '1', 'Ct uro nk tgl 22/11/24, usg urologi tgl 15/11/24', NULL, NULL, 'Infus 
Phenitoin 100mg jam 03:00 
Ceftriaxone 1 gr jam 09:00', 'R/ URS sd uretrolitotomy kamis 6/3/25 jam 09:30 Ok (+) LIA SIA SIO (+) 
Toleransi operasi 
Dr. Arafah sp.an : acc operasi
Dr fitri spp : acc ringan 
Dr marcel sppd : acc ringan
Dr vinnie sp s : resiko sedang, phenitoin 100mg iv 6 jam sebelum operasi ', '1', NULL, NULL, NULL, NULL, '4', '6', '5', '15', 'Sedang pengobatan meningitis --&gt; phenitoin 
/2 hari tgl 7/3/25', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-03-05 22:21:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;-&quot;
LINE 1: ...L, NULL, '4', '6', '5', '15', '-', '-', '2', '2', '-', '-', ...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 22:21:36 --> Query error: ERROR:  invalid input syntax for type integer: "-"
LINE 1: ...L, NULL, '4', '6', '5', '15', '-', '-', '2', '2', '-', '-', ...
                                                             ^ - Invalid query: INSERT INTO "sm_transfer_pasien_intra" ("id_layanan_pendaftaran", "tpi_tanggal_masuk", "tpi_tanggal_pindah", "tpi_ruang_asal", "tpi_ruang_tujuan", "tpi_diagnosis_utama", "tpi_diagnosis_sekunder", "tpi_dpjp", "tpi_kewaspadaan", "tpi_riwayat_kewaspadan", "tpi_indikasi_masuk_rs", "tpi_riwayat_kesehatan", "tpi_pf_composmentis", "tpi_pf_apatis", "tpi_pf_samnolen", "tpi_pf_sopor", "tpi_pf_koma", "tpi_pf_gcs_e", "tpi_pf_gcs_m", "tpi_pf_gcs_v", "tpi_pf_gcs_total", "tpi_pf_afgar_score", "tpi_pf_djj", "tpi_pf_pupil_1", "tpi_pf_pupil_2", "tpi_pf_pupil_3", "tpi_pf_pupil_4", "tpi_pf_cdl", "tpi_pf_tanggal_cdl", "tpi_pf_tensi_sis", "tpi_pf_tensi_dis", "tpi_pf_suhu", "tpi_pf_nadi", "tpi_pf_nafas", "tpi_pf_alergi", "tpi_pf_riwayat_alergi", "tpi_pf_skala_nyeri_pasien", "tpi_pf_riwayat_nyeri_pasien", "tpi_pf_resiko_jatuh_pasien", "tpi_pf_riwayat_resiko_jatuh_pasien", "tpi_pf_mobilisasi_pasien", "tpi_pf_mobilisasi_pasien_transfer", "tpi_pf_resiko_dekubitus_pasien", "tpi_pf_riwayat_resiko_dekubitus_pasien", "tpi_pf_infus", "tpi_pf_tanggal_infus", "tpi_pf_ngt_pasien", "tpi_pf_tanggal_ngt", "tpi_pf_ett", "tpi_pf_tanggal_ett", "tpi_pf_cvc", "tpi_pf_tanggal_cvc", "tpi_pf_dc", "tpi_pf_tanggal_dc", "tpi_pf_lain", "tpi_pf_tanggal_lain", "tpi_pf_oksigen", "tpi_pf_keterangan_oksigen", "tpi_pf_pump", "tpi_pf_bidai", "tpi_pt_infus", "tpi_pt_obat", "tpi_pp_labolatorium", "tpi_pp_ket_labolatorium", "tpi_pp_radiologi", "tpi_pp_ket_radiologi", "tpi_pp_lainnya", "tpi_pp_ket_lainnya", "tpi_tm_tindakan_medis", "tpi_tm_rencana_tindakan", "tpi_kp_sebelum_composmentis", "tpi_kp_sebelum_apatis", "tpi_kp_sebelum_samnolen", "tpi_kp_sebelum_sopor", "tpi_kp_sebelum_koma", "tpi_kp_sebelum_gcs_e", "tpi_kp_sebelum_gcs_m", "tpi_kp_sebelum_gcs_v", "tpi_kp_sebelum_gcs_total", "tpi_kp_sebelum_catatan", "tpi_kp_perjalanan_masalah_selama_trasnfer", "tpi_kp_perjalanan_penanganan_masalah", "tpi_kp_sudah_composmentis", "tpi_kp_sudah_apatis", "tpi_kp_sudah_samnolen", "tpi_kp_sudah_sopor", "tpi_kp_sudah_koma", "tpi_kp_sudah_gcs_e", "tpi_kp_sudah_gcs_m", "tpi_kp_sudah_gcs_v", "tpi_kp_sudah_gcs_total", "tpi_kp_sudah_tensi_sis", "tpi_kp_sudah_tensi_dis", "tpi_kp_sudah_nadi", "tpi_kp_sudah_pernafasan", "tpi_kp_sudah_suhu", "tpi_kp_sudah_kondisi_pasien", "tpi_kp_sudah_nama_obat", "tpi_kp_sudah_ket_nama_obat", "tpi_kp_sudah_pemeriksaan_penunjang", "tpi_kp_sudah_ket_pemeriksaan_penunjang", "tpi_kp_sudah_catatan_penting", "tpi_kp_waktu_ttd_petugas_tf", "tpi_kp_waktu_ttd_petugas_penerima", "tpi_kp_petugas_tansfer", "tpi_kp_petugas_terima_transfer", "tpi_kp_ttd_petugas_transfer", "tpi_kp_ttd_petugas_terima_transfer", "tpi_st_sebelum_composmentis", "tpi_st_sebelum_apatis", "tpi_st_sebelum_samnolen", "tpi_st_sebelum_sopor", "tpi_st_sebelum_koma", "tpi_st_sebelum_gcs_e", "tpi_st_sebelum_gcs_m", "tpi_st_sebelum_gcs_v", "tpi_st_sebelum_gcs_total", "tpi_st_sebelum_tensi_sis", "tpi_st_sebelum_tensi_dis", "tpi_st_sebelum_nadi", "tpi_st_sebelum_pernafasan", "tpi_st_sebelum_suhu", "tpi_st_sebelum_catatan", "tpi_st_perjalanan_masalah_selama_transfer", "tpi_st_perjalanan_penanganan_masalah", "tpi_st_sudah_composmentis", "tpi_st_sudah_apatis", "tpi_st_sudah_samnolen", "tpi_st_sudah_sopor", "tpi_st_sudah_koma", "tpi_st_sudah_gcs_e", "tpi_st_sudah_gcs_m", "tpi_st_sudah_gcs_v", "tpi_st_sudah_gcs_total", "tpi_st_sudah_tensi_sis", "tpi_st_sudah_tensi_dis", "tpi_st_sudah_nadi", "tpi_st_sudah_pernafasan", "tpi_st_sudah_suhu", "tpi_st_sudah_kondisi_pasien", "tpi_st_sudah_nama_obat", "tpi_st_sudah_ket_nama_obat", "tpi_st_sudah_pemeriksaan_penunjang", "tpi_st_sudah_ket_pemeriksaan_penunjang", "tpi_st_sudah_catatan_penting", "tpi_st_waktu_ttd_petugas_tf", "tpi_st_waktu_ttd_petugas_penerima", "tpi_st_petugas_tansfer", "tpi_st_petugas_terima_transfer", "tpi_st_ttd_petugas_transfer", "tpi_st_ttd_petugas_terima_transfer") VALUES ('704811', '2025-03-05 11:00', NULL, 'JATI', 'Ok', 'Batu ureter dx ', 'TB Meningitis', '677', '1', NULL, 'Pro URS sd Uretrolitotomy', '-', '1', NULL, NULL, NULL, NULL, '4', '6', '5', '15', '-', '-', '2', '2', '-', '-', NULL, NULL, NULL, NULL, NULL, NULL, '18', '0', NULL, '0', NULL, '1', 'Ringan', '1', '1', '0', NULL, '1', '2025-03-05', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Venflon', 'Ceftriaxone 1 gr jam 09:00
Phenitoin 100mg ham 03:00', '1', '09/12/24', '1', 'Ct uro nk tgl 22/11/24, usg urologi tgl 15/11/24', NULL, NULL, 'Infus 
Phenitoin 100mg jam 03:00 
Ceftriaxone 1 gr jam 09:00', 'R/ URS sd uretrolitotomy kamis 6/3/25 jam 09:30 Ok (+) LIA SIA SIO (+) 
Toleransi operasi 
Dr. Arafah sp.an : acc operasi
Dr fitri spp : acc ringan 
Dr marcel sppd : acc ringan
Dr vinnie sp s : resiko sedang, phenitoin 100mg iv 6 jam sebelum operasi ', '1', NULL, NULL, NULL, NULL, '4', '6', '5', '15', 'Sedang pengobatan meningitis --&gt; phenitoin 
/2 hari tgl 7/3/25', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-03-05 22:21:42 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;-&quot;
LINE 1: ...L, NULL, '4', '6', '5', '15', '-', '-', '2', '2', '-', '-', ...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 22:21:42 --> Query error: ERROR:  invalid input syntax for type integer: "-"
LINE 1: ...L, NULL, '4', '6', '5', '15', '-', '-', '2', '2', '-', '-', ...
                                                             ^ - Invalid query: INSERT INTO "sm_transfer_pasien_intra" ("id_layanan_pendaftaran", "tpi_tanggal_masuk", "tpi_tanggal_pindah", "tpi_ruang_asal", "tpi_ruang_tujuan", "tpi_diagnosis_utama", "tpi_diagnosis_sekunder", "tpi_dpjp", "tpi_kewaspadaan", "tpi_riwayat_kewaspadan", "tpi_indikasi_masuk_rs", "tpi_riwayat_kesehatan", "tpi_pf_composmentis", "tpi_pf_apatis", "tpi_pf_samnolen", "tpi_pf_sopor", "tpi_pf_koma", "tpi_pf_gcs_e", "tpi_pf_gcs_m", "tpi_pf_gcs_v", "tpi_pf_gcs_total", "tpi_pf_afgar_score", "tpi_pf_djj", "tpi_pf_pupil_1", "tpi_pf_pupil_2", "tpi_pf_pupil_3", "tpi_pf_pupil_4", "tpi_pf_cdl", "tpi_pf_tanggal_cdl", "tpi_pf_tensi_sis", "tpi_pf_tensi_dis", "tpi_pf_suhu", "tpi_pf_nadi", "tpi_pf_nafas", "tpi_pf_alergi", "tpi_pf_riwayat_alergi", "tpi_pf_skala_nyeri_pasien", "tpi_pf_riwayat_nyeri_pasien", "tpi_pf_resiko_jatuh_pasien", "tpi_pf_riwayat_resiko_jatuh_pasien", "tpi_pf_mobilisasi_pasien", "tpi_pf_mobilisasi_pasien_transfer", "tpi_pf_resiko_dekubitus_pasien", "tpi_pf_riwayat_resiko_dekubitus_pasien", "tpi_pf_infus", "tpi_pf_tanggal_infus", "tpi_pf_ngt_pasien", "tpi_pf_tanggal_ngt", "tpi_pf_ett", "tpi_pf_tanggal_ett", "tpi_pf_cvc", "tpi_pf_tanggal_cvc", "tpi_pf_dc", "tpi_pf_tanggal_dc", "tpi_pf_lain", "tpi_pf_tanggal_lain", "tpi_pf_oksigen", "tpi_pf_keterangan_oksigen", "tpi_pf_pump", "tpi_pf_bidai", "tpi_pt_infus", "tpi_pt_obat", "tpi_pp_labolatorium", "tpi_pp_ket_labolatorium", "tpi_pp_radiologi", "tpi_pp_ket_radiologi", "tpi_pp_lainnya", "tpi_pp_ket_lainnya", "tpi_tm_tindakan_medis", "tpi_tm_rencana_tindakan", "tpi_kp_sebelum_composmentis", "tpi_kp_sebelum_apatis", "tpi_kp_sebelum_samnolen", "tpi_kp_sebelum_sopor", "tpi_kp_sebelum_koma", "tpi_kp_sebelum_gcs_e", "tpi_kp_sebelum_gcs_m", "tpi_kp_sebelum_gcs_v", "tpi_kp_sebelum_gcs_total", "tpi_kp_sebelum_catatan", "tpi_kp_perjalanan_masalah_selama_trasnfer", "tpi_kp_perjalanan_penanganan_masalah", "tpi_kp_sudah_composmentis", "tpi_kp_sudah_apatis", "tpi_kp_sudah_samnolen", "tpi_kp_sudah_sopor", "tpi_kp_sudah_koma", "tpi_kp_sudah_gcs_e", "tpi_kp_sudah_gcs_m", "tpi_kp_sudah_gcs_v", "tpi_kp_sudah_gcs_total", "tpi_kp_sudah_tensi_sis", "tpi_kp_sudah_tensi_dis", "tpi_kp_sudah_nadi", "tpi_kp_sudah_pernafasan", "tpi_kp_sudah_suhu", "tpi_kp_sudah_kondisi_pasien", "tpi_kp_sudah_nama_obat", "tpi_kp_sudah_ket_nama_obat", "tpi_kp_sudah_pemeriksaan_penunjang", "tpi_kp_sudah_ket_pemeriksaan_penunjang", "tpi_kp_sudah_catatan_penting", "tpi_kp_waktu_ttd_petugas_tf", "tpi_kp_waktu_ttd_petugas_penerima", "tpi_kp_petugas_tansfer", "tpi_kp_petugas_terima_transfer", "tpi_kp_ttd_petugas_transfer", "tpi_kp_ttd_petugas_terima_transfer", "tpi_st_sebelum_composmentis", "tpi_st_sebelum_apatis", "tpi_st_sebelum_samnolen", "tpi_st_sebelum_sopor", "tpi_st_sebelum_koma", "tpi_st_sebelum_gcs_e", "tpi_st_sebelum_gcs_m", "tpi_st_sebelum_gcs_v", "tpi_st_sebelum_gcs_total", "tpi_st_sebelum_tensi_sis", "tpi_st_sebelum_tensi_dis", "tpi_st_sebelum_nadi", "tpi_st_sebelum_pernafasan", "tpi_st_sebelum_suhu", "tpi_st_sebelum_catatan", "tpi_st_perjalanan_masalah_selama_transfer", "tpi_st_perjalanan_penanganan_masalah", "tpi_st_sudah_composmentis", "tpi_st_sudah_apatis", "tpi_st_sudah_samnolen", "tpi_st_sudah_sopor", "tpi_st_sudah_koma", "tpi_st_sudah_gcs_e", "tpi_st_sudah_gcs_m", "tpi_st_sudah_gcs_v", "tpi_st_sudah_gcs_total", "tpi_st_sudah_tensi_sis", "tpi_st_sudah_tensi_dis", "tpi_st_sudah_nadi", "tpi_st_sudah_pernafasan", "tpi_st_sudah_suhu", "tpi_st_sudah_kondisi_pasien", "tpi_st_sudah_nama_obat", "tpi_st_sudah_ket_nama_obat", "tpi_st_sudah_pemeriksaan_penunjang", "tpi_st_sudah_ket_pemeriksaan_penunjang", "tpi_st_sudah_catatan_penting", "tpi_st_waktu_ttd_petugas_tf", "tpi_st_waktu_ttd_petugas_penerima", "tpi_st_petugas_tansfer", "tpi_st_petugas_terima_transfer", "tpi_st_ttd_petugas_transfer", "tpi_st_ttd_petugas_terima_transfer") VALUES ('704811', '2025-03-05 11:00', NULL, 'JATI', 'Ok', 'Batu ureter dx ', 'TB Meningitis', '677', '1', NULL, 'Pro URS sd Uretrolitotomy', '-', '1', NULL, NULL, NULL, NULL, '4', '6', '5', '15', '-', '-', '2', '2', '-', '-', NULL, NULL, NULL, NULL, NULL, NULL, '18', '0', NULL, '0', NULL, '1', 'Ringan', '1', '1', '0', NULL, '1', '2025-03-05', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Venflon', 'Ceftriaxone 1 gr jam 09:00
Phenitoin 100mg ham 03:00', '1', '09/12/24', '1', 'Ct uro nk tgl 22/11/24, usg urologi tgl 15/11/24', NULL, NULL, 'Infus 
Phenitoin 100mg jam 03:00 
Ceftriaxone 1 gr jam 09:00', 'R/ URS sd uretrolitotomy kamis 6/3/25 jam 09:30 Ok (+) LIA SIA SIO (+) 
Toleransi operasi 
Dr. Arafah sp.an : acc operasi
Dr fitri spp : acc ringan 
Dr marcel sppd : acc ringan
Dr vinnie sp s : resiko sedang, phenitoin 100mg iv 6 jam sebelum operasi ', '1', NULL, NULL, NULL, NULL, '4', '6', '5', '15', 'Sedang pengobatan meningitis --&gt; phenitoin 
/2 hari tgl 7/3/25', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-03-05 22:22:06 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 22:22:14 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;-&quot;
LINE 1: ...L, NULL, '4', '6', '5', '15', '-', '-', '2', '2', '-', '-', ...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 22:22:14 --> Query error: ERROR:  invalid input syntax for type integer: "-"
LINE 1: ...L, NULL, '4', '6', '5', '15', '-', '-', '2', '2', '-', '-', ...
                                                             ^ - Invalid query: INSERT INTO "sm_transfer_pasien_intra" ("id_layanan_pendaftaran", "tpi_tanggal_masuk", "tpi_tanggal_pindah", "tpi_ruang_asal", "tpi_ruang_tujuan", "tpi_diagnosis_utama", "tpi_diagnosis_sekunder", "tpi_dpjp", "tpi_kewaspadaan", "tpi_riwayat_kewaspadan", "tpi_indikasi_masuk_rs", "tpi_riwayat_kesehatan", "tpi_pf_composmentis", "tpi_pf_apatis", "tpi_pf_samnolen", "tpi_pf_sopor", "tpi_pf_koma", "tpi_pf_gcs_e", "tpi_pf_gcs_m", "tpi_pf_gcs_v", "tpi_pf_gcs_total", "tpi_pf_afgar_score", "tpi_pf_djj", "tpi_pf_pupil_1", "tpi_pf_pupil_2", "tpi_pf_pupil_3", "tpi_pf_pupil_4", "tpi_pf_cdl", "tpi_pf_tanggal_cdl", "tpi_pf_tensi_sis", "tpi_pf_tensi_dis", "tpi_pf_suhu", "tpi_pf_nadi", "tpi_pf_nafas", "tpi_pf_alergi", "tpi_pf_riwayat_alergi", "tpi_pf_skala_nyeri_pasien", "tpi_pf_riwayat_nyeri_pasien", "tpi_pf_resiko_jatuh_pasien", "tpi_pf_riwayat_resiko_jatuh_pasien", "tpi_pf_mobilisasi_pasien", "tpi_pf_mobilisasi_pasien_transfer", "tpi_pf_resiko_dekubitus_pasien", "tpi_pf_riwayat_resiko_dekubitus_pasien", "tpi_pf_infus", "tpi_pf_tanggal_infus", "tpi_pf_ngt_pasien", "tpi_pf_tanggal_ngt", "tpi_pf_ett", "tpi_pf_tanggal_ett", "tpi_pf_cvc", "tpi_pf_tanggal_cvc", "tpi_pf_dc", "tpi_pf_tanggal_dc", "tpi_pf_lain", "tpi_pf_tanggal_lain", "tpi_pf_oksigen", "tpi_pf_keterangan_oksigen", "tpi_pf_pump", "tpi_pf_bidai", "tpi_pt_infus", "tpi_pt_obat", "tpi_pp_labolatorium", "tpi_pp_ket_labolatorium", "tpi_pp_radiologi", "tpi_pp_ket_radiologi", "tpi_pp_lainnya", "tpi_pp_ket_lainnya", "tpi_tm_tindakan_medis", "tpi_tm_rencana_tindakan", "tpi_kp_sebelum_composmentis", "tpi_kp_sebelum_apatis", "tpi_kp_sebelum_samnolen", "tpi_kp_sebelum_sopor", "tpi_kp_sebelum_koma", "tpi_kp_sebelum_gcs_e", "tpi_kp_sebelum_gcs_m", "tpi_kp_sebelum_gcs_v", "tpi_kp_sebelum_gcs_total", "tpi_kp_sebelum_catatan", "tpi_kp_perjalanan_masalah_selama_trasnfer", "tpi_kp_perjalanan_penanganan_masalah", "tpi_kp_sudah_composmentis", "tpi_kp_sudah_apatis", "tpi_kp_sudah_samnolen", "tpi_kp_sudah_sopor", "tpi_kp_sudah_koma", "tpi_kp_sudah_gcs_e", "tpi_kp_sudah_gcs_m", "tpi_kp_sudah_gcs_v", "tpi_kp_sudah_gcs_total", "tpi_kp_sudah_tensi_sis", "tpi_kp_sudah_tensi_dis", "tpi_kp_sudah_nadi", "tpi_kp_sudah_pernafasan", "tpi_kp_sudah_suhu", "tpi_kp_sudah_kondisi_pasien", "tpi_kp_sudah_nama_obat", "tpi_kp_sudah_ket_nama_obat", "tpi_kp_sudah_pemeriksaan_penunjang", "tpi_kp_sudah_ket_pemeriksaan_penunjang", "tpi_kp_sudah_catatan_penting", "tpi_kp_waktu_ttd_petugas_tf", "tpi_kp_waktu_ttd_petugas_penerima", "tpi_kp_petugas_tansfer", "tpi_kp_petugas_terima_transfer", "tpi_kp_ttd_petugas_transfer", "tpi_kp_ttd_petugas_terima_transfer", "tpi_st_sebelum_composmentis", "tpi_st_sebelum_apatis", "tpi_st_sebelum_samnolen", "tpi_st_sebelum_sopor", "tpi_st_sebelum_koma", "tpi_st_sebelum_gcs_e", "tpi_st_sebelum_gcs_m", "tpi_st_sebelum_gcs_v", "tpi_st_sebelum_gcs_total", "tpi_st_sebelum_tensi_sis", "tpi_st_sebelum_tensi_dis", "tpi_st_sebelum_nadi", "tpi_st_sebelum_pernafasan", "tpi_st_sebelum_suhu", "tpi_st_sebelum_catatan", "tpi_st_perjalanan_masalah_selama_transfer", "tpi_st_perjalanan_penanganan_masalah", "tpi_st_sudah_composmentis", "tpi_st_sudah_apatis", "tpi_st_sudah_samnolen", "tpi_st_sudah_sopor", "tpi_st_sudah_koma", "tpi_st_sudah_gcs_e", "tpi_st_sudah_gcs_m", "tpi_st_sudah_gcs_v", "tpi_st_sudah_gcs_total", "tpi_st_sudah_tensi_sis", "tpi_st_sudah_tensi_dis", "tpi_st_sudah_nadi", "tpi_st_sudah_pernafasan", "tpi_st_sudah_suhu", "tpi_st_sudah_kondisi_pasien", "tpi_st_sudah_nama_obat", "tpi_st_sudah_ket_nama_obat", "tpi_st_sudah_pemeriksaan_penunjang", "tpi_st_sudah_ket_pemeriksaan_penunjang", "tpi_st_sudah_catatan_penting", "tpi_st_waktu_ttd_petugas_tf", "tpi_st_waktu_ttd_petugas_penerima", "tpi_st_petugas_tansfer", "tpi_st_petugas_terima_transfer", "tpi_st_ttd_petugas_transfer", "tpi_st_ttd_petugas_terima_transfer") VALUES ('704811', '2025-03-05 11:00', NULL, 'JATI', 'Ok', 'Batu ureter dx ', 'TB Meningitis', '677', '1', NULL, 'Pro URS sd Uretrolitotomy', '-', '1', NULL, NULL, NULL, NULL, '4', '6', '5', '15', '-', '-', '2', '2', '-', '-', NULL, NULL, NULL, NULL, NULL, NULL, '18', '0', NULL, '0', NULL, '1', 'Ringan', '1', '1', '0', NULL, '1', '2025-03-05', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Venflon', 'Ceftriaxone 1 gr jam 09:00
Phenitoin 100mg ham 03:00', '1', '09/12/24', '1', 'Ct uro nk tgl 22/11/24, usg urologi tgl 15/11/24', NULL, NULL, 'Infus 
Phenitoin 100mg jam 03:00 
Ceftriaxone 1 gr jam 09:00', 'R/ URS sd uretrolitotomy kamis 6/3/25 jam 09:30 Ok (+) LIA SIA SIO (+) 
Toleransi operasi 
Dr. Arafah sp.an : acc operasi
Dr fitri spp : acc ringan 
Dr marcel sppd : acc ringan
Dr vinnie sp s : resiko sedang, phenitoin 100mg iv 6 jam sebelum operasi ', '1', NULL, NULL, NULL, NULL, '4', '6', '5', '15', 'Sedang pengobatan meningitis --&gt; phenitoin 
/2 hari tgl 7/3/25', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-03-05 22:22:43 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type integer: &quot;-&quot;
LINE 1: ...L, NULL, '4', '6', '5', '15', '-', '-', '2', '2', '-', '-', ...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 22:22:43 --> Query error: ERROR:  invalid input syntax for type integer: "-"
LINE 1: ...L, NULL, '4', '6', '5', '15', '-', '-', '2', '2', '-', '-', ...
                                                             ^ - Invalid query: INSERT INTO "sm_transfer_pasien_intra" ("id_layanan_pendaftaran", "tpi_tanggal_masuk", "tpi_tanggal_pindah", "tpi_ruang_asal", "tpi_ruang_tujuan", "tpi_diagnosis_utama", "tpi_diagnosis_sekunder", "tpi_dpjp", "tpi_kewaspadaan", "tpi_riwayat_kewaspadan", "tpi_indikasi_masuk_rs", "tpi_riwayat_kesehatan", "tpi_pf_composmentis", "tpi_pf_apatis", "tpi_pf_samnolen", "tpi_pf_sopor", "tpi_pf_koma", "tpi_pf_gcs_e", "tpi_pf_gcs_m", "tpi_pf_gcs_v", "tpi_pf_gcs_total", "tpi_pf_afgar_score", "tpi_pf_djj", "tpi_pf_pupil_1", "tpi_pf_pupil_2", "tpi_pf_pupil_3", "tpi_pf_pupil_4", "tpi_pf_cdl", "tpi_pf_tanggal_cdl", "tpi_pf_tensi_sis", "tpi_pf_tensi_dis", "tpi_pf_suhu", "tpi_pf_nadi", "tpi_pf_nafas", "tpi_pf_alergi", "tpi_pf_riwayat_alergi", "tpi_pf_skala_nyeri_pasien", "tpi_pf_riwayat_nyeri_pasien", "tpi_pf_resiko_jatuh_pasien", "tpi_pf_riwayat_resiko_jatuh_pasien", "tpi_pf_mobilisasi_pasien", "tpi_pf_mobilisasi_pasien_transfer", "tpi_pf_resiko_dekubitus_pasien", "tpi_pf_riwayat_resiko_dekubitus_pasien", "tpi_pf_infus", "tpi_pf_tanggal_infus", "tpi_pf_ngt_pasien", "tpi_pf_tanggal_ngt", "tpi_pf_ett", "tpi_pf_tanggal_ett", "tpi_pf_cvc", "tpi_pf_tanggal_cvc", "tpi_pf_dc", "tpi_pf_tanggal_dc", "tpi_pf_lain", "tpi_pf_tanggal_lain", "tpi_pf_oksigen", "tpi_pf_keterangan_oksigen", "tpi_pf_pump", "tpi_pf_bidai", "tpi_pt_infus", "tpi_pt_obat", "tpi_pp_labolatorium", "tpi_pp_ket_labolatorium", "tpi_pp_radiologi", "tpi_pp_ket_radiologi", "tpi_pp_lainnya", "tpi_pp_ket_lainnya", "tpi_tm_tindakan_medis", "tpi_tm_rencana_tindakan", "tpi_kp_sebelum_composmentis", "tpi_kp_sebelum_apatis", "tpi_kp_sebelum_samnolen", "tpi_kp_sebelum_sopor", "tpi_kp_sebelum_koma", "tpi_kp_sebelum_gcs_e", "tpi_kp_sebelum_gcs_m", "tpi_kp_sebelum_gcs_v", "tpi_kp_sebelum_gcs_total", "tpi_kp_sebelum_catatan", "tpi_kp_perjalanan_masalah_selama_trasnfer", "tpi_kp_perjalanan_penanganan_masalah", "tpi_kp_sudah_composmentis", "tpi_kp_sudah_apatis", "tpi_kp_sudah_samnolen", "tpi_kp_sudah_sopor", "tpi_kp_sudah_koma", "tpi_kp_sudah_gcs_e", "tpi_kp_sudah_gcs_m", "tpi_kp_sudah_gcs_v", "tpi_kp_sudah_gcs_total", "tpi_kp_sudah_tensi_sis", "tpi_kp_sudah_tensi_dis", "tpi_kp_sudah_nadi", "tpi_kp_sudah_pernafasan", "tpi_kp_sudah_suhu", "tpi_kp_sudah_kondisi_pasien", "tpi_kp_sudah_nama_obat", "tpi_kp_sudah_ket_nama_obat", "tpi_kp_sudah_pemeriksaan_penunjang", "tpi_kp_sudah_ket_pemeriksaan_penunjang", "tpi_kp_sudah_catatan_penting", "tpi_kp_waktu_ttd_petugas_tf", "tpi_kp_waktu_ttd_petugas_penerima", "tpi_kp_petugas_tansfer", "tpi_kp_petugas_terima_transfer", "tpi_kp_ttd_petugas_transfer", "tpi_kp_ttd_petugas_terima_transfer", "tpi_st_sebelum_composmentis", "tpi_st_sebelum_apatis", "tpi_st_sebelum_samnolen", "tpi_st_sebelum_sopor", "tpi_st_sebelum_koma", "tpi_st_sebelum_gcs_e", "tpi_st_sebelum_gcs_m", "tpi_st_sebelum_gcs_v", "tpi_st_sebelum_gcs_total", "tpi_st_sebelum_tensi_sis", "tpi_st_sebelum_tensi_dis", "tpi_st_sebelum_nadi", "tpi_st_sebelum_pernafasan", "tpi_st_sebelum_suhu", "tpi_st_sebelum_catatan", "tpi_st_perjalanan_masalah_selama_transfer", "tpi_st_perjalanan_penanganan_masalah", "tpi_st_sudah_composmentis", "tpi_st_sudah_apatis", "tpi_st_sudah_samnolen", "tpi_st_sudah_sopor", "tpi_st_sudah_koma", "tpi_st_sudah_gcs_e", "tpi_st_sudah_gcs_m", "tpi_st_sudah_gcs_v", "tpi_st_sudah_gcs_total", "tpi_st_sudah_tensi_sis", "tpi_st_sudah_tensi_dis", "tpi_st_sudah_nadi", "tpi_st_sudah_pernafasan", "tpi_st_sudah_suhu", "tpi_st_sudah_kondisi_pasien", "tpi_st_sudah_nama_obat", "tpi_st_sudah_ket_nama_obat", "tpi_st_sudah_pemeriksaan_penunjang", "tpi_st_sudah_ket_pemeriksaan_penunjang", "tpi_st_sudah_catatan_penting", "tpi_st_waktu_ttd_petugas_tf", "tpi_st_waktu_ttd_petugas_penerima", "tpi_st_petugas_tansfer", "tpi_st_petugas_terima_transfer", "tpi_st_ttd_petugas_transfer", "tpi_st_ttd_petugas_terima_transfer") VALUES ('704811', '2025-03-05 11:00', NULL, 'JATI', 'Ok', 'Batu ureter dx ', 'TB Meningitis', '677', '1', NULL, 'Pro URS sd Uretrolitotomy', '-', '1', NULL, NULL, NULL, NULL, '4', '6', '5', '15', '-', '-', '2', '2', '-', '-', NULL, NULL, NULL, NULL, NULL, NULL, '18', '0', NULL, '0', NULL, '1', 'Ringan', '1', '1', '0', NULL, '1', '2025-03-05', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Venflon', 'Ceftriaxone 1 gr jam 09:00
Phenitoin 100mg ham 03:00', '1', '09/12/24', '1', 'Ct uro nk tgl 22/11/24, usg urologi tgl 15/11/24', NULL, NULL, 'Infus 
Phenitoin 100mg jam 03:00 
Ceftriaxone 1 gr jam 09:00', 'R/ URS sd uretrolitotomy kamis 6/3/25 jam 09:30 Ok (+) LIA SIA SIO (+) 
Toleransi operasi 
Dr. Arafah sp.an : acc operasi
Dr fitri spp : acc ringan 
Dr marcel sppd : acc ringan
Dr vinnie sp s : resiko sedang, phenitoin 100mg iv 6 jam sebelum operasi ', '1', NULL, NULL, NULL, NULL, '4', '6', '5', '15', 'Sedang pengobatan meningitis --&gt; phenitoin 
/2 hari tgl 7/3/25', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-03-05 22:32:47 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 22:35:05 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 1: ..., &quot;ttd_dokter&quot;, &quot;created_date&quot;) VALUES ('704072', '', '1381'...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 22:35:05 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 1: ..., "ttd_dokter", "created_date") VALUES ('704072', '', '1381'...
                                                             ^ - Invalid query: INSERT INTO "sm_pengkajian_awal_kebidanan_dan_kandungan" ("id_layanan_pendaftaran", "id_pendaftaran", "id_users", "waktu_kajian_kebidanan", "cara_tiba", "rujukan", "informasi", "keluhan_utama_keb", "rks_hamil_muda", "rks_hamil_tua", "rks_anc", "rks_g", "rks_p", "rks_a", "rks_usia_kehamilan", "rks_hpht", "rks_tp", "rk_riwayat_menstruasi", "rk_riwayat_perkawinan", "rk_riwayat_penyakit_operasi", "rk_obat_dikosumsi", "rk_membawa_obat_dari_luar", "rk_terapi_komplementari", "rk_riwayat_penyakit_kluwarga", "rk_riwayat_kluwarga_berencana", "rk_riwayat_ginekologi", "rk_riwayat_alergi", "rk_riwayat_tranfusi_darah", "rk_kebiasaan", "rk_status_psikologi", "rk_status_mental", "rk_kebutuhan_biologis", "rk_kebutuhan_sosial", "rk_status_ekonomi", "rk_status_nilai_kepercayaan", "rk_spiritual", "rk_budaya", "ikbe_kewarganegaraan", "ikbe_suku_bangsa", "ikbe_bicara", "ikbe_jelaskan", "ikbe_perlu_peterjemah", "ikbe_bahasa", "ikbe_bahasa_isyarat", "ikbe_pemahaman_penyakit", "ikbe_pemahaman_pengobatan", "ikbe_pemahaman_nutrisi", "ikbe_pemahaman_spiritual", "ikbe_pemahaman_peralatan", "ikbe_pemahaman_rahab", "ikbe_pemahaman_manajemen", "hambatan_keb", "pkdk_inpeksi_abdomen", "pkdk_palpasi", "pkdk_auskultasi", "pkdk_gerak_janin", "pkdk_his_kontraksi", "pkdk_pemeriksaan_dalam", "pkf_makan", "pkf_mandi", "pkf_personal", "pkf_berpakaian", "pkf_buang_besar", "pkf_buang_kecil", "pkf_berpindah", "pkf_toileting", "pkf_mobilitas", "pkf_naik", "pkf_jumlah_skor", "sn_penurunan_bb_kebidanan", "sn_penurunan_bb_on_kebidanan", "sn_asupan_makan_kebidanan", "sn_total_kebidanan", "ptn_nilai_tingkat_nyeri", "ptn_nyeri_hilang", "prjd_riwayat_jatuh", "prjd_diagnosis", "prjd_kursi_roda", "prjd_kruk_tongkat", "prjd_berpegangan", "prjd_terpasang_infus", "prjd_normal", "prjd_lemah", "prjd_terganggu", "prjd_sadar", "prjd_sering", "prjd_jumlah_skor", "spak_usia", "spak_nafas", "spak_sepsis", "spak_multiple", "spak_studium", "pftv_kesadaran", "pftv_gsc_e", "pftv_gsc_m", "pftv_gsc_v", "pftv_total", "pftv_tekanan_darah", "pftv_frekuensi_nadi", "pftv_berat_badan", "pftv_mata", "pftv_dada_aksila", "pftv_ekstremitas", "pftv_sistem_pernafasan", "pftv_sistem_kardiovaskuler", "sews_respirasi", "sews_saturasi_1", "sews_o2", "sews_suhu", "sews_td_sistolik", "sews_td_diastolik", "sews_nadi", "sews_kesadaran_1", "sews_nyeri", "sews_pengeluaran", "sews_protein_urin", "sews_total_1", "sews_laju_respirasi", "sews_saturasi_2", "sews_suplemen", "sews_temperatur", "sews_tds", "sews_laju_jantung", "sews_kesadaran_2", "sews_total_2", "dp_pemeriksaan_lab_tanggal", "dp_pemeriksaan_ctg_tanggal", "dp_hasil", "dp_hasil1", "dp_lain_lain", "pk_penyakit_menular", "pk_penurunan_daya_tahan_tubuh", "pk_kesehatan_jiwa", "pk_pasien_kekerasan_penganiayaan", "pk_pasien_ketergantungan_obat", "ak_infeksi", "ak_anxeitas", "ak_perdarahan", "ak_melahirkan", "ak_nausea", "ak_efektif", "ak_janin", "ak_lain", "ak_lainl", "rak_kluwarga", "rak_selanjutnya", "rak_consent", "rak_kebutuhan", "rak_persalinan", "rak_pasien", "rak_lain", "rak_lainl", "kriteria_discharge_planing", "perencanaa_pulang", "tanggal_jam_bidan", "id_bidan", "ttd_bidan", "tanggal_jam_dokter_keb", "id_dokter", "ttd_dokter", "created_date") VALUES ('704072', '', '1381', '2025-03-05 22:25', '{"cara_tiba_diruangan_pasien":"Jalan"}', '{"rujukan_pasien_1":null,"rujukan_pasien_2":null,"rujukan_pasien_3":null,"rujukan_pasien_4":null,"rujukan_pasien_5":null,"rujukan_pasien_6":null,"rujukan_pasien_7":"Tidak ada Rujukan","rujukan_pasien_8":"lain-lain","rujukan_pasienl":"poli obgyn"}', '{"informasi_pasien":"Pasien","informasi_pasienn":null}', '{"keluhan_utama_keb_1":null,"keluhan_utama_keb_2":null,"keluhan_utama_keb_3":null,"keluhan_utama_keb_4":null,"keluhan_utama_keb_5":null,"keluhan_utama_keb_6":null,"keluhan_utama_keb_7":null,"keluhan_utama_keb_8":null,"keluhan_utama_keb_9":null,"keluhan_utama_keb_10":"1","keluhan_utama_keb_11":null}', '{"hamil_muda_1":"1","hamil_muda_2":"1","hamil_muda_3":null,"hamil_muda_4":null,"hamil_lain_lain":null}', '{"hamil_tua_1":null,"hamil_tua_2":null,"hamil_tua_3":null,"hamil_tua_4":null,"hamil_lain_5":null}', '{"anc_1":null,"anc_2":null,"anc_3":null,"anc_4":null,"anc_5":null}', '2', '1', '0', '6 minggu', NULL, NULL, '{"riwayat_menstruasi_1":"1","riwayat_menstruasi_2":"13","riwayat_menstruasi_3":"7","riwayat_menstruasi_4":"3","riwayat_menstruasi_5":"1","riwayat_menstruasi_6":null,"riwayat_menstruasi_7":null,"riwayat_menstruasi_8":null,"riwayat_menstruasi_9":null}', '{"riwayat_perkawinan_1":"1","riwayat_perkawinan_2":null,"riwayat_perkawinan_3":null,"riwayat_perkawinan_4":"1","riwayat_perkawinan_5":null,"riwayat_perkawinan_6":null,"riwayat_perkawinan_7":null,"riwayat_perkawinan_8":null,"riwayat_perkawinan_9":null,"riwayat_perkawinan_10":null,"riwayat_perkawinan_11":null}', '{"riwayat_penyakit_oprasi_1":null,"riwayat_penyakit_oprasi_2":null,"riwayat_penyakit_oprasi_3":null,"riwayat_penyakit_oprasi_4":null,"riwayat_penyakit_oprasi_5":null,"riwayat_penyakit_oprasi_6":null,"riwayat_penyakit_oprasi_7":null,"riwayat_penyakit_oprasi_8":null,"riwayat_penyakit_oprasi_9":"1","riwayat_penyakit_oprasi_10":"disangkal","riwayat_penyakit_oprasi_11":"0","riwayat_penyakit_oprasi_13":null,"riwayat_penyakit_oprasi_14":null,"riwayat_penyakit_oprasi":"0","riwayat_penyakit_oprasi_17":null,"riwayat_penyakit_oprasi_18":null}', 'tidak ada', '{"membawa_obat_1":"0"}', '{"terapi_komplementari_1":null,"terapi_komplementari_2":null,"terapi_komplementari_3":null,"terapi_komplementari_4":null,"terapi_komplementari_5":null,"terapi_komplementari_6":null}', '{"riwayat_penyakit_kluwarga_1":null,"riwayat_penyakit_kluwarga_2":null,"riwayat_penyakit_kluwarga_3":null,"riwayat_penyakit_kluwarga_4":null,"riwayat_penyakit_kluwarga_5":null,"riwayat_penyakit_kluwarga_6":null,"riwayat_penyakit_kluwarga_7":null,"riwayat_penyakit_kluwarga_8":null,"riwayat_penyakit_kluwarga_9":null,"riwayat_penyakit_kluwarga_10":null,"riwayat_penyakit_kluwarga_11":null,"riwayat_penyakit_kluwarga_12":null,"riwayat_penyakit_kluwarga_13":null,"riwayat_penyakit_kluwarga_14":"1","riwayat_penyakit_kluwarga_15":"disangkal"}', '{"riwayat_kel_berencana_1":null,"riwayat_kel_berencana_2":null,"riwayat_kel_berencana_3":null,"riwayat_kel_berencana_4":null,"riwayat_kel_berencana_5":null,"riwayat_kel_berencana_6":null,"riwayat_kel_berencana_7":null,"riwayat_kel_berencana_8":null,"riwayat_kel_berencana_9":null}', '{"riwayat_ginekologi_1":null,"riwayat_ginekologi_2":null,"riwayat_ginekologi_3":null,"riwayat_ginekologi_4":null,"riwayat_ginekologi_5":null,"riwayat_ginekologi_6":null,"riwayat_ginekologi_7":null,"riwayat_ginekologi_8":null,"riwayat_ginekologi_9":null,"riwayat_ginekologi_10":null,"riwayat_ginekologi_11":null,"riwayat_ginekologi_12":null}', '{"riwayat_alergi_1":"1","riwayat_alergi_3":null,"riwayat_alergi_4":null,"riwayat_alergi_5":null,"riwayat_alergi_6":null,"riwayat_alergi_7":null,"riwayat_alergi_8":null}', '{"riwayat_tranfusi_darah_1":"1","riwayat_tranfusi_darah_2":null,"riwayat_tranfusi_darah_3":null,"riwayat_tranfusi_darah_5":null}', '{"kebiasaan_1":null,"kebiasaan_2":null,"kebiasaan_3":null,"kebiasaan_4":null,"kebiasaan_5":null,"kebiasaan_6":null}', '{"status_psikologis_1":null,"status_psikologis_2":null,"status_psikologis_3":null,"status_psikologis_4":null,"status_psikologis_5":null,"status_psikologis_6":null,"status_psikologis_7":null,"status_psikologis_8":null,"status_psikologis_9":null,"status_psikologis_10":null}', '{"status_mental_1":"1","status_mental_2":null,"status_mental_3":null,"status_mental_4":null,"status_mental_5":null}', '{"kebutuhan_biologis_1":"3","kebutuhan_biologis_2":"12:00","kebutuhan_biologis_3":"4","kebutuhan_biologis_4":"13:00","kebutuhan_biologis_5":"5","kebutuhan_biologis_6":"12:00","kebutuhan_biologis_7":"1","kebutuhan_biologis_8":"7:00","kebutuhan_biologis_9":"lupa"}', '{"kebutuhan_sosial_1":"1","kebutuhan_sosial_2":null,"kebutuhan_sosial_3":null,"kebutuhan_sosial_4":"1","kebutuhan_sosial_5":null,"kebutuhan_sosial_6":null,"kebutuhan_sosial_7":null,"kebutuhan_sosial_8":"1","kebutuhan_sosial_10":"1","kebutuhan_sosial_11":null,"kebutuhan_sosial_12":null,"kebutuhan_sosial_13":null,"kebutuhan_sosial_14":null}', '{"status_ekonomi_1":null,"status_ekonomi_2":null,"status_ekonomi_3":null,"status_ekonomi_4":"1","status_ekonomi_5":null,"status_ekonomi_6":"1","status_ekonomi_7":null,"status_ekonomi_8":null,"status_ekonomi_9":null}', '{"status_nn_kepercayaan_1":"0","status_nn_kepercayaan_3":null,"status_nn_kepercayaan_4":"0","status_nn_kepercayaan_6":null,"status_nn_kepercayaan_7":null}', '{"spiritual_1":null,"spiritual_2":null,"spiritual_3":"1","spiritual_4":"Abortus","spiritual_5":null,"spiritual_6":null,"spiritual_7":null,"spiritual_8":null,"spiritual_9":null}', '{"budaya_1":null,"budaya_2":null,"budaya_3":null,"budaya_4":null,"budaya_5":null,"budaya_6":null,"budaya_7":"1","budaya_8":null,"budaya_9":null,"budaya_10":null,"budaya_11":null,"budaya_12":"1","budaya_14":"1","budaya_16":null,"budaya_17":"1","budaya_19":null,"budaya_20":"0","budaya_22":null}', '1', 'betawi', '0', NULL, '0', NULL, '0', '1', '1', '1', '1', '1', '1', '1', '{"hambatan_keb_1":"1","hambatan_keb_2":null,"hambatan_keb_3":null,"hambatan_keb_4":null,"hambatan_keb_5":null,"hambatan_keb_6":null,"hambatan_keb_7":null,"hambatan_keb_8":null,"hambatan_keb_9":null,"hambatan_keb_10":null}', '{"infeksi_abdomen_1":null,"infeksi_abdomen_2":null,"infeksi_abdomen_3":null,"infeksi_abdomen_4":null,"infeksi_abdomen_5":null,"infeksi_abdomen_6":null,"infeksi_abdomen_7":null,"infeksi_abdomen_8":null,"infeksi_abdomen_9":null,"infeksi_abdomen_10":null}', '{"palpasi_1":null,"palpasi_2":null,"palpasi_3":null,"palpasi_4":null,"palpasi_5":null,"palpasi_6":null,"palpasi_7":null,"palpasi_8":null,"palpasi_9":null,"palpasi_10":null,"palpasi_11":null,"palpasi_12":null,"palpasi_13":null,"palpasi_14":null,"palpasi_15":null,"palpasi_16":null,"palpasi_17":null}', '{"auskultasi_1":null,"auskultasi_2":null,"auskultasi_3":null,"auskultasi_4":null}', NULL, '{"his_konteraksi_1":null,"his_konteraksi_2":null,"his_konteraksi_3":null}', '{"pemeriksaan_dalam_1":null,"pemeriksaan_dalam_2":null,"pemeriksaan_dalam_3":null,"pemeriksaan_dalam_4":null,"pemeriksaan_dalam_5":null,"pemeriksaan_dalam_6":null,"pemeriksaan_dalam_7":null,"pemeriksaan_dalam_8":null,"pemeriksaan_dalam_9":null,"pemeriksaan_dalam_10":null,"pemeriksaan_dalam_11":null,"pemeriksaan_dalam_12":null,"pemeriksaan_dalam_13":null}', '10', '5', '5', '10', '10', '10', '15', '10', '15', '10', '100', '1', NULL, '0', '0', '{"keterangan_kebidanan_1":"Ringan"}', '{"nyeri_hilang_kebidanan_1":"1","nyeri_hilang_kebidanan_2":null,"nyeri_hilang_kebidanan_3":"1","nyeri_hilang_kebidanan_4":"1","nyeri_hilang_kebidanan_5":null,"nyeri_hilang_kebidanan_6":null}', '0', '15', '0', NULL, NULL, '20', '0', NULL, NULL, '0', NULL, '35', '0', '0', '0', '0', '0', '{"kesadaran_1":"1","kesadaran_2":null,"kesadaran_3":null,"kesadaran_4":null}', '4', '5', '6', '15', '{"tekanan_darah_1":"110","tekanan_darah_2":"70","tekanan_darah_3":"36.6"}', '{"frekuensi_nadi_1":"80","frekuensi_nadi_2":"20"}', '{"berat_badan_1":null,"berat_badan_2":null}', '{"mata_1":null,"mata_2":null,"mata_3":null,"mata_4":null}', '{"dada_askila_1":"1","dada_askila_2":null,"dada_askila_3":null,"dada_askila_4":null,"dada_askila_5":null,"dada_askila_6":null}', '{"ekstremitas_1":"1","ekstremitas_2":null,"ekstremitas_3":null,"ekstremitas_4":null}', '{"sistem_pernafasan_1":null,"sistem_pernafasan_2":null,"sistem_pernafasan_3":null,"sistem_pernafasan_4":null,"sistem_pernafasan_5":null,"sistem_pernafasan_6":null,"sistem_pernafasan_7":null,"sistem_pernafasan_8":null,"sistem_pernafasan_9":null}', '{"sistem_kardiovaskuler_1":"1","sistem_kardiovaskuler_2":null,"sistem_kardiovaskuler_3":null,"sistem_kardiovaskuler_4":null,"sistem_kardiovaskuler_5":"0","sistem_kardiovaskuler_7":null,"sistem_kardiovaskuler_8":"1","sistem_kardiovaskuler_10":"1","sistem_kardiovaskuler_11":null,"sistem_kardiovaskuler_12":null,"sistem_kardiovaskuler_13":"1","sistem_kardiovaskuler_14":null,"sistem_kardiovaskuler_15":null,"sistem_kardiovaskuler_16":null}', '0_2', '0_3', '0_2', '0_2', '0_2', '0_1', '0_3', '0_1', '0_1', NULL, NULL, 'Putih', NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, '2025-03-05', NULL, 'menunggu', NULL, NULL, '{"pk_penyakit_menular_1":"1","pk_penyakit_menular_3":null,"pk_penyakit_menular_4":null,"pk_penyakit_menular_5":null,"pk_penyakit_menular_6":null,"pk_penyakit_menular_7":null,"pk_penyakit_menular_8":null,"pk_penyakit_menular_9":null,"pk_penyakit_menular_11":null,"pk_penyakit_menular_13":null,"pk_penyakit_menular_14":null,"pk_penyakit_menular_15":null,"pk_penyakit_menular_16":null,"pk_penyakit_menular_17":null,"pk_penyakit_menular_18":null,"pk_penyakit_menular_20":null}', '{"penyakit_saat_ini":"","informasi_dari":{"dokter":"","perawat":"","keluarga":"","lain":"","ket_lain":""},"informasi_jangka_waktu":"","ket_informasi_jangka_waktu":"","pemeriksaan_rutin":"","ket_pemeriksaan_rutin":"","penyakit_penyerta":"","ket_penyakit_penyerta":""}', '{"ket_1":"","ket_2":"","ket_3":"","ket_4":"","ket_5":"","ket_6":"","ket_7":"","ket_8":"","ket_9":""}', '{"ket_1":"0","ket_2":"","ket_3":"","ket_4":"","ket_5":"","ket_6":""}', '{"obat":"","ket_obat":"","lama_ketergantungan":""}', NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '1', '1', '1', NULL, '1', NULL, NULL, '{"discharge_planning_kebidanan_1":null,"discharge_planning_kebidanan_2":null,"discharge_planning_kebidanan_3":null,"discharge_planning_kebidanan_4":null}', '{"kriteria_discharge_kebidanan_1":null,"kriteria_discharge_kebidanan_2":null,"kriteria_discharge_kebidanan_3":null,"kriteria_discharge_kebidanan_4":null,"kriteria_discharge_kebidanan_5":null,"kriteria_discharge_kebidanan_6":null,"kriteria_discharge_kebidanan_7":null,"kriteria_discharge_kebidanan_8":null,"kriteria_discharge_kebidanan_9":null,"kriteria_discharge_kebidanan_10":null}', '2025-03-04 14:00', '320', '1', '2025-03-04 14:00', '45', '1', '2025-03-05 22:35:05')
ERROR - 2025-03-05 22:35:10 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 1: ..., &quot;ttd_dokter&quot;, &quot;created_date&quot;) VALUES ('704072', '', '1381'...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 22:35:10 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 1: ..., "ttd_dokter", "created_date") VALUES ('704072', '', '1381'...
                                                             ^ - Invalid query: INSERT INTO "sm_pengkajian_awal_kebidanan_dan_kandungan" ("id_layanan_pendaftaran", "id_pendaftaran", "id_users", "waktu_kajian_kebidanan", "cara_tiba", "rujukan", "informasi", "keluhan_utama_keb", "rks_hamil_muda", "rks_hamil_tua", "rks_anc", "rks_g", "rks_p", "rks_a", "rks_usia_kehamilan", "rks_hpht", "rks_tp", "rk_riwayat_menstruasi", "rk_riwayat_perkawinan", "rk_riwayat_penyakit_operasi", "rk_obat_dikosumsi", "rk_membawa_obat_dari_luar", "rk_terapi_komplementari", "rk_riwayat_penyakit_kluwarga", "rk_riwayat_kluwarga_berencana", "rk_riwayat_ginekologi", "rk_riwayat_alergi", "rk_riwayat_tranfusi_darah", "rk_kebiasaan", "rk_status_psikologi", "rk_status_mental", "rk_kebutuhan_biologis", "rk_kebutuhan_sosial", "rk_status_ekonomi", "rk_status_nilai_kepercayaan", "rk_spiritual", "rk_budaya", "ikbe_kewarganegaraan", "ikbe_suku_bangsa", "ikbe_bicara", "ikbe_jelaskan", "ikbe_perlu_peterjemah", "ikbe_bahasa", "ikbe_bahasa_isyarat", "ikbe_pemahaman_penyakit", "ikbe_pemahaman_pengobatan", "ikbe_pemahaman_nutrisi", "ikbe_pemahaman_spiritual", "ikbe_pemahaman_peralatan", "ikbe_pemahaman_rahab", "ikbe_pemahaman_manajemen", "hambatan_keb", "pkdk_inpeksi_abdomen", "pkdk_palpasi", "pkdk_auskultasi", "pkdk_gerak_janin", "pkdk_his_kontraksi", "pkdk_pemeriksaan_dalam", "pkf_makan", "pkf_mandi", "pkf_personal", "pkf_berpakaian", "pkf_buang_besar", "pkf_buang_kecil", "pkf_berpindah", "pkf_toileting", "pkf_mobilitas", "pkf_naik", "pkf_jumlah_skor", "sn_penurunan_bb_kebidanan", "sn_penurunan_bb_on_kebidanan", "sn_asupan_makan_kebidanan", "sn_total_kebidanan", "ptn_nilai_tingkat_nyeri", "ptn_nyeri_hilang", "prjd_riwayat_jatuh", "prjd_diagnosis", "prjd_kursi_roda", "prjd_kruk_tongkat", "prjd_berpegangan", "prjd_terpasang_infus", "prjd_normal", "prjd_lemah", "prjd_terganggu", "prjd_sadar", "prjd_sering", "prjd_jumlah_skor", "spak_usia", "spak_nafas", "spak_sepsis", "spak_multiple", "spak_studium", "pftv_kesadaran", "pftv_gsc_e", "pftv_gsc_m", "pftv_gsc_v", "pftv_total", "pftv_tekanan_darah", "pftv_frekuensi_nadi", "pftv_berat_badan", "pftv_mata", "pftv_dada_aksila", "pftv_ekstremitas", "pftv_sistem_pernafasan", "pftv_sistem_kardiovaskuler", "sews_respirasi", "sews_saturasi_1", "sews_o2", "sews_suhu", "sews_td_sistolik", "sews_td_diastolik", "sews_nadi", "sews_kesadaran_1", "sews_nyeri", "sews_pengeluaran", "sews_protein_urin", "sews_total_1", "sews_laju_respirasi", "sews_saturasi_2", "sews_suplemen", "sews_temperatur", "sews_tds", "sews_laju_jantung", "sews_kesadaran_2", "sews_total_2", "dp_pemeriksaan_lab_tanggal", "dp_pemeriksaan_ctg_tanggal", "dp_hasil", "dp_hasil1", "dp_lain_lain", "pk_penyakit_menular", "pk_penurunan_daya_tahan_tubuh", "pk_kesehatan_jiwa", "pk_pasien_kekerasan_penganiayaan", "pk_pasien_ketergantungan_obat", "ak_infeksi", "ak_anxeitas", "ak_perdarahan", "ak_melahirkan", "ak_nausea", "ak_efektif", "ak_janin", "ak_lain", "ak_lainl", "rak_kluwarga", "rak_selanjutnya", "rak_consent", "rak_kebutuhan", "rak_persalinan", "rak_pasien", "rak_lain", "rak_lainl", "kriteria_discharge_planing", "perencanaa_pulang", "tanggal_jam_bidan", "id_bidan", "ttd_bidan", "tanggal_jam_dokter_keb", "id_dokter", "ttd_dokter", "created_date") VALUES ('704072', '', '1381', '2025-03-05 22:25', '{"cara_tiba_diruangan_pasien":"Jalan"}', '{"rujukan_pasien_1":null,"rujukan_pasien_2":null,"rujukan_pasien_3":null,"rujukan_pasien_4":null,"rujukan_pasien_5":null,"rujukan_pasien_6":null,"rujukan_pasien_7":"Tidak ada Rujukan","rujukan_pasien_8":"lain-lain","rujukan_pasienl":"poli obgyn"}', '{"informasi_pasien":"Pasien","informasi_pasienn":null}', '{"keluhan_utama_keb_1":null,"keluhan_utama_keb_2":null,"keluhan_utama_keb_3":null,"keluhan_utama_keb_4":null,"keluhan_utama_keb_5":null,"keluhan_utama_keb_6":null,"keluhan_utama_keb_7":null,"keluhan_utama_keb_8":null,"keluhan_utama_keb_9":null,"keluhan_utama_keb_10":"1","keluhan_utama_keb_11":null}', '{"hamil_muda_1":"1","hamil_muda_2":"1","hamil_muda_3":null,"hamil_muda_4":null,"hamil_lain_lain":null}', '{"hamil_tua_1":null,"hamil_tua_2":null,"hamil_tua_3":null,"hamil_tua_4":null,"hamil_lain_5":null}', '{"anc_1":null,"anc_2":null,"anc_3":null,"anc_4":null,"anc_5":null}', '2', '1', '0', '6 minggu', NULL, NULL, '{"riwayat_menstruasi_1":"1","riwayat_menstruasi_2":"13","riwayat_menstruasi_3":"7","riwayat_menstruasi_4":"3","riwayat_menstruasi_5":"1","riwayat_menstruasi_6":null,"riwayat_menstruasi_7":null,"riwayat_menstruasi_8":null,"riwayat_menstruasi_9":null}', '{"riwayat_perkawinan_1":"1","riwayat_perkawinan_2":null,"riwayat_perkawinan_3":null,"riwayat_perkawinan_4":"1","riwayat_perkawinan_5":null,"riwayat_perkawinan_6":null,"riwayat_perkawinan_7":null,"riwayat_perkawinan_8":null,"riwayat_perkawinan_9":null,"riwayat_perkawinan_10":null,"riwayat_perkawinan_11":null}', '{"riwayat_penyakit_oprasi_1":null,"riwayat_penyakit_oprasi_2":null,"riwayat_penyakit_oprasi_3":null,"riwayat_penyakit_oprasi_4":null,"riwayat_penyakit_oprasi_5":null,"riwayat_penyakit_oprasi_6":null,"riwayat_penyakit_oprasi_7":null,"riwayat_penyakit_oprasi_8":null,"riwayat_penyakit_oprasi_9":"1","riwayat_penyakit_oprasi_10":"disangkal","riwayat_penyakit_oprasi_11":"0","riwayat_penyakit_oprasi_13":null,"riwayat_penyakit_oprasi_14":null,"riwayat_penyakit_oprasi":"0","riwayat_penyakit_oprasi_17":null,"riwayat_penyakit_oprasi_18":null}', 'tidak ada', '{"membawa_obat_1":"0"}', '{"terapi_komplementari_1":null,"terapi_komplementari_2":null,"terapi_komplementari_3":null,"terapi_komplementari_4":null,"terapi_komplementari_5":null,"terapi_komplementari_6":null}', '{"riwayat_penyakit_kluwarga_1":null,"riwayat_penyakit_kluwarga_2":null,"riwayat_penyakit_kluwarga_3":null,"riwayat_penyakit_kluwarga_4":null,"riwayat_penyakit_kluwarga_5":null,"riwayat_penyakit_kluwarga_6":null,"riwayat_penyakit_kluwarga_7":null,"riwayat_penyakit_kluwarga_8":null,"riwayat_penyakit_kluwarga_9":null,"riwayat_penyakit_kluwarga_10":null,"riwayat_penyakit_kluwarga_11":null,"riwayat_penyakit_kluwarga_12":null,"riwayat_penyakit_kluwarga_13":null,"riwayat_penyakit_kluwarga_14":"1","riwayat_penyakit_kluwarga_15":"disangkal"}', '{"riwayat_kel_berencana_1":null,"riwayat_kel_berencana_2":null,"riwayat_kel_berencana_3":null,"riwayat_kel_berencana_4":null,"riwayat_kel_berencana_5":null,"riwayat_kel_berencana_6":null,"riwayat_kel_berencana_7":null,"riwayat_kel_berencana_8":null,"riwayat_kel_berencana_9":null}', '{"riwayat_ginekologi_1":null,"riwayat_ginekologi_2":null,"riwayat_ginekologi_3":null,"riwayat_ginekologi_4":null,"riwayat_ginekologi_5":null,"riwayat_ginekologi_6":null,"riwayat_ginekologi_7":null,"riwayat_ginekologi_8":null,"riwayat_ginekologi_9":null,"riwayat_ginekologi_10":null,"riwayat_ginekologi_11":null,"riwayat_ginekologi_12":null}', '{"riwayat_alergi_1":"1","riwayat_alergi_3":null,"riwayat_alergi_4":null,"riwayat_alergi_5":null,"riwayat_alergi_6":null,"riwayat_alergi_7":null,"riwayat_alergi_8":null}', '{"riwayat_tranfusi_darah_1":"1","riwayat_tranfusi_darah_2":null,"riwayat_tranfusi_darah_3":null,"riwayat_tranfusi_darah_5":null}', '{"kebiasaan_1":null,"kebiasaan_2":null,"kebiasaan_3":null,"kebiasaan_4":null,"kebiasaan_5":null,"kebiasaan_6":null}', '{"status_psikologis_1":null,"status_psikologis_2":null,"status_psikologis_3":null,"status_psikologis_4":null,"status_psikologis_5":null,"status_psikologis_6":null,"status_psikologis_7":null,"status_psikologis_8":null,"status_psikologis_9":null,"status_psikologis_10":null}', '{"status_mental_1":"1","status_mental_2":null,"status_mental_3":null,"status_mental_4":null,"status_mental_5":null}', '{"kebutuhan_biologis_1":"3","kebutuhan_biologis_2":"12:00","kebutuhan_biologis_3":"4","kebutuhan_biologis_4":"13:00","kebutuhan_biologis_5":"5","kebutuhan_biologis_6":"12:00","kebutuhan_biologis_7":"1","kebutuhan_biologis_8":"7:00","kebutuhan_biologis_9":"lupa"}', '{"kebutuhan_sosial_1":"1","kebutuhan_sosial_2":null,"kebutuhan_sosial_3":null,"kebutuhan_sosial_4":"1","kebutuhan_sosial_5":null,"kebutuhan_sosial_6":null,"kebutuhan_sosial_7":null,"kebutuhan_sosial_8":"1","kebutuhan_sosial_10":"1","kebutuhan_sosial_11":null,"kebutuhan_sosial_12":null,"kebutuhan_sosial_13":null,"kebutuhan_sosial_14":null}', '{"status_ekonomi_1":null,"status_ekonomi_2":null,"status_ekonomi_3":null,"status_ekonomi_4":"1","status_ekonomi_5":null,"status_ekonomi_6":"1","status_ekonomi_7":null,"status_ekonomi_8":null,"status_ekonomi_9":null}', '{"status_nn_kepercayaan_1":"0","status_nn_kepercayaan_3":null,"status_nn_kepercayaan_4":"0","status_nn_kepercayaan_6":null,"status_nn_kepercayaan_7":null}', '{"spiritual_1":null,"spiritual_2":null,"spiritual_3":"1","spiritual_4":"Abortus","spiritual_5":null,"spiritual_6":null,"spiritual_7":null,"spiritual_8":null,"spiritual_9":null}', '{"budaya_1":null,"budaya_2":null,"budaya_3":null,"budaya_4":null,"budaya_5":null,"budaya_6":null,"budaya_7":"1","budaya_8":null,"budaya_9":null,"budaya_10":null,"budaya_11":null,"budaya_12":"1","budaya_14":"1","budaya_16":null,"budaya_17":"1","budaya_19":null,"budaya_20":"0","budaya_22":null}', '1', 'betawi', '0', NULL, '0', NULL, '0', '1', '1', '1', '1', '1', '1', '1', '{"hambatan_keb_1":"1","hambatan_keb_2":null,"hambatan_keb_3":null,"hambatan_keb_4":null,"hambatan_keb_5":null,"hambatan_keb_6":null,"hambatan_keb_7":null,"hambatan_keb_8":null,"hambatan_keb_9":null,"hambatan_keb_10":null}', '{"infeksi_abdomen_1":null,"infeksi_abdomen_2":null,"infeksi_abdomen_3":null,"infeksi_abdomen_4":null,"infeksi_abdomen_5":null,"infeksi_abdomen_6":null,"infeksi_abdomen_7":null,"infeksi_abdomen_8":null,"infeksi_abdomen_9":null,"infeksi_abdomen_10":null}', '{"palpasi_1":null,"palpasi_2":null,"palpasi_3":null,"palpasi_4":null,"palpasi_5":null,"palpasi_6":null,"palpasi_7":null,"palpasi_8":null,"palpasi_9":null,"palpasi_10":null,"palpasi_11":null,"palpasi_12":null,"palpasi_13":null,"palpasi_14":null,"palpasi_15":null,"palpasi_16":null,"palpasi_17":null}', '{"auskultasi_1":null,"auskultasi_2":null,"auskultasi_3":null,"auskultasi_4":null}', NULL, '{"his_konteraksi_1":null,"his_konteraksi_2":null,"his_konteraksi_3":null}', '{"pemeriksaan_dalam_1":null,"pemeriksaan_dalam_2":null,"pemeriksaan_dalam_3":null,"pemeriksaan_dalam_4":null,"pemeriksaan_dalam_5":null,"pemeriksaan_dalam_6":null,"pemeriksaan_dalam_7":null,"pemeriksaan_dalam_8":null,"pemeriksaan_dalam_9":null,"pemeriksaan_dalam_10":null,"pemeriksaan_dalam_11":null,"pemeriksaan_dalam_12":null,"pemeriksaan_dalam_13":null}', '10', '5', '5', '10', '10', '10', '15', '10', '15', '10', '100', '1', NULL, '0', '0', '{"keterangan_kebidanan_1":"Ringan"}', '{"nyeri_hilang_kebidanan_1":"1","nyeri_hilang_kebidanan_2":null,"nyeri_hilang_kebidanan_3":"1","nyeri_hilang_kebidanan_4":"1","nyeri_hilang_kebidanan_5":null,"nyeri_hilang_kebidanan_6":null}', '0', '15', '0', NULL, NULL, '20', '0', NULL, NULL, '0', NULL, '35', '0', '0', '0', '0', '0', '{"kesadaran_1":"1","kesadaran_2":null,"kesadaran_3":null,"kesadaran_4":null}', '4', '5', '6', '15', '{"tekanan_darah_1":"110","tekanan_darah_2":"70","tekanan_darah_3":"36.6"}', '{"frekuensi_nadi_1":"80","frekuensi_nadi_2":"20"}', '{"berat_badan_1":null,"berat_badan_2":null}', '{"mata_1":null,"mata_2":null,"mata_3":null,"mata_4":null}', '{"dada_askila_1":"1","dada_askila_2":null,"dada_askila_3":null,"dada_askila_4":null,"dada_askila_5":null,"dada_askila_6":null}', '{"ekstremitas_1":"1","ekstremitas_2":null,"ekstremitas_3":null,"ekstremitas_4":null}', '{"sistem_pernafasan_1":null,"sistem_pernafasan_2":null,"sistem_pernafasan_3":null,"sistem_pernafasan_4":null,"sistem_pernafasan_5":null,"sistem_pernafasan_6":null,"sistem_pernafasan_7":null,"sistem_pernafasan_8":null,"sistem_pernafasan_9":null}', '{"sistem_kardiovaskuler_1":"1","sistem_kardiovaskuler_2":null,"sistem_kardiovaskuler_3":null,"sistem_kardiovaskuler_4":null,"sistem_kardiovaskuler_5":"0","sistem_kardiovaskuler_7":null,"sistem_kardiovaskuler_8":"1","sistem_kardiovaskuler_10":"1","sistem_kardiovaskuler_11":null,"sistem_kardiovaskuler_12":null,"sistem_kardiovaskuler_13":"1","sistem_kardiovaskuler_14":null,"sistem_kardiovaskuler_15":null,"sistem_kardiovaskuler_16":null}', '0_2', '0_3', '0_2', '0_2', '0_2', '0_1', '0_3', '0_1', '0_1', NULL, NULL, 'Putih', NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, '2025-03-05', NULL, 'menunggu', NULL, NULL, '{"pk_penyakit_menular_1":"1","pk_penyakit_menular_3":null,"pk_penyakit_menular_4":null,"pk_penyakit_menular_5":null,"pk_penyakit_menular_6":null,"pk_penyakit_menular_7":null,"pk_penyakit_menular_8":null,"pk_penyakit_menular_9":null,"pk_penyakit_menular_11":null,"pk_penyakit_menular_13":null,"pk_penyakit_menular_14":null,"pk_penyakit_menular_15":null,"pk_penyakit_menular_16":null,"pk_penyakit_menular_17":null,"pk_penyakit_menular_18":null,"pk_penyakit_menular_20":null}', '{"penyakit_saat_ini":"","informasi_dari":{"dokter":"","perawat":"","keluarga":"","lain":"","ket_lain":""},"informasi_jangka_waktu":"","ket_informasi_jangka_waktu":"","pemeriksaan_rutin":"","ket_pemeriksaan_rutin":"","penyakit_penyerta":"","ket_penyakit_penyerta":""}', '{"ket_1":"","ket_2":"","ket_3":"","ket_4":"","ket_5":"","ket_6":"","ket_7":"","ket_8":"","ket_9":""}', '{"ket_1":"0","ket_2":"","ket_3":"","ket_4":"","ket_5":"","ket_6":""}', '{"obat":"","ket_obat":"","lama_ketergantungan":""}', NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '1', '1', '1', NULL, '1', NULL, NULL, '{"discharge_planning_kebidanan_1":null,"discharge_planning_kebidanan_2":null,"discharge_planning_kebidanan_3":null,"discharge_planning_kebidanan_4":null}', '{"kriteria_discharge_kebidanan_1":null,"kriteria_discharge_kebidanan_2":null,"kriteria_discharge_kebidanan_3":null,"kriteria_discharge_kebidanan_4":null,"kriteria_discharge_kebidanan_5":null,"kriteria_discharge_kebidanan_6":null,"kriteria_discharge_kebidanan_7":null,"kriteria_discharge_kebidanan_8":null,"kriteria_discharge_kebidanan_9":null,"kriteria_discharge_kebidanan_10":null}', '2025-03-04 14:00', '320', '1', '2025-03-04 14:00', '45', '1', '2025-03-05 22:35:10')
ERROR - 2025-03-05 22:41:40 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type numeric: &quot;&quot;
LINE 1: ..._5&quot;, &quot;jam_pemberian_6&quot;) VALUES (801932, '2', '2', '', '', ''...
                                                             ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 22:41:40 --> Query error: ERROR:  invalid input syntax for type numeric: ""
LINE 1: ..._5", "jam_pemberian_6") VALUES (801932, '2', '2', '', '', ''...
                                                             ^ - Invalid query: INSERT INTO "sm_resep_r" ("id_resep", "r_no", "resep_r_jumlah", "tebus_r_jumlah", "aturan_pakai", "ket_aturan_pakai", "timing", "iter", "cara_pembuatan", "nominal", "admin_time", "keterangan_resep", "racik", "aturan_pakai_manual", "ket_aturan_pakai_manual", "id_sediaan", "jam_pemberian_1", "jam_pemberian_2", "jam_pemberian_3", "jam_pemberian_4", "jam_pemberian_5", "jam_pemberian_6") VALUES (801932, '2', '2', '', '', '', 'PC', '0', '', '0', '', NULL, '0', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)
ERROR - 2025-03-05 22:53:42 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 22:59:24 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 22:59:24 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 22:59:26 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ... VALUES (5718917, '397', 20912.4, '1', '1.00', NULL, 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 22:59:26 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ... VALUES (5718917, '397', 20912.4, '1', '1.00', NULL, 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (5718917, '397', 20912.4, '1', '1.00', NULL, 'null')
ERROR - 2025-03-05 22:59:39 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 22:59:39 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 23:00:36 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 23:00:36 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 23:00:41 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 23:00:41 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 23:00:48 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 23:00:48 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 23:02:19 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 23:02:19 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 23:21:12 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 23:21:12 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 23:21:25 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 23:21:25 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 23:23:18 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 23:26:14 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 23:26:14 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 23:26:18 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ...S (5719127, '1355', 203879.916, '2.5', '2.00', 'Ya', 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 23:26:18 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ...S (5719127, '1355', 203879.916, '2.5', '2.00', 'Ya', 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (5719127, '1355', 203879.916, '2.5', '2.00', 'Ya', 'null')
ERROR - 2025-03-05 23:26:29 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 23:26:32 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 23:26:32 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 23:27:53 --> Severity: Notice  --> Trying to get property 'id_pendaftaran' of non-object /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/modules/salinan_resep/models/Salinan_resep_model.php 680
ERROR - 2025-03-05 23:28:26 --> 404 Page Not Found --> /index
ERROR - 2025-03-05 23:31:40 --> Severity: Warning  --> call_user_func_array() expects parameter 1 to be a valid callback, class 'Form_rekam_medis' does not have a method 'index_post' /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/application/libraries/REST_Controller.php 742
ERROR - 2025-03-05 23:39:18 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 23:39:18 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 23:41:05 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 23:41:05 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 23:41:08 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type smallint: &quot;null&quot;
LINE 1: ... VALUES (5719150, '1229', 4995, '2.5', '1.00', 'Ya', 'null')
                                                                ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 23:41:08 --> Query error: ERROR:  invalid input syntax for type smallint: "null"
LINE 1: ... VALUES (5719150, '1229', 4995, '2.5', '1.00', 'Ya', 'null')
                                                                ^ - Invalid query: INSERT INTO "sm_resep_r_detail" ("id_resep_r", "id_barang", "jual_harga", "dosis_racik", "jumlah_pakai", "formularium", "kronis") VALUES (5719150, '1229', 4995, '2.5', '1.00', 'Ya', 'null')
ERROR - 2025-03-05 23:41:29 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 23:41:29 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
ERROR - 2025-03-05 23:45:41 --> Severity: Warning  --> pg_query(): Query failed: ERROR:  invalid input syntax for type bigint: &quot;&quot;
LINE 3: WHERE &quot;id&quot; = ''
                     ^ /home/simrs/webs/public_html/simrs.tangerangkota.go.id.site/system/database/drivers/postgre/postgre_driver.php 242
ERROR - 2025-03-05 23:45:41 --> Query error: ERROR:  invalid input syntax for type bigint: ""
LINE 3: WHERE "id" = ''
                     ^ - Invalid query: SELECT *
FROM "sm_layanan_pendaftaran"
WHERE "id" = ''
